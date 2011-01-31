<?php


abstract class BaseIncondpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcond;


	
	protected $descond;


	
	protected $tipcond;


	
	protected $genord;


	
	protected $diascond;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcond()
  {

    return trim($this->codcond);

  }
  
  public function getDescond()
  {

    return trim($this->descond);

  }
  
  public function getTipcond()
  {

    return trim($this->tipcond);

  }
  
  public function getGenord()
  {

    return trim($this->genord);

  }
  
  public function getDiascond()
  {

    return $this->diascond;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcond($v)
	{

    if ($this->codcond !== $v) {
        $this->codcond = $v;
        $this->modifiedColumns[] = IncondpagPeer::CODCOND;
      }
  
	} 
	
	public function setDescond($v)
	{

    if ($this->descond !== $v) {
        $this->descond = $v;
        $this->modifiedColumns[] = IncondpagPeer::DESCOND;
      }
  
	} 
	
	public function setTipcond($v)
	{

    if ($this->tipcond !== $v) {
        $this->tipcond = $v;
        $this->modifiedColumns[] = IncondpagPeer::TIPCOND;
      }
  
	} 
	
	public function setGenord($v)
	{

    if ($this->genord !== $v) {
        $this->genord = $v;
        $this->modifiedColumns[] = IncondpagPeer::GENORD;
      }
  
	} 
	
	public function setDiascond($v)
	{

    if ($this->diascond !== $v) {
        $this->diascond = $v;
        $this->modifiedColumns[] = IncondpagPeer::DIASCOND;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IncondpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcond = $rs->getString($startcol + 0);

      $this->descond = $rs->getString($startcol + 1);

      $this->tipcond = $rs->getString($startcol + 2);

      $this->genord = $rs->getString($startcol + 3);

      $this->diascond = $rs->getInt($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Incondpag object", $e);
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
			$con = Propel::getConnection(IncondpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IncondpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IncondpagPeer::DATABASE_NAME);
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
					$pk = IncondpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IncondpagPeer::doUpdate($this, $con);
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


			if (($retval = IncondpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IncondpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcond();
				break;
			case 1:
				return $this->getDescond();
				break;
			case 2:
				return $this->getTipcond();
				break;
			case 3:
				return $this->getGenord();
				break;
			case 4:
				return $this->getDiascond();
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
		$keys = IncondpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcond(),
			$keys[1] => $this->getDescond(),
			$keys[2] => $this->getTipcond(),
			$keys[3] => $this->getGenord(),
			$keys[4] => $this->getDiascond(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IncondpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcond($value);
				break;
			case 1:
				$this->setDescond($value);
				break;
			case 2:
				$this->setTipcond($value);
				break;
			case 3:
				$this->setGenord($value);
				break;
			case 4:
				$this->setDiascond($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IncondpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcond($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescond($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcond($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGenord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiascond($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IncondpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(IncondpagPeer::CODCOND)) $criteria->add(IncondpagPeer::CODCOND, $this->codcond);
		if ($this->isColumnModified(IncondpagPeer::DESCOND)) $criteria->add(IncondpagPeer::DESCOND, $this->descond);
		if ($this->isColumnModified(IncondpagPeer::TIPCOND)) $criteria->add(IncondpagPeer::TIPCOND, $this->tipcond);
		if ($this->isColumnModified(IncondpagPeer::GENORD)) $criteria->add(IncondpagPeer::GENORD, $this->genord);
		if ($this->isColumnModified(IncondpagPeer::DIASCOND)) $criteria->add(IncondpagPeer::DIASCOND, $this->diascond);
		if ($this->isColumnModified(IncondpagPeer::ID)) $criteria->add(IncondpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IncondpagPeer::DATABASE_NAME);

		$criteria->add(IncondpagPeer::ID, $this->id);

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

		$copyObj->setCodcond($this->codcond);

		$copyObj->setDescond($this->descond);

		$copyObj->setTipcond($this->tipcond);

		$copyObj->setGenord($this->genord);

		$copyObj->setDiascond($this->diascond);


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
			self::$peer = new IncondpagPeer();
		}
		return self::$peer;
	}

} 