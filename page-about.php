<?php 
/* Template name: about */ 
get_header();
$currentlang = apply_filters( 'wpml_current_language', NULL );
get_template_part('include/hero');
 ?>


<section class="about mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h2 class="brown">Bai Capital</h2>
                    <?php the_field('about_text') ?>
                    <br>
                    <?php the_field('about_text_copy') ?>
                </div>
                
                
            </div>
        </div>
    </section>
<hr>
    <section class="teamMembers baiTeam mt-5">
        <div class="container">
        <div class="row text-center justify-content-center">
                <div class="col-md-7">
                    <h2 class="mb-4">
                    <?php
                    if($currentlang=='es'){
                        echo 'Nuestro equipo';
                    }
                    elseif($currentlang=='pt-br'){
                        echo 'Nossa Equipe';
                    }
                    ?>
                    </h2>
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="col-md-7 text-center">
                        <?php
                    if($currentlang=='es'){
                        echo '<p>BAI Capital posee un liderazgo en la región y una sólida relación con especialistas del sector lo que nos permite ofrecer proyectos más consistentes y rentables a nuestros inversores.</p><p>Nuestro equipo altamente cualificado y experimentado tiene la misión de orientarlo en cada etapa del proceso de inversión en propiedades o proyectos en los Estados Unidos, independientemente de su objetivo. BAI Capital ya ha levantado millones de dólares para sus proyectos residenciales, rascacielos, hoteles, de uso mixto y suburbano. BAI Capital posee 100% de éxito en aprobaciones de Visa EB-5 a inversores latinoamericanos.</p>'
                    }
                    elseif($currentlang=='pt-br'){
                        echo '<p>BAI Capital possui uma liderança na região e uma sólida relação com especialistas do setor o que nos permite oferecer projetos mais consistentes e rentáveis aos nossos investidores. </p><p>Nossa equipe altamente qualificada e experiente tem a missão de orientá-lo em cada etapa do processo de investimento em propriedades ou projetos nos Estados Unidos, independentemente do seu objetivo. BAI Capital já levantou milhões de dólares em capital para os seus projetos residenciais, arranha-céus, hotéis, de uso misto e suburbano. BAI Capital possui 100% de sucesso em aprovações de Visto EB-5 a investidores latinoamericanos. </p>';
                    }
                    ?>
                    </div>
            </div>
            <?php if( have_rows('members')): ?>
            <div class="row mt-5">
                <?php while( have_rows('members')) : the_row(); $a++; ?>
                    <div class="col-md-3">
                        <div class="card">
                            <a class="card-img-container" href="#"data-toggle="modal" data-target="#membermodal<?php echo $a;?>">
                                <img class="card-img-top d-none" src="<?php the_sub_field('picture')?>" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <a href="#"data-toggle="modal" data-target="#membermodal<?php echo $a;?>">
                                    <h5 class="card-title brown"><?php the_sub_field('name')?></h5>
                                </a>
                                <p class="card-text small"><?php the_sub_field('position')?></p>
                            </div>
                        </div>
                    </div>
                <?php if($a % 3 === 0): echo '</div> <div class="row mt-5">'; endif;?>
                <!-- Modal -->
                <div class="modal fade" id="membermodal<?php echo $a;?>" tabindex="-1" role="dialog" aria-labelledby="membermodalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="membermodalLabel"><?php the_sub_field('name')?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php the_sub_field('picture')?>" alt="">
                                        <span class="small text-center d-block mt-1"><?php the_sub_field('position')?></span>
                                    </div>
                                    <div class="col-md-8"><?php the_sub_field('bio')?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <?php endwhile;?>
            </div>
            <?php endif; ?>
        </div>
    </section>

<hr class="my-5 py-5">
    <?php if(get_field('team_members')): ?>
    <section class="">
        <div class="container baiTeam">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="brown"><?php 
                    if($currentlang=='es'){
                        echo 'Oficinas';
                    }
                    elseif($currentlang=='pt-br'){
                        echo 'Escritórios';
                    }?>
                    </h2>
                    <div class="faqs">
                        <div id="accordion">
                        <?php

                            // check if the repeater field has rows of data
                            if( have_rows('team_members') ):
                                // loop through the rows of data
                                while ( have_rows('team_members') ) : the_row(); $f++;
                        ?>

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <a class="link text-capitalize" data-toggle="collapse" href="#collapseOne<?php echo $f; ?>" role="button" aria-expanded="false" aria-controls="collapseOne<?php echo $f; ?>">
                                        <?php the_sub_field('country');?>
                                    </a>
                                </div>
                                <div id="collapseOne<?php echo $f; ?>" class="collapse <?php if($f == 1): echo "show"; endif;?>" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body text-left">
                                    <?php the_sub_field('country_info');?>
                                </div>
                                </div>
                            </div>
                        
                        <?php endwhile;endif;?>

                        </div>
                    </div>

                    <div class="ext-center">
                        <?php
                    if($currentlang=='es'){
                        
                    }
                    elseif($currentlang=='pt-br'){
                        echo '<p>BAI Capital possui uma liderança na região e uma sólida relação com especialistas do setor o que nos permite oferecer projetos mais consistentes e rentáveis aos nossos investidores. </p><p>Nossa equipe altamente qualificada e experiente tem a missão de orientá-lo em cada etapa do processo de investimento em propriedades ou projetos nos Estados Unidos, independentemente do seu objetivo. BAI Capital já levantou milhões de dólares em capital para os seus projetos residenciais, arranha-céus, hotéis, de uso misto e suburbano. BAI Capital possui 100% de sucesso em aprovações de Visto EB-5 a investidores latinoamericanos. </p>';
                    }
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php endif;?>
<?php 

get_template_part('include/footercta_pt');

get_footer(); ?>
