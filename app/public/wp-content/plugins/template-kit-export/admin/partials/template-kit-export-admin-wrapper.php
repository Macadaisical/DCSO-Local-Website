<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       -
 * @since      1.0.0
 *
 * @package    Template_Kit_Export
 * @subpackage Template_Kit_Export/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// phpcs:ignore
$current_active_step = isset( $_GET['step'] ) ? (int) $_GET['step'] : 1;
?>

<div class="envato-tk-export-wrap">
	<header class="envato-tk-export-header">
        <div>
            <h1>Envato Template Kit Export</h1>
            <p>Use this plugin to Export an "Envato Template Kit" or an "Elementor Kit".</p>
		</div>
		<div class="envato-tk-export-icon">
            <a href="https://envato.com" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72"><path fill="black" d="M39.137058 70.157119c1.685122 0 3.051217-1.365967 3.051217-3.051217 0-1.685122-1.366095-3.051217-3.051217-3.051217-1.685121 0-3.051217 1.366095-3.051217 3.051217 0 1.68525 1.366096 3.051217 3.051217 3.051217zm17.560977-23.85614-17.212984 1.84103c-.321858.03862-.47635-.373356-.231738-.566471l16.852503-13.118945c1.094318-.901204 1.789532-2.291632 1.493422-3.785054-.296109-2.291632-2.188636-3.785054-4.570388-3.47607L34.721548 29.87333c-.321858.0515-.502099-.360481-.231738-.566471l18.139936-13.852782c3.579064-2.780856 3.875174-8.2524479.592219-11.4324082-2.986845-2.9868582-7.763223-2.8838635-10.737194.1029947L13.24716 33.864373c-1.094318 1.197313-1.596417 2.780856-1.287433 4.480268.502099 2.690736 3.17996 4.480268 5.870696 3.978169l15.758184-3.218583c.347607-.06437.527847.38623.231738.579345L16.337 50.871367c-2.188636 1.390428-3.17996 3.875175-2.484746 6.359921.695214 3.282955 3.978169 5.175482 7.158129 4.377273l26.134897-6.437166c.296109-.07725.514973.270361.321858.502099l-4.081164 5.033864c-1.094318 1.390428.695214 3.282955 2.188637 2.188637l13.42793-11.033304c2.381751-1.982647.798208-5.870696-2.291632-5.574586z"/></svg>
            </a>
        </div>
	</header>
	<?php
	// phpcs:ignore
	if ( isset( $_GET['error'] ) ) {
		?>
		<div class="envato-tk-notice">
				<div class="tk-error">
					<p>
						<strong>Sorry there was an error saving your request.</strong>
					</p>
				</div>
		</div>
		<?php
	}
	?>
	<div class="envato-tk__tabset">
		<!-- Tab 1 -->
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=' . Template_Kit_Export_Admin::ADMIN_MENU_SLUG . '&step=1' ) ); ?>" class="envato-tk__tab<?php echo 1 === $current_active_step ? ' envato-tk__tab--current' : ''; ?>">1. Export Type</a>
		<!-- Tab 2 -->
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=' . Template_Kit_Export_Admin::ADMIN_MENU_SLUG . '&step=2' ) ); ?>" class="envato-tk__tab<?php echo 2 === $current_active_step ? ' envato-tk__tab--current' : ''; ?>">2. Setup Kit</a>
		<!-- Tab 3 -->
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=' . Template_Kit_Export_Admin::ADMIN_MENU_SLUG . '&step=3' ) ); ?>" class="envato-tk__tab<?php echo 3 === $current_active_step ? ' envato-tk__tab--current' : ''; ?>">3. Select Templates</a>
		<!-- Tab 4 -->
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=' . Template_Kit_Export_Admin::ADMIN_MENU_SLUG . '&step=4' ) ); ?>" class="envato-tk__tab<?php echo 4 === $current_active_step ? ' envato-tk__tab--current' : ''; ?>">4. Media Metadata</a>
		<!-- Tab 5 -->
		<a href="<?php echo esc_url( admin_url( 'admin.php?page=' . Template_Kit_Export_Admin::ADMIN_MENU_SLUG . '&step=5' ) ); ?>" class="envato-tk__tab<?php echo 5 === $current_active_step ? ' envato-tk__tab--current' : ''; ?>">5. Export Template Kit</a>
	</div>
	<!-- Tab Panel-->
	<section class="envato-tk__tab-panel">
		<?php
		if ( 1 === $current_active_step || 2 === $current_active_step || 3 === $current_active_step || 4 === $current_active_step || 5 === $current_active_step ) {
			require plugin_dir_path( __FILE__ ) . 'template-kit-export-step-' . $current_active_step . '.php';
		}
		?>
	</section>
</div>
