<?php

/**
 * presnomdefpre actions.
 *
 * @package    siga
 * @subpackage presnomdefpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomdefpreActions extends autopresnomdefpreActions
{

 private static $coderror=-1;

 private static $valor='';


public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdefpreliq/filters');

    // pager
    $this->pager = new sfPropelPager('Npdefpreliq', 5);
    $c = new Criteria();
    $c->addSelectColumn(NpdefpreliqPeer::CODNOM);
    $c->addSelectColumn(NpdefpreliqPeer::CODCON);
    $c->addSelectColumn("'' AS PERDES");
    $c->addSelectColumn("'' AS PERHAS");
    $c->addSelectColumn("'' AS CODPAR");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(NpdefpreliqPeer::CODNOM);
    $c->addGroupByColumn(NpdefpreliqPeer::CODCON);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

 protected function updateNpdefpreliqFromRequest()
  {
    $this->listaconceptos= Constantes::ListaConceptos();

    $npdefpreliq = $this->getRequestParameter('npdefpreliq');

    if (isset($npdefpreliq['codnom']))
    {
      $this->npdefpreliq->setCodnom($npdefpreliq['codnom']);
    }
    if (isset($npdefpreliq['nomnom']))
    {
      $this->npdefpreliq->setNomnom($npdefpreliq['nomnom']);
    }
  }

    public function executeEdit()

	  {
	    $this->listaconceptos= Constantes::ListaConceptos();

	    $this->npdefpreliq = $this->getNpdefpreliqOrCreate();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateNpdefpreliqFromRequest();

	      $this->saveNpdefpreliq($this->npdefpreliq);

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('presnomdefpre/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('presnomdefpre/list');
	      }
	      else
	      {
	        return $this->redirect('presnomdefpre/edit');
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }

  }

protected function getNpdefpreliqOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npdefpreliq = new Npdefpreliq();

      $this->configGrid();
    }
    else
    {

      $npdefpreliq = NpdefpreliqPeer::retrieveByPk($this->getRequestParameter($id));

 //    print $npdefpreliq->getCodnom();print $npdefpreliq->getCodnom();exit;

      $this->configGrid($npdefpreliq->getCodnom(),$npdefpreliq->getCodcon());

      $this->valor=$npdefpreliq->getCodcon();

      $this->forward404Unless($npdefpreliq);
    }

    return $npdefpreliq;
  }


  public function configGrid($codigo='',$concepto='')

  {
  	       $c = new Criteria();
   		   $c->add(NpdefpreliqPeer::CODNOM,$codigo);
           $c->add(NpdefpreliqPeer::CODCON,$concepto);
           $per = NpdefpreliqPeer::doSelect($c);



    $filas_arreglo=10;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npdefpreliq');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período Desde');
    $col1->setTipo(Columna::FECHA);
    $col1->setEsGrabable(true);
    $col1->setVacia(true);
    $col1->setNombreCampo('perdes');
    $col1->setHTML('type="text" size="10" readonly=false');

    $col2 = new Columna('Período Hasta');
    $col2->setTipo(Columna::FECHA);
    $col2->setEsGrabable(true);
    $col2->setVacia(true);
    $col2->setNombreCampo('perhas');
    $col2->setHTML('type="text" size="10" readonly=false');

    $obja=array('codpar'=> 3, 'nompar' => 4);
    $col3 = new Columna('Codigo De Partida');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setCatalogo('Nppartidas','sf_admin_edit_form',$obja,'Nppartidas_Prenondespre');
    $col3->setNombreCampo('codpar');
    $col3->setAjax('presnomdefpre',2,4);
    $col3->setHTML('type="text" size="30" ');

    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nompar');
    $col4->setHTML('type="text" size="30" readonly=false');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $this->obj = $opciones->getConfig($per);
 //   print "<pre>";
 //   print_r ($per);exit;


  }

public function executeAjax()

	{
	      $this->mensaje="";
	      $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {

	    		     $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
 				     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  	                 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

		}
		elseif($this->getRequestParameter('ajax')=='2')
        	{
				 $dato=Herramientas::getX_vacio('codpar','nppartidas','nompar',$this->getRequestParameter('codigo'));
				if(!empty($dato))
				{
					$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
				}else
				{
					$js="$('$cajtexcom').value='';";
					$js.="$('$cajtexcom').focus();";
					$js.="alert('Partida no existe');";
					$output = '[["javascript","'.$js.'",""]]';
				}

		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			 	return sfView::HEADER_ONLY;
        	}
        else
        	{
        		$c = new Criteria();
                $c->add(NpdefpreliqPeer::CODNOM,$this->getRequestParameter('cajtexcom1'));
                $c->add(NpdefpreliqPeer::CODCON,$this->getRequestParameter('cod'));
                $per = NpdefpreliqPeer::doSelectone($c);
        		if ($per)
        		   {
        		  	$this->mensaje="Ya existe informacion Asociada a esta nomina con este mismo concepto";
        		   }
        	}
	}


  public function saveNpdefpreliq($Npdefpreliq)
  {

         $grid=Herramientas::CargarDatosGrid($this,$this->obj);

	   if ($this->valor=='')
  		{
	      EmpleadosBanco::Grabar_grid_Presnomdefpre($this->getRequestParameter('npdefpreliq[codnom]'),$this->getRequestParameter('npdefpreliq[codcon]'),$grid);
	    }
  		else
  		  {
  		  	 EmpleadosBanco::Grabar_grid_Presnomdefpre($this->getRequestParameter('npdefpreliq[codnom]'),$this->valor,$grid);
  		  }

  }

  public function deleteNpdefpreliq($Npdefpreliq)
  {

    $coderr = -1;
    $codigo= $Npdefpreliq->getCodnom();
    $concepto= $Npdefpreliq->getCodcon();
    $c = new Criteria();
   	$c->add(NpdefpreliqPeer::CODNOM,$codigo);
    $c->add(NpdefpreliqPeer::CODCON,$concepto);
    $per = NpdefpreliqPeer::doDelete($c);
    $Npdefpreliq->delete();


/*
    //habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteNpdefpreliq($Npdefpreliq);

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

    }*/

  }

  public function handleErrorEdit()
 {
    $this->preExecute();
    $this->npdefpreliq = $this->getNpdefpreliqOrCreate();


   try{
     $this->updateNpdefpreliqFromRequest();
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
       $this->npdefpreliq = $this->getNpdefpreliqOrCreate();

       $this->updateNpdefpreliqFromRequest();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj);


        self::$coderror=EmpleadosBanco::Npdefpreliq_ValRegCompleto($grid);

        if ((self::$coderror==-1))
        {
      $x= $grid[0];
	  $j=0;
	  $s=0;
	  $a=0;
	  $encontrado=false;

     while ($s<count($x) and !$encontrado){
     	$cp= $x[$s]->getCodpar();
        $j=0;

	  while ($j<count($x))
	  {
	  $a=0;
      $j= $j+$s;
      $a= $j+1;

      if ($a>=count($x)){
        break;}
       else{

        $v= $x[$a]->getCodpar();
  	  if ($cp == $v )
	   {
	   	 self::$coderror= 429;
	   	 $encontrado=true;

	   	break;

	   }
      else
        {   self::$coderror=-1;

        }

		$j++;
	  }}
	  $s++;}


        }


        if ((self::$coderror==-1))
        {
           self::$coderror=EmpleadosBanco::Validar_Npdefpreliq_datos($grid);

	        if ((self::$coderror==-1))
	        {
	        	self::$coderror=EmpleadosBanco::Validar_Npdefpreliq($grid,$this->getRequestParameter('npdefpreliq[codnom]'));

	           if ((self::$coderror==-1))
	             {
	                return true;
	             }else return false;

             }else return false;

        }else return false;

      }else return true;

    }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function ActualizarGrid()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);

  }

}
