<?php


abstract class BaseForforind extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codind;


	
	protected $codvaruno;


	
	protected $codvardos;


	
	protected $codvartre;


	
	protected $opefor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodind()
  {

    return trim($this->codind);

  }
  
  public function getCodvaruno()
  {

    return trim($this->codvaruno);

  }
  
  public function getCodvardos()
  {

    return trim($this->codvardos);

  }
  
  public function getCodvartre()
  {

    return trim($this->codvartre);

  }
  
  public function getOpefor()
  {

    return trim($this->opefor);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodind($v)
	{

    if ($this->codind !== $v) {
        $this->codind = $v;
        $this->modifiedColumns[] = ForforindPeer::CODIND;
      }
  
	} 
	
	public function setCodvaruno($v)
	{

    if ($this->codvaruno !== $v) {
        $this->codvaruno = $v;
        $this->modifiedColumns[] = ForforindPeer::CODVARUNO;
      }
  
	} 
	
	public function setCodvardos($v)
	{

    if ($this->codvardos !== $v) {
        $this->codvardos = $v;
        $this->modifiedColumns[] = ForforindPeer::CODVARDOS;
      }
  
	} 
	
	public function setCodvartre($v)
	{

    if ($this->codvartre !== $v) {
        $this->codvartre = $v;
        $this->modifiedColumns[] = ForforindPeer::CODVARTRE;
      }
  
	} 
	
	public function setOpefor($v)
	{

    if ($this->opefor !== $v) {
        $this->opefor = $v;
        $this->modifiedColumns[] = ForforindPeer::OPEFOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForforindPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codind = $rs->getString($startcol + 0);

      $this->codvaruno = $rs->getString($startcol + 1);

      $this->codvardos = $rs->getString($startcol + 2);

      $this->codvartre = $rs->getString($startcol + 3);

      $this->opefor = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forforind object", $e);
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
			$con = Propel::getConnection(ForforindPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForforindPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForforindPeer::DATABASE_NAME);
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
					$pk = ForforindPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForforindPeer::doUpdate($this, $con);
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


			if (($retval = ForforindPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForforindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodind();
				break;
			case 1:
				return $this->getCodvaruno();
				break;
			case 2:
				return $this->getCodvardos();
				break;
			case 3:
				return $this->getCodvartre();
				break;
			case 4:
				return $this->getOpefor();
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
		$keys = ForforindPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodind(),
			$keys[1] => $this->getCodvaruno(),
			$keys[2] => $this->getCodvardos(),
			$keys[3] => $this->getCodvartre(),
			$keys[4] => $this->getOpefor(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForforindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodind($value);
				break;
			case 1:
				$this->setCodvaruno($value);
				break;
			case 2:
				$this->setCodvardos($value);
				break;
			case 3:
				$this->setCodvartre($value);
				break;
			case 4:
				$this->setOpefor($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForforindPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodind($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodvaruno($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodvardos($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodvartre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOpefor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForforindPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForforindPeer::CODIND)) $criteria->add(ForforindPeer::CODIND, $this->codind);
		if ($this->isColumnModified(ForforindPeer::CODVARUNO)) $criteria->add(ForforindPeer::CODVARUNO, $this->codvaruno);
		if ($this->isColumnModified(ForforindPeer::CODVARDOS)) $criteria->add(ForforindPeer::CODVARDOS, $this->codvardos);
		if ($this->isColumnModified(ForforindPeer::CODVARTRE)) $criteria->add(ForforindPeer::CODVARTRE, $this->codvartre);
		if ($this->isColumnModified(ForforindPeer::OPEFOR)) $criteria->add(ForforindPeer::OPEFOR, $this->opefor);
		if ($this->isColumnModified(ForforindPeer::ID)) $criteria->add(ForforindPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForforindPeer::DATABASE_NAME);

		$criteria->add(ForforindPeer::ID, $this->id);

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

		$copyObj->setCodind($this->codind);

		$copyObj->setCodvaruno($this->codvaruno);

		$copyObj->setCodvardos($this->codvardos);

		$copyObj->setCodvartre($this->codvartre);

		$copyObj->setOpefor($this->opefor);


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
			self::$peer = new ForforindPeer();
		}
		return self::$peer;
	}

} 