<?php 
/* Template name: investment */ 
get_header();
 ?>
    
    <?php get_template_part('include/hero'); ?>

    <section class="investmentType">
        <div class="container">
            <!-- <div class="row pt-5">
                <div class="col-md-12 text-center">
                    <h2 class="brown">Investment oportunities</h2>
                </div>
            </div> -->
            <!-- Repeater loop -->
            <?php
            // check if the repeater field has rows of data
            if( have_rows('investment_type') ):
            ?>
            <div class="row">
                <?php
                // loop through the rows of data
                while ( have_rows('investment_type') ) : the_row(); $i=null;$i++;
                // display a sub field value
                ?>
               <div class="col-md-4 py-5">
                    <div class="card">
                        <img class="card-img-top" src="<?php the_sub_field('image') ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title brown"><?php the_sub_field('title') ?></h5>
                            <p class="card-text"><?php the_sub_field('description') ?></p>
                            <hr>
                            <ul class="list-unstyled">
                                <?php
                                // check if the repeater field has rows of data
                                if( have_rows('benefits') ):
                                    // loop through the rows of data
                                    while ( have_rows('benefits') ) : the_row();
                                    ?>
                                        <li class="benefits"><i class="fas fa-check-circle"></i> <?php the_sub_field('benefit');?></li>
                                    <?php
                                    endwhile;
                                else :
                                    // no rows found
                                endif;
                                ?>
                            </ul>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Download Brochure</a> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-8 py-5">
                    <h4 class="brown mb-3"><?php the_sub_field('long_title') ?></h4>
                    <?php the_sub_field('long_description') ?>
                    <h4 class="brown mt-5 mb-3">Available Projects</h4>
                    <?php
                    // Query Arguments
                    $args = array(
                        'post_type' => array('projects'),
                        'posts_per_page' => 2,
                        'orderby' => 'rand',
                        'category_name' => 'EB5',
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
                        <div class="col-md-6">
                            <div class="card">
                                <a href="<?php echo $link; ?>">
                                    <img class="card-img-top" src="<?php echo esc_url($project_img_url) ?>" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <a href="<?php echo $link?>" class="brown">
                                            <h5 class="card-title"><?php echo $project_title;?></h5>
                                        </a>
                                        <p class="card-text"><?php echo $location->name; ?></p>
                                    </div>
                                    <p class="card-text"><?php echo $c[0]->cat_name; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Custom loop -->
                    <?php endwhile; endif; ?>
                    </div> 
                    <?php wp_reset_postdata();?>
                    <!-- Loop -->
                </div>
                
                <?php   
                endwhile;
                ?>
            </div>
            <?php
            endif;
            ?>
            <!-- Repeater loop -->
    </section>

<?php get_footer(); ?>