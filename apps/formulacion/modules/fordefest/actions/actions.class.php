<?php

/**
 * fordefest actions.
 *
 * @package    Roraima
 * @subpackage fordefest
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefestActions extends autofordefestActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefest = $this->getFordefestOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefestFromRequest();

      $this->saveFordefest($this->fordefest);

      $this->fordefest->setId(Herramientas::getX_vacio('codest','fordefest','id',$this->fordefest->getCodest()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefest/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefest/list');
      }
      else
      {
        return $this->redirect('fordefest/edit?id='.$this->fordefest->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   public function executeEliminar()
  {
  	$estado=$this->getRequestParameter('estado');
    $id=$this->getRequestParameter('id');

  	$c= new Criteria();
  	$c->add(FordefmunPeer::CODEST,$estado);
  	$resultados= FordefmunPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar el Estado, Tiene Municipios asociados');
      return $this->redirect('fordefest/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefestPeer::CODEST,$estado);
  	  FordefestPeer::doDelete($c);

  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefest/edit');
  	}
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
  protected function saveFordefest($fordefest)
  {
    Formulacion::salvarFordefest($fordefest);

  }

}
