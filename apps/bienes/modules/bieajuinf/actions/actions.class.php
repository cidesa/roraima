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
          $dato=date('d/m/Y',strtotime($trajo->getFecrev()));
          $javascript="$('fechareval').show(); $('depcalculada').value='S'; $('fecha').focus();";
        }else
        {
         $dato=date('d/m/Y');
          $javascript="$('fechareval').show(); $('fecha').focus();";
        }
        $output = '[["javascript","'.$javascript.'",""],["fecha","'.$dato.'",""],["","",""]]';
        break;
      case '2':
        if ($codigo!="")
        {
          $fec1_aux = split("/", $codigo);
          if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])))
          {
            $revejecutada=true;
            $depcalculada=true;
            $fechadep=$fec1_aux[2]."-".$fec1_aux[1]."-".$fec1_aux[0];
            Bienes::iniciarAjusteActivos('1',$fechadep,&$revejecutada);
            Bienes::iniciarAjusteActivos('2',$fechadep,&$revejecutada);
            Bienes::iniciarAjusteActivos('3',$fechadep,&$revejecutada);
            if ($revejecutada)
            {
              Bienes::actualizarRevalorizacion($fechadep);
            }
            $javascript="$('fechareval').hide(); alert('Revalorización Realizada'); ";
          }
          else
          {
            $javascript="alert('La Fecha es Inválida'); $('fecha').value=''; $('fecha').focus();";
          }
        }
        else
        {
          $revejecutada=true;
          $depcalculada=true;
          $fechadep=date('Y-m-d');
          Bienes::iniciarAjusteActivos('1',$fechadep,&$revejecutada);
          Bienes::iniciarAjusteActivos('2',$fechadep,&$revejecutada);
          Bienes::iniciarAjusteActivos('3',$fechadep,&$revejecutada);
          if ($revejecutada)
          {
            Bienes::actualizarRevalorizacion($fechadep);
          }
          $javascript="$('fechareval').hide(); ";
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
}
