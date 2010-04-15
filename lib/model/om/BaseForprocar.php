<?php


abstract class BaseForprocar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprofes;


	
	protected $codcar;


	
	protected $id;

	
	protected $aNpprofesion;

	
	protected $aForcargos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodprofes()
  {

    return trim($this->codprofes);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodprofes($v)
	{

    if ($this->codprofes !== $v) {
        $this->codprofes = $v;
        $this->modifiedColumns[] = ForprocarPeer::CODPROFES;
      }
  
		if ($this->aNpprofesion !== null && $this->aNpprofesion->getCodprofes() !== $v) {
			$this->aNpprofesion = null;
		}

	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = ForprocarPeer::CODCAR;
      }
  
		if ($this->aForcargos !== null && $this->aForcargos->getCodcar() !== $v) {
			$this->aForcargos = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForprocarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codprofes = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forprocar object", $e);
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
			$con = Propel::getConnection(ForprocarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForprocarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForprocarPeer::DATABASE_NAME);
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


												
			if ($this->aNpprofesion !== null) {
				if ($this->aNpprofesion->isModified()) {
					$affectedRows += $this->aNpprofesion->save($con);
				}
				$this->setNpprofesion($this->aNpprofesion);
			}

			if ($this->aForcargos !== null) {
				if ($this->aForcargos->isModified()) {
					$affectedRows += $this->aForcargos->save($con);
				}
				$this->setForcargos($this->aForcargos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ForprocarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForprocarPeer::doUpdate($this, $con);
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


												
			if ($this->aNpprofesion !== null) {
				if (!$this->aNpprofesion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNpprofesion->getValidationFailures());
				}
			}

			if ($this->aForcargos !== null) {
				if (!$this->aForcargos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aForcargos->getValidationFailures());
				}
			}


			if (($retval = ForprocarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForprocarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprofes();
				break;
			case 1:
				return $this->getCodcar();
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
		$keys = ForprocarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprofes(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForprocarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprofes($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForprocarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprofes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForprocarPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForprocarPeer::CODPROFES)) $criteria->add(ForprocarPeer::CODPROFES, $this->codprofes);
		if ($this->isColumnModified(ForprocarPeer::CODCAR)) $criteria->add(ForprocarPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(ForprocarPeer::ID)) $criteria->add(ForprocarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForprocarPeer::DATABASE_NAME);

		$criteria->add(ForprocarPeer::ID, $this->id);

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

		$copyObj->setCodprofes($this->codprofes);

		$copyObj->setCodcar($this->codcar);


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
			self::$peer = new ForprocarPeer();
		}
		return self::$peer;
	}

	
	public function setNpprofesion($v)
	{


		if ($v === null) {
			$this->setCodprofes(NULL);
		} else {
			$this->setCodprofes($v->getCodprofes());
		}


		$this->aNpprofesion = $v;
	}


	
	public function getNpprofesion($con = null)
	{
		if ($this->aNpprofesion === null && (($this->codprofes !== "" && $this->codprofes !== null))) {
						include_once 'lib/model/om/BaseNpprofesionPeer.php';

			$this->aNpprofesion = NpprofesionPeer::retrieveByPK($this->codprofes, $con);

			
		}
		return $this->aNpprofesion;
	}

	
	public function setForcargos($v)
	{


		if ($v === null) {
			$this->setCodcar(NULL);
		} else {
			$this->setCodcar($v->getCodcar());
		}


		$this->aForcargos = $v;
	}


	
	public function getForcargos($con = null)
	{
		if ($this->aForcargos === null && (($this->codcar !== "" && $this->codcar !== null))) {
						include_once 'lib/model/om/BaseForcargosPeer.php';

			$this->aForcargos = ForcargosPeer::retrieveByPK($this->codcar, $con);

			
		}
		return $this->aForcargos;
	}

} 