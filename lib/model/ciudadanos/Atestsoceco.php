<?php

/**
 * Subclase para representar una fila de la tabla 'atestsoceco'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Atestsoceco extends BaseAtestsoceco
{
  protected $expediente = 0;
  protected $nroexp = 0;

  protected $cedben = '';
  protected $nomben = '';

  protected $cedsol = '';
  protected $nomsol = '';

  protected $nomsolben = '';

  public function __toString()
  {
    
    $atayudas = $this->getAtayudas();
    if($atayudas) return $atayudas->getNroexp();
    else return '';

  }

  protected function afterHydrate()
  {
    $atayudas = $this->getAtayudas();
    if($atayudas){

      $atsolici = $atayudas->getAtciudadanoRelatedByAtsolici();
      $atbenefi = $atayudas->getAtciudadanoRelatedByAtbenefi();

    }

    if($atayudas){
      $this->expediente = $atayudas->getNroexp();
      $this->nroexp = $atayudas->getNroexp();
    }
    else $this->expediente = 0;

    if($atsolici) $this->nomsol = $atsolici->getNomsol();
    if($atsolici) $this->cedsol = $atsolici->getCedsol();

    if($atbenefi) $this->nomben = $atbenefi->getNomben();
    if($atbenefi) $this->cedben = $atbenefi->getCedben();

  }

  public function getNomsolben()
  {
    if($this->nomsol!='') return $this->nomsol.'  |  '.$this->nomben;
    else return '';
  }
}


