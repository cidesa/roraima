<?php


abstract class BaseCcempresa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $direccion;


	
	protected $telefono;


	
	protected $fax;


	
	protected $rif;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNombre()
  {

    return trim($this->nombre);

  }
  
  public function getDireccion()
  {

    return trim($this->direccion);

  }
  
  public function getTelefono()
  {

    return trim($this->telefono);

  }
  
  public function getFax()
  {

    return trim($this->fax);

  }
  
  public function getRif()
  {

    return trim($this->rif);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcempresaPeer::ID;
      }
  
	} 
	
	public function setNombre($v)
	{

    if ($this->nombre !== $v) {
        $this->nombre = $v;
        $this->modifiedColumns[] = CcempresaPeer::NOMBRE;
      }
  
	} 
	
	public function setDireccion($v)
	{

    if ($this->direccion !== $v) {
        $this->direccion = $v;
        $this->modifiedColumns[] = CcempresaPeer::DIRECCION;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = CcempresaPeer::TELEFONO;
      }
  
	} 
	
	public function setFax($v)
	{

    if ($this->fax !== $v) {
        $this->fax = $v;
        $this->modifiedColumns[] = CcempresaPeer::FAX;
      }
  
	} 
	
	public function setRif($v)
	{

    if ($this->rif !== $v) {
        $this->rif = $v;
        $this->modifiedColumns[] = CcempresaPeer::RIF;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nombre = $rs->getString($startcol + 1);

      $this->direccion = $rs->getString($startcol + 2);

      $this->telefono = $rs->getString($startcol + 3);

      $this->fax = $rs->getString($startcol + 4);

      $this->rif = $rs->getString($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccempresa object", $e);
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
			$con = Propel::getConnection(CcempresaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcempresaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcempresaPeer::DATABASE_NAME);
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
					$pk = CcempresaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcempresaPeer::doUpdate($this, $con);
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


			if (($retval = CcempresaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcempresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombre();
				break;
			case 2:
				return $this->getDireccion();
				break;
			case 3:
				return $this->getTelefono();
				break;
			case 4:
				return $this->getFax();
				break;
			case 5:
				return $this->getRif();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcempresaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDireccion(),
			$keys[3] => $this->getTelefono(),
			$keys[4] => $this->getFax(),
			$keys[5] => $this->getRif(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcempresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
			case 2:
				$this->setDireccion($value);
				break;
			case 3:
				$this->setTelefono($value);
				break;
			case 4:
				$this->setFax($value);
				break;
			case 5:
				$this->setRif($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcempresaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDireccion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelefono($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFax($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRif($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcempresaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcempresaPeer::ID)) $criteria->add(CcempresaPeer::ID, $this->id);
		if ($this->isColumnModified(CcempresaPeer::NOMBRE)) $criteria->add(CcempresaPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CcempresaPeer::DIRECCION)) $criteria->add(CcempresaPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(CcempresaPeer::TELEFONO)) $criteria->add(CcempresaPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(CcempresaPeer::FAX)) $criteria->add(CcempresaPeer::FAX, $this->fax);
		if ($this->isColumnModified(CcempresaPeer::RIF)) $criteria->add(CcempresaPeer::RIF, $this->rif);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcempresaPeer::DATABASE_NAME);

		$criteria->add(CcempresaPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFax($this->fax);

		$copyObj->setRif($this->rif);


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
			self::$peer = new CcempresaPeer();
		}
		return self::$peer;
	}

} 