<?php


abstract class BaseFadescartpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddesc;


	
	protected $refdoc;


	
	protected $codart;


	
	protected $mondesc;


	
	protected $mondetdesc;


	
	protected $tipdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddesc()
  {

    return trim($this->coddesc);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getMondetdesc($val=false)
  {

    if($val) return number_format($this->mondetdesc,2,',','.');
    else return $this->mondetdesc;

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddesc($v)
	{

    if ($this->coddesc !== $v) {
        $this->coddesc = $v;
        $this->modifiedColumns[] = FadescartproPeer::CODDESC;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = FadescartproPeer::REFDOC;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FadescartproPeer::CODART;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadescartproPeer::MONDESC;
      }
  
	} 
	
	public function setMondetdesc($v)
	{

    if ($this->mondetdesc !== $v) {
        $this->mondetdesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadescartproPeer::MONDETDESC;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = FadescartproPeer::TIPDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadescartproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddesc = $rs->getString($startcol + 0);

      $this->refdoc = $rs->getString($startcol + 1);

      $this->codart = $rs->getString($startcol + 2);

      $this->mondesc = $rs->getFloat($startcol + 3);

      $this->mondetdesc = $rs->getFloat($startcol + 4);

      $this->tipdoc = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadescartpro object", $e);
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
			$con = Propel::getConnection(FadescartproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadescartproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadescartproPeer::DATABASE_NAME);
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
					$pk = FadescartproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadescartproPeer::doUpdate($this, $con);
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


			if (($retval = FadescartproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadescartproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddesc();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getMondesc();
				break;
			case 4:
				return $this->getMondetdesc();
				break;
			case 5:
				return $this->getTipdoc();
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
		$keys = FadescartproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddesc(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getMondesc(),
			$keys[4] => $this->getMondetdesc(),
			$keys[5] => $this->getTipdoc(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadescartproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddesc($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setMondesc($value);
				break;
			case 4:
				$this->setMondetdesc($value);
				break;
			case 5:
				$this->setTipdoc($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadescartproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddesc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMondesc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondetdesc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipdoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadescartproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadescartproPeer::CODDESC)) $criteria->add(FadescartproPeer::CODDESC, $this->coddesc);
		if ($this->isColumnModified(FadescartproPeer::REFDOC)) $criteria->add(FadescartproPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(FadescartproPeer::CODART)) $criteria->add(FadescartproPeer::CODART, $this->codart);
		if ($this->isColumnModified(FadescartproPeer::MONDESC)) $criteria->add(FadescartproPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FadescartproPeer::MONDETDESC)) $criteria->add(FadescartproPeer::MONDETDESC, $this->mondetdesc);
		if ($this->isColumnModified(FadescartproPeer::TIPDOC)) $criteria->add(FadescartproPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(FadescartproPeer::ID)) $criteria->add(FadescartproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadescartproPeer::DATABASE_NAME);

		$criteria->add(FadescartproPeer::ID, $this->id);

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

		$copyObj->setCoddesc($this->coddesc);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodart($this->codart);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setMondetdesc($this->mondetdesc);

		$copyObj->setTipdoc($this->tipdoc);


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
			self::$peer = new FadescartproPeer();
		}
		return self::$peer;
	}

} 