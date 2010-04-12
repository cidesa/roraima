<?php
/**
 * Solicitud de Egreso: Clase estática para el manejo de las solicitudes de egreso
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class SolicituddeEgresos
{
  public static function salvarAlmsolegr($solegreso,$grid,$grid2,$grid3,$generar,&$msj)
  {
  	if ($solegreso->getId()) //Validacion que permite guardar solamente la descripcion
  	{
  		$refsol = Herramientas::getX_vacio('refsol','caordcom','refsol',$solegreso->getReqart());
  		if (!empty($refsol))
  		{
	  		$reg = CasolartPeer::retrieveByPKs($solegreso->getId());
	  		$reg1 = array();
	  		$reg1 = $reg[0];
	  		$reg1->setDesreq($solegreso->getDesreq());
			$reg1->save();
			//$msj=-1;
			$msj=-11;
			//return -1;

  		}else{
	  		self::grabarSolicitudEgreso($solegreso,$grid,$grid2,$grid3,$generar,&$msj);
  		}
  	}else{
	  		self::grabarSolicitudEgreso($solegreso,$grid,$grid2,$grid3,$generar,&$msj);
  		}
  }

  public static function grabarSolicitudEgreso($solegreso,$grid,$grid2,$grid3,$generar,&$msj)
  {
    $msj=-1;
    if ($solegreso->getId()!="")
      $nuevoregistro="N";
    else
        $nuevoregistro="S";

    if (Herramientas::getVerCorrelativo('corsol','cacorrel',&$r))
    {
      if ($solegreso->getReqart()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $numsol='SC'.(substr($numero,2,strlen($numero)));
          $numsol2='SS'.(substr($numero,2,strlen($numero)));

          $sql="select reqart from casolart where reqart='".$numsol."' or reqart='".$numsol2."'";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }

        if($solegreso->getTipo()=='C')
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $numsol='SC'.(substr($numero,2,strlen($numero)));
        }
        else if($solegreso->getTipo()=='S')
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $numsol='SS'.(substr($numero,2,strlen($numero)));
        }
        else
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $numsol='SC'.(substr($numero,2,strlen($numero)));
        }
      }
      else
      {
        $numsol=$solegreso->getReqart();
      }
    }

     if ($generar!="")
     {
      self::generaPrecompromiso($solegreso,$numsol,&$msj);

     }

    $c= new Criteria();
     $resul=CadefartPeer::doSelectOne($c);
     if ($resul)
     {
       if($resul->getPrcasopre()=='S' && $resul->getPrcreqapr()!='S')
       {
         self::generaPrecompromiso($solegreso,$numsol,&$msj);
         $generar='d';
       }
     }


     if ($msj==-1)
     {
      if ($solegreso->getReqart()=='########')
      {
      Herramientas::getSalvarCorrelativo('corsol','cacorrel','Solicitud',$r,$msg);
      }
      $solegreso->setReqart($numsol);
      $mon=$solegreso->getTipmon();
      $valor=Herramientas::getX('CODMON','Tsdesmon','Valmon',$mon);
      $solegreso->setValmon($valor);

      $x=$grid[0];
      $mondesctot=0;
      $j=0;
      while ($j<count($x))
      {$monto1=$x[$j]->getMondes();
        $mondesctot=$mondesctot + $monto1;
         $j++;
      }
      $mondesctot=round($mondesctot,2);
      $solegreso->setMondes($mondesctot);

      $solegreso->save();


     // Se graban los Detalles de la Solicitud
      self::grabarSolicitudDetalle($solegreso,$grid);  // Grid Detalle
      self::grabarSolicitudRazon($solegreso,$grid3);  // Grid Razon
      self::grabarDistribucionRgo($solegreso,$grid);  // Distribucion de Recargos
      self::grabarRecargo($solegreso,$grid2);  // Recargos Tabla Cargosol
      if ($generar!="")
      {
       self::generarImputacionesPrecompromiso($numsol);
      }
     return true;
     }
     else
     {
      return false;
     }
  }

  public static function grabarSolicitudDetalle($solegreso,$grid)
  {
    $requisicion=$solegreso->getReqart();
    $x=$grid[0];
    if (count($x)!=0)
    {
     $j=0;
     while ($j<count($x))
   {
    $cantidad=$x[$j]->getCanreq();
    if (($x[$j]->getCodart()!="") and ($cantidad>0))
      {
        $longcat=strlen($x[$j]->getCodcat()) +1;
        $x[$j]->setReqart($requisicion);
        $x[$j]->setDesart($x[$j]->getDesartsol());
        $x[$j]->setCodpar(substr($x[$j]->getCodigopre(),$longcat,strlen($x[$j]->getCodigopre())));
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
 }

  public static function grabarSolicitudRecargo($solegreso,$grid2)
  {
  	$tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
    $requisicion=$solegreso->getReqart();
    $a=$grid2[0];
    if (count($a)!=0)
    {
     $k=0;
      while ($k<count($a))
    {
     if ($a[$k]->getCodrgo()!="")
       {
      $a[$k]->setReqart($requisicion);
      $a[$k]->setTipdoc($tipdoc);
      $a[$k]->save();
       }
     $k++;
    }
    $b=$grid2[1];
    $k=0;
    if (!empty($b[$k]))
    {
     while ($k<count($b))
     {
      $b[$k]->delete();
      $k++;
     }
    }
   }
  }

  public static function grabarSolicitudRazon($solegreso,$grid3)
  {
    $requisicion=$solegreso->getReqart();
    $c=$grid3[0];
    $l=0;
    while ($l<count($c))
  {
   if ($c[$l]->getCodrazcom()!="")
     {
    $c[$l]->setNumsol($requisicion);
    $c[$l]->save();
     }
   $l++;
  }
  $d=$grid3[1];
  $l=0;
  if (!empty($d[$l]))
  {
   while ($l<count($d))
   {
    $d[$l]->delete();
    $l++;
   }
    }
  }

  public static function grabarSolicitudDistribucionRgo($solegreso,$grid,$grid2)
  {
    $x=$grid[0];
  $j=0;
  $acum=0;
  while ($j<count($x))
  {
   $marcado=$x[$j]->getCheck();
   $costo=$x[$j]->getCosto();
   $cantidad=$x[$j]->getCanreq();
   if (($marcado=="1") and ($costo>0))
   {
     $acum= $acum + ($cantidad*$costo);
   }
   $j++;
  }

  $y=$grid2[0];
  $k=0;
  while ($k<count($y))
  {
   $recar=$y[$k]->getCodrgo();
   $monto=$y[$k]->getMonrgo();
   if ($recar!="")
   {
     $requi=$solegreso->getReqart();
     $a=$grid[0];
     $l=0;
     $montorecargo=0;
     while ($l<count($a))
     {
      $marca=$a[$l]->getCheck();
      $montor=$a[$l]->getMonrgo();
      $cant= $a[$l]->getCanreq();
      $cost= $a[$l]->getCosto();
      $unidad=$a[$l]->getCodcat();
       $codpresu=$a[$l]->getCodigopre();
       if($marca=='1' and $montor>0)
       {
         $totalarticulo= $cant*$cost;

         $distribucion = new Cadisrgo();
         $distribucion->setReqart($requi);
         $distribucion->setCodart($a[$l]->getCodart());
         $distribucion->setCodcat($a[$l]->getCodcat());
         $distribucion->setCodrgo($recar);

         $c = new Criteria();
         $tiporec = CadefartPeer::doSelectOne($c);
         if ($tiporec)
         {
         if ($tiporec->getAsiparrec()!='C')
         {
          $c = new Criteria();
          $c->add(CarecargPeer::CODRGO,$recar);
          $presupuesto = CarecargPeer::doSelectOne($c);
          if ($presupuesto)
          {
          if ($tiporec->getAsiparrec()=='P')
          {
           $distribucion->setCodpre($presupuesto->getCodpre());
          }
          else
          {
           $codigo= $unidad.'-'.$presupuesto->getCodpre();
           $distribucion->setCodpre($codigo);
          }
          }
         }
         else
         {
          $distribucion->setCodpre($codpresu);
         }
       }
         $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
         $montorecargo= round((($monto*$totalarticulo)/$acum),2);
         $distribucion->setMonrgo($montorecargo);
         $distribucion->setTipdoc($tipdoc);
         $distribucion->save();
       }
      $l++;
     }
    }
   $k++;
  }
  }

  public static function generaPrecompromiso($solegreso,$referencia,&$msj)
  {
    $msj=-1;
    if ($solegreso->getId()!="")
    {
      $c = new Criteria();
      $c->add(CpimpprcPeer::REFPRC,$referencia);
      CpimpprcPeer::doDelete($c);

      $c = new Criteria();
      $c->add(CpprecomPeer::REFPRC,$referencia);
      CpprecomPeer::doDelete($c);

    }
    $c = new Criteria();
    $c->add(CpprecomPeer::REFPRC,$referencia);
    $existe = CpprecomPeer::doSelectOne($c);
    if (!$existe)
    {
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      $cpprecom= new Cpprecom();
      $cpprecom->setRefprc($referencia);
      $cpprecom->setFecprc($solegreso->getFecreq());
      $cpprecom->setTipprc($tipdoc);
      $cpprecom->setAnoprc(substr($solegreso->getFecreq(),0,4));
      $cpprecom->setDesanu(null);
      $cpprecom->setDesprc($solegreso->getDesreq());
      $cpprecom->setMonprc($solegreso->getMonreq());
      $cpprecom->setSalcom(0.00);
      $cpprecom->setSalcau(0.00);
      $cpprecom->setSalpag(0.00);
      $cpprecom->setSalaju(0.00);
      $cpprecom->setStaprc('A');
      $cpprecom->setcedrif(null);
      $cpprecom->save();
      return true;
    }
    else
    {
      $msj=126;
      return false;
    }

  }

  public static function generarImputacionesPrecompromiso($referencia)
  {
    $c = new Criteria();
    $definicion = CadefartPeer::doSelectOne($c);
    if ($definicion)
    { $result=array();
      if ($definicion->getAsiparrec()!='C')
      {
        $sql="select (A.Codcat||'-'||A.Codpar) as codpre, SUM(A.Montot) - SUM(A.Monrgo) as montot From Caartsol A, Caregart B WHERE A.codart=B.codart and A.reqart='".$referencia."' GROUP BY (A.codcat||'-'||A.codpar)";
      }
      else
      {
        $sql="select (A.Codcat||'-'||A.Codpar) as codpre, SUM(A.Montot) as montot From Caartsol A, Caregart B WHERE A.codart=B.codart and A.reqart='".$referencia."' GROUP BY (A.codcat||'-'||A.codpar)";
      }

      if (Herramientas::BuscarDatos($sql,&$result))
      {
        $i=0;
        while ($i<count($result))
        {
         // if($result[$i]['montot']>0)
          //{
            $registro = new Cpimpprc();
            $registro->setRefprc($referencia);
            $registro->setCodpre($result[$i]['codpre']);
            $registro->setMonimp($result[$i]['montot']);
            $registro->setMoncom(0);
            $registro->setMoncau(0);
            $registro->setMonpag(0);
            $registro->setMonaju(0);
            $registro->setStaimp('A');
            $registro->save();
       //   }
          $i++;
        }
      }

      if ($definicion->getAsiparrec()!='C')
      {
        $result1=array();
        $sql1="SELECT SUM(MONRGO) as totimp, Codpre as codpre FROM CADISRGO WHERE REQART='".$referencia."' and TIPDOC IN (SELECT TIPPRC FROM CPDOCPRC) GROUP BY CODPRE";

        if (Herramientas::BuscarDatos($sql1,&$result1))
        {
          $l=0;
          while ($l<count($result1))
          {
           // if($result1[$l]['totimp']>0)
           // {
               $registro2 = new Cpimpprc();
               $registro2->setRefprc($referencia);
               $registro2->setCodpre($result1[$l]['codpre']);
               $registro2->setMonimp($result1[$l]['totimp']);
               $registro2->setMoncom(0);
               $registro2->setMoncau(0);
               $registro2->setMonpag(0);
               $registro2->setMonaju(0);
               $registro2->setStaimp('A');
               $registro2->save();
          //  }
            $l++;
          }
        }
      }
    }
  }

  public static function eliminarAlmsolegr($solegreso)
  {
    self::eliminarSolicitud($solegreso);
  }

  public static function eliminarSolicitud($solegreso)
  {
    $codigo=$solegreso->getReqart();
    Herramientas::EliminarRegistro('Caartsol','Reqart',$codigo);
    self::eliminarPrecompromiso($codigo);
    self::eliminarRecargos($codigo);
    Herramientas::EliminarRegistro('Casolraz','Numsol',$codigo);
    $solegreso->delete();
  }

  public static function eliminarRecargos($cod)
  {
  	$tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
    $c= new Criteria();
    $c->add(CargosolPeer::REQART,$cod);
    $c->add(CargosolPeer::TIPDOC,$tipdoc);
    CargosolPeer::doDelete($c);

    $c= new Criteria();
    $c->add(CadisrgoPeer::REQART,$cod);
    $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
    CadisrgoPeer::doDelete($c);
  }

  public static function eliminarPrecompromiso($code)
  {
    $c= new Criteria();
    $c->add(CpimpprcPeer::REFPRC,$code);
    CpimpprcPeer::doDelete($c);

    $c= new Criteria();
    $c->add(CpprecomPeer::REFPRC,$code);
    CpprecomPeer::doDelete($c);
  }

   public static function chequearDisponibilidadPresupuesto($solegreso,$grid,$j,$id,$tiporec,&$sobregiro)
   {
     $mitotal=0;
     $l=$grid[0];
     $z=0;
     while ($z<count($l))
     {
       $codigopresupuestario=$l[$z]->getCodigopre();
       if ($l[$j]->getCodigopre()==$codigopresupuestario)
       {
         $cantidad=$l[$z]->getCanreq();
         $costo=$l[$z]->getCosto();
         $recargo=$l[$z]->getMonrgo();
        if ($tiporec!='C')
        {
          $mitotal= $mitotal + ($cantidad*$costo);
        }
        else
        {
          $mitotal= $mitotal + $recargo;
        }
       }
      $z++;
     }

    if ($id!="")
    {
     $b=0;
     while ($b<count($l))
     {
       $codigopresupuestario=$l[$b]->getCodigopre();
       if ($l[$j]->getCodigopre()==$codigopresupuestario)
       {
         $total=$l[$b]->getMontot2();
         $recargo=$l[$b]->getMonrgo2();
        if ($tiporec!='C')
        {
          $mitotal= $mitotal - ($total - $recargo);
        }
        else
        {
          $mitotal= $mitotal - $total;
        }
       }
      $b++;
     }
    }

    if ($l[$j]->getCodigopre()!="")
    {
     $anno=substr($solegreso->getFecreq(),0,4);

      if (Herramientas::Monto_disponible_ejecucion($anno,$l[$j]->getCodigopre(),&$mondis))
      {
        if ($mitotal > $mondis)
        {
          $chequeardisponibilidadpresupuesto=false;
          $sobregiro=true;
        }
        else
        {
          $chequeardisponibilidadpresupuesto=true;
          $sobregiro=false;
        }
      }
      else
      {

        $chequeardisponibilidadpresupuesto=false;
        $sobregiro=true;
      }
    }
    else
    {
      $chequeardisponibilidadpresupuesto=false;
      $sobregiro=true;
    }

    return $chequeardisponibilidadpresupuesto;
   }

   public static function estaEnGrid($arreglo,$valor,$columna)
   {
     $estaengrid=0;
     $c=0;
     while($c<count($arreglo))
     {
       if ($arreglo[$c][$columna]==$valor)
       {
         $estaengrid=$c;
         break;
       }
     $c++;
     }
     return $estaengrid;
   }

   public static function montoRecargo($acum,$totrgo,$totart)
   {
     $montorecargo=0;
     $montorecargo=(($totrgo*$totart)/$acum);

     return $montorecargo;
   }

   public static function acumularUnidad($monto,$grid,&$gridunidad)
   {
     $acum=0;
     $e=$grid[0];
     $r=0;
     while ($r<count($e))
     {
       $cantidad=$e[$r]->getCanreq();
       $costo=$e[$r]->getCosto();
       $recargo=$e[$r]->getMonrgo();
      if ($e[$r]->getCheck()=='1' && $recargo>0)
      {
        $acum=$acum + ($cantidad*$costo);
      }
       $r++;
     }
     $totalunidad=0;
     $k=0;
     while ($k<count($e))
     {
       $cantidad=$e[$k]->getCanreq();
       $costo=$e[$k]->getCosto();
       $recargo=$e[$k]->getMonrgo();
       $recargo2=$e[$k]->getMonrgo2();
      if ($e[$k]->getCheck()=='1')
      {
        if ($recargo2>0)
        {
          $monto=$recargo - $recargo2;
        }else { $monto=$recargo;}
        $totart=$costo*$cantidad;
        $j=0;
        if (count($gridunidad) >0)
        {
          while ($j<count($gridunidad))
          {
            $encontrado=false;
            if ($e[$k]->getCodcat()==$gridunidad[$j][0])
            {
             $encontrado=true;
             $fila=$j;
             break;
            }
            $j++;
          }
          if ($encontrado==true)
          {
            $mont=self::montoRecargo($acum,$monto,$totart);
            $gridunidad[$fila][1]=$gridunidad[$fila][1]+ $mont;
          }
          else
          {
            $indice=count($gridunidad);
            $gridunidad[$indice][0]=$e[$k]->getCodcat();
            $gridunidad[$indice][1]=self::montoRecargo($acum,$monto,$totart);
          }
        }
        else
        {
          $gridunidad[$j][0]=$e[$k]->getCodcat();
          $gridunidad[$j][1]=self::montoRecargo($acum,$monto,$totart);
        }
      }
       $k++;
     }
   }

   public static function chequearDisponibilidadRecargo($codigo,$elmonto,$eltipo,$grid,$gridunidad,&$sobregirorecargo)
   {
     if ($codigo=="")
     { $mitotal=0;}
     else { $mitotal=$elmonto;}

     $c= new Criteria();
     $c->add(CarecargPeer::CODRGO,$codigo);
     $data= CarecargPeer::doSelectOne($c);
     if ($data)
     {
       if ($eltipo=='P')
       {
        $mitotal=$elmonto;
        $codigopresupuestario=$data->getCodpre();
        $a= new Criteria();
        $a->add(CpasiiniPeer::PERPRE,'00');
        $a->add(CpasiiniPeer::CODPRE,$codigopresupuestario);
        $data2= CpasiiniPeer::doSelectOne($a);
        if ($data2)
        {
          $mondis=self::montoDisponible($codigopresupuestario);
          if ($mitotal > $mondis)
          {
            $chequeardisponibilidadrecargo=false;
            $sobregirorecargo=true;
          }
          else
          {
            $chequeardisponibilidadrecargo=true;
            $sobregirorecargo=false;
          }
        }
        else
        {
          $chequeardisponibilidadrecargo=false;
          $sobregirorecargo=true;
        }
       }
       else
       {
         self::acumularUnidad($elmonto,$grid,&$gridunidad);
         $l=0;
         while ($l<count($gridunidad))
         {
          $codigopresupuestario=$gridunidad[$l][0].'-'.$data->getCodpre();
          $mitotal=$gridunidad[$l][1];
          $c= new Criteria();
          $c->add(CpasiiniPeer::PERPRE,'00');
          $c->add(CpasiiniPeer::CODPRE,$codigopresupuestario);
          $data3= CpasiiniPeer::doSelectOne($c);
          if ($data3)
          {
             $mondis=self::montoDisponible($codigopresupuestario);
             if ($mitotal > $mondis)
             {
               $chequeardisponibilidadrecargo=false;
               $sobregirorecargo=true;
             }
             else
             {
               $chequeardisponibilidadrecargo=true;
               $sobregirorecargo=false;
             }
          }
          else
          {
            $chequeardisponibilidadrecargo=false;
            $sobregirorecargo=true;
          }
           $l++;
         }
       }
     }
    return $chequeardisponibilidadrecargo;
   }

   public static function BuscarCodrgoenArreglo($myarr,$codrgo,&$j)
   {
      $j=0;
      while ($j<count($myarr))
      {
        if ($myarr[$j]['codrgo']==$codrgo)
        {
           return true;
        }
        $j++;
      }
      return false;
  }

   public static function ultimoChequeo($solegreso,$grid,$grid2,$id,$tiporec,&$msjuno,&$codi1,&$msjdos,&$codi2)
   {
    $ultimochequeo=true;
    $sobregiro=false;
    $sobregirorecargo=false;
    $x=$grid[0];
    $msjuno=-1; $codi1="";
    $msjdos=-1; $codi2="";
    $j=0;

    while ($j<count($x))
    {
      $monto=$x[$j]->getMontot();
      $monto2=$x[$j]->getMontot2();

      if (($monto>$monto2))
      {
       if (!self::chequearDisponibilidadPresupuesto($solegreso,$grid,$j,$id,$tiporec,&$sobregiro))
       {
        $msjuno=113; $codi1=$x[$j]->getCodart();
       }
       else { $msjuno=-1; $codi1="";}
      }

    /*if (count($r)>0)
    {
      $z=0;
      $gridunidad=array();
      $procede=true;
      while (($z<count($r)) && ($procede==true))
      {
        $montouno=$r[$z]->getMonrgo();
        $montodos=$r[$z]->getMonrgo2();

        if ($montouno > $montodos)
        {
         $elmonto=$montouno - $montodos;
         if (!self::chequearDisponibilidadRecargo($r[$z]->getCodrgo(),$elmonto,$tiporec,$grid,$gridunidad,&$sobregirorecargo))
         {
           $procede=false;
           $msjdos=114; $codi2=$r[$z]->getCodrgo();
         }else { $msjdos=-1; $codi2="";}
        }
        $z++;
      }
    }*/


      if ($sobregiro)
      {
       $ultimochequeo=false;
       break;
      }
     $j++;
    }//while ($j<count($x))

    if (!$ultimochequeo)
       return $ultimochequeo;

    $x=$grid[0];
    $j=0;
    $requi=$solegreso->getReqart();
    $arr_recargo=array();
    $indarr_rec=0;
    while ($j<count($x))
    {
    $marcado=$x[$j]->getCheck();
    $unidad=$x[$j]->getCodcat();
    $codpresu=$x[$j]->getCodigopre();
    if ($marcado=="1")
    {
      if ($x[$j]->getDatosrecargo()!='')
      {
      $cadenarec=split('!',$x[$j]->getDatosrecargo());
          $r=0;
          while ($r<(count($cadenarec)-1))
          {
            $aux=$cadenarec[$r];
            $aux2=split('_',$aux);
            if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
            {
            $arr_recargo[$indarr_rec]['codart']=$x[$j]->getCodart();
            $arr_recargo[$indarr_rec]['codcat']=$x[$j]->getCodcat();
            $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
            $montorecargo= Herramientas::toFloat($aux2[4]);
            $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
            $indarr_rec++;
            }
            $r++;
          }//while
      }//if ($x[$j]->getDatosrecargo()!="")
    }// if ($marcado=="1")
     $j++;
    }//while ($j<count($x))

   //unir el arreglo: $arr_recargo, que corresponde al recargo por articulo(cadisrgo), en un nuevo arreglo con la distribucion total por
   //recargo: Cargosol
    $h = 0;
    $arrTotRec=array();
    $cont=-1;
    while ($h < count($arr_recargo))
     {
        $codrgo=$arr_recargo[$h]['codrgo'];
        if (self::BuscarCodrgoenArreglo($arrTotRec,$codrgo,&$j))
        {
            $arrTotRec[$j]['monrgo']= $arrTotRec[$j]['monrgo'] + $arr_recargo[$h]['monrgo'];
        }
        else
        {
            $cont++;
            $arrTotRec[$cont]['codrgo'] = $arr_recargo[$h]['codrgo'];//codrgo
            $arrTotRec[$cont]['monrgo'] = $arr_recargo[$h]['monrgo'];//monrgo
        }
      $h++;
     }

     //Chequear disponibilidad por recargo
      $z=0;
      $gridunidad=array();
      $procede=true;
      while (($z<count($arrTotRec)) && ($procede==true))
      {
        $montouno=$arrTotRec[$z]['monrgo'];
        $montodos=0;
        if ($solegreso->getId())//Consulta/modificacion
        {
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      $c= new Criteria();
      $c->add(CargosolPeer::REQART,$solegreso->getReqart());
      $c->add(CargosolPeer::CODRGO,$arrTotRec[$z]['codrgo']);
      $c->add(CargosolPeer::TIPDOC,$tipdoc);
      $datrec=CargosolPeer::doSelectOne($c);
      if ($datrec)
          $montodos=$datrec->getMonrgo();
        }

        if ($montouno > $montodos)
        {
         $elmonto=$montouno - $montodos;
         if (!self::chequearDisponibilidadRecargo($arrTotRec[$z]['codrgo'],$elmonto,$tiporec,$grid,$gridunidad,&$sobregirorecargo))
         {
           $procede=false;
           $msjdos=114; $codi2=$arrTotRec[$z]['codrgo'];
           break;
         }else { $msjdos=-1; $codi2="";}
        }
        $z++;
      }

      if ($sobregirorecargo) $ultimochequeo=false;

     return $ultimochequeo;
   }

  public static function validarAlmsolegr($solegreso,$grid,$grid2,$id,$tiporec,&$msj1,&$cod1,&$msj2,&$cod2,&$msj3,&$cod3)
  {
    $msj1=-1;
    $msj2=-1;
    $msj3=-1;
    $cod1="";
    $cod2="";
    $cod3="";
    $x=$grid[0];
    $j=0;

    while ($j<count($x))
    {
      if ($x[$j]->getCodigopre()!='')
      {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodigopre());
        $result= CpdeftitPeer::doSelectOne($c);
        if ($result)
        { $msj1=-1; $cod1="";}
        else { $msj1=112; $cod1=$x[$j]->getCodigopre(); return false;}
      }
      $j++;
    }

   if (!self::UltimoChequeo($solegreso,$grid,$grid2,$id,$tiporec,&$msjuno,&$codi1,&$msjdos,&$codi2))
      {
        $msj2=$msjuno;  $cod2=$codi1; $msj3=$msjdos; $cod3=$codi2;
      }else { $msj2=-1; $cod2=""; $msj3=-1; $cod3="";}

  }

  public static function montoDisponible($codigopre)
  {
    $c= new Criteria();
    $c->add(CpdefnivPeer::CODEMP,'001');
    $resul=CpdefnivPeer::doSelectOne($c);
    if (count($resul)>0)
    {
      $a="SELECT nomabr as nombre FROM CPNIVELES ORDER BY CONSEC";
      if (Herramientas::BuscarDatos($a,&$result))
      {
        $longitud=0;
        for ($nivel=1;$nivel<=$resul->getNivdis();$nivel++)
        {
          $longitud= $longitud +(strlen($result[$nivel-1]["nombre"]))+1;
        }
        $longitud=$longitud-1;
        $anno=split('-',$resul->getFeccie());
        $var = substr($codigopre, 0, $longitud);
        if (Herramientas::Monto_disponible_ejecucion($anno[0],$var,&$mondis))
        {
      $montodisponible=$mondis;
        }
        else{ $montodisponible=0;}
      }else{ $montodisponible=0;}
    }else{ $montodisponible=0;}

    return $montodisponible;
  }

  public static function CalcularRecargos($tiprgo,$monrgo,$monbasart)
  {
    if ($tiprgo=='M')
    {
     $recargo= $monrgo;
    }
    else if ($tiprgo=='P')
    {
    	//echo " monbasart: ".$monbasart;
    	//echo " monrgo: ".$monrgo." ";

      $recargo = (($monbasart*$monrgo)/100);
      //echo "calculo > ".$recargo;
     //exit();
    }
    else
    {
      $recargo=0;
    }
   return $recargo;
  }

  public static function grabarDistribucionRgo($solegreso,$grid)
  {
  $x=$grid[0];
  $j=0;
  $requi=$solegreso->getReqart();

  while ($j<count($x))
  {
   $marcado=$x[$j]->getCheck();
   $unidad=$x[$j]->getCodcat();
   $codpresu=$x[$j]->getCodigopre();
   if ($marcado=="1")
   {
     if ($x[$j]->getDatosrecargo()!='')
     {
    $cadenarec=split('!',$x[$j]->getDatosrecargo());
        $r=0;
        while ($r<(count($cadenarec)-1))
        {
          $aux=$cadenarec[$r];
          $aux2=split('_',$aux);
          if ($aux2[0]!="" )//&& Herramientas::toFloat($aux2[4])>0)
          {
        $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
        $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$requi);
        $c->add(CadisrgoPeer::CODART,$x[$j]->getCodart());
        $c->add(CadisrgoPeer::CODCAT,$x[$j]->getCodcat());
        $c->add(CadisrgoPeer::CODRGO,$aux2[0]);
        $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
        CadisrgoPeer::doDelete($c);

            $distribucion = new Cadisrgo();
          $distribucion->setReqart($requi);
          $distribucion->setCodart($x[$j]->getCodart());
          $distribucion->setCodcat($x[$j]->getCodcat());
          $distribucion->setCodrgo($aux2[0]);

          $c = new Criteria();
          $tiporec = CadefartPeer::doSelectOne($c);
          if ($tiporec)
          {
          if ($tiporec->getAsiparrec()!='C')
          {
            $c = new Criteria();
            $c->add(CarecargPeer::CODRGO,$aux2[0]);
            $presupuesto = CarecargPeer::doSelectOne($c);
            if ($presupuesto)
            {
            if ($tiporec->getAsiparrec()=='P')
            {
            $distribucion->setCodpre($presupuesto->getCodpre());
            }
            else
            {
            $codigo= $unidad.'-'.$presupuesto->getCodpre();
            $distribucion->setCodpre($codigo);
            }
            }
          }
          else
          {
            $distribucion->setCodpre($codpresu);
          }
          }
          $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
          $montorecargo= Herramientas::toFloat($aux2[4]);
          $distribucion->setMonrgo($montorecargo);
          $distribucion->setTipdoc($tipdoc);
          $distribucion->save();
          }
          $r++;
        }//while
     }//if ($x[$j]->getDatosrecargo()!="")
   }// if ($marcado=="1")
   $j++;
  }// while ($j<count($x))
  }

  public static function grabarRecargo($solegreso)
  {
   $requisicion=$solegreso->getReqart();

   $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
   $c= new Criteria();
   $c->add(CargosolPeer::REQART,$requisicion);
   $c->add(CargosolPeer::TIPDOC,$tipdoc);
   CargosolPeer::doDelete($c);


   $sql="select reqart,codrgo,sum(coalesce(monrgo,0)) as monrgo from cadisrgo where reqart='".$requisicion."'  group by reqart,codrgo";
   $result=array();
   if (Herramientas::BuscarDatos($sql,&$result))
    {
      $i=0;
      while ($i<count($result))
      {
      	$tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
        $cargosol= new Cargosol();
        $cargosol->setReqart($requisicion);
        $cargosol->setCodrgo($result[$i]['codrgo']);
        $cargosol->setMonrgo($result[$i]['monrgo']);
         $cargosol->setTipdoc($tipdoc);
         $cargosol->save();
         $i++;
       }// while ($i<count($result))
    }
 }


/*
 * Author: Actualiza la Solicitud de Egreso para poder generar la orden de compra
 */
  public static function salvarAlmaprsolegr($clasemodelo,$grid,$login,$aprobpresu)
  {
    $aprob=H::getX('CODEMP','Cadefart','Solreqapr','001');
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCheck()=='1')
      {
      	if ($aprobpresu=='S' && $aprob=='S')
		{
   		  $x[$j]->setUsuapr($login);
      	  $x[$j]->setFecapr(date('Y-m-d'));
      	  $x[$j]->setAprreq('S');
      	  $x[$j]->save();
		  
		  $t= new Criteria();
		  $t->add(CasolartPeer::REQART,$x[$j]->getReqart());
		  $solegreso=CasolartPeer::doSelectOne($t);
		  if ($solegreso){
		    self::generaPrecompromiso($solegreso,$solegreso->getReqart(),&$msj);
			if ($msj==-1)
			{
				self::generarImputacionesPrecompromiso($solegreso->getReqart());
			}
		  }
		  
		}else if ($aprobpresu=='S')
		{
		  $t= new Criteria();
		  $t->add(CasolartPeer::REQART,$x[$j]->getReqart());
		  $solegreso=CasolartPeer::doSelectOne($t);
		  if ($solegreso){
		    self::generaPrecompromiso($solegreso,$solegreso->getReqart(),&$msj);
			if ($msj==-1)
			{
				self::generarImputacionesPrecompromiso($solegreso->getReqart());
			}
		  }
		}else {
			$x[$j]->setUsuapr($login);
	      	$x[$j]->setFecapr(date('Y-m-d'));
	      	$x[$j]->setAprreq('S');	
	      	$x[$j]->save();
		}
      }
      $j++;
    }

	return -1;
  }

  public static function totalImputacion($reqart)
  {
  	$total=0;
  	$c= new Criteria();
  	$c->add(CpimpprcPeer::REFPRC,$reqart);
  	$result= CpimpprcPeer::doSelect($c);
  	if ($result)
  	{
  	   foreach ($result as $obj)
  	   {
  	   	 $total= $total + $obj->getMonimp();
  	   }
  	}
  	return $total;
  }

     public static function ultimoChequeo2($solegreso,$grid,$grid2,$id,$tiporec,&$msjuno,&$codi1,&$msjdos,&$codi2)
   {
    $ultimochequeo=true;
    $sobregiro=false;
    $sobregirorecargo=false;
    $x=$grid[0];
    $msjuno=-1; $codi1="";
    $msjdos=-1; $codi2="";
    $j=0;

    while ($j<count($x))
    {
      $monto=$x[$j]->getMontot();
      $monto2=$x[$j]->getMontot2();

      if (($monto>$monto2))
      {
       if (!self::chequearDisponibilidadPresupuesto2($solegreso,$grid,$j,$id,$tiporec,&$sobregiro))
       {
        $msjuno=113; $codi1=$x[$j]->getCodart();
       }
       else { $msjuno=-1; $codi1="";}
      }

      if ($sobregiro)
      {
       $ultimochequeo=false;
       break;
      }
     $j++;
    }//while ($j<count($x))

    if (!$ultimochequeo)
       return $ultimochequeo;

    $x=$grid[0];
    $j=0;
    $requi=$solegreso->getReqart();
    $arr_recargo=array();
    $indarr_rec=0;
    while ($j<count($x))
    {
    $marcado=$x[$j]->getCheck();
    $unidad=$x[$j]->getCodcat();
    $codpresu=$x[$j]->getCodigopre();
    if ($marcado=="1")
    {
      if ($x[$j]->getDatosrecargo()!='')
      {
      $cadenarec=split('!',$x[$j]->getDatosrecargo());
          $r=0;
          while ($r<(count($cadenarec)-1))
          {
            $aux=$cadenarec[$r];
            $aux2=split('_',$aux);
            if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
            {
            $arr_recargo[$indarr_rec]['codart']=$x[$j]->getCodart();
            $arr_recargo[$indarr_rec]['codcat']=$x[$j]->getCodcat();
            $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
            $montorecargo= Herramientas::toFloat($aux2[4]);
            $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
            $indarr_rec++;
            }
            $r++;
          }//while
      }//if ($x[$j]->getDatosrecargo()!="")
    }// if ($marcado=="1")
     $j++;
    }//while ($j<count($x))

   //unir el arreglo: $arr_recargo, que corresponde al recargo por articulo(cadisrgo), en un nuevo arreglo con la distribucion total por
   //recargo: Cargosol
    $h = 0;
    $arrTotRec=array();
    $cont=-1;
    while ($h < count($arr_recargo))
     {
        $codrgo=$arr_recargo[$h]['codrgo'];
        if (self::BuscarCodrgoenArreglo($arrTotRec,$codrgo,&$j))
        {
            $arrTotRec[$j]['monrgo']= $arrTotRec[$j]['monrgo'] + $arr_recargo[$h]['monrgo'];
        }
        else
        {
            $cont++;
            $arrTotRec[$cont]['codrgo'] = $arr_recargo[$h]['codrgo'];//codrgo
            $arrTotRec[$cont]['monrgo'] = $arr_recargo[$h]['monrgo'];//monrgo
        }
      $h++;
     }

     //Chequear disponibilidad por recargo
      $z=0;
      $gridunidad=array();
      $procede=true;
      while (($z<count($arrTotRec)) && ($procede==true))
      {
        $montouno=$arrTotRec[$z]['monrgo'];
        $montodos=0;
        if ($solegreso->getId())//Consulta/modificacion
        {
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      $c= new Criteria();
      $c->add(CargosolPeer::REQART,$solegreso->getReqart());
      $c->add(CargosolPeer::CODRGO,$arrTotRec[$z]['codrgo']);
      $c->add(CargosolPeer::TIPDOC,$tipdoc);
      $datrec=CargosolPeer::doSelectOne($c);
      if ($datrec)
          $montodos=$datrec->getMonrgo();
        }

        if ($montouno > $montodos)
        {
         $elmonto=$montouno - $montodos;
         if (!self::chequearDisponibilidadRecargo2($arrTotRec[$z]['codrgo'],$elmonto,$tiporec,$grid,$gridunidad,&$sobregirorecargo))
         {
           $procede=false;
           $msjdos=114; $codi2=$arrTotRec[$z]['codrgo'];
           break;
         }else { $msjdos=-1; $codi2="";}
        }
        $z++;
      }

      if ($sobregirorecargo) $ultimochequeo=false;

     return $ultimochequeo;
   }

      public static function chequearDisponibilidadPresupuesto2($solegreso,$grid,$j,$id,$tiporec,&$sobregiro)
   {
     $mitotal=0;
     $l=$grid[0];
     $z=0;
     while ($z<count($l))
     {
       $codigopresupuestario=$l[$z]->getCodigopre();
       if ($l[$j]->getCodigopre()==$codigopresupuestario)
       {
         $cantidad=$l[$z]->getCanreq();
         $costo=$l[$z]->getCosto();
         $recargo=$l[$z]->getMonrgo();
        if ($tiporec!='C')
        {
          $mitotal= $mitotal + ($cantidad*$costo);
        }
        else
        {
          $mitotal= $mitotal + $recargo;
        }
       }
      $z++;
     }

    if ($id!="")
    {
     $b=0;
     while ($b<count($l))
     {
       $codigopresupuestario=$l[$b]->getCodigopre();
       if ($l[$j]->getCodigopre()==$codigopresupuestario)
       {
         $total=$l[$b]->getMontot2();
         $recargo=$l[$b]->getMonrgo2();
        if ($tiporec!='C')
        {
          $mitotal= $mitotal - ($total - $recargo);
        }
        else
        {
          $mitotal= $mitotal - $total;
        }
       }
      $b++;
     }
    }

    if ($l[$j]->getCodigopre()!="")
    {
      $sql="select mondis from cpasiini where codpre ='".$l[$j]->getCodigopre()."'  and perpre='00'";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        if ($mitotal > $result[0]['mondis'])
        {
          $chequeardisponibilidadpresupuesto=false;
          $sobregiro=true;
        }
        else
        {
          $chequeardisponibilidadpresupuesto=true;
          $sobregiro=false;
        }
      }
      else
      {

        $chequeardisponibilidadpresupuesto=false;
        $sobregiro=true;
      }
    }
    else
    {
      $chequeardisponibilidadpresupuesto=false;
      $sobregiro=true;
    }

    return $chequeardisponibilidadpresupuesto;
   }

   public static function chequearDisponibilidadRecargo2($codigo,$elmonto,$eltipo,$grid,$gridunidad,&$sobregirorecargo)
   {
     if ($codigo=="")
     { $mitotal=0;}
     else { $mitotal=$elmonto;}

     $c= new Criteria();
     $c->add(CarecargPeer::CODRGO,$codigo);
     $data= CarecargPeer::doSelectOne($c);
     if ($data)
     {
       if ($eltipo=='P')
       {
        $mitotal=$elmonto;
        $codigopresupuestario=$data->getCodpre();
        $a= new Criteria();
        $a->add(CpasiiniPeer::PERPRE,'00');
        $a->add(CpasiiniPeer::CODPRE,$codigopresupuestario);
        $data2= CpasiiniPeer::doSelectOne($a);
        if ($data2)
        {
          $mondis=self::montoDisponible($codigopresupuestario);
          if ($mitotal > $mondis)
          {
            $chequeardisponibilidadrecargo=false;
            $sobregirorecargo=true;
          }
          else
          {
            $chequeardisponibilidadrecargo=true;
            $sobregirorecargo=false;
          }
        }
        else
        {
          $chequeardisponibilidadrecargo=false;
          $sobregirorecargo=true;
        }
       }
       else
       {
         self::acumularUnidad($elmonto,$grid,&$gridunidad);
         $l=0;
         while ($l<count($gridunidad))
         {
          $codigopresupuestario=$gridunidad[$l][0].'-'.$data->getCodpre();
          $mitotal=$gridunidad[$l][1];
          $c= new Criteria();
          $c->add(CpasiiniPeer::PERPRE,'00');
          $c->add(CpasiiniPeer::CODPRE,$codigopresupuestario);
          $data3= CpasiiniPeer::doSelectOne($c);
          if ($data3)
          {
             $mondis=self::montoDisponible2($codigopresupuestario);
             if ($mitotal > $mondis)
             {
               $chequeardisponibilidadrecargo=false;
               $sobregirorecargo=true;
             }
             else
             {
               $chequeardisponibilidadrecargo=true;
               $sobregirorecargo=false;
             }
          }
          else
          {
            $chequeardisponibilidadrecargo=false;
            $sobregirorecargo=true;
          }
           $l++;
         }
       }
     }
    return $chequeardisponibilidadrecargo;
   }

     public static function montoDisponible2($codigopre)
  {
    $c= new Criteria();
    $c->add(CpdefnivPeer::CODEMP,'001');
    $resul=CpdefnivPeer::doSelectOne($c);
    if (count($resul)>0)
    {
      $a="SELECT nomabr as nombre FROM CPNIVELES ORDER BY CONSEC";
      if (Herramientas::BuscarDatos($a,&$result))
      {
        $longitud=0;
        for ($nivel=1;$nivel<=$resul->getNivdis();$nivel++)
        {
          $longitud= $longitud +(strlen($result[$nivel-1]["nombre"]))+1;
        }
        $longitud=$longitud-1;
        $anno=split('-',$resul->getFeccie());
        $var = substr($codigopre, 0, $longitud);
         $sql="select mondis from cpasiini where codpre ='".$var."'  and perpre='00'";
         if (Herramientas::BuscarDatos($sql,&$result))
         {
           $montodisponible=$result[0]['mondis'];
        }
        else{ $montodisponible=0;}
      }else{ $montodisponible=0;}
    }else{ $montodisponible=0;}

    return $montodisponible;
  }

   public static function verificarDispGenComp($solegreso,&$msjuno,&$codi1,&$msjdos,&$codi2,&$codi3)
   {
    $ultimochequeo=true;
    $sobregiro=false;
    $sobregirorecargo=false;
    $msjuno=-1; $codi1="";
    $msjdos=-1; $codi2="";
    $j=0;
    $c= new Criteria();
    $regis= CadefartPeer::doSelectOne($c);
    if ($regis)
    {
      $tiporec= $regis->getAsiparrec();
    }


    $l= new Criteria();
    $l->add(CaartsolPeer::REQART,$solegreso->getReqart());
    $objetos= CaartsolPeer::doSelect($l);
    if ($objetos)
    {
       foreach ($objetos as $obj)
       {
           if (!self::chequearDisponibilidadPresupuesto3($solegreso,$objetos,$obj->getCodpre(),$tiporec,&$sobregiro))
	       {
	        $msjuno=113; $codi1=$obj->getCodart(); $codi3=$obj->getCodpre();
	        break;
	       }
	       if ($sobregiro)
	      {
	       $ultimochequeo=false;
	       break;
	      }
	      $j++;
       }
       if (!$ultimochequeo)
       return $ultimochequeo;

    $j=0;
    $requi=$solegreso->getReqart();
    $arr_recargo=array();
    $indarr_rec=0;
    foreach ($objetos as $datos)
    {
	    $marcado=$datos->getCheck();
	    $unidad=$datos->getCodcat();
	    $codpresu=$datos->getCodpre();
	    if ($marcado=="1")
	    {
	      if ($datos->getDatosrecargo()!='')
	      {
	      $cadenarec=split('!',$datos->getDatosrecargo());
	          $r=0;
	          while ($r<(count($cadenarec)-1))
	          {
	            $aux=$cadenarec[$r];
	            $aux2=split('_',$aux);
	            if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
	            {
	            $arr_recargo[$indarr_rec]['codart']=$datos->getCodart();
	            $arr_recargo[$indarr_rec]['codcat']=$datos->getCodcat();
	            $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
	            $montorecargo= Herramientas::toFloat($aux2[4]);
	            $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
	            $indarr_rec++;
	            }
	            $r++;
	          }
	      }
	    }
    }

    $h = 0;
    $arrTotRec=array();
    $cont=-1;
    while ($h < count($arr_recargo))
     {
        $codrgo=$arr_recargo[$h]['codrgo'];
        if (self::BuscarCodrgoenArreglo($arrTotRec,$codrgo,&$j))
        {
            $arrTotRec[$j]['monrgo']= $arrTotRec[$j]['monrgo'] + $arr_recargo[$h]['monrgo'];
        }
        else
        {
            $cont++;
            $arrTotRec[$cont]['codrgo'] = $arr_recargo[$h]['codrgo'];//codrgo
            $arrTotRec[$cont]['monrgo'] = $arr_recargo[$h]['monrgo'];//monrgo
        }
      $h++;
     }

     //Chequear disponibilidad por recargo
      $z=0;
      $gridunidad=array();
      $procede=true;
      while (($z<count($arrTotRec)) && ($procede==true))
      {
        $montouno=$arrTotRec[$z]['monrgo'];
        $montodos=0;
        if ($solegreso->getId())//Consulta/modificacion
        {
	      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
	      $c= new Criteria();
	      $c->add(CargosolPeer::REQART,$solegreso->getReqart());
	      $c->add(CargosolPeer::CODRGO,$arrTotRec[$z]['codrgo']);
	      $c->add(CargosolPeer::TIPDOC,$tipdoc);
	      $datrec=CargosolPeer::doSelectOne($c);
	      if ($datrec)
	          $montodos=$datrec->getMonrgo();
        }

        if ($montouno > $montodos)
        {
         $elmonto=$montouno - $montodos;
         if (!self::chequearDisponibilidadRecargo3($arrTotRec[$z]['codrgo'],$elmonto,$tiporec,$objetos,$gridunidad,&$sobregirorecargo))
         {
           $procede=false;
           $msjdos=114; $codi2=$arrTotRec[$z]['codrgo'];
           break;
         }else { $msjdos=-1; $codi2="";}
        }
        $z++;
      }
	}

      if ($sobregirorecargo) $ultimochequeo=false;

     return $ultimochequeo;
   }

   public static function chequearDisponibilidadPresupuesto3($solegreso,$objetos,$codpre,$tiporec,&$sobregiro)
   {
     $mitotal=0;
     $z=0;

     foreach ($objetos as $datos)
     {
     	$codigopresupuestario= $datos->getCodpre();
     	if ($codpre==$codigopresupuestario)
     	{
     	  $cantidad=$datos->getCanreq();
          $costo=$datos->getCosto();
          $recargo=$datos->getMonrgo();
          if ($tiporec!='C')
	      {
	        $mitotal= $mitotal + ($cantidad*$costo);
	      }
	      else
	      {
	        $mitotal= $mitotal + $recargo;
	      }
     	}

     }

    if ($codpre!="")
    {
     $anno=substr($solegreso->getFecreq(),0,4);

      if (Herramientas::Monto_disponible_ejecucion($anno,$codpre,&$mondis))
      {
        if (H::toFloat($mitotal) > H::toFloat($mondis))
        {
          $chequeardisponibilidadpresupuesto=false;
          $sobregiro=true;
        }
        else
        {
          $chequeardisponibilidadpresupuesto=true;
          $sobregiro=false;
        }
      }
      else
      {

        $chequeardisponibilidadpresupuesto=false;
        $sobregiro=true;
      }
    }
    else
    {
      $chequeardisponibilidadpresupuesto=false;
      $sobregiro=true;
    }

    return $chequeardisponibilidadpresupuesto;
  }

   public static function chequearDisponibilidadRecargo3($codigo,$elmonto,$eltipo,$objetos,$gridunidad,&$sobregirorecargo)
   {
     if ($codigo=="")
     { $mitotal=0;}
     else { $mitotal=$elmonto;}

     $c= new Criteria();
     $c->add(CarecargPeer::CODRGO,$codigo);
     $data= CarecargPeer::doSelectOne($c);
     if ($data)
     {
       if ($eltipo=='P')
       {
        $mitotal=$elmonto;
        $codigopresupuestario=$data->getCodpre();
        $a= new Criteria();
        $a->add(CpasiiniPeer::PERPRE,'00');
        $a->add(CpasiiniPeer::CODPRE,$codigopresupuestario);
        $data2= CpasiiniPeer::doSelectOne($a);
        if ($data2)
        {
          $mondis=self::montoDisponible($codigopresupuestario);
          if ($mitotal > $mondis)
          {
            $chequeardisponibilidadrecargo=false;
            $sobregirorecargo=true;
          }
          else
          {
            $chequeardisponibilidadrecargo=true;
            $sobregirorecargo=false;
          }
        }
        else
        {
          $chequeardisponibilidadrecargo=false;
          $sobregirorecargo=true;
        }
       }
       else
       {
         self::acumularUnidad3($elmonto,$objetos,&$gridunidad);
         $l=0;
         while ($l<count($gridunidad))
         {
          $codigopresupuestario=$gridunidad[$l][0].'-'.$data->getCodpre();
          $mitotal=$gridunidad[$l][1];
          $c= new Criteria();
          $c->add(CpasiiniPeer::PERPRE,'00');
          $c->add(CpasiiniPeer::CODPRE,$codigopresupuestario);
          $data3= CpasiiniPeer::doSelectOne($c);
          if ($data3)
          {
             $mondis=self::montoDisponible($codigopresupuestario);
             if ($mitotal > $mondis)
             {
               $chequeardisponibilidadrecargo=false;
               $sobregirorecargo=true;
             }
             else
             {
               $chequeardisponibilidadrecargo=true;
               $sobregirorecargo=false;
             }
          }
          else
          {
            $chequeardisponibilidadrecargo=false;
            $sobregirorecargo=true;
          }
           $l++;
         }
       }
     }
    return $chequeardisponibilidadrecargo;
   }

   public static function acumularUnidad3($monto,$objetos,&$gridunidad)
   {
     $acum=0;
     $r=0;
     foreach ($objetos as $obj)
     {
       $cantidad=$obj->getCanreq();
       $costo=$obj->getCosto();
       $recargo=$obj->getMonrgo();
      if ($obj->getCheck()=='1' && $recargo>0)
      {
        $acum=$acum + ($cantidad*$costo);
      }
       $r++;
     }

     $totalunidad=0;
     $k=0;
     foreach ($objetos as $obj1)
     {
       $cantidad=$obj1->getCanreq();
       $costo=$obj1->getCosto();
       $recargo=$obj1->getMonrgo();
       $recargo2=$obj1->getMonrgo2();
      if ($obj1->getCheck()=='1')
      {
        if ($recargo2>0)
        {
          $monto=$recargo - $recargo2;
        }else { $monto=$recargo;}
        $totart=$costo*$cantidad;
        $j=0;
        if (count($gridunidad) >0)
        {
          while ($j<count($gridunidad))
          {
            $encontrado=false;
            if ($obj1->getCodcat()==$gridunidad[$j][0])
            {
             $encontrado=true;
             $fila=$j;
             break;
            }
            $j++;
          }
          if ($encontrado==true)
          {
            $mont=self::montoRecargo($acum,$monto,$totart);
            $gridunidad[$fila][1]=$gridunidad[$fila][1]+ $mont;
          }
          else
          {
            $indice=count($gridunidad);
            $gridunidad[$indice][0]=$obj1->getCodcat();
            $gridunidad[$indice][1]=self::montoRecargo($acum,$monto,$totart);
          }
        }
        else
        {
          $gridunidad[$j][0]=$obj1->getCodcat();
          $gridunidad[$j][1]=self::montoRecargo($acum,$monto,$totart);
        }
      }
       $k++;
     }
   }

}
?>
