<?php


abstract class BaseOpsolpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refsol;


	
	protected $fecsol;


	
	protected $refcom;


	
	protected $dessol;


	
	protected $monsol;


	
	protected $stasol;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $numsolcre;


	
	protected $numcre;


	
	protected $id;

	
	protected $aCpcompro;

	
	protected $collOpdetsolpags;

	
	protected $lastOpdetsolpagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefsol()
  {

    return trim($this->refsol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

  }
  
  public function getStasol()
  {

    return trim($this->stasol);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getNumsolcre()
  {

    return trim($this->numsolcre);

  }
  
  public function getNumcre()
  {

    return trim($this->numcre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefsol($v)
	{

    if ($this->refsol !== $v) {
        $this->refsol = $v;
        $this->modifiedColumns[] = OpsolpagPeer::REFSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = OpsolpagPeer::FECSOL;
    }

	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = OpsolpagPeer::REFCOM;
      }
  
		if ($this->aCpcompro !== null && $this->aCpcompro->getRefcom() !== $v) {
			$this->aCpcompro = null;
		}

	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = OpsolpagPeer::DESSOL;
      }
  
	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpsolpagPeer::MONSOL;
      }
  
	} 
	
	public function setStasol($v)
	{

    if ($this->stasol !== $v) {
        $this->stasol = $v;
        $this->modifiedColumns[] = OpsolpagPeer::STASOL;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = OpsolpagPeer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = OpsolpagPeer::NOMBEN;
      }
  
	} 
	
	public function setNumsolcre($v)
	{

    if ($this->numsolcre !== $v) {
        $this->numsolcre = $v;
        $this->modifiedColumns[] = OpsolpagPeer::NUMSOLCRE;
      }
  
	} 
	
	public function setNumcre($v)
	{

    if ($this->numcre !== $v) {
        $this->numcre = $v;
        $this->modifiedColumns[] = OpsolpagPeer::NUMCRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpsolpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refsol = $rs->getString($startcol + 0);

      $this->fecsol = $rs->getDate($startcol + 1, null);

      $this->refcom = $rs->getString($startcol + 2);

      $this->dessol = $rs->getString($startcol + 3);

      $this->monsol = $rs->getFloat($startcol + 4);

      $this->stasol = $rs->getString($startcol + 5);

      $this->cedrif = $rs->getString($startcol + 6);

      $this->nomben = $rs->getString($startcol + 7);

      $this->numsolcre = $rs->getString($startcol + 8);

      $this->numcre = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opsolpag object", $e);
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
			$con = Propel::getConnection(OpsolpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpsolpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpsolpagPeer::DATABASE_NAME);
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


												
			if ($this->aCpcompro !== null) {
				if ($this->aCpcompro->isModified()) {
					$affectedRows += $this->aCpcompro->save($con);
				}
				$this->setCpcompro($this->aCpcompro);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OpsolpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpsolpagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOpdetsolpags !== null) {
				foreach($this->collOpdetsolpags as $referrerFK) {
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


												
			if ($this->aCpcompro !== null) {
				if (!$this->aCpcompro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpcompro->getValidationFailures());
				}
			}


			if (($retval = OpsolpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOpdetsolpags !== null) {
					foreach($this->collOpdetsolpags as $referrerFK) {
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
		$pos = OpsolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefsol();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getRefcom();
				break;
			case 3:
				return $this->getDessol();
				break;
			case 4:
				return $this->getMonsol();
				break;
			case 5:
				return $this->getStasol();
				break;
			case 6:
				return $this->getCedrif();
				break;
			case 7:
				return $this->getNomben();
				break;
			case 8:
				return $this->getNumsolcre();
				break;
			case 9:
				return $this->getNumcre();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpsolpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getRefcom(),
			$keys[3] => $this->getDessol(),
			$keys[4] => $this->getMonsol(),
			$keys[5] => $this->getStasol(),
			$keys[6] => $this->getCedrif(),
			$keys[7] => $this->getNomben(),
			$keys[8] => $this->getNumsolcre(),
			$keys[9] => $this->getNumcre(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpsolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefsol($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setRefcom($value);
				break;
			case 3:
				$this->setDessol($value);
				break;
			case 4:
				$this->setMonsol($value);
				break;
			case 5:
				$this->setStasol($value);
				break;
			case 6:
				$this->setCedrif($value);
				break;
			case 7:
				$this->setNomben($value);
				break;
			case 8:
				$this->setNumsolcre($value);
				break;
			case 9:
				$this->setNumcre($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpsolpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDessol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonsol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStasol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCedrif($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomben($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumsolcre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumcre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpsolpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpsolpagPeer::REFSOL)) $criteria->add(OpsolpagPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(OpsolpagPeer::FECSOL)) $criteria->add(OpsolpagPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(OpsolpagPeer::REFCOM)) $criteria->add(OpsolpagPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OpsolpagPeer::DESSOL)) $criteria->add(OpsolpagPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(OpsolpagPeer::MONSOL)) $criteria->add(OpsolpagPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(OpsolpagPeer::STASOL)) $criteria->add(OpsolpagPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(OpsolpagPeer::CEDRIF)) $criteria->add(OpsolpagPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(OpsolpagPeer::NOMBEN)) $criteria->add(OpsolpagPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(OpsolpagPeer::NUMSOLCRE)) $criteria->add(OpsolpagPeer::NUMSOLCRE, $this->numsolcre);
		if ($this->isColumnModified(OpsolpagPeer::NUMCRE)) $criteria->add(OpsolpagPeer::NUMCRE, $this->numcre);
		if ($this->isColumnModified(OpsolpagPeer::ID)) $criteria->add(OpsolpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpsolpagPeer::DATABASE_NAME);

		$criteria->add(OpsolpagPeer::ID, $this->id);

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

		$copyObj->setRefsol($this->refsol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setDessol($this->dessol);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setStasol($this->stasol);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setNumsolcre($this->numsolcre);

		$copyObj->setNumcre($this->numcre);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOpdetsolpags() as $relObj) {
				$copyObj->addOpdetsolpag($relObj->copy($deepCopy));
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
			self::$peer = new OpsolpagPeer();
		}
		return self::$peer;
	}

	
	public function setCpcompro($v)
	{


		if ($v === null) {
			$this->setRefcom(NULL);
		} else {
			$this->setRefcom($v->getRefcom());
		}


		$this->aCpcompro = $v;
	}


	
	public function getCpcompro($con = null)
	{
		if ($this->aCpcompro === null && (($this->refcom !== "" && $this->refcom !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';

      $c = new Criteria();
      $c->add(CpcomproPeer::REFCOM,$this->refcom);
      
			$this->aCpcompro = CpcomproPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpcompro;
	}

	
	public function initOpdetsolpags()
	{
		if ($this->collOpdetsolpags === null) {
			$this->collOpdetsolpags = array();
		}
	}

	
	public function getOpdetsolpags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpdetsolpags === null) {
			if ($this->isNew()) {
			   $this->collOpdetsolpags = array();
			} else {

				$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

				OpdetsolpagPeer::addSelectColumns($criteria);
				$this->collOpdetsolpags = OpdetsolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

				OpdetsolpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastOpdetsolpagCriteria) || !$this->lastOpdetsolpagCriteria->equals($criteria)) {
					$this->collOpdetsolpags = OpdetsolpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOpdetsolpagCriteria = $criteria;
		return $this->collOpdetsolpags;
	}

	
	public function countOpdetsolpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

		return OpdetsolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOpdetsolpag(Opdetsolpag $l)
	{
		$this->collOpdetsolpags[] = $l;
		$l->setOpsolpag($this);
	}


	
	public function getOpdetsolpagsJoinOpordpag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpdetsolpags === null) {
			if ($this->isNew()) {
				$this->collOpdetsolpags = array();
			} else {

				$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

				$this->collOpdetsolpags = OpdetsolpagPeer::doSelectJoinOpordpag($criteria, $con);
			}
		} else {
									
			$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

			if (!isset($this->lastOpdetsolpagCriteria) || !$this->lastOpdetsolpagCriteria->equals($criteria)) {
				$this->collOpdetsolpags = OpdetsolpagPeer::doSelectJoinOpordpag($criteria, $con);
			}
		}
		$this->lastOpdetsolpagCriteria = $criteria;

		return $this->collOpdetsolpags;
	}


	
	public function getOpdetsolpagsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpdetsolpags === null) {
			if ($this->isNew()) {
				$this->collOpdetsolpags = array();
			} else {

				$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

				$this->collOpdetsolpags = OpdetsolpagPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(OpdetsolpagPeer::REFSOL, $this->getRefsol());

			if (!isset($this->lastOpdetsolpagCriteria) || !$this->lastOpdetsolpagCriteria->equals($criteria)) {
				$this->collOpdetsolpags = OpdetsolpagPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastOpdetsolpagCriteria = $criteria;

		return $this->collOpdetsolpags;
	}

} 