<?php


abstract class BaseAcdestina extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $nomdes;


	
	protected $dirdes;


	
	protected $teldes;


	
	protected $nitdes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomdes()
  {

    return trim($this->nomdes);

  }
  
  public function getDirdes()
  {

    return trim($this->dirdes);

  }
  
  public function getTeldes()
  {

    return trim($this->teldes);

  }
  
  public function getNitdes()
  {

    return trim($this->nitdes);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = AcdestinaPeer::CEDRIF;
      }
  
	} 
	
	public function setNomdes($v)
	{

    if ($this->nomdes !== $v) {
        $this->nomdes = $v;
        $this->modifiedColumns[] = AcdestinaPeer::NOMDES;
      }
  
	} 
	
	public function setDirdes($v)
	{

    if ($this->dirdes !== $v) {
        $this->dirdes = $v;
        $this->modifiedColumns[] = AcdestinaPeer::DIRDES;
      }
  
	} 
	
	public function setTeldes($v)
	{

    if ($this->teldes !== $v) {
        $this->teldes = $v;
        $this->modifiedColumns[] = AcdestinaPeer::TELDES;
      }
  
	} 
	
	public function setNitdes($v)
	{

    if ($this->nitdes !== $v) {
        $this->nitdes = $v;
        $this->modifiedColumns[] = AcdestinaPeer::NITDES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AcdestinaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrif = $rs->getString($startcol + 0);

      $this->nomdes = $rs->getString($startcol + 1);

      $this->dirdes = $rs->getString($startcol + 2);

      $this->teldes = $rs->getString($startcol + 3);

      $this->nitdes = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Acdestina object", $e);
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
			$con = Propel::getConnection(AcdestinaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AcdestinaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AcdestinaPeer::DATABASE_NAME);
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
					$pk = AcdestinaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AcdestinaPeer::doUpdate($this, $con);
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


			if (($retval = AcdestinaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcdestinaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getNomdes();
				break;
			case 2:
				return $this->getDirdes();
				break;
			case 3:
				return $this->getTeldes();
				break;
			case 4:
				return $this->getNitdes();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcdestinaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getNomdes(),
			$keys[2] => $this->getDirdes(),
			$keys[3] => $this->getTeldes(),
			$keys[4] => $this->getNitdes(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcdestinaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setNomdes($value);
				break;
			case 2:
				$this->setDirdes($value);
				break;
			case 3:
				$this->setTeldes($value);
				break;
			case 4:
				$this->setNitdes($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcdestinaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTeldes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNitdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AcdestinaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AcdestinaPeer::CEDRIF)) $criteria->add(AcdestinaPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(AcdestinaPeer::NOMDES)) $criteria->add(AcdestinaPeer::NOMDES, $this->nomdes);
		if ($this->isColumnModified(AcdestinaPeer::DIRDES)) $criteria->add(AcdestinaPeer::DIRDES, $this->dirdes);
		if ($this->isColumnModified(AcdestinaPeer::TELDES)) $criteria->add(AcdestinaPeer::TELDES, $this->teldes);
		if ($this->isColumnModified(AcdestinaPeer::NITDES)) $criteria->add(AcdestinaPeer::NITDES, $this->nitdes);
		if ($this->isColumnModified(AcdestinaPeer::ID)) $criteria->add(AcdestinaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AcdestinaPeer::DATABASE_NAME);

		$criteria->add(AcdestinaPeer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomdes($this->nomdes);

		$copyObj->setDirdes($this->dirdes);

		$copyObj->setTeldes($this->teldes);

		$copyObj->setNitdes($this->nitdes);


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
			self::$peer = new AcdestinaPeer();
		}
		return self::$peer;
	}

} 