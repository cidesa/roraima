<?php use_helper('Javascript') ?>

<?php
   $atestayu = $atayudas->getAtestayu();
   if($atestayu){
     if($atestayu->getComest()=='1'){
       echo javascript_tag("
         function DeshabilitarObjetos()
         {
           $('atayudas_expediente').disabled=true;
           $('atayudas_atsolici').disabled=true;

           $('atayudas_cedben').disabled=true;
           $('boton_cedben').disabled=true;
           $('boton_cedsol').disabled=true;
           $('atayudas_cedsol').disabled=true;
           $('boton_rifpro').disabled=true;
           $('atayudas_rifpro').disabled=true;
           $('boton_codpre').disabled=true;

           $('atayudas_atbenefi').disabled=true;
           $('atayudas_proayu').disabled=true;
           $('atayudas_nroofi').disabled=true;
           $('atayudas_caprovee_id').disabled=true;
           $('atayudas_rifpro').disabled=true;
           $('atayudas_codpre').disabled=true;
           $('atayudas_attrasoc_id').disabled=true;

           if ($('atayudas_estsoceco')) $('atayudas_estsoceco').disabled=true;

           $('atayudas_attipayu_id').readonly=true;
           $('atayudas_motayu').readonly=true;
           $('atayudas_desayu').readonly=true;

         }

         Event.observe(window, 'load',
           function() {
             DeshabilitarObjetos();
           }
         );

       ");

     }else if($atestayu->getComest()=='2'){
       echo javascript_tag("
         function DeshabilitarObjetos()
         {
           $('atayudas_atestayu_id').disabled=true;
           $('atayudas_expediente').disabled=true;
           $('atayudas_atsolici').disabled=true;

           $('atayudas_cedben').disabled=true;
           $('boton_cedben').disabled=true;
           $('boton_cedsol').disabled=true;
           $('atayudas_cedsol').disabled=true;
           $('boton_rifpro').disabled=true;
           $('atayudas_rifpro').disabled=true;
           $('boton_codpre').disabled=true;

           $('atayudas_atbenefi').disabled=true;
           $('atayudas_proayu').disabled=true;
           $('atayudas_nroofi').disabled=true;
           $('atayudas_caprovee_id').disabled=true;
           $('atayudas_rifpro').disabled=true;
           $('atayudas_codpre').disabled=true;
           $('atayudas_attrasoc_id').disabled=true;

           if ($('atayudas_estsoceco')) $('atayudas_estsoceco').disabled=true;

           $('atayudas_attipayu_id').readonly=true;
           $('atayudas_motayu').readonly=true;
           $('atayudas_desayu').readonly=true;
         }

         Event.observe(window, 'load',
          function() {
             DeshabilitarObjetos();
           }
         );
       "



       );

     }
   }
?>


  <?php echo input_tag('atayudas[expediente]',$atayudas->getId(true),'disabled=true size=6 style="font-size:18px;"'); ?>

