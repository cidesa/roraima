<?php

/**
 * vacsalidas actions.
 *
 * @package    siga
 * @subpackage vacsalidas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 33317 2009-09-23 14:55:17Z cramirez $
 */
class vacsalidasActions extends autovacsalidasActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->npvacsalidas = $this->getNpvacsalidasOrCreate();
	if($this->npvacsalidas->getId()!='')
	{
		$this->configGrid($this->npvacsalidas->getCodemp(),'',$this->npvacsalidas->getFecvac(),0,'N');	
	}else
		$this->configGrid();	
  }

  public function configGrid($codemp='',$nomina='',$fecing='',$diavac=0,$nuevo='',$fecdesde='')
  {
  	if ($fecdesde=='')
	   $fecdesde=date('Y-m-d');
  	if($nuevo=='')
	{
		$auxfecing = split("/",$fecing);	
		$fecing=='' ? $fecing=date('Y-m-d') : $fecing=date('Y-m-d',mktime(0,0,0,$auxfecing[1],$auxfecing[0],$auxfecing[2])); 	
		$arr=array();
		$per=array();
		$this->totdia=0;
		$anofin=date('Y');
		$anodesde = date('Y',strtotime($fecing));
		$anohasta = $anodesde + 1;					
		$sql="SELECT
					'0' as id,
					(CASE WHEN (SUM(HIST)=0) THEN 'NO' ELSE 'SI' END) AS HIST,
					ANTIGUEDAD,
					DESDE as perini,
					HASTA as perfin,
					SUM(DISFRUTADOS) AS diasdisfrutados,
					(CASE WHEN (SUM(HIST)=0) THEN SUM(CORRESPONDE) ELSE SUM(CORRESPONDEHIS) END) AS diasdisfutar,
					jornada
					FROM
					(
					Select
					0 as HIST,
					$anofin-B.Ano as Antiguedad,
					((" . ($anohasta -1) . ")+($anofin-B.Ano-1)) as Desde,
					((" . ($anohasta -1) . ")+($anofin-B.Ano)) as Hasta,
					0 as Disfrutados,
					A.DIADIS as CORRESPONDE,
					0 as CORRESPONDEHIS
					from NPvacdiadis A,NPAnos B
					Where
					A.codnom='$nomina'
					And B.Ano Between " . ($anohasta -1) . " and $anofin
					And $anofin-B.ano between A.rangodesde and A.rangohasta
					
					UNION ALL
					
					Select
					1 as HIST,
					to_number(C.PERFIN,'9999') -" . ($anohasta -1) . " AS Antiguedad,
					
					to_number(C.PERINI,'9999') as Desde,
					to_number(C.PERFIN,'9999') as Hasta,
					C.DIASDISFRUTADOS as Disfrutados,
					0 as CORRESPONDE,
					C.diasdisfutar as CORRESPONDEHIS
					from
					NPvacdiadis A,NPAnos B,Npvacdisfrute C
					Where
					A.codnom='$nomina'
					And B.Ano Between " . ($anohasta -1) . " and $anofin
					And $anofin-B.ano between A.rangodesde and A.rangohasta
					And C.PERINI=B.ANO::varchar
					And C.CODEMP='$codemp'
					
					) as subconsulta
					, npvacdiadis b
					where b.codnom='$nomina' AND Antiguedad>=rangodesde and Antiguedad<=rangohasta
					GROUP BY DESDE,HASTA,ANTIGUEDAD,JORNADA,rangodesde,rangohasta
					ORDER BY DESDE";

		/*$sql="SELECT
		          '0' as id,
	              (CASE WHEN (SUM(HIST)=0) THEN 'NO' ELSE 'SI' END) AS HIST,
	              SUM(ANTIGUEDAD) AS ANTIGUEDAD,
	              DESDE as perini,
	              HASTA as perfin,
	              SUM(DISFRUTADOS) AS diasdisfrutados,
	              (CASE WHEN (SUM(HIST)=0) THEN SUM(CORRESPONDE) ELSE SUM(CORRESPONDEHIS) END) AS diasdisfutar,
				  jornada
	              FROM
	              (
	                    Select
	                0 as HIST,
	                " . $anofin . "-B.Ano as Antiguedad,
	                ((" . ($anohasta -1) . ")+(" . $anofin . "-B.Ano-1)) as Desde,
	                ((" . ($anohasta -1) . ")+(" . $anofin . "-B.Ano)) as Hasta,
	                0 as Disfrutados,
	                A.DIADIS as CORRESPONDE,
	                0 as CORRESPONDEHIS
	                from NPvacdiadis A,NPAnos B
	                Where
	                A.codnom='" . $nomina . "'
	                And B.Ano Between " . ($anohasta -1) . " and " . $anofin . "
	                And " . $anofin . "-B.ano between A.rangodesde and A.rangohasta
	
	                UNION ALL
	
	                Select
	                1 as HIST,
	                " . $anofin . "-B.Ano as Antiguedad,
	                to_number(C.PERINI,'9999') as Desde,
	                to_number(C.PERFIN,'9999') as Hasta,
	                C.DIASDISFRUTADOS as Disfrutados,
	                0 as CORRESPONDE,
	                C.diasdisfutar as CORRESPONDEHIS
	                from
	                NPvacdiadis A,NPAnos B,Npvacdisfrute C
	                Where
	                A.codnom='" . $nomina . "'
	                And B.Ano Between " . ($anohasta -1) . " and " . $anofin . "
	                And " . $anofin . "-B.ano between A.rangodesde and A.rangohasta
	                And C.PERINI=B.ANO::varchar
	                And C.CODEMP='" . $codemp . "'
	
	              ) as subconsulta
				  , npvacdiadis b
				  where b.codnom='$nomina'
	              GROUP BY DESDE,HASTA,JORNADA,rangodesde,rangohasta
				  HAVING sum(antiguedad)>=rangodesde and sum(antiguedad)<=rangohasta
	              ORDER BY DESDE";*/

		if (H::BuscarDatos($sql,$arr))
		{			    
			#VERIFICAMOS SI DEBE MOSTRAR EL PERIODO NO VENCIDO			
		    $diah = date('d',strtotime($fecdesde));
		    $mesh = date('m',strtotime($fecdesde));
		    $anoh = date('Y',strtotime($fecdesde));
		    $fechah = mktime(0, 0, 0, (int) $mesh, (int) $diah, (int) $anoh);
			$diaing = date('d',strtotime($fecing));
		    $mesing = date('m',strtotime($fecing));
		    $i=0;
			$fec='';
			$sqldef = "select * from npvacdefgen where codnomvac='$nomina'";
			if (H::BuscarDatos($sqldef,$arrdef))
				$fec=$arrdef[0]['pagoad'];							
			
			foreach($arr as $r)
			{
				$ano = $r['perfin'];
       			$fecha = mktime(0, 0, 0, (int) $mesing, (int) $diaing, (int) $ano);
				if($fec=='S')
					$fechah=$fecha;

				if ($fecha <= $fechah) {				

					$per[$i]['id']=$r['id'];
					$per[$i]['perini']=$r['perini'];
					$per[$i]['perfin']=$r['perfin'];
					
					
					$sql2 = "SELECT A.ANTAPVAC FROM NPBONOCONT A, NPASIEMPCONT B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" . $codemp . "' AND '" . $r['perfin'] . "' BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";
          			Herramientas :: BuscarDatos($sql2, & $arr2);

					$antiguedadAP = '';
		            if ($arr2)
		              $antiguedadAP = $arr2[0]["antapvac"];
					  
					$antiguedad = $r['antiguedad']; //+ 1;

			        Nomina :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'I');
					
					$antiguedadIN = '';
			        if ($Iano > 0) {
			          $antiguedadIN = 'SI';
			        }
					
					$antiguedad = $antiguedad + $Iano;
					
					if ($antiguedadAP == 'S') {
		            Nomina :: tiempoServicioTotal($codemp, 0, 0, 0, & $Idia, & $Imes, & $Iano, 'F');
		
		            if ($r['hist'] == 'NO') {
		              $antiguedad = $antiguedad + $Iano;
		
		              $sql3 = "Select diadis,jornada from NPvacdiadis where CodNom='" . $nomina . "' and Rangohasta >=  '" . $antiguedad . "'   order by rangodesde";

		              Herramientas :: BuscarDatos($sql3, & $arr3);
		
		              if ($arr3)
					   	$variable = $arr3[0]['diadis'];
					  else
					  	$variable = 0;
						
		            } else
					{
						$variable = $r['diasdisfutar'];						
					}		
		          }else
				  {
				  	$variable = $r['diasdisfutar'];
				  }	
		          $diasdisfrutar = $variable;
					
								
					$diadis=$variable-$r['diasdisfrutados'];
					if($diavac==0)
				  		$diasvacaciones=0;
					else
					{
					  if(($diadis-$diavac)<=0){
					  	$diasvacaciones=$diadis;	
						$diavac=abs($diadis-$diavac);
					  }			  	
					  else{
					  	$diasvacaciones=$diavac;
						$diavac-=$diavac;
					  }
					    
					}						  
					$per[$i]['diasdisfutar']=$variable;
					$variable = $r['diasdisfrutados'];
					$per[$i]['diasdisfrutados']=$variable;
					$per[$i]['diasvac']=$diasvacaciones;
					$per[$i]['diaspdisfrutar']=$diasdisfrutar-$variable-$diasvacaciones;
					$per[$i]['jornada']=$r['jornada'];					
					$c = new Criteria();
					$c->add(NpvacdisfrutePeer::CODEMP,$codemp);
					$c->add(NpvacdisfrutePeer::PERINI,$r['perini']);
					$c->add(NpvacdisfrutePeer::PERFIN,$r['perfin']);
					$per0 = NpvacdisfrutePeer::doSelectOne($c);
					if($per0)
					{
						if($per0->getDiasbonovac())
						{
							$per[$i]['diasbonovac']=$per0->getDiasbonovac();
							$per[$i]['diasbonovacpag']=$per0->getDiasbonovacpag();		
						}else
						{
							$sqldef = "SELECT A.ANTAPVAC,A.DIAVAC FROM NPBONOCONT A, NPASIEMPCONT B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" . $codemp . "' AND '" . $anohasta . "' BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";
							if(Herramientas :: BuscarDatos($sqldef, & $perdef))
								$per[$i]['diasbonovac']=$perdef[0]['diavac'];
							else
								$per[$i]['diasbonovac']='0';						
							$per[$i]['diasbonovacpag']='0';
						}						
					}else
					{
						$sqldef = "SELECT A.ANTAPVAC,A.DIAVAC FROM NPBONOCONT A, NPASIEMPCONT B WHERE A.CODTIPCON=B.CODTIPCON AND B.CODEMP='" . $codemp . "' AND '" . $anohasta . "' BETWEEN TO_CHAR(ANOVIG,'YYYY') AND TO_CHAR(ANOVIGHAS,'YYYY')";
						if(Herramientas :: BuscarDatos($sqldef, & $perdef))
							$per[$i]['diasbonovac']=$perdef[0]['diavac'];
						else
							$per[$i]['diasbonovac']='0';						
						$per[$i]['diasbonovacpag']='0';
					}
					if($per[$i]['diasbonovac']==$per[$i]['diasbonovacpag'])
					{
						$per[$i]['pagadas']=1;
					}else
					{
						$per[$i]['pagadas']=0;
					}
					$this->totdia+=$per[$i]['diaspdisfrutar'];
					$this->totpen+=($r['diasdisfutar']-$r['diasdisfrutados']);
					$i++;
				}
			}			
		}	
	}else
	{
		$c = new Criteria();
		$c->add(NpvacsalidasDetPeer::CODEMP,$codemp);
		$c->add(NpvacsalidasDetPeer::FECVAC,$fecing);
		$per = NpvacsalidasDetPeer::doSelect($c);
	}
  	

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacsalidas_det');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(600);
    $opciones->setName('a');
    $opciones->setFilas(0);
    $opciones->setTitulo('');

    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Periodo Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perini');
    $col1->setHTML('type="text" size="4" readonly= true');

    $col2 = new Columna('Periodo Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('perfin');
    $col2->setHTML('type="text" size="4"  readonly= true');

    $col3 = new Columna('Dias a disfrutar');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('diasdisfutar');
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setHTML('type="monto" size="8" readonly= true');

    $col4 = new Columna('Dias disfrutados');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('diasdisfrutados');
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setHTML('type="monto" size="8" readonly= true');

    $col5 = new Columna('Dias de Vacaciones');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('diasvac');
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setHTML('type="text" size="8" readonly= true');

    $col6 = new Columna('Dias por disfrutar');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('diaspdisfrutar');
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setHTML('type="text" size="8" readonly= true');
	
	$col7 = new Columna(' ');
    $col7->setTipo(Columna::TEXTO);
    $col7->setOculta(true);
    $col7->setNombreCampo('jornada');
	
	$col8 = new Columna('Dias de Bono Vacacional');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('diasbonovac');
    $col8->setAlineacionObjeto(Columna::DERECHA);
    $col8->setAlineacionContenido(Columna::DERECHA);
    $col8->setHTML('type="text" size="8" readonly= true');
	
	$col9 = new Columna(' ');
    $col9->setTipo(Columna::TEXTO);
    $col9->setEsGrabable(true);
	$col9->setOculta(true);
    $col9->setNombreCampo('diasbonovacpag');
    $col9->setAlineacionObjeto(Columna::DERECHA);
    $col9->setAlineacionContenido(Columna::DERECHA);
    $col9->setHTML('type="text" size="8" readonly= true');
	
	$col10 = new Columna('Pagadas');
    $col10->setTipo(Columna::CHECK);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('pagadas');
    $col10->setAlineacionObjeto(Columna::DERECHA);
    $col10->setAlineacionContenido(Columna::DERECHA);
    $col10->setHTML(' ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
	$opciones->addColumna($col7);
	$opciones->addColumna($col8);
	$opciones->addColumna($col9);
	$opciones->addColumna($col10);
	
	$this->obj = $opciones->getConfig($per);
    $this->npvacsalidas->setObjvac($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
		$this->npvacsalidas = $this->getNpvacsalidasOrCreate();
        if($codigo)
		{
		  $nomemp = NphojintPeer::getNomemp($codigo);	
		  $fecing = NphojintPeer::getFecing($codigo);
		  $codnom = NphojintPeer::getCodnom($codigo);
		  $this->configGrid($codigo,$codnom,$fecing);
		}else
		{
		  $this->configGrid();
		  $nomemp='';
		  $fecing='';
		}
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["npvacsalidas_fecing","'.$fecing.'",""],["npvacsalidas_nomemp","'.$nomemp.'",""],
					["npvacsalidas_fecvac","'.date('d/m/Y').'",""],["npvacsalidas_fecdes","'.date('d/m/Y').'",""],
					["npvacsalidas_fechas","'.date('d/m/Y',mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))).'",""],
					["npvacsalidas_diaspend","'.$this->totdia.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');			
        break;
	  case '2':
		$this->npvacsalidas = $this->getNpvacsalidasOrCreate();
		$fecdes = $this->getRequestParameter('fecdes','');
		$diavac = $this->getRequestParameter('diavac','');		
		$fecing = NphojintPeer::getFecing($codigo);
        $codnom = NphojintPeer::getCodnom($codigo);
		$auxfec = split('/',$fecdes);	
		$fecdesgrid = $auxfec[2].'/'.$auxfec[1].'/'.$auxfec[0];
		$this->configGrid($codigo,$codnom,$fecing,$diavac,'',$fecdesgrid);
		$arrgrid = $this->npvacsalidas->getObjvac();
		if($diavac>$this->totpen)
		   $diavac=$this->totpen;
        #RECORRER EL GRID PARA CALCULAR DI LOS DIAS SON CONTINUOS O HABILES
        /*$fecret=$fecdes;
        foreach($arrgrid['datos'] as $reg)
		{
			$dia = $reg['diasvac'];
			$jor = $reg['jornada'];
			if($dia>0)
			{
				$sqlfecretorno = "select to_char(fecharetorno(to_date('$fecret','dd/mm/yyyy'),'$codnom',$dia,'$jor'),'dd/mm/yyyy') as fecharetorno;";
				if (H::BuscarDatos($sqlfecretorno,$arrret))
					$fecret=$arrret[0]['fecharetorno'];					
			}						
		}
		$output = '[["npvacsalidas_diaspend","'.$this->totdia.'",""],["npvacsalidas_fechas","'.$fecret.'",""],["npvacsalidas_diasdisfrutar","'.$diavac.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');*/
		$fecret=$fecdes;
		$dia_c=0;
		$dia_h=0;
        foreach($arrgrid['datos'] as $reg)
		{
			$jor = $reg['jornada'];			
			if ($jor=='C')#asumiendo que se grabe H no se que posible valores trae
			{  
			   $dia_c = $dia_c+$reg['diasvac'];
			}else
			{
			   $dia_h = $dia_h+$reg['diasvac'];
			}					
		}		
		#pregunto primero por continuos porq asi es en chacao, esto nos pudiese traer probelmas en otro cliente donde primero sean habiles y despues continuos
		#despues hay que buscar la manera de determinar que condicion evaluar primero
		if($dia_c>0)
		{
		    $jor='C';#inicializo para que evalue continuo asumiendo que ese sea el valor de continuos
			$sqlfecretorno = "select to_char(fecharetorno(to_date('$fecret','dd/mm/yyyy'),'$codnom',$dia_c,'$jor'),'dd/mm/yyyy') as fecharetorno;";
			if (H::BuscarDatos($sqlfecretorno,$arrret))
				$fecret=$arrret[0]['fecharetorno'];					
		}			
		
		if($dia_h>0)
		{
		    $jor='H';
			$sqlfecretorno = "select to_char(fecharetorno(to_date('$fecret','dd/mm/yyyy'),'$codnom',$dia_h,'$jor'),'dd/mm/yyyy') as fecharetorno;";
			if (H::BuscarDatos($sqlfecretorno,$arrret))
				$fecret=$arrret[0]['fecharetorno'];					
		}						
		$output = '[["npvacsalidas_diaspend","'.$this->totdia.'",""],["npvacsalidas_fechas","'.$fecret.'",""],["npvacsalidas_diasdisfrutar","'.$diavac.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;	
      default:
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }

  }


  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->npvacsalidas = $this->getNpvacsalidasOrCreate();
        $this->updateNpvacsalidasFromRequest();


		if($this->npvacsalidas->getDiasdisfrutar()<='0')
		{
			$this->coderr = 461;
		}else
		{
			$this->coderr=Nomina::validarVacsalidas($this->npvacsalidas);
		}

        if ($this->coderr<>-1)
        {
          return false;
        }
        else return true;


      }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($npvacsalidas)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$npvacsalidas->getObjvac(),true);

    Vacaciones::salvar_vacsalidas($npvacsalidas,$grid);

    return parent::saving($npvacsalidas);
  }

  public function deleting($npvacsalidas)
  {	
  	Vacaciones::eliminar_vacsalidas($npvacsalidas);
	
    return parent::deleting($npvacsalidas);
  }


}
