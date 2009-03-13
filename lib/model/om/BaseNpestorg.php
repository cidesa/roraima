<?php


abstract class BaseNpestorg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codniv;


	
	protected $desniv;


	
	protected $telext;


	
	protected $id;

	
	protected $collViadettipsers;

	
	protected $lastViadettipserCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getDesniv()
  {

    return trim($this->desniv);

  }
  
  public function getTelext()
  {

    return trim($this->telext);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NpestorgPeer::CODNIV;
      }
  
	} 
	
	public function setDesniv($v)
	{

    if ($this->desniv !== $v) {
        $this->desniv = $v;
        $this->modifiedColumns[] = NpestorgPeer::DESNIV;
      }
  
	} 
	
	public function setTelext($v)
	{

    if ($this->telext !== $v) {
        $this->telext = $v;
        $this->modifiedColumns[] = NpestorgPeer::TELEXT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpestorgPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codniv = $rs->getString($startcol + 0);

      $this->desniv = $rs->getString($startcol + 1);

      $this->telext = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npestorg object", $e);
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
			$con = Propel::getConnection(NpestorgPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpestorgPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpestorgPeer::DATABASE_NAME);
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
					$pk = NpestorgPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpestorgPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViadettipsers !== null) {
				foreach($this->collViadettipsers as $referrerFK) {
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


			if (($retval = NpestorgPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViadettipsers !== null) {
					foreach($this->collViadettipsers as $referrerFK) {
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
		$pos = NpestorgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodniv();
				break;
			case 1:
				return $this->getDesniv();
				break;
			case 2:
				return $this->getTelext();
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
		$keys = NpestorgPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodniv(),
			$keys[1] => $this->getDesniv(),
			$keys[2] => $this->getTelext(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpestorgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodniv($value);
				break;
			case 1:
				$this->setDesniv($value);
				break;
			case 2:
				$this->setTelext($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpestorgPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodniv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelext($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpestorgPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpestorgPeer::CODNIV)) $criteria->add(NpestorgPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpestorgPeer::DESNIV)) $criteria->add(NpestorgPeer::DESNIV, $this->desniv);
		if ($this->isColumnModified(NpestorgPeer::TELEXT)) $criteria->add(NpestorgPeer::TELEXT, $this->telext);
		if ($this->isColumnModified(NpestorgPeer::ID)) $criteria->add(NpestorgPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpestorgPeer::DATABASE_NAME);

		$criteria->add(NpestorgPeer::ID, $this->id);

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

		$copyObj->setCodniv($this->codniv);

		$copyObj->setDesniv($this->desniv);

		$copyObj->setTelext($this->telext);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViadettipsers() as $relObj) {
				$copyObj->addViadettipser($relObj->copy($deepCopy));
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
			self::$peer = new NpestorgPeer();
		}
		return self::$peer;
	}

	
	public function initViadettipsers()
	{
		if ($this->collViadettipsers === null) {
			$this->collViadettipsers = array();
		}
	}

	
	public function getViadettipsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
			   $this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

				ViadettipserPeer::addSelectColumns($criteria);
				$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

				ViadettipserPeer::addSelectColumns($criteria);
				if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
					$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViadettipserCriteria = $criteria;
		return $this->collViadettipsers;
	}

	
	public function countViadettipsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

		return ViadettipserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViadettipser(Viadettipser $l)
	{
		$this->collViadettipsers[] = $l;
		$l->setNpestorg($this);
	}


	
	public function getViadettipsersJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
				$this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}


	
	public function getViadettipsersJoinViaregtipser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
				$this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::NPESTORG_CODNIV, $this->getCodniv());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}

} 