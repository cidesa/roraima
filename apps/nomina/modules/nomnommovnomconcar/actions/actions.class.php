<?php

/**
 * nomnommovnomconcar actions.
 *
 * @package    Roraima
 * @subpackage nomnommovnomconcar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomnommovnomconcarActions extends autonomnommovnomconcarActions
{

  	protected function getNpasicarempOrCreate($id = 'id')
	{
    	if (!$this->getRequestParameter($id))
    	{
	      $npasicaremp = new Npasicaremp();
	      $this->configGrid('','','','M');

    	}
    	else
    	{
	      $npasicaremp = NpasicarempPeer::retrieveByPk($this->getRequestParameter($id));
		$this->configGrid($npasicaremp->getCodnom(),$npasicaremp->getCodcon(),$npasicaremp->getCodcar(),'M');

	      $this->forward404Unless($npasicaremp);
    	}

    	return $npasicaremp;
 	  }


	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigonomina='', $codigoconcepto='', $codigocargo='', $oculta='')
	  {

		$c = new Criteria();
	 	$c->add(NpasicarempPeer::CODNOM,$codigonomina);
	 	$c->add(NpasicarempPeer::CODCAR,$codigocargo);
	 	$c->addJoin(NpasiconempPeer::CODEMP,NpasicarempPeer::CODEMP);
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
	 	$c->add(NpasiconempPeer::CODCON,$codigoconcepto);

		$per = NpasiconempPeer::doSelect($c);

		$filas_arreglo=100;

		$opciones = new OpcionesGrid();
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npasiconemp');
		$opciones->setName('a');
		$opciones->setAnchoGrid(800);
		$opciones->setTitulo('Empleados');
		$opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Cód Emp');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codemp');
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Nombre del Empleado');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('nomemp');
		$col2->setHTML('type="text" size="30" readonly=true');

		$col3 = new Columna('Monto');
		$col3->setTipo(Columna::MONTO);
		$col3->setEsGrabable(true);
		$col3->setNombreCampo('monto');
		$col3->setHTML('type="text" size="12"');
		$col3->setJScript('onBlur="javascript: event.keyCode=13; entermontootro(event,this.id)"');
		if($oculta=='M')
		{ $col3->setOculta(false);}
		else
		{$col3->setOculta(true);}


        $col4 = new Columna('Cantidad');
		$col4->setTipo(Columna::TEXTO);
		$col4->setEsGrabable(true);
		$col4->setNombreCampo('cantidad');
		$col4->setHTML('type="text" size="12"');
		$col4->setJScript('onBlur="javascript: event.keyCode=13; enternumero(event,this.id)"');
		if($oculta=='C')
		{ $col4->setOculta(false);}
		else
		{$col4->setOculta(true);}


		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
       {
	   $cajtexmos=$this->getRequestParameter('cajtexmos');
	   $cajtexcom=$this->getRequestParameter('cajtexcom');

   	   $dato=NpnominaPeer::getDesnom(trim($this->getRequestParameter('codigo')));
	   $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   return sfView::HEADER_ONLY;
       }

	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	 	if ($this->getRequestParameter('valor')=='true')
	 	{
	 		$oculta = 'C';
	 	}
	 	else
	 	{
	 		$oculta = 'M';
	 	}
            $this->configGrid($this->getRequestParameter('codigonomina'),$this->getRequestParameter('codigoconcepto'),$this->getRequestParameter('codigocargo'),$oculta);

		$cajtexmos=$this->getRequestParameter('cajtexmos');
	      $cajtexcom=$this->getRequestParameter('cajtexcom');

            $dato=NpasiconempPeer::getNombreCargo2(trim($this->getRequestParameter('codigocargo')),trim($this->getRequestParameter('codigoconcepto')),trim($this->getRequestParameter('codigonomina')));
	      $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


	 }

	 else if ($this->getRequestParameter('ajax')=='3')
	 {
		$this->configGrid($this->getRequestParameter('codigonomina'),$this->getRequestParameter('codigoconcepto'),$this->getRequestParameter('codigocargo'),$this->getRequestParameter('valor'));
	 }

	 else if ($this->getRequestParameter('ajax')=='4')
	 {
	   $cajtexmos=$this->getRequestParameter('cajtexmos');
	   $cajtexcom=$this->getRequestParameter('cajtexcom');

   	   $dato=NpdefcptPeer::getNomconnom(trim($this->getRequestParameter('codcon')),trim($this->getRequestParameter('codnom')));
	   $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   return sfView::HEADER_ONLY;

	 }

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
  protected function saveNpasicaremp($npasicaremp)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
	Nomina::salvarNomnommovnomcon($npasicaremp,$grid);
  }


}
