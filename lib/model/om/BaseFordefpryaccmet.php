<?php


abstract class BaseFordefpryaccmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $desmet;


	
	protected $codunimed;


	
	protected $canmet;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodaccesp()
  {

    return trim($this->codaccesp);

  }
  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getDesmet()
  {

    return trim($this->desmet);

  }
  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getCanmet($val=false)
  {

    if($val) return number_format($this->canmet,2,',','.');
    else return $this->canmet;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FordefpryaccmetPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = FordefpryaccmetPeer::CODACCESP;
      }
  
	} 
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = FordefpryaccmetPeer::CODMET;
      }
  
	} 
	
	public function setDesmet($v)
	{

    if ($this->desmet !== $v) {
        $this->desmet = $v;
        $this->modifiedColumns[] = FordefpryaccmetPeer::DESMET;
      }
  
	} 
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = FordefpryaccmetPeer::CODUNIMED;
      }
  
	} 
	
	public function setCanmet($v)
	{

    if ($this->canmet !== $v) {
        $this->canmet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefpryaccmetPeer::CANMET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefpryaccmetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->codmet = $rs->getString($startcol + 2);

      $this->desmet = $rs->getString($startcol + 3);

      $this->codunimed = $rs->getString($startcol + 4);

      $this->canmet = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefpryaccmet object", $e);
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
			$con = Propel::getConnection(FordefpryaccmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefpryaccmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefpryaccmetPeer::DATABASE_NAME);
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
					$pk = FordefpryaccmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefpryaccmetPeer::doUpdate($this, $con);
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


			if (($retval = FordefpryaccmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodmet();
				break;
			case 3:
				return $this->getDesmet();
				break;
			case 4:
				return $this->getCodunimed();
				break;
			case 5:
				return $this->getCanmet();
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
		$keys = FordefpryaccmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getDesmet(),
			$keys[4] => $this->getCodunimed(),
			$keys[5] => $this->getCanmet(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodmet($value);
				break;
			case 3:
				$this->setDesmet($value);
				break;
			case 4:
				$this->setCodunimed($value);
				break;
			case 5:
				$this->setCanmet($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefpryaccmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesmet($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodunimed($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanmet($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefpryaccmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefpryaccmetPeer::CODPRO)) $criteria->add(FordefpryaccmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordefpryaccmetPeer::CODACCESP)) $criteria->add(FordefpryaccmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordefpryaccmetPeer::CODMET)) $criteria->add(FordefpryaccmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordefpryaccmetPeer::DESMET)) $criteria->add(FordefpryaccmetPeer::DESMET, $this->desmet);
		if ($this->isColumnModified(FordefpryaccmetPeer::CODUNIMED)) $criteria->add(FordefpryaccmetPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FordefpryaccmetPeer::CANMET)) $criteria->add(FordefpryaccmetPeer::CANMET, $this->canmet);
		if ($this->isColumnModified(FordefpryaccmetPeer::ID)) $criteria->add(FordefpryaccmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefpryaccmetPeer::DATABASE_NAME);

		$criteria->add(FordefpryaccmetPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodmet($this->codmet);

		$copyObj->setDesmet($this->desmet);

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setCanmet($this->canmet);


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
			self::$peer = new FordefpryaccmetPeer();
		}
		return self::$peer;
	}

} 