<?php


abstract class BaseDfrutadoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_acunidad;


	
	protected $tipdoc;


	
	protected $rutdoc;


	
	protected $diadoc;

	
	protected $aAcunidad;

	
	protected $collDfatendocdefs;

	
	protected $lastDfatendocdefCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdAcunidad()
	{

		return $this->id_acunidad;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getRutdoc()
	{

		return $this->rutdoc;
	}

	
	public function getDiadoc()
	{

		return $this->diadoc;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DfrutadocPeer::ID;
		}

	} 
	
	public function setIdAcunidad($v)
	{

		if ($this->id_acunidad !== $v) {
			$this->id_acunidad = $v;
			$this->modifiedColumns[] = DfrutadocPeer::ID_ACUNIDAD;
		}

		if ($this->aAcunidad !== null && $this->aAcunidad->getId() !== $v) {
			$this->aAcunidad = null;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = DfrutadocPeer::TIPDOC;
		}

	} 
	
	public function setRutdoc($v)
	{

		if ($this->rutdoc !== $v) {
			$this->rutdoc = $v;
			$this->modifiedColumns[] = DfrutadocPeer::RUTDOC;
		}

	} 
	
	public function setDiadoc($v)
	{

		if ($this->diadoc !== $v) {
			$this->diadoc = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIADOC;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_acunidad = $rs->getInt($startcol + 1);

			$this->tipdoc = $rs->getString($startcol + 2);

			$this->rutdoc = $rs->getInt($startcol + 3);

			$this->diadoc = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dfrutadoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfrutadocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
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


												
			if ($this->aAcunidad !== null) {
				if ($this->aAcunidad->isModified()) {
					$affectedRows += $this->aAcunidad->save($con);
				}
				$this->setAcunidad($this->aAcunidad);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfrutadocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DfrutadocPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocdefs !== null) {
				foreach($this->collDfatendocdefs as $referrerFK) {
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


												
			if ($this->aAcunidad !== null) {
				if (!$this->aAcunidad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAcunidad->getValidationFailures());
				}
			}


			if (($retval = DfrutadocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocdefs !== null) {
					foreach($this->collDfatendocdefs as $referrerFK) {
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
		$pos = DfrutadocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdAcunidad();
				break;
			case 2:
				return $this->getTipdoc();
				break;
			case 3:
				return $this->getRutdoc();
				break;
			case 4:
				return $this->getDiadoc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfrutadocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdAcunidad(),
			$keys[2] => $this->getTipdoc(),
			$keys[3] => $this->getRutdoc(),
			$keys[4] => $this->getDiadoc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfrutadocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdAcunidad($value);
				break;
			case 2:
				$this->setTipdoc($value);
				break;
			case 3:
				$this->setRutdoc($value);
				break;
			case 4:
				$this->setDiadoc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfrutadocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdAcunidad($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipdoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRutdoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiadoc($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfrutadocPeer::ID)) $criteria->add(DfrutadocPeer::ID, $this->id);
		if ($this->isColumnModified(DfrutadocPeer::ID_ACUNIDAD)) $criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->id_acunidad);
		if ($this->isColumnModified(DfrutadocPeer::TIPDOC)) $criteria->add(DfrutadocPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(DfrutadocPeer::RUTDOC)) $criteria->add(DfrutadocPeer::RUTDOC, $this->rutdoc);
		if ($this->isColumnModified(DfrutadocPeer::DIADOC)) $criteria->add(DfrutadocPeer::DIADOC, $this->diadoc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		$criteria->add(DfrutadocPeer::ID, $this->id);

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

		$copyObj->setIdAcunidad($this->id_acunidad);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setRutdoc($this->rutdoc);

		$copyObj->setDiadoc($this->diadoc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocdefs() as $relObj) {
				$copyObj->addDfatendocdef($relObj->copy($deepCopy));
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
			self::$peer = new DfrutadocPeer();
		}
		return self::$peer;
	}

	
	public function setAcunidad($v)
	{


		if ($v === null) {
			$this->setIdAcunidad(NULL);
		} else {
			$this->setIdAcunidad($v->getId());
		}


		$this->aAcunidad = $v;
	}


	
	public function getAcunidad($con = null)
	{
				include_once 'lib/model/om/BaseAcunidadPeer.php';

		if ($this->aAcunidad === null && ($this->id_acunidad !== null)) {

			$this->aAcunidad = AcunidadPeer::retrieveByPK($this->id_acunidad, $con);

			
		}
		return $this->aAcunidad;
	}

	
	public function initDfatendocdefs()
	{
		if ($this->collDfatendocdefs === null) {
			$this->collDfatendocdefs = array();
		}
	}

	
	public function getDfatendocdefs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefs === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdefs = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				$this->collDfatendocdefs = DfatendocdefPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdefCriteria) || !$this->lastDfatendocdefCriteria->equals($criteria)) {
					$this->collDfatendocdefs = DfatendocdefPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdefCriteria = $criteria;
		return $this->collDfatendocdefs;
	}

	
	public function countDfatendocdefs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

		return DfatendocdefPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdef(Dfatendocdef $l)
	{
		$this->collDfatendocdefs[] = $l;
		$l->setDfrutadoc($this);
	}


	
	public function getDfatendocdefsJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefs === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefs = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

			if (!isset($this->lastDfatendocdefCriteria) || !$this->lastDfatendocdefCriteria->equals($criteria)) {
				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdefCriteria = $criteria;

		return $this->collDfatendocdefs;
	}


	
	public function getDfatendocdefsJoinAcunidadRelatedByIdNumuni($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefs === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefs = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuni($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

			if (!isset($this->lastDfatendocdefCriteria) || !$this->lastDfatendocdefCriteria->equals($criteria)) {
				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuni($criteria, $con);
			}
		}
		$this->lastDfatendocdefCriteria = $criteria;

		return $this->collDfatendocdefs;
	}


	
	public function getDfatendocdefsJoinAcunidadRelatedByIdNumuniori($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdefPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdefs === null) {
			if ($this->isNew()) {
				$this->collDfatendocdefs = array();
			} else {

				$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuniori($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->getId());

			if (!isset($this->lastDfatendocdefCriteria) || !$this->lastDfatendocdefCriteria->equals($criteria)) {
				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuniori($criteria, $con);
			}
		}
		$this->lastDfatendocdefCriteria = $criteria;

		return $this->collDfatendocdefs;
	}

} 