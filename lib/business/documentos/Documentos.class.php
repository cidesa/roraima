<?php
/**
 * Documentos: Clase estática para el manejo del seguimiento de los documentos
 *
 * @package    Roraima
 * @subpackage documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Documentos
{
  /*
   * Constantes
   *
   * Estados del Documento
   */
  const CULMINADO = 3;
  const ANULADO = 2;
  const ATENDIDO = 1;
  const NUEVO = 0;

  public static function getDocs()
  {
    //$SQL = 'SELECT tipprc FROM cpdocprc GROUP BY tipprc';
    //$result = Herramientas::BuscarDatos($SQL,&$doc_cpdocprc);

    //CPDOCPRC
    $c = new Criteria();
    $c->addGroupByColumn(CpdocprcPeer::TIPPRC);
    $c->addGroupByColumn(CpdocprcPeer::NOMEXT);
    $c->addGroupByColumn(CpdocprcPeer::NOMABR);
    $c->addGroupByColumn(CpdocprcPeer::ID);


    $reg = CpdocprcPeer::doSelect($c);

    $docs=array();
    foreach ($reg as $doc){
      //$docs[$doc['tipprc']] = $doc['tipprc'];
      $docs[$doc->getTipprc()] = $doc->getTipprc().' - '.$doc->getNomext();
    }

    //CPDOCCOM
    $c = new Criteria();
    $c->addGroupByColumn(CpdoccomPeer::TIPCOM);
    $c->addGroupByColumn(CpdoccomPeer::NOMEXT);
    $c->addGroupByColumn(CpdoccomPeer::NOMABR);
    $c->addGroupByColumn(CpdoccomPeer::REFPRC);

    $c->addGroupByColumn(CpdoccomPeer::AFEPRC);
    $c->addGroupByColumn(CpdoccomPeer::AFECOM);
    $c->addGroupByColumn(CpdoccomPeer::AFEDIS);
    $c->addGroupByColumn(CpdoccomPeer::REQAUT);
    $c->addGroupByColumn(CpdoccomPeer::ID);

    $reg = CpdoccomPeer::doSelect($c);

    foreach ($reg as $doc){
      //$docs[$doc['tipprc']] = $doc['tipprc'];
      $docs[$doc->getTipcom()] = $doc->getTipcom().' - '.$doc->getNomext();
    }

    //CPDOCCAU
    $c = new Criteria();
    $c->addGroupByColumn(CpdoccauPeer::TIPCAU);
    $c->addGroupByColumn(CpdoccauPeer::NOMEXT);
    $c->addGroupByColumn(CpdoccauPeer::NOMABR);
    $c->addGroupByColumn(CpdoccauPeer::REFIER);

    $c->addGroupByColumn(CpdoccauPeer::AFEPRC);
    $c->addGroupByColumn(CpdoccauPeer::AFECOM);
    $c->addGroupByColumn(CpdoccauPeer::AFECAU);
    $c->addGroupByColumn(CpdoccauPeer::AFEDIS);
    $c->addGroupByColumn(CpdoccauPeer::ID);

    $reg = CpdoccauPeer::doSelect($c);

    foreach ($reg as $doc){
      //$docs[$doc['tipprc']] = $doc['tipprc'];
      $docs[$doc->getTipcau()] = $doc->getTipcau().' - '.$doc->getNomext();
    }

    //CPDOCPAG
    $c = new Criteria();
    $c->addGroupByColumn(CpdocpagPeer::TIPPAG);
    $c->addGroupByColumn(CpdocpagPeer::NOMEXT);
    $c->addGroupByColumn(CpdocpagPeer::NOMABR);
    $c->addGroupByColumn(CpdocpagPeer::REFIER);

    $c->addGroupByColumn(CpdocpagPeer::AFEPRC);
    $c->addGroupByColumn(CpdocpagPeer::AFECOM);
    $c->addGroupByColumn(CpdocpagPeer::AFECAU);
    $c->addGroupByColumn(CpdocpagPeer::AFEPAG);
    $c->addGroupByColumn(CpdocpagPeer::AFEDIS);
    $c->addGroupByColumn(CpdocpagPeer::ID);

    $reg = CpdocpagPeer::doSelect($c);


    foreach ($reg as $doc){
      //$docs[$doc['tipprc']] = $doc['tipprc'];
      $docs[$doc->getTippag()] = $doc->getTippag().' - '.$doc->getNomext();
    }



    return $docs;
  }

  public static function getDesDoc($iddoc)
  {

    //CPDOCPRC
    $c = new Criteria();
    $c->add(CpdocprcPeer::TIPPRC,"rtrim(".CpdocprcPeer::TIPPRC.")='".$iddoc."'",Criteria::CUSTOM);

    $reg = CpdocprcPeer::doSelectOne($c);

    if($reg) return $reg->getNomext();

    //CPDOCCOM
    $c = new Criteria();
    $c->add(CpdoccomPeer::TIPCOM,"rtrim(".CpdoccomPeer::TIPCOM.")='".$iddoc."'",Criteria::CUSTOM);

    $reg = CpdoccomPeer::doSelectOne($c);

    if($reg) return $reg->getNomext();

    //CPDOCCAU
    $c = new Criteria();
    $c->add(CpdoccauPeer::TIPCAU,"rtrim(".CpdoccauPeer::TIPCAU.")='".$iddoc."'",Criteria::CUSTOM);

    $reg = CpdoccauPeer::doSelectOne($c);

    if($reg) return $reg->getNomext();

    //CPDOCPAG
    $c = new Criteria();

    $c->add(CpdocpagPeer::TIPPAG,"rtrim(".CpdocpagPeer::TIPPAG.")='".$iddoc."'",Criteria::CUSTOM);
    $reg = CpdocpagPeer::doSelectOne($c);

    if($reg) return $reg->getNomext();

  }


  public static function getTablas(){


  $SQL = "select distinct(pg_class.relname) as nomtab

      from pg_attribute, pg_class, pg_type

      where attrelid = pg_class.oid
      and attnum > 0
      and atttypid=pg_type.oid
      --and pg_class.relname not like ('%i%')
      and pg_class.relname not like ('%pkey')
      and pg_class.relname not like ('%key')
      and pg_class.relname not like ('pk%')
      and pg_class.relname not like ('PKB%')
      and pg_class.relname not like ('PKN%')
      and pg_class.relname not like ('tabla%')
      and pg_class.relname not like ('role%')
      and pg_class.relname not like ('temp%')
      and pg_class.relname not like ('fk%')
      and pg_class.relname not like ('i0%')
      and pg_class.relname not like ('i1%')
      and pg_class.relname not like ('i2%')
      and pg_class.relname not like ('i_c%')
      and pg_class.relname not like ('i_f%')
      and pg_class.relname not like ('i_b%')
      and pg_class.relname not like ('i_h%')
      and pg_class.relname not like ('i_i%')
      and pg_class.relname not like ('i_n%')
      and pg_class.relname not like ('i_o%')
      and pg_class.relname not like ('i_t%')
      and pg_class.relname not like ('i_s%')
      and pg_class.relname not like ('view%')
      and pg_class.relname not like ('usage%')
      and pg_class.relname not like ('sql%')
      and pg_class.relname not like ('routine%')
      and pg_class.relname not like ('%temp%')
      and pg_class.relname not like ('%pk%')
      and pg_class.relname not like ('%new%')
      and pg_class.relname not like ('%seq%')
      and pg_class.relname not like ('%006%')
      and pg_class.relname not like ('key%')
      and pg_class.relname not like ('element%')
      and pg_class.relname not like ('domain%')
      and pg_class.relname not like ('%temporal%')
      and pg_class.relname not like ('%custom%')
      and pg_class.relname not like ('constraint%')
      and pg_class.relname not like ('check%')
      and pg_class.oid in
      (select oid from pg_class where relname !~~ 'pg%')
      and pg_type.oid in (select oid from pg_type)
      and not pg_class.relname like ('%id_seq')

      order by pg_class.relname;";
    $t = array();
    $tablas = array();
  $result = Herramientas::BuscarDatos($SQL,&$t);

  foreach ($t as $tabla){
    $tablas[$tabla['nomtab']] = $tabla['nomtab'];
  }

    return $tablas;


    }

  public static function getDocPendientes($idusuario)
  {
    // Cargo las trablas de las cuales me debo traer los documentos
    $c = new Criteria();
      $dftabtips = DftabtipPeer::doSelect($c);
      $documentos = array();

      if(isset($dftabtips) && count($dftabtips)>0){
      foreach($dftabtips as $tabtip){

        $c = new Criteria();
        $c->add(DfrutadocPeer::ID_DFTABTIP, $tabtip->getId());
        $c->addAscendingOrderByColumn(DfrutadocPeer::RUTDOC);
        $dfrutasdocs = DfrutadocPeer::doSelectOne($c);

        if(!$dfrutasdocs) break;


        $nomdoc = $tabtip->getTipdoc();
        $nomdoc = trim($nomdoc);

        $tabla = $tabtip->getNomtab();
        $tabla = strtoupper($tabla);

        $coddoc = $tabtip->getClvprm();
        $coddoc = strtolower($coddoc);

        $tipodoc = $tabtip->getClvfrn();
        $tipodoc = $tipodoc;

        $mondoc = $tabtip->getMondoc();
        $mondoc = strtolower($mondoc);

        $fecdoc = $tabtip->getFecdoc();
        $fecdoc = strtolower($fecdoc);

        $desdoc = $tabtip->getDesdoc();
        $desdoc = strtolower($desdoc);

        $stadoc = $tabtip->getStadoc();
        $stadoc = strtolower($stadoc);

        // Tabla Foranea
        $nomtabfk = $tabtip->getNomtabfk();
        $nomtabfk = strtoupper($nomtabfk);

        $nomcolloc = $tabtip->getNomcolloc();
        $nomcolloc = strtolower($nomcolloc);

        $nomcolfor = $tabtip->getNomcolfor();
        $nomcolfor = strtolower($nomcolfor);

        $infdoc1 = $tabtip->getInfdoc1();
        $infdoc1 = strtolower($infdoc1);

        $infdoc2 = $tabtip->getInfdoc2();
        $infdoc2 = strtolower($infdoc2);

        $infdoc3 = $tabtip->getInfdoc3();
        $infdoc3 = strtolower($infdoc3);

        $infdoc4 = $tabtip->getInfdoc4();
        $infdoc4 = strtolower($infdoc4);

        $refdoc = $tabtip->getRefdoc();
        $refdoc = strtolower($refdoc);

        $sql = "SELECT rtrim($tabla.$coddoc) AS CODDOC, rtrim($tabla.$tipodoc) as TIPDOC , $tabla.$mondoc AS MONDOC, $tabla.$fecdoc AS FECDOC, rtrim($tabla.$desdoc) AS DESDOC, rtrim($tabla.$stadoc) as STADOC, ".($nomtabfk!='' ? ($infdoc1!='' ? "$nomtabfk.$infdoc1" : "''") : "''")." as INFDOC1, ".($nomtabfk!='' ? ($infdoc2!='' ? "$nomtabfk.$infdoc2" : "''") : "''")." as INFDOC2, ".($nomtabfk!='' ? ($infdoc3!='' ? "$nomtabfk.$infdoc3" : "''") : "''")." as INFDOC3, ".($nomtabfk!='' ? ($infdoc4!='' ? "$nomtabfk.$infdoc4" : "''") : "''")." as INFDOC4, ".($refdoc!='' ? "$tabla.$refdoc" : "''")." as REFDOC
            FROM  ".(($nomtabfk!='') ? "($tabla INNER JOIN $nomtabfk ON $tabla.$nomcolloc = $nomtabfk.$nomcolfor)" : "$tabla")." left OUTER JOIN DFATENDOC ON
            rtrim($tabla.$coddoc) = DFATENDOC.coddoc
            where (DFATENDOC.coddoc is NULL) AND rtrim($tabla.$tipodoc) = '$nomdoc' AND $tabla.$fecdoc > '".$tabtip->getFecini()."' AND $tabla.$stadoc = '".$tabtip->getValact()."'";
//print $sql;exit;
        if(Herramientas::BuscarDatos($sql, &$regs)){
          foreach($regs as $reg){
            if($tabtip->getTipdoc() == $reg['tipdoc']){
              $dfatendoc = new Dfatendoc();
              $dfatendoc->setCoddoc(trim($reg['coddoc']));
              $dfatendoc->setDesdoc(substr(trim($reg['desdoc']),0,250) );
              $dfatendoc->setFecdoc(trim($reg['fecdoc']));
              $dfatendoc->setMondoc(trim($reg['mondoc']));
              $dfatendoc->setAnuate(self::NUEVO); // Anulado = 2, Atendido = 1, Nuevo = 0
              $dfatendoc->setStaate(self::NUEVO); // Atendido = 1
              $dfatendoc->setEstado(trim($reg['stadoc']));
              $dfatendoc->setIddftabtip($tabtip->getId());
              $dfatendoc->setInfdoc1(substr(trim($reg['infdoc1']),0,50));
              $dfatendoc->setInfdoc2(substr(trim($reg['infdoc2']),0,50));
              $dfatendoc->setInfdoc3(substr(trim($reg['infdoc3']),0,50));
              $dfatendoc->setInfdoc4(substr(trim($reg['infdoc4']),0,50));
              $dfatendoc->setRefdoc(substr(trim($reg['refdoc']),0,50));
              $dfatendoc->save();

              $c = new Criteria();
              $c->add(DfatendocPeer::CODDOC, $dfatendoc->getCoddoc());
              $c->add(DfatendocPeer::MONDOC, $dfatendoc->getMondoc());
              $dfatendoc = DfatendocPeer::doSelectOne($c);

              $dfatendocdet = new Dfatendocdet();
              $dfatendocdet->setIdDfatendoc($dfatendoc->getId());
              $dfatendocdet->setIdUsuario((int)$idusuario);

              $dfatendocdet->setFecrec($reg['fecdoc']);

              $dfatendocdet->setFecate(0);

              $dfatendocdet->setDiaent(0);
              $dfatendocdet->setIdDfmedtra(0);

              $dfatendocdet->setIdAcunidadOri(0);
              $dfatendocdet->setIdAcunidadDes($dfrutasdocs->getIdAcunidad());
              $dfatendocdet->setIdDfrutadoc($dfrutasdocs->getId());
              $dfatendocdet->setTotdia(0);

              $dfatendocdet->save();

            }
          }
        }
        
        $sql = "SELECT $tabla.$stadoc AS STADOC, DFATENDOC.ID
            FROM $tabla INNER JOIN DFATENDOC ON rtrim($tabla.$coddoc) = DFATENDOC.coddoc
            where $tabla.$stadoc <> DFATENDOC.ESTADO ";
//print $sql;exit;
        if(Herramientas::BuscarDatos($sql, &$regs)){
          foreach($regs as $reg){
            $id = $reg['id'];
            $estado = $reg['stadoc'];
            $dfatendoc = DfatendocPeer::retrieveByPK($id);
            if($dfatendoc){
              if($estado == $tabtip->getValanu()){
                $dfatendoc->setEstado($estado);
                $dfatendoc->setAnuate(1);
                $dfatendoc->save();
              }
            }
          }
        }

        // Actualizar nroexp en base a la referencia
        $sql = "update dfatendoc a set nroexp = (select nroexp from dfatendoc b where a.refdoc=b.coddoc ) where refdoc in (select coddoc from dfatendoc)";
        Herramientas::BuscarDatos($sql, &$regs);

      }
      return true;
    }else return false;

  }

  /*
   * Atender un Documento
   * Este proceso se ejecuta cuando un documento ya fue atendido
   * y enviado a la siguiente unidad para que sea procesado
   *
   */
  public static function eliminarDocpen($dfatendoc,$idusuario,$descripcion = 'Sin Descripción')
  {
    if($dfatendoc->getAnuate()==0){

      $c = new Criteria();
      $c->add(DfrutadocPeer::ID_DFTABTIP, $dfatendoc->getIdDftabtip());
      $c->addAscendingOrderByColumn(DfrutadocPeer::RUTDOC);
      $dfrutasdocs = DfrutadocPeer::doSelect($c);

      $c = new Criteria();
      $c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);
      $c->add(DfatendocdetPeer::ID_DFATENDOC, $dfatendoc->getId());
      $c->addAscendingOrderByColumn(DfrutadocPeer::RUTDOC);
      $dfatendocdet = DfatendocdetPeer::doSelect($c);

      if($dfatendocdet){

        $usuario = UsuariosPeer::retrieveByPK((int)$idusuario);

        if(!$usuario) return 1212;
        else{
          if($usuario->getNumuni()!=''){
            $unidad = AcunidadPeer::retrieveByPK((int)$usuario->getNumuni());
            if(!$unidad) return 1214;
            else{
              if($unidad->getId()!=$dfatendocdet[count($dfatendocdet)-1]->getIdAcunidadDes()) return 1215;
            }
          }else{
            return 1213;
          }
        }

        $dfatendoc->setAnuate(1);
        $dfatendoc->save();
        return -1;
      }else return 1210;
    }else{
      $dfatendoc->setAnuate(0);
      $dfatendoc->save;

    }
  }

  /*
   * Atender un Documento
   * Este proceso se ejecuta cuando un documento ya fue atendido
   * y enviado a la siguiente unidad para que sea procesado
   *
   */
  public static function salvarDocpen($dfatendoc,$idusuario,$dfatendocdet_in)
  {
    if(!$dfatendoc->estaAnulado()){

      $c = new Criteria();
      $c->add(DfrutadocPeer::ID_DFTABTIP, $dfatendoc->getIdDftabtip());
      $c->addAscendingOrderByColumn(DfrutadocPeer::RUTDOC);
      $dfrutasdocs = DfrutadocPeer::doSelect($c);

      $c = new Criteria();
      $c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);
      $c->add(DfatendocdetPeer::ID_DFATENDOC, $dfatendoc->getId());
      $c->addAscendingOrderByColumn(DfrutadocPeer::RUTDOC);
      $dfatendocdet = DfatendocdetPeer::doSelect($c);

      if($dfatendocdet){

        $usuario = UsuariosPeer::retrieveByPK((int)$idusuario);

        if(!$usuario) return 1212;
        else{
          if($usuario->getNumuni()!=''){
            $unidad = AcunidadPeer::retrieveByPK((int)$usuario->getNumuni());
            if(!$unidad) return 1214;
            else{
              if($unidad->getId()!=$dfatendocdet[count($dfatendocdet)-1]->getIdAcunidadDes()) return 1215;
            }
          }else{
            return 1213;
          }
        }


        if(count($dfatendocdet)<=count($dfrutasdocs)){

          // Si ya es el último paso en la ruta
          if((count($dfrutasdocs))==(count($dfatendocdet)) && $dfatendoc->getStaate()!=self::CULMINADO){
            $dfatendoc->setStaate('2');
            $dfatendoc->save();
          }
          
          $totdia = Documentos::ContDiasFecha($dfatendocdet[count($dfatendocdet)-1]->getFecrec('Y-m-d'),date("Y-m-d"));
          $totdia = $totdia - $dfatendocdet_in->getDiaent();

          $dfatendocdet[count($dfatendocdet)-1]->setFecate(time("Y-m-d H:i:s"));
          $dfatendocdet[count($dfatendocdet)-1]->setIdDfmedtra($dfatendocdet_in->getIdDfmedtra());
          $dfatendocdet[count($dfatendocdet)-1]->setDesate($dfatendocdet_in->getDesate());
          $dfatendocdet[count($dfatendocdet)-1]->setDiaent($dfatendocdet_in->getDiaent());
          $dfatendocdet[count($dfatendocdet)-1]->setTotdia($totdia);
          $dfatendocdet[count($dfatendocdet)-1]->setIdUsuario((int)$idusuario);
          $dfatendocdet[count($dfatendocdet)-1]->save();

          if((count($dfatendocdet))<(count($dfrutasdocs))){

            //print "Grabando...";exit();
            $nuevo_dfatendocdet = new Dfatendocdet();
            $nuevo_dfatendocdet->setIdDfatendoc($dfatendoc->getId());
            $nuevo_dfatendocdet->setIdUsuario(0);
            $nuevo_dfatendocdet->setDiaent(0);
            $nuevo_dfatendocdet->setTotdia(0);
            $nuevo_dfatendocdet->setIdDfmedtra(0);
            $nuevo_dfatendocdet->setFecrec(time("Y-m-d H:i:s"));
            $nuevo_dfatendocdet->setFecate(0);

            $nuevo_dfatendocdet->setIdAcunidadOri($dfatendocdet[count($dfatendocdet)-1]->getIdAcunidadDes());
            $nuevo_dfatendocdet->setIdAcunidadDes($dfrutasdocs[count($dfatendocdet)]->getIdAcunidad());
            $nuevo_dfatendocdet->setIdDfrutadoc($dfrutasdocs[count($dfatendocdet)]->getId());
            $nuevo_dfatendocdet->save();

          }

          if($dfatendoc->getStaate()==self::NUEVO){
            $dfatendoc->setStaate('1');
            $dfatendoc->save();
          }

        }else return 1211;

      }else return 1210;

    }else return 1216;

    return -1;
  }

  public static function SumDiasFecha($fecha,$dias)
  {

    return $fecha;

  }

  public static function ContDiasFecha($fechaI,$fechaF)
  {
    if($fechaF=='1969-12-31 20:00:00') return 0;
    else{
      $diasferiados = DfdiaferPeer::doSelect(new Criteria());
      $arraydf = array();
      $fI = date('Y-m-d',strtotime($fechaI));
      $fF = date('Y-m-d',strtotime($fechaF));
      foreach($diasferiados as $df)
      {
        $arraydf[] = $df->getDiafer();
      }

      $salir=false;
      $fecha = $fI;
      $dias = 0;

      while(!$salir)
      {
        if(strtotime($fecha)>strtotime($fF)) $salir=true;
        else{
          if(Documentos::isWorkDay($fecha, $arraydf)) $dias++;
          $fecha = Documentos::add_days($fecha,1);
        }
      }

      return $dias;

    }

  }

  public static function isWorkDay($day,$feriados)
  {
    $d = getdate(strtotime($day));
    if($d['wday']==0 || $d['wday']==6) return false;

    if(in_array($day,$feriados)) return false;

    return true;

  }

  public static function add_days($my_date,$numdays) {
    $date_t = strtotime($my_date.' UTC');
    return gmdate('Y-m-d H:i:s',$date_t + ($numdays*86400));
  }

  public static function salvarObservacion($usuario,$id,$desobs)
  {
    if($id!='' && $desobs!=''){

      $c = new Criteria();
      $c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);
      $c->add(DfatendocdetPeer::ID_DFATENDOC, $id);
      $c->addDescendingOrderByColumn(DfrutadocPeer::RUTDOC);
      $dfatendocdet = DfatendocdetPeer::doSelectOne($c);

      $dfatendocobs = new Dfatendocobs();
      $dfatendocobs->setDesobs($desobs);
      $dfatendocobs->setIdUsuario($usuario);
      $dfatendocobs->setIdDfatendocdet($dfatendocdet->getId());
      $dfatendocobs->setFecobs(time("Y-m-d H:i:s"));
      $dfatendocobs->save();
      return -1;
      
    }else return 0;
    
    
    
  }

  public static function AddDaysDate($fechaI,$dias)
  {
    if($fechaI=='1969-12-31 20:00:00') return $fechaI;
    else{
      $diasferiados = DfdiaferPeer::doSelect(new Criteria());
      $arraydf = array();
      $fI = date('Y-m-d',strtotime($fechaI));
      foreach($diasferiados as $df)
      {
        $arraydf[] = $df->getDiafer();
      }

      $salir=false;
      $dialaborable=false;
      $fecha = $fI;

      for($i=1;$i<=$dias;$i++)
      {
        $dialaborable=false;
        while(!$dialaborable){
          $fecha = Documentos::add_days($fecha,1);
          if(Documentos::isWorkDay($fecha, $arraydf)) $dialaborable=true;
        }
      }

      return $fecha;

    }

  }

  public static function validarDocrutv2($dftabtip, $grid)
  {
    if(!$dftabtip->getId()) if($dftabtip->getTipdoc()=='') return 1404;

    if($dftabtip->getId()) $tabtip = DftabtipPeer::retrieveByPK($dftabtip->getId());
    else $tabtip = DftabtipPeer::retrieveByPK($dftabtip->getTipdoc());

    if(!$dftabtip->getId()){
      if($tabtip){
        $c = new Criteria();
        $c->add(DfrutadocPeer::ID_DFTABTIP,$tabtip->getId());
        $rutadoc = DfrutadocPeer::doSelectOne($c);
        if($rutadoc) return 1405;
      }else return 1404;
    }

    $grid = $grid[0];

    if(count($grid)>0){
      foreach($grid as $g){
        if($g->getIdAcunidad()=='' || $g->getDesrut()=='' || $g->getDiadoc()=='' || $g->getDesuni()=='' || $g->getRutdoc()=='') return 1403;
      }
    }else return 1406;
    
    return -1;

  }

  public static function salvarDocrutv2($dftabtip, $grid)
  {
    $grid = $grid[0];

    if($dftabtip->getId()) $tabtip = DftabtipPeer::retrieveByPK($dftabtip->getId());
    else $tabtip = DftabtipPeer::retrieveByPK($dftabtip->getTipdoc());

    try{
      foreach($grid as $dfrutadoc){
        $dfrutadoc->setIdDftabtip($tabtip->getId());
        $dfrutadoc->save();
      }
      return -1;
    }catch(Exception $ex){
      return 0;
    }
  }


}

?>
