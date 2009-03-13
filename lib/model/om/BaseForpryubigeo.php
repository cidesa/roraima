<?php


abstract class BaseForpryubigeo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codest;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $espadiubigeo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getEspadiubigeo()
  {

    return trim($this->espadiubigeo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = ForpryubigeoPeer::CODPRO;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = ForpryubigeoPeer::CODEST;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = ForpryubigeoPeer::CODMUN;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ForpryubigeoPeer::CODPAR;
      }
  
	} 
	
	public function setEspadiubigeo($v)
	{

    if ($this->espadiubigeo !== $v) {
        $this->espadiubigeo = $v;
        $this->modifiedColumns[] = ForpryubigeoPeer::ESPADIUBIGEO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForpryubigeoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codest = $rs->getString($startcol + 1);

      $this->codmun = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->espadiubigeo = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forpryubigeo object", $e);
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
			$con = Propel::getConnection(ForpryubigeoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForpryubigeoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForpryubigeoPeer::DATABASE_NAME);
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
					$pk = ForpryubigeoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForpryubigeoPeer::doUpdate($this, $con);
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


			if (($retval = ForpryubigeoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpryubigeoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodest();
				break;
			case 2:
				return $this->getCodmun();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getEspadiubigeo();
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
		$keys = ForpryubigeoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodest(),
			$keys[2] => $this->getCodmun(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getEspadiubigeo(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpryubigeoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodest($value);
				break;
			case 2:
				$this->setCodmun($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setEspadiubigeo($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForpryubigeoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmun($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEspadiubigeo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForpryubigeoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForpryubigeoPeer::CODPRO)) $criteria->add(ForpryubigeoPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForpryubigeoPeer::CODEST)) $criteria->add(ForpryubigeoPeer::CODEST, $this->codest);
		if ($this->isColumnModified(ForpryubigeoPeer::CODMUN)) $criteria->add(ForpryubigeoPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(ForpryubigeoPeer::CODPAR)) $criteria->add(ForpryubigeoPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ForpryubigeoPeer::ESPADIUBIGEO)) $criteria->add(ForpryubigeoPeer::ESPADIUBIGEO, $this->espadiubigeo);
		if ($this->isColumnModified(ForpryubigeoPeer::ID)) $criteria->add(ForpryubigeoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForpryubigeoPeer::DATABASE_NAME);

		$criteria->add(ForpryubigeoPeer::ID, $this->id);

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

		$copyObj->setCodest($this->codest);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setEspadiubigeo($this->espadiubigeo);


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
			self::$peer = new ForpryubigeoPeer();
		}
		return self::$peer;
	}

} 