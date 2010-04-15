<?php

/**
 * fordefsec actions.
 *
 * @package    Roraima
 * @subpackage fordefsec
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefsecActions extends autofordefsecActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefsec = $this->getFordefsecOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefsecFromRequest();

      $this->saveFordefsec($this->fordefsec);
      
      $this->fordefsec->setId(Herramientas::getX_vacio('codsec','fordefsec','id',$this->fordefsec->getCodsec()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefsec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefsec/list');
      }
      else
      {
        return $this->redirect('fordefsec/edit?id='.$this->fordefsec->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
  protected function saveFordefsec($fordefsec)
  {
    Formulacion::salvarFordefsec($fordefsec);

  }
  
   public function executeEliminar()
  {
  	$sector=$this->getRequestParameter('sector');    
    $id=$this->getRequestParameter('id');
    
  	$c= new Criteria();
  	$c->add(FordefsubsecPeer::CODSEC,$sector);  	
  	$resultados= FordefsubsecPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar el Setor, Tiene subsectores asociados');
      return $this->redirect('fordefsec/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefsecPeer::CODSEC,$sector);  	  
  	  FordefsecPeer::doDelete($c);
  	  
  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefsec/edit');
  	}
  }
}
