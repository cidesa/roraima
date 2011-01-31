<?php

/**
 * Subclass for representing a row from the 'ocregval'.
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
class Ocregval extends BaseOcregval
{
  protected $totiva='0,00';
  protected $totsiniva='0,00';
  protected $amortant='0,00';
  protected $valpag='0,00';
  protected $montotcon='0,00';
  protected $monantic='0,00';
  protected $salantic='0,00';
  protected $tieneant='';
  protected $codtipcon="";
  protected $filaspar=0;
  protected $filasofer=0;
  protected $filasret=0;
  protected $monaumtot=0;
  protected $mondistot=0;
  protected $monexttotal=0;

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      if (self::getMoncon()!=0)
      {
    	$totcon=number_format(self::getMoncon(),2,',','.');
      }else $totcon='0,00';

      $this->montotcon= $totcon;

      if (self::getSubtot()!=0)
	  {
		$siniva=number_format(self::getSubtot(),2,',','.');
	  }else $siniva='0,00';

	  $this->totsiniva=$siniva;
   }

  public function getCodobr(){

    return Herramientas::getX('Codcon','Ocregcon','Codobr',self::getCodcon());

  }

  public function getCodtipcon(){

    return Herramientas::getX('Codcon','Ocregcon','Tipcon',self::getCodcon());

  }

  public function getCodpro(){

    return Herramientas::getX('Codcon','Ocregcon','Codpro',self::getCodcon());

  }

  public function getDesobr(){

    return Herramientas::getX('Codobr','Ocregobr','Desobr',self::getCodobr());

  }

  public function getNompro(){

    return Herramientas::getX('Codpro','Caprovee','Nompro',self::getCodpro());

  }

  public function getMoncon(){
    if (self::getCodobr())
    {
      $var=number_format(Herramientas::getX('Codobr','Ocregobr','Monobr',self::getCodobr()),2,',','.');
    }else { $var='0,00';}

    return $var;

  }

  public function getDestipval(){

    return Herramientas::getX('Codtipval','Octipval','Destipval',self::getCodtipval());

  }

 /* public function getTotsiniva()
  {
    if (self::getSubtot()!=0)
    {
    	$siniva=number_format(self::getSubtot(),2,',','.');
    }else $siniva='0,00';

    return $siniva;
  }

  public function getMontotcon()
  {
    if (self::getMoncon()!=0)
    {
    	$totcon=number_format(self::getMoncon(),2,',','.');
    }else $totcon='0,00';

    return $totcon;
  }*/
}

