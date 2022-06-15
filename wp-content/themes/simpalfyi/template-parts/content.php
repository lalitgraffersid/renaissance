<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplfyi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="boxMainBanner">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					simplfyi_by_alfyi_posted_on();
					simplfyi_by_alfyi_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	</div>
	<div class="mainbreadcrumbs">
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>	
	</div>
	<div class="blogInnerRow">
		<div class="blogLeftColumn">
			<?php simplfyi_by_alfyi_post_thumbnail(); ?>
			<div class="entry-content">
			
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'simplfyi_by_alfyi' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simplfyi_by_alfyi' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		</div>
		<div class="blogRightColumn">
			<?php
				get_sidebar();
			?>
		</div>
	</div>

<!-- 
	<footer class="entry-footer">
		<?php simplfyi_by_alfyi_entry_footer(); ?>
	</footer>.entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
