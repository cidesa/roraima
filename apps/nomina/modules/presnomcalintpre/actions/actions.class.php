<?php
/**
 * presnomcalintpre actions.
 *
 * @package    Roraima
 * @subpackage presnomcalintpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomcalintpreActions extends autopresnomcalintpreActions {

  public function executeIndex()
  {
    return $this->forward('presnomcalintpre', 'edit');
  }


  public function TraerDatosTrabajador() {
    $sql = "Select cedemp,nomemp,fecing,fecret From NPHojInt Where CodEmp = '" . $this->codemp . "'";
    if (H :: BuscarDatos($sql, & $rstemp)) {
      $this->nomemp = $rstemp[0]["nomemp"];
      $this->cedemp = $rstemp[0]["cedemp"];
      $sql1 = "Select feccal from NPASIEMPCONT Where CodEmp = '" . $this->cedemp . "'";
      if (H :: BuscarDatos($sql1, & $rsnpasiempcont)) {
        $this->fecing = $rsnpasiempcont[0]["feccal"];
      } else {
        $this->fecing = $rstemp[0]["fecing"];
      }
      if ($this->feccor == "") {
        if (trim($rstemp[0]["fecret"]) != "") {
          $this->feccor = $rstemp[0]["fecret"];
        }
      }
      return '1';
    } else
      return '0';
  }

  public function UltimoRegistroTrabajador() {
    //verificar si el empleado esta registrado en la tabla NPSalInt
    $strSQL = "Select Max(FecFinCon) as fecha,codcon  From NPSalInt Where CodEmp = '" . $this->codemp . "'   Group By CodEmp,CodCon order by fecha desc";
    if (H :: BuscarDatos($strSQL, & $rstemp)) {
      $ultimo = $rstemp[0]["fecha"];
      $strCodCon = $rstemp[0]["codcon"];
      $strCodCon1 = $strCodCon;
    } else {
      $ultimo = "";
      $strCodCon = "";
      $strCodCon1 = "";
    }
    if ($strCodCon1 != '') {
      $this->tipcon = self :: TraerTipoContrato($strCodCon1);
    }

    return $ultimo;
  }

  public function TraerTipoContrato($strCodCon1) {
    $sql2 = "Select DesTipCon as Descripcion,FrePagCon as Frecuencia,Art146,alicuocon From NPTipCon Where CodTipCon = '" . $strCodCon1 . "'";
    if (H :: BuscarDatos($sql2, & $rstemp)) {
      $ialicuota = $rstemp[0]["alicuocon"];
      if ($ialicuota == 1) {
        /*
        * sprCalculo.Col = SalDia
              sprCalculo.ColHidden = False
              sprCalculo.Col = AliUti
              sprCalculo.ColHidden = False
              sprCalculo.Col = AliBono
              sprCalculo.ColHidden = False*/
      } else {
        /*
        * sprCalculo.Col = SalDia
              sprCalculo.ColHidden = True
              sprCalculo.Col = AliUti
              sprCalculo.ColHidden = True
              sprCalculo.Col = AliBono
              sprCalculo.ColHidden = True*/
      }
      $traertipo = $rstemp[0]["descripcion"];
      if (is_null($rstemp[0]["art146"]))
        $fAplicaArt146 = 0;
      else
        $fAplicaArt146 = 1;

      switch ($rstemp[0]["frecuencia"]) {
        case "M" :
          $idiasdecalculo = 30;
          break;

        case "S" :
          $idiasdecalculo = 7;
          break;

        case "Q" :
          $idiasdecalculo = 15;
          break;

        default :
          $idiasdecalculo = 30;
          break;
      }
      return $traertipo;
    } else
      return "";
  }

  public function PrestacionesCalculadas() {
    $sql3 = "Select feccor,regpre,codemp,feccal,codcon,diatra,mestra,anotra,monpre,diaser,messer,anoser,antacu,adepre,adeint,intacu,bontra From NPPreSoc Where CodEmp = '" . $this->codemp . "' ";
    //print $sql3;exit;
    if (H :: BuscarDatos($sql3, & $rsnppresoc)) {
      $this->incmod = "M";
      if (!$this->esenlote) {
        self :: DatosPrestacionesNuevoRegimen($rsnppresoc);
      } else {
        $this->configGridRN();
		$this->configGridRA();
      }

      $fConsultado = true;
      $sql5 = "Select feccor,regpre,codemp,feccal,codcon,diatra,mestra,anotra,monpre,diaser,messer,anoser,antacu,adepre,adeint,intacu,bontra From NPPreSocANT Where CodEmp = '" . $this->mcodigo . "' ";
      if (H :: BuscarDatos($sql5, & $rsnppresoc) && !$this->esenlote) {
        //self :: DatosPrestacionesRegimenAnterior($rsnppresoc);
      } else {
        //$this->configGridRA();
        //$this->configGridIntereses();

      }
    } else {
      $this->incmod = "I";
      //$this->control = 'vacio';
      //$this->configGridRN();
      //$this->configGridRA();
      //$this->configGridIntereses();
    }
  }

  public function DatosPrestacionesRegimenAnterior($rsnppresoc) {
    self :: DatosEncabezado($rsnppresoc);
    self :: DatosDetalleRegimenAnterior();
    self :: DatosIntereses();
  }

  public function DatosPrestacionesNuevoRegimen($rsnppresoc) {
    self :: DatosEncabezado($rsnppresoc);
    //self :: DatosDetalleNuevoRegimen();
  }

  public function DatosEncabezado($rsnppresoc) {
    $this->mcodigo = $rsnppresoc[0]["codemp"];
    $this->feccor = $rsnppresoc[0]["feccor"];
    $datos = self :: TraerDatosTrabajador();

    if (is_null($rsnppresoc[0]["codcon"]))
      $this->tipcon = self :: TraerTipoContrato("0");
    else
      $this->tipcon = self :: TraerTipoContrato($rsnppresoc[0]["codcon"]);

    $this->feccalculo = $rsnppresoc[0]["feccal"];
    $this->diastrab = $rsnppresoc[0]["diatra"];
    $this->mesestrab = $rsnppresoc[0]["mestra"];
    $this->anostrab = $rsnppresoc[0]["anotra"];

    //VERIFICA EL REGIMEN PARA EL CALCULO N->nuevo V->viejo
    if ($rsnppresoc[0]["regpre"] == 'N') {
    	$total=array();
    	$monto = $rsnppresoc[0]["monpre"];
        $total[] = $monto;

      // Se calcula el tiempo dentro de la empresa
      $sqlantpub = "SELECT
      antpub('D','".$this->mcodigo."',to_date('".$this->feccor."','yyyy-mm-dd'),'N') as dia,
      antpub('M','".$this->mcodigo."',to_date('".$this->feccor."','yyyy-mm-dd'),'N') as mes,
      antpub('A','".$this->mcodigo."',to_date('".$this->feccor."','yyyy-mm-dd'),'N') as ano";

      if (H :: BuscarDatos($sqlantpub, &$rstemp)) {
        $this->diasserv = $rstemp[0]["dia"];
        $this->mesesserv = $rstemp[0]["mes"];
        $this->anosserv = $rstemp[0]["ano"];
      }


    } else {
      $this->diasservra = $rsnppresoc[0]["diaser"];
      $this->mesesservra = $rsnppresoc[0]["messer"];
      $this->anosservra = $rsnppresoc[0]["anoser"];
	  $total=array();
      $monto = $rsnppresoc[0]["monpre"];
      $total[1] = $rsnppresoc[0]["monpre"];
      $this->antacu = $rsnppresoc[0]["antacu"];
      $this->antpre = $rsnppresoc[0]["adepre"] + $rsnppresoc[0]["adeint"];
      $this->intacu = $rsnppresoc[0]["intacu"];
      $this->bontra = $rsnppresoc[0]["bontra"];
      $this->totalpasivo = $rsnppresoc[0]["monpre"] + $rsnppresoc[0]["bontra"];
    }
    $this->registroconsultado = $rsnppresoc[0]["codemp"];
	$this->total=$total;
  }

  public function DatosDetalleNuevoRegimen() {
    //$this->configGridRN();

  }

  public function DatosDetalleRegimenAnterior() {
    $this->configGridRA();
  }

  public function DatosIntereses() {
    $this->configGridIntereses();
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
    $this->ExiSalario = "N";
    $this->control = '';
    $this->total = array ();
    $this->esenlote = false;
    $this->mensajeerror = "";
    $this->aux = 'no';
    $this->aux2 = 'no';

    if ($this->getRequestParameter('ajax') == '1') {
      $this->getUser()->getAttributeHolder()->remove('calculado');
      $this->vargrid = 'id1';
	  $this->varg='a';
      if ($this->getRequestParameter('codemp') != "") {
        //VERIFICAMOS TRABAJADOR
        $this->codemp = $this->getRequestParameter('codemp');
        $this->feccor = $this->getRequestParameter('feccor');

        if (self :: TraerDatosTrabajador() == '1') {
          //Trae la ultima fecha en q se le registro
          //salario integral

          $this->strFecUltReg = self :: UltimoRegistroTrabajador();

          self::PrestacionesCalculadas($this->getRequestParameter('codemp'));
        } else {
          $this->control = 'nodatos';
          //$this->configGridRN();
          //$this->configGridRA();
          //$this->configGridIntereses();

        }

        $this->aux = 'si';
        //$this->getUser()->setAttribute('obj2', $this->obj2, 'presnomcalintpre');
        //$this->getUser()->setAttribute('obj3', $this->obj3, 'presnomcalintpre');
        $this->ExiSalario = "S";
        $nomemp = NphojintPeer :: getNomemp($this->getRequestParameter('codemp'));
        $cedemp = NphojintPeer :: getCedemp($this->getRequestParameter('codemp'));
        $fecing = NphojintPeer :: getFecing($this->getRequestParameter('codemp'));
		$c = new Criteria();
		$c->add(NphojintPeer::CODEMP,$this->getRequestParameter('codemp'));
		$per = NphojintPeer::doSelectOne($c);
		if($per)
			$codniv = $per->getCodNiv();
		else
			$codniv = "";	
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,$this->getRequestParameter('codemp'));
		$c->add(NpasicarempPeer::STATUS,'V');
		$per = NpasicarempPeer::doSelectOne($c);
		if($per)
		{
			$codcar = $per->getCodcar();
			$nomcar = $per->getNomcar();	
		}else
		{
			$codcar = "";
			$nomcar = "";	
		}		
		$c = new Criteria();
		$c->add(NpestorgPeer::CODNIV,$codniv);
		$per = NpestorgPeer::doSelectOne($c);
		if($per)
			$desniv = $per->getDesniv();
		else	
			$desniv = "";
		
        $destipcon  = $this->tipcon; //NptipconPeer::getDestipcon($this->tipcon);
        $feccalpres = @adodb_date("d/m/Y", strtotime($this->feccalculo));
        $feccor     = @adodb_date("d/m/Y", strtotime($this->feccor));
        
        //echo $feccor; exit();
        //$this->configGridConsulta($this->getRequestParameter('codemp'));
        $this->configGridRN($this->getRequestParameter('codemp'));
		$this->configGridRA($this->getRequestParameter('codemp'));		

		$this->getUser()->setAttribute('obj2', $this->obj2);
	    $js="toAjaxUpdater('id2',7,getUrlModulo()+'ajax','7');";  

//echo $this->control;
        $output = '[["nppresoc_nomemp","' . $nomemp . '",""],["nppresoc_cedemp","' . $cedemp . '",""],["nppresoc_fecing","' . $fecing . '",""],                    ["nppresoc_feccalpres","' . $feccalpres . '",""],["nppresoc_destipcon","' . $destipcon . '",""],["nppresoc_feccor","' . $feccor . '",""],
                    ["diaserra","' . $this->diasservra . '",""],["messerra","' . $this->mesesservra . '",""],["anoserra","' . $this->anosservra . '",""],
                    ["diaserrn","' . $this->diasserv . '",""],["messerrn","' . $this->mesesserv . '",""],["anoserrn","' . $this->anosserv . '",""],
                    ["nppresoc_diatra","' . $this->diastrab . '",""],["nppresoc_mestra","' . $this->mesestrab . '",""],["nppresoc_anotra","' . $this->anostrab . '",""],
                    ["control","' . $this->control . '",""],["totfil","' . $this->tfil . '",""],["totfil2","' . $this->tfil2 . '",""],["totfil3","' . $this->tfil3 . '",""],
                    ["totcapitalact","' . H::FormatoMonto($this->capitalact) . '",""],["nppresoc_codniv","'.$codniv.'",""],["nppresoc_desniv","'.$desniv.'",""],
					["totcapitalact2","' . H::FormatoMonto($this->capitalact2) . '",""],
					["totintacu2","' . H::FormatoMonto($this->intacu2) . '",""],
					["nppresoc_codcar","'.$codcar.'",""],["nppresoc_nomcar","'.$nomcar.'",""],["totintacu","' . H::FormatoMonto($this->intacu) . '",""],["javascript","'.$js.'",""]]';

		$this->varg='a';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');


        //return sfView::HEADER_ONLY;
        //}

      } else {
        //$this->configGridRN();
        //$this->configGridRA();
        //$this->configGridIntereses();
        //$this->getUser()->setAttribute('obj2', $this->obj2, 'presnomcalintpre');
        //$this->getUser()->setAttribute('obj3', $this->obj3, 'presnomcalintpre');

      }
    } elseif ($this->getRequestParameter('ajax') == '2') {
        $this->ajax = $this->getRequestParameter('ajax');
        if ($this->getRequestParameter('codemp') != "" and $this->getRequestParameter('feccor') != "") {
          if (!PrestacionesSociales :: VerificaEmpLiquidado($this->getRequestParameter('codemp'))) {
            $this->mensajeerror = "El Empleado posee una Liquidación. No se puede Calcular Prestaciones a un Empleado Liquidado";
          } else {
            $mensajeerror = "";
            if (PrestacionesSociales :: verificaRealizaCalculo($this->getRequestParameter('fecing'), $this->getRequestParameter('mesini'), $this->getRequestParameter('feccor'), $codcon, $this->getRequestParameter('codemp'), $FecUltRegSal, & $mensajeerror)) {
            } else {
              $this->mensajeerror = $mensajeerror;
            }
          } //elseif (!PrestacionesSociales::VerificaEmpLiquidado($this->getRequestParameter('codemp')))
        } //if ($this->getRequestParameter('codemp')!="" and $this->getRequestParameter('feccor')!="")
        else {
          if ($this->getRequestParameter('feccor') == "")
            $this->mensajeerror = "Debe Colocar la Fecha de Corte para poder realizar el Cálculo de las Prestaciones";
          if ($this->getRequestParameter('codemp') == "")
            $this->mensajeerror = "Debe introducir el Código del Empleado";
        } //else if ($this->getRequestParameter('codemp')!="" and $this->getRequestParameter('feccor')!="")
      } elseif ($this->getRequestParameter('ajax') == '3') {
          $this->vargrid = 'id2';
          $this->aux2 = 'si';
          $this->obj2 = $this->getUser()->getAttribute('obj2', null, 'presnomcalintpre');

      } elseif ($this->getRequestParameter('ajax') == '4') {
            $this->vargrid = 'id3';
            $this->obj3 = $this->getUser()->getAttribute('obj3', null, 'presnomcalintpre');


        } elseif ($this->getRequestParameter('ajax') == '5') //Autor: Jesus Lobaton
              {
              $this->varg='a';
              $this->ajax = $this->getRequestParameter('ajax');
              $this->salario= $this->getRequestParameter('salario');
              $salario = H::iif($this->salario=='true','P','U');
			  if($this->getRequestParameter('anno')=='true')
			      $anno='365';
			  else
			      $anno='360';
				  	  
              if ($this->getRequestParameter('codemp') != "" and $this->getRequestParameter('feccor') != "" and $this->getRequestParameter('capita') != "")
              {
                $this->configGrid($this->getRequestParameter('codemp'), $this->getRequestParameter('feccor'), $this->getRequestParameter('capita'), $salario,$anno);
				$this->configGrid_bueno($this->getRequestParameter('codemp'), $this->getRequestParameter('feccor'), $this->getRequestParameter('capita'), $salario,$anno);
			    $this->getUser()->setAttribute('obj2', $this->obj2);
			    $js="toAjaxUpdater('id2',7,getUrlModulo()+'ajax','7');";  
                $output = '[["diaserrn","'.$this->antdias.'",""],["messerrn","'.$this->antmeses.'",""],["anoserrn","'.$this->antannos.'",""],["diaserra","'.$this->antdias2.'",""],["messerra","'.$this->antmeses2.'",""],["anoserra","'.$this->antannos2.'",""],["totcapitalact","'.H::Formatomonto($this->capitalact).'",""],["totintacu","'.H::Formatomonto($this->intacu).'",""],["totcapitalact2","'.H::Formatomonto($this->capitalact2).'",""],["totintacu2","'.H::Formatomonto($this->intacu2).'",""],["javascript","'.$js.'",""]]';
				
				$this->getUser()->setAttribute('calculado','SI');
				$this->getUser()->setAttribute('anno',$anno);
				$this->getUser()->setAttribute('obj2',$this->obj2);
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
              }
			  
			  
        	  

      } elseif ($this->getRequestParameter('ajax') == '6') //Autor: Jesus Lobaton
                {
                //$this->vargrid='id1';
                //$this->obj1= $this->getUser()->getAttribute('obj1',null,'presnomcalintpre');

      }elseif ($this->getRequestParameter('ajax') == '7') //Autor: Jesus Lobaton
              {
                $this->varg='b';
                $this->obj2= $this->getUser()->getAttribute('obj2');

              }
    //}//if (Herramientas::BuscarDatos($strSQL,&$result))
    else // El empleado no esta registrado en la tabla de salarios
      {
      $this->ExiSalario = "N";
      return sfView :: HEADER_ONLY;

    }

    //}//if ($this->getRequestParameter('codemp')!=""

  }


    
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {
      $this->coderr=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
          $calculado = $this->getUser()->getAttribute('calculado');
		  if ($calculado!='SI')
		  {
		    if (SF_ENVIRONMENT == 'dev') {
		      $this->ent = '_dev';
		    } else {
		      $this->ent = '';
		    }
		  	$this->capitalizacion = Constantes :: Capitalizacion();
	        $this->configGrid();
			$this->configGrid_bueno();
	        $this->configGridRA();
	        $this->configGridIntereses();
		  	$this->coderr=462;
   	        return false;

		  }
		  $gridrn = Herramientas :: CargarDatosGrid($this, $this->obj);
		  $gridra = Herramientas :: CargarDatosGrid($this, $this->obj2);
		  if(count($gridrn[0])<=0 || count($gridra[0])<=0)
		  {
		  	if (SF_ENVIRONMENT == 'dev') {
		      $this->ent = '_dev';
		    } else {
		      $this->ent = '';
		    }
		  	$this->capitalizacion = Constantes :: Capitalizacion();
	        $this->configGrid();
			$this->configGrid_bueno();
	        $this->configGridRA();
	        $this->configGridIntereses();
		  	$this->coderr=462;
   	        return false;
		  }
      }
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
    $this->params=array();
    $this->preExecute();
    $this->nppresoc = $this->getNppresocOrCreate();
    $this->updateNppresocFromRequest();

    $this->labels = $this->getLabels();

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
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_bueno($codemp = '', $fecha= '', $capital= '', $salario= '',$anno= 0)
  {
      $sql = "select '' as id,codtipcon,antdias,antmeses,antannos,
	  		  to_char(fecini,'dd/mm/yyyy') as fecini, to_char(fecfin,'dd/mm/yyyy') as fecfin,fecini as fecinior,
			  round(monto,2) as salemp, tasa as tasint,round(monpres,2) as capemp,
			  round(capitalact,2) as capitalact,round(monant,2) as monant,round(monint,2) as intdev,antannos as anoser,
			  round(monadeint,2) as adeant,round(intacu,2) as intacu,dias as diadif
              from calculopresant('$codemp','$fecha','$capital',$anno) order by fecinior";
	  
	   Herramientas :: BuscarDatos($sql, & $result);

      $per = $result;
      
      $this->tfil2 = count($per);
	  $this->intacu2=0;
	  $this->capitalact2=0;
	  if ($result)
      {
        //Saco los totales Regimen Nuevo
        $this->antannos2  = $result[$this->tfil2-1]['antannos'];
        $this->antmeses2  = $result[$this->tfil2-1]['antmeses'];
        $this->antdias2   = $result[$this->tfil2-1]['antdias'];
        $this->capitalact2= $result[$this->tfil2-1]['capitalact'];
		foreach($result as $r)
		{
			if($r['intacu']!=0)
			$this->intacu2= $r['intacu'];
		}
		

        // Copio los dos ultimo registro
        $this->grid_1 = $result[$this->tfil2-1];
        $this->grid_2 = $result[$this->tfil2-2];

        // array_pop($per);  ///Borra la Ultima Posicion
          // array_pop($per);  ///Borra la Ultima Posicion
      }
	  

      ////OPCIONES DEL GRID//////
      $opciones = new OpcionesGrid();
      $opciones->setTabla('npimppresocant');
      $opciones->setAnchoGrid(900);
      $opciones->setFilas(0);
      $opciones->setName('b');
      $opciones->setEliminar(false);
      $opciones->setTitulo('');
      $opciones->setHTMLTotalFilas(' ');
      ///FIN OPCIONES///

    $col1 = new Columna('Del');
    $col1->setTipo(Columna :: TEXTO);
    $col1->setAlineacionObjeto(Columna :: CENTRO);
    $col1->setAlineacionContenido(Columna :: CENTRO);
    $col1->setNombreCampo('fecini');
    $col1->setHTML('type="text" readonly=true');	
    $col1->setEsGrabable(true);

    $col2 = new Columna('Al');
    $col2->setTipo(Columna :: TEXTO);
    $col2->setAlineacionObjeto(Columna :: CENTRO);
    $col2->setAlineacionContenido(Columna :: CENTRO);
    $col2->setNombreCampo('fecfin');
    $col2->setHTML('type="text" readonly=true');	
    $col2->setEsGrabable(true);

    $col3 = new Columna('Salario');
    $col3->setTipo(Columna :: MONTO);
    $col3->setAlineacionObjeto(Columna :: CENTRO);
    $col3->setAlineacionContenido(Columna :: CENTRO);
    $col3->setNombreCampo('salemp');
    $col3->setHTML('type="text"  maxlength="20"  readonly=true');
	$col3->setEsGrabable(true);

    $col4 = new Columna('Tasa');
    $col4->setTipo(Columna :: TEXTO);
    $col4->setAlineacionObjeto(Columna :: CENTRO);
    $col4->setAlineacionContenido(Columna :: CENTRO);
    $col4->setNombreCampo('tasint');
    $col4->setHTML('type="text" size="10" maxlength="10"  readonly=true');
	$col4->setEsGrabable(true);

    $col5 = new Columna('Deposito');
    $col5->setTipo(Columna :: MONTO);
    $col5->setAlineacionObjeto(Columna :: CENTRO);
    $col5->setAlineacionContenido(Columna :: CENTRO);
    $col5->setNombreCampo('capemp');
    $col5->setHTML('type="text"  maxlength="20"  readonly=true');
	$col5->setEsGrabable(true);
	
	$col12 = new Columna('Capital');
    $col12->setTipo(Columna :: MONTO);
    $col12->setAlineacionObjeto(Columna :: CENTRO);
    $col12->setAlineacionContenido(Columna :: CENTRO);
    $col12->setNombreCampo('capitalact');
    $col12->setHTML('type="text"  maxlength="20"  readonly=true');
	$col12->setEsGrabable(true);
	
	$col6 = new Columna('Anticipo');
    $col6->setTipo(Columna :: MONTO);
    $col6->setAlineacionObjeto(Columna :: CENTRO);
    $col6->setAlineacionContenido(Columna :: CENTRO);
    $col6->setNombreCampo('monant');
    $col6->setHTML('type="text"  maxlength="20"  readonly=true');
	$col6->setEsGrabable(true);

    $col7 = new Columna('Interes Devengado');
    $col7->setTipo(Columna :: MONTO);
    $col7->setAlineacionObjeto(Columna :: CENTRO);
    $col7->setAlineacionContenido(Columna :: CENTRO);
    $col7->setNombreCampo('intdev');
    $col7->setHTML('type="text"  maxlength="20"  readonly=true');
	$col7->setEsGrabable(true);

    $col8 = new Columna('Años de Servicios');
    $col8->setTipo(Columna :: MONTO);
    $col8->setAlineacionObjeto(Columna :: CENTRO);
    $col8->setAlineacionContenido(Columna :: CENTRO);
    $col8->setNombreCampo('anoser');
    $col8->setHTML('type="text"  maxlength="20"  readonly=true');
	$col8->setEsGrabable(true);

    $col9 = new Columna('Adelanto Interes');
    $col9->setTipo(Columna :: MONTO);
    $col9->setAlineacionObjeto(Columna :: CENTRO);
    $col9->setAlineacionContenido(Columna :: CENTRO);
    $col9->setNombreCampo('adeant');
    $col9->setHTML('type="text"  maxlength="20"  readonly=true');
	$col9->setEsGrabable(true);

    $col10 = new Columna('Interes Acumulado');
    $col10->setTipo(Columna :: MONTO);
    $col10->setAlineacionObjeto(Columna :: CENTRO);
    $col10->setAlineacionContenido(Columna :: CENTRO);
    $col10->setNombreCampo('intacu');
    $col10->setHTML('type="text"  maxlength="20"  readonly=true');
	$col10->setEsGrabable(true);

    $col11 = new Columna('Dias');
    $col11->setTipo(Columna :: MONTO);
    $col11->setAlineacionObjeto(Columna :: CENTRO);
    $col11->setAlineacionContenido(Columna :: CENTRO);
    $col11->setNombreCampo('diadif');
    $col11->setHTML('type="text"  maxlength="20"  readonly=true');
	$col11->setEsGrabable(true);
	
	$col13 = new Columna('codtipcon');
    $col13->setTipo(Columna :: TEXTO);
    $col13->setNombreCampo('codtipcon');
    $col13->setEsGrabable('true');
    $col13->setOculta('true');

    $col14 = new Columna('antdias');
    $col14->setTipo(Columna :: TEXTO);
    $col14->setNombreCampo('antdias');
    $col14->setOculta('true');
	
    $col15 = new Columna('antmeses');
    $col15->setTipo(Columna :: TEXTO);
    $col15->setNombreCampo('antmeses');
    $col15->setOculta('true');

    $col16 = new Columna('antannos');
    $col16->setTipo(Columna :: TEXTO);
    $col16->setNombreCampo('antannos');
    $col16->setOculta('true');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
	$opciones->addColumna($col12);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
	$opciones->addColumna($col13);
    $opciones->addColumna($col14);
	$opciones->addColumna($col15);
    $opciones->addColumna($col16);

      $this->obj2 = $opciones->getConfig($per);
      //h::printR($this->obj);

    //}

  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp = '', $fecha= '', $capital= '', $salario= '',$anno= '')
  { 
  	if($this->salario=="true")
  		$cadena="round(monpres,2)";
  	else
  		$cadena="round((mondia*(dias)),2)";

     $sql = "select ' ' as id, TO_CHAR(fecfin,'MM') as mesactual, antmeses, antdias, antannos, codtipcon, tipo,
      to_char(fecini,'dd/mm/yyyy') as fecini, fecini as fecini1, to_char(fecfin,'dd/mm/yyyy') as fecfin,
      round(tasa,2) as tasa, round(mondia,2) as mondia, dias, round(mondiapro,2) as mondiapro,
      round(capital,2) as capital, round(capitalact,2) as capitalact,
      case when dias=5 then round(monpres,2) else $cadena end  as monpres, tasa,
      round(monint,2) as monint, round(intacu,2) as intacu, round(monant,2) as monant,
      round(monadeint,2) as monadeint, round(monto,2) as monto
              from calculopres('$codemp','$fecha','$capital','$salario') order by fecini1";

    Herramientas :: BuscarDatos($sql, & $result);

      $per = $result;

      $this->tfil = count($per);
      $this->intacu=0;
	  $this->capitalact=0;
      if ($result)
      {
        //Saco los totales Regimen Nuevo
        $this->antannos  = $result[$this->tfil-1]['antannos'];
        $this->antmeses  = $result[$this->tfil-1]['antmeses'];
        $this->antdias   = $result[$this->tfil-1]['antdias'];
        $this->capitalact= $result[$this->tfil-1]['capitalact'];
		foreach($result as $r)
		{
			if($r['intacu']!=0)
			$this->intacu= $r['intacu'];
		}
		

        // Copio los dos ultimo registro
        $this->grid_1 = $result[$this->tfil-1];
		if($this->tfil>1)
        	$this->grid_2 = $result[$this->tfil-2];
		else
			$this->grid_2 = $result[$this->tfil-1];	

        // array_pop($per);  ///Borra la Ultima Posicion
          // array_pop($per);  ///Borra la Ultima Posicion
      }

      ////OPCIONES DEL GRID//////
      $opciones = new OpcionesGrid();
      $opciones->setTabla('npimppresoc');
      $opciones->setAnchoGrid(600);
      $opciones->setFilas(0);
      $opciones->setName('a');
      $opciones->setEliminar(false);
      $opciones->setTitulo('');
      $opciones->setHTMLTotalFilas(' ');
      ///FIN OPCIONES///

      /////COLUMNAS///////
      $col1 = new Columna('Del');
      $col1->setTipo(Columna :: TEXTO);
      $col1->setAlineacionObjeto(Columna :: CENTRO);
      $col1->setAlineacionContenido(Columna :: CENTRO);
      $col1->setNombreCampo('fecini');
      $col1->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col1->setEsGrabable('true');

      $col2 = new Columna('Al');
      $col2->setTipo(Columna :: TEXTO);
      $col2->setAlineacionObjeto(Columna :: CENTRO);
      $col2->setAlineacionContenido(Columna :: CENTRO);
      $col2->setNombreCampo('fecfin');
      $col2->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col2->setEsGrabable('true');

      $col3 = new Columna('Salario');
      $col3->setTipo(Columna :: MONTO);
      $col3->setAlineacionObjeto(Columna :: CENTRO);
      $col3->setAlineacionContenido(Columna :: CENTRO);
      $col3->setNombreCampo('monto');
      $col3->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col3->setEsGrabable('true');

      //    $col3 = new Columna('Salario');
      //    $col3->setTipo(Columna::MONTO);f
      //    $col3->setAlineacionObjeto(Columna::CENTRO);
      //    $col3->setAlineacionContenido(Columna::CENTRO);
      //    $col3->setNombreCampo('monpres'); //salemp
      //    $col3->setHTML('type="text" size="20" maxlength="20"  readonly=true');

      $col4 = new Columna('Dias Art.108');
      $col4->setTipo(Columna :: MONTO);
      $col4->setAlineacionObjeto(Columna :: CENTRO);
      $col4->setAlineacionContenido(Columna :: CENTRO);
      $col4->setNombreCampo('dias');
      $col4->setHTML('type="text" size="3" maxlength="3"  readonly=true');
      $col4->setEsGrabable('true');
      $col4->setEsTotal(true, 'totmonpres');

      $col5 = new Columna('Salario Dia Adicional');
      $col5->setTipo(Columna :: MONTO);
      $col5->setAlineacionObjeto(Columna :: CENTRO);
      $col5->setAlineacionContenido(Columna :: CENTRO);
      $col5->setNombreCampo('mondiapro');
      $col5->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col5->setEsGrabable('true');

      $col6 = new Columna('Capital');
      $col6->setTipo(Columna :: MONTO);
      $col6->setAlineacionObjeto(Columna :: CENTRO);
      $col6->setAlineacionContenido(Columna :: CENTRO);
      $col6->setNombreCampo('capital');
      $col6->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col6->setEsGrabable('true');

      $col7 = new Columna('Antiguedad Acumulada');
      $col7->setTipo(Columna :: MONTO);
      $col7->setAlineacionObjeto(Columna :: CENTRO);
      $col7->setAlineacionContenido(Columna :: CENTRO);
      $col7->setNombreCampo('capitalact'); //antacum
      $col7->setHTML('type="text" size="10" maxlength="20"  readonly=true');
      //$col7->setEsTotal(true, 'totcapitalact');
      $col7->setEsGrabable('true');

      $col8 = new Columna('Valor Art.108');
      $col8->setTipo(Columna :: MONTO);
      $col8->setAlineacionObjeto(Columna :: CENTRO);
      $col8->setAlineacionContenido(Columna :: CENTRO);
      $col8->setNombreCampo('monpres');
      $col8->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col8->setEsGrabable('true');

      $col9 = new Columna('Tasa');
      $col9->setTipo(Columna :: MONTO);
      $col9->setAlineacionObjeto(Columna :: CENTRO);
      $col9->setAlineacionContenido(Columna :: CENTRO);
      $col9->setNombreCampo('tasa'); //tasint
      $col9->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col9->setEsGrabable('true');

      $col10 = new Columna('Dias Diferencia');
      $col10->setTipo(Columna :: TEXTO);
      $col10->setAlineacionObjeto(Columna :: CENTRO);
      $col10->setAlineacionContenido(Columna :: CENTRO);
      $col10->setNombreCampo('mesactual'); //Dia del Mes
      $col10->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col10->setEsGrabable('true');

      $col11 = new Columna('Interes Devengado');
      $col11->setTipo(Columna :: MONTO);
      $col11->setAlineacionObjeto(Columna :: CENTRO);
      $col11->setAlineacionContenido(Columna :: CENTRO);
      $col11->setNombreCampo('monint'); //intdev
      $col11->setHTML('type="text" size="10" maxlength="20"  readonly=true');
      $col11->setEsGrabable('true');

      $col12 = new Columna('Interes Acumulado');
      $col12->setTipo(Columna :: MONTO);
      $col12->setAlineacionObjeto(Columna :: CENTRO);
      $col12->setAlineacionContenido(Columna :: CENTRO);
      $col12->setNombreCampo('intacu'); //intacum
      $col12->setHTML('type="text" size="10" maxlength="20"  readonly=true');
      #$col12->setEsTotal(true, 'totintacu');
      $col12->setEsGrabable('true');

      $col13 = new Columna('Adelanto Anticipo');
      $col13->setTipo(Columna :: MONTO);
      $col13->setAlineacionObjeto(Columna :: CENTRO);
      $col13->setAlineacionContenido(Columna :: CENTRO);
      $col13->setNombreCampo('monant'); //adeant
      $col13->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col13->setEsTotal(true, 'totmonant');
      $col13->setEsGrabable('true');

      $col14 = new Columna('Adelanto Intereses');
      $col14->setTipo(Columna :: MONTO);
      $col14->setAlineacionObjeto(Columna :: CENTRO);
      $col14->setAlineacionContenido(Columna :: CENTRO);
      $col14->setNombreCampo('monadeint');
      $col14->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col14->setEsTotal(true, 'totmonadeint');
      $col14->setEsGrabable('true');

      $col15 = new Columna('codtipcon');
      $col15->setTipo(Columna :: TEXTO);
      $col15->setAlineacionObjeto(Columna :: CENTRO);
      $col15->setAlineacionContenido(Columna :: CENTRO);
      $col15->setNombreCampo('codtipcon');
      $col15->setOculta('true');
      $col15->setEsGrabable('true');

      $col16 = new Columna('antmeses');
      $col16->setTipo(Columna :: TEXTO);
      $col16->setAlineacionObjeto(Columna :: CENTRO);
      $col16->setAlineacionContenido(Columna :: CENTRO);
      $col16->setNombreCampo('antmeses');
      $col16->setOculta('true');
      $col16->setEsGrabable('true');

      $col17 = new Columna('antdias');
      $col17->setTipo(Columna :: TEXTO);
      $col17->setAlineacionObjeto(Columna :: CENTRO);
      $col17->setAlineacionContenido(Columna :: CENTRO);
      $col17->setNombreCampo('antdias');
      $col17->setOculta('true');
      $col17->setEsGrabable('true');

      $col18 = new Columna('antannos');
      $col18->setTipo(Columna :: TEXTO);
      $col18->setAlineacionObjeto(Columna :: CENTRO);
      $col18->setAlineacionContenido(Columna :: CENTRO);
      $col18->setNombreCampo('antannos');
      $col18->setOculta('true');
      $col18->setEsGrabable('true');

      $col19 = new Columna('monto');
      $col19->setTipo(Columna :: MONTO);
      $col19->setAlineacionObjeto(Columna :: CENTRO);
      $col19->setAlineacionContenido(Columna :: CENTRO);
      $col19->setNombreCampo('monto');
      $col19->setOculta('true');
      $col19->setEsGrabable('true');


      $col20 = new Columna('mondia');
      $col20->setTipo(Columna :: MONTO);
      $col20->setAlineacionObjeto(Columna :: CENTRO);
      $col20->setAlineacionContenido(Columna :: CENTRO);
      $col20->setNombreCampo('mondia');
      $col20->setOculta('true');
      $col20->setEsGrabable('true');

      $col21 = new Columna('Tipo');
      $col21->setTipo(Columna :: TEXTO);
      $col21->setAlineacionObjeto(Columna :: CENTRO);
      $col21->setAlineacionContenido(Columna :: CENTRO);
      $col21->setNombreCampo('tipo');
      $col21->setHTML('type="text" size="30" maxlength="30"  readonly=true');
      //$col21->setOculta('true');
      $col21->setEsGrabable('true');



      //NO esta el campo de la funcion que hizo edgar
      //    $col5 = new Columna('Deposito');
      //    $col5->setTipo(Columna::TEXTO);
      //    $col5->setAlineacionObjeto(Columna::CENTRO);
      //    $col5->setAlineacionContenido(Columna::CENTRO);
      //    $col5->setNombreCampo('tipo'); //capemp
      //    $col5->setHTML('type="text" size="20" maxlength="20"  readonly=true');

      //NO esta el campo de la funcion que hizo edgar
      //    $col8 = new Columna('Años de Servicios');
      //    $col8->setTipo(Columna::MONTO);
      //    $col8->setAlineacionObjeto(Columna::CENTRO);
      //    $col8->setAlineacionContenido(Columna::CENTRO);
      //    $col8->setNombreCampo('anoser');
      //    $col8->setHTML('type="text" size="20" maxlength="20"  readonly=true');
      //    $col8->setOculta(true);

      //NO esta el campo de la funcion que hizo edgar
      //    $col11 = new Columna('Dias Difer.');
      //    $col11->setTipo(Columna::MONTO);
      //    $col11->setAlineacionObjeto(Columna::CENTRO);
      //    $col11->setAlineacionContenido(Columna::CENTRO);
      //    $col11->setNombreCampo('diadif');
      //    $col11->setHTML('type="text" size="20" maxlength="20"  readonly=true');
      //    $col11->setOculta(true);

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
      $opciones->addColumna($col18);
      $opciones->addColumna($col19);
      $opciones->addColumna($col20);
      $opciones->addColumna($col21);

      ///FIN COLUMNAS///

      $this->obj = $opciones->getConfig($per);

  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulta($codigo) {
    /////PARA LA CONSULTA//////
    $c = new Criteria();
    $c->add(NppresocPeer :: CODEMP, $codigo);
    $per = NppresocPeer :: doSelect($c);

    if ($per)
    {
      $c = new Criteria();
      $c->add(NpimppresocPeer :: CODEMP, $codigo);
      $c->add(NpimppresocPeer :: TIPO, "(npimppresoc.TIPO<>'T' or npimppresoc.TIPO is null  )", Criteria :: CUSTOM);
      $c->addAscendingOrderByColumn(NpimppresocPeer :: FECINI);
      $c->addAscendingOrderByColumn(NpimppresocPeer :: TIPO);
      $per = NpimppresocPeer :: doSelect($c);
      ///FIN CONSULTA///

    }
    $this->tfil2 = count($per);
//Nppresoc
    ////OPCIONES DEL GRID//////
    $opciones = new OpcionesGrid();
    $opciones->setTabla('Npimppresoc');
    $opciones->setAncho(1800);
    $opciones->setAnchoGrid(1900);
    $opciones->setFilas(0);
    $opciones->setName('b');
    $opciones->setEliminar(false);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');
    ///FIN OPCIONES///

    /////COLUMNAS///////
      $col1 = new Columna('Del');
      $col1->setTipo(Columna :: FECHA);
      $col1->setAlineacionObjeto(Columna :: CENTRO);
      $col1->setAlineacionContenido(Columna :: CENTRO);
      $col1->setNombreCampo('fecini');
      $col1->setHTML('type="text" size="14" maxlength="20"  readonly=true');
      $col1->setEsGrabable('true');

      $col2 = new Columna('Al');
      $col2->setTipo(Columna :: FECHA);
      $col2->setAlineacionObjeto(Columna :: CENTRO);
      $col2->setAlineacionContenido(Columna :: CENTRO);
      $col2->setNombreCampo('fecfin');
      $col2->setHTML('type="text" size="14" maxlength="20"  readonly=true');
      $col2->setEsGrabable('true');

      $col3 = new Columna('salario');
      $col3->setTipo(Columna :: MONTO);
      $col3->setAlineacionObjeto(Columna :: CENTRO);
      $col3->setAlineacionContenido(Columna :: CENTRO);
      $col3->setNombreCampo('salemp');
      $col3->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col3->setEsGrabable('true');

      //    $col3 = new Columna('Salario');
      //    $col3->setTipo(Columna::MONTO);f
      //    $col3->setAlineacionObjeto(Columna::CENTRO);
      //    $col3->setAlineacionContenido(Columna::CENTRO);
      //    $col3->setNombreCampo('monpres'); //salemp
      //    $col3->setHTML('type="text" size="20" maxlength="20"  readonly=true');

      $col4 = new Columna('Dias Art.108');
      $col4->setTipo(Columna :: TEXTO);
      $col4->setAlineacionObjeto(Columna :: CENTRO);
      $col4->setAlineacionContenido(Columna :: CENTRO);
      $col4->setNombreCampo('dias');
      $col4->setHTML('type="text" size="3" maxlength="3"  readonly=true');
      $col4->setEsGrabable('true');
      $col4->setEsTotal(true, 'totmonpres');


//NO SE
      $col5 = new Columna('Salario Dia Adicional');
      $col5->setTipo(Columna :: MONTO);
      $col5->setAlineacionObjeto(Columna :: CENTRO);
      $col5->setAlineacionContenido(Columna :: CENTRO);
      $col5->setNombreCampo('mondiapro');
      $col5->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col5->setEsGrabable('true');

      $col6 = new Columna('Capital');
      $col6->setTipo(Columna :: MONTO);
      $col6->setAlineacionObjeto(Columna :: CENTRO);
      $col6->setAlineacionContenido(Columna :: CENTRO);
      $col6->setNombreCampo('capital');
      $col6->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col6->setEsGrabable('true');

      $col7 = new Columna('Antiguedad Acumulada');
      $col7->setTipo(Columna :: MONTO);
      $col7->setAlineacionObjeto(Columna :: CENTRO);
      $col7->setAlineacionContenido(Columna :: CENTRO);
      $col7->setNombreCampo('antacum'); //antacum
      $col7->setHTML('type="text" size="10" maxlength="20"  readonly=true');
      $col7->setEsTotal(true, 'totcapitalact');
      $col7->setEsGrabable('true');

      $col8 = new Columna('Valor Art.108');
      $col8->setTipo(Columna :: MONTO);
      $col8->setAlineacionObjeto(Columna :: CENTRO);
      $col8->setAlineacionContenido(Columna :: CENTRO);
      $col8->setNombreCampo('valart108');
      $col8->setHTML('type="text" size="10" maxlength="10"  readonly=true');

      $col8->setEsGrabable('true');

      $col9 = new Columna('Tasa');
      $col9->setTipo(Columna :: MONTO);
      $col9->setAlineacionObjeto(Columna :: CENTRO);
      $col9->setAlineacionContenido(Columna :: CENTRO);
      $col9->setNombreCampo('tasaint'); //tasint
      $col9->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col9->setEsGrabable('true');

      $col10 = new Columna('Dias Diferencia');
      $col10->setTipo(Columna :: TEXTO);
      $col10->setAlineacionObjeto(Columna :: CENTRO);
      $col10->setAlineacionContenido(Columna :: CENTRO);
      $col10->setNombreCampo('diadif'); //Dia del Mes
      $col10->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col10->setEsGrabable('true');

      $col11 = new Columna('Interes Devengado');
      $col11->setTipo(Columna :: MONTO);
      $col11->setAlineacionObjeto(Columna :: CENTRO);
      $col11->setAlineacionContenido(Columna :: CENTRO);
      $col11->setNombreCampo('intdev'); //intdev
      $col11->setHTML('type="text" size="10" maxlength="20"  readonly=true');
      $col11->setEsGrabable('true');

      $col12 = new Columna('Interes Acumulado');
      $col12->setTipo(Columna :: MONTO);
      $col12->setAlineacionObjeto(Columna :: CENTRO);
      $col12->setAlineacionContenido(Columna :: CENTRO);
      $col12->setNombreCampo('intacum'); //intacum
      $col12->setHTML('type="text" size="10" maxlength="20"  readonly=true');
      $col12->setEsTotal(true, 'totintacu');
      $col12->setEsGrabable('true');

      $col13 = new Columna('Adelanto Anticipo');
      $col13->setTipo(Columna :: MONTO);
      $col13->setAlineacionObjeto(Columna :: CENTRO);
      $col13->setAlineacionContenido(Columna :: CENTRO);
      $col13->setNombreCampo('adeant'); //adeant
      $col13->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col13->setEsTotal(true, 'totmonant');
      $col13->setEsGrabable('true');

      $col14 = new Columna('Adelanto Intereses');
      $col14->setTipo(Columna :: MONTO);
      $col14->setAlineacionObjeto(Columna :: CENTRO);
      $col14->setAlineacionContenido(Columna :: CENTRO);
      $col14->setNombreCampo('adepre');
      $col14->setHTML('type="text" size="10" maxlength="10"  readonly=true');
      $col14->setEsTotal(true, 'totmonadeint');
      $col14->setEsGrabable('true');

      $col15 = new Columna('codtipcon');
      $col15->setTipo(Columna :: TEXTO);
      $col15->setAlineacionObjeto(Columna :: CENTRO);
      $col15->setAlineacionContenido(Columna :: CENTRO);
      $col15->setNombreCampo('codtipcon');
      $col15->setOculta('true');
      $col15->setEsGrabable('true');

      $col16 = new Columna('antmeses');
      $col16->setTipo(Columna :: TEXTO);
      $col16->setAlineacionObjeto(Columna :: CENTRO);
      $col16->setAlineacionContenido(Columna :: CENTRO);
      $col16->setNombreCampo('antmeses');
      $col16->setOculta('true');
      $col16->setEsGrabable('true');

      $col17 = new Columna('antdias');
      $col17->setTipo(Columna :: TEXTO);
      $col17->setAlineacionObjeto(Columna :: CENTRO);
      $col17->setAlineacionContenido(Columna :: CENTRO);
      $col17->setNombreCampo('antdias');
      $col17->setOculta('true');
      $col17->setEsGrabable('true');

      $col18 = new Columna('antannos');
      $col18->setTipo(Columna :: TEXTO);
      $col18->setAlineacionObjeto(Columna :: CENTRO);
      $col18->setAlineacionContenido(Columna :: CENTRO);
      $col18->setNombreCampo('antannos');
      $col18->setOculta('true');
      $col18->setEsGrabable('true');

      $col19 = new Columna('monto');
      $col19->setTipo(Columna :: MONTO);
      $col19->setAlineacionObjeto(Columna :: CENTRO);
      $col19->setAlineacionContenido(Columna :: CENTRO);
      $col19->setNombreCampo('monto');
      $col19->setOculta('true');
      $col19->setEsGrabable('true');


      $col20 = new Columna('mondia');
      $col20->setTipo(Columna :: MONTO);
      $col20->setAlineacionObjeto(Columna :: CENTRO);
      $col20->setAlineacionContenido(Columna :: CENTRO);
      $col20->setNombreCampo('mondia');
      $col20->setOculta('true');
      $col20->setEsGrabable('true');




      //NO esta el campo de la funcion que hizo edgar
      //    $col5 = new Columna('Deposito');
      //    $col5->setTipo(Columna::TEXTO);
      //    $col5->setAlineacionObjeto(Columna::CENTRO);
      //    $col5->setAlineacionContenido(Columna::CENTRO);
      //    $col5->setNombreCampo('tipo'); //capemp
      //    $col5->setHTML('type="text" size="20" maxlength="20"  readonly=true');

      //NO esta el campo de la funcion que hizo edgar
      //    $col8 = new Columna('Años de Servicios');
      //    $col8->setTipo(Columna::MONTO);
      //    $col8->setAlineacionObjeto(Columna::CENTRO);
      //    $col8->setAlineacionContenido(Columna::CENTRO);
      //    $col8->setNombreCampo('anoser');
      //    $col8->setHTML('type="text" size="20" maxlength="20"  readonly=true');
      //    $col8->setOculta(true);

      //NO esta el campo de la funcion que hizo edgar
      //    $col11 = new Columna('Dias Difer.');
      //    $col11->setTipo(Columna::MONTO);
      //    $col11->setAlineacionObjeto(Columna::CENTRO);
      //    $col11->setAlineacionContenido(Columna::CENTRO);
      //    $col11->setNombreCampo('diadif');
      //    $col11->setHTML('type="text" size="20" maxlength="20"  readonly=true');
      //    $col11->setOculta(true);

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
      $opciones->addColumna($col18);
      $opciones->addColumna($col19);
      $opciones->addColumna($col20);

    ///FIN COLUMNAS///

    $this->obj = $opciones->getConfig($per);
  }



  public function executeAutocomplete() {
    if ($this->getRequestParameter('ajax') == '1') {
      $this->tags = Herramientas :: autocompleteAjax('CODEMP', 'Nphojint', 'Codemp', $this->getRequestParameter('nppresoc[codemp]'));
    }
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit() {

    $this->nppresoc       = $this->getNppresocOrCreate();
    $this->capitalizacion = Constantes :: Capitalizacion();
    $this->mcodigo = '';

    if (SF_ENVIRONMENT == 'dev') {
      $this->ent = '_dev';
    } else {
      $this->ent = '';
    }
    //$this->configGridRN();
    //$this->configGridRA();
    //$this->configGridIntereses();

    if ($this->getRequest()->getMethod() == sfRequest :: POST) {
      $calculado = $this->getUser()->getAttribute('calculado');
	  $anno = $this->getUser()->getAttribute('anno');
      $this->updateNppresocFromRequest();

////$this->getUser()->getAttributeHolder()->remove('calculado');
      if ($calculado=='SI'){
      	$this->configGrid($this->nppresoc->getCodemp(),@adodb_date("d/m/Y",adodb_strtotime($this->nppresoc->getFeccor())), $this->nppresoc->getCapitalizacion(),$this->nppresoc->getSalario());
		$this->configGrid_bueno($this->nppresoc->getCodemp(),@adodb_date("d/m/Y",adodb_strtotime($this->nppresoc->getFeccor())), $this->nppresoc->getCapitalizacion(),$this->nppresoc->getSalario(),$anno);
      }
      $this->saveNppresoc($this->nppresoc);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add')) {
        return $this->redirect('presnomcalintpre/create');
      } else
        if ($this->getRequestParameter('save_and_list')) {
          //return $this->redirect('presnomcalintpre/list');
          return $this->redirect('presnomcalintpre/create');
        } else {
          //return $this->redirect('presnomcalintpre/edit?id=' . $this->nppresoc->getId());
          return $this->redirect('presnomcalintpre/create');
        }
    } else {
        $this->configGrid();
		$this->configGrid_bueno();
        $this->configGridRA();
        $this->configGridIntereses();

      $this->labels = $this->getLabels();
    }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRN($codigo='') {
    /////PARA LA CONSULTA//////
    $c = new Criteria();
    $c->add(NpimppresocPeer :: CODEMP, $codigo);
    $c->add(NpimppresocPeer :: TIPO, "(npimppresoc.TIPO<>'T' or npimppresoc.TIPO is null  )", Criteria :: CUSTOM);
    $c->addAscendingOrderByColumn(NpimppresocPeer :: FECINI);
    $c->addAscendingOrderByColumn(NpimppresocPeer :: TIPO);
    $per = NpimppresocPeer :: doSelect($c);

 /*   $sql="select
        (case
        when tipo = 'P' then 'AJUSTE DIAS ADICIONALES NO DEPOSITADOS'
        when tipo = 'A' then 'AJUSTE DIAS NO DEPOSITADOS' end)
        as  tipo,
        * from Npimppresoc where codemp='$codigo' and tipo<>'T' or tipo is null  ";

      Herramientas :: BuscarDatos($sql, & $result);
      $per = $result;
*/
    $this->tfil = count($per);
	  $this->intacu=0;
	  $this->capitalact=0;
      if ($per)
      {
        //Saco los totales Regimen Nuevo
        //$this->antannos  = $per[$this->tfil-1]['antannos'];
        //$this->antmeses  = $per[$this->tfil-1]['antmeses'];
        //$this->antdias   = $per[$this->tfil-1]['antdias'];		
		$this->capitalact = $per[$this->tfil-1]->getAntacum();
		foreach($per as $r)
		{
			if($r->getIntacum()!=0)
			$this->intacu = $r->getIntacum();	
		}
        // Copio los dos ultimo registro
        $this->grid_1 = $per[$this->tfil-1];
        $this->grid_2 = $per[$this->tfil-2];

        // array_pop($per);  ///Borra la Ultima Posicion
          // array_pop($per);  ///Borra la Ultima Posicion
      }


    ///FIN CONSULTA///

    ////OPCIONES DEL GRID//////
    $opciones = new OpcionesGrid();
    $opciones->setTabla('Npimppresoc');
    $opciones->setAnchoGrid(600);
    $opciones->setEliminar(false);
    $opciones->setFilas(0);
    $opciones->setName('a');
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');
    ///FIN OPCIONES///

    /////COLUMNAS///////
    $col1 = new Columna('Del');
    $col1->setTipo(Columna :: FECHA);
    $col1->setAlineacionObjeto(Columna :: CENTRO);
    $col1->setAlineacionContenido(Columna :: CENTRO);
    $col1->setNombreCampo('fecini');
    $col1->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col2 = new Columna('Al');
    $col2->setTipo(Columna :: FECHA);
    $col2->setAlineacionObjeto(Columna :: CENTRO);
    $col2->setAlineacionContenido(Columna :: CENTRO);
    $col2->setNombreCampo('fecfin');
    $col2->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col3 = new Columna('Devengado');
    $col3->setTipo(Columna :: MONTO);
    $col3->setAlineacionObjeto(Columna :: CENTRO);
    $col3->setAlineacionContenido(Columna :: CENTRO);
    $col3->setNombreCampo('salemp');
    $col3->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col4 = new Columna('Salario Diario');
    $col4->setTipo(Columna :: MONTO);
    $col4->setAlineacionObjeto(Columna :: CENTRO);
    $col4->setAlineacionContenido(Columna :: CENTRO);
    $col4->setNombreCampo('salempdia');
    $col4->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col5 = new Columna('Alicuota Utilidad');
    $col5->setTipo(Columna :: MONTO);
    $col5->setAlineacionObjeto(Columna :: CENTRO);
    $col5->setAlineacionContenido(Columna :: CENTRO);
    $col5->setNombreCampo('aliuti');
    $col5->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col6 = new Columna('Alicuota de Bono Vac.');
    $col6->setTipo(Columna :: MONTO);
    $col6->setAlineacionObjeto(Columna :: CENTRO);
    $col6->setAlineacionContenido(Columna :: CENTRO);
    $col6->setNombreCampo('alibono');
    $col6->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col7 = new Columna('Total Diario');
    $col7->setTipo(Columna :: MONTO);
    $col7->setAlineacionObjeto(Columna :: CENTRO);
    $col7->setAlineacionContenido(Columna :: CENTRO);
    $col7->setNombreCampo('saltot');
    $col7->setHTML('type="text" size="10" maxlength="10"  readonly=true');  

    $col9 = new Columna('Dias Art. 108');
    $col9->setTipo(Columna :: MONTO);
    $col9->setAlineacionObjeto(Columna :: CENTRO);
    $col9->setAlineacionContenido(Columna :: CENTRO);
    $col9->setNombreCampo('diaart108');
    $col9->setEsTotal(true, 'totmonpres');
    $col9->setHTML('type="text" size="5" maxlength="5"  readonly=true');

    $col10 = new Columna('Salario Dia Adicional');
    $col10->setTipo(Columna :: MONTO);
    $col10->setAlineacionObjeto(Columna :: CENTRO);
    $col10->setAlineacionContenido(Columna :: CENTRO);
    $col10->setNombreCampo('saldi');
    $col10->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col11 = new Columna('Capital');
    $col11->setTipo(Columna :: MONTO);
    $col11->setAlineacionObjeto(Columna :: CENTRO);
    $col11->setAlineacionContenido(Columna :: CENTRO);
    $col11->setNombreCampo('capemp');
    $col11->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col12 = new Columna('Antiguedad Acumulada');
    $col12->setTipo(Columna :: MONTO);
    $col12->setAlineacionObjeto(Columna :: CENTRO);
    $col12->setAlineacionContenido(Columna :: CENTRO);
    $col12->setNombreCampo('antacum');
    //$col12->setEsTotal(true, 'totcapitalact');
    $col12->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col13 = new Columna('Valor Art. 108');
    $col13->setTipo(Columna :: MONTO);
    $col13->setAlineacionObjeto(Columna :: CENTRO);
    $col13->setAlineacionContenido(Columna :: CENTRO);
    $col13->setNombreCampo('valart108');
    $col13->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col14 = new Columna('Tasa');
    $col14->setTipo(Columna :: TEXTO);
    $col14->setAlineacionObjeto(Columna :: CENTRO);
    $col14->setAlineacionContenido(Columna :: CENTRO);
    $col14->setNombreCampo('tasint');
    $col14->setHTML('type="text" size="5" maxlength="5"  readonly=true');

    $col15 = new Columna('Dias Difer.');
    $col15->setTipo(Columna :: TEXTO);
    $col15->setAlineacionObjeto(Columna :: CENTRO);
    $col15->setAlineacionContenido(Columna :: CENTRO);
    $col15->setNombreCampo('diadif');
    $col15->setHTML('type="text" size="5" maxlength="5"  readonly=true');

    $col16 = new Columna('Interes Devengado');
    $col16->setTipo(Columna :: MONTO);
    $col16->setAlineacionObjeto(Columna :: CENTRO);
    $col16->setAlineacionContenido(Columna :: CENTRO);
    $col16->setNombreCampo('intdev');
    $col16->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col17 = new Columna('Interes Acumulado');
    $col17->setTipo(Columna :: MONTO);
    $col17->setAlineacionObjeto(Columna :: CENTRO);
    $col17->setAlineacionContenido(Columna :: CENTRO);
    $col17->setNombreCampo('intacum');
    #$col17->setEsTotal(true, 'totintacu');
    $col17->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col18 = new Columna('Adelanto Antig.');
    $col18->setTipo(Columna :: MONTO);
    $col18->setAlineacionObjeto(Columna :: CENTRO);
    $col18->setAlineacionContenido(Columna :: CENTRO);
    $col18->setNombreCampo('adeant');
    $col18->setEsTotal(true, 'totmonant');
    $col18->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col19 = new Columna('Adelanto Inter.');
    $col19->setTipo(Columna :: MONTO);
    $col19->setAlineacionObjeto(Columna :: CENTRO);
    $col19->setAlineacionContenido(Columna :: CENTRO);
    $col19->setNombreCampo('adepre');
    $col19->setEsTotal(true, 'totmonadeint');
    $col19->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col20 = new Columna('Tipo');
    $col20->setTipo(Columna :: TEXTO);
    $col20->setAlineacionObjeto(Columna :: CENTRO);
    $col20->setAlineacionContenido(Columna :: CENTRO);
    $col20->setNombreCampo('tipo');
    //$col19->setEsTotal(true, 'totmonadeint');
    $col20->setHTML('type="text" size="10" maxlength="10"  readonly=true');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    #$opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);

    ///FIN COLUMNAS///

    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRA($codigo='') {
    /////PARA LA CONSULTA//////
    $c = new Criteria();
    $c->add(NpimppresocantPeer :: CODEMP, $codigo);
    $c->addAscendingOrderByColumn(NpimppresocantPeer :: FECINI);
    $per = NpimppresocantPeer :: doSelect($c);
    ///FIN CONSULTA///

    $this->tfil2 = count($per);
	$this->intacu2=0;
    $this->capitalact2=0;
	if ($per)
      {
        //Saco los totales Regimen Nuevo
        //$this->antannos  = $per[$this->tfil-1]['antannos'];
        //$this->antmeses  = $per[$this->tfil-1]['antmeses'];
        //$this->antdias   = $per[$this->tfil-1]['antdias'];
		$this->capitalact2 = $per[$this->tfil2-1]->getAntacum();
		foreach($per as $r)
		{
			if($r->getIntacum()!=0)
			$this->intacu2 = $r->getIntacum();	
		}
        // Copio los dos ultimo registro
        $this->grid_1 = $per[$this->tfil2-1];
        $this->grid_2 = $per[$this->tfil2-2];

        // array_pop($per);  ///Borra la Ultima Posicion
          // array_pop($per);  ///Borra la Ultima Posicion
      }

    ////OPCIONES DEL GRID//////
    $opciones = new OpcionesGrid();
    $opciones->setTabla('npimppresocant');
    $opciones->setAnchoGrid(600);
    $opciones->setFilas(0);
    $opciones->setName('b');
    $opciones->setEliminar(false);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');
    ///FIN OPCIONES///

    /////COLUMNAS///////
    $col1 = new Columna('Del');
    $col1->setTipo(Columna :: FECHA);
    $col1->setAlineacionObjeto(Columna :: CENTRO);
    $col1->setAlineacionContenido(Columna :: CENTRO);
    $col1->setNombreCampo('fecini');
    $col1->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col2 = new Columna('Al');
    $col2->setTipo(Columna :: FECHA);
    $col2->setAlineacionObjeto(Columna :: CENTRO);
    $col2->setAlineacionContenido(Columna :: CENTRO);
    $col2->setNombreCampo('fecfin');
    $col2->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col3 = new Columna('Salario');
    $col3->setTipo(Columna :: MONTO);
    $col3->setAlineacionObjeto(Columna :: CENTRO);
    $col3->setAlineacionContenido(Columna :: CENTRO);
    $col3->setNombreCampo('salemp');
    $col3->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col4 = new Columna('Tasa');
    $col4->setTipo(Columna :: TEXTO);
    $col4->setAlineacionObjeto(Columna :: CENTRO);
    $col4->setAlineacionContenido(Columna :: CENTRO);
    $col4->setNombreCampo('tasint');
    $col4->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col5 = new Columna('Deposito');
    $col5->setTipo(Columna :: MONTO);
    $col5->setAlineacionObjeto(Columna :: CENTRO);
    $col5->setAlineacionContenido(Columna :: CENTRO);
    $col5->setNombreCampo('capemp');
    $col5->setHTML('type="text" size="20" maxlength="20"  readonly=true');
	
	$col6 = new Columna('Capital');
    $col6->setTipo(Columna :: MONTO);
    $col6->setAlineacionObjeto(Columna :: CENTRO);
    $col6->setAlineacionContenido(Columna :: CENTRO);
    $col6->setNombreCampo('antacum');
    $col6->setHTML('type="text" size="20" maxlength="20"  readonly=true');
	
	$col7 = new Columna('Anticipo');
    $col7->setTipo(Columna :: MONTO);
    $col7->setAlineacionObjeto(Columna :: CENTRO);
    $col7->setAlineacionContenido(Columna :: CENTRO);
    $col7->setNombreCampo('adeant');
    $col7->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col8 = new Columna('Interes Devengado');
    $col8->setTipo(Columna :: MONTO);
    $col8->setAlineacionObjeto(Columna :: CENTRO);
    $col8->setAlineacionContenido(Columna :: CENTRO);
    $col8->setNombreCampo('intdev');
    $col8->setHTML('type="text" size="20" maxlength="20"  readonly=true');
	
    $col9 = new Columna('Años de Servicios');
    $col9->setTipo(Columna :: MONTO);
    $col9->setAlineacionObjeto(Columna :: CENTRO);
    $col9->setAlineacionContenido(Columna :: CENTRO);
    $col9->setNombreCampo('anoser');
    $col9->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col10 = new Columna('Adelanto de Intereses');
    $col10->setTipo(Columna :: MONTO);
    $col10->setAlineacionObjeto(Columna :: CENTRO);
    $col10->setAlineacionContenido(Columna :: CENTRO);
    $col10->setNombreCampo('adeant');
    $col10->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col11 = new Columna('Interes Acumulado');
    $col11->setTipo(Columna :: MONTO);
    $col11->setAlineacionObjeto(Columna :: CENTRO);
    $col11->setAlineacionContenido(Columna :: CENTRO);
    $col11->setNombreCampo('intacum');
    $col11->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col12 = new Columna('Dias Difer');
    $col12->setTipo(Columna :: MONTO);
    $col12->setAlineacionObjeto(Columna :: CENTRO);
    $col12->setAlineacionContenido(Columna :: CENTRO);
    $col12->setNombreCampo('diadif');
    $col12->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col13 = new Columna('codtipcon');
    $col13->setTipo(Columna :: TEXTO);
    $col13->setNombreCampo('codtipcon');
    $col13->setEsGrabable('true');
    $col13->setOculta('true');

    $col14 = new Columna('antdias');
    $col14->setTipo(Columna :: TEXTO);
    $col14->setNombreCampo('antdias');
    $col14->setOculta('true');
	
    $col15 = new Columna('antmeses');
    $col15->setTipo(Columna :: TEXTO);
    $col15->setNombreCampo('antmeses');
    $col15->setOculta('true');

    $col16 = new Columna('antannos');
    $col16->setTipo(Columna :: TEXTO);
    $col16->setNombreCampo('antannos');
    $col16->setOculta('true');


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




    ///FIN COLUMNAS///

    $this->obj2 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridIntereses() {
    /////PARA LA CONSULTA//////
    $c = new Criteria();
    $c->add(Npimppresoc1Peer :: CODEMP, $this->mcodigo);
    $per = Npimppresoc1Peer :: doSelect($c);
    ///FIN CONSULTA///

    $this->tfil3 = count($per);

    ////OPCIONES DEL GRID//////
    $opciones = new OpcionesGrid();
    $opciones->setTabla('Npimppresoc');
    $opciones->setAnchoGrid(600);
    $opciones->setFilas(0);
    $opciones->setName('c');
    $opciones->setEliminar(false);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');
    ///FIN OPCIONES///

    /////COLUMNAS///////
    $col1 = new Columna('Del');
    $col1->setTipo(Columna :: TEXTO);
    $col1->setAlineacionObjeto(Columna :: CENTRO);
    $col1->setAlineacionContenido(Columna :: CENTRO);
    $col1->setNombreCampo('fecini');
    $col1->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col2 = new Columna('Al');
    $col2->setTipo(Columna :: TEXTO);
    $col2->setAlineacionObjeto(Columna :: CENTRO);
    $col2->setAlineacionContenido(Columna :: CENTRO);
    $col2->setNombreCampo('fecfin');
    $col2->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col3 = new Columna('Tasa');
    $col3->setTipo(Columna :: TEXTO);
    $col3->setAlineacionObjeto(Columna :: CENTRO);
    $col3->setAlineacionContenido(Columna :: CENTRO);
    $col3->setNombreCampo('tasint');
    $col3->setHTML('type="text" size="10" maxlength="10"  readonly=true');

    $col4 = new Columna('Dias Difer.');
    $col4->setTipo(Columna :: MONTO);
    $col4->setAlineacionObjeto(Columna :: CENTRO);
    $col4->setAlineacionContenido(Columna :: CENTRO);
    $col4->setNombreCampo('diadif');
    $col4->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col5 = new Columna('Capital Regimen Anterior');
    $col5->setTipo(Columna :: MONTO);
    $col5->setAlineacionObjeto(Columna :: CENTRO);
    $col5->setAlineacionContenido(Columna :: CENTRO);
    $col5->setNombreCampo('capvie');
    $col5->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col6 = new Columna('Capital Capitalizado');
    $col6->setTipo(Columna :: MONTO);
    $col6->setAlineacionObjeto(Columna :: CENTRO);
    $col6->setAlineacionContenido(Columna :: CENTRO);
    $col6->setNombreCampo('capcap');
    $col6->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col7 = new Columna('Interes Regimen Anterior');
    $col7->setTipo(Columna :: MONTO);
    $col7->setAlineacionObjeto(Columna :: CENTRO);
    $col7->setAlineacionContenido(Columna :: CENTRO);
    $col7->setNombreCampo('intdev');
    $col7->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col8 = new Columna('Intereses Acumulado');
    $col8->setTipo(Columna :: MONTO);
    $col8->setAlineacionObjeto(Columna :: CENTRO);
    $col8->setAlineacionContenido(Columna :: CENTRO);
    $col8->setNombreCampo('intacum');
    $col8->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $col9 = new Columna('Adelanto Prestaciones');
    $col9->setTipo(Columna :: MONTO);
    $col9->setAlineacionObjeto(Columna :: CENTRO);
    $col9->setAlineacionContenido(Columna :: CENTRO);
    $col9->setNombreCampo('adepre');
    $col9->setHTML('type="text" size="20" maxlength="20"  readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);

    ///FIN COLUMNAS///

    $this->obj3 = $opciones->getConfig($per);
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
  protected function saveNppresoc($nppresoc) {
    $coderr = -1;
    // habilitar la siguiente línea si se usa grid
    $gridrn = Herramientas :: CargarDatosGrid($this, $this->obj);
	$gridra = Herramientas :: CargarDatosGrid($this, $this->obj2);

    //Copiamos los totales
	if(count($gridra[0])>0 && count($gridrn[0])<=0)
	{
		$grid=$gridra;
		$grid[2] = array ($this->getRequestParameter('totintacu2'), $this->getRequestParameter('totmonadeint2'), $this->getRequestParameter('totmonpres2'), $this->getRequestParameter('totmonant2'), $this->getRequestParameter('totcapitalact2'));		
		$grid[3][] = $this->grid_1;
      	$grid[3][] = $this->grid_2;
		$grid[3][] = array($this->antdias2,$this->antmeses2,$this->antannos2);
		$grid[4][] = 'V';
	}else
	{
		$grid=$gridrn;
		$grid[2] = array ($this->getRequestParameter('totintacu'), $this->getRequestParameter('totmonadeint'), $this->getRequestParameter('totmonpres'), $this->getRequestParameter('totmonant'), $this->getRequestParameter('totcapitalact'));			
		$grid[3][] = $this->grid_1;
      	$grid[3][] = $this->grid_2;
		$grid[3][] = array($this->antdias,$this->antmeses,$this->antannos);
		$grid[4][] = 'N';
	}
    	
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:

      $coderr = PrestacionesSociales :: saveNppresoc($nppresoc, $grid);

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
    return $coderr;

  }


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNppresocFromRequest()
  {
    $nppresoc = $this->getRequestParameter('nppresoc');

    if (isset($nppresoc['codemp']))
    {
      $this->nppresoc->setCodemp($nppresoc['codemp']);
    }
    if (isset($nppresoc['cedemp']))
    {
      $this->nppresoc->setCedemp($nppresoc['cedemp']);
    }
    if (isset($nppresoc['nomemp']))
    {
      $this->nppresoc->setNomemp($nppresoc['nomemp']);
    }
    if (isset($nppresoc['fecing']))
    {
      $this->nppresoc->setFecing($nppresoc['fecing']);
    }

    if (isset($nppresoc['feccalpres']))
    {
      $this->nppresoc->setFeccal($nppresoc['feccalpres']);
    }
    if (isset($nppresoc['destipcon']))
    {
      $this->nppresoc->setDestipcon($nppresoc['destipcon']);
    }
    if (isset($nppresoc['mesinicio']))
    {
      $this->nppresoc->setMesinicio($nppresoc['mesinicio']);
    }
    if (isset($nppresoc['feccor']))
    {
      if ($nppresoc['feccor'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nppresoc['feccor']))
          {
            $value = $dateFormat->format($nppresoc['feccor'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nppresoc['feccor'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nppresoc->setFeccor($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nppresoc->setFeccor(null);
      }
    }
    if (isset($nppresoc['diatra']))
    {
      $this->nppresoc->setDiatra($nppresoc['diatra']);
    }
    if (isset($nppresoc['mestra']))
    {
      $this->nppresoc->setMestra($nppresoc['mestra']);
    }
    if (isset($nppresoc['anotra']))
    {
      $this->nppresoc->setAnotra($nppresoc['anotra']);
    }
    if (isset($nppresoc['diaser']))
    {
      $this->nppresoc->setDiaser($nppresoc['diaser']);
    }
    if (isset($nppresoc['messer']))
    {
      $this->nppresoc->setMesser($nppresoc['messer']);
    }
    if (isset($nppresoc['anoser']))
    {
      $this->nppresoc->setAnoser($nppresoc['anoser']);
    }
    if (isset($nppresoc['codcon']))
    {
      $this->nppresoc->setCodcon($nppresoc['codcon']);
    }
    if (isset($nppresoc['salario']))
    {
      $this->nppresoc->setSalario($nppresoc['salario']);
    }
    if (isset($nppresoc['intereses']))
    {
      $this->nppresoc->setIntereses($nppresoc['intereses']);
    }

    $this->nppresoc->setCapitalizacion($this->getRequestParameter('capitalizacion'));

  }




  protected function getNppresocOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nppresoc = new Nppresoc();
    //  $this->configGrid();
    }
    else
    {
      $nppresoc = NppresocPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($nppresoc);
//      $this->configGrid($nppresoc->getCodpro(),$nppresoc->getCodaccesp(),$nppresoc->getCodmet());
      //$this->configGrid($this->nppresoc->getCodemp(),adodb_date("d/m/Y", strtotime($this->nppresoc->getFeccor())), $this->nppresoc->getCapitalizacion());
      $this->configGridRN();
	  $this->configGridRA();
    }

    return $nppresoc;
  }

}