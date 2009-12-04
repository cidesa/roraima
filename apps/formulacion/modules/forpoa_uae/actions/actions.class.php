<?php


/**
 * forpoa_uae actions.
 *
 * @package    Roraima
 * @subpackage forpoa_uae
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class forpoa_uaeActions extends autoforpoa_uaeActions {

	//private $coderr = -1;


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
	$this->setVars();

    $this->forencpryaccespmet = $this->getForencpryaccespmetOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateForencpryaccespmetFromRequest();

      $this->saveForencpryaccespmet($this->forencpryaccespmet);

	    if ($this->coderr!=-1){
	    	$this->labels = $this->getLabels();
	    }else{
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('forpoa_uae/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('forpoa_uae/list');
	      }
	      else
	      {
	        return $this->redirect('forpoa_uae/edit?id='.$this->forencpryaccespmet->getId());
	      }
	    }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getForencpryaccespmetOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $forencpryaccespmet = new Forencpryaccespmet();
      $this->configGrid();
    }
    else
    {
      $forencpryaccespmet = ForencpryaccespmetPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($forencpryaccespmet);
      //$this->configGrid($forencpryaccespmet->getCodpro());
      $this->configGrid($forencpryaccespmet->getCodpro(),$forencpryaccespmet->getCodaccesp(),$forencpryaccespmet->getCodmet());
    }

    return $forencpryaccespmet;
  }

  public function executeGrid()

  {

     /////if ($this->getRequestParameter('ajax')=='99')
     ////{
     ////  $this->sw="0";
      // $dato=Herramientas::getX('reqart','Casolart','monreq',trim($this->getRequestParameter('ordcom')));
       //$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
       ///$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

     ////  $this->configGrid($this->getRequestParameter('codigo2'),$this->getRequestParameter('codigo3'),$this->getRequestParameter('codigo'));
//       $this->configGrid($forencpryaccespmet->getCodpro(),$forencpryaccespmet->getCodaccesp(),$forencpryaccespmet->getCodmet());
     ////}else{

      // $this->id="1";
      /*$obj1=$this->getRequestParameter('obj1');
      $obj2=$this->getRequestParameter('obj2');
      $obj3=$this->getRequestParameter('obj3');
      $obj4=$this->getRequestParameter('obj4');
      $obj5=$this->getRequestParameter('obj5');*/
      $this->id=$this->getRequestParameter('id');
      $this->asig_pre=$this->getRequestParameter('asig_pre');
      $this->distmont=$this->getRequestParameter('distmont');
      //$this->configGrid_asig($obj1,$obj2,$obj3,$obj4,$obj5);
      $this->arreg=$this->getRequestParameter('arreg');
     // $this->configGrid_asig($arreg);
     ////}

    sfView::SUCCESS;


    }

	public function executeFinan()
	{
	  $this->asig=$this->getRequestParameter('obj5');
	  $this->id=$this->getRequestParameter('id');
	  $obj1=$this->getRequestParameter('obj1');
	  $obj2=$this->getRequestParameter('obj2');
	  $obj3=$this->getRequestParameter('obj3');
	  $obj4=$this->getRequestParameter('obj4');
	  $obj6=$this->getRequestParameter('obj6');
	  $this->monfin=$this->getRequestParameter('monfin');
	  $this->configGrid_financiamiento($obj1,$obj2,$obj3,$obj4);
	  sfView::SUCCESS;
    }


	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {

		$cajtexmos = $this->getRequestParameter('cajtexmos');
		$cajtexcom = $this->getRequestParameter('cajtexcom');
		if ($this->getRequestParameter('ajax') == '1') {
			//Descripcion del proyecto
			$dato = FordefpryPeer :: getNombre($this->getRequestParameter('codigo'));

			//Nombre del proyecto
			$dato1 = FordefpryPeer :: getTipo($this->getRequestParameter('codigo'));

			$output = '[["' . $cajtexmos . '","' . $dato . '",""], ["forencpryaccespmet_desproacc","' . $dato1 . '",""]]';

			$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
			return sfView :: HEADER_ONLY;
		} else
			if ($this->getRequestParameter('ajax') == '2') {
				$dato = FordefaccespPeer :: getAccion($this->getRequestParameter('codigo'));
				// $codigo2=$this->getRequestParameter('codigo2');

				$output = '[["' . $cajtexmos . '","' . $dato . '",""]]';

				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
			} else
				if ($this->getRequestParameter('ajax') == '3') {
					$dato = FordefpryaccmetPeer::getDesmet($this->getRequestParameter('codigo'),$this->getRequestParameter('codigo2'),$this->getRequestParameter('codigo3'));
					$dato2 = FordefpryaccmetPeer::getCanmet($this->getRequestParameter('codigo'),$this->getRequestParameter('codigo2'),$this->getRequestParameter('codigo3'));

					$output = '[["' . $cajtexmos . '","'.$dato.'",""],["forencpryaccespmet_canmet","'.$dato2.'",""]]';

				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				//return sfView :: HEADER_ONLY;

					if (!empty($dato2))
					{
						$valor=Herramientas::getX_vacio(array('CODPRO','CODACCESP','CODMET'),'Forencpryaccespmet','CODPRO',array($this->getRequestParameter('codigo2'),$this->getRequestParameter('codigo3'),$this->getRequestParameter('codigo')));
						//print $valor;
						if (!empty($valor))
						{
							//Datos_ForEncPryAccEspMet();
							$this->configGrid($this->getRequestParameter('codigo2'),$this->getRequestParameter('codigo3'),$this->getRequestParameter('codigo'));
						}else{
							//Nuevo
							$this->configGrid();
						}
					}

				} else
					if ($this->getRequestParameter('ajax') == '4') {
						$dato = FordefcatprePeer :: getNomcat($this->getRequestParameter('codigo'));
						$output = '[["' . $cajtexmos . '","' . $dato . '",""]]';

						$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
						return sfView :: HEADER_ONLY;

					} else
						if ($this->getRequestParameter('ajax') == '5') {
							$dato = FordefparegrPeer :: getNomparegr($this->getRequestParameter('codigo'));
							$output = '[["' . $cajtexmos . '","' . $dato . '",""]]';

							$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
							return sfView :: HEADER_ONLY;

						}
	}


	public function Datos_ForEncPryAccEspMet()
	{

	}


   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codpro=' ',$codaccesp=' ',$codmet=' ')
  {
    /**************************************************************************
     **         Grid Formulación del Plan Operativo Formulario               **
     **                  Jesus Lobaton Graba en Clase                        **
     **************************************************************************/
    /*
    */
    //SQL = "Select * From CaArtOrd Where Rtrim(OrdCom) = '" + Trim(DatosOrd(0).Text) + "' order By CodArt"

    $this->setVars();
    $c = new Criteria();
    $c->add(FordetpryaccespmetPeer::CODPRO,$codpro);
    $c->add(FordetpryaccespmetPeer::CODACCESP,$codaccesp);
    $c->add(FordetpryaccespmetPeer::CODMET,$codmet);
    ///Order by CodPro,CodAccEsp,CodMet,CodPre"
    $c->addAscendingOrderByColumn(FordetpryaccespmetPeer::CODPRO);
    $c->addAscendingOrderByColumn(FordetpryaccespmetPeer::CODACCESP);
    $c->addAscendingOrderByColumn(FordetpryaccespmetPeer::CODMET);
    $c->addAscendingOrderByColumn(FordetpryaccespmetPeer::CODPRE);
    $per = FordetpryaccespmetPeer::doSelect($c);

    $formatouae1=$this->formatouae;
    $formatouae= str_replace('#','@',$formatouae1);

    $longitudpartidas=$this->longitudpartidas;
    //$longitudpartidas= str_replace('#','@',$longitudpartidas1);

    $formatopartidas=$this->formatopartidas;
    //$formatocategoria=$this->formatocategoria;

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Fordetpryaccespmet');
    //$opciones->setFilas(15);
    $opciones->setAnchoGrid(2700);
    $opciones->setTitulo('Detalle del Plan Operativo');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Cod.Unidad Ejecutora');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codunieje');
    $col1->setHTML('type="text" size="15"');
    //$col1->setCatalogo('Fordefcatpre','sf_admin_edit_form','2');
    //columna->setCatalogo($clase,$form,$objs,$metodo,$param);
    $col1->setCatalogo('Fordefcatpre','sf_admin_edit_form', array('codcat' => 1,'nomcat' => 2), 'Fordefcatpre_forpoa_uae', array('param1' =>$formatouae, 'param2' => $codaccesp));
    $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$formatouae1.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
   // $col1->setAjax('forpoa_uae',4,2);

    $col2 = new Columna('Unidad Ejecutora');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Descat');
    $col2->setHTML('type="text" size="25" disabled=true');

    $col3 = clone $col1;
    $col3 = new Columna('Partida');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('Codpar');
    //$col3->setCatalogo('Fordefparegr','sf_admin_edit_form','4');
    $col3->setCatalogo('Fordefparegr','sf_admin_edit_form', array('CODPAREGR' => 3,'NOMPAREGR' => 4), 'Fordefparegr_forpoa_uae', array('param1' =>$longitudpartidas));
    $col3->setJScript('onBlur="javascript:actualizar_codigo(this.id);" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$formatopartidas.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
   // $col3->setAjax('forpoa_uae',5,4);

    $col4 = clone $col2;
    $col4->setTitulo('Descripción de la Partida');
    $col4->setNombreCampo('Nomparegr');
    //$col4->setHTML('type="text" size="12"');
    //$col4->setJScript('onKeypress="entermonto(event,this.id), costoenter(event,this.id)"');

    $col5 = new Columna('Distrib.Monto');
    $col5->setTipo(Columna::COMBO);
    $col5->setCombo(Constantes::DistribMonto());
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('Disper');
    $col5->setJScript('onClick="AsigCodPre(this.id)"');
    $col5->setHTML(' ');

    $col6 = new Columna('Asignación Presupuestaria');
    $col6->setTipo(Columna::MONTO);
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('Monpre');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size=15');
    $col6->setBoton(true);
    $col6->setEnlaceboton('AsigPresup(event,this.id)');
    $col6->setJScript('onKeypress="entermonto(event,this.id), AsigPresup(event,this.id)" onBlur="entermonto(event,this.id)"');
    $col6->setEsTotal(true,'totalactividad');

    $col7 = new Columna('Fte.Financiamiento');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::DERECHA);
    $col7->setAlineacionContenido(Columna::DERECHA);
    $col7->setBoton(true);
    $col7->setEnlaceboton('CatalogoGrid(event,this.id)');
    //$col7->setJScript('onKeypress="CatalogoGrid(event,this.id)"');
    $col7->setNombreCampo('Codparing');
    $col7->setHTML('type="text" size="8" readonly="true"');

    $col8 = clone $col7;
    $col8->setBoton(false);
    $col8->setTitulo('Descripción');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(false);
    $col8->setAlineacionObjeto(Columna::IZQUIERDA);
    $col8->setAlineacionContenido(Columna::IZQUIERDA);
    $col8->setNombreCampo('Nomext');
    $col8->setHTML('type="text" size="35"');

    $col9 = new Columna('Tipo de Gasto');
    $col9->setBoton(true);
    $col9->setTipo(Columna::TEXTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::IZQUIERDA);
    $col9->setAlineacionContenido(Columna::IZQUIERDA);
    $col9->setNombreCampo('Codtip');
    $col9->setHTML('type="text" size="4" maxlength="4" ');
    $col9->setCatalogo('Fortiptit','sf_admin_edit_form', array('CODTIP' => 9,'DESTIP' => 10), 'Fortiptit_forpoa_uae');


    $col10 = clone $col7;
    $col10->setBoton(false);
    $col10->setTitulo('Descripcion de Gasto');
    $col10->setTipo(Columna::TEXTO);
    $col10->setEsGrabable(false);
    $col10->setAlineacionObjeto(Columna::IZQUIERDA);
    $col10->setAlineacionContenido(Columna::IZQUIERDA);
    $col10->setNombreCampo('Destip');
    $col10->setHTML('type="text" size="35"');

    $col11 = clone $col7;
    $col11->setBoton(false);
    $col11->setTitulo('Insumo');
    $col11->setTipo(Columna::TEXTO);
    $col11->setEsGrabable(true);
    $col11->setAlineacionObjeto(Columna::IZQUIERDA);
    $col11->setAlineacionContenido(Columna::IZQUIERDA);
    $col11->setNombreCampo('Jusins');
    $col11->setHTML('type="text" size="35"');

    $col12 = clone $col7;
    $col12->setBoton(false);
    $col12->setTitulo('Cantidad');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionObjeto(Columna::DERECHA);
    $col12->setAlineacionContenido(Columna::DERECHA);
    $col12->setNombreCampo('Canins');
    //$col3->setEsNumerico(true);
    $col12->setHTML('type="text" size="5" maxlength="5" ');
    //$col12->setJScript('onKeypress=entermonto(event,this.id)');


    $col13 = clone $col7;
    $col13->setBoton(false);
    $col13->setTitulo('Observación');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionObjeto(Columna::IZQUIERDA);
    $col13->setAlineacionContenido(Columna::IZQUIERDA);
    $col13->setNombreCampo('Observ');
    $col13->setHTML('type="text" size="25"');

    $col14 = clone $col7;
    $col14->setBoton(false);
    $col14->setTitulo('Código Presupuestario');
    $col14->setTipo(Columna::TEXTO);
    $col14->setEsGrabable(true);
    $col14->setAlineacionObjeto(Columna::DERECHA);
    $col14->setAlineacionContenido(Columna::DERECHA);
    $col14->setNombreCampo('Codpre');
    $col14->setHTML('type="text" size="25"');

    $col15 = clone $col7;
    $col15->setBoton(false);
    $col15->setTitulo('Agrid Asig Presup');
    $col15->setTipo(Columna::TEXTO);
    $col15->setEsGrabable(true);
    $col15->setDefault('0_0_0_0_0_0_0_0_0_0_0_0_');
    $col15->setAlineacionObjeto(Columna::DERECHA);
    $col15->setAlineacionContenido(Columna::DERECHA);
    $col15->setNombreCampo('Grid');
    $col15->setHTML('type="text" size="25"');
    $col15->setOculta(true);

    //$col16 = clone $col7;
    $col16 = new Columna('datos fte.financ');
    $col16->setBoton(false);
    //$col16->setTitulo('datos fte.financ');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(true);
    //$col16->setDefault('111');
    $col16->setAlineacionObjeto(Columna::DERECHA);
    $col16->setAlineacionContenido(Columna::DERECHA);
    $col16->setNombreCampo('Grid2');
    $col16->setHTML('type="text" size="25"');
    $col16->setOculta(true);

    //$col16 = clone $col7;
    $col17 = new Columna('codigo fte.financ');
    $col17->setBoton(false);
    $col17->setTipo(Columna::TEXTO);
    $col17->setEsGrabable(true);
    //$per[0]->getId()
    $col17->setAlineacionObjeto(Columna::DERECHA);
    $col17->setAlineacionContenido(Columna::DERECHA);
    $col17->setNombreCampo('caja_oculta2');
    $col17->setHTML('type="text" size="20"');
    $col17->setOculta(true);

    $col18 = new Columna('id');
    $col18->setBoton(false);
    $col18->setTipo(Columna::TEXTO);
    $col18->setEsGrabable(true);
    $col18->setAlineacionObjeto(Columna::DERECHA);
    $col18->setAlineacionContenido(Columna::DERECHA);
    $col18->setNombreCampo('caja_oculta');
    $col18->setOculta(true);



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
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
  }

////////// ////////////////////////////////////////////////////////////////////////
///////////////// GRID QUE MUESTRA LOS FUENTES DE FINANCIAMIENTO  ////////////////
/////////////////////////////////////////////////////////////////////////////////
 	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_financiamiento($codpro=' ',$codaccesp=' ',$codmet=' ', $codpre=' ', $monfin=' ')
	{
		/**************************************************************************
		 **         Grid Formulación del Plan Operativo Formulario               **
		 **                  Jesus Lobaton Graba en Clase                        **
		 **************************************************************************/

		$c = new Criteria();


/////Primer criterio bueno
	/*	$c->addJoin(FortipfinPeer::CODFIN,FordisfuefinpryaccmetPeer::CODPARING.' AND '.FordisfuefinpryaccmetPeer::CODPRO.'= '.chr(39).$codpro.chr(39).' AND '.FordisfuefinpryaccmetPeer::CODACCESP.'='.chr(39).$codaccesp.chr(39).' AND '.FordisfuefinpryaccmetPeer::CODMET.'='.chr(39).$codmet.chr(39).' AND '.FordisfuefinpryaccmetPeer::CODPRE.'='.chr(39).$codpre.chr(39), Criteria::LEFT_JOIN);
        //$c->addAsColumn('MONFIN', 'COUNT('.FordisfuefinpryaccmetPeer::MONFIN.')');
        $c->addAsColumn('MONFIN', 'COALESCE('.FordisfuefinpryaccmetPeer::MONFIN.',0)');
        //$c->addAsColumn('MONFIN', 'FordisfuefinpryaccmetPeer::MONFIN');
        $c->addGroupByColumn(FortipfinPeer::NOMABR);
        $c->addGroupByColumn(FortipfinPeer::APOFIS);
        $c->addGroupByColumn(FortipfinPeer::TIPFIN);
        $c->addGroupByColumn(FortipfinPeer::MONTOING);
        $c->addGroupByColumn(FortipfinPeer::MONTODIS);
        $c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
        $c->addGroupByColumn(FortipfinPeer::ID);
		$c->addGroupByColumn(FortipfinPeer::CODFIN);
		$c->addGroupByColumn(FortipfinPeer::NOMEXT);
		$c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
		$c->addGroupByColumn(FordisfuefinpryaccmetPeer::MONFIN);*/
////
////Segundo creterio en prueba
     /*   $c->addGroupByColumn(FortipfinPeer::CODFIN);
		$c->addGroupByColumn(FortipfinPeer::NOMEXT);

        $c->addGroupByColumn(FortipfinPeer::NOMABR);
        $c->addGroupByColumn(FortipfinPeer::APOFIS);
        $c->addGroupByColumn(FortipfinPeer::TIPFIN);
        $c->addGroupByColumn(FortipfinPeer::MONTOING);
        $c->addGroupByColumn(FortipfinPeer::MONTODIS);
        $c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
        $c->addGroupByColumn(FortipfinPeer::ID);

		$c->addGroupByColumn(FortipfinPeer::MONTODISAUX);*/
		//$c->addGroupByColumn(FordisfuefinpryaccmetPeer::MONFIN);
/////
		/*	$sql = "select 1 as check, a.codcon as codcon, a.nomcon as nomcon, (case when a.conact='S' then 'SI' else 'NO' end) as conact, b.frecon as frecon,a.id as id
					from npdefcpt a, npasiconnom b, npnomina c
					where a.codcon=b.codcon
							and b.codnom=c.codnom
					and b.codnom='".$nomina."' order by a.codcon";
					"to_char(COALESCE(fordisfuefinpryaccmet.MONFIN,0),'999999999999') AS MONFIN " .
					**/

			/*$sql="SELECT " .
					"fortipfin.CODFIN, " .
					"fortipfin.NOMEXT, " .
					"fortipfin.NOMABR, " .
					"fortipfin.APOFIS, " .
					"fortipfin.TIPFIN, " .
					"fortipfin.MONTOING, " .
					"fortipfin.MONTODIS, " .
					"to_char(fortipfin.MONTODISAUX,'99999999999') as MONTODISAUX, " .
					"fortipfin.ID, " .
					"to_char(COALESCE(fordisfuefinpryaccmet.MONFIN,0),'0000000000000') AS MONFIN " .
				"FROM " .
					"	fortipfin LEFT JOIN fordisfuefinpryaccmet ON " .
					"(fortipfin.CODFIN=fordisfuefinpryaccmet.CODPARING AND fordisfuefinpryaccmet.CODPRO='".$codpro."' AND fordisfuefinpryaccmet.CODACCESP='".$codaccesp."' AND fordisfuefinpryaccmet.CODMET='".$codmet."' AND fordisfuefinpryaccmet.CODPRE='".$codpre."') " .
				"GROUP BY " .
					"fortipfin.CODFIN,fortipfin.NOMEXT," .
					"fortipfin.NOMABR," .
					"fortipfin.APOFIS," .
					"fortipfin.TIPFIN," .
					"fortipfin.MONTOING," .
					"fortipfin.MONTODIS," .
					"fortipfin.MONTODISAUX," .
					"fortipfin.ID," .
					"fortipfin.MONTODISAUX," .
					"MONFIN";
*/

/*"to_char(fortipfin.MONTODISAUX,'0000000000000') as MONTODISAUX, " . */
	    $sql="SELECT " .
		"fortipfin.CODFIN, " .
		"fortipfin.NOMEXT, " .
		"fortipfin.NOMABR, " .
		"fortipfin.APOFIS, " .
		"fortipfin.TIPFIN, " .
		"COALESCE(fortipfin.MONTOING,0), " .
		"COALESCE(fortipfin.MONTODIS,0), " .
		"COALESCE(fortipfin.MONTODISAUX,0) as MONTODISAUX, " .


		"COALESCE(SUM(fordisfuefinpryaccmet.MONFIN),0) AS MONFIN, " .
		"fortipfin.ID ".
	"FROM " .
		"fortipfin LEFT JOIN fordisfuefinpryaccmet ON " .
		"(fortipfin.CODFIN=fordisfuefinpryaccmet.CODPARING AND fordisfuefinpryaccmet.CODPRO='".$codpro."' AND fordisfuefinpryaccmet.CODACCESP='".$codaccesp."' AND fordisfuefinpryaccmet.CODMET='".$codmet."' AND fordisfuefinpryaccmet.CODPRE='".$codpre."') " .
	"GROUP BY " .
		"fortipfin.CODFIN,fortipfin.NOMEXT," .
		"fortipfin.NOMABR," .
		"fortipfin.APOFIS," .
		"fortipfin.TIPFIN," .
		"fortipfin.MONTOING," .
		"fortipfin.MONTODIS," .
		"fortipfin.MONTODISAUX, ".
		"fortipfin.ID";
//$sql="SELECT fortipfin.CODFIN, fortipfin.NOMEXT, fortipfin.NOMABR, fortipfin.APOFIS, fortipfin.TIPFIN, fortipfin.MONTOING, fortipfin.MONTODIS, fortipfin.MONTODISAUX, fortipfin.ID, COALESCE(fordisfuefinpryaccmet.MONFIN,0) AS MONFIN FROM fortipfin LEFT JOIN fordisfuefinpryaccmet ON (fortipfin.CODFIN=fordisfuefinpryaccmet.CODPARING AND fordisfuefinpryaccmet.CODPRO= '2-03' AND fordisfuefinpryaccmet.CODACCESP='2-03-01' AND fordisfuefinpryaccmet.CODMET='00001' AND fordisfuefinpryaccmet.CODPRE='2-03-01-14-401-01-18-00') GROUP BY fortipfin.NOMABR,fortipfin.APOFIS,fortipfin.TIPFIN,fortipfin.MONTOING,fortipfin.MONTODIS,fortipfin.MONTODISAUX,fortipfin.ID,fortipfin.CODFIN,fortipfin.NOMEXT,fortipfin.MONTODISAUX,MONFIN";

            $resp = Herramientas::BuscarDatos($sql,&$per);
		/*$per = FortipfinPeer::doSelect($c);*/
		$this->numero_reg = Count($per);  //Para utilizarlo en el grid p

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
   	    $opciones->setEliminar(false);
		$opciones->setTabla('Fordisfuefinpryaccmet');
		$opciones->setFilas(0);
		$opciones->setAnchoGrid(850);
		$opciones->setTitulo('Fuente de Financiamiento');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Cod.Fte.Financ');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(false);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('Codfin');
		$col1->setHTML('type="text" size="8" disabled=true');
		//$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

		$col2 = new Columna('Descripción Fuente de Financiamiento');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(false);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('Nomext');
		$col2->setHTML('type="text" size="25" disabled=true');

		$col3 = new Columna('Monto Disponible de la Fuente');
		$col3->setTipo(Columna::MONTO);
		$col3->setAlineacionObjeto(Columna::DERECHA);
		$col3->setAlineacionContenido(Columna::DERECHA);
		$col3->setEsGrabable(false);
		$col3->setEsNumerico(true);
		$col3->setNombreCampo('Montodisaux');
		//$col3->setJScript('onKeypress="entermonto(event,this.id), costoenter(event,this.id)"');
		$col3->setHTML('type="text" size="18" disabled=true');

		$col4 = clone $col3;
		$col4->setTipo(Columna::MONTO);
		$col4->setTitulo('Monto a Formular');
		$col4->setNombreCampo('Monfin');
		$col4->setEsGrabable(true);
		$col4->setEsNumerico(true);
		$col4->setHTML('type="text" size="15"');
		$col4->setJScript('onKeypress="entermonto(event,this.id),validarmonto(event,this.id)"');
		$col4->setEsTotal(true,'sumatoria');
		$col4->setHTML('type="text" size="25"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);

	}
//////////////////

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
  public function saveForencpryaccespmet($Forencpryaccespmet) {
		$coderr = -1;

		// habilitar la siguiente línea si se usa grid
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		$grid[2] = $this->getRequestParameter('totalactividad');

		try {

			// Modificar la siguiente línea para llamar al método
			// correcto en la clase del negocio, ej:
			 $coderr = Formulacion::salvarforpoa_uae($Forencpryaccespmet,$grid);

			// OJO ----> Eliminar esta linea al modificar este método
			//parent :: saveForencpryaccespmet($Forencpryaccespmet);

			if (is_array($coderr)) {
				foreach ($coderr as $ERR) {
					$err = Herramientas :: obtenerMensajeError($ERR);
					$this->getRequest()->setError('', $err);
					$this->ActualizarGrid();
				}
			}
			elseif ($coderr != -1) {
				$err = Herramientas :: obtenerMensajeError($coderr);
				$this->getRequest()->setError('', $err);
				$this->ActualizarGrid();
			}

		} catch (Exception $ex) {

			$coderr = 0;
			$err = Herramientas :: obtenerMensajeError($coderr);
			$this->getRequest()->setError('', $err);

		}

	}

	public function deleteForencpryaccespmet($Forencpryaccespmet) {

		$coderr = -1;

		// habilitar la siguiente línea si se usa grid
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);

		try {

			// Modificar la siguiente línea para llamar al método
			// correcto en la clase del negocio, ej:
			 $coderr = Formulacion::Eliminarforpoa_uae($Forencpryaccespmet,$grid);

			// OJO ----> Eliminar esta linea al modificar este método
			//parent :: deleteForencpryaccespmet($Forencpryaccespmet);

			if (is_array($coderr)) {
				foreach ($coderr as $ERR) {
					$err = Herramientas :: obtenerMensajeError($ERR);
					$this->getRequest()->setError('', $err);
					$this->ActualizarGrid();
				}
			}
			elseif ($coderr != -1) {
				$err = Herramientas :: obtenerMensajeError($coderr);
				$this->getRequest()->setError('', $err);
				$this->ActualizarGrid();
			}

		} catch (Exception $ex) {

			$coderr = 0;
			$err = Herramientas :: obtenerMensajeError($coderr);
			$this->getRequest()->setError('', $err);

		}

	}

	
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
		$resp = -1;

		// Se deben llamar a las funciones necesarias para cargar los
		// datos de la vista que serán usados en las funciones de validación.
		// Por ejemplo:

		if ($this->getRequest()->getMethod() == sfRequest :: POST) {

			 $this->forencpryaccespmet = $this->getForencpryaccespmetOrCreate();
			// $this->configGrid();
			 $grid = Herramientas::CargarDatosGrid($this,$this->obj);

			// Aqui van los llamados a los métodos de las clases del
			// negocio para validar los datos.
			// Los resultados de cada llamado deben ser analizados por ejemplo:

			 $resp = Formulacion::validarforpoa_uae($this->forencpryaccespmet,$grid);
			// o

			//Para que el codigo no se pueda cambiar al editar el registro:
			//$this->tstipmov= $this->getTstipmovOrCreate();
			//$tstipmov = $this->getRequestParameter('tstipmov');
			//$valor = $tstipmov['codtip'];
			//$campo='codtip';

			//$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

			// al final $resp es analizada en base al código que retorna
			// Todas las funciones de validación y procesos del negocio
			// deben retornar códigos >= -1. Estos código serám buscados en
			// el archivo errors.yml en la función handleErrorEdit()

			if ($resp != -1) {
				$this->coderr = $resp;
				return false;
			} else
				return true;

		} else
			return true;
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

    $this->forencpryaccespmet= $this->getForencpryaccespmetOrCreate();
    $this->updateForencpryaccespmetFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

	/**
	 * Función para actualziar el grid en el post si ocurre un error
	 * Se pueden colocar aqui los grids adicionales
	 *
	 */
	public function ActualizarGrid() {
		$this->configGrid();

		$grid = Herramientas :: CargarDatosGrid($this, $this->obj);

		$this->configGrid($grid[0], $grid[1]);

	}

	public function setVars() {
		$this->formatouae = Herramientas :: ObtenerFormato('Fordefegrgen', 'Foruae');
		$this->formatopartidas = Herramientas :: ObtenerFormato('Fordefegrgen', 'Forpar');
		$this->longitudpartidas = Herramientas :: ObtenerFormato('Fordefegrgen', 'Lonpar');

	}

	public function executeAutocomplete() {
		if ($this->getRequestParameter('ajax') == '1') {
			$this->tags = Herramientas :: autocompleteAjax('CODPRO', 'Fordefpry', 'codpro', trim($this->getRequestParameter('forencpryaccespmet[codpro]')));
		} else
			if ($this->getRequestParameter('ajax') == '2') {
				//$this->tags=Herramientas::autocompleteAjax('CODACCESP','Fordefaccesp','codaccesp',trim($this->getRequestParameter('forencpryaccespmet[codaccesp]')));
				$this->tags = Herramientas :: autocompleteAjax('CODACCESP', 'Fordefaccesp', 'codaccesp', trim($this->getRequestParameter('forencpryaccespmet[codaccesp]')), array (
					'codpro'
				), array (
					$this->getRequestParameter('forencpryaccespmet[codpro]'
				)));
				//public static function autocompleteAjax($fieldjoin, $join, $result, $data, $filtros='', $variables='')
				//$codacces=trim($this->getRequestParameter('forencpryaccespmet[codaccesp]'));
				//$codpro=trim($this->getRequestParameter('forencpryaccespmet[codpro]'));
			} else
				if ($this->getRequestParameter('ajax') == '3') {
					$this->tags = Herramientas :: autocompleteAjax('REQART', 'Fordefpryaccmet', 'reqart', trim($this->getRequestParameter('cacotiza[refsol]')));
				}
	}


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateForencpryaccespmetFromRequest()
  {
    $forencpryaccespmet = $this->getRequestParameter('forencpryaccespmet');

    if (isset($forencpryaccespmet['codpro']))
    {
      $this->forencpryaccespmet->setCodpro($forencpryaccespmet['codpro']);
    }
    if (isset($forencpryaccespmet['nompro']))
    {
      $this->forencpryaccespmet->setNompro($forencpryaccespmet['nompro']);
    }
    if (isset($forencpryaccespmet['desproacc']))
    {
      $this->forencpryaccespmet->setDesproacc($forencpryaccespmet['desproacc']);
    }
    if (isset($forencpryaccespmet['codaccesp']))
    {
      $this->forencpryaccespmet->setCodaccesp($forencpryaccespmet['codaccesp']);
    }
    if (isset($forencpryaccespmet['desaccesp']))
    {
      $this->forencpryaccespmet->setDesaccesp($forencpryaccespmet['desaccesp']);
    }
    if (isset($forencpryaccespmet['codmet']))
    {
      $this->forencpryaccespmet->setCodmet($forencpryaccespmet['codmet']);
    }
    if (isset($forencpryaccespmet['desmet']))
    {
      $this->forencpryaccespmet->setDesmet($forencpryaccespmet['desmet']);
    }
    if (isset($forencpryaccespmet['canmet']))
    {
      $this->forencpryaccespmet->setCanmet($forencpryaccespmet['canmet']);
    }
    if (isset($forencpryaccespmet['desunimed']))
    {
      $this->forencpryaccespmet->setDesunimed($forencpryaccespmet['desunimed']);
    }

    $this->forencpryaccespmet->setTotpre($this->getRequestParameter('totalactividad'));
    $this->forencpryaccespmet->setCanact(0);
  }


}