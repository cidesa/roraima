<?php


abstract class BaseFcdefdesc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddes;


	
	protected $nomdes;


	
	protected $codfue;


	
	protected $tipo;


	
	protected $modo;


	
	protected $limita;


	
	protected $auto;


	
	protected $anoact;


	
	protected $id;

	
	protected $collFcrecdespags;

	
	protected $lastFcrecdespagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddes()
  {

    return trim($this->coddes);

  }
  
  public function getNomdes()
  {

    return trim($this->nomdes);

  }
  
  public function getCodfue()
  {

    return trim($this->codfue);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getModo()
  {

    return trim($this->modo);

  }
  
  public function getLimita()
  {

    return trim($this->limita);

  }
  
  public function getAuto()
  {

    return trim($this->auto);

  }
  
  public function getAnoact()
  {

    return trim($this->anoact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddes($v)
	{

    if ($this->coddes !== $v) {
        $this->coddes = $v;
        $this->modifiedColumns[] = FcdefdescPeer::CODDES;
      }
  
	} 
	
	public function setNomdes($v)
	{

    if ($this->nomdes !== $v) {
        $this->nomdes = $v;
        $this->modifiedColumns[] = FcdefdescPeer::NOMDES;
      }
  
	} 
	
	public function setCodfue($v)
	{

    if ($this->codfue !== $v) {
        $this->codfue = $v;
        $this->modifiedColumns[] = FcdefdescPeer::CODFUE;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcdefdescPeer::TIPO;
      }
  
	} 
	
	public function setModo($v)
	{

    if ($this->modo !== $v) {
        $this->modo = $v;
        $this->modifiedColumns[] = FcdefdescPeer::MODO;
      }
  
	} 
	
	public function setLimita($v)
	{

    if ($this->limita !== $v) {
        $this->limita = $v;
        $this->modifiedColumns[] = FcdefdescPeer::LIMITA;
      }
  
	} 
	
	public function setAuto($v)
	{

    if ($this->auto !== $v) {
        $this->auto = $v;
        $this->modifiedColumns[] = FcdefdescPeer::AUTO;
      }
  
	} 
	
	public function setAnoact($v)
	{

    if ($this->anoact !== $v) {
        $this->anoact = $v;
        $this->modifiedColumns[] = FcdefdescPeer::ANOACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdefdescPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddes = $rs->getString($startcol + 0);

      $this->nomdes = $rs->getString($startcol + 1);

      $this->codfue = $rs->getString($startcol + 2);

      $this->tipo = $rs->getString($startcol + 3);

      $this->modo = $rs->getString($startcol + 4);

      $this->limita = $rs->getString($startcol + 5);

      $this->auto = $rs->getString($startcol + 6);

      $this->anoact = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdefdesc object", $e);
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
			$con = Propel::getConnection(FcdefdescPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefdescPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefdescPeer::DATABASE_NAME);
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
					$pk = FcdefdescPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdefdescPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcrecdespags !== null) {
				foreach($this->collFcrecdespags as $referrerFK) {
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


			if (($retval = FcdefdescPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcrecdespags !== null) {
					foreach($this->collFcrecdespags as $referrerFK) {
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
		$pos = FcdefdescPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddes();
				break;
			case 1:
				return $this->getNomdes();
				break;
			case 2:
				return $this->getCodfue();
				break;
			case 3:
				return $this->getTipo();
				break;
			case 4:
				return $this->getModo();
				break;
			case 5:
				return $this->getLimita();
				break;
			case 6:
				return $this->getAuto();
				break;
			case 7:
				return $this->getAnoact();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefdescPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddes(),
			$keys[1] => $this->getNomdes(),
			$keys[2] => $this->getCodfue(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getModo(),
			$keys[5] => $this->getLimita(),
			$keys[6] => $this->getAuto(),
			$keys[7] => $this->getAnoact(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefdescPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddes($value);
				break;
			case 1:
				$this->setNomdes($value);
				break;
			case 2:
				$this->setCodfue($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setModo($value);
				break;
			case 5:
				$this->setLimita($value);
				break;
			case 6:
				$this->setAuto($value);
				break;
			case 7:
				$this->setAnoact($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefdescPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodfue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setModo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLimita($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAuto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAnoact($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefdescPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefdescPeer::CODDES)) $criteria->add(FcdefdescPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(FcdefdescPeer::NOMDES)) $criteria->add(FcdefdescPeer::NOMDES, $this->nomdes);
		if ($this->isColumnModified(FcdefdescPeer::CODFUE)) $criteria->add(FcdefdescPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcdefdescPeer::TIPO)) $criteria->add(FcdefdescPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcdefdescPeer::MODO)) $criteria->add(FcdefdescPeer::MODO, $this->modo);
		if ($this->isColumnModified(FcdefdescPeer::LIMITA)) $criteria->add(FcdefdescPeer::LIMITA, $this->limita);
		if ($this->isColumnModified(FcdefdescPeer::AUTO)) $criteria->add(FcdefdescPeer::AUTO, $this->auto);
		if ($this->isColumnModified(FcdefdescPeer::ANOACT)) $criteria->add(FcdefdescPeer::ANOACT, $this->anoact);
		if ($this->isColumnModified(FcdefdescPeer::ID)) $criteria->add(FcdefdescPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefdescPeer::DATABASE_NAME);

		$criteria->add(FcdefdescPeer::ID, $this->id);

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

		$copyObj->setCoddes($this->coddes);

		$copyObj->setNomdes($this->nomdes);

		$copyObj->setCodfue($this->codfue);

		$copyObj->setTipo($this->tipo);

		$copyObj->setModo($this->modo);

		$copyObj->setLimita($this->limita);

		$copyObj->setAuto($this->auto);

		$copyObj->setAnoact($this->anoact);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcrecdespags() as $relObj) {
				$copyObj->addFcrecdespag($relObj->copy($deepCopy));
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
			self::$peer = new FcdefdescPeer();
		}
		return self::$peer;
	}

	
	public function initFcrecdespags()
	{
		if ($this->collFcrecdespags === null) {
			$this->collFcrecdespags = array();
		}
	}

	
	public function getFcrecdespags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcrecdespagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcrecdespags === null) {
			if ($this->isNew()) {
			   $this->collFcrecdespags = array();
			} else {

				$criteria->add(FcrecdespagPeer::CODREDE, $this->getCoddes());

				FcrecdespagPeer::addSelectColumns($criteria);
				$this->collFcrecdespags = FcrecdespagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcrecdespagPeer::CODREDE, $this->getCoddes());

				FcrecdespagPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcrecdespagCriteria) || !$this->lastFcrecdespagCriteria->equals($criteria)) {
					$this->collFcrecdespags = FcrecdespagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcrecdespagCriteria = $criteria;
		return $this->collFcrecdespags;
	}

	
	public function countFcrecdespags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcrecdespagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcrecdespagPeer::CODREDE, $this->getCoddes());

		return FcrecdespagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcrecdespag(Fcrecdespag $l)
	{
		$this->collFcrecdespags[] = $l;
		$l->setFcdefdesc($this);
	}

} 