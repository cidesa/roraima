<?php

/**
 * biedefubi actions.
 *
 * @package    Roraima
 * @subpackage biedefubi
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefubiActions extends autobiedefubiActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->setVars();
    parent::executeEdit();
  }

  public function setVars()
  {
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi=strlen($this->forubi);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBnubibieFromRequest()
  {
    $bnubibie = $this->getRequestParameter('bnubibie');
    $this->setVars();

    if (isset($bnubibie['codubi']))
    {
      $this->bnubibie->setCodubi($bnubibie['codubi']);
    }
    if (isset($bnubibie['desubi']))
    {
      $this->bnubibie->setDesubi($bnubibie['desubi']);
    }
    if (isset($bnubibie['dirubi']))
    {
      $this->bnubibie->setDirubi($bnubibie['dirubi']);
    }
    if (isset($bnubibie['codubiadm']))
    {
      $this->bnubibie->setCodubiadm($bnubibie['codubiadm']);
    }

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
   $cajtexcom=$this->getRequestParameter('cajtexcom');
    $codigo=$this->getRequestParameter('codigo');
   if ($this->getRequestParameter('ajax')=='1')
   {    
    $c= new Criteria();
    $c->add(BnubicaPeer::CODUBI,$codigo);
    $result=BnubicaPeer::doSelectOne($c);
    if ($result)
    {
      $dato=$result->getDesubi();
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else
    {
      $javascript="alert('El código no existe...');";
      $dato="";
      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
    }


     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else if ($this->getRequestParameter('ajax')=='2')
   {
       $valor=Bienes::validarCodubi($codigo);
       
       if ($valor==101){        
           $javascript="alert('El Codigo no puede estar en Blanco ó longitud del código invalida'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
       }else if ($valor==100)
       { 
           $javascript="alert('Nivel Anterior No Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
       }else {         
           $javascript="";
       }
       $output = '[["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
   }
  }

}
