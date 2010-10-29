<?php
/**
 * Tesorería: Clase estática para procesar el modulo de tesorería
 *
 * @package    Roraima
 * @subpackage tesoreria
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Tesoreria {
  /**************************Definición del Iva para Agentes de Retención**********************************/
  public static function salvarPagretiva($iva, $grid) {
    self :: grabarIva($iva, $grid);
  }

  public static function grabarIva($iva, $grid)
  {
    $c= new Criteria();
    TsretivaPeer::doDelete($c);

    $x = $grid[0];
    $j = 0;
    while ($j < count($x))
    {
      if ($x[$j]->getCodret()!="" && $x[$j]->getCodrec()!="" && $x[$j]->getCodpar()!="")
      {
      $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $j = 0;
    if (!empty($z[$j]))
    {
      while ($j < count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function grabarIva2($iva, $grid)
  {
    $tipo=$iva->getCodrep();
    $x = $grid[0];
    $j = 0;
    while ($j < count($x))
    {
      $x[$j]->setCodrep($tipo);
      $x[$j]->save();
      $j++;
    }

    $z = $grid[1];
    $j = 0;
    if (!empty($z[$j]))
    {
      while ($j < count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function validarPagmodret($reten, $grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getMonret()=='')
      {
        return 515;
      }
      $j++;
    }
    return -1;
  }

  /********************************************************************************************************/

  /****************************** Miki- Cierre de Bancos **************************************************/

  public static function hay_Conciliacion($tabla, $nro, $mes, $ano) {
    $result = array ();
    $sql = "Select * From " . $tabla . " Where numcue = '" . $nro . "' And mescon = '" . $mes . "' And anocon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      return true;
    } else
      return false;
  }

  public static function generaCierre($nro, $mes, $ano) {
    $sql = "Select numcue,mescon,anocon,refere,movlib,movban,feclib,fecban,desref,monlib,monban,result From tsconcil Where numcue = '" . $nro . "' And mescon = '" . $mes . "' And anocon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tsconcil) {
        Tesoreria :: grabarHistorico($tsconcil);
        Tesoreria :: eliminarTsconcil($nro, $mes, $ano);

      }
    }
  }

  public static function generaApertura($nro, $mes, $ano) {
    $sql = "Select numcue,mescon,anocon,refere,movlib,movban,feclib,fecban,desref,monlib,monban,result From tsconcilhis Where numcue = '" . $nro . "' And mescon = '" . $mes . "' And anocon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tsconcilhis) {
        Tesoreria :: grabarTsconcil($tsconcilhis);
        Tesoreria :: eliminarHistorico($nro, $mes, $ano);
      }
    }
  }

  public static function grabarHistorico($tsconcil) {
    $tsconcilhis = new Tsconcilhis();
    $tsconcilhis->setNumcue($tsconcil["numcue"]);
    $tsconcilhis->setMescon($tsconcil["mescon"]);
    $tsconcilhis->setAnocon($tsconcil["anocon"]);
    $tsconcilhis->setRefere($tsconcil["refere"]);
    $tsconcilhis->setMovlib($tsconcil["movlib"]);
    $tsconcilhis->setMovban($tsconcil["movban"]);
    $tsconcilhis->setFeclib($tsconcil["feclib"]);
    $tsconcilhis->setFecban($tsconcil["fecban"]);
    $tsconcilhis->setDesref($tsconcil["desref"]);
    $tsconcilhis->setMonlib($tsconcil["monlib"]);
    $tsconcilhis->setMonban($tsconcil["monban"]);
    $tsconcilhis->setResult($tsconcil["result"]);

    $tsconcilhis->save();
  }

  public static function grabarTsconcil($tsconcilhis) {
    $tsconcil = new Tsconcil();
    $tsconcil->setNumcue($tsconcilhis["numcue"]);
    $tsconcil->setMescon($tsconcilhis["mescon"]);
    $tsconcil->setAnocon($tsconcilhis["anocon"]);
    $tsconcil->setRefere($tsconcilhis["refere"]);
    $tsconcil->setMovlib($tsconcilhis["movlib"]);
    $tsconcil->setMovban($tsconcilhis["movban"]);
    $tsconcil->setFeclib($tsconcilhis["feclib"]);
    $tsconcil->setFecban($tsconcilhis["fecban"]);
    $tsconcil->setDesref($tsconcilhis["desref"]);
    $tsconcil->setMonlib($tsconcilhis["monlib"]);
    $tsconcil->setMonban($tsconcilhis["monban"]);
    $tsconcil->setResult($tsconcilhis["result"]);

    $tsconcil->save();
  }

  public static function eliminarTsconcil($nro, $mes, $ano) {
    $c = new Criteria();
    $c->add(TsconcilPeer :: NUMCUE, $nro);
    $c->add(TsconcilPeer :: MESCON, $mes);
    $c->add(TsconcilPeer :: ANOCON, $ano);
    $tsconcil = TsconcilPeer :: doSelect($c);
    if ($tsconcil)
    {
    foreach ($tsconcil as $valor) {
      $valor->delete();
    }
    }
  }

  public static function eliminarHistorico($nro, $mes, $ano) {
    $c = new Criteria();
    $c->add(TsconcilhisPeer :: NUMCUE, $nro);
    $c->add(TsconcilhisPeer :: MESCON, $mes);
    $c->add(TsconcilhisPeer :: ANOCON, $ano);
    $tsconcilhis = TsconcilhisPeer :: doSelect($c);
    if ($tsconcilhis)
    {
    foreach ($tsconcilhis as $valor) {
      $valor->delete();
    }
    }
  }

  /********************************************************************************************************/
  //formulario tesmovtraban
  /********************************************************************************************************/
  /****************************** Definición de Cuentas Bancarias **************************************************/
  /* Función para grabar el detalle; las chequeras pertenecientes a una cuenta bancaria
  *
  * @static
  * @param $reqser Object $defcueban a guardar
  * @param $grid Array de Objects a guardar.
  * @return void
  */
  public static function Grabar_Chequeras($defcueban, $grid) {

    $numcue = $defcueban->getNumcue();
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      $x[$j]->setNumcue($numcue);
      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      } //while ($j<count($z))
    } //if (!empty($z[$j]))
  } //end function

  /********************************* Miki- Conciliacion **************************************************/
  public static function el_Banco_Esta_Cerrado($nro, $mes, $ano) {
    $sql = "Select * From TSCONCILHIS Where NumCue = '" . $nro . "' And MesCon = '" . $mes . "' And AnoCon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      return true;
    } else {
      return false;
    }
  }

  public static function elimina_Conciliaciones_Anteriores($nro) {
    $c = new Criteria();
    $c->add(TsconcilPeer :: NUMCUE, $nro);
    $tsconcil = TsconcilPeer :: doSelect($c);
    if ($tsconcil)
    {
    foreach ($tsconcil as $valor) {
      $valor->delete();
    }
    }

  }

	public static function hacer_Conciliables($nro, $mes, $ano, $fechas) {
    $sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
            A.TipMov as tipmov1, B.TipMov as tipmov2, A.DesLib as deslib, B.DesBan as desban,
            A.MonMov as monmov1, B.MonMov as monmov2
                   From TsMovLib A, TsMovBan B
                  Where A.RefLib = B.RefBan And
                    A.MonMov = B.MonMov And A.tipmov=b.tipmov and
                    A.NumCue = '" . $nro . "' And
            B.NumCue = '" . $nro . "' And
                     A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     A.StaCon='N' And B.StaCon='N' AND
                     A.Status='C' And B.Status='C'";

    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tstemigu) {
        $tsconcil = new Tsconcil();
        $tsconcil->setNumcue($nro);
        $tsconcil->setMescon($mes);
        $tsconcil->setAnocon($ano);
        $tsconcil->setRefere($tstemigu["reflib"]);
        $tsconcil->setMovlib($tstemigu["tipmov1"]);
        $tsconcil->setMovban($tstemigu["tipmov2"]);
        $tsconcil->setFeclib($tstemigu["feclib"]);
        $tsconcil->setFecban($tstemigu["fecban"]);
        $tsconcil->setDesref($tstemigu["deslib"]);
        $tsconcil->setMonlib($tstemigu["monmov1"]);
        $tsconcil->setMonban($tstemigu["monmov2"]);
        $tsconcil->setResult('CONCILIADO');
        $tsconcil->save();

        Tesoreria :: actualizar_Status($nro, $tstemigu["reflib"], 'C',$tstemigu["tipmov1"]);
      }
    }

  }


	public static function hacer_Conciliables_Inconciliables($nro, $mes, $ano, $fechas) {
  	  $dateFormat = new sfDateFormat('es_VE');
      $fechas = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

  	  $c=new Criteria();
	  $c->add(TsmovlibPeer::NUMCUE,$nro);
	  $c->add(TsmovlibPeer::FECLIB,$fechas,Criteria::LESS_EQUAL);
	  $c->add(TsmovlibPeer::STACON1,'C');
	  $reg = TsmovlibPeer::doSelect($c);

	  if ($reg){
	      foreach ($reg as $tsconcil) {
	        $tsconcil->setStacon('C');
	        $tsconcil->save();
	  	  }

      }
      //Bancos
  	  $c=new Criteria();
	  $c->add(TsmovbanPeer::NUMCUE,$nro);
	  $c->add(TsmovbanPeer::FECBAN,$fechas,Criteria::LESS_EQUAL);
	  $c->add(TsmovbanPeer::STACON1,'C');
	  $reg = TsmovbanPeer::doSelect($c);

	  if ($reg){
	      foreach ($reg as $tstemigu) {
	        $tstemigu->setStacon('C');
	        $tstemigu->save();
	  	  }

      }
  }

  public static function hacer_Conciliables_Anulados($nro, $mes, $ano, $fechas) {
    $sql = "Select reflibpad,tipmovpad
                 From TSMovLib
                 Where NumCue = '" . $nro . "' And
                       FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                       (TipMov='ANUC')
                       		";

    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tstemigu) {
        $c = new Criteria();
        $c->add(TsmovlibPeer :: NUMCUE, $nro);
        $c->add(TsmovlibPeer :: REFLIB, $tstemigu["reflibpad"]);
        $c->add(TsmovlibPeer :: TIPMOV, $tstemigu["tipmovpad"]);
        $tsmovlib = TsmovlibPeer :: doSelectOne($c);

        if ($tsmovlib) {
          $tsmovlib->setStacon('C');
          $tsmovlib->save();
        }
      }
    }
  }

   public static function hacer_Libro_No_Banco($nro, $mes, $ano, $fechas) {
    $sql = "Select reflib,tipmov,feclib,deslib,monmov From TsMovLib
                  Where NumCue = '" . $nro . "' And
                    FecLib<= To_Date('" . $fechas . "','DD/MM/YYYY') And Status = 'C' And StaCon='N' ";

    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tsmovlib) {
        $sql2 = "SELECT REFBAN From TSMOVBAN
                         WHERE NUMCUE= '" . $nro . "' And
                            RefBan ='" . $tsmovlib["reflib"] . "' And Tipmov ='" . $tsmovlib["tipmov"] . "' And
                            FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY')";
        if  (!Herramientas :: BuscarDatos($sql2, & $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovlib["reflib"]);
          $tsconcil->setMovlib($tsmovlib["tipmov"]);
          $tsconcil->setMovban(null);
          $tsconcil->setFeclib($tsmovlib["feclib"]);
          $tsconcil->setFecban(null);
          $tsconcil->setDesref($tsmovlib["deslib"]);
          $tsconcil->setMonlib($tsmovlib["monmov"]);
          $tsconcil->setMonban(0);
          $tsconcil->setResult('MOVIMIENTO EN TRANSITO');
          $tsconcil->save();

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovlibPeer :: NUMCUE, $nro);
          $c->add(TsmovlibPeer :: FECLIB, $fecfin);
          $c->add(TsmovlibPeer :: STATUS, 'C');
          $c->add(TsmovlibPeer :: STACON, 'N');
          $tsmovlib2 = TsmovlibPeer :: doSelectOne($c);
          if ($tsmovlib2) {
          	//foreach ($tsmovlib2 as $lib2) {
            $tsmovlib2->setStacon('N');
            $tsmovlib2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_Banco_No_Libro($nro, $mes, $ano, $fechas) {
    $sql = "Select refban, tipmov, fecban, desban, monmov
                    From TsMovBan
                  Where NumCue = '" . $nro . "' And
                    FecBan<= To_Date('" . $fechas . "','DD/MM/YYYY') And STATUS='C' And StaCon='N'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tsmovban) {
        $sql2 = "SELECT * From TSMOVLIB
                             WHERE NUMCUE = '" . $nro . "' And
                             RefLib = '" . $tsmovban["refban"] . "' And Tipmov = '" . $tsmovban["tipmov"] . "' And
                             FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY')";

        if (!Herramientas :: BuscarDatos($sql2, & $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovban["refban"]);
          $tsconcil->setMovlib(null);
          $tsconcil->setMovban($tsmovban["tipmov"]);
          $tsconcil->setFeclib(null);
          $tsconcil->setFecban($tsmovban["fecban"]);
          $tsconcil->setDesref($tsmovban["desban"]);
          $tsconcil->setMonlib(0);
          $tsconcil->setMonban($tsmovban["monmov"]);
          $tsconcil->setResult('MOVIMIENTO NO REGISTRADO EN LIBROS');
          $tsconcil->save();

          //$dateFormat = new sfDateFormat($this->getUser()->getCulture());
          //$fechas = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovbanPeer :: NUMCUE, $nro);
          $c->add(TsmovbanPeer :: FECBAN, $fecfin);
          $c->add(TsmovbanPeer :: STATUS, 'C');
          $c->add(TsmovbanPeer :: STACON, 'N');
          $tsmovban2 = TsmovbanPeer :: doSelectOne($c);
          if ($tsmovban2) {
          	//foreach ($tsmovban2 as $ban2) {
            $tsmovban2->setStacon('N');
            $tsmovban2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_No_Conciliables($nro, $mes, $ano, $fechas) {
	$sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
          A.TipMov as movlib, B.TipMov as movban, A.DesLib as deslib, B.DesBan as desban,
          A.MonMov as monmov1, B.MonMov as monmov2
                From TsMovLib A, TsMovBan B
                Where
                A.NumCue = '" . $nro . "' And
                B.NumCue = '" . $nro . "' And
          A.RefLib = B.RefBan And A.TipMov=B.TipMov And
                A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                A.MonMov <> B.MonMov and A.stacon='N'";

    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tstemigu) {
        $sql2 = "Select * From TSconcil Where
                        NumCue = '" . $nro . "' And
                        Refere = '" . $tstemigu["reflib"] . "' And
                        Refere = '" . $tstemigu["refban"] . "' And
                        FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        movlib='" . $tstemigu["movlib"] . "'  and
                        Result like 'CONCILIADO%'";

        if (!Herramientas :: BuscarDatos($sql2, & $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tstemigu["reflib"]);
          $tsconcil->setMovlib($tstemigu["movlib"]);
          $tsconcil->setMovban($tstemigu["movban"]);
          $tsconcil->setFeclib($tstemigu["feclib"]);
          $tsconcil->setFecban($tstemigu["fecban"]);
          $tsconcil->setDesref($tstemigu["deslib"]);
          $tsconcil->setMonlib($tstemigu["monmov1"]);
          $tsconcil->setMonban($tstemigu["monmov2"]);
          $tsconcil->setResult('ERROR EN CONCILIACION (MONTOS DIFERENTES)');
          $tsconcil->save();
        }

      }
    }
  }

  public static function anular_Conciliacion($nro, $mes, $ano) {
    $c = new Criteria();
    $c->add(TsconcilPeer :: NUMCUE, $nro);
    $result = TsconcilPeer :: doSelect($c);
    if ($result)
    {
	    foreach ($result as $tsconcil) {
	      $tsconcil->delete();
	    }
    }
    
    //ANULANDO MOVIMIENTOS SEGUN LIBROS
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $nro);
    $sql = "Tsmovlib.tipmov<>'ANUC'  AND Tsmovlib.tipmov<>'ANUD' AND Tsmovlib.tipmov<>'CAN'";
    $c->add(TsmovlibPeer :: TIPMOV, $sql, Criteria :: CUSTOM);
    $result = TsmovlibPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovlib) {
	      $tsmovlib->setStacon('N');
	      $tsmovlib->save();
	    }
    }

    $fecdes = "01/".$mes."/".$ano;
    $dateFormat = new sfDateFormat('es_VE');
    $fecdes = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));

  /*  $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $nro);
    $c->add(TsmovlibPeer::FECLIB,$fecdes,Criteria::GREATER_EQUAL);
    $c->add(TsmovlibPeer :: STACON1, 'C');
    $result = TsmovlibPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovlib) {
	      $tsmovlib->setStacon1('N');
	      $tsmovlib->save();
	    }
    }*/


	$c=new criteria();
    //ANULANDO MOVIMIENTOS SEGUN BANCOS
    $c = new Criteria();
    $c->add(TsmovbanPeer :: NUMCUE, $nro);
    $sql = "Tsmovban.tipmov<>'ANUC'  AND Tsmovban.tipmov<>'ANUD' AND Tsmovban.tipmov<>'CAN'";
    $c->add(TsmovbanPeer :: TIPMOV, $sql, Criteria :: CUSTOM);
    $result = TsmovbanPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovban) {
	      $tsmovban->setStacon('N');
	      $tsmovban->save();
	    }
    }

  /*  $c = new Criteria();
    $c->add(TsmovbanPeer :: NUMCUE, $nro);
    $c->add(TsmovbanPeer::FECBAN,$fecdes,Criteria::GREATER_EQUAL);
    $c->add(TsmovbanPeer :: STACON1, 'C');
    $result = TsmovbanPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovban) {
	      $tsmovban->setStacon1('N');
	      $tsmovban->save();
	    }
    }*/


  }

  public static function actualizar_Status($nro, $refere, $status,$tipmov) {
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $nro);
    $c->add(TsmovlibPeer :: REFLIB, $refere);
    $c->add(TsmovlibPeer :: TIPMOV, $tipmov);
    $tsmovlib = TsmovlibPeer :: doSelectOne($c);

    if ($tsmovlib) {    
      $tsmovlib->setStacon($status);
      $tsmovlib->save();
    }

    $c = new Criteria();
    $c->add(TsmovbanPeer :: NUMCUE, $nro);
    $c->add(TsmovbanPeer :: REFBAN, $refere);
    $c->add(TsmovbanPeer :: TIPMOV, $tipmov);
    $tsmovban = TsmovbanPeer :: doSelectOne($c);

    if ($tsmovban) {    
      $tsmovban->setStacon($status);
      $tsmovban->save();
    
    }
  }

  /********************************************************************************************************/
  //formulario confincomgen
  /********************************************************************************************************/

  public static function Salvarconfincomgen($numcom, $reftra, $feccom, $descom, $debito, $credito)
  {

    $dateFormat = new sfDateFormat('es_VE');
    $feccom_mod = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));

    $contabc2 = new Contabc();
    $contabc2->setNumcom($numcom);
    $contabc2->setReftra($reftra);
    $contabc2->setFeccom($feccom_mod);
    $contabc2->setDescom($descom);

    if ($debito == $credito) {
      $contabc2->setStaCom('D');
    } else {
      $contabc2->setStaCom('E');
    }
    $contabc2->setTipcom(null);
    $contabc2->setMoncom($debito);
    $compgene = $numcom;
    $contabc2->save();

  }

  public static function Salvar_asientosconfincomgen($numcom, $reftra, $feccom, $grid, $guarda)
  {
    if ($guarda == 'S') {

      $dateFormat = new sfDateFormat('es_VE');
      $feccom_mod = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));

      $x = $grid[0];
      $j = 0;
      while ($j < count($x)) {
        if ($x[$j]->getCodcta()!="")
        {
        $x[$j]->setNumcom($numcom);
        $x[$j]->setFeccom($feccom_mod);

        If (($x[$j]->getMondebito() > 0) and ($x[$j]->getMoncredito() <= 0)) {
          $cre = 'D';
          $monto = $x[$j]->getMondebito();
        }
        If (($x[$j]->getMoncredito() > 0) and ($x[$j]->getMondebito() <= 0)) {
          $cre = 'C';
          $monto = $x[$j]->getMoncredito();
        }
        $x[$j]->setDesasi($x[$j]->getDescta());
        $x[$j]->setRefasi($reftra);
        $x[$j]->setNumasi($j +1);
        $x[$j]->setDebcre($cre);
        $x[$j]->setMonasi($monto);
        $x[$j]->save();
        }
        $j++;
      }
      $z = $grid[1];
      $j = 0;
      if (!empty($z[$j])) {
        while ($j < count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
    } else {
      $arreglo = $grid[0];
      $i = 0;

      $dateFormat = new sfDateFormat('es_VE');
      $feccom_mod = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));

      $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM, $numcom);
      $c->add(Contabc1Peer::FECCOM, $feccom_mod);
      $contabc1 = Contabc1Peer::doSelectOne($c);
      if (count($contabc1) == 0) {
        while ($i < count($grid[0])) {
        if ($arreglo[$i]['codcta']!="" && ($arreglo[$i]['mondebito'] > 0 || $arreglo[$i]['moncredito'] > 0))
        {
          $reg = new Contabc1();
          $reg->setNumcom($numcom);
          $reg->setFeccom($feccom_mod);
          if (($arreglo[$i]['mondebito'] > 0) and ($arreglo[$i]['moncredito'] <= 0)) {
            $cre = 'D';
            $monto = $arreglo[$i]['mondebito'];
          }
          if (($arreglo[$i]['moncredito'] > 0) and ($arreglo[$i]['mondebito'] <= 0)) {
            $cre = 'C';
            $monto = $arreglo[$i]['moncredito'];
          }
          $reg->setDebcre($cre);
          $reg->setCodcta(str_replace("'", "", $arreglo[$i]['codcta']));
          $reg->setNumasi($i +1);
          $reg->setRefasi($reftra);
          $desasi = ContabbPeer :: getDescta(str_replace("'", "", $arreglo[$i]['codcta']));
          $reg->setDesasi($desasi);
          $reg->setMonasi($monto);
          $reg->save();
        }
          $i++;
        }
      }
    }
  }
  /********************************************************************************************************/
  //formulario tesmovtraban
  /********************************************************************************************************/

  public static function Salvartesmovtraban($objeto, $tipmovdesd, $tipmovhast,$comprobaut) {

    if ($comprobaut=='S')
    {
     self::generaComprobanteAutomatico($objeto, $tipmovdesd, $tipmovhast,&$numcom);
     $objeto->setNumcom($numcom);
     $objeto->save();
    }
    self :: Genera_movlibdeb_confincomgen($objeto, $tipmovdesd);
    self :: Genera_movlibcre_confincomgen($objeto, $tipmovhast);
    $c = new Criteria();
    $c->add(TsmovtraPeer :: REFTRA, $objeto->getReftra());
    $tsmovtra = TsMovtraPeer :: doSelectOne($c);
    if (!$tsmovtra) {
      self :: Actualiza_bancostra('A', 'C', $objeto->getCtaori(), $objeto->getMontra());
      self :: Actualiza_bancostra('A', 'D', $objeto->getCtades(), $objeto->getMontra());
    }
  }

  public static function Actualiza_bancostra($accion, $debcre, $numcta, $monto) {
    $c = new Criteria();
    $c->add(TsdefbanPeer :: NUMCUE, $numcta);
    $tsdefban = TsdefbanPeer :: doSelectOne($c);
    if ($tsdefban) {
      if ($debcre == 'D') {
        $debito = $tsdefban->getDeblib();
        if ($accion == 'A') {
          $total = $debito + $monto;
        }
        elseif ($accion == 'E') {
          $total = $debito - $monto;
        }
      }
      elseif ($debcre == 'C') {
        $debito = $tsdefban->getCrelib();
        if ($accion == 'A') {
          $total = $debito + $monto;
        }
        elseif ($accion == 'E') {
          $total = $debito - $monto;
        }
      }
      $tsdefban->setCrelib($monto);
      $tsdefban->save();
    }
  }

  public static function Genera_movlibdeb_confincomgen($objeto, $tipmovdesd) {
    $grabocontabilidad = true;
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $objeto->getCtades());
    $c->add(TsmovlibPeer :: REFLIB, $objeto->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tipmovdesd);
    $tsmov = TsmovlibPeer :: doSelectOne($c);

    if (count($tsmov) == 0) {
      $tsmov = new Tsmovlib();
      $tsmov->setNumcue($objeto->getCtades());
      $tsmov->setReflib($objeto->getReftra());
      //$refpag = self::Buscar_Correlativo_Pago();
      //$tsmov->setRefpag($objeto->getRefpag());
      $tsmov->setTipmov($tipmovdesd);
      $tsmov->setFeclib($objeto->getFectra());
      $tsmov->setFecing($objeto->getFectra());
      $tsmov->setDeslib('TRANSFERENCIA DE LA CUENTA ' . $objeto->getCtaori().'. '.$objeto->getDestra());
      $tsmov->setMonmov($objeto->getMontra());
      $ctahasta = Herramientas :: getX_vacio('numcue', 'TSdefban', 'CodCta', $objeto->getCtades());
      $tsmov->setCodcta($ctahasta);
      $tsmov->setNumcom($objeto->getNumcom());
      $tsmov->setFeccom($objeto->getFectra());
      if ($grabocontabilidad) {
        $tsmov->setStatus('C');
      } else {
        $tsmov->setStatus('N');
        $tsmov->setFeccom(null);
      }
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tsmov->setLoguse($loguse);
      $tsmov->setStacon('N');
      $tsmov->save();

     /* $c = new Criteria();
	  $datos = CpdefnivPeer::doSelectOne($c);
	  if ($datos){
	  	$datos->setCorpag((string)$refpag);
	   	$datos->save();
	  }*/
    }
  }

  public static function Genera_movlibcre_confincomgen($objeto, $tipmovhast) {
    $grabocontabilidad = true;
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $objeto->getCtaori());
    $c->add(TsmovlibPeer :: REFLIB, $objeto->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tipmovhast);
    $tsmov2 = TsmovlibPeer :: doSelectOne($c);

    if (count($tsmov2) == 0) {
      $tsmov2 = new Tsmovlib();
      $tsmov2->setNumcue($objeto->getCtaori());
      $tsmov2->setReflib($objeto->getReftra());
      //$refpag = self::Buscar_Correlativo_Pago();
      $tsmov2->setNumcom($objeto->getNumcom());
      $tsmov2->setFeclib($objeto->getFectra());
      $tsmov2->setFecing($objeto->getFectra());
      $tsmov2->setTipmov($tipmovhast);
      $tsmov2->setDeslib('TRANSFERENCIA A LA CUENTA ' . $objeto->getCtades().'. '.$objeto->getDestra());
      $tsmov2->setMonmov($objeto->getMontra());
      $ctadesde = Herramientas :: getX_vacio('numcue', 'TSdefban', 'CodCta', $objeto->getCtaori());
      $tsmov2->setCodcta($ctadesde);
      $tsmov2->setFeccom($objeto->getFectra());
      if ($grabocontabilidad) {
        $tsmov2->setStatus('C');
      } else {
        $tsmov2->setStatus('N');
        $tsmov2->setFeccom(null);
      }
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tsmov2->setLoguse($loguse);
      $tsmov2->setStacon('N');
      $tsmov2->save();

      /* $c = new Criteria();
	   $datos = CpdefnivPeer::doSelectOne($c);
	   if ($datos){
	   	 $datos->setCorpag((string)$refpag);
	   	 $datos->save();
	   }*/
    }
  }

  public static function Eliminar_confincomgen($tsmovtra) {
    //Eliminar_Movimientos
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $tsmovtra->getCtaori());
    $c->add(TsmovlibPeer :: REFLIB, $tsmovtra->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tsmovtra->getTipmovhast());
    $tsmovlib = TsmovlibPeer :: doSelectOne($c);
    if (count($tsmovlib) > 0) {
      if ($tsmovlib->getStacon() != 'C') {
        $tsmovlib->delete();
      }
    }

    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $tsmovtra->getctades());
    $c->add(TsmovlibPeer :: REFLIB, $tsmovtra->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tsmovtra->getTipmovdesd());
    $tsmovlib = TsmovlibPeer :: doSelectOne($c);
    if (count($tsmovlib) > 0) {
      if ($tsmovlib->getStacon() != 'C') {
        $tsmovlib->delete();
      }
    }

    //Eliminar_Comprobante
    $c = new Criteria();
    $c->add(ContabcPeer :: NUMCOM, $tsmovtra->getReftra());
    $c->add(ContabcPeer :: FECCOM, $tsmovtra->getFectra());
    $contabc = ContabcPeer :: doSelectOne($c);
    if (count($contabc) > 0) {
      if ($contabc->getStacom() == 'A') {
        $msgbox = 'El Comprobante ya esta Actualizado';
      }
      if ($contabc->getStacom() == 'N') {
        $msgbox = 'El Comprobante ya esta Anulado';
      }
      if ($contabc->getStacom() == 'D') {
        $c = new Criteria();
        $c->add(Contabc1Peer :: NUMCOM, $tsmovtra->getReftra());
        $c->add(Contabc1Peer :: FECCOM, $tsmovtra->getFectra());
        Contabc1Peer :: doDelete($c);
      }
    }

    //Eliminar_Pagado
    $c = new Criteria();
    $c->add(CppagosPeer :: REFPAG, $tsmovtra->getReftra());
    $cppagos = CppagosPeer :: doSelectOne($c);
    if (count($cppagos) > 0) {
      $c = new Criteria();
      $c->add(CpimppagPeer :: REFPAG, $tsmovtra->getReftra());
      CpimppagPeer :: doDelete($c);
    }
    $c = new Criteria();
    $c->add(TsmovtraPeer :: REFTRA, $tsmovtra->getReftra());
    TsmovtraPeer :: doDelete($c);

    self :: Actualiza_bancostra('A', 'D', $tsmovtra->getCtades(), $tsmovtra->getMontra());
    self :: Actualiza_bancostra('A', 'C', $tsmovtra->getCtaori(), $tsmovtra->getMontra());

  }

  /**************************  Miki MOVIMIENTOS SEGUN LIBROS  *******************************************/

  public static function anular_Eliminar_Cheque($accion, $numcue, $reflib) {
    $sql = "Select status From TSCHEEMI Where NumCue = '" . $numcue . "' AND NumChe = '" . $reflib . "' Order by NumCue,NumChe";
    if (Herramientas :: BuscarDatos($sql, & $tscheemi)) {
      switch ($accion) {
        case 'A' :
          if ($tscheemi[0]["status"] == 'E') {
            return "No se puede anular el movimiento, El cheque fué Entregado";
          }
          if ($tscheemi[0]["status"] == 'A') {
            return "No se puede anular el movimiento, El cheque fué Anulado";
          }
          if ($tscheemi[0]["status"] == 'C' || $tscheemi[0]["status"] == 'F') {
            $c = new Criteria();
            $c->add(TscheemiPeer :: NUMCUE, $numcue);
            $c->add(TscheemiPeer :: NUMCHE, $reflib);
            $tscheemi = TscheemiPeer :: doSelectOne($c);
            if ($tscheemi)
            {
             $tscheemi->setStatus('A');
             $tscheemi->save();
            }
            return '';
          }
          break;
        case 'E' :
          if ($tscheemi[0]["status"] == 'E') {
            return "No se puede eliminar el movimiento, El cheque fué Entregado";
          }
          if ($tscheemi[0]["status"] == 'A') {
            return "No se puede eliminar el movimiento, El cheque fué Anulado";
          }
          if ($tscheemi[0]["status"] == 'C' || $tscheemi[0]["status"] == 'F') {
            $c = new Criteria();
            $c->add(TscheemiPeer :: NUMCUE, $numcue);
            $c->add(TscheemiPeer :: NUMCHE, $reflib);
            TscheemiPeer :: doDelete($c);
            return '';
          }
          break;
      }
    }
  }

  public static function anular_Eliminar_Imppag($accion, $reflib, $numcue, $feclib, $refpag) {
    //$pagado = $reflib;
    $pagado =$refpag;
    $sql = "Select * from CPIMPPAG where refpag='" . $pagado . "'";
    if (Herramientas :: BuscarDatos($sql, & $cpimppag)) {
      switch ($accion) {
        case 'A' :
          $msg = Tesoreria :: anular_Eliminar_Pagado($accion, $reflib, $feclib, $refpag);
          $c = new Criteria();
          $c->add(CpimppagPeer :: REFPAG, $pagado);
          $cpimppag = CpimppagPeer :: doSelect($c);
          foreach($cpimppag as $imppag){
            $imppag->setStaimp('N');
            $imppag->save();
          }
          return $msg;
          break;

        case 'E' :
          $c = new Criteria();
          $c->add(CpimppagPeer :: REFPAG, $pagado);
          CpimppagPeer :: doDelete($c);
          $msg = Tesoreria :: anular_Eliminar_Pagado($accion, $reflib, $feclib, $refpag);

          return $msg;
          break;
      }
    }
  }

  public static function anular_Eliminar_Pagado($accion, $reflib, $feclib, $refpag) {
    //$pagado = $reflib;
	$pagado = $refpag;
    $c = new Criteria();
    $c->add(CppagosPeer :: REFPAG, $pagado);
    $cppagos = CppagosPeer :: doSelectOne($c);
    if ($cppagos) {
      if ($accion == 'A') {
        if ($cppagos->getStapag() == 'A') {
          $dateFormat = new sfDateFormat('es_VE');
          $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));

          $cppagos->setFecanu($fec);
          $cppagos->setStapag('N');
          $cppagos->save();
        }

      } else
        if ($accion == 'E') {
          if ($cppagos->getStapag() == 'A') {
            $cppagos->delete();
          }
        }
      return '';
    } else {
      return 'El Pagado No fue Actualizado';
    }
  }

  public static function actualiza_Orden_De_Pago($reflib, $numcue, $tipmov) {
    $result=array();
    $sql = "Select numord,monpag from opordche where numche='" . $reflib . "' and codcta='".$numcue."' and tipmov='".$tipmov."' order by numche";
    if (Herramientas :: BuscarDatos($sql,&$result))
    {
      $j=0;
      while ($j<count($result))
      {

         $sql4="update opordpag set status='N', numche=null, ctaban=null, monpag=monpag - ".$result[$j]["monpag"]." where numord='".$result[$j]["numord"]."'";
         Herramientas::insertarRegistros($sql4);

        /*$c = new Criteria();
        $c->add(OpordpagPeer :: NUMORD, $result[$j]["numord"]);
        $opordpag = OpordpagPeer :: doSelectOne($c);
        if ($opordpag) {
          $opordpag->setStatus('N');
          $opordpag->setNumche(null);
          $opordpag->setCtaban(null);
          if ($opordpag->getMonpag() > 0) {
            $opordpag->setMonpag($opordpag->getMonpag() - $result[$j]["monpag"]);
          } else {
            $opordpag->setMonpag(0);
          }
          $opordpag->save();
        }*/

        $c1 = new Criteria();
        $c1->add(OpdetperPeer :: NUMORD, $result[$j]["numord"]);
        $c1->add(OpdetperPeer :: NUMCHE, $reflib);
        $c1->add(OpdetperPeer :: CTABAN, $numcue);
        $c1->add(OpdetperPeer :: TIPMOV, $tipmov);
        $opdetper = OpdetperPeer :: doSelectOne($c1);
        if ($opdetper) {
          $opdetper->setFecpag(null);
          $opdetper->setNumche(null);
          $opdetper->save();
        }
        $j++;
      }
      /*$c2 = new Criteria();
      $c2->add(OpordchePeer :: NUMCHE, $reflib);
      OpordchePeer :: doDelete($c2);*/

      $sql4="delete from opordche where numche='" . $reflib . "' and codcta='".$numcue."' and tipmov='".$tipmov."'";
         Herramientas::insertarRegistros($sql4);

      return '';
    } else {

    	$sql4="update opordpag set status='N', numche=null, ctaban=null, monpag=0 where numche='".$reflib."' and ctaban='".$numcue."'";
         Herramientas::insertarRegistros($sql4);

      /*$c = new Criteria();
      $c->add(OpordpagPeer :: NUMCHE, $reflib);
      $res = OpordpagPeer :: doSelectOne($c);
      if ($res) {
        foreach ($res as $opordpag) {
          $opordpag->setNumche(null);
          $opordpag->setCtaban(null);
          $opordpag->setStatus('N');
          $opordpag->save();
        }*/
        return '';
      /*} else {
        return 'La Orden de Pago no fue Actualizada';
      }*/
    }
  }

  public static function actualiza_Bancos($accion, $debcre, $numcue, $monmov) {
    $c = new Criteria();
    $c->add(TsdefbanPeer :: NUMCUE, $numcue);
    $tsdefban = TsdefbanPeer :: doSelectOne($c);
    if ($tsdefban) {
      switch ($debcre) {
        case 'D' :
          if ($accion == 'A') {
            $debito = $tsdefban->getDeblib();
            $total = $debito + $monmov;
            $tsdefban->setDeblib($total);
          }
          if ($accion == 'E') {
            $debito = $tsdefban->getDeblib();
            $total = $debito - $monmov;
            $tsdefban->setDeblib($total);
          }
          $tsdefban->save();
          break;

        case 'C' :
          if ($accion == 'A') {
            $credito = $tsdefban->getCrelib();
            $total = $credito + $monmov;
            $tsdefban->setCrelib($total);
          }
          if ($accion == 'E') {
            $credito = $tsdefban->getCrelib();
            $total = $credito - $monmov;
            $tsdefban->setCrelib($total);
          }
          $tsdefban->save();
          break;
      }
    }
  }

  public static function anular_Eliminar($accion, $numcomadi, $feccomadi, $compadic, $fechacom, $numcom, &$numcom2, $feclib,$reflib2='') {
    $msj='';
    if ($accion == 'E') {
      $msj=self :: buscar_Comprobante('E', $numcomadi, $feccomadi, $compadic, $fechacom, $numcom, $numcom2, $feclib, $reflib2);
    }
    if ($accion == 'A') {
      $msj=self :: buscar_Comprobante('A', $numcomadi, $feccomadi, $compadic, $fechacom, $numcom, &$numcom2, $feclib, $reflib2);
    }
    return $msj;
  }

  public static function buscar_Comprobante($accion,$numcomadi,$feccomadi,$compadic,$fechacom,$numcom,&$numcom2,$feclib, $reflib2='')
  {
    if ($accion=='E')
    {
      if ($numcomadi!='')
      {
        $fechacar=$feccomadi;
        $dateFormat = new sfDateFormat('es_VE');
          $fec = $dateFormat->format($fechacar, 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$numcomadi);
        $c->add(Contabc1Peer::FECCOM,$fec);
        Contabc1Peer::doDelete($c);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$numcomadi);
        $c->add(ContabcPeer::FECCOM,$fec);
        ContabcPeer::doDelete($c);
      }
      if ($compadic=='S')
      {
        $dateFormat = new sfDateFormat('es_VE');
          $fec = $dateFormat->format($fechacom, 'i', $dateFormat->getInputPattern('d'));

         $c = new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$numcom);
        $c->add(Contabc1Peer::FECCOM,$fec);
        Contabc1Peer::doDelete($c);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$numcom);
        $c->add(ContabcPeer::FECCOM,$fec);
        ContabcPeer::doDelete($c);
      }
      $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fechacom, 'i', $dateFormat->getInputPattern('d'));
      $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$numcom);
      $c->add(Contabc1Peer::FECCOM,$fec);
      Contabc1Peer::doDelete($c);

      $c = new Criteria();
      $c->add(ContabcPeer::NUMCOM,$numcom);
      $c->add(ContabcPeer::FECCOM,$fec);
      ContabcPeer::doDelete($c);
    }
    else
    {
     // if($numcom2=='########') $numcom2 = Comprobante::Buscar_Correlativo();

      if ($numcom!='' && $numcom!='########' && $numcom!='********'){
      $sql="Select descom,moncom from CONTABC where NumCom = '".$numcom."'";
      if (Herramientas::BuscarDatos($sql,&$contabc))
      {
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
         $numcom2="A".substr($numcom,1,7);
         else $numcom2 = Comprobante::Buscar_Correlativo();

        $tcontabc= new Contabc();
        $tcontabc->setNumcom($numcom2);
        $tcontabc->setFeccom($fec);
        $tcontabc->setDescom($contabc[0]["descom"]);
        $tcontabc->setStacom('D');
        $tcontabc->setTipcom(null);
        $tcontabc->setReftra($reflib2);
        $tcontabc->setMoncom($contabc[0]["moncom"]);
        $tcontabc->save();

        $sql2="Select codcta,numasi,refasi,desasi,debcre,monasi from CONTABC1 where NumCom = '".$numcom."' AND FECCOM=TO_DATE('".$fechacom."','YYYY-MM-DD')";
        if (Herramientas::BuscarDatos($sql2,&$result2))
        {
          foreach ($result2 as $contabc1)
          {
            $tcontabc1= new Contabc1();
            $tcontabc1->setNumcom($numcom2);
            $tcontabc1->setFeccom($fec);
            $tcontabc1->setCodcta($contabc1["codcta"]);
            $tcontabc1->setNumasi($contabc1["numasi"]);
            $tcontabc1->setRefasi($reflib2);
            $tcontabc1->setDesasi($contabc1["desasi"]);
            if ($contabc1["debcre"]=='D')
            {
              $tcontabc1->setDebcre('C');
            }
            else
            {
              $tcontabc1->setDebcre('D');
            }
            $tcontabc1->setMonasi($contabc1["monasi"]);
            $tcontabc1->save();
          }
        }
      }else{
      	return 'El Comprobante Nro. '.$numcom.' no fué anulado, y falta que se genere el comprobante INVERSO.';
      }
      }
      else
      {
        return 'El Nro. generado para el comprobante de anulación:'.$numcom2.' no es válido, y falta que se genere el comprobante INVERSO.';
      }
      /*if ($compadic=='S')
      {
        $sql3="Select descom,moncom from CONTABC where NumCom = '".$numcom."'";
          if (Herramientas::BuscarDatos($sql3,&$contabc))
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));

            $tcontabc= new Contabc();
            $tcontabc->setNumcom($numcom2);
            $tcontabc->setFeccom($fec);
            $tcontabc->setDescom($contabc[0]["descom"]);
              $tcontabc->setStacom('D');
            $tcontabc->setTipcom('');
            $tcontabc->setMoncom($contabc[0]["moncom"]);
            $tcontabc->save();

            $sql4="Select codcta,numasi,refasi,desasi,debcre,monasi from CONTABC1 where NumCom = '".$numcom."' AND FECCOM=TO_DATE('".$fechacom."','DD/MM/YYYY')";
            if (Herramientas::BuscarDatos($sql4,&$result4))
            {
              foreach ($result4 as $contabc1)
              {
                $tcontabc1= new Contabc1();
                $tcontabc1->setNumcom($numcom2);
                $tcontabc1->setFeccom($fec);
                $tcontabc1->setCodcta($contabc1["codcta"]);
                $tcontabc1->setNumasi($contabc1["numasi"]);
                $tcontabc1->setRefasi($contabc1["refasi"]);
                $tcontabc1->setDesasi($contabc1["desasi"]);
                if ($contabc1["debcre"]=='D')
                {
                  $tcontabc1->setDebcre('C');
                }
                else
                {
                  $tcontabc1->setDebcre('D');
                }
                $tcontabc1->setMonasi($contabc1["monasi"]);
                $tcontabc1->save();
              }
            }
          }
      }*/
    }
    return '';
  }


  /*******************************************************************************************************/

   public static function anularMovLibro($nrocuenta,$referencia,$tipmov,$refanu,$fecanu,$destra,$monto)
   {
      $c= new Criteria();
      $c->add(TsmovlibPeer::NUMCUE,$nrocuenta);
      $c->add(TsmovlibPeer::REFLIB,$referencia);
      $c->add(TsmovlibPeer::TIPMOV,$tipmov);
      $resul=TsmovlibPeer::doSelectOne($c);
      if ($resul)
      {
       if ($resul->Stacon()!='C')
       {
          $tsmovlib= new Tsmovlib();
          $tsmovlib->setNumcue($nrocuenta);
          $tsmovlib->setReflib($refanu);
          $tsmovlib->setFeclib($fecanu);
          $afecta="";
          $c= new Criteria();
          $c->add(TstipmovPeer::CODTIP,$tipmov);
          $data=TstipmovPeer::doSelectOne($c);
          if ($data)
          { $afecta=$data->getDebcre();}
          if ($afecta=='C')
          {
           $tsmovlib->setTipmov('ANUC');
          }else { $tsmovlib->setTipmov('ANUD');}
         $tsmovlib->setMonmov($resul->getMonmov());
         $tsmovlib->setNumcom("A".substr($resul->getNumcom(),1,7));
         $tsmovlib->setCodcta($resul->getCodcta());
         $tsmovlib->setFeccom($fecanu);
         $tsmovlib->setStatus('C');
         $tsmovlib->setStacon('C');
         $tsmovlib->setDeslib($destra);
         $tsmovlib->setReflibpad(str_pad($refanu,8,'0',STR_PAD_LEFT));
         $tsmovlib->setTipmovpad($tipmov);
         $tsmovlib->save();
         self::actualizaBancos($nrocuenta,'A',$afecta,$monto);
       }
       else
       {
        $msj='El Movimiento esta Conciliado, No puede ser anulado';
       }
      }
   }

  public static function actualizaBancos($nrocuenta,$accion,$debcre,$monto)
  {
    $c= new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$nrocuenta);
    $dato=TsdefbanPeer::doSelectOne($c);
    if ($dato)
    {
      switch($dato->getDebcre())
      {
        case "D":
          if ($accion=='A')
          {
            $debito=self::tranformarGrid($dato->getDeblib());
            $total= $debito + $monto;
            $dato->setDeblib($total);
          }
          if ($accion=='E')
          {
            $debito=self::tranformarGrid($dato->getDeblib());
            $total= $debito - $monto;
            $dato->setDeblib($total);
          }
          break;
       case "C":
         if ($accion=='A')
          {
            $credito=self::tranformarGrid($dato->getCrelib());
            $total= $credito + $monto;
            $dato->setCrelib($total);
          }
          if ($accion=='E')
          {
            $credito=self::tranformarGrid($dato->getCrelib());
            $total= $credito - $monto;
            $dato->setCrelib($total);
          }
         break;
      }
      $dato->save();
    }
  }

  public static function transformarGrid($dato)
  {
    $pos=Herramientas::instr($dato,',',0,1);
    if ($pos== 0)
    {
      $tranformargrid=$dato;
    }
    else
    {
     $tranformargrid=substr($dato,0,($pos-1));
     $tranformargrid=$tranformargrid.'.'.substr($dato,($pos+1),strlen($dato));
    }
   return $tranformargrid;
  }

  public static function reversarComprobante($numerocomprobante,$fecanu)
  {
    $numcom=Comprobante::Buscar_Correlativo();
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numerocomprobante);
    $resulta=ContabcPeer::doSelectOne($c);
    if ($resulta)
    {
       $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
      if ($confcorcom=='N')
      $numcom= 'A'.substr($numerocomprobante,1,7);

      $contabc2 = new Contabc();
      $contabc2->setNumcom($numcom);
      $contabc2->setFeccom($fecanu);
      $contabc2->setDescom($resulta->getDescom());
      $contabc2->setStaCom('D');
      $contabc2->setTipcom(null);
      $contabc2->setMoncom($resulta->getMoncom());
      $contabc2->save();
    }

    $c= new Criteria();
    $c->add(Contabc1Peer::NUMCOM,$numerocomprobante);
    $resulcontabc=Contabc1Peer::doSelect($c);
    foreach ($resulcontabc as $resultados)
    {
    $contabc1= new Contabc1();
    $contabc1->setNumcom($numcom);
    $contabc1->setFeccom($fecanu);
    $contabc1->setCodcta($resultados->getCodcta());
    $contabc1->setNumasi($resultados->getNumasi());
    $contabc1->setRefasi($resultados->getRefasi());
    $contabc1->setDesasi($resultados->getDesasi());
    if ($resultados->getDebcre()=='D')
    {
      $contabc1->setDebcre('C');
    }
    else
    {
      $contabc1->setDebcre('D');
    }
    $contabc1->setMonasi($resultados->getMonasi());
    $contabc1->save();
    }//foreach ($resulcontabc as $resultados)
  }

  public static function validarTesdefcueban($grid)
  {
    $x=$grid[0];
    if (self::chequeraRepetida($grid))
        return 552;
    $j=0;
    $total1=0;
    $total2=0;
    while ($j<count($x))
    {

      if ($x[$j]->getActiva()=='SI')
      {
        $total1=$total1 +1;
      }
      else
      {
        $total2=$total2 +1;
      }
      $j++;
    }

    if ($total1==0)
    {
      return 517;
    }
    else if ($total1>1)
    {
     return 518;
    }
    else
    {
      return -1;
    }
  }

  public static function chequeraRepetida($grid)
  {
    $chequerarepetida=false;
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      $cheq1=$x[$j]->getCodchq().'-'.$x[$j]->getNumchedes().'-'.$x[$j]->getNumchehas();
      $l=0;
      while ($l<count($x))
      {
        $cheq2=$x[$l]->getCodchq().'-'.$x[$l]->getNumchedes().'-'.$x[$l]->getNumchehas();
        if ($l!=$j)
        {
        	if ($cheq1==$cheq2)
        	{
              $chequerarepetida=true;
              break;
        	}
        }
    	$l++;
      }
      if ($chequerarepetida) break;

      $j++;
    }

   return $chequerarepetida;
  }

  public static function validarComprobanteDescuadrado($grid)
  {
    $x=$grid[0];
    $j=0;
    $total1=0;
    $total2=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcta()!="")
      {
        $mondeb=$x[$j]->getMondebito();
        $moncre=$x[$j]->getMoncredito();
        if ($mondeb>0)
        {
          $total1=$total1 + $mondeb;
        }

        if ($moncre>0)
        {
          $total2=$total2 + $moncre;
        }
      }
      $j++;
    }

    if (Herramientas::toFloat($total1)!=Herramientas::toFloat($total2))
    {
      return false;
    }
    else
    {
      return true;
    }
  }
  
public static function validarCuentasGrid($grid)
  {
    $x=$grid[0];
    $j=0;
    $total1=0;
    $total2=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcta()!="")
      {
        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$x[$j]->getCodcta());
        $per = ContabbPeer::doSelectOne($c);
        if(!$per)
        {
        	return false;
        }
      }
      $j++;
    }

    if (Herramientas::toFloat($total1)!=Herramientas::toFloat($total2))
    {
      return false;
    }
    else
    {
      return true;
    }
  } 

  public static function validarFechaPerContable($fecha)
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $conta=ContabaPeer::doSelectOne($c);
    if ($conta)
    {
      if ($fec>=$conta->getFecini() && $fec<=$conta->getFeccie())
      {
        return false;
      }
      else
      {
        return true;
      }
    }

  }

    public static function validarFechaContable($fecha)
  {
    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $conta=ContabaPeer::doSelectOne($c);
    if ($conta)
    {
      if ($fec<$conta->getFecini())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

  }

   public static function validarFechaMayorMenor($fecha1,$fecha2,$mayormenor)
  {
    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $fec1 = $dateFormat->format($fecha1, 'i', $dateFormat->getInputPattern('d'));

    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $fec2 = $dateFormat->format($fecha2, 'i', $dateFormat->getInputPattern('d'));
    if ($mayormenor=='>')
    {
	  if ($fec1 > $fec2)
	  {
	    return true;
	  }
	  else
	  {
	    return false;
	  }
    }
    else if ($mayormenor=='<')
    {
      if ($fec1 < $fec2)
  {
    return true;
  }
  else
  {
    return false;
  }
    }
    else  if ($mayormenor=='>=')
    {
      if ($fec1 >= $fec2)
  {
    return true;
  }
  else
  {
    return false;
  }
    }
    else
    {
     if ($fec1 <= $fec2)
  {
    return true;
  }
  else
  {
    return false;
     }
    }

  }

  public static function salvarTesmovseglib($tsmovlib,$numcom)
  {
    if (!$tsmovlib->getId())
    {
      $tsmovlib->setNumcom($numcom);
      $tsmovlib->setCodcta($tsmovlib->getCtacon());
    }
    if (!$tsmovlib->getRefpag())
    {
      $tsmovlib->setRefpag("NULO");
    }
    if ($tsmovlib->getSavemovcero()=='S' && $tsmovlib->getMonmov()==0)
    {
       $tsmovlib->setStatus('N');
       $tsmovlib->setStacon('C');
    }else {
      $tsmovlib->setStatus('C');
      $tsmovlib->setStacon('N');
    }
    $tsmovlib->setStacon1('N');
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $tsmovlib->setLoguse($loguse);
    $tsmovlib->save();

  }

  public static function VerificarChequeCaducado($numcue,$fecemiche,$estatus)
  {
    $diasval=0;
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$numcue);
    $datos=TsdefbanPeer::doSelectOne($c);
    if ($datos)
    {
      $diasval=$datos->getValche();
    }
    $fechacaducidad=Herramientas::dateAdd('d',$diasval,$fecemiche,'+');
    $fechaactual=date("Y-m-d");

    if ((strtotime($fechacaducidad)<=strtotime($fechaactual)) and $estatus=='C')
      return true;
    else
      return false;

  }

  public static function Buscar_Correlativo_Pago(){
   	$c = new Criteria();
   	$datos = CpdefnivPeer::doSelectOne($c);
   	if ($datos){
   		$corpag = (int)$datos->getCorpag();
   		$newcorpag = $corpag + 1;
   		$cadcorpag = str_pad((string)$newcorpag, 8, "0", STR_PAD_LEFT);
   		$valido = false;
   		while(!$valido){
   			$c2 = new Criteria();
	   		$c2->add(ContabcPeer::NUMCOM,$cadcorpag);
	   		$contabc = ContabcPeer::doSelectOne($c2);
	   		if($contabc){
	   			$newcorpag++;
	   			$cadcorpag = str_pad((string)$newcorpag, 8, "0", STR_PAD_LEFT);
	   		}
	   		else {
	   			$valido = true;
	   		}
   		}
   		//$datos->setCorpag((string)$newcorpag);
   		//$datos->save();
   		return $cadcorpag;
   	}
   	else return "00000000";
   }

  public static function chequear_disponibilidad_financiera($banco='',$monto=0, $fechad='',$fechah='',&$saldo)
  {
    $saldo = Tesoreria::Monto_disponible_financiero($banco,$fechad,$fechah);
    $saldo=round($saldo,2);
    if(H::tofloat($saldo) < H::tofloat($monto)){
      return false;
    }else return true;
  }

  public static function Monto_disponible_financiero($banco,$fechad,$fechah)
  {
    $anterior=0;
    $deb=0;
    $cre=0;
    $contaba = ContabaPeer::doSelectOne(new Criteria());
    $fechah=date('Y-m-d');

    if($contaba){
      $fechainicio = $contaba->getFecini();
    }
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$banco);
    $tsdefban = TsdefbanPeer::doSelectOne($c);
    if($tsdefban){
      $fecha = date('');
      $anterior=$tsdefban->getAntlib();
    }

    $sql = "SELECT COALESCE(  SUM(  case when A.DEBCRE='D' then B.MONMOV else 0 end),0) as debitos , COALESCE( SUM(  case when A.DEBCRE='C' then B.MONMOV else 0 end),0) as creditos
    FROM TSTIPMOV A,TSMOVLIB B,TSDEFBAN c WHERE B.NUMCUE = '".$banco."' AND b.numcue = c.numcue and
    B.TIPMOV = A.CODTIP AND
    B.FECLib <= TO_DATE('".$fechah."','yyyy-MM-DD') AND
    B.FECLib >=TO_DATE('".$fechad."','yyyy-MM-DD')";
    //print $sql;
    if(Herramientas :: BuscarDatos($sql, &$result)){
      $deb = $result[0]['debitos'];
      $cre = $result[0]['creditos'];
    }

  	return $anterior + $deb - $cre;
  }

  public static function salvarSalidasCajas($tssalcaj,$grid)
  {
    if (OrdendePago::agregaBenefi($tssalcaj)==true)
    {
      OrdendePago::grabarBenefi($tssalcaj);
    }
    self::generaSalida($tssalcaj,$grid);

    self::Genera_MovLib($tssalcaj,$tssalcaj->getDessal(),$tssalcaj->getMonsal(),null,$tssalcaj->getRefsal(),null);
    self::Actualiza_BancosCaja($tssalcaj,"A","C",$tssalcaj->getMonsal(),$tssalcaj->getRefsal());
  }

  public static function generaSalida($tssalcaj,$grid)
  {
     if ($tssalcaj->getRefsal()=='########')
     {
       if (Herramientas::getVerCorrelativo('numinicajchi','opdefemp',&$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(TssalcajPeer::REFSAL,$numero);
          $resul= TssalcajPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $tssalcaj->setRefsal($numero);
       }
    H::getSalvarCorrelativo('numinicajchi','opdefemp','Referencia',$r,&$msg);
    }
    else
    {
      $tssalcaj->setRefsal(str_replace('#','0',$tssalcaj->getRefsal()));
    }

    $tssalcaj->setStasal('P');
    $tssalcaj->save();
    self::generaDetalleSalida($tssalcaj,$grid);

  }

  public static function generaDetalleSalida($tssalcaj,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodart()!='')
      {
        $x[$j]->setRefsal($tssalcaj->getRefsal());
        $x[$j]->setStasal('P');
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function Genera_MovLib($tscheemi,$Descrip,$Monto,$Comprobante,$numche,$refpago='')
  {
    $result=array();
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$tscheemi->getNumcue()."' AND RefLib = '".$numche."' And TipMov='".$tscheemi->getTipdoc()."'";
    if (!Herramientas::BuscarDatos($criterio,&$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag($refpago);
      $tsmovlib->setNumcue($tscheemi->getNumcue());
      $tsmovlib->setReflib($numche);
      $tsmovlib->setFeclib($tscheemi->getFecsal());
      $tsmovlib->setTipmov($tscheemi->getTipdoc());
      $tsmovlib->setDeslib($Descrip);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $tsmovlib->setMonmov($Monto);
      $tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($Comprobante);
      $tsmovlib->setFeccom($tscheemi->getFecsal());
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $tsmovlib->setFecing(date("Y-m-d"));
      $tsmovlib->save();
    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }

  public static function Actualiza_BancosCaja($tscheemi,$Accion,$DebCre,$Monto,$numche)
  {
    $result=array();
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$tscheemi->getNumcue());
    $tsdefban = TsdefbanPeer::doSelectOne($c);
    if ($tsdefban)
    {
      switch($DebCre) {
        case "D":
          if ($Accion== "A")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito + $Monto;
            $tsdefban->setDeblib($Total);
            $tsdefban->setNumche($numche);
          }
          else if ($Accion == "E")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito - $Monto;
            $tsdefban->setDeblib($Total);
            $tsdefban->setNumche($numche);
          }
          $tsdefban->save();
         case "C":
           if ($Accion== "A")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito + $Monto;
             $tsdefban->setCrelib($Total);
             $nrocheque=intval($numche);
             if (is_numeric($nrocheque))
             {
              $nrocheques=$nrocheque+1;
              $nrocheque=str_pad($nrocheques,8,"0",STR_PAD_LEFT);
             }
             $tsdefban->setNumche($nrocheque);

           }
           if ($Accion== "E")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito - $Monto;
             $tsdefban->setCrelib($Total);
             $nrocheque=intval($numche);
             if (is_numeric($nrocheque))
             {
	           $nrocheques=$nrocheque-1;
	           $nrocheque=str_pad($nrocheques,8,"0",STR_PAD_LEFT);
             }
	         $tsdefban->setNumche($nrocheque);
           }

           $tsdefban->save();
      }//  switch($DebCre)
    }// if ($tsdefban)
  }

  public static function salvarRendicionCajaChica($opordpag,$grid,$numerocomp,$grid1)
  {
  	self::grabarOrden($opordpag,$numerocomp);
  	self::grabarDetalleOrden($opordpag,$grid);
  	self::grabarCausado($opordpag);
  	self::grabarImpcau($opordpag,$grid);

  	$x=$grid1[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=='1'){
          $a= new Criteria();
  	  $a->add(TssalcajPeer::REFSAL,$x[$j]->getRefsal());
  	  $data= TssalcajPeer::doSelectOne($a);
  	  if ($data)
  	  {
  	   $data->setStasal('R');
  	   $data->save();
  	  }
          }
          $j++;
        }

  }

  public static function grabarCausado($opordpag)
  {
    $cpcausad= new Cpcausad();
    $cpcausad->setRefcau($opordpag->getNumord());
    $cpcausad->setTipcau($opordpag->getTipcau());
    $cpcausad->setRefcom(null);
    $cpcausad->setTipcom(null);
    $cpcausad->setDescau($opordpag->getDesord());
    $cpcausad->setCedrif($opordpag->getCedrif());
    $cpcausad->setFeccau($opordpag->getFecemi());
    $cpcausad->setAnocau(substr($opordpag->getFecemi(),0,4));
    $cpcausad->setDesanu(null);
    $cpcausad->setMoncau($opordpag->getMonord());
    $cpcausad->setSalaju(0);
    $cpcausad->setSalpag(0);
    $cpcausad->setStacau('A');
    $cpcausad->save();
  }

  public static function grabarImpcau($opordpag,$grid)
  {
  	$referencia=$opordpag->getNumord();
  	$g= new Criteria();
  	$g->add(CpimpcauPeer::REFCAU,$referencia);
  	CpimpcauPeer::doDelete($g);

    $arreglo=self::Arreglodet($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncau"]!=0)
      {
        $cpimpcau= new Cpimpcau();
        $cpimpcau->setRefcau($referencia);
        $cpimpcau->setCodpre($arreglo[$j]["codpre"]);
        $cpimpcau->setMonimp($arreglo[$j]["moncau"]);
        $cpimpcau->setMonaju(0);
        $cpimpcau->setMonpag(0);
        $cpimpcau->setStaimp('A');
        $cpimpcau->setRefere('NULO');
        $cpimpcau->setRefprc('NULO');
        $cpimpcau->save();
      }
      $j++;
    }
  }

  public static function validarDisponibilidadPresuCajChi($grid,$afecta,&$codigo)
  {
    $validardisponibilidad=true;
    $arreglo=self::Arreglodet($grid);
    $j=0;
    while ($j<count($arreglo))
    {
     $codigo=$arreglo[$j]["codpre"];
     if (!OrdendePago::montoValido($j,H::toFloat($arreglo[$j]["moncau"]),'N',$codigo,$afecta,&$msj,&$mondis,&$sobregiro))
     {
      $validardisponibilidad=false;
      break;
     }
     $j++;
    }
    return $validardisponibilidad;
  }

  public static function grabarComprobante($opordpag,$grid,&$msjuno,&$arrcompro)
  {
    if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }
    else
    {
      $numorden=str_replace('#','0',$opordpag->getNumord());
    }
     $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numcom= "OP".substr($numorden,2,6);
    }else $numcom= OrdendePago::Buscar_Correlativo();
    
    $reftra=$numorden;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]["codpre"]);
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if(!is_null($regis->getCodcta()))
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=$x[$j]["moncau"];
            if ($moncau>0)
            {
              $codigocuenta=$regis2->getCodcta();
              $tipo='D';
              $des="";
              $moncau=$x[$j]["moncau"];
              $monto=$moncau;
           }
          }else { $msjuno='El Código Presupuestario'.$x[$j]["codpre"].' no tiene asociado Codigo Contable válido'; return true;}
        }
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }

      $j++;
    }

    $t= new Criteria();
    $t->add(TsdefcajchiPeer::CODCAJ,$opordpag->getCodcajchi());
    $reg= TsdefcajchiPeer::doSelectOne($t);
    if ($reg){

      $n= new Criteria();
      $n->add(OpbenefiPeer::CEDRIF,$reg->getCedrif());
      $resul= OpbenefiPeer::doSelectOne($n);
      if ($resul)
      {
        if (!is_null($resul->getCodcta())  && $resul->getCodcta()!='')
        {
         $codigocuenta2=$resul->getCodcta();
         if ($opordpag->getMonord()>0)
        {
          $tipo2='C';
          $des2="";
          $b=$opordpag->getMonord();
          $monto2=$b;
        }
        }else {$codigocuenta2="";
             $tipo2="";
          $des2="";
          $b="0,00";
          $monto2=$b;
        }        
      }
    }else{
        $codigocuenta2="";
             $tipo2="";
          $des2="";
          $b="0,00";
          $monto2=$b;
    }
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;


      $clscommpro=new Comprobante();
	  $clscommpro->setGrabar("N");
	  $clscommpro->setNumcom($numcom);
	  $clscommpro->setReftra($reftra);
	  $clscommpro->setFectra(date("d/m/Y",strtotime($opordpag->getFecemi())));
	  $clscommpro->setDestra($opordpag->getDesord());
	  $clscommpro->setCtas($cuentas);
	  $clscommpro->setDesc($descr);
	  $clscommpro->setMov($tipos);
	  $clscommpro->setMontos($montos);
	  $arrcompro[]=$clscommpro;
  }

  public static function grabarOrden($opordpag,$numerocomp)
  {
  	if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $opordpag->setNumord($numero);
      }
     H::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,&$msg);
    }
    else
    {
      $opordpag->setNumord(str_replace('#','0',$opordpag->getNumord()));
    }

    $b= new Criteria();
    $b->add(TsdefcajchiPeer::CODCAJ,$opordpag->getCodcajchi());
    $dat=TsdefcajchiPeer::doSelectOne($b);
    if ($dat)
    {
      $opordpag->setTipcau($dat->getTipcau());
      $opordpag->setCedrif($dat->getCedrif());
      $opordpag->setCodcat($dat->getCodcat());
    }

    $opordpag->setMonret(0);
    $opordpag->setMondes(0);
    $opordpag->setNomben(H::getX_vacio('Cedrif','Opbenefi','Nomben',$opordpag->getCedrif()));
    $opordpag->setNumche(null);
    $opordpag->setCtaban(null);
    $opordpag->setCtapag(H::getX_vacio('Cedrif','Opbenefi','Codcta',$opordpag->getCedrif()));
    $opordpag->setNumcom($numerocomp);
    $opordpag->setStatus('N');
    $opordpag->save();
  }

  public static function posicion_en_el_grid($arreglo,$codigo)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codpre"]==$codigo)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function Arreglodet($grid)
  {
  	$arreglodet=array();
  	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
  	    $pos=self::posicion_en_el_grid($arreglodet,$x[$j]["codpre"]);
        if ($pos==0)
        {
         $l=count($arreglodet)+1;
         $arreglodet[$l-1]["codpre"]=$x[$j]["codpre"];
         $arreglodet[$l-1]["moncau"]=$x[$j]["moncau"];
         $arreglodet[$l-1]["refsal"]=$x[$j]["refsal"];
        }
        else
        {
          $valor=H::toFloat($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=($valor+$x[$j]["moncau"]);
          $arreglodet[$pos-1]["refsal"]=$x[$j]["refsal"].",".$arreglodet[$pos-1]["refsal"];
        }

        $j++;
    }

    return $arreglodet;
  }

  public static function grabarDetalleOrden($opordpag,$grid)
  {
    $referencia=$opordpag->getNumord();
    $arreglo=self::Arreglodet($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='')
      {
        $opdetord= new Opdetord();
        $opdetord->setNumord($referencia);
        $opdetord->setRefcom('NULO');
        $opdetord->setCodpre($arreglo[$j]["codpre"]);
        $opdetord->setMoncau($arreglo[$j]["moncau"]);
        $opdetord->setRefsal($arreglo[$j]["refsal"]);
        $opdetord->setMonret(0);
        $opdetord->setMondes(0);
        $opdetord->save();
      }
      $j++;
    }
  }

  public static function validaPeriodoCerrado($fecha)
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(Contaba1Peer::FECDES,$fec,Criteria::LESS_EQUAL);
    $c->add(Contaba1Peer::FECHAS,$fec,Criteria::GREATER_EQUAL);
    $c->add(Contaba1Peer::STATUS,'A');
    $conta1=Contaba1Peer::doSelectOne($c);
    if ($conta1)
    {
      return false;
    }else
    {return true;}
  }

  public static function validaPeriodoCerradoBanco($fecha,$numcue='')
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
    $mes = substr($fec,5,2);

    $c= new Criteria();
    $c->add(TsconcilhisPeer::MESCON,$mes);
    $c->add(TsconcilhisPeer::NUMCUE,$numcue);
    $conta1=TsconcilhisPeer::doSelect($c);

    if ($conta1)
    {
      return false;
    }else
    {return true;}
  }


  public static function salvarRelaciones($tsrelasiord,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCtagasxpag()!='' && $x[$j]->getCtaordxpag()!='')
      {
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

  }

  public static function saveTesconmovban($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('C');
      	$x[$j]->setStacon1('C');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }


  public static function saveTesconmovlib($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('C');
      	$x[$j]->setStacon1('C');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }

  public static function saveTesdesconmovlib($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('N');
      	$x[$j]->setStacon1('N');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }

  public static function saveTesdesconmovban($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('N');
      	$x[$j]->setStacon1('N');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }

  public static function MigrarMovimientosBancarios($tspararc,&$total,&$rechazado)
  {
    $val=-1;
    if ($file = fopen(sfConfig::get('sf_upload_dir')."//".$tspararc->getArchivo(),  "r")) {
    $i=0;
    $total=0;
    $rechazado=0;
    $t= new Criteria();
    $t->add(TspararcPeer::NUMCUE,$tspararc->getNumcue());
    $regis= TspararcPeer::doSelectOne($t);
    if ($regis)
    {
	  while(!feof($file)) {
	    $cuenta=fgets($file, 255);
            if (trim($cuenta)!='' && trim($cuenta)!='/n'){
                if ($regis->getInicue()>0)
                $numcue= trim(substr($cuenta,$regis->getInicue()-1,$regis->getFincue()));
                else $numcue= $regis->getNumcue();

                $ref= trim(substr($cuenta,$regis->getIniref()-1,$regis->getFinref()));

                $fecha= trim(substr($cuenta,$regis->getInifec()-1,$regis->getFinfec()));
                if ($regis->getForfec()=='dd/mm/yyyy' || $regis->getForfec()=='DD/MM/YYYY')    {
		    $dateFormat = new sfDateFormat('es_VE');
                    $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
                }else if ($regis->getForfec()=='yyyy-mm-dd' || $regis->getForfec()=='YYYY-MM-DD') {
                    $fec1=$fecha;
                }
                $signomonto=substr(trim(substr($cuenta,$regis->getInimon()-1,$regis->getFinmon())),0,1);
                $mes=substr($fec1,5,2);
                $sql="select refban from tsmovban where numcue='".$numcue."' and refban='".$ref."'and to_char(fecban,'MM')='".$mes."'";
                if (Herramientas::BuscarDatos($sql,&$resul))
                {                    
                    $correl="";
                    $campo="";
                    $a= new Criteria();
                    $a->add(TscormestxtPeer::NUMCUE,$numcue);
                    $reg=TscormestxtPeer::doSelectOne($a);
                    if ($reg)
                    {   $ames=intval($mes);
                        eval('$correl=$reg->getCormes'.$ames.'();');
                        eval('$campo="cormes'.$ames.'";');
                    
                     $formato = date('ym');
                     $longitud='4';
                     $encontrado=false;
                     while (!$encontrado)
                     {
                      $numero=$formato.str_pad((string)$correl, $longitud, "0", STR_PAD_LEFT);
                      $sql="select refban from tsmovban where numcue='".$numcue."' and refban='".$numero."'and to_char(fecban,'MM')='".$mes."'";
                      if (Herramientas::BuscarDatos($sql,&$result))
                      {
                        $correl=$correl+1;
                      }
                      else
                      {
                        $encontrado=true;
                      }
                     }
                     $referencia=$numero;

                     eval('$reg->set'.ucfirst(strtolower($campo)).'('.$correl.');');
                     eval('$reg->save();');
                     
                    }
                }else
                {
                    if ($signomonto=='-')
                      $referencia=substr($ref,($regis->getDigsign()*-1));
                    else $referencia=substr($ref,($regis->getDigsigp()*-1));
                }                
                if ($regis->getFintip()>0)
                {
                   $tipo= trim(substr($cuenta,$regis->getInitip()-1,$regis->getFintip()));
                }else {
                    if ($signomonto=='-')
                      $tipo=$regis->getValdefn();
                    else $tipo=$regis->getValdefp();
                }

                if ($regis->getFindes()>0)
		   $descrip= trim(substr($cuenta,$regis->getInides()-1,$regis->getFindes()));
                else 
                   $descrip= $regis->getValdefd();
                
             $valormon=trim(substr($cuenta,$regis->getInimon()-1,$regis->getFinmon()));
             if ($signomonto=='-')
               $montor=substr($valormon,1,strlen($valormon));
             else $montor=$valormon;
             if (is_numeric(H::toFloat($montor)))
             {
               $monto=H::toFloat($montor);
             }else $monto=0;

                $d= new Criteria();
                $d->add(TsmovbanPeer::NUMCUE, $tspararc->getNumcue());
                $d->add(TsmovbanPeer::REFBAN, $referencia);
                $d->add(TsmovbanPeer::TIPMOV, $tipo);
                $reg1= TsmovbanPeer::doSelectOne($d);
                if (!$reg1)
                {
                        $tsmovban = new Tsmovban();
                        $tsmovban->setNumcue($tspararc->getNumcue());
                        $tsmovban->setCodcta(H::getX_Vacio('Numcue','Tsdefban','Codcta',$tspararc->getNumcue()));
                        $tsmovban->setRefban($referencia);
                        $tsmovban->setFecban($fec1);
                        $tsmovban->setTipmov($tipo);
                        $tsmovban->setDesban($descrip);
                        $tsmovban->setMonmov($monto);
                        $tsmovban->setStatus('C');
                        $tsmovban->setStacon('N');
                        $tsmovban->save();
                }else{
                  $rechazado= $rechazado + 1;
                }
		$total= $total + 1;
	    }
	  $i++;
    }

    if ($total==$rechazado)
    {
      $val=-1;
    }else{
      $val=-1;
      if ($rechazado>0)
      {
      	$val=-1;
      }
    }
    }
    fclose ($file);
    unlink(sfConfig::get('sf_upload_dir')."//".$tspararc->getArchivo());
  }else
  {
  	$val=541;
  }
  return $val;
  }

  public static function generaComprobanteAutomatico($objeto, $tipmovdesd, $tipmovhast,&$correl2)
  {
        $correl2=OrdendePago::Buscar_Correlativo();
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($objeto->getReftra());
	    $contabc->setFeccom($objeto->getFectra());
	    $contabc->setDescom($objeto->getDestra());
	    $contabc->setStacom('D');
	    $contabc->setTipcom(null);
	    $contabc->setMoncom($objeto->getMontra());
	    $contabc->save();

        $contabc1= new Contabc1();
        $contabc1->setNumcom($correl2);
        $contabc1->setFeccom($objeto->getFectra());
        $ctades=H::getX('numcue','Tsdefban','Codcta',$objeto->getCtades());
        $contabc1->setCodcta($ctades);
        $contabc1->setNumasi(1);
        $contabc1->setRefasi($objeto->getReftra());
        $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$ctades));
       	$contabc1->setDebcre('D');
       	$contabc1->setMonasi($objeto->getMontra());
        $contabc1->save();

        $contabc1= new Contabc1();
        $contabc1->setNumcom($correl2);
        $contabc1->setFeccom($objeto->getFectra());
        $ctahas=H::getX('numcue','Tsdefban','Codcta',$objeto->getCtaori());
        $contabc1->setCodcta($ctahas);
        $contabc1->setNumasi(2);
        $contabc1->setRefasi($objeto->getReftra());
        $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$ctahas));
       	$contabc1->setDebcre('C');
       	$contabc1->setMonasi($objeto->getMontra());
        $contabc1->save();

  }

  public static function FormarArreImp($cadenasal)
  {
    $arregloimp=array();
    $j=0;
    $arre=split('/',$cadenasal);
    $ind=count($arre)-1;
    $p=1;
    while ($p<=$ind)
    {
      $sql = "Select A.Codcat||'-'||B.CodPar as codpre,Sum(A.MonSal) as moncau, A.refsal as refsal, '' as id From TSDetSal A,CARegArt B Where A.RefSal='".$arre[$p]."' And A.CodArt=B.CodArt Group By A.Codcat,B.CodPar,A.refsal";
      if (Herramientas :: BuscarDatos($sql, & $reg)){      
         $i=0;
         while ($i<count($reg)) {

          $j=count($arregloimp)+1;
          $arregloimp[$j-1]["codpre"]=$reg[$i]["codpre"];
          $arregloimp[$j-1]["moncau"]=number_format($reg[$i]["moncau"],2,',','.');
          $arregloimp[$j-1]["refsal"]=$reg[$i]["refsal"];
          $arregloimp[$j-1]["id"]=$reg[$i]["id"];
          $i++;
         }
      }
      $p++;
    }
    return $arregloimp;
  }

  public static function grabarCompAnulacionMovLibAnoANt($numcue,$reflib,$tipmov,$fecanu,&$msjuno,&$arrcompro)
  {
    $msjuno="";
    $c= new Criteria();
    $c->add(TsmovlibPeer::NUMCUE,$numcue);
    $c->add(TsmovlibPeer::REFLIB,$reflib);
    $c->add(TsmovlibPeer::TIPMOV,$tipmov);
    $resul= TsmovlibPeer::doSelectOne($c);
    if ($resul){

    $reftra="A".substr($reflib,1,7);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $reftra;
    }else $numerocomprob= '########';


    $codigocuenta=""; $tipo=""; $des=""; $monto=""; $codigocuentas=""; $tipo1=""; $desc=""; $monto1=""; $codigocuenta2=""; $tipo2=""; $des2=""; $monto2="";
    $cuentas=""; $tipos=""; $montos=""; $descr=""; $msjuno="";

    $d= new Criteria();
    $d->add(TstipmovPeer::CODTIP,$tipmov);
    $dato= TstipmovPeer::doSelectOne($d);
    if ($dato)
    {
    $afecta=$dato->getDebcre();
    }

    if ($afecta=='D')
    {
		$codigocuenta2=H::getX('NUMCUE','Tsdefban','Codcta',$numcue);
	    $tipo2='C';
	    $des2="";
	    $monto2=$resul->getMonmov();
    }else{
	      $codigocuenta=H::getX('NUMCUE','Tsdefban','Codcta',$numcue);
	      $tipo='D';
	      $des="";
	      $monto=$resul->getMonmov();
    }

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra($fecanu);
    $clscommpro->setDestra($resul->getDeslib());
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;
    }

    return true;
  }

public static function reversarMovSegLib($clasemodelo)
{
  $t= new Criteria();
  $t->add(TsmovlibPeer::NUMCUE,$clasemodelo->getNumcue());
  $t->add(TsmovlibPeer::REFLIB,$clasemodelo->getReflib());
  $t->add(TsmovlibPeer::TIPMOV,$clasemodelo->getCodtip());
  $result=TsmovlibPeer::doSelectOne($t);
  if ($result)
  {
    $g= new Criteria();
    $g->add(TsmovlibPeer::NUMCUE,$clasemodelo->getNumcue());
    $g->add(TsmovlibPeer::REFLIBPAD,$clasemodelo->getReflib());
    $g->add(TsmovlibPeer::TIPMOVPAD,$clasemodelo->getCodtip());
    $result2=TsmovlibPeer::doSelectOne($g);
    if ($result2)
    {
        $escheque=H::getX('CODTIP','Tstipmov','Escheque',$result->getTipmov());
        if ($escheque==1)
        {
            $c = new Criteria();
            $c->add(TscheemiPeer :: NUMCUE, $result->getNumcue());
            $c->add(TscheemiPeer :: NUMCHE, $result->getReflib());
            $tscheemi = TscheemiPeer :: doSelectOne($c);
            if ($tscheemi)
            {
             $tscheemi->setStatus('C');
             $tscheemi->save();
            }

            $c = new Criteria();
            $c->add(CpimppagPeer :: REFPAG, $result->getRefpag());
            $cpimppag = CpimppagPeer :: doSelect($c);
            foreach($cpimppag as $imppag){
             $imppag->setStaimp('A');
             $imppag->save();
            }

            
        }else{
            $e= new Criteria();
            $e->add(CpdocpagPeer::TIPPAG,$result->getTipmov());
            $result3=CpdocpagPeer::doSelectOne($e);
            if ($result3)
            {
              if ($result3->getRefier()=='A')
              {
                $c = new Criteria();
                $c->add(CpimppagPeer :: REFPAG, $result->getRefpag());
                $cpimppag = CpimppagPeer :: doSelect($c);
                foreach($cpimppag as $imppag){
                 $imppag->setStaimp('A');
                 $imppag->save();
                }
              }else {
                $c = new Criteria();
                $c->add(CpimppagPeer :: REFPAG, $result->getRefpag());
                $cpimppag = CpimppagPeer :: doSelect($c);
                foreach($cpimppag as $imppag){
                 $imppag->setStaimp('A');
                 $imppag->save();
                }
              }
                    
            }
        }

        $c = new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$result2->getNumcom());
        Contabc1Peer::doDelete($c);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$result2->getNumcom());
        ContabcPeer::doDelete($c);
   
        $result2->delete();

    }else return 1511;
    
  }else{
    return 1510;
  }
  return -1;
}

	public static function hacer_ConciliablesMig($nro, $mes, $ano, $fechas) {
    $sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
            A.TipMov as tipmov1, B.TipMov as tipmov2, A.DesLib as deslib, B.DesBan as desban,
            A.MonMov as monmov1, B.MonMov as monmov2
                   From TsMovLib A, TsMovBan B
                  Where A.RefLib = B.RefBan And
                    A.MonMov = B.MonMov And
                    A.NumCue = '" . $nro . "' And
            B.NumCue = '" . $nro . "' And
                     A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     A.StaCon='N' And B.StaCon='N' AND
                     A.Status='C' And B.Status='C'";
  //A.tipmov=b.tipmov and
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tstemigu) {
        $tsconcil = new Tsconcil();
        $tsconcil->setNumcue($nro);
        $tsconcil->setMescon($mes);
        $tsconcil->setAnocon($ano);
        $tsconcil->setRefere($tstemigu["reflib"]);
        $tsconcil->setMovlib($tstemigu["tipmov1"]);
        $tsconcil->setMovban($tstemigu["tipmov2"]);
        $tsconcil->setFeclib($tstemigu["feclib"]);
        $tsconcil->setFecban($tstemigu["fecban"]);
        $tsconcil->setDesref($tstemigu["deslib"]);
        $tsconcil->setMonlib($tstemigu["monmov1"]);
        $tsconcil->setMonban($tstemigu["monmov2"]);
        $tsconcil->setResult('CONCILIADO');
        $tsconcil->save();

        Tesoreria :: actualizar_Status($nro, $tstemigu["reflib"], 'C',$tstemigu["tipmov1"]);
}
    }

  }

   public static function hacer_Libro_No_BancoMig($nro, $mes, $ano, $fechas) {
    $sql = "Select reflib,tipmov,feclib,deslib,monmov From TsMovLib
                  Where NumCue = '" . $nro . "' And
                    FecLib<= To_Date('" . $fechas . "','DD/MM/YYYY') And Status = 'C' And StaCon='N' ";

    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tsmovlib) {
        $sql2 = "SELECT REFBAN From TSMOVBAN
                         WHERE NUMCUE= '" . $nro . "' And
                            RefBan ='" . $tsmovlib["reflib"] . "' And
                            FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY')";
        //Tipmov ='" . $tsmovlib["tipmov"] . "' And
        if  (!Herramientas :: BuscarDatos($sql2, & $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovlib["reflib"]);
          $tsconcil->setMovlib($tsmovlib["tipmov"]);
          $tsconcil->setMovban(null);
          $tsconcil->setFeclib($tsmovlib["feclib"]);
          $tsconcil->setFecban(null);
          $tsconcil->setDesref($tsmovlib["deslib"]);
          $tsconcil->setMonlib($tsmovlib["monmov"]);
          $tsconcil->setMonban(0);
          $tsconcil->setResult('MOVIMIENTO EN TRANSITO');
          $tsconcil->save();

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovlibPeer :: NUMCUE, $nro);
          $c->add(TsmovlibPeer :: FECLIB, $fecfin);
          $c->add(TsmovlibPeer :: STATUS, 'C');
          $c->add(TsmovlibPeer :: STACON, 'N');
          $tsmovlib2 = TsmovlibPeer :: doSelectOne($c);
          if ($tsmovlib2) {
          	//foreach ($tsmovlib2 as $lib2) {
            $tsmovlib2->setStacon('N');
            $tsmovlib2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_Banco_No_LibroMig($nro, $mes, $ano, $fechas) {
    $sql = "Select refban, tipmov, fecban, desban, monmov
                    From TsMovBan
                  Where NumCue = '" . $nro . "' And
                    FecBan<= To_Date('" . $fechas . "','DD/MM/YYYY') And STATUS='C' And StaCon='N'";
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tsmovban) {
        $sql2 = "SELECT * From TSMOVLIB
                             WHERE NUMCUE = '" . $nro . "' And
                             RefLib = '" . $tsmovban["refban"] . "' And
                             FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY')";
         //Tipmov = '" . $tsmovban["tipmov"] . "' And
        if (!Herramientas :: BuscarDatos($sql2, & $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovban["refban"]);
          $tsconcil->setMovlib(null);
          $tsconcil->setMovban($tsmovban["tipmov"]);
          $tsconcil->setFeclib(null);
          $tsconcil->setFecban($tsmovban["fecban"]);
          $tsconcil->setDesref($tsmovban["desban"]);
          $tsconcil->setMonlib(0);
          $tsconcil->setMonban($tsmovban["monmov"]);
          $tsconcil->setResult('MOVIMIENTO NO REGISTRADO EN LIBROS');
          $tsconcil->save();

          //$dateFormat = new sfDateFormat($this->getUser()->getCulture());
          //$fechas = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovbanPeer :: NUMCUE, $nro);
          $c->add(TsmovbanPeer :: FECBAN, $fecfin);
          $c->add(TsmovbanPeer :: STATUS, 'C');
          $c->add(TsmovbanPeer :: STACON, 'N');
          $tsmovban2 = TsmovbanPeer :: doSelectOne($c);
          if ($tsmovban2) {
          	//foreach ($tsmovban2 as $ban2) {
            $tsmovban2->setStacon('N');
            $tsmovban2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_No_ConciliablesMig($nro, $mes, $ano, $fechas) {
	$sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
          A.TipMov as movlib, B.TipMov as movban, A.DesLib as deslib, B.DesBan as desban,
          A.MonMov as monmov1, B.MonMov as monmov2
                From TsMovLib A, TsMovBan B
                Where
                A.NumCue = '" . $nro . "' And
                B.NumCue = '" . $nro . "' And
          A.RefLib = B.RefBan And
                A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                A.MonMov <> B.MonMov and A.stacon='N'";
  //A.TipMov=B.TipMov And
    if (Herramientas :: BuscarDatos($sql, & $result)) {
      foreach ($result as $tstemigu) {
        $sql2 = "Select * From TSconcil Where
                        NumCue = '" . $nro . "' And
                        Refere = '" . $tstemigu["reflib"] . "' And
                        Refere = '" . $tstemigu["refban"] . "' And
                        FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        movlib='" . $tstemigu["movlib"] . "'  and
                        Result like 'CONCILIADO%'";

        if (!Herramientas :: BuscarDatos($sql2, & $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tstemigu["reflib"]);
          $tsconcil->setMovlib($tstemigu["movlib"]);
          $tsconcil->setMovban($tstemigu["movban"]);
          $tsconcil->setFeclib($tstemigu["feclib"]);
          $tsconcil->setFecban($tstemigu["fecban"]);
          $tsconcil->setDesref($tstemigu["deslib"]);
          $tsconcil->setMonlib($tstemigu["monmov1"]);
          $tsconcil->setMonban($tstemigu["monmov2"]);
          $tsconcil->setResult('ERROR EN CONCILIACION (MONTOS DIFERENTES)');
          $tsconcil->save();
        }

      }
    }
  }

  public static function salvarSalidaFondosAnticipo($tsfonant,$grid)
  {
    if (OrdendePago::agregaBenefi($tsfonant)==true)
    {
      OrdendePago::grabarBenefi($tsfonant);
}
    self::generaSalidaFonAnt($tsfonant,$grid);

    self::Genera_MovLibF($tsfonant,$tsfonant->getDesfon(),$tsfonant->getMonfon(),null,$tsfonant->getReffon(),null);
    self::Actualiza_BancosCaja($tsfonant,"A","C",$tsfonant->getMonfon(),$tsfonant->getReffon());
  }

  public static function generaSalidaFonAnt($tsfonant,$grid)
  {
     if ($tsfonant->getReffon()=='########')
     {
       $r=((H::getX('CODFON', 'Tsdeffonant', 'numini', $tsfonant->getCodfon()))+1);
        $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(TsfonantPeer::REFFON,$numero);
          $resul= TsfonantPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $tsfonant->setReffon($numero);
        $t= new Criteria();
        $t->add(TsdeffonantPeer::CODFON,$tsfonant->getCodfon());
        $reg= TsdeffonantPeer::doSelectOne($t);
        if ($reg)
        {
            $reg->setNumini($r);
            $reg->save();
        }
    }
    else
    {
      $tsfonant->setReffon(str_replace('#','0',$tsfonant->getReffon()));
    }

    $tsfonant->setStafon('P');
    $tsfonant->save();
    self::generaDetalleSalidaF($tsfonant,$grid);
  }

  public static function generaDetalleSalidaF($tsfonant,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodart()!='')
      {
        $x[$j]->setReffon($tsfonant->getReffon());
        $x[$j]->setStafon('P');
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function Genera_MovLibF($tscheemi,$Descrip,$Monto,$Comprobante,$numche,$refpago='')
  {
    $result=array();
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$tscheemi->getNumcue()."' AND RefLib = '".$numche."' And TipMov='".$tscheemi->getTipdoc()."'";
    if (!Herramientas::BuscarDatos($criterio,&$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag($refpago);
      $tsmovlib->setNumcue($tscheemi->getNumcue());
      $tsmovlib->setReflib($numche);
      $tsmovlib->setFeclib($tscheemi->getFecfon());
      $tsmovlib->setTipmov($tscheemi->getTipdoc());
      $tsmovlib->setDeslib($Descrip);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $tsmovlib->setMonmov($Monto);
      $tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($Comprobante);
      $tsmovlib->setFeccom($tscheemi->getFecfon());
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $tsmovlib->setFecing(date("Y-m-d"));
      $tsmovlib->save();
    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }

  public static function FormarArreImpF($cadenasal)
  {
    $arregloimp=array();
    $j=0;
    $arre=split('/',$cadenasal);
    $ind=count($arre)-1;
    $p=1;
    while ($p<=$ind)
    {
      $sql = "Select A.Codcat||'-'||B.CodPar as codpre,Sum(A.Monfon) as moncau, A.reffon as reffon, '' as id From TSDetfon A,CARegArt B Where A.Reffon='".$arre[$p]."' And A.CodArt=B.CodArt Group By A.Codcat,B.CodPar,A.reffon";
      if (Herramientas :: BuscarDatos($sql, & $reg)){
         $i=0;
         while ($i<count($reg)) {
          $j=count($arregloimp)+1;
          $arregloimp[$j-1]["codpre"]=$reg[$i]["codpre"];
          $arregloimp[$j-1]["moncau"]=number_format($reg[$i]["moncau"],2,',','.');
          $arregloimp[$j-1]["reffon"]=$reg[$i]["reffon"];
          $arregloimp[$j-1]["id"]=$reg[$i]["id"];
          $i++;
         }
      }
      $p++;
    }
    return $arregloimp;
  }

   public static function ArreglodetF($grid)
  {
  	$arreglodet=array();
  	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
  	    $pos=self::posicion_en_el_grid($arreglodet,$x[$j]["codpre"]);
        if ($pos==0)
        {
         $l=count($arreglodet)+1;
         $arreglodet[$l-1]["codpre"]=$x[$j]["codpre"];
         $arreglodet[$l-1]["moncau"]=$x[$j]["moncau"];
         $arreglodet[$l-1]["reffon"]=$x[$j]["reffon"];
        }
        else
        {
          $valor=H::toFloat($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=($valor+$x[$j]["moncau"]);
          $arreglodet[$pos-1]["reffon"]=$x[$j]["reffon"].",".$arreglodet[$pos-1]["reffon"];
        }

        $j++;
    }

    return $arreglodet;
  }

  public static function validarDisponibilidadPresuFonAnt($grid,$afecta,&$codigo)
  {
    $validardisponibilidad=true;
    $arreglo=self::ArreglodetF($grid);
    $j=0;
    while ($j<count($arreglo))
    {
     $codigo=$arreglo[$j]["codpre"];
     if (!OrdendePago::montoValido($j,H::toFloat($arreglo[$j]["moncau"]),'N',$codigo,$afecta,&$msj,&$mondis,&$sobregiro))
     {
      $validardisponibilidad=false;
      break;
     }
     $j++;
    }
    return $validardisponibilidad;
  }

  public static function grabarComprobanteF($opordpag,$grid,&$msjuno,&$arrcompro)
  {
    if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }
    else
    {
      $numorden=str_replace('#','0',$opordpag->getNumord());
    }
     $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numcom= "OP".substr($numorden,2,6);
    }else $numcom= OrdendePago::Buscar_Correlativo();

    $reftra=$numorden;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]["codpre"]);
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if(!is_null($regis->getCodcta()))
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=$x[$j]["moncau"];
            if ($moncau>0)
            {
              $codigocuenta=$regis2->getCodcta();
              $tipo='D';
              $des="";
              $moncau=$x[$j]["moncau"];
              $monto=$moncau;
           }
          }else { $msjuno='El Código Presupuestario'.$x[$j]["codpre"].' no tiene asociado Codigo Contable válido'; return true;}
        }
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }

      $j++;
    }

    $t= new Criteria();
    $t->add(TsdeffonantPeer::CODFON,$opordpag->getCodfonant());
    $reg= TsdeffonantPeer::doSelectOne($t);
    if ($reg){

      $n= new Criteria();
      $n->add(OpbenefiPeer::CEDRIF,$reg->getCedrif());
      $resul= OpbenefiPeer::doSelectOne($n);
      if ($resul)
      {
        if (!is_null($resul->getCodcta())  && $resul->getCodcta()!='')
        {
         $codigocuenta2=$resul->getCodcta();
         if ($opordpag->getMonord()>0)
        {
          $tipo2='C';
          $des2="";
          $b=$opordpag->getMonord();
          $monto2=$b;
        }
        }else {$codigocuenta2="";
             $tipo2="";
          $des2="";
          $b="0,00";
          $monto2=$b;
        }
      }
    }else{
        $codigocuenta2="";
             $tipo2="";
          $des2="";
          $b="0,00";
          $monto2=$b;
    }
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;


      $clscommpro=new Comprobante();
	  $clscommpro->setGrabar("N");
	  $clscommpro->setNumcom($numcom);
	  $clscommpro->setReftra($reftra);
	  $clscommpro->setFectra(date("d/m/Y",strtotime($opordpag->getFecemi())));
	  $clscommpro->setDestra($opordpag->getDesord());
	  $clscommpro->setCtas($cuentas);
	  $clscommpro->setDesc($descr);
	  $clscommpro->setMov($tipos);
	  $clscommpro->setMontos($montos);
	  $arrcompro[]=$clscommpro;
  }

public static function salvarReposicionFondosAnticipo($opordpag,$grid,$numerocomp,$grid1)
  {
  	self::grabarOrdenF($opordpag,$numerocomp);
  	self::grabarDetalleOrdenF($opordpag,$grid);
  	self::grabarCausado($opordpag);
  	self::grabarImpcauF($opordpag,$grid);

  	$x=$grid1[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=='1'){
          $a= new Criteria();
  	  $a->add(TsfonantPeer::REFFON,$x[$j]->getReffon());
  	  $data= TsfonantPeer::doSelectOne($a);
  	  if ($data)
  	  {
  	   $data->setStafon('R');
  	   $data->save();
  	  }
          }
          $j++;
        }
  }

public static function grabarOrdenF($opordpag,$numerocomp)
  {
  	if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',&$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $opordpag->setNumord($numero);
      }
     H::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,&$msg);
    }
    else
    {
      $opordpag->setNumord(str_replace('#','0',$opordpag->getNumord()));
    }

    $b= new Criteria();
    $b->add(TsdeffonantPeer::CODFON,$opordpag->getCodfonant());
    $dat=TsdeffonantPeer::doSelectOne($b);
    if ($dat)
    {
      $opordpag->setTipcau($dat->getTipmovren());
      $opordpag->setCedrif($dat->getCedrif());
      $opordpag->setCodcat($dat->getCodcat());
    }

    $opordpag->setMonret(0);
    $opordpag->setMondes(0);
    $opordpag->setNomben(H::getX_vacio('Cedrif','Opbenefi','Nomben',$opordpag->getCedrif()));
    $opordpag->setNumche(null);
    $opordpag->setCtaban(null);
    $opordpag->setCtapag(H::getX_vacio('Cedrif','Opbenefi','Codcta',$opordpag->getCedrif()));
    $opordpag->setNumcom($numerocomp);
    $opordpag->setStatus('N');
    $opordpag->save();
  }

  public static function grabarDetalleOrdenF($opordpag,$grid)
  {
    $referencia=$opordpag->getNumord();
    $arreglo=self::ArreglodetF($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='')
      {
        $opdetord= new Opdetord();
        $opdetord->setNumord($referencia);
        $opdetord->setRefcom('NULO');
        $opdetord->setCodpre($arreglo[$j]["codpre"]);
        $opdetord->setMoncau($arreglo[$j]["moncau"]);
        $opdetord->setReffon($arreglo[$j]["reffon"]);
        $opdetord->setMonret(0);
        $opdetord->setMondes(0);
        $opdetord->save();
      }
      $j++;
    }
  }

  public static function grabarImpcauF($opordpag,$grid)
  {
  	$referencia=$opordpag->getNumord();
  	$g= new Criteria();
  	$g->add(CpimpcauPeer::REFCAU,$referencia);
  	CpimpcauPeer::doDelete($g);

    $arreglo=self::ArreglodetF($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncau"]!=0)
      {
        $cpimpcau= new Cpimpcau();
        $cpimpcau->setRefcau($referencia);
        $cpimpcau->setCodpre($arreglo[$j]["codpre"]);
        $cpimpcau->setMonimp($arreglo[$j]["moncau"]);
        $cpimpcau->setMonaju(0);
        $cpimpcau->setMonpag(0);
        $cpimpcau->setStaimp('A');
        $cpimpcau->setRefere('NULO');
        $cpimpcau->setRefprc('NULO');
        $cpimpcau->save();
      }
      $j++;
    }
  }
}
