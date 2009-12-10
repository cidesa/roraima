<?php


abstract class BaseCpsoltrasla extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $fectra;


	
	protected $anotra;


	
	protected $pertra;


	
	protected $destra;


	
	protected $desanu;


	
	protected $tottra;


	
	protected $statra;


	
	protected $codart;


	
	protected $stacon;


	
	protected $stagob;


	
	protected $stapre;


	
	protected $staniv4;


	
	protected $staniv5;


	
	protected $staniv6;


	
	protected $fecpre;


	
	protected $despre;


	
	protected $feccon;


	
	protected $descon;


	
	protected $fecgob;


	
	protected $desgob;


	
	protected $fecniv4;


	
	protected $desniv4;


	
	protected $fecniv5;


	
	protected $desniv5;


	
	protected $fecniv6;


	
	protected $desniv6;


	
	protected $justificacion;


	
	protected $feccont;


	
	protected $justificacion1;


	
	protected $justificacion2;


	
	protected $justificacion3;


	
	protected $justificacion4;


	
	protected $justificacion5;


	
	protected $justificacion6;


	
	protected $justificacion7;


	
	protected $justificacion8;


	
	protected $justificacion9;


	
	protected $tipo;


	
	protected $tipgas;


	
	protected $fecanu;


	
	protected $id;

	
	protected $aCptrasla;

	
	protected $aCpartley;

	
	protected $collCpsolmovtras;

	
	protected $lastCpsolmovtraCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnotra()
  {

    return trim($this->anotra);

  }
  
  public function getPertra()
  {

    return trim($this->pertra);

  }
  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getTottra($val=false)
  {

    if($val) return number_format($this->tottra,2,',','.');
    else return $this->tottra;

  }
  
  public function getStatra()
  {

    return trim($this->statra);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getStagob()
  {

    return trim($this->stagob);

  }
  
  public function getStapre()
  {

    return trim($this->stapre);

  }
  
  public function getStaniv4()
  {

    return trim($this->staniv4);

  }
  
  public function getStaniv5()
  {

    return trim($this->staniv5);

  }
  
  public function getStaniv6()
  {

    return trim($this->staniv6);

  }
  
  public function getFecpre($format = 'Y-m-d')
  {

    if ($this->fecpre === null || $this->fecpre === '') {
      return null;
    } elseif (!is_int($this->fecpre)) {
            $ts = adodb_strtotime($this->fecpre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
      }
    } else {
      $ts = $this->fecpre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDespre()
  {

    return trim($this->despre);

  }
  
  public function getFeccon($format = 'Y-m-d')
  {

    if ($this->feccon === null || $this->feccon === '') {
      return null;
    } elseif (!is_int($this->feccon)) {
            $ts = adodb_strtotime($this->feccon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
      }
    } else {
      $ts = $this->feccon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDescon()
  {

    return trim($this->descon);

  }
  
  public function getFecgob($format = 'Y-m-d')
  {

    if ($this->fecgob === null || $this->fecgob === '') {
      return null;
    } elseif (!is_int($this->fecgob)) {
            $ts = adodb_strtotime($this->fecgob);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgob] as date/time value: " . var_export($this->fecgob, true));
      }
    } else {
      $ts = $this->fecgob;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesgob()
  {

    return trim($this->desgob);

  }
  
  public function getFecniv4($format = 'Y-m-d')
  {

    if ($this->fecniv4 === null || $this->fecniv4 === '') {
      return null;
    } elseif (!is_int($this->fecniv4)) {
            $ts = adodb_strtotime($this->fecniv4);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecniv4] as date/time value: " . var_export($this->fecniv4, true));
      }
    } else {
      $ts = $this->fecniv4;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesniv4()
  {

    return trim($this->desniv4);

  }
  
  public function getFecniv5($format = 'Y-m-d')
  {

    if ($this->fecniv5 === null || $this->fecniv5 === '') {
      return null;
    } elseif (!is_int($this->fecniv5)) {
            $ts = adodb_strtotime($this->fecniv5);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecniv5] as date/time value: " . var_export($this->fecniv5, true));
      }
    } else {
      $ts = $this->fecniv5;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesniv5()
  {

    return trim($this->desniv5);

  }
  
  public function getFecniv6($format = 'Y-m-d')
  {

    if ($this->fecniv6 === null || $this->fecniv6 === '') {
      return null;
    } elseif (!is_int($this->fecniv6)) {
            $ts = adodb_strtotime($this->fecniv6);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecniv6] as date/time value: " . var_export($this->fecniv6, true));
      }
    } else {
      $ts = $this->fecniv6;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesniv6()
  {

    return trim($this->desniv6);

  }
  
  public function getJustificacion()
  {

    return trim($this->justificacion);

  }
  
  public function getFeccont($format = 'Y-m-d')
  {

    if ($this->feccont === null || $this->feccont === '') {
      return null;
    } elseif (!is_int($this->feccont)) {
            $ts = adodb_strtotime($this->feccont);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccont] as date/time value: " . var_export($this->feccont, true));
      }
    } else {
      $ts = $this->feccont;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJustificacion1()
  {

    return trim($this->justificacion1);

  }
  
  public function getJustificacion2()
  {

    return trim($this->justificacion2);

  }
  
  public function getJustificacion3()
  {

    return trim($this->justificacion3);

  }
  
  public function getJustificacion4()
  {

    return trim($this->justificacion4);

  }
  
  public function getJustificacion5()
  {

    return trim($this->justificacion5);

  }
  
  public function getJustificacion6()
  {

    return trim($this->justificacion6);

  }
  
  public function getJustificacion7()
  {

    return trim($this->justificacion7);

  }
  
  public function getJustificacion8()
  {

    return trim($this->justificacion8);

  }
  
  public function getJustificacion9()
  {

    return trim($this->justificacion9);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getTipgas()
  {

    return trim($this->tipgas);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
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
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::REFTRA;
      }
  
		if ($this->aCptrasla !== null && $this->aCptrasla->getReftra() !== $v) {
			$this->aCptrasla = null;
		}

	} 
	
	public function setFectra($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECTRA;
    }

	} 
	
	public function setAnotra($v)
	{

    if ($this->anotra !== $v) {
        $this->anotra = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::ANOTRA;
      }
  
	} 
	
	public function setPertra($v)
	{

    if ($this->pertra !== $v) {
        $this->pertra = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::PERTRA;
      }
  
	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESTRA;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESANU;
      }
  
	} 
	
	public function setTottra($v)
	{

    if ($this->tottra !== $v) {
        $this->tottra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpsoltraslaPeer::TOTTRA;
      }
  
	} 
	
	public function setStatra($v)
	{

    if ($this->statra !== $v) {
        $this->statra = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STATRA;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::CODART;
      }
  
		if ($this->aCpartley !== null && $this->aCpartley->getCodart() !== $v) {
			$this->aCpartley = null;
		}

	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STACON;
      }
  
	} 
	
	public function setStagob($v)
	{

    if ($this->stagob !== $v) {
        $this->stagob = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STAGOB;
      }
  
	} 
	
	public function setStapre($v)
	{

    if ($this->stapre !== $v) {
        $this->stapre = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STAPRE;
      }
  
	} 
	
	public function setStaniv4($v)
	{

    if ($this->staniv4 !== $v) {
        $this->staniv4 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STANIV4;
      }
  
	} 
	
	public function setStaniv5($v)
	{

    if ($this->staniv5 !== $v) {
        $this->staniv5 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STANIV5;
      }
  
	} 
	
	public function setStaniv6($v)
	{

    if ($this->staniv6 !== $v) {
        $this->staniv6 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::STANIV6;
      }
  
	} 
	
	public function setFecpre($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpre !== $ts) {
      $this->fecpre = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECPRE;
    }

	} 
	
	public function setDespre($v)
	{

    if ($this->despre !== $v) {
        $this->despre = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESPRE;
      }
  
	} 
	
	public function setFeccon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECCON;
    }

	} 
	
	public function setDescon($v)
	{

    if ($this->descon !== $v) {
        $this->descon = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESCON;
      }
  
	} 
	
	public function setFecgob($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgob] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgob !== $ts) {
      $this->fecgob = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECGOB;
    }

	} 
	
	public function setDesgob($v)
	{

    if ($this->desgob !== $v) {
        $this->desgob = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESGOB;
      }
  
	} 
	
	public function setFecniv4($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecniv4] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecniv4 !== $ts) {
      $this->fecniv4 = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECNIV4;
    }

	} 
	
	public function setDesniv4($v)
	{

    if ($this->desniv4 !== $v) {
        $this->desniv4 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESNIV4;
      }
  
	} 
	
	public function setFecniv5($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecniv5] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecniv5 !== $ts) {
      $this->fecniv5 = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECNIV5;
    }

	} 
	
	public function setDesniv5($v)
	{

    if ($this->desniv5 !== $v) {
        $this->desniv5 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESNIV5;
      }
  
	} 
	
	public function setFecniv6($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecniv6] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecniv6 !== $ts) {
      $this->fecniv6 = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECNIV6;
    }

	} 
	
	public function setDesniv6($v)
	{

    if ($this->desniv6 !== $v) {
        $this->desniv6 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::DESNIV6;
      }
  
	} 
	
	public function setJustificacion($v)
	{

    if ($this->justificacion !== $v) {
        $this->justificacion = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION;
      }
  
	} 
	
	public function setFeccont($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccont] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccont !== $ts) {
      $this->feccont = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECCONT;
    }

	} 
	
	public function setJustificacion1($v)
	{

    if ($this->justificacion1 !== $v) {
        $this->justificacion1 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION1;
      }
  
	} 
	
	public function setJustificacion2($v)
	{

    if ($this->justificacion2 !== $v) {
        $this->justificacion2 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION2;
      }
  
	} 
	
	public function setJustificacion3($v)
	{

    if ($this->justificacion3 !== $v) {
        $this->justificacion3 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION3;
      }
  
	} 
	
	public function setJustificacion4($v)
	{

    if ($this->justificacion4 !== $v) {
        $this->justificacion4 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION4;
      }
  
	} 
	
	public function setJustificacion5($v)
	{

    if ($this->justificacion5 !== $v) {
        $this->justificacion5 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION5;
      }
  
	} 
	
	public function setJustificacion6($v)
	{

    if ($this->justificacion6 !== $v) {
        $this->justificacion6 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION6;
      }
  
	} 
	
	public function setJustificacion7($v)
	{

    if ($this->justificacion7 !== $v) {
        $this->justificacion7 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION7;
      }
  
	} 
	
	public function setJustificacion8($v)
	{

    if ($this->justificacion8 !== $v) {
        $this->justificacion8 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION8;
      }
  
	} 
	
	public function setJustificacion9($v)
	{

    if ($this->justificacion9 !== $v) {
        $this->justificacion9 = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::JUSTIFICACION9;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::TIPO;
      }
  
	} 
	
	public function setTipgas($v)
	{

    if ($this->tipgas !== $v) {
        $this->tipgas = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::TIPGAS;
      }
  
	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CpsoltraslaPeer::FECANU;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpsoltraslaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->anotra = $rs->getString($startcol + 2);

      $this->pertra = $rs->getString($startcol + 3);

      $this->destra = $rs->getString($startcol + 4);

      $this->desanu = $rs->getString($startcol + 5);

      $this->tottra = $rs->getFloat($startcol + 6);

      $this->statra = $rs->getString($startcol + 7);

      $this->codart = $rs->getString($startcol + 8);

      $this->stacon = $rs->getString($startcol + 9);

      $this->stagob = $rs->getString($startcol + 10);

      $this->stapre = $rs->getString($startcol + 11);

      $this->staniv4 = $rs->getString($startcol + 12);

      $this->staniv5 = $rs->getString($startcol + 13);

      $this->staniv6 = $rs->getString($startcol + 14);

      $this->fecpre = $rs->getDate($startcol + 15, null);

      $this->despre = $rs->getString($startcol + 16);

      $this->feccon = $rs->getDate($startcol + 17, null);

      $this->descon = $rs->getString($startcol + 18);

      $this->fecgob = $rs->getDate($startcol + 19, null);

      $this->desgob = $rs->getString($startcol + 20);

      $this->fecniv4 = $rs->getDate($startcol + 21, null);

      $this->desniv4 = $rs->getString($startcol + 22);

      $this->fecniv5 = $rs->getDate($startcol + 23, null);

      $this->desniv5 = $rs->getString($startcol + 24);

      $this->fecniv6 = $rs->getDate($startcol + 25, null);

      $this->desniv6 = $rs->getString($startcol + 26);

      $this->justificacion = $rs->getString($startcol + 27);

      $this->feccont = $rs->getDate($startcol + 28, null);

      $this->justificacion1 = $rs->getString($startcol + 29);

      $this->justificacion2 = $rs->getString($startcol + 30);

      $this->justificacion3 = $rs->getString($startcol + 31);

      $this->justificacion4 = $rs->getString($startcol + 32);

      $this->justificacion5 = $rs->getString($startcol + 33);

      $this->justificacion6 = $rs->getString($startcol + 34);

      $this->justificacion7 = $rs->getString($startcol + 35);

      $this->justificacion8 = $rs->getString($startcol + 36);

      $this->justificacion9 = $rs->getString($startcol + 37);

      $this->tipo = $rs->getString($startcol + 38);

      $this->tipgas = $rs->getString($startcol + 39);

      $this->fecanu = $rs->getDate($startcol + 40, null);

      $this->id = $rs->getInt($startcol + 41);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 42; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpsoltrasla object", $e);
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
			$con = Propel::getConnection(CpsoltraslaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpsoltraslaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpsoltraslaPeer::DATABASE_NAME);
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


												
			if ($this->aCptrasla !== null) {
				if ($this->aCptrasla->isModified()) {
					$affectedRows += $this->aCptrasla->save($con);
				}
				$this->setCptrasla($this->aCptrasla);
			}

			if ($this->aCpartley !== null) {
				if ($this->aCpartley->isModified()) {
					$affectedRows += $this->aCpartley->save($con);
				}
				$this->setCpartley($this->aCpartley);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpsoltraslaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpsoltraslaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpsolmovtras !== null) {
				foreach($this->collCpsolmovtras as $referrerFK) {
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


												
			if ($this->aCptrasla !== null) {
				if (!$this->aCptrasla->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCptrasla->getValidationFailures());
				}
			}

			if ($this->aCpartley !== null) {
				if (!$this->aCpartley->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpartley->getValidationFailures());
				}
			}


			if (($retval = CpsoltraslaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpsolmovtras !== null) {
					foreach($this->collCpsolmovtras as $referrerFK) {
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
		$pos = CpsoltraslaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getAnotra();
				break;
			case 3:
				return $this->getPertra();
				break;
			case 4:
				return $this->getDestra();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getTottra();
				break;
			case 7:
				return $this->getStatra();
				break;
			case 8:
				return $this->getCodart();
				break;
			case 9:
				return $this->getStacon();
				break;
			case 10:
				return $this->getStagob();
				break;
			case 11:
				return $this->getStapre();
				break;
			case 12:
				return $this->getStaniv4();
				break;
			case 13:
				return $this->getStaniv5();
				break;
			case 14:
				return $this->getStaniv6();
				break;
			case 15:
				return $this->getFecpre();
				break;
			case 16:
				return $this->getDespre();
				break;
			case 17:
				return $this->getFeccon();
				break;
			case 18:
				return $this->getDescon();
				break;
			case 19:
				return $this->getFecgob();
				break;
			case 20:
				return $this->getDesgob();
				break;
			case 21:
				return $this->getFecniv4();
				break;
			case 22:
				return $this->getDesniv4();
				break;
			case 23:
				return $this->getFecniv5();
				break;
			case 24:
				return $this->getDesniv5();
				break;
			case 25:
				return $this->getFecniv6();
				break;
			case 26:
				return $this->getDesniv6();
				break;
			case 27:
				return $this->getJustificacion();
				break;
			case 28:
				return $this->getFeccont();
				break;
			case 29:
				return $this->getJustificacion1();
				break;
			case 30:
				return $this->getJustificacion2();
				break;
			case 31:
				return $this->getJustificacion3();
				break;
			case 32:
				return $this->getJustificacion4();
				break;
			case 33:
				return $this->getJustificacion5();
				break;
			case 34:
				return $this->getJustificacion6();
				break;
			case 35:
				return $this->getJustificacion7();
				break;
			case 36:
				return $this->getJustificacion8();
				break;
			case 37:
				return $this->getJustificacion9();
				break;
			case 38:
				return $this->getTipo();
				break;
			case 39:
				return $this->getTipgas();
				break;
			case 40:
				return $this->getFecanu();
				break;
			case 41:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoltraslaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getAnotra(),
			$keys[3] => $this->getPertra(),
			$keys[4] => $this->getDestra(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getTottra(),
			$keys[7] => $this->getStatra(),
			$keys[8] => $this->getCodart(),
			$keys[9] => $this->getStacon(),
			$keys[10] => $this->getStagob(),
			$keys[11] => $this->getStapre(),
			$keys[12] => $this->getStaniv4(),
			$keys[13] => $this->getStaniv5(),
			$keys[14] => $this->getStaniv6(),
			$keys[15] => $this->getFecpre(),
			$keys[16] => $this->getDespre(),
			$keys[17] => $this->getFeccon(),
			$keys[18] => $this->getDescon(),
			$keys[19] => $this->getFecgob(),
			$keys[20] => $this->getDesgob(),
			$keys[21] => $this->getFecniv4(),
			$keys[22] => $this->getDesniv4(),
			$keys[23] => $this->getFecniv5(),
			$keys[24] => $this->getDesniv5(),
			$keys[25] => $this->getFecniv6(),
			$keys[26] => $this->getDesniv6(),
			$keys[27] => $this->getJustificacion(),
			$keys[28] => $this->getFeccont(),
			$keys[29] => $this->getJustificacion1(),
			$keys[30] => $this->getJustificacion2(),
			$keys[31] => $this->getJustificacion3(),
			$keys[32] => $this->getJustificacion4(),
			$keys[33] => $this->getJustificacion5(),
			$keys[34] => $this->getJustificacion6(),
			$keys[35] => $this->getJustificacion7(),
			$keys[36] => $this->getJustificacion8(),
			$keys[37] => $this->getJustificacion9(),
			$keys[38] => $this->getTipo(),
			$keys[39] => $this->getTipgas(),
			$keys[40] => $this->getFecanu(),
			$keys[41] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsoltraslaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setAnotra($value);
				break;
			case 3:
				$this->setPertra($value);
				break;
			case 4:
				$this->setDestra($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setTottra($value);
				break;
			case 7:
				$this->setStatra($value);
				break;
			case 8:
				$this->setCodart($value);
				break;
			case 9:
				$this->setStacon($value);
				break;
			case 10:
				$this->setStagob($value);
				break;
			case 11:
				$this->setStapre($value);
				break;
			case 12:
				$this->setStaniv4($value);
				break;
			case 13:
				$this->setStaniv5($value);
				break;
			case 14:
				$this->setStaniv6($value);
				break;
			case 15:
				$this->setFecpre($value);
				break;
			case 16:
				$this->setDespre($value);
				break;
			case 17:
				$this->setFeccon($value);
				break;
			case 18:
				$this->setDescon($value);
				break;
			case 19:
				$this->setFecgob($value);
				break;
			case 20:
				$this->setDesgob($value);
				break;
			case 21:
				$this->setFecniv4($value);
				break;
			case 22:
				$this->setDesniv4($value);
				break;
			case 23:
				$this->setFecniv5($value);
				break;
			case 24:
				$this->setDesniv5($value);
				break;
			case 25:
				$this->setFecniv6($value);
				break;
			case 26:
				$this->setDesniv6($value);
				break;
			case 27:
				$this->setJustificacion($value);
				break;
			case 28:
				$this->setFeccont($value);
				break;
			case 29:
				$this->setJustificacion1($value);
				break;
			case 30:
				$this->setJustificacion2($value);
				break;
			case 31:
				$this->setJustificacion3($value);
				break;
			case 32:
				$this->setJustificacion4($value);
				break;
			case 33:
				$this->setJustificacion5($value);
				break;
			case 34:
				$this->setJustificacion6($value);
				break;
			case 35:
				$this->setJustificacion7($value);
				break;
			case 36:
				$this->setJustificacion8($value);
				break;
			case 37:
				$this->setJustificacion9($value);
				break;
			case 38:
				$this->setTipo($value);
				break;
			case 39:
				$this->setTipgas($value);
				break;
			case 40:
				$this->setFecanu($value);
				break;
			case 41:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoltraslaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnotra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPertra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDestra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTottra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodart($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStacon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStagob($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStapre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStaniv4($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStaniv5($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStaniv6($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecpre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDespre($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFeccon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDescon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecgob($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDesgob($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecniv4($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDesniv4($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFecniv5($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDesniv5($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecniv6($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setDesniv6($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setJustificacion($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFeccont($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setJustificacion1($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setJustificacion2($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setJustificacion3($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setJustificacion4($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setJustificacion5($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setJustificacion6($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setJustificacion7($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setJustificacion8($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setJustificacion9($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setTipo($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setTipgas($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setFecanu($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setId($arr[$keys[41]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpsoltraslaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpsoltraslaPeer::REFTRA)) $criteria->add(CpsoltraslaPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(CpsoltraslaPeer::FECTRA)) $criteria->add(CpsoltraslaPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(CpsoltraslaPeer::ANOTRA)) $criteria->add(CpsoltraslaPeer::ANOTRA, $this->anotra);
		if ($this->isColumnModified(CpsoltraslaPeer::PERTRA)) $criteria->add(CpsoltraslaPeer::PERTRA, $this->pertra);
		if ($this->isColumnModified(CpsoltraslaPeer::DESTRA)) $criteria->add(CpsoltraslaPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(CpsoltraslaPeer::DESANU)) $criteria->add(CpsoltraslaPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpsoltraslaPeer::TOTTRA)) $criteria->add(CpsoltraslaPeer::TOTTRA, $this->tottra);
		if ($this->isColumnModified(CpsoltraslaPeer::STATRA)) $criteria->add(CpsoltraslaPeer::STATRA, $this->statra);
		if ($this->isColumnModified(CpsoltraslaPeer::CODART)) $criteria->add(CpsoltraslaPeer::CODART, $this->codart);
		if ($this->isColumnModified(CpsoltraslaPeer::STACON)) $criteria->add(CpsoltraslaPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CpsoltraslaPeer::STAGOB)) $criteria->add(CpsoltraslaPeer::STAGOB, $this->stagob);
		if ($this->isColumnModified(CpsoltraslaPeer::STAPRE)) $criteria->add(CpsoltraslaPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(CpsoltraslaPeer::STANIV4)) $criteria->add(CpsoltraslaPeer::STANIV4, $this->staniv4);
		if ($this->isColumnModified(CpsoltraslaPeer::STANIV5)) $criteria->add(CpsoltraslaPeer::STANIV5, $this->staniv5);
		if ($this->isColumnModified(CpsoltraslaPeer::STANIV6)) $criteria->add(CpsoltraslaPeer::STANIV6, $this->staniv6);
		if ($this->isColumnModified(CpsoltraslaPeer::FECPRE)) $criteria->add(CpsoltraslaPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(CpsoltraslaPeer::DESPRE)) $criteria->add(CpsoltraslaPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(CpsoltraslaPeer::FECCON)) $criteria->add(CpsoltraslaPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CpsoltraslaPeer::DESCON)) $criteria->add(CpsoltraslaPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CpsoltraslaPeer::FECGOB)) $criteria->add(CpsoltraslaPeer::FECGOB, $this->fecgob);
		if ($this->isColumnModified(CpsoltraslaPeer::DESGOB)) $criteria->add(CpsoltraslaPeer::DESGOB, $this->desgob);
		if ($this->isColumnModified(CpsoltraslaPeer::FECNIV4)) $criteria->add(CpsoltraslaPeer::FECNIV4, $this->fecniv4);
		if ($this->isColumnModified(CpsoltraslaPeer::DESNIV4)) $criteria->add(CpsoltraslaPeer::DESNIV4, $this->desniv4);
		if ($this->isColumnModified(CpsoltraslaPeer::FECNIV5)) $criteria->add(CpsoltraslaPeer::FECNIV5, $this->fecniv5);
		if ($this->isColumnModified(CpsoltraslaPeer::DESNIV5)) $criteria->add(CpsoltraslaPeer::DESNIV5, $this->desniv5);
		if ($this->isColumnModified(CpsoltraslaPeer::FECNIV6)) $criteria->add(CpsoltraslaPeer::FECNIV6, $this->fecniv6);
		if ($this->isColumnModified(CpsoltraslaPeer::DESNIV6)) $criteria->add(CpsoltraslaPeer::DESNIV6, $this->desniv6);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION, $this->justificacion);
		if ($this->isColumnModified(CpsoltraslaPeer::FECCONT)) $criteria->add(CpsoltraslaPeer::FECCONT, $this->feccont);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION1)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION1, $this->justificacion1);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION2)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION2, $this->justificacion2);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION3)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION3, $this->justificacion3);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION4)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION4, $this->justificacion4);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION5)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION5, $this->justificacion5);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION6)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION6, $this->justificacion6);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION7)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION7, $this->justificacion7);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION8)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION8, $this->justificacion8);
		if ($this->isColumnModified(CpsoltraslaPeer::JUSTIFICACION9)) $criteria->add(CpsoltraslaPeer::JUSTIFICACION9, $this->justificacion9);
		if ($this->isColumnModified(CpsoltraslaPeer::TIPO)) $criteria->add(CpsoltraslaPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CpsoltraslaPeer::TIPGAS)) $criteria->add(CpsoltraslaPeer::TIPGAS, $this->tipgas);
		if ($this->isColumnModified(CpsoltraslaPeer::FECANU)) $criteria->add(CpsoltraslaPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpsoltraslaPeer::ID)) $criteria->add(CpsoltraslaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpsoltraslaPeer::DATABASE_NAME);

		$criteria->add(CpsoltraslaPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setAnotra($this->anotra);

		$copyObj->setPertra($this->pertra);

		$copyObj->setDestra($this->destra);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setTottra($this->tottra);

		$copyObj->setStatra($this->statra);

		$copyObj->setCodart($this->codart);

		$copyObj->setStacon($this->stacon);

		$copyObj->setStagob($this->stagob);

		$copyObj->setStapre($this->stapre);

		$copyObj->setStaniv4($this->staniv4);

		$copyObj->setStaniv5($this->staniv5);

		$copyObj->setStaniv6($this->staniv6);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setDespre($this->despre);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setDescon($this->descon);

		$copyObj->setFecgob($this->fecgob);

		$copyObj->setDesgob($this->desgob);

		$copyObj->setFecniv4($this->fecniv4);

		$copyObj->setDesniv4($this->desniv4);

		$copyObj->setFecniv5($this->fecniv5);

		$copyObj->setDesniv5($this->desniv5);

		$copyObj->setFecniv6($this->fecniv6);

		$copyObj->setDesniv6($this->desniv6);

		$copyObj->setJustificacion($this->justificacion);

		$copyObj->setFeccont($this->feccont);

		$copyObj->setJustificacion1($this->justificacion1);

		$copyObj->setJustificacion2($this->justificacion2);

		$copyObj->setJustificacion3($this->justificacion3);

		$copyObj->setJustificacion4($this->justificacion4);

		$copyObj->setJustificacion5($this->justificacion5);

		$copyObj->setJustificacion6($this->justificacion6);

		$copyObj->setJustificacion7($this->justificacion7);

		$copyObj->setJustificacion8($this->justificacion8);

		$copyObj->setJustificacion9($this->justificacion9);

		$copyObj->setTipo($this->tipo);

		$copyObj->setTipgas($this->tipgas);

		$copyObj->setFecanu($this->fecanu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpsolmovtras() as $relObj) {
				$copyObj->addCpsolmovtra($relObj->copy($deepCopy));
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
			self::$peer = new CpsoltraslaPeer();
		}
		return self::$peer;
	}

	
	public function setCptrasla($v)
	{


		if ($v === null) {
			$this->setReftra(NULL);
		} else {
			$this->setReftra($v->getReftra());
		}


		$this->aCptrasla = $v;
	}


	
	public function getCptrasla($con = null)
	{
		if ($this->aCptrasla === null && (($this->reftra !== "" && $this->reftra !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCptraslaPeer.php';

      $c = new Criteria();
      $c->add(CptraslaPeer::REFTRA,$this->reftra);
      
			$this->aCptrasla = CptraslaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCptrasla;
	}

	
	public function setCpartley($v)
	{


		if ($v === null) {
			$this->setCodart(NULL);
		} else {
			$this->setCodart($v->getCodart());
		}


		$this->aCpartley = $v;
	}


	
	public function getCpartley($con = null)
	{
		if ($this->aCpartley === null && (($this->codart !== "" && $this->codart !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpartleyPeer.php';

      $c = new Criteria();
      $c->add(CpartleyPeer::CODART,$this->codart);
      
			$this->aCpartley = CpartleyPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpartley;
	}

	
	public function initCpsolmovtras()
	{
		if ($this->collCpsolmovtras === null) {
			$this->collCpsolmovtras = array();
		}
	}

	
	public function getCpsolmovtras($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsolmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsolmovtras === null) {
			if ($this->isNew()) {
			   $this->collCpsolmovtras = array();
			} else {

				$criteria->add(CpsolmovtraPeer::REFTRA, $this->getReftra());

				CpsolmovtraPeer::addSelectColumns($criteria);
				$this->collCpsolmovtras = CpsolmovtraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsolmovtraPeer::REFTRA, $this->getReftra());

				CpsolmovtraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsolmovtraCriteria) || !$this->lastCpsolmovtraCriteria->equals($criteria)) {
					$this->collCpsolmovtras = CpsolmovtraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsolmovtraCriteria = $criteria;
		return $this->collCpsolmovtras;
	}

	
	public function countCpsolmovtras($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsolmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsolmovtraPeer::REFTRA, $this->getReftra());

		return CpsolmovtraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsolmovtra(Cpsolmovtra $l)
	{
		$this->collCpsolmovtras[] = $l;
		$l->setCpsoltrasla($this);
	}

} 