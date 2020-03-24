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
            <div class="d-none"><?php 
            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
            echo $category_id;
            ?></div>
            <!-- <div class="projectTop my-5 container">
                <div class="projectImage">
                    <?php //the_post_thumbnail('projects'); // Fullsize image for the single post ?>
                </div>
            </div> -->
            <div class="container projectContent mt-4">
                <div class="row">
                    <div class="col-md-8">
                    <div class="projectImage">
                    <?php the_post_thumbnail('projects'); // Fullsize image for the single post ?>
                </div>
                        <span class="projectCat"><?php echo $pc[0]->name; ?></span>
                        <span class="projectLocation"><?php echo $location->name; ?></span>
                        <!-- badge -->
                        <?php
                                if ($posttags) {
                                    foreach($posttags as $tag) {
                                      echo '<p class="badge badge-secondary">' . $tag->name . '</p>'; 
                                    }
                                  }
                            ?>
                        <!-- badge -->
                        <h1 class="brown"><?php the_title(); ?></h1>
                        <?php the_content();?>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <?php
                                    $statuss         = get_field('status');
                                    $location_text  = get_field('loctation_text');
                                    $developer      = get_field('developer');
                                    $partner        = get_field('general_partner_of_eb5_investors');
                                    $regional       = getfield('regional_center');
                                ?>

                                <?php if($statuss):?>
                                    <p class="strong">Status</p>
                                    <p><?php echo $statuss; ?></p>
                                <?php endif;?>
                                
                                <?php if($location_text):?>
                                    <p class="strong">Location</p>
                                    <p><?php echo $location_text; ?></p>
                                <?php endif;?>

                                <?php if($developer):?>
                                    <p class="strong">Developer</p>
                                    <p><?php echo $developer; ?></p>
                                <?php endif;?>
                                <?php if ($pc[0]->name == 'EB5') :?>
                                    <?php if($partner):?>
                                        <p class="strong">General partner of EB5 investors</p>
                                        <p><?php echo $partner; ?></p>
                                    <?php endif;?>

                                    <?php if($regional):?>
                                        <p class="strong">Regional Center</p>
                                        <p><?php echo $regional; ?></p>
                                    <?php endif;?>

                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <p class="strong">Counselor Attorney</p>
                                <p><?php the_field('counselor_attorney') ?></p>
                                <?php if ($pc[0]->name == 'EB5') :?>
                                    <?php if(get_field('eb5_capital_raise')):?>
                                        <p class="strong">EB5 Capital Raise</p>
                                        <p>$<?php the_field('eb5_capital_raise') ?></p>
                                    <?php endif;?>
                                    <?php if(get_field('total_project_capital')):?>
                                        <p class="strong">Total Project Capital</p>
                                        <p>$<?php the_field('total_project_capital') ?></p>
                                    <?php endif;?>
                                <?php endif;?>
                                <?php if(get_field('total_jobs_impact')):?>
                                    <p class="strong">Total Jobs Impact</p>
                                    <p><?php the_field('total_jobs_impact') ?></p>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sidebar">
                        <?php if(get_field('url')): ?>
                        <h5 class="brown">
                        <?php
                            if($currentlang == 'pt-br'){
                                echo 'Baixar Apresentação';
                            }elseif($currentlang == 'es'){
                                echo 'Descargar Folleto';
                            }else{
                                echo 'Download Brochure';
                            }
                        ?>
                        </h5>
        
                        <?php
                            if($currentlang == 'pt-br'){
                                echo '<p>Para mais detalhes, baixe o folheto do projeto</p>';
                            }elseif($currentlang == 'es'){
                                echo '<p>Para mas detalles descarge el folleto</p>';
                            }else{
                                echo '<p>For more information download the brochure</p>';
                            }
                        ?>
                        <?php 
                        echo do_shortcode('[gravityform id="3" field_values="language=' . $currentlang . '&campaign=' . $campaign . '&source=' . $source . '&medium=' . $medium . '&term=' . $term . '&content=' . $content . '&urlsource=' . $urlSource. '" title="false" description="false" ]');
                        //get_template_part('include/optin')
                        endif;?>
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
                            }else{
                                echo 'Related projects';
                            }
                        ?>
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
