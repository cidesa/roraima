<?php


abstract class BaseNpasiconpar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codtipcar;


	
	protected $gracar;


	
	protected $codtip;


	
	protected $codtipcat;


	
	protected $codtie;


	
	protected $codestemp;


	
	protected $codcon;


	
	protected $codpar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodtipcar()
  {

    return trim($this->codtipcar);

  }
  
  public function getGracar()
  {

    return trim($this->gracar);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getCodtipcat()
  {

    return trim($this->codtipcat);

  }
  
  public function getCodtie()
  {

    return trim($this->codtie);

  }
  
  public function getCodestemp()
  {

    return trim($this->codestemp);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODNOM;
      }
  
	} 
	
	public function setCodtipcar($v)
	{

    if ($this->codtipcar !== $v) {
        $this->codtipcar = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODTIPCAR;
      }
  
	} 
	
	public function setGracar($v)
	{

    if ($this->gracar !== $v) {
        $this->gracar = $v;
        $this->modifiedColumns[] = NpasiconparPeer::GRACAR;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODTIP;
      }
  
	} 
	
	public function setCodtipcat($v)
	{

    if ($this->codtipcat !== $v) {
        $this->codtipcat = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODTIPCAT;
      }
  
	} 
	
	public function setCodtie($v)
	{

    if ($this->codtie !== $v) {
        $this->codtie = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODTIE;
      }
  
	} 
	
	public function setCodestemp($v)
	{

    if ($this->codestemp !== $v) {
        $this->codestemp = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODESTEMP;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODCON;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NpasiconparPeer::CODPAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpasiconparPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codtipcar = $rs->getString($startcol + 1);

      $this->gracar = $rs->getString($startcol + 2);

      $this->codtip = $rs->getString($startcol + 3);

      $this->codtipcat = $rs->getString($startcol + 4);

      $this->codtie = $rs->getString($startcol + 5);

      $this->codestemp = $rs->getString($startcol + 6);

      $this->codcon = $rs->getString($startcol + 7);

      $this->codpar = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npasiconpar object", $e);
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
			$con = Propel::getConnection(NpasiconparPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiconparPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiconparPeer::DATABASE_NAME);
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
					$pk = NpasiconparPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpasiconparPeer::doUpdate($this, $con);
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


			if (($retval = NpasiconparPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodtipcar();
				break;
			case 2:
				return $this->getGracar();
				break;
			case 3:
				return $this->getCodtip();
				break;
			case 4:
				return $this->getCodtipcat();
				break;
			case 5:
				return $this->getCodtie();
				break;
			case 6:
				return $this->getCodestemp();
				break;
			case 7:
				return $this->getCodcon();
				break;
			case 8:
				return $this->getCodpar();
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
		$keys = NpasiconparPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodtipcar(),
			$keys[2] => $this->getGracar(),
			$keys[3] => $this->getCodtip(),
			$keys[4] => $this->getCodtipcat(),
			$keys[5] => $this->getCodtie(),
			$keys[6] => $this->getCodestemp(),
			$keys[7] => $this->getCodcon(),
			$keys[8] => $this->getCodpar(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodtipcar($value);
				break;
			case 2:
				$this->setGracar($value);
				break;
			case 3:
				$this->setCodtip($value);
				break;
			case 4:
				$this->setCodtipcat($value);
				break;
			case 5:
				$this->setCodtie($value);
				break;
			case 6:
				$this->setCodestemp($value);
				break;
			case 7:
				$this->setCodcon($value);
				break;
			case 8:
				$this->setCodpar($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconparPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtipcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGracar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtip($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtipcat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodtie($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodestemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodcon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiconparPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiconparPeer::CODNOM)) $criteria->add(NpasiconparPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpasiconparPeer::CODTIPCAR)) $criteria->add(NpasiconparPeer::CODTIPCAR, $this->codtipcar);
		if ($this->isColumnModified(NpasiconparPeer::GRACAR)) $criteria->add(NpasiconparPeer::GRACAR, $this->gracar);
		if ($this->isColumnModified(NpasiconparPeer::CODTIP)) $criteria->add(NpasiconparPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(NpasiconparPeer::CODTIPCAT)) $criteria->add(NpasiconparPeer::CODTIPCAT, $this->codtipcat);
		if ($this->isColumnModified(NpasiconparPeer::CODTIE)) $criteria->add(NpasiconparPeer::CODTIE, $this->codtie);
		if ($this->isColumnModified(NpasiconparPeer::CODESTEMP)) $criteria->add(NpasiconparPeer::CODESTEMP, $this->codestemp);
		if ($this->isColumnModified(NpasiconparPeer::CODCON)) $criteria->add(NpasiconparPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpasiconparPeer::CODPAR)) $criteria->add(NpasiconparPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NpasiconparPeer::ID)) $criteria->add(NpasiconparPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiconparPeer::DATABASE_NAME);

		$criteria->add(NpasiconparPeer::ID, $this->id);

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

		$copyObj->setCodtipcar($this->codtipcar);

		$copyObj->setGracar($this->gracar);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCodtipcat($this->codtipcat);

		$copyObj->setCodtie($this->codtie);

		$copyObj->setCodestemp($this->codestemp);

		$copyObj->setCodcon($this->codcon);

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
			self::$peer = new NpasiconparPeer();
		}
		return self::$peer;
	}

} 