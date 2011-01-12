<?php


abstract class BaseCatipalmpv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtippv;


	
	protected $nomtippv;


	
	protected $metdes;


	
	protected $methas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtippv()
  {

    return trim($this->codtippv);

  }
  
  public function getNomtippv()
  {

    return trim($this->nomtippv);

  }
  
  public function getMetdes($val=false)
  {

    if($val) return number_format($this->metdes,2,',','.');
    else return $this->metdes;

  }
  
  public function getMethas($val=false)
  {

    if($val) return number_format($this->methas,2,',','.');
    else return $this->methas;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtippv($v)
	{

    if ($this->codtippv !== $v) {
        $this->codtippv = $v;
        $this->modifiedColumns[] = CatipalmpvPeer::CODTIPPV;
      }
  
	} 
	
	public function setNomtippv($v)
	{

    if ($this->nomtippv !== $v) {
        $this->nomtippv = $v;
        $this->modifiedColumns[] = CatipalmpvPeer::NOMTIPPV;
      }
  
	} 
	
	public function setMetdes($v)
	{

    if ($this->metdes !== $v) {
        $this->metdes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatipalmpvPeer::METDES;
      }
  
	} 
	
	public function setMethas($v)
	{

    if ($this->methas !== $v) {
        $this->methas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatipalmpvPeer::METHAS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatipalmpvPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtippv = $rs->getString($startcol + 0);

      $this->nomtippv = $rs->getString($startcol + 1);

      $this->metdes = $rs->getFloat($startcol + 2);

      $this->methas = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catipalmpv object", $e);
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
			$con = Propel::getConnection(CatipalmpvPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatipalmpvPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatipalmpvPeer::DATABASE_NAME);
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
					$pk = CatipalmpvPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatipalmpvPeer::doUpdate($this, $con);
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


			if (($retval = CatipalmpvPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatipalmpvPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtippv();
				break;
			case 1:
				return $this->getNomtippv();
				break;
			case 2:
				return $this->getMetdes();
				break;
			case 3:
				return $this->getMethas();
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
		$keys = CatipalmpvPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtippv(),
			$keys[1] => $this->getNomtippv(),
			$keys[2] => $this->getMetdes(),
			$keys[3] => $this->getMethas(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatipalmpvPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtippv($value);
				break;
			case 1:
				$this->setNomtippv($value);
				break;
			case 2:
				$this->setMetdes($value);
				break;
			case 3:
				$this->setMethas($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatipalmpvPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtippv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtippv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMetdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMethas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatipalmpvPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatipalmpvPeer::CODTIPPV)) $criteria->add(CatipalmpvPeer::CODTIPPV, $this->codtippv);
		if ($this->isColumnModified(CatipalmpvPeer::NOMTIPPV)) $criteria->add(CatipalmpvPeer::NOMTIPPV, $this->nomtippv);
		if ($this->isColumnModified(CatipalmpvPeer::METDES)) $criteria->add(CatipalmpvPeer::METDES, $this->metdes);
		if ($this->isColumnModified(CatipalmpvPeer::METHAS)) $criteria->add(CatipalmpvPeer::METHAS, $this->methas);
		if ($this->isColumnModified(CatipalmpvPeer::ID)) $criteria->add(CatipalmpvPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatipalmpvPeer::DATABASE_NAME);

		$criteria->add(CatipalmpvPeer::ID, $this->id);

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

		$copyObj->setCodtippv($this->codtippv);

		$copyObj->setNomtippv($this->nomtippv);

		$copyObj->setMetdes($this->metdes);

		$copyObj->setMethas($this->methas);


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
			self::$peer = new CatipalmpvPeer();
		}
		return self::$peer;
	}

} 