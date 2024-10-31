<?php 
/*
Plugin Name: Schema Ninja
Plugin URI: http://schemaninja.com
Description: Free Lite version of Schema Ninja Plugin. Use it to increase your engagment, google schema rating or recommendation products in any post or pages. This Plugin is Founded by <a target="_blank" href="http://www.bloggersideas.com/">Jitendra Vaswani</a>
Author: Jitendra Vaswani
Version: 2.3.5
Author URI: http://jitendra.co?sch_free
Copyright: (c) 2016 Jitendra Vaswani(schemaninja.com)
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
} // Exit if accessed directly
define( 'SCH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );	
define( 'SCH_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SCH_PLUGIN_VERSION', '2.3.5' );	
	
//Review
include( SCH_PLUGIN_PATH . 'modules/review.php' );
//Recommendation	
include( SCH_PLUGIN_PATH . 'modules/recommendation.php');

//include plugin stylesheet
function schemaninja_scripts() {
	wp_enqueue_style( 'schema-ninja-style', SCH_PLUGIN_URL.'style.css',false,SCH_PLUGIN_VERSION,'all');
	wp_enqueue_style( 'fontawesome', SCH_PLUGIN_URL.'assets/font-awesome/css/font-awesome.min.css',false,SCH_PLUGIN_VERSION,'all');
	wp_enqueue_style( 'review-circle', SCH_PLUGIN_URL.'assets/css/circle.css',false,SCH_PLUGIN_VERSION,'all');
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','schemaninja_scripts' );
function sch_ninja_admin_scripts() {
	wp_enqueue_style( 'schema-ninja-tabs', SCH_PLUGIN_URL.'assets/css/tabs.css',false,SCH_PLUGIN_VERSION,'all');
	wp_enqueue_style( 'fontawesome-schema-admin',SCH_PLUGIN_URL.'assets/font-awesome/css/font-awesome.min.css',false,SCH_PLUGIN_VERSION,'all');
	wp_enqueue_style( 'css-schema-admin',SCH_PLUGIN_URL.'assets/css/css-schema-admin.css',false,SCH_PLUGIN_VERSION,'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jscolor',SCH_PLUGIN_URL.'assets/js/jscolor.js');
	wp_enqueue_script('tabs',SCH_PLUGIN_URL.'assets/js/tabs.js');
	}
add_action( 'admin_enqueue_scripts', 'sch_ninja_admin_scripts',99 );
function sch_ninja_remove_row_actions( $actions )
{
    if( get_post_type() === 'reviews' ){
        unset( $actions['view'] );
}
    return $actions;
}
add_filter( 'post_row_actions', 'sch_ninja_remove_row_actions', 10, 1 );
 function schema_admin(){
 	include_once(SCH_PLUGIN_PATH .'schema-admin.php');
 }
function sch_ninja_admin_notice(){
	if(get_option('schema_ninja_active')!=1){
    echo '<div class="error">
       <p>You must activate the SchemaNinja plugin in order to use it. Activate it from <a href="'.get_site_url().'/wp-admin/options-general.php?page=SchemaNinja">here</a>.<p>
    </div>';
	}	
}
add_action('admin_notices', 'sch_ninja_admin_notice');
function sch_ninja_wpdocs_register_my_setting() {
    register_setting( 'my-options-group', 'my-option-name', 'intval' ); 
} 
add_action( 'admin_init', 'sch_ninja_wpdocs_register_my_setting' );
function sch_ninja_wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Schema Ninja', 'textdomain' ),
        'Schema Ninja',
        'manage_options',
        'SchemaNinja',
        'schema_admin',
         plugin_dir_url( __FILE__ ).'assets/img/menu-icon.png',
        99
    );
}
add_action('wp_head','sch_ninja_add_custom_css_code_schema');
function sch_ninja_add_custom_css_code_schema(){
	$revcss=get_option('schema_ninja_review_custom_css');
	$reccss=get_option('schema_ninja_recom_custom_css');
if(strlen($revcss)>0)
 {
echo '<style>'.$revcss.'</style>';
 }
if(strlen($reccss)>0){
echo '<style>'.$reccss.'</style>';
 }
}
add_action( 'admin_menu', 'sch_ninja_wpdocs_register_my_custom_menu_page' );
add_action( 'template_redirect', 'schema_1234_redirect_post' );
add_filter('widget_text', 'do_shortcode');
function schema_1234_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ('recommendations' ==  $queried_post_type ) {
    wp_redirect( home_url(), 301 );
    exit;
  }
}
class wp_preview_meta {
	private $doing_preview = false;
	public function __construct() {
		add_filter( 'add_post_metadata', 	array( $this, 'add' 	), 10, 5 );
		add_filter( 'update_post_metadata', 	array( $this, 'update' 	), 10, 5 );
		add_filter( 'delete_post_metadata', 	array( $this, 'delete' 	), 10, 5 );
		add_filter( 'get_post_metadata', 	array( $this, 'get' 	), 10, 4 );
	}
	public function is_preview() {
		if( is_admin() )
			return !$this->doing_preview && isset($_POST[ 'wp-preview' ]) && $_POST['wp-preview'] == 'dopreview';
		// And on the front end: (props @yrosen)
		return ! $this->doing_preview && isset( $_GET[ 'preview' ] ) && $_GET[ 'preview' ] == 'true';
			}
	private function mod_key( $key ) {
	if ( strlen( $key ) > 50 )
		$key = md5( $key );
		return "_preview__{$key}";
	}
	public function __call( $method, $args ) {
		if ( ! $this->is_preview() || ! function_exists( "{$method}_metadata" ) )
			return $args[0];
	// replace $check with $meta_type
		$args[ 0 ] = 'post';
	// modify key
		$args[ 2 ] = $this->mod_key( $args[ 2 ] );
	// call original function but make sure we don't get stuck in a loop
		$this->doing_preview = true;
		$result = call_user_func_array( "{$method}_metadata", $args );
		$this->doing_preview = false;
		return $result;
	}
}
$wp_preview_meta = new wp_preview_meta();