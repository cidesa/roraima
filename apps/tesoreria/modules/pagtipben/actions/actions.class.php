<?php

/**
 * pagtipben actions.
 *
 * @package    Roraima
 * @subpackage pagtipben
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagtipbenActions extends autopagtipbenActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->optipben = $this->getOptipbenOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOptipbenFromRequest();

      $this->saveOptipben($this->optipben);

      $this->optipben->setId(Herramientas::getX_vacio('codtipben','optipben','id',$this->optipben->getCodtipben()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagtipben/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagtipben/list');
      }
      else
      {
        return $this->redirect('pagtipben/edit?id='.$this->optipben->getId());
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
    $this->optipben = OptipbenPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->optipben);

     $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(OpbenefiPeer::CODTIPBEN,$this->optipben->getCodtipben());
    $dato=OpbenefiPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteOptipben($this->optipben);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->setFlash('notice','El Tipo de Beneficiario no puede ser eliminado, porque hay Beneficiarios definidos con ese tipo');
      return $this->redirect('pagtipben/edit?id='.$id);
    }
    return $this->redirect('pagtipben/list');
  }
}
