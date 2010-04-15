<?php

/**
 * almtrainv actions.
 *
 * @package    Roraima
 * @subpackage almtrainv
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almtrainvActions extends autoalmtrainvActions
{

   /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
	  {
	    $this->processSort();

	    $this->processFilters();

	    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cainvfis/filters');

	    // pager
	    $this->pager = new sfPropelPager('Cainvfis', 10);
	    $c = new Criteria();

	    $c->addSelectColumn(CainvfisPeer::FECINV);
	    $c->addSelectColumn(CainvfisPeer::CODALM);
	    $c->addSelectColumn("0 AS CODART");
	    $c->addSelectColumn("0 AS EXIACT");
	    $c->addSelectColumn("0 AS EXIACT2");
	     $c->addSelectColumn("0 AS CODUBI");
	    $c->addSelectColumn("0 AS ID");

	    $c->addGroupByColumn(CainvfisPeer::FECINV);
	    $c->addGroupByColumn(CainvfisPeer::CODALM);
	    $this->addSortCriteria($c);
	    $this->addFiltersCriteria($c);
	    $this->pager->setCriteria($c);
	    $this->pager->setPage($this->getRequestParameter('page', 1));
	    $this->pager->init();

	  }

	 protected function getCainvfisOrCreate($id = 'id', $codalm = 'codalm')
	  {
	    if (!$this->getRequestParameter($id))
	    {
	        $cainvfis = new Cainvfis();
	    }
	    else
	    {
	    	$cainvfis_valor = $this->getRequestParameter('cainvfis');
	    	$dateFormat = new sfDateFormat($this->getUser()->getCulture());
			if (!empty($cainvfis_valor['fecinv']))
			{
				$id= $dateFormat->format($cainvfis_valor['fecinv'], 'i', $dateFormat->getInputPattern('d'));
	    	}else{
	    		$id=$this->getRequestParameter($id);
	    	}
	    	if ($this->getRequestParameter($codalm)=="")
	    	    $codalmacen=$cainvfis_valor['codalm'];
	    	else
	    	    $codalmacen=$this->getRequestParameter($codalm);

	      $c = new Criteria();
	  	  $c->add(CainvfisPeer::FECINV,$id);
	  	  $c->add(CainvfisPeer::CODALM,$codalmacen);
	  	  $cainvfis = CainvfisPeer::doSelectOne($c);

	      $this->forward404Unless($cainvfis);
	    }
	    return $cainvfis;
	  }

    public function executeTraspasar()
	{
       $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	   if ($this->getRequestParameter('fecinv'))
	   {
		$fecinv= $dateFormat->format($this->getRequestParameter('fecinv'), 'i', $dateFormat->getInputPattern('d'));
		Almacen::TraspasarInventario($fecinv);
		$javascript="alert('El traspaso se ha Realizado Satisfactoriamente');";
	   }
	   else
	   {
	   	$javascript="alert('Debe indicar obligatoriamente la fecha del inventario que desea traspasar');";
	   }

        $output = '[["javascript","'.$javascript.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
	}


}
