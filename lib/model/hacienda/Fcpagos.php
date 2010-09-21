<?php

/**
 * Subclass for representing a row from the 'fcpagos'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcpagos.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcpagos extends BaseFcpagos
{

	public $nomcon='';
	public $dircon='';
	public $naccon='';
	public $tipcon='';
	public $criterio='';
	protected $feccor = '';
	public $grid_detalles=array();
	public $grid_formpag=array();
	public $grid_recargdescto=array();
	protected $montopag=0;
	protected $monpag=0;
	protected $saldo=0;
	protected $totalmon=0;
	protected $montopagcon=0;
	protected $pagcon=0;

	protected $montodeuda='0,00';
	protected $montomora='0,00';
	protected $montodscprntopago='0,00';
	protected $saldo1='0,00';
	protected $montodeuda2='0,00';
	protected $montoautliq='0,00';
	protected $saldo2='0,00';
	protected $saldo3='0,00';
	protected $saldo4='0,00';
	protected $recargo='0,00';


	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

		$this->dircon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self :: getRifcon());
		$this->naccon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self :: getRifcon());
		$this->nomcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self :: getRifcon());
		$this->tipcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self :: getRifcon());
		//$this->fuenteing = Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', self :: getFueing());
	}

  public function getNomcon()
  {
      if ($this->datosContribuyenteRepresentante("C"))
      {
	    return $this->nomcon;
	  }
  }

	public function getDircon()
	  {
	    if ($this->datosContribuyenteRepresentante("C"))
		  {
		    return $this->dircon;
		  }
	  }

	public function getNaccon()
	  {
	    if ($this->datosContribuyenteRepresentante("C"))
		  {
		    return $this->naccon;
		  }
	  }

	public function getTipcon()
	  {
		if ($this->datosContribuyenteRepresentante("C"))
		  {
		    return $this->tipcon;
		  }
      }


	public function datosContribuyenteRepresentante($tipo)
	  {
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::REPCON,$tipo);
	  	  $c->add(FcconrepPeer::RIFCON,self::getRifcon());
	  	  $this->contribuyente = FcconrepPeer::doSelect($c);
	  	  if ($this->contribuyente)
		  	{
		  		$this->nomcon = $this->contribuyente[0]->getNomcon();
		  		$this->dircon = $this->contribuyente[0]->getDircon();
		  		$this->naccon = $this->contribuyente[0]->getNaccon();
		  	    $this->tipcon = $this->contribuyente[0]->getTipcon();
		  	    return true;
		  	}
		  	else
		  	{
		  		$this->nomcon = 'No encontrado';
		  		$this->dircon = 'No encontrado';
		  		$this->naccon = 'No encontrado';
		  	    $this->tipcon = 'No encontrado';
		  	    return false;
		  	}
	  }



  /*public function getFeccor($format = 'd/m/Y')
  {
  	return self::getFecpag();

	    //return parent::getFecpag($format);
  }*/


}
