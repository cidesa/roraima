<?php


abstract class BaseFcsollic1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $numlic;


	
	protected $fecsol;


	
	protected $feclic;


	
	protected $rifcon;


	
	protected $catcon;


	
	protected $rifrep;


	
	protected $nomneg;


	
	protected $tipinm;


	
	protected $tipest;


	
	protected $dirpri;


	
	protected $codrut;


	
	protected $capsoc;


	
	protected $horini;


	
	protected $horcie;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $discli;


	
	protected $disbar;


	
	protected $disdis;


	
	protected $disins;


	
	protected $disfun;


	
	protected $disest;


	
	protected $funres;


	
	protected $funrel;


	
	protected $fecres;


	
	protected $fecapr;


	
	protected $fecven;


	
	protected $tomo;


	
	protected $folio;


	
	protected $numero;


	
	protected $taslic;


	
	protected $deuanl;


	
	protected $deuacl;


	
	protected $implic;


	
	protected $deuanp;


	
	protected $deuacp;


	
	protected $stasol;


	
	protected $stalic;


	
	protected $stadec;


	
	protected $staliq;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $tipo;


	
	protected $estser;


	
	protected $telneg;


	
	protected $clacon;


	
	protected $capact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getNumlic()
  {

    return trim($this->numlic);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeclic($format = 'Y-m-d')
  {

    if ($this->feclic === null || $this->feclic === '') {
      return null;
    } elseif (!is_int($this->feclic)) {
            $ts = adodb_strtotime($this->feclic);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feclic] as date/time value: " . var_export($this->feclic, true));
      }
    } else {
      $ts = $this->feclic;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getCatcon()
  {

    return trim($this->catcon);

  }
  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getNomneg()
  {

    return trim($this->nomneg);

  }
  
  public function getTipinm()
  {

    return trim($this->tipinm);

  }
  
  public function getTipest()
  {

    return trim($this->tipest);

  }
  
  public function getDirpri()
  {

    return trim($this->dirpri);

  }
  
  public function getCodrut()
  {

    return trim($this->codrut);

  }
  
  public function getCapsoc($val=false)
  {

    if($val) return number_format($this->capsoc,2,',','.');
    else return $this->capsoc;

  }
  
  public function getHorini($format = 'Y-m-d')
  {

    if ($this->horini === null || $this->horini === '') {
      return null;
    } elseif (!is_int($this->horini)) {
            $ts = adodb_strtotime($this->horini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horini] as date/time value: " . var_export($this->horini, true));
      }
    } else {
      $ts = $this->horini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorcie($format = 'Y-m-d')
  {

    if ($this->horcie === null || $this->horcie === '') {
      return null;
    } elseif (!is_int($this->horcie)) {
            $ts = adodb_strtotime($this->horcie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horcie] as date/time value: " . var_export($this->horcie, true));
      }
    } else {
      $ts = $this->horcie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDiscli($val=false)
  {

    if($val) return number_format($this->discli,2,',','.');
    else return $this->discli;

  }
  
  public function getDisbar($val=false)
  {

    if($val) return number_format($this->disbar,2,',','.');
    else return $this->disbar;

  }
  
  public function getDisdis($val=false)
  {

    if($val) return number_format($this->disdis,2,',','.');
    else return $this->disdis;

  }
  
  public function getDisins($val=false)
  {

    if($val) return number_format($this->disins,2,',','.');
    else return $this->disins;

  }
  
  public function getDisfun($val=false)
  {

    if($val) return number_format($this->disfun,2,',','.');
    else return $this->disfun;

  }
  
  public function getDisest($val=false)
  {

    if($val) return number_format($this->disest,2,',','.');
    else return $this->disest;

  }
  
  public function getFunres()
  {

    return trim($this->funres);

  }
  
  public function getFunrel()
  {

    return trim($this->funrel);

  }
  
  public function getFecres($format = 'Y-m-d')
  {

    if ($this->fecres === null || $this->fecres === '') {
      return null;
    } elseif (!is_int($this->fecres)) {
            $ts = adodb_strtotime($this->fecres);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
      }
    } else {
      $ts = $this->fecres;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecapr($format = 'Y-m-d')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTomo()
  {

    return trim($this->tomo);

  }
  
  public function getFolio()
  {

    return trim($this->folio);

  }
  
  public function getNumero()
  {

    return trim($this->numero);

  }
  
  public function getTaslic($val=false)
  {

    if($val) return number_format($this->taslic,2,',','.');
    else return $this->taslic;

  }
  
  public function getDeuanl($val=false)
  {

    if($val) return number_format($this->deuanl,2,',','.');
    else return $this->deuanl;

  }
  
  public function getDeuacl($val=false)
  {

    if($val) return number_format($this->deuacl,2,',','.');
    else return $this->deuacl;

  }
  
  public function getImplic($val=false)
  {

    if($val) return number_format($this->implic,2,',','.');
    else return $this->implic;

  }
  
  public function getDeuanp($val=false)
  {

    if($val) return number_format($this->deuanp,2,',','.');
    else return $this->deuanp;

  }
  
  public function getDeuacp($val=false)
  {

    if($val) return number_format($this->deuacp,2,',','.');
    else return $this->deuacp;

  }
  
  public function getStasol()
  {

    return trim($this->stasol);

  }
  
  public function getStalic()
  {

    return trim($this->stalic);

  }
  
  public function getStadec()
  {

    return trim($this->stadec);

  }
  
  public function getStaliq()
  {

    return trim($this->staliq);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getEstser()
  {

    return trim($this->estser);

  }
  
  public function getTelneg()
  {

    return trim($this->telneg);

  }
  
  public function getClacon()
  {

    return trim($this->clacon);

  }
  
  public function getCapact($val=false)
  {

    if($val) return number_format($this->capact,2,',','.');
    else return $this->capact;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::NUMSOL;
      }
  
	} 
	
	public function setNumlic($v)
	{

    if ($this->numlic !== $v) {
        $this->numlic = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::NUMLIC;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECSOL;
    }

	} 
	
	public function setFeclic($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feclic] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feclic !== $ts) {
      $this->feclic = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECLIC;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::RIFCON;
      }
  
	} 
	
	public function setCatcon($v)
	{

    if ($this->catcon !== $v) {
        $this->catcon = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::CATCON;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::RIFREP;
      }
  
	} 
	
	public function setNomneg($v)
	{

    if ($this->nomneg !== $v) {
        $this->nomneg = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::NOMNEG;
      }
  
	} 
	
	public function setTipinm($v)
	{

    if ($this->tipinm !== $v) {
        $this->tipinm = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::TIPINM;
      }
  
	} 
	
	public function setTipest($v)
	{

    if ($this->tipest !== $v) {
        $this->tipest = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::TIPEST;
      }
  
	} 
	
	public function setDirpri($v)
	{

    if ($this->dirpri !== $v) {
        $this->dirpri = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::DIRPRI;
      }
  
	} 
	
	public function setCodrut($v)
	{

    if ($this->codrut !== $v) {
        $this->codrut = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::CODRUT;
      }
  
	} 
	
	public function setCapsoc($v)
	{

    if ($this->capsoc !== $v) {
        $this->capsoc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::CAPSOC;
      }
  
	} 
	
	public function setHorini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horini !== $ts) {
      $this->horini = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::HORINI;
    }

	} 
	
	public function setHorcie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horcie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horcie !== $ts) {
      $this->horcie = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::HORCIE;
    }

	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECFIN;
    }

	} 
	
	public function setDiscli($v)
	{

    if ($this->discli !== $v) {
        $this->discli = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DISCLI;
      }
  
	} 
	
	public function setDisbar($v)
	{

    if ($this->disbar !== $v) {
        $this->disbar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DISBAR;
      }
  
	} 
	
	public function setDisdis($v)
	{

    if ($this->disdis !== $v) {
        $this->disdis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DISDIS;
      }
  
	} 
	
	public function setDisins($v)
	{

    if ($this->disins !== $v) {
        $this->disins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DISINS;
      }
  
	} 
	
	public function setDisfun($v)
	{

    if ($this->disfun !== $v) {
        $this->disfun = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DISFUN;
      }
  
	} 
	
	public function setDisest($v)
	{

    if ($this->disest !== $v) {
        $this->disest = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DISEST;
      }
  
	} 
	
	public function setFunres($v)
	{

    if ($this->funres !== $v) {
        $this->funres = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::FUNRES;
      }
  
	} 
	
	public function setFunrel($v)
	{

    if ($this->funrel !== $v) {
        $this->funrel = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::FUNREL;
      }
  
	} 
	
	public function setFecres($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECRES;
    }

	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECAPR;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = Fcsollic1Peer::FECVEN;
    }

	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::TOMO;
      }
  
	} 
	
	public function setFolio($v)
	{

    if ($this->folio !== $v) {
        $this->folio = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::FOLIO;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::NUMERO;
      }
  
	} 
	
	public function setTaslic($v)
	{

    if ($this->taslic !== $v) {
        $this->taslic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::TASLIC;
      }
  
	} 
	
	public function setDeuanl($v)
	{

    if ($this->deuanl !== $v) {
        $this->deuanl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DEUANL;
      }
  
	} 
	
	public function setDeuacl($v)
	{

    if ($this->deuacl !== $v) {
        $this->deuacl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DEUACL;
      }
  
	} 
	
	public function setImplic($v)
	{

    if ($this->implic !== $v) {
        $this->implic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::IMPLIC;
      }
  
	} 
	
	public function setDeuanp($v)
	{

    if ($this->deuanp !== $v) {
        $this->deuanp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DEUANP;
      }
  
	} 
	
	public function setDeuacp($v)
	{

    if ($this->deuacp !== $v) {
        $this->deuacp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::DEUACP;
      }
  
	} 
	
	public function setStasol($v)
	{

    if ($this->stasol !== $v) {
        $this->stasol = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::STASOL;
      }
  
	} 
	
	public function setStalic($v)
	{

    if ($this->stalic !== $v) {
        $this->stalic = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::STALIC;
      }
  
	} 
	
	public function setStadec($v)
	{

    if ($this->stadec !== $v) {
        $this->stadec = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::STADEC;
      }
  
	} 
	
	public function setStaliq($v)
	{

    if ($this->staliq !== $v) {
        $this->staliq = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::STALIQ;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::DIRCON;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::TIPO;
      }
  
	} 
	
	public function setEstser($v)
	{

    if ($this->estser !== $v) {
        $this->estser = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::ESTSER;
      }
  
	} 
	
	public function setTelneg($v)
	{

    if ($this->telneg !== $v) {
        $this->telneg = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::TELNEG;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::CLACON;
      }
  
	} 
	
	public function setCapact($v)
	{

    if ($this->capact !== $v) {
        $this->capact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Fcsollic1Peer::CAPACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Fcsollic1Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->numlic = $rs->getString($startcol + 1);

      $this->fecsol = $rs->getDate($startcol + 2, null);

      $this->feclic = $rs->getDate($startcol + 3, null);

      $this->rifcon = $rs->getString($startcol + 4);

      $this->catcon = $rs->getString($startcol + 5);

      $this->rifrep = $rs->getString($startcol + 6);

      $this->nomneg = $rs->getString($startcol + 7);

      $this->tipinm = $rs->getString($startcol + 8);

      $this->tipest = $rs->getString($startcol + 9);

      $this->dirpri = $rs->getString($startcol + 10);

      $this->codrut = $rs->getString($startcol + 11);

      $this->capsoc = $rs->getFloat($startcol + 12);

      $this->horini = $rs->getDate($startcol + 13, null);

      $this->horcie = $rs->getDate($startcol + 14, null);

      $this->fecini = $rs->getDate($startcol + 15, null);

      $this->fecfin = $rs->getDate($startcol + 16, null);

      $this->discli = $rs->getFloat($startcol + 17);

      $this->disbar = $rs->getFloat($startcol + 18);

      $this->disdis = $rs->getFloat($startcol + 19);

      $this->disins = $rs->getFloat($startcol + 20);

      $this->disfun = $rs->getFloat($startcol + 21);

      $this->disest = $rs->getFloat($startcol + 22);

      $this->funres = $rs->getString($startcol + 23);

      $this->funrel = $rs->getString($startcol + 24);

      $this->fecres = $rs->getDate($startcol + 25, null);

      $this->fecapr = $rs->getDate($startcol + 26, null);

      $this->fecven = $rs->getDate($startcol + 27, null);

      $this->tomo = $rs->getString($startcol + 28);

      $this->folio = $rs->getString($startcol + 29);

      $this->numero = $rs->getString($startcol + 30);

      $this->taslic = $rs->getFloat($startcol + 31);

      $this->deuanl = $rs->getFloat($startcol + 32);

      $this->deuacl = $rs->getFloat($startcol + 33);

      $this->implic = $rs->getFloat($startcol + 34);

      $this->deuanp = $rs->getFloat($startcol + 35);

      $this->deuacp = $rs->getFloat($startcol + 36);

      $this->stasol = $rs->getString($startcol + 37);

      $this->stalic = $rs->getString($startcol + 38);

      $this->stadec = $rs->getString($startcol + 39);

      $this->staliq = $rs->getString($startcol + 40);

      $this->nomcon = $rs->getString($startcol + 41);

      $this->dircon = $rs->getString($startcol + 42);

      $this->tipo = $rs->getString($startcol + 43);

      $this->estser = $rs->getString($startcol + 44);

      $this->telneg = $rs->getString($startcol + 45);

      $this->clacon = $rs->getString($startcol + 46);

      $this->capact = $rs->getFloat($startcol + 47);

      $this->id = $rs->getInt($startcol + 48);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 49; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcsollic1 object", $e);
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
			$con = Propel::getConnection(Fcsollic1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcsollic1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcsollic1Peer::DATABASE_NAME);
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
					$pk = Fcsollic1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Fcsollic1Peer::doUpdate($this, $con);
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


			if (($retval = Fcsollic1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcsollic1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getNumlic();
				break;
			case 2:
				return $this->getFecsol();
				break;
			case 3:
				return $this->getFeclic();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getCatcon();
				break;
			case 6:
				return $this->getRifrep();
				break;
			case 7:
				return $this->getNomneg();
				break;
			case 8:
				return $this->getTipinm();
				break;
			case 9:
				return $this->getTipest();
				break;
			case 10:
				return $this->getDirpri();
				break;
			case 11:
				return $this->getCodrut();
				break;
			case 12:
				return $this->getCapsoc();
				break;
			case 13:
				return $this->getHorini();
				break;
			case 14:
				return $this->getHorcie();
				break;
			case 15:
				return $this->getFecini();
				break;
			case 16:
				return $this->getFecfin();
				break;
			case 17:
				return $this->getDiscli();
				break;
			case 18:
				return $this->getDisbar();
				break;
			case 19:
				return $this->getDisdis();
				break;
			case 20:
				return $this->getDisins();
				break;
			case 21:
				return $this->getDisfun();
				break;
			case 22:
				return $this->getDisest();
				break;
			case 23:
				return $this->getFunres();
				break;
			case 24:
				return $this->getFunrel();
				break;
			case 25:
				return $this->getFecres();
				break;
			case 26:
				return $this->getFecapr();
				break;
			case 27:
				return $this->getFecven();
				break;
			case 28:
				return $this->getTomo();
				break;
			case 29:
				return $this->getFolio();
				break;
			case 30:
				return $this->getNumero();
				break;
			case 31:
				return $this->getTaslic();
				break;
			case 32:
				return $this->getDeuanl();
				break;
			case 33:
				return $this->getDeuacl();
				break;
			case 34:
				return $this->getImplic();
				break;
			case 35:
				return $this->getDeuanp();
				break;
			case 36:
				return $this->getDeuacp();
				break;
			case 37:
				return $this->getStasol();
				break;
			case 38:
				return $this->getStalic();
				break;
			case 39:
				return $this->getStadec();
				break;
			case 40:
				return $this->getStaliq();
				break;
			case 41:
				return $this->getNomcon();
				break;
			case 42:
				return $this->getDircon();
				break;
			case 43:
				return $this->getTipo();
				break;
			case 44:
				return $this->getEstser();
				break;
			case 45:
				return $this->getTelneg();
				break;
			case 46:
				return $this->getClacon();
				break;
			case 47:
				return $this->getCapact();
				break;
			case 48:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcsollic1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getNumlic(),
			$keys[2] => $this->getFecsol(),
			$keys[3] => $this->getFeclic(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getCatcon(),
			$keys[6] => $this->getRifrep(),
			$keys[7] => $this->getNomneg(),
			$keys[8] => $this->getTipinm(),
			$keys[9] => $this->getTipest(),
			$keys[10] => $this->getDirpri(),
			$keys[11] => $this->getCodrut(),
			$keys[12] => $this->getCapsoc(),
			$keys[13] => $this->getHorini(),
			$keys[14] => $this->getHorcie(),
			$keys[15] => $this->getFecini(),
			$keys[16] => $this->getFecfin(),
			$keys[17] => $this->getDiscli(),
			$keys[18] => $this->getDisbar(),
			$keys[19] => $this->getDisdis(),
			$keys[20] => $this->getDisins(),
			$keys[21] => $this->getDisfun(),
			$keys[22] => $this->getDisest(),
			$keys[23] => $this->getFunres(),
			$keys[24] => $this->getFunrel(),
			$keys[25] => $this->getFecres(),
			$keys[26] => $this->getFecapr(),
			$keys[27] => $this->getFecven(),
			$keys[28] => $this->getTomo(),
			$keys[29] => $this->getFolio(),
			$keys[30] => $this->getNumero(),
			$keys[31] => $this->getTaslic(),
			$keys[32] => $this->getDeuanl(),
			$keys[33] => $this->getDeuacl(),
			$keys[34] => $this->getImplic(),
			$keys[35] => $this->getDeuanp(),
			$keys[36] => $this->getDeuacp(),
			$keys[37] => $this->getStasol(),
			$keys[38] => $this->getStalic(),
			$keys[39] => $this->getStadec(),
			$keys[40] => $this->getStaliq(),
			$keys[41] => $this->getNomcon(),
			$keys[42] => $this->getDircon(),
			$keys[43] => $this->getTipo(),
			$keys[44] => $this->getEstser(),
			$keys[45] => $this->getTelneg(),
			$keys[46] => $this->getClacon(),
			$keys[47] => $this->getCapact(),
			$keys[48] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcsollic1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setNumlic($value);
				break;
			case 2:
				$this->setFecsol($value);
				break;
			case 3:
				$this->setFeclic($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setCatcon($value);
				break;
			case 6:
				$this->setRifrep($value);
				break;
			case 7:
				$this->setNomneg($value);
				break;
			case 8:
				$this->setTipinm($value);
				break;
			case 9:
				$this->setTipest($value);
				break;
			case 10:
				$this->setDirpri($value);
				break;
			case 11:
				$this->setCodrut($value);
				break;
			case 12:
				$this->setCapsoc($value);
				break;
			case 13:
				$this->setHorini($value);
				break;
			case 14:
				$this->setHorcie($value);
				break;
			case 15:
				$this->setFecini($value);
				break;
			case 16:
				$this->setFecfin($value);
				break;
			case 17:
				$this->setDiscli($value);
				break;
			case 18:
				$this->setDisbar($value);
				break;
			case 19:
				$this->setDisdis($value);
				break;
			case 20:
				$this->setDisins($value);
				break;
			case 21:
				$this->setDisfun($value);
				break;
			case 22:
				$this->setDisest($value);
				break;
			case 23:
				$this->setFunres($value);
				break;
			case 24:
				$this->setFunrel($value);
				break;
			case 25:
				$this->setFecres($value);
				break;
			case 26:
				$this->setFecapr($value);
				break;
			case 27:
				$this->setFecven($value);
				break;
			case 28:
				$this->setTomo($value);
				break;
			case 29:
				$this->setFolio($value);
				break;
			case 30:
				$this->setNumero($value);
				break;
			case 31:
				$this->setTaslic($value);
				break;
			case 32:
				$this->setDeuanl($value);
				break;
			case 33:
				$this->setDeuacl($value);
				break;
			case 34:
				$this->setImplic($value);
				break;
			case 35:
				$this->setDeuanp($value);
				break;
			case 36:
				$this->setDeuacp($value);
				break;
			case 37:
				$this->setStasol($value);
				break;
			case 38:
				$this->setStalic($value);
				break;
			case 39:
				$this->setStadec($value);
				break;
			case 40:
				$this->setStaliq($value);
				break;
			case 41:
				$this->setNomcon($value);
				break;
			case 42:
				$this->setDircon($value);
				break;
			case 43:
				$this->setTipo($value);
				break;
			case 44:
				$this->setEstser($value);
				break;
			case 45:
				$this->setTelneg($value);
				break;
			case 46:
				$this->setClacon($value);
				break;
			case 47:
				$this->setCapact($value);
				break;
			case 48:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcsollic1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumlic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeclic($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRifrep($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomneg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipinm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipest($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirpri($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodrut($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCapsoc($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setHorini($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setHorcie($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecini($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecfin($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDiscli($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDisbar($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDisdis($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDisins($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDisfun($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDisest($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFunres($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFunrel($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecres($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFecapr($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFecven($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTomo($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setFolio($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNumero($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTaslic($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setDeuanl($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setDeuacl($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setImplic($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setDeuanp($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setDeuacp($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setStasol($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setStalic($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setStadec($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setStaliq($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setNomcon($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setDircon($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setTipo($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setEstser($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setTelneg($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setClacon($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setCapact($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setId($arr[$keys[48]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcsollic1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcsollic1Peer::NUMSOL)) $criteria->add(Fcsollic1Peer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(Fcsollic1Peer::NUMLIC)) $criteria->add(Fcsollic1Peer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(Fcsollic1Peer::FECSOL)) $criteria->add(Fcsollic1Peer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(Fcsollic1Peer::FECLIC)) $criteria->add(Fcsollic1Peer::FECLIC, $this->feclic);
		if ($this->isColumnModified(Fcsollic1Peer::RIFCON)) $criteria->add(Fcsollic1Peer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(Fcsollic1Peer::CATCON)) $criteria->add(Fcsollic1Peer::CATCON, $this->catcon);
		if ($this->isColumnModified(Fcsollic1Peer::RIFREP)) $criteria->add(Fcsollic1Peer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(Fcsollic1Peer::NOMNEG)) $criteria->add(Fcsollic1Peer::NOMNEG, $this->nomneg);
		if ($this->isColumnModified(Fcsollic1Peer::TIPINM)) $criteria->add(Fcsollic1Peer::TIPINM, $this->tipinm);
		if ($this->isColumnModified(Fcsollic1Peer::TIPEST)) $criteria->add(Fcsollic1Peer::TIPEST, $this->tipest);
		if ($this->isColumnModified(Fcsollic1Peer::DIRPRI)) $criteria->add(Fcsollic1Peer::DIRPRI, $this->dirpri);
		if ($this->isColumnModified(Fcsollic1Peer::CODRUT)) $criteria->add(Fcsollic1Peer::CODRUT, $this->codrut);
		if ($this->isColumnModified(Fcsollic1Peer::CAPSOC)) $criteria->add(Fcsollic1Peer::CAPSOC, $this->capsoc);
		if ($this->isColumnModified(Fcsollic1Peer::HORINI)) $criteria->add(Fcsollic1Peer::HORINI, $this->horini);
		if ($this->isColumnModified(Fcsollic1Peer::HORCIE)) $criteria->add(Fcsollic1Peer::HORCIE, $this->horcie);
		if ($this->isColumnModified(Fcsollic1Peer::FECINI)) $criteria->add(Fcsollic1Peer::FECINI, $this->fecini);
		if ($this->isColumnModified(Fcsollic1Peer::FECFIN)) $criteria->add(Fcsollic1Peer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(Fcsollic1Peer::DISCLI)) $criteria->add(Fcsollic1Peer::DISCLI, $this->discli);
		if ($this->isColumnModified(Fcsollic1Peer::DISBAR)) $criteria->add(Fcsollic1Peer::DISBAR, $this->disbar);
		if ($this->isColumnModified(Fcsollic1Peer::DISDIS)) $criteria->add(Fcsollic1Peer::DISDIS, $this->disdis);
		if ($this->isColumnModified(Fcsollic1Peer::DISINS)) $criteria->add(Fcsollic1Peer::DISINS, $this->disins);
		if ($this->isColumnModified(Fcsollic1Peer::DISFUN)) $criteria->add(Fcsollic1Peer::DISFUN, $this->disfun);
		if ($this->isColumnModified(Fcsollic1Peer::DISEST)) $criteria->add(Fcsollic1Peer::DISEST, $this->disest);
		if ($this->isColumnModified(Fcsollic1Peer::FUNRES)) $criteria->add(Fcsollic1Peer::FUNRES, $this->funres);
		if ($this->isColumnModified(Fcsollic1Peer::FUNREL)) $criteria->add(Fcsollic1Peer::FUNREL, $this->funrel);
		if ($this->isColumnModified(Fcsollic1Peer::FECRES)) $criteria->add(Fcsollic1Peer::FECRES, $this->fecres);
		if ($this->isColumnModified(Fcsollic1Peer::FECAPR)) $criteria->add(Fcsollic1Peer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(Fcsollic1Peer::FECVEN)) $criteria->add(Fcsollic1Peer::FECVEN, $this->fecven);
		if ($this->isColumnModified(Fcsollic1Peer::TOMO)) $criteria->add(Fcsollic1Peer::TOMO, $this->tomo);
		if ($this->isColumnModified(Fcsollic1Peer::FOLIO)) $criteria->add(Fcsollic1Peer::FOLIO, $this->folio);
		if ($this->isColumnModified(Fcsollic1Peer::NUMERO)) $criteria->add(Fcsollic1Peer::NUMERO, $this->numero);
		if ($this->isColumnModified(Fcsollic1Peer::TASLIC)) $criteria->add(Fcsollic1Peer::TASLIC, $this->taslic);
		if ($this->isColumnModified(Fcsollic1Peer::DEUANL)) $criteria->add(Fcsollic1Peer::DEUANL, $this->deuanl);
		if ($this->isColumnModified(Fcsollic1Peer::DEUACL)) $criteria->add(Fcsollic1Peer::DEUACL, $this->deuacl);
		if ($this->isColumnModified(Fcsollic1Peer::IMPLIC)) $criteria->add(Fcsollic1Peer::IMPLIC, $this->implic);
		if ($this->isColumnModified(Fcsollic1Peer::DEUANP)) $criteria->add(Fcsollic1Peer::DEUANP, $this->deuanp);
		if ($this->isColumnModified(Fcsollic1Peer::DEUACP)) $criteria->add(Fcsollic1Peer::DEUACP, $this->deuacp);
		if ($this->isColumnModified(Fcsollic1Peer::STASOL)) $criteria->add(Fcsollic1Peer::STASOL, $this->stasol);
		if ($this->isColumnModified(Fcsollic1Peer::STALIC)) $criteria->add(Fcsollic1Peer::STALIC, $this->stalic);
		if ($this->isColumnModified(Fcsollic1Peer::STADEC)) $criteria->add(Fcsollic1Peer::STADEC, $this->stadec);
		if ($this->isColumnModified(Fcsollic1Peer::STALIQ)) $criteria->add(Fcsollic1Peer::STALIQ, $this->staliq);
		if ($this->isColumnModified(Fcsollic1Peer::NOMCON)) $criteria->add(Fcsollic1Peer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(Fcsollic1Peer::DIRCON)) $criteria->add(Fcsollic1Peer::DIRCON, $this->dircon);
		if ($this->isColumnModified(Fcsollic1Peer::TIPO)) $criteria->add(Fcsollic1Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Fcsollic1Peer::ESTSER)) $criteria->add(Fcsollic1Peer::ESTSER, $this->estser);
		if ($this->isColumnModified(Fcsollic1Peer::TELNEG)) $criteria->add(Fcsollic1Peer::TELNEG, $this->telneg);
		if ($this->isColumnModified(Fcsollic1Peer::CLACON)) $criteria->add(Fcsollic1Peer::CLACON, $this->clacon);
		if ($this->isColumnModified(Fcsollic1Peer::CAPACT)) $criteria->add(Fcsollic1Peer::CAPACT, $this->capact);
		if ($this->isColumnModified(Fcsollic1Peer::ID)) $criteria->add(Fcsollic1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcsollic1Peer::DATABASE_NAME);

		$criteria->add(Fcsollic1Peer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumlic($this->numlic);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setFeclic($this->feclic);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setCatcon($this->catcon);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setNomneg($this->nomneg);

		$copyObj->setTipinm($this->tipinm);

		$copyObj->setTipest($this->tipest);

		$copyObj->setDirpri($this->dirpri);

		$copyObj->setCodrut($this->codrut);

		$copyObj->setCapsoc($this->capsoc);

		$copyObj->setHorini($this->horini);

		$copyObj->setHorcie($this->horcie);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setDiscli($this->discli);

		$copyObj->setDisbar($this->disbar);

		$copyObj->setDisdis($this->disdis);

		$copyObj->setDisins($this->disins);

		$copyObj->setDisfun($this->disfun);

		$copyObj->setDisest($this->disest);

		$copyObj->setFunres($this->funres);

		$copyObj->setFunrel($this->funrel);

		$copyObj->setFecres($this->fecres);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setFecven($this->fecven);

		$copyObj->setTomo($this->tomo);

		$copyObj->setFolio($this->folio);

		$copyObj->setNumero($this->numero);

		$copyObj->setTaslic($this->taslic);

		$copyObj->setDeuanl($this->deuanl);

		$copyObj->setDeuacl($this->deuacl);

		$copyObj->setImplic($this->implic);

		$copyObj->setDeuanp($this->deuanp);

		$copyObj->setDeuacp($this->deuacp);

		$copyObj->setStasol($this->stasol);

		$copyObj->setStalic($this->stalic);

		$copyObj->setStadec($this->stadec);

		$copyObj->setStaliq($this->staliq);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTipo($this->tipo);

		$copyObj->setEstser($this->estser);

		$copyObj->setTelneg($this->telneg);

		$copyObj->setClacon($this->clacon);

		$copyObj->setCapact($this->capact);


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
			self::$peer = new Fcsollic1Peer();
		}
		return self::$peer;
	}

} 