<?php


abstract class BaseNppreliq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecvig;


	
	protected $codnom;


	
	protected $mes;


	
	protected $diapre;


	
	protected $diaant;


	
	protected $diavac;


	
	protected $diavacfra;


	
	protected $diabonvac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFecvig($format = 'Y-m-d')
	{

		if ($this->fecvig === null || $this->fecvig === '') {
			return null;
		} elseif (!is_int($this->fecvig)) {
						$ts = strtotime($this->fecvig);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecvig] as date/time value: " . var_export($this->fecvig, true));
			}
		} else {
			$ts = $this->fecvig;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getMes()
	{

		return $this->mes;
	}

	
	public function getDiapre()
	{

		return $this->diapre;
	}

	
	public function getDiaant()
	{

		return $this->diaant;
	}

	
	public function getDiavac()
	{

		return $this->diavac;
	}

	
	public function getDiavacfra()
	{

		return $this->diavacfra;
	}

	
	public function getDiabonvac()
	{

		return $this->diabonvac;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setFecvig($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecvig] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecvig !== $ts) {
			$this->fecvig = $ts;
			$this->modifiedColumns[] = NppreliqPeer::FECVIG;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NppreliqPeer::CODNOM;
		}

	} 
	
	public function setMes($v)
	{

		if ($this->mes !== $v) {
			$this->mes = $v;
			$this->modifiedColumns[] = NppreliqPeer::MES;
		}

	} 
	
	public function setDiapre($v)
	{

		if ($this->diapre !== $v) {
			$this->diapre = $v;
			$this->modifiedColumns[] = NppreliqPeer::DIAPRE;
		}

	} 
	
	public function setDiaant($v)
	{

		if ($this->diaant !== $v) {
			$this->diaant = $v;
			$this->modifiedColumns[] = NppreliqPeer::DIAANT;
		}

	} 
	
	public function setDiavac($v)
	{

		if ($this->diavac !== $v) {
			$this->diavac = $v;
			$this->modifiedColumns[] = NppreliqPeer::DIAVAC;
		}

	} 
	
	public function setDiavacfra($v)
	{

		if ($this->diavacfra !== $v) {
			$this->diavacfra = $v;
			$this->modifiedColumns[] = NppreliqPeer::DIAVACFRA;
		}

	} 
	
	public function setDiabonvac($v)
	{

		if ($this->diabonvac !== $v) {
			$this->diabonvac = $v;
			$this->modifiedColumns[] = NppreliqPeer::DIABONVAC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NppreliqPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fecvig = $rs->getDate($startcol + 0, null);

			$this->codnom = $rs->getString($startcol + 1);

			$this->mes = $rs->getFloat($startcol + 2);

			$this->diapre = $rs->getFloat($startcol + 3);

			$this->diaant = $rs->getFloat($startcol + 4);

			$this->diavac = $rs->getFloat($startcol + 5);

			$this->diavacfra = $rs->getFloat($startcol + 6);

			$this->diabonvac = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nppreliq object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NppreliqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NppreliqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NppreliqPeer::DATABASE_NAME);
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
					$pk = NppreliqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NppreliqPeer::doUpdate($this, $con);
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


			if (($retval = NppreliqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NppreliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecvig();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getMes();
				break;
			case 3:
				return $this->getDiapre();
				break;
			case 4:
				return $this->getDiaant();
				break;
			case 5:
				return $this->getDiavac();
				break;
			case 6:
				return $this->getDiavacfra();
				break;
			case 7:
				return $this->getDiabonvac();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NppreliqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecvig(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getMes(),
			$keys[3] => $this->getDiapre(),
			$keys[4] => $this->getDiaant(),
			$keys[5] => $this->getDiavac(),
			$keys[6] => $this->getDiavacfra(),
			$keys[7] => $this->getDiabonvac(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NppreliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecvig($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setMes($value);
				break;
			case 3:
				$this->setDiapre($value);
				break;
			case 4:
				$this->setDiaant($value);
				break;
			case 5:
				$this->setDiavac($value);
				break;
			case 6:
				$this->setDiavacfra($value);
				break;
			case 7:
				$this->setDiabonvac($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NppreliqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecvig($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiapre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiaant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiavac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiavacfra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiabonvac($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NppreliqPeer::DATABASE_NAME);

		if ($this->isColumnModified(NppreliqPeer::FECVIG)) $criteria->add(NppreliqPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(NppreliqPeer::CODNOM)) $criteria->add(NppreliqPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NppreliqPeer::MES)) $criteria->add(NppreliqPeer::MES, $this->mes);
		if ($this->isColumnModified(NppreliqPeer::DIAPRE)) $criteria->add(NppreliqPeer::DIAPRE, $this->diapre);
		if ($this->isColumnModified(NppreliqPeer::DIAANT)) $criteria->add(NppreliqPeer::DIAANT, $this->diaant);
		if ($this->isColumnModified(NppreliqPeer::DIAVAC)) $criteria->add(NppreliqPeer::DIAVAC, $this->diavac);
		if ($this->isColumnModified(NppreliqPeer::DIAVACFRA)) $criteria->add(NppreliqPeer::DIAVACFRA, $this->diavacfra);
		if ($this->isColumnModified(NppreliqPeer::DIABONVAC)) $criteria->add(NppreliqPeer::DIABONVAC, $this->diabonvac);
		if ($this->isColumnModified(NppreliqPeer::ID)) $criteria->add(NppreliqPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NppreliqPeer::DATABASE_NAME);

		$criteria->add(NppreliqPeer::ID, $this->id);

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

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setMes($this->mes);

		$copyObj->setDiapre($this->diapre);

		$copyObj->setDiaant($this->diaant);

		$copyObj->setDiavac($this->diavac);

		$copyObj->setDiavacfra($this->diavacfra);

		$copyObj->setDiabonvac($this->diabonvac);


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
			self::$peer = new NppreliqPeer();
		}
		return self::$peer;
	}

} 