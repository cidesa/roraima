<?php

class Cuentasxcobrar {
  public static function salvarDocumentos($cobdocume, $grid, $grid2)
  {
  	$cobdocume->setStadoc('A');
    $cobdocume->save();
    self::Grabar_Recargos_Documentos($cobdocume, $grid);
    self::Grabar_Descuentos_Documentos($cobdocume, $grid2);
  }

   public static function Grabar_Recargos_Documentos($cobdocume, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodrec()!="")
       {
       	$x[$j]->setRefdoc($cobdocume->getRefdoc());
       	$x[$j]->setCodcli($cobdocume->getCodcli());
       	$x[$j]->setFecrec($cobdocume->getFecemi());
       	$x[$j]->save();
       }
       $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

    }

    public static function Grabar_Descuentos_Documentos($cobdocume, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCoddes()!="")
       {
       	$x[$j]->setRefdoc($cobdocume->getRefdoc());
       	$x[$j]->setCodcli($cobdocume->getCodcli());
       	$x[$j]->setFecrec($cobdocume->getFecemi());
       	$x[$j]->save();
       }
       $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

    }

    public static function salvarTransacciones($cobtransa,$grid,$grid2,$grid3,$grid4,$numcom)
    {
      self::grabarPago($cobtransa,$numcom);
      self::grabarDetallesPago($cobtransa,$grid,$grid2,$grid3,$grid4);
      self::grabarDetallesForpag($cobtransa,$grid2);
    }

    public static function grabarPago($cobtransa,$numcom)
    {
      $cobtransa->setNumcom($numcom);
      $cobtransa->setMontra($cobtransa->getTottra());
      $cobtransa->setFeccom($cobtransa->getFectra());
      if ($cobtransa->getTotmondes()>0)
      {
      	$cobtransa->setTotdsc($cobtransa->getTotmondes());
      }else $cobtransa->setTotdsc(0);

      if ($cobtransa->getTotmonrec()>0)
      {
      	$cobtransa->setTotrec($cobtransa->getTotmonrec());
      }else $cobtransa->setTotrec(0);
      $cobtransa->setStatus('A');
      $cobtransa->save();
    }


  public static function  Verificar_Comprobante($Comprob)
  {
    $sql = "Select * From CONTABC Where NumCom = '". $Comprob ."' Order by NumCom";
    if (Herramientas::BuscarDatos($sql,&$result))
          return true;
    else
        return false;
  }

	public static function generar_comprobante($cobdocume,$gridrec,$griddes,&$arrcompro)
	{
 	$numerocomprobante = Comprobante::Buscar_Correlativo();
	$ctas="";$movs="";$montos="";$desc="";
    if (!self::Verificar_Comprobante($numerocomprobante))
    {
	    //Comprobante.IncluirAsiento CtaCli, DesDoc, Comprob, "D", CDbl(monto)
        $ctas = $cobdocume->getCodctacli();
        $desc=$cobdocume->getDesdoc();
        $movs="D";
        $montos=$cobdocume->getSaldoc();

		//Descuentos
	    $x=$griddes[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCoddes()!="")
          {
          	//primero busco la cuenta contable asociada al descuento
          	$codctades="";
          	$c = new Criteria();
          	$c->add(FadesctoPeer::CODDESC,$x[$j]->getCoddes());
	       	$datos = FadesctoPeer::doSelectOne($c);
	        if($datos)
	        {
	        	$codctades=$datos->getCodcta();
	        }
            if ($codctades!="")
            {
             //Comprobante.IncluirAsiento GridDescuentos.TextMatrix(I, 3), DesDoc, Comprob, "D", CDbl(GridDescuentos.TextMatrix(I, 1))
             if (trim($ctas)!="") $ctas=$ctas."_".$codctades; else  $ctas = $codctades;
             if (trim($desc)!="") $desc=$desc."_".$cobdocume->getDesdoc(); else  $desc = $cobdocume->getDesdoc();
             if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
             $montot=$x[$j]->getMondes();
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
            }
          }
          $j++;
        }//while

        //Recargos
	    $x=$gridrec[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCodrec()!="")
          {
          	//primero busco la cuenta contable asociada al descuento
          	$codctades="";
          	$c = new Criteria();
          	$c->add(CarecargPeer::CODRGO,$x[$j]->getCodrec());
	       	$datos = CarecargPeer::doSelectOne($c);
	        if($datos)
	        {
	        	$codctarec=$datos->getCodcta();
	        }
            if ($codctarec!="")
            {
             //Comprobante.IncluirAsiento GridRecargos.TextMatrix(I, 3), DesDoc, Comprob, "C", CDbl(GridRecargos.TextMatrix(I, 1))
             if (trim($ctas)!="") $ctas=$ctas."_".$codctarec; else  $ctas = $codctarec;
             if (trim($desc)!="") $desc=$desc."_".$cobdocume->getDesdoc(); else  $desc = $cobdocume->getDesdoc();
             if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
             $montot=$x[$j]->getMonrec();
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
            }
          }
          $j++;
        }//while

    $codctades="";
    $ctas=$ctas."_".$codctades;
    $desc=$desc."_".$cobdocume->getDesdoc();
    $movs=$movs."_"."C";
    $mon=$cobdocume->getMondoc();
    $montos=$montos."_".$mon;

    $clscommpro=new Comprobante();
	$clscommpro->setGrabar("N");
	$clscommpro->setNumcom($numerocomprobante);
	$reftra=substr($cobdocume->getRefdoc(),2,8);
	$clscommpro->setReftra($reftra);
	$clscommpro->setFectra(date("d/m/Y",strtotime($cobdocume->getFecemi())));
	$clscommpro->setDestra($cobdocume->getDesdoc());
	$clscommpro->setCtas($ctas);
	$clscommpro->setDesc($desc);
	$clscommpro->setMov($movs);
	$clscommpro->setMontos($montos);
	$arrcompro[]=$clscommpro;

    }// if (!self::Verificar_Comprobante($numerocomprobante))
	else
     {
        $mensaje="No se pudo generar el comproban te contable. El Número del Comprobante: ". $numerocomprobante . " ya existe";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;
     }


}// fin generar_comprobante

    public static function grabarDetallesPago($cobtransa,$grid1,$grid2,$grid3,$grid4)
    {
      $a= new Criteria();
      $a->add(CobdettraPeer::NUMTRA,$cobtransa->getNumtra());
      CobdettraPeer::doDelete($a);

      $x=$grid1[0];
	  $j=0;
	  if (count($x)>0)
	  {
		  while ($j<count($x))
		  {

		  	if ($x[$j]->getMonpag()>0)
		  	{
              $cobdettra= new Cobdettra();
              $cobdettra->setNumtra($cobtransa->getNumtra());
              $cobdettra->setCodcli($cobtransa->getCodcli());
              $cobdettra->setRefdoc($x[$j]->getRefdoc());
              $cobdettra->setCorrel($j);
              $cobdettra->setMonpag($x[$j]->getMonpag());

              $auxdescuento=0;
              $cobdettra->setMondsc($x[$j]->getMondsc());
              if ($x[$j]->getMondsc()>0)
              {
              	$auxdescuento=$x[$j]->getMondsc();
              }

              $auxrecargo=0;
              $cobdettra->setMonrec($x[$j]->getMonrec());
              if ($x[$j]->getMonrec()>0)
              {
              	$auxrecargo=$x[$j]->getMonrec();
              }

              $cobdettra->setTottra($x[$j]->getMonpag() + $x[$j]->getMonrec() - $x[$j]->getMonrec());
              $cobdettra->save();

              if ($auxdescuento>0)
              {
              	self::grabarDescuentosTransaccion($cobtransa,$x[$j]->getRefdoc(),$grid4);
              }

              if ($auxrecargo>0)
              {
              	self::grabarRecargosTransaccion($cobtransa,$x[$j]->getRefdoc(),$grid3);
              }
		  	}
		    $j++;
		  }
		self::actualizaFactura($cobtransa,$grid1,$grid2);
	  }

	  $z=$grid1[1];
	  $j=0;
	  while ($j<count($z))
	  {
	      $z[$j]->delete();
	      $j++;
	  }
    }

    public static function grabarDescuentosTransaccion($cobtransa,$refdoc,$descuentos)
    {
       $a= new Criteria();
       $a->add(CobdestraPeer::REFDOC,$refdoc);
       $a->add(CobdestraPeer::CODCLI,$cobtransa->getCodcli());
       $a->add(CobdestraPeer::NUMTRA,$cobtransa->getNumtra());
       CobdestraPeer::doDelete($a);

	   $z=$descuentos[0];
	   $l=0;
	   if (count($z)>0)
	   {
		 while ($l<count($z))
		 {
           if ($z[$l]->getMondes()!="0.00" && $z[$l]->getRefdoc()==$refdoc && $z[$l]->getCoddes()!="")
           {
           	$z[$l]->setNumtra($cobtransa->getNumtra());
           	$z[$l]->setRefdoc($refdoc);
           	$z[$l]->setCodcli($cobtransa->getCodcli());
           	$z[$l]->setFecdes($cobtransa->getFectra());
           	$z[$l]->save();
           }
		  $l++;
		 }
	   }

	   $p=$descuentos[1];
	   $j=0;
	   while ($j<count($p))
	   {
	      $p[$j]->delete();
	      $j++;
	   }
    }

    public static function grabarRecargosTransaccion($cobtransa,$refdoc,$recargos)
    {
       $a= new Criteria();
       $a->add(CobrectraPeer::REFDOC,$refdoc);
       $a->add(CobrectraPeer::CODCLI,$cobtransa->getCodcli());
       $a->add(CobrectraPeer::NUMTRA,$cobtransa->getNumtra());
       CobrectraPeer::doDelete($a);

	   $z=$recargos[0];
	   $l=0;
	   if (count($z)>0)
	   {
		 while ($l<count($z))
		 {
           if ($z[$l]->getMonrec()!="0.00" && $z[$l]->getRefdoc()==$refdoc && $z[$l]->getCodrec()!="")
           {
           	$z[$l]->setNumtra($cobtransa->getNumtra());
           	$z[$l]->setRefdoc($refdoc);
           	$z[$l]->setCodcli($cobtransa->getCodcli());
           	$z[$l]->setFecdes($cobtransa->getFectra());
           	$z[$l]->save();
           }
		  $l++;
		 }
	   }

   	   $p=$recargos[1];
	   $j=0;
	   while ($j<count($p))
	   {
	      $p[$j]->delete();
	      $j++;
	   }
    }

    public static function actualizaFactura($cobtransa,$documentos,$grid2)
    {
      $x=$documentos[0];
	  $j=0;
	  if (count($x)>0)
	  {
		  while ($j<count($x))
		  {
            if ($x[$j]->getMonpag()>0)
		  	{
		  	  $c= new Criteria();
		  	  $c->add(CobdocumePeer::REFDOC,$x[$j]->getRefdoc());
		  	  $c->add(CobdocumePeer::CODCLI,$cobtransa->getCodcli());
		  	  $datos= CobdocumePeer::doSelectOne($c);
		  	  if ($datos)
		  	  {
                $auxsumfac=0;
                $reffac=$datos->getReffac();
                $datos->setAbodoc($datos->getAbodoc() + $x[$j]->getMonpag());
                $datos->setSaldoc($datos->getSaldoc() - $x[$j]->getMonpag());
                $datos->save();
                if ($reffac!="")
                {
                  if ($cobtransa->getHayingreso()=='S')
                  {
                  	$b= new Criteria();
                  	$b->add(CiregingPeer::REFING,$reffac);
                  	$b->add(CiregingPeer::FECING,$cobtransa->getFectra());
                  	$reg= CiregingPeer::doSelectOne($b);
                  	if (!$reg)
                  	{
                  	  self::grabarIngreso($cobtransa,$reffac,$x[$j]->getMonpag(),$x[$j]->getMonrec(),$x[$j]->getMondes(),$grid2);
                  	  self::grabarImping($cobtransa,$reffac,$x[$j]->getMonpag(),$x[$j]->getMonrec(),$x[$j]->getMondes());
                  	}
                  }
                }
		  	  }
		  	}
		  	$j++;
		  }
	  }
    }


  public static function grabarIngreso($cobtransa,$reffac,$monpag,$monrec,$mondes,$grid2)
  {
     $r= new Criteria();
     $r->add(CiregingPeer::REFING,$reffac);
     $r->add(CiregingPeer::FECING,$cobtransa->getFectra());
     $reg= CiregingPeer::doSelectOne($r);
     if (!$reg)
     {
       $cireging= new Criteria();
       $cireging->setRefing($reffac);
       $cireging->setCodtip('FAC');
       $cireging->setFecing($cobtransa->getFectra());
       $cireging->setAnoing(substr($cobtransa->getFectra(),0,4));
       $cireging->setDestra($cobtransa->getDestra());

       $a= new Criteria();
       $a->add(FaclientePeer::RIFPRO,$cobtransa->getCodcli());
       $regi= FaclientePeer::doSelectOne($a);
       if ($regi)
       { $cireging->setRifcon($regi->getCodcli()); }
       else { $cireging->setRifcon($cobtransa->getCodcli()); }
       $cireging->setDesanu(null);
       $cireging->setMoning($monpag);
       $cireging->setMonrec($monrec);
       $cireging->setMondes($mondes);
       $cireging->setMontot($monpag + $monrec - $mondes);

       $i=0;
       $y=$grid2[0];
       while ($i<count($y))
       {
         $d= new Criteria();
         $d->add(FatippagPeer::ID,$y[$i]->getFatippagId());
         $reg= FatippagPeer::doSelectOnr($d);
         if ($reg)
         {
           if ($reg->getGenmov()=='S' && $y[$i]->getCodban()!="")
           {
             $cireging->setTipmov($y[$i]->getCodtip());
             $cireging->setCtaban($y[$i]->getCodban());
           }
         }
       	$i++;
       }
       $cireging->setPrevis('S');
       $cireging->setStaing('A');
       $cireging->save();
     }
  }

  public static function grabarImping($cobtransa,$reffac,$monpag,$montorec,$montodes)
  {
  	$c= new Criteria();
  	$c->add(CpimpingPeer::REFING,$reffac);
  	CpimpingPeer::doDelete($c);

    $previsto=true;
    $result=array();
    $sql="SELECT SUM(A.TOTART) as monfac, SUM(A.MONRGO) as monrec FROM FAARTFAC A,CAREGART B WHERE A.REFFAC='".$reffac."' AND A.CODART=B.CODART";
    if(Herramientas :: BuscarDatos($sql, &$result))
    {
      $monfac=$result[0]["monfac"];
      $monrec=$result[0]["monrec"];
    }
    $result2=array();
    $sql2="SELECT B.CODING as coding,SUM(A.MONRGO) as MONREC,SUM(A.TOTART) as MONFAC FROM FAARTFAC A,CAREGART B WHERE A.REFFAC='".$reffac."' AND A.CODART=B.CODART GROUP BY B.CODING";
    if(Herramientas :: BuscarDatos($sql, &$result2))
    {
      foreach ($result2 as $datos)
      {
         $ciimping= new Ciimping();
         $ciimping->setRefing($reffac);
         $ciimping->setFecing($cobtransa->getFectra());
         $ciimping->setCodpre($datos["coding"]);
         $monto=(($datos["monfac"]/$monfac)*$monpag);
         $ciimping->setMoning($monto);
         $ciimping->setMonrec($montorec);
         $ciimping->setMondes($montodes);
         $monto2=(($datos["monfac"]/$monfac)*$monpag - $montodes + $montorec);
         $ciimping->setMontot($monto2);
         $ciimping->setMonaju(0);
         $ciimping->setStaimp("A");
         $ciimping->save();
      }
    }
  }


  public static function generarComprobante($cobtransa,$formapagos,$recargos,$descuentos,&$msjuno,&$arrcompro)
  {
  	$refnumtra="CC".substr($cobtransa->getNumtra(),4,6);
    $numcom='########';;
    $reftra=$refnumtra;
    $codigocuenta=""; $tipo=""; $des=""; $monto="";  $codigocuentas=""; $tipo1=""; $desc="";
    $monto1=""; $codigocuenta2=""; $tipo2=""; $des2=""; $monto2=""; $cuentas=""; $tipos="";
    $montos=""; $descr=""; $msjuno="";

    $r= new Criteria();
    $r->add(FatipmovPeer::ID,$cobtransa->getFatipmovId());
    $dat= FatipmovPeer::doSelectOne($r);
    if ($dat)
    {
      $debcre=$dat->getDebcre();
      $ctacon=$dat->getCodcta();
    }

    $e= new Criteria();
    $e->add(FaclientePeer::CODPRO,$cobtransa->getCodcli());
    $dat1= FaclientePeer::doSelectOne($e);
    if ($dat1)
    {
    	$ctacli=$dat1->getCodcta();
    }

    if ($debcre=='C')
    {
      $x=$formapagos[0];
      $j=0;
      $y=0;
      if (count($x)>0)
      {
	      while ($j<count($x))
	      {
            if ($x[$j]->getMonpag()>0)
            {
              $codigocuenta=$ctacon;
              $tipo='D';
              $des="";
              $moncau=$x[$j]->getMonpag();
              $monto=$moncau;

              if ($y==0)
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
	          $y++;
            }
	    	$j++;
	      }
      }

      $z=$descuentos[0];
	  $a=0;
      if (count($z)>0)
      {
	      while ($a<count($z))
	      {
            if ($z[$a]->getMondes()!="")
            {
             if ($z[$a]->getMondes()>0 && $z[$a]->getCoddes()!="")
             {
              $codigocuenta=$z[$a]->getCodcon();
              $tipo='D';
              $des="";
              $moncau=$z[$a]->getMondes();
              $monto=$moncau;

              if ($y==0)
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
	          $y++;
             }
            }
	    	$a++;
	      }
      }

      if ($cobtransa->getTotmonpag()>0)
      {
      	$codigocuenta2=$ctacli;
      	$tipo2='C';
        $des2="";
        $b=$cobtransa->getTotmonpag();
        $monto2=$b;
      }

      $y=$recargos[0];
      $l=0;
      if (count($y)>0)
      {
	      while ($l<count($y))
	      {
            if ($y[$l]->getMonrec()!="")
            {
             if ($y[$l]->getMonrec()>0 && $y[$l]->getCodrec()!="")
             {
              $codigocuenta=$y[$l]->getCodcta();
              $tipo='C';
              $des="";
              $moncau=$y[$l]->getMonrec();
              $monto=$moncau;

              if ($y==0)
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
	          $y++;
             }
            }
	      $l++;
	      }
      }
    }
    else
    {

      if ($cobtransa->getTotmonpag()>0)
      {
      	$codigocuenta2=$ctacli;
      	$tipo2='D';
        $des2="";
        $b=$cobtransa->getTotmonpag();
        $monto2=$b;
      }

      $y=$recargos[0];
	  $l=0;
	  $t=0;
      if (count($y)>0)
      {
	      while ($l<count($y))
	      {
            if ($y[$l]->getMonrec()!="")
            {
             if ($y[$l]->getMonrec()>0 && $y[$l]->getCodrec()!="")
             {
              $codigocuenta=$y[$l]->getCodcta();
              $tipo='D';
              $des="";
              $moncau=$y[$l]->getMonrec();
              $monto=$moncau;

              if ($t==0)
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
	          $t++;
             }
            }
	      $l++;
	      }
      }

      $x=$formapagos[0];
      $j=0;
      if (count($x)>0)
      {
          while ($j<count($x))
	      {
            if ($x[$j]->getMonpag()>0)
            {
              $codigocuenta=$ctacon;
              $tipo='C';
              $des="";
              $moncau=$x[$j]->getMonpag();
              $monto=$moncau;

		      if ($t==0)
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
		      $t++;
            }
	    	$j++;
	      }
      }

      $z=$descuentos[0];
      $a=0;
      if (count($z)>0)
      {
	      while ($a<count($z))
	      {
            if ($z[$a]->getMondes()!="")
            {
             if ($z[$a]->getMondes()>0 && $z[$a]->getCoddes()!="")
             {
              $codigocuenta=$z[$a]->getCodcon();
              $tipo='C';
              $des="";
              $moncau=$z[$a]->getMondes();
              $monto=$moncau;

              if ($t==0)
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
	          $t++;
             }
            }
	    	$a++;
	      }
      }
    }

    $cuentas=$codigocuenta2.'_'.$codigocuentas;
    $descr=$des2.'_'.$desc;
    $tipos=$tipo2.'_'.$tipo1;
    $montos=$monto2.'_'.$monto1;

	$clscommpro=new Comprobante();
	$clscommpro->setGrabar("N");
	$clscommpro->setNumcom($numcom);
	$clscommpro->setReftra($reftra);
	$clscommpro->setFectra(date("d/m/Y",strtotime($cobtransa->getFectra())));
	$clscommpro->setDestra($cobtransa->getDestra());
	$clscommpro->setCtas($cuentas);
	$clscommpro->setDesc($descr);
	$clscommpro->setMov($tipos);
	$clscommpro->setMontos($montos);
	$arrcompro[]=$clscommpro;
  }

  public static function verificarHijos($numtra,&$msj)
  {
  	$msj="";
    $a= new Criteria();
    $a->add(CobtransaPeer::NUMTRA,$numtra);
    $resul= CobtransaPeer::doSelectOne($a);
    if ($resul)
    {
      $snumcom=$resul->getNumcom();
      $sfeccom=$resul->getFeccom();
    }

    $b= new Criteria();
    $b->add(CobdetforPeer::NUMTRA,$numtra);
    $reg= CobdetforPeer::doSelect($b);
    if ($reg)
    {
      foreach ($reg as $obj)
      {
      	$val=strlen($obj->getNumide());

        $c= new Criteria();
        $c->add(TsmovlibPeer::NUMCUE,$obj->getCodban());
        $c->add(TsmovlibPeer::REFLIB,substr($obj->getNumide(),4,$val));
        $c->add(TsmovlibPeer::TIPMOV,substr($obj->getNumide(),0,4));
        $data= TsmovlibPeer::doSelectOne($c);
        if ($data)
        {
          if ($data->getStacon()=='C')
          {
          	$hayrelpag=true;
          	$msj="No se Puede Eliminar o Anular esta Transacción porque el Movimiento segun libro Asociado Conciliado";
            return true;

          }
        }
      }
    }

    $e= new Criteria();
    $e->add(ContabcPeer::NUMCOM,$snumcom);
    $e->add(ContabcPeer::FECCOM,$sfeccom);
    $registro= ContabcPeer::doSelectOne($e);
    if ($registro)
    {
      if ($registro->getStacom()=='A')
      {
        $msj="No Puede Anular o Eliminar la Transacción ya que el Comprobante Contable está actualizado";
        return true;
      }
    }
  return false;
  }

  public static function eliminarIngreso($refdoc,$fectra)
  {
     $r= new Criteria();
     $r->add(CiregingPeer::REFING,$refdoc);
     $r->add(CiregingPeer::FECING,$fectra);
     $reg= CiregingPeer::doSelectOne($r);
     if ($reg)
     {
     	$t= new Criteria();
 	    $t->add(CiimpingPeer::REFING,$refdoc);
 	    $t->add(CiimpingPeer::FECING,$fectra);
 	    CiimpingPeer::doDelete($t);

    	$reg->delete();

     }
  }

  public static function actualizaTransacion($numtra,$fectra,$codcli)
  {
  	$g= new Criteria();
  	$g->add(CobdettraPeer::NUMTRA,$numtra);
  	$datos= CobdettraPeer::doSelect($g);
  	if ($datos)
  	{
      foreach ($datos as $objdat)
      {
        $f= new Criteria();
        $f->add(CobdocumePeer::REFDOC,$objdat->getRefdoc());
        $f->add(CobdocumePeer::CODCLI,$codcli);
        $regi = CobdocumePeer::doSelectOne($f);
        if ($regi)
        {
          $reffac=$regi->getReffac();
          $regi->setSaldoc($regi->getSaldoc() + $objdat->getMonpag());
          $regi->setAbodoc($regi->getAbodoc() - $objdat->getMonpag());
          $regi->save();
        }
        Cuentasxcobrar::eliminarIngreso($reffac,$fectra);
      }
  	}
  }

  public static function anularComprobante($numcom,$feccom,$fecanu)
  {
     $d= new Criteria();
     $d->add(ContabcPeer::NUMCOM,$numcom);
     $d->add(ContabcPeer::FECCOM,$feccom);
     $regi= ContabcPeer::doSelectOne($d);
     if ($regi)
     {
     	$numcomnew=OrdendePago::Buscar_Correlativo();
     	$contabc= new Contabc();
     	$contabc->setNumcom($numcomnew);
     	$contabc->setReftra("RC".substr($numcom,2,6));
     	$contabc->setFeccom($fecanu);
     	$contabc->setDescom($regi->getDescom());
     	$contabc->setStacom('D');
     	$contabc->setTipcom(null);
     	$contabc->setMoncom($regi->getMoncom());
        $contabc->save();

         $e= new Criteria();
	     $e->add(Contabc1Peer::NUMCOM,$numcom);
	     $e->add(Contabc1Peer::FECCOM,$feccom);
	     $regi2= Contabc1Peer::doSelectOne($d);
	     if ($regi2)
	     {
	     	foreach ($regi2 as $datos)
	     	{
	          	$contabc1= new Contabc1();
		     	$contabc1->setNumcom($numcomnew);
		     	$contabc1->setFeccom($fecanu);
		     	$contabc1->setCodcta($datos->getCodcta());
		     	$contabc1->setNumasi($datos->getNumasi());
		     	$contabc1->setRefasi($datos->getRefasi());
		     	$contabc1->setDesasi($datos->getDesasi());
		     	if ($datos->getDebcre()=='C')
		     	{
		     	  $contabc1->setDebcre('D');
		     	}
		     	else $contabc1->setDebcre('C');
		     	$contabc1->setMonasi($datos->getMonasi());
		        $contabc1->save();
	     	}
	     }
     }
  }

  public static function anularMovlib($numtra,$fecanu)
  {
    $a= new Criteria();
    $a->add(CobdetforPeer::NUMTRA,$numtra);
    $resultados= CobdetforPeer::doSelect($a);
    if ($resultados)
    {
      foreach ($resultados as $objeto)
      {
        $val=strlen($objeto->getNumide());
      	$sreflib=substr($objeto->getNumide(),4,$val);

        $c= new Criteria();
        $c->add(TsmovlibPeer::NUMCUE,$objeto->getCodban());
        $c->add(TsmovlibPeer::REFLIB,substr($objeto->getNumide(),4,$val));
        $c->add(TsmovlibPeer::TIPMOV,substr($objeto->getNumide(),0,4));
        $data= TsmovlibPeer::doSelectOne($c);
        if ($data)
        {
          $scodtip=$data->getTipmov();
          $smonmov=$data->getMonmov();
          $pcodcta=$data->getCodcta();
          $codmon=$data->getCodmon();
          $valmon=$data->getValmon();
          $debcre=H::getX('Codtip','Tstipmov','Debcre',$scodtip);
          Tesoreria::actualiza_Bancos('E', $debcre, $objeto->getCodban(),$smonmov);
          $afecta=$debcre;

          $tsmovlib = new Tsmovlib();
		  $tsmovlib->setRefpag(null);
		  $tsmovlib->setNumcue($objeto->getCodban());
		  $tsmovlib->setReflib("A".$sreflib);
		  $tsmovlib->setFeclib($fecanu);
		  if ($afecta=='C')
		  $tsmovlib->setTipmov("ANUC");
		  else if ($afecta=='D') $tsmovlib->setTipmov("ANUD");
		  $tsmovlib->setDeslib('Desposito Anulado');
		  $tsmovlib->setMonmov($smonmov);
		  $tsmovlib->setCodcta($pcodcta);
		  $tsmovlib->setNumcom($numtra);
		  $tsmovlib->setFeccom($fecanu);
		  $tsmovlib->setStatus("C");
		  $tsmovlib->setStacon("C");
		  $tsmovlib->setCodmon($codmon);
		  $tsmovlib->setValmon($valmon);
		  $tsmovlib->setReflibpad($sreflib);
		  $tsmovlib->setTipmovpad($scodtip);
		  $tsmovlib->save();
        }
      }
    }
  }

  public static function grabarDetallesForpag($cobtransa,$grid2)
  {
  	  $a= new Criteria();
      $a->add(CobdetforPeer::NUMTRA,$cobtransa->getNumtra());
      CobdetforPeer::doDelete($a);

      $x=$grid2[0];
	  $j=0;

	  if (count($x)>0)
	  {
		  while ($j<count($x))
		  {

		  	if ($x[$j]->getMonpag()>0)
		  	{
              $cobdetfor= new Cobdetfor();
              $cobdetfor->setNumtra($cobtransa->getNumtra());
              $cobdetfor->setCodcli($cobtransa->getCodcli());
              $cobdetfor->setCorrel($j);
              $cobdetfor->setFatippagId($x[$j]->getFatippagId());
              if ($x[$j]->getCodtip()!="")
              {
                $cobdetfor->setNumide($x[$j]->getCodtip().$x[$j]->getNumide2());
              }else {
              	$cobdetfor->setNumide($x[$j]->getNumide2());
              }
              $cobdetfor->setCodban($x[$j]->getCodban());
              $cobdetfor->setMonpag($x[$j]->getMonpag());
              $cobdetfor->save();

              $n= new Criteria();
              $n->add(FatippagPeer::ID,$x[$j]->getFatippagId());
              $record= FatippagPeer::doSelectOne($n);
              if ($record)
              {
              	if ($record->getGenmov()=='S')
              	{
                  $desocp=$cobtransa->getDestra();
                  $montoop=$x[$j]->getMonpag();
                  $numreflib=$x[$j]->getNumide2();
                  $comprob=$cobtransa->getNumcom();
                 self::generaMovlibTransacciones($x[$j]->getCodban(),$numreflib,$cobtransa->getFectra(),$x[$j]->getCodtip(),$desocp,$montoop,$comprob);
              	}
              }
		  	}

		  $j++;
		  }
	  }
  }

  public static function generaMovlibTransacciones($numcue,$numreflib,$fectra,$tipmov,$desocp,$montoop,$comprob)
  {

    $result=array();
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$numcue."' AND RefLib = '".$numreflib."'";
    if (!Herramientas::BuscarDatos($criterio,&$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag(null);
      $tsmovlib->setNumcue($numcue);
      $tsmovlib->setReflib($numreflib);
      $tsmovlib->setFeclib($fectra);
      $tsmovlib->setTipmov($tipmov);
      $tsmovlib->setDeslib($desocp);
      //$CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$numcue);
      $tsmovlib->setMonmov($montoop);
      //$tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($comprob);
      $tsmovlib->setFeccom($fectra);
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      //$tsmovlib->setFecing(null);
      $tsmovlib->save();
    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }

  public static function eliminarMovlibTrassacion($numtra)
  {
  	$q= new Criteria();
  	$q->add(CobdetforPeer::NUMTRA,$numtra);
  	$resul= CobdetforPeer::doSelect($q);
  	if ($resul)
  	{
  		foreach ($resul as $obj)
  		{
	      $val=strlen($obj->getNumide());

	      $c= new Criteria();
	      $c->add(TsmovlibPeer::NUMCUE,$obj->getCodban());
	      $c->add(TsmovlibPeer::REFLIB,substr($obj->getNumide(),4,$val));
	      $c->add(TsmovlibPeer::TIPMOV,substr($obj->getNumide(),0,4));
	      $data= TsmovlibPeer::doSelectOne($c);
	      if ($data)
	      {
            $scodtip=$data->getTipmov();
            $smonmov=$data->getMonmov();
            $data->delete();
            $debcre=H::getX('Codtip','Tstipmov','Debcre',$scodtip);
            Tesoreria::actualiza_Bancos('E', $debcre, $obj->getCodban(),$smonmov);
	      }
  		}
  	}
  }

}
?>