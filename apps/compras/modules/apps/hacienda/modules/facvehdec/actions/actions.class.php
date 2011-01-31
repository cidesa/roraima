<?php

/**
 * facvehdec actions.
 *
 * @package    siga
 * @subpackage facvehdec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facvehdecActions extends autofacvehdecActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid();
		$this->configGrid_deuda();
  }


  public function setVars()
  {
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
 //   $this->fcregveh->setFunrec($this->fcregveh->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrec());
    //$this->fcregveh->setFundes($this->fcregveh->getFundes()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFundes());
    //$this->fcregveh->setFunrectra($this->fcregveh->getFunrectra()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrectra());
  }


  public function configGrid($reg = array(),$regelim = array())
   {
		$c = new Criteria();
		$c->add(FcusovehPeer :: CODUSO, $this->fcdeclar->getCoduso());
		$per = FcusovehPeer :: doSelect($c);

	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
	    $this->grid = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGrid($this->grid);
	}


  public function configGrid_deuda($reg = array(),$regelim = array())
   {
		$c = new Criteria();
		$c->add(FcdeclarPeer :: NUMDEC, $this->fcdeclar->getNumdec());
		$per = FcdeclarPeer :: doSelect($c);

	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_consulta_deuda');
	    $this->gridD = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGriddeuda($this->gridD);
	}


  public function configGrid2($reg = array(),$regelim = array())
  {

	 $sql = "Select * From FcDeclar Where FueIng IN ('20','10','52') and EdoDec<>'P' And
	 		 EdoDec<>'X' and Nombre Like '%VEHICULO%' and Nombre Like '%".$fcdeclar->getNumref()."%' and
	 		 RifCon='".$fcdeclar->getRifcon()."'";


    Herramientas :: BuscarDatos($sql, & $reg);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->grid = $this->columnas[0]->getConfig($reg);
     $this->fcregveh->setGrid($this->grid);
/*

    $this->grid = $this->columnas[0]->getConfig($per);

    $this->fcregveh->setGrid($this->grid);
*/
/*

If Buscar_Datos(DataBaseGrid, Tabla, Sql) Then
   GridMultas.Clear
   GridMultas.Rows = 1
   Do While Not Tabla.EOF
      GridMultas.Rows = GridMultas.Rows + 1
      GridMultas.TextMatrix(GridMultas.Rows - 1, 0) = ObtenerValorRegistro(Tabla!FecDec)
      GridMultas.TextMatrix(GridMultas.Rows - 1, 1) = ObtenerValorRegistro(Tabla!Nombre)
      GridMultas.TextMatrix(GridMultas.Rows - 1, 2) = Format(ObtenerValorNumericoReal(Tabla!MonDec), "###,##0.00")
      Tabla.MoveNext
   Loop
   For I = 1 To GridMultas.Rows - 1
      Acumulador = Acumulador + CDbl(GridMultas.TextMatrix(I, 2))
   Next
   TotMulta.Text = Format(Acumulador, "###,##0.00")
   MsgBox "El Contribuyente tiene Multas Por Transito"
   FrMultas.Top = 495
*/


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':

		  	  $c=new Criteria();
		      $c->add(FcregvehPeer::PLAVEH, $codigo);
		      $fcregveh = FcregvehPeer::doSelectOne($c);

		      if ($fcregveh)
		      {
					if ($fcregveh=='A') $mensaje = "REGISTRADO";
					else  $mensaje = "DESINCORPORADO";

					$this->coduso = $fcregveh->getCoduso();
				    $this->desuso = Herramientas::getX('coduso','fcusoveh','desuso',$this->coduso);
				    $this->marveh = $fcregveh->getMarveh();
				    $this->modveh = $fcregveh->getModveh();
				    $this->colveh = $fcregveh->getColveh();
				    $this->valori = $fcregveh->getValori();
				    $this->anoveh = $fcregveh->getAnoveh();
				    $this->sermot = $fcregveh->getSermot();
				    $this->sercar = $fcregveh->getSercar();
		      }


				$this->fuente = Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codveh', '001');
		        $this->frecob = Herramientas :: getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fuente);

				$c = new Criteria();
				$c->add(FcfueprePeer::CODFUE, $this->fuente);
				$reg = FcfueprePeer::doSelectone($c);

				if ($reg->getFrecob()=='999')
				{
					//$this->fechainicio = $reg->getInieje();
					//$this->fechafin    = $reg->getFineje();

					  $this->frecuencia  = '1';
			          $fec=explode('-',$reg->getInieje());
			          $this->fechainicio =$fec[2]."/".$fec[1]."/".$fec[0];

			          $fec=explode('-',$reg->getFineje());
			          $this->fechafin=$fec[2]."/".$fec[1]."/".$fec[0];

				}else{

					$this->frecuencia  = $reg->getFrecob();
			          $fec=explode('-',$reg->getInieje());
			          $this->fechainicio =$fec[2]."/".$fec[1]."/".$fec[0];

			          $fec=explode('-',$reg->getFineje());
			          $this->fechafin=$fec[2]."/".$fec[1]."/".$fec[0];
				}

//			$this->fcdeclar = $this->getFcdeclarOrCreate();
//			$this->fcdeclar->setCoduso($this->coduso);
//			$this->updateFcdeclarFromRequest();
//
//			$this->configGrid();
//			$this->calculo_declaracion($this->fecdec, $this->fechainicio, $this->frecuencia);
//
//			$this->configGrid_deuda();//["fcdeclar_desuso","'.$this->desuso.'",""]

        $output = '[["fcdeclar_coduso","'.$this->coduso.'",""],["fcdeclar_marveh","'.$this->marveh.'",""],["fcdeclar_modveh","'.$this->modveh.'",""],["fcdeclar_colveh","'.$this->colveh.'",""],["fcdeclar_valori","'.$this->valori.'",""],["fcdeclar_anoveh","'.$this->anoveh.'",""],["fcdeclar_sermot","'.$this->sermot.'",""],["fcdeclar_sercar","'.$this->sercar.'",""],["fcdeclar_fechainicio","'.$this->fechainicio.'",""],["fcdeclar_fechafin","'.$this->fechafin.'",""],["fcdeclar_desuso","'.$this->desuso.'",""]]';
        break;
/*
        case '2':

			$this->fcdeclar = $this->getFcdeclarOrCreate();
			$this->fcdeclar->setCoduso($this->coduso);
			$this->updateFcdeclarFromRequest();
echo '55555555';
H::printR($this->fcdeclar);

			$this->configGrid();
			$this->calculo_declaracion($this->fecdec, $this->fechainicio, $this->frecuencia);

			$this->configGrid_deuda();//["fcdeclar_desuso","'.$this->desuso.'",""]

        $output = '[["","",""],["","",""],["","",""]]';

        break;*/
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    //return sfView::HEADER_ONLY;
  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function executeGrid()
  {
			$this->fcdeclar = $this->getFcdeclarOrCreate();
			$this->fcdeclar->setCoduso($this->coduso);
			$this->updateFcdeclarFromRequest();
//echo '55555555';
//H::printR($this->fcdeclar);

			$this->configGrid();
			$this->calculo_declaracion($this->fecdec, $this->fechainicio, $this->frecuencia);

			$this->configGrid_deuda();//["fcdeclar_desuso","'.$this->desuso.'",""]

        $output = '[["","",""],["","",""],["","",""]]';

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

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

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  public function calculo_declaracion($FechaDia, $FechaInicio, $frecuencia)
  {
	$AnoCalculo  = 0;
    $FechaDia    = date('d-m-Y');
    $FechaUltima = false;

	// FALTA -->  NumPor = Calcular_Numero_Porciones
	if (substr($this->fechainicio,0,2) == '01') $FechaUltima = true;
	$datos = Constantes::Porciones();
	$fportion = $datos[$frecuencia];

	Hacienda::DistribuirVencimiento($FechaDia, $FechaInicio, $frecuencia, $fportion, $this->grid["datos"], &$grid);

	//H::printR($grid);
	$this->configGrid_DistribuirVencimiento();
  }


  public function configGrid_DistribuirVencimiento()
   {
		$c = new Criteria();
		$c->add(FcdeclarPeer :: NUMDEC, $this->fcdeclar->getNumdec());
		$per = FcdeclarPeer :: doSelect($c);

	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_consulta_deuda');
	    $this->gridD = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGriddeuda($this->gridD);
	}

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
