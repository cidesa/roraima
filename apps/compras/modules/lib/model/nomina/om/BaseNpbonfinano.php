<?php


abstract class BaseNpbonfinano extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $desde;


	
	protected $hasta;


	
	protected $dias;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getDesde($val=false)
  {

    if($val) return number_format($this->desde,2,',','.');
    else return $this->desde;

  }
  
  public function getHasta($val=false)
  {

    if($val) return number_format($this->hasta,2,',','.');
    else return $this->hasta;

  }
  
  public function getDias($val=false)
  {

    if($val) return number_format($this->dias,2,',','.');
    else return $this->dias;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpbonfinanoPeer::CODNOM;
      }
  
	} 
	
	public function setDesde($v)
	{

    if ($this->desde !== $v) {
        $this->desde = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpbonfinanoPeer::DESDE;
      }
  
	} 
	
	public function setHasta($v)
	{

    if ($this->hasta !== $v) {
        $this->hasta = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpbonfinanoPeer::HASTA;
      }
  
	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpbonfinanoPeer::DIAS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpbonfinanoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->desde = $rs->getFloat($startcol + 1);

      $this->hasta = $rs->getFloat($startcol + 2);

      $this->dias = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npbonfinano object", $e);
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
			$con = Propel::getConnection(NpbonfinanoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpbonfinanoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpbonfinanoPeer::DATABASE_NAME);
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
					$pk = NpbonfinanoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpbonfinanoPeer::doUpdate($this, $con);
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


			if (($retval = NpbonfinanoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbonfinanoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getDesde();
				break;
			case 2:
				return $this->getHasta();
				break;
			case 3:
				return $this->getDias();
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
		$keys = NpbonfinanoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getDesde(),
			$keys[2] => $this->getHasta(),
			$keys[3] => $this->getDias(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbonfinanoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setDesde($value);
				break;
			case 2:
				$this->setHasta($value);
				break;
			case 3:
				$this->setDias($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpbonfinanoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesde($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHasta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDias($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpbonfinanoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpbonfinanoPeer::CODNOM)) $criteria->add(NpbonfinanoPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpbonfinanoPeer::DESDE)) $criteria->add(NpbonfinanoPeer::DESDE, $this->desde);
		if ($this->isColumnModified(NpbonfinanoPeer::HASTA)) $criteria->add(NpbonfinanoPeer::HASTA, $this->hasta);
		if ($this->isColumnModified(NpbonfinanoPeer::DIAS)) $criteria->add(NpbonfinanoPeer::DIAS, $this->dias);
		if ($this->isColumnModified(NpbonfinanoPeer::ID)) $criteria->add(NpbonfinanoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpbonfinanoPeer::DATABASE_NAME);

		$criteria->add(NpbonfinanoPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setDesde($this->desde);

		$copyObj->setHasta($this->hasta);

		$copyObj->setDias($this->dias);


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
			self::$peer = new NpbonfinanoPeer();
		}
		return self::$peer;
	}

} 