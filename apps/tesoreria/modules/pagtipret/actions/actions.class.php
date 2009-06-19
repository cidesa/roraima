<?php

/**
 * pagtipret actions.
 *
 * @package    siga
 * @subpackage pagtipret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagtipretActions extends autopagtipretActions
{
  public function executeEdit()
  {
    $this->optipret = $this->getOptipretOrCreate();
    $this->setVars();
    if (!$this->optipret->getId())
    {
        $unitri=$this->MostrarUnidadesTributarias();
		$this->optipret->setUnitri($unitri);
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOptipretFromRequest();

      $this->saveOptipret($this->optipret);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagtipret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagtipret/list');
      }
      else
      {
        return $this->redirect('pagtipret/edit?id='.$this->optipret->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


 protected function updateOptipretFromRequest()
  {
    $optipret = $this->getRequestParameter('optipret');
    $this->setVars();

    if (isset($optipret['codtip']))
    {
      $this->optipret->setCodtip($optipret['codtip']);
    }
      if (isset($optipret['destip']))
    {
      $this->optipret->setDestip($optipret['destip']);
    }
    if (isset($optipret['codcon']))
    {
      $this->optipret->setCodcon($optipret['codcon']);
    }

   if ($optipret['consustra']=='S')
   {
       $this->optipret->setPorret(0);
       if (isset($optipret['basimp1']))
	    {
	      $this->optipret->setBasimp($optipret['basimp1']);
	    }

	    if (isset($optipret['unitri']))
	    {
	      $this->optipret->setUnitri($optipret['unitri']);
	    }
	    if (isset($optipret['porsus']))
	    {
	      $this->optipret->setPorsus($optipret['porsus']);
	    }
	    if (isset($optipret['factor']))
	    {
	      $this->optipret->setFactor($optipret['factor']);
	    }
   }//if ($optipret['consustra']=='S')
   else
   {
      if (isset($optipret['porret']))
	    {
	      $this->optipret->setPorret($optipret['porret']);
	    }
      if (isset($optipret['basimp']))
	    {
	      $this->optipret->setBasimp($optipret['basimp']);
	    }
      $this->optipret->setUnitri(0);
	  $this->optipret->setPorsus(0);
	  $this->optipret->setFactor(0);
   }


    if (isset($optipret['descta']))
    {
      $this->optipret->setDescta($optipret['descta']);
    }

    if (isset($optipret['codtipsen']))
    {
      $this->optipret->setCodtipsen($optipret['codtipsen']);
    }

  }

  public function MostrarUnidadesTributarias()
  {
   	$c = new Criteria();
	$per = OpdefempPeer::doSelectOne($c);
	if ($per)
	   $unitri=$per->getUnitri(true);
	else
	   $unitri="0";

	return $unitri;
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

    public function executeDatos()
	{

	   $this->unitri=$this->getRequestParameter('unitri');
	   $this->factor=$this->getRequestParameter('factor');
	   $this->porsus=$this->getRequestParameter('porsus');
	   $this->basimp=$this->getRequestParameter('basimp');
	   $this->porret=$this->getRequestParameter('porret');
       $this->basimp=$this->getRequestParameter('basimp');
       $this->basimp1=$this->getRequestParameter('basimp1');

	   if ($this->getRequestParameter('ajax')=='S')
	   {
		   $this->mansus='S';
	   }
		else
		{
		   $this->mansus='N';
		}
	}

  	public function setVars()
	{
	  $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
	  $this->loncta=strlen($this->mascaracontabilidad);
	}
}
