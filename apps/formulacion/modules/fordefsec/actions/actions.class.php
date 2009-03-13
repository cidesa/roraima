<?php

/**
 * fordefsec actions.
 *
 * @package    siga
 * @subpackage fordefsec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefsecActions extends autofordefsecActions
{
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
