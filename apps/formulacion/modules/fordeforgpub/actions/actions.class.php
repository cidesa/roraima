<?php


/**
 * fordeforgpub actions.
 *
 * @package    siga
 * @subpackage fordeforgpub
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordeforgpubActions extends autofordeforgpubActions {
	protected function updateFordeforgpubFromRequest() {
		$fordeforgpub = $this->getRequestParameter('fordeforgpub');

		if (isset ($fordeforgpub['codorg'])) {
			$this->fordeforgpub->setCodorg(str_pad($fordeforgpub['codorg'], 4, "0", STR_PAD_LEFT));
		}
		if (isset ($fordeforgpub['nomorg'])) {
			$this->fordeforgpub->setNomorg($fordeforgpub['nomorg']);
		}
		if (isset ($fordeforgpub['ubiorg'])) {
			$this->fordeforgpub->setUbiorg($fordeforgpub['ubiorg']);
		}
		if (isset ($fordeforgpub['tiporg'])) {
			$this->fordeforgpub->setTiporg($fordeforgpub['tiporg']);
		}
		if (isset ($fordeforgpub['preanu'])) {
			$this->fordeforgpub->setPreanu($fordeforgpub['preanu']);
		}
		if (isset ($fordeforgpub['capsoc'])) {
			$this->fordeforgpub->setCapsoc($fordeforgpub['capsoc']);
		}
	}
	
  public function executeEdit()
  {
    $this->fordeforgpub = $this->getFordeforgpubOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordeforgpubFromRequest();

      $this->saveFordeforgpub($this->fordeforgpub);
      
      $this->fordeforgpub->setId(Herramientas::getX_vacio('codorg','fordeforgpub','id',$this->fordeforgpub->getCodorg()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordeforgpub/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordeforgpub/list');
      }
      else
      {
        return $this->redirect('fordeforgpub/edit?id='.$this->fordeforgpub->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


}