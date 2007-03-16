<?php


abstract class BaseConsolidadoNuevo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $identi;


	
	protected $tipmov;


	
	protected $refprc;


	
	protected $refcom;


	
	protected $refcau;


	
	protected $refpag;


	
	protected $fecmov;


	
	protected $cedrif;


	
	protected $monmov;


	
	protected $desmov;


	
	protected $afedis;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdenti()
	{

		return $this->identi;
	}

	
	public function getTipmov()
	{

		return $this->tipmov;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getRefcau()
	{

		return $this->refcau;
	}

	
	public function getRefpag()
	{

		return $this->refpag;
	}

	
	public function getFecmov($format = 'Y-m-d')
	{

		if ($this->fecmov === null || $this->fecmov === '') {
			return null;
		} elseif (!is_int($this->fecmov)) {
						$ts = strtotime($this->fecmov);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecmov] as date/time value: " . var_export($this->fecmov, true));
			}
		} else {
			$ts = $this->fecmov;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getMonmov()
	{

		return $this->monmov;
	}

	
	public function getDesmov()
	{

		return $this->desmov;
	}

	
	public function getAfedis()
	{

		return $this->afedis;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getNompre()
	{

		return $this->nompre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setIdenti($v)
	{

		if ($this->identi !== $v) {
			$this->identi = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::IDENTI;
		}

	} 
	
	public function setTipmov($v)
	{

		if ($this->tipmov !== $v) {
			$this->tipmov = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::TIPMOV;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::REFPRC;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::REFCOM;
		}

	} 
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::REFCAU;
		}

	} 
	
	public function setRefpag($v)
	{

		if ($this->refpag !== $v) {
			$this->refpag = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::REFPAG;
		}

	} 
	
	public function setFecmov($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecmov] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecmov !== $ts) {
			$this->fecmov = $ts;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::FECMOV;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::CEDRIF;
		}

	} 
	
	public function setMonmov($v)
	{

		if ($this->monmov !== $v) {
			$this->monmov = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::MONMOV;
		}

	} 
	
	public function setDesmov($v)
	{

		if ($this->desmov !== $v) {
			$this->desmov = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::DESMOV;
		}

	} 
	
	public function setAfedis($v)
	{

		if ($this->afedis !== $v) {
			$this->afedis = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::AFEDIS;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::CODPRE;
		}

	} 
	
	public function setNompre($v)
	{

		if ($this->nompre !== $v) {
			$this->nompre = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::NOMPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ConsolidadoNuevoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->identi = $rs->getString($startcol + 0);

			$this->tipmov = $rs->getString($startcol + 1);

			$this->refprc = $rs->getString($startcol + 2);

			$this->refcom = $rs->getString($startcol + 3);

			$this->refcau = $rs->getString($startcol + 4);

			$this->refpag = $rs->getString($startcol + 5);

			$this->fecmov = $rs->getDate($startcol + 6, null);

			$this->cedrif = $rs->getString($startcol + 7);

			$this->monmov = $rs->getFloat($startcol + 8);

			$this->desmov = $rs->getString($startcol + 9);

			$this->afedis = $rs->getString($startcol + 10);

			$this->codpre = $rs->getString($startcol + 11);

			$this->nompre = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ConsolidadoNuevo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ConsolidadoNuevoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ConsolidadoNuevoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ConsolidadoNuevoPeer::DATABASE_NAME);
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
					$pk = ConsolidadoNuevoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ConsolidadoNuevoPeer::doUpdate($this, $con);
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


			if (($retval = ConsolidadoNuevoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConsolidadoNuevoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdenti();
				break;
			case 1:
				return $this->getTipmov();
				break;
			case 2:
				return $this->getRefprc();
				break;
			case 3:
				return $this->getRefcom();
				break;
			case 4:
				return $this->getRefcau();
				break;
			case 5:
				return $this->getRefpag();
				break;
			case 6:
				return $this->getFecmov();
				break;
			case 7:
				return $this->getCedrif();
				break;
			case 8:
				return $this->getMonmov();
				break;
			case 9:
				return $this->getDesmov();
				break;
			case 10:
				return $this->getAfedis();
				break;
			case 11:
				return $this->getCodpre();
				break;
			case 12:
				return $this->getNompre();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConsolidadoNuevoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdenti(),
			$keys[1] => $this->getTipmov(),
			$keys[2] => $this->getRefprc(),
			$keys[3] => $this->getRefcom(),
			$keys[4] => $this->getRefcau(),
			$keys[5] => $this->getRefpag(),
			$keys[6] => $this->getFecmov(),
			$keys[7] => $this->getCedrif(),
			$keys[8] => $this->getMonmov(),
			$keys[9] => $this->getDesmov(),
			$keys[10] => $this->getAfedis(),
			$keys[11] => $this->getCodpre(),
			$keys[12] => $this->getNompre(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConsolidadoNuevoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdenti($value);
				break;
			case 1:
				$this->setTipmov($value);
				break;
			case 2:
				$this->setRefprc($value);
				break;
			case 3:
				$this->setRefcom($value);
				break;
			case 4:
				$this->setRefcau($value);
				break;
			case 5:
				$this->setRefpag($value);
				break;
			case 6:
				$this->setFecmov($value);
				break;
			case 7:
				$this->setCedrif($value);
				break;
			case 8:
				$this->setMonmov($value);
				break;
			case 9:
				$this->setDesmov($value);
				break;
			case 10:
				$this->setAfedis($value);
				break;
			case 11:
				$this->setCodpre($value);
				break;
			case 12:
				$this->setNompre($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConsolidadoNuevoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdenti($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipmov($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefprc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcau($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecmov($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCedrif($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonmov($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDesmov($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAfedis($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodpre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNompre($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ConsolidadoNuevoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ConsolidadoNuevoPeer::IDENTI)) $criteria->add(ConsolidadoNuevoPeer::IDENTI, $this->identi);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::TIPMOV)) $criteria->add(ConsolidadoNuevoPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::REFPRC)) $criteria->add(ConsolidadoNuevoPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::REFCOM)) $criteria->add(ConsolidadoNuevoPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::REFCAU)) $criteria->add(ConsolidadoNuevoPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::REFPAG)) $criteria->add(ConsolidadoNuevoPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::FECMOV)) $criteria->add(ConsolidadoNuevoPeer::FECMOV, $this->fecmov);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::CEDRIF)) $criteria->add(ConsolidadoNuevoPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::MONMOV)) $criteria->add(ConsolidadoNuevoPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::DESMOV)) $criteria->add(ConsolidadoNuevoPeer::DESMOV, $this->desmov);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::AFEDIS)) $criteria->add(ConsolidadoNuevoPeer::AFEDIS, $this->afedis);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::CODPRE)) $criteria->add(ConsolidadoNuevoPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::NOMPRE)) $criteria->add(ConsolidadoNuevoPeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(ConsolidadoNuevoPeer::ID)) $criteria->add(ConsolidadoNuevoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ConsolidadoNuevoPeer::DATABASE_NAME);

		$criteria->add(ConsolidadoNuevoPeer::ID, $this->id);

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

		$copyObj->setIdenti($this->identi);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setRefcau($this->refcau);

		$copyObj->setRefpag($this->refpag);

		$copyObj->setFecmov($this->fecmov);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setDesmov($this->desmov);

		$copyObj->setAfedis($this->afedis);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNompre($this->nompre);


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
			self::$peer = new ConsolidadoNuevoPeer();
		}
		return self::$peer;
	}

} 