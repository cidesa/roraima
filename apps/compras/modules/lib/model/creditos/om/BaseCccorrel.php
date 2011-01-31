<?php


abstract class BaseCccorrel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $cornumsol;


	
	protected $corsolliq;


	
	protected $corcredit;


	
	protected $corsoldes;


	
	protected $corpag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCornumsol()
  {

    return $this->cornumsol;

  }
  
  public function getCorsolliq()
  {

    return $this->corsolliq;

  }
  
  public function getCorcredit()
  {

    return $this->corcredit;

  }
  
  public function getCorsoldes()
  {

    return $this->corsoldes;

  }
  
  public function getCorpag()
  {

    return $this->corpag;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccorrelPeer::ID;
      }
  
	} 
	
	public function setCornumsol($v)
	{

    if ($this->cornumsol !== $v) {
        $this->cornumsol = $v;
        $this->modifiedColumns[] = CccorrelPeer::CORNUMSOL;
      }
  
	} 
	
	public function setCorsolliq($v)
	{

    if ($this->corsolliq !== $v) {
        $this->corsolliq = $v;
        $this->modifiedColumns[] = CccorrelPeer::CORSOLLIQ;
      }
  
	} 
	
	public function setCorcredit($v)
	{

    if ($this->corcredit !== $v) {
        $this->corcredit = $v;
        $this->modifiedColumns[] = CccorrelPeer::CORCREDIT;
      }
  
	} 
	
	public function setCorsoldes($v)
	{

    if ($this->corsoldes !== $v) {
        $this->corsoldes = $v;
        $this->modifiedColumns[] = CccorrelPeer::CORSOLDES;
      }
  
	} 
	
	public function setCorpag($v)
	{

    if ($this->corpag !== $v) {
        $this->corpag = $v;
        $this->modifiedColumns[] = CccorrelPeer::CORPAG;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->cornumsol = $rs->getInt($startcol + 1);

      $this->corsolliq = $rs->getInt($startcol + 2);

      $this->corcredit = $rs->getInt($startcol + 3);

      $this->corsoldes = $rs->getInt($startcol + 4);

      $this->corpag = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccorrel object", $e);
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
			$con = Propel::getConnection(CccorrelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccorrelPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccorrelPeer::DATABASE_NAME);
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
					$pk = CccorrelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccorrelPeer::doUpdate($this, $con);
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


			if (($retval = CccorrelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccorrelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCornumsol();
				break;
			case 2:
				return $this->getCorsolliq();
				break;
			case 3:
				return $this->getCorcredit();
				break;
			case 4:
				return $this->getCorsoldes();
				break;
			case 5:
				return $this->getCorpag();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccorrelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCornumsol(),
			$keys[2] => $this->getCorsolliq(),
			$keys[3] => $this->getCorcredit(),
			$keys[4] => $this->getCorsoldes(),
			$keys[5] => $this->getCorpag(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccorrelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCornumsol($value);
				break;
			case 2:
				$this->setCorsolliq($value);
				break;
			case 3:
				$this->setCorcredit($value);
				break;
			case 4:
				$this->setCorsoldes($value);
				break;
			case 5:
				$this->setCorpag($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccorrelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCornumsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorsolliq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorcredit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCorsoldes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCorpag($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccorrelPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccorrelPeer::ID)) $criteria->add(CccorrelPeer::ID, $this->id);
		if ($this->isColumnModified(CccorrelPeer::CORNUMSOL)) $criteria->add(CccorrelPeer::CORNUMSOL, $this->cornumsol);
		if ($this->isColumnModified(CccorrelPeer::CORSOLLIQ)) $criteria->add(CccorrelPeer::CORSOLLIQ, $this->corsolliq);
		if ($this->isColumnModified(CccorrelPeer::CORCREDIT)) $criteria->add(CccorrelPeer::CORCREDIT, $this->corcredit);
		if ($this->isColumnModified(CccorrelPeer::CORSOLDES)) $criteria->add(CccorrelPeer::CORSOLDES, $this->corsoldes);
		if ($this->isColumnModified(CccorrelPeer::CORPAG)) $criteria->add(CccorrelPeer::CORPAG, $this->corpag);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccorrelPeer::DATABASE_NAME);

		$criteria->add(CccorrelPeer::ID, $this->id);

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

		$copyObj->setCornumsol($this->cornumsol);

		$copyObj->setCorsolliq($this->corsolliq);

		$copyObj->setCorcredit($this->corcredit);

		$copyObj->setCorsoldes($this->corsoldes);

		$copyObj->setCorpag($this->corpag);


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
			self::$peer = new CccorrelPeer();
		}
		return self::$peer;
	}

} 