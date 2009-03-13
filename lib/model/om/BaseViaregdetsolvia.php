<?php


abstract class BaseViaregdetsolvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $viaregsolvia_id;


	
	protected $viaregente_id;


	
	protected $viaregact_id;


	
	protected $occiudad_id;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $fecha_sal;


	
	protected $fecha_reg;


	
	protected $num_dia;


	
	protected $monto;


	
	protected $id;

	
	protected $aViaregsolvia;

	
	protected $aViaregente;

	
	protected $aViaregact;

	
	protected $aOcciudad;

	
	protected $collViaregdetgassolvias;

	
	protected $lastViaregdetgassolviaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getViaregsolviaId()
  {

    return $this->viaregsolvia_id;

  }
  
  public function getViaregenteId()
  {

    return $this->viaregente_id;

  }
  
  public function getViaregactId()
  {

    return $this->viaregact_id;

  }
  
  public function getOcciudadId()
  {

    return $this->occiudad_id;

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getFechaSal($format = 'Y-m-d')
  {

    if ($this->fecha_sal === null || $this->fecha_sal === '') {
      return null;
    } elseif (!is_int($this->fecha_sal)) {
            $ts = adodb_strtotime($this->fecha_sal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha_sal] as date/time value: " . var_export($this->fecha_sal, true));
      }
    } else {
      $ts = $this->fecha_sal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechaReg($format = 'Y-m-d')
  {

    if ($this->fecha_reg === null || $this->fecha_reg === '') {
      return null;
    } elseif (!is_int($this->fecha_reg)) {
            $ts = adodb_strtotime($this->fecha_reg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha_reg] as date/time value: " . var_export($this->fecha_reg, true));
      }
    } else {
      $ts = $this->fecha_reg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumDia($val=false)
  {

    if($val) return number_format($this->num_dia,2,',','.');
    else return $this->num_dia;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setViaregsolviaId($v)
	{

    if ($this->viaregsolvia_id !== $v) {
        $this->viaregsolvia_id = $v;
        $this->modifiedColumns[] = ViaregdetsolviaPeer::VIAREGSOLVIA_ID;
      }
  
		if ($this->aViaregsolvia !== null && $this->aViaregsolvia->getId() !== $v) {
			$this->aViaregsolvia = null;
		}

	} 
	
	public function setViaregenteId($v)
	{

    if ($this->viaregente_id !== $v) {
        $this->viaregente_id = $v;
        $this->modifiedColumns[] = ViaregdetsolviaPeer::VIAREGENTE_ID;
      }
  
		if ($this->aViaregente !== null && $this->aViaregente->getId() !== $v) {
			$this->aViaregente = null;
		}

	} 
	
	public function setViaregactId($v)
	{

    if ($this->viaregact_id !== $v) {
        $this->viaregact_id = $v;
        $this->modifiedColumns[] = ViaregdetsolviaPeer::VIAREGACT_ID;
      }
  
		if ($this->aViaregact !== null && $this->aViaregact->getId() !== $v) {
			$this->aViaregact = null;
		}

	} 
	
	public function setOcciudadId($v)
	{

    if ($this->occiudad_id !== $v) {
        $this->occiudad_id = $v;
        $this->modifiedColumns[] = ViaregdetsolviaPeer::OCCIUDAD_ID;
      }
  
		if ($this->aOcciudad !== null && $this->aOcciudad->getId() !== $v) {
			$this->aOcciudad = null;
		}

	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = ViaregdetsolviaPeer::CODMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViaregdetsolviaPeer::VALMON;
      }
  
	} 
	
	public function setFechaSal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha_sal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha_sal !== $ts) {
      $this->fecha_sal = $ts;
      $this->modifiedColumns[] = ViaregdetsolviaPeer::FECHA_SAL;
    }

	} 
	
	public function setFechaReg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha_reg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha_reg !== $ts) {
      $this->fecha_reg = $ts;
      $this->modifiedColumns[] = ViaregdetsolviaPeer::FECHA_REG;
    }

	} 
	
	public function setNumDia($v)
	{

    if ($this->num_dia !== $v) {
        $this->num_dia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViaregdetsolviaPeer::NUM_DIA;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViaregdetsolviaPeer::MONTO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregdetsolviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->viaregsolvia_id = $rs->getInt($startcol + 0);

      $this->viaregente_id = $rs->getInt($startcol + 1);

      $this->viaregact_id = $rs->getInt($startcol + 2);

      $this->occiudad_id = $rs->getInt($startcol + 3);

      $this->codmon = $rs->getString($startcol + 4);

      $this->valmon = $rs->getFloat($startcol + 5);

      $this->fecha_sal = $rs->getDate($startcol + 6, null);

      $this->fecha_reg = $rs->getDate($startcol + 7, null);

      $this->num_dia = $rs->getFloat($startcol + 8);

      $this->monto = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregdetsolvia object", $e);
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
			$con = Propel::getConnection(ViaregdetsolviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregdetsolviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregdetsolviaPeer::DATABASE_NAME);
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


												
			if ($this->aViaregsolvia !== null) {
				if ($this->aViaregsolvia->isModified()) {
					$affectedRows += $this->aViaregsolvia->save($con);
				}
				$this->setViaregsolvia($this->aViaregsolvia);
			}

			if ($this->aViaregente !== null) {
				if ($this->aViaregente->isModified()) {
					$affectedRows += $this->aViaregente->save($con);
				}
				$this->setViaregente($this->aViaregente);
			}

			if ($this->aViaregact !== null) {
				if ($this->aViaregact->isModified()) {
					$affectedRows += $this->aViaregact->save($con);
				}
				$this->setViaregact($this->aViaregact);
			}

			if ($this->aOcciudad !== null) {
				if ($this->aOcciudad->isModified()) {
					$affectedRows += $this->aOcciudad->save($con);
				}
				$this->setOcciudad($this->aOcciudad);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViaregdetsolviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregdetsolviaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViaregdetgassolvias !== null) {
				foreach($this->collViaregdetgassolvias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aViaregsolvia !== null) {
				if (!$this->aViaregsolvia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregsolvia->getValidationFailures());
				}
			}

			if ($this->aViaregente !== null) {
				if (!$this->aViaregente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregente->getValidationFailures());
				}
			}

			if ($this->aViaregact !== null) {
				if (!$this->aViaregact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregact->getValidationFailures());
				}
			}

			if ($this->aOcciudad !== null) {
				if (!$this->aOcciudad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcciudad->getValidationFailures());
				}
			}


			if (($retval = ViaregdetsolviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViaregdetgassolvias !== null) {
					foreach($this->collViaregdetgassolvias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregdetsolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getViaregsolviaId();
				break;
			case 1:
				return $this->getViaregenteId();
				break;
			case 2:
				return $this->getViaregactId();
				break;
			case 3:
				return $this->getOcciudadId();
				break;
			case 4:
				return $this->getCodmon();
				break;
			case 5:
				return $this->getValmon();
				break;
			case 6:
				return $this->getFechaSal();
				break;
			case 7:
				return $this->getFechaReg();
				break;
			case 8:
				return $this->getNumDia();
				break;
			case 9:
				return $this->getMonto();
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
		$keys = ViaregdetsolviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getViaregsolviaId(),
			$keys[1] => $this->getViaregenteId(),
			$keys[2] => $this->getViaregactId(),
			$keys[3] => $this->getOcciudadId(),
			$keys[4] => $this->getCodmon(),
			$keys[5] => $this->getValmon(),
			$keys[6] => $this->getFechaSal(),
			$keys[7] => $this->getFechaReg(),
			$keys[8] => $this->getNumDia(),
			$keys[9] => $this->getMonto(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregdetsolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setViaregsolviaId($value);
				break;
			case 1:
				$this->setViaregenteId($value);
				break;
			case 2:
				$this->setViaregactId($value);
				break;
			case 3:
				$this->setOcciudadId($value);
				break;
			case 4:
				$this->setCodmon($value);
				break;
			case 5:
				$this->setValmon($value);
				break;
			case 6:
				$this->setFechaSal($value);
				break;
			case 7:
				$this->setFechaReg($value);
				break;
			case 8:
				$this->setNumDia($value);
				break;
			case 9:
				$this->setMonto($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregdetsolviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setViaregsolviaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setViaregenteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setViaregactId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOcciudadId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodmon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setValmon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaSal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFechaReg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumDia($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonto($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregdetsolviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregdetsolviaPeer::VIAREGSOLVIA_ID)) $criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->viaregsolvia_id);
		if ($this->isColumnModified(ViaregdetsolviaPeer::VIAREGENTE_ID)) $criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->viaregente_id);
		if ($this->isColumnModified(ViaregdetsolviaPeer::VIAREGACT_ID)) $criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->viaregact_id);
		if ($this->isColumnModified(ViaregdetsolviaPeer::OCCIUDAD_ID)) $criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->occiudad_id);
		if ($this->isColumnModified(ViaregdetsolviaPeer::CODMON)) $criteria->add(ViaregdetsolviaPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(ViaregdetsolviaPeer::VALMON)) $criteria->add(ViaregdetsolviaPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(ViaregdetsolviaPeer::FECHA_SAL)) $criteria->add(ViaregdetsolviaPeer::FECHA_SAL, $this->fecha_sal);
		if ($this->isColumnModified(ViaregdetsolviaPeer::FECHA_REG)) $criteria->add(ViaregdetsolviaPeer::FECHA_REG, $this->fecha_reg);
		if ($this->isColumnModified(ViaregdetsolviaPeer::NUM_DIA)) $criteria->add(ViaregdetsolviaPeer::NUM_DIA, $this->num_dia);
		if ($this->isColumnModified(ViaregdetsolviaPeer::MONTO)) $criteria->add(ViaregdetsolviaPeer::MONTO, $this->monto);
		if ($this->isColumnModified(ViaregdetsolviaPeer::ID)) $criteria->add(ViaregdetsolviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregdetsolviaPeer::DATABASE_NAME);

		$criteria->add(ViaregdetsolviaPeer::ID, $this->id);

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

		$copyObj->setViaregsolviaId($this->viaregsolvia_id);

		$copyObj->setViaregenteId($this->viaregente_id);

		$copyObj->setViaregactId($this->viaregact_id);

		$copyObj->setOcciudadId($this->occiudad_id);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setFechaSal($this->fecha_sal);

		$copyObj->setFechaReg($this->fecha_reg);

		$copyObj->setNumDia($this->num_dia);

		$copyObj->setMonto($this->monto);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViaregdetgassolvias() as $relObj) {
				$copyObj->addViaregdetgassolvia($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new ViaregdetsolviaPeer();
		}
		return self::$peer;
	}

	
	public function setViaregsolvia($v)
	{


		if ($v === null) {
			$this->setViaregsolviaId(NULL);
		} else {
			$this->setViaregsolviaId($v->getId());
		}


		$this->aViaregsolvia = $v;
	}


	
	public function getViaregsolvia($con = null)
	{
		if ($this->aViaregsolvia === null && ($this->viaregsolvia_id !== null)) {
						include_once 'lib/model/om/BaseViaregsolviaPeer.php';

			$this->aViaregsolvia = ViaregsolviaPeer::retrieveByPK($this->viaregsolvia_id, $con);

			
		}
		return $this->aViaregsolvia;
	}

	
	public function setViaregente($v)
	{


		if ($v === null) {
			$this->setViaregenteId(NULL);
		} else {
			$this->setViaregenteId($v->getId());
		}


		$this->aViaregente = $v;
	}


	
	public function getViaregente($con = null)
	{
		if ($this->aViaregente === null && ($this->viaregente_id !== null)) {
						include_once 'lib/model/om/BaseViaregentePeer.php';

			$this->aViaregente = ViaregentePeer::retrieveByPK($this->viaregente_id, $con);

			
		}
		return $this->aViaregente;
	}

	
	public function setViaregact($v)
	{


		if ($v === null) {
			$this->setViaregactId(NULL);
		} else {
			$this->setViaregactId($v->getId());
		}


		$this->aViaregact = $v;
	}


	
	public function getViaregact($con = null)
	{
		if ($this->aViaregact === null && ($this->viaregact_id !== null)) {
						include_once 'lib/model/om/BaseViaregactPeer.php';

			$this->aViaregact = ViaregactPeer::retrieveByPK($this->viaregact_id, $con);

			
		}
		return $this->aViaregact;
	}

	
	public function setOcciudad($v)
	{


		if ($v === null) {
			$this->setOcciudadId(NULL);
		} else {
			$this->setOcciudadId($v->getId());
		}


		$this->aOcciudad = $v;
	}


	
	public function getOcciudad($con = null)
	{
		if ($this->aOcciudad === null && ($this->occiudad_id !== null)) {
						include_once 'lib/model/om/BaseOcciudadPeer.php';

			$this->aOcciudad = OcciudadPeer::retrieveByPK($this->occiudad_id, $con);

			
		}
		return $this->aOcciudad;
	}

	
	public function initViaregdetgassolvias()
	{
		if ($this->collViaregdetgassolvias === null) {
			$this->collViaregdetgassolvias = array();
		}
	}

	
	public function getViaregdetgassolvias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetgassolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetgassolvias === null) {
			if ($this->isNew()) {
			   $this->collViaregdetgassolvias = array();
			} else {

				$criteria->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, $this->getId());

				ViaregdetgassolviaPeer::addSelectColumns($criteria);
				$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, $this->getId());

				ViaregdetgassolviaPeer::addSelectColumns($criteria);
				if (!isset($this->lastViaregdetgassolviaCriteria) || !$this->lastViaregdetgassolviaCriteria->equals($criteria)) {
					$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaregdetgassolviaCriteria = $criteria;
		return $this->collViaregdetgassolvias;
	}

	
	public function countViaregdetgassolvias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetgassolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, $this->getId());

		return ViaregdetgassolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregdetgassolvia(Viaregdetgassolvia $l)
	{
		$this->collViaregdetgassolvias[] = $l;
		$l->setViaregdetsolvia($this);
	}


	
	public function getViaregdetgassolviasJoinViaregtipser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetgassolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetgassolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetgassolvias = array();
			} else {

				$criteria->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, $this->getId());

				$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID, $this->getId());

			if (!isset($this->lastViaregdetgassolviaCriteria) || !$this->lastViaregdetgassolviaCriteria->equals($criteria)) {
				$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		}
		$this->lastViaregdetgassolviaCriteria = $criteria;

		return $this->collViaregdetgassolvias;
	}

} 