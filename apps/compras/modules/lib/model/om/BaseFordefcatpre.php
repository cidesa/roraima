<?php


abstract class BaseFordefcatpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $nomcat;


	
	protected $descat;


	
	protected $coduni;


	
	protected $objsec;


	
	protected $codemp;


	
	protected $mision;


	
	protected $vision;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getNomcat()
  {

    return trim($this->nomcat);

  }
  
  public function getDescat()
  {

    return trim($this->descat);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getObjsec()
  {

    return trim($this->objsec);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getMision()
  {

    return trim($this->mision);

  }
  
  public function getVision()
  {

    return trim($this->vision);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = FordefcatprePeer::CODCAT;
      }
  
	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = FordefcatprePeer::NOMCAT;
      }
  
	} 
	
	public function setDescat($v)
	{

    if ($this->descat !== $v) {
        $this->descat = $v;
        $this->modifiedColumns[] = FordefcatprePeer::DESCAT;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = FordefcatprePeer::CODUNI;
      }
  
	} 
	
	public function setObjsec($v)
	{

    if ($this->objsec !== $v) {
        $this->objsec = $v;
        $this->modifiedColumns[] = FordefcatprePeer::OBJSEC;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = FordefcatprePeer::CODEMP;
      }
  
	} 
	
	public function setMision($v)
	{

    if ($this->mision !== $v) {
        $this->mision = $v;
        $this->modifiedColumns[] = FordefcatprePeer::MISION;
      }
  
	} 
	
	public function setVision($v)
	{

    if ($this->vision !== $v) {
        $this->vision = $v;
        $this->modifiedColumns[] = FordefcatprePeer::VISION;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefcatprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->nomcat = $rs->getString($startcol + 1);

      $this->descat = $rs->getString($startcol + 2);

      $this->coduni = $rs->getString($startcol + 3);

      $this->objsec = $rs->getString($startcol + 4);

      $this->codemp = $rs->getString($startcol + 5);

      $this->mision = $rs->getString($startcol + 6);

      $this->vision = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefcatpre object", $e);
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
			$con = Propel::getConnection(FordefcatprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefcatprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefcatprePeer::DATABASE_NAME);
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
					$pk = FordefcatprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefcatprePeer::doUpdate($this, $con);
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


			if (($retval = FordefcatprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefcatprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getNomcat();
				break;
			case 2:
				return $this->getDescat();
				break;
			case 3:
				return $this->getCoduni();
				break;
			case 4:
				return $this->getObjsec();
				break;
			case 5:
				return $this->getCodemp();
				break;
			case 6:
				return $this->getMision();
				break;
			case 7:
				return $this->getVision();
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
		$keys = FordefcatprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getNomcat(),
			$keys[2] => $this->getDescat(),
			$keys[3] => $this->getCoduni(),
			$keys[4] => $this->getObjsec(),
			$keys[5] => $this->getCodemp(),
			$keys[6] => $this->getMision(),
			$keys[7] => $this->getVision(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefcatprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setNomcat($value);
				break;
			case 2:
				$this->setDescat($value);
				break;
			case 3:
				$this->setCoduni($value);
				break;
			case 4:
				$this->setObjsec($value);
				break;
			case 5:
				$this->setCodemp($value);
				break;
			case 6:
				$this->setMision($value);
				break;
			case 7:
				$this->setVision($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefcatprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoduni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObjsec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMision($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVision($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefcatprePeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefcatprePeer::CODCAT)) $criteria->add(FordefcatprePeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(FordefcatprePeer::NOMCAT)) $criteria->add(FordefcatprePeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(FordefcatprePeer::DESCAT)) $criteria->add(FordefcatprePeer::DESCAT, $this->descat);
		if ($this->isColumnModified(FordefcatprePeer::CODUNI)) $criteria->add(FordefcatprePeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(FordefcatprePeer::OBJSEC)) $criteria->add(FordefcatprePeer::OBJSEC, $this->objsec);
		if ($this->isColumnModified(FordefcatprePeer::CODEMP)) $criteria->add(FordefcatprePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FordefcatprePeer::MISION)) $criteria->add(FordefcatprePeer::MISION, $this->mision);
		if ($this->isColumnModified(FordefcatprePeer::VISION)) $criteria->add(FordefcatprePeer::VISION, $this->vision);
		if ($this->isColumnModified(FordefcatprePeer::ID)) $criteria->add(FordefcatprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefcatprePeer::DATABASE_NAME);

		$criteria->add(FordefcatprePeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setNomcat($this->nomcat);

		$copyObj->setDescat($this->descat);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setObjsec($this->objsec);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setMision($this->mision);

		$copyObj->setVision($this->vision);


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
			self::$peer = new FordefcatprePeer();
		}
		return self::$peer;
	}

} 