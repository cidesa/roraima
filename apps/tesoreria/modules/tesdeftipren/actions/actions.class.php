<?php

/**
 * tesdeftipren actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipren
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftiprenActions extends autotesdeftiprenActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tstipren = $this->getTstiprenOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTstiprenFromRequest();

      $this->saveTstipren($this->tstipren);

       $this->tstipren->setId(Herramientas::getX_vacio('codtip','tstipren','id',$this->tstipren->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipren/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipren/list');
      }
      else
      {
        return $this->redirect('tesdeftipren/edit?id='.$this->tstipren->getId());
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
    $this->tstipren = TstiprenPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tstipren);

   //verificar si existe algun banco con ese tipo de rendimiento
   $c = new Criteria();
   $c->add(TsdefbanPeer::TIPREN,$this->tstipren->getCodtip());
   $datos=TsdefbanPeer::doSelectOne($c);
   if ($datos)//no se puede eliminar
     {
     	$menerr = "El Tipo de Rendimiento ". $this->tstipren->getCodtip() .", no puede ser eliminado ya que esta asociado a Bancos";
	    $this->getRequest()->setError('delete', $menerr);
	    return $this->forward('tesdeftipren', 'list');
     }
     else
     {
     	 try
	    {
	      $this->deleteTstipren($this->tstipren);
	      $this->Bitacora('Elimino');
	    }
	    catch (PropelException $e)
	    {
	      $this->getRequest()->setError('delete', 'Could not delete the selected Tstipren. Make sure it does not have any associated items.');
	      return $this->forward('tesdeftipren', 'list');
	    }

	    return $this->redirect('tesdeftipren/list');

     }//else if (Articulos::Hay_movimientos
  }

}
