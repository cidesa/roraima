<?php


abstract class BaseCstotartfas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprod;


	
	protected $codfas;


	
	protected $monfas;


	
	protected $tipcal;


	
	protected $nroord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodprod()
	{

		return $this->codprod; 		
	}
	
	public function getCodfas()
	{

		return $this->codfas; 		
	}
	
	public function getMonfas()
	{

		return number_format($this->monfas,2,',','.');
		
	}
	
	public function getTipcal()
	{

		return $this->tipcal; 		
	}
	
	public function getNroord()
	{

		return $this->nroord; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodprod($v)
	{

		if ($this->codprod !== $v) {
			$this->codprod = $v;
			$this->modifiedColumns[] = CstotartfasPeer::CODPROD;
		}

	} 
	
	public function setCodfas($v)
	{

		if ($this->codfas !== $v) {
			$this->codfas = $v;
			$this->modifiedColumns[] = CstotartfasPeer::CODFAS;
		}

	} 
	
	public function setMonfas($v)
	{

		if ($this->monfas !== $v) {
			$this->monfas = $v;
			$this->modifiedColumns[] = CstotartfasPeer::MONFAS;
		}

	} 
	
	public function setTipcal($v)
	{

		if ($this->tipcal !== $v) {
			$this->tipcal = $v;
			$this->modifiedColumns[] = CstotartfasPeer::TIPCAL;
		}

	} 
	
	public function setNroord($v)
	{

		if ($this->nroord !== $v) {
			$this->nroord = $v;
			$this->modifiedColumns[] = CstotartfasPeer::NROORD;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CstotartfasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprod = $rs->getString($startcol + 0);

			$this->codfas = $rs->getString($startcol + 1);

			$this->monfas = $rs->getFloat($startcol + 2);

			$this->tipcal = $rs->getString($startcol + 3);

			$this->nroord = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cstotartfas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CstotartfasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CstotartfasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CstotartfasPeer::DATABASE_NAME);
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
					$pk = CstotartfasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CstotartfasPeer::doUpdate($this, $con);
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


			if (($retval = CstotartfasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CstotartfasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprod();
				break;
			case 1:
				return $this->getCodfas();
				break;
			case 2:
				return $this->getMonfas();
				break;
			case 3:
				return $this->getTipcal();
				break;
			case 4:
				return $this->getNroord();
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
		$keys = CstotartfasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprod(),
			$keys[1] => $this->getCodfas(),
			$keys[2] => $this->getMonfas(),
			$keys[3] => $this->getTipcal(),
			$keys[4] => $this->getNroord(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CstotartfasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprod($value);
				break;
			case 1:
				$this->setCodfas($value);
				break;
			case 2:
				$this->setMonfas($value);
				break;
			case 3:
				$this->setTipcal($value);
				break;
			case 4:
				$this->setNroord($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CstotartfasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonfas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipcal($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNroord($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CstotartfasPeer::DATABASE_NAME);

		if ($this->isColumnModified(CstotartfasPeer::CODPROD)) $criteria->add(CstotartfasPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(CstotartfasPeer::CODFAS)) $criteria->add(CstotartfasPeer::CODFAS, $this->codfas);
		if ($this->isColumnModified(CstotartfasPeer::MONFAS)) $criteria->add(CstotartfasPeer::MONFAS, $this->monfas);
		if ($this->isColumnModified(CstotartfasPeer::TIPCAL)) $criteria->add(CstotartfasPeer::TIPCAL, $this->tipcal);
		if ($this->isColumnModified(CstotartfasPeer::NROORD)) $criteria->add(CstotartfasPeer::NROORD, $this->nroord);
		if ($this->isColumnModified(CstotartfasPeer::ID)) $criteria->add(CstotartfasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CstotartfasPeer::DATABASE_NAME);

		$criteria->add(CstotartfasPeer::ID, $this->id);

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

		$copyObj->setCodprod($this->codprod);

		$copyObj->setCodfas($this->codfas);

		$copyObj->setMonfas($this->monfas);

		$copyObj->setTipcal($this->tipcal);

		$copyObj->setNroord($this->nroord);


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
			self::$peer = new CstotartfasPeer();
		}
		return self::$peer;
	}

} 