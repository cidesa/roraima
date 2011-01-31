<?php


abstract class BaseBdreporte extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $campo1;


	
	protected $campo2;


	
	protected $campo3;


	
	protected $campo4;


	
	protected $campo5;


	
	protected $campo6;


	
	protected $campo7;


	
	protected $campo8;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCampo1()
  {

    return trim($this->campo1);

  }
  
  public function getCampo2()
  {

    return trim($this->campo2);

  }
  
  public function getCampo3()
  {

    return trim($this->campo3);

  }
  
  public function getCampo4()
  {

    return trim($this->campo4);

  }
  
  public function getCampo5()
  {

    return trim($this->campo5);

  }
  
  public function getCampo6()
  {

    return trim($this->campo6);

  }
  
  public function getCampo7()
  {

    return trim($this->campo7);

  }
  
  public function getCampo8()
  {

    return trim($this->campo8);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCampo1($v)
	{

    if ($this->campo1 !== $v) {
        $this->campo1 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO1;
      }
  
	} 
	
	public function setCampo2($v)
	{

    if ($this->campo2 !== $v) {
        $this->campo2 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO2;
      }
  
	} 
	
	public function setCampo3($v)
	{

    if ($this->campo3 !== $v) {
        $this->campo3 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO3;
      }
  
	} 
	
	public function setCampo4($v)
	{

    if ($this->campo4 !== $v) {
        $this->campo4 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO4;
      }
  
	} 
	
	public function setCampo5($v)
	{

    if ($this->campo5 !== $v) {
        $this->campo5 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO5;
      }
  
	} 
	
	public function setCampo6($v)
	{

    if ($this->campo6 !== $v) {
        $this->campo6 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO6;
      }
  
	} 
	
	public function setCampo7($v)
	{

    if ($this->campo7 !== $v) {
        $this->campo7 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO7;
      }
  
	} 
	
	public function setCampo8($v)
	{

    if ($this->campo8 !== $v) {
        $this->campo8 = $v;
        $this->modifiedColumns[] = BdreportePeer::CAMPO8;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BdreportePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->campo1 = $rs->getString($startcol + 0);

      $this->campo2 = $rs->getString($startcol + 1);

      $this->campo3 = $rs->getString($startcol + 2);

      $this->campo4 = $rs->getString($startcol + 3);

      $this->campo5 = $rs->getString($startcol + 4);

      $this->campo6 = $rs->getString($startcol + 5);

      $this->campo7 = $rs->getString($startcol + 6);

      $this->campo8 = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bdreporte object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BdreportePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BdreportePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BdreportePeer::DATABASE_NAME);
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
					$pk = BdreportePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BdreportePeer::doUpdate($this, $con);
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


			if (($retval = BdreportePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BdreportePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCampo1();
				break;
			case 1:
				return $this->getCampo2();
				break;
			case 2:
				return $this->getCampo3();
				break;
			case 3:
				return $this->getCampo4();
				break;
			case 4:
				return $this->getCampo5();
				break;
			case 5:
				return $this->getCampo6();
				break;
			case 6:
				return $this->getCampo7();
				break;
			case 7:
				return $this->getCampo8();
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
		$keys = BdreportePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCampo1(),
			$keys[1] => $this->getCampo2(),
			$keys[2] => $this->getCampo3(),
			$keys[3] => $this->getCampo4(),
			$keys[4] => $this->getCampo5(),
			$keys[5] => $this->getCampo6(),
			$keys[6] => $this->getCampo7(),
			$keys[7] => $this->getCampo8(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BdreportePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCampo1($value);
				break;
			case 1:
				$this->setCampo2($value);
				break;
			case 2:
				$this->setCampo3($value);
				break;
			case 3:
				$this->setCampo4($value);
				break;
			case 4:
				$this->setCampo5($value);
				break;
			case 5:
				$this->setCampo6($value);
				break;
			case 6:
				$this->setCampo7($value);
				break;
			case 7:
				$this->setCampo8($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BdreportePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCampo1($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCampo2($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCampo3($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCampo4($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCampo5($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCampo6($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCampo7($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCampo8($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BdreportePeer::DATABASE_NAME);

		if ($this->isColumnModified(BdreportePeer::CAMPO1)) $criteria->add(BdreportePeer::CAMPO1, $this->campo1);
		if ($this->isColumnModified(BdreportePeer::CAMPO2)) $criteria->add(BdreportePeer::CAMPO2, $this->campo2);
		if ($this->isColumnModified(BdreportePeer::CAMPO3)) $criteria->add(BdreportePeer::CAMPO3, $this->campo3);
		if ($this->isColumnModified(BdreportePeer::CAMPO4)) $criteria->add(BdreportePeer::CAMPO4, $this->campo4);
		if ($this->isColumnModified(BdreportePeer::CAMPO5)) $criteria->add(BdreportePeer::CAMPO5, $this->campo5);
		if ($this->isColumnModified(BdreportePeer::CAMPO6)) $criteria->add(BdreportePeer::CAMPO6, $this->campo6);
		if ($this->isColumnModified(BdreportePeer::CAMPO7)) $criteria->add(BdreportePeer::CAMPO7, $this->campo7);
		if ($this->isColumnModified(BdreportePeer::CAMPO8)) $criteria->add(BdreportePeer::CAMPO8, $this->campo8);
		if ($this->isColumnModified(BdreportePeer::ID)) $criteria->add(BdreportePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BdreportePeer::DATABASE_NAME);

		$criteria->add(BdreportePeer::ID, $this->id);

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

		$copyObj->setCampo1($this->campo1);

		$copyObj->setCampo2($this->campo2);

		$copyObj->setCampo3($this->campo3);

		$copyObj->setCampo4($this->campo4);

		$copyObj->setCampo5($this->campo5);

		$copyObj->setCampo6($this->campo6);

		$copyObj->setCampo7($this->campo7);

		$copyObj->setCampo8($this->campo8);


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
			self::$peer = new BdreportePeer();
		}
		return self::$peer;
	}

} 