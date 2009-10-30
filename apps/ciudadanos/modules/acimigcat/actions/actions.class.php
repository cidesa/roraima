<?php

/**
 * acimigcat actions.
 *
 * @package    siga
 * @subpackage acimigcat
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class acimigcatActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->msj = '';
  }

  public function executeMigrar()
  {
      $c = new Criteria();

      $c->addJoin(AtunidadesPeer::CODUNI, NpcatprePeer::CODCAT, Criteria::RIGHT_JOIN);
      $c->add(AtunidadesPeer::CODUNI,null,Criteria::ISNULL);

      $npcatpre = NpcatprePeer::doSelect($c);

      foreach($npcatpre as $catpre){
          $atunidad = new Atunidades();
          $atunidad->setCoduni($catpre->getCodcat());
          $atunidad->setDesuni($catpre->getNomcat());
          $atunidad->save();

      }

      $this->msj = count($npcatpre).' categorías migradas.';

  }

}



