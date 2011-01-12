<?php

/**
 * Subclase para representar una fila de la tabla 'apli_user'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ApliUser extends BaseApliUser
{
  public $cedemp='';
  public $nomuse='';
  public $diremp='';
  public $telemp='';
  public $pasuse='';
  private $nomfor = '';
  protected $nomyml = '';
  protected $administrador = '';

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    parent::hydrate($rs, $startcol);
    $c= new Criteria();
    $c->add(UsuariosPeer::LOGUSE,self::getLoguse());
    $data=UsuariosPeer::doSelectOne($c);
    if ($data)
    {
      $this->cedemp=$data->getCedemp();
      $this->nomuse=$data->getNomuse();
      $this->diremp=$data->getDiremp();
      $this->telemp=$data->getTelemp();
      $this->pasuse=$data->getPasuse();
    }
    else
    {
      $this->cedemp='';
      $this->nomuse='';
      $this->diremp='';
      $this->telemp='';
      $this->pasuse='';
    }

    $c= new Criteria();
    $c->add(AplicacionPeer::CODAPL,self::getCodapl());
    $data=AplicacionPeer::doSelectOne($c);
    if ($data)
    {
    	//print $data->getNomyml().'fff';
      $this->nomyml=$data->getNomyml();
    }
    else
    {
      $this->nomyml='';
    }


   }

  public function setNomfor($val)
  {
	$this->nomfor = $val;
  }

  public function getNomfor()
  {
	return $this->nomfor;
  }
}
