<?php

  function button_to_popup($name, $internal_uri, $sql='', $space='', $class = '', $width ='', $height = '', $id='')
  {
    //if(stripos($internal_uri,'?') || stripos($internal_uri,'='))
    //  $internal_uri = Herramientas::genUrl($internal_uri);
    if($sql!='')
    {
    	sfContext::getInstance()->getUser()->setAttribute('sql',$sql,$space);
    }

    if (empty($width)){ $width='490';}
      if (empty($height)){ $height='490';}
    return button_to($name,$internal_uri,array(
      'popup' => array('true','menubar=no,toolbar=no,scrollbars=yes,width='.$width.',height='.$height.',resizable=yes,left=500,top=80'),
        'class'  => $class,
    	'id' => $id,
      ));
  }

  function button_to_popup_($name, $internal_uri, $class = '', $width ='', $height = '')
  {
    if(stripos($internal_uri,'?') || stripos($internal_uri,'='))
      $internal_uri = Herramientas::genUrl($internal_uri);

    use_helper('Linktoapp');
    $internal_uri = cross_app_link_to('herramientas','catalogo').$internal_uri;

    if (empty($width)){ $width='490';}
      if (empty($height)){ $height='490';}
    return button_to($name,$internal_uri,array(
      'popup' => array('true','menubar=no,toolbar=no,scrollbars=yes,width='.$width.',height='.$height.',resizable=yes,left=500,top=80'),
        'class'  => $class,
      ));
  }

  function input_auto_complete_tag_($name, $value, $url, $tag_options = array(), $completion_options = array())
  {
    use_helper('Linktoapp','Javascript');
    $url = cross_app_link_to('herramientas','autocomplete').$url;
    return input_auto_complete_tag($name, $value, $url, $tag_options, $completion_options);

  }

?>