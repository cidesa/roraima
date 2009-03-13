<?php

/**
 * Subclass for representing a row from the 'npasiconnom' table.
 *
 *
 *
 * @package lib.model
 */
class Npasiconnom extends BaseNpasiconnom
{

  private $check = '';
  private $nomcon = '';
  private $checkdiaadic = '';
  protected $codpre="";
  protected $nompar="";

  public function setCheck($val)
  {
  $this->check = $val;
  }

  public function getCheck()
  {

  $sql="select b.codcon
      from npasiconnom as a, npconfon as b
      where b.codcon='".self::getCodCon()."'
      and b.codnom='".self::getCodNom()."' and b.tipcon='S'
      and a.codnom=b.codnom
      and a.codcon=b.codcon";
  if (Herramientas::BuscarDatos($sql,&$result))
  {
    return true;
  }
  else return false;

  }

 public function getCheck_gri()
  {
  return $this->check;
  }

 public function setCheckdiaadic($val)
  {
  $this->checkdiaadic = $val;
  }

  public function getCheckdiaadic()
  {

  $sql="select b.codcon
      from npasiconnom as a, npdiaadicnom as b
      where b.codcon='".self::getCodCon()."'
      and b.codnom='".self::getCodNom()."'
      and a.codnom=b.codnom
      and a.codcon=b.codcon";
  if (Herramientas::BuscarDatos($sql,&$result))
  {
    return true;
  }
  else return false;

  }
public function getCheckdiaadic_gri()
  {
  return $this->checkdiaadic;
  }

  public function getNomcon()
  {
  return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }

  public function getNomnom()
  {
  return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }


  public function getNpdefcpt()
  {
    $c= new Criteria();
    $c->add(NpdefcptPeer::CODCON, $this->getCodcon());
    $Npdefcpt = NpdefcptPeer::doSelectOne($c);
    if($Npdefcpt) return $Npdefcpt;
    else return null;

  }


}
