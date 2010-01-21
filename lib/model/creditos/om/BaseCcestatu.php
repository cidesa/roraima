<?php


abstract class BaseCcestatu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $alias;


	
	protected $nombre;


	
	protected $maxdia;


	
	protected $comentario;


	
	protected $movcont;


	
	protected $enruta;


	
	protected $orden;


	
	protected $ccgerenc_id;

	
	protected $aCcgerenc;

	
	protected $collCcbitcreds;

	
	protected $lastCcbitcredCriteria = null;

	
	protected $collCcestcres;

	
	protected $lastCcestcreCriteria = null;

	
	protected $collCcestcredsRelatedByCcestatuId;

	
	protected $lastCcestcredRelatedByCcestatuIdCriteria = null;

	
	protected $collCcestcredsRelatedByCcestsigId;

	
	protected $lastCcestcredRelatedByCcestsigIdCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getAlias()
  {

    return trim($this->alias);

  }
  
  public function getNombre()
  {

    return trim($this->nombre);

  }
  
  public function getMaxdia()
  {

    return $this->maxdia;

  }
  
  public function getComentario()
  {

    return trim($this->comentario);

  }
  
  public function getMovcont()
  {

    return trim($this->movcont);

  }
  
  public function getEnruta()
  {

    return trim($this->enruta);

  }
  
  public function getOrden()
  {

    return $this->orden;

  }
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcestatuPeer::ID;
      }
  
	} 
	
	public function setAlias($v)
	{

    if ($this->alias !== $v) {
        $this->alias = $v;
        $this->modifiedColumns[] = CcestatuPeer::ALIAS;
      }
  
	} 
	
	public function setNombre($v)
	{

    if ($this->nombre !== $v) {
        $this->nombre = $v;
        $this->modifiedColumns[] = CcestatuPeer::NOMBRE;
      }
  
	} 
	
	public function setMaxdia($v)
	{

    if ($this->maxdia !== $v) {
        $this->maxdia = $v;
        $this->modifiedColumns[] = CcestatuPeer::MAXDIA;
      }
  
	} 
	
	public function setComentario($v)
	{

    if ($this->comentario !== $v) {
        $this->comentario = $v;
        $this->modifiedColumns[] = CcestatuPeer::COMENTARIO;
      }
  
	} 
	
	public function setMovcont($v)
	{

    if ($this->movcont !== $v) {
        $this->movcont = $v;
        $this->modifiedColumns[] = CcestatuPeer::MOVCONT;
      }
  
	} 
	
	public function setEnruta($v)
	{

    if ($this->enruta !== $v) {
        $this->enruta = $v;
        $this->modifiedColumns[] = CcestatuPeer::ENRUTA;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = CcestatuPeer::ORDEN;
      }
  
	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcestatuPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->alias = $rs->getString($startcol + 1);

      $this->nombre = $rs->getString($startcol + 2);

      $this->maxdia = $rs->getInt($startcol + 3);

      $this->comentario = $rs->getString($startcol + 4);

      $this->movcont = $rs->getString($startcol + 5);

      $this->enruta = $rs->getString($startcol + 6);

      $this->orden = $rs->getInt($startcol + 7);

      $this->ccgerenc_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccestatu object", $e);
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
			$con = Propel::getConnection(CcestatuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcestatuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcestatuPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcestatuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcestatuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbitcreds !== null) {
				foreach($this->collCcbitcreds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcres !== null) {
				foreach($this->collCcestcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcredsRelatedByCcestatuId !== null) {
				foreach($this->collCcestcredsRelatedByCcestatuId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcredsRelatedByCcestsigId !== null) {
				foreach($this->collCcestcredsRelatedByCcestsigId as $referrerFK) {
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


												
			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}


			if (($retval = CcestatuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbitcreds !== null) {
					foreach($this->collCcbitcreds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcres !== null) {
					foreach($this->collCcestcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcredsRelatedByCcestatuId !== null) {
					foreach($this->collCcestcredsRelatedByCcestatuId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcredsRelatedByCcestsigId !== null) {
					foreach($this->collCcestcredsRelatedByCcestsigId as $referrerFK) {
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
		$pos = CcestatuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getAlias();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getMaxdia();
				break;
			case 4:
				return $this->getComentario();
				break;
			case 5:
				return $this->getMovcont();
				break;
			case 6:
				return $this->getEnruta();
				break;
			case 7:
				return $this->getOrden();
				break;
			case 8:
				return $this->getCcgerencId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestatuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAlias(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getMaxdia(),
			$keys[4] => $this->getComentario(),
			$keys[5] => $this->getMovcont(),
			$keys[6] => $this->getEnruta(),
			$keys[7] => $this->getOrden(),
			$keys[8] => $this->getCcgerencId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcestatuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setAlias($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setMaxdia($value);
				break;
			case 4:
				$this->setComentario($value);
				break;
			case 5:
				$this->setMovcont($value);
				break;
			case 6:
				$this->setEnruta($value);
				break;
			case 7:
				$this->setOrden($value);
				break;
			case 8:
				$this->setCcgerencId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestatuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAlias($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMaxdia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComentario($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMovcont($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEnruta($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOrden($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcgerencId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcestatuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcestatuPeer::ID)) $criteria->add(CcestatuPeer::ID, $this->id);
		if ($this->isColumnModified(CcestatuPeer::ALIAS)) $criteria->add(CcestatuPeer::ALIAS, $this->alias);
		if ($this->isColumnModified(CcestatuPeer::NOMBRE)) $criteria->add(CcestatuPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CcestatuPeer::MAXDIA)) $criteria->add(CcestatuPeer::MAXDIA, $this->maxdia);
		if ($this->isColumnModified(CcestatuPeer::COMENTARIO)) $criteria->add(CcestatuPeer::COMENTARIO, $this->comentario);
		if ($this->isColumnModified(CcestatuPeer::MOVCONT)) $criteria->add(CcestatuPeer::MOVCONT, $this->movcont);
		if ($this->isColumnModified(CcestatuPeer::ENRUTA)) $criteria->add(CcestatuPeer::ENRUTA, $this->enruta);
		if ($this->isColumnModified(CcestatuPeer::ORDEN)) $criteria->add(CcestatuPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(CcestatuPeer::CCGERENC_ID)) $criteria->add(CcestatuPeer::CCGERENC_ID, $this->ccgerenc_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcestatuPeer::DATABASE_NAME);

		$criteria->add(CcestatuPeer::ID, $this->id);

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

		$copyObj->setAlias($this->alias);

		$copyObj->setNombre($this->nombre);

		$copyObj->setMaxdia($this->maxdia);

		$copyObj->setComentario($this->comentario);

		$copyObj->setMovcont($this->movcont);

		$copyObj->setEnruta($this->enruta);

		$copyObj->setOrden($this->orden);

		$copyObj->setCcgerencId($this->ccgerenc_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbitcreds() as $relObj) {
				$copyObj->addCcbitcred($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcres() as $relObj) {
				$copyObj->addCcestcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcredsRelatedByCcestatuId() as $relObj) {
				$copyObj->addCcestcredRelatedByCcestatuId($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcredsRelatedByCcestsigId() as $relObj) {
				$copyObj->addCcestcredRelatedByCcestsigId($relObj->copy($deepCopy));
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
			self::$peer = new CcestatuPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
	}

	
	public function initCcbitcreds()
	{
		if ($this->collCcbitcreds === null) {
			$this->collCcbitcreds = array();
		}
	}

	
	public function getCcbitcreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
			   $this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

				CcbitcredPeer::addSelectColumns($criteria);
				$this->collCcbitcreds = CcbitcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

				CcbitcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
					$this->collCcbitcreds = CcbitcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbitcredCriteria = $criteria;
		return $this->collCcbitcreds;
	}

	
	public function countCcbitcreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

		return CcbitcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbitcred(Ccbitcred $l)
	{
		$this->collCcbitcreds[] = $l;
		$l->setCcestatu($this);
	}


	
	public function getCcbitcredsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
				$this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcbitcredCriteria = $criteria;

		return $this->collCcbitcreds;
	}


	
	public function getCcbitcredsJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
				$this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbitcredPeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcbitcredCriteria = $criteria;

		return $this->collCcbitcreds;
	}

	
	public function initCcestcres()
	{
		if ($this->collCcestcres === null) {
			$this->collCcestcres = array();
		}
	}

	
	public function getCcestcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
			   $this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

				CcestcrePeer::addSelectColumns($criteria);
				$this->collCcestcres = CcestcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

				CcestcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
					$this->collCcestcres = CcestcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcreCriteria = $criteria;
		return $this->collCcestcres;
	}

	
	public function countCcestcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

		return CcestcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcre(Ccestcre $l)
	{
		$this->collCcestcres[] = $l;
		$l->setCcestatu($this);
	}


	
	public function getCcestcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
				$this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

				$this->collCcestcres = CcestcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
				$this->collCcestcres = CcestcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcestcreCriteria = $criteria;

		return $this->collCcestcres;
	}


	
	public function getCcestcresJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
				$this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

				$this->collCcestcres = CcestcrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcrePeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
				$this->collCcestcres = CcestcrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcreCriteria = $criteria;

		return $this->collCcestcres;
	}

	
	public function initCcestcredsRelatedByCcestatuId()
	{
		if ($this->collCcestcredsRelatedByCcestatuId === null) {
			$this->collCcestcredsRelatedByCcestatuId = array();
		}
	}

	
	public function getCcestcredsRelatedByCcestatuId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestatuId === null) {
			if ($this->isNew()) {
			   $this->collCcestcredsRelatedByCcestatuId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcredRelatedByCcestatuIdCriteria) || !$this->lastCcestcredRelatedByCcestatuIdCriteria->equals($criteria)) {
					$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcredRelatedByCcestatuIdCriteria = $criteria;
		return $this->collCcestcredsRelatedByCcestatuId;
	}

	
	public function countCcestcredsRelatedByCcestatuId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

		return CcestcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcredRelatedByCcestatuId(Ccestcred $l)
	{
		$this->collCcestcredsRelatedByCcestatuId[] = $l;
		$l->setCcestatuRelatedByCcestatuId($this);
	}


	
	public function getCcestcredsRelatedByCcestatuIdJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestatuId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestatuId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestatuIdCriteria) || !$this->lastCcestcredRelatedByCcestatuIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestatuIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestatuId;
	}


	
	public function getCcestcredsRelatedByCcestatuIdJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestatuId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestatuId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestatuIdCriteria) || !$this->lastCcestcredRelatedByCcestatuIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestatuIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestatuId;
	}


	
	public function getCcestcredsRelatedByCcestatuIdJoinCcgerencRelatedByCcgerencoriId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestatuId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestatuId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestatuIdCriteria) || !$this->lastCcestcredRelatedByCcestatuIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestatuIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestatuId;
	}


	
	public function getCcestcredsRelatedByCcestatuIdJoinCcgerencRelatedByCcgerencdesId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestatuId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestatuId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTATU_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestatuIdCriteria) || !$this->lastCcestcredRelatedByCcestatuIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestatuId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestatuIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestatuId;
	}

	
	public function initCcestcredsRelatedByCcestsigId()
	{
		if ($this->collCcestcredsRelatedByCcestsigId === null) {
			$this->collCcestcredsRelatedByCcestsigId = array();
		}
	}

	
	public function getCcestcredsRelatedByCcestsigId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestsigId === null) {
			if ($this->isNew()) {
			   $this->collCcestcredsRelatedByCcestsigId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcredRelatedByCcestsigIdCriteria) || !$this->lastCcestcredRelatedByCcestsigIdCriteria->equals($criteria)) {
					$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcredRelatedByCcestsigIdCriteria = $criteria;
		return $this->collCcestcredsRelatedByCcestsigId;
	}

	
	public function countCcestcredsRelatedByCcestsigId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

		return CcestcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcredRelatedByCcestsigId(Ccestcred $l)
	{
		$this->collCcestcredsRelatedByCcestsigId[] = $l;
		$l->setCcestatuRelatedByCcestsigId($this);
	}


	
	public function getCcestcredsRelatedByCcestsigIdJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestsigId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestsigId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestsigIdCriteria) || !$this->lastCcestcredRelatedByCcestsigIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestsigIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestsigId;
	}


	
	public function getCcestcredsRelatedByCcestsigIdJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestsigId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestsigId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestsigIdCriteria) || !$this->lastCcestcredRelatedByCcestsigIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestsigIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestsigId;
	}


	
	public function getCcestcredsRelatedByCcestsigIdJoinCcgerencRelatedByCcgerencoriId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestsigId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestsigId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestsigIdCriteria) || !$this->lastCcestcredRelatedByCcestsigIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestsigIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestsigId;
	}


	
	public function getCcestcredsRelatedByCcestsigIdJoinCcgerencRelatedByCcgerencdesId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcestsigId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcestsigId = array();
			} else {

				$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCESTSIG_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcestsigIdCriteria) || !$this->lastCcestcredRelatedByCcestsigIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcestsigId = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcestsigIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcestsigId;
	}

} 