<?php


abstract class BaseNptipconOld extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipcon;


	
	protected $destipcon;


	
	protected $frepagcon;


	
	protected $alicuocon;


	
	protected $diabonfinano;


	
	protected $diabonvac;


	
	protected $fecinireg;


	
	protected $art146;


	
	protected $diaano;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipcon()
	{

		return $this->codtipcon; 		
	}
	
	public function getDestipcon()
	{

		return $this->destipcon; 		
	}
	
	public function getFrepagcon()
	{

		return $this->frepagcon; 		
	}
	
	public function getAlicuocon()
	{

		return number_format($this->alicuocon,2,',','.');
		
	}
	
	public function getDiabonfinano()
	{

		return number_format($this->diabonfinano,2,',','.');
		
	}
	
	public function getDiabonvac()
	{

		return number_format($this->diabonvac,2,',','.');
		
	}
	
	public function getFecinireg($format = 'Y-m-d')
	{

		if ($this->fecinireg === null || $this->fecinireg === '') {
			return null;
		} elseif (!is_int($this->fecinireg)) {
						$ts = strtotime($this->fecinireg);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecinireg] as date/time value: " . var_export($this->fecinireg, true));
			}
		} else {
			$ts = $this->fecinireg;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getArt146()
	{

		return number_format($this->art146,2,',','.');
		
	}
	
	public function getDiaano()
	{

		return number_format($this->diaano,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodtipcon($v)
	{

		if ($this->codtipcon !== $v) {
			$this->codtipcon = $v;
			$this->modifiedColumns[] = NptipconOldPeer::CODTIPCON;
		}

	} 
	
	public function setDestipcon($v)
	{

		if ($this->destipcon !== $v) {
			$this->destipcon = $v;
			$this->modifiedColumns[] = NptipconOldPeer::DESTIPCON;
		}

	} 
	
	public function setFrepagcon($v)
	{

		if ($this->frepagcon !== $v) {
			$this->frepagcon = $v;
			$this->modifiedColumns[] = NptipconOldPeer::FREPAGCON;
		}

	} 
	
	public function setAlicuocon($v)
	{

		if ($this->alicuocon !== $v) {
			$this->alicuocon = $v;
			$this->modifiedColumns[] = NptipconOldPeer::ALICUOCON;
		}

	} 
	
	public function setDiabonfinano($v)
	{

		if ($this->diabonfinano !== $v) {
			$this->diabonfinano = $v;
			$this->modifiedColumns[] = NptipconOldPeer::DIABONFINANO;
		}

	} 
	
	public function setDiabonvac($v)
	{

		if ($this->diabonvac !== $v) {
			$this->diabonvac = $v;
			$this->modifiedColumns[] = NptipconOldPeer::DIABONVAC;
		}

	} 
	
	public function setFecinireg($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecinireg] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecinireg !== $ts) {
			$this->fecinireg = $ts;
			$this->modifiedColumns[] = NptipconOldPeer::FECINIREG;
		}

	} 
	
	public function setArt146($v)
	{

		if ($this->art146 !== $v) {
			$this->art146 = $v;
			$this->modifiedColumns[] = NptipconOldPeer::ART146;
		}

	} 
	
	public function setDiaano($v)
	{

		if ($this->diaano !== $v) {
			$this->diaano = $v;
			$this->modifiedColumns[] = NptipconOldPeer::DIAANO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NptipconOldPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipcon = $rs->getString($startcol + 0);

			$this->destipcon = $rs->getString($startcol + 1);

			$this->frepagcon = $rs->getString($startcol + 2);

			$this->alicuocon = $rs->getFloat($startcol + 3);

			$this->diabonfinano = $rs->getFloat($startcol + 4);

			$this->diabonvac = $rs->getFloat($startcol + 5);

			$this->fecinireg = $rs->getDate($startcol + 6, null);

			$this->art146 = $rs->getFloat($startcol + 7);

			$this->diaano = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NptipconOld object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NptipconOldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptipconOldPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptipconOldPeer::DATABASE_NAME);
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
					$pk = NptipconOldPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NptipconOldPeer::doUpdate($this, $con);
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


			if (($retval = NptipconOldPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipconOldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipcon();
				break;
			case 1:
				return $this->getDestipcon();
				break;
			case 2:
				return $this->getFrepagcon();
				break;
			case 3:
				return $this->getAlicuocon();
				break;
			case 4:
				return $this->getDiabonfinano();
				break;
			case 5:
				return $this->getDiabonvac();
				break;
			case 6:
				return $this->getFecinireg();
				break;
			case 7:
				return $this->getArt146();
				break;
			case 8:
				return $this->getDiaano();
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
		$keys = NptipconOldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcon(),
			$keys[1] => $this->getDestipcon(),
			$keys[2] => $this->getFrepagcon(),
			$keys[3] => $this->getAlicuocon(),
			$keys[4] => $this->getDiabonfinano(),
			$keys[5] => $this->getDiabonvac(),
			$keys[6] => $this->getFecinireg(),
			$keys[7] => $this->getArt146(),
			$keys[8] => $this->getDiaano(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipconOldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipcon($value);
				break;
			case 1:
				$this->setDestipcon($value);
				break;
			case 2:
				$this->setFrepagcon($value);
				break;
			case 3:
				$this->setAlicuocon($value);
				break;
			case 4:
				$this->setDiabonfinano($value);
				break;
			case 5:
				$this->setDiabonvac($value);
				break;
			case 6:
				$this->setFecinireg($value);
				break;
			case 7:
				$this->setArt146($value);
				break;
			case 8:
				$this->setDiaano($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptipconOldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFrepagcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlicuocon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiabonfinano($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiabonvac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecinireg($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setArt146($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDiaano($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptipconOldPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptipconOldPeer::CODTIPCON)) $criteria->add(NptipconOldPeer::CODTIPCON, $this->codtipcon);
		if ($this->isColumnModified(NptipconOldPeer::DESTIPCON)) $criteria->add(NptipconOldPeer::DESTIPCON, $this->destipcon);
		if ($this->isColumnModified(NptipconOldPeer::FREPAGCON)) $criteria->add(NptipconOldPeer::FREPAGCON, $this->frepagcon);
		if ($this->isColumnModified(NptipconOldPeer::ALICUOCON)) $criteria->add(NptipconOldPeer::ALICUOCON, $this->alicuocon);
		if ($this->isColumnModified(NptipconOldPeer::DIABONFINANO)) $criteria->add(NptipconOldPeer::DIABONFINANO, $this->diabonfinano);
		if ($this->isColumnModified(NptipconOldPeer::DIABONVAC)) $criteria->add(NptipconOldPeer::DIABONVAC, $this->diabonvac);
		if ($this->isColumnModified(NptipconOldPeer::FECINIREG)) $criteria->add(NptipconOldPeer::FECINIREG, $this->fecinireg);
		if ($this->isColumnModified(NptipconOldPeer::ART146)) $criteria->add(NptipconOldPeer::ART146, $this->art146);
		if ($this->isColumnModified(NptipconOldPeer::DIAANO)) $criteria->add(NptipconOldPeer::DIAANO, $this->diaano);
		if ($this->isColumnModified(NptipconOldPeer::ID)) $criteria->add(NptipconOldPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptipconOldPeer::DATABASE_NAME);

		$criteria->add(NptipconOldPeer::ID, $this->id);

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

		$copyObj->setCodtipcon($this->codtipcon);

		$copyObj->setDestipcon($this->destipcon);

		$copyObj->setFrepagcon($this->frepagcon);

		$copyObj->setAlicuocon($this->alicuocon);

		$copyObj->setDiabonfinano($this->diabonfinano);

		$copyObj->setDiabonvac($this->diabonvac);

		$copyObj->setFecinireg($this->fecinireg);

		$copyObj->setArt146($this->art146);

		$copyObj->setDiaano($this->diaano);


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
			self::$peer = new NptipconOldPeer();
		}
		return self::$peer;
	}

} 