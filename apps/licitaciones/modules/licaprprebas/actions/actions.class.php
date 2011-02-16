<?php

/**
 * licaprprebas actions.
 *
 * @package    Roraima
 * @subpackage licaprprebas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 38596 2010-06-03 20:56:38Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class licaprprebasActions extends autolicaprprebasActions
{
  public function executeIndex()
  {
    return $this->forward('licaprprebas', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {

	$this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;
    $this->nometiact="";
	$this->aprobpresu="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('licitaciones',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['licitaciones']))
	     if(array_key_exists('licaprprebas',$varemp['aplicacion']['licitaciones']['modulos'])){
	       if(array_key_exists('nometiact',$varemp['aplicacion']['licitaciones']['modulos']['licaprprebas']))
	       {
	       	$this->nometiact=$varemp['aplicacion']['licitaciones']['modulos']['licaprprebas']['nometiact'];
	       }
		   if(array_key_exists('aprobpresu',$varemp['aplicacion']['licitaciones']['modulos']['licaprprebas']))
	       {
	       	$this->aprobpresu=$varemp['aplicacion']['licitaciones']['modulos']['licaprprebas']['aprobpresu'];
	       }
	     }

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
    $aprob=H::getX('CODEMP','Cadefart','Solreqapr','001');	
    	$c = new Criteria();
		if ($this->aprobpresu=='S' && $aprob=='S'){
	    	$c->add(LiprebasPeer::STAREQ,'A');
	        $sql = "(liprebas.APRREQ<>'S' or liprebas.APRREQ isnull) and liprebas.reqart not in (select refprc from cpprecom)";
	        $c->add(LiprebasPeer::APRREQ, $sql, Criteria :: CUSTOM);
		}
		else if ($this->aprobpresu=='S'){
	        $sql = "liprebas.STAREQ='A' and liprebas.reqart not in (select refprc from cpprecom)";
	        $c->add(LiprebasPeer::STAREQ, $sql, Criteria :: CUSTOM);
		}else {
	    	$c->add(LiprebasPeer::STAREQ,'A');
	        $sql = "(liprebas.APRREQ<>'S' or liprebas.APRREQ isnull)";
	        $c->add(LiprebasPeer::APRREQ, $sql, Criteria :: CUSTOM);
		}
    	$c->addAscendingOrderByColumn(LiprebasPeer::REQART);
    	$c->addAscendingOrderByColumn(LiprebasPeer::FECREQ);
    	$reg = LiprebasPeer::doSelect($c);

       $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licaprprebas/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_liprebas');

	    if ($this->nometiact!="") $this->columnas[1][0]->setTitulo('Aprobación Presidencia');
            $this->columnas[1][1]->setHTML('type="text" size="10" readOnly=true ');

	    $this->obj =$this->columnas[0]->getConfig($reg);

        $this->liprebas->setObj($this->obj);
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
    $this->coderr =-1;
	$this->sol="";
	$this->art="";
	$this->codp="";
	$this->rec="";

    if($this->getRequest()->getMethod() == sfRequest::POST){
	      $this->liprebas = $this->getLiprebasOrCreate();
	      try{ $this->updateLiprebasFromRequest();}
	      catch (Exception $ex){}
		  $this->configGrid();
		  
	  if ($this->aprobpresu=='S')
	  {
            $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
            $x=$grid[0];
            $i=0;
            $l=0;
            $acum=0;
            while ($l<count($x))
            {
              if ($x[$l]->getCheck()=='1')
              {
               $acum=$acum +1;
              }
              $l++;
            }
            if ($acum==1){
                
          }else {
            $this->coderr=147;
          }
          }
	      
	  
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->liprebas->getObj());
    $login=$this->getUser()->getAttribute('loguse');
    $coderr = PresupuestoBase::salvarAlmaprsolegr($clasemodelo,$grid,$login,$this->aprobpresu);

    return $coderr;
  }

  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->liprebas = $this->getLiprebasOrCreate();
    $this->updateLiprebasFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
		if ($this->coderr==152)
        $this->getRequest()->setError('',$err. ' Solicitud N°: '.$this->sol.' Articulo: '.$this->art.' Códido Presup: '.$this->codp);
        elseif ($this->coderr==142)
           $this->getRequest()->setError('',$err);
        else $this->getRequest()->setError('',$err.' '.$this->rec);
      }
    }
    return sfView::SUCCESS;
  }


}
