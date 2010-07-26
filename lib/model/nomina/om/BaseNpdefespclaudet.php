<?php


abstract class BaseNpdefespclaudet extends BaseObject  implements Persistent {



	protected static $peer;



	protected $codnom;



	protected $descripclau;



	protected $codpar;



	protected $codret;



	protected $totret;



	protected $numdiaant;



	protected $poranoant;



	protected $apartirmes;



	protected $pormesant;



	protected $tipsaldiaant;



	protected $admpub;



	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getCodnom()
  {

    return trim($this->codnom);

  }

  public function getDescripclau()
  {

    return trim($this->descripclau);

  }

  public function getCodpar()
  {

    return trim($this->codpar);

  }

  public function getCodret()
  {

    return trim($this->codret);

  }

  public function getTotret()
  {

    return trim($this->totret);

  }

  public function getNumdiaant($val=false)
  {

    if($val) return number_format($this->numdiaant,2,',','.');
    else return $this->numdiaant;

  }

  public function getPoranoant()
  {

    return trim($this->poranoant);

  }

  public function getApartirmes()
  {

    return $this->apartirmes;

  }

  public function getPormesant()
  {

    return trim($this->pormesant);

  }

  public function getTipsaldiaant()
  {

    return trim($this->tipsaldiaant);

  }

  public function getAdmpub()
  {

    return trim($this->admpub);

  }

  public function getId()
  {

    return $this->id;

  }

	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::CODNOM;
      }

	}

	public function setDescripclau($v)
	{

    if ($this->descripclau !== $v) {
        $this->descripclau = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::DESCRIPCLAU;
      }

	}

	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::CODPAR;
      }

	}

	public function setCodret($v)
	{

    if ($this->codret !== $v) {
        $this->codret = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::CODRET;
      }

	}

	public function setTotret($v)
	{

    if ($this->totret !== $v) {
        $this->totret = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::TOTRET;
      }

	}

	public function setNumdiaant($v)
	{

    if ($this->numdiaant !== $v) {
        $this->numdiaant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefespclaudetPeer::NUMDIAANT;
      }

	}

	public function setPoranoant($v)
	{

    if ($this->poranoant !== $v) {
        $this->poranoant = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::PORANOANT;
      }

	}

	public function setApartirmes($v)
	{

    if ($this->apartirmes !== $v) {
        $this->apartirmes = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::APARTIRMES;
      }

	}

	public function setPormesant($v)
	{

    if ($this->pormesant !== $v) {
        $this->pormesant = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::PORMESANT;
      }

	}

	public function setTipsaldiaant($v)
	{

    if ($this->tipsaldiaant !== $v) {
        $this->tipsaldiaant = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::TIPSALDIAANT;
      }

	}

	public function setAdmpub($v)
	{

    if ($this->admpub !== $v) {
        $this->admpub = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::ADMPUB;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefespclaudetPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->descripclau = $rs->getString($startcol + 1);

      $this->codpar = $rs->getString($startcol + 2);

      $this->codret = $rs->getString($startcol + 3);

      $this->totret = $rs->getString($startcol + 4);

      $this->numdiaant = $rs->getFloat($startcol + 5);

      $this->poranoant = $rs->getString($startcol + 6);

      $this->apartirmes = $rs->getInt($startcol + 7);

      $this->pormesant = $rs->getString($startcol + 8);

      $this->tipsaldiaant = $rs->getString($startcol + 9);

      $this->admpub = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12;
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefespclaudet object", $e);
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
			$con = Propel::getConnection(NpdefespclaudetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefespclaudetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefespclaudetPeer::DATABASE_NAME);
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
					$pk = NpdefespclaudetPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += NpdefespclaudetPeer::doUpdate($this, $con);
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


			if (($retval = NpdefespclaudetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefespclaudetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getDescripclau();
				break;
			case 2:
				return $this->getCodpar();
				break;
			case 3:
				return $this->getCodret();
				break;
			case 4:
				return $this->getTotret();
				break;
			case 5:
				return $this->getNumdiaant();
				break;
			case 6:
				return $this->getPoranoant();
				break;
			case 7:
				return $this->getApartirmes();
				break;
			case 8:
				return $this->getPormesant();
				break;
			case 9:
				return $this->getTipsaldiaant();
				break;
			case 10:
				return $this->getAdmpub();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefespclaudetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getDescripclau(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getCodret(),
			$keys[4] => $this->getTotret(),
			$keys[5] => $this->getNumdiaant(),
			$keys[6] => $this->getPoranoant(),
			$keys[7] => $this->getApartirmes(),
			$keys[8] => $this->getPormesant(),
			$keys[9] => $this->getTipsaldiaant(),
			$keys[10] => $this->getAdmpub(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefespclaudetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setDescripclau($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setCodret($value);
				break;
			case 4:
				$this->setTotret($value);
				break;
			case 5:
				$this->setNumdiaant($value);
				break;
			case 6:
				$this->setPoranoant($value);
				break;
			case 7:
				$this->setApartirmes($value);
				break;
			case 8:
				$this->setPormesant($value);
				break;
			case 9:
				$this->setTipsaldiaant($value);
				break;
			case 10:
				$this->setAdmpub($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefespclaudetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripclau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodret($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumdiaant($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPoranoant($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setApartirmes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPormesant($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipsaldiaant($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAdmpub($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefespclaudetPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefespclaudetPeer::CODNOM)) $criteria->add(NpdefespclaudetPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpdefespclaudetPeer::DESCRIPCLAU)) $criteria->add(NpdefespclaudetPeer::DESCRIPCLAU, $this->descripclau);
		if ($this->isColumnModified(NpdefespclaudetPeer::CODPAR)) $criteria->add(NpdefespclaudetPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NpdefespclaudetPeer::CODRET)) $criteria->add(NpdefespclaudetPeer::CODRET, $this->codret);
		if ($this->isColumnModified(NpdefespclaudetPeer::TOTRET)) $criteria->add(NpdefespclaudetPeer::TOTRET, $this->totret);
		if ($this->isColumnModified(NpdefespclaudetPeer::NUMDIAANT)) $criteria->add(NpdefespclaudetPeer::NUMDIAANT, $this->numdiaant);
		if ($this->isColumnModified(NpdefespclaudetPeer::PORANOANT)) $criteria->add(NpdefespclaudetPeer::PORANOANT, $this->poranoant);
		if ($this->isColumnModified(NpdefespclaudetPeer::APARTIRMES)) $criteria->add(NpdefespclaudetPeer::APARTIRMES, $this->apartirmes);
		if ($this->isColumnModified(NpdefespclaudetPeer::PORMESANT)) $criteria->add(NpdefespclaudetPeer::PORMESANT, $this->pormesant);
		if ($this->isColumnModified(NpdefespclaudetPeer::TIPSALDIAANT)) $criteria->add(NpdefespclaudetPeer::TIPSALDIAANT, $this->tipsaldiaant);
		if ($this->isColumnModified(NpdefespclaudetPeer::ADMPUB)) $criteria->add(NpdefespclaudetPeer::ADMPUB, $this->admpub);
		if ($this->isColumnModified(NpdefespclaudetPeer::ID)) $criteria->add(NpdefespclaudetPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefespclaudetPeer::DATABASE_NAME);

		$criteria->add(NpdefespclaudetPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setDescripclau($this->descripclau);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodret($this->codret);

		$copyObj->setTotret($this->totret);

		$copyObj->setNumdiaant($this->numdiaant);

		$copyObj->setPoranoant($this->poranoant);

		$copyObj->setApartirmes($this->apartirmes);

		$copyObj->setPormesant($this->pormesant);

		$copyObj->setTipsaldiaant($this->tipsaldiaant);

		$copyObj->setAdmpub($this->admpub);


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
			self::$peer = new NpdefespclaudetPeer();
		}
		return self::$peer;
	}

}