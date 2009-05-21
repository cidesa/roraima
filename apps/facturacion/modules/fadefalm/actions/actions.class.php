<?php

/**
 * fadefalm actions.
 *
 * @package    siga
 * @subpackage fadefalm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fadefalmActions extends autofadefalmActions
{

    public function executeEdit()
	{
	  parent::executeEdit();

	  $this->mascaraubicacion = Herramientas::ObtenerFormato('Bndefins','forubi');
	  $this->lonmascara=Herramientas::ObtenerFormato('Bndefins','lonubi');
	}

  	public function updateCaregartFromRequest()
	{
	  parent::updateCadefubiFromRequest();


	}

    public function validateEdit()
    {
       	$resp=-1;
	  	$this->mascaraubicacion = Herramientas::ObtenerFormato('Bndefins','forubi');
	  	$this->lonmascara=Herramientas::ObtenerFormato('Bndefins','lonubi');
	    if($this->getRequest()->getMethod() == sfRequest::POST)
	    {

	   $this->cadefalm= $this->getCadefalmOrCreate();
       $objj = $this->getRequestParameter('cadefalm');
       $valor="";
       if ($objj['codalm']!="") $valor = str_pad($objj['codalm'], 6, '0', STR_PAD_LEFT);
       $campo='codalm';

       $resp=Herramientas::ValidarCodigo($valor,$this->cadefalm,$campo);
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


    public function executeAjax(){

      $cajtexmos=$this->getRequestParameter('cajtexmos','');
      $cajtexcom=$this->getRequestParameter('cajtexcom','');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	    	$dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  return sfView::HEADER_ONLY;

    }

  public function executeDelete()
  {
    $this->cadefalm = CadefalmPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cadefalm);
    $id=$this->getRequestParameter('id');

   //verificar si no tiene articulos registrados para ese almacen
    if (Almacen::Hay_articulos_almacen($this->cadefalm->getCodalm())) //no se puede eliminar, tiene hijos
     {
     	$this->setFlash('notice','El almacen no puede ser eliminado ya que tiene datos asociados');
        return $this->redirect('fadefalm/edit?id='.$id);
     }
     else
     {
	    try
	    {
	      Herramientas::EliminarRegistro('Caalmubi','Codalm',$this->cadefalm->getCodalm());
	      $this->deleteCadefalm($this->cadefalm);
	      $this->Bitacora('Elimino');
	    }
	    catch (PropelException $e)
	    {
	      $this->getRequest()->setError('delete', 'Could not delete the selected Cadefalm. Make sure it does not have any associated items.');
	      return $this->forward('fadefalm', 'list');
	    }

	    return $this->redirect('fadefalm/list');
     }//else
  }

}
