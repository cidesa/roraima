<?php

/**
 * nomperprestamos actions.
 *
 * @package    Roraima
 * @subpackage nomperprestamos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomperprestamosActions extends autonomperprestamosActions
{
  public $coderr =-1;

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codnom='', $codcon='')
   {
      $c = new Criteria();
      if ($codnom==''){

  	  $sql = "Select Distinct(A.CodEmp) as codemp,B.NomEmp as nomemp,sum(A.Monto) as monto,sum(A.Cantidad) as cantidad," .
			"Sum(A.Acumulado) as acumulado, a.id as id From NPAsiConEmp A,NpHojInt B,npasicaremp c " .
			"where a.codcar=c.codcar and a.codemp=c.codemp and A.CodEmp=B.CodEmp and A.CodCon='" . $this->nptippre->getCodcon() . "' and B.StaEmp = 'A' and c.status='V' Group by a.id,a.Codemp,B.NomEmp Order By A.CodEmp";
      }else {

      $sql = "Select Distinct(A.CodEmp) as codemp,B.NomEmp as nomemp,sum(A.Monto) as monto,sum(A.Cantidad) as cantidad," .
			"Sum(A.Acumulado) as acumulado, a.id as id From NPAsiConEmp A,NpHojInt B,npasicaremp c " .
			"where a.codcar=c.codcar and a.codemp=c.codemp and A.CodEmp=B.CodEmp and A.CodCon='" . $codcon . "' and c.Codnom='".$codnom."' and B.StaEmp = 'A' and c.status='V' Group by a.id,a.Codemp,B.NomEmp,c.codnom Order By A.CodEmp";
      }

      $resp = Herramientas::BuscarDatos($sql,&$per);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(false);
      $opciones->setTabla('Npasiconemp');
      $opciones->setAnchoGrid(700);
      $opciones->setAncho(870);
      $opciones->setName('a');
      $opciones->setTitulo(' ');
      $opciones->setHTMLTotalFilas(' ');


      $col1 = new Columna('Codigo Empleado');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(false);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codemp');
      $col1->setHTML('type="text" size="10" readonly=true');

	  $col2 = new Columna('Nombre');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomemp');
      $col2->setEsGrabable(false);
      $col2->setHTML('type="text" size="40" readonly=true');

      $col3 = new Columna('Monto Prestamo');
      $col3->setTipo(Columna::MONTO);
      $col3->setAlineacionObjeto(Columna::DERECHA);
      $col3->setAlineacionContenido(Columna::DERECHA);
      $col3->setEsGrabable(true);
      $col3->setNombreCampo('monto');
      $col3->setHTML('type="text" size="12" ');
      $col3->setJScript('onBlur="javascript:event.keyCode=13;return entermonto(event,this.id)"');

      $col4 = clone $col3;
      $col4->setTitulo('Cuota Periódica');
      $col4->setNombreCampo('cantidad');

      $col5 = clone $col3;
      $col5->setTitulo('Saldo Prestamo');
      $col5->setNombreCampo('acumulado');



      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
      $this->obj = $opciones->getConfig($per);
  }

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptippre = $this->getNptippreOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptippreFromRequest();

      $this->saveNptippre($this->nptippre);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomperprestamos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomperprestamos/list');
      }
      else
      {
        return $this->redirect('nomperprestamos/edit?id='.$this->nptippre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
  protected function saveNptippre($nptippre)
   {
   	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      NominaConceptos::ActualizarNpasiconemp($grid);
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
	    $this->nptippre = $this->getNptippreOrCreate();
	    try{
	      $this->updateNptippreFromRequest();
	    }
	    catch(Exception $ex){}

	    $this->configGrid();
	    $this->nptippre->setObj($this->obj);

	    if($this->getRequest()->getMethod() == sfRequest::POST)
        {
          $grid=Herramientas::CargarDatosGrid($this,$this->obj);
		  $resp=NominaConceptos::ValidarDatosenGrid($grid);
		  if ($resp!=-1)  {
		  	$this->coderr=$resp;
		  	return false;
		  }
		  else return true;
        }
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

	    $this->labels = $this->getLabels();
		if($this->getRequest()->getMethod() == sfRequest::POST)
  	    {
		     $grid=Herramientas::CargarDatosGrid($this,$this->obj);

		 	 if($this->coderr!=-1)
		      {
		       $err = Herramientas::obtenerMensajeError($this->coderr);
		       $this->getRequest()->setError('',$err);
		      }
		      return sfView::SUCCESS;
         }//if($this->getRequest()->getMethod() == sfRequest::POST)
        return sfView::SUCCESS;
  }

    public function executeAjax()
    {
       $cajtexmos=$this->getRequestParameter('cajtexmos');
       $cajtexcom=$this->getRequestParameter('cajtexcom');

      if ($this->getRequestParameter('ajax')=='1')
      {
        $this->nptippre = $this->getNptippreOrCreate();
        $dato=Herramientas::getX('codnom','Npnomina','nomnom',$this->getRequestParameter('codigo'));
        $this->configGrid($this->getRequestParameter('codigo'),$this->getRequestParameter('codcon'));
        $this->nptippre->setObj($this->obj);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
}
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }

}
