<?php


abstract class BaseCobtipmov extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmov;


	
	protected $desmov;


	
	protected $nomabr;


	
	protected $debcre;


	
	protected $ctacon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmov()
	{

		return $this->codmov; 		
	}
	
	public function getDesmov()
	{

		return $this->desmov; 		
	}
	
	public function getNomabr()
	{

		return $this->nomabr; 		
	}
	
	public function getDebcre()
	{

		return $this->debcre; 		
	}
	
	public function getCtacon()
	{

		return $this->ctacon; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmov($v)
	{

		if ($this->codmov !== $v) {
			$this->codmov = $v;
			$this->modifiedColumns[] = CobtipmovPeer::CODMOV;
		}

	} 
	
	public function setDesmov($v)
	{

		if ($this->desmov !== $v) {
			$this->desmov = $v;
			$this->modifiedColumns[] = CobtipmovPeer::DESMOV;
		}

	} 
	
	public function setNomabr($v)
	{

		if ($this->nomabr !== $v) {
			$this->nomabr = $v;
			$this->modifiedColumns[] = CobtipmovPeer::NOMABR;
		}

	} 
	
	public function setDebcre($v)
	{

		if ($this->debcre !== $v) {
			$this->debcre = $v;
			$this->modifiedColumns[] = CobtipmovPeer::DEBCRE;
		}

	} 
	
	public function setCtacon($v)
	{

		if ($this->ctacon !== $v) {
			$this->ctacon = $v;
			$this->modifiedColumns[] = CobtipmovPeer::CTACON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobtipmovPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmov = $rs->getString($startcol + 0);

			$this->desmov = $rs->getString($startcol + 1);

			$this->nomabr = $rs->getString($startcol + 2);

			$this->debcre = $rs->getString($startcol + 3);

			$this->ctacon = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobtipmov object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobtipmovPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobtipmovPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobtipmovPeer::DATABASE_NAME);
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
					$pk = CobtipmovPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobtipmovPeer::doUpdate($this, $con);
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


			if (($retval = CobtipmovPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtipmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmov();
				break;
			case 1:
				return $this->getDesmov();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getDebcre();
				break;
			case 4:
				return $this->getCtacon();
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
		$keys = CobtipmovPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmov(),
			$keys[1] => $this->getDesmov(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getDebcre(),
			$keys[4] => $this->getCtacon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtipmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmov($value);
				break;
			case 1:
				$this->setDesmov($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setDebcre($value);
				break;
			case 4:
				$this->setCtacon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobtipmovPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmov($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmov($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDebcre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCtacon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobtipmovPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobtipmovPeer::CODMOV)) $criteria->add(CobtipmovPeer::CODMOV, $this->codmov);
		if ($this->isColumnModified(CobtipmovPeer::DESMOV)) $criteria->add(CobtipmovPeer::DESMOV, $this->desmov);
		if ($this->isColumnModified(CobtipmovPeer::NOMABR)) $criteria->add(CobtipmovPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CobtipmovPeer::DEBCRE)) $criteria->add(CobtipmovPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(CobtipmovPeer::CTACON)) $criteria->add(CobtipmovPeer::CTACON, $this->ctacon);
		if ($this->isColumnModified(CobtipmovPeer::ID)) $criteria->add(CobtipmovPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobtipmovPeer::DATABASE_NAME);

		$criteria->add(CobtipmovPeer::ID, $this->id);

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

		$copyObj->setCodmov($this->codmov);

		$copyObj->setDesmov($this->desmov);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCtacon($this->ctacon);


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
			self::$peer = new CobtipmovPeer();
		}
		return self::$peer;
	}

} 