<?php

/**
 * fordefest actions.
 *
 * @package    siga
 * @subpackage fordefest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefestActions extends autofordefestActions
{
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



  protected function saveFordefest($fordefest)
  {
    Formulacion::salvarFordefest($fordefest);

  }

}
