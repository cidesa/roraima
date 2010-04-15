<?php

/**
 * nomdefespgen actions.
 *
 * @package    Roraima
 * @subpackage nomdefespgen
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespgenActions extends autonomdefespgenActions
{
  public function executeIndex()
  {
    $c= new Criteria();
    $c->add(NpdefgenPeer::CODEMP,'001');
    $dato=NpdefgenPeer::doSelectOne($c);
    if ($dato)
    {
      $id=$dato->getId();
      return $this->redirect('nomdefespgen/edit?id='.$id);
    }
    else
    {
      $id="";
      return $this->redirect('nomdefespgen/edit');
    }
  }

  protected function getNpdefgenOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npdefgen = new Npdefgen();
      $this->setVars();
    }
    else
    {
      $npdefgen = NpdefgenPeer::retrieveByPk($this->getRequestParameter($id));
      $this->setVars();
      $this->forward404Unless($npdefgen);
    }

    return $npdefgen;
  }

  public function setVars()
  {
    $c = new Criteria();
    $datos=NpcargosPeer::doselect($c);
    if ($datos)
    { $this->esta='1';}
    else { $this->esta='0';}

    $c = new Criteria();
    $dato=NphojintPeer::doselect($c);
    if ($dato)
    { $this->esta1='1';}
    else { $this->esta1='0';}

    $c = new Criteria();
    $dato1=NpestorgPeer::doselect($c);
    if ($dato1)
    { $this->esta2='1';}
    else { $this->esta2='0';}

    $c = new Criteria();
    $dato2=NpuniejePeer::doselect($c);
    if ($dato2)
    { $this->esta3='1';}
    else { $this->esta3='0';}
  }

}
