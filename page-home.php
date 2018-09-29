<?php /* Template name: homepage */ get_header(); ?>    
    <?php get_template_part('include/hero'); ?>

    <!-- SalesPitch -->
    <section class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-6">
                    <h4 class="brown"><?php the_field('sales_pitch_heading_1') ?></h4>
                    <?php the_field('sales_pitch_text_1') ?>
                </div>
                <div class="col-md-6">
                    <img src="<?php the_field('benefits_image'); ?>" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- projects -->
    <section class="projectsModule bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="brown mb-3">Projetos Disponíveis</h4>
                </div>
            </div>
            <!-- Loop -->
            <?php
            // Query Arguments
            $args = array(
                'post_type' => array('projects'),
                'posts_per_page' => 3,
                'order' => 'DESC',
            );

            // The Query
            $projects = new WP_Query( $args );

            // The Loop
            if ( $projects->have_posts() ) : ?>
            <div class="row">
            <?php while ( $projects->have_posts() ) : $projects->the_post(); 
            $project_img_url = get_the_post_thumbnail_url(get_the_ID(),'project');
            $project_title = get_the_title();
            $link = get_the_permalink(); 
            $location = get_field('location');
            $c = get_the_category();
            ?>
                <!-- Custom loop -->
                <div class="col-md-4">
                    <div class="card shadow">
                        <a href="<?php echo $link; ?>">
                            <img class="card-img-top" src="<?php echo esc_url($project_img_url) ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <a href="<?php echo $link ?>" class="brown"><h5 class="card-title"><?php echo $project_title;?></h5></a>
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
    </section>

    <!-- why to invest -->
    <section class="">
        <div class="container homeInvestment">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h4 class="brown"><?php the_field('sales_pitch_heading_2') ?></h4>
                    <span class=""><?php the_field('sales_pitch_text_2') ?> </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                        <div class="card shadow">
                            <!-- Image goes here -->
                            <!-- Image goes here -->
                             <a href="<?php echo home_url();?>/?page_id=51">
                             <?php 
                            function img($imgfield, $size){
                                $image = get_field($imgfield);
                                $sizeeb = $size;
                                if($image) :
                                    echo wp_get_attachment_image( $image, $sizeeb );
                                endif;
                            }
                            img('investment_eb5_image', 'project');
                            ?>
                            </a>
                            <!-- Image goes here -->
                            <div class="card-body">
                                 <a href="<?php echo home_url();?>/?page_id=51">
                                    <h5 class="card-title brown">EB5</h5>
                                </a>
                                <p class="card-text"><?php the_field('investment_eb-5') ?></p>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo home_url();?>/?page_id=102">
                        <div class="card shadow">
                            <!-- Image goes here -->
                            <a href="<?php echo home_url();?>/?page_id=51">
                            <?php img('investment_equity_image', 'project');?>
                        </a>
                            <!-- Image goes here -->
                            <div class="card-body">
                                <a href="<?php echo home_url();?>/?page_id=51"><h5 class="card-title brown">Equity</h5></a>
                                <p class="card-text"><?php the_field('investment_equity') ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php 
get_template_part('include/footercta_pt');
get_footer(); 
?>
