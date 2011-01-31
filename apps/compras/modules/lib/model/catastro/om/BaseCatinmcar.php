<?php


abstract class BaseCatinmcar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catcarinm_id;


	
	protected $cancar;


	
	protected $metare;


	
	protected $id;

	
	protected $aCatcarinm;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatcarinmId()
  {

    return $this->catcarinm_id;

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
	
	public function setCatcarinmId($v)
	{

    if ($this->catcarinm_id !== $v) {
        $this->catcarinm_id = $v;
        $this->modifiedColumns[] = CatinmcarPeer::CATCARINM_ID;
      }
  
		if ($this->aCatcarinm !== null && $this->aCatcarinm->getId() !== $v) {
			$this->aCatcarinm = null;
		}

	} 
	
	public function setCancar($v)
	{

    if ($this->cancar !== $v) {
        $this->cancar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatinmcarPeer::CANCAR;
      }
  
	} 
	
	public function setMetare($v)
	{

    if ($this->metare !== $v) {
        $this->metare = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatinmcarPeer::METARE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatinmcarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catcarinm_id = $rs->getInt($startcol + 0);

      $this->cancar = $rs->getFloat($startcol + 1);

      $this->metare = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catinmcar object", $e);
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
			$con = Propel::getConnection(CatinmcarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatinmcarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatinmcarPeer::DATABASE_NAME);
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


												
			if ($this->aCatcarinm !== null) {
				if ($this->aCatcarinm->isModified()) {
					$affectedRows += $this->aCatcarinm->save($con);
				}
				$this->setCatcarinm($this->aCatcarinm);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatinmcarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatinmcarPeer::doUpdate($this, $con);
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


												
			if ($this->aCatcarinm !== null) {
				if (!$this->aCatcarinm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatcarinm->getValidationFailures());
				}
			}


			if (($retval = CatinmcarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatinmcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatcarinmId();
				break;
			case 1:
				return $this->getCancar();
				break;
			case 2:
				return $this->getMetare();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatinmcarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatcarinmId(),
			$keys[1] => $this->getCancar(),
			$keys[2] => $this->getMetare(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatinmcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatcarinmId($value);
				break;
			case 1:
				$this->setCancar($value);
				break;
			case 2:
				$this->setMetare($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatinmcarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatcarinmId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCancar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMetare($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatinmcarPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatinmcarPeer::CATCARINM_ID)) $criteria->add(CatinmcarPeer::CATCARINM_ID, $this->catcarinm_id);
		if ($this->isColumnModified(CatinmcarPeer::CANCAR)) $criteria->add(CatinmcarPeer::CANCAR, $this->cancar);
		if ($this->isColumnModified(CatinmcarPeer::METARE)) $criteria->add(CatinmcarPeer::METARE, $this->metare);
		if ($this->isColumnModified(CatinmcarPeer::ID)) $criteria->add(CatinmcarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatinmcarPeer::DATABASE_NAME);

		$criteria->add(CatinmcarPeer::ID, $this->id);

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

		$copyObj->setCatcarinmId($this->catcarinm_id);

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
			self::$peer = new CatinmcarPeer();
		}
		return self::$peer;
	}

	
	public function setCatcarinm($v)
	{


		if ($v === null) {
			$this->setCatcarinmId(NULL);
		} else {
			$this->setCatcarinmId($v->getId());
		}


		$this->aCatcarinm = $v;
	}


	
	public function getCatcarinm($con = null)
	{
		if ($this->aCatcarinm === null && ($this->catcarinm_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatcarinmPeer.php';

			$this->aCatcarinm = CatcarinmPeer::retrieveByPK($this->catcarinm_id, $con);

			
		}
		return $this->aCatcarinm;
	}

} 