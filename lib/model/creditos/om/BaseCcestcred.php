<?php


abstract class BaseCcestcred extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecha;


	
	protected $memo;


	
	protected $ccestatu_id;


	
	protected $ccsolici_id;


	
	protected $ccusuint_id;


	
	protected $ccgerencori_id;


	
	protected $ccgerencdes_id;


	
	protected $ccestsig_id;

	
	protected $aCcestatuRelatedByCcestatuId;

	
	protected $aCcsolici;

	
	protected $aCcusuint;

	
	protected $aCcgerencRelatedByCcgerencoriId;

	
	protected $aCcgerencRelatedByCcgerencdesId;

	
	protected $aCcestatuRelatedByCcestsigId;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecha($format = 'Y-m-d H:i:s')
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

  
  public function getMemo()
  {

    return trim($this->memo);

  }
  
  public function getCcestatuId()
  {

    return $this->ccestatu_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
  
  public function getCcgerencoriId()
  {

    return $this->ccgerencori_id;

  }
  
  public function getCcgerencdesId()
  {

    return $this->ccgerencdes_id;

  }
  
  public function getCcestsigId()
  {

    return $this->ccestsig_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcestcredPeer::ID;
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
      $this->modifiedColumns[] = CcestcredPeer::FECHA;
    }

	} 
	
	public function setMemo($v)
	{

    if ($this->memo !== $v) {
        $this->memo = $v;
        $this->modifiedColumns[] = CcestcredPeer::MEMO;
      }
  
	} 
	
	public function setCcestatuId($v)
	{

    if ($this->ccestatu_id !== $v) {
        $this->ccestatu_id = $v;
        $this->modifiedColumns[] = CcestcredPeer::CCESTATU_ID;
      }
  
		if ($this->aCcestatuRelatedByCcestatuId !== null && $this->aCcestatuRelatedByCcestatuId->getId() !== $v) {
			$this->aCcestatuRelatedByCcestatuId = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcestcredPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcestcredPeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
	
	public function setCcgerencoriId($v)
	{

    if ($this->ccgerencori_id !== $v) {
        $this->ccgerencori_id = $v;
        $this->modifiedColumns[] = CcestcredPeer::CCGERENCORI_ID;
      }
  
		if ($this->aCcgerencRelatedByCcgerencoriId !== null && $this->aCcgerencRelatedByCcgerencoriId->getId() !== $v) {
			$this->aCcgerencRelatedByCcgerencoriId = null;
		}

	} 
	
	public function setCcgerencdesId($v)
	{

    if ($this->ccgerencdes_id !== $v) {
        $this->ccgerencdes_id = $v;
        $this->modifiedColumns[] = CcestcredPeer::CCGERENCDES_ID;
      }
  
		if ($this->aCcgerencRelatedByCcgerencdesId !== null && $this->aCcgerencRelatedByCcgerencdesId->getId() !== $v) {
			$this->aCcgerencRelatedByCcgerencdesId = null;
		}

	} 
	
	public function setCcestsigId($v)
	{

    if ($this->ccestsig_id !== $v) {
        $this->ccestsig_id = $v;
        $this->modifiedColumns[] = CcestcredPeer::CCESTSIG_ID;
      }
  
		if ($this->aCcestatuRelatedByCcestsigId !== null && $this->aCcestatuRelatedByCcestsigId->getId() !== $v) {
			$this->aCcestatuRelatedByCcestsigId = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecha = $rs->getTimestamp($startcol + 1, null);

      $this->memo = $rs->getString($startcol + 2);

      $this->ccestatu_id = $rs->getInt($startcol + 3);

      $this->ccsolici_id = $rs->getInt($startcol + 4);

      $this->ccusuint_id = $rs->getInt($startcol + 5);

      $this->ccgerencori_id = $rs->getInt($startcol + 6);

      $this->ccgerencdes_id = $rs->getInt($startcol + 7);

      $this->ccestsig_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccestcred object", $e);
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
			$con = Propel::getConnection(CcestcredPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcestcredPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcestcredPeer::DATABASE_NAME);
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


												
			if ($this->aCcestatuRelatedByCcestatuId !== null) {
				if ($this->aCcestatuRelatedByCcestatuId->isModified()) {
					$affectedRows += $this->aCcestatuRelatedByCcestatuId->save($con);
				}
				$this->setCcestatuRelatedByCcestatuId($this->aCcestatuRelatedByCcestatuId);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCcusuint !== null) {
				if ($this->aCcusuint->isModified()) {
					$affectedRows += $this->aCcusuint->save($con);
				}
				$this->setCcusuint($this->aCcusuint);
			}

			if ($this->aCcgerencRelatedByCcgerencoriId !== null) {
				if ($this->aCcgerencRelatedByCcgerencoriId->isModified()) {
					$affectedRows += $this->aCcgerencRelatedByCcgerencoriId->save($con);
				}
				$this->setCcgerencRelatedByCcgerencoriId($this->aCcgerencRelatedByCcgerencoriId);
			}

			if ($this->aCcgerencRelatedByCcgerencdesId !== null) {
				if ($this->aCcgerencRelatedByCcgerencdesId->isModified()) {
					$affectedRows += $this->aCcgerencRelatedByCcgerencdesId->save($con);
				}
				$this->setCcgerencRelatedByCcgerencdesId($this->aCcgerencRelatedByCcgerencdesId);
			}

			if ($this->aCcestatuRelatedByCcestsigId !== null) {
				if ($this->aCcestatuRelatedByCcestsigId->isModified()) {
					$affectedRows += $this->aCcestatuRelatedByCcestsigId->save($con);
				}
				$this->setCcestatuRelatedByCcestsigId($this->aCcestatuRelatedByCcestsigId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcestcredPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcestcredPeer::doUpdate($this, $con);
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


												
			if ($this->aCcestatuRelatedByCcestatuId !== null) {
				if (!$this->aCcestatuRelatedByCcestatuId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestatuRelatedByCcestatuId->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCcusuint !== null) {
				if (!$this->aCcusuint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuint->getValidationFailures());
				}
			}

			if ($this->aCcgerencRelatedByCcgerencoriId !== null) {
				if (!$this->aCcgerencRelatedByCcgerencoriId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerencRelatedByCcgerencoriId->getValidationFailures());
				}
			}

			if ($this->aCcgerencRelatedByCcgerencdesId !== null) {
				if (!$this->aCcgerencRelatedByCcgerencdesId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerencRelatedByCcgerencdesId->getValidationFailures());
				}
			}

			if ($this->aCcestatuRelatedByCcestsigId !== null) {
				if (!$this->aCcestatuRelatedByCcestsigId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestatuRelatedByCcestsigId->getValidationFailures());
				}
			}


			if (($retval = CcestcredPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcestcredPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMemo();
				break;
			case 3:
				return $this->getCcestatuId();
				break;
			case 4:
				return $this->getCcsoliciId();
				break;
			case 5:
				return $this->getCcusuintId();
				break;
			case 6:
				return $this->getCcgerencoriId();
				break;
			case 7:
				return $this->getCcgerencdesId();
				break;
			case 8:
				return $this->getCcestsigId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestcredPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getMemo(),
			$keys[3] => $this->getCcestatuId(),
			$keys[4] => $this->getCcsoliciId(),
			$keys[5] => $this->getCcusuintId(),
			$keys[6] => $this->getCcgerencoriId(),
			$keys[7] => $this->getCcgerencdesId(),
			$keys[8] => $this->getCcestsigId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcestcredPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setMemo($value);
				break;
			case 3:
				$this->setCcestatuId($value);
				break;
			case 4:
				$this->setCcsoliciId($value);
				break;
			case 5:
				$this->setCcusuintId($value);
				break;
			case 6:
				$this->setCcgerencoriId($value);
				break;
			case 7:
				$this->setCcgerencdesId($value);
				break;
			case 8:
				$this->setCcestsigId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestcredPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMemo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcestatuId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcsoliciId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcusuintId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcgerencoriId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcgerencdesId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcestsigId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcestcredPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcestcredPeer::ID)) $criteria->add(CcestcredPeer::ID, $this->id);
		if ($this->isColumnModified(CcestcredPeer::FECHA)) $criteria->add(CcestcredPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CcestcredPeer::MEMO)) $criteria->add(CcestcredPeer::MEMO, $this->memo);
		if ($this->isColumnModified(CcestcredPeer::CCESTATU_ID)) $criteria->add(CcestcredPeer::CCESTATU_ID, $this->ccestatu_id);
		if ($this->isColumnModified(CcestcredPeer::CCSOLICI_ID)) $criteria->add(CcestcredPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcestcredPeer::CCUSUINT_ID)) $criteria->add(CcestcredPeer::CCUSUINT_ID, $this->ccusuint_id);
		if ($this->isColumnModified(CcestcredPeer::CCGERENCORI_ID)) $criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->ccgerencori_id);
		if ($this->isColumnModified(CcestcredPeer::CCGERENCDES_ID)) $criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->ccgerencdes_id);
		if ($this->isColumnModified(CcestcredPeer::CCESTSIG_ID)) $criteria->add(CcestcredPeer::CCESTSIG_ID, $this->ccestsig_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcestcredPeer::DATABASE_NAME);

		$criteria->add(CcestcredPeer::ID, $this->id);

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

		$copyObj->setMemo($this->memo);

		$copyObj->setCcestatuId($this->ccestatu_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);

		$copyObj->setCcusuintId($this->ccusuint_id);

		$copyObj->setCcgerencoriId($this->ccgerencori_id);

		$copyObj->setCcgerencdesId($this->ccgerencdes_id);

		$copyObj->setCcestsigId($this->ccestsig_id);


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
			self::$peer = new CcestcredPeer();
		}
		return self::$peer;
	}

	
	public function setCcestatuRelatedByCcestatuId($v)
	{


		if ($v === null) {
			$this->setCcestatuId(NULL);
		} else {
			$this->setCcestatuId($v->getId());
		}


		$this->aCcestatuRelatedByCcestatuId = $v;
	}


	
	public function getCcestatuRelatedByCcestatuId($con = null)
	{
		if ($this->aCcestatuRelatedByCcestatuId === null && ($this->ccestatu_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestatuPeer.php';

      $c = new Criteria();
      $c->add(CcestatuPeer::ID,$this->ccestatu_id);
      
			$this->aCcestatuRelatedByCcestatuId = CcestatuPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestatuRelatedByCcestatuId;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
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

	
	public function setCcgerencRelatedByCcgerencoriId($v)
	{


		if ($v === null) {
			$this->setCcgerencoriId(NULL);
		} else {
			$this->setCcgerencoriId($v->getId());
		}


		$this->aCcgerencRelatedByCcgerencoriId = $v;
	}


	
	public function getCcgerencRelatedByCcgerencoriId($con = null)
	{
		if ($this->aCcgerencRelatedByCcgerencoriId === null && ($this->ccgerencori_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerencori_id);
      
			$this->aCcgerencRelatedByCcgerencoriId = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerencRelatedByCcgerencoriId;
	}

	
	public function setCcgerencRelatedByCcgerencdesId($v)
	{


		if ($v === null) {
			$this->setCcgerencdesId(NULL);
		} else {
			$this->setCcgerencdesId($v->getId());
		}


		$this->aCcgerencRelatedByCcgerencdesId = $v;
	}


	
	public function getCcgerencRelatedByCcgerencdesId($con = null)
	{
		if ($this->aCcgerencRelatedByCcgerencdesId === null && ($this->ccgerencdes_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerencdes_id);
      
			$this->aCcgerencRelatedByCcgerencdesId = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerencRelatedByCcgerencdesId;
	}

	
	public function setCcestatuRelatedByCcestsigId($v)
	{


		if ($v === null) {
			$this->setCcestsigId(NULL);
		} else {
			$this->setCcestsigId($v->getId());
		}


		$this->aCcestatuRelatedByCcestsigId = $v;
	}


	
	public function getCcestatuRelatedByCcestsigId($con = null)
	{
		if ($this->aCcestatuRelatedByCcestsigId === null && ($this->ccestsig_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestatuPeer.php';

      $c = new Criteria();
      $c->add(CcestatuPeer::ID,$this->ccestsig_id);
      
			$this->aCcestatuRelatedByCcestsigId = CcestatuPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestatuRelatedByCcestsigId;
	}

} 