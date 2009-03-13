<?php


abstract class BaseOpdetaut extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $refcom;


	
	protected $codpre;


	
	protected $moncau;


	
	protected $mondes;


	
	protected $monret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpdetautPeer::NUMORD;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = OpdetautPeer::REFCOM;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OpdetautPeer::CODPRE;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetautPeer::MONCAU;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetautPeer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetautPeer::MONRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpdetautPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->refcom = $rs->getString($startcol + 1);

      $this->codpre = $rs->getString($startcol + 2);

      $this->moncau = $rs->getFloat($startcol + 3);

      $this->mondes = $rs->getFloat($startcol + 4);

      $this->monret = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opdetaut object", $e);
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
			$con = Propel::getConnection(OpdetautPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdetautPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdetautPeer::DATABASE_NAME);
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
					$pk = OpdetautPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpdetautPeer::doUpdate($this, $con);
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


			if (($retval = OpdetautPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetautPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getRefcom();
				break;
			case 2:
				return $this->getCodpre();
				break;
			case 3:
				return $this->getMoncau();
				break;
			case 4:
				return $this->getMondes();
				break;
			case 5:
				return $this->getMonret();
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
		$keys = OpdetautPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getRefcom(),
			$keys[2] => $this->getCodpre(),
			$keys[3] => $this->getMoncau(),
			$keys[4] => $this->getMondes(),
			$keys[5] => $this->getMonret(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetautPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setRefcom($value);
				break;
			case 2:
				$this->setCodpre($value);
				break;
			case 3:
				$this->setMoncau($value);
				break;
			case 4:
				$this->setMondes($value);
				break;
			case 5:
				$this->setMonret($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdetautPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncau($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonret($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdetautPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdetautPeer::NUMORD)) $criteria->add(OpdetautPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpdetautPeer::REFCOM)) $criteria->add(OpdetautPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OpdetautPeer::CODPRE)) $criteria->add(OpdetautPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpdetautPeer::MONCAU)) $criteria->add(OpdetautPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(OpdetautPeer::MONDES)) $criteria->add(OpdetautPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(OpdetautPeer::MONRET)) $criteria->add(OpdetautPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpdetautPeer::ID)) $criteria->add(OpdetautPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdetautPeer::DATABASE_NAME);

		$criteria->add(OpdetautPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);


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
			self::$peer = new OpdetautPeer();
		}
		return self::$peer;
	}

} 