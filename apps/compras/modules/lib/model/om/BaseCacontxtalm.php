<?php


abstract class BaseCacontxtalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $iniart;


	
	protected $finart;


	
	protected $inides;


	
	protected $findes;


	
	protected $inican;


	
	protected $fincan;


	
	protected $inisub;


	
	protected $finsub;


	
	protected $iniiva;


	
	protected $finiva;


	
	protected $inipre;


	
	protected $finpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getIniart($val=false)
  {

    if($val) return number_format($this->iniart,2,',','.');
    else return $this->iniart;

  }
  
  public function getFinart($val=false)
  {

    if($val) return number_format($this->finart,2,',','.');
    else return $this->finart;

  }
  
  public function getInides($val=false)
  {

    if($val) return number_format($this->inides,2,',','.');
    else return $this->inides;

  }
  
  public function getFindes($val=false)
  {

    if($val) return number_format($this->findes,2,',','.');
    else return $this->findes;

  }
  
  public function getInican($val=false)
  {

    if($val) return number_format($this->inican,2,',','.');
    else return $this->inican;

  }
  
  public function getFincan($val=false)
  {

    if($val) return number_format($this->fincan,2,',','.');
    else return $this->fincan;

  }
  
  public function getInisub($val=false)
  {

    if($val) return number_format($this->inisub,2,',','.');
    else return $this->inisub;

  }
  
  public function getFinsub($val=false)
  {

    if($val) return number_format($this->finsub,2,',','.');
    else return $this->finsub;

  }
  
  public function getIniiva($val=false)
  {

    if($val) return number_format($this->iniiva,2,',','.');
    else return $this->iniiva;

  }
  
  public function getFiniva($val=false)
  {

    if($val) return number_format($this->finiva,2,',','.');
    else return $this->finiva;

  }
  
  public function getInipre($val=false)
  {

    if($val) return number_format($this->inipre,2,',','.');
    else return $this->inipre;

  }
  
  public function getFinpre($val=false)
  {

    if($val) return number_format($this->finpre,2,',','.');
    else return $this->finpre;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CacontxtalmPeer::CODALM;
      }
  
	} 
	
	public function setIniart($v)
	{

    if ($this->iniart !== $v) {
        $this->iniart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::INIART;
      }
  
	} 
	
	public function setFinart($v)
	{

    if ($this->finart !== $v) {
        $this->finart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::FINART;
      }
  
	} 
	
	public function setInides($v)
	{

    if ($this->inides !== $v) {
        $this->inides = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::INIDES;
      }
  
	} 
	
	public function setFindes($v)
	{

    if ($this->findes !== $v) {
        $this->findes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::FINDES;
      }
  
	} 
	
	public function setInican($v)
	{

    if ($this->inican !== $v) {
        $this->inican = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::INICAN;
      }
  
	} 
	
	public function setFincan($v)
	{

    if ($this->fincan !== $v) {
        $this->fincan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::FINCAN;
      }
  
	} 
	
	public function setInisub($v)
	{

    if ($this->inisub !== $v) {
        $this->inisub = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::INISUB;
      }
  
	} 
	
	public function setFinsub($v)
	{

    if ($this->finsub !== $v) {
        $this->finsub = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::FINSUB;
      }
  
	} 
	
	public function setIniiva($v)
	{

    if ($this->iniiva !== $v) {
        $this->iniiva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::INIIVA;
      }
  
	} 
	
	public function setFiniva($v)
	{

    if ($this->finiva !== $v) {
        $this->finiva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::FINIVA;
      }
  
	} 
	
	public function setInipre($v)
	{

    if ($this->inipre !== $v) {
        $this->inipre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::INIPRE;
      }
  
	} 
	
	public function setFinpre($v)
	{

    if ($this->finpre !== $v) {
        $this->finpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CacontxtalmPeer::FINPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CacontxtalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->iniart = $rs->getFloat($startcol + 1);

      $this->finart = $rs->getFloat($startcol + 2);

      $this->inides = $rs->getFloat($startcol + 3);

      $this->findes = $rs->getFloat($startcol + 4);

      $this->inican = $rs->getFloat($startcol + 5);

      $this->fincan = $rs->getFloat($startcol + 6);

      $this->inisub = $rs->getFloat($startcol + 7);

      $this->finsub = $rs->getFloat($startcol + 8);

      $this->iniiva = $rs->getFloat($startcol + 9);

      $this->finiva = $rs->getFloat($startcol + 10);

      $this->inipre = $rs->getFloat($startcol + 11);

      $this->finpre = $rs->getFloat($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cacontxtalm object", $e);
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
			$con = Propel::getConnection(CacontxtalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CacontxtalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CacontxtalmPeer::DATABASE_NAME);
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
					$pk = CacontxtalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CacontxtalmPeer::doUpdate($this, $con);
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


			if (($retval = CacontxtalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacontxtalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getIniart();
				break;
			case 2:
				return $this->getFinart();
				break;
			case 3:
				return $this->getInides();
				break;
			case 4:
				return $this->getFindes();
				break;
			case 5:
				return $this->getInican();
				break;
			case 6:
				return $this->getFincan();
				break;
			case 7:
				return $this->getInisub();
				break;
			case 8:
				return $this->getFinsub();
				break;
			case 9:
				return $this->getIniiva();
				break;
			case 10:
				return $this->getFiniva();
				break;
			case 11:
				return $this->getInipre();
				break;
			case 12:
				return $this->getFinpre();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacontxtalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getIniart(),
			$keys[2] => $this->getFinart(),
			$keys[3] => $this->getInides(),
			$keys[4] => $this->getFindes(),
			$keys[5] => $this->getInican(),
			$keys[6] => $this->getFincan(),
			$keys[7] => $this->getInisub(),
			$keys[8] => $this->getFinsub(),
			$keys[9] => $this->getIniiva(),
			$keys[10] => $this->getFiniva(),
			$keys[11] => $this->getInipre(),
			$keys[12] => $this->getFinpre(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacontxtalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setIniart($value);
				break;
			case 2:
				$this->setFinart($value);
				break;
			case 3:
				$this->setInides($value);
				break;
			case 4:
				$this->setFindes($value);
				break;
			case 5:
				$this->setInican($value);
				break;
			case 6:
				$this->setFincan($value);
				break;
			case 7:
				$this->setInisub($value);
				break;
			case 8:
				$this->setFinsub($value);
				break;
			case 9:
				$this->setIniiva($value);
				break;
			case 10:
				$this->setFiniva($value);
				break;
			case 11:
				$this->setInipre($value);
				break;
			case 12:
				$this->setFinpre($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacontxtalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIniart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFinart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInides($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFindes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setInican($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFincan($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setInisub($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFinsub($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIniiva($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFiniva($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInipre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFinpre($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CacontxtalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CacontxtalmPeer::CODALM)) $criteria->add(CacontxtalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CacontxtalmPeer::INIART)) $criteria->add(CacontxtalmPeer::INIART, $this->iniart);
		if ($this->isColumnModified(CacontxtalmPeer::FINART)) $criteria->add(CacontxtalmPeer::FINART, $this->finart);
		if ($this->isColumnModified(CacontxtalmPeer::INIDES)) $criteria->add(CacontxtalmPeer::INIDES, $this->inides);
		if ($this->isColumnModified(CacontxtalmPeer::FINDES)) $criteria->add(CacontxtalmPeer::FINDES, $this->findes);
		if ($this->isColumnModified(CacontxtalmPeer::INICAN)) $criteria->add(CacontxtalmPeer::INICAN, $this->inican);
		if ($this->isColumnModified(CacontxtalmPeer::FINCAN)) $criteria->add(CacontxtalmPeer::FINCAN, $this->fincan);
		if ($this->isColumnModified(CacontxtalmPeer::INISUB)) $criteria->add(CacontxtalmPeer::INISUB, $this->inisub);
		if ($this->isColumnModified(CacontxtalmPeer::FINSUB)) $criteria->add(CacontxtalmPeer::FINSUB, $this->finsub);
		if ($this->isColumnModified(CacontxtalmPeer::INIIVA)) $criteria->add(CacontxtalmPeer::INIIVA, $this->iniiva);
		if ($this->isColumnModified(CacontxtalmPeer::FINIVA)) $criteria->add(CacontxtalmPeer::FINIVA, $this->finiva);
		if ($this->isColumnModified(CacontxtalmPeer::INIPRE)) $criteria->add(CacontxtalmPeer::INIPRE, $this->inipre);
		if ($this->isColumnModified(CacontxtalmPeer::FINPRE)) $criteria->add(CacontxtalmPeer::FINPRE, $this->finpre);
		if ($this->isColumnModified(CacontxtalmPeer::ID)) $criteria->add(CacontxtalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CacontxtalmPeer::DATABASE_NAME);

		$criteria->add(CacontxtalmPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setIniart($this->iniart);

		$copyObj->setFinart($this->finart);

		$copyObj->setInides($this->inides);

		$copyObj->setFindes($this->findes);

		$copyObj->setInican($this->inican);

		$copyObj->setFincan($this->fincan);

		$copyObj->setInisub($this->inisub);

		$copyObj->setFinsub($this->finsub);

		$copyObj->setIniiva($this->iniiva);

		$copyObj->setFiniva($this->finiva);

		$copyObj->setInipre($this->inipre);

		$copyObj->setFinpre($this->finpre);


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
			self::$peer = new CacontxtalmPeer();
		}
		return self::$peer;
	}

} 