<?php


abstract class BaseViaasoproniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codproced;


	
	protected $codnivapr;


	
	protected $prioriapr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodproced()
  {

    return trim($this->codproced);

  }
  
  public function getCodnivapr()
  {

    return trim($this->codnivapr);

  }
  
  public function getPrioriapr()
  {

    return $this->prioriapr;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodproced($v)
	{

    if ($this->codproced !== $v) {
        $this->codproced = $v;
        $this->modifiedColumns[] = ViaasopronivPeer::CODPROCED;
      }
  
	} 
	
	public function setCodnivapr($v)
	{

    if ($this->codnivapr !== $v) {
        $this->codnivapr = $v;
        $this->modifiedColumns[] = ViaasopronivPeer::CODNIVAPR;
      }
  
	} 
	
	public function setPrioriapr($v)
	{

    if ($this->prioriapr !== $v) {
        $this->prioriapr = $v;
        $this->modifiedColumns[] = ViaasopronivPeer::PRIORIAPR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaasopronivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codproced = $rs->getString($startcol + 0);

      $this->codnivapr = $rs->getString($startcol + 1);

      $this->prioriapr = $rs->getInt($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaasoproniv object", $e);
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
			$con = Propel::getConnection(ViaasopronivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaasopronivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaasopronivPeer::DATABASE_NAME);
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
					$pk = ViaasopronivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaasopronivPeer::doUpdate($this, $con);
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


			if (($retval = ViaasopronivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaasopronivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodproced();
				break;
			case 1:
				return $this->getCodnivapr();
				break;
			case 2:
				return $this->getPrioriapr();
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
		$keys = ViaasopronivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodproced(),
			$keys[1] => $this->getCodnivapr(),
			$keys[2] => $this->getPrioriapr(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaasopronivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodproced($value);
				break;
			case 1:
				$this->setCodnivapr($value);
				break;
			case 2:
				$this->setPrioriapr($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaasopronivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodproced($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnivapr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrioriapr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaasopronivPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaasopronivPeer::CODPROCED)) $criteria->add(ViaasopronivPeer::CODPROCED, $this->codproced);
		if ($this->isColumnModified(ViaasopronivPeer::CODNIVAPR)) $criteria->add(ViaasopronivPeer::CODNIVAPR, $this->codnivapr);
		if ($this->isColumnModified(ViaasopronivPeer::PRIORIAPR)) $criteria->add(ViaasopronivPeer::PRIORIAPR, $this->prioriapr);
		if ($this->isColumnModified(ViaasopronivPeer::ID)) $criteria->add(ViaasopronivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaasopronivPeer::DATABASE_NAME);

		$criteria->add(ViaasopronivPeer::ID, $this->id);

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

		$copyObj->setCodproced($this->codproced);

		$copyObj->setCodnivapr($this->codnivapr);

		$copyObj->setPrioriapr($this->prioriapr);


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
			self::$peer = new ViaasopronivPeer();
		}
		return self::$peer;
	}

} 