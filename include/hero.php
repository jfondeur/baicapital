<!-- hero -->
    <section class="baiHero homeHero h-50 bg-light" style="background:url('<?php the_field('hero_background')?>');  background-size:cover;<?php if(is_page(102)): echo 'background-position:bottom !important'; endif?>">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-5">
                    <h2 class=""><?php the_field('hero_heading') ?></h2>
                    <p><?php the_field('hero_text') ?></p>
                    <?php get_template_part('include/optin')?>
                </div>
            </div>
        </div>
    </section>