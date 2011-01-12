<?php


abstract class BaseCcrevisi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $coment;


	
	protected $estatu;


	
	protected $fecha;


	
	protected $ccinform_id;


	
	protected $ccanalis_id;

	
	protected $aCcinform;

	
	protected $aCcanalis;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getComent()
  {

    return trim($this->coment);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCcinformId()
  {

    return $this->ccinform_id;

  }
  
  public function getCcanalisId()
  {

    return $this->ccanalis_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrevisiPeer::ID;
      }
  
	} 
	
	public function setComent($v)
	{

    if ($this->coment !== $v) {
        $this->coment = $v;
        $this->modifiedColumns[] = CcrevisiPeer::COMENT;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcrevisiPeer::ESTATU;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = CcrevisiPeer::FECHA;
    }

	} 
	
	public function setCcinformId($v)
	{

    if ($this->ccinform_id !== $v) {
        $this->ccinform_id = $v;
        $this->modifiedColumns[] = CcrevisiPeer::CCINFORM_ID;
      }
  
		if ($this->aCcinform !== null && $this->aCcinform->getId() !== $v) {
			$this->aCcinform = null;
		}

	} 
	
	public function setCcanalisId($v)
	{

    if ($this->ccanalis_id !== $v) {
        $this->ccanalis_id = $v;
        $this->modifiedColumns[] = CcrevisiPeer::CCANALIS_ID;
      }
  
		if ($this->aCcanalis !== null && $this->aCcanalis->getId() !== $v) {
			$this->aCcanalis = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->coment = $rs->getString($startcol + 1);

      $this->estatu = $rs->getString($startcol + 2);

      $this->fecha = $rs->getDate($startcol + 3, null);

      $this->ccinform_id = $rs->getInt($startcol + 4);

      $this->ccanalis_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrevisi object", $e);
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
			$con = Propel::getConnection(CcrevisiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrevisiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrevisiPeer::DATABASE_NAME);
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


												
			if ($this->aCcinform !== null) {
				if ($this->aCcinform->isModified()) {
					$affectedRows += $this->aCcinform->save($con);
				}
				$this->setCcinform($this->aCcinform);
			}

			if ($this->aCcanalis !== null) {
				if ($this->aCcanalis->isModified()) {
					$affectedRows += $this->aCcanalis->save($con);
				}
				$this->setCcanalis($this->aCcanalis);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrevisiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrevisiPeer::doUpdate($this, $con);
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


												
			if ($this->aCcinform !== null) {
				if (!$this->aCcinform->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcinform->getValidationFailures());
				}
			}

			if ($this->aCcanalis !== null) {
				if (!$this->aCcanalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcanalis->getValidationFailures());
				}
			}


			if (($retval = CcrevisiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrevisiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getComent();
				break;
			case 2:
				return $this->getEstatu();
				break;
			case 3:
				return $this->getFecha();
				break;
			case 4:
				return $this->getCcinformId();
				break;
			case 5:
				return $this->getCcanalisId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrevisiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getComent(),
			$keys[2] => $this->getEstatu(),
			$keys[3] => $this->getFecha(),
			$keys[4] => $this->getCcinformId(),
			$keys[5] => $this->getCcanalisId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrevisiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setComent($value);
				break;
			case 2:
				$this->setEstatu($value);
				break;
			case 3:
				$this->setFecha($value);
				break;
			case 4:
				$this->setCcinformId($value);
				break;
			case 5:
				$this->setCcanalisId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrevisiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setComent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstatu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecha($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcinformId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcanalisId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrevisiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrevisiPeer::ID)) $criteria->add(CcrevisiPeer::ID, $this->id);
		if ($this->isColumnModified(CcrevisiPeer::COMENT)) $criteria->add(CcrevisiPeer::COMENT, $this->coment);
		if ($this->isColumnModified(CcrevisiPeer::ESTATU)) $criteria->add(CcrevisiPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcrevisiPeer::FECHA)) $criteria->add(CcrevisiPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CcrevisiPeer::CCINFORM_ID)) $criteria->add(CcrevisiPeer::CCINFORM_ID, $this->ccinform_id);
		if ($this->isColumnModified(CcrevisiPeer::CCANALIS_ID)) $criteria->add(CcrevisiPeer::CCANALIS_ID, $this->ccanalis_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrevisiPeer::DATABASE_NAME);

		$criteria->add(CcrevisiPeer::ID, $this->id);

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

		$copyObj->setComent($this->coment);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setFecha($this->fecha);

		$copyObj->setCcinformId($this->ccinform_id);

		$copyObj->setCcanalisId($this->ccanalis_id);


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
			self::$peer = new CcrevisiPeer();
		}
		return self::$peer;
	}

	
	public function setCcinform($v)
	{


		if ($v === null) {
			$this->setCcinformId(NULL);
		} else {
			$this->setCcinformId($v->getId());
		}


		$this->aCcinform = $v;
	}


	
	public function getCcinform($con = null)
	{
		if ($this->aCcinform === null && ($this->ccinform_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcinformPeer.php';

      $c = new Criteria();
      $c->add(CcinformPeer::ID,$this->ccinform_id);
      
			$this->aCcinform = CcinformPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcinform;
	}

	
	public function setCcanalis($v)
	{


		if ($v === null) {
			$this->setCcanalisId(NULL);
		} else {
			$this->setCcanalisId($v->getId());
		}


		$this->aCcanalis = $v;
	}


	
	public function getCcanalis($con = null)
	{
		if ($this->aCcanalis === null && ($this->ccanalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';

      $c = new Criteria();
      $c->add(CcanalisPeer::ID,$this->ccanalis_id);
      
			$this->aCcanalis = CcanalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcanalis;
	}

} 