<?php

/**
 * pretiting actions.
 *
 * @package    Roraima
 * @subpackage pretiting
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretitingActions extends autopretitingActions
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
    $this->fordefparing = $this->getFordefparingOrCreate();
    $this->updateFordefparingFromRequest();

    self::$coderror=Formulacion::validarPretiting($this->fordefparing->getCodparing());
    if (self::$coderror<>-1)
    {
      return false;
    }else return true;
     }else return true;
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
   // $this->fordefparing = $this->getFordefparingOrCreate();
  // $this->updateFordefparingFromRequest();

    $this->labels = $this->getLabels();

   if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if (self::$coderror!=-1)
      {
         $err = Herramientas::obtenerMensajeError(self::$coderror);
         $this->getRequest()->setError('fordefparing{codparing}',$err);
      }
    }

    return sfView::SUCCESS;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefparing = $this->getFordefparingOrCreate();
    $this->setVars();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefparingFromRequest();

      $this->saveFordefparing($this->fordefparing);

      $this->fordefparing->setId(Herramientas::getX_vacio('codparing','fordefparing','id',$this->fordefparing->getCodparing()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pretiting/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pretiting/list');
      }
      else
      {
        return $this->redirect('pretiting/edit?id='.$this->fordefparing->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefparingFromRequest()
  {
    $fordefparing = $this->getRequestParameter('fordefparing');
    $this->setVars();

    if (isset($fordefparing['codparing']))
    {
      $this->fordefparing->setCodparing($fordefparing['codparing']);
    }
    if (isset($fordefparing['nomparing']))
    {
      $this->fordefparing->setNomparing($fordefparing['nomparing']);
    }
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefparing/filters');
    $this->setVars();
    // pager
    $this->pager = new sfPropelPager('Fordefparing', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function setVars()
  {
    $this->mascarapartida = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonmaspar=strlen($this->mascarapartida);
    $this->etiquetamascarapartida = Herramientas::getObtenerNiveles_Formulacion("Select * from FORNIVELES where CatPar <> 'C'");
  }

  public function executeEliminar()
  {
  	$cod=$this->getRequestParameter('cod');
    $id=$this->getRequestParameter('id');

    //verificar si no es un padre, si no es un padre verificar si no existe en la tabla ForParIng, en ese caso se puede eliminar

     if (Formulacion::Buscar_CodigoHijo($cod)) //no se puede eliminar, tiene hijos
     {
      $this->setFlash('notice1','No se puede eliminar la partida presupuestaria padre');
      return $this->redirect('pretiting/edit?id='.$id);
     }
     else
     {
        //Verificar eliminar
  	    $c= new Criteria();
	  	$c->add(ForparingPeer::CODPARING,$cod);
	  	$resultados= ForparingPeer::doSelect($c);
	  	if ($resultados)
	  	{
	  	  $this->setFlash('notice1','No se puede eliminar la partida presupuestaria, ya que ha sido formulada');
	      return $this->redirect('pretiting/edit?id='.$id);
	  	}
	  	else
	  	{
	  	  $c= new Criteria();
	  	  $c->add(FordefparingPeer::CODPARING,$cod);
	  	  FordefparingPeer::doDelete($c);

	  	  $this->setFlash('notice','Registro Eliminado exitosamente');
	      return $this->redirect('pretiting/edit');
	  	}
     }//else
  }

}
