<?php get_header(); 
$location = get_field('location');
$pc = get_the_category();
global $currentlang;

?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="projectTop my-5 container">
                <div class="projectImage">
                    <?php the_post_thumbnail('projects'); // Fullsize image for the single post ?>
                </div>
            </div>
            <div class="container projectContent">
                <div class="row">
                    <div class="col-md-8">
                        <span class="projectCat"><?php echo $pc[0]->name; ?></span>
                        <span class="projectLocation"><?php echo $location->name; ?></span>
                        <h1 class="brown"><?php the_title(); ?></h1>
                        <?php the_content();?>
                    </div>
                    <div class="col-md-4 sidebar">
                        <span class="brown"><strong>Newsletter</strong></span>
                        <p>Se inscreva e receba atualizações importantes no seu email</p>
                        <?php get_template_part('include/optin')?>
						<p class="brown mt-5">
                            <strong>
                            <?php if($currentlang=='es'){
                                echo 'Articulos relacionados';
                            }
                            elseif($currentlang=='pt-br'){
                                echo 'Artigos relacionados';
                            }?>
                            </strong>
                        </p>
						<?php
                            $currentID = get_the_ID();
                            // Query Arguments
                            $args = array(
                                'post_type' => array('post'),
                                'posts_per_page' => 3,
                                'post__not_in' => array($currentID),
                            );

                            // The Query
                            $projects = new WP_Query( $args );

                            // The Loop
                            if ( $projects->have_posts() ) : ?>
                            <?php while ( $projects->have_posts() ) : $projects->the_post(); 
                            $i++;
                            $project_img_url = get_the_post_thumbnail_url(get_the_ID(),'project');
                            $project_title = get_the_title();
                            $link = get_the_permalink(); 
                            $location = get_field('location');
                            $c = get_the_category();
                        ?>
						<!-- Custom loop -->
						
							<div class="card">
								<a href="<?php echo $link; ?>">
									<img class="card-img-top" src="<?php echo esc_url($project_img_url) ?>" alt="Card image cap">
								</a>
								<div class="card-body">
									<div class="d-flex justify-content-between">
										<a href="<?php echo $link ?>" class="brown">
                                            <h5 class="card-title"><?php echo $project_title;?></h5>
                                        </a>
										<p class="card-text"><?php echo $location->name; ?></p>
									</div>
									<p class="card-text"><?php echo $c[0]->cat_name; ?></p>
								</div>
							</div>
						
						<!-- Custom loop -->
					<?php endwhile; 
					
					endif; ?>
				
					<?php wp_reset_postdata();?>
					<!-- Loop -->
                    </div>
                </div>
            </div>
		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>


	</section>
	<!-- /section -->
	</main>

<?php get_template_part('include/footercta_pt');get_footer(); ?>
