<?php


abstract class BaseDfrutadoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rutdoc;


	
	protected $desuni;


	
	protected $desrut;


	
	protected $diadoc;


	
	protected $id_acunidad;


	
	protected $id_dftabtip;


	
	protected $id;

	
	protected $aAcunidad;

	
	protected $aDftabtip;

	
	protected $collDfatendocdets;

	
	protected $lastDfatendocdetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRutdoc()
  {

    return $this->rutdoc;

  }
  
  public function getDesuni()
  {

    return trim($this->desuni);

  }
  
  public function getDesrut()
  {

    return trim($this->desrut);

  }
  
  public function getDiadoc()
  {

    return $this->diadoc;

  }
  
  public function getIdAcunidad()
  {

    return $this->id_acunidad;

  }
  
  public function getIdDftabtip()
  {

    return $this->id_dftabtip;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRutdoc($v)
	{

    if ($this->rutdoc !== $v) {
        $this->rutdoc = $v;
        $this->modifiedColumns[] = DfrutadocPeer::RUTDOC;
      }
  
	} 
	
	public function setDesuni($v)
	{

    if ($this->desuni !== $v) {
        $this->desuni = $v;
        $this->modifiedColumns[] = DfrutadocPeer::DESUNI;
      }
  
	} 
	
	public function setDesrut($v)
	{

    if ($this->desrut !== $v) {
        $this->desrut = $v;
        $this->modifiedColumns[] = DfrutadocPeer::DESRUT;
      }
  
	} 
	
	public function setDiadoc($v)
	{

    if ($this->diadoc !== $v) {
        $this->diadoc = $v;
        $this->modifiedColumns[] = DfrutadocPeer::DIADOC;
      }
  
	} 
	
	public function setIdAcunidad($v)
	{

    if ($this->id_acunidad !== $v) {
        $this->id_acunidad = $v;
        $this->modifiedColumns[] = DfrutadocPeer::ID_ACUNIDAD;
      }
  
		if ($this->aAcunidad !== null && $this->aAcunidad->getId() !== $v) {
			$this->aAcunidad = null;
		}

	} 
	
	public function setIdDftabtip($v)
	{

    if ($this->id_dftabtip !== $v) {
        $this->id_dftabtip = $v;
        $this->modifiedColumns[] = DfrutadocPeer::ID_DFTABTIP;
      }
  
		if ($this->aDftabtip !== null && $this->aDftabtip->getId() !== $v) {
			$this->aDftabtip = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DfrutadocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rutdoc = $rs->getInt($startcol + 0);

      $this->desuni = $rs->getString($startcol + 1);

      $this->desrut = $rs->getString($startcol + 2);

      $this->diadoc = $rs->getInt($startcol + 3);

      $this->id_acunidad = $rs->getInt($startcol + 4);

      $this->id_dftabtip = $rs->getInt($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dfrutadoc object", $e);
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
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfrutadocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfrutadocPeer::DATABASE_NAME);
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


												
			if ($this->aAcunidad !== null) {
				if ($this->aAcunidad->isModified()) {
					$affectedRows += $this->aAcunidad->save($con);
				}
				$this->setAcunidad($this->aAcunidad);
			}

			if ($this->aDftabtip !== null) {
				if ($this->aDftabtip->isModified()) {
					$affectedRows += $this->aDftabtip->save($con);
				}
				$this->setDftabtip($this->aDftabtip);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfrutadocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DfrutadocPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocdets !== null) {
				foreach($this->collDfatendocdets as $referrerFK) {
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


												
			if ($this->aAcunidad !== null) {
				if (!$this->aAcunidad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAcunidad->getValidationFailures());
				}
			}

			if ($this->aDftabtip !== null) {
				if (!$this->aDftabtip->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDftabtip->getValidationFailures());
				}
			}


			if (($retval = DfrutadocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocdets !== null) {
					foreach($this->collDfatendocdets as $referrerFK) {
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
		$pos = DfrutadocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRutdoc();
				break;
			case 1:
				return $this->getDesuni();
				break;
			case 2:
				return $this->getDesrut();
				break;
			case 3:
				return $this->getDiadoc();
				break;
			case 4:
				return $this->getIdAcunidad();
				break;
			case 5:
				return $this->getIdDftabtip();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfrutadocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRutdoc(),
			$keys[1] => $this->getDesuni(),
			$keys[2] => $this->getDesrut(),
			$keys[3] => $this->getDiadoc(),
			$keys[4] => $this->getIdAcunidad(),
			$keys[5] => $this->getIdDftabtip(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfrutadocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRutdoc($value);
				break;
			case 1:
				$this->setDesuni($value);
				break;
			case 2:
				$this->setDesrut($value);
				break;
			case 3:
				$this->setDiadoc($value);
				break;
			case 4:
				$this->setIdAcunidad($value);
				break;
			case 5:
				$this->setIdDftabtip($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfrutadocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRutdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrut($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiadoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdAcunidad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIdDftabtip($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfrutadocPeer::RUTDOC)) $criteria->add(DfrutadocPeer::RUTDOC, $this->rutdoc);
		if ($this->isColumnModified(DfrutadocPeer::DESUNI)) $criteria->add(DfrutadocPeer::DESUNI, $this->desuni);
		if ($this->isColumnModified(DfrutadocPeer::DESRUT)) $criteria->add(DfrutadocPeer::DESRUT, $this->desrut);
		if ($this->isColumnModified(DfrutadocPeer::DIADOC)) $criteria->add(DfrutadocPeer::DIADOC, $this->diadoc);
		if ($this->isColumnModified(DfrutadocPeer::ID_ACUNIDAD)) $criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->id_acunidad);
		if ($this->isColumnModified(DfrutadocPeer::ID_DFTABTIP)) $criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->id_dftabtip);
		if ($this->isColumnModified(DfrutadocPeer::ID)) $criteria->add(DfrutadocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfrutadocPeer::DATABASE_NAME);

		$criteria->add(DfrutadocPeer::ID, $this->id);

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

		$copyObj->setRutdoc($this->rutdoc);

		$copyObj->setDesuni($this->desuni);

		$copyObj->setDesrut($this->desrut);

		$copyObj->setDiadoc($this->diadoc);

		$copyObj->setIdAcunidad($this->id_acunidad);

		$copyObj->setIdDftabtip($this->id_dftabtip);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocdets() as $relObj) {
				$copyObj->addDfatendocdet($relObj->copy($deepCopy));
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
			self::$peer = new DfrutadocPeer();
		}
		return self::$peer;
	}

	
	public function setAcunidad($v)
	{


		if ($v === null) {
			$this->setIdAcunidad(NULL);
		} else {
			$this->setIdAcunidad($v->getId());
		}


		$this->aAcunidad = $v;
	}


	
	public function getAcunidad($con = null)
	{
		if ($this->aAcunidad === null && ($this->id_acunidad !== null)) {
						include_once 'lib/model/om/BaseAcunidadPeer.php';

      $c = new Criteria();
      $c->add(AcunidadPeer::ID,$this->id_acunidad);
      
			$this->aAcunidad = AcunidadPeer::doSelectOne($c, $con);

			
		}
		return $this->aAcunidad;
	}

	
	public function setDftabtip($v)
	{


		if ($v === null) {
			$this->setIdDftabtip(NULL);
		} else {
			$this->setIdDftabtip($v->getId());
		}


		$this->aDftabtip = $v;
	}


	
	public function getDftabtip($con = null)
	{
		if ($this->aDftabtip === null && ($this->id_dftabtip !== null)) {
						include_once 'lib/model/documentos/om/BaseDftabtipPeer.php';

      $c = new Criteria();
      $c->add(DftabtipPeer::ID,$this->id_dftabtip);
      
			$this->aDftabtip = DftabtipPeer::doSelectOne($c, $con);

			
		}
		return $this->aDftabtip;
	}

	
	public function initDfatendocdets()
	{
		if ($this->collDfatendocdets === null) {
			$this->collDfatendocdets = array();
		}
	}

	
	public function getDfatendocdets($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_DFRUTADOC, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdetPeer::ID_DFRUTADOC, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
					$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;
		return $this->collDfatendocdets;
	}

	
	public function countDfatendocdets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdetPeer::ID_DFRUTADOC, $this->getId());

		return DfatendocdetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdet(Dfatendocdet $l)
	{
		$this->collDfatendocdets[] = $l;
		$l->setDfrutadoc($this);
	}


	
	public function getDfatendocdetsJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
				$this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_DFRUTADOC, $this->getId());

				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_DFRUTADOC, $this->getId());

			if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;

		return $this->collDfatendocdets;
	}

} 