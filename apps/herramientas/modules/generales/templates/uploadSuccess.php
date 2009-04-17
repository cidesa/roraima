<?php use_helper('Object', 'Javascript') ?>

<?php

  $valores = '';
  foreach($arch as $a => $v){
    if(is_array($v)){
      foreach($v as $a1 => $v1){
        $valores .= "try{f.sf_admin_edit_form.".$a."_".$a1.".value = '".$v1."';}catch(ex){}
        ";
      }
    }else{
      $valores .= "try{f.sf_admin_edit_form.".$a.".value = '".$v."';}catch(ex){}
      ";
    }
  }

  echo javascript_tag("
  function cargardatos()
  {
    f=opener.document;
    ".$valores."
    self.close();
  }
  
  cargardatos();
  
");
    
?>