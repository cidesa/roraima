<?php


abstract class BaseTsrelfonvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $numche;


	
	protected $numcue;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $monche;


	
	protected $codcat;


	
	protected $fecemi;


	
	protected $codpre;


	
	protected $numdep;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getMonche($val=false)
  {

    if($val) return number_format($this->monche,2,',','.');
    else return $this->monche;

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::NUMSOL;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::NUMCHE;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::NUMCUE;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::NOMBEN;
      }
  
	} 
	
	public function setMonche($v)
	{

    if ($this->monche !== $v) {
        $this->monche = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsrelfonviaPeer::MONCHE;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::CODCAT;
      }
  
	} 
	
	public function setFecemi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = TsrelfonviaPeer::FECEMI;
    }

	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::CODPRE;
      }
  
	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::NUMDEP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsrelfonviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->numche = $rs->getString($startcol + 1);

      $this->numcue = $rs->getString($startcol + 2);

      $this->cedrif = $rs->getString($startcol + 3);

      $this->nomben = $rs->getString($startcol + 4);

      $this->monche = $rs->getFloat($startcol + 5);

      $this->codcat = $rs->getString($startcol + 6);

      $this->fecemi = $rs->getDate($startcol + 7, null);

      $this->codpre = $rs->getString($startcol + 8);

      $this->numdep = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsrelfonvia object", $e);
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
			$con = Propel::getConnection(TsrelfonviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsrelfonviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsrelfonviaPeer::DATABASE_NAME);
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
					$pk = TsrelfonviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsrelfonviaPeer::doUpdate($this, $con);
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


			if (($retval = TsrelfonviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsrelfonviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getNumche();
				break;
			case 2:
				return $this->getNumcue();
				break;
			case 3:
				return $this->getCedrif();
				break;
			case 4:
				return $this->getNomben();
				break;
			case 5:
				return $this->getMonche();
				break;
			case 6:
				return $this->getCodcat();
				break;
			case 7:
				return $this->getFecemi();
				break;
			case 8:
				return $this->getCodpre();
				break;
			case 9:
				return $this->getNumdep();
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
		$keys = TsrelfonviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getNumche(),
			$keys[2] => $this->getNumcue(),
			$keys[3] => $this->getCedrif(),
			$keys[4] => $this->getNomben(),
			$keys[5] => $this->getMonche(),
			$keys[6] => $this->getCodcat(),
			$keys[7] => $this->getFecemi(),
			$keys[8] => $this->getCodpre(),
			$keys[9] => $this->getNumdep(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsrelfonviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setNumche($value);
				break;
			case 2:
				$this->setNumcue($value);
				break;
			case 3:
				$this->setCedrif($value);
				break;
			case 4:
				$this->setNomben($value);
				break;
			case 5:
				$this->setMonche($value);
				break;
			case 6:
				$this->setCodcat($value);
				break;
			case 7:
				$this->setFecemi($value);
				break;
			case 8:
				$this->setCodpre($value);
				break;
			case 9:
				$this->setNumdep($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsrelfonviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumche($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedrif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonche($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecemi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumdep($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsrelfonviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsrelfonviaPeer::NUMSOL)) $criteria->add(TsrelfonviaPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(TsrelfonviaPeer::NUMCHE)) $criteria->add(TsrelfonviaPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TsrelfonviaPeer::NUMCUE)) $criteria->add(TsrelfonviaPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsrelfonviaPeer::CEDRIF)) $criteria->add(TsrelfonviaPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TsrelfonviaPeer::NOMBEN)) $criteria->add(TsrelfonviaPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(TsrelfonviaPeer::MONCHE)) $criteria->add(TsrelfonviaPeer::MONCHE, $this->monche);
		if ($this->isColumnModified(TsrelfonviaPeer::CODCAT)) $criteria->add(TsrelfonviaPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(TsrelfonviaPeer::FECEMI)) $criteria->add(TsrelfonviaPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(TsrelfonviaPeer::CODPRE)) $criteria->add(TsrelfonviaPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(TsrelfonviaPeer::NUMDEP)) $criteria->add(TsrelfonviaPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(TsrelfonviaPeer::ID)) $criteria->add(TsrelfonviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsrelfonviaPeer::DATABASE_NAME);

		$criteria->add(TsrelfonviaPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumche($this->numche);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setMonche($this->monche);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNumdep($this->numdep);


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
			self::$peer = new TsrelfonviaPeer();
		}
		return self::$peer;
	}

} 