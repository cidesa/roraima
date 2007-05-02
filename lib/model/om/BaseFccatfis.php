<?php


abstract class BaseFccatfis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcatfis;


	
	protected $nomcatfis;


	
	protected $linnor;


	
	protected $linsur;


	
	protected $linest;


	
	protected $linoes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcatfis()
	{

		return $this->codcatfis;
	}

	
	public function getNomcatfis()
	{

		return $this->nomcatfis;
	}

	
	public function getLinnor()
	{

		return $this->linnor;
	}

	
	public function getLinsur()
	{

		return $this->linsur;
	}

	
	public function getLinest()
	{

		return $this->linest;
	}

	
	public function getLinoes()
	{

		return $this->linoes;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcatfis($v)
	{

		if ($this->codcatfis !== $v) {
			$this->codcatfis = $v;
			$this->modifiedColumns[] = FccatfisPeer::CODCATFIS;
		}

	} 
	
	public function setNomcatfis($v)
	{

		if ($this->nomcatfis !== $v) {
			$this->nomcatfis = $v;
			$this->modifiedColumns[] = FccatfisPeer::NOMCATFIS;
		}

	} 
	
	public function setLinnor($v)
	{

		if ($this->linnor !== $v) {
			$this->linnor = $v;
			$this->modifiedColumns[] = FccatfisPeer::LINNOR;
		}

	} 
	
	public function setLinsur($v)
	{

		if ($this->linsur !== $v) {
			$this->linsur = $v;
			$this->modifiedColumns[] = FccatfisPeer::LINSUR;
		}

	} 
	
	public function setLinest($v)
	{

		if ($this->linest !== $v) {
			$this->linest = $v;
			$this->modifiedColumns[] = FccatfisPeer::LINEST;
		}

	} 
	
	public function setLinoes($v)
	{

		if ($this->linoes !== $v) {
			$this->linoes = $v;
			$this->modifiedColumns[] = FccatfisPeer::LINOES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FccatfisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcatfis = $rs->getString($startcol + 0);

			$this->nomcatfis = $rs->getString($startcol + 1);

			$this->linnor = $rs->getString($startcol + 2);

			$this->linsur = $rs->getString($startcol + 3);

			$this->linest = $rs->getString($startcol + 4);

			$this->linoes = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fccatfis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FccatfisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FccatfisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FccatfisPeer::DATABASE_NAME);
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
					$pk = FccatfisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FccatfisPeer::doUpdate($this, $con);
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


			if (($retval = FccatfisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccatfisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcatfis();
				break;
			case 1:
				return $this->getNomcatfis();
				break;
			case 2:
				return $this->getLinnor();
				break;
			case 3:
				return $this->getLinsur();
				break;
			case 4:
				return $this->getLinest();
				break;
			case 5:
				return $this->getLinoes();
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
		$keys = FccatfisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcatfis(),
			$keys[1] => $this->getNomcatfis(),
			$keys[2] => $this->getLinnor(),
			$keys[3] => $this->getLinsur(),
			$keys[4] => $this->getLinest(),
			$keys[5] => $this->getLinoes(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccatfisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcatfis($value);
				break;
			case 1:
				$this->setNomcatfis($value);
				break;
			case 2:
				$this->setLinnor($value);
				break;
			case 3:
				$this->setLinsur($value);
				break;
			case 4:
				$this->setLinest($value);
				break;
			case 5:
				$this->setLinoes($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FccatfisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcatfis($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcatfis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLinnor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLinsur($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLinest($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLinoes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FccatfisPeer::DATABASE_NAME);

		if ($this->isColumnModified(FccatfisPeer::CODCATFIS)) $criteria->add(FccatfisPeer::CODCATFIS, $this->codcatfis);
		if ($this->isColumnModified(FccatfisPeer::NOMCATFIS)) $criteria->add(FccatfisPeer::NOMCATFIS, $this->nomcatfis);
		if ($this->isColumnModified(FccatfisPeer::LINNOR)) $criteria->add(FccatfisPeer::LINNOR, $this->linnor);
		if ($this->isColumnModified(FccatfisPeer::LINSUR)) $criteria->add(FccatfisPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(FccatfisPeer::LINEST)) $criteria->add(FccatfisPeer::LINEST, $this->linest);
		if ($this->isColumnModified(FccatfisPeer::LINOES)) $criteria->add(FccatfisPeer::LINOES, $this->linoes);
		if ($this->isColumnModified(FccatfisPeer::ID)) $criteria->add(FccatfisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FccatfisPeer::DATABASE_NAME);

		$criteria->add(FccatfisPeer::CODCATFIS, $this->codcatfis);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCodcatfis();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCodcatfis($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomcatfis($this->nomcatfis);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLinest($this->linest);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCodcatfis(NULL); 
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
			self::$peer = new FccatfisPeer();
		}
		return self::$peer;
	}

} 