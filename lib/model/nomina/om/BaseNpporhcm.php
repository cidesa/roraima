<?php


abstract class BaseNpporhcm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $tipcar;


	
	protected $tippar;


	
	protected $edades;


	
	protected $edahas;


	
	protected $porcub;


	
	protected $dissus;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getTipcar()
  {

    return trim($this->tipcar);

  }
  
  public function getTippar()
  {

    return trim($this->tippar);

  }
  
  public function getEdades($val=false)
  {

    if($val) return number_format($this->edades,2,',','.');
    else return $this->edades;

  }
  
  public function getEdahas($val=false)
  {

    if($val) return number_format($this->edahas,2,',','.');
    else return $this->edahas;

  }
  
  public function getPorcub($val=false)
  {

    if($val) return number_format($this->porcub,2,',','.');
    else return $this->porcub;

  }
  
  public function getDissus()
  {

    return trim($this->dissus);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpporhcmPeer::CODNOM;
      }
  
	} 
	
	public function setTipcar($v)
	{

    if ($this->tipcar !== $v) {
        $this->tipcar = $v;
        $this->modifiedColumns[] = NpporhcmPeer::TIPCAR;
      }
  
	} 
	
	public function setTippar($v)
	{

    if ($this->tippar !== $v) {
        $this->tippar = $v;
        $this->modifiedColumns[] = NpporhcmPeer::TIPPAR;
      }
  
	} 
	
	public function setEdades($v)
	{

    if ($this->edades !== $v) {
        $this->edades = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpporhcmPeer::EDADES;
      }
  
	} 
	
	public function setEdahas($v)
	{

    if ($this->edahas !== $v) {
        $this->edahas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpporhcmPeer::EDAHAS;
      }
  
	} 
	
	public function setPorcub($v)
	{

    if ($this->porcub !== $v) {
        $this->porcub = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpporhcmPeer::PORCUB;
      }
  
	} 
	
	public function setDissus($v)
	{

    if ($this->dissus !== $v) {
        $this->dissus = $v;
        $this->modifiedColumns[] = NpporhcmPeer::DISSUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpporhcmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->tipcar = $rs->getString($startcol + 1);

      $this->tippar = $rs->getString($startcol + 2);

      $this->edades = $rs->getFloat($startcol + 3);

      $this->edahas = $rs->getFloat($startcol + 4);

      $this->porcub = $rs->getFloat($startcol + 5);

      $this->dissus = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npporhcm object", $e);
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
			$con = Propel::getConnection(NpporhcmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpporhcmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpporhcmPeer::DATABASE_NAME);
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
					$pk = NpporhcmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpporhcmPeer::doUpdate($this, $con);
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


			if (($retval = NpporhcmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpporhcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getTipcar();
				break;
			case 2:
				return $this->getTippar();
				break;
			case 3:
				return $this->getEdades();
				break;
			case 4:
				return $this->getEdahas();
				break;
			case 5:
				return $this->getPorcub();
				break;
			case 6:
				return $this->getDissus();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpporhcmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getTipcar(),
			$keys[2] => $this->getTippar(),
			$keys[3] => $this->getEdades(),
			$keys[4] => $this->getEdahas(),
			$keys[5] => $this->getPorcub(),
			$keys[6] => $this->getDissus(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpporhcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setTipcar($value);
				break;
			case 2:
				$this->setTippar($value);
				break;
			case 3:
				$this->setEdades($value);
				break;
			case 4:
				$this->setEdahas($value);
				break;
			case 5:
				$this->setPorcub($value);
				break;
			case 6:
				$this->setDissus($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpporhcmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTippar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEdades($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEdahas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPorcub($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDissus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpporhcmPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpporhcmPeer::CODNOM)) $criteria->add(NpporhcmPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpporhcmPeer::TIPCAR)) $criteria->add(NpporhcmPeer::TIPCAR, $this->tipcar);
		if ($this->isColumnModified(NpporhcmPeer::TIPPAR)) $criteria->add(NpporhcmPeer::TIPPAR, $this->tippar);
		if ($this->isColumnModified(NpporhcmPeer::EDADES)) $criteria->add(NpporhcmPeer::EDADES, $this->edades);
		if ($this->isColumnModified(NpporhcmPeer::EDAHAS)) $criteria->add(NpporhcmPeer::EDAHAS, $this->edahas);
		if ($this->isColumnModified(NpporhcmPeer::PORCUB)) $criteria->add(NpporhcmPeer::PORCUB, $this->porcub);
		if ($this->isColumnModified(NpporhcmPeer::DISSUS)) $criteria->add(NpporhcmPeer::DISSUS, $this->dissus);
		if ($this->isColumnModified(NpporhcmPeer::ID)) $criteria->add(NpporhcmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpporhcmPeer::DATABASE_NAME);

		$criteria->add(NpporhcmPeer::ID, $this->id);

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

		$copyObj->setTipcar($this->tipcar);

		$copyObj->setTippar($this->tippar);

		$copyObj->setEdades($this->edades);

		$copyObj->setEdahas($this->edahas);

		$copyObj->setPorcub($this->porcub);

		$copyObj->setDissus($this->dissus);


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
			self::$peer = new NpporhcmPeer();
		}
		return self::$peer;
	}

} 