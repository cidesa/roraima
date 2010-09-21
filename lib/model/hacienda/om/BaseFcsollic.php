<?php


abstract class BaseFcsollic extends BaseObject  implements Persistent {


	
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
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = FcsollicPeer::NUMSOL;
      }
  
	} 
	
	public function setNumlic($v)
	{

    if ($this->numlic !== $v) {
        $this->numlic = $v;
        $this->modifiedColumns[] = FcsollicPeer::NUMLIC;
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
      $this->modifiedColumns[] = FcsollicPeer::FECSOL;
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
      $this->modifiedColumns[] = FcsollicPeer::FECLIC;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcsollicPeer::RIFCON;
      }
  
	} 
	
	public function setCatcon($v)
	{

    if ($this->catcon !== $v) {
        $this->catcon = $v;
        $this->modifiedColumns[] = FcsollicPeer::CATCON;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcsollicPeer::RIFREP;
      }
  
	} 
	
	public function setNomneg($v)
	{

    if ($this->nomneg !== $v) {
        $this->nomneg = $v;
        $this->modifiedColumns[] = FcsollicPeer::NOMNEG;
      }
  
	} 
	
	public function setTipinm($v)
	{

    if ($this->tipinm !== $v) {
        $this->tipinm = $v;
        $this->modifiedColumns[] = FcsollicPeer::TIPINM;
      }
  
	} 
	
	public function setTipest($v)
	{

    if ($this->tipest !== $v) {
        $this->tipest = $v;
        $this->modifiedColumns[] = FcsollicPeer::TIPEST;
      }
  
	} 
	
	public function setDirpri($v)
	{

    if ($this->dirpri !== $v) {
        $this->dirpri = $v;
        $this->modifiedColumns[] = FcsollicPeer::DIRPRI;
      }
  
	} 
	
	public function setCodrut($v)
	{

    if ($this->codrut !== $v) {
        $this->codrut = $v;
        $this->modifiedColumns[] = FcsollicPeer::CODRUT;
      }
  
	} 
	
	public function setCapsoc($v)
	{

    if ($this->capsoc !== $v) {
        $this->capsoc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::CAPSOC;
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
      $this->modifiedColumns[] = FcsollicPeer::HORINI;
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
      $this->modifiedColumns[] = FcsollicPeer::HORCIE;
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
      $this->modifiedColumns[] = FcsollicPeer::FECINI;
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
      $this->modifiedColumns[] = FcsollicPeer::FECFIN;
    }

	} 
	
	public function setDiscli($v)
	{

    if ($this->discli !== $v) {
        $this->discli = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DISCLI;
      }
  
	} 
	
	public function setDisbar($v)
	{

    if ($this->disbar !== $v) {
        $this->disbar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DISBAR;
      }
  
	} 
	
	public function setDisdis($v)
	{

    if ($this->disdis !== $v) {
        $this->disdis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DISDIS;
      }
  
	} 
	
	public function setDisins($v)
	{

    if ($this->disins !== $v) {
        $this->disins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DISINS;
      }
  
	} 
	
	public function setDisfun($v)
	{

    if ($this->disfun !== $v) {
        $this->disfun = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DISFUN;
      }
  
	} 
	
	public function setDisest($v)
	{

    if ($this->disest !== $v) {
        $this->disest = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DISEST;
      }
  
	} 
	
	public function setFunres($v)
	{

    if ($this->funres !== $v) {
        $this->funres = $v;
        $this->modifiedColumns[] = FcsollicPeer::FUNRES;
      }
  
	} 
	
	public function setFunrel($v)
	{

    if ($this->funrel !== $v) {
        $this->funrel = $v;
        $this->modifiedColumns[] = FcsollicPeer::FUNREL;
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
      $this->modifiedColumns[] = FcsollicPeer::FECRES;
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
      $this->modifiedColumns[] = FcsollicPeer::FECAPR;
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
      $this->modifiedColumns[] = FcsollicPeer::FECVEN;
    }

	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = FcsollicPeer::TOMO;
      }
  
	} 
	
	public function setFolio($v)
	{

    if ($this->folio !== $v) {
        $this->folio = $v;
        $this->modifiedColumns[] = FcsollicPeer::FOLIO;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FcsollicPeer::NUMERO;
      }
  
	} 
	
	public function setTaslic($v)
	{

    if ($this->taslic !== $v) {
        $this->taslic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::TASLIC;
      }
  
	} 
	
	public function setDeuanl($v)
	{

    if ($this->deuanl !== $v) {
        $this->deuanl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DEUANL;
      }
  
	} 
	
	public function setDeuacl($v)
	{

    if ($this->deuacl !== $v) {
        $this->deuacl = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DEUACL;
      }
  
	} 
	
	public function setImplic($v)
	{

    if ($this->implic !== $v) {
        $this->implic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::IMPLIC;
      }
  
	} 
	
	public function setDeuanp($v)
	{

    if ($this->deuanp !== $v) {
        $this->deuanp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DEUANP;
      }
  
	} 
	
	public function setDeuacp($v)
	{

    if ($this->deuacp !== $v) {
        $this->deuacp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::DEUACP;
      }
  
	} 
	
	public function setStasol($v)
	{

    if ($this->stasol !== $v) {
        $this->stasol = $v;
        $this->modifiedColumns[] = FcsollicPeer::STASOL;
      }
  
	} 
	
	public function setStalic($v)
	{

    if ($this->stalic !== $v) {
        $this->stalic = $v;
        $this->modifiedColumns[] = FcsollicPeer::STALIC;
      }
  
	} 
	
	public function setStadec($v)
	{

    if ($this->stadec !== $v) {
        $this->stadec = $v;
        $this->modifiedColumns[] = FcsollicPeer::STADEC;
      }
  
	} 
	
	public function setStaliq($v)
	{

    if ($this->staliq !== $v) {
        $this->staliq = $v;
        $this->modifiedColumns[] = FcsollicPeer::STALIQ;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcsollicPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcsollicPeer::DIRCON;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcsollicPeer::TIPO;
      }
  
	} 
	
	public function setEstser($v)
	{

    if ($this->estser !== $v || $v === '') {
        $this->estser = $v;
        $this->modifiedColumns[] = FcsollicPeer::ESTSER;
      }
  
	} 
	
	public function setTelneg($v)
	{

    if ($this->telneg !== $v) {
        $this->telneg = $v;
        $this->modifiedColumns[] = FcsollicPeer::TELNEG;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = FcsollicPeer::CLACON;
      }
  
	} 
	
	public function setCapact($v)
	{

    if ($this->capact !== $v) {
        $this->capact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::CAPACT;
      }
  
	} 
	
	public function setNumsol1($v)
	{

    if ($this->numsol1 !== $v) {
        $this->numsol1 = $v;
        $this->modifiedColumns[] = FcsollicPeer::NUMSOL1;
      }
  
	} 
	
	public function setNumlic1($v)
	{

    if ($this->numlic1 !== $v) {
        $this->numlic1 = $v;
        $this->modifiedColumns[] = FcsollicPeer::NUMLIC1;
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
      $this->modifiedColumns[] = FcsollicPeer::HORAINIE;
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
      $this->modifiedColumns[] = FcsollicPeer::HORACIEE;
    }

	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::UNITRI;
      }
  
	} 
	
	public function setTipsol($v)
	{

    if ($this->tipsol !== $v) {
        $this->tipsol = $v;
        $this->modifiedColumns[] = FcsollicPeer::TIPSOL;
      }
  
	} 
	
	public function setUnitrialc($v)
	{

    if ($this->unitrialc !== $v) {
        $this->unitrialc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::UNITRIALC;
      }
  
	} 
	
	public function setUnitriotr($v)
	{

    if ($this->unitriotr !== $v) {
        $this->unitriotr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::UNITRIOTR;
      }
  
	} 
	
	public function setLicant($v)
	{

    if ($this->licant !== $v) {
        $this->licant = $v;
        $this->modifiedColumns[] = FcsollicPeer::LICANT;
      }
  
	} 
	
	public function setDueant($v)
	{

    if ($this->dueant !== $v) {
        $this->dueant = $v;
        $this->modifiedColumns[] = FcsollicPeer::DUEANT;
      }
  
	} 
	
	public function setDirant($v)
	{

    if ($this->dirant !== $v) {
        $this->dirant = $v;
        $this->modifiedColumns[] = FcsollicPeer::DIRANT;
      }
  
	} 
	
	public function setImpext($v)
	{

    if ($this->impext !== $v) {
        $this->impext = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::IMPEXT;
      }
  
	} 
	
	public function setImptotal($v)
	{

    if ($this->imptotal !== $v) {
        $this->imptotal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcsollicPeer::IMPTOTAL;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FcsollicPeer::CODACT;
      }
  
	} 
	
	public function setCodtiplic($v)
	{

    if ($this->codtiplic !== $v) {
        $this->codtiplic = $v;
        $this->modifiedColumns[] = FcsollicPeer::CODTIPLIC;
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
      $this->modifiedColumns[] = FcsollicPeer::FECINILIC;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcsollicPeer::ID;
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

      $this->numsol1 = $rs->getString($startcol + 48);

      $this->numlic1 = $rs->getString($startcol + 49);

      $this->horainie = $rs->getDate($startcol + 50, null);

      $this->horaciee = $rs->getDate($startcol + 51, null);

      $this->unitri = $rs->getFloat($startcol + 52);

      $this->tipsol = $rs->getString($startcol + 53);

      $this->unitrialc = $rs->getFloat($startcol + 54);

      $this->unitriotr = $rs->getFloat($startcol + 55);

      $this->licant = $rs->getString($startcol + 56);

      $this->dueant = $rs->getString($startcol + 57);

      $this->dirant = $rs->getString($startcol + 58);

      $this->impext = $rs->getFloat($startcol + 59);

      $this->imptotal = $rs->getFloat($startcol + 60);

      $this->codact = $rs->getString($startcol + 61);

      $this->codtiplic = $rs->getString($startcol + 62);

      $this->fecinilic = $rs->getDate($startcol + 63, null);

      $this->id = $rs->getInt($startcol + 64);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 65; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcsollic object", $e);
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
			$con = Propel::getConnection(FcsollicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcsollicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcsollicPeer::DATABASE_NAME);
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
					$pk = FcsollicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcsollicPeer::doUpdate($this, $con);
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


			if (($retval = FcsollicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsollicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNumsol1();
				break;
			case 49:
				return $this->getNumlic1();
				break;
			case 50:
				return $this->getHorainie();
				break;
			case 51:
				return $this->getHoraciee();
				break;
			case 52:
				return $this->getUnitri();
				break;
			case 53:
				return $this->getTipsol();
				break;
			case 54:
				return $this->getUnitrialc();
				break;
			case 55:
				return $this->getUnitriotr();
				break;
			case 56:
				return $this->getLicant();
				break;
			case 57:
				return $this->getDueant();
				break;
			case 58:
				return $this->getDirant();
				break;
			case 59:
				return $this->getImpext();
				break;
			case 60:
				return $this->getImptotal();
				break;
			case 61:
				return $this->getCodact();
				break;
			case 62:
				return $this->getCodtiplic();
				break;
			case 63:
				return $this->getFecinilic();
				break;
			case 64:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsollicPeer::getFieldNames($keyType);
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
			$keys[48] => $this->getNumsol1(),
			$keys[49] => $this->getNumlic1(),
			$keys[50] => $this->getHorainie(),
			$keys[51] => $this->getHoraciee(),
			$keys[52] => $this->getUnitri(),
			$keys[53] => $this->getTipsol(),
			$keys[54] => $this->getUnitrialc(),
			$keys[55] => $this->getUnitriotr(),
			$keys[56] => $this->getLicant(),
			$keys[57] => $this->getDueant(),
			$keys[58] => $this->getDirant(),
			$keys[59] => $this->getImpext(),
			$keys[60] => $this->getImptotal(),
			$keys[61] => $this->getCodact(),
			$keys[62] => $this->getCodtiplic(),
			$keys[63] => $this->getFecinilic(),
			$keys[64] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsollicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNumsol1($value);
				break;
			case 49:
				$this->setNumlic1($value);
				break;
			case 50:
				$this->setHorainie($value);
				break;
			case 51:
				$this->setHoraciee($value);
				break;
			case 52:
				$this->setUnitri($value);
				break;
			case 53:
				$this->setTipsol($value);
				break;
			case 54:
				$this->setUnitrialc($value);
				break;
			case 55:
				$this->setUnitriotr($value);
				break;
			case 56:
				$this->setLicant($value);
				break;
			case 57:
				$this->setDueant($value);
				break;
			case 58:
				$this->setDirant($value);
				break;
			case 59:
				$this->setImpext($value);
				break;
			case 60:
				$this->setImptotal($value);
				break;
			case 61:
				$this->setCodact($value);
				break;
			case 62:
				$this->setCodtiplic($value);
				break;
			case 63:
				$this->setFecinilic($value);
				break;
			case 64:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsollicPeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[48], $arr)) $this->setNumsol1($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setNumlic1($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setHorainie($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setHoraciee($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setUnitri($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setTipsol($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setUnitrialc($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setUnitriotr($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setLicant($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setDueant($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setDirant($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setImpext($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setImptotal($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setCodact($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setCodtiplic($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setFecinilic($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setId($arr[$keys[64]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcsollicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcsollicPeer::NUMSOL)) $criteria->add(FcsollicPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(FcsollicPeer::NUMLIC)) $criteria->add(FcsollicPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcsollicPeer::FECSOL)) $criteria->add(FcsollicPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(FcsollicPeer::FECLIC)) $criteria->add(FcsollicPeer::FECLIC, $this->feclic);
		if ($this->isColumnModified(FcsollicPeer::RIFCON)) $criteria->add(FcsollicPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcsollicPeer::CATCON)) $criteria->add(FcsollicPeer::CATCON, $this->catcon);
		if ($this->isColumnModified(FcsollicPeer::RIFREP)) $criteria->add(FcsollicPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcsollicPeer::NOMNEG)) $criteria->add(FcsollicPeer::NOMNEG, $this->nomneg);
		if ($this->isColumnModified(FcsollicPeer::TIPINM)) $criteria->add(FcsollicPeer::TIPINM, $this->tipinm);
		if ($this->isColumnModified(FcsollicPeer::TIPEST)) $criteria->add(FcsollicPeer::TIPEST, $this->tipest);
		if ($this->isColumnModified(FcsollicPeer::DIRPRI)) $criteria->add(FcsollicPeer::DIRPRI, $this->dirpri);
		if ($this->isColumnModified(FcsollicPeer::CODRUT)) $criteria->add(FcsollicPeer::CODRUT, $this->codrut);
		if ($this->isColumnModified(FcsollicPeer::CAPSOC)) $criteria->add(FcsollicPeer::CAPSOC, $this->capsoc);
		if ($this->isColumnModified(FcsollicPeer::HORINI)) $criteria->add(FcsollicPeer::HORINI, $this->horini);
		if ($this->isColumnModified(FcsollicPeer::HORCIE)) $criteria->add(FcsollicPeer::HORCIE, $this->horcie);
		if ($this->isColumnModified(FcsollicPeer::FECINI)) $criteria->add(FcsollicPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FcsollicPeer::FECFIN)) $criteria->add(FcsollicPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(FcsollicPeer::DISCLI)) $criteria->add(FcsollicPeer::DISCLI, $this->discli);
		if ($this->isColumnModified(FcsollicPeer::DISBAR)) $criteria->add(FcsollicPeer::DISBAR, $this->disbar);
		if ($this->isColumnModified(FcsollicPeer::DISDIS)) $criteria->add(FcsollicPeer::DISDIS, $this->disdis);
		if ($this->isColumnModified(FcsollicPeer::DISINS)) $criteria->add(FcsollicPeer::DISINS, $this->disins);
		if ($this->isColumnModified(FcsollicPeer::DISFUN)) $criteria->add(FcsollicPeer::DISFUN, $this->disfun);
		if ($this->isColumnModified(FcsollicPeer::DISEST)) $criteria->add(FcsollicPeer::DISEST, $this->disest);
		if ($this->isColumnModified(FcsollicPeer::FUNRES)) $criteria->add(FcsollicPeer::FUNRES, $this->funres);
		if ($this->isColumnModified(FcsollicPeer::FUNREL)) $criteria->add(FcsollicPeer::FUNREL, $this->funrel);
		if ($this->isColumnModified(FcsollicPeer::FECRES)) $criteria->add(FcsollicPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(FcsollicPeer::FECAPR)) $criteria->add(FcsollicPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(FcsollicPeer::FECVEN)) $criteria->add(FcsollicPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcsollicPeer::TOMO)) $criteria->add(FcsollicPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(FcsollicPeer::FOLIO)) $criteria->add(FcsollicPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(FcsollicPeer::NUMERO)) $criteria->add(FcsollicPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcsollicPeer::TASLIC)) $criteria->add(FcsollicPeer::TASLIC, $this->taslic);
		if ($this->isColumnModified(FcsollicPeer::DEUANL)) $criteria->add(FcsollicPeer::DEUANL, $this->deuanl);
		if ($this->isColumnModified(FcsollicPeer::DEUACL)) $criteria->add(FcsollicPeer::DEUACL, $this->deuacl);
		if ($this->isColumnModified(FcsollicPeer::IMPLIC)) $criteria->add(FcsollicPeer::IMPLIC, $this->implic);
		if ($this->isColumnModified(FcsollicPeer::DEUANP)) $criteria->add(FcsollicPeer::DEUANP, $this->deuanp);
		if ($this->isColumnModified(FcsollicPeer::DEUACP)) $criteria->add(FcsollicPeer::DEUACP, $this->deuacp);
		if ($this->isColumnModified(FcsollicPeer::STASOL)) $criteria->add(FcsollicPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(FcsollicPeer::STALIC)) $criteria->add(FcsollicPeer::STALIC, $this->stalic);
		if ($this->isColumnModified(FcsollicPeer::STADEC)) $criteria->add(FcsollicPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcsollicPeer::STALIQ)) $criteria->add(FcsollicPeer::STALIQ, $this->staliq);
		if ($this->isColumnModified(FcsollicPeer::NOMCON)) $criteria->add(FcsollicPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcsollicPeer::DIRCON)) $criteria->add(FcsollicPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcsollicPeer::TIPO)) $criteria->add(FcsollicPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcsollicPeer::ESTSER)) $criteria->add(FcsollicPeer::ESTSER, $this->estser);
		if ($this->isColumnModified(FcsollicPeer::TELNEG)) $criteria->add(FcsollicPeer::TELNEG, $this->telneg);
		if ($this->isColumnModified(FcsollicPeer::CLACON)) $criteria->add(FcsollicPeer::CLACON, $this->clacon);
		if ($this->isColumnModified(FcsollicPeer::CAPACT)) $criteria->add(FcsollicPeer::CAPACT, $this->capact);
		if ($this->isColumnModified(FcsollicPeer::NUMSOL1)) $criteria->add(FcsollicPeer::NUMSOL1, $this->numsol1);
		if ($this->isColumnModified(FcsollicPeer::NUMLIC1)) $criteria->add(FcsollicPeer::NUMLIC1, $this->numlic1);
		if ($this->isColumnModified(FcsollicPeer::HORAINIE)) $criteria->add(FcsollicPeer::HORAINIE, $this->horainie);
		if ($this->isColumnModified(FcsollicPeer::HORACIEE)) $criteria->add(FcsollicPeer::HORACIEE, $this->horaciee);
		if ($this->isColumnModified(FcsollicPeer::UNITRI)) $criteria->add(FcsollicPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(FcsollicPeer::TIPSOL)) $criteria->add(FcsollicPeer::TIPSOL, $this->tipsol);
		if ($this->isColumnModified(FcsollicPeer::UNITRIALC)) $criteria->add(FcsollicPeer::UNITRIALC, $this->unitrialc);
		if ($this->isColumnModified(FcsollicPeer::UNITRIOTR)) $criteria->add(FcsollicPeer::UNITRIOTR, $this->unitriotr);
		if ($this->isColumnModified(FcsollicPeer::LICANT)) $criteria->add(FcsollicPeer::LICANT, $this->licant);
		if ($this->isColumnModified(FcsollicPeer::DUEANT)) $criteria->add(FcsollicPeer::DUEANT, $this->dueant);
		if ($this->isColumnModified(FcsollicPeer::DIRANT)) $criteria->add(FcsollicPeer::DIRANT, $this->dirant);
		if ($this->isColumnModified(FcsollicPeer::IMPEXT)) $criteria->add(FcsollicPeer::IMPEXT, $this->impext);
		if ($this->isColumnModified(FcsollicPeer::IMPTOTAL)) $criteria->add(FcsollicPeer::IMPTOTAL, $this->imptotal);
		if ($this->isColumnModified(FcsollicPeer::CODACT)) $criteria->add(FcsollicPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FcsollicPeer::CODTIPLIC)) $criteria->add(FcsollicPeer::CODTIPLIC, $this->codtiplic);
		if ($this->isColumnModified(FcsollicPeer::FECINILIC)) $criteria->add(FcsollicPeer::FECINILIC, $this->fecinilic);
		if ($this->isColumnModified(FcsollicPeer::ID)) $criteria->add(FcsollicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcsollicPeer::DATABASE_NAME);

		$criteria->add(FcsollicPeer::ID, $this->id);

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
			self::$peer = new FcsollicPeer();
		}
		return self::$peer;
	}

} 