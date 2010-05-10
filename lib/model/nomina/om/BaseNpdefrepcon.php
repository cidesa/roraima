<?php


abstract class BaseNpdefrepcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $codrep;


	
	protected $desrep;


	
	protected $numcol;


	
	protected $descol;


	
	protected $codcon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCodrep()
  {

    return trim($this->codrep);

  }
  
  public function getDesrep()
  {

    return trim($this->desrep);

  }
  
  public function getNumcol()
  {

    return $this->numcol;

  }
  
  public function getDescol()
  {

    return trim($this->descol);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefrepconPeer::ID;
      }
  
	} 
	
	public function setCodrep($v)
	{

    if ($this->codrep !== $v) {
        $this->codrep = $v;
        $this->modifiedColumns[] = NpdefrepconPeer::CODREP;
      }
  
	} 
	
	public function setDesrep($v)
	{

    if ($this->desrep !== $v) {
        $this->desrep = $v;
        $this->modifiedColumns[] = NpdefrepconPeer::DESREP;
      }
  
	} 
	
	public function setNumcol($v)
	{

    if ($this->numcol !== $v) {
        $this->numcol = $v;
        $this->modifiedColumns[] = NpdefrepconPeer::NUMCOL;
      }
  
	} 
	
	public function setDescol($v)
	{

    if ($this->descol !== $v) {
        $this->descol = $v;
        $this->modifiedColumns[] = NpdefrepconPeer::DESCOL;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpdefrepconPeer::CODCON;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->codrep = $rs->getString($startcol + 1);

      $this->desrep = $rs->getString($startcol + 2);

      $this->numcol = $rs->getInt($startcol + 3);

      $this->descol = $rs->getString($startcol + 4);

      $this->codcon = $rs->getString($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefrepcon object", $e);
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
			$con = Propel::getConnection(NpdefrepconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefrepconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefrepconPeer::DATABASE_NAME);
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
					$pk = NpdefrepconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdefrepconPeer::doUpdate($this, $con);
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


			if (($retval = NpdefrepconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefrepconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCodrep();
				break;
			case 2:
				return $this->getDesrep();
				break;
			case 3:
				return $this->getNumcol();
				break;
			case 4:
				return $this->getDescol();
				break;
			case 5:
				return $this->getCodcon();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefrepconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCodrep(),
			$keys[2] => $this->getDesrep(),
			$keys[3] => $this->getNumcol(),
			$keys[4] => $this->getDescol(),
			$keys[5] => $this->getCodcon(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefrepconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCodrep($value);
				break;
			case 2:
				$this->setDesrep($value);
				break;
			case 3:
				$this->setNumcol($value);
				break;
			case 4:
				$this->setDescol($value);
				break;
			case 5:
				$this->setCodcon($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefrepconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrep($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrep($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumcol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcon($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefrepconPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefrepconPeer::ID)) $criteria->add(NpdefrepconPeer::ID, $this->id);
		if ($this->isColumnModified(NpdefrepconPeer::CODREP)) $criteria->add(NpdefrepconPeer::CODREP, $this->codrep);
		if ($this->isColumnModified(NpdefrepconPeer::DESREP)) $criteria->add(NpdefrepconPeer::DESREP, $this->desrep);
		if ($this->isColumnModified(NpdefrepconPeer::NUMCOL)) $criteria->add(NpdefrepconPeer::NUMCOL, $this->numcol);
		if ($this->isColumnModified(NpdefrepconPeer::DESCOL)) $criteria->add(NpdefrepconPeer::DESCOL, $this->descol);
		if ($this->isColumnModified(NpdefrepconPeer::CODCON)) $criteria->add(NpdefrepconPeer::CODCON, $this->codcon);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefrepconPeer::DATABASE_NAME);

		$criteria->add(NpdefrepconPeer::ID, $this->id);

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

		$copyObj->setCodrep($this->codrep);

		$copyObj->setDesrep($this->desrep);

		$copyObj->setNumcol($this->numcol);

		$copyObj->setDescol($this->descol);

		$copyObj->setCodcon($this->codcon);


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
			self::$peer = new NpdefrepconPeer();
		}
		return self::$peer;
	}

} 