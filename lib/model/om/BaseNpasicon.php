<?php


abstract class BaseNpasicon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $nomsus;


	
	protected $fecini;


	
	protected $fecexp;


	
	protected $salcon;


	
	protected $monpre;


	
	protected $canmon;


	
	protected $calcon;


	
	protected $actcon;


	
	protected $frecon;


	
	protected $codpre;


	
	protected $monmen;


	
	protected $frecue;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getNomsus()
	{

		return $this->nomsus; 		
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

	
	public function getSalcon()
	{

		return number_format($this->salcon,2,',','.');
		
	}
	
	public function getMonpre()
	{

		return number_format($this->monpre,2,',','.');
		
	}
	
	public function getCanmon()
	{

		return $this->canmon; 		
	}
	
	public function getCalcon()
	{

		return $this->calcon; 		
	}
	
	public function getActcon()
	{

		return $this->actcon; 		
	}
	
	public function getFrecon()
	{

		return $this->frecon; 		
	}
	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getMonmen()
	{

		return number_format($this->monmen,2,',','.');
		
	}
	
	public function getFrecue()
	{

		return number_format($this->frecue,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = NpasiconPeer::CODCAT;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpasiconPeer::CODCAR;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpasiconPeer::CODCON;
		}

	} 
	
	public function setNomsus($v)
	{

		if ($this->nomsus !== $v) {
			$this->nomsus = $v;
			$this->modifiedColumns[] = NpasiconPeer::NOMSUS;
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
			$this->modifiedColumns[] = NpasiconPeer::FECINI;
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
			$this->modifiedColumns[] = NpasiconPeer::FECEXP;
		}

	} 
	
	public function setSalcon($v)
	{

		if ($this->salcon !== $v) {
			$this->salcon = $v;
			$this->modifiedColumns[] = NpasiconPeer::SALCON;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = NpasiconPeer::MONPRE;
		}

	} 
	
	public function setCanmon($v)
	{

		if ($this->canmon !== $v) {
			$this->canmon = $v;
			$this->modifiedColumns[] = NpasiconPeer::CANMON;
		}

	} 
	
	public function setCalcon($v)
	{

		if ($this->calcon !== $v) {
			$this->calcon = $v;
			$this->modifiedColumns[] = NpasiconPeer::CALCON;
		}

	} 
	
	public function setActcon($v)
	{

		if ($this->actcon !== $v) {
			$this->actcon = $v;
			$this->modifiedColumns[] = NpasiconPeer::ACTCON;
		}

	} 
	
	public function setFrecon($v)
	{

		if ($this->frecon !== $v) {
			$this->frecon = $v;
			$this->modifiedColumns[] = NpasiconPeer::FRECON;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = NpasiconPeer::CODPRE;
		}

	} 
	
	public function setMonmen($v)
	{

		if ($this->monmen !== $v) {
			$this->monmen = $v;
			$this->modifiedColumns[] = NpasiconPeer::MONMEN;
		}

	} 
	
	public function setFrecue($v)
	{

		if ($this->frecue !== $v) {
			$this->frecue = $v;
			$this->modifiedColumns[] = NpasiconPeer::FRECUE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpasiconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcat = $rs->getString($startcol + 0);

			$this->codcar = $rs->getString($startcol + 1);

			$this->codcon = $rs->getString($startcol + 2);

			$this->nomsus = $rs->getString($startcol + 3);

			$this->fecini = $rs->getDate($startcol + 4, null);

			$this->fecexp = $rs->getDate($startcol + 5, null);

			$this->salcon = $rs->getFloat($startcol + 6);

			$this->monpre = $rs->getFloat($startcol + 7);

			$this->canmon = $rs->getString($startcol + 8);

			$this->calcon = $rs->getString($startcol + 9);

			$this->actcon = $rs->getString($startcol + 10);

			$this->frecon = $rs->getString($startcol + 11);

			$this->codpre = $rs->getString($startcol + 12);

			$this->monmen = $rs->getFloat($startcol + 13);

			$this->frecue = $rs->getFloat($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npasicon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpasiconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiconPeer::DATABASE_NAME);
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
					$pk = NpasiconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpasiconPeer::doUpdate($this, $con);
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


			if (($retval = NpasiconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getNomsus();
				break;
			case 4:
				return $this->getFecini();
				break;
			case 5:
				return $this->getFecexp();
				break;
			case 6:
				return $this->getSalcon();
				break;
			case 7:
				return $this->getMonpre();
				break;
			case 8:
				return $this->getCanmon();
				break;
			case 9:
				return $this->getCalcon();
				break;
			case 10:
				return $this->getActcon();
				break;
			case 11:
				return $this->getFrecon();
				break;
			case 12:
				return $this->getCodpre();
				break;
			case 13:
				return $this->getMonmen();
				break;
			case 14:
				return $this->getFrecue();
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
		$keys = NpasiconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getNomsus(),
			$keys[4] => $this->getFecini(),
			$keys[5] => $this->getFecexp(),
			$keys[6] => $this->getSalcon(),
			$keys[7] => $this->getMonpre(),
			$keys[8] => $this->getCanmon(),
			$keys[9] => $this->getCalcon(),
			$keys[10] => $this->getActcon(),
			$keys[11] => $this->getFrecon(),
			$keys[12] => $this->getCodpre(),
			$keys[13] => $this->getMonmen(),
			$keys[14] => $this->getFrecue(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setNomsus($value);
				break;
			case 4:
				$this->setFecini($value);
				break;
			case 5:
				$this->setFecexp($value);
				break;
			case 6:
				$this->setSalcon($value);
				break;
			case 7:
				$this->setMonpre($value);
				break;
			case 8:
				$this->setCanmon($value);
				break;
			case 9:
				$this->setCalcon($value);
				break;
			case 10:
				$this->setActcon($value);
				break;
			case 11:
				$this->setFrecon($value);
				break;
			case 12:
				$this->setCodpre($value);
				break;
			case 13:
				$this->setMonmen($value);
				break;
			case 14:
				$this->setFrecue($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomsus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecini($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecexp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSalcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonpre($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanmon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCalcon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setActcon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFrecon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpre($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonmen($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFrecue($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiconPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiconPeer::CODCAT)) $criteria->add(NpasiconPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpasiconPeer::CODCAR)) $criteria->add(NpasiconPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpasiconPeer::CODCON)) $criteria->add(NpasiconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpasiconPeer::NOMSUS)) $criteria->add(NpasiconPeer::NOMSUS, $this->nomsus);
		if ($this->isColumnModified(NpasiconPeer::FECINI)) $criteria->add(NpasiconPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpasiconPeer::FECEXP)) $criteria->add(NpasiconPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(NpasiconPeer::SALCON)) $criteria->add(NpasiconPeer::SALCON, $this->salcon);
		if ($this->isColumnModified(NpasiconPeer::MONPRE)) $criteria->add(NpasiconPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(NpasiconPeer::CANMON)) $criteria->add(NpasiconPeer::CANMON, $this->canmon);
		if ($this->isColumnModified(NpasiconPeer::CALCON)) $criteria->add(NpasiconPeer::CALCON, $this->calcon);
		if ($this->isColumnModified(NpasiconPeer::ACTCON)) $criteria->add(NpasiconPeer::ACTCON, $this->actcon);
		if ($this->isColumnModified(NpasiconPeer::FRECON)) $criteria->add(NpasiconPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(NpasiconPeer::CODPRE)) $criteria->add(NpasiconPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NpasiconPeer::MONMEN)) $criteria->add(NpasiconPeer::MONMEN, $this->monmen);
		if ($this->isColumnModified(NpasiconPeer::FRECUE)) $criteria->add(NpasiconPeer::FRECUE, $this->frecue);
		if ($this->isColumnModified(NpasiconPeer::ID)) $criteria->add(NpasiconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiconPeer::DATABASE_NAME);

		$criteria->add(NpasiconPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNomsus($this->nomsus);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setSalcon($this->salcon);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCanmon($this->canmon);

		$copyObj->setCalcon($this->calcon);

		$copyObj->setActcon($this->actcon);

		$copyObj->setFrecon($this->frecon);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonmen($this->monmen);

		$copyObj->setFrecue($this->frecue);


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
			self::$peer = new NpasiconPeer();
		}
		return self::$peer;
	}

} 