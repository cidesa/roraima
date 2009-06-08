<?php


abstract class BaseAtunidades extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduni;


	
	protected $desuni;


	
	protected $diruni;


	
	protected $telfuni;


	
	protected $percon;


	
	protected $telpercon;


	
	protected $mailpercon;


	
	protected $horario;


	
	protected $id;

	
	protected $collAtreclamoss;

	
	protected $lastAtreclamosCriteria = null;

	
	protected $collAtdenunciass;

	
	protected $lastAtdenunciasCriteria = null;

	
	protected $collAtaudienciass;

	
	protected $lastAtaudienciasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getDesuni()
  {

    return trim($this->desuni);

  }
  
  public function getDiruni()
  {

    return trim($this->diruni);

  }
  
  public function getTelfuni()
  {

    return trim($this->telfuni);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getTelpercon()
  {

    return trim($this->telpercon);

  }
  
  public function getMailpercon()
  {

    return trim($this->mailpercon);

  }
  
  public function getHorario()
  {

    return trim($this->horario);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = AtunidadesPeer::CODUNI;
      }
  
	} 
	
	public function setDesuni($v)
	{

    if ($this->desuni !== $v) {
        $this->desuni = $v;
        $this->modifiedColumns[] = AtunidadesPeer::DESUNI;
      }
  
	} 
	
	public function setDiruni($v)
	{

    if ($this->diruni !== $v) {
        $this->diruni = $v;
        $this->modifiedColumns[] = AtunidadesPeer::DIRUNI;
      }
  
	} 
	
	public function setTelfuni($v)
	{

    if ($this->telfuni !== $v) {
        $this->telfuni = $v;
        $this->modifiedColumns[] = AtunidadesPeer::TELFUNI;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = AtunidadesPeer::PERCON;
      }
  
	} 
	
	public function setTelpercon($v)
	{

    if ($this->telpercon !== $v) {
        $this->telpercon = $v;
        $this->modifiedColumns[] = AtunidadesPeer::TELPERCON;
      }
  
	} 
	
	public function setMailpercon($v)
	{

    if ($this->mailpercon !== $v) {
        $this->mailpercon = $v;
        $this->modifiedColumns[] = AtunidadesPeer::MAILPERCON;
      }
  
	} 
	
	public function setHorario($v)
	{

    if ($this->horario !== $v) {
        $this->horario = $v;
        $this->modifiedColumns[] = AtunidadesPeer::HORARIO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtunidadesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduni = $rs->getString($startcol + 0);

      $this->desuni = $rs->getString($startcol + 1);

      $this->diruni = $rs->getString($startcol + 2);

      $this->telfuni = $rs->getString($startcol + 3);

      $this->percon = $rs->getString($startcol + 4);

      $this->telpercon = $rs->getString($startcol + 5);

      $this->mailpercon = $rs->getString($startcol + 6);

      $this->horario = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atunidades object", $e);
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
			$con = Propel::getConnection(AtunidadesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtunidadesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtunidadesPeer::DATABASE_NAME);
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
					$pk = AtunidadesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtunidadesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtreclamoss !== null) {
				foreach($this->collAtreclamoss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdenunciass !== null) {
				foreach($this->collAtdenunciass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtaudienciass !== null) {
				foreach($this->collAtaudienciass as $referrerFK) {
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


			if (($retval = AtunidadesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtreclamoss !== null) {
					foreach($this->collAtreclamoss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdenunciass !== null) {
					foreach($this->collAtdenunciass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtaudienciass !== null) {
					foreach($this->collAtaudienciass as $referrerFK) {
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
		$pos = AtunidadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduni();
				break;
			case 1:
				return $this->getDesuni();
				break;
			case 2:
				return $this->getDiruni();
				break;
			case 3:
				return $this->getTelfuni();
				break;
			case 4:
				return $this->getPercon();
				break;
			case 5:
				return $this->getTelpercon();
				break;
			case 6:
				return $this->getMailpercon();
				break;
			case 7:
				return $this->getHorario();
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
		$keys = AtunidadesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduni(),
			$keys[1] => $this->getDesuni(),
			$keys[2] => $this->getDiruni(),
			$keys[3] => $this->getTelfuni(),
			$keys[4] => $this->getPercon(),
			$keys[5] => $this->getTelpercon(),
			$keys[6] => $this->getMailpercon(),
			$keys[7] => $this->getHorario(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtunidadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduni($value);
				break;
			case 1:
				$this->setDesuni($value);
				break;
			case 2:
				$this->setDiruni($value);
				break;
			case 3:
				$this->setTelfuni($value);
				break;
			case 4:
				$this->setPercon($value);
				break;
			case 5:
				$this->setTelpercon($value);
				break;
			case 6:
				$this->setMailpercon($value);
				break;
			case 7:
				$this->setHorario($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtunidadesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiruni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelfuni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPercon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelpercon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMailpercon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setHorario($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtunidadesPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtunidadesPeer::CODUNI)) $criteria->add(AtunidadesPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(AtunidadesPeer::DESUNI)) $criteria->add(AtunidadesPeer::DESUNI, $this->desuni);
		if ($this->isColumnModified(AtunidadesPeer::DIRUNI)) $criteria->add(AtunidadesPeer::DIRUNI, $this->diruni);
		if ($this->isColumnModified(AtunidadesPeer::TELFUNI)) $criteria->add(AtunidadesPeer::TELFUNI, $this->telfuni);
		if ($this->isColumnModified(AtunidadesPeer::PERCON)) $criteria->add(AtunidadesPeer::PERCON, $this->percon);
		if ($this->isColumnModified(AtunidadesPeer::TELPERCON)) $criteria->add(AtunidadesPeer::TELPERCON, $this->telpercon);
		if ($this->isColumnModified(AtunidadesPeer::MAILPERCON)) $criteria->add(AtunidadesPeer::MAILPERCON, $this->mailpercon);
		if ($this->isColumnModified(AtunidadesPeer::HORARIO)) $criteria->add(AtunidadesPeer::HORARIO, $this->horario);
		if ($this->isColumnModified(AtunidadesPeer::ID)) $criteria->add(AtunidadesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtunidadesPeer::DATABASE_NAME);

		$criteria->add(AtunidadesPeer::ID, $this->id);

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

		$copyObj->setCoduni($this->coduni);

		$copyObj->setDesuni($this->desuni);

		$copyObj->setDiruni($this->diruni);

		$copyObj->setTelfuni($this->telfuni);

		$copyObj->setPercon($this->percon);

		$copyObj->setTelpercon($this->telpercon);

		$copyObj->setMailpercon($this->mailpercon);

		$copyObj->setHorario($this->horario);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtreclamoss() as $relObj) {
				$copyObj->addAtreclamos($relObj->copy($deepCopy));
			}

			foreach($this->getAtdenunciass() as $relObj) {
				$copyObj->addAtdenuncias($relObj->copy($deepCopy));
			}

			foreach($this->getAtaudienciass() as $relObj) {
				$copyObj->addAtaudiencias($relObj->copy($deepCopy));
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
			self::$peer = new AtunidadesPeer();
		}
		return self::$peer;
	}

	
	public function initAtreclamoss()
	{
		if ($this->collAtreclamoss === null) {
			$this->collAtreclamoss = array();
		}
	}

	
	public function getAtreclamoss($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtreclamosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtreclamoss === null) {
			if ($this->isNew()) {
			   $this->collAtreclamoss = array();
			} else {

				$criteria->add(AtreclamosPeer::ATUNIDADES_ID, $this->getId());

				AtreclamosPeer::addSelectColumns($criteria);
				$this->collAtreclamoss = AtreclamosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtreclamosPeer::ATUNIDADES_ID, $this->getId());

				AtreclamosPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtreclamosCriteria) || !$this->lastAtreclamosCriteria->equals($criteria)) {
					$this->collAtreclamoss = AtreclamosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtreclamosCriteria = $criteria;
		return $this->collAtreclamoss;
	}

	
	public function countAtreclamoss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtreclamosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtreclamosPeer::ATUNIDADES_ID, $this->getId());

		return AtreclamosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtreclamos(Atreclamos $l)
	{
		$this->collAtreclamoss[] = $l;
		$l->setAtunidades($this);
	}

	
	public function initAtdenunciass()
	{
		if ($this->collAtdenunciass === null) {
			$this->collAtdenunciass = array();
		}
	}

	
	public function getAtdenunciass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
			   $this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATUNIDADES_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdenunciasPeer::ATUNIDADES_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
					$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;
		return $this->collAtdenunciass;
	}

	
	public function countAtdenunciass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdenunciasPeer::ATUNIDADES_ID, $this->getId());

		return AtdenunciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdenuncias(Atdenuncias $l)
	{
		$this->collAtdenunciass[] = $l;
		$l->setAtunidades($this);
	}

	
	public function initAtaudienciass()
	{
		if ($this->collAtaudienciass === null) {
			$this->collAtaudienciass = array();
		}
	}

	
	public function getAtaudienciass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtaudienciass === null) {
			if ($this->isNew()) {
			   $this->collAtaudienciass = array();
			} else {

				$criteria->add(AtaudienciasPeer::ATUNIDADES_ID, $this->getId());

				AtaudienciasPeer::addSelectColumns($criteria);
				$this->collAtaudienciass = AtaudienciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtaudienciasPeer::ATUNIDADES_ID, $this->getId());

				AtaudienciasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtaudienciasCriteria) || !$this->lastAtaudienciasCriteria->equals($criteria)) {
					$this->collAtaudienciass = AtaudienciasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtaudienciasCriteria = $criteria;
		return $this->collAtaudienciass;
	}

	
	public function countAtaudienciass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtaudienciasPeer::ATUNIDADES_ID, $this->getId());

		return AtaudienciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtaudiencias(Ataudiencias $l)
	{
		$this->collAtaudienciass[] = $l;
		$l->setAtunidades($this);
	}


	
	public function getAtaudienciassJoinAtciudadano($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtaudienciass === null) {
			if ($this->isNew()) {
				$this->collAtaudienciass = array();
			} else {

				$criteria->add(AtaudienciasPeer::ATUNIDADES_ID, $this->getId());

				$this->collAtaudienciass = AtaudienciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		} else {
									
			$criteria->add(AtaudienciasPeer::ATUNIDADES_ID, $this->getId());

			if (!isset($this->lastAtaudienciasCriteria) || !$this->lastAtaudienciasCriteria->equals($criteria)) {
				$this->collAtaudienciass = AtaudienciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		}
		$this->lastAtaudienciasCriteria = $criteria;

		return $this->collAtaudienciass;
	}

} 