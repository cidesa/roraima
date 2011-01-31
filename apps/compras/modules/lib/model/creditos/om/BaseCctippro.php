<?php


abstract class BaseCctippro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomtippro;


	
	protected $destippro;


	
	protected $empcoop;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomtippro()
  {

    return trim($this->nomtippro);

  }
  
  public function getDestippro()
  {

    return trim($this->destippro);

  }
  
  public function getEmpcoop()
  {

    return trim($this->empcoop);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CctipproPeer::ID;
      }
  
	} 
	
	public function setNomtippro($v)
	{

    if ($this->nomtippro !== $v) {
        $this->nomtippro = $v;
        $this->modifiedColumns[] = CctipproPeer::NOMTIPPRO;
      }
  
	} 
	
	public function setDestippro($v)
	{

    if ($this->destippro !== $v) {
        $this->destippro = $v;
        $this->modifiedColumns[] = CctipproPeer::DESTIPPRO;
      }
  
	} 
	
	public function setEmpcoop($v)
	{

    if ($this->empcoop !== $v) {
        $this->empcoop = $v;
        $this->modifiedColumns[] = CctipproPeer::EMPCOOP;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomtippro = $rs->getString($startcol + 1);

      $this->destippro = $rs->getString($startcol + 2);

      $this->empcoop = $rs->getString($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cctippro object", $e);
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
			$con = Propel::getConnection(CctipproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CctipproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CctipproPeer::DATABASE_NAME);
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
					$pk = CctipproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CctipproPeer::doUpdate($this, $con);
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


			if (($retval = CctipproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomtippro();
				break;
			case 2:
				return $this->getDestippro();
				break;
			case 3:
				return $this->getEmpcoop();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomtippro(),
			$keys[2] => $this->getDestippro(),
			$keys[3] => $this->getEmpcoop(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomtippro($value);
				break;
			case 2:
				$this->setDestippro($value);
				break;
			case 3:
				$this->setEmpcoop($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtippro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestippro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmpcoop($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CctipproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CctipproPeer::ID)) $criteria->add(CctipproPeer::ID, $this->id);
		if ($this->isColumnModified(CctipproPeer::NOMTIPPRO)) $criteria->add(CctipproPeer::NOMTIPPRO, $this->nomtippro);
		if ($this->isColumnModified(CctipproPeer::DESTIPPRO)) $criteria->add(CctipproPeer::DESTIPPRO, $this->destippro);
		if ($this->isColumnModified(CctipproPeer::EMPCOOP)) $criteria->add(CctipproPeer::EMPCOOP, $this->empcoop);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CctipproPeer::DATABASE_NAME);

		$criteria->add(CctipproPeer::ID, $this->id);

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

		$copyObj->setNomtippro($this->nomtippro);

		$copyObj->setDestippro($this->destippro);

		$copyObj->setEmpcoop($this->empcoop);


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
			self::$peer = new CctipproPeer();
		}
		return self::$peer;
	}

} 