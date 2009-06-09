<?php


abstract class BaseNpcajaho extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codconpat;


	
	protected $codcontra;


	
	protected $codconpre;


	
	protected $codconamo;


	
	protected $codconint;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodconpat()
  {

    return trim($this->codconpat);

  }
  
  public function getCodcontra()
  {

    return trim($this->codcontra);

  }
  
  public function getCodconpre()
  {

    return trim($this->codconpre);

  }
  
  public function getCodconamo()
  {

    return trim($this->codconamo);

  }
  
  public function getCodconint()
  {

    return trim($this->codconint);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpcajahoPeer::CODNOM;
      }
  
	} 
	
	public function setCodconpat($v)
	{

    if ($this->codconpat !== $v) {
        $this->codconpat = $v;
        $this->modifiedColumns[] = NpcajahoPeer::CODCONPAT;
      }
  
	} 
	
	public function setCodcontra($v)
	{

    if ($this->codcontra !== $v) {
        $this->codcontra = $v;
        $this->modifiedColumns[] = NpcajahoPeer::CODCONTRA;
      }
  
	} 
	
	public function setCodconpre($v)
	{

    if ($this->codconpre !== $v) {
        $this->codconpre = $v;
        $this->modifiedColumns[] = NpcajahoPeer::CODCONPRE;
      }
  
	} 
	
	public function setCodconamo($v)
	{

    if ($this->codconamo !== $v) {
        $this->codconamo = $v;
        $this->modifiedColumns[] = NpcajahoPeer::CODCONAMO;
      }
  
	} 
	
	public function setCodconint($v)
	{

    if ($this->codconint !== $v) {
        $this->codconint = $v;
        $this->modifiedColumns[] = NpcajahoPeer::CODCONINT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcajahoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codconpat = $rs->getString($startcol + 1);

      $this->codcontra = $rs->getString($startcol + 2);

      $this->codconpre = $rs->getString($startcol + 3);

      $this->codconamo = $rs->getString($startcol + 4);

      $this->codconint = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcajaho object", $e);
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
			$con = Propel::getConnection(NpcajahoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcajahoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcajahoPeer::DATABASE_NAME);
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
					$pk = NpcajahoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcajahoPeer::doUpdate($this, $con);
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


			if (($retval = NpcajahoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcajahoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodconpat();
				break;
			case 2:
				return $this->getCodcontra();
				break;
			case 3:
				return $this->getCodconpre();
				break;
			case 4:
				return $this->getCodconamo();
				break;
			case 5:
				return $this->getCodconint();
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
		$keys = NpcajahoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodconpat(),
			$keys[2] => $this->getCodcontra(),
			$keys[3] => $this->getCodconpre(),
			$keys[4] => $this->getCodconamo(),
			$keys[5] => $this->getCodconint(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcajahoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodconpat($value);
				break;
			case 2:
				$this->setCodcontra($value);
				break;
			case 3:
				$this->setCodconpre($value);
				break;
			case 4:
				$this->setCodconamo($value);
				break;
			case 5:
				$this->setCodconint($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcajahoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodconpat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcontra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodconpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodconamo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodconint($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcajahoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcajahoPeer::CODNOM)) $criteria->add(NpcajahoPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpcajahoPeer::CODCONPAT)) $criteria->add(NpcajahoPeer::CODCONPAT, $this->codconpat);
		if ($this->isColumnModified(NpcajahoPeer::CODCONTRA)) $criteria->add(NpcajahoPeer::CODCONTRA, $this->codcontra);
		if ($this->isColumnModified(NpcajahoPeer::CODCONPRE)) $criteria->add(NpcajahoPeer::CODCONPRE, $this->codconpre);
		if ($this->isColumnModified(NpcajahoPeer::CODCONAMO)) $criteria->add(NpcajahoPeer::CODCONAMO, $this->codconamo);
		if ($this->isColumnModified(NpcajahoPeer::CODCONINT)) $criteria->add(NpcajahoPeer::CODCONINT, $this->codconint);
		if ($this->isColumnModified(NpcajahoPeer::ID)) $criteria->add(NpcajahoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcajahoPeer::DATABASE_NAME);

		$criteria->add(NpcajahoPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodconpat($this->codconpat);

		$copyObj->setCodcontra($this->codcontra);

		$copyObj->setCodconpre($this->codconpre);

		$copyObj->setCodconamo($this->codconamo);

		$copyObj->setCodconint($this->codconint);


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
			self::$peer = new NpcajahoPeer();
		}
		return self::$peer;
	}

} 