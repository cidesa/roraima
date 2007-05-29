<?php


abstract class BaseFordismetperpryaccmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $perpre;


	
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
	
	public function getPerpre()
	{

		return $this->perpre; 		
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
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::CODPRO;
		}

	} 
	
	public function setCodaccesp($v)
	{

		if ($this->codaccesp !== $v) {
			$this->codaccesp = $v;
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::CODACCESP;
		}

	} 
	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::CODMET;
		}

	} 
	
	public function setPerpre($v)
	{

		if ($this->perpre !== $v) {
			$this->perpre = $v;
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::PERPRE;
		}

	} 
	
	public function setCanmet($v)
	{

		if ($this->canmet !== $v) {
			$this->canmet = $v;
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::CANMET;
		}

	} 
	
	public function setCanmeteje($v)
	{

		if ($this->canmeteje !== $v) {
			$this->canmeteje = $v;
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::CANMETEJE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordismetperpryaccmetPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpro = $rs->getString($startcol + 0);

			$this->codaccesp = $rs->getString($startcol + 1);

			$this->codmet = $rs->getString($startcol + 2);

			$this->perpre = $rs->getString($startcol + 3);

			$this->canmet = $rs->getFloat($startcol + 4);

			$this->canmeteje = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordismetperpryaccmet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordismetperpryaccmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordismetperpryaccmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordismetperpryaccmetPeer::DATABASE_NAME);
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
					$pk = FordismetperpryaccmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordismetperpryaccmetPeer::doUpdate($this, $con);
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


			if (($retval = FordismetperpryaccmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordismetperpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPerpre();
				break;
			case 4:
				return $this->getCanmet();
				break;
			case 5:
				return $this->getCanmeteje();
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
		$keys = FordismetperpryaccmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getPerpre(),
			$keys[4] => $this->getCanmet(),
			$keys[5] => $this->getCanmeteje(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordismetperpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPerpre($value);
				break;
			case 4:
				$this->setCanmet($value);
				break;
			case 5:
				$this->setCanmeteje($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordismetperpryaccmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPerpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanmet($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanmeteje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordismetperpryaccmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordismetperpryaccmetPeer::CODPRO)) $criteria->add(FordismetperpryaccmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordismetperpryaccmetPeer::CODACCESP)) $criteria->add(FordismetperpryaccmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordismetperpryaccmetPeer::CODMET)) $criteria->add(FordismetperpryaccmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordismetperpryaccmetPeer::PERPRE)) $criteria->add(FordismetperpryaccmetPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(FordismetperpryaccmetPeer::CANMET)) $criteria->add(FordismetperpryaccmetPeer::CANMET, $this->canmet);
		if ($this->isColumnModified(FordismetperpryaccmetPeer::CANMETEJE)) $criteria->add(FordismetperpryaccmetPeer::CANMETEJE, $this->canmeteje);
		if ($this->isColumnModified(FordismetperpryaccmetPeer::ID)) $criteria->add(FordismetperpryaccmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordismetperpryaccmetPeer::DATABASE_NAME);

		$criteria->add(FordismetperpryaccmetPeer::ID, $this->id);

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

		$copyObj->setPerpre($this->perpre);

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
			self::$peer = new FordismetperpryaccmetPeer();
		}
		return self::$peer;
	}

} 