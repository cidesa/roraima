<?php


abstract class BaseCctipcue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomtipcue;

	
	protected $collCccuebans;

	
	protected $lastCccuebanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomtipcue()
  {

    return trim($this->nomtipcue);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CctipcuePeer::ID;
      }
  
	} 
	
	public function setNomtipcue($v)
	{

    if ($this->nomtipcue !== $v) {
        $this->nomtipcue = $v;
        $this->modifiedColumns[] = CctipcuePeer::NOMTIPCUE;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomtipcue = $rs->getString($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cctipcue object", $e);
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
			$con = Propel::getConnection(CctipcuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CctipcuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CctipcuePeer::DATABASE_NAME);
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
					$pk = CctipcuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CctipcuePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccuebans !== null) {
				foreach($this->collCccuebans as $referrerFK) {
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


			if (($retval = CctipcuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccuebans !== null) {
					foreach($this->collCccuebans as $referrerFK) {
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
		$pos = CctipcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomtipcue();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipcuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomtipcue(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomtipcue($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipcuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipcue($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CctipcuePeer::DATABASE_NAME);

		if ($this->isColumnModified(CctipcuePeer::ID)) $criteria->add(CctipcuePeer::ID, $this->id);
		if ($this->isColumnModified(CctipcuePeer::NOMTIPCUE)) $criteria->add(CctipcuePeer::NOMTIPCUE, $this->nomtipcue);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CctipcuePeer::DATABASE_NAME);

		$criteria->add(CctipcuePeer::ID, $this->id);

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

		$copyObj->setNomtipcue($this->nomtipcue);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccuebans() as $relObj) {
				$copyObj->addCccueban($relObj->copy($deepCopy));
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
			self::$peer = new CctipcuePeer();
		}
		return self::$peer;
	}

	
	public function initCccuebans()
	{
		if ($this->collCccuebans === null) {
			$this->collCccuebans = array();
		}
	}

	
	public function getCccuebans($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuebans === null) {
			if ($this->isNew()) {
			   $this->collCccuebans = array();
			} else {

				$criteria->add(CccuebanPeer::CCTIPCUE_ID, $this->getId());

				CccuebanPeer::addSelectColumns($criteria);
				$this->collCccuebans = CccuebanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccuebanPeer::CCTIPCUE_ID, $this->getId());

				CccuebanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccuebanCriteria) || !$this->lastCccuebanCriteria->equals($criteria)) {
					$this->collCccuebans = CccuebanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccuebanCriteria = $criteria;
		return $this->collCccuebans;
	}

	
	public function countCccuebans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccuebanPeer::CCTIPCUE_ID, $this->getId());

		return CccuebanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccueban(Cccueban $l)
	{
		$this->collCccuebans[] = $l;
		$l->setCctipcue($this);
	}


	
	public function getCccuebansJoinCcbanco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuebans === null) {
			if ($this->isNew()) {
				$this->collCccuebans = array();
			} else {

				$criteria->add(CccuebanPeer::CCTIPCUE_ID, $this->getId());

				$this->collCccuebans = CccuebanPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuebanPeer::CCTIPCUE_ID, $this->getId());

			if (!isset($this->lastCccuebanCriteria) || !$this->lastCccuebanCriteria->equals($criteria)) {
				$this->collCccuebans = CccuebanPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCccuebanCriteria = $criteria;

		return $this->collCccuebans;
	}

} 