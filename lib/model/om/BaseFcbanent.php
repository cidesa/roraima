<?php


abstract class BaseFcbanent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddoc;


	
	protected $codfun;


	
	protected $codentext;


	
	protected $codtipdoc;


	
	protected $fecdoc;


	
	protected $hordoc;


	
	protected $fecres;


	
	protected $asunto;


	
	protected $codubifis;


	
	protected $fecubifis;


	
	protected $horubifis;


	
	protected $codubimag;


	
	protected $fecubimag;


	
	protected $horubimag;


	
	protected $id;

	
	protected $aFcdeffun;

	
	protected $aFcdefentext;

	
	protected $aFcdeftipdoc;

	
	protected $aFcdefubifis;

	
	protected $aFcdefubimag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddoc()
	{

		return $this->coddoc;
	}

	
	public function getCodfun()
	{

		return $this->codfun;
	}

	
	public function getCodentext()
	{

		return $this->codentext;
	}

	
	public function getCodtipdoc()
	{

		return $this->codtipdoc;
	}

	
	public function getFecdoc($format = 'Y-m-d')
	{

		if ($this->fecdoc === null || $this->fecdoc === '') {
			return null;
		} elseif (!is_int($this->fecdoc)) {
						$ts = strtotime($this->fecdoc);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdoc] as date/time value: " . var_export($this->fecdoc, true));
			}
		} else {
			$ts = $this->fecdoc;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHordoc($format = 'Y-m-d')
	{

		if ($this->hordoc === null || $this->hordoc === '') {
			return null;
		} elseif (!is_int($this->hordoc)) {
						$ts = strtotime($this->hordoc);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [hordoc] as date/time value: " . var_export($this->hordoc, true));
			}
		} else {
			$ts = $this->hordoc;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecres($format = 'Y-m-d')
	{

		if ($this->fecres === null || $this->fecres === '') {
			return null;
		} elseif (!is_int($this->fecres)) {
						$ts = strtotime($this->fecres);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
			}
		} else {
			$ts = $this->fecres;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAsunto()
	{

		return $this->asunto;
	}

	
	public function getCodubifis()
	{

		return $this->codubifis;
	}

	
	public function getFecubifis($format = 'Y-m-d')
	{

		if ($this->fecubifis === null || $this->fecubifis === '') {
			return null;
		} elseif (!is_int($this->fecubifis)) {
						$ts = strtotime($this->fecubifis);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecubifis] as date/time value: " . var_export($this->fecubifis, true));
			}
		} else {
			$ts = $this->fecubifis;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorubifis($format = 'Y-m-d')
	{

		if ($this->horubifis === null || $this->horubifis === '') {
			return null;
		} elseif (!is_int($this->horubifis)) {
						$ts = strtotime($this->horubifis);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horubifis] as date/time value: " . var_export($this->horubifis, true));
			}
		} else {
			$ts = $this->horubifis;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodubimag()
	{

		return $this->codubimag;
	}

	
	public function getFecubimag($format = 'Y-m-d')
	{

		if ($this->fecubimag === null || $this->fecubimag === '') {
			return null;
		} elseif (!is_int($this->fecubimag)) {
						$ts = strtotime($this->fecubimag);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecubimag] as date/time value: " . var_export($this->fecubimag, true));
			}
		} else {
			$ts = $this->fecubimag;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorubimag($format = 'Y-m-d')
	{

		if ($this->horubimag === null || $this->horubimag === '') {
			return null;
		} elseif (!is_int($this->horubimag)) {
						$ts = strtotime($this->horubimag);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horubimag] as date/time value: " . var_export($this->horubimag, true));
			}
		} else {
			$ts = $this->horubimag;
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

	
	public function setCoddoc($v)
	{

		if ($this->coddoc !== $v) {
			$this->coddoc = $v;
			$this->modifiedColumns[] = FcbanentPeer::CODDOC;
		}

	} 
	
	public function setCodfun($v)
	{

		if ($this->codfun !== $v) {
			$this->codfun = $v;
			$this->modifiedColumns[] = FcbanentPeer::CODFUN;
		}

		if ($this->aFcdeffun !== null && $this->aFcdeffun->getCodfun() !== $v) {
			$this->aFcdeffun = null;
		}

	} 
	
	public function setCodentext($v)
	{

		if ($this->codentext !== $v) {
			$this->codentext = $v;
			$this->modifiedColumns[] = FcbanentPeer::CODENTEXT;
		}

		if ($this->aFcdefentext !== null && $this->aFcdefentext->getCodentext() !== $v) {
			$this->aFcdefentext = null;
		}

	} 
	
	public function setCodtipdoc($v)
	{

		if ($this->codtipdoc !== $v) {
			$this->codtipdoc = $v;
			$this->modifiedColumns[] = FcbanentPeer::CODTIPDOC;
		}

		if ($this->aFcdeftipdoc !== null && $this->aFcdeftipdoc->getCodtipdoc() !== $v) {
			$this->aFcdeftipdoc = null;
		}

	} 
	
	public function setFecdoc($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdoc] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdoc !== $ts) {
			$this->fecdoc = $ts;
			$this->modifiedColumns[] = FcbanentPeer::FECDOC;
		}

	} 
	
	public function setHordoc($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [hordoc] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->hordoc !== $ts) {
			$this->hordoc = $ts;
			$this->modifiedColumns[] = FcbanentPeer::HORDOC;
		}

	} 
	
	public function setFecres($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecres !== $ts) {
			$this->fecres = $ts;
			$this->modifiedColumns[] = FcbanentPeer::FECRES;
		}

	} 
	
	public function setAsunto($v)
	{

		if ($this->asunto !== $v) {
			$this->asunto = $v;
			$this->modifiedColumns[] = FcbanentPeer::ASUNTO;
		}

	} 
	
	public function setCodubifis($v)
	{

		if ($this->codubifis !== $v) {
			$this->codubifis = $v;
			$this->modifiedColumns[] = FcbanentPeer::CODUBIFIS;
		}

		if ($this->aFcdefubifis !== null && $this->aFcdefubifis->getCodubifis() !== $v) {
			$this->aFcdefubifis = null;
		}

	} 
	
	public function setFecubifis($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecubifis] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecubifis !== $ts) {
			$this->fecubifis = $ts;
			$this->modifiedColumns[] = FcbanentPeer::FECUBIFIS;
		}

	} 
	
	public function setHorubifis($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horubifis] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horubifis !== $ts) {
			$this->horubifis = $ts;
			$this->modifiedColumns[] = FcbanentPeer::HORUBIFIS;
		}

	} 
	
	public function setCodubimag($v)
	{

		if ($this->codubimag !== $v) {
			$this->codubimag = $v;
			$this->modifiedColumns[] = FcbanentPeer::CODUBIMAG;
		}

		if ($this->aFcdefubimag !== null && $this->aFcdefubimag->getCodubimag() !== $v) {
			$this->aFcdefubimag = null;
		}

	} 
	
	public function setFecubimag($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecubimag] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecubimag !== $ts) {
			$this->fecubimag = $ts;
			$this->modifiedColumns[] = FcbanentPeer::FECUBIMAG;
		}

	} 
	
	public function setHorubimag($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horubimag] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horubimag !== $ts) {
			$this->horubimag = $ts;
			$this->modifiedColumns[] = FcbanentPeer::HORUBIMAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcbanentPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddoc = $rs->getString($startcol + 0);

			$this->codfun = $rs->getString($startcol + 1);

			$this->codentext = $rs->getString($startcol + 2);

			$this->codtipdoc = $rs->getString($startcol + 3);

			$this->fecdoc = $rs->getDate($startcol + 4, null);

			$this->hordoc = $rs->getDate($startcol + 5, null);

			$this->fecres = $rs->getDate($startcol + 6, null);

			$this->asunto = $rs->getString($startcol + 7);

			$this->codubifis = $rs->getString($startcol + 8);

			$this->fecubifis = $rs->getDate($startcol + 9, null);

			$this->horubifis = $rs->getDate($startcol + 10, null);

			$this->codubimag = $rs->getString($startcol + 11);

			$this->fecubimag = $rs->getDate($startcol + 12, null);

			$this->horubimag = $rs->getDate($startcol + 13, null);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcbanent object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcbanentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcbanentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcbanentPeer::DATABASE_NAME);
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


												
			if ($this->aFcdeffun !== null) {
				if ($this->aFcdeffun->isModified()) {
					$affectedRows += $this->aFcdeffun->save($con);
				}
				$this->setFcdeffun($this->aFcdeffun);
			}

			if ($this->aFcdefentext !== null) {
				if ($this->aFcdefentext->isModified()) {
					$affectedRows += $this->aFcdefentext->save($con);
				}
				$this->setFcdefentext($this->aFcdefentext);
			}

			if ($this->aFcdeftipdoc !== null) {
				if ($this->aFcdeftipdoc->isModified()) {
					$affectedRows += $this->aFcdeftipdoc->save($con);
				}
				$this->setFcdeftipdoc($this->aFcdeftipdoc);
			}

			if ($this->aFcdefubifis !== null) {
				if ($this->aFcdefubifis->isModified()) {
					$affectedRows += $this->aFcdefubifis->save($con);
				}
				$this->setFcdefubifis($this->aFcdefubifis);
			}

			if ($this->aFcdefubimag !== null) {
				if ($this->aFcdefubimag->isModified()) {
					$affectedRows += $this->aFcdefubimag->save($con);
				}
				$this->setFcdefubimag($this->aFcdefubimag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcbanentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcbanentPeer::doUpdate($this, $con);
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


												
			if ($this->aFcdeffun !== null) {
				if (!$this->aFcdeffun->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdeffun->getValidationFailures());
				}
			}

			if ($this->aFcdefentext !== null) {
				if (!$this->aFcdefentext->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefentext->getValidationFailures());
				}
			}

			if ($this->aFcdeftipdoc !== null) {
				if (!$this->aFcdeftipdoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdeftipdoc->getValidationFailures());
				}
			}

			if ($this->aFcdefubifis !== null) {
				if (!$this->aFcdefubifis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefubifis->getValidationFailures());
				}
			}

			if ($this->aFcdefubimag !== null) {
				if (!$this->aFcdefubimag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcdefubimag->getValidationFailures());
				}
			}


			if (($retval = FcbanentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcbanentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddoc();
				break;
			case 1:
				return $this->getCodfun();
				break;
			case 2:
				return $this->getCodentext();
				break;
			case 3:
				return $this->getCodtipdoc();
				break;
			case 4:
				return $this->getFecdoc();
				break;
			case 5:
				return $this->getHordoc();
				break;
			case 6:
				return $this->getFecres();
				break;
			case 7:
				return $this->getAsunto();
				break;
			case 8:
				return $this->getCodubifis();
				break;
			case 9:
				return $this->getFecubifis();
				break;
			case 10:
				return $this->getHorubifis();
				break;
			case 11:
				return $this->getCodubimag();
				break;
			case 12:
				return $this->getFecubimag();
				break;
			case 13:
				return $this->getHorubimag();
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
		$keys = FcbanentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddoc(),
			$keys[1] => $this->getCodfun(),
			$keys[2] => $this->getCodentext(),
			$keys[3] => $this->getCodtipdoc(),
			$keys[4] => $this->getFecdoc(),
			$keys[5] => $this->getHordoc(),
			$keys[6] => $this->getFecres(),
			$keys[7] => $this->getAsunto(),
			$keys[8] => $this->getCodubifis(),
			$keys[9] => $this->getFecubifis(),
			$keys[10] => $this->getHorubifis(),
			$keys[11] => $this->getCodubimag(),
			$keys[12] => $this->getFecubimag(),
			$keys[13] => $this->getHorubimag(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcbanentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddoc($value);
				break;
			case 1:
				$this->setCodfun($value);
				break;
			case 2:
				$this->setCodentext($value);
				break;
			case 3:
				$this->setCodtipdoc($value);
				break;
			case 4:
				$this->setFecdoc($value);
				break;
			case 5:
				$this->setHordoc($value);
				break;
			case 6:
				$this->setFecres($value);
				break;
			case 7:
				$this->setAsunto($value);
				break;
			case 8:
				$this->setCodubifis($value);
				break;
			case 9:
				$this->setFecubifis($value);
				break;
			case 10:
				$this->setHorubifis($value);
				break;
			case 11:
				$this->setCodubimag($value);
				break;
			case 12:
				$this->setFecubimag($value);
				break;
			case 13:
				$this->setHorubimag($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcbanentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodentext($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtipdoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHordoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecres($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAsunto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodubifis($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecubifis($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setHorubifis($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodubimag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecubimag($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setHorubimag($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcbanentPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcbanentPeer::CODDOC)) $criteria->add(FcbanentPeer::CODDOC, $this->coddoc);
		if ($this->isColumnModified(FcbanentPeer::CODFUN)) $criteria->add(FcbanentPeer::CODFUN, $this->codfun);
		if ($this->isColumnModified(FcbanentPeer::CODENTEXT)) $criteria->add(FcbanentPeer::CODENTEXT, $this->codentext);
		if ($this->isColumnModified(FcbanentPeer::CODTIPDOC)) $criteria->add(FcbanentPeer::CODTIPDOC, $this->codtipdoc);
		if ($this->isColumnModified(FcbanentPeer::FECDOC)) $criteria->add(FcbanentPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(FcbanentPeer::HORDOC)) $criteria->add(FcbanentPeer::HORDOC, $this->hordoc);
		if ($this->isColumnModified(FcbanentPeer::FECRES)) $criteria->add(FcbanentPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(FcbanentPeer::ASUNTO)) $criteria->add(FcbanentPeer::ASUNTO, $this->asunto);
		if ($this->isColumnModified(FcbanentPeer::CODUBIFIS)) $criteria->add(FcbanentPeer::CODUBIFIS, $this->codubifis);
		if ($this->isColumnModified(FcbanentPeer::FECUBIFIS)) $criteria->add(FcbanentPeer::FECUBIFIS, $this->fecubifis);
		if ($this->isColumnModified(FcbanentPeer::HORUBIFIS)) $criteria->add(FcbanentPeer::HORUBIFIS, $this->horubifis);
		if ($this->isColumnModified(FcbanentPeer::CODUBIMAG)) $criteria->add(FcbanentPeer::CODUBIMAG, $this->codubimag);
		if ($this->isColumnModified(FcbanentPeer::FECUBIMAG)) $criteria->add(FcbanentPeer::FECUBIMAG, $this->fecubimag);
		if ($this->isColumnModified(FcbanentPeer::HORUBIMAG)) $criteria->add(FcbanentPeer::HORUBIMAG, $this->horubimag);
		if ($this->isColumnModified(FcbanentPeer::ID)) $criteria->add(FcbanentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcbanentPeer::DATABASE_NAME);

		$criteria->add(FcbanentPeer::CODDOC, $this->coddoc);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCoddoc();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCoddoc($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodfun($this->codfun);

		$copyObj->setCodentext($this->codentext);

		$copyObj->setCodtipdoc($this->codtipdoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setHordoc($this->hordoc);

		$copyObj->setFecres($this->fecres);

		$copyObj->setAsunto($this->asunto);

		$copyObj->setCodubifis($this->codubifis);

		$copyObj->setFecubifis($this->fecubifis);

		$copyObj->setHorubifis($this->horubifis);

		$copyObj->setCodubimag($this->codubimag);

		$copyObj->setFecubimag($this->fecubimag);

		$copyObj->setHorubimag($this->horubimag);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCoddoc(NULL); 
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
			self::$peer = new FcbanentPeer();
		}
		return self::$peer;
	}

	
	public function setFcdeffun($v)
	{


		if ($v === null) {
			$this->setCodfun(NULL);
		} else {
			$this->setCodfun($v->getCodfun());
		}


		$this->aFcdeffun = $v;
	}


	
	public function getFcdeffun($con = null)
	{
				include_once 'lib/model/om/BaseFcdeffunPeer.php';

		if ($this->aFcdeffun === null && (($this->codfun !== "" && $this->codfun !== null))) {

			$this->aFcdeffun = FcdeffunPeer::retrieveByPK($this->codfun, $con);

			
		}
		return $this->aFcdeffun;
	}

	
	public function setFcdefentext($v)
	{


		if ($v === null) {
			$this->setCodentext(NULL);
		} else {
			$this->setCodentext($v->getCodentext());
		}


		$this->aFcdefentext = $v;
	}


	
	public function getFcdefentext($con = null)
	{
				include_once 'lib/model/om/BaseFcdefentextPeer.php';

		if ($this->aFcdefentext === null && (($this->codentext !== "" && $this->codentext !== null))) {

			$this->aFcdefentext = FcdefentextPeer::retrieveByPK($this->codentext, $con);

			
		}
		return $this->aFcdefentext;
	}

	
	public function setFcdeftipdoc($v)
	{


		if ($v === null) {
			$this->setCodtipdoc(NULL);
		} else {
			$this->setCodtipdoc($v->getCodtipdoc());
		}


		$this->aFcdeftipdoc = $v;
	}


	
	public function getFcdeftipdoc($con = null)
	{
				include_once 'lib/model/om/BaseFcdeftipdocPeer.php';

		if ($this->aFcdeftipdoc === null && (($this->codtipdoc !== "" && $this->codtipdoc !== null))) {

			$this->aFcdeftipdoc = FcdeftipdocPeer::retrieveByPK($this->codtipdoc, $con);

			
		}
		return $this->aFcdeftipdoc;
	}

	
	public function setFcdefubifis($v)
	{


		if ($v === null) {
			$this->setCodubifis(NULL);
		} else {
			$this->setCodubifis($v->getCodubifis());
		}


		$this->aFcdefubifis = $v;
	}


	
	public function getFcdefubifis($con = null)
	{
				include_once 'lib/model/om/BaseFcdefubifisPeer.php';

		if ($this->aFcdefubifis === null && (($this->codubifis !== "" && $this->codubifis !== null))) {

			$this->aFcdefubifis = FcdefubifisPeer::retrieveByPK($this->codubifis, $con);

			
		}
		return $this->aFcdefubifis;
	}

	
	public function setFcdefubimag($v)
	{


		if ($v === null) {
			$this->setCodubimag(NULL);
		} else {
			$this->setCodubimag($v->getCodubimag());
		}


		$this->aFcdefubimag = $v;
	}


	
	public function getFcdefubimag($con = null)
	{
				include_once 'lib/model/om/BaseFcdefubimagPeer.php';

		if ($this->aFcdefubimag === null && (($this->codubimag !== "" && $this->codubimag !== null))) {

			$this->aFcdefubimag = FcdefubimagPeer::retrieveByPK($this->codubimag, $con);

			
		}
		return $this->aFcdefubimag;
	}

} 