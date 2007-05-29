<?php


abstract class BaseNphispre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtippre;


	
	protected $fechispre;


	
	protected $deshispre;


	
	protected $codemp;


	
	protected $monpre;


	
	protected $saldo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtippre()
	{

		return $this->codtippre; 		
	}
	
	public function getFechispre($format = 'Y-m-d')
	{

		if ($this->fechispre === null || $this->fechispre === '') {
			return null;
		} elseif (!is_int($this->fechispre)) {
						$ts = strtotime($this->fechispre);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fechispre] as date/time value: " . var_export($this->fechispre, true));
			}
		} else {
			$ts = $this->fechispre;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDeshispre()
	{

		return $this->deshispre; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getMonpre()
	{

		return number_format($this->monpre,2,',','.');
		
	}
	
	public function getSaldo()
	{

		return number_format($this->saldo,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodtippre($v)
	{

		if ($this->codtippre !== $v) {
			$this->codtippre = $v;
			$this->modifiedColumns[] = NphisprePeer::CODTIPPRE;
		}

	} 
	
	public function setFechispre($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fechispre] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fechispre !== $ts) {
			$this->fechispre = $ts;
			$this->modifiedColumns[] = NphisprePeer::FECHISPRE;
		}

	} 
	
	public function setDeshispre($v)
	{

		if ($this->deshispre !== $v) {
			$this->deshispre = $v;
			$this->modifiedColumns[] = NphisprePeer::DESHISPRE;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NphisprePeer::CODEMP;
		}

	} 
	
	public function setMonpre($v)
	{

		if ($this->monpre !== $v) {
			$this->monpre = $v;
			$this->modifiedColumns[] = NphisprePeer::MONPRE;
		}

	} 
	
	public function setSaldo($v)
	{

		if ($this->saldo !== $v) {
			$this->saldo = $v;
			$this->modifiedColumns[] = NphisprePeer::SALDO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NphisprePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtippre = $rs->getString($startcol + 0);

			$this->fechispre = $rs->getDate($startcol + 1, null);

			$this->deshispre = $rs->getString($startcol + 2);

			$this->codemp = $rs->getString($startcol + 3);

			$this->monpre = $rs->getFloat($startcol + 4);

			$this->saldo = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nphispre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphisprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NphisprePeer::DATABASE_NAME);
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
					$pk = NphisprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NphisprePeer::doUpdate($this, $con);
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


			if (($retval = NphisprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtippre();
				break;
			case 1:
				return $this->getFechispre();
				break;
			case 2:
				return $this->getDeshispre();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getMonpre();
				break;
			case 5:
				return $this->getSaldo();
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
		$keys = NphisprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtippre(),
			$keys[1] => $this->getFechispre(),
			$keys[2] => $this->getDeshispre(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getMonpre(),
			$keys[5] => $this->getSaldo(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtippre($value);
				break;
			case 1:
				$this->setFechispre($value);
				break;
			case 2:
				$this->setDeshispre($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setMonpre($value);
				break;
			case 5:
				$this->setSaldo($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtippre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechispre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDeshispre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSaldo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphisprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NphisprePeer::CODTIPPRE)) $criteria->add(NphisprePeer::CODTIPPRE, $this->codtippre);
		if ($this->isColumnModified(NphisprePeer::FECHISPRE)) $criteria->add(NphisprePeer::FECHISPRE, $this->fechispre);
		if ($this->isColumnModified(NphisprePeer::DESHISPRE)) $criteria->add(NphisprePeer::DESHISPRE, $this->deshispre);
		if ($this->isColumnModified(NphisprePeer::CODEMP)) $criteria->add(NphisprePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphisprePeer::MONPRE)) $criteria->add(NphisprePeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(NphisprePeer::SALDO)) $criteria->add(NphisprePeer::SALDO, $this->saldo);
		if ($this->isColumnModified(NphisprePeer::ID)) $criteria->add(NphisprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphisprePeer::DATABASE_NAME);

		$criteria->add(NphisprePeer::ID, $this->id);

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

		$copyObj->setCodtippre($this->codtippre);

		$copyObj->setFechispre($this->fechispre);

		$copyObj->setDeshispre($this->deshispre);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setSaldo($this->saldo);


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
			self::$peer = new NphisprePeer();
		}
		return self::$peer;
	}

} 