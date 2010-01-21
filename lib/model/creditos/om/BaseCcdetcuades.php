<?php


abstract class BaseCcdetcuades extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $monto;


	
	protected $monded;


	
	protected $nrocheqcon;


	
	protected $benpro;


	
	protected $ccpagter_id;


	
	protected $ccbenefi_id;


	
	protected $cccueban_id;


	
	protected $ccconcep_id;


	
	protected $cccuades_id;


	
	protected $cpcausad_id;

	
	protected $aCcpagter;

	
	protected $aCcbenefi;

	
	protected $aCccueban;

	
	protected $aCcconcep;

	
	protected $aCccuades;

	
	protected $aCpcausad;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getMonded($val=false)
  {

    if($val) return number_format($this->monded,2,',','.');
    else return $this->monded;

  }
  
  public function getNrocheqcon()
  {

    return $this->nrocheqcon;

  }
  
  public function getBenpro()
  {

    return $this->benpro;

  }
  
  public function getCcpagterId()
  {

    return $this->ccpagter_id;

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCccuebanId()
  {

    return $this->cccueban_id;

  }
  
  public function getCcconcepId()
  {

    return $this->ccconcep_id;

  }
  
  public function getCccuadesId()
  {

    return $this->cccuades_id;

  }
  
  public function getCpcausadId()
  {

    return $this->cpcausad_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::ID;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdetcuadesPeer::MONTO;
      }
  
	} 
	
	public function setMonded($v)
	{

    if ($this->monded !== $v) {
        $this->monded = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdetcuadesPeer::MONDED;
      }
  
	} 
	
	public function setNrocheqcon($v)
	{

    if ($this->nrocheqcon !== $v) {
        $this->nrocheqcon = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::NROCHEQCON;
      }
  
	} 
	
	public function setBenpro($v)
	{

    if ($this->benpro !== $v) {
        $this->benpro = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::BENPRO;
      }
  
	} 
	
	public function setCcpagterId($v)
	{

    if ($this->ccpagter_id !== $v) {
        $this->ccpagter_id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::CCPAGTER_ID;
      }
  
		if ($this->aCcpagter !== null && $this->aCcpagter->getId() !== $v) {
			$this->aCcpagter = null;
		}

	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCccuebanId($v)
	{

    if ($this->cccueban_id !== $v) {
        $this->cccueban_id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::CCCUEBAN_ID;
      }
  
		if ($this->aCccueban !== null && $this->aCccueban->getId() !== $v) {
			$this->aCccueban = null;
		}

	} 
	
	public function setCcconcepId($v)
	{

    if ($this->ccconcep_id !== $v) {
        $this->ccconcep_id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::CCCONCEP_ID;
      }
  
		if ($this->aCcconcep !== null && $this->aCcconcep->getId() !== $v) {
			$this->aCcconcep = null;
		}

	} 
	
	public function setCccuadesId($v)
	{

    if ($this->cccuades_id !== $v) {
        $this->cccuades_id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::CCCUADES_ID;
      }
  
		if ($this->aCccuades !== null && $this->aCccuades->getId() !== $v) {
			$this->aCccuades = null;
		}

	} 
	
	public function setCpcausadId($v)
	{

    if ($this->cpcausad_id !== $v) {
        $this->cpcausad_id = $v;
        $this->modifiedColumns[] = CcdetcuadesPeer::CPCAUSAD_ID;
      }
  
		if ($this->aCpcausad !== null && $this->aCpcausad->getId() !== $v) {
			$this->aCpcausad = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->monto = $rs->getFloat($startcol + 1);

      $this->monded = $rs->getFloat($startcol + 2);

      $this->nrocheqcon = $rs->getInt($startcol + 3);

      $this->benpro = $rs->getBoolean($startcol + 4);

      $this->ccpagter_id = $rs->getInt($startcol + 5);

      $this->ccbenefi_id = $rs->getInt($startcol + 6);

      $this->cccueban_id = $rs->getInt($startcol + 7);

      $this->ccconcep_id = $rs->getInt($startcol + 8);

      $this->cccuades_id = $rs->getInt($startcol + 9);

      $this->cpcausad_id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdetcuades object", $e);
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
			$con = Propel::getConnection(CcdetcuadesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdetcuadesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdetcuadesPeer::DATABASE_NAME);
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


												
			if ($this->aCcpagter !== null) {
				if ($this->aCcpagter->isModified()) {
					$affectedRows += $this->aCcpagter->save($con);
				}
				$this->setCcpagter($this->aCcpagter);
			}

			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}

			if ($this->aCccueban !== null) {
				if ($this->aCccueban->isModified()) {
					$affectedRows += $this->aCccueban->save($con);
				}
				$this->setCccueban($this->aCccueban);
			}

			if ($this->aCcconcep !== null) {
				if ($this->aCcconcep->isModified()) {
					$affectedRows += $this->aCcconcep->save($con);
				}
				$this->setCcconcep($this->aCcconcep);
			}

			if ($this->aCccuades !== null) {
				if ($this->aCccuades->isModified()) {
					$affectedRows += $this->aCccuades->save($con);
				}
				$this->setCccuades($this->aCccuades);
			}

			if ($this->aCpcausad !== null) {
				if ($this->aCpcausad->isModified()) {
					$affectedRows += $this->aCpcausad->save($con);
				}
				$this->setCpcausad($this->aCpcausad);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdetcuadesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdetcuadesPeer::doUpdate($this, $con);
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


												
			if ($this->aCcpagter !== null) {
				if (!$this->aCcpagter->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpagter->getValidationFailures());
				}
			}

			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}

			if ($this->aCccueban !== null) {
				if (!$this->aCccueban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccueban->getValidationFailures());
				}
			}

			if ($this->aCcconcep !== null) {
				if (!$this->aCcconcep->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcconcep->getValidationFailures());
				}
			}

			if ($this->aCccuades !== null) {
				if (!$this->aCccuades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccuades->getValidationFailures());
				}
			}

			if ($this->aCpcausad !== null) {
				if (!$this->aCpcausad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpcausad->getValidationFailures());
				}
			}


			if (($retval = CcdetcuadesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdetcuadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMonto();
				break;
			case 2:
				return $this->getMonded();
				break;
			case 3:
				return $this->getNrocheqcon();
				break;
			case 4:
				return $this->getBenpro();
				break;
			case 5:
				return $this->getCcpagterId();
				break;
			case 6:
				return $this->getCcbenefiId();
				break;
			case 7:
				return $this->getCccuebanId();
				break;
			case 8:
				return $this->getCcconcepId();
				break;
			case 9:
				return $this->getCccuadesId();
				break;
			case 10:
				return $this->getCpcausadId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdetcuadesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMonto(),
			$keys[2] => $this->getMonded(),
			$keys[3] => $this->getNrocheqcon(),
			$keys[4] => $this->getBenpro(),
			$keys[5] => $this->getCcpagterId(),
			$keys[6] => $this->getCcbenefiId(),
			$keys[7] => $this->getCccuebanId(),
			$keys[8] => $this->getCcconcepId(),
			$keys[9] => $this->getCccuadesId(),
			$keys[10] => $this->getCpcausadId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdetcuadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMonto($value);
				break;
			case 2:
				$this->setMonded($value);
				break;
			case 3:
				$this->setNrocheqcon($value);
				break;
			case 4:
				$this->setBenpro($value);
				break;
			case 5:
				$this->setCcpagterId($value);
				break;
			case 6:
				$this->setCcbenefiId($value);
				break;
			case 7:
				$this->setCccuebanId($value);
				break;
			case 8:
				$this->setCcconcepId($value);
				break;
			case 9:
				$this->setCccuadesId($value);
				break;
			case 10:
				$this->setCpcausadId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdetcuadesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonded($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNrocheqcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBenpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcpagterId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcbenefiId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCccuebanId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcconcepId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCccuadesId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCpcausadId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdetcuadesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdetcuadesPeer::ID)) $criteria->add(CcdetcuadesPeer::ID, $this->id);
		if ($this->isColumnModified(CcdetcuadesPeer::MONTO)) $criteria->add(CcdetcuadesPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CcdetcuadesPeer::MONDED)) $criteria->add(CcdetcuadesPeer::MONDED, $this->monded);
		if ($this->isColumnModified(CcdetcuadesPeer::NROCHEQCON)) $criteria->add(CcdetcuadesPeer::NROCHEQCON, $this->nrocheqcon);
		if ($this->isColumnModified(CcdetcuadesPeer::BENPRO)) $criteria->add(CcdetcuadesPeer::BENPRO, $this->benpro);
		if ($this->isColumnModified(CcdetcuadesPeer::CCPAGTER_ID)) $criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->ccpagter_id);
		if ($this->isColumnModified(CcdetcuadesPeer::CCBENEFI_ID)) $criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CcdetcuadesPeer::CCCUEBAN_ID)) $criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->cccueban_id);
		if ($this->isColumnModified(CcdetcuadesPeer::CCCONCEP_ID)) $criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->ccconcep_id);
		if ($this->isColumnModified(CcdetcuadesPeer::CCCUADES_ID)) $criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->cccuades_id);
		if ($this->isColumnModified(CcdetcuadesPeer::CPCAUSAD_ID)) $criteria->add(CcdetcuadesPeer::CPCAUSAD_ID, $this->cpcausad_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdetcuadesPeer::DATABASE_NAME);

		$criteria->add(CcdetcuadesPeer::ID, $this->id);

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

		$copyObj->setMonto($this->monto);

		$copyObj->setMonded($this->monded);

		$copyObj->setNrocheqcon($this->nrocheqcon);

		$copyObj->setBenpro($this->benpro);

		$copyObj->setCcpagterId($this->ccpagter_id);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

		$copyObj->setCccuebanId($this->cccueban_id);

		$copyObj->setCcconcepId($this->ccconcep_id);

		$copyObj->setCccuadesId($this->cccuades_id);

		$copyObj->setCpcausadId($this->cpcausad_id);


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
			self::$peer = new CcdetcuadesPeer();
		}
		return self::$peer;
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

	
	public function setCcbenefi($v)
	{


		if ($v === null) {
			$this->setCcbenefiId(NULL);
		} else {
			$this->setCcbenefiId($v->getId());
		}


		$this->aCcbenefi = $v;
	}


	
	public function getCcbenefi($con = null)
	{
		if ($this->aCcbenefi === null && ($this->ccbenefi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';

      $c = new Criteria();
      $c->add(CcbenefiPeer::ID,$this->ccbenefi_id);
      
			$this->aCcbenefi = CcbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbenefi;
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

	
	public function setCpcausad($v)
	{


		if ($v === null) {
			$this->setCpcausadId(NULL);
		} else {
			$this->setCpcausadId($v->getId());
		}


		$this->aCpcausad = $v;
	}


	
	public function getCpcausad($con = null)
	{
		if ($this->aCpcausad === null && ($this->cpcausad_id !== null)) {
						include_once 'lib/model/presupuesto/om/BaseCpcausadPeer.php';

      $c = new Criteria();
      $c->add(CpcausadPeer::ID,$this->cpcausad_id);
      
			$this->aCpcausad = CpcausadPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpcausad;
	}

} 