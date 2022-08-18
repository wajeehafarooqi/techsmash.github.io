<?php
/**
 * This file implements custom requirements for the Spice Box Plugin.
 * It can be used as-is in themes (drop-in).
 *
 */
$spiko_dark_hide_install = get_option('spiko_dark_hide_customizer_companion_notice', false);
if (!function_exists('spicethemes_companion') && !$spiko_dark_hide_install) {
	if (class_exists('WP_Customize_Section') && !class_exists('Spiko_Dark_Companion_Installer_Section')) {
		/**
		 *
		 * @see WP_Customize_Section
		 */
		class Spiko_Dark_Companion_Installer_Section extends WP_Customize_Section {
			/**
			 * Customize section type.
			 *
			 * @access public
			 * @var string
			 */
			public $type = 'spiko_dark_companion_installer';

			public function __construct($manager, $id, $args = array()) {
				parent::__construct($manager, $id, $args);

				add_action('customize_controls_enqueue_scripts', 'Spiko_Dark_Companion_Installer_Section::enqueue');
			}
			/**
			 * enqueue styles and scripts
			 *
			 *
			 **/
			public static function enqueue() {
				wp_enqueue_script('plugin-install');
				wp_enqueue_script('updates');
				wp_enqueue_script('spiko-dark-companion-install', SPIKO_DARK_TEMPLATE_DIR_URI . '/admin/assets/js/plugin-install.js', array('jquery'));
				wp_localize_script('spiko-dark-companion-install', 'spiko_dark_companion_install',
					array(
						'installing' => esc_html__('Installing', 'spiko-dark'),
						'activating' => esc_html__('Activating', 'spiko-dark'),
						'error'      => esc_html__('Error', 'spiko-dark'),
						'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
					)
				);
			}
			/**
			 * Render the section.
			 *
			 * @access protected
			 */
			protected function render() {
				// Determine if the plugin is not installed, or just inactive.
				$plugins   = get_plugins();
				$installed = false;
				foreach ($plugins as $plugin) {
					if ('Spice Box' === $plugin['Name']) {
						$installed = true;
					}
				}
				$slug = 'spicebox';
				// Get the plugin-installation URL.
				$classes = 'cannot-expand accordion-section control-section-companion control-section control-section-themes control-section-' . $this->type;
				?>
				<li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="<?php echo esc_attr($classes); ?>">
					<span class="spicethemes-customizer-notification-dismiss" id="companion-install-dismiss" href="#companion-install-dismiss"> <i class="fa fa-times"></i></span>
					<?php if (!$installed): ?>
					<?php 
						$plugin_install_url = add_query_arg(
							array(
								'action' => 'install-plugin',
								'plugin' => $slug,
							),
							self_admin_url('update.php')
						);
						$plugin_install_url = wp_nonce_url($plugin_install_url, 'install-plugin_spicethemes-companion');
					 ?>
						<p><?php esc_html_e("To take advantage of this theme's features in the customizer you need to install the Spice Box plugin.", "spiko-dark");?></p>
						<a class="spicethemes-plugin-install install-now button-secondary button" href="<?php echo esc_url($plugin_install_url); ?>" aria-label="<?php esc_attr_e('Install Spice Box Now', 'spiko-dark');?>" data-name="<?php esc_attr_e('Spice Box', 'spiko-dark'); ?>">
							<?php esc_html_e('Install and activate', 'spiko-dark');?>
						</a>
					<?php else: ?>
						<?php 
							$plugin_link_suffix = $slug . '/' . $slug . '.php';
							$plugin_activate_link = add_query_arg(
								array(
									'action'        => 'activate',
									'plugin'        => rawurlencode( $plugin_link_suffix ),
									'plugin_status' => 'all',
									'paged'         => '1',
									'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
								), self_admin_url( 'plugins.php' )
							);
						?>
						<p><?php esc_html_e("You have installed the Spice Box plugin. To take advantage of this theme's features in the customizer, you need to activate it.", "spiko-dark");?></p>
						<a class="spicethemes-plugin-activate activate-now button-primary button" data-slug="spicethemes-companion" href="<?php echo esc_url($plugin_activate_link); ?>" aria-label="<?php esc_attr_e('Activate Spice Box now', 'spiko-dark');?>" data-name="<?php esc_attr_e('Spice Box', 'spiko-dark'); ?>">
							<?php esc_html_e('Activate now', 'spiko-dark');?>
						</a>
					<?php endif;?>
				</li>
				<?php
			}
		}
	}
	if (!function_exists('spiko_dark_companion_installer_register')) {
		/**
		 * Registers the section, setting & control for the Spice Box installer.
		 *
		 * @param object $wp_customize The main customizer object.
		 */
		function spiko_dark_companion_installer_register($wp_customize) {
			$wp_customize->add_section(new Spiko_Dark_Companion_Installer_Section($wp_customize, 'spiko_dark_companion_installer', array(
				'title'      => '',
				'capability' => 'install_plugins',
				'priority'   => 0,
			)));

		}
		add_action('customize_register', 'spiko_dark_companion_installer_register');
	}
}
function spiko_dark_hide_customizer_companion_notice(){
	update_option('spiko_dark_hide_customizer_companion_notice', true);
	echo true;
	wp_die();
}
add_action('wp_ajax_spiko_dark_hide_customizer_companion_notice', 'spiko_dark_hide_customizer_companion_notice');