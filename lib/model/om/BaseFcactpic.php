<?php


abstract class BaseFcactpic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdoc;


	
	protected $codact;


	
	protected $exoner;


	
	protected $monact;


	
	protected $porexo;


	
	protected $estact;


	
	protected $exento;


	
	protected $rebaja;


	
	protected $porreb;


	
	protected $monant;


	
	protected $impuesto;


	
	protected $fecven;


	
	protected $anodec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumdoc()
	{

		return $this->numdoc;
	}

	
	public function getCodact()
	{

		return $this->codact;
	}

	
	public function getExoner()
	{

		return $this->exoner;
	}

	
	public function getMonact()
	{

		return $this->monact;
	}

	
	public function getPorexo()
	{

		return $this->porexo;
	}

	
	public function getEstact()
	{

		return $this->estact;
	}

	
	public function getExento()
	{

		return $this->exento;
	}

	
	public function getRebaja()
	{

		return $this->rebaja;
	}

	
	public function getPorreb()
	{

		return $this->porreb;
	}

	
	public function getMonant()
	{

		return $this->monant;
	}

	
	public function getImpuesto()
	{

		return $this->impuesto;
	}

	
	public function getFecven($format = 'Y-m-d')
	{

		if ($this->fecven === null || $this->fecven === '') {
			return null;
		} elseif (!is_int($this->fecven)) {
						$ts = strtotime($this->fecven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
			}
		} else {
			$ts = $this->fecven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnodec()
	{

		return $this->anodec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumdoc($v)
	{

		if ($this->numdoc !== $v) {
			$this->numdoc = $v;
			$this->modifiedColumns[] = FcactpicPeer::NUMDOC;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = FcactpicPeer::CODACT;
		}

	} 
	
	public function setExoner($v)
	{

		if ($this->exoner !== $v) {
			$this->exoner = $v;
			$this->modifiedColumns[] = FcactpicPeer::EXONER;
		}

	} 
	
	public function setMonact($v)
	{

		if ($this->monact !== $v) {
			$this->monact = $v;
			$this->modifiedColumns[] = FcactpicPeer::MONACT;
		}

	} 
	
	public function setPorexo($v)
	{

		if ($this->porexo !== $v) {
			$this->porexo = $v;
			$this->modifiedColumns[] = FcactpicPeer::POREXO;
		}

	} 
	
	public function setEstact($v)
	{

		if ($this->estact !== $v) {
			$this->estact = $v;
			$this->modifiedColumns[] = FcactpicPeer::ESTACT;
		}

	} 
	
	public function setExento($v)
	{

		if ($this->exento !== $v) {
			$this->exento = $v;
			$this->modifiedColumns[] = FcactpicPeer::EXENTO;
		}

	} 
	
	public function setRebaja($v)
	{

		if ($this->rebaja !== $v) {
			$this->rebaja = $v;
			$this->modifiedColumns[] = FcactpicPeer::REBAJA;
		}

	} 
	
	public function setPorreb($v)
	{

		if ($this->porreb !== $v) {
			$this->porreb = $v;
			$this->modifiedColumns[] = FcactpicPeer::PORREB;
		}

	} 
	
	public function setMonant($v)
	{

		if ($this->monant !== $v) {
			$this->monant = $v;
			$this->modifiedColumns[] = FcactpicPeer::MONANT;
		}

	} 
	
	public function setImpuesto($v)
	{

		if ($this->impuesto !== $v) {
			$this->impuesto = $v;
			$this->modifiedColumns[] = FcactpicPeer::IMPUESTO;
		}

	} 
	
	public function setFecven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecven !== $ts) {
			$this->fecven = $ts;
			$this->modifiedColumns[] = FcactpicPeer::FECVEN;
		}

	} 
	
	public function setAnodec($v)
	{

		if ($this->anodec !== $v) {
			$this->anodec = $v;
			$this->modifiedColumns[] = FcactpicPeer::ANODEC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcactpicPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numdoc = $rs->getString($startcol + 0);

			$this->codact = $rs->getString($startcol + 1);

			$this->exoner = $rs->getString($startcol + 2);

			$this->monact = $rs->getFloat($startcol + 3);

			$this->porexo = $rs->getFloat($startcol + 4);

			$this->estact = $rs->getString($startcol + 5);

			$this->exento = $rs->getString($startcol + 6);

			$this->rebaja = $rs->getString($startcol + 7);

			$this->porreb = $rs->getFloat($startcol + 8);

			$this->monant = $rs->getFloat($startcol + 9);

			$this->impuesto = $rs->getFloat($startcol + 10);

			$this->fecven = $rs->getDate($startcol + 11, null);

			$this->anodec = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcactpic object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcactpicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcactpicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcactpicPeer::DATABASE_NAME);
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
					$pk = FcactpicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcactpicPeer::doUpdate($this, $con);
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


			if (($retval = FcactpicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcactpicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdoc();
				break;
			case 1:
				return $this->getCodact();
				break;
			case 2:
				return $this->getExoner();
				break;
			case 3:
				return $this->getMonact();
				break;
			case 4:
				return $this->getPorexo();
				break;
			case 5:
				return $this->getEstact();
				break;
			case 6:
				return $this->getExento();
				break;
			case 7:
				return $this->getRebaja();
				break;
			case 8:
				return $this->getPorreb();
				break;
			case 9:
				return $this->getMonant();
				break;
			case 10:
				return $this->getImpuesto();
				break;
			case 11:
				return $this->getFecven();
				break;
			case 12:
				return $this->getAnodec();
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
		$keys = FcactpicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdoc(),
			$keys[1] => $this->getCodact(),
			$keys[2] => $this->getExoner(),
			$keys[3] => $this->getMonact(),
			$keys[4] => $this->getPorexo(),
			$keys[5] => $this->getEstact(),
			$keys[6] => $this->getExento(),
			$keys[7] => $this->getRebaja(),
			$keys[8] => $this->getPorreb(),
			$keys[9] => $this->getMonant(),
			$keys[10] => $this->getImpuesto(),
			$keys[11] => $this->getFecven(),
			$keys[12] => $this->getAnodec(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcactpicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdoc($value);
				break;
			case 1:
				$this->setCodact($value);
				break;
			case 2:
				$this->setExoner($value);
				break;
			case 3:
				$this->setMonact($value);
				break;
			case 4:
				$this->setPorexo($value);
				break;
			case 5:
				$this->setEstact($value);
				break;
			case 6:
				$this->setExento($value);
				break;
			case 7:
				$this->setRebaja($value);
				break;
			case 8:
				$this->setPorreb($value);
				break;
			case 9:
				$this->setMonant($value);
				break;
			case 10:
				$this->setImpuesto($value);
				break;
			case 11:
				$this->setFecven($value);
				break;
			case 12:
				$this->setAnodec($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcactpicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setExoner($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorexo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstact($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setExento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRebaja($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPorreb($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonant($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setImpuesto($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecven($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAnodec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcactpicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcactpicPeer::NUMDOC)) $criteria->add(FcactpicPeer::NUMDOC, $this->numdoc);
		if ($this->isColumnModified(FcactpicPeer::CODACT)) $criteria->add(FcactpicPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FcactpicPeer::EXONER)) $criteria->add(FcactpicPeer::EXONER, $this->exoner);
		if ($this->isColumnModified(FcactpicPeer::MONACT)) $criteria->add(FcactpicPeer::MONACT, $this->monact);
		if ($this->isColumnModified(FcactpicPeer::POREXO)) $criteria->add(FcactpicPeer::POREXO, $this->porexo);
		if ($this->isColumnModified(FcactpicPeer::ESTACT)) $criteria->add(FcactpicPeer::ESTACT, $this->estact);
		if ($this->isColumnModified(FcactpicPeer::EXENTO)) $criteria->add(FcactpicPeer::EXENTO, $this->exento);
		if ($this->isColumnModified(FcactpicPeer::REBAJA)) $criteria->add(FcactpicPeer::REBAJA, $this->rebaja);
		if ($this->isColumnModified(FcactpicPeer::PORREB)) $criteria->add(FcactpicPeer::PORREB, $this->porreb);
		if ($this->isColumnModified(FcactpicPeer::MONANT)) $criteria->add(FcactpicPeer::MONANT, $this->monant);
		if ($this->isColumnModified(FcactpicPeer::IMPUESTO)) $criteria->add(FcactpicPeer::IMPUESTO, $this->impuesto);
		if ($this->isColumnModified(FcactpicPeer::FECVEN)) $criteria->add(FcactpicPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcactpicPeer::ANODEC)) $criteria->add(FcactpicPeer::ANODEC, $this->anodec);
		if ($this->isColumnModified(FcactpicPeer::ID)) $criteria->add(FcactpicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcactpicPeer::DATABASE_NAME);

		$criteria->add(FcactpicPeer::ID, $this->id);

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

		$copyObj->setNumdoc($this->numdoc);

		$copyObj->setCodact($this->codact);

		$copyObj->setExoner($this->exoner);

		$copyObj->setMonact($this->monact);

		$copyObj->setPorexo($this->porexo);

		$copyObj->setEstact($this->estact);

		$copyObj->setExento($this->exento);

		$copyObj->setRebaja($this->rebaja);

		$copyObj->setPorreb($this->porreb);

		$copyObj->setMonant($this->monant);

		$copyObj->setImpuesto($this->impuesto);

		$copyObj->setFecven($this->fecven);

		$copyObj->setAnodec($this->anodec);


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
			self::$peer = new FcactpicPeer();
		}
		return self::$peer;
	}

} 