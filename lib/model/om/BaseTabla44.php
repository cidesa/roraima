<?php


abstract class BaseTabla44 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $descta;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $salant;


	
	protected $debcre;


	
	protected $cargab;


	
	protected $salprgper;


	
	protected $salacuper;


	
	protected $salprgperfor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getDescta()
  {

    return trim($this->descta);

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

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getSalant($val=false)
  {

    if($val) return number_format($this->salant,2,',','.');
    else return $this->salant;

  }
  
  public function getDebcre()
  {

    return trim($this->debcre);

  }
  
  public function getCargab()
  {

    return trim($this->cargab);

  }
  
  public function getSalprgper($val=false)
  {

    if($val) return number_format($this->salprgper,2,',','.');
    else return $this->salprgper;

  }
  
  public function getSalacuper($val=false)
  {

    if($val) return number_format($this->salacuper,2,',','.');
    else return $this->salacuper;

  }
  
  public function getSalprgperfor($val=false)
  {

    if($val) return number_format($this->salprgperfor,2,',','.');
    else return $this->salprgperfor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = Tabla44Peer::CODCTA;
      }
  
	} 
	
	public function setDescta($v)
	{

    if ($this->descta !== $v) {
        $this->descta = $v;
        $this->modifiedColumns[] = Tabla44Peer::DESCTA;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = Tabla44Peer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = Tabla44Peer::FECCIE;
    }

	} 
	
	public function setSalant($v)
	{

    if ($this->salant !== $v) {
        $this->salant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla44Peer::SALANT;
      }
  
	} 
	
	public function setDebcre($v)
	{

    if ($this->debcre !== $v) {
        $this->debcre = $v;
        $this->modifiedColumns[] = Tabla44Peer::DEBCRE;
      }
  
	} 
	
	public function setCargab($v)
	{

    if ($this->cargab !== $v) {
        $this->cargab = $v;
        $this->modifiedColumns[] = Tabla44Peer::CARGAB;
      }
  
	} 
	
	public function setSalprgper($v)
	{

    if ($this->salprgper !== $v) {
        $this->salprgper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla44Peer::SALPRGPER;
      }
  
	} 
	
	public function setSalacuper($v)
	{

    if ($this->salacuper !== $v) {
        $this->salacuper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla44Peer::SALACUPER;
      }
  
	} 
	
	public function setSalprgperfor($v)
	{

    if ($this->salprgperfor !== $v) {
        $this->salprgperfor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla44Peer::SALPRGPERFOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla44Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcta = $rs->getString($startcol + 0);

      $this->descta = $rs->getString($startcol + 1);

      $this->fecini = $rs->getDate($startcol + 2, null);

      $this->feccie = $rs->getDate($startcol + 3, null);

      $this->salant = $rs->getFloat($startcol + 4);

      $this->debcre = $rs->getString($startcol + 5);

      $this->cargab = $rs->getString($startcol + 6);

      $this->salprgper = $rs->getFloat($startcol + 7);

      $this->salacuper = $rs->getFloat($startcol + 8);

      $this->salprgperfor = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla44 object", $e);
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
			$con = Propel::getConnection(Tabla44Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla44Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla44Peer::DATABASE_NAME);
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
					$pk = Tabla44Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla44Peer::doUpdate($this, $con);
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


			if (($retval = Tabla44Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla44Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getDescta();
				break;
			case 2:
				return $this->getFecini();
				break;
			case 3:
				return $this->getFeccie();
				break;
			case 4:
				return $this->getSalant();
				break;
			case 5:
				return $this->getDebcre();
				break;
			case 6:
				return $this->getCargab();
				break;
			case 7:
				return $this->getSalprgper();
				break;
			case 8:
				return $this->getSalacuper();
				break;
			case 9:
				return $this->getSalprgperfor();
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
		$keys = Tabla44Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getDescta(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFeccie(),
			$keys[4] => $this->getSalant(),
			$keys[5] => $this->getDebcre(),
			$keys[6] => $this->getCargab(),
			$keys[7] => $this->getSalprgper(),
			$keys[8] => $this->getSalacuper(),
			$keys[9] => $this->getSalprgperfor(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla44Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setDescta($value);
				break;
			case 2:
				$this->setFecini($value);
				break;
			case 3:
				$this->setFeccie($value);
				break;
			case 4:
				$this->setSalant($value);
				break;
			case 5:
				$this->setDebcre($value);
				break;
			case 6:
				$this->setCargab($value);
				break;
			case 7:
				$this->setSalprgper($value);
				break;
			case 8:
				$this->setSalacuper($value);
				break;
			case 9:
				$this->setSalprgperfor($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla44Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccie($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDebcre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCargab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalprgper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalacuper($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalprgperfor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla44Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla44Peer::CODCTA)) $criteria->add(Tabla44Peer::CODCTA, $this->codcta);
		if ($this->isColumnModified(Tabla44Peer::DESCTA)) $criteria->add(Tabla44Peer::DESCTA, $this->descta);
		if ($this->isColumnModified(Tabla44Peer::FECINI)) $criteria->add(Tabla44Peer::FECINI, $this->fecini);
		if ($this->isColumnModified(Tabla44Peer::FECCIE)) $criteria->add(Tabla44Peer::FECCIE, $this->feccie);
		if ($this->isColumnModified(Tabla44Peer::SALANT)) $criteria->add(Tabla44Peer::SALANT, $this->salant);
		if ($this->isColumnModified(Tabla44Peer::DEBCRE)) $criteria->add(Tabla44Peer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(Tabla44Peer::CARGAB)) $criteria->add(Tabla44Peer::CARGAB, $this->cargab);
		if ($this->isColumnModified(Tabla44Peer::SALPRGPER)) $criteria->add(Tabla44Peer::SALPRGPER, $this->salprgper);
		if ($this->isColumnModified(Tabla44Peer::SALACUPER)) $criteria->add(Tabla44Peer::SALACUPER, $this->salacuper);
		if ($this->isColumnModified(Tabla44Peer::SALPRGPERFOR)) $criteria->add(Tabla44Peer::SALPRGPERFOR, $this->salprgperfor);
		if ($this->isColumnModified(Tabla44Peer::ID)) $criteria->add(Tabla44Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla44Peer::DATABASE_NAME);

		$criteria->add(Tabla44Peer::ID, $this->id);

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

		$copyObj->setCodcta($this->codcta);

		$copyObj->setDescta($this->descta);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setSalant($this->salant);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCargab($this->cargab);

		$copyObj->setSalprgper($this->salprgper);

		$copyObj->setSalacuper($this->salacuper);

		$copyObj->setSalprgperfor($this->salprgperfor);


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
			self::$peer = new Tabla44Peer();
		}
		return self::$peer;
	}

} 