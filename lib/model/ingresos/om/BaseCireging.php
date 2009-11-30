<?php


abstract class BaseCireging extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refing;


	
	protected $fecing;


	
	protected $desing;


	
	protected $codtip;


	
	protected $rifcon;


	
	protected $moning;


	
	protected $monrec;


	
	protected $mondes;


	
	protected $montot;


	
	protected $desanu;


	
	protected $fecanu;


	
	protected $staing;


	
	protected $ctaban;


	
	protected $tipmov;


	
	protected $previs;


	
	protected $anoing;


	
	protected $numdep;


	
	protected $numofi;


	
	protected $numcom;


	
	protected $reflib;


	
	protected $staliq;


	
	protected $fecliq;


	
	protected $refliq;


	
	protected $desliq;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefing()
  {

    return trim($this->refing);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesing()
  {

    return trim($this->desing);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getMoning($val=false)
  {

    if($val) return number_format($this->moning,2,',','.');
    else return $this->moning;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

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

  
  public function getStaing()
  {

    return trim($this->staing);

  }
  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getPrevis()
  {

    return trim($this->previs);

  }
  
  public function getAnoing()
  {

    return trim($this->anoing);

  }
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getNumofi()
  {

    return trim($this->numofi);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getReflib()
  {

    return trim($this->reflib);

  }
  
  public function getStaliq()
  {

    return trim($this->staliq);

  }
  
  public function getFecliq($format = 'Y-m-d')
  {

    if ($this->fecliq === null || $this->fecliq === '') {
      return null;
    } elseif (!is_int($this->fecliq)) {
            $ts = adodb_strtotime($this->fecliq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecliq] as date/time value: " . var_export($this->fecliq, true));
      }
    } else {
      $ts = $this->fecliq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefliq()
  {

    return trim($this->refliq);

  }
  
  public function getDesliq()
  {

    return trim($this->desliq);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefing($v)
	{

    if ($this->refing !== $v) {
        $this->refing = $v;
        $this->modifiedColumns[] = CiregingPeer::REFING;
      }
  
	} 
	
	public function setFecing($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = CiregingPeer::FECING;
    }

	} 
	
	public function setDesing($v)
	{

    if ($this->desing !== $v) {
        $this->desing = $v;
        $this->modifiedColumns[] = CiregingPeer::DESING;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = CiregingPeer::CODTIP;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = CiregingPeer::RIFCON;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiregingPeer::MONING;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiregingPeer::MONREC;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiregingPeer::MONDES;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiregingPeer::MONTOT;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CiregingPeer::DESANU;
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
      $this->modifiedColumns[] = CiregingPeer::FECANU;
    }

	} 
	
	public function setStaing($v)
	{

    if ($this->staing !== $v) {
        $this->staing = $v;
        $this->modifiedColumns[] = CiregingPeer::STAING;
      }
  
	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = CiregingPeer::CTABAN;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = CiregingPeer::TIPMOV;
      }
  
	} 
	
	public function setPrevis($v)
	{

    if ($this->previs !== $v) {
        $this->previs = $v;
        $this->modifiedColumns[] = CiregingPeer::PREVIS;
      }
  
	} 
	
	public function setAnoing($v)
	{

    if ($this->anoing !== $v) {
        $this->anoing = $v;
        $this->modifiedColumns[] = CiregingPeer::ANOING;
      }
  
	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = $v;
        $this->modifiedColumns[] = CiregingPeer::NUMDEP;
      }
  
	} 
	
	public function setNumofi($v)
	{

    if ($this->numofi !== $v) {
        $this->numofi = $v;
        $this->modifiedColumns[] = CiregingPeer::NUMOFI;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CiregingPeer::NUMCOM;
      }
  
	} 
	
	public function setReflib($v)
	{

    if ($this->reflib !== $v) {
        $this->reflib = $v;
        $this->modifiedColumns[] = CiregingPeer::REFLIB;
      }
  
	} 
	
	public function setStaliq($v)
	{

    if ($this->staliq !== $v) {
        $this->staliq = $v;
        $this->modifiedColumns[] = CiregingPeer::STALIQ;
      }
  
	} 
	
	public function setFecliq($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecliq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecliq !== $ts) {
      $this->fecliq = $ts;
      $this->modifiedColumns[] = CiregingPeer::FECLIQ;
    }

	} 
	
	public function setRefliq($v)
	{

    if ($this->refliq !== $v) {
        $this->refliq = $v;
        $this->modifiedColumns[] = CiregingPeer::REFLIQ;
      }
  
	} 
	
	public function setDesliq($v)
	{

    if ($this->desliq !== $v) {
        $this->desliq = $v;
        $this->modifiedColumns[] = CiregingPeer::DESLIQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CiregingPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refing = $rs->getString($startcol + 0);

      $this->fecing = $rs->getDate($startcol + 1, null);

      $this->desing = $rs->getString($startcol + 2);

      $this->codtip = $rs->getString($startcol + 3);

      $this->rifcon = $rs->getString($startcol + 4);

      $this->moning = $rs->getFloat($startcol + 5);

      $this->monrec = $rs->getFloat($startcol + 6);

      $this->mondes = $rs->getFloat($startcol + 7);

      $this->montot = $rs->getFloat($startcol + 8);

      $this->desanu = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->staing = $rs->getString($startcol + 11);

      $this->ctaban = $rs->getString($startcol + 12);

      $this->tipmov = $rs->getString($startcol + 13);

      $this->previs = $rs->getString($startcol + 14);

      $this->anoing = $rs->getString($startcol + 15);

      $this->numdep = $rs->getString($startcol + 16);

      $this->numofi = $rs->getString($startcol + 17);

      $this->numcom = $rs->getString($startcol + 18);

      $this->reflib = $rs->getString($startcol + 19);

      $this->staliq = $rs->getString($startcol + 20);

      $this->fecliq = $rs->getDate($startcol + 21, null);

      $this->refliq = $rs->getString($startcol + 22);

      $this->desliq = $rs->getString($startcol + 23);

      $this->id = $rs->getInt($startcol + 24);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 25; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cireging object", $e);
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
			$con = Propel::getConnection(CiregingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiregingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiregingPeer::DATABASE_NAME);
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
					$pk = CiregingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CiregingPeer::doUpdate($this, $con);
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


			if (($retval = CiregingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiregingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefing();
				break;
			case 1:
				return $this->getFecing();
				break;
			case 2:
				return $this->getDesing();
				break;
			case 3:
				return $this->getCodtip();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getMoning();
				break;
			case 6:
				return $this->getMonrec();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getMontot();
				break;
			case 9:
				return $this->getDesanu();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getStaing();
				break;
			case 12:
				return $this->getCtaban();
				break;
			case 13:
				return $this->getTipmov();
				break;
			case 14:
				return $this->getPrevis();
				break;
			case 15:
				return $this->getAnoing();
				break;
			case 16:
				return $this->getNumdep();
				break;
			case 17:
				return $this->getNumofi();
				break;
			case 18:
				return $this->getNumcom();
				break;
			case 19:
				return $this->getReflib();
				break;
			case 20:
				return $this->getStaliq();
				break;
			case 21:
				return $this->getFecliq();
				break;
			case 22:
				return $this->getRefliq();
				break;
			case 23:
				return $this->getDesliq();
				break;
			case 24:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiregingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefing(),
			$keys[1] => $this->getFecing(),
			$keys[2] => $this->getDesing(),
			$keys[3] => $this->getCodtip(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getMoning(),
			$keys[6] => $this->getMonrec(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getMontot(),
			$keys[9] => $this->getDesanu(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getStaing(),
			$keys[12] => $this->getCtaban(),
			$keys[13] => $this->getTipmov(),
			$keys[14] => $this->getPrevis(),
			$keys[15] => $this->getAnoing(),
			$keys[16] => $this->getNumdep(),
			$keys[17] => $this->getNumofi(),
			$keys[18] => $this->getNumcom(),
			$keys[19] => $this->getReflib(),
			$keys[20] => $this->getStaliq(),
			$keys[21] => $this->getFecliq(),
			$keys[22] => $this->getRefliq(),
			$keys[23] => $this->getDesliq(),
			$keys[24] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiregingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefing($value);
				break;
			case 1:
				$this->setFecing($value);
				break;
			case 2:
				$this->setDesing($value);
				break;
			case 3:
				$this->setCodtip($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setMoning($value);
				break;
			case 6:
				$this->setMonrec($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setMontot($value);
				break;
			case 9:
				$this->setDesanu($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setStaing($value);
				break;
			case 12:
				$this->setCtaban($value);
				break;
			case 13:
				$this->setTipmov($value);
				break;
			case 14:
				$this->setPrevis($value);
				break;
			case 15:
				$this->setAnoing($value);
				break;
			case 16:
				$this->setNumdep($value);
				break;
			case 17:
				$this->setNumofi($value);
				break;
			case 18:
				$this->setNumcom($value);
				break;
			case 19:
				$this->setReflib($value);
				break;
			case 20:
				$this->setStaliq($value);
				break;
			case 21:
				$this->setFecliq($value);
				break;
			case 22:
				$this->setRefliq($value);
				break;
			case 23:
				$this->setDesliq($value);
				break;
			case 24:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiregingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefing($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecing($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtip($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoning($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMontot($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDesanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStaing($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCtaban($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmov($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPrevis($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAnoing($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumdep($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNumofi($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNumcom($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setReflib($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setStaliq($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecliq($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setRefliq($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDesliq($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setId($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiregingPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiregingPeer::REFING)) $criteria->add(CiregingPeer::REFING, $this->refing);
		if ($this->isColumnModified(CiregingPeer::FECING)) $criteria->add(CiregingPeer::FECING, $this->fecing);
		if ($this->isColumnModified(CiregingPeer::DESING)) $criteria->add(CiregingPeer::DESING, $this->desing);
		if ($this->isColumnModified(CiregingPeer::CODTIP)) $criteria->add(CiregingPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(CiregingPeer::RIFCON)) $criteria->add(CiregingPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(CiregingPeer::MONING)) $criteria->add(CiregingPeer::MONING, $this->moning);
		if ($this->isColumnModified(CiregingPeer::MONREC)) $criteria->add(CiregingPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(CiregingPeer::MONDES)) $criteria->add(CiregingPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CiregingPeer::MONTOT)) $criteria->add(CiregingPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CiregingPeer::DESANU)) $criteria->add(CiregingPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CiregingPeer::FECANU)) $criteria->add(CiregingPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CiregingPeer::STAING)) $criteria->add(CiregingPeer::STAING, $this->staing);
		if ($this->isColumnModified(CiregingPeer::CTABAN)) $criteria->add(CiregingPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(CiregingPeer::TIPMOV)) $criteria->add(CiregingPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CiregingPeer::PREVIS)) $criteria->add(CiregingPeer::PREVIS, $this->previs);
		if ($this->isColumnModified(CiregingPeer::ANOING)) $criteria->add(CiregingPeer::ANOING, $this->anoing);
		if ($this->isColumnModified(CiregingPeer::NUMDEP)) $criteria->add(CiregingPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(CiregingPeer::NUMOFI)) $criteria->add(CiregingPeer::NUMOFI, $this->numofi);
		if ($this->isColumnModified(CiregingPeer::NUMCOM)) $criteria->add(CiregingPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CiregingPeer::REFLIB)) $criteria->add(CiregingPeer::REFLIB, $this->reflib);
		if ($this->isColumnModified(CiregingPeer::STALIQ)) $criteria->add(CiregingPeer::STALIQ, $this->staliq);
		if ($this->isColumnModified(CiregingPeer::FECLIQ)) $criteria->add(CiregingPeer::FECLIQ, $this->fecliq);
		if ($this->isColumnModified(CiregingPeer::REFLIQ)) $criteria->add(CiregingPeer::REFLIQ, $this->refliq);
		if ($this->isColumnModified(CiregingPeer::DESLIQ)) $criteria->add(CiregingPeer::DESLIQ, $this->desliq);
		if ($this->isColumnModified(CiregingPeer::ID)) $criteria->add(CiregingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiregingPeer::DATABASE_NAME);

		$criteria->add(CiregingPeer::ID, $this->id);

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

		$copyObj->setRefing($this->refing);

		$copyObj->setFecing($this->fecing);

		$copyObj->setDesing($this->desing);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setMoning($this->moning);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMontot($this->montot);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setStaing($this->staing);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setPrevis($this->previs);

		$copyObj->setAnoing($this->anoing);

		$copyObj->setNumdep($this->numdep);

		$copyObj->setNumofi($this->numofi);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setReflib($this->reflib);

		$copyObj->setStaliq($this->staliq);

		$copyObj->setFecliq($this->fecliq);

		$copyObj->setRefliq($this->refliq);

		$copyObj->setDesliq($this->desliq);


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
			self::$peer = new CiregingPeer();
		}
		return self::$peer;
	}

} 