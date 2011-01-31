<?php


abstract class BaseInabonos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $numref;


	
	protected $fecpag;


	
	protected $rifcon;


	
	protected $monpag;


	
	protected $salpag;


	
	protected $monefe;


	
	protected $fecrec;


	
	protected $despag;


	
	protected $funpag;


	
	protected $stapag;


	
	protected $fueing;


	
	protected $motanu;


	
	protected $fecanu;


	
	protected $edopag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpag()
  {

    return trim($this->numpag);

  }
  
  public function getNumref()
  {

    return trim($this->numref);

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

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getSalpag($val=false)
  {

    if($val) return number_format($this->salpag,2,',','.');
    else return $this->salpag;

  }
  
  public function getMonefe($val=false)
  {

    if($val) return number_format($this->monefe,2,',','.');
    else return $this->monefe;

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

  
  public function getDespag()
  {

    return trim($this->despag);

  }
  
  public function getFunpag()
  {

    return trim($this->funpag);

  }
  
  public function getStapag()
  {

    return trim($this->stapag);

  }
  
  public function getFueing()
  {

    return trim($this->fueing);

  }
  
  public function getMotanu()
  {

    return trim($this->motanu);

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

  
  public function getEdopag()
  {

    return trim($this->edopag);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpag($v)
	{

    if ($this->numpag !== $v) {
        $this->numpag = $v;
        $this->modifiedColumns[] = InabonosPeer::NUMPAG;
      }
  
	} 
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = InabonosPeer::NUMREF;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = InabonosPeer::FECPAG;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = InabonosPeer::RIFCON;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InabonosPeer::MONPAG;
      }
  
	} 
	
	public function setSalpag($v)
	{

    if ($this->salpag !== $v) {
        $this->salpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InabonosPeer::SALPAG;
      }
  
	} 
	
	public function setMonefe($v)
	{

    if ($this->monefe !== $v) {
        $this->monefe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InabonosPeer::MONEFE;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = InabonosPeer::FECREC;
    }

	} 
	
	public function setDespag($v)
	{

    if ($this->despag !== $v) {
        $this->despag = $v;
        $this->modifiedColumns[] = InabonosPeer::DESPAG;
      }
  
	} 
	
	public function setFunpag($v)
	{

    if ($this->funpag !== $v) {
        $this->funpag = $v;
        $this->modifiedColumns[] = InabonosPeer::FUNPAG;
      }
  
	} 
	
	public function setStapag($v)
	{

    if ($this->stapag !== $v) {
        $this->stapag = $v;
        $this->modifiedColumns[] = InabonosPeer::STAPAG;
      }
  
	} 
	
	public function setFueing($v)
	{

    if ($this->fueing !== $v) {
        $this->fueing = $v;
        $this->modifiedColumns[] = InabonosPeer::FUEING;
      }
  
	} 
	
	public function setMotanu($v)
	{

    if ($this->motanu !== $v) {
        $this->motanu = $v;
        $this->modifiedColumns[] = InabonosPeer::MOTANU;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = InabonosPeer::FECANU;
    }

	} 
	
	public function setEdopag($v)
	{

    if ($this->edopag !== $v) {
        $this->edopag = $v;
        $this->modifiedColumns[] = InabonosPeer::EDOPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InabonosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpag = $rs->getString($startcol + 0);

      $this->numref = $rs->getString($startcol + 1);

      $this->fecpag = $rs->getDate($startcol + 2, null);

      $this->rifcon = $rs->getString($startcol + 3);

      $this->monpag = $rs->getFloat($startcol + 4);

      $this->salpag = $rs->getFloat($startcol + 5);

      $this->monefe = $rs->getFloat($startcol + 6);

      $this->fecrec = $rs->getDate($startcol + 7, null);

      $this->despag = $rs->getString($startcol + 8);

      $this->funpag = $rs->getString($startcol + 9);

      $this->stapag = $rs->getString($startcol + 10);

      $this->fueing = $rs->getString($startcol + 11);

      $this->motanu = $rs->getString($startcol + 12);

      $this->fecanu = $rs->getDate($startcol + 13, null);

      $this->edopag = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inabonos object", $e);
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
			$con = Propel::getConnection(InabonosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InabonosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InabonosPeer::DATABASE_NAME);
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
					$pk = InabonosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += InabonosPeer::doUpdate($this, $con);
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


			if (($retval = InabonosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InabonosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getNumref();
				break;
			case 2:
				return $this->getFecpag();
				break;
			case 3:
				return $this->getRifcon();
				break;
			case 4:
				return $this->getMonpag();
				break;
			case 5:
				return $this->getSalpag();
				break;
			case 6:
				return $this->getMonefe();
				break;
			case 7:
				return $this->getFecrec();
				break;
			case 8:
				return $this->getDespag();
				break;
			case 9:
				return $this->getFunpag();
				break;
			case 10:
				return $this->getStapag();
				break;
			case 11:
				return $this->getFueing();
				break;
			case 12:
				return $this->getMotanu();
				break;
			case 13:
				return $this->getFecanu();
				break;
			case 14:
				return $this->getEdopag();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InabonosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getNumref(),
			$keys[2] => $this->getFecpag(),
			$keys[3] => $this->getRifcon(),
			$keys[4] => $this->getMonpag(),
			$keys[5] => $this->getSalpag(),
			$keys[6] => $this->getMonefe(),
			$keys[7] => $this->getFecrec(),
			$keys[8] => $this->getDespag(),
			$keys[9] => $this->getFunpag(),
			$keys[10] => $this->getStapag(),
			$keys[11] => $this->getFueing(),
			$keys[12] => $this->getMotanu(),
			$keys[13] => $this->getFecanu(),
			$keys[14] => $this->getEdopag(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InabonosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setNumref($value);
				break;
			case 2:
				$this->setFecpag($value);
				break;
			case 3:
				$this->setRifcon($value);
				break;
			case 4:
				$this->setMonpag($value);
				break;
			case 5:
				$this->setSalpag($value);
				break;
			case 6:
				$this->setMonefe($value);
				break;
			case 7:
				$this->setFecrec($value);
				break;
			case 8:
				$this->setDespag($value);
				break;
			case 9:
				$this->setFunpag($value);
				break;
			case 10:
				$this->setStapag($value);
				break;
			case 11:
				$this->setFueing($value);
				break;
			case 12:
				$this->setMotanu($value);
				break;
			case 13:
				$this->setFecanu($value);
				break;
			case 14:
				$this->setEdopag($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InabonosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumref($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSalpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonefe($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDespag($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFunpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStapag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFueing($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMotanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setEdopag($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InabonosPeer::DATABASE_NAME);

		if ($this->isColumnModified(InabonosPeer::NUMPAG)) $criteria->add(InabonosPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(InabonosPeer::NUMREF)) $criteria->add(InabonosPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(InabonosPeer::FECPAG)) $criteria->add(InabonosPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(InabonosPeer::RIFCON)) $criteria->add(InabonosPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(InabonosPeer::MONPAG)) $criteria->add(InabonosPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(InabonosPeer::SALPAG)) $criteria->add(InabonosPeer::SALPAG, $this->salpag);
		if ($this->isColumnModified(InabonosPeer::MONEFE)) $criteria->add(InabonosPeer::MONEFE, $this->monefe);
		if ($this->isColumnModified(InabonosPeer::FECREC)) $criteria->add(InabonosPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(InabonosPeer::DESPAG)) $criteria->add(InabonosPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(InabonosPeer::FUNPAG)) $criteria->add(InabonosPeer::FUNPAG, $this->funpag);
		if ($this->isColumnModified(InabonosPeer::STAPAG)) $criteria->add(InabonosPeer::STAPAG, $this->stapag);
		if ($this->isColumnModified(InabonosPeer::FUEING)) $criteria->add(InabonosPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(InabonosPeer::MOTANU)) $criteria->add(InabonosPeer::MOTANU, $this->motanu);
		if ($this->isColumnModified(InabonosPeer::FECANU)) $criteria->add(InabonosPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(InabonosPeer::EDOPAG)) $criteria->add(InabonosPeer::EDOPAG, $this->edopag);
		if ($this->isColumnModified(InabonosPeer::ID)) $criteria->add(InabonosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InabonosPeer::DATABASE_NAME);

		$criteria->add(InabonosPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setNumref($this->numref);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setMonefe($this->monefe);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setDespag($this->despag);

		$copyObj->setFunpag($this->funpag);

		$copyObj->setStapag($this->stapag);

		$copyObj->setFueing($this->fueing);

		$copyObj->setMotanu($this->motanu);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setEdopag($this->edopag);


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
			self::$peer = new InabonosPeer();
		}
		return self::$peer;
	}

} 