<?php


abstract class BaseCatusoespinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catreginm_id;


	
	protected $catusoesp_id;


	
	protected $tipo;


	
	protected $valor;


	
	protected $id;

	
	protected $aCatreginm;

	
	protected $aCatusoesp;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatreginmId()
  {

    return $this->catreginm_id;

  }
  
  public function getCatusoespId()
  {

    return $this->catusoesp_id;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getValor()
  {

    return $this->valor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatreginmId($v)
	{

    if ($this->catreginm_id !== $v) {
        $this->catreginm_id = $v;
        $this->modifiedColumns[] = CatusoespinmPeer::CATREGINM_ID;
      }
  
		if ($this->aCatreginm !== null && $this->aCatreginm->getId() !== $v) {
			$this->aCatreginm = null;
		}

	} 
	
	public function setCatusoespId($v)
	{

    if ($this->catusoesp_id !== $v) {
        $this->catusoesp_id = $v;
        $this->modifiedColumns[] = CatusoespinmPeer::CATUSOESP_ID;
      }
  
		if ($this->aCatusoesp !== null && $this->aCatusoesp->getId() !== $v) {
			$this->aCatusoesp = null;
		}

	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CatusoespinmPeer::TIPO;
      }
  
	} 
	
	public function setValor($v)
	{

    if ($this->valor !== $v) {
        $this->valor = $v;
        $this->modifiedColumns[] = CatusoespinmPeer::VALOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatusoespinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catreginm_id = $rs->getInt($startcol + 0);

      $this->catusoesp_id = $rs->getInt($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->valor = $rs->getInt($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catusoespinm object", $e);
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
			$con = Propel::getConnection(CatusoespinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatusoespinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatusoespinmPeer::DATABASE_NAME);
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


												
			if ($this->aCatreginm !== null) {
				if ($this->aCatreginm->isModified()) {
					$affectedRows += $this->aCatreginm->save($con);
				}
				$this->setCatreginm($this->aCatreginm);
			}

			if ($this->aCatusoesp !== null) {
				if ($this->aCatusoesp->isModified()) {
					$affectedRows += $this->aCatusoesp->save($con);
				}
				$this->setCatusoesp($this->aCatusoesp);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatusoespinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatusoespinmPeer::doUpdate($this, $con);
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


												
			if ($this->aCatreginm !== null) {
				if (!$this->aCatreginm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatreginm->getValidationFailures());
				}
			}

			if ($this->aCatusoesp !== null) {
				if (!$this->aCatusoesp->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatusoesp->getValidationFailures());
				}
			}


			if (($retval = CatusoespinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatusoespinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatreginmId();
				break;
			case 1:
				return $this->getCatusoespId();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getValor();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatusoespinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatreginmId(),
			$keys[1] => $this->getCatusoespId(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getValor(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatusoespinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatreginmId($value);
				break;
			case 1:
				$this->setCatusoespId($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setValor($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatusoespinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatreginmId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatusoespId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatusoespinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatusoespinmPeer::CATREGINM_ID)) $criteria->add(CatusoespinmPeer::CATREGINM_ID, $this->catreginm_id);
		if ($this->isColumnModified(CatusoespinmPeer::CATUSOESP_ID)) $criteria->add(CatusoespinmPeer::CATUSOESP_ID, $this->catusoesp_id);
		if ($this->isColumnModified(CatusoespinmPeer::TIPO)) $criteria->add(CatusoespinmPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CatusoespinmPeer::VALOR)) $criteria->add(CatusoespinmPeer::VALOR, $this->valor);
		if ($this->isColumnModified(CatusoespinmPeer::ID)) $criteria->add(CatusoespinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatusoespinmPeer::DATABASE_NAME);

		$criteria->add(CatusoespinmPeer::ID, $this->id);

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

		$copyObj->setCatreginmId($this->catreginm_id);

		$copyObj->setCatusoespId($this->catusoesp_id);

		$copyObj->setTipo($this->tipo);

		$copyObj->setValor($this->valor);


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
			self::$peer = new CatusoespinmPeer();
		}
		return self::$peer;
	}

	
	public function setCatreginm($v)
	{


		if ($v === null) {
			$this->setCatreginmId(NULL);
		} else {
			$this->setCatreginmId($v->getId());
		}


		$this->aCatreginm = $v;
	}


	
	public function getCatreginm($con = null)
	{
		if ($this->aCatreginm === null && ($this->catreginm_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';

			$this->aCatreginm = CatreginmPeer::retrieveByPK($this->catreginm_id, $con);

			
		}
		return $this->aCatreginm;
	}

	
	public function setCatusoesp($v)
	{


		if ($v === null) {
			$this->setCatusoespId(NULL);
		} else {
			$this->setCatusoespId($v->getId());
		}


		$this->aCatusoesp = $v;
	}


	
	public function getCatusoesp($con = null)
	{
		if ($this->aCatusoesp === null && ($this->catusoesp_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatusoespPeer.php';

			$this->aCatusoesp = CatusoespPeer::retrieveByPK($this->catusoesp_id, $con);

			
		}
		return $this->aCatusoesp;
	}

} 