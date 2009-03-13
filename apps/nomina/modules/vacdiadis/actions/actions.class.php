<?php

/**
 * vacdiadis actions.
 *
 * @package    siga
 * @subpackage vacdiadis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacdiadisActions extends autovacdiadisActions
{ private static $coderror=-1;

public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/Npvacdiadis/filters');

    // pager
    $this->pager = new sfPropelPager('Npvacdiadis', 10);
    $c = new Criteria();
    $c->addSelectColumn("'' AS RANGODESDE");
    $c->addSelectColumn("'' AS RANGOHASTA");
    $c->addSelectColumn("'' AS DIADIS");
    $c->addSelectColumn(NpvacdiadisPeer::CODNOM);
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(NpvacdiadisPeer::CODNOM);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }



protected function getNpvacdiadisOrCreate($id = 'id')
  {

    if (!$this->getRequestParameter($id))
    { $this->configGrid($this->getRequestParameter('npvacdiadis[codnom]'));
      $npvacdiadis = new Npvacdiadis();
    }
    else
    {
      $npvacdiadis = NpvacdiadisPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($npvacdiadis->getCodnom());
      $this->forward404Unless($npvacdiadis);
    }

    return $npvacdiadis;
  }

public function executeAjax()

	{
	     $this->mensaje="";
	     $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	    	if ($this->getRequestParameter('codigo')<>'')
	    	{
	    		$x=Herramientas::getX_vacio('codnom','Npvacdiadis','codnom',$this->getRequestParameter('codigo'));

     	    if (trim($x)=="")
	        {

			}
			    else
	          	{
	          		$this->mensaje="Ya existe información asociada a esta nomina";
	          	}

	        }
	          else
	          	{

	          	}


	    	}

	  $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	}



protected function saveNpvacdiadis($npvacdiadis)


 {
    $coderr = -1;

    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $coderr = EmpleadosBanco::Grabar_grid_Vacdiadis($this->getRequestParameter('npvacdiadis[codnom]'),$grid);

	    	 $this->coderror=$coderr;

         return $this->coderror;

  }



  public function handleErrorEdit()
 {
    $this->preExecute();
    $this->npvacdiadis = $this->getNpvacdiadisOrCreate();


   try{
     $this->updateNpvacdiadisFromRequest();
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

 public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->npvacdiadis = $this->getNpvacdiadisOrCreate();

       $this->updateNpvacdiadisFromRequest();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj);
       // print "<pre>";
       // print_r ($grid);
        self::$coderror=EmpleadosBanco::Validar_Vacdiadis($grid,$this->getRequestParameter('npvacdiadis[codnom]'));
         // $coderror2=EmpleadosBanco::Validar_Vacdiasbonovac_datos($grid);
         // print self::$coderror;exit;
        if ((self::$coderror==-1))
        {
          self::$coderror=EmpleadosBanco::Validar_Vacdidis_datos($grid);
          if ((self::$coderror<>-1))
             {
                return false;
             }else return true;

        }else return false;

      }else return true;
    }



   public function executeEdit()
  {
    $this->npvacdiadis = $this->getNpvacdiadisOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
     $this->updateNpvacdiadisFromRequest();

     if ($this->saveNpvacdiadis($this->npvacdiadis)==-1)
      {
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vacdiadis/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vacdiadis/list');
      }
      else
      {
        return $this->redirect('vacdiadis/edit');
      }
    }
    else
    {
    	      $this->labels = $this->getLabels();
	          $err = Herramientas::obtenerMensajeError($this->coderror);
         	  $this->getRequest()->setError('',$err);
	          return sfView::SUCCESS;
    }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npvacdiadis[codnom]'));
      }
  }

public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(NpvacdiadisPeer::CODNOM,$codigo);
    $c->addAscendingOrderByColumn(NpvacdiadisPeer::RANGODESDE);
    $per = NpvacdiadisPeer::doSelect($c);

    $filas_arreglo=30;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npvacdiadis');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Rango Desde (Años De Antiguedad >= )');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('rangodesde');
    $col1->setJScript('onBlur=validarEntero(this.id)');
    $col1->setHTML('type="text" size="10" readonly=false');

    $col2 = new Columna('Rango Hasta (Años De Antiguedad <= )');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setJScript('onBlur=validarEntero(this.id)');
    $col2->setNombreCampo('rangohasta');
    $col2->setHTML('type="text" size="30" readonly=false');

    $col3 = new Columna('Dias De Disfrute');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setJScript('onBlur=validarEntero(this.id)');
    $col3->setNombreCampo('diadis');
    $col3->setHTML('type="text" size="5" readonly=false');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $this->obj = $opciones->getConfig($per);
 //   print "<pre>";
 //   print_r ($per);exit;


  }



}
