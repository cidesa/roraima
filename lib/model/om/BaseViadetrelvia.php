<?php


abstract class BaseViadetrelvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrel;


	
	protected $fecrel;


	
	protected $codpro;


	
	protected $numfac;


	
	protected $fecfac;


	
	protected $montonet;


	
	protected $montorec;


	
	protected $codcat;


	
	protected $codpar;


	
	protected $refsol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumrel()
  {

    return trim($this->numrel);

  }
  
  public function getFecrel($format = 'Y-m-d')
  {

    if ($this->fecrel === null || $this->fecrel === '') {
      return null;
    } elseif (!is_int($this->fecrel)) {
            $ts = adodb_strtotime($this->fecrel);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrel] as date/time value: " . var_export($this->fecrel, true));
      }
    } else {
      $ts = $this->fecrel;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getFecfac($format = 'Y-m-d')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMontonet($val=false)
  {

    if($val) return number_format($this->montonet,2,',','.');
    else return $this->montonet;

  }
  
  public function getMontorec($val=false)
  {

    if($val) return number_format($this->montorec,2,',','.');
    else return $this->montorec;

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getRefsol()
  {

    return trim($this->refsol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumrel($v)
	{

    if ($this->numrel !== $v) {
        $this->numrel = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::NUMREL;
      }
  
	} 
	
	public function setFecrel($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrel] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrel !== $ts) {
      $this->fecrel = $ts;
      $this->modifiedColumns[] = ViadetrelviaPeer::FECREL;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::CODPRO;
      }
  
	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::NUMFAC;
      }
  
	} 
	
	public function setFecfac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = ViadetrelviaPeer::FECFAC;
    }

	} 
	
	public function setMontonet($v)
	{

    if ($this->montonet !== $v) {
        $this->montonet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadetrelviaPeer::MONTONET;
      }
  
	} 
	
	public function setMontorec($v)
	{

    if ($this->montorec !== $v) {
        $this->montorec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadetrelviaPeer::MONTOREC;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::CODCAT;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::CODPAR;
      }
  
	} 
	
	public function setRefsol($v)
	{

    if ($this->refsol !== $v) {
        $this->refsol = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::REFSOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadetrelviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numrel = $rs->getString($startcol + 0);

      $this->fecrel = $rs->getDate($startcol + 1, null);

      $this->codpro = $rs->getString($startcol + 2);

      $this->numfac = $rs->getString($startcol + 3);

      $this->fecfac = $rs->getDate($startcol + 4, null);

      $this->montonet = $rs->getFloat($startcol + 5);

      $this->montorec = $rs->getFloat($startcol + 6);

      $this->codcat = $rs->getString($startcol + 7);

      $this->codpar = $rs->getString($startcol + 8);

      $this->refsol = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadetrelvia object", $e);
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
			$con = Propel::getConnection(ViadetrelviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadetrelviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadetrelviaPeer::DATABASE_NAME);
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
					$pk = ViadetrelviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadetrelviaPeer::doUpdate($this, $con);
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


			if (($retval = ViadetrelviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadetrelviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrel();
				break;
			case 1:
				return $this->getFecrel();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getNumfac();
				break;
			case 4:
				return $this->getFecfac();
				break;
			case 5:
				return $this->getMontonet();
				break;
			case 6:
				return $this->getMontorec();
				break;
			case 7:
				return $this->getCodcat();
				break;
			case 8:
				return $this->getCodpar();
				break;
			case 9:
				return $this->getRefsol();
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
		$keys = ViadetrelviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrel(),
			$keys[1] => $this->getFecrel(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getNumfac(),
			$keys[4] => $this->getFecfac(),
			$keys[5] => $this->getMontonet(),
			$keys[6] => $this->getMontorec(),
			$keys[7] => $this->getCodcat(),
			$keys[8] => $this->getCodpar(),
			$keys[9] => $this->getRefsol(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadetrelviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrel($value);
				break;
			case 1:
				$this->setFecrel($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setNumfac($value);
				break;
			case 4:
				$this->setFecfac($value);
				break;
			case 5:
				$this->setMontonet($value);
				break;
			case 6:
				$this->setMontorec($value);
				break;
			case 7:
				$this->setCodcat($value);
				break;
			case 8:
				$this->setCodpar($value);
				break;
			case 9:
				$this->setRefsol($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadetrelviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrel($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecrel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumfac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecfac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontonet($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMontorec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodcat($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRefsol($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadetrelviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadetrelviaPeer::NUMREL)) $criteria->add(ViadetrelviaPeer::NUMREL, $this->numrel);
		if ($this->isColumnModified(ViadetrelviaPeer::FECREL)) $criteria->add(ViadetrelviaPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(ViadetrelviaPeer::CODPRO)) $criteria->add(ViadetrelviaPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ViadetrelviaPeer::NUMFAC)) $criteria->add(ViadetrelviaPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(ViadetrelviaPeer::FECFAC)) $criteria->add(ViadetrelviaPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(ViadetrelviaPeer::MONTONET)) $criteria->add(ViadetrelviaPeer::MONTONET, $this->montonet);
		if ($this->isColumnModified(ViadetrelviaPeer::MONTOREC)) $criteria->add(ViadetrelviaPeer::MONTOREC, $this->montorec);
		if ($this->isColumnModified(ViadetrelviaPeer::CODCAT)) $criteria->add(ViadetrelviaPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ViadetrelviaPeer::CODPAR)) $criteria->add(ViadetrelviaPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ViadetrelviaPeer::REFSOL)) $criteria->add(ViadetrelviaPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(ViadetrelviaPeer::ID)) $criteria->add(ViadetrelviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadetrelviaPeer::DATABASE_NAME);

		$criteria->add(ViadetrelviaPeer::ID, $this->id);

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

		$copyObj->setNumrel($this->numrel);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setMontonet($this->montonet);

		$copyObj->setMontorec($this->montorec);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setRefsol($this->refsol);


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
			self::$peer = new ViadetrelviaPeer();
		}
		return self::$peer;
	}

} 