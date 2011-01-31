<?php

/**
 * prenivpre actions.
 *
 * @package    Roraima
 * @subpackage prenivpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
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


	public function configGrid($reg=array()) {
    	if ($this->cpdefniv->getId()!='') {
  	  		$c = new Criteria();
      		$c->addAscendingOrderByColumn(CpnivelesPeer::CONSEC);
      		$reg = CpnivelesPeer::doSelect($c);
  		}

    	$this->obj = H::getConfigGrid(($this->cpdefniv->getId()=='' || $this->cpdefniv->getEtadef()=='A' || $this->cpdefniv->getDefcod()!='S') ? 'grid_cpniveles_create' : 'grid_cpniveles_edit');
		$this->obj[1][0]->setCombo(Constantes::ListaCatpar());
		$this->obj = $this->obj[0]->getConfig($reg);

	    $this->cpdefniv->setObjniv($this->obj);
  	}


  	public function configGridPer($arreglo=array()) {
  		if ($this->cpdefniv->getId()!='') {
      		$reg = CpperejePeer::doSelect(new Criteria());
  		}else{
    		$reg = $arreglo;
  		}

		$this->obj1 = H::getConfigGrid('gridper');
    	$this->obj1 = $this->obj1[0]->getConfig($reg);
    	$this->cpdefniv->setGridper($this->obj1);
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
        		$this->configGridPer($this->per1);
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
			$this->updateCpdefnivFromRequest();
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
	$this->configGridPer();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	$grid2 = Herramientas::CargarDatosGridv2($this,$this->obj1,true);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  	$grid2 = Herramientas::CargarDatosGridv2($this,$this->obj1,true);
    return Presupuesto::salvarPrenivpre($clasemodelo,$grid,$grid2);
  }

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');
    $columna = $this->getRequestParameter('columna','');
    $javascript="";

    if($columna=='2'){
      $i=0;
      $formato='';
	    if ($grid[$i][0]!="")
	    {
	        while ($i<count($grid)){
	            if ($grid[$i][1]!="")
	            {
	              $rup='';
		          $k=1;
		          $lon=$grid[$i][1];
		          while ($k<=$lon){
	    	        $rup=$rup.'#';
	        	   $k++;
	              }
	              if ($formato!="")
	              {
	              	$formato=$formato."-".$rup;
	              }else {
	              	$formato=$rup;
	              }
	            }
	            $i++;
	        }
	    }else{ $javascript="alert('Debe seleccionar un Tipo Categoria/Partida')";}
    }


    $output = '[["cpdefniv_forpre","'.$formato.'",""],["javascript","'.$javascript.'",""],["","",""]]'; //Herramientas::grid_to_json($grid,$name);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

}
