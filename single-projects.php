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
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <p class="strong">Status</p>
                                <p><?php the_field('status') ?></p>
                                <p class="strong">Location</p>
                                <p><?php the_field('location_text') ?></p>
                                <p class="strong">Developer</p>
                                <p><?php the_field('developer') ?></p>
                                <p class="strong">General partner of EB5 investors</p>
                                <p><?php the_field('general_partner_of_eb5_investors') ?></p>
                                <p class="strong">Regional Center</p>
                                <p><?php the_field('regional_center') ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="strong">Counselor Attorney</p>
                                <p><?php the_field('counselor_attorney') ?></p>
                                <p class="strong">EB5 Capital Raise</p>
                                <p>$<?php the_field('eb5_capital_raise') ?></p>
                                <p class="strong">Total Project Capital</p>
                                <p>$<?php the_field('total_project_capital') ?></p>
                                <p class="strong">Total Jobs Impact</p>
                                <p><?php the_field('total_jobs_impact') ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sidebar">
                        <h5 class="brown">Baixar Apresentação</h5>
                        <p>For more details download the project brochure</p>
                        <?php get_template_part('include/optin')?>
                        <?php if(get_field('video_button')):?>
                        <h5 class="brown mb-3 mt-5">Videos</h5>
                        <p><a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-video"></i> <?php the_field('video_button')?></a></p>
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Videos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php the_field('video_emeb')?>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php endif;?>
                        <p class="brown mt-5">
                            <strong>
                            <?php if($currentlang=='es'){
                                echo 'Proyectos relacionados';
                            }
                            elseif($currentlang=='pt-br'){
                                echo 'Projectos relacionados';
                            }?>
                            </strong>
                        </p>
						<?php
                            $currentID = get_the_ID();
                            // Query Arguments
                            $args = array(
                                'post_type' => array('projects'),
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
						
							<div class="card mb-3">
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

<?php //get_sidebar(); ?>

<?php get_template_part('include/footercta_pt'); get_footer(); ?>
