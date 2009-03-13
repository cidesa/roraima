<?php

/**
 * almregrgo actions.
 *
 * @package    siga
 * @subpackage almregrgo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregrgoActions extends autoalmregrgoActions
{

  private $coderror = -1;

  public function executeEdit()
  {

    parent::executeEdit();
	    $this->carecarg = $this->getCarecargOrCreate();
	    $this->setVars();

  }


   public function setVars()
	{
	   $c = new Criteria();
      $dato= CadefartPeer::doSelectOne($c);
      if ($dato)
          $this->tipoformato=$dato->getAsiparrec();
      else
          $this->tipoformato="";
	  $this->mascarapresupuestaria = Herramientas::Obtener_FormatoPresupuesto();
	  $this->longpre=strlen($this->mascarapresupuestaria);
	  $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
	  $this->longcon=strlen($this->mascaracontabilidad);
	}

   public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CpdeftitPeer::getDestit($this->getRequestParameter('codigo'));
            //$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","","c"]]';
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	  		$dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODPRE','Cpdeftit','codpre',$this->getRequestParameter('carecarg[codpre]'));
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',$this->getRequestParameter('carecarg[descta]'));
	    }
	}

  public function saveCarecarg($Carecarg)
  {
    $coderr = -1;

    try {

      parent::saveCarecarg($Carecarg);

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

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


  public function deleteCarecarg($Carecarg)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteCarecarg($Carecarg);

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

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

       //Para que el codigo no se pueda cambiar al editar el registro:
       $this->carecarg= $this->getCarecargOrCreate();
       $carecarg = $this->getRequestParameter('carecarg');
       $valor = $carecarg['codrgo'];
       $campo='codrgo';

       $resp=Herramientas::ValidarCodigo($valor,$this->carecarg,$campo);

      if($resp!=-1)
      {
        $this->coderror = $resp;
        return false;
      }
      else return true;
    }else return true;
  }

  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    $this->carecarg= $this->getCarecargOrCreate();
    $this->updateCarecargFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

	protected function updateCarecargFromRequest()
	  {
	    $carecarg = $this->getRequestParameter('carecarg');
	    $this->setVars();

	    if (isset($carecarg['codrgo']))
	    {
	      $this->carecarg->setCodrgo($carecarg['codrgo']);
	    }
	    if (isset($carecarg['nomrgo']))
	    {
	      $this->carecarg->setNomrgo($carecarg['nomrgo']);
	    }
	    if (isset($carecarg['tiprgo']))
	    {
	      $this->carecarg->setTiprgo($carecarg['tiprgo']);
	    }
	    if (isset($carecarg['monrgo']))
	    {
	      $this->carecarg->setMonrgo($carecarg['monrgo']);
	    }
	    if (isset($carecarg['codpre']))
	    {
	      $this->carecarg->setCodpre($carecarg['codpre']);
	    }
	    if (isset($carecarg['nompre']))
	    {
	      $this->carecarg->setNompre($carecarg['nompre']);
	    }
	    if (isset($carecarg['codcta']))
	    {
	      $this->carecarg->setCodcta($carecarg['codcta']);
	    }
	    if (isset($carecarg['descta']))
	    {
	      $this->carecarg->setDescta($carecarg['descta']);
	    }
	  }

}
