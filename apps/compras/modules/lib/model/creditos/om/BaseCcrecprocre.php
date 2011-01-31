<?php


abstract class BaseCcrecprocre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecrec;


	
	protected $codusurec;


	
	protected $fecreccen;


	
	protected $codusucen;


	
	protected $estatu;


	
	protected $ccrecaud_id;


	
	protected $ccprogra_id;


	
	protected $cccredit_id;

	
	protected $aCcrecaud;

	
	protected $aCcprogra;

	
	protected $aCccredit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

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

  
  public function getCodusurec()
  {

    return $this->codusurec;

  }
  
  public function getFecreccen($format = 'Y-m-d')
  {

    if ($this->fecreccen === null || $this->fecreccen === '') {
      return null;
    } elseif (!is_int($this->fecreccen)) {
            $ts = adodb_strtotime($this->fecreccen);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreccen] as date/time value: " . var_export($this->fecreccen, true));
      }
    } else {
      $ts = $this->fecreccen;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodusucen()
  {

    return $this->codusucen;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcrecaudId()
  {

    return $this->ccrecaud_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::ID;
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
      $this->modifiedColumns[] = CcrecprocrePeer::FECREC;
    }

	} 
	
	public function setCodusurec($v)
	{

    if ($this->codusurec !== $v) {
        $this->codusurec = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::CODUSUREC;
      }
  
	} 
	
	public function setFecreccen($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreccen] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreccen !== $ts) {
      $this->fecreccen = $ts;
      $this->modifiedColumns[] = CcrecprocrePeer::FECRECCEN;
    }

	} 
	
	public function setCodusucen($v)
	{

    if ($this->codusucen !== $v) {
        $this->codusucen = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::CODUSUCEN;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::ESTATU;
      }
  
	} 
	
	public function setCcrecaudId($v)
	{

    if ($this->ccrecaud_id !== $v) {
        $this->ccrecaud_id = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::CCRECAUD_ID;
      }
  
		if ($this->aCcrecaud !== null && $this->aCcrecaud->getId() !== $v) {
			$this->aCcrecaud = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcrecprocrePeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecrec = $rs->getDate($startcol + 1, null);

      $this->codusurec = $rs->getInt($startcol + 2);

      $this->fecreccen = $rs->getDate($startcol + 3, null);

      $this->codusucen = $rs->getInt($startcol + 4);

      $this->estatu = $rs->getString($startcol + 5);

      $this->ccrecaud_id = $rs->getInt($startcol + 6);

      $this->ccprogra_id = $rs->getInt($startcol + 7);

      $this->cccredit_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrecprocre object", $e);
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
			$con = Propel::getConnection(CcrecprocrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrecprocrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrecprocrePeer::DATABASE_NAME);
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

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrecprocrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrecprocrePeer::doUpdate($this, $con);
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

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}


			if (($retval = CcrecprocrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecprocrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecrec();
				break;
			case 2:
				return $this->getCodusurec();
				break;
			case 3:
				return $this->getFecreccen();
				break;
			case 4:
				return $this->getCodusucen();
				break;
			case 5:
				return $this->getEstatu();
				break;
			case 6:
				return $this->getCcrecaudId();
				break;
			case 7:
				return $this->getCcprograId();
				break;
			case 8:
				return $this->getCccreditId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecprocrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecrec(),
			$keys[2] => $this->getCodusurec(),
			$keys[3] => $this->getFecreccen(),
			$keys[4] => $this->getCodusucen(),
			$keys[5] => $this->getEstatu(),
			$keys[6] => $this->getCcrecaudId(),
			$keys[7] => $this->getCcprograId(),
			$keys[8] => $this->getCccreditId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecprocrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecrec($value);
				break;
			case 2:
				$this->setCodusurec($value);
				break;
			case 3:
				$this->setFecreccen($value);
				break;
			case 4:
				$this->setCodusucen($value);
				break;
			case 5:
				$this->setEstatu($value);
				break;
			case 6:
				$this->setCcrecaudId($value);
				break;
			case 7:
				$this->setCcprograId($value);
				break;
			case 8:
				$this->setCccreditId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecprocrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodusurec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreccen($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodusucen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstatu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcrecaudId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcprograId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCccreditId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrecprocrePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrecprocrePeer::ID)) $criteria->add(CcrecprocrePeer::ID, $this->id);
		if ($this->isColumnModified(CcrecprocrePeer::FECREC)) $criteria->add(CcrecprocrePeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(CcrecprocrePeer::CODUSUREC)) $criteria->add(CcrecprocrePeer::CODUSUREC, $this->codusurec);
		if ($this->isColumnModified(CcrecprocrePeer::FECRECCEN)) $criteria->add(CcrecprocrePeer::FECRECCEN, $this->fecreccen);
		if ($this->isColumnModified(CcrecprocrePeer::CODUSUCEN)) $criteria->add(CcrecprocrePeer::CODUSUCEN, $this->codusucen);
		if ($this->isColumnModified(CcrecprocrePeer::ESTATU)) $criteria->add(CcrecprocrePeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcrecprocrePeer::CCRECAUD_ID)) $criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->ccrecaud_id);
		if ($this->isColumnModified(CcrecprocrePeer::CCPROGRA_ID)) $criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->ccprogra_id);
		if ($this->isColumnModified(CcrecprocrePeer::CCCREDIT_ID)) $criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->cccredit_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrecprocrePeer::DATABASE_NAME);

		$criteria->add(CcrecprocrePeer::ID, $this->id);

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

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setCodusurec($this->codusurec);

		$copyObj->setFecreccen($this->fecreccen);

		$copyObj->setCodusucen($this->codusucen);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcrecaudId($this->ccrecaud_id);

		$copyObj->setCcprograId($this->ccprogra_id);

		$copyObj->setCccreditId($this->cccredit_id);


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
			self::$peer = new CcrecprocrePeer();
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

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

} 