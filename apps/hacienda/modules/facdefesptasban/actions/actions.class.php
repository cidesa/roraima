<?php

/**
 * facdefesptasban actions.
 *
 * @package    siga
 * @subpackage facdefesptasban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facdefesptasbanActions extends autofacdefesptasbanActions
{

	public function executeList()
	{
		$this->processSort();

		$this->processFilters();

		$this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fctasban/filters');

		// pager
		$this->pager = new sfPropelPager('Fctasban', 10);
		$c = new Criteria();
   		$c->setDistinct();
		$this->addSortCriteria($c);
	    $this->addFiltersCriteria($c);
	    $this->pager->setCriteria($c);
	    $this->pager->setPage($this->getRequestParameter('page', 1));
	    $this->pager->init();
  }	
	
	protected function updateFctasbanFromRequest()
	{
		$mes=array(0 => 'enero', 1 => 'febrero',2 => 'marzo', 3 => 'abril', 4 => 'mayo', 5=> 'junio', 6 => 'julio', 7 => 'agosto', 8 => 'septiembre', 9 => 'octubre', 10 => 'noviembre', 11 => 'diciembre');
		for($b=0;$b<=11;$b++)
		{
			$fctasban=new Fctasban();
			$mes_actual=$mes[$b];
			$ano = $this->getRequestParameter('fctasban');
			$arreglo = $this->getRequestParameter($mes[$b]);
			if (isset($ano['tasano']))
			{
				$fctasban->setTasano($ano['tasano']);
				$fctasban->setTaspor($ano[$mes[$b]]);
				$fctasban->setTasmes($b);				
			}		
		    $fctasban->save();
		}   
    }	
}
