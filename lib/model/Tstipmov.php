<?php

/**
 * Subclass for representing a row from the 'tstipmov'.
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
class Tstipmov extends BaseTstipmov
{
  protected $tiedatrel="";

  public function __toString()
  {
    return array($this->codtip => $this->codtip);
  }

    public function getDesdebcre()
	  {
	  	if (self::getDebcre()=='C')
	  	       return 'Crédito';
	  	else if (self::getDebcre()=='D')
	  	       return 'Débito';
	    else return 'Indefinido';	       
	  }

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcon());
  }

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(TsmovlibPeer::TIPMOV,self::getCodtip());
  	  $resul= TsmovlibPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else {
  	  $d= new Criteria();
  	  $d->add(TsmovbanPeer::TIPMOV,self::getCodtip());
  	  $resul= TsmovbanPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else $valor= 'N';
  	  }

  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

}
