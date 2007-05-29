<?php


abstract class BaseNpinfcurRene extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomtit;


	
	protected $descur;


	
	protected $instit;


	
	protected $durcur;


	
	protected $feccur;


	
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
	
	public function getFeccur($format = 'Y-m-d')
	{

		if ($this->feccur === null || $this->feccur === '') {
			return null;
		} elseif (!is_int($this->feccur)) {
						$ts = strtotime($this->feccur);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccur] as date/time value: " . var_export($this->feccur, true));
			}
		} else {
			$ts = $this->feccur;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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
			$this->modifiedColumns[] = NpinfcurRenePeer::CODEMP;
		}

	} 
	
	public function setNomtit($v)
	{

		if ($this->nomtit !== $v) {
			$this->nomtit = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::NOMTIT;
		}

	} 
	
	public function setDescur($v)
	{

		if ($this->descur !== $v) {
			$this->descur = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::DESCUR;
		}

	} 
	
	public function setInstit($v)
	{

		if ($this->instit !== $v) {
			$this->instit = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::INSTIT;
		}

	} 
	
	public function setDurcur($v)
	{

		if ($this->durcur !== $v) {
			$this->durcur = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::DURCUR;
		}

	} 
	
	public function setFeccur($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccur] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccur !== $ts) {
			$this->feccur = $ts;
			$this->modifiedColumns[] = NpinfcurRenePeer::FECCUR;
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
			$this->modifiedColumns[] = NpinfcurRenePeer::FECINI;
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
			$this->modifiedColumns[] = NpinfcurRenePeer::FECFIN;
		}

	} 
	
	public function setNivest($v)
	{

		if ($this->nivest !== $v) {
			$this->nivest = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::NIVEST;
		}

	} 
	
	public function setDiaini($v)
	{

		if ($this->diaini !== $v) {
			$this->diaini = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::DIAINI;
		}

	} 
	
	public function setMesini($v)
	{

		if ($this->mesini !== $v) {
			$this->mesini = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::MESINI;
		}

	} 
	
	public function setAnoini($v)
	{

		if ($this->anoini !== $v) {
			$this->anoini = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::ANOINI;
		}

	} 
	
	public function setDiafin($v)
	{

		if ($this->diafin !== $v) {
			$this->diafin = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::DIAFIN;
		}

	} 
	
	public function setMesfin($v)
	{

		if ($this->mesfin !== $v) {
			$this->mesfin = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::MESFIN;
		}

	} 
	
	public function setAnofin($v)
	{

		if ($this->anofin !== $v) {
			$this->anofin = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::ANOFIN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpinfcurRenePeer::ID;
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

			$this->feccur = $rs->getDate($startcol + 5, null);

			$this->fecini = $rs->getDate($startcol + 6, null);

			$this->fecfin = $rs->getDate($startcol + 7, null);

			$this->nivest = $rs->getString($startcol + 8);

			$this->diaini = $rs->getString($startcol + 9);

			$this->mesini = $rs->getString($startcol + 10);

			$this->anoini = $rs->getString($startcol + 11);

			$this->diafin = $rs->getString($startcol + 12);

			$this->mesfin = $rs->getString($startcol + 13);

			$this->anofin = $rs->getString($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NpinfcurRene object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpinfcurRenePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfcurRenePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfcurRenePeer::DATABASE_NAME);
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
					$pk = NpinfcurRenePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpinfcurRenePeer::doUpdate($this, $con);
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


			if (($retval = NpinfcurRenePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfcurRenePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFeccur();
				break;
			case 6:
				return $this->getFecini();
				break;
			case 7:
				return $this->getFecfin();
				break;
			case 8:
				return $this->getNivest();
				break;
			case 9:
				return $this->getDiaini();
				break;
			case 10:
				return $this->getMesini();
				break;
			case 11:
				return $this->getAnoini();
				break;
			case 12:
				return $this->getDiafin();
				break;
			case 13:
				return $this->getMesfin();
				break;
			case 14:
				return $this->getAnofin();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfcurRenePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomtit(),
			$keys[2] => $this->getDescur(),
			$keys[3] => $this->getInstit(),
			$keys[4] => $this->getDurcur(),
			$keys[5] => $this->getFeccur(),
			$keys[6] => $this->getFecini(),
			$keys[7] => $this->getFecfin(),
			$keys[8] => $this->getNivest(),
			$keys[9] => $this->getDiaini(),
			$keys[10] => $this->getMesini(),
			$keys[11] => $this->getAnoini(),
			$keys[12] => $this->getDiafin(),
			$keys[13] => $this->getMesfin(),
			$keys[14] => $this->getAnofin(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfcurRenePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFeccur($value);
				break;
			case 6:
				$this->setFecini($value);
				break;
			case 7:
				$this->setFecfin($value);
				break;
			case 8:
				$this->setNivest($value);
				break;
			case 9:
				$this->setDiaini($value);
				break;
			case 10:
				$this->setMesini($value);
				break;
			case 11:
				$this->setAnoini($value);
				break;
			case 12:
				$this->setDiafin($value);
				break;
			case 13:
				$this->setMesfin($value);
				break;
			case 14:
				$this->setAnofin($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfcurRenePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtit($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInstit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDurcur($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFeccur($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecini($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecfin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNivest($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDiaini($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMesini($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAnoini($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDiafin($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMesfin($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAnofin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfcurRenePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfcurRenePeer::CODEMP)) $criteria->add(NpinfcurRenePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfcurRenePeer::NOMTIT)) $criteria->add(NpinfcurRenePeer::NOMTIT, $this->nomtit);
		if ($this->isColumnModified(NpinfcurRenePeer::DESCUR)) $criteria->add(NpinfcurRenePeer::DESCUR, $this->descur);
		if ($this->isColumnModified(NpinfcurRenePeer::INSTIT)) $criteria->add(NpinfcurRenePeer::INSTIT, $this->instit);
		if ($this->isColumnModified(NpinfcurRenePeer::DURCUR)) $criteria->add(NpinfcurRenePeer::DURCUR, $this->durcur);
		if ($this->isColumnModified(NpinfcurRenePeer::FECCUR)) $criteria->add(NpinfcurRenePeer::FECCUR, $this->feccur);
		if ($this->isColumnModified(NpinfcurRenePeer::FECINI)) $criteria->add(NpinfcurRenePeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpinfcurRenePeer::FECFIN)) $criteria->add(NpinfcurRenePeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpinfcurRenePeer::NIVEST)) $criteria->add(NpinfcurRenePeer::NIVEST, $this->nivest);
		if ($this->isColumnModified(NpinfcurRenePeer::DIAINI)) $criteria->add(NpinfcurRenePeer::DIAINI, $this->diaini);
		if ($this->isColumnModified(NpinfcurRenePeer::MESINI)) $criteria->add(NpinfcurRenePeer::MESINI, $this->mesini);
		if ($this->isColumnModified(NpinfcurRenePeer::ANOINI)) $criteria->add(NpinfcurRenePeer::ANOINI, $this->anoini);
		if ($this->isColumnModified(NpinfcurRenePeer::DIAFIN)) $criteria->add(NpinfcurRenePeer::DIAFIN, $this->diafin);
		if ($this->isColumnModified(NpinfcurRenePeer::MESFIN)) $criteria->add(NpinfcurRenePeer::MESFIN, $this->mesfin);
		if ($this->isColumnModified(NpinfcurRenePeer::ANOFIN)) $criteria->add(NpinfcurRenePeer::ANOFIN, $this->anofin);
		if ($this->isColumnModified(NpinfcurRenePeer::ID)) $criteria->add(NpinfcurRenePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfcurRenePeer::DATABASE_NAME);

		$criteria->add(NpinfcurRenePeer::ID, $this->id);

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

		$copyObj->setFeccur($this->feccur);

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
			self::$peer = new NpinfcurRenePeer();
		}
		return self::$peer;
	}

} 