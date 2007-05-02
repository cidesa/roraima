<?php


abstract class BaseFcrepliq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrep;


	
	protected $ano;


	
	protected $codact;


	
	protected $moning;


	
	protected $monimp;


	
	protected $monbom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumrep()
	{

		return $this->numrep;
	}

	
	public function getAno()
	{

		return $this->ano;
	}

	
	public function getCodact()
	{

		return $this->codact;
	}

	
	public function getMoning()
	{

		return $this->moning;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getMonbom()
	{

		return $this->monbom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumrep($v)
	{

		if ($this->numrep !== $v) {
			$this->numrep = $v;
			$this->modifiedColumns[] = FcrepliqPeer::NUMREP;
		}

	} 
	
	public function setAno($v)
	{

		if ($this->ano !== $v) {
			$this->ano = $v;
			$this->modifiedColumns[] = FcrepliqPeer::ANO;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = FcrepliqPeer::CODACT;
		}

	} 
	
	public function setMoning($v)
	{

		if ($this->moning !== $v) {
			$this->moning = $v;
			$this->modifiedColumns[] = FcrepliqPeer::MONING;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcrepliqPeer::MONIMP;
		}

	} 
	
	public function setMonbom($v)
	{

		if ($this->monbom !== $v) {
			$this->monbom = $v;
			$this->modifiedColumns[] = FcrepliqPeer::MONBOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrepliqPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numrep = $rs->getString($startcol + 0);

			$this->ano = $rs->getString($startcol + 1);

			$this->codact = $rs->getString($startcol + 2);

			$this->moning = $rs->getString($startcol + 3);

			$this->monimp = $rs->getString($startcol + 4);

			$this->monbom = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrepliq object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrepliqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrepliqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrepliqPeer::DATABASE_NAME);
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
					$pk = FcrepliqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrepliqPeer::doUpdate($this, $con);
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


			if (($retval = FcrepliqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrepliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrep();
				break;
			case 1:
				return $this->getAno();
				break;
			case 2:
				return $this->getCodact();
				break;
			case 3:
				return $this->getMoning();
				break;
			case 4:
				return $this->getMonimp();
				break;
			case 5:
				return $this->getMonbom();
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
		$keys = FcrepliqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrep(),
			$keys[1] => $this->getAno(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getMoning(),
			$keys[4] => $this->getMonimp(),
			$keys[5] => $this->getMonbom(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrepliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrep($value);
				break;
			case 1:
				$this->setAno($value);
				break;
			case 2:
				$this->setCodact($value);
				break;
			case 3:
				$this->setMoning($value);
				break;
			case 4:
				$this->setMonimp($value);
				break;
			case 5:
				$this->setMonbom($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrepliqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAno($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoning($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonimp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonbom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrepliqPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrepliqPeer::NUMREP)) $criteria->add(FcrepliqPeer::NUMREP, $this->numrep);
		if ($this->isColumnModified(FcrepliqPeer::ANO)) $criteria->add(FcrepliqPeer::ANO, $this->ano);
		if ($this->isColumnModified(FcrepliqPeer::CODACT)) $criteria->add(FcrepliqPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FcrepliqPeer::MONING)) $criteria->add(FcrepliqPeer::MONING, $this->moning);
		if ($this->isColumnModified(FcrepliqPeer::MONIMP)) $criteria->add(FcrepliqPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcrepliqPeer::MONBOM)) $criteria->add(FcrepliqPeer::MONBOM, $this->monbom);
		if ($this->isColumnModified(FcrepliqPeer::ID)) $criteria->add(FcrepliqPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrepliqPeer::DATABASE_NAME);

		$criteria->add(FcrepliqPeer::ID, $this->id);

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

		$copyObj->setNumrep($this->numrep);

		$copyObj->setAno($this->ano);

		$copyObj->setCodact($this->codact);

		$copyObj->setMoning($this->moning);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMonbom($this->monbom);


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
			self::$peer = new FcrepliqPeer();
		}
		return self::$peer;
	}

} 