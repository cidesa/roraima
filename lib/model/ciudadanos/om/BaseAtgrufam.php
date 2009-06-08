<?php


abstract class BaseAtgrufam extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atciudadano_id;


	
	protected $cedfam;


	
	protected $nomfam;


	
	protected $apefam;


	
	protected $edad;


	
	protected $parfam;


	
	protected $ocufam;


	
	protected $moning;


	
	protected $id;

	
	protected $aAtciudadano;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtciudadanoId()
  {

    return $this->atciudadano_id;

  }
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getNomfam()
  {

    return trim($this->nomfam);

  }
  
  public function getApefam()
  {

    return trim($this->apefam);

  }
  
  public function getEdad()
  {

    return $this->edad;

  }
  
  public function getParfam()
  {

    return trim($this->parfam);

  }
  
  public function getOcufam()
  {

    return trim($this->ocufam);

  }
  
  public function getMoning($val=false)
  {

    if($val) return number_format($this->moning,2,',','.');
    else return $this->moning;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtciudadanoId($v)
	{

    if ($this->atciudadano_id !== $v) {
        $this->atciudadano_id = $v;
        $this->modifiedColumns[] = AtgrufamPeer::ATCIUDADANO_ID;
      }
  
		if ($this->aAtciudadano !== null && $this->aAtciudadano->getId() !== $v) {
			$this->aAtciudadano = null;
		}

	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = AtgrufamPeer::CEDFAM;
      }
  
	} 
	
	public function setNomfam($v)
	{

    if ($this->nomfam !== $v) {
        $this->nomfam = $v;
        $this->modifiedColumns[] = AtgrufamPeer::NOMFAM;
      }
  
	} 
	
	public function setApefam($v)
	{

    if ($this->apefam !== $v) {
        $this->apefam = $v;
        $this->modifiedColumns[] = AtgrufamPeer::APEFAM;
      }
  
	} 
	
	public function setEdad($v)
	{

    if ($this->edad !== $v) {
        $this->edad = $v;
        $this->modifiedColumns[] = AtgrufamPeer::EDAD;
      }
  
	} 
	
	public function setParfam($v)
	{

    if ($this->parfam !== $v) {
        $this->parfam = $v;
        $this->modifiedColumns[] = AtgrufamPeer::PARFAM;
      }
  
	} 
	
	public function setOcufam($v)
	{

    if ($this->ocufam !== $v) {
        $this->ocufam = $v;
        $this->modifiedColumns[] = AtgrufamPeer::OCUFAM;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtgrufamPeer::MONING;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtgrufamPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atciudadano_id = $rs->getInt($startcol + 0);

      $this->cedfam = $rs->getString($startcol + 1);

      $this->nomfam = $rs->getString($startcol + 2);

      $this->apefam = $rs->getString($startcol + 3);

      $this->edad = $rs->getInt($startcol + 4);

      $this->parfam = $rs->getString($startcol + 5);

      $this->ocufam = $rs->getString($startcol + 6);

      $this->moning = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atgrufam object", $e);
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
			$con = Propel::getConnection(AtgrufamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtgrufamPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtgrufamPeer::DATABASE_NAME);
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


												
			if ($this->aAtciudadano !== null) {
				if ($this->aAtciudadano->isModified()) {
					$affectedRows += $this->aAtciudadano->save($con);
				}
				$this->setAtciudadano($this->aAtciudadano);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtgrufamPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtgrufamPeer::doUpdate($this, $con);
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


												
			if ($this->aAtciudadano !== null) {
				if (!$this->aAtciudadano->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadano->getValidationFailures());
				}
			}


			if (($retval = AtgrufamPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtgrufamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtciudadanoId();
				break;
			case 1:
				return $this->getCedfam();
				break;
			case 2:
				return $this->getNomfam();
				break;
			case 3:
				return $this->getApefam();
				break;
			case 4:
				return $this->getEdad();
				break;
			case 5:
				return $this->getParfam();
				break;
			case 6:
				return $this->getOcufam();
				break;
			case 7:
				return $this->getMoning();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtgrufamPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtciudadanoId(),
			$keys[1] => $this->getCedfam(),
			$keys[2] => $this->getNomfam(),
			$keys[3] => $this->getApefam(),
			$keys[4] => $this->getEdad(),
			$keys[5] => $this->getParfam(),
			$keys[6] => $this->getOcufam(),
			$keys[7] => $this->getMoning(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtgrufamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtciudadanoId($value);
				break;
			case 1:
				$this->setCedfam($value);
				break;
			case 2:
				$this->setNomfam($value);
				break;
			case 3:
				$this->setApefam($value);
				break;
			case 4:
				$this->setEdad($value);
				break;
			case 5:
				$this->setParfam($value);
				break;
			case 6:
				$this->setOcufam($value);
				break;
			case 7:
				$this->setMoning($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtgrufamPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtciudadanoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedfam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApefam($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEdad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setParfam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOcufam($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMoning($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtgrufamPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtgrufamPeer::ATCIUDADANO_ID)) $criteria->add(AtgrufamPeer::ATCIUDADANO_ID, $this->atciudadano_id);
		if ($this->isColumnModified(AtgrufamPeer::CEDFAM)) $criteria->add(AtgrufamPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(AtgrufamPeer::NOMFAM)) $criteria->add(AtgrufamPeer::NOMFAM, $this->nomfam);
		if ($this->isColumnModified(AtgrufamPeer::APEFAM)) $criteria->add(AtgrufamPeer::APEFAM, $this->apefam);
		if ($this->isColumnModified(AtgrufamPeer::EDAD)) $criteria->add(AtgrufamPeer::EDAD, $this->edad);
		if ($this->isColumnModified(AtgrufamPeer::PARFAM)) $criteria->add(AtgrufamPeer::PARFAM, $this->parfam);
		if ($this->isColumnModified(AtgrufamPeer::OCUFAM)) $criteria->add(AtgrufamPeer::OCUFAM, $this->ocufam);
		if ($this->isColumnModified(AtgrufamPeer::MONING)) $criteria->add(AtgrufamPeer::MONING, $this->moning);
		if ($this->isColumnModified(AtgrufamPeer::ID)) $criteria->add(AtgrufamPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtgrufamPeer::DATABASE_NAME);

		$criteria->add(AtgrufamPeer::ID, $this->id);

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

		$copyObj->setAtciudadanoId($this->atciudadano_id);

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setNomfam($this->nomfam);

		$copyObj->setApefam($this->apefam);

		$copyObj->setEdad($this->edad);

		$copyObj->setParfam($this->parfam);

		$copyObj->setOcufam($this->ocufam);

		$copyObj->setMoning($this->moning);


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
			self::$peer = new AtgrufamPeer();
		}
		return self::$peer;
	}

	
	public function setAtciudadano($v)
	{


		if ($v === null) {
			$this->setAtciudadanoId(NULL);
		} else {
			$this->setAtciudadanoId($v->getId());
		}


		$this->aAtciudadano = $v;
	}


	
	public function getAtciudadano($con = null)
	{
		if ($this->aAtciudadano === null && ($this->atciudadano_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';

			$this->aAtciudadano = AtciudadanoPeer::retrieveByPK($this->atciudadano_id, $con);

			
		}
		return $this->aAtciudadano;
	}

} 