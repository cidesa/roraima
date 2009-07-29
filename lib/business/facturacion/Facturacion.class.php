<?php

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
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	 $codarti = $x[$j]->getCodart();
       	 $famovaju= new Famovaju();
         $famovaju->setRefaju($faajuste->getRefaju());
         $famovaju->setCodart($codarti);
         $famovaju->setNumlot($numlot);
         $famovaju->setCanord($x[$j]->getCansol());
         $famovaju->setCanaju($x[$j]->getCanajustada());
         $famovaju->setMontot($x[$j]->getMontot());
         $famovaju->save();
		 if ($faajuste->getTipaju() == 'NE'){
			 $sql = "select * from faartnot where nronot ='" . $faajuste->getCodref() . "' and codart = '" . $codarti. "'";
			 if (Herramientas :: BuscarDatos($sql, & $resul)) {
				if ($resul){
					foreach ($resul as $r){
					     $c = new Criteria();
					     $c->add(FaartnotPeer::NRONOT,$r['nronot']);
					     $c->add(FaartnotPeer::CODART,$r['codart']);
					     $arti = FaartnotPeer::doSelectOne($c);
					     if ($arti){
					         $act1=$arti->getCanaju() + $x[$j]->getCanajustada();
					         $arti->setCanaju($act1);
					         $arti->save();
					     }
					}
				}
			 }
		 }
		 else if ($faajuste->getTipaju() == 'P'){
			 $sql = "select * from faartped where nroped ='" . $faajuste->getCodref() . "' and codart = '" . $codarti. "'";
			 if (Herramientas :: BuscarDatos($sql, & $resul)) {
				if ($resul){
					foreach ($resul as $r){

					     $c = new Criteria();
					     $c->add(FaartpedPeer::NROPED,$r['nroped']);
					     $c->add(FaartpedPeer::CODART,$r['codart']);
					     $arti = FaartpedPeer::doSelectOne($c);
					     if ($arti){
					         $act1=$arti->getCanaju() + $x[$j]->getCanajustada();
					         $arti->setCanaju($act1);
					         $arti->save();
					     }
					}
				}
			 }
		 }
		 else if ($faajuste->getTipaju() == 'F'){
			 $sql = "select * from faartfac where codref ='" . $faajuste->getCodref() . "' and codart = '" . $codarti. "'";
			 if (Herramientas :: BuscarDatos($sql, & $resul)) {
				if ($resul){
					foreach ($resul as $r){

					     $c = new Criteria();
					     $c->add(FaartfacPeer::REFFAC,$r['reffac']);
					     $c->add(FaartfacPeer::CODART,$r['codart']);
					     $arti = FaartfacPeer::doSelectOne($c);
					     if ($arti){
					         $act1=$arti->getCanaju() + $x[$j]->getCanajustada();
					         $arti->setCanaju($act1);
					         $arti->save();
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
       if ( $x[$j]->getCodart()!="")
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

    public static function salvarFacorrelat($fadefcaj, $grid)
    {
        if (self :: Grabar_Fadefcaj($fadefcaj) != -1) {
          return 0;
        }
        if (self :: Grabar_Correlativos($grid) != -1) {
          return 0;
        }
		return -1;
    }

  public static function Grabar_Fadefcaj($fadefcaj) {
    try {

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

/*******************************Fin Definición de Artículos **********************************************/

}
?>