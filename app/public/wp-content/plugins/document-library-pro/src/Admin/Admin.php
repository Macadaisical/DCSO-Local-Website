<?php

namespace Barn2\Plugin\Document_Library_Pro\Admin;

use Barn2\Plugin\Document_Library_Pro\Util\Util;
use Barn2\Plugin\Document_Library_Pro\Util\Options;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Registerable;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Service;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Service_Container;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Plugin\Licensed_Plugin;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Plugin\Admin\Admin_Links;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Admin\Plugin_Promo;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Admin\Settings_API_Helper;

defined( 'ABSPATH' ) || exit;

/**
 * General Admin Functions
 *
 * @package   Barn2\document-library-pro
 * @author    Barn2 Plugins <support@barn2.com>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 */
class Admin implements Registerable, Service {

	use Service_Container;

	private $plugin;
	private $license;

	/**
	 * Constructor.
	 *
	 * @param Licensed_Plugin $plugin
	 */
	public function __construct( Licensed_Plugin $plugin ) {
		$this->plugin = $plugin;

		$this->add_services();
	}

	/**
	 * {@inheritdoc}
	 */
	public function register() {
		$this->register_services();

		// Load admin scripts.
		add_action( 'admin_enqueue_scripts', [ $this, 'load_scripts' ] );

		if ( apply_filters( 'document_library_pro_enable_media_filter', true ) ) {
			add_action( 'wp_enqueue_media', [ $this, 'load_wpmedia_scripts' ] );
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function add_services() {
		$this->add_service( 'admin_links', new Admin_Links( $this->plugin ) );
		$this->add_service( 'plugin_promo', new Plugin_Promo( $this->plugin ) );
		$this->add_service( 'settings_api', new Settings_API_Helper( $this->plugin ) );
		$this->add_service( 'menu', new Menu() );
		$this->add_service( 'settings', new Settings( $this->plugin ) );
		$this->add_service( 'page/settings', new Page\Settings( $this->plugin ) );
		$this->add_service( 'page/import', new Page\Import() );
		$this->add_service( 'page/import_csv', new Page\Import_CSV() );
		$this->add_service( 'page/protect', new Page\Protect( $this->plugin ) );
		$this->add_service( 'metabox/document_link', new Metabox\Document_Link() );
		$this->add_service( 'metabox/file_size', new Metabox\File_Size() );
		$this->add_service( 'metabox/priority_handler', new Metabox\Priority_Handler() );
		$this->add_service( 'page_list', new Page_List() );
		$this->add_service( 'document_edit', new Document_Edit() );
		$this->add_service( 'document_list', new Document_List() );
		$this->add_service( 'media_library', new Media_Library() );
		$this->add_service( 'ajax_handler', new Ajax_Handler() );
	}

	/**
	 * Load the scripts.
	 *
	 * @param string $hook
	 */
	public function load_scripts( $hook ) {
		global $hook_suffix;

		$screen = get_current_screen();

		// Add - Edit Document Page
		if ( in_array( $hook, [ 'post.php', 'post-new.php' ], true ) && is_object( $screen ) && 'dlp_document' === $screen->post_type ) {
			// Document Link
			wp_enqueue_media();
			wp_enqueue_script( 'dlp-admin-document', $this->plugin->get_dir_url() . 'assets/js/admin/dlp-document-link.js', [ 'jquery' ], $this->plugin->get_version(), true );
			wp_localize_script(
				'dlp-admin-document',
				'dlpAdminObject',
				[
					'version_control_mode' => Options::get_version_control_mode(),
					'i18n'                 => [
						'select_file'          => __( 'Select File', 'document-library-pro' ),
						'add_file'             => __( 'Add File', 'document-library-pro' ),
						'replace_file'         => __( 'Replace File', 'document-library-pro' ),
						'add_new_file'         => __( 'Add New File', 'document-library-pro' ),
						// translators: %s is the name of a file
						'shall_remove_version' => __( 'This will permanently remove the file from the Media Library. Are you sure you want to remove "%s"?', 'document-library-pro' ),
						'before_unload'        => __( 'The changes you made will be lost if you navigate away from this page.', 'document-library-pro' ),
					],
				]
			);
			wp_enqueue_style( 'dlp-admin-document', $this->plugin->get_dir_url() . 'assets/css/admin/dlp-post.css', [], $this->plugin->get_version(), 'all' );
		}

		// Settings Page
		if ( 'toplevel_page_document_library_pro' === $hook ) {
			wp_enqueue_style( 'dlp-admin-settings', $this->plugin->get_dir_url() . 'assets/css/admin/dlp-admin-settings.css', [ 'wp-color-picker' ], $this->plugin->get_version(), 'all' );
			wp_enqueue_script( 'dlp-admin-settings', $this->plugin->get_dir_url() . 'assets/js/admin/dlp-admin.js', [ 'jquery', 'wp-color-picker' ], $this->plugin->get_version(), true );
		}

		// Main Importer Page
		if ( Util::str_ends_with( $hook, 'page_dlp_import' ) ) {
			wp_enqueue_style( 'dlp-dnd-import', $this->plugin->get_dir_url() . 'assets/css/admin/dlp-dnd-import.css', [], $this->plugin->get_version(), 'all' );
			wp_enqueue_script( 'dlp-dnd-import', $this->plugin->get_dir_url() . 'assets/js/admin/dlp-dnd-import.js', [ 'jquery', 'plupload' ], $this->plugin->get_version(), true );

			wp_localize_script( 'dlp-dnd-import', 'pluploadL10n', Importer\DND_Controller::get_plupload_l10n() );
			Util::add_inline_script_params(
				'dlp-dnd-import',
				'dndImportObject',
				[
					'ajaxurl'      => admin_url( 'admin-ajax.php' ),
					'pluploadInit' => Importer\DND_Controller::get_plupload_options(),
				]
			);
		}

		// CSV Importer Page
		if ( Util::str_ends_with( $hook, 'page_dlp_import_csv' ) ) {
			wp_enqueue_style( 'dlp-csv-import', $this->plugin->get_dir_url() . 'assets/css/admin/dlp-csv-import.css', [], $this->plugin->get_version(), 'all' );
			wp_register_script( 'dlp-csv-import', $this->plugin->get_dir_url() . 'assets/js/admin/dlp-csv-import.js', [ 'jquery' ], $this->plugin->get_version(), true );
		}

		// Protect Page
		if ( Util::str_ends_with( $hook, 'page_dlp_protect' ) ) {
			wp_enqueue_style( 'dlp-protect', $this->plugin->get_dir_url() . 'assets/css/admin/dlp-protect.css', [], $this->plugin->get_version(), 'all' );
		}
	}

	/**
	 * Load the Media Library scripts.
	 */
	public function load_wpmedia_scripts() {

		wp_enqueue_script(
			'dlp-ml-tax-filter',
			$this->plugin->get_dir_url() . 'assets/js/admin/dlp-ml-tax-filter.js',
			[
				'media-editor',
				'media-views',
			],
			$this->plugin->get_version(),
			false
		);

		wp_localize_script(
			'dlp-ml-tax-filter',
			'MediaLibraryDocumentLibraryFilterData',
			[
				'all'       => __( 'All types', 'document-library-pro' ),
				'documents' => __( 'Documents', 'document-library-pro' ),
			]
		);
	}
}
