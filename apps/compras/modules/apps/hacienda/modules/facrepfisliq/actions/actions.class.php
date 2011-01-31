<?php

/**
 * facrepfisliq actions.
 *
 * @package    siga
 * @subpackage facrepfisliq
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facrepfisliqActions extends autofacrepfisliqActions
{

	protected $mostrargrid=false;

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->setVars();
	$this->configGrid($this->fcrepfis->getNumlic());
	$this->configGridDistribucion();

  }


	public function setVars() {
		$this->params[0] = $this->fcrepfis->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcrepfis->getFunrec();
		$this->params[1] = Herramientas::getX('codemp','fcdefins','unipic','001');
		$this->params[2] = Herramientas::getX('codemp','fcdefins','valunitri','001');
		$this->params[3] = false;
	}

  public function configGrid($numdoc) {

        if($numdoc != ''){
  		$per=array();
		$c = new Criteria();
		$c->add(FcactpicPeer :: NUMDOC, $numdoc);
		$c->add(FcactpicPeer :: MODO, 'D');
		$per = FcactpicPeer :: doSelect($c);

               /* if ($reg){
                    $i = 0;
                    foreach($reg as $val){
                        $per[$i]['anodec'] = $reg->getAnodec();
                        $per[$i]['codact'] = $reg->getCodact();
                        $per[$i]['desact'] = $reg->getDesact();
                        $i++;
                    }
                }*/
		//$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrepfisliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
		//$this->grid = $this->columnas[0]->getConfig($per);

                $this->grid =  Herramientas::getConfigGrid('grid',$per);
		$this->fcrepfis->setGrid($this->grid);
	}else{
            $per=array();
            //$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrepfisliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
            //$this->grid = $this->columnas[0]->getConfig($per);
            $this->grid =  Herramientas::getConfigGrid('grid',$per);
            $this->fcrepfis->setGrid($this->grid);
        }
  }

  public function configGridDistribucion($registro=array()) {

  		$per=array();
  		if ($registro)
  		{
  			//H::printR($registro);exit();
	  		foreach ($registro[0] as $key => $dat)
	  		{
	  			if ($dat->getMtrcon() > 0)
	  			{
		  			$per[$key]["id"]  = '9';
					$per[$key]["numrep"]  = str_pad($key+1,2,'0',STR_PAD_LEFT);
					$per[$key]["fecha"]   = '31/12/'.$dat->getAnodec();
					$per[$key]["descrip"] = 'IMPUESTO CAUSADO NO DECLARADO, AÑO '. $dat->getAnodec();
					$per[$key]["tipo"]    = Herramientas::getX_vacio('codfue','fcfuepre','nomabr', $this->fcrepfis->getFuerep());
					$per[$key]["mtrcon"]  = H::FormatoMonto($dat->getMtrcon());
					$per[$key]["codfue"]  = Herramientas::getX_vacio('codfue','fcfuepre','codfue', $this->fcrepfis->getFuerep());
	  			}
	  		}
			$key++;
  			$per[$key]["id"]  = '9';
			$per[$key]["numrep"]  = str_pad($key+1,2,'0',STR_PAD_LEFT);
			$per[$key]["fecha"]   = H::DiasHabiles($this->fcrepfis->getFecrep());
			$per[$key]["descrip"] = 'MULTA ILICITO MATERIAL';
			$per[$key]["tipo"]    = Herramientas::getX_vacio('codfue','fcfuepre','nomabr', $this->fcrepfis->getFuesan());
			$per[$key]["mtrcon"]  = H::FormatoMonto(0);
			$per[$key]["codfue"]  = Herramientas::getX_vacio('codfue','fcfuepre','codfue', $this->fcrepfis->getFuesan());
  		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrepfisliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_distribucion');
		$this->grid2 = $this->columnas[0]->getConfig($per);
		$this->fcrepfis->setGriddistribucion($this->grid2);

	}



  public function executeAjax()
  {
	$codigo = $this->getRequestParameter('codigo', '');
	$fecha = str_replace('/','-',$this->getRequestParameter('fecha'));
	$ajax = $this->getRequestParameter('ajax', '');
	switch ($ajax) {
		case '1' :
			$codigo = str_pad($codigo,10,"0",STR_PAD_LEFT);
			$c = new Criteria();
			$c->add(FcsollicPeer::STASOL, 'A');
			$c->add(FcsollicPeer::NUMSOL, $codigo);
			$reg = FcsollicPeer::doselectone($c);
			$javascript='';
			if ($reg)
			{
				$nomneg = $reg->getNomneg();
				$fecven = $reg->getFecven();
				$stalic = $reg->getStalic();
				$nomcon = Herramientas::getX('numlic','fcrepfis','numlic',$codigo);
				$feccie = Herramientas::getX('codfue','fcfuepre','feccie','01');

				$rifcon = $reg->getRifcon();
				$nomcon = $reg->getNomcon();
				$dircon = $reg->getDircon();
				$rifrep = $reg->getRifrep();

                            $dateFormat = new sfDateFormat('es_VE');
                            $feccie = substr($dateFormat->format($feccie, 'i', $dateFormat->getInputPattern('d')),2,10);  //se utilizo el substr por que traia la fecha mal
	                 																							  //2001-01-2009
			    $DecCerrada = (H::DateDiff('d',$feccie,$fecha) > 0);
				if (($stalic=='V') or ($stalic=='E'))
				{
					if ((H::DateDiff('d',$fecven,date('Y-m-d')) < 0 ) or ($DecCerrada) )
					{

						if (H::DateDiff('d',$fecven,date('Y-m-d')) > 0 ){  $javascript=  $javascript . "alert('Licencia esta Vencida. Debe Renovar la licencia luego de Realizar la Declaracion');"; }
					}else{
						$javascript=$javascript . "alert('Licencia esta Vencida. Debe Renovar la licencia antes de Realizar la declaracion');";
					}

				}else if ($stalic=='C'){  $javascript = $javascript."alert('Licencia fue Cancelada');";

				}else if ($stalic=='S'){  $javascript = $javascript."alert('Licencia fue Suspendida');";
				}


				if ($nomcon=='<!Registro no Encontrado o Vacio!>'){  $javascript = $javascript."alert('Esta Licencia tiene uno o varios Reparos Fiscales.');"; }

			      $c= new Criteria();
			      $c->add(FcconrepPeer::RIFCON,trim($rifcon));
			      $fcconrep2 = FcconrepPeer::doSelectOne($c);

				//Constribuyente
			      if (count($fcconrep2)>0)
			      {
			          if ($fcconrep2->getNaccon()=='V')
			          {
			          	$javascript = $javascript . "$('fcrepfis_naccon_V').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_naccon_E').checked=true; ";
			          }
			          if ($fcconrep2->getTipcon()=='N')
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipcon_N').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipcon_J').checked=true; ";
			          }
			      }

				//Representante
			      $c= new Criteria();
			      $c->add(FcconrepPeer::RIFCON,trim($rifrep));
			      $fcconrep2 = FcconrepPeer::doSelectOne($c);

			      if (count($fcconrep2)>0)
			      {
					$nomconrep = $fcconrep2->getNomcon();
					$dirconrep = $fcconrep2->getDircon();

			          if ($fcconrep2->getNaccon()=='V')
			          {
			          	$javascript = $javascript . "$('fcrepfis_nacconrep_V').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_nacconrep_E').checked=true; ";
			          }
			          if ($fcconrep2->getTipcon()=='N')
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipconrep_N').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipconrep_J').checked=true; ";
			          }
			      }
			}

                          $this->fcrepfis  =  $this->getFcrepfisOrCreate();
                          $this->updateFcrepfisFromRequest();
			  $this->configGrid($codigo);

			  $output = '[["fcrepfis_numlic","10","c"],["fcrepfis_nomneg","'.$nomneg.'",""],["fcrepfis_rifcon","'.$rifcon.'",""],["fcrepfis_nomcon","'.$nomcon.'",""],["fcrepfis_dircon","'.$dircon.'",""],["fcrepfis_rifrep","'.$rifrep.'",""], ["javascript","' . $javascript . '",""],["fcrepfis_nomconrep","'.$nomconrep.'",""],["fcrepfis_dirconrep","'.$dirconrep.'",""]]';
		          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

		      break;

		case '2' :/*
		 	     $id = $this->getRequestParameter('id', '');

		 	     if (!$id)
		 	     {
			     	$this->fcrepfis  =  $this->getFcrepfisOrCreate();
					$this->updateFcreginmFromRequest();
					$this->configGrid($this->fcrepfis->getNumlic());
					H::printR($this->fcrepfis);exit();
					H::printR($this->fcrepfis->getGrid()); exit();
					$detalle=Herramientas::CargarDatosGridv2($this,$grid);
			     	//H::printR($this->fcrepfis);
			     	echo "5555555";
			     	H::printR($detalle);

			     	exit();
			     	$this->configGridDistribucion($codigo);

		 	     }
		 	        $output = '[["","",""],["","",""],["","",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			      return sfView::HEADER_ONLY;*/
			break;
      default:
 	     $id = $this->getRequestParameter('id', '');

 	     if (!$id)
 	     {
 	     	$this->params=array();
 	     	$this->params[3] = true;
	     	$this->fcrepfis  =  $this->getFcrepfisOrCreate();
	     	$this->updateFcrepfisFromRequest();

	     	$this->configGrid($this->fcrepfis->getNumlic());
	     	$grid=Herramientas::CargarDatosGridv2($this,$this->grid);
//	     	$registro = $this->grid['datos'];
	     	$this->configGridDistribucion($grid);

 	     }
 	        $output = '[["","",""],["","",""],["","",""]]';
	        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
//	      return sfView::HEADER_ONLY;
    }


  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid2);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
	    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	    $gridD = Herramientas::CargarDatosGridv2($this,$this->grid2);
	    return Hacienda::salvarFacrepfisliq($clasemodelo, $grid, $gridD);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
