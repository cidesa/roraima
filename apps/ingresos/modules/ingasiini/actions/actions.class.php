<?php

/**
 * ingasiini actions.
 *
 * @package    siga
 * @subpackage ingasiini
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingasiiniActions extends autoingasiiniActions
{
    
   public function periodo2()    
    {
    if ($this->ciasiini->getCodpre()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT perpre, monasi FROM ciasiini where rpad(codpre,32,' ') ='".(str_pad($this->ciasiini->getCodpre(),32,' '))."' and perpre<>'00' order by perpre";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($rs->next())
             {
                $resultado[]=$rs->getRow();
             }
        //y la envio al template:
        $this->rs=$resultado;
        return $this->rs;
    }
    }
    
	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();
    // pager
    $this->pager = new sfPropelPager('Ciasiini', 20);
    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE, '01');
    $c->addJoin(CiasiiniPeer::CODPRE, CideftitPeer::CODPRE);
    //$c->setDistinct(); 
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeEdit()
  {
    $this->ciasiini = $this->getCiasiiniOrCreate();

    //////////////////////
    //GRID
    $c = new Criteria();
	$c->add(CiasiiniPeer::CODPRE,str_pad($this->ciasiini->getCodpre(),32,' '));
	$c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
	$c->addAscendingOrderByColumn(CiasiiniPeer::PERPRE);
	$per = CiasiiniPeer::doSelect($c);
	
	$filas=17;
	$eliminar=true;
	$titulos=array("Periodo","Monto");
	$anchos=array("3%","94%");
	$alignf=array("center","right");
	$alignt=array("center","right");
	$campos=array("Perpre","Mondis");
	$montos=array("2");
	$totales=array("total");
	$html=array('type="text" size="2"','type="text" size="10"');
	$js=array('','onKeypress="entermonto(event,this.id)"');
	$grabar=array("1","2");
	
	$this->obj=array('filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 'anchos'=>$anchos,
	'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'montos'=>$montos, 'totales'=>$totales,
	'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar);
	//////////////////////



    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCiasiiniFromRequest();

      $this->saveCiasiini($this->ciasiini);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('ingasiini/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('ingasiini/list');
      }
      else
      {
        return $this->redirect('ingasiini/edit?id='.$this->ciasiini->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateCiasiiniFromRequest()
    {
    $ciasiini = $this->getRequestParameter('ciasiini');

    if (isset($ciasiini['codpre']))
    {
      $this->ciasiini->setCodpre(str_pad($ciasiini['codpre'],32,' '));
    }
    if (isset($ciasiini['nompre']))
    {
      $this->ciasiini->setNompre($ciasiini['nompre']);
    }
    if (isset($ciasiini['anopre']))
    {
      $this->ciasiini->setAnopre($ciasiini['anopre']);
    }
    $this->ciasiini->setPerpre('02');
    $this->ciasiini->setMonasi(250);
    $this->ciasiini->setMonprc(0);
    $this->ciasiini->setMoncom(0);
    $this->ciasiini->setMoncau(0);
    $this->ciasiini->setMonpag(0);
    $this->ciasiini->setMontra(0);
    $this->ciasiini->setMonadi(0);
    $this->ciasiini->setMondim(0);
    $this->ciasiini->setMonaju(0);
    $this->ciasiini->setMondis(250);
    $this->ciasiini->setDifere(0);
    $this->ciasiini->setStatus('A');
     
  }
  
  protected function saveCiasiini($ciasiini)
  {
  	
  	$i=0;
  	$fil=$this->obj["filas"];
  	$col=count($this->obj["grabar"]);
  	$grabar=$this->obj["grabar"];
  	$campos=$this->obj["campos"];
  	while ($i<2)
  	{
	  	$id='x'.$i.'id';
		
	  	if ($this->getRequestParameter($id)!="") //modificacion
	  	{
	  		$tabla = 'Ciasiini';
	  		//$clase = $this->getCiasiiniOrCreate();
	  		$clase = CiasiiniPeer::retrieveByPk($this->getRequestParameter($id));
	  		$j=0;
	  		
			while ($j<$col)
			{
				$pos=$grabar[$j];
				$caja='x'.$i.$pos;
				eval('$clase->set'.$campos[$pos+1].'($this->getRequestParameter('.$caja.'));');
	  		$j++;
			}
	  	}
	  	else //nuevo
	  	{
	  		
	  		
	  	}
  	
	$clase->save();
	  	
  	$i++;
  	} 	
  	
  	
  	//////////////////
    //$ciasiini->save();

  }
    
}
