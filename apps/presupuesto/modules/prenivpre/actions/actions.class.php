<?php

/**
 * prenivpre actions.
 *
 * @package    Roraima
 * @subpackage prenivpre
 * @author     $Author:glagea $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 33667 2009-10-01 16:44:01Z glagea $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class prenivpreActions extends autoprenivpreActions
{
	public function executeIndex() {
		$c= new Criteria();
    	$c->add(CpdefnivPeer::CODEMP,'001');
    	$dato=CpdefnivPeer::doSelectOne($c);
    	if ($dato) {
      		$id=$dato->getId();
      		return $this->redirect('prenivpre/edit?id='.$id);
    	}
    	else {
      		$id="";
      		return $this->redirect('prenivpre/edit');
    	}
	}


	public function editing() {
		$this->configGrid();
		$this->configGridPer();
	}


	public function configGrid($reg = array(),$regelim = array()) {
		$this->params = array();

		$signo="-";

    	if ($this->cpdefniv->getId()!='') {
  	  		$c = new Criteria();
      		$c->addAscendingOrderByColumn(CpnivelesPeer::CONSEC);
      		$reg = CpnivelesPeer::doSelect($c);
  		} else { }

    	$this->obj = H::getConfigGrid($this->cpdefniv->getId()=='' ? 'grid_cpniveles_create' : 'grid_cpniveles_edit');
		$this->obj[1][0]->setCombo(Constantes::ListaCatpar());
		$this->obj[1][2]->setHTML('maxlength=$(obtenerColumna(this.id,1,'.chr(39).$signo.chr(39).')).value');
		$this->obj = $this->obj[0]->getConfig($reg);

	    $this->params['grid'] = $this->obj;
  	}


  	public function configGridPer($genera='', $arreglo=array()) {
  		if ($genera=='') {
      		$reg = CpperejePeer::doSelect(new Criteria());
      		//H::PrintR($reg);exit;
  		}else{
  			//echo 'jesus';
    		$reg = $arreglo;
  		}

		$this->obj = H::getConfigGrid('gridper');
    	$this->grid2 = $this->obj[0]->getConfig($reg);
    	$this->cpdefniv->setGridper($this->grid2);
  	}


  	public function executeAjax() {
		$this->cpdefniv = $this->getCpdefnivOrCreate();
    	$codigo = $this->getRequestParameter('codigo','');
    	$ajax = $this->getRequestParameter('ajax','');

    	switch ($ajax) {
    		case '1':
				$fecini=$this->getRequestParameter('fecini','');
        		$feccie=$this->getRequestParameter('feccie','');
        		$numper=$this->getRequestParameter('numper','');
        		$id='';
          		$i=1;

  				$this->incmes=12/$numper;
  				$this->contador=1;
  				$per=new Cppereje();
  				$this->per1=array();
    			$j=0;

  				while ($i<=$numper){
       				$datos=Ingresos::generarperiodos($fecini,$this->incmes,$feccie,$numper,$this->contador);
     				$this->per1[$j]["pereje"]=$datos[0];
     				$this->per1[$j]["fecdes2"]=$datos[1];
     				$this->per1[$j]["fechas2"]=$datos[2];
     				$this->per1[$j]["id"]='9';
     				$this->contador=$this->contador+1;
     				$fec=substr($datos[2],6,4)."-".substr($datos[2],3,2)."-".substr($datos[2],0,2);
     				$fech=H::dateAdd('d',1,$fec,'+');
     				$fecini=substr($fech,8,2)."/".substr($fech,5,2)."/".substr($fech,0,4);

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


	public function validateEdit() {
		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->cpdefniv = $this->getCpdefnivOrCreate();
			$this->configGrid();
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  		$this->coderr = Presupuesto::validarPrenivpre($this->cpdefniv,$grid);
	  		if($this->coderr!=-1) {
	    		return false;
	  		} else return true;
	  	} else return true;
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
    $this->configGrid($grid[0],$grid[1]);

	$this->configGridPer();
	$grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->params['grid']);
  	$grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2);
  	//H::PrintR($this->grid2);
    return Presupuesto::salvarPrenivpre($clasemodelo,$grid,$grid2);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
