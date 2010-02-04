<?php


abstract class BaseNpvacsalidas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecvac;


	
	protected $diasdisfrutar;


	
	protected $observa;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $fecpagbonvac;


	
	protected $fecsalnom;


	
	protected $fecreinom;


	
	protected $sabvac;


	
	protected $domvac;


	
	protected $fervac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecvac($format = 'Y-m-d')
  {

    if ($this->fecvac === null || $this->fecvac === '') {
      return null;
    } elseif (!is_int($this->fecvac)) {
            $ts = adodb_strtotime($this->fecvac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvac] as date/time value: " . var_export($this->fecvac, true));
      }
    } else {
      $ts = $this->fecvac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDiasdisfrutar($val=false)
  {

    if($val) return number_format($this->diasdisfrutar,2,',','.');
    else return $this->diasdisfrutar;

  }
  
  public function getObserva()
  {

    return trim($this->observa);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecpagbonvac($format = 'Y-m-d')
  {

    if ($this->fecpagbonvac === null || $this->fecpagbonvac === '') {
      return null;
    } elseif (!is_int($this->fecpagbonvac)) {
            $ts = adodb_strtotime($this->fecpagbonvac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpagbonvac] as date/time value: " . var_export($this->fecpagbonvac, true));
      }
    } else {
      $ts = $this->fecpagbonvac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecsalnom($format = 'Y-m-d')
  {

    if ($this->fecsalnom === null || $this->fecsalnom === '') {
      return null;
    } elseif (!is_int($this->fecsalnom)) {
            $ts = adodb_strtotime($this->fecsalnom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsalnom] as date/time value: " . var_export($this->fecsalnom, true));
      }
    } else {
      $ts = $this->fecsalnom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecreinom($format = 'Y-m-d')
  {

    if ($this->fecreinom === null || $this->fecreinom === '') {
      return null;
    } elseif (!is_int($this->fecreinom)) {
            $ts = adodb_strtotime($this->fecreinom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreinom] as date/time value: " . var_export($this->fecreinom, true));
      }
    } else {
      $ts = $this->fecreinom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getSabvac()
  {

    return $this->sabvac;

  }
  
  public function getDomvac()
  {

    return $this->domvac;

  }
  
  public function getFervac()
  {

    return $this->fervac;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacsalidasPeer::CODEMP;
      }
  
	} 
	
	public function setFecvac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvac !== $ts) {
      $this->fecvac = $ts;
      $this->modifiedColumns[] = NpvacsalidasPeer::FECVAC;
    }

	} 
	
	public function setDiasdisfrutar($v)
	{

    if ($this->diasdisfrutar !== $v) {
        $this->diasdisfrutar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacsalidasPeer::DIASDISFRUTAR;
      }
  
	} 
	
	public function setObserva($v)
	{

    if ($this->observa !== $v) {
        $this->observa = $v;
        $this->modifiedColumns[] = NpvacsalidasPeer::OBSERVA;
      }
  
	} 
	
	public function setFecdes($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = NpvacsalidasPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = NpvacsalidasPeer::FECHAS;
    }

	} 
	
	public function setFecpagbonvac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpagbonvac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpagbonvac !== $ts) {
      $this->fecpagbonvac = $ts;
      $this->modifiedColumns[] = NpvacsalidasPeer::FECPAGBONVAC;
    }

	} 
	
	public function setFecsalnom($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsalnom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsalnom !== $ts) {
      $this->fecsalnom = $ts;
      $this->modifiedColumns[] = NpvacsalidasPeer::FECSALNOM;
    }

	} 
	
	public function setFecreinom($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreinom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreinom !== $ts) {
      $this->fecreinom = $ts;
      $this->modifiedColumns[] = NpvacsalidasPeer::FECREINOM;
    }

	} 
	
	public function setSabvac($v)
	{

    if ($this->sabvac !== $v) {
        $this->sabvac = $v;
        $this->modifiedColumns[] = NpvacsalidasPeer::SABVAC;
      }
  
	} 
	
	public function setDomvac($v)
	{

    if ($this->domvac !== $v) {
        $this->domvac = $v;
        $this->modifiedColumns[] = NpvacsalidasPeer::DOMVAC;
      }
  
	} 
	
	public function setFervac($v)
	{

    if ($this->fervac !== $v) {
        $this->fervac = $v;
        $this->modifiedColumns[] = NpvacsalidasPeer::FERVAC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacsalidasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecvac = $rs->getDate($startcol + 1, null);

      $this->diasdisfrutar = $rs->getFloat($startcol + 2);

      $this->observa = $rs->getString($startcol + 3);

      $this->fecdes = $rs->getDate($startcol + 4, null);

      $this->fechas = $rs->getDate($startcol + 5, null);

      $this->fecpagbonvac = $rs->getDate($startcol + 6, null);

      $this->fecsalnom = $rs->getDate($startcol + 7, null);

      $this->fecreinom = $rs->getDate($startcol + 8, null);

      $this->sabvac = $rs->getInt($startcol + 9);

      $this->domvac = $rs->getInt($startcol + 10);

      $this->fervac = $rs->getInt($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacsalidas object", $e);
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
			$con = Propel::getConnection(NpvacsalidasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacsalidasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacsalidasPeer::DATABASE_NAME);
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
					$pk = NpvacsalidasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacsalidasPeer::doUpdate($this, $con);
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


			if (($retval = NpvacsalidasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacsalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecvac();
				break;
			case 2:
				return $this->getDiasdisfrutar();
				break;
			case 3:
				return $this->getObserva();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getFechas();
				break;
			case 6:
				return $this->getFecpagbonvac();
				break;
			case 7:
				return $this->getFecsalnom();
				break;
			case 8:
				return $this->getFecreinom();
				break;
			case 9:
				return $this->getSabvac();
				break;
			case 10:
				return $this->getDomvac();
				break;
			case 11:
				return $this->getFervac();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacsalidasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecvac(),
			$keys[2] => $this->getDiasdisfrutar(),
			$keys[3] => $this->getObserva(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getFechas(),
			$keys[6] => $this->getFecpagbonvac(),
			$keys[7] => $this->getFecsalnom(),
			$keys[8] => $this->getFecreinom(),
			$keys[9] => $this->getSabvac(),
			$keys[10] => $this->getDomvac(),
			$keys[11] => $this->getFervac(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacsalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecvac($value);
				break;
			case 2:
				$this->setDiasdisfrutar($value);
				break;
			case 3:
				$this->setObserva($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setFechas($value);
				break;
			case 6:
				$this->setFecpagbonvac($value);
				break;
			case 7:
				$this->setFecsalnom($value);
				break;
			case 8:
				$this->setFecreinom($value);
				break;
			case 9:
				$this->setSabvac($value);
				break;
			case 10:
				$this->setDomvac($value);
				break;
			case 11:
				$this->setFervac($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacsalidasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecvac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiasdisfrutar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObserva($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecpagbonvac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecsalnom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecreinom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSabvac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDomvac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFervac($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacsalidasPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacsalidasPeer::CODEMP)) $criteria->add(NpvacsalidasPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacsalidasPeer::FECVAC)) $criteria->add(NpvacsalidasPeer::FECVAC, $this->fecvac);
		if ($this->isColumnModified(NpvacsalidasPeer::DIASDISFRUTAR)) $criteria->add(NpvacsalidasPeer::DIASDISFRUTAR, $this->diasdisfrutar);
		if ($this->isColumnModified(NpvacsalidasPeer::OBSERVA)) $criteria->add(NpvacsalidasPeer::OBSERVA, $this->observa);
		if ($this->isColumnModified(NpvacsalidasPeer::FECDES)) $criteria->add(NpvacsalidasPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(NpvacsalidasPeer::FECHAS)) $criteria->add(NpvacsalidasPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(NpvacsalidasPeer::FECPAGBONVAC)) $criteria->add(NpvacsalidasPeer::FECPAGBONVAC, $this->fecpagbonvac);
		if ($this->isColumnModified(NpvacsalidasPeer::FECSALNOM)) $criteria->add(NpvacsalidasPeer::FECSALNOM, $this->fecsalnom);
		if ($this->isColumnModified(NpvacsalidasPeer::FECREINOM)) $criteria->add(NpvacsalidasPeer::FECREINOM, $this->fecreinom);
		if ($this->isColumnModified(NpvacsalidasPeer::SABVAC)) $criteria->add(NpvacsalidasPeer::SABVAC, $this->sabvac);
		if ($this->isColumnModified(NpvacsalidasPeer::DOMVAC)) $criteria->add(NpvacsalidasPeer::DOMVAC, $this->domvac);
		if ($this->isColumnModified(NpvacsalidasPeer::FERVAC)) $criteria->add(NpvacsalidasPeer::FERVAC, $this->fervac);
		if ($this->isColumnModified(NpvacsalidasPeer::ID)) $criteria->add(NpvacsalidasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacsalidasPeer::DATABASE_NAME);

		$criteria->add(NpvacsalidasPeer::ID, $this->id);

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

		$copyObj->setFecvac($this->fecvac);

		$copyObj->setDiasdisfrutar($this->diasdisfrutar);

		$copyObj->setObserva($this->observa);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setFecpagbonvac($this->fecpagbonvac);

		$copyObj->setFecsalnom($this->fecsalnom);

		$copyObj->setFecreinom($this->fecreinom);

		$copyObj->setSabvac($this->sabvac);

		$copyObj->setDomvac($this->domvac);

		$copyObj->setFervac($this->fervac);


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
			self::$peer = new NpvacsalidasPeer();
		}
		return self::$peer;
	}

} 