<?php


abstract class BaseCiniveles extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catpar;


	
	protected $consec;


	
	protected $nomabr;


	
	protected $nomext;


	
	protected $lonniv;


	
	protected $staniv;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatpar()
  {

    return trim($this->catpar);

  }
  
  public function getConsec($val=false)
  {

    if($val) return number_format($this->consec,2,',','.');
    else return $this->consec;

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getNomext()
  {

    return trim($this->nomext);

  }
  
  public function getLonniv($val=false)
  {

    if($val) return number_format($this->lonniv,2,',','.');
    else return $this->lonniv;

  }
  
  public function getStaniv()
  {

    return trim($this->staniv);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatpar($v)
	{

    if ($this->catpar !== $v) {
        $this->catpar = $v;
        $this->modifiedColumns[] = CinivelesPeer::CATPAR;
      }
  
	} 
	
	public function setConsec($v)
	{

    if ($this->consec !== $v) {
        $this->consec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CinivelesPeer::CONSEC;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = CinivelesPeer::NOMABR;
      }
  
	} 
	
	public function setNomext($v)
	{

    if ($this->nomext !== $v) {
        $this->nomext = $v;
        $this->modifiedColumns[] = CinivelesPeer::NOMEXT;
      }
  
	} 
	
	public function setLonniv($v)
	{

    if ($this->lonniv !== $v) {
        $this->lonniv = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CinivelesPeer::LONNIV;
      }
  
	} 
	
	public function setStaniv($v)
	{

    if ($this->staniv !== $v) {
        $this->staniv = $v;
        $this->modifiedColumns[] = CinivelesPeer::STANIV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CinivelesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catpar = $rs->getString($startcol + 0);

      $this->consec = $rs->getFloat($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->nomext = $rs->getString($startcol + 3);

      $this->lonniv = $rs->getFloat($startcol + 4);

      $this->staniv = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ciniveles object", $e);
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
			$con = Propel::getConnection(CinivelesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CinivelesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CinivelesPeer::DATABASE_NAME);
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
					$pk = CinivelesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CinivelesPeer::doUpdate($this, $con);
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


			if (($retval = CinivelesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CinivelesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatpar();
				break;
			case 1:
				return $this->getConsec();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getNomext();
				break;
			case 4:
				return $this->getLonniv();
				break;
			case 5:
				return $this->getStaniv();
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
		$keys = CinivelesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatpar(),
			$keys[1] => $this->getConsec(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getNomext(),
			$keys[4] => $this->getLonniv(),
			$keys[5] => $this->getStaniv(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CinivelesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatpar($value);
				break;
			case 1:
				$this->setConsec($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setNomext($value);
				break;
			case 4:
				$this->setLonniv($value);
				break;
			case 5:
				$this->setStaniv($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CinivelesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setConsec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomext($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLonniv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaniv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CinivelesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CinivelesPeer::CATPAR)) $criteria->add(CinivelesPeer::CATPAR, $this->catpar);
		if ($this->isColumnModified(CinivelesPeer::CONSEC)) $criteria->add(CinivelesPeer::CONSEC, $this->consec);
		if ($this->isColumnModified(CinivelesPeer::NOMABR)) $criteria->add(CinivelesPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CinivelesPeer::NOMEXT)) $criteria->add(CinivelesPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CinivelesPeer::LONNIV)) $criteria->add(CinivelesPeer::LONNIV, $this->lonniv);
		if ($this->isColumnModified(CinivelesPeer::STANIV)) $criteria->add(CinivelesPeer::STANIV, $this->staniv);
		if ($this->isColumnModified(CinivelesPeer::ID)) $criteria->add(CinivelesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CinivelesPeer::DATABASE_NAME);

		$criteria->add(CinivelesPeer::ID, $this->id);

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

		$copyObj->setCatpar($this->catpar);

		$copyObj->setConsec($this->consec);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setNomext($this->nomext);

		$copyObj->setLonniv($this->lonniv);

		$copyObj->setStaniv($this->staniv);


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
			self::$peer = new CinivelesPeer();
		}
		return self::$peer;
	}

} 