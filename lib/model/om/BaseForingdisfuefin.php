<?php


abstract class BaseForingdisfuefin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codparing;


	
	protected $codfin;


	
	protected $montoing;


	
	protected $codcat;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodparing()
  {

    return trim($this->codparing);

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getMontoing($val=false)
  {

    if($val) return number_format($this->montoing,2,',','.');
    else return $this->montoing;

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodparing($v)
	{

    if ($this->codparing !== $v) {
        $this->codparing = $v;
        $this->modifiedColumns[] = ForingdisfuefinPeer::CODPARING;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = ForingdisfuefinPeer::CODFIN;
      }
  
	} 
	
	public function setMontoing($v)
	{

    if ($this->montoing !== $v) {
        $this->montoing = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForingdisfuefinPeer::MONTOING;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForingdisfuefinPeer::CODCAT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForingdisfuefinPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codparing = $rs->getString($startcol + 0);

      $this->codfin = $rs->getString($startcol + 1);

      $this->montoing = $rs->getFloat($startcol + 2);

      $this->codcat = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Foringdisfuefin object", $e);
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
			$con = Propel::getConnection(ForingdisfuefinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForingdisfuefinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForingdisfuefinPeer::DATABASE_NAME);
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
					$pk = ForingdisfuefinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForingdisfuefinPeer::doUpdate($this, $con);
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


			if (($retval = ForingdisfuefinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForingdisfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodparing();
				break;
			case 1:
				return $this->getCodfin();
				break;
			case 2:
				return $this->getMontoing();
				break;
			case 3:
				return $this->getCodcat();
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
		$keys = ForingdisfuefinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodparing(),
			$keys[1] => $this->getCodfin(),
			$keys[2] => $this->getMontoing(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForingdisfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodparing($value);
				break;
			case 1:
				$this->setCodfin($value);
				break;
			case 2:
				$this->setMontoing($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForingdisfuefinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodparing($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfin($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMontoing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForingdisfuefinPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForingdisfuefinPeer::CODPARING)) $criteria->add(ForingdisfuefinPeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(ForingdisfuefinPeer::CODFIN)) $criteria->add(ForingdisfuefinPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(ForingdisfuefinPeer::MONTOING)) $criteria->add(ForingdisfuefinPeer::MONTOING, $this->montoing);
		if ($this->isColumnModified(ForingdisfuefinPeer::CODCAT)) $criteria->add(ForingdisfuefinPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForingdisfuefinPeer::ID)) $criteria->add(ForingdisfuefinPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForingdisfuefinPeer::DATABASE_NAME);

		$criteria->add(ForingdisfuefinPeer::ID, $this->id);

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

		$copyObj->setCodparing($this->codparing);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setMontoing($this->montoing);

		$copyObj->setCodcat($this->codcat);


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
			self::$peer = new ForingdisfuefinPeer();
		}
		return self::$peer;
	}

} 
