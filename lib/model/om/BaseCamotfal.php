<?php


abstract class BaseCamotfal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codfal;


	
	protected $desfal;


	
	protected $tipfal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodfal()
  {

    return trim($this->codfal);

  }
  
  public function getDesfal()
  {

    return trim($this->desfal);

  }
  
  public function getTipfal()
  {

    return trim($this->tipfal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodfal($v)
	{

    if ($this->codfal !== $v) {
        $this->codfal = $v;
        $this->modifiedColumns[] = CamotfalPeer::CODFAL;
      }
  
	} 
	
	public function setDesfal($v)
	{

    if ($this->desfal !== $v) {
        $this->desfal = $v;
        $this->modifiedColumns[] = CamotfalPeer::DESFAL;
      }
  
	} 
	
	public function setTipfal($v)
	{

    if ($this->tipfal !== $v) {
        $this->tipfal = $v;
        $this->modifiedColumns[] = CamotfalPeer::TIPFAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CamotfalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codfal = $rs->getString($startcol + 0);

      $this->desfal = $rs->getString($startcol + 1);

      $this->tipfal = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Camotfal object", $e);
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
			$con = Propel::getConnection(CamotfalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CamotfalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CamotfalPeer::DATABASE_NAME);
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
					$pk = CamotfalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CamotfalPeer::doUpdate($this, $con);
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


			if (($retval = CamotfalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CamotfalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodfal();
				break;
			case 1:
				return $this->getDesfal();
				break;
			case 2:
				return $this->getTipfal();
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
		$keys = CamotfalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodfal(),
			$keys[1] => $this->getDesfal(),
			$keys[2] => $this->getTipfal(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CamotfalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodfal($value);
				break;
			case 1:
				$this->setDesfal($value);
				break;
			case 2:
				$this->setTipfal($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CamotfalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodfal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesfal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipfal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CamotfalPeer::DATABASE_NAME);

		if ($this->isColumnModified(CamotfalPeer::CODFAL)) $criteria->add(CamotfalPeer::CODFAL, $this->codfal);
		if ($this->isColumnModified(CamotfalPeer::DESFAL)) $criteria->add(CamotfalPeer::DESFAL, $this->desfal);
		if ($this->isColumnModified(CamotfalPeer::TIPFAL)) $criteria->add(CamotfalPeer::TIPFAL, $this->tipfal);
		if ($this->isColumnModified(CamotfalPeer::ID)) $criteria->add(CamotfalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CamotfalPeer::DATABASE_NAME);

		$criteria->add(CamotfalPeer::ID, $this->id);

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

		$copyObj->setCodfal($this->codfal);

		$copyObj->setDesfal($this->desfal);

		$copyObj->setTipfal($this->tipfal);


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
			self::$peer = new CamotfalPeer();
		}
		return self::$peer;
	}

} 