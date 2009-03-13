<?php


abstract class BaseIndestipcli extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $indefdes_id;


	
	protected $intipcli_id;


	
	protected $id;

	
	protected $aIndefdes;

	
	protected $aIntipcli;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getIndefdesId()
  {

    return $this->indefdes_id;

  }
  
  public function getIntipcliId()
  {

    return $this->intipcli_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setIndefdesId($v)
	{

    if ($this->indefdes_id !== $v) {
        $this->indefdes_id = $v;
        $this->modifiedColumns[] = IndestipcliPeer::INDEFDES_ID;
      }
  
		if ($this->aIndefdes !== null && $this->aIndefdes->getId() !== $v) {
			$this->aIndefdes = null;
		}

	} 
	
	public function setIntipcliId($v)
	{

    if ($this->intipcli_id !== $v) {
        $this->intipcli_id = $v;
        $this->modifiedColumns[] = IndestipcliPeer::INTIPCLI_ID;
      }
  
		if ($this->aIntipcli !== null && $this->aIntipcli->getId() !== $v) {
			$this->aIntipcli = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IndestipcliPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->indefdes_id = $rs->getInt($startcol + 0);

      $this->intipcli_id = $rs->getInt($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Indestipcli object", $e);
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
			$con = Propel::getConnection(IndestipcliPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IndestipcliPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IndestipcliPeer::DATABASE_NAME);
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


												
			if ($this->aIndefdes !== null) {
				if ($this->aIndefdes->isModified()) {
					$affectedRows += $this->aIndefdes->save($con);
				}
				$this->setIndefdes($this->aIndefdes);
			}

			if ($this->aIntipcli !== null) {
				if ($this->aIntipcli->isModified()) {
					$affectedRows += $this->aIntipcli->save($con);
				}
				$this->setIntipcli($this->aIntipcli);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = IndestipcliPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IndestipcliPeer::doUpdate($this, $con);
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


												
			if ($this->aIndefdes !== null) {
				if (!$this->aIndefdes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIndefdes->getValidationFailures());
				}
			}

			if ($this->aIntipcli !== null) {
				if (!$this->aIntipcli->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIntipcli->getValidationFailures());
				}
			}


			if (($retval = IndestipcliPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndestipcliPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIndefdesId();
				break;
			case 1:
				return $this->getIntipcliId();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndestipcliPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIndefdesId(),
			$keys[1] => $this->getIntipcliId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndestipcliPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIndefdesId($value);
				break;
			case 1:
				$this->setIntipcliId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndestipcliPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIndefdesId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIntipcliId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IndestipcliPeer::DATABASE_NAME);

		if ($this->isColumnModified(IndestipcliPeer::INDEFDES_ID)) $criteria->add(IndestipcliPeer::INDEFDES_ID, $this->indefdes_id);
		if ($this->isColumnModified(IndestipcliPeer::INTIPCLI_ID)) $criteria->add(IndestipcliPeer::INTIPCLI_ID, $this->intipcli_id);
		if ($this->isColumnModified(IndestipcliPeer::ID)) $criteria->add(IndestipcliPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IndestipcliPeer::DATABASE_NAME);

		$criteria->add(IndestipcliPeer::ID, $this->id);

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

		$copyObj->setIndefdesId($this->indefdes_id);

		$copyObj->setIntipcliId($this->intipcli_id);


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
			self::$peer = new IndestipcliPeer();
		}
		return self::$peer;
	}

	
	public function setIndefdes($v)
	{


		if ($v === null) {
			$this->setIndefdesId(NULL);
		} else {
			$this->setIndefdesId($v->getId());
		}


		$this->aIndefdes = $v;
	}


	
	public function getIndefdes($con = null)
	{
		if ($this->aIndefdes === null && ($this->indefdes_id !== null)) {
						include_once 'lib/model/om/BaseIndefdesPeer.php';

			$this->aIndefdes = IndefdesPeer::retrieveByPK($this->indefdes_id, $con);

			
		}
		return $this->aIndefdes;
	}

	
	public function setIntipcli($v)
	{


		if ($v === null) {
			$this->setIntipcliId(NULL);
		} else {
			$this->setIntipcliId($v->getId());
		}


		$this->aIntipcli = $v;
	}


	
	public function getIntipcli($con = null)
	{
		if ($this->aIntipcli === null && ($this->intipcli_id !== null)) {
						include_once 'lib/model/om/BaseIntipcliPeer.php';

			$this->aIntipcli = IntipcliPeer::retrieveByPK($this->intipcli_id, $con);

			
		}
		return $this->aIntipcli;
	}

} 