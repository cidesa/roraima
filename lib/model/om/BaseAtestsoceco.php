<?php


abstract class BaseAtestsoceco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $atciudadano_id;


	
	protected $attipviv_id;


	
	protected $attipproviv_id;


	
	protected $carvivsal;


	
	protected $carvivcom;


	
	protected $carvivhab;


	
	protected $carvivcoc;


	
	protected $carvivban;


	
	protected $carvivpat;


	
	protected $carvivarever;


	
	protected $carvivpis;


	
	protected $carvivpar;


	
	protected $carvivtec;


	
	protected $anasoceco;


	
	protected $anafam;


	
	protected $otros;


	
	protected $motvis;


	
	protected $parfri;


	
	protected $parintext;


	
	protected $obspar;


	
	protected $parsinfri;


	
	protected $parsinintext;


	
	protected $parmad;


	
	protected $parzin;


	
	protected $parmatdes;


	
	protected $suecemrus;


	
	protected $suecempul;


	
	protected $suetie;


	
	protected $suecer;


	
	protected $suegra;


	
	protected $suepar;


	
	protected $suelin;


	
	protected $obssue;


	
	protected $teczin;


	
	protected $tecmatdes;


	
	protected $tecace;


	
	protected $teccar;


	
	protected $tectej;


	
	protected $tecado;


	
	protected $obstec;


	
	protected $vivnroamb;


	
	protected $vivnrohab;


	
	protected $vivnroban;


	
	protected $bandenviv;


	
	protected $banfueviv;


	
	protected $vivlet;


	
	protected $vivwat;


	
	protected $vivotr;


	
	protected $vivduc;


	
	protected $vivlav;


	
	protected $vivpar;


	
	protected $vivpis;


	
	protected $vivsal;


	
	protected $vivcom;


	
	protected $vivsalcom;


	
	protected $vivcocdenviv;


	
	protected $vivcocfueviv;


	
	protected $viaaccvivasf;


	
	protected $viaaccvivtie;


	
	protected $viaaccvivesc;


	
	protected $tramet;


	
	protected $trafer;


	
	protected $tracam;


	
	protected $trajee;


	
	protected $tralan;


	
	protected $trabar;


	
	protected $tracami;


	
	protected $agufredia;


	
	protected $agufreint;


	
	protected $agufresem;


	
	protected $agufre15d;


	
	protected $aguportub;


	
	protected $agupordep;


	
	protected $aguserdes;


	
	protected $aguserpoz;


	
	protected $aseurbdia;


	
	protected $aseurbint;


	
	protected $aseurbsem;


	
	protected $aseurb15d;


	
	protected $elepag;


	
	protected $elepar;


	
	protected $gasbom;


	
	protected $gasdir;


	
	protected $toting;


	
	protected $egrviv;


	
	protected $egrtra;


	
	protected $egredu;


	
	protected $egrali;


	
	protected $egrtel;


	
	protected $egrluzase;


	
	protected $egragu;


	
	protected $egrgas;


	
	protected $egrotr;


	
	protected $totegr;


	
	protected $diasoc;


	
	protected $trasoc;


	
	protected $recome;


	
	protected $observ;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $aAtciudadano;

	
	protected $aAttipviv;

	
	protected $aAttipproviv;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getAtciudadanoId()
  {

    return $this->atciudadano_id;

  }
  
  public function getAttipvivId()
  {

    return $this->attipviv_id;

  }
  
  public function getAttipprovivId()
  {

    return $this->attipproviv_id;

  }
  
  public function getCarvivsal()
  {

    return $this->carvivsal;

  }
  
  public function getCarvivcom()
  {

    return $this->carvivcom;

  }
  
  public function getCarvivhab()
  {

    return $this->carvivhab;

  }
  
  public function getCarvivcoc()
  {

    return $this->carvivcoc;

  }
  
  public function getCarvivban()
  {

    return $this->carvivban;

  }
  
  public function getCarvivpat()
  {

    return $this->carvivpat;

  }
  
  public function getCarvivarever()
  {

    return $this->carvivarever;

  }
  
  public function getCarvivpis()
  {

    return $this->carvivpis;

  }
  
  public function getCarvivpar()
  {

    return $this->carvivpar;

  }
  
  public function getCarvivtec()
  {

    return $this->carvivtec;

  }
  
  public function getAnasoceco()
  {

    return trim($this->anasoceco);

  }
  
  public function getAnafam()
  {

    return trim($this->anafam);

  }
  
  public function getOtros()
  {

    return trim($this->otros);

  }
  
  public function getMotvis()
  {

    return trim($this->motvis);

  }
  
  public function getParfri()
  {

    return $this->parfri;

  }
  
  public function getParintext()
  {

    return trim($this->parintext);

  }
  
  public function getObspar()
  {

    return trim($this->obspar);

  }
  
  public function getParsinfri()
  {

    return $this->parsinfri;

  }
  
  public function getParsinintext()
  {

    return trim($this->parsinintext);

  }
  
  public function getParmad()
  {

    return $this->parmad;

  }
  
  public function getParzin()
  {

    return $this->parzin;

  }
  
  public function getParmatdes()
  {

    return $this->parmatdes;

  }
  
  public function getSuecemrus()
  {

    return $this->suecemrus;

  }
  
  public function getSuecempul()
  {

    return $this->suecempul;

  }
  
  public function getSuetie()
  {

    return $this->suetie;

  }
  
  public function getSuecer()
  {

    return $this->suecer;

  }
  
  public function getSuegra()
  {

    return $this->suegra;

  }
  
  public function getSuepar()
  {

    return $this->suepar;

  }
  
  public function getSuelin()
  {

    return $this->suelin;

  }
  
  public function getObssue()
  {

    return trim($this->obssue);

  }
  
  public function getTeczin()
  {

    return $this->teczin;

  }
  
  public function getTecmatdes()
  {

    return $this->tecmatdes;

  }
  
  public function getTecace()
  {

    return $this->tecace;

  }
  
  public function getTeccar()
  {

    return $this->teccar;

  }
  
  public function getTectej()
  {

    return $this->tectej;

  }
  
  public function getTecado()
  {

    return $this->tecado;

  }
  
  public function getObstec()
  {

    return trim($this->obstec);

  }
  
  public function getVivnroamb()
  {

    return $this->vivnroamb;

  }
  
  public function getVivnrohab()
  {

    return $this->vivnrohab;

  }
  
  public function getVivnroban()
  {

    return $this->vivnroban;

  }
  
  public function getBandenviv()
  {

    return $this->bandenviv;

  }
  
  public function getBanfueviv()
  {

    return $this->banfueviv;

  }
  
  public function getVivlet()
  {

    return $this->vivlet;

  }
  
  public function getVivwat()
  {

    return $this->vivwat;

  }
  
  public function getVivotr()
  {

    return $this->vivotr;

  }
  
  public function getVivduc()
  {

    return $this->vivduc;

  }
  
  public function getVivlav()
  {

    return $this->vivlav;

  }
  
  public function getVivpar()
  {

    return trim($this->vivpar);

  }
  
  public function getVivpis()
  {

    return trim($this->vivpis);

  }
  
  public function getVivsal()
  {

    return $this->vivsal;

  }
  
  public function getVivcom()
  {

    return $this->vivcom;

  }
  
  public function getVivsalcom()
  {

    return $this->vivsalcom;

  }
  
  public function getVivcocdenviv()
  {

    return $this->vivcocdenviv;

  }
  
  public function getVivcocfueviv()
  {

    return $this->vivcocfueviv;

  }
  
  public function getViaaccvivasf()
  {

    return $this->viaaccvivasf;

  }
  
  public function getViaaccvivtie()
  {

    return $this->viaaccvivtie;

  }
  
  public function getViaaccvivesc()
  {

    return $this->viaaccvivesc;

  }
  
  public function getTramet()
  {

    return $this->tramet;

  }
  
  public function getTrafer()
  {

    return $this->trafer;

  }
  
  public function getTracam()
  {

    return $this->tracam;

  }
  
  public function getTrajee()
  {

    return $this->trajee;

  }
  
  public function getTralan()
  {

    return $this->tralan;

  }
  
  public function getTrabar()
  {

    return $this->trabar;

  }
  
  public function getTracami()
  {

    return $this->tracami;

  }
  
  public function getAgufredia()
  {

    return $this->agufredia;

  }
  
  public function getAgufreint()
  {

    return $this->agufreint;

  }
  
  public function getAgufresem()
  {

    return $this->agufresem;

  }
  
  public function getAgufre15d()
  {

    return $this->agufre15d;

  }
  
  public function getAguportub()
  {

    return $this->aguportub;

  }
  
  public function getAgupordep()
  {

    return $this->agupordep;

  }
  
  public function getAguserdes()
  {

    return $this->aguserdes;

  }
  
  public function getAguserpoz()
  {

    return $this->aguserpoz;

  }
  
  public function getAseurbdia()
  {

    return $this->aseurbdia;

  }
  
  public function getAseurbint()
  {

    return $this->aseurbint;

  }
  
  public function getAseurbsem()
  {

    return $this->aseurbsem;

  }
  
  public function getAseurb15d()
  {

    return $this->aseurb15d;

  }
  
  public function getElepag()
  {

    return $this->elepag;

  }
  
  public function getElepar()
  {

    return $this->elepar;

  }
  
  public function getGasbom()
  {

    return $this->gasbom;

  }
  
  public function getGasdir()
  {

    return $this->gasdir;

  }
  
  public function getToting($val=false)
  {

    if($val) return number_format($this->toting,2,',','.');
    else return $this->toting;

  }
  
  public function getEgrviv($val=false)
  {

    if($val) return number_format($this->egrviv,2,',','.');
    else return $this->egrviv;

  }
  
  public function getEgrtra($val=false)
  {

    if($val) return number_format($this->egrtra,2,',','.');
    else return $this->egrtra;

  }
  
  public function getEgredu($val=false)
  {

    if($val) return number_format($this->egredu,2,',','.');
    else return $this->egredu;

  }
  
  public function getEgrali($val=false)
  {

    if($val) return number_format($this->egrali,2,',','.');
    else return $this->egrali;

  }
  
  public function getEgrtel($val=false)
  {

    if($val) return number_format($this->egrtel,2,',','.');
    else return $this->egrtel;

  }
  
  public function getEgrluzase($val=false)
  {

    if($val) return number_format($this->egrluzase,2,',','.');
    else return $this->egrluzase;

  }
  
  public function getEgragu($val=false)
  {

    if($val) return number_format($this->egragu,2,',','.');
    else return $this->egragu;

  }
  
  public function getEgrgas($val=false)
  {

    if($val) return number_format($this->egrgas,2,',','.');
    else return $this->egrgas;

  }
  
  public function getEgrotr($val=false)
  {

    if($val) return number_format($this->egrotr,2,',','.');
    else return $this->egrotr;

  }
  
  public function getTotegr($val=false)
  {

    if($val) return number_format($this->totegr,2,',','.');
    else return $this->totegr;

  }
  
  public function getDiasoc()
  {

    return trim($this->diasoc);

  }
  
  public function getTrasoc()
  {

    return trim($this->trasoc);

  }
  
  public function getRecome()
  {

    return trim($this->recome);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setAtciudadanoId($v)
	{

    if ($this->atciudadano_id !== $v) {
        $this->atciudadano_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATCIUDADANO_ID;
      }
  
		if ($this->aAtciudadano !== null && $this->aAtciudadano->getId() !== $v) {
			$this->aAtciudadano = null;
		}

	} 
	
	public function setAttipvivId($v)
	{

    if ($this->attipviv_id !== $v) {
        $this->attipviv_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATTIPVIV_ID;
      }
  
		if ($this->aAttipviv !== null && $this->aAttipviv->getId() !== $v) {
			$this->aAttipviv = null;
		}

	} 
	
	public function setAttipprovivId($v)
	{

    if ($this->attipproviv_id !== $v) {
        $this->attipproviv_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATTIPPROVIV_ID;
      }
  
		if ($this->aAttipproviv !== null && $this->aAttipproviv->getId() !== $v) {
			$this->aAttipproviv = null;
		}

	} 
	
	public function setCarvivsal($v)
	{

    if ($this->carvivsal !== $v) {
        $this->carvivsal = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVSAL;
      }
  
	} 
	
	public function setCarvivcom($v)
	{

    if ($this->carvivcom !== $v) {
        $this->carvivcom = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVCOM;
      }
  
	} 
	
	public function setCarvivhab($v)
	{

    if ($this->carvivhab !== $v) {
        $this->carvivhab = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVHAB;
      }
  
	} 
	
	public function setCarvivcoc($v)
	{

    if ($this->carvivcoc !== $v) {
        $this->carvivcoc = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVCOC;
      }
  
	} 
	
	public function setCarvivban($v)
	{

    if ($this->carvivban !== $v) {
        $this->carvivban = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVBAN;
      }
  
	} 
	
	public function setCarvivpat($v)
	{

    if ($this->carvivpat !== $v) {
        $this->carvivpat = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVPAT;
      }
  
	} 
	
	public function setCarvivarever($v)
	{

    if ($this->carvivarever !== $v) {
        $this->carvivarever = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVAREVER;
      }
  
	} 
	
	public function setCarvivpis($v)
	{

    if ($this->carvivpis !== $v) {
        $this->carvivpis = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVPIS;
      }
  
	} 
	
	public function setCarvivpar($v)
	{

    if ($this->carvivpar !== $v) {
        $this->carvivpar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVPAR;
      }
  
	} 
	
	public function setCarvivtec($v)
	{

    if ($this->carvivtec !== $v) {
        $this->carvivtec = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVTEC;
      }
  
	} 
	
	public function setAnasoceco($v)
	{

    if ($this->anasoceco !== $v) {
        $this->anasoceco = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ANASOCECO;
      }
  
	} 
	
	public function setAnafam($v)
	{

    if ($this->anafam !== $v) {
        $this->anafam = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ANAFAM;
      }
  
	} 
	
	public function setOtros($v)
	{

    if ($this->otros !== $v) {
        $this->otros = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::OTROS;
      }
  
	} 
	
	public function setMotvis($v)
	{

    if ($this->motvis !== $v) {
        $this->motvis = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::MOTVIS;
      }
  
	} 
	
	public function setParfri($v)
	{

    if ($this->parfri !== $v) {
        $this->parfri = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARFRI;
      }
  
	} 
	
	public function setParintext($v)
	{

    if ($this->parintext !== $v) {
        $this->parintext = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARINTEXT;
      }
  
	} 
	
	public function setObspar($v)
	{

    if ($this->obspar !== $v) {
        $this->obspar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::OBSPAR;
      }
  
	} 
	
	public function setParsinfri($v)
	{

    if ($this->parsinfri !== $v) {
        $this->parsinfri = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARSINFRI;
      }
  
	} 
	
	public function setParsinintext($v)
	{

    if ($this->parsinintext !== $v) {
        $this->parsinintext = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARSININTEXT;
      }
  
	} 
	
	public function setParmad($v)
	{

    if ($this->parmad !== $v) {
        $this->parmad = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARMAD;
      }
  
	} 
	
	public function setParzin($v)
	{

    if ($this->parzin !== $v) {
        $this->parzin = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARZIN;
      }
  
	} 
	
	public function setParmatdes($v)
	{

    if ($this->parmatdes !== $v) {
        $this->parmatdes = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::PARMATDES;
      }
  
	} 
	
	public function setSuecemrus($v)
	{

    if ($this->suecemrus !== $v) {
        $this->suecemrus = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUECEMRUS;
      }
  
	} 
	
	public function setSuecempul($v)
	{

    if ($this->suecempul !== $v) {
        $this->suecempul = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUECEMPUL;
      }
  
	} 
	
	public function setSuetie($v)
	{

    if ($this->suetie !== $v) {
        $this->suetie = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUETIE;
      }
  
	} 
	
	public function setSuecer($v)
	{

    if ($this->suecer !== $v) {
        $this->suecer = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUECER;
      }
  
	} 
	
	public function setSuegra($v)
	{

    if ($this->suegra !== $v) {
        $this->suegra = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUEGRA;
      }
  
	} 
	
	public function setSuepar($v)
	{

    if ($this->suepar !== $v) {
        $this->suepar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUEPAR;
      }
  
	} 
	
	public function setSuelin($v)
	{

    if ($this->suelin !== $v) {
        $this->suelin = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::SUELIN;
      }
  
	} 
	
	public function setObssue($v)
	{

    if ($this->obssue !== $v) {
        $this->obssue = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::OBSSUE;
      }
  
	} 
	
	public function setTeczin($v)
	{

    if ($this->teczin !== $v) {
        $this->teczin = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TECZIN;
      }
  
	} 
	
	public function setTecmatdes($v)
	{

    if ($this->tecmatdes !== $v) {
        $this->tecmatdes = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TECMATDES;
      }
  
	} 
	
	public function setTecace($v)
	{

    if ($this->tecace !== $v) {
        $this->tecace = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TECACE;
      }
  
	} 
	
	public function setTeccar($v)
	{

    if ($this->teccar !== $v) {
        $this->teccar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TECCAR;
      }
  
	} 
	
	public function setTectej($v)
	{

    if ($this->tectej !== $v) {
        $this->tectej = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TECTEJ;
      }
  
	} 
	
	public function setTecado($v)
	{

    if ($this->tecado !== $v) {
        $this->tecado = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TECADO;
      }
  
	} 
	
	public function setObstec($v)
	{

    if ($this->obstec !== $v) {
        $this->obstec = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::OBSTEC;
      }
  
	} 
	
	public function setVivnroamb($v)
	{

    if ($this->vivnroamb !== $v) {
        $this->vivnroamb = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVNROAMB;
      }
  
	} 
	
	public function setVivnrohab($v)
	{

    if ($this->vivnrohab !== $v) {
        $this->vivnrohab = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVNROHAB;
      }
  
	} 
	
	public function setVivnroban($v)
	{

    if ($this->vivnroban !== $v) {
        $this->vivnroban = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVNROBAN;
      }
  
	} 
	
	public function setBandenviv($v)
	{

    if ($this->bandenviv !== $v) {
        $this->bandenviv = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::BANDENVIV;
      }
  
	} 
	
	public function setBanfueviv($v)
	{

    if ($this->banfueviv !== $v) {
        $this->banfueviv = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::BANFUEVIV;
      }
  
	} 
	
	public function setVivlet($v)
	{

    if ($this->vivlet !== $v) {
        $this->vivlet = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVLET;
      }
  
	} 
	
	public function setVivwat($v)
	{

    if ($this->vivwat !== $v) {
        $this->vivwat = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVWAT;
      }
  
	} 
	
	public function setVivotr($v)
	{

    if ($this->vivotr !== $v) {
        $this->vivotr = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVOTR;
      }
  
	} 
	
	public function setVivduc($v)
	{

    if ($this->vivduc !== $v) {
        $this->vivduc = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVDUC;
      }
  
	} 
	
	public function setVivlav($v)
	{

    if ($this->vivlav !== $v) {
        $this->vivlav = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVLAV;
      }
  
	} 
	
	public function setVivpar($v)
	{

    if ($this->vivpar !== $v) {
        $this->vivpar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVPAR;
      }
  
	} 
	
	public function setVivpis($v)
	{

    if ($this->vivpis !== $v) {
        $this->vivpis = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVPIS;
      }
  
	} 
	
	public function setVivsal($v)
	{

    if ($this->vivsal !== $v) {
        $this->vivsal = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVSAL;
      }
  
	} 
	
	public function setVivcom($v)
	{

    if ($this->vivcom !== $v) {
        $this->vivcom = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVCOM;
      }
  
	} 
	
	public function setVivsalcom($v)
	{

    if ($this->vivsalcom !== $v) {
        $this->vivsalcom = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVSALCOM;
      }
  
	} 
	
	public function setVivcocdenviv($v)
	{

    if ($this->vivcocdenviv !== $v) {
        $this->vivcocdenviv = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVCOCDENVIV;
      }
  
	} 
	
	public function setVivcocfueviv($v)
	{

    if ($this->vivcocfueviv !== $v) {
        $this->vivcocfueviv = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIVCOCFUEVIV;
      }
  
	} 
	
	public function setViaaccvivasf($v)
	{

    if ($this->viaaccvivasf !== $v) {
        $this->viaaccvivasf = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIAACCVIVASF;
      }
  
	} 
	
	public function setViaaccvivtie($v)
	{

    if ($this->viaaccvivtie !== $v) {
        $this->viaaccvivtie = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIAACCVIVTIE;
      }
  
	} 
	
	public function setViaaccvivesc($v)
	{

    if ($this->viaaccvivesc !== $v) {
        $this->viaaccvivesc = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::VIAACCVIVESC;
      }
  
	} 
	
	public function setTramet($v)
	{

    if ($this->tramet !== $v) {
        $this->tramet = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRAMET;
      }
  
	} 
	
	public function setTrafer($v)
	{

    if ($this->trafer !== $v) {
        $this->trafer = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRAFER;
      }
  
	} 
	
	public function setTracam($v)
	{

    if ($this->tracam !== $v) {
        $this->tracam = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRACAM;
      }
  
	} 
	
	public function setTrajee($v)
	{

    if ($this->trajee !== $v) {
        $this->trajee = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRAJEE;
      }
  
	} 
	
	public function setTralan($v)
	{

    if ($this->tralan !== $v) {
        $this->tralan = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRALAN;
      }
  
	} 
	
	public function setTrabar($v)
	{

    if ($this->trabar !== $v) {
        $this->trabar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRABAR;
      }
  
	} 
	
	public function setTracami($v)
	{

    if ($this->tracami !== $v) {
        $this->tracami = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRACAMI;
      }
  
	} 
	
	public function setAgufredia($v)
	{

    if ($this->agufredia !== $v) {
        $this->agufredia = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUFREDIA;
      }
  
	} 
	
	public function setAgufreint($v)
	{

    if ($this->agufreint !== $v) {
        $this->agufreint = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUFREINT;
      }
  
	} 
	
	public function setAgufresem($v)
	{

    if ($this->agufresem !== $v) {
        $this->agufresem = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUFRESEM;
      }
  
	} 
	
	public function setAgufre15d($v)
	{

    if ($this->agufre15d !== $v) {
        $this->agufre15d = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUFRE15D;
      }
  
	} 
	
	public function setAguportub($v)
	{

    if ($this->aguportub !== $v) {
        $this->aguportub = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUPORTUB;
      }
  
	} 
	
	public function setAgupordep($v)
	{

    if ($this->agupordep !== $v) {
        $this->agupordep = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUPORDEP;
      }
  
	} 
	
	public function setAguserdes($v)
	{

    if ($this->aguserdes !== $v) {
        $this->aguserdes = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUSERDES;
      }
  
	} 
	
	public function setAguserpoz($v)
	{

    if ($this->aguserpoz !== $v) {
        $this->aguserpoz = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::AGUSERPOZ;
      }
  
	} 
	
	public function setAseurbdia($v)
	{

    if ($this->aseurbdia !== $v) {
        $this->aseurbdia = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ASEURBDIA;
      }
  
	} 
	
	public function setAseurbint($v)
	{

    if ($this->aseurbint !== $v) {
        $this->aseurbint = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ASEURBINT;
      }
  
	} 
	
	public function setAseurbsem($v)
	{

    if ($this->aseurbsem !== $v) {
        $this->aseurbsem = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ASEURBSEM;
      }
  
	} 
	
	public function setAseurb15d($v)
	{

    if ($this->aseurb15d !== $v) {
        $this->aseurb15d = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ASEURB15D;
      }
  
	} 
	
	public function setElepag($v)
	{

    if ($this->elepag !== $v) {
        $this->elepag = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ELEPAG;
      }
  
	} 
	
	public function setElepar($v)
	{

    if ($this->elepar !== $v) {
        $this->elepar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ELEPAR;
      }
  
	} 
	
	public function setGasbom($v)
	{

    if ($this->gasbom !== $v) {
        $this->gasbom = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::GASBOM;
      }
  
	} 
	
	public function setGasdir($v)
	{

    if ($this->gasdir !== $v) {
        $this->gasdir = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::GASDIR;
      }
  
	} 
	
	public function setToting($v)
	{

    if ($this->toting !== $v) {
        $this->toting = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::TOTING;
      }
  
	} 
	
	public function setEgrviv($v)
	{

    if ($this->egrviv !== $v) {
        $this->egrviv = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRVIV;
      }
  
	} 
	
	public function setEgrtra($v)
	{

    if ($this->egrtra !== $v) {
        $this->egrtra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRTRA;
      }
  
	} 
	
	public function setEgredu($v)
	{

    if ($this->egredu !== $v) {
        $this->egredu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGREDU;
      }
  
	} 
	
	public function setEgrali($v)
	{

    if ($this->egrali !== $v) {
        $this->egrali = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRALI;
      }
  
	} 
	
	public function setEgrtel($v)
	{

    if ($this->egrtel !== $v) {
        $this->egrtel = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRTEL;
      }
  
	} 
	
	public function setEgrluzase($v)
	{

    if ($this->egrluzase !== $v) {
        $this->egrluzase = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRLUZASE;
      }
  
	} 
	
	public function setEgragu($v)
	{

    if ($this->egragu !== $v) {
        $this->egragu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRAGU;
      }
  
	} 
	
	public function setEgrgas($v)
	{

    if ($this->egrgas !== $v) {
        $this->egrgas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGRGAS;
      }
  
	} 
	
	public function setEgrotr($v)
	{

    if ($this->egrotr !== $v) {
        $this->egrotr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::EGROTR;
      }
  
	} 
	
	public function setTotegr($v)
	{

    if ($this->totegr !== $v) {
        $this->totegr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtestsocecoPeer::TOTEGR;
      }
  
	} 
	
	public function setDiasoc($v)
	{

    if ($this->diasoc !== $v) {
        $this->diasoc = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::DIASOC;
      }
  
	} 
	
	public function setTrasoc($v)
	{

    if ($this->trasoc !== $v) {
        $this->trasoc = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::TRASOC;
      }
  
	} 
	
	public function setRecome($v)
	{

    if ($this->recome !== $v) {
        $this->recome = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::RECOME;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::OBSERV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->atciudadano_id = $rs->getInt($startcol + 1);

      $this->attipviv_id = $rs->getInt($startcol + 2);

      $this->attipproviv_id = $rs->getInt($startcol + 3);

      $this->carvivsal = $rs->getBoolean($startcol + 4);

      $this->carvivcom = $rs->getBoolean($startcol + 5);

      $this->carvivhab = $rs->getBoolean($startcol + 6);

      $this->carvivcoc = $rs->getBoolean($startcol + 7);

      $this->carvivban = $rs->getBoolean($startcol + 8);

      $this->carvivpat = $rs->getBoolean($startcol + 9);

      $this->carvivarever = $rs->getBoolean($startcol + 10);

      $this->carvivpis = $rs->getBoolean($startcol + 11);

      $this->carvivpar = $rs->getBoolean($startcol + 12);

      $this->carvivtec = $rs->getBoolean($startcol + 13);

      $this->anasoceco = $rs->getString($startcol + 14);

      $this->anafam = $rs->getString($startcol + 15);

      $this->otros = $rs->getString($startcol + 16);

      $this->motvis = $rs->getString($startcol + 17);

      $this->parfri = $rs->getBoolean($startcol + 18);

      $this->parintext = $rs->getString($startcol + 19);

      $this->obspar = $rs->getString($startcol + 20);

      $this->parsinfri = $rs->getBoolean($startcol + 21);

      $this->parsinintext = $rs->getString($startcol + 22);

      $this->parmad = $rs->getBoolean($startcol + 23);

      $this->parzin = $rs->getBoolean($startcol + 24);

      $this->parmatdes = $rs->getBoolean($startcol + 25);

      $this->suecemrus = $rs->getBoolean($startcol + 26);

      $this->suecempul = $rs->getBoolean($startcol + 27);

      $this->suetie = $rs->getBoolean($startcol + 28);

      $this->suecer = $rs->getBoolean($startcol + 29);

      $this->suegra = $rs->getBoolean($startcol + 30);

      $this->suepar = $rs->getBoolean($startcol + 31);

      $this->suelin = $rs->getBoolean($startcol + 32);

      $this->obssue = $rs->getString($startcol + 33);

      $this->teczin = $rs->getBoolean($startcol + 34);

      $this->tecmatdes = $rs->getBoolean($startcol + 35);

      $this->tecace = $rs->getBoolean($startcol + 36);

      $this->teccar = $rs->getBoolean($startcol + 37);

      $this->tectej = $rs->getBoolean($startcol + 38);

      $this->tecado = $rs->getBoolean($startcol + 39);

      $this->obstec = $rs->getString($startcol + 40);

      $this->vivnroamb = $rs->getInt($startcol + 41);

      $this->vivnrohab = $rs->getInt($startcol + 42);

      $this->vivnroban = $rs->getInt($startcol + 43);

      $this->bandenviv = $rs->getInt($startcol + 44);

      $this->banfueviv = $rs->getInt($startcol + 45);

      $this->vivlet = $rs->getBoolean($startcol + 46);

      $this->vivwat = $rs->getBoolean($startcol + 47);

      $this->vivotr = $rs->getBoolean($startcol + 48);

      $this->vivduc = $rs->getBoolean($startcol + 49);

      $this->vivlav = $rs->getBoolean($startcol + 50);

      $this->vivpar = $rs->getString($startcol + 51);

      $this->vivpis = $rs->getString($startcol + 52);

      $this->vivsal = $rs->getBoolean($startcol + 53);

      $this->vivcom = $rs->getBoolean($startcol + 54);

      $this->vivsalcom = $rs->getBoolean($startcol + 55);

      $this->vivcocdenviv = $rs->getBoolean($startcol + 56);

      $this->vivcocfueviv = $rs->getBoolean($startcol + 57);

      $this->viaaccvivasf = $rs->getBoolean($startcol + 58);

      $this->viaaccvivtie = $rs->getBoolean($startcol + 59);

      $this->viaaccvivesc = $rs->getBoolean($startcol + 60);

      $this->tramet = $rs->getBoolean($startcol + 61);

      $this->trafer = $rs->getBoolean($startcol + 62);

      $this->tracam = $rs->getBoolean($startcol + 63);

      $this->trajee = $rs->getBoolean($startcol + 64);

      $this->tralan = $rs->getBoolean($startcol + 65);

      $this->trabar = $rs->getBoolean($startcol + 66);

      $this->tracami = $rs->getBoolean($startcol + 67);

      $this->agufredia = $rs->getBoolean($startcol + 68);

      $this->agufreint = $rs->getBoolean($startcol + 69);

      $this->agufresem = $rs->getBoolean($startcol + 70);

      $this->agufre15d = $rs->getBoolean($startcol + 71);

      $this->aguportub = $rs->getBoolean($startcol + 72);

      $this->agupordep = $rs->getBoolean($startcol + 73);

      $this->aguserdes = $rs->getBoolean($startcol + 74);

      $this->aguserpoz = $rs->getBoolean($startcol + 75);

      $this->aseurbdia = $rs->getBoolean($startcol + 76);

      $this->aseurbint = $rs->getBoolean($startcol + 77);

      $this->aseurbsem = $rs->getBoolean($startcol + 78);

      $this->aseurb15d = $rs->getBoolean($startcol + 79);

      $this->elepag = $rs->getBoolean($startcol + 80);

      $this->elepar = $rs->getBoolean($startcol + 81);

      $this->gasbom = $rs->getBoolean($startcol + 82);

      $this->gasdir = $rs->getBoolean($startcol + 83);

      $this->toting = $rs->getFloat($startcol + 84);

      $this->egrviv = $rs->getFloat($startcol + 85);

      $this->egrtra = $rs->getFloat($startcol + 86);

      $this->egredu = $rs->getFloat($startcol + 87);

      $this->egrali = $rs->getFloat($startcol + 88);

      $this->egrtel = $rs->getFloat($startcol + 89);

      $this->egrluzase = $rs->getFloat($startcol + 90);

      $this->egragu = $rs->getFloat($startcol + 91);

      $this->egrgas = $rs->getFloat($startcol + 92);

      $this->egrotr = $rs->getFloat($startcol + 93);

      $this->totegr = $rs->getFloat($startcol + 94);

      $this->diasoc = $rs->getString($startcol + 95);

      $this->trasoc = $rs->getString($startcol + 96);

      $this->recome = $rs->getString($startcol + 97);

      $this->observ = $rs->getString($startcol + 98);

      $this->id = $rs->getInt($startcol + 99);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 100; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atestsoceco object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AtestsocecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtestsocecoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AtestsocecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aAtayudas !== null) {
				if ($this->aAtayudas->isModified()) {
					$affectedRows += $this->aAtayudas->save($con);
				}
				$this->setAtayudas($this->aAtayudas);
			}

			if ($this->aAtciudadano !== null) {
				if ($this->aAtciudadano->isModified()) {
					$affectedRows += $this->aAtciudadano->save($con);
				}
				$this->setAtciudadano($this->aAtciudadano);
			}

			if ($this->aAttipviv !== null) {
				if ($this->aAttipviv->isModified()) {
					$affectedRows += $this->aAttipviv->save($con);
				}
				$this->setAttipviv($this->aAttipviv);
			}

			if ($this->aAttipproviv !== null) {
				if ($this->aAttipproviv->isModified()) {
					$affectedRows += $this->aAttipproviv->save($con);
				}
				$this->setAttipproviv($this->aAttipproviv);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtestsocecoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtestsocecoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aAtayudas !== null) {
				if (!$this->aAtayudas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtayudas->getValidationFailures());
				}
			}

			if ($this->aAtciudadano !== null) {
				if (!$this->aAtciudadano->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadano->getValidationFailures());
				}
			}

			if ($this->aAttipviv !== null) {
				if (!$this->aAttipviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipviv->getValidationFailures());
				}
			}

			if ($this->aAttipproviv !== null) {
				if (!$this->aAttipproviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipproviv->getValidationFailures());
				}
			}


			if (($retval = AtestsocecoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtestsocecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getAtciudadanoId();
				break;
			case 2:
				return $this->getAttipvivId();
				break;
			case 3:
				return $this->getAttipprovivId();
				break;
			case 4:
				return $this->getCarvivsal();
				break;
			case 5:
				return $this->getCarvivcom();
				break;
			case 6:
				return $this->getCarvivhab();
				break;
			case 7:
				return $this->getCarvivcoc();
				break;
			case 8:
				return $this->getCarvivban();
				break;
			case 9:
				return $this->getCarvivpat();
				break;
			case 10:
				return $this->getCarvivarever();
				break;
			case 11:
				return $this->getCarvivpis();
				break;
			case 12:
				return $this->getCarvivpar();
				break;
			case 13:
				return $this->getCarvivtec();
				break;
			case 14:
				return $this->getAnasoceco();
				break;
			case 15:
				return $this->getAnafam();
				break;
			case 16:
				return $this->getOtros();
				break;
			case 17:
				return $this->getMotvis();
				break;
			case 18:
				return $this->getParfri();
				break;
			case 19:
				return $this->getParintext();
				break;
			case 20:
				return $this->getObspar();
				break;
			case 21:
				return $this->getParsinfri();
				break;
			case 22:
				return $this->getParsinintext();
				break;
			case 23:
				return $this->getParmad();
				break;
			case 24:
				return $this->getParzin();
				break;
			case 25:
				return $this->getParmatdes();
				break;
			case 26:
				return $this->getSuecemrus();
				break;
			case 27:
				return $this->getSuecempul();
				break;
			case 28:
				return $this->getSuetie();
				break;
			case 29:
				return $this->getSuecer();
				break;
			case 30:
				return $this->getSuegra();
				break;
			case 31:
				return $this->getSuepar();
				break;
			case 32:
				return $this->getSuelin();
				break;
			case 33:
				return $this->getObssue();
				break;
			case 34:
				return $this->getTeczin();
				break;
			case 35:
				return $this->getTecmatdes();
				break;
			case 36:
				return $this->getTecace();
				break;
			case 37:
				return $this->getTeccar();
				break;
			case 38:
				return $this->getTectej();
				break;
			case 39:
				return $this->getTecado();
				break;
			case 40:
				return $this->getObstec();
				break;
			case 41:
				return $this->getVivnroamb();
				break;
			case 42:
				return $this->getVivnrohab();
				break;
			case 43:
				return $this->getVivnroban();
				break;
			case 44:
				return $this->getBandenviv();
				break;
			case 45:
				return $this->getBanfueviv();
				break;
			case 46:
				return $this->getVivlet();
				break;
			case 47:
				return $this->getVivwat();
				break;
			case 48:
				return $this->getVivotr();
				break;
			case 49:
				return $this->getVivduc();
				break;
			case 50:
				return $this->getVivlav();
				break;
			case 51:
				return $this->getVivpar();
				break;
			case 52:
				return $this->getVivpis();
				break;
			case 53:
				return $this->getVivsal();
				break;
			case 54:
				return $this->getVivcom();
				break;
			case 55:
				return $this->getVivsalcom();
				break;
			case 56:
				return $this->getVivcocdenviv();
				break;
			case 57:
				return $this->getVivcocfueviv();
				break;
			case 58:
				return $this->getViaaccvivasf();
				break;
			case 59:
				return $this->getViaaccvivtie();
				break;
			case 60:
				return $this->getViaaccvivesc();
				break;
			case 61:
				return $this->getTramet();
				break;
			case 62:
				return $this->getTrafer();
				break;
			case 63:
				return $this->getTracam();
				break;
			case 64:
				return $this->getTrajee();
				break;
			case 65:
				return $this->getTralan();
				break;
			case 66:
				return $this->getTrabar();
				break;
			case 67:
				return $this->getTracami();
				break;
			case 68:
				return $this->getAgufredia();
				break;
			case 69:
				return $this->getAgufreint();
				break;
			case 70:
				return $this->getAgufresem();
				break;
			case 71:
				return $this->getAgufre15d();
				break;
			case 72:
				return $this->getAguportub();
				break;
			case 73:
				return $this->getAgupordep();
				break;
			case 74:
				return $this->getAguserdes();
				break;
			case 75:
				return $this->getAguserpoz();
				break;
			case 76:
				return $this->getAseurbdia();
				break;
			case 77:
				return $this->getAseurbint();
				break;
			case 78:
				return $this->getAseurbsem();
				break;
			case 79:
				return $this->getAseurb15d();
				break;
			case 80:
				return $this->getElepag();
				break;
			case 81:
				return $this->getElepar();
				break;
			case 82:
				return $this->getGasbom();
				break;
			case 83:
				return $this->getGasdir();
				break;
			case 84:
				return $this->getToting();
				break;
			case 85:
				return $this->getEgrviv();
				break;
			case 86:
				return $this->getEgrtra();
				break;
			case 87:
				return $this->getEgredu();
				break;
			case 88:
				return $this->getEgrali();
				break;
			case 89:
				return $this->getEgrtel();
				break;
			case 90:
				return $this->getEgrluzase();
				break;
			case 91:
				return $this->getEgragu();
				break;
			case 92:
				return $this->getEgrgas();
				break;
			case 93:
				return $this->getEgrotr();
				break;
			case 94:
				return $this->getTotegr();
				break;
			case 95:
				return $this->getDiasoc();
				break;
			case 96:
				return $this->getTrasoc();
				break;
			case 97:
				return $this->getRecome();
				break;
			case 98:
				return $this->getObserv();
				break;
			case 99:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestsocecoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getAtciudadanoId(),
			$keys[2] => $this->getAttipvivId(),
			$keys[3] => $this->getAttipprovivId(),
			$keys[4] => $this->getCarvivsal(),
			$keys[5] => $this->getCarvivcom(),
			$keys[6] => $this->getCarvivhab(),
			$keys[7] => $this->getCarvivcoc(),
			$keys[8] => $this->getCarvivban(),
			$keys[9] => $this->getCarvivpat(),
			$keys[10] => $this->getCarvivarever(),
			$keys[11] => $this->getCarvivpis(),
			$keys[12] => $this->getCarvivpar(),
			$keys[13] => $this->getCarvivtec(),
			$keys[14] => $this->getAnasoceco(),
			$keys[15] => $this->getAnafam(),
			$keys[16] => $this->getOtros(),
			$keys[17] => $this->getMotvis(),
			$keys[18] => $this->getParfri(),
			$keys[19] => $this->getParintext(),
			$keys[20] => $this->getObspar(),
			$keys[21] => $this->getParsinfri(),
			$keys[22] => $this->getParsinintext(),
			$keys[23] => $this->getParmad(),
			$keys[24] => $this->getParzin(),
			$keys[25] => $this->getParmatdes(),
			$keys[26] => $this->getSuecemrus(),
			$keys[27] => $this->getSuecempul(),
			$keys[28] => $this->getSuetie(),
			$keys[29] => $this->getSuecer(),
			$keys[30] => $this->getSuegra(),
			$keys[31] => $this->getSuepar(),
			$keys[32] => $this->getSuelin(),
			$keys[33] => $this->getObssue(),
			$keys[34] => $this->getTeczin(),
			$keys[35] => $this->getTecmatdes(),
			$keys[36] => $this->getTecace(),
			$keys[37] => $this->getTeccar(),
			$keys[38] => $this->getTectej(),
			$keys[39] => $this->getTecado(),
			$keys[40] => $this->getObstec(),
			$keys[41] => $this->getVivnroamb(),
			$keys[42] => $this->getVivnrohab(),
			$keys[43] => $this->getVivnroban(),
			$keys[44] => $this->getBandenviv(),
			$keys[45] => $this->getBanfueviv(),
			$keys[46] => $this->getVivlet(),
			$keys[47] => $this->getVivwat(),
			$keys[48] => $this->getVivotr(),
			$keys[49] => $this->getVivduc(),
			$keys[50] => $this->getVivlav(),
			$keys[51] => $this->getVivpar(),
			$keys[52] => $this->getVivpis(),
			$keys[53] => $this->getVivsal(),
			$keys[54] => $this->getVivcom(),
			$keys[55] => $this->getVivsalcom(),
			$keys[56] => $this->getVivcocdenviv(),
			$keys[57] => $this->getVivcocfueviv(),
			$keys[58] => $this->getViaaccvivasf(),
			$keys[59] => $this->getViaaccvivtie(),
			$keys[60] => $this->getViaaccvivesc(),
			$keys[61] => $this->getTramet(),
			$keys[62] => $this->getTrafer(),
			$keys[63] => $this->getTracam(),
			$keys[64] => $this->getTrajee(),
			$keys[65] => $this->getTralan(),
			$keys[66] => $this->getTrabar(),
			$keys[67] => $this->getTracami(),
			$keys[68] => $this->getAgufredia(),
			$keys[69] => $this->getAgufreint(),
			$keys[70] => $this->getAgufresem(),
			$keys[71] => $this->getAgufre15d(),
			$keys[72] => $this->getAguportub(),
			$keys[73] => $this->getAgupordep(),
			$keys[74] => $this->getAguserdes(),
			$keys[75] => $this->getAguserpoz(),
			$keys[76] => $this->getAseurbdia(),
			$keys[77] => $this->getAseurbint(),
			$keys[78] => $this->getAseurbsem(),
			$keys[79] => $this->getAseurb15d(),
			$keys[80] => $this->getElepag(),
			$keys[81] => $this->getElepar(),
			$keys[82] => $this->getGasbom(),
			$keys[83] => $this->getGasdir(),
			$keys[84] => $this->getToting(),
			$keys[85] => $this->getEgrviv(),
			$keys[86] => $this->getEgrtra(),
			$keys[87] => $this->getEgredu(),
			$keys[88] => $this->getEgrali(),
			$keys[89] => $this->getEgrtel(),
			$keys[90] => $this->getEgrluzase(),
			$keys[91] => $this->getEgragu(),
			$keys[92] => $this->getEgrgas(),
			$keys[93] => $this->getEgrotr(),
			$keys[94] => $this->getTotegr(),
			$keys[95] => $this->getDiasoc(),
			$keys[96] => $this->getTrasoc(),
			$keys[97] => $this->getRecome(),
			$keys[98] => $this->getObserv(),
			$keys[99] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtestsocecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setAtciudadanoId($value);
				break;
			case 2:
				$this->setAttipvivId($value);
				break;
			case 3:
				$this->setAttipprovivId($value);
				break;
			case 4:
				$this->setCarvivsal($value);
				break;
			case 5:
				$this->setCarvivcom($value);
				break;
			case 6:
				$this->setCarvivhab($value);
				break;
			case 7:
				$this->setCarvivcoc($value);
				break;
			case 8:
				$this->setCarvivban($value);
				break;
			case 9:
				$this->setCarvivpat($value);
				break;
			case 10:
				$this->setCarvivarever($value);
				break;
			case 11:
				$this->setCarvivpis($value);
				break;
			case 12:
				$this->setCarvivpar($value);
				break;
			case 13:
				$this->setCarvivtec($value);
				break;
			case 14:
				$this->setAnasoceco($value);
				break;
			case 15:
				$this->setAnafam($value);
				break;
			case 16:
				$this->setOtros($value);
				break;
			case 17:
				$this->setMotvis($value);
				break;
			case 18:
				$this->setParfri($value);
				break;
			case 19:
				$this->setParintext($value);
				break;
			case 20:
				$this->setObspar($value);
				break;
			case 21:
				$this->setParsinfri($value);
				break;
			case 22:
				$this->setParsinintext($value);
				break;
			case 23:
				$this->setParmad($value);
				break;
			case 24:
				$this->setParzin($value);
				break;
			case 25:
				$this->setParmatdes($value);
				break;
			case 26:
				$this->setSuecemrus($value);
				break;
			case 27:
				$this->setSuecempul($value);
				break;
			case 28:
				$this->setSuetie($value);
				break;
			case 29:
				$this->setSuecer($value);
				break;
			case 30:
				$this->setSuegra($value);
				break;
			case 31:
				$this->setSuepar($value);
				break;
			case 32:
				$this->setSuelin($value);
				break;
			case 33:
				$this->setObssue($value);
				break;
			case 34:
				$this->setTeczin($value);
				break;
			case 35:
				$this->setTecmatdes($value);
				break;
			case 36:
				$this->setTecace($value);
				break;
			case 37:
				$this->setTeccar($value);
				break;
			case 38:
				$this->setTectej($value);
				break;
			case 39:
				$this->setTecado($value);
				break;
			case 40:
				$this->setObstec($value);
				break;
			case 41:
				$this->setVivnroamb($value);
				break;
			case 42:
				$this->setVivnrohab($value);
				break;
			case 43:
				$this->setVivnroban($value);
				break;
			case 44:
				$this->setBandenviv($value);
				break;
			case 45:
				$this->setBanfueviv($value);
				break;
			case 46:
				$this->setVivlet($value);
				break;
			case 47:
				$this->setVivwat($value);
				break;
			case 48:
				$this->setVivotr($value);
				break;
			case 49:
				$this->setVivduc($value);
				break;
			case 50:
				$this->setVivlav($value);
				break;
			case 51:
				$this->setVivpar($value);
				break;
			case 52:
				$this->setVivpis($value);
				break;
			case 53:
				$this->setVivsal($value);
				break;
			case 54:
				$this->setVivcom($value);
				break;
			case 55:
				$this->setVivsalcom($value);
				break;
			case 56:
				$this->setVivcocdenviv($value);
				break;
			case 57:
				$this->setVivcocfueviv($value);
				break;
			case 58:
				$this->setViaaccvivasf($value);
				break;
			case 59:
				$this->setViaaccvivtie($value);
				break;
			case 60:
				$this->setViaaccvivesc($value);
				break;
			case 61:
				$this->setTramet($value);
				break;
			case 62:
				$this->setTrafer($value);
				break;
			case 63:
				$this->setTracam($value);
				break;
			case 64:
				$this->setTrajee($value);
				break;
			case 65:
				$this->setTralan($value);
				break;
			case 66:
				$this->setTrabar($value);
				break;
			case 67:
				$this->setTracami($value);
				break;
			case 68:
				$this->setAgufredia($value);
				break;
			case 69:
				$this->setAgufreint($value);
				break;
			case 70:
				$this->setAgufresem($value);
				break;
			case 71:
				$this->setAgufre15d($value);
				break;
			case 72:
				$this->setAguportub($value);
				break;
			case 73:
				$this->setAgupordep($value);
				break;
			case 74:
				$this->setAguserdes($value);
				break;
			case 75:
				$this->setAguserpoz($value);
				break;
			case 76:
				$this->setAseurbdia($value);
				break;
			case 77:
				$this->setAseurbint($value);
				break;
			case 78:
				$this->setAseurbsem($value);
				break;
			case 79:
				$this->setAseurb15d($value);
				break;
			case 80:
				$this->setElepag($value);
				break;
			case 81:
				$this->setElepar($value);
				break;
			case 82:
				$this->setGasbom($value);
				break;
			case 83:
				$this->setGasdir($value);
				break;
			case 84:
				$this->setToting($value);
				break;
			case 85:
				$this->setEgrviv($value);
				break;
			case 86:
				$this->setEgrtra($value);
				break;
			case 87:
				$this->setEgredu($value);
				break;
			case 88:
				$this->setEgrali($value);
				break;
			case 89:
				$this->setEgrtel($value);
				break;
			case 90:
				$this->setEgrluzase($value);
				break;
			case 91:
				$this->setEgragu($value);
				break;
			case 92:
				$this->setEgrgas($value);
				break;
			case 93:
				$this->setEgrotr($value);
				break;
			case 94:
				$this->setTotegr($value);
				break;
			case 95:
				$this->setDiasoc($value);
				break;
			case 96:
				$this->setTrasoc($value);
				break;
			case 97:
				$this->setRecome($value);
				break;
			case 98:
				$this->setObserv($value);
				break;
			case 99:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestsocecoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtciudadanoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAttipvivId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAttipprovivId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCarvivsal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCarvivcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCarvivhab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCarvivcoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCarvivban($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCarvivpat($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCarvivarever($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCarvivpis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCarvivpar($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCarvivtec($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAnasoceco($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAnafam($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setOtros($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMotvis($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setParfri($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setParintext($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setObspar($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setParsinfri($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setParsinintext($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setParmad($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setParzin($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setParmatdes($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setSuecemrus($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setSuecempul($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setSuetie($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setSuecer($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setSuegra($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setSuepar($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setSuelin($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setObssue($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setTeczin($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setTecmatdes($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTecace($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setTeccar($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setTectej($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setTecado($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setObstec($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setVivnroamb($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setVivnrohab($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setVivnroban($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setBandenviv($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setBanfueviv($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setVivlet($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setVivwat($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setVivotr($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setVivduc($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setVivlav($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setVivpar($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setVivpis($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setVivsal($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setVivcom($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setVivsalcom($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setVivcocdenviv($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setVivcocfueviv($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setViaaccvivasf($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setViaaccvivtie($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setViaaccvivesc($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setTramet($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setTrafer($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setTracam($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setTrajee($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setTralan($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setTrabar($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setTracami($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setAgufredia($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setAgufreint($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setAgufresem($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setAgufre15d($arr[$keys[71]]);
		if (array_key_exists($keys[72], $arr)) $this->setAguportub($arr[$keys[72]]);
		if (array_key_exists($keys[73], $arr)) $this->setAgupordep($arr[$keys[73]]);
		if (array_key_exists($keys[74], $arr)) $this->setAguserdes($arr[$keys[74]]);
		if (array_key_exists($keys[75], $arr)) $this->setAguserpoz($arr[$keys[75]]);
		if (array_key_exists($keys[76], $arr)) $this->setAseurbdia($arr[$keys[76]]);
		if (array_key_exists($keys[77], $arr)) $this->setAseurbint($arr[$keys[77]]);
		if (array_key_exists($keys[78], $arr)) $this->setAseurbsem($arr[$keys[78]]);
		if (array_key_exists($keys[79], $arr)) $this->setAseurb15d($arr[$keys[79]]);
		if (array_key_exists($keys[80], $arr)) $this->setElepag($arr[$keys[80]]);
		if (array_key_exists($keys[81], $arr)) $this->setElepar($arr[$keys[81]]);
		if (array_key_exists($keys[82], $arr)) $this->setGasbom($arr[$keys[82]]);
		if (array_key_exists($keys[83], $arr)) $this->setGasdir($arr[$keys[83]]);
		if (array_key_exists($keys[84], $arr)) $this->setToting($arr[$keys[84]]);
		if (array_key_exists($keys[85], $arr)) $this->setEgrviv($arr[$keys[85]]);
		if (array_key_exists($keys[86], $arr)) $this->setEgrtra($arr[$keys[86]]);
		if (array_key_exists($keys[87], $arr)) $this->setEgredu($arr[$keys[87]]);
		if (array_key_exists($keys[88], $arr)) $this->setEgrali($arr[$keys[88]]);
		if (array_key_exists($keys[89], $arr)) $this->setEgrtel($arr[$keys[89]]);
		if (array_key_exists($keys[90], $arr)) $this->setEgrluzase($arr[$keys[90]]);
		if (array_key_exists($keys[91], $arr)) $this->setEgragu($arr[$keys[91]]);
		if (array_key_exists($keys[92], $arr)) $this->setEgrgas($arr[$keys[92]]);
		if (array_key_exists($keys[93], $arr)) $this->setEgrotr($arr[$keys[93]]);
		if (array_key_exists($keys[94], $arr)) $this->setTotegr($arr[$keys[94]]);
		if (array_key_exists($keys[95], $arr)) $this->setDiasoc($arr[$keys[95]]);
		if (array_key_exists($keys[96], $arr)) $this->setTrasoc($arr[$keys[96]]);
		if (array_key_exists($keys[97], $arr)) $this->setRecome($arr[$keys[97]]);
		if (array_key_exists($keys[98], $arr)) $this->setObserv($arr[$keys[98]]);
		if (array_key_exists($keys[99], $arr)) $this->setId($arr[$keys[99]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtestsocecoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtestsocecoPeer::ATAYUDAS_ID)) $criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtestsocecoPeer::ATCIUDADANO_ID)) $criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->atciudadano_id);
		if ($this->isColumnModified(AtestsocecoPeer::ATTIPVIV_ID)) $criteria->add(AtestsocecoPeer::ATTIPVIV_ID, $this->attipviv_id);
		if ($this->isColumnModified(AtestsocecoPeer::ATTIPPROVIV_ID)) $criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->attipproviv_id);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVSAL)) $criteria->add(AtestsocecoPeer::CARVIVSAL, $this->carvivsal);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVCOM)) $criteria->add(AtestsocecoPeer::CARVIVCOM, $this->carvivcom);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVHAB)) $criteria->add(AtestsocecoPeer::CARVIVHAB, $this->carvivhab);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVCOC)) $criteria->add(AtestsocecoPeer::CARVIVCOC, $this->carvivcoc);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVBAN)) $criteria->add(AtestsocecoPeer::CARVIVBAN, $this->carvivban);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVPAT)) $criteria->add(AtestsocecoPeer::CARVIVPAT, $this->carvivpat);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVAREVER)) $criteria->add(AtestsocecoPeer::CARVIVAREVER, $this->carvivarever);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVPIS)) $criteria->add(AtestsocecoPeer::CARVIVPIS, $this->carvivpis);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVPAR)) $criteria->add(AtestsocecoPeer::CARVIVPAR, $this->carvivpar);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVTEC)) $criteria->add(AtestsocecoPeer::CARVIVTEC, $this->carvivtec);
		if ($this->isColumnModified(AtestsocecoPeer::ANASOCECO)) $criteria->add(AtestsocecoPeer::ANASOCECO, $this->anasoceco);
		if ($this->isColumnModified(AtestsocecoPeer::ANAFAM)) $criteria->add(AtestsocecoPeer::ANAFAM, $this->anafam);
		if ($this->isColumnModified(AtestsocecoPeer::OTROS)) $criteria->add(AtestsocecoPeer::OTROS, $this->otros);
		if ($this->isColumnModified(AtestsocecoPeer::MOTVIS)) $criteria->add(AtestsocecoPeer::MOTVIS, $this->motvis);
		if ($this->isColumnModified(AtestsocecoPeer::PARFRI)) $criteria->add(AtestsocecoPeer::PARFRI, $this->parfri);
		if ($this->isColumnModified(AtestsocecoPeer::PARINTEXT)) $criteria->add(AtestsocecoPeer::PARINTEXT, $this->parintext);
		if ($this->isColumnModified(AtestsocecoPeer::OBSPAR)) $criteria->add(AtestsocecoPeer::OBSPAR, $this->obspar);
		if ($this->isColumnModified(AtestsocecoPeer::PARSINFRI)) $criteria->add(AtestsocecoPeer::PARSINFRI, $this->parsinfri);
		if ($this->isColumnModified(AtestsocecoPeer::PARSININTEXT)) $criteria->add(AtestsocecoPeer::PARSININTEXT, $this->parsinintext);
		if ($this->isColumnModified(AtestsocecoPeer::PARMAD)) $criteria->add(AtestsocecoPeer::PARMAD, $this->parmad);
		if ($this->isColumnModified(AtestsocecoPeer::PARZIN)) $criteria->add(AtestsocecoPeer::PARZIN, $this->parzin);
		if ($this->isColumnModified(AtestsocecoPeer::PARMATDES)) $criteria->add(AtestsocecoPeer::PARMATDES, $this->parmatdes);
		if ($this->isColumnModified(AtestsocecoPeer::SUECEMRUS)) $criteria->add(AtestsocecoPeer::SUECEMRUS, $this->suecemrus);
		if ($this->isColumnModified(AtestsocecoPeer::SUECEMPUL)) $criteria->add(AtestsocecoPeer::SUECEMPUL, $this->suecempul);
		if ($this->isColumnModified(AtestsocecoPeer::SUETIE)) $criteria->add(AtestsocecoPeer::SUETIE, $this->suetie);
		if ($this->isColumnModified(AtestsocecoPeer::SUECER)) $criteria->add(AtestsocecoPeer::SUECER, $this->suecer);
		if ($this->isColumnModified(AtestsocecoPeer::SUEGRA)) $criteria->add(AtestsocecoPeer::SUEGRA, $this->suegra);
		if ($this->isColumnModified(AtestsocecoPeer::SUEPAR)) $criteria->add(AtestsocecoPeer::SUEPAR, $this->suepar);
		if ($this->isColumnModified(AtestsocecoPeer::SUELIN)) $criteria->add(AtestsocecoPeer::SUELIN, $this->suelin);
		if ($this->isColumnModified(AtestsocecoPeer::OBSSUE)) $criteria->add(AtestsocecoPeer::OBSSUE, $this->obssue);
		if ($this->isColumnModified(AtestsocecoPeer::TECZIN)) $criteria->add(AtestsocecoPeer::TECZIN, $this->teczin);
		if ($this->isColumnModified(AtestsocecoPeer::TECMATDES)) $criteria->add(AtestsocecoPeer::TECMATDES, $this->tecmatdes);
		if ($this->isColumnModified(AtestsocecoPeer::TECACE)) $criteria->add(AtestsocecoPeer::TECACE, $this->tecace);
		if ($this->isColumnModified(AtestsocecoPeer::TECCAR)) $criteria->add(AtestsocecoPeer::TECCAR, $this->teccar);
		if ($this->isColumnModified(AtestsocecoPeer::TECTEJ)) $criteria->add(AtestsocecoPeer::TECTEJ, $this->tectej);
		if ($this->isColumnModified(AtestsocecoPeer::TECADO)) $criteria->add(AtestsocecoPeer::TECADO, $this->tecado);
		if ($this->isColumnModified(AtestsocecoPeer::OBSTEC)) $criteria->add(AtestsocecoPeer::OBSTEC, $this->obstec);
		if ($this->isColumnModified(AtestsocecoPeer::VIVNROAMB)) $criteria->add(AtestsocecoPeer::VIVNROAMB, $this->vivnroamb);
		if ($this->isColumnModified(AtestsocecoPeer::VIVNROHAB)) $criteria->add(AtestsocecoPeer::VIVNROHAB, $this->vivnrohab);
		if ($this->isColumnModified(AtestsocecoPeer::VIVNROBAN)) $criteria->add(AtestsocecoPeer::VIVNROBAN, $this->vivnroban);
		if ($this->isColumnModified(AtestsocecoPeer::BANDENVIV)) $criteria->add(AtestsocecoPeer::BANDENVIV, $this->bandenviv);
		if ($this->isColumnModified(AtestsocecoPeer::BANFUEVIV)) $criteria->add(AtestsocecoPeer::BANFUEVIV, $this->banfueviv);
		if ($this->isColumnModified(AtestsocecoPeer::VIVLET)) $criteria->add(AtestsocecoPeer::VIVLET, $this->vivlet);
		if ($this->isColumnModified(AtestsocecoPeer::VIVWAT)) $criteria->add(AtestsocecoPeer::VIVWAT, $this->vivwat);
		if ($this->isColumnModified(AtestsocecoPeer::VIVOTR)) $criteria->add(AtestsocecoPeer::VIVOTR, $this->vivotr);
		if ($this->isColumnModified(AtestsocecoPeer::VIVDUC)) $criteria->add(AtestsocecoPeer::VIVDUC, $this->vivduc);
		if ($this->isColumnModified(AtestsocecoPeer::VIVLAV)) $criteria->add(AtestsocecoPeer::VIVLAV, $this->vivlav);
		if ($this->isColumnModified(AtestsocecoPeer::VIVPAR)) $criteria->add(AtestsocecoPeer::VIVPAR, $this->vivpar);
		if ($this->isColumnModified(AtestsocecoPeer::VIVPIS)) $criteria->add(AtestsocecoPeer::VIVPIS, $this->vivpis);
		if ($this->isColumnModified(AtestsocecoPeer::VIVSAL)) $criteria->add(AtestsocecoPeer::VIVSAL, $this->vivsal);
		if ($this->isColumnModified(AtestsocecoPeer::VIVCOM)) $criteria->add(AtestsocecoPeer::VIVCOM, $this->vivcom);
		if ($this->isColumnModified(AtestsocecoPeer::VIVSALCOM)) $criteria->add(AtestsocecoPeer::VIVSALCOM, $this->vivsalcom);
		if ($this->isColumnModified(AtestsocecoPeer::VIVCOCDENVIV)) $criteria->add(AtestsocecoPeer::VIVCOCDENVIV, $this->vivcocdenviv);
		if ($this->isColumnModified(AtestsocecoPeer::VIVCOCFUEVIV)) $criteria->add(AtestsocecoPeer::VIVCOCFUEVIV, $this->vivcocfueviv);
		if ($this->isColumnModified(AtestsocecoPeer::VIAACCVIVASF)) $criteria->add(AtestsocecoPeer::VIAACCVIVASF, $this->viaaccvivasf);
		if ($this->isColumnModified(AtestsocecoPeer::VIAACCVIVTIE)) $criteria->add(AtestsocecoPeer::VIAACCVIVTIE, $this->viaaccvivtie);
		if ($this->isColumnModified(AtestsocecoPeer::VIAACCVIVESC)) $criteria->add(AtestsocecoPeer::VIAACCVIVESC, $this->viaaccvivesc);
		if ($this->isColumnModified(AtestsocecoPeer::TRAMET)) $criteria->add(AtestsocecoPeer::TRAMET, $this->tramet);
		if ($this->isColumnModified(AtestsocecoPeer::TRAFER)) $criteria->add(AtestsocecoPeer::TRAFER, $this->trafer);
		if ($this->isColumnModified(AtestsocecoPeer::TRACAM)) $criteria->add(AtestsocecoPeer::TRACAM, $this->tracam);
		if ($this->isColumnModified(AtestsocecoPeer::TRAJEE)) $criteria->add(AtestsocecoPeer::TRAJEE, $this->trajee);
		if ($this->isColumnModified(AtestsocecoPeer::TRALAN)) $criteria->add(AtestsocecoPeer::TRALAN, $this->tralan);
		if ($this->isColumnModified(AtestsocecoPeer::TRABAR)) $criteria->add(AtestsocecoPeer::TRABAR, $this->trabar);
		if ($this->isColumnModified(AtestsocecoPeer::TRACAMI)) $criteria->add(AtestsocecoPeer::TRACAMI, $this->tracami);
		if ($this->isColumnModified(AtestsocecoPeer::AGUFREDIA)) $criteria->add(AtestsocecoPeer::AGUFREDIA, $this->agufredia);
		if ($this->isColumnModified(AtestsocecoPeer::AGUFREINT)) $criteria->add(AtestsocecoPeer::AGUFREINT, $this->agufreint);
		if ($this->isColumnModified(AtestsocecoPeer::AGUFRESEM)) $criteria->add(AtestsocecoPeer::AGUFRESEM, $this->agufresem);
		if ($this->isColumnModified(AtestsocecoPeer::AGUFRE15D)) $criteria->add(AtestsocecoPeer::AGUFRE15D, $this->agufre15d);
		if ($this->isColumnModified(AtestsocecoPeer::AGUPORTUB)) $criteria->add(AtestsocecoPeer::AGUPORTUB, $this->aguportub);
		if ($this->isColumnModified(AtestsocecoPeer::AGUPORDEP)) $criteria->add(AtestsocecoPeer::AGUPORDEP, $this->agupordep);
		if ($this->isColumnModified(AtestsocecoPeer::AGUSERDES)) $criteria->add(AtestsocecoPeer::AGUSERDES, $this->aguserdes);
		if ($this->isColumnModified(AtestsocecoPeer::AGUSERPOZ)) $criteria->add(AtestsocecoPeer::AGUSERPOZ, $this->aguserpoz);
		if ($this->isColumnModified(AtestsocecoPeer::ASEURBDIA)) $criteria->add(AtestsocecoPeer::ASEURBDIA, $this->aseurbdia);
		if ($this->isColumnModified(AtestsocecoPeer::ASEURBINT)) $criteria->add(AtestsocecoPeer::ASEURBINT, $this->aseurbint);
		if ($this->isColumnModified(AtestsocecoPeer::ASEURBSEM)) $criteria->add(AtestsocecoPeer::ASEURBSEM, $this->aseurbsem);
		if ($this->isColumnModified(AtestsocecoPeer::ASEURB15D)) $criteria->add(AtestsocecoPeer::ASEURB15D, $this->aseurb15d);
		if ($this->isColumnModified(AtestsocecoPeer::ELEPAG)) $criteria->add(AtestsocecoPeer::ELEPAG, $this->elepag);
		if ($this->isColumnModified(AtestsocecoPeer::ELEPAR)) $criteria->add(AtestsocecoPeer::ELEPAR, $this->elepar);
		if ($this->isColumnModified(AtestsocecoPeer::GASBOM)) $criteria->add(AtestsocecoPeer::GASBOM, $this->gasbom);
		if ($this->isColumnModified(AtestsocecoPeer::GASDIR)) $criteria->add(AtestsocecoPeer::GASDIR, $this->gasdir);
		if ($this->isColumnModified(AtestsocecoPeer::TOTING)) $criteria->add(AtestsocecoPeer::TOTING, $this->toting);
		if ($this->isColumnModified(AtestsocecoPeer::EGRVIV)) $criteria->add(AtestsocecoPeer::EGRVIV, $this->egrviv);
		if ($this->isColumnModified(AtestsocecoPeer::EGRTRA)) $criteria->add(AtestsocecoPeer::EGRTRA, $this->egrtra);
		if ($this->isColumnModified(AtestsocecoPeer::EGREDU)) $criteria->add(AtestsocecoPeer::EGREDU, $this->egredu);
		if ($this->isColumnModified(AtestsocecoPeer::EGRALI)) $criteria->add(AtestsocecoPeer::EGRALI, $this->egrali);
		if ($this->isColumnModified(AtestsocecoPeer::EGRTEL)) $criteria->add(AtestsocecoPeer::EGRTEL, $this->egrtel);
		if ($this->isColumnModified(AtestsocecoPeer::EGRLUZASE)) $criteria->add(AtestsocecoPeer::EGRLUZASE, $this->egrluzase);
		if ($this->isColumnModified(AtestsocecoPeer::EGRAGU)) $criteria->add(AtestsocecoPeer::EGRAGU, $this->egragu);
		if ($this->isColumnModified(AtestsocecoPeer::EGRGAS)) $criteria->add(AtestsocecoPeer::EGRGAS, $this->egrgas);
		if ($this->isColumnModified(AtestsocecoPeer::EGROTR)) $criteria->add(AtestsocecoPeer::EGROTR, $this->egrotr);
		if ($this->isColumnModified(AtestsocecoPeer::TOTEGR)) $criteria->add(AtestsocecoPeer::TOTEGR, $this->totegr);
		if ($this->isColumnModified(AtestsocecoPeer::DIASOC)) $criteria->add(AtestsocecoPeer::DIASOC, $this->diasoc);
		if ($this->isColumnModified(AtestsocecoPeer::TRASOC)) $criteria->add(AtestsocecoPeer::TRASOC, $this->trasoc);
		if ($this->isColumnModified(AtestsocecoPeer::RECOME)) $criteria->add(AtestsocecoPeer::RECOME, $this->recome);
		if ($this->isColumnModified(AtestsocecoPeer::OBSERV)) $criteria->add(AtestsocecoPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(AtestsocecoPeer::ID)) $criteria->add(AtestsocecoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtestsocecoPeer::DATABASE_NAME);

		$criteria->add(AtestsocecoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAtayudasId($this->atayudas_id);

		$copyObj->setAtciudadanoId($this->atciudadano_id);

		$copyObj->setAttipvivId($this->attipviv_id);

		$copyObj->setAttipprovivId($this->attipproviv_id);

		$copyObj->setCarvivsal($this->carvivsal);

		$copyObj->setCarvivcom($this->carvivcom);

		$copyObj->setCarvivhab($this->carvivhab);

		$copyObj->setCarvivcoc($this->carvivcoc);

		$copyObj->setCarvivban($this->carvivban);

		$copyObj->setCarvivpat($this->carvivpat);

		$copyObj->setCarvivarever($this->carvivarever);

		$copyObj->setCarvivpis($this->carvivpis);

		$copyObj->setCarvivpar($this->carvivpar);

		$copyObj->setCarvivtec($this->carvivtec);

		$copyObj->setAnasoceco($this->anasoceco);

		$copyObj->setAnafam($this->anafam);

		$copyObj->setOtros($this->otros);

		$copyObj->setMotvis($this->motvis);

		$copyObj->setParfri($this->parfri);

		$copyObj->setParintext($this->parintext);

		$copyObj->setObspar($this->obspar);

		$copyObj->setParsinfri($this->parsinfri);

		$copyObj->setParsinintext($this->parsinintext);

		$copyObj->setParmad($this->parmad);

		$copyObj->setParzin($this->parzin);

		$copyObj->setParmatdes($this->parmatdes);

		$copyObj->setSuecemrus($this->suecemrus);

		$copyObj->setSuecempul($this->suecempul);

		$copyObj->setSuetie($this->suetie);

		$copyObj->setSuecer($this->suecer);

		$copyObj->setSuegra($this->suegra);

		$copyObj->setSuepar($this->suepar);

		$copyObj->setSuelin($this->suelin);

		$copyObj->setObssue($this->obssue);

		$copyObj->setTeczin($this->teczin);

		$copyObj->setTecmatdes($this->tecmatdes);

		$copyObj->setTecace($this->tecace);

		$copyObj->setTeccar($this->teccar);

		$copyObj->setTectej($this->tectej);

		$copyObj->setTecado($this->tecado);

		$copyObj->setObstec($this->obstec);

		$copyObj->setVivnroamb($this->vivnroamb);

		$copyObj->setVivnrohab($this->vivnrohab);

		$copyObj->setVivnroban($this->vivnroban);

		$copyObj->setBandenviv($this->bandenviv);

		$copyObj->setBanfueviv($this->banfueviv);

		$copyObj->setVivlet($this->vivlet);

		$copyObj->setVivwat($this->vivwat);

		$copyObj->setVivotr($this->vivotr);

		$copyObj->setVivduc($this->vivduc);

		$copyObj->setVivlav($this->vivlav);

		$copyObj->setVivpar($this->vivpar);

		$copyObj->setVivpis($this->vivpis);

		$copyObj->setVivsal($this->vivsal);

		$copyObj->setVivcom($this->vivcom);

		$copyObj->setVivsalcom($this->vivsalcom);

		$copyObj->setVivcocdenviv($this->vivcocdenviv);

		$copyObj->setVivcocfueviv($this->vivcocfueviv);

		$copyObj->setViaaccvivasf($this->viaaccvivasf);

		$copyObj->setViaaccvivtie($this->viaaccvivtie);

		$copyObj->setViaaccvivesc($this->viaaccvivesc);

		$copyObj->setTramet($this->tramet);

		$copyObj->setTrafer($this->trafer);

		$copyObj->setTracam($this->tracam);

		$copyObj->setTrajee($this->trajee);

		$copyObj->setTralan($this->tralan);

		$copyObj->setTrabar($this->trabar);

		$copyObj->setTracami($this->tracami);

		$copyObj->setAgufredia($this->agufredia);

		$copyObj->setAgufreint($this->agufreint);

		$copyObj->setAgufresem($this->agufresem);

		$copyObj->setAgufre15d($this->agufre15d);

		$copyObj->setAguportub($this->aguportub);

		$copyObj->setAgupordep($this->agupordep);

		$copyObj->setAguserdes($this->aguserdes);

		$copyObj->setAguserpoz($this->aguserpoz);

		$copyObj->setAseurbdia($this->aseurbdia);

		$copyObj->setAseurbint($this->aseurbint);

		$copyObj->setAseurbsem($this->aseurbsem);

		$copyObj->setAseurb15d($this->aseurb15d);

		$copyObj->setElepag($this->elepag);

		$copyObj->setElepar($this->elepar);

		$copyObj->setGasbom($this->gasbom);

		$copyObj->setGasdir($this->gasdir);

		$copyObj->setToting($this->toting);

		$copyObj->setEgrviv($this->egrviv);

		$copyObj->setEgrtra($this->egrtra);

		$copyObj->setEgredu($this->egredu);

		$copyObj->setEgrali($this->egrali);

		$copyObj->setEgrtel($this->egrtel);

		$copyObj->setEgrluzase($this->egrluzase);

		$copyObj->setEgragu($this->egragu);

		$copyObj->setEgrgas($this->egrgas);

		$copyObj->setEgrotr($this->egrotr);

		$copyObj->setTotegr($this->totegr);

		$copyObj->setDiasoc($this->diasoc);

		$copyObj->setTrasoc($this->trasoc);

		$copyObj->setRecome($this->recome);

		$copyObj->setObserv($this->observ);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AtestsocecoPeer();
		}
		return self::$peer;
	}

	
	public function setAtayudas($v)
	{


		if ($v === null) {
			$this->setAtayudasId(NULL);
		} else {
			$this->setAtayudasId($v->getId());
		}


		$this->aAtayudas = $v;
	}


	
	public function getAtayudas($con = null)
	{
		if ($this->aAtayudas === null && ($this->atayudas_id !== null)) {
						include_once 'lib/model/om/BaseAtayudasPeer.php';

			$this->aAtayudas = AtayudasPeer::retrieveByPK($this->atayudas_id, $con);

			
		}
		return $this->aAtayudas;
	}

	
	public function setAtciudadano($v)
	{


		if ($v === null) {
			$this->setAtciudadanoId(NULL);
		} else {
			$this->setAtciudadanoId($v->getId());
		}


		$this->aAtciudadano = $v;
	}


	
	public function getAtciudadano($con = null)
	{
		if ($this->aAtciudadano === null && ($this->atciudadano_id !== null)) {
						include_once 'lib/model/om/BaseAtciudadanoPeer.php';

			$this->aAtciudadano = AtciudadanoPeer::retrieveByPK($this->atciudadano_id, $con);

			
		}
		return $this->aAtciudadano;
	}

	
	public function setAttipviv($v)
	{


		if ($v === null) {
			$this->setAttipvivId(NULL);
		} else {
			$this->setAttipvivId($v->getId());
		}


		$this->aAttipviv = $v;
	}


	
	public function getAttipviv($con = null)
	{
		if ($this->aAttipviv === null && ($this->attipviv_id !== null)) {
						include_once 'lib/model/om/BaseAttipvivPeer.php';

			$this->aAttipviv = AttipvivPeer::retrieveByPK($this->attipviv_id, $con);

			
		}
		return $this->aAttipviv;
	}

	
	public function setAttipproviv($v)
	{


		if ($v === null) {
			$this->setAttipprovivId(NULL);
		} else {
			$this->setAttipprovivId($v->getId());
		}


		$this->aAttipproviv = $v;
	}


	
	public function getAttipproviv($con = null)
	{
		if ($this->aAttipproviv === null && ($this->attipproviv_id !== null)) {
						include_once 'lib/model/om/BaseAttipprovivPeer.php';

			$this->aAttipproviv = AttipprovivPeer::retrieveByPK($this->attipproviv_id, $con);

			
		}
		return $this->aAttipproviv;
	}

} 