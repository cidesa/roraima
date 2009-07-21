<?php

/**
 * presnomregsalint actions.
 *
 * @package    siga
 * @subpackage presnomregsalint
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomregsalintActions extends autopresnomregsalintActions
{

  private $coderr = -1;
    public function executeIndex()
  {
    return $this->forward('presnomregsalint', 'edit');
  }

  public function executeEdit()
  {
    $this->npsalint = $this->getNpsalintOrCreate();

    $this->updateNpsalintFromRequest();

    $this->configGrid($this->npsalint->getPeriodo(),$this->npsalint->getCodCon(),$this->npsalint->getCodNomasi());


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->updateNpsalintFromRequest();
      $this->saveNpsalint($this->npsalint);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomregsalint/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomregsalint/list');
      }
      else
      {
        return $this->redirect('presnomregsalint/edit?id='.$this->npsalint->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function configGrid($fecha='',$contrato='', $nomina='')
  {
         $this->fecha = $fecha;
         $this->contrato = $contrato;
         $this->nomina = $nomina;

         $fechafin='';
         $per = array();
         $arr_codasi=array();
         $sqlCodAsi="Select codasi ,desasi from Npasipre where codcon='$this->contrato' order by codasi";
         H::BuscarDatos($sqlCodAsi,$arr_codasi);

         if ($this->fecha)
         {
	      $dia = '01';
		  $mes = substr($this->fecha, 0, 2);
		  $ano = substr($this->fecha, 3, 4);
		  $fechaini =  $ano.'-'.$mes.'-'.$dia;

	      $sql= "select last_day('$fechaini');";
	      H::BuscarDatos($sql,$fechafin);
	      $fecha1= $fechafin[0]['last_day'];


	      $c= new Criteria();
	      $c->add(NpasiempcontPeer::CODTIPCON,$this->contrato,Criteria::EQUAL);
	      $c->add(NpasiempcontPeer::CODNOM,$this->nomina,Criteria::EQUAL);
	     // $c->add(NpasiempcontPeer::FECCAL,$fechaini,Criteria::LESS_EQUAL);
	      $c->addJoin(NpasiempcontPeer::CODEMP,NphojintPeer::CODEMP);
		  $c->add(NphojintPeer::FECING,$fechaini,Criteria::LESS_EQUAL);
		  $k= NpasiempcontPeer::doSelect($c);

		  if ($k){
			$i=0;
			while ($i< count($k))
			{
			$c= new Criteria();
		    $c->add(NpsalintPeer::FECINICON, $fechaini,Criteria::GREATER_EQUAL);
		    $c->add(NpsalintPeer::FECFINCON, $fecha1,Criteria::LESS_EQUAL);
		    $c->add(NpsalintPeer::CODCON, $contrato,Criteria::EQUAL);
		    $c->add(NpsalintPeer::CODEMP, $k[$i]->getCodemp(),Criteria::EQUAL);
		    $c->addJoin(NpsalintPeer::CODEMP,NphojintPeer::CODEMP);
		    $c->add(NphojintPeer::FECING,$fechaini,Criteria::LESS_EQUAL);
		    $con= NpsalintPeer::doSelect($c);
			if ($con)
			{
			  $cont=0;
			  $montoacum=0;
			  $arr_data=array();
			  foreach ($con as $datos) {
			  	if ($cont==0)
			  	{
					$arr_data['codemp']=$k[$i]->getCodemp();
					$arr_data['nomemp']=$k[$i]->getNomemp();
					$feccal=$k[$i]->getFeccal();
					$feccal=date("d/m/Y",strtotime($feccal));
					$arr_data['feccal']=$feccal;
					$arr_data['id']=$k[$i]->getId();
			  	 }//if ($cont==0)
				$arr_data[$datos->getCodasi()]=number_format($datos->getMonasi(),2,',','.');
				$montoacum=$montoacum+$datos->getMonasi();
				$cont++;
			   }//foreach
               $arr_data['montocalculado']=number_format($montoacum,2,',','.');
               $per[] = $arr_data;
		    }//if ($con){
			else
			{
				$cod=$k[$i]->getCodemp();
				$con=$this->contrato;

		        $data='';
		        $fecini=date("d/m/Y",strtotime($fechaini));
		        $fecfin=date("d/m/Y",strtotime($fecha1));


		        $sql="SELECT SUM(CASE WHEN C.OPECON='A' THEN A.MONTO ELSE A.MONTO*-1 END) as monto, B.CODASI as codasi
						FROM NPHISCON A left outer join nppernom e on 
						(
						  a.codnom=e.codnom and e.mes=to_char(TO_DATE('$fecini','DD/MM/YYYY'),'mm') and 
						 e.anno=to_char(TO_DATE('$fecini','DD/MM/YYYY'),'yyyy')::numeric
						),NPCONASI B,NPDEFCPT C,NPASINOMCONT D
						WHERE A.CODEMP='$cod'
						AND a.FecNom  >= (case when e.fecini is not null then e.fecini else  TO_DATE('$fecini','DD/MM/YYYY') end) 
						AND a.FecNom  <= (case when e.fecfin is not null then e.fecfin else  TO_DATE('$fecfin','DD/MM/YYYY') end) 
						AND B.CODCON='$con'
						AND D.CODNOM=A.CODNOM
						AND D.CODTIPCON=B.CODCON
						AND A.CODCON=B.CODCPT
						AND A.CODCON=C.CODCON GROUP BY B.CODASI order by codasi";

			     H::BuscarDatos($sql,$data);
			     if ($data)
			     {
			        $m=0;
			        $montoacum=0;
			        $arr_data=array();
					while ($m < count($data))
					{
					  if ($m==0)
			  	      {
						$arr_data['codemp']=$k[$i]->getCodemp();;
						$arr_data['nomemp']=$k[$i]->getNomemp();
						$feccal=$k[$i]->getFeccal();
						$feccal=date("d/m/Y",strtotime($feccal));
						$arr_data['feccal']=$feccal;
						$arr_data['id']=$k[$i]->getId();
				  	 }//if ($cont==0)
					$arr_data[$data[$m]['codasi']]=number_format($data[$m]['monto'],2,',','.');
					$montoacum=$montoacum+$data[$m]['monto'];
					$m++;
				   }//while ($m< count($data))
	               $arr_data['montocalculado']=number_format($montoacum,2,',','.');
	               $per[] = $arr_data;
			     }
			     else//if $data
			     {
			     	    $codemp=$k[$i]->getCodemp();
						$nombre=$k[$i]->getNomemp();
						$monto= 0.00;
						$feccal=$k[$i]->getFeccal();
						$feccal=date("d/m/Y",strtotime($feccal));
						$id=$k[$i]->getId();
					    $per[] = array('codemp' => $codemp,'nomemp' => $nombre, 'feccal' => $feccal, 'montocalculado' => $monto, 'id' => $id);
			     }
   	         }//else if ($con)
            $i++;
			}	//while ($i< count($k))
		}//if ($k){
	  }//if ($this->fecha)





	    // Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas(50);
		$opciones->setTabla('Npsalint');
		$opciones->setName('a');
		$opciones->setAnchoGrid(700);
		$opciones->setAncho(700);
		$opciones->setTitulo('Asignaciones Por Trabajador');
		$opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(0);

        $col1 = new Columna('Cod. Trabajador');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codemp');
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Nombre');
		$col2->setTipo(Columna::TEXTAREA);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('nomemp');
		$col2->setHTML('type="text" size="30x1" readonly=true');

		$col3 = new Columna('Fecha de Inicio de Cálculo');
		$col3->setNombreCampo('feccal');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
	    $col3->setHTML('type="text" size="15" readonly=true');
	    $col3->setJScript('onKeypress="calculartotal(event,this.id)"');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

        //agregar las columnas dinamicas correspondientes al
        //grupo de asignaciones por contrato
        $h=0;
		while ($h<count($arr_codasi))
		{
			$numcol=4+$h;
		    eval('$col'.$numcol.'= new Columna(ucfirst(strtolower($arr_codasi[$h]["desasi"])));');
		    eval('$col'.$numcol.'->setTipo(Columna::MONTO);');
			eval('$col'.$numcol.'->setEsGrabable(true);');
			eval('$col'.$numcol.'->setAlineacionObjeto(Columna::CENTRO);');
			eval('$col'.$numcol.'->setAlineacionContenido(Columna::CENTRO);');
			eval('$col'.$numcol.'->setNombreCampo($arr_codasi[$h]["codasi"]);');
	        eval('$col'.$numcol.'->setHTML("size=10");');
	        eval('$col'.$numcol.'->setJScript("onKeypress=calculartotal(event,this.id)");');
	        eval('$opciones->addColumna($col'.$numcol.');');
		    $h++;
		}
	    $numcol=4+$h;
		eval('$col'.$numcol.'= new Columna("Total Asignaciones");');
	    eval('$col'.$numcol.'->setTipo(Columna::MONTO);');
		eval('$col'.$numcol.'->setEsGrabable(true);');
		eval('$col'.$numcol.'->setAlineacionObjeto(Columna::CENTRO);');
		eval('$col'.$numcol.'->setAlineacionContenido(Columna::CENTRO);');
		eval('$col'.$numcol.'->setNombreCampo("montocalculado");');
        eval('$col'.$numcol.'->setHTML("size=15 readonly=true");');
        eval('$opciones->addColumna($col'.$numcol.');');



		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);



  }


public function executeAjax()
  {

    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($this->getRequestParameter('ajax')=='1')
    {
      $dato=NptipconPeer::getDestipcon($codigo);


  $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
 }


    $cajtexmos1=$this->getRequestParameter('cajtexmos1');
    $codnom=$this->getRequestParameter('codnom');

     if ($this->getRequestParameter('ajax')=='2')
    {
      $dato1=NpnominaPeer::getNomnom($codnom);

      $output = '[["'.$cajtexmos1.'","'.$dato1.'",""]]';
    }

   $fecha=$this->getRequestParameter('fecha');
   $fechaaux=split("/",$fecha);
   $contrato=$this->getRequestParameter('contrato');
   $nomina=$this->getRequestParameter('nomina');
   $javascript='';
   if ($this->getRequestParameter('ajax')=='3')
    {
    	if(count($fechaaux)==2)
    	{
    		if($fechaaux[0]<01 or $fechaaux[0]>12 or $fechaaux[1]<1900 or $fechaaux[1]>2500)
	    	{
				$javascript="$('npsalint_periodo').focus();";
				$javascript.="alert ('Periodo Invalido');";
		        $this->configGrid('', '', '');
		        $output = '[["javascript","'.$javascript.'",""]]';
	    	}
	    	else
	    	{
	    		$c= new Criteria();
			    $c->add(NpasiprePeer::CODCON,$contrato,Criteria::EQUAL);
			    $per= NpasiprePeer::doSelect($c);
		         if ($per){
		         	$this->configGrid($fecha, $contrato, $nomina);
		         	$output = '[["","",""]]';
		         }
		         else {
		         	$javascript="alert ('No hay asignaciones asociadas a ese contrato')";
		         	$this->configGrid('', '', '');
		        	$output = '[["javascript","'.$javascript.'",""]]';
		         }
	    	}
    	}else
    	{
    		$javascript="$('npsalint_periodo').focus();";
    		$javascript.="alert ('Periodo Invalido')";
	        $this->configGrid('', '', '');
		    $output = '[["javascript","'.$javascript.'",""]]';
    	}


    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }

  public function saveNpsalint($Npsalint)
  {

        $grid = Herramientas::CargarDatosGrid($this,$this->obj,true);
        Nomina::salvarNpsalint($Npsalint, $grid);
        return -1;
  }

  protected function updateNpsalintFromRequest()
  {
    $npsalint = $this->getRequestParameter('npsalint');

    if (isset($npsalint['codcon']))
    {
      $this->npsalint->setCodcon($npsalint['codcon']);
    }
    if (isset($npsalint['destipcon']))
    {
      $this->npsalint->setDestipcon($npsalint['destipcon']);
    }
    if (isset($npsalint['codnomasi']))
    {
      $this->npsalint->setCodnomasi($npsalint['codnomasi']);
    }
    if (isset($npsalint['nomnom']))
    {
      $this->npsalint->setNomnom($npsalint['nomnom']);
    }

    if (isset($npsalint['periodo']))
    {
     if ($npsalint['periodo'])
      {
          $this->npsalint->setPeriodo($npsalint['periodo']);
          $fecha= $npsalint['periodo'];
          $dia = '01';
		  $mes = substr($fecha, 0, 2);
		  $ano = substr($fecha, 3, 4);
		  $fechaini =  $ano.'-'.$mes.'-'.$dia;
		  $fecha2= $dia.'-'.$mes.'-'.$ano;
          $this->npsalint->setFecinicon($fechaini);
          $fechafin='';
      	  $fe=$this->npsalint->getFecinicon();
		  $sql= "select last_day('$fe');";
	      H::BuscarDatos($sql,$fechafin);
	      $fecha= $fechafin[0]['last_day'];
          $this->npsalint->setFecfincon($fecha);
      }
      else
      {
          $this->npsalint->setFecinicon(null);
          $this->npsalint->setFecfincon(null);
      }
    }
  }

  public function deleteNpsalint($Npsalint)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteNpsalint($Npsalint);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }

  }

  public function validateEdit()
  {
    $resp=-1;
    $this->npsalint = $this->getNpsalintOrCreate();
    $this->updateNpsalintFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST){
      if($resp!=-1){
        $this->coderr = $resp;
        return false;
      } else return true;

    }else return true;



  }

  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    //Colocar la Primera letra en minuscula
    $this->Npsalint= $this->getNpsalintOrCreate();
    $this->updateNpsalintFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->configGrid($this->npsalint->getPeriodo(),$this->npsalint->getCodCon(),$this->npsalint->getCodNomasi());
      $grid = Herramientas::CargarDatosGrid($this,$this->obj,true);
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }


 public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npsalint/filters');

    // pager
    $this->pager = new sfPropelPager('Npsalint', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();

    /* Filtrar */
    $c->addSelectColumn(NpsalintPeer::CODCON);
    $c->addSelectColumn("'' AS CODEMP");
    $c->addSelectColumn("'' AS CODASI");
    $c->addSelectColumn("0 AS MONASI");
    $c->addSelectColumn("'yyyy-mm-dd' AS FECINICON");
    $c->addSelectColumn("'yyyy-mm-dd' AS FECFINCON");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(NpsalintPeer::CODCON);



  }







}