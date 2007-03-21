<?php


abstract class BaseTsdefchequera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codchq;


	
	protected $numche;


	
	protected $numcue;


	
	protected $numchedes;


	
	protected $numchehas;


	
	protected $activa;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodchq()
	{

		return $this->codchq;
	}

	
	public function getNumche()
	{

		return $this->numche;
	}

	
	public function getNumcue()
	{

		return $this->numcue;
	}

	
	public function getNumchedes()
	{

		return $this->numchedes;
	}

	
	public function getNumchehas()
	{

		return $this->numchehas;
	}

	
	public function getActiva()
	{

		return $this->activa;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodchq($v)
	{

		if ($this->codchq !== $v) {
			$this->codchq = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::CODCHQ;
		}

	} 
	
	public function setNumche($v)
	{

		if ($this->numche !== $v) {
			$this->numche = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::NUMCHE;
		}

	} 
	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::NUMCUE;
		}

	} 
	
	public function setNumchedes($v)
	{

		if ($this->numchedes !== $v) {
			$this->numchedes = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::NUMCHEDES;
		}

	} 
	
	public function setNumchehas($v)
	{

		if ($this->numchehas !== $v) {
			$this->numchehas = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::NUMCHEHAS;
		}

	} 
	
	public function setActiva($v)
	{

		if ($this->activa !== $v) {
			$this->activa = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::ACTIVA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsdefchequeraPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codchq = $rs->getString($startcol + 0);

			$this->numche = $rs->getString($startcol + 1);

			$this->numcue = $rs->getString($startcol + 2);

			$this->numchedes = $rs->getString($startcol + 3);

			$this->numchehas = $rs->getString($startcol + 4);

			$this->activa = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsdefchequera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefchequeraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefchequeraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdefchequeraPeer::DATABASE_NAME);
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
					$pk = TsdefchequeraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsdefchequeraPeer::doUpdate($this, $con);
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


			if (($retval = TsdefchequeraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefchequeraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodchq();
				break;
			case 1:
				return $this->getNumche();
				break;
			case 2:
				return $this->getNumcue();
				break;
			case 3:
				return $this->getNumchedes();
				break;
			case 4:
				return $this->getNumchehas();
				break;
			case 5:
				return $this->getActiva();
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
		$keys = TsdefchequeraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodchq(),
			$keys[1] => $this->getNumche(),
			$keys[2] => $this->getNumcue(),
			$keys[3] => $this->getNumchedes(),
			$keys[4] => $this->getNumchehas(),
			$keys[5] => $this->getActiva(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefchequeraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodchq($value);
				break;
			case 1:
				$this->setNumche($value);
				break;
			case 2:
				$this->setNumcue($value);
				break;
			case 3:
				$this->setNumchedes($value);
				break;
			case 4:
				$this->setNumchehas($value);
				break;
			case 5:
				$this->setActiva($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefchequeraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodchq($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumche($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumchedes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumchehas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActiva($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefchequeraPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefchequeraPeer::CODCHQ)) $criteria->add(TsdefchequeraPeer::CODCHQ, $this->codchq);
		if ($this->isColumnModified(TsdefchequeraPeer::NUMCHE)) $criteria->add(TsdefchequeraPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TsdefchequeraPeer::NUMCUE)) $criteria->add(TsdefchequeraPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsdefchequeraPeer::NUMCHEDES)) $criteria->add(TsdefchequeraPeer::NUMCHEDES, $this->numchedes);
		if ($this->isColumnModified(TsdefchequeraPeer::NUMCHEHAS)) $criteria->add(TsdefchequeraPeer::NUMCHEHAS, $this->numchehas);
		if ($this->isColumnModified(TsdefchequeraPeer::ACTIVA)) $criteria->add(TsdefchequeraPeer::ACTIVA, $this->activa);
		if ($this->isColumnModified(TsdefchequeraPeer::ID)) $criteria->add(TsdefchequeraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefchequeraPeer::DATABASE_NAME);

		$criteria->add(TsdefchequeraPeer::ID, $this->id);

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

		$copyObj->setCodchq($this->codchq);

		$copyObj->setNumche($this->numche);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setNumchedes($this->numchedes);

		$copyObj->setNumchehas($this->numchehas);

		$copyObj->setActiva($this->activa);


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
			self::$peer = new TsdefchequeraPeer();
		}
		return self::$peer;
	}

} 