<?php

/**
 * vacdiasbonovac actions.
 *
 * @package    Roraima
 * @subpackage vacdiasbonovac
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vacdiasbonovacActions extends autovacdiasbonovacActions
{

/**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npvacjorlab/filters');

    // pager
    $this->pager = new sfPropelPager('Npvacjorlab', 5);
    $c = new Criteria();
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$coderror=-1;
  	$this->coderror=-1;
    $this->npvacjorlab = $this->getNpvacjorlabOrCreate();
    //$this->configGrid($this->npvacjorlab->getCodnom());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpvacjorlabFromRequest();

      $this->saveNpvacjorlab($this->npvacjorlab);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vacdiasbonovac/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vacdiasbonovac/list');
      }
      else
      {
        return $this->redirect('vacdiasbonovac/edit?id='.$this->npvacjorlab->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
{
	$cajtexmos1=$this->getRequestParameter('cajtexmos1');
    $codnom=$this->getRequestParameter('codnom');
    $javascript='';
     if ($this->getRequestParameter('ajax')=='2')
    {
      $dato1=NpnominaPeer::getNomnom($codnom);

       $c= new Criteria();
	   $c->add(NpvacjorlabPeer::CODNOM,$codnom);
	   $per= NpvacjorlabPeer::doSelect($c);
	   if ($per){
            $cajtexmoscod='npvacjorlab_codnom';
            $d='';
            $javascript="alert ('Ya esta definida la Jornada Laboral para esa Nomina')";
         	$output = '[["javascript","'.$javascript.'",""],["'.$cajtexmoscod.'","'.$d.'",""],["'.$cajtexmos1.'","'.$d.'",""]]';

	   }
	   else
			{
				  $output = '[["'.$cajtexmos1.'","'.$dato1.'",""]]';
			}

    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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
  protected function saveNpvacjorlab($npvacjorlab)
  {
  	    $coderr = -1;
  	    $cod= $npvacjorlab->getCodnom();

  	   /* $c= new Criteria();
	    $c->add(NpvacjorlabPeer::CODNOM,$cod,Criteria::EQUAL);
	    $per= NpvacjorlabPeer::doDelete($c);*/
	   //$per= new Npvacjorlab();


   //$per->setCodnom($cod);
    $l= $npvacjorlab->getLunes();
    if ($l==1)
    {
    	$npvacjorlab->setLunes('S');
    }
    else
    {
    	$npvacjorlab->setLunes(null);
    }
    $m= $npvacjorlab->getMartes();
    if ($m==1)
    {
    	$npvacjorlab->setMartes('S');
    }
    else
    {
    	$npvacjorlab->setMartes(null);
    }
    $mi= $npvacjorlab->getMiercoles();
    if ($mi==1)
    {
    	$npvacjorlab->setMiercoles('S');
    }
    else
    {
    	$npvacjorlab->setMiercoles(null);
    }
    $j=$npvacjorlab->getJueves();
    if ($j==1)
    {
    	$npvacjorlab->setJueves('S');
    }
    else
    {
    	$npvacjorlab->setJueves(null);
    }
    $v= $npvacjorlab->getViernes();
    if ($v==1)
    {
    	$npvacjorlab->setViernes('S');
    }
    else
    {
    	$npvacjorlab->setViernes(null);
    }
    $s= $npvacjorlab->getSabado();
    if ($s==1)
    {
    	$npvacjorlab->setSabado('S');
    }
    else
    {
    	$npvacjorlab->setSabado(null);
    }
    $d= $npvacjorlab->getDomingo();
    if ($d==1)
    {
    	$npvacjorlab->setDomingo('S');
    }
    else
    {
    	$npvacjorlab->setDomingo(null);
    }
    //H::printr($npvacjorlab); exit;

    $npvacjorlab->save();
   // $grid=Herramientas::CargarDatosGrid($this,$this->obj);
   // $coderr = EmpleadosBanco::Grabar_grid_Vacdiasbonovac($this->getRequestParameter('npvacjorlab[codnom]'),$grid);

    $this->coderror=$coderr;

  }
/**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
 {
    $this->preExecute();
    $this->npvacjorlab = $this->getNpvacjorlabOrCreate();


   try{
     $this->updateNpvacjorlabFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if ($this->coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError($this->coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }
  /*
   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')

  {    $this->updateNpvacjorlabFromRequest();
       $codigo= $this->npvacjorlab->getCodnom();
       //print $codigo; exit;
  	    $c= new Criteria();
	    $c->add(NpvacdiasbonovacPeer::CODNOM,$codigo,Criteria::EQUAL);
	    $per= NpvacdiasbonovacPeer::doSelect($c);


		$opciones = new OpcionesGrid();
		$opciones->setEliminar(true);
		$opciones->setFilas(50);
		$opciones->setTabla('Npvacdiasbonovac');
		$opciones->setName('a');
		$opciones->setAnchoGrid(50);
		$opciones->setTitulo('Bono Vacacional');
		$opciones->setHTMLTotalFilas(' ');


        $col1 = new Columna('Periodo de Inicio');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('perini');
	//	$col1->setCatalogo('Nphojint','sf_admin_edit_form',array('codemp' => 1, 'nomemp' => 2, 'fecing' => 3),'Nphojint_presnomregsalint',$params);
		$col1->setHTML('type="text" size="10"');
		$col1->setJScript('onBlur="javascript:event.keyCode=13; ajax(event,this.id)"');
		//$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){" onBlur="javascript:event.keyCode=13; ajaxmonto(event,this.id);"');

		$col2 = new Columna('Periodo de Fin');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('perfin');
		$col2->setHTML('type="text" size="10"');

		$col3 = new Columna('Rango Desde (Años de Antiguedad >=)');
		$col3->setNombreCampo('rangodesde');
		$col3->setTipo(Columna::MONTO);
		$col3->setVacia(true);
		$col3->setEsGrabable(true);
	    $col3->setHTML('size="10"');

		$params1=array("'+$('npsalint_codcon').value+'",'Val1');
		$col4 = new Columna('Rango Hasta (Años de Antiguedad <=)');
		$col4->setTipo(Columna::MONTO);
		$col4->setEsGrabable(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('rangohasta');
        $col4->setHTML('size="10"');

        $col5 = new Columna('Dias de Bono Vacacional');
		$col5->setTipo(Columna::MONTO);
		$col5->setOculta(false);
		$col5->setEsGrabable(true);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('diasbonovac');
        $col5->setHTML('size="10"');


		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);


		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);



  }


  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {	$this->coderror= -1;

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->npvacjorlab = $this->getNpvacjorlabOrCreate();

       $this->updateNpvacjorlabFromRequest();
       $this->configGrid();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj);


        $this->coderror=EmpleadosBanco::Vacdiasbonovac_ValRegCompleto($grid);
if ($this->coderror==-1){
      $x=$grid[0];
	  $j=0;
	  $s=0;
	  $a=0;
	  $encontrado=false;
	  //$cod= $this->npcatpre->getCodcat();
     while ($s<count($x) and !$encontrado){
     	$rangoini= $x[$s]->getRangodesde();
     	$rangofin= $x[$s]->getRangohasta();
        if ($rangoini >= $rangofin){

        	$this->coderror= 414;
        	//print $this->coderror; exit;
             $encontrado= true;
             break;

        }

	  $s++;}}



        if (($this->coderror==-1))
        {
         //  $this->coderror=EmpleadosBanco::Validar_Vacdiasbonovac_datos($grid);

	        if (($this->coderror==-1))
	        {
	       	$this->coderror=EmpleadosBanco::Validar_Vacdiasbonovac($grid,$this->getRequestParameter('npvacjorlab[codnom]'));

	           if (($this->coderror==-1))
	             {
	                return true;
	             }else return false;

             }else return false;

        }else return false;

      }else return true;

    }
*/

}