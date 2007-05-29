<?php


abstract class BaseFcrutas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrut;


	
	protected $desrut;


	
	protected $id;

	
	protected $collFcrutcobs;

	
	protected $lastFcrutcobCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrut()
	{

		return $this->codrut; 		
	}
	
	public function getDesrut()
	{

		return $this->desrut; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodrut($v)
	{

		if ($this->codrut !== $v) {
			$this->codrut = $v;
			$this->modifiedColumns[] = FcrutasPeer::CODRUT;
		}

	} 
	
	public function setDesrut($v)
	{

		if ($this->desrut !== $v) {
			$this->desrut = $v;
			$this->modifiedColumns[] = FcrutasPeer::DESRUT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrutasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrut = $rs->getString($startcol + 0);

			$this->desrut = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrutas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrutasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrutasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrutasPeer::DATABASE_NAME);
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
					$pk = FcrutasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrutasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcrutcobs !== null) {
				foreach($this->collFcrutcobs as $referrerFK) {
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


			if (($retval = FcrutasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcrutcobs !== null) {
					foreach($this->collFcrutcobs as $referrerFK) {
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
		$pos = FcrutasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrut();
				break;
			case 1:
				return $this->getDesrut();
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
		$keys = FcrutasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrut(),
			$keys[1] => $this->getDesrut(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrutasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrut($value);
				break;
			case 1:
				$this->setDesrut($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrutasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrut($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrut($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrutasPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrutasPeer::CODRUT)) $criteria->add(FcrutasPeer::CODRUT, $this->codrut);
		if ($this->isColumnModified(FcrutasPeer::DESRUT)) $criteria->add(FcrutasPeer::DESRUT, $this->desrut);
		if ($this->isColumnModified(FcrutasPeer::ID)) $criteria->add(FcrutasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrutasPeer::DATABASE_NAME);

		$criteria->add(FcrutasPeer::ID, $this->id);

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

		$copyObj->setCodrut($this->codrut);

		$copyObj->setDesrut($this->desrut);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcrutcobs() as $relObj) {
				$copyObj->addFcrutcob($relObj->copy($deepCopy));
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
			self::$peer = new FcrutasPeer();
		}
		return self::$peer;
	}

	
	public function initFcrutcobs()
	{
		if ($this->collFcrutcobs === null) {
			$this->collFcrutcobs = array();
		}
	}

	
	public function getFcrutcobs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcrutcobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcrutcobs === null) {
			if ($this->isNew()) {
			   $this->collFcrutcobs = array();
			} else {

				$criteria->add(FcrutcobPeer::CODRUT, $this->getCodrut());

				FcrutcobPeer::addSelectColumns($criteria);
				$this->collFcrutcobs = FcrutcobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcrutcobPeer::CODRUT, $this->getCodrut());

				FcrutcobPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcrutcobCriteria) || !$this->lastFcrutcobCriteria->equals($criteria)) {
					$this->collFcrutcobs = FcrutcobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcrutcobCriteria = $criteria;
		return $this->collFcrutcobs;
	}

	
	public function countFcrutcobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcrutcobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcrutcobPeer::CODRUT, $this->getCodrut());

		return FcrutcobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcrutcob(Fcrutcob $l)
	{
		$this->collFcrutcobs[] = $l;
		$l->setFcrutas($this);
	}


	
	public function getFcrutcobsJoinFccobrad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcrutcobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcrutcobs === null) {
			if ($this->isNew()) {
				$this->collFcrutcobs = array();
			} else {

				$criteria->add(FcrutcobPeer::CODRUT, $this->getCodrut());

				$this->collFcrutcobs = FcrutcobPeer::doSelectJoinFccobrad($criteria, $con);
			}
		} else {
									
			$criteria->add(FcrutcobPeer::CODRUT, $this->getCodrut());

			if (!isset($this->lastFcrutcobCriteria) || !$this->lastFcrutcobCriteria->equals($criteria)) {
				$this->collFcrutcobs = FcrutcobPeer::doSelectJoinFccobrad($criteria, $con);
			}
		}
		$this->lastFcrutcobCriteria = $criteria;

		return $this->collFcrutcobs;
	}

} 