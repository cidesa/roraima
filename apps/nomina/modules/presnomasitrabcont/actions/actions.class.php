<?php

/**
 * presnomasitrabcont actions.
 *
 * @package    siga
 * @subpackage presnomasitrabcont
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomasitrabcontActions extends autopresnomasitrabcontActions
{

  private static $coderror=-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasiempcont/filters');

    // pager
    $this->pager = new sfPropelPager('Npasiempcont', 5);
    $c = new Criteria();
	$c->addSelectColumn(NpasiempcontPeer::CODTIPCON);
    $c->addSelectColumn("'' AS CODNOM");
    $c->addSelectColumn("'' AS CODEMP");
    $c->addSelectColumn("'' AS NOMEMP");
    $c->addSelectColumn("'yyyy/mm/dd' AS FECCAL");
    $c->addSelectColumn("max(ID) AS ID");
    $c->addGroupByColumn(NpasiempcontPeer::CODTIPCON);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  protected function updateNpasiempcontFromRequest()
  {
    $npasiempcont = $this->getRequestParameter('npasiempcont');

    if (isset($npasiempcont['codtipcon']))
    {
      $this->npasiempcont->setCodtipcon($npasiempcont['codtipcon']);
    }
    if (isset($npasiempcont['destipcon']))
    {
      $this->npasiempcont->setDestipcon($npasiempcont['destipcon']);
    }
  }

  protected function getNpasiempcontOrCreate($id = 'id')
  {

    if (!$this->getRequestParameter($id))
    {
      $this->configGrid($this->getRequestParameter('npasiempcont[codtipcon]'));

      $npasiempcont = new Npasiempcont();
    }
    else
    {
      $npasiempcont = NpasiempcontPeer::retrieveByPk($this->getRequestParameter($id));

      /*$sql ="Select CODEMP From NPASIEMPCONT  Where CODTIPCON = '".$npasiempcont->getCodtipcon()."' order by codemp";*/

      /*$resp = Herramientas::BuscarDatos($sql,&$per1);*/

      /*$sql="SELECT a.CodEmp FROM NpNomina c,Nphojint a, Npasicaremp  b
	  		where c.codnom=b.codnom and a.codEmp=b.codEmp and b.status='V' and c.codnom in (select codnom from npasinomcont where codtipcon='".$npasiempcont->getCodtipcon()."') order by b.codNom,a.CodEmp";*/
	  //$resp2 = Herramientas::BuscarDatos($sql,&$per);

		/* $sql="select z.* from
				(select  codemp,c.codtipcon,a.codnom from npasicaremp a, npasinomcont c
				where  c.codnom=a.codnom ) z
				left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
				where x.codemp is null
				and z.codtipcon='".$npasiempcont->getCodtipcon()."'";
		$resp = Herramientas::BuscarDatos($sql,&$per1);

	 if (!$per1)
     {
     	$this->configGrid($npasiempcont->getCodtipcon());
     }
	 else
	 {
	 	$this->mensaje="Hay Trabajadores nuevos asignados a este contrato, guarde para actualizar";
	    $this->configGrid($npasiempcont->getCodtipcon());
	 }*/
	  $this->configGrid($npasiempcont->getCodtipcon());
      $this->forward404Unless($npasiempcont);
    }

    return $npasiempcont;
  }

public function configGrid2($codigo='')
  {
	$sql="select z.CodEmp,z.Nomemp,z.fecing as feccal,z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp and a.status='V') z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where z.codtipcon='".$codigo."'";

    $resp = Herramientas::BuscarDatos($sql,&$per);

    $filas_arreglo=100;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npasiempcont');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $params = array("'+$('npasiempcont_codtipcon').value+'",'val2');
    $obj2=array('codnom'=> 1, 'nomnom' => 2);
    $col1 = new Columna('Codigo De Nomina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::IZQUIERDA);
    $col1->setAlineacionContenido(Columna::IZQUIERDA);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codnom');
    $col1->setCatalogo('Npnomina','sf_admin_edit_form',$obj2,'Presnomasitrabcont_Npnomina',$params);
    $col1->setHTML('type="text" size="10" readonly=false');
    $col1->setAjax('presnomasitrabcont',4,2);

    $col2 = new Columna('Tipo De Nomina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomnom');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="30"');

    $params1 = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val3');
    $obj3=array('codemp'=> 3, 'nomemp' => 4 , 'fecing' => 5);
    $col3 = new Columna('Codigo Del Empleado');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codemp');
    $col3->setCatalogo('Nphojint','sf_admin_edit_form',$obj3,'Presnomasitrabcont_Npasiempcont',$params1);
    $col3->setHTML('type="text" size="10" readonly=false');

    $col4 = new Columna('Nombre Del Empleado');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
   // $col4->setJScript('onBlur=validarEntero(this.id)');
    $col4->setNombreCampo('nomemp');
    $col4->setHTML('type="text" size="30" readonly=false');

    $col5 = new Columna('Fecha de Ingreso');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('feccal');
    $col5->setHTML('type="text" size="10" readonly=false');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $this->obj = $opciones->getConfig($per);
//    print "<pre>";
//    print_r ($per);exit;


  }

public function configGrid($codigo='')
  {
    //print $codigo;
    //$sql ="Select a.CODTIPCON,a.CODNOM,a.CODEMP,a.NOMEMP,a.FECCAL,b.NOMNOM, 9 as id  From NPNOMINA b,NPASIEMPCONT a Where a.CODNOM=b.Codnom and  CODTIPCON = '".$codigo."' order by codemp";
	$sql="select '1' as check,z.CODTIPCON,z.CodEmp,z.Nomemp,z.fecing as feccal,z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp) z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where x.codtipcon is not null and z.codtipcon='".$codigo."'
		  union all
		  select '0' as check,z.CODTIPCON,z.CodEmp,z.Nomemp,z.fecing as feccal,z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp) z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where x.codtipcon is null and z.codtipcon='".$codigo."'";

    $resp = Herramientas::BuscarDatos($sql,&$per);
	$this->totfil=count($per);
    $filas_arreglo=100;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setFilas(0);
    $opciones->setTabla('Npasiempcont');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col0 = new Columna('Marque');
    $col0->setTipo(Columna::CHECK);
    $col0->setEsGrabable(true);
    $col0->setNombreCampo('check');
    $col0->setHTML(' ');


    $col1 = new Columna('Codigo De Nomina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::IZQUIERDA);
    $col1->setAlineacionContenido(Columna::IZQUIERDA);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codnom');
    $col1->setHTML('type="text" size="10" readonly=true');

    $col2 = new Columna('Tipo De Nomina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomnom');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="30" readonly=true ');

    $col3 = new Columna('Codigo Del Empleado');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codemp');
    $col3->setHTML('type="text" size="10" readonly=true');

    $col4 = new Columna('Nombre Del Empleado');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nomemp');
    $col4->setHTML('type="text" size="30" readonly=true');

    $col5 = new Columna('Fecha de Ingreso');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('feccal');
    $col5->setHTML('type="text" size="10" readonly=true');

	$opciones->addColumna($col0);
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $this->obj = $opciones->getConfig($per);
	//print "<pre>";
    //print_r ($this->obj);


  }

public function executeAjax()

	{
		  $js='';
		  $output='';
		  $dato="";
	      $this->mensaje="";
	      $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
		    	if (trim($this->getRequestParameter('codigo'))<>'')
		    	{
		    		 $c = new Criteria();
		    		 $c->Add(NpasiempcontPeer::CODTIPCON,$this->getRequestParameter('codigo'));
		    		 $obj = NpasiempcontPeer::doSelect($c);
		    		 if(!$obj)
		    		 {
		    		 	$dato=Herramientas::getX('codtipcon','nptipcon','destipcon',$this->getRequestParameter('codigo'));
			    		 /*$sql ="Select CODEMP From NPASIEMPCONT  Where CODTIPCON = '".$npasiempcont->getCodtipcon()."' order by codemp";*/

					      /*$resp = Herramientas::BuscarDatos($sql,&$per1);*/

					      /*$sql="SELECT a.CodEmp FROM NpNomina c,Nphojint a, Npasicaremp  b
						  		where c.codnom=b.codnom and a.codEmp=b.codEmp and b.status='V' and c.codnom in (select codnom from npasinomcont where codtipcon='".$npasiempcont->getCodtipcon()."') order by b.codNom,a.CodEmp";*/
						  //$resp2 = Herramientas::BuscarDatos($sql,&$per);

						 /*$sql="select z.* from
								(select  codemp,c.codtipcon,a.codnom from npasicaremp a, npasinomcont c
								where  c.codnom=a.codnom ) z
								left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
								where x.codemp is null
								and z.codtipcon='".$this->getRequestParameter('codigo')."'";
						$resp = Herramientas::BuscarDatos($sql,&$per1);
			    		if (!$per1)
		     			{
		                    $this->configGrid($this->getRequestParameter('codigo'));
		                }
			    		else
			    		{
			    			//$this->mensaje="Hay Trabajadores nuevos asignados a este contrato, guarde para actualizar";
			    			$this->configGrid($this->getRequestParameter('codigo'));
			    		}*/
			    		$this->configGrid($this->getRequestParameter('codigo'));
			    		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		    		 }else
		    		 {
		    		 	$js.="$('$cajtexcom').value='';";
		    		 	$js.="alert('Codigo de Contrato ya Registrado');";
		    		 	$js.="$('$cajtexcom').focus();";
		    		 	$this->configGrid();
		    		 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
		    		 }

		       	}
		       	else
		       	{
		       		$this->configGrid();
		       		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

		       	}
			$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			//return sfView::HEADER_ONLY;
	        }

	}

 public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->npasiempcont = $this->getNpasiempcontOrCreate();
        $this->updateNpasiempcontFromRequest();
        $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
        if(count($grid[0])>0)
        	self::$coderror=EmpleadosBanco::Validar_Datos_Npasiempcont($grid);
        else
        	self::$coderror=437;

       if ((self::$coderror<>-1))
        {
                return false;

        }else return true;

      }else return true;
    }


 public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npasiempcont = $this->getNpasiempcontOrCreate();
$this->configGrid($this->getRequestParameter('codigo'));

   try{
     $this->updateNpasiempcontFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }


 public function executeEdit()
  {
  	$this->mensaje="";
    $this->npasiempcont = $this->getNpasiempcontOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasiempcontFromRequest();

      $this->saveNpasiempcont($this->npasiempcont);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomasitrabcont/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomasitrabcont/list');
      }
      else
      {
        return $this->redirect('presnomasitrabcont/edit');
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

protected function saveNpasiempcont($npasiempcont)
  {

    $coderr = -1;

  	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $coderr = EmpleadosBanco::Grabar_grid_Npasiempcont($grid,$npasiempcont);

    $this->coderror=$coderr;

    return $this->coderror;

  }
  public function executeDelete()
  {
    $obj = NpasiempcontPeer::retrieveByPk($this->getRequestParameter('id'));
    $c = new Criteria();
	$c->add(NpasiempcontPeer::CODTIPCON,$obj->getCodtipcon());
	$rs = NpasiempcontPeer::doDelete($c);
	if($rs)
	{
		$this->setFlash('notice','Registro Eliminado exitosamente');
	}else
	{

	}
    return $this->redirect('presnomasitrabcont/edit');

  }

}
