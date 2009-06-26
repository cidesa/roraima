<?php

/**
 * teschecus actions.
 *
 * @package    siga
 * @subpackage teschecus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class teschecusActions extends autoteschecusActions
{

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');


    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function executeEdit()
  {
    $this->tscheemi = $this->getTscheemiOrCreate();

    //Verificar si el cheque esta cadudaco
    if ($this->tscheemi->getId())
    {
       $c = new Criteria();
       $c->add(UsuariosPeer::LOGUSE,$this->getUser()->getAttribute('loguse'));
       $objUsuario = UsuariosPeer::doSelectOne($c);
       if ($objUsuario)
       {
       	$this->tscheemi->setCodent($objUsuario->getNomuse());
       }

       if (Tesoreria::VerificarChequeCaducado($this->tscheemi->getNumcue(),$this->tscheemi->getFecemi()))
          $this->tscheemi->setCaducado('S');
    }
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTscheemiFromRequest();

      $this->saveTscheemi($this->tscheemi);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('teschecus/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('teschecus/list');
      }
      else
      {
        return $this->redirect('teschecus/edit?id='.$this->tscheemi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->tscheemi = $this->getTscheemiOrCreate();
    $this->tscheemi->setFaldat('S');
    try{ $this->updateTscheemiFromRequest();}catch(Exception $ex){}


    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);

      }
    }
    return sfView::SUCCESS;
  }

    public function validateEdit()
    {
      $this->coderr=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->tscheemi = $this->getTscheemiOrCreate();
       try{ $this->updateTscheemiFromRequest();}catch(Exception $ex){}
       $tscheemi = $this->getRequestParameter('tscheemi');

       /**********VALIDACION DE FECHA****************/
       $fecemi=$tscheemi['fecemi'];
       $fecent=$tscheemi['fecent'];

       if ($fecemi!='' && $fecent!='')
       {
      	$rfecemi = adodb_strtotime($fecemi);
      	$rfecent = adodb_strtotime($fecent);

	      if (!(($rfecemi === -1 || $rfecemi===false) || ($rfecent === -1 || $rfecent===false)))
	      {
	          if ($rfecemi > $rfecent)
	          {
	            $this->coderr = 193; return false;
	          }
	      }else
	      {
	          $this->coderr = 192; return false;
	      }
        }// if ($fecemi!='' && $fecent!='')

       /**************************/


      if($this->coderr!=-1)
        return false;
      else
         return true;
    }//if($this->getRequest()->getMethod() == sfRequest::POST)
    else return true;
   }
}
