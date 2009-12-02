<?php


abstract class BaseAtdetest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $atestayu_desde;


	
	protected $atestayu_hasta;


	
	protected $usuario;


	
	protected $created_at;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $aAtestayuRelatedByAtestayuDesde;

	
	protected $aAtestayuRelatedByAtestayuHasta;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getAtestayuDesde()
  {

    return $this->atestayu_desde;

  }
  
  public function getAtestayuHasta()
  {

    return $this->atestayu_hasta;

  }
  
  public function getUsuario()
  {

    return trim($this->usuario);

  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtdetestPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setAtestayuDesde($v)
	{

    if ($this->atestayu_desde !== $v) {
        $this->atestayu_desde = $v;
        $this->modifiedColumns[] = AtdetestPeer::ATESTAYU_DESDE;
      }
  
		if ($this->aAtestayuRelatedByAtestayuDesde !== null && $this->aAtestayuRelatedByAtestayuDesde->getId() !== $v) {
			$this->aAtestayuRelatedByAtestayuDesde = null;
		}

	} 
	
	public function setAtestayuHasta($v)
	{

    if ($this->atestayu_hasta !== $v) {
        $this->atestayu_hasta = $v;
        $this->modifiedColumns[] = AtdetestPeer::ATESTAYU_HASTA;
      }
  
		if ($this->aAtestayuRelatedByAtestayuHasta !== null && $this->aAtestayuRelatedByAtestayuHasta->getId() !== $v) {
			$this->aAtestayuRelatedByAtestayuHasta = null;
		}

	} 
	
	public function setUsuario($v)
	{

    if ($this->usuario !== $v) {
        $this->usuario = $v;
        $this->modifiedColumns[] = AtdetestPeer::USUARIO;
      }
  
	} 
	
	public function setCreatedAt($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = AtdetestPeer::CREATED_AT;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdetestPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->atestayu_desde = $rs->getInt($startcol + 1);

      $this->atestayu_hasta = $rs->getInt($startcol + 2);

      $this->usuario = $rs->getString($startcol + 3);

      $this->created_at = $rs->getTimestamp($startcol + 4, null);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdetest object", $e);
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
			$con = Propel::getConnection(AtdetestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdetestPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AtdetestPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AtdetestPeer::DATABASE_NAME);
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


												
			if ($this->aAtayudas !== null) {
				if ($this->aAtayudas->isModified()) {
					$affectedRows += $this->aAtayudas->save($con);
				}
				$this->setAtayudas($this->aAtayudas);
			}

			if ($this->aAtestayuRelatedByAtestayuDesde !== null) {
				if ($this->aAtestayuRelatedByAtestayuDesde->isModified()) {
					$affectedRows += $this->aAtestayuRelatedByAtestayuDesde->save($con);
				}
				$this->setAtestayuRelatedByAtestayuDesde($this->aAtestayuRelatedByAtestayuDesde);
			}

			if ($this->aAtestayuRelatedByAtestayuHasta !== null) {
				if ($this->aAtestayuRelatedByAtestayuHasta->isModified()) {
					$affectedRows += $this->aAtestayuRelatedByAtestayuHasta->save($con);
				}
				$this->setAtestayuRelatedByAtestayuHasta($this->aAtestayuRelatedByAtestayuHasta);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtdetestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdetestPeer::doUpdate($this, $con);
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


												
			if ($this->aAtayudas !== null) {
				if (!$this->aAtayudas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtayudas->getValidationFailures());
				}
			}

			if ($this->aAtestayuRelatedByAtestayuDesde !== null) {
				if (!$this->aAtestayuRelatedByAtestayuDesde->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtestayuRelatedByAtestayuDesde->getValidationFailures());
				}
			}

			if ($this->aAtestayuRelatedByAtestayuHasta !== null) {
				if (!$this->aAtestayuRelatedByAtestayuHasta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtestayuRelatedByAtestayuHasta->getValidationFailures());
				}
			}


			if (($retval = AtdetestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdetestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getAtestayuDesde();
				break;
			case 2:
				return $this->getAtestayuHasta();
				break;
			case 3:
				return $this->getUsuario();
				break;
			case 4:
				return $this->getCreatedAt();
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
		$keys = AtdetestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getAtestayuDesde(),
			$keys[2] => $this->getAtestayuHasta(),
			$keys[3] => $this->getUsuario(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdetestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setAtestayuDesde($value);
				break;
			case 2:
				$this->setAtestayuHasta($value);
				break;
			case 3:
				$this->setUsuario($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdetestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtestayuDesde($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAtestayuHasta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUsuario($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdetestPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdetestPeer::ATAYUDAS_ID)) $criteria->add(AtdetestPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtdetestPeer::ATESTAYU_DESDE)) $criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->atestayu_desde);
		if ($this->isColumnModified(AtdetestPeer::ATESTAYU_HASTA)) $criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->atestayu_hasta);
		if ($this->isColumnModified(AtdetestPeer::USUARIO)) $criteria->add(AtdetestPeer::USUARIO, $this->usuario);
		if ($this->isColumnModified(AtdetestPeer::CREATED_AT)) $criteria->add(AtdetestPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AtdetestPeer::ID)) $criteria->add(AtdetestPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdetestPeer::DATABASE_NAME);

		$criteria->add(AtdetestPeer::ID, $this->id);

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

		$copyObj->setAtayudasId($this->atayudas_id);

		$copyObj->setAtestayuDesde($this->atestayu_desde);

		$copyObj->setAtestayuHasta($this->atestayu_hasta);

		$copyObj->setUsuario($this->usuario);

		$copyObj->setCreatedAt($this->created_at);


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
			self::$peer = new AtdetestPeer();
		}
		return self::$peer;
	}

	
	public function setAtayudas($v)
	{


		if ($v === null) {
			$this->setAtayudasId(NULL);
		} else {
			$this->setAtayudasId($v->getId());
		}


		$this->aAtayudas = $v;
	}


	
	public function getAtayudas($con = null)
	{
		if ($this->aAtayudas === null && ($this->atayudas_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';

      $c = new Criteria();
      $c->add(AtayudasPeer::ID,$this->atayudas_id);
      
			$this->aAtayudas = AtayudasPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtayudas;
	}

	
	public function setAtestayuRelatedByAtestayuDesde($v)
	{


		if ($v === null) {
			$this->setAtestayuDesde(NULL);
		} else {
			$this->setAtestayuDesde($v->getId());
		}


		$this->aAtestayuRelatedByAtestayuDesde = $v;
	}


	
	public function getAtestayuRelatedByAtestayuDesde($con = null)
	{
		if ($this->aAtestayuRelatedByAtestayuDesde === null && ($this->atestayu_desde !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtestayuPeer.php';

      $c = new Criteria();
      $c->add(AtestayuPeer::ID,$this->atestayu_desde);
      
			$this->aAtestayuRelatedByAtestayuDesde = AtestayuPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtestayuRelatedByAtestayuDesde;
	}

	
	public function setAtestayuRelatedByAtestayuHasta($v)
	{


		if ($v === null) {
			$this->setAtestayuHasta(NULL);
		} else {
			$this->setAtestayuHasta($v->getId());
		}


		$this->aAtestayuRelatedByAtestayuHasta = $v;
	}


	
	public function getAtestayuRelatedByAtestayuHasta($con = null)
	{
		if ($this->aAtestayuRelatedByAtestayuHasta === null && ($this->atestayu_hasta !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtestayuPeer.php';

      $c = new Criteria();
      $c->add(AtestayuPeer::ID,$this->atestayu_hasta);
      
			$this->aAtestayuRelatedByAtestayuHasta = AtestayuPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtestayuRelatedByAtestayuHasta;
	}

} 