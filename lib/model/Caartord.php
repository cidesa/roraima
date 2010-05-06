<?php

/**
 * Subclass for representing a row from the 'caartord'.
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
class Caartord extends BaseCaartord
{

 private $mondes = '';
 private $monrgo = '';
 private $cod_presupuestario = "";
 private $codpre = '';
 private $check = '';

 private $canordaju = 0.0;
 private $cosart = 0.0;
 private $monordaju = 0.0;
 private $monrecaju = 0.0;
 private $montotaju = 0.0;
 public $canrecgri=0.0;
 public $montot=0.0;
 public $canfal = 0.0;
 public $codfal = '';
 public $fecest = '';
 public $desfal = '';
 public $candev = '';
 protected $datosrecargo="";
 protected $codalm="";
 protected $codubi="";
 protected $nomubi="";
 protected $nomalm="";
 protected $codigopre="";
 protected $cancost="0,00";

  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->canrecgri= self::getCanord() - self::getCanaju() - self::getCanrec();
      $this->canfal=0.0;
      $this->montot = ($this->canrecgri * self::getPreart()) -  self::getDtoart() +  self::getRgoart();
      $calculo= self::getTotart() - self::getRgoart() + self::getDtoart();
      $this->cancost=number_format($calculo,2,',','.');
      $this->datosrecargo="";
      $c= new Criteria();
	  $c->add(CadisrgoPeer::REQART,self::getOrdcom());
	  $c->add(CadisrgoPeer::CODART,self::getCodart());
	  $c->add(CadisrgoPeer::CODCAT,self::getCodcat());
	  $result=CadisrgoPeer::doSelect($c);
	  if ($result)
	  {
        foreach ($result as $datos)
        {
           $this->datosrecargo=$this->datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $datos->getMonrgoc() .'_'. $datos->getTiprgo().'_' . $datos->getMonrgo() .'_' . $datos->getCodpar() . '!';
        }
	 }
   }

  public function getDesart()
  {
    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  /*public function setCanrecgri($val){

    $this->canrecgri = $val;
  }

  public function getCanrecgri()
    {
      $canrecgri= self::getCanord() - self::getCanrec();
      return $canrecgri;
    //return number_format($canrecgri,2,',','.');
    }

  public function getCanrec_gri()
    {
    return $this->canrecgri;
    }
  public function setMontot($val){

    $this->montot = $val;
  }

  public function getMontot()
  {
     $montot= (self::getCanrecgri() * self::getPreart()) -  self::getDtoart() +  self::getRgoart();
	 return $montot;
  }

  public function setCanfal($val){

    $this->canfal = $val;
  }

  public function getCanfal(){
    return $this->canfal;
  }


  public function setCandev($val){

    $this->candev = $val;
  }

  public function getCandev(){

    return $this->candev;
  }

  public function setCodfal($val){

    $this->codfal = $val;
  }

  public function getCodfal()
  {
    return $this->codfal;

  }

  public function setDesfal($val){

    $this->desfal = $val;

  }

  public function getDesfal(){

    return $this->desfal;

  }
 */
 public function getCanrecgrireal()
    {
      $canrecgrireal= self::getCanord() - self::getCanaju() - self::getCanrec();
      return $canrecgrireal;
    }

 /* public function setFecest($val){

    $this->fecest = $val;

  }

  public function getFecest(){

    return $this->fecest;

  }
*/

  /**
   * Función para manejar la cantidad de artículos.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Cálculo de la cantidad de artículos.
   */
  public function getCanordaju(){

    $val = self::getCanord() - self::getCanaju() - self::getCanrec();
    return $val;

  }

  /**
   * Función para manejar la cantidad de artículos.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Cantidad de artículos introducida en el Grid.
   */
  public function getCanordaju_(){

    return $this->canordaju;

  }


    /**
   * Función para manejar el costo de artículo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @param decimal $v Cantidad Ajustada
   * @return void
   */
  public function setCanordaju($v)
  {
    $this->canordaju = $v;
  }


  /**
   * Función para manejar el costo de artículo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Cálculo del Costo del artículo.
   */
  public function getCosart(){

    // CAArtOrd!PreArt - Round( (CAArtOrd!DtoArt / CantOrd) , 2)
    if (self::getCanord()<>0)
    $val = self::getPreart() - round(self::getDtoart() / (self::getCanord()),2);
    else $val = 0;
    //$val = self::getDtoart();
    //$val = self::getPreart();
    return number_format($val,2,',','.');

  }

  /**
   * Función para manejar el costo de artículo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Costo del artículo introducido en el grid.
   */
  public function getCosart_(){

    return $this->cosart;

  }


  /**
   * Función para manejar el costo de artículo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @param decimal $v Costo del ajuste
   * @return void
   */
  public function setCosart($v){

    $this->cosart = $v;

  }


  /**
   * Función para manejar el monto del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Valor calculado del Ajuste.
   */
  public function getMonaju(){

    $val = self::getCanaju() * self::getCosart();
    return $val;

  }

  /**
   * Función para manejar el monto del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Valor del Ajuste Introducido en el Grid.
   */
  public function getMondaju_(){

    return $this->monordaju;

  }

  /**
   * Función para manejar el monto del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @param decimal $v Monto del ajuste
   * @return decimal Valor del Ajuste Introducido en el Grid.
   */
  public function setMonaju($v){

    $this->monordaju = $v;

  }

  /**
   * Función para manejar el monto del recargo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Valor calculado del recargo.
   */
  public function getMonrecaju(){

    if (self::getCanord()<>0)
    $val = ((self::getCanaju() * self::getRgoart()) / self::getCanord());
    else $val = 0;
    return $val;

  }

  /**
   * Función para manejar el monto del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Valor del recargo Introducido en el Grid.
   */
  public function getMonrecaju_(){

    return $this->monrecaju;

  }

  /**
   * Función para manejar el monto del recargo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @param decimal $v Monto del recargo
   * @return decimal Valor del Ajuste Introducido en el Grid.
   */
  public function setMonrecaju($v){

    $this->monrecaju = $v;

  }

  /**
   * Función para calcular el monto del total del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Valor calculado del total del ajuste.
   */
  public function getMontotaju(){

    $val = self::getMonaju() + self::getMonrecaju();
    return $val;

  }

  /**
   * Función para manejar el monto del total del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Valor del total Introducido en el Grid.
   */
  public function getMontotaju_(){

    return $this->montotaju;

  }

  /**
   * Función para manejar el monto del total del ajuste en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @param decimal $v Monto del total del ajuste
   * @return void
   */
  public function setMontotaju($v){

    $this->montotaju = $v;

  }


  public function getCodPre()
  {
    $var = parent::getCodcat().'-'.parent::getCodpar();
    return $var;
  }


  public function getCodPre_()
  {
    return $this->codpre;
  }


    public function setCodPre($val)
    {
       $this->codpre = $val;
    }


  public function setCheck($val)
  {
    $this->check = $val;
  }

  public function getCheck()
  {
    if (self::getRgoart()!=0 && self::getId()!="")
    { $this->check=1;}
    else { $this->check;}
    return $this->check;
  }


  public function setRetiva($val)
  {
    $this->retiva = $val;
  }

  /**
   * Función para manejar el costo de artículo en el Grid.
   * Esta función es solo para trabajar con el grid del formulario almajuoc
   *
   * @return decimal Cálculo del Costo del artículo.
   */
  public function getPreciounitario(){

    // CAArtOrd!PreArt - Round( (CAArtOrd!DtoArt / CantOrd) , 2)
    if (self::getCanord()<>0)
    $val = self::getPreart() - round(self::getDtoart() / (self::getCanord()),2);
    else $val = 0;
    //$val = self::getDtoart();
    //$val = self::getPreart();
    return $val;

  }

  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,3,',','.');
    else return $this->canord;

  }

	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v,3);
        $this->modifiedColumns[] = CaartordPeer::CANORD;
      }

	}



 }
