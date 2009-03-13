<?php

/**
 * Facranpaginm actions.
 *
 * @package    siga
 * @subpackage Facranpaginm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacranpaginmActions extends autoFacranpaginmActions
{
  public function executeList()
  {
    $this->processSort();
    $this->processFilters();
    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fcranpaginm/filters');
     // 15    // pager
    $this->pager = new sfPropelPager('Fcvalinm', 15);
    $c = new Criteria();
	    $c->addSelectColumn(FcvalinmPeer::CODZON);
	    $c->addSelectColumn(FcvalinmPeer::DESZON);
	    $c->addSelectColumn("0 AS CODTIP");
	    $c->addSelectColumn("0 AS VALMTR");
	    $c->addSelectColumn("0 AS VALFIS");
	    $c->addSelectColumn("0 AS ALITIP");
	    $c->addSelectColumn("0 AS ANUAL");
	    $c->addSelectColumn("0 AS ALITIPT");
	    $c->addSelectColumn("0 AS ANUALT");
	    $c->addSelectColumn("0 AS ANOVIG");
	    $c->addSelectColumn("0 AS PORVALFIS");
	    $c->addSelectColumn("0 AS ID");
	    $c->addGroupByColumn(FcvalinmPeer::CODZON);
	    $c->addGroupByColumn(FcvalinmPeer::DESZON);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeDelete()
  {
   	$id=Herramientas::getX_vacio('codzon','Fcvalinm','id',trim($this->getRequestParameter('codzon')));
    $this->fcvalinm = FcvalinmPeer::retrieveByPk($id);
    $this->forward404Unless($this->fcvalinm);

    try
    {
      $this->deleteFcvalinm($this->fcvalinm);
      $id= $this->fcvalinm->getId();
      $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
    	exit($e);
      $this->getRequest()->setError('delete', 'No se puede eliminar porque tiene registros asociados.');
      return $this->forward('facranpaginm', 'list');
    }
   }

  protected function getFcvalinmOrCreate($id = 'id', $codzon = 'codzon')
  {
    if (!$this->getRequestParameter($codzon))
    {
      $fcvalinm = new Fcvalinm();
    }
    else
	    {
	    	$fcvalinm_valor = $this->getRequestParameter('fcvalinm');
	    	if ($this->getRequestParameter($codzon)=="")
	    	    $cod_zona=$fcvalinm_valor['codzon'];
	    	else
	    	    $cod_zona=$this->getRequestParameter($codzon);
	    	$id=Herramientas::getX_vacio('codzon','Fcvalinm','id',trim($cod_zona));
            $fcvalinm = FcvalinmPeer::retrieveByPk($id);
	        $this->forward404Unless($fcvalinm);
	    }
	    return $fcvalinm;
  }


  // Para incluir funcionalidades al executeEdit()
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->configGrid();
  }

 public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcvalinmPeer::CODZON,$this->fcvalinm->getCodzon());
    $c->addDescendingOrderByColumn(FcvalinmPeer::DESZON);
    $per = FcvalinmPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facranpaginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcvalinm->setGrid($this->grid);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');
    $numper="";
    $denumper="";
    $numvic="";
    $nivinm="";
    $nomext1="";
    $nomabr1="";
    $tamano1="1";
    $nomext2="";
    $nomabr2="";
    $tamano2="1";
    $nomext3="";
    $nomabr3="";
    $tamano3="1";
    $nomext4="";
    $nomabr4="";
    $tamano4="1";
    $nomext5="";
    $nomabr5="";
    $tamano5="1";
    $nomext6="";
    $nomabr6="";
    $tamano6="1";
    $nomext7="";
    $nomabr7="";
    $tamano7="1";
    $nomext8="";
    $nomabr8="";
    $tamano8="1";
    $nomext9="";
    $nomabr9="";
    $tamano9="1";
    $nomext10="";
    $nomabr10="";
    $tamano10="1";

	$parr = substr($codigo,0,4);
	$mun = substr($codigo,5,4);
	$est = substr($codigo,10,4);
	$pais = substr($codigo,15,4);

    switch ($ajax){
      case '1':
        $result=array();
        $sql = "Select " .
        		"numper,denumper,numniv,nivinm," .
        		"nomext1,nomabr1,tamano1," .
        		"nomext2,nomabr2,tamano2," .
        		"nomext3,nomabr3,tamano3," .
        		"nomext4,nomabr4,tamano4," .
        		"nomext5,nomabr5,tamano5," .
        		"nomext6,nomabr6,tamano6," .
        		"nomext7,nomabr7,tamano7," .
        		"nomext8,nomabr8,tamano8," .
        		"nomext9,nomabr9,tamano9," .
        		"nomext10,nomabr10,tamano10 " .
        		"from FCDEFNCA where ( CodPar='".$parr."' AND CodMun='".$mun."' AND CodEdo='".$est."'  AND CodPai='".$pais."')";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $numper=$result[0]['numper'];
          $denumper=$result[0]['denumper'];
        }
        $output = '[["fcdefnca_nomext1","'.$nomext1.'",""],' .
        		  '["fcdefnca_nivinm","'.$nivinm.'",""]]';
        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($fcvalinm)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Fcranpaginm($fcvalinm, $grid);
    return -1;
  }

  public function deleting($fcvalinm)
  {
         $c= new Criteria();
         $c->add(FcvalinmPeer::CODZON,$fcvalinm->getCodzon());
         FcvalinmPeer::doDelete($c);
  }


  public function executeEdit()
  {
    $this->params=array();
    $this->fcvalinm = $this->getFcvalinmOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcvalinmFromRequest();

      if($this->saveFcvalinm($this->fcvalinm) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id_buscado=Herramientas::getX_vacio('codzon','Fcvalinm','id',trim($this->fcvalinm->getCodzon()));
		 $id= $this->fcvalinm->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('facranpaginm/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('facranpaginm/list');
        }
        else
        {
            return $this->redirect('facranpaginm/edit?id='.$id_buscado.'&codzon='.$this->fcvalinm->getCodzon());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


}
