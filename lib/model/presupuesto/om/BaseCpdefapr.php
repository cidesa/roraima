<?php


abstract class BaseCpdefapr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $stacon;


	
	protected $abrstacon;


	
	protected $stagob;


	
	protected $abrstagob;


	
	protected $stapre;


	
	protected $abrstapre;


	
	protected $staniv4;


	
	protected $abrstaniv4;


	
	protected $staniv5;


	
	protected $abrstaniv5;


	
	protected $staniv6;


	
	protected $abrstaniv6;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getAbrstacon()
  {

    return trim($this->abrstacon);

  }
  
  public function getStagob()
  {

    return trim($this->stagob);

  }
  
  public function getAbrstagob()
  {

    return trim($this->abrstagob);

  }
  
  public function getStapre()
  {

    return trim($this->stapre);

  }
  
  public function getAbrstapre()
  {

    return trim($this->abrstapre);

  }
  
  public function getStaniv4()
  {

    return trim($this->staniv4);

  }
  
  public function getAbrstaniv4()
  {

    return trim($this->abrstaniv4);

  }
  
  public function getStaniv5()
  {

    return trim($this->staniv5);

  }
  
  public function getAbrstaniv5()
  {

    return trim($this->abrstaniv5);

  }
  
  public function getStaniv6()
  {

    return trim($this->staniv6);

  }
  
  public function getAbrstaniv6()
  {

    return trim($this->abrstaniv6);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = CpdefaprPeer::STACON;
      }
  
	} 
	
	public function setAbrstacon($v)
	{

    if ($this->abrstacon !== $v) {
        $this->abrstacon = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ABRSTACON;
      }
  
	} 
	
	public function setStagob($v)
	{

    if ($this->stagob !== $v) {
        $this->stagob = $v;
        $this->modifiedColumns[] = CpdefaprPeer::STAGOB;
      }
  
	} 
	
	public function setAbrstagob($v)
	{

    if ($this->abrstagob !== $v) {
        $this->abrstagob = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ABRSTAGOB;
      }
  
	} 
	
	public function setStapre($v)
	{

    if ($this->stapre !== $v) {
        $this->stapre = $v;
        $this->modifiedColumns[] = CpdefaprPeer::STAPRE;
      }
  
	} 
	
	public function setAbrstapre($v)
	{

    if ($this->abrstapre !== $v) {
        $this->abrstapre = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ABRSTAPRE;
      }
  
	} 
	
	public function setStaniv4($v)
	{

    if ($this->staniv4 !== $v) {
        $this->staniv4 = $v;
        $this->modifiedColumns[] = CpdefaprPeer::STANIV4;
      }
  
	} 
	
	public function setAbrstaniv4($v)
	{

    if ($this->abrstaniv4 !== $v) {
        $this->abrstaniv4 = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ABRSTANIV4;
      }
  
	} 
	
	public function setStaniv5($v)
	{

    if ($this->staniv5 !== $v) {
        $this->staniv5 = $v;
        $this->modifiedColumns[] = CpdefaprPeer::STANIV5;
      }
  
	} 
	
	public function setAbrstaniv5($v)
	{

    if ($this->abrstaniv5 !== $v) {
        $this->abrstaniv5 = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ABRSTANIV5;
      }
  
	} 
	
	public function setStaniv6($v)
	{

    if ($this->staniv6 !== $v) {
        $this->staniv6 = $v;
        $this->modifiedColumns[] = CpdefaprPeer::STANIV6;
      }
  
	} 
	
	public function setAbrstaniv6($v)
	{

    if ($this->abrstaniv6 !== $v) {
        $this->abrstaniv6 = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ABRSTANIV6;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdefaprPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->stacon = $rs->getString($startcol + 0);

      $this->abrstacon = $rs->getString($startcol + 1);

      $this->stagob = $rs->getString($startcol + 2);

      $this->abrstagob = $rs->getString($startcol + 3);

      $this->stapre = $rs->getString($startcol + 4);

      $this->abrstapre = $rs->getString($startcol + 5);

      $this->staniv4 = $rs->getString($startcol + 6);

      $this->abrstaniv4 = $rs->getString($startcol + 7);

      $this->staniv5 = $rs->getString($startcol + 8);

      $this->abrstaniv5 = $rs->getString($startcol + 9);

      $this->staniv6 = $rs->getString($startcol + 10);

      $this->abrstaniv6 = $rs->getString($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdefapr object", $e);
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
			$con = Propel::getConnection(CpdefaprPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdefaprPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdefaprPeer::DATABASE_NAME);
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
					$pk = CpdefaprPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdefaprPeer::doUpdate($this, $con);
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


			if (($retval = CpdefaprPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefaprPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getStacon();
				break;
			case 1:
				return $this->getAbrstacon();
				break;
			case 2:
				return $this->getStagob();
				break;
			case 3:
				return $this->getAbrstagob();
				break;
			case 4:
				return $this->getStapre();
				break;
			case 5:
				return $this->getAbrstapre();
				break;
			case 6:
				return $this->getStaniv4();
				break;
			case 7:
				return $this->getAbrstaniv4();
				break;
			case 8:
				return $this->getStaniv5();
				break;
			case 9:
				return $this->getAbrstaniv5();
				break;
			case 10:
				return $this->getStaniv6();
				break;
			case 11:
				return $this->getAbrstaniv6();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefaprPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getStacon(),
			$keys[1] => $this->getAbrstacon(),
			$keys[2] => $this->getStagob(),
			$keys[3] => $this->getAbrstagob(),
			$keys[4] => $this->getStapre(),
			$keys[5] => $this->getAbrstapre(),
			$keys[6] => $this->getStaniv4(),
			$keys[7] => $this->getAbrstaniv4(),
			$keys[8] => $this->getStaniv5(),
			$keys[9] => $this->getAbrstaniv5(),
			$keys[10] => $this->getStaniv6(),
			$keys[11] => $this->getAbrstaniv6(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefaprPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setStacon($value);
				break;
			case 1:
				$this->setAbrstacon($value);
				break;
			case 2:
				$this->setStagob($value);
				break;
			case 3:
				$this->setAbrstagob($value);
				break;
			case 4:
				$this->setStapre($value);
				break;
			case 5:
				$this->setAbrstapre($value);
				break;
			case 6:
				$this->setStaniv4($value);
				break;
			case 7:
				$this->setAbrstaniv4($value);
				break;
			case 8:
				$this->setStaniv5($value);
				break;
			case 9:
				$this->setAbrstaniv5($value);
				break;
			case 10:
				$this->setStaniv6($value);
				break;
			case 11:
				$this->setAbrstaniv6($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefaprPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setStacon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAbrstacon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStagob($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAbrstagob($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStapre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAbrstapre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStaniv4($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAbrstaniv4($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStaniv5($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAbrstaniv5($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaniv6($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAbrstaniv6($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdefaprPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdefaprPeer::STACON)) $criteria->add(CpdefaprPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CpdefaprPeer::ABRSTACON)) $criteria->add(CpdefaprPeer::ABRSTACON, $this->abrstacon);
		if ($this->isColumnModified(CpdefaprPeer::STAGOB)) $criteria->add(CpdefaprPeer::STAGOB, $this->stagob);
		if ($this->isColumnModified(CpdefaprPeer::ABRSTAGOB)) $criteria->add(CpdefaprPeer::ABRSTAGOB, $this->abrstagob);
		if ($this->isColumnModified(CpdefaprPeer::STAPRE)) $criteria->add(CpdefaprPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(CpdefaprPeer::ABRSTAPRE)) $criteria->add(CpdefaprPeer::ABRSTAPRE, $this->abrstapre);
		if ($this->isColumnModified(CpdefaprPeer::STANIV4)) $criteria->add(CpdefaprPeer::STANIV4, $this->staniv4);
		if ($this->isColumnModified(CpdefaprPeer::ABRSTANIV4)) $criteria->add(CpdefaprPeer::ABRSTANIV4, $this->abrstaniv4);
		if ($this->isColumnModified(CpdefaprPeer::STANIV5)) $criteria->add(CpdefaprPeer::STANIV5, $this->staniv5);
		if ($this->isColumnModified(CpdefaprPeer::ABRSTANIV5)) $criteria->add(CpdefaprPeer::ABRSTANIV5, $this->abrstaniv5);
		if ($this->isColumnModified(CpdefaprPeer::STANIV6)) $criteria->add(CpdefaprPeer::STANIV6, $this->staniv6);
		if ($this->isColumnModified(CpdefaprPeer::ABRSTANIV6)) $criteria->add(CpdefaprPeer::ABRSTANIV6, $this->abrstaniv6);
		if ($this->isColumnModified(CpdefaprPeer::ID)) $criteria->add(CpdefaprPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdefaprPeer::DATABASE_NAME);

		$criteria->add(CpdefaprPeer::ID, $this->id);

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

		$copyObj->setStacon($this->stacon);

		$copyObj->setAbrstacon($this->abrstacon);

		$copyObj->setStagob($this->stagob);

		$copyObj->setAbrstagob($this->abrstagob);

		$copyObj->setStapre($this->stapre);

		$copyObj->setAbrstapre($this->abrstapre);

		$copyObj->setStaniv4($this->staniv4);

		$copyObj->setAbrstaniv4($this->abrstaniv4);

		$copyObj->setStaniv5($this->staniv5);

		$copyObj->setAbrstaniv5($this->abrstaniv5);

		$copyObj->setStaniv6($this->staniv6);

		$copyObj->setAbrstaniv6($this->abrstaniv6);


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
			self::$peer = new CpdefaprPeer();
		}
		return self::$peer;
	}

} 