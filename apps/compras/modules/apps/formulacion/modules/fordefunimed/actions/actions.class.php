<?php

/**
 * fordefunimed actions.
 *
 * @package    Roraima
 * @subpackage fordefunimed
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefunimedActions extends autofordefunimedActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefunimed = $this->getFordefunimedOrCreate();
    $this->mancorrel="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefunimed',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('mancorrel',$varemp['aplicacion']['formulacion']['modulos']['fordefunimed']))
           {
            $this->mancorrel=$varemp['aplicacion']['formulacion']['modulos']['fordefunimed']['mancorrel'];
           }
         }
    if ($this->mancorrel=='S'){
          if (!$this->fordefunimed->getId()) {
           $t= new Criteria();
           $t->setLimit(1);
           $t->addDescendingOrderByColumn(FordefunimedPeer::CODUNIMED);
           $reg= FordefunimedPeer::doSelectOne($t);
           if ($reg)
           {
               $this->fordefunimed->setCodunimed(str_pad(($reg->getCodunimed()+1),3,'0',STR_PAD_LEFT));
           }else $this->fordefunimed->setCodunimed('001');
         }
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefunimedFromRequest();

      $this->saveFordefunimed($this->fordefunimed);
      
       $this->fordefunimed->setId(Herramientas::getX_vacio('codunimed','fordefunimed','id',$this->fordefunimed->getCodunimed()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefunimed/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefunimed/list');
      }
      else
      {
        return $this->redirect('fordefunimed/edit?id='.$this->fordefunimed->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  protected function getLabels()
  {
    return array(
      'fordefunimed{codunimed}' => 'Código',
      'fordefunimed{desunimed}' => 'Descripción',
      'fordefunimed{nomabrunimed}' => 'Nombre Abreviado',
    );
  }	
}
