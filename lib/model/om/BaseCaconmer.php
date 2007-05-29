<?php


abstract class BaseCaconmer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $conmer;


	
	protected $feccon;


	
	protected $descon;


	
	protected $codpro;


	
	protected $numdoc;


	
	protected $moncon;


	
	protected $stacon;


	
	protected $codalm;


	
	protected $numcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getConmer()
	{

		return $this->conmer; 		
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
	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getNumdoc()
	{

		return $this->numdoc; 		
	}
	
	public function getMoncon()
	{

		return number_format($this->moncon,2,',','.');
		
	}
	
	public function getStacon()
	{

		return $this->stacon; 		
	}
	
	public function getCodalm()
	{

		return $this->codalm; 		
	}
	
	public function getNumcom()
	{

		return $this->numcom; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setConmer($v)
	{

		if ($this->conmer !== $v) {
			$this->conmer = $v;
			$this->modifiedColumns[] = CaconmerPeer::CONMER;
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
			$this->modifiedColumns[] = CaconmerPeer::FECCON;
		}

	} 
	
	public function setDescon($v)
	{

		if ($this->descon !== $v) {
			$this->descon = $v;
			$this->modifiedColumns[] = CaconmerPeer::DESCON;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CaconmerPeer::CODPRO;
		}

	} 
	
	public function setNumdoc($v)
	{

		if ($this->numdoc !== $v) {
			$this->numdoc = $v;
			$this->modifiedColumns[] = CaconmerPeer::NUMDOC;
		}

	} 
	
	public function setMoncon($v)
	{

		if ($this->moncon !== $v) {
			$this->moncon = $v;
			$this->modifiedColumns[] = CaconmerPeer::MONCON;
		}

	} 
	
	public function setStacon($v)
	{

		if ($this->stacon !== $v) {
			$this->stacon = $v;
			$this->modifiedColumns[] = CaconmerPeer::STACON;
		}

	} 
	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = CaconmerPeer::CODALM;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = CaconmerPeer::NUMCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaconmerPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->conmer = $rs->getString($startcol + 0);

			$this->feccon = $rs->getDate($startcol + 1, null);

			$this->descon = $rs->getString($startcol + 2);

			$this->codpro = $rs->getString($startcol + 3);

			$this->numdoc = $rs->getString($startcol + 4);

			$this->moncon = $rs->getFloat($startcol + 5);

			$this->stacon = $rs->getString($startcol + 6);

			$this->codalm = $rs->getString($startcol + 7);

			$this->numcom = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caconmer object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaconmerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaconmerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaconmerPeer::DATABASE_NAME);
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
					$pk = CaconmerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaconmerPeer::doUpdate($this, $con);
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


			if (($retval = CaconmerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaconmerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getConmer();
				break;
			case 1:
				return $this->getFeccon();
				break;
			case 2:
				return $this->getDescon();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getNumdoc();
				break;
			case 5:
				return $this->getMoncon();
				break;
			case 6:
				return $this->getStacon();
				break;
			case 7:
				return $this->getCodalm();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaconmerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getConmer(),
			$keys[1] => $this->getFeccon(),
			$keys[2] => $this->getDescon(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getNumdoc(),
			$keys[5] => $this->getMoncon(),
			$keys[6] => $this->getStacon(),
			$keys[7] => $this->getCodalm(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaconmerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setConmer($value);
				break;
			case 1:
				$this->setFeccon($value);
				break;
			case 2:
				$this->setDescon($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setNumdoc($value);
				break;
			case 5:
				$this->setMoncon($value);
				break;
			case 6:
				$this->setStacon($value);
				break;
			case 7:
				$this->setCodalm($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaconmerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setConmer($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStacon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodalm($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaconmerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaconmerPeer::CONMER)) $criteria->add(CaconmerPeer::CONMER, $this->conmer);
		if ($this->isColumnModified(CaconmerPeer::FECCON)) $criteria->add(CaconmerPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CaconmerPeer::DESCON)) $criteria->add(CaconmerPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CaconmerPeer::CODPRO)) $criteria->add(CaconmerPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaconmerPeer::NUMDOC)) $criteria->add(CaconmerPeer::NUMDOC, $this->numdoc);
		if ($this->isColumnModified(CaconmerPeer::MONCON)) $criteria->add(CaconmerPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(CaconmerPeer::STACON)) $criteria->add(CaconmerPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CaconmerPeer::CODALM)) $criteria->add(CaconmerPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CaconmerPeer::NUMCOM)) $criteria->add(CaconmerPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CaconmerPeer::ID)) $criteria->add(CaconmerPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaconmerPeer::DATABASE_NAME);

		$criteria->add(CaconmerPeer::ID, $this->id);

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

		$copyObj->setConmer($this->conmer);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setDescon($this->descon);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNumdoc($this->numdoc);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setStacon($this->stacon);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setNumcom($this->numcom);


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
			self::$peer = new CaconmerPeer();
		}
		return self::$peer;
	}

} 