<?php
class Ingresosfacturacion
{

    public static function getMunicipio($estado='')
    {
      $muni = array();
      $muni[''] = '';
      $c = new Criteria();
      if($estado!='') $c->add(InmunicipioPeer::INESTADO_ID,$estado);
      $muns = InmunicipioPeer::doSelect($c);
      if($muns){
        foreach($muns as $m){
          $muni[$m->getId()] = $m->getNommun();
        }
      }
      return $muni;
    }

    public static function getParroquia($municipio)
    {
      $parr = array();
      $parr[''] = '';
      $c = new Criteria();
      if($municipio!='') $c->add(InparroquiaPeer::INMUNICIPIO_ID,$municipio);
      $pars = InparroquiaPeer::doSelect($c);
      if($pars){
        foreach($pars as $p){
          $parr[$p->getId()] = $p->getNompar();
        }
      }
      return $parr;
    }




}
?>