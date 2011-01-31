<?php


abstract class BaseCcdebcueres extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $observ;


	
	protected $ccdebcue_id;


	
	protected $ccrespue_id;

	
	protected $aCcdebcue;

	
	protected $aCcrespue;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCcdebcueId()
  {

    return $this->ccdebcue_id;

  }
  
  public function getCcrespueId()
  {

    return $this->ccrespue_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdebcueresPeer::ID;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcdebcueresPeer::OBSERV;
      }
  
	} 
	
	public function setCcdebcueId($v)
	{

    if ($this->ccdebcue_id !== $v) {
        $this->ccdebcue_id = $v;
        $this->modifiedColumns[] = CcdebcueresPeer::CCDEBCUE_ID;
      }
  
		if ($this->aCcdebcue !== null && $this->aCcdebcue->getId() !== $v) {
			$this->aCcdebcue = null;
		}

	} 
	
	public function setCcrespueId($v)
	{

    if ($this->ccrespue_id !== $v) {
        $this->ccrespue_id = $v;
        $this->modifiedColumns[] = CcdebcueresPeer::CCRESPUE_ID;
      }
  
		if ($this->aCcrespue !== null && $this->aCcrespue->getId() !== $v) {
			$this->aCcrespue = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->observ = $rs->getString($startcol + 1);

      $this->ccdebcue_id = $rs->getInt($startcol + 2);

      $this->ccrespue_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdebcueres object", $e);
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
			$con = Propel::getConnection(CcdebcueresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdebcueresPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdebcueresPeer::DATABASE_NAME);
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


												
			if ($this->aCcdebcue !== null) {
				if ($this->aCcdebcue->isModified()) {
					$affectedRows += $this->aCcdebcue->save($con);
				}
				$this->setCcdebcue($this->aCcdebcue);
			}

			if ($this->aCcrespue !== null) {
				if ($this->aCcrespue->isModified()) {
					$affectedRows += $this->aCcrespue->save($con);
				}
				$this->setCcrespue($this->aCcrespue);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdebcueresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdebcueresPeer::doUpdate($this, $con);
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


												
			if ($this->aCcdebcue !== null) {
				if (!$this->aCcdebcue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdebcue->getValidationFailures());
				}
			}

			if ($this->aCcrespue !== null) {
				if (!$this->aCcrespue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcrespue->getValidationFailures());
				}
			}


			if (($retval = CcdebcueresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdebcueresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObserv();
				break;
			case 2:
				return $this->getCcdebcueId();
				break;
			case 3:
				return $this->getCcrespueId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdebcueresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObserv(),
			$keys[2] => $this->getCcdebcueId(),
			$keys[3] => $this->getCcrespueId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdebcueresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObserv($value);
				break;
			case 2:
				$this->setCcdebcueId($value);
				break;
			case 3:
				$this->setCcrespueId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdebcueresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObserv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcdebcueId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcrespueId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdebcueresPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdebcueresPeer::ID)) $criteria->add(CcdebcueresPeer::ID, $this->id);
		if ($this->isColumnModified(CcdebcueresPeer::OBSERV)) $criteria->add(CcdebcueresPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcdebcueresPeer::CCDEBCUE_ID)) $criteria->add(CcdebcueresPeer::CCDEBCUE_ID, $this->ccdebcue_id);
		if ($this->isColumnModified(CcdebcueresPeer::CCRESPUE_ID)) $criteria->add(CcdebcueresPeer::CCRESPUE_ID, $this->ccrespue_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdebcueresPeer::DATABASE_NAME);

		$criteria->add(CcdebcueresPeer::ID, $this->id);

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

		$copyObj->setObserv($this->observ);

		$copyObj->setCcdebcueId($this->ccdebcue_id);

		$copyObj->setCcrespueId($this->ccrespue_id);


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
			self::$peer = new CcdebcueresPeer();
		}
		return self::$peer;
	}

	
	public function setCcdebcue($v)
	{


		if ($v === null) {
			$this->setCcdebcueId(NULL);
		} else {
			$this->setCcdebcueId($v->getId());
		}


		$this->aCcdebcue = $v;
	}


	
	public function getCcdebcue($con = null)
	{
		if ($this->aCcdebcue === null && ($this->ccdebcue_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdebcuePeer.php';

      $c = new Criteria();
      $c->add(CcdebcuePeer::ID,$this->ccdebcue_id);
      
			$this->aCcdebcue = CcdebcuePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdebcue;
	}

	
	public function setCcrespue($v)
	{


		if ($v === null) {
			$this->setCcrespueId(NULL);
		} else {
			$this->setCcrespueId($v->getId());
		}


		$this->aCcrespue = $v;
	}


	
	public function getCcrespue($con = null)
	{
		if ($this->aCcrespue === null && ($this->ccrespue_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcrespuePeer.php';

      $c = new Criteria();
      $c->add(CcrespuePeer::ID,$this->ccrespue_id);
      
			$this->aCcrespue = CcrespuePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcrespue;
	}

} 