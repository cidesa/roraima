<?php


abstract class BaseNpprimashijos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $parfam;


	
	protected $edaddes;


	
	protected $edadhas;


	
	protected $monto;


	
	protected $estudios;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getParfam()
  {

    return trim($this->parfam);

  }
  
  public function getEdaddes($val=false)
  {

    if($val) return number_format($this->edaddes,2,',','.');
    else return $this->edaddes;

  }
  
  public function getEdadhas($val=false)
  {

    if($val) return number_format($this->edadhas,2,',','.');
    else return $this->edadhas;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getEstudios()
  {

    return trim($this->estudios);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setParfam($v)
	{

    if ($this->parfam !== $v) {
        $this->parfam = $v;
        $this->modifiedColumns[] = NpprimashijosPeer::PARFAM;
      }
  
	} 
	
	public function setEdaddes($v)
	{

    if ($this->edaddes !== $v) {
        $this->edaddes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpprimashijosPeer::EDADDES;
      }
  
	} 
	
	public function setEdadhas($v)
	{

    if ($this->edadhas !== $v) {
        $this->edadhas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpprimashijosPeer::EDADHAS;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpprimashijosPeer::MONTO;
      }
  
	} 
	
	public function setEstudios($v)
	{

    if ($this->estudios !== $v) {
        $this->estudios = $v;
        $this->modifiedColumns[] = NpprimashijosPeer::ESTUDIOS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpprimashijosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->parfam = $rs->getString($startcol + 0);

      $this->edaddes = $rs->getFloat($startcol + 1);

      $this->edadhas = $rs->getFloat($startcol + 2);

      $this->monto = $rs->getFloat($startcol + 3);

      $this->estudios = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npprimashijos object", $e);
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
			$con = Propel::getConnection(NpprimashijosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpprimashijosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpprimashijosPeer::DATABASE_NAME);
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
					$pk = NpprimashijosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpprimashijosPeer::doUpdate($this, $con);
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


			if (($retval = NpprimashijosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprimashijosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getParfam();
				break;
			case 1:
				return $this->getEdaddes();
				break;
			case 2:
				return $this->getEdadhas();
				break;
			case 3:
				return $this->getMonto();
				break;
			case 4:
				return $this->getEstudios();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpprimashijosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getParfam(),
			$keys[1] => $this->getEdaddes(),
			$keys[2] => $this->getEdadhas(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getEstudios(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprimashijosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setParfam($value);
				break;
			case 1:
				$this->setEdaddes($value);
				break;
			case 2:
				$this->setEdadhas($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setEstudios($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpprimashijosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setParfam($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEdaddes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEdadhas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstudios($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpprimashijosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpprimashijosPeer::PARFAM)) $criteria->add(NpprimashijosPeer::PARFAM, $this->parfam);
		if ($this->isColumnModified(NpprimashijosPeer::EDADDES)) $criteria->add(NpprimashijosPeer::EDADDES, $this->edaddes);
		if ($this->isColumnModified(NpprimashijosPeer::EDADHAS)) $criteria->add(NpprimashijosPeer::EDADHAS, $this->edadhas);
		if ($this->isColumnModified(NpprimashijosPeer::MONTO)) $criteria->add(NpprimashijosPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpprimashijosPeer::ESTUDIOS)) $criteria->add(NpprimashijosPeer::ESTUDIOS, $this->estudios);
		if ($this->isColumnModified(NpprimashijosPeer::ID)) $criteria->add(NpprimashijosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpprimashijosPeer::DATABASE_NAME);

		$criteria->add(NpprimashijosPeer::ID, $this->id);

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

		$copyObj->setParfam($this->parfam);

		$copyObj->setEdaddes($this->edaddes);

		$copyObj->setEdadhas($this->edadhas);

		$copyObj->setMonto($this->monto);

		$copyObj->setEstudios($this->estudios);


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
			self::$peer = new NpprimashijosPeer();
		}
		return self::$peer;
	}

} 