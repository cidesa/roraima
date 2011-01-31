<?php

/**
 * oycdefret actions.
 *
 * @package    Roraima
 * @subpackage oycdefret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefretActions extends autooycdefretActions
{
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
