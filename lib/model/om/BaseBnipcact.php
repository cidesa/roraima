<?php


abstract class BaseBnipcact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $anoipc;


	
	protected $ipcene;


	
	protected $ipcfeb;


	
	protected $ipcmar;


	
	protected $ipcabr;


	
	protected $ipcmay;


	
	protected $ipcjun;


	
	protected $ipcjul;


	
	protected $ipcago;


	
	protected $ipcsep;


	
	protected $ipcoct;


	
	protected $ipcnov;


	
	protected $ipcdic;


	
	protected $staipc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAnoipc()
  {

    return trim($this->anoipc);

  }
  
  public function getIpcene($val=false)
  {

    if($val) return number_format($this->ipcene,2,',','.');
    else return $this->ipcene;

  }
  
  public function getIpcfeb($val=false)
  {

    if($val) return number_format($this->ipcfeb,2,',','.');
    else return $this->ipcfeb;

  }
  
  public function getIpcmar($val=false)
  {

    if($val) return number_format($this->ipcmar,2,',','.');
    else return $this->ipcmar;

  }
  
  public function getIpcabr($val=false)
  {

    if($val) return number_format($this->ipcabr,2,',','.');
    else return $this->ipcabr;

  }
  
  public function getIpcmay($val=false)
  {

    if($val) return number_format($this->ipcmay,2,',','.');
    else return $this->ipcmay;

  }
  
  public function getIpcjun($val=false)
  {

    if($val) return number_format($this->ipcjun,2,',','.');
    else return $this->ipcjun;

  }
  
  public function getIpcjul($val=false)
  {

    if($val) return number_format($this->ipcjul,2,',','.');
    else return $this->ipcjul;

  }
  
  public function getIpcago($val=false)
  {

    if($val) return number_format($this->ipcago,2,',','.');
    else return $this->ipcago;

  }
  
  public function getIpcsep($val=false)
  {

    if($val) return number_format($this->ipcsep,2,',','.');
    else return $this->ipcsep;

  }
  
  public function getIpcoct($val=false)
  {

    if($val) return number_format($this->ipcoct,2,',','.');
    else return $this->ipcoct;

  }
  
  public function getIpcnov($val=false)
  {

    if($val) return number_format($this->ipcnov,2,',','.');
    else return $this->ipcnov;

  }
  
  public function getIpcdic($val=false)
  {

    if($val) return number_format($this->ipcdic,2,',','.');
    else return $this->ipcdic;

  }
  
  public function getStaipc()
  {

    return trim($this->staipc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAnoipc($v)
	{

    if ($this->anoipc !== $v) {
        $this->anoipc = $v;
        $this->modifiedColumns[] = BnipcactPeer::ANOIPC;
      }
  
	} 
	
	public function setIpcene($v)
	{

    if ($this->ipcene !== $v) {
        $this->ipcene = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCENE;
      }
  
	} 
	
	public function setIpcfeb($v)
	{

    if ($this->ipcfeb !== $v) {
        $this->ipcfeb = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCFEB;
      }
  
	} 
	
	public function setIpcmar($v)
	{

    if ($this->ipcmar !== $v) {
        $this->ipcmar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCMAR;
      }
  
	} 
	
	public function setIpcabr($v)
	{

    if ($this->ipcabr !== $v) {
        $this->ipcabr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCABR;
      }
  
	} 
	
	public function setIpcmay($v)
	{

    if ($this->ipcmay !== $v) {
        $this->ipcmay = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCMAY;
      }
  
	} 
	
	public function setIpcjun($v)
	{

    if ($this->ipcjun !== $v) {
        $this->ipcjun = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCJUN;
      }
  
	} 
	
	public function setIpcjul($v)
	{

    if ($this->ipcjul !== $v) {
        $this->ipcjul = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCJUL;
      }
  
	} 
	
	public function setIpcago($v)
	{

    if ($this->ipcago !== $v) {
        $this->ipcago = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCAGO;
      }
  
	} 
	
	public function setIpcsep($v)
	{

    if ($this->ipcsep !== $v) {
        $this->ipcsep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCSEP;
      }
  
	} 
	
	public function setIpcoct($v)
	{

    if ($this->ipcoct !== $v) {
        $this->ipcoct = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCOCT;
      }
  
	} 
	
	public function setIpcnov($v)
	{

    if ($this->ipcnov !== $v) {
        $this->ipcnov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCNOV;
      }
  
	} 
	
	public function setIpcdic($v)
	{

    if ($this->ipcdic !== $v) {
        $this->ipcdic = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnipcactPeer::IPCDIC;
      }
  
	} 
	
	public function setStaipc($v)
	{

    if ($this->staipc !== $v) {
        $this->staipc = $v;
        $this->modifiedColumns[] = BnipcactPeer::STAIPC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnipcactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->anoipc = $rs->getString($startcol + 0);

      $this->ipcene = $rs->getFloat($startcol + 1);

      $this->ipcfeb = $rs->getFloat($startcol + 2);

      $this->ipcmar = $rs->getFloat($startcol + 3);

      $this->ipcabr = $rs->getFloat($startcol + 4);

      $this->ipcmay = $rs->getFloat($startcol + 5);

      $this->ipcjun = $rs->getFloat($startcol + 6);

      $this->ipcjul = $rs->getFloat($startcol + 7);

      $this->ipcago = $rs->getFloat($startcol + 8);

      $this->ipcsep = $rs->getFloat($startcol + 9);

      $this->ipcoct = $rs->getFloat($startcol + 10);

      $this->ipcnov = $rs->getFloat($startcol + 11);

      $this->ipcdic = $rs->getFloat($startcol + 12);

      $this->staipc = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnipcact object", $e);
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
			$con = Propel::getConnection(BnipcactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnipcactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnipcactPeer::DATABASE_NAME);
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
					$pk = BnipcactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnipcactPeer::doUpdate($this, $con);
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


			if (($retval = BnipcactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnipcactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAnoipc();
				break;
			case 1:
				return $this->getIpcene();
				break;
			case 2:
				return $this->getIpcfeb();
				break;
			case 3:
				return $this->getIpcmar();
				break;
			case 4:
				return $this->getIpcabr();
				break;
			case 5:
				return $this->getIpcmay();
				break;
			case 6:
				return $this->getIpcjun();
				break;
			case 7:
				return $this->getIpcjul();
				break;
			case 8:
				return $this->getIpcago();
				break;
			case 9:
				return $this->getIpcsep();
				break;
			case 10:
				return $this->getIpcoct();
				break;
			case 11:
				return $this->getIpcnov();
				break;
			case 12:
				return $this->getIpcdic();
				break;
			case 13:
				return $this->getStaipc();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnipcactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAnoipc(),
			$keys[1] => $this->getIpcene(),
			$keys[2] => $this->getIpcfeb(),
			$keys[3] => $this->getIpcmar(),
			$keys[4] => $this->getIpcabr(),
			$keys[5] => $this->getIpcmay(),
			$keys[6] => $this->getIpcjun(),
			$keys[7] => $this->getIpcjul(),
			$keys[8] => $this->getIpcago(),
			$keys[9] => $this->getIpcsep(),
			$keys[10] => $this->getIpcoct(),
			$keys[11] => $this->getIpcnov(),
			$keys[12] => $this->getIpcdic(),
			$keys[13] => $this->getStaipc(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnipcactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAnoipc($value);
				break;
			case 1:
				$this->setIpcene($value);
				break;
			case 2:
				$this->setIpcfeb($value);
				break;
			case 3:
				$this->setIpcmar($value);
				break;
			case 4:
				$this->setIpcabr($value);
				break;
			case 5:
				$this->setIpcmay($value);
				break;
			case 6:
				$this->setIpcjun($value);
				break;
			case 7:
				$this->setIpcjul($value);
				break;
			case 8:
				$this->setIpcago($value);
				break;
			case 9:
				$this->setIpcsep($value);
				break;
			case 10:
				$this->setIpcoct($value);
				break;
			case 11:
				$this->setIpcnov($value);
				break;
			case 12:
				$this->setIpcdic($value);
				break;
			case 13:
				$this->setStaipc($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnipcactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAnoipc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIpcene($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIpcfeb($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIpcmar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIpcabr($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIpcmay($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIpcjun($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIpcjul($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIpcago($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIpcsep($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIpcoct($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIpcnov($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIpcdic($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStaipc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnipcactPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnipcactPeer::ANOIPC)) $criteria->add(BnipcactPeer::ANOIPC, $this->anoipc);
		if ($this->isColumnModified(BnipcactPeer::IPCENE)) $criteria->add(BnipcactPeer::IPCENE, $this->ipcene);
		if ($this->isColumnModified(BnipcactPeer::IPCFEB)) $criteria->add(BnipcactPeer::IPCFEB, $this->ipcfeb);
		if ($this->isColumnModified(BnipcactPeer::IPCMAR)) $criteria->add(BnipcactPeer::IPCMAR, $this->ipcmar);
		if ($this->isColumnModified(BnipcactPeer::IPCABR)) $criteria->add(BnipcactPeer::IPCABR, $this->ipcabr);
		if ($this->isColumnModified(BnipcactPeer::IPCMAY)) $criteria->add(BnipcactPeer::IPCMAY, $this->ipcmay);
		if ($this->isColumnModified(BnipcactPeer::IPCJUN)) $criteria->add(BnipcactPeer::IPCJUN, $this->ipcjun);
		if ($this->isColumnModified(BnipcactPeer::IPCJUL)) $criteria->add(BnipcactPeer::IPCJUL, $this->ipcjul);
		if ($this->isColumnModified(BnipcactPeer::IPCAGO)) $criteria->add(BnipcactPeer::IPCAGO, $this->ipcago);
		if ($this->isColumnModified(BnipcactPeer::IPCSEP)) $criteria->add(BnipcactPeer::IPCSEP, $this->ipcsep);
		if ($this->isColumnModified(BnipcactPeer::IPCOCT)) $criteria->add(BnipcactPeer::IPCOCT, $this->ipcoct);
		if ($this->isColumnModified(BnipcactPeer::IPCNOV)) $criteria->add(BnipcactPeer::IPCNOV, $this->ipcnov);
		if ($this->isColumnModified(BnipcactPeer::IPCDIC)) $criteria->add(BnipcactPeer::IPCDIC, $this->ipcdic);
		if ($this->isColumnModified(BnipcactPeer::STAIPC)) $criteria->add(BnipcactPeer::STAIPC, $this->staipc);
		if ($this->isColumnModified(BnipcactPeer::ID)) $criteria->add(BnipcactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnipcactPeer::DATABASE_NAME);

		$criteria->add(BnipcactPeer::ID, $this->id);

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

		$copyObj->setAnoipc($this->anoipc);

		$copyObj->setIpcene($this->ipcene);

		$copyObj->setIpcfeb($this->ipcfeb);

		$copyObj->setIpcmar($this->ipcmar);

		$copyObj->setIpcabr($this->ipcabr);

		$copyObj->setIpcmay($this->ipcmay);

		$copyObj->setIpcjun($this->ipcjun);

		$copyObj->setIpcjul($this->ipcjul);

		$copyObj->setIpcago($this->ipcago);

		$copyObj->setIpcsep($this->ipcsep);

		$copyObj->setIpcoct($this->ipcoct);

		$copyObj->setIpcnov($this->ipcnov);

		$copyObj->setIpcdic($this->ipcdic);

		$copyObj->setStaipc($this->staipc);


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
			self::$peer = new BnipcactPeer();
		}
		return self::$peer;
	}

} 