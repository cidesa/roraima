<?php


abstract class BaseForingdefgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $escapr;


	
	protected $gening;


	
	protected $faccon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getEscapr()
  {

    return trim($this->escapr);

  }
  
  public function getGening()
  {

    return trim($this->gening);

  }
  
  public function getFaccon($val=false)
  {

    if($val) return number_format($this->faccon,2,',','.');
    else return $this->faccon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = ForingdefgenPeer::CODEMP;
      }
  
	} 
	
	public function setEscapr($v)
	{

    if ($this->escapr !== $v) {
        $this->escapr = $v;
        $this->modifiedColumns[] = ForingdefgenPeer::ESCAPR;
      }
  
	} 
	
	public function setGening($v)
	{

    if ($this->gening !== $v) {
        $this->gening = $v;
        $this->modifiedColumns[] = ForingdefgenPeer::GENING;
      }
  
	} 
	
	public function setFaccon($v)
	{

    if ($this->faccon !== $v) {
        $this->faccon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForingdefgenPeer::FACCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForingdefgenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->escapr = $rs->getString($startcol + 1);

      $this->gening = $rs->getString($startcol + 2);

      $this->faccon = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Foringdefgen object", $e);
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
			$con = Propel::getConnection(ForingdefgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForingdefgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForingdefgenPeer::DATABASE_NAME);
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
					$pk = ForingdefgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForingdefgenPeer::doUpdate($this, $con);
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


			if (($retval = ForingdefgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForingdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getEscapr();
				break;
			case 2:
				return $this->getGening();
				break;
			case 3:
				return $this->getFaccon();
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
		$keys = ForingdefgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getEscapr(),
			$keys[2] => $this->getGening(),
			$keys[3] => $this->getFaccon(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForingdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setEscapr($value);
				break;
			case 2:
				$this->setGening($value);
				break;
			case 3:
				$this->setFaccon($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForingdefgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEscapr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGening($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFaccon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForingdefgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForingdefgenPeer::CODEMP)) $criteria->add(ForingdefgenPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ForingdefgenPeer::ESCAPR)) $criteria->add(ForingdefgenPeer::ESCAPR, $this->escapr);
		if ($this->isColumnModified(ForingdefgenPeer::GENING)) $criteria->add(ForingdefgenPeer::GENING, $this->gening);
		if ($this->isColumnModified(ForingdefgenPeer::FACCON)) $criteria->add(ForingdefgenPeer::FACCON, $this->faccon);
		if ($this->isColumnModified(ForingdefgenPeer::ID)) $criteria->add(ForingdefgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForingdefgenPeer::DATABASE_NAME);

		$criteria->add(ForingdefgenPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setEscapr($this->escapr);

		$copyObj->setGening($this->gening);

		$copyObj->setFaccon($this->faccon);


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
			self::$peer = new ForingdefgenPeer();
		}
		return self::$peer;
	}

} 