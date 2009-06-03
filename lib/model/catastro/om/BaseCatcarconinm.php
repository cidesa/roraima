<?php


abstract class BaseCatcarconinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catreginm_id;


	
	protected $catcarcon_id;


	
	protected $cancar;


	
	protected $metare;


	
	protected $id;

	
	protected $aCatreginm;

	
	protected $aCatcarcon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatreginmId()
  {

    return $this->catreginm_id;

  }
  
  public function getCatcarconId()
  {

    return $this->catcarcon_id;

  }
  
  public function getCancar($val=false)
  {

    if($val) return number_format($this->cancar,2,',','.');
    else return $this->cancar;

  }
  
  public function getMetare($val=false)
  {

    if($val) return number_format($this->metare,2,',','.');
    else return $this->metare;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatreginmId($v)
	{

    if ($this->catreginm_id !== $v) {
        $this->catreginm_id = $v;
        $this->modifiedColumns[] = CatcarconinmPeer::CATREGINM_ID;
      }
  
		if ($this->aCatreginm !== null && $this->aCatreginm->getId() !== $v) {
			$this->aCatreginm = null;
		}

	} 
	
	public function setCatcarconId($v)
	{

    if ($this->catcarcon_id !== $v) {
        $this->catcarcon_id = $v;
        $this->modifiedColumns[] = CatcarconinmPeer::CATCARCON_ID;
      }
  
		if ($this->aCatcarcon !== null && $this->aCatcarcon->getId() !== $v) {
			$this->aCatcarcon = null;
		}

	} 
	
	public function setCancar($v)
	{

    if ($this->cancar !== $v) {
        $this->cancar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatcarconinmPeer::CANCAR;
      }
  
	} 
	
	public function setMetare($v)
	{

    if ($this->metare !== $v) {
        $this->metare = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatcarconinmPeer::METARE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatcarconinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catreginm_id = $rs->getInt($startcol + 0);

      $this->catcarcon_id = $rs->getInt($startcol + 1);

      $this->cancar = $rs->getFloat($startcol + 2);

      $this->metare = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catcarconinm object", $e);
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
			$con = Propel::getConnection(CatcarconinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatcarconinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatcarconinmPeer::DATABASE_NAME);
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

			if ($this->aCatcarcon !== null) {
				if ($this->aCatcarcon->isModified()) {
					$affectedRows += $this->aCatcarcon->save($con);
				}
				$this->setCatcarcon($this->aCatcarcon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatcarconinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatcarconinmPeer::doUpdate($this, $con);
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

			if ($this->aCatcarcon !== null) {
				if (!$this->aCatcarcon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatcarcon->getValidationFailures());
				}
			}


			if (($retval = CatcarconinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatcarconinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatreginmId();
				break;
			case 1:
				return $this->getCatcarconId();
				break;
			case 2:
				return $this->getCancar();
				break;
			case 3:
				return $this->getMetare();
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
		$keys = CatcarconinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatreginmId(),
			$keys[1] => $this->getCatcarconId(),
			$keys[2] => $this->getCancar(),
			$keys[3] => $this->getMetare(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatcarconinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatreginmId($value);
				break;
			case 1:
				$this->setCatcarconId($value);
				break;
			case 2:
				$this->setCancar($value);
				break;
			case 3:
				$this->setMetare($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatcarconinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatreginmId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatcarconId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCancar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMetare($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatcarconinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatcarconinmPeer::CATREGINM_ID)) $criteria->add(CatcarconinmPeer::CATREGINM_ID, $this->catreginm_id);
		if ($this->isColumnModified(CatcarconinmPeer::CATCARCON_ID)) $criteria->add(CatcarconinmPeer::CATCARCON_ID, $this->catcarcon_id);
		if ($this->isColumnModified(CatcarconinmPeer::CANCAR)) $criteria->add(CatcarconinmPeer::CANCAR, $this->cancar);
		if ($this->isColumnModified(CatcarconinmPeer::METARE)) $criteria->add(CatcarconinmPeer::METARE, $this->metare);
		if ($this->isColumnModified(CatcarconinmPeer::ID)) $criteria->add(CatcarconinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatcarconinmPeer::DATABASE_NAME);

		$criteria->add(CatcarconinmPeer::ID, $this->id);

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

		$copyObj->setCatcarconId($this->catcarcon_id);

		$copyObj->setCancar($this->cancar);

		$copyObj->setMetare($this->metare);


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
			self::$peer = new CatcarconinmPeer();
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

	
	public function setCatcarcon($v)
	{


		if ($v === null) {
			$this->setCatcarconId(NULL);
		} else {
			$this->setCatcarconId($v->getId());
		}


		$this->aCatcarcon = $v;
	}


	
	public function getCatcarcon($con = null)
	{
		if ($this->aCatcarcon === null && ($this->catcarcon_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatcarconPeer.php';

			$this->aCatcarcon = CatcarconPeer::retrieveByPK($this->catcarcon_id, $con);

			
		}
		return $this->aCatcarcon;
	}

} 