<?php

/**
 * Autenticacion: Clase para el manejo de usuarios y grupos dentro de la aplicacion
 *
 * @package    Roraima
 * @subpackage autenticacion
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Autenticacion.class.php 35626 2009-12-15 21:04:14Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Autenticacion {

  public static function salvarUsuarios($usuario)
  {
    /* if($usuario->getId()==''){

      $apliuser= new ApliUser();
      $apliuser->setLoguse($usuario->getLoguse());
      $apliuser->setCodemp(sfContext::getInstance()->getUser()->getAttribute('empresa'));
      $apliuser->setCodapl('CI0');
      $apliuser->setNomopc('menu');
      $apliuser->setPriuse('15');
      $apliuser->save();

      $apliuser= new ApliUser();
      $apliuser->setLoguse($usuario->getLoguse());
      $apliuser->setCodemp(sfContext::getInstance()->getUser()->getAttribute('empresa'));
      $apliuser->setCodapl('CI0');
      $apliuser->setNomopc('catalogo');
      $apliuser->setPriuse('15');
      $apliuser->save();

     }*/

     $usuario->setPasuse('md5'.md5(strtoupper($usuario->getLoguse()).$usuario->getPasuse()));

     $usuario->save();

  }


  public static function salvarApliuser($apli_user,$grid,$empresa)
  {
    $login=$apli_user->getLoguse();
    $codigoapli=explode('_',$apli_user->getCodapl());
    $c= new Criteria();
    $c->add(ApliUserPeer::LOGUSE,$login);
    $c->add(ApliUserPeer::CODEMP,$empresa);
    $c->add(ApliUserPeer::CODAPL,$codigoapli[1]);
    ApliUserPeer::doDelete($c);

    $priv=false;
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['priuse']!='')
      {
       $apliuser= new ApliUser();
       $apliuser->setLoguse($login);
       $apliuser->setCodemp($empresa);
       $apliuser->setCodapl($codigoapli[1]);
       $apliuser->setNomopc($x[$j]['nomopc']);
       $apliuser->setPriuse($x[$j]['priuse']);
       $apliuser->save();
       $priv=true;
      }
      $j++;
    }

   // Agregando los privilegios minimos

    if ($apli_user->getAdministrador()=='')
    {
     if ($priv==true)
    {

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('menu');
    $apliuser->setPriuse('15');
    $apliuser->save();

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('catalogo');
    $apliuser->setPriuse('15');
    $apliuser->save();
    }
    }
   else
   {

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('admin');
   $apliuser->setPriuse('15');
   $apliuser->save();

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('menu');
   $apliuser->setPriuse('15');
   $apliuser->save();

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('catalogo');
   $apliuser->setPriuse('15');
   $apliuser->save();
   }

  }

  public static function validadNivelAprobacion($login,$monto,&$error)
  {
  	$error=-1;

  	$c= new Criteria();
  	$reg=OpdefempPeer::doSelectOne($c);
  	if ($reg)
  	{
  		if ($reg->getUnitri()>0)
  		{
  		  $unitrireal=$monto/$reg->getUnitri();
  		}else {
  			$error=533;
  			return $error;
  		}
  	}

    $u= new Criteria();
    $u->add(UsuariosPeer::LOGUSE,$login);
    $result= UsuariosPeer::doSelectOne($u);
    if ($result)
    {
      $p= new Criteria();
      $p->add(SegranaprPeer::CODNIV,$result->getCodniv());
      $registro= SegranaprPeer::doSelectOne($p);
      if ($registro)
      {
      	if ($unitrireal<=$registro->getRanhas() && $unitrireal>=$registro->getRandes())
      	{
         $error=-1;
      	}else{
      		$error=534;
      	}
      }
    }
    return $error;
  }

  public static function ActsaldosContables($empresa)
  {
     $codorigen='SIMA'.$empresa->getCodemp();
     $coddestino='SIMA'.$empresa->getCodempdes();

     $sql='Select * from "'.$coddestino.'".contaba';
     if (Herramientas::BuscarDatos($sql,&$result)){
       $codingreso=$result[0]["codind"];
       $codegreso=$result[0]["codegd"];
       $codresant=$result[0]["codresant"];
       $codresact=$result[0]["codres"];
     }else{
       $codingreso="";
       $codegreso="";
       $codresant="";
       $codresact="";
     }

    $sql1='update "'.$coddestino.'".contabb set SalAnt=(Select SalAct from "'.$codorigen.'".contabb1 where "'.$codorigen.'".contabb1.codcta="'.$coddestino.'".contabb.codcta and PerEje=\'12\')';
    Herramientas::insertarRegistros($sql1);

    $sql2='update "'.$coddestino.'".contabb set salant=0,salprgper=0,salacuper=0 where codcta like \''.$codingreso.'%\'';
    Herramientas::insertarRegistros($sql2);

    $sql3='update "'.$coddestino.'".contabb set salant=0,salprgper=0,salacuper=0 where codcta like \''.$codegreso.'%\'';
    Herramientas::insertarRegistros($sql3);

    $sql4='update "'.$coddestino.'".contabb1 set salact=0,totdeb=0,totcre=0 where codcta like \''.$codingreso.'%\'';
    Herramientas::insertarRegistros($sql4);

    $sql5='update "'.$coddestino.'".contabb1 set salact=0,totdeb=0,totcre=0 where codcta like \''.$codegreso.'%\'';
    Herramientas::insertarRegistros($sql5);

  }

  public static function calcularDisponibilidad($numcue,$codorigen,&$saldo,&$saldoban)
  {
    $saldo=0; $saldoban=0;
    $deb=0; $debban=0;
    $cre=0;  $creban=0;
    $anterior=0; $anteriorban=0;

    $sql='SELECT * FROM "'.$codorigen.'".CONTABA WHERE CODEMP=\'001\'';
    if (Herramientas::BuscarDatos($sql,&$result)){
      $fecinicio=date('d/m/Y',strtotime($result[0]["fecini"]));
    }

    $sql1='SELECT now() as hoy,ANTLIB as antlib,ANTBAN as antban FROM "'.$codorigen.'".TSdefban WHERE NUMCUE =\''.$numcue.'\'';
    if (Herramientas::BuscarDatos($sql1,&$result1)){
        $fecha=date('d/m/Y',strtotime($result1[0]["hoy"]));
        $anterior=$result1[0]["antlib"];
        $anteriorban=$result1[0]["antban"];
    }

    $sql2='SELECT coalesce(SUM(case when A.DEBCRE=\'D\' then B.MONMOV else 0 end),0) as debitos , coalesce(SUM(case when A.DEBCRE=\'C\' then B.MONMOV else 0 end),0) as  creditos
          FROM "'.$codorigen.'".TSTIPMOV A,"'.$codorigen.'".TSMOVLIB B,"'.$codorigen.'".TSDEFBAN C WHERE B.NUMCUE = \''.$numcue.'\' AND b.numcue = c.numcue and
          B.TIPMOV = A.CODTIP AND B.FECLib <= to_date(\''.$fecha.'\',\'dd/mm/yyyy\') AND B.FECLib >= to_date(\''.$fecinicio.'\',\'dd/mm/yyyy\')';
    if (Herramientas::BuscarDatos($sql2,&$result2)){
        $deb=$result2[0]["debitos"];
        $cre=$result2[0]["creditos"];
    }

    $saldo= $anterior + $deb - $cre;

    $sql3='SELECT coalesce(SUM(case when A.DEBCRE=\'D\' then B.MONMOV else 0 end),0) as debitos , coalesce(SUM(case when A.DEBCRE=\'C\' then B.MONMOV else 0 end),0) as creditos
           FROM "'.$codorigen.'".TSTIPMOV A,"'.$codorigen.'".TSMOVBAN B,"'.$codorigen.'".TSDEFBAN C WHERE B.NUMCUE = \''.$numcue.'\' AND b.numcue = c.numcue and
           B.TIPMOV = A.CODTIP AND
           B.FECBan <=to_date(\''.$fecha.'\',\'dd/mm/yyyy\') AND
           B.FECBan >= to_date(\''.$fecinicio.'\',\'dd/mm/yyyy\')';
    if (Herramientas::BuscarDatos($sql3,&$result3)){
        $debban=$result3[0]["debitos"];
        $creban=$result3[0]["creditos"];
    }

    $saldoban= $anteriorban + $debban - $creban;

    return true;
  }

  public static function anoPeriodo($coddestino){
     $anoperiodo=date('YYYY');

      $sql='Select to_char(fecini,\'YYYY\') as  elano From "'.$coddestino.'".ConTaba';
      if (Herramientas::BuscarDatos($sql,&$result)){
          $anoperiodo=$result[0]["elano"];
      }

     return $anoperiodo;
  }

  public static function ActsaldosBancos($empresa)
  {
     $codorigen='SIMA'.$empresa->getCodemp();
     $coddestino='SIMA'.$empresa->getCodempdes();

     if ($empresa->getSalban()=='1')
     {
         $sql='Select * from "'.$coddestino.'".tsdefban';
         if (Herramientas::BuscarDatos($sql,&$result)){
             foreach ($result as $datos){
                self::calcularDisponibilidad($datos["numcue"],$codorigen,&$saldo,&$saldoban);
                $sql1='update "'.$coddestino.'".tsdefban set AntLib=\''.$saldo.'\' Where Numcue=\''.$datos["numcue"].'\'';
                Herramientas::insertarRegistros($sql1);

                $sql2='Update "'.$coddestino.'".tsdefban set AntBan=\''.$saldoban.'\' Where Numcue=\''.$datos["numcue"].'\'';
                Herramientas::insertarRegistros($sql2);
             }
         }

     }

     if ($empresa->getMovtra()=='1')
     {
      $anoperiodo=self::anoPeriodo($coddestino);
      $sql3='Delete "'.$coddestino.'".TSCheEmi Where to_char(fecemi,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql3);

      $sql4='Delete "'.$coddestino.'".TSMovLib Where to_char(feclib,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql4);

      $sql5='Delete "'.$coddestino.'".TSMovBan  Where to_char(fecban,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql5);

      $sql6='Delete "'.$coddestino.'".TSConcil Where to_char(feclib,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql6);

      $sql7='Delete "'.$coddestino.'".TSConcilhis Where to_char(feclib,\'YYYY\')< \''.$anoperiodo.'\'';
      Herramientas::insertarRegistros($sql7);

      $sql8='Insert into "'.$coddestino.'".TSmovlib Select * From "'.$codorigen.'".TsMovlib where stacon<>\'C\'';
      Herramientas::insertarRegistros($sql8);

      $sql9='Insert into "'.$coddestino.'".TSmovBan Select * From "'.$codorigen.'".TsMovBan where stacon<>\'C\'';
      Herramientas::insertarRegistros($sql9);

      $sql10='Insert Into "'.$coddestino.'".TSCheEmi Select * From "'.$codorigen.'".TSCheEmi Where numcue||numche||tipdoc in (select numcue||reflib||tipmov from "'.$codorigen.'".tsmovlib where stacon<>\'C\')';
      Herramientas::insertarRegistros($sql10);

     }
  }

  public static function procesodeeliminacion($simades){
      $t= new Criteria();
      $t->addAscendingOrderByColumn(ApernueperPeer::ORDEN);
      $result= ApernueperPeer::doSelect($t);
      if ($result)
      {
          foreach ($result as $datos){
              $sql='delete from "'.$simades.'".'.$datos->getNomtab();
              Herramientas::insertarRegistros($sql);
          }
      }
  }

  public static function actualizarPeriodo($empresa)
  {
      if (($empresa->getAno() % 4)==0){
          $diasno=366;
      }else $diasno=365;

      $elano=$empresa->getAno();
      $simades="SIMA".$empresa->getCodempdes();
      $simaori="SIMA".$empresa->getCodemp();

      $dir=CIDESA_CONFIG.'databases.yml';
      cidesaTools::exitsfile($dir) ? $dir=$dir : $dir = sfConfig::get('sf_root_dir').'/config/databases.yml';
      $confbd = sfYaml::load($dir);

      if(is_array($confbd)){
        $nombd = $confbd['all']['propel']['param']['database'];
        $userbd = $confbd['all']['propel']['param']['username'];
        $verpostg = $confbd['all']['propel']['param']['postgres8.1'];
      }
      $esquema=sfContext::getInstance()->getUser()->getAttribute('schema');
      $ruta=$_SERVER['DOCUMENT_ROOT'].'/uploads/'.strtolower($nombd).'_migracion_'.strtolower($simaori).'.backup';

    // Nuevo Esquema
        // Creamos el backup del esquema viejo
      $simaorir='"'.$simaori.'"';
      if ($verpostg=='S'){
      $comando = 'pg_dump --username '.$userbd.' --format custom --verbose --file "'.$ruta.'" --schema '.$simaori.' '.$nombd.'';
      }else{
      $comando = 'pg_dump --username '.$userbd.' --format custom --verbose --file "'.$ruta.'" --schema \''.$simaorir.'\' '.$nombd.'';
      }
      $salida=shell_exec($comando);

    //Al esquema viejo le colocamos un nombre X para poder restaurar el otro.
      $esqvie=$simaori.'X';
      $sql='ALTER SCHEMA "'.$simaori.'" RENAME TO "'.$esqvie.'"';
      Herramientas::insertarRegistros2($sql);


    // Creamos el nuevo esquema
      $comando2='pg_restore --username '.$userbd.' --dbname "'.$nombd.'" --format custom --verbose "'.$ruta.'"';
      $salida=shell_exec($comando2);

    // Le colocamos el nombre destino al esquema nuevo

      $sql='ALTER SCHEMA "'.$simaori.'" RENAME TO "'.$simades.'"';
      Herramientas::insertarRegistros2($sql);

      //Al esquema origen le colocamos el nombre original

      $sql='ALTER SCHEMA "'.$esqvie.'" RENAME TO "'.$simaori.'"';
      Herramientas::insertarRegistros2($sql);


      $sql1='Insert Into "SIMA_USER".Empresa Values (\''.$empresa->getCodempdes().'\',\''.$empresa->getDescripcion().'\',\'\',\'\',\''.$simades.'\')';
      Herramientas::insertarRegistros($sql1);

      $sql2='insert into "SIMA_USER".apli_user select codapl, loguse, \''.$empresa->getCodempdes().'\', nomopc, priuse from "SIMA_USER".apli_user where codemp=\''.$empresa->getCodemp().'\'';
      Herramientas::insertarRegistros($sql2);

      $fecini=$elano."-01-01";
      $feclast=$elano."-12-01";

      //Actualizaciones de Contabilidad

      $sql2='Update "'.$simades.'".contaba set etadef=\'A\',fecini=\''.$fecini.'\' ,feccie=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql2);

      $sql3='update "'.$simades.'".contaba1 set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql3);

      $sql4='update "'.$simades.'".contaba1 set fecdes=\''.$fecini.'\',fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
      Herramientas::insertarRegistros($sql4);

      $fecinifeb=$elano."-02-01";
      $sql5='update "'.$simades.'".contaba1 set fecdes=\''.$fecinifeb.'\',fechas=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
      Herramientas::insertarRegistros($sql5);

      $fecinimar=$elano."-03-01";
      $sql6='update "'.$simades.'".contaba1 set fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
      Herramientas::insertarRegistros($sql6);

      $feciniabr=$elano."-04-01";
      $sql7='update "'.$simades.'".contaba1 set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
      Herramientas::insertarRegistros($sql7);

      $fecinimay=$elano."-05-01";
      $sql8='update "'.$simades.'".contaba1 set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
      Herramientas::insertarRegistros($sql8);

      $fecinijun=$elano."-06-01";
      $sql9='update "'.$simades.'".contaba1 set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
      Herramientas::insertarRegistros($sql9);

      $fecinijul=$elano."-07-01";
      $sql10='update "'.$simades.'".contaba1 set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
      Herramientas::insertarRegistros($sql10);

      $feciniago=$elano."-08-01";
      $sql11='update "'.$simades.'".contaba1 set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
      Herramientas::insertarRegistros($sql11);

      $fecinisep=$elano."-09-01";
      $sql12='update "'.$simades.'".contaba1 set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
      Herramientas::insertarRegistros($sql12);

      $fecinioct=$elano."-10-01";
      $sql13='update "'.$simades.'".contaba1 set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
      Herramientas::insertarRegistros($sql13);

      $fecininov=$elano."-11-01";
      $sql14='update "'.$simades.'".contaba1 set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
      Herramientas::insertarRegistros($sql14);

      $fecinidic=$elano."-12-01";
      $sql15='update "'.$simades.'".contaba1 set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
      Herramientas::insertarRegistros($sql15);

      $sql16='Update "'.$simades.'".contaba1 set Status=\'A\'';
      Herramientas::insertarRegistros($sql16);

      $sql17='update "'.$simades.'".contabb set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql17);

      $sql18='update "'.$simades.'".contabb set salant=0,salprgper=0,salacuper=0';
      Herramientas::insertarRegistros($sql18);

      $sql19='update "'.$simades.'".contabb1 set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql19);

      $sql20='update "'.$simades.'".contabb1 set totdeb=0,totcre=0,salact=0';
      Herramientas::insertarRegistros($sql20);

      //Borrando Comprobantes

      $sql19='delete from "'.$simades.'".contabc1';
      Herramientas::insertarRegistros($sql19);

      $sql20='delete from "'.$simades.'".contabc';
      Herramientas::insertarRegistros($sql20);


      //Actualizaciones de Presupuesto

      $sql21='update "'.$simades.'".cpdefniv set EtaDef=\'A\',fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\'),fecper=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql21);

      $sql22='update "'.$simades.'".cppereje set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql22);

      $sql4='update "'.$simades.'".cppereje set fecdes=\''.$fecini.'\',fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
      Herramientas::insertarRegistros($sql4);

      $fecinifeb=$elano."-02-01";
      $sql5='update "'.$simades.'".cppereje set fecdes=\''.$fecinifeb.'\',fechas=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
      Herramientas::insertarRegistros($sql5);

      $fecinimar=$elano."-03-01";
      $sql6='update "'.$simades.'".cppereje set fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
      Herramientas::insertarRegistros($sql6);

      $feciniabr=$elano."-04-01";
      $sql7='update "'.$simades.'".cppereje set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
      Herramientas::insertarRegistros($sql7);

      $fecinimay=$elano."-05-01";
      $sql8='update "'.$simades.'".cppereje set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
      Herramientas::insertarRegistros($sql8);

      $fecinijun=$elano."-06-01";
      $sql9='update "'.$simades.'".cppereje set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
      Herramientas::insertarRegistros($sql9);

      $fecinijul=$elano."-07-01";
      $sql10='update "'.$simades.'".cppereje set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
      Herramientas::insertarRegistros($sql10);

      $feciniago=$elano."-08-01";
      $sql11='update "'.$simades.'".cppereje set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
      Herramientas::insertarRegistros($sql11);

      $fecinisep=$elano."-09-01";
      $sql12='update "'.$simades.'".cppereje set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
      Herramientas::insertarRegistros($sql12);

      $fecinioct=$elano."-10-01";
      $sql13='update "'.$simades.'".cppereje set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
      Herramientas::insertarRegistros($sql13);

      $fecininov=$elano."-11-01";
      $sql14='update "'.$simades.'".cppereje set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
      Herramientas::insertarRegistros($sql14);

      $fecinidic=$elano."-12-01";
      $sql15='update "'.$simades.'".cppereje set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
      Herramientas::insertarRegistros($sql15);

      $sql16='Update "'.$simades.'".cppereje set EstPer=\'A\'';
      Herramientas::insertarRegistros($sql16);

      // Inicializando Montos Presupesto de Egresos
      if ($empresa->getPreegr()=='1')
      {
          $sql='Update "'.$simades.'".CPASIINI SET MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONDIM = 0,MONAJU = 0, MONDIS = MonAsi';
      }else {
          $sql='Update "'.$simades.'".CPASIINI SET MONASI = 0,MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONDIM = 0,MONAJU = 0, MONDIS = 0';
      }
      Herramientas::insertarRegistros($sql);

      $sql16='Update "'.$simades.'".CPASIINI SET ANOPRE=\''.$elano.'\'';
      Herramientas::insertarRegistros($sql16);


      // Presupuesto Ingreso

      $sql21='update "'.$simades.'".cidefniv set EtaDef=\'A\',fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\'),fecper=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql21);

      $sql22='update "'.$simades.'".cipereje set fecini=\''.$fecini.'\',feccie=Last_Day(\''.$feclast.'\')';
      Herramientas::insertarRegistros($sql22);

      $sql4='update "'.$simades.'".cipereje set fecdes=\''.$fecini.'\',fechas=Last_Day(\''.$fecini.'\') where pereje=\'01\'';
      Herramientas::insertarRegistros($sql4);

      $fecinifeb=$elano."-02-01";
      $sql5='update "'.$simades.'".cipereje set fecdes=\''.$fecinifeb.'\',fechas=Last_Day(\''.$fecinifeb.'\') where pereje=\'02\'';
      Herramientas::insertarRegistros($sql5);

      $fecinimar=$elano."-03-01";
      $sql6='update "'.$simades.'".cipereje set fecdes=\''.$fecinimar.'\',fechas=Last_Day(\''.$fecinimar.'\') where pereje=\'03\'';
      Herramientas::insertarRegistros($sql6);

      $feciniabr=$elano."-04-01";
      $sql7='update "'.$simades.'".cipereje set fecdes=\''.$feciniabr.'\',fechas=Last_Day(\''.$feciniabr.'\') where pereje=\'04\'';
      Herramientas::insertarRegistros($sql7);

      $fecinimay=$elano."-05-01";
      $sql8='update "'.$simades.'".cipereje set fecdes=\''.$fecinimay.'\',fechas=Last_Day(\''.$fecinimay.'\') where pereje=\'05\'';
      Herramientas::insertarRegistros($sql8);

      $fecinijun=$elano."-06-01";
      $sql9='update "'.$simades.'".cipereje set fecdes=\''.$fecinijun.'\',fechas=Last_Day(\''.$fecinijun.'\') where pereje=\'06\'';
      Herramientas::insertarRegistros($sql9);

      $fecinijul=$elano."-07-01";
      $sql10='update "'.$simades.'".cipereje set fecdes=\''.$fecinijul.'\',fechas=Last_Day(\''.$fecinijul.'\') where pereje=\'07\'';
      Herramientas::insertarRegistros($sql10);

      $feciniago=$elano."-08-01";
      $sql11='update "'.$simades.'".cipereje set fecdes=\''.$feciniago.'\',fechas=Last_Day(\''.$feciniago.'\') where pereje=\'08\'';
      Herramientas::insertarRegistros($sql11);

      $fecinisep=$elano."-09-01";
      $sql12='update "'.$simades.'".cipereje set fecdes=\''.$fecinisep.'\',fechas=Last_Day(\''.$fecinisep.'\') where pereje=\'09\'';
      Herramientas::insertarRegistros($sql12);

      $fecinioct=$elano."-10-01";
      $sql13='update "'.$simades.'".cipereje set fecdes=\''.$fecinioct.'\',fechas=Last_Day(\''.$fecinioct.'\') where pereje=\'10\'';
      Herramientas::insertarRegistros($sql13);

      $fecininov=$elano."-11-01";
      $sql14='update "'.$simades.'".cipereje set fecdes=\''.$fecininov.'\',fechas=Last_Day(\''.$fecininov.'\') where pereje=\'11\'';
      Herramientas::insertarRegistros($sql14);

      $fecinidic=$elano."-12-01";
      $sql15='update "'.$simades.'".cipereje set fecdes=\''.$fecinidic.'\',fechas=Last_Day(\''.$fecinidic.'\') where pereje=\'12\'';
      Herramientas::insertarRegistros($sql15);

      // Inicializando Montos Presupesto de Ingresos
      if ($empresa->getPreing()=='1')
      {
          $sql='Update "'.$simades.'".CIASIINI SET MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONAJU = 0,MONDIM = 0, MONDIS = MONASI';
      }else {
          $sql='Update "'.$simades.'".CIASIINI SET MONASI = 0,MONPRC = 0,MONCOM = 0,MONCAU = 0, MONPAG = 0, MONTRA = 0, MONTRN = 0,MONADI = 0,MONAJU = 0,MONDIM = 0, MONDIS = 0';
      }
      Herramientas::insertarRegistros($sql);

      $sql16='Update "'.$simades.'".CIASIINI SET ANOPRE=\''.$elano.'\'';
      Herramientas::insertarRegistros($sql16);

      // Tesoreria

      $sql2='Update "'.$simades.'".opdefemp set NumINi=\'00000001\'';
      Herramientas::insertarRegistros($sql2);

      // Bancos

      $sql3='update "'.$simades.'".tsdefban set debban=0,creban=0,deblib=0,crelib=0';
      Herramientas::insertarRegistros($sql3);

      // Deshabilitando Triggers Presupuesto Egresos

      $sql='ALTER TABLE "'.$simades.'".CPMOVAJU DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql);

      $sql1='ALTER TABLE "'.$simades.'".CPIMPPRC DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql1);

      $sql2='ALTER TABLE "'.$simades.'".CPIMPCOM DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql2);

      $sql3='ALTER TABLE"'.$simades.'".CPIMPCAU DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql3);

      $sql4='ALTER TABLE "'.$simades.'".CPIMPPAG DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql4);

      $sql5='ALTER TABLE "'.$simades.'".CPMOVTRA DISABLE TRIGGER  ALL';
      Herramientas::insertarRegistros($sql5);

      $sql6='ALTER TABLE "'.$simades.'".CPMOVADI DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql6);


      // Deshabilitando Triggers Presupuesto Ingresos

      $sql='ALTER TABLE "'.$simades.'".CIMOVAJU DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql);

      $sql1='ALTER TABLE "'.$simades.'".CIIMPING DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql1);

      $sql2='ALTER TABLE "'.$simades.'".CIMOVTRA DISABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql2);

      self::procesodeeliminacion($simades);

      //Habilitando Triggers Presupuesto Egresos

      $sql='ALTER TABLE "'.$simades.'".CPMOVAJU ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql);

      $sql1='ALTER TABLE "'.$simades.'".CPIMPPRC ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql1);

      $sql2='ALTER TABLE "'.$simades.'".CPIMPCOM ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql2);

      $sql3='ALTER TABLE "'.$simades.'".CPIMPCAU ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql3);

      $sql4='ALTER TABLE "'.$simades.'".CPIMPPAG ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql4);

      $sql5='ALTER TABLE "'.$simades.'".CPMOVTRA ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql5);

      $sql6='ALTER TABLE "'.$simades.'".CPMOVADI ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql6);


      // Habilitando Triggers Presupuesto Ingresos

      $sql='ALTER TABLE "'.$simades.'".CIMOVAJU ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql);

      $sql1='ALTER TABLE "'.$simades.'".CIIMPING ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql1);

      $sql2='ALTER TABLE "'.$simades.'".CIMOVTRA ENABLE TRIGGER ALL';
      Herramientas::insertarRegistros($sql2);

  }

  public static function grabarTablas($dat,$tablas)
  {
      try{
      for ($i = 0; $i < count($tablas); $i++) {
          $newapertura= new Apernueper();
          $newapertura->setOrden($i);
          $newapertura->setNomtab($tablas[$i]);
          $newapertura->save();
      }

	return -1;
	} catch (Exception $ex){
    	  //echo $ex; exit();
	  return 0;
	}
  }

  public static function cargarResultados(){

   $arreglores=array();
   $i=0;
   $t= new Criteria();
   $resul=BdcriterioPeer::doSelect($t);
   if ($resul){
      foreach ($resul as $obj){
          $arreglores[$i]["criterio"]=$obj->getCriterio();
          $arreglores[$i]["temporal"]=$obj->getTemporal();
          $sql='select * from pg_class where relname = \''.$obj->getTemporal().'\'';
          if (Herramientas::BuscarDatos($sql,&$result)){
              $sql1='DROP TABLE '.$obj->getTemporal().' CASCADE';
              Herramientas::insertarRegistros($sql1);
          }
          $sql1='CREATE  TABLE '.$obj->getTemporal().' AS ('.$obj->getSql().')';
          Herramientas::insertarRegistros($sql1);

          $sql2='select coalesce(Count(*),0) as cuantos from '.$obj->getTemporal().'';
          if (Herramientas::BuscarDatos($sql2,&$resulta)){
          $arreglores[$i]["nroreg"]=$resulta[0]["cuantos"];
          }
          $arreglores[$i]["sql"]=$obj->getSql();
          $arreglores[$i]["id"]='9';
          $i++;
      }
   }
   return $arreglores;
  }

}

?>
