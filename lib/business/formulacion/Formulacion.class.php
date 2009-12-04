<?php
/**
 * Formulacion: Clase estática para el manejo de la formulación Presupuestaria
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Formulacion.class.php 32397 2009-09-01 19:18:37Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Formulacion
{
/****************************Definicion de Equilibrios********************************************/
  public static function salvarFordefequ($equilibrio)
  {
    if ($equilibrio->getId()=='')
    {
      if (Herramientas::getVerCorrelativo('corequ','fordefegrgen',$r))
      {
         if ($equilibrio->getCodequ()=='##')
     {
            $equilibrio->setCodequ(str_pad($r, 2, '0', STR_PAD_LEFT));
     }
     $equilibrio->save();

     Herramientas::getSalvarCorrelativo('corequ','Fordefegrgen','Equilibrio',$r,$msg);
         self::incluyeForcorsubobj($equilibrio);
      }
    }
    else
    {
      $equilibrio->save();
    }
  }

  public static function incluyeForcorsubobj($equilibrio)
  {
    $codigo= $equilibrio->getCodequ();
    $incluye= new Forcorsubobj();
    $incluye->setCodequ($codigo);
    $incluye->setCorsubobj(0);
    $incluye->save();
  }

  /****************************************************************************************************/

/****************************Definicion de SubSubObjetivos*********************************************/

  public static function salvarFordefsubsubobj($subsubobjetivo)
  {
    if ($subsubobjetivo->getId()=='')
    {
      if (self::obtenerCorrelativo($subsubobjetivo,&$correl))
      {
         if ($subsubobjetivo->getCodsubsubobj()=='###')
     {
            $subsubobjetivo->setCodsubsubobj(str_pad($correl, 3, '0', STR_PAD_LEFT));
     }
    }
     $subsubobjetivo->save();

     self::actualizarForcorsubsubobj($subsubobjetivo,$correl);

    }
    else
    {
      $subsubobjetivo->save();
    }
  }

  public static function obtenerCorrelativo($subsubobjetivo,&$correl)
  {
    $equ=$subsubobjetivo->getCodequ();
    $subobj=$subsubobjetivo->getCodsubobj();
    $correl=0;

    $c = new Criteria();
    $c->add(ForcorsubsubobjPeer::CODEQU,$equ);
    $c->add(ForcorsubsubobjPeer::CODSUBOBJ,$subobj);
    $correla = ForcorsubsubobjPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCorsubsubobj();

      $correl= $correl + 1;
    }
    else
    {
      $correl=1;
    }
    return true;
  }

  public static function actualizarForcorsubsubobj($subsubobjetivo,$correl)
  {
    $equ=$subsubobjetivo->getCodequ();
    $subobj=$subsubobjetivo->getCodsubobj();
    $subsubobj=$subsubobjetivo->getCodsubsubobj();

    $c = new Criteria();
    $c->add(ForcorsubsubobjPeer::CODEQU,$equ);
    $c->add(ForcorsubsubobjPeer::CODSUBOBJ,$subobj);
    $actual = ForcorsubsubobjPeer::doSelectOne($c);
    if ($actual)
    {
      	$actual->setCorsubsubobj($correl);
      	$actual->save();
    }
    else
    {
   		$registro= new Forcorsubsubobj();
    	$registro->setCodequ($equ);
    	$registro->setCodsubobj($subobj);
    	$registro->setCorsubsubobj($correl);
    	$registro->save();
    }

  }

  public static function validarFordefsubsubobj($politicas,$msj)
  {
      if (self::obtenerCorrelativo($politicas,&$correl))
      {
        if ($politicas->getCodsubsubobj()=='###')
        {
         $codigo=str_pad($correl, 3, '0', STR_PAD_LEFT);
        }
      }

    $c= new Criteria();
  	$c->add(FordefsubsubobjPeer::CODEQU,$politicas->getCodequ());
  	$c->add(FordefsubsubobjPeer::CODSUBOBJ,$politicas->getCodsubobj());
  	$c->add(FordefsubsubobjPeer::CODSUBSUBOBJ,$codigo);
  	$resul= FordefsubsubobjPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $msj=300;
  	}
  	else
  	{
  		return $msj=-1;
  	}
  }


  /********************************************************************************************************/

  /**********************************Clasificador Presupuestario(Gastos)*******************************************/

  public static function validarPretitgas($clasificador)
  {
    return self::validarCodigoPresupuestario($clasificador);
  }


  public static function validarCodigoPresupuestario($clasificador)
  {
    $codpre=$clasificador->getCodparegr();
    $formato=Herramientas::getObtener_FormatoPartida_Formulacion();
    Herramientas::formarCodigoPadre($codpre,&$nivelcodigo,&$cad,$formato);
   if (!(Herramientas::buscarCodigoPadre('Codparegr','Fordefparegr',$cad)))
   {
     If ($nivelcodigo == 0)
     {
      return 100;
     }
      else return -1;
     }else return -1;
    }


   public static function Buscar_CodigoHijo_Pretitgas($CodigoBus)
   {
     $sql = "Select * from ForDefParEgr where CodParEgr Like '" . $CodigoBus. "%'";
     if (Herramientas::BuscarDatos($sql,&$result))
     {
      if (count($result)>1)
           return true;
      else
          return false;
     }
     else
     {
     	return false;
     }
   }
  /********************************************************************************************************/

/****************************Metas Asociadas a proyectos y acciones Especificas*****************************/

  public static function salvarFordefpryaccmet($meta,$grid)
  {
    self::grabarMetas($meta,$grid);
  }

  public static function grabarMetas($meta,$grid)
  {
    $proyec=$meta->getCodpro();
    $accion=$meta->getCodaccesp();
    $x=$grid[0];
    //H::printR($x);exit();
    $j=0;
    while ($j<count($x))
    {
     if ($proyec!='' && $accion!='' && $x[$j]->getCodmet()!='' && $x[$j]->getDesmet()!='')
     {
       $x[$j]->setCodpro($proyec);
       $x[$j]->setCodaccesp($accion);
       if ($x[$j]->getDistribucion()!='')
       {
       	  $c = new Criteria();
          $c->add(FordismetperpryaccmetPeer::CODPRO,$proyec);
          $c->add(FordismetperpryaccmetPeer::CODMET,$x[$j]->getCodmet());
          $c->add(FordismetperpryaccmetPeer::CODACCESP,$accion);
          FordismetperpryaccmetPeer::doDelete($c);

       	$canxmet=split('!',$x[$j]->getDistribucion());
       	$c= new Criteria();
       	$r=0;
       	$acumcantidad = 0;
       	while ($r<(count($canxmet)-1))
       	{
       	  $aux=$canxmet[$r];
       	  $aux2=split('-',$aux);
       	  $dismetperpryaccmet= new Fordismetperpryaccmet();
       	  $dismetperpryaccmet->setCodpro($proyec);
       	  $dismetperpryaccmet->setCodaccesp($accion);
       	  $dismetperpryaccmet->setCodMet($x[$j]->getCodmet());
       	  $dismetperpryaccmet->setPerpre($aux2[0]);
       	  $dismetperpryaccmet->setCanmet(Herramientas::convnume($aux2[1]));
       	  $dismetperpryaccmet->setCanmeteje(Herramientas::convnume($aux2[2]));
       	  $acumcantidad = $acumcantidad + Herramientas::convnume($aux2[1]);
       	  $dismetperpryaccmet->save();
       	  $r++;
       	}
       	$x[$j]->setCanmet($acumcantidad);
       }


	   //H::printR($x[$j]);
	   //exit();
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

  public static function eliminarFordefpryaccmet($meta)
  {
    $c = new Criteria();
    $c->add(FordefpryaccmetPeer::CODPRO,$meta->getCodpro());
    $c->add(FordefpryaccmetPeer::CODACCESP,$meta->getCodaccesp());
    $datos=FordefpryaccmetPeer::doSelect($c);
    if ($datos)
    {
    	foreach ($datos as $metas)
    	{
    	  $c= new Criteria();
    	  $c->add(FordismetperpryaccmetPeer::CODPRO,$metas->getCodpro());
          $c->add(FordismetperpryaccmetPeer::CODACCESP,$metas->getCodaccesp());
          $c->add(FordismetperpryaccmetPeer::CODMET,$metas->getCodmet());
          FordismetperpryaccmetPeer::doDelete($c);

    	  $metas->delete();
    	}
    }

  }

/***********************************************************************************************************/

 /**********************************Grabar Grib de Acciones Especificas*******************************************/

  public static function Grabar_AccionesEspecificas($fordefaccesp,$grid)
  {
    $codpro=$fordefaccesp->getCodpro();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $x[$j]->setCodpro($codpro);
      $x[$j]->save();
      $j++;
    }
    $z=$grid[1];
    $j=0;
	    if (!empty($z[$j]))
	    {
	    	echo "1";
	      while ($j<count($z))
	      {
	        $z[$j]->delete();
	        $j++;
	      }

	    }
  }

 /********************************************************************************************************/

/*********************************Niveles Presupuestarios**************************************************/
  public static function salvarPrenivpre($niveles,$grid,$grid2)
  {
    $niveles->save();
    self::grabarGridNiveles($grid);
    self::grabarGridPeriodos($niveles,$grid2);
  }

  public static function grabarGridNiveles($grid)
  {
    $x=$grid[0];
  $j=0;
  while ($j<count($x))
    {
    $x[$j]->setConsec($j+1);
    $x[$j]->setStaniv('A');
    $x[$j]->save();
      $j++;
    }
  }

  public static function grabarGridPeriodos($niveles,$grid2)
  {
    $fecha1=$niveles->getFecini();
    $fecha2=$niveles->getFeccie();
    $y=$grid2[0];
    $i=0;
  while ($i<count($y))
    {
    $y[$i]->setFecini($fecha1);
    $y[$i]->setFeccie($fecha2);
    $y[$i]->save();
      $i++;
    }
  }
/***********************************************************************************************************/

/****************************Seguimiento de Metas Formuladas en el POA**************************************/

  public static function salvarFordismetperpryaccmet($ejecucion,$grid)
  {
    self::grabarEjecucion($ejecucion,$grid);
  }

  public static function grabarEjecucion($ejecucion,$grid)
  {
    $proyecto=$ejecucion->getCodpro();
    $accion=$ejecucion->getCodaccesp();
    $met=$ejecucion->getCodmet();
    $x=$grid[0];
    $j=0;

   while ($j<count($x))
   {
     $c = new Criteria();
     $c->add(FordismetperpryaccmetPeer::CODPRO,$proyecto);
     $c->add(FordismetperpryaccmetPeer::CODACCESP,$accion);
     $c->add(FordismetperpryaccmetPeer::CODMET,$met);
     $c->add(FordismetperpryaccmetPeer::PERPRE,$x[$j]->getPerpre());
     $ejecutadas= FordismetperpryaccmetPeer::doSelectOne($c);

     if ($ejecutadas)
     {
       $ejecutadas->setCanmeteje($x[$j]->getCanmeteje());
       $ejecutadas->save();
     }
     $j++;
   }
   }


/***********************************************************************************************************/

/*************************************Proyecto y Acciones Centralizadas*******************************************/
  public static function salvarFordefproyecto($proyecto,$grid,$grid2)
  {
    $proyecto->save();
    self::grabarOrganismo($proyecto,$grid2);
    self::grabarUbicacion($proyecto,$grid);
  }

  public static function grabarOrganismo($proyecto,$grid2)
  {
    $codproyec= $proyecto->getCodpro();
    $x=$grid2[0];
    $j=0;
  while ($j<count($x))
  {
   if ($x[$j]->getCodorg()!='')
   {
    $x[$j]->setCodpro($codproyec);
    $x[$j]->save();

   } $j++;
    }
    $z=$grid2[1];
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

  public static function grabarUbicacion($proyecto,$grid)
  {
  $codproyec= $proyecto->getCodpro();
  $x=$grid[0];
  $j=0;
  while ($j<count($x))
  {
	   if ($x[$j]->getCodest()!='')
	   {
	    $x[$j]->setCodpro($codproyec);
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


  public static function eliminarFordefproyecto($proyecto)
  {
    self::eliminarProyecto($proyecto);
  }

  public static function eliminarProyecto($proyecto)
  {
    $codigo=$proyecto->getCodpro();
    Herramientas::EliminarRegistro('Forpryorgpub','Codpro',$codigo);
    $proyecto->delete();
  }

/***********************************************************************************************************/

/****************************Actualización Totales de Fuente de Ingresos **************************************/
  public static function actdisfueing()
  {
       //$sql = "Select  Sum(MontoIng) as ingreso, Sum(MontoDis) as disponible, codtipfin
       //          From ForParIng Group by codtipfin Order by CodTipFin ";

		$sql = "Select  Sum(MontoIng) as ingreso, Sum(MontoIng) as disponible, codfin
                 From foringdisfuefin Group by codfin Order by Codfin";
    $result=array();
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $i=0;
      while ($i<count($result))
      {
        $montodis = $result[$i]['disponible'];
        $montoing = $result[$i]['ingreso'];
        $codtipfin= $result[$i]['codfin'];

          $c = new Criteria();
          $c->add(FortipfinPeer::CODFIN,$codtipfin);
          $obj = FortipfinPeer::doSelectone($c);
          if ($obj)
           {
            $obj->setMontodis($montodis);
            $obj->setMontoing($montoing);
            $obj->save();
           }//if ($obj)
         $i++;
      } //while ($i<count($result))
    }//if (Herramientas::BuscarDatos($sql,&$result))
    else
    {
        $montodis = 0;
        $montoing = 0;
        $c = new Criteria();
        $obj = FortipfinPeer::doSelect($c);
        if ($obj){
        foreach ($obj as $reg)
           {
            $reg->setMontodis($montodis);
            $reg->setMontoing($montoing);
            $reg->save();
           }//if ($obj)
    	}
     }
  }


  public static function chequeaformulaciones($tabla)
  {
  $sql = "Select *  From " . $tabla;
  $result=array();
  if (Herramientas::BuscarDatos($sql,&$result))
    return false;
    else
      return true;
 }



  public static function verificarexistenmovimientos()
  {
     if (self::chequeaformulaciones("ForEncPryAccEspMet")) //and self::chequeaformulaciones("ForDirEncPryAcc"))
         return false;
      else
         return true;
  }


/***********************************************************************************************************/

/**********************************Clasificador Presupuestario(Recursos)*******************************************/

  public static function validarPretiting($codpre)
  {
    return self::verificarpadre($codpre);
  }


  public static function verificarpadre($codpre)
  {
    $formato=Herramientas::getObtener_FormatoPartida_Formulacion();
    Herramientas::formarCodigoPadre($codpre,&$nivelcodigo,&$cad,$formato);
   // exit($nivelcodigo);
    if (!(Herramientas::buscarCodigoPadre('Codparing','Fordefparing',$cad)))
   	{
	     if ($nivelcodigo == 0)
	     {
	      return 100;
	     }
      	else return -1;
    }else return -1;
   }

   public static function Buscar_CodigoHijo($CodigoBus)
   {
     $sql = "Select * from ForDefParIng where CodParIng Like '" . $CodigoBus. "%'";
     if (Herramientas::BuscarDatos($sql,&$result))
     {
      if (count($result)>1)
           return true;
      else
          return false;
     }
     else
     {
     	return false;
     }
   }


  /********************************************************************************************************/

  //////////////////////////////
    //     Formulacion POA
    //     Ing Jesus Lobaton
    //       03-07-07
    //////////////////////////////


    /*
     * Función Principal para guardar datos del formulario forpoa
     *
     * @static
     * @param $reg Objeto de la tabla maestar del formulario
     * @param $grid Array de Objects de la Forpoa.
     * @return void
     */
  public static function validarForpoa($reg,$grid)
  {
    $result = -1;

	  $registro=$grid[0];
		  if (empty($registro[0]))
		   {
		   	//No se guardo el encabezado de la Fomulacion.
		   	//El grid debe contener datos
		  	return 302;
		   }
	return $result;
  }

  /**
   * Función para registrar la Formulacion
   *
   * @static
   * @param $Forencpryaccespmet Object Formulacion a guardar
   * @param $grid Array de Objects Plan Operativo.
   * @return void
   */
  public static function salvarForpoa($forencpryaccespmet,$grid)
  {
  try{
	self::Grabar_ForEncPryAccEspMet($forencpryaccespmet,$grid);
  	if (self::Grabar_ForEncPryAccEspMet($forencpryaccespmet,$grid)!=-1){ return 302; }
  	if (self::Grabardismonper($forencpryaccespmet,$grid)!=-1){ return 0; }
	if (self::Grabar_ForDetPryAccEspMet($forencpryaccespmet,$grid)!=-1){ return 0; }  	  //Graba Detalle de la Formulacion por Metas
	if (self::GrabarDisFueFinPryAccMet($forencpryaccespmet,$grid)!=-1) { return 302; }  	      //Montos de Financiamientos

	if (self::Actualiza_Fuentes_de_Financiamiento_Real($forencpryaccespmet,$grid)!=-1) { exit('4'); return 302; }  	      //Montos de Financiamientos
//exit('777777777');
/*
	self::Grabar_ForEncPryAccEspMet($forencpryaccespmet,$grid);
  	//self::Grabardismonper($forencpryaccespmet,$grid);
	self::Grabar_ForDetPryAccEspMet($forencpryaccespmet,$grid);  	  //Graba Detalle de la Formulacion por Metas
	exit();
	self::GrabarDisFueFinPryAccMet($forencpryaccespmet,$grid);  	 // Montos de Financiamientos

	//if (self::GrabarDisFueFinPryAccMet($forencpryaccespmet,$grid)!=-1){ return 302; }
	self::Actualiza_Fuentes_de_Financiamiento_Real($forencpryaccespmet,$grid);  // Actualiza de Forma Real las Fuentes de Financiamiento
*/

//self::Actualiza_Fuentes_de_Financiamiento_Real($forencpryaccespmet,$grid);  // Actualiza de Forma Real las Fuentes de Financiamiento

//sql = "Select * from ForDisFueFinPryAccMet where  "'  and CodPre = '" + CodPre + "'"

      // esto no va //
       //self::Grabar_fordetpryaccespmet($forencpryaccespmet,$grid); //Detalles
       //self::GrabarDisActPerPryAccMet '  Metas para el CIEPE antes Actividades por  Periodo /

      return -1;

  } catch (Exception $ex){
     return 0;
  }
  }


  /**
   * Función para Actualiza de Forma Real las Fuentes de Financiamiento
   *
   * @static
   * @param $forencpryaccespmet Object Formulacion para consultar
   * @param $grid Array de Objects Plan Operativo.
   * @return void
   */
  public static function Actualiza_Fuentes_de_Financiamiento_Real($forencpryaccespmet,$grid)
  {
	$x=$grid[0];
	$j=0;

	try
	{
		while($j<count($x))
		{
		    $monto = split("_",$x[$j]->getGrid2_());
		    $codparing = split("_",$x[$j]->getCajaoculta2());

			$i=0;
			while($i<count($codparing))
			{
				if ($monto[$i]!=0){
				  $c = new Criteria();
				  $c->add(FortipfinPeer::CODFIN,$codparing[$i]);
				  $reg = FortipfinPeer::doSelectOne($c);


				  if($reg)
				  {
					  $reg->setMontodis($reg->getMontodis()-$monto[$i]);
					  $reg->setMontodisaux($monto[$i]);

					  $reg->save();

				  }
				}
			$i++;
			}
			$j++;
		}

		$c = new Criteria();
		$c->add(FordisfuefinpryaccmetPeer::ACTFUE,'N');
		$c->add(FordisfuefinpryaccmetPeer::CODPRO,$forencpryaccespmet->getCodpro());
		$c->add(FordisfuefinpryaccmetPeer::CODACCESP,$forencpryaccespmet->getCodaccesp());
		$c->add(FordisfuefinpryaccmetPeer::CODMET,$forencpryaccespmet->getCodmet());
		$per = FordisfuefinpryaccmetPeer::doSelect($c);

		if ($per)
		{
			$per->setActfue('S');
			$per->save();
		}

		return -1;

	}catch (Exception $ex){
    	 return 0;
 	}

  }

  /**
   * Función para registrar los Montos de Financiamiento
   *
   * @static
   * @param $Forencpryaccespmet Object Formulacion para consultar
   * @param $grid Array de Objects Plan Operativo.
   * @return void
   */
  public static function GrabarDisFueFinPryAccMet($forencpryaccespmet,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $c = new Criteria();
      $c->add(FordisfuefinpryaccmetPeer::CODPRO,$forencpryaccespmet->getCodpro());
      $c->add(FordisfuefinpryaccmetPeer::CODACCESP,$forencpryaccespmet->getCodaccesp());
      $c->add(FordisfuefinpryaccmetPeer::CODMET,$forencpryaccespmet->getCodmet());
      $c->add(FordisfuefinpryaccmetPeer::CODPRE,$x[$j]->getCodpre());
      $reg = FordisfuefinpryaccmetPeer::doSelectOne($c);

      if ($reg)
      {
      	FordisfuefinpryaccmetPeer::doDelete($c);
      }

       $monto = split("_",$x[$j]->getGrid2_());
       $codparing = split("_",$x[$j]->getCajaoculta2());

          for($i=0;$i<count($monto)-1;$i++){
          	if ($monto[$i] != 0){
 			  $fordisfuefinpryaccmet = new Fordisfuefinpryaccmet();
			  $fordisfuefinpryaccmet->setCodpro($forencpryaccespmet->getCodpro());
			  $fordisfuefinpryaccmet->setCodmet($forencpryaccespmet->getCodmet());
			  $fordisfuefinpryaccmet->setCodaccesp($forencpryaccespmet->getCodaccesp());
			  $fordisfuefinpryaccmet->setCodpre($x[$j]->getCodpre());
			  //$fordisfuefinpryaccmet->setCodparing($x[$j]->getCodparing_());

			  $fordisfuefinpryaccmet->setCodparing($codparing[$i]);
			  $fordisfuefinpryaccmet->setMonfin($monto[$i]);
	          $fordisfuefinpryaccmet->setActfue("S");
			  $fordisfuefinpryaccmet->save();
          	}
          }

     $j++;
    }
	return -1;
  }

  /**
   * Función para registrar la Asignacion Presupestaria
   *
   * @static
   * @param $Forencpryaccespmet Object Formulacion para consultar
   * @param $grid Array de Objects Plan Operativo.
   * @return void
   */
  public static function Grabardismonper($forencpryaccespmet,$grid)
  {
	try{
	    $x=$grid[0];
	    $j=0;
	    while ($j<count($x))
	    {
	      //echo $j." ".$x[$j]->getCodpre()."<br>";
	  	    $c = new Criteria();
	      	$c->add(FordismonprepryaccmetueaPeer::CODPRO,$forencpryaccespmet->getCodpro());
	      	$c->add(FordismonprepryaccmetueaPeer::CODACCESP,$forencpryaccespmet->getCodaccesp());
	      	$c->add(FordismonprepryaccmetueaPeer::CODMET,$forencpryaccespmet->getCodmet());
	      	$c->add(FordismonprepryaccmetueaPeer::CODPRE,$x[$j]->getCodpre());
	      	$c->add(FordismonprepryaccmetueaPeer::CODPAR,$x[$j]->getCodpar());
	      	$per = FordismonprepryaccmetueaPeer::doDelete($c);

	       	  $monto_asig = split("_",$x[$j]->getGrid2_());

	          for($i=0;$i<count($monto_asig)-1;$i++){
	          	if ($monto_asig[$i] != 0){
			      $reg = new Fordismonprepryaccmetuea();
			      $reg->setCodpro($forencpryaccespmet->getCodpro());
			      $reg->setCodaccesp($forencpryaccespmet->getCodaccesp());
			      $reg->setCodmet($forencpryaccespmet->getCodmet());
			      $reg->setCodpre($x[$j]->getCodpre());
			      $reg->setCodpar($x[$j]->getCodpar());
			      $reg->setPerpre($i+1);
			      $reg->setMonper($monto_asig[$i]);

			      $reg->save();
	          	}
	          }
	     $j++;
    	}

    	return -1;

	}catch (Exception $ex){
		return 0;
	}

  }

  /**
   * Función para registrar la Formulacion
   *
   * @static
   * @param $Forencpryaccespmet Object Formulacion a guardar
   * @return void
   */
  public static function Grabar_ForEncPryAccEspMet($forencpryaccespmet,$grid)
  {
  $registro=$grid[0];
 // echo "<pre>";
  //print_r($registro[0])."  555";
 // echo "</pre>";
  //if (($registro[0]->getId()!='') or !empty($registro[0]))

	try {
	  if (!empty($registro[0]))
	   {
	    $c = new Criteria();
		$c->add(ForencpryaccespmetPeer::CODPRO,$forencpryaccespmet->getCodpro());
		$c->add(ForencpryaccespmetPeer::CODACCESP,$forencpryaccespmet->getCodaccesp());
		$c->add(ForencpryaccespmetPeer::CODMET,$forencpryaccespmet->getCodmet());
	    $per = ForencpryaccespmetPeer::doSelectOne($c);

		if ($per)
		{
		    $per->setCanmet($forencpryaccespmet->getCanmet());
		    $per->setTotpre($forencpryaccespmet->getTotpre());
		    $per->save();
		   // return -1;

	    }else   //Inclusion
	    {
	     //$forencpryaccespmet->settotpre(0);
	     $forencpryaccespmet->save();
	     //return -1;
	    }

	   }else{
	   	//No se guardo el encabezado de la Formulacion.

	  	return 302;
	  }
	return -1;

	}catch (Exception $ex){
		return 0;
	}
  }

  /**
   * Función para registrar los Detalles de Formulacion
   *
   * @static
   * @param $Fordetpryaccespmet Object Formulacion a guardar
   * @return void
   */
  public static function Grabar_ForDetPryAccEspMet($datos,$grid)
  {
    $id=$datos->getId();
    $codpro=$datos->getCodpro();
    $codaccesp=$datos->getCodaccesp();
    $codmet=$datos->getCodmet();

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
       {
	       $x[$j]->setCodpro($codpro);
	       $x[$j]->setCodaccesp($codaccesp);
	       $x[$j]->setCodmet($codmet);
	     //  $x[$j]->setCodact($codact);

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
    return -1;
  }
  ///////////////////////////////// F I N ///////////////////////////////

////
	public static function EliminarForpoa($forencpryaccespmet,$grid)
	{
		self::Actualiza_Fuentes_de_Financiamiento_Eliminacion_Formulacion($forencpryaccespmet,$grid);
		self::EliminarFormulacionPorMetas($forencpryaccespmet,$grid);
		return -1;

	}

	public static function Actualiza_Fuentes_de_Financiamiento_Eliminacion_Formulacion($forencpryaccespmet,$grid)
	{
	try {
		$sql="SELECT
			    SUM(fordisfuefinpryaccmet.MONFIN) as MONFIN,
			    fordisfuefinpryaccmet.CODPARING
			  FROM
			    fordisfuefinpryaccmet WHERE fordisfuefinpryaccmet.ACTFUE='S' AND
			    fordisfuefinpryaccmet.CODPRO = '".$forencpryaccespmet->getCodpro()."' AND
			    fordisfuefinpryaccmet.CODACCESP = '".$forencpryaccespmet->getCodaccesp()."' AND
			    fordisfuefinpryaccmet.CODMET = '".$forencpryaccespmet->getCodmet()."'
		      Group by fordisfuefinpryaccmet.CODPARING";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $i=0;
      while ($i<count($result))
      {
        $monfin = $result[$i]['monfin'];
        $codparing = $result[$i]['codparing'];

          $c = new Criteria();
          $c->add(FortipfinPeer::CODFIN,$codparing);
          $obj = FortipfinPeer::doSelectone($c);

          H::printR($obj);
          if ($obj)
           {
            $obj->setMontodis($obj->getMontodis()+$monfin);
            $obj->setMontodisaux($obj->getMontodis());
            $obj->save();
           }//if ($obj)
         $i++;
      } //while ($i<count($result))
    }//if (Herramientas::BuscarDatos($sql,&$result))

		return -1;

	}catch (Exception $ex){
		exit($ex);
		return 0;
	}
	}


	public static function EliminarFormulacionPorMetas($forencpryaccespmet,$grid)
	{
		try {
		/*
		 * $c = new Criteria();
		$c->add(FordismetperpryaccmetPeer::CODPRO, $forencpryaccespmet->getCodpro());
		$c->add(FordismetperpryaccmetPeer::CODACCESP, $forencpryaccespmet->getCodaccesp());
		$c->add(FordismetperpryaccmetPeer::CODMET, $forencpryaccespmet->getCodmet());
		$per = FordismetperpryaccmetPeer::doDelete($c);
		*/

		$c = new Criteria();
		$c->add(FordisfuefinpryaccmetPeer::CODPRO, $forencpryaccespmet->getCodpro());
		$c->add(FordisfuefinpryaccmetPeer::CODACCESP, $forencpryaccespmet->getCodaccesp());
		$c->add(FordisfuefinpryaccmetPeer::CODMET, $forencpryaccespmet->getCodmet());
		$per = FordisfuefinpryaccmetPeer::doDelete($c);

		$c = new Criteria();
		$c->add(FordismonprepryaccmetueaPeer::CODPRO, $forencpryaccespmet->getCodpro());
		$c->add(FordismonprepryaccmetueaPeer::CODACCESP, $forencpryaccespmet->getCodaccesp());
		$c->add(FordismonprepryaccmetueaPeer::CODMET, $forencpryaccespmet->getCodmet());
		$per = FordismonprepryaccmetueaPeer::doDelete($c);

		$c = new Criteria();
		$c->add(FordetpryaccespmetPeer::CODPRO, $forencpryaccespmet->getCodpro());
		$c->add(FordetpryaccespmetPeer::CODACCESP, $forencpryaccespmet->getCodaccesp());
		$c->add(FordetpryaccespmetPeer::CODMET, $forencpryaccespmet->getCodmet());
		$per = FordetpryaccespmetPeer::doDelete($c);

		$c = new Criteria();
		$c->add(ForencpryaccespmetPeer::CODPRO, $forencpryaccespmet->getCodpro());
		$c->add(ForencpryaccespmetPeer::CODACCESP, $forencpryaccespmet->getCodaccesp());
		$c->add(ForencpryaccespmetPeer::CODMET, $forencpryaccespmet->getCodmet());
		$per = ForencpryaccespmetPeer::doDelete($c);

		return -1;

		} catch (Exception $ex){
    		 return 0;
 		}
	}
///



  /**************************************************************************
**                          Formulacion de Ingresos                      **
**                                Miki                                   **
**************************************************************************/

  public static function salvarFortiting($forparing,$grid,$gridFF)
  {
      $forparing->save();
      self::grabarCantPeriodo($forparing,$grid);
      self::grabarFuenteFinanciamiento($forparing,$gridFF);
  }

  public static function grabarFuenteFinanciamiento($forparing,$grid)
  {
    $codigo=$forparing->getCodparing();
    $x=$grid[0];
    $j=0;
    while ($j<(count($x)))
    {
      $x[$j]->setCodparing($codigo);
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


  public static function grabarCantPeriodo($forparing,$grid)
  {
    $codigo=$forparing->getCodparing();
    $x=$grid[0];
    $j=0;
    while ($j<(count($x)))
    {
      $x[$j]->setCodpar($codigo);
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

  public static function eliminarFortiting($forparing)
  {
    Herramientas::EliminarRegistro('Foringdisper','CODPAR',$forparing->getCodparing());
      $forparing->delete();

  }
/**************************************************************************
**                          Formulacion de Ingresos                      **
**                                Miki                                   **
**************************************************************************/


  /**************************************************************************
  **                          Definiciones Generales                       **
  **                              Luelher                                  **
  **************************************************************************/
  public static function salvarFordefgen($fordefgen)
  {
    $leng = 0;
    $format = '';
    $partida = '';

    self::CalcularLongitudFormato($fordefgen->getDesproacc(),$fordefgen->getHasproacc(),$leng,$format);
    $fordefgen->setLonproacc($leng);
    $fordefgen->setForproacc($format);

    self::CalcularLongitudFormato($fordefgen->getDesaccesp(),$fordefgen->getHasaccesp(),$leng,$format);
    $fordefgen->setLonaccesp($leng);
    $fordefgen->setForaccesp($format);

    self::CalcularLongitudFormato($fordefgen->getDessubaccesp(),$fordefgen->getHassubaccesp(),$leng,$format);
    $fordefgen->setLonsubaccesp($leng);
    $fordefgen->setForsubaccesp($format);

    self::CalcularLongitudFormato($fordefgen->getDesuae(),$fordefgen->getHasuae(),$leng,$format);
    $fordefgen->setLonuae($leng);
    $fordefgen->setForuae($format);

    self::CalcularLongitudFormato($fordefgen->getDespar(),$fordefgen->getHaspar(),$leng,$format);
    $fordefgen->setLonpar($leng);
    $fordefgen->setForpar($format);

    $codigo=$fordefgen->getCodpariva();
	if (!empty($codigo))
	{
	    $c = new Criteria();
	    $c->add(NppartidasPeer::CODPAR,$fordefgen->getCodpariva());
	    $partida = NppartidasPeer::doSelectOne($c);

	    if(!$partida){ return 310; }
	}
	//print_r($fordefgen);
    $fordefgen->save();

    return -1;

  }

  public static function CalcularLongitudFormato($desde,$hasta,&$longitud,&$formato)
  {

    $forpre = Herramientas::ObtenerFormato('Fordefniv','forpre');

    $forpre = trim($forpre);

    $arrayforpre = split('-',$forpre);

    $result = '';

    if($desde>0){
      for($i=$desde;$i<=$hasta;$i++){
        if($i!=$desde) $result .= '-';
        $result .= $arrayforpre[$i-1];
      }
    }

    $formato = $result;
    $longitud = strlen($formato);

    return true;

  }

  /**************************************************************************
  **                      FIN Definiciones Generales                       **
  **                              Luelher                                  **
  **************************************************************************/

/********************Definicion de Estrategias*******************************/

 public static function salvarFordefsubobj($subobjetivo)
  {
    if ($subobjetivo->getId()=='')
    {
      if (self::obtenerCorrelativo2($subobjetivo,&$correl))
      {
         if ($subobjetivo->getCodsubobj()=='###')
     {
            $subobjetivo->setCodsubobj(str_pad($correl, 3, '0', STR_PAD_LEFT));
     }
    }
     $subobjetivo->save();

     self::actualizarForcorsubobj($subobjetivo,$correl);

    }
    else
    {
      $subobjetivo->save();
    }
  }

  public static function obtenerCorrelativo2($subobjetivo,&$correl)
  {
    $equ=$subobjetivo->getCodequ();
    $correl=0;

    $c = new Criteria();
    $c->add(ForcorsubobjPeer::CODEQU,$equ);
    $correla = ForcorsubobjPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCorsubobj();

      $correl= $correl + 1;
    }
    else
    {
      $correl=1;
    }
    return true;
  }

  public static function actualizarForcorsubobj($subobjetivo,$correl)
  {
    $equ=$subobjetivo->getCodequ();
    $subobj=$subobjetivo->getCodsubobj();

    $c = new Criteria();
    $c->add(ForcorsubobjPeer::CODEQU,$equ);
    $actual = ForcorsubobjPeer::doSelectOne($c);
    if ($actual)
    {
      $actual->setCorsubobj($correl);
      $actual->save();
    }
    else
    {
    $registro= new Forcorsubobj();
    $registro->setCodequ($equ);
    if (strlen($subobj)!=0)
    {
       $registro->setCorsubobj($correl);
    }
    $registro->save();
    }

  }

  public static function validarFordefsubobj($estrategias,$msj)
  {
  	  $estrategias->getCodsubobj();
      if (self::obtenerCorrelativo2($estrategias,&$correl))
      {
        if ($estrategias->getCodsubobj()=='###')
        {
         $codigo=str_pad($correl, 3, '0', STR_PAD_LEFT);
        }
      }
    $codigo="";
    $c= new Criteria();
  	$c->add(FordefsubobjPeer::CODEQU,$estrategias->getCodequ());
  	$c->add(FordefsubobjPeer::CODSUBOBJ,$codigo);
  	$resul= FordefsubobjPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $msj=301;
  	}
  	else
  	{
  		return $msj=-1;
  	}
  }
  /***************************************************************************/

/***************************Sectores**************************************/

public static function salvarFordefsec($sectores)
  {
    if ($sectores->getId()=='')
    {
      if (self::obtenerCorrelativo3($sectores,&$correl))
      {
         if ($sectores->getCodsec()=='####')
     {
            $sectores->setCodsec(str_pad($correl, 4, '0', STR_PAD_LEFT));
     }
    }
     $sectores->save();

     self::actualizarFordefegrgen($sectores,$correl);
     self::incluyeForcorsubsec($correl);

    }
    else
    {
      $sectores->save();
    }
  }

  public static function obtenerCorrelativo3($sectores,&$correl)
  {
   $correl=0;
    $c = new Criteria();
    $correla = FordefegrgenPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCorsec();

      $correl= $correl + 1;
    }
    return true;
  }

  public static function actualizarFordefegrgen($sectores,$correl)
  {
    $sector=$sectores->getCodsec();

    $c = new Criteria();
    $actual = FordefegrgenPeer::doSelectOne($c);
    if ($actual)
    {
      $actual->setCorsec($correl);
      $actual->save();
    }
    else
    {
    $registro= new Fordefegrgen();
    $registro->setCorsec($correl);
    $registro->save();
    }
  }


  public static function incluyeForcorsubsec($correl)
  {
    $sector=str_pad($correl, 4, '0', STR_PAD_LEFT);

    $registro= new Forcorsubsec();
    $registro->setCodsec($sector);
    $registro->setCorsubsec(0);
    $registro->save();
  }

/***************************************************************************/

/***************************Subsectores**************************************/

  public static function salvarFordefsubsec($subsector)
  {
    if ($subsector->getId()=='')
    {
      if (self::obtenerCorrelativo4($subsector,&$correl))
      {
         if ($subsector->getCodsubsec()=='####')
     {
            $subsector->setCodsubsec(str_pad($correl, 4, '0', STR_PAD_LEFT));
     }
    }
     $subsector->save();

     self::actualizarForcorsubsec($subsector,$correl);

    }
    else
    {
      $subsector->save();
    }
  }

  public static function obtenerCorrelativo4($subsector,&$correl)
  {
    $sector=$subsector->getCodsec();
    $correl=0;

    $c = new Criteria();
    $c->add(ForcorsubsecPeer::CODSEC,$sector);
    $correla = ForcorsubsecPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCorsubsec();

      $correl= $correl + 1;
    }
    else
    {
      $correl=1;
    }
    return true;
  }

  public static function actualizarForcorsubsec($subsector,$correl)
  {
    $sector=$subsector->getCodsec();
    $subsector=$subsector->getCodsubsec();

    $c = new Criteria();
    $c->add(ForcorsubsecPeer::CODSEC,$sector);
    $actual = ForcorsubsecPeer::doSelectOne($c);
    if ($actual)
    {
      $actual->setCorsubsec($correl);
      $actual->save();
    }
    else
    {
    $registro= new Forcorsubsec();
    $registro->setCodsec($sector);
    $registro->setCorsubsec($correl);
    $registro->save();
    }
  }
/***************************************************************************/
/***************************Estados**************************************/

public static function salvarFordefest($estado)
  {
    if ($estado->getId()=='')
    {
      if (self::obtenerCorrelativo111($estado,&$correl))
      {
         if ($estado->getCodest()=='####')
     {
            $estado->setCodest(str_pad($correl, 4, '0', STR_PAD_LEFT));
     }
    }
     $estado->save();

     self::actualizarFordefegrgen1($estado,$correl);
     self::incluyeForcormun($correl);

    }
    else
    {
      $estado->save();
    }
  }

  public static function obtenerCorrelativo111($estado,&$correl)
  {
   $correl=0;
    $c = new Criteria();
    $correla = FordefegrgenPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCorest();

      $correl= $correl + 1;
    }
    return true;
  }

 public static function actualizarFordefegrgen1($estado,$correl)
  {
    $edo=$estado->getCodest();

    $c = new Criteria();
    $actual = FordefegrgenPeer::doSelectOne($c);
    if ($actual)
    {
      $actual->setCorest($correl);
      $actual->save();
    }
    else
    {
    $registro= new Fordefegrgen();
    $registro->setCorest($correl);
    $registro->save();
    }
  }


  public static function incluyeForcormun($correl)
  {
    $edo=str_pad($correl, 4, '0', STR_PAD_LEFT);

    $registro= new Forcormun();
    $registro->setCodest($edo);
    $registro->setCormun(0);
    $registro->save();
  }

/***************************************************************************/
/***************************Municipios**************************************/

  public static function salvarFordefmun($municipio)
  {
    if ($municipio->getId()=='')
    {
      if (self::obtenerCorrelativo44($municipio,&$correl))
      {
         if ($municipio->getCodmun()=='####')
     {
            $municipio->setCodmun(str_pad($correl, 4, '0', STR_PAD_LEFT));
     }
    }
     $municipio->save();

     self::actualizarForcormun($municipio,$correl);

    }
    else
    {
      $municipio->save();
    }
  }

  public static function obtenerCorrelativo44($municipio,&$correl)
  {
    $estado=$municipio->getCodest();
    $correl=0;

    $c = new Criteria();
    $c->add(ForcormunPeer::CODEST,$estado);
    $correla = ForcormunPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCormun();

      $correl= $correl + 1;
    }
    else
    {
      $correl=1;
    }
    return true;
  }

  public static function actualizarForcormun($municipio,$correl)
  {
    $estado=$municipio->getCodest();
    $municipio=$municipio->getCodmun();

    $c = new Criteria();
    $c->add(ForcormunPeer::CODEST,$estado);
    $actual = ForcormunPeer::doSelectOne($c);
    if ($actual)
    {
      $actual->setCormun($correl);
      $actual->save();
    }
    else
    {
    $registro= new Forcormun();
    $registro->setCodest($estado);
    $registro->setCormun($correl);
    $registro->save();
    }
  }
/***************************************************************************/

//////////////////////////////////Unidad Ejecutoras////////////////////////////

  public static function salvarFordefcatpre($unidadejec,$grid)
  {
    $unidadejec->save();
    self::grabarVolumenes($unidadejec, $grid);
  }

  public static function grabarVolumenes($unidadejec,$grid)
  {
  	$codcat=$unidadejec->getCodcat();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $cantidad=Herramientas::convnume($x[$j]->getCanvoltra());
      if ($x[$j]->getCodvoltra()!="" && $x[$j]->getDesvoltra()!="" && $cantidad>0)
      {
      $x[$j]->setCodcat($codcat);
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

///////////////////////////////////////////////////////////////////////////////


/***************************Parroquias **************************************/

  public static function salvarFordefpar($parroquia)
  {
    if ($parroquia->getId()=='')
    {
      if (self::obtenerCorrelativo55($parroquia,&$correl))
      {
         if ($parroquia->getCodpar()=='####')
     {
            $parroquia->setCodpar(str_pad($correl, 4, '0', STR_PAD_LEFT));
     }
    }
     $parroquia->save();

     self::actualizarForcorpar($parroquia,$correl);

    }
    else
    {
      $parroquia->save();
    }
  }

  public static function obtenerCorrelativo55($parroquia,&$correl)
  {
    $estado=$parroquia->getCodest();
    $municipio=$parroquia->getCodmun();
    $correl=0;

    $c = new Criteria();
    $c->add(ForcorparPeer::CODEST,$estado);
    $c->add(ForcorparPeer::CODMUN,$municipio);
     $correla = ForcorparPeer::doSelectOne($c);
    if ($correla)
    {
      $correl= $correla->getCorpar();

      $correl= $correl + 1;
    }
    else
    {
      $correl=1;
    }
    return true;
  }

  public static function actualizarForcorpar($parroquia,$correl)
  {
    $estado=$parroquia->getCodest();
    $municipio=$parroquia->getCodmun();

    $c = new Criteria();
    $c->add(ForcorparPeer::CODEST,$estado);
    $c->add(ForcorparPeer::CODMUN,$municipio);
    $actual = ForcorparPeer::doSelectOne($c);
    if ($actual)
    {
      $actual->setCorpar($correl);
      $actual->save();
    }
    else
    {
    $registro= new Forcorpar();
    $registro->setCodest($estado);
    $registro->setCodmun($municipio);
    $registro->setCorpar($correl);
    $registro->save();
    }
  }
/***************************************************************************/

  public static function salvarForcargos($cargos, $ids, $grid) {
#  	H::printr($cargos);
    $cargos->save();
    $c = new Criteria();
    $c->add(NpasiconempPeer :: CODCAR, $cargos->getCodcar());
    $resul = NpasiconempPeer :: doSelect($c);
    if ($resul) {
      foreach ($resul as $datos) {
        $datos->setNomcar($cargos->getNomcar());
        $datos->save();
      }
    }

    $c = new Criteria();
    $c->add(NpasicarempPeer :: CODCAR, $cargos->getCodcar());
    $resul = NpasicarempPeer :: doSelect($c);
    if ($resul) {
      foreach ($resul as $datos) {
        $datos->setNomcar($cargos->getNomcar());
        $datos->save();
      }
    }
    self :: grabarProfesion($cargos, $ids);
    self :: grabarPerfil($cargos, $grid);
  }

    public static function grabarProfesion($cargos, $ids) {
    $c = new Criteria();
    $c->add(ForprocarPeer :: CODCAR, $cargos->getCodcar());
    ForprocarPeer :: doDelete($c);

    if (is_array($ids)) {
      foreach ($ids as $id) {
        $Forprocar = new Forprocar();
        $Forprocar->setCodcar($cargos->getCodcar());
        $c = new criteria();
        $c->add(NpprofesionPeer :: ID, $id);
        $objprofe = NpprofesionPeer :: doSelectOne($c);
        $Forprocar->setCodprofes($objprofe->getCodprofes());
        $Forprocar->save();
      }
    }
  }

  public static function grabarPerfil($cargos, $grid) {
    $cargo = $cargos->getCodcar();
    $c = $grid[0];
    $l = 0;
    while ($l < count($c)) {
      if ($c[$l]->getCodperfil() != "") {
        $c[$l]->setCodcar($cargo);
        $c[$l]->save();
      }
      $l++;
    }
    $d = $grid[1];
    $l = 0;
    if (!empty ($d[$l])) {
      while ($l < count($d)) {
        $d[$l]->delete();
        $l++;
      }
    }
  }

}
?>