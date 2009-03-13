<?php
class Almacen
{

  public static function salvarAlmsalalm($salida,$grid)
  {

   //Modificacion
   if ($salida->getId())
   {
	   	$proveedor=$salida->getRifpro();
	  	$c= new Criteria();
	  	$c->add(CaproveePeer::RIFPRO,$proveedor);
	  	$reg= CaproveePeer::doSelectOne($c);
	  	if ($reg)
	  	{
	  		$salida->setCodpro($reg->getCodpro());
	  	}
	    $salida->save();
        return -1;
   }
   else //INCLUSION
   {  	  $tiecorr=false;
	      if (Herramientas::getVerCorrelativo('corsal','cacorrel',&$r))
	      {
	         if ($salida->getCodsal()=='########')
				{
					$encontrado=false;
			      	while (!$encontrado)
			      	{
			      	  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
			          $sql="select codsal from Casalalm where codsal='".$numero."'";
			          if (Herramientas::BuscarDatos($sql,&$result))
			          {
			          	$r=$r+1;
			          }
			          else
			          {
			          	$encontrado=true;
			          }
			      	}
			      	$tiecorr=true;
					$salida->setCodsal(str_pad($r, 8, '0', STR_PAD_LEFT));
				}
	       }
      	 //Primero se intenta actualizar los articulos, y el almacen, con la cantidad saliente de articulos
         //en el caso que no se pueda actualizar los artículos no se debe grabar el resto de la información
	     if (self::Actualizar_Articulos($salida,$grid,&$coderr))
	     {
		   	$proveedor=$salida->getRifpro();
		  	$c= new Criteria();
		  	$c->add(CaproveePeer::RIFPRO,$proveedor);
		  	$reg= CaproveePeer::doSelectOne($c);
		  	if ($reg)
		  	{
		  		$salida->setCodpro($reg->getCodpro());
		  	}
		  	if ($tiecorr) Herramientas::getSalvarCorrelativo('corsal','cacorrel','Salidas',$r,&$msg);
		    $salida->save();
		    self::grabarDetalleSalida($salida,$grid);
	        return -1;
	     }
	     else
	     {
	        return $coderr;
	     }
   }//  else //INCLUSION
  }

  public static function grabarDetalleSalida($salida,$grid)
  {
	$codsalida=$salida->getCodsal();
	$x=$grid[0];
	$j=0;
	  while ($j<count($x))
	  {
		$x[$j]->setCodsal($codsalida);
		$x[$j]->save();
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

  public static function eliminarAlmsalalm($salida)
  {
    self::eliminarSalida($salida);
  }

  public static function eliminarSalida($salida)
  {
  	self::Devolver_Articulos($salida);
  	$codigo=$salida->getCodsal();
  	Herramientas::EliminarRegistro('Cadetsal','Codsal',$codigo);
  	$salida->delete();
  }

  public static function Actualizar_Articulos($salida,$grid,&$msjerr)
    {
	      $x=$grid[0];
		  $j=0;
		  $msjerr=-1;
		  while ($j<count($x))
		  {
		    $codarti=$x[$j]->getCodart();
		    $dart=$x[$j]->getDesart();
		    $cantd=H::toFloat($x[$j]->getCantot());
		    $costo=$x[$j]->getCosart();
            $calmacen=$x[$j]->getCodalm();
            $cubicacion=$x[$j]->getCodubi();
		     if (($codarti!="") and ($cantd>0))
		     {
		         $c = new Criteria();
	  	         $c->add(CaartalmubiPeer::CODART,$codarti);
	  	         $c->add(CaartalmubiPeer::CODALM,$calmacen);
	  	         $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
	             $alm = CaartalmubiPeer::doSelectOne($c);
	              if ($alm)
	              {
	              	 if($alm->getExiact()>=$cantd)
	              	 {
		    		      $act2=$alm->getExiact() - $cantd;
		         	      $alm->setExiact($act2);
		         	      $alm->save();
	              	 }
	         	      $c = new Criteria();
				  	  $c->add(CaregartPeer::CODART,$codarti);
				      $arti = CaregartPeer::doSelectOne($c);
				      if ($arti)
				      {
				    	     $act1=$arti->getExitot() - $cantd;
				    	     $dis1=$arti->getDistot() - $cantd;
				       	     $arti->setExitot($act1);
				       	     $arti->setDistot($dis1);
				             $arti->save();
				       }
				         $c = new Criteria();
		                 $c->add(CaartalmPeer::CODART,$codarti);
		                 $c->add(CaartalmPeer::CODALM,$calmacen);
		                 $reg = CaartalmPeer::doSelectOne($c);
		                 if ($reg)
		                 {
				                if($reg->getExiact()>=$cantd)
				                 {
				                     $act2=$reg->getExiact() - $cantd;
				                     $reg->setExiact($act2);
				                     $reg->save();
				                 }
			             }// if ($reg)
	               }//if ($alm)
	              else
		     	   {
		       			$msjerr=129;
		       			return false;
		     		}
		      }
		    $j++;
		  }
     return true;
   }

    public static function Devolver_Articulos($salida)
    {
		  $c = new Criteria();
          $c->add(CadetsalPeer::CODSAL,$salida->getCodsal());
          $detalle = CadetsalPeer::doSelect($c);

		  foreach ($detalle as $arreglo)
 		  {
 		    $codarti=$arreglo->getCodart();
		    $dart=$arreglo->getDesart();
		    $cantd=H::toFloat($arreglo->getCantot());
		    $costo=$arreglo->getCosart();
		    $calmacen=$arreglo->getCodalm();
		    $codubicacion=$arreglo->getCodubi();
		    if (($codarti!="") and ($cantd>0))
		     {
		         $c = new Criteria();
	  	         $c->add(CaartalmubiPeer::CODART,$codarti);
	  	         $c->add(CaartalmubiPeer::CODALM,$calmacen);
	  	         $c->add(CaartalmubiPeer::CODUBI,$codubicacion);
	             $alm = CaartalmubiPeer::doSelectOne($c);
	              if ($alm)
	              {
	    		      $act2=$alm->getExiact() + $cantd;
	         	      $alm->setExiact($act2);
	         	      $alm->save();

                     $c = new Criteria();
		  	         $c->add(CaartalmPeer::CODART,$codarti);
		  	         $c->add(CaartalmPeer::CODALM,$calmacen);
		             $reg = CaartalmPeer::doSelectOne($c);
		              if ($reg)
		              {
		    		      $act2=$reg->getExiact() + $cantd;
		         	      $reg->setExiact($act2);
		         	      $reg->save();
		              }
	         	      $c = new Criteria();
				  	  $c->add(CaregartPeer::CODART,$codarti);
				      $arti = CaregartPeer::doSelectOne($c);
				      if ($arti)
				      {
				    	     $act1=$arti->getExitot() + $cantd;
				    	     $dis1=$arti->getDistot() + $cantd;
				       	     $arti->setExitot($act1);
				       	     $arti->setDistot($dis1);
				             $arti->save();
				       }
	               }//if ($alm)
		      }
		  }
     return true;
   }
/**************************************************************************
**                          Inventario de Servicios                       **
**                                Miki                                   **
**************************************************************************/
	public static function salvarAlminvfis($inventario,$grid){
      self::Grabar_InvFisic($inventario,$grid);
    }

    public static function Grabar_InvFisic($inventario,$grid)
    {
   	  $fecha=$inventario->getFecinv();
   	  $almacen=$inventario->getCodalm();
      $x=$grid[0];
	  $j=0;

	  while ($j<count($x))
	  {
	      $detalle = new Cainvfis();
	  	  $detalle->setFecinv($fecha);
	  	  $detalle->setCodalm($almacen);
	  	  $detalle->setCodart($x[$j]->getCodart());
	  	  $detalle->setExiact($x[$j]->getExiact());
	  	  $detalle->setExiact2($x[$j]->getExiact2());

		$detalle->save();
	    $j++;
	    }
    }


  public static function eliminarAlminvfis($inventario)
  {
  	$c = new Criteria();
  	$c->addAscendingOrderByColumn(CainvfisPeer::CODART);
    $c->add(CainvfisPeer::FECINV,$inventario->getFecinv());
	$c->add(CainvfisPeer::CODALM,$inventario->getCodalm());
    $obj = CainvfisPeer::doSelect($c);
    foreach ($obj as $value)
   	{
    	$value->delete();
   	}
  }
/**************************************************************************
**                          Inventario de Servicios                       **
**                                Miki                                   **
**************************************************************************/

/**************************************************************************
**                          Definición de Ubicacion                     **
**                                CaDefubi                              **
**************************************************************************/
 public static function salvarCadefubi($cadefubi,$grid)
 {
   $cadefubi->save();
   $c = new Criteria();
   $c->add(CaalmubiPeer::CODUBI,$cadefubi->getCodubi());
   CaalmubiPeer::doDelete($c);

   $x=$grid[0];
   $j=0;
   while ($j<count($x))
   {
    if ($x[$j]['check']=="1")
    {
     $caalmubi= new Caalmubi();
     $caalmubi->setCodalm($x[$j]['codalm']);
     $caalmubi->setCodubi($cadefubi->getCodubi());
     $caalmubi->save();
    }//if
    $j++;
   }//while
 }
   public static function Hay_articulos($codubi)
    {
      $sql = "Select * From CaArtAlmUbi Where codubi = '" .$codubi. "'";
       if (Herramientas::BuscarDatos($sql,&$result))
       {
          return true;
       }
       else
          return false;
     }

     public static function Hay_articulos_almacen($codalm)
     {
      	 $sql = "Select * From CaArtAlmUbi Where codalm = '" .$codalm. "'";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {
	       return true;
	     }
	    else
	    {
	       $sql = "Select * From CaArtAlm Where codalm = '" .$codalm. "'";
	       if (Herramientas::BuscarDatos($sql,&$result))
	       {
	          return true;
	       }
	       else
	          return false;
	     }//else
     }

     public static function ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,&$exiact)
     {
         $c = new Criteria();
         $c->add(CaartalmubiPeer::CODART,$codart);
         $c->add(CaartalmubiPeer::CODALM,$codalm);
         $c->add(CaartalmubiPeer::CODUBI,$codubi);
         $alm = CaartalmubiPeer::doSelectOne($c);
         if ($alm)
         {
           $exiact=$alm->getExiact(true);
           return true;
         }
         else
         {
            $exiact=0;
            return false;
         }
     }

    public static function TraspasarInventario($fecinv)
    {
   //Datos Inventario fisico
    $c = new Criteria();
    $c->add(CainvfisPeer::FECINV,$fecinv);
    $resinvfis=CainvfisPeer::doSelect($c);
    foreach ($resinvfis as $datinvfis)
   	{
		$c = new Criteria();
		$c->add(CainvfisubiPeer::FECINV,$fecinv);
    	$c->add(CainvfisubiPeer::CODART,$datinvfis->getCodart());
    	$c->add(CainvfisubiPeer::CODALM,$datinvfis->getCodalm());
    	$resinfisubi=CainvfisubiPeer::doSelect($c);
        foreach ($resinfisubi as $datinvfisubi)
   	    {
   	    	$c = new Criteria();
    		$c->add(CaartalmubiPeer::CODART,$datinvfisubi->getCodart());
    		$c->add(CaartalmubiPeer::CODALM,$datinvfisubi->getCodalm());
    		$c->add(CaartalmubiPeer::CODUBI,$datinvfisubi->getCodubi());
    		$caartalmubi=CaartalmubiPeer::doSelectOne($c);
    		if ($caartalmubi)//existe solo se actualiza la existencia actual
    		{
    			$caartalmubi->setExiact($datinvfisubi->getExiact());
    			$caartalmubi->save();
    		}
    		else//no existe esa existencia por articulo, almacen y ubicacion entonces se incluye
    		{
		          $newcaartalmubi= new Caartalmubi();
		          $newcaartalmubi->setCodart($datinvfisubi->getCodart());
		          $newcaartalmubi->setCodalm($datinvfisubi->getCodalm());
		          $newcaartalmubi->setCodubi($datinvfisubi->getCodubi());
		          $newcaartalmubi->setExiact($datinvfisubi->getExiact());
		          $newcaartalmubi->save();
    		}//$caartalmubi
   	    }//foreach ($resinfisubi as $datinvfisubi)

    	$c = new Criteria();
		$c->add(CaartalmPeer::CODART,$datinvfis->getCodart());
		$c->add(CaartalmPeer::CODALM,$datinvfis->getCodalm());
		$caartalm=CaartalmPeer::doSelectOne($c);
		if ($caartalm)//existe solo se actualiza la existencia actual
		{
			$caartalm->setExiact($datinvfis->getExiact());
			$caartalm->save();
		}
		else//no existe esa existencia por articulo y almacen entonces se incluye
		{
	          $newcaartalm= new Caartalmubi();
	          $newcaartalm->setCodart($datinvfis->getCodart());
	          $newcaartalm->setCodalm($datinvfis->getCodalm());
	          $newcaartalm->setExiact($datinvfis->getExiact());
	          $newcaartalm->setEximin(0);
	          $newcaartalm->setEximax(0);
	          $newcaartalm->setPtoreo(0);
	          $newcaartalm->save();
		}//$caartalm

	  $c = new Criteria();
	  $c->add(CaregartPeer::CODART,$datinvfis->getCodart());
	  $arti = CaregartPeer::doSelectOne($c);
	  if ($arti)
	  {
	   	     $arti->setInvini($datinvfis->getExiact());
	         $arti->save();
	   }
	  //Actualizar el montotal por por articulo
	  $sql = "UPDATE CAREGART SET EXITOT=(SELECT SUM(EXIACT) FROM CAARTALM WHERE CODART='".$datinvfis->getCodart()."') WHERE CODART='".$datinvfis->getCodart()."'";
      Herramientas::insertarRegistros($sql);

   	}// foreach ($resinvfis as $datinvfis)

    }
}
?>