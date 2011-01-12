<?php


abstract class BaseTsdefcajchi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcaj;


	
	protected $descaj;


	
	protected $cedrif;


	
	protected $codcat;


	
	protected $numcue;


	
	protected $codtip;


	
	protected $tipcau;


	
	protected $monape;


	
	protected $porrep;


	
	protected $numini;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcaj()
  {

    return trim($this->codcaj);

  }
  
  public function getDescaj()
  {

    return trim($this->descaj);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getMonape($val=false)
  {

    if($val) return number_format($this->monape,2,',','.');
    else return $this->monape;

  }
  
  public function getPorrep($val=false)
  {

    if($val) return number_format($this->porrep,2,',','.');
    else return $this->porrep;

  }
  
  public function getNumini()
  {

    return trim($this->numini);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::CODCAJ;
      }
  
	} 
	
	public function setDescaj($v)
	{

    if ($this->descaj !== $v) {
        $this->descaj = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::DESCAJ;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::CEDRIF;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::CODCAT;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::NUMCUE;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::CODTIP;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::TIPCAU;
      }
  
	} 
	
	public function setMonape($v)
	{

    if ($this->monape !== $v) {
        $this->monape = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefcajchiPeer::MONAPE;
      }
  
	} 
	
	public function setPorrep($v)
	{

    if ($this->porrep !== $v) {
        $this->porrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdefcajchiPeer::PORREP;
      }
  
	} 
	
	public function setNumini($v)
	{

    if ($this->numini !== $v) {
        $this->numini = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::NUMINI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdefcajchiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcaj = $rs->getString($startcol + 0);

      $this->descaj = $rs->getString($startcol + 1);

      $this->cedrif = $rs->getString($startcol + 2);

      $this->codcat = $rs->getString($startcol + 3);

      $this->numcue = $rs->getString($startcol + 4);

      $this->codtip = $rs->getString($startcol + 5);

      $this->tipcau = $rs->getString($startcol + 6);

      $this->monape = $rs->getFloat($startcol + 7);

      $this->porrep = $rs->getFloat($startcol + 8);

      $this->numini = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdefcajchi object", $e);
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
			$con = Propel::getConnection(TsdefcajchiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefcajchiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdefcajchiPeer::DATABASE_NAME);
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
					$pk = TsdefcajchiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdefcajchiPeer::doUpdate($this, $con);
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


			if (($retval = TsdefcajchiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefcajchiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcaj();
				break;
			case 1:
				return $this->getDescaj();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getNumcue();
				break;
			case 5:
				return $this->getCodtip();
				break;
			case 6:
				return $this->getTipcau();
				break;
			case 7:
				return $this->getMonape();
				break;
			case 8:
				return $this->getPorrep();
				break;
			case 9:
				return $this->getNumini();
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
		$keys = TsdefcajchiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcaj(),
			$keys[1] => $this->getDescaj(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getNumcue(),
			$keys[5] => $this->getCodtip(),
			$keys[6] => $this->getTipcau(),
			$keys[7] => $this->getMonape(),
			$keys[8] => $this->getPorrep(),
			$keys[9] => $this->getNumini(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefcajchiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcaj($value);
				break;
			case 1:
				$this->setDescaj($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setNumcue($value);
				break;
			case 5:
				$this->setCodtip($value);
				break;
			case 6:
				$this->setTipcau($value);
				break;
			case 7:
				$this->setMonape($value);
				break;
			case 8:
				$this->setPorrep($value);
				break;
			case 9:
				$this->setNumini($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefcajchiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcaj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescaj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumcue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodtip($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipcau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonape($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPorrep($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumini($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefcajchiPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefcajchiPeer::CODCAJ)) $criteria->add(TsdefcajchiPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(TsdefcajchiPeer::DESCAJ)) $criteria->add(TsdefcajchiPeer::DESCAJ, $this->descaj);
		if ($this->isColumnModified(TsdefcajchiPeer::CEDRIF)) $criteria->add(TsdefcajchiPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TsdefcajchiPeer::CODCAT)) $criteria->add(TsdefcajchiPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(TsdefcajchiPeer::NUMCUE)) $criteria->add(TsdefcajchiPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsdefcajchiPeer::CODTIP)) $criteria->add(TsdefcajchiPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(TsdefcajchiPeer::TIPCAU)) $criteria->add(TsdefcajchiPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(TsdefcajchiPeer::MONAPE)) $criteria->add(TsdefcajchiPeer::MONAPE, $this->monape);
		if ($this->isColumnModified(TsdefcajchiPeer::PORREP)) $criteria->add(TsdefcajchiPeer::PORREP, $this->porrep);
		if ($this->isColumnModified(TsdefcajchiPeer::NUMINI)) $criteria->add(TsdefcajchiPeer::NUMINI, $this->numini);
		if ($this->isColumnModified(TsdefcajchiPeer::ID)) $criteria->add(TsdefcajchiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefcajchiPeer::DATABASE_NAME);

		$criteria->add(TsdefcajchiPeer::ID, $this->id);

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

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setDescaj($this->descaj);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setMonape($this->monape);

		$copyObj->setPorrep($this->porrep);

		$copyObj->setNumini($this->numini);


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
			self::$peer = new TsdefcajchiPeer();
		}
		return self::$peer;
	}

} 