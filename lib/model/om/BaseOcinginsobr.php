<?php


abstract class BaseOcinginsobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $cedins;


	
	protected $nomins;


	
	protected $numciv;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCedins()
  {

    return trim($this->cedins);

  }
  
  public function getNomins()
  {

    return trim($this->nomins);

  }
  
  public function getNumciv()
  {

    return trim($this->numciv);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = OcinginsobrPeer::CODOBR;
      }
  
	} 
	
	public function setCedins($v)
	{

    if ($this->cedins !== $v) {
        $this->cedins = $v;
        $this->modifiedColumns[] = OcinginsobrPeer::CEDINS;
      }
  
	} 
	
	public function setNomins($v)
	{

    if ($this->nomins !== $v) {
        $this->nomins = $v;
        $this->modifiedColumns[] = OcinginsobrPeer::NOMINS;
      }
  
	} 
	
	public function setNumciv($v)
	{

    if ($this->numciv !== $v) {
        $this->numciv = $v;
        $this->modifiedColumns[] = OcinginsobrPeer::NUMCIV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcinginsobrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codobr = $rs->getString($startcol + 0);

      $this->cedins = $rs->getString($startcol + 1);

      $this->nomins = $rs->getString($startcol + 2);

      $this->numciv = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocinginsobr object", $e);
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
			$con = Propel::getConnection(OcinginsobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcinginsobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcinginsobrPeer::DATABASE_NAME);
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
					$pk = OcinginsobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcinginsobrPeer::doUpdate($this, $con);
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


			if (($retval = OcinginsobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinginsobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getCedins();
				break;
			case 2:
				return $this->getNomins();
				break;
			case 3:
				return $this->getNumciv();
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
		$keys = OcinginsobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getCedins(),
			$keys[2] => $this->getNomins(),
			$keys[3] => $this->getNumciv(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinginsobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setCedins($value);
				break;
			case 2:
				$this->setNomins($value);
				break;
			case 3:
				$this->setNumciv($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcinginsobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumciv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcinginsobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcinginsobrPeer::CODOBR)) $criteria->add(OcinginsobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcinginsobrPeer::CEDINS)) $criteria->add(OcinginsobrPeer::CEDINS, $this->cedins);
		if ($this->isColumnModified(OcinginsobrPeer::NOMINS)) $criteria->add(OcinginsobrPeer::NOMINS, $this->nomins);
		if ($this->isColumnModified(OcinginsobrPeer::NUMCIV)) $criteria->add(OcinginsobrPeer::NUMCIV, $this->numciv);
		if ($this->isColumnModified(OcinginsobrPeer::ID)) $criteria->add(OcinginsobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcinginsobrPeer::DATABASE_NAME);

		$criteria->add(OcinginsobrPeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCedins($this->cedins);

		$copyObj->setNomins($this->nomins);

		$copyObj->setNumciv($this->numciv);


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
			self::$peer = new OcinginsobrPeer();
		}
		return self::$peer;
	}

} 