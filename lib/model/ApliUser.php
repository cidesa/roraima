<?php

/**
 * Subclass for representing a row from the 'apli_user' table.
 *
 *
 *
 * @package lib.model
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
