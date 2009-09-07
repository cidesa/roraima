<?php
/**
 * Vacaciones: Clase estática para trabajar con las vacaciones de empleados
 *
 * @package    Roraima
 * @subpackage nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Vacaciones {



    public static function cargarArregloNpvacsalidas(&$arreglo,&$diaspend,$fechaing,$codemp)
  {

		$arreglo = array();

		$anohoy = date('Y');

		$monto = 0;

		Nomina::obtenerAno($fechaing,&$dia,&$mes,&$anoing) + 1;

            $anodesde = $anoing;
		$anohasta = $anodesde + 1;
		$anofin   = (int)$anohoy;


			$c1 = new Criteria();
			$c1->add(NpasicarempPeer::CODEMP,$codemp);
			$c1->add(NpasicarempPeer::STATUS,'V');
			$objNpasicaremp = NpasicarempPeer::doSelectOne($c1);

			if ($objNpasicaremp)
			{
			   $nomina = $objNpasicaremp->getCodnom();
			}
			else
			{
			   $c2 = new Criteria();
			   $c2->add(NphisconPeer::CODEMP,$codemp);
			   $c2->addDescendingOrderByColumn(NphisconPeer::FECNOM);
			   $objNphiscon = NphisconPeer::doSelectOne($c2);

			   if($objNphiscon)
			   	$nomina = $objNphiscon->getCodnom();
			   else
				$nomina = '';
			}

			   $sql1 = "Select A.id,
					coalesce(to_number(C.perini,'9999'),0) as Historico,
					A.*, B.Ano,
					'".(int)$anofin."'-B.Ano as Antiguedad,
					coalesce(to_number(C.perini,'9999'),('".(int)$anohasta."'-1)+('".(int)$anofin."'-B.ano)-1) as Desde,
					coalesce(to_number(C.perfin,'9999'),('".(int)$anohasta."'-1)+('".(int)$anofin."'-B.ano)) as Hasta,
					coalesce(C.diasdisfrutados,0) as Disfrutados,
					coalesce(C.diasdisfutar,A.diadis) as CORRESPONDE
					from
				      Npvacdisfrute C right join Npanos B on ((B.ano::varchar =  C.perfin) and ('".$codemp."' = C.codemp)),
					NPvacdiadis A
					Where (A.codnom='".$nomina."')
					And (B.Ano BETWEEN ('".(int)$anohasta."'-1) and '".(int)$anofin."')
					And (('".(int)$anofin."' - B.ano) BETWEEN A.rangodesde and A.rangohasta)
					order by coalesce(to_number(C.perini,'9999'),('".(int)$anohasta."'-1)+('".(int)$anofin."'-B.ano)), B.ano desc";




			    $sql1 = "SELECT
					(CASE WHEN (SUM(HIST)=0) THEN 'NO' ELSE 'SI' END) AS HIST,
					SUM(ANTIGUEDAD) AS ANTIGUEDAD,
					DESDE,
					HASTA,
					SUM(DISFRUTADOS) AS DISFRUTADOS,
					(CASE WHEN (SUM(HIST)=0) THEN SUM(CORRESPONDE) ELSE SUM(CORRESPONDEHIS) END) AS CORRESPONDE
					FROM
					(
    						Select
						0 as HIST,
						".(int)$anofin."-B.Ano as Antiguedad,
						TO_CHAR(((".(int)$anohasta."-1)+(".(int)$anofin."-B.Ano-1)),'9999') as Desde,
						TO_CHAR(((".(int)$anohasta."-1)+(".(int)$anofin."-B.Ano)),'9999') as Hasta,
						0 as Disfrutados,
						A.DIADIS as CORRESPONDE,
						0 as CORRESPONDEHIS
						from NPvacdiadis A,NPAnos B
						Where
						A.codnom='".$nomina."'
						And B.Ano Between ".(int)$anohasta." - 1 and ".(int)$anofin."
						And ".(int)$anofin."-B.ano between A.rangodesde and A.rangohasta

						UNION ALL

						Select
						1 as HIST,
						".(int)$anofin."-B.Ano as Antiguedad,
						C.PERINI as Desde,
						C.PERFIN as Hasta,
						C.DIASDISFRUTADOS as Disfrutados,
						0 as CORRESPONDE,
						C.diasdisfutar as CORRESPONDEHIS
						from
						NPvacdiadis A,NPAnos B,Npvacdisfrute C
						Where
						A.codnom='".$nomina."'
						And B.Ano Between ".(int)$anohasta." - 1 and ".(int)$anofin."
						And ".(int)$anofin."-B.ano between A.rangodesde and A.rangohasta
						And C.PERINI=B.ANO::varchar
						And C.CODEMP='".$codemp."'

					) as subconsulta

					GROUP BY DESDE,HASTA
					ORDER BY DESDE";




			Herramientas::BuscarDatos($sql1,&$arr1);
/*
			    print 'Hasta: '.$anohasta.'<br>';
                      print 'Fin '.$anofin.'<br>';
                      print 'Empleado '.$codemp.'<br>';
                      print 'Nomina '.$nomina.'<br>';
	                print '<pre>';
   		          print_r($arr1);
   			    print '</pre>';
   			    exit();

*/


			$diaing=substr($fechaing, 0, 2);
			$mesing=substr($fechaing, 3, 2);

			$hoy = date('d-m-Y');
			$diah = substr($hoy, 0, 2);
			$mesh = substr($hoy, 3, 2);
			$anoh  = substr($hoy, 6, 4);
			$fechah = mktime(0,0,0,(int)$mesh,(int)$diah,(int)$anoh);

			$i=0;
			/*
			print '<pre>';
   			print_r($arr1);
   			print '</pre>';
   			exit();
   			*/

			if($arr1)
			{
			  foreach ($arr1 as $a)
			  {
			    $ano = $a['hasta'];
			    $fecha = mktime(0,0,0,(int)$mesing,(int)$diaing,(int)$ano);

			//    if ($a['historico'] <> 0)
			//   {

				if ($fecha < $fechah )
				{
						  $arreglo[$i]["id"] = 9;
				  $arreglo[$i]["perini"]=$a['desde'];
				  $arreglo[$i]["perfin"]=$a['hasta'];


			        $sql2 = "SELECT A.ANTAPVAC FROM NPBONOCONT A, NPASIEMPCONT B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" .$codemp. "' AND TO_CHAR(" .$a['hasta']. ",'YYYY') BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";
				  Herramientas::BuscarDatos($sql2,&$arr2);

				   $antiguedadAP = '';
				   if ($arr2)
				   $antiguedadAP =  $arr2[0]["antapvac"];

				   $antiguedad = $a['antiguedad'] + 1;

				   Nomina::tiempoServicioTotal($codemp,0,0,0,&$Idia,&$Imes,&$Iano,'I');

				   $antiguedadIN = '';
				   if ($Iano > 0)
				   {
					$antiguedadIN = 'SI';
				   }
				   $antiguedad = $antiguedad + $Iano;

				   if ($antiguedadAP == 'S')
				   {
				     Nomina::tiempoServicioTotal($codemp,0,0,0,&$Idia,&$Imes,&$Iano,'F');

				     if ($a['historico'] == 0)
				     {
					 $antiguedad = $antiguedad + $Iano;

                               $sql3 = "Select diadis from NPvacdiadis where CodNom='".$nomina."' and Rangohasta >=  Trim(to_char(".$antiguedad.",'9999'))   order by rangodesde";

				       Herramientas::BuscarDatos($sql3,&$arr3);

				   	 if ($arr3)
				     	   $variable = $arr3[0]['diadis'];
				       else
				         $variable = 0;

				     }
				     else
				     $variable = $a['corresponde'];

				   }
				   else
					$variable = $a['corresponde'];

				  $diasdisfrutar = $variable;

				  $arreglo[$i]['diasdisfutar'] = $variable;
				  $variable = $a['disfrutados'];
				  $arreglo[$i]['diasdisfrutados'] = $variable;
				  $arreglo[$i]['diasvac'] = 0;
				  $variable = $diasdisfrutar - $variable;
				  $arreglo[$i]['diaspdisfrutar'] = $variable;

				  $monto = $monto + $variable;
                          $i = $i + 1;
				  $diaspend = $monto;


				}
		//	    }
			  }


			}
                /*if (!$diaspend)
                    $diaspend = 0;*/
            /*
		print '<pre>';
   		print_r($arreglo);
   		print '</pre>';
   		exit();
            */


  }





  // Guarda registros del grid en vacsalidas
  public static function salvarNphistorico_det($npvacsalidas,$grid_detalle)
  {

   	$grid=$grid_detalle[0];


	    $c2= new Criteria();
	    $c2->add(NpvacsalidasDetPeer::CODEMP,$npvacsalidas->getCodemp());
	    $c2->add(NpvacsalidasDetPeer::FECVAC,$npvacsalidas->getFecvac());
	    NpvacsalidasDetPeer::doDelete($c2);


          $i=0;
	    if ((count($grid)>0))
	    {



		   while ( ($i<count($grid)) and (!(is_null($grid[$i]['perini'] ) ) ) )
		    {
		    $c4= new Criteria();
		    $c4->add(NpvacdisfrutePeer::CODEMP,$npvacsalidas->getCodemp());
	    	    $c4->add(NpvacdisfrutePeer::PERINI,$grid[$i]['perini']);
	    	    $c4->add(NpvacdisfrutePeer::PERFIN,$grid[$i]['perfin']);
	    	    $objNpvacdisfrute = NpvacdisfrutePeer::doSelectOne($c4);

		    if (!$objNpvacdisfrute)
		    {
			$objNpvacdisfrute = new Npvacdisfrute();

		    	$objNpvacdisfrute->setCodemp($npvacsalidas->getCodemp());
			$objNpvacdisfrute->setPerini($grid[$i]['perini']);
			$objNpvacdisfrute->setPerfin($grid[$i]['perfin']);

		    }

			$objNpvacdisfrute->setDiasdisfutar($grid[$i]['diasdisfutar']);
			$objNpvacdisfrute->setDiasdisfrutados(($grid[$i]['diasdisfrutados']) + ($grid[$i]['diasvac']));
			$objNpvacdisfrute->save();



			if ($grid[$i]['diasvac'] > 0)
			{
			  $objNpvacsalidasDet = new NpvacsalidasDet();

			  $objNpvacsalidasDet->setCodemp($npvacsalidas->getCodemp());
			  $objNpvacsalidasDet->setPerini($grid[$i]['perini']);
			  $objNpvacsalidasDet->setPerfin($grid[$i]['perfin']);
			  $objNpvacsalidasDet->setDiasdisfutar($grid[$i]['diasdisfutar']);
			  $objNpvacsalidasDet->setDiasdisfrutados($grid[$i]['diasdisfrutados']);
			  $objNpvacsalidasDet->setDiasvac($grid[$i]['diasvac']);
			  $objNpvacsalidasDet->setFecvac($npvacsalidas->getFecvac());

			  $objNpvacsalidasDet->save();
			}

			$i++;
		    }
	     }




  }

  public static function verificarRangoFechas($npvacsalidas,$grid_detalle)
  {
  }

  public static function salvarnpvacliquidacion($nphojint,$grid_detalle,$ultsue,$suenor)
  {

     $c = new Criteria();
	 $c->add(NpvacliquidacionPeer::CODEMP,$nphojint->getCodemp());
	 NpvacliquidacionPeer::doDelete($c);

	 $grid=$grid_detalle[0];
	 foreach($grid  as $reg)
	 {
	 	  $objNpvacliquidacion = new Npvacliquidacion();
		  $objNpvacliquidacion->setCodemp($nphojint->getCodemp());
		  $objNpvacliquidacion->setPerini($reg['perini']);
		  $objNpvacliquidacion->setPerfin($reg['perfin']);
		  $objNpvacliquidacion->setDiadis($reg['diadis']);
		  $objNpvacliquidacion->setDiasbono($reg['diasbono']);
		  $objNpvacliquidacion->setMonto($reg['monto']);
		  $objNpvacliquidacion->setUltsue($suenor);
		  $objNpvacliquidacion->setMontoinci($ultsue);
		  $objNpvacliquidacion->save();
	 }


  }
  
    public static function cargarDatosNpvacsalidas($nomina, & $diaslaborales) {
	 
	  $diaslaborables = array ();

      $sql2 = "Select " .
      "(CASE a.lunes WHEN 'S' THEN '2' ELSE a.lunes END) as LUNES, " .
      "(CASE a.martes WHEN 'S' THEN '3' ELSE a.martes END) as MARTES, " .
      "(CASE a.miercoles WHEN 'S' THEN '4' ELSE a.miercoles END) as MIERCOLES, " .
      "(CASE a.jueves WHEN 'S' THEN '5' ELSE a.jueves END) as JUEVES, " .
      "(CASE a.viernes WHEN 'S' THEN '6' ELSE a.viernes END) as VIERNES, " .
      "(CASE a.sabado WHEN 'S' THEN '7' ELSE a.sabado END) as SABADO, " .
      "(CASE a.domingo WHEN 'S' THEN '1' ELSE a.domingo END) as DOMINGO " .
      "From NPVACJORLAB A " .
      "Where A.CODNOM='$nomina'";

      Herramientas :: BuscarDatos($sql2, & $arr2);

      if ($arr2) {

        if ($arr2[0]['lunes'] == "2")
          $diaslaborales[0] = "S";
        else
          $diaslaborales[0] = "N";

        if ($arr2[0]['martes'] == "3")
          $diaslaborales[1] = "S";
        else
          $diaslaborales[1] = "N";

        if ($arr2[0]['miercoles'] == "4")
          $diaslaborales[2] = "S";
        else
          $diaslaborales[2] = "N";

        if ($arr2[0]['jueves'] == "5")
          $diaslaborales[3] = "S";
        else
          $diaslaborales[3] = "N";

        if ($arr2[0]['viernes'] == "6")
          $diaslaborales[4] = "S";
        else
          $diaslaborales[4] = "N";

        if ($arr2[0]['sabado'] == "7")
          $diaslaborales[5] = "S";
        else
          $diaslaborales[5] = "N";

        if ($arr2[0]['domingo'] == "1")
          $diaslaborales[6] = "S";
        else
          $diaslaborales[6] = "N";

      }     
	}
  
    public static function calcularFecharegreso($diasvac, $fechadesde, $nomina) {
    $diad = substr($fechadesde, 0, 2);
    $mesd = substr($fechadesde, 3, 2);
    $anod = substr($fechadesde, 6, 8);

    $fechad = $anod . '-' . $mesd . '-' . $diad;

    $valor = Herramientas :: dateAdd('d', 1, $fechad, '-');

    if ($diasvac <> 0) {
      $i = 0;
      $jornada = false;
      V :: cargarDatosNpvacsalidas($nomina,& $diaslaborales);
      while ($i <= $diasvac) {
        $valor = Herramientas :: dateAdd('d', 1, $valor, '+');

        if (Nomina :: diaLaboral($valor, $jornada, $diaslaborales)) {
          $anoing = substr($valor, 0, 4);
          $mes = substr($valor, 5, 2);
          $dia = substr($valor, 8, 2);

          $sql = "Select  * FROM  NPVACDIAFER WHERE DIA='" . (int) $dia . "' AND MES='" . (int) $mes . "'";
          Herramientas :: BuscarDatos($sql, & $arr);

          if (!$arr) {
            $i++;
            if ($i >= ($diasvac -2))
              $jornada = true;

          }
        }
      }

     // $valor = Herramientas :: dateAdd('d', 1, $valor, '+');
    /*  if (!self :: diaLaboral($valor, $jornada, $diaslaborales))
        $valor = Herramientas :: dateAdd('d', 1, $valor, '+');*/

      #while (!Nomina :: diaLaboral($valor, $jornada, $diaslaborales))
      #{
        #$valor = Herramientas :: dateAdd('d', 1, $valor, '+');
      #}// end while

      $fechahasta = $valor;
    } else {
      $fechahasta = $fechad;
      $fechahasta = Herramientas :: dateAdd('d', 1, $fechahasta, '+');
    }

    $anoh = substr($fechahasta, 0, 4);
    $mesh = substr($fechahasta, 5, 2);
    $diah = substr($fechahasta, 8, 2);

    $fechahas = $diah . '/' . $mesh . '/' . $anoh;

    return $fechahas;

  }
  
  public static function cargar_vac_periodo_colectiva($perini, $nomina,$numdia) {
  	
    if (empty($perini))
      $perini = (intval(date('Y')) - 1);
	$perfin = $perini + 1;  

    if ($nomina == '')
      $sqlnom = "";
    else
      $sqlnom = "and a.codnom='$nomina'";
    //and TO_NUMBER(TO_CHAR(b.fecing,'YYYY'),'9999') >= ".$perini."'

	if($perini == (intval(date('Y')) - 1))
	{
		$sql = "Select  distinct '1' as check,a.codnom, a.codemp, b.nomemp, a.id, TO_CHAR(b.fecing,'YYYY')
          from Npasicaremp a,Nphojint b, npasiempcont c
          where  TO_NUMBER(TO_CHAR(b.fecing,'YYYY'),'9999')<='$perfin' and
		  /*(case when (to_char(date(now()),'mm')>to_char(fecing,'mm')) then 'SI'
			when (to_char(date(now()),'mm')=to_char(fecing,'mm')) then (case when (to_char(date(now()),'dd')>=to_char(fecing,'mm')) then 'SI' else 'NO' end)
			else 'NO' end )='SI' and*/
		  a.codemp=c.codemp and a.codnom=c.codnom and a.codemp=b.codemp and a.status='V' $sqlnom order by a.codemp";
	}
	else{
		$sql = "Select  distinct '1' as check,a.codnom, a.codemp, b.nomemp, a.id, TO_CHAR(b.fecing,'YYYY')
          from Npasicaremp a,Nphojint b, npasiempcont c
          where  TO_NUMBER(TO_CHAR(b.fecing,'YYYY'),'9999')<='$perfin' and  
		  a.codemp=c.codemp and a.codnom=c.codnom and a.codemp=b.codemp and a.status='V' $sqlnom order by a.codemp";
	}


    $arremp = array ();
    Herramientas :: BuscarDatos($sql, & $arremp1);

    $perfin = $perini +1;
	if($arremp1){
		$i = 0;
	    foreach ($arremp1 as $a) {
	
	      $arremp[$i]['id'] = 9;
	      $arremp[$i]['codemp'] = $a['codemp'];
	      $arremp[$i]['nomemp'] = $a['nomemp'];
	
	      if ($a['codnom'])
	        $nomina = $a['codnom'];
	      else {
	        $c2 = new Criteria();
	        $c2->add(NphisconPeer :: CODEMP, $a['codemp']);
	        $c2->addDescendingOrderByColumn(NphisconPeer :: FECNOM);
	        $objNphiscon = NphisconPeer :: doSelectOne($c2);
	
	        if ($objNphiscon)
	          $nomina = $objNphiscon->getCodnom();
	      }
	
	      $sql2 = "select * from  NPVacDisfrute where CodEmp='" . $a['codemp'] .
	      "' and PerIni='" . $perini .
	      "' and PerFin='" . $perfin . "'";
	
	      Herramientas :: BuscarDatos($sql2, & $arremp2);
	
	      if ($arremp2) {
	        $arremp[$i]["diasdisfutar"] = $arremp2[0]['diasdisfutar'];
	        $arremp[$i]["diasdisfrutados"] = $arremp2[0]['diasdisfrutados'];
	      } else {
	        $sql3 = "select FecIng from  nphojint where CodEmp='" . $a['codemp'] . "'";
	        Herramientas :: BuscarDatos($sql3, & $arremp3);
	
	        if ($arremp3) {
	          $fechaingr = $arremp3[0]['fecing'];
	          $anodesde = Herramientas :: obtenerDiaMesOAno($fechaingr, 'Y-m-d', 'Y');
	          //self::obtenerAno($fechaingr,&$dia,&$mes,&$anodesde);
	
	          $antiguedad = $perini - $anodesde;
	
	        } else {
	          $antiguedad = 0;
	        }    
			
			if($antiguedad<=0)
			{
				$arremp[$i]["diasdisfutar"] = 0;
		        $arremp[$i]["diasdisfrutados"] = 0;				
			}else
			{
				$sql4 = "Select diadis from NPvacdiadis where Rangohasta>= " . $antiguedad .
		        " and codnom = '" . $nomina . "'  order by rangodesde";
		
		        Herramientas :: BuscarDatos($sql4, & $arremp4);
				if ($arremp4) {
		          $arremp[$i]["diasdisfutar"] = $arremp4[0]['diadis'];
		          $arremp[$i]["diasdisfrutados"] = 0;
		        } else {
		          $arremp[$i]["diasdisfutar"] = 0;
		          $arremp[$i]["diasdisfrutados"] = 0;
		        }	
			}
	
	        
	
	      }
		  if($numdia=='' || $numdia=='0')
	      	$arremp[$i]["diaspdisfrutar"] = $arremp[$i]["diasdisfutar"] - $arremp[$i]["diasdisfrutados"];
		  else	
		    $arremp[$i]["diaspdisfrutar"] = $numdia;
	      $arremp[$i]["diasdisfutar"] = Herramientas :: ToFloat($arremp[$i]["diasdisfutar"]);
	      $arremp[$i]["diasdisfrutados"] = Herramientas :: ToFloat($arremp[$i]["diasdisfrutados"]);
	      $arremp[$i]["diaspdisfrutar"] = Herramientas :: ToFloat($arremp[$i]["diaspdisfrutar"]);
	      $i++;
	
	    }
		
	}
    
    return $arremp;

  }
  
  public static function salvar_vaccolecti($grid,$clase)
  {
	 $grid0=$grid[0];
	 foreach($grid0  as $reg)
	 {
	 	  if($reg['check']=='1')
		  {
		  	  $objNpvacsalidas = new Npvacsalidas();		  
			  $objNpvacsalidas->setFecvac($clase->getFecvac());		  
			  $objNpvacsalidas->setObserva($clase->getObserva());
			  $objNpvacsalidas->setFecdes($clase->getFecdes());
			  $objNpvacsalidas->setFechas($clase->getFechas());
			  $objNpvacsalidas->setCodemp($reg['codemp']);
			  $objNpvacsalidas->setDiasdisfrutar($reg['diaspdisfrutar']);		  
			  $objNpvacsalidas->save();
		  }
		 	  
	 }


  }
  
  public static function salvar_vacsalidas($npvacsalidas,$gridd)
  {
  	#Eliminamos los registros para este empleado, fecha de solicitud
  	$grid=$gridd[0];
  	$c2= new Criteria();
    $c2->add(NpvacsalidasDetPeer::CODEMP,$npvacsalidas->getCodemp());
    $c2->add(NpvacsalidasDetPeer::FECVAC,$npvacsalidas->getFecvac());
    NpvacsalidasDetPeer::doDelete($c2);
	
	foreach($grid as $r)
	{
		if($r['diasvac']>0)
		{
			#Actualizamos npvacdsifrute
			$c4= new Criteria();
		    $c4->add(NpvacdisfrutePeer::CODEMP,$npvacsalidas->getCodemp());
		    $c4->add(NpvacdisfrutePeer::PERINI,$r['perini']);
		    $c4->add(NpvacdisfrutePeer::PERFIN,$r['perfin']);
		    $objNpvacdisfrute = NpvacdisfrutePeer::doSelectOne($c4);
	
		    if (!$objNpvacdisfrute)
		    {
				$objNpvacdisfrute = new Npvacdisfrute();	
		    	$objNpvacdisfrute->setCodemp($npvacsalidas->getCodemp());
				$objNpvacdisfrute->setPerini($r['perini']);
				$objNpvacdisfrute->setPerfin($r['perfin']);	
		    }
			$objNpvacdisfrute->setDiasdisfutar($r['diasdisfutar']);
			$objNpvacdisfrute->setDiasdisfrutados(($r['diasdisfrutados']) + ($r['diasvac']));
			$objNpvacdisfrute->save();
			
			#Guardamos en npvacsalidas_Det
			$objNpvacsalidasDet = new NpvacsalidasDet();
            $objNpvacsalidasDet->setCodemp($npvacsalidas->getCodemp());
			$objNpvacsalidasDet->setPerini($r['perini']);
			$objNpvacsalidasDet->setPerfin($r['perfin']);
			$objNpvacsalidasDet->setDiasdisfutar($r['diasdisfutar']);
			$objNpvacsalidasDet->setDiasdisfrutados($r['diasdisfrutados']);
			$objNpvacsalidasDet->setDiasvac($r['diasvac']);
			$objNpvacsalidasDet->setFecvac($npvacsalidas->getFecvac());	
			$objNpvacsalidasDet->save();
			
		}			
	}
  	
  }
  
  public static function eliminar_vacsalidas($npvacsalidas)
  {  	
  	$c= new Criteria();
    $c->add(NpvacsalidasDetPeer::CODEMP,$npvacsalidas->getCodemp());
    $c->add(NpvacsalidasDetPeer::FECVAC,$npvacsalidas->getFecvac());
    $per = NpvacsalidasDetPeer::doSelect($c);
    if($per)
	{
		foreach($per as $r)
		{
			$c2= new Criteria();
		    $c2->add(NpvacdisfrutePeer::CODEMP,$npvacsalidas->getCodemp());
			$c2->add(NpvacdisfrutePeer::PERINI,$r->getPerini());
			$c2->add(NpvacdisfrutePeer::PERFIN,$r->getPerfin());
		    $per2 = NpvacdisfrutePeer::doSelectOne($c2);			
			if($per2)
			{
				$dianew = abs($per2->getDiasdisfrutados()-$r->getDiasvac());
				$per2->setDiasdisfrutados($dianew);
				$per2->save();
			}
			$r->delete();
		}	
	}	
  }


}
class V extends Vacaciones
{}
