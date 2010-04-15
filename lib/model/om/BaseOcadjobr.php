<?php


abstract class BaseOcadjobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codadj;


	
	protected $tipadj;


	
	protected $fecadj;


	
	protected $codobr;


	
	protected $fecinipub;


	
	protected $fecfinpub;


	
	protected $fecbaseini;


	
	protected $fecbasefin;


	
	protected $fecpreofini;


	
	protected $fecpreoffin;


	
	protected $fecanaofini;


	
	protected $fecanaoffin;


	
	protected $codprogan;


	
	protected $fecgan;


	
	protected $status;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodadj()
  {

    return trim($this->codadj);

  }
  
  public function getTipadj()
  {

    return trim($this->tipadj);

  }
  
  public function getFecadj($format = 'Y-m-d')
  {

    if ($this->fecadj === null || $this->fecadj === '') {
      return null;
    } elseif (!is_int($this->fecadj)) {
            $ts = adodb_strtotime($this->fecadj);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadj] as date/time value: " . var_export($this->fecadj, true));
      }
    } else {
      $ts = $this->fecadj;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getFecinipub($format = 'Y-m-d')
  {

    if ($this->fecinipub === null || $this->fecinipub === '') {
      return null;
    } elseif (!is_int($this->fecinipub)) {
            $ts = adodb_strtotime($this->fecinipub);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinipub] as date/time value: " . var_export($this->fecinipub, true));
      }
    } else {
      $ts = $this->fecinipub;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfinpub($format = 'Y-m-d')
  {

    if ($this->fecfinpub === null || $this->fecfinpub === '') {
      return null;
    } elseif (!is_int($this->fecfinpub)) {
            $ts = adodb_strtotime($this->fecfinpub);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfinpub] as date/time value: " . var_export($this->fecfinpub, true));
      }
    } else {
      $ts = $this->fecfinpub;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecbaseini($format = 'Y-m-d')
  {

    if ($this->fecbaseini === null || $this->fecbaseini === '') {
      return null;
    } elseif (!is_int($this->fecbaseini)) {
            $ts = adodb_strtotime($this->fecbaseini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecbaseini] as date/time value: " . var_export($this->fecbaseini, true));
      }
    } else {
      $ts = $this->fecbaseini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecbasefin($format = 'Y-m-d')
  {

    if ($this->fecbasefin === null || $this->fecbasefin === '') {
      return null;
    } elseif (!is_int($this->fecbasefin)) {
            $ts = adodb_strtotime($this->fecbasefin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecbasefin] as date/time value: " . var_export($this->fecbasefin, true));
      }
    } else {
      $ts = $this->fecbasefin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecpreofini($format = 'Y-m-d')
  {

    if ($this->fecpreofini === null || $this->fecpreofini === '') {
      return null;
    } elseif (!is_int($this->fecpreofini)) {
            $ts = adodb_strtotime($this->fecpreofini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpreofini] as date/time value: " . var_export($this->fecpreofini, true));
      }
    } else {
      $ts = $this->fecpreofini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecpreoffin($format = 'Y-m-d')
  {

    if ($this->fecpreoffin === null || $this->fecpreoffin === '') {
      return null;
    } elseif (!is_int($this->fecpreoffin)) {
            $ts = adodb_strtotime($this->fecpreoffin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpreoffin] as date/time value: " . var_export($this->fecpreoffin, true));
      }
    } else {
      $ts = $this->fecpreoffin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecanaofini($format = 'Y-m-d')
  {

    if ($this->fecanaofini === null || $this->fecanaofini === '') {
      return null;
    } elseif (!is_int($this->fecanaofini)) {
            $ts = adodb_strtotime($this->fecanaofini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanaofini] as date/time value: " . var_export($this->fecanaofini, true));
      }
    } else {
      $ts = $this->fecanaofini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecanaoffin($format = 'Y-m-d')
  {

    if ($this->fecanaoffin === null || $this->fecanaoffin === '') {
      return null;
    } elseif (!is_int($this->fecanaoffin)) {
            $ts = adodb_strtotime($this->fecanaoffin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanaoffin] as date/time value: " . var_export($this->fecanaoffin, true));
      }
    } else {
      $ts = $this->fecanaoffin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodprogan()
  {

    return trim($this->codprogan);

  }
  
  public function getFecgan($format = 'Y-m-d')
  {

    if ($this->fecgan === null || $this->fecgan === '') {
      return null;
    } elseif (!is_int($this->fecgan)) {
            $ts = adodb_strtotime($this->fecgan);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgan] as date/time value: " . var_export($this->fecgan, true));
      }
    } else {
      $ts = $this->fecgan;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodadj($v)
	{

    if ($this->codadj !== $v) {
        $this->codadj = $v;
        $this->modifiedColumns[] = OcadjobrPeer::CODADJ;
      }
  
	} 
	
	public function setTipadj($v)
	{

    if ($this->tipadj !== $v) {
        $this->tipadj = $v;
        $this->modifiedColumns[] = OcadjobrPeer::TIPADJ;
      }
  
	} 
	
	public function setFecadj($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadj] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadj !== $ts) {
      $this->fecadj = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECADJ;
    }

	} 
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = OcadjobrPeer::CODOBR;
      }
  
	} 
	
	public function setFecinipub($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinipub] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinipub !== $ts) {
      $this->fecinipub = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECINIPUB;
    }

	} 
	
	public function setFecfinpub($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfinpub] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfinpub !== $ts) {
      $this->fecfinpub = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECFINPUB;
    }

	} 
	
	public function setFecbaseini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecbaseini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecbaseini !== $ts) {
      $this->fecbaseini = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECBASEINI;
    }

	} 
	
	public function setFecbasefin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecbasefin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecbasefin !== $ts) {
      $this->fecbasefin = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECBASEFIN;
    }

	} 
	
	public function setFecpreofini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpreofini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpreofini !== $ts) {
      $this->fecpreofini = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECPREOFINI;
    }

	} 
	
	public function setFecpreoffin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpreoffin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpreoffin !== $ts) {
      $this->fecpreoffin = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECPREOFFIN;
    }

	} 
	
	public function setFecanaofini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanaofini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanaofini !== $ts) {
      $this->fecanaofini = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECANAOFINI;
    }

	} 
	
	public function setFecanaoffin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanaoffin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanaoffin !== $ts) {
      $this->fecanaoffin = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECANAOFFIN;
    }

	} 
	
	public function setCodprogan($v)
	{

    if ($this->codprogan !== $v) {
        $this->codprogan = $v;
        $this->modifiedColumns[] = OcadjobrPeer::CODPROGAN;
      }
  
	} 
	
	public function setFecgan($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgan] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgan !== $ts) {
      $this->fecgan = $ts;
      $this->modifiedColumns[] = OcadjobrPeer::FECGAN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = OcadjobrPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcadjobrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codadj = $rs->getString($startcol + 0);

      $this->tipadj = $rs->getString($startcol + 1);

      $this->fecadj = $rs->getDate($startcol + 2, null);

      $this->codobr = $rs->getString($startcol + 3);

      $this->fecinipub = $rs->getDate($startcol + 4, null);

      $this->fecfinpub = $rs->getDate($startcol + 5, null);

      $this->fecbaseini = $rs->getDate($startcol + 6, null);

      $this->fecbasefin = $rs->getDate($startcol + 7, null);

      $this->fecpreofini = $rs->getDate($startcol + 8, null);

      $this->fecpreoffin = $rs->getDate($startcol + 9, null);

      $this->fecanaofini = $rs->getDate($startcol + 10, null);

      $this->fecanaoffin = $rs->getDate($startcol + 11, null);

      $this->codprogan = $rs->getString($startcol + 12);

      $this->fecgan = $rs->getDate($startcol + 13, null);

      $this->status = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocadjobr object", $e);
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
			$con = Propel::getConnection(OcadjobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcadjobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcadjobrPeer::DATABASE_NAME);
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
					$pk = OcadjobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcadjobrPeer::doUpdate($this, $con);
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


			if (($retval = OcadjobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcadjobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodadj();
				break;
			case 1:
				return $this->getTipadj();
				break;
			case 2:
				return $this->getFecadj();
				break;
			case 3:
				return $this->getCodobr();
				break;
			case 4:
				return $this->getFecinipub();
				break;
			case 5:
				return $this->getFecfinpub();
				break;
			case 6:
				return $this->getFecbaseini();
				break;
			case 7:
				return $this->getFecbasefin();
				break;
			case 8:
				return $this->getFecpreofini();
				break;
			case 9:
				return $this->getFecpreoffin();
				break;
			case 10:
				return $this->getFecanaofini();
				break;
			case 11:
				return $this->getFecanaoffin();
				break;
			case 12:
				return $this->getCodprogan();
				break;
			case 13:
				return $this->getFecgan();
				break;
			case 14:
				return $this->getStatus();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcadjobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodadj(),
			$keys[1] => $this->getTipadj(),
			$keys[2] => $this->getFecadj(),
			$keys[3] => $this->getCodobr(),
			$keys[4] => $this->getFecinipub(),
			$keys[5] => $this->getFecfinpub(),
			$keys[6] => $this->getFecbaseini(),
			$keys[7] => $this->getFecbasefin(),
			$keys[8] => $this->getFecpreofini(),
			$keys[9] => $this->getFecpreoffin(),
			$keys[10] => $this->getFecanaofini(),
			$keys[11] => $this->getFecanaoffin(),
			$keys[12] => $this->getCodprogan(),
			$keys[13] => $this->getFecgan(),
			$keys[14] => $this->getStatus(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcadjobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodadj($value);
				break;
			case 1:
				$this->setTipadj($value);
				break;
			case 2:
				$this->setFecadj($value);
				break;
			case 3:
				$this->setCodobr($value);
				break;
			case 4:
				$this->setFecinipub($value);
				break;
			case 5:
				$this->setFecfinpub($value);
				break;
			case 6:
				$this->setFecbaseini($value);
				break;
			case 7:
				$this->setFecbasefin($value);
				break;
			case 8:
				$this->setFecpreofini($value);
				break;
			case 9:
				$this->setFecpreoffin($value);
				break;
			case 10:
				$this->setFecanaofini($value);
				break;
			case 11:
				$this->setFecanaoffin($value);
				break;
			case 12:
				$this->setCodprogan($value);
				break;
			case 13:
				$this->setFecgan($value);
				break;
			case 14:
				$this->setStatus($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcadjobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodadj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipadj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecadj($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodobr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecinipub($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecfinpub($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecbaseini($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecbasefin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecpreofini($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecpreoffin($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanaofini($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecanaoffin($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodprogan($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecgan($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStatus($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcadjobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcadjobrPeer::CODADJ)) $criteria->add(OcadjobrPeer::CODADJ, $this->codadj);
		if ($this->isColumnModified(OcadjobrPeer::TIPADJ)) $criteria->add(OcadjobrPeer::TIPADJ, $this->tipadj);
		if ($this->isColumnModified(OcadjobrPeer::FECADJ)) $criteria->add(OcadjobrPeer::FECADJ, $this->fecadj);
		if ($this->isColumnModified(OcadjobrPeer::CODOBR)) $criteria->add(OcadjobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcadjobrPeer::FECINIPUB)) $criteria->add(OcadjobrPeer::FECINIPUB, $this->fecinipub);
		if ($this->isColumnModified(OcadjobrPeer::FECFINPUB)) $criteria->add(OcadjobrPeer::FECFINPUB, $this->fecfinpub);
		if ($this->isColumnModified(OcadjobrPeer::FECBASEINI)) $criteria->add(OcadjobrPeer::FECBASEINI, $this->fecbaseini);
		if ($this->isColumnModified(OcadjobrPeer::FECBASEFIN)) $criteria->add(OcadjobrPeer::FECBASEFIN, $this->fecbasefin);
		if ($this->isColumnModified(OcadjobrPeer::FECPREOFINI)) $criteria->add(OcadjobrPeer::FECPREOFINI, $this->fecpreofini);
		if ($this->isColumnModified(OcadjobrPeer::FECPREOFFIN)) $criteria->add(OcadjobrPeer::FECPREOFFIN, $this->fecpreoffin);
		if ($this->isColumnModified(OcadjobrPeer::FECANAOFINI)) $criteria->add(OcadjobrPeer::FECANAOFINI, $this->fecanaofini);
		if ($this->isColumnModified(OcadjobrPeer::FECANAOFFIN)) $criteria->add(OcadjobrPeer::FECANAOFFIN, $this->fecanaoffin);
		if ($this->isColumnModified(OcadjobrPeer::CODPROGAN)) $criteria->add(OcadjobrPeer::CODPROGAN, $this->codprogan);
		if ($this->isColumnModified(OcadjobrPeer::FECGAN)) $criteria->add(OcadjobrPeer::FECGAN, $this->fecgan);
		if ($this->isColumnModified(OcadjobrPeer::STATUS)) $criteria->add(OcadjobrPeer::STATUS, $this->status);
		if ($this->isColumnModified(OcadjobrPeer::ID)) $criteria->add(OcadjobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcadjobrPeer::DATABASE_NAME);

		$criteria->add(OcadjobrPeer::ID, $this->id);

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

		$copyObj->setCodadj($this->codadj);

		$copyObj->setTipadj($this->tipadj);

		$copyObj->setFecadj($this->fecadj);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setFecinipub($this->fecinipub);

		$copyObj->setFecfinpub($this->fecfinpub);

		$copyObj->setFecbaseini($this->fecbaseini);

		$copyObj->setFecbasefin($this->fecbasefin);

		$copyObj->setFecpreofini($this->fecpreofini);

		$copyObj->setFecpreoffin($this->fecpreoffin);

		$copyObj->setFecanaofini($this->fecanaofini);

		$copyObj->setFecanaoffin($this->fecanaoffin);

		$copyObj->setCodprogan($this->codprogan);

		$copyObj->setFecgan($this->fecgan);

		$copyObj->setStatus($this->status);


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
			self::$peer = new OcadjobrPeer();
		}
		return self::$peer;
	}

} 