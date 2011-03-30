<?php


abstract class BaseLirecomendet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrecofe;


	
	protected $codpro;


	
	protected $punleg;


	
	protected $puntec;


	
	protected $punfin;


	
	protected $punfia;


	
	protected $puntipemp;


	
	protected $punvan;


	
	protected $punmin;


	
	protected $puntot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumrecofe()
  {

    return trim($this->numrecofe);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getPunleg($val=false)
  {

    if($val) return number_format($this->punleg,2,',','.');
    else return $this->punleg;

  }
  
  public function getPuntec($val=false)
  {

    if($val) return number_format($this->puntec,2,',','.');
    else return $this->puntec;

  }
  
  public function getPunfin($val=false)
  {

    if($val) return number_format($this->punfin,2,',','.');
    else return $this->punfin;

  }
  
  public function getPunfia($val=false)
  {

    if($val) return number_format($this->punfia,2,',','.');
    else return $this->punfia;

  }
  
  public function getPuntipemp($val=false)
  {

    if($val) return number_format($this->puntipemp,2,',','.');
    else return $this->puntipemp;

  }
  
  public function getPunvan($val=false)
  {

    if($val) return number_format($this->punvan,2,',','.');
    else return $this->punvan;

  }
  
  public function getPunmin($val=false)
  {

    if($val) return number_format($this->punmin,2,',','.');
    else return $this->punmin;

  }
  
  public function getPuntot($val=false)
  {

    if($val) return number_format($this->puntot,2,',','.');
    else return $this->puntot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumrecofe($v)
	{

    if ($this->numrecofe !== $v) {
        $this->numrecofe = $v;
        $this->modifiedColumns[] = LirecomendetPeer::NUMRECOFE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LirecomendetPeer::CODPRO;
      }
  
	} 
	
	public function setPunleg($v)
	{

    if ($this->punleg !== $v) {
        $this->punleg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNLEG;
      }
  
	} 
	
	public function setPuntec($v)
	{

    if ($this->puntec !== $v) {
        $this->puntec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNTEC;
      }
  
	} 
	
	public function setPunfin($v)
	{

    if ($this->punfin !== $v) {
        $this->punfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNFIN;
      }
  
	} 
	
	public function setPunfia($v)
	{

    if ($this->punfia !== $v) {
        $this->punfia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNFIA;
      }
  
	} 
	
	public function setPuntipemp($v)
	{

    if ($this->puntipemp !== $v) {
        $this->puntipemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNTIPEMP;
      }
  
	} 
	
	public function setPunvan($v)
	{

    if ($this->punvan !== $v) {
        $this->punvan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNVAN;
      }
  
	} 
	
	public function setPunmin($v)
	{

    if ($this->punmin !== $v) {
        $this->punmin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNMIN;
      }
  
	} 
	
	public function setPuntot($v)
	{

    if ($this->puntot !== $v) {
        $this->puntot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LirecomendetPeer::PUNTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LirecomendetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numrecofe = $rs->getString($startcol + 0);

      $this->codpro = $rs->getString($startcol + 1);

      $this->punleg = $rs->getFloat($startcol + 2);

      $this->puntec = $rs->getFloat($startcol + 3);

      $this->punfin = $rs->getFloat($startcol + 4);

      $this->punfia = $rs->getFloat($startcol + 5);

      $this->puntipemp = $rs->getFloat($startcol + 6);

      $this->punvan = $rs->getFloat($startcol + 7);

      $this->punmin = $rs->getFloat($startcol + 8);

      $this->puntot = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lirecomendet object", $e);
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
			$con = Propel::getConnection(LirecomendetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LirecomendetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LirecomendetPeer::DATABASE_NAME);
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
					$pk = LirecomendetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LirecomendetPeer::doUpdate($this, $con);
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


			if (($retval = LirecomendetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LirecomendetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrecofe();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getPunleg();
				break;
			case 3:
				return $this->getPuntec();
				break;
			case 4:
				return $this->getPunfin();
				break;
			case 5:
				return $this->getPunfia();
				break;
			case 6:
				return $this->getPuntipemp();
				break;
			case 7:
				return $this->getPunvan();
				break;
			case 8:
				return $this->getPunmin();
				break;
			case 9:
				return $this->getPuntot();
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
		$keys = LirecomendetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrecofe(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getPunleg(),
			$keys[3] => $this->getPuntec(),
			$keys[4] => $this->getPunfin(),
			$keys[5] => $this->getPunfia(),
			$keys[6] => $this->getPuntipemp(),
			$keys[7] => $this->getPunvan(),
			$keys[8] => $this->getPunmin(),
			$keys[9] => $this->getPuntot(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LirecomendetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrecofe($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setPunleg($value);
				break;
			case 3:
				$this->setPuntec($value);
				break;
			case 4:
				$this->setPunfin($value);
				break;
			case 5:
				$this->setPunfia($value);
				break;
			case 6:
				$this->setPuntipemp($value);
				break;
			case 7:
				$this->setPunvan($value);
				break;
			case 8:
				$this->setPunmin($value);
				break;
			case 9:
				$this->setPuntot($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LirecomendetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrecofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPunleg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPuntec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPunfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPunfia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPuntipemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPunvan($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPunmin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPuntot($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LirecomendetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LirecomendetPeer::NUMRECOFE)) $criteria->add(LirecomendetPeer::NUMRECOFE, $this->numrecofe);
		if ($this->isColumnModified(LirecomendetPeer::CODPRO)) $criteria->add(LirecomendetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LirecomendetPeer::PUNLEG)) $criteria->add(LirecomendetPeer::PUNLEG, $this->punleg);
		if ($this->isColumnModified(LirecomendetPeer::PUNTEC)) $criteria->add(LirecomendetPeer::PUNTEC, $this->puntec);
		if ($this->isColumnModified(LirecomendetPeer::PUNFIN)) $criteria->add(LirecomendetPeer::PUNFIN, $this->punfin);
		if ($this->isColumnModified(LirecomendetPeer::PUNFIA)) $criteria->add(LirecomendetPeer::PUNFIA, $this->punfia);
		if ($this->isColumnModified(LirecomendetPeer::PUNTIPEMP)) $criteria->add(LirecomendetPeer::PUNTIPEMP, $this->puntipemp);
		if ($this->isColumnModified(LirecomendetPeer::PUNVAN)) $criteria->add(LirecomendetPeer::PUNVAN, $this->punvan);
		if ($this->isColumnModified(LirecomendetPeer::PUNMIN)) $criteria->add(LirecomendetPeer::PUNMIN, $this->punmin);
		if ($this->isColumnModified(LirecomendetPeer::PUNTOT)) $criteria->add(LirecomendetPeer::PUNTOT, $this->puntot);
		if ($this->isColumnModified(LirecomendetPeer::ID)) $criteria->add(LirecomendetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LirecomendetPeer::DATABASE_NAME);

		$criteria->add(LirecomendetPeer::ID, $this->id);

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

		$copyObj->setNumrecofe($this->numrecofe);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setPunleg($this->punleg);

		$copyObj->setPuntec($this->puntec);

		$copyObj->setPunfin($this->punfin);

		$copyObj->setPunfia($this->punfia);

		$copyObj->setPuntipemp($this->puntipemp);

		$copyObj->setPunvan($this->punvan);

		$copyObj->setPunmin($this->punmin);

		$copyObj->setPuntot($this->puntot);


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
			self::$peer = new LirecomendetPeer();
		}
		return self::$peer;
	}

} 