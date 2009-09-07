<?php

/**
 * tesdeftipmov actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipmov
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftipmovActions extends autotesdeftipmovActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
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
      	$this->Bitacora('Elimino');
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
