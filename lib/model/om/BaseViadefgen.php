<?php


abstract class BaseViadefgen extends BaseObject  implements Persistent {



	protected static $peer;



	protected $numsolvia;



	protected $numcalvianac;



	protected $numcalviaint;



	protected $valunitri;



	protected $valdolar;



	protected $numrelgasadi;



	protected $codpar;



	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getNumsolvia()
  {

    return $this->numsolvia;

  }

  public function getNumcalvianac()
  {

    return $this->numcalvianac;

  }

  public function getNumcalviaint()
  {

    return $this->numcalviaint;

  }

  public function getValunitri($val=false)
  {

    if($val) return number_format($this->valunitri,2,',','.');
    else return $this->valunitri;

  }

  public function getValdolar($val=false)
  {

    if($val) return number_format($this->valdolar,2,',','.');
    else return $this->valdolar;

  }

  public function getNumrelgasadi()
  {

    return $this->numrelgasadi;

  }

  public function getCodpar()
  {

    return trim($this->codpar);

  }

  public function getId()
  {

    return $this->id;

  }

	public function setNumsolvia($v)
	{

    if ($this->numsolvia !== $v) {
        $this->numsolvia = $v;
        $this->modifiedColumns[] = ViadefgenPeer::NUMSOLVIA;
      }

	}

	public function setNumcalvianac($v)
	{

    if ($this->numcalvianac !== $v) {
        $this->numcalvianac = $v;
        $this->modifiedColumns[] = ViadefgenPeer::NUMCALVIANAC;
      }

	}

	public function setNumcalviaint($v)
	{

    if ($this->numcalviaint !== $v) {
        $this->numcalviaint = $v;
        $this->modifiedColumns[] = ViadefgenPeer::NUMCALVIAINT;
      }

	}

	public function setValunitri($v)
	{

    if ($this->valunitri !== $v) {
        $this->valunitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadefgenPeer::VALUNITRI;
      }

	}

	public function setValdolar($v)
	{

    if ($this->valdolar !== $v) {
        $this->valdolar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadefgenPeer::VALDOLAR;
      }

	}

	public function setNumrelgasadi($v)
	{

    if ($this->numrelgasadi !== $v) {
        $this->numrelgasadi = $v;
        $this->modifiedColumns[] = ViadefgenPeer::NUMRELGASADI;
      }

	}

	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ViadefgenPeer::CODPAR;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadefgenPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsolvia = $rs->getInt($startcol + 0);

      $this->numcalvianac = $rs->getInt($startcol + 1);

      $this->numcalviaint = $rs->getInt($startcol + 2);

      $this->valunitri = $rs->getFloat($startcol + 3);

      $this->valdolar = $rs->getFloat($startcol + 4);

      $this->numrelgasadi = $rs->getInt($startcol + 5);

      $this->codpar = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8;
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadefgen object", $e);
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
			$con = Propel::getConnection(ViadefgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadefgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadefgenPeer::DATABASE_NAME);
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
					$pk = ViadefgenPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += ViadefgenPeer::doUpdate($this, $con);
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


			if (($retval = ViadefgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsolvia();
				break;
			case 1:
				return $this->getNumcalvianac();
				break;
			case 2:
				return $this->getNumcalviaint();
				break;
			case 3:
				return $this->getValunitri();
				break;
			case 4:
				return $this->getValdolar();
				break;
			case 5:
				return $this->getNumrelgasadi();
				break;
			case 6:
				return $this->getCodpar();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadefgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsolvia(),
			$keys[1] => $this->getNumcalvianac(),
			$keys[2] => $this->getNumcalviaint(),
			$keys[3] => $this->getValunitri(),
			$keys[4] => $this->getValdolar(),
			$keys[5] => $this->getNumrelgasadi(),
			$keys[6] => $this->getCodpar(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsolvia($value);
				break;
			case 1:
				$this->setNumcalvianac($value);
				break;
			case 2:
				$this->setNumcalviaint($value);
				break;
			case 3:
				$this->setValunitri($value);
				break;
			case 4:
				$this->setValdolar($value);
				break;
			case 5:
				$this->setNumrelgasadi($value);
				break;
			case 6:
				$this->setCodpar($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadefgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsolvia($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcalvianac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcalviaint($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValunitri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValdolar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumrelgasadi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(ViadefgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadefgenPeer::NUMSOLVIA)) $criteria->add(ViadefgenPeer::NUMSOLVIA, $this->numsolvia);
		if ($this->isColumnModified(ViadefgenPeer::NUMCALVIANAC)) $criteria->add(ViadefgenPeer::NUMCALVIANAC, $this->numcalvianac);
		if ($this->isColumnModified(ViadefgenPeer::NUMCALVIAINT)) $criteria->add(ViadefgenPeer::NUMCALVIAINT, $this->numcalviaint);
		if ($this->isColumnModified(ViadefgenPeer::VALUNITRI)) $criteria->add(ViadefgenPeer::VALUNITRI, $this->valunitri);
		if ($this->isColumnModified(ViadefgenPeer::VALDOLAR)) $criteria->add(ViadefgenPeer::VALDOLAR, $this->valdolar);
		if ($this->isColumnModified(ViadefgenPeer::NUMRELGASADI)) $criteria->add(ViadefgenPeer::NUMRELGASADI, $this->numrelgasadi);
		if ($this->isColumnModified(ViadefgenPeer::CODPAR)) $criteria->add(ViadefgenPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ViadefgenPeer::ID)) $criteria->add(ViadefgenPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadefgenPeer::DATABASE_NAME);

		$criteria->add(ViadefgenPeer::ID, $this->id);

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

		$copyObj->setNumsolvia($this->numsolvia);

		$copyObj->setNumcalvianac($this->numcalvianac);

		$copyObj->setNumcalviaint($this->numcalviaint);

		$copyObj->setValunitri($this->valunitri);

		$copyObj->setValdolar($this->valdolar);

		$copyObj->setNumrelgasadi($this->numrelgasadi);

		$copyObj->setCodpar($this->codpar);


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
			self::$peer = new ViadefgenPeer();
		}
		return self::$peer;
	}

}