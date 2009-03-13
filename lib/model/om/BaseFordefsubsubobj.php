<?php


abstract class BaseFordefsubsubobj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codequ;


	
	protected $codsubobj;


	
	protected $codsubsubobj;


	
	protected $dessubsubobj;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodequ()
  {

    return trim($this->codequ);

  }
  
  public function getCodsubobj()
  {

    return trim($this->codsubobj);

  }
  
  public function getCodsubsubobj()
  {

    return trim($this->codsubsubobj);

  }
  
  public function getDessubsubobj()
  {

    return trim($this->dessubsubobj);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodequ($v)
	{

    if ($this->codequ !== $v) {
        $this->codequ = $v;
        $this->modifiedColumns[] = FordefsubsubobjPeer::CODEQU;
      }
  
	} 
	
	public function setCodsubobj($v)
	{

    if ($this->codsubobj !== $v) {
        $this->codsubobj = $v;
        $this->modifiedColumns[] = FordefsubsubobjPeer::CODSUBOBJ;
      }
  
	} 
	
	public function setCodsubsubobj($v)
	{

    if ($this->codsubsubobj !== $v) {
        $this->codsubsubobj = $v;
        $this->modifiedColumns[] = FordefsubsubobjPeer::CODSUBSUBOBJ;
      }
  
	} 
	
	public function setDessubsubobj($v)
	{

    if ($this->dessubsubobj !== $v) {
        $this->dessubsubobj = $v;
        $this->modifiedColumns[] = FordefsubsubobjPeer::DESSUBSUBOBJ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefsubsubobjPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codequ = $rs->getString($startcol + 0);

      $this->codsubobj = $rs->getString($startcol + 1);

      $this->codsubsubobj = $rs->getString($startcol + 2);

      $this->dessubsubobj = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefsubsubobj object", $e);
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
			$con = Propel::getConnection(FordefsubsubobjPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefsubsubobjPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefsubsubobjPeer::DATABASE_NAME);
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
					$pk = FordefsubsubobjPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefsubsubobjPeer::doUpdate($this, $con);
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


			if (($retval = FordefsubsubobjPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefsubsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodequ();
				break;
			case 1:
				return $this->getCodsubobj();
				break;
			case 2:
				return $this->getCodsubsubobj();
				break;
			case 3:
				return $this->getDessubsubobj();
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
		$keys = FordefsubsubobjPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodequ(),
			$keys[1] => $this->getCodsubobj(),
			$keys[2] => $this->getCodsubsubobj(),
			$keys[3] => $this->getDessubsubobj(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefsubsubobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodequ($value);
				break;
			case 1:
				$this->setCodsubobj($value);
				break;
			case 2:
				$this->setCodsubsubobj($value);
				break;
			case 3:
				$this->setDessubsubobj($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefsubsubobjPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsubobj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodsubsubobj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDessubsubobj($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefsubsubobjPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefsubsubobjPeer::CODEQU)) $criteria->add(FordefsubsubobjPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(FordefsubsubobjPeer::CODSUBOBJ)) $criteria->add(FordefsubsubobjPeer::CODSUBOBJ, $this->codsubobj);
		if ($this->isColumnModified(FordefsubsubobjPeer::CODSUBSUBOBJ)) $criteria->add(FordefsubsubobjPeer::CODSUBSUBOBJ, $this->codsubsubobj);
		if ($this->isColumnModified(FordefsubsubobjPeer::DESSUBSUBOBJ)) $criteria->add(FordefsubsubobjPeer::DESSUBSUBOBJ, $this->dessubsubobj);
		if ($this->isColumnModified(FordefsubsubobjPeer::ID)) $criteria->add(FordefsubsubobjPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefsubsubobjPeer::DATABASE_NAME);

		$criteria->add(FordefsubsubobjPeer::ID, $this->id);

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

		$copyObj->setCodequ($this->codequ);

		$copyObj->setCodsubobj($this->codsubobj);

		$copyObj->setCodsubsubobj($this->codsubsubobj);

		$copyObj->setDessubsubobj($this->dessubsubobj);


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
			self::$peer = new FordefsubsubobjPeer();
		}
		return self::$peer;
	}

} 