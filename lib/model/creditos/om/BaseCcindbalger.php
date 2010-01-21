<?php


abstract class BaseCcindbalger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecindbalger;


	
	protected $monindbalger;


	
	protected $ccbalger_id;


	
	protected $ccindica_id;

	
	protected $aCcbalger;

	
	protected $aCcindica;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecindbalger($format = 'Y-m-d')
  {

    if ($this->fecindbalger === null || $this->fecindbalger === '') {
      return null;
    } elseif (!is_int($this->fecindbalger)) {
            $ts = adodb_strtotime($this->fecindbalger);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecindbalger] as date/time value: " . var_export($this->fecindbalger, true));
      }
    } else {
      $ts = $this->fecindbalger;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonindbalger($val=false)
  {

    if($val) return number_format($this->monindbalger,2,',','.');
    else return $this->monindbalger;

  }
  
  public function getCcbalgerId()
  {

    return $this->ccbalger_id;

  }
  
  public function getCcindicaId()
  {

    return $this->ccindica_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcindbalgerPeer::ID;
      }
  
	} 
	
	public function setFecindbalger($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecindbalger] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecindbalger !== $ts) {
      $this->fecindbalger = $ts;
      $this->modifiedColumns[] = CcindbalgerPeer::FECINDBALGER;
    }

	} 
	
	public function setMonindbalger($v)
	{

    if ($this->monindbalger !== $v) {
        $this->monindbalger = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcindbalgerPeer::MONINDBALGER;
      }
  
	} 
	
	public function setCcbalgerId($v)
	{

    if ($this->ccbalger_id !== $v) {
        $this->ccbalger_id = $v;
        $this->modifiedColumns[] = CcindbalgerPeer::CCBALGER_ID;
      }
  
		if ($this->aCcbalger !== null && $this->aCcbalger->getId() !== $v) {
			$this->aCcbalger = null;
		}

	} 
	
	public function setCcindicaId($v)
	{

    if ($this->ccindica_id !== $v) {
        $this->ccindica_id = $v;
        $this->modifiedColumns[] = CcindbalgerPeer::CCINDICA_ID;
      }
  
		if ($this->aCcindica !== null && $this->aCcindica->getId() !== $v) {
			$this->aCcindica = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecindbalger = $rs->getDate($startcol + 1, null);

      $this->monindbalger = $rs->getFloat($startcol + 2);

      $this->ccbalger_id = $rs->getInt($startcol + 3);

      $this->ccindica_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccindbalger object", $e);
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
			$con = Propel::getConnection(CcindbalgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcindbalgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcindbalgerPeer::DATABASE_NAME);
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


												
			if ($this->aCcbalger !== null) {
				if ($this->aCcbalger->isModified()) {
					$affectedRows += $this->aCcbalger->save($con);
				}
				$this->setCcbalger($this->aCcbalger);
			}

			if ($this->aCcindica !== null) {
				if ($this->aCcindica->isModified()) {
					$affectedRows += $this->aCcindica->save($con);
				}
				$this->setCcindica($this->aCcindica);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcindbalgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcindbalgerPeer::doUpdate($this, $con);
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


												
			if ($this->aCcbalger !== null) {
				if (!$this->aCcbalger->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbalger->getValidationFailures());
				}
			}

			if ($this->aCcindica !== null) {
				if (!$this->aCcindica->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcindica->getValidationFailures());
				}
			}


			if (($retval = CcindbalgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcindbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecindbalger();
				break;
			case 2:
				return $this->getMonindbalger();
				break;
			case 3:
				return $this->getCcbalgerId();
				break;
			case 4:
				return $this->getCcindicaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcindbalgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecindbalger(),
			$keys[2] => $this->getMonindbalger(),
			$keys[3] => $this->getCcbalgerId(),
			$keys[4] => $this->getCcindicaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcindbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecindbalger($value);
				break;
			case 2:
				$this->setMonindbalger($value);
				break;
			case 3:
				$this->setCcbalgerId($value);
				break;
			case 4:
				$this->setCcindicaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcindbalgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecindbalger($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonindbalger($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcbalgerId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcindicaId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcindbalgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcindbalgerPeer::ID)) $criteria->add(CcindbalgerPeer::ID, $this->id);
		if ($this->isColumnModified(CcindbalgerPeer::FECINDBALGER)) $criteria->add(CcindbalgerPeer::FECINDBALGER, $this->fecindbalger);
		if ($this->isColumnModified(CcindbalgerPeer::MONINDBALGER)) $criteria->add(CcindbalgerPeer::MONINDBALGER, $this->monindbalger);
		if ($this->isColumnModified(CcindbalgerPeer::CCBALGER_ID)) $criteria->add(CcindbalgerPeer::CCBALGER_ID, $this->ccbalger_id);
		if ($this->isColumnModified(CcindbalgerPeer::CCINDICA_ID)) $criteria->add(CcindbalgerPeer::CCINDICA_ID, $this->ccindica_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcindbalgerPeer::DATABASE_NAME);

		$criteria->add(CcindbalgerPeer::ID, $this->id);

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

		$copyObj->setFecindbalger($this->fecindbalger);

		$copyObj->setMonindbalger($this->monindbalger);

		$copyObj->setCcbalgerId($this->ccbalger_id);

		$copyObj->setCcindicaId($this->ccindica_id);


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
			self::$peer = new CcindbalgerPeer();
		}
		return self::$peer;
	}

	
	public function setCcbalger($v)
	{


		if ($v === null) {
			$this->setCcbalgerId(NULL);
		} else {
			$this->setCcbalgerId($v->getId());
		}


		$this->aCcbalger = $v;
	}


	
	public function getCcbalger($con = null)
	{
		if ($this->aCcbalger === null && ($this->ccbalger_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';

      $c = new Criteria();
      $c->add(CcbalgerPeer::ID,$this->ccbalger_id);
      
			$this->aCcbalger = CcbalgerPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbalger;
	}

	
	public function setCcindica($v)
	{


		if ($v === null) {
			$this->setCcindicaId(NULL);
		} else {
			$this->setCcindicaId($v->getId());
		}


		$this->aCcindica = $v;
	}


	
	public function getCcindica($con = null)
	{
		if ($this->aCcindica === null && ($this->ccindica_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcindicaPeer.php';

      $c = new Criteria();
      $c->add(CcindicaPeer::ID,$this->ccindica_id);
      
			$this->aCcindica = CcindicaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcindica;
	}

} 