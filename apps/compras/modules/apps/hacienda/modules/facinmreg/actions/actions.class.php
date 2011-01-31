<?php


/**
 * Facinmreg actions.
 *
 * @package    Roraima
 * @subpackage Facinmreg
<<<<<<< .working
 * @author     Your name here
 * @version    SVN: $Id$
=======
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
>>>>>>> .merge-right.r40709
 */
class FacinmregActions extends autoFacinmregActions {

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
  public function editing() {
		$this->setVars();
		$this->fcreginm->setMascara($this->mascara);
		$this->configGrid();
		$this->configGridComplemento($this->fcreginm->getAnoava(),$this->fcreginm->getNroinm());
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array (), $regelim = array ()) {
		$c = new Criteria();
		$c->add(FcdetinmPeer :: NROINM, $this->fcreginm->getNroinm());
		$per = FcdetinmPeer :: doSelect($c);
		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facinmreg/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

		$this->columnas[1][0]->setCatalogo('fcvalinm','sf_admin_edit_form', array('codtip'=>'1','destip'=>'2','Anual'=>'5','Valmtr'=>'4'), 'Facinmreg_Fcvalinm', array('param1' => "'+$('fcreginm_anoava').value+'", 'param2' => "'+$('fcreginm_codzon').value+'"));
		//$this->columnas[1][2]->setCombo(Constantes :: ListaFcsollic());

		$this->grid = $this->columnas[0]->getConfig($per);
		$this->fcreginm->setGrid($this->grid);
	}


	public function configGridComplemento($anoava='', $nroinm='')
	{
		$c = new Criteria();
		$c->add(FcinmcomPeer :: ANOAVA, $anoava);
		$c->add(FcinmcomPeer :: NROINM, $nroinm);
		$c->addJoin(FcinmcomPeer :: CODCOM, FccominmPeer :: CODCOM);
		$c->addJoin(FcinmcomPeer :: ANOAVA, FccominmPeer :: ANOVIG);
		$per = FcinmcomPeer :: doSelect($c);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facinmreg/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_complemento');
        $this->columnas[1][0]->setCatalogo('fccominm','sf_admin_edit_form', array('Codcom'=>'1','Descom'=>'2','Valcom'=>'3'), 'Facinmreg_Fccominm');

		$this->grid = $this->columnas[0]->getConfig($per);
		$this->fcreginm->setGridcomplemento($this->grid);
	}

	public function setVars() {
		$this->mascara = Hacienda :: Cargar_mascara();

		$sql = "Select Max(length(rtrim(codcatfis))) as maximo from Fccatfis";

		$result = array ();
			if (Herramientas :: BuscarDatos($sql, & $result))
				$longitud = $result[0]["maximo"];
			else
				$longitud = 0;

		$this->params[0] = $longitud;
		$this->params[1] = $this->fcreginm->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcreginm->getFunrec();
	}

	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {

		$codigo = $this->getRequestParameter('codigo', '');
		$ajax = $this->getRequestParameter('ajax', '');
		switch ($ajax) {
			case '1' :
			        $nomcon = Herramientas::getX('rifcon','fcconrep','nomcon',$codigo);


				      $c= new Criteria();
				      $c->add(FcconrepPeer::RIFCON,trim($codigo));
				      $fcconrep2 = FcconrepPeer::doSelectOne($c);
					  $javascript='';
					  $nomcon='';

				      if (count($fcconrep2)>0)
				      {
			  	      	  //$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
				          $nomcon=$fcconrep2->getNomcon();
				          //$dircon=$fcconrep2->getDircon();
				          if ($fcconrep2->getNaccon()=='V')
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconrep_V').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconrep_E').checked=true; ";
				          }
				          if ($fcconrep2->getTipcon()=='N')
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconrep_N').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconrep_J').checked=true; ";
				          }
				      }
				      else
				      {
			   	      	//$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
				      	//$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
				      	//$javascript = $javascript . "document.getElementById('fcreginm_nomcon').removeAttribute('readonly',1);";
				      }


				      $output = '[["fcreginm_nomconrep","'.$nomcon.'",""],["javascript","' . $javascript . '",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			      return sfView::HEADER_ONLY;

			      break;

			case '2' :
					$anoava = $this->getRequestParameter('anoava', '');
					$nroinm = $this->getRequestParameter('nroinm', '');
					$this->fcreginm  =  $this->getFcreginmOrCreate();
			        $this->configGridComplemento($anoava, $nroinm);
			      break;

			case '3' :

				      $c= new Criteria();
				      $c->add(FcconrepPeer::RIFCON,trim($codigo));
				      $fcconrep2 = FcconrepPeer::doSelectOne($c);
					  $javascript='';
					  $nomcon='';

				      if (count($fcconrep2)>0)
				      {
			  	      	  //$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
				          $nomcon=$fcconrep2->getNomcon();
				          //$dircon=$fcconrep2->getDircon();
				          if ($fcconrep2->getNaccon()=='V')
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconcon_V').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_nacconcon_E').checked=true; ";
				          }
				          if ($fcconrep2->getTipcon()=='N')
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconcon_N').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcreginm_tipconcon_J').checked=true; ";
				          }
				      }
				      else
				      {
			   	      	//$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
				      	//$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
				      	//$javascript = $javascript . "document.getElementById('fcreginm_nomcon').removeAttribute('readonly',1);";
				      }


				      $output = '[["fcreginm_nomcon","'.$nomcon.'",""],["javascript","' . $javascript . '",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			      return sfView::HEADER_ONLY;
			      break;

			default :
				$output = '[["","",""],["","",""],["","",""]]';
		}

		// Instruccion para escribir en la cabecera los datos a enviar a la vista
		//$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

		// Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
		// mantener habilitar esta instrucción
		//return sfView :: HEADER_ONLY;

		// Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
		// por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

	}




  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
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

	/**
	 * Función para actualziar el grid en el post si ocurre un error
	 * Se pueden colocar aqui los grids adicionales
	 *
	 */
	public function updateError() {
		$this->configGrid();
		$this->configGridComplemento();

		$grid = Herramientas::CargarDatosGridv2($this,$this->Grid);
		$grid = Herramientas::CargarDatosGridv2($this,$this->Gridcomplemento);

		//$this->configGrid($grid[0],$grid[1]);

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
  public function saving($clasemodelo) {
    try{
	    $gridAvaluo = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGrid());
	    $gridComplemento = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGridcomplemento());
	    return Hacienda::SalvarFacinmreg($clasemodelo,$gridAvaluo,$gridComplemento);

  } catch (Exception $ex){
    return 0;
  }

	}

	/**
   * Función para colocar el codigo necesario para
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo) {
		return parent :: deleting($clasemodelo);
	}


  public function executeDesincorporacion()
  {
    $this->fcreginm = FcreginmPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->fcreginm);

	Hacienda::FacinmegDesincorporar($this->fcreginm);

	return $this->forward('facinmreg', 'list');

  }


}