<?php

/**
 * licreglic actions.
 *
 * @package    siga
 * @subpackage licreglic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class licreglicActions extends autolicreglicActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->lireglic->getId())
    {$this->configGrid($this->getRequestParameter('lireglic[codlic]'));}
    else { $this->configGrid($this->lireglic->getCodlic());}


  }

 public function configGrid($codigolic='')
  {
    $c = new Criteria();
  	$c->add(LilichisPeer::CODLIC,$codigolic);
  	$lichist = LilichisPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licreglic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_historial');

    $this->columnas[1][4]->setCombo(Constantes::ListaMeses());

    $this->obj = $this->columnas[0]->getConfig($lichist);

    $this->lireglic->setObjhistorial($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    switch ($ajax){
     case '1':
         $num = 'lireglic_numsol';
         $des = 'lireglic_dessol';
         $id = 'lireglic_liregsol_id';
         $coduni = 'lireglic_coduniste';
         $desuni = 'lireglic_desuniste';
         $c = new Criteria();
         $c->add(LiregsolPeer::NUMSOL,$codigo);

          $solici = LiregsolPeer::doSelectOne($c);

          if($solici){
        	$lidatste = $solici->getLidatste();
		    if($lidatste)
		    {
		      $coduniste = $lidatste->getCoduniste();
		      $desuniste = $lidatste->getDesuniste();
		    }
            $output = '[["'.$num.'","'.$solici->getNumsol().'",""],["'.$id.'","'.$solici->getId().'",""],["'.$des.'","'.$solici->getDessol().'",""],["'.$coduni.'","'.$coduniste.'",""],["'.$desuni.'","'.$desuniste.'",""]]';
          }else{
            $output = '[["'.$num.'","'.H::REGVACIO.'",""],["'.$id.'","",""],["'.$des.'","",""],["'.$coduni.'","",""],["'.$desuni.'","",""]]';
          }
        break;
      case '2':
         $dato=Herramientas::getX('codfin','Fortipfin','nomext',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      case '3':
         $dato=Herramientas::getX('codclacomp','Occlacomp','desclacomp',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
  }

  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->lireglic= $this->getLireglicOrCreate();
      $this->updateLireglicFromRequest();
      $this->configGrid($this->lireglic->getCodlic());
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

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
      $this->lireglic= $this->getLireglicOrCreate();
      $this->updateLireglicFromRequest();
      $this->configGrid($this->lireglic->getCodlic());
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($lireglic)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    Licitacion::salvarLicitacion($lireglic,$grid);
    return -1;
  }

  public function deleting($lireglic)
  {
  	$c= new Criteria();
  	$c->add(OclichisPeer::CODLIC,$lireglic->getCodlic());
  	OclichisPeer::doDelete($c);

  	$lireglic->delete();

    return -1;
  }
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->lireglic = $this->getLireglicOrCreate();
    $this->updateLireglicFromRequest();
      $this->configGrid($this->lireglic->getCodlic());
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
        $this->updateError();
      }
    }
    return sfView::SUCCESS;
  }

}
