<?php

/**
 * Comprobantes: Clase estática para el manejo de los comprobantes contables
 *
 * @package    Roraima
 * @subpackage contabilidad
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Comprobante
{
  private $grabar = '';
  private $reftra = '';
  private $numcom = '';
  private $fectra = '';
  private $destra = '';
  private $ctas = "";
  private $desc = "";
  private $tipmov= "";
  private $mov= "";
  private $error= "";
  private $msgerr= "";
  private $montos= 0;

  public function setGrabar($val){
    $this->grabar = $val;
  }

  public function getGrabar()
    {
    return $this->grabar;
    }

  public function setReftra($val){
    $this->reftra = $val;
  }

  public function getReftra()
    {
    return $this->reftra;
    }

  public function setNumcom($val){
    $this->numcom = $val;
  }

  public function getNumcom()
    {
    return $this->numcom;
    }

  public function setFectra($val){
    $this->fectra = $val;
  }

  public function getFectra()
    {
    return $this->fectra;
    }

   public function setDestra($val){
    $this->destra = $val;
  }

  public function getDestra()
    {
    return $this->destra;
    }

  public function setCtas($val){
    $this->ctas = $val;
  }

  public function getCtas()
    {
    return $this->ctas;
    }

  public function setDesc($val){
    $this->desc = $val;
  }

  public function getDesc()
    {
    return $this->desc;
    }

  public function setTipmov($val){
    $this->tipmov = $val;
  }

  public function getTipmov()
    {
    return $this->tipmov;
    }

  public function setMov($val){
    $this->mov = $val;
  }

  public function getMov()
    {
    return $this->mov;
    }

  public function setMontos($val){
    $this->montos = $val;
  }

  public function getMontos()
    {
    return $this->montos;
    }

  public function setError($val){
    $this->error = $val;
  }

  public function getError()
    {
    return $this->error;
    }

  public function setMsgerr($val){
    $this->msgerr = $val;
  }

  public function getMsgerr()
    {
    return $this->msgerr;
    }

  public static function Buscar_Correlativo()
  {
    $num=0;
    $numcom='';
    $valido = false;
    $formato = '';
    $longitud='8';
		//Verificamos el formato del correlativo,
		//ya que es parametrizable
      $c = new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $per = ContabaPeer::doSelectOne($c);

      if ($per->getCorcomp()=='AAMM####'){
      	$formato = date('ym');
      	$longitud='4';

      }elseif ($per->getCorcomp()=='MMAA####'){
      	$formato = date('my');
		$longitud='4';
      }

    while(!$valido){
      $num = H::getNextvalSecuencia('contabc_numcom_seq');
      $numcom = $formato.str_pad((string)$num, $longitud, "0", STR_PAD_LEFT);

      $c = new Criteria();
      $c->add(ContabcPeer::NUMCOM,$numcom);
      $contabc = ContabcPeer::doSelectOne($c);
      if(!$contabc){
        $valido = true;
      }
    }
    return $numcom;
  }

  // Funcion para guardar los comprobantes contables
  public static function SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid, $guarda)
  {
    if($numcom=='########'){
      $numcom = Comprobante::Buscar_Correlativo();
    }
    
    Tesoreria::Salvarconfincomgen($numcom,$reftra,$feccom,$descom,$debito,$credito);
    Tesoreria::Salvar_asientosconfincomgen($numcom,$reftra,$feccom,$grid,$guarda);
    
    return $numcom;
  }
  
  public static function ActualizarReferenciaComprobante($numcom, $refasi)
  {
    $c = new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numcom);
    $contabc = ContabcPeer::doSelectOne($c);
    if($contabc){
      $contabc->setReftra($refasi);
      $contabc->save();
      $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$numcom);
      $contabc1 = Contabc1Peer::doSelect($c);
      foreach($contabc1 as $det)
      {
        $det->setRefasi($refasi);
        $det->save();
      }
      return true;
    }else return false;
  }

}

?>