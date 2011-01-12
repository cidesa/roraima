<?php


abstract class BaseFcdprinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $anovig;


	
	protected $antinm;


	
	protected $codestinm;


	
	protected $mondpr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAnovig()
  {

    return trim($this->anovig);

  }
  
  public function getAntinm($val=false)
  {

    if($val) return number_format($this->antinm,2,',','.');
    else return $this->antinm;

  }
  
  public function getCodestinm()
  {

    return trim($this->codestinm);

  }
  
  public function getMondpr($val=false)
  {

    if($val) return number_format($this->mondpr,2,',','.');
    else return $this->mondpr;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAnovig($v)
	{

    if ($this->anovig !== $v) {
        $this->anovig = $v;
        $this->modifiedColumns[] = FcdprinmPeer::ANOVIG;
      }
  
	} 
	
	public function setAntinm($v)
	{

    if ($this->antinm !== $v) {
        $this->antinm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdprinmPeer::ANTINM;
      }
  
	} 
	
	public function setCodestinm($v)
	{

    if ($this->codestinm !== $v) {
        $this->codestinm = $v;
        $this->modifiedColumns[] = FcdprinmPeer::CODESTINM;
      }
  
	} 
	
	public function setMondpr($v)
	{

    if ($this->mondpr !== $v) {
        $this->mondpr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdprinmPeer::MONDPR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdprinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->anovig = $rs->getString($startcol + 0);

      $this->antinm = $rs->getFloat($startcol + 1);

      $this->codestinm = $rs->getString($startcol + 2);

      $this->mondpr = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdprinm object", $e);
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
			$con = Propel::getConnection(FcdprinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdprinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdprinmPeer::DATABASE_NAME);
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
					$pk = FcdprinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdprinmPeer::doUpdate($this, $con);
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


			if (($retval = FcdprinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdprinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAnovig();
				break;
			case 1:
				return $this->getAntinm();
				break;
			case 2:
				return $this->getCodestinm();
				break;
			case 3:
				return $this->getMondpr();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdprinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAnovig(),
			$keys[1] => $this->getAntinm(),
			$keys[2] => $this->getCodestinm(),
			$keys[3] => $this->getMondpr(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdprinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAnovig($value);
				break;
			case 1:
				$this->setAntinm($value);
				break;
			case 2:
				$this->setCodestinm($value);
				break;
			case 3:
				$this->setMondpr($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdprinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAnovig($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAntinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodestinm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMondpr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdprinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdprinmPeer::ANOVIG)) $criteria->add(FcdprinmPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FcdprinmPeer::ANTINM)) $criteria->add(FcdprinmPeer::ANTINM, $this->antinm);
		if ($this->isColumnModified(FcdprinmPeer::CODESTINM)) $criteria->add(FcdprinmPeer::CODESTINM, $this->codestinm);
		if ($this->isColumnModified(FcdprinmPeer::MONDPR)) $criteria->add(FcdprinmPeer::MONDPR, $this->mondpr);
		if ($this->isColumnModified(FcdprinmPeer::ID)) $criteria->add(FcdprinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdprinmPeer::DATABASE_NAME);

		$criteria->add(FcdprinmPeer::ID, $this->id);

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

		$copyObj->setAnovig($this->anovig);

		$copyObj->setAntinm($this->antinm);

		$copyObj->setCodestinm($this->codestinm);

		$copyObj->setMondpr($this->mondpr);


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
			self::$peer = new FcdprinmPeer();
		}
		return self::$peer;
	}

} 