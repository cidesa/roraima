<?php


abstract class BaseFargoartpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrgo;


	
	protected $codart;


	
	protected $refdoc;


	
	protected $monrgo;


	
	protected $tipdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrgo()
  {

    return trim($this->codrgo);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrgo($v)
	{

    if ($this->codrgo !== $v) {
        $this->codrgo = $v;
        $this->modifiedColumns[] = FargoartproPeer::CODRGO;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FargoartproPeer::CODART;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = FargoartproPeer::REFDOC;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FargoartproPeer::MONRGO;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = FargoartproPeer::TIPDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FargoartproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrgo = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->refdoc = $rs->getString($startcol + 2);

      $this->monrgo = $rs->getFloat($startcol + 3);

      $this->tipdoc = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fargoartpro object", $e);
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
			$con = Propel::getConnection(FargoartproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FargoartproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FargoartproPeer::DATABASE_NAME);
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
					$pk = FargoartproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FargoartproPeer::doUpdate($this, $con);
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


			if (($retval = FargoartproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FargoartproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrgo();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getRefdoc();
				break;
			case 3:
				return $this->getMonrgo();
				break;
			case 4:
				return $this->getTipdoc();
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
		$keys = FargoartproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrgo(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getRefdoc(),
			$keys[3] => $this->getMonrgo(),
			$keys[4] => $this->getTipdoc(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FargoartproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrgo($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setRefdoc($value);
				break;
			case 3:
				$this->setMonrgo($value);
				break;
			case 4:
				$this->setTipdoc($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FargoartproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrgo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefdoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonrgo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FargoartproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FargoartproPeer::CODRGO)) $criteria->add(FargoartproPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(FargoartproPeer::CODART)) $criteria->add(FargoartproPeer::CODART, $this->codart);
		if ($this->isColumnModified(FargoartproPeer::REFDOC)) $criteria->add(FargoartproPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(FargoartproPeer::MONRGO)) $criteria->add(FargoartproPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FargoartproPeer::TIPDOC)) $criteria->add(FargoartproPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(FargoartproPeer::ID)) $criteria->add(FargoartproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FargoartproPeer::DATABASE_NAME);

		$criteria->add(FargoartproPeer::ID, $this->id);

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

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setCodart($this->codart);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTipdoc($this->tipdoc);


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
			self::$peer = new FargoartproPeer();
		}
		return self::$peer;
	}

} 