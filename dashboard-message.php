<?php
/**
 * Plugin Name:       Dashboard Message
 * Plugin URI:        itushar.me/dashboard-message
 * Description:       Show Status message on the WordPress admin dashboard page.
 * Version:           1.0.0
 * Requires at least: 5.7
 * Requires PHP:      5.6
 * Author:            tusharimran
 * Author URI:        https://itushar.me/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dashboard-message
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

final class DashboardMessage
{
    private function __construct()
    {
        $this->define_constants();
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }
    public function define_constants()
    {
        /**
         * Defines CONSTANTS for Whole plugins.
         */
        define('DASHBOARDMESSAGE_VERSION', '1.0.0');
        define('DASHBOARDMESSAGE_PLUGIN_FILE', __FILE__);
        define('DASHBOARDMESSAGE_PLUGIN_BASENAME', plugin_basename(__FILE__));
        define('DASHBOARDMESSAGE_PLUGIN_SLUG', 'dashboard-message');
        define('DASHBOARDMESSAGE_PLUGIN_ROOT_URI', plugins_url("/", __FILE__));
        define('DASHBOARDMESSAGE_ROOT_DIR_PATH', plugin_dir_path(__FILE__));
        define('DASHBOARDMESSAGE_ADMIN_VIEW_PATH', DASHBOARDMESSAGE_ROOT_DIR_PATH . 'includes/Admin/Views/');
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin()
    {
        $this->load_textdomain();
        $this->dispatch_action();
        \DashboardMessage\Migration::init();
        if (is_admin()) {
            \DashboardMessage\Admin::init();
        }
    }

    public function load_textdomain()
    {
        load_plugin_textdomain(
            'dashboard-message',
            false,
            dirname(DASHBOARDMESSAGE_PLUGIN_BASENAME) . '/languages'
        );
    }

    public function dispatch_action()
    {
    }

    public function activate()
    {
        DashboardMessage\Installer::init();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \DashboardMessage
 */
function DashboardMessage_Start()
{
    return DashboardMessage::init();
}

// Plugin Start
DashboardMessage_Start();
