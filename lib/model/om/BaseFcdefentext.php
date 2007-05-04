<?php


abstract class BaseFcdefentext extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codentext;


	
	protected $nomentext;


	
	protected $pernatjur;


	
	protected $id;

	
	protected $collFcbanents;

	
	protected $lastFcbanentCriteria = null;

	
	protected $collFcbansals;

	
	protected $lastFcbansalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodentext()
	{

		return $this->codentext;
	}

	
	public function getNomentext()
	{

		return $this->nomentext;
	}

	
	public function getPernatjur()
	{

		return $this->pernatjur;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodentext($v)
	{

		if ($this->codentext !== $v) {
			$this->codentext = $v;
			$this->modifiedColumns[] = FcdefentextPeer::CODENTEXT;
		}

	} 
	
	public function setNomentext($v)
	{

		if ($this->nomentext !== $v) {
			$this->nomentext = $v;
			$this->modifiedColumns[] = FcdefentextPeer::NOMENTEXT;
		}

	} 
	
	public function setPernatjur($v)
	{

		if ($this->pernatjur !== $v) {
			$this->pernatjur = $v;
			$this->modifiedColumns[] = FcdefentextPeer::PERNATJUR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefentextPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codentext = $rs->getString($startcol + 0);

			$this->nomentext = $rs->getString($startcol + 1);

			$this->pernatjur = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefentext object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefentextPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefentextPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefentextPeer::DATABASE_NAME);
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
					$pk = FcdefentextPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefentextPeer::doUpdate($this, $con);
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


			if (($retval = FcdefentextPeer::doValidate($this, $columns)) !== true) {
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
		$pos = FcdefentextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodentext();
				break;
			case 1:
				return $this->getNomentext();
				break;
			case 2:
				return $this->getPernatjur();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefentextPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodentext(),
			$keys[1] => $this->getNomentext(),
			$keys[2] => $this->getPernatjur(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefentextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodentext($value);
				break;
			case 1:
				$this->setNomentext($value);
				break;
			case 2:
				$this->setPernatjur($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefentextPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodentext($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomentext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPernatjur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefentextPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefentextPeer::CODENTEXT)) $criteria->add(FcdefentextPeer::CODENTEXT, $this->codentext);
		if ($this->isColumnModified(FcdefentextPeer::NOMENTEXT)) $criteria->add(FcdefentextPeer::NOMENTEXT, $this->nomentext);
		if ($this->isColumnModified(FcdefentextPeer::PERNATJUR)) $criteria->add(FcdefentextPeer::PERNATJUR, $this->pernatjur);
		if ($this->isColumnModified(FcdefentextPeer::ID)) $criteria->add(FcdefentextPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefentextPeer::DATABASE_NAME);

		$criteria->add(FcdefentextPeer::ID, $this->id);

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

		$copyObj->setCodentext($this->codentext);

		$copyObj->setNomentext($this->nomentext);

		$copyObj->setPernatjur($this->pernatjur);


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
			self::$peer = new FcdefentextPeer();
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

				$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

				FcbanentPeer::addSelectColumns($criteria);
				$this->collFcbanents = FcbanentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

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

		$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

		return FcbanentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbanent(Fcbanent $l)
	{
		$this->collFcbanents[] = $l;
		$l->setFcdefentext($this);
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

				$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
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

				$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

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

				$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubifis($criteria, $con);
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

				$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODENTEXT, $this->getCodentext());

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

				$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

				FcbansalPeer::addSelectColumns($criteria);
				$this->collFcbansals = FcbansalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

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

		$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

		return FcbansalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbansal(Fcbansal $l)
	{
		$this->collFcbansals[] = $l;
		$l->setFcdefentext($this);
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

				$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
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

				$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeftipdoc($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

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

				$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubifis($criteria, $con);
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

				$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODENTEXT, $this->getCodentext());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}

} 