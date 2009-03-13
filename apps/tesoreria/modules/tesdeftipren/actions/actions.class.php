<?php

/**
 * tesdeftipren actions.
 *
 * @package    siga
 * @subpackage tesdeftipren
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdeftiprenActions extends autotesdeftiprenActions
{
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
