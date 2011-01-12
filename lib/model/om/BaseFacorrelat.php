<?php


abstract class BaseFacorrelat extends BaseObject  implements Persistent {



	protected static $peer;



	protected $corpre;



	protected $corped;



	protected $corfac;



	protected $cornot;



	protected $cordph;



	protected $cordev;



	protected $coraju;



	protected $codpro;



	protected $proform;



	protected $corfaccont;


	
	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getCorpre($val=false)
  {

    if($val) return number_format($this->corpre,2,',','.');
    else return $this->corpre;

  }

  public function getCorped($val=false)
  {

    if($val) return number_format($this->corped,2,',','.');
    else return $this->corped;

  }

  public function getCorfac($val=false)
  {

    if($val) return number_format($this->corfac,2,',','.');
    else return $this->corfac;

  }

  public function getCornot($val=false)
  {

    if($val) return number_format($this->cornot,2,',','.');
    else return $this->cornot;

  }

  public function getCordph($val=false)
  {

    if($val) return number_format($this->cordph,2,',','.');
    else return $this->cordph;

  }

  public function getCordev($val=false)
  {

    if($val) return number_format($this->cordev,2,',','.');
    else return $this->cordev;

  }

  public function getCoraju($val=false)
  {

    if($val) return number_format($this->coraju,2,',','.');
    else return $this->coraju;

  }

  public function getCodpro($val=false)
  {

    if($val) return number_format($this->codpro,2,',','.');
    else return $this->codpro;

  }

  public function getProform()
  {

    return trim($this->proform);

  }

  public function getCorfaccont($val=false)
  {

    if($val) return number_format($this->corfaccont,2,',','.');
    else return $this->corfaccont;

  }
  
  public function getId()
  {

    return $this->id;

  }

	public function setCorpre($v)
	{

    if ($this->corpre !== $v) {
        $this->corpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORPRE;
      }

	}

	public function setCorped($v)
	{

    if ($this->corped !== $v) {
        $this->corped = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORPED;
      }

	}

	public function setCorfac($v)
	{

    if ($this->corfac !== $v) {
        $this->corfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORFAC;
      }

	}

	public function setCornot($v)
	{

    if ($this->cornot !== $v) {
        $this->cornot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORNOT;
      }

	}

	public function setCordph($v)
	{

    if ($this->cordph !== $v) {
        $this->cordph = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORDPH;
      }

	}

	public function setCordev($v)
	{

    if ($this->cordev !== $v) {
        $this->cordev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORDEV;
      }

	}

	public function setCoraju($v)
	{

    if ($this->coraju !== $v) {
        $this->coraju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORAJU;
      }

	}

	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CODPRO;
      }

	}

	public function setProform($v)
	{

    if ($this->proform !== $v) {
        $this->proform = $v;
        $this->modifiedColumns[] = FacorrelatPeer::PROFORM;
      }

	}

	public function setCorfaccont($v)
	{

    if ($this->corfaccont !== $v) {
        $this->corfaccont = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORFACCONT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacorrelatPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->corpre = $rs->getFloat($startcol + 0);

      $this->corped = $rs->getFloat($startcol + 1);

      $this->corfac = $rs->getFloat($startcol + 2);

      $this->cornot = $rs->getFloat($startcol + 3);

      $this->cordph = $rs->getFloat($startcol + 4);

      $this->cordev = $rs->getFloat($startcol + 5);

      $this->coraju = $rs->getFloat($startcol + 6);

      $this->codpro = $rs->getFloat($startcol + 7);

      $this->proform = $rs->getString($startcol + 8);

      $this->corfaccont = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facorrelat object", $e);
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
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacorrelatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
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
					$pk = FacorrelatPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += FacorrelatPeer::doUpdate($this, $con);
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


			if (($retval = FacorrelatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacorrelatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCorpre();
				break;
			case 1:
				return $this->getCorped();
				break;
			case 2:
				return $this->getCorfac();
				break;
			case 3:
				return $this->getCornot();
				break;
			case 4:
				return $this->getCordph();
				break;
			case 5:
				return $this->getCordev();
				break;
			case 6:
				return $this->getCoraju();
				break;
			case 7:
				return $this->getCodpro();
				break;
			case 8:
				return $this->getProform();
				break;
			case 9:
				return $this->getCorfaccont();
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
		$keys = FacorrelatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCorpre(),
			$keys[1] => $this->getCorped(),
			$keys[2] => $this->getCorfac(),
			$keys[3] => $this->getCornot(),
			$keys[4] => $this->getCordph(),
			$keys[5] => $this->getCordev(),
			$keys[6] => $this->getCoraju(),
			$keys[7] => $this->getCodpro(),
			$keys[8] => $this->getProform(),
			$keys[9] => $this->getCorfaccont(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacorrelatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCorpre($value);
				break;
			case 1:
				$this->setCorped($value);
				break;
			case 2:
				$this->setCorfac($value);
				break;
			case 3:
				$this->setCornot($value);
				break;
			case 4:
				$this->setCordph($value);
				break;
			case 5:
				$this->setCordev($value);
				break;
			case 6:
				$this->setCoraju($value);
				break;
			case 7:
				$this->setCodpro($value);
				break;
			case 8:
				$this->setProform($value);
				break;
			case 9:
				$this->setCorfaccont($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacorrelatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCorpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorped($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCornot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCordph($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCordev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoraju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpro($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProform($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCorfaccont($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacorrelatPeer::CORPRE)) $criteria->add(FacorrelatPeer::CORPRE, $this->corpre);
		if ($this->isColumnModified(FacorrelatPeer::CORPED)) $criteria->add(FacorrelatPeer::CORPED, $this->corped);
		if ($this->isColumnModified(FacorrelatPeer::CORFAC)) $criteria->add(FacorrelatPeer::CORFAC, $this->corfac);
		if ($this->isColumnModified(FacorrelatPeer::CORNOT)) $criteria->add(FacorrelatPeer::CORNOT, $this->cornot);
		if ($this->isColumnModified(FacorrelatPeer::CORDPH)) $criteria->add(FacorrelatPeer::CORDPH, $this->cordph);
		if ($this->isColumnModified(FacorrelatPeer::CORDEV)) $criteria->add(FacorrelatPeer::CORDEV, $this->cordev);
		if ($this->isColumnModified(FacorrelatPeer::CORAJU)) $criteria->add(FacorrelatPeer::CORAJU, $this->coraju);
		if ($this->isColumnModified(FacorrelatPeer::CODPRO)) $criteria->add(FacorrelatPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FacorrelatPeer::PROFORM)) $criteria->add(FacorrelatPeer::PROFORM, $this->proform);
		if ($this->isColumnModified(FacorrelatPeer::CORFACCONT)) $criteria->add(FacorrelatPeer::CORFACCONT, $this->corfaccont);
		if ($this->isColumnModified(FacorrelatPeer::ID)) $criteria->add(FacorrelatPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		$criteria->add(FacorrelatPeer::ID, $this->id);

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

		$copyObj->setCorpre($this->corpre);

		$copyObj->setCorped($this->corped);

		$copyObj->setCorfac($this->corfac);

		$copyObj->setCornot($this->cornot);

		$copyObj->setCordph($this->cordph);

		$copyObj->setCordev($this->cordev);

		$copyObj->setCoraju($this->coraju);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setProform($this->proform);

		$copyObj->setCorfaccont($this->corfaccont);


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
			self::$peer = new FacorrelatPeer();
		}
		return self::$peer;
	}

}
