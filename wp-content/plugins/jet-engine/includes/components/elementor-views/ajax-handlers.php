<?php
/**
 * Class description
 *
 * @package   package_name
 * @author    Cherry Team
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Jet_Engine_Elementor_Ajax_Handlers' ) ) {

	class Jet_Engine_Elementor_Ajax_Handlers {

		public function __construct() {
			add_action( 'wp_ajax_jet_engine_elementor', array( $this, 'handle_ajax' ) );
			add_action( 'wp_ajax_nopriv_jet_engine_elementor', array( $this, 'handle_ajax' ) );
		}

		/**
		 * Handle AJAX request
		 *
		 * @return [type] [description]
		 */
		public function handle_ajax() {

			if ( ! isset( $_REQUEST['handler'] ) || ! is_callable( array( $this, $_REQUEST['handler'] ) ) ) {
				return;
			}

			call_user_func( array( $this, $_REQUEST['handler'] ) );

		}

		/**
		 * Load more
		 * @return [type] [description]
		 */
		public function listing_load_more() {

			$query           = ! empty( $_REQUEST['query'] ) ? $_REQUEST['query'] : array();
			$widget_settings = ! empty( $_REQUEST['widget_settings'] ) ? $_REQUEST['widget_settings'] : array();

			$data = array(
				'id'         => 'jet-listing-grid',
				'elType'     => 'widget',
				'settings'   => $widget_settings,
				'elements'   => array(),
				'widgetType' => 'jet-listing-grid',
			);

			$widget = Elementor\Plugin::$instance->elements_manager->create_element_instance( $data );

			if ( ! $widget ) {
				throw new \Exception( 'Widget not found.' );
			}

			do_action( 'jet-engine/elementor-views/ajax/load-more', $widget );

			ob_start();

			$base_class       = 'jet-listing-grid';
			$equal_cols_class = '';

			if ( ! empty( $widget_settings['equal_columns_height'] ) ) {
				$equal_cols_class = 'jet-equal-columns';
			}

			jet_engine()->listings->data->set_listing(
				Elementor\Plugin::$instance->documents->get_doc_for_frontend( $widget_settings['lisitng_id'] )
			);

			$listing_source = jet_engine()->listings->data->get_listing_source();
			$page           = ! empty( $_REQUEST['page'] ) ? absint( $_REQUEST['page'] ) : 1;
			$query['paged'] = $page;

			switch ( $listing_source ) {

				case 'posts':
					$offset          = ! empty( $query['offset'] ) ? absint( $query['offset'] ) : 0;
					$query['offset'] = $offset + ( $page - 1 ) * absint( $widget_settings['posts_num'] );
					$posts_query     = new WP_Query( $query );
					$posts           = $posts_query->posts;
					break;

				case 'terms':
					$offset          = ! empty( $query['offset'] ) ? absint( $query['offset'] ) : 0;
					$query['offset'] = $offset + ( $page - 1 ) * absint( $widget_settings['posts_num'] );
					$posts           = get_terms( $query );
					break;

				case 'users':

					$query['offset'] = ( $page - 1 ) * absint( $widget_settings['posts_num'] );
					$user_query      = new WP_User_Query( $query );
					$posts           = (array) $user_query->get_results();

					break;
			}

			if ( 1 < $query['paged'] ) {
				$start_from = ( $query['paged'] - 1 ) * absint( $widget_settings['posts_num'] ) + 1;
			} else {
				$start_from -= false;
			}

			$render_instance = jet_engine()->listings->get_render_instance( 'listing-grid', $widget_settings );

			$render_instance->posts_loop(
				$posts,
				$widget_settings,
				$base_class,
				$equal_cols_class,
				$start_from
			);

			wp_send_json_success( array( 'html' => ob_get_clean() ) );
		}

	}

}