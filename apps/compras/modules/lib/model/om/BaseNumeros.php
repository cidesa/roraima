<?php


abstract class BaseNumeros extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $num;


	
	protected $pos;


	
	protected $nomnum;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNum($val=false)
  {

    if($val) return number_format($this->num,2,',','.');
    else return $this->num;

  }
  
  public function getPos($val=false)
  {

    if($val) return number_format($this->pos,2,',','.');
    else return $this->pos;

  }
  
  public function getNomnum()
  {

    return trim($this->nomnum);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNum($v)
	{

    if ($this->num !== $v) {
        $this->num = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NumerosPeer::NUM;
      }
  
	} 
	
	public function setPos($v)
	{

    if ($this->pos !== $v) {
        $this->pos = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NumerosPeer::POS;
      }
  
	} 
	
	public function setNomnum($v)
	{

    if ($this->nomnum !== $v) {
        $this->nomnum = $v;
        $this->modifiedColumns[] = NumerosPeer::NOMNUM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NumerosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->num = $rs->getFloat($startcol + 0);

      $this->pos = $rs->getFloat($startcol + 1);

      $this->nomnum = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Numeros object", $e);
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
			$con = Propel::getConnection(NumerosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NumerosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NumerosPeer::DATABASE_NAME);
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
					$pk = NumerosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NumerosPeer::doUpdate($this, $con);
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


			if (($retval = NumerosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NumerosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNum();
				break;
			case 1:
				return $this->getPos();
				break;
			case 2:
				return $this->getNomnum();
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
		$keys = NumerosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNum(),
			$keys[1] => $this->getPos(),
			$keys[2] => $this->getNomnum(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NumerosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNum($value);
				break;
			case 1:
				$this->setPos($value);
				break;
			case 2:
				$this->setNomnum($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NumerosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNum($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPos($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomnum($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NumerosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NumerosPeer::NUM)) $criteria->add(NumerosPeer::NUM, $this->num);
		if ($this->isColumnModified(NumerosPeer::POS)) $criteria->add(NumerosPeer::POS, $this->pos);
		if ($this->isColumnModified(NumerosPeer::NOMNUM)) $criteria->add(NumerosPeer::NOMNUM, $this->nomnum);
		if ($this->isColumnModified(NumerosPeer::ID)) $criteria->add(NumerosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NumerosPeer::DATABASE_NAME);

		$criteria->add(NumerosPeer::ID, $this->id);

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

		$copyObj->setNum($this->num);

		$copyObj->setPos($this->pos);

		$copyObj->setNomnum($this->nomnum);


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
			self::$peer = new NumerosPeer();
		}
		return self::$peer;
	}

} 