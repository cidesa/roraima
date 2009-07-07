<?php


abstract class BaseNpdetembben extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemb;


	
	protected $codemp;


	
	protected $cedrifben;


	
	protected $tiprel;


	
	protected $valemb;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemb()
  {

    return trim($this->codemb);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedrifben()
  {

    return trim($this->cedrifben);

  }
  
  public function getTiprel()
  {

    return trim($this->tiprel);

  }
  
  public function getValemb($val=false)
  {

    if($val) return number_format($this->valemb,2,',','.');
    else return $this->valemb;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemb($v)
	{

    if ($this->codemb !== $v) {
        $this->codemb = $v;
        $this->modifiedColumns[] = NpdetembbenPeer::CODEMB;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpdetembbenPeer::CODEMP;
      }
  
	} 
	
	public function setCedrifben($v)
	{

    if ($this->cedrifben !== $v) {
        $this->cedrifben = $v;
        $this->modifiedColumns[] = NpdetembbenPeer::CEDRIFBEN;
      }
  
	} 
	
	public function setTiprel($v)
	{

    if ($this->tiprel !== $v) {
        $this->tiprel = $v;
        $this->modifiedColumns[] = NpdetembbenPeer::TIPREL;
      }
  
	} 
	
	public function setValemb($v)
	{

    if ($this->valemb !== $v) {
        $this->valemb = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdetembbenPeer::VALEMB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdetembbenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemb = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->cedrifben = $rs->getString($startcol + 2);

      $this->tiprel = $rs->getString($startcol + 3);

      $this->valemb = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdetembben object", $e);
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
			$con = Propel::getConnection(NpdetembbenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdetembbenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdetembbenPeer::DATABASE_NAME);
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
					$pk = NpdetembbenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdetembbenPeer::doUpdate($this, $con);
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


			if (($retval = NpdetembbenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetembbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemb();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCedrifben();
				break;
			case 3:
				return $this->getTiprel();
				break;
			case 4:
				return $this->getValemb();
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
		$keys = NpdetembbenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemb(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCedrifben(),
			$keys[3] => $this->getTiprel(),
			$keys[4] => $this->getValemb(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetembbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemb($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCedrifben($value);
				break;
			case 3:
				$this->setTiprel($value);
				break;
			case 4:
				$this->setValemb($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdetembbenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemb($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrifben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTiprel($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValemb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdetembbenPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdetembbenPeer::CODEMB)) $criteria->add(NpdetembbenPeer::CODEMB, $this->codemb);
		if ($this->isColumnModified(NpdetembbenPeer::CODEMP)) $criteria->add(NpdetembbenPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpdetembbenPeer::CEDRIFBEN)) $criteria->add(NpdetembbenPeer::CEDRIFBEN, $this->cedrifben);
		if ($this->isColumnModified(NpdetembbenPeer::TIPREL)) $criteria->add(NpdetembbenPeer::TIPREL, $this->tiprel);
		if ($this->isColumnModified(NpdetembbenPeer::VALEMB)) $criteria->add(NpdetembbenPeer::VALEMB, $this->valemb);
		if ($this->isColumnModified(NpdetembbenPeer::ID)) $criteria->add(NpdetembbenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdetembbenPeer::DATABASE_NAME);

		$criteria->add(NpdetembbenPeer::ID, $this->id);

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

		$copyObj->setCodemb($this->codemb);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedrifben($this->cedrifben);

		$copyObj->setTiprel($this->tiprel);

		$copyObj->setValemb($this->valemb);


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
			self::$peer = new NpdetembbenPeer();
		}
		return self::$peer;
	}

} 