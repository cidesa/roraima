<?php


abstract class BaseRhindniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codniv;


	
	protected $codind;


	
	protected $porind;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodind()
  {

    return trim($this->codind);

  }
  
  public function getPorind($val=false)
  {

    if($val) return number_format($this->porind,2,',','.');
    else return $this->porind;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = RhindnivPeer::CODNIV;
      }
  
	} 
	
	public function setCodind($v)
	{

    if ($this->codind !== $v) {
        $this->codind = $v;
        $this->modifiedColumns[] = RhindnivPeer::CODIND;
      }
  
	} 
	
	public function setPorind($v)
	{

    if ($this->porind !== $v) {
        $this->porind = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhindnivPeer::PORIND;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhindnivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codniv = $rs->getString($startcol + 0);

      $this->codind = $rs->getString($startcol + 1);

      $this->porind = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhindniv object", $e);
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
			$con = Propel::getConnection(RhindnivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhindnivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhindnivPeer::DATABASE_NAME);
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
					$pk = RhindnivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhindnivPeer::doUpdate($this, $con);
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


			if (($retval = RhindnivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhindnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodniv();
				break;
			case 1:
				return $this->getCodind();
				break;
			case 2:
				return $this->getPorind();
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
		$keys = RhindnivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodniv(),
			$keys[1] => $this->getCodind(),
			$keys[2] => $this->getPorind(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhindnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodniv($value);
				break;
			case 1:
				$this->setCodind($value);
				break;
			case 2:
				$this->setPorind($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhindnivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodniv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodind($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorind($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhindnivPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhindnivPeer::CODNIV)) $criteria->add(RhindnivPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(RhindnivPeer::CODIND)) $criteria->add(RhindnivPeer::CODIND, $this->codind);
		if ($this->isColumnModified(RhindnivPeer::PORIND)) $criteria->add(RhindnivPeer::PORIND, $this->porind);
		if ($this->isColumnModified(RhindnivPeer::ID)) $criteria->add(RhindnivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhindnivPeer::DATABASE_NAME);

		$criteria->add(RhindnivPeer::ID, $this->id);

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

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodind($this->codind);

		$copyObj->setPorind($this->porind);


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
			self::$peer = new RhindnivPeer();
		}
		return self::$peer;
	}

} 