<?php


abstract class BaseCcsoldes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numsoldes;


	
	protected $fecsoldes;


	
	protected $codusuact;


	
	protected $estatu;


	
	protected $observacion;


	
	protected $para;


	
	protected $de;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $cctipdes_id;


	
	protected $cccredit_id;

	
	protected $aCctipdes;

	
	protected $aCccredit;

	
	protected $collCcsoldescuadess;

	
	protected $lastCcsoldescuadesCriteria = null;

	
	protected $collCcsolliqs;

	
	protected $lastCcsolliqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumsoldes()
  {

    return $this->numsoldes;

  }
  
  public function getFecsoldes($format = 'Y-m-d')
  {

    if ($this->fecsoldes === null || $this->fecsoldes === '') {
      return null;
    } elseif (!is_int($this->fecsoldes)) {
            $ts = adodb_strtotime($this->fecsoldes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsoldes] as date/time value: " . var_export($this->fecsoldes, true));
      }
    } else {
      $ts = $this->fecsoldes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodusuact()
  {

    return $this->codusuact;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getObservacion()
  {

    return trim($this->observacion);

  }
  
  public function getPara()
  {

    return trim($this->para);

  }
  
  public function getDe()
  {

    return trim($this->de);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getCctipdesId()
  {

    return $this->cctipdes_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsoldesPeer::ID;
      }
  
	} 
	
	public function setNumsoldes($v)
	{

    if ($this->numsoldes !== $v) {
        $this->numsoldes = $v;
        $this->modifiedColumns[] = CcsoldesPeer::NUMSOLDES;
      }
  
	} 
	
	public function setFecsoldes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsoldes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsoldes !== $ts) {
      $this->fecsoldes = $ts;
      $this->modifiedColumns[] = CcsoldesPeer::FECSOLDES;
    }

	} 
	
	public function setCodusuact($v)
	{

    if ($this->codusuact !== $v) {
        $this->codusuact = $v;
        $this->modifiedColumns[] = CcsoldesPeer::CODUSUACT;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcsoldesPeer::ESTATU;
      }
  
	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = CcsoldesPeer::OBSERVACION;
      }
  
	} 
	
	public function setPara($v)
	{

    if ($this->para !== $v) {
        $this->para = $v;
        $this->modifiedColumns[] = CcsoldesPeer::PARA;
      }
  
	} 
	
	public function setDe($v)
	{

    if ($this->de !== $v) {
        $this->de = $v;
        $this->modifiedColumns[] = CcsoldesPeer::DE;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CcsoldesPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CcsoldesPeer::DESANU;
      }
  
	} 
	
	public function setCctipdesId($v)
	{

    if ($this->cctipdes_id !== $v) {
        $this->cctipdes_id = $v;
        $this->modifiedColumns[] = CcsoldesPeer::CCTIPDES_ID;
      }
  
		if ($this->aCctipdes !== null && $this->aCctipdes->getId() !== $v) {
			$this->aCctipdes = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcsoldesPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numsoldes = $rs->getInt($startcol + 1);

      $this->fecsoldes = $rs->getDate($startcol + 2, null);

      $this->codusuact = $rs->getInt($startcol + 3);

      $this->estatu = $rs->getString($startcol + 4);

      $this->observacion = $rs->getString($startcol + 5);

      $this->para = $rs->getString($startcol + 6);

      $this->de = $rs->getString($startcol + 7);

      $this->fecanu = $rs->getDate($startcol + 8, null);

      $this->desanu = $rs->getString($startcol + 9);

      $this->cctipdes_id = $rs->getInt($startcol + 10);

      $this->cccredit_id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsoldes object", $e);
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
			$con = Propel::getConnection(CcsoldesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsoldesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsoldesPeer::DATABASE_NAME);
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


												
			if ($this->aCctipdes !== null) {
				if ($this->aCctipdes->isModified()) {
					$affectedRows += $this->aCctipdes->save($con);
				}
				$this->setCctipdes($this->aCctipdes);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsoldesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsoldesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcsoldescuadess !== null) {
				foreach($this->collCcsoldescuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolliqs !== null) {
				foreach($this->collCcsolliqs as $referrerFK) {
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


												
			if ($this->aCctipdes !== null) {
				if (!$this->aCctipdes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipdes->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}


			if (($retval = CcsoldesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcsoldescuadess !== null) {
					foreach($this->collCcsoldescuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolliqs !== null) {
					foreach($this->collCcsolliqs as $referrerFK) {
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
		$pos = CcsoldesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumsoldes();
				break;
			case 2:
				return $this->getFecsoldes();
				break;
			case 3:
				return $this->getCodusuact();
				break;
			case 4:
				return $this->getEstatu();
				break;
			case 5:
				return $this->getObservacion();
				break;
			case 6:
				return $this->getPara();
				break;
			case 7:
				return $this->getDe();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getDesanu();
				break;
			case 10:
				return $this->getCctipdesId();
				break;
			case 11:
				return $this->getCccreditId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsoldesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumsoldes(),
			$keys[2] => $this->getFecsoldes(),
			$keys[3] => $this->getCodusuact(),
			$keys[4] => $this->getEstatu(),
			$keys[5] => $this->getObservacion(),
			$keys[6] => $this->getPara(),
			$keys[7] => $this->getDe(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getDesanu(),
			$keys[10] => $this->getCctipdesId(),
			$keys[11] => $this->getCccreditId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsoldesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumsoldes($value);
				break;
			case 2:
				$this->setFecsoldes($value);
				break;
			case 3:
				$this->setCodusuact($value);
				break;
			case 4:
				$this->setEstatu($value);
				break;
			case 5:
				$this->setObservacion($value);
				break;
			case 6:
				$this->setPara($value);
				break;
			case 7:
				$this->setDe($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setDesanu($value);
				break;
			case 10:
				$this->setCctipdesId($value);
				break;
			case 11:
				$this->setCccreditId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsoldesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsoldes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecsoldes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodusuact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstatu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObservacion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPara($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDe($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDesanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCctipdesId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCccreditId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsoldesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsoldesPeer::ID)) $criteria->add(CcsoldesPeer::ID, $this->id);
		if ($this->isColumnModified(CcsoldesPeer::NUMSOLDES)) $criteria->add(CcsoldesPeer::NUMSOLDES, $this->numsoldes);
		if ($this->isColumnModified(CcsoldesPeer::FECSOLDES)) $criteria->add(CcsoldesPeer::FECSOLDES, $this->fecsoldes);
		if ($this->isColumnModified(CcsoldesPeer::CODUSUACT)) $criteria->add(CcsoldesPeer::CODUSUACT, $this->codusuact);
		if ($this->isColumnModified(CcsoldesPeer::ESTATU)) $criteria->add(CcsoldesPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcsoldesPeer::OBSERVACION)) $criteria->add(CcsoldesPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(CcsoldesPeer::PARA)) $criteria->add(CcsoldesPeer::PARA, $this->para);
		if ($this->isColumnModified(CcsoldesPeer::DE)) $criteria->add(CcsoldesPeer::DE, $this->de);
		if ($this->isColumnModified(CcsoldesPeer::FECANU)) $criteria->add(CcsoldesPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CcsoldesPeer::DESANU)) $criteria->add(CcsoldesPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CcsoldesPeer::CCTIPDES_ID)) $criteria->add(CcsoldesPeer::CCTIPDES_ID, $this->cctipdes_id);
		if ($this->isColumnModified(CcsoldesPeer::CCCREDIT_ID)) $criteria->add(CcsoldesPeer::CCCREDIT_ID, $this->cccredit_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsoldesPeer::DATABASE_NAME);

		$criteria->add(CcsoldesPeer::ID, $this->id);

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

		$copyObj->setNumsoldes($this->numsoldes);

		$copyObj->setFecsoldes($this->fecsoldes);

		$copyObj->setCodusuact($this->codusuact);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setPara($this->para);

		$copyObj->setDe($this->de);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setCctipdesId($this->cctipdes_id);

		$copyObj->setCccreditId($this->cccredit_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcsoldescuadess() as $relObj) {
				$copyObj->addCcsoldescuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolliqs() as $relObj) {
				$copyObj->addCcsolliq($relObj->copy($deepCopy));
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
			self::$peer = new CcsoldesPeer();
		}
		return self::$peer;
	}

	
	public function setCctipdes($v)
	{


		if ($v === null) {
			$this->setCctipdesId(NULL);
		} else {
			$this->setCctipdesId($v->getId());
		}


		$this->aCctipdes = $v;
	}


	
	public function getCctipdes($con = null)
	{
		if ($this->aCctipdes === null && ($this->cctipdes_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipdesPeer.php';

      $c = new Criteria();
      $c->add(CctipdesPeer::ID,$this->cctipdes_id);
      
			$this->aCctipdes = CctipdesPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipdes;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function initCcsoldescuadess()
	{
		if ($this->collCcsoldescuadess === null) {
			$this->collCcsoldescuadess = array();
		}
	}

	
	public function getCcsoldescuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldescuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldescuadess === null) {
			if ($this->isNew()) {
			   $this->collCcsoldescuadess = array();
			} else {

				$criteria->add(CcsoldescuadesPeer::CCSOLDES_ID, $this->getId());

				CcsoldescuadesPeer::addSelectColumns($criteria);
				$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoldescuadesPeer::CCSOLDES_ID, $this->getId());

				CcsoldescuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoldescuadesCriteria) || !$this->lastCcsoldescuadesCriteria->equals($criteria)) {
					$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoldescuadesCriteria = $criteria;
		return $this->collCcsoldescuadess;
	}

	
	public function countCcsoldescuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldescuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoldescuadesPeer::CCSOLDES_ID, $this->getId());

		return CcsoldescuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsoldescuades(Ccsoldescuades $l)
	{
		$this->collCcsoldescuadess[] = $l;
		$l->setCcsoldes($this);
	}


	
	public function getCcsoldescuadessJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldescuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldescuadess === null) {
			if ($this->isNew()) {
				$this->collCcsoldescuadess = array();
			} else {

				$criteria->add(CcsoldescuadesPeer::CCSOLDES_ID, $this->getId());

				$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoldescuadesPeer::CCSOLDES_ID, $this->getId());

			if (!isset($this->lastCcsoldescuadesCriteria) || !$this->lastCcsoldescuadesCriteria->equals($criteria)) {
				$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcsoldescuadesCriteria = $criteria;

		return $this->collCcsoldescuadess;
	}

	
	public function initCcsolliqs()
	{
		if ($this->collCcsolliqs === null) {
			$this->collCcsolliqs = array();
		}
	}

	
	public function getCcsolliqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
					$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqCriteria = $criteria;
		return $this->collCcsolliqs;
	}

	
	public function countCcsolliqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

		return CcsolliqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliq(Ccsolliq $l)
	{
		$this->collCcsolliqs[] = $l;
		$l->setCcsoldes($this);
	}


	
	public function getCcsolliqsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}

} 