<?php


abstract class BaseOpdetsolpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refsol;


	
	protected $codpre;


	
	protected $monimp;


	
	protected $staimp;


	
	protected $reford;


	
	protected $refere;


	
	protected $refprc;


	
	protected $refcom;


	
	protected $id;

	
	protected $aOpsolpag;

	
	protected $aOpordpag;

	
	protected $aCpcompro;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefsol()
  {

    return trim($this->refsol);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

  }
  
  public function getStaimp()
  {

    return trim($this->staimp);

  }
  
  public function getReford()
  {

    return trim($this->reford);

  }
  
  public function getRefere()
  {

    return trim($this->refere);

  }
  
  public function getRefprc()
  {

    return trim($this->refprc);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefsol($v)
	{

    if ($this->refsol !== $v) {
        $this->refsol = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::REFSOL;
      }
  
		if ($this->aOpsolpag !== null && $this->aOpsolpag->getRefsol() !== $v) {
			$this->aOpsolpag = null;
		}

	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::CODPRE;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetsolpagPeer::MONIMP;
      }
  
	} 
	
	public function setStaimp($v)
	{

    if ($this->staimp !== $v) {
        $this->staimp = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::STAIMP;
      }
  
	} 
	
	public function setReford($v)
	{

    if ($this->reford !== $v) {
        $this->reford = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::REFORD;
      }
  
		if ($this->aOpordpag !== null && $this->aOpordpag->getNumord() !== $v) {
			$this->aOpordpag = null;
		}

	} 
	
	public function setRefere($v)
	{

    if ($this->refere !== $v) {
        $this->refere = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::REFERE;
      }
  
	} 
	
	public function setRefprc($v)
	{

    if ($this->refprc !== $v) {
        $this->refprc = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::REFPRC;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::REFCOM;
      }
  
		if ($this->aCpcompro !== null && $this->aCpcompro->getRefcom() !== $v) {
			$this->aCpcompro = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpdetsolpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refsol = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->monimp = $rs->getFloat($startcol + 2);

      $this->staimp = $rs->getString($startcol + 3);

      $this->reford = $rs->getString($startcol + 4);

      $this->refere = $rs->getString($startcol + 5);

      $this->refprc = $rs->getString($startcol + 6);

      $this->refcom = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opdetsolpag object", $e);
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
			$con = Propel::getConnection(OpdetsolpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdetsolpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdetsolpagPeer::DATABASE_NAME);
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


												
			if ($this->aOpsolpag !== null) {
				if ($this->aOpsolpag->isModified()) {
					$affectedRows += $this->aOpsolpag->save($con);
				}
				$this->setOpsolpag($this->aOpsolpag);
			}

			if ($this->aOpordpag !== null) {
				if ($this->aOpordpag->isModified()) {
					$affectedRows += $this->aOpordpag->save($con);
				}
				$this->setOpordpag($this->aOpordpag);
			}

			if ($this->aCpcompro !== null) {
				if ($this->aCpcompro->isModified()) {
					$affectedRows += $this->aCpcompro->save($con);
				}
				$this->setCpcompro($this->aCpcompro);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OpdetsolpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpdetsolpagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aOpsolpag !== null) {
				if (!$this->aOpsolpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpsolpag->getValidationFailures());
				}
			}

			if ($this->aOpordpag !== null) {
				if (!$this->aOpordpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpordpag->getValidationFailures());
				}
			}

			if ($this->aCpcompro !== null) {
				if (!$this->aCpcompro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpcompro->getValidationFailures());
				}
			}


			if (($retval = OpdetsolpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetsolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefsol();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMonimp();
				break;
			case 3:
				return $this->getStaimp();
				break;
			case 4:
				return $this->getReford();
				break;
			case 5:
				return $this->getRefere();
				break;
			case 6:
				return $this->getRefprc();
				break;
			case 7:
				return $this->getRefcom();
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
		$keys = OpdetsolpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefsol(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMonimp(),
			$keys[3] => $this->getStaimp(),
			$keys[4] => $this->getReford(),
			$keys[5] => $this->getRefere(),
			$keys[6] => $this->getRefprc(),
			$keys[7] => $this->getRefcom(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetsolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefsol($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMonimp($value);
				break;
			case 3:
				$this->setStaimp($value);
				break;
			case 4:
				$this->setReford($value);
				break;
			case 5:
				$this->setRefere($value);
				break;
			case 6:
				$this->setRefprc($value);
				break;
			case 7:
				$this->setRefcom($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdetsolpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStaimp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setReford($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefere($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdetsolpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdetsolpagPeer::REFSOL)) $criteria->add(OpdetsolpagPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(OpdetsolpagPeer::CODPRE)) $criteria->add(OpdetsolpagPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpdetsolpagPeer::MONIMP)) $criteria->add(OpdetsolpagPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(OpdetsolpagPeer::STAIMP)) $criteria->add(OpdetsolpagPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(OpdetsolpagPeer::REFORD)) $criteria->add(OpdetsolpagPeer::REFORD, $this->reford);
		if ($this->isColumnModified(OpdetsolpagPeer::REFERE)) $criteria->add(OpdetsolpagPeer::REFERE, $this->refere);
		if ($this->isColumnModified(OpdetsolpagPeer::REFPRC)) $criteria->add(OpdetsolpagPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(OpdetsolpagPeer::REFCOM)) $criteria->add(OpdetsolpagPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OpdetsolpagPeer::ID)) $criteria->add(OpdetsolpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdetsolpagPeer::DATABASE_NAME);

		$criteria->add(OpdetsolpagPeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setStaimp($this->staimp);

		$copyObj->setReford($this->reford);

		$copyObj->setRefere($this->refere);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setRefcom($this->refcom);


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
			self::$peer = new OpdetsolpagPeer();
		}
		return self::$peer;
	}

	
	public function setOpsolpag($v)
	{


		if ($v === null) {
			$this->setRefsol(NULL);
		} else {
			$this->setRefsol($v->getRefsol());
		}


		$this->aOpsolpag = $v;
	}


	
	public function getOpsolpag($con = null)
	{
		if ($this->aOpsolpag === null && (($this->refsol !== "" && $this->refsol !== null))) {
						include_once 'lib/model/om/BaseOpsolpagPeer.php';

      $c = new Criteria();
      $c->add(OpsolpagPeer::REFSOL,$this->refsol);
      
			$this->aOpsolpag = OpsolpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpsolpag;
	}

	
	public function setOpordpag($v)
	{


		if ($v === null) {
			$this->setReford(NULL);
		} else {
			$this->setReford($v->getNumord());
		}


		$this->aOpordpag = $v;
	}


	
	public function getOpordpag($con = null)
	{
		if ($this->aOpordpag === null && (($this->reford !== "" && $this->reford !== null))) {
						include_once 'lib/model/om/BaseOpordpagPeer.php';

      $c = new Criteria();
      $c->add(OpordpagPeer::NUMORD,$this->reford);
      
			$this->aOpordpag = OpordpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpordpag;
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

} 