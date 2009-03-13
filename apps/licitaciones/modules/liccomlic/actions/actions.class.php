<?php

/**
 * liccomlic actions.
 *
 * @package    siga
 * @subpackage liccomlic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class liccomlicActions extends autoliccomlicActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if ($this->licomlic->getId())
    $this->configGrid($this->licomlic->getId());
    else $this->configGrid();
  }

   public function configGrid($id='')
  {
  	$c = new Criteria();
    $c->add(LidetcomPeer::LICOMLIC_ID,$id);
    $per = LidetcomPeer::doSelect($c);
    $reg=$per;
    $obj= array('codemp' => 1, 'cedemp' => 2 ,'nomemp' => 3, 'dirhab' => 4);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liccomlic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empleados');
    $this->columnas[1][0]->setCatalogo('nphojint','sf_admin_edit_form',$obj,'Licomlic_nphojint');

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->licomlic->setObjempleados($this->obj);
  }



 public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->licomlic= $this->getLicomlicOrCreate();
      $this->updateLicomlicFromRequest();
      $this->configGrid($this->licomlic->getId());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      $encontrado=false;
      foreach($grid[0] as $item){
        if($item->getCodemp()!=""){
          $encontrado=true;
        }
      }
      if (!$encontrado) { $this->coderr = 908; return false;}

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
      $this->licomlic= $this->getLicomlicOrCreate();
      $this->updateLicomlicFromRequest();
      $this->configGrid();
      //$this->licomlic->afterHydrate();
  }

  public function saving($licomlic)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarComisionLicitacion($licomlic,$grid);
    return -1;
  }

  public function deleting($licomlic)
  {
    $c= new Criteria();
    $c->add(LidetcomPeer::LICOMLIC_ID,$licomlic->getId());
    LidetcomPeer::doDelete($c);

    $licomlic->delete();
    return -1;


  }

  public function handleErrorEdit()
  {
    $this->updateError();
    $this->params=array();

    $this->labels = $this->getLabels();
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
