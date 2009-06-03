<?php


abstract class BaseCatcarcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipo;


	
	protected $nomcarcon;


	
	protected $id;

	
	protected $collCatcarconinms;

	
	protected $lastCatcarconinmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getNomcarcon()
  {

    return trim($this->nomcarcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CatcarconPeer::TIPO;
      }
  
	} 
	
	public function setNomcarcon($v)
	{

    if ($this->nomcarcon !== $v) {
        $this->nomcarcon = $v;
        $this->modifiedColumns[] = CatcarconPeer::NOMCARCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatcarconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipo = $rs->getString($startcol + 0);

      $this->nomcarcon = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catcarcon object", $e);
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
			$con = Propel::getConnection(CatcarconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatcarconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatcarconPeer::DATABASE_NAME);
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
					$pk = CatcarconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatcarconPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatcarconinms !== null) {
				foreach($this->collCatcarconinms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = CatcarconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatcarconinms !== null) {
					foreach($this->collCatcarconinms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatcarconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipo();
				break;
			case 1:
				return $this->getNomcarcon();
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
		$keys = CatcarconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipo(),
			$keys[1] => $this->getNomcarcon(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatcarconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipo($value);
				break;
			case 1:
				$this->setNomcarcon($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatcarconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcarcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatcarconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatcarconPeer::TIPO)) $criteria->add(CatcarconPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CatcarconPeer::NOMCARCON)) $criteria->add(CatcarconPeer::NOMCARCON, $this->nomcarcon);
		if ($this->isColumnModified(CatcarconPeer::ID)) $criteria->add(CatcarconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatcarconPeer::DATABASE_NAME);

		$criteria->add(CatcarconPeer::ID, $this->id);

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

		$copyObj->setTipo($this->tipo);

		$copyObj->setNomcarcon($this->nomcarcon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatcarconinms() as $relObj) {
				$copyObj->addCatcarconinm($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CatcarconPeer();
		}
		return self::$peer;
	}

	
	public function initCatcarconinms()
	{
		if ($this->collCatcarconinms === null) {
			$this->collCatcarconinms = array();
		}
	}

	
	public function getCatcarconinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarconinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarconinms === null) {
			if ($this->isNew()) {
			   $this->collCatcarconinms = array();
			} else {

				$criteria->add(CatcarconinmPeer::CATCARCON_ID, $this->getId());

				CatcarconinmPeer::addSelectColumns($criteria);
				$this->collCatcarconinms = CatcarconinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatcarconinmPeer::CATCARCON_ID, $this->getId());

				CatcarconinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatcarconinmCriteria) || !$this->lastCatcarconinmCriteria->equals($criteria)) {
					$this->collCatcarconinms = CatcarconinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatcarconinmCriteria = $criteria;
		return $this->collCatcarconinms;
	}

	
	public function countCatcarconinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarconinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatcarconinmPeer::CATCARCON_ID, $this->getId());

		return CatcarconinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatcarconinm(Catcarconinm $l)
	{
		$this->collCatcarconinms[] = $l;
		$l->setCatcarcon($this);
	}


	
	public function getCatcarconinmsJoinCatreginm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarconinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarconinms === null) {
			if ($this->isNew()) {
				$this->collCatcarconinms = array();
			} else {

				$criteria->add(CatcarconinmPeer::CATCARCON_ID, $this->getId());

				$this->collCatcarconinms = CatcarconinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatcarconinmPeer::CATCARCON_ID, $this->getId());

			if (!isset($this->lastCatcarconinmCriteria) || !$this->lastCatcarconinmCriteria->equals($criteria)) {
				$this->collCatcarconinms = CatcarconinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		}
		$this->lastCatcarconinmCriteria = $criteria;

		return $this->collCatcarconinms;
	}

} 