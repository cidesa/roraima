<?php


abstract class BaseCcasigana extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecasig;


	
	protected $tipasig;


	
	protected $estatus;


	
	protected $ccanalis_id;


	
	protected $ccsolici_id;


	
	protected $ccusuint_id;


	
	protected $ccgerenc_id;

	
	protected $aCcanalis;

	
	protected $aCcsolici;

	
	protected $aCcusuint;

	
	protected $aCcgerenc;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecasig($format = 'Y-m-d')
  {

    if ($this->fecasig === null || $this->fecasig === '') {
      return null;
    } elseif (!is_int($this->fecasig)) {
            $ts = adodb_strtotime($this->fecasig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecasig] as date/time value: " . var_export($this->fecasig, true));
      }
    } else {
      $ts = $this->fecasig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipasig()
  {

    return trim($this->tipasig);

  }
  
  public function getEstatus()
  {

    return trim($this->estatus);

  }
  
  public function getCcanalisId()
  {

    return $this->ccanalis_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcasiganaPeer::ID;
      }
  
	} 
	
	public function setFecasig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecasig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecasig !== $ts) {
      $this->fecasig = $ts;
      $this->modifiedColumns[] = CcasiganaPeer::FECASIG;
    }

	} 
	
	public function setTipasig($v)
	{

    if ($this->tipasig !== $v) {
        $this->tipasig = $v;
        $this->modifiedColumns[] = CcasiganaPeer::TIPASIG;
      }
  
	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = CcasiganaPeer::ESTATUS;
      }
  
	} 
	
	public function setCcanalisId($v)
	{

    if ($this->ccanalis_id !== $v) {
        $this->ccanalis_id = $v;
        $this->modifiedColumns[] = CcasiganaPeer::CCANALIS_ID;
      }
  
		if ($this->aCcanalis !== null && $this->aCcanalis->getId() !== $v) {
			$this->aCcanalis = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcasiganaPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcasiganaPeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcasiganaPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecasig = $rs->getDate($startcol + 1, null);

      $this->tipasig = $rs->getString($startcol + 2);

      $this->estatus = $rs->getString($startcol + 3);

      $this->ccanalis_id = $rs->getInt($startcol + 4);

      $this->ccsolici_id = $rs->getInt($startcol + 5);

      $this->ccusuint_id = $rs->getInt($startcol + 6);

      $this->ccgerenc_id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccasigana object", $e);
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
			$con = Propel::getConnection(CcasiganaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcasiganaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcasiganaPeer::DATABASE_NAME);
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


												
			if ($this->aCcanalis !== null) {
				if ($this->aCcanalis->isModified()) {
					$affectedRows += $this->aCcanalis->save($con);
				}
				$this->setCcanalis($this->aCcanalis);
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

			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcasiganaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcasiganaPeer::doUpdate($this, $con);
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


												
			if ($this->aCcanalis !== null) {
				if (!$this->aCcanalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcanalis->getValidationFailures());
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

			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}


			if (($retval = CcasiganaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcasiganaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecasig();
				break;
			case 2:
				return $this->getTipasig();
				break;
			case 3:
				return $this->getEstatus();
				break;
			case 4:
				return $this->getCcanalisId();
				break;
			case 5:
				return $this->getCcsoliciId();
				break;
			case 6:
				return $this->getCcusuintId();
				break;
			case 7:
				return $this->getCcgerencId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcasiganaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecasig(),
			$keys[2] => $this->getTipasig(),
			$keys[3] => $this->getEstatus(),
			$keys[4] => $this->getCcanalisId(),
			$keys[5] => $this->getCcsoliciId(),
			$keys[6] => $this->getCcusuintId(),
			$keys[7] => $this->getCcgerencId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcasiganaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecasig($value);
				break;
			case 2:
				$this->setTipasig($value);
				break;
			case 3:
				$this->setEstatus($value);
				break;
			case 4:
				$this->setCcanalisId($value);
				break;
			case 5:
				$this->setCcsoliciId($value);
				break;
			case 6:
				$this->setCcusuintId($value);
				break;
			case 7:
				$this->setCcgerencId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcasiganaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecasig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipasig($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcanalisId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcsoliciId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcusuintId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcgerencId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcasiganaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcasiganaPeer::ID)) $criteria->add(CcasiganaPeer::ID, $this->id);
		if ($this->isColumnModified(CcasiganaPeer::FECASIG)) $criteria->add(CcasiganaPeer::FECASIG, $this->fecasig);
		if ($this->isColumnModified(CcasiganaPeer::TIPASIG)) $criteria->add(CcasiganaPeer::TIPASIG, $this->tipasig);
		if ($this->isColumnModified(CcasiganaPeer::ESTATUS)) $criteria->add(CcasiganaPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(CcasiganaPeer::CCANALIS_ID)) $criteria->add(CcasiganaPeer::CCANALIS_ID, $this->ccanalis_id);
		if ($this->isColumnModified(CcasiganaPeer::CCSOLICI_ID)) $criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcasiganaPeer::CCUSUINT_ID)) $criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->ccusuint_id);
		if ($this->isColumnModified(CcasiganaPeer::CCGERENC_ID)) $criteria->add(CcasiganaPeer::CCGERENC_ID, $this->ccgerenc_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcasiganaPeer::DATABASE_NAME);

		$criteria->add(CcasiganaPeer::ID, $this->id);

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

		$copyObj->setFecasig($this->fecasig);

		$copyObj->setTipasig($this->tipasig);

		$copyObj->setEstatus($this->estatus);

		$copyObj->setCcanalisId($this->ccanalis_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);

		$copyObj->setCcusuintId($this->ccusuint_id);

		$copyObj->setCcgerencId($this->ccgerenc_id);


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
			self::$peer = new CcasiganaPeer();
		}
		return self::$peer;
	}

	
	public function setCcanalis($v)
	{


		if ($v === null) {
			$this->setCcanalisId(NULL);
		} else {
			$this->setCcanalisId($v->getId());
		}


		$this->aCcanalis = $v;
	}


	
	public function getCcanalis($con = null)
	{
		if ($this->aCcanalis === null && ($this->ccanalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';

      $c = new Criteria();
      $c->add(CcanalisPeer::ID,$this->ccanalis_id);
      
			$this->aCcanalis = CcanalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcanalis;
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

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
	}

} 