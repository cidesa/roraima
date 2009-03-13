<?php


abstract class BaseFacladto extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $loguse;


	
	protected $descto;


	
	protected $clave;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getDescto($val=false)
  {

    if($val) return number_format($this->descto,2,',','.');
    else return $this->descto;

  }
  
  public function getClave()
  {

    return trim($this->clave);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = FacladtoPeer::LOGUSE;
      }
  
	} 
	
	public function setDescto($v)
	{

    if ($this->descto !== $v) {
        $this->descto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacladtoPeer::DESCTO;
      }
  
	} 
	
	public function setClave($v)
	{

    if ($this->clave !== $v) {
        $this->clave = $v;
        $this->modifiedColumns[] = FacladtoPeer::CLAVE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacladtoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->loguse = $rs->getString($startcol + 0);

      $this->descto = $rs->getFloat($startcol + 1);

      $this->clave = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facladto object", $e);
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
			$con = Propel::getConnection(FacladtoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacladtoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacladtoPeer::DATABASE_NAME);
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
					$pk = FacladtoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FacladtoPeer::doUpdate($this, $con);
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


			if (($retval = FacladtoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacladtoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLoguse();
				break;
			case 1:
				return $this->getDescto();
				break;
			case 2:
				return $this->getClave();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacladtoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLoguse(),
			$keys[1] => $this->getDescto(),
			$keys[2] => $this->getClave(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacladtoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLoguse($value);
				break;
			case 1:
				$this->setDescto($value);
				break;
			case 2:
				$this->setClave($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacladtoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLoguse($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setClave($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacladtoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacladtoPeer::LOGUSE)) $criteria->add(FacladtoPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(FacladtoPeer::DESCTO)) $criteria->add(FacladtoPeer::DESCTO, $this->descto);
		if ($this->isColumnModified(FacladtoPeer::CLAVE)) $criteria->add(FacladtoPeer::CLAVE, $this->clave);
		if ($this->isColumnModified(FacladtoPeer::ID)) $criteria->add(FacladtoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacladtoPeer::DATABASE_NAME);

		$criteria->add(FacladtoPeer::ID, $this->id);

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

		$copyObj->setLoguse($this->loguse);

		$copyObj->setDescto($this->descto);

		$copyObj->setClave($this->clave);


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
			self::$peer = new FacladtoPeer();
		}
		return self::$peer;
	}

} 