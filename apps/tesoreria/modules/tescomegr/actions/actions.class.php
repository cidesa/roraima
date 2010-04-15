<?php

/**
 * tescomegr actions.
 *
 * @package    siga
 * @subpackage tescomegr
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tescomegrActions extends autotescomegrActions
{

  public function executeIndex()
  {
    return $this->forward('tescomegr', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->tscomegrmes->setMes1('01');
    $this->tscomegrmes->setMes2('02');
    $this->tscomegrmes->setMes3('03');
    $this->tscomegrmes->setMes4('04');
    $this->tscomegrmes->setMes5('05');
    $this->tscomegrmes->setMes6('06');
    $this->tscomegrmes->setMes7('07');
    $this->tscomegrmes->setMes8('08');
    $this->tscomegrmes->setMes9('09');
    $this->tscomegrmes->setMes10('10');
    $this->tscomegrmes->setMes11('11');
    $this->tscomegrmes->setMes12('12');
  }
}
