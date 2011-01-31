<?php

/**
 * Subclass for representing a row from the 'fcotring'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcotring.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcotring extends BaseFcotring
{

	private $naccon;
	private $tipcon;
	private $nomconr;
	private $dirconr;
	private $nacconr;
	private $tipconr;
	protected $grid2='';
	protected $griddistribucion='';
	protected $doctos='';
	protected $codfuente=array();


	public function getNaccon()
	  {
	    if ($this->datosContribuyente())
		  {
		    return $this->naccon;
		  }
	  }

	public function getTipcon()
	  {
		if ($this->datosContribuyente())
		  {
		    return $this->tipcon;
		  }
      }

    public function getNomconr()
	  {
        if ($this->datosRepresentante())
	      {
		    return $this->nomconr;
		  }
      }

	public function getDirconr()
	  {
	    if ($this->datosRepresentante())
		  {
		    return $this->dirconr;
		  }
	  }

	public function getNacconr()
	  {
	    if ($this->datosRepresentante())
		  {
		    return $this->nacconr;
		  }
	  }

	public function getTipconr()
	  {
		if ($this->datosRepresentante())
		  {
		    return $this->tipconr;
		  }
      }

	public function datosContribuyente()
	  {
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::REPCON,'C');
	  	  $c->addJoin(FcconrepPeer::RIFCON,FcotringPeer::RIFCON);
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

	public function datosRepresentante()
		  {
		  	  $c = new Criteria;
		  	  $c->add(FcconrepPeer::REPCON,'R');
		  	  $c->addJoin(FcconrepPeer::RIFCON,FcotringPeer::RIFREP);
		  	  $c->add(FcconrepPeer::RIFCON,self::getRifrep());
		  	  $this->representante = FcconrepPeer::doSelectone($c);
		  	  if ($this->representante)
			  	{
			  		$this->nomconr = $this->representante->getNomcon();
			  	    $this->dirconr = $this->representante->getDircon();
			  	    $this->nacconr = $this->representante->getNaccon();
			  	    $this->tipconr = $this->representante->getTipcon();
			  	    return true;
			  	}
			  	else
			  	{
			  		$this->nomconr = 'No encontrado';
			  	    $this->dirconr = 'No encontrado';
			  	    $this->nacconr = 'No encontrado';
			  	    $this->tipconr = 'No encontrado';
			  	    return false;
			  	}

		  }


  public static function ListFueIng()
  {
    $c = new Criteria();
    $c->add(FcfueprePeer::SIMPRE,'S');
    $c->addAscendingOrderByColumn(FcfueprePeer::CODFUE);
    $lista = FcfueprePeer::doSelect($c);

    $modulos = array();
    foreach($lista as $arr)
    {
      $modulos += array($arr->getCodfue() => $arr->getNomfue());
    }
    return $modulos;
  }

}
