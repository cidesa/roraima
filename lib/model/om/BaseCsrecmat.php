<?php


abstract class BaseCsrecmat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprod;


	
	protected $codfas;


	
	protected $codart;


	
	protected $tipo;


	
	protected $tipmat;


	
	protected $canmat;


	
	protected $costot;


	
	protected $nroord;


	
	protected $cosuni;


	
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

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getTipmat()
	{

		return $this->tipmat;
	}

	
	public function getCanmat()
	{

		return $this->canmat;
	}

	
	public function getCostot()
	{

		return $this->costot;
	}

	
	public function getNroord()
	{

		return $this->nroord;
	}

	
	public function getCosuni()
	{

		return $this->cosuni;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodprod($v)
	{

		if ($this->codprod !== $v) {
			$this->codprod = $v;
			$this->modifiedColumns[] = CsrecmatPeer::CODPROD;
		}

	} 
	
	public function setCodfas($v)
	{

		if ($this->codfas !== $v) {
			$this->codfas = $v;
			$this->modifiedColumns[] = CsrecmatPeer::CODFAS;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CsrecmatPeer::CODART;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = CsrecmatPeer::TIPO;
		}

	} 
	
	public function setTipmat($v)
	{

		if ($this->tipmat !== $v) {
			$this->tipmat = $v;
			$this->modifiedColumns[] = CsrecmatPeer::TIPMAT;
		}

	} 
	
	public function setCanmat($v)
	{

		if ($this->canmat !== $v) {
			$this->canmat = $v;
			$this->modifiedColumns[] = CsrecmatPeer::CANMAT;
		}

	} 
	
	public function setCostot($v)
	{

		if ($this->costot !== $v) {
			$this->costot = $v;
			$this->modifiedColumns[] = CsrecmatPeer::COSTOT;
		}

	} 
	
	public function setNroord($v)
	{

		if ($this->nroord !== $v) {
			$this->nroord = $v;
			$this->modifiedColumns[] = CsrecmatPeer::NROORD;
		}

	} 
	
	public function setCosuni($v)
	{

		if ($this->cosuni !== $v) {
			$this->cosuni = $v;
			$this->modifiedColumns[] = CsrecmatPeer::COSUNI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsrecmatPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprod = $rs->getString($startcol + 0);

			$this->codfas = $rs->getString($startcol + 1);

			$this->codart = $rs->getString($startcol + 2);

			$this->tipo = $rs->getString($startcol + 3);

			$this->tipmat = $rs->getString($startcol + 4);

			$this->canmat = $rs->getFloat($startcol + 5);

			$this->costot = $rs->getFloat($startcol + 6);

			$this->nroord = $rs->getString($startcol + 7);

			$this->cosuni = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csrecmat object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsrecmatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsrecmatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsrecmatPeer::DATABASE_NAME);
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
					$pk = CsrecmatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsrecmatPeer::doUpdate($this, $con);
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


			if (($retval = CsrecmatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecmatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodart();
				break;
			case 3:
				return $this->getTipo();
				break;
			case 4:
				return $this->getTipmat();
				break;
			case 5:
				return $this->getCanmat();
				break;
			case 6:
				return $this->getCostot();
				break;
			case 7:
				return $this->getNroord();
				break;
			case 8:
				return $this->getCosuni();
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
		$keys = CsrecmatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprod(),
			$keys[1] => $this->getCodfas(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getTipmat(),
			$keys[5] => $this->getCanmat(),
			$keys[6] => $this->getCostot(),
			$keys[7] => $this->getNroord(),
			$keys[8] => $this->getCosuni(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecmatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodart($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setTipmat($value);
				break;
			case 5:
				$this->setCanmat($value);
				break;
			case 6:
				$this->setCostot($value);
				break;
			case 7:
				$this->setNroord($value);
				break;
			case 8:
				$this->setCosuni($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsrecmatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipmat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanmat($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCostot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNroord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCosuni($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsrecmatPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsrecmatPeer::CODPROD)) $criteria->add(CsrecmatPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(CsrecmatPeer::CODFAS)) $criteria->add(CsrecmatPeer::CODFAS, $this->codfas);
		if ($this->isColumnModified(CsrecmatPeer::CODART)) $criteria->add(CsrecmatPeer::CODART, $this->codart);
		if ($this->isColumnModified(CsrecmatPeer::TIPO)) $criteria->add(CsrecmatPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CsrecmatPeer::TIPMAT)) $criteria->add(CsrecmatPeer::TIPMAT, $this->tipmat);
		if ($this->isColumnModified(CsrecmatPeer::CANMAT)) $criteria->add(CsrecmatPeer::CANMAT, $this->canmat);
		if ($this->isColumnModified(CsrecmatPeer::COSTOT)) $criteria->add(CsrecmatPeer::COSTOT, $this->costot);
		if ($this->isColumnModified(CsrecmatPeer::NROORD)) $criteria->add(CsrecmatPeer::NROORD, $this->nroord);
		if ($this->isColumnModified(CsrecmatPeer::COSUNI)) $criteria->add(CsrecmatPeer::COSUNI, $this->cosuni);
		if ($this->isColumnModified(CsrecmatPeer::ID)) $criteria->add(CsrecmatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsrecmatPeer::DATABASE_NAME);

		$criteria->add(CsrecmatPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setTipo($this->tipo);

		$copyObj->setTipmat($this->tipmat);

		$copyObj->setCanmat($this->canmat);

		$copyObj->setCostot($this->costot);

		$copyObj->setNroord($this->nroord);

		$copyObj->setCosuni($this->cosuni);


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
			self::$peer = new CsrecmatPeer();
		}
		return self::$peer;
	}

} 