<?php


abstract class BaseCacorrel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $corcom;


	
	protected $corser;


	
	protected $corsol;


	
	protected $correq;


	
	protected $correc;


	
	protected $cordes;


	
	protected $corcot;


	
	protected $cortra;


	
	protected $corent;


	
	protected $corsal;


	
	protected $corpro;


	
	protected $corpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCorcom()
  {

    return $this->corcom;

  }
  
  public function getCorser()
  {

    return $this->corser;

  }
  
  public function getCorsol()
  {

    return $this->corsol;

  }
  
  public function getCorreq()
  {

    return $this->correq;

  }
  
  public function getCorrec()
  {

    return $this->correc;

  }
  
  public function getCordes()
  {

    return $this->cordes;

  }
  
  public function getCorcot()
  {

    return $this->corcot;

  }
  
  public function getCortra()
  {

    return $this->cortra;

  }
  
  public function getCorent()
  {

    return $this->corent;

  }
  
  public function getCorsal()
  {

    return $this->corsal;

  }
  
  public function getCorpro()
  {

    return $this->corpro;

  }
  
  public function getCorpag()
  {

    return $this->corpag;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCorcom($v)
	{

    if ($this->corcom !== $v) {
        $this->corcom = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORCOM;
      }
  
	} 
	
	public function setCorser($v)
	{

    if ($this->corser !== $v) {
        $this->corser = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORSER;
      }
  
	} 
	
	public function setCorsol($v)
	{

    if ($this->corsol !== $v) {
        $this->corsol = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORSOL;
      }
  
	} 
	
	public function setCorreq($v)
	{

    if ($this->correq !== $v) {
        $this->correq = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORREQ;
      }
  
	} 
	
	public function setCorrec($v)
	{

    if ($this->correc !== $v) {
        $this->correc = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORREC;
      }
  
	} 
	
	public function setCordes($v)
	{

    if ($this->cordes !== $v) {
        $this->cordes = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORDES;
      }
  
	} 
	
	public function setCorcot($v)
	{

    if ($this->corcot !== $v) {
        $this->corcot = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORCOT;
      }
  
	} 
	
	public function setCortra($v)
	{

    if ($this->cortra !== $v) {
        $this->cortra = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORTRA;
      }
  
	} 
	
	public function setCorent($v)
	{

    if ($this->corent !== $v) {
        $this->corent = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORENT;
      }
  
	} 
	
	public function setCorsal($v)
	{

    if ($this->corsal !== $v) {
        $this->corsal = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORSAL;
      }
  
	} 
	
	public function setCorpro($v)
	{

    if ($this->corpro !== $v) {
        $this->corpro = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORPRO;
      }
  
	} 
	
	public function setCorpag($v)
	{

    if ($this->corpag !== $v) {
        $this->corpag = $v;
        $this->modifiedColumns[] = CacorrelPeer::CORPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CacorrelPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->corcom = $rs->getInt($startcol + 0);

      $this->corser = $rs->getInt($startcol + 1);

      $this->corsol = $rs->getInt($startcol + 2);

      $this->correq = $rs->getInt($startcol + 3);

      $this->correc = $rs->getInt($startcol + 4);

      $this->cordes = $rs->getInt($startcol + 5);

      $this->corcot = $rs->getInt($startcol + 6);

      $this->cortra = $rs->getInt($startcol + 7);

      $this->corent = $rs->getInt($startcol + 8);

      $this->corsal = $rs->getInt($startcol + 9);

      $this->corpro = $rs->getInt($startcol + 10);

      $this->corpag = $rs->getInt($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cacorrel object", $e);
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
			$con = Propel::getConnection(CacorrelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CacorrelPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CacorrelPeer::DATABASE_NAME);
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
					$pk = CacorrelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CacorrelPeer::doUpdate($this, $con);
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


			if (($retval = CacorrelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacorrelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCorcom();
				break;
			case 1:
				return $this->getCorser();
				break;
			case 2:
				return $this->getCorsol();
				break;
			case 3:
				return $this->getCorreq();
				break;
			case 4:
				return $this->getCorrec();
				break;
			case 5:
				return $this->getCordes();
				break;
			case 6:
				return $this->getCorcot();
				break;
			case 7:
				return $this->getCortra();
				break;
			case 8:
				return $this->getCorent();
				break;
			case 9:
				return $this->getCorsal();
				break;
			case 10:
				return $this->getCorpro();
				break;
			case 11:
				return $this->getCorpag();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacorrelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCorcom(),
			$keys[1] => $this->getCorser(),
			$keys[2] => $this->getCorsol(),
			$keys[3] => $this->getCorreq(),
			$keys[4] => $this->getCorrec(),
			$keys[5] => $this->getCordes(),
			$keys[6] => $this->getCorcot(),
			$keys[7] => $this->getCortra(),
			$keys[8] => $this->getCorent(),
			$keys[9] => $this->getCorsal(),
			$keys[10] => $this->getCorpro(),
			$keys[11] => $this->getCorpag(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CacorrelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCorcom($value);
				break;
			case 1:
				$this->setCorser($value);
				break;
			case 2:
				$this->setCorsol($value);
				break;
			case 3:
				$this->setCorreq($value);
				break;
			case 4:
				$this->setCorrec($value);
				break;
			case 5:
				$this->setCordes($value);
				break;
			case 6:
				$this->setCorcot($value);
				break;
			case 7:
				$this->setCortra($value);
				break;
			case 8:
				$this->setCorent($value);
				break;
			case 9:
				$this->setCorsal($value);
				break;
			case 10:
				$this->setCorpro($value);
				break;
			case 11:
				$this->setCorpag($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CacorrelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCorcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCorrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCordes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCorcot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCortra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCorent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCorsal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCorpro($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCorpag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CacorrelPeer::DATABASE_NAME);

		if ($this->isColumnModified(CacorrelPeer::CORCOM)) $criteria->add(CacorrelPeer::CORCOM, $this->corcom);
		if ($this->isColumnModified(CacorrelPeer::CORSER)) $criteria->add(CacorrelPeer::CORSER, $this->corser);
		if ($this->isColumnModified(CacorrelPeer::CORSOL)) $criteria->add(CacorrelPeer::CORSOL, $this->corsol);
		if ($this->isColumnModified(CacorrelPeer::CORREQ)) $criteria->add(CacorrelPeer::CORREQ, $this->correq);
		if ($this->isColumnModified(CacorrelPeer::CORREC)) $criteria->add(CacorrelPeer::CORREC, $this->correc);
		if ($this->isColumnModified(CacorrelPeer::CORDES)) $criteria->add(CacorrelPeer::CORDES, $this->cordes);
		if ($this->isColumnModified(CacorrelPeer::CORCOT)) $criteria->add(CacorrelPeer::CORCOT, $this->corcot);
		if ($this->isColumnModified(CacorrelPeer::CORTRA)) $criteria->add(CacorrelPeer::CORTRA, $this->cortra);
		if ($this->isColumnModified(CacorrelPeer::CORENT)) $criteria->add(CacorrelPeer::CORENT, $this->corent);
		if ($this->isColumnModified(CacorrelPeer::CORSAL)) $criteria->add(CacorrelPeer::CORSAL, $this->corsal);
		if ($this->isColumnModified(CacorrelPeer::CORPRO)) $criteria->add(CacorrelPeer::CORPRO, $this->corpro);
		if ($this->isColumnModified(CacorrelPeer::CORPAG)) $criteria->add(CacorrelPeer::CORPAG, $this->corpag);
		if ($this->isColumnModified(CacorrelPeer::ID)) $criteria->add(CacorrelPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CacorrelPeer::DATABASE_NAME);

		$criteria->add(CacorrelPeer::ID, $this->id);

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

		$copyObj->setCorcom($this->corcom);

		$copyObj->setCorser($this->corser);

		$copyObj->setCorsol($this->corsol);

		$copyObj->setCorreq($this->correq);

		$copyObj->setCorrec($this->correc);

		$copyObj->setCordes($this->cordes);

		$copyObj->setCorcot($this->corcot);

		$copyObj->setCortra($this->cortra);

		$copyObj->setCorent($this->corent);

		$copyObj->setCorsal($this->corsal);

		$copyObj->setCorpro($this->corpro);

		$copyObj->setCorpag($this->corpag);


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
			self::$peer = new CacorrelPeer();
		}
		return self::$peer;
	}

} 