<?php


abstract class BaseNpfalper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codmot;


	
	protected $nrodia;


	
	protected $observ;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCodmot()
	{

		return $this->codmot;
	}

	
	public function getNrodia()
	{

		return $this->nrodia;
	}

	
	public function getObserv()
	{

		return $this->observ;
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
			$this->modifiedColumns[] = NpfalperPeer::CODEMP;
		}

	} 
	
	public function setCodmot($v)
	{

		if ($this->codmot !== $v) {
			$this->codmot = $v;
			$this->modifiedColumns[] = NpfalperPeer::CODMOT;
		}

	} 
	
	public function setNrodia($v)
	{

		if ($this->nrodia !== $v) {
			$this->nrodia = $v;
			$this->modifiedColumns[] = NpfalperPeer::NRODIA;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = NpfalperPeer::OBSERV;
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
			$this->modifiedColumns[] = NpfalperPeer::FECDES;
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
			$this->modifiedColumns[] = NpfalperPeer::FECHAS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpfalperPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codmot = $rs->getString($startcol + 1);

			$this->nrodia = $rs->getFloat($startcol + 2);

			$this->observ = $rs->getString($startcol + 3);

			$this->fecdes = $rs->getDate($startcol + 4, null);

			$this->fechas = $rs->getDate($startcol + 5, null);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npfalper object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpfalperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpfalperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpfalperPeer::DATABASE_NAME);
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
					$pk = NpfalperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpfalperPeer::doUpdate($this, $con);
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


			if (($retval = NpfalperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfalperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodmot();
				break;
			case 2:
				return $this->getNrodia();
				break;
			case 3:
				return $this->getObserv();
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
		$keys = NpfalperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodmot(),
			$keys[2] => $this->getNrodia(),
			$keys[3] => $this->getObserv(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getFechas(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfalperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodmot($value);
				break;
			case 2:
				$this->setNrodia($value);
				break;
			case 3:
				$this->setObserv($value);
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
		$keys = NpfalperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrodia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpfalperPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpfalperPeer::CODEMP)) $criteria->add(NpfalperPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpfalperPeer::CODMOT)) $criteria->add(NpfalperPeer::CODMOT, $this->codmot);
		if ($this->isColumnModified(NpfalperPeer::NRODIA)) $criteria->add(NpfalperPeer::NRODIA, $this->nrodia);
		if ($this->isColumnModified(NpfalperPeer::OBSERV)) $criteria->add(NpfalperPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NpfalperPeer::FECDES)) $criteria->add(NpfalperPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(NpfalperPeer::FECHAS)) $criteria->add(NpfalperPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(NpfalperPeer::ID)) $criteria->add(NpfalperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpfalperPeer::DATABASE_NAME);

		$criteria->add(NpfalperPeer::ID, $this->id);

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

		$copyObj->setCodmot($this->codmot);

		$copyObj->setNrodia($this->nrodia);

		$copyObj->setObserv($this->observ);

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
			self::$peer = new NpfalperPeer();
		}
		return self::$peer;
	}

} 