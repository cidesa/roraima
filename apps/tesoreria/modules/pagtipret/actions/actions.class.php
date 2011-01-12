<?php

/**
 * pagtipret actions.
 *
 * @package    Roraima
 * @subpackage pagtipret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagtipretActions extends autopagtipretActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->optipret = $this->getOptipretOrCreate();
    $this->setVars();
    if (!$this->optipret->getId())
    {
        $unitri=$this->MostrarUnidadesTributarias();
		$this->optipret->setUnitri($unitri);

       $t= new Criteria();
       $t->setLimit(1);
       $t->addDescendingOrderByColumn(OptipretPeer::CODTIP);
       $reg= OptipretPeer::doSelectOne($t);
       if ($reg)
       {
           $this->optipret->setCodtip(str_pad(($reg->getCodtip()+1),3,'0',STR_PAD_LEFT));
       }else $this->optipret->setCodtip('001');
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


 /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
            if (isset($optipret['mbasmi1']))
	    {
	      $this->optipret->setMbasmi($optipret['mbasmi1']);
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
      if (isset($optipret['mbasmi']))
        {
          $this->optipret->setMbasmi($optipret['mbasmi']);
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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
           $this->mbasmi=$this->getRequestParameter('mbasmi');
           $this->mbasmi1=$this->getRequestParameter('mbasmi1');
           $this->limbaseret=H::getConfApp('limbaseret', 'pagtipret', 'tesoreria');

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

  protected function saveOptipret($optipret)
  {
    if (!$optipret->getId()) {$optipret->save(); }
    else {
    	if ($optipret->getTiedatrel()=='S')
    	{
    		$a= new Criteria();
    		$a->add(OptipretPeer::CODTIP,$optipret->getCodtip());
    		$reg= OptipretPeer::doSelectOne($a);
    		if ($reg){
    			$reg->setCodcon($optipret->getCodcon());
    			$reg->save();
    		}
    	}else $optipret->save();
    }

  }
}
