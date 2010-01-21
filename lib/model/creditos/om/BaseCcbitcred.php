<?php


abstract class BaseCcbitcred extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecvig;


	
	protected $fecven;


	
	protected $nomestatu;


	
	protected $nomgerenc;


	
	protected $ccestatu_id;


	
	protected $cccredit_id;


	
	protected $ccusuario_id;

	
	protected $aCcestatu;

	
	protected $aCccredit;

	
	protected $aCcusuario;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

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

  
  public function getNomestatu()
  {

    return trim($this->nomestatu);

  }
  
  public function getNomgerenc()
  {

    return trim($this->nomgerenc);

  }
  
  public function getCcestatuId()
  {

    return $this->ccestatu_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcusuarioId()
  {

    return $this->ccusuario_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbitcredPeer::ID;
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
      $this->modifiedColumns[] = CcbitcredPeer::FECVIG;
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
      $this->modifiedColumns[] = CcbitcredPeer::FECVEN;
    }

	} 
	
	public function setNomestatu($v)
	{

    if ($this->nomestatu !== $v) {
        $this->nomestatu = $v;
        $this->modifiedColumns[] = CcbitcredPeer::NOMESTATU;
      }
  
	} 
	
	public function setNomgerenc($v)
	{

    if ($this->nomgerenc !== $v) {
        $this->nomgerenc = $v;
        $this->modifiedColumns[] = CcbitcredPeer::NOMGERENC;
      }
  
	} 
	
	public function setCcestatuId($v)
	{

    if ($this->ccestatu_id !== $v) {
        $this->ccestatu_id = $v;
        $this->modifiedColumns[] = CcbitcredPeer::CCESTATU_ID;
      }
  
		if ($this->aCcestatu !== null && $this->aCcestatu->getId() !== $v) {
			$this->aCcestatu = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcbitcredPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcusuarioId($v)
	{

    if ($this->ccusuario_id !== $v) {
        $this->ccusuario_id = $v;
        $this->modifiedColumns[] = CcbitcredPeer::CCUSUARIO_ID;
      }
  
		if ($this->aCcusuario !== null && $this->aCcusuario->getId() !== $v) {
			$this->aCcusuario = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecvig = $rs->getDate($startcol + 1, null);

      $this->fecven = $rs->getDate($startcol + 2, null);

      $this->nomestatu = $rs->getString($startcol + 3);

      $this->nomgerenc = $rs->getString($startcol + 4);

      $this->ccestatu_id = $rs->getInt($startcol + 5);

      $this->cccredit_id = $rs->getInt($startcol + 6);

      $this->ccusuario_id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbitcred object", $e);
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
			$con = Propel::getConnection(CcbitcredPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbitcredPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbitcredPeer::DATABASE_NAME);
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


												
			if ($this->aCcestatu !== null) {
				if ($this->aCcestatu->isModified()) {
					$affectedRows += $this->aCcestatu->save($con);
				}
				$this->setCcestatu($this->aCcestatu);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcusuario !== null) {
				if ($this->aCcusuario->isModified()) {
					$affectedRows += $this->aCcusuario->save($con);
				}
				$this->setCcusuario($this->aCcusuario);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbitcredPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbitcredPeer::doUpdate($this, $con);
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


												
			if ($this->aCcestatu !== null) {
				if (!$this->aCcestatu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestatu->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcusuario !== null) {
				if (!$this->aCcusuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuario->getValidationFailures());
				}
			}


			if (($retval = CcbitcredPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbitcredPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecvig();
				break;
			case 2:
				return $this->getFecven();
				break;
			case 3:
				return $this->getNomestatu();
				break;
			case 4:
				return $this->getNomgerenc();
				break;
			case 5:
				return $this->getCcestatuId();
				break;
			case 6:
				return $this->getCccreditId();
				break;
			case 7:
				return $this->getCcusuarioId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbitcredPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecvig(),
			$keys[2] => $this->getFecven(),
			$keys[3] => $this->getNomestatu(),
			$keys[4] => $this->getNomgerenc(),
			$keys[5] => $this->getCcestatuId(),
			$keys[6] => $this->getCccreditId(),
			$keys[7] => $this->getCcusuarioId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbitcredPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecvig($value);
				break;
			case 2:
				$this->setFecven($value);
				break;
			case 3:
				$this->setNomestatu($value);
				break;
			case 4:
				$this->setNomgerenc($value);
				break;
			case 5:
				$this->setCcestatuId($value);
				break;
			case 6:
				$this->setCccreditId($value);
				break;
			case 7:
				$this->setCcusuarioId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbitcredPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecvig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecven($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomestatu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomgerenc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcestatuId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCccreditId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcusuarioId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbitcredPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbitcredPeer::ID)) $criteria->add(CcbitcredPeer::ID, $this->id);
		if ($this->isColumnModified(CcbitcredPeer::FECVIG)) $criteria->add(CcbitcredPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(CcbitcredPeer::FECVEN)) $criteria->add(CcbitcredPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcbitcredPeer::NOMESTATU)) $criteria->add(CcbitcredPeer::NOMESTATU, $this->nomestatu);
		if ($this->isColumnModified(CcbitcredPeer::NOMGERENC)) $criteria->add(CcbitcredPeer::NOMGERENC, $this->nomgerenc);
		if ($this->isColumnModified(CcbitcredPeer::CCESTATU_ID)) $criteria->add(CcbitcredPeer::CCESTATU_ID, $this->ccestatu_id);
		if ($this->isColumnModified(CcbitcredPeer::CCCREDIT_ID)) $criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcbitcredPeer::CCUSUARIO_ID)) $criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->ccusuario_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbitcredPeer::DATABASE_NAME);

		$criteria->add(CcbitcredPeer::ID, $this->id);

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

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNomestatu($this->nomestatu);

		$copyObj->setNomgerenc($this->nomgerenc);

		$copyObj->setCcestatuId($this->ccestatu_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcusuarioId($this->ccusuario_id);


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
			self::$peer = new CcbitcredPeer();
		}
		return self::$peer;
	}

	
	public function setCcestatu($v)
	{


		if ($v === null) {
			$this->setCcestatuId(NULL);
		} else {
			$this->setCcestatuId($v->getId());
		}


		$this->aCcestatu = $v;
	}


	
	public function getCcestatu($con = null)
	{
		if ($this->aCcestatu === null && ($this->ccestatu_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestatuPeer.php';

      $c = new Criteria();
      $c->add(CcestatuPeer::ID,$this->ccestatu_id);
      
			$this->aCcestatu = CcestatuPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestatu;
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

	
	public function setCcusuario($v)
	{


		if ($v === null) {
			$this->setCcusuarioId(NULL);
		} else {
			$this->setCcusuarioId($v->getId());
		}


		$this->aCcusuario = $v;
	}


	
	public function getCcusuario($con = null)
	{
		if ($this->aCcusuario === null && ($this->ccusuario_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';

      $c = new Criteria();
      $c->add(CcusuarioPeer::ID,$this->ccusuario_id);
      
			$this->aCcusuario = CcusuarioPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuario;
	}

} 