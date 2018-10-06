<?php 
/* Template name: about */ 
get_header();
$currentlang = apply_filters( 'wpml_current_language', NULL );
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
                    <h2 class="">
                    <?php
                    if($currentlang == 'pt-br'){
                         echo 'Nossa Equipe';
                    }elseif($currentlang == 'es'){
                        echo 'Nuestro Equipo';
                    }
                    ?>
                    </h2>
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


    <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

<?php 

get_template_part('include/footercta');

get_footer(); ?>
