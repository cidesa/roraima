<?php


abstract class BaseForcfgrepins extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrofor;


	
	protected $descripcion;


	
	protected $tipo;


	
	protected $cuenta;


	
	protected $orden;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNrofor()
  {

    return trim($this->nrofor);

  }
  
  public function getDescripcion()
  {

    return trim($this->descripcion);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getCuenta()
  {

    return trim($this->cuenta);

  }
  
  public function getOrden()
  {

    return $this->orden;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNrofor($v)
	{

    if ($this->nrofor !== $v) {
        $this->nrofor = $v;
        $this->modifiedColumns[] = ForcfgrepinsPeer::NROFOR;
      }
  
	} 
	
	public function setDescripcion($v)
	{

    if ($this->descripcion !== $v) {
        $this->descripcion = $v;
        $this->modifiedColumns[] = ForcfgrepinsPeer::DESCRIPCION;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = ForcfgrepinsPeer::TIPO;
      }
  
	} 
	
	public function setCuenta($v)
	{

    if ($this->cuenta !== $v) {
        $this->cuenta = $v;
        $this->modifiedColumns[] = ForcfgrepinsPeer::CUENTA;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = ForcfgrepinsPeer::ORDEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForcfgrepinsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrofor = $rs->getString($startcol + 0);

      $this->descripcion = $rs->getString($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->cuenta = $rs->getString($startcol + 3);

      $this->orden = $rs->getInt($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forcfgrepins object", $e);
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
			$con = Propel::getConnection(ForcfgrepinsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForcfgrepinsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForcfgrepinsPeer::DATABASE_NAME);
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
					$pk = ForcfgrepinsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForcfgrepinsPeer::doUpdate($this, $con);
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


			if (($retval = ForcfgrepinsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcfgrepinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrofor();
				break;
			case 1:
				return $this->getDescripcion();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getCuenta();
				break;
			case 4:
				return $this->getOrden();
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
		$keys = ForcfgrepinsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrofor(),
			$keys[1] => $this->getDescripcion(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getCuenta(),
			$keys[4] => $this->getOrden(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcfgrepinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrofor($value);
				break;
			case 1:
				$this->setDescripcion($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setCuenta($value);
				break;
			case 4:
				$this->setOrden($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcfgrepinsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrofor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCuenta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrden($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForcfgrepinsPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForcfgrepinsPeer::NROFOR)) $criteria->add(ForcfgrepinsPeer::NROFOR, $this->nrofor);
		if ($this->isColumnModified(ForcfgrepinsPeer::DESCRIPCION)) $criteria->add(ForcfgrepinsPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(ForcfgrepinsPeer::TIPO)) $criteria->add(ForcfgrepinsPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(ForcfgrepinsPeer::CUENTA)) $criteria->add(ForcfgrepinsPeer::CUENTA, $this->cuenta);
		if ($this->isColumnModified(ForcfgrepinsPeer::ORDEN)) $criteria->add(ForcfgrepinsPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(ForcfgrepinsPeer::ID)) $criteria->add(ForcfgrepinsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForcfgrepinsPeer::DATABASE_NAME);

		$criteria->add(ForcfgrepinsPeer::ID, $this->id);

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

		$copyObj->setNrofor($this->nrofor);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setTipo($this->tipo);

		$copyObj->setCuenta($this->cuenta);

		$copyObj->setOrden($this->orden);


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
			self::$peer = new ForcfgrepinsPeer();
		}
		return self::$peer;
	}

} 