<?php

/**
 * tesdeftipmov actions.
 *
 * @package    siga
 * @subpackage tesdeftipmov
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdeftipmovActions extends autotesdeftipmovActions
{
  public function executeEdit()
  {
    $this->tstipmov = $this->getTstipmovOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTstipmovFromRequest();

      $this->saveTstipmov($this->tstipmov);
      
      $this->tstipmov->setId(Herramientas::getX_vacio('codtip','tstipmov','id',$this->tstipmov->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipmov/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipmov/list');
      }
      else
      {
        return $this->redirect('tesdeftipmov/edit?id='.$this->tstipmov->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  public function executeDelete()
  {
    $this->tstipmov = TstipmovPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tstipmov);

    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(TsmovlibPeer::TIPMOV,$this->tstipmov->getCodtip());
    $dato=TsmovlibPeer::doSelect($c);
    if (!$dato)
    { 
      $c= new Criteria();
      $c->add(TsmovbanPeer::TIPMOV,$this->tstipmov->getCodtip());
      $dato2=TsmovbanPeer::doSelect($c);
      if (!$dato2)
      {
      	$this->deleteTstipmov($this->tstipmov);
      }
      else
      {
      	$this->setFlash('notice','El Movimiento no puede ser eliminado, porque hay Movimientos de Bancos asociados a este');       
      return $this->redirect('tesdeftipmov/edit?id='.$id);
      }    
    }
    else
    {
      $this->setFlash('notice','El Movimiento no puede ser eliminado, porque hay Movimientos de Libros asociados a este');       
      return $this->redirect('tesdeftipmov/edit?id='.$id); 	
    }
    return $this->redirect('tesdeftipmov/list');
  }
}
