<?php


abstract class BaseInsancion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsan;


	
	protected $dessan;


	
	protected $id;

	
	protected $collInmultas;

	
	protected $lastInmultaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsan()
  {

    return trim($this->codsan);

  }
  
  public function getDessan()
  {

    return trim($this->dessan);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodsan($v)
	{

    if ($this->codsan !== $v) {
        $this->codsan = $v;
        $this->modifiedColumns[] = InsancionPeer::CODSAN;
      }
  
	} 
	
	public function setDessan($v)
	{

    if ($this->dessan !== $v) {
        $this->dessan = $v;
        $this->modifiedColumns[] = InsancionPeer::DESSAN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InsancionPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsan = $rs->getString($startcol + 0);

      $this->dessan = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Insancion object", $e);
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
			$con = Propel::getConnection(InsancionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InsancionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InsancionPeer::DATABASE_NAME);
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
					$pk = InsancionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InsancionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInmultas !== null) {
				foreach($this->collInmultas as $referrerFK) {
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


			if (($retval = InsancionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInmultas !== null) {
					foreach($this->collInmultas as $referrerFK) {
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
		$pos = InsancionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsan();
				break;
			case 1:
				return $this->getDessan();
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
		$keys = InsancionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsan(),
			$keys[1] => $this->getDessan(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InsancionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsan($value);
				break;
			case 1:
				$this->setDessan($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InsancionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsan($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessan($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InsancionPeer::DATABASE_NAME);

		if ($this->isColumnModified(InsancionPeer::CODSAN)) $criteria->add(InsancionPeer::CODSAN, $this->codsan);
		if ($this->isColumnModified(InsancionPeer::DESSAN)) $criteria->add(InsancionPeer::DESSAN, $this->dessan);
		if ($this->isColumnModified(InsancionPeer::ID)) $criteria->add(InsancionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InsancionPeer::DATABASE_NAME);

		$criteria->add(InsancionPeer::ID, $this->id);

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

		$copyObj->setCodsan($this->codsan);

		$copyObj->setDessan($this->dessan);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInmultas() as $relObj) {
				$copyObj->addInmulta($relObj->copy($deepCopy));
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
			self::$peer = new InsancionPeer();
		}
		return self::$peer;
	}

	
	public function initInmultas()
	{
		if ($this->collInmultas === null) {
			$this->collInmultas = array();
		}
	}

	
	public function getInmultas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInmultaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInmultas === null) {
			if ($this->isNew()) {
			   $this->collInmultas = array();
			} else {

				$criteria->add(InmultaPeer::INSANCION_ID, $this->getId());

				InmultaPeer::addSelectColumns($criteria);
				$this->collInmultas = InmultaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InmultaPeer::INSANCION_ID, $this->getId());

				InmultaPeer::addSelectColumns($criteria);
				if (!isset($this->lastInmultaCriteria) || !$this->lastInmultaCriteria->equals($criteria)) {
					$this->collInmultas = InmultaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInmultaCriteria = $criteria;
		return $this->collInmultas;
	}

	
	public function countInmultas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInmultaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InmultaPeer::INSANCION_ID, $this->getId());

		return InmultaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInmulta(Inmulta $l)
	{
		$this->collInmultas[] = $l;
		$l->setInsancion($this);
	}

} 