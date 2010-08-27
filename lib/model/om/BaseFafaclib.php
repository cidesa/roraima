<?php


abstract class BaseFafaclib extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $fecfac;


	
	protected $numfac;


	
	protected $numctr;


	
	protected $codcli;


	
	protected $totfac;


	
	protected $valfob;


	
	protected $venexec;


	
	protected $venexon;


	
	protected $basimp;


	
	protected $poriva;


	
	protected $crefis;


	
	protected $moniva;


	
	protected $numcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffac()
  {

    return trim($this->reffac);

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

  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getNumctr()
  {

    return trim($this->numctr);

  }
  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getTotfac($val=false)
  {

    if($val) return number_format($this->totfac,2,',','.');
    else return $this->totfac;

  }
  
  public function getValfob($val=false)
  {

    if($val) return number_format($this->valfob,2,',','.');
    else return $this->valfob;

  }
  
  public function getVenexec($val=false)
  {

    if($val) return number_format($this->venexec,2,',','.');
    else return $this->venexec;

  }
  
  public function getVenexon($val=false)
  {

    if($val) return number_format($this->venexon,2,',','.');
    else return $this->venexon;

  }
  
  public function getBasimp($val=false)
  {

    if($val) return number_format($this->basimp,2,',','.');
    else return $this->basimp;

  }
  
  public function getPoriva($val=false)
  {

    if($val) return number_format($this->poriva,2,',','.');
    else return $this->poriva;

  }
  
  public function getCrefis($val=false)
  {

    if($val) return number_format($this->crefis,2,',','.');
    else return $this->crefis;

  }
  
  public function getMoniva($val=false)
  {

    if($val) return number_format($this->moniva,2,',','.');
    else return $this->moniva;

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FafaclibPeer::REFFAC;
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
      $this->modifiedColumns[] = FafaclibPeer::FECFAC;
    }

	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = FafaclibPeer::NUMFAC;
      }
  
	} 
	
	public function setNumctr($v)
	{

    if ($this->numctr !== $v) {
        $this->numctr = $v;
        $this->modifiedColumns[] = FafaclibPeer::NUMCTR;
      }
  
	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FafaclibPeer::CODCLI;
      }
  
	} 
	
	public function setTotfac($v)
	{

    if ($this->totfac !== $v) {
        $this->totfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::TOTFAC;
      }
  
	} 
	
	public function setValfob($v)
	{

    if ($this->valfob !== $v) {
        $this->valfob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::VALFOB;
      }
  
	} 
	
	public function setVenexec($v)
	{

    if ($this->venexec !== $v) {
        $this->venexec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::VENEXEC;
      }
  
	} 
	
	public function setVenexon($v)
	{

    if ($this->venexon !== $v) {
        $this->venexon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::VENEXON;
      }
  
	} 
	
	public function setBasimp($v)
	{

    if ($this->basimp !== $v) {
        $this->basimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::BASIMP;
      }
  
	} 
	
	public function setPoriva($v)
	{

    if ($this->poriva !== $v) {
        $this->poriva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::PORIVA;
      }
  
	} 
	
	public function setCrefis($v)
	{

    if ($this->crefis !== $v) {
        $this->crefis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::CREFIS;
      }
  
	} 
	
	public function setMoniva($v)
	{

    if ($this->moniva !== $v) {
        $this->moniva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafaclibPeer::MONIVA;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = FafaclibPeer::NUMCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FafaclibPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffac = $rs->getString($startcol + 0);

      $this->fecfac = $rs->getDate($startcol + 1, null);

      $this->numfac = $rs->getString($startcol + 2);

      $this->numctr = $rs->getString($startcol + 3);

      $this->codcli = $rs->getString($startcol + 4);

      $this->totfac = $rs->getFloat($startcol + 5);

      $this->valfob = $rs->getFloat($startcol + 6);

      $this->venexec = $rs->getFloat($startcol + 7);

      $this->venexon = $rs->getFloat($startcol + 8);

      $this->basimp = $rs->getFloat($startcol + 9);

      $this->poriva = $rs->getFloat($startcol + 10);

      $this->crefis = $rs->getFloat($startcol + 11);

      $this->moniva = $rs->getFloat($startcol + 12);

      $this->numcom = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fafaclib object", $e);
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
			$con = Propel::getConnection(FafaclibPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FafaclibPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FafaclibPeer::DATABASE_NAME);
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
					$pk = FafaclibPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FafaclibPeer::doUpdate($this, $con);
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


			if (($retval = FafaclibPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafaclibPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffac();
				break;
			case 1:
				return $this->getFecfac();
				break;
			case 2:
				return $this->getNumfac();
				break;
			case 3:
				return $this->getNumctr();
				break;
			case 4:
				return $this->getCodcli();
				break;
			case 5:
				return $this->getTotfac();
				break;
			case 6:
				return $this->getValfob();
				break;
			case 7:
				return $this->getVenexec();
				break;
			case 8:
				return $this->getVenexon();
				break;
			case 9:
				return $this->getBasimp();
				break;
			case 10:
				return $this->getPoriva();
				break;
			case 11:
				return $this->getCrefis();
				break;
			case 12:
				return $this->getMoniva();
				break;
			case 13:
				return $this->getNumcom();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafaclibPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getFecfac(),
			$keys[2] => $this->getNumfac(),
			$keys[3] => $this->getNumctr(),
			$keys[4] => $this->getCodcli(),
			$keys[5] => $this->getTotfac(),
			$keys[6] => $this->getValfob(),
			$keys[7] => $this->getVenexec(),
			$keys[8] => $this->getVenexon(),
			$keys[9] => $this->getBasimp(),
			$keys[10] => $this->getPoriva(),
			$keys[11] => $this->getCrefis(),
			$keys[12] => $this->getMoniva(),
			$keys[13] => $this->getNumcom(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafaclibPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffac($value);
				break;
			case 1:
				$this->setFecfac($value);
				break;
			case 2:
				$this->setNumfac($value);
				break;
			case 3:
				$this->setNumctr($value);
				break;
			case 4:
				$this->setCodcli($value);
				break;
			case 5:
				$this->setTotfac($value);
				break;
			case 6:
				$this->setValfob($value);
				break;
			case 7:
				$this->setVenexec($value);
				break;
			case 8:
				$this->setVenexon($value);
				break;
			case 9:
				$this->setBasimp($value);
				break;
			case 10:
				$this->setPoriva($value);
				break;
			case 11:
				$this->setCrefis($value);
				break;
			case 12:
				$this->setMoniva($value);
				break;
			case 13:
				$this->setNumcom($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafaclibPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumctr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcli($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotfac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setValfob($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVenexec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVenexon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBasimp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPoriva($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCrefis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMoniva($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNumcom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FafaclibPeer::DATABASE_NAME);

		if ($this->isColumnModified(FafaclibPeer::REFFAC)) $criteria->add(FafaclibPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FafaclibPeer::FECFAC)) $criteria->add(FafaclibPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(FafaclibPeer::NUMFAC)) $criteria->add(FafaclibPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(FafaclibPeer::NUMCTR)) $criteria->add(FafaclibPeer::NUMCTR, $this->numctr);
		if ($this->isColumnModified(FafaclibPeer::CODCLI)) $criteria->add(FafaclibPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FafaclibPeer::TOTFAC)) $criteria->add(FafaclibPeer::TOTFAC, $this->totfac);
		if ($this->isColumnModified(FafaclibPeer::VALFOB)) $criteria->add(FafaclibPeer::VALFOB, $this->valfob);
		if ($this->isColumnModified(FafaclibPeer::VENEXEC)) $criteria->add(FafaclibPeer::VENEXEC, $this->venexec);
		if ($this->isColumnModified(FafaclibPeer::VENEXON)) $criteria->add(FafaclibPeer::VENEXON, $this->venexon);
		if ($this->isColumnModified(FafaclibPeer::BASIMP)) $criteria->add(FafaclibPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(FafaclibPeer::PORIVA)) $criteria->add(FafaclibPeer::PORIVA, $this->poriva);
		if ($this->isColumnModified(FafaclibPeer::CREFIS)) $criteria->add(FafaclibPeer::CREFIS, $this->crefis);
		if ($this->isColumnModified(FafaclibPeer::MONIVA)) $criteria->add(FafaclibPeer::MONIVA, $this->moniva);
		if ($this->isColumnModified(FafaclibPeer::NUMCOM)) $criteria->add(FafaclibPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(FafaclibPeer::ID)) $criteria->add(FafaclibPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FafaclibPeer::DATABASE_NAME);

		$criteria->add(FafaclibPeer::ID, $this->id);

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

		$copyObj->setReffac($this->reffac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setNumctr($this->numctr);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setTotfac($this->totfac);

		$copyObj->setValfob($this->valfob);

		$copyObj->setVenexec($this->venexec);

		$copyObj->setVenexon($this->venexon);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setPoriva($this->poriva);

		$copyObj->setCrefis($this->crefis);

		$copyObj->setMoniva($this->moniva);

		$copyObj->setNumcom($this->numcom);


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
			self::$peer = new FafaclibPeer();
		}
		return self::$peer;
	}

} 