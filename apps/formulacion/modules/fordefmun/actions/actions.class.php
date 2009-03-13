<?php

/**
 * fordefmun actions.
 *
 * @package    siga
 * @subpackage fordefmun
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefmunActions extends autofordefmunActions
{

	public function executeEdit()
  {
    $this->fordefmun = $this->getFordefmunOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefmunFromRequest();

      $this->saveFordefmun($this->fordefmun);

      $this->fordefmun->setId(self::obtenerId($this->fordefmun->getCodest(),$this->fordefmun->getCodmun()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefmun/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefmun/list');
      }
      else
      {
        return $this->redirect('fordefmun/edit?id='.$this->fordefmun->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function saveFordefmun($fordefmun)
  {
    Formulacion::salvarFordefmun($fordefmun);

  }

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(FordefmunPeer::CODEST,$dato1);
  	$c->add(FordefmunPeer::CODMUN,$dato2);
  	$resul= FordefmunPeer::doSelectOne($c);
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
  	$estado=$this->getRequestParameter('estado');
    $municipio=$this->getRequestParameter('municipio');
    $id=$this->getRequestParameter('id');

  	$c= new Criteria();
  	$c->add(FordefparPeer::CODEST,$estado);
  	$c->add(FordefparPeer::CODMUN,$municipio);
  	$resultados= FordefparPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar el Municipio, Tiene parroquias asociadas');
      return $this->redirect('fordefmun/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefmunPeer::CODEST,$estado);
  	  $c->add(FordefmunPeer::CODMUN,$municipio);
  	  $r=FordefmunPeer::doDelete($c);

  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefmun/edit');
  	}
  }

}
