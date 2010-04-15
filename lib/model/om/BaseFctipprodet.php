<?php


abstract class BaseFctipprodet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipvar;


	
	protected $tipo;


	
	protected $valor;


	
	protected $tippro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipvar()
  {

    return trim($this->tipvar);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getValor()
  {

    return trim($this->valor);

  }
  
  public function getTippro()
  {

    return trim($this->tippro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipvar($v)
	{

    if ($this->tipvar !== $v) {
        $this->tipvar = $v;
        $this->modifiedColumns[] = FctipprodetPeer::TIPVAR;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FctipprodetPeer::TIPO;
      }
  
	} 
	
	public function setValor($v)
	{

    if ($this->valor !== $v) {
        $this->valor = $v;
        $this->modifiedColumns[] = FctipprodetPeer::VALOR;
      }
  
	} 
	
	public function setTippro($v)
	{

    if ($this->tippro !== $v) {
        $this->tippro = $v;
        $this->modifiedColumns[] = FctipprodetPeer::TIPPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FctipprodetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipvar = $rs->getString($startcol + 0);

      $this->tipo = $rs->getString($startcol + 1);

      $this->valor = $rs->getString($startcol + 2);

      $this->tippro = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fctipprodet object", $e);
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
			$con = Propel::getConnection(FctipprodetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctipprodetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctipprodetPeer::DATABASE_NAME);
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
					$pk = FctipprodetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FctipprodetPeer::doUpdate($this, $con);
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


			if (($retval = FctipprodetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipprodetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipvar();
				break;
			case 1:
				return $this->getTipo();
				break;
			case 2:
				return $this->getValor();
				break;
			case 3:
				return $this->getTippro();
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
		$keys = FctipprodetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipvar(),
			$keys[1] => $this->getTipo(),
			$keys[2] => $this->getValor(),
			$keys[3] => $this->getTippro(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctipprodetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipvar($value);
				break;
			case 1:
				$this->setTipo($value);
				break;
			case 2:
				$this->setValor($value);
				break;
			case 3:
				$this->setTippro($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctipprodetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipvar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTippro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctipprodetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctipprodetPeer::TIPVAR)) $criteria->add(FctipprodetPeer::TIPVAR, $this->tipvar);
		if ($this->isColumnModified(FctipprodetPeer::TIPO)) $criteria->add(FctipprodetPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FctipprodetPeer::VALOR)) $criteria->add(FctipprodetPeer::VALOR, $this->valor);
		if ($this->isColumnModified(FctipprodetPeer::TIPPRO)) $criteria->add(FctipprodetPeer::TIPPRO, $this->tippro);
		if ($this->isColumnModified(FctipprodetPeer::ID)) $criteria->add(FctipprodetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctipprodetPeer::DATABASE_NAME);

		$criteria->add(FctipprodetPeer::ID, $this->id);

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

		$copyObj->setTipvar($this->tipvar);

		$copyObj->setTipo($this->tipo);

		$copyObj->setValor($this->valor);

		$copyObj->setTippro($this->tippro);


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
			self::$peer = new FctipprodetPeer();
		}
		return self::$peer;
	}

} 