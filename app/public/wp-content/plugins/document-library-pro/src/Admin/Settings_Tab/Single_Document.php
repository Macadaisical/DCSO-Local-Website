<?php

namespace Barn2\Plugin\Document_Library_Pro\Admin\Settings_Tab;

use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Registerable;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Admin\Settings_API_Helper;
use Barn2\Plugin\Document_Library_Pro\Dependencies\Lib\Util as Lib_Util;
use Barn2\Plugin\Document_Library_Pro\Util\Options;

defined( 'ABSPATH' ) || exit;

/**
 * General Setting Tab
 *
 * @package   Barn2\document-library-pro
 * @author    Barn2 Plugins <support@barn2.com>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 */
class Single_Document implements Registerable {
	const TAB_ID       = 'single_document';
	const OPTION_GROUP = 'document_library_pro_single_document';
	const MENU_SLUG    = 'dlp-settings-single-document';

	private $plugin;
	private $id;
	private $title;

	/**
	 * Constructor.
	 *
	 * @param Plugin $plugin
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->id     = 'single_document';
		$this->title  = __( 'Single Document', 'document-library-pro' );
	}

	/**
	 * {@inheritdoc}
	 */
	public function register() {
		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}

	/**
	 * Register the Settings with WP Settings API.
	 */
	public function register_settings() {
		Settings_API_Helper::add_settings_section(
			'dlp_general_display',
			self::MENU_SLUG,
			'',
			[ $this, 'display_document_display_description' ],
			[
				[
					'id'      => Options::SINGLE_DOCUMENT_DISPLAY_OPTION_KEY,
					'title'   => __( 'Display', 'document-library-pro' ),
					'type'    => 'multicheckbox',
					'options' => Options::get_document_display_option_labels(),
					'default' => Options::get_document_display_default_structure(),
				]
			]
		);
	}

	/**
	 * Output the Document Display description.
	 */
	public function display_document_display_description() {
		printf(
			'<p>' .
			/* translators: %1: knowledge base link start, %2: knowledge base link end */
			esc_html__( 'Document Library Pro creates an individual page for each document, which you can disable if required. Use the following options to choose what information to display on this page. %1$sRead more%2$s.', 'document-library-pro' ) .
			'</p>',
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			Lib_Util::format_link_open( Lib_Util::barn2_url( '/kb/single-document-page/' ), true ),
			'</a>'
		);
	}

	/**
	 * Get the tab title.
	 *
	 * @return string
	 */
	public function get_title() {
		return $this->title;
	}

	/**
	 * Get the tab ID.
	 *
	 * @return string
	 */
	public function get_id() {
		return $this->id;
	}
}
