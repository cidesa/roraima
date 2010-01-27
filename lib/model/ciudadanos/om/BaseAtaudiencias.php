<?php


abstract class BaseAtaudiencias extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atciudadano_id;


	
	protected $motaud;


	
	protected $atunidades_id;


	
	protected $persona;


	
	protected $status;


	
	protected $fecha;


	
	protected $fechar;


	
	protected $fechaa;


	
	protected $lugar;


	
	protected $observacion;


	
	protected $id;

	
	protected $aAtciudadano;

	
	protected $aAtunidades;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtciudadanoId()
  {

    return $this->atciudadano_id;

  }
  
  public function getMotaud()
  {

    return trim($this->motaud);

  }
  
  public function getAtunidadesId()
  {

    return $this->atunidades_id;

  }
  
  public function getPersona()
  {

    return trim($this->persona);

  }
  
  public function getStatus()
  {

    return trim($this->status);

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

  
  public function getFechar($format = 'Y-m-d')
  {

    if ($this->fechar === null || $this->fechar === '') {
      return null;
    } elseif (!is_int($this->fechar)) {
            $ts = adodb_strtotime($this->fechar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechar] as date/time value: " . var_export($this->fechar, true));
      }
    } else {
      $ts = $this->fechar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechaa($format = 'Y-m-d')
  {

    if ($this->fechaa === null || $this->fechaa === '') {
      return null;
    } elseif (!is_int($this->fechaa)) {
            $ts = adodb_strtotime($this->fechaa);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechaa] as date/time value: " . var_export($this->fechaa, true));
      }
    } else {
      $ts = $this->fechaa;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getLugar()
  {

    return trim($this->lugar);

  }
  
  public function getObservacion()
  {

    return trim($this->observacion);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtciudadanoId($v)
	{

    if ($this->atciudadano_id !== $v) {
        $this->atciudadano_id = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::ATCIUDADANO_ID;
      }
  
		if ($this->aAtciudadano !== null && $this->aAtciudadano->getId() !== $v) {
			$this->aAtciudadano = null;
		}

	} 
	
	public function setMotaud($v)
	{

    if ($this->motaud !== $v) {
        $this->motaud = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::MOTAUD;
      }
  
	} 
	
	public function setAtunidadesId($v)
	{

    if ($this->atunidades_id !== $v) {
        $this->atunidades_id = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::ATUNIDADES_ID;
      }
  
		if ($this->aAtunidades !== null && $this->aAtunidades->getId() !== $v) {
			$this->aAtunidades = null;
		}

	} 
	
	public function setPersona($v)
	{

    if ($this->persona !== $v) {
        $this->persona = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::PERSONA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::STATUS;
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
      $this->modifiedColumns[] = AtaudienciasPeer::FECHA;
    }

	} 
	
	public function setFechar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechar !== $ts) {
      $this->fechar = $ts;
      $this->modifiedColumns[] = AtaudienciasPeer::FECHAR;
    }

	} 
	
	public function setFechaa($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechaa] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechaa !== $ts) {
      $this->fechaa = $ts;
      $this->modifiedColumns[] = AtaudienciasPeer::FECHAA;
    }

	} 
	
	public function setLugar($v)
	{

    if ($this->lugar !== $v) {
        $this->lugar = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::LUGAR;
      }
  
	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::OBSERVACION;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtaudienciasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atciudadano_id = $rs->getInt($startcol + 0);

      $this->motaud = $rs->getString($startcol + 1);

      $this->atunidades_id = $rs->getInt($startcol + 2);

      $this->persona = $rs->getString($startcol + 3);

      $this->status = $rs->getString($startcol + 4);

      $this->fecha = $rs->getDate($startcol + 5, null);

      $this->fechar = $rs->getDate($startcol + 6, null);

      $this->fechaa = $rs->getDate($startcol + 7, null);

      $this->lugar = $rs->getString($startcol + 8);

      $this->observacion = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ataudiencias object", $e);
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
			$con = Propel::getConnection(AtaudienciasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtaudienciasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtaudienciasPeer::DATABASE_NAME);
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


												
			if ($this->aAtciudadano !== null) {
				if ($this->aAtciudadano->isModified()) {
					$affectedRows += $this->aAtciudadano->save($con);
				}
				$this->setAtciudadano($this->aAtciudadano);
			}

			if ($this->aAtunidades !== null) {
				if ($this->aAtunidades->isModified()) {
					$affectedRows += $this->aAtunidades->save($con);
				}
				$this->setAtunidades($this->aAtunidades);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtaudienciasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtaudienciasPeer::doUpdate($this, $con);
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


												
			if ($this->aAtciudadano !== null) {
				if (!$this->aAtciudadano->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadano->getValidationFailures());
				}
			}

			if ($this->aAtunidades !== null) {
				if (!$this->aAtunidades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtunidades->getValidationFailures());
				}
			}


			if (($retval = AtaudienciasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtaudienciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtciudadanoId();
				break;
			case 1:
				return $this->getMotaud();
				break;
			case 2:
				return $this->getAtunidadesId();
				break;
			case 3:
				return $this->getPersona();
				break;
			case 4:
				return $this->getStatus();
				break;
			case 5:
				return $this->getFecha();
				break;
			case 6:
				return $this->getFechar();
				break;
			case 7:
				return $this->getFechaa();
				break;
			case 8:
				return $this->getLugar();
				break;
			case 9:
				return $this->getObservacion();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtaudienciasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtciudadanoId(),
			$keys[1] => $this->getMotaud(),
			$keys[2] => $this->getAtunidadesId(),
			$keys[3] => $this->getPersona(),
			$keys[4] => $this->getStatus(),
			$keys[5] => $this->getFecha(),
			$keys[6] => $this->getFechar(),
			$keys[7] => $this->getFechaa(),
			$keys[8] => $this->getLugar(),
			$keys[9] => $this->getObservacion(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtaudienciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtciudadanoId($value);
				break;
			case 1:
				$this->setMotaud($value);
				break;
			case 2:
				$this->setAtunidadesId($value);
				break;
			case 3:
				$this->setPersona($value);
				break;
			case 4:
				$this->setStatus($value);
				break;
			case 5:
				$this->setFecha($value);
				break;
			case 6:
				$this->setFechar($value);
				break;
			case 7:
				$this->setFechaa($value);
				break;
			case 8:
				$this->setLugar($value);
				break;
			case 9:
				$this->setObservacion($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtaudienciasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtciudadanoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMotaud($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAtunidadesId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPersona($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecha($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFechaa($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLugar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObservacion($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtaudienciasPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtaudienciasPeer::ATCIUDADANO_ID)) $criteria->add(AtaudienciasPeer::ATCIUDADANO_ID, $this->atciudadano_id);
		if ($this->isColumnModified(AtaudienciasPeer::MOTAUD)) $criteria->add(AtaudienciasPeer::MOTAUD, $this->motaud);
		if ($this->isColumnModified(AtaudienciasPeer::ATUNIDADES_ID)) $criteria->add(AtaudienciasPeer::ATUNIDADES_ID, $this->atunidades_id);
		if ($this->isColumnModified(AtaudienciasPeer::PERSONA)) $criteria->add(AtaudienciasPeer::PERSONA, $this->persona);
		if ($this->isColumnModified(AtaudienciasPeer::STATUS)) $criteria->add(AtaudienciasPeer::STATUS, $this->status);
		if ($this->isColumnModified(AtaudienciasPeer::FECHA)) $criteria->add(AtaudienciasPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(AtaudienciasPeer::FECHAR)) $criteria->add(AtaudienciasPeer::FECHAR, $this->fechar);
		if ($this->isColumnModified(AtaudienciasPeer::FECHAA)) $criteria->add(AtaudienciasPeer::FECHAA, $this->fechaa);
		if ($this->isColumnModified(AtaudienciasPeer::LUGAR)) $criteria->add(AtaudienciasPeer::LUGAR, $this->lugar);
		if ($this->isColumnModified(AtaudienciasPeer::OBSERVACION)) $criteria->add(AtaudienciasPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(AtaudienciasPeer::ID)) $criteria->add(AtaudienciasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtaudienciasPeer::DATABASE_NAME);

		$criteria->add(AtaudienciasPeer::ID, $this->id);

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

		$copyObj->setAtciudadanoId($this->atciudadano_id);

		$copyObj->setMotaud($this->motaud);

		$copyObj->setAtunidadesId($this->atunidades_id);

		$copyObj->setPersona($this->persona);

		$copyObj->setStatus($this->status);

		$copyObj->setFecha($this->fecha);

		$copyObj->setFechar($this->fechar);

		$copyObj->setFechaa($this->fechaa);

		$copyObj->setLugar($this->lugar);

		$copyObj->setObservacion($this->observacion);


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
			self::$peer = new AtaudienciasPeer();
		}
		return self::$peer;
	}

	
	public function setAtciudadano($v)
	{


		if ($v === null) {
			$this->setAtciudadanoId(NULL);
		} else {
			$this->setAtciudadanoId($v->getId());
		}


		$this->aAtciudadano = $v;
	}


	
	public function getAtciudadano($con = null)
	{
		if ($this->aAtciudadano === null && ($this->atciudadano_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';

      $c = new Criteria();
      $c->add(AtciudadanoPeer::ID,$this->atciudadano_id);
      
			$this->aAtciudadano = AtciudadanoPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtciudadano;
	}

	
	public function setAtunidades($v)
	{


		if ($v === null) {
			$this->setAtunidadesId(NULL);
		} else {
			$this->setAtunidadesId($v->getId());
		}


		$this->aAtunidades = $v;
	}


	
	public function getAtunidades($con = null)
	{
		if ($this->aAtunidades === null && ($this->atunidades_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtunidadesPeer.php';

      $c = new Criteria();
      $c->add(AtunidadesPeer::ID,$this->atunidades_id);
      
			$this->aAtunidades = AtunidadesPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtunidades;
	}

} 