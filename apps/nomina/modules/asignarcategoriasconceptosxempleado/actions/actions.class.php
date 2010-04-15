<?php

/**
 * asignarcategoriasconceptosxempleado actions.
 *
 * @package    Roraima
 * @subpackage asignarcategoriasconceptosxempleado
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class asignarcategoriasconceptosxempleadoActions extends autoasignarcategoriasconceptosxempleadoActions
{

  private $coderr = -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
   /*Falta parametros para que funcione los mensaje de error
   *Consultar con luis...
   **/
    parent::executeEdit();

  }

 protected function getNpasicatconempOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npasicatconemp = new Npasicatconemp();
       $this->configGrid($this->getRequestParameter('npasicatconemp[codcon]'));
    }
    else
    {

      $npasicatconemp = NpasicatconempPeer::retrieveByPk($this->getRequestParameter($id));

      $this->configGrid($npasicatconemp->getCodcon());

      $this->forward404Unless($npasicatconemp);
    }

    return $npasicatconemp;
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
  $sql = "select P.*,Q.nomcat from (
SELECT (case when (Z.CODcat is null )then W.CODCAT else Z.CODCAT end) AS CODCAT,w.codemp,w.nomemp,w.codnom,w.nomnom,w.codcar,w.nomcar,w.codcon,w.nomcon, 9 as id from
(Select Distinct A.codemp,A.nomemp,A.codnom,A.nomnom,A.codcar,A.nomcar,B.codcon,B.nomcon,A.codcat
        From npasicaremp A,npasiconemp B
        Where A.codemp=B.codemp And
              A.codcar=B.codcar And
              A.status='V' And
              B.codcon='".$codigo."') AS W LEFT OUTER JOIN NPASICATCONEMP AS Z ON W.CODEMP=Z.CODEMP AND W.CODCAR=Z.CODCAR AND W.CODCON=Z.CODCON
              ) P, npcatpre Q where P.codcat=Q.codcat";

    $resp = Herramientas::BuscarDatos($sql,&$per);
    $filas_arreglo=30;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npasicatconemp');
    $opciones->setName('a');
    $opciones->setAnchoGrid(1500);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('CI.Del Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codemp');
    $col1->setHTML('type="text" size="10" readonly=true');

    $col2 = new Columna('Nombre Del Empleado');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="30" readonly=true');

    $col3 = new Columna('Cargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('codcar');
    $col3->setHTML('type="text" size="5" readonly=true');

    $col4 = new Columna('Descricion');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nomcar');
    $col4->setHTML('type="text" size="30" readonly=true');

    $obja=array('codcat'=> 5, 'nomcat' => 6);
    $col5 = new Columna('Cod. Categora');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codcat');
    $col5->setEsGrabable(true);
    $col5->setCatalogo('Npcatpre','sf_admin_edit_form',$obja,'Npcatpre_Categoriaxemp');
    $col5->setHTML('type="text" size="10" readonly=true');

    $col6 = new Columna('Catergoria');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('nomcat');
    $col6->setHTML('type="text" size="30" readonly=true');

    $col7 = new Columna('Cod. Nomina');
    $col7->setTipo(Columna::TEXTO);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('codnom');
    $col7->setHTML('type="text" size="5" readonly=true');

    $col8 = new Columna('Nomina');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::IZQUIERDA);
    $col8->setAlineacionContenido(Columna::IZQUIERDA);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('nomnom');
    $col8->setHTML('type="text" size="25" readonly=false');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
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
     //EmpleadosBanco::ArregloEmpleados($this->getRequestParameter('codigo'),&$arreglodet);
     $this->configGrid($this->getRequestParameter('codigo'));
     $dato = Herramientas::getX('codcon','npdefcpt','nomcon',$this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

     //return sfView::HEADER_ONLY;
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
  public function saveNpasicatconemp($npasicatconemp)
  {
    $coderr = -1;

    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true,$this->getRequestParameter('npasicatconemp[codcon]'));


    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);
	     $coderr = EmpleadosBanco::Grabar_grid_Npasicatconemp($npasicatconemp,$grid,$this->getRequestParameter('npasicatconemp[codcon]'));

      // OJO ----> Eliminar esta linea al modificar este método
      //parent::saveNpasicatconemp($npasicatconemp);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }

    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


  public function deleteNpasicatconemp($Npasicatconemp)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteNpasicatconemp($Npasicatconemp);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }

  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->caajuoc = $this->getCaajuocOrCreate();
      // $this->Npasicatconemp= $this->getNpasicatconempOrCreate();
      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);
      // o
       //Para que el codigo no se pueda cambiar al editar el registro:
       //$this->tstipmov= $this->getTstipmovOrCreate();
       //$tstipmov = $this->getRequestParameter('tstipmov');
       //$valor = $tstipmov['codtip'];
       //$campo='codtip';

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderr = $resp;
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    //Colocar la Primera letra en minuscula
    $this->Npasicatconemp= $this->getNpasicatconempOrCreate();
    $this->updateNpasicatconempFromRequest();


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
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function ActualizarGrid()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);

  }

}
