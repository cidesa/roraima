<?php


abstract class BaseLiasplegcrieva extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcri;


	
	protected $descri;


	
	protected $puntaje;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcri()
  {

    return trim($this->codcri);

  }
  
  public function getDescri()
  {

    return trim($this->descri);

  }
  
  public function getPuntaje($val=false)
  {

    if($val) return number_format($this->puntaje,2,',','.');
    else return $this->puntaje;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcri($v)
	{

    if ($this->codcri !== $v) {
        $this->codcri = $v;
        $this->modifiedColumns[] = LiasplegcrievaPeer::CODCRI;
      }
  
	} 
	
	public function setDescri($v)
	{

    if ($this->descri !== $v) {
        $this->descri = $v;
        $this->modifiedColumns[] = LiasplegcrievaPeer::DESCRI;
      }
  
	} 
	
	public function setPuntaje($v)
	{

    if ($this->puntaje !== $v) {
        $this->puntaje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiasplegcrievaPeer::PUNTAJE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiasplegcrievaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcri = $rs->getString($startcol + 0);

      $this->descri = $rs->getString($startcol + 1);

      $this->puntaje = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liasplegcrieva object", $e);
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
			$con = Propel::getConnection(LiasplegcrievaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiasplegcrievaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiasplegcrievaPeer::DATABASE_NAME);
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
					$pk = LiasplegcrievaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiasplegcrievaPeer::doUpdate($this, $con);
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


			if (($retval = LiasplegcrievaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiasplegcrievaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcri();
				break;
			case 1:
				return $this->getDescri();
				break;
			case 2:
				return $this->getPuntaje();
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
		$keys = LiasplegcrievaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcri(),
			$keys[1] => $this->getDescri(),
			$keys[2] => $this->getPuntaje(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiasplegcrievaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcri($value);
				break;
			case 1:
				$this->setDescri($value);
				break;
			case 2:
				$this->setPuntaje($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiasplegcrievaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcri($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPuntaje($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiasplegcrievaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiasplegcrievaPeer::CODCRI)) $criteria->add(LiasplegcrievaPeer::CODCRI, $this->codcri);
		if ($this->isColumnModified(LiasplegcrievaPeer::DESCRI)) $criteria->add(LiasplegcrievaPeer::DESCRI, $this->descri);
		if ($this->isColumnModified(LiasplegcrievaPeer::PUNTAJE)) $criteria->add(LiasplegcrievaPeer::PUNTAJE, $this->puntaje);
		if ($this->isColumnModified(LiasplegcrievaPeer::ID)) $criteria->add(LiasplegcrievaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiasplegcrievaPeer::DATABASE_NAME);

		$criteria->add(LiasplegcrievaPeer::ID, $this->id);

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

		$copyObj->setCodcri($this->codcri);

		$copyObj->setDescri($this->descri);

		$copyObj->setPuntaje($this->puntaje);


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
			self::$peer = new LiasplegcrievaPeer();
		}
		return self::$peer;
	}

} 