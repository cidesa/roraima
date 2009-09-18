<?php

/**
 * teschecus actions.
 *
 * @package    Roraima
 * @subpackage teschecus
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class teschecusActions extends autoteschecusActions
{

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/tscheemi/filters');

    $this->reqfirma="";
	$varemp = $this->getUser()->getAttribute('configemp');
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos']))
	       if(array_key_exists('reqfirma',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$this->reqfirma=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['reqfirma'];
	       }

     // 15    // pager
    $this->pager = new sfPropelPager('Tscheemi', 15);
    $c = new Criteria();
    if ($this->reqfirma=='S')   $c->add(TscheemiPeer::STATUS,'F',Criteria::NOT_EQUAL);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

    
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
