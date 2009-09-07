<?php
/**
 * submit_tag_click: Función helper para modificar el button que trae symfony 
 * debido a que el botón hace submit al presionar "enter", lo se necesitaba
 * que no ocurriera. Este botón permite hacer submit solo cuando se presiona o hace click
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
  function submit_tag_click($value,$option)
  {

  	$code = '<input type="button" id="'.$option['name'].'" name="'.$option['name'].'" value="'.$value.'" class="'.$option['class'].'" onclick="this.disabled=true;salvar();">';

    $context = sfContext::getInstance();
    $modulo = $context->getModuleName();

	$url = '';

	if(SF_ENVIRONMENT=='dev') $url = '/'.SF_APP.'_dev.php/'.$modulo.'/save';
	else $url = '/'.SF_APP.'.php/'.$modulo.'/save';

    if(array_key_exists('form',$option)) $form = $option['form'];
    else $form = 'sf_admin_edit_form';

  	$code = $code.'<script type="text/javascript">
					function salvar()
					{
								f=document.'.$form.';
								f.action="'.$url.'";
     		    			    f.submit();
					}

					</script>';

  	return $code;
  }

  function submit_tag_click_confirm($value,$option)
  {
  	$context = sfContext::getInstance();
    $modulo = $context->getModuleName();

	$url = '';

	if(SF_ENVIRONMENT=='dev') $url = SF_APP.'_dev.php/'.$modulo.'/save';
	else $url = SF_APP.'.php/'.$modulo.'/save';

	$confirm = $option['confirm'];

  	$code = '<input type="button" name="'.$option['name'].'" value="'.$value.'" class="'.$option['class'].'" onclick="this.disabled=true;salvar();">';//
  	$code = $code.'<script type="text/javascript">
					function salvar()
					{
						if(confirm("'.$confirm.'")){
								f=document.'.$option['form'].';
								f.action="'.$url.'";
     		    			    f.submit();
						}
					}

					</script>';

  	return $code;
  }

  function button_tag_click($value,$enlace,$option)
  {

    if(array_key_exists('html',$option)) $html = $option['html'];
    else $html = '';

  	$code = '<input type="button" name="'.$option['name'].'" value="'.$value.'" onclick="'.$enlace.';" '.$html.'>';

  	return $code;
  }

?>
