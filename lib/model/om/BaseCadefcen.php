<?php


abstract class BaseCadefcen extends BaseObject  implements Persistent {



	protected static $peer;



	protected $codcen;



	protected $descen;



	protected $dircen;



	protected $codpai;



	protected $nomemp;



	protected $nomcar;



	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getCodcen()
  {

    return trim($this->codcen);

  }

  public function getDescen()
  {

    return trim($this->descen);

  }

  public function getDircen()
  {

    return trim($this->dircen);

  }

  public function getCodpai()
  {

    return trim($this->codpai);

  }

  public function getNomemp()
  {

    return trim($this->nomemp);

  }

  public function getNomcar()
  {

    return trim($this->nomcar);

  }

  public function getId()
  {

    return $this->id;

  }

	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = CadefcenPeer::CODCEN;
      }

	}

	public function setDescen($v)
	{

    if ($this->descen !== $v) {
        $this->descen = $v;
        $this->modifiedColumns[] = CadefcenPeer::DESCEN;
      }

	}

	public function setDircen($v)
	{

    if ($this->dircen !== $v) {
        $this->dircen = $v;
        $this->modifiedColumns[] = CadefcenPeer::DIRCEN;
      }

	}

	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = CadefcenPeer::CODPAI;
      }

	}

	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = CadefcenPeer::NOMEMP;
      }

	}

	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = CadefcenPeer::NOMCAR;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefcenPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcen = $rs->getString($startcol + 0);

      $this->descen = $rs->getString($startcol + 1);

      $this->dircen = $rs->getString($startcol + 2);

      $this->codpai = $rs->getString($startcol + 3);

      $this->nomemp = $rs->getString($startcol + 4);

      $this->nomcar = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7;
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefcen object", $e);
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
			$con = Propel::getConnection(CadefcenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefcenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefcenPeer::DATABASE_NAME);
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
					$pk = CadefcenPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += CadefcenPeer::doUpdate($this, $con);
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


			if (($retval = CadefcenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefcenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcen();
				break;
			case 1:
				return $this->getDescen();
				break;
			case 2:
				return $this->getDircen();
				break;
			case 3:
				return $this->getCodpai();
				break;
			case 4:
				return $this->getNomemp();
				break;
			case 5:
				return $this->getNomcar();
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
		$keys = CadefcenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcen(),
			$keys[1] => $this->getDescen(),
			$keys[2] => $this->getDircen(),
			$keys[3] => $this->getCodpai(),
			$keys[4] => $this->getNomemp(),
			$keys[5] => $this->getNomcar(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefcenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcen($value);
				break;
			case 1:
				$this->setDescen($value);
				break;
			case 2:
				$this->setDircen($value);
				break;
			case 3:
				$this->setCodpai($value);
				break;
			case 4:
				$this->setNomemp($value);
				break;
			case 5:
				$this->setNomcar($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefcenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcen($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescen($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDircen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpai($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(CadefcenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefcenPeer::CODCEN)) $criteria->add(CadefcenPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(CadefcenPeer::DESCEN)) $criteria->add(CadefcenPeer::DESCEN, $this->descen);
		if ($this->isColumnModified(CadefcenPeer::DIRCEN)) $criteria->add(CadefcenPeer::DIRCEN, $this->dircen);
		if ($this->isColumnModified(CadefcenPeer::CODPAI)) $criteria->add(CadefcenPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(CadefcenPeer::NOMEMP)) $criteria->add(CadefcenPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(CadefcenPeer::NOMCAR)) $criteria->add(CadefcenPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(CadefcenPeer::ID)) $criteria->add(CadefcenPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefcenPeer::DATABASE_NAME);

		$criteria->add(CadefcenPeer::ID, $this->id);

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

		$copyObj->setCodcen($this->codcen);

		$copyObj->setDescen($this->descen);

		$copyObj->setDircen($this->dircen);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcar($this->nomcar);


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
			self::$peer = new CadefcenPeer();
		}
		return self::$peer;
	}

}