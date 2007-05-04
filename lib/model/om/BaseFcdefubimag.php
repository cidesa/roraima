<?php


abstract class BaseFcdefubimag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codubimag;


	
	protected $nomubimag;


	
	protected $id;

	
	protected $collFcbanents;

	
	protected $lastFcbanentCriteria = null;

	
	protected $collFcbansals;

	
	protected $lastFcbansalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodubimag()
	{

		return $this->codubimag;
	}

	
	public function getNomubimag()
	{

		return $this->nomubimag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodubimag($v)
	{

		if ($this->codubimag !== $v) {
			$this->codubimag = $v;
			$this->modifiedColumns[] = FcdefubimagPeer::CODUBIMAG;
		}

	} 
	
	public function setNomubimag($v)
	{

		if ($this->nomubimag !== $v) {
			$this->nomubimag = $v;
			$this->modifiedColumns[] = FcdefubimagPeer::NOMUBIMAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefubimagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codubimag = $rs->getString($startcol + 0);

			$this->nomubimag = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefubimag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefubimagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefubimagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefubimagPeer::DATABASE_NAME);
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
					$pk = FcdefubimagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefubimagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcbanents !== null) {
				foreach($this->collFcbanents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFcbansals !== null) {
				foreach($this->collFcbansals as $referrerFK) {
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


			if (($retval = FcdefubimagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcbanents !== null) {
					foreach($this->collFcbanents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFcbansals !== null) {
					foreach($this->collFcbansals as $referrerFK) {
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
		$pos = FcdefubimagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodubimag();
				break;
			case 1:
				return $this->getNomubimag();
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
		$keys = FcdefubimagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodubimag(),
			$keys[1] => $this->getNomubimag(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefubimagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodubimag($value);
				break;
			case 1:
				$this->setNomubimag($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefubimagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodubimag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomubimag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefubimagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefubimagPeer::CODUBIMAG)) $criteria->add(FcdefubimagPeer::CODUBIMAG, $this->codubimag);
		if ($this->isColumnModified(FcdefubimagPeer::NOMUBIMAG)) $criteria->add(FcdefubimagPeer::NOMUBIMAG, $this->nomubimag);
		if ($this->isColumnModified(FcdefubimagPeer::ID)) $criteria->add(FcdefubimagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefubimagPeer::DATABASE_NAME);

		$criteria->add(FcdefubimagPeer::ID, $this->id);

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

		$copyObj->setCodubimag($this->codubimag);

		$copyObj->setNomubimag($this->nomubimag);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcbanents() as $relObj) {
				$copyObj->addFcbanent($relObj->copy($deepCopy));
			}

			foreach($this->getFcbansals() as $relObj) {
				$copyObj->addFcbansal($relObj->copy($deepCopy));
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
			self::$peer = new FcdefubimagPeer();
		}
		return self::$peer;
	}

	
	public function initFcbanents()
	{
		if ($this->collFcbanents === null) {
			$this->collFcbanents = array();
		}
	}

	
	public function getFcbanents($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
			   $this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

				FcbanentPeer::addSelectColumns($criteria);
				$this->collFcbanents = FcbanentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

				FcbanentPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
					$this->collFcbanents = FcbanentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcbanentCriteria = $criteria;
		return $this->collFcbanents;
	}

	
	public function countFcbanents($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

		return FcbanentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbanent(Fcbanent $l)
	{
		$this->collFcbanents[] = $l;
		$l->setFcdefubimag($this);
	}


	
	public function getFcbanentsJoinFcdeffun($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdefentext($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdeftipdoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdefubifis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}

	
	public function initFcbansals()
	{
		if ($this->collFcbansals === null) {
			$this->collFcbansals = array();
		}
	}

	
	public function getFcbansals($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
			   $this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

				FcbansalPeer::addSelectColumns($criteria);
				$this->collFcbansals = FcbansalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

				FcbansalPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
					$this->collFcbansals = FcbansalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcbansalCriteria = $criteria;
		return $this->collFcbansals;
	}

	
	public function countFcbansals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

		return FcbansalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbansal(Fcbansal $l)
	{
		$this->collFcbansals[] = $l;
		$l->setFcdefubimag($this);
	}


	
	public function getFcbansalsJoinFcdeffun($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdefentext($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdeftipdoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdefubifis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIMAG, $this->getCodubimag());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}

} 