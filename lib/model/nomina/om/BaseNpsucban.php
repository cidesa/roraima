<?php


abstract class BaseNpsucban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codban;


	
	protected $nomban;


	
	protected $codsuc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getNomban()
  {

    return trim($this->nomban);

  }
  
  public function getCodsuc()
  {

    return trim($this->codsuc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = NpsucbanPeer::CODBAN;
      }
  
	} 
	
	public function setNomban($v)
	{

    if ($this->nomban !== $v) {
        $this->nomban = $v;
        $this->modifiedColumns[] = NpsucbanPeer::NOMBAN;
      }
  
	} 
	
	public function setCodsuc($v)
	{

    if ($this->codsuc !== $v) {
        $this->codsuc = $v;
        $this->modifiedColumns[] = NpsucbanPeer::CODSUC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpsucbanPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codban = $rs->getString($startcol + 0);

      $this->nomban = $rs->getString($startcol + 1);

      $this->codsuc = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npsucban object", $e);
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
			$con = Propel::getConnection(NpsucbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpsucbanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpsucbanPeer::DATABASE_NAME);
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
					$pk = NpsucbanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpsucbanPeer::doUpdate($this, $con);
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


			if (($retval = NpsucbanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsucbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodban();
				break;
			case 1:
				return $this->getNomban();
				break;
			case 2:
				return $this->getCodsuc();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpsucbanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodban(),
			$keys[1] => $this->getNomban(),
			$keys[2] => $this->getCodsuc(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsucbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodban($value);
				break;
			case 1:
				$this->setNomban($value);
				break;
			case 2:
				$this->setCodsuc($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpsucbanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodban($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomban($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodsuc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpsucbanPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpsucbanPeer::CODBAN)) $criteria->add(NpsucbanPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NpsucbanPeer::NOMBAN)) $criteria->add(NpsucbanPeer::NOMBAN, $this->nomban);
		if ($this->isColumnModified(NpsucbanPeer::CODSUC)) $criteria->add(NpsucbanPeer::CODSUC, $this->codsuc);
		if ($this->isColumnModified(NpsucbanPeer::ID)) $criteria->add(NpsucbanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpsucbanPeer::DATABASE_NAME);

		$criteria->add(NpsucbanPeer::ID, $this->id);

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

		$copyObj->setCodban($this->codban);

		$copyObj->setNomban($this->nomban);

		$copyObj->setCodsuc($this->codsuc);


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
			self::$peer = new NpsucbanPeer();
		}
		return self::$peer;
	}

} 