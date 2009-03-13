<?php


abstract class BaseFamovaju extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refaju;


	
	protected $codart;


	
	protected $numlot;


	
	protected $canord;


	
	protected $canaju;


	
	protected $montot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefaju()
  {

    return trim($this->refaju);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getNumlot()
  {

    return trim($this->numlot);

  }
  
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,2,',','.');
    else return $this->canord;

  }
  
  public function getCanaju($val=false)
  {

    if($val) return number_format($this->canaju,2,',','.');
    else return $this->canaju;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefaju($v)
	{

    if ($this->refaju !== $v) {
        $this->refaju = $v;
        $this->modifiedColumns[] = FamovajuPeer::REFAJU;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FamovajuPeer::CODART;
      }
  
	} 
	
	public function setNumlot($v)
	{

    if ($this->numlot !== $v) {
        $this->numlot = $v;
        $this->modifiedColumns[] = FamovajuPeer::NUMLOT;
      }
  
	} 
	
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FamovajuPeer::CANORD;
      }
  
	} 
	
	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FamovajuPeer::CANAJU;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FamovajuPeer::MONTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FamovajuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refaju = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->numlot = $rs->getString($startcol + 2);

      $this->canord = $rs->getFloat($startcol + 3);

      $this->canaju = $rs->getFloat($startcol + 4);

      $this->montot = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Famovaju object", $e);
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
			$con = Propel::getConnection(FamovajuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FamovajuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FamovajuPeer::DATABASE_NAME);
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
					$pk = FamovajuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FamovajuPeer::doUpdate($this, $con);
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


			if (($retval = FamovajuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamovajuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefaju();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getNumlot();
				break;
			case 3:
				return $this->getCanord();
				break;
			case 4:
				return $this->getCanaju();
				break;
			case 5:
				return $this->getMontot();
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
		$keys = FamovajuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefaju(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getNumlot(),
			$keys[3] => $this->getCanord(),
			$keys[4] => $this->getCanaju(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamovajuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefaju($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setNumlot($value);
				break;
			case 3:
				$this->setCanord($value);
				break;
			case 4:
				$this->setCanaju($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FamovajuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumlot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FamovajuPeer::DATABASE_NAME);

		if ($this->isColumnModified(FamovajuPeer::REFAJU)) $criteria->add(FamovajuPeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(FamovajuPeer::CODART)) $criteria->add(FamovajuPeer::CODART, $this->codart);
		if ($this->isColumnModified(FamovajuPeer::NUMLOT)) $criteria->add(FamovajuPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(FamovajuPeer::CANORD)) $criteria->add(FamovajuPeer::CANORD, $this->canord);
		if ($this->isColumnModified(FamovajuPeer::CANAJU)) $criteria->add(FamovajuPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(FamovajuPeer::MONTOT)) $criteria->add(FamovajuPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(FamovajuPeer::ID)) $criteria->add(FamovajuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FamovajuPeer::DATABASE_NAME);

		$criteria->add(FamovajuPeer::ID, $this->id);

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

		$copyObj->setRefaju($this->refaju);

		$copyObj->setCodart($this->codart);

		$copyObj->setNumlot($this->numlot);

		$copyObj->setCanord($this->canord);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new FamovajuPeer();
		}
		return self::$peer;
	}

} 