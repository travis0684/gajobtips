<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage mytheme
 * @since 
 */

get_header(); ?>
<div class="jumbotron myjumbotron">
	<div class="container">
		        
	</div>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	<div class="container">

		<div class="row">

			<div class="col-md-8">
				<?php
				$post_7 = get_post(); 
				$title = $post_7->post_title;
				?> 
				<?php add_image_size( 'fit', '240px', '270px'); ?>
				<h2><?php echo $title; ?></h2>
				<div class="row">
					<div class="col-md-4">
						<?php echo do_shortcode('[gallery size="fit"]'); ?>
					</div>
					<div class="col-md-8">
						<?php
						ob_start();

						the_content('Read the full post',true);

						$postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());

						ob_end_clean();

						echo $postOutput; ?>
					</div>					
				</div>
			</div>

			<div class="col-md-4">


				<div class="well well-lg mywell" style="padding:0; margin-top:10px; height:700px;">

					<div style="width:100%; height:20px; background:#6DA6DD; color:#FFF; padding-left:10px;">
						<p>News Feed</p>
					</div>											
								
					<!-- the loop for the news feed -->
					<?php 
					// the query
					$the_query = new WP_Query( 'category_name=newsfeed&posts_per_page=12' ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

	 				<!-- pagination here -->

	  				<!-- the loop -->
	  				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


	  				<div class="row" style="width:100%; padding-left:10px;">

	  					<div class="col-md-2 text-center" style="margin-top:10px">
	  						<span class="fa fa-file-text"></span>
	  					</div>

	  					<div class="col-md-7">
	  						<h4><b><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></b></h4>
	  					</div>

	  					<div class="col-md-3 text-right">
	  						<?php the_time('F j, Y'); ?>
	  					</div>
	  				</div>


	  				<hr class="mylinebreak">
										
	  				<?php endwhile; ?>
	  				<!-- end of the loop -->

	  				<!-- pagination here -->

	  				<?php wp_reset_postdata(); ?>

					<?php else:  ?>
	  				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>

				</div><!-- /well -->
				
				
			</div>

		</div>
		
	</div>





<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<hr>

<?php get_footer(); ?>