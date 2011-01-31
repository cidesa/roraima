<?php


abstract class BaseOclichis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codlic;


	
	protected $histproc;


	
	protected $periodico;


	
	protected $fecpub;


	
	protected $pagina;


	
	protected $cuerpo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodlic()
  {

    return trim($this->codlic);

  }
  
  public function getHistproc()
  {

    return trim($this->histproc);

  }
  
  public function getPeriodico()
  {

    return trim($this->periodico);

  }
  
  public function getFecpub($format = 'Y-m-d')
  {

    if ($this->fecpub === null || $this->fecpub === '') {
      return null;
    } elseif (!is_int($this->fecpub)) {
            $ts = adodb_strtotime($this->fecpub);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpub] as date/time value: " . var_export($this->fecpub, true));
      }
    } else {
      $ts = $this->fecpub;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = OclichisPeer::CODLIC;
      }
  
	} 
	
	public function setHistproc($v)
	{

    if ($this->histproc !== $v) {
        $this->histproc = $v;
        $this->modifiedColumns[] = OclichisPeer::HISTPROC;
      }
  
	} 
	
	public function setPeriodico($v)
	{

    if ($this->periodico !== $v) {
        $this->periodico = $v;
        $this->modifiedColumns[] = OclichisPeer::PERIODICO;
      }
  
	} 
	
	public function setFecpub($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpub] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpub !== $ts) {
      $this->fecpub = $ts;
      $this->modifiedColumns[] = OclichisPeer::FECPUB;
    }

	} 
	
	public function setPagina($v)
	{

    if ($this->pagina !== $v) {
        $this->pagina = $v;
        $this->modifiedColumns[] = OclichisPeer::PAGINA;
      }
  
	} 
	
	public function setCuerpo($v)
	{

    if ($this->cuerpo !== $v) {
        $this->cuerpo = $v;
        $this->modifiedColumns[] = OclichisPeer::CUERPO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OclichisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codlic = $rs->getString($startcol + 0);

      $this->histproc = $rs->getString($startcol + 1);

      $this->periodico = $rs->getString($startcol + 2);

      $this->fecpub = $rs->getDate($startcol + 3, null);

      $this->pagina = $rs->getString($startcol + 4);

      $this->cuerpo = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Oclichis object", $e);
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
			$con = Propel::getConnection(OclichisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OclichisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OclichisPeer::DATABASE_NAME);
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
					$pk = OclichisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OclichisPeer::doUpdate($this, $con);
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


			if (($retval = OclichisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OclichisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodlic();
				break;
			case 1:
				return $this->getHistproc();
				break;
			case 2:
				return $this->getPeriodico();
				break;
			case 3:
				return $this->getFecpub();
				break;
			case 4:
				return $this->getPagina();
				break;
			case 5:
				return $this->getCuerpo();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OclichisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodlic(),
			$keys[1] => $this->getHistproc(),
			$keys[2] => $this->getPeriodico(),
			$keys[3] => $this->getFecpub(),
			$keys[4] => $this->getPagina(),
			$keys[5] => $this->getCuerpo(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OclichisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodlic($value);
				break;
			case 1:
				$this->setHistproc($value);
				break;
			case 2:
				$this->setPeriodico($value);
				break;
			case 3:
				$this->setFecpub($value);
				break;
			case 4:
				$this->setPagina($value);
				break;
			case 5:
				$this->setCuerpo($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OclichisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodlic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setHistproc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPeriodico($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecpub($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPagina($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCuerpo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OclichisPeer::DATABASE_NAME);

		if ($this->isColumnModified(OclichisPeer::CODLIC)) $criteria->add(OclichisPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(OclichisPeer::HISTPROC)) $criteria->add(OclichisPeer::HISTPROC, $this->histproc);
		if ($this->isColumnModified(OclichisPeer::PERIODICO)) $criteria->add(OclichisPeer::PERIODICO, $this->periodico);
		if ($this->isColumnModified(OclichisPeer::FECPUB)) $criteria->add(OclichisPeer::FECPUB, $this->fecpub);
		if ($this->isColumnModified(OclichisPeer::PAGINA)) $criteria->add(OclichisPeer::PAGINA, $this->pagina);
		if ($this->isColumnModified(OclichisPeer::CUERPO)) $criteria->add(OclichisPeer::CUERPO, $this->cuerpo);
		if ($this->isColumnModified(OclichisPeer::ID)) $criteria->add(OclichisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OclichisPeer::DATABASE_NAME);

		$criteria->add(OclichisPeer::ID, $this->id);

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

		$copyObj->setCodlic($this->codlic);

		$copyObj->setHistproc($this->histproc);

		$copyObj->setPeriodico($this->periodico);

		$copyObj->setFecpub($this->fecpub);

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
			self::$peer = new OclichisPeer();
		}
		return self::$peer;
	}

} 