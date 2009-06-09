<?php


abstract class BaseNpvacsalidasDet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $perini;


	
	protected $perfin;


	
	protected $diasdisfutar;


	
	protected $diasdisfrutados;


	
	protected $diasvac;


	
	protected $fecvac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getPerini()
  {

    return trim($this->perini);

  }
  
  public function getPerfin()
  {

    return trim($this->perfin);

  }
  
  public function getDiasdisfutar($val=false)
  {

    if($val) return number_format($this->diasdisfutar,2,',','.');
    else return $this->diasdisfutar;

  }
  
  public function getDiasdisfrutados($val=false)
  {

    if($val) return number_format($this->diasdisfrutados,2,',','.');
    else return $this->diasdisfrutados;

  }
  
  public function getDiasvac($val=false)
  {

    if($val) return number_format($this->diasvac,2,',','.');
    else return $this->diasvac;

  }
  
  public function getFecvac($format = 'Y-m-d')
  {

    if ($this->fecvac === null || $this->fecvac === '') {
      return null;
    } elseif (!is_int($this->fecvac)) {
            $ts = adodb_strtotime($this->fecvac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvac] as date/time value: " . var_export($this->fecvac, true));
      }
    } else {
      $ts = $this->fecvac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacsalidasDetPeer::CODEMP;
      }
  
	} 
	
	public function setPerini($v)
	{

    if ($this->perini !== $v) {
        $this->perini = $v;
        $this->modifiedColumns[] = NpvacsalidasDetPeer::PERINI;
      }
  
	} 
	
	public function setPerfin($v)
	{

    if ($this->perfin !== $v) {
        $this->perfin = $v;
        $this->modifiedColumns[] = NpvacsalidasDetPeer::PERFIN;
      }
  
	} 
	
	public function setDiasdisfutar($v)
	{

    if ($this->diasdisfutar !== $v) {
        $this->diasdisfutar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacsalidasDetPeer::DIASDISFUTAR;
      }
  
	} 
	
	public function setDiasdisfrutados($v)
	{

    if ($this->diasdisfrutados !== $v) {
        $this->diasdisfrutados = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacsalidasDetPeer::DIASDISFRUTADOS;
      }
  
	} 
	
	public function setDiasvac($v)
	{

    if ($this->diasvac !== $v) {
        $this->diasvac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacsalidasDetPeer::DIASVAC;
      }
  
	} 
	
	public function setFecvac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvac !== $ts) {
      $this->fecvac = $ts;
      $this->modifiedColumns[] = NpvacsalidasDetPeer::FECVAC;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacsalidasDetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->perini = $rs->getString($startcol + 1);

      $this->perfin = $rs->getString($startcol + 2);

      $this->diasdisfutar = $rs->getFloat($startcol + 3);

      $this->diasdisfrutados = $rs->getFloat($startcol + 4);

      $this->diasvac = $rs->getFloat($startcol + 5);

      $this->fecvac = $rs->getDate($startcol + 6, null);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating NpvacsalidasDet object", $e);
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
			$con = Propel::getConnection(NpvacsalidasDetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacsalidasDetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacsalidasDetPeer::DATABASE_NAME);
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
					$pk = NpvacsalidasDetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacsalidasDetPeer::doUpdate($this, $con);
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


			if (($retval = NpvacsalidasDetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacsalidasDetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getPerini();
				break;
			case 2:
				return $this->getPerfin();
				break;
			case 3:
				return $this->getDiasdisfutar();
				break;
			case 4:
				return $this->getDiasdisfrutados();
				break;
			case 5:
				return $this->getDiasvac();
				break;
			case 6:
				return $this->getFecvac();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacsalidasDetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getPerini(),
			$keys[2] => $this->getPerfin(),
			$keys[3] => $this->getDiasdisfutar(),
			$keys[4] => $this->getDiasdisfrutados(),
			$keys[5] => $this->getDiasvac(),
			$keys[6] => $this->getFecvac(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacsalidasDetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setPerini($value);
				break;
			case 2:
				$this->setPerfin($value);
				break;
			case 3:
				$this->setDiasdisfutar($value);
				break;
			case 4:
				$this->setDiasdisfrutados($value);
				break;
			case 5:
				$this->setDiasvac($value);
				break;
			case 6:
				$this->setFecvac($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacsalidasDetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiasdisfutar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiasdisfrutados($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiasvac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecvac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacsalidasDetPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacsalidasDetPeer::CODEMP)) $criteria->add(NpvacsalidasDetPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacsalidasDetPeer::PERINI)) $criteria->add(NpvacsalidasDetPeer::PERINI, $this->perini);
		if ($this->isColumnModified(NpvacsalidasDetPeer::PERFIN)) $criteria->add(NpvacsalidasDetPeer::PERFIN, $this->perfin);
		if ($this->isColumnModified(NpvacsalidasDetPeer::DIASDISFUTAR)) $criteria->add(NpvacsalidasDetPeer::DIASDISFUTAR, $this->diasdisfutar);
		if ($this->isColumnModified(NpvacsalidasDetPeer::DIASDISFRUTADOS)) $criteria->add(NpvacsalidasDetPeer::DIASDISFRUTADOS, $this->diasdisfrutados);
		if ($this->isColumnModified(NpvacsalidasDetPeer::DIASVAC)) $criteria->add(NpvacsalidasDetPeer::DIASVAC, $this->diasvac);
		if ($this->isColumnModified(NpvacsalidasDetPeer::FECVAC)) $criteria->add(NpvacsalidasDetPeer::FECVAC, $this->fecvac);
		if ($this->isColumnModified(NpvacsalidasDetPeer::ID)) $criteria->add(NpvacsalidasDetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacsalidasDetPeer::DATABASE_NAME);

		$criteria->add(NpvacsalidasDetPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setPerini($this->perini);

		$copyObj->setPerfin($this->perfin);

		$copyObj->setDiasdisfutar($this->diasdisfutar);

		$copyObj->setDiasdisfrutados($this->diasdisfrutados);

		$copyObj->setDiasvac($this->diasvac);

		$copyObj->setFecvac($this->fecvac);


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
			self::$peer = new NpvacsalidasDetPeer();
		}
		return self::$peer;
	}

} 