<?php

/**
 * biedefconi actions.
 *
 * @package    siga
 * @subpackage biedefconi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconiActions extends autobiedefconiActions
{
  private $coderror = -1;


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        //Descripcion Codigo Nivel
        // $dato=BndefconiPeer::getDescta($codigo);

        $dato=BndefactPeer::getDesact($codigo);

        //$output = '[["'.$cajtexmos.'","'.$dato.'",""], ["bndefcon_desmue","'.$dato1.'",""]]';
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '2':

        $dato=ContabbPeer::getDescta($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '3':
         $codcta=$this->getRequestParameter('codigo2','');

         $dato=BnreginmPeer::getDesmue($codcta,$codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;

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

  public function executeAjax111()
  {
    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
      //Descripcion Codigo Nivel
      $dato=BndefconiPeer::getDescta($codigo);


        //Codigo Activo
      $dato1=BnreginmPeer::getDesmue($codigo,$dato);


        $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["bndefcons_desmue","'.$dato1.'",""]]';

        break;

      case '2':

      $dato=ContabbPeer::getDescta($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

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

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODACT','bnreginm','codact',trim($this->getRequestParameter('bndefconi[codact]')));
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('codigo')),array('cargab'),array('C'));
      }else
    if ($this->getRequestParameter('ajax')=='3')
      {
       //$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnsegmue[cobsegmue]')));
      }
  }

 public function setVars()
  {
    $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
    $lengthmask = strlen($this->mascaracontabilidad);
    $this->getUser()->setAttribute('lengthmask',$lengthmask);
  }


  public function executeEdit()
  {
    $this->bndefconi = $this->getBndefconiOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndefconiFromRequest();

      $this->saveBndefconi($this->bndefconi);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedefconi/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedefconi/list');
      }
      else
      {
        return $this->redirect('biedefconi/edit?id='.$this->bndefconi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function saveBndefconi($Bndefconi)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveBndefconi($Bndefconi);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
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

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


  public function deleteBndefconi($Bndefconi)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteBndefconi($Bndefconi);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderror);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderror);
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
        $this->coderror = $resp;
        return false;
      } else return true;

    }else return true;



  }

  protected function updateBndefconiFromRequest()
  {
    $bndefconi = $this->getRequestParameter('bndefconi');
    $this->setVars();

    if (isset($bndefconi['codact']))
    {
      $this->bndefconi->setCodact(trim($bndefconi['codact']));
    }
    if (isset($bndefconi['codinm']))
    {
      $this->bndefconi->setCodinm(trim($bndefconi['codinm']));
    }
    if (isset($bndefconi['desmue']))
    {
      $this->bndefconi->setDesmue(trim($bndefconi['desmue']));
    }
    if (isset($bndefconi['ctadepcar']))
    {
      $this->bndefconi->setCtadepcar(trim($bndefconi['ctadepcar']));
    }
    if (isset($bndefconi['descta']))
    {
      $this->bndefconi->setDescta(trim($bndefconi['descta']));
    }
    if (isset($bndefconi['ctadepabo']))
    {
      $this->bndefconi->setCtadepabo(trim($bndefconi['ctadepabo']));
    }
    if (isset($bndefconi['desctaabo']))
    {
      $this->bndefconi->setDesctaabo(trim($bndefconi['desctaabo']));
    }
    if (isset($bndefconi['ctaajucar']))
    {
      $this->bndefconi->setCtaajucar(trim($bndefconi['ctaajucar']));
    }
    if (isset($bndefconi['desctaajucar']))
    {
      $this->bndefconi->setDesctaajucar(trim($bndefconi['desctaajucar']));
    }
    if (isset($bndefconi['ctaajuabo']))
    {
      $this->bndefconi->setCtaajuabo(trim($bndefconi['ctaajuabo']));
    }
    if (isset($bndefconi['desctaajuabo']))
    {
      $this->bndefconi->setDesctaajuabo(trim($bndefconi['desctaajuabo']));
    }
    if (isset($bndefconi['ctarevcar']))
    {
      $this->bndefconi->setCtarevcar(trim($bndefconi['ctarevcar']));
    }
    if (isset($bndefconi['desctarevcar']))
    {
      $this->bndefconi->setDesctarevcar(trim($bndefconi['desctarevcar']));
    }
    if (isset($bndefconi['ctarevabo']))
    {
      $this->bndefconi->setCtarevabo(trim($bndefconi['ctarevabo']));
    }
    if (isset($bndefconi['desctarevabo']))
    {
      $this->bndefconi->setDesctarevabo(trim($bndefconi['desctarevabo']));
    }
    if (isset($bndefconi['ctapercar']))
    {
      $this->bndefconi->setCtapercar(trim($bndefconi['ctapercar']));
    }
    if (isset($bndefconi['desctapercar']))
    {
      $this->bndefconi->setDesctapercar(trim($bndefconi['desctapercar']));
    }
    if (isset($bndefconi['ctaperabo']))
    {
      $this->bndefconi->setCtaperabo(trim($bndefconi['ctaperabo']));
    }
    if (isset($bndefconi['desctaperabo']))
    {
      $this->bndefconi->setDesctaperabo(trim($bndefconi['desctaperabo']));
    }
    if (!isset($bndefconi['stacta']))
    {
      $this->bndefconi->setStacta('A');
    }
  }
}
