<?php


abstract class BaseNpvacaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fechavac;


	
	protected $disfrutar;


	
	protected $disfrutados;


	
	protected $bonovac;


	
	protected $bonopagado;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getFechavac($format = 'Y-m-d')
	{

		if ($this->fechavac === null || $this->fechavac === '') {
			return null;
		} elseif (!is_int($this->fechavac)) {
						$ts = strtotime($this->fechavac);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fechavac] as date/time value: " . var_export($this->fechavac, true));
			}
		} else {
			$ts = $this->fechavac;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDisfrutar()
	{

		return $this->disfrutar;
	}

	
	public function getDisfrutados()
	{

		return $this->disfrutados;
	}

	
	public function getBonovac()
	{

		return $this->bonovac;
	}

	
	public function getBonopagado()
	{

		return $this->bonopagado;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpvacacionesPeer::CODEMP;
		}

	} 
	
	public function setFechavac($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fechavac] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fechavac !== $ts) {
			$this->fechavac = $ts;
			$this->modifiedColumns[] = NpvacacionesPeer::FECHAVAC;
		}

	} 
	
	public function setDisfrutar($v)
	{

		if ($this->disfrutar !== $v) {
			$this->disfrutar = $v;
			$this->modifiedColumns[] = NpvacacionesPeer::DISFRUTAR;
		}

	} 
	
	public function setDisfrutados($v)
	{

		if ($this->disfrutados !== $v) {
			$this->disfrutados = $v;
			$this->modifiedColumns[] = NpvacacionesPeer::DISFRUTADOS;
		}

	} 
	
	public function setBonovac($v)
	{

		if ($this->bonovac !== $v) {
			$this->bonovac = $v;
			$this->modifiedColumns[] = NpvacacionesPeer::BONOVAC;
		}

	} 
	
	public function setBonopagado($v)
	{

		if ($this->bonopagado !== $v) {
			$this->bonopagado = $v;
			$this->modifiedColumns[] = NpvacacionesPeer::BONOPAGADO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpvacacionesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->fechavac = $rs->getDate($startcol + 1, null);

			$this->disfrutar = $rs->getFloat($startcol + 2);

			$this->disfrutados = $rs->getFloat($startcol + 3);

			$this->bonovac = $rs->getFloat($startcol + 4);

			$this->bonopagado = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npvacaciones object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpvacacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacacionesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacacionesPeer::DATABASE_NAME);
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
					$pk = NpvacacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpvacacionesPeer::doUpdate($this, $con);
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


			if (($retval = NpvacacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFechavac();
				break;
			case 2:
				return $this->getDisfrutar();
				break;
			case 3:
				return $this->getDisfrutados();
				break;
			case 4:
				return $this->getBonovac();
				break;
			case 5:
				return $this->getBonopagado();
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
		$keys = NpvacacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFechavac(),
			$keys[2] => $this->getDisfrutar(),
			$keys[3] => $this->getDisfrutados(),
			$keys[4] => $this->getBonovac(),
			$keys[5] => $this->getBonopagado(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFechavac($value);
				break;
			case 2:
				$this->setDisfrutar($value);
				break;
			case 3:
				$this->setDisfrutados($value);
				break;
			case 4:
				$this->setBonovac($value);
				break;
			case 5:
				$this->setBonopagado($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechavac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDisfrutar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDisfrutados($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBonovac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBonopagado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacacionesPeer::CODEMP)) $criteria->add(NpvacacionesPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacacionesPeer::FECHAVAC)) $criteria->add(NpvacacionesPeer::FECHAVAC, $this->fechavac);
		if ($this->isColumnModified(NpvacacionesPeer::DISFRUTAR)) $criteria->add(NpvacacionesPeer::DISFRUTAR, $this->disfrutar);
		if ($this->isColumnModified(NpvacacionesPeer::DISFRUTADOS)) $criteria->add(NpvacacionesPeer::DISFRUTADOS, $this->disfrutados);
		if ($this->isColumnModified(NpvacacionesPeer::BONOVAC)) $criteria->add(NpvacacionesPeer::BONOVAC, $this->bonovac);
		if ($this->isColumnModified(NpvacacionesPeer::BONOPAGADO)) $criteria->add(NpvacacionesPeer::BONOPAGADO, $this->bonopagado);
		if ($this->isColumnModified(NpvacacionesPeer::ID)) $criteria->add(NpvacacionesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacacionesPeer::DATABASE_NAME);

		$criteria->add(NpvacacionesPeer::ID, $this->id);

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

		$copyObj->setFechavac($this->fechavac);

		$copyObj->setDisfrutar($this->disfrutar);

		$copyObj->setDisfrutados($this->disfrutados);

		$copyObj->setBonovac($this->bonovac);

		$copyObj->setBonopagado($this->bonopagado);


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
			self::$peer = new NpvacacionesPeer();
		}
		return self::$peer;
	}

} 