<?php


abstract class BaseAtdenuncias extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atsolici;


	
	protected $desden;


	
	protected $telefono;


	
	protected $atunidades_id;


	
	protected $persona;


	
	protected $status;


	
	protected $respuesta;


	
	protected $fechaa;


	
	protected $fechar;


	
	protected $id;

	
	protected $aAtunidades;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtsolici()
  {

    return trim($this->atsolici);

  }
  
  public function getDesden()
  {

    return trim($this->desden);

  }
  
  public function getTelefono()
  {

    return trim($this->telefono);

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
  
  public function getRespuesta()
  {

    return trim($this->respuesta);

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

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtsolici($v)
	{

    if ($this->atsolici !== $v) {
        $this->atsolici = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATSOLICI;
      }
  
	} 
	
	public function setDesden($v)
	{

    if ($this->desden !== $v) {
        $this->desden = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::DESDEN;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::TELEFONO;
      }
  
	} 
	
	public function setAtunidadesId($v)
	{

    if ($this->atunidades_id !== $v) {
        $this->atunidades_id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATUNIDADES_ID;
      }
  
		if ($this->aAtunidades !== null && $this->aAtunidades->getId() !== $v) {
			$this->aAtunidades = null;
		}

	} 
	
	public function setPersona($v)
	{

    if ($this->persona !== $v) {
        $this->persona = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::PERSONA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::STATUS;
      }
  
	} 
	
	public function setRespuesta($v)
	{

    if ($this->respuesta !== $v) {
        $this->respuesta = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::RESPUESTA;
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
      $this->modifiedColumns[] = AtdenunciasPeer::FECHAA;
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
      $this->modifiedColumns[] = AtdenunciasPeer::FECHAR;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atsolici = $rs->getString($startcol + 0);

      $this->desden = $rs->getString($startcol + 1);

      $this->telefono = $rs->getString($startcol + 2);

      $this->atunidades_id = $rs->getInt($startcol + 3);

      $this->persona = $rs->getString($startcol + 4);

      $this->status = $rs->getString($startcol + 5);

      $this->respuesta = $rs->getString($startcol + 6);

      $this->fechaa = $rs->getDate($startcol + 7, null);

      $this->fechar = $rs->getDate($startcol + 8, null);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdenuncias object", $e);
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
			$con = Propel::getConnection(AtdenunciasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdenunciasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdenunciasPeer::DATABASE_NAME);
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


												
			if ($this->aAtunidades !== null) {
				if ($this->aAtunidades->isModified()) {
					$affectedRows += $this->aAtunidades->save($con);
				}
				$this->setAtunidades($this->aAtunidades);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtdenunciasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdenunciasPeer::doUpdate($this, $con);
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


												
			if ($this->aAtunidades !== null) {
				if (!$this->aAtunidades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtunidades->getValidationFailures());
				}
			}


			if (($retval = AtdenunciasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdenunciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtsolici();
				break;
			case 1:
				return $this->getDesden();
				break;
			case 2:
				return $this->getTelefono();
				break;
			case 3:
				return $this->getAtunidadesId();
				break;
			case 4:
				return $this->getPersona();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getRespuesta();
				break;
			case 7:
				return $this->getFechaa();
				break;
			case 8:
				return $this->getFechar();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdenunciasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtsolici(),
			$keys[1] => $this->getDesden(),
			$keys[2] => $this->getTelefono(),
			$keys[3] => $this->getAtunidadesId(),
			$keys[4] => $this->getPersona(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getRespuesta(),
			$keys[7] => $this->getFechaa(),
			$keys[8] => $this->getFechar(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdenunciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtsolici($value);
				break;
			case 1:
				$this->setDesden($value);
				break;
			case 2:
				$this->setTelefono($value);
				break;
			case 3:
				$this->setAtunidadesId($value);
				break;
			case 4:
				$this->setPersona($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setRespuesta($value);
				break;
			case 7:
				$this->setFechaa($value);
				break;
			case 8:
				$this->setFechar($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdenunciasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtsolici($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesden($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelefono($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAtunidadesId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPersona($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRespuesta($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFechaa($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFechar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdenunciasPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdenunciasPeer::ATSOLICI)) $criteria->add(AtdenunciasPeer::ATSOLICI, $this->atsolici);
		if ($this->isColumnModified(AtdenunciasPeer::DESDEN)) $criteria->add(AtdenunciasPeer::DESDEN, $this->desden);
		if ($this->isColumnModified(AtdenunciasPeer::TELEFONO)) $criteria->add(AtdenunciasPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(AtdenunciasPeer::ATUNIDADES_ID)) $criteria->add(AtdenunciasPeer::ATUNIDADES_ID, $this->atunidades_id);
		if ($this->isColumnModified(AtdenunciasPeer::PERSONA)) $criteria->add(AtdenunciasPeer::PERSONA, $this->persona);
		if ($this->isColumnModified(AtdenunciasPeer::STATUS)) $criteria->add(AtdenunciasPeer::STATUS, $this->status);
		if ($this->isColumnModified(AtdenunciasPeer::RESPUESTA)) $criteria->add(AtdenunciasPeer::RESPUESTA, $this->respuesta);
		if ($this->isColumnModified(AtdenunciasPeer::FECHAA)) $criteria->add(AtdenunciasPeer::FECHAA, $this->fechaa);
		if ($this->isColumnModified(AtdenunciasPeer::FECHAR)) $criteria->add(AtdenunciasPeer::FECHAR, $this->fechar);
		if ($this->isColumnModified(AtdenunciasPeer::ID)) $criteria->add(AtdenunciasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdenunciasPeer::DATABASE_NAME);

		$criteria->add(AtdenunciasPeer::ID, $this->id);

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

		$copyObj->setAtsolici($this->atsolici);

		$copyObj->setDesden($this->desden);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setAtunidadesId($this->atunidades_id);

		$copyObj->setPersona($this->persona);

		$copyObj->setStatus($this->status);

		$copyObj->setRespuesta($this->respuesta);

		$copyObj->setFechaa($this->fechaa);

		$copyObj->setFechar($this->fechar);


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
			self::$peer = new AtdenunciasPeer();
		}
		return self::$peer;
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