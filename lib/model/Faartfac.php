<?php

/**
 * Subclass for representing a row from the 'faartfac'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faartfac.php 33699 2009-10-01 22:15:36Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartfac extends BaseFaartfac
{
  protected $check="";
  protected $desart="";
  protected $unimed="";
  protected $exiart="0,00";
  protected $canent="0,00";
  protected $candesp="0,00";
  protected $distot="0,00";
  protected $preant="0,00";
  protected $canpreart="0,00";
  protected $codctapro="";
  protected $mondesc="0,00";
  protected $blanco1="";
  protected $blanco2="0,00";
  protected $recarg="";
  protected $desc="";
  protected $precioe="0,00";
  protected $canentregar="0,00";
  protected $canajustada="0,00";
  protected $montot="0,00";

  public $codfal = '';
  public $costo=0.0;
  public $cannodes=0.0;
  public $cannodesaux=0.0;
  public $montotdes=0.0;

  protected $codalm="";
  protected $codubi="";
  protected $nomubi="";
  protected $nomalm="";
  protected $canord="0,00";
  protected $preart="0,00";
  protected $numlot="";

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);

	   //Se suma la cantidad entregada por notas de entrega para la factura
	   $sql = "select sum(canent) as canent from faartnot where codart = '" . self::getCodart() . "' and nronot in (select nronot from fanotent where tipref='F' and codref = '" . self::getReffac() . "' and status = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$canent = $resul[0]["canent"];
		} else {
			$canent = 0;
		}

		$sql = "select sum(candph) as candph from caartdph where codart = '" . self::getCodart() . "' and dphart in (select dphart from cadphart where tipref = 'F' and reqart = '" . self::getReffac() . "' and stadph = 'A')";
		if (Herramientas :: BuscarDatos($sql, & $resul)) {
			$candes = $resul[0]["candph"];
		} else {
			$candes = 0;
		}

      $this->cannodes=self::getCantot() - ($candes + $canent);
      $this->cannodesaux=self::getCantot() - ($candes + $canent);
   }

/*  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }*/

  public function getUnimed()
  {
   return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
  }

  public function getExiart()
  {
   return Herramientas::getX('CODART','Caregart','Distot',self::getCodart());
  }

  public function getDistot()
  {
   return Herramientas::getX('CODART','Caregart','Distot',self::getCodart());
  }

  public function getBlanco1()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }

  public function getCansol()
  {
   return self::getCantot();
  }

 /* public function getPreart()
  {
   return self::getPrecio();
  }*/

  public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=self::getPrecio();
    }
    $this->canord=number_format((self::getCantot() - self::getCanaju()), 2, ',', '.');
    $this->preart=number_format(self::getPrecio(), 2, ',', '.');
    $val=self::getPrecio() * self::getCantot();
    $this->montot=number_format($val, 2, ',', '.');
  }

}