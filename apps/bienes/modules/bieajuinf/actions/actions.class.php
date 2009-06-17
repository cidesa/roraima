<?php

/**
 * bieajuinf actions.
 *
 * @package    siga
 * @subpackage bieajuinf
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class bieajuinfActions extends sfActions
{

  public function executeIndex()
  {
  }

  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo= $this->getRequestParameter('codigo');
    $ajax= $this->getRequestParameter('ajax');
    $javascript="";
    switch ($ajax){
      case '1':
        $r= new Criteria();
        $r->addAscendingOrderByColumn(BnrevactPeer::FECREV);
        $trajo=BnrevactPeer::doSelectOne($r);
        if ($trajo)
        {
          $dato=date('d/m/Y',strtotime($trajo->getFecdev()));
          $javascript="$('fechareval').show(); $('depcalculada').value='S'; $('fecha').value='$dato'; ";
        }else
        {
          $javascript="$('fechareval').show(); ";
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        break;
      case '2':
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
}
