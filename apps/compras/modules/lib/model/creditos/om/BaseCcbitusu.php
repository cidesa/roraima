<?php


abstract class BaseCcbitusu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $usuario;


	
	protected $forma;


	
	protected $fecha;


	
	protected $registro;


	
	protected $accion;


	
	protected $hora;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getUsuario()
  {

    return trim($this->usuario);

  }
  
  public function getForma()
  {

    return trim($this->forma);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRegistro()
  {

    return $this->registro;

  }
  
  public function getAccion()
  {

    return trim($this->accion);

  }
  
  public function getHora($format = 'H:i:s')
  {

    if ($this->hora === null || $this->hora === '') {
      return null;
    } elseif (!is_int($this->hora)) {
            $ts = adodb_strtotime($this->hora);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [hora] as date/time value: " . var_export($this->hora, true));
      }
    } else {
      $ts = $this->hora;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbitusuPeer::ID;
      }
  
	} 
	
	public function setUsuario($v)
	{

    if ($this->usuario !== $v) {
        $this->usuario = $v;
        $this->modifiedColumns[] = CcbitusuPeer::USUARIO;
      }
  
	} 
	
	public function setForma($v)
	{

    if ($this->forma !== $v) {
        $this->forma = $v;
        $this->modifiedColumns[] = CcbitusuPeer::FORMA;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = CcbitusuPeer::FECHA;
    }

	} 
	
	public function setRegistro($v)
	{

    if ($this->registro !== $v) {
        $this->registro = $v;
        $this->modifiedColumns[] = CcbitusuPeer::REGISTRO;
      }
  
	} 
	
	public function setAccion($v)
	{

    if ($this->accion !== $v) {
        $this->accion = $v;
        $this->modifiedColumns[] = CcbitusuPeer::ACCION;
      }
  
	} 
	
	public function setHora($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [hora] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->hora !== $ts) {
      $this->hora = $ts;
      $this->modifiedColumns[] = CcbitusuPeer::HORA;
    }

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->usuario = $rs->getString($startcol + 1);

      $this->forma = $rs->getString($startcol + 2);

      $this->fecha = $rs->getDate($startcol + 3, null);

      $this->registro = $rs->getInt($startcol + 4);

      $this->accion = $rs->getString($startcol + 5);

      $this->hora = $rs->getTime($startcol + 6, null);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbitusu object", $e);
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
			$con = Propel::getConnection(CcbitusuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbitusuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbitusuPeer::DATABASE_NAME);
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
					$pk = CcbitusuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbitusuPeer::doUpdate($this, $con);
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


			if (($retval = CcbitusuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbitusuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsuario();
				break;
			case 2:
				return $this->getForma();
				break;
			case 3:
				return $this->getFecha();
				break;
			case 4:
				return $this->getRegistro();
				break;
			case 5:
				return $this->getAccion();
				break;
			case 6:
				return $this->getHora();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbitusuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsuario(),
			$keys[2] => $this->getForma(),
			$keys[3] => $this->getFecha(),
			$keys[4] => $this->getRegistro(),
			$keys[5] => $this->getAccion(),
			$keys[6] => $this->getHora(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbitusuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsuario($value);
				break;
			case 2:
				$this->setForma($value);
				break;
			case 3:
				$this->setFecha($value);
				break;
			case 4:
				$this->setRegistro($value);
				break;
			case 5:
				$this->setAccion($value);
				break;
			case 6:
				$this->setHora($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbitusuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsuario($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setForma($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecha($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRegistro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAccion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHora($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbitusuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbitusuPeer::ID)) $criteria->add(CcbitusuPeer::ID, $this->id);
		if ($this->isColumnModified(CcbitusuPeer::USUARIO)) $criteria->add(CcbitusuPeer::USUARIO, $this->usuario);
		if ($this->isColumnModified(CcbitusuPeer::FORMA)) $criteria->add(CcbitusuPeer::FORMA, $this->forma);
		if ($this->isColumnModified(CcbitusuPeer::FECHA)) $criteria->add(CcbitusuPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CcbitusuPeer::REGISTRO)) $criteria->add(CcbitusuPeer::REGISTRO, $this->registro);
		if ($this->isColumnModified(CcbitusuPeer::ACCION)) $criteria->add(CcbitusuPeer::ACCION, $this->accion);
		if ($this->isColumnModified(CcbitusuPeer::HORA)) $criteria->add(CcbitusuPeer::HORA, $this->hora);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbitusuPeer::DATABASE_NAME);

		$criteria->add(CcbitusuPeer::ID, $this->id);

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

		$copyObj->setUsuario($this->usuario);

		$copyObj->setForma($this->forma);

		$copyObj->setFecha($this->fecha);

		$copyObj->setRegistro($this->registro);

		$copyObj->setAccion($this->accion);

		$copyObj->setHora($this->hora);


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
			self::$peer = new CcbitusuPeer();
		}
		return self::$peer;
	}

} 