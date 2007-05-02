<?php


abstract class BaseFcsolvencia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsol;


	
	protected $codtip;


	
	protected $fecexp;


	
	protected $fecven;


	
	protected $numlic;


	
	protected $rifcon;


	
	protected $codcat;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $codfue;


	
	protected $stasol;


	
	protected $motivo;


	
	protected $id;

	
	protected $aFctipsol;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsol()
	{

		return $this->codsol;
	}

	
	public function getCodtip()
	{

		return $this->codtip;
	}

	
	public function getFecexp($format = 'Y-m-d')
	{

		if ($this->fecexp === null || $this->fecexp === '') {
			return null;
		} elseif (!is_int($this->fecexp)) {
						$ts = strtotime($this->fecexp);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecexp] as date/time value: " . var_export($this->fecexp, true));
			}
		} else {
			$ts = $this->fecexp;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function getNumlic()
	{

		return $this->numlic;
	}

	
	public function getRifcon()
	{

		return $this->rifcon;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getDircon()
	{

		return $this->dircon;
	}

	
	public function getCodfue()
	{

		return $this->codfue;
	}

	
	public function getStasol()
	{

		return $this->stasol;
	}

	
	public function getMotivo()
	{

		return $this->motivo;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodsol($v)
	{

		if ($this->codsol !== $v) {
			$this->codsol = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::CODSOL;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::CODTIP;
		}

		if ($this->aFctipsol !== null && $this->aFctipsol->getCodtip() !== $v) {
			$this->aFctipsol = null;
		}

	} 
	
	public function setFecexp($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecexp] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecexp !== $ts) {
			$this->fecexp = $ts;
			$this->modifiedColumns[] = FcsolvenciaPeer::FECEXP;
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
			$this->modifiedColumns[] = FcsolvenciaPeer::FECVEN;
		}

	} 
	
	public function setNumlic($v)
	{

		if ($this->numlic !== $v) {
			$this->numlic = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::NUMLIC;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::RIFCON;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::CODCAT;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::DIRCON;
		}

	} 
	
	public function setCodfue($v)
	{

		if ($this->codfue !== $v) {
			$this->codfue = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::CODFUE;
		}

	} 
	
	public function setStasol($v)
	{

		if ($this->stasol !== $v) {
			$this->stasol = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::STASOL;
		}

	} 
	
	public function setMotivo($v)
	{

		if ($this->motivo !== $v) {
			$this->motivo = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::MOTIVO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcsolvenciaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsol = $rs->getString($startcol + 0);

			$this->codtip = $rs->getString($startcol + 1);

			$this->fecexp = $rs->getDate($startcol + 2, null);

			$this->fecven = $rs->getDate($startcol + 3, null);

			$this->numlic = $rs->getString($startcol + 4);

			$this->rifcon = $rs->getString($startcol + 5);

			$this->codcat = $rs->getString($startcol + 6);

			$this->nomcon = $rs->getString($startcol + 7);

			$this->dircon = $rs->getString($startcol + 8);

			$this->codfue = $rs->getString($startcol + 9);

			$this->stasol = $rs->getString($startcol + 10);

			$this->motivo = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcsolvencia object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcsolvenciaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcsolvenciaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcsolvenciaPeer::DATABASE_NAME);
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


												
			if ($this->aFctipsol !== null) {
				if ($this->aFctipsol->isModified()) {
					$affectedRows += $this->aFctipsol->save($con);
				}
				$this->setFctipsol($this->aFctipsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcsolvenciaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcsolvenciaPeer::doUpdate($this, $con);
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


												
			if ($this->aFctipsol !== null) {
				if (!$this->aFctipsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFctipsol->getValidationFailures());
				}
			}


			if (($retval = FcsolvenciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsolvenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsol();
				break;
			case 1:
				return $this->getCodtip();
				break;
			case 2:
				return $this->getFecexp();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getNumlic();
				break;
			case 5:
				return $this->getRifcon();
				break;
			case 6:
				return $this->getCodcat();
				break;
			case 7:
				return $this->getNomcon();
				break;
			case 8:
				return $this->getDircon();
				break;
			case 9:
				return $this->getCodfue();
				break;
			case 10:
				return $this->getStasol();
				break;
			case 11:
				return $this->getMotivo();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsolvenciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsol(),
			$keys[1] => $this->getCodtip(),
			$keys[2] => $this->getFecexp(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getNumlic(),
			$keys[5] => $this->getRifcon(),
			$keys[6] => $this->getCodcat(),
			$keys[7] => $this->getNomcon(),
			$keys[8] => $this->getDircon(),
			$keys[9] => $this->getCodfue(),
			$keys[10] => $this->getStasol(),
			$keys[11] => $this->getMotivo(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsolvenciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsol($value);
				break;
			case 1:
				$this->setCodtip($value);
				break;
			case 2:
				$this->setFecexp($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setNumlic($value);
				break;
			case 5:
				$this->setRifcon($value);
				break;
			case 6:
				$this->setCodcat($value);
				break;
			case 7:
				$this->setNomcon($value);
				break;
			case 8:
				$this->setDircon($value);
				break;
			case 9:
				$this->setCodfue($value);
				break;
			case 10:
				$this->setStasol($value);
				break;
			case 11:
				$this->setMotivo($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsolvenciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumlic($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRifcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomcon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDircon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodfue($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStasol($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMotivo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcsolvenciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcsolvenciaPeer::CODSOL)) $criteria->add(FcsolvenciaPeer::CODSOL, $this->codsol);
		if ($this->isColumnModified(FcsolvenciaPeer::CODTIP)) $criteria->add(FcsolvenciaPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FcsolvenciaPeer::FECEXP)) $criteria->add(FcsolvenciaPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(FcsolvenciaPeer::FECVEN)) $criteria->add(FcsolvenciaPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcsolvenciaPeer::NUMLIC)) $criteria->add(FcsolvenciaPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcsolvenciaPeer::RIFCON)) $criteria->add(FcsolvenciaPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcsolvenciaPeer::CODCAT)) $criteria->add(FcsolvenciaPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(FcsolvenciaPeer::NOMCON)) $criteria->add(FcsolvenciaPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcsolvenciaPeer::DIRCON)) $criteria->add(FcsolvenciaPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcsolvenciaPeer::CODFUE)) $criteria->add(FcsolvenciaPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcsolvenciaPeer::STASOL)) $criteria->add(FcsolvenciaPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(FcsolvenciaPeer::MOTIVO)) $criteria->add(FcsolvenciaPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(FcsolvenciaPeer::ID)) $criteria->add(FcsolvenciaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcsolvenciaPeer::DATABASE_NAME);

		$criteria->add(FcsolvenciaPeer::ID, $this->id);

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

		$copyObj->setCodsol($this->codsol);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumlic($this->numlic);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setCodfue($this->codfue);

		$copyObj->setStasol($this->stasol);

		$copyObj->setMotivo($this->motivo);


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
			self::$peer = new FcsolvenciaPeer();
		}
		return self::$peer;
	}

	
	public function setFctipsol($v)
	{


		if ($v === null) {
			$this->setCodtip(NULL);
		} else {
			$this->setCodtip($v->getCodtip());
		}


		$this->aFctipsol = $v;
	}


	
	public function getFctipsol($con = null)
	{
				include_once 'lib/model/om/BaseFctipsolPeer.php';

		if ($this->aFctipsol === null && (($this->codtip !== "" && $this->codtip !== null))) {

			$this->aFctipsol = FctipsolPeer::retrieveByPK($this->codtip, $con);

			
		}
		return $this->aFctipsol;
	}

} 