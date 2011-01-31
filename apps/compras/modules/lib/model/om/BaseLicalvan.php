<?php


abstract class BaseLicalvan extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $lireglic_id;


	
	protected $codlic;


	
	protected $codpro;


	
	protected $vandecla;


	
	protected $vanmayor;


	
	protected $vanprefer;


	
	protected $preadipym;


	
	protected $preportot;


	
	protected $preevaofe;


	
	protected $preajusta;


	
	protected $id;

	
	protected $aLireglic;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLireglicId()
  {

    return $this->lireglic_id;

  }
  
  public function getCodlic()
  {

    return trim($this->codlic);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getVandecla($val=false)
  {

    if($val) return number_format($this->vandecla,2,',','.');
    else return $this->vandecla;

  }
  
  public function getVanmayor($val=false)
  {

    if($val) return number_format($this->vanmayor,2,',','.');
    else return $this->vanmayor;

  }
  
  public function getVanprefer($val=false)
  {

    if($val) return number_format($this->vanprefer,2,',','.');
    else return $this->vanprefer;

  }
  
  public function getPreadipym($val=false)
  {

    if($val) return number_format($this->preadipym,2,',','.');
    else return $this->preadipym;

  }
  
  public function getPreportot($val=false)
  {

    if($val) return number_format($this->preportot,2,',','.');
    else return $this->preportot;

  }
  
  public function getPreevaofe($val=false)
  {

    if($val) return number_format($this->preevaofe,2,',','.');
    else return $this->preevaofe;

  }
  
  public function getPreajusta($val=false)
  {

    if($val) return number_format($this->preajusta,2,',','.');
    else return $this->preajusta;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLireglicId($v)
	{

    if ($this->lireglic_id !== $v) {
        $this->lireglic_id = $v;
        $this->modifiedColumns[] = LicalvanPeer::LIREGLIC_ID;
      }
  
		if ($this->aLireglic !== null && $this->aLireglic->getId() !== $v) {
			$this->aLireglic = null;
		}

	} 
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = LicalvanPeer::CODLIC;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LicalvanPeer::CODPRO;
      }
  
	} 
	
	public function setVandecla($v)
	{

    if ($this->vandecla !== $v) {
        $this->vandecla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::VANDECLA;
      }
  
	} 
	
	public function setVanmayor($v)
	{

    if ($this->vanmayor !== $v) {
        $this->vanmayor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::VANMAYOR;
      }
  
	} 
	
	public function setVanprefer($v)
	{

    if ($this->vanprefer !== $v) {
        $this->vanprefer = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::VANPREFER;
      }
  
	} 
	
	public function setPreadipym($v)
	{

    if ($this->preadipym !== $v) {
        $this->preadipym = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::PREADIPYM;
      }
  
	} 
	
	public function setPreportot($v)
	{

    if ($this->preportot !== $v) {
        $this->preportot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::PREPORTOT;
      }
  
	} 
	
	public function setPreevaofe($v)
	{

    if ($this->preevaofe !== $v) {
        $this->preevaofe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::PREEVAOFE;
      }
  
	} 
	
	public function setPreajusta($v)
	{

    if ($this->preajusta !== $v) {
        $this->preajusta = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicalvanPeer::PREAJUSTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LicalvanPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->lireglic_id = $rs->getInt($startcol + 0);

      $this->codlic = $rs->getString($startcol + 1);

      $this->codpro = $rs->getString($startcol + 2);

      $this->vandecla = $rs->getFloat($startcol + 3);

      $this->vanmayor = $rs->getFloat($startcol + 4);

      $this->vanprefer = $rs->getFloat($startcol + 5);

      $this->preadipym = $rs->getFloat($startcol + 6);

      $this->preportot = $rs->getFloat($startcol + 7);

      $this->preevaofe = $rs->getFloat($startcol + 8);

      $this->preajusta = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Licalvan object", $e);
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
			$con = Propel::getConnection(LicalvanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LicalvanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LicalvanPeer::DATABASE_NAME);
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


												
			if ($this->aLireglic !== null) {
				if ($this->aLireglic->isModified()) {
					$affectedRows += $this->aLireglic->save($con);
				}
				$this->setLireglic($this->aLireglic);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LicalvanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LicalvanPeer::doUpdate($this, $con);
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


												
			if ($this->aLireglic !== null) {
				if (!$this->aLireglic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLireglic->getValidationFailures());
				}
			}


			if (($retval = LicalvanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicalvanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLireglicId();
				break;
			case 1:
				return $this->getCodlic();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getVandecla();
				break;
			case 4:
				return $this->getVanmayor();
				break;
			case 5:
				return $this->getVanprefer();
				break;
			case 6:
				return $this->getPreadipym();
				break;
			case 7:
				return $this->getPreportot();
				break;
			case 8:
				return $this->getPreevaofe();
				break;
			case 9:
				return $this->getPreajusta();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicalvanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLireglicId(),
			$keys[1] => $this->getCodlic(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getVandecla(),
			$keys[4] => $this->getVanmayor(),
			$keys[5] => $this->getVanprefer(),
			$keys[6] => $this->getPreadipym(),
			$keys[7] => $this->getPreportot(),
			$keys[8] => $this->getPreevaofe(),
			$keys[9] => $this->getPreajusta(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicalvanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLireglicId($value);
				break;
			case 1:
				$this->setCodlic($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setVandecla($value);
				break;
			case 4:
				$this->setVanmayor($value);
				break;
			case 5:
				$this->setVanprefer($value);
				break;
			case 6:
				$this->setPreadipym($value);
				break;
			case 7:
				$this->setPreportot($value);
				break;
			case 8:
				$this->setPreevaofe($value);
				break;
			case 9:
				$this->setPreajusta($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicalvanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLireglicId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodlic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setVandecla($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setVanmayor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVanprefer($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPreadipym($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPreportot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPreevaofe($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPreajusta($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LicalvanPeer::DATABASE_NAME);

		if ($this->isColumnModified(LicalvanPeer::LIREGLIC_ID)) $criteria->add(LicalvanPeer::LIREGLIC_ID, $this->lireglic_id);
		if ($this->isColumnModified(LicalvanPeer::CODLIC)) $criteria->add(LicalvanPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(LicalvanPeer::CODPRO)) $criteria->add(LicalvanPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LicalvanPeer::VANDECLA)) $criteria->add(LicalvanPeer::VANDECLA, $this->vandecla);
		if ($this->isColumnModified(LicalvanPeer::VANMAYOR)) $criteria->add(LicalvanPeer::VANMAYOR, $this->vanmayor);
		if ($this->isColumnModified(LicalvanPeer::VANPREFER)) $criteria->add(LicalvanPeer::VANPREFER, $this->vanprefer);
		if ($this->isColumnModified(LicalvanPeer::PREADIPYM)) $criteria->add(LicalvanPeer::PREADIPYM, $this->preadipym);
		if ($this->isColumnModified(LicalvanPeer::PREPORTOT)) $criteria->add(LicalvanPeer::PREPORTOT, $this->preportot);
		if ($this->isColumnModified(LicalvanPeer::PREEVAOFE)) $criteria->add(LicalvanPeer::PREEVAOFE, $this->preevaofe);
		if ($this->isColumnModified(LicalvanPeer::PREAJUSTA)) $criteria->add(LicalvanPeer::PREAJUSTA, $this->preajusta);
		if ($this->isColumnModified(LicalvanPeer::ID)) $criteria->add(LicalvanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LicalvanPeer::DATABASE_NAME);

		$criteria->add(LicalvanPeer::ID, $this->id);

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

		$copyObj->setLireglicId($this->lireglic_id);

		$copyObj->setCodlic($this->codlic);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setVandecla($this->vandecla);

		$copyObj->setVanmayor($this->vanmayor);

		$copyObj->setVanprefer($this->vanprefer);

		$copyObj->setPreadipym($this->preadipym);

		$copyObj->setPreportot($this->preportot);

		$copyObj->setPreevaofe($this->preevaofe);

		$copyObj->setPreajusta($this->preajusta);


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
			self::$peer = new LicalvanPeer();
		}
		return self::$peer;
	}

	
	public function setLireglic($v)
	{


		if ($v === null) {
			$this->setLireglicId(NULL);
		} else {
			$this->setLireglicId($v->getId());
		}


		$this->aLireglic = $v;
	}


	
	public function getLireglic($con = null)
	{
		if ($this->aLireglic === null && ($this->lireglic_id !== null)) {
						include_once 'lib/model/om/BaseLireglicPeer.php';

			$this->aLireglic = LireglicPeer::retrieveByPK($this->lireglic_id, $con);

			
		}
		return $this->aLireglic;
	}

} 