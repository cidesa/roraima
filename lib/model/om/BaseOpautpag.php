<?php


abstract class BaseOpautpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $tipcau;


	
	protected $fecemi;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $monord;


	
	protected $desord;


	
	protected $mondes;


	
	protected $monret;


	
	protected $numche;


	
	protected $ctaban;


	
	protected $ctapag;


	
	protected $numcom;


	
	protected $status;


	
	protected $coduni;


	
	protected $fecenvcon;


	
	protected $fecenvfin;


	
	protected $ctapagfin;


	
	protected $nombensus;


	
	protected $fecanu;


	
	protected $fecrecfin;


	
	protected $anopre;


	
	protected $fecpag;


	
	protected $monpag;


	
	protected $obsord;


	
	protected $numtiq;


	
	protected $peraut;


	
	protected $desanu;


	
	protected $cedaut;


	
	protected $nomper1;


	
	protected $nomper2;


	
	protected $horcon;


	
	protected $feccon;


	
	protected $nomcat;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getMonord($val=false)
  {

    if($val) return number_format($this->monord,2,',','.');
    else return $this->monord;

  }
  
  public function getDesord()
  {

    return trim($this->desord);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getCtapag()
  {

    return trim($this->ctapag);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getFecenvcon($format = 'Y-m-d')
  {

    if ($this->fecenvcon === null || $this->fecenvcon === '') {
      return null;
    } elseif (!is_int($this->fecenvcon)) {
            $ts = adodb_strtotime($this->fecenvcon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenvcon] as date/time value: " . var_export($this->fecenvcon, true));
      }
    } else {
      $ts = $this->fecenvcon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecenvfin($format = 'Y-m-d')
  {

    if ($this->fecenvfin === null || $this->fecenvfin === '') {
      return null;
    } elseif (!is_int($this->fecenvfin)) {
            $ts = adodb_strtotime($this->fecenvfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenvfin] as date/time value: " . var_export($this->fecenvfin, true));
      }
    } else {
      $ts = $this->fecenvfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCtapagfin()
  {

    return trim($this->ctapagfin);

  }
  
  public function getNombensus()
  {

    return trim($this->nombensus);

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

  
  public function getFecrecfin($format = 'Y-m-d')
  {

    if ($this->fecrecfin === null || $this->fecrecfin === '') {
      return null;
    } elseif (!is_int($this->fecrecfin)) {
            $ts = adodb_strtotime($this->fecrecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecfin] as date/time value: " . var_export($this->fecrecfin, true));
      }
    } else {
      $ts = $this->fecrecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnopre()
  {

    return trim($this->anopre);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getObsord()
  {

    return trim($this->obsord);

  }
  
  public function getNumtiq()
  {

    return trim($this->numtiq);

  }
  
  public function getPeraut()
  {

    return trim($this->peraut);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getCedaut()
  {

    return trim($this->cedaut);

  }
  
  public function getNomper1()
  {

    return trim($this->nomper1);

  }
  
  public function getNomper2()
  {

    return trim($this->nomper2);

  }
  
  public function getHorcon()
  {

    return trim($this->horcon);

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

  
  public function getNomcat()
  {

    return trim($this->nomcat);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpautpagPeer::NUMORD;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = OpautpagPeer::TIPCAU;
      }
  
	} 
	
	public function setFecemi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = OpautpagPeer::FECEMI;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = OpautpagPeer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = OpautpagPeer::NOMBEN;
      }
  
	} 
	
	public function setMonord($v)
	{

    if ($this->monord !== $v) {
        $this->monord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpautpagPeer::MONORD;
      }
  
	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = OpautpagPeer::DESORD;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpautpagPeer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpautpagPeer::MONRET;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = OpautpagPeer::NUMCHE;
      }
  
	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = OpautpagPeer::CTABAN;
      }
  
	} 
	
	public function setCtapag($v)
	{

    if ($this->ctapag !== $v) {
        $this->ctapag = $v;
        $this->modifiedColumns[] = OpautpagPeer::CTAPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = OpautpagPeer::NUMCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = OpautpagPeer::STATUS;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = OpautpagPeer::CODUNI;
      }
  
	} 
	
	public function setFecenvcon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvcon !== $ts) {
      $this->fecenvcon = $ts;
      $this->modifiedColumns[] = OpautpagPeer::FECENVCON;
    }

	} 
	
	public function setFecenvfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvfin !== $ts) {
      $this->fecenvfin = $ts;
      $this->modifiedColumns[] = OpautpagPeer::FECENVFIN;
    }

	} 
	
	public function setCtapagfin($v)
	{

    if ($this->ctapagfin !== $v) {
        $this->ctapagfin = $v;
        $this->modifiedColumns[] = OpautpagPeer::CTAPAGFIN;
      }
  
	} 
	
	public function setNombensus($v)
	{

    if ($this->nombensus !== $v) {
        $this->nombensus = $v;
        $this->modifiedColumns[] = OpautpagPeer::NOMBENSUS;
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
      $this->modifiedColumns[] = OpautpagPeer::FECANU;
    }

	} 
	
	public function setFecrecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecfin !== $ts) {
      $this->fecrecfin = $ts;
      $this->modifiedColumns[] = OpautpagPeer::FECRECFIN;
    }

	} 
	
	public function setAnopre($v)
	{

    if ($this->anopre !== $v) {
        $this->anopre = $v;
        $this->modifiedColumns[] = OpautpagPeer::ANOPRE;
      }
  
	} 
	
	public function setFecpag($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = OpautpagPeer::FECPAG;
    }

	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpautpagPeer::MONPAG;
      }
  
	} 
	
	public function setObsord($v)
	{

    if ($this->obsord !== $v) {
        $this->obsord = $v;
        $this->modifiedColumns[] = OpautpagPeer::OBSORD;
      }
  
	} 
	
	public function setNumtiq($v)
	{

    if ($this->numtiq !== $v) {
        $this->numtiq = $v;
        $this->modifiedColumns[] = OpautpagPeer::NUMTIQ;
      }
  
	} 
	
	public function setPeraut($v)
	{

    if ($this->peraut !== $v) {
        $this->peraut = $v;
        $this->modifiedColumns[] = OpautpagPeer::PERAUT;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = OpautpagPeer::DESANU;
      }
  
	} 
	
	public function setCedaut($v)
	{

    if ($this->cedaut !== $v) {
        $this->cedaut = $v;
        $this->modifiedColumns[] = OpautpagPeer::CEDAUT;
      }
  
	} 
	
	public function setNomper1($v)
	{

    if ($this->nomper1 !== $v) {
        $this->nomper1 = $v;
        $this->modifiedColumns[] = OpautpagPeer::NOMPER1;
      }
  
	} 
	
	public function setNomper2($v)
	{

    if ($this->nomper2 !== $v) {
        $this->nomper2 = $v;
        $this->modifiedColumns[] = OpautpagPeer::NOMPER2;
      }
  
	} 
	
	public function setHorcon($v)
	{

    if ($this->horcon !== $v) {
        $this->horcon = $v;
        $this->modifiedColumns[] = OpautpagPeer::HORCON;
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
      $this->modifiedColumns[] = OpautpagPeer::FECCON;
    }

	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = OpautpagPeer::NOMCAT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpautpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->tipcau = $rs->getString($startcol + 1);

      $this->fecemi = $rs->getDate($startcol + 2, null);

      $this->cedrif = $rs->getString($startcol + 3);

      $this->nomben = $rs->getString($startcol + 4);

      $this->monord = $rs->getFloat($startcol + 5);

      $this->desord = $rs->getString($startcol + 6);

      $this->mondes = $rs->getFloat($startcol + 7);

      $this->monret = $rs->getFloat($startcol + 8);

      $this->numche = $rs->getString($startcol + 9);

      $this->ctaban = $rs->getString($startcol + 10);

      $this->ctapag = $rs->getString($startcol + 11);

      $this->numcom = $rs->getString($startcol + 12);

      $this->status = $rs->getString($startcol + 13);

      $this->coduni = $rs->getString($startcol + 14);

      $this->fecenvcon = $rs->getDate($startcol + 15, null);

      $this->fecenvfin = $rs->getDate($startcol + 16, null);

      $this->ctapagfin = $rs->getString($startcol + 17);

      $this->nombensus = $rs->getString($startcol + 18);

      $this->fecanu = $rs->getDate($startcol + 19, null);

      $this->fecrecfin = $rs->getDate($startcol + 20, null);

      $this->anopre = $rs->getString($startcol + 21);

      $this->fecpag = $rs->getDate($startcol + 22, null);

      $this->monpag = $rs->getFloat($startcol + 23);

      $this->obsord = $rs->getString($startcol + 24);

      $this->numtiq = $rs->getString($startcol + 25);

      $this->peraut = $rs->getString($startcol + 26);

      $this->desanu = $rs->getString($startcol + 27);

      $this->cedaut = $rs->getString($startcol + 28);

      $this->nomper1 = $rs->getString($startcol + 29);

      $this->nomper2 = $rs->getString($startcol + 30);

      $this->horcon = $rs->getString($startcol + 31);

      $this->feccon = $rs->getDate($startcol + 32, null);

      $this->nomcat = $rs->getString($startcol + 33);

      $this->id = $rs->getInt($startcol + 34);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 35; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opautpag object", $e);
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
			$con = Propel::getConnection(OpautpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpautpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpautpagPeer::DATABASE_NAME);
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
					$pk = OpautpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpautpagPeer::doUpdate($this, $con);
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


			if (($retval = OpautpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpautpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getFecemi();
				break;
			case 3:
				return $this->getCedrif();
				break;
			case 4:
				return $this->getNomben();
				break;
			case 5:
				return $this->getMonord();
				break;
			case 6:
				return $this->getDesord();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getMonret();
				break;
			case 9:
				return $this->getNumche();
				break;
			case 10:
				return $this->getCtaban();
				break;
			case 11:
				return $this->getCtapag();
				break;
			case 12:
				return $this->getNumcom();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getCoduni();
				break;
			case 15:
				return $this->getFecenvcon();
				break;
			case 16:
				return $this->getFecenvfin();
				break;
			case 17:
				return $this->getCtapagfin();
				break;
			case 18:
				return $this->getNombensus();
				break;
			case 19:
				return $this->getFecanu();
				break;
			case 20:
				return $this->getFecrecfin();
				break;
			case 21:
				return $this->getAnopre();
				break;
			case 22:
				return $this->getFecpag();
				break;
			case 23:
				return $this->getMonpag();
				break;
			case 24:
				return $this->getObsord();
				break;
			case 25:
				return $this->getNumtiq();
				break;
			case 26:
				return $this->getPeraut();
				break;
			case 27:
				return $this->getDesanu();
				break;
			case 28:
				return $this->getCedaut();
				break;
			case 29:
				return $this->getNomper1();
				break;
			case 30:
				return $this->getNomper2();
				break;
			case 31:
				return $this->getHorcon();
				break;
			case 32:
				return $this->getFeccon();
				break;
			case 33:
				return $this->getNomcat();
				break;
			case 34:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpautpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getFecemi(),
			$keys[3] => $this->getCedrif(),
			$keys[4] => $this->getNomben(),
			$keys[5] => $this->getMonord(),
			$keys[6] => $this->getDesord(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getMonret(),
			$keys[9] => $this->getNumche(),
			$keys[10] => $this->getCtaban(),
			$keys[11] => $this->getCtapag(),
			$keys[12] => $this->getNumcom(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getCoduni(),
			$keys[15] => $this->getFecenvcon(),
			$keys[16] => $this->getFecenvfin(),
			$keys[17] => $this->getCtapagfin(),
			$keys[18] => $this->getNombensus(),
			$keys[19] => $this->getFecanu(),
			$keys[20] => $this->getFecrecfin(),
			$keys[21] => $this->getAnopre(),
			$keys[22] => $this->getFecpag(),
			$keys[23] => $this->getMonpag(),
			$keys[24] => $this->getObsord(),
			$keys[25] => $this->getNumtiq(),
			$keys[26] => $this->getPeraut(),
			$keys[27] => $this->getDesanu(),
			$keys[28] => $this->getCedaut(),
			$keys[29] => $this->getNomper1(),
			$keys[30] => $this->getNomper2(),
			$keys[31] => $this->getHorcon(),
			$keys[32] => $this->getFeccon(),
			$keys[33] => $this->getNomcat(),
			$keys[34] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpautpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setFecemi($value);
				break;
			case 3:
				$this->setCedrif($value);
				break;
			case 4:
				$this->setNomben($value);
				break;
			case 5:
				$this->setMonord($value);
				break;
			case 6:
				$this->setDesord($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setMonret($value);
				break;
			case 9:
				$this->setNumche($value);
				break;
			case 10:
				$this->setCtaban($value);
				break;
			case 11:
				$this->setCtapag($value);
				break;
			case 12:
				$this->setNumcom($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setCoduni($value);
				break;
			case 15:
				$this->setFecenvcon($value);
				break;
			case 16:
				$this->setFecenvfin($value);
				break;
			case 17:
				$this->setCtapagfin($value);
				break;
			case 18:
				$this->setNombensus($value);
				break;
			case 19:
				$this->setFecanu($value);
				break;
			case 20:
				$this->setFecrecfin($value);
				break;
			case 21:
				$this->setAnopre($value);
				break;
			case 22:
				$this->setFecpag($value);
				break;
			case 23:
				$this->setMonpag($value);
				break;
			case 24:
				$this->setObsord($value);
				break;
			case 25:
				$this->setNumtiq($value);
				break;
			case 26:
				$this->setPeraut($value);
				break;
			case 27:
				$this->setDesanu($value);
				break;
			case 28:
				$this->setCedaut($value);
				break;
			case 29:
				$this->setNomper1($value);
				break;
			case 30:
				$this->setNomper2($value);
				break;
			case 31:
				$this->setHorcon($value);
				break;
			case 32:
				$this->setFeccon($value);
				break;
			case 33:
				$this->setNomcat($value);
				break;
			case 34:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpautpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecemi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedrif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonord($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesord($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonret($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumche($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCtaban($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCtapag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumcom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoduni($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecenvcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecenvfin($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCtapagfin($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNombensus($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecanu($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecrecfin($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setAnopre($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecpag($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMonpag($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setObsord($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNumtiq($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPeraut($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setDesanu($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCedaut($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setNomper1($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNomper2($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setHorcon($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFeccon($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNomcat($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setId($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpautpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpautpagPeer::NUMORD)) $criteria->add(OpautpagPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpautpagPeer::TIPCAU)) $criteria->add(OpautpagPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(OpautpagPeer::FECEMI)) $criteria->add(OpautpagPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(OpautpagPeer::CEDRIF)) $criteria->add(OpautpagPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(OpautpagPeer::NOMBEN)) $criteria->add(OpautpagPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(OpautpagPeer::MONORD)) $criteria->add(OpautpagPeer::MONORD, $this->monord);
		if ($this->isColumnModified(OpautpagPeer::DESORD)) $criteria->add(OpautpagPeer::DESORD, $this->desord);
		if ($this->isColumnModified(OpautpagPeer::MONDES)) $criteria->add(OpautpagPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(OpautpagPeer::MONRET)) $criteria->add(OpautpagPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpautpagPeer::NUMCHE)) $criteria->add(OpautpagPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(OpautpagPeer::CTABAN)) $criteria->add(OpautpagPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(OpautpagPeer::CTAPAG)) $criteria->add(OpautpagPeer::CTAPAG, $this->ctapag);
		if ($this->isColumnModified(OpautpagPeer::NUMCOM)) $criteria->add(OpautpagPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(OpautpagPeer::STATUS)) $criteria->add(OpautpagPeer::STATUS, $this->status);
		if ($this->isColumnModified(OpautpagPeer::CODUNI)) $criteria->add(OpautpagPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(OpautpagPeer::FECENVCON)) $criteria->add(OpautpagPeer::FECENVCON, $this->fecenvcon);
		if ($this->isColumnModified(OpautpagPeer::FECENVFIN)) $criteria->add(OpautpagPeer::FECENVFIN, $this->fecenvfin);
		if ($this->isColumnModified(OpautpagPeer::CTAPAGFIN)) $criteria->add(OpautpagPeer::CTAPAGFIN, $this->ctapagfin);
		if ($this->isColumnModified(OpautpagPeer::NOMBENSUS)) $criteria->add(OpautpagPeer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(OpautpagPeer::FECANU)) $criteria->add(OpautpagPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(OpautpagPeer::FECRECFIN)) $criteria->add(OpautpagPeer::FECRECFIN, $this->fecrecfin);
		if ($this->isColumnModified(OpautpagPeer::ANOPRE)) $criteria->add(OpautpagPeer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(OpautpagPeer::FECPAG)) $criteria->add(OpautpagPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(OpautpagPeer::MONPAG)) $criteria->add(OpautpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(OpautpagPeer::OBSORD)) $criteria->add(OpautpagPeer::OBSORD, $this->obsord);
		if ($this->isColumnModified(OpautpagPeer::NUMTIQ)) $criteria->add(OpautpagPeer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(OpautpagPeer::PERAUT)) $criteria->add(OpautpagPeer::PERAUT, $this->peraut);
		if ($this->isColumnModified(OpautpagPeer::DESANU)) $criteria->add(OpautpagPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(OpautpagPeer::CEDAUT)) $criteria->add(OpautpagPeer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(OpautpagPeer::NOMPER1)) $criteria->add(OpautpagPeer::NOMPER1, $this->nomper1);
		if ($this->isColumnModified(OpautpagPeer::NOMPER2)) $criteria->add(OpautpagPeer::NOMPER2, $this->nomper2);
		if ($this->isColumnModified(OpautpagPeer::HORCON)) $criteria->add(OpautpagPeer::HORCON, $this->horcon);
		if ($this->isColumnModified(OpautpagPeer::FECCON)) $criteria->add(OpautpagPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(OpautpagPeer::NOMCAT)) $criteria->add(OpautpagPeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(OpautpagPeer::ID)) $criteria->add(OpautpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpautpagPeer::DATABASE_NAME);

		$criteria->add(OpautpagPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setMonord($this->monord);

		$copyObj->setDesord($this->desord);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);

		$copyObj->setNumche($this->numche);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setCtapag($this->ctapag);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setStatus($this->status);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setFecenvcon($this->fecenvcon);

		$copyObj->setFecenvfin($this->fecenvfin);

		$copyObj->setCtapagfin($this->ctapagfin);

		$copyObj->setNombensus($this->nombensus);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setFecrecfin($this->fecrecfin);

		$copyObj->setAnopre($this->anopre);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setObsord($this->obsord);

		$copyObj->setNumtiq($this->numtiq);

		$copyObj->setPeraut($this->peraut);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setCedaut($this->cedaut);

		$copyObj->setNomper1($this->nomper1);

		$copyObj->setNomper2($this->nomper2);

		$copyObj->setHorcon($this->horcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setNomcat($this->nomcat);


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
			self::$peer = new OpautpagPeer();
		}
		return self::$peer;
	}

} 