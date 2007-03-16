<?php


abstract class BaseCpsoladidis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $despre;


	
	protected $justificacion;


	
	protected $enunciado;


	
	protected $refadi;


	
	protected $fecadi;


	
	protected $anoadi;


	
	protected $desadi;


	
	protected $desanu;


	
	protected $fecanu;


	
	protected $totadi;


	
	protected $staadi;


	
	protected $adidis;


	
	protected $codart;


	
	protected $stacon;


	
	protected $feccon;


	
	protected $descon;


	
	protected $stagob;


	
	protected $fecgob;


	
	protected $desgob;


	
	protected $stapre;


	
	protected $fecpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDespre()
	{

		return $this->despre;
	}

	
	public function getJustificacion()
	{

		return $this->justificacion;
	}

	
	public function getEnunciado()
	{

		return $this->enunciado;
	}

	
	public function getRefadi()
	{

		return $this->refadi;
	}

	
	public function getFecadi($format = 'Y-m-d')
	{

		if ($this->fecadi === null || $this->fecadi === '') {
			return null;
		} elseif (!is_int($this->fecadi)) {
						$ts = strtotime($this->fecadi);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecadi] as date/time value: " . var_export($this->fecadi, true));
			}
		} else {
			$ts = $this->fecadi;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnoadi()
	{

		return $this->anoadi;
	}

	
	public function getDesadi()
	{

		return $this->desadi;
	}

	
	public function getDesanu()
	{

		return $this->desanu;
	}

	
	public function getFecanu($format = 'Y-m-d')
	{

		if ($this->fecanu === null || $this->fecanu === '') {
			return null;
		} elseif (!is_int($this->fecanu)) {
						$ts = strtotime($this->fecanu);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
			}
		} else {
			$ts = $this->fecanu;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTotadi()
	{

		return $this->totadi;
	}

	
	public function getStaadi()
	{

		return $this->staadi;
	}

	
	public function getAdidis()
	{

		return $this->adidis;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getStacon()
	{

		return $this->stacon;
	}

	
	public function getFeccon($format = 'Y-m-d')
	{

		if ($this->feccon === null || $this->feccon === '') {
			return null;
		} elseif (!is_int($this->feccon)) {
						$ts = strtotime($this->feccon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
			}
		} else {
			$ts = $this->feccon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDescon()
	{

		return $this->descon;
	}

	
	public function getStagob()
	{

		return $this->stagob;
	}

	
	public function getFecgob($format = 'Y-m-d')
	{

		if ($this->fecgob === null || $this->fecgob === '') {
			return null;
		} elseif (!is_int($this->fecgob)) {
						$ts = strtotime($this->fecgob);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecgob] as date/time value: " . var_export($this->fecgob, true));
			}
		} else {
			$ts = $this->fecgob;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDesgob()
	{

		return $this->desgob;
	}

	
	public function getStapre()
	{

		return $this->stapre;
	}

	
	public function getFecpre($format = 'Y-m-d')
	{

		if ($this->fecpre === null || $this->fecpre === '') {
			return null;
		} elseif (!is_int($this->fecpre)) {
						$ts = strtotime($this->fecpre);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
			}
		} else {
			$ts = $this->fecpre;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setDespre($v)
	{

		if ($this->despre !== $v) {
			$this->despre = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::DESPRE;
		}

	} 
	
	public function setJustificacion($v)
	{

		if ($this->justificacion !== $v) {
			$this->justificacion = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::JUSTIFICACION;
		}

	} 
	
	public function setEnunciado($v)
	{

		if ($this->enunciado !== $v) {
			$this->enunciado = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::ENUNCIADO;
		}

	} 
	
	public function setRefadi($v)
	{

		if ($this->refadi !== $v) {
			$this->refadi = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::REFADI;
		}

	} 
	
	public function setFecadi($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecadi] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecadi !== $ts) {
			$this->fecadi = $ts;
			$this->modifiedColumns[] = CpsoladidisPeer::FECADI;
		}

	} 
	
	public function setAnoadi($v)
	{

		if ($this->anoadi !== $v) {
			$this->anoadi = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::ANOADI;
		}

	} 
	
	public function setDesadi($v)
	{

		if ($this->desadi !== $v) {
			$this->desadi = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::DESADI;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::DESANU;
		}

	} 
	
	public function setFecanu($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanu !== $ts) {
			$this->fecanu = $ts;
			$this->modifiedColumns[] = CpsoladidisPeer::FECANU;
		}

	} 
	
	public function setTotadi($v)
	{

		if ($this->totadi !== $v) {
			$this->totadi = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::TOTADI;
		}

	} 
	
	public function setStaadi($v)
	{

		if ($this->staadi !== $v) {
			$this->staadi = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::STAADI;
		}

	} 
	
	public function setAdidis($v)
	{

		if ($this->adidis !== $v) {
			$this->adidis = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::ADIDIS;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::CODART;
		}

	} 
	
	public function setStacon($v)
	{

		if ($this->stacon !== $v) {
			$this->stacon = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::STACON;
		}

	} 
	
	public function setFeccon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccon !== $ts) {
			$this->feccon = $ts;
			$this->modifiedColumns[] = CpsoladidisPeer::FECCON;
		}

	} 
	
	public function setDescon($v)
	{

		if ($this->descon !== $v) {
			$this->descon = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::DESCON;
		}

	} 
	
	public function setStagob($v)
	{

		if ($this->stagob !== $v) {
			$this->stagob = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::STAGOB;
		}

	} 
	
	public function setFecgob($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecgob] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecgob !== $ts) {
			$this->fecgob = $ts;
			$this->modifiedColumns[] = CpsoladidisPeer::FECGOB;
		}

	} 
	
	public function setDesgob($v)
	{

		if ($this->desgob !== $v) {
			$this->desgob = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::DESGOB;
		}

	} 
	
	public function setStapre($v)
	{

		if ($this->stapre !== $v) {
			$this->stapre = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::STAPRE;
		}

	} 
	
	public function setFecpre($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpre !== $ts) {
			$this->fecpre = $ts;
			$this->modifiedColumns[] = CpsoladidisPeer::FECPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpsoladidisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->despre = $rs->getString($startcol + 0);

			$this->justificacion = $rs->getString($startcol + 1);

			$this->enunciado = $rs->getString($startcol + 2);

			$this->refadi = $rs->getString($startcol + 3);

			$this->fecadi = $rs->getDate($startcol + 4, null);

			$this->anoadi = $rs->getString($startcol + 5);

			$this->desadi = $rs->getString($startcol + 6);

			$this->desanu = $rs->getString($startcol + 7);

			$this->fecanu = $rs->getDate($startcol + 8, null);

			$this->totadi = $rs->getFloat($startcol + 9);

			$this->staadi = $rs->getString($startcol + 10);

			$this->adidis = $rs->getString($startcol + 11);

			$this->codart = $rs->getString($startcol + 12);

			$this->stacon = $rs->getString($startcol + 13);

			$this->feccon = $rs->getDate($startcol + 14, null);

			$this->descon = $rs->getString($startcol + 15);

			$this->stagob = $rs->getString($startcol + 16);

			$this->fecgob = $rs->getDate($startcol + 17, null);

			$this->desgob = $rs->getString($startcol + 18);

			$this->stapre = $rs->getString($startcol + 19);

			$this->fecpre = $rs->getDate($startcol + 20, null);

			$this->id = $rs->getInt($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpsoladidis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpsoladidisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpsoladidisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpsoladidisPeer::DATABASE_NAME);
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
					$pk = CpsoladidisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpsoladidisPeer::doUpdate($this, $con);
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


			if (($retval = CpsoladidisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsoladidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDespre();
				break;
			case 1:
				return $this->getJustificacion();
				break;
			case 2:
				return $this->getEnunciado();
				break;
			case 3:
				return $this->getRefadi();
				break;
			case 4:
				return $this->getFecadi();
				break;
			case 5:
				return $this->getAnoadi();
				break;
			case 6:
				return $this->getDesadi();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getTotadi();
				break;
			case 10:
				return $this->getStaadi();
				break;
			case 11:
				return $this->getAdidis();
				break;
			case 12:
				return $this->getCodart();
				break;
			case 13:
				return $this->getStacon();
				break;
			case 14:
				return $this->getFeccon();
				break;
			case 15:
				return $this->getDescon();
				break;
			case 16:
				return $this->getStagob();
				break;
			case 17:
				return $this->getFecgob();
				break;
			case 18:
				return $this->getDesgob();
				break;
			case 19:
				return $this->getStapre();
				break;
			case 20:
				return $this->getFecpre();
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
		$keys = CpsoladidisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDespre(),
			$keys[1] => $this->getJustificacion(),
			$keys[2] => $this->getEnunciado(),
			$keys[3] => $this->getRefadi(),
			$keys[4] => $this->getFecadi(),
			$keys[5] => $this->getAnoadi(),
			$keys[6] => $this->getDesadi(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getTotadi(),
			$keys[10] => $this->getStaadi(),
			$keys[11] => $this->getAdidis(),
			$keys[12] => $this->getCodart(),
			$keys[13] => $this->getStacon(),
			$keys[14] => $this->getFeccon(),
			$keys[15] => $this->getDescon(),
			$keys[16] => $this->getStagob(),
			$keys[17] => $this->getFecgob(),
			$keys[18] => $this->getDesgob(),
			$keys[19] => $this->getStapre(),
			$keys[20] => $this->getFecpre(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsoladidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDespre($value);
				break;
			case 1:
				$this->setJustificacion($value);
				break;
			case 2:
				$this->setEnunciado($value);
				break;
			case 3:
				$this->setRefadi($value);
				break;
			case 4:
				$this->setFecadi($value);
				break;
			case 5:
				$this->setAnoadi($value);
				break;
			case 6:
				$this->setDesadi($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setTotadi($value);
				break;
			case 10:
				$this->setStaadi($value);
				break;
			case 11:
				$this->setAdidis($value);
				break;
			case 12:
				$this->setCodart($value);
				break;
			case 13:
				$this->setStacon($value);
				break;
			case 14:
				$this->setFeccon($value);
				break;
			case 15:
				$this->setDescon($value);
				break;
			case 16:
				$this->setStagob($value);
				break;
			case 17:
				$this->setFecgob($value);
				break;
			case 18:
				$this->setDesgob($value);
				break;
			case 19:
				$this->setStapre($value);
				break;
			case 20:
				$this->setFecpre($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoladidisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDespre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setJustificacion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEnunciado($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecadi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnoadi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesadi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTotadi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaadi($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAdidis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodart($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStacon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFeccon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDescon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setStagob($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecgob($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDesgob($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setStapre($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecpre($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpsoladidisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpsoladidisPeer::DESPRE)) $criteria->add(CpsoladidisPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(CpsoladidisPeer::JUSTIFICACION)) $criteria->add(CpsoladidisPeer::JUSTIFICACION, $this->justificacion);
		if ($this->isColumnModified(CpsoladidisPeer::ENUNCIADO)) $criteria->add(CpsoladidisPeer::ENUNCIADO, $this->enunciado);
		if ($this->isColumnModified(CpsoladidisPeer::REFADI)) $criteria->add(CpsoladidisPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpsoladidisPeer::FECADI)) $criteria->add(CpsoladidisPeer::FECADI, $this->fecadi);
		if ($this->isColumnModified(CpsoladidisPeer::ANOADI)) $criteria->add(CpsoladidisPeer::ANOADI, $this->anoadi);
		if ($this->isColumnModified(CpsoladidisPeer::DESADI)) $criteria->add(CpsoladidisPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(CpsoladidisPeer::DESANU)) $criteria->add(CpsoladidisPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpsoladidisPeer::FECANU)) $criteria->add(CpsoladidisPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpsoladidisPeer::TOTADI)) $criteria->add(CpsoladidisPeer::TOTADI, $this->totadi);
		if ($this->isColumnModified(CpsoladidisPeer::STAADI)) $criteria->add(CpsoladidisPeer::STAADI, $this->staadi);
		if ($this->isColumnModified(CpsoladidisPeer::ADIDIS)) $criteria->add(CpsoladidisPeer::ADIDIS, $this->adidis);
		if ($this->isColumnModified(CpsoladidisPeer::CODART)) $criteria->add(CpsoladidisPeer::CODART, $this->codart);
		if ($this->isColumnModified(CpsoladidisPeer::STACON)) $criteria->add(CpsoladidisPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CpsoladidisPeer::FECCON)) $criteria->add(CpsoladidisPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CpsoladidisPeer::DESCON)) $criteria->add(CpsoladidisPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CpsoladidisPeer::STAGOB)) $criteria->add(CpsoladidisPeer::STAGOB, $this->stagob);
		if ($this->isColumnModified(CpsoladidisPeer::FECGOB)) $criteria->add(CpsoladidisPeer::FECGOB, $this->fecgob);
		if ($this->isColumnModified(CpsoladidisPeer::DESGOB)) $criteria->add(CpsoladidisPeer::DESGOB, $this->desgob);
		if ($this->isColumnModified(CpsoladidisPeer::STAPRE)) $criteria->add(CpsoladidisPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(CpsoladidisPeer::FECPRE)) $criteria->add(CpsoladidisPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(CpsoladidisPeer::ID)) $criteria->add(CpsoladidisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpsoladidisPeer::DATABASE_NAME);

		$criteria->add(CpsoladidisPeer::ID, $this->id);

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

		$copyObj->setDespre($this->despre);

		$copyObj->setJustificacion($this->justificacion);

		$copyObj->setEnunciado($this->enunciado);

		$copyObj->setRefadi($this->refadi);

		$copyObj->setFecadi($this->fecadi);

		$copyObj->setAnoadi($this->anoadi);

		$copyObj->setDesadi($this->desadi);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setTotadi($this->totadi);

		$copyObj->setStaadi($this->staadi);

		$copyObj->setAdidis($this->adidis);

		$copyObj->setCodart($this->codart);

		$copyObj->setStacon($this->stacon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setDescon($this->descon);

		$copyObj->setStagob($this->stagob);

		$copyObj->setFecgob($this->fecgob);

		$copyObj->setDesgob($this->desgob);

		$copyObj->setStapre($this->stapre);

		$copyObj->setFecpre($this->fecpre);


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
			self::$peer = new CpsoladidisPeer();
		}
		return self::$peer;
	}

} 