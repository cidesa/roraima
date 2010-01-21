<?php


abstract class BaseCcsoldescuades extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccsoldes_id;


	
	protected $cccuades_id;

	
	protected $aCcsoldes;

	
	protected $aCccuades;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcsoldesId()
  {

    return $this->ccsoldes_id;

  }
  
  public function getCccuadesId()
  {

    return $this->cccuades_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsoldescuadesPeer::ID;
      }
  
	} 
	
	public function setCcsoldesId($v)
	{

    if ($this->ccsoldes_id !== $v) {
        $this->ccsoldes_id = $v;
        $this->modifiedColumns[] = CcsoldescuadesPeer::CCSOLDES_ID;
      }
  
		if ($this->aCcsoldes !== null && $this->aCcsoldes->getId() !== $v) {
			$this->aCcsoldes = null;
		}

	} 
	
	public function setCccuadesId($v)
	{

    if ($this->cccuades_id !== $v) {
        $this->cccuades_id = $v;
        $this->modifiedColumns[] = CcsoldescuadesPeer::CCCUADES_ID;
      }
  
		if ($this->aCccuades !== null && $this->aCccuades->getId() !== $v) {
			$this->aCccuades = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccsoldes_id = $rs->getInt($startcol + 1);

      $this->cccuades_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsoldescuades object", $e);
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
			$con = Propel::getConnection(CcsoldescuadesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsoldescuadesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsoldescuadesPeer::DATABASE_NAME);
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


												
			if ($this->aCcsoldes !== null) {
				if ($this->aCcsoldes->isModified()) {
					$affectedRows += $this->aCcsoldes->save($con);
				}
				$this->setCcsoldes($this->aCcsoldes);
			}

			if ($this->aCccuades !== null) {
				if ($this->aCccuades->isModified()) {
					$affectedRows += $this->aCccuades->save($con);
				}
				$this->setCccuades($this->aCccuades);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsoldescuadesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsoldescuadesPeer::doUpdate($this, $con);
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


												
			if ($this->aCcsoldes !== null) {
				if (!$this->aCcsoldes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsoldes->getValidationFailures());
				}
			}

			if ($this->aCccuades !== null) {
				if (!$this->aCccuades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccuades->getValidationFailures());
				}
			}


			if (($retval = CcsoldescuadesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsoldescuadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcsoldesId();
				break;
			case 2:
				return $this->getCccuadesId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsoldescuadesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcsoldesId(),
			$keys[2] => $this->getCccuadesId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsoldescuadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcsoldesId($value);
				break;
			case 2:
				$this->setCccuadesId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsoldescuadesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcsoldesId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCccuadesId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsoldescuadesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsoldescuadesPeer::ID)) $criteria->add(CcsoldescuadesPeer::ID, $this->id);
		if ($this->isColumnModified(CcsoldescuadesPeer::CCSOLDES_ID)) $criteria->add(CcsoldescuadesPeer::CCSOLDES_ID, $this->ccsoldes_id);
		if ($this->isColumnModified(CcsoldescuadesPeer::CCCUADES_ID)) $criteria->add(CcsoldescuadesPeer::CCCUADES_ID, $this->cccuades_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsoldescuadesPeer::DATABASE_NAME);

		$criteria->add(CcsoldescuadesPeer::ID, $this->id);

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

		$copyObj->setCcsoldesId($this->ccsoldes_id);

		$copyObj->setCccuadesId($this->cccuades_id);


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
			self::$peer = new CcsoldescuadesPeer();
		}
		return self::$peer;
	}

	
	public function setCcsoldes($v)
	{


		if ($v === null) {
			$this->setCcsoldesId(NULL);
		} else {
			$this->setCcsoldesId($v->getId());
		}


		$this->aCcsoldes = $v;
	}


	
	public function getCcsoldes($con = null)
	{
		if ($this->aCcsoldes === null && ($this->ccsoldes_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';

      $c = new Criteria();
      $c->add(CcsoldesPeer::ID,$this->ccsoldes_id);
      
			$this->aCcsoldes = CcsoldesPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsoldes;
	}

	
	public function setCccuades($v)
	{


		if ($v === null) {
			$this->setCccuadesId(NULL);
		} else {
			$this->setCccuadesId($v->getId());
		}


		$this->aCccuades = $v;
	}


	
	public function getCccuades($con = null)
	{
		if ($this->aCccuades === null && ($this->cccuades_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';

      $c = new Criteria();
      $c->add(CccuadesPeer::ID,$this->cccuades_id);
      
			$this->aCccuades = CccuadesPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccuades;
	}

} 