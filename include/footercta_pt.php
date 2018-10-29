<?php
$currentlang = apply_filters( 'wpml_current_language', NULL );
?>
<section class="getStartedModule bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <h2 class="brown">
                    <?php
                        if($currentlang == 'pt-br'){
                            echo 'Solicita uma chamada com um consultor hoje';
                        }elseif($currentlang == 'es'){
                            echo 'Solicite una llamada con un consultor hoy';
                        }
                    ?>
                    </h2>
                    <p><?php
                        if($currentlang == 'pt-br'){
                            echo 'Nossos consultores apoiam investidores latino-americanos em espanhol e português';
                        }elseif($currentlang == 'es'){
                            echo 'Nuestros consultores apoyan los inversionistas de América Latina en español y portugués';
                        }
                    ?></p>
                    <?php
                        if($currentlang == 'pt-br'){
                            get_template_part('include/optin');
                        }elseif($currentlang == 'es'){
                            get_template_part('include/optin-es');
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>