<?php

/**
 * migtsmovban actions.
 *
 * @package    siga
 * @subpackage migtsmovban
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class migtsmovbanActions extends automigtsmovbanActions
{

  public function executeIndex()
  {
    return $this->forward('migtsmovban', 'edit');
  }


  public function editing()
  {

  }

  public function executeEdit()
  {
    $this->params=array();
    $this->tspararc = $this->getTspararcOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTspararcFromRequest();

      if($this->saveTspararc($this->tspararc) ==-1){
        {
         if ($this->tot==$this->rec)
         {
          $this->setFlash('notice', 'El Archivo ya Fue Migrado');
         }else {
         	$this->setFlash('notice', 'Su Migración fue un exito total.');
         	if ($this->rec>0)
         	{
         	  $this->setFlash('notice', 'Se Rechazarón '.$this->rec.'Registros de un Total de '.$this->tot.' de Registros.');
         	}
         }

         $id= $this->tspararc->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('migtsmovban/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('migtsmovban/list');
        }
        else
        {
            return $this->redirect('migtsmovban/edit?id='.$this->tspararc->getId());
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

  protected function updateError()
  {
    $this->tot="";
    $his->rec="";
    return true;
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $dato=""; $javascript="";
    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(TsdefbanPeer::NUMCUE,$codigo);
        $reg= TsdefbanPeer::doSelectOne($t);
        if ($reg)
        {
          $b= new Criteria();
          $b->add(TspararcPeer::NUMCUE,$codigo);
          $reg1= TspararcPeer::doSelectOne($b);
          if ($reg1)
          {
          	$dato=$reg->getNomcue();
          }else {
          	$javascript="alert_('Debe Configurar el archivo de la Cuenta Bancaria'); $('tspararc_numcue').value=''; $('tspararc_numcue').focus();";
          }

        }else{
        	$javascript="alert_('El N&uacute;mero de Cuenta Bancaria no existe'); $('tspararc_numcue').value=''; $('tspararc_numcue').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  protected function saving($tspararc)
  {
    $val=Tesoreria::MigrarMovimientosBancarios($tspararc,&$total,&$rechazado);
    $this->tot=$total;
    $this->rec=$rechazado;
  	return $val;

  }
}
