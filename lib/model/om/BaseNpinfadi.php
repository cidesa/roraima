<?php


abstract class BaseNpinfadi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomtit;


	
	protected $descur;


	
	protected $instit;


	
	protected $durcur;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $nivest;


	
	protected $diaini;


	
	protected $mesini;


	
	protected $anoini;


	
	protected $diafin;


	
	protected $mesfin;


	
	protected $anofin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getNomtit()
	{

		return $this->nomtit;
	}

	
	public function getDescur()
	{

		return $this->descur;
	}

	
	public function getInstit()
	{

		return $this->instit;
	}

	
	public function getDurcur()
	{

		return $this->durcur;
	}

	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfin($format = 'Y-m-d')
	{

		if ($this->fecfin === null || $this->fecfin === '') {
			return null;
		} elseif (!is_int($this->fecfin)) {
						$ts = strtotime($this->fecfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
			}
		} else {
			$ts = $this->fecfin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNivest()
	{

		return $this->nivest;
	}

	
	public function getDiaini()
	{

		return $this->diaini;
	}

	
	public function getMesini()
	{

		return $this->mesini;
	}

	
	public function getAnoini()
	{

		return $this->anoini;
	}

	
	public function getDiafin()
	{

		return $this->diafin;
	}

	
	public function getMesfin()
	{

		return $this->mesfin;
	}

	
	public function getAnofin()
	{

		return $this->anofin;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpinfadiPeer::CODEMP;
		}

	} 
	
	public function setNomtit($v)
	{

		if ($this->nomtit !== $v) {
			$this->nomtit = $v;
			$this->modifiedColumns[] = NpinfadiPeer::NOMTIT;
		}

	} 
	
	public function setDescur($v)
	{

		if ($this->descur !== $v) {
			$this->descur = $v;
			$this->modifiedColumns[] = NpinfadiPeer::DESCUR;
		}

	} 
	
	public function setInstit($v)
	{

		if ($this->instit !== $v) {
			$this->instit = $v;
			$this->modifiedColumns[] = NpinfadiPeer::INSTIT;
		}

	} 
	
	public function setDurcur($v)
	{

		if ($this->durcur !== $v) {
			$this->durcur = $v;
			$this->modifiedColumns[] = NpinfadiPeer::DURCUR;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = NpinfadiPeer::FECINI;
		}

	} 
	
	public function setFecfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfin !== $ts) {
			$this->fecfin = $ts;
			$this->modifiedColumns[] = NpinfadiPeer::FECFIN;
		}

	} 
	
	public function setNivest($v)
	{

		if ($this->nivest !== $v) {
			$this->nivest = $v;
			$this->modifiedColumns[] = NpinfadiPeer::NIVEST;
		}

	} 
	
	public function setDiaini($v)
	{

		if ($this->diaini !== $v) {
			$this->diaini = $v;
			$this->modifiedColumns[] = NpinfadiPeer::DIAINI;
		}

	} 
	
	public function setMesini($v)
	{

		if ($this->mesini !== $v) {
			$this->mesini = $v;
			$this->modifiedColumns[] = NpinfadiPeer::MESINI;
		}

	} 
	
	public function setAnoini($v)
	{

		if ($this->anoini !== $v) {
			$this->anoini = $v;
			$this->modifiedColumns[] = NpinfadiPeer::ANOINI;
		}

	} 
	
	public function setDiafin($v)
	{

		if ($this->diafin !== $v) {
			$this->diafin = $v;
			$this->modifiedColumns[] = NpinfadiPeer::DIAFIN;
		}

	} 
	
	public function setMesfin($v)
	{

		if ($this->mesfin !== $v) {
			$this->mesfin = $v;
			$this->modifiedColumns[] = NpinfadiPeer::MESFIN;
		}

	} 
	
	public function setAnofin($v)
	{

		if ($this->anofin !== $v) {
			$this->anofin = $v;
			$this->modifiedColumns[] = NpinfadiPeer::ANOFIN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpinfadiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->nomtit = $rs->getString($startcol + 1);

			$this->descur = $rs->getString($startcol + 2);

			$this->instit = $rs->getString($startcol + 3);

			$this->durcur = $rs->getString($startcol + 4);

			$this->fecini = $rs->getDate($startcol + 5, null);

			$this->fecfin = $rs->getDate($startcol + 6, null);

			$this->nivest = $rs->getString($startcol + 7);

			$this->diaini = $rs->getString($startcol + 8);

			$this->mesini = $rs->getString($startcol + 9);

			$this->anoini = $rs->getString($startcol + 10);

			$this->diafin = $rs->getString($startcol + 11);

			$this->mesfin = $rs->getString($startcol + 12);

			$this->anofin = $rs->getString($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npinfadi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpinfadiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfadiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfadiPeer::DATABASE_NAME);
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
					$pk = NpinfadiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpinfadiPeer::doUpdate($this, $con);
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


			if (($retval = NpinfadiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomtit();
				break;
			case 2:
				return $this->getDescur();
				break;
			case 3:
				return $this->getInstit();
				break;
			case 4:
				return $this->getDurcur();
				break;
			case 5:
				return $this->getFecini();
				break;
			case 6:
				return $this->getFecfin();
				break;
			case 7:
				return $this->getNivest();
				break;
			case 8:
				return $this->getDiaini();
				break;
			case 9:
				return $this->getMesini();
				break;
			case 10:
				return $this->getAnoini();
				break;
			case 11:
				return $this->getDiafin();
				break;
			case 12:
				return $this->getMesfin();
				break;
			case 13:
				return $this->getAnofin();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfadiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomtit(),
			$keys[2] => $this->getDescur(),
			$keys[3] => $this->getInstit(),
			$keys[4] => $this->getDurcur(),
			$keys[5] => $this->getFecini(),
			$keys[6] => $this->getFecfin(),
			$keys[7] => $this->getNivest(),
			$keys[8] => $this->getDiaini(),
			$keys[9] => $this->getMesini(),
			$keys[10] => $this->getAnoini(),
			$keys[11] => $this->getDiafin(),
			$keys[12] => $this->getMesfin(),
			$keys[13] => $this->getAnofin(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomtit($value);
				break;
			case 2:
				$this->setDescur($value);
				break;
			case 3:
				$this->setInstit($value);
				break;
			case 4:
				$this->setDurcur($value);
				break;
			case 5:
				$this->setFecini($value);
				break;
			case 6:
				$this->setFecfin($value);
				break;
			case 7:
				$this->setNivest($value);
				break;
			case 8:
				$this->setDiaini($value);
				break;
			case 9:
				$this->setMesini($value);
				break;
			case 10:
				$this->setAnoini($value);
				break;
			case 11:
				$this->setDiafin($value);
				break;
			case 12:
				$this->setMesfin($value);
				break;
			case 13:
				$this->setAnofin($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfadiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtit($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInstit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDurcur($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecini($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecfin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNivest($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDiaini($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMesini($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAnoini($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDiafin($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMesfin($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAnofin($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfadiPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfadiPeer::CODEMP)) $criteria->add(NpinfadiPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfadiPeer::NOMTIT)) $criteria->add(NpinfadiPeer::NOMTIT, $this->nomtit);
		if ($this->isColumnModified(NpinfadiPeer::DESCUR)) $criteria->add(NpinfadiPeer::DESCUR, $this->descur);
		if ($this->isColumnModified(NpinfadiPeer::INSTIT)) $criteria->add(NpinfadiPeer::INSTIT, $this->instit);
		if ($this->isColumnModified(NpinfadiPeer::DURCUR)) $criteria->add(NpinfadiPeer::DURCUR, $this->durcur);
		if ($this->isColumnModified(NpinfadiPeer::FECINI)) $criteria->add(NpinfadiPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpinfadiPeer::FECFIN)) $criteria->add(NpinfadiPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpinfadiPeer::NIVEST)) $criteria->add(NpinfadiPeer::NIVEST, $this->nivest);
		if ($this->isColumnModified(NpinfadiPeer::DIAINI)) $criteria->add(NpinfadiPeer::DIAINI, $this->diaini);
		if ($this->isColumnModified(NpinfadiPeer::MESINI)) $criteria->add(NpinfadiPeer::MESINI, $this->mesini);
		if ($this->isColumnModified(NpinfadiPeer::ANOINI)) $criteria->add(NpinfadiPeer::ANOINI, $this->anoini);
		if ($this->isColumnModified(NpinfadiPeer::DIAFIN)) $criteria->add(NpinfadiPeer::DIAFIN, $this->diafin);
		if ($this->isColumnModified(NpinfadiPeer::MESFIN)) $criteria->add(NpinfadiPeer::MESFIN, $this->mesfin);
		if ($this->isColumnModified(NpinfadiPeer::ANOFIN)) $criteria->add(NpinfadiPeer::ANOFIN, $this->anofin);
		if ($this->isColumnModified(NpinfadiPeer::ID)) $criteria->add(NpinfadiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfadiPeer::DATABASE_NAME);

		$criteria->add(NpinfadiPeer::ID, $this->id);

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

		$copyObj->setNomtit($this->nomtit);

		$copyObj->setDescur($this->descur);

		$copyObj->setInstit($this->instit);

		$copyObj->setDurcur($this->durcur);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setNivest($this->nivest);

		$copyObj->setDiaini($this->diaini);

		$copyObj->setMesini($this->mesini);

		$copyObj->setAnoini($this->anoini);

		$copyObj->setDiafin($this->diafin);

		$copyObj->setMesfin($this->mesfin);

		$copyObj->setAnofin($this->anofin);


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
			self::$peer = new NpinfadiPeer();
		}
		return self::$peer;
	}

} 