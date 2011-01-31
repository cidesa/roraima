<?php


abstract class BaseFcmodlic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmod;


	
	protected $fecmod;


	
	protected $motmod;


	
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


	
	protected $estser = '';


	
	protected $telneg;


	
	protected $clacon;


	
	protected $capact;


	
	protected $numsol1;


	
	protected $numlic1;


	
	protected $horainie;


	
	protected $horaciee;


	
	protected $unitri;


	
	protected $tipsol;


	
	protected $unitrialc;


	
	protected $unitriotr;


	
	protected $licant;


	
	protected $dueant;


	
	protected $dirant;


	
	protected $impext;


	
	protected $imptotal;


	
	protected $codact;


	
	protected $codtiplic;


	
	protected $fecinilic;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefmod()
  {

    return trim($this->refmod);

  }
  
  public function getFecmod($format = 'Y-m-d')
  {

    if ($this->fecmod === null || $this->fecmod === '') {
      return null;
    } elseif (!is_int($this->fecmod)) {
            $ts = adodb_strtotime($this->fecmod);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmod] as date/time value: " . var_export($this->fecmod, true));
      }
    } else {
      $ts = $this->fecmod;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMotmod()
  {

    return trim($this->motmod);

  }
  
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
  
  public function getNumsol1()
  {

    return trim($this->numsol1);

  }
  
  public function getNumlic1()
  {

    return trim($this->numlic1);

  }
  
  public function getHorainie($format = 'Y-m-d')
  {

    if ($this->horainie === null || $this->horainie === '') {
      return null;
    } elseif (!is_int($this->horainie)) {
            $ts = adodb_strtotime($this->horainie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horainie] as date/time value: " . var_export($this->horainie, true));
      }
    } else {
      $ts = $this->horainie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHoraciee($format = 'Y-m-d')
  {

    if ($this->horaciee === null || $this->horaciee === '') {
      return null;
    } elseif (!is_int($this->horaciee)) {
            $ts = adodb_strtotime($this->horaciee);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horaciee] as date/time value: " . var_export($this->horaciee, true));
      }
    } else {
      $ts = $this->horaciee;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getTipsol()
  {

    return trim($this->tipsol);

  }
  
  public function getUnitrialc($val=false)
  {

    if($val) return number_format($this->unitrialc,2,',','.');
    else return $this->unitrialc;

  }
  
  public function getUnitriotr($val=false)
  {

    if($val) return number_format($this->unitriotr,2,',','.');
    else return $this->unitriotr;

  }
  
  public function getLicant()
  {

    return trim($this->licant);

  }
  
  public function getDueant()
  {

    return trim($this->dueant);

  }
  
  public function getDirant()
  {

    return trim($this->dirant);

  }
  
  public function getImpext($val=false)
  {

    if($val) return number_format($this->impext,2,',','.');
    else return $this->impext;

  }
  
  public function getImptotal($val=false)
  {

    if($val) return number_format($this->imptotal,2,',','.');
    else return $this->imptotal;

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodtiplic()
  {

    return trim($this->codtiplic);

  }
  
  public function getFecinilic($format = 'Y-m-d')
  {

    if ($this->fecinilic === null || $this->fecinilic === '') {
      return null;
    } elseif (!is_int($this->fecinilic)) {
            $ts = adodb_strtotime($this->fecinilic);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinilic] as date/time value: " . var_export($this->fecinilic, true));
      }
    } else {
      $ts = $this->fecinilic;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefmod($v)
	{

    if ($this->refmod !== $v) {
        $this->refmod = $v;
        $this->modifiedColumns[] = FcmodlicPeer::REFMOD;
      }
  
	} 
	
	public function setFecmod($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmod] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmod !== $ts) {
      $this->fecmod = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECMOD;
    }

	} 
	
	public function setMotmod($v)
	{

    if ($this->motmod !== $v) {
        $this->motmod = $v;
        $this->modifiedColumns[] = FcmodlicPeer::MOTMOD;
      }
  
	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NUMSOL;
      }
  
	} 
	
	public function setNumlic($v)
	{

    if ($this->numlic !== $v) {
        $this->numlic = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NUMLIC;
      }
  
	} 
	
	public function setFecsol($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECSOL;
    }

	} 
	
	public function setFeclic($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feclic] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feclic !== $ts) {
      $this->feclic = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECLIC;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcmodlicPeer::RIFCON;
      }
  
	} 
	
	public function setCatcon($v)
	{

    if ($this->catcon !== $v) {
        $this->catcon = $v;
        $this->modifiedColumns[] = FcmodlicPeer::CATCON;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcmodlicPeer::RIFREP;
      }
  
	} 
	
	public function setNomneg($v)
	{

    if ($this->nomneg !== $v) {
        $this->nomneg = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NOMNEG;
      }
  
	} 
	
	public function setTipinm($v)
	{

    if ($this->tipinm !== $v) {
        $this->tipinm = $v;
        $this->modifiedColumns[] = FcmodlicPeer::TIPINM;
      }
  
	} 
	
	public function setTipest($v)
	{

    if ($this->tipest !== $v) {
        $this->tipest = $v;
        $this->modifiedColumns[] = FcmodlicPeer::TIPEST;
      }
  
	} 
	
	public function setDirpri($v)
	{

    if ($this->dirpri !== $v) {
        $this->dirpri = $v;
        $this->modifiedColumns[] = FcmodlicPeer::DIRPRI;
      }
  
	} 
	
	public function setCodrut($v)
	{

    if ($this->codrut !== $v) {
        $this->codrut = $v;
        $this->modifiedColumns[] = FcmodlicPeer::CODRUT;
      }
  
	} 
	
	public function setCapsoc($v)
	{

    if ($this->capsoc !== $v) {
        $this->capsoc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::CAPSOC;
      }
  
	} 
	
	public function setHorini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horini !== $ts) {
      $this->horini = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::HORINI;
    }

	} 
	
	public function setHorcie($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horcie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horcie !== $ts) {
      $this->horcie = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::HORCIE;
    }

	} 
	
	public function setFecini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECFIN;
    }

	} 
	
	public function setDiscli($v)
	{

    if ($this->discli !== $v) {
        $this->discli = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DISCLI;
      }
  
	} 
	
	public function setDisbar($v)
	{

    if ($this->disbar !== $v) {
        $this->disbar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DISBAR;
      }
  
	} 
	
	public function setDisdis($v)
	{

    if ($this->disdis !== $v) {
        $this->disdis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DISDIS;
      }
  
	} 
	
	public function setDisins($v)
	{

    if ($this->disins !== $v) {
        $this->disins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DISINS;
      }
  
	} 
	
	public function setDisfun($v)
	{

    if ($this->disfun !== $v) {
        $this->disfun = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DISFUN;
      }
  
	} 
	
	public function setDisest($v)
	{

    if ($this->disest !== $v) {
        $this->disest = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DISEST;
      }
  
	} 
	
	public function setFunres($v)
	{

    if ($this->funres !== $v) {
        $this->funres = $v;
        $this->modifiedColumns[] = FcmodlicPeer::FUNRES;
      }
  
	} 
	
	public function setFunrel($v)
	{

    if ($this->funrel !== $v) {
        $this->funrel = $v;
        $this->modifiedColumns[] = FcmodlicPeer::FUNREL;
      }
  
	} 
	
	public function setFecres($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECRES;
    }

	} 
	
	public function setFecapr($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECAPR;
    }

	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECVEN;
    }

	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = FcmodlicPeer::TOMO;
      }
  
	} 
	
	public function setFolio($v)
	{

    if ($this->folio !== $v) {
        $this->folio = $v;
        $this->modifiedColumns[] = FcmodlicPeer::FOLIO;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NUMERO;
      }
  
	} 
	
	public function setTaslic($v)
	{

    if ($this->taslic !== $v) {
        $this->taslic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::TASLIC;
      }
  
	} 
	
	public function setDeuanl($v)
	{

    if ($this->deuanl !== $v) {
        $this->deuanl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DEUANL;
      }
  
	} 
	
	public function setDeuacl($v)
	{

    if ($this->deuacl !== $v) {
        $this->deuacl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DEUACL;
      }
  
	} 
	
	public function setImplic($v)
	{

    if ($this->implic !== $v) {
        $this->implic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::IMPLIC;
      }
  
	} 
	
	public function setDeuanp($v)
	{

    if ($this->deuanp !== $v) {
        $this->deuanp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DEUANP;
      }
  
	} 
	
	public function setDeuacp($v)
	{

    if ($this->deuacp !== $v) {
        $this->deuacp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::DEUACP;
      }
  
	} 
	
	public function setStasol($v)
	{

    if ($this->stasol !== $v) {
        $this->stasol = $v;
        $this->modifiedColumns[] = FcmodlicPeer::STASOL;
      }
  
	} 
	
	public function setStalic($v)
	{

    if ($this->stalic !== $v) {
        $this->stalic = $v;
        $this->modifiedColumns[] = FcmodlicPeer::STALIC;
      }
  
	} 
	
	public function setStadec($v)
	{

    if ($this->stadec !== $v) {
        $this->stadec = $v;
        $this->modifiedColumns[] = FcmodlicPeer::STADEC;
      }
  
	} 
	
	public function setStaliq($v)
	{

    if ($this->staliq !== $v) {
        $this->staliq = $v;
        $this->modifiedColumns[] = FcmodlicPeer::STALIQ;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcmodlicPeer::DIRCON;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcmodlicPeer::TIPO;
      }
  
	} 
	
	public function setEstser($v)
	{

    if ($this->estser !== $v || $v === '') {
        $this->estser = $v;
        $this->modifiedColumns[] = FcmodlicPeer::ESTSER;
      }
  
	} 
	
	public function setTelneg($v)
	{

    if ($this->telneg !== $v) {
        $this->telneg = $v;
        $this->modifiedColumns[] = FcmodlicPeer::TELNEG;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = FcmodlicPeer::CLACON;
      }
  
	} 
	
	public function setCapact($v)
	{

    if ($this->capact !== $v) {
        $this->capact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::CAPACT;
      }
  
	} 
	
	public function setNumsol1($v)
	{

    if ($this->numsol1 !== $v) {
        $this->numsol1 = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NUMSOL1;
      }
  
	} 
	
	public function setNumlic1($v)
	{

    if ($this->numlic1 !== $v) {
        $this->numlic1 = $v;
        $this->modifiedColumns[] = FcmodlicPeer::NUMLIC1;
      }
  
	} 
	
	public function setHorainie($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horainie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horainie !== $ts) {
      $this->horainie = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::HORAINIE;
    }

	} 
	
	public function setHoraciee($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horaciee] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horaciee !== $ts) {
      $this->horaciee = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::HORACIEE;
    }

	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::UNITRI;
      }
  
	} 
	
	public function setTipsol($v)
	{

    if ($this->tipsol !== $v) {
        $this->tipsol = $v;
        $this->modifiedColumns[] = FcmodlicPeer::TIPSOL;
      }
  
	} 
	
	public function setUnitrialc($v)
	{

    if ($this->unitrialc !== $v) {
        $this->unitrialc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::UNITRIALC;
      }
  
	} 
	
	public function setUnitriotr($v)
	{

    if ($this->unitriotr !== $v) {
        $this->unitriotr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::UNITRIOTR;
      }
  
	} 
	
	public function setLicant($v)
	{

    if ($this->licant !== $v) {
        $this->licant = $v;
        $this->modifiedColumns[] = FcmodlicPeer::LICANT;
      }
  
	} 
	
	public function setDueant($v)
	{

    if ($this->dueant !== $v) {
        $this->dueant = $v;
        $this->modifiedColumns[] = FcmodlicPeer::DUEANT;
      }
  
	} 
	
	public function setDirant($v)
	{

    if ($this->dirant !== $v) {
        $this->dirant = $v;
        $this->modifiedColumns[] = FcmodlicPeer::DIRANT;
      }
  
	} 
	
	public function setImpext($v)
	{

    if ($this->impext !== $v) {
        $this->impext = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::IMPEXT;
      }
  
	} 
	
	public function setImptotal($v)
	{

    if ($this->imptotal !== $v) {
        $this->imptotal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodlicPeer::IMPTOTAL;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FcmodlicPeer::CODACT;
      }
  
	} 
	
	public function setCodtiplic($v)
	{

    if ($this->codtiplic !== $v) {
        $this->codtiplic = $v;
        $this->modifiedColumns[] = FcmodlicPeer::CODTIPLIC;
      }
  
	} 
	
	public function setFecinilic($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinilic] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinilic !== $ts) {
      $this->fecinilic = $ts;
      $this->modifiedColumns[] = FcmodlicPeer::FECINILIC;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcmodlicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refmod = $rs->getString($startcol + 0);

      $this->fecmod = $rs->getDate($startcol + 1, null);

      $this->motmod = $rs->getString($startcol + 2);

      $this->numsol = $rs->getString($startcol + 3);

      $this->numlic = $rs->getString($startcol + 4);

      $this->fecsol = $rs->getDate($startcol + 5, null);

      $this->feclic = $rs->getDate($startcol + 6, null);

      $this->rifcon = $rs->getString($startcol + 7);

      $this->catcon = $rs->getString($startcol + 8);

      $this->rifrep = $rs->getString($startcol + 9);

      $this->nomneg = $rs->getString($startcol + 10);

      $this->tipinm = $rs->getString($startcol + 11);

      $this->tipest = $rs->getString($startcol + 12);

      $this->dirpri = $rs->getString($startcol + 13);

      $this->codrut = $rs->getString($startcol + 14);

      $this->capsoc = $rs->getFloat($startcol + 15);

      $this->horini = $rs->getDate($startcol + 16, null);

      $this->horcie = $rs->getDate($startcol + 17, null);

      $this->fecini = $rs->getDate($startcol + 18, null);

      $this->fecfin = $rs->getDate($startcol + 19, null);

      $this->discli = $rs->getFloat($startcol + 20);

      $this->disbar = $rs->getFloat($startcol + 21);

      $this->disdis = $rs->getFloat($startcol + 22);

      $this->disins = $rs->getFloat($startcol + 23);

      $this->disfun = $rs->getFloat($startcol + 24);

      $this->disest = $rs->getFloat($startcol + 25);

      $this->funres = $rs->getString($startcol + 26);

      $this->funrel = $rs->getString($startcol + 27);

      $this->fecres = $rs->getDate($startcol + 28, null);

      $this->fecapr = $rs->getDate($startcol + 29, null);

      $this->fecven = $rs->getDate($startcol + 30, null);

      $this->tomo = $rs->getString($startcol + 31);

      $this->folio = $rs->getString($startcol + 32);

      $this->numero = $rs->getString($startcol + 33);

      $this->taslic = $rs->getFloat($startcol + 34);

      $this->deuanl = $rs->getFloat($startcol + 35);

      $this->deuacl = $rs->getFloat($startcol + 36);

      $this->implic = $rs->getFloat($startcol + 37);

      $this->deuanp = $rs->getFloat($startcol + 38);

      $this->deuacp = $rs->getFloat($startcol + 39);

      $this->stasol = $rs->getString($startcol + 40);

      $this->stalic = $rs->getString($startcol + 41);

      $this->stadec = $rs->getString($startcol + 42);

      $this->staliq = $rs->getString($startcol + 43);

      $this->nomcon = $rs->getString($startcol + 44);

      $this->dircon = $rs->getString($startcol + 45);

      $this->tipo = $rs->getString($startcol + 46);

      $this->estser = $rs->getString($startcol + 47);

      $this->telneg = $rs->getString($startcol + 48);

      $this->clacon = $rs->getString($startcol + 49);

      $this->capact = $rs->getFloat($startcol + 50);

      $this->numsol1 = $rs->getString($startcol + 51);

      $this->numlic1 = $rs->getString($startcol + 52);

      $this->horainie = $rs->getDate($startcol + 53, null);

      $this->horaciee = $rs->getDate($startcol + 54, null);

      $this->unitri = $rs->getFloat($startcol + 55);

      $this->tipsol = $rs->getString($startcol + 56);

      $this->unitrialc = $rs->getFloat($startcol + 57);

      $this->unitriotr = $rs->getFloat($startcol + 58);

      $this->licant = $rs->getString($startcol + 59);

      $this->dueant = $rs->getString($startcol + 60);

      $this->dirant = $rs->getString($startcol + 61);

      $this->impext = $rs->getFloat($startcol + 62);

      $this->imptotal = $rs->getFloat($startcol + 63);

      $this->codact = $rs->getString($startcol + 64);

      $this->codtiplic = $rs->getString($startcol + 65);

      $this->fecinilic = $rs->getDate($startcol + 66, null);

      $this->id = $rs->getInt($startcol + 67);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 68; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcmodlic object", $e);
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
			$con = Propel::getConnection(FcmodlicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmodlicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmodlicPeer::DATABASE_NAME);
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
					$pk = FcmodlicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcmodlicPeer::doUpdate($this, $con);
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


			if (($retval = FcmodlicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodlicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefmod();
				break;
			case 1:
				return $this->getFecmod();
				break;
			case 2:
				return $this->getMotmod();
				break;
			case 3:
				return $this->getNumsol();
				break;
			case 4:
				return $this->getNumlic();
				break;
			case 5:
				return $this->getFecsol();
				break;
			case 6:
				return $this->getFeclic();
				break;
			case 7:
				return $this->getRifcon();
				break;
			case 8:
				return $this->getCatcon();
				break;
			case 9:
				return $this->getRifrep();
				break;
			case 10:
				return $this->getNomneg();
				break;
			case 11:
				return $this->getTipinm();
				break;
			case 12:
				return $this->getTipest();
				break;
			case 13:
				return $this->getDirpri();
				break;
			case 14:
				return $this->getCodrut();
				break;
			case 15:
				return $this->getCapsoc();
				break;
			case 16:
				return $this->getHorini();
				break;
			case 17:
				return $this->getHorcie();
				break;
			case 18:
				return $this->getFecini();
				break;
			case 19:
				return $this->getFecfin();
				break;
			case 20:
				return $this->getDiscli();
				break;
			case 21:
				return $this->getDisbar();
				break;
			case 22:
				return $this->getDisdis();
				break;
			case 23:
				return $this->getDisins();
				break;
			case 24:
				return $this->getDisfun();
				break;
			case 25:
				return $this->getDisest();
				break;
			case 26:
				return $this->getFunres();
				break;
			case 27:
				return $this->getFunrel();
				break;
			case 28:
				return $this->getFecres();
				break;
			case 29:
				return $this->getFecapr();
				break;
			case 30:
				return $this->getFecven();
				break;
			case 31:
				return $this->getTomo();
				break;
			case 32:
				return $this->getFolio();
				break;
			case 33:
				return $this->getNumero();
				break;
			case 34:
				return $this->getTaslic();
				break;
			case 35:
				return $this->getDeuanl();
				break;
			case 36:
				return $this->getDeuacl();
				break;
			case 37:
				return $this->getImplic();
				break;
			case 38:
				return $this->getDeuanp();
				break;
			case 39:
				return $this->getDeuacp();
				break;
			case 40:
				return $this->getStasol();
				break;
			case 41:
				return $this->getStalic();
				break;
			case 42:
				return $this->getStadec();
				break;
			case 43:
				return $this->getStaliq();
				break;
			case 44:
				return $this->getNomcon();
				break;
			case 45:
				return $this->getDircon();
				break;
			case 46:
				return $this->getTipo();
				break;
			case 47:
				return $this->getEstser();
				break;
			case 48:
				return $this->getTelneg();
				break;
			case 49:
				return $this->getClacon();
				break;
			case 50:
				return $this->getCapact();
				break;
			case 51:
				return $this->getNumsol1();
				break;
			case 52:
				return $this->getNumlic1();
				break;
			case 53:
				return $this->getHorainie();
				break;
			case 54:
				return $this->getHoraciee();
				break;
			case 55:
				return $this->getUnitri();
				break;
			case 56:
				return $this->getTipsol();
				break;
			case 57:
				return $this->getUnitrialc();
				break;
			case 58:
				return $this->getUnitriotr();
				break;
			case 59:
				return $this->getLicant();
				break;
			case 60:
				return $this->getDueant();
				break;
			case 61:
				return $this->getDirant();
				break;
			case 62:
				return $this->getImpext();
				break;
			case 63:
				return $this->getImptotal();
				break;
			case 64:
				return $this->getCodact();
				break;
			case 65:
				return $this->getCodtiplic();
				break;
			case 66:
				return $this->getFecinilic();
				break;
			case 67:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodlicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmod(),
			$keys[1] => $this->getFecmod(),
			$keys[2] => $this->getMotmod(),
			$keys[3] => $this->getNumsol(),
			$keys[4] => $this->getNumlic(),
			$keys[5] => $this->getFecsol(),
			$keys[6] => $this->getFeclic(),
			$keys[7] => $this->getRifcon(),
			$keys[8] => $this->getCatcon(),
			$keys[9] => $this->getRifrep(),
			$keys[10] => $this->getNomneg(),
			$keys[11] => $this->getTipinm(),
			$keys[12] => $this->getTipest(),
			$keys[13] => $this->getDirpri(),
			$keys[14] => $this->getCodrut(),
			$keys[15] => $this->getCapsoc(),
			$keys[16] => $this->getHorini(),
			$keys[17] => $this->getHorcie(),
			$keys[18] => $this->getFecini(),
			$keys[19] => $this->getFecfin(),
			$keys[20] => $this->getDiscli(),
			$keys[21] => $this->getDisbar(),
			$keys[22] => $this->getDisdis(),
			$keys[23] => $this->getDisins(),
			$keys[24] => $this->getDisfun(),
			$keys[25] => $this->getDisest(),
			$keys[26] => $this->getFunres(),
			$keys[27] => $this->getFunrel(),
			$keys[28] => $this->getFecres(),
			$keys[29] => $this->getFecapr(),
			$keys[30] => $this->getFecven(),
			$keys[31] => $this->getTomo(),
			$keys[32] => $this->getFolio(),
			$keys[33] => $this->getNumero(),
			$keys[34] => $this->getTaslic(),
			$keys[35] => $this->getDeuanl(),
			$keys[36] => $this->getDeuacl(),
			$keys[37] => $this->getImplic(),
			$keys[38] => $this->getDeuanp(),
			$keys[39] => $this->getDeuacp(),
			$keys[40] => $this->getStasol(),
			$keys[41] => $this->getStalic(),
			$keys[42] => $this->getStadec(),
			$keys[43] => $this->getStaliq(),
			$keys[44] => $this->getNomcon(),
			$keys[45] => $this->getDircon(),
			$keys[46] => $this->getTipo(),
			$keys[47] => $this->getEstser(),
			$keys[48] => $this->getTelneg(),
			$keys[49] => $this->getClacon(),
			$keys[50] => $this->getCapact(),
			$keys[51] => $this->getNumsol1(),
			$keys[52] => $this->getNumlic1(),
			$keys[53] => $this->getHorainie(),
			$keys[54] => $this->getHoraciee(),
			$keys[55] => $this->getUnitri(),
			$keys[56] => $this->getTipsol(),
			$keys[57] => $this->getUnitrialc(),
			$keys[58] => $this->getUnitriotr(),
			$keys[59] => $this->getLicant(),
			$keys[60] => $this->getDueant(),
			$keys[61] => $this->getDirant(),
			$keys[62] => $this->getImpext(),
			$keys[63] => $this->getImptotal(),
			$keys[64] => $this->getCodact(),
			$keys[65] => $this->getCodtiplic(),
			$keys[66] => $this->getFecinilic(),
			$keys[67] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodlicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefmod($value);
				break;
			case 1:
				$this->setFecmod($value);
				break;
			case 2:
				$this->setMotmod($value);
				break;
			case 3:
				$this->setNumsol($value);
				break;
			case 4:
				$this->setNumlic($value);
				break;
			case 5:
				$this->setFecsol($value);
				break;
			case 6:
				$this->setFeclic($value);
				break;
			case 7:
				$this->setRifcon($value);
				break;
			case 8:
				$this->setCatcon($value);
				break;
			case 9:
				$this->setRifrep($value);
				break;
			case 10:
				$this->setNomneg($value);
				break;
			case 11:
				$this->setTipinm($value);
				break;
			case 12:
				$this->setTipest($value);
				break;
			case 13:
				$this->setDirpri($value);
				break;
			case 14:
				$this->setCodrut($value);
				break;
			case 15:
				$this->setCapsoc($value);
				break;
			case 16:
				$this->setHorini($value);
				break;
			case 17:
				$this->setHorcie($value);
				break;
			case 18:
				$this->setFecini($value);
				break;
			case 19:
				$this->setFecfin($value);
				break;
			case 20:
				$this->setDiscli($value);
				break;
			case 21:
				$this->setDisbar($value);
				break;
			case 22:
				$this->setDisdis($value);
				break;
			case 23:
				$this->setDisins($value);
				break;
			case 24:
				$this->setDisfun($value);
				break;
			case 25:
				$this->setDisest($value);
				break;
			case 26:
				$this->setFunres($value);
				break;
			case 27:
				$this->setFunrel($value);
				break;
			case 28:
				$this->setFecres($value);
				break;
			case 29:
				$this->setFecapr($value);
				break;
			case 30:
				$this->setFecven($value);
				break;
			case 31:
				$this->setTomo($value);
				break;
			case 32:
				$this->setFolio($value);
				break;
			case 33:
				$this->setNumero($value);
				break;
			case 34:
				$this->setTaslic($value);
				break;
			case 35:
				$this->setDeuanl($value);
				break;
			case 36:
				$this->setDeuacl($value);
				break;
			case 37:
				$this->setImplic($value);
				break;
			case 38:
				$this->setDeuanp($value);
				break;
			case 39:
				$this->setDeuacp($value);
				break;
			case 40:
				$this->setStasol($value);
				break;
			case 41:
				$this->setStalic($value);
				break;
			case 42:
				$this->setStadec($value);
				break;
			case 43:
				$this->setStaliq($value);
				break;
			case 44:
				$this->setNomcon($value);
				break;
			case 45:
				$this->setDircon($value);
				break;
			case 46:
				$this->setTipo($value);
				break;
			case 47:
				$this->setEstser($value);
				break;
			case 48:
				$this->setTelneg($value);
				break;
			case 49:
				$this->setClacon($value);
				break;
			case 50:
				$this->setCapact($value);
				break;
			case 51:
				$this->setNumsol1($value);
				break;
			case 52:
				$this->setNumlic1($value);
				break;
			case 53:
				$this->setHorainie($value);
				break;
			case 54:
				$this->setHoraciee($value);
				break;
			case 55:
				$this->setUnitri($value);
				break;
			case 56:
				$this->setTipsol($value);
				break;
			case 57:
				$this->setUnitrialc($value);
				break;
			case 58:
				$this->setUnitriotr($value);
				break;
			case 59:
				$this->setLicant($value);
				break;
			case 60:
				$this->setDueant($value);
				break;
			case 61:
				$this->setDirant($value);
				break;
			case 62:
				$this->setImpext($value);
				break;
			case 63:
				$this->setImptotal($value);
				break;
			case 64:
				$this->setCodact($value);
				break;
			case 65:
				$this->setCodtiplic($value);
				break;
			case 66:
				$this->setFecinilic($value);
				break;
			case 67:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodlicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecmod($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMotmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumlic($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecsol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeclic($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRifcon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCatcon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRifrep($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNomneg($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipinm($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTipest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDirpri($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodrut($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCapsoc($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setHorini($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setHorcie($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecini($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecfin($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDiscli($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDisbar($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDisdis($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDisins($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDisfun($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDisest($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFunres($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFunrel($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecres($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setFecapr($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecven($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTomo($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFolio($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNumero($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setTaslic($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setDeuanl($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setDeuacl($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setImplic($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setDeuanp($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setDeuacp($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setStasol($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setStalic($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setStadec($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setStaliq($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setNomcon($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setDircon($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setTipo($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setEstser($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setTelneg($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setClacon($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setCapact($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setNumsol1($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setNumlic1($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setHorainie($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setHoraciee($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setUnitri($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setTipsol($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setUnitrialc($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setUnitriotr($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setLicant($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setDueant($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setDirant($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setImpext($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setImptotal($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setCodact($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setCodtiplic($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setFecinilic($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setId($arr[$keys[67]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmodlicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmodlicPeer::REFMOD)) $criteria->add(FcmodlicPeer::REFMOD, $this->refmod);
		if ($this->isColumnModified(FcmodlicPeer::FECMOD)) $criteria->add(FcmodlicPeer::FECMOD, $this->fecmod);
		if ($this->isColumnModified(FcmodlicPeer::MOTMOD)) $criteria->add(FcmodlicPeer::MOTMOD, $this->motmod);
		if ($this->isColumnModified(FcmodlicPeer::NUMSOL)) $criteria->add(FcmodlicPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(FcmodlicPeer::NUMLIC)) $criteria->add(FcmodlicPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcmodlicPeer::FECSOL)) $criteria->add(FcmodlicPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(FcmodlicPeer::FECLIC)) $criteria->add(FcmodlicPeer::FECLIC, $this->feclic);
		if ($this->isColumnModified(FcmodlicPeer::RIFCON)) $criteria->add(FcmodlicPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcmodlicPeer::CATCON)) $criteria->add(FcmodlicPeer::CATCON, $this->catcon);
		if ($this->isColumnModified(FcmodlicPeer::RIFREP)) $criteria->add(FcmodlicPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcmodlicPeer::NOMNEG)) $criteria->add(FcmodlicPeer::NOMNEG, $this->nomneg);
		if ($this->isColumnModified(FcmodlicPeer::TIPINM)) $criteria->add(FcmodlicPeer::TIPINM, $this->tipinm);
		if ($this->isColumnModified(FcmodlicPeer::TIPEST)) $criteria->add(FcmodlicPeer::TIPEST, $this->tipest);
		if ($this->isColumnModified(FcmodlicPeer::DIRPRI)) $criteria->add(FcmodlicPeer::DIRPRI, $this->dirpri);
		if ($this->isColumnModified(FcmodlicPeer::CODRUT)) $criteria->add(FcmodlicPeer::CODRUT, $this->codrut);
		if ($this->isColumnModified(FcmodlicPeer::CAPSOC)) $criteria->add(FcmodlicPeer::CAPSOC, $this->capsoc);
		if ($this->isColumnModified(FcmodlicPeer::HORINI)) $criteria->add(FcmodlicPeer::HORINI, $this->horini);
		if ($this->isColumnModified(FcmodlicPeer::HORCIE)) $criteria->add(FcmodlicPeer::HORCIE, $this->horcie);
		if ($this->isColumnModified(FcmodlicPeer::FECINI)) $criteria->add(FcmodlicPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FcmodlicPeer::FECFIN)) $criteria->add(FcmodlicPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(FcmodlicPeer::DISCLI)) $criteria->add(FcmodlicPeer::DISCLI, $this->discli);
		if ($this->isColumnModified(FcmodlicPeer::DISBAR)) $criteria->add(FcmodlicPeer::DISBAR, $this->disbar);
		if ($this->isColumnModified(FcmodlicPeer::DISDIS)) $criteria->add(FcmodlicPeer::DISDIS, $this->disdis);
		if ($this->isColumnModified(FcmodlicPeer::DISINS)) $criteria->add(FcmodlicPeer::DISINS, $this->disins);
		if ($this->isColumnModified(FcmodlicPeer::DISFUN)) $criteria->add(FcmodlicPeer::DISFUN, $this->disfun);
		if ($this->isColumnModified(FcmodlicPeer::DISEST)) $criteria->add(FcmodlicPeer::DISEST, $this->disest);
		if ($this->isColumnModified(FcmodlicPeer::FUNRES)) $criteria->add(FcmodlicPeer::FUNRES, $this->funres);
		if ($this->isColumnModified(FcmodlicPeer::FUNREL)) $criteria->add(FcmodlicPeer::FUNREL, $this->funrel);
		if ($this->isColumnModified(FcmodlicPeer::FECRES)) $criteria->add(FcmodlicPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(FcmodlicPeer::FECAPR)) $criteria->add(FcmodlicPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(FcmodlicPeer::FECVEN)) $criteria->add(FcmodlicPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcmodlicPeer::TOMO)) $criteria->add(FcmodlicPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(FcmodlicPeer::FOLIO)) $criteria->add(FcmodlicPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(FcmodlicPeer::NUMERO)) $criteria->add(FcmodlicPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcmodlicPeer::TASLIC)) $criteria->add(FcmodlicPeer::TASLIC, $this->taslic);
		if ($this->isColumnModified(FcmodlicPeer::DEUANL)) $criteria->add(FcmodlicPeer::DEUANL, $this->deuanl);
		if ($this->isColumnModified(FcmodlicPeer::DEUACL)) $criteria->add(FcmodlicPeer::DEUACL, $this->deuacl);
		if ($this->isColumnModified(FcmodlicPeer::IMPLIC)) $criteria->add(FcmodlicPeer::IMPLIC, $this->implic);
		if ($this->isColumnModified(FcmodlicPeer::DEUANP)) $criteria->add(FcmodlicPeer::DEUANP, $this->deuanp);
		if ($this->isColumnModified(FcmodlicPeer::DEUACP)) $criteria->add(FcmodlicPeer::DEUACP, $this->deuacp);
		if ($this->isColumnModified(FcmodlicPeer::STASOL)) $criteria->add(FcmodlicPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(FcmodlicPeer::STALIC)) $criteria->add(FcmodlicPeer::STALIC, $this->stalic);
		if ($this->isColumnModified(FcmodlicPeer::STADEC)) $criteria->add(FcmodlicPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcmodlicPeer::STALIQ)) $criteria->add(FcmodlicPeer::STALIQ, $this->staliq);
		if ($this->isColumnModified(FcmodlicPeer::NOMCON)) $criteria->add(FcmodlicPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcmodlicPeer::DIRCON)) $criteria->add(FcmodlicPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcmodlicPeer::TIPO)) $criteria->add(FcmodlicPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcmodlicPeer::ESTSER)) $criteria->add(FcmodlicPeer::ESTSER, $this->estser);
		if ($this->isColumnModified(FcmodlicPeer::TELNEG)) $criteria->add(FcmodlicPeer::TELNEG, $this->telneg);
		if ($this->isColumnModified(FcmodlicPeer::CLACON)) $criteria->add(FcmodlicPeer::CLACON, $this->clacon);
		if ($this->isColumnModified(FcmodlicPeer::CAPACT)) $criteria->add(FcmodlicPeer::CAPACT, $this->capact);
		if ($this->isColumnModified(FcmodlicPeer::NUMSOL1)) $criteria->add(FcmodlicPeer::NUMSOL1, $this->numsol1);
		if ($this->isColumnModified(FcmodlicPeer::NUMLIC1)) $criteria->add(FcmodlicPeer::NUMLIC1, $this->numlic1);
		if ($this->isColumnModified(FcmodlicPeer::HORAINIE)) $criteria->add(FcmodlicPeer::HORAINIE, $this->horainie);
		if ($this->isColumnModified(FcmodlicPeer::HORACIEE)) $criteria->add(FcmodlicPeer::HORACIEE, $this->horaciee);
		if ($this->isColumnModified(FcmodlicPeer::UNITRI)) $criteria->add(FcmodlicPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(FcmodlicPeer::TIPSOL)) $criteria->add(FcmodlicPeer::TIPSOL, $this->tipsol);
		if ($this->isColumnModified(FcmodlicPeer::UNITRIALC)) $criteria->add(FcmodlicPeer::UNITRIALC, $this->unitrialc);
		if ($this->isColumnModified(FcmodlicPeer::UNITRIOTR)) $criteria->add(FcmodlicPeer::UNITRIOTR, $this->unitriotr);
		if ($this->isColumnModified(FcmodlicPeer::LICANT)) $criteria->add(FcmodlicPeer::LICANT, $this->licant);
		if ($this->isColumnModified(FcmodlicPeer::DUEANT)) $criteria->add(FcmodlicPeer::DUEANT, $this->dueant);
		if ($this->isColumnModified(FcmodlicPeer::DIRANT)) $criteria->add(FcmodlicPeer::DIRANT, $this->dirant);
		if ($this->isColumnModified(FcmodlicPeer::IMPEXT)) $criteria->add(FcmodlicPeer::IMPEXT, $this->impext);
		if ($this->isColumnModified(FcmodlicPeer::IMPTOTAL)) $criteria->add(FcmodlicPeer::IMPTOTAL, $this->imptotal);
		if ($this->isColumnModified(FcmodlicPeer::CODACT)) $criteria->add(FcmodlicPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FcmodlicPeer::CODTIPLIC)) $criteria->add(FcmodlicPeer::CODTIPLIC, $this->codtiplic);
		if ($this->isColumnModified(FcmodlicPeer::FECINILIC)) $criteria->add(FcmodlicPeer::FECINILIC, $this->fecinilic);
		if ($this->isColumnModified(FcmodlicPeer::ID)) $criteria->add(FcmodlicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmodlicPeer::DATABASE_NAME);

		$criteria->add(FcmodlicPeer::ID, $this->id);

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

		$copyObj->setRefmod($this->refmod);

		$copyObj->setFecmod($this->fecmod);

		$copyObj->setMotmod($this->motmod);

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

		$copyObj->setNumsol1($this->numsol1);

		$copyObj->setNumlic1($this->numlic1);

		$copyObj->setHorainie($this->horainie);

		$copyObj->setHoraciee($this->horaciee);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setTipsol($this->tipsol);

		$copyObj->setUnitrialc($this->unitrialc);

		$copyObj->setUnitriotr($this->unitriotr);

		$copyObj->setLicant($this->licant);

		$copyObj->setDueant($this->dueant);

		$copyObj->setDirant($this->dirant);

		$copyObj->setImpext($this->impext);

		$copyObj->setImptotal($this->imptotal);

		$copyObj->setCodact($this->codact);

		$copyObj->setCodtiplic($this->codtiplic);

		$copyObj->setFecinilic($this->fecinilic);


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
			self::$peer = new FcmodlicPeer();
		}
		return self::$peer;
	}

} 