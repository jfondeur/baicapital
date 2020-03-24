<?php 
/* Template name: Project */ 
get_header();
$id = get_the_id();
if($id == 85):
    $catName = "eb5";
elseif($id == 108 ):
    $catName = "equity";
elseif($id == 491):
    $catName = "equity-en";
elseif($id == 489):
    $catName = 'eb5-en';
elseif($id == 354):
    $catName = "equity-es";
elseif($id == 353):
    $catName = 'eb5-es';
endif;
global $currentlang;
 ?>

 <section>
     <div class="container my-5">
         <div class="row">
             <div class="col-md-12 text-center">
                 <h1 class="brown"><?php the_title(); ?></h1>
                 <p class="">
                 <?php
                    if($currentlang=='es'){
                        echo 'Invierta en propiedad inmobiliaria en los Estados Unidos con BAI Capital';
                    }
                    elseif($currentlang=='pt-br'){
                        echo 'Invista em Real Estate nos Estados Unidos com BAI Capital';
                    }
                    else{
                        echo 'Invest in real estate in the United States with BAI Capital';
                    }
                    ?>
                 </p>
                 <!-- <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">All</button>
                    <button type="button" class="btn btn-secondary">EB5</button>
                    <button type="button" class="btn btn-secondary">Equity</button>
                </div> -->
             </div>
         </div>
     </div>
     <div class="container">
     <?php
            // Query Arguments
            $args = array(
                'post_type' => array('projects'),
                'orderby' => 'date',
                'category_name' => $catName,
                'posts_per_page' => 10,
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
                <div class="col-md-4">
                    <div class="card">
                        <!-- badges -->
                        <?php 
                            if ($catName == 'eb5-en' ) {
                                if($type_eb5){
                                    foreach($type_eb5 as $type){
                                        echo '<span class="badge badge-secondary">' . $type . '<span>';
                                    }
                                }
                            }

                            if ($catName == 'equity-en' ) {
                                if($type_equity){
                                    foreach($type_equity as $typess){
                                        echo '<span class="badge badge-secondary">' . $typess . '<span>';
                                    }
                                }
                            }
                        ?>
                        
                        <!-- badges -->

                        <a href="<?php echo $link; ?>">
                            <img class="card-img-top" src="<?php echo esc_url($project_img_url) ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title brown"><?php echo $project_title;?></h5>
                                <p class="card-text"><?php echo $location->name; ?></p>
                            </div>
                            <p class="card-text"><?php echo $c[0]->cat_name; ?></p>
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
 </section>

<?php get_template_part('include/footercta_pt'); ?>

 <?php get_footer();?>