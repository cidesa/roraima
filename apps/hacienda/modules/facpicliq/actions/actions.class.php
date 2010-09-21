<?php

/**
 * facpicliq actions.
 *
 * @package    Roraima
 * @subpackage facpicliq
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facpicliqActions extends autofacpicliqActions
{
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->setVars();
    $this->configGridactcom($this->fcdeclar);
 //  $this->configGriddisdeu_Nuevo($this->fcdeclar);
   $this->configGriddisdeu();
  }


  public function setVars()
  {
	$this->params='';
  	$this->params[0] = Herramientas::getX_vacio('codemp','fcdefins','codpic','001');
  	$this->params[1] = Herramientas::getX_vacio('codemp','fcdefins','codajupic','001');
  	$this->params[2] = Herramientas::getX_vacio('codemp','fcdefins','unipic','001');
  	$this->params[3] = Herramientas::getX_vacio('codemp','fcdefins','valunitri','001');

  	$c= new Criteria();
  	$c->add(FcfueprePeer::CODFUE, $this->params[1]);
  	$fcfuepre = FcfueprePeer::doselectone($c);

  	if ($fcfuepre){
  		$this->params[4] = $fcfuepre->getTipven();  //Tipven
  		$this->params[5] = $fcfuepre->getDiaven();  //DiasVencAju
  	}else{
  		$this->params[4] = "I";  //Tipven
  		$this->params[5] = 0;  //DiasVencAju

  	}

  }

  public function configGridactcom_amlo($reg = array(),$regelim = array())
  {
  	//$this->configGriddisdeu_Nuevo($fcdeclar);
  	echo $this->fcdeclar->getNumref();
	$c = new Criteria();
	$c->add(FcactpicPeer::NUMDOC,$this->fcdeclar->getNumref());
	$c->add(FcactpicPeer::ANODEC,$this->fcdeclar->getAnodec());
	$c->add(FcactpicPeer::ANODEC,$this->fcdeclar->getAnodec());
	$reg = FcactpicPeer::doselect($c);
//Select * from FCACTPIC where NumDoc='" + DatosIns(0).Text + "' and coalesce(AnoDec,' ')=' '"
	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fcactacom_edit');
    $this->columnas[1][0]->setCatalogo('fcactcom','sf_admin_edit_form', array('codact'=>'1','desact'=>'2'), 'Facpicliq_Fcactcom', array( 'param1'=>"'+$(fcdeclar_anodec).value+'" ) );

	$this->obj = $this->columnas[0]->getConfig($reg);
	$this->fcdeclar->setGridactcom($this->obj);
	//exit();
  }



  //public function configGriddisdeu_Nuevo($fcdeclar)
  public function configGridactcom($fcdeclar,$numref='')
  {
  	if (!$this->primeravez)
  	{
	  	if (!$fcdeclar->getId())
	  	{
			if ($fcdeclar->getModo()=='E'){
				$anodec = $fcdeclar->getAnodec()-1;
				$c=new Criteria();
				$c->add(FcactpicPeer::NUMDOC, $fcdeclar->getNumref());
				$c->add(FcactpicPeer::ANODEC, ($fcdeclar->getAnodec()-1));
				$c->add(FcactpicPeer::MODO, 'D');
				$reg = FcactpicPeer::doselect($c);
			}else{
				$anodec = $fcdeclar->getAnodec();
				$c=new Criteria();
				$c->add(FcactpicPeer::NUMDOC, $fcdeclar->getNumref());
				$c->add(FcactpicPeer::ANODEC, $fcdeclar->getAnodec());
				$c->add(FcactpicPeer::MODO, 'E');
				$reg = FcactpicPeer::doselect($c);

			}
	  	}else{
			if ($fcdeclar->getModo()=='E'){
				$c=new Criteria();
				$c->add(FcactpicPeer::NUMDOC, $fcdeclar->getNumref());
				$c->add(FcactpicPeer::ANODEC, $fcdeclar->getAnodec());
				$c->add(FcactpicPeer::MODO, 'E');
				$reg = FcactpicPeer::doselect($c);
			}else{

				$c=new Criteria();
				$c->add(FcactpicPeer::NUMDOC, $fcdeclar->getNumref());
				$c->add(FcactpicPeer::ANODEC, $fcdeclar->getAnodec());
				$c->add(FcactpicPeer::MODO, 'D');
				$reg = FcactpicPeer::doselect($c);

			}
			$anodec = $fcdeclar->getAnodec();

	  	}
  	}else{
  			$output= array();
  			$reg = array();
			$sql = "Select * from FCACTPIC where NumDoc='".$numref."' and coalesce(AnoDec,' ')=' '";
			if (!Herramientas::BuscarDatos($sql, &$output))
			{
				$c=new Criteria();
				$c->add(FcactpicPeer::NUMDOC, $numref);
				$c->add(FcactpicPeer::MODO, 'M');
				$reg = FcactpicPeer::doselect($c);

			}
			$anodec = $fcdeclar->getAnodec();
  	}

    foreach ($reg as $datos)
    {
		    $MontoaComparar = 0;
		    $MontoIngreso = $datos->getMonact();
		    $c = new Criteria();
		    $c->add(FcactcomPeer::CODACT,$datos->getCodact());
		    $c->add(FcactcomPeer::ANOACT,$anodec);
		    $fcactcom = FcactcomPeer::doselectone($c);

			if ($fcactcom)
			{
				$datos->setDesact($fcactcom->getDesact());
				$MontoaComparar = $fcactcom->getMintri() * $this->params[3]; //valunitri
				$PorDec = 1;
				$FactorSer = 1;

				if ($fcactcom->getMinofac()=='F')
				{
					$datos->setMonbru($MontoIngreso * $PorDec * $FactorSer * $fcactcom->getAfoact());
				}else{
					$datos->setMonbru(($MontoIngreso * $PorDec * $FactorSer * $fcactcom->getAfoact() /100 ));
				}

				if ($datos->getMonbru() <= $MontoaComparar)
				{
					$datos->setMonbru($MontoaComparar);
				}else{
					$datos->setMonbru($datos->getMonbru());
				}

				$datos->setImppag(H::FormatoMonto($datos->getMonbru() - $datos->getMonexo() - $datos->getMonreb() ));
				$datos->setMonbru(	H::FormatoMonto($datos->getMonbru()) );
			}
    }

	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fcactacom_edit');

	$this->obj = $this->columnas[0]->getConfig($reg);
	$this->fcdeclar->setGridactcom($this->obj);
  }


  public function configGriddisdeu($reg = array(),$regelim = array())
  {
    $this->c = new Criteria();
	$sub = $this->c->getNewCriterion(FcdeclarPeer :: FUEING, $this->params[0]);
    $sub->addOr($this->c->getNewCriterion(FcdeclarPeer :: FUEING, $this->params[1]));

    $codfue = $this->params[0];
	$opc2=("Fcdeclar.fueing in (SELECT CODFUEGEN FROM FCFUENTESMUL WHERE CODFUE='$codfue')");
	$sub->addOr($this->c->getNewCriterion(FcdefinsPeer :: FORACT, $opc2, Criteria :: CUSTOM));

	$this->c->add($sub);
	$this->c->add(FcdeclarPeer :: NUMDEC, $this->fcdeclar->getNumdec());
    $reg = FcdeclarPeer::doSelect($this->c);


	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_disdeu_edit');
    //$this->columnas[1][0]->setCatalogo('fcactcom','sf_admin_edit_form', array('codact'=>'1','desact'=>'2'), 'Facpicliq_Fcactcom', array( 'param1'=>"'+$(fcdeclar_anodec).value+'" ) );

	$this->obj = $this->columnas[0]->getConfig($reg);
	$this->fcdeclar->setGriddisdeu($this->obj);
  }


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');

    switch ($ajax){
      case '1':

      $DecCerrada = false;
      $fecdec = $this->getRequestParameter('fecdec','');
      $javascript='';

      $c=new Criteria();
      $c->add(FcsollicPeer::STALIC, 'V');
      $c->add(FcsollicPeer::NUMLIC, $codigo);
      $fcsollic = FcsollicPeer::doSelectOne($c);

      if ($fcsollic)
      {
		$numlic = Herramientas::getX_vacio('numlic','fcrepfis','numlic',$codigo);
        if (count($numlic) > 1){ $javascript="alert('Esta Licencia tiene $cnumlic Reparos Fiscales')";}

		$destiplic = Herramientas::getX_vacio('codtiplic','fctiplic','destiplic',$fcsollic->getCodtiplic());
        if (H::dateDiff('d',$fcsollic->getFecven(),$fecdec) > 0)
        {
        	$javascript= H::iif($javascript, $javascript.',', '') ."$('estado').show()";
        	$DecCerrada = true;
        }

		$cnumlic = count($numlic);

        if ($fcsollic->getCodtiplic()=="000004"){
        	 $javascript= H::iif($javascript, $javascript.',', '') . "alert('Licencia es de Tipo, ECONOMIA SOCIAL')";
        }else{

        	if ((H::dateDiff('d',$fcsollic->getFecven(),$fecdec) < 0) or $DecCerrada){
	        	if ((H::dateDiff('d',$fcsollic->getFecven(),$fecdec) > 0) ){
					$javascript= H::iif($javascript, $javascript.',', '') . "alert('Licencia esta Vencida. Debe Renovar la licencia Luego de Realizar la declaracion')";
    	    	}
        	}
        }


		$this->fcdeclar = $this->getFcdeclarOrCreate();
		$this->updateFcdeclarFromRequest();
		$this->setVars();

        //$sql = "Select AnoDec as FecAno,Modo from FCDeclar where Numref='$codigo' and (modo='D' or modo='E') ORDER BY AnoDec DESC,FecDec Desc,modo";
        $c = new Criteria();
		$opc2 = $c->getNewCriterion(FcdeclarPeer :: MODO, 'D');
		$c->addOr($c->getNewCriterion(FcdeclarPeer :: MODO, 'E'));
		$c->add(FcdeclarPeer::NUMREF, $codigo);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: ANODEC);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: FECDEC);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: MODO);
		$fcdeclar = FcdeclarPeer::doSelectone($c);

		$anodec='';
		$this->primeravez = true;
	    if ($fcdeclar)
	    {
			if ($fcdeclar->getAnodec()!=''){
				$this->primeravez = false;
				if ($fcdeclar->getModo()=='D'){
					$modo = true;  //fcdeclar_modo_E
					$anodec = $fcdeclar->getAnodec();  // FALTAR SUMAR 1
					$javascript = H::iif($javascript, $javascript.',', '') . "$('fcdeclar_modo_E').checked = true";
					//Hacienda::Calcular_Ajuste();
				}else{

					$anodec = $fcdeclar->getAnodec();
					$javascript = H::iif($javascript, $javascript.',', '') . "$('fcdeclar_modo_D').checked = true";
					self::gridCalculoDeclaracion($fcdeclar,$this->params);
				}
               //BLOQUEAR LA CAJA DE TEXTO DE A#o de Declaracion
               $javascript =  H::iif($javascript, $javascript.',', '') . "$('fcdeclar_anodec').readOnly= true";
			}
	    }


		$fcdeclar = H::iif($fcdeclar, $fcdeclar, $this->fcdeclar);
		$this->configGridactcom($fcdeclar,$codigo);
		//$this->configGriddisdeu();

	    }
		$this->estser = $fcsollic->getEstser(); //Factor para calcular en el grid ******** COLOCARLO    ***********
		$this->capsoc = $fcsollic->getCapsoc(); //CapitalSocial para calcular en el grid ******** COLOCARLO    ***********

		//Constribuyente
		 $javascript =  H::iif($javascript, $javascript.',', '') . H::iif($fcsollic->getNacconcon()=='V', "$('fcdeclar_nacconsol_V').checked = true", "$('fcdeclar_nacconsol_E').checked = true");  //Venezolano Extranjero
		 $javascript = $javascript.', '. H::iif($fcsollic->getTipconcon()=='N', "$('fcdeclar_tipconsol_N').checked = true", "$('fcdeclar_tipconsol_J').checked = true");  //Nacional Juridico

		//Representante Legal
		 $javascript = $javascript.', '. H::iif($fcsollic->getNacconrep()=='V', "$('fcdeclar_naccon_V').checked = true", "$('fcdeclar_naccon_E').checked = true");  //Venezolano Extranjero
		 $javascript = $javascript.', '. H::iif($fcsollic->getTipconrep()=='N', "$('fcdeclar_tipcon_N').checked = true", "$('fcdeclar_tipcon_J').checked = true");  //Nacional Juridico

          $output = '[["'.$cajtexmos.'","'.$fcsollic->getNomneg().'",""],["fcdeclar_numlic","'.$fcsollic->getNumlic().'",""],["fcdeclar_numlic","3","c"],["fcdeclar_rifcon","'.$fcsollic->getRifcon().'",""], ["fcdeclar_nomconsol","'.$fcsollic->getNomcon().'",""], ["fcdeclar_dirconsol","'.$fcsollic->getDircon().'",""] ,["fcdeclar_anodec","'.$anodec.'",""], ["fcdeclar_rifrep","'.$fcsollic->getRifrep().'",""], ["fcdeclar_nomcon","'.$fcsollic->getNomconrep().'",""], ["fcdeclar_dircon","'.$fcsollic->getDirconrep().'",""], ["javascript","'.$javascript.'",""], ["fcdeclar_fundec","'.$fcdeclar->getFundec().'",""], ["fcdeclar_fecini","'.$fcdeclar->getFecini('d/m/Y').'",""], ["fcdeclar_feccie","'.$fcdeclar->getFeccie('d/m/Y').'",""], ["fcdeclar_destiplic","'.$destiplic.'",""] ]' ;

        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';

    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  public function gridCalculoDeclaracion($fcdeclar,$params)
  {
  	$reg=array();
  	if ($params[1])
	{
		$reg[0]["numero"]='01';
		$MontoAjuste = 0;
		if ($params[4]=='I')
		{
			$reg[0]["fecven"] = Herramientas::dateAdd('d',$params[5],$fcdeclar->getFecini(),'+');
		}else{
			$reg[0]["fecven"] = Herramientas::dateAdd('d',$params[5],$fcdeclar->getFeccie(),'+');
		}
		$reg[0]["nombre"] = "Ajuste a Declaracion del Año ". $fcdeclar->getAnodec();
		$reg[0]["tipo"] = "AJU";
		$reg[0]["mondec"] = $MontoAjuste;

		if ($MontoAjuste <> 0){
			$reg[0]["edodecstatus"] = "VENCIDA";
		}else{
			$reg[0]["edodecstatus"] = "PAGADA";
		}

		//$reg[0]["edodecstatus"] = $params[4]; //FuenteAjuste;
		$reg[0]["id"] = '';

             //Ajustado = True

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facpicliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_disdeu_edit');

		$this->obj = $this->columnas[0]->getConfig($reg);
		$this->fcdeclar->setGriddisdeu($this->obj);
	}
  }


  /*public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');

    $codcta = $grid[$fila][1];
    //$monimp = $grid[$fila][2];

    $c = new Criteria();
    $c->add(Contabc1Peer::CODCTA,$codcta);
    $reg = Contabc1Peer::doSelectOne($c);

    if(!$reg) {
      $grid[$fila][5] = H::FormatoMonto($grid[$fila][5]);
      // enviar mensaje
    }else {
      if($reg[0][3]=='D') {
      	$grid[$fila][5]=H::FormatoMonto('');
        //$mondis = H::Monto_disponible($codpre);
      }else {
        if($reg[0][3]=='C') {
          $grid[$fila][4]=H::FormatoMonto('');
        }
      }
    }

    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }*/


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->configGridactcom();
       $gridacteco = Herramientas::CargarDatosGrid($this,$this->obj);

       $resp = Hacienda::validarFacpicliq($this->facpicliq,$gridacteco);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

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
  	$this->setVars();
    $this->configGridactcom($this->fcdeclar);
    $this->configGriddisdeu();

    $gridActCom = Herramientas::CargarDatosGridv2($this,$this->fcdeclar->getGridactcom());
    $gridDisDeu = Herramientas::CargarDatosGridv2($this,$this->fcdeclar->getGriddisdeu());
  }

  public function saving($clasemodelo)
  {
  	//Hacienda::ValidarDeclaracionUnica($clasemodelo);
    $gridActCom = Herramientas::CargarDatosGridv2($this,$this->fcdeclar->getGridactcom());
    $gridDisDeu = Herramientas::CargarDatosGridv2($this,$this->fcdeclar->getGriddisdeu());

//  	return Hacienda::salvarFacpicliq($clasemodelo, $gridActCom, $gridDisDeu);
    //parent::saving($clasemodelo);

  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
