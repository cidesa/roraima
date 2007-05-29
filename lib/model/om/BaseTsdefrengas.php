<?php


abstract class BaseTsdefrengas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pagrepcaj;


	
	protected $ctarepcaj;


	
	protected $pagcheant;


	
	protected $ctacheant;


	
	protected $movreicaj;


	
	protected $ctareicaj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPagrepcaj()
	{

		return $this->pagrepcaj; 		
	}
	
	public function getCtarepcaj()
	{

		return $this->ctarepcaj; 		
	}
	
	public function getPagcheant()
	{

		return $this->pagcheant; 		
	}
	
	public function getCtacheant()
	{

		return $this->ctacheant; 		
	}
	
	public function getMovreicaj()
	{

		return $this->movreicaj; 		
	}
	
	public function getCtareicaj()
	{

		return $this->ctareicaj; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setPagrepcaj($v)
	{

		if ($this->pagrepcaj !== $v) {
			$this->pagrepcaj = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::PAGREPCAJ;
		}

	} 
	
	public function setCtarepcaj($v)
	{

		if ($this->ctarepcaj !== $v) {
			$this->ctarepcaj = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::CTAREPCAJ;
		}

	} 
	
	public function setPagcheant($v)
	{

		if ($this->pagcheant !== $v) {
			$this->pagcheant = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::PAGCHEANT;
		}

	} 
	
	public function setCtacheant($v)
	{

		if ($this->ctacheant !== $v) {
			$this->ctacheant = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::CTACHEANT;
		}

	} 
	
	public function setMovreicaj($v)
	{

		if ($this->movreicaj !== $v) {
			$this->movreicaj = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::MOVREICAJ;
		}

	} 
	
	public function setCtareicaj($v)
	{

		if ($this->ctareicaj !== $v) {
			$this->ctareicaj = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::CTAREICAJ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsdefrengasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pagrepcaj = $rs->getString($startcol + 0);

			$this->ctarepcaj = $rs->getString($startcol + 1);

			$this->pagcheant = $rs->getString($startcol + 2);

			$this->ctacheant = $rs->getString($startcol + 3);

			$this->movreicaj = $rs->getString($startcol + 4);

			$this->ctareicaj = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsdefrengas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefrengasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefrengasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdefrengasPeer::DATABASE_NAME);
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
					$pk = TsdefrengasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsdefrengasPeer::doUpdate($this, $con);
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


			if (($retval = TsdefrengasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefrengasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPagrepcaj();
				break;
			case 1:
				return $this->getCtarepcaj();
				break;
			case 2:
				return $this->getPagcheant();
				break;
			case 3:
				return $this->getCtacheant();
				break;
			case 4:
				return $this->getMovreicaj();
				break;
			case 5:
				return $this->getCtareicaj();
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
		$keys = TsdefrengasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPagrepcaj(),
			$keys[1] => $this->getCtarepcaj(),
			$keys[2] => $this->getPagcheant(),
			$keys[3] => $this->getCtacheant(),
			$keys[4] => $this->getMovreicaj(),
			$keys[5] => $this->getCtareicaj(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefrengasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPagrepcaj($value);
				break;
			case 1:
				$this->setCtarepcaj($value);
				break;
			case 2:
				$this->setPagcheant($value);
				break;
			case 3:
				$this->setCtacheant($value);
				break;
			case 4:
				$this->setMovreicaj($value);
				break;
			case 5:
				$this->setCtareicaj($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefrengasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPagrepcaj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCtarepcaj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPagcheant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCtacheant($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMovreicaj($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCtareicaj($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefrengasPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefrengasPeer::PAGREPCAJ)) $criteria->add(TsdefrengasPeer::PAGREPCAJ, $this->pagrepcaj);
		if ($this->isColumnModified(TsdefrengasPeer::CTAREPCAJ)) $criteria->add(TsdefrengasPeer::CTAREPCAJ, $this->ctarepcaj);
		if ($this->isColumnModified(TsdefrengasPeer::PAGCHEANT)) $criteria->add(TsdefrengasPeer::PAGCHEANT, $this->pagcheant);
		if ($this->isColumnModified(TsdefrengasPeer::CTACHEANT)) $criteria->add(TsdefrengasPeer::CTACHEANT, $this->ctacheant);
		if ($this->isColumnModified(TsdefrengasPeer::MOVREICAJ)) $criteria->add(TsdefrengasPeer::MOVREICAJ, $this->movreicaj);
		if ($this->isColumnModified(TsdefrengasPeer::CTAREICAJ)) $criteria->add(TsdefrengasPeer::CTAREICAJ, $this->ctareicaj);
		if ($this->isColumnModified(TsdefrengasPeer::ID)) $criteria->add(TsdefrengasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefrengasPeer::DATABASE_NAME);

		$criteria->add(TsdefrengasPeer::ID, $this->id);

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

		$copyObj->setPagrepcaj($this->pagrepcaj);

		$copyObj->setCtarepcaj($this->ctarepcaj);

		$copyObj->setPagcheant($this->pagcheant);

		$copyObj->setCtacheant($this->ctacheant);

		$copyObj->setMovreicaj($this->movreicaj);

		$copyObj->setCtareicaj($this->ctareicaj);


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
			self::$peer = new TsdefrengasPeer();
		}
		return self::$peer;
	}

} 