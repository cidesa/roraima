<?php


abstract class BaseLileycon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $archivocon;


	
	protected $archivoreg;


	
	protected $descripcion;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getArchivocon()
  {

    return trim($this->archivocon);

  }
  
  public function getArchivoreg()
  {

    return trim($this->archivoreg);

  }
  
  public function getDescripcion()
  {

    return trim($this->descripcion);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setArchivocon($v)
	{

    if ($this->archivocon !== $v) {
        $this->archivocon = $v;
        $this->modifiedColumns[] = LileyconPeer::ARCHIVOCON;
      }
  
	} 
	
	public function setArchivoreg($v)
	{

    if ($this->archivoreg !== $v) {
        $this->archivoreg = $v;
        $this->modifiedColumns[] = LileyconPeer::ARCHIVOREG;
      }
  
	} 
	
	public function setDescripcion($v)
	{

    if ($this->descripcion !== $v) {
        $this->descripcion = $v;
        $this->modifiedColumns[] = LileyconPeer::DESCRIPCION;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LileyconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->archivocon = $rs->getString($startcol + 0);

      $this->archivoreg = $rs->getString($startcol + 1);

      $this->descripcion = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lileycon object", $e);
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
			$con = Propel::getConnection(LileyconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LileyconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LileyconPeer::DATABASE_NAME);
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
					$pk = LileyconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LileyconPeer::doUpdate($this, $con);
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


			if (($retval = LileyconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LileyconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getArchivocon();
				break;
			case 1:
				return $this->getArchivoreg();
				break;
			case 2:
				return $this->getDescripcion();
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
		$keys = LileyconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getArchivocon(),
			$keys[1] => $this->getArchivoreg(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LileyconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setArchivocon($value);
				break;
			case 1:
				$this->setArchivoreg($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LileyconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setArchivocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setArchivoreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LileyconPeer::DATABASE_NAME);

		if ($this->isColumnModified(LileyconPeer::ARCHIVOCON)) $criteria->add(LileyconPeer::ARCHIVOCON, $this->archivocon);
		if ($this->isColumnModified(LileyconPeer::ARCHIVOREG)) $criteria->add(LileyconPeer::ARCHIVOREG, $this->archivoreg);
		if ($this->isColumnModified(LileyconPeer::DESCRIPCION)) $criteria->add(LileyconPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(LileyconPeer::ID)) $criteria->add(LileyconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LileyconPeer::DATABASE_NAME);

		$criteria->add(LileyconPeer::ID, $this->id);

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

		$copyObj->setArchivocon($this->archivocon);

		$copyObj->setArchivoreg($this->archivoreg);

		$copyObj->setDescripcion($this->descripcion);


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
			self::$peer = new LileyconPeer();
		}
		return self::$peer;
	}

} 