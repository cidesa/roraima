<?php


abstract class BaseFcdeclar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdec;


	
	protected $fecven;


	
	protected $fueing;


	
	protected $fecdec;


	
	protected $rifcon;


	
	protected $tipo;


	
	protected $numref;


	
	protected $nombre;


	
	protected $mondec;


	
	protected $edodec;


	
	protected $mora;


	
	protected $prontopg;


	
	protected $autliq;


	
	protected $fundec;


	
	protected $codrec;


	
	protected $modo;


	
	protected $numero;


	
	protected $conpag = '';


	
	protected $monabo = 0;


	
	protected $numabo;


	
	protected $nomcon;


	
	protected $otro;


	
	protected $miginc;


	
	protected $anodec;


	
	protected $fecultpag;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumdec()
  {

    return trim($this->numdec);

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

  
  public function getFueing()
  {

    return trim($this->fueing);

  }
  
  public function getFecdec($format = 'Y-m-d')
  {

    if ($this->fecdec === null || $this->fecdec === '') {
      return null;
    } elseif (!is_int($this->fecdec)) {
            $ts = adodb_strtotime($this->fecdec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
      }
    } else {
      $ts = $this->fecdec;
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
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getNumref()
  {

    return trim($this->numref);

  }
  
  public function getNombre()
  {

    return trim($this->nombre);

  }
  
  public function getMondec($val=false)
  {

    if($val) return number_format($this->mondec,2,',','.');
    else return $this->mondec;

  }
  
  public function getEdodec()
  {

    return trim($this->edodec);

  }
  
  public function getMora($val=false)
  {

    if($val) return number_format($this->mora,2,',','.');
    else return $this->mora;

  }
  
  public function getProntopg($val=false)
  {

    if($val) return number_format($this->prontopg,2,',','.');
    else return $this->prontopg;

  }
  
  public function getAutliq($val=false)
  {

    if($val) return number_format($this->autliq,2,',','.');
    else return $this->autliq;

  }
  
  public function getFundec()
  {

    return trim($this->fundec);

  }
  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getModo()
  {

    return trim($this->modo);

  }
  
  public function getNumero()
  {

    return trim($this->numero);

  }
  
  public function getConpag()
  {

    return trim($this->conpag);

  }
  
  public function getMonabo($val=false)
  {

    if($val) return number_format($this->monabo,2,',','.');
    else return $this->monabo;

  }
  
  public function getNumabo()
  {

    return trim($this->numabo);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getOtro()
  {

    return trim($this->otro);

  }
  
  public function getMiginc()
  {

    return trim($this->miginc);

  }
  
  public function getAnodec()
  {

    return trim($this->anodec);

  }
  
  public function getFecultpag($format = 'Y-m-d')
  {

    if ($this->fecultpag === null || $this->fecultpag === '') {
      return null;
    } elseif (!is_int($this->fecultpag)) {
            $ts = adodb_strtotime($this->fecultpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecultpag] as date/time value: " . var_export($this->fecultpag, true));
      }
    } else {
      $ts = $this->fecultpag;
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

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
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
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = FcdeclarPeer::NUMDEC;
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
      $this->modifiedColumns[] = FcdeclarPeer::FECVEN;
    }

	} 
	
	public function setFueing($v)
	{

    if ($this->fueing !== $v) {
        $this->fueing = $v;
        $this->modifiedColumns[] = FcdeclarPeer::FUEING;
      }
  
	} 
	
	public function setFecdec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdec !== $ts) {
      $this->fecdec = $ts;
      $this->modifiedColumns[] = FcdeclarPeer::FECDEC;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcdeclarPeer::RIFCON;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcdeclarPeer::TIPO;
      }
  
	} 
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = FcdeclarPeer::NUMREF;
      }
  
	} 
	
	public function setNombre($v)
	{

    if ($this->nombre !== $v) {
        $this->nombre = $v;
        $this->modifiedColumns[] = FcdeclarPeer::NOMBRE;
      }
  
	} 
	
	public function setMondec($v)
	{

    if ($this->mondec !== $v) {
        $this->mondec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdeclarPeer::MONDEC;
      }
  
	} 
	
	public function setEdodec($v)
	{

    if ($this->edodec !== $v) {
        $this->edodec = $v;
        $this->modifiedColumns[] = FcdeclarPeer::EDODEC;
      }
  
	} 
	
	public function setMora($v)
	{

    if ($this->mora !== $v) {
        $this->mora = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdeclarPeer::MORA;
      }
  
	} 
	
	public function setProntopg($v)
	{

    if ($this->prontopg !== $v) {
        $this->prontopg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdeclarPeer::PRONTOPG;
      }
  
	} 
	
	public function setAutliq($v)
	{

    if ($this->autliq !== $v) {
        $this->autliq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdeclarPeer::AUTLIQ;
      }
  
	} 
	
	public function setFundec($v)
	{

    if ($this->fundec !== $v) {
        $this->fundec = $v;
        $this->modifiedColumns[] = FcdeclarPeer::FUNDEC;
      }
  
	} 
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = FcdeclarPeer::CODREC;
      }
  
	} 
	
	public function setModo($v)
	{

    if ($this->modo !== $v) {
        $this->modo = $v;
        $this->modifiedColumns[] = FcdeclarPeer::MODO;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FcdeclarPeer::NUMERO;
      }
  
	} 
	
	public function setConpag($v)
	{

    if ($this->conpag !== $v || $v === '') {
        $this->conpag = $v;
        $this->modifiedColumns[] = FcdeclarPeer::CONPAG;
      }
  
	} 
	
	public function setMonabo($v)
	{

    if ($this->monabo !== $v || $v === 0) {
        $this->monabo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdeclarPeer::MONABO;
      }
  
	} 
	
	public function setNumabo($v)
	{

    if ($this->numabo !== $v) {
        $this->numabo = $v;
        $this->modifiedColumns[] = FcdeclarPeer::NUMABO;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcdeclarPeer::NOMCON;
      }
  
	} 
	
	public function setOtro($v)
	{

    if ($this->otro !== $v) {
        $this->otro = $v;
        $this->modifiedColumns[] = FcdeclarPeer::OTRO;
      }
  
	} 
	
	public function setMiginc($v)
	{

    if ($this->miginc !== $v) {
        $this->miginc = $v;
        $this->modifiedColumns[] = FcdeclarPeer::MIGINC;
      }
  
	} 
	
	public function setAnodec($v)
	{

    if ($this->anodec !== $v) {
        $this->anodec = $v;
        $this->modifiedColumns[] = FcdeclarPeer::ANODEC;
      }
  
	} 
	
	public function setFecultpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecultpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecultpag !== $ts) {
      $this->fecultpag = $ts;
      $this->modifiedColumns[] = FcdeclarPeer::FECULTPAG;
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
      $this->modifiedColumns[] = FcdeclarPeer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = FcdeclarPeer::FECCIE;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdeclarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numdec = $rs->getString($startcol + 0);

      $this->fecven = $rs->getDate($startcol + 1, null);

      $this->fueing = $rs->getString($startcol + 2);

      $this->fecdec = $rs->getDate($startcol + 3, null);

      $this->rifcon = $rs->getString($startcol + 4);

      $this->tipo = $rs->getString($startcol + 5);

      $this->numref = $rs->getString($startcol + 6);

      $this->nombre = $rs->getString($startcol + 7);

      $this->mondec = $rs->getFloat($startcol + 8);

      $this->edodec = $rs->getString($startcol + 9);

      $this->mora = $rs->getFloat($startcol + 10);

      $this->prontopg = $rs->getFloat($startcol + 11);

      $this->autliq = $rs->getFloat($startcol + 12);

      $this->fundec = $rs->getString($startcol + 13);

      $this->codrec = $rs->getString($startcol + 14);

      $this->modo = $rs->getString($startcol + 15);

      $this->numero = $rs->getString($startcol + 16);

      $this->conpag = $rs->getString($startcol + 17);

      $this->monabo = $rs->getFloat($startcol + 18);

      $this->numabo = $rs->getString($startcol + 19);

      $this->nomcon = $rs->getString($startcol + 20);

      $this->otro = $rs->getString($startcol + 21);

      $this->miginc = $rs->getString($startcol + 22);

      $this->anodec = $rs->getString($startcol + 23);

      $this->fecultpag = $rs->getDate($startcol + 24, null);

      $this->fecini = $rs->getDate($startcol + 25, null);

      $this->feccie = $rs->getDate($startcol + 26, null);

      $this->id = $rs->getInt($startcol + 27);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 28; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdeclar object", $e);
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
			$con = Propel::getConnection(FcdeclarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdeclarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdeclarPeer::DATABASE_NAME);
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
					$pk = FcdeclarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdeclarPeer::doUpdate($this, $con);
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


			if (($retval = FcdeclarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeclarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdec();
				break;
			case 1:
				return $this->getFecven();
				break;
			case 2:
				return $this->getFueing();
				break;
			case 3:
				return $this->getFecdec();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getTipo();
				break;
			case 6:
				return $this->getNumref();
				break;
			case 7:
				return $this->getNombre();
				break;
			case 8:
				return $this->getMondec();
				break;
			case 9:
				return $this->getEdodec();
				break;
			case 10:
				return $this->getMora();
				break;
			case 11:
				return $this->getProntopg();
				break;
			case 12:
				return $this->getAutliq();
				break;
			case 13:
				return $this->getFundec();
				break;
			case 14:
				return $this->getCodrec();
				break;
			case 15:
				return $this->getModo();
				break;
			case 16:
				return $this->getNumero();
				break;
			case 17:
				return $this->getConpag();
				break;
			case 18:
				return $this->getMonabo();
				break;
			case 19:
				return $this->getNumabo();
				break;
			case 20:
				return $this->getNomcon();
				break;
			case 21:
				return $this->getOtro();
				break;
			case 22:
				return $this->getMiginc();
				break;
			case 23:
				return $this->getAnodec();
				break;
			case 24:
				return $this->getFecultpag();
				break;
			case 25:
				return $this->getFecini();
				break;
			case 26:
				return $this->getFeccie();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeclarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdec(),
			$keys[1] => $this->getFecven(),
			$keys[2] => $this->getFueing(),
			$keys[3] => $this->getFecdec(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getTipo(),
			$keys[6] => $this->getNumref(),
			$keys[7] => $this->getNombre(),
			$keys[8] => $this->getMondec(),
			$keys[9] => $this->getEdodec(),
			$keys[10] => $this->getMora(),
			$keys[11] => $this->getProntopg(),
			$keys[12] => $this->getAutliq(),
			$keys[13] => $this->getFundec(),
			$keys[14] => $this->getCodrec(),
			$keys[15] => $this->getModo(),
			$keys[16] => $this->getNumero(),
			$keys[17] => $this->getConpag(),
			$keys[18] => $this->getMonabo(),
			$keys[19] => $this->getNumabo(),
			$keys[20] => $this->getNomcon(),
			$keys[21] => $this->getOtro(),
			$keys[22] => $this->getMiginc(),
			$keys[23] => $this->getAnodec(),
			$keys[24] => $this->getFecultpag(),
			$keys[25] => $this->getFecini(),
			$keys[26] => $this->getFeccie(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeclarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdec($value);
				break;
			case 1:
				$this->setFecven($value);
				break;
			case 2:
				$this->setFueing($value);
				break;
			case 3:
				$this->setFecdec($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setTipo($value);
				break;
			case 6:
				$this->setNumref($value);
				break;
			case 7:
				$this->setNombre($value);
				break;
			case 8:
				$this->setMondec($value);
				break;
			case 9:
				$this->setEdodec($value);
				break;
			case 10:
				$this->setMora($value);
				break;
			case 11:
				$this->setProntopg($value);
				break;
			case 12:
				$this->setAutliq($value);
				break;
			case 13:
				$this->setFundec($value);
				break;
			case 14:
				$this->setCodrec($value);
				break;
			case 15:
				$this->setModo($value);
				break;
			case 16:
				$this->setNumero($value);
				break;
			case 17:
				$this->setConpag($value);
				break;
			case 18:
				$this->setMonabo($value);
				break;
			case 19:
				$this->setNumabo($value);
				break;
			case 20:
				$this->setNomcon($value);
				break;
			case 21:
				$this->setOtro($value);
				break;
			case 22:
				$this->setMiginc($value);
				break;
			case 23:
				$this->setAnodec($value);
				break;
			case 24:
				$this->setFecultpag($value);
				break;
			case 25:
				$this->setFecini($value);
				break;
			case 26:
				$this->setFeccie($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeclarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecven($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFueing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumref($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNombre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMondec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEdodec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMora($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setProntopg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAutliq($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFundec($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodrec($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setModo($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumero($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setConpag($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMonabo($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNumabo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNomcon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setOtro($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setMiginc($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setAnodec($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecultpag($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecini($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFeccie($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdeclarPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdeclarPeer::NUMDEC)) $criteria->add(FcdeclarPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcdeclarPeer::FECVEN)) $criteria->add(FcdeclarPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcdeclarPeer::FUEING)) $criteria->add(FcdeclarPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcdeclarPeer::FECDEC)) $criteria->add(FcdeclarPeer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(FcdeclarPeer::RIFCON)) $criteria->add(FcdeclarPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcdeclarPeer::TIPO)) $criteria->add(FcdeclarPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcdeclarPeer::NUMREF)) $criteria->add(FcdeclarPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(FcdeclarPeer::NOMBRE)) $criteria->add(FcdeclarPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(FcdeclarPeer::MONDEC)) $criteria->add(FcdeclarPeer::MONDEC, $this->mondec);
		if ($this->isColumnModified(FcdeclarPeer::EDODEC)) $criteria->add(FcdeclarPeer::EDODEC, $this->edodec);
		if ($this->isColumnModified(FcdeclarPeer::MORA)) $criteria->add(FcdeclarPeer::MORA, $this->mora);
		if ($this->isColumnModified(FcdeclarPeer::PRONTOPG)) $criteria->add(FcdeclarPeer::PRONTOPG, $this->prontopg);
		if ($this->isColumnModified(FcdeclarPeer::AUTLIQ)) $criteria->add(FcdeclarPeer::AUTLIQ, $this->autliq);
		if ($this->isColumnModified(FcdeclarPeer::FUNDEC)) $criteria->add(FcdeclarPeer::FUNDEC, $this->fundec);
		if ($this->isColumnModified(FcdeclarPeer::CODREC)) $criteria->add(FcdeclarPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcdeclarPeer::MODO)) $criteria->add(FcdeclarPeer::MODO, $this->modo);
		if ($this->isColumnModified(FcdeclarPeer::NUMERO)) $criteria->add(FcdeclarPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcdeclarPeer::CONPAG)) $criteria->add(FcdeclarPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(FcdeclarPeer::MONABO)) $criteria->add(FcdeclarPeer::MONABO, $this->monabo);
		if ($this->isColumnModified(FcdeclarPeer::NUMABO)) $criteria->add(FcdeclarPeer::NUMABO, $this->numabo);
		if ($this->isColumnModified(FcdeclarPeer::NOMCON)) $criteria->add(FcdeclarPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcdeclarPeer::OTRO)) $criteria->add(FcdeclarPeer::OTRO, $this->otro);
		if ($this->isColumnModified(FcdeclarPeer::MIGINC)) $criteria->add(FcdeclarPeer::MIGINC, $this->miginc);
		if ($this->isColumnModified(FcdeclarPeer::ANODEC)) $criteria->add(FcdeclarPeer::ANODEC, $this->anodec);
		if ($this->isColumnModified(FcdeclarPeer::FECULTPAG)) $criteria->add(FcdeclarPeer::FECULTPAG, $this->fecultpag);
		if ($this->isColumnModified(FcdeclarPeer::FECINI)) $criteria->add(FcdeclarPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FcdeclarPeer::FECCIE)) $criteria->add(FcdeclarPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(FcdeclarPeer::ID)) $criteria->add(FcdeclarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdeclarPeer::DATABASE_NAME);

		$criteria->add(FcdeclarPeer::ID, $this->id);

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

		$copyObj->setNumdec($this->numdec);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFueing($this->fueing);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTipo($this->tipo);

		$copyObj->setNumref($this->numref);

		$copyObj->setNombre($this->nombre);

		$copyObj->setMondec($this->mondec);

		$copyObj->setEdodec($this->edodec);

		$copyObj->setMora($this->mora);

		$copyObj->setProntopg($this->prontopg);

		$copyObj->setAutliq($this->autliq);

		$copyObj->setFundec($this->fundec);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setModo($this->modo);

		$copyObj->setNumero($this->numero);

		$copyObj->setConpag($this->conpag);

		$copyObj->setMonabo($this->monabo);

		$copyObj->setNumabo($this->numabo);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setOtro($this->otro);

		$copyObj->setMiginc($this->miginc);

		$copyObj->setAnodec($this->anodec);

		$copyObj->setFecultpag($this->fecultpag);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);


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
			self::$peer = new FcdeclarPeer();
		}
		return self::$peer;
	}

} 