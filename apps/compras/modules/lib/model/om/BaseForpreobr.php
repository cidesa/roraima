<?php


abstract class BaseForpreobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codobr;


	
	protected $codparegr;


	
	protected $monpre;


	
	protected $codtip;


	
	protected $observ;


	
	protected $codfin;


	
	protected $funcionario;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $situacion;


	
	protected $comproanoant;


	
	protected $comprovig;


	
	protected $ejecanoant;


	
	protected $ejecanovig;


	
	protected $estanopost;


	
	protected $nomparegr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCodparegr()
  {

    return trim($this->codparegr);

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getFuncionario()
  {

    return trim($this->funcionario);

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

  
  public function getSituacion()
  {

    return trim($this->situacion);

  }
  
  public function getComproanoant($val=false)
  {

    if($val) return number_format($this->comproanoant,2,',','.');
    else return $this->comproanoant;

  }
  
  public function getComprovig($val=false)
  {

    if($val) return number_format($this->comprovig,2,',','.');
    else return $this->comprovig;

  }
  
  public function getEjecanoant($val=false)
  {

    if($val) return number_format($this->ejecanoant,2,',','.');
    else return $this->ejecanoant;

  }
  
  public function getEjecanovig($val=false)
  {

    if($val) return number_format($this->ejecanovig,2,',','.');
    else return $this->ejecanovig;

  }
  
  public function getEstanopost($val=false)
  {

    if($val) return number_format($this->estanopost,2,',','.');
    else return $this->estanopost;

  }
  
  public function getNomparegr()
  {

    return trim($this->nomparegr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForpreobrPeer::CODCAT;
      }
  
	} 
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = ForpreobrPeer::CODOBR;
      }
  
	} 
	
	public function setCodparegr($v)
	{

    if ($this->codparegr !== $v) {
        $this->codparegr = $v;
        $this->modifiedColumns[] = ForpreobrPeer::CODPAREGR;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpreobrPeer::MONPRE;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = ForpreobrPeer::CODTIP;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = ForpreobrPeer::OBSERV;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = ForpreobrPeer::CODFIN;
      }
  
	} 
	
	public function setFuncionario($v)
	{

    if ($this->funcionario !== $v) {
        $this->funcionario = $v;
        $this->modifiedColumns[] = ForpreobrPeer::FUNCIONARIO;
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
      $this->modifiedColumns[] = ForpreobrPeer::FECINI;
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
      $this->modifiedColumns[] = ForpreobrPeer::FECFIN;
    }

	} 
	
	public function setSituacion($v)
	{

    if ($this->situacion !== $v) {
        $this->situacion = $v;
        $this->modifiedColumns[] = ForpreobrPeer::SITUACION;
      }
  
	} 
	
	public function setComproanoant($v)
	{

    if ($this->comproanoant !== $v) {
        $this->comproanoant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpreobrPeer::COMPROANOANT;
      }
  
	} 
	
	public function setComprovig($v)
	{

    if ($this->comprovig !== $v) {
        $this->comprovig = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpreobrPeer::COMPROVIG;
      }
  
	} 
	
	public function setEjecanoant($v)
	{

    if ($this->ejecanoant !== $v) {
        $this->ejecanoant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpreobrPeer::EJECANOANT;
      }
  
	} 
	
	public function setEjecanovig($v)
	{

    if ($this->ejecanovig !== $v) {
        $this->ejecanovig = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpreobrPeer::EJECANOVIG;
      }
  
	} 
	
	public function setEstanopost($v)
	{

    if ($this->estanopost !== $v) {
        $this->estanopost = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpreobrPeer::ESTANOPOST;
      }
  
	} 
	
	public function setNomparegr($v)
	{

    if ($this->nomparegr !== $v) {
        $this->nomparegr = $v;
        $this->modifiedColumns[] = ForpreobrPeer::NOMPAREGR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForpreobrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codobr = $rs->getString($startcol + 1);

      $this->codparegr = $rs->getString($startcol + 2);

      $this->monpre = $rs->getFloat($startcol + 3);

      $this->codtip = $rs->getString($startcol + 4);

      $this->observ = $rs->getString($startcol + 5);

      $this->codfin = $rs->getString($startcol + 6);

      $this->funcionario = $rs->getString($startcol + 7);

      $this->fecini = $rs->getDate($startcol + 8, null);

      $this->fecfin = $rs->getDate($startcol + 9, null);

      $this->situacion = $rs->getString($startcol + 10);

      $this->comproanoant = $rs->getFloat($startcol + 11);

      $this->comprovig = $rs->getFloat($startcol + 12);

      $this->ejecanoant = $rs->getFloat($startcol + 13);

      $this->ejecanovig = $rs->getFloat($startcol + 14);

      $this->estanopost = $rs->getFloat($startcol + 15);

      $this->nomparegr = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forpreobr object", $e);
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
			$con = Propel::getConnection(ForpreobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForpreobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForpreobrPeer::DATABASE_NAME);
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
					$pk = ForpreobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForpreobrPeer::doUpdate($this, $con);
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


			if (($retval = ForpreobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpreobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodobr();
				break;
			case 2:
				return $this->getCodparegr();
				break;
			case 3:
				return $this->getMonpre();
				break;
			case 4:
				return $this->getCodtip();
				break;
			case 5:
				return $this->getObserv();
				break;
			case 6:
				return $this->getCodfin();
				break;
			case 7:
				return $this->getFuncionario();
				break;
			case 8:
				return $this->getFecini();
				break;
			case 9:
				return $this->getFecfin();
				break;
			case 10:
				return $this->getSituacion();
				break;
			case 11:
				return $this->getComproanoant();
				break;
			case 12:
				return $this->getComprovig();
				break;
			case 13:
				return $this->getEjecanoant();
				break;
			case 14:
				return $this->getEjecanovig();
				break;
			case 15:
				return $this->getEstanopost();
				break;
			case 16:
				return $this->getNomparegr();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForpreobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodobr(),
			$keys[2] => $this->getCodparegr(),
			$keys[3] => $this->getMonpre(),
			$keys[4] => $this->getCodtip(),
			$keys[5] => $this->getObserv(),
			$keys[6] => $this->getCodfin(),
			$keys[7] => $this->getFuncionario(),
			$keys[8] => $this->getFecini(),
			$keys[9] => $this->getFecfin(),
			$keys[10] => $this->getSituacion(),
			$keys[11] => $this->getComproanoant(),
			$keys[12] => $this->getComprovig(),
			$keys[13] => $this->getEjecanoant(),
			$keys[14] => $this->getEjecanovig(),
			$keys[15] => $this->getEstanopost(),
			$keys[16] => $this->getNomparegr(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpreobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodobr($value);
				break;
			case 2:
				$this->setCodparegr($value);
				break;
			case 3:
				$this->setMonpre($value);
				break;
			case 4:
				$this->setCodtip($value);
				break;
			case 5:
				$this->setObserv($value);
				break;
			case 6:
				$this->setCodfin($value);
				break;
			case 7:
				$this->setFuncionario($value);
				break;
			case 8:
				$this->setFecini($value);
				break;
			case 9:
				$this->setFecfin($value);
				break;
			case 10:
				$this->setSituacion($value);
				break;
			case 11:
				$this->setComproanoant($value);
				break;
			case 12:
				$this->setComprovig($value);
				break;
			case 13:
				$this->setEjecanoant($value);
				break;
			case 14:
				$this->setEjecanovig($value);
				break;
			case 15:
				$this->setEstanopost($value);
				break;
			case 16:
				$this->setNomparegr($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForpreobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodparegr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtip($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObserv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodfin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFuncionario($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecini($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecfin($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSituacion($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setComproanoant($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setComprovig($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEjecanoant($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setEjecanovig($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEstanopost($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNomparegr($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForpreobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForpreobrPeer::CODCAT)) $criteria->add(ForpreobrPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForpreobrPeer::CODOBR)) $criteria->add(ForpreobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(ForpreobrPeer::CODPAREGR)) $criteria->add(ForpreobrPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(ForpreobrPeer::MONPRE)) $criteria->add(ForpreobrPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(ForpreobrPeer::CODTIP)) $criteria->add(ForpreobrPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(ForpreobrPeer::OBSERV)) $criteria->add(ForpreobrPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(ForpreobrPeer::CODFIN)) $criteria->add(ForpreobrPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(ForpreobrPeer::FUNCIONARIO)) $criteria->add(ForpreobrPeer::FUNCIONARIO, $this->funcionario);
		if ($this->isColumnModified(ForpreobrPeer::FECINI)) $criteria->add(ForpreobrPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(ForpreobrPeer::FECFIN)) $criteria->add(ForpreobrPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(ForpreobrPeer::SITUACION)) $criteria->add(ForpreobrPeer::SITUACION, $this->situacion);
		if ($this->isColumnModified(ForpreobrPeer::COMPROANOANT)) $criteria->add(ForpreobrPeer::COMPROANOANT, $this->comproanoant);
		if ($this->isColumnModified(ForpreobrPeer::COMPROVIG)) $criteria->add(ForpreobrPeer::COMPROVIG, $this->comprovig);
		if ($this->isColumnModified(ForpreobrPeer::EJECANOANT)) $criteria->add(ForpreobrPeer::EJECANOANT, $this->ejecanoant);
		if ($this->isColumnModified(ForpreobrPeer::EJECANOVIG)) $criteria->add(ForpreobrPeer::EJECANOVIG, $this->ejecanovig);
		if ($this->isColumnModified(ForpreobrPeer::ESTANOPOST)) $criteria->add(ForpreobrPeer::ESTANOPOST, $this->estanopost);
		if ($this->isColumnModified(ForpreobrPeer::NOMPAREGR)) $criteria->add(ForpreobrPeer::NOMPAREGR, $this->nomparegr);
		if ($this->isColumnModified(ForpreobrPeer::ID)) $criteria->add(ForpreobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForpreobrPeer::DATABASE_NAME);

		$criteria->add(ForpreobrPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setFuncionario($this->funcionario);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setSituacion($this->situacion);

		$copyObj->setComproanoant($this->comproanoant);

		$copyObj->setComprovig($this->comprovig);

		$copyObj->setEjecanoant($this->ejecanoant);

		$copyObj->setEjecanovig($this->ejecanovig);

		$copyObj->setEstanopost($this->estanopost);

		$copyObj->setNomparegr($this->nomparegr);


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
			self::$peer = new ForpreobrPeer();
		}
		return self::$peer;
	}

} 