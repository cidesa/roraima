<?php


abstract class BaseLiaclara extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $numacla;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $detpre;


	
	protected $fecpre;


	
	protected $detres;


	
	protected $fecres;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $codpro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getNumacla()
  {

    return trim($this->numacla);

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

  
  public function getDetpre()
  {

    return trim($this->detpre);

  }
  
  public function getFecpre($format = 'Y-m-d')
  {

    if ($this->fecpre === null || $this->fecpre === '') {
      return null;
    } elseif (!is_int($this->fecpre)) {
            $ts = adodb_strtotime($this->fecpre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
      }
    } else {
      $ts = $this->fecpre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDetres()
  {

    return trim($this->detres);

  }
  
  public function getFecres($format = 'Y-m-d')
  {

    if ($this->fecres === null || $this->fecres === '') {
      return null;
    } elseif (!is_int($this->fecres)) {
            $ts = adodb_strtotime($this->fecres);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
      }
    } else {
      $ts = $this->fecres;
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
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LiaclaraPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LiaclaraPeer::NUMEXP;
      }
  
	} 
	
	public function setNumacla($v)
	{

    if ($this->numacla !== $v) {
        $this->numacla = $v;
        $this->modifiedColumns[] = LiaclaraPeer::NUMACLA;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiaclaraPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiaclaraPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiaclaraPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiaclaraPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiaclaraPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiaclaraPeer::DIAS;
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
      $this->modifiedColumns[] = LiaclaraPeer::FECVEN;
    }

	} 
	
	public function setDetpre($v)
	{

    if ($this->detpre !== $v) {
        $this->detpre = $v;
        $this->modifiedColumns[] = LiaclaraPeer::DETPRE;
      }
  
	} 
	
	public function setFecpre($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpre !== $ts) {
      $this->fecpre = $ts;
      $this->modifiedColumns[] = LiaclaraPeer::FECPRE;
    }

	} 
	
	public function setDetres($v)
	{

    if ($this->detres !== $v) {
        $this->detres = $v;
        $this->modifiedColumns[] = LiaclaraPeer::DETRES;
      }
  
	} 
	
	public function setFecres($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = LiaclaraPeer::FECRES;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiaclaraPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiaclaraPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiaclaraPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiaclaraPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LiaclaraPeer::CARGOPRE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LiaclaraPeer::CODPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiaclaraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->numacla = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->detpre = $rs->getString($startcol + 10);

      $this->fecpre = $rs->getDate($startcol + 11, null);

      $this->detres = $rs->getString($startcol + 12);

      $this->fecres = $rs->getDate($startcol + 13, null);

      $this->docane1 = $rs->getString($startcol + 14);

      $this->docane2 = $rs->getString($startcol + 15);

      $this->docane3 = $rs->getString($startcol + 16);

      $this->prepor = $rs->getString($startcol + 17);

      $this->cargopre = $rs->getString($startcol + 18);

      $this->codpro = $rs->getString($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liaclara object", $e);
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
			$con = Propel::getConnection(LiaclaraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiaclaraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiaclaraPeer::DATABASE_NAME);
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
					$pk = LiaclaraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiaclaraPeer::doUpdate($this, $con);
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


			if (($retval = LiaclaraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiaclaraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getNumacla();
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
				return $this->getDetpre();
				break;
			case 11:
				return $this->getFecpre();
				break;
			case 12:
				return $this->getDetres();
				break;
			case 13:
				return $this->getFecres();
				break;
			case 14:
				return $this->getDocane1();
				break;
			case 15:
				return $this->getDocane2();
				break;
			case 16:
				return $this->getDocane3();
				break;
			case 17:
				return $this->getPrepor();
				break;
			case 18:
				return $this->getCargopre();
				break;
			case 19:
				return $this->getCodpro();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiaclaraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getNumacla(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getDetpre(),
			$keys[11] => $this->getFecpre(),
			$keys[12] => $this->getDetres(),
			$keys[13] => $this->getFecres(),
			$keys[14] => $this->getDocane1(),
			$keys[15] => $this->getDocane2(),
			$keys[16] => $this->getDocane3(),
			$keys[17] => $this->getPrepor(),
			$keys[18] => $this->getCargopre(),
			$keys[19] => $this->getCodpro(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiaclaraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setNumacla($value);
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
				$this->setDetpre($value);
				break;
			case 11:
				$this->setFecpre($value);
				break;
			case 12:
				$this->setDetres($value);
				break;
			case 13:
				$this->setFecres($value);
				break;
			case 14:
				$this->setDocane1($value);
				break;
			case 15:
				$this->setDocane2($value);
				break;
			case 16:
				$this->setDocane3($value);
				break;
			case 17:
				$this->setPrepor($value);
				break;
			case 18:
				$this->setCargopre($value);
				break;
			case 19:
				$this->setCodpro($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiaclaraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumacla($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDetpre($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecpre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDetres($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecres($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDocane1($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDocane2($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDocane3($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPrepor($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCargopre($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodpro($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiaclaraPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiaclaraPeer::NUMPLIE)) $criteria->add(LiaclaraPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LiaclaraPeer::NUMEXP)) $criteria->add(LiaclaraPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LiaclaraPeer::NUMACLA)) $criteria->add(LiaclaraPeer::NUMACLA, $this->numacla);
		if ($this->isColumnModified(LiaclaraPeer::CODEMPADM)) $criteria->add(LiaclaraPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiaclaraPeer::CODUNIADM)) $criteria->add(LiaclaraPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiaclaraPeer::CODEMPEJE)) $criteria->add(LiaclaraPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiaclaraPeer::CODUNISTE)) $criteria->add(LiaclaraPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiaclaraPeer::FECREG)) $criteria->add(LiaclaraPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiaclaraPeer::DIAS)) $criteria->add(LiaclaraPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiaclaraPeer::FECVEN)) $criteria->add(LiaclaraPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiaclaraPeer::DETPRE)) $criteria->add(LiaclaraPeer::DETPRE, $this->detpre);
		if ($this->isColumnModified(LiaclaraPeer::FECPRE)) $criteria->add(LiaclaraPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(LiaclaraPeer::DETRES)) $criteria->add(LiaclaraPeer::DETRES, $this->detres);
		if ($this->isColumnModified(LiaclaraPeer::FECRES)) $criteria->add(LiaclaraPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(LiaclaraPeer::DOCANE1)) $criteria->add(LiaclaraPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiaclaraPeer::DOCANE2)) $criteria->add(LiaclaraPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiaclaraPeer::DOCANE3)) $criteria->add(LiaclaraPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiaclaraPeer::PREPOR)) $criteria->add(LiaclaraPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiaclaraPeer::CARGOPRE)) $criteria->add(LiaclaraPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LiaclaraPeer::CODPRO)) $criteria->add(LiaclaraPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LiaclaraPeer::ID)) $criteria->add(LiaclaraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiaclaraPeer::DATABASE_NAME);

		$criteria->add(LiaclaraPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setNumacla($this->numacla);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setDetpre($this->detpre);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setDetres($this->detres);

		$copyObj->setFecres($this->fecres);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setCodpro($this->codpro);


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
			self::$peer = new LiaclaraPeer();
		}
		return self::$peer;
	}

} 