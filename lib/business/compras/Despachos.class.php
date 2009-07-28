<?php
/**
 * Clase para el Manejo de Despachos
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
class Despachos
{

	public static function BuscarTotalEntregado($reffac){
		//se suma lo entregado por notas de entrega
		$sql="select sum(cantot) - sum(candes) as total from faartfac where reffac in (select reffac from fafactur where status = 'A' and reffac = '" . $reffac . "')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$total = $resul[0]["total"];
			if (($total != "")&&($total == 0)){
				return 1;
			}
			else{
				return 0;
			}
		} else {
			return 0;
		}
	}

/**
   * Función Principal para guardar datos del formulario Fadesp
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function salvarFadesp($despacho,$grid)
    {
        self::grabarDespachoFac($despacho,$grid);
	    self::grabarDespachoArticulosFac($despacho,$grid);
	    if (self::actualizarArticulos($despacho,$grid,&$msj))
	    {
	      	if ($despacho->getTipref() == 'P')
	      		self::actualizarArticulosPedido($despacho,$grid);
	      	else if ($despacho->getTipref() == 'F')
	      		self::actualizarArticulosFactura($despacho,$grid);
	    }
    }

/**
   * Función para Registrar Despachos
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function grabarDespachoFac($despacho,$grid)
    {
      $tiecorr=false;
      if (Herramientas::getVerCorrelativo('cordes','cacorrel',&$r))
      {
      if ($despacho->getDphart()=='########')
      {
        	$encontrado=false;
	      	while (!$encontrado)
	      	{
	      	  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	          $sql="select dphart from Cadphart where dphart='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	          	$r=$r+1;
	          }
	          else
	          {
	          	$encontrado=true;
	          }
	      	}
	        $despacho->setDphart(str_pad($r, 8, '0', STR_PAD_LEFT));
	        $despacho->setRefpag(str_pad($r, 8, '0', STR_PAD_LEFT));
	        $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	        $despacho->setNumcom('D'.(substr($numero,1,strlen($numero))));
            $tiecorr=true;
      }
      else
      {
        $despacho->setDphart(str_replace('#','0',$despacho->getDphart()));
        $despacho->setRefpag(str_replace('#','0',$despacho->getRefpag()));
        $numero=str_replace('#','0',$despacho->getDphart());
        $despacho->setNumcom('D'.(substr($numero,1,strlen($numero))));
      }
      //Se graba el Despacho
      $despacho->setTipdph($despacho->getTipref());
      $despacho->save();

      if ($tiecorr) Herramientas::getSalvarCorrelativo('cordes','cacorrel','Despacho',$r,$msg);

     }
    }

/**
   * Función Principal para guardar datos del formulario Almdesp
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function salvarAlmdesp($despacho,$grid)
    {
        self::grabarDespacho($despacho,$grid);
	    self::grabarDespachoArticulos($despacho,$grid);
	    if (self::actualizarArticulos($despacho,$grid,&$msj))
	    {
	      	self::actualizarArticulosRequision($despacho,$grid);
//	      	self::actualizarArticulosPedido($despacho,$grid);
	    }
    }

/**
   * Función para Registrar Despachos
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function grabarDespacho($despacho,$grid)
    {
      $tiecorr=false;
      if (Herramientas::getVerCorrelativo('cordes','cacorrel',&$r))
      {
      if ($despacho->getDphart()=='########')
      {
        	$encontrado=false;
	      	while (!$encontrado)
	      	{
	      	  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	          $sql="select dphart from Cadphart where dphart='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	          	$r=$r+1;
	          }
	          else
	          {
	          	$encontrado=true;
	          }
	      	}
	        $despacho->setDphart(str_pad($r, 8, '0', STR_PAD_LEFT));
	        $despacho->setRefpag(str_pad($r, 8, '0', STR_PAD_LEFT));
	        $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	        $despacho->setNumcom('D'.(substr($numero,1,strlen($numero))));
            $tiecorr=true;
      }
      else
      {
        $despacho->setDphart(str_replace('#','0',$despacho->getDphart()));
        $despacho->setRefpag(str_replace('#','0',$despacho->getRefpag()));
        $numero=str_replace('#','0',$despacho->getDphart());
        $despacho->setNumcom('D'.(substr($numero,1,strlen($numero))));
      }
      $despacho->setTipref('R'); //Agregado por ERIVERO 28/01/09
      //Se graba el Despacho
      $despacho->save();

      if ($tiecorr) Herramientas::getSalvarCorrelativo('cordes','cacorrel','Despacho',$r,$msg);

     }
    }

/**
   * Función para registrar el despacho de los articulos
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function grabarDespachoArticulos($despacho,$grid)
    {
    $coddph=$despacho->getDphart();
    $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
      	if ($x[$j]->getCandes()>0)
	    {
          $detalle = new Caartdph();
          $detalle->setDphart($coddph);
          $detalle->setCodart($x[$j]->getCodart());
          $detalle->setCodcat($x[$j]->getCodcat());
       /* $detalle->setCandph($x[$j]->getCanreq());
          $detalle->setCandev($x[$j]->getCanrec());
          $detalle->setMontot($x[$j]->getMontot());*/
          $detalle->setCandph($x[$j]->getCandes());
          $detalle->setCandev($x[$j]->getCannodes());
          $detalle->setMontot($x[$j]->getMontotdes());
          $detalle->setCodfal($x[$j]->getCodfal());
          $detalle->setPreart($x[$j]->getPreart());
          $detalle->setCodalm($x[$j]->getCodalm());
          $detalle->setCodubi($x[$j]->getCodubi());
      	  $detalle->save();
	     }//if ($x[$j]->getCandes()>0)
        $j++;
        }
     }

    public static function grabarDespachoArticulosFac($despacho,$grid)
    {
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$codcat = $reg->getCodcat();
      $coddph=$despacho->getDphart();
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
      	if ($x[$j]->getCandesp()>0)
	    {
          $detalle = new Caartdph();
          $detalle->setDphart($coddph);
          $detalle->setCodart($x[$j]->getCodart());
          $detalle->setCodcat($codcat);
          $detalle->setCandph($x[$j]->getCandesp());
          $detalle->setMontot($x[$j]->getMontotdes());
          $detalle->setPreart($x[$j]->getPreart());
          $detalle->setCodalm($x[$j]->getCodalm());
          $detalle->setCodubi($x[$j]->getCodubi());
      	  $detalle->save();
	     }//if ($x[$j]->getCandes()>0)
        $j++;
        }
     }

/**
   * Función para  Actualizar los articulos
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function actualizarArticulos($despacho,$grid,&$msj)
    {

       $msj="";
       $x=$grid[0];
       $j=0;
       while ($j<count($x))
       {
        $codarti=$x[$j]->getCodart();
        $dart=$x[$j]->getDesart();
        //$cantd=$x[$j]->getCanreq();
        $cantd=$x[$j]->getCandes();
        $calmacen=$x[$j]->getCodalm();
        $cubicacion=$x[$j]->getCodubi();
         if (($codarti!="") and ($cantd>0))
         {
           $c = new Criteria();
           $c->add(CaregartPeer::CODART,$codarti);
           $arti = CaregartPeer::doSelectOne($c);
           if ($arti)
            {
             $tipoart=$arti->getTipo();
             if ($tipoart='A')
             {
                 $act1=$arti->getExitot() - $cantd;
                 $dis1=$arti->getDistot() - $cantd;
                 $arti->setExitot($act1);
                 $arti->setDistot($dis1);
                 $arti->save();
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
	             }// if ($alm)
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
	             }// if ($alm)
	           }//   if ($tipoart='A')
             }//if ($arti)
          }//if (($codarti!="") and ($cantd>0))
       $j++;
      }//end while
     return true;
   }

/**
   * Función para Actualizar los articulos por Requision
   *
   * @static
   * @param $despacho Object Despacho a guardar
   * @param $grid Array de Objects Articulos.
   * @return void
   */
    public static function actualizarArticulosRequision($despacho,$grid)
    {
      $requi=$despacho->getReqart();
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
      $codarti=$x[$j]->getCodart();
      // $cantd=$x[$j]->getCanreq();
      $cantd=$x[$j]->getCandes();
      $codcate=$x[$j]->getCodcat();
      if (($codarti!="") and ($cantd>0))
      {
          $c = new Criteria();
          $c->add(CaartreqPeer::REQART,$requi);
          $c->add(CaartreqPeer::CODART,$codarti);
          $c->add(CaartreqPeer::CODCAT,$codcate);
          $reqarti = CaartreqPeer::doSelectOne($c);
             if ($reqarti)
             {
               $act3=$reqarti->getCanrec() + $cantd;
               $reqarti->setCanrec($act3);
               $reqarti->save();
             }
        }//if (($codarti!="") and ($cantd>0))
        $j++;
      }
    }

    public static function actualizarArticulosPedido($despacho,$grid)
    {
      $requi=$despacho->getReqart();
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
      $codarti=$x[$j]->getCodart();
      $cantd=$x[$j]->getCandesp();
      if (($codarti!="") and ($cantd>0))
      {
          $c = new Criteria();
          $c->add(FaartpedPeer::NROPED,$requi);
          $c->add(FaartpedPeer::CODART,$codarti);
          $reqarti = FaartpedPeer::doSelectOne($c);
             if ($reqarti)
             {
               $act3=$reqarti->getCandes() + $cantd;
               $reqarti->setCandes($act3);
               $reqarti->save();
             }
        }//if (($codarti!="") and ($cantd>0))
        $j++;
      }
    }

    public static function actualizarArticulosFactura($despacho,$grid)
    {
      $requi=$despacho->getReqart();
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
      $codarti=$x[$j]->getCodart();
      $cantd=$x[$j]->getCandesp();
      if (($codarti!="") and ($cantd>0))
      {
          $c = new Criteria();
          $c->add(FaartfacPeer::REFFAC,$requi);
          $c->add(FaartfacPeer::CODART,$codarti);
          $reqarti = FaartfacPeer::doSelectOne($c);
             if ($reqarti)
             {
               if (($reqarti->getCandes() != "")&&($reqarti->getCandes() >= 0))
               		$act3=$reqarti->getCandes() + $cantd;
               else
               		$act3=$cantd;
               $reqarti->setCandes($act3);
               $reqarti->save();
             }
        }//if (($codarti!="") and ($cantd>0))
        $j++;
      }
    }

  public static function eliminarAlmdesp($despacho)
   {
      self::eliminarDespacho($despacho);
   }

  public static function eliminarDespacho($despacho)
   {
		self::devolverArticulos($despacho);
		self::devolverArticulosRequision($despacho);
		self::eliminarDespachoArticulos($despacho);
		$despacho->delete();
   }

   public static function devolverArticulos($despacho)
    {
      $coddph=$despacho->getDphart();
	  $c= new Criteria();
	  $c->add(CaartdphPeer::DPHART,$coddph);
	  $detalle= CaartdphPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	      $codarticulo=$arreglo->getCodart();
	      $cantidesp=$arreglo->getCandph();
	      $codalmacen=$arreglo->getCodalm();
          $codubicacion=$arreglo->getCodubi();
	      if ($codarticulo!="" and $cantidesp>0)
	      {
	        $c = new Criteria();
	        $c->add(CaregartPeer::CODART,$codarticulo);
	        $articulo = CaregartPeer::doSelectOne($c);
	        if ($articulo)
	        {
	          if($articulo->getTipo()=='A')
	          {
				     $cuenta=$articulo->getExitot() + $cantidesp;
	                 $articulo->setExitot($cuenta);
			   	     $articulo->save();
					 $c = new Criteria();
	                 $c->add(CaartalmubiPeer::CODART,$codarticulo);
	                 $c->add(CaartalmubiPeer::CODALM,$codalmacen);
	                 $c->add(CaartalmubiPeer::CODUBI,$codubicacion);
	                 $alm = CaartalmubiPeer::doSelectOne($c);
	                 if ($alm)
	                 {
	                     $cuenta2=$alm->getExiact() + $cantidesp;
	                     $alm->setExiact($cuenta2);
	                     $alm->save();
		             }// if ($alm)
	                $c = new Criteria();
	                $c->add(CaartalmPeer::CODART,$codarticulo);
	                $c->add(CaartalmPeer::CODALM,$codalmacen);
	                $datos = CaartalmPeer::doSelectOne($c);
	                if ($datos)
	                {
	                  $cuenta2=$datos->getExiact() + $cantidesp;
	                  $datos->setExiact($cuenta2);
	                  $datos->save();
	                }
	          }//if($articulo->getTipo()=='A')
	        }// if ($articulo)
	       }//if ($codarticulo!="" and $cantidesp>0)
       }// foreach ($detalle as $arreglo)
    }

  public static function devolverArticulosRequision($despacho)
   {
    $coddph=$despacho->getDphart();
    $requision=$despacho->getReqart();
    $c= new Criteria();
    $c->add(CaartdphPeer::DPHART,$coddph);
    $detalle= CaartdphPeer::doselect($c);
    foreach ($detalle as $arreglo)
    {
        $codart=$arreglo->getCodart();
        $cantdes=$arreglo->getCandph();
        $codcateg=$arreglo->getCodcat();

        $c = new Criteria();
        $c->add(CaartreqPeer::REQART,$requision);
        $c->add(CaartreqPeer::CODART,$codart);
        $c->add(CaartreqPeer::CODCAT,$codcateg);
        $reqarticulo = CaartreqPeer::doSelectOne($c);
        if ($reqarticulo)
        {
          $cuenta3=$reqarticulo->getCanrec() - $cantdes;
          if ($cuenta3==0) $cuenta3="0,00";
          $reqarticulo->setCanrec($cuenta3);
          $reqarticulo->save();
        }
    }
   }

   public static function eliminarDespachoArticulos($despacho)
    {
      $coddph=$despacho->getDphart();
    $c= new Criteria();
    $c->add(CaartdphPeer::DPHART,$coddph);
    $detalle= CaartdphPeer::doselect($c);
    foreach ($detalle as $arreglo)
    {
      $arreglo->delete();
    }
    }

    public static function verificaexisydisp($codart,$codalm,$codubi,$candes,&$msg)
    {
    	 	 $msg="";
    	 	 $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$codart);
             $c->add(CaartalmubiPeer::CODALM,$codalm);
             $c->add(CaartalmubiPeer::CODUBI,$codubi);
             $alm = CaartalmubiPeer::doSelectOne($c);
              if ($alm)
              {
                if ($alm->getExiact()>=$candes)
                {
                   return true;
                }
                else
                {
                   $msg='No Existe Disponibilidad Suficiente en el Almacen '.$codalm.', Ubicacion '.$codubi.', para el articulo '.$codart.'. La disponibilidad actual es de '.$alm->getExiact();
                   return false;
                }
               }//if ($alm)
             else
             {
             	$msg='El Articulo '.$codart.' no esta definido en el Almacen '.$codalm.' para la Ubicacion '.$codubi;
             	return false;
             }
    }

/**************************************************************************
**                          Despachos de Servicios                       **
**                    Hecha por  Miki -> Arreglada por Jaime             **
**************************************************************************/
  public static function salvarAlmdespser($despacho,$grid)
  {
      self::Grabar_DespachoSer($despacho,$grid);
      self::Grabar_DetallesDespachoSer($despacho,$grid);
      //self::Actualiza_Req($despacho,'G');
  }


  /**
   * Función para registrar despachos de servicios
   *
   * @static
   * @param $despacho Object despacho de servicio guardar
   * @param $grid Array de Objects Detalle despachos de servicios
   * @return void
   */
    public static function Grabar_DespachoSer($despacho,$grid)
    {
	    if (Herramientas::getVerCorrelativo('cordes','cacorrel',$r))
	    {
		      if ($despacho->getDphart()=='########')
		      {
		      	$encontrado=false;
		      	while (!$encontrado)
		      	{
		      	  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		          $sql="select dphart from Cadphartser where dphart='".$numero."' ";
		          if (Herramientas::BuscarDatos($sql,&$result))
		          {
		          	$r=$r+1;
		          }
		          else
		          {
		          	$encontrado=true;
		          }
		      	}
		        $despacho->setDphart(str_pad($r, 8, '0', STR_PAD_LEFT));
		      }
		      else
		      {
		        $despacho->setDphart(str_replace('#','0',$despacho->getDphart()));
		        $despacho->setDphart(str_pad($despacho->getDphart(), 8, '0', STR_PAD_LEFT));
		      }
		    $despacho->save();
		    Herramientas::getSalvarCorrelativo('cordes','cacorrel','Despacho',$r,$msg);
	    }
     }

/*
  dphart varchar(8) NOT NULL,
  fecdph date NOT NULL,
  reqart varchar(8) NOT NULL,
  desdph varchar(255),
  codori varchar(16),
  stadph varchar(1),
*/
     /**
   * Función para registrar los servicios a despachar
   *
   * @static
   * @param $despacho Object despacho de servicio a guardar
   * @param $grid Array de Objects Detalle Despacho Servicio
   * @return void
   */
    public static function Grabar_DetallesDespachoSer($despacho,$grid)
    {
      $grid_detalle=$grid[0];
      $i=0;
		if (count($grid_detalle)>0)
		{
		    while ($i<count($grid_detalle))
		    {
		    	$caartdphser_new = new Caartdphser();
				$caartdphser_new->setDphart($despacho->getDphart());
				$caartdphser_new->setCodart($grid_detalle[$i]['codart']);
				$caartdphser_new->setCodcat($grid_detalle[$i]['codcat']);
				$caartdphser_new->setFecrea($grid_detalle[$i]['fecrea']);
				$caartdphser_new->setNomemp($grid_detalle[$i]['nomemp']);
				$caartdphser_new->setDphobs($grid_detalle[$i]['dphobs']);
				$caartdphser_new->save();
			    $i++;
			}
		}
    }

   public static function Actualiza_Req($despacho,$elimina_graba)
   {
    $reqart=$despacho->getReqart();
    $c = new Criteria();
    $c->add(CaartreqserPeer::REQART,$reqart);
    $res = CaartreqserPeer::doSelect($c);
    if ($elimina_graba=='E')
    {
      foreach ($res as $a)
      {
          $a->setFecrea(null);
          $a->save();
      }
    }
    else
    {
      $c = new Criteria();
      $c->add(CaartdphserPeer::DPHART,$despacho->getDphart());
      $fecha = CaartdphserPeer::doSelect($c);

      foreach ($fecha as $a)
      {
          $a->setFecrea($fecha->getFecrea());
          $a->save();
      }
    }

   }

  public static function eliminarDespachoSer($despacho)
  {
    $codigo=$despacho->getDphart();
    self::Actualiza_Req($despacho,'E');
    Herramientas::EliminarRegistro('Caartdphser','Dphart',$codigo);
    $despacho->delete();
  }
/**************************************************************************
**                          Despachos de Servicios                       **
**                                Miki                                   **
**************************************************************************/


}

?>