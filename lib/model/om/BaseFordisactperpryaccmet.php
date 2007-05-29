<?php


abstract class BaseFordisactperpryaccmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $codact;


	
	protected $perpre;


	
	protected $canact;


	
	protected $canacteje;


	
	protected $canmet;


	
	protected $canmeteje;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getCodaccesp()
	{

		return $this->codaccesp; 		
	}
	
	public function getCodmet()
	{

		return $this->codmet; 		
	}
	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getPerpre()
	{

		return $this->perpre; 		
	}
	
	public function getCanact()
	{

		return number_format($this->canact,2,',','.');
		
	}
	
	public function getCanacteje()
	{

		return number_format($this->canacteje,2,',','.');
		
	}
	
	public function getCanmet()
	{

		return number_format($this->canmet,2,',','.');
		
	}
	
	public function getCanmeteje()
	{

		return number_format($this->canmeteje,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CODPRO;
		}

	} 
	
	public function setCodaccesp($v)
	{

		if ($this->codaccesp !== $v) {
			$this->codaccesp = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CODACCESP;
		}

	} 
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CODMET;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CODACT;
		}

	} 
	
	public function setPerpre($v)
	{

		if ($this->perpre !== $v) {
			$this->perpre = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::PERPRE;
		}

	} 
	
	public function setCanact($v)
	{

		if ($this->canact !== $v) {
			$this->canact = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CANACT;
		}

	} 
	
	public function setCanacteje($v)
	{

		if ($this->canacteje !== $v) {
			$this->canacteje = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CANACTEJE;
		}

	} 
	
	public function setCanmet($v)
	{

		if ($this->canmet !== $v) {
			$this->canmet = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CANMET;
		}

	} 
	
	public function setCanmeteje($v)
	{

		if ($this->canmeteje !== $v) {
			$this->canmeteje = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::CANMETEJE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordisactperpryaccmetPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpro = $rs->getString($startcol + 0);

			$this->codaccesp = $rs->getString($startcol + 1);

			$this->codmet = $rs->getString($startcol + 2);

			$this->codact = $rs->getString($startcol + 3);

			$this->perpre = $rs->getString($startcol + 4);

			$this->canact = $rs->getFloat($startcol + 5);

			$this->canacteje = $rs->getFloat($startcol + 6);

			$this->canmet = $rs->getFloat($startcol + 7);

			$this->canmeteje = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordisactperpryaccmet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordisactperpryaccmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordisactperpryaccmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordisactperpryaccmetPeer::DATABASE_NAME);
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
					$pk = FordisactperpryaccmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordisactperpryaccmetPeer::doUpdate($this, $con);
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


			if (($retval = FordisactperpryaccmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordisactperpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodmet();
				break;
			case 3:
				return $this->getCodact();
				break;
			case 4:
				return $this->getPerpre();
				break;
			case 5:
				return $this->getCanact();
				break;
			case 6:
				return $this->getCanacteje();
				break;
			case 7:
				return $this->getCanmet();
				break;
			case 8:
				return $this->getCanmeteje();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordisactperpryaccmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getCodact(),
			$keys[4] => $this->getPerpre(),
			$keys[5] => $this->getCanact(),
			$keys[6] => $this->getCanacteje(),
			$keys[7] => $this->getCanmet(),
			$keys[8] => $this->getCanmeteje(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordisactperpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodmet($value);
				break;
			case 3:
				$this->setCodact($value);
				break;
			case 4:
				$this->setPerpre($value);
				break;
			case 5:
				$this->setCanact($value);
				break;
			case 6:
				$this->setCanacteje($value);
				break;
			case 7:
				$this->setCanmet($value);
				break;
			case 8:
				$this->setCanmeteje($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordisactperpryaccmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPerpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanact($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanacteje($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCanmet($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanmeteje($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordisactperpryaccmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordisactperpryaccmetPeer::CODPRO)) $criteria->add(FordisactperpryaccmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CODACCESP)) $criteria->add(FordisactperpryaccmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CODMET)) $criteria->add(FordisactperpryaccmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CODACT)) $criteria->add(FordisactperpryaccmetPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::PERPRE)) $criteria->add(FordisactperpryaccmetPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CANACT)) $criteria->add(FordisactperpryaccmetPeer::CANACT, $this->canact);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CANACTEJE)) $criteria->add(FordisactperpryaccmetPeer::CANACTEJE, $this->canacteje);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CANMET)) $criteria->add(FordisactperpryaccmetPeer::CANMET, $this->canmet);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::CANMETEJE)) $criteria->add(FordisactperpryaccmetPeer::CANMETEJE, $this->canmeteje);
		if ($this->isColumnModified(FordisactperpryaccmetPeer::ID)) $criteria->add(FordisactperpryaccmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordisactperpryaccmetPeer::DATABASE_NAME);

		$criteria->add(FordisactperpryaccmetPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodact($this->codact);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setCanact($this->canact);

		$copyObj->setCanacteje($this->canacteje);

		$copyObj->setCanmet($this->canmet);

		$copyObj->setCanmeteje($this->canmeteje);


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
			self::$peer = new FordisactperpryaccmetPeer();
		}
		return self::$peer;
	}

} 