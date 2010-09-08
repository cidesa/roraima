<?php
/**
 * Facturación: Clase estática para el manejo de las facturas
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Facturacion {

/*******************************Definición de Ciudades**********************************************/

    public static function getEstados($pais='')
    {
      $edo = array();
      $edo[''] = '';
      $c = new Criteria();
      if($pais!='') $c->add(FaestadoPeer::FAPAIS_ID,$pais);
      $edos = FaestadoPeer::doSelect($c);
      if($edos){
        foreach($edos as $m){
          $edo[$m->getId()] = $m->getNomedo();
        }
      }
      return $edo;
    }
/*******************************Fin Definición de Ciudades**********************************************/

/*******************************Definición de Ciudades**********************************************/

    public static function getCiudades($estado)
    {
      $ciu = array();

      $ciu[''] = '';
      $c = new Criteria();
      if($estado!='') $c->add(FaciudadPeer::FAESTADO_ID,$estado);
      $cius = FaciudadPeer::doSelect($c);
      if($cius){
        foreach($cius as $p){
          $ciu[$p->getId()] = $p->getNomciu();
        }
      }
      return $ciu;
    }

/*******************************Fin Definición de Ciudades**********************************************/

/*******************************Definición de Artículos**********************************************/
  public static function salvarFadefart($articulo,$presupuesto,$pedido,$factura,$notaengrega,$despacho,$devolucion,$ajuste)
  {
     $articulo->setCodemp('001');
 /*    if ($articulo->getGeneraop()=='1')
     { $articulo->setGeneraop('S');}
  else {$articulo->setGeneraop(null);}

    if ($articulo->getGeneracom()=='1')
     { $articulo->setGeneracom('S');}
  else {$articulo->setGeneracom(null);}*/

    if ($articulo->getPrcasopre()=='1')
     { $articulo->setPrcasopre('S');}
     else {$articulo->setPrcasopre(null);}

    if ($articulo->getPrcreqapr()=='1')
     { $articulo->setPrcreqapr('S');}
     else {$articulo->setPrcreqapr(null);}

    if ($articulo->getComasopre()=='1')
     { $articulo->setComasopre('S');}
     else {$articulo->setComasopre(null);}

    if ($articulo->getComreqapr()=='1')
     { $articulo->setComreqapr('S');}
     else {$articulo->setComreqapr(null);}

     $articulo->save();

     $modifica_correl=false;
     $c = new Criteria();
     $data= FacorrelatPeer::doSelectOne($c);

     if ($data)
     { $modifica_correl=true; }
     else { self::incluyePrimerRegistro(); $modifica_correl=true;}

     if ($modifica_correl==true)
     {
       if (is_numeric($presupuesto))
       { $sql="update facorrelat set corpre='".$presupuesto."'";}
       else { $sql="update facorrelat set corpre=500";}
      Herramientas::insertarRegistros($sql);

       if (is_numeric($pedido))
       { $sql1="update facorrelat set corped='".$pedido."'";}
       else { $sql1="update facorrelat set corped=0";}
      Herramientas::insertarRegistros($sql1);

      if (is_numeric($factura))
       { $sql2="update facorrelat set corfac='".$factura."'";}
       else { $sql2="update facorrelat set corfac=0";}
      Herramientas::insertarRegistros($sql2);

      if (is_numeric($notaengrega))
       { $sql3="update facorrelat set cornot='".$notaengrega."'";}
       else { $sql3="update facorrelat set cornot=0";}
      Herramientas::insertarRegistros($sql3);

      if (is_numeric($despacho))
       { $sql4="update facorrelat set cordph='".$despacho."'";}
       else { $sql4="update facorrelat set cordph=0";}
      Herramientas::insertarRegistros($sql4);

      if (is_numeric($devolucion))
       { $sql5="update facorrelat set cordev='".$devolucion."'";}
       else { $sql5="update facorrelat set cordev=0";}
      Herramientas::insertarRegistros($sql5);

      if (is_numeric($ajuste))
       { $sql6="update facorrelat set coraju='".$ajuste."'";}
       else { $sql6="update facorrelat set coraju=0";}
      Herramientas::insertarRegistros($sql6);

    }
  }

  public static function incluyePrimerRegistro()
  {
    $c= new Criteria();
    $reg= FacorrelatPeer::doSelectOne($c);
    if (count($reg)==0)
    {
      $tabla= new Facorrelat();
      $tabla->setCorpre(0);
      $tabla->setCorped(0);
      $tabla->setCorfac(0);
      $tabla->setCornot(0);
      $tabla->setCordph(0);
      $tabla->setCordev(0);
      $tabla->setCoraju(0);
      $tabla->save();
    }
  }

  public static function salvarNumlot($numlot)
  {
	if ($numlot != ''){
		$sql="Update Empresa set numlot='".$numlot."' where codemp='001'";
		Herramientas::insertarRegistros($sql);
		return -1;
	}
	else
		return 0;
  }

  public static function salvarCodcat($codcat)
  {
	if ($codcat != ''){
		$sql="Update Empresa set codcat='".$codcat."' where codemp='001'";
		Herramientas::insertarRegistros($sql);
		return -1;
	}
	else
		return 0;
  }

/*******************************Fin Definición de Artículos**********************************************/

/*******************************Definición de Productos Alternos **********************************************/


  public static function eliminarFaproalt($codart)
   {

    $c = new Criteria();
    $c->add(FaproaltPeer::CODART,$codart);
    $obj = FaproaltPeer::doSelect($c);

    if ($obj)
        foreach ($obj as $registro)
    		$registro->delete();
    return true;
   }

    public static function salvarFaproalt($faproalt, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {

        $x[$j]->setCodart($faproalt->getCodart());
        $x[$j]->save();
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

/*******************************Fin Definición de Productos Alternos **********************************************/

/*******************************Definición de Precios **********************************************/
  public static function salvarFaartpvp($faartpvp,$grid, $codart)
  {
    $x = $grid[0];
    $j = 0;
    while (($j < count($x))&&($x[$j]->getPvpart() > 0)) {
      if ($x[$j]->getDespvp() != ''){
	      $x[$j]->setCodart($codart);
	      $x[$j]->setDespvp($x[$j]->getDespvp());
	      $x[$j]->setPvpart($x[$j]->getPvpart());
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

/*******************************Fin Definición de Precios **********************************************/

/*******************************Definición de Ciudad **********************************************/

  public static function salvarFaciudad($faciudad,$estado,$ciudad)
  {

  	if (Herramientas :: getX_vacio('id', 'Faciudad', 'id', $faciudad->getId()) != '') {
  		if ($estado != 0){
		  $faciudad->setFaestadoId($estado);
		  $faciudad->setNomciu($ciudad);
		  $faciudad->save();
  		}
  	}
  	else{
      if ($estado!='')
      {
	      $tabla= new Faciudad();
	      $tabla->setFaestadoId($estado);
	      $tabla->setNomciu($ciudad);
	      $tabla->save();
      }
  	}
  }


/*******************************Fin Definición de Ciudad **********************************************/


/*******************************Recargos por Articulos **********************************************/

    public static function salvarFarecart($farecart, $grid, $codrgo){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $x[$j]->setCodrgo($codrgo);
        $x[$j]->setCodart($x[$j]->getCodart());
        $x[$j]->save();
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


/*******************************Fin Recargos por Articulos **********************************************/

/*******************************Descuentos por tipo de cliente **********************************************/
    public static function salvarFadtocte($fadtocte, $grid)
    {
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
          $x[$j]->setFatipcteId($fadtocte->getFatipcteId());
          $x[$j]->save();
          $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }

    }

/*******************************Fin Descuentos por tipo de cliente **********************************************/

/*******************************Consignación **********************************************/

  public static function salvarFaartpro($faartpro, $grid, $rifpro, $codalm){
    $codigo=Herramientas::getX('rifpro','facliente','codpro',$rifpro);

    $c = new Criteria();
    $c->add(FaartproPeer::CODPRO,$codigo);
    $c->add(FaartproPeer::CODALM,$codalm);
    $datos = FaartproPeer::doSelect($c);

    try
    {
       if ($datos)
       {
    	  foreach ($datos as $reg)
    	  {
           $reg->delete();
    	  }
       }
    }
    catch (PropelException $e){}


        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
              $x[$j]->setCodpro($codigo);
              $x[$j]->setCodalm($codalm);
              $x[$j]->setCodcta($faartpro->getCodcta());
              $x[$j]->setComisi($x[$j]->getComisi());
              $x[$j]->save();
              $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }
      }

/*******************************Fin Consignación **********************************************/

/******************************* Salvar Presupuesto **********************************************/
  public static function salvarFapresup($fapresup, $grid)
  {

    try {
	  if (Herramientas::getVerCorrelativo('corpre','Facorrelat',&$r))
	  {
	    //Se graba el Pedido
	    if ($fapresup->getRefpre()=='########')
	    {
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	          $sql="select refpre from Fapresup where refpre='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	    $fapresup->setRefpre(str_pad($r, 8, '0', STR_PAD_LEFT));
	    }
	    else
	    {
	      $fapresup->setRefpre(str_replace('#','0',$fapresup->getRefpre()));
	    }
	    $fapresup->save();

	    // Se graban los detalles del Pedido
	    self::Grabar_DetallesPresup($fapresup,$grid);
	    Herramientas::getSalvarCorrelativo('corpre','Facorrelat','Presupuesto',$r,$msg);
	  }

      return -1;
    } catch (Exception $ex) {
      return 0;
    }
  }

    public static function Grabar_DetallesPresup($fapresup, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	 $fadetpre= new Fadetpre();
         $fadetpre->setRefpre($fapresup->getRefpre());
         $fadetpre->setCodart($x[$j]->getCodart());
         $fadetpre->setCansol($x[$j]->getCansol());
         $fadetpre->setPrecio($x[$j]->getPrecio());
         $fadetpre->setMondesc($x[$j]->getMondesc());
         $fadetpre->setMonrgo($x[$j]->getMonrgo());
         $fadetpre->setTotart($x[$j]->getTotart());
         $fadetpre->setFecent($x[$j]->getFecent());
         $fadetpre->save();
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

/******************************* Fin de Salvar Presupuesto **********************************************/

/******************************* Salvar Ajustes **********************************************/
    public static function salvarFaajuste($faajuste,$grid)
    {
	    try {

        	  if (Herramientas::getVerCorrelativo('coraju','Facorrelat',&$r))
		  {
		    //Se graba el ajuste
		    if ($faajuste->getRefaju()=='########')
		    {
		        $encontrado=false;
		        while (!$encontrado)
		        {
		          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		          $sql="select refaju from Faajuste where refaju='".$numero."'";
		          if (Herramientas::BuscarDatos($sql,&$result))
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		        }
		    $faajuste->setRefaju(str_pad($r, 8, '0', STR_PAD_LEFT));
		    }
		    else
		    {
		      $faajuste->setRefaju(str_replace('#','0',$faajuste->getRefaju()));

		    }

                 if ($faajuste->getTipaju() == 'F'){

                            if (self::generarAsientos($faajuste, $grid,&$arrasientos,&$pos,&$msj3))
                            {
                              self::grabarComprobanteMaestro($faajuste,$arrasientos,&$pos);
                            }else {
                                return $msj3;
                            }
                      }
			$faajuste->setStaaju('A');
			$faajuste->save();


		    // Se graban los detalles del ajuste
		    self::Grabar_DetallesAjuste($faajuste,$grid);
		    Herramientas::getSalvarCorrelativo('coraju','Facorrelat','Ajustes',$r,$msg);
		  }

	      return -1;
	    } catch (Exception $ex) {
	      return 0;
	    }
    }

    public static function Grabar_DetallesAjuste($faajuste, $grid){
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$numlot = $reg->getNumlot();

      $x=$grid[0];
      $totalajus=0;
      $totalrec=0;
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="" && $x[$j]->getCanaju()>0)
       {
       	 $codarti = $x[$j]->getCodart();
       	 $famovaju= new Famovaju();
         $famovaju->setRefaju($faajuste->getRefaju());
         $famovaju->setCodart($codarti);
         if ($faajuste->getTipaju() == 'NE'){
             $famovaju->setNumlot($x[$j]->getNumlot());
         }
         $famovaju->setCanord($x[$j]->getCanord());
         if ($faajuste->getTipo()=='CREDITO')
         {
           $famovaju->setCanaju($x[$j]->getCanaju());
           $facantaju=$x[$j]->getCanaju();
           $famovaju->setPreaju($x[$j]->getAjupre());
           $fapreaju=$x[$j]->getAjupre();
         }
         else {
         	$famovaju->setCanaju($x[$j]->getCanaju()*(-1));
         	$facantaju=$x[$j]->getCanaju()*(-1);
           $famovaju->setPreaju($x[$j]->getAjupre()*(-1));
           $fapreaju=$x[$j]->getAjupre()*(-1);
         }
         $famovaju->setMontot($x[$j]->getMontot());
         $totalajus=$totalajus+$x[$j]->getMontot();
         $famovaju->setRecaju($x[$j]->getRecaju());
         $totalrec=$totalrec + $x[$j]->getRecaju();
         $famovaju->save();
         $tipo=H::getX('CODART','Caregart','Tipo',$codarti);

         if ($tipo=='A'){
		 if ($faajuste->getTipaju() == 'NE'){
		 	$p= new Criteria();
		 	$p->add(FaartnotPeer::NRONOT,$faajuste->getCodref());
		 	$p->add(FaartnotPeer::CODART,$codarti);
		 	$datos= FaartnotPeer::doSelectOne($p);
			if ($datos){
		 	$l= new Criteria();
		 	$l->add(CaregartPeer::CODART,$codarti);
		 	$data= CaregartPeer::doSelectOne($l);
		 	if ($data)
		 	{
              if ($x[$j]->getCanaju() < $x[$j]->getCanord())
              {
              	$data->setDistot($data->getDistot() + ($x[$j]->getCanord() - $x[$j]->getCanaju()));
              	$data->save();
              }else{
              	$data->setDistot($data->getDistot() - ($x[$j]->getCanaju() - $x[$j]->getCanord()));
              	$data->save();
              }
		 	}
                             $datos->setCanaju($datos->getCanaju() + $facantaju);
	         $datos->save();
			}
		 }
		 else if ($faajuste->getTipaju() == 'P'){
			 $p= new Criteria();
			 $p->add(FaartpedPeer::NROPED,$faajuste->getCodref());
			 $p->add(FaartpedPeer::CODART,$codarti);
  			 $datos= FaartpedPeer::doSelectOne($p);
  			 if ($datos){
                           $datos->setCanaju($datos->getCanaju() + $facantaju);
	           $datos->save();
			 }
		 }
		 else if ($faajuste->getTipaju() == 'F'){
		 	 $p= new Criteria();
			 $p->add(FaartfacPeer::REFFAC,$faajuste->getCodref());
			 $p->add(FaartfacPeer::CODART,$codarti);
  			 $datos= FaartfacPeer::doSelectOne($p);
  			 if ($datos){
		 	$l= new Criteria();
		 	$l->add(CaregartPeer::CODART,$codarti);
		 	$data= CaregartPeer::doSelectOne($l);
		 	if ($data)
		 	{
              if ($facantaju < $x[$j]->getCanord())
              {
              	$data->setDistot($data->getDistot() - $facantaju);
              	$data->save();
              }else{
              	$data->setDistot($data->getDistot() - ($facantaju - $x[$j]->getCanord()));
              	$data->save();
              }
		 	}
                            $sql="select preaju as preajureal from faartfac where reffac='".$faajuste->getCodref()."' and codart='".$codarti."'";
                            if (Herramientas::BuscarDatos($sql,&$result))
                              {
                                $precioajureal=$result[0]["preajureal"];
                              }
                           if ($x[$j]->getAjupre()==0)
	           $datos->setCanaju($datos->getCanaju() + $facantaju);
                           else
                            $datos->setPreaju($precioajureal + $fapreaju);

	           $datos->save();
			 }
		 }
        }
       }
       $j++;
      }
      if ($faajuste->getTipaju() == 'F'){
         self::ajusteDocumentoxCobrar($faajuste,$totalajus,$totalrec);

        /*  if (self::generarAsientos($faajuste, $grid,&$arrasientos,&$pos,&$msj3))
            {
              self::grabarComprobanteMaestro($faajuste,$arrasientos,&$pos);
            }*/
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

/******************************* Fin de Salvar Ajustes **********************************************/

/******************************* Salvar Devoluciones **********************************************/

    public static function salvarFadevolu($fadevolu,$grid)
    {
	    try {
		  if (Herramientas::getVerCorrelativo('cordev','Facorrelat',&$r))
		  {
		    //Se graba la devolución
		    if ($fadevolu->getNrodev()=='########')
		    {
		        $encontrado=false;
		        while (!$encontrado)
		        {
		          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		          $sql="select nrodev from Fadevolu where nrodev='".$numero."'";
		          if (Herramientas::BuscarDatos($sql,&$result))
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		        }
		    $fadevolu->setNrodev(str_pad($r, 8, '0', STR_PAD_LEFT));
		    }
		    else
		    {
		      $fadevolu->setNrodev(str_replace('#','0',$fadevolu->getNrodev()));

		    }
			$fadevolu->setStadph('A');
			$fadevolu->save();


		    // Se graban los detalles de la devolucion
		    self::Grabar_DetallesDev($fadevolu,$grid);
		    Herramientas::getSalvarCorrelativo('cordev','Facorrelat','Devolución',$r,$msg);
		  }

	      return -1;
	    } catch (Exception $ex) {
	      return 0;
	    }
    }

    public static function Grabar_DetallesDev($fadevolu, $grid){
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$numlot = $reg->getNumlot();

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="" && $x[$j]->getCandev()>0)
       {
       	 $codarti = $x[$j]->getCodart();
       	 $faartnot= new Faartdev();
         $faartnot->setNrodev($fadevolu->getNrodev());
         $faartnot->setCodart($codarti);
         $faartnot->setNumlot($numlot);
         $faartnot->setCandes($x[$j]->getCandph());
         $faartnot->setCandev($x[$j]->getCandev());
         $faartnot->setPreart($x[$j]->getPreart());
         $faartnot->setTotart($x[$j]->getMontot());
         $faartnot->save();

		 $p= new Criteria();
		 $p->add(CaregartPeer::CODART,$codarti);
		 $resul= CaregartPeer::doSelectOne($p);
		 if ($resul)
		 {
		 	$tipo=$resul->getTipo();
           if ($resul->getTipo()=='A')
           {
           	 $resul->setExitot($resul->getExitot() + $x[$j]->getCandev());
           	 $resul->setDistot($resul->getDistot() + $x[$j]->getCandev());
           	 $resul->save();
           }
		 }

         $t= new Criteria();
         $t->add(CaartalmPeer::CODALM,$x[$j]->getCodalm());
         $t->add(CaartalmPeer::CODART,$x[$j]->getCodart());
         $result= CaartalmPeer::doSelectOne($t);
         if ($result)
         {
         	if ($tipo=='A')
         	{
         		$result->setExiact($result->getExiact() + $x[$j]->getCandev());
         		$result->save();
         	}
         }

		 $sql = "select * from caartdph where dphart ='" . $fadevolu->getRefdes() . "' and codart = '" . $codarti. "'";
		 if (Herramientas :: BuscarDatos($sql, & $resul)) {
			if ($resul){
				foreach ($resul as $r){
				     $c = new Criteria();
				     $c->add(CaartdphPeer::DPHART,$r['dphart']);
				     $c->add(CaartdphPeer::CODART,$r['codart']);
				     $arti = CaartdphPeer::doSelectOne($c);
				     if ($arti){
				         $act1=$arti->getCandev() + $x[$j]->getCandev();
				         $arti->setCandev($act1);
				         $arti->save();
				     }
				}
			}
		 }

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

/******************************* Fin Salvar Devoluciones **********************************************/


/******************************* Salvar Nota de Entrega **********************************************/
  public static function salvarFafanot($fanotent, $grid,$logusu)
  {
    try {
	  if (Herramientas::getVerCorrelativo('cornot','Facorrelat',&$r))
	  {
	    //Se graba el Pedido
	    if ($fanotent->getNronot()=='########')
	    {
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	          $sql="select nronot from Fanotent where nronot='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	    $fanotent->setNronot(str_pad($r, 8, '0', STR_PAD_LEFT));
	    }
	    else
	    {
	      $fanotent->setNronot(str_replace('#','0',$fanotent->getNronot()));

	    }
		$fanotent->setStatus('A');
		if ($fanotent->getTipnot()=='O')
		{
			$fanotent->setAutori('S');
			$fanotent->setFecaut(date('Y-m-d'));
			$fanotent->setCodusu($logusu);

		}
		$fanotent->save();


	    // Se graban los detalles del Pedido
	    self::Grabar_DetallesNotEnt($fanotent,$grid);
	    if (self::grabarComprobanteNotEnt(&$fanotent, $grid,&$msj2))
	    {
	      $fanotent->save();
	    }
	    Herramientas::getSalvarCorrelativo('cornot','Facorrelat','Nota de Entrega',$r,$msg);
	  }

      return -1;
    } catch (Exception $ex) {
      return 0;
    }
  }

    public static function Grabar_DetallesNotEnt($fanotent, $grid){
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$numlot = $reg->getNumlot();

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	 if ($x[$j]->getCanent() > 0){
	       	 $faartnot= new Faartnot();
	         $faartnot->setNronot($fanotent->getNronot());
	         $faartnot->setCodart($x[$j]->getCodart());
	         $faartnot->setCodalm($x[$j]->getCodalm());
	         $faartnot->setNumlot($numlot);
	         $faartnot->setCansol($x[$j]->getCansol());
	         $faartnot->setCanent($x[$j]->getCanent());
	         $faartnot->setCandes($x[$j]->getCandes());
	         $faartnot->setCanaju($x[$j]->getCanaju());
	         $faartnot->setCandev($x[$j]->getCandev());
	         $faartnot->setCantot($x[$j]->getCantot());
	         $faartnot->setPreart($x[$j]->getPreart());
	         $faartnot->setMondes($x[$j]->getMondes());
	         $faartnot->setMonrgo($x[$j]->getMonrgo());
	         $faartnot->setTotart($x[$j]->getTotart());
	         $faartnot->save();

		     $codarti = $x[$j]->getCodart();
		     $cante = $x[$j]->getCanent();
		     $c = new Criteria();
		     $c->add(CaregartPeer::CODART,$codarti);
		     $arti = CaregartPeer::doSelectOne($c);
		     if ($arti)
		     {
		       $tipoart=$arti->getTipo();
		       if ($tipoart=='A')
		       {
		         $act1=$arti->getExitot() - $cante;
		         $dis1=$arti->getDistot() - $cante;
		         $arti->setExitot($act1);
		         $arti->setDistot($dis1);
		         $arti->save();

		         $c = new Criteria();
		         $c->add(CaartalmPeer::CODART,$codarti);
		         $c->add(CaartalmPeer::CODALM,$x[$j]->getCodalm());
		         $reg = CaartalmPeer::doSelectOne($c);
		         if ($reg)
		         {
		                if($reg->getExiact()>=$cante)
		                 {
		                     $act2=$reg->getExiact() - $cante;
		                     $reg->setExiact($act2);
		                     $reg->save();
		                 }
		         }
		       }
		     }

			 if ($fanotent->getTipref() == 'P'){

				 $sql = "select * from caartdph where codart = '" . $codarti. "' and dphart in (select dphart from cadphart where tipref = 'P' and reqart = '" . $fanotent->getCodref() . "' and stadph = 'A')";
	 			 if (Herramientas :: BuscarDatos($sql, & $resul)) {
	    			if ($resul){
	  					foreach ($resul as $r){
						     $c = new Criteria();
						     $c->add(CaartdphPeer::DPHART,$r['dphart']);
						     $c->add(CaartdphPeer::CODART,$r['codart']);
						     $c->add(CaartdphPeer::CODCAT,$r['codcat']);
						     $arti = CaartdphPeer::doSelectOne($c);
						     if ($arti){
						         $act1=$arti->getCanent() + $x[$j]->getCanent();
						         $arti->setCanent($act1);
						         $arti->save();
						     }
	  					}
	    			}
				 }
			 }

			 if ($fanotent->getTipref() == 'F'){

				 $sql = "select * from caartdph where codart = '" . $codarti. "' and dphart in (select dphart from cadphart where tipref = 'F' and reqart = '" . $fanotent->getCodref() . "' and stadph = 'A')";
	 			 if (Herramientas :: BuscarDatos($sql, & $resul)) {
	    			if ($resul){
	  					foreach ($resul as $r){
						     $c = new Criteria();
						     $c->add(CaartdphPeer::DPHART,$r['dphart']);
						     $c->add(CaartdphPeer::CODART,$r['codart']);
						     $c->add(CaartdphPeer::CODCAT,$r['codcat']);
						     $arti = CaartdphPeer::doSelectOne($c);
						     if ($arti){
						         $act1=$arti->getCanent() + $x[$j]->getCanent();
						         $arti->setCanent($act1);
						         $arti->save();
						     }
	  					}
	    			}
				 }
			 }


       	 }
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

	public static function BuscarTotalEntregado($codart, $tipref, $codref){
		//se suma lo entregado por notas de entrega
		$sql="select sum(canent) as canent from faartnot where codart = '" . $codart . "' and nronot in (select nronot from fanotent where tipref = '" . $tipref . "' and codref = '" . $codref . "' and status = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$canent = $resul[0]["canent"];
		} else {
			$canent = 0;
		}

		//se suma lo entregado por despachos
		$sql = "select sum(candph) as candph from caartdph where codart = '" . $codart . "' and dphart in (select dphart from cadphart where tipref = '" . $tipref . "' and reqart = '" . $codref . "' and stadph = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$candes = $resul[0]["candph"];
		} else {
			$candes = 0;
		}

		$totent = $canent + $candes;
		return $totent;
	}
/******************************* Fin de Salvar Nota de Entrega **********************************************/

/******************************* Salvar Pedidos **********************************************/

  public static function salvarPedidos($fapedido, $grid, $grid2)
  {
   	if ($fapedido->getId()=="")
   	{
  	 $nuevo=true;
  	 $c= new Criteria();
  	 $reg=FacorrelatPeer::doSelectOne($c);
  	 if ($reg)
  	 {
  		$reg->setCorped($reg->getCorped()+1);
  		$reg->save();
  	 }
   	}
  	else $nuevo=false;
  	$fapedido->setStatus('A');
    $fapedido->save();
    self::salvarFaartped($fapedido, $grid,$nuevo);
    self::salvarFafecped($fapedido, $grid2);
  }

/*******************************Fin Salvar Pedidos **********************************************/

/******************************* Detalle de Pedidos **********************************************/

    public static function salvarFaartped($fapedido, $grid, $nuevo){
    	try{
		      $x=$grid[0];
		      $j=0;
		      while ($j<count($x))
		      {
		        if (($fapedido->getRefped()!='' && $nuevo==true) || ($fapedido->getCombo()!='' && $nuevo==true))
		        {
		           if ($x[$j]->getCodart()!="" && $x[$j]->getCanord()>0)
			       {
			       	 $faartped= new Faartped();
		             $faartped->setNroped($fapedido->getNroped());
		             $faartped->setCodart($x[$j]->getCodart());
		             $faartped->setCanord($x[$j]->getCanord());
		             $faartped->setCanaju($x[$j]->getCanaju());
		             $faartped->setCandes($x[$j]->getCandes());
		             $faartped->setCantot($x[$j]->getCantot());
		             $faartped->setMondesc($x[$j]->getMondesc());
		             $faartped->setMonrgo($x[$j]->getMonrgo());
		             if ($fapedido->getCombo()!='')
		             {
		             	if ($x[$j]->getPreart()=="0,00")
				       {
				         $faartped->setPreart(H::tofloat($x[$j]->getPrecioe()));
				       }
				       else
				       {
				       	$faartped->setPreart($x[$j]->getPreart(true));
				       }
		             }
		             else
		             {
		               if ($x[$j]->getPreart()=="0,00")
				       {
				         $faartped->setPreart($x[$j]->getPrecioe());
				       }
				       else
				       {
				       	$faartped->setPreart($x[$j]->getPreart());
				       }
		             }
                     if ($fapedido->getRefped()!='')
                     {
		              $faartped->setTotart(H::tofloat($x[$j]->getTotart2()));
                     }else $faartped->setTotart(H::tofloat($x[$j]->getTotart()));

			         $faartped->save();
			       }
		        }
		        else
		        {
			       if ($x[$j]->getCodart()!="" && $x[$j]->getCanord()>0)
			       {
			       	$x[$j]->setNroped($fapedido->getNroped());
                     if ($x[$j]->getPreart()=="0,00")
				     {
				     	$x[$j]->setPreart($x[$j]->getPrecioe());
				     }
			        $x[$j]->save();
			       }
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

    		return -1;
    	}
	    catch (Exception $ex) {
	      return 0;
	    }


    }

/*******************************Fin Detalle de Pedidos **********************************************/

/******************************* Detalle de Fecha de Entrega de Pedidos **********************************************/

    public static function salvarFafecped($fapedido, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	$x[$j]->setNroped($fapedido->getNroped());
       	$x[$j]->setStafec('V');
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

/*******************************Detalle de Fecha de Entrega de Pedidos**********************************************/

public static function entregas($nroped)
{
 	$a= new Criteria();
  	$a->add(FaartpedPeer::NROPED,$nroped);
  	$reg= FaartpedPeer::doSelect($a);
  	if ($reg)
  	{
  	 foreach ($reg as $obj)
  	 {
  	 	if ($obj->getCandes()!=0)
  	 	{
  	 	  $entregas=true;
  	 	  break;
  	 	}
  	 	else {
  	 		$entregas=false;
  	 	}
  	 }
  	}else $entregas=false;
  	return $entregas;
}

/*******************************Edición de precios **********************************************/
    public static function salvarFaactpre($faartpvp, $grid, $tipo, $precio, $valor)
    {
        $valor = str_replace('.','',$valor);
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
          $codart = $x[$j]->getCodart();
          $c = new Criteria();
		  $c->add(FaartpvpPeer::CODART,$codart);
		  $datos = FaartpvpPeer::doSelect($c);

		    try
		    {
		       if ($datos)
		       {
		    	  foreach ($datos as $reg)
		    	  {
		    	  	if ($precio == 'A'){ //Aumenta
		    	  		if ($tipo == 'P'){ //Puntual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual + $valor;
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  		else{ //Porcentual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual + ($precio_actual * ($valor/100));
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  	}
		    	  	else{ //Disminuye
		    	  		if ($tipo == 'P'){ //Puntual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual - $valor;
		    	  		  if ($nuevo_precio < 0)
		    	  		     $nuevo_precio = 0;
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  		else{ //Porcentual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual - ($precio_actual * ($valor/100));
		    	  		  if ($nuevo_precio < 0)
		    	  		     $nuevo_precio = 0;
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  	}
		    	  }
		       }
		       else{
		       	  if ($tipo == 'P'){ //Puntual
			       	  $c = new Faartpvp();
			       	  $c->setCodart($codart);
			       	  $c->setPvpart($valor);
			       	  $c->setDespvp('Precio del Venta al Público');
			       	  $c->save();
		       	  }
		       }
		    }
		    catch (PropelException $e){}

          $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }

    }


/*******************************Fin Edición de precios **********************************************/

/*******************************Definición de Artículos (Correlativos)**********************************************/
	public static function salvarCuentas($ctadev, $ctavco, $generaop, $generacom, $apliclades){
		if ($generaop == 1)
			$generaop = 'S';
		else
			$generaop = 'N';
		if ($generacom == 1)
			$generacom = 'S';
		else
			$generacom = 'N';
		if ($apliclades == 1)
			$apliclades = 'S';
		else
			$apliclades = 'N';
		try{
			$c = new Criteria();
			$c->add(CadefartPeer::CODEMP,'001');
			$reg = CadefartPeer::doSelectone($c);
			if ($reg){
				$reg->setCtadev($ctadev);
				$reg->setCtavco($ctavco);
				$reg->setGeneraop($generaop);
				$reg->setGeneracom($generacom);
				$reg->setApliclades($apliclades);
				$reg->save();
			}
			return -1;
		}
		catch (Exception $ex){
			return 0;
		}
	}

    public static function salvarFacorrelat($fadefcaj, $grid,$proform)
    {
        if (self :: Grabar_Fadefcaj($fadefcaj,$proform) != -1) {
          return 0;
        }
        if (self :: Grabar_Correlativos($grid) != -1) {
          return 0;
        }
		return -1;
    }

  public static function Grabar_Fadefcaj($fadefcaj,$proform) {
    try {
     if ($proform == 1)
            $proform = 'S';
     else
            $proform = 'N';
     $fadefcaj->setProform($proform);
     $fadefcaj->save();
      return -1;
    } catch (Exception $ex) {

      return 0;

    }

  }

  public static function Grabar_Correlativos($grid) {
    try {
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
           $x[$j]->save();
           $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }

      return -1;

    } catch (Exception $ex) {

      return 0;

    }

  }

  public static function chequearCantPedido($refped,$articulo,$ajustada,$solicitada,$valorcol7,$precioaju,&$cantaju,&$canent)
  {
  	$cantaju=0;
  	$sument=0;
  	$sumdev=0;
  	$cantidad=0;
        $canent=0;

  	$p= new Criteria();
  	$p->add(FaartpedPeer::NROPED,$refped);
  	$p->add(FaartpedPeer::CODART,$articulo);
  	$reg= FaartpedPeer::doSelectOne($p);
  	if ($reg){
  	  $l= new Criteria();
  	  $l->add(FanotentPeer::TIPREF,'P');
  	  $l->add(FanotentPeer::CODREF,$refped);
  	  $regi= FanotentPeer::doSelect($l);
  	  if ($regi)
  	  {
  	  	foreach ($regi as $reg2)
  	  	{
	  	  	$y= new Criteria();
	  	  	$y->add(FaartnotPeer::NRONOT,$reg2->getNronot());
	  	  	$y->add(FaartnotPeer::CODART,$articulo);
	  	  	$regis= FaartnotPeer::doSelectOne($y);
	  	  	if ($regis){
             $sument= $sument + $regis->getCantot();
	  	  	}
  	  	}
  	  }

  	  if ($reg->getCantot()>$sument)
  	  {
  	  	$cantidad= $reg->getCantot() -$reg->getCandes();
  	  }

  	  if (H::tofloat($ajustada)>$cantidad)
  	  {
  	  	if ((H::tofloat($ajustada)<=$sument) && (H::tofloat($ajustada)>=$reg->getCandes()))
  	  	{
  	  	  $cantaju=$ajustada;
  	  	  return true;
  	  	}else
  	  	{
                   if ((H::tofloat($valorcol7)<H::tofloat($solicitada)) && (H::tofloat($ajustada)>=$reg->getCandes()))
           {
           	 $cantaju= $reg->getCantot() -$reg->getCandes();
           	 return true;
           }else
           {
                          if (H::tofloat($valorcol7)<$reg->getCandes())
           	{
           	  	$cantaju=-1;
           	  }else {
           	  	$canent=$reg->getCandes();
           	  	$cantaju=$solicitada;
           	  }
           	return false;
           }
  	  	}
  	  }else{
        if ($sument<=H::tofloat($ajustada))
        {
          $cantaju=$ajustada;
  	  	  return true;
        }else{
          $cantaju=-1;
          return false;
        }
  	  }
  	}else{
  	  return false;
  	}
  }

  public static function chequearCantNota($refnot,$articulo,$ajustada,$solicitada,$tipref,$canentart,$valorcol7,&$cantaju,&$canent,&$canrealped,&$canrealdes,&$canpuedoaju)
  {
    $suma=0;
    $totped=0;
    $cantaju=0;
    $totdes=0;
    $sumgrid=0;

    $l= new Criteria();
    $l->add(FanotentPeer::NRONOT,$refnot);
    $reg= FanotentPeer::doselectOne($l);
    if ($reg)
    {
      $codrefiere= $reg->getCodref();
      $refiere= $reg->getTipref();
      $a= new Criteria();
      $a->add(FanotentPeer::NRONOT,$refnot,Criteria::NOT_EQUAL);
      $a->add(FanotentPeer::CODREF,$codrefiere);
      $a->add(FanotentPeer::TIPREF,$refiere);
      $reg2= FanotentPeer::doselect($a);
      if ($reg2)
      {
      	foreach ($reg2 as $data)
      	{
      	  $e= new Criteria();
      	  $e->add(FaartnotPeer::NRONOT,$data->getNronot());
      	  $reg3= FaartnotPeer::doSelect($e);
      	  if ($reg3)
      	  {
      	  	foreach ($reg3 as $data1)
      	  	{
      	  	  if ($data1->getCodart()==$articulo)
      	  	  {
      	  	  	$suma= $suma + $data1->getCanent();
      	  	  }
      	  	}
      	  }
      	}
      }
      if ($tipref=='P')
      {
      	$t= new Criteria();
      	$t->add(FaartpedPeer::NROPED,$codrefiere);
      	$t->add(FaartpedPeer::CODART,$articulo);
      	$datos= FaartpedPeer::doSelectOne($t);
      }else if ($tipref=='NE')
      {
      	$t= new Criteria();
      	$t->add(FaartnotPeer::NRONOT,$refnot);
      	$t->add(FaartnotPeer::CODART,$articulo);
      	$datos= FaartnotPeer::doSelectOne($t);
      }else
      {
      	$t= new Criteria();
      	$t->add(FaartfacPeer::REFFAC,$refnot);
      	$t->add(FaartfacPeer::CODART,$articulo);
      	$datos= FaartfacPeer::doSelectOne($t);
      }
      if ($datos)
      {
      	$totdes= $datos->getCandes();
      	if ($tipref=='P' || $tipref=='F')
      	  $totped= $datos->getCantot();
      	else $totped=$datos->getCansol();

      	$canrealped=$datos->getCantot();
        $canrealdes=$datos->getCandes();
      }
      $sumgrid=$canentart;
    }else {
    	return false;
    }
    $cantaju=$totped - $suma - $sumgrid;
    $canent= $totdes;
    $canpuedoaju= $cantaju;
    if (H::tofloat($ajustada)>($totped - $suma - $sumgrid))
    {
    	return false;
    }else{
       if ((H::tofloat($valorcol7)>=$totdes) && (H::tofloat($valorcol7)<=$cantaju))
       {
         if ($totdes!=$cantaju)
         {
         	return true;
         }else return false;
       }else return false;
    }
  }

  public static function grabarComprobanteNotEnt(&$fades, $grid,&$msj2)
  {
    $grabarcomprobantenot=true;
    $msj2="";

	$correl=OrdendePago::Buscar_Correlativo();
	$reftra=$fades->getDphart();
    $fades->setNumcom($correl);
	$contabc= new Contabc();
	$contabc->setNumcom($correl);
	$contabc->setReftra($reftra);
	$contabc->setFeccom($fades->getFecdph());
	$contabc->setDescom($fades->getDesdph());
	$contabc->setStacom('D');
	$contabc->setTipcom(null);
	$contabc->setMoncom($fades->getMondph());

	$numasiento=0; // Generamos el asiento del Debito del articulo
	$numasiento2=0;
	$x=$grid[0];
	$j=0;
	while($j<count($x))
	{
	  $a= new Criteria();
	  $a->add(CaregartPeer::CODART,$x[$j]->getCodart());
	  $resul= CaregartPeer::doSelectOne($a);
	  if ($resul)
	  {
	      $monto=$x[$j]->getMontotdes();
	      if ($monto>0)
	      {
	        $f= new Criteria();
	        $f->add(Contabc1Peer::NUMCOM,$correl);
	        $f->add(Contabc1Peer::FECCOM,$fades->getFecdph());
	        $f->add(Contabc1Peer::CODCTA,$resul->getCtavta());
	        $resul2= Contabc1Peer::doSelectOne($f);
	        if ($resul2)
	        {
	          $contabc->save();
	          $resul2->setMonasi($resul2->getMonasi() + $monto);
	          $resul2->save();
	        }
	        else
	        {
	          $k= new Criteria();
	          $k->add(ContabbPeer::CODCTA,$resul->getCtavta());
	          $resul2= ContabbPeer::doSelectOne($k);
	          if ($resul2)
	          {
	          	$contabc->save();
	            $numasiento= $numasiento + 1;
	            $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl);
		        $contabc1->setFeccom($fades->getFecdph());
		        $contabc1->setCodcta($resul->getCtavta());
		        $contabc1->setNumasi($numasiento);
		        $contabc1->setRefasi($reftra);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('D');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

	          }
	          else
	          {
	          	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Venta asociada válida... El comprobante de Nota de Entrega no será generado";
	          	$grabarcomprobantenot=false;
	          	return $grabarcomprobantenot;
	          }
	        }

	        $f= new Criteria(); // Generamos el asiento del Credito del articulo
	        $f->add(Contabc1Peer::NUMCOM,$correl);
	        $f->add(Contabc1Peer::FECCOM,$fades->getFecdph());
	        $f->add(Contabc1Peer::CODCTA,$resul->getCtapro());
	        $resul2= Contabc1Peer::doSelectOne($f);
	        if ($resul2)
	        {
	          $contabc->save();
	          $resul2->setMonasi($resul2->getMonasi() + $monto);
	          $resul2->save();
	        }
	        else
	        {
	          $k= new Criteria();
	          $k->add(ContabbPeer::CODCTA,$resul->getCtapro());
	          $resul2= ContabbPeer::doSelectOne($k);
	          if ($resul2)
	          {
	          	$contabc->save();
	            $numasiento2= $numasiento2 + 1;
	            $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl);
		        $contabc1->setFeccom($fades->getFecdph());
		        $contabc1->setCodcta($resul->getCtapro());
		        $contabc1->setNumasi($numasiento2);
		        $contabc1->setRefasi($reftra);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('C');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

	          }
	          else
	          {
	          	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Ingreso de Venta asociada válida... El comprobante de Nota de Entrega no será generado";
	          	$grabarcomprobantenot=false;
	          	return $grabarcomprobantenot;
	          }
	        }
	    }
	    else
	    {
	      	$msj2="El Monto del Artículo ".$x[$j]->getCodart()." debe ser mayor a cero";
	        $grabarcomprobantenot=false;
	        return $grabarcomprobantenot;
	    }
	    }
	  	$j++;
	  }

    return $grabarcomprobantenot;
  }

  public static function eliminarFaajuste($faajuste)
  {
    self::devolverArticulosAju($faajuste);
    Herramientas :: EliminarRegistro('Famovaju', 'Refaju', $faajuste->getRefaju());
    Herramientas :: EliminarRegistro('Faajuste', 'Refaju', $faajuste->getRefaju());
  }

  public static function devolverArticulosAju($faajuste)
  {
    $totalajus=0;
    $totalrec=0;
    $r= new Criteria();
    $r->add(FamovajuPeer::REFAJU,$faajuste->getRefaju());
    $resu= FamovajuPeer::doSelect($r);
    if ($resu)
    {
      foreach ($resu as $resul) {
      $totalrec=$totalrec+$resul->getRecaju();
      $totalajus=$totalajus + $resul->getMontot();
      if ($faajuste->getTipaju()=='P')
      {
         $p= new Criteria();
         $p->add(FaartpedPeer::NROPED,$faajuste->getCodref());
         $p->add(FaartpedPeer::CODART,$resul->getCodart());
         $reg= FaartpedPeer::doSelectOne($p);
      }else if ($faajuste->getTipaju()=='NE'){
      	 $p= new Criteria();
         $p->add(FaartnotPeer::NRONOT,$faajuste->getCodref());
         $p->add(FaartnotPeer::CODART,$resul->getCodart());
         $reg= FaartnotPeer::doSelectOne($p);
      }else{
      	 $p= new Criteria();
         $p->add(FaartfacPeer::REFFAC,$faajuste->getCodref());
         $p->add(FaartfacPeer::CODART,$resul->getCodart());
         $reg= FaartfacPeer::doSelectOne($p);
      }
      if ($reg)
      {
        $tipo=H::getX('CODART','Caregart','Tipo',$resul->getCodart());
        if ($tipo=='A')
        {
            $l= new Criteria();
            $l->add(FadeflotPeer::CODART,$resul->getCodart());
            $l->add(FadeflotPeer::CODALM,$faajuste->getCodalm());
            $l->add(FadeflotPeer::NUMLOT,$resul->getNumlot());
            $datos= FadeflotPeer::doSelectOne($l);
            if ($datos)
            {
              if ($resul->getCanaju() <= $resul->getCanord())
              {
                $datos->setCanlot($datos->getCanlot() - ($resul->getCanord() - $resul->getCanaju()));
              	$datos->save();
              }else{
              	$data->setCanlot($datos->getCanlot() + ($resul->getCanaju() - $resul->getCanord()));
              	$datos->save();
              }
            }

            $l= new Criteria();
		 	$l->add(CaregartPeer::CODART,$resul->getCodart());
		 	$data= CaregartPeer::doSelectOne($l);
		 	if ($data)
		 	{
              if ($resul->getCanaju() <= $resul->getCanord())
              {
              	$data->setDistot($data->getDistot() - ($resul->getCanord() - $resul->getCanaju()));
              	$data->save();
              }else{
              	$data->setDistot($data->getDistot() + ($resul->getCanaju() - $resul->getCanord()));
              	$data->save();
              }
		 	}
        }
        if ($faajuste->getTipaju()=='F'){
        $sql="select preaju as preajureal from faartfac where reffac='".$faajuste->getCodref()."' and codart='".$resul->getCodart()."'";
        if (Herramientas::BuscarDatos($sql,&$result))
      {
        $precioajureal=$result[0]["preajureal"];
      }
            if ($resul->getPreaju()==0)
                $reg->setCanaju($reg->getCanaju()-$resul->getCanaju());
            else
                $reg->setPreaju($precioajureal-$resul->getPreaju());
        }else {
            $reg->setCanaju($reg->getCanaju()-$resul->getCanaju());
        }
        $reg->save();
      }
     }

     if ($faajuste->getTipaju()=='F'){
        $numcomp="AJ".substr($faajuste->getCodref(),2,6);
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $numcom=$numcomp;
        }else $numcom='';

        if ($numcom!='')
        {
            Herramientas :: EliminarRegistro('Contabc1', 'numcom', $numcom);
            Herramientas :: EliminarRegistro('Contabc', 'numcom', $numcom);
        }

      $q= new Criteria();
      $q->add(CobdocumePeer::REFFAC,$faajuste->getCodref());
      $registro= CobdocumePeer::doSelectOne($q);
      if ($registro)
      {
          $registro->setMondoc($registro->getMondoc()+($totalajus-$totalrec));
          $registro->setRecdoc($registro->getRecdoc() + $totalrec);
          $registro->setSaldoc($registro->getMondoc() + $registro->getRecdoc()-$registro->getDscdoc()-$registro->getAdodoc());
          $registro->save();
      }
     }

    }
  }

  public static function generarAsientos($faajuste, $grid,&$arrasientos,&$pos,&$msj3)
  {
  	$msj3=-1;
        $saldoactual=$faajuste->getMonaju();
        $periodocon=substr($faajuste->getFecaju(),0,4);

        $arrasientos=array();
  	$pos=0;

        $codcli=H::getX('REFFAC', 'Fafactur', 'Codcli', $faajuste->getCodref());
        $ctacont=H::getX('CODPRO', 'Facliente', 'Codcta', $codcli);
        if ($faajuste->getTipo()=='DEBITO')
        {
          if ($ctacont!=""){
          $desdoc=H::getX('codcta','Contabb','Descta',$ctacont);
          Factura::guardarAsientos($ctacont,$desdoc,'D',$saldoactual,&$arrasientos,&$pos);
          }else{
            $msj3=1147;
            return false;
         }

        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $monto_ingreso=$x[$j]->getMonaju();
          $cta_vta=H::getX('Codart','Caregart','Codcta',$x[$j]->getCodart());
          if ($cta_vta!="")
          {
            if (!Factura::buscarAsientos($cta_vta,'C',$monto_ingreso,&$arrasientos,&$pos))
            {
              $descrip=H::getX('codcta','Contabb','Descta',$cta_vta);
              Factura::guardarAsientos($cta_vta,$descrip,'C',$monto_ingreso,&$arrasientos,&$pos);
            }
          }else{
              $msj3=1159;
      	      return false;
          }

          //Recargos
          if ($x[$j]->getRecaju()>0) {
          $cta_vta2=self::cuentaRecargo($x[$j]->getCodart(),$faajuste->getCodref());
          $monto_ingreso2=$x[$j]->getRecaju();
          if ($cta_vta2!="")
          {
            if (!Factura::buscarAsientos($cta_vta2,'C',$monto_ingreso2,&$arrasientos,&$pos))
            {
              $descrip=H::getX('codcta','Contabb','Descta',$cta_vta2);
              Factura::guardarAsientos($cta_vta2,$descrip,'C',$monto_ingreso2,&$arrasientos,&$pos);
            }
          }else{
              $msj3=1152;
      	      return false;
          }
          }
           $j++;
        }

       }
        else
       {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $monto_ingreso=$x[$j]->getMonaju();
          $cta_vta=H::getX('Codart','Caregart','Codcta',$x[$j]->getCodart());
          if ($cta_vta!="")
          {
            if (!Factura::buscarAsientos($cta_vta,'D',$monto_ingreso,&$arrasientos,&$pos))
            {
              $descrip=H::getX('codcta','Contabb','Descta',$cta_vta);
              Factura::guardarAsientos($cta_vta,$descrip,'D',$monto_ingreso,&$arrasientos,&$pos);
            }
          }else{
              $msj3=1159;
      	      return false;
          }

          //Recargos
          if ($x[$j]->getRecaju()>0) {
          $cta_vta2=self::cuentaRecargo($x[$j]->getCodart(),$faajuste->getCodref());
          $monto_ingreso2=$x[$j]->getRecaju();
          if ($cta_vta2!="")
          {
            if (!Factura::buscarAsientos($cta_vta2,'D',$monto_ingreso2,&$arrasientos,&$pos))
            {
              $descrip=H::getX('codcta','Contabb','Descta',$cta_vta2);
              Factura::guardarAsientos($cta_vta2,$descrip,'D',$monto_ingreso2,&$arrasientos,&$pos);
            }
          }else{
              $msj3=1152;
      	      return false;
          }
          }
           $j++;
        }

        if ($ctacont!=""){
          $desdoc=H::getX('codcta','Contabb','Descta',$ctacont);
          Factura::guardarAsientos($ctacont,$desdoc,'C',$saldoactual,&$arrasientos,&$pos);
          }else{
            $msj3=1147;
            return false;
         }
       }
     return true;
  }

  public static function ajusteRecargo($articulo,$referencia)
  {
    $ajusterec=0;
       $t= new Criteria();
       $t->add(FargoartPeer::REFDOC,$referencia);
       $t->add(FargoartPeer::CODART,$articulo);
       $t->addJoin(FarecargPeer::CODRGO,FargoartPeer::CODRGO);
       $result=FarecargPeer::doSelectOne($t);
       if ($result)
       {
         $ajusterec=$result->getMonrgo()/100;
       }

       return $ajusterec;
  }

  public static function cuentaRecargo($articulo,$referencia)
  {
    $cuentarec="";
       $t= new Criteria();
       $t->add(FargoartPeer::REFDOC,$referencia);
       $t->add(FargoartPeer::CODART,$articulo);
       $t->addJoin(FarecargPeer::CODRGO,FargoartPeer::CODRGO);
       $result=FarecargPeer::doSelectOne($t);
       if ($result)
       {
         $cuentarec=$result->getCodcta();
       }

       return $cuentarec;
  }

  public static function grabarComprobanteMaestro($faajuste,$arrasientos,&$pos)
  {
    $periodocon=substr($faajuste->getFecaju(),0,4);
    $numcomp="AJ".substr($faajuste->getCodref(),2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $correl= $numcomp;
    }else $correl=OrdendePago::Buscar_Correlativo();

    $contabc = new Contabc();
    $contabc->setNumcom($correl);
    $contabc->setFeccom($faajuste->getFecaju());
    if ($faajuste->getDesaju()!="")
     $contabc->setDescom($faajuste->getDesaju());
    else $contabc->setDescom('FACTURACION');
    $contabc->setStacom('D');
    $contabc->setTipcom(null);
    $contabc->setMoncom($faajuste->getMonaju());
    $contabc->save();

    self::grabarComprobanteDetalle($faajuste,$correl,$arrasientos,&$pos);
  }

  public static function grabarComprobanteDetalle($faajuste,$correl,$arrasientos,&$pos)
  {
    if ($pos!=0)
    {
      $i=0;
	  while ($i<=($pos-1))
	  {
	  	if ($arrasientos[$i]["2"]!="")
	  	{
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($correl);
                  $contabc1->setFeccom($faajuste->getFecaju());
                  $contabc1->setCodcta($arrasientos[$i]["0"]);
                  $numasi= $i +1;
                  $contabc1->setNumasi($numasi);
                  $contabc1->setRefasi($faajuste->getRefaju());
                  $contabc1->setDesasi($arrasientos[$i]["1"]);
                  if ($arrasientos[$i]["2"]=='D')
                  {
                        $contabc1->setDebcre('D');
                        $contabc1->setMonasi($arrasientos[$i]["3"]);
                  }
                  else
                  {
                        $contabc1->setDebcre('C');
                        $contabc1->setMonasi($arrasientos[$i]["3"]);
                  }
                  $contabc1->save();
            }
            $i++;
      }
    }
  }

  public static function ajusteDocumentoxCobrar($faajuste,$totalajus,$totalrec)
  {
      $q= new Criteria();
      $q->add(CobdocumePeer::REFFAC,$faajuste->getCodref());
      $registro= CobdocumePeer::doSelectOne($q);
      if ($registro)
      {
          $registro->setMondoc($registro->getMondoc()-($totalajus-$totalrec));
          $registro->setRecdoc($registro->getRecdoc() - $totalrec);
          $registro->setSaldoc($registro->getMondoc() + $registro->getRecdoc()-$registro->getDscdoc()-$registro->getAdodoc());
          $registro->save();
      }
  }


/*******************************Fin Definición de Artículos **********************************************/

}
?>
