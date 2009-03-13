<?php

/**
 * fordefsubsec actions.
 *
 * @package    siga
 * @subpackage fordefsubsec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefsubsecActions extends autofordefsubsecActions
{   
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
