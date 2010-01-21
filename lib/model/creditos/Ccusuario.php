<?php

/**
 * Subclass for representing a row from the 'ccusuario' table.
 *
 *
 *
 * @package lib.model
 */
class Ccusuario extends BaseCcusuario
{
 protected $repcontras="";
 protected $ccestado_id2=0;
 protected $ccmunici_id2=0;
 protected $ccparroq_id=0;
 protected $cedrif="";
 protected $nomben="";
 protected $dirnomurb="";
 protected $dircalles="";
 protected $dircasedi="";
 protected $dirnumpis="";
 protected $dirapatar="";
 protected $dirpunref="";
 protected $telben="";
 protected $faxben="";
 protected $corele="";
 protected $creant=false;
 protected $proela="";
 protected $matpri="";
 protected $dissisven="";
 protected $celben="";
 protected $ccorimatpri_id=0;
 protected $empacthom=0;
 protected $empactmuj=0;
 protected $aregeo="";
 protected $empdirgen=0;
 protected $empindgen=0;
 protected $ccacteco_id="";
 protected $dirnomurb2="";
 protected $dircalles2="";
 protected $dircasedi2="";
 protected $dirnumpis2="";
 protected $dirapatar2="";
 protected $dirpunref2="";
 protected $numtel="";
 protected $numfax="";
 protected $mail="";
 protected $numcel="";
 protected $cctipups_id=0;
 protected $ccestciv_id=0;
 //protected $ccperpre_id=0;
 protected $ccestado_id3=0;
 protected $ccmunici_id3=0;
 protected $ccparroq_id3=0;
 protected $dircor=false;
 protected $ccpregunid=0;
 protected $respue="";
 protected $codaretel="";
 protected $codarecel="";
 protected $codarefax="";
 protected $codaretel2="";
 protected $codarecel2="";
 protected $codarefax2="";
 protected $sexrep="";


 protected $fecnac = "";
 protected $edad = "";
 protected $ocupa = "";
 protected $profe = "";
 protected $ccubiadm_id = "";
 protected $cccargo_id = "";
 protected $cccondic_id = "";
 protected $numnom = "";
 protected $fecing = "";
 protected $exten = "";
 protected $ingmen = "";
 protected $otroing = "";
 protected $detotroing = "";

 protected $ccperprecon_id="";
 protected $nomcon = "";
 protected $fecnaccon = "";
 protected $edadcon = "";
 protected $cedcon = "";
 protected $dirnomurbcon = "";
 protected $dircallescon = "";
 protected $dircasedicon = "";
 protected $dirnumpiscon = "";
 protected $dirapatarcon = "";
 protected $dirpunrefcon = "";
 protected $telcon = "";
 protected $celcon = "";
 protected $codaretelcon = "";
 protected $codarecelcon = "";
 protected $corelecon = "";
 protected $ocupacon = "";
 protected $profecon = "";
 protected $ingmencon = "";
 protected $lugtracon = "";


 public function hydrate(ResultSet $rs, $startcol = 1)
  {
  	if (isset($_SESSION['ccbenefi_id'])){
  		$this->setCcbenefiId($_SESSION['ccbenefi_id']);
  	}
  	parent::hydrate($rs, $startcol);
  	$this->repcontras=$this->getContras();
  	$c = new Criteria();
    $c->add(CcbenefiPeer::ID,$this->getCcbenefiId());
    $per = CcbenefiPeer::doSelectOne($c);
if ($per){
    $this->ccacteco_id=$per->getCcactecoId();
    $this->ccparroq_id=$per->getCcparroqId();
    $this->cedrif=$per->getCedrif();
    $this->nomben=$per->getNomben();
    $this->sexrep=$per->getSexrep();
    $this->dirnomurb=$per->getDirnomurb();
    $this->dircalles=$per->getDircalles();
    $this->dircasedi=$per->getDircasedi();
    $this->dirnumpis=$per->getDirnumpis();
    $this->dirapatar=$per->getDirapatar();
    $this->dirpunref=$per->getDirpunref();
    $this->telben=$per->getTelben();
    $this->faxben=$per->getFaxben();
    $this->corele=$per->getCorele();
    $this->creant=$per->getCreant();
    $this->proela=$per->getProela();
    $this->matpri=$per->getMatpri();
    $this->dissisven=$per->getDissisven();
    $this->celben=$per->getCelben();
    $this->ingres=$per->getIngres();
    $this->ccorimatpri_id=$per->getCcorimatpriId();
    $this->empacthom=$per->getEmpacthom();
    $this->empactmuj=$per->getEmpactmuj();
    $this->ingres=$per->getIngres();
    $this->cctipups_id=$per->getCctipupsId();
	$this->ccperpre_id=$per->getCcperpreId();
	$this->ccestciv_id=$per->getCcestcivId();
	$this->codaretel=$per->getCodaretel();
	$this->codarecel=$per->getCodarecel();
	$this->codarefax=$per->getCodarefax();
	$this->fecnac = $per->getFecnac();
	$this->ocupa = $per->getOcupa();
	$this->profe = $per->getProfe();
	$this->ccubiadm_id = $per->getCcubiadmId();
	$this->cccargo_id = $per->getCccargoId();
	$this->cccondic_id = $per->getCccondicId();
	$this->numnom = $per->getNumnom();
	$this->fecing = $per->getFecing();
	$this->exten = $per->getExten();
	$this->ingmen = $per->getIngmen();
	$this->otroing = $per->getOtroing();
	$this->detotroing = $per->getDetotroing();

	$c = new Criteria();
	$c->add(CcperprePeer::ID,$per->getCcperpreId());
	$per2 = CcperprePeer::doSelectOne($c);
if ($per2)
	$this->setLogin($per2->getPrefijo().$this->cedrif);

    $c = new Criteria();
    $c->add(CcdircorbenPeer::CCBENEFI_ID,$this->getCcbenefiId());
    $per3 = CcdircorbenPeer::doSelectOne($c);

    if($per3){
       $this->dirnomurb2=$per3->getDirnomurb();
       $this->dircalles2=$per3->getDirnumcal();
       $this->dircasedi2=$per3->getDirnumcasedi();
       $this->dirnumpis2=$per3->getDirnumpis();
 	   $this->dirapatar2=$per3->getDirnumapt();
 	   $this->dirpunref2=$per3->getDirpunref();
 	   $this->numtel=$per3->getNumtel();
 	   $this->numfax=$per3->getNumfax();
 	   $this->mail=$per3->getMail();
 	   $this->numcel=$per3->getNumcel();
 	   $this->ccparroq_id3=$per3->getCcparroqId();
 	   $this->codaretel2=$per3->getCodaretel();
	   $this->codarecel2=$per3->getCodarecel();
	   $this->codarefax2=$per3->getCodarefax();
    }
    $c = new Criteria();
    $c->add(CcresusuPeer::CCUSUARIO_ID,$this->getId());
    $c->addJoin(CcresusuPeer::CCPREGUN_ID,CcpregunPeer::ID);
    $per4 = CcresusuPeer::doSelectOne($c);


    if($per4){
       $this->ccpregunid = $per4->getCcpregunId();
       $this->respue = $per4->getRespue();
    }

    $c = new Criteria();
    $c->add(CcconbenPeer::CCBENEFI_ID,$this->getCcbenefiId());
    $ccconben = CcconbenPeer::doSelectOne($c);

    if ($ccconben){
    	$this->ccperprecon_id = $ccconben->getCcperpreconId();
    	$this->nomcon = $ccconben->getNomcon();
    	$this->fecnaccon = $ccconben->getFecnac();
    	$this->cedcon = $ccconben->getCedcon();
    	$this->dirnomurbcon = $ccconben->getDirnomurb();
    	$this->dircallescon = $ccconben->getDircalles();
    	$this->dircasedicon = $ccconben->getDircasedi();
    	$this->dirnumpiscon = $ccconben->getDirnumpis();
    	$this->dirapatarcon = $ccconben->getDirapatar();
    	$this->dirpunrefcon = $ccconben->getDirpunref();
    	$this->telcon = $ccconben->getTelcon();
    	$this->celcon = $ccconben->getCelcon();
    	$this->codaretelcon = $ccconben->getCodaretel();
    	$this->codarecelcon = $ccconben->getCodarecel();
    	$this->corelecon = $ccconben->getCorele();
    	$this->ocupacon = $ccconben->getOcupa();
    	$this->profecon = $ccconben->getProfe();
    	$this->ingmencon = $ccconben->getIngmen();
    	$this->lugtracon = $ccconben->getLugtracon();
    }
	}
  }


   public function setCcparroqId($val){
 	$this->ccparroq_id=$val;
 }

  public function getCcparroqId(){
    return $this->ccparroq_id;

  }

 public function setCcestadoId2($val){
 	$this->ccestado_id2=$val;
 }

  public function getCcestadoId2(){
    return $this->ccestado_id2;

  }

   public function setCcmuniciId2($val){
 	$this->ccmunici_id2=$val;
 }

  public function getCcmuniciId2(){
    return $this->ccmunici_id2;

  }

   public function setCctipupsId($val){
 	$this->cctipups_id=$val;
 }

  public function getCctipupsId(){
    return $this->cctipups_id;

  }

  /*public function setCcperpreId($val){
  	$this->ccperpre_id=$val;
  }

  public function getCcperpreId(){
	return $this->ccperpre_id;
  }*/

 public function setCcparroqId3($val){
 	$this->ccparroq_id3=$val;
 }

  public function getCcparroqId3(){
    return $this->ccparroq_id3;

  }

 public function setCcestadoId3($val){
 	$this->ccestado_id3=$val;
 }

  public function getCcestadoId3(){
    return $this->ccestado_id3;

  }

   public function setCcmuniciId3($val){
 	$this->ccmunici_id3=$val;
 }

  public function getCcmuniciId3(){
    return $this->ccmunici_id3;

  }

 public function setCcestcivId($val){
 	$this->ccestciv_id=$val;
 }

  public function getCcestcivId(){
    return $this->ccestciv_id;

  }
  public function setCcpregunid($val){
 	$this->ccpregunid=$val;
 }

  public function getCcpregunid(){
    return $this->ccpregunid;

  }
 public function setRespue($val){
 	$this->respue=$val;
 }

  public function getRespue(){
    return $this->respue;

  }

  public function setCodaretel($val){
 	$this->codaretel=$val;
 }

  public function getCodaretel(){
    return $this->codarecel;

  }

  public function setCodarecel($val){
 	$this->codarecel=$val;
 }

  public function getCodarecel(){
    return $this->codarecel;

  }

  public function setCodarefax($val){
 	$this->codarefax=$val;
 }

  public function getCodarefax(){
    return $this->codarefax;

  }

  public function setCodaretel2($val){
 	$this->codaretel2=$val;
 }

  public function getCodaretel2(){
    return $this->codaretel2;

  }

  public function setCodarecel2($val){
 	$this->codarecel2=$val;
 }

  public function getCodarecel2(){
    return $this->codarecel2;

  }

  public function setCodarefax2($val){
 	$this->codarefax2=$val;
 }

  public function getCodarefax2(){
    return $this->codarefax2;

  }

  public function setFecnac($val){
 	$this->fecnac=$val;
 }

  public function getFecnac(){
    return $this->fecnac;
  }

  public function setOcupa($val){
 	$this->ocupa=$val;
 }

  public function getOcupa(){
    return $this->ocupa;
  }

  public function setProfe($val){
 	$this->profe=$val;
 }

  public function getProfe(){
    return $this->profe;
  }

  public function setUbiadm($val){
 	$this->ubiadm=$val;
 }

  public function getUbiadm(){
    return $this->ubiadm;
  }

  public function setCargo($val){
 	$this->cargo=$val;
 }

  public function getCargo(){
    return $this->cargo;
  }

  public function setFecing($val){
 	$this->fecing=$val;
 }

  public function getFecing(){
    return $this->fecing;
  }

  public function setExten($val){
 	$this->exten=$val;
 }

  public function getExten(){
    return $this->exten;
  }

  public function setIngmen($val){
 	$this->ingmen=$val;
 }

  public function getIngmen(){
    return $this->ingmen;
  }

  public function setOtroing($val){
 	$this->otroing=$val;
 }

  public function getOtroing(){
    return $this->otroing;
  }

  public function setDetotroing($val){
 	$this->detotroing=$val;
 }

  public function getDetotroing(){
    return $this->detotroing;
  }

  public function setNumnom($val){
 	$this->numnom=$val;
 }

  public function getNumnom(){
    return $this->numnom;
  }

  public function setCcperpreconId($val){
 	$this->ccperprecon_id=$val;
 }

  public function getCcperpreconId(){
    return $this->ccperprecon_id;
  }

  public function setCcubiadmId($val){
 	$this->ccubiadm_id=$val;
 }

  public function getCcubiadmId(){
    return $this->ccubiadm_id;
  }

  public function setCccondicId($val){
 	$this->cccondic_id=$val;
 }

  public function getCccondicId(){
    return $this->cccondic_id;
  }

  public function setCccargoId($val){
 	$this->cccargo_id=$val;
 }

  public function getCccargoId(){
    return $this->cccargo_id;
  }

  }