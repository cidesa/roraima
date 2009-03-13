<?php


abstract class BaseCadetords extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordser;


	
	protected $codpre;


	
	protected $preser;


	
	protected $dtoser;


	
	protected $rgoser;


	
	protected $totser;


	
	protected $desser;


	
	protected $monser;


	
	protected $canser;


	
	protected $codrgo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdser()
  {

    return trim($this->ordser);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getPreser($val=false)
  {

    if($val) return number_format($this->preser,2,',','.');
    else return $this->preser;

  }
  
  public function getDtoser($val=false)
  {

    if($val) return number_format($this->dtoser,2,',','.');
    else return $this->dtoser;

  }
  
  public function getRgoser($val=false)
  {

    if($val) return number_format($this->rgoser,2,',','.');
    else return $this->rgoser;

  }
  
  public function getTotser($val=false)
  {

    if($val) return number_format($this->totser,2,',','.');
    else return $this->totser;

  }
  
  public function getDesser()
  {

    return trim($this->desser);

  }
  
  public function getMonser($val=false)
  {

    if($val) return number_format($this->monser,2,',','.');
    else return $this->monser;

  }
  
  public function getCanser($val=false)
  {

    if($val) return number_format($this->canser,2,',','.');
    else return $this->canser;

  }
  
  public function getCodrgo()
  {

    return trim($this->codrgo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdser($v)
	{

    if ($this->ordser !== $v) {
        $this->ordser = $v;
        $this->modifiedColumns[] = CadetordsPeer::ORDSER;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CadetordsPeer::CODPRE;
      }
  
	} 
	
	public function setPreser($v)
	{

    if ($this->preser !== $v) {
        $this->preser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordsPeer::PRESER;
      }
  
	} 
	
	public function setDtoser($v)
	{

    if ($this->dtoser !== $v) {
        $this->dtoser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordsPeer::DTOSER;
      }
  
	} 
	
	public function setRgoser($v)
	{

    if ($this->rgoser !== $v) {
        $this->rgoser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordsPeer::RGOSER;
      }
  
	} 
	
	public function setTotser($v)
	{

    if ($this->totser !== $v) {
        $this->totser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordsPeer::TOTSER;
      }
  
	} 
	
	public function setDesser($v)
	{

    if ($this->desser !== $v) {
        $this->desser = $v;
        $this->modifiedColumns[] = CadetordsPeer::DESSER;
      }
  
	} 
	
	public function setMonser($v)
	{

    if ($this->monser !== $v) {
        $this->monser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordsPeer::MONSER;
      }
  
	} 
	
	public function setCanser($v)
	{

    if ($this->canser !== $v) {
        $this->canser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordsPeer::CANSER;
      }
  
	} 
	
	public function setCodrgo($v)
	{

    if ($this->codrgo !== $v) {
        $this->codrgo = $v;
        $this->modifiedColumns[] = CadetordsPeer::CODRGO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetordsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordser = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->preser = $rs->getFloat($startcol + 2);

      $this->dtoser = $rs->getFloat($startcol + 3);

      $this->rgoser = $rs->getFloat($startcol + 4);

      $this->totser = $rs->getFloat($startcol + 5);

      $this->desser = $rs->getString($startcol + 6);

      $this->monser = $rs->getFloat($startcol + 7);

      $this->canser = $rs->getFloat($startcol + 8);

      $this->codrgo = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetords object", $e);
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
			$con = Propel::getConnection(CadetordsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetordsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetordsPeer::DATABASE_NAME);
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
					$pk = CadetordsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CadetordsPeer::doUpdate($this, $con);
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


			if (($retval = CadetordsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetordsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdser();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getPreser();
				break;
			case 3:
				return $this->getDtoser();
				break;
			case 4:
				return $this->getRgoser();
				break;
			case 5:
				return $this->getTotser();
				break;
			case 6:
				return $this->getDesser();
				break;
			case 7:
				return $this->getMonser();
				break;
			case 8:
				return $this->getCanser();
				break;
			case 9:
				return $this->getCodrgo();
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
		$keys = CadetordsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdser(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getPreser(),
			$keys[3] => $this->getDtoser(),
			$keys[4] => $this->getRgoser(),
			$keys[5] => $this->getTotser(),
			$keys[6] => $this->getDesser(),
			$keys[7] => $this->getMonser(),
			$keys[8] => $this->getCanser(),
			$keys[9] => $this->getCodrgo(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetordsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdser($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setPreser($value);
				break;
			case 3:
				$this->setDtoser($value);
				break;
			case 4:
				$this->setRgoser($value);
				break;
			case 5:
				$this->setTotser($value);
				break;
			case 6:
				$this->setDesser($value);
				break;
			case 7:
				$this->setMonser($value);
				break;
			case 8:
				$this->setCanser($value);
				break;
			case 9:
				$this->setCodrgo($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetordsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdser($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPreser($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDtoser($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRgoser($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotser($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesser($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonser($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanser($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodrgo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetordsPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetordsPeer::ORDSER)) $criteria->add(CadetordsPeer::ORDSER, $this->ordser);
		if ($this->isColumnModified(CadetordsPeer::CODPRE)) $criteria->add(CadetordsPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CadetordsPeer::PRESER)) $criteria->add(CadetordsPeer::PRESER, $this->preser);
		if ($this->isColumnModified(CadetordsPeer::DTOSER)) $criteria->add(CadetordsPeer::DTOSER, $this->dtoser);
		if ($this->isColumnModified(CadetordsPeer::RGOSER)) $criteria->add(CadetordsPeer::RGOSER, $this->rgoser);
		if ($this->isColumnModified(CadetordsPeer::TOTSER)) $criteria->add(CadetordsPeer::TOTSER, $this->totser);
		if ($this->isColumnModified(CadetordsPeer::DESSER)) $criteria->add(CadetordsPeer::DESSER, $this->desser);
		if ($this->isColumnModified(CadetordsPeer::MONSER)) $criteria->add(CadetordsPeer::MONSER, $this->monser);
		if ($this->isColumnModified(CadetordsPeer::CANSER)) $criteria->add(CadetordsPeer::CANSER, $this->canser);
		if ($this->isColumnModified(CadetordsPeer::CODRGO)) $criteria->add(CadetordsPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(CadetordsPeer::ID)) $criteria->add(CadetordsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetordsPeer::DATABASE_NAME);

		$criteria->add(CadetordsPeer::ID, $this->id);

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

		$copyObj->setOrdser($this->ordser);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setPreser($this->preser);

		$copyObj->setDtoser($this->dtoser);

		$copyObj->setRgoser($this->rgoser);

		$copyObj->setTotser($this->totser);

		$copyObj->setDesser($this->desser);

		$copyObj->setMonser($this->monser);

		$copyObj->setCanser($this->canser);

		$copyObj->setCodrgo($this->codrgo);


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
			self::$peer = new CadetordsPeer();
		}
		return self::$peer;
	}

} 