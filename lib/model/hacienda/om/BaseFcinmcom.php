<?php


abstract class BaseFcinmcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroinm;


	
	protected $anoava;


	
	protected $codcom;


	
	protected $valcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroinm()
  {

    return trim($this->nroinm);

  }
  
  public function getAnoava()
  {

    return trim($this->anoava);

  }
  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getValcom($val=false)
  {

    if($val) return number_format($this->valcom,2,',','.');
    else return $this->valcom;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroinm($v)
	{

    if ($this->nroinm !== $v) {
        $this->nroinm = $v;
        $this->modifiedColumns[] = FcinmcomPeer::NROINM;
      }
  
	} 
	
	public function setAnoava($v)
	{

    if ($this->anoava !== $v) {
        $this->anoava = $v;
        $this->modifiedColumns[] = FcinmcomPeer::ANOAVA;
      }
  
	} 
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = $v;
        $this->modifiedColumns[] = FcinmcomPeer::CODCOM;
      }
  
	} 
	
	public function setValcom($v)
	{

    if ($this->valcom !== $v) {
        $this->valcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcinmcomPeer::VALCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcinmcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroinm = $rs->getString($startcol + 0);

      $this->anoava = $rs->getString($startcol + 1);

      $this->codcom = $rs->getString($startcol + 2);

      $this->valcom = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcinmcom object", $e);
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
			$con = Propel::getConnection(FcinmcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcinmcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcinmcomPeer::DATABASE_NAME);
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
					$pk = FcinmcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcinmcomPeer::doUpdate($this, $con);
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


			if (($retval = FcinmcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcinmcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroinm();
				break;
			case 1:
				return $this->getAnoava();
				break;
			case 2:
				return $this->getCodcom();
				break;
			case 3:
				return $this->getValcom();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcinmcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroinm(),
			$keys[1] => $this->getAnoava(),
			$keys[2] => $this->getCodcom(),
			$keys[3] => $this->getValcom(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcinmcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroinm($value);
				break;
			case 1:
				$this->setAnoava($value);
				break;
			case 2:
				$this->setCodcom($value);
				break;
			case 3:
				$this->setValcom($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcinmcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnoava($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcinmcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcinmcomPeer::NROINM)) $criteria->add(FcinmcomPeer::NROINM, $this->nroinm);
		if ($this->isColumnModified(FcinmcomPeer::ANOAVA)) $criteria->add(FcinmcomPeer::ANOAVA, $this->anoava);
		if ($this->isColumnModified(FcinmcomPeer::CODCOM)) $criteria->add(FcinmcomPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(FcinmcomPeer::VALCOM)) $criteria->add(FcinmcomPeer::VALCOM, $this->valcom);
		if ($this->isColumnModified(FcinmcomPeer::ID)) $criteria->add(FcinmcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcinmcomPeer::DATABASE_NAME);

		$criteria->add(FcinmcomPeer::ID, $this->id);

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

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setAnoava($this->anoava);

		$copyObj->setCodcom($this->codcom);

		$copyObj->setValcom($this->valcom);


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
			self::$peer = new FcinmcomPeer();
		}
		return self::$peer;
	}

} 