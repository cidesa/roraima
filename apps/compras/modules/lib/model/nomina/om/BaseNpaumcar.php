<?php


abstract class BaseNpaumcar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $cantidad;


	
	protected $porcentaje;


	
	protected $codcar;


	
	protected $suecar;


	
	protected $fecaum;


	
	protected $motaum;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getPorcentaje($val=false)
  {

    if($val) return number_format($this->porcentaje,2,',','.');
    else return $this->porcentaje;

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getSuecar($val=false)
  {

    if($val) return number_format($this->suecar,2,',','.');
    else return $this->suecar;

  }
  
  public function getFecaum($format = 'Y-m-d')
  {

    if ($this->fecaum === null || $this->fecaum === '') {
      return null;
    } elseif (!is_int($this->fecaum)) {
            $ts = adodb_strtotime($this->fecaum);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaum] as date/time value: " . var_export($this->fecaum, true));
      }
    } else {
      $ts = $this->fecaum;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMotaum()
  {

    return trim($this->motaum);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpaumcarPeer::CODNOM;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpaumcarPeer::CANTIDAD;
      }
  
	} 
	
	public function setPorcentaje($v)
	{

    if ($this->porcentaje !== $v) {
        $this->porcentaje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpaumcarPeer::PORCENTAJE;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpaumcarPeer::CODCAR;
      }
  
	} 
	
	public function setSuecar($v)
	{

    if ($this->suecar !== $v) {
        $this->suecar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpaumcarPeer::SUECAR;
      }
  
	} 
	
	public function setFecaum($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaum] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaum !== $ts) {
      $this->fecaum = $ts;
      $this->modifiedColumns[] = NpaumcarPeer::FECAUM;
    }

	} 
	
	public function setMotaum($v)
	{

    if ($this->motaum !== $v) {
        $this->motaum = $v;
        $this->modifiedColumns[] = NpaumcarPeer::MOTAUM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpaumcarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->cantidad = $rs->getFloat($startcol + 1);

      $this->porcentaje = $rs->getFloat($startcol + 2);

      $this->codcar = $rs->getString($startcol + 3);

      $this->suecar = $rs->getFloat($startcol + 4);

      $this->fecaum = $rs->getDate($startcol + 5, null);

      $this->motaum = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npaumcar object", $e);
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
			$con = Propel::getConnection(NpaumcarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpaumcarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpaumcarPeer::DATABASE_NAME);
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
					$pk = NpaumcarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpaumcarPeer::doUpdate($this, $con);
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


			if (($retval = NpaumcarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpaumcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCantidad();
				break;
			case 2:
				return $this->getPorcentaje();
				break;
			case 3:
				return $this->getCodcar();
				break;
			case 4:
				return $this->getSuecar();
				break;
			case 5:
				return $this->getFecaum();
				break;
			case 6:
				return $this->getMotaum();
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
		$keys = NpaumcarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCantidad(),
			$keys[2] => $this->getPorcentaje(),
			$keys[3] => $this->getCodcar(),
			$keys[4] => $this->getSuecar(),
			$keys[5] => $this->getFecaum(),
			$keys[6] => $this->getMotaum(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpaumcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCantidad($value);
				break;
			case 2:
				$this->setPorcentaje($value);
				break;
			case 3:
				$this->setCodcar($value);
				break;
			case 4:
				$this->setSuecar($value);
				break;
			case 5:
				$this->setFecaum($value);
				break;
			case 6:
				$this->setMotaum($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpaumcarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCantidad($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorcentaje($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSuecar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecaum($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMotaum($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpaumcarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpaumcarPeer::CODNOM)) $criteria->add(NpaumcarPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpaumcarPeer::CANTIDAD)) $criteria->add(NpaumcarPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NpaumcarPeer::PORCENTAJE)) $criteria->add(NpaumcarPeer::PORCENTAJE, $this->porcentaje);
		if ($this->isColumnModified(NpaumcarPeer::CODCAR)) $criteria->add(NpaumcarPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpaumcarPeer::SUECAR)) $criteria->add(NpaumcarPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(NpaumcarPeer::FECAUM)) $criteria->add(NpaumcarPeer::FECAUM, $this->fecaum);
		if ($this->isColumnModified(NpaumcarPeer::MOTAUM)) $criteria->add(NpaumcarPeer::MOTAUM, $this->motaum);
		if ($this->isColumnModified(NpaumcarPeer::ID)) $criteria->add(NpaumcarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpaumcarPeer::DATABASE_NAME);

		$criteria->add(NpaumcarPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setPorcentaje($this->porcentaje);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setSuecar($this->suecar);

		$copyObj->setFecaum($this->fecaum);

		$copyObj->setMotaum($this->motaum);


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
			self::$peer = new NpaumcarPeer();
		}
		return self::$peer;
	}

} 