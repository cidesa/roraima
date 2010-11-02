<?php
/**
 * Recepción: Clase estática para el manejo de las recepciones de almacén
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Recepcion
{

/**
	 * Función Principal para guardar datos del formulario AlmOrdRec
	 * TODO Esta función (y todas las demás de su clase) deben retornar un
	 * código de error para validar cualquier problema al guardar los datos.
	 *
	 * @static
	 * @param $recepcion Object Recepcion a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function salvarAlmrec($recepcion,$grid){
      self::Grabar_Recepcion($recepcion,$grid);
    }

/**
	 * Función para Registrar Recepciones
	 *
	 * @static
	 * @param $recepcion Object Recepcion a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Grabar_Recepcion($recepcion,$grid){
      $tiecorr=false;
      if (Herramientas::getVerCorrelativo('correc','cacorrel',&$r))
      {
         if ($recepcion->getRcpart()=='########')
			{
				$encontrado=false;
		      	while (!$encontrado)
		      	{
		      	  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		          $sql="select rcpart from Carcpart where rcpart='".$numero."'";
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
				$recepcion->setRcpart(str_pad($r, 8, '0', STR_PAD_LEFT));
			}

	  //Se graba la Recepcion
	   $recepcion->save();

	  // Se graban los articulos dela recepcion
	  self::Grabar_RecepcionArticulos($recepcion,$grid);
	  if ($tiecorr) Herramientas::getSalvarCorrelativo('correc','cacorrel','Recepcion',$r,&$msg);
	  if (self::Actualizar_Articulos($recepcion,$grid,&$msj))
	  {
    	self::Actualizar_ArticulosOrden($recepcion,$grid);
	  }
     }
    }

/**
	 * Función para registrar el despacho de los articulos
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Grabar_RecepcionArticulos($recepcion,$grid)
    {
	  $codrec=$recepcion->getRcpart();
	  $ordcom=$recepcion->getOrdcom();
          $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
	  $x=$grid[0];
	  $j=0;

	  while ($j<count($x))
		  {
		  	  //marcado como articulo cerrado para recepcion
		  	  $marcado= $x[$j]->getCerart();
              if ($marcado!=1 and $x[$j]->getCanrecgri()>0)
              {
			      $detalle = new Caartrcp();
			   	  $detalle->setRcpart($codrec);
			   	  $detalle->setCodart($x[$j]->getCodart());
			   	  $detalle->setOrdcom($ordcom);
			  	  $detalle->setCanrec($x[$j]->getCanrecgri());
			  	  $detalle->setCandev($x[$j]->getCandev());
			  	  $detalle->setCantot($x[$j]->getPreart());
			  	  $detalle->setMondes($x[$j]->getDtoart());
			  	  $detalle->setMonrgo($x[$j]->getRgoart());
			  	  $detalle->setMontot($x[$j]->getMontot());
			  	  $detalle->setCodcat($x[$j]->getCodcat());
			  	  $detalle->setCodalm($x[$j]->getCodalm());
			  	  $detalle->setCodubi($x[$j]->getCodubi());
                                  if ($manartlot=='S')
                                      $detalle->setNumlot($x[$j]->getNumlot());
				  if (trim($x[$j]->getFecest())!='') $detalle->setFecest($x[$j]->getFecest());
			  	  if (trim($x[$j]->getCodfal())!='') $detalle->setCodfal($x[$j]->getCodfal());
				  $detalle->save();
              }

	  	     if ($marcado == 1)
	  	      {
	  	      	$c = new Criteria();
				$c->add(CaartordPeer::ORDCOM,$ordcom);
				$c->add(CaartordPeer::CODART,$x[$j]->getCodart());
				$c->add(CaartordPeer::CODCAT,$x[$j]->getCodcat());
				$per = CaartordPeer::doSelectOne($c);
				if ($per)
				{   $per->setCerart('C');
     				$per->save();
				}
	  	      }

		      $j++;
		    }
     }


/**
	 * Función para  Actualizar los articulos
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Actualizar_Articulos($recepcion,$grid,&$msj)
    {
         // $calmacen=$recepcion->getCodalm();
         // $cubicacion=$recepcion->getCodubi();
         $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
	      $x=$grid[0];
		  $j=0;
		  while ($j<count($x))
		  {
		    $codarti=$x[$j]->getCodart();
		    $dart=$x[$j]->getDesart();
		    $cantd=$x[$j]->getCanrecgri();
		    $costo=$x[$j]->getCosart();
		    $marcado= $x[$j]->getCerart();
		    $calmacen=$x[$j]->getCodalm();
		    $cubicacion=$x[$j]->getCodubi();
                    if ($manartlot=='S')
                        $numlot=$x[$j]->getNumlot();
		    if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		     {
		  	   $c = new Criteria();
		  	   $c->add(CaregartPeer::CODART,$codarti);
		       $arti = CaregartPeer::doSelectOne($c);
		        if ($arti)
		        {
		    	  $tipoart=$arti->getTipo();
                          $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                          if ($manunialt=='S')
                          {
                             $r= new Criteria();
                             $r->add(CaartordPeer::ORDCOM,$recepcion->getOrdcom());
                             $r->add(CaartordPeer::CODART,$codarti);
                             $result= CaartordPeer::doSelectOne($r);
                             if ($result)
                             {
                                 if ($result->getUnimed()!=$arti->getUnimed())
                                 {
                                     if ($arti->getUnialt()!="" && $arti->getRelart()!="" && $result->getUnimed()==$arti->getUnialt())
                                     {
                                        $cantd=$cantd*$arti->getRelart();
                                     }
                                     $k= new Criteria();                                     
                                     $k->add(CaunialartPeer::CODART,$codarti);
                                     $k->add(CaunialartPeer::UNIALT,$result->getUnimed());
                                     $result3= CaunialartPeer::doSelectOne($k);
                                     if ($result3)
                                     {
                                         $cantd=$cantd*$result3->getRelart();
                                     }
                                 }
                             }
                          }


		    	   if ($tipoart=='A')
		    	   {
		    	     $act1=$arti->getExitot() + $cantd;
		       	     $arti->setExitot($act1);
                             $c = new Criteria();
                             $c->add(CaartalmubiPeer::CODART,$codarti);
                             $c->add(CaartalmubiPeer::CODALM,$calmacen);
                             $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
                             if ($manartlot=='S')
                                 $c->add(CaartalmubiPeer::NUMLOT,$numlot);
                             $alm = CaartalmubiPeer::doSelectOne($c);
                             if ($alm)
                             {
                                  $act2=$alm->getExiact() + $cantd;
                                  $alm->setExiact($act2);
                                  $alm->save();
                                  $c = new Criteria();
                                  $c->add(CaregartPeer::CODART,$codarti);
                                  $arti = CaregartPeer::doSelectOne($c);
                                  if ($arti)
                                  {
                                         $act1=$arti->getExitot() + $cantd;
                                         $dis1=$arti->getDistot() + $cantd;
                                         $arti->setExitot($act1);
                                         $arti->setDistot($dis1);
                                         $arti->setCosult($costo);
                                         $arti->save();
                                   }
                            }// if ($alm)
                            else {
                                if ($manartlot=='S')
                                {
                                      $caartalmubi= new Caartalmubi();
                                      $caartalmubi->setCodart($codarti);
                                      $caartalmubi->setCodalm($calmacen);
                                      $caartalmubi->setCodubi($cubicacion);
                                      $caartalmubi->setExiact($cantd);
                                      $caartalmubi->setNumlot($numlot);
                                      $caartalmubi->save();
                                }
                            }
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
		            }// if ($tipoart='A')
		       	      $arti->setCosult($costo);


		              if ($arti->getExitot()== 0)
		              {
		                   $arti->setCospro($costo);
		              }
		              else
		              {
		                   $costocal = (($cantd * $costo) + ($costo * ($arti->getExitot()- $cantd))) / $arti->getExitot();
                           $arti->setCospro($costocal);
		              }
		              $arti->save();
		         }
		      }//  if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    $j++;
		  }
     return true;
   }

/**
	 * Función para Actualizar los articulos por Orden
	 *
	 * @static
	 * @param $recepcion Object Despacho a guardar
	 * @param $grid Array de Objects Articulos.
	 * @return void
	 */
    public static function Actualizar_ArticulosOrden($recepcion,$grid){
	  $codrec=$recepcion->getRcpart();
	  $ordcom=$recepcion->getOrdcom();


	      $x=$grid[0];
		  $j=0;
		  while ($j<count($x)) {
		  $codarti=$x[$j]->getCodart();
		  $cantd=$x[$j]->getCanrecgri();
		  $codcat=$x[$j]->getCodcat();
          $marcado= $x[$j]->getCerart();
		   if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    {
		  	  $c = new Criteria();
		  	  $c->add(CaartordPeer::ORDCOM,$ordcom);
		      $c->add(CaartordPeer::CODART,$codarti);
		      $c->add(CaartordPeer::CODCAT,$codcat);

	          $ordarti = CaartordPeer::doSelectOne($c);
	           if ($ordarti)
	           {
	             $act3=$ordarti->getCanrec() + $cantd;
	             $ordarti->setCanrec($act3);
	             $ordarti->save();
		      }
		    }// if (($codarti!="") and ($cantd>0) and ($marcado!=1))
		    $j++;
		  }
    }

   public static function eliminarAlmrec($recepcion,&$msg)
   {
      $msg="";
      if (self::eliminarRecepcion($recepcion,&$msg))
			return true;
      else
			return false;
   }

  public static function eliminarRecepcion($recepcion,&$msg)
   {
   	if (self::ValidaEliminaRec($recepcion,&$msg))
   	{
		 self::devolverArticulos($recepcion);
	     self::devolverArticulosOrCom($recepcion);
	     self::eliminarRecepcionArticulos($recepcion);
	     $recepcion->delete();
	     return true;
   	}
   	else
   	{
   		return false;
   	}
   }

   public static function ValidaEliminaRec($recepcion,&$msg)
    {
      $msg="";
      $codrec=$recepcion->getRcpart();
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      //$codalmacen=$recepcion->getCodalm();
      //$codubicacion=$recepcion->getCodubi();
	  $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	$codarticulo=$arreglo->getCodart();
	  	$cantrec=$arreglo->getCanrec();
	  	$codalmacen=$arreglo->getCodalm();
        $codubicacion=$arreglo->getCodubi();
        if ($manartlot=='S')
            $numlot=$arreglo->getNumlot();
	  	if ($codarticulo!="" and $cantrec>0)
	  	{
	  		$c = new Criteria();
		    $c->add(CaregartPeer::CODART,$codarticulo);
		    $articulo = CaregartPeer::doSelectOne($c);
		    if ($articulo)
		    {
		    	if($articulo->getTipo()=='A')
		    	{
                            if ($manartlot=='S')
                            {
                                 	if (!Despachos::verificaexisydisp($codarticulo,$codalmacen,$codubicacion,$cantrec,&$msg,$numlot))
				 	    return false;
                            }else {
				 	if (!Despachos::verificaexisydisp($codarticulo,$codalmacen,$codubicacion,$cantrec,&$msg))
				 	    return false;
                            }
		    	  }//  if($articulo->getTipo()=='A')
		    	}//if ($articulo)
		    }// 	if ($codarticulo!="" and $cantrec>0)
	  	 }//foreach ($detalle as $arreglo)
	 return true;
    }


   public static function devolverArticulos($recepcion)
    {
      $codrec=$recepcion->getRcpart();
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      //$codalmacen=$recepcion->getCodalm();
      //$codubicacion=$recepcion->getCodubi();
	  $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	$codarticulo=$arreglo->getCodart();
	  	$cantrec=$arreglo->getCanrec();
	  	$codalmacen=$arreglo->getCodalm();
        $codubicacion=$arreglo->getCodubi();
        if ($manartlot=='S')
            $numlot=$arreglo->getNumlot();
	  	if ($codarticulo!="" and $cantrec>0)
	  	{
	  		$c = new Criteria();
		    $c->add(CaregartPeer::CODART,$codarticulo);
		    $articulo = CaregartPeer::doSelectOne($c);
		    if ($articulo)
		    {
		    	if($articulo->getTipo()=='A')
		    	{
				 	if (($articulo->getExitot() - $cantrec) >= 0)
				 	{
	                   	$cuenta=$articulo->getExitot() - $cantrec;
			    		$articulo->setExitot($cuenta);
			    		$articulo->save();
				 	}
		    		//actualizo almacen
		    		 $c = new Criteria();
	                 $c->add(CaartalmubiPeer::CODART,$codarticulo);
	                 $c->add(CaartalmubiPeer::CODALM,$codalmacen);
	                 $c->add(CaartalmubiPeer::CODUBI,$codubicacion);
                         if ($manartlot=='S')
                             $c->add(CaartalmubiPeer::NUMLOT,$numlot);
	                 $alm = CaartalmubiPeer::doSelectOne($c);
	                 if ($alm)
	                 {
				     	if (($alm->getExiact() - $cantrec) >= 0)
	                       {
			            	$cuenta2=$alm->getExiact() - $cantrec;
			            	$alm->setExiact($cuenta2);
			            	$alm->save();
	                       }
		             }// if ($alm)

		    		$c = new Criteria();
		  	        $c->add(CaartalmPeer::CODART,$codarticulo);
		  	        $c->add(CaartalmPeer::CODALM,$codalmacen);
		            $datos = CaartalmPeer::doSelectOne($c);
		            if ($datos)
		            {
                       if (($datos->getExiact() - $cantrec) >= 0)
                       {
		            	$cuenta2=$datos->getExiact() - $cantrec;
		            	$datos->setExiact($cuenta2);
		            	$datos->save();
                       }
		            } //if ($datos)
		    	  }//  if($articulo->getTipo()=='A')
		    	}//if ($articulo)
		    }// 	if ($codarticulo!="" and $cantrec>0)
	  	 }//foreach ($detalle as $arreglo)
    }

  public static function devolverArticulosOrCom($recepcion)
   {
	  $codrec=$recepcion->getRcpart();
	  $ordcom=$recepcion->getOrdcom();

	  $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	  $codart=$arreglo->getCodart();
		  $canrec=$arreglo->getCanrec();
		  $codcat=$arreglo->getCodcat();

  		  $c = new Criteria();
	  	  $c->add(CaartordPeer::ORDCOM,$ordcom);
	      $c->add(CaartordPeer::CODART,$codart);
	      $c->add(CaartordPeer::CODCAT,$codcat);
	      $datos = CaartordPeer::doSelectOne($c);
	      if ($datos)
	      {
	      	$cuenta3=$datos->getCanrec() - $canrec;
	      	if ($cuenta3==0) $cuenta3="0,00";
	      	$datos->setCanrec($cuenta3);
	      	$datos->save();
	      }
	  }
   }

   public static function eliminarRecepcionArticulos($recepcion)
    {
      $codrec=$recepcion->getRcpart();
	   $c= new Criteria();
	  $c->add(CaartrcpPeer::RCPART,$codrec);
	  $detalle= CaartrcpPeer::doselect($c);
	  foreach ($detalle as $arreglo)
	  {
	  	$arreglo->delete();
	  }
    }

    public static function verificaexiartalmubi($codart,$codalm,$codubi,&$msg)
    {
    	 	 $msg="";
    	 	 $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$codart);
             $c->add(CaartalmubiPeer::CODALM,$codalm);
             $c->add(CaartalmubiPeer::CODUBI,$codubi);
             $alm = CaartalmubiPeer::doSelectOne($c);
             if (!$alm)
             {
             	$msg='El Articulo '.$codart.' no esta definido en el Almacen '.$codalm.' para la Ubicacion '.$codubi.".";
             	return false;
             }
             else
             {
             	return true;
             }
    }
}
?>
