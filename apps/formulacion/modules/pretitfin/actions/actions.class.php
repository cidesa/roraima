<?php

/**
 * pretitfin actions.
 *
 * @package    siga
 * @subpackage pretitfin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pretitfinActions extends autopretitfinActions
{
	public function executeEdit()
  {
    $this->fortipfin = $this->getFortipfinOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFortipfinFromRequest();

      $this->saveFortipfin($this->fortipfin);

            $this->fortipfin->setId(Herramientas::getX_vacio('codfin','fortipfin','id',$this->fortipfin->getCodfin()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pretitfin/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pretitfin/list');
      }
      else
      {
        return $this->redirect('pretitfin/edit?id='.$this->fortipfin->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateFortipfinFromRequest()
  {
    $fortipfin = $this->getRequestParameter('fortipfin');

    if (isset($fortipfin['codfin']))
    {
      $this->fortipfin->setCodfin(str_pad($fortipfin['codfin'], 4 , "0", STR_PAD_LEFT));
    }
    if (isset($fortipfin['nomext']))
    {
      $this->fortipfin->setNomext($fortipfin['nomext']);
    }
    if (isset($fortipfin['nomabr']))
    {
      $this->fortipfin->setNomabr($fortipfin['nomabr']);
    }
    if (isset($fortipfin['tipfin']))
    {
      $this->fortipfin->setTipfin($fortipfin['tipfin']);
    }
  }
  
   public function executeEliminar()
  {
  	$codi=$this->getRequestParameter('codigo');   
    $id=$this->getRequestParameter('id');
    
  	$c= new Criteria();
  	$c->add(ForparingPeer::CODTIPFIN,$codi);  	
  	$resultados= ForparingPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar el Tipo de Financiamiento ya existen Partidas Presupuestarias formuladas asociadas');
      return $this->redirect('pretitfin/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FortipfinPeer::CODFIN,$codi);  	  
  	  FortipfinPeer::doDelete($c);
  	  
  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('pretitfin/edit');
  	}
  }
}
