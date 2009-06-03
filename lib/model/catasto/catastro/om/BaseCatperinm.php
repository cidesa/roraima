<?php


abstract class BaseCatperinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catreginm_id;


	
	protected $catregper_id;


	
	protected $conocu;


	
	protected $tipper;


	
	protected $id;

	
	protected $aCatreginm;

	
	protected $aCatregper;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatreginmId()
  {

    return $this->catreginm_id;

  }
  
  public function getCatregperId()
  {

    return $this->catregper_id;

  }
  
  public function getConocu()
  {

    return trim($this->conocu);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatreginmId($v)
	{

    if ($this->catreginm_id !== $v) {
        $this->catreginm_id = $v;
        $this->modifiedColumns[] = CatperinmPeer::CATREGINM_ID;
      }
  
		if ($this->aCatreginm !== null && $this->aCatreginm->getId() !== $v) {
			$this->aCatreginm = null;
		}

	} 
	
	public function setCatregperId($v)
	{

    if ($this->catregper_id !== $v) {
        $this->catregper_id = $v;
        $this->modifiedColumns[] = CatperinmPeer::CATREGPER_ID;
      }
  
		if ($this->aCatregper !== null && $this->aCatregper->getId() !== $v) {
			$this->aCatregper = null;
		}

	} 
	
	public function setConocu($v)
	{

    if ($this->conocu !== $v) {
        $this->conocu = $v;
        $this->modifiedColumns[] = CatperinmPeer::CONOCU;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = CatperinmPeer::TIPPER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatperinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catreginm_id = $rs->getInt($startcol + 0);

      $this->catregper_id = $rs->getInt($startcol + 1);

      $this->conocu = $rs->getString($startcol + 2);

      $this->tipper = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catperinm object", $e);
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
			$con = Propel::getConnection(CatperinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatperinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatperinmPeer::DATABASE_NAME);
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

			if ($this->aCatregper !== null) {
				if ($this->aCatregper->isModified()) {
					$affectedRows += $this->aCatregper->save($con);
				}
				$this->setCatregper($this->aCatregper);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatperinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatperinmPeer::doUpdate($this, $con);
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

			if ($this->aCatregper !== null) {
				if (!$this->aCatregper->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatregper->getValidationFailures());
				}
			}


			if (($retval = CatperinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatperinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatreginmId();
				break;
			case 1:
				return $this->getCatregperId();
				break;
			case 2:
				return $this->getConocu();
				break;
			case 3:
				return $this->getTipper();
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
		$keys = CatperinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatreginmId(),
			$keys[1] => $this->getCatregperId(),
			$keys[2] => $this->getConocu(),
			$keys[3] => $this->getTipper(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatperinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatreginmId($value);
				break;
			case 1:
				$this->setCatregperId($value);
				break;
			case 2:
				$this->setConocu($value);
				break;
			case 3:
				$this->setTipper($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatperinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatreginmId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatregperId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setConocu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipper($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatperinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatperinmPeer::CATREGINM_ID)) $criteria->add(CatperinmPeer::CATREGINM_ID, $this->catreginm_id);
		if ($this->isColumnModified(CatperinmPeer::CATREGPER_ID)) $criteria->add(CatperinmPeer::CATREGPER_ID, $this->catregper_id);
		if ($this->isColumnModified(CatperinmPeer::CONOCU)) $criteria->add(CatperinmPeer::CONOCU, $this->conocu);
		if ($this->isColumnModified(CatperinmPeer::TIPPER)) $criteria->add(CatperinmPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(CatperinmPeer::ID)) $criteria->add(CatperinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatperinmPeer::DATABASE_NAME);

		$criteria->add(CatperinmPeer::ID, $this->id);

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

		$copyObj->setCatregperId($this->catregper_id);

		$copyObj->setConocu($this->conocu);

		$copyObj->setTipper($this->tipper);


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
			self::$peer = new CatperinmPeer();
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

	
	public function setCatregper($v)
	{


		if ($v === null) {
			$this->setCatregperId(NULL);
		} else {
			$this->setCatregperId($v->getId());
		}


		$this->aCatregper = $v;
	}


	
	public function getCatregper($con = null)
	{
		if ($this->aCatregper === null && ($this->catregper_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatregperPeer.php';

			$this->aCatregper = CatregperPeer::retrieveByPK($this->catregper_id, $con);

			
		}
		return $this->aCatregper;
	}

} 