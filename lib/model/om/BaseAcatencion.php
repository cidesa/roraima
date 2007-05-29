<?php


abstract class BaseAcatencion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $docate;


	
	protected $loguse;


	
	protected $estado;


	
	protected $fecrec;


	
	protected $horrec;


	
	protected $fecate;


	
	protected $horate;


	
	protected $numuni;


	
	protected $numuniori;


	
	protected $obsdoc;


	
	protected $staate;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDocate()
	{

		return $this->docate; 		
	}
	
	public function getLoguse()
	{

		return $this->loguse; 		
	}
	
	public function getEstado()
	{

		return $this->estado; 		
	}
	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorrec($format = 'Y-m-d')
	{

		if ($this->horrec === null || $this->horrec === '') {
			return null;
		} elseif (!is_int($this->horrec)) {
						$ts = strtotime($this->horrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horrec] as date/time value: " . var_export($this->horrec, true));
			}
		} else {
			$ts = $this->horrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecate($format = 'Y-m-d')
	{

		if ($this->fecate === null || $this->fecate === '') {
			return null;
		} elseif (!is_int($this->fecate)) {
						$ts = strtotime($this->fecate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecate] as date/time value: " . var_export($this->fecate, true));
			}
		} else {
			$ts = $this->fecate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorate($format = 'Y-m-d')
	{

		if ($this->horate === null || $this->horate === '') {
			return null;
		} elseif (!is_int($this->horate)) {
						$ts = strtotime($this->horate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horate] as date/time value: " . var_export($this->horate, true));
			}
		} else {
			$ts = $this->horate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNumuni()
	{

		return $this->numuni; 		
	}
	
	public function getNumuniori()
	{

		return $this->numuniori; 		
	}
	
	public function getObsdoc()
	{

		return $this->obsdoc; 		
	}
	
	public function getStaate()
	{

		return $this->staate; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setDocate($v)
	{

		if ($this->docate !== $v) {
			$this->docate = $v;
			$this->modifiedColumns[] = AcatencionPeer::DOCATE;
		}

	} 
	
	public function setLoguse($v)
	{

		if ($this->loguse !== $v) {
			$this->loguse = $v;
			$this->modifiedColumns[] = AcatencionPeer::LOGUSE;
		}

	} 
	
	public function setEstado($v)
	{

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = AcatencionPeer::ESTADO;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = AcatencionPeer::FECREC;
		}

	} 
	
	public function setHorrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horrec !== $ts) {
			$this->horrec = $ts;
			$this->modifiedColumns[] = AcatencionPeer::HORREC;
		}

	} 
	
	public function setFecate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecate !== $ts) {
			$this->fecate = $ts;
			$this->modifiedColumns[] = AcatencionPeer::FECATE;
		}

	} 
	
	public function setHorate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horate !== $ts) {
			$this->horate = $ts;
			$this->modifiedColumns[] = AcatencionPeer::HORATE;
		}

	} 
	
	public function setNumuni($v)
	{

		if ($this->numuni !== $v) {
			$this->numuni = $v;
			$this->modifiedColumns[] = AcatencionPeer::NUMUNI;
		}

	} 
	
	public function setNumuniori($v)
	{

		if ($this->numuniori !== $v) {
			$this->numuniori = $v;
			$this->modifiedColumns[] = AcatencionPeer::NUMUNIORI;
		}

	} 
	
	public function setObsdoc($v)
	{

		if ($this->obsdoc !== $v) {
			$this->obsdoc = $v;
			$this->modifiedColumns[] = AcatencionPeer::OBSDOC;
		}

	} 
	
	public function setStaate($v)
	{

		if ($this->staate !== $v) {
			$this->staate = $v;
			$this->modifiedColumns[] = AcatencionPeer::STAATE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AcatencionPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->docate = $rs->getString($startcol + 0);

			$this->loguse = $rs->getString($startcol + 1);

			$this->estado = $rs->getString($startcol + 2);

			$this->fecrec = $rs->getDate($startcol + 3, null);

			$this->horrec = $rs->getDate($startcol + 4, null);

			$this->fecate = $rs->getDate($startcol + 5, null);

			$this->horate = $rs->getDate($startcol + 6, null);

			$this->numuni = $rs->getString($startcol + 7);

			$this->numuniori = $rs->getString($startcol + 8);

			$this->obsdoc = $rs->getString($startcol + 9);

			$this->staate = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Acatencion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AcatencionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AcatencionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AcatencionPeer::DATABASE_NAME);
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
					$pk = AcatencionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AcatencionPeer::doUpdate($this, $con);
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


			if (($retval = AcatencionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcatencionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDocate();
				break;
			case 1:
				return $this->getLoguse();
				break;
			case 2:
				return $this->getEstado();
				break;
			case 3:
				return $this->getFecrec();
				break;
			case 4:
				return $this->getHorrec();
				break;
			case 5:
				return $this->getFecate();
				break;
			case 6:
				return $this->getHorate();
				break;
			case 7:
				return $this->getNumuni();
				break;
			case 8:
				return $this->getNumuniori();
				break;
			case 9:
				return $this->getObsdoc();
				break;
			case 10:
				return $this->getStaate();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcatencionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDocate(),
			$keys[1] => $this->getLoguse(),
			$keys[2] => $this->getEstado(),
			$keys[3] => $this->getFecrec(),
			$keys[4] => $this->getHorrec(),
			$keys[5] => $this->getFecate(),
			$keys[6] => $this->getHorate(),
			$keys[7] => $this->getNumuni(),
			$keys[8] => $this->getNumuniori(),
			$keys[9] => $this->getObsdoc(),
			$keys[10] => $this->getStaate(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcatencionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDocate($value);
				break;
			case 1:
				$this->setLoguse($value);
				break;
			case 2:
				$this->setEstado($value);
				break;
			case 3:
				$this->setFecrec($value);
				break;
			case 4:
				$this->setHorrec($value);
				break;
			case 5:
				$this->setFecate($value);
				break;
			case 6:
				$this->setHorate($value);
				break;
			case 7:
				$this->setNumuni($value);
				break;
			case 8:
				$this->setNumuniori($value);
				break;
			case 9:
				$this->setObsdoc($value);
				break;
			case 10:
				$this->setStaate($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcatencionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDocate($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoguse($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstado($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHorrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHorate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumuni($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumuniori($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObsdoc($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AcatencionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AcatencionPeer::DOCATE)) $criteria->add(AcatencionPeer::DOCATE, $this->docate);
		if ($this->isColumnModified(AcatencionPeer::LOGUSE)) $criteria->add(AcatencionPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(AcatencionPeer::ESTADO)) $criteria->add(AcatencionPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(AcatencionPeer::FECREC)) $criteria->add(AcatencionPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(AcatencionPeer::HORREC)) $criteria->add(AcatencionPeer::HORREC, $this->horrec);
		if ($this->isColumnModified(AcatencionPeer::FECATE)) $criteria->add(AcatencionPeer::FECATE, $this->fecate);
		if ($this->isColumnModified(AcatencionPeer::HORATE)) $criteria->add(AcatencionPeer::HORATE, $this->horate);
		if ($this->isColumnModified(AcatencionPeer::NUMUNI)) $criteria->add(AcatencionPeer::NUMUNI, $this->numuni);
		if ($this->isColumnModified(AcatencionPeer::NUMUNIORI)) $criteria->add(AcatencionPeer::NUMUNIORI, $this->numuniori);
		if ($this->isColumnModified(AcatencionPeer::OBSDOC)) $criteria->add(AcatencionPeer::OBSDOC, $this->obsdoc);
		if ($this->isColumnModified(AcatencionPeer::STAATE)) $criteria->add(AcatencionPeer::STAATE, $this->staate);
		if ($this->isColumnModified(AcatencionPeer::ID)) $criteria->add(AcatencionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AcatencionPeer::DATABASE_NAME);

		$criteria->add(AcatencionPeer::ID, $this->id);

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

		$copyObj->setDocate($this->docate);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setEstado($this->estado);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setHorrec($this->horrec);

		$copyObj->setFecate($this->fecate);

		$copyObj->setHorate($this->horate);

		$copyObj->setNumuni($this->numuni);

		$copyObj->setNumuniori($this->numuniori);

		$copyObj->setObsdoc($this->obsdoc);

		$copyObj->setStaate($this->staate);


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
			self::$peer = new AcatencionPeer();
		}
		return self::$peer;
	}

} 