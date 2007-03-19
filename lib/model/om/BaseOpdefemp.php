<?php


abstract class BaseOpdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $ctapag;


	
	protected $ctades;


	
	protected $numini;


	
	protected $ordnom;


	
	protected $ordobr;


	
	protected $unitri;


	
	protected $vercomret;


	
	protected $genctaord;


	
	protected $forubi;


	
	protected $tipaju;


	
	protected $tipeje;


	
	protected $numaut;


	
	protected $tipmov;


	
	protected $coriva;


	
	protected $ctabono;


	
	protected $ctavaca;


	
	protected $gencaubon;


	
	protected $gencomadi;


	
	protected $unidad;


	
	protected $ordliq;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCtapag()
	{

		return $this->ctapag;
	}

	
	public function getCtades()
	{

		return $this->ctades;
	}

	
	public function getNumini()
	{

		return $this->numini;
	}

	
	public function getOrdnom()
	{

		return $this->ordnom;
	}

	
	public function getOrdobr()
	{

		return $this->ordobr;
	}

	
	public function getUnitri()
	{

		return $this->unitri;
	}

	
	public function getVercomret()
	{

		return $this->vercomret;
	}

	
	public function getGenctaord()
	{

		return $this->genctaord;
	}

	
	public function getForubi()
	{

		return $this->forubi;
	}

	
	public function getTipaju()
	{

		return $this->tipaju;
	}

	
	public function getTipeje()
	{

		return $this->tipeje;
	}

	
	public function getNumaut()
	{

		return $this->numaut;
	}

	
	public function getTipmov()
	{

		return $this->tipmov;
	}

	
	public function getCoriva()
	{

		return $this->coriva;
	}

	
	public function getCtabono()
	{

		return $this->ctabono;
	}

	
	public function getCtavaca()
	{

		return $this->ctavaca;
	}

	
	public function getGencaubon()
	{

		return $this->gencaubon;
	}

	
	public function getGencomadi()
	{

		return $this->gencomadi;
	}

	
	public function getUnidad()
	{

		return $this->unidad;
	}

	
	public function getOrdliq()
	{

		return $this->ordliq;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = OpdefempPeer::CODEMP;
		}

	} 
	
	public function setCtapag($v)
	{

		if ($this->ctapag !== $v) {
			$this->ctapag = $v;
			$this->modifiedColumns[] = OpdefempPeer::CTAPAG;
		}

	} 
	
	public function setCtades($v)
	{

		if ($this->ctades !== $v) {
			$this->ctades = $v;
			$this->modifiedColumns[] = OpdefempPeer::CTADES;
		}

	} 
	
	public function setNumini($v)
	{

		if ($this->numini !== $v) {
			$this->numini = $v;
			$this->modifiedColumns[] = OpdefempPeer::NUMINI;
		}

	} 
	
	public function setOrdnom($v)
	{

		if ($this->ordnom !== $v) {
			$this->ordnom = $v;
			$this->modifiedColumns[] = OpdefempPeer::ORDNOM;
		}

	} 
	
	public function setOrdobr($v)
	{

		if ($this->ordobr !== $v) {
			$this->ordobr = $v;
			$this->modifiedColumns[] = OpdefempPeer::ORDOBR;
		}

	} 
	
	public function setUnitri($v)
	{

		if ($this->unitri !== $v) {
			$this->unitri = $v;
			$this->modifiedColumns[] = OpdefempPeer::UNITRI;
		}

	} 
	
	public function setVercomret($v)
	{

		if ($this->vercomret !== $v) {
			$this->vercomret = $v;
			$this->modifiedColumns[] = OpdefempPeer::VERCOMRET;
		}

	} 
	
	public function setGenctaord($v)
	{

		if ($this->genctaord !== $v) {
			$this->genctaord = $v;
			$this->modifiedColumns[] = OpdefempPeer::GENCTAORD;
		}

	} 
	
	public function setForubi($v)
	{

		if ($this->forubi !== $v) {
			$this->forubi = $v;
			$this->modifiedColumns[] = OpdefempPeer::FORUBI;
		}

	} 
	
	public function setTipaju($v)
	{

		if ($this->tipaju !== $v) {
			$this->tipaju = $v;
			$this->modifiedColumns[] = OpdefempPeer::TIPAJU;
		}

	} 
	
	public function setTipeje($v)
	{

		if ($this->tipeje !== $v) {
			$this->tipeje = $v;
			$this->modifiedColumns[] = OpdefempPeer::TIPEJE;
		}

	} 
	
	public function setNumaut($v)
	{

		if ($this->numaut !== $v) {
			$this->numaut = $v;
			$this->modifiedColumns[] = OpdefempPeer::NUMAUT;
		}

	} 
	
	public function setTipmov($v)
	{

		if ($this->tipmov !== $v) {
			$this->tipmov = $v;
			$this->modifiedColumns[] = OpdefempPeer::TIPMOV;
		}

	} 
	
	public function setCoriva($v)
	{

		if ($this->coriva !== $v) {
			$this->coriva = $v;
			$this->modifiedColumns[] = OpdefempPeer::CORIVA;
		}

	} 
	
	public function setCtabono($v)
	{

		if ($this->ctabono !== $v) {
			$this->ctabono = $v;
			$this->modifiedColumns[] = OpdefempPeer::CTABONO;
		}

	} 
	
	public function setCtavaca($v)
	{

		if ($this->ctavaca !== $v) {
			$this->ctavaca = $v;
			$this->modifiedColumns[] = OpdefempPeer::CTAVACA;
		}

	} 
	
	public function setGencaubon($v)
	{

		if ($this->gencaubon !== $v) {
			$this->gencaubon = $v;
			$this->modifiedColumns[] = OpdefempPeer::GENCAUBON;
		}

	} 
	
	public function setGencomadi($v)
	{

		if ($this->gencomadi !== $v) {
			$this->gencomadi = $v;
			$this->modifiedColumns[] = OpdefempPeer::GENCOMADI;
		}

	} 
	
	public function setUnidad($v)
	{

		if ($this->unidad !== $v) {
			$this->unidad = $v;
			$this->modifiedColumns[] = OpdefempPeer::UNIDAD;
		}

	} 
	
	public function setOrdliq($v)
	{

		if ($this->ordliq !== $v) {
			$this->ordliq = $v;
			$this->modifiedColumns[] = OpdefempPeer::ORDLIQ;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OpdefempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->ctapag = $rs->getString($startcol + 1);

			$this->ctades = $rs->getString($startcol + 2);

			$this->numini = $rs->getString($startcol + 3);

			$this->ordnom = $rs->getString($startcol + 4);

			$this->ordobr = $rs->getString($startcol + 5);

			$this->unitri = $rs->getFloat($startcol + 6);

			$this->vercomret = $rs->getString($startcol + 7);

			$this->genctaord = $rs->getString($startcol + 8);

			$this->forubi = $rs->getString($startcol + 9);

			$this->tipaju = $rs->getString($startcol + 10);

			$this->tipeje = $rs->getString($startcol + 11);

			$this->numaut = $rs->getString($startcol + 12);

			$this->tipmov = $rs->getString($startcol + 13);

			$this->coriva = $rs->getFloat($startcol + 14);

			$this->ctabono = $rs->getString($startcol + 15);

			$this->ctavaca = $rs->getString($startcol + 16);

			$this->gencaubon = $rs->getString($startcol + 17);

			$this->gencomadi = $rs->getString($startcol + 18);

			$this->unidad = $rs->getString($startcol + 19);

			$this->ordliq = $rs->getString($startcol + 20);

			$this->id = $rs->getInt($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Opdefemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OpdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdefempPeer::DATABASE_NAME);
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
					$pk = OpdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OpdefempPeer::doUpdate($this, $con);
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


			if (($retval = OpdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCtapag();
				break;
			case 2:
				return $this->getCtades();
				break;
			case 3:
				return $this->getNumini();
				break;
			case 4:
				return $this->getOrdnom();
				break;
			case 5:
				return $this->getOrdobr();
				break;
			case 6:
				return $this->getUnitri();
				break;
			case 7:
				return $this->getVercomret();
				break;
			case 8:
				return $this->getGenctaord();
				break;
			case 9:
				return $this->getForubi();
				break;
			case 10:
				return $this->getTipaju();
				break;
			case 11:
				return $this->getTipeje();
				break;
			case 12:
				return $this->getNumaut();
				break;
			case 13:
				return $this->getTipmov();
				break;
			case 14:
				return $this->getCoriva();
				break;
			case 15:
				return $this->getCtabono();
				break;
			case 16:
				return $this->getCtavaca();
				break;
			case 17:
				return $this->getGencaubon();
				break;
			case 18:
				return $this->getGencomadi();
				break;
			case 19:
				return $this->getUnidad();
				break;
			case 20:
				return $this->getOrdliq();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCtapag(),
			$keys[2] => $this->getCtades(),
			$keys[3] => $this->getNumini(),
			$keys[4] => $this->getOrdnom(),
			$keys[5] => $this->getOrdobr(),
			$keys[6] => $this->getUnitri(),
			$keys[7] => $this->getVercomret(),
			$keys[8] => $this->getGenctaord(),
			$keys[9] => $this->getForubi(),
			$keys[10] => $this->getTipaju(),
			$keys[11] => $this->getTipeje(),
			$keys[12] => $this->getNumaut(),
			$keys[13] => $this->getTipmov(),
			$keys[14] => $this->getCoriva(),
			$keys[15] => $this->getCtabono(),
			$keys[16] => $this->getCtavaca(),
			$keys[17] => $this->getGencaubon(),
			$keys[18] => $this->getGencomadi(),
			$keys[19] => $this->getUnidad(),
			$keys[20] => $this->getOrdliq(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCtapag($value);
				break;
			case 2:
				$this->setCtades($value);
				break;
			case 3:
				$this->setNumini($value);
				break;
			case 4:
				$this->setOrdnom($value);
				break;
			case 5:
				$this->setOrdobr($value);
				break;
			case 6:
				$this->setUnitri($value);
				break;
			case 7:
				$this->setVercomret($value);
				break;
			case 8:
				$this->setGenctaord($value);
				break;
			case 9:
				$this->setForubi($value);
				break;
			case 10:
				$this->setTipaju($value);
				break;
			case 11:
				$this->setTipeje($value);
				break;
			case 12:
				$this->setNumaut($value);
				break;
			case 13:
				$this->setTipmov($value);
				break;
			case 14:
				$this->setCoriva($value);
				break;
			case 15:
				$this->setCtabono($value);
				break;
			case 16:
				$this->setCtavaca($value);
				break;
			case 17:
				$this->setGencaubon($value);
				break;
			case 18:
				$this->setGencomadi($value);
				break;
			case 19:
				$this->setUnidad($value);
				break;
			case 20:
				$this->setOrdliq($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCtapag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtades($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrdnom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrdobr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnitri($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVercomret($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGenctaord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setForubi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipeje($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumaut($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmov($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoriva($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCtabono($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCtavaca($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setGencaubon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setGencomadi($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUnidad($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setOrdliq($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdefempPeer::CODEMP)) $criteria->add(OpdefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(OpdefempPeer::CTAPAG)) $criteria->add(OpdefempPeer::CTAPAG, $this->ctapag);
		if ($this->isColumnModified(OpdefempPeer::CTADES)) $criteria->add(OpdefempPeer::CTADES, $this->ctades);
		if ($this->isColumnModified(OpdefempPeer::NUMINI)) $criteria->add(OpdefempPeer::NUMINI, $this->numini);
		if ($this->isColumnModified(OpdefempPeer::ORDNOM)) $criteria->add(OpdefempPeer::ORDNOM, $this->ordnom);
		if ($this->isColumnModified(OpdefempPeer::ORDOBR)) $criteria->add(OpdefempPeer::ORDOBR, $this->ordobr);
		if ($this->isColumnModified(OpdefempPeer::UNITRI)) $criteria->add(OpdefempPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(OpdefempPeer::VERCOMRET)) $criteria->add(OpdefempPeer::VERCOMRET, $this->vercomret);
		if ($this->isColumnModified(OpdefempPeer::GENCTAORD)) $criteria->add(OpdefempPeer::GENCTAORD, $this->genctaord);
		if ($this->isColumnModified(OpdefempPeer::FORUBI)) $criteria->add(OpdefempPeer::FORUBI, $this->forubi);
		if ($this->isColumnModified(OpdefempPeer::TIPAJU)) $criteria->add(OpdefempPeer::TIPAJU, $this->tipaju);
		if ($this->isColumnModified(OpdefempPeer::TIPEJE)) $criteria->add(OpdefempPeer::TIPEJE, $this->tipeje);
		if ($this->isColumnModified(OpdefempPeer::NUMAUT)) $criteria->add(OpdefempPeer::NUMAUT, $this->numaut);
		if ($this->isColumnModified(OpdefempPeer::TIPMOV)) $criteria->add(OpdefempPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(OpdefempPeer::CORIVA)) $criteria->add(OpdefempPeer::CORIVA, $this->coriva);
		if ($this->isColumnModified(OpdefempPeer::CTABONO)) $criteria->add(OpdefempPeer::CTABONO, $this->ctabono);
		if ($this->isColumnModified(OpdefempPeer::CTAVACA)) $criteria->add(OpdefempPeer::CTAVACA, $this->ctavaca);
		if ($this->isColumnModified(OpdefempPeer::GENCAUBON)) $criteria->add(OpdefempPeer::GENCAUBON, $this->gencaubon);
		if ($this->isColumnModified(OpdefempPeer::GENCOMADI)) $criteria->add(OpdefempPeer::GENCOMADI, $this->gencomadi);
		if ($this->isColumnModified(OpdefempPeer::UNIDAD)) $criteria->add(OpdefempPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(OpdefempPeer::ORDLIQ)) $criteria->add(OpdefempPeer::ORDLIQ, $this->ordliq);
		if ($this->isColumnModified(OpdefempPeer::ID)) $criteria->add(OpdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdefempPeer::DATABASE_NAME);

		$criteria->add(OpdefempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCtapag($this->ctapag);

		$copyObj->setCtades($this->ctades);

		$copyObj->setNumini($this->numini);

		$copyObj->setOrdnom($this->ordnom);

		$copyObj->setOrdobr($this->ordobr);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setVercomret($this->vercomret);

		$copyObj->setGenctaord($this->genctaord);

		$copyObj->setForubi($this->forubi);

		$copyObj->setTipaju($this->tipaju);

		$copyObj->setTipeje($this->tipeje);

		$copyObj->setNumaut($this->numaut);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setCoriva($this->coriva);

		$copyObj->setCtabono($this->ctabono);

		$copyObj->setCtavaca($this->ctavaca);

		$copyObj->setGencaubon($this->gencaubon);

		$copyObj->setGencomadi($this->gencomadi);

		$copyObj->setUnidad($this->unidad);

		$copyObj->setOrdliq($this->ordliq);


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
			self::$peer = new OpdefempPeer();
		}
		return self::$peer;
	}

} 