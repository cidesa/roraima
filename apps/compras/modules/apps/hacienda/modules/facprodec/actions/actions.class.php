<?php

/**
 * facprodec actions.
 *
 * @package    siga
 * @subpackage facprodec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facprodecActions extends autofacprodecActions
{
	//public $params=array();

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid();
		$this->configGrid_DistribuirVencimiento();

		$this->fcdeclar->setFuente(Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codveh', '001'));
		$this->fcdeclar->setFrecob(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fcdeclar->getFuente()));

		$c = new Criteria();
		$c->add(FcfueprePeer::CODFUE, $this->fcdeclar->getFuente());
		$reg = FcfueprePeer::doSelectOne($c);
		if ($reg) {

		if ($reg->getFrecob()=='999')
		{
			$this->fcdeclar->setFportion('1');
			$this->fcdeclar->setFechainicio($reg->getInieje());
			$this->fcdeclar->setFechafin($reg->getFineje());
		}else{
			$this->fcdeclar->setFrecuencia($reg->getFrecob());
			$this->fcdeclar->setFechainicio($reg->getInieje());
			$this->fcdeclar->setFechafin($reg->getFineje());
		}
		}

  }

  public function setVars()
  {
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
 //   $this->fcregveh->setFunrec($this->fcregveh->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrec());
    //$this->fcregveh->setFundes($this->fcregveh->getFundes()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFundes());
    //$this->fcregveh->setFunrectra($this->fcregveh->getFunrectra()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrectra());



	$this->fuente = Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codveh', '001');
    //$this->frecob = Herramientas :: getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fuente);

	$c = new Criteria();
	$c->add(FcfueprePeer::CODFUE, $this->fuente);
	$reg = FcfueprePeer::doSelectone($c);
	//H::printR($reg);
//echo $this->fuente." kkkkkkk";
   if ($reg) {
	if ($reg->getFrecob()=='999')
	{
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
   }

  }


  public function configGrid($reg = array(),$regelim = array())
   {
		//Sql = "Select * From Fcprolicdet Where nrocon='" + DatosIns(0).Text + "' and rifcon='" + FILL(DatosIns(1).Text, " ", 14, 3) + "' and
		//TipPro='" + DatosIns(9).Text + "'"

		$c = new Criteria();
		$c->add(FcprolicdetPeer :: NROCON, $this->fcdeclar->getNumref());
		$c->add(FcprolicdetPeer :: RIFCON, $this->fcdeclar->getRifcon());
		$c->add(FcprolicdetPeer :: TIPPRO, $this->fcdeclar->getTippro());
		$per = FcprolicdetPeer :: doSelect($c);

	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facprodec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
	    $this->grid = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGrid($this->grid);
	}


  public function configGrid_DistribuirVencimiento($reg = array(),$regelim = array())
   {
   	if (count($reg) == 0)
   	{
		$c = new Criteria();
		$c->add(FcdeclarPeer :: NUMDEC, $this->fcdeclar->getNumdec());
		$per = FcdeclarPeer :: doSelect($c);
   	}else{ $per = $reg;  }

//H::printR($per);
	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facprodec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_consulta_deuda');
	    $this->gridD = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGriddeuda($this->gridD);

	}

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
				$javascript='';
				$c = new Criteria();
				$c->add(FcprolicPeer::NROCON, $codigo);
				$reg = FcprolicPeer::doSelectOne($c);
				if ($reg)
				{

				//	H::printR($reg);
					$this->fecreg = $reg->getFecreg();

					$this->rifcon = $reg->getRifcon();
					$this->nomcon = $reg->getNomcon();
					$this->dircon = $reg->getDircon();
					$this->rifrep = $reg->getRifrep();
					$this->nomconrep = $reg->getNomconrep();
					$this->dirconrep = $reg->getDirconrep();
					$this->texpub = $reg->getTexpub();
					$this->tippro = $reg->getTippro();
					$this->despro = $reg->getDespro();
					$this->dirpro = $reg->getDirpro();


					$c = new Criteria();
					$c->add(FcconrepPeer::RIFCON, $reg->getRifcon());
					$fcconrep2 = FcconrepPeer::doSelectOne($c);
					if ($fcconrep2)
					{
				      if (count($fcconrep2)>0)
				      {
			  	      	  ///$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
//				          $nomcon=$fcconrep2->getNomcon();
	//			          $dircon=$fcconrep2->getDircon();
				          if ($fcconrep2->getNaccon()=='V')
				          {
				          	$javascript = $javascript . "$('fcdeclar_nacconrep_V').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcdeclar_nacconrep_E').checked=true; ";
				          }
				          if ($fcconrep2->getTipcon()=='N')
				          {
							$javascript = $javascript . "$('fcdeclar_tipconrep_N').checked=true; ";
				          }
				          else
				          {
				          	$javascript = $javascript . "$('fcdeclar_tipconrep_J').checked=true; ";
				          }
				      }
				      else
				      {
			  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
				      }
					}

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


//			H::printR($this->fcdeclar);exit();


			//$this->updateFcdeclarFromRequest();
//
//			$this->configGrid();
//			$this->calculo_declaracion($this->fecdec, $this->fechainicio, $this->frecuencia);
//
//			$this->configGrid_deuda();//["fcdeclar_desuso","'.$this->desuso.'",""]

    	    $output = '[["fcdeclar_nomconrep","'.$this->nomconrep.'",""],["fcdeclar_dirconrep","'.$this->dirconrep.'",""],["javascript","' . $javascript . '",""],["fcdeclar_rifcon","'.$this->rifcon.'",""], ["fcdeclar_nomcon","'.$this->nomcon.'",""],["fcdeclar_dircon","'.$this->dircon.'",""], ["fcdeclar_rifrep","'.$this->rifrep.'",""], ["fcdeclar_tippro","'.$this->tippro.'",""],["fcdeclar_texpub","'.$this->texpub.'",""],["fcdeclar_dirpro","'.$this->dirpro.'",""],["fcdeclar_despro","'.$this->despro.'",""],["fcdeclar_fechainicio","'.$this->fechainicio.'",""],["fcdeclar_fechafin","'.$this->fechafin.'",""]]';

	    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

		    return sfView::HEADER_ONLY;

        break;

        case '2':
			$tippro = $this->getRequestParameter('tippro','');
			$rifcon = $this->getRequestParameter('rifcon','');

			$this->fcdeclar = $this->getFcdeclarOrCreate();
			$this->fcdeclar->setNumref($codigo);
			$this->fcdeclar->setRifcon($rifcon);
			$this->fcdeclar->setTippro($tippro);
			$this->updateFcdeclarFromRequest();

			$this->configGrid();
        $output = '[["","",""],["","",""],["","",""]]';

        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

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
  try{
    $grid      = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGrid());
    $gridDeuda = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGriddeuda());

    $clasemodelo->setFechainicio($this->fechainicio);
    $clasemodelo->setFechafin($this->fechafin);
    $clasemodelo->setFuente($this->fuente);
  	return Hacienda::saveFacprodec($clasemodelo,$grid,$gridDeuda);

  } catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }


  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


  public function executeGrid()
  {
			$this->setVars();
  			$fecdec = $this->getRequestParameter('fecdec','');
  			$tippro = $this->getRequestParameter('tippro','');
			$rifcon = $this->getRequestParameter('rifcon','');

			$this->fcdeclar = $this->getFcdeclarOrCreate();
			$this->fcdeclar->setTippro($tippro);
			$this->fcdeclar->setRifcon($rifcon);
			$this->updateFcdeclarFromRequest();

			$this->calculo_declaracion($fecdec, $this->fechainicio, $this->frecuencia,$this->fcdeclar);

			//$this->configGrid_deuda();//["fcdeclar_desuso","'.$this->desuso.'",""]

        $output = '[["","",""],["","",""],["","",""]]';

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }


  public function calculo_declaracion($FechaDia, $FechaInicio, $frecuencia,$clasemodelo)
  {
	$AnoCalculo  = 0;
    $FechaDia    = date('d-m-Y');
    $FechaUltima = false;

	// FALTA -->  NumPor = Calcular_Numero_Porciones
	if (substr($this->fechainicio,0,2) == '01') $FechaUltima = true;
	$datos = Constantes::Porciones();
	$fportion = $datos[$frecuencia];

	Hacienda::DistribuirVencimientoPropaganda($FechaDia, $FechaInicio, $frecuencia, $fportion, $this->grid["datos"], &$grid,$clasemodelo);

	$this->configGrid_DistribuirVencimiento($grid);
  }
}
