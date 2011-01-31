<?php


abstract class BaseNpvacdiasbonovac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $perini;


	
	protected $perfin;


	
	protected $rangodesde;


	
	protected $rangohasta;


	
	protected $diasbonovac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getPerini()
  {

    return trim($this->perini);

  }
  
  public function getPerfin()
  {

    return trim($this->perfin);

  }
  
  public function getRangodesde($val=false)
  {

    if($val) return number_format($this->rangodesde,2,',','.');
    else return $this->rangodesde;

  }
  
  public function getRangohasta($val=false)
  {

    if($val) return number_format($this->rangohasta,2,',','.');
    else return $this->rangohasta;

  }
  
  public function getDiasbonovac($val=false)
  {

    if($val) return number_format($this->diasbonovac,2,',','.');
    else return $this->diasbonovac;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::CODNOM;
      }
  
	} 
	
	public function setPerini($v)
	{

    if ($this->perini !== $v) {
        $this->perini = $v;
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::PERINI;
      }
  
	} 
	
	public function setPerfin($v)
	{

    if ($this->perfin !== $v) {
        $this->perfin = $v;
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::PERFIN;
      }
  
	} 
	
	public function setRangodesde($v)
	{

    if ($this->rangodesde !== $v) {
        $this->rangodesde = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::RANGODESDE;
      }
  
	} 
	
	public function setRangohasta($v)
	{

    if ($this->rangohasta !== $v) {
        $this->rangohasta = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::RANGOHASTA;
      }
  
	} 
	
	public function setDiasbonovac($v)
	{

    if ($this->diasbonovac !== $v) {
        $this->diasbonovac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::DIASBONOVAC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacdiasbonovacPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->perini = $rs->getString($startcol + 1);

      $this->perfin = $rs->getString($startcol + 2);

      $this->rangodesde = $rs->getFloat($startcol + 3);

      $this->rangohasta = $rs->getFloat($startcol + 4);

      $this->diasbonovac = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacdiasbonovac object", $e);
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
			$con = Propel::getConnection(NpvacdiasbonovacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacdiasbonovacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacdiasbonovacPeer::DATABASE_NAME);
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
					$pk = NpvacdiasbonovacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacdiasbonovacPeer::doUpdate($this, $con);
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


			if (($retval = NpvacdiasbonovacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdiasbonovacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getPerini();
				break;
			case 2:
				return $this->getPerfin();
				break;
			case 3:
				return $this->getRangodesde();
				break;
			case 4:
				return $this->getRangohasta();
				break;
			case 5:
				return $this->getDiasbonovac();
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
		$keys = NpvacdiasbonovacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getPerini(),
			$keys[2] => $this->getPerfin(),
			$keys[3] => $this->getRangodesde(),
			$keys[4] => $this->getRangohasta(),
			$keys[5] => $this->getDiasbonovac(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdiasbonovacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setPerini($value);
				break;
			case 2:
				$this->setPerfin($value);
				break;
			case 3:
				$this->setRangodesde($value);
				break;
			case 4:
				$this->setRangohasta($value);
				break;
			case 5:
				$this->setDiasbonovac($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacdiasbonovacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRangodesde($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRangohasta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiasbonovac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacdiasbonovacPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacdiasbonovacPeer::CODNOM)) $criteria->add(NpvacdiasbonovacPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpvacdiasbonovacPeer::PERINI)) $criteria->add(NpvacdiasbonovacPeer::PERINI, $this->perini);
		if ($this->isColumnModified(NpvacdiasbonovacPeer::PERFIN)) $criteria->add(NpvacdiasbonovacPeer::PERFIN, $this->perfin);
		if ($this->isColumnModified(NpvacdiasbonovacPeer::RANGODESDE)) $criteria->add(NpvacdiasbonovacPeer::RANGODESDE, $this->rangodesde);
		if ($this->isColumnModified(NpvacdiasbonovacPeer::RANGOHASTA)) $criteria->add(NpvacdiasbonovacPeer::RANGOHASTA, $this->rangohasta);
		if ($this->isColumnModified(NpvacdiasbonovacPeer::DIASBONOVAC)) $criteria->add(NpvacdiasbonovacPeer::DIASBONOVAC, $this->diasbonovac);
		if ($this->isColumnModified(NpvacdiasbonovacPeer::ID)) $criteria->add(NpvacdiasbonovacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacdiasbonovacPeer::DATABASE_NAME);

		$criteria->add(NpvacdiasbonovacPeer::ID, $this->id);

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

		$copyObj->setPerini($this->perini);

		$copyObj->setPerfin($this->perfin);

		$copyObj->setRangodesde($this->rangodesde);

		$copyObj->setRangohasta($this->rangohasta);

		$copyObj->setDiasbonovac($this->diasbonovac);


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
			self::$peer = new NpvacdiasbonovacPeer();
		}
		return self::$peer;
	}

} 