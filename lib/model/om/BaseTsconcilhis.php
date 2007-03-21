<?php


abstract class BaseTsconcilhis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $mescon;


	
	protected $anocon;


	
	protected $refere;


	
	protected $movlib;


	
	protected $movban;


	
	protected $feclib;


	
	protected $fecban;


	
	protected $desref;


	
	protected $monlib;


	
	protected $monban;


	
	protected $result;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumcue()
	{

		return $this->numcue;
	}

	
	public function getMescon()
	{

		return $this->mescon;
	}

	
	public function getAnocon()
	{

		return $this->anocon;
	}

	
	public function getRefere()
	{

		return $this->refere;
	}

	
	public function getMovlib()
	{

		return $this->movlib;
	}

	
	public function getMovban()
	{

		return $this->movban;
	}

	
	public function getFeclib($format = 'Y-m-d')
	{

		if ($this->feclib === null || $this->feclib === '') {
			return null;
		} elseif (!is_int($this->feclib)) {
						$ts = strtotime($this->feclib);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feclib] as date/time value: " . var_export($this->feclib, true));
			}
		} else {
			$ts = $this->feclib;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecban($format = 'Y-m-d')
	{

		if ($this->fecban === null || $this->fecban === '') {
			return null;
		} elseif (!is_int($this->fecban)) {
						$ts = strtotime($this->fecban);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecban] as date/time value: " . var_export($this->fecban, true));
			}
		} else {
			$ts = $this->fecban;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDesref()
	{

		return $this->desref;
	}

	
	public function getMonlib()
	{

		return $this->monlib;
	}

	
	public function getMonban()
	{

		return $this->monban;
	}

	
	public function getResult()
	{

		return $this->result;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::NUMCUE;
		}

	} 
	
	public function setMescon($v)
	{

		if ($this->mescon !== $v) {
			$this->mescon = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::MESCON;
		}

	} 
	
	public function setAnocon($v)
	{

		if ($this->anocon !== $v) {
			$this->anocon = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::ANOCON;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::REFERE;
		}

	} 
	
	public function setMovlib($v)
	{

		if ($this->movlib !== $v) {
			$this->movlib = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::MOVLIB;
		}

	} 
	
	public function setMovban($v)
	{

		if ($this->movban !== $v) {
			$this->movban = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::MOVBAN;
		}

	} 
	
	public function setFeclib($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feclib] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feclib !== $ts) {
			$this->feclib = $ts;
			$this->modifiedColumns[] = TsconcilhisPeer::FECLIB;
		}

	} 
	
	public function setFecban($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecban] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecban !== $ts) {
			$this->fecban = $ts;
			$this->modifiedColumns[] = TsconcilhisPeer::FECBAN;
		}

	} 
	
	public function setDesref($v)
	{

		if ($this->desref !== $v) {
			$this->desref = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::DESREF;
		}

	} 
	
	public function setMonlib($v)
	{

		if ($this->monlib !== $v) {
			$this->monlib = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::MONLIB;
		}

	} 
	
	public function setMonban($v)
	{

		if ($this->monban !== $v) {
			$this->monban = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::MONBAN;
		}

	} 
	
	public function setResult($v)
	{

		if ($this->result !== $v) {
			$this->result = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::RESULT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsconcilhisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numcue = $rs->getString($startcol + 0);

			$this->mescon = $rs->getString($startcol + 1);

			$this->anocon = $rs->getString($startcol + 2);

			$this->refere = $rs->getString($startcol + 3);

			$this->movlib = $rs->getString($startcol + 4);

			$this->movban = $rs->getString($startcol + 5);

			$this->feclib = $rs->getDate($startcol + 6, null);

			$this->fecban = $rs->getDate($startcol + 7, null);

			$this->desref = $rs->getString($startcol + 8);

			$this->monlib = $rs->getFloat($startcol + 9);

			$this->monban = $rs->getFloat($startcol + 10);

			$this->result = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsconcilhis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsconcilhisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsconcilhisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsconcilhisPeer::DATABASE_NAME);
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
					$pk = TsconcilhisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsconcilhisPeer::doUpdate($this, $con);
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


			if (($retval = TsconcilhisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsconcilhisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getMescon();
				break;
			case 2:
				return $this->getAnocon();
				break;
			case 3:
				return $this->getRefere();
				break;
			case 4:
				return $this->getMovlib();
				break;
			case 5:
				return $this->getMovban();
				break;
			case 6:
				return $this->getFeclib();
				break;
			case 7:
				return $this->getFecban();
				break;
			case 8:
				return $this->getDesref();
				break;
			case 9:
				return $this->getMonlib();
				break;
			case 10:
				return $this->getMonban();
				break;
			case 11:
				return $this->getResult();
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
		$keys = TsconcilhisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getMescon(),
			$keys[2] => $this->getAnocon(),
			$keys[3] => $this->getRefere(),
			$keys[4] => $this->getMovlib(),
			$keys[5] => $this->getMovban(),
			$keys[6] => $this->getFeclib(),
			$keys[7] => $this->getFecban(),
			$keys[8] => $this->getDesref(),
			$keys[9] => $this->getMonlib(),
			$keys[10] => $this->getMonban(),
			$keys[11] => $this->getResult(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsconcilhisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setMescon($value);
				break;
			case 2:
				$this->setAnocon($value);
				break;
			case 3:
				$this->setRefere($value);
				break;
			case 4:
				$this->setMovlib($value);
				break;
			case 5:
				$this->setMovban($value);
				break;
			case 6:
				$this->setFeclib($value);
				break;
			case 7:
				$this->setFecban($value);
				break;
			case 8:
				$this->setDesref($value);
				break;
			case 9:
				$this->setMonlib($value);
				break;
			case 10:
				$this->setMonban($value);
				break;
			case 11:
				$this->setResult($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsconcilhisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMescon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnocon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefere($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMovlib($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMovban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeclib($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecban($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDesref($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonlib($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonban($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setResult($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsconcilhisPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsconcilhisPeer::NUMCUE)) $criteria->add(TsconcilhisPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsconcilhisPeer::MESCON)) $criteria->add(TsconcilhisPeer::MESCON, $this->mescon);
		if ($this->isColumnModified(TsconcilhisPeer::ANOCON)) $criteria->add(TsconcilhisPeer::ANOCON, $this->anocon);
		if ($this->isColumnModified(TsconcilhisPeer::REFERE)) $criteria->add(TsconcilhisPeer::REFERE, $this->refere);
		if ($this->isColumnModified(TsconcilhisPeer::MOVLIB)) $criteria->add(TsconcilhisPeer::MOVLIB, $this->movlib);
		if ($this->isColumnModified(TsconcilhisPeer::MOVBAN)) $criteria->add(TsconcilhisPeer::MOVBAN, $this->movban);
		if ($this->isColumnModified(TsconcilhisPeer::FECLIB)) $criteria->add(TsconcilhisPeer::FECLIB, $this->feclib);
		if ($this->isColumnModified(TsconcilhisPeer::FECBAN)) $criteria->add(TsconcilhisPeer::FECBAN, $this->fecban);
		if ($this->isColumnModified(TsconcilhisPeer::DESREF)) $criteria->add(TsconcilhisPeer::DESREF, $this->desref);
		if ($this->isColumnModified(TsconcilhisPeer::MONLIB)) $criteria->add(TsconcilhisPeer::MONLIB, $this->monlib);
		if ($this->isColumnModified(TsconcilhisPeer::MONBAN)) $criteria->add(TsconcilhisPeer::MONBAN, $this->monban);
		if ($this->isColumnModified(TsconcilhisPeer::RESULT)) $criteria->add(TsconcilhisPeer::RESULT, $this->result);
		if ($this->isColumnModified(TsconcilhisPeer::ID)) $criteria->add(TsconcilhisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsconcilhisPeer::DATABASE_NAME);

		$criteria->add(TsconcilhisPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setMescon($this->mescon);

		$copyObj->setAnocon($this->anocon);

		$copyObj->setRefere($this->refere);

		$copyObj->setMovlib($this->movlib);

		$copyObj->setMovban($this->movban);

		$copyObj->setFeclib($this->feclib);

		$copyObj->setFecban($this->fecban);

		$copyObj->setDesref($this->desref);

		$copyObj->setMonlib($this->monlib);

		$copyObj->setMonban($this->monban);

		$copyObj->setResult($this->result);


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
			self::$peer = new TsconcilhisPeer();
		}
		return self::$peer;
	}

} 