<?php 
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage disrupcao_cognitiva
 * @since Disrupção Cognitiva 1.0
 */
include 'header2.php'; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row-fluid">
				<section class="container-fluid">
					<div class="col-xs-12 col-sm-12 col-md-12 page_conteudo">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'page' );
					?>
							<h1> <?php echo the_title(); ?> </h1>
					<?php
							the_content(); 

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						// End the loop.
						endwhile;
						?>

					</div>
				</section>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
