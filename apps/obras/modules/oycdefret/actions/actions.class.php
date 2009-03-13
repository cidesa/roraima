<?php

/**
 * oycdefret actions.
 *
 * @package    siga
 * @subpackage oycdefret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefretActions extends autooycdefretActions
{
   public function executeEdit()
  {
    $this->octipret = $this->getOctipretOrCreate();
    $this->setVars();
    if (!$this->octipret->getId())
    {
        $unitri=$this->MostrarUnidadesTributarias();
		$this->octipret->setUnitri($unitri);
    }


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOctipretFromRequest();

      $this->saveOctipret($this->octipret);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdefret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdefret/list');
      }
      else
      {
        return $this->redirect('oycdefret/edit?id='.$this->octipret->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateOctipretFromRequest()
  {
    $octipret = $this->getRequestParameter('octipret');
    $this->setVars();

    if (isset($octipret['codtip']))
    {
      $this->octipret->setCodtip($octipret['codtip']);
    }
    if (isset($octipret['destip']))
    {
      $this->octipret->setDestip($octipret['destip']);
    }
    if ($octipret['consustra']=='S')
   {
       $this->octipret->setPorret(0);
       if (isset($octipret['basimp1']))
	    {
	      $this->octipret->setBasimp($octipret['basimp1']);
	    }

	    if (isset($octipret['unitri']))
	    {
	      $this->octipret->setUnitri($octipret['unitri']);
	    }
	    if (isset($octipret['porsus']))
	    {
	      $this->octipret->setPorsus($octipret['porsus']);
	    }
	    if (isset($octipret['factor']))
	    {
	      $this->octipret->setFactor($octipret['factor']);
	    }
   }//if ($octipret['consustra']=='S')
   else
   {
      if (isset($octipret['porret']))
	    {
	      $this->octipret->setPorret($octipret['porret']);
	    }
      if (isset($octipret['basimp']))
	    {
	      $this->octipret->setBasimp($octipret['basimp']);
	    }
      $this->octipret->setUnitri(0);
	  $this->octipret->setPorsus(0);
	  $this->octipret->setFactor(0);
   }
    if (isset($octipret['codcon']))
    {
      $this->octipret->setCodcon($octipret['codcon']);
    }
    if (isset($octipret['descta']))
    {
      $this->octipret->setDescta($octipret['descta']);
    }
    if (isset($octipret['stamon']))
    {
      $this->octipret->setStamon($octipret['stamon']);
    }
  }

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
			$dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["cargable","'.$dato2.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

 	public function setVars()
	{
	  $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
	  $this->loncta=strlen($this->mascaracontabilidad);
	}

  protected function deleteOctipret($octipret)
  {
  	if (Herramientas::getX_vacio('codtip','ocretcon','codtip',$octipret->getCodtip())=='')
    {
    	$octipret->delete();
    }
  }

    public function executeDatos()
	{
	   $this->unitri=$this->getRequestParameter('unitri');
	   $this->factor=$this->getRequestParameter('factor');
	   $this->porsus=$this->getRequestParameter('porsus');
	   $this->basimp=$this->getRequestParameter('basimp');
	   $this->porret=$this->getRequestParameter('porret');
       $this->basimp=$this->getRequestParameter('basimp');
       $this->basimp1=$this->getRequestParameter('basimp1');
       $this->stamon=$this->getRequestParameter('stamon');

	   if ($this->getRequestParameter('ajax')=='S')
	   {
		   $this->mansus='S';
	   }
		else
		{
		   $this->mansus='N';
		}
	}

  public function MostrarUnidadesTributarias()
  {
   	$c = new Criteria();
	$per = OcdefempPeer::doSelectOne($c);
	if ($per)
	   $unitri=$per->getUnitri(true);
	else
	   $unitri="0";

	return $unitri;
  }

}
