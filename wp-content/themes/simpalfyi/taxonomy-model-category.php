<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplfyi
 */
?>
<?php
get_header();
?>
	<div id="primary" class="content-area">
	<div class="sectionComman sectionAllModulesFirst">
		<div class="container">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			<h3>Stosa Cucine provides quality modern kitchens providing the best from Italian design taste for beauty and innovation. Find out ours modern kitchens.</h3>
		</div>
	</div>	
		<main id="main" class="site-main">
		<div class="sectionComman pt-0 sectionGridView">
		<div class="container">
			<div class="rowAllModels">
		<?php if ( have_posts() ) : ?>
		<?php		
		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

	?>
		
	
				<div class="contentModels">
					<div class="contentInner">
						<h3><?php the_title(); ?></h3>	
						<h4><?php the_field('Subtitle'); ?></h4>
					</div>
					<div class="modelsImage">
						<a href="#"><?php the_post_thumbnail() ?></a>
					</div>
				</div>				
		
	<?php
endwhile; // End of the loop.		
?>
<?php	
endif;
?>	
	</div>
		</div>
	</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php
// get_sidebar();
get_footer();
?>