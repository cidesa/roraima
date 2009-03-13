<?php

class paneldecontrolActions extends sfActions
{

  public function executeIndex()
  {
    $this->redirect('sfControlPanel');
  }
}
?>