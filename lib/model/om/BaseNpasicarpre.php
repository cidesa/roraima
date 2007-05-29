<?php


abstract class BaseNpasicarpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codcar;


	
	protected $canpre;


	
	protected $canasi;


	
	protected $monpre;


	
	protected $monasi;


	
	protected $codniv;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getCanpre()
	{

		return number_format($this->canpre,2,',','.');
		
	}
	
	public function getCanasi()
	{

		return number_format($this->canasi,2,',','.');
		
	}
	
	public function getMonpre()
	{

		return number_format($this->monpre,2,',','.');
		
	}
	
	public function getMonasi()
	{

		return number_format($this->monasi,2,',','.');
		
	}
	
	public function getCodniv()
	{

		return $this->codniv; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = NpasicarprePeer::CODCAT;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpasicarprePeer::CODCAR;
		}

	} 
	
	public function setCanpre($v)
	{

		if ($this->canpre !== $v) {
			$this->canpre = $v;
			$this->modifiedColumns[] = NpasicarprePeer::CANPRE;
		}

	} 
	
	public function setCanasi($v)
	{

		if ($this->canasi !== $v) {
			$this->canasi = $v;
			$this->modifiedColumns[] = NpasicarprePeer::CANASI;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = NpasicarprePeer::MONPRE;
		}

	} 
	
	public function setMonasi($v)
	{

		if ($this->monasi !== $v) {
			$this->monasi = $v;
			$this->modifiedColumns[] = NpasicarprePeer::MONASI;
		}

	} 
	
	public function setCodniv($v)
	{

		if ($this->codniv !== $v) {
			$this->codniv = $v;
			$this->modifiedColumns[] = NpasicarprePeer::CODNIV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpasicarprePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcat = $rs->getString($startcol + 0);

			$this->codcar = $rs->getString($startcol + 1);

			$this->canpre = $rs->getFloat($startcol + 2);

			$this->canasi = $rs->getFloat($startcol + 3);

			$this->monpre = $rs->getFloat($startcol + 4);

			$this->monasi = $rs->getFloat($startcol + 5);

			$this->codniv = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npasicarpre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpasicarprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasicarprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasicarprePeer::DATABASE_NAME);
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
					$pk = NpasicarprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpasicarprePeer::doUpdate($this, $con);
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


			if (($retval = NpasicarprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasicarprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCanpre();
				break;
			case 3:
				return $this->getCanasi();
				break;
			case 4:
				return $this->getMonpre();
				break;
			case 5:
				return $this->getMonasi();
				break;
			case 6:
				return $this->getCodniv();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasicarprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCanpre(),
			$keys[3] => $this->getCanasi(),
			$keys[4] => $this->getMonpre(),
			$keys[5] => $this->getMonasi(),
			$keys[6] => $this->getCodniv(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasicarprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCanpre($value);
				break;
			case 3:
				$this->setCanasi($value);
				break;
			case 4:
				$this->setMonpre($value);
				break;
			case 5:
				$this->setMonasi($value);
				break;
			case 6:
				$this->setCodniv($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasicarprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanasi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonasi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodniv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasicarprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasicarprePeer::CODCAT)) $criteria->add(NpasicarprePeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpasicarprePeer::CODCAR)) $criteria->add(NpasicarprePeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpasicarprePeer::CANPRE)) $criteria->add(NpasicarprePeer::CANPRE, $this->canpre);
		if ($this->isColumnModified(NpasicarprePeer::CANASI)) $criteria->add(NpasicarprePeer::CANASI, $this->canasi);
		if ($this->isColumnModified(NpasicarprePeer::MONPRE)) $criteria->add(NpasicarprePeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(NpasicarprePeer::MONASI)) $criteria->add(NpasicarprePeer::MONASI, $this->monasi);
		if ($this->isColumnModified(NpasicarprePeer::CODNIV)) $criteria->add(NpasicarprePeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpasicarprePeer::ID)) $criteria->add(NpasicarprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasicarprePeer::DATABASE_NAME);

		$criteria->add(NpasicarprePeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCanpre($this->canpre);

		$copyObj->setCanasi($this->canasi);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setCodniv($this->codniv);


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
			self::$peer = new NpasicarprePeer();
		}
		return self::$peer;
	}

} 