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
                        }else{
                            echo 'Request a call with a consultant today';
                        }
                    ?>
                    </h2>
                    <p><?php
                        if($currentlang == 'pt-br'){
                            echo 'Nossos consultores apoiam investidores latino-americanos em espanhol e português';
                        }elseif($currentlang == 'es'){
                            echo 'Nuestros consultores apoyan los inversionistas de América Latina en español y portugués';
                        }else{
                            echo 'Our consultants support Latin American investors in Spanish and Portuguese';
                        }
                    ?></p>
                    <?php
                        if($currentlang == 'pt-br'){
                            get_template_part('include/optin');
                        }elseif($currentlang == 'es'){
                            get_template_part('include/optin-es');
                        }else{
                            get_template_part('include/optin-en');
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>