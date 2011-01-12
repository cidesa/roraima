<?php


abstract class BaseCccreusu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccusuario_id;


	
	protected $cccreden_id;

	
	protected $aCcusuario;

	
	protected $aCccreden;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcusuarioId()
  {

    return $this->ccusuario_id;

  }
  
  public function getCccredenId()
  {

    return $this->cccreden_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccreusuPeer::ID;
      }
  
	} 
	
	public function setCcusuarioId($v)
	{

    if ($this->ccusuario_id !== $v) {
        $this->ccusuario_id = $v;
        $this->modifiedColumns[] = CccreusuPeer::CCUSUARIO_ID;
      }
  
		if ($this->aCcusuario !== null && $this->aCcusuario->getId() !== $v) {
			$this->aCcusuario = null;
		}

	} 
	
	public function setCccredenId($v)
	{

    if ($this->cccreden_id !== $v) {
        $this->cccreden_id = $v;
        $this->modifiedColumns[] = CccreusuPeer::CCCREDEN_ID;
      }
  
		if ($this->aCccreden !== null && $this->aCccreden->getId() !== $v) {
			$this->aCccreden = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccusuario_id = $rs->getInt($startcol + 1);

      $this->cccreden_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccreusu object", $e);
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
			$con = Propel::getConnection(CccreusuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccreusuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccreusuPeer::DATABASE_NAME);
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


												
			if ($this->aCcusuario !== null) {
				if ($this->aCcusuario->isModified()) {
					$affectedRows += $this->aCcusuario->save($con);
				}
				$this->setCcusuario($this->aCcusuario);
			}

			if ($this->aCccreden !== null) {
				if ($this->aCccreden->isModified()) {
					$affectedRows += $this->aCccreden->save($con);
				}
				$this->setCccreden($this->aCccreden);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccreusuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccreusuPeer::doUpdate($this, $con);
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


												
			if ($this->aCcusuario !== null) {
				if (!$this->aCcusuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuario->getValidationFailures());
				}
			}

			if ($this->aCccreden !== null) {
				if (!$this->aCccreden->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccreden->getValidationFailures());
				}
			}


			if (($retval = CccreusuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreusuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcusuarioId();
				break;
			case 2:
				return $this->getCccredenId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreusuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcusuarioId(),
			$keys[2] => $this->getCccredenId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreusuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcusuarioId($value);
				break;
			case 2:
				$this->setCccredenId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreusuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcusuarioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCccredenId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccreusuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccreusuPeer::ID)) $criteria->add(CccreusuPeer::ID, $this->id);
		if ($this->isColumnModified(CccreusuPeer::CCUSUARIO_ID)) $criteria->add(CccreusuPeer::CCUSUARIO_ID, $this->ccusuario_id);
		if ($this->isColumnModified(CccreusuPeer::CCCREDEN_ID)) $criteria->add(CccreusuPeer::CCCREDEN_ID, $this->cccreden_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccreusuPeer::DATABASE_NAME);

		$criteria->add(CccreusuPeer::ID, $this->id);

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

		$copyObj->setCcusuarioId($this->ccusuario_id);

		$copyObj->setCccredenId($this->cccreden_id);


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
			self::$peer = new CccreusuPeer();
		}
		return self::$peer;
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

	
	public function setCccreden($v)
	{


		if ($v === null) {
			$this->setCccredenId(NULL);
		} else {
			$this->setCccredenId($v->getId());
		}


		$this->aCccreden = $v;
	}


	
	public function getCccreden($con = null)
	{
		if ($this->aCccreden === null && ($this->cccreden_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccredenPeer.php';

      $c = new Criteria();
      $c->add(CccredenPeer::ID,$this->cccreden_id);
      
			$this->aCccreden = CccredenPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccreden;
	}

} 