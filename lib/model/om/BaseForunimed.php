<?php


abstract class BaseForunimed extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduni;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getNomext()
  {

    return trim($this->nomext);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = ForunimedPeer::CODUNI;
      }
  
	} 
	
	public function setNomext($v)
	{

    if ($this->nomext !== $v) {
        $this->nomext = $v;
        $this->modifiedColumns[] = ForunimedPeer::NOMEXT;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = ForunimedPeer::NOMABR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForunimedPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduni = $rs->getString($startcol + 0);

      $this->nomext = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forunimed object", $e);
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
			$con = Propel::getConnection(ForunimedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForunimedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForunimedPeer::DATABASE_NAME);
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
					$pk = ForunimedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForunimedPeer::doUpdate($this, $con);
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


			if (($retval = ForunimedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForunimedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduni();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForunimedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduni(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForunimedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduni($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForunimedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForunimedPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForunimedPeer::CODUNI)) $criteria->add(ForunimedPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(ForunimedPeer::NOMEXT)) $criteria->add(ForunimedPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(ForunimedPeer::NOMABR)) $criteria->add(ForunimedPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(ForunimedPeer::ID)) $criteria->add(ForunimedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForunimedPeer::DATABASE_NAME);

		$criteria->add(ForunimedPeer::ID, $this->id);

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

		$copyObj->setCoduni($this->coduni);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);


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
			self::$peer = new ForunimedPeer();
		}
		return self::$peer;
	}

} 