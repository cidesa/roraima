<?php


abstract class BaseCcrecpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $obsrec;


	
	protected $fecvig;


	
	protected $fecven;


	
	protected $ccrecaud_id;


	
	protected $ccprogra_id;

	
	protected $aCcrecaud;

	
	protected $aCcprogra;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getObsrec()
  {

    return trim($this->obsrec);

  }
  
  public function getFecvig($format = 'Y-m-d')
  {

    if ($this->fecvig === null || $this->fecvig === '') {
      return null;
    } elseif (!is_int($this->fecvig)) {
            $ts = adodb_strtotime($this->fecvig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvig] as date/time value: " . var_export($this->fecvig, true));
      }
    } else {
      $ts = $this->fecvig;
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

  
  public function getCcrecaudId()
  {

    return $this->ccrecaud_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrecproPeer::ID;
      }
  
	} 
	
	public function setObsrec($v)
	{

    if ($this->obsrec !== $v) {
        $this->obsrec = $v;
        $this->modifiedColumns[] = CcrecproPeer::OBSREC;
      }
  
	} 
	
	public function setFecvig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvig !== $ts) {
      $this->fecvig = $ts;
      $this->modifiedColumns[] = CcrecproPeer::FECVIG;
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
      $this->modifiedColumns[] = CcrecproPeer::FECVEN;
    }

	} 
	
	public function setCcrecaudId($v)
	{

    if ($this->ccrecaud_id !== $v) {
        $this->ccrecaud_id = $v;
        $this->modifiedColumns[] = CcrecproPeer::CCRECAUD_ID;
      }
  
		if ($this->aCcrecaud !== null && $this->aCcrecaud->getId() !== $v) {
			$this->aCcrecaud = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcrecproPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->obsrec = $rs->getString($startcol + 1);

      $this->fecvig = $rs->getDate($startcol + 2, null);

      $this->fecven = $rs->getDate($startcol + 3, null);

      $this->ccrecaud_id = $rs->getInt($startcol + 4);

      $this->ccprogra_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrecpro object", $e);
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
			$con = Propel::getConnection(CcrecproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrecproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrecproPeer::DATABASE_NAME);
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


												
			if ($this->aCcrecaud !== null) {
				if ($this->aCcrecaud->isModified()) {
					$affectedRows += $this->aCcrecaud->save($con);
				}
				$this->setCcrecaud($this->aCcrecaud);
			}

			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrecproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrecproPeer::doUpdate($this, $con);
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


												
			if ($this->aCcrecaud !== null) {
				if (!$this->aCcrecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcrecaud->getValidationFailures());
				}
			}

			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}


			if (($retval = CcrecproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObsrec();
				break;
			case 2:
				return $this->getFecvig();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getCcrecaudId();
				break;
			case 5:
				return $this->getCcprograId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObsrec(),
			$keys[2] => $this->getFecvig(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getCcrecaudId(),
			$keys[5] => $this->getCcprograId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObsrec($value);
				break;
			case 2:
				$this->setFecvig($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setCcrecaudId($value);
				break;
			case 5:
				$this->setCcprograId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObsrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecvig($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcrecaudId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcprograId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrecproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrecproPeer::ID)) $criteria->add(CcrecproPeer::ID, $this->id);
		if ($this->isColumnModified(CcrecproPeer::OBSREC)) $criteria->add(CcrecproPeer::OBSREC, $this->obsrec);
		if ($this->isColumnModified(CcrecproPeer::FECVIG)) $criteria->add(CcrecproPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(CcrecproPeer::FECVEN)) $criteria->add(CcrecproPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcrecproPeer::CCRECAUD_ID)) $criteria->add(CcrecproPeer::CCRECAUD_ID, $this->ccrecaud_id);
		if ($this->isColumnModified(CcrecproPeer::CCPROGRA_ID)) $criteria->add(CcrecproPeer::CCPROGRA_ID, $this->ccprogra_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrecproPeer::DATABASE_NAME);

		$criteria->add(CcrecproPeer::ID, $this->id);

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

		$copyObj->setObsrec($this->obsrec);

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCcrecaudId($this->ccrecaud_id);

		$copyObj->setCcprograId($this->ccprogra_id);


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
			self::$peer = new CcrecproPeer();
		}
		return self::$peer;
	}

	
	public function setCcrecaud($v)
	{


		if ($v === null) {
			$this->setCcrecaudId(NULL);
		} else {
			$this->setCcrecaudId($v->getId());
		}


		$this->aCcrecaud = $v;
	}


	
	public function getCcrecaud($con = null)
	{
		if ($this->aCcrecaud === null && ($this->ccrecaud_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcrecaudPeer.php';

      $c = new Criteria();
      $c->add(CcrecaudPeer::ID,$this->ccrecaud_id);
      
			$this->aCcrecaud = CcrecaudPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcrecaud;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
	}

} 