<?php


abstract class BaseCareqartser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $fecreq;


	
	protected $desreq;


	
	protected $stareq;


	
	protected $codcatreq;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReqart()
  {

    return trim($this->reqart);

  }
  
  public function getFecreq($format = 'Y-m-d')
  {

    if ($this->fecreq === null || $this->fecreq === '') {
      return null;
    } elseif (!is_int($this->fecreq)) {
            $ts = adodb_strtotime($this->fecreq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreq] as date/time value: " . var_export($this->fecreq, true));
      }
    } else {
      $ts = $this->fecreq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesreq()
  {

    return trim($this->desreq);

  }
  
  public function getStareq()
  {

    return trim($this->stareq);

  }
  
  public function getCodcatreq()
  {

    return trim($this->codcatreq);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = $v;
        $this->modifiedColumns[] = CareqartserPeer::REQART;
      }
  
	} 
	
	public function setFecreq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreq !== $ts) {
      $this->fecreq = $ts;
      $this->modifiedColumns[] = CareqartserPeer::FECREQ;
    }

	} 
	
	public function setDesreq($v)
	{

    if ($this->desreq !== $v) {
        $this->desreq = $v;
        $this->modifiedColumns[] = CareqartserPeer::DESREQ;
      }
  
	} 
	
	public function setStareq($v)
	{

    if ($this->stareq !== $v) {
        $this->stareq = $v;
        $this->modifiedColumns[] = CareqartserPeer::STAREQ;
      }
  
	} 
	
	public function setCodcatreq($v)
	{

    if ($this->codcatreq !== $v) {
        $this->codcatreq = $v;
        $this->modifiedColumns[] = CareqartserPeer::CODCATREQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CareqartserPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reqart = $rs->getString($startcol + 0);

      $this->fecreq = $rs->getDate($startcol + 1, null);

      $this->desreq = $rs->getString($startcol + 2);

      $this->stareq = $rs->getString($startcol + 3);

      $this->codcatreq = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Careqartser object", $e);
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
			$con = Propel::getConnection(CareqartserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CareqartserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CareqartserPeer::DATABASE_NAME);
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
					$pk = CareqartserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CareqartserPeer::doUpdate($this, $con);
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


			if (($retval = CareqartserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CareqartserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getFecreq();
				break;
			case 2:
				return $this->getDesreq();
				break;
			case 3:
				return $this->getStareq();
				break;
			case 4:
				return $this->getCodcatreq();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CareqartserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getFecreq(),
			$keys[2] => $this->getDesreq(),
			$keys[3] => $this->getStareq(),
			$keys[4] => $this->getCodcatreq(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CareqartserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setFecreq($value);
				break;
			case 2:
				$this->setDesreq($value);
				break;
			case 3:
				$this->setStareq($value);
				break;
			case 4:
				$this->setCodcatreq($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CareqartserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesreq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStareq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcatreq($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CareqartserPeer::DATABASE_NAME);

		if ($this->isColumnModified(CareqartserPeer::REQART)) $criteria->add(CareqartserPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CareqartserPeer::FECREQ)) $criteria->add(CareqartserPeer::FECREQ, $this->fecreq);
		if ($this->isColumnModified(CareqartserPeer::DESREQ)) $criteria->add(CareqartserPeer::DESREQ, $this->desreq);
		if ($this->isColumnModified(CareqartserPeer::STAREQ)) $criteria->add(CareqartserPeer::STAREQ, $this->stareq);
		if ($this->isColumnModified(CareqartserPeer::CODCATREQ)) $criteria->add(CareqartserPeer::CODCATREQ, $this->codcatreq);
		if ($this->isColumnModified(CareqartserPeer::ID)) $criteria->add(CareqartserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CareqartserPeer::DATABASE_NAME);

		$criteria->add(CareqartserPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setFecreq($this->fecreq);

		$copyObj->setDesreq($this->desreq);

		$copyObj->setStareq($this->stareq);

		$copyObj->setCodcatreq($this->codcatreq);


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
			self::$peer = new CareqartserPeer();
		}
		return self::$peer;
	}

} 