<?php


abstract class BaseFafordes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomdes;


	
	protected $id;

	
	protected $collFapresups;

	
	protected $lastFapresupCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNomdes()
  {

    return trim($this->nomdes);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNomdes($v)
	{

    if ($this->nomdes !== $v) {
        $this->nomdes = $v;
        $this->modifiedColumns[] = FafordesPeer::NOMDES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FafordesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nomdes = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fafordes object", $e);
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
			$con = Propel::getConnection(FafordesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FafordesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FafordesPeer::DATABASE_NAME);
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
					$pk = FafordesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FafordesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFapresups !== null) {
				foreach($this->collFapresups as $referrerFK) {
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


			if (($retval = FafordesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFapresups !== null) {
					foreach($this->collFapresups as $referrerFK) {
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
		$pos = FafordesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomdes();
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
		$keys = FafordesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomdes(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafordesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomdes($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafordesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomdes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FafordesPeer::DATABASE_NAME);

		if ($this->isColumnModified(FafordesPeer::NOMDES)) $criteria->add(FafordesPeer::NOMDES, $this->nomdes);
		if ($this->isColumnModified(FafordesPeer::ID)) $criteria->add(FafordesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FafordesPeer::DATABASE_NAME);

		$criteria->add(FafordesPeer::ID, $this->id);

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

		$copyObj->setNomdes($this->nomdes);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFapresups() as $relObj) {
				$copyObj->addFapresup($relObj->copy($deepCopy));
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
			self::$peer = new FafordesPeer();
		}
		return self::$peer;
	}

	
	public function initFapresups()
	{
		if ($this->collFapresups === null) {
			$this->collFapresups = array();
		}
	}

	
	public function getFapresups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFapresups === null) {
			if ($this->isNew()) {
			   $this->collFapresups = array();
			} else {

				$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

				FapresupPeer::addSelectColumns($criteria);
				$this->collFapresups = FapresupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

				FapresupPeer::addSelectColumns($criteria);
				if (!isset($this->lastFapresupCriteria) || !$this->lastFapresupCriteria->equals($criteria)) {
					$this->collFapresups = FapresupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFapresupCriteria = $criteria;
		return $this->collFapresups;
	}

	
	public function countFapresups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

		return FapresupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFapresup(Fapresup $l)
	{
		$this->collFapresups[] = $l;
		$l->setFafordes($this);
	}


	
	public function getFapresupsJoinFaconpag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFapresups === null) {
			if ($this->isNew()) {
				$this->collFapresups = array();
			} else {

				$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

				$this->collFapresups = FapresupPeer::doSelectJoinFaconpag($criteria, $con);
			}
		} else {
									
			$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

			if (!isset($this->lastFapresupCriteria) || !$this->lastFapresupCriteria->equals($criteria)) {
				$this->collFapresups = FapresupPeer::doSelectJoinFaconpag($criteria, $con);
			}
		}
		$this->lastFapresupCriteria = $criteria;

		return $this->collFapresups;
	}


	
	public function getFapresupsJoinFaforsol($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFapresups === null) {
			if ($this->isNew()) {
				$this->collFapresups = array();
			} else {

				$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

				$this->collFapresups = FapresupPeer::doSelectJoinFaforsol($criteria, $con);
			}
		} else {
									
			$criteria->add(FapresupPeer::FAFORDES_ID, $this->getId());

			if (!isset($this->lastFapresupCriteria) || !$this->lastFapresupCriteria->equals($criteria)) {
				$this->collFapresups = FapresupPeer::doSelectJoinFaforsol($criteria, $con);
			}
		}
		$this->lastFapresupCriteria = $criteria;

		return $this->collFapresups;
	}

} 