<?php


abstract class BasePagtransa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $fectra;


	
	protected $codpro;


	
	protected $codmov;


	
	protected $destra;


	
	protected $montra;


	
	protected $totdsc;


	
	protected $totrec;


	
	protected $tottra;


	
	protected $staimp;


	
	protected $numche;


	
	protected $desanu;


	
	protected $fecanu;


	
	protected $rifpro;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumtra()
	{

		return $this->numtra; 		
	}
	
	public function getFectra($format = 'Y-m-d')
	{

		if ($this->fectra === null || $this->fectra === '') {
			return null;
		} elseif (!is_int($this->fectra)) {
						$ts = strtotime($this->fectra);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
			}
		} else {
			$ts = $this->fectra;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getCodmov()
	{

		return $this->codmov; 		
	}
	
	public function getDestra()
	{

		return $this->destra; 		
	}
	
	public function getMontra()
	{

		return number_format($this->montra,2,',','.');
		
	}
	
	public function getTotdsc()
	{

		return number_format($this->totdsc,2,',','.');
		
	}
	
	public function getTotrec()
	{

		return number_format($this->totrec,2,',','.');
		
	}
	
	public function getTottra()
	{

		return number_format($this->tottra,2,',','.');
		
	}
	
	public function getStaimp()
	{

		return $this->staimp; 		
	}
	
	public function getNumche()
	{

		return $this->numche; 		
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

	
	public function getRifpro()
	{

		return $this->rifpro; 		
	}
	
	public function getNumcom()
	{

		return $this->numcom; 		
	}
	
	public function getFeccom($format = 'Y-m-d')
	{

		if ($this->feccom === null || $this->feccom === '') {
			return null;
		} elseif (!is_int($this->feccom)) {
						$ts = strtotime($this->feccom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
			}
		} else {
			$ts = $this->feccom;
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
	
	public function setNumtra($v)
	{

		if ($this->numtra !== $v) {
			$this->numtra = $v;
			$this->modifiedColumns[] = PagtransaPeer::NUMTRA;
		}

	} 
	
	public function setFectra($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fectra !== $ts) {
			$this->fectra = $ts;
			$this->modifiedColumns[] = PagtransaPeer::FECTRA;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = PagtransaPeer::CODPRO;
		}

	} 
	
	public function setCodmov($v)
	{

		if ($this->codmov !== $v) {
			$this->codmov = $v;
			$this->modifiedColumns[] = PagtransaPeer::CODMOV;
		}

	} 
	
	public function setDestra($v)
	{

		if ($this->destra !== $v) {
			$this->destra = $v;
			$this->modifiedColumns[] = PagtransaPeer::DESTRA;
		}

	} 
	
	public function setMontra($v)
	{

		if ($this->montra !== $v) {
			$this->montra = $v;
			$this->modifiedColumns[] = PagtransaPeer::MONTRA;
		}

	} 
	
	public function setTotdsc($v)
	{

		if ($this->totdsc !== $v) {
			$this->totdsc = $v;
			$this->modifiedColumns[] = PagtransaPeer::TOTDSC;
		}

	} 
	
	public function setTotrec($v)
	{

		if ($this->totrec !== $v) {
			$this->totrec = $v;
			$this->modifiedColumns[] = PagtransaPeer::TOTREC;
		}

	} 
	
	public function setTottra($v)
	{

		if ($this->tottra !== $v) {
			$this->tottra = $v;
			$this->modifiedColumns[] = PagtransaPeer::TOTTRA;
		}

	} 
	
	public function setStaimp($v)
	{

		if ($this->staimp !== $v) {
			$this->staimp = $v;
			$this->modifiedColumns[] = PagtransaPeer::STAIMP;
		}

	} 
	
	public function setNumche($v)
	{

		if ($this->numche !== $v) {
			$this->numche = $v;
			$this->modifiedColumns[] = PagtransaPeer::NUMCHE;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = PagtransaPeer::DESANU;
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
			$this->modifiedColumns[] = PagtransaPeer::FECANU;
		}

	} 
	
	public function setRifpro($v)
	{

		if ($this->rifpro !== $v) {
			$this->rifpro = $v;
			$this->modifiedColumns[] = PagtransaPeer::RIFPRO;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = PagtransaPeer::NUMCOM;
		}

	} 
	
	public function setFeccom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccom !== $ts) {
			$this->feccom = $ts;
			$this->modifiedColumns[] = PagtransaPeer::FECCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PagtransaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numtra = $rs->getString($startcol + 0);

			$this->fectra = $rs->getDate($startcol + 1, null);

			$this->codpro = $rs->getString($startcol + 2);

			$this->codmov = $rs->getString($startcol + 3);

			$this->destra = $rs->getString($startcol + 4);

			$this->montra = $rs->getFloat($startcol + 5);

			$this->totdsc = $rs->getFloat($startcol + 6);

			$this->totrec = $rs->getFloat($startcol + 7);

			$this->tottra = $rs->getFloat($startcol + 8);

			$this->staimp = $rs->getString($startcol + 9);

			$this->numche = $rs->getString($startcol + 10);

			$this->desanu = $rs->getString($startcol + 11);

			$this->fecanu = $rs->getDate($startcol + 12, null);

			$this->rifpro = $rs->getString($startcol + 13);

			$this->numcom = $rs->getString($startcol + 14);

			$this->feccom = $rs->getDate($startcol + 15, null);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pagtransa object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PagtransaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PagtransaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PagtransaPeer::DATABASE_NAME);
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
					$pk = PagtransaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += PagtransaPeer::doUpdate($this, $con);
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


			if (($retval = PagtransaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PagtransaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getCodmov();
				break;
			case 4:
				return $this->getDestra();
				break;
			case 5:
				return $this->getMontra();
				break;
			case 6:
				return $this->getTotdsc();
				break;
			case 7:
				return $this->getTotrec();
				break;
			case 8:
				return $this->getTottra();
				break;
			case 9:
				return $this->getStaimp();
				break;
			case 10:
				return $this->getNumche();
				break;
			case 11:
				return $this->getDesanu();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getRifpro();
				break;
			case 14:
				return $this->getNumcom();
				break;
			case 15:
				return $this->getFeccom();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PagtransaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getCodmov(),
			$keys[4] => $this->getDestra(),
			$keys[5] => $this->getMontra(),
			$keys[6] => $this->getTotdsc(),
			$keys[7] => $this->getTotrec(),
			$keys[8] => $this->getTottra(),
			$keys[9] => $this->getStaimp(),
			$keys[10] => $this->getNumche(),
			$keys[11] => $this->getDesanu(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getRifpro(),
			$keys[14] => $this->getNumcom(),
			$keys[15] => $this->getFeccom(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PagtransaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setCodmov($value);
				break;
			case 4:
				$this->setDestra($value);
				break;
			case 5:
				$this->setMontra($value);
				break;
			case 6:
				$this->setTotdsc($value);
				break;
			case 7:
				$this->setTotrec($value);
				break;
			case 8:
				$this->setTottra($value);
				break;
			case 9:
				$this->setStaimp($value);
				break;
			case 10:
				$this->setNumche($value);
				break;
			case 11:
				$this->setDesanu($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setRifpro($value);
				break;
			case 14:
				$this->setNumcom($value);
				break;
			case 15:
				$this->setFeccom($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PagtransaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDestra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotdsc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTotrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTottra($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStaimp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumche($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDesanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRifpro($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNumcom($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFeccom($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PagtransaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PagtransaPeer::NUMTRA)) $criteria->add(PagtransaPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(PagtransaPeer::FECTRA)) $criteria->add(PagtransaPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(PagtransaPeer::CODPRO)) $criteria->add(PagtransaPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(PagtransaPeer::CODMOV)) $criteria->add(PagtransaPeer::CODMOV, $this->codmov);
		if ($this->isColumnModified(PagtransaPeer::DESTRA)) $criteria->add(PagtransaPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(PagtransaPeer::MONTRA)) $criteria->add(PagtransaPeer::MONTRA, $this->montra);
		if ($this->isColumnModified(PagtransaPeer::TOTDSC)) $criteria->add(PagtransaPeer::TOTDSC, $this->totdsc);
		if ($this->isColumnModified(PagtransaPeer::TOTREC)) $criteria->add(PagtransaPeer::TOTREC, $this->totrec);
		if ($this->isColumnModified(PagtransaPeer::TOTTRA)) $criteria->add(PagtransaPeer::TOTTRA, $this->tottra);
		if ($this->isColumnModified(PagtransaPeer::STAIMP)) $criteria->add(PagtransaPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(PagtransaPeer::NUMCHE)) $criteria->add(PagtransaPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(PagtransaPeer::DESANU)) $criteria->add(PagtransaPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(PagtransaPeer::FECANU)) $criteria->add(PagtransaPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(PagtransaPeer::RIFPRO)) $criteria->add(PagtransaPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(PagtransaPeer::NUMCOM)) $criteria->add(PagtransaPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(PagtransaPeer::FECCOM)) $criteria->add(PagtransaPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(PagtransaPeer::ID)) $criteria->add(PagtransaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PagtransaPeer::DATABASE_NAME);

		$criteria->add(PagtransaPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodmov($this->codmov);

		$copyObj->setDestra($this->destra);

		$copyObj->setMontra($this->montra);

		$copyObj->setTotdsc($this->totdsc);

		$copyObj->setTotrec($this->totrec);

		$copyObj->setTottra($this->tottra);

		$copyObj->setStaimp($this->staimp);

		$copyObj->setNumche($this->numche);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);


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
			self::$peer = new PagtransaPeer();
		}
		return self::$peer;
	}

} 