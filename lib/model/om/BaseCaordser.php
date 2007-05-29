<?php


abstract class BaseCaordser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordser;


	
	protected $fecser;


	
	protected $codpro;


	
	protected $codcat;


	
	protected $desord;


	
	protected $crecon;


	
	protected $plaent;


	
	protected $tiecan;


	
	protected $monord;


	
	protected $staord;


	
	protected $afepre;


	
	protected $cedrif;


	
	protected $refcom;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getOrdser()
	{

		return $this->ordser; 		
	}
	
	public function getFecser($format = 'Y-m-d')
	{

		if ($this->fecser === null || $this->fecser === '') {
			return null;
		} elseif (!is_int($this->fecser)) {
						$ts = strtotime($this->fecser);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecser] as date/time value: " . var_export($this->fecser, true));
			}
		} else {
			$ts = $this->fecser;
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
	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getDesord()
	{

		return $this->desord; 		
	}
	
	public function getCrecon()
	{

		return $this->crecon; 		
	}
	
	public function getPlaent()
	{

		return $this->plaent; 		
	}
	
	public function getTiecan()
	{

		return $this->tiecan; 		
	}
	
	public function getMonord()
	{

		return number_format($this->monord,2,',','.');
		
	}
	
	public function getStaord()
	{

		return $this->staord; 		
	}
	
	public function getAfepre()
	{

		return $this->afepre; 		
	}
	
	public function getCedrif()
	{

		return $this->cedrif; 		
	}
	
	public function getRefcom()
	{

		return $this->refcom; 		
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

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setOrdser($v)
	{

		if ($this->ordser !== $v) {
			$this->ordser = $v;
			$this->modifiedColumns[] = CaordserPeer::ORDSER;
		}

	} 
	
	public function setFecser($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecser] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecser !== $ts) {
			$this->fecser = $ts;
			$this->modifiedColumns[] = CaordserPeer::FECSER;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CaordserPeer::CODPRO;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaordserPeer::CODCAT;
		}

	} 
	
	public function setDesord($v)
	{

		if ($this->desord !== $v) {
			$this->desord = $v;
			$this->modifiedColumns[] = CaordserPeer::DESORD;
		}

	} 
	
	public function setCrecon($v)
	{

		if ($this->crecon !== $v) {
			$this->crecon = $v;
			$this->modifiedColumns[] = CaordserPeer::CRECON;
		}

	} 
	
	public function setPlaent($v)
	{

		if ($this->plaent !== $v) {
			$this->plaent = $v;
			$this->modifiedColumns[] = CaordserPeer::PLAENT;
		}

	} 
	
	public function setTiecan($v)
	{

		if ($this->tiecan !== $v) {
			$this->tiecan = $v;
			$this->modifiedColumns[] = CaordserPeer::TIECAN;
		}

	} 
	
	public function setMonord($v)
	{

		if ($this->monord !== $v) {
			$this->monord = $v;
			$this->modifiedColumns[] = CaordserPeer::MONORD;
		}

	} 
	
	public function setStaord($v)
	{

		if ($this->staord !== $v) {
			$this->staord = $v;
			$this->modifiedColumns[] = CaordserPeer::STAORD;
		}

	} 
	
	public function setAfepre($v)
	{

		if ($this->afepre !== $v) {
			$this->afepre = $v;
			$this->modifiedColumns[] = CaordserPeer::AFEPRE;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = CaordserPeer::CEDRIF;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = CaordserPeer::REFCOM;
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
			$this->modifiedColumns[] = CaordserPeer::FECANU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaordserPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ordser = $rs->getString($startcol + 0);

			$this->fecser = $rs->getDate($startcol + 1, null);

			$this->codpro = $rs->getString($startcol + 2);

			$this->codcat = $rs->getString($startcol + 3);

			$this->desord = $rs->getString($startcol + 4);

			$this->crecon = $rs->getString($startcol + 5);

			$this->plaent = $rs->getString($startcol + 6);

			$this->tiecan = $rs->getString($startcol + 7);

			$this->monord = $rs->getFloat($startcol + 8);

			$this->staord = $rs->getString($startcol + 9);

			$this->afepre = $rs->getString($startcol + 10);

			$this->cedrif = $rs->getString($startcol + 11);

			$this->refcom = $rs->getString($startcol + 12);

			$this->fecanu = $rs->getDate($startcol + 13, null);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caordser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaordserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaordserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaordserPeer::DATABASE_NAME);
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
					$pk = CaordserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaordserPeer::doUpdate($this, $con);
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


			if (($retval = CaordserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaordserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdser();
				break;
			case 1:
				return $this->getFecser();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getDesord();
				break;
			case 5:
				return $this->getCrecon();
				break;
			case 6:
				return $this->getPlaent();
				break;
			case 7:
				return $this->getTiecan();
				break;
			case 8:
				return $this->getMonord();
				break;
			case 9:
				return $this->getStaord();
				break;
			case 10:
				return $this->getAfepre();
				break;
			case 11:
				return $this->getCedrif();
				break;
			case 12:
				return $this->getRefcom();
				break;
			case 13:
				return $this->getFecanu();
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
		$keys = CaordserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdser(),
			$keys[1] => $this->getFecser(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getDesord(),
			$keys[5] => $this->getCrecon(),
			$keys[6] => $this->getPlaent(),
			$keys[7] => $this->getTiecan(),
			$keys[8] => $this->getMonord(),
			$keys[9] => $this->getStaord(),
			$keys[10] => $this->getAfepre(),
			$keys[11] => $this->getCedrif(),
			$keys[12] => $this->getRefcom(),
			$keys[13] => $this->getFecanu(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaordserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdser($value);
				break;
			case 1:
				$this->setFecser($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setDesord($value);
				break;
			case 5:
				$this->setCrecon($value);
				break;
			case 6:
				$this->setPlaent($value);
				break;
			case 7:
				$this->setTiecan($value);
				break;
			case 8:
				$this->setMonord($value);
				break;
			case 9:
				$this->setStaord($value);
				break;
			case 10:
				$this->setAfepre($value);
				break;
			case 11:
				$this->setCedrif($value);
				break;
			case 12:
				$this->setRefcom($value);
				break;
			case 13:
				$this->setFecanu($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaordserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdser($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesord($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCrecon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPlaent($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTiecan($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStaord($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAfepre($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCedrif($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRefcom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaordserPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaordserPeer::ORDSER)) $criteria->add(CaordserPeer::ORDSER, $this->ordser);
		if ($this->isColumnModified(CaordserPeer::FECSER)) $criteria->add(CaordserPeer::FECSER, $this->fecser);
		if ($this->isColumnModified(CaordserPeer::CODPRO)) $criteria->add(CaordserPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaordserPeer::CODCAT)) $criteria->add(CaordserPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaordserPeer::DESORD)) $criteria->add(CaordserPeer::DESORD, $this->desord);
		if ($this->isColumnModified(CaordserPeer::CRECON)) $criteria->add(CaordserPeer::CRECON, $this->crecon);
		if ($this->isColumnModified(CaordserPeer::PLAENT)) $criteria->add(CaordserPeer::PLAENT, $this->plaent);
		if ($this->isColumnModified(CaordserPeer::TIECAN)) $criteria->add(CaordserPeer::TIECAN, $this->tiecan);
		if ($this->isColumnModified(CaordserPeer::MONORD)) $criteria->add(CaordserPeer::MONORD, $this->monord);
		if ($this->isColumnModified(CaordserPeer::STAORD)) $criteria->add(CaordserPeer::STAORD, $this->staord);
		if ($this->isColumnModified(CaordserPeer::AFEPRE)) $criteria->add(CaordserPeer::AFEPRE, $this->afepre);
		if ($this->isColumnModified(CaordserPeer::CEDRIF)) $criteria->add(CaordserPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CaordserPeer::REFCOM)) $criteria->add(CaordserPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CaordserPeer::FECANU)) $criteria->add(CaordserPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CaordserPeer::ID)) $criteria->add(CaordserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaordserPeer::DATABASE_NAME);

		$criteria->add(CaordserPeer::ID, $this->id);

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

		$copyObj->setOrdser($this->ordser);

		$copyObj->setFecser($this->fecser);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setDesord($this->desord);

		$copyObj->setCrecon($this->crecon);

		$copyObj->setPlaent($this->plaent);

		$copyObj->setTiecan($this->tiecan);

		$copyObj->setMonord($this->monord);

		$copyObj->setStaord($this->staord);

		$copyObj->setAfepre($this->afepre);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new CaordserPeer();
		}
		return self::$peer;
	}

} 