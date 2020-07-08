<?php /* Template name: homepage */ get_header();
$currentlang = apply_filters( 'wpml_current_language', NULL );
get_template_part('include/hero');
?> 

    <section class="ass-seen-on py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- heading -->
                    <h4 class="brown mb-4"><?php
                        if($currentlang=='es'){
                           echo 'Hemos sido reseñados en:';
                        }
                        elseif($currentlang=='pt-br'){
                            echo 'As seen on';
                        }
                        else{
                            echo 'As seen on';
                        }
                        ?>
                    </h4>
                </div>
            </div>
            <div class="row">
                <?php 
                    $rows = get_field('ass_seen_on');
                    if($rows):
                        foreach($rows as $row):
                            echo '<div class="col-md-3">';
                            echo '<img src=" ' . $row['image'] .'" >';
                            echo '</div>';
                        endforeach;
                    endif;
                ?>
            </div>
        </div>
    </section>
   
    <!-- SalesPitch -->
    <section class="not-us">
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
                    <h4 class="brown mb-3">
                    <?php
                    if($currentlang == 'pt-br'){
                         echo 'Projetos Disponíveis';
                    }elseif($currentlang == 'es'){
                        echo 'Proyectos Disponibles';
                    }
                    ?>
                    </h4>
                </div>
            </div>
            <!-- Loop -->

<?php if (function_exists('isCountryInFilter')) { ?>
    <?php if(isCountryInFilter(array("us"))) { ?> 
        <span class="d-none">usa</span>
        <?php $catid = array(7,27);?>
 
    <?php } else { ?>
        <span class="d-none"> not usa</span>
        <?php $catid = array(7,4,24,27);?>
 
<?php } } ?>
     
  
            <?php
            $args = array(
                'post_type' => array('projects'),
                'posts_per_page' => 3,
                'order' => 'DESC',
                'cat' => $catid,
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
                <div class="col-md-4 not-us">
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

      <!-- blog -->

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
                'posts_per_page' => 3,
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
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                <?php
                    if($currentlang=='es'){
                        echo '<a class="btn btn-primary" href="https://baicapital.com/es/blog/">Más noticias</a>';
                    }
                    elseif($currentlang=='pt-br'){
                        echo '<a class="btn btn-primary" href="https://baicapital.com/pt-br/blog/">Notícias recentes</a>';
                    }
                    else{
                        echo '<a class="btn btn-primary" href="https://baicapital.com/blog/">Read more</a>';
                    }
                    ?>
                </div>
            </div>
     </div>
 </section>

<?php 
get_template_part('include/footercta_pt');
get_footer(); 
?>
