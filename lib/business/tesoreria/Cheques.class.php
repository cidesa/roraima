<?php
/**
 * Clase para el Manejo de Cheques
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
class Cheques
{
  public static function ObtenerAjuste($numord)
  {
    $result=array();
    $sql="Select coalesce(sum(MonAju),0) as  monaju From CPImpCau Where RefCau='". $numord ."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    return $ajuste = $result[0]['monaju'];
    else
    return 0;
  }

  public static function Obtener_Monto_Total_Orden($numord)
  {
    $total = 0;
    $result=array();
    $sql = "Select monord,monret,numord from OPOrdPag where NumOrd='".$numord."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $total = $result[0]['monord'] -$result[0]['monret'] - self::ObtenerAjuste($result[0]['numord']);
    }
    return $total;
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
      $tsmovlib->setFeclib($tscheemi->getFecemi());
      $tsmovlib->setTipmov($tscheemi->getTipdoc());
      $tsmovlib->setDeslib($Descrip);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $tsmovlib->setMonmov($Monto);
      $tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($Comprobante);
      $tsmovlib->setFeccom($tscheemi->getFecemi());
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $tsmovlib->setFecing(date("Y-m-d"));
      $tsmovlib->save();

      Comprobante::ActualizarReferenciaComprobante($Comprobante,$numche);

    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }


  public static function Actualiza_Bancos($tscheemi,$Accion,$DebCre,$Monto,$numche)
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
            if (substr($tscheemi->getTipdoc(),0,2)=="CH") $tsdefban->setNumche($numche);
          }
          else if ($Accion == "E")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito - $Monto;
            $tsdefban->setDeblib($Total);
            if (substr($tscheemi->getTipdoc(),0,2)=="CH") $tsdefban->setNumche($numche);
          }
          $tsdefban->save();
         case "C":
           if ($Accion== "A")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito + $Monto;
             $tsdefban->setCrelib($Total);
             if (substr($tscheemi->getTipdoc(),0,2)=="CH")
             {
	             $nrocheque=intval($numche);
	             $nrocheque=$nrocheque+1;
	             $newnumche=str_pad($nrocheque,8,"0",STR_PAD_LEFT);
	             $tsdefban->setNumche($newnumche);
             }
           }
           if ($Accion== "E")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito - $Monto;
             $tsdefban->setCrelib($Total);
             if (substr($tscheemi->getTipdoc(),0,2)=="CH")
             {
	             $nrocheque=intval($numche);
	             $nrocheque=$nrocheque-1;
	             $newnumche=str_pad($nrocheque,8,"0",STR_PAD_LEFT);
	             $tsdefban->setNumche($newnumche);
             }
           }

           $tsdefban->save();
      }//  switch($DebCre)
    }// if ($tsdefban)
  }

  //Para Generar Imputaciones Presupuestaria desde Ordenes de Pago(Causados), Compromisos y Precompromisos,  "D" Pago Directo
  public static function Genera_Pagos($tscheemi,$NumOrd,$CedRif, $TipoCa,$DesOrd,$Monto,$TipoOrig,$Porcentaje,$numche,$grid)
  // TipoOrig = "O" : Orden de Pago, "C" : Compromiso, "P" : PreCompromiso
  {
    //Preguntar si afecta o no al pagado
    $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$tscheemi->getTipdoc());
    // Afecta Presupuesto
     $refpagaux = "NULO";
    if ($refpag != "N")
    {
      //$criterio = "Select * From CPPAGOS Where RefPag = '".$numche."' Order by RefPag";
      //if (!Herramientas::BuscarDatos($criterio,&$result))
      //{
        $cppagos=new Cppagos();
        $refpagaux = self::Buscar_Correlativo_Pago();
        $cppagos->setRefpag($refpagaux);
        $cppagos->setTippag($tscheemi->getTipdoc());
        $cppagos->setFecpag($tscheemi->getFecemi());
        $anno=substr($tscheemi->getFecemi(),0, 4);
        $cppagos->setAnopag($anno);
        $cppagos->setCedrif($CedRif);
        $cppagos->setRefcau($NumOrd);
        $cppagos->setTipcau($TipoCa);
        $cppagos->setDespag($DesOrd);
        $cppagos->setDesanu(null);
        $cppagos->setMonpag($Monto);
        $cppagos->setSalaju(0);
        $cppagos->setStapag("A");
        $cppagos->save();

        $c = new Criteria();
   	    $datos = CpdefnivPeer::doSelectOne($c);
   	    if ($datos){
			$datos->setCorpag($refpagaux);
   			$datos->save();
   		}

        if ($TipoOrig == "O")
        {
          self::Genera_ImpPag($tscheemi,$NumOrd,$numche,$Porcentaje,$refpagaux);
        }
        if ($TipoOrig == "C")
        {
          self::Genera_ImpPag_De_Compromiso($numche,$grid,$refpagaux);
        }
        if ($TipoOrig == "P")
        {
          self::Genera_ImpPag_De_PreCompromiso($numche,$grid,$refpagaux);
        }
        if ($TipoOrig == "D")
        {
          self::Genera_ImpPag_Pago_Directo($numche,$grid,$refpagaux);
        }
      //}
      //else
      //{
        //$mensaje="El pagado no fue generado, ya que la referencia esta registrada";
     // }
     }//if ($refpag != "N")
     return $refpagaux;
   } //end sub

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
	   		$c2->add(CppagosPeer::REFPAG,$cadcorpag);
	   		$contabc = CppagosPeer::doSelectOne($c2);
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

   public static function Buscar_Correlativo_Comprobante(){
   	$c = new Criteria();
   	$datos = CpdefnivPeer::doSelectOne($c);
   	if ($datos){
   		$corcomcont = (int)$datos->getCorcomcont();
   		$newcorcomcont = $corcomcont + 1;
   		$cadcorcomcont = str_pad((string)$newcorcomcont, 8, "0", STR_PAD_LEFT);;
   		$valido = false;
   		while(!$valido){
   			$c2 = new Criteria();
	   		$c2->add(ContabcPeer::NUMCOM,$cadcorcomcont);
	   		$contabc = ContabcPeer::doSelectOne($c2);
	   		if($contabc){
	   			$newcorcomcont++;
	   			$cadcorcomcont = str_pad((string)$newcorcomcont, 8, "0", STR_PAD_LEFT);
	   		}
	   		else {
	   			$valido = true;
	   		}
   		}
   		//$datos->setCorcomcont((string)$newcorcomcont);
   		//$datos->save();
   		return $cadcorcomcont;
   	}
   	else return "00000000";
   }


   public static function Genera_Pagos_Compuesto($tscheemi,$NumOrd,$CedRif,$TipoCa,$DesOrd,$numche,$grid)
   {
     $MontoDelCompuesto = 0;
      $j=0;
      $result=array();
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$grid[$j]->getNumord()."' AND B.TIPCAU=A.TIPCAU";
          if (!Herramientas::BuscarDatos($criterio,&$result))
          {
            if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N"))
            $MontoDelCompuesto = $MontoDelCompuesto + $grid[$j]->getMontotalGrid();
          }//if (!Herramientas::BuscarDatos($criterio,&$result))
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }  //End del ciclo que recorre el grid while ($j<count($grid))

      //Preguntar si afecta o no al pagado
      $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$tscheemi->getTipdoc());
      $refpagaux = "";
      // Afecta Presupuesto
      if ($refpag != "N")
      {
        $criterio = "Select * From CPPAGOS Where RefPag = '".$numche."' Order by RefPag";
        if (!Herramientas::BuscarDatos($criterio,&$result))
        {
          $cppagos=new Cppagos();
          $refpagaux = self::Buscar_Correlativo_Pago();
          $cppagos->setRefpag($refpagaux);
          $cppagos->setTippag($tscheemi->getTipdoc());
          $cppagos->setFecpag($tscheemi->getFecemi());
          $anno=substr($tscheemi->getFecemi(),0, 4);
          $cppagos->setAnopag($anno);
          $cppagos->setCedrif($CedRif);
          $cppagos->setRefcau($NumOrd);
          $cppagos->setTipcau($TipoCa);
          $cppagos->setDespag($DesOrd);
          $cppagos->setDesanu(null);
          $cppagos->setMonpag($MontoDelCompuesto);
          $cppagos->setSalaju(0);
          $cppagos->setStapag("A");
          $cppagos->save();

          $c = new Criteria();
	   	  $datos = CpdefnivPeer::doSelectOne($c);
	      if ($datos){
	      	$datos->setCorpag((string)$refpagaux);
	   		$datos->save();
	      }

          self::Genera_ImpPag_Compuesto($tscheemi,$grid,$refpagaux);
        }
        else
        {
          $mensaje="El Pagado ya ha Sido Grabado";
        }//if (!Herramientas::BuscarDatos($criterio,&$result))
    }//if ($refpag != "N")
    return $refpagaux;
   }

  public static function Genera_ImpPag($tscheemi,$numord,$numche,$porcentaje,$refpag)
  {
    $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$numord."' AND B.TIPCAU=A.TIPCAU";
    if (Herramientas::BuscarDatos($criterio,&$result))
    {
      if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N"))
      {
        $sql = "Select numord,codpre,refcom,sum(moncau) as moncau,sum(monret) as monret From OPDETORD Where NumOrd = '".$numord."' GROUP BY NUMORD,CODPRE,REFCOM";
        if (Herramientas::BuscarDatos($sql,&$opdetord))
        {
          $k=0;
          while ($k<count($opdetord))
          {
            $cpimppag= new Cpimppag();
            //$cpimppag->setRefpag($numche);
            $cpimppag->setRefpag($refpag);
            $cpimppag->setCodpre($opdetord[$k]['codpre']);
            $monimp = ($opdetord[$k]['moncau'] * $porcentaje) / 100;
            $cpimppag->setMonimp($monimp);
            $cpimppag->setMonaju(0);
            $cpimppag->setStaImp("A");
            $cpimppag->setRefere($numord);
            if (trim($opdetord[$k]['refcom'])=="")
              $newsql= "Select refere,refprc From CPIMPCAU Where RefCau = '".$numord."' And CodPre = '".$opdetord[$k]['codpre']."'";
            else
              $newsql= "Select refere,refprc From CPIMPCAU Where RefCau = '".$numord."' And CodPre = '".$opdetord[$k]['codpre']."' And Refere = '".$opdetord[$k]['refcom']."'";
            $resimpcau=array();
            if (Herramientas::BuscarDatos($newsql,&$resimpcau))
            {
              if ($resimpcau[0]['refere']!='') //No es Null
              {
              	$cpimppag->setRefcom($resimpcau[0]['refere']);
              }
              else
              {
              	$cpimppag->setRefcom('NULO');
              }

              if ($resimpcau[0]['refprc']!='')
              {
                $cpimppag->setRefprc($resimpcau[0]['refprc']);
              }
              else
              {
              	$cpimppag->setRefprc('NULO');
              }

            }
            else
            {
              $cpimppag->setRefcom('NULO');
              $cpimppag->setRefprc('NULO');
            }
            $cpimppag->save();
            $k++;
          }//while ($k<count($ordpag))
        }//if (Herramientas::BuscarDatos($sql,&$$opdetord))
      }//if !($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")
    }//if (!Herramientas::BuscarDatos($criterio,&$result))
  }


  public static function Genera_ImpPag_Compuesto($tscheemi,$grid,$refpag)
  {
    $j=0;
      $result=array();
      $opdetord=array();
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          //AGREGADO PARA QUE SE PUEDAN CANCELAR ORDENES DE PAGO QUE AFECTAN PRESUPUESTO Y OTRAS QUE NO AFECTAN
          $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$grid[$j]->getNumord()."' AND B.TIPCAU=A.TIPCAU";
          if (Herramientas::BuscarDatos($criterio,&$result))
          {
            if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N"))
            {
              $sql = "Select numord,codpre,refcom,sum(moncau) as moncau,sum(monret) as monret From OPDETORD Where NumOrd = '".$grid[$j]->getNumord()."' GROUP BY NUMORD,CODPRE,REFCOM";
              if (Herramientas::BuscarDatos($sql,&$opdetord))
              {
                $k=0;
                while ($k<count($opdetord))
                {
                  $cpimppag= new Cpimppag();
                  //$cpimppag->setRefpag($tscheemi->getNumche());
                  $cpimppag->setRefpag($refpag);
                  $cpimppag->setCodpre($opdetord[$k]['codpre']);
                  $Porcentaje = (($grid[$j]->getMontotalGrid() + $grid[$j]->getMondes()) * 100) / self::Obtener_Monto_Total_Orden($grid[$j]->getNumord());
                  $monimp = ($opdetord[$k]['moncau'] * $Porcentaje) / 100;
                  $cpimppag->setMonimp($monimp);
                  $cpimppag->setMonaju(0);
                  $cpimppag->setStaImp("A");
                  $cpimppag->setRefere($opdetord[$k]['numord']);
                  $newsql= "Select refere,refprc From CPIMPCAU Where RefCau = '".$opdetord[$k]['numord']."' And CodPre = '".$opdetord[$k]['codpre']."' And Refere = '".$opdetord[$k]['refcom']."'";
                  $resimpcau=array();
                  if (Herramientas::BuscarDatos($newsql,&$resimpcau))
                  {
                    if ($resimpcau[0]['refere']!="")//No es Null
                    {
                     $cpimppag->setRefcom($resimpcau[0]['refere']);
                    }else
                    {
                     $cpimppag->setRefcom('NULO');
                    }

                    if ($resimpcau[0]['refprc']!="")
                    {
                     $cpimppag->setRefprc($resimpcau[0]['refprc']);
                    }
                    else
                    {
                     $cpimppag->setRefprc('NULO');
                    }
                  }
                  else
                  {
                  	$cpimppag->setRefcom('NULO');
                    $cpimppag->setRefprc('NULO');
                  }
                  $cpimppag->save();
                  $k++;
                }//while ($k<count($ordpag))
              }//if (Herramientas::BuscarDatos($sql,&$$opdetord))
            }//if !($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")
          }//if (!Herramientas::BuscarDatos($criterio,&$result))
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while ($j<count($grid))
  }

  public static function Genera_ImpPag_De_Compromiso($numche,$grid,$refpag)
  {
    $j=0;
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $cpimppag= new Cpimppag();
          //$cpimppag->setRefpag($numche);
          $cpimppag->setRefpag($refpag);
          $cpimppag->setCodpre($grid[$j]->getCodpre());
          $cpimppag->setMonimp($grid[$j]->getMonporpagGrid());
          $cpimppag->setMonaju(0);
          $cpimppag->setStaImp("A");
          $cpimppag->setRefere('NULO');
          $cpimppag->setRefcom($grid[$j]->getRefcom());
          $newsql= "Select refere From CPIMPCOM Where RefCom = '".$grid[$j]->getRefcom()."' And CodPre = '".$grid[$j]->getCodpre()."'";
          $resimpcom=array();
          if (Herramientas::BuscarDatos($newsql,&$resimpcom))
          {
            if ($resimpcom[0]['refere']!='') //No es Null
            {
              $cpimppag->setRefprc($resimpcom[0]['refere']);
            }
            else
            {
              $cpimppag->setRefprc('NULO');
            }
          }
          else
          {
          	$cpimppag->setRefprc('NULO');
          }
          $cpimppag->save();
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while
  }

  public static function Genera_ImpPag_De_PreCompromiso($numche,$grid,$refpag)
  {
    $j=0;
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $cpimppag= new Cpimppag();
          //$cpimppag->setRefpag($numche);
          $cpimppag->setRefpag($refpag);
          $cpimppag->setCodpre($grid[$j]->getCodpre());
          $cpimppag->setMonimp($grid[$j]->getMonporpagGrid());
          $cpimppag->setMonaju(0);
          $cpimppag->setStaImp("A");
          $cpimppag->setRefere('NULO');
          $cpimppag->setRefcom('NULO');
          $cpimppag->setRefprc($grid[$j]->getRefprc());
          $cpimppag->save();
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while
  }


  public static function Genera_ImpPag_Pago_Directo($numche,$grid,$refpag)
  {
    $j=0;
      $result=array();
      while ($j<count($grid))
      {
        $cpimppag= new Cpimppag();
        //$cpimppag->setRefpag($numche);
        $cpimppag->setRefpag($refpag);
        $cpimppag->setCodpre($grid[$j]->getCodpre());
        $cpimppag->setMonimp($grid[$j]->getMonimp());
        $cpimppag->setMonaju(0);
        $cpimppag->setStaImp("A");
        $cpimppag->setRefere('NULO');
        $cpimppag->setRefprc('NULO');
        $cpimppag->setRefcom('NULO');
        $cpimppag->save();
        $j++;
      }//while
  }


  public static function Grabar_Datos($tscheemi,$Monto,$cedrif,$numche)
  {
    if (substr($tscheemi->getTipdoc(),0,2)=="CH")
    {
      $tscheeminew= new Tscheemi();
      $tscheeminew->setTipdoc($tscheemi->getTipdoc());
      $tscheeminew->setNumcue($tscheemi->getNumcue());
      $tscheeminew->setFecemi($tscheemi->getFecemi());

      if (trim($cedrif)!="") $tscheeminew->setCedrif($cedrif);
      $tscheeminew->setNumche($numche);
      $tscheeminew->setNombensus($tscheemi->getNombensus());
      $tscheeminew->setFecent($tscheemi->getFecemi());
      $tscheeminew->setMonche($Monto);
      $tscheeminew->setStatus("C");//Activo
      $tscheeminew->setCodent(null);
      $tscheeminew->setObsent(null);
      $tscheeminew->setFecanu($tscheemi->getFecemi());
      $tscheeminew->setCedrec(null);
      $tscheeminew->setNomrec(null);
      $tscheeminew->save();

      // Para desbloquear la cuenta Bancaria
      $q= new  Criteria();
  	  $result=OpdefempPeer::doSelectOne($q);
  	  if ($result)
  	  {
		  if ($result->getManbloqban()=='S')
		  {
             $t= new Criteria();
             $t->add(TsbloqbanPeer::NUMCUE,$tscheemi->getNumcue());
             TsbloqbanPeer::doDelete($t);
		  }
      }
    }
  }

  public static function Busca_CtaDes()
  {
      $c = new Criteria();
      $c->add(OpdefempPeer::CODEMP,'001');
      $dato = OpdefempPeer::doSelectOne($c);
      if ($dato)
      $CtaDcto=$dato->getCtades();
      else
      $CtaDcto='';
      return  $CtaDcto;
  }

  /**
   * Función Principal para guardar datos del formulario TesMovEmiChe
   * TODO Esta función (y todas las demás de su clase) deben retornar u
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $recepcion Object Tscheemi a guardar
   * @param $grid Array de Objects
   * @return void
   */

  public static function ActualizaOrdPag($tscheemi,$grid,$tippag,$despag,$numcomarr,$gencom,&$arraynumche,&$concom,&$arrcompro)
  {
      //////////////////////PAGO SIMPLE/////////////////////////////////////////////////////////////////////
    $arraynumche="";
    $concom=0;

    if ($tippag=='S') //Pago Simple
    {
      $x=$grid[0];
      $numche=$tscheemi->getNumche();
      $j=0;
      $concom=0;
     if ($gencom!="S") $minumcom=split("_",$numcomarr);

      while ($j<count($x))
      {
        $Monto=0;
        $MontRet=0;
        $MontDcto=0;
        $CtaDcto="";
        if ($x[$j]->getCheck()=="1")
        {
          $c = new Criteria();
          $c->add(BnubicaPeer::CODUBI,$x[$j]->getCoduni());
          $estatusubica = BnubicaPeer::doSelectOne($c);
          if ($estatusubica)
          {
            if ($estatusubica->getStacod()=='C')
            $GenerarOtro=true;
            else
            $GenerarOtro=false;
          }
          else
          {
            $GenerarOtro=false;
          }

          $x[$j]->setNumche($numche);
          $x[$j]->setCtaban($tscheemi->getNumcue());

          $DescOp=$x[$j]->getDesorden();
          $DesCtaDeb = "PAG.ORD. ". $x[$j]->getNumord();
          $DesCtaCre = $x[$j]->getNomben();
          $NumOrden = $x[$j]->getNumord();
          $TipCausad = $x[$j]->getTipcau();

          //El status ahora solo se pondra en "I" cuando el monto total de los cheques
          //sea igual al monto de la orden menos el monto de las retenciones
          $CtaPag = $x[$j]->getCtapag();

          if ($x[$j]->getMonret() > 0)
          {
            $MontRet = $MontRet + $x[$j]->getMonret();
            //Acumula_Ret GridBd1.TextMatrix(I, 1)
            // GridBd1.TextMatrix(I, 9) = Format(OPORDPAG!MonRet, "##.00")
          }//if ($x[$j]->getMonret() > 0)

          //$Monto =  $x[$j]->getMontotaltotal(); LUIS NO SE PARA QUE PUSO ESTA LINEA; SE DAÑO LO DE PAGOS PARCIALES
           $Monto =  $x[$j]->getMontotalGrid();

          if ($x[$j]->getMondes() > 0 )
          {
            $CtaDcto = self::Busca_CtaDes();
            $MontDcto = $MontDcto + $x[$j]->getMondes();
          }

          //Vamos a actualizar una tabla nueva llamada OPOrdChe que tiene tantos cheque se hayan hecho
          //a una orden de pago. Tambien actualizaremos el STATUS solo si se paga la orden completamente
          if ($gencom!="S")
          {
            $sql = "Select * from OPOrdChe where NumOrd='". $x[$j]->getNumord()."' and NumChe='". $numche ."' and CodCta='". $tscheemi->getNumcue() ."'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
              $mensaje="Esta Orden de Pago ya fue pagada con un cheque de igual número y la misma cuenta";
              //    exit();
            }
            else
            {
              $opordche = new Opordche();
              $opordche->setNumord($x[$j]->getNumord());
              $opordche->setNumche($numche);
              $opordche->setCodcta($tscheemi->getNumcue());
              $opordche->setTipmov($tscheemi->getTipdoc());
              $monpagopordche=$x[$j]->getMontotalGrid() + $x[$j]->getMondes();
              $opordche->setMonpag($monpagopordche);
              $opordche->save();

              //Ahora Actualizamos el Estatus de la Orden de Pago y el Monto Pagado de la Orden

              $monto1=$x[$j]->getMonord() - $x[$j]->getMonret() - self::ObtenerAjuste($x[$j]->getNumord());
              $monto2=$x[$j]->getMonpag() + $x[$j]->getMontotalGrid() + $x[$j]->getMondes();


              if (H::convnume($monto1) <= H::convnume($monto2))
              {
                $x[$j]->setStatus("I");
                $x[$j]->setFecpag($tscheemi->getFecemi());
              }
              $montoordpag= $x[$j]->getMonpag() + $x[$j]->getMontotalGrid();
              $x[$j]->setMonpag($montoordpag);
            }  /*else if (Herramientas::BuscarDatos($sql,&$result))*/
          }// if ($gencom!="S")

          ///////////////////////////////////////////////////////////////////////////////////////////
          $Porcentaje =  (($Monto + $MontDcto) * 100) / ($x[$j]->getMonord() - $x[$j]->getMonret());

            $OrdenDePago = $x[$j]->getNumord();
            if (trim($despag)!= "")
            $DescOp = $despag;

            if ($gencom=="S")
            {
               $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
			       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,&$msjuno,&$arrcompro);
			     }
			     else
			     {
                    self::Genera_Comprobante($numche,$tscheemi,$grid,$OrdenDePago,$tippag,$DescOp,$DesCtaDeb,
                                         $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$DescOp,$Monto,$MontRet,
										 "ordpag",&$arrcompro);
			     }
			   }

                $concom++;
            }
            else
            {
              $x[$j]->save();
              $numcom=$minumcom[$concom +1];
              $concom++;
              //print "Comprobante Nro. ". $numcom . " para el cheque ". $numche . " con la orden de pago ".$x[$j]->getNumord() ;

              self::Actualiza_Bancos($tscheemi,"A","C",$Monto,$numche);
              $refpago = self::Genera_Pagos($tscheemi,$x[$j]->getNumord(),$x[$j]->getCedrif(),$TipCausad,$DescOp,$Monto+$MontDcto,"O",$Porcentaje,$numche,$x);
              self::Genera_MovLib($tscheemi,$DescOp,$Monto,$numcom,$numche,$refpago);
              self::Grabar_Datos($tscheemi,$Monto,$x[$j]->getCedrif(),$numche);
              //Actualizar arreglos de Cheques, necesario para imprimir luego los cheques emitidos;
              if (trim($arraynumche)!="")
                $arraynumche=$arraynumche.",".$numche;
              else
                $arraynumche=$numche;

            }// if ($gencom="S")
            $CanRet = 0;

            $numchenew=intval($numche);
            $numchenew=$numchenew+1;
            $numche=str_pad($numchenew,8,"0",STR_PAD_LEFT);
        }//if ($x[$j]->getCheck()=="1")
          $j++;
      }  //End del ciclo que recorre el grid while ($j<count($x))

    }//if ($tippag=='S') Then //Pago Simple

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////PAGO COMPUESTO/////////////////////////////////////////////////////////////////////
    else if ($tippag=='C') //Pago Compuesto
    {
      $x=$grid[0];
      $j=0;
      $numche=$tscheemi->getNumche();
      $CtaDcto="";
      $Monto=0;
      $MontRet=0;
      $MontDcto=0;
      $grabar="N";
      $concom=0;

      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1")
        {
          $grabar="S";
          $c = new Criteria();
          $c->add(BnubicaPeer::CODUBI,$x[$j]->getCoduni());
          $estatusubica = BnubicaPeer::doSelectOne($c);
          if ($estatusubica)
          {
            if ($estatusubica->getStacod()=='C')
            $GenerarOtro=true;
            else
            $GenerarOtro=false;
          }
          else
          {
            $GenerarOtro=false;
          }

          $x[$j]->setNumche($numche);
          $x[$j]->setCtaban($tscheemi->getNumcue());

          if (trim($despag)!= "")
            $DescOp = $despag;
          else
            $DescOp = $x[$j]->getDesorden();

          $DesCtaDeb=$DescOp;
          $DesCtaCre = $x[$j]->getNomben();
          $NumOrden = $x[$j]->getNumord();
          $TipCausad = $x[$j]->getTipcau();
          //El status ahora solo se pondr� en "I" cuando el monto total de los cheques
          //sea igual al monto de la orden menos el monto de las retenciones
          $CtaPag = $x[$j]->getCtapag();

          $Monto =  $Monto + $x[$j]->getMontotalGrid();

          if ($x[$j]->getMonret() > 0)
          {
            $MontRet = $MontRet + $x[$j]->getMonret();
            //Acumula_Ret GridBd1.TextMatrix(I, 1)
            // GridBd1.TextMatrix(I, 9) = Format(OPORDPAG!MonRet, "##.00")
          }//if ($x[$j]->getMonret() > 0)


          if ($x[$j]->getMondes() > 0 )
          {
            $CtaDcto=self::Busca_CtaDes();
            $MontDcto = $MontDcto + $x[$j]->getMondes();
          }

         if ($gencom!="S")
         {
            //Vamos a actualizar una tabla nueva llamada OPOrdChe que tiene tantos cheque se hayan hecho
            //a una orden de pago. Tambien actualizaremos el STATUS solo si se paga la orden completamente
            $sql = "Select * from OPOrdChe where NumOrd='". $x[$j]->getNumord()."' and NumChe='". $numche ."' and CodCta='". $tscheemi->getNumcue() ."'";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
              $mensaje="Esta Orden de Pago ya fue pagada con un cheque de igual número y la misma cuenta";
            }
            else
            {
              $opordche = new Opordche();
              $opordche->setNumord($x[$j]->getNumord());
              $opordche->setNumche($numche);
              $opordche->setCodcta($tscheemi->getNumcue());
              $opordche->setTipmov($tscheemi->getTipdoc());


              $monpagopordche=$x[$j]->getMontotalGrid() + $x[$j]->getMondes();
              $opordche->setMonpag($monpagopordche);
              $opordche->save();

              //Ahora Actualizamos el Estatus de la Orden de Pago y el Monto Pagado de la Orden
                  $monto1=$x[$j]->getMonord() - $x[$j]->getMonret() - self::ObtenerAjuste($x[$j]->getNumord());
                  $monto2=$x[$j]->getMonpag() + $x[$j]->getMontotalGrid() + $x[$j]->getMondes();

                  if (H::convnume($monto1) <= H::convnume($monto2))
                  {
                    $x[$j]->setStatus("I");
                    $x[$j]->setFecpag($tscheemi->getFecemi());
                  }
                  $montoordpag= $x[$j]->getMonpag() + $x[$j]->getMontotalGrid();
                  $x[$j]->setMonpag($montoordpag);
            }  /*else if (Herramientas::BuscarDatos($sql,&$result))*/
         }//if ($gencom!="S")
          ///////////////////////////////////////////////////////////////////////////////////////////
          $numord=$x[$j]->getNumord();
          $cedrif=$x[$j]->getCedrif();
          $x[$j]->save();
          }//if ($x[$j]->getCheck()=="1")
          $j++;
      }  //End del ciclo que recorre el grid while ($j<count($x))

       if ($gencom=="S")
       {
               $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
			       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,&$msjuno,&$arrcompro);
			     }
			     else
			     {
                  self::Genera_Comprobante($numche,$tscheemi,$grid,"",$tippag,$DescOp,$DesCtaDeb,
                                    $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$DescOp,$Monto,$MontRet,"ordpag",
                                    &$arrcompro);
			     }
			   }
           $concom++;
       }
       else //if ($gencom=="S")
       {
          if ($grabar=="S")
          {
            $minumcom=split("_",$numcomarr);
            $numcom=$minumcom[1];
            $refpago = self::Genera_Pagos_Compuesto($tscheemi,$numord,$cedrif,$TipCausad,$DescOp,$numche,$x);
            self::Genera_MovLib($tscheemi,$DescOp,$Monto,$numcom,$numche,$refpago);
            self::Actualiza_Bancos($tscheemi,"A","C",$Monto,$numche);
            self::Grabar_Datos($tscheemi,$Monto,$cedrif,$numche);
            $arraynumche=$numche;
          }
       }// else if ($gencom=="S")

    }//if ($tippag=='C') Then //Pago Simple

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  }//end function ActualizaOrdpag

  public static function ActualizaCompro($tscheemi,$grid,$numcom,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro)
  {
      $x=$grid[0];
      $arraynumche="";
      $j=0;
      $numche=$tscheemi->getNumche();
      $MontOP = 0;
      $DescOp="";
      $TipCompro="";
      $grabar="N";
      $DescOp="";
      $DesCtaDeb="";
      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1")
        {
          $grabar="S";
          $c = new Criteria();
          $c->add(CpcomproPeer::REFCOM,$x[$j]->getRefcom());
          $compro = CpcomproPeer::doSelectOne($c);
          if ($compro)
          {
            $NumCompro=$compro->getRefcom();
            $DescOp=$compro->getDescom();
            $DesCtaDeb = $DescOp;
            $TipCompro = $compro->getTipcom();
            $MontOP = $MontOP + $x[$j]->getMonporpagGrid();
          }
        }//if ($x[$j]->getCheck()=="1")
        $j++;
      }  //End del ciclo que recorre el grid while ($j<count($x))

     if ($grabar=="S")
     {
       if ($gencom=="S")
       {
           $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
		       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",0,$MontOP,$ctapag,&$msjuno,&$arrcompro);
		     }
		     else
		     {
                self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$ctapag,"",0,"",$MontOP,0,"compro",&$arrcompro);
		     }
		    }
       }
       else //if ($gencom=="S")
       {
         self::Actualiza_Bancos($tscheemi,"A","C",$MontOP,$numche);
         $refpago = self::Genera_Pagos($tscheemi,$NumCompro,$tscheemi->getCedrif(),$TipCompro,$DescOp,$MontOP,"C",100,$numche,$x);
         self::Genera_MovLib($tscheemi,$DescOp,$MontOP,$numcom,$numche, $refpago);
         self::Grabar_Datos($tscheemi,$MontOP,$tscheemi->getCedrif(),$numche);
         $arraynumche=$numche;
       }
     }
  }//end del function


  public static function ActualizaPrecom($tscheemi,$grid,$numcom,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro)
  {
      $x=$grid[0];
      $arraynumche="";
      $j=0;
      $numche=$tscheemi->getNumche();
      $MontOP = 0;
      $DescOp="";
      $TipCompro="";
      $grabar="N";
      $DescOp="";
      $DesCtaDeb="";

      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1")
        {
          $grabar="S";
          $c = new Criteria();
          $c->add(CpprecomPeer::REFPRC,$x[$j]->getRefprc());
          $precom = CpprecomPeer::doSelectOne($c);
          if ($precom)
          {
            $NumPreCom=$precom->getRefprc();
            $DescOp=$precom->getDesprc();
            $DesCtaDeb = $DescOp;
            $TipPreCom = $precom->getTipprc();
            $MontOP = $MontOP + $x[$j]->getMonporpagGrid();
          }//if ($precom)
        }//if ($x[$j]->getCheck()=="1")
        $j++;
      }

      if ($grabar=="S")
      {
        if ($gencom=="S")
        {
           $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
		       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",0,$MontOP,$ctapag,&$msjuno,&$arrcompro);
		     }
		     else
		     {
               self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                             $desctacre,$ctapag,"",0,"",$MontOP,0,"precom",&$arrcompro);
		     }
		   }
        }
        else
        {
            self::Genera_MovLib($tscheemi,$DescOp,$MontOP,$numcom,$numche);
            self::Actualiza_Bancos($tscheemi,"A","C",$MontOP,$numche);
            $refpago = self::Genera_Pagos($tscheemi,$NumPreCom,$tscheemi->getCedrif(),$TipPreCom,$DescOp,$MontOP,"P",100,$numche,$x);
            self::Genera_MovLib($tscheemi,$DescOp,$MontOP,$numcom,$numche,$refpago);
            self::Grabar_Datos($tscheemi,$MontOP,$tscheemi->getCedrif(),$numche);
            $arraynumche=$numche;
        }
      }

  }//end Busca_Actualiza_PreCompromiso


  public static function ActualizaPagDir($tscheemi,$grid,$numcom,$concep,$descue,$condto,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro)
  {
      $x=$grid[0];
      $arraynumche="";
      $j=0;
      $numche=$tscheemi->getNumche();
      $MontOP=0;
      $CuentaDes="";
      $MontDcto=0;
      $CtaPag="";
      while ($j<count($x))
      {
        $MontOP = $MontOP + $x[$j]->getMonimp();
        $CtaPag=Herramientas::getX('CODPRE','Cpdeftit','Codcta',$x[$j]->getCodpre());
        //$CtaPag=$x[$j]->getCodpre();
        $j++;
      }//while
     $DescOp = $concep;
     $DesCtaDeb = $DescOp;
     $NumOrden = "";
     $TipCausad = "";
     if ($descue > 0)
     {
       $CuentaDes=self::Busca_CtaDes();
       $MontDcto = $descue;
     }//if ($descue > 0)


     //Comprob = NroCheque
     //Genera_Comprobante Comprob, MontOP - MontDcto, False
     //Comprob = COMPGENE
     if (count($x)>0)
     {
       if ($gencom=="S")
        {

           $total=$MontOP-Herramientas::convnume($MontDcto);
           $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
		       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",Herramientas::convnume($MontDcto),$total,$ctapag,&$msjuno,&$arrcompro);
		     }
		     else
		     {
           self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$CtaPag,$CuentaDes,Herramientas::convnume($MontDcto),$condto,
                                    $total,0,"pagdir",&$arrcompro);
		     }
		   }
        }
        else
        {
           $total=$MontOP-Herramientas::convnume($MontDcto);
           self::Actualiza_Bancos($tscheemi,"A","C",$total,$numche);
           $refpago = self::Genera_Pagos($tscheemi,"",$tscheemi->getCedrif(),"",$DescOp,$MontOP,"D",100,$numche,$x);
           self::Genera_MovLib($tscheemi,$DescOp,$total,$numcom,$numche,$refpago);
           self::Grabar_Datos($tscheemi,$total,$tscheemi->getCedrif(),$numche);
           $arraynumche=$numche;
        }
     }
  }


  public static function ActualizaPagExtPre($tscheemi,$numcom,$concpnrn,$montpnrn,$dctopnrn,$condpnrn,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro)
  {
     $arraynumche="";
     $CtaDcto="";
     $DescOp = $concpnrn;
     $DesCtaDeb = $DescOp;
     $MontOP = $montpnrn;
     $MontDcto=0;
     $grid=array();
     $NumOrden = "";
     $TipCausad = "";
     $numche=str_pad($tscheemi->getNumche(),8,"0",STR_PAD_LEFT);
     if ($dctopnrn > 0)
     {
       $CtaDcto=self::Busca_CtaDes();
       $MontDcto = $dctopnrn;
     }//if ($dctopnrn > 0)

     // Comprob = NroCheque
     // Genera_Comprobante Comprob, MontOP - MontDcto, False
     // Comprob = COMPGENE

      if ($gencom=="S")
        {
           $total=Herramientas::convnume($MontOP)-Herramientas::convnume($MontDcto);
          $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
		       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",Herramientas::convnume($MontDcto),$total,$ctapag,&$msjuno,&$arrcompro);
		     }
		     else
		     {
               self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$ctapag,$CtaDcto,Herramientas::convnume($MontDcto),$condpnrn,
                                    $total,0,"pagnopre",&$arrcompro);
		     }
		   }
        }
        else
        {
           $total=Herramientas::convnume($MontOP)-Herramientas::convnume($MontDcto);
           self::Genera_MovLib($tscheemi,$DescOp,$total,$numcom,$numche);
           self::Actualiza_Bancos($tscheemi,"A","C",$total,$numche);
           self::Grabar_Datos($tscheemi,$total,$tscheemi->getCedrif(),$numche);
           $arraynumche=$numche;
        }
  }

  public static function  Verificar_Comprobante($Comprob)
  {
    $sql = "Select * From CONTABC Where NumCom = '". $Comprob ."' Order by NumCom";
    if (Herramientas::BuscarDatos($sql,&$result))
          return true;
    else
        return false;
  }

  public static function  Genera_Comprobante($numcomcon,$tscheemi,$grid,$ordendepago,$tippag,$DescOp,$DesCtaDeb,
                                             $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$ConDto,$Monto,$MonRet,
                                             $operacion,&$arrcompro)
  {
   //$Comprob=$numcomcon;
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
    	 $Comprob=$numcomcon;
    }else $Comprob = "########";




   if (true)
   {
      $ctas="";$movs="";$montos="";$desc="";
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $SQL = "Select pagrepcaj,ctarepcaj,pagcheant,ctacheant from TSDefRenGas";
      if (Herramientas::BuscarDatos($SQL,&$result))
      {
         if (($tscheemi->getTipdoc()==$result[0]['pagrepcaj'])  &&  ($result[0]['ctarepcaj'] != "" ))
            $CtaPag = $result[0]['ctarepcaj'];
         else if ($tscheemi->getTipdoc()== $result[0]['pagcheant'] && trim($result[0]['ctacheant']) != "" )
            $CtaPag = $result[0]['ctacheant'];

      }//if (Herramientas::BuscarDatos($SQL,&$result))
      if ($tippag=='S') //Pago Simple
      {
        //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(Monto + MontDcto)
        $ctas = $CtaPag;
        $desc=$DesCtaDeb;
        $movs="D";
        $montos=$Monto+$MontDcto; //+$MonRet;
      }
      else if ($tippag=='C')//pagos compuestos
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
               $sql = "Select ctapag From OPORDPAG Where NumOrd = '". $x[$j]->getNumord() ."' Order by NumOrd";
               if (Herramientas::BuscarDatos($sql,&$result))
               {
                  $CtaPag = $result[0]['ctapag'];
               }
             //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(GridBd1.TextMatrix(I, 5))
             if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
             if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
             if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
             $montot=$x[$j]->getMontotalGrid()+$x[$j]->getMondes();
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
          }
          $j++;
        }//while
      }//else if ($tippag=='C')//pagos compuestos

       if ($operacion=='ordpag')
       {
          if ($MontDcto > 0)
          {
            // Comprobante.IncluirAsiento CtaDcto, DescOp, Comprob, "C", CDbl(MontDcto)
            if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
            if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
          }//if ($MontDcto > 0)
       }

        if ($operacion=='pagdir')
        {
          if ($MontDcto > 0)
          {
            // //Comprobante.IncluirAsiento CtaDcto, ConcDescto.Text, Comprob, "C", CDbl(MontDcto)
            if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
            if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
          }//if ($MontDcto > 0)
        }//if ($operacion=='pagdir')

        if ($operacion=='pagnopre')
         {
           if ($MontDcto > 0)
           {
              //Comprobante.IncluirAsiento CtaDcto, ConDPnrn.Text, Comprob, "C", CDbl(MontDcto)
              if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
              if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
              if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
              if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
           }//if ($MontDcto > 0)
         }

        //Comprobante.IncluirAsiento CtaBan, DesCtaCre, Comprob, "C", CDbl(Monto)
      if (trim($ctas)!="") $ctas=$ctas."_".$CtaBan; else  $ctas = $CtaBan;
      if (trim($desc)!="") $desc=$desc."_".$DesCtaCre; else  $desc = $DesCtaCre;
      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
      if (trim($montos)!="") $montos=$montos."_".$Monto; else $montos=$Monto;
      //--------------------------Generando la Parte de Las Retenciones --------------------------------
      if ($operacion=='ordpag')
      {
      //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(MontRet)
       if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
       if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
       if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
       if (trim($montos)!="") $montos=$montos."_".$MonRet; else $montos=$MonRet;
       if ($tippag=='S') //Pago Simple
       {
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,&$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,&$optipret))
                  {
                    //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                    if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                    if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                    if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                    if (trim($montos)!="") $montos=$montos."_".$result[$k]['montoret']; else $montos=$result[$k]['montoret'];
                  }
                $k++;
              } //while ($k<count($result))
            }//buscar datos
       }
       else if ($tippag=='C')//pagos compuestos
       {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where NumOrd= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,&$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                {
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,&$optipret))
                    {
                      //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                      if (trim($montos)!="") $montos=$montos."_".$resultado[$k]['montoret']; else $montos=$resultado[$k]['montoret'];
                    }
                  $k++;
                } //while ($k<count($result))
              }//buscar datos
          }//if ($x[$j]->getCheck()=="1")
          $j++;
        }//while
       }//else if ($tippag=='C')//pagos compuestos
       // Comprobante.CargarComprobante
      }//if ($operacion=='ordpag')


      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      //Cabecera del Comprobante
      $clscommpro->setNumcom($Comprob);
      $clscommpro->setReftra($numcomcon);
      $clscommpro->setFectra(date("d/m/Y",strtotime($tscheemi->getFecemi())));
      $clscommpro->setDestra($DescOp);
      //Detalle (Asientos Contables)
      $clscommpro->setCtas($ctas);
      $clscommpro->setDesc($desc);
      $clscommpro->setMov($movs);
      $clscommpro->setMontos($montos);
      $clscommpro->setError("N");
      $arrcompro[]=$clscommpro;
     }
     ///////////////////////////////////////////////////////////////////////////////
     else
     {
        $mensaje="No se pudo generar el comprobante contable. El Número del Comprobante: ". $Comprob . " ya existe";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;
     }
  }//end function Genera_Comprobante


  public static function validarDisponibilidadPresu($grid,&$msj)
  {
    $validardisponibilidad=true;
    $x=$grid[0];
    $i=0;
    while ($i<count($x))
    {
     $codigo=$x[$i]->getCodpre();
     if (!OrdendePago::montoValido($i,$x[$i]->getMonimp(),'N',$codigo,1,&$msj,&$mondis,&$sobregiro))
     {
      $validardisponibilidad=false;
      break;
     }
     $i++;
    }
    return $validardisponibilidad;
  }

  public static function grabarComprobanteAlc($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,&$msjuno,&$arrcompro)
  {
    $mensaje="";
    $numerocomprob= '########';
    $reftra = str_pad($tscheemi->getNumche(),8,"0",STR_PAD_LEFT);
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
    $msjdos="";
    $mont=0;

     if ($tippag=='S') //Pago Simple
     {
     	$mont=$Monto+$MontDcto;
     }
     else if ($tippag=='C')//pagos compuestos
     {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
             $mont= $mont + ($x[$j]->getMontotalGrid()+$x[$j]->getMondes());
          }
          $j++;
        }
     }

    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$CtaPag);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta=$dato->getCodcta();
        $tipo='D';
        $des="";
        $monto=$mont;
      }else {
      	 $mensaje="El Código Contable asociado a Cuenta de Gastos por Pagar no es válido";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

        return true;}
    }else {
    	$mensaje="El Código Contable asociado al Beneficiario ".$CtaPag." no posee Relacion para Asientos de Ordenes";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

        return true;}

   $b= new Criteria();
   $b->add(TsdefbanPeer::NUMCUE,$tscheemi->getNumcue());
   $reg1= TsdefbanPeer::doSelectOne($b);
   if ($reg1)
   {
   	 $cuenta=$reg1->getCodcta();
   }else $cuenta='';

    $x= new Criteria();
    $x->add(ContabbPeer::CODCTA,$cuenta);
    $reg2= ContabbPeer::doSelectOne($x);
    if ($reg2)
    {
       $codigocuenta2=$cuenta;
	   $tipo2='C';
	   $des2="";
	   $monto2=$mont;
    }else {
    	$mensaje="El Código Contable asociado a la Cuenta Bancaria no es válido";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

    	return true;}


    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($tscheemi->getFecemi())));
    $clscommpro->setDestra($DescOp);
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $clscommpro->setError("N");
    $arrcompro[]=$clscommpro;

    return true;
  }
}
?>