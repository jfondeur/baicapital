<?php 
/* Template name: Contact */ 
get_header();
global $utms;
if(isset($_COOKIE['leadsource'])) {
    $leadsource = esc_url($_COOKIE['leadsource']);
} elseif(isset($_SERVER['HTTP_REFERER'])){
    $leadsource = $_SERVER['HTTP_REFERER'];
};

if (isset($utms)){ $source = $utms[0]; }
if (isset($utms)){ $medium = $utms[1]; }
if (isset($utms)){ $campaign = $utms[2]; }
if (isset($utms)){ $term = $utms[3]; }
if (isset($utms)){ $content = $utms[4]; }
if (isset($leadsource)){ $urlSource = $leadsource; }


$currentlang = apply_filters( 'wpml_current_language', NULL );

if($currentlang == 'es'){
    $gravityID = 2;
}elseif ($currentlang == 'pt-br') {
    $gravityID = 1;
}else{
    $gravityID = 4;
}

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
             <?php echo do_shortcode('[gravityform id="'.$gravityID.'" field_values="language=' . $currentlang . '&campaign=' . $campaign . '&source=' . $source . '&medium=' . $medium . '&term=' . $term . '&content=' . $content . '&urlsource=' . $urlSource. '" title="false" description="false" ]')?>
         </div>
     </div>
 </section>

 <?php get_footer() ?>