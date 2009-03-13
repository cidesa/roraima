<?php

/**
 * oycressol actions.
 *
 * @package    siga
 * @subpackage oycressol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycressolActions extends autooycressolActions
{

  private $coderr = -1;

  public function executeEdit()
  {
   /*Falta parametros para que funcione los mensaje de error
   *Consultar con luis...
   **/
    parent::executeEdit();

  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('numsol','ocregsol','numsol',$this->getRequestParameter('ocregssol[numsol]'));
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $this->tags=Herramientas::autocompleteAjax('codemp','Nphojint','codemp',$this->getRequestParameter('ocregssol[cedemi]'));
    }
    else if ($this->getRequestParameter('ajax')=='3')
    {
      $this->tags=Herramientas::autocompleteAjax('codemp','Nphojint','codemp',$this->getRequestParameter('ocregssol[cedfir]'));
    }
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(OcregsolPeer::NUMSOL,$codigo);
        $data=OcregsolPeer::doSelectOne($c);
        if ($data)
        {
          $dato=$data->getDessol();
          $dato1=$data->getCedste();
          $dato2=Herramientas::getX('CEDSTE','Ocdatste','Nomste',$dato1);
          $dato3=date("d/m/Y",strtotime($data->getFecsol()));
          $dato4=$data->getCodemp();
          $dato5=Herramientas::getX('CODEMP','Nphojint','Nomemp',$dato4);
          $javascript="";
        }
        else { $dato=""; $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5="";
        	$javascript="alert('El Número de Solicitud no existe'); $('".$cajtexcom."').value";}
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocressol_cedulaste","'.$dato1.'",""],["ocressol_nombreste","'.$dato2.'",""],["ocressol_fechasol","'.$dato3.'",""],["ocressol_cedulate","'.$dato4.'",""],["ocressol_nomemp2","'.$dato5.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '2':
        $dato=Herramientas::getX('codemp','nphojint','nomemp',$codigo);
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '3':
        $dato=Herramientas::getX('codemp','nphojint','nomemp',$codigo);
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '4':
        $c= new Criteria();
        $c->add(OcressolPeer::NUMCOR,$codigo);
        $reg=OcressolPeer::doSelectOne($c);
        if ($reg)
        {
       	 $javascript="alert('El Número de Correspondencia ya esta utilizado'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";
        }else { $javascript="";}

		$output = '[["javascript","'.$javascript.'",""]]';

        break;


      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function saveOcressol($ocressol)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveOcressol($ocressol);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
      }

    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);
    }
  }


  public function deleteOcressol($ocressol)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteOcressol($ocressol);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }

  }

  public function validateEdit()
  {
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->caajuoc = $this->getCaajuocOrCreate();
      // $this->Ocressol= $this->getOcressolOrCreate();
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

  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    //Colocar la Primera letra en minuscula
    $this->ocressol= $this->getOcressolOrCreate();
    $this->updateOcressolFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

}
