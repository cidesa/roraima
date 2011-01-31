<?php


abstract class BaseOcofeserval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $numval;


	
	protected $codtipval;


	
	protected $codtippro;


	
	protected $nivpro;


	
	protected $exppro;


	
	protected $cantidad;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNumval()
  {

    return trim($this->numval);

  }
  
  public function getCodtipval()
  {

    return trim($this->codtipval);

  }
  
  public function getCodtippro()
  {

    return trim($this->codtippro);

  }
  
  public function getNivpro()
  {

    return trim($this->nivpro);

  }
  
  public function getExppro($val=false)
  {

    if($val) return number_format($this->exppro,2,',','.');
    else return $this->exppro;

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = OcofeservalPeer::CODCON;
      }
  
	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = OcofeservalPeer::NUMVAL;
      }
  
	} 
	
	public function setCodtipval($v)
	{

    if ($this->codtipval !== $v) {
        $this->codtipval = $v;
        $this->modifiedColumns[] = OcofeservalPeer::CODTIPVAL;
      }
  
	} 
	
	public function setCodtippro($v)
	{

    if ($this->codtippro !== $v) {
        $this->codtippro = $v;
        $this->modifiedColumns[] = OcofeservalPeer::CODTIPPRO;
      }
  
	} 
	
	public function setNivpro($v)
	{

    if ($this->nivpro !== $v) {
        $this->nivpro = $v;
        $this->modifiedColumns[] = OcofeservalPeer::NIVPRO;
      }
  
	} 
	
	public function setExppro($v)
	{

    if ($this->exppro !== $v) {
        $this->exppro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcofeservalPeer::EXPPRO;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcofeservalPeer::CANTIDAD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcofeservalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->numval = $rs->getString($startcol + 1);

      $this->codtipval = $rs->getString($startcol + 2);

      $this->codtippro = $rs->getString($startcol + 3);

      $this->nivpro = $rs->getString($startcol + 4);

      $this->exppro = $rs->getFloat($startcol + 5);

      $this->cantidad = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocofeserval object", $e);
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
			$con = Propel::getConnection(OcofeservalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcofeservalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcofeservalPeer::DATABASE_NAME);
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
					$pk = OcofeservalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcofeservalPeer::doUpdate($this, $con);
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


			if (($retval = OcofeservalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcofeservalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNumval();
				break;
			case 2:
				return $this->getCodtipval();
				break;
			case 3:
				return $this->getCodtippro();
				break;
			case 4:
				return $this->getNivpro();
				break;
			case 5:
				return $this->getExppro();
				break;
			case 6:
				return $this->getCantidad();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcofeservalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNumval(),
			$keys[2] => $this->getCodtipval(),
			$keys[3] => $this->getCodtippro(),
			$keys[4] => $this->getNivpro(),
			$keys[5] => $this->getExppro(),
			$keys[6] => $this->getCantidad(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcofeservalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNumval($value);
				break;
			case 2:
				$this->setCodtipval($value);
				break;
			case 3:
				$this->setCodtippro($value);
				break;
			case 4:
				$this->setNivpro($value);
				break;
			case 5:
				$this->setExppro($value);
				break;
			case 6:
				$this->setCantidad($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcofeservalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumval($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtipval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtippro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNivpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setExppro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcofeservalPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcofeservalPeer::CODCON)) $criteria->add(OcofeservalPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcofeservalPeer::NUMVAL)) $criteria->add(OcofeservalPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(OcofeservalPeer::CODTIPVAL)) $criteria->add(OcofeservalPeer::CODTIPVAL, $this->codtipval);
		if ($this->isColumnModified(OcofeservalPeer::CODTIPPRO)) $criteria->add(OcofeservalPeer::CODTIPPRO, $this->codtippro);
		if ($this->isColumnModified(OcofeservalPeer::NIVPRO)) $criteria->add(OcofeservalPeer::NIVPRO, $this->nivpro);
		if ($this->isColumnModified(OcofeservalPeer::EXPPRO)) $criteria->add(OcofeservalPeer::EXPPRO, $this->exppro);
		if ($this->isColumnModified(OcofeservalPeer::CANTIDAD)) $criteria->add(OcofeservalPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(OcofeservalPeer::ID)) $criteria->add(OcofeservalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcofeservalPeer::DATABASE_NAME);

		$criteria->add(OcofeservalPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumval($this->numval);

		$copyObj->setCodtipval($this->codtipval);

		$copyObj->setCodtippro($this->codtippro);

		$copyObj->setNivpro($this->nivpro);

		$copyObj->setExppro($this->exppro);

		$copyObj->setCantidad($this->cantidad);


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
			self::$peer = new OcofeservalPeer();
		}
		return self::$peer;
	}

} 