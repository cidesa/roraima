<?php

/**
 * Subclase para representar una fila de la tabla 'lisolegrdir'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lisolegrdir extends BaseLisolegrdir
{
    public function getDesart()
    {
        return H::GetX('Codart','Caregart','Desart',$this->codart);
    }

    public function getDesuniste()
    {
        return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniste);
    }

    public function getDir()
  {
      return H::GetX('Coduniste','Lidatste','Dirste',$this->coduniste);
  }

  public function getPai()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codpai',$this->coduniste);
      return H::GetX('Codpai','Ocpais','Nompai',$cod);
  }

  public function getEdo()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codedo',$this->coduniste);
      return H::GetX('Codedo','Ocestado','Nomedo',$cod);
  }

  public function getMun()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codmun',$this->coduniste);
      return H::GetX('Codmun','Ocmunici','Nommun',$cod);
  }

  public function getPar()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codpar',$this->coduniste);
      return H::GetX('Codpar','Ocparroq','Nompar',$cod);
  }

  public function getSec()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codsec',$this->coduniste);
      return H::GetX('Codsec','Ocsector','Nomsec',$cod);
  }
}
