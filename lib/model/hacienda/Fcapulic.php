<?php

/**
 * Subclass for representing a row from the 'fcapulic'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcapulic.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcapulic extends BaseFcapulic
{
  /*protected $naccon = '';
  protected $tipcon = '';
  protected $nacrep = '';
  protected $tiprep = '';
  protected $nomrep = '';
  protected $dirrep = '';
  protected $destip = '';*/

  	protected $dircon = "";
	protected $naccon = "";
	protected $nomcon = "";
	protected $tipcon = "";

	protected $dirconrep = "";
	protected $nacconrep = "";
	protected $nomconrep = "";
	protected $tipconrep = "";

    protected $grid = "";



	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

		$this->dirconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self :: getRifrep());
		$this->nacconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self :: getRifrep());
		$this->nomconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self :: getRifrep());
		$this->tipconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self :: getRifrep());

		$this->dircon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self :: getRifcon());
		$this->nomcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self :: getRifcon());
		$this->nacconcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self :: getRifcon());
		$this->tipconcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self :: getRifcon());

		$this->destip = Herramientas :: getX_vacio('tipapu', 'Fctipapu', 'destip', self :: getTipapu());
	}

  public function afterHydrate555()
  {
    $c = new Criteria();
    $c->add(FcconrepPeer::RIFCON,$this->rifcon);
    $c->add(FcconrepPeer::REPCON,'C');
    $fcconrep = FcconrepPeer::doSelectOne($c);
    if($fcconrep){
      $this->naccon = $fcconrep->getNaccon();
      $this->tipcon = $fcconrep->getTipcon();
    }

    $c = new Criteria();
    $c->add(FcconrepPeer::RIFCON,$this->rifrep);
    $c->add(FcconrepPeer::REPCON,'R');
    $fcconrep = FcconrepPeer::doSelectOne($c);
    if($fcconrep){
      $this->nacrep = $fcconrep->getNaccon();
      $this->tiprep = $fcconrep->getTipcon();
      $this->nomrep = $fcconrep->getNomcon();
      $this->dirrep = $fcconrep->getDircon();
    }

    $c = new Criteria();
    $c->add(FctipapuPeer::TIPAPU,$this->tipapu);
    $fctipapu = FctipapuPeer::doSelectOne($c);
    if($fctipapu) $this->destip = $fctipapu->getDestip();

  }

}
