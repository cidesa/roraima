<?php


abstract class BaseCaentalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rcpart;


	
	protected $fecrcp;


	
	protected $desrcp;


	
	protected $codpro;


	
	protected $monrcp;


	
	protected $starcp;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $tipmov;


	
	protected $id;

	
	protected $aCatipent;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRcpart()
  {

    return trim($this->rcpart);

  }
  
  public function getFecrcp($format = 'Y-m-d')
  {

    if ($this->fecrcp === null || $this->fecrcp === '') {
      return null;
    } elseif (!is_int($this->fecrcp)) {
            $ts = adodb_strtotime($this->fecrcp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrcp] as date/time value: " . var_export($this->fecrcp, true));
      }
    } else {
      $ts = $this->fecrcp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesrcp()
  {

    return trim($this->desrcp);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getMonrcp($val=false)
  {

    if($val) return number_format($this->monrcp,2,',','.');
    else return $this->monrcp;

  }
  
  public function getStarcp()
  {

    return trim($this->starcp);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRcpart($v)
	{

    if ($this->rcpart !== $v) {
        $this->rcpart = $v;
        $this->modifiedColumns[] = CaentalmPeer::RCPART;
      }
  
	} 
	
	public function setFecrcp($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrcp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrcp !== $ts) {
      $this->fecrcp = $ts;
      $this->modifiedColumns[] = CaentalmPeer::FECRCP;
    }

	} 
	
	public function setDesrcp($v)
	{

    if ($this->desrcp !== $v) {
        $this->desrcp = $v;
        $this->modifiedColumns[] = CaentalmPeer::DESRCP;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODPRO;
      }
  
	} 
	
	public function setMonrcp($v)
	{

    if ($this->monrcp !== $v) {
        $this->monrcp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaentalmPeer::MONRCP;
      }
  
	} 
	
	public function setStarcp($v)
	{

    if ($this->starcp !== $v) {
        $this->starcp = $v;
        $this->modifiedColumns[] = CaentalmPeer::STARCP;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODUBI;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = CaentalmPeer::TIPMOV;
      }
  
		if ($this->aCatipent !== null && $this->aCatipent->getCodtipent() !== $v) {
			$this->aCatipent = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaentalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rcpart = $rs->getString($startcol + 0);

      $this->fecrcp = $rs->getDate($startcol + 1, null);

      $this->desrcp = $rs->getString($startcol + 2);

      $this->codpro = $rs->getString($startcol + 3);

      $this->monrcp = $rs->getFloat($startcol + 4);

      $this->starcp = $rs->getString($startcol + 5);

      $this->codalm = $rs->getString($startcol + 6);

      $this->codubi = $rs->getString($startcol + 7);

      $this->tipmov = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caentalm object", $e);
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
			$con = Propel::getConnection(CaentalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaentalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaentalmPeer::DATABASE_NAME);
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


												
			if ($this->aCatipent !== null) {
				if ($this->aCatipent->isModified()) {
					$affectedRows += $this->aCatipent->save($con);
				}
				$this->setCatipent($this->aCatipent);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CaentalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaentalmPeer::doUpdate($this, $con);
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


												
			if ($this->aCatipent !== null) {
				if (!$this->aCatipent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipent->getValidationFailures());
				}
			}


			if (($retval = CaentalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaentalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRcpart();
				break;
			case 1:
				return $this->getFecrcp();
				break;
			case 2:
				return $this->getDesrcp();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getMonrcp();
				break;
			case 5:
				return $this->getStarcp();
				break;
			case 6:
				return $this->getCodalm();
				break;
			case 7:
				return $this->getCodubi();
				break;
			case 8:
				return $this->getTipmov();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaentalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRcpart(),
			$keys[1] => $this->getFecrcp(),
			$keys[2] => $this->getDesrcp(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getMonrcp(),
			$keys[5] => $this->getStarcp(),
			$keys[6] => $this->getCodalm(),
			$keys[7] => $this->getCodubi(),
			$keys[8] => $this->getTipmov(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaentalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRcpart($value);
				break;
			case 1:
				$this->setFecrcp($value);
				break;
			case 2:
				$this->setDesrcp($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setMonrcp($value);
				break;
			case 5:
				$this->setStarcp($value);
				break;
			case 6:
				$this->setCodalm($value);
				break;
			case 7:
				$this->setCodubi($value);
				break;
			case 8:
				$this->setTipmov($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaentalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRcpart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecrcp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrcp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrcp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStarcp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodalm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodubi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipmov($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaentalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaentalmPeer::RCPART)) $criteria->add(CaentalmPeer::RCPART, $this->rcpart);
		if ($this->isColumnModified(CaentalmPeer::FECRCP)) $criteria->add(CaentalmPeer::FECRCP, $this->fecrcp);
		if ($this->isColumnModified(CaentalmPeer::DESRCP)) $criteria->add(CaentalmPeer::DESRCP, $this->desrcp);
		if ($this->isColumnModified(CaentalmPeer::CODPRO)) $criteria->add(CaentalmPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaentalmPeer::MONRCP)) $criteria->add(CaentalmPeer::MONRCP, $this->monrcp);
		if ($this->isColumnModified(CaentalmPeer::STARCP)) $criteria->add(CaentalmPeer::STARCP, $this->starcp);
		if ($this->isColumnModified(CaentalmPeer::CODALM)) $criteria->add(CaentalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CaentalmPeer::CODUBI)) $criteria->add(CaentalmPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CaentalmPeer::TIPMOV)) $criteria->add(CaentalmPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CaentalmPeer::ID)) $criteria->add(CaentalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaentalmPeer::DATABASE_NAME);

		$criteria->add(CaentalmPeer::ID, $this->id);

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

		$copyObj->setRcpart($this->rcpart);

		$copyObj->setFecrcp($this->fecrcp);

		$copyObj->setDesrcp($this->desrcp);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setMonrcp($this->monrcp);

		$copyObj->setStarcp($this->starcp);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setTipmov($this->tipmov);


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
			self::$peer = new CaentalmPeer();
		}
		return self::$peer;
	}

	
	public function setCatipent($v)
	{


		if ($v === null) {
			$this->setTipmov(NULL);
		} else {
			$this->setTipmov($v->getCodtipent());
		}


		$this->aCatipent = $v;
	}


	
	public function getCatipent($con = null)
	{
		if ($this->aCatipent === null && (($this->tipmov !== "" && $this->tipmov !== null))) {
						include_once 'lib/model/om/BaseCatipentPeer.php';

			$this->aCatipent = CatipentPeer::retrieveByPK($this->tipmov, $con);

			
		}
		return $this->aCatipent;
	}

} 