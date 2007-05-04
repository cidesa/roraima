<?php


abstract class BaseFctippag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tippag;


	
	protected $despag;


	
	protected $id;

	
	protected $collFcdetpags;

	
	protected $lastFcdetpagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getTippag()
	{

		return $this->tippag;
	}

	
	public function getDespag()
	{

		return $this->despag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = FctippagPeer::TIPPAG;
		}

	} 
	
	public function setDespag($v)
	{

		if ($this->despag !== $v) {
			$this->despag = $v;
			$this->modifiedColumns[] = FctippagPeer::DESPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FctippagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->tippag = $rs->getString($startcol + 0);

			$this->despag = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fctippag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FctippagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctippagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctippagPeer::DATABASE_NAME);
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
					$pk = FctippagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FctippagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcdetpags !== null) {
				foreach($this->collFcdetpags as $referrerFK) {
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


			if (($retval = FctippagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcdetpags !== null) {
					foreach($this->collFcdetpags as $referrerFK) {
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
		$pos = FctippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTippag();
				break;
			case 1:
				return $this->getDespag();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctippagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTippag(),
			$keys[1] => $this->getDespag(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTippag($value);
				break;
			case 1:
				$this->setDespag($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctippagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTippag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctippagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctippagPeer::TIPPAG)) $criteria->add(FctippagPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(FctippagPeer::DESPAG)) $criteria->add(FctippagPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(FctippagPeer::ID)) $criteria->add(FctippagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctippagPeer::DATABASE_NAME);

		$criteria->add(FctippagPeer::ID, $this->id);

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

		$copyObj->setTippag($this->tippag);

		$copyObj->setDespag($this->despag);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcdetpags() as $relObj) {
				$copyObj->addFcdetpag($relObj->copy($deepCopy));
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
			self::$peer = new FctippagPeer();
		}
		return self::$peer;
	}

	
	public function initFcdetpags()
	{
		if ($this->collFcdetpags === null) {
			$this->collFcdetpags = array();
		}
	}

	
	public function getFcdetpags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcdetpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetpags === null) {
			if ($this->isNew()) {
			   $this->collFcdetpags = array();
			} else {

				$criteria->add(FcdetpagPeer::TIPPAG, $this->getTippag());

				FcdetpagPeer::addSelectColumns($criteria);
				$this->collFcdetpags = FcdetpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcdetpagPeer::TIPPAG, $this->getTippag());

				FcdetpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcdetpagCriteria) || !$this->lastFcdetpagCriteria->equals($criteria)) {
					$this->collFcdetpags = FcdetpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcdetpagCriteria = $criteria;
		return $this->collFcdetpags;
	}

	
	public function countFcdetpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcdetpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcdetpagPeer::TIPPAG, $this->getTippag());

		return FcdetpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcdetpag(Fcdetpag $l)
	{
		$this->collFcdetpags[] = $l;
		$l->setFctippag($this);
	}


	
	public function getFcdetpagsJoinFcpagos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcdetpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetpags === null) {
			if ($this->isNew()) {
				$this->collFcdetpags = array();
			} else {

				$criteria->add(FcdetpagPeer::TIPPAG, $this->getTippag());

				$this->collFcdetpags = FcdetpagPeer::doSelectJoinFcpagos($criteria, $con);
			}
		} else {
									
			$criteria->add(FcdetpagPeer::TIPPAG, $this->getTippag());

			if (!isset($this->lastFcdetpagCriteria) || !$this->lastFcdetpagCriteria->equals($criteria)) {
				$this->collFcdetpags = FcdetpagPeer::doSelectJoinFcpagos($criteria, $con);
			}
		}
		$this->lastFcdetpagCriteria = $criteria;

		return $this->collFcdetpags;
	}

} 