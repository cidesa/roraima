<?php


abstract class BaseForpryorgpub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codorg;


	
	protected $monapo;


	
	protected $reseje;


	
	protected $tipcnx;


	
	protected $detobs;


	
	protected $reqacc;


	
	protected $concomotrpry;


	
	protected $entcflpry;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodorg()
  {

    return trim($this->codorg);

  }
  
  public function getMonapo($val=false)
  {

    if($val) return number_format($this->monapo,2,',','.');
    else return $this->monapo;

  }
  
  public function getReseje()
  {

    return trim($this->reseje);

  }
  
  public function getTipcnx()
  {

    return trim($this->tipcnx);

  }
  
  public function getDetobs()
  {

    return trim($this->detobs);

  }
  
  public function getReqacc()
  {

    return trim($this->reqacc);

  }
  
  public function getConcomotrpry()
  {

    return trim($this->concomotrpry);

  }
  
  public function getEntcflpry()
  {

    return trim($this->entcflpry);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::CODPRO;
      }
  
	} 
	
	public function setCodorg($v)
	{

    if ($this->codorg !== $v) {
        $this->codorg = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::CODORG;
      }
  
	} 
	
	public function setMonapo($v)
	{

    if ($this->monapo !== $v) {
        $this->monapo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForpryorgpubPeer::MONAPO;
      }
  
	} 
	
	public function setReseje($v)
	{

    if ($this->reseje !== $v) {
        $this->reseje = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::RESEJE;
      }
  
	} 
	
	public function setTipcnx($v)
	{

    if ($this->tipcnx !== $v) {
        $this->tipcnx = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::TIPCNX;
      }
  
	} 
	
	public function setDetobs($v)
	{

    if ($this->detobs !== $v) {
        $this->detobs = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::DETOBS;
      }
  
	} 
	
	public function setReqacc($v)
	{

    if ($this->reqacc !== $v) {
        $this->reqacc = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::REQACC;
      }
  
	} 
	
	public function setConcomotrpry($v)
	{

    if ($this->concomotrpry !== $v) {
        $this->concomotrpry = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::CONCOMOTRPRY;
      }
  
	} 
	
	public function setEntcflpry($v)
	{

    if ($this->entcflpry !== $v) {
        $this->entcflpry = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::ENTCFLPRY;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForpryorgpubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codorg = $rs->getString($startcol + 1);

      $this->monapo = $rs->getFloat($startcol + 2);

      $this->reseje = $rs->getString($startcol + 3);

      $this->tipcnx = $rs->getString($startcol + 4);

      $this->detobs = $rs->getString($startcol + 5);

      $this->reqacc = $rs->getString($startcol + 6);

      $this->concomotrpry = $rs->getString($startcol + 7);

      $this->entcflpry = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forpryorgpub object", $e);
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
			$con = Propel::getConnection(ForpryorgpubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForpryorgpubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForpryorgpubPeer::DATABASE_NAME);
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
					$pk = ForpryorgpubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForpryorgpubPeer::doUpdate($this, $con);
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


			if (($retval = ForpryorgpubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpryorgpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodorg();
				break;
			case 2:
				return $this->getMonapo();
				break;
			case 3:
				return $this->getReseje();
				break;
			case 4:
				return $this->getTipcnx();
				break;
			case 5:
				return $this->getDetobs();
				break;
			case 6:
				return $this->getReqacc();
				break;
			case 7:
				return $this->getConcomotrpry();
				break;
			case 8:
				return $this->getEntcflpry();
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
		$keys = ForpryorgpubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodorg(),
			$keys[2] => $this->getMonapo(),
			$keys[3] => $this->getReseje(),
			$keys[4] => $this->getTipcnx(),
			$keys[5] => $this->getDetobs(),
			$keys[6] => $this->getReqacc(),
			$keys[7] => $this->getConcomotrpry(),
			$keys[8] => $this->getEntcflpry(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForpryorgpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodorg($value);
				break;
			case 2:
				$this->setMonapo($value);
				break;
			case 3:
				$this->setReseje($value);
				break;
			case 4:
				$this->setTipcnx($value);
				break;
			case 5:
				$this->setDetobs($value);
				break;
			case 6:
				$this->setReqacc($value);
				break;
			case 7:
				$this->setConcomotrpry($value);
				break;
			case 8:
				$this->setEntcflpry($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForpryorgpubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonapo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setReseje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipcnx($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDetobs($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReqacc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setConcomotrpry($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEntcflpry($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForpryorgpubPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForpryorgpubPeer::CODPRO)) $criteria->add(ForpryorgpubPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForpryorgpubPeer::CODORG)) $criteria->add(ForpryorgpubPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(ForpryorgpubPeer::MONAPO)) $criteria->add(ForpryorgpubPeer::MONAPO, $this->monapo);
		if ($this->isColumnModified(ForpryorgpubPeer::RESEJE)) $criteria->add(ForpryorgpubPeer::RESEJE, $this->reseje);
		if ($this->isColumnModified(ForpryorgpubPeer::TIPCNX)) $criteria->add(ForpryorgpubPeer::TIPCNX, $this->tipcnx);
		if ($this->isColumnModified(ForpryorgpubPeer::DETOBS)) $criteria->add(ForpryorgpubPeer::DETOBS, $this->detobs);
		if ($this->isColumnModified(ForpryorgpubPeer::REQACC)) $criteria->add(ForpryorgpubPeer::REQACC, $this->reqacc);
		if ($this->isColumnModified(ForpryorgpubPeer::CONCOMOTRPRY)) $criteria->add(ForpryorgpubPeer::CONCOMOTRPRY, $this->concomotrpry);
		if ($this->isColumnModified(ForpryorgpubPeer::ENTCFLPRY)) $criteria->add(ForpryorgpubPeer::ENTCFLPRY, $this->entcflpry);
		if ($this->isColumnModified(ForpryorgpubPeer::ID)) $criteria->add(ForpryorgpubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForpryorgpubPeer::DATABASE_NAME);

		$criteria->add(ForpryorgpubPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodorg($this->codorg);

		$copyObj->setMonapo($this->monapo);

		$copyObj->setReseje($this->reseje);

		$copyObj->setTipcnx($this->tipcnx);

		$copyObj->setDetobs($this->detobs);

		$copyObj->setReqacc($this->reqacc);

		$copyObj->setConcomotrpry($this->concomotrpry);

		$copyObj->setEntcflpry($this->entcflpry);


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
			self::$peer = new ForpryorgpubPeer();
		}
		return self::$peer;
	}

} 