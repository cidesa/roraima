<?php

/**
 * tesrevmovlib actions.
 *
 * @package    siga
 * @subpackage tesrevmovlib
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesrevmovlibActions extends autotesrevmovlibActions
{
  public function executeIndex()
  {
    return $this->forward('tesrevmovlib', 'edit');
  }

  public function editing()
  {
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
          $r= new Criteria();
          $r->add(TsdefbanPeer::NUMCUE,$codigo);
          $reg= TsdefbanPeer::doSelectOne($r);
          if ($reg)
              {
                $dato=$reg->getNomcue();
              }else {
                  $js="alert('El Numero de Cuenta Bancaria no Existe'); $('tsmovlib_numcue').value=''; $('tsmovlib_numcue').focus();";
              }
        $output = '[["tsmovlib_nomcue","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
          $r= new Criteria();
          $r->add(TstipmovPeer::CODTIP,$codigo);
          $reg= TstipmovPeer::doSelectOne($r);
          if ($reg)
              {
                $dato=$reg->getDestip();
              }else {
                  $js="alert('El Tipo de Movimiento no Existe'); $('tsmovlib_codtip').value=''; $('tsmovlib_codtip').focus();";
              }
        $output = '[["tsmovlib_destip","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function saving($clasemodelo)
  {
    $error=Tesoreria::reversarMovSegLib($clasemodelo);   
      
    return $error;
  }

}
