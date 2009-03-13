<?php


abstract class BaseNphojintinc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codinc;


	
	protected $id;

	
	protected $aNphojint;

	
	protected $aNpincapa;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodinc()
  {

    return trim($this->codinc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NphojintincPeer::CODEMP;
      }
  
		if ($this->aNphojint !== null && $this->aNphojint->getCodemp() !== $v) {
			$this->aNphojint = null;
		}

	} 
	
	public function setCodinc($v)
	{

    if ($this->codinc !== $v) {
        $this->codinc = $v;
        $this->modifiedColumns[] = NphojintincPeer::CODINC;
      }
  
		if ($this->aNpincapa !== null && $this->aNpincapa->getCodinc() !== $v) {
			$this->aNpincapa = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NphojintincPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codinc = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nphojintinc object", $e);
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
			$con = Propel::getConnection(NphojintincPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphojintincPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NphojintincPeer::DATABASE_NAME);
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


												
			if ($this->aNphojint !== null) {
				if ($this->aNphojint->isModified()) {
					$affectedRows += $this->aNphojint->save($con);
				}
				$this->setNphojint($this->aNphojint);
			}

			if ($this->aNpincapa !== null) {
				if ($this->aNpincapa->isModified()) {
					$affectedRows += $this->aNpincapa->save($con);
				}
				$this->setNpincapa($this->aNpincapa);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NphojintincPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NphojintincPeer::doUpdate($this, $con);
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


												
			if ($this->aNphojint !== null) {
				if (!$this->aNphojint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNphojint->getValidationFailures());
				}
			}

			if ($this->aNpincapa !== null) {
				if (!$this->aNpincapa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNpincapa->getValidationFailures());
				}
			}


			if (($retval = NphojintincPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphojintincPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodinc();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphojintincPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodinc(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphojintincPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodinc($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphojintincPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodinc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphojintincPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphojintincPeer::CODEMP)) $criteria->add(NphojintincPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphojintincPeer::CODINC)) $criteria->add(NphojintincPeer::CODINC, $this->codinc);
		if ($this->isColumnModified(NphojintincPeer::ID)) $criteria->add(NphojintincPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphojintincPeer::DATABASE_NAME);

		$criteria->add(NphojintincPeer::ID, $this->id);

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

		$copyObj->setCodinc($this->codinc);


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
			self::$peer = new NphojintincPeer();
		}
		return self::$peer;
	}

	
	public function setNphojint($v)
	{


		if ($v === null) {
			$this->setCodemp(NULL);
		} else {
			$this->setCodemp($v->getCodemp());
		}


		$this->aNphojint = $v;
	}


	
	public function getNphojint($con = null)
	{
		if ($this->aNphojint === null && (($this->codemp !== "" && $this->codemp !== null))) {
						include_once 'lib/model/om/BaseNphojintPeer.php';

			$this->aNphojint = NphojintPeer::retrieveByPK($this->codemp, $con);

			
		}
		return $this->aNphojint;
	}

	
	public function setNpincapa($v)
	{


		if ($v === null) {
			$this->setCodinc(NULL);
		} else {
			$this->setCodinc($v->getCodinc());
		}


		$this->aNpincapa = $v;
	}


	
	public function getNpincapa($con = null)
	{
		if ($this->aNpincapa === null && (($this->codinc !== "" && $this->codinc !== null))) {
						include_once 'lib/model/om/BaseNpincapaPeer.php';

			$this->aNpincapa = NpincapaPeer::retrieveByPK($this->codinc, $con);

			
		}
		return $this->aNpincapa;
	}

} 