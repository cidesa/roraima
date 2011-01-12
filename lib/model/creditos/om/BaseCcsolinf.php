<?php


abstract class BaseCcsolinf extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomsolinf;


	
	protected $obssolinf;


	
	protected $fecsolinf;


	
	protected $ccgerenc_id;


	
	protected $ccanalis_id;


	
	protected $ccclainf_id;

	
	protected $aCcgerenc;

	
	protected $aCcanalis;

	
	protected $aCcclainf;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomsolinf()
  {

    return trim($this->nomsolinf);

  }
  
  public function getObssolinf()
  {

    return trim($this->obssolinf);

  }
  
  public function getFecsolinf($format = 'Y-m-d')
  {

    if ($this->fecsolinf === null || $this->fecsolinf === '') {
      return null;
    } elseif (!is_int($this->fecsolinf)) {
            $ts = adodb_strtotime($this->fecsolinf);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsolinf] as date/time value: " . var_export($this->fecsolinf, true));
      }
    } else {
      $ts = $this->fecsolinf;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
  
  public function getCcanalisId()
  {

    return $this->ccanalis_id;

  }
  
  public function getCcclainfId()
  {

    return $this->ccclainf_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsolinfPeer::ID;
      }
  
	} 
	
	public function setNomsolinf($v)
	{

    if ($this->nomsolinf !== $v) {
        $this->nomsolinf = $v;
        $this->modifiedColumns[] = CcsolinfPeer::NOMSOLINF;
      }
  
	} 
	
	public function setObssolinf($v)
	{

    if ($this->obssolinf !== $v) {
        $this->obssolinf = $v;
        $this->modifiedColumns[] = CcsolinfPeer::OBSSOLINF;
      }
  
	} 
	
	public function setFecsolinf($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsolinf] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsolinf !== $ts) {
      $this->fecsolinf = $ts;
      $this->modifiedColumns[] = CcsolinfPeer::FECSOLINF;
    }

	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcsolinfPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
	
	public function setCcanalisId($v)
	{

    if ($this->ccanalis_id !== $v) {
        $this->ccanalis_id = $v;
        $this->modifiedColumns[] = CcsolinfPeer::CCANALIS_ID;
      }
  
		if ($this->aCcanalis !== null && $this->aCcanalis->getId() !== $v) {
			$this->aCcanalis = null;
		}

	} 
	
	public function setCcclainfId($v)
	{

    if ($this->ccclainf_id !== $v) {
        $this->ccclainf_id = $v;
        $this->modifiedColumns[] = CcsolinfPeer::CCCLAINF_ID;
      }
  
		if ($this->aCcclainf !== null && $this->aCcclainf->getId() !== $v) {
			$this->aCcclainf = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomsolinf = $rs->getString($startcol + 1);

      $this->obssolinf = $rs->getString($startcol + 2);

      $this->fecsolinf = $rs->getDate($startcol + 3, null);

      $this->ccgerenc_id = $rs->getInt($startcol + 4);

      $this->ccanalis_id = $rs->getInt($startcol + 5);

      $this->ccclainf_id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsolinf object", $e);
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
			$con = Propel::getConnection(CcsolinfPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsolinfPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsolinfPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}

			if ($this->aCcanalis !== null) {
				if ($this->aCcanalis->isModified()) {
					$affectedRows += $this->aCcanalis->save($con);
				}
				$this->setCcanalis($this->aCcanalis);
			}

			if ($this->aCcclainf !== null) {
				if ($this->aCcclainf->isModified()) {
					$affectedRows += $this->aCcclainf->save($con);
				}
				$this->setCcclainf($this->aCcclainf);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsolinfPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsolinfPeer::doUpdate($this, $con);
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


												
			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}

			if ($this->aCcanalis !== null) {
				if (!$this->aCcanalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcanalis->getValidationFailures());
				}
			}

			if ($this->aCcclainf !== null) {
				if (!$this->aCcclainf->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcclainf->getValidationFailures());
				}
			}


			if (($retval = CcsolinfPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolinfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomsolinf();
				break;
			case 2:
				return $this->getObssolinf();
				break;
			case 3:
				return $this->getFecsolinf();
				break;
			case 4:
				return $this->getCcgerencId();
				break;
			case 5:
				return $this->getCcanalisId();
				break;
			case 6:
				return $this->getCcclainfId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolinfPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomsolinf(),
			$keys[2] => $this->getObssolinf(),
			$keys[3] => $this->getFecsolinf(),
			$keys[4] => $this->getCcgerencId(),
			$keys[5] => $this->getCcanalisId(),
			$keys[6] => $this->getCcclainfId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolinfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomsolinf($value);
				break;
			case 2:
				$this->setObssolinf($value);
				break;
			case 3:
				$this->setFecsolinf($value);
				break;
			case 4:
				$this->setCcgerencId($value);
				break;
			case 5:
				$this->setCcanalisId($value);
				break;
			case 6:
				$this->setCcclainfId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolinfPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomsolinf($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObssolinf($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecsolinf($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcgerencId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcanalisId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcclainfId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsolinfPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsolinfPeer::ID)) $criteria->add(CcsolinfPeer::ID, $this->id);
		if ($this->isColumnModified(CcsolinfPeer::NOMSOLINF)) $criteria->add(CcsolinfPeer::NOMSOLINF, $this->nomsolinf);
		if ($this->isColumnModified(CcsolinfPeer::OBSSOLINF)) $criteria->add(CcsolinfPeer::OBSSOLINF, $this->obssolinf);
		if ($this->isColumnModified(CcsolinfPeer::FECSOLINF)) $criteria->add(CcsolinfPeer::FECSOLINF, $this->fecsolinf);
		if ($this->isColumnModified(CcsolinfPeer::CCGERENC_ID)) $criteria->add(CcsolinfPeer::CCGERENC_ID, $this->ccgerenc_id);
		if ($this->isColumnModified(CcsolinfPeer::CCANALIS_ID)) $criteria->add(CcsolinfPeer::CCANALIS_ID, $this->ccanalis_id);
		if ($this->isColumnModified(CcsolinfPeer::CCCLAINF_ID)) $criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->ccclainf_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsolinfPeer::DATABASE_NAME);

		$criteria->add(CcsolinfPeer::ID, $this->id);

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

		$copyObj->setNomsolinf($this->nomsolinf);

		$copyObj->setObssolinf($this->obssolinf);

		$copyObj->setFecsolinf($this->fecsolinf);

		$copyObj->setCcgerencId($this->ccgerenc_id);

		$copyObj->setCcanalisId($this->ccanalis_id);

		$copyObj->setCcclainfId($this->ccclainf_id);


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
			self::$peer = new CcsolinfPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
	}

	
	public function setCcanalis($v)
	{


		if ($v === null) {
			$this->setCcanalisId(NULL);
		} else {
			$this->setCcanalisId($v->getId());
		}


		$this->aCcanalis = $v;
	}


	
	public function getCcanalis($con = null)
	{
		if ($this->aCcanalis === null && ($this->ccanalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';

      $c = new Criteria();
      $c->add(CcanalisPeer::ID,$this->ccanalis_id);
      
			$this->aCcanalis = CcanalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcanalis;
	}

	
	public function setCcclainf($v)
	{


		if ($v === null) {
			$this->setCcclainfId(NULL);
		} else {
			$this->setCcclainfId($v->getId());
		}


		$this->aCcclainf = $v;
	}


	
	public function getCcclainf($con = null)
	{
		if ($this->aCcclainf === null && ($this->ccclainf_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcclainfPeer.php';

      $c = new Criteria();
      $c->add(CcclainfPeer::ID,$this->ccclainf_id);
      
			$this->aCcclainf = CcclainfPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcclainf;
	}

} 