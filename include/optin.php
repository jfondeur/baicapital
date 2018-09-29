<?php 
    //utm paramaters variables
    global $utms;

    if(isset($_COOKIE['leadsource'])) {
        $leadsource = esc_url($_COOKIE['leadsource']);
    } elseif(isset($_SERVER['HTTP_REFERER'])){
        $leadsource = $_SERVER['HTTP_REFERER'];
    };

    $currentlang = apply_filters( 'wpml_current_language', NULL );
?>

<form accept-charset="UTF-8" action="https://qz363.infusionsoft.com/app/form/process/6730495c336af971211de89344250e00" class="infusion-form form-inline" id="inf_form_6730495c336af971211de89344250e00" method="POST">
    <input name="inf_form_xid" type="hidden" value="6730495c336af971211de89344250e00" />
    <input name="inf_form_name" type="hidden" value="Website Get&#a;Started Form&#a;PT-BR" />
    <input name="infusionsoft_version" type="hidden" value="1.70.0.65079" />
    <input class="infusion-field-input form-control mb-2 mr-sm-2" id="inf_field_Email" name="inf_field_Email" placeholder="Email *" type="text" />
    <input name="inf_custom_Source" type="hidden" value="<?php if (isset($utms)){ echo $utms[0]; }?>" />
    <input name="inf_custom_GoogleKeyword" type="hidden" value="<?php if (isset($utms)){ echo $utms[3]; }?>" />
    <input name="inf_custom_GoogleCampaign" type="hidden" value="<?php if (isset($utms)){ echo $utms[2]; }?>" />
    <input name="inf_custom_CampaignContent" type="hidden" value="<?php if (isset($utms)){ echo $utms[4]; }?>" />
    <input name="inf_custom_CampaignMedium" type="hidden" value="<?php if (isset($utms)){ echo $utms[1]; }?>" />
    <input name="inf_custom_URLSource" type="hidden" value="<?php if (isset($leadsource)){ echo $leadsource; }?>" />
    <input name="inf_custom_WebsiteLanguage" type="hidden" value="<?php if (isset($currentlang)){ echo $currentlang; }?>" />
    <button class="btn btn-primary mb-2" type="submit">Enviar</button>
</form>