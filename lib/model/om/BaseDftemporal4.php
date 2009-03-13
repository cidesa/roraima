<?php


abstract class BaseDftemporal4 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipo;


	
	protected $abr;


	
	protected $ext;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getAbr()
  {

    return trim($this->abr);

  }
  
  public function getExt()
  {

    return trim($this->ext);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = Dftemporal4Peer::TIPO;
      }
  
	} 
	
	public function setAbr($v)
	{

    if ($this->abr !== $v) {
        $this->abr = $v;
        $this->modifiedColumns[] = Dftemporal4Peer::ABR;
      }
  
	} 
	
	public function setExt($v)
	{

    if ($this->ext !== $v) {
        $this->ext = $v;
        $this->modifiedColumns[] = Dftemporal4Peer::EXT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Dftemporal4Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipo = $rs->getString($startcol + 0);

      $this->abr = $rs->getString($startcol + 1);

      $this->ext = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dftemporal4 object", $e);
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
			$con = Propel::getConnection(Dftemporal4Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Dftemporal4Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Dftemporal4Peer::DATABASE_NAME);
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
					$pk = Dftemporal4Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Dftemporal4Peer::doUpdate($this, $con);
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


			if (($retval = Dftemporal4Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal4Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipo();
				break;
			case 1:
				return $this->getAbr();
				break;
			case 2:
				return $this->getExt();
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
		$keys = Dftemporal4Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipo(),
			$keys[1] => $this->getAbr(),
			$keys[2] => $this->getExt(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal4Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipo($value);
				break;
			case 1:
				$this->setAbr($value);
				break;
			case 2:
				$this->setExt($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Dftemporal4Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAbr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setExt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Dftemporal4Peer::DATABASE_NAME);

		if ($this->isColumnModified(Dftemporal4Peer::TIPO)) $criteria->add(Dftemporal4Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Dftemporal4Peer::ABR)) $criteria->add(Dftemporal4Peer::ABR, $this->abr);
		if ($this->isColumnModified(Dftemporal4Peer::EXT)) $criteria->add(Dftemporal4Peer::EXT, $this->ext);
		if ($this->isColumnModified(Dftemporal4Peer::ID)) $criteria->add(Dftemporal4Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Dftemporal4Peer::DATABASE_NAME);

		$criteria->add(Dftemporal4Peer::ID, $this->id);

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

		$copyObj->setTipo($this->tipo);

		$copyObj->setAbr($this->abr);

		$copyObj->setExt($this->ext);


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
			self::$peer = new Dftemporal4Peer();
		}
		return self::$peer;
	}

} 