<?php


abstract class BaseCsrecotrgas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprod;


	
	protected $codfas;


	
	protected $codgas;


	
	protected $cangas;


	
	protected $costot;


	
	protected $nroord;


	
	protected $cosgas;


	
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
	
	public function getCodgas()
	{

		return $this->codgas; 		
	}
	
	public function getCangas()
	{

		return number_format($this->cangas,2,',','.');
		
	}
	
	public function getCostot()
	{

		return number_format($this->costot,2,',','.');
		
	}
	
	public function getNroord()
	{

		return $this->nroord; 		
	}
	
	public function getCosgas()
	{

		return number_format($this->cosgas,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodprod($v)
	{

		if ($this->codprod !== $v) {
			$this->codprod = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::CODPROD;
		}

	} 
	
	public function setCodfas($v)
	{

		if ($this->codfas !== $v) {
			$this->codfas = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::CODFAS;
		}

	} 
	
	public function setCodgas($v)
	{

		if ($this->codgas !== $v) {
			$this->codgas = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::CODGAS;
		}

	} 
	
	public function setCangas($v)
	{

		if ($this->cangas !== $v) {
			$this->cangas = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::CANGAS;
		}

	} 
	
	public function setCostot($v)
	{

		if ($this->costot !== $v) {
			$this->costot = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::COSTOT;
		}

	} 
	
	public function setNroord($v)
	{

		if ($this->nroord !== $v) {
			$this->nroord = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::NROORD;
		}

	} 
	
	public function setCosgas($v)
	{

		if ($this->cosgas !== $v) {
			$this->cosgas = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::COSGAS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsrecotrgasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprod = $rs->getString($startcol + 0);

			$this->codfas = $rs->getString($startcol + 1);

			$this->codgas = $rs->getString($startcol + 2);

			$this->cangas = $rs->getFloat($startcol + 3);

			$this->costot = $rs->getFloat($startcol + 4);

			$this->nroord = $rs->getString($startcol + 5);

			$this->cosgas = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csrecotrgas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsrecotrgasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsrecotrgasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsrecotrgasPeer::DATABASE_NAME);
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
					$pk = CsrecotrgasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsrecotrgasPeer::doUpdate($this, $con);
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


			if (($retval = CsrecotrgasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecotrgasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodgas();
				break;
			case 3:
				return $this->getCangas();
				break;
			case 4:
				return $this->getCostot();
				break;
			case 5:
				return $this->getNroord();
				break;
			case 6:
				return $this->getCosgas();
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
		$keys = CsrecotrgasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprod(),
			$keys[1] => $this->getCodfas(),
			$keys[2] => $this->getCodgas(),
			$keys[3] => $this->getCangas(),
			$keys[4] => $this->getCostot(),
			$keys[5] => $this->getNroord(),
			$keys[6] => $this->getCosgas(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecotrgasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodgas($value);
				break;
			case 3:
				$this->setCangas($value);
				break;
			case 4:
				$this->setCostot($value);
				break;
			case 5:
				$this->setNroord($value);
				break;
			case 6:
				$this->setCosgas($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsrecotrgasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodgas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCangas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCostot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNroord($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCosgas($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsrecotrgasPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsrecotrgasPeer::CODPROD)) $criteria->add(CsrecotrgasPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(CsrecotrgasPeer::CODFAS)) $criteria->add(CsrecotrgasPeer::CODFAS, $this->codfas);
		if ($this->isColumnModified(CsrecotrgasPeer::CODGAS)) $criteria->add(CsrecotrgasPeer::CODGAS, $this->codgas);
		if ($this->isColumnModified(CsrecotrgasPeer::CANGAS)) $criteria->add(CsrecotrgasPeer::CANGAS, $this->cangas);
		if ($this->isColumnModified(CsrecotrgasPeer::COSTOT)) $criteria->add(CsrecotrgasPeer::COSTOT, $this->costot);
		if ($this->isColumnModified(CsrecotrgasPeer::NROORD)) $criteria->add(CsrecotrgasPeer::NROORD, $this->nroord);
		if ($this->isColumnModified(CsrecotrgasPeer::COSGAS)) $criteria->add(CsrecotrgasPeer::COSGAS, $this->cosgas);
		if ($this->isColumnModified(CsrecotrgasPeer::ID)) $criteria->add(CsrecotrgasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsrecotrgasPeer::DATABASE_NAME);

		$criteria->add(CsrecotrgasPeer::ID, $this->id);

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

		$copyObj->setCodgas($this->codgas);

		$copyObj->setCangas($this->cangas);

		$copyObj->setCostot($this->costot);

		$copyObj->setNroord($this->nroord);

		$copyObj->setCosgas($this->cosgas);


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
			self::$peer = new CsrecotrgasPeer();
		}
		return self::$peer;
	}

} 