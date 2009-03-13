<?php

/**
 * fordefequ actions.
 *
 * @package    siga
 * @subpackage fordefequ
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefequActions extends autofordefequActions
{

  protected function saveFordefequ($fordefequ)
  {
    Formulacion::salvarFordefequ($fordefequ);
  }

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
