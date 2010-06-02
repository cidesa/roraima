<?php


abstract class BaseViadefrub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrub;


	
	protected $desrub;


	
	protected $tipo;


	
	protected $tiprub;


	
	protected $codpar;


	
	protected $tipdia;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrub()
  {

    return trim($this->codrub);

  }
  
  public function getDesrub()
  {

    return trim($this->desrub);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getTiprub()
  {

    return trim($this->tiprub);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getTipdia()
  {

    return trim($this->tipdia);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrub($v)
	{

    if ($this->codrub !== $v) {
        $this->codrub = $v;
        $this->modifiedColumns[] = ViadefrubPeer::CODRUB;
      }
  
	} 
	
	public function setDesrub($v)
	{

    if ($this->desrub !== $v) {
        $this->desrub = $v;
        $this->modifiedColumns[] = ViadefrubPeer::DESRUB;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = ViadefrubPeer::TIPO;
      }
  
	} 
	
	public function setTiprub($v)
	{

    if ($this->tiprub !== $v) {
        $this->tiprub = $v;
        $this->modifiedColumns[] = ViadefrubPeer::TIPRUB;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ViadefrubPeer::CODPAR;
      }
  
	} 
	
	public function setTipdia($v)
	{

    if ($this->tipdia !== $v) {
        $this->tipdia = $v;
        $this->modifiedColumns[] = ViadefrubPeer::TIPDIA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadefrubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrub = $rs->getString($startcol + 0);

      $this->desrub = $rs->getString($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->tiprub = $rs->getString($startcol + 3);

      $this->codpar = $rs->getString($startcol + 4);

      $this->tipdia = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadefrub object", $e);
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
			$con = Propel::getConnection(ViadefrubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadefrubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadefrubPeer::DATABASE_NAME);
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
					$pk = ViadefrubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadefrubPeer::doUpdate($this, $con);
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


			if (($retval = ViadefrubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefrubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrub();
				break;
			case 1:
				return $this->getDesrub();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getTiprub();
				break;
			case 4:
				return $this->getCodpar();
				break;
			case 5:
				return $this->getTipdia();
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
		$keys = ViadefrubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrub(),
			$keys[1] => $this->getDesrub(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getTiprub(),
			$keys[4] => $this->getCodpar(),
			$keys[5] => $this->getTipdia(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefrubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrub($value);
				break;
			case 1:
				$this->setDesrub($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setTiprub($value);
				break;
			case 4:
				$this->setCodpar($value);
				break;
			case 5:
				$this->setTipdia($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadefrubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrub($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrub($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTiprub($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipdia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadefrubPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadefrubPeer::CODRUB)) $criteria->add(ViadefrubPeer::CODRUB, $this->codrub);
		if ($this->isColumnModified(ViadefrubPeer::DESRUB)) $criteria->add(ViadefrubPeer::DESRUB, $this->desrub);
		if ($this->isColumnModified(ViadefrubPeer::TIPO)) $criteria->add(ViadefrubPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(ViadefrubPeer::TIPRUB)) $criteria->add(ViadefrubPeer::TIPRUB, $this->tiprub);
		if ($this->isColumnModified(ViadefrubPeer::CODPAR)) $criteria->add(ViadefrubPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ViadefrubPeer::TIPDIA)) $criteria->add(ViadefrubPeer::TIPDIA, $this->tipdia);
		if ($this->isColumnModified(ViadefrubPeer::ID)) $criteria->add(ViadefrubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadefrubPeer::DATABASE_NAME);

		$criteria->add(ViadefrubPeer::ID, $this->id);

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

		$copyObj->setCodrub($this->codrub);

		$copyObj->setDesrub($this->desrub);

		$copyObj->setTipo($this->tipo);

		$copyObj->setTiprub($this->tiprub);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setTipdia($this->tipdia);


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
			self::$peer = new ViadefrubPeer();
		}
		return self::$peer;
	}

} 