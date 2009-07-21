<?php


abstract class BaseNphojint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $cedemp;


	
	protected $numcon;


	
	protected $edociv;


	
	protected $nacemp;


	
	protected $sexemp;


	
	protected $fecnac;


	
	protected $edaemp;


	
	protected $lugnac;


	
	protected $dirhab;


	
	protected $codciu;


	
	protected $telhab;


	
	protected $celemp;


	
	protected $emaemp;


	
	protected $codpos;


	
	protected $talpan;


	
	protected $talcam;


	
	protected $talcal;


	
	protected $derzur;


	
	protected $fecing;


	
	protected $fecret;


	
	protected $fecrei;


	
	protected $fecadmpub;


	
	protected $staemp;


	
	protected $fotemp;


	
	protected $numsso;


	
	protected $numpolseg;


	
	protected $feccotsso;


	
	protected $anoadmpub;


	
	protected $codtippag;


	
	protected $codban;


	
	protected $tipcue;


	
	protected $numcue;


	
	protected $obsemp;


	
	protected $tiefid;


	
	protected $grulab;


	
	protected $gruotr;


	
	protected $traslado;


	
	protected $traotr;


	
	protected $tipviv;


	
	protected $vivotr;


	
	protected $forten;


	
	protected $tenotr;


	
	protected $sercon;


	
	protected $dirotr;


	
	protected $telotr;


	
	protected $codpai;


	
	protected $codpa2;


	
	protected $codest;


	
	protected $codes2;


	
	protected $codci2;


	
	protected $codrac;


	
	protected $codniv;


	
	protected $telha2;


	
	protected $telot2;


	
	protected $codprofes;


	
	protected $hcmexo;


	
	protected $codbanfid;


	
	protected $codbanlph;


	
	protected $numcuefid;


	
	protected $numcuelph;


	
	protected $codempant;


	
	protected $grusan;


	
	protected $obsgen;


	
	protected $codregpai;


	
	protected $codregest;


	
	protected $codregciu;


	
	protected $fecgra;


	
	protected $grusangre;


	
	protected $numgaceta;


	
	protected $fecgaceta;


	
	protected $diagra;


	
	protected $mesgra;


	
	protected $anogra;


	
	protected $temporal;


	
	protected $detexp;


	
	protected $numexp;


	
	protected $modpagcestic;


	
	protected $codret;


	
	protected $situac;


	
	protected $profes;


	
	protected $codnivedu;


	
	protected $ubifis;


	
	protected $tipcueaho;


	
	protected $numcueaho;


	
	protected $feccoracu;


	
	protected $capactacu;


	
	protected $intacu;


	
	protected $antacu;


	
	protected $diaacu;


	
	protected $diaadiacu;


	
	protected $id;

	
	protected $collNphojintincs;

	
	protected $lastNphojintincCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getNumcon()
  {

    return trim($this->numcon);

  }
  
  public function getEdociv()
  {

    return trim($this->edociv);

  }
  
  public function getNacemp()
  {

    return trim($this->nacemp);

  }
  
  public function getSexemp()
  {

    return trim($this->sexemp);

  }
  
  public function getFecnac($format = 'Y-m-d')
  {

    if ($this->fecnac === null || $this->fecnac === '') {
      return null;
    } elseif (!is_int($this->fecnac)) {
            $ts = adodb_strtotime($this->fecnac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
      }
    } else {
      $ts = $this->fecnac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEdaemp($val=false)
  {

    if($val) return number_format($this->edaemp,2,',','.');
    else return $this->edaemp;

  }
  
  public function getLugnac()
  {

    return trim($this->lugnac);

  }
  
  public function getDirhab()
  {

    return trim($this->dirhab);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getTelhab()
  {

    return trim($this->telhab);

  }
  
  public function getCelemp()
  {

    return trim($this->celemp);

  }
  
  public function getEmaemp()
  {

    return trim($this->emaemp);

  }
  
  public function getCodpos()
  {

    return trim($this->codpos);

  }
  
  public function getTalpan()
  {

    return trim($this->talpan);

  }
  
  public function getTalcam()
  {

    return trim($this->talcam);

  }
  
  public function getTalcal($val=false)
  {

    if($val) return number_format($this->talcal,2,',','.');
    else return $this->talcal;

  }
  
  public function getDerzur()
  {

    return trim($this->derzur);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecret($format = 'Y-m-d')
  {

    if ($this->fecret === null || $this->fecret === '') {
      return null;
    } elseif (!is_int($this->fecret)) {
            $ts = adodb_strtotime($this->fecret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecret] as date/time value: " . var_export($this->fecret, true));
      }
    } else {
      $ts = $this->fecret;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecrei($format = 'Y-m-d')
  {

    if ($this->fecrei === null || $this->fecrei === '') {
      return null;
    } elseif (!is_int($this->fecrei)) {
            $ts = adodb_strtotime($this->fecrei);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrei] as date/time value: " . var_export($this->fecrei, true));
      }
    } else {
      $ts = $this->fecrei;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecadmpub($format = 'Y-m-d')
  {

    if ($this->fecadmpub === null || $this->fecadmpub === '') {
      return null;
    } elseif (!is_int($this->fecadmpub)) {
            $ts = adodb_strtotime($this->fecadmpub);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadmpub] as date/time value: " . var_export($this->fecadmpub, true));
      }
    } else {
      $ts = $this->fecadmpub;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStaemp()
  {

    return trim($this->staemp);

  }
  
  public function getFotemp()
  {

    return trim($this->fotemp);

  }
  
  public function getNumsso()
  {

    return trim($this->numsso);

  }
  
  public function getNumpolseg()
  {

    return trim($this->numpolseg);

  }
  
  public function getFeccotsso($format = 'Y-m-d')
  {

    if ($this->feccotsso === null || $this->feccotsso === '') {
      return null;
    } elseif (!is_int($this->feccotsso)) {
            $ts = adodb_strtotime($this->feccotsso);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccotsso] as date/time value: " . var_export($this->feccotsso, true));
      }
    } else {
      $ts = $this->feccotsso;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnoadmpub($val=false)
  {

    if($val) return number_format($this->anoadmpub,2,',','.');
    else return $this->anoadmpub;

  }
  
  public function getCodtippag()
  {

    return trim($this->codtippag);

  }
  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getTipcue()
  {

    return trim($this->tipcue);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getObsemp()
  {

    return trim($this->obsemp);

  }
  
  public function getTiefid()
  {

    return trim($this->tiefid);

  }
  
  public function getGrulab()
  {

    return trim($this->grulab);

  }
  
  public function getGruotr()
  {

    return trim($this->gruotr);

  }
  
  public function getTraslado()
  {

    return trim($this->traslado);

  }
  
  public function getTraotr()
  {

    return trim($this->traotr);

  }
  
  public function getTipviv()
  {

    return trim($this->tipviv);

  }
  
  public function getVivotr()
  {

    return trim($this->vivotr);

  }
  
  public function getForten()
  {

    return trim($this->forten);

  }
  
  public function getTenotr()
  {

    return trim($this->tenotr);

  }
  
  public function getSercon()
  {

    return trim($this->sercon);

  }
  
  public function getDirotr()
  {

    return trim($this->dirotr);

  }
  
  public function getTelotr()
  {

    return trim($this->telotr);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCodpa2()
  {

    return trim($this->codpa2);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodes2()
  {

    return trim($this->codes2);

  }
  
  public function getCodci2()
  {

    return trim($this->codci2);

  }
  
  public function getCodrac()
  {

    return trim($this->codrac);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getTelha2()
  {

    return trim($this->telha2);

  }
  
  public function getTelot2()
  {

    return trim($this->telot2);

  }
  
  public function getCodprofes()
  {

    return trim($this->codprofes);

  }
  
  public function getHcmexo()
  {

    return trim($this->hcmexo);

  }
  
  public function getCodbanfid()
  {

    return trim($this->codbanfid);

  }
  
  public function getCodbanlph()
  {

    return trim($this->codbanlph);

  }
  
  public function getNumcuefid()
  {

    return trim($this->numcuefid);

  }
  
  public function getNumcuelph()
  {

    return trim($this->numcuelph);

  }
  
  public function getCodempant()
  {

    return trim($this->codempant);

  }
  
  public function getGrusan()
  {

    return trim($this->grusan);

  }
  
  public function getObsgen()
  {

    return trim($this->obsgen);

  }
  
  public function getCodregpai()
  {

    return trim($this->codregpai);

  }
  
  public function getCodregest()
  {

    return trim($this->codregest);

  }
  
  public function getCodregciu()
  {

    return trim($this->codregciu);

  }
  
  public function getFecgra($format = 'Y-m-d')
  {

    if ($this->fecgra === null || $this->fecgra === '') {
      return null;
    } elseif (!is_int($this->fecgra)) {
            $ts = adodb_strtotime($this->fecgra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgra] as date/time value: " . var_export($this->fecgra, true));
      }
    } else {
      $ts = $this->fecgra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getGrusangre()
  {

    return trim($this->grusangre);

  }
  
  public function getNumgaceta()
  {

    return trim($this->numgaceta);

  }
  
  public function getFecgaceta($format = 'Y-m-d')
  {

    if ($this->fecgaceta === null || $this->fecgaceta === '') {
      return null;
    } elseif (!is_int($this->fecgaceta)) {
            $ts = adodb_strtotime($this->fecgaceta);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgaceta] as date/time value: " . var_export($this->fecgaceta, true));
      }
    } else {
      $ts = $this->fecgaceta;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDiagra()
  {

    return trim($this->diagra);

  }
  
  public function getMesgra()
  {

    return trim($this->mesgra);

  }
  
  public function getAnogra()
  {

    return trim($this->anogra);

  }
  
  public function getTemporal($val=false)
  {

    if($val) return number_format($this->temporal,2,',','.');
    else return $this->temporal;

  }
  
  public function getDetexp()
  {

    return trim($this->detexp);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getModpagcestic()
  {

    return trim($this->modpagcestic);

  }
  
  public function getCodret()
  {

    return trim($this->codret);

  }
  
  public function getSituac()
  {

    return trim($this->situac);

  }
  
  public function getProfes()
  {

    return trim($this->profes);

  }
  
  public function getCodnivedu()
  {

    return trim($this->codnivedu);

  }
  
  public function getUbifis()
  {

    return trim($this->ubifis);

  }
  
  public function getTipcueaho()
  {

    return trim($this->tipcueaho);

  }
  
  public function getNumcueaho()
  {

    return trim($this->numcueaho);

  }
  
  public function getFeccoracu($format = 'Y-m-d')
  {

    if ($this->feccoracu === null || $this->feccoracu === '') {
      return null;
    } elseif (!is_int($this->feccoracu)) {
            $ts = adodb_strtotime($this->feccoracu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccoracu] as date/time value: " . var_export($this->feccoracu, true));
      }
    } else {
      $ts = $this->feccoracu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCapactacu($val=false)
  {

    if($val) return number_format($this->capactacu,2,',','.');
    else return $this->capactacu;

  }
  
  public function getIntacu($val=false)
  {

    if($val) return number_format($this->intacu,2,',','.');
    else return $this->intacu;

  }
  
  public function getAntacu($val=false)
  {

    if($val) return number_format($this->antacu,2,',','.');
    else return $this->antacu;

  }
  
  public function getDiaacu()
  {

    return $this->diaacu;

  }
  
  public function getDiaadiacu()
  {

    return $this->diaadiacu;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NphojintPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = NphojintPeer::NOMEMP;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = NphojintPeer::CEDEMP;
      }
  
	} 
	
	public function setNumcon($v)
	{

    if ($this->numcon !== $v) {
        $this->numcon = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMCON;
      }
  
	} 
	
	public function setEdociv($v)
	{

    if ($this->edociv !== $v) {
        $this->edociv = $v;
        $this->modifiedColumns[] = NphojintPeer::EDOCIV;
      }
  
	} 
	
	public function setNacemp($v)
	{

    if ($this->nacemp !== $v) {
        $this->nacemp = $v;
        $this->modifiedColumns[] = NphojintPeer::NACEMP;
      }
  
	} 
	
	public function setSexemp($v)
	{

    if ($this->sexemp !== $v) {
        $this->sexemp = $v;
        $this->modifiedColumns[] = NphojintPeer::SEXEMP;
      }
  
	} 
	
	public function setFecnac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnac !== $ts) {
      $this->fecnac = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECNAC;
    }

	} 
	
	public function setEdaemp($v)
	{

    if ($this->edaemp !== $v) {
        $this->edaemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::EDAEMP;
      }
  
	} 
	
	public function setLugnac($v)
	{

    if ($this->lugnac !== $v) {
        $this->lugnac = $v;
        $this->modifiedColumns[] = NphojintPeer::LUGNAC;
      }
  
	} 
	
	public function setDirhab($v)
	{

    if ($this->dirhab !== $v) {
        $this->dirhab = $v;
        $this->modifiedColumns[] = NphojintPeer::DIRHAB;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = NphojintPeer::CODCIU;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = NphojintPeer::TELHAB;
      }
  
	} 
	
	public function setCelemp($v)
	{

    if ($this->celemp !== $v) {
        $this->celemp = $v;
        $this->modifiedColumns[] = NphojintPeer::CELEMP;
      }
  
	} 
	
	public function setEmaemp($v)
	{

    if ($this->emaemp !== $v) {
        $this->emaemp = $v;
        $this->modifiedColumns[] = NphojintPeer::EMAEMP;
      }
  
	} 
	
	public function setCodpos($v)
	{

    if ($this->codpos !== $v) {
        $this->codpos = $v;
        $this->modifiedColumns[] = NphojintPeer::CODPOS;
      }
  
	} 
	
	public function setTalpan($v)
	{

    if ($this->talpan !== $v) {
        $this->talpan = $v;
        $this->modifiedColumns[] = NphojintPeer::TALPAN;
      }
  
	} 
	
	public function setTalcam($v)
	{

    if ($this->talcam !== $v) {
        $this->talcam = $v;
        $this->modifiedColumns[] = NphojintPeer::TALCAM;
      }
  
	} 
	
	public function setTalcal($v)
	{

    if ($this->talcal !== $v) {
        $this->talcal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::TALCAL;
      }
  
	} 
	
	public function setDerzur($v)
	{

    if ($this->derzur !== $v) {
        $this->derzur = $v;
        $this->modifiedColumns[] = NphojintPeer::DERZUR;
      }
  
	} 
	
	public function setFecing($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECING;
    }

	} 
	
	public function setFecret($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecret !== $ts) {
      $this->fecret = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECRET;
    }

	} 
	
	public function setFecrei($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrei] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrei !== $ts) {
      $this->fecrei = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECREI;
    }

	} 
	
	public function setFecadmpub($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadmpub] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadmpub !== $ts) {
      $this->fecadmpub = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECADMPUB;
    }

	} 
	
	public function setStaemp($v)
	{

    if ($this->staemp !== $v) {
        $this->staemp = $v;
        $this->modifiedColumns[] = NphojintPeer::STAEMP;
      }
  
	} 
	
	public function setFotemp($v)
	{

    if ($this->fotemp !== $v) {
        $this->fotemp = $v;
        $this->modifiedColumns[] = NphojintPeer::FOTEMP;
      }
  
	} 
	
	public function setNumsso($v)
	{

    if ($this->numsso !== $v) {
        $this->numsso = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMSSO;
      }
  
	} 
	
	public function setNumpolseg($v)
	{

    if ($this->numpolseg !== $v) {
        $this->numpolseg = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMPOLSEG;
      }
  
	} 
	
	public function setFeccotsso($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccotsso] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccotsso !== $ts) {
      $this->feccotsso = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECCOTSSO;
    }

	} 
	
	public function setAnoadmpub($v)
	{

    if ($this->anoadmpub !== $v) {
        $this->anoadmpub = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::ANOADMPUB;
      }
  
	} 
	
	public function setCodtippag($v)
	{

    if ($this->codtippag !== $v) {
        $this->codtippag = $v;
        $this->modifiedColumns[] = NphojintPeer::CODTIPPAG;
      }
  
	} 
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = NphojintPeer::CODBAN;
      }
  
	} 
	
	public function setTipcue($v)
	{

    if ($this->tipcue !== $v) {
        $this->tipcue = $v;
        $this->modifiedColumns[] = NphojintPeer::TIPCUE;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMCUE;
      }
  
	} 
	
	public function setObsemp($v)
	{

    if ($this->obsemp !== $v) {
        $this->obsemp = $v;
        $this->modifiedColumns[] = NphojintPeer::OBSEMP;
      }
  
	} 
	
	public function setTiefid($v)
	{

    if ($this->tiefid !== $v) {
        $this->tiefid = $v;
        $this->modifiedColumns[] = NphojintPeer::TIEFID;
      }
  
	} 
	
	public function setGrulab($v)
	{

    if ($this->grulab !== $v) {
        $this->grulab = $v;
        $this->modifiedColumns[] = NphojintPeer::GRULAB;
      }
  
	} 
	
	public function setGruotr($v)
	{

    if ($this->gruotr !== $v) {
        $this->gruotr = $v;
        $this->modifiedColumns[] = NphojintPeer::GRUOTR;
      }
  
	} 
	
	public function setTraslado($v)
	{

    if ($this->traslado !== $v) {
        $this->traslado = $v;
        $this->modifiedColumns[] = NphojintPeer::TRASLADO;
      }
  
	} 
	
	public function setTraotr($v)
	{

    if ($this->traotr !== $v) {
        $this->traotr = $v;
        $this->modifiedColumns[] = NphojintPeer::TRAOTR;
      }
  
	} 
	
	public function setTipviv($v)
	{

    if ($this->tipviv !== $v) {
        $this->tipviv = $v;
        $this->modifiedColumns[] = NphojintPeer::TIPVIV;
      }
  
	} 
	
	public function setVivotr($v)
	{

    if ($this->vivotr !== $v) {
        $this->vivotr = $v;
        $this->modifiedColumns[] = NphojintPeer::VIVOTR;
      }
  
	} 
	
	public function setForten($v)
	{

    if ($this->forten !== $v) {
        $this->forten = $v;
        $this->modifiedColumns[] = NphojintPeer::FORTEN;
      }
  
	} 
	
	public function setTenotr($v)
	{

    if ($this->tenotr !== $v) {
        $this->tenotr = $v;
        $this->modifiedColumns[] = NphojintPeer::TENOTR;
      }
  
	} 
	
	public function setSercon($v)
	{

    if ($this->sercon !== $v) {
        $this->sercon = $v;
        $this->modifiedColumns[] = NphojintPeer::SERCON;
      }
  
	} 
	
	public function setDirotr($v)
	{

    if ($this->dirotr !== $v) {
        $this->dirotr = $v;
        $this->modifiedColumns[] = NphojintPeer::DIROTR;
      }
  
	} 
	
	public function setTelotr($v)
	{

    if ($this->telotr !== $v) {
        $this->telotr = $v;
        $this->modifiedColumns[] = NphojintPeer::TELOTR;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = NphojintPeer::CODPAI;
      }
  
	} 
	
	public function setCodpa2($v)
	{

    if ($this->codpa2 !== $v) {
        $this->codpa2 = $v;
        $this->modifiedColumns[] = NphojintPeer::CODPA2;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = NphojintPeer::CODEST;
      }
  
	} 
	
	public function setCodes2($v)
	{

    if ($this->codes2 !== $v) {
        $this->codes2 = $v;
        $this->modifiedColumns[] = NphojintPeer::CODES2;
      }
  
	} 
	
	public function setCodci2($v)
	{

    if ($this->codci2 !== $v) {
        $this->codci2 = $v;
        $this->modifiedColumns[] = NphojintPeer::CODCI2;
      }
  
	} 
	
	public function setCodrac($v)
	{

    if ($this->codrac !== $v) {
        $this->codrac = $v;
        $this->modifiedColumns[] = NphojintPeer::CODRAC;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NphojintPeer::CODNIV;
      }
  
	} 
	
	public function setTelha2($v)
	{

    if ($this->telha2 !== $v) {
        $this->telha2 = $v;
        $this->modifiedColumns[] = NphojintPeer::TELHA2;
      }
  
	} 
	
	public function setTelot2($v)
	{

    if ($this->telot2 !== $v) {
        $this->telot2 = $v;
        $this->modifiedColumns[] = NphojintPeer::TELOT2;
      }
  
	} 
	
	public function setCodprofes($v)
	{

    if ($this->codprofes !== $v) {
        $this->codprofes = $v;
        $this->modifiedColumns[] = NphojintPeer::CODPROFES;
      }
  
	} 
	
	public function setHcmexo($v)
	{

    if ($this->hcmexo !== $v) {
        $this->hcmexo = $v;
        $this->modifiedColumns[] = NphojintPeer::HCMEXO;
      }
  
	} 
	
	public function setCodbanfid($v)
	{

    if ($this->codbanfid !== $v) {
        $this->codbanfid = $v;
        $this->modifiedColumns[] = NphojintPeer::CODBANFID;
      }
  
	} 
	
	public function setCodbanlph($v)
	{

    if ($this->codbanlph !== $v) {
        $this->codbanlph = $v;
        $this->modifiedColumns[] = NphojintPeer::CODBANLPH;
      }
  
	} 
	
	public function setNumcuefid($v)
	{

    if ($this->numcuefid !== $v) {
        $this->numcuefid = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMCUEFID;
      }
  
	} 
	
	public function setNumcuelph($v)
	{

    if ($this->numcuelph !== $v) {
        $this->numcuelph = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMCUELPH;
      }
  
	} 
	
	public function setCodempant($v)
	{

    if ($this->codempant !== $v) {
        $this->codempant = $v;
        $this->modifiedColumns[] = NphojintPeer::CODEMPANT;
      }
  
	} 
	
	public function setGrusan($v)
	{

    if ($this->grusan !== $v) {
        $this->grusan = $v;
        $this->modifiedColumns[] = NphojintPeer::GRUSAN;
      }
  
	} 
	
	public function setObsgen($v)
	{

    if ($this->obsgen !== $v) {
        $this->obsgen = $v;
        $this->modifiedColumns[] = NphojintPeer::OBSGEN;
      }
  
	} 
	
	public function setCodregpai($v)
	{

    if ($this->codregpai !== $v) {
        $this->codregpai = $v;
        $this->modifiedColumns[] = NphojintPeer::CODREGPAI;
      }
  
	} 
	
	public function setCodregest($v)
	{

    if ($this->codregest !== $v) {
        $this->codregest = $v;
        $this->modifiedColumns[] = NphojintPeer::CODREGEST;
      }
  
	} 
	
	public function setCodregciu($v)
	{

    if ($this->codregciu !== $v) {
        $this->codregciu = $v;
        $this->modifiedColumns[] = NphojintPeer::CODREGCIU;
      }
  
	} 
	
	public function setFecgra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgra !== $ts) {
      $this->fecgra = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECGRA;
    }

	} 
	
	public function setGrusangre($v)
	{

    if ($this->grusangre !== $v) {
        $this->grusangre = $v;
        $this->modifiedColumns[] = NphojintPeer::GRUSANGRE;
      }
  
	} 
	
	public function setNumgaceta($v)
	{

    if ($this->numgaceta !== $v) {
        $this->numgaceta = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMGACETA;
      }
  
	} 
	
	public function setFecgaceta($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgaceta] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgaceta !== $ts) {
      $this->fecgaceta = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECGACETA;
    }

	} 
	
	public function setDiagra($v)
	{

    if ($this->diagra !== $v) {
        $this->diagra = $v;
        $this->modifiedColumns[] = NphojintPeer::DIAGRA;
      }
  
	} 
	
	public function setMesgra($v)
	{

    if ($this->mesgra !== $v) {
        $this->mesgra = $v;
        $this->modifiedColumns[] = NphojintPeer::MESGRA;
      }
  
	} 
	
	public function setAnogra($v)
	{

    if ($this->anogra !== $v) {
        $this->anogra = $v;
        $this->modifiedColumns[] = NphojintPeer::ANOGRA;
      }
  
	} 
	
	public function setTemporal($v)
	{

    if ($this->temporal !== $v) {
        $this->temporal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::TEMPORAL;
      }
  
	} 
	
	public function setDetexp($v)
	{

    if ($this->detexp !== $v) {
        $this->detexp = $v;
        $this->modifiedColumns[] = NphojintPeer::DETEXP;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMEXP;
      }
  
	} 
	
	public function setModpagcestic($v)
	{

    if ($this->modpagcestic !== $v) {
        $this->modpagcestic = $v;
        $this->modifiedColumns[] = NphojintPeer::MODPAGCESTIC;
      }
  
	} 
	
	public function setCodret($v)
	{

    if ($this->codret !== $v) {
        $this->codret = $v;
        $this->modifiedColumns[] = NphojintPeer::CODRET;
      }
  
	} 
	
	public function setSituac($v)
	{

    if ($this->situac !== $v) {
        $this->situac = $v;
        $this->modifiedColumns[] = NphojintPeer::SITUAC;
      }
  
	} 
	
	public function setProfes($v)
	{

    if ($this->profes !== $v) {
        $this->profes = $v;
        $this->modifiedColumns[] = NphojintPeer::PROFES;
      }
  
	} 
	
	public function setCodnivedu($v)
	{

    if ($this->codnivedu !== $v) {
        $this->codnivedu = $v;
        $this->modifiedColumns[] = NphojintPeer::CODNIVEDU;
      }
  
	} 
	
	public function setUbifis($v)
	{

    if ($this->ubifis !== $v) {
        $this->ubifis = $v;
        $this->modifiedColumns[] = NphojintPeer::UBIFIS;
      }
  
	} 
	
	public function setTipcueaho($v)
	{

    if ($this->tipcueaho !== $v) {
        $this->tipcueaho = $v;
        $this->modifiedColumns[] = NphojintPeer::TIPCUEAHO;
      }
  
	} 
	
	public function setNumcueaho($v)
	{

    if ($this->numcueaho !== $v) {
        $this->numcueaho = $v;
        $this->modifiedColumns[] = NphojintPeer::NUMCUEAHO;
      }
  
	} 
	
	public function setFeccoracu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccoracu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccoracu !== $ts) {
      $this->feccoracu = $ts;
      $this->modifiedColumns[] = NphojintPeer::FECCORACU;
    }

	} 
	
	public function setCapactacu($v)
	{

    if ($this->capactacu !== $v) {
        $this->capactacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::CAPACTACU;
      }
  
	} 
	
	public function setIntacu($v)
	{

    if ($this->intacu !== $v) {
        $this->intacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::INTACU;
      }
  
	} 
	
	public function setAntacu($v)
	{

    if ($this->antacu !== $v) {
        $this->antacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphojintPeer::ANTACU;
      }
  
	} 
	
	public function setDiaacu($v)
	{

    if ($this->diaacu !== $v) {
        $this->diaacu = $v;
        $this->modifiedColumns[] = NphojintPeer::DIAACU;
      }
  
	} 
	
	public function setDiaadiacu($v)
	{

    if ($this->diaadiacu !== $v) {
        $this->diaadiacu = $v;
        $this->modifiedColumns[] = NphojintPeer::DIAADIACU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NphojintPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomemp = $rs->getString($startcol + 1);

      $this->cedemp = $rs->getString($startcol + 2);

      $this->numcon = $rs->getString($startcol + 3);

      $this->edociv = $rs->getString($startcol + 4);

      $this->nacemp = $rs->getString($startcol + 5);

      $this->sexemp = $rs->getString($startcol + 6);

      $this->fecnac = $rs->getDate($startcol + 7, null);

      $this->edaemp = $rs->getFloat($startcol + 8);

      $this->lugnac = $rs->getString($startcol + 9);

      $this->dirhab = $rs->getString($startcol + 10);

      $this->codciu = $rs->getString($startcol + 11);

      $this->telhab = $rs->getString($startcol + 12);

      $this->celemp = $rs->getString($startcol + 13);

      $this->emaemp = $rs->getString($startcol + 14);

      $this->codpos = $rs->getString($startcol + 15);

      $this->talpan = $rs->getString($startcol + 16);

      $this->talcam = $rs->getString($startcol + 17);

      $this->talcal = $rs->getFloat($startcol + 18);

      $this->derzur = $rs->getString($startcol + 19);

      $this->fecing = $rs->getDate($startcol + 20, null);

      $this->fecret = $rs->getDate($startcol + 21, null);

      $this->fecrei = $rs->getDate($startcol + 22, null);

      $this->fecadmpub = $rs->getDate($startcol + 23, null);

      $this->staemp = $rs->getString($startcol + 24);

      $this->fotemp = $rs->getString($startcol + 25);

      $this->numsso = $rs->getString($startcol + 26);

      $this->numpolseg = $rs->getString($startcol + 27);

      $this->feccotsso = $rs->getDate($startcol + 28, null);

      $this->anoadmpub = $rs->getFloat($startcol + 29);

      $this->codtippag = $rs->getString($startcol + 30);

      $this->codban = $rs->getString($startcol + 31);

      $this->tipcue = $rs->getString($startcol + 32);

      $this->numcue = $rs->getString($startcol + 33);

      $this->obsemp = $rs->getString($startcol + 34);

      $this->tiefid = $rs->getString($startcol + 35);

      $this->grulab = $rs->getString($startcol + 36);

      $this->gruotr = $rs->getString($startcol + 37);

      $this->traslado = $rs->getString($startcol + 38);

      $this->traotr = $rs->getString($startcol + 39);

      $this->tipviv = $rs->getString($startcol + 40);

      $this->vivotr = $rs->getString($startcol + 41);

      $this->forten = $rs->getString($startcol + 42);

      $this->tenotr = $rs->getString($startcol + 43);

      $this->sercon = $rs->getString($startcol + 44);

      $this->dirotr = $rs->getString($startcol + 45);

      $this->telotr = $rs->getString($startcol + 46);

      $this->codpai = $rs->getString($startcol + 47);

      $this->codpa2 = $rs->getString($startcol + 48);

      $this->codest = $rs->getString($startcol + 49);

      $this->codes2 = $rs->getString($startcol + 50);

      $this->codci2 = $rs->getString($startcol + 51);

      $this->codrac = $rs->getString($startcol + 52);

      $this->codniv = $rs->getString($startcol + 53);

      $this->telha2 = $rs->getString($startcol + 54);

      $this->telot2 = $rs->getString($startcol + 55);

      $this->codprofes = $rs->getString($startcol + 56);

      $this->hcmexo = $rs->getString($startcol + 57);

      $this->codbanfid = $rs->getString($startcol + 58);

      $this->codbanlph = $rs->getString($startcol + 59);

      $this->numcuefid = $rs->getString($startcol + 60);

      $this->numcuelph = $rs->getString($startcol + 61);

      $this->codempant = $rs->getString($startcol + 62);

      $this->grusan = $rs->getString($startcol + 63);

      $this->obsgen = $rs->getString($startcol + 64);

      $this->codregpai = $rs->getString($startcol + 65);

      $this->codregest = $rs->getString($startcol + 66);

      $this->codregciu = $rs->getString($startcol + 67);

      $this->fecgra = $rs->getDate($startcol + 68, null);

      $this->grusangre = $rs->getString($startcol + 69);

      $this->numgaceta = $rs->getString($startcol + 70);

      $this->fecgaceta = $rs->getDate($startcol + 71, null);

      $this->diagra = $rs->getString($startcol + 72);

      $this->mesgra = $rs->getString($startcol + 73);

      $this->anogra = $rs->getString($startcol + 74);

      $this->temporal = $rs->getFloat($startcol + 75);

      $this->detexp = $rs->getString($startcol + 76);

      $this->numexp = $rs->getString($startcol + 77);

      $this->modpagcestic = $rs->getString($startcol + 78);

      $this->codret = $rs->getString($startcol + 79);

      $this->situac = $rs->getString($startcol + 80);

      $this->profes = $rs->getString($startcol + 81);

      $this->codnivedu = $rs->getString($startcol + 82);

      $this->ubifis = $rs->getString($startcol + 83);

      $this->tipcueaho = $rs->getString($startcol + 84);

      $this->numcueaho = $rs->getString($startcol + 85);

      $this->feccoracu = $rs->getDate($startcol + 86, null);

      $this->capactacu = $rs->getFloat($startcol + 87);

      $this->intacu = $rs->getFloat($startcol + 88);

      $this->antacu = $rs->getFloat($startcol + 89);

      $this->diaacu = $rs->getInt($startcol + 90);

      $this->diaadiacu = $rs->getInt($startcol + 91);

      $this->id = $rs->getInt($startcol + 92);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 93; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nphojint object", $e);
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
			$con = Propel::getConnection(NphojintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphojintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NphojintPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NphojintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NphojintPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collNphojintincs !== null) {
				foreach($this->collNphojintincs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = NphojintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNphojintincs !== null) {
					foreach($this->collNphojintincs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphojintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getCedemp();
				break;
			case 3:
				return $this->getNumcon();
				break;
			case 4:
				return $this->getEdociv();
				break;
			case 5:
				return $this->getNacemp();
				break;
			case 6:
				return $this->getSexemp();
				break;
			case 7:
				return $this->getFecnac();
				break;
			case 8:
				return $this->getEdaemp();
				break;
			case 9:
				return $this->getLugnac();
				break;
			case 10:
				return $this->getDirhab();
				break;
			case 11:
				return $this->getCodciu();
				break;
			case 12:
				return $this->getTelhab();
				break;
			case 13:
				return $this->getCelemp();
				break;
			case 14:
				return $this->getEmaemp();
				break;
			case 15:
				return $this->getCodpos();
				break;
			case 16:
				return $this->getTalpan();
				break;
			case 17:
				return $this->getTalcam();
				break;
			case 18:
				return $this->getTalcal();
				break;
			case 19:
				return $this->getDerzur();
				break;
			case 20:
				return $this->getFecing();
				break;
			case 21:
				return $this->getFecret();
				break;
			case 22:
				return $this->getFecrei();
				break;
			case 23:
				return $this->getFecadmpub();
				break;
			case 24:
				return $this->getStaemp();
				break;
			case 25:
				return $this->getFotemp();
				break;
			case 26:
				return $this->getNumsso();
				break;
			case 27:
				return $this->getNumpolseg();
				break;
			case 28:
				return $this->getFeccotsso();
				break;
			case 29:
				return $this->getAnoadmpub();
				break;
			case 30:
				return $this->getCodtippag();
				break;
			case 31:
				return $this->getCodban();
				break;
			case 32:
				return $this->getTipcue();
				break;
			case 33:
				return $this->getNumcue();
				break;
			case 34:
				return $this->getObsemp();
				break;
			case 35:
				return $this->getTiefid();
				break;
			case 36:
				return $this->getGrulab();
				break;
			case 37:
				return $this->getGruotr();
				break;
			case 38:
				return $this->getTraslado();
				break;
			case 39:
				return $this->getTraotr();
				break;
			case 40:
				return $this->getTipviv();
				break;
			case 41:
				return $this->getVivotr();
				break;
			case 42:
				return $this->getForten();
				break;
			case 43:
				return $this->getTenotr();
				break;
			case 44:
				return $this->getSercon();
				break;
			case 45:
				return $this->getDirotr();
				break;
			case 46:
				return $this->getTelotr();
				break;
			case 47:
				return $this->getCodpai();
				break;
			case 48:
				return $this->getCodpa2();
				break;
			case 49:
				return $this->getCodest();
				break;
			case 50:
				return $this->getCodes2();
				break;
			case 51:
				return $this->getCodci2();
				break;
			case 52:
				return $this->getCodrac();
				break;
			case 53:
				return $this->getCodniv();
				break;
			case 54:
				return $this->getTelha2();
				break;
			case 55:
				return $this->getTelot2();
				break;
			case 56:
				return $this->getCodprofes();
				break;
			case 57:
				return $this->getHcmexo();
				break;
			case 58:
				return $this->getCodbanfid();
				break;
			case 59:
				return $this->getCodbanlph();
				break;
			case 60:
				return $this->getNumcuefid();
				break;
			case 61:
				return $this->getNumcuelph();
				break;
			case 62:
				return $this->getCodempant();
				break;
			case 63:
				return $this->getGrusan();
				break;
			case 64:
				return $this->getObsgen();
				break;
			case 65:
				return $this->getCodregpai();
				break;
			case 66:
				return $this->getCodregest();
				break;
			case 67:
				return $this->getCodregciu();
				break;
			case 68:
				return $this->getFecgra();
				break;
			case 69:
				return $this->getGrusangre();
				break;
			case 70:
				return $this->getNumgaceta();
				break;
			case 71:
				return $this->getFecgaceta();
				break;
			case 72:
				return $this->getDiagra();
				break;
			case 73:
				return $this->getMesgra();
				break;
			case 74:
				return $this->getAnogra();
				break;
			case 75:
				return $this->getTemporal();
				break;
			case 76:
				return $this->getDetexp();
				break;
			case 77:
				return $this->getNumexp();
				break;
			case 78:
				return $this->getModpagcestic();
				break;
			case 79:
				return $this->getCodret();
				break;
			case 80:
				return $this->getSituac();
				break;
			case 81:
				return $this->getProfes();
				break;
			case 82:
				return $this->getCodnivedu();
				break;
			case 83:
				return $this->getUbifis();
				break;
			case 84:
				return $this->getTipcueaho();
				break;
			case 85:
				return $this->getNumcueaho();
				break;
			case 86:
				return $this->getFeccoracu();
				break;
			case 87:
				return $this->getCapactacu();
				break;
			case 88:
				return $this->getIntacu();
				break;
			case 89:
				return $this->getAntacu();
				break;
			case 90:
				return $this->getDiaacu();
				break;
			case 91:
				return $this->getDiaadiacu();
				break;
			case 92:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphojintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getCedemp(),
			$keys[3] => $this->getNumcon(),
			$keys[4] => $this->getEdociv(),
			$keys[5] => $this->getNacemp(),
			$keys[6] => $this->getSexemp(),
			$keys[7] => $this->getFecnac(),
			$keys[8] => $this->getEdaemp(),
			$keys[9] => $this->getLugnac(),
			$keys[10] => $this->getDirhab(),
			$keys[11] => $this->getCodciu(),
			$keys[12] => $this->getTelhab(),
			$keys[13] => $this->getCelemp(),
			$keys[14] => $this->getEmaemp(),
			$keys[15] => $this->getCodpos(),
			$keys[16] => $this->getTalpan(),
			$keys[17] => $this->getTalcam(),
			$keys[18] => $this->getTalcal(),
			$keys[19] => $this->getDerzur(),
			$keys[20] => $this->getFecing(),
			$keys[21] => $this->getFecret(),
			$keys[22] => $this->getFecrei(),
			$keys[23] => $this->getFecadmpub(),
			$keys[24] => $this->getStaemp(),
			$keys[25] => $this->getFotemp(),
			$keys[26] => $this->getNumsso(),
			$keys[27] => $this->getNumpolseg(),
			$keys[28] => $this->getFeccotsso(),
			$keys[29] => $this->getAnoadmpub(),
			$keys[30] => $this->getCodtippag(),
			$keys[31] => $this->getCodban(),
			$keys[32] => $this->getTipcue(),
			$keys[33] => $this->getNumcue(),
			$keys[34] => $this->getObsemp(),
			$keys[35] => $this->getTiefid(),
			$keys[36] => $this->getGrulab(),
			$keys[37] => $this->getGruotr(),
			$keys[38] => $this->getTraslado(),
			$keys[39] => $this->getTraotr(),
			$keys[40] => $this->getTipviv(),
			$keys[41] => $this->getVivotr(),
			$keys[42] => $this->getForten(),
			$keys[43] => $this->getTenotr(),
			$keys[44] => $this->getSercon(),
			$keys[45] => $this->getDirotr(),
			$keys[46] => $this->getTelotr(),
			$keys[47] => $this->getCodpai(),
			$keys[48] => $this->getCodpa2(),
			$keys[49] => $this->getCodest(),
			$keys[50] => $this->getCodes2(),
			$keys[51] => $this->getCodci2(),
			$keys[52] => $this->getCodrac(),
			$keys[53] => $this->getCodniv(),
			$keys[54] => $this->getTelha2(),
			$keys[55] => $this->getTelot2(),
			$keys[56] => $this->getCodprofes(),
			$keys[57] => $this->getHcmexo(),
			$keys[58] => $this->getCodbanfid(),
			$keys[59] => $this->getCodbanlph(),
			$keys[60] => $this->getNumcuefid(),
			$keys[61] => $this->getNumcuelph(),
			$keys[62] => $this->getCodempant(),
			$keys[63] => $this->getGrusan(),
			$keys[64] => $this->getObsgen(),
			$keys[65] => $this->getCodregpai(),
			$keys[66] => $this->getCodregest(),
			$keys[67] => $this->getCodregciu(),
			$keys[68] => $this->getFecgra(),
			$keys[69] => $this->getGrusangre(),
			$keys[70] => $this->getNumgaceta(),
			$keys[71] => $this->getFecgaceta(),
			$keys[72] => $this->getDiagra(),
			$keys[73] => $this->getMesgra(),
			$keys[74] => $this->getAnogra(),
			$keys[75] => $this->getTemporal(),
			$keys[76] => $this->getDetexp(),
			$keys[77] => $this->getNumexp(),
			$keys[78] => $this->getModpagcestic(),
			$keys[79] => $this->getCodret(),
			$keys[80] => $this->getSituac(),
			$keys[81] => $this->getProfes(),
			$keys[82] => $this->getCodnivedu(),
			$keys[83] => $this->getUbifis(),
			$keys[84] => $this->getTipcueaho(),
			$keys[85] => $this->getNumcueaho(),
			$keys[86] => $this->getFeccoracu(),
			$keys[87] => $this->getCapactacu(),
			$keys[88] => $this->getIntacu(),
			$keys[89] => $this->getAntacu(),
			$keys[90] => $this->getDiaacu(),
			$keys[91] => $this->getDiaadiacu(),
			$keys[92] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphojintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setCedemp($value);
				break;
			case 3:
				$this->setNumcon($value);
				break;
			case 4:
				$this->setEdociv($value);
				break;
			case 5:
				$this->setNacemp($value);
				break;
			case 6:
				$this->setSexemp($value);
				break;
			case 7:
				$this->setFecnac($value);
				break;
			case 8:
				$this->setEdaemp($value);
				break;
			case 9:
				$this->setLugnac($value);
				break;
			case 10:
				$this->setDirhab($value);
				break;
			case 11:
				$this->setCodciu($value);
				break;
			case 12:
				$this->setTelhab($value);
				break;
			case 13:
				$this->setCelemp($value);
				break;
			case 14:
				$this->setEmaemp($value);
				break;
			case 15:
				$this->setCodpos($value);
				break;
			case 16:
				$this->setTalpan($value);
				break;
			case 17:
				$this->setTalcam($value);
				break;
			case 18:
				$this->setTalcal($value);
				break;
			case 19:
				$this->setDerzur($value);
				break;
			case 20:
				$this->setFecing($value);
				break;
			case 21:
				$this->setFecret($value);
				break;
			case 22:
				$this->setFecrei($value);
				break;
			case 23:
				$this->setFecadmpub($value);
				break;
			case 24:
				$this->setStaemp($value);
				break;
			case 25:
				$this->setFotemp($value);
				break;
			case 26:
				$this->setNumsso($value);
				break;
			case 27:
				$this->setNumpolseg($value);
				break;
			case 28:
				$this->setFeccotsso($value);
				break;
			case 29:
				$this->setAnoadmpub($value);
				break;
			case 30:
				$this->setCodtippag($value);
				break;
			case 31:
				$this->setCodban($value);
				break;
			case 32:
				$this->setTipcue($value);
				break;
			case 33:
				$this->setNumcue($value);
				break;
			case 34:
				$this->setObsemp($value);
				break;
			case 35:
				$this->setTiefid($value);
				break;
			case 36:
				$this->setGrulab($value);
				break;
			case 37:
				$this->setGruotr($value);
				break;
			case 38:
				$this->setTraslado($value);
				break;
			case 39:
				$this->setTraotr($value);
				break;
			case 40:
				$this->setTipviv($value);
				break;
			case 41:
				$this->setVivotr($value);
				break;
			case 42:
				$this->setForten($value);
				break;
			case 43:
				$this->setTenotr($value);
				break;
			case 44:
				$this->setSercon($value);
				break;
			case 45:
				$this->setDirotr($value);
				break;
			case 46:
				$this->setTelotr($value);
				break;
			case 47:
				$this->setCodpai($value);
				break;
			case 48:
				$this->setCodpa2($value);
				break;
			case 49:
				$this->setCodest($value);
				break;
			case 50:
				$this->setCodes2($value);
				break;
			case 51:
				$this->setCodci2($value);
				break;
			case 52:
				$this->setCodrac($value);
				break;
			case 53:
				$this->setCodniv($value);
				break;
			case 54:
				$this->setTelha2($value);
				break;
			case 55:
				$this->setTelot2($value);
				break;
			case 56:
				$this->setCodprofes($value);
				break;
			case 57:
				$this->setHcmexo($value);
				break;
			case 58:
				$this->setCodbanfid($value);
				break;
			case 59:
				$this->setCodbanlph($value);
				break;
			case 60:
				$this->setNumcuefid($value);
				break;
			case 61:
				$this->setNumcuelph($value);
				break;
			case 62:
				$this->setCodempant($value);
				break;
			case 63:
				$this->setGrusan($value);
				break;
			case 64:
				$this->setObsgen($value);
				break;
			case 65:
				$this->setCodregpai($value);
				break;
			case 66:
				$this->setCodregest($value);
				break;
			case 67:
				$this->setCodregciu($value);
				break;
			case 68:
				$this->setFecgra($value);
				break;
			case 69:
				$this->setGrusangre($value);
				break;
			case 70:
				$this->setNumgaceta($value);
				break;
			case 71:
				$this->setFecgaceta($value);
				break;
			case 72:
				$this->setDiagra($value);
				break;
			case 73:
				$this->setMesgra($value);
				break;
			case 74:
				$this->setAnogra($value);
				break;
			case 75:
				$this->setTemporal($value);
				break;
			case 76:
				$this->setDetexp($value);
				break;
			case 77:
				$this->setNumexp($value);
				break;
			case 78:
				$this->setModpagcestic($value);
				break;
			case 79:
				$this->setCodret($value);
				break;
			case 80:
				$this->setSituac($value);
				break;
			case 81:
				$this->setProfes($value);
				break;
			case 82:
				$this->setCodnivedu($value);
				break;
			case 83:
				$this->setUbifis($value);
				break;
			case 84:
				$this->setTipcueaho($value);
				break;
			case 85:
				$this->setNumcueaho($value);
				break;
			case 86:
				$this->setFeccoracu($value);
				break;
			case 87:
				$this->setCapactacu($value);
				break;
			case 88:
				$this->setIntacu($value);
				break;
			case 89:
				$this->setAntacu($value);
				break;
			case 90:
				$this->setDiaacu($value);
				break;
			case 91:
				$this->setDiaadiacu($value);
				break;
			case 92:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphojintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEdociv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNacemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSexemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecnac($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEdaemp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLugnac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirhab($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodciu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelhab($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCelemp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setEmaemp($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodpos($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTalpan($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTalcam($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTalcal($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDerzur($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecing($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecret($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecrei($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFecadmpub($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setStaemp($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFotemp($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setNumsso($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNumpolseg($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFeccotsso($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setAnoadmpub($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodtippag($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodban($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTipcue($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNumcue($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setObsemp($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setTiefid($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setGrulab($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setGruotr($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setTraslado($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setTraotr($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setTipviv($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setVivotr($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setForten($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setTenotr($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setSercon($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setDirotr($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setTelotr($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setCodpai($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setCodpa2($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setCodest($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setCodes2($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setCodci2($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setCodrac($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setCodniv($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setTelha2($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setTelot2($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setCodprofes($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setHcmexo($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setCodbanfid($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setCodbanlph($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setNumcuefid($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setNumcuelph($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setCodempant($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setGrusan($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setObsgen($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setCodregpai($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setCodregest($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setCodregciu($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setFecgra($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setGrusangre($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setNumgaceta($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setFecgaceta($arr[$keys[71]]);
		if (array_key_exists($keys[72], $arr)) $this->setDiagra($arr[$keys[72]]);
		if (array_key_exists($keys[73], $arr)) $this->setMesgra($arr[$keys[73]]);
		if (array_key_exists($keys[74], $arr)) $this->setAnogra($arr[$keys[74]]);
		if (array_key_exists($keys[75], $arr)) $this->setTemporal($arr[$keys[75]]);
		if (array_key_exists($keys[76], $arr)) $this->setDetexp($arr[$keys[76]]);
		if (array_key_exists($keys[77], $arr)) $this->setNumexp($arr[$keys[77]]);
		if (array_key_exists($keys[78], $arr)) $this->setModpagcestic($arr[$keys[78]]);
		if (array_key_exists($keys[79], $arr)) $this->setCodret($arr[$keys[79]]);
		if (array_key_exists($keys[80], $arr)) $this->setSituac($arr[$keys[80]]);
		if (array_key_exists($keys[81], $arr)) $this->setProfes($arr[$keys[81]]);
		if (array_key_exists($keys[82], $arr)) $this->setCodnivedu($arr[$keys[82]]);
		if (array_key_exists($keys[83], $arr)) $this->setUbifis($arr[$keys[83]]);
		if (array_key_exists($keys[84], $arr)) $this->setTipcueaho($arr[$keys[84]]);
		if (array_key_exists($keys[85], $arr)) $this->setNumcueaho($arr[$keys[85]]);
		if (array_key_exists($keys[86], $arr)) $this->setFeccoracu($arr[$keys[86]]);
		if (array_key_exists($keys[87], $arr)) $this->setCapactacu($arr[$keys[87]]);
		if (array_key_exists($keys[88], $arr)) $this->setIntacu($arr[$keys[88]]);
		if (array_key_exists($keys[89], $arr)) $this->setAntacu($arr[$keys[89]]);
		if (array_key_exists($keys[90], $arr)) $this->setDiaacu($arr[$keys[90]]);
		if (array_key_exists($keys[91], $arr)) $this->setDiaadiacu($arr[$keys[91]]);
		if (array_key_exists($keys[92], $arr)) $this->setId($arr[$keys[92]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphojintPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphojintPeer::CODEMP)) $criteria->add(NphojintPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphojintPeer::NOMEMP)) $criteria->add(NphojintPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NphojintPeer::CEDEMP)) $criteria->add(NphojintPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(NphojintPeer::NUMCON)) $criteria->add(NphojintPeer::NUMCON, $this->numcon);
		if ($this->isColumnModified(NphojintPeer::EDOCIV)) $criteria->add(NphojintPeer::EDOCIV, $this->edociv);
		if ($this->isColumnModified(NphojintPeer::NACEMP)) $criteria->add(NphojintPeer::NACEMP, $this->nacemp);
		if ($this->isColumnModified(NphojintPeer::SEXEMP)) $criteria->add(NphojintPeer::SEXEMP, $this->sexemp);
		if ($this->isColumnModified(NphojintPeer::FECNAC)) $criteria->add(NphojintPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(NphojintPeer::EDAEMP)) $criteria->add(NphojintPeer::EDAEMP, $this->edaemp);
		if ($this->isColumnModified(NphojintPeer::LUGNAC)) $criteria->add(NphojintPeer::LUGNAC, $this->lugnac);
		if ($this->isColumnModified(NphojintPeer::DIRHAB)) $criteria->add(NphojintPeer::DIRHAB, $this->dirhab);
		if ($this->isColumnModified(NphojintPeer::CODCIU)) $criteria->add(NphojintPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(NphojintPeer::TELHAB)) $criteria->add(NphojintPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(NphojintPeer::CELEMP)) $criteria->add(NphojintPeer::CELEMP, $this->celemp);
		if ($this->isColumnModified(NphojintPeer::EMAEMP)) $criteria->add(NphojintPeer::EMAEMP, $this->emaemp);
		if ($this->isColumnModified(NphojintPeer::CODPOS)) $criteria->add(NphojintPeer::CODPOS, $this->codpos);
		if ($this->isColumnModified(NphojintPeer::TALPAN)) $criteria->add(NphojintPeer::TALPAN, $this->talpan);
		if ($this->isColumnModified(NphojintPeer::TALCAM)) $criteria->add(NphojintPeer::TALCAM, $this->talcam);
		if ($this->isColumnModified(NphojintPeer::TALCAL)) $criteria->add(NphojintPeer::TALCAL, $this->talcal);
		if ($this->isColumnModified(NphojintPeer::DERZUR)) $criteria->add(NphojintPeer::DERZUR, $this->derzur);
		if ($this->isColumnModified(NphojintPeer::FECING)) $criteria->add(NphojintPeer::FECING, $this->fecing);
		if ($this->isColumnModified(NphojintPeer::FECRET)) $criteria->add(NphojintPeer::FECRET, $this->fecret);
		if ($this->isColumnModified(NphojintPeer::FECREI)) $criteria->add(NphojintPeer::FECREI, $this->fecrei);
		if ($this->isColumnModified(NphojintPeer::FECADMPUB)) $criteria->add(NphojintPeer::FECADMPUB, $this->fecadmpub);
		if ($this->isColumnModified(NphojintPeer::STAEMP)) $criteria->add(NphojintPeer::STAEMP, $this->staemp);
		if ($this->isColumnModified(NphojintPeer::FOTEMP)) $criteria->add(NphojintPeer::FOTEMP, $this->fotemp);
		if ($this->isColumnModified(NphojintPeer::NUMSSO)) $criteria->add(NphojintPeer::NUMSSO, $this->numsso);
		if ($this->isColumnModified(NphojintPeer::NUMPOLSEG)) $criteria->add(NphojintPeer::NUMPOLSEG, $this->numpolseg);
		if ($this->isColumnModified(NphojintPeer::FECCOTSSO)) $criteria->add(NphojintPeer::FECCOTSSO, $this->feccotsso);
		if ($this->isColumnModified(NphojintPeer::ANOADMPUB)) $criteria->add(NphojintPeer::ANOADMPUB, $this->anoadmpub);
		if ($this->isColumnModified(NphojintPeer::CODTIPPAG)) $criteria->add(NphojintPeer::CODTIPPAG, $this->codtippag);
		if ($this->isColumnModified(NphojintPeer::CODBAN)) $criteria->add(NphojintPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NphojintPeer::TIPCUE)) $criteria->add(NphojintPeer::TIPCUE, $this->tipcue);
		if ($this->isColumnModified(NphojintPeer::NUMCUE)) $criteria->add(NphojintPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(NphojintPeer::OBSEMP)) $criteria->add(NphojintPeer::OBSEMP, $this->obsemp);
		if ($this->isColumnModified(NphojintPeer::TIEFID)) $criteria->add(NphojintPeer::TIEFID, $this->tiefid);
		if ($this->isColumnModified(NphojintPeer::GRULAB)) $criteria->add(NphojintPeer::GRULAB, $this->grulab);
		if ($this->isColumnModified(NphojintPeer::GRUOTR)) $criteria->add(NphojintPeer::GRUOTR, $this->gruotr);
		if ($this->isColumnModified(NphojintPeer::TRASLADO)) $criteria->add(NphojintPeer::TRASLADO, $this->traslado);
		if ($this->isColumnModified(NphojintPeer::TRAOTR)) $criteria->add(NphojintPeer::TRAOTR, $this->traotr);
		if ($this->isColumnModified(NphojintPeer::TIPVIV)) $criteria->add(NphojintPeer::TIPVIV, $this->tipviv);
		if ($this->isColumnModified(NphojintPeer::VIVOTR)) $criteria->add(NphojintPeer::VIVOTR, $this->vivotr);
		if ($this->isColumnModified(NphojintPeer::FORTEN)) $criteria->add(NphojintPeer::FORTEN, $this->forten);
		if ($this->isColumnModified(NphojintPeer::TENOTR)) $criteria->add(NphojintPeer::TENOTR, $this->tenotr);
		if ($this->isColumnModified(NphojintPeer::SERCON)) $criteria->add(NphojintPeer::SERCON, $this->sercon);
		if ($this->isColumnModified(NphojintPeer::DIROTR)) $criteria->add(NphojintPeer::DIROTR, $this->dirotr);
		if ($this->isColumnModified(NphojintPeer::TELOTR)) $criteria->add(NphojintPeer::TELOTR, $this->telotr);
		if ($this->isColumnModified(NphojintPeer::CODPAI)) $criteria->add(NphojintPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(NphojintPeer::CODPA2)) $criteria->add(NphojintPeer::CODPA2, $this->codpa2);
		if ($this->isColumnModified(NphojintPeer::CODEST)) $criteria->add(NphojintPeer::CODEST, $this->codest);
		if ($this->isColumnModified(NphojintPeer::CODES2)) $criteria->add(NphojintPeer::CODES2, $this->codes2);
		if ($this->isColumnModified(NphojintPeer::CODCI2)) $criteria->add(NphojintPeer::CODCI2, $this->codci2);
		if ($this->isColumnModified(NphojintPeer::CODRAC)) $criteria->add(NphojintPeer::CODRAC, $this->codrac);
		if ($this->isColumnModified(NphojintPeer::CODNIV)) $criteria->add(NphojintPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NphojintPeer::TELHA2)) $criteria->add(NphojintPeer::TELHA2, $this->telha2);
		if ($this->isColumnModified(NphojintPeer::TELOT2)) $criteria->add(NphojintPeer::TELOT2, $this->telot2);
		if ($this->isColumnModified(NphojintPeer::CODPROFES)) $criteria->add(NphojintPeer::CODPROFES, $this->codprofes);
		if ($this->isColumnModified(NphojintPeer::HCMEXO)) $criteria->add(NphojintPeer::HCMEXO, $this->hcmexo);
		if ($this->isColumnModified(NphojintPeer::CODBANFID)) $criteria->add(NphojintPeer::CODBANFID, $this->codbanfid);
		if ($this->isColumnModified(NphojintPeer::CODBANLPH)) $criteria->add(NphojintPeer::CODBANLPH, $this->codbanlph);
		if ($this->isColumnModified(NphojintPeer::NUMCUEFID)) $criteria->add(NphojintPeer::NUMCUEFID, $this->numcuefid);
		if ($this->isColumnModified(NphojintPeer::NUMCUELPH)) $criteria->add(NphojintPeer::NUMCUELPH, $this->numcuelph);
		if ($this->isColumnModified(NphojintPeer::CODEMPANT)) $criteria->add(NphojintPeer::CODEMPANT, $this->codempant);
		if ($this->isColumnModified(NphojintPeer::GRUSAN)) $criteria->add(NphojintPeer::GRUSAN, $this->grusan);
		if ($this->isColumnModified(NphojintPeer::OBSGEN)) $criteria->add(NphojintPeer::OBSGEN, $this->obsgen);
		if ($this->isColumnModified(NphojintPeer::CODREGPAI)) $criteria->add(NphojintPeer::CODREGPAI, $this->codregpai);
		if ($this->isColumnModified(NphojintPeer::CODREGEST)) $criteria->add(NphojintPeer::CODREGEST, $this->codregest);
		if ($this->isColumnModified(NphojintPeer::CODREGCIU)) $criteria->add(NphojintPeer::CODREGCIU, $this->codregciu);
		if ($this->isColumnModified(NphojintPeer::FECGRA)) $criteria->add(NphojintPeer::FECGRA, $this->fecgra);
		if ($this->isColumnModified(NphojintPeer::GRUSANGRE)) $criteria->add(NphojintPeer::GRUSANGRE, $this->grusangre);
		if ($this->isColumnModified(NphojintPeer::NUMGACETA)) $criteria->add(NphojintPeer::NUMGACETA, $this->numgaceta);
		if ($this->isColumnModified(NphojintPeer::FECGACETA)) $criteria->add(NphojintPeer::FECGACETA, $this->fecgaceta);
		if ($this->isColumnModified(NphojintPeer::DIAGRA)) $criteria->add(NphojintPeer::DIAGRA, $this->diagra);
		if ($this->isColumnModified(NphojintPeer::MESGRA)) $criteria->add(NphojintPeer::MESGRA, $this->mesgra);
		if ($this->isColumnModified(NphojintPeer::ANOGRA)) $criteria->add(NphojintPeer::ANOGRA, $this->anogra);
		if ($this->isColumnModified(NphojintPeer::TEMPORAL)) $criteria->add(NphojintPeer::TEMPORAL, $this->temporal);
		if ($this->isColumnModified(NphojintPeer::DETEXP)) $criteria->add(NphojintPeer::DETEXP, $this->detexp);
		if ($this->isColumnModified(NphojintPeer::NUMEXP)) $criteria->add(NphojintPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(NphojintPeer::MODPAGCESTIC)) $criteria->add(NphojintPeer::MODPAGCESTIC, $this->modpagcestic);
		if ($this->isColumnModified(NphojintPeer::CODRET)) $criteria->add(NphojintPeer::CODRET, $this->codret);
		if ($this->isColumnModified(NphojintPeer::SITUAC)) $criteria->add(NphojintPeer::SITUAC, $this->situac);
		if ($this->isColumnModified(NphojintPeer::PROFES)) $criteria->add(NphojintPeer::PROFES, $this->profes);
		if ($this->isColumnModified(NphojintPeer::CODNIVEDU)) $criteria->add(NphojintPeer::CODNIVEDU, $this->codnivedu);
		if ($this->isColumnModified(NphojintPeer::UBIFIS)) $criteria->add(NphojintPeer::UBIFIS, $this->ubifis);
		if ($this->isColumnModified(NphojintPeer::TIPCUEAHO)) $criteria->add(NphojintPeer::TIPCUEAHO, $this->tipcueaho);
		if ($this->isColumnModified(NphojintPeer::NUMCUEAHO)) $criteria->add(NphojintPeer::NUMCUEAHO, $this->numcueaho);
		if ($this->isColumnModified(NphojintPeer::FECCORACU)) $criteria->add(NphojintPeer::FECCORACU, $this->feccoracu);
		if ($this->isColumnModified(NphojintPeer::CAPACTACU)) $criteria->add(NphojintPeer::CAPACTACU, $this->capactacu);
		if ($this->isColumnModified(NphojintPeer::INTACU)) $criteria->add(NphojintPeer::INTACU, $this->intacu);
		if ($this->isColumnModified(NphojintPeer::ANTACU)) $criteria->add(NphojintPeer::ANTACU, $this->antacu);
		if ($this->isColumnModified(NphojintPeer::DIAACU)) $criteria->add(NphojintPeer::DIAACU, $this->diaacu);
		if ($this->isColumnModified(NphojintPeer::DIAADIACU)) $criteria->add(NphojintPeer::DIAADIACU, $this->diaadiacu);
		if ($this->isColumnModified(NphojintPeer::ID)) $criteria->add(NphojintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphojintPeer::DATABASE_NAME);

		$criteria->add(NphojintPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setNumcon($this->numcon);

		$copyObj->setEdociv($this->edociv);

		$copyObj->setNacemp($this->nacemp);

		$copyObj->setSexemp($this->sexemp);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setEdaemp($this->edaemp);

		$copyObj->setLugnac($this->lugnac);

		$copyObj->setDirhab($this->dirhab);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setTelhab($this->telhab);

		$copyObj->setCelemp($this->celemp);

		$copyObj->setEmaemp($this->emaemp);

		$copyObj->setCodpos($this->codpos);

		$copyObj->setTalpan($this->talpan);

		$copyObj->setTalcam($this->talcam);

		$copyObj->setTalcal($this->talcal);

		$copyObj->setDerzur($this->derzur);

		$copyObj->setFecing($this->fecing);

		$copyObj->setFecret($this->fecret);

		$copyObj->setFecrei($this->fecrei);

		$copyObj->setFecadmpub($this->fecadmpub);

		$copyObj->setStaemp($this->staemp);

		$copyObj->setFotemp($this->fotemp);

		$copyObj->setNumsso($this->numsso);

		$copyObj->setNumpolseg($this->numpolseg);

		$copyObj->setFeccotsso($this->feccotsso);

		$copyObj->setAnoadmpub($this->anoadmpub);

		$copyObj->setCodtippag($this->codtippag);

		$copyObj->setCodban($this->codban);

		$copyObj->setTipcue($this->tipcue);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setObsemp($this->obsemp);

		$copyObj->setTiefid($this->tiefid);

		$copyObj->setGrulab($this->grulab);

		$copyObj->setGruotr($this->gruotr);

		$copyObj->setTraslado($this->traslado);

		$copyObj->setTraotr($this->traotr);

		$copyObj->setTipviv($this->tipviv);

		$copyObj->setVivotr($this->vivotr);

		$copyObj->setForten($this->forten);

		$copyObj->setTenotr($this->tenotr);

		$copyObj->setSercon($this->sercon);

		$copyObj->setDirotr($this->dirotr);

		$copyObj->setTelotr($this->telotr);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodpa2($this->codpa2);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodes2($this->codes2);

		$copyObj->setCodci2($this->codci2);

		$copyObj->setCodrac($this->codrac);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setTelha2($this->telha2);

		$copyObj->setTelot2($this->telot2);

		$copyObj->setCodprofes($this->codprofes);

		$copyObj->setHcmexo($this->hcmexo);

		$copyObj->setCodbanfid($this->codbanfid);

		$copyObj->setCodbanlph($this->codbanlph);

		$copyObj->setNumcuefid($this->numcuefid);

		$copyObj->setNumcuelph($this->numcuelph);

		$copyObj->setCodempant($this->codempant);

		$copyObj->setGrusan($this->grusan);

		$copyObj->setObsgen($this->obsgen);

		$copyObj->setCodregpai($this->codregpai);

		$copyObj->setCodregest($this->codregest);

		$copyObj->setCodregciu($this->codregciu);

		$copyObj->setFecgra($this->fecgra);

		$copyObj->setGrusangre($this->grusangre);

		$copyObj->setNumgaceta($this->numgaceta);

		$copyObj->setFecgaceta($this->fecgaceta);

		$copyObj->setDiagra($this->diagra);

		$copyObj->setMesgra($this->mesgra);

		$copyObj->setAnogra($this->anogra);

		$copyObj->setTemporal($this->temporal);

		$copyObj->setDetexp($this->detexp);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setModpagcestic($this->modpagcestic);

		$copyObj->setCodret($this->codret);

		$copyObj->setSituac($this->situac);

		$copyObj->setProfes($this->profes);

		$copyObj->setCodnivedu($this->codnivedu);

		$copyObj->setUbifis($this->ubifis);

		$copyObj->setTipcueaho($this->tipcueaho);

		$copyObj->setNumcueaho($this->numcueaho);

		$copyObj->setFeccoracu($this->feccoracu);

		$copyObj->setCapactacu($this->capactacu);

		$copyObj->setIntacu($this->intacu);

		$copyObj->setAntacu($this->antacu);

		$copyObj->setDiaacu($this->diaacu);

		$copyObj->setDiaadiacu($this->diaadiacu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getNphojintincs() as $relObj) {
				$copyObj->addNphojintinc($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new NphojintPeer();
		}
		return self::$peer;
	}

	
	public function initNphojintincs()
	{
		if ($this->collNphojintincs === null) {
			$this->collNphojintincs = array();
		}
	}

	
	public function getNphojintincs($criteria = null, $con = null)
	{
				include_once 'lib/model/nomina/om/BaseNphojintincPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNphojintincs === null) {
			if ($this->isNew()) {
			   $this->collNphojintincs = array();
			} else {

				$criteria->add(NphojintincPeer::CODEMP, $this->getCodemp());

				NphojintincPeer::addSelectColumns($criteria);
				$this->collNphojintincs = NphojintincPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NphojintincPeer::CODEMP, $this->getCodemp());

				NphojintincPeer::addSelectColumns($criteria);
				if (!isset($this->lastNphojintincCriteria) || !$this->lastNphojintincCriteria->equals($criteria)) {
					$this->collNphojintincs = NphojintincPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNphojintincCriteria = $criteria;
		return $this->collNphojintincs;
	}

	
	public function countNphojintincs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/nomina/om/BaseNphojintincPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NphojintincPeer::CODEMP, $this->getCodemp());

		return NphojintincPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNphojintinc(Nphojintinc $l)
	{
		$this->collNphojintincs[] = $l;
		$l->setNphojint($this);
	}


	
	public function getNphojintincsJoinNpincapa($criteria = null, $con = null)
	{
				include_once 'lib/model/nomina/om/BaseNphojintincPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNphojintincs === null) {
			if ($this->isNew()) {
				$this->collNphojintincs = array();
			} else {

				$criteria->add(NphojintincPeer::CODEMP, $this->getCodemp());

				$this->collNphojintincs = NphojintincPeer::doSelectJoinNpincapa($criteria, $con);
			}
		} else {
									
			$criteria->add(NphojintincPeer::CODEMP, $this->getCodemp());

			if (!isset($this->lastNphojintincCriteria) || !$this->lastNphojintincCriteria->equals($criteria)) {
				$this->collNphojintincs = NphojintincPeer::doSelectJoinNpincapa($criteria, $con);
			}
		}
		$this->lastNphojintincCriteria = $criteria;

		return $this->collNphojintincs;
	}

} 