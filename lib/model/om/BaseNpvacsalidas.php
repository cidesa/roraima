<?php


abstract class BaseNpvacsalidas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecvac;


	
	protected $diasdisfrutar;


	
	protected $observa;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getFecvac($format = 'Y-m-d')
	{

		if ($this->fecvac === null || $this->fecvac === '') {
			return null;
		} elseif (!is_int($this->fecvac)) {
						$ts = strtotime($this->fecvac);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecvac] as date/time value: " . var_export($this->fecvac, true));
			}
		} else {
			$ts = $this->fecvac;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDiasdisfrutar()
	{

		return $this->diasdisfrutar;
	}

	
	public function getObserva()
	{

		return $this->observa;
	}

	
	public function getFecdes($format = 'Y-m-d')
	{

		if ($this->fecdes === null || $this->fecdes === '') {
			return null;
		} elseif (!is_int($this->fecdes)) {
						$ts = strtotime($this->fecdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
			}
		} else {
			$ts = $this->fecdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechas($format = 'Y-m-d')
	{

		if ($this->fechas === null || $this->fechas === '') {
			return null;
		} elseif (!is_int($this->fechas)) {
						$ts = strtotime($this->fechas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
			}
		} else {
			$ts = $this->fechas;
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

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpvacsalidasPeer::CODEMP;
		}

	} 
	
	public function setFecvac($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecvac] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecvac !== $ts) {
			$this->fecvac = $ts;
			$this->modifiedColumns[] = NpvacsalidasPeer::FECVAC;
		}

	} 
	
	public function setDiasdisfrutar($v)
	{

		if ($this->diasdisfrutar !== $v) {
			$this->diasdisfrutar = $v;
			$this->modifiedColumns[] = NpvacsalidasPeer::DIASDISFRUTAR;
		}

	} 
	
	public function setObserva($v)
	{

		if ($this->observa !== $v) {
			$this->observa = $v;
			$this->modifiedColumns[] = NpvacsalidasPeer::OBSERVA;
		}

	} 
	
	public function setFecdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdes !== $ts) {
			$this->fecdes = $ts;
			$this->modifiedColumns[] = NpvacsalidasPeer::FECDES;
		}

	} 
	
	public function setFechas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fechas !== $ts) {
			$this->fechas = $ts;
			$this->modifiedColumns[] = NpvacsalidasPeer::FECHAS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpvacsalidasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->fecvac = $rs->getDate($startcol + 1, null);

			$this->diasdisfrutar = $rs->getFloat($startcol + 2);

			$this->observa = $rs->getString($startcol + 3);

			$this->fecdes = $rs->getDate($startcol + 4, null);

			$this->fechas = $rs->getDate($startcol + 5, null);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npvacsalidas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpvacsalidasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacsalidasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacsalidasPeer::DATABASE_NAME);
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
					$pk = NpvacsalidasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpvacsalidasPeer::doUpdate($this, $con);
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


			if (($retval = NpvacsalidasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacsalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecvac();
				break;
			case 2:
				return $this->getDiasdisfrutar();
				break;
			case 3:
				return $this->getObserva();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getFechas();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacsalidasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecvac(),
			$keys[2] => $this->getDiasdisfrutar(),
			$keys[3] => $this->getObserva(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getFechas(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacsalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecvac($value);
				break;
			case 2:
				$this->setDiasdisfrutar($value);
				break;
			case 3:
				$this->setObserva($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setFechas($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacsalidasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecvac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiasdisfrutar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserva($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacsalidasPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacsalidasPeer::CODEMP)) $criteria->add(NpvacsalidasPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacsalidasPeer::FECVAC)) $criteria->add(NpvacsalidasPeer::FECVAC, $this->fecvac);
		if ($this->isColumnModified(NpvacsalidasPeer::DIASDISFRUTAR)) $criteria->add(NpvacsalidasPeer::DIASDISFRUTAR, $this->diasdisfrutar);
		if ($this->isColumnModified(NpvacsalidasPeer::OBSERVA)) $criteria->add(NpvacsalidasPeer::OBSERVA, $this->observa);
		if ($this->isColumnModified(NpvacsalidasPeer::FECDES)) $criteria->add(NpvacsalidasPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(NpvacsalidasPeer::FECHAS)) $criteria->add(NpvacsalidasPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(NpvacsalidasPeer::ID)) $criteria->add(NpvacsalidasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacsalidasPeer::DATABASE_NAME);

		$criteria->add(NpvacsalidasPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecvac($this->fecvac);

		$copyObj->setDiasdisfrutar($this->diasdisfrutar);

		$copyObj->setObserva($this->observa);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);


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
			self::$peer = new NpvacsalidasPeer();
		}
		return self::$peer;
	}

} 