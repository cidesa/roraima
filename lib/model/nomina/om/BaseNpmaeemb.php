<?php


abstract class BaseNpmaeemb extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemb;


	
	protected $desemb;


	
	protected $codjuz;


	
	protected $codemp;


	
	protected $fecregemb;


	
	protected $codconemb;


	
	protected $tipdis;


	
	protected $tipcal;


	
	protected $montotemb;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemb()
  {

    return trim($this->codemb);

  }
  
  public function getDesemb()
  {

    return trim($this->desemb);

  }
  
  public function getCodjuz()
  {

    return trim($this->codjuz);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecregemb($format = 'Y-m-d')
  {

    if ($this->fecregemb === null || $this->fecregemb === '') {
      return null;
    } elseif (!is_int($this->fecregemb)) {
            $ts = adodb_strtotime($this->fecregemb);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecregemb] as date/time value: " . var_export($this->fecregemb, true));
      }
    } else {
      $ts = $this->fecregemb;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodconemb()
  {

    return trim($this->codconemb);

  }
  
  public function getTipdis()
  {

    return trim($this->tipdis);

  }
  
  public function getTipcal()
  {

    return trim($this->tipcal);

  }
  
  public function getMontotemb($val=false)
  {

    if($val) return number_format($this->montotemb,2,',','.');
    else return $this->montotemb;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemb($v)
	{

    if ($this->codemb !== $v) {
        $this->codemb = $v;
        $this->modifiedColumns[] = NpmaeembPeer::CODEMB;
      }
  
	} 
	
	public function setDesemb($v)
	{

    if ($this->desemb !== $v) {
        $this->desemb = $v;
        $this->modifiedColumns[] = NpmaeembPeer::DESEMB;
      }
  
	} 
	
	public function setCodjuz($v)
	{

    if ($this->codjuz !== $v) {
        $this->codjuz = $v;
        $this->modifiedColumns[] = NpmaeembPeer::CODJUZ;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpmaeembPeer::CODEMP;
      }
  
	} 
	
	public function setFecregemb($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecregemb] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecregemb !== $ts) {
      $this->fecregemb = $ts;
      $this->modifiedColumns[] = NpmaeembPeer::FECREGEMB;
    }

	} 
	
	public function setCodconemb($v)
	{

    if ($this->codconemb !== $v) {
        $this->codconemb = $v;
        $this->modifiedColumns[] = NpmaeembPeer::CODCONEMB;
      }
  
	} 
	
	public function setTipdis($v)
	{

    if ($this->tipdis !== $v) {
        $this->tipdis = $v;
        $this->modifiedColumns[] = NpmaeembPeer::TIPDIS;
      }
  
	} 
	
	public function setTipcal($v)
	{

    if ($this->tipcal !== $v) {
        $this->tipcal = $v;
        $this->modifiedColumns[] = NpmaeembPeer::TIPCAL;
      }
  
	} 
	
	public function setMontotemb($v)
	{

    if ($this->montotemb !== $v) {
        $this->montotemb = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpmaeembPeer::MONTOTEMB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpmaeembPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemb = $rs->getString($startcol + 0);

      $this->desemb = $rs->getString($startcol + 1);

      $this->codjuz = $rs->getString($startcol + 2);

      $this->codemp = $rs->getString($startcol + 3);

      $this->fecregemb = $rs->getDate($startcol + 4, null);

      $this->codconemb = $rs->getString($startcol + 5);

      $this->tipdis = $rs->getString($startcol + 6);

      $this->tipcal = $rs->getString($startcol + 7);

      $this->montotemb = $rs->getFloat($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npmaeemb object", $e);
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
			$con = Propel::getConnection(NpmaeembPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpmaeembPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpmaeembPeer::DATABASE_NAME);
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
					$pk = NpmaeembPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpmaeembPeer::doUpdate($this, $con);
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


			if (($retval = NpmaeembPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmaeembPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemb();
				break;
			case 1:
				return $this->getDesemb();
				break;
			case 2:
				return $this->getCodjuz();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getFecregemb();
				break;
			case 5:
				return $this->getCodconemb();
				break;
			case 6:
				return $this->getTipdis();
				break;
			case 7:
				return $this->getTipcal();
				break;
			case 8:
				return $this->getMontotemb();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmaeembPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemb(),
			$keys[1] => $this->getDesemb(),
			$keys[2] => $this->getCodjuz(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getFecregemb(),
			$keys[5] => $this->getCodconemb(),
			$keys[6] => $this->getTipdis(),
			$keys[7] => $this->getTipcal(),
			$keys[8] => $this->getMontotemb(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmaeembPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemb($value);
				break;
			case 1:
				$this->setDesemb($value);
				break;
			case 2:
				$this->setCodjuz($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setFecregemb($value);
				break;
			case 5:
				$this->setCodconemb($value);
				break;
			case 6:
				$this->setTipdis($value);
				break;
			case 7:
				$this->setTipcal($value);
				break;
			case 8:
				$this->setMontotemb($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmaeembPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemb($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesemb($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodjuz($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecregemb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodconemb($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipdis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipcal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMontotemb($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpmaeembPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpmaeembPeer::CODEMB)) $criteria->add(NpmaeembPeer::CODEMB, $this->codemb);
		if ($this->isColumnModified(NpmaeembPeer::DESEMB)) $criteria->add(NpmaeembPeer::DESEMB, $this->desemb);
		if ($this->isColumnModified(NpmaeembPeer::CODJUZ)) $criteria->add(NpmaeembPeer::CODJUZ, $this->codjuz);
		if ($this->isColumnModified(NpmaeembPeer::CODEMP)) $criteria->add(NpmaeembPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpmaeembPeer::FECREGEMB)) $criteria->add(NpmaeembPeer::FECREGEMB, $this->fecregemb);
		if ($this->isColumnModified(NpmaeembPeer::CODCONEMB)) $criteria->add(NpmaeembPeer::CODCONEMB, $this->codconemb);
		if ($this->isColumnModified(NpmaeembPeer::TIPDIS)) $criteria->add(NpmaeembPeer::TIPDIS, $this->tipdis);
		if ($this->isColumnModified(NpmaeembPeer::TIPCAL)) $criteria->add(NpmaeembPeer::TIPCAL, $this->tipcal);
		if ($this->isColumnModified(NpmaeembPeer::MONTOTEMB)) $criteria->add(NpmaeembPeer::MONTOTEMB, $this->montotemb);
		if ($this->isColumnModified(NpmaeembPeer::ID)) $criteria->add(NpmaeembPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpmaeembPeer::DATABASE_NAME);

		$criteria->add(NpmaeembPeer::ID, $this->id);

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

		$copyObj->setCodemb($this->codemb);

		$copyObj->setDesemb($this->desemb);

		$copyObj->setCodjuz($this->codjuz);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecregemb($this->fecregemb);

		$copyObj->setCodconemb($this->codconemb);

		$copyObj->setTipdis($this->tipdis);

		$copyObj->setTipcal($this->tipcal);

		$copyObj->setMontotemb($this->montotemb);


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
			self::$peer = new NpmaeembPeer();
		}
		return self::$peer;
	}

} 