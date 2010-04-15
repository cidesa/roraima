<?php

/**
 * fordefcatpre actions.
 *
 * @package    Roraima
 * @subpackage fordefcatpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefcatpreActions extends autofordefcatpreActions
{
  public function getMostrarUnidad()
	{
		$c = new Criteria;
		$this->campo = str_pad($this->fordefcatpre->getCoduni(),3,' ');
		$c->add(FordefuniejePeer::CODUNI, $this->campo);
		$this->uni = FordefuniejePeer::doSelect($c);
		if ($this->uni)
		return $this->uni[0]->getNomuni();
		else
		return ' ';
	}

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->fordefcatpre = $this->getFordefcatpreOrCreate();
		$this->unidad = $this->getMostrarUnidad();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFordefcatpreFromRequest();

			$this->saveFordefcatpre($this->fordefcatpre);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('fordefcatpre/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('fordefcatpre/list');
			}
			else
			{
				return $this->redirect('fordefcatpre/edit?id='.$this->fordefcatpre->getId());
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
  protected function updateFordefcatpreFromRequest()
	{
		$fordefcatpre = $this->getRequestParameter('fordefcatpre');

		if (isset($fordefcatpre['codcat']))
		{
			$this->fordefcatpre->setCodcat($fordefcatpre['codcat']);
		}
		if (isset($fordefcatpre['nomcat']))
		{
			$this->fordefcatpre->setNomcat($fordefcatpre['nomcat']);
		}
		if (isset($fordefcatpre['descat']))
		{
			$this->fordefcatpre->setDescat($fordefcatpre['descat']);
		}
		if (isset($fordefcatpre['objesp']))
		{
			$this->fordefcatpre->setObjesp($fordefcatpre['objesp']);
		}
		if (isset($fordefcatpre['mision']))
		{
			$this->fordefcatpre->setMision($fordefcatpre['mision']);
		}
		if (isset($fordefcatpre['vision']))
		{
			$this->fordefcatpre->setVision($fordefcatpre['vision']);
    }
    if (isset($fordefcatpre['coduni']))
    {
      $this->fordefcatpre->setCoduni($fordefcatpre['coduni']);
    }
  }
}
