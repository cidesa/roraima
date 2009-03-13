<?php


abstract class BaseFordefparing extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codparing;


	
	protected $nomparing;


	
	protected $estant;


	
	protected $estantaju;


	
	protected $bascal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodparing()
  {

    return trim($this->codparing);

  }
  
  public function getNomparing()
  {

    return trim($this->nomparing);

  }
  
  public function getEstant($val=false)
  {

    if($val) return number_format($this->estant,2,',','.');
    else return $this->estant;

  }
  
  public function getEstantaju($val=false)
  {

    if($val) return number_format($this->estantaju,2,',','.');
    else return $this->estantaju;

  }
  
  public function getBascal()
  {

    return trim($this->bascal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodparing($v)
	{

    if ($this->codparing !== $v) {
        $this->codparing = $v;
        $this->modifiedColumns[] = FordefparingPeer::CODPARING;
      }
  
	} 
	
	public function setNomparing($v)
	{

    if ($this->nomparing !== $v) {
        $this->nomparing = $v;
        $this->modifiedColumns[] = FordefparingPeer::NOMPARING;
      }
  
	} 
	
	public function setEstant($v)
	{

    if ($this->estant !== $v) {
        $this->estant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefparingPeer::ESTANT;
      }
  
	} 
	
	public function setEstantaju($v)
	{

    if ($this->estantaju !== $v) {
        $this->estantaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefparingPeer::ESTANTAJU;
      }
  
	} 
	
	public function setBascal($v)
	{

    if ($this->bascal !== $v) {
        $this->bascal = $v;
        $this->modifiedColumns[] = FordefparingPeer::BASCAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefparingPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codparing = $rs->getString($startcol + 0);

      $this->nomparing = $rs->getString($startcol + 1);

      $this->estant = $rs->getFloat($startcol + 2);

      $this->estantaju = $rs->getFloat($startcol + 3);

      $this->bascal = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefparing object", $e);
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
			$con = Propel::getConnection(FordefparingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefparingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefparingPeer::DATABASE_NAME);
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
					$pk = FordefparingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefparingPeer::doUpdate($this, $con);
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


			if (($retval = FordefparingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefparingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodparing();
				break;
			case 1:
				return $this->getNomparing();
				break;
			case 2:
				return $this->getEstant();
				break;
			case 3:
				return $this->getEstantaju();
				break;
			case 4:
				return $this->getBascal();
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
		$keys = FordefparingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodparing(),
			$keys[1] => $this->getNomparing(),
			$keys[2] => $this->getEstant(),
			$keys[3] => $this->getEstantaju(),
			$keys[4] => $this->getBascal(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefparingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodparing($value);
				break;
			case 1:
				$this->setNomparing($value);
				break;
			case 2:
				$this->setEstant($value);
				break;
			case 3:
				$this->setEstantaju($value);
				break;
			case 4:
				$this->setBascal($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefparingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodparing($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomparing($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstantaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBascal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefparingPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefparingPeer::CODPARING)) $criteria->add(FordefparingPeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(FordefparingPeer::NOMPARING)) $criteria->add(FordefparingPeer::NOMPARING, $this->nomparing);
		if ($this->isColumnModified(FordefparingPeer::ESTANT)) $criteria->add(FordefparingPeer::ESTANT, $this->estant);
		if ($this->isColumnModified(FordefparingPeer::ESTANTAJU)) $criteria->add(FordefparingPeer::ESTANTAJU, $this->estantaju);
		if ($this->isColumnModified(FordefparingPeer::BASCAL)) $criteria->add(FordefparingPeer::BASCAL, $this->bascal);
		if ($this->isColumnModified(FordefparingPeer::ID)) $criteria->add(FordefparingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefparingPeer::DATABASE_NAME);

		$criteria->add(FordefparingPeer::ID, $this->id);

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

		$copyObj->setCodparing($this->codparing);

		$copyObj->setNomparing($this->nomparing);

		$copyObj->setEstant($this->estant);

		$copyObj->setEstantaju($this->estantaju);

		$copyObj->setBascal($this->bascal);


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
			self::$peer = new FordefparingPeer();
		}
		return self::$peer;
	}

} 