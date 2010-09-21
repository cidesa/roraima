<?php

/**
 * facespdec actions.
 *
 * @package    siga
 * @subpackage facespdec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facespdecActions extends autofacespdecActions
{
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
 	  $this->setVars();
	  $this->configGrid($this->fcdeclar->getTipesp());
	  $this->configGrid_DistribuirVencimiento();
/*
	  $fec=explode('-',$this->fcdeclar->getFechainicio());
      $this->fechainicio =$fec[2]."/".$fec[1]."/".$fec[0];

      $fec=explode('-',$this->fcdeclar->getFechafin());
      $this->fechafin=$fec[2]."/".$fec[1]."/".$fec[0];
*/

		$this->fcdeclar->setFuente(Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codesp', '001'));
		$this->fcdeclar->setFrecob(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fcdeclar->getFuente()));

		$c = new Criteria();
		$c->add(FcfueprePeer::CODFUE, $this->fcdeclar->getFuente());
		$reg = FcfueprePeer::doSelectOne($c);

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

  public function setVars()
  {
  	$this->params=array();
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcdeclar->setFundec($this->fcdeclar->getFundec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcdeclar->getFundec());
  }


  public function configGrid() {
		$c = new Criteria();

		$c->add(FcesplicdetPeer :: NROCON, $this->fcdeclar->getNumref());
		$c->add(FcesplicdetPeer :: RIFCON, $this->fcdeclar->getRifcon());
		$c->add(FcesplicdetPeer :: TIPESP, $this->fcdeclar->getTipesp());
		$per = FcesplicdetPeer :: doSelect($c);

	    $this->grid = H::getConfigGrid('grid',$per);
		$this->fcdeclar->setGrid($this->grid);
	}


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
				$javascript='';
				$c = new Criteria();
				$c->add(FcesplicPeer::NROCON, $codigo);
				$reg = FcesplicPeer::doSelectOne($c);
				//H::printR($reg);
				if ($reg)
				{
					$this->fecreg = $reg->getFecreg();
					$this->rifcon = $reg->getRifcon();
					$this->nomcon = $reg->getNomcon();
					$this->dircon = $reg->getDircon();
					$this->rifrep = $reg->getRifrep();
					$this->nomconrep = $reg->getNomconrep();
					$this->dirconrep = $reg->getDirconrep();
					$this->tipesp  = $reg->getTipesp();
					$this->desesp  = $reg->getDesesp();
					$this->diresp  = $reg->getDiresp();
					$this->fecesp  = $reg->getFecesp();
					$this->horespi = $reg->getHorespi();
					$this->horespf = $reg->getHorespf();
					$this->nroent  = $reg->getNroent();
					$this->monent  = $reg->getMonent();
					$this->exoesp  = $reg->getExoesp();
					$this->texexo  = $reg->getTexexo();
					$this->numref  = $codigo;
					$this->destip = Herramientas :: getX_vacio('tipesp', 'fctipesp', 'destip', $this->tipesp);


					$c = new Criteria();
					$c->add(FcconrepPeer::RIFCON, $reg->getRifcon());
					$fcconrep2 = FcconrepPeer::doSelectOne($c);
					if ($fcconrep2)
					{
				      if (count($fcconrep2)>0)
				      {
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

    	    $output = '[["fcdeclar_destip","'.$this->destip.'",""],["fcdeclar_fecreg","'.$this->fecreg.'",""],["fcdeclar_rifcon","'.$this->rifcon.'",""],["javascript","' . $javascript . '",""],["fcdeclar_nomcom","'.$this->nomcom.'",""], ["fcdeclar_dircon","'.$this->dircon.'",""], ["fcdeclar_rifrep","'.$this->rifrep.'",""],["fcdeclar_nomconrep","'.$this->nomconrep.'",""],["fcdeclar_dirconrep","'.$this->dirconrep.'",""],["fcdeclar_tipesp","'.$this->tipesp.'",""],["fcdeclar_desesp","'.$this->desesp.'",""],["fcdeclar_diresp","'.$this->diresp.'",""],["fcdeclar_dirpro","'.$this->dirpro.'",""],["fcdeclar_horespi","'.$this->horespi.'",""],["fcdeclar_horespf","'.$this->horespf.'",""],["fcdeclar_nroent","'.$this->nroent.'",""],["fcdeclar_monent","'.$this->monent.'",""],["fcdeclar_exoesp","'.$this->exoesp.'",""],["fcdeclar_texexo","'.$this->texexo.'",""],["fcdeclar_fechainicio","'.$this->fechainicio.'",""],["fcdeclar_fechafin","'.$this->fechafin.'",""],["fcdeclar_fecesp","'.$this->fecesp.'",""]]';
	    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

        case '2':
			$tipesp = $this->getRequestParameter('tipesp','');
			$rifcon = $this->getRequestParameter('rifcon','');

			$this->fcdeclar = $this->getFcdeclarOrCreate();
			$this->fcdeclar->setNumref($codigo);
			$this->fcdeclar->setRifcon($rifcon);
			$this->fcdeclar->setTipesp($tipesp);
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


  public function executeGrid()
  {
		$numref = $this->getRequestParameter('numref','');
		$this->fcdeclar = $this->getFcdeclarOrCreate();

		$this->updateFcdeclarFromRequest();
		$this->fcdeclar->setNumdec($numref);

		//$this->calculo_declaracion($fecdec, $this->fechainicio, $this->frecuencia,$this->fcdeclar);

		$this->configGrid_DistribuirVencimiento();//["fcdeclar_desuso","'.$this->desuso.'",""]
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


  public function configGrid_DistribuirVencimiento($reg = array(),$regelim = array())
   {
   	if (count($reg) == 0)
   	{
		$c = new Criteria();
		$c->add(FcdeclarPeer :: NUMDEC, $this->fcdeclar->getNumdec());
		$c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
		$per = FcdeclarPeer :: doSelect($c);
   	}else{ $per = $reg;  }
/*
//echo $datos->getEdodec()." 66666666666";
		foreach ($per as $datos)
		{

	//		echo $datos->getEdodec()." 66666666666";
			if ($datos->getEdodec() == 'P'){
				$datos->setEdodecstatus("PAGADA55555555");
				//$datos["edodecstatus"] = "PAGADA55555555";
			}else{
				if (H::dateDiff('d',$datos->getFecven(),date('d')) <= 0){
					$datos["edodecstatus"] = "VIGENTE";
				}else{
					$datos["edodecstatus"] = "VENCIDA";
				}

			}

		//	H::printR($datos);
			//exit();
		}
*/
	    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facespdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_consulta_deuda');
	    $this->gridD = $this->columnas[0]->getConfig($per);

		$this->fcdeclar->setGriddeuda($this->gridD);

	}

  public function saving($clasemodelo)
  {
	  try{
	    $grid      = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGrid());
	    $gridDeuda = Herramientas::CargarDatosGridv2($this,$clasemodelo->getGriddeuda());
	  	return Hacienda::saveFacespdec($clasemodelo,$grid,$gridDeuda);

	  } catch (Exception $ex){
	    exit($ex);
	    return 0;
	  }

  }

  public function deleting($clasemodelo)
  {
    return Hacienda::EliminarFacespdec($clasemodelo);
  }


}
