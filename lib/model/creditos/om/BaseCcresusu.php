<?php


abstract class BaseCcresusu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $respue;


	
	protected $ccpregun_id;


	
	protected $ccusuario_id;

	
	protected $aCcpregun;

	
	protected $aCcusuario;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getRespue()
  {

    return trim($this->respue);

  }
  
  public function getCcpregunId()
  {

    return $this->ccpregun_id;

  }
  
  public function getCcusuarioId()
  {

    return $this->ccusuario_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcresusuPeer::ID;
      }
  
	} 
	
	public function setRespue($v)
	{

    if ($this->respue !== $v) {
        $this->respue = $v;
        $this->modifiedColumns[] = CcresusuPeer::RESPUE;
      }
  
	} 
	
	public function setCcpregunId($v)
	{

    if ($this->ccpregun_id !== $v) {
        $this->ccpregun_id = $v;
        $this->modifiedColumns[] = CcresusuPeer::CCPREGUN_ID;
      }
  
		if ($this->aCcpregun !== null && $this->aCcpregun->getId() !== $v) {
			$this->aCcpregun = null;
		}

	} 
	
	public function setCcusuarioId($v)
	{

    if ($this->ccusuario_id !== $v) {
        $this->ccusuario_id = $v;
        $this->modifiedColumns[] = CcresusuPeer::CCUSUARIO_ID;
      }
  
		if ($this->aCcusuario !== null && $this->aCcusuario->getId() !== $v) {
			$this->aCcusuario = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->respue = $rs->getString($startcol + 1);

      $this->ccpregun_id = $rs->getInt($startcol + 2);

      $this->ccusuario_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccresusu object", $e);
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
			$con = Propel::getConnection(CcresusuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcresusuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcresusuPeer::DATABASE_NAME);
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


												
			if ($this->aCcpregun !== null) {
				if ($this->aCcpregun->isModified()) {
					$affectedRows += $this->aCcpregun->save($con);
				}
				$this->setCcpregun($this->aCcpregun);
			}

			if ($this->aCcusuario !== null) {
				if ($this->aCcusuario->isModified()) {
					$affectedRows += $this->aCcusuario->save($con);
				}
				$this->setCcusuario($this->aCcusuario);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcresusuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcresusuPeer::doUpdate($this, $con);
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


												
			if ($this->aCcpregun !== null) {
				if (!$this->aCcpregun->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpregun->getValidationFailures());
				}
			}

			if ($this->aCcusuario !== null) {
				if (!$this->aCcusuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuario->getValidationFailures());
				}
			}


			if (($retval = CcresusuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcresusuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getRespue();
				break;
			case 2:
				return $this->getCcpregunId();
				break;
			case 3:
				return $this->getCcusuarioId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcresusuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getRespue(),
			$keys[2] => $this->getCcpregunId(),
			$keys[3] => $this->getCcusuarioId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcresusuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setRespue($value);
				break;
			case 2:
				$this->setCcpregunId($value);
				break;
			case 3:
				$this->setCcusuarioId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcresusuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRespue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcpregunId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcusuarioId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcresusuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcresusuPeer::ID)) $criteria->add(CcresusuPeer::ID, $this->id);
		if ($this->isColumnModified(CcresusuPeer::RESPUE)) $criteria->add(CcresusuPeer::RESPUE, $this->respue);
		if ($this->isColumnModified(CcresusuPeer::CCPREGUN_ID)) $criteria->add(CcresusuPeer::CCPREGUN_ID, $this->ccpregun_id);
		if ($this->isColumnModified(CcresusuPeer::CCUSUARIO_ID)) $criteria->add(CcresusuPeer::CCUSUARIO_ID, $this->ccusuario_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcresusuPeer::DATABASE_NAME);

		$criteria->add(CcresusuPeer::ID, $this->id);

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

		$copyObj->setRespue($this->respue);

		$copyObj->setCcpregunId($this->ccpregun_id);

		$copyObj->setCcusuarioId($this->ccusuario_id);


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
			self::$peer = new CcresusuPeer();
		}
		return self::$peer;
	}

	
	public function setCcpregun($v)
	{


		if ($v === null) {
			$this->setCcpregunId(NULL);
		} else {
			$this->setCcpregunId($v->getId());
		}


		$this->aCcpregun = $v;
	}


	
	public function getCcpregun($con = null)
	{
		if ($this->aCcpregun === null && ($this->ccpregun_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpregunPeer.php';

      $c = new Criteria();
      $c->add(CcpregunPeer::ID,$this->ccpregun_id);
      
			$this->aCcpregun = CcpregunPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpregun;
	}

	
	public function setCcusuario($v)
	{


		if ($v === null) {
			$this->setCcusuarioId(NULL);
		} else {
			$this->setCcusuarioId($v->getId());
		}


		$this->aCcusuario = $v;
	}


	
	public function getCcusuario($con = null)
	{
		if ($this->aCcusuario === null && ($this->ccusuario_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';

      $c = new Criteria();
      $c->add(CcusuarioPeer::ID,$this->ccusuario_id);
      
			$this->aCcusuario = CcusuarioPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuario;
	}

} 