<?php


abstract class BaseCcparamo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $priori;


	
	protected $nombre;


	
	protected $primonintmor;


	
	protected $primonint;


	
	protected $primonpri;


	
	protected $primonintgra;


	
	protected $primonintcum;


	
	protected $ccperparamo_id;

	
	protected $aCcperparamo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPriori()
  {

    return $this->priori;

  }
  
  public function getNombre()
  {

    return trim($this->nombre);

  }
  
  public function getPrimonintmor()
  {

    return $this->primonintmor;

  }
  
  public function getPrimonint()
  {

    return $this->primonint;

  }
  
  public function getPrimonpri()
  {

    return $this->primonpri;

  }
  
  public function getPrimonintgra()
  {

    return $this->primonintgra;

  }
  
  public function getPrimonintcum()
  {

    return $this->primonintcum;

  }
  
  public function getCcperparamoId()
  {

    return $this->ccperparamo_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparamoPeer::ID;
      }
  
	} 
	
	public function setPriori($v)
	{

    if ($this->priori !== $v) {
        $this->priori = $v;
        $this->modifiedColumns[] = CcparamoPeer::PRIORI;
      }
  
	} 
	
	public function setNombre($v)
	{

    if ($this->nombre !== $v) {
        $this->nombre = $v;
        $this->modifiedColumns[] = CcparamoPeer::NOMBRE;
      }
  
	} 
	
	public function setPrimonintmor($v)
	{

    if ($this->primonintmor !== $v) {
        $this->primonintmor = $v;
        $this->modifiedColumns[] = CcparamoPeer::PRIMONINTMOR;
      }
  
	} 
	
	public function setPrimonint($v)
	{

    if ($this->primonint !== $v) {
        $this->primonint = $v;
        $this->modifiedColumns[] = CcparamoPeer::PRIMONINT;
      }
  
	} 
	
	public function setPrimonpri($v)
	{

    if ($this->primonpri !== $v) {
        $this->primonpri = $v;
        $this->modifiedColumns[] = CcparamoPeer::PRIMONPRI;
      }
  
	} 
	
	public function setPrimonintgra($v)
	{

    if ($this->primonintgra !== $v) {
        $this->primonintgra = $v;
        $this->modifiedColumns[] = CcparamoPeer::PRIMONINTGRA;
      }
  
	} 
	
	public function setPrimonintcum($v)
	{

    if ($this->primonintcum !== $v) {
        $this->primonintcum = $v;
        $this->modifiedColumns[] = CcparamoPeer::PRIMONINTCUM;
      }
  
	} 
	
	public function setCcperparamoId($v)
	{

    if ($this->ccperparamo_id !== $v) {
        $this->ccperparamo_id = $v;
        $this->modifiedColumns[] = CcparamoPeer::CCPERPARAMO_ID;
      }
  
		if ($this->aCcperparamo !== null && $this->aCcperparamo->getId() !== $v) {
			$this->aCcperparamo = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->priori = $rs->getInt($startcol + 1);

      $this->nombre = $rs->getString($startcol + 2);

      $this->primonintmor = $rs->getInt($startcol + 3);

      $this->primonint = $rs->getInt($startcol + 4);

      $this->primonpri = $rs->getInt($startcol + 5);

      $this->primonintgra = $rs->getInt($startcol + 6);

      $this->primonintcum = $rs->getInt($startcol + 7);

      $this->ccperparamo_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparamo object", $e);
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
			$con = Propel::getConnection(CcparamoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparamoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparamoPeer::DATABASE_NAME);
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


												
			if ($this->aCcperparamo !== null) {
				if ($this->aCcperparamo->isModified()) {
					$affectedRows += $this->aCcperparamo->save($con);
				}
				$this->setCcperparamo($this->aCcperparamo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcparamoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparamoPeer::doUpdate($this, $con);
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


												
			if ($this->aCcperparamo !== null) {
				if (!$this->aCcperparamo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperparamo->getValidationFailures());
				}
			}


			if (($retval = CcparamoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparamoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPriori();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getPrimonintmor();
				break;
			case 4:
				return $this->getPrimonint();
				break;
			case 5:
				return $this->getPrimonpri();
				break;
			case 6:
				return $this->getPrimonintgra();
				break;
			case 7:
				return $this->getPrimonintcum();
				break;
			case 8:
				return $this->getCcperparamoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparamoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPriori(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getPrimonintmor(),
			$keys[4] => $this->getPrimonint(),
			$keys[5] => $this->getPrimonpri(),
			$keys[6] => $this->getPrimonintgra(),
			$keys[7] => $this->getPrimonintcum(),
			$keys[8] => $this->getCcperparamoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparamoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPriori($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setPrimonintmor($value);
				break;
			case 4:
				$this->setPrimonint($value);
				break;
			case 5:
				$this->setPrimonpri($value);
				break;
			case 6:
				$this->setPrimonintgra($value);
				break;
			case 7:
				$this->setPrimonintcum($value);
				break;
			case 8:
				$this->setCcperparamoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparamoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPriori($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrimonintmor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrimonint($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrimonpri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPrimonintgra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPrimonintcum($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcperparamoId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparamoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparamoPeer::ID)) $criteria->add(CcparamoPeer::ID, $this->id);
		if ($this->isColumnModified(CcparamoPeer::PRIORI)) $criteria->add(CcparamoPeer::PRIORI, $this->priori);
		if ($this->isColumnModified(CcparamoPeer::NOMBRE)) $criteria->add(CcparamoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CcparamoPeer::PRIMONINTMOR)) $criteria->add(CcparamoPeer::PRIMONINTMOR, $this->primonintmor);
		if ($this->isColumnModified(CcparamoPeer::PRIMONINT)) $criteria->add(CcparamoPeer::PRIMONINT, $this->primonint);
		if ($this->isColumnModified(CcparamoPeer::PRIMONPRI)) $criteria->add(CcparamoPeer::PRIMONPRI, $this->primonpri);
		if ($this->isColumnModified(CcparamoPeer::PRIMONINTGRA)) $criteria->add(CcparamoPeer::PRIMONINTGRA, $this->primonintgra);
		if ($this->isColumnModified(CcparamoPeer::PRIMONINTCUM)) $criteria->add(CcparamoPeer::PRIMONINTCUM, $this->primonintcum);
		if ($this->isColumnModified(CcparamoPeer::CCPERPARAMO_ID)) $criteria->add(CcparamoPeer::CCPERPARAMO_ID, $this->ccperparamo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparamoPeer::DATABASE_NAME);

		$criteria->add(CcparamoPeer::ID, $this->id);

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

		$copyObj->setPriori($this->priori);

		$copyObj->setNombre($this->nombre);

		$copyObj->setPrimonintmor($this->primonintmor);

		$copyObj->setPrimonint($this->primonint);

		$copyObj->setPrimonpri($this->primonpri);

		$copyObj->setPrimonintgra($this->primonintgra);

		$copyObj->setPrimonintcum($this->primonintcum);

		$copyObj->setCcperparamoId($this->ccperparamo_id);


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
			self::$peer = new CcparamoPeer();
		}
		return self::$peer;
	}

	
	public function setCcperparamo($v)
	{


		if ($v === null) {
			$this->setCcperparamoId(NULL);
		} else {
			$this->setCcperparamoId($v->getId());
		}


		$this->aCcperparamo = $v;
	}


	
	public function getCcperparamo($con = null)
	{
		if ($this->aCcperparamo === null && ($this->ccperparamo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperparamoPeer.php';

      $c = new Criteria();
      $c->add(CcperparamoPeer::ID,$this->ccperparamo_id);
      
			$this->aCcperparamo = CcperparamoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperparamo;
	}

} 