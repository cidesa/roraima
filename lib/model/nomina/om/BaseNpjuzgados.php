<?php


abstract class BaseNpjuzgados extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codjuz;


	
	protected $desjuz;


	
	protected $perconjuz;


	
	protected $carperjuz;


	
	protected $dirjuz;


	
	protected $teljuz;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodjuz()
  {

    return trim($this->codjuz);

  }
  
  public function getDesjuz()
  {

    return trim($this->desjuz);

  }
  
  public function getPerconjuz()
  {

    return trim($this->perconjuz);

  }
  
  public function getCarperjuz()
  {

    return trim($this->carperjuz);

  }
  
  public function getDirjuz()
  {

    return trim($this->dirjuz);

  }
  
  public function getTeljuz()
  {

    return trim($this->teljuz);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodjuz($v)
	{

    if ($this->codjuz !== $v) {
        $this->codjuz = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::CODJUZ;
      }
  
	} 
	
	public function setDesjuz($v)
	{

    if ($this->desjuz !== $v) {
        $this->desjuz = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::DESJUZ;
      }
  
	} 
	
	public function setPerconjuz($v)
	{

    if ($this->perconjuz !== $v) {
        $this->perconjuz = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::PERCONJUZ;
      }
  
	} 
	
	public function setCarperjuz($v)
	{

    if ($this->carperjuz !== $v) {
        $this->carperjuz = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::CARPERJUZ;
      }
  
	} 
	
	public function setDirjuz($v)
	{

    if ($this->dirjuz !== $v) {
        $this->dirjuz = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::DIRJUZ;
      }
  
	} 
	
	public function setTeljuz($v)
	{

    if ($this->teljuz !== $v) {
        $this->teljuz = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::TELJUZ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpjuzgadosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codjuz = $rs->getString($startcol + 0);

      $this->desjuz = $rs->getString($startcol + 1);

      $this->perconjuz = $rs->getString($startcol + 2);

      $this->carperjuz = $rs->getString($startcol + 3);

      $this->dirjuz = $rs->getString($startcol + 4);

      $this->teljuz = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npjuzgados object", $e);
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
			$con = Propel::getConnection(NpjuzgadosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpjuzgadosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpjuzgadosPeer::DATABASE_NAME);
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
					$pk = NpjuzgadosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpjuzgadosPeer::doUpdate($this, $con);
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


			if (($retval = NpjuzgadosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpjuzgadosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodjuz();
				break;
			case 1:
				return $this->getDesjuz();
				break;
			case 2:
				return $this->getPerconjuz();
				break;
			case 3:
				return $this->getCarperjuz();
				break;
			case 4:
				return $this->getDirjuz();
				break;
			case 5:
				return $this->getTeljuz();
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
		$keys = NpjuzgadosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodjuz(),
			$keys[1] => $this->getDesjuz(),
			$keys[2] => $this->getPerconjuz(),
			$keys[3] => $this->getCarperjuz(),
			$keys[4] => $this->getDirjuz(),
			$keys[5] => $this->getTeljuz(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpjuzgadosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodjuz($value);
				break;
			case 1:
				$this->setDesjuz($value);
				break;
			case 2:
				$this->setPerconjuz($value);
				break;
			case 3:
				$this->setCarperjuz($value);
				break;
			case 4:
				$this->setDirjuz($value);
				break;
			case 5:
				$this->setTeljuz($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpjuzgadosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodjuz($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesjuz($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerconjuz($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCarperjuz($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirjuz($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTeljuz($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpjuzgadosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpjuzgadosPeer::CODJUZ)) $criteria->add(NpjuzgadosPeer::CODJUZ, $this->codjuz);
		if ($this->isColumnModified(NpjuzgadosPeer::DESJUZ)) $criteria->add(NpjuzgadosPeer::DESJUZ, $this->desjuz);
		if ($this->isColumnModified(NpjuzgadosPeer::PERCONJUZ)) $criteria->add(NpjuzgadosPeer::PERCONJUZ, $this->perconjuz);
		if ($this->isColumnModified(NpjuzgadosPeer::CARPERJUZ)) $criteria->add(NpjuzgadosPeer::CARPERJUZ, $this->carperjuz);
		if ($this->isColumnModified(NpjuzgadosPeer::DIRJUZ)) $criteria->add(NpjuzgadosPeer::DIRJUZ, $this->dirjuz);
		if ($this->isColumnModified(NpjuzgadosPeer::TELJUZ)) $criteria->add(NpjuzgadosPeer::TELJUZ, $this->teljuz);
		if ($this->isColumnModified(NpjuzgadosPeer::ID)) $criteria->add(NpjuzgadosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpjuzgadosPeer::DATABASE_NAME);

		$criteria->add(NpjuzgadosPeer::ID, $this->id);

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

		$copyObj->setCodjuz($this->codjuz);

		$copyObj->setDesjuz($this->desjuz);

		$copyObj->setPerconjuz($this->perconjuz);

		$copyObj->setCarperjuz($this->carperjuz);

		$copyObj->setDirjuz($this->dirjuz);

		$copyObj->setTeljuz($this->teljuz);


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
			self::$peer = new NpjuzgadosPeer();
		}
		return self::$peer;
	}

} 