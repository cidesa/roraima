<?php

/**
 * Subclase para representar una fila de la tabla 'atayudas'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atayudas extends BaseAtayudas
{
  protected $tipayu = '';
  protected $tiprub = '';
  protected $nombre = '';
  protected $cedula = '';
  protected $estado = '';
  protected $objitems = Array();
  protected $objrecaudos = Array();
  protected $estsoceco = 0;
  protected $desest = '';

  protected $cedben = '';
  protected $nomben = '';

  protected $cedsol = '';
  protected $nomsol = '';

  protected $rifpro = '';
  protected $nompro = '';

  protected $nomtra = '';
  protected $apetra = '';

  protected $nompre = '';

  protected $ordcom = '';
  protected $desord = '';

  protected $rubros = array();

  public function __toString()
  {
    return $this->getNroexp();
  }

  public function afterHydrate(){

    $atsolici = $this->getAtciudadanoRelatedByAtsolici();
    $atbenefi = $this->getAtciudadanoRelatedByAtbenefi();
    $caordcom = $this->getCaordcomRelatedByRefdoc();

    $attrasoc = $this->getAttrasoc();
    $attipayu = $this->getAttipayu();
    $carpovee = $this->getCaprovee();
    $atestayu = $this->getAtestayu();
    $atrubros = $this->getAtrubros();
    $atmedico = $this->getAtmedico();

    if($attipayu) $this->tipayu = $attipayu->getDesayu();
    if($atrubros) $this->tiprub = $atrubros->getDesrub();
    if($atsolici) $this->nombre = $atsolici->getNombre();
    if($atsolici) $this->cedula = $atsolici->getCedula();

    if($atsolici) $this->nomsol = $atsolici->getNomsol();
    if($atsolici) $this->cedsol = $atsolici->getCedsol();

    if($atbenefi) $this->nomben = $atbenefi->getNomben();
    if($atbenefi) $this->cedben = $atbenefi->getCedben();

    if($attrasoc) $this->nomtra = $attrasoc->getNomtra();
    if($attrasoc) $this->apetra = $attrasoc->getApetra();

    if($carpovee) $this->nompro = $carpovee->getNompro();
    if($carpovee) $this->rifpro = $carpovee->getRifpro();

    if($atestayu) $this->desest = $atestayu->getDesest();

    if($atmedico) $this->cedrifmed = $atmedico->getCedrifmed();
    if($atmedico) $this->nombremed = $atmedico->getNombremed()." ".$atmedico->getApellimed();

    if($caordcom) $this->ordcom = $caordcom->getOrdcom();
    if($caordcom) $this->desord = $caordcom->getDesord();


  }

  public function getId($val = false)
  {
    if($val)
    {
      $id = parent::getId();
      if(!$id) return 'XXXXXX';
      else return self::getNroexp();
    }else return parent::getId();

  }

  public function getAnalizado()
  {
    $analizado = $this->getAnalizado();
    $arrayanalizado = AtayudasPeer::getListaAnalisis();
    if(array_key_exists($analizado,$arrayanalizado)) return $arrayanalizado[$analizado];
    return '';
  }

  public function getAnalizado_()
  {
    return $this->getAnalizado();
  }

  public function getEstado()
  {
    $arrayanalizado = AtayudasPeer::getListaEstados();
    if(array_key_exists($this->estado,$arrayanalizado)) return $arrayanalizado[$this->estado];
    return $this->estado;

  }

  public function getEstado_()
  {
    return $this->estado;
  }

  public function getNomsolben()
  {
    if($this->nomsol!='') return $this->nomsol.'  |  '.$this->nomben;
    else return '';
  }

  public function getNompre()
  {
    $c= new Criteria();
    $c->add(CpdeftitPeer::CODPRE,self::getCodpre());
    $dato=CpdeftitPeer::doSelectOne($c);
    if ($dato) return $dato->getNompre();
    else return "";
  }

  public function save($con = null)
  {
    if($this->id){
      $atayudas = AtayudasPeer::retrieveByPK($this->id);
      if($atayudas->getAtestayuId()!=$this->atestayu_id){
        $atdetest = new Atdetest();
        $atdetest->setAtayudasId($this->id);
        $atdetest->setAtestayuDesde($atayudas->getAtestayuId());
        $atdetest->setAtestayuHasta($this->atestayu_id);
        $atdetest->setUsuario(sfContext::getInstance()->getUser()->getAttribute('usuario'));
        $atdetest->save();
      }
    }

    return parent::save($con);


  }

}
