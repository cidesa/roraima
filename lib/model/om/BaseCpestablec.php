<?php


abstract class BaseCpestablec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codest;


	
	protected $codent;


	
	protected $hosamb;


	
	protected $codcen;


	
	protected $tipest;


	
	protected $direst;


	
	protected $desest;


	
	protected $urbrur;


	
	protected $tiprur;


	
	protected $nrocam;


	
	protected $atefir;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodest()
	{

		return $this->codest; 		
	}
	
	public function getCodent()
	{

		return $this->codent; 		
	}
	
	public function getHosamb()
	{

		return $this->hosamb; 		
	}
	
	public function getCodcen()
	{

		return $this->codcen; 		
	}
	
	public function getTipest()
	{

		return $this->tipest; 		
	}
	
	public function getDirest()
	{

		return $this->direst; 		
	}
	
	public function getDesest()
	{

		return $this->desest; 		
	}
	
	public function getUrbrur()
	{

		return $this->urbrur; 		
	}
	
	public function getTiprur()
	{

		return $this->tiprur; 		
	}
	
	public function getNrocam()
	{

		return number_format($this->nrocam,2,',','.');
		
	}
	
	public function getAtefir()
	{

		return $this->atefir; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodest($v)
	{

		if ($this->codest !== $v) {
			$this->codest = $v;
			$this->modifiedColumns[] = CpestablecPeer::CODEST;
		}

	} 
	
	public function setCodent($v)
	{

		if ($this->codent !== $v) {
			$this->codent = $v;
			$this->modifiedColumns[] = CpestablecPeer::CODENT;
		}

	} 
	
	public function setHosamb($v)
	{

		if ($this->hosamb !== $v) {
			$this->hosamb = $v;
			$this->modifiedColumns[] = CpestablecPeer::HOSAMB;
		}

	} 
	
	public function setCodcen($v)
	{

		if ($this->codcen !== $v) {
			$this->codcen = $v;
			$this->modifiedColumns[] = CpestablecPeer::CODCEN;
		}

	} 
	
	public function setTipest($v)
	{

		if ($this->tipest !== $v) {
			$this->tipest = $v;
			$this->modifiedColumns[] = CpestablecPeer::TIPEST;
		}

	} 
	
	public function setDirest($v)
	{

		if ($this->direst !== $v) {
			$this->direst = $v;
			$this->modifiedColumns[] = CpestablecPeer::DIREST;
		}

	} 
	
	public function setDesest($v)
	{

		if ($this->desest !== $v) {
			$this->desest = $v;
			$this->modifiedColumns[] = CpestablecPeer::DESEST;
		}

	} 
	
	public function setUrbrur($v)
	{

		if ($this->urbrur !== $v) {
			$this->urbrur = $v;
			$this->modifiedColumns[] = CpestablecPeer::URBRUR;
		}

	} 
	
	public function setTiprur($v)
	{

		if ($this->tiprur !== $v) {
			$this->tiprur = $v;
			$this->modifiedColumns[] = CpestablecPeer::TIPRUR;
		}

	} 
	
	public function setNrocam($v)
	{

		if ($this->nrocam !== $v) {
			$this->nrocam = $v;
			$this->modifiedColumns[] = CpestablecPeer::NROCAM;
		}

	} 
	
	public function setAtefir($v)
	{

		if ($this->atefir !== $v) {
			$this->atefir = $v;
			$this->modifiedColumns[] = CpestablecPeer::ATEFIR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpestablecPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codest = $rs->getString($startcol + 0);

			$this->codent = $rs->getString($startcol + 1);

			$this->hosamb = $rs->getString($startcol + 2);

			$this->codcen = $rs->getString($startcol + 3);

			$this->tipest = $rs->getString($startcol + 4);

			$this->direst = $rs->getString($startcol + 5);

			$this->desest = $rs->getString($startcol + 6);

			$this->urbrur = $rs->getString($startcol + 7);

			$this->tiprur = $rs->getString($startcol + 8);

			$this->nrocam = $rs->getFloat($startcol + 9);

			$this->atefir = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpestablec object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpestablecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpestablecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpestablecPeer::DATABASE_NAME);
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
					$pk = CpestablecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpestablecPeer::doUpdate($this, $con);
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


			if (($retval = CpestablecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpestablecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodest();
				break;
			case 1:
				return $this->getCodent();
				break;
			case 2:
				return $this->getHosamb();
				break;
			case 3:
				return $this->getCodcen();
				break;
			case 4:
				return $this->getTipest();
				break;
			case 5:
				return $this->getDirest();
				break;
			case 6:
				return $this->getDesest();
				break;
			case 7:
				return $this->getUrbrur();
				break;
			case 8:
				return $this->getTiprur();
				break;
			case 9:
				return $this->getNrocam();
				break;
			case 10:
				return $this->getAtefir();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpestablecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodest(),
			$keys[1] => $this->getCodent(),
			$keys[2] => $this->getHosamb(),
			$keys[3] => $this->getCodcen(),
			$keys[4] => $this->getTipest(),
			$keys[5] => $this->getDirest(),
			$keys[6] => $this->getDesest(),
			$keys[7] => $this->getUrbrur(),
			$keys[8] => $this->getTiprur(),
			$keys[9] => $this->getNrocam(),
			$keys[10] => $this->getAtefir(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpestablecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodest($value);
				break;
			case 1:
				$this->setCodent($value);
				break;
			case 2:
				$this->setHosamb($value);
				break;
			case 3:
				$this->setCodcen($value);
				break;
			case 4:
				$this->setTipest($value);
				break;
			case 5:
				$this->setDirest($value);
				break;
			case 6:
				$this->setDesest($value);
				break;
			case 7:
				$this->setUrbrur($value);
				break;
			case 8:
				$this->setTiprur($value);
				break;
			case 9:
				$this->setNrocam($value);
				break;
			case 10:
				$this->setAtefir($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpestablecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHosamb($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcen($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipest($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirest($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesest($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUrbrur($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTiprur($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNrocam($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAtefir($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpestablecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpestablecPeer::CODEST)) $criteria->add(CpestablecPeer::CODEST, $this->codest);
		if ($this->isColumnModified(CpestablecPeer::CODENT)) $criteria->add(CpestablecPeer::CODENT, $this->codent);
		if ($this->isColumnModified(CpestablecPeer::HOSAMB)) $criteria->add(CpestablecPeer::HOSAMB, $this->hosamb);
		if ($this->isColumnModified(CpestablecPeer::CODCEN)) $criteria->add(CpestablecPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(CpestablecPeer::TIPEST)) $criteria->add(CpestablecPeer::TIPEST, $this->tipest);
		if ($this->isColumnModified(CpestablecPeer::DIREST)) $criteria->add(CpestablecPeer::DIREST, $this->direst);
		if ($this->isColumnModified(CpestablecPeer::DESEST)) $criteria->add(CpestablecPeer::DESEST, $this->desest);
		if ($this->isColumnModified(CpestablecPeer::URBRUR)) $criteria->add(CpestablecPeer::URBRUR, $this->urbrur);
		if ($this->isColumnModified(CpestablecPeer::TIPRUR)) $criteria->add(CpestablecPeer::TIPRUR, $this->tiprur);
		if ($this->isColumnModified(CpestablecPeer::NROCAM)) $criteria->add(CpestablecPeer::NROCAM, $this->nrocam);
		if ($this->isColumnModified(CpestablecPeer::ATEFIR)) $criteria->add(CpestablecPeer::ATEFIR, $this->atefir);
		if ($this->isColumnModified(CpestablecPeer::ID)) $criteria->add(CpestablecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpestablecPeer::DATABASE_NAME);

		$criteria->add(CpestablecPeer::ID, $this->id);

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

		$copyObj->setCodest($this->codest);

		$copyObj->setCodent($this->codent);

		$copyObj->setHosamb($this->hosamb);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setTipest($this->tipest);

		$copyObj->setDirest($this->direst);

		$copyObj->setDesest($this->desest);

		$copyObj->setUrbrur($this->urbrur);

		$copyObj->setTiprur($this->tiprur);

		$copyObj->setNrocam($this->nrocam);

		$copyObj->setAtefir($this->atefir);


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
			self::$peer = new CpestablecPeer();
		}
		return self::$peer;
	}

} 