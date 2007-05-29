<?php


abstract class BaseDfrutadoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rutdoc;


	
	protected $tipdoc;


	
	protected $numuni1;


	
	protected $diaper1;


	
	protected $numuni2;


	
	protected $diaper2;


	
	protected $numuni3;


	
	protected $diaper3;


	
	protected $numuni4;


	
	protected $diaper4;


	
	protected $numuni5;


	
	protected $diaper5;


	
	protected $numuni6;


	
	protected $diaper6;


	
	protected $numuni7;


	
	protected $diaper7;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRutdoc()
	{

		return $this->rutdoc; 		
	}
	
	public function getTipdoc()
	{

		return $this->tipdoc; 		
	}
	
	public function getNumuni1()
	{

		return $this->numuni1; 		
	}
	
	public function getDiaper1()
	{

		return number_format($this->diaper1,2,',','.');
		
	}
	
	public function getNumuni2()
	{

		return $this->numuni2; 		
	}
	
	public function getDiaper2()
	{

		return number_format($this->diaper2,2,',','.');
		
	}
	
	public function getNumuni3()
	{

		return $this->numuni3; 		
	}
	
	public function getDiaper3()
	{

		return number_format($this->diaper3,2,',','.');
		
	}
	
	public function getNumuni4()
	{

		return $this->numuni4; 		
	}
	
	public function getDiaper4()
	{

		return number_format($this->diaper4,2,',','.');
		
	}
	
	public function getNumuni5()
	{

		return $this->numuni5; 		
	}
	
	public function getDiaper5()
	{

		return number_format($this->diaper5,2,',','.');
		
	}
	
	public function getNumuni6()
	{

		return $this->numuni6; 		
	}
	
	public function getDiaper6()
	{

		return number_format($this->diaper6,2,',','.');
		
	}
	
	public function getNumuni7()
	{

		return $this->numuni7; 		
	}
	
	public function getDiaper7()
	{

		return number_format($this->diaper7,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRutdoc($v)
	{

		if ($this->rutdoc !== $v) {
			$this->rutdoc = $v;
			$this->modifiedColumns[] = DfrutadocPeer::RUTDOC;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = DfrutadocPeer::TIPDOC;
		}

	} 
	
	public function setNumuni1($v)
	{

		if ($this->numuni1 !== $v) {
			$this->numuni1 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI1;
		}

	} 
	
	public function setDiaper1($v)
	{

		if ($this->diaper1 !== $v) {
			$this->diaper1 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER1;
		}

	} 
	
	public function setNumuni2($v)
	{

		if ($this->numuni2 !== $v) {
			$this->numuni2 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI2;
		}

	} 
	
	public function setDiaper2($v)
	{

		if ($this->diaper2 !== $v) {
			$this->diaper2 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER2;
		}

	} 
	
	public function setNumuni3($v)
	{

		if ($this->numuni3 !== $v) {
			$this->numuni3 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI3;
		}

	} 
	
	public function setDiaper3($v)
	{

		if ($this->diaper3 !== $v) {
			$this->diaper3 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER3;
		}

	} 
	
	public function setNumuni4($v)
	{

		if ($this->numuni4 !== $v) {
			$this->numuni4 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI4;
		}

	} 
	
	public function setDiaper4($v)
	{

		if ($this->diaper4 !== $v) {
			$this->diaper4 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER4;
		}

	} 
	
	public function setNumuni5($v)
	{

		if ($this->numuni5 !== $v) {
			$this->numuni5 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI5;
		}

	} 
	
	public function setDiaper5($v)
	{

		if ($this->diaper5 !== $v) {
			$this->diaper5 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER5;
		}

	} 
	
	public function setNumuni6($v)
	{

		if ($this->numuni6 !== $v) {
			$this->numuni6 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI6;
		}

	} 
	
	public function setDiaper6($v)
	{

		if ($this->diaper6 !== $v) {
			$this->diaper6 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER6;
		}

	} 
	
	public function setNumuni7($v)
	{

		if ($this->numuni7 !== $v) {
			$this->numuni7 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::NUMUNI7;
		}

	} 
	
	public function setDiaper7($v)
	{

		if ($this->diaper7 !== $v) {
			$this->diaper7 = $v;
			$this->modifiedColumns[] = DfrutadocPeer::DIAPER7;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DfrutadocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->rutdoc = $rs->getString($startcol + 0);

			$this->tipdoc = $rs->getString($startcol + 1);

			$this->numuni1 = $rs->getString($startcol + 2);

			$this->diaper1 = $rs->getFloat($startcol + 3);

			$this->numuni2 = $rs->getString($startcol + 4);

			$this->diaper2 = $rs->getFloat($startcol + 5);

			$this->numuni3 = $rs->getString($startcol + 6);

			$this->diaper3 = $rs->getFloat($startcol + 7);

			$this->numuni4 = $rs->getString($startcol + 8);

			$this->diaper4 = $rs->getFloat($startcol + 9);

			$this->numuni5 = $rs->getString($startcol + 10);

			$this->diaper5 = $rs->getFloat($startcol + 11);

			$this->numuni6 = $rs->getString($startcol + 12);

			$this->diaper6 = $rs->getFloat($startcol + 13);

			$this->numuni7 = $rs->getString($startcol + 14);

			$this->diaper7 = $rs->getFloat($startcol + 15);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dfrutadoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfrutadocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
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
					$pk = DfrutadocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DfrutadocPeer::doUpdate($this, $con);
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


			if (($retval = DfrutadocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfrutadocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRutdoc();
				break;
			case 1:
				return $this->getTipdoc();
				break;
			case 2:
				return $this->getNumuni1();
				break;
			case 3:
				return $this->getDiaper1();
				break;
			case 4:
				return $this->getNumuni2();
				break;
			case 5:
				return $this->getDiaper2();
				break;
			case 6:
				return $this->getNumuni3();
				break;
			case 7:
				return $this->getDiaper3();
				break;
			case 8:
				return $this->getNumuni4();
				break;
			case 9:
				return $this->getDiaper4();
				break;
			case 10:
				return $this->getNumuni5();
				break;
			case 11:
				return $this->getDiaper5();
				break;
			case 12:
				return $this->getNumuni6();
				break;
			case 13:
				return $this->getDiaper6();
				break;
			case 14:
				return $this->getNumuni7();
				break;
			case 15:
				return $this->getDiaper7();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfrutadocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRutdoc(),
			$keys[1] => $this->getTipdoc(),
			$keys[2] => $this->getNumuni1(),
			$keys[3] => $this->getDiaper1(),
			$keys[4] => $this->getNumuni2(),
			$keys[5] => $this->getDiaper2(),
			$keys[6] => $this->getNumuni3(),
			$keys[7] => $this->getDiaper3(),
			$keys[8] => $this->getNumuni4(),
			$keys[9] => $this->getDiaper4(),
			$keys[10] => $this->getNumuni5(),
			$keys[11] => $this->getDiaper5(),
			$keys[12] => $this->getNumuni6(),
			$keys[13] => $this->getDiaper6(),
			$keys[14] => $this->getNumuni7(),
			$keys[15] => $this->getDiaper7(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfrutadocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRutdoc($value);
				break;
			case 1:
				$this->setTipdoc($value);
				break;
			case 2:
				$this->setNumuni1($value);
				break;
			case 3:
				$this->setDiaper1($value);
				break;
			case 4:
				$this->setNumuni2($value);
				break;
			case 5:
				$this->setDiaper2($value);
				break;
			case 6:
				$this->setNumuni3($value);
				break;
			case 7:
				$this->setDiaper3($value);
				break;
			case 8:
				$this->setNumuni4($value);
				break;
			case 9:
				$this->setDiaper4($value);
				break;
			case 10:
				$this->setNumuni5($value);
				break;
			case 11:
				$this->setDiaper5($value);
				break;
			case 12:
				$this->setNumuni6($value);
				break;
			case 13:
				$this->setDiaper6($value);
				break;
			case 14:
				$this->setNumuni7($value);
				break;
			case 15:
				$this->setDiaper7($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfrutadocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRutdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumuni1($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiaper1($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumuni2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiaper2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumuni3($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiaper3($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumuni4($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDiaper4($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumuni5($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDiaper5($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumuni6($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDiaper6($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNumuni7($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDiaper7($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfrutadocPeer::RUTDOC)) $criteria->add(DfrutadocPeer::RUTDOC, $this->rutdoc);
		if ($this->isColumnModified(DfrutadocPeer::TIPDOC)) $criteria->add(DfrutadocPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI1)) $criteria->add(DfrutadocPeer::NUMUNI1, $this->numuni1);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER1)) $criteria->add(DfrutadocPeer::DIAPER1, $this->diaper1);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI2)) $criteria->add(DfrutadocPeer::NUMUNI2, $this->numuni2);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER2)) $criteria->add(DfrutadocPeer::DIAPER2, $this->diaper2);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI3)) $criteria->add(DfrutadocPeer::NUMUNI3, $this->numuni3);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER3)) $criteria->add(DfrutadocPeer::DIAPER3, $this->diaper3);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI4)) $criteria->add(DfrutadocPeer::NUMUNI4, $this->numuni4);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER4)) $criteria->add(DfrutadocPeer::DIAPER4, $this->diaper4);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI5)) $criteria->add(DfrutadocPeer::NUMUNI5, $this->numuni5);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER5)) $criteria->add(DfrutadocPeer::DIAPER5, $this->diaper5);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI6)) $criteria->add(DfrutadocPeer::NUMUNI6, $this->numuni6);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER6)) $criteria->add(DfrutadocPeer::DIAPER6, $this->diaper6);
		if ($this->isColumnModified(DfrutadocPeer::NUMUNI7)) $criteria->add(DfrutadocPeer::NUMUNI7, $this->numuni7);
		if ($this->isColumnModified(DfrutadocPeer::DIAPER7)) $criteria->add(DfrutadocPeer::DIAPER7, $this->diaper7);
		if ($this->isColumnModified(DfrutadocPeer::ID)) $criteria->add(DfrutadocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		$criteria->add(DfrutadocPeer::ID, $this->id);

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

		$copyObj->setRutdoc($this->rutdoc);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setNumuni1($this->numuni1);

		$copyObj->setDiaper1($this->diaper1);

		$copyObj->setNumuni2($this->numuni2);

		$copyObj->setDiaper2($this->diaper2);

		$copyObj->setNumuni3($this->numuni3);

		$copyObj->setDiaper3($this->diaper3);

		$copyObj->setNumuni4($this->numuni4);

		$copyObj->setDiaper4($this->diaper4);

		$copyObj->setNumuni5($this->numuni5);

		$copyObj->setDiaper5($this->diaper5);

		$copyObj->setNumuni6($this->numuni6);

		$copyObj->setDiaper6($this->diaper6);

		$copyObj->setNumuni7($this->numuni7);

		$copyObj->setDiaper7($this->diaper7);


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
			self::$peer = new DfrutadocPeer();
		}
		return self::$peer;
	}

} 