<?php


abstract class BaseCcavagarsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccavalis_id;


	
	protected $ccgarsol_id;

	
	protected $aCcavalis;

	
	protected $aCcgarsol;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcavalisId()
  {

    return $this->ccavalis_id;

  }
  
  public function getCcgarsolId()
  {

    return $this->ccgarsol_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcavagarsolPeer::ID;
      }
  
	} 
	
	public function setCcavalisId($v)
	{

    if ($this->ccavalis_id !== $v) {
        $this->ccavalis_id = $v;
        $this->modifiedColumns[] = CcavagarsolPeer::CCAVALIS_ID;
      }
  
		if ($this->aCcavalis !== null && $this->aCcavalis->getId() !== $v) {
			$this->aCcavalis = null;
		}

	} 
	
	public function setCcgarsolId($v)
	{

    if ($this->ccgarsol_id !== $v) {
        $this->ccgarsol_id = $v;
        $this->modifiedColumns[] = CcavagarsolPeer::CCGARSOL_ID;
      }
  
		if ($this->aCcgarsol !== null && $this->aCcgarsol->getId() !== $v) {
			$this->aCcgarsol = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccavalis_id = $rs->getInt($startcol + 1);

      $this->ccgarsol_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccavagarsol object", $e);
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
			$con = Propel::getConnection(CcavagarsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcavagarsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcavagarsolPeer::DATABASE_NAME);
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


												
			if ($this->aCcavalis !== null) {
				if ($this->aCcavalis->isModified()) {
					$affectedRows += $this->aCcavalis->save($con);
				}
				$this->setCcavalis($this->aCcavalis);
			}

			if ($this->aCcgarsol !== null) {
				if ($this->aCcgarsol->isModified()) {
					$affectedRows += $this->aCcgarsol->save($con);
				}
				$this->setCcgarsol($this->aCcgarsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcavagarsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcavagarsolPeer::doUpdate($this, $con);
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


												
			if ($this->aCcavalis !== null) {
				if (!$this->aCcavalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcavalis->getValidationFailures());
				}
			}

			if ($this->aCcgarsol !== null) {
				if (!$this->aCcgarsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgarsol->getValidationFailures());
				}
			}


			if (($retval = CcavagarsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcavagarsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcavalisId();
				break;
			case 2:
				return $this->getCcgarsolId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcavagarsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcavalisId(),
			$keys[2] => $this->getCcgarsolId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcavagarsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcavalisId($value);
				break;
			case 2:
				$this->setCcgarsolId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcavagarsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcavalisId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcgarsolId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcavagarsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcavagarsolPeer::ID)) $criteria->add(CcavagarsolPeer::ID, $this->id);
		if ($this->isColumnModified(CcavagarsolPeer::CCAVALIS_ID)) $criteria->add(CcavagarsolPeer::CCAVALIS_ID, $this->ccavalis_id);
		if ($this->isColumnModified(CcavagarsolPeer::CCGARSOL_ID)) $criteria->add(CcavagarsolPeer::CCGARSOL_ID, $this->ccgarsol_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcavagarsolPeer::DATABASE_NAME);

		$criteria->add(CcavagarsolPeer::ID, $this->id);

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

		$copyObj->setCcavalisId($this->ccavalis_id);

		$copyObj->setCcgarsolId($this->ccgarsol_id);


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
			self::$peer = new CcavagarsolPeer();
		}
		return self::$peer;
	}

	
	public function setCcavalis($v)
	{


		if ($v === null) {
			$this->setCcavalisId(NULL);
		} else {
			$this->setCcavalisId($v->getId());
		}


		$this->aCcavalis = $v;
	}


	
	public function getCcavalis($con = null)
	{
		if ($this->aCcavalis === null && ($this->ccavalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';

      $c = new Criteria();
      $c->add(CcavalisPeer::ID,$this->ccavalis_id);
      
			$this->aCcavalis = CcavalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcavalis;
	}

	
	public function setCcgarsol($v)
	{


		if ($v === null) {
			$this->setCcgarsolId(NULL);
		} else {
			$this->setCcgarsolId($v->getId());
		}


		$this->aCcgarsol = $v;
	}


	
	public function getCcgarsol($con = null)
	{
		if ($this->aCcgarsol === null && ($this->ccgarsol_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';

      $c = new Criteria();
      $c->add(CcgarsolPeer::ID,$this->ccgarsol_id);
      
			$this->aCcgarsol = CcgarsolPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgarsol;
	}

} 