<?php 
/* Template name: Blog */ 
get_header();
global $curentlang;
 ?>

 <section>
     <div class="container my-5">
         <div class="row">
             <div class="col-md-12 text-center">
                 <h1 class="brown"><?php
                    if($currentlang=='es'){
                        echo 'Noticias recientes';
                    }
                    elseif($currentlang=='pt-br'){
                        echo 'Notícias recentes';
                    }
                    else{
                        echo 'Recent news';
                    }
                    ?></h1>
                 <p class=""><?php
                    if($currentlang=='es'){
                        echo 'Blog de inversión';
                    }
                    elseif($currentlang=='pt-br'){
                        echo 'Blog de investimento';
                    }else{
                        echo 'Investment blog';
                    }
                    ?></p>

             </div>
         </div>
     </div>
     <div class="container">
     <?php
            // Query Arguments
            $args = array(
                'post_type' => array('post'),
                'posts_per_page' => 100,
                // 'orderby' => 'rand',
                //'category_name' => $pc[0]->cat_name,
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
                                <a href="<?php echo $link ?>" class="brown">
                                    <h5 class="card-title"><?php echo $project_title;?></h5>
                                </a>
                            </div>
                            <div class="post-meta">
                                <p><?php the_time('F j, Y'); ?></p>
                            </div>
                            <p class="card-text">
                                <?php html5wp_excerpt('html5wp_index'); ?>
                            </p>
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