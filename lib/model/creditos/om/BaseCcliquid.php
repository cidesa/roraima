<?php


abstract class BaseCcliquid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ordliq;


	
	protected $monliq;


	
	protected $numche;


	
	protected $codusuaut;


	
	protected $estche;


	
	protected $monaculiq;


	
	protected $cccredit_id;


	
	protected $cccuades_id;


	
	protected $ccpartid_id;


	
	protected $ccsolliq_id;


	
	protected $ccconcep_id;


	
	protected $ccpagter_id;


	
	protected $cccueban_id;


	
	protected $ccprogra_id;

	
	protected $aCccredit;

	
	protected $aCccuades;

	
	protected $aCcpartid;

	
	protected $aCcsolliq;

	
	protected $aCcconcep;

	
	protected $aCcpagter;

	
	protected $aCccueban;

	
	protected $aCcprogra;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getOrdliq()
  {

    return trim($this->ordliq);

  }
  
  public function getMonliq($val=false)
  {

    if($val) return number_format($this->monliq,2,',','.');
    else return $this->monliq;

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getCodusuaut()
  {

    return $this->codusuaut;

  }
  
  public function getEstche()
  {

    return trim($this->estche);

  }
  
  public function getMonaculiq($val=false)
  {

    if($val) return number_format($this->monaculiq,2,',','.');
    else return $this->monaculiq;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCccuadesId()
  {

    return $this->cccuades_id;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcsolliqId()
  {

    return $this->ccsolliq_id;

  }
  
  public function getCcconcepId()
  {

    return $this->ccconcep_id;

  }
  
  public function getCcpagterId()
  {

    return $this->ccpagter_id;

  }
  
  public function getCccuebanId()
  {

    return $this->cccueban_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcliquidPeer::ID;
      }
  
	} 
	
	public function setOrdliq($v)
	{

    if ($this->ordliq !== $v) {
        $this->ordliq = $v;
        $this->modifiedColumns[] = CcliquidPeer::ORDLIQ;
      }
  
	} 
	
	public function setMonliq($v)
	{

    if ($this->monliq !== $v) {
        $this->monliq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcliquidPeer::MONLIQ;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = CcliquidPeer::NUMCHE;
      }
  
	} 
	
	public function setCodusuaut($v)
	{

    if ($this->codusuaut !== $v) {
        $this->codusuaut = $v;
        $this->modifiedColumns[] = CcliquidPeer::CODUSUAUT;
      }
  
	} 
	
	public function setEstche($v)
	{

    if ($this->estche !== $v) {
        $this->estche = $v;
        $this->modifiedColumns[] = CcliquidPeer::ESTCHE;
      }
  
	} 
	
	public function setMonaculiq($v)
	{

    if ($this->monaculiq !== $v) {
        $this->monaculiq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcliquidPeer::MONACULIQ;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCccuadesId($v)
	{

    if ($this->cccuades_id !== $v) {
        $this->cccuades_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCCUADES_ID;
      }
  
		if ($this->aCccuades !== null && $this->aCccuades->getId() !== $v) {
			$this->aCccuades = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcsolliqId($v)
	{

    if ($this->ccsolliq_id !== $v) {
        $this->ccsolliq_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCSOLLIQ_ID;
      }
  
		if ($this->aCcsolliq !== null && $this->aCcsolliq->getId() !== $v) {
			$this->aCcsolliq = null;
		}

	} 
	
	public function setCcconcepId($v)
	{

    if ($this->ccconcep_id !== $v) {
        $this->ccconcep_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCCONCEP_ID;
      }
  
		if ($this->aCcconcep !== null && $this->aCcconcep->getId() !== $v) {
			$this->aCcconcep = null;
		}

	} 
	
	public function setCcpagterId($v)
	{

    if ($this->ccpagter_id !== $v) {
        $this->ccpagter_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCPAGTER_ID;
      }
  
		if ($this->aCcpagter !== null && $this->aCcpagter->getId() !== $v) {
			$this->aCcpagter = null;
		}

	} 
	
	public function setCccuebanId($v)
	{

    if ($this->cccueban_id !== $v) {
        $this->cccueban_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCCUEBAN_ID;
      }
  
		if ($this->aCccueban !== null && $this->aCccueban->getId() !== $v) {
			$this->aCccueban = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcliquidPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ordliq = $rs->getString($startcol + 1);

      $this->monliq = $rs->getFloat($startcol + 2);

      $this->numche = $rs->getString($startcol + 3);

      $this->codusuaut = $rs->getInt($startcol + 4);

      $this->estche = $rs->getString($startcol + 5);

      $this->monaculiq = $rs->getFloat($startcol + 6);

      $this->cccredit_id = $rs->getInt($startcol + 7);

      $this->cccuades_id = $rs->getInt($startcol + 8);

      $this->ccpartid_id = $rs->getInt($startcol + 9);

      $this->ccsolliq_id = $rs->getInt($startcol + 10);

      $this->ccconcep_id = $rs->getInt($startcol + 11);

      $this->ccpagter_id = $rs->getInt($startcol + 12);

      $this->cccueban_id = $rs->getInt($startcol + 13);

      $this->ccprogra_id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccliquid object", $e);
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
			$con = Propel::getConnection(CcliquidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcliquidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcliquidPeer::DATABASE_NAME);
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


												
			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCccuades !== null) {
				if ($this->aCccuades->isModified()) {
					$affectedRows += $this->aCccuades->save($con);
				}
				$this->setCccuades($this->aCccuades);
			}

			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcsolliq !== null) {
				if ($this->aCcsolliq->isModified()) {
					$affectedRows += $this->aCcsolliq->save($con);
				}
				$this->setCcsolliq($this->aCcsolliq);
			}

			if ($this->aCcconcep !== null) {
				if ($this->aCcconcep->isModified()) {
					$affectedRows += $this->aCcconcep->save($con);
				}
				$this->setCcconcep($this->aCcconcep);
			}

			if ($this->aCcpagter !== null) {
				if ($this->aCcpagter->isModified()) {
					$affectedRows += $this->aCcpagter->save($con);
				}
				$this->setCcpagter($this->aCcpagter);
			}

			if ($this->aCccueban !== null) {
				if ($this->aCccueban->isModified()) {
					$affectedRows += $this->aCccueban->save($con);
				}
				$this->setCccueban($this->aCccueban);
			}

			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcliquidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcliquidPeer::doUpdate($this, $con);
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


												
			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCccuades !== null) {
				if (!$this->aCccuades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccuades->getValidationFailures());
				}
			}

			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcsolliq !== null) {
				if (!$this->aCcsolliq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolliq->getValidationFailures());
				}
			}

			if ($this->aCcconcep !== null) {
				if (!$this->aCcconcep->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcconcep->getValidationFailures());
				}
			}

			if ($this->aCcpagter !== null) {
				if (!$this->aCcpagter->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpagter->getValidationFailures());
				}
			}

			if ($this->aCccueban !== null) {
				if (!$this->aCccueban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccueban->getValidationFailures());
				}
			}

			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}


			if (($retval = CcliquidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcliquidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getOrdliq();
				break;
			case 2:
				return $this->getMonliq();
				break;
			case 3:
				return $this->getNumche();
				break;
			case 4:
				return $this->getCodusuaut();
				break;
			case 5:
				return $this->getEstche();
				break;
			case 6:
				return $this->getMonaculiq();
				break;
			case 7:
				return $this->getCccreditId();
				break;
			case 8:
				return $this->getCccuadesId();
				break;
			case 9:
				return $this->getCcpartidId();
				break;
			case 10:
				return $this->getCcsolliqId();
				break;
			case 11:
				return $this->getCcconcepId();
				break;
			case 12:
				return $this->getCcpagterId();
				break;
			case 13:
				return $this->getCccuebanId();
				break;
			case 14:
				return $this->getCcprograId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcliquidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOrdliq(),
			$keys[2] => $this->getMonliq(),
			$keys[3] => $this->getNumche(),
			$keys[4] => $this->getCodusuaut(),
			$keys[5] => $this->getEstche(),
			$keys[6] => $this->getMonaculiq(),
			$keys[7] => $this->getCccreditId(),
			$keys[8] => $this->getCccuadesId(),
			$keys[9] => $this->getCcpartidId(),
			$keys[10] => $this->getCcsolliqId(),
			$keys[11] => $this->getCcconcepId(),
			$keys[12] => $this->getCcpagterId(),
			$keys[13] => $this->getCccuebanId(),
			$keys[14] => $this->getCcprograId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcliquidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setOrdliq($value);
				break;
			case 2:
				$this->setMonliq($value);
				break;
			case 3:
				$this->setNumche($value);
				break;
			case 4:
				$this->setCodusuaut($value);
				break;
			case 5:
				$this->setEstche($value);
				break;
			case 6:
				$this->setMonaculiq($value);
				break;
			case 7:
				$this->setCccreditId($value);
				break;
			case 8:
				$this->setCccuadesId($value);
				break;
			case 9:
				$this->setCcpartidId($value);
				break;
			case 10:
				$this->setCcsolliqId($value);
				break;
			case 11:
				$this->setCcconcepId($value);
				break;
			case 12:
				$this->setCcpagterId($value);
				break;
			case 13:
				$this->setCccuebanId($value);
				break;
			case 14:
				$this->setCcprograId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcliquidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrdliq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonliq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumche($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodusuaut($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstche($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonaculiq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCccreditId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCccuadesId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcpartidId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcsolliqId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCcconcepId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCcpagterId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCccuebanId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCcprograId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcliquidPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcliquidPeer::ID)) $criteria->add(CcliquidPeer::ID, $this->id);
		if ($this->isColumnModified(CcliquidPeer::ORDLIQ)) $criteria->add(CcliquidPeer::ORDLIQ, $this->ordliq);
		if ($this->isColumnModified(CcliquidPeer::MONLIQ)) $criteria->add(CcliquidPeer::MONLIQ, $this->monliq);
		if ($this->isColumnModified(CcliquidPeer::NUMCHE)) $criteria->add(CcliquidPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(CcliquidPeer::CODUSUAUT)) $criteria->add(CcliquidPeer::CODUSUAUT, $this->codusuaut);
		if ($this->isColumnModified(CcliquidPeer::ESTCHE)) $criteria->add(CcliquidPeer::ESTCHE, $this->estche);
		if ($this->isColumnModified(CcliquidPeer::MONACULIQ)) $criteria->add(CcliquidPeer::MONACULIQ, $this->monaculiq);
		if ($this->isColumnModified(CcliquidPeer::CCCREDIT_ID)) $criteria->add(CcliquidPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcliquidPeer::CCCUADES_ID)) $criteria->add(CcliquidPeer::CCCUADES_ID, $this->cccuades_id);
		if ($this->isColumnModified(CcliquidPeer::CCPARTID_ID)) $criteria->add(CcliquidPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcliquidPeer::CCSOLLIQ_ID)) $criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->ccsolliq_id);
		if ($this->isColumnModified(CcliquidPeer::CCCONCEP_ID)) $criteria->add(CcliquidPeer::CCCONCEP_ID, $this->ccconcep_id);
		if ($this->isColumnModified(CcliquidPeer::CCPAGTER_ID)) $criteria->add(CcliquidPeer::CCPAGTER_ID, $this->ccpagter_id);
		if ($this->isColumnModified(CcliquidPeer::CCCUEBAN_ID)) $criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->cccueban_id);
		if ($this->isColumnModified(CcliquidPeer::CCPROGRA_ID)) $criteria->add(CcliquidPeer::CCPROGRA_ID, $this->ccprogra_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcliquidPeer::DATABASE_NAME);

		$criteria->add(CcliquidPeer::ID, $this->id);

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

		$copyObj->setOrdliq($this->ordliq);

		$copyObj->setMonliq($this->monliq);

		$copyObj->setNumche($this->numche);

		$copyObj->setCodusuaut($this->codusuaut);

		$copyObj->setEstche($this->estche);

		$copyObj->setMonaculiq($this->monaculiq);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCccuadesId($this->cccuades_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcsolliqId($this->ccsolliq_id);

		$copyObj->setCcconcepId($this->ccconcep_id);

		$copyObj->setCcpagterId($this->ccpagter_id);

		$copyObj->setCccuebanId($this->cccueban_id);

		$copyObj->setCcprograId($this->ccprogra_id);


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
			self::$peer = new CcliquidPeer();
		}
		return self::$peer;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCccuades($v)
	{


		if ($v === null) {
			$this->setCccuadesId(NULL);
		} else {
			$this->setCccuadesId($v->getId());
		}


		$this->aCccuades = $v;
	}


	
	public function getCccuades($con = null)
	{
		if ($this->aCccuades === null && ($this->cccuades_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';

      $c = new Criteria();
      $c->add(CccuadesPeer::ID,$this->cccuades_id);
      
			$this->aCccuades = CccuadesPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccuades;
	}

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
	}

	
	public function setCcsolliq($v)
	{


		if ($v === null) {
			$this->setCcsolliqId(NULL);
		} else {
			$this->setCcsolliqId($v->getId());
		}


		$this->aCcsolliq = $v;
	}


	
	public function getCcsolliq($con = null)
	{
		if ($this->aCcsolliq === null && ($this->ccsolliq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';

      $c = new Criteria();
      $c->add(CcsolliqPeer::ID,$this->ccsolliq_id);
      
			$this->aCcsolliq = CcsolliqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolliq;
	}

	
	public function setCcconcep($v)
	{


		if ($v === null) {
			$this->setCcconcepId(NULL);
		} else {
			$this->setCcconcepId($v->getId());
		}


		$this->aCcconcep = $v;
	}


	
	public function getCcconcep($con = null)
	{
		if ($this->aCcconcep === null && ($this->ccconcep_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcconcepPeer.php';

      $c = new Criteria();
      $c->add(CcconcepPeer::ID,$this->ccconcep_id);
      
			$this->aCcconcep = CcconcepPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcconcep;
	}

	
	public function setCcpagter($v)
	{


		if ($v === null) {
			$this->setCcpagterId(NULL);
		} else {
			$this->setCcpagterId($v->getId());
		}


		$this->aCcpagter = $v;
	}


	
	public function getCcpagter($con = null)
	{
		if ($this->aCcpagter === null && ($this->ccpagter_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';

      $c = new Criteria();
      $c->add(CcpagterPeer::ID,$this->ccpagter_id);
      
			$this->aCcpagter = CcpagterPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpagter;
	}

	
	public function setCccueban($v)
	{


		if ($v === null) {
			$this->setCccuebanId(NULL);
		} else {
			$this->setCccuebanId($v->getId());
		}


		$this->aCccueban = $v;
	}


	
	public function getCccueban($con = null)
	{
		if ($this->aCccueban === null && ($this->cccueban_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';

      $c = new Criteria();
      $c->add(CccuebanPeer::ID,$this->cccueban_id);
      
			$this->aCccueban = CccuebanPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccueban;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
	}

} 