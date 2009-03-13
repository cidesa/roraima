<?php

/**
 * ingreging actions.
 *
 * @package    siga
 * @subpackage ingreging
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingregingActions extends autoingregingActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->setVars();
		$this->configGrid();

  }

  public function setVars()
  {


  	$this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
  	$this->longpre=strlen($this->mascarapresupuesto);


  }

  protected function updateCiregingFromRequest()
  {
    $cireging = $this->getRequestParameter('cireging');

    if (isset($cireging['refing']))
    {
      $this->cireging->setRefing($cireging['refing']);
    }
    if (isset($cireging['fecing']))
    {
      if ($cireging['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cireging['fecing']))
          {
            $value = $dateFormat->format($cireging['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cireging['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cireging->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cireging->setFecing(null);
      }
    }
    if (isset($cireging['desing']))
    {
      $this->cireging->setDesing($cireging['desing']);
    }
    if (isset($cireging['codtip']))
    {
      $this->cireging->setCodtip($cireging['codtip']);
    }
    if (isset($cireging['rifcon']))
    {
      $this->cireging->setRifcon($cireging['rifcon']);
    }
    if (isset($cireging['numcue']))
    {
      $this->cireging->setCtaban($cireging['numcue']);
    }
    if (isset($cireging['tipmov']))
    {
      $this->cireging->setTipmov($cireging['tipmov']);
    }
    if (isset($cireging['numdep']))
    {
      $this->cireging->setNumdep($cireging['numdep']);
    }
    if (isset($cireging['numofi']))
    {
      $this->cireging->setNumofi($cireging['numofi']);
    }
    if (isset($cireging['previs']))
    {
      $this->cireging->setPrevis($cireging['previs']);
    }
    if (isset($cireging['grid']))
    {
      $this->cireging->setGrid($cireging['grid']);
    }
    if (isset($cireging['moning']))
    {
      $this->cireging->setMoning($cireging['moning']);
    }
    if (isset($cireging['monrec']))
    {
      $this->cireging->setMonrec($cireging['monrec']);
    }
    if (isset($cireging['mondes']))
    {
      $this->cireging->setMondes($cireging['mondes']);
    }
    if (isset($cireging['montot']))
    {
      $this->cireging->setMontot($cireging['montot']);
    }

  }


  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(CiimpingPeer::REFING,$this->cireging->getRefing());
    $per = CiimpingPeer::doSelect($c);
    //H::printR($per);exit;
	$mascara=$this->mascarapresupuesto;
	$longitud=$this->longpre;
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingreging/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

	$c1= new Criteria();
	$c1->add(CiregingPeer::REFING,$this->cireging->getRefing());
	$p= CiregingPeer::doSelectOne($c1);

    $obj= array('codpre' => 1);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingadidis_cideftit',$params);
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="ajaxcodpre(event,this.id),repetido(event,this.id)"');
    $this->columnas[1][1]->setHTML('onBlur="event.keyCode=13;return formatoDecimal(event,this.id),valcod(event,this.id)"');
    $this->columnas[1][1]->setEsTotal(true,'cireging_moning');
    $this->columnas[1][3]->setHTML('onBlur="event.keyCode=13;return formatoDecimal(event,this.id),calculardcto(),calcularneto()"');
    $this->columnas[1][3]->setEsTotal(true,'cireging_monrec');
    $this->columnas[1][4]->setEsTotal(true,'cireging_mondes');


	if ($p!=''){
		//$this->columnas[1][4]->setOculta(true);
		$this->columnas[1][0]->setHTML('readonly=true');
		$this->columnas[1][1]->setHTML('readonly=true');
		$this->columnas[1][2]->setHTML('readonly=true');
		$this->columnas[1][3]->setHTML('readonly=true');
		$this->columnas[1][4]->setHTML('readonly=true');
	}else{
		//$this->columnas[1][4]->setOculta(false);
	}


    $this->grid = $this->columnas[0]->getConfig($per);
    $this->cireging->setGrid($this->grid);


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo');

    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        $codigo = $this->getRequestParameter('codigo');

        $c= new Criteria();
        $c->add(TstipmovPeer::CODTIP,$codigo);
        $datos=TstipmovPeer::doSelectOne($c);
        if ($datos){
        	$descripcion=$datos->getDestip();
        }else{
        	$descripcion='';
        }
        $output = '[["cireging_destipmov","'.$descripcion.'",""]]';
        break;
      case '2':
      	$codigo = $this->getRequestParameter('codigo');
      	$cajtexcom = $this->getRequestParameter('cajtexcom');

        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$codigo);
        $reg=CideftitPeer::doSelectOne($c);

      	if ($reg)
      	{
          $output = '[["","",""]]';
        }
        else
        {
          $javascript="alert('Código presupuestario no existe');$(id).value='';";

        $output = '[["javascript","'.$javascript.'",""]]';
    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	return sfView::HEADER_ONLY;
        }
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


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
    //$this->configGrid($reg = array(),$regelim = array());
    $this->editing();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function executeAjaxcomprobante()
  {
     $this->cireging = $this->getCiregingOrCreate();
     $this->updateCiregingFromRequest();
     $this->editing();
     $detalle=Herramientas::CargarDatosGridv2($this,$this->grid);
     $concom=0;
     $mensaje1="";
     $msj1="";
     $msj2="";
     $cuentaporpagarrendicion="";
     $mensajeuno="";
     $msjuno="";
     $msjdos="";
     $msjtres="";
     $comprobante="";
     $this->mensajeuno="";
     $this->msj1="";
     $this->msj2="";
     $this->mensaje1="";
     $this->msjuno="";
     $this->msjdos="";
     $this->msjtres="";
     $this->i="";
     $this->formulario=array();


     if ($this->cireging->getRifcon()=="" || $this->cireging->getCtaban()=="" || count($detalle[0])==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario, el Código Contable y las Imputaciones Presupuestarias, para luego generar el comprobante";
     }
     else{

     if ($this->cireging->getRifcon()=="" || $this->cireging->getCtaban()=="")
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario y el Código Contable, para luego generar el comprobante";
     }
     }

     if ($msjtres=="")
     {

      $x=Ingresos::grabarComprobante($this->cireging,$detalle,&$comprobante);
      $concom=$concom + 1;

      $form="sf_admin/ingreging/confincomgen";
      $i=0;
      while ($i<$concom)
      {
       $f[$i]=$form.$i;
       $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
       $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
       $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
       $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
       $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
       $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
       $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
       $this->getUser()->setAttribute('tipmov', '');
       $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
       $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
       $i++;
      }
      $this->i=$concom-1;
      $this->formulario=$f;
     }
      $output = '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeAnular()
  {
    $refing=$this->getRequestParameter('refing');
    $fecing=$this->getRequestParameter('fecing');

    $c = new Criteria();
    $c->add(CiregingPeer::REFING,$refing);
    $c->add(CiregingPeer::FECING,$fecing);
    $this->cireging = CiregingPeer::doSelectOne($c);
    sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $refanu=$this->getRequestParameter('refanu');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');


    $c = new Criteria();
    $c->add(CiregingPeer::REFING,$refanu);
    $c->add(CiregingPeer::FECING,$fecanu);
    $this->cireging = CiregingPeer::doSelectOne($c);

    //H::printR($this->cireging); exit;

    $this->cireging->setDesanu($desanu);
    $this->cireging->setFecanu($fecanu);
    $this->cireging->setStaing('N');
    $this->cireging->save();

	//Anular Imp_Prc
    $c = new Criteria();
    $c->add(CiimpingPeer::REFING,$refanu);
    $c->add(CiimpingPeer::FECING,$fecanu);
    $detalle= CiimpingPeer::doSelect($c);

    //H::printR($detalle); exit;

    foreach ($detalle as $imping){
    	$imping->setStaimp('N');
      	$imping->save();
    }

   ////////////////////////////

	//Ingresos::buscar_comprobante($this->cireging,'A',$fecanu);


	Ingresos::generar_msl_anulado($this->cireging);

    sfView::SUCCESS;
  }


  public function saving($cireging)
  {

    $ano=substr($cireging->getFecing(),0,4);
  	$cireging->setAnoing($ano);
  	$cireging->setStaing('A');
    $cireging->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $graboing=Ingresos::salvarImping($cireging, $grid);
    $grabodet=Ingresos::generar_movimientos_segun_libros($cireging);

      $concom=1;
      $form="sf_admin/ingreging/confincomgen";
      if ($concom!=1)
      {
       $grabo=$this->getUser()->getAttribute('grabo',null,$form.'1');
       $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'1');
      }
      else
      {
       $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
       $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      }

      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);


          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $this->numero=$numcom;


          $cireging->setNumcom($numcom);
          $cireging->save();
          Tesoreria::Salvarconfincomgen($numcom,$reftra,$feccom,$descom,$debito,$credito);
          Tesoreria::Salvar_asientosconfincomgen($numcom,$reftra,$feccom,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));


         }
         $i++;
        }
      }


       Herramientas::getSalvarCorrelativo('cortras','cidefniv','Referencia',$numcom,$msg);

      //$this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
      //$this->getUser()->getAttributeHolder()->remove('grabo',$form.'1');

    return -1;

  }

  public function deleting($cireging)
  {

	$c1= new Criteria();
	$c1->add(TsmovlibPeer::NUMCUE,$cireging->getCtaban());
	$c1->add(TsmovlibPeer::REFLIB,$cireging->getNumdep());
	$c1->add(TsmovlibPeer::TIPMOV,$cireging->getTipmov());
	$mov=TsmovlibPeer::doSelectOne($c1);


	if ($mov){

	if ($mov->getStacon()!='C'){
    	$mov->delete();

    }else{
    	$this->setFlash('notice','El movimiento en libros no pudo ser eliminado');
        return $this->redirect('ingreging/edit?id='.$cireging->getId());
    }
	}else{
    	$this->setFlash('notice','El movimiento en libros no puede ser eliminado porque no existe');
        return $this->redirect('ingreging/edit?id='.$cireging->getId());
	}


  	$c= new Criteria();
  	$c->add(CiimpingPeer::REFING,$cireging->getRefing());
  	$datos=CiimpingPeer::doSelect($c);

  	foreach ($datos as $per2){
    	$per2->delete();
    }

    $c= new Criteria();
  	$c->add(ContabcPeer::NUMCOM,$cireging->getRefing());
  	$c->add(ContabcPeer::FECCOM,$cireging->getFecing());
  	$datos=ContabcPeer::doSelect($c);

  	foreach ($datos as $per2){
    	$per2->delete();
    }

    $c= new Criteria();
  	$c->add(Contabc1Peer::NUMCOM,$cireging->getRefing());
  	$c->add(Contabc1Peer::FECCOM,$cireging->getFecing());
  	$datos=Contabc1Peer::doSelect($c);

  	foreach ($datos as $per2){
    	$per2->delete();
    }

    $cireging->delete();

    return -1;

  }


}
