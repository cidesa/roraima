<?php


abstract class BaseCcreccre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecha;


	
	protected $estatus;


	
	protected $ccusuint_id;


	
	protected $ccrecaud_id;


	
	protected $cccredit_id;

	
	protected $aCcusuint;

	
	protected $aCcrecaud;

	
	protected $aCccredit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstatus()
  {

    return $this->estatus;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
  
  public function getCcrecaudId()
  {

    return $this->ccrecaud_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcreccrePeer::ID;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = CcreccrePeer::FECHA;
    }

	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = CcreccrePeer::ESTATUS;
      }
  
	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcreccrePeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
	
	public function setCcrecaudId($v)
	{

    if ($this->ccrecaud_id !== $v) {
        $this->ccrecaud_id = $v;
        $this->modifiedColumns[] = CcreccrePeer::CCRECAUD_ID;
      }
  
		if ($this->aCcrecaud !== null && $this->aCcrecaud->getId() !== $v) {
			$this->aCcrecaud = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcreccrePeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecha = $rs->getDate($startcol + 1, null);

      $this->estatus = $rs->getInt($startcol + 2);

      $this->ccusuint_id = $rs->getInt($startcol + 3);

      $this->ccrecaud_id = $rs->getInt($startcol + 4);

      $this->cccredit_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccreccre object", $e);
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
			$con = Propel::getConnection(CcreccrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcreccrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcreccrePeer::DATABASE_NAME);
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


												
			if ($this->aCcusuint !== null) {
				if ($this->aCcusuint->isModified()) {
					$affectedRows += $this->aCcusuint->save($con);
				}
				$this->setCcusuint($this->aCcusuint);
			}

			if ($this->aCcrecaud !== null) {
				if ($this->aCcrecaud->isModified()) {
					$affectedRows += $this->aCcrecaud->save($con);
				}
				$this->setCcrecaud($this->aCcrecaud);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcreccrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcreccrePeer::doUpdate($this, $con);
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


												
			if ($this->aCcusuint !== null) {
				if (!$this->aCcusuint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuint->getValidationFailures());
				}
			}

			if ($this->aCcrecaud !== null) {
				if (!$this->aCcrecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcrecaud->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}


			if (($retval = CcreccrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcreccrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getEstatus();
				break;
			case 3:
				return $this->getCcusuintId();
				break;
			case 4:
				return $this->getCcrecaudId();
				break;
			case 5:
				return $this->getCccreditId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcreccrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getEstatus(),
			$keys[3] => $this->getCcusuintId(),
			$keys[4] => $this->getCcrecaudId(),
			$keys[5] => $this->getCccreditId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcreccrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setEstatus($value);
				break;
			case 3:
				$this->setCcusuintId($value);
				break;
			case 4:
				$this->setCcrecaudId($value);
				break;
			case 5:
				$this->setCccreditId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcreccrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcusuintId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcrecaudId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCccreditId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcreccrePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcreccrePeer::ID)) $criteria->add(CcreccrePeer::ID, $this->id);
		if ($this->isColumnModified(CcreccrePeer::FECHA)) $criteria->add(CcreccrePeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CcreccrePeer::ESTATUS)) $criteria->add(CcreccrePeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(CcreccrePeer::CCUSUINT_ID)) $criteria->add(CcreccrePeer::CCUSUINT_ID, $this->ccusuint_id);
		if ($this->isColumnModified(CcreccrePeer::CCRECAUD_ID)) $criteria->add(CcreccrePeer::CCRECAUD_ID, $this->ccrecaud_id);
		if ($this->isColumnModified(CcreccrePeer::CCCREDIT_ID)) $criteria->add(CcreccrePeer::CCCREDIT_ID, $this->cccredit_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcreccrePeer::DATABASE_NAME);

		$criteria->add(CcreccrePeer::ID, $this->id);

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

		$copyObj->setFecha($this->fecha);

		$copyObj->setEstatus($this->estatus);

		$copyObj->setCcusuintId($this->ccusuint_id);

		$copyObj->setCcrecaudId($this->ccrecaud_id);

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
			self::$peer = new CcreccrePeer();
		}
		return self::$peer;
	}

	
	public function setCcusuint($v)
	{


		if ($v === null) {
			$this->setCcusuintId(NULL);
		} else {
			$this->setCcusuintId($v->getId());
		}


		$this->aCcusuint = $v;
	}


	
	public function getCcusuint($con = null)
	{
		if ($this->aCcusuint === null && ($this->ccusuint_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuintPeer.php';

      $c = new Criteria();
      $c->add(CcusuintPeer::ID,$this->ccusuint_id);
      
			$this->aCcusuint = CcusuintPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuint;
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