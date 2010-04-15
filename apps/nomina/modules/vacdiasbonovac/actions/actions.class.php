<?php

/**
 * vacdiasbonovac actions.
 *
 * @package    Roraima
 * @subpackage vacdiasbonovac
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vacdiasbonovacActions extends autovacdiasbonovacActions
{

/**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npvacjorlab/filters');

    // pager
    $this->pager = new sfPropelPager('Npvacjorlab', 5);
    $c = new Criteria();
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$coderror=-1;
  	$this->coderror=-1;
    $this->npvacjorlab = $this->getNpvacjorlabOrCreate();
    //$this->configGrid($this->npvacjorlab->getCodnom());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpvacjorlabFromRequest();

      $this->saveNpvacjorlab($this->npvacjorlab);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vacdiasbonovac/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vacdiasbonovac/list');
      }
      else
      {
        return $this->redirect('vacdiasbonovac/edit?id='.$this->npvacjorlab->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
	$cajtexmos1=$this->getRequestParameter('cajtexmos1');
    $codnom=$this->getRequestParameter('codnom');
    $javascript='';
     if ($this->getRequestParameter('ajax')=='2')
    {
      $dato1=NpnominaPeer::getNomnom($codnom);

       $c= new Criteria();
	   $c->add(NpvacjorlabPeer::CODNOM,$codnom);
	   $per= NpvacjorlabPeer::doSelect($c);
	   if ($per){
            $cajtexmoscod='npvacjorlab_codnom';
            $d='';
            $javascript="alert ('Ya esta definida la Jornada Laboral para esa Nomina')";
         	$output = '[["javascript","'.$javascript.'",""],["'.$cajtexmoscod.'","'.$d.'",""],["'.$cajtexmos1.'","'.$d.'",""]]';

	   }
	   else
			{
				  $output = '[["'.$cajtexmos1.'","'.$dato1.'",""]]';
			}

    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
}

	 /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveNpvacjorlab($npvacjorlab)
  {
  	    $coderr = -1;
  	    $cod= $npvacjorlab->getCodnom();

    $l= $npvacjorlab->getLunes();
    if ($l==1)
    {
    	$npvacjorlab->setLunes('S');
    }
    else
    {
    	$npvacjorlab->setLunes(null);
    }
    $m= $npvacjorlab->getMartes();
    if ($m==1)
    {
    	$npvacjorlab->setMartes('S');
    }
    else
    {
    	$npvacjorlab->setMartes(null);
    }
    $mi= $npvacjorlab->getMiercoles();
    if ($mi==1)
    {
    	$npvacjorlab->setMiercoles('S');
    }
    else
    {
    	$npvacjorlab->setMiercoles(null);
    }
    $j=$npvacjorlab->getJueves();
    if ($j==1)
    {
    	$npvacjorlab->setJueves('S');
    }
    else
    {
    	$npvacjorlab->setJueves(null);
    }
    $v= $npvacjorlab->getViernes();
    if ($v==1)
    {
    	$npvacjorlab->setViernes('S');
    }
    else
    {
    	$npvacjorlab->setViernes(null);
    }
    $s= $npvacjorlab->getSabado();
    if ($s==1)
    {
    	$npvacjorlab->setSabado('S');
    }
    else
    {
    	$npvacjorlab->setSabado(null);
    }
    $d= $npvacjorlab->getDomingo();
    if ($d==1)
    {
    	$npvacjorlab->setDomingo('S');
    }
    else
    {
    	$npvacjorlab->setDomingo(null);
    }

    $npvacjorlab->save();
    $this->coderror=$coderr;

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
    $this->npvacjorlab = $this->getNpvacjorlabOrCreate();


   try{
     $this->updateNpvacjorlabFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if ($this->coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError($this->coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }
}