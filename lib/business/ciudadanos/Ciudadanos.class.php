<?php
/**
 * Ciudadanos: Clase estática para el manejo del módulo de Atención al Ciudadanos
 *
 * @package    Roraima
 * @subpackage ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ciudadanos {

    function Ciudadanos() {
    }

    public static function salvarAcibenefi($atbenefi,$gridgrufam)
    {
      try{
        $grufam = $gridgrufam[0];
        $grufamelim = $gridgrufam[1];

        $atbenefi->save();

        foreach($grufam  as $gf)
        {
          $gf->setIdAtbenefi($atbenefi->getId());
          $gf->save();
        }

        foreach($grufamelim  as $gf)
        {
          $gf->delete();
        }

        return -1;
      }catch(Exception $e){
        return 0;
      }

    }

    public static function salvarAciciudadano($atciudadano,$gridgrufam)
    {
      try{
        $grufam = $gridgrufam[0];
        $grufamelim = $gridgrufam[1];

        $atciudadano->save();

        foreach($grufam  as $gf)
        {
          $gf->setAtciudadanoId($atciudadano->getId());
          $gf->save();
        }

        foreach($grufamelim  as $gf)
        {
          $gf->delete();
        }

        return -1;
      }catch(Exception $e){
        return 0;
      }

    }


    public static function salvarAciayudas($Atayudas,$griditems,$gridrecaudos)
    {
      //try{
      $atestayu = $Atayudas->getAtestayu();

      if($atestayu){
        if($atestayu->getComest()=='1'){
          $atayu = AtayudasPeer::retrieveByPK($Atayudas->getId());
          $atayu->setAtestayuId($Atayudas->getAtestayuId());
          $atayu->save();
        }else if($atestayu->getComest()=='0'){
          Ciudadanos::actualizarAciayudas($Atayudas,$griditems,$gridrecaudos);
        }
      }else{
        Ciudadanos::actualizarAciayudas($Atayudas,$griditems,$gridrecaudos);
      }

      return -1;

      //}catch(Exception $e){
      //  return 0;
      //}

    }

    public static function actualizarAciayudas($Atayudas,$griditems,$gridrecaudos)
    {
      $result=array();

      if($Atayudas->getId()=='') $Atayudas->setUsucre(substr(sfContext::getInstance()->getUser()->getAttribute('usuario','Sin Autenticar'),0,50));
      else $Atayudas->setUsumod(substr(sfContext::getInstance()->getUser()->getAttribute('usuario','Sin Autenticar'),0,50));

      if($Atayudas->getId()==''){
        $c = new Criteria();
        $c->addAscendingOrderByColumn(AtestayuPeer::ID);
        $atestayu = AtestayuPeer::doSelectOne($c);
        if($atestayu) $Atayudas->setAtestayuId($atestayu->getId());


        if($Atayudas->getNroexp()=='XXXXXX' || $Atayudas->getNroexp()=='XXXXX' || $Atayudas->getNroexp()=='XXXX' || $Atayudas->getNroexp()=='XXX' || $Atayudas->getNroexp()=='XX' || $Atayudas->getNroexp()=='X'){
          $sql = "select nextval('atayudas_nroexp_seq') as nroexp";
          if(Herramientas::BuscarDatos($sql,&$result)){
            $Atayudas->setNroexp(str_pad($result[0]['nroexp'],6,'0',STR_PAD_LEFT));
          }
        }

      }

      $Atayudas->save();

       $c = new Criteria();
      $c->add(AtdetayuPeer::ATAYUDAS_ID,$Atayudas->getId());
      AtdetayuPeer::doDelete($c);

      foreach($griditems[0] as $item) {
        $item->setAtayudasId($Atayudas->getId());
        $Atayudas->addAtdetayu($item);
      }

  /*    foreach($griditems[1] as $item) {
        $item->delete();
      }*/

      $Atayudas->save();

      $c = new Criteria();
      $c->add(AtdetrecayuPeer::ATAYUDAS_ID,$Atayudas->getId());
      AtdetrecayuPeer::doDelete($c);

      foreach($gridrecaudos[0] as $item) {
        if($item->getEntregado()){
          $atdetrecayu=new Atdetrecayu();
          $atdetrecayu->setAtayudasId($Atayudas->getId());
          $atdetrecayu->setAtrecaudId($item->getAtrecaudId());
          $atdetrecayu->save();
        }
      }

      $Atayudas->save();

    }

    public static function eliminarAciayudas($Atayudas)
    {
      //print_r($Atayudas);exit();
      try{

        $c = new Criteria();
        $c->add(AtdetayuPeer::ATAYUDAS_ID,$Atayudas->getId());

        AtdetayuPeer::doDelete($c);

        $c = new Criteria();
        $c->add(AtdetrecayuPeer::ATAYUDAS_ID,$Atayudas->getId());

        AtdetrecayuPeer::doDelete($c);

        $c = new Criteria();
        $c->add(AtestsocecoPeer::ATAYUDAS_ID,$Atayudas->getId());

        AtestsocecoPeer::doDelete($c);

        $Atayudas->delete();

        return -1;

      }catch(Exception $e){
        return 0;
      }

    }

    public static function salvarAciestsoceco($atestsoceco,$gridgrufam = array('',''))
    {

      try{

        $grufam = $gridgrufam[0];
        $grufamelim = $gridgrufam[1];

        $atestsoceco->save();

        foreach($grufam  as $gf)
        {
          $gf->setIdAtbenefi($atestsoceco->getId());
          $gf->save();
        }

        foreach($grufamelim  as $gf)
        {
          $gf->delete();
        }

        return -1;

      }catch(Exception $e){
        return 0;
      }


    }


    public static function eliminarAciestsoceco($atestsoceco)
    {
      //print_r($Atayudas);exit();
      try{

        //$c = new Criteria();
        //$c->add(AtgrufamPeer::ATESTSOCECO_ID,$atestsoceco->getId());

        //AtgrufamPeer::doDelete($c);


        $atestsoceco->delete();

        return -1;

      }catch(Exception $e){
        return 0;
      }

    }

    public static function getMunicipios($estado='')
    {
      $muni = array();
      $muni[''] = '';
      $c = new Criteria();
      if($estado!='') $c->add(AtmunicipiosPeer::ATESTADOS_ID,$estado);
      $muns = AtmunicipiosPeer::doSelect($c);
      if($muns){
        foreach($muns as $m){
          $muni[$m->getId()] = $m->getDesest().' - '.$m->getDesmun();
        }
      }
      return $muni;
    }

    public static function getParroquias($municipio)
    {
      $parr = array();

      $parr[''] = '';
      $c = new Criteria();
      if($municipio!='') $c->add(AtparroquiasPeer::ATMUNICIPIOS_ID,$municipio);
      $pars = AtparroquiasPeer::doSelect($c);
      if($pars){
        foreach($pars as $p){
          $parr[$p->getId()] = $p->getDespar();
        }
      }
      return $parr;
    }


    public static function salvarAcirubros($atrubros,$gridrecaudos)
    {
      try
      {

      $atrubros->save();
      $c = new Criteria();
      $c->add(AtdetrecrubPeer::ATRUBROS_ID,$atrubros->getId());
      AtdetrecrubPeer::doDelete($c);

      foreach($gridrecaudos[0] as $item) {
        if($item->getRecaudo()){
          $atdetrecrub=new Atdetrecrub();
          $atdetrecrub->setAtrubrosId($atrubros->getId());
          $atdetrecrub->setAtrecaudId($item->getAtrecaudId());
          $atdetrecrub->setRequerido($item->getRequerido());
          $atdetrecrub->save();
        }
      }

      return -1;

      }catch(Exception $e){
        return 0;
      }

    }

    public static function getRubros($tipayu='')
    {
      $rubrosarr = array();
      $rubrosarr[''] = '';
      $c = new Criteria();
      if($tipayu!='') $c->add(AtrubrosPeer::ATTIPAYU_ID,$tipayu);
      $rubros = AtrubrosPeer::doSelect($c);
      if($rubros){
        foreach($rubros as $m){
          $rubrosarr[$m->getId()] = $m->getDesrub();
        }
      }
      return $rubrosarr;
    }

}
?>
