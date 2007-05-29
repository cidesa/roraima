<?php


abstract class BaseFordisperpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $perpre;


	
	protected $canper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmet()
	{

		return $this->codmet; 		
	}
	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getPerpre()
	{

		return $this->perpre; 		
	}
	
	public function getCanper()
	{

		return number_format($this->canper,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = FordisperproPeer::CODMET;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = FordisperproPeer::CODPRO;
		}

	} 
	
	public function setPerpre($v)
	{

		if ($this->perpre !== $v) {
			$this->perpre = $v;
			$this->modifiedColumns[] = FordisperproPeer::PERPRE;
		}

	} 
	
	public function setCanper($v)
	{

		if ($this->canper !== $v) {
			$this->canper = $v;
			$this->modifiedColumns[] = FordisperproPeer::CANPER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordisperproPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmet = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->perpre = $rs->getString($startcol + 2);

			$this->canper = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordisperpro object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordisperproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordisperproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordisperproPeer::DATABASE_NAME);
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
					$pk = FordisperproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordisperproPeer::doUpdate($this, $con);
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


			if (($retval = FordisperproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordisperproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmet();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getPerpre();
				break;
			case 3:
				return $this->getCanper();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordisperproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getPerpre(),
			$keys[3] => $this->getCanper(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordisperproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmet($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setPerpre($value);
				break;
			case 3:
				$this->setCanper($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordisperproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanper($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordisperproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordisperproPeer::CODMET)) $criteria->add(FordisperproPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordisperproPeer::CODPRO)) $criteria->add(FordisperproPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordisperproPeer::PERPRE)) $criteria->add(FordisperproPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(FordisperproPeer::CANPER)) $criteria->add(FordisperproPeer::CANPER, $this->canper);
		if ($this->isColumnModified(FordisperproPeer::ID)) $criteria->add(FordisperproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordisperproPeer::DATABASE_NAME);

		$criteria->add(FordisperproPeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setCanper($this->canper);


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
			self::$peer = new FordisperproPeer();
		}
		return self::$peer;
	}

} 