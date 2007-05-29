<?php


abstract class BaseFcdefubifis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codubifis;


	
	protected $nomubifis;


	
	protected $id;

	
	protected $collFcbanents;

	
	protected $lastFcbanentCriteria = null;

	
	protected $collFcbansals;

	
	protected $lastFcbansalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodubifis()
	{

		return $this->codubifis; 		
	}
	
	public function getNomubifis()
	{

		return $this->nomubifis; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodubifis($v)
	{

		if ($this->codubifis !== $v) {
			$this->codubifis = $v;
			$this->modifiedColumns[] = FcdefubifisPeer::CODUBIFIS;
		}

	} 
	
	public function setNomubifis($v)
	{

		if ($this->nomubifis !== $v) {
			$this->nomubifis = $v;
			$this->modifiedColumns[] = FcdefubifisPeer::NOMUBIFIS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefubifisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codubifis = $rs->getString($startcol + 0);

			$this->nomubifis = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefubifis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefubifisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefubifisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefubifisPeer::DATABASE_NAME);
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
					$pk = FcdefubifisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefubifisPeer::doUpdate($this, $con);
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


			if (($retval = FcdefubifisPeer::doValidate($this, $columns)) !== true) {
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
		$pos = FcdefubifisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodubifis();
				break;
			case 1:
				return $this->getNomubifis();
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
		$keys = FcdefubifisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodubifis(),
			$keys[1] => $this->getNomubifis(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefubifisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodubifis($value);
				break;
			case 1:
				$this->setNomubifis($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefubifisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodubifis($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomubifis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefubifisPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefubifisPeer::CODUBIFIS)) $criteria->add(FcdefubifisPeer::CODUBIFIS, $this->codubifis);
		if ($this->isColumnModified(FcdefubifisPeer::NOMUBIFIS)) $criteria->add(FcdefubifisPeer::NOMUBIFIS, $this->nomubifis);
		if ($this->isColumnModified(FcdefubifisPeer::ID)) $criteria->add(FcdefubifisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefubifisPeer::DATABASE_NAME);

		$criteria->add(FcdefubifisPeer::ID, $this->id);

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

		$copyObj->setCodubifis($this->codubifis);

		$copyObj->setNomubifis($this->nomubifis);


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
			self::$peer = new FcdefubifisPeer();
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

				$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

				FcbanentPeer::addSelectColumns($criteria);
				$this->collFcbanents = FcbanentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

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

		$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

		return FcbanentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbanent(Fcbanent $l)
	{
		$this->collFcbanents[] = $l;
		$l->setFcdefubifis($this);
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

				$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

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

				$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

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

				$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdefubimag($criteria = null, $con = null)
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

				$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODUBIFIS, $this->getCodubifis());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubimag($criteria, $con);
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

				$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

				FcbansalPeer::addSelectColumns($criteria);
				$this->collFcbansals = FcbansalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

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

		$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

		return FcbansalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbansal(Fcbansal $l)
	{
		$this->collFcbansals[] = $l;
		$l->setFcdefubifis($this);
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

				$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

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

				$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

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

				$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdefubimag($criteria = null, $con = null)
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

				$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODUBIFIS, $this->getCodubifis());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}

} 