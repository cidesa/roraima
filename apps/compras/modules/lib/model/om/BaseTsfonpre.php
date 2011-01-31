<?php


abstract class BaseTsfonpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numche;


	
	protected $tipemp;


	
	protected $tippre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getTipemp()
  {

    return trim($this->tipemp);

  }
  
  public function getTippre()
  {

    return trim($this->tippre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = TsfonprePeer::NUMCHE;
      }
  
	} 
	
	public function setTipemp($v)
	{

    if ($this->tipemp !== $v) {
        $this->tipemp = $v;
        $this->modifiedColumns[] = TsfonprePeer::TIPEMP;
      }
  
	} 
	
	public function setTippre($v)
	{

    if ($this->tippre !== $v) {
        $this->tippre = $v;
        $this->modifiedColumns[] = TsfonprePeer::TIPPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsfonprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numche = $rs->getString($startcol + 0);

      $this->tipemp = $rs->getString($startcol + 1);

      $this->tippre = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsfonpre object", $e);
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
			$con = Propel::getConnection(TsfonprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsfonprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsfonprePeer::DATABASE_NAME);
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
					$pk = TsfonprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsfonprePeer::doUpdate($this, $con);
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


			if (($retval = TsfonprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsfonprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumche();
				break;
			case 1:
				return $this->getTipemp();
				break;
			case 2:
				return $this->getTippre();
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
		$keys = TsfonprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumche(),
			$keys[1] => $this->getTipemp(),
			$keys[2] => $this->getTippre(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsfonprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumche($value);
				break;
			case 1:
				$this->setTipemp($value);
				break;
			case 2:
				$this->setTippre($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsfonprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumche($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTippre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsfonprePeer::DATABASE_NAME);

		if ($this->isColumnModified(TsfonprePeer::NUMCHE)) $criteria->add(TsfonprePeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TsfonprePeer::TIPEMP)) $criteria->add(TsfonprePeer::TIPEMP, $this->tipemp);
		if ($this->isColumnModified(TsfonprePeer::TIPPRE)) $criteria->add(TsfonprePeer::TIPPRE, $this->tippre);
		if ($this->isColumnModified(TsfonprePeer::ID)) $criteria->add(TsfonprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsfonprePeer::DATABASE_NAME);

		$criteria->add(TsfonprePeer::ID, $this->id);

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

		$copyObj->setNumche($this->numche);

		$copyObj->setTipemp($this->tipemp);

		$copyObj->setTippre($this->tippre);


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
			self::$peer = new TsfonprePeer();
		}
		return self::$peer;
	}

} 