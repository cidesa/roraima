<?php

/**
 * pretitfin actions.
 *
 * @package    Roraima
 * @subpackage pretitfin
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretitfinActions extends autopretitfinActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
