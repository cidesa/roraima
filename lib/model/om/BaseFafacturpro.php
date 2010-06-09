<?php


abstract class BaseFafacturpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $fecfac;


	
	protected $codcli;


	
	protected $desfac;


	
	protected $tipref;


	
	protected $monfac;


	
	protected $mondesc;


	
	protected $codconpag;


	
	protected $numcom;


	
	protected $reapor;


	
	protected $fecanu;


	
	protected $status;


	
	protected $observ;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $numcomord;


	
	protected $numcominv;


	
	protected $sucursal;


	
	protected $motanu;


	
	protected $vuelto;


	
	protected $codcaj;


	
	protected $numcontrol;


	
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

  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getDesfac()
  {

    return trim($this->desfac);

  }
  
  public function getTipref()
  {

    return trim($this->tipref);

  }
  
  public function getMonfac($val=false)
  {

    if($val) return number_format($this->monfac,2,',','.');
    else return $this->monfac;

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getCodconpag()
  {

    return $this->codconpag;

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getTipmon()
  {

    return trim($this->tipmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getNumcomord()
  {

    return trim($this->numcomord);

  }
  
  public function getNumcominv()
  {

    return trim($this->numcominv);

  }
  
  public function getSucursal()
  {

    return trim($this->sucursal);

  }
  
  public function getMotanu()
  {

    return trim($this->motanu);

  }
  
  public function getVuelto($val=false)
  {

    if($val) return number_format($this->vuelto,2,',','.');
    else return $this->vuelto;

  }
  
  public function getCodcaj()
  {

    return $this->codcaj;

  }
  
  public function getNumcontrol()
  {

    return trim($this->numcontrol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FafacturproPeer::REFFAC;
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
      $this->modifiedColumns[] = FafacturproPeer::FECFAC;
    }

	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODCLI;
      }
  
	} 
	
	public function setDesfac($v)
	{

    if ($this->desfac !== $v) {
        $this->desfac = $v;
        $this->modifiedColumns[] = FafacturproPeer::DESFAC;
      }
  
	} 
	
	public function setTipref($v)
	{

    if ($this->tipref !== $v) {
        $this->tipref = $v;
        $this->modifiedColumns[] = FafacturproPeer::TIPREF;
      }
  
	} 
	
	public function setMonfac($v)
	{

    if ($this->monfac !== $v) {
        $this->monfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::MONFAC;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::MONDESC;
      }
  
	} 
	
	public function setCodconpag($v)
	{

    if ($this->codconpag !== $v) {
        $this->codconpag = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODCONPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCOM;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FafacturproPeer::REAPOR;
      }
  
	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = FafacturproPeer::FECANU;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = FafacturproPeer::STATUS;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FafacturproPeer::OBSERV;
      }
  
	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = FafacturproPeer::TIPMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::VALMON;
      }
  
	} 
	
	public function setNumcomord($v)
	{

    if ($this->numcomord !== $v) {
        $this->numcomord = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCOMORD;
      }
  
	} 
	
	public function setNumcominv($v)
	{

    if ($this->numcominv !== $v) {
        $this->numcominv = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCOMINV;
      }
  
	} 
	
	public function setSucursal($v)
	{

    if ($this->sucursal !== $v) {
        $this->sucursal = $v;
        $this->modifiedColumns[] = FafacturproPeer::SUCURSAL;
      }
  
	} 
	
	public function setMotanu($v)
	{

    if ($this->motanu !== $v) {
        $this->motanu = $v;
        $this->modifiedColumns[] = FafacturproPeer::MOTANU;
      }
  
	} 
	
	public function setVuelto($v)
	{

    if ($this->vuelto !== $v) {
        $this->vuelto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::VUELTO;
      }
  
	} 
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODCAJ;
      }
  
	} 
	
	public function setNumcontrol($v)
	{

    if ($this->numcontrol !== $v) {
        $this->numcontrol = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCONTROL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FafacturproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffac = $rs->getString($startcol + 0);

      $this->fecfac = $rs->getDate($startcol + 1, null);

      $this->codcli = $rs->getString($startcol + 2);

      $this->desfac = $rs->getString($startcol + 3);

      $this->tipref = $rs->getString($startcol + 4);

      $this->monfac = $rs->getFloat($startcol + 5);

      $this->mondesc = $rs->getFloat($startcol + 6);

      $this->codconpag = $rs->getInt($startcol + 7);

      $this->numcom = $rs->getString($startcol + 8);

      $this->reapor = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->status = $rs->getString($startcol + 11);

      $this->observ = $rs->getString($startcol + 12);

      $this->tipmon = $rs->getString($startcol + 13);

      $this->valmon = $rs->getFloat($startcol + 14);

      $this->numcomord = $rs->getString($startcol + 15);

      $this->numcominv = $rs->getString($startcol + 16);

      $this->sucursal = $rs->getString($startcol + 17);

      $this->motanu = $rs->getString($startcol + 18);

      $this->vuelto = $rs->getFloat($startcol + 19);

      $this->codcaj = $rs->getInt($startcol + 20);

      $this->numcontrol = $rs->getString($startcol + 21);

      $this->id = $rs->getInt($startcol + 22);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 23; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fafacturpro object", $e);
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
			$con = Propel::getConnection(FafacturproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FafacturproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FafacturproPeer::DATABASE_NAME);
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
					$pk = FafacturproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FafacturproPeer::doUpdate($this, $con);
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


			if (($retval = FafacturproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafacturproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodcli();
				break;
			case 3:
				return $this->getDesfac();
				break;
			case 4:
				return $this->getTipref();
				break;
			case 5:
				return $this->getMonfac();
				break;
			case 6:
				return $this->getMondesc();
				break;
			case 7:
				return $this->getCodconpag();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getReapor();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getObserv();
				break;
			case 13:
				return $this->getTipmon();
				break;
			case 14:
				return $this->getValmon();
				break;
			case 15:
				return $this->getNumcomord();
				break;
			case 16:
				return $this->getNumcominv();
				break;
			case 17:
				return $this->getSucursal();
				break;
			case 18:
				return $this->getMotanu();
				break;
			case 19:
				return $this->getVuelto();
				break;
			case 20:
				return $this->getCodcaj();
				break;
			case 21:
				return $this->getNumcontrol();
				break;
			case 22:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafacturproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getFecfac(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getDesfac(),
			$keys[4] => $this->getTipref(),
			$keys[5] => $this->getMonfac(),
			$keys[6] => $this->getMondesc(),
			$keys[7] => $this->getCodconpag(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getReapor(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getObserv(),
			$keys[13] => $this->getTipmon(),
			$keys[14] => $this->getValmon(),
			$keys[15] => $this->getNumcomord(),
			$keys[16] => $this->getNumcominv(),
			$keys[17] => $this->getSucursal(),
			$keys[18] => $this->getMotanu(),
			$keys[19] => $this->getVuelto(),
			$keys[20] => $this->getCodcaj(),
			$keys[21] => $this->getNumcontrol(),
			$keys[22] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafacturproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodcli($value);
				break;
			case 3:
				$this->setDesfac($value);
				break;
			case 4:
				$this->setTipref($value);
				break;
			case 5:
				$this->setMonfac($value);
				break;
			case 6:
				$this->setMondesc($value);
				break;
			case 7:
				$this->setCodconpag($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setReapor($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setObserv($value);
				break;
			case 13:
				$this->setTipmon($value);
				break;
			case 14:
				$this->setValmon($value);
				break;
			case 15:
				$this->setNumcomord($value);
				break;
			case 16:
				$this->setNumcominv($value);
				break;
			case 17:
				$this->setSucursal($value);
				break;
			case 18:
				$this->setMotanu($value);
				break;
			case 19:
				$this->setVuelto($value);
				break;
			case 20:
				$this->setCodcaj($value);
				break;
			case 21:
				$this->setNumcontrol($value);
				break;
			case 22:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafacturproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesfac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonfac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMondesc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodconpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setReapor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObserv($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setValmon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNumcomord($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumcominv($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSucursal($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMotanu($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setVuelto($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodcaj($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNumcontrol($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FafacturproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FafacturproPeer::REFFAC)) $criteria->add(FafacturproPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FafacturproPeer::FECFAC)) $criteria->add(FafacturproPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(FafacturproPeer::CODCLI)) $criteria->add(FafacturproPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FafacturproPeer::DESFAC)) $criteria->add(FafacturproPeer::DESFAC, $this->desfac);
		if ($this->isColumnModified(FafacturproPeer::TIPREF)) $criteria->add(FafacturproPeer::TIPREF, $this->tipref);
		if ($this->isColumnModified(FafacturproPeer::MONFAC)) $criteria->add(FafacturproPeer::MONFAC, $this->monfac);
		if ($this->isColumnModified(FafacturproPeer::MONDESC)) $criteria->add(FafacturproPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FafacturproPeer::CODCONPAG)) $criteria->add(FafacturproPeer::CODCONPAG, $this->codconpag);
		if ($this->isColumnModified(FafacturproPeer::NUMCOM)) $criteria->add(FafacturproPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(FafacturproPeer::REAPOR)) $criteria->add(FafacturproPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FafacturproPeer::FECANU)) $criteria->add(FafacturproPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FafacturproPeer::STATUS)) $criteria->add(FafacturproPeer::STATUS, $this->status);
		if ($this->isColumnModified(FafacturproPeer::OBSERV)) $criteria->add(FafacturproPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FafacturproPeer::TIPMON)) $criteria->add(FafacturproPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(FafacturproPeer::VALMON)) $criteria->add(FafacturproPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(FafacturproPeer::NUMCOMORD)) $criteria->add(FafacturproPeer::NUMCOMORD, $this->numcomord);
		if ($this->isColumnModified(FafacturproPeer::NUMCOMINV)) $criteria->add(FafacturproPeer::NUMCOMINV, $this->numcominv);
		if ($this->isColumnModified(FafacturproPeer::SUCURSAL)) $criteria->add(FafacturproPeer::SUCURSAL, $this->sucursal);
		if ($this->isColumnModified(FafacturproPeer::MOTANU)) $criteria->add(FafacturproPeer::MOTANU, $this->motanu);
		if ($this->isColumnModified(FafacturproPeer::VUELTO)) $criteria->add(FafacturproPeer::VUELTO, $this->vuelto);
		if ($this->isColumnModified(FafacturproPeer::CODCAJ)) $criteria->add(FafacturproPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FafacturproPeer::NUMCONTROL)) $criteria->add(FafacturproPeer::NUMCONTROL, $this->numcontrol);
		if ($this->isColumnModified(FafacturproPeer::ID)) $criteria->add(FafacturproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FafacturproPeer::DATABASE_NAME);

		$criteria->add(FafacturproPeer::ID, $this->id);

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

		$copyObj->setCodcli($this->codcli);

		$copyObj->setDesfac($this->desfac);

		$copyObj->setTipref($this->tipref);

		$copyObj->setMonfac($this->monfac);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setCodconpag($this->codconpag);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setReapor($this->reapor);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setStatus($this->status);

		$copyObj->setObserv($this->observ);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setNumcomord($this->numcomord);

		$copyObj->setNumcominv($this->numcominv);

		$copyObj->setSucursal($this->sucursal);

		$copyObj->setMotanu($this->motanu);

		$copyObj->setVuelto($this->vuelto);

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setNumcontrol($this->numcontrol);


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
			self::$peer = new FafacturproPeer();
		}
		return self::$peer;
	}

} 