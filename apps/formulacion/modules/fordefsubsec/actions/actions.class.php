<?php

/**
 * fordefsubsec actions.
 *
 * @package    Roraima
 * @subpackage fordefsubsec
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefsubsecActions extends autofordefsubsecActions
{   
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefsubsec = $this->getFordefsubsecOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefsubsecFromRequest();

      $this->saveFordefsubsec($this->fordefsubsec);
      
      $this->fordefsubsec->setId(self::obtenerId($this->fordefsubsec->getCodsec(),$this->fordefsubsec->getCodsubsec()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefsubsec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefsubsec/list');
      }
      else
      {
        return $this->redirect('fordefsubsec/edit?id='.$this->fordefsubsec->getId());
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
  protected function saveFordefsubsec($fordefsubsec)
  {
    Formulacion::salvarFordefsubsec($fordefsubsec);

  }
   
  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(FordefsubsecPeer::CODSEC,$dato1);
  	$c->add(FordefsubsecPeer::CODSUBSEC,$dato2);  	
  	$resul= FordefsubsecPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }
  
    public function executeEliminar()
  {
  	$sector=$this->getRequestParameter('sector');
    $subsector=$this->getRequestParameter('subsector');
    $id=$this->getRequestParameter('id');
    
  	$c= new Criteria();
  	$c->add(FordefpryPeer::CODSEC,$sector);
  	$c->add(FordefpryPeer::CODSUBSEC,$subsector);
  	$resultados= FordefpryPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar el Subsector, Tiene parroquias asociadas');
      return $this->redirect('fordefsubsec/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefsubsecPeer::CODSEC,$sector);
  	  $c->add(FordefsubsecPeer::CODSUBSEC,$subsector);
  	  FordefsubsecPeer::doDelete($c);
  	  
  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefsubsec/edit');
  	}
  }
  
}
