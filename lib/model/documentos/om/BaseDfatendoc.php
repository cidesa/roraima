<?php


abstract class BaseDfatendoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroexp;


	
	protected $coddoc;


	
	protected $desdoc;


	
	protected $mondoc;


	
	protected $fecdoc;


	
	protected $staate;


	
	protected $anuate;


	
	protected $estado;


	
	protected $id_dftabtip;


	
	protected $infdoc1;


	
	protected $infdoc2;


	
	protected $infdoc3;


	
	protected $infdoc4;


	
	protected $refdoc;


	
	protected $id;

	
	protected $aDftabtip;

	
	protected $collDfatendocdets;

	
	protected $lastDfatendocdetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroexp()
  {

    return $this->nroexp;

  }
  
  public function getCoddoc()
  {

    return trim($this->coddoc);

  }
  
  public function getDesdoc()
  {

    return trim($this->desdoc);

  }
  
  public function getMondoc()
  {

    return trim($this->mondoc);

  }
  
  public function getFecdoc()
  {

    return trim($this->fecdoc);

  }
  
  public function getStaate()
  {

    return trim($this->staate);

  }
  
  public function getAnuate()
  {

    return $this->anuate;

  }
  
  public function getEstado()
  {

    return trim($this->estado);

  }
  
  public function getIdDftabtip()
  {

    return $this->id_dftabtip;

  }
  
  public function getInfdoc1()
  {

    return trim($this->infdoc1);

  }
  
  public function getInfdoc2()
  {

    return trim($this->infdoc2);

  }
  
  public function getInfdoc3()
  {

    return trim($this->infdoc3);

  }
  
  public function getInfdoc4()
  {

    return trim($this->infdoc4);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroexp($v)
	{

    if ($this->nroexp !== $v) {
        $this->nroexp = $v;
        $this->modifiedColumns[] = DfatendocPeer::NROEXP;
      }
  
	} 
	
	public function setCoddoc($v)
	{

    if ($this->coddoc !== $v) {
        $this->coddoc = $v;
        $this->modifiedColumns[] = DfatendocPeer::CODDOC;
      }
  
	} 
	
	public function setDesdoc($v)
	{

    if ($this->desdoc !== $v) {
        $this->desdoc = $v;
        $this->modifiedColumns[] = DfatendocPeer::DESDOC;
      }
  
	} 
	
	public function setMondoc($v)
	{

    if ($this->mondoc !== $v) {
        $this->mondoc = $v;
        $this->modifiedColumns[] = DfatendocPeer::MONDOC;
      }
  
	} 
	
	public function setFecdoc($v)
	{

    if ($this->fecdoc !== $v) {
        $this->fecdoc = $v;
        $this->modifiedColumns[] = DfatendocPeer::FECDOC;
      }
  
	} 
	
	public function setStaate($v)
	{

    if ($this->staate !== $v) {
        $this->staate = $v;
        $this->modifiedColumns[] = DfatendocPeer::STAATE;
      }
  
	} 
	
	public function setAnuate($v)
	{

    if ($this->anuate !== $v) {
        $this->anuate = $v;
        $this->modifiedColumns[] = DfatendocPeer::ANUATE;
      }
  
	} 
	
	public function setEstado($v)
	{

    if ($this->estado !== $v) {
        $this->estado = $v;
        $this->modifiedColumns[] = DfatendocPeer::ESTADO;
      }
  
	} 
	
	public function setIdDftabtip($v)
	{

    if ($this->id_dftabtip !== $v) {
        $this->id_dftabtip = $v;
        $this->modifiedColumns[] = DfatendocPeer::ID_DFTABTIP;
      }
  
		if ($this->aDftabtip !== null && $this->aDftabtip->getId() !== $v) {
			$this->aDftabtip = null;
		}

	} 
	
	public function setInfdoc1($v)
	{

    if ($this->infdoc1 !== $v) {
        $this->infdoc1 = $v;
        $this->modifiedColumns[] = DfatendocPeer::INFDOC1;
      }
  
	} 
	
	public function setInfdoc2($v)
	{

    if ($this->infdoc2 !== $v) {
        $this->infdoc2 = $v;
        $this->modifiedColumns[] = DfatendocPeer::INFDOC2;
      }
  
	} 
	
	public function setInfdoc3($v)
	{

    if ($this->infdoc3 !== $v) {
        $this->infdoc3 = $v;
        $this->modifiedColumns[] = DfatendocPeer::INFDOC3;
      }
  
	} 
	
	public function setInfdoc4($v)
	{

    if ($this->infdoc4 !== $v) {
        $this->infdoc4 = $v;
        $this->modifiedColumns[] = DfatendocPeer::INFDOC4;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = DfatendocPeer::REFDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DfatendocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroexp = $rs->getInt($startcol + 0);

      $this->coddoc = $rs->getString($startcol + 1);

      $this->desdoc = $rs->getString($startcol + 2);

      $this->mondoc = $rs->getString($startcol + 3);

      $this->fecdoc = $rs->getString($startcol + 4);

      $this->staate = $rs->getString($startcol + 5);

      $this->anuate = $rs->getInt($startcol + 6);

      $this->estado = $rs->getString($startcol + 7);

      $this->id_dftabtip = $rs->getInt($startcol + 8);

      $this->infdoc1 = $rs->getString($startcol + 9);

      $this->infdoc2 = $rs->getString($startcol + 10);

      $this->infdoc3 = $rs->getString($startcol + 11);

      $this->infdoc4 = $rs->getString($startcol + 12);

      $this->refdoc = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dfatendoc object", $e);
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
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfatendocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
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


												
			if ($this->aDftabtip !== null) {
				if ($this->aDftabtip->isModified()) {
					$affectedRows += $this->aDftabtip->save($con);
				}
				$this->setDftabtip($this->aDftabtip);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfatendocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DfatendocPeer::doUpdate($this, $con);
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


												
			if ($this->aDftabtip !== null) {
				if (!$this->aDftabtip->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDftabtip->getValidationFailures());
				}
			}


			if (($retval = DfatendocPeer::doValidate($this, $columns)) !== true) {
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
		$pos = DfatendocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroexp();
				break;
			case 1:
				return $this->getCoddoc();
				break;
			case 2:
				return $this->getDesdoc();
				break;
			case 3:
				return $this->getMondoc();
				break;
			case 4:
				return $this->getFecdoc();
				break;
			case 5:
				return $this->getStaate();
				break;
			case 6:
				return $this->getAnuate();
				break;
			case 7:
				return $this->getEstado();
				break;
			case 8:
				return $this->getIdDftabtip();
				break;
			case 9:
				return $this->getInfdoc1();
				break;
			case 10:
				return $this->getInfdoc2();
				break;
			case 11:
				return $this->getInfdoc3();
				break;
			case 12:
				return $this->getInfdoc4();
				break;
			case 13:
				return $this->getRefdoc();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroexp(),
			$keys[1] => $this->getCoddoc(),
			$keys[2] => $this->getDesdoc(),
			$keys[3] => $this->getMondoc(),
			$keys[4] => $this->getFecdoc(),
			$keys[5] => $this->getStaate(),
			$keys[6] => $this->getAnuate(),
			$keys[7] => $this->getEstado(),
			$keys[8] => $this->getIdDftabtip(),
			$keys[9] => $this->getInfdoc1(),
			$keys[10] => $this->getInfdoc2(),
			$keys[11] => $this->getInfdoc3(),
			$keys[12] => $this->getInfdoc4(),
			$keys[13] => $this->getRefdoc(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroexp($value);
				break;
			case 1:
				$this->setCoddoc($value);
				break;
			case 2:
				$this->setDesdoc($value);
				break;
			case 3:
				$this->setMondoc($value);
				break;
			case 4:
				$this->setFecdoc($value);
				break;
			case 5:
				$this->setStaate($value);
				break;
			case 6:
				$this->setAnuate($value);
				break;
			case 7:
				$this->setEstado($value);
				break;
			case 8:
				$this->setIdDftabtip($value);
				break;
			case 9:
				$this->setInfdoc1($value);
				break;
			case 10:
				$this->setInfdoc2($value);
				break;
			case 11:
				$this->setInfdoc3($value);
				break;
			case 12:
				$this->setInfdoc4($value);
				break;
			case 13:
				$this->setRefdoc($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroexp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCoddoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesdoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMondoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnuate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEstado($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIdDftabtip($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setInfdoc1($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInfdoc2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInfdoc3($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setInfdoc4($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRefdoc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfatendocPeer::NROEXP)) $criteria->add(DfatendocPeer::NROEXP, $this->nroexp);
		if ($this->isColumnModified(DfatendocPeer::CODDOC)) $criteria->add(DfatendocPeer::CODDOC, $this->coddoc);
		if ($this->isColumnModified(DfatendocPeer::DESDOC)) $criteria->add(DfatendocPeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(DfatendocPeer::MONDOC)) $criteria->add(DfatendocPeer::MONDOC, $this->mondoc);
		if ($this->isColumnModified(DfatendocPeer::FECDOC)) $criteria->add(DfatendocPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(DfatendocPeer::STAATE)) $criteria->add(DfatendocPeer::STAATE, $this->staate);
		if ($this->isColumnModified(DfatendocPeer::ANUATE)) $criteria->add(DfatendocPeer::ANUATE, $this->anuate);
		if ($this->isColumnModified(DfatendocPeer::ESTADO)) $criteria->add(DfatendocPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(DfatendocPeer::ID_DFTABTIP)) $criteria->add(DfatendocPeer::ID_DFTABTIP, $this->id_dftabtip);
		if ($this->isColumnModified(DfatendocPeer::INFDOC1)) $criteria->add(DfatendocPeer::INFDOC1, $this->infdoc1);
		if ($this->isColumnModified(DfatendocPeer::INFDOC2)) $criteria->add(DfatendocPeer::INFDOC2, $this->infdoc2);
		if ($this->isColumnModified(DfatendocPeer::INFDOC3)) $criteria->add(DfatendocPeer::INFDOC3, $this->infdoc3);
		if ($this->isColumnModified(DfatendocPeer::INFDOC4)) $criteria->add(DfatendocPeer::INFDOC4, $this->infdoc4);
		if ($this->isColumnModified(DfatendocPeer::REFDOC)) $criteria->add(DfatendocPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(DfatendocPeer::ID)) $criteria->add(DfatendocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		$criteria->add(DfatendocPeer::ID, $this->id);

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

		$copyObj->setNroexp($this->nroexp);

		$copyObj->setCoddoc($this->coddoc);

		$copyObj->setDesdoc($this->desdoc);

		$copyObj->setMondoc($this->mondoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setStaate($this->staate);

		$copyObj->setAnuate($this->anuate);

		$copyObj->setEstado($this->estado);

		$copyObj->setIdDftabtip($this->id_dftabtip);

		$copyObj->setInfdoc1($this->infdoc1);

		$copyObj->setInfdoc2($this->infdoc2);

		$copyObj->setInfdoc3($this->infdoc3);

		$copyObj->setInfdoc4($this->infdoc4);

		$copyObj->setRefdoc($this->refdoc);


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
			self::$peer = new DfatendocPeer();
		}
		return self::$peer;
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

				$criteria->add(DfatendocdetPeer::ID_DFATENDOC, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdetPeer::ID_DFATENDOC, $this->getId());

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

		$criteria->add(DfatendocdetPeer::ID_DFATENDOC, $this->getId());

		return DfatendocdetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdet(Dfatendocdet $l)
	{
		$this->collDfatendocdets[] = $l;
		$l->setDfatendoc($this);
	}

} 
