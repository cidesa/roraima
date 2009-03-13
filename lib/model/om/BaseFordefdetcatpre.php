<?php


abstract class BaseFordefdetcatpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codvoltra;


	
	protected $desvoltra;


	
	protected $codunimed;


	
	protected $canvoltra;


	
	protected $perseg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodvoltra()
  {

    return trim($this->codvoltra);

  }
  
  public function getDesvoltra()
  {

    return trim($this->desvoltra);

  }
  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getCanvoltra($val=false)
  {

    if($val) return number_format($this->canvoltra,2,',','.');
    else return $this->canvoltra;

  }
  
  public function getPerseg()
  {

    return trim($this->perseg);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = FordefdetcatprePeer::CODCAT;
      }
  
	} 
	
	public function setCodvoltra($v)
	{

    if ($this->codvoltra !== $v) {
        $this->codvoltra = $v;
        $this->modifiedColumns[] = FordefdetcatprePeer::CODVOLTRA;
      }
  
	} 
	
	public function setDesvoltra($v)
	{

    if ($this->desvoltra !== $v) {
        $this->desvoltra = $v;
        $this->modifiedColumns[] = FordefdetcatprePeer::DESVOLTRA;
      }
  
	} 
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = FordefdetcatprePeer::CODUNIMED;
      }
  
	} 
	
	public function setCanvoltra($v)
	{

    if ($this->canvoltra !== $v) {
        $this->canvoltra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefdetcatprePeer::CANVOLTRA;
      }
  
	} 
	
	public function setPerseg($v)
	{

    if ($this->perseg !== $v) {
        $this->perseg = $v;
        $this->modifiedColumns[] = FordefdetcatprePeer::PERSEG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefdetcatprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codvoltra = $rs->getString($startcol + 1);

      $this->desvoltra = $rs->getString($startcol + 2);

      $this->codunimed = $rs->getString($startcol + 3);

      $this->canvoltra = $rs->getFloat($startcol + 4);

      $this->perseg = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefdetcatpre object", $e);
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
			$con = Propel::getConnection(FordefdetcatprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefdetcatprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefdetcatprePeer::DATABASE_NAME);
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
					$pk = FordefdetcatprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefdetcatprePeer::doUpdate($this, $con);
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


			if (($retval = FordefdetcatprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefdetcatprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodvoltra();
				break;
			case 2:
				return $this->getDesvoltra();
				break;
			case 3:
				return $this->getCodunimed();
				break;
			case 4:
				return $this->getCanvoltra();
				break;
			case 5:
				return $this->getPerseg();
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
		$keys = FordefdetcatprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodvoltra(),
			$keys[2] => $this->getDesvoltra(),
			$keys[3] => $this->getCodunimed(),
			$keys[4] => $this->getCanvoltra(),
			$keys[5] => $this->getPerseg(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefdetcatprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodvoltra($value);
				break;
			case 2:
				$this->setDesvoltra($value);
				break;
			case 3:
				$this->setCodunimed($value);
				break;
			case 4:
				$this->setCanvoltra($value);
				break;
			case 5:
				$this->setPerseg($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefdetcatprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodvoltra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesvoltra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodunimed($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanvoltra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPerseg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefdetcatprePeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefdetcatprePeer::CODCAT)) $criteria->add(FordefdetcatprePeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(FordefdetcatprePeer::CODVOLTRA)) $criteria->add(FordefdetcatprePeer::CODVOLTRA, $this->codvoltra);
		if ($this->isColumnModified(FordefdetcatprePeer::DESVOLTRA)) $criteria->add(FordefdetcatprePeer::DESVOLTRA, $this->desvoltra);
		if ($this->isColumnModified(FordefdetcatprePeer::CODUNIMED)) $criteria->add(FordefdetcatprePeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FordefdetcatprePeer::CANVOLTRA)) $criteria->add(FordefdetcatprePeer::CANVOLTRA, $this->canvoltra);
		if ($this->isColumnModified(FordefdetcatprePeer::PERSEG)) $criteria->add(FordefdetcatprePeer::PERSEG, $this->perseg);
		if ($this->isColumnModified(FordefdetcatprePeer::ID)) $criteria->add(FordefdetcatprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefdetcatprePeer::DATABASE_NAME);

		$criteria->add(FordefdetcatprePeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodvoltra($this->codvoltra);

		$copyObj->setDesvoltra($this->desvoltra);

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setCanvoltra($this->canvoltra);

		$copyObj->setPerseg($this->perseg);


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
			self::$peer = new FordefdetcatprePeer();
		}
		return self::$peer;
	}

} 