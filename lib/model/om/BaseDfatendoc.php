<?php


abstract class BaseDfatendoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddoc;


	
	protected $obsdoc;


	
	protected $staate;


	
	protected $id_dftabtip;


	
	protected $anuate;


	
	protected $estado;


	
	protected $id;

	
	protected $aDftabtip;

	
	protected $collDfatendocdefs;

	
	protected $lastDfatendocdefCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddoc()
	{

		return $this->coddoc;
	}

	
	public function getObsdoc()
	{

		return $this->obsdoc;
	}

	
	public function getStaate()
	{

		return $this->staate;
	}

	
	public function getIdDftabtip()
	{

		return $this->id_dftabtip;
	}

	
	public function getAnuate()
	{

		return $this->anuate;
	}

	
	public function getEstado()
	{

		return $this->estado;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoddoc($v)
	{

		if ($this->coddoc !== $v) {
			$this->coddoc = $v;
			$this->modifiedColumns[] = DfatendocPeer::CODDOC;
		}

	} 
	
	public function setObsdoc($v)
	{

		if ($this->obsdoc !== $v) {
			$this->obsdoc = $v;
			$this->modifiedColumns[] = DfatendocPeer::OBSDOC;
		}

	} 
	
	public function setStaate($v)
	{

		if ($this->staate !== $v) {
			$this->staate = $v;
			$this->modifiedColumns[] = DfatendocPeer::STAATE;
		}

	} 
	
	public function setIdDftabtip($v)
	{

		if ($this->id_dftabtip !== $v) {
			$this->id_dftabtip = $v;
			$this->modifiedColumns[] = DfatendocPeer::ID_DFTABTIP;
		}

		if ($this->aDftabtip !== null && $this->aDftabtip->getId() !== $v) {
			$this->aDftabtip = null;
		}

	} 
	
	public function setAnuate($v)
	{

		if ($this->anuate !== $v) {
			$this->anuate = $v;
			$this->modifiedColumns[] = DfatendocPeer::ANUATE;
		}

	} 
	
	public function setEstado($v)
	{

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = DfatendocPeer::ESTADO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DfatendocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddoc = $rs->getString($startcol + 0);

			$this->obsdoc = $rs->getString($startcol + 1);

			$this->staate = $rs->getString($startcol + 2);

			$this->id_dftabtip = $rs->getInt($startcol + 3);

			$this->anuate = $rs->getInt($startcol + 4);

			$this->estado = $rs->getInt($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dfatendoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfatendocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
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


												
			if ($this->aDftabtip !== null) {
				if ($this->aDftabtip->isModified()) {
					$affectedRows += $this->aDftabtip->save($con);
				}
				$this->setDftabtip($this->aDftabtip);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfatendocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DfatendocPeer::doUpdate($this, $con);
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


												
			if ($this->aDftabtip !== null) {
				if (!$this->aDftabtip->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDftabtip->getValidationFailures());
				}
			}


			if (($retval = DfatendocPeer::doValidate($this, $columns)) !== true) {
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
		$pos = DfatendocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddoc();
				break;
			case 1:
				return $this->getObsdoc();
				break;
			case 2:
				return $this->getStaate();
				break;
			case 3:
				return $this->getIdDftabtip();
				break;
			case 4:
				return $this->getAnuate();
				break;
			case 5:
				return $this->getEstado();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddoc(),
			$keys[1] => $this->getObsdoc(),
			$keys[2] => $this->getStaate(),
			$keys[3] => $this->getIdDftabtip(),
			$keys[4] => $this->getAnuate(),
			$keys[5] => $this->getEstado(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddoc($value);
				break;
			case 1:
				$this->setObsdoc($value);
				break;
			case 2:
				$this->setStaate($value);
				break;
			case 3:
				$this->setIdDftabtip($value);
				break;
			case 4:
				$this->setAnuate($value);
				break;
			case 5:
				$this->setEstado($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObsdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStaate($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdDftabtip($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnuate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfatendocPeer::CODDOC)) $criteria->add(DfatendocPeer::CODDOC, $this->coddoc);
		if ($this->isColumnModified(DfatendocPeer::OBSDOC)) $criteria->add(DfatendocPeer::OBSDOC, $this->obsdoc);
		if ($this->isColumnModified(DfatendocPeer::STAATE)) $criteria->add(DfatendocPeer::STAATE, $this->staate);
		if ($this->isColumnModified(DfatendocPeer::ID_DFTABTIP)) $criteria->add(DfatendocPeer::ID_DFTABTIP, $this->id_dftabtip);
		if ($this->isColumnModified(DfatendocPeer::ANUATE)) $criteria->add(DfatendocPeer::ANUATE, $this->anuate);
		if ($this->isColumnModified(DfatendocPeer::ESTADO)) $criteria->add(DfatendocPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(DfatendocPeer::ID)) $criteria->add(DfatendocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		$criteria->add(DfatendocPeer::ID, $this->id);

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

		$copyObj->setCoddoc($this->coddoc);

		$copyObj->setObsdoc($this->obsdoc);

		$copyObj->setStaate($this->staate);

		$copyObj->setIdDftabtip($this->id_dftabtip);

		$copyObj->setAnuate($this->anuate);

		$copyObj->setEstado($this->estado);


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
			self::$peer = new DfatendocPeer();
		}
		return self::$peer;
	}

	
	public function setDftabtip($v)
	{


		if ($v === null) {
			$this->setIdDftabtip(NULL);
		} else {
			$this->setIdDftabtip($v->getId());
		}


		$this->aDftabtip = $v;
	}


	
	public function getDftabtip($con = null)
	{
				include_once 'lib/model/om/BaseDftabtipPeer.php';

		if ($this->aDftabtip === null && ($this->id_dftabtip !== null)) {

			$this->aDftabtip = DftabtipPeer::retrieveByPK($this->id_dftabtip, $con);

			
		}
		return $this->aDftabtip;
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

				$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

				DfatendocdefPeer::addSelectColumns($criteria);
				$this->collDfatendocdefs = DfatendocdefPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

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

		$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

		return DfatendocdefPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdef(Dfatendocdef $l)
	{
		$this->collDfatendocdefs[] = $l;
		$l->setDfatendoc($this);
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

				$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuni($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

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

				$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuniori($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

			if (!isset($this->lastDfatendocdefCriteria) || !$this->lastDfatendocdefCriteria->equals($criteria)) {
				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinAcunidadRelatedByIdNumuniori($criteria, $con);
			}
		}
		$this->lastDfatendocdefCriteria = $criteria;

		return $this->collDfatendocdefs;
	}


	
	public function getDfatendocdefsJoinDfrutadoc($criteria = null, $con = null)
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

				$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->getId());

			if (!isset($this->lastDfatendocdefCriteria) || !$this->lastDfatendocdefCriteria->equals($criteria)) {
				$this->collDfatendocdefs = DfatendocdefPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		}
		$this->lastDfatendocdefCriteria = $criteria;

		return $this->collDfatendocdefs;
	}

} 