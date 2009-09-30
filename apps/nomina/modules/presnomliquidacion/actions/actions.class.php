<?php

/**
 * presnomliquidacion actions.
 *
 * @package    Roraima 
 * @subpackage presnomliquidacion
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class presnomliquidacionActions extends autopresnomliquidacionActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
	$this->configGrid();
	$this->configGridAsigDeduc();	
	$this->arrret = $this->cargar_tiporetiro();
	$this->params = array('arrret'=>$this->arrret);
  }

  public function cargar_tiporetiro()
  {
  	  $c = new Criteria();
	  $obj = NptipretPeer::doSelect($c);
	  $r=array(''=>'Selecccione....');

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getCodret()=>$i->getDesret());
	  }
	  return $r;
  }  
  
  
  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridAsigDeduc($codemp="",$codnom="",$categoria="",$fecegr="",$arrclau=array(),$salariointegral="",$estaliquidado=false)
  {	
    $perasig=array();
    $perdeduc=array();
    $arr=array();
	$totarr=0;
	$this->salintdia = 0;
	$this->salintdiaconcol = 0;
	if(!$estaliquidado)
	{	
    	$sql="select 1 as orden,
			SUM(A.DIAART108) as DIAS,
			SUM(A.VALART108) AS MONTO,
			(case when B.PERDES=B.PERDES then 'PRESTACIONES DE ANTIGUEDAD ' else 'PRESTACIONES DE ANTIGUEDAD '||B.PERDES||' - '||B.PERHAS end ) AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NPIMPPRESOC A,NPDEFPRELIQ B 
			where 
			--(A.TIPO IS NULL) AND 
			a.tipo='' and
			A.codemp='$codemp' AND 
			A.VALART108>0 and
			B.CODNOM='$codnom' AND 
			B.CODCON='000' AND 
			TO_CHAR(A.FECFIN,'YYYY')>=B.PERDES AND 
			TO_CHAR(A.FECFIN,'YYYY')<=B.PERHAS 
			GROUP BY 
			(case when B.PERDES=B.PERDES then 'PRESTACIONES DE ANTIGUEDAD 'else 'PRESTACIONES DE ANTIGUEDAD '||B.PERDES||' - '||B.PERHAS end),B.CODPAR  
			HAVING
			SUM(A.VALART108)<>0
			
			Union All 
			select 1 as orden, 
			SUM(0) as DIAS,
			(SUM(A.VALART108)*-1)-(SUM(A.ADEANT)*-1) AS MONTO,
			'APORTES DEPOSITADOS EN FIDEICOMISO ' AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NPIMPPRESOC A,NPDEFPRELIQ B,NPTIPCON D,NPASIEMPCONT E,--NPASINOMCONT E,
			(Select MAX(FECFIN) as FECHAFIN FROM NPIMPPRESOC WHERE tipo='' AND codemp='$codemp') C 
			where  
			A.tipo='' AND 
			A.codemp='$codemp' AND 
			B.CODNOM='$codnom' AND 
			B.CODCON='000' AND
			to_char(fecini,'yyyy')>=perdes and
			to_char(fecfin,'yyyy')<=perhas AND
			A.CODEMP=E.CODEMP AND
			D.CODTIPCON=E.CODTIPCON AND
			FECFIN>=E.FECDES AND
			FECFIN<=E.FECHAS AND
			--E.CODNOM=B.CODNOM AND
			--D.CODTIPCON=E.CODTIPCON AND
			(D.FID='1' OR D.FID='S') AND
			FECINI>=(CASE WHEN (D.FID='1' OR D.FID='S') THEN D.FECDES ELSE fecini END)
			GROUP BY B.CODPAR 
			HAVING
			SUM(A.VALART108)<>0
			
			Union All 
			select 2 as orden, 
			SUM(A.DIAART108) as DIAS,
			SUM(A.VALART108) AS MONTO,
			'DIFERENCIA PRESTACION DE ANTIGUEDAD (ART. 108 L.O.T.) '||' ('||TO_CHAR(SUM(A.DIAART108),'9999')||' DÍAS)' AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NPIMPPRESOC A,NPDEFPRELIQ B 
			where 
			A.TIPO<>'' AND 
			A.VALART108>0 AND
			A.codemp='$codemp' AND 
			B.CODNOM='$codnom' AND 
			B.CODCON='002' AND 
			TO_CHAR(A.FECFIN,'YYYY')>=B.PERDES AND 
			TO_CHAR(A.FECFIN,'YYYY')<=B.PERHAS 
			Group By B.CODPAR 
			HAVING
			SUM(A.VALART108)<>0
			
			Union All 
			SELECT 3 as orden,
			SUM(0) as DIAS,
			SUM(A.INTDEV) AS MONTO,
			(case when B.PERDES=B.PERHAS then 'INTERESES SOBRE PREST. SOCIALES ART. 108 '||B.PERDES else 'INTERESES SOBRE PREST. SOCIALES ART. 108 '||B.PERDES||' - '||B.PERHAS end ) AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NPIMPPRESOC A,NPDEFPRELIQ B 
			where 
			A.codemp='$codemp' AND 
			B.CODNOM='$codnom' AND 
			B.CODCON='001' AND 
			TO_CHAR(A.FECFIN,'YYYY')>=B.PERDES AND 
			TO_CHAR(A.FECFIN,'YYYY')<=B.PERHAS 
			GROUP BY (case when B.PERDES=B.PERHAS then 'INTERESES SOBRE PREST. SOCIALES ART. 108 '||B.PERDES else 'INTERESES SOBRE PREST. SOCIALES ART. 108 '||B.PERDES||' - '||B.PERHAS end ),B.CODPAR 
			HAVING
			SUM(A.INTDEV)<>0
			
			Union All 
			select 4 as orden,
			A.DIASBONO as DIAS,
			(A.MONTOINCI/30*A.DIASBONO) AS MONTO,
			'BONO VACACIONAL FRACCIONADO AÑO '||A.PERINI||'-'||A.PERFIN AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NPVACLIQUIDACION A,NPDEFPRELIQ B 
			WHERE 
			A.CODEMP='$codemp' AND 
			A.DIASBONO>0 AND 
			B.CODNOM='$codnom' AND
			B.CODCON='004' AND 
			A.PERFIN>=B.PERDES AND 
			A.PERFIN<=B.PERHAS AND
			(A.MONTOINCI/30*A.DIASBONO)<>0
			
			
			Union ALL 
			select 5 as orden,
			A.DIADIS as DIAS,(A.ULTSUE/30*A.DIADIS) AS MONTO,
			'VACACIONES FRACCIONADAS '||A.PERINI||'-'||A.PERFIN AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NPVACLIQUIDACION A,NPDEFPRELIQ B 
			WHERE 
			A.CODEMP='$codemp' AND 
			A.DIADIS<>0 AND 
			B.CODNOM='$codnom' AND 
			B.CODCON='003' AND 
			A.PERFIN>=B.PERDES AND 
			A.PERFIN<=B.PERHAS AND
			(A.ULTSUE/30*A.DIADIS)<>0
			
			UNION All 
			SELECT 1 as orden,
			SUM(0) as DIAS, 
			SUM(A.MONANT)*-1 AS MONTO,
			CASE WHEN SUM(A.MONANT)>0 THEN 'ANTICIPO DE PRESTACIONES SOCIALES EN FECHA ' ELSE 'PAGO RETROACTIVO EN FECHA ' END||TO_CHAR(A.FECANT,'DD/MM/YYYY') AS DESCRIPCION,
			B.CODPAR AS PARTIDA 
			From NpAntPre A,NPDEFPRELIQ B 
			WHERE 
			A.CODEMP='$codemp' AND 
			B.CODNOM='$codnom' AND 
			B.CODCON='000' AND 
			TO_CHAR(A.FECANT,'YYYY')>=B.PERDES AND 
			TO_CHAR(A.FECANT,'YYYY')<=B.PERHAS 
			GROUP BY A.FECANT,B.CODPAR
			HAVING
			SUM(A.MONANT)<>0 
			ORDER BY orden,DESCRIPCION DESC";

	      if (H::BuscarDatos($sql,$arr))
	      {	      	
	        $i=0;
			$j=0;
			$cont=0;
			$factor=0;
			$totarr=count($arr); 
			$aguinaldos = PrestacionesSociales::AguinaldosFracionados($codnom,$codemp,$fecegr,$salariointegral,$totarr,$estaliquidado);
			$sqldefesp = "select * from npdefespparpre where codnom='$codnom'";			
			if (H::BuscarDatos($sqldefesp,$arrdefesp))
			  if(is_numeric($arrdefesp[0]['factorbonfinanofra']) && $arrdefesp[0]['factorbonfinanofra']!=0)
				$factor=$arrdefesp[0]['factorbonfinanofra'];

			$this->salintdia = $salariointegral/30;
			if($factor!=0 && (!is_null($factor)))
				$this->salintdiaconcol = ($salariointegral*$factor)/365;	
			
			$arr = array_merge($arr,$aguinaldos);
	        while ($cont<count($arr))
	        {
			  if ((H::tofloat($arr[$cont]['monto']))>0)
			  {		  	
		           $perasig[$i]['concepto']=$arr[$cont]['descripcion'];		  	
				   $perasig[$i]['monto']=H::FormatoMonto($arr[$cont]['monto']);
				   $perasig[$i]['codpre']=$categoria."-".$arr[$cont]['partida'];
				   $c = new Criteria();
				   $c->add(CpdeftitPeer::CODPRE,$categoria."-".$arr[$cont]['partida']);
				   $rs = CpdeftitPeer::doSelectone($c);
				   if($rs)
					   $perasig[$i]['descripcion']=$rs->getNompre();
				   else
				   	   $perasig[$i]['descripcion']='<!titulo presupuestario no existe!>';
				   $perasig[$i]['codcon']='AUT';
				   $perasig[$i]['dias']=$arr[$cont]['dias'];
				   $perasig[$i]['id']=9;
				   $i++;
			  }else
			  {
			  	   $perdeduc[$j]['concepto']=$arr[$cont]['descripcion'];		  	
				   $perdeduc[$j]['monto']=H::FormatoMonto($arr[$cont]['monto']*-1);
				   $perdeduc[$j]['codpre']=$categoria."-".$arr[$cont]['partida'];
				   $c = new Criteria();
				   $c->add(CpdeftitPeer::CODPRE,$categoria."-".$arr[$cont]['partida']);
				   $rs = CpdeftitPeer::doSelectone($c);
				   if($rs)
					   $perdeduc[$j]['descripcion']=$rs->getNompre();
				   else
				   	   $perdeduc[$j]['descripcion']='<!titulo presupuestario no existe!>';
				   $perdeduc[$j]['codcon']='AUT';
				   $perdeduc[$j]['dias']=$arr[$cont]['dias'];
				   $perdeduc[$j]['id']=9;		  	
				   $j++;
			  }
			  $cont++;		  
			}
			#CALCULO DE LA CLAUSULA
			if($arrclau)
			{
				$perasig[$i]=$arrclau;
			}
			
		  }
	}else
	{
		
	  $sqldefesp = "select * from npdefespparpre where codnom='$codnom'";			
			if (H::BuscarDatos($sqldefesp,$arrdefesp))
			  if(is_numeric($arrdefesp[0]['factorbonfinanofra']) && $arrdefesp[0]['factorbonfinanofra']!=0)
				$factor=$arrdefesp[0]['factorbonfinanofra'];

			$this->salintdia = $salariointegral/30;
			if($factor!=0 && (!is_null($factor)))
				$this->salintdiaconcol = ($salariointegral*$factor)/365;
	  #ESTA LIQUIDADO
	  $sql="select * from npliquidacion_det where codemp='$codemp' order by numreg,concepto desc";
	  if (H::BuscarDatos($sql,$arr))
      {
      	
        $i=0;
		$j=0;
		$cont=0;
		while ($cont<count($arr))
	        {
			  if ($arr[$cont]['asided']=='A')
			  {		  	
		           $perasig[$i]['concepto']=$arr[$cont]['concepto'];		  	
				   $perasig[$i]['monto']=H::FormatoMonto($arr[$cont]['monto']);
				   $perasig[$i]['codpre']=$arr[$cont]['codpre'];
				   $c = new Criteria();
				   $c->add(CpdeftitPeer::CODPRE,$arr[$cont]['codpre']);
				   $rs = CpdeftitPeer::doSelectone($c);
				   if($rs)
					   $perasig[$i]['descripcion']=$rs->getNompre();
				   else
				   	   $perasig[$i]['descripcion']='<!titulo presupuestario no existe!>';
				   $perasig[$i]['codcon']=$arr[$cont]['codcon'];;
				   $perasig[$i]['dias']=$arr[$cont]['dias'];
				   $perasig[$i]['id']=9;
				   $i++;
			  }else
			  {
			  	   $perdeduc[$j]['concepto']=$arr[$cont]['concepto'];		  	
				   $perdeduc[$j]['monto']=H::FormatoMonto($arr[$cont]['monto']);
				   $perdeduc[$j]['codpre']=$arr[$cont]['codpre'];
				   $c = new Criteria();
				   $c->add(CpdeftitPeer::CODPRE,$arr[$cont]['codpre']);
				   $rs = CpdeftitPeer::doSelectone($c);
				   if($rs)
					   $perdeduc[$j]['descripcion']=$rs->getNompre();
				   else
				   	   $perdeduc[$j]['descripcion']='<!titulo presupuestario no existe!>';
				   $perdeduc[$j]['codcon']=$arr[$cont]['codcon'];
				   $perdeduc[$j]['dias']=$arr[$cont]['dias'];
				   $perdeduc[$j]['id']=9;		  	
				   $j++;
			  }
			  $cont++;		  
			}
	  }
	}

	//Grid Asignaciones	
    $opciones = new OpcionesGrid();
	
    $opciones->setEliminar(true);
    $opciones->setTabla('NpliquidacionDet');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(900);
    $opciones->setFilas(1);
    $opciones->setName('a');
    $opciones->setTitulo('Asignaciones');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Concepto');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
	$col1->setCatalogo('npdefcpt','sf_admin_edit_form',array('codcon' => 5,'nomcon' => 1), 'Npdefcpt_nomdefespguarde');
    $col1->setHTML('type="text" size="60" ');
    $col1->setNombreCampo('concepto');

    $col2 = new Columna('Monto');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
	$col2->setEsnumerico(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setHTML('type="text" size="25"');
	$col2->setEsTotal(true,'total_asi');
    $col2->setNombreCampo('monto');

    $col3 = new Columna('Codigo Presupuestario');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codpre');
	$col3->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 3,'nompre' => 4), 'Cpasiini_Pagemiord');
    $col3->setHTML('type="text" size="40" readonly="true"');

    $col4 = new Columna('Descripcion');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('descripcion');
    $col4->setHTML('type="text" size="60" readonly="true" ');

    $col5 = new Columna('Concepto');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codcon');
    $col5->setHTML('type="text" size="10" ');

    $col6 = new Columna('Dias');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setNombreCampo('dias');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="10" ');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->Objasig = $opciones->getConfig($perasig);
    $this->npliquidacion_det->setObjasig($this->Objasig);
    
    //Grid Deducciones
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npliquidacion');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(900);
    $opciones->setFilas(1);
    $opciones->setName('b');
    $opciones->setTitulo('Deducciones');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Concepto');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
	$col1->setCatalogo('npdefcpt','sf_admin_edit_form',array('codcon' => 5,'nomcon' => 1), 'Npdefcpt_nomdefespguarde');
    $col1->setHTML('type="text" size="60" ');
    $col1->setNombreCampo('concepto');

    $col2 = new Columna('Monto');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
	$col2->setEsnumerico(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setHTML('type="text" size="25"');
    $col2->setEsTotal(true,'total_ded');
    $col2->setNombreCampo('monto');

    $col3 = new Columna('Codigo Presupuestario');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codpre');
	$col3->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 3,'nompre' => 4), 'Cpasiini_Pagemiord');
    $col3->setHTML('type="text" size="40" readonly="true"');

    $col4 = new Columna('Descripcion');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('descripcion');
    $col4->setHTML('type="text" size="60" readonly="true"');

    $col5 = new Columna('Concepto');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codcon');
    $col5->setHTML('type="text" size="10" ');

    $col6 = new Columna('Dias');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setNombreCampo('dias');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="10" ');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
	
    $this->Objdeduc = $opciones->getConfig($perdeduc);
    $this->npliquidacion_det->setObjdeduc($this->Objdeduc);
  }  

/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp="")
  {
    $per=array();	
    if ($codemp!="")
    {				
      $arr=array();	  
      $sql="select * from NPVACLIQUIDACION WHERE CODEMP='$codemp' ORDER BY PERINI desc";
      if (H::BuscarDatos($sql,$arr))
      {
      //  H::PrintR($arr);
        $i=0;
        $cont=0;
        while ($cont<count($arr))
        {
          /*if ((H::tofloat($arr[$cont]['corresponde'])-H::tofloat($arr[$cont]['disfrutados']))!=0)
          {
           $per[$i]['perini']=$arr[$cont]['desde'];
           $per[$i]['perfin']=$arr[$cont]['hasta'];
           if ($arr[$cont]['fraccion']=='SI')
           		$per[$i]['diadis']=H::tofloat($arr[$cont]['fracciondia']);
           else
           		$per[$i]['diadis']=H::tofloat($arr[$cont]['corresponde']-$arr[$cont]['disfrutados']);
           $per[$i]['diasbono']=H::tofloat($arr[$cont]['fraccionbono']);
           $per[$i]['diacan']=$per[$i]['diadis']+$per[$i]['diasbono'];

           $monto=($per[$i]['diadis']*($arr[$cont]['salnor']/30))+($per[$i]['diasbono']*($arr[$cont]['salint']/30));

           $per[$i]['monto']=number_format($monto,2,',','.');
           $per[$i]['id']=9;
           $i++;
          }*/ #NO BORRAR ESTE CAMBIO SE HIZO DEBIDO A QUE ESTE GRID DEBE MOSTRAR LO QUE YA ESTA GRABADO EN LA TABLA NPVACLIQUIDACION
		  $per[$i]['perini']=$arr[$cont]['perini'];
          $per[$i]['perfin']=$arr[$cont]['perfin'];
   		  $per[$i]['diadis']=H::tofloat($arr[$cont]['diadis']);
          $per[$i]['diasbono']=H::tofloat($arr[$cont]['diasbono']);
          $per[$i]['diacan']=$per[$i]['diadis']+$per[$i]['diasbono'];          
          $per[$i]['monto']=H::FormatoMonto($arr[$cont]['monto']);
          $per[$i]['id']=9;
          $i++;

          $cont++;
        }//fin del while
        //obtener el salario integral del ultimo registro del arreglo ya que ese es el ultimo sueldo del empleado
      }
    }

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacliquidacion');
    $opciones->setAnchoGrid(800);
    $opciones->setAncho(600);
    $opciones->setFilas(1);
    $opciones->setName('c');
    $opciones->setTitulo('Vacaciones por Disfrutar');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setHTML('type="text" size="10" readonly="true"');
    $col1->setNombreCampo('perini');

    $col2 = new Columna('Período Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true"');
    $col2->setNombreCampo('perfin');

    $col3 = new Columna('Días Disfrute');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('diadis');
    $col3->setHTML('type="text" size="8" readonly="true"');

    $col4 = new Columna('Días Bono Vac.');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('diasbono');
    $col4->setHTML('type="text" size="8" readonly="true"');

    $col5 = new Columna('Días a Cancelar');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('diacan');
    $col5->setHTML('type="text" size="8" readonly="true"');

    $col6 = new Columna('Monto del Período');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setNombreCampo('monto');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="10" readonly="true" ');
	$col6->setEsTotal(true,'total_vac');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj1 = $opciones->getConfig($per);
    $this->npliquidacion_det->setObjvaca($this->obj1);

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');    
    $ajax = $this->getRequestParameter('ajax','');	
	$salarioi = $this->getRequestParameter('salario','');		
	$tipret = $this->getRequestParameter('tipret','');
	$this->cond=0;
	$js="";
	$delemp="";

    switch ($ajax){
      case '1':
        $codemp=$codigo;
		$this->npliquidacion_det = $this->getNpliquidacionDetOrCreate();
		$sql= "Select * from nphojint where codemp='$codemp'";			
		if (H::BuscarDatos($sql,$rss))
		{		
			/**VERIFICAMOS SI EXISTEN PERSONAS QUE SE PUEDAN LIQUIDAR*/
			$sql= "Select * from NPLiquidacion a, npasiempcont c where a.CEDULA=c.codemp and a.CEDULA='$codemp'";			

			if (H::BuscarDatos($sql,$rs))
			{
				$fecha="";
			  	$sql0= "select to_char(max(FecNom),'dd/mm/yyyy') as Fecha from NPHisCon where CodEmp='$codemp'";
				if (H::BuscarDatos($sql0,$rs0))
			    {
			    	$fecha=$rs0[0]["fecha"];     	
			    }	
				$categoria="";
				$codnom="";			
				$nomemp="";
			  	$sql1 = "select * from NPHisCon where CodEmp='$codemp' and FecNom=To_Date('$fecha','dd/mm/yyyy')";
				if (H::BuscarDatos($sql1,$rs1))
			    {
			    	$categoria=$rs1[0]["codcat"];
				   	$codnom=$rs1[0]["codnom"];
					$nomemp=$rs1[0]["nomemp"];					
					if($nomemp==''){
						$sql11 = "select nomemp from nphojint where CodEmp='$codemp'";
						if (H::BuscarDatos($sql11,$rs11))
					       $nomemp=$rs11[0]["nomemp"];
					}
					
					
				}else{
					$sql1 = "select * from NPAsiCarEmp where CodEmp='$codemp' and fecasi=(Select max(fecasi) from npasicaremp where codemp='$codemp')";
					if (H::BuscarDatos($sql1,$rs1))
			    	{
			    		$categoria=$rs1[0]["codcat"];
				   		$codnom=$rs1[0]["codnom"];
						$nomemp=$rs1[0]["nomemp"];					
						if($nomemp==''){
							$sql11 = "select nomemp from nphojint where CodEmp='$codemp'";
							if (H::BuscarDatos($sql11,$rs11))
					       		$nomemp=$rs11[0]["nomemp"];
							}
					
					
					}else{
						$sql1 = "select * from NPAsiEmpCont where CodEmp='$codemp' and Status='A'";
						if (H::BuscarDatos($sql1,$rs1))
			    		{
			    			$categoria='';
				   			$codnom=$rs1[0]["codnom"];
							$nomemp='';					
							if($nomemp==''){
								$sql11 = "select nomemp from nphojint where CodEmp='$codemp'";
								if (H::BuscarDatos($sql11,$rs11))
					       			$nomemp=$rs11[0]["nomemp"];
								}					
						}
					}
				}
				
				/**VERIFICAMOS SI EXISTEN PERSONAS CON LIQUIDACION CALCULADA*/
				$sql2="Select * from NPLIQUIDACION_DET where CodEmp='$codigo'";
				if (H::BuscarDatos($sql2,$rs2))
				{
					$numord=$rs2[0]['numord'];
					$estaliquidado=true;
				}		       			    	
				else
				{   $numord='';
					$estaliquidado=false;
				}					
				
				/**ASIGNAMOS VALORES DE  FECHAS Y TIEMPO DE SERVICIO*/
				$fechae=date('Y-m-d');
					if(strtotime($rss[0]["fecret"]))
						$fechae = $rss[0]["fecret"];
				$fecing=date('d/m/Y',strtotime($rs[0]["fechaingreso"]));
				$feccor=date('d/m/Y',strtotime($rs[0]["fechacorte"]));
				$fecegr=date('d/m/Y',strtotime($rss[0]["fecret"]));
				$anoact=$rs[0]["anoactual"];
				$mesact=$rs[0]["mesactual"];
				$diaact=$rs[0]["diasactual"];
				$anoant=$rs[0]["anoanterior"];
				$mesant=$rs[0]["mesanterior"];
				$diaant=$rs[0]["diasanterior"];
				$anoefec=$rs[0]["anoefectivo"];
				$mesefec=$rs[0]["mesefectivo"];
				$diaefec=$rs[0]["diasefectivo"];
				/**ASIGNAMOS VALORES DE SUELDOS*/			
				#Ultimo sueldo del empleado
				$antiguedad = H::DateDiff("yyyy", $fecing, date("Y-m-d"));		
				
				$sql= "select sum(ultsue) as ultsue from (
				        Select coalesce(sum(MonAsi),0) as ultsue from NPSALINT a, npasipre b where CodEmp='$codemp' and 
						FECFINCON = (SELECT MAX(FECFINCON) FROM NPSALINT where CodEmp='$codemp' and 
						FECFINCON<= to_date('$fecegr','dd/mm/yyyy')) and a.codcon=b.codcon and a.codasi=b.codasi and b.tipasi='S'  
						Union all
						SELECT SUM(A.MONTO)/12 as porcion FROM NPHISCON A , NPHOJINT B WHERE A.CODEMP='$codemp' AND A.CODNOM='$codnom' 
						AND A.CODCON in (select codcon from npparamsalint where codnom='$codnom' and afecta='ABF')
						AND A.FECNOM >=TO_DATE('01/01/'||to_char(coalesce(fecret,now()),'yyyy'),'dd/mm/yyyy')
						AND A.FECNOM <=coalesce(FECRET,now())
						AND A.CODEMP=B.CODEMP
						)a";

				if (H::BuscarDatos($sql,$rs))
				   $ultimosueldo = $rs[0]["ultsue"];
				else
				   $ultimosueldo = 0.00;
				   
				#Salario integral del empleado   
				$sql="select a.codtipcon, a.calinc from npasiempcont b, npbonocont a 
						where status='A' and codemp='$codemp' and a.codtipcon=b.codtipcon and
						fecdes>=anovig and 
						fecdes<=anovighas AND
						fechas>=anovig and 
						fechas<=anovighas";
				if (H::BuscarDatos($sql,$rs))
				{
					$codtipcon=$rs[0]['codtipcon'];
					$calinci=$rs[0]['calinc'];
				}				   
				else
				{
					$codtipcon='';
					$calinci='';
				}
				
				if($salarioi!='')
				{
					$salariointegral=$salarioi;
					
				}else
				{
					if($calinci=='S')
					{
						$sql =  "select 
								coalesce((select sum(monto) from npasipre a, npconasi b, nphiscon c 
								where a.codasi=b.codasi and a.codcon=b.codcon and b.codcpt=c.codcon and tipasi='S' 
								and a.codcon='$codtipcon' and codemp='$codemp' and  
								TO_CHAR(fecnom,'MM/YYYY')=TO_CHAR((SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO=''),'mm/yyyy')
								),0) 
								+
								((coalesce((select sum(monto) from npasipre a, npconasi b, nphiscon c 
								where a.codasi=b.codasi and a.codcon=b.codcon and b.codcpt=c.codcon and b.afealibv='S' 
								and a.codcon='$codtipcon' and codemp='$codemp' and  
								TO_CHAR(fecnom,'MM/YYYY')=TO_CHAR((SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO=''),'mm/yyyy')
								),0)/30)* (z.diavac/12))
								+
								((coalesce((select sum(monto) from npasipre a, npconasi b, nphiscon c 
								where a.codasi=b.codasi and a.codcon=b.codcon and b.codcpt=c.codcon and b.afealibf='S' 
								and a.codcon='$codtipcon' and codemp='$codemp' and  
								TO_CHAR(fecnom,'MM/YYYY')=TO_CHAR((SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO=''),'mm/yyyy')
								),0)/30)* (z.diauti/12)) 
								+
								(coalesce((SELECT SUM(A.MONTO)/12 as porcion FROM NPHISCON A , NPHOJINT B WHERE A.CODEMP='$codemp' AND A.CODNOM='$codnom' 
								AND A.CODCON in (select codcon from npparamsalint where codnom='$codnom' and afecta='ABF')
								AND A.FECNOM >=TO_DATE('01/01/'||to_char(coalesce(fecret,now()),'yyyy'),'dd/mm/yyyy')
								AND A.FECNOM <=coalesce(FECRET,now())
								AND A.CODEMP=B.CODEMP),0))
								as monto
								from npbonocont z
								where z.codtipcon='$codtipcon' and 
								anovig<=(SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO='') and
								anovighas>=(SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO='')
								
								
								";	
								if (H::BuscarDatos($sql,$rs))
								    if($rs[0]["monto"]!=0)
										$salariointegral=$rs[0]["monto"];
									else{
										
										$sql="select 
											coalesce((select sum(monasi) from npasipre a, npsalint c 
											where  a.codasi=c.codasi and tipasi='S' 
											and a.codcon='$codtipcon' and c.codemp='$codemp' and  
											TO_CHAR(fecinicon,'MM/YYYY')=TO_CHAR((SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO=''),'mm/yyyy')
											),0)
											+
											((coalesce((select sum(monasi) from npasipre a, npsalint c
											where a.codasi=c.codasi and  afealibv='S' 
											and a.codcon='$codtipcon' and codemp='$codemp' and  
											TO_CHAR(fecinicon,'MM/YYYY')=TO_CHAR((SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO=''),'mm/yyyy')
											),0)/30)* (z.diavac/12))
											+
											((coalesce((select sum(monasi) from npasipre a, npsalint c
											where a.codasi=c.codasi and  afealibf='S' 
											and a.codcon='$codtipcon' and codemp='$codemp' and  
											TO_CHAR(fecinicon,'MM/YYYY')=TO_CHAR((SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO=''),'mm/yyyy')
											),0)/30)* (z.diauti/12)) 
											+
											(coalesce((SELECT SUM(A.MONTO)/12 as porcion FROM NPHISCON A , NPHOJINT B WHERE A.CODEMP='$codemp' AND A.CODNOM='$codnom' 
											AND A.CODCON in (select codcon from npparamsalint where codnom='$codnom' and afecta='ABF')
											AND A.FECNOM >=TO_DATE('01/01/'||to_char(coalesce(fecret,now()),'yyyy'),'dd/mm/yyyy')
											AND A.FECNOM <=coalesce(FECRET,now())
											AND A.CODEMP=B.CODEMP),0))
											as monto
											from npbonocont z
											where z.codtipcon='$codtipcon' and 
											anovig<=(SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO='') and
											anovighas>=(SELECT MAX(FECFIN) FROM NPIMPPRESOC WHERE CODEMP='$codemp' AND VALART108>0 AND TIPO='')
											";
										if (H::BuscarDatos($sql,$rs))
											$salariointegral=$rs[0]["monto"];
										else	
											$salariointegral= 0.00;
										
									}	
								else
									$salariointegral= 0.00;
					}else
					{
						$salariointegral=$ultimosueldo;
					}
				}				
					
				#Sueldo al 31/12/1996
				$sql = "select distinct salemp as sue311296 from npimppresoc a where a.codemp='$codemp' 
						and a.fecini=(select max(fecini) from npimppresoc where codemp=a.codemp)";
				if (H::BuscarDatos($sql,$rs))
					$sue311296=$rs[0]["sue311296"];
				else
					$sue311296= 0.00;
					
				#Sueldo al 30/06/1997	
				$sql =  "select avg(salemp) as sue180697 from (
							select distinct salemp,fecini from npimppresoc where codemp='$codemp' 
							order by fecini desc limit 12
							)a";
				if (H::BuscarDatos($sql,$rs))
					$sue180697=$rs[0]["sue180697"];
				else
					$sue180697= 0.00;
				$this->codemp=$codemp;
				$this->getUser()->setAttribute('codemppre',$this->codemp);
				$this->codnom=$codnom;
				$this->getUser()->setAttribute('categoriapre',$this->categoria);
				$this->categoria=$categoria;	
			
				/**MOSTRAMOS GRID DE VACACIONES POR DISFRUTADAR*/			
				$this->configGrid($codemp);
				$this->getUser()->setAttribute('objvaca',$this->npliquidacion_det->getObjvaca());
				$this->objvaca = $this->getUser()->getAttribute('objvaca');
	
	            /**BUCAR TIPO DE SALARIO PARA AGUINALDOS y PARA CLAUSULA DE RETIRO*/				
				$arrclau=array();
				$tipsalagui='SI';
				$tipsalret='SI';
				$numdia=0;
				$descripclau='';
				$partida='';
				$c1 = new Criteria();
			    $c1->add(NpdefespparprePeer::CODNOM,$codnom);
				$c1->add(NpdefespparprePeer::CODRET,$tipret);
			    $per1 = NpdefespparprePeer::doSelectOne($c1);
			    if($per1)
				{
					$tipsalagui=$per1->getTipsalbonfinanofra();
					$tipsalret=$per1->getTipsaldiaant();
					if($per1->getPoranoant()=='S')
					   $numdia=$per1->getNumdiaant()*$anoefec;
					else
					   $numdia=$per1->getNumdiaant();   
					$partida = $per1->getCodpar();
					$descripclau = $per1->getDescripclau();
				}				
				#SALARIO AGUINALDO
				if($tipsalagui=='UD')
				  $salarioaguinaldos=$sue311296;	
				elseif($tipsalagui=='SP')
				  $salarioaguinaldos=$sue180697;
				elseif($tipsalagui=='SN')
				  $salarioaguinaldos=$ultimosueldo;
				else
				  $salarioaguinaldos=$salariointegral;
				#SALARIO CLAUSULA
				if($tipsalret=='UD')
				  $salarioclau=$sue311296;	
				elseif($tipsalret=='SP')
				  $salarioclau=$sue180697;
				elseif($tipsalret=='SN')
				  $salarioclau=$ultimosueldo;
				else
				  $salarioclau=$salariointegral;  
				  
				$salarioclausula=($salarioclau/30)*($numdia);
				if($salarioclausula>0)
				{
					$arrclau['concepto'] = $descripclau;
					$arrclau['monto'] = H::FormatoMonto($salarioclausula);
					$arrclau['codpre'] = $categoria."-".$partida;
					$c = new Criteria();
				    $c->add(CpdeftitPeer::CODPRE,$categoria."-".$partida);
				    $rs = CpdeftitPeer::doSelectone($c);
					if($rs)				
						$arrclau['descripcion'] = $rs->getNompre();
					else
					    $arrclau['descripcion'] = '<!titulo presupuestario no existe!>';					
					$arrclau['codcon'] = 'AUT';				
					$arrclau['dias'] = $numdia;				
					$arrclau['id'] = 9;	
				}							
				
				/************FIN*************************/
	
				/**CALCULO DE ASIGNACIONES Y DEDUCCIONES*/			
				if(!$estaliquidado)
				{
					# NO TIENE LIQUIDACIONES CALCULADAS				
					$this->configGridAsigDeduc($codemp,$codnom,$categoria,$fechae,$arrclau,$salarioaguinaldos,$estaliquidado);
					$this->getUser()->setAttribute('objasig',$this->npliquidacion_det->getObjasig());
					$this->getUser()->setAttribute('objdeduc',$this->npliquidacion_det->getObjdeduc());
					$js.="toAjaxUpdater('divgridasig',2,getUrlModulo()+'ajax','2');
						  toAjaxUpdater('divgriddeduc',3,getUrlModulo()+'ajax','3');						  
		    		     ";						 
				}else
				{
					# TIENE LIQUIDACIONES CALCULADAS
					if($numord<>'')
					{
						$js.="alert('Liquidacion Pagada con la Orden de Pago Nro: $numord');";
						$js.="$('save').hide();";						
					}						
					else{
						$codret = $rss[0]['codret'];
						$js.="$('npliquidacion_det_codret').selectedIndex='$codret';";
						$js.="alert('Liquidacion Realizada');";												
						$delemp=$codemp;
					}
					    
					$this->configGridAsigDeduc($codemp,$codnom,$categoria,$fechae,$arrclau,$salarioaguinaldos,$estaliquidado);
					$this->getUser()->setAttribute('objasig',$this->npliquidacion_det->getObjasig());
					$this->getUser()->setAttribute('objdeduc',$this->npliquidacion_det->getObjdeduc());
					$js.="toAjaxUpdater('divgridasig',2,getUrlModulo()+'ajax','2');
						  toAjaxUpdater('divgriddeduc',3,getUrlModulo()+'ajax','3');";
					
				}
				$js.="$('npliquidacion_det_salarioint').readOnly=false;";
				$this->salintdiaconcol!=0 ? $js.="$('thsalintconcol').show();" : $js.="$('thsalintconcol').hide();";
											
	        	$output = '[["npliquidacion_det_fecing","'.$fecing.'",""],["npliquidacion_det_feccor","'.$feccor.'",""],["npliquidacion_det_fecegr","'.$fecegr.'",""],'.
					  '["npliquidacion_det_diaefe","'.$diaefec.'",""],["npliquidacion_det_mesefe","'.$mesefec.'",""],["npliquidacion_det_anoefe","'.$anoefec.'",""],'.
					  '["npliquidacion_det_diarn","'.$diaact.'",""],["npliquidacion_det_mesrn","'.$mesact.'",""],["npliquidacion_det_anorn","'.$anoact.'",""],'.
					  '["npliquidacion_det_diara","'.$diaant.'",""],["npliquidacion_det_mesra","'.$mesant.'",""],["npliquidacion_det_anora","'.$anoant.'",""],'.
	  				  '["npliquidacion_det_sue311296","'.H::FormatoMonto($sue311296).'",""],["npliquidacion_det_sue180697","'.H::FormatoMonto($sue180697).'",""],'.
					  '["npliquidacion_det_ultimosueldo","'.H::FormatoMonto($ultimosueldo).'",""],["npliquidacion_det_salarioint","'.H::FormatoMonto($salariointegral).'",""],'.
					  '["npliquidacion_det_salintdia","'.H::FormatoMonto($this->salintdia).'",""],["npliquidacion_det_salintdiaconcol","'.H::FormatoMonto($this->salintdiaconcol).'",""],'.
				      '["npliquidacion_det_nomemp","'.$nomemp.'",""],["javascript","'.$js.'",""]]';			
			}else
			{
				$js.="alert('Esta Persona no tiene calculada prestaciones');";
				$js.="$('npliquidacion_det_codemp').focus();";
				$this->configGrid();
				$this->objvaca = $this->npliquidacion_det->getObjvaca();
				$output = '[["npliquidacion_det_codemp","",""],["npliquidaciondet_nomemp","",""],["javascript","'.$js.'",""]]';			
			}
		}else
		{
			$js.="alert('No existe la Persona');";
			$js.="$('npliquidacion_det_codemp').focus();";
			$this->configGrid();
			$this->objvaca = $this->npliquidacion_det->getObjvaca();	
			$output = '[["npliquidaciondet_codemp","",""],["npliquidaciondet_nomemp","",""],["javascript","'.$js.'",""]]';
			
		}
		$this->cond=1;
		$this->getUser()->setAttribute('delemp',$delemp);	        
        break;
	  case '2':
		$this->cond=2;
		$this->objasig = $this->getUser()->getAttribute('objasig');		
		$c = count($this->objasig["datos"]);
		$js.="for(i=0;i<$c;i++)
			  {
			  	if($('ax_'+i+'_5').value=='AUT')
			    {
			       \$('ax_'+i+'_0').hide();
				   \$('popup_a_'+i+'_1').hide();
				   if(\$('ax_'+i+'_4').value!='<!titulo presupuestario no existe!>')
				     \$('popup_a_'+i+'_3').hide();
				   for(j=0;j<=6;j++)
				   {
				   	  $('ax_'+i+'_'+j).readOnly=true;  
				   }
				}
			  }";
		$output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';	  
	    break;		
	  case '3':
		$this->cond=3;
		$this->objdeduc = $this->getUser()->getAttribute('objdeduc');
		$c = count($this->objdeduc["datos"]);
		$js.="for(i=0;i<$c;i++)
			  {
			  	if($('bx_'+i+'_5').value=='AUT')
			    {
			       \$('bx_'+i+'_0').hide();
				   \$('popup_b_'+i+'_1').hide();
				   if(\$('bx_'+i+'_4').value!='<!titulo presupuestario no existe!>')
				     \$('popup_b_'+i+'_3').hide();
				   for(j=0;j<=6;j++)
				   {
				   	  $('bx_'+i+'_'+j).readOnly=true;  
				   }
				}
			  }";
		$output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';	  
	    break;	  		
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

	  $this->npliquidacion_det = $this->getNpliquidacionDetOrCreate();
      $this->updateNpliquidacionDetFromRequest();
	          
	  $c =new  Criteria();
	  $c->Add(NpliquidacionDetPeer::CODEMP,$this->npliquidacion_det->getCodemp());		  
	  $per = NpliquidacionDetPeer::doSelectone($c);
	  if($per)
	  if($per->getNumord()<>'')
	  {
	  	$this->coderr=460;
	    return false;
	  }
			  
	  $this->configGridAsigDeduc();	   
	  $grida=Herramientas::CargarDatosGridv2($this,$this->Objasig,true);
	  $gridd=Herramientas::CargarDatosGridv2($this,$this->Objdeduc,true);	  

      #GRID ASIGNACIONES
      $x=$grida[0];
      $i=0;
      if (count($x)>0)
      {
	      while ($i<count($x))
	      {
	       if ($x[$i]['concepto']=="")
	       {
	       	$this->coderr=450;
	       	return false;
	       }
	       if ($x[$i]['monto']<0)
	       {
	       	$this->coderr=451;
	       	return false;
	       }
	       if ($x[$i]['codpre']=="")
	       {
	       	$this->coderr=452;
	       	return false;
	       }
		   if ($x[$i]['codcon']=="")
	       {
	       	$this->coderr=453;
	       	return false;
	       }
		   if ($x[$i]['dias']=="")
	       {
	       	$this->coderr=454;
	       	return false;
	       }
		   
	       $i++;
	      }
      }
      else
      {
        $this->coderr=411;
        return false;
      }
	  #GRID DEDUCCIONES
	  $x=$gridd[0];
      $i=0;
	  if (count($x)>0)
      {
	      while ($i<count($x))
	      {
	       if ($x[$i]['concepto']=="")
	       {
	       	$this->coderr=455;
	       	return false;
	       }
	       if ($x[$i]['monto']<0)
	       {
	       	$this->coderr=456;
	       	return false;
	       }
	       if ($x[$i]['codpre']=="")
	       {
	       	$this->coderr=457;
	       	return false;
	       }
		   if ($x[$i]['codcon']=="")
	       {
	       	$this->coderr=458;
	       	return false;
	       }
		   if ($x[$i]['dias']=="")
	       {
	       	$this->coderr=459;
	       	return false;
	       }

	       $i++;
	      }
      }
      else
      {
      	#solicitado por edgar
        #$this->coderr=411;
        #return false;
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    /*$codnom = $this->getUser()->getAttribute('codemppre');
	$categoria = $this->getUser()->getAttribute('categoriapre');
	$aux = split("/",$this->npliquidacion_det->getFecegr());
	$fecegr = $aux[1].''.$aux[0].''.$aux[2];
  	$this->configGrid($this->npliquidacion_det->getCodemp());
	$this->configGridAsigDeduc($this->npliquidacion_det->getCodemp(),$codnom,$categoria,$fecegr,$this->npliquidacion_det->getUltimosueldo(),false);
	*/
	$this->arrret = $this->cargar_tiporetiro();
	$this->params = array('arrret'=>$this->arrret);
	$this->npliquidacion_det = $this->getNpliquidacionDetOrCreate();
    $this->updateNpliquidacionDetFromRequest();
	
	$this->configGrid();
	$this->configGridAsigDeduc();
    $gridv=Herramientas::CargarDatosGridv2($this,$this->obj1,true);
	$grida=Herramientas::CargarDatosGridv2($this,$this->Objasig,true);
	$gridd=Herramientas::CargarDatosGridv2($this,$this->Objdeduc,true);

  }


  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($npliquidacion_det)
  {
  	$grida=Herramientas::CargarDatosGridv2($this,$this->Objasig,true);
	$gridd=Herramientas::CargarDatosGridv2($this,$this->Objdeduc,true);
    $this->coderr = PrestacionesSociales::salvar_liquidacion($npliquidacion_det,$grida,$gridd);

	$c = new Criteria();
	$c->add(NphojintPeer::CODEMP,$npliquidacion_det->getCodemp());
	$per = NphojintPeer::doSelectOne($c);
	if($per)
	{
		$per->setCodret($npliquidacion_det->getCodret());
		$per->save();
	}
	
    return $this->coderr;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
  	
  	$codemp = $this->getRequestParameter('codemp');
	$c = new Criteria();
	$c->add(NpliquidacionDetPeer::CODEMP,$codemp);
	NpliquidacionDetPeer::doDelete($c);
	
	$c = new Criteria();
	$c->add(NphojintPeer::CODEMP,$codemp);
	$per = NphojintPeer::doSelectOne($c);
	if($per)
	{
		$per->setCodret('');
		$per->save();
	}
	
	
	$this->getUser()->getAttributeHolder()->remove('delemp');
    return $this->forward('presnomliquidacion', 'list');
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
  	$this->redirect('presnomliquidacion/edit');
  }


}
