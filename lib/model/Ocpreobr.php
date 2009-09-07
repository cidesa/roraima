<?php

/**
 * Subclass for representing a row from the 'ocpreobr'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ocpreobr extends BaseOcpreobr
{
	protected $montot1='0,00';
	protected $montot2='0,00';
	protected $montot='0,00';
	protected $caneje=0.0;
	protected $poreje=0.0;
	protected $porrep=0.0;
	protected $canadi=0.0;
	protected $candif=0.0;
	protected $subtot=0.0;
	protected $cant='0,00';
	protected $precio='0,00';
	protected $canval;

	public function setMontot($val)
  {
	$this->montot = $val;
  }

  public function getMontot1()
  {
	 $totdet= self::getCanobr() * self::getCosuni();
    return number_format($totdet,2,',','.');
  }

  public function getDespar()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
  }

   public function getCoduni()
  {
   $valor=Herramientas::getX('CODPAR','Ocdefpar','coduni',self::getCodpar());
   $abruni=Herramientas::getX('CODUNI','Ocunidad','abruni',$valor);
    return $abruni;
  }

    public function getCant()
  {
      $cantotcon= self::getCanobr() - self::getCancon();
    return number_format($cantotcon,2,',','.');
  }

  public function setCant($val){

    $this->cant= $val;
  }

   public function getMontot2()
  {
	 $totdet= self::getCant() * self::getCosuni();
    return number_format($totdet,2,',','.');
  }
}
