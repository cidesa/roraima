<?php
class Obras
{
  /*Guardar oycdefret */
  public static function Guardar_oycdefret($octipret,&$coderror)
  {
  	if ($octipret->getCodtip())
  	{
	  	$octipret_new = new Octipret();
		$octipret_new->setCodtip($octipret->getCodtip());
		$octipret_new->setDestip($octipret->getDestip());
		$octipret_new->setCodcon($octipret->getCodcon());
		if ($octipret->getPorret()=='S')
	    {
			$octipret_new->setBasimp($octipret->getBasimp());
			$octipret_new->setPorret($octipret->getPorret());
			$octipret_new->setUnitri(0);
			$octipret_new->setFactor(0);
			$octipret_new->setPorsus(0);
	    }
		else
		{
			$octipret_new->setBasimp($octipret->getBasimp());
			$octipret_new->setPorret(0);
			$octipret_new->setUnitri($octipret->getUnitri());
			$octipret_new->setFactor($octipret->getFactor());
			$octipret_new->setPorsus($octipret->getPorsus());
		}
		if ($octipret->getStamon()=='S')
	    	$octipret_new->setStamon('N');
	    else
	    	$octipret_new->setStamon('T');
  	    $octipret_new->save();
	    return true;

  	}
	else
	{
  		$coderror=124;
    	return false;
	}
  }

	/************** Tipos de Solicitud: Oycdeftipsol  *************************/
	public static function EliminarOycdeftipsol($octipsol)
	{
		if (Herramientas::buscarCodigoPadre('codsol', 'ocregsol', $octipsol->getCodsol())== true)
		{
			//Se chequea que el Tipo de Solicitud no este asociados a una Solicitud
			return 1000;
		}else{
			$octipsol->delete();
			return -1;
			}
	}


	/************** Tipos de Solicitudes: Oycregsol  *************************/
	public static function EliminarOycregsol($octipsol)
	{
		if (Herramientas::buscarCodigoPadre('numsol', 'ocressol', $octipsol->getNumsol())== true)
		{
			//Esta Solicitud no puede ser eliminada ya que Tiene una Respuesta
			return 1001;
		}else{
			$octipsol->delete();
			return -1;
			}
	}


	/************** Tipos de Solicitantes: oycdatsol  *************************/
	public static function EliminarOycdatsol($octipsol)
	{
		if (Herramientas::buscarCodigoPadre('cedste', 'ocregsol', $octipsol->getCedste())== true)
		{
			//Esta Solicitud no puede ser eliminada ya que Tiene una Respuesta
			return 1002;
		}else{
			$octipsol->delete();
			return -1;
			}
	}



public static function salvarLicitacion($ocreglic, $grid)
{
  $ocreglic->save();
  $x=$grid[0];
  $j=0;
  while ($j<count($x))
  {
     if ($x[$j]->getHistproc()!='')
     {
     $x[$j]->setCodlic($ocreglic->getCodlic());
     $x[$j]->save();
     }
     $j++;
  }

  $z=$grid[1];
  $j=0;
  if (!empty($z[$j])) {
  while ($j<count($z))
  {
    $z[$j]->delete();
    $j++;
  }
  }
}


  public static function salvarEmpresasOfertas($ocemppar,$grid)
  {
  	$obra=$ocemppar->getCodobr();
  /*	$c= new Criteria();
  	$c->add(OcempparPeer::CODOBR,$obra);
  	OcempparPeer::doDelete($c);*/

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpro()!="")
     {
      $x[$j]->setCodobr($obra);
      if ($x[$j]->getPrecal()==0)
      {
       $x[$j]->setPrecal(null);
      }
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

  public static function salvarOycdesobr($ocregobr,$grid1,$grid2,&$msj)
 {
   if (!$ocregobr->getId())
   {
    $ocregobr->setUnocon('N');
    $ocregobr->setStaobr('A');
   }
   $referencia='OB'.(substr($ocregobr->getCodobr(),2,strlen($ocregobr->getCodobr())));
   self::generaPrecompromiso($ocregobr,$referencia,&$msj);

   if ($msj==-1)
   {
   	 $ocregobr->setCodobr($referencia);
     $ocregobr->save();
     self::grabarPresupuesto($ocregobr,$grid1);
     self::actualizarPartidas($ocregobr,$grid1);
     self::grabarInspectores($ocregobr,$grid2);
     self::generarImputacionesPrecompromiso($ocregobr);
   return true;
   }
 }

 public static function grabarPresupuesto($ocregobr,$grid1)
 {
 	$x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpar()!="")
     {
      $x[$j]->setCodobr($ocregobr->getCodobr());
      $x[$j]->setAdipar('N');
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid1[1];
    $j=0;
    if (!empty($z[$j])) {
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
    }
 }

 public static function actualizarPartidas($ocregobr,$grid1)
 {
   $x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpar()!="")
     {
       $c= new Criteria();
       $c->add(OcdefparPeer::CODPAR,$x[$j]->getCodpar());
       $data=OcdefparPeer::doSelectOne($c);
       if ($data)
       {
       	 $data->getCosuni($x[$j]->getCosuni());
       	 $data->save();
       }
     }
     $j++;
    }
 }

 public static function grabarInspectores($ocregobr,$grid2)
 {
 	$x=$grid2[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCedins()!="")
     {
      $x[$j]->setCodobr($ocregobr->getCodobr());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid2[1];
    $j=0;
    if (!empty($z[$j])) {
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
    }
 }

 public static function eliminarOycdesobr($ocregobr)
 {
 	$c= new Criteria();
 	$c->add(OcregconPeer::CODOBR,$ocregobr->getCodobr());
 	$reg=OcregconPeer::doSelectOne($c);
 	if (!$reg)
 	{
 	  Herramientas::EliminarRegistro('Ocpreobr','Codobr',$ocregobr->getCodobr());
 	  Herramientas::EliminarRegistro('Ocinginsobr','Codobr',$ocregobr->getCodobr());
 	  Herramientas::EliminarRegistro('Ocregobr','Codobr',$ocregobr->getCodobr());
 	  self::eliminarPrecompromiso($ocregobr->getCodobr());
 	  $ocregobr->delete();
 	  return true;
 	}
 	else
 	{
      return false;
 	}
 }

 public static function salvarPresupEmp($ocoferpre,$grid)
  {
  	$obra=$ocoferpre->getCodobr();
  	$contra=$ocoferpre->getCodpro();

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     $ocoferpre= new Ocoferpre();
     $ocoferpre->setCodpro($contra);
     $ocoferpre->setCodobr($obra);
     $ocoferpre->setCodpar($x[$j]->getCodpar());
     $ocoferpre->setCant($x[$j]->getCant());
     $ocoferpre->setPrecio($x[$j]->getPrecio());
     $ocoferpre->setMontot($x[$j]->getMontot());
     $ocoferpre->save();
     $j++;
    }
  }

  public static function salvarOycregpro($caprovee,$grid1,$grid2,$grid3)
  {
    if (!$caprovee->getId())
    {
      self::grabarEspecialidad($caprovee);

    }
    $caprovee->save();
    self::grabarRecaudos($caprovee,$grid1);
    self::grabarPersonal($caprovee,$grid2);
    self::grabarEquipos($caprovee,$grid3);
    if (self::agregaBenefi($caprovee)==true)
    {
      self::grabarBenefi($caprovee);
    }
  }

  public static function grabarEspecialidad($caprovee)
  {
    $especialidad= new Ocproesp();
    $especialidad->setCodpro($caprovee->getCodpro());
    $especialidad->setCodtipesp($caprovee->getCodtipesp());
    $especialidad->save();
  }

  public static function grabarRecaudos($caprovee,$grid1)
  {
 	$x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodrec()!="")
     {
      $x[$j]->setCodpro($caprovee->getCodpro());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid1[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarPersonal($caprovee,$grid2)
  {
 	$x=$grid2[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCedper()!="")
     {
      $x[$j]->setCodpro($caprovee->getCodpro());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid2[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarEquipos($caprovee,$grid3)
  {
 	$x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodequ()!="")
     {
      $x[$j]->setCodpro($caprovee->getCodpro());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid3[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function agregaBenefi($caprovee)
  {
    $c= new Criteria();
    $c->add(OpbenefiPeer::CEDRIF, $caprovee->getRifpro());
    $ben= OpbenefiPeer::doSelectOne($c);
    if ($ben)
    {return false;}
    else {return true;}
  }

  public static function grabarBenefi($caprovee)
  {
  	$c = new Criteria();
  	$c->add(OptipbenPeer::DESTIPBEN,'PROVEEDORES-CONTRATISTAS-CONSULTORES');
  	$dat=OptipbenPeer::doSelect($c);
  	if ($dat)
  	{ $codigo=$dat->getCodtipben(); }else{ $codigo=null;}
    $benefi= new Opbenefi();
    $benefi->setCedrif($caprovee->getRifpro());
    $benefi->setNitben($caprovee->getNitpro());
    $benefi->setNomben($caprovee->getNompro());
    $benefi->setDirben($caprovee->getDirpro());
    $benefi->setTelben($caprovee->getTelpro());
    $benefi->setCodcta($caprovee->getCodcta());
    $benefi->setCodtipben($codigo);
    $benefi->save();
  }

  public static function eliminarOycregpro($caprovee)
 {
 	$c= new Criteria();
 	$c->add(OcregconPeer::CODPRO,$caprovee->getCodpro());
 	$reg=OcregconPeer::doSelectOne($c);
 	if ($reg)
 	{
 	  Herramientas::EliminarRegistro('Carecpro','Codpro',$caprovee->getCodpro());
 	  Herramientas::EliminarRegistro('Ocproequ','Codpro',$caprovee->getCodpro());
 	  Herramientas::EliminarRegistro('Ocproper','Codpro',$caprovee->getCodpro());
 	  Herramientas::EliminarRegistro('Ocproesp','Codpro',$caprovee->getCodpro());
 	  $caprovee->delete();
 	  return true;
 	}
 	else
 	{
      return false;
 	}
 }

  public static function salvarOycdescon($ocregcon,$grid1,$grid2,$grid3,$grid4,$nuevo)
  {
    $c= new Criteria();
    $registro=OcdefempPeer::doSelectOne($c);
    if ($registro)
    {
      if ($registro->getPlaini()!='')
      {
       if ($ocregcon->getPlatie()==""){ $ocregcon->setPlatie('D');}
       $ocregcon->save();
       //self::grabarenCompras($ocregcon);
       self::grabarIngRes($ocregcon,$grid1);
       if ($ocregcon->getTipcon()!=$registro->getCodconins() and $ocregcon->getTipcon()!=$registro->getCodconsup() and $ocregcon->getTipcon()!=$registro->getCodconpro())
       {
     	self::grabarPartidas($ocregcon,$grid2);
     	self::generarCompromiso($ocregcon,$grid2,$nuevo);
       }
       else
       {
     	if ($ocregcon->getTipcon()==$registro->getCodconins() or $ocregcon->getTipcon()==$registro->getCodconsup() or $ocregcon->getTipcon()==$registro->getCodconpro())
     	{
          self::grabarOfertas($ocregcon,$grid4);
     	}
       }
       self::grabarDeducciones($ocregcon,$grid3);
       	return true;
      }
      else
      {	return false;}
    }else { return false;}
  }

  public static function grabarenCompras($ocregcon)
  {
    $caordcon= new Caordcon();
    $caordcon->setOrdcon($ocregcon->getCodcon());
    $caordcon->setFeccon(date('Y-m-d'));
    $caordcon->setTipcon($ocregcon->getTipcon());
    $caordcon->setCodpro($ocregcon->getCodpro());
    $caordcon->setObjcon($ocregcon->getDescon());
    $caordcon->setFecini($ocregcon->getFecini());
    $caordcon->setFeccul($ocregcon->getFecfin());
    $caordcon->setMoncon($ocregcon->getMoncon());
    $caordcon->setStacon('A');
    $caordcon->save();

    $c= new Criteria();
    $c->add(CadetordcPeer::ORDCON,$ocregcon->getCodcon());
    $eli=CadetordcPeer::doDelete($c);

    $cadetordc= new Cadetordc();
    $cadetordc->setOrdcon($ocregcon->getCodcon());
    $cadetordc->setCodpre($ocregcon->getCodpre());
    $cadetordc->setDescon($ocregcon->getDespre());
    $cadetordc->setMoncon($ocregcon->getMoncon());
    $cadetordc->setCancon(1);
    $cadetordc->save();
  }

  public static function grabarIngRes($ocregcon,$grid1)
  {
 	$x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCeding()!="")
     {
      $x[$j]->setCodcon($ocregcon->getCodcon());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid1[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarPartidas($ocregcon,$grid2)
  {
    $c= new Criteria();
    $c->add(OcparconPeer::CODCON,$ocregcon->getCodcon());
    $data=OcparconPeer::doSelect($c);
    if ($data)
    {
    	foreach ($data as $obj)
    	{
    	  $c= new Criteria();
    	  $c->add(OcpreobrPeer::CODPAR,$obj->getCodpar());
    	  $c->add(OcpreobrPeer::CODOBR,$ocregcon->getCodobr());
    	  $reg=OcpreobrPeer::doSelectOne($c);
    	  if ($reg)
    	  {
    	  	$reg->setCancon($reg->getCancon()+$obj->getCancon());
    	  	$reg->save();
    	  }
    	  $obj->delete();
    	}
    }

    $suma_cant_con=0;
    $x=$grid2[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpar()!="" && $x[$j]->getCant()>0)
     {
      $ocparcon= new Ocparcon();
      $ocparcon->setCodcon($ocregcon->getCodcon());
      $ocparcon->setCodpar($x[$j]->getCodpar());
      $ocparcon->setCancon($x[$j]->getCant());
      $suma_cant_con= $suma_cant_con + $x[$j]->getCant();
      $ocparcon->setCanval($x[$j]->getCanval());
      $ocparcon->save();
     }
     $j++;
    }

     $sql="select coalesce(sum(canobr),0) as monto from ocpreobr where codobr='".$ocregcon->getCodobr()."';";
     if (Herramientas :: BuscarDatos($sql, & $result))
     {
     	if ($suma_cant_con==$result[0]["monto"] && $suma_cant_con!=0)
     	{
     	  $c= new Criteria();
     	  $c->add(OcregobrPeer::CODOBR,$ocregcon->getCodobr());
     	  $regis=OcregobrPeer::doSelectOne($c);
     	  if ($regis)
     	  {
     	  	$regis->setUnocon('S');
     	  	$regis->save();
     	  }
     	}
     }

     $x=$grid2[0];
     $j=0;
     while ($j<count($x))
     {
      if ($x[$j]->getCodpar()!="")
      {
      	$c= new Criteria();
      	$c->add(OcpreobrPeer::CODPAR,$x[$j]->getCodpar());
      	$c->add(OcpreobrPeer::CODOBR,$ocregcon->getCodobr());
      	$data=OcpreobrPeer::doSelectOne($c);
      	if ($data)
      	{
      		$data->setCancon($data->getCancon()+$x[$j]->getCant());
      		$data->save();
      	}
      }

     $j++;
    }
  }

  public static function grabarOfertas($ocregcon,$grid4)
  {
 	$x=$grid4[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodtippro()!="")
     {
      $x[$j]->setCodcon($ocregcon->getCodcon());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid4[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarDeducciones($ocregcon,$grid3)
  {
 	$x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodtip()!="")
     {
      $x[$j]->setCodcon($ocregcon->getCodcon());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid3[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function salvarOyctartip($octipprl,$grid)
  {
    $c= new Criteria();
 	$c->add(OctartipPeer::CODTIPPRO,$octipprl->getCodtippro());
 	OctartipPeer::doDelete($c);

 	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getExppro()!="")
     {
      $x[$j]->setCodtippro($octipprl->getCodtippro());
      $x[$j]->setNumniv($j+1);
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

  public static function salvarOycinscon($ocinscon,$grid)
  {
  	$ocinscon->setPorobreje($ocinscon->getNumins());
  	$ocinscon->save();
  	self::grabarPartidasIns($ocinscon,$grid);
  }

  public static function grabarPartidasIns($ocinscon,$grid)
  {
    /*$c= new Criteria();
 	$c->add(OcparinsPeer::CODCON,$ocinscon->getCodcon());
 	OcparinsPeer::doDelete($c);*/

 	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpar()!="")
     {
      $x[$j]->setCodcon($ocinscon->getCodcon());
      $x[$j]->setNumins($ocinscon->getNumins());
      $x[$j]->save();
     }
     $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j])) {
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
    }
  }

  public static function arregloFinDet($obra,&$arreglodet)
  {
  	$arreglodet=array();
  	$c= new Criteria();
  	$c->add(OcpreobrPeer::CODOBR,$obra);
  	$resultado= OcpreobrPeer::doSelect($c);
  	if ($resultado)
  	{
  	  foreach($resultado as $obj)
  	  {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["codpar"]=$obj->getCodpar();
         $arreglodet[$j-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$obj->getCodpar());
         if ($obj->getAdipar()=='N')
         {
           $cantobr=$obj->getCanobr()*$obj->getCosuni();
           $arreglodet[$j-1]["canobr"]=number_format($cantobr,2,',','.');
           $sql="Select RC.CodCon as codcon from OcPreObr PO,OcRegVal RV,OcRegCon RC where PO.CodObr='".$obra."' and RC.CodObr='".$obra."' and RC.CodCon=RV.CodCon and RV.CodTipVal='03'";
           if (Herramientas :: BuscarDatos($sql, & $result))
           {
           	 $cal=$obj->getCanconfin()*$obj->getCosuni();
             $arreglodet[$j-1]["caneje"]=number_format($cal,2,',','.');
           }
           else
           {
           	$sql="select sum(PO.CosUni*PC.CanVal) as coseje from OcParCon PC, OcRegCon RC,OcPreObr PO where PO.codobr='".$arreglodet[$j-1]["codpar"]."' and PO.Codpar='".$arreglodet[$j-1]["codpar"]."' and RC.codobr='".$obra."' and RC.codcon=PC.codcon and PC.codpar='".$arreglodet[$j-1]["codpar"]."' and RC.stacon<>'N';";
           	if (Herramientas :: BuscarDatos($sql, & $result))
            {
              $arreglodet[$j-1]["caneje"]=number_format($result[0]["coseje"],2,',','.');
            }else { $arreglodet[$j-1]["caneje"]="0,00"; }
           }
           $calculo=Herramientas::convnume($arreglodet[$j-1]["canobr"]) - Herramientas::convnume($arreglodet[$j-1]["caneje"]);
           $arreglodet[$j-1]["candif"]=number_format($calculo,2,',','.');
           $calculo2=((100/Herramientas::convnume($arreglodet[$j-1]["canobr"]))*Herramientas::convnume($arreglodet[$j-1]["caneje"]));
           $arreglodet[$j-1]["poreje"]=number_format($calculo2,2,',','.');
           $arreglodet[$j-1]["subtot"]=$arreglodet[$j-1]["caneje"];
           $arreglodet[$j-1]["canadi"]="";
         }
         else
         {
           $arreglodet[$j-1]["canobr"]="0,00";
           $cal=$obj->getCanconfin()*$obj->getCosuni();
           $arreglodet[$j-1]["caneje"]=number_format($cal,2,',','.');
           $arreglodet[$j-1]["candif"]="0,00";
           $arreglodet[$j-1]["poreje"]=number_format(100,2,',','.');
           $arreglodet[$j-1]["subtot"]=$arreglodet[$j-1]["caneje"];
           $arreglodet[$j-1]["canadi"]="";
         }
         if ($obj->getAdipar()=='S')
         {
         	$arreglodet[$j-1]["canadi"]="O";
         }
         $arreglodet[$j-1]["id"]="9";
  	  }
  	}
  }

  public static function arregloFinFis($obra,&$arreglofis)
  {
  	$arreglofis=array();
  	$sql="Select RC.CodCon from OcPreObr PO,OcRegVal RV,OcRegCon RC where PO.CodObr='".$obra."' and RC.CodObr='".$obra."' and RC.CodCon=RV.CodCon and RV.CodTipVal='03'";
    if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $c= new Criteria();
  	  $c->add(OcpreobrPeer::CODOBR,$obra);
  	  $resultado= OcpreobrPeer::doSelect($c);
  	  if ($resultado)
  	  {
        foreach($resultado as $obj2)
        {
          $k=count($arreglofis)+1;
          $arreglofis[$k-1]["codpar"]=$obj2->getCodpar();
          $arreglofis[$k-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$obj2->getCodpar());
           if ($obj2->getAdipar()=='N')
           {
              $arreglofis[$k-1]["canobr"]=number_format($obj2->getCanobr(),2,',','.');
              $arreglofis[$k-1]["caneje"]=number_format($obj2->getCanconfin(),2,',','.');
              $arreglofis[$k-1]["porrep"]="0,00";
              $calculo=((100/Herramientas::convnume($arreglofis[$k-1]["canobr"]))* Herramientas::convnume($arreglofis[$k-1]["caneje"]));
              $arreglofis[$k-1]["poreje"]=number_format($calculo,2,',','.');
              $arreglofis[$k-1]["canadi"]="";
           }
           else
           {
           	  $arreglofis[$k-1]["canobr"]="0,00";
              $arreglofis[$k-1]["caneje"]=number_format($obj2->getCanconfin(),2,',','.');
              $arreglofis[$k-1]["porrep"]="0,00";
              $arreglofis[$k-1]["poreje"]=number_format(100,2,',','.');
              $arreglofis[$k-1]["canadi"]="";
           }
           if ($obj2->getAdipar()=='S')
           {
         	$arreglofis[$k-1]["canadi"]="O";
           }
           $arreglofis[$k-1]["id"]="8";
        }
  	  }
    }
    else
    {
      $c= new Criteria();
  	  $c->add(OcpreobrPeer::CODOBR,$obra);
  	  $resultado= OcpreobrPeer::doSelect($c);
  	  if ($resultado)
  	  {
  	  	foreach($resultado as $obj2)
        {
          $k=count($arreglofis)+1;
          $arreglofis[$k-1]["codpar"]=$obj2->getCodpar();
          $arreglofis[$k-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$obj2->getCodpar());
           if ($obj2->getAdipar()=='N')
           {
           	$arreglofis[$k-1]["canobr"]=number_format($obj2->getCanobr(),2,',','.');
           	$sql1="select coalesce(sum(PC.canval),0) as canval ,coalesce(Sum(PC.cancon),0) as cancom from ocparcon PC, ocregcon RC where RC.codobr='".$obra."' and RC.codcon=PC.codcon and PC.codpar='".$arreglofis[$k-1]["codpar"]."'and RC.stacon<>'N';";
           	if (Herramientas :: BuscarDatos($sql1, & $resulta))
            {
                 $arreglofis[$k-1]["caneje"]=number_format($resulta[0]["canval"],2,',','.');
            }
            $arreglofis[$k-1]["porrep"]="0,00";
            $calculo=((100/Herramientas::convnume($arreglofis[$k-1]["canobr"]))* Herramientas::convnume($arreglofis[$k-1]["caneje"]));
            $arreglofis[$k-1]["poreje"]=number_format($calculo,2,',','.');
            $arreglofis[$k-1]["canadi"]="";
           }
           else
           {
              $arreglofis[$k-1]["canobr"]="0,00";
              $arreglofis[$k-1]["caneje"]=number_format($obj2->getCanconfin(),2,',','.');
              $arreglofis[$k-1]["porrep"]="0,00";
              $arreglofis[$k-1]["poreje"]=number_format(100,2,',','.');
              $arreglofis[$k-1]["canadi"]="";
           }

           if ($obj2->getAdipar()=='S')
           {
         	$arreglofis[$k-1]["canadi"]="O";
           }
           $arreglofis[$k-1]["id"]="8";
        }
  	  }
    }
 }

  public static function arregloFinDetCon($obra,$contrato,&$arreglodetcon,&$total)
  {
  	$arreglodetcon=array();
  	$total='';
  	$c= new Criteria();
  	$c->add(OcregvalPeer::CODCON,$contrato);
  	$c->add(OcregvalPeer::CODTIPVAL,'03');
  	$resultado= OcregvalPeer::doSelect($c);
  	if ($resultado)
  	{
  	    $sql="Select PO.CodPar as codpar,PO.CanObr as canobr,PO.CanCon as cancon,PO.CanConFin as canconfin,PO.AdiPar as adipar,PO.CosUni as cosuni,PO.CosUniFin as cosunifin from OcPreObr PO,OcRegCon RC where RC.codcon='".$contrato."' and PO.codobr='".$obra."';";
  	    if (Herramientas :: BuscarDatos($sql, & $result))
        {
          $i=0;
          while ($i<count($result))
          {
          	$j=count($arreglodetcon)+1;
            $arreglodetcon[$j-1]["codpar"]=$result[$i]["codpar"];
            $arreglodetcon[$j-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$result[$i]["codpar"]);
            if ($result[$i]["adipar"]=='N')
            {
              $cantobr=$result[$i]["canobr"]*$result[$i]["cosuni"];
              $arreglodetcon[$j-1]["canobr"]=number_format($cantobr,2,',','.');
              $cal=$result[$i]["canconfin"]*$result[$i]["cosunifin"];
              $arreglodetcon[$j-1]["caneje"]=number_format($cal,2,',','.');
              $calculo=Herramientas::convnume($arreglodetcon[$j-1]["canobr"]) - Herramientas::convnume($arreglodetcon[$j-1]["caneje"]);
              $arreglodetcon[$j-1]["candif"]=number_format($calculo,2,',','.');
              $calculo2=((100/Herramientas::convnume($arreglodetcon[$j-1]["canobr"]))*Herramientas::convnume($arreglodetcon[$j-1]["caneje"]));
              $arreglodetcon[$j-1]["poreje"]=number_format($calculo2,2,',','.');
              $arreglodetcon[$j-1]["canadi"]="";
            }
            else
            {
               $arreglodetcon[$j-1]["canobr"]="0,00";
               $cal=$result[$i]["canconfin"]*$result[$i]["cosunifin"];
               $arreglodetcon[$j-1]["caneje"]=number_format($cal,2,',','.');
               $arreglodetcon[$j-1]["candif"]="0,00";
               $arreglodetcon[$j-1]["poreje"]=number_format(100,2,',','.');
               $arreglodetcon[$j-1]["canadi"]="";
            }
            $arreglodetcon[$j-1]["subtot"]=$arreglodetcon[$j-1]["caneje"];
            if ($result[$i]["adipar"]=='S')
            {
         	 $arreglodetcon[$j-1]["canadi"]="O";
            }
            $arreglodetcon[$j-1]["id"]="9";
          	$i++;
          }
          $total='1';
        }
  	  }
  	  else
  	  {
        $sql="Select PC.CodPar,PC.CanCon,PO.CosUni from OcParCon PC,OcPreObr PO,OcRegCon RC where PC.CodCon='".$contrato."' and RC.codcon='".$contrato."' and PO.codpar=PC.codpar and PO.codobr='".$obra."';";
        if (Herramientas :: BuscarDatos($sql, & $result))
        {
          $i=0;
          while ($i<count($result))
          {
          	$j=count($arreglodetcon)+1;
            $arreglodetcon[$j-1]["codpar"]=$result[$i]["codpar"];
            $arreglodetcon[$j-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$result[$i]["codpar"]);
            $cantobr=$result[$i]["cancon"]*$result[$i]["cosuni"];
            $arreglodetcon[$j-1]["canobr"]=number_format($cantobr,2,',','.');
            $sql1="select sum(PO.cosuni*PC.canval) as CosEje from ocparcon PC, ocregcon RC,ocpreobr PO where PO.codobr='".$obra."' and PO.Codpar='".$arreglodetcon[$j-1]["codpar"]."' and RC.CodCon='".$contrato."' and RC.codcon=PC.codcon and PC.codpar='".$arreglodetcon[$j-1]["codpar"]."';";
            if (Herramientas :: BuscarDatos($sql1, & $resultados))
            {
              $arreglodetcon[$j-1]["caneje"]=number_format($resultados[0]["coseje"],2,',','.');
            }
            $calculo=Herramientas::convnume($arreglodetcon[$j-1]["canobr"]) - Herramientas::convnume($arreglodetcon[$j-1]["caneje"]);
            $arreglodetcon[$j-1]["candif"]=number_format($calculo,2,',','.');
            $calculo2=((100/Herramientas::convnume($arreglodetcon[$j-1]["canobr"]))*Herramientas::convnume($arreglodetcon[$j-1]["caneje"]));
            $arreglodetcon[$j-1]["poreje"]=number_format($calculo2,2,',','.');
            $arreglodetcon[$j-1]["subtot"]=$arreglodetcon[$j-1]["caneje"];
            $arreglodetcon[$j-1]["canadi"]="";
            $arreglodetcon[$j-1]["id"]="9";
            $i++;
          }
          $total='2';
        }
  	  }
  }

  public static function arregloFinFisCon($obra,$contrato,&$arreglofiscon)
  {
  	$arreglofiscon=array();
  	$c= new Criteria();
  	$c->add(OcregvalPeer::CODCON,$contrato);
  	$c->add(OcregvalPeer::CODTIPVAL,'03');
  	$resultado= OcregvalPeer::doSelect($c);
  	if ($resultado)
  	{
  	  $sql="Select PO.CodPar,PO.CanObr,PO.CanObr,PO.CanConFin,PO.AdiPar,PO.CosUni,PO.CosUniFin from OcPreObr PO,OcRegCon RC where RC.codcon='".$contrato."' and PO.codobr='".$obra."';";
  	  if (Herramientas :: BuscarDatos($sql, & $result))
      {
      	$i=0;
          while ($i<count($result))
          {
          	$k=count($arreglofiscon)+1;
            $arreglofiscon[$k-1]["codpar"]=$result[$i]["codpar"];
            $arreglofiscon[$k-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$result[$i]["codpar"]);
            if ($result[$i]["adipar"]=='N')
            {
              $arreglofiscon[$k-1]["canobr"]=number_format($result[$i]["canobr"],2,',','.');
              $arreglofiscon[$k-1]["caneje"]=number_format($result[$i]["canconfin"],2,',','.');
              $arreglofiscon[$k-1]["porrep"]="0,00";
              $calculo2=((100/Herramientas::convnume($arreglofiscon[$k-1]["canobr"]))*Herramientas::convnume($arreglofiscon[$k-1]["caneje"]));
              $arreglofiscon[$k-1]["poreje"]=number_format($calculo2,2,',','.');
              $arreglofiscon[$k-1]["canadi"]="";
            }
            else
            {
               $arreglofiscon[$k-1]["canobr"]="0,00";
               $arreglofiscon[$k-1]["caneje"]=number_format($result[$i]["canconfin"],2,',','.');
               $arreglofiscon[$k-1]["porrep"]="0,00";
               $arreglofiscon[$k-1]["poreje"]=number_format(100,2,',','.');
               $arreglofiscon[$k-1]["canadi"]="";
            }

            if ($result[$i]["adipar"]=='S')
            {
         	 $arreglofiscon[$k-1]["canadi"]="O";
            }
            $arreglofiscon[$k-1]["id"]="8";
          	$i++;
          }
      }
  	}
  	else
  	{
      $c= new Criteria();
      $c->add(OcparconPeer::CODCON,$contrato);
      $reg= OcparconPeer::doSelect($c);
      if ($reg)
      {
      	foreach ($reg as $obj)
      	{
      	  	$k=count($arreglofiscon)+1;
            $arreglofiscon[$k-1]["codpar"]=$obj->getCodpar();
            $arreglofiscon[$k-1]["despar"]=Herramientas::getX('CODPAR','Ocdefpar','despar',$obj->getCodpar());
            $arreglofiscon[$k-1]["canobr"]=number_format($obj->getCancon(),2,',','.');
            $arreglofiscon[$k-1]["caneje"]=number_format($obj->getCanval(),2,',','.');
            $arreglofiscon[$k-1]["porrep"]="0,00";
            $calculo2=((100/Herramientas::convnume($arreglofiscon[$k-1]["canobr"]))*Herramientas::convnume($arreglofiscon[$k-1]["caneje"]));
            $arreglofiscon[$k-1]["poreje"]=number_format($calculo2,2,',','.');
            $arreglofiscon[$k-1]["canadi"]="";
            $arreglofiscon[$k-1]["id"]="8";
      	}
      }
  	}
  }

  public static function verificarStatus($codcon)
  {
  	$c= new Criteria();
  	$c->add(OcregconPeer::CODCON,$codcon);
  	$registro= OcregconPeer::doSelectOne($c);
  	if ($registro)
  	{
      if ($registro->getStacon()=='N')
      {	return false;}
      else { return true;}
  	}else { return true;}
  }

  public static function verificarContrato($codcon,$eliminar_contrato,&$verificar_contrato)
  {
  	if ($eliminar_contrato==true)
  	{
  	  $c = new Criteria();
  	  $c->add(CaordconPeer::ORDCON,$codcon);
  	  $c->add(CaordconPeer::STACON,'C');
  	  $resul= CaordconPeer::doSelectOne($c);
  	  if ($resul)
  	  {
        $verificar_contrato=true;
        return true;
  	  }
  	  else
  	  {
  	  	$verificar_contrato=false;
  	  }

  	  $c = new Criteria();
  	  $c->add(OcregvalPeer::CODCON,$codcon);
  	  $result= OcregvalPeer::doSelectOne($c);
  	  if ($result)
  	  {
        $verificar_contrato=true;
        return true;
  	  }
  	  else
  	  {
  	  	$verificar_contrato=false;
  	  }
  	}
  	else
  	{
  	  $c = new Criteria();
  	  $c->add(OcregvalPeer::CODCON,$codcon);
  	  $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
  	  $result= OcregvalPeer::doSelectOne($c);
  	  if ($result)
  	  {
        $verificar_contrato=true;
        return true;
  	  }
  	  else
  	  {
  	  	$verificar_contrato=false;
  	  }
  	}

  	  $c = new Criteria();
  	  $c->add(OcregvalPeer::CODCON,$codcon);
  	  $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
  	  $result= OcregvalPeer::doSelectOne($c);
  	  if ($result)
  	  {
        $verificar_contrato=true;
        return true;
  	  }
  	  else
  	  {
  	  	$verificar_contrato=false;
  	  }

  	  $c = new Criteria();
  	  $c->add(OcregactPeer::CODCON,$codcon);
  	  $result= OcregactPeer::doSelectOne($c);
  	  if ($result)
  	  {
        $verificar_contrato=true;
        return true;
  	  }
  	  else
  	  {
  	  	$verificar_contrato=false;
  	  }

  	  $c = new Criteria();
  	  $c->add(OcregconPeer::CODCON,$codcon);
  	  $datacon= OcregconPeer::doSelectOne($c);
  	  if ($datacon)
  	  {
  	  	$code=$datacon->getRefcon();
  	  }else $code='';

  	  $sql="Select sum(moncau) as  monto from Cpimpcom where RefCom = '".$code."'";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        if ($result[0]["monto"]>0)
        {
        	$verificar_contrato=true;
            return true;
        }else  $verificar_contrato=false;
      }else  $verificar_contrato=false;
  }

  public static function generaPrecompromiso($ocregobr,$referencia,&$msj)
  {
    $msj=-1;
    if ($ocregobr->getId()!="")
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
      $cpprecom= new Cpprecom();
      $cpprecom->setRefprc($referencia);
      $cpprecom->setFecprc($ocregobr->getFecini());
      $cpprecom->setTipprc($ocregobr->getCodtipobr());
      $cpprecom->setAnoprc(substr($ocregobr->getFecini(),0,4));
      $cpprecom->setDesanu(null);
      $cpprecom->setDesprc($ocregobr->getDesobr());
      $cpprecom->setMonprc($ocregobr->getMonobr());
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

  public static function generarImputacionesPrecompromiso($ocregobr)
  {
  	$referencia=$ocregobr->getCodobr();

    $registro = new Cpimpprc();
    $registro->setRefprc($referencia);
    $registro->setCodpre($ocregobr->getCodpre());
    $registro->setMonimp($ocregobr->getSubtot());
    $registro->setMoncom(0);
    $registro->setMoncau(0);
    $registro->setMonpag(0);
    $registro->setMonaju(0);
    $registro->setStaimp('A');
    $registro->save();

    $registro2 = new Cpimpprc();
    $registro2->setRefprc($referencia);
    $registro2->setCodpre($ocregobr->getCodpreiva());
    $registro2->setMonimp($ocregobr->getMoniva());
    $registro2->setMoncom(0);
    $registro2->setMoncau(0);
    $registro2->setMonpag(0);
    $registro2->setMonaju(0);
    $registro2->setStaimp('A');
    $registro2->save();
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

  public static function chequearDisponibilidadPresupuesto($codpre,$anno,$grid,$num,$monto,&$mondis)
   {
   	 $mitotal=0;
     if ($num=='1')
     {

     /*$l=$grid[0];
     $z=0;
     while ($z<count($l))
     {
       $cantidad=$l[$z]->getCanobr();
       $costo=$l[$z]->getCosuni();
       $mitotal= $mitotal + ($cantidad*$costo);
      $z++;
     }*/
     $mitotal=$monto;
     }
     else
     {
     	$mitotal=$monto;
     }
     if (Herramientas::Monto_disponible_ejecucion($anno,$codpre,&$mondis))
     {
        if ($mitotal > $mondis)
        {
          $chequeardisponibilidadpresupuesto=false;
        }
        else
        {
          $chequeardisponibilidadpresupuesto=true;
        }
      }
      else
      {
        $chequeardisponibilidadpresupuesto=false;
      }
    return $chequeardisponibilidadpresupuesto;
   }

   public static function generarCompromiso($ocregcon,$grid2,$nuevo)
   {
     if ($nuevo=='')
     {
     	$referencia='CT'.(substr($ocregcon->getCodcon(),2,strlen($ocregcon->getCodcon())));

     	$cpcompro= new Cpcompro();
     	$cpcompro->setRefcom($referencia);
     	$cpcompro->setTipcom($ocregcon->getTipcon());
     	$cpcompro->setFeccom($ocregcon->getFeccon());
     	$cpcompro->setAnocom(substr($ocregcon->getFeccon(),0,4));
     	$cpcompro->setRefprc($ocregcon->getCodobr());
     	$tipprc=Herramientas::getX('codobr','ocregobr','codtipobr',$ocregcon->getCodobr());
     	$cpcompro->setTipprc($tipprc);
     	$cpcompro->setDescom($ocregcon->getDescon());
     	$cpcompro->setDesanu(null);
     	$cpcompro->setMoncom($ocregcon->getMoncon());
     	$cpcompro->setSalcau(0);
     	$cpcompro->setSalpag(0);
     	$cpcompro->setSalaju(0);
     	$cpcompro->setStacom('A');
     	$cpcompro->setFecanu(null);
     	$cpcompro->setCedrif($ocregcon->getCodpro());
     	$cpcompro->setTipo('A');
     	$cpcompro->save();

     	//Imputaciones

     	$registro = new Cpimpcom();
	    $registro->setRefcom($referencia);
	    $registro->setCodpre($ocregcon->getCodpre());
	    $registro->setMonimp($ocregcon->getSubtot());
	    $registro->setMoncau(0);
	    $registro->setMonpag(0);
	    $registro->setMonaju(0);
	    $registro->setStaimp('A');
	    $registro->setRefere($ocregcon->getCodobr());
	    $registro->save();

        $registro1 = new Cpimpcom();
	    $registro1->setRefcom($referencia);
	    $registro1->setCodpre($ocregcon->getCodpreiva());
	    $registro1->setMonimp($ocregcon->getMoniva());
	    $registro1->setMoncau(0);
	    $registro1->setMonpag(0);
	    $registro1->setMonaju(0);
	    $registro1->setStaimp('A');
	    $registro1->setRefere($ocregcon->getCodobr());
	    $registro1->save();

	    // Actualizar Ocregcon

	    $c= new Criteria();
	    $c->add(OcregconPeer::CODCON,$ocregcon->getCodcon());
	    $resul= OcregconPeer::doSelectOne($c);
	    if ($resul)
	    {
	      $resul->setRefcom($referencia);
	      $resul->save();
	    }
     }
  }

  public static function eliminarCompromiso($referencia)
  {
      $c= new Criteria();
      $c->add(CpimpcomPeer::REFCOM,$referencia);
      $result=CpimpcomPeer::doSelect($c);
      if ($result)
      {
      	foreach ($result as $obj)
      	{
      		$obj->delete();
      	}
      }

      $c= new Criteria();
      $c->add(CpcomproPeer::REFCOM,$referencia);
      CpcomproPeer::doDelete($c);

  }

  public static function salvarOycadjobr($ocadjobr,&$error)
  {
  	$gridnuevo = array ();
    $gridnuevo2 = array ();

    $ocadjobr->save();

    $error = -1;
    if ($ocadjobr->getStatus()== 1 && $ocadjobr->getCodprogan()!='')
    {
      $obra= $ocadjobr->getCodobr();
      $c = new Criteria();
      $c->add(OcoferprePeer::CODOBR,$obra);
      $c->add(OcoferprePeer::CODPRO,$ocadjobr->getCodprogan());
      $result = OcoferprePeer::doSelect($c);
      if ($result)
      {
         foreach ($result as $datos) {
          $c = new Criteria();
          $c->add(OcpreobrPeer::CODOBR, $obra);
          $c->add(OcpreobrPeer::CODPAR, $datos->getCodpar());
          $resul = OcpreobrPeer::doselectOne($c);
          if ($resul) {
            $indice = count($gridnuevo) + 1;
            $gridnuevo[$indice -1][0] = $datos->getCodpar();

            $cantinew=$datos->getCant(); //Si la Contratista ofrecio una cantidad diferente
            if ($cantinew!=$resul->getCanobr())
            $gridnuevo[$indice -1][1] = $cantinew;
            else $gridnuevo[$indice -1][1] = $resul->getCanobr();

            $costonew=$datos->getPrecio();
            if ($costonew != $resul->getCosuni()) {
              $gridnuevo[$indice -1][2] = $costonew;
            } else {
              $gridnuevo[$indice -1][2] = $resul->getCosuni();
            }
          }
        }
      }
      $c= new Criteria();
      $c->add(OcregobrPeer::CODOBR,$obra);
      $dat= OcregobrPeer::doSelectOne($c);
      if ($dat)
      {
      	$codpre=$dat->getCodpre();
      	$anno=substr($dat->getFecini(),0,4);
      }

      $nopuedeaumentar = false;
      if (!self :: chequearDisponibilidad($codpre,$anno,$gridnuevo))
      {
        $nopuedeaumentar = true;
      }

      if ($nopuedeaumentar!=true)
      {
        self::actualizarObras($obra,$gridnuevo);
      }else  $error = 1007;

      return true;
    }
    return true;
  }

   public static function chequearDisponibilidad($codpre,$anno,$grid)
   {
   	 $mitotal=0;
   	 $i = 0;
     while ($i < count($grid))
     {
      $mitotal = $mitotal + ($grid[$i][1] * $grid[$i][2]);
      $i++;
    }

    if (Herramientas::Monto_disponible_ejecucion($anno,$codpre,&$mondis))
     {
        if ($mitotal > $mondis)
        {
          $chequeardisponibilidadpresupuesto=false;
        }
        else
        {
          $chequeardisponibilidadpresupuesto=true;
        }
      }
      else
      {
        $chequeardisponibilidadpresupuesto=false;
      }
    return $chequeardisponibilidadpresupuesto;
   }

   public static function actualizarObras($obra,$gridnuevo)
   {
     $c = new Criteria(); //Actualiza el Maestro Ocregobr
     $c->add(OcregobrPeer::CODOBR, $obra);
     $resul = OcregobrPeer::doSelectOne($c);
     if ($resul)
     {
       self :: montoTotal($gridnuevo, &$montototal1);
       $montoiva=(($montototal1*$resul->getIvaobr())/100);
       $resul->setMonobr($montototal1 + $montoiva);
       $resul->setMoniva($montoiva);
       $resul->setSubtot($montototal1);
       $resul->save();
     }
     self::actualizaPrecompromiso($obra);

     $j = 0;
     while ($j < count($gridnuevo)) //Actualiza el detalle de la Obra
     {
        $c = new Criteria();
        $c->add(OcpreobrPeer::CODOBR,$obra);
        $c->add(OcpreobrPeer::CODPAR, $gridnuevo[$j][0]);
        $dato2 = OcpreobrPeer::doSelectOne($c);
        if ($dato2) {
            $dato2->setCanobr($gridnuevo[$j][1]);
            $dato2->setCosuni($gridnuevo[$j][2]);
            $dato2->save();
        }
      $j++;
     }

     $c = new Criteria();
     $c->add(OcregobrPeer::CODOBR, $obra);
     $resul1 = OcregobrPeer::doSelectOne($c);
     if ($resul1)
     {
       self::generarImputacionesPrecompromiso($resul1);
     }
   }


   public static function montoTotal($gridnuevo, & $montototal1)
   {
      $montototal1 = 0;
      $e = 0;
      while ($e < count($gridnuevo))
      {
        $montototal1 = $montototal1 + ($gridnuevo[$e][1] * $gridnuevo[$e][2]);
      $e++;
      }
   }

   public static function actualizaPrecompromiso($referencia)
  {
      $c = new Criteria();
      $c->add(CpimpprcPeer::REFPRC,$referencia);
      CpimpprcPeer::doDelete($c);

      $c = new Criteria();
      $c->add(CpprecomPeer::REFPRC,$referencia);
      CpprecomPeer::doDelete($c);

      $c = new Criteria();
      $c->add(CpprecomPeer::REFPRC,$referencia);
      $existe = CpprecomPeer::doSelectOne($c);
      if (!$existe)
      {
      	$c = new Criteria();
        $c->add(OcregobrPeer::CODOBR, $referencia);
        $data = OcregobrPeer::doSelectOne($c);
        if ($data) {
	      $cpprecom= new Cpprecom();
	      $cpprecom->setRefprc($referencia);
	      $cpprecom->setFecprc($data->getFecini());
	      $cpprecom->setTipprc($data->getCodtipobr());
	      $cpprecom->setAnoprc(substr($data->getFecini(),0,4));
	      $cpprecom->setDesanu(null);
	      $cpprecom->setDesprc($data->getDesobr());
	      $cpprecom->setMonprc($data->getMonobr());
	      $cpprecom->setSalcom(0.00);
	      $cpprecom->setSalcau(0.00);
	      $cpprecom->setSalpag(0.00);
	      $cpprecom->setSalaju(0.00);
	      $cpprecom->setStaprc('A');
	      $cpprecom->setcedrif(null);
	      $cpprecom->save();
        }
     }
  }

  public static function Correlativo($codcon,$codtipval)
  {
    $sql="SELECT coalesce(MAX(to_number(numval,'999')),0) as numval FROM OCREGval where codcon='".$codcon."' and codtipval= '".$codtipval."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
     $num=$result[0]["numval"]+1;
     $numval=str_pad($num, 2, '0', STR_PAD_LEFT);
    }
    return $numval;
  }

 public static function salvarOycval($ocregval,$grid1,$grid2,$grid3,$grid4,$nuevo)
 {
   $ocregval->setStaval('E');
   $ocregval->save();
   self::actualizarContrato($ocregval);
   self::grabarDeduccionesVal($ocregval,$grid1);
   self::grabarInspectoresVal($ocregval,$grid2);

    $c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $val_ant=$reg->getCodvalant();
      $val_par=$reg->getCodvalpar();
      $val_fin=$reg->getCodvalfin();
      $val_ret=$reg->getCodvalret();
      $val_rec=$reg->getCodvalrec();
      $con_ins=$reg->getCodconins();
      $con_sup=$reg->getCodconsup();
      $con_pro=$reg->getCodconpro();
    }
    else
    {
      $val_ant="";
      $val_par="";
      $val_fin="";
      $val_ret="";
      $val_rec="";
      $con_ins="";
      $con_sup="";
      $con_pro="";
    }
    $codtipcon=Herramientas::getX('CODCON','Ocregcon','tipcon',$ocregval->getCodcon());
    switch($ocregval->getCodtipval())
    {
      case $val_par:
      case $val_fin:
	     switch($codtipcon)
         {
           case ($con_ins || $con_sup || $con_pro):
             self::grabarOfertasVal($ocregval,$grid3,$val_fin);
             break;
           default:
             self::grabarPartidasVal($ocregval,$grid4,$val_par,$val_rec,$val_fin);
             break;
         }
	    break;
	  case $val_rec:
	    self::grabarPartidasVal($ocregval,$grid4,$val_par,$val_rec,$val_fin);
	    break;
	  default:
	    break;
    }
 }

 public static function actualizarContrato($ocregval)
 {
 	$c= new Criteria();
 	$c->add(OcregconPeer::CODCON,$ocregval->getCodcon());
 	$reg= OcregconPeer::doSelectOne($c);
 	if ($reg)
 	{
 	 $monext=$ocregval->getAumobr() + $ocregval->getObrext();
 	 $monmod=$ocregval->getAumobr() - $ocregval->getDisobr() + $ocregval->getObrext();
 	 $reg->setMonext($monext);
 	 $reg->setMonmod($monmod);
 	 $reg->save();
 	}
 }

   public static function grabarDeduccionesVal($ocregval,$grid1)
  {
  	$c= new Criteria();
  	$c->add(OcretvalPeer::CODCON,$ocregval->getCodcon());
  	$c->add(OcretvalPeer::NUMVAL,$ocregval->getNumval());
  	$c->add(OcretvalPeer::CODTIPVAL,$ocregval->getCodtipval());
  	OcretvalPeer::doDelete($c);

 	$x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     $porret=H::convnume($x[$j]["porret"]);
     if ($x[$j]["codtip"]!="" && $porret>0)
     {
       $ocretval= new Ocretval();
       $ocretval->setCodcon($ocregval->getCodcon());
       $ocretval->setCodtipval($ocregval->getCodtipval());
       $ocretval->setNumval($ocregval->getNumval());
       $ocretval->setCodtip($x[$j]["codtip"]);
       $ocretval->setPorret($x[$j]["porret"]);
       $ocretval->setMonret($x[$j]["monret"]);
       $ocretval->save();
     }
     $j++;
    }
  }

  public static function grabarInspectoresVal($ocregval,$grid2)
  {
    $x=$grid2[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCedins()!="")
     {
       $x[$j]->setCodcon($ocregval->getCodcon());
       $x[$j]->setCodtipval($ocregval->getCodtipval());
       $x[$j]->setNumval($ocregval->getNumval());
       $x[$j]->save();
     }
     $j++;
    }

    $z=$grid2[1];
    $j=0;
    if (!empty($z[$j])) {
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
    }
  }

  public static function grabarOfertasVal($ocregval,$grid3,$val_fin)
  {
  	//Eliminar
  	$c= new Criteria();
  	$c->add(OcofeservalPeer::CODCON,$ocregval->getCodcon());
  	$c->add(OcofeservalPeer::NUMVAL,$ocregval->getNumval());
  	$c->add(OcofeservalPeer::CODTIPVAL,$ocregval->getCodtipval());
  	$data= OcofeservalPeer::doSelect($c);
  	if ($data)
  	{
  	  foreach ($data as $obj)
  	  {
        $a= new Criteria();
        $a->add(OcofeserPeer::CODCON,$ocregval->getCodcon());
        $a->add(OcofeserPeer::CODTIPPRO,$obj->getCodtippro());
        $a->add(OcofeserPeer::NIVPRO,$obj->getNivpro());
        $a->add(OcofeserPeer::EXPPRO,$obj->getExppro());
        $reg= OcofeserPeer::doSelectOne($a);
        if ($reg)
        {
          if ($val_fin!=$ocregval->getCodtipval())
          {
          	$reg->setCanval($reg->getCanval() - $obj->getCantidad());
          }
          else
          {
          	$reg->setCanhorfin($reg->getCanhorfin() - $obj->getCantidad());
          }
          $reg->save();
        }
  	  	$data->delete();
  	  }
  	}
 //Guardar
 	$x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]["codtippro"]!="")
     {
       $ocofeserval = new Ocofeserval();
       $ocofeserval->setCodcon($ocregval->getCodcon());
       $ocofeserval->setCodtipval($ocregval->getCodtipval());
       $ocofeserval->setNumval($ocregval->getNumval());
       $ocofeserval->setCodtippro($x[$j]["codtippro"]);
       $ocofeserval->setNivpro($x[$j]["nivpro"]);
       $ocofeserval->setExppro($x[$j]["exppro"]);
       $ocofeserval->setCantidad($x[$j]["cantidad"]);
       $ocofeserval->save();
     }
     $j++;
    }

     if ($val_fin!=$ocregval->getCodtipval())
     {
       $x=$grid3[0];
	    $j=0;
	    while ($j<count($x))
	    {
          if ($x[$j]["codtippro"]!="")
          {
            $a= new Criteria();
	        $a->add(OcofeserPeer::CODCON,$ocregval->getCodcon());
	        $a->add(OcofeserPeer::CODTIPPRO,$x[$j]["codtippro"]);
	        $a->add(OcofeserPeer::NIVPRO,$x[$j]["nivpro"]);
	        $a->add(OcofeserPeer::EXPPRO,$x[$j]["exppro"]);
	        $reg= OcofeserPeer::doSelectOne($a);
	        if ($reg)
	        {
	          $reg->setCanval($reg->getCanval() + (H::convnume($x[$j]["cantidad"])));
	          $reg->save();
	        }
          }
	     $j++;
	    }
     }
     else
     {
       $x=$grid3[0];
	    $j=0;
	    while ($j<count($x))
	    {
          if ($x[$j]["codtippro"]!="")
          {
            $a= new Criteria();
	        $a->add(OcofeserPeer::CODCON,$ocregval->getCodcon());
	        $a->add(OcofeserPeer::CODTIPPRO,$x[$j]["codtippro"]);
	        $a->add(OcofeserPeer::NIVPRO,$x[$j]["nivpro"]);
	        $a->add(OcofeserPeer::EXPPRO,$x[$j]["exppro"]);
	        $reg= OcofeserPeer::doSelectOne($a);
	        if ($reg)
	        {
	          $reg->setCanhorfin($reg->getCanhorfin() + (H::convnume($x[$j]["cantidad"])));
	          $reg->save();
	        }
          }
	     $j++;
	    }
     }

  }

  public static function grabarPartidasVal($ocregval,$grid4,$val_par,$val_rec,$val_fin)
  {
  	$c= new Criteria();
  	$c->add(OcparvalPeer::CODCON,$ocregval->getCodcon());
  	$c->add(OcparvalPeer::NUMVAL,$ocregval->getNumval());
  	$c->add(OcparvalPeer::CODTIPVAL,$ocregval->getCodtipval());
  	$dat= OcparvalPeer::doSelect($c);
  	if ($dat)
  	{
      foreach ($dat as $objeto)
      {
       switch($ocregval->getCodtipval())
       {
         case $val_par:
           $a= new Criteria();
           $a->add(OcparconPeer::CODCON,$ocregval->getCodcon());
           $a->add(OcparconPeer::CODPAR,$objeto->getCodpar());
           $regi= OcparconPeer::doSelectOne($a);
           if ($regi)
           {
             $regi->setCanval($regi->getCanval() - $objeto->getCantidad());
             $regi->save();
           }
          break;
         case $val_rec:
           $a= new Criteria();
           $a->add(OcpreobrPeer::CODOBR,$ocregval->getCodobr());
           $a->add(OcpreobrPeer::CODPAR,$objeto->getCodpar());
           $regi= OcpreobrPeer::doSelectOne($a);
           if ($regi)
           {
             $regi->setCosunifin(0);
             $regi->save();
           }
          break;
         case $val_fin:
           $a= new Criteria();
           $a->add(OcpreobrPeer::CODOBR,$ocregval->getCodobr());
           $a->add(OcpreobrPeer::CODPAR,$objeto->getCodpar());
           $regi= OcpreobrPeer::doSelectOne($a);
           if ($regi)
           {
           	 $regi->setCanconfin($regi->getCanconfin() - $objeto->getCantidad());
             $regi->setCosunifin(0);
             $regi->save();
           }
          break;
       }
      $dat->delete();
      }
  	}

 	$x=$grid4[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]["codpar"]!="")
     {
      $ocparval= new Ocparval();
      $ocparval->setCodcon($ocregval->getCodcon());
      $ocparval->setCodtipval($ocregval->getCodtipval());
      $ocparval->setNumval($ocregval->getNumval());
      $ocparval->setCodpar($x[$j]["codpar"]);
      $ocparval->setCantidad($x[$j]["cantidad"]);
      $ocparval->save();
     }
     $j++;
    }

    //Actualizamos el Contrato y la Obra
    switch($ocregval->getCodtipval())
      {
	    case ($val_par):
	      $l=0;
          while ($l<count($x))
          {
	       if ($x[$l]["codpar"]!="")
	       {
	         $c= new Criteria();
	         $c->add(OcparconPeer::CODCON,$ocregval->getCodcon());
	         $c->add(OcparconPeer::CODPAR,$x[$l]["codpar"]);
	         $reg= OcparconPeer::doSelectOne($c);
	         if ($reg)
	         {
	     	  $reg->setCanval($reg->getCanval() + (H::convnume($x[$l]["cantidad"])));
	     	  $reg->save();
	         }
	       }
	       $l++;
          }
	     break;
	    case ($val_rec):
	     $l=0;
          while ($l<count($x))
          {
	       if ($x[$l]["codpar"]!="")
	       {
		     $c= new Criteria();
		     $c->add(OcpreobrPeer::CODOBR,$ocregval->getCodobr());
		     $c->add(OcpreobrPeer::CODPAR,$x[$l]["codpar"]);
		     $reg= OcpreobrPeer::doSelectOne($c);
		     if ($reg)
		     {
		     	$reg->setCanconfin($x[$l]["cantidad"]);
		     	$reg->setCosunifin($x[$l]["cosuni"]);
		     	$reg->save();
		     }
		   }
	       $l++;
          }
	     break;
	    case ($val_fin):
	      $l=0;
          while ($l<count($x))
          {
	       if ($x[$l]["codpar"]!="")
	       {
		     $c= new Criteria();
		     $c->add(OcpreobrPeer::CODOBR,$ocregval->getCodobr());
		     $c->add(OcpreobrPeer::CODPAR,$x[$l]["codpar"]);
		     $reg= OcpreobrPeer::doSelectOne($c);
		     if ($reg)
		     {
		     	if ($reg->getCanobr()>0)
		     	{
		     	  $reg->setCodobr($ocregval->getCodobr());
		     	  $reg->setCodpar($x[$l]["codpar"]);
		     	  $reg->setCanobr($reg->getCanobr());
		     	  $reg->setCancon($reg->getCancon());
		     	  $reg->setCosuni($reg->getCosuni());
		     	  $reg->setAdipar('N');
		     	  $reg->setCanconfin($reg->getCanconfin + (H::convnume($x[$l]["cantidad"])));
		     	  $reg->setCosunifin($x[$l]["cosuni"]);
		     	  $reg->save();
		     	}
                else
                {
                  $reg->setCodobr($ocregval->getCodobr());
		     	  $reg->setCodpar($x[$l]["codpar"]);
		     	  $reg->setCanobr(0);
		     	  $reg->setCancon(0);
		     	  $reg->setCosuni(Herramientas::getX('CODPAR','Ocdefpar','cosuni',$x[$l]["codpar"]));
		     	  $reg->setAdipar('S');
		     	  $reg->setCanconfin($reg->getCanconfin + (H::convnume($x[$l]["cantidad"])));
		     	  $reg->setCosunifin($x[$l]["cosuni"]);
		     	  $reg->save();
                }
		     }
		     else
		     {
		     	$reg= new Ocpreobr();
		     	$reg->setCodobr($ocregval->getCodobr());
		     	$reg->setCodpar($x[$l]["codpar"]);
		     	$reg->setCanobr(0);
		     	$reg->setCancon(0);
		     	$reg->setCosuni(Herramientas::getX('CODPAR','Ocdefpar','cosuni',$x[$l]["codpar"]));
		     	$reg->setAdipar('S');
		     	$reg->setCanconfin($reg->getCanconfin + (H::convnume($x[$l]["cantidad"])));
		     	$reg->setCosunifin($x[$l]["cosuni"]);
		     	$reg->save();
		     }
		   }
	       $l++;
          }
	     break;
      }
  }

  public static function llevar_a_viernes($fecha,&$mensaje)
  {
  	$javascript="";
    $dia_semana=date("l",strtotime($fecha));
    $llevarviernes=date('d/m/Y',strtotime($fecha));
    if ($dia_semana=='Saturday')
    {
      $fec_dis=Herramientas::dateAdd('d',1,$fecha,'-');
      $mensaje="La Fecha de Terminación corresponde al Sábado ".date('d/m/Y',strtotime($fecha))." y será llevada al viernes ".date('d/m/Y',strtotime($fec_dis));
      $llevarviernes=$fec_dis;
    }
    if ($dia_semana=='Sunday')
    {
      $fec_dis=Herramientas::dateAdd('d',2,$fecha,'-');
      $mensaje="La Fecha de Terminación corresponde al Domingo ".date('d/m/Y',strtotime($fecha))." y será llevada al viernes ".date('d/m/Y',strtotime($fec_dis));
      $llevarviernes=$fec_dis;
    }
    return $llevarviernes;
  }

  public static function actualizarFechas($ocregact)
  {
  	$c= new Criteria();
    $reg= OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
    $c= new Criteria();
    $c->add(OcregconPeer::CODCON,$ocregact->getCodcon());
    $data= OcregconPeer::doSelectOne($c);

    switch ($ocregact->getCodtipact())
    {
      case $reg->getCodactini():
        $data->setFecini($ocregact->getFecact());
       break;
      case $reg->getCodactproini():
        $data->setFecproini($ocregact->getFecact());
       break;
      case $reg->getCodactproter():
        $data->setFecpro($ocregact->getFecact());
       break;
      case $reg->getCodactrecpro():
        $data->setFecrecprov($ocregact->getFecact());
       break;
      case $reg->getCodactrecdef():
        $data->setFecrecdef($ocregact->getFecact());
       break;
    }
    $data->save();
    }
  }

  public static function actualizarStatus($ocregact)
  {
    $c= new Criteria();
    $c->add(OcregconPeer::CODCON,$ocregact->getCodcon());
    $data= OcregconPeer::doSelectOne($c);

    $c= new Criteria();
    $reg= OcdefempPeer::doSelectOne($c);

    if ($data->getStacon()=='A' && $ocregact->getCodtipact()==$reg->getCodactini())
    {
       switch ($data->getPlatie())
       	{
          case 'D':
           $fechatemp=Herramientas::dateAdd('d',$data->getTieejecon(),$ocregact->getFecact(),'+');
           $dato=self::llevar_a_viernes($fechatemp,&$mensaje);
           break;
          case 'S':
           $fechatemp=Herramientas::dateAdd('ww',$data->getTieejecon(),$ocregact->getFecact(),'+');
           $dato=self::llevar_a_viernes($fechatemp,&$mensaje);
           break;
          case 'M':
           $fechatemp=Herramientas::dateAdd('m',$data->getTieejecon(),$ocregact->getFecact(),'+');
           $dato=self::llevar_a_viernes($fechatemp,&$mensaje);
           break;
       	}

       	$data->setStacon('E');
       	$data->setFecini($ocregact->getFecact());
       	$data->setFecfin($dato);
       	$data->setFecfinmod($dato);
       	$data->save();

       	$c= new Criteria();
       	$c->add(OcregobrPeer::CODOBR,$ocregact->getCodobr());
       	$datas= OcregobrPeer::doselectOne($c);
       	if ($datas)
       	{
       		if ($datas->getUnocon()=='S')
       		{
       			$datas->setStaobr('E');
       			$datas->setFecini($ocregact->getFecact());
       			$datas->setFecfin($data->getFecfin());
       			$datas->save();
       		}
       	}
     }

     if ($data->getStacon()=='E')
     {
     	if ($ocregact->getCodtipact()==$reg->getCodactpar())
     	{
          $data->setStacon('P');
       	  $data->setFecpar($ocregact->getFecact());
       	  $data->save();

       	  $c= new Criteria();
       	  $c->add(OcregobrPeer::CODOBR,$ocregact->getCodobr());
       	  $datas= OcregobrPeer::doselectOne($c);
       	  if ($datas)
       	  {
       		if ($datas->getUnocon()=='S')
       		{
       		  $datas->setStaobr('P');
       		  $datas->save();
       		}
       	  }
     	}
     	else
     	{
     	  if ($ocregact->getCodtipact()==$reg->getCodactter())
     	  {
            $data->setStacon('T');
       	    $data->save();

       	    $c= new Criteria();
       	    $c->add(OcregobrPeer::CODOBR,$ocregact->getCodobr());
       	    $datas= OcregobrPeer::doselectOne($c);
       	    if ($datas)
       	    {
       		  if ($datas->getUnocon()=='S')
       		  {
       		   $datas->setStaobr('P');
       		   $datas->save();
       		  }
       	    }
     	  }
     	}
     }

     if ($data->getStacon()=='P' && $ocregact->getCodtipact()==$reg->getCodactrei())
     {
     	 $data->setStacon('E');
       	 $data->setFecrei($ocregact->getFecact());
       	 $diasadicionales=Herramientas::dateDiff('d',$data->getFecpar(),$ocregact->getFecact());
       	 $fechatemp=Herramientas::dateAdd('d',$diasadicionales,$data->getFecfinmod(),'+');
    	 $data->setFecfinmod($fechatemp);
    	 $data->save();

    	 $c= new Criteria();
   	     $c->add(OcregobrPeer::CODOBR,$ocregact->getCodobr());
   	     $datas= OcregobrPeer::doselectOne($c);
   	     if ($datas)
   	     {
   		   if ($datas->getUnocon()=='S')
   		   {
   		    $datas->setStaobr('E');
   		    $datas->save();
   		   }
   	     }
     }


  }

  public static function verificarAnticipo($codcon,$tipval)
  {
  	$c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $val_ant=$reg->getCodvalant();
      $val_par=$reg->getCodvalpar();
      $val_fin=$reg->getCodvalfin();
      $val_ret=$reg->getCodvalret();
      $val_rec=$reg->getCodvalrec();
      $con_ins=$reg->getCodconins();
      $con_sup=$reg->getCodconsup();
      $con_pro=$reg->getCodconpro();
    }
    else
    {
      $val_ant="";
      $val_par="";
      $val_fin="";
      $val_ret="";
      $val_rec="";
      $con_ins="";
      $con_sup="";
      $con_pro="";
    }

  	$c= new Criteria();
  	$c->add(OcregvalPeer::CODCON,$codcon);
  	$c->add(OcregvalPeer::CODTIPVAL,$val_ant);
  	$registro= OcregvalPeer::doSelectOne($c);
  	if ($registro)
  	{
      if ($val_ret==$tipval || $val_rec==$tipval)
      {
      	return 'N';
      }else return 'S';
  	}else { return 'N';}
  }

  public static function definicionesOcdefemp()
  {
  	$c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $val_ant=$reg->getCodvalant();
      $val_par=$reg->getCodvalpar();
      $val_fin=$reg->getCodvalfin();
      $val_ret=$reg->getCodvalret();
      $val_rec=$reg->getCodvalrec();
      $con_ins=$reg->getCodconins();
      $con_sup=$reg->getCodconsup();
      $con_pro=$reg->getCodconpro();
    }
    else
    {
      $val_ant="";
      $val_par="";
      $val_fin="";
      $val_ret="";
      $val_rec="";
      $con_ins="";
      $con_sup="";
      $con_pro="";
    }
  }

  public static function verificarPartida($codcon)
  {
    $c= new Criteria();
    $c->add(OcparconPeer::CODCON,$codcon);
    $data= OcparconPeer::doSelect($c);
    if ($data)
    {
    	foreach ($data as $obj)
    	{
    	  if ($obj->getCancon()> $obj->getCanval())
    	  {
    	  	$verificar_partida=true;
    	  	break;
    	  }
    	  else
    	  {
    	  	$verificar_partida=false;
    	  }
    	}
    }else $verificar_partida=false;

    return $verificar_partida;
  }

  public static function datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$montotcon,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum)
  {
  	$msj="";
  	$c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $val_ant=$reg->getCodvalant(); $val_par=$reg->getCodvalpar(); $val_fin=$reg->getCodvalfin(); $val_ret=$reg->getCodvalret(); $val_rec=$reg->getCodvalrec();
      $con_ins=$reg->getCodconins(); $con_sup=$reg->getCodconsup(); $con_pro=$reg->getCodconpro();  }
    else
    {
      $val_ant=""; $val_par=""; $val_fin=""; $val_ret=""; $val_rec=""; $con_ins=""; $con_sup=""; $con_pro="";   }

    $nomcolum="";
    $c= new Criteria();
    $c->add(OcparconPeer::CODCON,$codcon);
    $registros= OcparconPeer::doSelect($c);
    if ($registros)
    {
      switch($tipval)
      {
	    case ($val_ant || $val_par):
	      $nomcolum="Cantidad Ejecutada";
	     break;
	    case ($val_fin):
	      $nomcolum="Cantidad Final";
	     break;
      }

      $arreglopar=array();
      $arregloret=array();
      $j=0;
      foreach ($registros as $obj)
      {
        $j=count($arreglopar)+1;
        $arreglopar[$j-1]["codpar"]=$obj->getCodpar();
        self::datoscodpar($arreglopar[$j-1]["codpar"],$val_ant,$tipval,$codobr,&$despar,&$desuni,&$cosuni,&$msj);
        if ($msj=="")
        {
          $arreglopar[$j-1]["despar"]=$despar;
          $arreglopar[$j-1]["coduni"]=$desuni;
          $arreglopar[$j-1]["cosuni"]=number_format($cosuni,2,',','.');
        }else {break;}
        $arreglopar[$j-1]["cancon"]=number_format($obj->getCancon(),2,',','.');
        switch($tipval)
        {
          case ($val_ant || $val_ret):
             $arreglopar[$j-1]["canval"]=number_format($obj->getCanval(),2,',','.');
             $arreglopar[$j-1]["cantidad"]="0,00";
             $montot=$obj->getCancon()*$cosuni;
             $arreglopar[$j-1]["montot"]=number_format($montot,2,',','.');
             self::totalPartidas($arreglopar,&$arregloret,&$arreglomontos,$codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$msj,&$montotparacum);
	       break;
	      case ($val_par):
	         $arreglopar[$j-1]["canval"]=number_format($obj->getCanval(),2,',','.');
             $arreglopar[$j-1]["cantidad"]="0,00";
             $montot=0*$cosuni;
             $arreglopar[$j-1]["montot"]=number_format($montot,2,',','.');
             self::totalPartidas($arreglopar,&$arregloret,&$arreglomontos,$codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$msj,&$montotparacum);
	         H::PrintR($arreglomontos);
	       break;
	      case ($val_fin):
             $arreglopar[$j-1]["canval"]=number_format($obj->getCanval(),2,',','.');
             $arreglopar[$j-1]["cantidad"]="0,00";
             $montot=0*$cosuni;
             $arreglopar[$j-1]["montot"]=number_format($montot,2,',','.');
             self::totalPartidas($arreglopar,&$arregloret,&$arreglomontos,$codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$msj,&$montotparacum);
	       break;
	       case ($val_rec):
	         $arreglopar[$j-1]["canval"]=number_format($obj->getCanval(),2,',','.');
             $arreglopar[$j-1]["cantidad"]="0,00";
             $montot=$obj->getCanval()*$cosuni;
             $arreglopar[$j-1]["montot"]=number_format($montot,2,',','.');
             self::totalPartidas($arreglopar,&$arregloret,&$arreglomontos,$codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$msj,&$montotparacum);
	       break;
        }
        $arreglopar[$j-1]["id"]="9";

        $j++;
      }

    }
  }

  public static function totalPartidas($arreglo,&$arreglo2,&$arreglomontos,$codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$msj,&$montotparacum)
  {
  	$msj="";
    $montotpar=0;
    $poracum=0;
    $montotparacum=0;
    $sumcol=0;
    $ivaacum=0;

    $l=0;
    while ($l<count($arreglo))
    {
      $a= new Criteria();
      $a->add(OcparconPeer::CODCON,$codcon);
      $a->add(OcparconPeer::CODPAR,$arreglo[$l]["codpar"]);
      $regis= OcparconPeer::doSelectOne($a);
      if ($regis)
      {
      	if ($val_par==$tipval)
      	{
      	  if ($arreglo[$l]["cantidad"]!="" && $regis->getCancon()!=0)
      	  {
            $poracum= $poracum + ((H::convnume($arreglo[$l]["cantidad"])/$regis->getCancon())*100);
      	  }
      	}
      }

      if ($arreglo[$l]["montot"]!="")
      {
        if ($val_ant!=$tipval && $val_ret!=$tipval)
        {
          $sumcol= (H::convnume($arreglo[$l]["canval"])+H::convnume($arreglo[$l]["cantidad"]));
          $montotparacum= $montotparacum + ($sumcol * H::convnume($arreglo[$l]["cosuni"]));
        }else
        {
          $sumcol=0;
          $montotparacum=0;
        }
        $montotpar= $montotpar + (H::convnume($arreglo[$l]["montot"]));
      }
     $l++;
    }

    switch($tipval)
    {
      case $val_par:
        $ivaacum= (($montotparacum * $poriva)/100);
        $montotparacum= $montotparacum + $ivaacum;
        if ($montotcon>=$montotparacum)
        {
          if ($montotcon==$montotparacum)
          {
           $msj="No debe valuarse la totalidad del contrato en una Valuación Parcial";
           break;
          }
          self::calculatTotalValuacion($montotpar,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$gasretot,&$subtot,&$moniva,&$totiva,&$totsiniva);
          self::calcularAmortizacion($codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$totiva,$porant,&$msj,&$monantic,&$monant,&$salantic,&$amortant);
          if ($msj=="")
          {
	          self::calcularTotalContrato($montotcon,$aumobr,$disobr,$obrext,&$monful,&$montototcon);
	          self::calcularTotalDeducciones(&$arreglo2,$totsiniva,$monper,$totiva,$val_ret,$tipval,&$monfia,&$totded,&$retacu,&$msj1);
	          if ($msj1=="")
	          {
	           self::calcularMontoPagar($totsiniva,$amortant,$monfia,&$monper,$totded,$valpag,$tipval,$val_fin,&$monpag);
	           self::totalValPresentadas($monper,$poriva,$codcon,$val_ant,$val_par,$val_fin,$tipval,&$montototcon,$montotcon,&$monval,&$salliq,&$valpag,&$monconiva);
	          }else { break;}
         }else { break;}
        }
        else
        {
          $msj="No debe execederse al monto del Contrato";
           break;
        }
       break;
      case $val_fin:
         $ivaacum= (($montotpar * $poriva)/100);
         $montotparacum= $montotpar + $ivaacum;
         if ($montotcon>=$montotparacum)
         {
           self::calculatTotalValuacion($montotpar,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$gasretot,&$subtot,&$moniva,&$totiva,&$totsiniva);
           self::calcularAmortizacion($codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$totiva,$porant,&$msj,&$monantic,&$monant,&$salantic,&$amortant);
           if ($msj=="")
          {
	          self::calcularTotalContrato($montotcon,$aumobr,$disobr,$obrext,&$monful,&$montototcon);
	          self::calcularTotalDeducciones(&$arreglo2,$totsiniva,$monper,$totiva,$val_ret,$tipval,&$monfia,&$totded,&$retacu,&$msj1);
	          if ($msj1=="")
	          {
	          self::calcularMontoPagar($totsiniva,$amortant,$monfia,&$monper,$totded,$valpag,$tipval,$val_fin,&$monpag);
	          self::totalValPresentadas($monper,$poriva,$codcon,$val_ant,$val_par,$val_fin,$tipval,&$montototcon,$montotcon,&$monval,&$salliq,&$valpag,&$monconiva);
	          }else { break;}
         }else { break;}
         }
         else
         {
         	$msj="No debe execederse al monto del Contrato";
           break;
         }
       break;
      default:
          self::calculatTotalValuacion($montotpar,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$gasretot,&$subtot,&$moniva,&$totiva,&$totsiniva);
	      self::calcularAmortizacion($codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$totiva,$porant,&$msj,&$monantic,&$monant,&$salantic,&$amortant);
	      if ($msj=="")
          {
	          self::calcularTotalContrato($montotcon,$aumobr,$disobr,$obrext,&$monful,&$montototcon);
	          self::calcularTotalDeducciones(&$arreglo2,$totsiniva,$monper,$totiva,$val_ret,$tipval,&$monfia,&$totded,&$retacu,&$msj1);
	          if ($msj1=="")
	          {
	           self::calcularMontoPagar($totsiniva,$amortant,$monfia,&$monper,$totded,$valpag,$tipval,$val_fin,&$monpag);
	           self::totalValPresentadas($monper,$poriva,$codcon,$val_ant,$val_par,$val_fin,$tipval,&$montototcon,$montotcon,&$monval,&$salliq,&$valpag,&$monconiva);
	          }else { break;}
         }else { break;}
       break;
    }
    $arreglomontos=array();
    $arreglomontos[0]["subtot"]=$subtot;
    $arreglomontos[0]["moniva"]=$moniva;
    $arreglomontos[0]["totiva"]=$totiva;
    $arreglomontos[0]["totsiniva"]=$totsiniva;
    $arreglomontos[0]["monantic"]=$monantic;
    $arreglomontos[0]["monant"]=$monant;
    $arreglomontos[0]["salantic"]=$salantic;
    $arreglomontos[0]["amortant"]=$amortant;
    $arreglomontos[0]["monful"]=$monful;
    $arreglomontos[0]["montototcon"]=$montototcon;
    $arreglomontos[0]["monfia"]=$monfia;
    $arreglomontos[0]["totded"]=$totded;
    $arreglomontos[0]["retacu"]=$retacu;
    $arreglomontos[0]["monper"]=$monper;
    $arreglomontos[0]["monpag"]=$monpag;
    $arreglomontos[0]["monval"]=$monval;
    $arreglomontos[0]["salliq"]=$salliq;
    $arreglomontos[0]["valpag"]=$valpag;


  }

   public static function calculatTotalValuacion($montotpar,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$gasretot,&$subtot,&$moniva,&$totiva,&$totsiniva)
   {
   	switch($tipval)
    {
      case $val_ant:
      case $val_ret:
        $porcentaje_anticipo= (($montotpar * $porant)/100);
        $subtot= $porcentaje_anticipo + H::convnume($gasretot);
        $moniva= (($subtot * $poriva)/100);
        $totiva= ($subtot + $moniva);
        $totsiniva=$subtot;
       break;
      case $val_par:
      case $val_fin:
      case $val_rec:
        $subtot= $montotpar + H::convnume($gasretot);
        $moniva= (($subtot * $poriva)/100);
        $totiva= ($subtot + $moniva);
        $totsiniva=$subtot;
       break;
    }
   }

   public static function calcularAmortizacion($codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$totiva,$porant,&$msj,&$monantic,&$monant,&$salantic,&$amortant)
   {
   	 $msj="";
     $c= new Criteria();
     $c->add(OcregvalPeer::CODCON,$codcon);
     $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
     $c->add(OcregvalPeer::STAVAL,'T',Criteria::NOT_EQUAL);
     $c->add(OcregvalPeer::CODTIPVAL,$val_ant);
     $reg= OcregvalPeer::doSelectOne($c);
     if ($reg)
     {
       $monantacum=0;
       $todoamortizado=0;
       $sql="select coalesce(sum(AmoAnt),0) as sumatotal from OCREGVAL where codcon='".$codcon."' and staval<>'N' and staval<>'T'";
       if (Herramientas::BuscarDatos($sql, & $result))
       {
         $monantacum=$result[0]["sumatotal"];
       }
       $todoamortizado=$reg->getMonper() - $monantacum;
       $monantic=$todoamortizado;
       switch($tipval)
       {
	      case $val_fin:
	        $monant=$todoamortizado;
	        $amortant=$todoamortizado;
	       break;
	      case $val_par:
	        $monant=(($totiva*$porant)/100);
            if ($monant<=$todoamortizado)
            {
             $monant=(($totiva*$porant)/100);
             $amortant=(($totiva*$porant)/100);
            }
            else
            {
              $msj="El porcentaje de Amortización excede el saldo de Anticipo";
              $monant=0;
              $amortant=0;
            }
	       break;
       }
     }
     else
     {
      $monantic=0;
      $monant=0;
      $amortant=0;
     }
     $salantic=$monantic- $monant;
   }

   public static function calcularTotalContrato($montotcon,$aumobr,$disobr,$obrext,&$monful,&$montototcon)
   {
     $mto=$montotcon + $aumobr - $disobr + $obrext;
     $monful= $mto;
     $montototcon=$montotcon;
   }

   public static function calcularTotalDeducciones(&$arreglo2,$totsiniva,$monper,$totiva,$val_ret,$tipval,&$monfia,&$totded,&$retacu,&$msj1)
   {
   	 $montotded=0;
   	 $monacumded=0;
   	 $monfia=0;
     $y=0;
     while ($y<count($arreglo2))
     {
      self::datosDeduccionesP(&$arreglo2[$y]["porret"],$arreglo2,$totsiniva,$arreglo2[$y]["codtip"],$monper,&$arreglo2[$y]["monret"],$val_ret,$tipval,$totiva,&$monfia,&$msj1);
      if ($msj1=="")
      {
      $a= new Criteria();
      $a->add(OctipretPeer::CODTIP,$arreglo2[$y]["codtip"]);
      $data= OctipretPeer::doSelectOne($a);
      if ($data)
      {
      	if ($data->getStamon()=='N')
      	{
          $montotded= $montotded + (H::convnume($arreglo2[$y]["monret"]));
      	}
      }
      $monacumded= $monacumded + (H::convnume($arreglo2[$y]["monret"]));
      }else { break;}
      $y++;
     }

     $totded=$montotded;
     $retacu=$monacumded;


   }

   public static function calcularMontoPagar($totsiniva,$amortant,$monfia,&$monper,$totded,$valpag,$tipval,$val_fin,&$monpag)
   {
    $monprev=0;
    $subtotret= $totsiniva - $amortant - $monfia;
    $monper=$subtotret;
    switch($tipval)
    {
      case $val_fin:
        $monprev=$monper - $totded;
        $montotpag= $monper - $valpag;
        $monpag=$montotpag;
       break;
      default:
         $montotpag=$monper - $totded;
         $monpag=$montotpag;
       break;
    }
   }

   public static function totalValPresentadas($monper,$poriva,$codcon,$val_ant,$val_par,$val_fin,$tipval,&$montototcon,$montotcon,&$monval,&$salliq,&$valpag,&$monconiva)
   {
     $montotvalpres=0;
     $ivaval=0;
     $monconiva=0;

     $ivaval= (($monper * $poriva)/100);
     $monconiva= $monper + $ivaval;
     $sql="select coalesce(sum(MONPAG),0) as suma from OCREGVAL where codcon='".$codcon."' and staval<>'N' and Codtipval<>'".$val_ant."' and Codtipval<>'".$val_fin."'";
     if (Herramientas::BuscarDatos($sql, & $result))
     {
       switch($tipval)
       {
	      case $val_ant:
	      case $val_par:
            if ($monconiva>0)
            {
              //$monval=$result[0]["suma"] + $monconiva;
              $monval=$result[0]["suma"];
              $salliq= $montototcon - $monval;
            }
            else
            {
              $monval=$result[0]["suma"];
              $salliq= $montototcon - $monval;
            }
	       break;
	      case $val_fin:
             if ($monconiva>0)
             {
               $montototcon=$montotcon;
               $monval=$result[0]["suma"];
               $valpag=$result[0]["suma"];
               $salliq= $montototcon - $monval;

             }
             else
             {
               $monval=$result[0]["suma"];
               $salliq= $montototcon - $monval;
             }
	       break;
	   }
     }
     else
     {
       $monval=0;
       $salliq= $montototcon;
     }
   }

  public static function datoscodpar($codpar,$val_ant,$tipval,$codobr,&$despar,&$desuni,&$cosuni,&$msj)
  {
  	$msj="";
  	$despar="";
    $desuni="";
    $cosuni="";
     if ($codpar!='')
     {
       $c= new Criteria();
       $c->add(OcdefparPeer::CODPAR,$codpar);
       $c->add(OcpreobrPeer::CODOBR,$codobr);
       $c->addJoin(OcdefparPeer::CODUNI,OcunidadPeer::CODUNI);
       $c->addJoin(OcdefparPeer::CODPAR,OcpreobrPeer::CODPAR);
       $reg= OcdefparPeer::doSelectOne($c);
       if ($reg)
       {
         if ($val_ant==$tipval)
         {
          $despar=$reg->getDespar();
          $abruni=H::getX('coduni','Ocunidad','abruni',$reg->getCoduni());
          $desuni=$abruni;
          $k= new Criteria();
          $k->add(OcpreobrPeer::CODPAR,$codpar);
          $k->add(OcpreobrPeer::CODOBR,$codobr);
          $dat=OcpreobrPeer::doSelectOne($k);
          if ($dat)
          {
            $cosuni=$dat->getCosuni();
          }else{
          $cosuni=$reg->getCosuni();}
         }
         else
         {
           $ca= new Criteria();
           $ca->add(OcdefparPeer::CODPAR,$codpar);
           $ca->addJoin(OcdefparPeer::CODUNI,OcunidadPeer::CODUNI);
           $rega= OcdefparPeer::doSelectOne($ca);
           if ($rega)
           {
             $despar=$rega->getDespar();
             $abruni=H::getX('coduni','Ocunidad','abruni',$rega->getCoduni());
             $desuni=$abruni;
              $k= new Criteria();
              $k->add(OcpreobrPeer::CODPAR,$codpar);
	          $k->add(OcpreobrPeer::CODOBR,$codobr);
	          $dat=OcpreobrPeer::doSelectOne($k);
	          if ($dat)
	          {
	            $cosuni=$dat->getCosuni();
	          }else{
	          $cosuni=$reg->getCosuni();}
           }
         }
       }
       else
       {
         if ($val_ant==$tipval)
         {
           $msj="El Código Covenin no esta Presupuestado en la Obra";
         }
         else
         {
           $ca= new Criteria();
           $ca->add(OcdefparPeer::CODPAR,$codpar);
           $ca->addJoin(OcdefparPeer::CODUNI,OcunidadPeer::CODUNI);
           $rega= OcdefparPeer::doSelectOne($ca);
           if ($rega)
           {
             $despar=$rega->getDespar();
             $abruni=H::getX('coduni','Ocunidad','abruni',$rega->getCoduni());
             $desuni=$abruni;
             $cosuni=$rega->getCosuni();
           }
         }
       }
     }
  }

  public static function datosDeduccionesP(&$porcent,$arreglo2,$totsiniva,$codtip,$monper,&$monret,$val_ret,$tipval,$totiva,&$monfia,&$msj1)
  {
  	$msj1="";
  	$monfia=0;
  	if ($porcent!="")
  	{
     $por=H::convnume($porcent);
     if (is_numeric($por))
     {
       if (!self::verficarPorcentajeRet($arreglo2))
       {
       	$msj1="La suma de la Columna debe ser menor a 100";
     	$porcent="0,00";
       }
       else
       {
         if ($totsiniva!="")
         {
           if ($totsiniva!=0)
           {
             $c= new Criteria();
             $c->add(OctipretPeer::CODTIP,$codtip);
             $reg= OctipretPeer::doSelectOne($c);
             if ($reg)
             {
               if ($reg->getStamon()=='N')
               {
                 $tmonret=(($monper*$reg->getBasimp())/100);
                 $tmonret1= (($tmonret * $reg->getPorret())/100);
                 $monret=number_format($tmonret1,2,',','.');
               }
               else
               {
               	if ($val_ret!=$tipval)
               	{
                  $tmonret=(($totiva*$reg->getBasimp())/100);
                 $tmonret1= (($tmonret * $reg->getPorret())/100);
                 $monret=number_format($tmonret1,2,',','.');
                 $monfia=$tmonret;
               	}
               }
             }
             if (!self::verificarFianzas($arreglo2,$totsiniva))
             {
             	$msj1="La suma de las fianzas debe ser mayor al monto del Contrato";
     	        $porcent="0,00";
     	        $monret="0,00";
             }

           }
         }
         else
         {
           $msj1="No existe registro del Monto del Contrato";
     	   $porcent="0,00";
         }
       }
     }
     else
     {
     	$msj1="El Dato debe ser númerico";
     	$porcent="0,00";
     }
  	}
  }

  public static function verficarPorcentajeRet($arreglo2)
  {
  	 $totporc=0;
  	 $y=0;
     while ($y<count($arreglo2))
     {
      $totporc= $totporc + (H::convnume($arreglo2[$y]["porret"]));
      $y++;
     }

     if ($totporc>100)
     {
     	return false;
     }else return true;
  }

    public static function verificarFianzas($arreglo2,$totsiniva)
  {
  	 $monfianza=0;
  	 $y=0;
     while ($y<count($arreglo2))
     {
     	if ($arreglo2[$y]["codtip"]!="")
     	{
          $monfianza= $monfianza + (H::convnume($arreglo2[$y]["porret"]));
     	}
      $y++;
     }

     if ($monfianza>$totsiniva)
     {
     	return false;
     }else return true;
  }

  public static function datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$val_ret,$tipval,&$msj1)
  {
    $c= new Criteria();
    $c->add(OcretconPeer::CODCON,$codcon);
    $registro= OcretconPeer::doSelect($c);
    if ($registro)
    {
      $j=0;
      foreach ($registro as $obj)
      {
        $j=count($arregloret)+1;
        $arregloret[$j-1]["codtip"]=$obj->getCodtip();
        $k= new Criteria();
        $k->add(OctipretPeer::CODTIP,$obj->getCodtip());
        $reg= OctipretPeer::doSelectOne($k);
        if ($reg)
        {
          $arregloret[$j-1]["destip"]=$reg->getDestip();
          $arregloret[$j-1]["porret"]=number_format($reg->getPorret(),2,',','.');
          $arregloret[$j-1]["basimp"]=number_format($reg->getBasimp(),2,',','.');
          $arregloret[$j-1]["unitri"]=number_format($reg->getUnitri(),2,',','.');
          $arregloret[$j-1]["factor"]=number_format($reg->getFactor(),2,',','.');
          $arregloret[$j-1]["porsus"]=number_format($reg->getPorsus(),2,',','.');
          $arregloret[$j-1]["stamon"]=number_format($reg->getStamon(),2,',','.');
          if ($reg->getStamon()=='S')
          {
            $monret=(($arreglomontos[0]["monper"]*$reg->getBasimp())/100);
            $monret1= (($monret * $reg->getPorret())/100);
            $arregloret[$j-1]["monret"]=number_format($monret1,2,',','.');
          }
          else
          {
            $monret=(($arreglomontos[0]["totiva"]*$reg->getBasimp())/100);
            $monret1= (($monret * $reg->getPorret())/100);
            $arregloret[$j-1]["monret"]=number_format($monret1,2,',','.');
          }
        }
        $arregloret[$j-1]["id"]="9";
        $j++;
      }
      self::calcularTotalDeducciones(&$arregloret,$arreglomontos[0]["totsiniva"],$arreglomontos[0]["monper"],$arreglomontos[0]["totiva"],$val_ret,$tipval,&$arreglomontos[0]["monfia"],&$arreglomontos[0]["totded"],&$arreglomontos[0]["retacu"],&$msj1);
    }
  }

  public static function datosOfertaContrato($codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$idval,$gasretot,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloofertaret,&$arreglomontos,&$msj,&$montotoferacum)
  {
  	$msj="";
  	$c= new Criteria();
  	$c->add(OcofeserPeer::CODCON,$codcon);
  	$reg= OcofeserPeer::doSelect($c);
  	if ($reg)
  	{
  	  $arreglooferta=array();
      $j=0;
      foreach ($reg as $obj)
      {
        $j=count($arreglooferta)+1;
        $arreglooferta[$j-1]["codtippro"]=$obj->getCodtippro();
        $s= new Criteria();
        $s->add(OctipprlPeer::CODTIPPRO,$obj->getCodtippro());
        $dat=OctipprlPeer::doSelectOne($s);
        if ($dat)
        {
          $arreglooferta[$j-1]["destippro"]=$obj->getDestippro();
          $arreglooferta[$j-1]["exppro"]="0";
          $arreglooferta[$j-1]["numper"]="0";
          $arreglooferta[$j-1]["canhor"]="0,00";
          $arreglooferta[$j-1]["canval"]="0,00";
          $arreglooferta[$j-1]["cantidad"]="0,00";
          $arreglooferta[$j-1]["valhor"]="0,00";
          $arreglooferta[$j-1]["montot"]="0,00";
        }
        else
        {
         $arreglooferta=array();
         $msj="El Código de tipo de Profesional no existe";
         break;
        }
        $arreglooferta[$j-1]["nivpro"]=number_format($obj->getNivpro(),2,',','.');
        $arreglooferta[$j-1]["exppro"]=$obj->getExppro();

        $s= new Criteria();
        $s->add(OctartipPeer::CODTIPPRO,$obj->getCodtippro());
        $s->add(OctartipPeer::NIVPRO,$obj->getNivpro());
        $s->add(OctartipPeer::EXPPRO,$obj->getExppro());
        $data=OctartipPeer::doSelectOne($s);
        if ($data)
        {
          $arreglooferta[$j-1]["valhor"]=number_format($data->getValhor(),2,',','.');
        }
         else
        {
         $arreglooferta=array();
         $arregloofertaret=array();
         $msj="El Código de Nivel Profesional no existe";
         break;
        }
        $arreglooferta[$j-1]["numper"]=number_format($obj->getNumper(),2,',','.');
        $arreglooferta[$j-1]["canhor"]=number_format($obj->getCanhor(),2,',','.');
        $arreglooferta[$j-1]["canval"]=number_format($obj->getCanval(),2,',','.');
        $arreglooferta[$j-1]["cantidad"]="0,00";
        switch($tipval)
        {
	      case $val_ant:
	      case$val_ret:
	        $monto= $obj->getCanhor()* (H::convnume($arreglooferta[$j-1]["valhor"]));
	        $arreglooferta[$j-1]["montot"]=number_format($monto,2,',','.');
	       break;
	      case $val_par:
	      case$val_fin:
	        $monto= (H::convnume($arreglooferta[$j-1]["canfin"])) * (H::convnume($arreglooferta[$j-1]["valhor"]));
	        $arreglooferta[$j-1]["montot"]=number_format($monto,2,',','.');
	       break;
        }
        $arreglooferta[$j-1]["id"]="8";
        $j++;
      }

      self::totalOferta($arreglooferta,&$arregloofertaret,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$tipval,$codcon,$gasretot,$idval,$porant,$poriva,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,&$msj1,&$arreglomontos,&$montotoferacum);
      if($msj1!="")
      {
      	$msj=$msj1;
      }
  	}
  }

  public static function totalOferta($arreglooferta,&$arregloofertaret,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$tipval,$codcon,$gasretot,$idval,$porant,$poriva,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,&$msj1,&$arreglomontos,&$montotoferacum)
  {
  	$msj="";
  	$msj1="";
    $montotofer=0;
    $montotoferacum=0;
    $sumcol=0;
    $ivaacum=0;

    $l=0;
    while ($l<count($arreglooferta))
    {
      if($val_ant!=$tipval && $val_ret!=$tipval && $idval=="")
      {
      	$sumcol= (H::convnume($arreglooferta[$l]["canval"]) + H::convnume($arreglooferta[$l]["cantidad"]));
      	$montotoferacum= $montotoferacum + ($sumcol * (H::convnume($arreglooferta[$l]["valhor"])));
      }
      else
      {
      	$sumcol=0;
      	$montotoferacum=0;
      }
      $montotofer= $montotofer + (H::convnume($arreglooferta[$l]["montot"]));
     $l++;
    }

    if ($val_par==$tipval || $val_fin==$tipval)
    {
      $ivaacum= (($montotoferacum * $poriva)/100);
      $montotoferacum= $montotoferacum + $ivaacum;

      self::calculatTotalValuacion($montotofer,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$gasretot,&$subtot,&$moniva,&$totiva,&$totsiniva);
      self::calcularAmortizacion($codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$totiva,$porant,&$msj,&$monantic,&$monant,&$salantic,&$amortant);
      if ($msj=="")
      {
	    self::calcularTotalContrato($montotcon,$aumobr,$disobr,$obrext,&$monful,&$montototcon);
	    self::calcularTotalDeducciones(&$arregloofertaret,$totsiniva,$monper,$totiva,$val_ret,$tipval,&$monfia,&$totded,&$retacu,&$msj1);
	    if ($msj1=="")
	    {
	      self::calcularMontoPagar($totsiniva,$amortant,$monfia,&$monper,$totded,$valpag,$tipval,$val_fin,&$monpag);
	      self::totalValPresentadas($monper,$poriva,$codcon,$val_ant,$val_par,$val_fin,$tipval,&$montototcon,$montotcon,&$monval,&$salliq,&$valpag,&$monconiva);
	    }
      }else {$msj1=$msj;}
    }
    else
    {
       self::calculatTotalValuacion($montotofer,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$gasretot,&$subtot,&$moniva,&$totiva,&$totsiniva);
       $monantic=0;
       $monant=0;
       $salantic=0;
       $amortant=0;
       self::calcularTotalContrato($montotcon,$aumobr,$disobr,$obrext,&$monful,&$montototcon);
	   self::calcularTotalDeducciones(&$arreglo2,$totsiniva,$monper,$totiva,$val_ret,$tipval,&$monfia,&$totded,&$retacu,&$msj1);
	   if ($msj1=="")
	   {
	     self::calcularMontoPagar($totsiniva,$amortant,$monfia,&$monper,$totded,$valpag,$tipval,$val_fin,&$monpag);
	     self::totalValPresentadas($monper,$poriva,$codcon,$val_ant,$val_par,$val_fin,$tipval,&$montototcon,$montotcon,&$monval,&$salliq,&$valpag,&$monconiva);
	   }
    }

    $arreglomontos=array();
    if ($msj1=="")
    {
	    $arreglomontos[0]["subtot"]=$subtot;
	    $arreglomontos[0]["moniva"]=$moniva;
	    $arreglomontos[0]["totiva"]=$totiva;
	    $arreglomontos[0]["totsiniva"]=$totsiniva;
	    $arreglomontos[0]["monantic"]=$monantic;
	    $arreglomontos[0]["monant"]=$monant;
	    $arreglomontos[0]["salantic"]=$salantic;
	    $arreglomontos[0]["amortant"]=$amortant;
	    $arreglomontos[0]["monful"]=$monful;
	    $arreglomontos[0]["montototcon"]=$montototcon;
	    $arreglomontos[0]["monfia"]=$monfia;
	    $arreglomontos[0]["totded"]=$totded;
	    $arreglomontos[0]["retacu"]=$retacu;
	    $arreglomontos[0]["monper"]=$monper;
	    $arreglomontos[0]["monpag"]=$monpag;
	    $arreglomontos[0]["monval"]=$monval;
	    $arreglomontos[0]["salliq"]=$salliq;
	    $arreglomontos[0]["valpag"]=$valpag;
    }
  }

  public static function calcularGasRee($codcon,$val_ant,$val_par,$val_fin,$tipval,$gasree_tra,&$gasretot)
  {
    switch($tipval)
    {
      case $val_ant:
      case $val_par:
        $gasreeacum=0;
        $sql="select coalesce(sum(gasree),0) as sumatotal from OCREGVAL where codcon='".$codcon."' and staval<>'N' and staval<>'T'";
        if (Herramientas::BuscarDatos($sql, & $result))
        {
          $gasreeacum=$result[0]["sumatotal"];
          $salgasree= $gasree_tra -$gasreeacum;
          $gasretot=$salgasree;
        }
       break;
      case $val_fin:
        $gasreeacum=0;
        $sql="select coalesce(sum(gasree),0) as sumatotal from OCREGVAL where codcon='".$codcon."' and staval<>'N' and staval<>'T'";
        if (Herramientas::BuscarDatos($sql, & $result))
        {
          $gasreeacum=$result[0]["sumatotal"];
          $salgasree= $gasree_tra -$gasreeacum;
          $gasretot=$salgasree;
        }
       break;
    }
  }

    public static function datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$val_ret,$tipval,&$msj1)
  {
    $c= new Criteria();
    $c->add(OcretconPeer::CODCON,$codcon);
    $registro= OcretconPeer::doSelect($c);
    if ($registro)
    {
      $j=0;
      foreach ($registro as $obj)
      {
        $j=count($arregloret)+1;
        $arregloret[$j-1]["codtip"]=$obj->getCodtip();
        $k= new Criteria();
        $k->add(OctipretPeer::CODTIP,$obj->getCodtip());
        $reg= OctipretPeer::doSelectOne($k);
        if ($reg)
        {
          $arregloret[$j-1]["destip"]=$reg->getDestip();
          $arregloret[$j-1]["porret"]=number_format($reg->getPorret(),2,',','.');
          $arregloret[$j-1]["basimp"]=number_format($reg->getBasimp(),2,',','.');
          $arregloret[$j-1]["unitri"]=number_format($reg->getUnitri(),2,',','.');
          $arregloret[$j-1]["factor"]=number_format($reg->getFactor(),2,',','.');
          $arregloret[$j-1]["porsus"]=number_format($reg->getPorsus(),2,',','.');
          $arregloret[$j-1]["stamon"]=number_format($reg->getStamon(),2,',','.');
          if ($reg->getStamon()=='S')
          {
            $monret=(($arreglomontos[0]["monper"]*$reg->getBasimp())/100);
            $monret1= (($monret * $reg->getPorret())/100);
            $arregloret[$j-1]["monret"]=number_format($monret1,2,',','.');
          }
          else
          {
            $monret=(($arreglomontos[0]["totiva"]*$reg->getBasimp())/100);
            $monret1= (($monret * $reg->getPorret())/100);
            $arregloret[$j-1]["monret"]=number_format($monret1,2,',','.');
          }
        }
        $arregloret[$j-1]["id"]="9";
        $j++;
      }

      self::calcularTotalDeducciones(&$arregloret,$arreglomontos[0]["totsiniva"],$arreglomontos[0]["monper"],$arreglomontos[0]["totiva"],$val_ret,$tipval,&$arreglomontos[0]["monfia"],&$arreglomontos[0]["totded"],&$arreglomontos[0]["retacu"],&$msj1);
    }
  }

  public static function datosDatosRec($codcon,$par_rec,$val_ant,$val_par,$val_fin,$val_rec,$val_ret,$montotcon,$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum)
  {
  	$nomcolum="P";
    $p= new Criteria();
    $p->add(OcparconPeer::CODCON,$codcon);
    $p->add(OcparconPeer::CODPAR,$par_rec);
    $reg= OcparconPeer::doSelectOne($p);
    if ($reg)
    {
      $arreglopar=array();
      $arregloret=array();
      $j=0;
      foreach ($reg as $obj)
      {
        $j=count($arreglopar)+1;
        $arreglopar[$j-1]["codpar"]=$obj->getCodpar();
        self::datoscodpar($arreglopar[$j-1]["codpar"],$val_ant,$tipval,$codobr,&$despar,&$desuni,&$cosuni,&$msj);
        if ($msj=="")
        {
          $arreglopar[$j-1]["despar"]=$despar;
          $arreglopar[$j-1]["coduni"]=$desuni;
          $arreglopar[$j-1]["cosuni"]=number_format($cosuni,2,',','.');
        }else {break;}
        $arreglopar[$j-1]["cancon"]=number_format($obj->getCancon(),2,',','.');
        $arreglopar[$j-1]["canval"]=number_format($obj->getCanval(),2,',','.');
        $arreglopar[$j-1]["cantidad"]="0,00";
        $monto=$cosuni*$obj->getCanval();
        $arreglopar[$j-1]["montot"]=number_format($monto,2,',','.');

        self::totalPartidas($arreglopar,&$arregloret,&$arreglomontos,$codcon,$tipval,$val_ant,$val_par,$val_ret,$val_fin,$val_rec,$poriva,$porant,$montotcon,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$msj,&$montotparacum);
      }
    }
  }

  public static function tiraR($arreglo)
  {
  	$tira="";
    $reg=count($arreglo);
    $l=0;
    while ($l<$reg)
    {
      $tira=$tira.$arreglo[$l]["codtip"].'_'.$arreglo[$l]["destip"].'_'.$arreglo[$l]["porret"].'_'.$arreglo[$l]["basimp"].'_'.$arreglo[$l]["unitri"].'_'.$arreglo[$l]["factor"].'_'.$arreglo[$l]["porsus"].'_'.$arreglo[$l]["stamon"].'_'.$arreglo[$l]["monret"].'_'.$arreglo[$l]["id"].'!';
      $l++;
    }
  	return $tira;
  }

  public static function tiraM($arreglomontos)
  {
  	if (count($arreglomontos)>0)
  	{
  	  $tiram=$arreglomontos[0]["montototcon"].'_'.$arreglomontos[0]["subtot"].'_'.$arreglomontos[0]["moniva"].'_'.$arreglomontos[0]["totiva"].'_'.$arreglomontos[0]["totsiniva"].'_'.$arreglomontos[0]["monantic"].'_'.$arreglomontos[0]["monant"].'_'.$arreglomontos[0]["salantic"].'_'.$arreglomontos[0]["amortant"].'_'.$arreglomontos[0]["monful"].'_'.$arreglomontos[0]["monfia"].'_'.$arreglomontos[0]["totded"].'_'.$arreglomontos[0]["retacu"].'_'.$arreglomontos[0]["monper"].'_'.$arreglomontos[0]["monpag"].'_'.$arreglomontos[0]["monval"].'_'.$arreglomontos[0]["salliq"].'_'.$arreglomontos[0]["valpag"];
  	}
  	return $tiram;
  }

  public static function conArrR($cadarreglo)
  {
  	$arregloret=array();
  	$cadenaret=split('!',$cadarreglo);
	$r=0;
	while ($r<(count($cadenaret)-1))
	{
	  $aux=$cadenaret[$r];
	  $aux2=split('_',$aux);
      $arregloret[$r]["codtip"]=$aux2[0];
      $arregloret[$r]["destip"]=$aux2[1];
      $arregloret[$r]["porret"]=$aux2[2];
      $arregloret[$r]["basimp"]=$aux2[3];
      $arregloret[$r]["unitri"]=$aux2[4];
      $arregloret[$r]["factor"]=$aux2[5];
      $arregloret[$r]["porsus"]=$aux2[6];
      $arregloret[$r]["stamon"]=$aux2[7];
      $arregloret[$r]["monret"]=$aux2[8];
      $arregloret[$r]["id"]=$aux2[9];
	  $r++;
	}

	return $arregloret;
  }

  public static function conArrM($cadmontos)
  {
  	$aux=split('_',$cadmontos);

	$arreglomonto[0]["subtot"]=$aux[1];
    $arreglomonto[0]["moniva"]=$aux[2];
    $arreglomonto[0]["totiva"]=$aux[3];
    $arreglomonto[0]["totsiniva"]=$aux[4];
    $arreglomonto[0]["monantic"]=$aux[5];
    $arreglomonto[0]["monant"]=$aux[6];
    $arreglomonto[0]["salantic"]=$aux[7];
    $arreglomonto[0]["amortant"]=$aux[8];
    $arreglomonto[0]["monful"]=$aux[9];
    $arreglomonto[0]["montototcon"]=$aux[0];
    $arreglomonto[0]["monfia"]=$aux[10];
    $arreglomonto[0]["totded"]=$aux[11];
    $arreglomonto[0]["retacu"]=$aux[12];
    $arreglomonto[0]["monper"]=$aux[13];
    $arreglomonto[0]["monpag"]=$aux[14];
    $arreglomonto[0]["monval"]=$aux[15];
    $arreglomonto[0]["salliq"]=$aux[16];
    $arreglomonto[0]["valpag"]=$aux[17];

    return $arreglomonto;
  }

  public static function verificarRelaciones($codcon,$tipval)
  {
  	$c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $val_ant=$reg->getCodvalant(); $val_par=$reg->getCodvalpar(); $val_fin=$reg->getCodvalfin(); $val_ret=$reg->getCodvalret(); $val_rec=$reg->getCodvalrec();
      $con_ins=$reg->getCodconins(); $con_sup=$reg->getCodconsup(); $con_pro=$reg->getCodconpro();  }
    else
    {
      $val_ant=""; $val_par=""; $val_fin=""; $val_ret=""; $val_rec=""; $con_ins=""; $con_sup=""; $con_pro="";   }

    $c= new Criteria();
    $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
    $c->add(OcregvalPeer::CODCON,$codcon);
    $c->add(OcregvalPeer::CODTIPVAL,$tipval);
    $regi= OcregvalPeer::doSelectOne($c);
    if ($regi)
    {
      switch($regi->getCodtipval())
    {
      case $val_ant:
        $a= new Criteria();
        $a->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
        $a->add(OcregvalPeer::CODCON,$codcon);
        $a->add(OcregvalPeer::CODTIPVAL,$val_fin);
        $datos= OcregvalPeer::doSelect($a);
        if ($datos)
        {
         $verificar_realaciones=true;
         break;
        }
        else
        {
          $a= new Criteria();
          $a->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
          $a->add(OcregvalPeer::CODCON,$codcon);
          $a->add(OcregvalPeer::CODTIPVAL,$val_rec);
          $datos= OcregvalPeer::doSelect($a);
          if ($datos)
          {
          	$verificar_relaciones=true;
          	break;
          }
          else
          {
          	$verificar_relaciones=false;
          }

          $a= new Criteria();
          $a->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
          $a->add(OcregvalPeer::CODCON,$codcon);
          $a->add(OcregvalPeer::CODTIPVAL,$val_par);
          $datos= OcregvalPeer::doSelect($a);
          if ($datos)
          {
          	$verificar_relaciones=true;
          	break;
          }
          else
          {
          	$verificar_relaciones=false;
          }
        }
       break;
      case $val_par:
          $a= new Criteria();
          $a->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
          $a->add(OcregvalPeer::CODCON,$codcon);
          $a->add(OcregvalPeer::CODTIPVAL,$val_fin);
          $datos= OcregvalPeer::doSelect($a);
          if ($datos)
          {
          	$verificar_relaciones=true;
          	break;
          }
          else
          {
          	$a= new Criteria();
            $a->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
            $a->add(OcregvalPeer::CODCON,$codcon);
            $a->add(OcregvalPeer::CODTIPVAL,$val_rec);
            $datos= OcregvalPeer::doSelect($a);
            if ($datos)
            {
          	 $verificar_relaciones=true;
          	 break;
            }
            else
            {
          	 $verificar_relaciones=false;
            }
         }
       break;
      case $val_fin:
        $verificar_relaciones=true;
       break;
      case $val_rec:
          $a= new Criteria();
          $a->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
          $a->add(OcregvalPeer::CODCON,$codcon);
          $a->add(OcregvalPeer::CODTIPVAL,$val_fin);
          $datos= OcregvalPeer::doSelect($a);
          if ($datos)
          {
          	$verificar_relaciones=true;
          	break;
          }
          else
          {
          	$verificar_relaciones=false;
          }
       break;
      case $val_ret:
        $verificar_relaciones=false;
       break;
    }
    }
    else
    {
      $verificar_relaciones=false;
    }

    return $verificar_relaciones;
  }

  public static function verificarGasree($codcon,$tipval,$gasree)
  {
    $c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $val_ant=$reg->getCodvalant(); $val_par=$reg->getCodvalpar(); $val_fin=$reg->getCodvalfin(); $val_ret=$reg->getCodvalret(); $val_rec=$reg->getCodvalrec();
      $con_ins=$reg->getCodconins(); $con_sup=$reg->getCodconsup(); $con_pro=$reg->getCodconpro();  }
    else
    {
      $val_ant=""; $val_par=""; $val_fin=""; $val_ret=""; $val_rec=""; $con_ins=""; $con_sup=""; $con_pro="";   }
    $gasree_tra=H::getX('codcon','Ocregcon','gasree',$codcon);
    switch($tipval)
    {
      case $val_ant:
      case $val_par:
        $gasreeacum=0;
        $sql="select coalesce(sum(gasree),0) as sumatotal from OCREGVAL where codcon='".$codcon."' and staval<>'N' and staval<>'T'";
        if (Herramientas::BuscarDatos($sql, & $result))
        {
          $gasreeacum=$result[0]["sumatotal"];
          $saldo_gasre=$gasree_tra -$gasreeacum;
          if ($gasree<=$saldo_gasre)
          {
          	$verficargasree=true;
          }else $verficargasree=false;
        }
       break;
      case $val_fin:
        $gasreeacum=0;
        $sql="select coalesce(sum(gasree),0) as sumatotal from OCREGVAL where codcon='".$codcon."' and staval<>'N' and staval<>'T'";
        if (Herramientas::BuscarDatos($sql, & $result))
        {
          $gasreeacum=$result[0]["sumatotal"];
          $saldo_gasre=$gasree_tra -$gasreeacum;
          if ($gasree<=$saldo_gasre)
          {
          	$verficargasree=true;
          }else $verficargasree=false;
        }
       break;
    }
    $verficargasree=true;
  }



}
?>