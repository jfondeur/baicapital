<?php 
/* Template name: Contact */ 
get_header();
global $utms;

    if(isset($_COOKIE['leadsource'])) {
        $leadsource = esc_url($_COOKIE['leadsource']);
    } elseif(isset($_SERVER['HTTP_REFERER'])){
        $leadsource = $_SERVER['HTTP_REFERER'];
    };
$currentlang = apply_filters( 'wpml_current_language', NULL );
 ?>

 <section class="container py-5">
     <div class="row">
         <div class="col-md-12 text-center">
             <h1 class="brown"><?php the_field('contact_title')?></h1>
             <p class="mt-2 mb-5"><?php the_field('contact_subtitle')?></p>
         </div>
     </div>
     <div class="row justify-content-center">
         <div class="col-md-8">
             <?php echo do_shortcode('[gravityform id="1" field_values="language=' . $currentlang . '" title="false" description="false" ]')?>
         </div>
     </div>
 </section>

 <?php get_footer() ?>