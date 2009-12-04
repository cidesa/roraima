<?php

/**
 * preasipar actions.
 *
 * @package    Roraima
 * @subpackage preasipar
 * @author     $Author:aperez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 33658 2009-10-01 14:25:25Z aperez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preasiparActions extends autopreasiparActions
{

   public function executeIndex(){
      return $this->redirect('preasipar/edit');
   }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  	$this->Longitudes(&$LonCat,&$LonPar);
  	$this->setVars($LonCat);
    $this->configGrid(array(),$LonCat,$LonPar);

  }

  public function Longitudes(&$LonCat,&$LonPar){

  $LonCat=0;
  $LonPar=0;
  $regs = CpnivelesPeer::doSelect(new Criteria());
  if($regs){
  	foreach ($regs as $datos){
  		if($datos->getCatpar()=='C'){
  			$LonCat+=$datos->getLonniv() + 1;
  		}else{
  			if($datos->getCatpar()=='P'){
  				$LonPar+=$datos->getLonniv() + 1;
  			}
  		}
  	}
  }
}
  public function configGrid($reg,$LonPar,$LonCat){

     $this->obj = H::getConfigGrid('grid_cpdeftit_edit',$reg);
     $params=$this->params;
     $params['grid'] = $this->obj;
     $this->params =$params;

  }

  public function executeAjax(){

    $codpre = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
	$reg=array();
    switch ($ajax){
      case '1':
        $this->cpdeftit = $this->getCpdeftitOrCreate();
        $this->updateCpdeftitFromRequest();
  		$this->Longitudes(&$LonCat,&$LonPar);
  	    $this->setVars($LonCat);
  		if (strlen($codpre)==($LonCat-1)){
			$sql= "select substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cpdeftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";
			if(H::BuscarDatos($sql,&$regs)){
				$sqlgrip="select id, substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cpdeftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";
		 		H::BuscarDatos($sqlgrip,&$reg);
			}
  		}else{
  			return H::obtenerMensajeError(1325);
    	}
	    $this->configGrid($reg,$LonCat,$LonPar);
        $output = '[["cpdeftit_codpre","'.$codpre.'",""],["","",""],["","",""]]';
        break;
        default:
        $output = '[["","",""],["","",""],["","",""]]';
       case '2':
          $nompre = H::getX('Codpre','cpdeftit','nompre',$codpre);
		  $output = '[["cpdeftit_nombre1","'.$nompre.'",""],["","",""],["","",""]]';
		  break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
  public function updateError(){
    $this->configGrid(array(),'','');
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    $this->Longitudes(&$LonCat,&$LonPar);
  	$this->setVars($LonCat);
    $this->configGrid(array(),$LonCat,$LonPar);
  }

  public function saving($cpdeftit){
	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Presupuesto::salvarPreasipar($cpdeftit,$grid);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
    public function setVars($LonCat){
    	$params = $this->params;
    	$params[0] =$LonCat;
    	$this->params =$params;

  }
}
