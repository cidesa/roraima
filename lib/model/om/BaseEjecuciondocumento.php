<?php


abstract class BaseEjecuciondocumento extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipo;


	
	protected $refdoc;


	
	protected $fecdoc;


	
	protected $staimp;


	
	protected $fecanu;


	
	protected $refere;


	
	protected $codpre;


	
	protected $monprc = 0;


	
	protected $monajuprc = 0;


	
	protected $moncom = 0;


	
	protected $monajucom = 0;


	
	protected $moncau = 0;


	
	protected $monajucau = 0;


	
	protected $monpag = 0;


	
	protected $monajupag = 0;


	
	protected $tipdoc;


	
	protected $desdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getFecdoc($format = 'Y-m-d')
  {

    if ($this->fecdoc === null || $this->fecdoc === '') {
      return null;
    } elseif (!is_int($this->fecdoc)) {
            $ts = adodb_strtotime($this->fecdoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdoc] as date/time value: " . var_export($this->fecdoc, true));
      }
    } else {
      $ts = $this->fecdoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStaimp()
  {

    return trim($this->staimp);

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

  
  public function getRefere()
  {

    return trim($this->refere);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonprc($val=false)
  {

    if($val) return number_format($this->monprc,2,',','.');
    else return $this->monprc;

  }
  
  public function getMonajuprc($val=false)
  {

    if($val) return number_format($this->monajuprc,2,',','.');
    else return $this->monajuprc;

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getMonajucom($val=false)
  {

    if($val) return number_format($this->monajucom,2,',','.');
    else return $this->monajucom;

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getMonajucau($val=false)
  {

    if($val) return number_format($this->monajucau,2,',','.');
    else return $this->monajucau;

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getMonajupag($val=false)
  {

    if($val) return number_format($this->monajupag,2,',','.');
    else return $this->monajupag;

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getDesdoc()
  {

    return trim($this->desdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::TIPO;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::REFDOC;
      }
  
	} 
	
	public function setFecdoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdoc !== $ts) {
      $this->fecdoc = $ts;
      $this->modifiedColumns[] = EjecuciondocumentoPeer::FECDOC;
    }

	} 
	
	public function setStaimp($v)
	{

    if ($this->staimp !== $v) {
        $this->staimp = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::STAIMP;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = EjecuciondocumentoPeer::FECANU;
    }

	} 
	
	public function setRefere($v)
	{

    if ($this->refere !== $v) {
        $this->refere = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::REFERE;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::CODPRE;
      }
  
	} 
	
	public function setMonprc($v)
	{

    if ($this->monprc !== $v || $v === 0) {
        $this->monprc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONPRC;
      }
  
	} 
	
	public function setMonajuprc($v)
	{

    if ($this->monajuprc !== $v || $v === 0) {
        $this->monajuprc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONAJUPRC;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v || $v === 0) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONCOM;
      }
  
	} 
	
	public function setMonajucom($v)
	{

    if ($this->monajucom !== $v || $v === 0) {
        $this->monajucom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONAJUCOM;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v || $v === 0) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONCAU;
      }
  
	} 
	
	public function setMonajucau($v)
	{

    if ($this->monajucau !== $v || $v === 0) {
        $this->monajucau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONAJUCAU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v || $v === 0) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONPAG;
      }
  
	} 
	
	public function setMonajupag($v)
	{

    if ($this->monajupag !== $v || $v === 0) {
        $this->monajupag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = EjecuciondocumentoPeer::MONAJUPAG;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::TIPDOC;
      }
  
	} 
	
	public function setDesdoc($v)
	{

    if ($this->desdoc !== $v) {
        $this->desdoc = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::DESDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = EjecuciondocumentoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipo = $rs->getString($startcol + 0);

      $this->refdoc = $rs->getString($startcol + 1);

      $this->fecdoc = $rs->getDate($startcol + 2, null);

      $this->staimp = $rs->getString($startcol + 3);

      $this->fecanu = $rs->getDate($startcol + 4, null);

      $this->refere = $rs->getString($startcol + 5);

      $this->codpre = $rs->getString($startcol + 6);

      $this->monprc = $rs->getFloat($startcol + 7);

      $this->monajuprc = $rs->getFloat($startcol + 8);

      $this->moncom = $rs->getFloat($startcol + 9);

      $this->monajucom = $rs->getFloat($startcol + 10);

      $this->moncau = $rs->getFloat($startcol + 11);

      $this->monajucau = $rs->getFloat($startcol + 12);

      $this->monpag = $rs->getFloat($startcol + 13);

      $this->monajupag = $rs->getFloat($startcol + 14);

      $this->tipdoc = $rs->getString($startcol + 15);

      $this->desdoc = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ejecuciondocumento object", $e);
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
			$con = Propel::getConnection(EjecuciondocumentoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EjecuciondocumentoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EjecuciondocumentoPeer::DATABASE_NAME);
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
					$pk = EjecuciondocumentoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EjecuciondocumentoPeer::doUpdate($this, $con);
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


			if (($retval = EjecuciondocumentoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EjecuciondocumentoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipo();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getFecdoc();
				break;
			case 3:
				return $this->getStaimp();
				break;
			case 4:
				return $this->getFecanu();
				break;
			case 5:
				return $this->getRefere();
				break;
			case 6:
				return $this->getCodpre();
				break;
			case 7:
				return $this->getMonprc();
				break;
			case 8:
				return $this->getMonajuprc();
				break;
			case 9:
				return $this->getMoncom();
				break;
			case 10:
				return $this->getMonajucom();
				break;
			case 11:
				return $this->getMoncau();
				break;
			case 12:
				return $this->getMonajucau();
				break;
			case 13:
				return $this->getMonpag();
				break;
			case 14:
				return $this->getMonajupag();
				break;
			case 15:
				return $this->getTipdoc();
				break;
			case 16:
				return $this->getDesdoc();
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
		$keys = EjecuciondocumentoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipo(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getFecdoc(),
			$keys[3] => $this->getStaimp(),
			$keys[4] => $this->getFecanu(),
			$keys[5] => $this->getRefere(),
			$keys[6] => $this->getCodpre(),
			$keys[7] => $this->getMonprc(),
			$keys[8] => $this->getMonajuprc(),
			$keys[9] => $this->getMoncom(),
			$keys[10] => $this->getMonajucom(),
			$keys[11] => $this->getMoncau(),
			$keys[12] => $this->getMonajucau(),
			$keys[13] => $this->getMonpag(),
			$keys[14] => $this->getMonajupag(),
			$keys[15] => $this->getTipdoc(),
			$keys[16] => $this->getDesdoc(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EjecuciondocumentoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipo($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setFecdoc($value);
				break;
			case 3:
				$this->setStaimp($value);
				break;
			case 4:
				$this->setFecanu($value);
				break;
			case 5:
				$this->setRefere($value);
				break;
			case 6:
				$this->setCodpre($value);
				break;
			case 7:
				$this->setMonprc($value);
				break;
			case 8:
				$this->setMonajuprc($value);
				break;
			case 9:
				$this->setMoncom($value);
				break;
			case 10:
				$this->setMonajucom($value);
				break;
			case 11:
				$this->setMoncau($value);
				break;
			case 12:
				$this->setMonajucau($value);
				break;
			case 13:
				$this->setMonpag($value);
				break;
			case 14:
				$this->setMonajupag($value);
				break;
			case 15:
				$this->setTipdoc($value);
				break;
			case 16:
				$this->setDesdoc($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EjecuciondocumentoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecdoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStaimp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecanu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefere($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonprc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonajuprc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMoncom($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonajucom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMoncau($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonajucau($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonpag($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMonajupag($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipdoc($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDesdoc($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EjecuciondocumentoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EjecuciondocumentoPeer::TIPO)) $criteria->add(EjecuciondocumentoPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(EjecuciondocumentoPeer::REFDOC)) $criteria->add(EjecuciondocumentoPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(EjecuciondocumentoPeer::FECDOC)) $criteria->add(EjecuciondocumentoPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(EjecuciondocumentoPeer::STAIMP)) $criteria->add(EjecuciondocumentoPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(EjecuciondocumentoPeer::FECANU)) $criteria->add(EjecuciondocumentoPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(EjecuciondocumentoPeer::REFERE)) $criteria->add(EjecuciondocumentoPeer::REFERE, $this->refere);
		if ($this->isColumnModified(EjecuciondocumentoPeer::CODPRE)) $criteria->add(EjecuciondocumentoPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONPRC)) $criteria->add(EjecuciondocumentoPeer::MONPRC, $this->monprc);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONAJUPRC)) $criteria->add(EjecuciondocumentoPeer::MONAJUPRC, $this->monajuprc);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONCOM)) $criteria->add(EjecuciondocumentoPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONAJUCOM)) $criteria->add(EjecuciondocumentoPeer::MONAJUCOM, $this->monajucom);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONCAU)) $criteria->add(EjecuciondocumentoPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONAJUCAU)) $criteria->add(EjecuciondocumentoPeer::MONAJUCAU, $this->monajucau);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONPAG)) $criteria->add(EjecuciondocumentoPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(EjecuciondocumentoPeer::MONAJUPAG)) $criteria->add(EjecuciondocumentoPeer::MONAJUPAG, $this->monajupag);
		if ($this->isColumnModified(EjecuciondocumentoPeer::TIPDOC)) $criteria->add(EjecuciondocumentoPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(EjecuciondocumentoPeer::DESDOC)) $criteria->add(EjecuciondocumentoPeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(EjecuciondocumentoPeer::ID)) $criteria->add(EjecuciondocumentoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EjecuciondocumentoPeer::DATABASE_NAME);

		$criteria->add(EjecuciondocumentoPeer::ID, $this->id);

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

		$copyObj->setTipo($this->tipo);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setStaimp($this->staimp);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setRefere($this->refere);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonprc($this->monprc);

		$copyObj->setMonajuprc($this->monajuprc);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setMonajucom($this->monajucom);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMonajucau($this->monajucau);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonajupag($this->monajupag);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setDesdoc($this->desdoc);


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
			self::$peer = new EjecuciondocumentoPeer();
		}
		return self::$peer;
	}

} 