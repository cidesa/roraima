<?php


abstract class BaseOctartip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $exppro;


	
	protected $valhor;


	
	protected $numniv;


	
	protected $codtippro;


	
	protected $nivpro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getExppro()
	{

		return $this->exppro;
	}

	
	public function getValhor()
	{

		return $this->valhor;
	}

	
	public function getNumniv()
	{

		return $this->numniv;
	}

	
	public function getCodtippro()
	{

		return $this->codtippro;
	}

	
	public function getNivpro()
	{

		return $this->nivpro;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setExppro($v)
	{

		if ($this->exppro !== $v) {
			$this->exppro = $v;
			$this->modifiedColumns[] = OctartipPeer::EXPPRO;
		}

	} 
	
	public function setValhor($v)
	{

		if ($this->valhor !== $v) {
			$this->valhor = $v;
			$this->modifiedColumns[] = OctartipPeer::VALHOR;
		}

	} 
	
	public function setNumniv($v)
	{

		if ($this->numniv !== $v) {
			$this->numniv = $v;
			$this->modifiedColumns[] = OctartipPeer::NUMNIV;
		}

	} 
	
	public function setCodtippro($v)
	{

		if ($this->codtippro !== $v) {
			$this->codtippro = $v;
			$this->modifiedColumns[] = OctartipPeer::CODTIPPRO;
		}

	} 
	
	public function setNivpro($v)
	{

		if ($this->nivpro !== $v) {
			$this->nivpro = $v;
			$this->modifiedColumns[] = OctartipPeer::NIVPRO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OctartipPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->exppro = $rs->getFloat($startcol + 0);

			$this->valhor = $rs->getFloat($startcol + 1);

			$this->numniv = $rs->getFloat($startcol + 2);

			$this->codtippro = $rs->getString($startcol + 3);

			$this->nivpro = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Octartip object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OctartipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OctartipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OctartipPeer::DATABASE_NAME);
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
					$pk = OctartipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OctartipPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = OctartipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctartipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getExppro();
				break;
			case 1:
				return $this->getValhor();
				break;
			case 2:
				return $this->getNumniv();
				break;
			case 3:
				return $this->getCodtippro();
				break;
			case 4:
				return $this->getNivpro();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctartipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getExppro(),
			$keys[1] => $this->getValhor(),
			$keys[2] => $this->getNumniv(),
			$keys[3] => $this->getCodtippro(),
			$keys[4] => $this->getNivpro(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctartipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setExppro($value);
				break;
			case 1:
				$this->setValhor($value);
				break;
			case 2:
				$this->setNumniv($value);
				break;
			case 3:
				$this->setCodtippro($value);
				break;
			case 4:
				$this->setNivpro($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctartipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setExppro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setValhor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumniv($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtippro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNivpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OctartipPeer::DATABASE_NAME);

		if ($this->isColumnModified(OctartipPeer::EXPPRO)) $criteria->add(OctartipPeer::EXPPRO, $this->exppro);
		if ($this->isColumnModified(OctartipPeer::VALHOR)) $criteria->add(OctartipPeer::VALHOR, $this->valhor);
		if ($this->isColumnModified(OctartipPeer::NUMNIV)) $criteria->add(OctartipPeer::NUMNIV, $this->numniv);
		if ($this->isColumnModified(OctartipPeer::CODTIPPRO)) $criteria->add(OctartipPeer::CODTIPPRO, $this->codtippro);
		if ($this->isColumnModified(OctartipPeer::NIVPRO)) $criteria->add(OctartipPeer::NIVPRO, $this->nivpro);
		if ($this->isColumnModified(OctartipPeer::ID)) $criteria->add(OctartipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OctartipPeer::DATABASE_NAME);

		$criteria->add(OctartipPeer::ID, $this->id);

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

		$copyObj->setExppro($this->exppro);

		$copyObj->setValhor($this->valhor);

		$copyObj->setNumniv($this->numniv);

		$copyObj->setCodtippro($this->codtippro);

		$copyObj->setNivpro($this->nivpro);


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
			self::$peer = new OctartipPeer();
		}
		return self::$peer;
	}

} 