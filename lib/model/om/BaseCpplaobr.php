<?php


abstract class BaseCpplaobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcom;


	
	protected $codpro;


	
	protected $codest;


	
	protected $codobr;


	
	protected $codemp;


	
	protected $nrocon;


	
	protected $moncon;


	
	protected $monrea;


	
	protected $monvar;


	
	protected $porfis;


	
	protected $porpre;


	
	protected $canequ;


	
	protected $desequ;


	
	protected $canobr;


	
	protected $desobr;


	
	protected $canrep;


	
	protected $desrep;


	
	protected $stapla;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getCodest()
	{

		return $this->codest;
	}

	
	public function getCodobr()
	{

		return $this->codobr;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getNrocon()
	{

		return $this->nrocon;
	}

	
	public function getMoncon()
	{

		return $this->moncon;
	}

	
	public function getMonrea()
	{

		return $this->monrea;
	}

	
	public function getMonvar()
	{

		return $this->monvar;
	}

	
	public function getPorfis()
	{

		return $this->porfis;
	}

	
	public function getPorpre()
	{

		return $this->porpre;
	}

	
	public function getCanequ()
	{

		return $this->canequ;
	}

	
	public function getDesequ()
	{

		return $this->desequ;
	}

	
	public function getCanobr()
	{

		return $this->canobr;
	}

	
	public function getDesobr()
	{

		return $this->desobr;
	}

	
	public function getCanrep()
	{

		return $this->canrep;
	}

	
	public function getDesrep()
	{

		return $this->desrep;
	}

	
	public function getStapla()
	{

		return $this->stapla;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = CpplaobrPeer::REFCOM;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CODPRO;
		}

	} 
	
	public function setCodest($v)
	{

		if ($this->codest !== $v) {
			$this->codest = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CODEST;
		}

	} 
	
	public function setCodobr($v)
	{

		if ($this->codobr !== $v) {
			$this->codobr = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CODOBR;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CODEMP;
		}

	} 
	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = CpplaobrPeer::NROCON;
		}

	} 
	
	public function setMoncon($v)
	{

		if ($this->moncon !== $v) {
			$this->moncon = $v;
			$this->modifiedColumns[] = CpplaobrPeer::MONCON;
		}

	} 
	
	public function setMonrea($v)
	{

		if ($this->monrea !== $v) {
			$this->monrea = $v;
			$this->modifiedColumns[] = CpplaobrPeer::MONREA;
		}

	} 
	
	public function setMonvar($v)
	{

		if ($this->monvar !== $v) {
			$this->monvar = $v;
			$this->modifiedColumns[] = CpplaobrPeer::MONVAR;
		}

	} 
	
	public function setPorfis($v)
	{

		if ($this->porfis !== $v) {
			$this->porfis = $v;
			$this->modifiedColumns[] = CpplaobrPeer::PORFIS;
		}

	} 
	
	public function setPorpre($v)
	{

		if ($this->porpre !== $v) {
			$this->porpre = $v;
			$this->modifiedColumns[] = CpplaobrPeer::PORPRE;
		}

	} 
	
	public function setCanequ($v)
	{

		if ($this->canequ !== $v) {
			$this->canequ = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CANEQU;
		}

	} 
	
	public function setDesequ($v)
	{

		if ($this->desequ !== $v) {
			$this->desequ = $v;
			$this->modifiedColumns[] = CpplaobrPeer::DESEQU;
		}

	} 
	
	public function setCanobr($v)
	{

		if ($this->canobr !== $v) {
			$this->canobr = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CANOBR;
		}

	} 
	
	public function setDesobr($v)
	{

		if ($this->desobr !== $v) {
			$this->desobr = $v;
			$this->modifiedColumns[] = CpplaobrPeer::DESOBR;
		}

	} 
	
	public function setCanrep($v)
	{

		if ($this->canrep !== $v) {
			$this->canrep = $v;
			$this->modifiedColumns[] = CpplaobrPeer::CANREP;
		}

	} 
	
	public function setDesrep($v)
	{

		if ($this->desrep !== $v) {
			$this->desrep = $v;
			$this->modifiedColumns[] = CpplaobrPeer::DESREP;
		}

	} 
	
	public function setStapla($v)
	{

		if ($this->stapla !== $v) {
			$this->stapla = $v;
			$this->modifiedColumns[] = CpplaobrPeer::STAPLA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpplaobrPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refcom = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->codest = $rs->getString($startcol + 2);

			$this->codobr = $rs->getString($startcol + 3);

			$this->codemp = $rs->getString($startcol + 4);

			$this->nrocon = $rs->getString($startcol + 5);

			$this->moncon = $rs->getFloat($startcol + 6);

			$this->monrea = $rs->getFloat($startcol + 7);

			$this->monvar = $rs->getFloat($startcol + 8);

			$this->porfis = $rs->getFloat($startcol + 9);

			$this->porpre = $rs->getFloat($startcol + 10);

			$this->canequ = $rs->getFloat($startcol + 11);

			$this->desequ = $rs->getString($startcol + 12);

			$this->canobr = $rs->getFloat($startcol + 13);

			$this->desobr = $rs->getString($startcol + 14);

			$this->canrep = $rs->getFloat($startcol + 15);

			$this->desrep = $rs->getString($startcol + 16);

			$this->stapla = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpplaobr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpplaobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpplaobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpplaobrPeer::DATABASE_NAME);
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
					$pk = CpplaobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpplaobrPeer::doUpdate($this, $con);
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


			if (($retval = CpplaobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpplaobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcom();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getCodest();
				break;
			case 3:
				return $this->getCodobr();
				break;
			case 4:
				return $this->getCodemp();
				break;
			case 5:
				return $this->getNrocon();
				break;
			case 6:
				return $this->getMoncon();
				break;
			case 7:
				return $this->getMonrea();
				break;
			case 8:
				return $this->getMonvar();
				break;
			case 9:
				return $this->getPorfis();
				break;
			case 10:
				return $this->getPorpre();
				break;
			case 11:
				return $this->getCanequ();
				break;
			case 12:
				return $this->getDesequ();
				break;
			case 13:
				return $this->getCanobr();
				break;
			case 14:
				return $this->getDesobr();
				break;
			case 15:
				return $this->getCanrep();
				break;
			case 16:
				return $this->getDesrep();
				break;
			case 17:
				return $this->getStapla();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpplaobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcom(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodest(),
			$keys[3] => $this->getCodobr(),
			$keys[4] => $this->getCodemp(),
			$keys[5] => $this->getNrocon(),
			$keys[6] => $this->getMoncon(),
			$keys[7] => $this->getMonrea(),
			$keys[8] => $this->getMonvar(),
			$keys[9] => $this->getPorfis(),
			$keys[10] => $this->getPorpre(),
			$keys[11] => $this->getCanequ(),
			$keys[12] => $this->getDesequ(),
			$keys[13] => $this->getCanobr(),
			$keys[14] => $this->getDesobr(),
			$keys[15] => $this->getCanrep(),
			$keys[16] => $this->getDesrep(),
			$keys[17] => $this->getStapla(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpplaobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcom($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setCodest($value);
				break;
			case 3:
				$this->setCodobr($value);
				break;
			case 4:
				$this->setCodemp($value);
				break;
			case 5:
				$this->setNrocon($value);
				break;
			case 6:
				$this->setMoncon($value);
				break;
			case 7:
				$this->setMonrea($value);
				break;
			case 8:
				$this->setMonvar($value);
				break;
			case 9:
				$this->setPorfis($value);
				break;
			case 10:
				$this->setPorpre($value);
				break;
			case 11:
				$this->setCanequ($value);
				break;
			case 12:
				$this->setDesequ($value);
				break;
			case 13:
				$this->setCanobr($value);
				break;
			case 14:
				$this->setDesobr($value);
				break;
			case 15:
				$this->setCanrep($value);
				break;
			case 16:
				$this->setDesrep($value);
				break;
			case 17:
				$this->setStapla($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpplaobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodobr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNrocon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMoncon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonrea($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonvar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPorfis($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPorpre($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCanequ($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDesequ($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCanobr($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDesobr($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCanrep($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDesrep($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStapla($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpplaobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpplaobrPeer::REFCOM)) $criteria->add(CpplaobrPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpplaobrPeer::CODPRO)) $criteria->add(CpplaobrPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CpplaobrPeer::CODEST)) $criteria->add(CpplaobrPeer::CODEST, $this->codest);
		if ($this->isColumnModified(CpplaobrPeer::CODOBR)) $criteria->add(CpplaobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(CpplaobrPeer::CODEMP)) $criteria->add(CpplaobrPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CpplaobrPeer::NROCON)) $criteria->add(CpplaobrPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(CpplaobrPeer::MONCON)) $criteria->add(CpplaobrPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(CpplaobrPeer::MONREA)) $criteria->add(CpplaobrPeer::MONREA, $this->monrea);
		if ($this->isColumnModified(CpplaobrPeer::MONVAR)) $criteria->add(CpplaobrPeer::MONVAR, $this->monvar);
		if ($this->isColumnModified(CpplaobrPeer::PORFIS)) $criteria->add(CpplaobrPeer::PORFIS, $this->porfis);
		if ($this->isColumnModified(CpplaobrPeer::PORPRE)) $criteria->add(CpplaobrPeer::PORPRE, $this->porpre);
		if ($this->isColumnModified(CpplaobrPeer::CANEQU)) $criteria->add(CpplaobrPeer::CANEQU, $this->canequ);
		if ($this->isColumnModified(CpplaobrPeer::DESEQU)) $criteria->add(CpplaobrPeer::DESEQU, $this->desequ);
		if ($this->isColumnModified(CpplaobrPeer::CANOBR)) $criteria->add(CpplaobrPeer::CANOBR, $this->canobr);
		if ($this->isColumnModified(CpplaobrPeer::DESOBR)) $criteria->add(CpplaobrPeer::DESOBR, $this->desobr);
		if ($this->isColumnModified(CpplaobrPeer::CANREP)) $criteria->add(CpplaobrPeer::CANREP, $this->canrep);
		if ($this->isColumnModified(CpplaobrPeer::DESREP)) $criteria->add(CpplaobrPeer::DESREP, $this->desrep);
		if ($this->isColumnModified(CpplaobrPeer::STAPLA)) $criteria->add(CpplaobrPeer::STAPLA, $this->stapla);
		if ($this->isColumnModified(CpplaobrPeer::ID)) $criteria->add(CpplaobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpplaobrPeer::DATABASE_NAME);

		$criteria->add(CpplaobrPeer::ID, $this->id);

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

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setMonrea($this->monrea);

		$copyObj->setMonvar($this->monvar);

		$copyObj->setPorfis($this->porfis);

		$copyObj->setPorpre($this->porpre);

		$copyObj->setCanequ($this->canequ);

		$copyObj->setDesequ($this->desequ);

		$copyObj->setCanobr($this->canobr);

		$copyObj->setDesobr($this->desobr);

		$copyObj->setCanrep($this->canrep);

		$copyObj->setDesrep($this->desrep);

		$copyObj->setStapla($this->stapla);


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
			self::$peer = new CpplaobrPeer();
		}
		return self::$peer;
	}

} 