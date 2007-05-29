<?php


abstract class BaseBdcampos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomcamp1;


	
	protected $nomcamp2;


	
	protected $nomcamp3;


	
	protected $nomcamp4;


	
	protected $nomcamp5;


	
	protected $nomcamp6;


	
	protected $nomcamp7;


	
	protected $nomcamp8;


	
	protected $criterio;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNomcamp1()
	{

		return $this->nomcamp1; 		
	}
	
	public function getNomcamp2()
	{

		return $this->nomcamp2; 		
	}
	
	public function getNomcamp3()
	{

		return $this->nomcamp3; 		
	}
	
	public function getNomcamp4()
	{

		return $this->nomcamp4; 		
	}
	
	public function getNomcamp5()
	{

		return $this->nomcamp5; 		
	}
	
	public function getNomcamp6()
	{

		return $this->nomcamp6; 		
	}
	
	public function getNomcamp7()
	{

		return $this->nomcamp7; 		
	}
	
	public function getNomcamp8()
	{

		return $this->nomcamp8; 		
	}
	
	public function getCriterio()
	{

		return $this->criterio; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNomcamp1($v)
	{

		if ($this->nomcamp1 !== $v) {
			$this->nomcamp1 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP1;
		}

	} 
	
	public function setNomcamp2($v)
	{

		if ($this->nomcamp2 !== $v) {
			$this->nomcamp2 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP2;
		}

	} 
	
	public function setNomcamp3($v)
	{

		if ($this->nomcamp3 !== $v) {
			$this->nomcamp3 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP3;
		}

	} 
	
	public function setNomcamp4($v)
	{

		if ($this->nomcamp4 !== $v) {
			$this->nomcamp4 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP4;
		}

	} 
	
	public function setNomcamp5($v)
	{

		if ($this->nomcamp5 !== $v) {
			$this->nomcamp5 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP5;
		}

	} 
	
	public function setNomcamp6($v)
	{

		if ($this->nomcamp6 !== $v) {
			$this->nomcamp6 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP6;
		}

	} 
	
	public function setNomcamp7($v)
	{

		if ($this->nomcamp7 !== $v) {
			$this->nomcamp7 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP7;
		}

	} 
	
	public function setNomcamp8($v)
	{

		if ($this->nomcamp8 !== $v) {
			$this->nomcamp8 = $v;
			$this->modifiedColumns[] = BdcamposPeer::NOMCAMP8;
		}

	} 
	
	public function setCriterio($v)
	{

		if ($this->criterio !== $v) {
			$this->criterio = $v;
			$this->modifiedColumns[] = BdcamposPeer::CRITERIO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BdcamposPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nomcamp1 = $rs->getString($startcol + 0);

			$this->nomcamp2 = $rs->getString($startcol + 1);

			$this->nomcamp3 = $rs->getString($startcol + 2);

			$this->nomcamp4 = $rs->getString($startcol + 3);

			$this->nomcamp5 = $rs->getString($startcol + 4);

			$this->nomcamp6 = $rs->getString($startcol + 5);

			$this->nomcamp7 = $rs->getString($startcol + 6);

			$this->nomcamp8 = $rs->getString($startcol + 7);

			$this->criterio = $rs->getString($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bdcampos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BdcamposPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BdcamposPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BdcamposPeer::DATABASE_NAME);
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
					$pk = BdcamposPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BdcamposPeer::doUpdate($this, $con);
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


			if (($retval = BdcamposPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BdcamposPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomcamp1();
				break;
			case 1:
				return $this->getNomcamp2();
				break;
			case 2:
				return $this->getNomcamp3();
				break;
			case 3:
				return $this->getNomcamp4();
				break;
			case 4:
				return $this->getNomcamp5();
				break;
			case 5:
				return $this->getNomcamp6();
				break;
			case 6:
				return $this->getNomcamp7();
				break;
			case 7:
				return $this->getNomcamp8();
				break;
			case 8:
				return $this->getCriterio();
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
		$keys = BdcamposPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomcamp1(),
			$keys[1] => $this->getNomcamp2(),
			$keys[2] => $this->getNomcamp3(),
			$keys[3] => $this->getNomcamp4(),
			$keys[4] => $this->getNomcamp5(),
			$keys[5] => $this->getNomcamp6(),
			$keys[6] => $this->getNomcamp7(),
			$keys[7] => $this->getNomcamp8(),
			$keys[8] => $this->getCriterio(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BdcamposPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomcamp1($value);
				break;
			case 1:
				$this->setNomcamp2($value);
				break;
			case 2:
				$this->setNomcamp3($value);
				break;
			case 3:
				$this->setNomcamp4($value);
				break;
			case 4:
				$this->setNomcamp5($value);
				break;
			case 5:
				$this->setNomcamp6($value);
				break;
			case 6:
				$this->setNomcamp7($value);
				break;
			case 7:
				$this->setNomcamp8($value);
				break;
			case 8:
				$this->setCriterio($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BdcamposPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomcamp1($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcamp2($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcamp3($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomcamp4($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomcamp5($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomcamp6($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomcamp7($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomcamp8($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCriterio($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BdcamposPeer::DATABASE_NAME);

		if ($this->isColumnModified(BdcamposPeer::NOMCAMP1)) $criteria->add(BdcamposPeer::NOMCAMP1, $this->nomcamp1);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP2)) $criteria->add(BdcamposPeer::NOMCAMP2, $this->nomcamp2);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP3)) $criteria->add(BdcamposPeer::NOMCAMP3, $this->nomcamp3);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP4)) $criteria->add(BdcamposPeer::NOMCAMP4, $this->nomcamp4);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP5)) $criteria->add(BdcamposPeer::NOMCAMP5, $this->nomcamp5);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP6)) $criteria->add(BdcamposPeer::NOMCAMP6, $this->nomcamp6);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP7)) $criteria->add(BdcamposPeer::NOMCAMP7, $this->nomcamp7);
		if ($this->isColumnModified(BdcamposPeer::NOMCAMP8)) $criteria->add(BdcamposPeer::NOMCAMP8, $this->nomcamp8);
		if ($this->isColumnModified(BdcamposPeer::CRITERIO)) $criteria->add(BdcamposPeer::CRITERIO, $this->criterio);
		if ($this->isColumnModified(BdcamposPeer::ID)) $criteria->add(BdcamposPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BdcamposPeer::DATABASE_NAME);

		$criteria->add(BdcamposPeer::ID, $this->id);

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

		$copyObj->setNomcamp1($this->nomcamp1);

		$copyObj->setNomcamp2($this->nomcamp2);

		$copyObj->setNomcamp3($this->nomcamp3);

		$copyObj->setNomcamp4($this->nomcamp4);

		$copyObj->setNomcamp5($this->nomcamp5);

		$copyObj->setNomcamp6($this->nomcamp6);

		$copyObj->setNomcamp7($this->nomcamp7);

		$copyObj->setNomcamp8($this->nomcamp8);

		$copyObj->setCriterio($this->criterio);


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
			self::$peer = new BdcamposPeer();
		}
		return self::$peer;
	}

} 