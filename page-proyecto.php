<?php 
/* Template name: Project */ 
get_header();
$id = get_the_id();
if($id == 85):
    $catName = "EB5";
elseif($id == 108 ):
    $catName = "Equity";
endif;
 ?>

 <section>
     <div class="container my-5">
         <div class="row">
             <div class="col-md-12 text-center">
                 <h1 class="brown"><?php the_title(); ?></h1>
                 <p class="">Invista em Real Estate nos Estados Unidos com BAI Capital</p>
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
                'posts_per_page' => 4,
                'orderby' => 'date',
                'category_name' => $catName,
            );

            // The Query
            $projects = new WP_Query( $args );

            // The Loop
            if ( $projects->have_posts() ) : ?>
            <div class="row">
            <?php while ( $projects->have_posts() ) : $projects->the_post(); 
            $i++;
            $project_img_url = get_the_post_thumbnail_url(get_the_ID(),'project');
            $project_title = get_the_title();
            $link = get_the_permalink(); 
            $location = get_field('location');
            $c = get_the_category();
            ?>
                <!-- Custom loop -->
                <div class="col-md-4">
                    <div class="card">
                        <a href="<?php echo $link; ?>">
                            <img class="card-img-top" src="<?php echo esc_url($project_img_url) ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title brown"><?php echo $project_title;?></h5>
                                <p class="card-text"><?php echo $location->name; ?></p>
                            </div>
                            <p class="card-text"><?php echo $c[0]->cat_name; ?></p>
                            <a href="<?php echo $link; ?>" class="btn btn-primary btn-sm">Learn more</a>
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