<?php


abstract class BaseLipliepub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $medio;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $dias;


	
	protected $pagina;


	
	protected $cuerpo;


	
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
  
  public function getMedio()
  {

    return trim($this->medio);

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

  
  public function getDias()
  {

    return $this->dias;

  }
  
  public function getPagina()
  {

    return trim($this->pagina);

  }
  
  public function getCuerpo()
  {

    return trim($this->cuerpo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LipliepubPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LipliepubPeer::NUMEXP;
      }
  
	} 
	
	public function setMedio($v)
	{

    if ($this->medio !== $v) {
        $this->medio = $v;
        $this->modifiedColumns[] = LipliepubPeer::MEDIO;
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
      $this->modifiedColumns[] = LipliepubPeer::FECINI;
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
      $this->modifiedColumns[] = LipliepubPeer::FECFIN;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LipliepubPeer::DIAS;
      }
  
	} 
	
	public function setPagina($v)
	{

    if ($this->pagina !== $v) {
        $this->pagina = $v;
        $this->modifiedColumns[] = LipliepubPeer::PAGINA;
      }
  
	} 
	
	public function setCuerpo($v)
	{

    if ($this->cuerpo !== $v) {
        $this->cuerpo = $v;
        $this->modifiedColumns[] = LipliepubPeer::CUERPO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LipliepubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->medio = $rs->getString($startcol + 2);

      $this->fecini = $rs->getDate($startcol + 3, null);

      $this->fecfin = $rs->getDate($startcol + 4, null);

      $this->dias = $rs->getInt($startcol + 5);

      $this->pagina = $rs->getString($startcol + 6);

      $this->cuerpo = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lipliepub object", $e);
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
			$con = Propel::getConnection(LipliepubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LipliepubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LipliepubPeer::DATABASE_NAME);
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
					$pk = LipliepubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LipliepubPeer::doUpdate($this, $con);
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


			if (($retval = LipliepubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliepubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMedio();
				break;
			case 3:
				return $this->getFecini();
				break;
			case 4:
				return $this->getFecfin();
				break;
			case 5:
				return $this->getDias();
				break;
			case 6:
				return $this->getPagina();
				break;
			case 7:
				return $this->getCuerpo();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliepubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getMedio(),
			$keys[3] => $this->getFecini(),
			$keys[4] => $this->getFecfin(),
			$keys[5] => $this->getDias(),
			$keys[6] => $this->getPagina(),
			$keys[7] => $this->getCuerpo(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliepubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setMedio($value);
				break;
			case 3:
				$this->setFecini($value);
				break;
			case 4:
				$this->setFecfin($value);
				break;
			case 5:
				$this->setDias($value);
				break;
			case 6:
				$this->setPagina($value);
				break;
			case 7:
				$this->setCuerpo($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliepubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMedio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDias($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPagina($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCuerpo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LipliepubPeer::DATABASE_NAME);

		if ($this->isColumnModified(LipliepubPeer::NUMPLIE)) $criteria->add(LipliepubPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LipliepubPeer::NUMEXP)) $criteria->add(LipliepubPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LipliepubPeer::MEDIO)) $criteria->add(LipliepubPeer::MEDIO, $this->medio);
		if ($this->isColumnModified(LipliepubPeer::FECINI)) $criteria->add(LipliepubPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(LipliepubPeer::FECFIN)) $criteria->add(LipliepubPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(LipliepubPeer::DIAS)) $criteria->add(LipliepubPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LipliepubPeer::PAGINA)) $criteria->add(LipliepubPeer::PAGINA, $this->pagina);
		if ($this->isColumnModified(LipliepubPeer::CUERPO)) $criteria->add(LipliepubPeer::CUERPO, $this->cuerpo);
		if ($this->isColumnModified(LipliepubPeer::ID)) $criteria->add(LipliepubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LipliepubPeer::DATABASE_NAME);

		$criteria->add(LipliepubPeer::ID, $this->id);

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

		$copyObj->setMedio($this->medio);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setDias($this->dias);

		$copyObj->setPagina($this->pagina);

		$copyObj->setCuerpo($this->cuerpo);


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
			self::$peer = new LipliepubPeer();
		}
		return self::$peer;
	}

} 