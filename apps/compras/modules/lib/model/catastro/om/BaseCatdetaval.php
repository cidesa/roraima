<?php


abstract class BaseCatdetaval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catdefaval_id;


	
	protected $catusoesp_id;


	
	protected $tipo;


	
	protected $montot;


	
	protected $id;

	
	protected $aCatdefaval;

	
	protected $aCatusoesp;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatdefavalId()
  {

    return $this->catdefaval_id;

  }
  
  public function getCatusoespId()
  {

    return $this->catusoesp_id;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatdefavalId($v)
	{

    if ($this->catdefaval_id !== $v) {
        $this->catdefaval_id = $v;
        $this->modifiedColumns[] = CatdetavalPeer::CATDEFAVAL_ID;
      }
  
		if ($this->aCatdefaval !== null && $this->aCatdefaval->getId() !== $v) {
			$this->aCatdefaval = null;
		}

	} 
	
	public function setCatusoespId($v)
	{

    if ($this->catusoesp_id !== $v) {
        $this->catusoesp_id = $v;
        $this->modifiedColumns[] = CatdetavalPeer::CATUSOESP_ID;
      }
  
		if ($this->aCatusoesp !== null && $this->aCatusoesp->getId() !== $v) {
			$this->aCatusoesp = null;
		}

	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CatdetavalPeer::TIPO;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatdetavalPeer::MONTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatdetavalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catdefaval_id = $rs->getInt($startcol + 0);

      $this->catusoesp_id = $rs->getInt($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->montot = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catdetaval object", $e);
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
			$con = Propel::getConnection(CatdetavalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatdetavalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatdetavalPeer::DATABASE_NAME);
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


												
			if ($this->aCatdefaval !== null) {
				if ($this->aCatdefaval->isModified()) {
					$affectedRows += $this->aCatdefaval->save($con);
				}
				$this->setCatdefaval($this->aCatdefaval);
			}

			if ($this->aCatusoesp !== null) {
				if ($this->aCatusoesp->isModified()) {
					$affectedRows += $this->aCatusoesp->save($con);
				}
				$this->setCatusoesp($this->aCatusoesp);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatdetavalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatdetavalPeer::doUpdate($this, $con);
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


												
			if ($this->aCatdefaval !== null) {
				if (!$this->aCatdefaval->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatdefaval->getValidationFailures());
				}
			}

			if ($this->aCatusoesp !== null) {
				if (!$this->aCatusoesp->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatusoesp->getValidationFailures());
				}
			}


			if (($retval = CatdetavalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatdetavalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatdefavalId();
				break;
			case 1:
				return $this->getCatusoespId();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getMontot();
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
		$keys = CatdetavalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatdefavalId(),
			$keys[1] => $this->getCatusoespId(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getMontot(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatdetavalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatdefavalId($value);
				break;
			case 1:
				$this->setCatusoespId($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setMontot($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatdetavalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatdefavalId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatusoespId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatdetavalPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatdetavalPeer::CATDEFAVAL_ID)) $criteria->add(CatdetavalPeer::CATDEFAVAL_ID, $this->catdefaval_id);
		if ($this->isColumnModified(CatdetavalPeer::CATUSOESP_ID)) $criteria->add(CatdetavalPeer::CATUSOESP_ID, $this->catusoesp_id);
		if ($this->isColumnModified(CatdetavalPeer::TIPO)) $criteria->add(CatdetavalPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CatdetavalPeer::MONTOT)) $criteria->add(CatdetavalPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CatdetavalPeer::ID)) $criteria->add(CatdetavalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatdetavalPeer::DATABASE_NAME);

		$criteria->add(CatdetavalPeer::ID, $this->id);

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

		$copyObj->setCatdefavalId($this->catdefaval_id);

		$copyObj->setCatusoespId($this->catusoesp_id);

		$copyObj->setTipo($this->tipo);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new CatdetavalPeer();
		}
		return self::$peer;
	}

	
	public function setCatdefaval($v)
	{


		if ($v === null) {
			$this->setCatdefavalId(NULL);
		} else {
			$this->setCatdefavalId($v->getId());
		}


		$this->aCatdefaval = $v;
	}


	
	public function getCatdefaval($con = null)
	{
		if ($this->aCatdefaval === null && ($this->catdefaval_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatdefavalPeer.php';

			$this->aCatdefaval = CatdefavalPeer::retrieveByPK($this->catdefaval_id, $con);

			
		}
		return $this->aCatdefaval;
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