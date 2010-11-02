<?php

/**
 * ingnivpre actions.
 *
 * @package    Roraima
 * @subpackage ingnivpre
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 38029 2010-05-07 15:51:13Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class prenivpreingActions extends autoprenivpreingActions
{

  public function editing()
  {
    $this->configGridPer();
    $this->configGrid();
  }

  public function executeIndex()
  {
    $c= new	Criteria();
    $data=ForingdefnivPeer::doSelectOne($c);
    if ($data)
    {
      $id=$data->getId();
      return $this->redirect('prenivpreing/edit?id='.$id);
    }
    else { return $this->redirect('prenivpreing/edit');}
  }

   /**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid(){

    $c = new Criteria();
    $per = ForingnivelesPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/prenivpreing/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[1][0]->setCombo(array('' => 'Seleccione Uno', 'P' => 'Partida'));
    $this->columnas[1][0]->setHTML('onChange="validarcatpar()"');
    $this->columnas[1][1]->setHTML('onBlur="actualizarformato(this.id)"');

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->foringdefniv->setGrid($this->grid);

  }

   /**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPer($genera='', $arreglo=array()){
      if ($genera=='')
      {
          $c = new Criteria();
          $per = ForingperejePeer::doSelect($c);
      }else{
        $per = $arreglo;
      }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/prenivpreing/'.sfConfig::get('sf_app_module_config_dir_name').'/gridper');

    $this->grid2 = $this->columnas[0]->getConfig($per);
    $this->foringdefniv->setGridper($this->grid2);

  }



  /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $this->foringdefniv = $this->getForingdefnivOrCreate();
   $codigo = $this->getRequestParameter('codigo','');
   $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $fecha=$this->getRequestParameter('fecha','');
        $fecfinal=$this->getRequestParameter('fecfinal','');
        $numper=$this->getRequestParameter('numper','');
        $id='';
        $i=1;

        $this->incmes=12/$numper;
        $this->contador=1;
        $per=new Foringpereje();
        $per1=array();
        $j=0;

        while ($i<=$numper){
         $datos=Ingresos::generarperiodos($fecha,$this->incmes,$fecfinal,$numper,$this->contador);
         $per1[$j]["pereje"]=$datos[0];
         $per1[$j]["fecdes"]=$datos[1];
         $per1[$j]["fechas"]=$datos[2];
         $per1[$j]["id"]='9';
         $this->per1 = $per1;
         $this->contador=$this->contador+1;
         $fec=substr($datos[2],6,4)."-".substr($datos[2],3,2)."-".substr($datos[2],0,2);
         $fech=H::dateAdd('d',1,$fec,'+');
         $fecha=substr($fech,8,2)."/".substr($fech,5,2)."/".substr($fech,0,4);

         $i++;
         $j++;
      }
        $genera='S';
        $this->configGridPer($genera,$this->per1);
        $output = '[["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
  
  
  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
        $hay=Formulacion::movimientos();
        if ($hay==1)
        {
          $this->coderr=332;
        }


     if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $gridper = Herramientas::CargarDatosGridv2($this,$this->grid2,true);
  }

  protected function saving($foringdefniv)
  {
    $foringdefniv->setCodemp('001');
    $foringdefniv->setLoncod(strlen($foringdefniv->getForpre()));
    $foringdefniv->setRupcat(0);
    $foringdefniv->setNivdis(0);
    $foringdefniv->setPeract('01');
    $foringdefniv->setEtadef('A');
    $foringdefniv->setStaprc('N');
    $foringdefniv->save();
    
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2,true);
    Formulacion::salvarNiveles($foringdefniv, $grid);
    Formulacion::salvarPereje($foringdefniv, $grid2);
    return -1;

  }

  protected function deleting($foringdefniv)
  {
    ForingnivelesPeer::doDelete(new Criteria());
    ForingperejePeer::doDelete(new Criteria());
    $foringdefniv->delete();
    return -1;

  }




}
