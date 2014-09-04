<?php get_header(); ?>
		<div class="jumbotron myjumbotron">
		    <div class="container">
		        
		 	</div>
		</div>
     
		 <div style="background: rgba(109,166,221,.1);">
		 <div class="container">
		 		<div class="row">
						<div class="col-md-8">
		 						<h2 class="highlight-color">About Georgia Job T.I.P.S</h2>
								<!-- the loop for about -->
								<?php 
								// the query
								$the_query = new WP_Query( 'category_name=about' ); ?>

								<?php if ( $the_query->have_posts() ) : ?>

	 							<!-- pagination here -->

	  							<!-- the loop -->
	  							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	    						<?php the_content(); ?>
	  							<?php endwhile; ?>
	  							<!-- end of the loop -->

	  							<!-- pagination here -->

	  							<?php wp_reset_postdata(); ?>

								<?php else:  ?>
	  							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
								<?php endif; ?>

						</div>
						<div class="col-md-4">
								<div class="well well-lg mywell" style="padding:0; margin-top:10px; height:480px;">
									<div style="width:100%; height:20px; background:#6DA6DD; color:#FFF; padding-left:10px;">
										<p>News Feed</p>
									</div>											
								
										<!-- the loop for the news feed -->
										<?php 
										// the query
										$the_query = new WP_Query( 'category_name=newsfeed&posts_per_page=7' ); ?>

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
		</div><!--container -->
		</div><!--/background -->

		<div class="container">
		<div class="row">
		<div class="row" style="margin-top: 60px;">
		<div class="col-md-4">
		<div class="text-center"><span class="glyphicon glyphicon-home"></span></div>
		<h4 class="text-center highlight-color">Workshops provide instruction on Pre-Employment Skills to include the following:</h4>
		<ul>
		  <li>Career counseling</li>
		  <li>Interviewing techniques</li>
		  <li>Keyboarding skills</li>
		  <li>Resume preparation</li>
		  <li>Internet navigation</li>
		  <li>Web Application submission</li>
		  <li>Job retention strategies</li>
		</ul>
		</div>
		<div class="col-md-4">
		<div class="text-center"><span class="glyphicon glyphicon-briefcase"></span></div>
		<h4 class="text-center highlight-color">Workforce Reintegration</h4>
		Work Experience Internships provide hands-on occupational skills training to assist clients in obtaining work exposure in full-time positions for up to 3 months.

		</div>
		<div class="col-md-4">
		<div class="text-center"><span class="glyphicon glyphicon-list-alt"></span></div>
		<h4 class="text-center highlight-color">Client Criteria</h4>
		<ul>
		  <li>22 years of age or older</li>
		  <li>Must meet WIA guidelines for eligibility</li>
		</ul>
		</div>
		</div>
		</div>
		</div>
		<div style="background: rgba(109,166,221,.1); margin-top: 60px; padding-top:10px; padding-bottom:10px;">
		<div class="container">
		<div class="text-center">
		<?php 
			echo do_shortcode('[smartslider2 slider="2"]');
		?>
		<br>
		<button type="button" class="btn btn-primary btn-lg btn-block">Apply to Georgia Job T.I.P.S</button>
		<p><b>Please download and complete application. Once completed email to admin@gajobtips.com or fax to (706)322-2105</b></p>
		</div>
		</div>
		<!-- container -->

		</div>
		<!-- background-->

		
			

      

        

      <hr>

<?php get_footer(); ?>