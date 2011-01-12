<?php


abstract class BaseNpimppresoc1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $feccor;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $tasint;


	
	protected $diadif;


	
	protected $capvie;


	
	protected $capcap;


	
	protected $intdev;


	
	protected $intacum;


	
	protected $adepre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFeccor($format = 'Y-m-d')
  {

    if ($this->feccor === null || $this->feccor === '') {
      return null;
    } elseif (!is_int($this->feccor)) {
            $ts = adodb_strtotime($this->feccor);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccor] as date/time value: " . var_export($this->feccor, true));
      }
    } else {
      $ts = $this->feccor;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTasint($val=false)
  {

    if($val) return number_format($this->tasint,2,',','.');
    else return $this->tasint;

  }
  
  public function getDiadif($val=false)
  {

    if($val) return number_format($this->diadif,2,',','.');
    else return $this->diadif;

  }
  
  public function getCapvie($val=false)
  {

    if($val) return number_format($this->capvie,2,',','.');
    else return $this->capvie;

  }
  
  public function getCapcap($val=false)
  {

    if($val) return number_format($this->capcap,2,',','.');
    else return $this->capcap;

  }
  
  public function getIntdev($val=false)
  {

    if($val) return number_format($this->intdev,2,',','.');
    else return $this->intdev;

  }
  
  public function getIntacum($val=false)
  {

    if($val) return number_format($this->intacum,2,',','.');
    else return $this->intacum;

  }
  
  public function getAdepre($val=false)
  {

    if($val) return number_format($this->adepre,2,',','.');
    else return $this->adepre;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = Npimppresoc1Peer::CODEMP;
      }
  
	} 
	
	public function setFeccor($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccor] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccor !== $ts) {
      $this->feccor = $ts;
      $this->modifiedColumns[] = Npimppresoc1Peer::FECCOR;
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
      $this->modifiedColumns[] = Npimppresoc1Peer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = Npimppresoc1Peer::FECFIN;
    }

	} 
	
	public function setTasint($v)
	{

    if ($this->tasint !== $v) {
        $this->tasint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::TASINT;
      }
  
	} 
	
	public function setDiadif($v)
	{

    if ($this->diadif !== $v) {
        $this->diadif = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::DIADIF;
      }
  
	} 
	
	public function setCapvie($v)
	{

    if ($this->capvie !== $v) {
        $this->capvie = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::CAPVIE;
      }
  
	} 
	
	public function setCapcap($v)
	{

    if ($this->capcap !== $v) {
        $this->capcap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::CAPCAP;
      }
  
	} 
	
	public function setIntdev($v)
	{

    if ($this->intdev !== $v) {
        $this->intdev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::INTDEV;
      }
  
	} 
	
	public function setIntacum($v)
	{

    if ($this->intacum !== $v) {
        $this->intacum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::INTACUM;
      }
  
	} 
	
	public function setAdepre($v)
	{

    if ($this->adepre !== $v) {
        $this->adepre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Npimppresoc1Peer::ADEPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Npimppresoc1Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->feccor = $rs->getDate($startcol + 1, null);

      $this->fecini = $rs->getDate($startcol + 2, null);

      $this->fecfin = $rs->getDate($startcol + 3, null);

      $this->tasint = $rs->getFloat($startcol + 4);

      $this->diadif = $rs->getFloat($startcol + 5);

      $this->capvie = $rs->getFloat($startcol + 6);

      $this->capcap = $rs->getFloat($startcol + 7);

      $this->intdev = $rs->getFloat($startcol + 8);

      $this->intacum = $rs->getFloat($startcol + 9);

      $this->adepre = $rs->getFloat($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npimppresoc1 object", $e);
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
			$con = Propel::getConnection(Npimppresoc1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Npimppresoc1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Npimppresoc1Peer::DATABASE_NAME);
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
					$pk = Npimppresoc1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Npimppresoc1Peer::doUpdate($this, $con);
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


			if (($retval = Npimppresoc1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Npimppresoc1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFeccor();
				break;
			case 2:
				return $this->getFecini();
				break;
			case 3:
				return $this->getFecfin();
				break;
			case 4:
				return $this->getTasint();
				break;
			case 5:
				return $this->getDiadif();
				break;
			case 6:
				return $this->getCapvie();
				break;
			case 7:
				return $this->getCapcap();
				break;
			case 8:
				return $this->getIntdev();
				break;
			case 9:
				return $this->getIntacum();
				break;
			case 10:
				return $this->getAdepre();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Npimppresoc1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFeccor(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFecfin(),
			$keys[4] => $this->getTasint(),
			$keys[5] => $this->getDiadif(),
			$keys[6] => $this->getCapvie(),
			$keys[7] => $this->getCapcap(),
			$keys[8] => $this->getIntdev(),
			$keys[9] => $this->getIntacum(),
			$keys[10] => $this->getAdepre(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Npimppresoc1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFeccor($value);
				break;
			case 2:
				$this->setFecini($value);
				break;
			case 3:
				$this->setFecfin($value);
				break;
			case 4:
				$this->setTasint($value);
				break;
			case 5:
				$this->setDiadif($value);
				break;
			case 6:
				$this->setCapvie($value);
				break;
			case 7:
				$this->setCapcap($value);
				break;
			case 8:
				$this->setIntdev($value);
				break;
			case 9:
				$this->setIntacum($value);
				break;
			case 10:
				$this->setAdepre($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Npimppresoc1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecfin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTasint($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiadif($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCapvie($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCapcap($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIntdev($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIntacum($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAdepre($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Npimppresoc1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Npimppresoc1Peer::CODEMP)) $criteria->add(Npimppresoc1Peer::CODEMP, $this->codemp);
		if ($this->isColumnModified(Npimppresoc1Peer::FECCOR)) $criteria->add(Npimppresoc1Peer::FECCOR, $this->feccor);
		if ($this->isColumnModified(Npimppresoc1Peer::FECINI)) $criteria->add(Npimppresoc1Peer::FECINI, $this->fecini);
		if ($this->isColumnModified(Npimppresoc1Peer::FECFIN)) $criteria->add(Npimppresoc1Peer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(Npimppresoc1Peer::TASINT)) $criteria->add(Npimppresoc1Peer::TASINT, $this->tasint);
		if ($this->isColumnModified(Npimppresoc1Peer::DIADIF)) $criteria->add(Npimppresoc1Peer::DIADIF, $this->diadif);
		if ($this->isColumnModified(Npimppresoc1Peer::CAPVIE)) $criteria->add(Npimppresoc1Peer::CAPVIE, $this->capvie);
		if ($this->isColumnModified(Npimppresoc1Peer::CAPCAP)) $criteria->add(Npimppresoc1Peer::CAPCAP, $this->capcap);
		if ($this->isColumnModified(Npimppresoc1Peer::INTDEV)) $criteria->add(Npimppresoc1Peer::INTDEV, $this->intdev);
		if ($this->isColumnModified(Npimppresoc1Peer::INTACUM)) $criteria->add(Npimppresoc1Peer::INTACUM, $this->intacum);
		if ($this->isColumnModified(Npimppresoc1Peer::ADEPRE)) $criteria->add(Npimppresoc1Peer::ADEPRE, $this->adepre);
		if ($this->isColumnModified(Npimppresoc1Peer::ID)) $criteria->add(Npimppresoc1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Npimppresoc1Peer::DATABASE_NAME);

		$criteria->add(Npimppresoc1Peer::ID, $this->id);

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

		$copyObj->setFeccor($this->feccor);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setTasint($this->tasint);

		$copyObj->setDiadif($this->diadif);

		$copyObj->setCapvie($this->capvie);

		$copyObj->setCapcap($this->capcap);

		$copyObj->setIntdev($this->intdev);

		$copyObj->setIntacum($this->intacum);

		$copyObj->setAdepre($this->adepre);


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
			self::$peer = new Npimppresoc1Peer();
		}
		return self::$peer;
	}

} 