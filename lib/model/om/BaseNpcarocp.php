<?php


abstract class BaseNpcarocp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $descar;


	
	protected $gracar;


	
	protected $suecar;


	
	protected $tipcar;


	
	protected $funcar;


	
	protected $atrcar;


	
	protected $actcar;


	
	protected $rescar;


	
	protected $anocar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getDescar()
	{

		return $this->descar;
	}

	
	public function getGracar()
	{

		return $this->gracar;
	}

	
	public function getSuecar()
	{

		return $this->suecar;
	}

	
	public function getTipcar()
	{

		return $this->tipcar;
	}

	
	public function getFuncar()
	{

		return $this->funcar;
	}

	
	public function getAtrcar()
	{

		return $this->atrcar;
	}

	
	public function getActcar()
	{

		return $this->actcar;
	}

	
	public function getRescar()
	{

		return $this->rescar;
	}

	
	public function getAnocar()
	{

		return $this->anocar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::CODCAR;
		}

	} 
	
	public function setDescar($v)
	{

		if ($this->descar !== $v) {
			$this->descar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::DESCAR;
		}

	} 
	
	public function setGracar($v)
	{

		if ($this->gracar !== $v) {
			$this->gracar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::GRACAR;
		}

	} 
	
	public function setSuecar($v)
	{

		if ($this->suecar !== $v) {
			$this->suecar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::SUECAR;
		}

	} 
	
	public function setTipcar($v)
	{

		if ($this->tipcar !== $v) {
			$this->tipcar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::TIPCAR;
		}

	} 
	
	public function setFuncar($v)
	{

		if ($this->funcar !== $v) {
			$this->funcar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::FUNCAR;
		}

	} 
	
	public function setAtrcar($v)
	{

		if ($this->atrcar !== $v) {
			$this->atrcar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::ATRCAR;
		}

	} 
	
	public function setActcar($v)
	{

		if ($this->actcar !== $v) {
			$this->actcar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::ACTCAR;
		}

	} 
	
	public function setRescar($v)
	{

		if ($this->rescar !== $v) {
			$this->rescar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::RESCAR;
		}

	} 
	
	public function setAnocar($v)
	{

		if ($this->anocar !== $v) {
			$this->anocar = $v;
			$this->modifiedColumns[] = NpcarocpPeer::ANOCAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcarocpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcar = $rs->getString($startcol + 0);

			$this->descar = $rs->getString($startcol + 1);

			$this->gracar = $rs->getString($startcol + 2);

			$this->suecar = $rs->getFloat($startcol + 3);

			$this->tipcar = $rs->getString($startcol + 4);

			$this->funcar = $rs->getString($startcol + 5);

			$this->atrcar = $rs->getString($startcol + 6);

			$this->actcar = $rs->getString($startcol + 7);

			$this->rescar = $rs->getString($startcol + 8);

			$this->anocar = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcarocp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcarocpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcarocpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcarocpPeer::DATABASE_NAME);
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
					$pk = NpcarocpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcarocpPeer::doUpdate($this, $con);
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


			if (($retval = NpcarocpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcarocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getDescar();
				break;
			case 2:
				return $this->getGracar();
				break;
			case 3:
				return $this->getSuecar();
				break;
			case 4:
				return $this->getTipcar();
				break;
			case 5:
				return $this->getFuncar();
				break;
			case 6:
				return $this->getAtrcar();
				break;
			case 7:
				return $this->getActcar();
				break;
			case 8:
				return $this->getRescar();
				break;
			case 9:
				return $this->getAnocar();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcarocpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getDescar(),
			$keys[2] => $this->getGracar(),
			$keys[3] => $this->getSuecar(),
			$keys[4] => $this->getTipcar(),
			$keys[5] => $this->getFuncar(),
			$keys[6] => $this->getAtrcar(),
			$keys[7] => $this->getActcar(),
			$keys[8] => $this->getRescar(),
			$keys[9] => $this->getAnocar(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcarocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setDescar($value);
				break;
			case 2:
				$this->setGracar($value);
				break;
			case 3:
				$this->setSuecar($value);
				break;
			case 4:
				$this->setTipcar($value);
				break;
			case 5:
				$this->setFuncar($value);
				break;
			case 6:
				$this->setAtrcar($value);
				break;
			case 7:
				$this->setActcar($value);
				break;
			case 8:
				$this->setRescar($value);
				break;
			case 9:
				$this->setAnocar($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcarocpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGracar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSuecar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipcar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFuncar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAtrcar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setActcar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRescar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAnocar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcarocpPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcarocpPeer::CODCAR)) $criteria->add(NpcarocpPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpcarocpPeer::DESCAR)) $criteria->add(NpcarocpPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(NpcarocpPeer::GRACAR)) $criteria->add(NpcarocpPeer::GRACAR, $this->gracar);
		if ($this->isColumnModified(NpcarocpPeer::SUECAR)) $criteria->add(NpcarocpPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(NpcarocpPeer::TIPCAR)) $criteria->add(NpcarocpPeer::TIPCAR, $this->tipcar);
		if ($this->isColumnModified(NpcarocpPeer::FUNCAR)) $criteria->add(NpcarocpPeer::FUNCAR, $this->funcar);
		if ($this->isColumnModified(NpcarocpPeer::ATRCAR)) $criteria->add(NpcarocpPeer::ATRCAR, $this->atrcar);
		if ($this->isColumnModified(NpcarocpPeer::ACTCAR)) $criteria->add(NpcarocpPeer::ACTCAR, $this->actcar);
		if ($this->isColumnModified(NpcarocpPeer::RESCAR)) $criteria->add(NpcarocpPeer::RESCAR, $this->rescar);
		if ($this->isColumnModified(NpcarocpPeer::ANOCAR)) $criteria->add(NpcarocpPeer::ANOCAR, $this->anocar);
		if ($this->isColumnModified(NpcarocpPeer::ID)) $criteria->add(NpcarocpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcarocpPeer::DATABASE_NAME);

		$criteria->add(NpcarocpPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setDescar($this->descar);

		$copyObj->setGracar($this->gracar);

		$copyObj->setSuecar($this->suecar);

		$copyObj->setTipcar($this->tipcar);

		$copyObj->setFuncar($this->funcar);

		$copyObj->setAtrcar($this->atrcar);

		$copyObj->setActcar($this->actcar);

		$copyObj->setRescar($this->rescar);

		$copyObj->setAnocar($this->anocar);


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
			self::$peer = new NpcarocpPeer();
		}
		return self::$peer;
	}

} 