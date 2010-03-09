<?php

/**
 * Subclass for representing a row from the 'bnubica'.
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
class Bnubica extends BaseBnubica
{
  private $genera= '';
  protected $tiedatrel="";

  public function getGenera()
  {
    if (self::getStacod()=='C')
    { $var=true;}else { $var=false;}
    return $var;
  }
  public function setGenera($val)
  {
    $this->genera = $val;
  }

  public function getCodubiadm()
  {
  	return self::getCodubi();
  }

  public function getDesubiadm()
  {
  	return self::getDesubi();
  }

  public function getTiedatrel()
  {
  	  $valor="N";
  	  if(self::getId()!='')
  	  {
  	  	  $d= new Criteria();
	  	  $d->add(OpordpagPeer::CODUNI,self::getCodubi());
	  	  $resul= OpordpagPeer::doSelectOne($d);
	  	  if ($resul)
	  	  {
	  	  	$valor= 'S';
	  	  } else $valor= 'N';
  	  }

  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

}
