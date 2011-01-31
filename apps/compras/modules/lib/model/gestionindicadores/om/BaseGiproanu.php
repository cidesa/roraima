<?php


abstract class BaseGiproanu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numindg;


	
	protected $anoindg;


	
	protected $revanoindg;


	
	protected $numtrim;


	
	protected $progtrim;


	
	protected $ejectrim;


	
	protected $esttrim;


	
	protected $estprog;


	
	protected $feccierre;


	
	protected $feccietri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumindg()
  {

    return trim($this->numindg);

  }
  
  public function getAnoindg()
  {

    return $this->anoindg;

  }
  
  public function getRevanoindg()
  {

    return trim($this->revanoindg);

  }
  
  public function getNumtrim()
  {

    return trim($this->numtrim);

  }
  
  public function getProgtrim($val=false)
  {

    if($val) return number_format($this->progtrim,2,',','.');
    else return $this->progtrim;

  }
  
  public function getEjectrim($val=false)
  {

    if($val) return number_format($this->ejectrim,2,',','.');
    else return $this->ejectrim;

  }
  
  public function getEsttrim()
  {

    return trim($this->esttrim);

  }
  
  public function getEstprog()
  {

    return trim($this->estprog);

  }
  
  public function getFeccierre($format = 'Y-m-d')
  {

    if ($this->feccierre === null || $this->feccierre === '') {
      return null;
    } elseif (!is_int($this->feccierre)) {
            $ts = adodb_strtotime($this->feccierre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccierre] as date/time value: " . var_export($this->feccierre, true));
      }
    } else {
      $ts = $this->feccierre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccietri($format = 'Y-m-d')
  {

    if ($this->feccietri === null || $this->feccietri === '') {
      return null;
    } elseif (!is_int($this->feccietri)) {
            $ts = adodb_strtotime($this->feccietri);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccietri] as date/time value: " . var_export($this->feccietri, true));
      }
    } else {
      $ts = $this->feccietri;
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
	
	public function setNumindg($v)
	{

    if ($this->numindg !== $v) {
        $this->numindg = $v;
        $this->modifiedColumns[] = GiproanuPeer::NUMINDG;
      }
  
	} 
	
	public function setAnoindg($v)
	{

    if ($this->anoindg !== $v) {
        $this->anoindg = $v;
        $this->modifiedColumns[] = GiproanuPeer::ANOINDG;
      }
  
	} 
	
	public function setRevanoindg($v)
	{

    if ($this->revanoindg !== $v) {
        $this->revanoindg = $v;
        $this->modifiedColumns[] = GiproanuPeer::REVANOINDG;
      }
  
	} 
	
	public function setNumtrim($v)
	{

    if ($this->numtrim !== $v) {
        $this->numtrim = $v;
        $this->modifiedColumns[] = GiproanuPeer::NUMTRIM;
      }
  
	} 
	
	public function setProgtrim($v)
	{

    if ($this->progtrim !== $v) {
        $this->progtrim = Herramientas::toFloat($v);
        $this->modifiedColumns[] = GiproanuPeer::PROGTRIM;
      }
  
	} 
	
	public function setEjectrim($v)
	{

    if ($this->ejectrim !== $v) {
        $this->ejectrim = Herramientas::toFloat($v);
        $this->modifiedColumns[] = GiproanuPeer::EJECTRIM;
      }
  
	} 
	
	public function setEsttrim($v)
	{

    if ($this->esttrim !== $v) {
        $this->esttrim = $v;
        $this->modifiedColumns[] = GiproanuPeer::ESTTRIM;
      }
  
	} 
	
	public function setEstprog($v)
	{

    if ($this->estprog !== $v) {
        $this->estprog = $v;
        $this->modifiedColumns[] = GiproanuPeer::ESTPROG;
      }
  
	} 
	
	public function setFeccierre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccierre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccierre !== $ts) {
      $this->feccierre = $ts;
      $this->modifiedColumns[] = GiproanuPeer::FECCIERRE;
    }

	} 
	
	public function setFeccietri($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccietri] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccietri !== $ts) {
      $this->feccietri = $ts;
      $this->modifiedColumns[] = GiproanuPeer::FECCIETRI;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = GiproanuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numindg = $rs->getString($startcol + 0);

      $this->anoindg = $rs->getInt($startcol + 1);

      $this->revanoindg = $rs->getString($startcol + 2);

      $this->numtrim = $rs->getString($startcol + 3);

      $this->progtrim = $rs->getFloat($startcol + 4);

      $this->ejectrim = $rs->getFloat($startcol + 5);

      $this->esttrim = $rs->getString($startcol + 6);

      $this->estprog = $rs->getString($startcol + 7);

      $this->feccierre = $rs->getDate($startcol + 8, null);

      $this->feccietri = $rs->getDate($startcol + 9, null);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Giproanu object", $e);
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
			$con = Propel::getConnection(GiproanuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GiproanuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GiproanuPeer::DATABASE_NAME);
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
					$pk = GiproanuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GiproanuPeer::doUpdate($this, $con);
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


			if (($retval = GiproanuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GiproanuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumindg();
				break;
			case 1:
				return $this->getAnoindg();
				break;
			case 2:
				return $this->getRevanoindg();
				break;
			case 3:
				return $this->getNumtrim();
				break;
			case 4:
				return $this->getProgtrim();
				break;
			case 5:
				return $this->getEjectrim();
				break;
			case 6:
				return $this->getEsttrim();
				break;
			case 7:
				return $this->getEstprog();
				break;
			case 8:
				return $this->getFeccierre();
				break;
			case 9:
				return $this->getFeccietri();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GiproanuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumindg(),
			$keys[1] => $this->getAnoindg(),
			$keys[2] => $this->getRevanoindg(),
			$keys[3] => $this->getNumtrim(),
			$keys[4] => $this->getProgtrim(),
			$keys[5] => $this->getEjectrim(),
			$keys[6] => $this->getEsttrim(),
			$keys[7] => $this->getEstprog(),
			$keys[8] => $this->getFeccierre(),
			$keys[9] => $this->getFeccietri(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GiproanuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumindg($value);
				break;
			case 1:
				$this->setAnoindg($value);
				break;
			case 2:
				$this->setRevanoindg($value);
				break;
			case 3:
				$this->setNumtrim($value);
				break;
			case 4:
				$this->setProgtrim($value);
				break;
			case 5:
				$this->setEjectrim($value);
				break;
			case 6:
				$this->setEsttrim($value);
				break;
			case 7:
				$this->setEstprog($value);
				break;
			case 8:
				$this->setFeccierre($value);
				break;
			case 9:
				$this->setFeccietri($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GiproanuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumindg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnoindg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRevanoindg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumtrim($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProgtrim($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEjectrim($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEsttrim($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEstprog($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFeccierre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFeccietri($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GiproanuPeer::DATABASE_NAME);

		if ($this->isColumnModified(GiproanuPeer::NUMINDG)) $criteria->add(GiproanuPeer::NUMINDG, $this->numindg);
		if ($this->isColumnModified(GiproanuPeer::ANOINDG)) $criteria->add(GiproanuPeer::ANOINDG, $this->anoindg);
		if ($this->isColumnModified(GiproanuPeer::REVANOINDG)) $criteria->add(GiproanuPeer::REVANOINDG, $this->revanoindg);
		if ($this->isColumnModified(GiproanuPeer::NUMTRIM)) $criteria->add(GiproanuPeer::NUMTRIM, $this->numtrim);
		if ($this->isColumnModified(GiproanuPeer::PROGTRIM)) $criteria->add(GiproanuPeer::PROGTRIM, $this->progtrim);
		if ($this->isColumnModified(GiproanuPeer::EJECTRIM)) $criteria->add(GiproanuPeer::EJECTRIM, $this->ejectrim);
		if ($this->isColumnModified(GiproanuPeer::ESTTRIM)) $criteria->add(GiproanuPeer::ESTTRIM, $this->esttrim);
		if ($this->isColumnModified(GiproanuPeer::ESTPROG)) $criteria->add(GiproanuPeer::ESTPROG, $this->estprog);
		if ($this->isColumnModified(GiproanuPeer::FECCIERRE)) $criteria->add(GiproanuPeer::FECCIERRE, $this->feccierre);
		if ($this->isColumnModified(GiproanuPeer::FECCIETRI)) $criteria->add(GiproanuPeer::FECCIETRI, $this->feccietri);
		if ($this->isColumnModified(GiproanuPeer::ID)) $criteria->add(GiproanuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GiproanuPeer::DATABASE_NAME);

		$criteria->add(GiproanuPeer::ID, $this->id);

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

		$copyObj->setNumindg($this->numindg);

		$copyObj->setAnoindg($this->anoindg);

		$copyObj->setRevanoindg($this->revanoindg);

		$copyObj->setNumtrim($this->numtrim);

		$copyObj->setProgtrim($this->progtrim);

		$copyObj->setEjectrim($this->ejectrim);

		$copyObj->setEsttrim($this->esttrim);

		$copyObj->setEstprog($this->estprog);

		$copyObj->setFeccierre($this->feccierre);

		$copyObj->setFeccietri($this->feccietri);


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
			self::$peer = new GiproanuPeer();
		}
		return self::$peer;
	}

} 