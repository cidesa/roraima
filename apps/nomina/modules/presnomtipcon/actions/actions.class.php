<?php

/**
 * presnomtipcon actions.
 *
 * @package    Roraima
 * @subpackage presnomtipcon
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 38276 2010-05-19 19:30:38Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomtipconActions extends autopresnomtipconActions
{

  public  $coderror1=-1;




  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
 	$this->nptipcon = $this->getNptipconOrCreate();
    $this->updateNptipconFromRequest($alic,$a146,$fid);
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
    	if($fid=='S' && $this->nptipcon->getFecdes()=='' ){
    		$this->coderror1=465;
			return false;
    	}


		$this->configGrid_nomina();
        $grid_detalle=Herramientas::CargarDatosGrid($this,$this->obj_nomina,true);//0
        $grid_nomina=$grid_detalle[0];
        $this->configGrid();
        $grid = Herramientas::CargarDatosGrid($this,$this->obj,true);
        if(empty( $grid[0]))
			$this->coderror1=436;
        if(empty( $grid_nomina))
			$this->coderror1=435;

		$i=0;
    	while ($i<count($grid_nomina))
	    {
	  		$result=array();
			$sql="Select CodNom,CodtipCon From NPASINOMCONT Where CodNom = '".$grid_nomina[$i]['codnom']."' And CodTipCon <> '".$this->nptipcon->getCodtipcon()."'";
			if (Herramientas::BuscarDatos($sql,&$result))
			{
		       if (count($result)>0)
		       {
		       	$this->coderror1=132;
		       	return false;
		       	break;
		       }
			}
		   $i++;
		}

      //return true;

      $x=$grid[0];
	  $j=0;
	  $s=0;
	  while ($s<count($x)){
	  $desde=$x[$s]['desde'];#->getDesde();
	  $hasta=$x[$s]['hasta'];#->getHasta();
     if ($desde > $hasta)
       {
       	$this->coderror1=180;
		       	return false;
		       	break;

       } else if ($x[$s]['anovig'] > $x[$s]['anovighas']) #->getAnovig() > $x[$s]->getAnovighas())
       {
       	$this->coderror1=181;
		       	return false;
		       	break;

       } else
       $s++;
	  }

	  $grid_detalle=Herramientas::CargarDatosGrid($this,$this->obj_nomina,true);
	  $x= $grid_detalle[0];
	  $j=0;
	  $s=0;
	  $a=0;
	  $encontrado=false;

     while ($s<count($x) and !$encontrado){
     	$cp= $x[$s]['codnom'];#->getCodnom();
        $j=0;

	  while ($j<count($x))
	  {
	  $a=0;
      $j= $j+$s;
      $a= $j+1;

      if ($a>=count($x)){
        break;}
       else{

        $v= $x[$a]['codnom'];#->getCodnom();
  	  if ($cp == $v )
	   {
	   	 $this->coderror1= 427;
	   	 $encontrado=true;

	   	break;

	   }
      else
        {   $this->coderror1=-1;

        }

		$j++;
	  }}
	  $s++;}

	$this->configGrid_intereses();
    $grid_int=Herramientas::CargarDatosGridv2($this,$this->obj_intereses);//0
    $z=$grid_int[0];
	$r=0;
	while ($r<count($z))
    {
      if(!$z[$r]->getFecdes())
	  {
	  	$this->coderror1= 463;
	  	break;
	  }
      if(!$z[$r]->getFechas())
	  {
	  	$this->coderror1= 463;
	  	break;
	  }
	  if(!$z[$r]->getTiptas())
	  {
	  	$this->coderror1= 463;
	  	break;
	  }
	  $r++;
	}

	$this->configGrid_antiguedad();
    $grid_ant=Herramientas::CargarDatosGridv2($this,$this->obj_antiguedad);//0
    $y=$grid_ant[0];
	$r=0;
	while ($r<count($y))
    {
      if(!$y[$r]->getFecdes())
	  {
	  	$this->coderror1= 464;
	  	break;
	  }
      if(!$y[$r]->getFechas())
	  {
	  	$this->coderror1= 464;
	  	break;
	  }
	  if(!$y[$r]->getNumdia())
	  {
	  	$this->coderror1= 464;
	  	break;
	  }
	  $r++;
	}



    }else return false;
//print $this->coderror1; exit;
   if ($this->coderror1== -1)
     return true;
     else
     return false;

  }
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
    {
      $this->preExecute();
      $this->nptipcon = $this->getNptipconOrCreate();

      try{
      	$this->updateNptipconFromRequest();
      	}
      catch (Exception $ex){}

	  $this->setVars();

      $this->labels = $this->getLabels();


      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	        if($this->coderror1!=-1)
	        {
	          $err = Herramientas::obtenerMensajeError($this->coderror1);
         	  $this->getRequest()->setError('',$err);
	        }

      }
      return sfView::SUCCESS;
    }



	  protected function getNptipconOrCreate($id = 'id')
	  {
	    if (!$this->getRequestParameter($id))
	    {
	      $nptipcon = new Nptipcon();
				$this->setVars();
				$this->configGrid($this->getRequestParameter('nptipcon[codtipcon]'));
				$this->configGrid_nomina($this->getRequestParameter('nptipcon[codtipcon]'));
				$this->configGrid_intereses($this->getRequestParameter('nptipcon[codtipcon]'));
				$this->configGrid_antiguedad($this->getRequestParameter('nptipcon[codtipcon]'));
	    }
	    else
	    {
	      $nptipcon = NptipconPeer::retrieveByPk($this->getRequestParameter($id));
				$this->setVars();
				$this->configGrid($nptipcon->getCodtipcon());
				$this->configGrid_nomina($nptipcon->getCodtipcon());
				$this->configGrid_intereses($nptipcon->getCodtipcon());
				$this->configGrid_antiguedad($nptipcon->getCodtipcon());
	      $this->forward404Unless($nptipcon);
	    }

	    return $nptipcon;
	  }

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($var='')
	{
		$c = new Criteria();
		$c->add(NpbonocontPeer::CODTIPCON,$var);
		$per = NpbonocontPeer::doSelect($c);
		if (count($per)>0)
			$filas_arreglo=0;
		else
			$filas_arreglo=1;


		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas(100);
		$opciones->setTabla('Npbonocont');
		$opciones->setName('a');
		$opciones->setAnchoGrid(1100);
		$opciones->setTitulo('Alicuota');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Fecha Vig. Desde');
		$col1->setNombreCampo('Anovig');
		$col1->setTipo(Columna::FECHA);
		$col1->setVacia(true);
		$col1->setHTML('');
		$col1->setEsGrabable(true);

		$col2 = new Columna('Fecha Vig. Hasta');
		$col2->setNombreCampo('Anovighas');
		$col2->setTipo(Columna::FECHA);
		$col2->setVacia(true);
		$col2->setHTML('');
		$col2->setEsGrabable(true);

		$col3 = new Columna('Rango Desde >=');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('Desde');
		$col3->setHTML('type="text" size="10"');

		$col4 = new Columna('Rango Hasta <=');
		$col4->setTipo(Columna::TEXTO);
		$col4->setEsGrabable(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('Hasta');
		$col4->setHTML('type="text" size="10"');


		$col5 = new Columna('Dias Utilidades');
		$col5->setTipo(Columna::TEXTO);
		$col5->setEsGrabable(true);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('Diauti');
		$col5->setHTML('type="text" size="10"');

		$col6 = new Columna('Dias Bono Vacac.');
		$col6->setTipo(Columna::TEXTO);
		$col6->setEsGrabable(true);
		$col6->setAlineacionObjeto(Columna::CENTRO);
		$col6->setAlineacionContenido(Columna::CENTRO);
		$col6->setNombreCampo('Diavac');
		$col6->setHTML('type="text" size="10"');

		$col7 = new Columna('Dias Productividad');
		$col7->setTipo(Columna::TEXTO);
		$col7->setEsGrabable(true);
		$col7->setAlineacionObjeto(Columna::CENTRO);
		$col7->setAlineacionContenido(Columna::CENTRO);
		$col7->setNombreCampo('Diapro');
		$col7->setHTML('type="text" size="10"');


		$col8 = new Columna('Incidencia.');
	    $col8->setTipo(Columna::COMBO);
	    $col8->setCombo(Constantes::Contratos_nomina());
	    $col8->setAlineacionObjeto(Columna::DERECHA);
	    $col8->setAlineacionContenido(Columna::DERECHA);
	    $col8->setEsGrabable(true);
	    $col8->setNombreCampo('Calinc');
	    $col8->setHTML(' ');

		$col9 = new Columna('Antiguedad A.P.');
	    $col9->setTipo(Columna::COMBO);
	    $col9->setCombo(Constantes::Contratos_nomina());
	    $col9->setAlineacionObjeto(Columna::DERECHA);
	    $col9->setAlineacionContenido(Columna::DERECHA);
	    $col9->setEsGrabable(true);
	    $col9->setNombreCampo('Antap');
	    $col9->setHTML(' ');

		$col10 = new Columna('A.A.P. Vacaciones');
	    $col10->setTipo(Columna::COMBO);
	    $col10->setCombo(Constantes::Contratos_nomina());
	    $col10->setAlineacionObjeto(Columna::DERECHA);
	    $col10->setAlineacionContenido(Columna::DERECHA);
	    $col10->setEsGrabable(true);
	    $col10->setNombreCampo('Antapvac');
	    $col10->setHTML(' ');

		// Se guardan las columnas en el objetos de opciones
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


		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);

	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_intereses($var='')
	{
		$c = new Criteria();
		$c->add(NpintconPeer::CODCON,$var);
		$per = NpintconPeer::doSelect($c);
		if (count($per)>0)
			$filas_arreglo=0;
		else
			$filas_arreglo=1;


		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas(1);
		$opciones->setTabla('Npintcon');
		$opciones->setName('c');
		$opciones->setAncho(700);
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('Intereses');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Fecha Desde');
		$col1->setNombreCampo('fecdes');
		$col1->setTipo(Columna::FECHA);
		$col1->setVacia(true);
		$col1->setHTML(' ');
		$col1->setEsGrabable(true);

		$col2 = new Columna('Fecha Hasta');
		$col2->setNombreCampo('fechas');
		$col2->setTipo(Columna::FECHA);
		$col2->setVacia(true);
		$col2->setHTML(' ');
		$col2->setEsGrabable(true);

		$col3 = new Columna('Tipo Tasa');
		$col3->setTipo(Columna::COMBO);
		$col3->setCombo(Constantes::Tipo_Intereses());
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('tiptas');
		$col3->setHTML(' ');


		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj_intereses = $opciones->getConfig($per);

	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_antiguedad($var='')
	{
		$c = new Criteria();
		$c->add(NpdiaantperPeer::CODCON,$var);
		$per = NpdiaantperPeer::doSelect($c);
		if (count($per)>0)
			$filas_arreglo=0;
		else
			$filas_arreglo=1;


		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas(1);
		$opciones->setTabla('Npdiaantper');
		$opciones->setName('d');
		$opciones->setAncho(700);
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('Dias por Antiguedad Regimen Antiguo');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Fecha Desde');
		$col1->setNombreCampo('fecdes');
		$col1->setTipo(Columna::FECHA);
		$col1->setVacia(true);
		$col1->setHTML(' ');
		$col1->setEsGrabable(true);

		$col2 = new Columna('Fecha Hasta');
		$col2->setNombreCampo('fechas');
		$col2->setTipo(Columna::FECHA);
		$col2->setVacia(true);
		$col2->setHTML(' ');
		$col2->setEsGrabable(true);

		$col3 = new Columna('Nro. Dias');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('numdia');
		$col3->setHTML('type="text" size="10"');


		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj_antiguedad = $opciones->getConfig($per);

	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_nomina($var='')
	{
		$c = new Criteria();
		$c->add(NpasinomcontPeer::CODTIPCON,$var);
		$per = NpasinomcontPeer::doSelect($c);
		$filas_arreglo=7;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npasinomcont');
		$opciones->setName('b');
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Tipo Nomina');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('Codnom');
		$col1->setHTML('type="text" size="4"');
        $col1->setCatalogo('npnomina','sf_admin_edit_form',array('codnom' => 1,'nomnom' => 2), 'Npnomina_Presnomtipcon');
		//$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);verificar_codigo_repetido(this.id);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
		$col1->setAjax('presnomtipcon',2,2);

		$col2 = new Columna('Descripcion de Nomina');
		$col2->setTipo(Columna::TEXTO);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('Nomnom');
		$col2->setEsGrabable(true);
		$col2->setHTML('type="text" size="105" readonly=true');
		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj_nomina = $opciones->getConfig($per);

	}

	public function setVars()
	{
		$this->listaFrecuenciaPago = array('M'=>'M');
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
  protected function saveNptipcon($nptipcon)
	{
		$alic = ''; $a146 = ''; $fid = '';
		$this->updateNptipconFromRequest($alic,$a146,$fid);

		//<!-----------------------------Grid Arreglos---------------------->
		$grid_alicuota_arreglos=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
		$grid_nomina_arreglos=Herramientas::CargarDatosGrid($this,$this->obj_nomina,true);//1
		$grid_intereses_arreglos=Herramientas::CargarDatosGridv2($this,$this->obj_intereses);//2
		$grid_antiguedad_arreglos=Herramientas::CargarDatosGridv2($this,$this->obj_antiguedad);//3
		$arreglo_arreglo = array($grid_alicuota_arreglos,$grid_nomina_arreglos,$grid_intereses_arreglos,$grid_antiguedad_arreglos,$alic,$a146,$fid);
		//<!-----------------------------funciones clase Orden de Compra---------------------->
		if (Nomina::Salvar_presnomtipcon($nptipcon,$arreglo_arreglo,&$coderror))
		{
		    return $coderror;
		}//	if (Orden_compra::Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos))
		else
		{
			return $coderror;
		}
	}


  protected function deleteNptipcon($nptipcon)
  {
 		$var= $nptipcon->getCodtipcon();
        //
		$c = new Criteria();
		$c->add(NpbonocontPeer::CODTIPCON,$var);
		$per = NpbonocontPeer::doDelete($c);

		$p = new Criteria();
		$p->add(NpasinomcontPeer::CODTIPCON,$var);
		$arreglo = NpasinomcontPeer::doDelete($p);

		$p = new Criteria();
		$p->add(NpintconPeer::CODCON,$var);
		$arreglo = NpintconPeer::doDelete($p);

		$p = new Criteria();
		$p->add(NpdiaantperPeer::CODCON,$var);
		$arreglo = NpdiaantperPeer::doDelete($p);

		$nptipcon->delete();

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
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$codigo=$this->getRequestParameter('codigo');
	 	$js="";
	 	$c= new Criteria();
	 	$c->add(NptipconPeer::CODTIPCON,$codigo);
	 	$per = NptipconPeer::doSelect($c);
	 	$dato="";
	 	if($per)
	 	{
	 		$js.="alert('Codigo $codigo ya existe');";
	 		$js.="$('$cajtexcom').value='';";
	 		$js.="$('$cajtexcom').focus();";
	 	}else
	 	{	if(trim($this->getRequestParameter('codigo'))!='')
	 			$dato=NptipconPeer::getDestipcon_vacio(trim($this->getRequestParameter('codigo')));
	 	}


	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }elseif($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=Herramientas::getX_vacio('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
		if(!empty($dato))
		{
			$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		}else
		{
			$js="$('$cajtexcom').value='';";
			$js.="$('$cajtexcom').focus();";
			$js.="alert('Nomina no existe');";
			$output = '[["javascript","'.$js.'",""]]';
		}

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }

  }
    /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNptipconFromRequest(&$alic = '',&$a146 = '', &$fid = '')
  {
    $nptipcon = $this->getRequestParameter('nptipcon');

    if (isset($nptipcon['codtipcon']))
    {
      $this->nptipcon->setCodtipcon($nptipcon['codtipcon']);
    }
    if (isset($nptipcon['destipcon']))
    {
      $this->nptipcon->setDestipcon($nptipcon['destipcon']);
    }
    if (isset($nptipcon['frepagcon']))
    {
      $this->nptipcon->setFrepagcon($nptipcon['frepagcon']);
    }
    if (isset($nptipcon['fecinireg']))
    {
      if ($nptipcon['fecinireg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nptipcon['fecinireg']))
          {
            $value = $dateFormat->format($nptipcon['fecinireg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nptipcon['fecinireg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nptipcon->setFecinireg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nptipcon->setFecinireg(null);
      }
    }
    if (isset($nptipcon['art146']))
    { $a146 = 'S';
      $this->nptipcon->setArt146(1);
    }
    if (isset($nptipcon['alicuocon']))
    { $alic = 'S';
      $this->nptipcon->setAlicuocon(1);
    }
	if (isset($nptipcon['fid']))
    {
      $fid = 'S';
      $this->nptipcon->setFid(1);
    }
    if (isset($nptipcon['condia']))
    {
      $this->nptipcon->setCondia($nptipcon['condia']);
    }
	if (isset($nptipcon['fecdes']))
    {
      if ($nptipcon['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nptipcon['fecdes']))
          {
            $value = $dateFormat->format($nptipcon['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nptipcon['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nptipcon->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nptipcon->setFecdes(null);
      }
    }
  }

}
