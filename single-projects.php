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
                    <?php the_post_thumbnail('project'); // Fullsize image for the single post ?>
                </div>
                        <!-- <span class="projectCat"><?php //echo $pc[0]->name; ?></span> -->
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
                                    $location_text    = get_field('loctation_text');
                                    $developer      = get_field('developer');
                                    $partners        = get_field('general_partner_of_eb5_investors');
                                    $regional       = get_field('regional_center');
                                ?>

                                <?php if($statuss):?>
                                    <p class="strong">
                                    <?php
                                        if($currentlang == 'pt-br'){
                                            echo 'Status';
                                        }elseif($currentlang == 'es'){
                                            echo 'Estatus';
                                        }else{
                                            echo 'Status';
                                        }
                                    ?>
                                    </p>
                                    <p><?php echo $statuss; ?></p>
                                <?php endif;?>
                                
                                <?php if($location_text):?>
                                    <p class="strong"> 
                                    <?php
                                        if($currentlang == 'pt-br'){
                                            echo 'Localização';
                                        }elseif($currentlang == 'es'){
                                            echo 'Ubicación';
                                        }else{
                                            echo 'Location';
                                        }
                                    ?>
                                    </p>
                                    <p><?php echo $location_text; ?></p>
                                <?php endif;?>

                                <?php if($developer):?>
                                    <p class="strong">
                                    <?php
                                        if($currentlang == 'pt-br'){
                                            echo 'Desenvolvedor';
                                        }elseif($currentlang == 'es'){
                                            echo 'Desarrollador';
                                        }else{
                                            echo 'Developer';
                                        }
                                    ?>
                                    </p>
                                    <p><?php echo $developer; ?></p>
                                <?php endif;?>
                                
                                <?php if($partners):?>
                                    <p class="strong">
                                    <?php
                                        if($currentlang == 'pt-br'){
                                            echo 'General partner of EB5 investors';
                                        }elseif($currentlang == 'es'){
                                            echo 'Socio general de inversores EB5';
                                        }else{
                                            echo 'General partner of EB5 investors';
                                        }
                                    ?>
                                    </p>
                                    <p><?php echo $partners; ?></p>
                                <?php endif;?>

                                <?php if($regional):?>
                                    <p class="strong">
                                    <?php
                                        if($currentlang == 'pt-br'){
                                            echo 'Centro Regional';
                                        }elseif($currentlang == 'es'){
                                            echo 'Centro Regional';
                                        }else{
                                            echo 'Regional Center';
                                        }
                                    ?>
                                    </p>
                                    <p><?php echo $regional; ?></p>
                                <?php endif;?>

                
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $attorney = get_field('counselor_attorney');
                                ?>
                                <?php if($attorney):?>
                                    <p class="strong">
                                    <?php
                                        if($currentlang == 'pt-br'){
                                            echo 'Despacho de Abogados';
                                        }elseif($currentlang == 'es'){
                                            echo 'Representante Legal';
                                        }else{
                                            echo 'Counselor Attorney';
                                        }
                                    ?>
                                    </p>
                                    <p><?php echo $attorney; ?></p>
                                <?php endif;?>
                                <?php if ($pc[0]->name == 'EB5') :?>
                                    <?php if(get_field('eb5_capital_raise')):?>
                                        <p class="strong">
                                        <?php
                                            if($currentlang == 'pt-br'){
                                                echo 'EB5 Capital Raise';
                                            }elseif($currentlang == 'es'){
                                                echo 'Total Capital EB5';
                                            }else{
                                                echo 'EB5 Capital Raise';
                                            }
                                        ?>
                                        </p>
                                        <p>$<?php the_field('eb5_capital_raise') ?></p>
                                    <?php endif;?>
                                    <?php if(get_field('total_project_capital')):?>
                                        <p class="strong">
                                        <?php
                                            if($currentlang == 'pt-br'){
                                                echo 'Total Project Capital';
                                            }elseif($currentlang == 'es'){
                                                echo 'Capital Total Proyecto';
                                            }else{
                                                echo 'Total Project Capital';
                                            }
                                        ?>
                                        </p>
                                        <p>$<?php the_field('total_project_capital') ?></p>
                                    <?php endif;?>
                                <?php endif;?>
                                <?php if(get_field('total_jobs_impact')):?>
                                    <p class="strong">
                                    <?php
                                            if($currentlang == 'pt-br'){
                                                echo 'Impacto total de empregos';
                                            }elseif($currentlang == 'es'){
                                                echo 'Creación de Empleos';
                                            }else{
                                                echo 'Total Jobs Impact';
                                            }
                                        ?></p>
                                    <p><?php the_field('total_jobs_impact') ?></p>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="related projects">
                        <h5 class="brown mt-3">
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
                        </h5>
                        <?php
                                $currentID = get_the_ID();
                                // Query Arguments
                                $args = array(
                                    'post_type' => array('projects'),
                                    'posts_per_page' => 2,
                                    'post__not_in' => array($currentID),
                                    'orderby' => 'rand',
                                );

                                // The Query
                                $projects = new WP_Query( $args );

                                // The Loop
                                if ( $projects->have_posts() ) : ?>
                                <div class="row">
                                <?php while ( $projects->have_posts() ) : $projects->the_post(); 
                                $i++;
                                $project_img_url = get_the_post_thumbnail_url(get_the_ID(),'project');
                                $project_title  = get_the_title();
                                $link           = get_the_permalink(); 
                                $location       = get_field('location');
                                $c              = get_the_category();
                                $posttags       = get_the_tags();
                                $type_eb5       = get_field('type_eb5');
                                $type_equity    = get_field('type_equity');
                                ?>
                                    <!-- Custom loop -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <a href="<?php echo $link; ?>">
                                                <img class="card-img-top" src="<?php echo esc_url($project_img_url) ?>" alt="Card image cap">
                                            </a>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="card-title brown"><?php echo $project_title;?></h5>
                                                    <p class="card-text"><?php echo $location->name; ?></p>
                                                </div>
                                                <?php if ($catName == 'eb5-en'):?>
                                                    <p class="card-text"><?php echo "EB5" . " - " . $type_eb5; ?></p>
                                                <?php elseif($catName == 'equity-en'):?>
                                                    <p class="card-text"><?php echo "Equity" . " - " . $type_equity; ?></p>
                                                <?php endif; ?>
                                                <?php if ($catName == 'eb5-es'):?>
                                                    <p class="card-text"><?php echo "EB5" . " - " . $type_eb5; ?></p>
                                                <?php elseif($catName == 'equity-es'):?>
                                                    <p class="card-text"><?php echo "Equity" . " - " . $type_equity; ?></p>
                                                <?php endif; ?>
                                                <a href="<?php echo $link; ?>" class="btn btn-primary btn-sm">
                                                <?php
                                                if($currentlang=='es'){
                                                    echo 'Más información';
                                                }
                                                elseif($currentlang=='pt-br'){
                                                    echo 'Saber mais';
                                                }else{
                                                    echo 'Learn more';
                                                }
                                                ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Custom loop -->
                                <?php 
                            if($i % 3 === 0): echo '</div><div class="row mt-5">'; endif;    
                            endwhile; 
                                
                                endif; ?>
                                </div> 
                                <?php wp_reset_postdata();?>
                                <!-- Loop -->
                        </div>
                    </div>
                    <div class="col-md-4 sidebar">
                        <?php //if(get_field('url')): ?>
                        <!-- <h5 class="brown"> -->
                        <?php
                            // if($currentlang == 'pt-br'){
                            //     echo 'Baixar Apresentação';
                            // }elseif($currentlang == 'es'){
                            //     echo 'Descargar Folleto';
                            // }else{
                            //     echo 'Download Brochure';
                            // }

                            if($currentlang == 'es'){
                                $gravityID = 7;
                            }elseif ($currentlang == 'pt-br') {
                                $gravityID = 8;
                            }else{
                                $gravityID = 4;
                            }
                        ?>
                        <!-- </h5> -->
        
                        <?php
                            if($currentlang == 'pt-br'){
                                echo '<h5 class="brown">Para mais detalhes</h5>';
                            }elseif($currentlang == 'es'){
                                echo '<h5 class="brown">Para mas detalles</h5>';
                            }else{
                                echo '<h5 class="brown">For more information</h5>'; 
                            }
                        ?>
                        <?php 
                        echo do_shortcode('[gravityform id="'.$gravityID.'" field_values="language=' . $currentlang . '&campaign=' . $campaign . '&source=' . $source . '&medium=' . $medium . '&term=' . $term . '&content=' . $content . '&urlsource=' . $urlSource. '" title="false" description="false" ]');
                        //get_template_part('include/optin')
                        //endif;
                        ?>
                        <?php if(get_field('video_button')):?>
                        <h5 class="brown my-3">Videos</h5>
                        <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-video"></i> <?php the_field('video_button')?></a></p>
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Videos - <?php the_title();?></h5>
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
