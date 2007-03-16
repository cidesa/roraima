<?php


abstract class BaseCaordcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcon;


	
	protected $feccon;


	
	protected $tipcon;


	
	protected $codpro;


	
	protected $descon;


	
	protected $objcon;


	
	protected $fecini;


	
	protected $feccul;


	
	protected $mulatrini;


	
	protected $lapgar;


	
	protected $mulatrcul;


	
	protected $stacon;


	
	protected $moncon;


	
	protected $fecanu;


	
	protected $cancuo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getOrdcon()
	{

		return $this->ordcon;
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

	
	public function getTipcon()
	{

		return $this->tipcon;
	}

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getDescon()
	{

		return $this->descon;
	}

	
	public function getObjcon()
	{

		return $this->objcon;
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

	
	public function getFeccul($format = 'Y-m-d')
	{

		if ($this->feccul === null || $this->feccul === '') {
			return null;
		} elseif (!is_int($this->feccul)) {
						$ts = strtotime($this->feccul);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
			}
		} else {
			$ts = $this->feccul;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMulatrini()
	{

		return $this->mulatrini;
	}

	
	public function getLapgar()
	{

		return $this->lapgar;
	}

	
	public function getMulatrcul()
	{

		return $this->mulatrcul;
	}

	
	public function getStacon()
	{

		return $this->stacon;
	}

	
	public function getMoncon()
	{

		return $this->moncon;
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

	
	public function getCancuo()
	{

		return $this->cancuo;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setOrdcon($v)
	{

		if ($this->ordcon !== $v) {
			$this->ordcon = $v;
			$this->modifiedColumns[] = CaordconPeer::ORDCON;
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
			$this->modifiedColumns[] = CaordconPeer::FECCON;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = CaordconPeer::TIPCON;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CaordconPeer::CODPRO;
		}

	} 
	
	public function setDescon($v)
	{

		if ($this->descon !== $v) {
			$this->descon = $v;
			$this->modifiedColumns[] = CaordconPeer::DESCON;
		}

	} 
	
	public function setObjcon($v)
	{

		if ($this->objcon !== $v) {
			$this->objcon = $v;
			$this->modifiedColumns[] = CaordconPeer::OBJCON;
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
			$this->modifiedColumns[] = CaordconPeer::FECINI;
		}

	} 
	
	public function setFeccul($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccul !== $ts) {
			$this->feccul = $ts;
			$this->modifiedColumns[] = CaordconPeer::FECCUL;
		}

	} 
	
	public function setMulatrini($v)
	{

		if ($this->mulatrini !== $v) {
			$this->mulatrini = $v;
			$this->modifiedColumns[] = CaordconPeer::MULATRINI;
		}

	} 
	
	public function setLapgar($v)
	{

		if ($this->lapgar !== $v) {
			$this->lapgar = $v;
			$this->modifiedColumns[] = CaordconPeer::LAPGAR;
		}

	} 
	
	public function setMulatrcul($v)
	{

		if ($this->mulatrcul !== $v) {
			$this->mulatrcul = $v;
			$this->modifiedColumns[] = CaordconPeer::MULATRCUL;
		}

	} 
	
	public function setStacon($v)
	{

		if ($this->stacon !== $v) {
			$this->stacon = $v;
			$this->modifiedColumns[] = CaordconPeer::STACON;
		}

	} 
	
	public function setMoncon($v)
	{

		if ($this->moncon !== $v) {
			$this->moncon = $v;
			$this->modifiedColumns[] = CaordconPeer::MONCON;
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
			$this->modifiedColumns[] = CaordconPeer::FECANU;
		}

	} 
	
	public function setCancuo($v)
	{

		if ($this->cancuo !== $v) {
			$this->cancuo = $v;
			$this->modifiedColumns[] = CaordconPeer::CANCUO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaordconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ordcon = $rs->getString($startcol + 0);

			$this->feccon = $rs->getDate($startcol + 1, null);

			$this->tipcon = $rs->getString($startcol + 2);

			$this->codpro = $rs->getString($startcol + 3);

			$this->descon = $rs->getString($startcol + 4);

			$this->objcon = $rs->getString($startcol + 5);

			$this->fecini = $rs->getDate($startcol + 6, null);

			$this->feccul = $rs->getDate($startcol + 7, null);

			$this->mulatrini = $rs->getFloat($startcol + 8);

			$this->lapgar = $rs->getFloat($startcol + 9);

			$this->mulatrcul = $rs->getFloat($startcol + 10);

			$this->stacon = $rs->getString($startcol + 11);

			$this->moncon = $rs->getFloat($startcol + 12);

			$this->fecanu = $rs->getDate($startcol + 13, null);

			$this->cancuo = $rs->getFloat($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caordcon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaordconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaordconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaordconPeer::DATABASE_NAME);
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
					$pk = CaordconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaordconPeer::doUpdate($this, $con);
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


			if (($retval = CaordconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaordconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcon();
				break;
			case 1:
				return $this->getFeccon();
				break;
			case 2:
				return $this->getTipcon();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getDescon();
				break;
			case 5:
				return $this->getObjcon();
				break;
			case 6:
				return $this->getFecini();
				break;
			case 7:
				return $this->getFeccul();
				break;
			case 8:
				return $this->getMulatrini();
				break;
			case 9:
				return $this->getLapgar();
				break;
			case 10:
				return $this->getMulatrcul();
				break;
			case 11:
				return $this->getStacon();
				break;
			case 12:
				return $this->getMoncon();
				break;
			case 13:
				return $this->getFecanu();
				break;
			case 14:
				return $this->getCancuo();
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
		$keys = CaordconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcon(),
			$keys[1] => $this->getFeccon(),
			$keys[2] => $this->getTipcon(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getDescon(),
			$keys[5] => $this->getObjcon(),
			$keys[6] => $this->getFecini(),
			$keys[7] => $this->getFeccul(),
			$keys[8] => $this->getMulatrini(),
			$keys[9] => $this->getLapgar(),
			$keys[10] => $this->getMulatrcul(),
			$keys[11] => $this->getStacon(),
			$keys[12] => $this->getMoncon(),
			$keys[13] => $this->getFecanu(),
			$keys[14] => $this->getCancuo(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaordconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcon($value);
				break;
			case 1:
				$this->setFeccon($value);
				break;
			case 2:
				$this->setTipcon($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setDescon($value);
				break;
			case 5:
				$this->setObjcon($value);
				break;
			case 6:
				$this->setFecini($value);
				break;
			case 7:
				$this->setFeccul($value);
				break;
			case 8:
				$this->setMulatrini($value);
				break;
			case 9:
				$this->setLapgar($value);
				break;
			case 10:
				$this->setMulatrcul($value);
				break;
			case 11:
				$this->setStacon($value);
				break;
			case 12:
				$this->setMoncon($value);
				break;
			case 13:
				$this->setFecanu($value);
				break;
			case 14:
				$this->setCancuo($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaordconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObjcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecini($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeccul($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMulatrini($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLapgar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMulatrcul($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStacon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMoncon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCancuo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaordconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaordconPeer::ORDCON)) $criteria->add(CaordconPeer::ORDCON, $this->ordcon);
		if ($this->isColumnModified(CaordconPeer::FECCON)) $criteria->add(CaordconPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CaordconPeer::TIPCON)) $criteria->add(CaordconPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(CaordconPeer::CODPRO)) $criteria->add(CaordconPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaordconPeer::DESCON)) $criteria->add(CaordconPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CaordconPeer::OBJCON)) $criteria->add(CaordconPeer::OBJCON, $this->objcon);
		if ($this->isColumnModified(CaordconPeer::FECINI)) $criteria->add(CaordconPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(CaordconPeer::FECCUL)) $criteria->add(CaordconPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(CaordconPeer::MULATRINI)) $criteria->add(CaordconPeer::MULATRINI, $this->mulatrini);
		if ($this->isColumnModified(CaordconPeer::LAPGAR)) $criteria->add(CaordconPeer::LAPGAR, $this->lapgar);
		if ($this->isColumnModified(CaordconPeer::MULATRCUL)) $criteria->add(CaordconPeer::MULATRCUL, $this->mulatrcul);
		if ($this->isColumnModified(CaordconPeer::STACON)) $criteria->add(CaordconPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CaordconPeer::MONCON)) $criteria->add(CaordconPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(CaordconPeer::FECANU)) $criteria->add(CaordconPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CaordconPeer::CANCUO)) $criteria->add(CaordconPeer::CANCUO, $this->cancuo);
		if ($this->isColumnModified(CaordconPeer::ID)) $criteria->add(CaordconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaordconPeer::DATABASE_NAME);

		$criteria->add(CaordconPeer::ID, $this->id);

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

		$copyObj->setOrdcon($this->ordcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setDescon($this->descon);

		$copyObj->setObjcon($this->objcon);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setMulatrini($this->mulatrini);

		$copyObj->setLapgar($this->lapgar);

		$copyObj->setMulatrcul($this->mulatrcul);

		$copyObj->setStacon($this->stacon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCancuo($this->cancuo);


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
			self::$peer = new CaordconPeer();
		}
		return self::$peer;
	}

} 