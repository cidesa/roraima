<?php


abstract class BaseViadefproced extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codproced;


	
	protected $desproced;


	
	protected $aprobacion;


	
	protected $codnivapr;


	
	protected $prioriapr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodproced()
  {

    return trim($this->codproced);

  }
  
  public function getDesproced()
  {

    return trim($this->desproced);

  }
  
  public function getAprobacion()
  {

    return trim($this->aprobacion);

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
        $this->modifiedColumns[] = ViadefprocedPeer::CODPROCED;
      }
  
	} 
	
	public function setDesproced($v)
	{

    if ($this->desproced !== $v) {
        $this->desproced = $v;
        $this->modifiedColumns[] = ViadefprocedPeer::DESPROCED;
      }
  
	} 
	
	public function setAprobacion($v)
	{

    if ($this->aprobacion !== $v) {
        $this->aprobacion = $v;
        $this->modifiedColumns[] = ViadefprocedPeer::APROBACION;
      }
  
	} 
	
	public function setCodnivapr($v)
	{

    if ($this->codnivapr !== $v) {
        $this->codnivapr = $v;
        $this->modifiedColumns[] = ViadefprocedPeer::CODNIVAPR;
      }
  
	} 
	
	public function setPrioriapr($v)
	{

    if ($this->prioriapr !== $v) {
        $this->prioriapr = $v;
        $this->modifiedColumns[] = ViadefprocedPeer::PRIORIAPR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadefprocedPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codproced = $rs->getString($startcol + 0);

      $this->desproced = $rs->getString($startcol + 1);

      $this->aprobacion = $rs->getString($startcol + 2);

      $this->codnivapr = $rs->getString($startcol + 3);

      $this->prioriapr = $rs->getInt($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadefproced object", $e);
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
			$con = Propel::getConnection(ViadefprocedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadefprocedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadefprocedPeer::DATABASE_NAME);
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
					$pk = ViadefprocedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadefprocedPeer::doUpdate($this, $con);
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


			if (($retval = ViadefprocedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefprocedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodproced();
				break;
			case 1:
				return $this->getDesproced();
				break;
			case 2:
				return $this->getAprobacion();
				break;
			case 3:
				return $this->getCodnivapr();
				break;
			case 4:
				return $this->getPrioriapr();
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
		$keys = ViadefprocedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodproced(),
			$keys[1] => $this->getDesproced(),
			$keys[2] => $this->getAprobacion(),
			$keys[3] => $this->getCodnivapr(),
			$keys[4] => $this->getPrioriapr(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefprocedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodproced($value);
				break;
			case 1:
				$this->setDesproced($value);
				break;
			case 2:
				$this->setAprobacion($value);
				break;
			case 3:
				$this->setCodnivapr($value);
				break;
			case 4:
				$this->setPrioriapr($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadefprocedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodproced($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesproced($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAprobacion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodnivapr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrioriapr($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadefprocedPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadefprocedPeer::CODPROCED)) $criteria->add(ViadefprocedPeer::CODPROCED, $this->codproced);
		if ($this->isColumnModified(ViadefprocedPeer::DESPROCED)) $criteria->add(ViadefprocedPeer::DESPROCED, $this->desproced);
		if ($this->isColumnModified(ViadefprocedPeer::APROBACION)) $criteria->add(ViadefprocedPeer::APROBACION, $this->aprobacion);
		if ($this->isColumnModified(ViadefprocedPeer::CODNIVAPR)) $criteria->add(ViadefprocedPeer::CODNIVAPR, $this->codnivapr);
		if ($this->isColumnModified(ViadefprocedPeer::PRIORIAPR)) $criteria->add(ViadefprocedPeer::PRIORIAPR, $this->prioriapr);
		if ($this->isColumnModified(ViadefprocedPeer::ID)) $criteria->add(ViadefprocedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadefprocedPeer::DATABASE_NAME);

		$criteria->add(ViadefprocedPeer::ID, $this->id);

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

		$copyObj->setDesproced($this->desproced);

		$copyObj->setAprobacion($this->aprobacion);

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
			self::$peer = new ViadefprocedPeer();
		}
		return self::$peer;
	}

} 