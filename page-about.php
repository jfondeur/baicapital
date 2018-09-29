<?php 
/* Template name: about */ 
get_header();
 ?>
    <!-- hero -->
    <section class="baiHero aboutHero h-50 py-5 bg-light">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-6">
                    <h2 class=""><?php the_field('hero_heading') ?></h2>
                    <?php the_field('hero_text') ?>
                    <?php get_template_part('include/optin')?>
                </div>
                <div class="heroSplitBg" style="background:url('<?php the_field('hero_background')?>');  background-size:cover;"></div>
            </div>
        </div>
    </section>

    <section class="baiTeam my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="">Nossa Equipe</h2>
                </div>
            </div>
            <!-- Repeater loop -->
            <?php
            // check if the repeater field has rows of data
            if( have_rows('team_members') ):
            ?>
            <div class="row mt-5">
                <?php
                // loop through the rows of data
                while ( have_rows('team_members') ) : the_row(); $i++;
                // display a sub field value
                ?>
               <div class="teamMmeber col-md-4 <?php echo $i; ?>">
                    <div>
                        <h4 class=""><?php the_sub_field("country")?></h4>
                        <p><?php the_sub_field("country_info")?></p>
                    </div>
                </div>
                <?php
                if($i % 3 === 0): echo '</div> <div class="row mt-5">'; endif;    
                endwhile;
                ?>
            </div>
            <?php
            endif;
            ?>
            <!-- Repeater loop -->
        </div>
    </section>

<?php 

get_template_part('include/footercta');

get_footer(); ?>
