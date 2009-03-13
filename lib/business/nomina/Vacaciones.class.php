<?php

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
				      Npvacdisfrute C right join Npanos B on ((B.ano =  C.perfin) and ('".$codemp."' = C.codemp)),
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
						And C.PERINI=B.ANO
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


}
class V extends Vacaciones
{}
