<?php


abstract class BaseCaartdphser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dphart;


	
	protected $codart;


	
	protected $codcat;


	
	protected $fecrea;


	
	protected $nomemp;


	
	protected $dphobs;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDphart()
  {

    return trim($this->dphart);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getFecrea($format = 'Y-m-d')
  {

    if ($this->fecrea === null || $this->fecrea === '') {
      return null;
    } elseif (!is_int($this->fecrea)) {
            $ts = adodb_strtotime($this->fecrea);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrea] as date/time value: " . var_export($this->fecrea, true));
      }
    } else {
      $ts = $this->fecrea;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getDphobs()
  {

    return trim($this->dphobs);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDphart($v)
	{

    if ($this->dphart !== $v) {
        $this->dphart = $v;
        $this->modifiedColumns[] = CaartdphserPeer::DPHART;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CaartdphserPeer::CODART;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CaartdphserPeer::CODCAT;
      }
  
	} 
	
	public function setFecrea($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrea] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrea !== $ts) {
      $this->fecrea = $ts;
      $this->modifiedColumns[] = CaartdphserPeer::FECREA;
    }

	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = CaartdphserPeer::NOMEMP;
      }
  
	} 
	
	public function setDphobs($v)
	{

    if ($this->dphobs !== $v) {
        $this->dphobs = $v;
        $this->modifiedColumns[] = CaartdphserPeer::DPHOBS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaartdphserPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->dphart = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->fecrea = $rs->getDate($startcol + 3, null);

      $this->nomemp = $rs->getString($startcol + 4);

      $this->dphobs = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caartdphser object", $e);
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
			$con = Propel::getConnection(CaartdphserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartdphserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartdphserPeer::DATABASE_NAME);
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
					$pk = CaartdphserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaartdphserPeer::doUpdate($this, $con);
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


			if (($retval = CaartdphserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartdphserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDphart();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getFecrea();
				break;
			case 4:
				return $this->getNomemp();
				break;
			case 5:
				return $this->getDphobs();
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
		$keys = CaartdphserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDphart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getFecrea(),
			$keys[4] => $this->getNomemp(),
			$keys[5] => $this->getDphobs(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartdphserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDphart($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setFecrea($value);
				break;
			case 4:
				$this->setNomemp($value);
				break;
			case 5:
				$this->setDphobs($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartdphserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDphart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrea($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDphobs($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartdphserPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartdphserPeer::DPHART)) $criteria->add(CaartdphserPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CaartdphserPeer::CODART)) $criteria->add(CaartdphserPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartdphserPeer::CODCAT)) $criteria->add(CaartdphserPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartdphserPeer::FECREA)) $criteria->add(CaartdphserPeer::FECREA, $this->fecrea);
		if ($this->isColumnModified(CaartdphserPeer::NOMEMP)) $criteria->add(CaartdphserPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(CaartdphserPeer::DPHOBS)) $criteria->add(CaartdphserPeer::DPHOBS, $this->dphobs);
		if ($this->isColumnModified(CaartdphserPeer::ID)) $criteria->add(CaartdphserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartdphserPeer::DATABASE_NAME);

		$criteria->add(CaartdphserPeer::ID, $this->id);

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

		$copyObj->setDphart($this->dphart);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setFecrea($this->fecrea);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDphobs($this->dphobs);


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
			self::$peer = new CaartdphserPeer();
		}
		return self::$peer;
	}

} 