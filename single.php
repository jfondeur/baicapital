<?php get_header(); 
global $currentlang;

?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container projectContent mt-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="projectImage mb-3">
                            <?php the_post_thumbnail('project'); // Fullsize image for the single post ?>
                        </div>
                        <h1 class="brown"><?php the_title(); ?></h1>
                        <?php the_content();?>
                    </div>
                    <div class="col-md-4 sidebar">
                        <div class="sidebarCta border rounded d-none">
                            <img src="https://baicapital.com/wp-content/uploads/2018/09/rawpixel-743067-unsplash-1.jpg" alt="">
                            <div class="p-2">
                                <span class="brown"><strong>Newsletter</strong></span>
                                <?php if($currentlang == 'pt-br'){
                                    echo '<p>Se inscreva e receba atualizações importantes no seu email</p>';
                                    get_template_part('include/optin');
                                }elseif($currentlang == 'es'){
                                    echo '<p>Si inscribe y recibe actualizaciones importantes en su correo electrónico</p>';
                                    get_template_part('include/optin-es');
                                }elseif($currentlang == 'en'){
                                    echo '<p>Sign up for important email updates</p>';
                                    get_template_part('include/optin-en');
                                }?>
                            </div>
                        </div>
                        
						<p class="brown">
                            <strong>
                            <?php if($currentlang=='es'){
                                echo 'Articulos relacionados';
                            }
                            elseif($currentlang=='pt-br'){
                                echo 'Artigos relacionados';
                            }else{
                                echo 'Related articles';
                            }
                            ?>
                            </strong>
                        </p>
						<?php
                            $currentID = get_the_ID();
                            // Query Arguments
                            $args = array(
                                'post_type' => array('post'),
                                'posts_per_page' => 2,
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
                            //$location = get_field('location');
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
                    <br>
                        <?php if($currentlang=='es'){
                            //facebook ES
                            echo '<div class="fb-page" data-href="https://www.facebook.com/baicapitallatam/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/baicapitallatam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/baicapitallatam/">Become American Investor Es</a></blockquote></div>';
                        }
                        elseif($currentlang=='pt-br'){
                            //facebook PT-BR
                            echo '<div class="fb-page" data-href="https://www.facebook.com/baicapitalbrasil/" data-tabs="timeline" data-width="350px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/baicapitalbrasil/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/baicapitalbrasil/">Become American Investor</a></blockquote></div>';
                        }?>
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

<?php get_template_part('include/footercta_pt');
get_footer(); ?>
