<?php


abstract class BaseBnparbie extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pardes;


	
	protected $parhas;


	
	protected $valrcp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getPardes()
  {

    return trim($this->pardes);

  }
  
  public function getParhas()
  {

    return trim($this->parhas);

  }
  
  public function getValrcp()
  {

    return trim($this->valrcp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setPardes($v)
	{

    if ($this->pardes !== $v) {
        $this->pardes = $v;
        $this->modifiedColumns[] = BnparbiePeer::PARDES;
      }
  
	} 
	
	public function setParhas($v)
	{

    if ($this->parhas !== $v) {
        $this->parhas = $v;
        $this->modifiedColumns[] = BnparbiePeer::PARHAS;
      }
  
	} 
	
	public function setValrcp($v)
	{

    if ($this->valrcp !== $v) {
        $this->valrcp = $v;
        $this->modifiedColumns[] = BnparbiePeer::VALRCP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnparbiePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->pardes = $rs->getString($startcol + 0);

      $this->parhas = $rs->getString($startcol + 1);

      $this->valrcp = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnparbie object", $e);
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
			$con = Propel::getConnection(BnparbiePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnparbiePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnparbiePeer::DATABASE_NAME);
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
					$pk = BnparbiePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnparbiePeer::doUpdate($this, $con);
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


			if (($retval = BnparbiePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnparbiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPardes();
				break;
			case 1:
				return $this->getParhas();
				break;
			case 2:
				return $this->getValrcp();
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
		$keys = BnparbiePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPardes(),
			$keys[1] => $this->getParhas(),
			$keys[2] => $this->getValrcp(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnparbiePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPardes($value);
				break;
			case 1:
				$this->setParhas($value);
				break;
			case 2:
				$this->setValrcp($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnparbiePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPardes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setParhas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValrcp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnparbiePeer::DATABASE_NAME);

		if ($this->isColumnModified(BnparbiePeer::PARDES)) $criteria->add(BnparbiePeer::PARDES, $this->pardes);
		if ($this->isColumnModified(BnparbiePeer::PARHAS)) $criteria->add(BnparbiePeer::PARHAS, $this->parhas);
		if ($this->isColumnModified(BnparbiePeer::VALRCP)) $criteria->add(BnparbiePeer::VALRCP, $this->valrcp);
		if ($this->isColumnModified(BnparbiePeer::ID)) $criteria->add(BnparbiePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnparbiePeer::DATABASE_NAME);

		$criteria->add(BnparbiePeer::ID, $this->id);

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

		$copyObj->setPardes($this->pardes);

		$copyObj->setParhas($this->parhas);

		$copyObj->setValrcp($this->valrcp);


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
			self::$peer = new BnparbiePeer();
		}
		return self::$peer;
	}

} 