<?php


/**
 * facrecpag actions.
 *
 * @package    siga
 * @subpackage facrecpag
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facrecpagActions extends autofacrecpagActions {
	public function setVars() {
		$this->params = '';
		$this->params[0] = Herramientas :: getX_vacio('codemp', 'fcdefins', 'codpic', '001');
	}

	// Para incluir funcionalidades al executeEdit()
	public function editing() {
		$this->configGrid_detalles();
		$this->configGrid_formpag();
		$this->configGrid_recargdescto();
	}

	public function configGrid_recargdescto($reg = array (), $regelim = array ()) {
		$c = new Criteria();
		$c->add(FcrecdespagPeer :: NUMPAG, $this->fcpagos->getNumpag());
		$per = FcrecdespagPeer :: doSelect($c);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_recargdescto');

		$this->gridscto = $this->columnas[0]->getConfig($per);

		$this->fcpagos->setGrid_recargdescto($this->gridscto);

	}

	public function configGrid_detalles($reg = array (), $regelim = array ()) {
		$c = new Criteria();
		$c->add(FcdecpagPeer :: NUMPAG, $this->fcpagos->getNumpag());
		$reg = FcdecpagPeer :: doSelect($c);

		foreach ($reg as $per) {
			$c = new Criteria();
			$c->add(FcdeclarPeer :: RIFCON, $this->fcpagos->getRifcon());
			$c->add(FcdeclarPeer :: NUMDEC, $per->getNumdec());
			$c->add(FcdeclarPeer :: NUMREF, $per->getNumref());
			$c->add(FcdeclarPeer :: FECVEN, $per->getFecven());
			$c->add(FcdeclarPeer :: NUMERO, $per->getNumero());
			$c->add(FcdeclarPeer :: FUEING, $per->getFueing());
			$datos = FcdeclarPeer :: doSelectone($c);
			if ($datos) {
				$per->setFueing(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', $per->getFueing()));
				$per->setNumdec($datos->getNumdec());
				$per->setNumref($datos->getNumref());
				$per->setNombre($datos->getNombre());
				$per->setFecven($datos->getFecven());
				$per->setTipo($datos->getTipo());
				$per->setMondec($datos->getMondec());
				$per->setAutliq(H :: FormatoMonto($datos->getAutliq()));
				$per->setMora(H :: FormatoMonto($datos->getMora()));
				$per->setProntopg(H :: FormatoMonto($datos->getProntopg()));
				$per->setMontopag(H :: FormatoMonto($datos->getMondec() + $datos->getMora() - $datos->getProntopg()));
				$per->setMontopagcon(H :: FormatoMonto($datos->getAutliq()));
				$per->setSaldo(H :: FormatoMonto($datos->getMontopag() - $datos->getMontopagcon()));
				if ($datos->getEdodec() == 'P') {
					$per->setCheck('true');
				}

			} else {
				$per->setCheck('true');
				$per->setFueing(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', $per->getFueing()));
				$per->setNombre('REGISTRO ELIMINADO EN OTROS INGRESOS');
				$per->setTipo('PAG');
				$per->setMondec($per->getMondec());
				$per->setAutliq(H :: FormatoMonto($per->getMonpag()));
				$per->setMora(H :: FormatoMonto('0'));
				$per->setProntopg(H :: FormatoMonto('0'));
				$per->setMontopag(H :: FormatoMonto($per->getMondec() + $per->getMora() - $per->getProntopg()));
				$per->setMontopagcon(H :: FormatoMonto($per->getMontopag()));
				$per->setSaldo(H :: FormatoMonto($per->getMontopag() - $per->getMontopagcon()));
			}
			#$per->setSaldo(H :: FormatoMonto($datos->getMontopag() - $datos->getMontopagcon()));
		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalles');

		$this->grid = $this->columnas[0]->getConfig($reg);

		$this->fcpagos->setGrid_detalles($this->grid);

	}

	public function configGrid_formpag($reg = array (), $regelim = array ()) {
		$datos = array ();
		$c = new Criteria();
		$c->add(FcdetpagPeer :: NUMPAG, $this->fcpagos->getNumpag());
		$reg = FcdetpagPeer :: doSelect($c);
		//La primera Fila debe contener esto:
		$datos[0]["id"] = '';
		$datos[0]["tippag"] = '001';
		$datos[0]["nrodet"] = '';
		$datos[0]["monpag"] = H :: FormatoMonto($this->fcpagos->getMonefe());
		//Union de la primera fila + la Busqueda
		$reg = array_merge($datos, $reg);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_formpag');
		$this->columnas[1][0]->setCombo(Fcdetpag::ListaTipPag());

		$this->gridfp = $this->columnas[0]->getConfig($reg);

		$this->fcpagos->setGrid_formpag($this->gridfp);

	}

	public function executeAjax() {

		$codigo = $this->getRequestParameter('codigo', '');
		$ajax = $this->getRequestParameter('ajax', '');

		switch ($ajax) {
			case '1' :
				$feccor = $this->getRequestParameter('feccor', '');
				$c = new Criteria();
				$c->add(FcconrepPeer :: RIFCON, trim($codigo));
				$fcconrep2 = FcconrepPeer :: doSelectOne($c);
				$javascript = '';
				if (count($fcconrep2) > 0) {

					$fcconrep2->setFeccor($feccor);
					$nomcon = $fcconrep2->getNomcon();
					$dircon = $fcconrep2->getDircon();
					if ($fcconrep2->getNaccon() == 'V') {
						$javascript = $javascript . "$('fcpagos_naccon_V').checked=true; ";
					} else {
						$javascript = $javascript . "$('fcpagos_naccon_E').checked=true; ";
					}
					if ($fcconrep2->getTipcon() == 'N') {
						$javascript = $javascript . "$('fcpagos_tipcon_N').checked=true; ";
					} else {
						$javascript = $javascript . "$('fcpagos_tipcon_J').checked=true; ";
					}
				}

				$this->fcconrep2 = $fcconrep2;
				$this->fcpagos = $this->getFcpagosOrCreate();
				//$this->updateFcpagosFromRequest();

				Hacienda :: CalcularMora($this->fcconrep2);
				self :: configGrid_detalles_nuevo();

//				$javascript = $javascript . "ActualizarSaldosGrid('a',ArrTotales_a);";

				$output = '[["fcpagos_nomcon","' . $nomcon . '",""],["fcpagos_dircon","' . $dircon . '",""],["javascript","' . $javascript . '",""]]';
				break;

			case '2' :
				echo $codigo;

				break;
			default :
				$output = '[["","",""],["","",""],["","",""]]';
		}

		// Instruccion para escribir en la cabecera los datos a enviar a la vista
		$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

		// Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
		// mantener habilitar esta instrucción
		//return sfView::HEADER_ONLY;

		// Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
		// por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

	}

	/**
	 *
	 * Función que se ejecuta luego los validadores del negocio (validators)
	 * Para realizar validaciones específicas del negocio del formulario
	 * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
	 *
	 */
	public function validateEdit() {
		$this->coderr = -1;

		// Se deben llamar a las funciones necesarias para cargar los
		// datos de la vista que serán usados en las funciones de validación.
		// Por ejemplo:

		if ($this->getRequest()->getMethod() == sfRequest :: POST) {

			// $this->configGrid();
			// $grid = Herramientas::CargarDatosGrid($this,$this->obj);

			// Aqui van los llamados a los métodos de las clases del
			// negocio para validar los datos.
			// Los resultados de cada llamado deben ser analizados por ejemplo:

			// $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

			//$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

			// al final $resp es analizada en base al código que retorna
			// Todas las funciones de validación y procesos del negocio
			// deben retornar códigos >= -1. Estos código serám buscados en
			// el archivo errors.yml en la función handleErrorEdit()

			if ($this->coderr != -1) {
				return false;
			} else
				return true;

		} else
			return true;

	}

	public function configGrid_detalles_nuevo($reg = array (), $regelim = array ()) {
		$c = new Criteria();
		$c->add(FcdeclarPeer :: RIFCON, $this->fcconrep2->getRifcon());
		$opc1 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'P', Criteria :: NOT_EQUAL);
		$opc2 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'X', Criteria :: NOT_EQUAL);
		$opc1->addAnd($opc2);
		$c->add($opc1);

		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMREF);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: TIPO);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMERO);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMDEC);

		$reg = FcdeclarPeer :: doSelect($c);

		foreach ($reg as $per) {
			$per->setFueing(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', $per->getFueing()));
			$per->setMora(H :: FormatoMonto('0'));
			$per->setMontopag(H :: FormatoMonto($per->getMondec() + $per->getMora() - $per->getProntopg() - $per->getAutliq()));
			$per->setMontopagcon(H :: FormatoMonto('0'));
			$per->setSaldo(H :: FormatoMonto(($per->getMondec() + $per->getMora() - $per->getProntopg() - $per->getAutliq()) - $per->getMontopagcon()));
			if ($per->getEdodec() == 'P') {
				$per->setCheck('true');
			}
		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalles');
		$signo = "+";
		$signo2 = "-";
		$this->columnas[1][0]->setHTML(' onclick="AsignarMonto(this.id)" ');
		#$this->columnas[1][0]->setHTML(' onBlur="toAjaxUpdater(obtenerColumna(this.id,11,'.chr(39).$signo.chr(39).'),2,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).');" ');
		//$this->columnas[1][0]->setHTML('readOnly="false" ');

		$this->grid = $this->columnas[0]->getConfig($reg);

		$this->fcpagos->setGrid_detalles($this->grid);

	}

	/**
	 * Función para actualziar el grid en el post si ocurre un error
	 * Se pueden colocar aqui los grids adicionales
	 *
	 */
	public function updateError() {
		$this->configGrid_detalles();
		$this->configGrid_formpag();
		$this->configGrid_recargdescto();

		//$grid = Herramientas::CargarDatosGrid($this,$this->Grid_recargdescto);

		//$this->configGrid($grid[0],$grid[1]);

	}

	public function saving($clasemodelo)
	{
	    $grid     = Herramientas::CargarDatosGridv2($this,$this->grid);
	    $gridfp   = Herramientas::CargarDatosGridv2($this,$this->gridfp);
	    $gridscto = Herramientas::CargarDatosGridv2($this,$this->gridscto);

	    $error = Hacienda::SalvarFacrecpag($clasemodelo, $grid, $gridfp, $gridscto);
		return $error;
		//return parent :: saving($clasemodelo);
	}

	public function deleting($clasemodelo) {
		return parent :: deleting($clasemodelo);
	}

	public function executeAjaxfila() {
		$name = $this->getRequestParameter('grid', 'a');
		$grid = $this->getRequestParameter('grid' . $name, '');

		$fila = $this->getRequestParameter('fila', '');

		$coddes = $grid[$fila][0];

		if ($coddes != '') {
			$c = new Criteria();
			$c->add(FcdefdescPeer :: CODDES, $coddes);
			$fcdefdesc = FcdefdescPeer :: doSelectOne($c);
			if ($fcdefdesc) {
				$grid[$fila][0] = $fcdefdesc->getCoddes();
				$grid[$fila][1] = $fcdefdesc->getNomdes();
				$grid[$fila][2] = 'Descuento';
			} else {
				$grid[$fila][0] = '';
				$grid[$fila][1] = '';
				$grid[$fila][2] = '';
			}
		}

		$output = Herramientas :: grid_to_json($grid, $name);

		$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

		return sfView :: HEADER_ONLY;

	}

}