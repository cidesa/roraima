<?php

/**
 * pretitgas actions.
 *
 * @package    Roraima
 * @subpackage pretitgas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretitgasActions extends autopretitgasActions
{
  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
	{
	  $this->fordefparegr = $this->getFordefparegrOrCreate();
	  $this->updateFordefparegrFromRequest();

	  self::$coderror=Formulacion::validarPretitgas($this->fordefparegr);
	  if (self::$coderror<>-1)
	  {
	  	return false;
	  }else return true;
     }else return true;
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->setVars();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefparegr/filters');

    // pager
    $this->pager = new sfPropelPager('Fordefparegr', 5);
    $c = new Criteria();
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
    $this->fordefparegr = $this->getFordefparegrOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefparegrFromRequest();

      $this->saveFordefparegr($this->fordefparegr);

      $this->fordefparegr->setId(Herramientas::getX_vacio('codparegr','fordefparegr','id',$this->fordefparegr->getCodparegr()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pretitgas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pretitgas/list');
      }
      else
      {
        return $this->redirect('pretitgas/edit?id='.$this->fordefparegr->getId());
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
    $this->fordefparegr = $this->getFordefparegrOrCreate();
    $this->updateFordefparegrFromRequest();

    $this->labels = $this->getLabels();

    if(!$this->validateEdit())
	{
	  $err = Herramientas::obtenerMensajeError(self::$coderror);
	  $this->getRequest()->setError('fordefparegr{codparegr}',$err);
    }

    return sfView::SUCCESS;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefparegrFromRequest()
  {
    $fordefparegr = $this->getRequestParameter('fordefparegr');
    $this->setVars();

    if (isset($fordefparegr['codparegr']))
    {
      $this->fordefparegr->setCodparegr($fordefparegr['codparegr']);
    }
    if (isset($fordefparegr['nomparegr']))
    {
      $this->fordefparegr->setNomparegr($fordefparegr['nomparegr']);
    }
  }

  protected function getLabels()
  {
    return array(
      'fordefparegr{codparegr}' => 'Código',
      'fordefparegr{nomparegr}' => 'Nombre',
    );
  }

  public function setVars()
  {
    $this->mascarapartida = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonmaspar=strlen($this->mascarapartida);
	$this->etiqueta = Herramientas::getObtenerNiveles_Formulacion("Select * from Forniveles where catpar<> 'C'");
	}


  public function executeEliminar()
  {
  	$cod=$this->getRequestParameter('cod');
    $id=$this->getRequestParameter('id');

    //verificar si no es un padre, si no es un padre verificar si no existe en la tabla ForParIng, en ese caso se puede eliminar

     if (Formulacion::Buscar_CodigoHijo_Pretitgas($cod)) //no se puede eliminar, tiene hijos
     {
      $this->setFlash('notice1','No se puede eliminar la partida presupuestaria padre');
      return $this->redirect('pretitgas/edit?id='.$id);
     }
     else
     {
   	  	  $c= new Criteria();
	  	  $c->add(FordefparegrPeer::CODPAREGR,$cod);
	  	  FordefparegrPeer::doDelete($c);

	  	  $this->setFlash('notice','Registro Eliminado exitosamente');
	      return $this->redirect('pretitgas/edit');
	  }//else
  }//end function
}
