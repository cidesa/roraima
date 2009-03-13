<?php


abstract class BaseOcdefpar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $renpar;


	
	protected $cosuni;


	
	protected $coduni;


	
	protected $codpar;


	
	protected $despar;


	
	protected $codtippar;


	
	protected $coscoling;


	
	protected $cosconstruc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRenpar()
  {

    return trim($this->renpar);

  }
  
  public function getCosuni($val=false)
  {

    if($val) return number_format($this->cosuni,2,',','.');
    else return $this->cosuni;

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getDespar()
  {

    return trim($this->despar);

  }
  
  public function getCodtippar()
  {

    return trim($this->codtippar);

  }
  
  public function getCoscoling($val=false)
  {

    if($val) return number_format($this->coscoling,2,',','.');
    else return $this->coscoling;

  }
  
  public function getCosconstruc($val=false)
  {

    if($val) return number_format($this->cosconstruc,2,',','.');
    else return $this->cosconstruc;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRenpar($v)
	{

    if ($this->renpar !== $v) {
        $this->renpar = $v;
        $this->modifiedColumns[] = OcdefparPeer::RENPAR;
      }
  
	} 
	
	public function setCosuni($v)
	{

    if ($this->cosuni !== $v) {
        $this->cosuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefparPeer::COSUNI;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = OcdefparPeer::CODUNI;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = OcdefparPeer::CODPAR;
      }
  
	} 
	
	public function setDespar($v)
	{

    if ($this->despar !== $v) {
        $this->despar = $v;
        $this->modifiedColumns[] = OcdefparPeer::DESPAR;
      }
  
	} 
	
	public function setCodtippar($v)
	{

    if ($this->codtippar !== $v) {
        $this->codtippar = $v;
        $this->modifiedColumns[] = OcdefparPeer::CODTIPPAR;
      }
  
	} 
	
	public function setCoscoling($v)
	{

    if ($this->coscoling !== $v) {
        $this->coscoling = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefparPeer::COSCOLING;
      }
  
	} 
	
	public function setCosconstruc($v)
	{

    if ($this->cosconstruc !== $v) {
        $this->cosconstruc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdefparPeer::COSCONSTRUC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcdefparPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->renpar = $rs->getString($startcol + 0);

      $this->cosuni = $rs->getFloat($startcol + 1);

      $this->coduni = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->despar = $rs->getString($startcol + 4);

      $this->codtippar = $rs->getString($startcol + 5);

      $this->coscoling = $rs->getFloat($startcol + 6);

      $this->cosconstruc = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocdefpar object", $e);
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
			$con = Propel::getConnection(OcdefparPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdefparPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdefparPeer::DATABASE_NAME);
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
					$pk = OcdefparPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcdefparPeer::doUpdate($this, $con);
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


			if (($retval = OcdefparPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdefparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRenpar();
				break;
			case 1:
				return $this->getCosuni();
				break;
			case 2:
				return $this->getCoduni();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getDespar();
				break;
			case 5:
				return $this->getCodtippar();
				break;
			case 6:
				return $this->getCoscoling();
				break;
			case 7:
				return $this->getCosconstruc();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdefparPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRenpar(),
			$keys[1] => $this->getCosuni(),
			$keys[2] => $this->getCoduni(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getDespar(),
			$keys[5] => $this->getCodtippar(),
			$keys[6] => $this->getCoscoling(),
			$keys[7] => $this->getCosconstruc(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdefparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRenpar($value);
				break;
			case 1:
				$this->setCosuni($value);
				break;
			case 2:
				$this->setCoduni($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setDespar($value);
				break;
			case 5:
				$this->setCodtippar($value);
				break;
			case 6:
				$this->setCoscoling($value);
				break;
			case 7:
				$this->setCosconstruc($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdefparPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRenpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCosuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDespar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodtippar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoscoling($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCosconstruc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdefparPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdefparPeer::RENPAR)) $criteria->add(OcdefparPeer::RENPAR, $this->renpar);
		if ($this->isColumnModified(OcdefparPeer::COSUNI)) $criteria->add(OcdefparPeer::COSUNI, $this->cosuni);
		if ($this->isColumnModified(OcdefparPeer::CODUNI)) $criteria->add(OcdefparPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(OcdefparPeer::CODPAR)) $criteria->add(OcdefparPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcdefparPeer::DESPAR)) $criteria->add(OcdefparPeer::DESPAR, $this->despar);
		if ($this->isColumnModified(OcdefparPeer::CODTIPPAR)) $criteria->add(OcdefparPeer::CODTIPPAR, $this->codtippar);
		if ($this->isColumnModified(OcdefparPeer::COSCOLING)) $criteria->add(OcdefparPeer::COSCOLING, $this->coscoling);
		if ($this->isColumnModified(OcdefparPeer::COSCONSTRUC)) $criteria->add(OcdefparPeer::COSCONSTRUC, $this->cosconstruc);
		if ($this->isColumnModified(OcdefparPeer::ID)) $criteria->add(OcdefparPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdefparPeer::DATABASE_NAME);

		$criteria->add(OcdefparPeer::ID, $this->id);

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

		$copyObj->setRenpar($this->renpar);

		$copyObj->setCosuni($this->cosuni);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setDespar($this->despar);

		$copyObj->setCodtippar($this->codtippar);

		$copyObj->setCoscoling($this->coscoling);

		$copyObj->setCosconstruc($this->cosconstruc);


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
			self::$peer = new OcdefparPeer();
		}
		return self::$peer;
	}

} 