<?php

/**
 * presnomregsalintind actions.
 *
 * @package    Roraima
 * @subpackage presnomregsalintind
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomregsalintindActions extends autopresnomregsalintindActions
{
  protected $coderr = -1;
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npsalint = $this->getNpsalintOrCreate();

    $this->updateNpsalintFromRequest();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $fechacal=date("d/m/Y",strtotime($this->npsalint->getFeccal()));
      $this->configGrid($this->npsalint->getCodemp(),$this->npsalint->getCodCon(),$this->npsalint->getCodNom(),$fechacal);
      $this->updateNpsalintFromRequest();

      $this->saveNpsalint($this->npsalint);


      $this->setFlash('notice', 'Your modifications have been saved');
	$id= $this->npsalint->getId();
         $this->SalvarBitacora($id ,'Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomregsalintind/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomregsalintind/list');
      }
      else
      {
        return $this->redirect('presnomregsalintind/edit');
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


 /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp='',$contrato='', $nomina='', $fecing='')
  {
         $this->fecha = $fecing;
 		 $this->contrato = $contrato;
         $this->nomina = $nomina;
         $this->codemp = $codemp;


         $arrfechafin=array();
         $per = array();
         $arr_codasi=array();
         $sqlCodAsi="Select codasi ,desasi from Npasipre where codcon='$this->contrato' order by codasi";
         H::BuscarDatos($sqlCodAsi,$arr_codasi);

         if ($this->fecha)
         {

	      $dia = '01';
		  $mes = substr($this->fecha, 3, 2);
		  $ano = substr($this->fecha, 6, 4);
		  $fechaini =  $ano.'-'.$mes.'-'.$dia;

       	  $fechainifor=date("d/m/Y",strtotime($fechaini));


          $sql= "select last_day('$fechaini');";
	      H::BuscarDatos($sql,$arrfechafin);
	      $fechafin= $arrfechafin[0]['last_day'];
          $fechafinfor=date("d/m/Y",strtotime($fechafin));

          $i=0;
          $continuar=true;
          while ($continuar)
		  {
			$c= new Criteria();
		    $c->add(NpsalintPeer::FECINICON, $fechaini,Criteria::GREATER_EQUAL);
		    $c->add(NpsalintPeer::FECFINCON, $fechafin,Criteria::LESS_EQUAL);
		    $c->add(NpsalintPeer::CODCON, $this->contrato,Criteria::EQUAL);
		    $c->add(NpsalintPeer::CODEMP, $this->codemp,Criteria::EQUAL);
		    $con= NpsalintPeer::doSelect($c);
			if ($con)
			{
			  $cont=0;
			  $montoacum=0;
			  $arr_data=array();
			  foreach ($con as $datos) {
			  	if ($cont==0)
			  	{
					$arr_data['fecinicon']=$fechainifor;
					$arr_data['fecfincon']=$fechafinfor;
					$arr_data['id']=$i;
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
				$data=array();	
		        $sql="SELECT SUM(CASE WHEN C.OPECON='A' THEN A.MONTO ELSE A.MONTO*-1 END) as monto, B.CODASI as codasi
						FROM NPHISCON A left outer join nppernom e on 
						(
						 a.codnom=e.codnom and e.mes=to_char(TO_DATE('$fechainifor','DD/MM/YYYY'),'mm') and 
						 e.anno=to_char(TO_DATE('$fechainifor','DD/MM/YYYY'),'yyyy')::numeric
						)
						,NPCONASI B,NPDEFCPT C,NPASINOMCONT D
						WHERE A.CODEMP='$this->codemp'
						AND a.FecNom  >= (case when e.fecini is not null then e.fecini else  TO_DATE('$fechainifor','DD/MM/YYYY') end) 
						AND a.FecNom  <= (case when e.fecfin is not null then e.fecfin else  TO_DATE('$fechafinfor','DD/MM/YYYY') end) 
						AND A.CODNOM=D.CODNOM
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
						$arr_data['fecinicon']=$fechainifor;
						$arr_data['fecfincon']=$fechafinfor;
						$arr_data['id']=$i;
				  	 }//if ($cont==0)
					$arr_data[$data[$m]['codasi']]=number_format($data[$m]['monto'],2,',','.');
					$montoacum=$montoacum+$data[$m]['monto'];
					$m++;
				   }//while ($m< count($data))
	               $arr_data['montocalculado']=number_format($montoacum,2,',','.');
	               $per[] = $arr_data;
			     }
			     else//if $data
			     {      $arr_data=array();
			     	   	$arr_data['fecinicon']=$fechainifor;
					    $arr_data['fecfincon']=$fechafinfor;
					    $arr_data['id']=$i;
					    $arr_data['montocalculado']=number_format(0,2,',','.');
					    $per[] = $arr_data;
			     }
   	         }//else if ($con)
   	         //calcular la siguiente Fecha, mes siguiente
   	        $fechaini = Herramientas::dateAdd('d',1,$fechafin,'+');
   	        $fechainifor=date("d/m/Y",strtotime($fechaini));

   	        $sql= "select last_day('$fechaini');";
	      	H::BuscarDatos($sql,$arrfechafin);
	      	$fechafin= $arrfechafin[0]['last_day'];
          	$fechafinfor=date("d/m/Y",strtotime($fechafin));
			$fechaactual=date("Y-m-d");
			
			$sqlfec="select max(fecnom) as fecmax from nphiscon where codemp='$this->codemp' and codnom='$this->nomina' and especial='N'";
			H::BuscarDatos($sqlfec,$datafec);
			if($datafec)
				$fechamaxnphiscon = $datafec[0]['fecmax'];
			else
				$fechamaxnphiscon = date("Y-m-d");
			
			if(strtotime($fechamaxnphiscon)>strtotime($fechaactual))	
				$fechaactual=$fechamaxnphiscon;			
			
   	        if (strtotime($fechafin)>strtotime($fechaactual))
   	        {
  	           $continuar=false;
   	        }
            $i++;

			}	// while ($continuar)
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

        $col1 = new Columna('Fecha Desde');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('fecinicon');
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Fecha Hasta');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('fecfincon');
		$col2->setHTML('type="text" size="10" readonly=true');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

        //agregar las columnas dinamicas correspondientes al
        //grupo de asignaciones por contrato
        $h=0;
		while ($h<count($arr_codasi))
		{
			$numcol=3+$h;
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
	    $numcol=3+$h;
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

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    $javascript="";
    if ($this->getRequestParameter('ajax')=='1')
    {
       $dato=NptipconPeer::getDestipcon($codigo);
       if ($dato=="") {$javascript="alert('Tipo de Contrato no Existe');$('".$cajtexmos ."').value='';$('npsalint_codnom').value='';$('npsalint_nomnom').value='';$('npsalint_codemp').value='';$('npsalint_nomemp').value='';$('npsalint_feccal').value=''";}
 	   $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       $this->configGrid();
    }



    if ($this->getRequestParameter('ajax')=='2')
    {
      $cajtexmos1=$this->getRequestParameter('cajtexmos1');
      $codnom=$this->getRequestParameter('codnom');
      $codcon=$this->getRequestParameter('codcon');
      $dato1=NpnominaPeer::getNomnom($codnom);
      if ($dato1=="")
      {
        $javascript="alert('Nómina no Existe');$('npsalint_codnom').value='';$('npsalint_nomnom').value='';$('npsalint_codemp').value='';$('npsalint_nomemp').value='';$('npsalint_feccal').value=''";
      }
      else
      {
	     $c= new Criteria();
	     $c->add(NpasiempcontPeer::CODNOM,$codnom);
	     $c->add(NpasiempcontPeer::CODTIPCON,$codcon);
	     $datos=NpasiempcontPeer::doSelectOne($c);
	     if (!$datos)
	     {
			$javascript="alert('La nomina no esta asociada al contrato seleccionado');$('npsalint_codnom').value='';$('npsalint_nomnom').value='';$('npsalint_codemp').value='';$('npsalint_nomemp').value='';$('npsalint_feccal').value=''";
	     }
      }
      $this->configGrid();
      $output = '[["'.$cajtexmos1.'","'.$dato1.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }



     if ($this->getRequestParameter('ajax')=='3')
     {
       $cajtexmosnom='npsalint_nomemp';
       $cajtexmosfec='npsalint_feccal';
       $codemp=$this->getRequestParameter('codemp');
       $codcon=$this->getRequestParameter('codcon');
       $codnom=$this->getRequestParameter('codnom');
       $fecha='';
       $nombre='';


        $c= new Criteria();
	    $c->add(NpasiempcontPeer::CODEMP,$codemp,Criteria::EQUAL);
	    $k= NpasiempcontPeer::doSelectOne($c);
		if ($k)
		{
              $fecha=date("d/m/Y",strtotime($k->getFeccal()));;
              $nombre=NpasiempcontPeer::getNomemp($codemp);
		}
		else
			  $javascript="alert('El empleado no esta asignado a ese contrato');$('npsalint_codemp').value='';$('npsalint_nomemp').value='';$('npsalint_feccal').value=''";

    	$this->configGrid($codemp,$codcon, $codnom, $fecha);
    	$output = '[["'.$cajtexmosfec.'","'.$fecha.'",""], ["'.$cajtexmosnom.'","'.$nombre.'",""],["javascript","'.$javascript.'",""] ]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }
   }


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    //Colocar la Primera letra en minuscula
    $this->Npsalint= $this->getNpsalintOrCreate();
    $this->updateNpsalintFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $fechacal=date("d/m/Y",strtotime($this->npsalint->getFeccal()));
      $this->configGrid($this->npsalint->getCodemp(),$this->npsalint->getCodCon(),$this->npsalint->getCodNom(),$fechacal);
      $grid = Herramientas::CargarDatosGrid($this,$this->obj,true);
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }
    /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  public function saveNpsalint($Npsalint)
  {
        $grid = Herramientas::CargarDatosGrid($this,$this->obj, true);
        Nomina::salvarNpsalintind($Npsalint, $grid);


  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

   /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
   {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npsalint/filters');

    // pager
    $this->pager = new sfPropelPager('Npsalint', 5);
    $c = new Criteria();

	$c->addSelectColumn(NpsalintPeer::CODCON);
    $c->addSelectColumn(NpsalintPeer::CODEMP);
    $c->addSelectColumn("0 AS CODASI");
    $c->addSelectColumn("0 AS MONASI");
    $c->addSelectColumn("'1937-01-01' as FECINICON");
    $c->addSelectColumn("'1937-01-01' as FECFINCON");
    $c->addSelectColumn("0 AS ID");

	$c->addGroupByColumn(NpsalintPeer::CODCON);
	$c->addGroupByColumn(NpsalintPeer::CODEMP);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getNpsalintOrCreate($codemp = 'codemp',$codcon = 'codcon')
  {
    if (!$this->getRequestParameter($codemp))
    {
      $npsalint = new Npsalint();
      $this->configGrid();
    }
    else
    {
      //$npsalint = NpsalintPeer::retrieveByPk($this->getRequestParameter($id));

      $c= new Criteria();
	  $c->add(NpsalintPeer::CODCON, $this->getRequestParameter($codcon));
	  $c->add(NpsalintPeer::CODEMP, $this->getRequestParameter($codemp));
	  $npsalint= NpsalintPeer::doSelectOne($c);
	  //obtener fecha de calulo
	   $c= new Criteria();
	   $c->add(NpasiempcontPeer::CODEMP,$this->getRequestParameter($codemp));
	   $k= NpasiempcontPeer::doSelectOne($c);
	   if ($k)
	   {
	     $fechacal=date("d/m/Y",strtotime($k->getFeccal()));
	     $npsalint->setFeccal($k->getFeccal());
	   }


      $this->configGrid($npsalint->getCodemp(),$npsalint->getCodCon(),$npsalint->getCodNom(),$fechacal);
      $this->forward404Unless($npsalint);
    }

    return $npsalint;
  }

    /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npsalint = NpsalintPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npsalint);

    try
    {
      //$this->deleteNpsalint($this->npsalint);
      $c = new Criteria();
      $c->add(NpsalintPeer::CODEMP,$this->npsalint->getCodemp());
      $rs = NpsalintPeer::doDelete($c);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar el registro');
      return $this->forward('presnomregsalintind', 'list');
    }

    return $this->redirect('presnomregsalintind/list');
  }
}
