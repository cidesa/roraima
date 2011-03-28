<?php

/**
 * migcomcon actions.
 *
 * @package    siga
 * @subpackage migcomcon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class migcomconActions extends automigcomconActions
{

  public function executeIndex()
  {
    return $this->forward('migcomcon', 'edit');
  }

  public function editing()
  {
      $this->configGrid();
  }

  public function executeEdit()
  {
    $this->params=array();
    $this->contaba = $this->getContabaOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateContabaFromRequest();

      if($this->saveContaba($this->contaba) ==-1){
        {$this->setFlash('notice', 'Los Comprobantes Contables han sido Migrados Satisfactoriamente.');

         $id= $this->contaba->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('migcomcon/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('migcomcon/list');
        }
        else
        {
            return $this->redirect('migcomcon/edit');
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function configGrid($arreglo=array())
  {     
     if (count($arreglo)>0)
     {
       $i=0;
       while ($i<count($arreglo))
       {
           $contabc= new Contabc();
           $contabc->setCheck('0');
           $contabc->setNumcom($arreglo[$i]["numcom"]);
           $contabc->setFeccom($arreglo[$i]["feccom"]);
           $contabc->setDescom($arreglo[$i]["descom"]);
           $contabc->setMoncom($arreglo[$i]["moncom"]);
           $contabc->setStacom($arreglo[$i]["stacom"]);
           $contabc->setCuadrado($arreglo[$i]["cuadrado"]);
           $maestro[]=$contabc;

           $i++;
       }
     }else {
         $maestro=array();
     }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/migcomcon/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_comprobantes');

    $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');

    $this->obj =$this->columnas[0]->getConfig($maestro);

    $this->contaba->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js="";
    $dato="";

    switch ($ajax){
      case '1':

        $t= new Criteria();
        $t->add(ContabcPeer::NUMCOM,$this->getRequestParameter('numcom'));
        $reg= ContabcPeer::doSelectOne($t);
        if ($reg)
        {
          $js="alert_('El N&uacute;mero de Comprobante se encuentra registrado'); $('$codigo').checked=false;";
        }else {
           if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('feccom'))==true)
           {
              $js="alert('La Fecha del Comprobante no se encuentra dentro un Perido Contable Abierto.'); $('$codigo').checked=false;";
           }
        }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      default:
          $this->contaba = $this->getContabaOrCreate();
          $this->updateContabaFromRequest();
          $archivo=$this->getRequestParameter('contaba[archivo]');
          $this->params=array();
          $this->labels = $this->getLabels();
          Contabilidad::cargarComprobantes($archivo,&$arreglo);
          $this->configGrid($arreglo);

          $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!="") return sfView::HEADER_ONLY;
  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

        if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $error=Contabilidad::grabarComprobantesMigrados($clasemodelo,$grid);
    
    return $error;
  }


}
