<?php


abstract class BaseCcclabie extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomclabie;


	
	protected $desclabie;

	
	protected $collCcbieadqs;

	
	protected $lastCcbieadqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomclabie()
  {

    return trim($this->nomclabie);

  }
  
  public function getDesclabie()
  {

    return trim($this->desclabie);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcclabiePeer::ID;
      }
  
	} 
	
	public function setNomclabie($v)
	{

    if ($this->nomclabie !== $v) {
        $this->nomclabie = $v;
        $this->modifiedColumns[] = CcclabiePeer::NOMCLABIE;
      }
  
	} 
	
	public function setDesclabie($v)
	{

    if ($this->desclabie !== $v) {
        $this->desclabie = $v;
        $this->modifiedColumns[] = CcclabiePeer::DESCLABIE;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomclabie = $rs->getString($startcol + 1);

      $this->desclabie = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccclabie object", $e);
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
			$con = Propel::getConnection(CcclabiePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcclabiePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcclabiePeer::DATABASE_NAME);
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
					$pk = CcclabiePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcclabiePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbieadqs !== null) {
				foreach($this->collCcbieadqs as $referrerFK) {
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


			if (($retval = CcclabiePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbieadqs !== null) {
					foreach($this->collCcbieadqs as $referrerFK) {
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
		$pos = CcclabiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomclabie();
				break;
			case 2:
				return $this->getDesclabie();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcclabiePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomclabie(),
			$keys[2] => $this->getDesclabie(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcclabiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomclabie($value);
				break;
			case 2:
				$this->setDesclabie($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcclabiePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomclabie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesclabie($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcclabiePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcclabiePeer::ID)) $criteria->add(CcclabiePeer::ID, $this->id);
		if ($this->isColumnModified(CcclabiePeer::NOMCLABIE)) $criteria->add(CcclabiePeer::NOMCLABIE, $this->nomclabie);
		if ($this->isColumnModified(CcclabiePeer::DESCLABIE)) $criteria->add(CcclabiePeer::DESCLABIE, $this->desclabie);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcclabiePeer::DATABASE_NAME);

		$criteria->add(CcclabiePeer::ID, $this->id);

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

		$copyObj->setNomclabie($this->nomclabie);

		$copyObj->setDesclabie($this->desclabie);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbieadqs() as $relObj) {
				$copyObj->addCcbieadq($relObj->copy($deepCopy));
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
			self::$peer = new CcclabiePeer();
		}
		return self::$peer;
	}

	
	public function initCcbieadqs()
	{
		if ($this->collCcbieadqs === null) {
			$this->collCcbieadqs = array();
		}
	}

	
	public function getCcbieadqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
			   $this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

				CcbieadqPeer::addSelectColumns($criteria);
				$this->collCcbieadqs = CcbieadqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

				CcbieadqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
					$this->collCcbieadqs = CcbieadqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbieadqCriteria = $criteria;
		return $this->collCcbieadqs;
	}

	
	public function countCcbieadqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

		return CcbieadqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbieadq(Ccbieadq $l)
	{
		$this->collCcbieadqs[] = $l;
		$l->setCcclabie($this);
	}


	
	public function getCcbieadqsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}


	
	public function getCcbieadqsJoinCctipprobie($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCctipprobie($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCctipprobie($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}


	
	public function getCcbieadqsJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCCLABIE_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}

} 