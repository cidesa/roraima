<?php


abstract class BaseDftabtip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipdoc;


	
	protected $nomtab;


	
	protected $vidutil;


	
	protected $clvprm;


	
	protected $clvfrn;


	
	protected $mondoc;


	
	protected $fecdoc;


	
	protected $desdoc;


	
	protected $stadoc;


	
	protected $infdoc1;


	
	protected $infdoc2;


	
	protected $infdoc3;


	
	protected $infdoc4;


	
	protected $id;

	
	protected $collDfatendocs;

	
	protected $lastDfatendocCriteria = null;

	
	protected $collDfrutadocs;

	
	protected $lastDfrutadocCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getNomtab()
  {

    return trim($this->nomtab);

  }
  
  public function getVidutil()
  {

    return $this->vidutil;

  }
  
  public function getClvprm()
  {

    return trim($this->clvprm);

  }
  
  public function getClvfrn()
  {

    return trim($this->clvfrn);

  }
  
  public function getMondoc()
  {

    return trim($this->mondoc);

  }
  
  public function getFecdoc()
  {

    return trim($this->fecdoc);

  }
  
  public function getDesdoc()
  {

    return trim($this->desdoc);

  }
  
  public function getStadoc()
  {

    return trim($this->stadoc);

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
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::TIPDOC;
      }
  
	} 
	
	public function setNomtab($v)
	{

    if ($this->nomtab !== $v) {
        $this->nomtab = $v;
        $this->modifiedColumns[] = DftabtipPeer::NOMTAB;
      }
  
	} 
	
	public function setVidutil($v)
	{

    if ($this->vidutil !== $v) {
        $this->vidutil = $v;
        $this->modifiedColumns[] = DftabtipPeer::VIDUTIL;
      }
  
	} 
	
	public function setClvprm($v)
	{

    if ($this->clvprm !== $v) {
        $this->clvprm = $v;
        $this->modifiedColumns[] = DftabtipPeer::CLVPRM;
      }
  
	} 
	
	public function setClvfrn($v)
	{

    if ($this->clvfrn !== $v) {
        $this->clvfrn = $v;
        $this->modifiedColumns[] = DftabtipPeer::CLVFRN;
      }
  
	} 
	
	public function setMondoc($v)
	{

    if ($this->mondoc !== $v) {
        $this->mondoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::MONDOC;
      }
  
	} 
	
	public function setFecdoc($v)
	{

    if ($this->fecdoc !== $v) {
        $this->fecdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::FECDOC;
      }
  
	} 
	
	public function setDesdoc($v)
	{

    if ($this->desdoc !== $v) {
        $this->desdoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::DESDOC;
      }
  
	} 
	
	public function setStadoc($v)
	{

    if ($this->stadoc !== $v) {
        $this->stadoc = $v;
        $this->modifiedColumns[] = DftabtipPeer::STADOC;
      }
  
	} 
	
	public function setInfdoc1($v)
	{

    if ($this->infdoc1 !== $v) {
        $this->infdoc1 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC1;
      }
  
	} 
	
	public function setInfdoc2($v)
	{

    if ($this->infdoc2 !== $v) {
        $this->infdoc2 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC2;
      }
  
	} 
	
	public function setInfdoc3($v)
	{

    if ($this->infdoc3 !== $v) {
        $this->infdoc3 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC3;
      }
  
	} 
	
	public function setInfdoc4($v)
	{

    if ($this->infdoc4 !== $v) {
        $this->infdoc4 = $v;
        $this->modifiedColumns[] = DftabtipPeer::INFDOC4;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DftabtipPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipdoc = $rs->getString($startcol + 0);

      $this->nomtab = $rs->getString($startcol + 1);

      $this->vidutil = $rs->getInt($startcol + 2);

      $this->clvprm = $rs->getString($startcol + 3);

      $this->clvfrn = $rs->getString($startcol + 4);

      $this->mondoc = $rs->getString($startcol + 5);

      $this->fecdoc = $rs->getString($startcol + 6);

      $this->desdoc = $rs->getString($startcol + 7);

      $this->stadoc = $rs->getString($startcol + 8);

      $this->infdoc1 = $rs->getString($startcol + 9);

      $this->infdoc2 = $rs->getString($startcol + 10);

      $this->infdoc3 = $rs->getString($startcol + 11);

      $this->infdoc4 = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dftabtip object", $e);
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
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DftabtipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DftabtipPeer::DATABASE_NAME);
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
					$pk = DftabtipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DftabtipPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocs !== null) {
				foreach($this->collDfatendocs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDfrutadocs !== null) {
				foreach($this->collDfrutadocs as $referrerFK) {
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


			if (($retval = DftabtipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocs !== null) {
					foreach($this->collDfatendocs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDfrutadocs !== null) {
					foreach($this->collDfrutadocs as $referrerFK) {
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
		$pos = DftabtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipdoc();
				break;
			case 1:
				return $this->getNomtab();
				break;
			case 2:
				return $this->getVidutil();
				break;
			case 3:
				return $this->getClvprm();
				break;
			case 4:
				return $this->getClvfrn();
				break;
			case 5:
				return $this->getMondoc();
				break;
			case 6:
				return $this->getFecdoc();
				break;
			case 7:
				return $this->getDesdoc();
				break;
			case 8:
				return $this->getStadoc();
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
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftabtipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipdoc(),
			$keys[1] => $this->getNomtab(),
			$keys[2] => $this->getVidutil(),
			$keys[3] => $this->getClvprm(),
			$keys[4] => $this->getClvfrn(),
			$keys[5] => $this->getMondoc(),
			$keys[6] => $this->getFecdoc(),
			$keys[7] => $this->getDesdoc(),
			$keys[8] => $this->getStadoc(),
			$keys[9] => $this->getInfdoc1(),
			$keys[10] => $this->getInfdoc2(),
			$keys[11] => $this->getInfdoc3(),
			$keys[12] => $this->getInfdoc4(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftabtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipdoc($value);
				break;
			case 1:
				$this->setNomtab($value);
				break;
			case 2:
				$this->setVidutil($value);
				break;
			case 3:
				$this->setClvprm($value);
				break;
			case 4:
				$this->setClvfrn($value);
				break;
			case 5:
				$this->setMondoc($value);
				break;
			case 6:
				$this->setFecdoc($value);
				break;
			case 7:
				$this->setDesdoc($value);
				break;
			case 8:
				$this->setStadoc($value);
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
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftabtipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtab($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVidutil($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClvprm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClvfrn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecdoc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesdoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStadoc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setInfdoc1($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInfdoc2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInfdoc3($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setInfdoc4($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		if ($this->isColumnModified(DftabtipPeer::TIPDOC)) $criteria->add(DftabtipPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(DftabtipPeer::NOMTAB)) $criteria->add(DftabtipPeer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(DftabtipPeer::VIDUTIL)) $criteria->add(DftabtipPeer::VIDUTIL, $this->vidutil);
		if ($this->isColumnModified(DftabtipPeer::CLVPRM)) $criteria->add(DftabtipPeer::CLVPRM, $this->clvprm);
		if ($this->isColumnModified(DftabtipPeer::CLVFRN)) $criteria->add(DftabtipPeer::CLVFRN, $this->clvfrn);
		if ($this->isColumnModified(DftabtipPeer::MONDOC)) $criteria->add(DftabtipPeer::MONDOC, $this->mondoc);
		if ($this->isColumnModified(DftabtipPeer::FECDOC)) $criteria->add(DftabtipPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(DftabtipPeer::DESDOC)) $criteria->add(DftabtipPeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(DftabtipPeer::STADOC)) $criteria->add(DftabtipPeer::STADOC, $this->stadoc);
		if ($this->isColumnModified(DftabtipPeer::INFDOC1)) $criteria->add(DftabtipPeer::INFDOC1, $this->infdoc1);
		if ($this->isColumnModified(DftabtipPeer::INFDOC2)) $criteria->add(DftabtipPeer::INFDOC2, $this->infdoc2);
		if ($this->isColumnModified(DftabtipPeer::INFDOC3)) $criteria->add(DftabtipPeer::INFDOC3, $this->infdoc3);
		if ($this->isColumnModified(DftabtipPeer::INFDOC4)) $criteria->add(DftabtipPeer::INFDOC4, $this->infdoc4);
		if ($this->isColumnModified(DftabtipPeer::ID)) $criteria->add(DftabtipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DftabtipPeer::DATABASE_NAME);

		$criteria->add(DftabtipPeer::ID, $this->id);

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

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setVidutil($this->vidutil);

		$copyObj->setClvprm($this->clvprm);

		$copyObj->setClvfrn($this->clvfrn);

		$copyObj->setMondoc($this->mondoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setDesdoc($this->desdoc);

		$copyObj->setStadoc($this->stadoc);

		$copyObj->setInfdoc1($this->infdoc1);

		$copyObj->setInfdoc2($this->infdoc2);

		$copyObj->setInfdoc3($this->infdoc3);

		$copyObj->setInfdoc4($this->infdoc4);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocs() as $relObj) {
				$copyObj->addDfatendoc($relObj->copy($deepCopy));
			}

			foreach($this->getDfrutadocs() as $relObj) {
				$copyObj->addDfrutadoc($relObj->copy($deepCopy));
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
			self::$peer = new DftabtipPeer();
		}
		return self::$peer;
	}

	
	public function initDfatendocs()
	{
		if ($this->collDfatendocs === null) {
			$this->collDfatendocs = array();
		}
	}

	
	public function getDfatendocs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocs === null) {
			if ($this->isNew()) {
			   $this->collDfatendocs = array();
			} else {

				$criteria->add(DfatendocPeer::ID_DFTABTIP, $this->getId());

				DfatendocPeer::addSelectColumns($criteria);
				$this->collDfatendocs = DfatendocPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocPeer::ID_DFTABTIP, $this->getId());

				DfatendocPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocCriteria) || !$this->lastDfatendocCriteria->equals($criteria)) {
					$this->collDfatendocs = DfatendocPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocCriteria = $criteria;
		return $this->collDfatendocs;
	}

	
	public function countDfatendocs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocPeer::ID_DFTABTIP, $this->getId());

		return DfatendocPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendoc(Dfatendoc $l)
	{
		$this->collDfatendocs[] = $l;
		$l->setDftabtip($this);
	}

	
	public function initDfrutadocs()
	{
		if ($this->collDfrutadocs === null) {
			$this->collDfrutadocs = array();
		}
	}

	
	public function getDfrutadocs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
			   $this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
					$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfrutadocCriteria = $criteria;
		return $this->collDfrutadocs;
	}

	
	public function countDfrutadocs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

		return DfrutadocPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfrutadoc(Dfrutadoc $l)
	{
		$this->collDfrutadocs[] = $l;
		$l->setDftabtip($this);
	}


	
	public function getDfrutadocsJoinAcunidad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
				$this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

				$this->collDfrutadocs = DfrutadocPeer::doSelectJoinAcunidad($criteria, $con);
			}
		} else {
									
			$criteria->add(DfrutadocPeer::ID_DFTABTIP, $this->getId());

			if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
				$this->collDfrutadocs = DfrutadocPeer::doSelectJoinAcunidad($criteria, $con);
			}
		}
		$this->lastDfrutadocCriteria = $criteria;

		return $this->collDfrutadocs;
	}

} 