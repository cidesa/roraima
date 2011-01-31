<?php


abstract class BaseFaregots extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $nomots;


	
	protected $rifpro;


	
	protected $placa;


	
	protected $estatus;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomots()
  {

    return trim($this->nomots);

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getPlaca()
  {

    return trim($this->placa);

  }
  
  public function getEstatus()
  {

    return trim($this->estatus);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = FaregotsPeer::CEDRIF;
      }
  
	} 
	
	public function setNomots($v)
	{

    if ($this->nomots !== $v) {
        $this->nomots = $v;
        $this->modifiedColumns[] = FaregotsPeer::NOMOTS;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = FaregotsPeer::RIFPRO;
      }
  
	} 
	
	public function setPlaca($v)
	{

    if ($this->placa !== $v) {
        $this->placa = $v;
        $this->modifiedColumns[] = FaregotsPeer::PLACA;
      }
  
	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = FaregotsPeer::ESTATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaregotsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrif = $rs->getString($startcol + 0);

      $this->nomots = $rs->getString($startcol + 1);

      $this->rifpro = $rs->getString($startcol + 2);

      $this->placa = $rs->getString($startcol + 3);

      $this->estatus = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faregots object", $e);
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
			$con = Propel::getConnection(FaregotsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaregotsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaregotsPeer::DATABASE_NAME);
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
					$pk = FaregotsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaregotsPeer::doUpdate($this, $con);
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


			if (($retval = FaregotsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaregotsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getNomots();
				break;
			case 2:
				return $this->getRifpro();
				break;
			case 3:
				return $this->getPlaca();
				break;
			case 4:
				return $this->getEstatus();
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
		$keys = FaregotsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getNomots(),
			$keys[2] => $this->getRifpro(),
			$keys[3] => $this->getPlaca(),
			$keys[4] => $this->getEstatus(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaregotsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setNomots($value);
				break;
			case 2:
				$this->setRifpro($value);
				break;
			case 3:
				$this->setPlaca($value);
				break;
			case 4:
				$this->setEstatus($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaregotsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomots($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPlaca($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaregotsPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaregotsPeer::CEDRIF)) $criteria->add(FaregotsPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(FaregotsPeer::NOMOTS)) $criteria->add(FaregotsPeer::NOMOTS, $this->nomots);
		if ($this->isColumnModified(FaregotsPeer::RIFPRO)) $criteria->add(FaregotsPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(FaregotsPeer::PLACA)) $criteria->add(FaregotsPeer::PLACA, $this->placa);
		if ($this->isColumnModified(FaregotsPeer::ESTATUS)) $criteria->add(FaregotsPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(FaregotsPeer::ID)) $criteria->add(FaregotsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaregotsPeer::DATABASE_NAME);

		$criteria->add(FaregotsPeer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomots($this->nomots);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setPlaca($this->placa);

		$copyObj->setEstatus($this->estatus);


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
			self::$peer = new FaregotsPeer();
		}
		return self::$peer;
	}

} 