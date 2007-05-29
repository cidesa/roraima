<?php


abstract class BaseNpvacliquidacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $perini;


	
	protected $perfin;


	
	protected $diadis;


	
	protected $diasbono;


	
	protected $monto;


	
	protected $ultsue;


	
	protected $montoinci;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getPerini()
	{

		return $this->perini; 		
	}
	
	public function getPerfin()
	{

		return $this->perfin; 		
	}
	
	public function getDiadis()
	{

		return number_format($this->diadis,2,',','.');
		
	}
	
	public function getDiasbono()
	{

		return number_format($this->diasbono,2,',','.');
		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getUltsue()
	{

		return number_format($this->ultsue,2,',','.');
		
	}
	
	public function getMontoinci()
	{

		return number_format($this->montoinci,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::CODEMP;
		}

	} 
	
	public function setPerini($v)
	{

		if ($this->perini !== $v) {
			$this->perini = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::PERINI;
		}

	} 
	
	public function setPerfin($v)
	{

		if ($this->perfin !== $v) {
			$this->perfin = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::PERFIN;
		}

	} 
	
	public function setDiadis($v)
	{

		if ($this->diadis !== $v) {
			$this->diadis = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::DIADIS;
		}

	} 
	
	public function setDiasbono($v)
	{

		if ($this->diasbono !== $v) {
			$this->diasbono = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::DIASBONO;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::MONTO;
		}

	} 
	
	public function setUltsue($v)
	{

		if ($this->ultsue !== $v) {
			$this->ultsue = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::ULTSUE;
		}

	} 
	
	public function setMontoinci($v)
	{

		if ($this->montoinci !== $v) {
			$this->montoinci = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::MONTOINCI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpvacliquidacionPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->perini = $rs->getString($startcol + 1);

			$this->perfin = $rs->getString($startcol + 2);

			$this->diadis = $rs->getFloat($startcol + 3);

			$this->diasbono = $rs->getFloat($startcol + 4);

			$this->monto = $rs->getFloat($startcol + 5);

			$this->ultsue = $rs->getFloat($startcol + 6);

			$this->montoinci = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npvacliquidacion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpvacliquidacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacliquidacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacliquidacionPeer::DATABASE_NAME);
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
					$pk = NpvacliquidacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpvacliquidacionPeer::doUpdate($this, $con);
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


			if (($retval = NpvacliquidacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacliquidacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getPerini();
				break;
			case 2:
				return $this->getPerfin();
				break;
			case 3:
				return $this->getDiadis();
				break;
			case 4:
				return $this->getDiasbono();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getUltsue();
				break;
			case 7:
				return $this->getMontoinci();
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
		$keys = NpvacliquidacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getPerini(),
			$keys[2] => $this->getPerfin(),
			$keys[3] => $this->getDiadis(),
			$keys[4] => $this->getDiasbono(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getUltsue(),
			$keys[7] => $this->getMontoinci(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacliquidacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setPerini($value);
				break;
			case 2:
				$this->setPerfin($value);
				break;
			case 3:
				$this->setDiadis($value);
				break;
			case 4:
				$this->setDiasbono($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setUltsue($value);
				break;
			case 7:
				$this->setMontoinci($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacliquidacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiadis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiasbono($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUltsue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMontoinci($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacliquidacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacliquidacionPeer::CODEMP)) $criteria->add(NpvacliquidacionPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacliquidacionPeer::PERINI)) $criteria->add(NpvacliquidacionPeer::PERINI, $this->perini);
		if ($this->isColumnModified(NpvacliquidacionPeer::PERFIN)) $criteria->add(NpvacliquidacionPeer::PERFIN, $this->perfin);
		if ($this->isColumnModified(NpvacliquidacionPeer::DIADIS)) $criteria->add(NpvacliquidacionPeer::DIADIS, $this->diadis);
		if ($this->isColumnModified(NpvacliquidacionPeer::DIASBONO)) $criteria->add(NpvacliquidacionPeer::DIASBONO, $this->diasbono);
		if ($this->isColumnModified(NpvacliquidacionPeer::MONTO)) $criteria->add(NpvacliquidacionPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpvacliquidacionPeer::ULTSUE)) $criteria->add(NpvacliquidacionPeer::ULTSUE, $this->ultsue);
		if ($this->isColumnModified(NpvacliquidacionPeer::MONTOINCI)) $criteria->add(NpvacliquidacionPeer::MONTOINCI, $this->montoinci);
		if ($this->isColumnModified(NpvacliquidacionPeer::ID)) $criteria->add(NpvacliquidacionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacliquidacionPeer::DATABASE_NAME);

		$criteria->add(NpvacliquidacionPeer::ID, $this->id);

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

		$copyObj->setPerini($this->perini);

		$copyObj->setPerfin($this->perfin);

		$copyObj->setDiadis($this->diadis);

		$copyObj->setDiasbono($this->diasbono);

		$copyObj->setMonto($this->monto);

		$copyObj->setUltsue($this->ultsue);

		$copyObj->setMontoinci($this->montoinci);


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
			self::$peer = new NpvacliquidacionPeer();
		}
		return self::$peer;
	}

} 