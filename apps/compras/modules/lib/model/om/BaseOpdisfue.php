<?php


abstract class BaseOpdisfue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $codpre;


	
	protected $fuefin;


	
	protected $monfue;


	
	protected $correl;


	
	protected $origen;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getFuefin()
  {

    return trim($this->fuefin);

  }
  
  public function getMonfue($val=false)
  {

    if($val) return number_format($this->monfue,2,',','.');
    else return $this->monfue;

  }
  
  public function getCorrel()
  {

    return trim($this->correl);

  }
  
  public function getOrigen()
  {

    return trim($this->origen);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpdisfuePeer::NUMORD;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OpdisfuePeer::CODPRE;
      }
  
	} 
	
	public function setFuefin($v)
	{

    if ($this->fuefin !== $v) {
        $this->fuefin = $v;
        $this->modifiedColumns[] = OpdisfuePeer::FUEFIN;
      }
  
	} 
	
	public function setMonfue($v)
	{

    if ($this->monfue !== $v) {
        $this->monfue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdisfuePeer::MONFUE;
      }
  
	} 
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = $v;
        $this->modifiedColumns[] = OpdisfuePeer::CORREL;
      }
  
	} 
	
	public function setOrigen($v)
	{

    if ($this->origen !== $v) {
        $this->origen = $v;
        $this->modifiedColumns[] = OpdisfuePeer::ORIGEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpdisfuePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->fuefin = $rs->getString($startcol + 2);

      $this->monfue = $rs->getFloat($startcol + 3);

      $this->correl = $rs->getString($startcol + 4);

      $this->origen = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opdisfue object", $e);
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
			$con = Propel::getConnection(OpdisfuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdisfuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdisfuePeer::DATABASE_NAME);
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
					$pk = OpdisfuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpdisfuePeer::doUpdate($this, $con);
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


			if (($retval = OpdisfuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdisfuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getFuefin();
				break;
			case 3:
				return $this->getMonfue();
				break;
			case 4:
				return $this->getCorrel();
				break;
			case 5:
				return $this->getOrigen();
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
		$keys = OpdisfuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getFuefin(),
			$keys[3] => $this->getMonfue(),
			$keys[4] => $this->getCorrel(),
			$keys[5] => $this->getOrigen(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdisfuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setFuefin($value);
				break;
			case 3:
				$this->setMonfue($value);
				break;
			case 4:
				$this->setCorrel($value);
				break;
			case 5:
				$this->setOrigen($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdisfuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFuefin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonfue($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCorrel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrigen($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdisfuePeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdisfuePeer::NUMORD)) $criteria->add(OpdisfuePeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpdisfuePeer::CODPRE)) $criteria->add(OpdisfuePeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpdisfuePeer::FUEFIN)) $criteria->add(OpdisfuePeer::FUEFIN, $this->fuefin);
		if ($this->isColumnModified(OpdisfuePeer::MONFUE)) $criteria->add(OpdisfuePeer::MONFUE, $this->monfue);
		if ($this->isColumnModified(OpdisfuePeer::CORREL)) $criteria->add(OpdisfuePeer::CORREL, $this->correl);
		if ($this->isColumnModified(OpdisfuePeer::ORIGEN)) $criteria->add(OpdisfuePeer::ORIGEN, $this->origen);
		if ($this->isColumnModified(OpdisfuePeer::ID)) $criteria->add(OpdisfuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdisfuePeer::DATABASE_NAME);

		$criteria->add(OpdisfuePeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setFuefin($this->fuefin);

		$copyObj->setMonfue($this->monfue);

		$copyObj->setCorrel($this->correl);

		$copyObj->setOrigen($this->origen);


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
			self::$peer = new OpdisfuePeer();
		}
		return self::$peer;
	}

} 