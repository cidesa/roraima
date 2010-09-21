<?php


abstract class BaseFcconpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcon;


	
	protected $feccon;


	
	protected $moncon;


	
	protected $estcon;


	
	protected $rifcon;


	
	protected $obscon;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $numcuo;


	
	protected $moncuo;


	
	protected $totcuo;


	
	protected $porini;


	
	protected $monini;


	
	protected $porfin;


	
	protected $monfin;


	
	protected $datced;


	
	protected $datnac;


	
	protected $datnom;


	
	protected $datdir;


	
	protected $dattel;


	
	protected $datcar;


	
	protected $datreg;


	
	protected $datcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcon()
  {

    return trim($this->refcon);

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

  
  public function getMoncon($val=false)
  {

    if($val) return number_format($this->moncon,2,',','.');
    else return $this->moncon;

  }
  
  public function getEstcon()
  {

    return trim($this->estcon);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getObscon()
  {

    return trim($this->obscon);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumcuo($val=false)
  {

    if($val) return number_format($this->numcuo,2,',','.');
    else return $this->numcuo;

  }
  
  public function getMoncuo($val=false)
  {

    if($val) return number_format($this->moncuo,2,',','.');
    else return $this->moncuo;

  }
  
  public function getTotcuo($val=false)
  {

    if($val) return number_format($this->totcuo,2,',','.');
    else return $this->totcuo;

  }
  
  public function getPorini($val=false)
  {

    if($val) return number_format($this->porini,2,',','.');
    else return $this->porini;

  }
  
  public function getMonini($val=false)
  {

    if($val) return number_format($this->monini,2,',','.');
    else return $this->monini;

  }
  
  public function getPorfin($val=false)
  {

    if($val) return number_format($this->porfin,2,',','.');
    else return $this->porfin;

  }
  
  public function getMonfin($val=false)
  {

    if($val) return number_format($this->monfin,2,',','.');
    else return $this->monfin;

  }
  
  public function getDatced()
  {

    return trim($this->datced);

  }
  
  public function getDatnac()
  {

    return trim($this->datnac);

  }
  
  public function getDatnom()
  {

    return trim($this->datnom);

  }
  
  public function getDatdir()
  {

    return trim($this->datdir);

  }
  
  public function getDattel()
  {

    return trim($this->dattel);

  }
  
  public function getDatcar()
  {

    return trim($this->datcar);

  }
  
  public function getDatreg()
  {

    return trim($this->datreg);

  }
  
  public function getDatcon()
  {

    return trim($this->datcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcon($v)
	{

    if ($this->refcon !== $v) {
        $this->refcon = $v;
        $this->modifiedColumns[] = FcconpagPeer::REFCON;
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
      $this->modifiedColumns[] = FcconpagPeer::FECCON;
    }

	} 
	
	public function setMoncon($v)
	{

    if ($this->moncon !== $v) {
        $this->moncon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::MONCON;
      }
  
	} 
	
	public function setEstcon($v)
	{

    if ($this->estcon !== $v) {
        $this->estcon = $v;
        $this->modifiedColumns[] = FcconpagPeer::ESTCON;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcconpagPeer::RIFCON;
      }
  
	} 
	
	public function setObscon($v)
	{

    if ($this->obscon !== $v) {
        $this->obscon = $v;
        $this->modifiedColumns[] = FcconpagPeer::OBSCON;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcconpagPeer::FUNREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = FcconpagPeer::FECREC;
    }

	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::NUMCUO;
      }
  
	} 
	
	public function setMoncuo($v)
	{

    if ($this->moncuo !== $v) {
        $this->moncuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::MONCUO;
      }
  
	} 
	
	public function setTotcuo($v)
	{

    if ($this->totcuo !== $v) {
        $this->totcuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::TOTCUO;
      }
  
	} 
	
	public function setPorini($v)
	{

    if ($this->porini !== $v) {
        $this->porini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::PORINI;
      }
  
	} 
	
	public function setMonini($v)
	{

    if ($this->monini !== $v) {
        $this->monini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::MONINI;
      }
  
	} 
	
	public function setPorfin($v)
	{

    if ($this->porfin !== $v) {
        $this->porfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::PORFIN;
      }
  
	} 
	
	public function setMonfin($v)
	{

    if ($this->monfin !== $v) {
        $this->monfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcconpagPeer::MONFIN;
      }
  
	} 
	
	public function setDatced($v)
	{

    if ($this->datced !== $v) {
        $this->datced = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATCED;
      }
  
	} 
	
	public function setDatnac($v)
	{

    if ($this->datnac !== $v) {
        $this->datnac = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATNAC;
      }
  
	} 
	
	public function setDatnom($v)
	{

    if ($this->datnom !== $v) {
        $this->datnom = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATNOM;
      }
  
	} 
	
	public function setDatdir($v)
	{

    if ($this->datdir !== $v) {
        $this->datdir = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATDIR;
      }
  
	} 
	
	public function setDattel($v)
	{

    if ($this->dattel !== $v) {
        $this->dattel = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATTEL;
      }
  
	} 
	
	public function setDatcar($v)
	{

    if ($this->datcar !== $v) {
        $this->datcar = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATCAR;
      }
  
	} 
	
	public function setDatreg($v)
	{

    if ($this->datreg !== $v) {
        $this->datreg = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATREG;
      }
  
	} 
	
	public function setDatcon($v)
	{

    if ($this->datcon !== $v) {
        $this->datcon = $v;
        $this->modifiedColumns[] = FcconpagPeer::DATCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcconpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcon = $rs->getString($startcol + 0);

      $this->feccon = $rs->getDate($startcol + 1, null);

      $this->moncon = $rs->getFloat($startcol + 2);

      $this->estcon = $rs->getString($startcol + 3);

      $this->rifcon = $rs->getString($startcol + 4);

      $this->obscon = $rs->getString($startcol + 5);

      $this->funrec = $rs->getString($startcol + 6);

      $this->fecrec = $rs->getDate($startcol + 7, null);

      $this->numcuo = $rs->getFloat($startcol + 8);

      $this->moncuo = $rs->getFloat($startcol + 9);

      $this->totcuo = $rs->getFloat($startcol + 10);

      $this->porini = $rs->getFloat($startcol + 11);

      $this->monini = $rs->getFloat($startcol + 12);

      $this->porfin = $rs->getFloat($startcol + 13);

      $this->monfin = $rs->getFloat($startcol + 14);

      $this->datced = $rs->getString($startcol + 15);

      $this->datnac = $rs->getString($startcol + 16);

      $this->datnom = $rs->getString($startcol + 17);

      $this->datdir = $rs->getString($startcol + 18);

      $this->dattel = $rs->getString($startcol + 19);

      $this->datcar = $rs->getString($startcol + 20);

      $this->datreg = $rs->getString($startcol + 21);

      $this->datcon = $rs->getString($startcol + 22);

      $this->id = $rs->getInt($startcol + 23);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 24; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcconpag object", $e);
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
			$con = Propel::getConnection(FcconpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcconpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcconpagPeer::DATABASE_NAME);
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
					$pk = FcconpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcconpagPeer::doUpdate($this, $con);
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


			if (($retval = FcconpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcon();
				break;
			case 1:
				return $this->getFeccon();
				break;
			case 2:
				return $this->getMoncon();
				break;
			case 3:
				return $this->getEstcon();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getObscon();
				break;
			case 6:
				return $this->getFunrec();
				break;
			case 7:
				return $this->getFecrec();
				break;
			case 8:
				return $this->getNumcuo();
				break;
			case 9:
				return $this->getMoncuo();
				break;
			case 10:
				return $this->getTotcuo();
				break;
			case 11:
				return $this->getPorini();
				break;
			case 12:
				return $this->getMonini();
				break;
			case 13:
				return $this->getPorfin();
				break;
			case 14:
				return $this->getMonfin();
				break;
			case 15:
				return $this->getDatced();
				break;
			case 16:
				return $this->getDatnac();
				break;
			case 17:
				return $this->getDatnom();
				break;
			case 18:
				return $this->getDatdir();
				break;
			case 19:
				return $this->getDattel();
				break;
			case 20:
				return $this->getDatcar();
				break;
			case 21:
				return $this->getDatreg();
				break;
			case 22:
				return $this->getDatcon();
				break;
			case 23:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcon(),
			$keys[1] => $this->getFeccon(),
			$keys[2] => $this->getMoncon(),
			$keys[3] => $this->getEstcon(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getObscon(),
			$keys[6] => $this->getFunrec(),
			$keys[7] => $this->getFecrec(),
			$keys[8] => $this->getNumcuo(),
			$keys[9] => $this->getMoncuo(),
			$keys[10] => $this->getTotcuo(),
			$keys[11] => $this->getPorini(),
			$keys[12] => $this->getMonini(),
			$keys[13] => $this->getPorfin(),
			$keys[14] => $this->getMonfin(),
			$keys[15] => $this->getDatced(),
			$keys[16] => $this->getDatnac(),
			$keys[17] => $this->getDatnom(),
			$keys[18] => $this->getDatdir(),
			$keys[19] => $this->getDattel(),
			$keys[20] => $this->getDatcar(),
			$keys[21] => $this->getDatreg(),
			$keys[22] => $this->getDatcon(),
			$keys[23] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcon($value);
				break;
			case 1:
				$this->setFeccon($value);
				break;
			case 2:
				$this->setMoncon($value);
				break;
			case 3:
				$this->setEstcon($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setObscon($value);
				break;
			case 6:
				$this->setFunrec($value);
				break;
			case 7:
				$this->setFecrec($value);
				break;
			case 8:
				$this->setNumcuo($value);
				break;
			case 9:
				$this->setMoncuo($value);
				break;
			case 10:
				$this->setTotcuo($value);
				break;
			case 11:
				$this->setPorini($value);
				break;
			case 12:
				$this->setMonini($value);
				break;
			case 13:
				$this->setPorfin($value);
				break;
			case 14:
				$this->setMonfin($value);
				break;
			case 15:
				$this->setDatced($value);
				break;
			case 16:
				$this->setDatnac($value);
				break;
			case 17:
				$this->setDatnom($value);
				break;
			case 18:
				$this->setDatdir($value);
				break;
			case 19:
				$this->setDattel($value);
				break;
			case 20:
				$this->setDatcar($value);
				break;
			case 21:
				$this->setDatreg($value);
				break;
			case 22:
				$this->setDatcon($value);
				break;
			case 23:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoncon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObscon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFunrec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcuo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMoncuo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTotcuo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPorini($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonini($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPorfin($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMonfin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDatced($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDatnac($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDatnom($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDatdir($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDattel($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDatcar($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDatreg($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDatcon($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setId($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcconpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcconpagPeer::REFCON)) $criteria->add(FcconpagPeer::REFCON, $this->refcon);
		if ($this->isColumnModified(FcconpagPeer::FECCON)) $criteria->add(FcconpagPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(FcconpagPeer::MONCON)) $criteria->add(FcconpagPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(FcconpagPeer::ESTCON)) $criteria->add(FcconpagPeer::ESTCON, $this->estcon);
		if ($this->isColumnModified(FcconpagPeer::RIFCON)) $criteria->add(FcconpagPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcconpagPeer::OBSCON)) $criteria->add(FcconpagPeer::OBSCON, $this->obscon);
		if ($this->isColumnModified(FcconpagPeer::FUNREC)) $criteria->add(FcconpagPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcconpagPeer::FECREC)) $criteria->add(FcconpagPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcconpagPeer::NUMCUO)) $criteria->add(FcconpagPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(FcconpagPeer::MONCUO)) $criteria->add(FcconpagPeer::MONCUO, $this->moncuo);
		if ($this->isColumnModified(FcconpagPeer::TOTCUO)) $criteria->add(FcconpagPeer::TOTCUO, $this->totcuo);
		if ($this->isColumnModified(FcconpagPeer::PORINI)) $criteria->add(FcconpagPeer::PORINI, $this->porini);
		if ($this->isColumnModified(FcconpagPeer::MONINI)) $criteria->add(FcconpagPeer::MONINI, $this->monini);
		if ($this->isColumnModified(FcconpagPeer::PORFIN)) $criteria->add(FcconpagPeer::PORFIN, $this->porfin);
		if ($this->isColumnModified(FcconpagPeer::MONFIN)) $criteria->add(FcconpagPeer::MONFIN, $this->monfin);
		if ($this->isColumnModified(FcconpagPeer::DATCED)) $criteria->add(FcconpagPeer::DATCED, $this->datced);
		if ($this->isColumnModified(FcconpagPeer::DATNAC)) $criteria->add(FcconpagPeer::DATNAC, $this->datnac);
		if ($this->isColumnModified(FcconpagPeer::DATNOM)) $criteria->add(FcconpagPeer::DATNOM, $this->datnom);
		if ($this->isColumnModified(FcconpagPeer::DATDIR)) $criteria->add(FcconpagPeer::DATDIR, $this->datdir);
		if ($this->isColumnModified(FcconpagPeer::DATTEL)) $criteria->add(FcconpagPeer::DATTEL, $this->dattel);
		if ($this->isColumnModified(FcconpagPeer::DATCAR)) $criteria->add(FcconpagPeer::DATCAR, $this->datcar);
		if ($this->isColumnModified(FcconpagPeer::DATREG)) $criteria->add(FcconpagPeer::DATREG, $this->datreg);
		if ($this->isColumnModified(FcconpagPeer::DATCON)) $criteria->add(FcconpagPeer::DATCON, $this->datcon);
		if ($this->isColumnModified(FcconpagPeer::ID)) $criteria->add(FcconpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcconpagPeer::DATABASE_NAME);

		$criteria->add(FcconpagPeer::ID, $this->id);

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

		$copyObj->setRefcon($this->refcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setEstcon($this->estcon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setObscon($this->obscon);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setMoncuo($this->moncuo);

		$copyObj->setTotcuo($this->totcuo);

		$copyObj->setPorini($this->porini);

		$copyObj->setMonini($this->monini);

		$copyObj->setPorfin($this->porfin);

		$copyObj->setMonfin($this->monfin);

		$copyObj->setDatced($this->datced);

		$copyObj->setDatnac($this->datnac);

		$copyObj->setDatnom($this->datnom);

		$copyObj->setDatdir($this->datdir);

		$copyObj->setDattel($this->dattel);

		$copyObj->setDatcar($this->datcar);

		$copyObj->setDatreg($this->datreg);

		$copyObj->setDatcon($this->datcon);


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
			self::$peer = new FcconpagPeer();
		}
		return self::$peer;
	}

} 