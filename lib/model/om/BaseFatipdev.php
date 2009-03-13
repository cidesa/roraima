<?php


abstract class BaseFatipdev extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomtidev;


	
	protected $id;

	
	protected $collFadevolus;

	
	protected $lastFadevoluCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNomtidev()
  {

    return trim($this->nomtidev);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNomtidev($v)
	{

    if ($this->nomtidev !== $v) {
        $this->nomtidev = $v;
        $this->modifiedColumns[] = FatipdevPeer::NOMTIDEV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FatipdevPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nomtidev = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fatipdev object", $e);
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
			$con = Propel::getConnection(FatipdevPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatipdevPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatipdevPeer::DATABASE_NAME);
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
					$pk = FatipdevPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FatipdevPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFadevolus !== null) {
				foreach($this->collFadevolus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = FatipdevPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFadevolus !== null) {
					foreach($this->collFadevolus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatipdevPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomtidev();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatipdevPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomtidev(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatipdevPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomtidev($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatipdevPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomtidev($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatipdevPeer::DATABASE_NAME);

		if ($this->isColumnModified(FatipdevPeer::NOMTIDEV)) $criteria->add(FatipdevPeer::NOMTIDEV, $this->nomtidev);
		if ($this->isColumnModified(FatipdevPeer::ID)) $criteria->add(FatipdevPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatipdevPeer::DATABASE_NAME);

		$criteria->add(FatipdevPeer::ID, $this->id);

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

		$copyObj->setNomtidev($this->nomtidev);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFadevolus() as $relObj) {
				$copyObj->addFadevolu($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new FatipdevPeer();
		}
		return self::$peer;
	}

	
	public function initFadevolus()
	{
		if ($this->collFadevolus === null) {
			$this->collFadevolus = array();
		}
	}

	
	public function getFadevolus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFadevoluPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadevolus === null) {
			if ($this->isNew()) {
			   $this->collFadevolus = array();
			} else {

				$criteria->add(FadevoluPeer::FATIPDEV_ID, $this->getId());

				FadevoluPeer::addSelectColumns($criteria);
				$this->collFadevolus = FadevoluPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadevoluPeer::FATIPDEV_ID, $this->getId());

				FadevoluPeer::addSelectColumns($criteria);
				if (!isset($this->lastFadevoluCriteria) || !$this->lastFadevoluCriteria->equals($criteria)) {
					$this->collFadevolus = FadevoluPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadevoluCriteria = $criteria;
		return $this->collFadevolus;
	}

	
	public function countFadevolus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFadevoluPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadevoluPeer::FATIPDEV_ID, $this->getId());

		return FadevoluPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadevolu(Fadevolu $l)
	{
		$this->collFadevolus[] = $l;
		$l->setFatipdev($this);
	}

} 