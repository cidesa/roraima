<?php


abstract class BaseRhevaconcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codevdo;


	
	protected $codniv;


	
	protected $codvalins;


	
	protected $pesval;


	
	protected $punval;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodevdo()
  {

    return trim($this->codevdo);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodvalins()
  {

    return trim($this->codvalins);

  }
  
  public function getPesval($val=false)
  {

    if($val) return number_format($this->pesval,2,',','.');
    else return $this->pesval;

  }
  
  public function getPunval($val=false)
  {

    if($val) return number_format($this->punval,2,',','.');
    else return $this->punval;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodevdo($v)
	{

    if ($this->codevdo !== $v) {
        $this->codevdo = $v;
        $this->modifiedColumns[] = RhevaconcomPeer::CODEVDO;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = RhevaconcomPeer::CODNIV;
      }
  
	} 
	
	public function setCodvalins($v)
	{

    if ($this->codvalins !== $v) {
        $this->codvalins = $v;
        $this->modifiedColumns[] = RhevaconcomPeer::CODVALINS;
      }
  
	} 
	
	public function setPesval($v)
	{

    if ($this->pesval !== $v) {
        $this->pesval = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhevaconcomPeer::PESVAL;
      }
  
	} 
	
	public function setPunval($v)
	{

    if ($this->punval !== $v) {
        $this->punval = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhevaconcomPeer::PUNVAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhevaconcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codevdo = $rs->getString($startcol + 0);

      $this->codniv = $rs->getString($startcol + 1);

      $this->codvalins = $rs->getString($startcol + 2);

      $this->pesval = $rs->getFloat($startcol + 3);

      $this->punval = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhevaconcom object", $e);
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
			$con = Propel::getConnection(RhevaconcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhevaconcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhevaconcomPeer::DATABASE_NAME);
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
					$pk = RhevaconcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhevaconcomPeer::doUpdate($this, $con);
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


			if (($retval = RhevaconcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhevaconcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodevdo();
				break;
			case 1:
				return $this->getCodniv();
				break;
			case 2:
				return $this->getCodvalins();
				break;
			case 3:
				return $this->getPesval();
				break;
			case 4:
				return $this->getPunval();
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
		$keys = RhevaconcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodevdo(),
			$keys[1] => $this->getCodniv(),
			$keys[2] => $this->getCodvalins(),
			$keys[3] => $this->getPesval(),
			$keys[4] => $this->getPunval(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhevaconcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodevdo($value);
				break;
			case 1:
				$this->setCodniv($value);
				break;
			case 2:
				$this->setCodvalins($value);
				break;
			case 3:
				$this->setPesval($value);
				break;
			case 4:
				$this->setPunval($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhevaconcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodevdo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodvalins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPesval($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPunval($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhevaconcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhevaconcomPeer::CODEVDO)) $criteria->add(RhevaconcomPeer::CODEVDO, $this->codevdo);
		if ($this->isColumnModified(RhevaconcomPeer::CODNIV)) $criteria->add(RhevaconcomPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(RhevaconcomPeer::CODVALINS)) $criteria->add(RhevaconcomPeer::CODVALINS, $this->codvalins);
		if ($this->isColumnModified(RhevaconcomPeer::PESVAL)) $criteria->add(RhevaconcomPeer::PESVAL, $this->pesval);
		if ($this->isColumnModified(RhevaconcomPeer::PUNVAL)) $criteria->add(RhevaconcomPeer::PUNVAL, $this->punval);
		if ($this->isColumnModified(RhevaconcomPeer::ID)) $criteria->add(RhevaconcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhevaconcomPeer::DATABASE_NAME);

		$criteria->add(RhevaconcomPeer::ID, $this->id);

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

		$copyObj->setCodevdo($this->codevdo);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodvalins($this->codvalins);

		$copyObj->setPesval($this->pesval);

		$copyObj->setPunval($this->punval);


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
			self::$peer = new RhevaconcomPeer();
		}
		return self::$peer;
	}

} 