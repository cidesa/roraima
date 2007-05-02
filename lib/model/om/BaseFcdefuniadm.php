<?php


abstract class BaseFcdefuniadm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduniadm;


	
	protected $nomuniadm;


	
	protected $id;

	
	protected $collFcdeffuns;

	
	protected $lastFcdeffunCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduniadm()
	{

		return $this->coduniadm;
	}

	
	public function getNomuniadm()
	{

		return $this->nomuniadm;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoduniadm($v)
	{

		if ($this->coduniadm !== $v) {
			$this->coduniadm = $v;
			$this->modifiedColumns[] = FcdefuniadmPeer::CODUNIADM;
		}

	} 
	
	public function setNomuniadm($v)
	{

		if ($this->nomuniadm !== $v) {
			$this->nomuniadm = $v;
			$this->modifiedColumns[] = FcdefuniadmPeer::NOMUNIADM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefuniadmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coduniadm = $rs->getString($startcol + 0);

			$this->nomuniadm = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefuniadm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefuniadmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefuniadmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefuniadmPeer::DATABASE_NAME);
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
					$pk = FcdefuniadmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefuniadmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcdeffuns !== null) {
				foreach($this->collFcdeffuns as $referrerFK) {
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


			if (($retval = FcdefuniadmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcdeffuns !== null) {
					foreach($this->collFcdeffuns as $referrerFK) {
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
		$pos = FcdefuniadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduniadm();
				break;
			case 1:
				return $this->getNomuniadm();
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
		$keys = FcdefuniadmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduniadm(),
			$keys[1] => $this->getNomuniadm(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefuniadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduniadm($value);
				break;
			case 1:
				$this->setNomuniadm($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefuniadmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduniadm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomuniadm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefuniadmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefuniadmPeer::CODUNIADM)) $criteria->add(FcdefuniadmPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(FcdefuniadmPeer::NOMUNIADM)) $criteria->add(FcdefuniadmPeer::NOMUNIADM, $this->nomuniadm);
		if ($this->isColumnModified(FcdefuniadmPeer::ID)) $criteria->add(FcdefuniadmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefuniadmPeer::DATABASE_NAME);

		$criteria->add(FcdefuniadmPeer::CODUNIADM, $this->coduniadm);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCoduniadm();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCoduniadm($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomuniadm($this->nomuniadm);

		$copyObj->setId($this->id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcdeffuns() as $relObj) {
				$copyObj->addFcdeffun($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setCoduniadm(NULL); 
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
			self::$peer = new FcdefuniadmPeer();
		}
		return self::$peer;
	}

	
	public function initFcdeffuns()
	{
		if ($this->collFcdeffuns === null) {
			$this->collFcdeffuns = array();
		}
	}

	
	public function getFcdeffuns($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcdeffunPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdeffuns === null) {
			if ($this->isNew()) {
			   $this->collFcdeffuns = array();
			} else {

				$criteria->add(FcdeffunPeer::CODUNIADM, $this->getCoduniadm());

				FcdeffunPeer::addSelectColumns($criteria);
				$this->collFcdeffuns = FcdeffunPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcdeffunPeer::CODUNIADM, $this->getCoduniadm());

				FcdeffunPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcdeffunCriteria) || !$this->lastFcdeffunCriteria->equals($criteria)) {
					$this->collFcdeffuns = FcdeffunPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcdeffunCriteria = $criteria;
		return $this->collFcdeffuns;
	}

	
	public function countFcdeffuns($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcdeffunPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcdeffunPeer::CODUNIADM, $this->getCoduniadm());

		return FcdeffunPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcdeffun(Fcdeffun $l)
	{
		$this->collFcdeffuns[] = $l;
		$l->setFcdefuniadm($this);
	}

} 