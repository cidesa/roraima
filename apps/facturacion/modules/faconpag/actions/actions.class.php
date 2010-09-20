<?php

/**
 * faconpag actions.
 *
 * @package    siga
 * @subpackage faconpag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faconpagActions extends autofaconpagActions
{

    private static $coderror=-1;

  protected function saving($faconpag)
  {
     /*Estos campos no se para que lo agregaron y de paso requeridos, solo le coloque valores por defecto para que deje grabar*/
    $faconpag->setGeneraop('N');
    $faconpag->setAsiparrec('N');
    $faconpag->setGeneracom('N');
    $faconpag->setMercon('NO');
    $faconpag->setCtadev('11');
    $faconpag->setCtavco('11');
    $faconpag->setUnivta('NO');
    $faconpag->save();
    return -1;

  }


      }
