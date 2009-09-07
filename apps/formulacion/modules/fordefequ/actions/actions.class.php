<?php

/**
 * fordefequ actions.
 *
 * @package    Roraima
 * @subpackage fordefequ
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefequActions extends autofordefequActions
{

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
  protected function saveFordefequ($fordefequ)
  {
    Formulacion::salvarFordefequ($fordefequ);
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefequ = $this->getFordefequOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefequFromRequest();

      $this->saveFordefequ($this->fordefequ);

      $this->fordefequ->setId(Herramientas::getX_vacio('codequ','fordefequ','id',$this->fordefequ->getCodequ()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefequ/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefequ/list');
      }
      else
      {
        return $this->redirect('fordefequ/edit?id='.$this->fordefequ->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 public function executeEliminar()
  {
  	$equ=$this->getRequestParameter('equ');
    $id=$this->getRequestParameter('id');

  	$c= new Criteria();
  	$c->add(FordefsubobjPeer::CODEQU,$equ);
  	$resultados= FordefsubobjPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice1','No se puede eliminar la Directriz, ya que esta asociada a un(as) estrategia(s)');
      return $this->redirect('fordefequ/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefequPeer::CODEQU,$equ);
  	  FordefequPeer::doDelete($c);

  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefequ/edit');
  	}
  }
  protected function getLabels()
  {
    return array(
      'fordefequ{codequ}' => 'Código',
      'fordefequ{desequ}' => 'Descripción',
      'fordefequ{desobj}' => 'Objetivo',
    );
  }
}
