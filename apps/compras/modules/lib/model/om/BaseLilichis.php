<?php


abstract class BaseLilichis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codlic;


	
	protected $periodico;


	
	protected $fecpub;


	
	protected $pagina;


	
	protected $mes;


	
	protected $cuerpo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodlic()
  {

    return trim($this->codlic);

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
  
  public function getMes()
  {

    return trim($this->mes);

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
        $this->modifiedColumns[] = LilichisPeer::CODLIC;
      }
  
	} 
	
	public function setPeriodico($v)
	{

    if ($this->periodico !== $v) {
        $this->periodico = $v;
        $this->modifiedColumns[] = LilichisPeer::PERIODICO;
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
      $this->modifiedColumns[] = LilichisPeer::FECPUB;
    }

	} 
	
	public function setPagina($v)
	{

    if ($this->pagina !== $v) {
        $this->pagina = $v;
        $this->modifiedColumns[] = LilichisPeer::PAGINA;
      }
  
	} 
	
	public function setMes($v)
	{

    if ($this->mes !== $v) {
        $this->mes = $v;
        $this->modifiedColumns[] = LilichisPeer::MES;
      }
  
	} 
	
	public function setCuerpo($v)
	{

    if ($this->cuerpo !== $v) {
        $this->cuerpo = $v;
        $this->modifiedColumns[] = LilichisPeer::CUERPO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LilichisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codlic = $rs->getString($startcol + 0);

      $this->periodico = $rs->getString($startcol + 1);

      $this->fecpub = $rs->getDate($startcol + 2, null);

      $this->pagina = $rs->getString($startcol + 3);

      $this->mes = $rs->getString($startcol + 4);

      $this->cuerpo = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lilichis object", $e);
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
			$con = Propel::getConnection(LilichisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LilichisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LilichisPeer::DATABASE_NAME);
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
					$pk = LilichisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LilichisPeer::doUpdate($this, $con);
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


			if (($retval = LilichisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LilichisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodlic();
				break;
			case 1:
				return $this->getPeriodico();
				break;
			case 2:
				return $this->getFecpub();
				break;
			case 3:
				return $this->getPagina();
				break;
			case 4:
				return $this->getMes();
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
		$keys = LilichisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodlic(),
			$keys[1] => $this->getPeriodico(),
			$keys[2] => $this->getFecpub(),
			$keys[3] => $this->getPagina(),
			$keys[4] => $this->getMes(),
			$keys[5] => $this->getCuerpo(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LilichisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodlic($value);
				break;
			case 1:
				$this->setPeriodico($value);
				break;
			case 2:
				$this->setFecpub($value);
				break;
			case 3:
				$this->setPagina($value);
				break;
			case 4:
				$this->setMes($value);
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
		$keys = LilichisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodlic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPeriodico($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpub($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPagina($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCuerpo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LilichisPeer::DATABASE_NAME);

		if ($this->isColumnModified(LilichisPeer::CODLIC)) $criteria->add(LilichisPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(LilichisPeer::PERIODICO)) $criteria->add(LilichisPeer::PERIODICO, $this->periodico);
		if ($this->isColumnModified(LilichisPeer::FECPUB)) $criteria->add(LilichisPeer::FECPUB, $this->fecpub);
		if ($this->isColumnModified(LilichisPeer::PAGINA)) $criteria->add(LilichisPeer::PAGINA, $this->pagina);
		if ($this->isColumnModified(LilichisPeer::MES)) $criteria->add(LilichisPeer::MES, $this->mes);
		if ($this->isColumnModified(LilichisPeer::CUERPO)) $criteria->add(LilichisPeer::CUERPO, $this->cuerpo);
		if ($this->isColumnModified(LilichisPeer::ID)) $criteria->add(LilichisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LilichisPeer::DATABASE_NAME);

		$criteria->add(LilichisPeer::ID, $this->id);

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

		$copyObj->setPeriodico($this->periodico);

		$copyObj->setFecpub($this->fecpub);

		$copyObj->setPagina($this->pagina);

		$copyObj->setMes($this->mes);

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
			self::$peer = new LilichisPeer();
		}
		return self::$peer;
	}

} 