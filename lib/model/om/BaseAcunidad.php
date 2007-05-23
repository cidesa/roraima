<?php


abstract class BaseAcunidad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomuni;


	
	protected $desuni;


	
	protected $id;

	
	protected $collDfrutadocs;

	
	protected $lastDfrutadocCriteria = null;

	
	protected $collDfatendocdefsRelatedByIdNumuni;

	
	protected $lastDfatendocdefRelatedByIdNumuniCriteria = null;

	
	protected $collDfatendocdefsRelatedByIdNumuniori;

	
	protected $lastDfatendocdefRelatedByIdNumunioriCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNomuni()
	{

		return $this->nomuni;
	}

	
	public function getDesuni()
	{

		return $this->desuni;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNomuni($v)
	{

		if ($this->nomuni !== $v) {
			$this->nomuni = $v;
			$this->modifiedColumns[] = AcunidadPeer::NOMUNI;
		}

	} 
	
	public function setDesuni($v)
	{

		if ($this->desuni !== $v) {
			$this->desuni = $v;
			$this->modifiedColumns[] = AcunidadPeer::DESUNI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AcunidadPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nomuni = $rs->getString($startcol + 0);

			$this->desuni = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Acunidad object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AcunidadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AcunidadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AcunidadPeer::DATABASE_NAME);
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
					$pk = AcunidadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AcunidadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfrutadocs !== null) {
				foreach($this->collDfrutadocs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDfatendocdefsRelatedByIdNumuni !== null) {
				foreach($this->collDfatendocdefsRelatedByIdNumuni as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDfatendocdefsRelatedByIdNumuniori !== null) {
				foreach($this->collDfatendocdefsRelatedByIdNumuniori as $referrerFK) {
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


			if (($retval = AcunidadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfrutadocs !== null) {
					foreach($this->collDfrutadocs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDfatendocdefsRelatedByIdNumuni !== null) {
					foreach($this->collDfatendocdefsRelatedByIdNumuni as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDfatendocdefsRelatedByIdNumuniori !== null) {
					foreach($this->collDfatendocdefsRelatedByIdNumuniori as $referrerFK) {
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
		$pos = AcunidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomuni();
				break;
			case 1:
				return $this->getDesuni();
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
		$keys = AcunidadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomuni(),
			$keys[1] => $this->getDesuni(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcunidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomuni($value);
				break;
			case 1:
				$this->setDesuni($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcunidadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomuni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AcunidadPeer::DATABASE_NAME);

		if ($this->isColumnModified(AcunidadPeer::NOMUNI)) $criteria->add(AcunidadPeer::NOMUNI, $this->nomuni);
		if ($this->isColumnModified(AcunidadPeer::DESUNI)) $criteria->add(AcunidadPeer::DESUNI, $this->desuni);
		if ($this->isColumnModified(AcunidadPeer::ID)) $criteria->add(AcunidadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AcunidadPeer::DATABASE_NAME);

		$criteria->add(AcunidadPeer::ID, $this->id);

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

		$copyObj->setNomuni($this->nomuni);

		$copyObj->setDesuni($this->desuni);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfrutadocs() as $relObj) {
				$copyObj->addDfrutadoc($relObj->copy($deepCopy));
			}

			foreach($this->getDfatendocdefsRelatedByIdNumuni() as $relObj) {
				$copyObj->addDfatendocdefRelatedByIdNumuni($relObj->copy($deepCopy));
			}

			foreach($this->getDfatendocdefsRelatedByIdNumuniori() as $relObj) {
				$copyObj->addDfatendocdefRelatedByIdNumuniori($relObj->copy($deepCopy));
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
			self::$peer = new AcunidadPeer();
		}
		return self::$peer;
	}

	
	public function initDfrutadocs()
	{
		if ($this->collDfrutadocs === null) {
			$this->collDfrutadocs = array();
		}
	}

	
	public function getDfrutadocs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
			   $this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
					$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfrutadocCriteria = $criteria;
		return $this->collDfrutadocs;
	}

	
	public function countDfrutadocs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

		return DfrutadocPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfrutadoc(Dfrutadoc $l)
	{
		$this->collDfrutadocs[] = $l;
		$l->setAcunidad($this);
	}

	
	public function initDfatendocdefsRelatedByIdNumuni()
	{
		if ($this->collDfatendocdefsRelatedByIdNumuni === null) {
			$this->collDfatendocdefsRelatedByIdNumuni = array();
		}
	}

	
	public function getDfatendocdefsRelatedByIdNumuni($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefsRelatedByIdNumuni === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdefsRelatedByIdNumuni = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				$this->collDfatendocdefsRelatedByIdNumuni = DfatendocdefPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdefRelatedByIdNumuniCriteria) || !$this->lastDfatendocdefRelatedByIdNumuniCriteria->equals($criteria)) {
					$this->collDfatendocdefsRelatedByIdNumuni = DfatendocdefPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdefRelatedByIdNumuniCriteria = $criteria;
		return $this->collDfatendocdefsRelatedByIdNumuni;
	}

	
	public function countDfatendocdefsRelatedByIdNumuni($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

		return DfatendocdefPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdefRelatedByIdNumuni(Dfatendocdef $l)
	{
		$this->collDfatendocdefsRelatedByIdNumuni[] = $l;
		$l->setAcunidadRelatedByIdNumuni($this);
	}


	
	public function getDfatendocdefsRelatedByIdNumuniJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefsRelatedByIdNumuni === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefsRelatedByIdNumuni = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

				$this->collDfatendocdefsRelatedByIdNumuni = DfatendocdefPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

			if (!isset($this->lastDfatendocdefRelatedByIdNumuniCriteria) || !$this->lastDfatendocdefRelatedByIdNumuniCriteria->equals($criteria)) {
				$this->collDfatendocdefsRelatedByIdNumuni = DfatendocdefPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdefRelatedByIdNumuniCriteria = $criteria;

		return $this->collDfatendocdefsRelatedByIdNumuni;
	}


	
	public function getDfatendocdefsRelatedByIdNumuniJoinDfrutadoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefsRelatedByIdNumuni === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefsRelatedByIdNumuni = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

				$this->collDfatendocdefsRelatedByIdNumuni = DfatendocdefPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->getId());

			if (!isset($this->lastDfatendocdefRelatedByIdNumuniCriteria) || !$this->lastDfatendocdefRelatedByIdNumuniCriteria->equals($criteria)) {
				$this->collDfatendocdefsRelatedByIdNumuni = DfatendocdefPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		}
		$this->lastDfatendocdefRelatedByIdNumuniCriteria = $criteria;

		return $this->collDfatendocdefsRelatedByIdNumuni;
	}

	
	public function initDfatendocdefsRelatedByIdNumuniori()
	{
		if ($this->collDfatendocdefsRelatedByIdNumuniori === null) {
			$this->collDfatendocdefsRelatedByIdNumuniori = array();
		}
	}

	
	public function getDfatendocdefsRelatedByIdNumuniori($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefsRelatedByIdNumuniori === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdefsRelatedByIdNumuniori = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				$this->collDfatendocdefsRelatedByIdNumuniori = DfatendocdefPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdefRelatedByIdNumunioriCriteria) || !$this->lastDfatendocdefRelatedByIdNumunioriCriteria->equals($criteria)) {
					$this->collDfatendocdefsRelatedByIdNumuniori = DfatendocdefPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdefRelatedByIdNumunioriCriteria = $criteria;
		return $this->collDfatendocdefsRelatedByIdNumuniori;
	}

	
	public function countDfatendocdefsRelatedByIdNumuniori($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

		return DfatendocdefPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdefRelatedByIdNumuniori(Dfatendocdef $l)
	{
		$this->collDfatendocdefsRelatedByIdNumuniori[] = $l;
		$l->setAcunidadRelatedByIdNumuniori($this);
	}


	
	public function getDfatendocdefsRelatedByIdNumunioriJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefsRelatedByIdNumuniori === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefsRelatedByIdNumuniori = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

				$this->collDfatendocdefsRelatedByIdNumuniori = DfatendocdefPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

			if (!isset($this->lastDfatendocdefRelatedByIdNumunioriCriteria) || !$this->lastDfatendocdefRelatedByIdNumunioriCriteria->equals($criteria)) {
				$this->collDfatendocdefsRelatedByIdNumuniori = DfatendocdefPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdefRelatedByIdNumunioriCriteria = $criteria;

		return $this->collDfatendocdefsRelatedByIdNumuniori;
	}


	
	public function getDfatendocdefsRelatedByIdNumunioriJoinDfrutadoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefsRelatedByIdNumuniori === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefsRelatedByIdNumuniori = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

				$this->collDfatendocdefsRelatedByIdNumuniori = DfatendocdefPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->getId());

			if (!isset($this->lastDfatendocdefRelatedByIdNumunioriCriteria) || !$this->lastDfatendocdefRelatedByIdNumunioriCriteria->equals($criteria)) {
				$this->collDfatendocdefsRelatedByIdNumuniori = DfatendocdefPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		}
		$this->lastDfatendocdefRelatedByIdNumunioriCriteria = $criteria;

		return $this->collDfatendocdefsRelatedByIdNumuniori;
	}

} 