<!-- hero -->
    <section class="baiHero homeHero h-50 bg-light" style="background:url('<?php the_field('hero_background')?>');  background-size:cover;<?php if(is_page(102)): echo 'background-position:bottom !important'; endif?>">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-6">
                    <h2 class=""><?php the_field('hero_heading') ?></h2>
                    <p><?php the_field('hero_text') ; ?></p>

                    <?php 
                    global $currentlang;
                    if ( !is_page_template( 'page-about.php' ) ) {
                           if($currentlang == 'pt-br'){
                                //get_template_part('include/optin');
                                echo '<a class="btn btn-primary" href="/pt-br/contact/">Entre em contato com BAI Capital</a>';
                            }elseif($currentlang == 'es'){
                                //get_template_part('include/optin-es');
                                echo '<a class="btn btn-primary" href="/es/contacto/">Pongase en contacto con Bai Capital</a>';
                            }else{
                                //get_template_part('include/optin-en');
                                echo '<a class="btn btn-primary" href="/contact/">Get in touch with Bai Capital</a>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>