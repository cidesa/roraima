<?php


abstract class BaseNpfalperemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecini;


	
	protected $fecret;


	
	protected $horas;


	
	protected $codmot;


	
	protected $observ;


	
	protected $feccon;


	
	protected $ivss;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecret($format = 'Y-m-d')
  {

    if ($this->fecret === null || $this->fecret === '') {
      return null;
    } elseif (!is_int($this->fecret)) {
            $ts = adodb_strtotime($this->fecret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecret] as date/time value: " . var_export($this->fecret, true));
      }
    } else {
      $ts = $this->fecret;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHoras($val=false)
  {

    if($val) return number_format($this->horas,2,',','.');
    else return $this->horas;

  }
  
  public function getCodmot()
  {

    return trim($this->codmot);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getFeccon($format = 'Y-m-d')
  {

    if ($this->feccon === null || $this->feccon === '') {
      return null;
    } elseif (!is_int($this->feccon)) {
            $ts = adodb_strtotime($this->feccon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
      }
    } else {
      $ts = $this->feccon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getIvss()
  {

    return $this->ivss;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpfalperempPeer::CODEMP;
      }
  
	} 
	
	public function setFecini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpfalperempPeer::FECINI;
    }

	} 
	
	public function setFecret($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecret !== $ts) {
      $this->fecret = $ts;
      $this->modifiedColumns[] = NpfalperempPeer::FECRET;
    }

	} 
	
	public function setHoras($v)
	{

    if ($this->horas !== $v) {
        $this->horas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpfalperempPeer::HORAS;
      }
  
	} 
	
	public function setCodmot($v)
	{

    if ($this->codmot !== $v) {
        $this->codmot = $v;
        $this->modifiedColumns[] = NpfalperempPeer::CODMOT;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = NpfalperempPeer::OBSERV;
      }
  
	} 
	
	public function setFeccon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = NpfalperempPeer::FECCON;
    }

	} 
	
	public function setIvss($v)
	{

    if ($this->ivss !== $v) {
        $this->ivss = $v;
        $this->modifiedColumns[] = NpfalperempPeer::IVSS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpfalperempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecini = $rs->getDate($startcol + 1, null);

      $this->fecret = $rs->getDate($startcol + 2, null);

      $this->horas = $rs->getFloat($startcol + 3);

      $this->codmot = $rs->getString($startcol + 4);

      $this->observ = $rs->getString($startcol + 5);

      $this->feccon = $rs->getDate($startcol + 6, null);

      $this->ivss = $rs->getBoolean($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npfalperemp object", $e);
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
			$con = Propel::getConnection(NpfalperempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpfalperempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpfalperempPeer::DATABASE_NAME);
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
					$pk = NpfalperempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpfalperempPeer::doUpdate($this, $con);
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


			if (($retval = NpfalperempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfalperempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecini();
				break;
			case 2:
				return $this->getFecret();
				break;
			case 3:
				return $this->getHoras();
				break;
			case 4:
				return $this->getCodmot();
				break;
			case 5:
				return $this->getObserv();
				break;
			case 6:
				return $this->getFeccon();
				break;
			case 7:
				return $this->getIvss();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpfalperempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecini(),
			$keys[2] => $this->getFecret(),
			$keys[3] => $this->getHoras(),
			$keys[4] => $this->getCodmot(),
			$keys[5] => $this->getObserv(),
			$keys[6] => $this->getFeccon(),
			$keys[7] => $this->getIvss(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfalperempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecini($value);
				break;
			case 2:
				$this->setFecret($value);
				break;
			case 3:
				$this->setHoras($value);
				break;
			case 4:
				$this->setCodmot($value);
				break;
			case 5:
				$this->setObserv($value);
				break;
			case 6:
				$this->setFeccon($value);
				break;
			case 7:
				$this->setIvss($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpfalperempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecret($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoras($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodmot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObserv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIvss($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpfalperempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpfalperempPeer::CODEMP)) $criteria->add(NpfalperempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpfalperempPeer::FECINI)) $criteria->add(NpfalperempPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpfalperempPeer::FECRET)) $criteria->add(NpfalperempPeer::FECRET, $this->fecret);
		if ($this->isColumnModified(NpfalperempPeer::HORAS)) $criteria->add(NpfalperempPeer::HORAS, $this->horas);
		if ($this->isColumnModified(NpfalperempPeer::CODMOT)) $criteria->add(NpfalperempPeer::CODMOT, $this->codmot);
		if ($this->isColumnModified(NpfalperempPeer::OBSERV)) $criteria->add(NpfalperempPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NpfalperempPeer::FECCON)) $criteria->add(NpfalperempPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(NpfalperempPeer::IVSS)) $criteria->add(NpfalperempPeer::IVSS, $this->ivss);
		if ($this->isColumnModified(NpfalperempPeer::ID)) $criteria->add(NpfalperempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpfalperempPeer::DATABASE_NAME);

		$criteria->add(NpfalperempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecret($this->fecret);

		$copyObj->setHoras($this->horas);

		$copyObj->setCodmot($this->codmot);

		$copyObj->setObserv($this->observ);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setIvss($this->ivss);


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
			self::$peer = new NpfalperempPeer();
		}
		return self::$peer;
	}

} 