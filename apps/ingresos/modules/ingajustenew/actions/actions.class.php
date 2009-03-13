<?php

/**
 * ingajustenew actions.
 *
 * @package    siga
 * @subpackage ingajustenew
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingajustenewActions extends autoingajustenewActions
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

    protected function updateCiajusteFromRequest()
  {
    $ciajuste = $this->getRequestParameter('ciajuste');
    //H::printR($ciajuste);

    if (isset($ciajuste['refaju']))
    {
      $this->ciajuste->setRefaju($ciajuste['refaju']);
    }
    if (isset($ciajuste['fecaju']))
    {
      if ($ciajuste['fecaju'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ciajuste['fecaju']))
          {
            $value = $dateFormat->format($ciajuste['fecaju'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ciajuste['fecaju'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ciajuste->setFecaju($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciajuste->setFecaju(null);
      }
    }
    if (isset($ciajuste['anoaju']))
    {
      $this->ciajuste->setAnoaju($ciajuste['anoaju']);
    }
    if (isset($ciajuste['refing']))
    {
      $this->ciajuste->setRefere($ciajuste['refing']);
    }
    if (isset($ciajuste['desaju']))
    {
      $this->ciajuste->setDesaju($ciajuste['desaju']);
    }
    if (isset($ciajuste['desanu']))
    {
      $this->ciajuste->setDesanu($ciajuste['desanu']);
    }
    if (isset($ciajuste['totaju']))
    {
      $this->ciajuste->setTotaju($ciajuste['totaju']);
    }
    if (isset($ciajuste['staaju']))
    {
      $this->ciajuste->setStaaju($ciajuste['staaju']);
    }
    if (isset($ciajuste['fecanu']))
    {
      if ($ciajuste['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ciajuste['fecanu']))
          {
            $value = $dateFormat->format($ciajuste['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ciajuste['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ciajuste->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ciajuste->setFecanu(null);
      }
    }

  }

  public function configGrid($reg = array(),$regelim = array())
  {

    $c = new Criteria();
    $c->add(CimovajuPeer::REFAJU,$this->ciajuste->getRefaju());
    $per = CimovajuPeer::doSelect($c);
	$mascara=$this->mascarapresupuesto;
	$longitud=$this->longpre;
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingajustenew/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $obj= array('codpre' => 1);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingadidis_cideftit',$params);

    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="repetido(event,this.id),ajaxcodpre(event,this.id)"');
    $this->columnas[1][1]->setHTML('onBlur="event.keyCode=13;return formatoDecimal(event,this.id),valcod(event,this.id),calculartotal1(),haydisponibilidad(event,this.id)"');
    $this->columnas[1][2]->setOculta(true);
    //$this->columnas[1][1]->setEsTotal(true,'ciajuste_totaju');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciajuste->setGrid($this->grid);


  }


  public function configGridMov($refing)
  {


  	$this->ciajuste = $this->getCiajusteOrCreate();
    $c = new Criteria();
    $c->add(CiimpingPeer::REFING,$refing);
    $per = CiimpingPeer::doSelect($c);

    foreach ($per as $dato){
    	$dato->setMontot("0,00");
    	$dato->save();

    }

    $c1 = new Criteria();
    $c1->add(CiregingPeer::REFING,$refing);
    $per1 = CiregingPeer::doSelectOne($c1);

    //H::printR($per1);exit;

    $monto=H::FormatoMonto($per1->getMontot(),'2');
    //print $monto; exit;


	$mascara=$this->mascarapresupuesto;
	$longitud=$this->longpre;
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingajustenew/'.sfConfig::get('sf_app_module_config_dir_name').'/gridmov');

    $obj= array('codpre' => 1);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingadidis_cideftit',$params);
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="repetido(event,this.id),ajaxcodpre(event,this.id)"');
    $this->columnas[1][1]->setHTML('onBlur="event.keyCode=13;return formatoDecimal(event,this.id),valcod(event,this.id),valmonto(event,this.id),calculartotal2(),haydisponibilidad(event,this.id)"');
    $this->columnas[1][2]->setHTML('value="'.$monto.'"');
    //$this->columnas[1][1]->setEsTotal(true,'ciajuste_totaju');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->ciajuste->setGridmov($this->grid);
  }



  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
        case '1':
        $ref = $this->getRequestParameter('codigo','');
		//print "refi".$ref; exit;
        $c= new Criteria();
        $c->add(CiregingPeer::REFING,$ref);
        $datos=CiregingPeer::doSelectOne($c);
        if ($datos){
        	$refing=$datos->getRefing();
        	$desing=$datos->getDesing();
        }else{
        	$refing='';
        	$desing='';
        }
        $output = '[["ciajuste_desing","'.$desing.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        $this->ciajuste = $this->getCiajusteOrCreate();
        //$refing = $this->getRequestParameter('refere','');
        //print "ref".$refing; exit;
        //print "refi".$ref; exit;
        $this->configGridMov($ref);
        //$genera='S';
        //$this->configGrid($genera,$ref);

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
        case '3':

        $codigo = $this->getRequestParameter('codigo');
      	$monto = $this->getRequestParameter('monto');
      	$javascript="";

        $c= new Criteria();
        $c->add(CiasiiniPeer::CODPRE,$codigo);
        $c->add(CiasiiniPeer::ANOPRE,substr((CidefnivPeer::FECCIE),0,4));
        $reg=CiasiiniPeer::doSelectOne($c);

        H::printR($reg);exit;

        if ($monto>$reg->getMondis()){
          $javascript="alert('No existe disponibilidad para hacer este ajuste');$(id).value='0,00';";
        }

        $output = '[["javascript","'.$javascript.'",""]]';
    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	return sfView::HEADER_ONLY;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista


    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
  //  return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

    public function executeSalvaranu()
  {
    $refanu=$this->getRequestParameter('refanu');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');


    $c = new Criteria();
    $c->add(CiajustePeer::REFAJU,$refanu);
    $this->ciajuste = CiajustePeer::doSelectOne($c);


    $this->ciajuste->setDesanu($desanu);
    $this->ciajuste->setFecanu($fecanu);
    $this->ciajuste->setStaaju('N');
    $this->ciajuste->save();

	//Anular Mov_aju
  	$c = new Criteria();
  	$c->add(CimovajuPeer::REFAJU,$refanu);
    $per = CimovajuPeer::doSelect($c);

    foreach ($per as $dato){
    	$dato->setStamov('N');
        $dato->save();
    }


    sfView::SUCCESS;
  }

    public function executeAnular()
    {
    $refaju=$this->getRequestParameter('refaju');
    $fecaju=$this->getRequestParameter('fecaju');

    $c = new Criteria();
    $c->add(CiajustePeer::REFAJU,$refaju);
    $c->add(CiajustePeer::FECAJU,$fecaju);
    $this->ciajuste = CiajustePeer::doSelectOne($c);
    sfView::SUCCESS;
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($ciajuste)
  { //print "ref".$ciajuste->getRefere();
  	//exit;
    $ano=substr(date('d/m/YY'),6,4);
  	$ciajuste->setAnoaju($ano);
  	$ciajuste->setStaaju('A');
  	//print $ciajuste->getRefmov();exit;
  	if ($ciajuste->getRefere()==''){
  		$ciajuste->setRefere('NULO');
  	}
  	$grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  	//H::printR($grid);exit;
    Ingresos::salvarMovaju($ciajuste, $grid);
    $ciajuste->save();

    return -1;
  }

  public function deleting($ciajuste)
  {
     $c= new Criteria();
     $c->add(CimovajuPeer::REFAJU,$ciajuste->getRefaju());
     $reg=CimovajuPeer::doSelect($c);
     $eliminar=true;
     //$error=-1;

     foreach ($reg as $dato){
     	if (!Ingresos::verificardisponibilidad($dato->getCodpre(),$dato->getMonaju())){
               $eliminar=false;
               break;
     	}
     }

	//print $eliminar; exit;
     if ($eliminar){

     	$c= new Criteria();
     	$c->add(CimovajuPeer::REFAJU,$ciajuste->getRefaju());
     	$reg=CimovajuPeer::doDelete($c);

     	$ciajuste->delete();
     	$error=-1;

    }else{
    	$error=1502;

    }
		return $error;

  }//fin deleting

}
