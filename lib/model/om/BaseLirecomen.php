<?php


abstract class BaseLirecomen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrecofe;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $cargoana;


	
	protected $status;


	
	protected $recomen;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumrecofe()
  {

    return trim($this->numrecofe);

  }
  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDias()
  {

    return $this->dias;

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getCargoana()
  {

    return trim($this->cargoana);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getRecomen()
  {

    return trim($this->recomen);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumrecofe($v)
	{

    if ($this->numrecofe !== $v) {
        $this->numrecofe = $v;
        $this->modifiedColumns[] = LirecomenPeer::NUMRECOFE;
      }
  
	} 
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LirecomenPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LirecomenPeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LirecomenPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LirecomenPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LirecomenPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LirecomenPeer::CODUNISTE;
      }
  
	} 
	
	public function setFecreg($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = LirecomenPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LirecomenPeer::DIAS;
      }
  
	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = LirecomenPeer::FECVEN;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LirecomenPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LirecomenPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LirecomenPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LirecomenPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LirecomenPeer::CARGOPRE;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LirecomenPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LirecomenPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LirecomenPeer::ANAPOR;
      }
  
	} 
	
	public function setCargoana($v)
	{

    if ($this->cargoana !== $v) {
        $this->cargoana = $v;
        $this->modifiedColumns[] = LirecomenPeer::CARGOANA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LirecomenPeer::STATUS;
      }
  
	} 
	
	public function setRecomen($v)
	{

    if ($this->recomen !== $v) {
        $this->recomen = $v;
        $this->modifiedColumns[] = LirecomenPeer::RECOMEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LirecomenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numrecofe = $rs->getString($startcol + 0);

      $this->numplie = $rs->getString($startcol + 1);

      $this->numexp = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->docane1 = $rs->getString($startcol + 10);

      $this->docane2 = $rs->getString($startcol + 11);

      $this->docane3 = $rs->getString($startcol + 12);

      $this->prepor = $rs->getString($startcol + 13);

      $this->cargopre = $rs->getString($startcol + 14);

      $this->lisicact_id = $rs->getInt($startcol + 15);

      $this->detdecmod = $rs->getString($startcol + 16);

      $this->anapor = $rs->getString($startcol + 17);

      $this->cargoana = $rs->getString($startcol + 18);

      $this->status = $rs->getString($startcol + 19);

      $this->recomen = $rs->getString($startcol + 20);

      $this->id = $rs->getInt($startcol + 21);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 22; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lirecomen object", $e);
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
			$con = Propel::getConnection(LirecomenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LirecomenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LirecomenPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LirecomenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LirecomenPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LirecomenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LirecomenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrecofe();
				break;
			case 1:
				return $this->getNumplie();
				break;
			case 2:
				return $this->getNumexp();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getFecven();
				break;
			case 10:
				return $this->getDocane1();
				break;
			case 11:
				return $this->getDocane2();
				break;
			case 12:
				return $this->getDocane3();
				break;
			case 13:
				return $this->getPrepor();
				break;
			case 14:
				return $this->getCargopre();
				break;
			case 15:
				return $this->getLisicactId();
				break;
			case 16:
				return $this->getDetdecmod();
				break;
			case 17:
				return $this->getAnapor();
				break;
			case 18:
				return $this->getCargoana();
				break;
			case 19:
				return $this->getStatus();
				break;
			case 20:
				return $this->getRecomen();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LirecomenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrecofe(),
			$keys[1] => $this->getNumplie(),
			$keys[2] => $this->getNumexp(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getDocane1(),
			$keys[11] => $this->getDocane2(),
			$keys[12] => $this->getDocane3(),
			$keys[13] => $this->getPrepor(),
			$keys[14] => $this->getCargopre(),
			$keys[15] => $this->getLisicactId(),
			$keys[16] => $this->getDetdecmod(),
			$keys[17] => $this->getAnapor(),
			$keys[18] => $this->getCargoana(),
			$keys[19] => $this->getStatus(),
			$keys[20] => $this->getRecomen(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LirecomenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrecofe($value);
				break;
			case 1:
				$this->setNumplie($value);
				break;
			case 2:
				$this->setNumexp($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setFecven($value);
				break;
			case 10:
				$this->setDocane1($value);
				break;
			case 11:
				$this->setDocane2($value);
				break;
			case 12:
				$this->setDocane3($value);
				break;
			case 13:
				$this->setPrepor($value);
				break;
			case 14:
				$this->setCargopre($value);
				break;
			case 15:
				$this->setLisicactId($value);
				break;
			case 16:
				$this->setDetdecmod($value);
				break;
			case 17:
				$this->setAnapor($value);
				break;
			case 18:
				$this->setCargoana($value);
				break;
			case 19:
				$this->setStatus($value);
				break;
			case 20:
				$this->setRecomen($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LirecomenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrecofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumplie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDocane1($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDocane2($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDocane3($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPrepor($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCargopre($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setLisicactId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDetdecmod($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAnapor($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCargoana($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setStatus($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setRecomen($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LirecomenPeer::DATABASE_NAME);

		if ($this->isColumnModified(LirecomenPeer::NUMRECOFE)) $criteria->add(LirecomenPeer::NUMRECOFE, $this->numrecofe);
		if ($this->isColumnModified(LirecomenPeer::NUMPLIE)) $criteria->add(LirecomenPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LirecomenPeer::NUMEXP)) $criteria->add(LirecomenPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LirecomenPeer::CODEMPADM)) $criteria->add(LirecomenPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LirecomenPeer::CODUNIADM)) $criteria->add(LirecomenPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LirecomenPeer::CODEMPEJE)) $criteria->add(LirecomenPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LirecomenPeer::CODUNISTE)) $criteria->add(LirecomenPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LirecomenPeer::FECREG)) $criteria->add(LirecomenPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LirecomenPeer::DIAS)) $criteria->add(LirecomenPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LirecomenPeer::FECVEN)) $criteria->add(LirecomenPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LirecomenPeer::DOCANE1)) $criteria->add(LirecomenPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LirecomenPeer::DOCANE2)) $criteria->add(LirecomenPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LirecomenPeer::DOCANE3)) $criteria->add(LirecomenPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LirecomenPeer::PREPOR)) $criteria->add(LirecomenPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LirecomenPeer::CARGOPRE)) $criteria->add(LirecomenPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LirecomenPeer::LISICACT_ID)) $criteria->add(LirecomenPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LirecomenPeer::DETDECMOD)) $criteria->add(LirecomenPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LirecomenPeer::ANAPOR)) $criteria->add(LirecomenPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LirecomenPeer::CARGOANA)) $criteria->add(LirecomenPeer::CARGOANA, $this->cargoana);
		if ($this->isColumnModified(LirecomenPeer::STATUS)) $criteria->add(LirecomenPeer::STATUS, $this->status);
		if ($this->isColumnModified(LirecomenPeer::RECOMEN)) $criteria->add(LirecomenPeer::RECOMEN, $this->recomen);
		if ($this->isColumnModified(LirecomenPeer::ID)) $criteria->add(LirecomenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LirecomenPeer::DATABASE_NAME);

		$criteria->add(LirecomenPeer::ID, $this->id);

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

		$copyObj->setNumrecofe($this->numrecofe);

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setCargoana($this->cargoana);

		$copyObj->setStatus($this->status);

		$copyObj->setRecomen($this->recomen);


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
			self::$peer = new LirecomenPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 