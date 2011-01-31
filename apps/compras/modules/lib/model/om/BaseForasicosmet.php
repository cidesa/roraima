<?php


abstract class BaseForasicosmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codmet;


	
	protected $unimed;


	
	protected $canmet;


	
	protected $cosmet;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getCanmet($val=false)
  {

    if($val) return number_format($this->canmet,2,',','.');
    else return $this->canmet;

  }
  
  public function getCosmet($val=false)
  {

    if($val) return number_format($this->cosmet,2,',','.');
    else return $this->cosmet;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForasicosmetPeer::CODCAT;
      }
  
	} 
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = ForasicosmetPeer::CODMET;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = ForasicosmetPeer::UNIMED;
      }
  
	} 
	
	public function setCanmet($v)
	{

    if ($this->canmet !== $v) {
        $this->canmet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForasicosmetPeer::CANMET;
      }
  
	} 
	
	public function setCosmet($v)
	{

    if ($this->cosmet !== $v) {
        $this->cosmet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForasicosmetPeer::COSMET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForasicosmetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codmet = $rs->getString($startcol + 1);

      $this->unimed = $rs->getString($startcol + 2);

      $this->canmet = $rs->getFloat($startcol + 3);

      $this->cosmet = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forasicosmet object", $e);
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
			$con = Propel::getConnection(ForasicosmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForasicosmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForasicosmetPeer::DATABASE_NAME);
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
					$pk = ForasicosmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForasicosmetPeer::doUpdate($this, $con);
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


			if (($retval = ForasicosmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForasicosmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodmet();
				break;
			case 2:
				return $this->getUnimed();
				break;
			case 3:
				return $this->getCanmet();
				break;
			case 4:
				return $this->getCosmet();
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
		$keys = ForasicosmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodmet(),
			$keys[2] => $this->getUnimed(),
			$keys[3] => $this->getCanmet(),
			$keys[4] => $this->getCosmet(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForasicosmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodmet($value);
				break;
			case 2:
				$this->setUnimed($value);
				break;
			case 3:
				$this->setCanmet($value);
				break;
			case 4:
				$this->setCosmet($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForasicosmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanmet($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCosmet($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForasicosmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForasicosmetPeer::CODCAT)) $criteria->add(ForasicosmetPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForasicosmetPeer::CODMET)) $criteria->add(ForasicosmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(ForasicosmetPeer::UNIMED)) $criteria->add(ForasicosmetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(ForasicosmetPeer::CANMET)) $criteria->add(ForasicosmetPeer::CANMET, $this->canmet);
		if ($this->isColumnModified(ForasicosmetPeer::COSMET)) $criteria->add(ForasicosmetPeer::COSMET, $this->cosmet);
		if ($this->isColumnModified(ForasicosmetPeer::ID)) $criteria->add(ForasicosmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForasicosmetPeer::DATABASE_NAME);

		$criteria->add(ForasicosmetPeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCanmet($this->canmet);

		$copyObj->setCosmet($this->cosmet);


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
			self::$peer = new ForasicosmetPeer();
		}
		return self::$peer;
	}

} 