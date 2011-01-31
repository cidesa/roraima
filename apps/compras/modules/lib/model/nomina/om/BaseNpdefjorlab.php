<?php


abstract class BaseNpdefjorlab extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $idejor;


	
	protected $lunes;


	
	protected $martes;


	
	protected $miercoles;


	
	protected $jueves;


	
	protected $viernes;


	
	protected $sabado;


	
	protected $domingo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getIdejor()
  {

    return trim($this->idejor);

  }
  
  public function getLunes()
  {

    return trim($this->lunes);

  }
  
  public function getMartes()
  {

    return trim($this->martes);

  }
  
  public function getMiercoles()
  {

    return trim($this->miercoles);

  }
  
  public function getJueves()
  {

    return trim($this->jueves);

  }
  
  public function getViernes()
  {

    return trim($this->viernes);

  }
  
  public function getSabado()
  {

    return trim($this->sabado);

  }
  
  public function getDomingo()
  {

    return trim($this->domingo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::CODNOM;
      }
  
	} 
	
	public function setIdejor($v)
	{

    if ($this->idejor !== $v) {
        $this->idejor = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::IDEJOR;
      }
  
	} 
	
	public function setLunes($v)
	{

    if ($this->lunes !== $v) {
        $this->lunes = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::LUNES;
      }
  
	} 
	
	public function setMartes($v)
	{

    if ($this->martes !== $v) {
        $this->martes = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::MARTES;
      }
  
	} 
	
	public function setMiercoles($v)
	{

    if ($this->miercoles !== $v) {
        $this->miercoles = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::MIERCOLES;
      }
  
	} 
	
	public function setJueves($v)
	{

    if ($this->jueves !== $v) {
        $this->jueves = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::JUEVES;
      }
  
	} 
	
	public function setViernes($v)
	{

    if ($this->viernes !== $v) {
        $this->viernes = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::VIERNES;
      }
  
	} 
	
	public function setSabado($v)
	{

    if ($this->sabado !== $v) {
        $this->sabado = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::SABADO;
      }
  
	} 
	
	public function setDomingo($v)
	{

    if ($this->domingo !== $v) {
        $this->domingo = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::DOMINGO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefjorlabPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->idejor = $rs->getString($startcol + 1);

      $this->lunes = $rs->getString($startcol + 2);

      $this->martes = $rs->getString($startcol + 3);

      $this->miercoles = $rs->getString($startcol + 4);

      $this->jueves = $rs->getString($startcol + 5);

      $this->viernes = $rs->getString($startcol + 6);

      $this->sabado = $rs->getString($startcol + 7);

      $this->domingo = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefjorlab object", $e);
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
			$con = Propel::getConnection(NpdefjorlabPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefjorlabPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefjorlabPeer::DATABASE_NAME);
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
					$pk = NpdefjorlabPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdefjorlabPeer::doUpdate($this, $con);
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


			if (($retval = NpdefjorlabPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefjorlabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getIdejor();
				break;
			case 2:
				return $this->getLunes();
				break;
			case 3:
				return $this->getMartes();
				break;
			case 4:
				return $this->getMiercoles();
				break;
			case 5:
				return $this->getJueves();
				break;
			case 6:
				return $this->getViernes();
				break;
			case 7:
				return $this->getSabado();
				break;
			case 8:
				return $this->getDomingo();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefjorlabPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getIdejor(),
			$keys[2] => $this->getLunes(),
			$keys[3] => $this->getMartes(),
			$keys[4] => $this->getMiercoles(),
			$keys[5] => $this->getJueves(),
			$keys[6] => $this->getViernes(),
			$keys[7] => $this->getSabado(),
			$keys[8] => $this->getDomingo(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefjorlabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setIdejor($value);
				break;
			case 2:
				$this->setLunes($value);
				break;
			case 3:
				$this->setMartes($value);
				break;
			case 4:
				$this->setMiercoles($value);
				break;
			case 5:
				$this->setJueves($value);
				break;
			case 6:
				$this->setViernes($value);
				break;
			case 7:
				$this->setSabado($value);
				break;
			case 8:
				$this->setDomingo($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefjorlabPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdejor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLunes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMartes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMiercoles($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setJueves($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setViernes($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSabado($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDomingo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefjorlabPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefjorlabPeer::CODNOM)) $criteria->add(NpdefjorlabPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpdefjorlabPeer::IDEJOR)) $criteria->add(NpdefjorlabPeer::IDEJOR, $this->idejor);
		if ($this->isColumnModified(NpdefjorlabPeer::LUNES)) $criteria->add(NpdefjorlabPeer::LUNES, $this->lunes);
		if ($this->isColumnModified(NpdefjorlabPeer::MARTES)) $criteria->add(NpdefjorlabPeer::MARTES, $this->martes);
		if ($this->isColumnModified(NpdefjorlabPeer::MIERCOLES)) $criteria->add(NpdefjorlabPeer::MIERCOLES, $this->miercoles);
		if ($this->isColumnModified(NpdefjorlabPeer::JUEVES)) $criteria->add(NpdefjorlabPeer::JUEVES, $this->jueves);
		if ($this->isColumnModified(NpdefjorlabPeer::VIERNES)) $criteria->add(NpdefjorlabPeer::VIERNES, $this->viernes);
		if ($this->isColumnModified(NpdefjorlabPeer::SABADO)) $criteria->add(NpdefjorlabPeer::SABADO, $this->sabado);
		if ($this->isColumnModified(NpdefjorlabPeer::DOMINGO)) $criteria->add(NpdefjorlabPeer::DOMINGO, $this->domingo);
		if ($this->isColumnModified(NpdefjorlabPeer::ID)) $criteria->add(NpdefjorlabPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefjorlabPeer::DATABASE_NAME);

		$criteria->add(NpdefjorlabPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setIdejor($this->idejor);

		$copyObj->setLunes($this->lunes);

		$copyObj->setMartes($this->martes);

		$copyObj->setMiercoles($this->miercoles);

		$copyObj->setJueves($this->jueves);

		$copyObj->setViernes($this->viernes);

		$copyObj->setSabado($this->sabado);

		$copyObj->setDomingo($this->domingo);


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
			self::$peer = new NpdefjorlabPeer();
		}
		return self::$peer;
	}

} 