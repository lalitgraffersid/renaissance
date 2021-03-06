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

if ( ! class_exists( 'Jet_Engine_Elementor_Frontend' ) ) {

	/**
	 * Define Jet_Engine_Elementor_Frontend class
	 */
	class Jet_Engine_Elementor_Frontend {

		private $processed_listing_id = null;

		/**
		 * Constructor for the class
		 */
		public function __construct() {
			add_action( 'elementor/frontend/after_enqueue_scripts', array( jet_engine()->frontend, 'frontend_scripts' ) );
			add_action( 'elementor/frontend/after_enqueue_styles',  array( jet_engine()->frontend, 'frontend_styles' ) );
			add_action( 'elementor/preview/enqueue_scripts',        array( jet_engine()->frontend, 'preview_scripts' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'maybe_enqueue_listing_css' ) );
			add_action( 'jet-engine/locations/enqueue-location-css', array( $this, 'loc_enqueue_listing_css' ) );
		}

		/**
		 * Returns listing content for given listing ID
		 *
		 * @param  $listing_id
		 * @return string
		 */
		public function get_listing_content( $listing_id ) {

			$this->processed_listing_id = $listing_id;
			add_filter( 'elementor/frontend/the_content', array( $this, 'add_link_to_content' ) );
			$content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $listing_id );
			remove_filter( 'elementor/frontend/the_content', array( $this, 'add_link_to_content' ) );
			$this->processed_listing_id = null;

			return $content;
		}

		/**
		 * Add listing link to content
		 *
		 * @param $content
		 * @return string
		 */
		public function add_link_to_content( $content ) {

			if ( ! $this->processed_listing_id ) {
				return $content;
			}

			$document = Elementor\Plugin::$instance->documents->get_doc_for_frontend( $this->processed_listing_id );

			if ( ! $document ) {
				return $content;
			}

			$settings = $document->get_settings();

			if ( empty( $settings ) || empty( $settings['listing_link'] ) ) {
				return $content;
			}

			$source = ! empty( $settings['listing_link_source'] ) ? $settings['listing_link_source'] : '_permalink';

			if ( '_permalink' === $source ) {
				$url = jet_engine()->listings->data->get_current_object_permalink();
			} elseif ( 'options_page' === $source ) {
				$option = ! empty( $settings['dynamic_link_option'] ) ? $settings['dynamic_link_option'] : false;
				$url    = jet_engine()->listings->data->get_option( $option );
			} elseif ( $source ) {
				$url = jet_engine()->listings->data->get_meta( $source );
			}

			$overlay_attrs = array(
				'class'    => 'jet-engine-listing-overlay-wrap',
				'data-url' => $url,
			);

			$link_attrs = array(
				'href'  => $url,
				'class' => 'jet-engine-listing-overlay-link',
			);

			$open_in_new = isset( $settings['listing_link_open_in_new'] ) ? $settings['listing_link_open_in_new'] : '';
			$rel_attr    = isset( $settings['listing_link_rel_attr'] ) ? $settings['listing_link_rel_attr'] : '';

			if ( $open_in_new ) {
				$overlay_attrs['data-target'] = '_blank';
				$link_attrs['target']         = '_blank';
			}

			if ( $rel_attr ) {
				$link_attrs['rel'] = $rel_attr;
			}

			$link = sprintf( '<a %s></a>', Jet_Engine_Tools::get_attr_string( $link_attrs ) );

			return sprintf(
				'<div %3$s>%1$s%2$s</div>',
				$content,
				$link,
				Jet_Engine_Tools::get_attr_string( $overlay_attrs )
			);
		}


		/**
		 * Check if current page build with elementor and contain listing - enqueue listing CSS in header
		 * Do this to avoid unstyled content flashing on page load
		 *
		 * @param $post_id
		 */
		public function maybe_enqueue_listing_css( $post_id = null ) {

			if ( ! $post_id ) {
				$post_id = get_the_ID();
			}

			if ( ! $post_id ) {
				return;
			}

			$elementor_data = get_post_meta( $post_id, '_elementor_data', true );

			if ( ! $elementor_data ) {
				return;
			}

			if ( is_array( $elementor_data ) ) {
				$elementor_data = json_encode( $elementor_data );
			}

			preg_match_all( '/[\'\"]lisitng_id[\'\"]\:[\'\"](\d+)[\'\"]/', $elementor_data, $matches );

			if ( empty( $matches[1] ) ) {
				return;
			}

			foreach ( $matches[1] as $listing_id ) {

				if ( class_exists( 'Elementor\Core\Files\CSS\Post' ) ) {
					$css_file = new Elementor\Core\Files\CSS\Post( $listing_id );
				} else {
					$css_file = new Elementor\Post_CSS_File( $listing_id );
				}

				$css_file->enqueue();
			}

		}

		/**
		 * [loc_enqueue_listing_css description]
		 * @param $template_id
		 */
		public function loc_enqueue_listing_css( $template_id ) {
			$this->maybe_enqueue_listing_css( $template_id );
		}
	}

}
