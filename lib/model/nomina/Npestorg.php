<?php

/**
 * Subclase para representar una fila de la tabla 'npestorg'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Npestorg extends BaseNpestorg
{
    protected $cambiareti="";

  public function getCambiareti()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('nomina',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
	     if(array_key_exists('nomdefespnivorg',$varemp['aplicacion']['nomina']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['nomina']['modulos']['nomdefespnivorg']))
	       {
	       	$dato=$varemp['aplicacion']['nomina']['modulos']['nomdefespnivorg']['cambiareti'];
	       }
         }
     return $dato;
  }

  public function setCambiareti()
  {
  	return $this->cambiareti;
  }
}
