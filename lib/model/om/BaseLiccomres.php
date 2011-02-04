<?php


abstract class BaseLiccomres extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcomres;


	
	protected $descomres;


	
	protected $porcentaje;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcomres()
  {

    return trim($this->codcomres);

  }
  
  public function getDescomres()
  {

    return trim($this->descomres);

  }
  
  public function getPorcentaje($val=false)
  {

    if($val) return number_format($this->porcentaje,2,',','.');
    else return $this->porcentaje;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcomres($v)
	{

    if ($this->codcomres !== $v) {
        $this->codcomres = $v;
        $this->modifiedColumns[] = LiccomresPeer::CODCOMRES;
      }
  
	} 
	
	public function setDescomres($v)
	{

    if ($this->descomres !== $v) {
        $this->descomres = $v;
        $this->modifiedColumns[] = LiccomresPeer::DESCOMRES;
      }
  
	} 
	
	public function setPorcentaje($v)
	{

    if ($this->porcentaje !== $v) {
        $this->porcentaje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiccomresPeer::PORCENTAJE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiccomresPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcomres = $rs->getString($startcol + 0);

      $this->descomres = $rs->getString($startcol + 1);

      $this->porcentaje = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liccomres object", $e);
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
			$con = Propel::getConnection(LiccomresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiccomresPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiccomresPeer::DATABASE_NAME);
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
					$pk = LiccomresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiccomresPeer::doUpdate($this, $con);
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


			if (($retval = LiccomresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiccomresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcomres();
				break;
			case 1:
				return $this->getDescomres();
				break;
			case 2:
				return $this->getPorcentaje();
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
		$keys = LiccomresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcomres(),
			$keys[1] => $this->getDescomres(),
			$keys[2] => $this->getPorcentaje(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiccomresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcomres($value);
				break;
			case 1:
				$this->setDescomres($value);
				break;
			case 2:
				$this->setPorcentaje($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiccomresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcomres($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescomres($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorcentaje($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiccomresPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiccomresPeer::CODCOMRES)) $criteria->add(LiccomresPeer::CODCOMRES, $this->codcomres);
		if ($this->isColumnModified(LiccomresPeer::DESCOMRES)) $criteria->add(LiccomresPeer::DESCOMRES, $this->descomres);
		if ($this->isColumnModified(LiccomresPeer::PORCENTAJE)) $criteria->add(LiccomresPeer::PORCENTAJE, $this->porcentaje);
		if ($this->isColumnModified(LiccomresPeer::ID)) $criteria->add(LiccomresPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiccomresPeer::DATABASE_NAME);

		$criteria->add(LiccomresPeer::ID, $this->id);

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

		$copyObj->setCodcomres($this->codcomres);

		$copyObj->setDescomres($this->descomres);

		$copyObj->setPorcentaje($this->porcentaje);


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
			self::$peer = new LiccomresPeer();
		}
		return self::$peer;
	}

} 