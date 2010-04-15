<?php


abstract class BaseRhdefvalins extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codvalins;


	
	protected $desvalins;


	
	protected $obsvalins;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodvalins()
  {

    return trim($this->codvalins);

  }
  
  public function getDesvalins()
  {

    return trim($this->desvalins);

  }
  
  public function getObsvalins()
  {

    return trim($this->obsvalins);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodvalins($v)
	{

    if ($this->codvalins !== $v) {
        $this->codvalins = $v;
        $this->modifiedColumns[] = RhdefvalinsPeer::CODVALINS;
      }
  
	} 
	
	public function setDesvalins($v)
	{

    if ($this->desvalins !== $v) {
        $this->desvalins = $v;
        $this->modifiedColumns[] = RhdefvalinsPeer::DESVALINS;
      }
  
	} 
	
	public function setObsvalins($v)
	{

    if ($this->obsvalins !== $v) {
        $this->obsvalins = $v;
        $this->modifiedColumns[] = RhdefvalinsPeer::OBSVALINS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhdefvalinsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codvalins = $rs->getString($startcol + 0);

      $this->desvalins = $rs->getString($startcol + 1);

      $this->obsvalins = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhdefvalins object", $e);
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
			$con = Propel::getConnection(RhdefvalinsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdefvalinsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdefvalinsPeer::DATABASE_NAME);
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
					$pk = RhdefvalinsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhdefvalinsPeer::doUpdate($this, $con);
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


			if (($retval = RhdefvalinsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefvalinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodvalins();
				break;
			case 1:
				return $this->getDesvalins();
				break;
			case 2:
				return $this->getObsvalins();
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
		$keys = RhdefvalinsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodvalins(),
			$keys[1] => $this->getDesvalins(),
			$keys[2] => $this->getObsvalins(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefvalinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodvalins($value);
				break;
			case 1:
				$this->setDesvalins($value);
				break;
			case 2:
				$this->setObsvalins($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdefvalinsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodvalins($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesvalins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObsvalins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdefvalinsPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdefvalinsPeer::CODVALINS)) $criteria->add(RhdefvalinsPeer::CODVALINS, $this->codvalins);
		if ($this->isColumnModified(RhdefvalinsPeer::DESVALINS)) $criteria->add(RhdefvalinsPeer::DESVALINS, $this->desvalins);
		if ($this->isColumnModified(RhdefvalinsPeer::OBSVALINS)) $criteria->add(RhdefvalinsPeer::OBSVALINS, $this->obsvalins);
		if ($this->isColumnModified(RhdefvalinsPeer::ID)) $criteria->add(RhdefvalinsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdefvalinsPeer::DATABASE_NAME);

		$criteria->add(RhdefvalinsPeer::ID, $this->id);

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

		$copyObj->setCodvalins($this->codvalins);

		$copyObj->setDesvalins($this->desvalins);

		$copyObj->setObsvalins($this->obsvalins);


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
			self::$peer = new RhdefvalinsPeer();
		}
		return self::$peer;
	}

} 