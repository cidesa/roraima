<?php


abstract class BaseRhdefind extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codind;


	
	protected $desind;


	
	protected $tipind;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodind()
  {

    return trim($this->codind);

  }
  
  public function getDesind()
  {

    return trim($this->desind);

  }
  
  public function getTipind()
  {

    return trim($this->tipind);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodind($v)
	{

    if ($this->codind !== $v) {
        $this->codind = $v;
        $this->modifiedColumns[] = RhdefindPeer::CODIND;
      }
  
	} 
	
	public function setDesind($v)
	{

    if ($this->desind !== $v) {
        $this->desind = $v;
        $this->modifiedColumns[] = RhdefindPeer::DESIND;
      }
  
	} 
	
	public function setTipind($v)
	{

    if ($this->tipind !== $v) {
        $this->tipind = $v;
        $this->modifiedColumns[] = RhdefindPeer::TIPIND;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhdefindPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codind = $rs->getString($startcol + 0);

      $this->desind = $rs->getString($startcol + 1);

      $this->tipind = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhdefind object", $e);
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
			$con = Propel::getConnection(RhdefindPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdefindPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdefindPeer::DATABASE_NAME);
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
					$pk = RhdefindPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhdefindPeer::doUpdate($this, $con);
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


			if (($retval = RhdefindPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodind();
				break;
			case 1:
				return $this->getDesind();
				break;
			case 2:
				return $this->getTipind();
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
		$keys = RhdefindPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodind(),
			$keys[1] => $this->getDesind(),
			$keys[2] => $this->getTipind(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodind($value);
				break;
			case 1:
				$this->setDesind($value);
				break;
			case 2:
				$this->setTipind($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdefindPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodind($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesind($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipind($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdefindPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdefindPeer::CODIND)) $criteria->add(RhdefindPeer::CODIND, $this->codind);
		if ($this->isColumnModified(RhdefindPeer::DESIND)) $criteria->add(RhdefindPeer::DESIND, $this->desind);
		if ($this->isColumnModified(RhdefindPeer::TIPIND)) $criteria->add(RhdefindPeer::TIPIND, $this->tipind);
		if ($this->isColumnModified(RhdefindPeer::ID)) $criteria->add(RhdefindPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdefindPeer::DATABASE_NAME);

		$criteria->add(RhdefindPeer::ID, $this->id);

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

		$copyObj->setCodind($this->codind);

		$copyObj->setDesind($this->desind);

		$copyObj->setTipind($this->tipind);


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
			self::$peer = new RhdefindPeer();
		}
		return self::$peer;
	}

} 