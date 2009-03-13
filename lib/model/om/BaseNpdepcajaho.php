<?php


abstract class BaseNpdepcajaho extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numlin;


	
	protected $desdep;


	
	protected $codemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumlin($val=false)
  {

    if($val) return number_format($this->numlin,2,',','.');
    else return $this->numlin;

  }
  
  public function getDesdep()
  {

    return trim($this->desdep);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumlin($v)
	{

    if ($this->numlin !== $v) {
        $this->numlin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdepcajahoPeer::NUMLIN;
      }
  
	} 
	
	public function setDesdep($v)
	{

    if ($this->desdep !== $v) {
        $this->desdep = $v;
        $this->modifiedColumns[] = NpdepcajahoPeer::DESDEP;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpdepcajahoPeer::CODEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdepcajahoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numlin = $rs->getFloat($startcol + 0);

      $this->desdep = $rs->getString($startcol + 1);

      $this->codemp = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdepcajaho object", $e);
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
			$con = Propel::getConnection(NpdepcajahoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdepcajahoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdepcajahoPeer::DATABASE_NAME);
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
					$pk = NpdepcajahoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdepcajahoPeer::doUpdate($this, $con);
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


			if (($retval = NpdepcajahoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdepcajahoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumlin();
				break;
			case 1:
				return $this->getDesdep();
				break;
			case 2:
				return $this->getCodemp();
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
		$keys = NpdepcajahoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumlin(),
			$keys[1] => $this->getDesdep(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdepcajahoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumlin($value);
				break;
			case 1:
				$this->setDesdep($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdepcajahoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumlin($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdep($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdepcajahoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdepcajahoPeer::NUMLIN)) $criteria->add(NpdepcajahoPeer::NUMLIN, $this->numlin);
		if ($this->isColumnModified(NpdepcajahoPeer::DESDEP)) $criteria->add(NpdepcajahoPeer::DESDEP, $this->desdep);
		if ($this->isColumnModified(NpdepcajahoPeer::CODEMP)) $criteria->add(NpdepcajahoPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpdepcajahoPeer::ID)) $criteria->add(NpdepcajahoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdepcajahoPeer::DATABASE_NAME);

		$criteria->add(NpdepcajahoPeer::ID, $this->id);

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

		$copyObj->setNumlin($this->numlin);

		$copyObj->setDesdep($this->desdep);

		$copyObj->setCodemp($this->codemp);


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
			self::$peer = new NpdepcajahoPeer();
		}
		return self::$peer;
	}

} 