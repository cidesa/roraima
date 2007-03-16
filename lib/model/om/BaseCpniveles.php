<?php


abstract class BaseCpniveles extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catpar;


	
	protected $consec;


	
	protected $nomabr;


	
	protected $nomext;


	
	protected $lonniv;


	
	protected $staniv;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCatpar()
	{

		return $this->catpar;
	}

	
	public function getConsec()
	{

		return $this->consec;
	}

	
	public function getNomabr()
	{

		return $this->nomabr;
	}

	
	public function getNomext()
	{

		return $this->nomext;
	}

	
	public function getLonniv()
	{

		return $this->lonniv;
	}

	
	public function getStaniv()
	{

		return $this->staniv;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCatpar($v)
	{

		if ($this->catpar !== $v) {
			$this->catpar = $v;
			$this->modifiedColumns[] = CpnivelesPeer::CATPAR;
		}

	} 
	
	public function setConsec($v)
	{

		if ($this->consec !== $v) {
			$this->consec = $v;
			$this->modifiedColumns[] = CpnivelesPeer::CONSEC;
		}

	} 
	
	public function setNomabr($v)
	{

		if ($this->nomabr !== $v) {
			$this->nomabr = $v;
			$this->modifiedColumns[] = CpnivelesPeer::NOMABR;
		}

	} 
	
	public function setNomext($v)
	{

		if ($this->nomext !== $v) {
			$this->nomext = $v;
			$this->modifiedColumns[] = CpnivelesPeer::NOMEXT;
		}

	} 
	
	public function setLonniv($v)
	{

		if ($this->lonniv !== $v) {
			$this->lonniv = $v;
			$this->modifiedColumns[] = CpnivelesPeer::LONNIV;
		}

	} 
	
	public function setStaniv($v)
	{

		if ($this->staniv !== $v) {
			$this->staniv = $v;
			$this->modifiedColumns[] = CpnivelesPeer::STANIV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpnivelesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->catpar = $rs->getString($startcol + 0);

			$this->consec = $rs->getFloat($startcol + 1);

			$this->nomabr = $rs->getString($startcol + 2);

			$this->nomext = $rs->getString($startcol + 3);

			$this->lonniv = $rs->getFloat($startcol + 4);

			$this->staniv = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpniveles object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpnivelesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpnivelesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpnivelesPeer::DATABASE_NAME);
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
					$pk = CpnivelesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpnivelesPeer::doUpdate($this, $con);
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


			if (($retval = CpnivelesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpnivelesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatpar();
				break;
			case 1:
				return $this->getConsec();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getNomext();
				break;
			case 4:
				return $this->getLonniv();
				break;
			case 5:
				return $this->getStaniv();
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
		$keys = CpnivelesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatpar(),
			$keys[1] => $this->getConsec(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getNomext(),
			$keys[4] => $this->getLonniv(),
			$keys[5] => $this->getStaniv(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpnivelesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatpar($value);
				break;
			case 1:
				$this->setConsec($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setNomext($value);
				break;
			case 4:
				$this->setLonniv($value);
				break;
			case 5:
				$this->setStaniv($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpnivelesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setConsec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomext($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLonniv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaniv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpnivelesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpnivelesPeer::CATPAR)) $criteria->add(CpnivelesPeer::CATPAR, $this->catpar);
		if ($this->isColumnModified(CpnivelesPeer::CONSEC)) $criteria->add(CpnivelesPeer::CONSEC, $this->consec);
		if ($this->isColumnModified(CpnivelesPeer::NOMABR)) $criteria->add(CpnivelesPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpnivelesPeer::NOMEXT)) $criteria->add(CpnivelesPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CpnivelesPeer::LONNIV)) $criteria->add(CpnivelesPeer::LONNIV, $this->lonniv);
		if ($this->isColumnModified(CpnivelesPeer::STANIV)) $criteria->add(CpnivelesPeer::STANIV, $this->staniv);
		if ($this->isColumnModified(CpnivelesPeer::ID)) $criteria->add(CpnivelesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpnivelesPeer::DATABASE_NAME);

		$criteria->add(CpnivelesPeer::ID, $this->id);

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

		$copyObj->setCatpar($this->catpar);

		$copyObj->setConsec($this->consec);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setNomext($this->nomext);

		$copyObj->setLonniv($this->lonniv);

		$copyObj->setStaniv($this->staniv);


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
			self::$peer = new CpnivelesPeer();
		}
		return self::$peer;
	}

} 