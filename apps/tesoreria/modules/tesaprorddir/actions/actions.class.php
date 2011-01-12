<?php

/**
 * tesaprorddir actions.
 *
 * @package    siga
 * @subpackage tesaprorddir
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesaprorddirActions extends autotesaprorddirActions
{

  public function executeIndex()
  {
    return $this->forward('tesaprorddir', 'edit');
  }

  public function editing()
  {
    $this->configGridOrdenes();
    $this->opordpag->setFilasord($this->filas);
  }

  public function configGridOrdenes()
  {
    $c = new Criteria();
    $c->add(OpordpagPeer::STATUS,'N');
    $sql = "(((opordpag.APRORDDIR<>'A' and opordpag.APRORDDIR<>'R') or opordpag.APRORDDIR isnull) and ((cpdoccau.refier='N' and cpdoccau.afeprc='S' and cpdoccau.afecom='S' and cpdoccau.afecau='S' and cpdoccau.afedis='R')))";
    $c->add(OpordpagPeer::APRORDDIR, $sql, Criteria :: CUSTOM);
    $c->add(OpordpagPeer::NUMCHE,null);
    $c->addJoin(OpordpagPeer::TIPCAU,CpdoccauPeer::TIPCAU);
    $detalle = OpordpagPeer::doSelect($c);

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesaprorddir/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');
	$this->columnas[1][1]->setHTML('onClick="verificar(this.id)"');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

 protected function saving($opordpag)
 {
   $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
   OrdendePago::aprobarOrdenesDirectas($opordpag,$grid);
   return -1;
 }


}
