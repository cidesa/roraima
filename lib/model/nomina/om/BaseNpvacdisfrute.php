<?php


abstract class BaseNpvacdisfrute extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $perini;


	
	protected $perfin;


	
	protected $diasdisfutar;


	
	protected $diasdisfrutados;


	
	protected $diasbonovac;


	
	protected $diasbonovacpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getPerini()
  {

    return trim($this->perini);

  }
  
  public function getPerfin()
  {

    return trim($this->perfin);

  }
  
  public function getDiasdisfutar($val=false)
  {

    if($val) return number_format($this->diasdisfutar,2,',','.');
    else return $this->diasdisfutar;

  }
  
  public function getDiasdisfrutados($val=false)
  {

    if($val) return number_format($this->diasdisfrutados,2,',','.');
    else return $this->diasdisfrutados;

  }
  
  public function getDiasbonovac($val=false)
  {

    if($val) return number_format($this->diasbonovac,2,',','.');
    else return $this->diasbonovac;

  }
  
  public function getDiasbonovacpag($val=false)
  {

    if($val) return number_format($this->diasbonovacpag,2,',','.');
    else return $this->diasbonovacpag;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacdisfrutePeer::CODEMP;
      }
  
	} 
	
	public function setPerini($v)
	{

    if ($this->perini !== $v) {
        $this->perini = $v;
        $this->modifiedColumns[] = NpvacdisfrutePeer::PERINI;
      }
  
	} 
	
	public function setPerfin($v)
	{

    if ($this->perfin !== $v) {
        $this->perfin = $v;
        $this->modifiedColumns[] = NpvacdisfrutePeer::PERFIN;
      }
  
	} 
	
	public function setDiasdisfutar($v)
	{

    if ($this->diasdisfutar !== $v) {
        $this->diasdisfutar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdisfrutePeer::DIASDISFUTAR;
      }
  
	} 
	
	public function setDiasdisfrutados($v)
	{

    if ($this->diasdisfrutados !== $v) {
        $this->diasdisfrutados = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdisfrutePeer::DIASDISFRUTADOS;
      }
  
	} 
	
	public function setDiasbonovac($v)
	{

    if ($this->diasbonovac !== $v) {
        $this->diasbonovac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdisfrutePeer::DIASBONOVAC;
      }
  
	} 
	
	public function setDiasbonovacpag($v)
	{

    if ($this->diasbonovacpag !== $v) {
        $this->diasbonovacpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacdisfrutePeer::DIASBONOVACPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacdisfrutePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->perini = $rs->getString($startcol + 1);

      $this->perfin = $rs->getString($startcol + 2);

      $this->diasdisfutar = $rs->getFloat($startcol + 3);

      $this->diasdisfrutados = $rs->getFloat($startcol + 4);

      $this->diasbonovac = $rs->getFloat($startcol + 5);

      $this->diasbonovacpag = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacdisfrute object", $e);
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
			$con = Propel::getConnection(NpvacdisfrutePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacdisfrutePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacdisfrutePeer::DATABASE_NAME);
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
					$pk = NpvacdisfrutePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacdisfrutePeer::doUpdate($this, $con);
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


			if (($retval = NpvacdisfrutePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdisfrutePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getPerini();
				break;
			case 2:
				return $this->getPerfin();
				break;
			case 3:
				return $this->getDiasdisfutar();
				break;
			case 4:
				return $this->getDiasdisfrutados();
				break;
			case 5:
				return $this->getDiasbonovac();
				break;
			case 6:
				return $this->getDiasbonovacpag();
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
		$keys = NpvacdisfrutePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getPerini(),
			$keys[2] => $this->getPerfin(),
			$keys[3] => $this->getDiasdisfutar(),
			$keys[4] => $this->getDiasdisfrutados(),
			$keys[5] => $this->getDiasbonovac(),
			$keys[6] => $this->getDiasbonovacpag(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdisfrutePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setPerini($value);
				break;
			case 2:
				$this->setPerfin($value);
				break;
			case 3:
				$this->setDiasdisfutar($value);
				break;
			case 4:
				$this->setDiasdisfrutados($value);
				break;
			case 5:
				$this->setDiasbonovac($value);
				break;
			case 6:
				$this->setDiasbonovacpag($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacdisfrutePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiasdisfutar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiasdisfrutados($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiasbonovac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiasbonovacpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacdisfrutePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacdisfrutePeer::CODEMP)) $criteria->add(NpvacdisfrutePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacdisfrutePeer::PERINI)) $criteria->add(NpvacdisfrutePeer::PERINI, $this->perini);
		if ($this->isColumnModified(NpvacdisfrutePeer::PERFIN)) $criteria->add(NpvacdisfrutePeer::PERFIN, $this->perfin);
		if ($this->isColumnModified(NpvacdisfrutePeer::DIASDISFUTAR)) $criteria->add(NpvacdisfrutePeer::DIASDISFUTAR, $this->diasdisfutar);
		if ($this->isColumnModified(NpvacdisfrutePeer::DIASDISFRUTADOS)) $criteria->add(NpvacdisfrutePeer::DIASDISFRUTADOS, $this->diasdisfrutados);
		if ($this->isColumnModified(NpvacdisfrutePeer::DIASBONOVAC)) $criteria->add(NpvacdisfrutePeer::DIASBONOVAC, $this->diasbonovac);
		if ($this->isColumnModified(NpvacdisfrutePeer::DIASBONOVACPAG)) $criteria->add(NpvacdisfrutePeer::DIASBONOVACPAG, $this->diasbonovacpag);
		if ($this->isColumnModified(NpvacdisfrutePeer::ID)) $criteria->add(NpvacdisfrutePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacdisfrutePeer::DATABASE_NAME);

		$criteria->add(NpvacdisfrutePeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setPerini($this->perini);

		$copyObj->setPerfin($this->perfin);

		$copyObj->setDiasdisfutar($this->diasdisfutar);

		$copyObj->setDiasdisfrutados($this->diasdisfrutados);

		$copyObj->setDiasbonovac($this->diasbonovac);

		$copyObj->setDiasbonovacpag($this->diasbonovacpag);


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
			self::$peer = new NpvacdisfrutePeer();
		}
		return self::$peer;
	}

} 