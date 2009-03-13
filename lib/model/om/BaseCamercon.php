<?php


abstract class BaseCamercon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $conmer;


	
	protected $codart;


	
	protected $canrec;


	
	protected $candev;


	
	protected $cantot;


	
	protected $montot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getConmer()
  {

    return trim($this->conmer);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanrec($val=false)
  {

    if($val) return number_format($this->canrec,2,',','.');
    else return $this->canrec;

  }
  
  public function getCandev($val=false)
  {

    if($val) return number_format($this->candev,2,',','.');
    else return $this->candev;

  }
  
  public function getCantot($val=false)
  {

    if($val) return number_format($this->cantot,2,',','.');
    else return $this->cantot;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setConmer($v)
	{

    if ($this->conmer !== $v) {
        $this->conmer = $v;
        $this->modifiedColumns[] = CamerconPeer::CONMER;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CamerconPeer::CODART;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamerconPeer::CANREC;
      }
  
	} 
	
	public function setCandev($v)
	{

    if ($this->candev !== $v) {
        $this->candev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamerconPeer::CANDEV;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamerconPeer::CANTOT;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamerconPeer::MONTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CamerconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->conmer = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canrec = $rs->getFloat($startcol + 2);

      $this->candev = $rs->getFloat($startcol + 3);

      $this->cantot = $rs->getFloat($startcol + 4);

      $this->montot = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Camercon object", $e);
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
			$con = Propel::getConnection(CamerconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CamerconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CamerconPeer::DATABASE_NAME);
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
					$pk = CamerconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CamerconPeer::doUpdate($this, $con);
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


			if (($retval = CamerconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CamerconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getConmer();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanrec();
				break;
			case 3:
				return $this->getCandev();
				break;
			case 4:
				return $this->getCantot();
				break;
			case 5:
				return $this->getMontot();
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
		$keys = CamerconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getConmer(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanrec(),
			$keys[3] => $this->getCandev(),
			$keys[4] => $this->getCantot(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CamerconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setConmer($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanrec($value);
				break;
			case 3:
				$this->setCandev($value);
				break;
			case 4:
				$this->setCantot($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CamerconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setConmer($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCandev($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCantot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CamerconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CamerconPeer::CONMER)) $criteria->add(CamerconPeer::CONMER, $this->conmer);
		if ($this->isColumnModified(CamerconPeer::CODART)) $criteria->add(CamerconPeer::CODART, $this->codart);
		if ($this->isColumnModified(CamerconPeer::CANREC)) $criteria->add(CamerconPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CamerconPeer::CANDEV)) $criteria->add(CamerconPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(CamerconPeer::CANTOT)) $criteria->add(CamerconPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CamerconPeer::MONTOT)) $criteria->add(CamerconPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CamerconPeer::ID)) $criteria->add(CamerconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CamerconPeer::DATABASE_NAME);

		$criteria->add(CamerconPeer::ID, $this->id);

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

		$copyObj->setConmer($this->conmer);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCandev($this->candev);

		$copyObj->setCantot($this->cantot);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new CamerconPeer();
		}
		return self::$peer;
	}

} 