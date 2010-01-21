<?php


abstract class BaseCcsolliq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numsolliq;


	
	protected $fecliq;


	
	protected $estatu;


	
	protected $monto;


	
	protected $moncaptra;


	
	protected $monactfij;


	
	protected $montrauti;


	
	protected $monotr;


	
	protected $observ;


	
	protected $desdocane;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $cccredit_id;


	
	protected $ccsoldes_id;


	
	protected $cccuades_id;


	
	protected $ccusuint_id;

	
	protected $aCccredit;

	
	protected $aCcsoldes;

	
	protected $aCccuades;

	
	protected $aCcusuint;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcsolliqdocanes;

	
	protected $lastCcsolliqdocaneCriteria = null;

	
	protected $collCcsolliqtipliqs;

	
	protected $lastCcsolliqtipliqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumsolliq()
  {

    return trim($this->numsolliq);

  }
  
  public function getFecliq($format = 'Y-m-d')
  {

    if ($this->fecliq === null || $this->fecliq === '') {
      return null;
    } elseif (!is_int($this->fecliq)) {
            $ts = adodb_strtotime($this->fecliq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecliq] as date/time value: " . var_export($this->fecliq, true));
      }
    } else {
      $ts = $this->fecliq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getMoncaptra($val=false)
  {

    if($val) return number_format($this->moncaptra,2,',','.');
    else return $this->moncaptra;

  }
  
  public function getMonactfij($val=false)
  {

    if($val) return number_format($this->monactfij,2,',','.');
    else return $this->monactfij;

  }
  
  public function getMontrauti($val=false)
  {

    if($val) return number_format($this->montrauti,2,',','.');
    else return $this->montrauti;

  }
  
  public function getMonotr($val=false)
  {

    if($val) return number_format($this->monotr,2,',','.');
    else return $this->monotr;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getDesdocane()
  {

    return trim($this->desdocane);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcsoldesId()
  {

    return $this->ccsoldes_id;

  }
  
  public function getCccuadesId()
  {

    return $this->cccuades_id;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsolliqPeer::ID;
      }
  
	} 
	
	public function setNumsolliq($v)
	{

    if ($this->numsolliq !== $v) {
        $this->numsolliq = $v;
        $this->modifiedColumns[] = CcsolliqPeer::NUMSOLLIQ;
      }
  
	} 
	
	public function setFecliq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecliq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecliq !== $ts) {
      $this->fecliq = $ts;
      $this->modifiedColumns[] = CcsolliqPeer::FECLIQ;
    }

	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcsolliqPeer::ESTATU;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcsolliqPeer::MONTO;
      }
  
	} 
	
	public function setMoncaptra($v)
	{

    if ($this->moncaptra !== $v) {
        $this->moncaptra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcsolliqPeer::MONCAPTRA;
      }
  
	} 
	
	public function setMonactfij($v)
	{

    if ($this->monactfij !== $v) {
        $this->monactfij = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcsolliqPeer::MONACTFIJ;
      }
  
	} 
	
	public function setMontrauti($v)
	{

    if ($this->montrauti !== $v) {
        $this->montrauti = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcsolliqPeer::MONTRAUTI;
      }
  
	} 
	
	public function setMonotr($v)
	{

    if ($this->monotr !== $v) {
        $this->monotr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcsolliqPeer::MONOTR;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcsolliqPeer::OBSERV;
      }
  
	} 
	
	public function setDesdocane($v)
	{

    if ($this->desdocane !== $v) {
        $this->desdocane = $v;
        $this->modifiedColumns[] = CcsolliqPeer::DESDOCANE;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CcsolliqPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CcsolliqPeer::DESANU;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcsolliqPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcsoldesId($v)
	{

    if ($this->ccsoldes_id !== $v) {
        $this->ccsoldes_id = $v;
        $this->modifiedColumns[] = CcsolliqPeer::CCSOLDES_ID;
      }
  
		if ($this->aCcsoldes !== null && $this->aCcsoldes->getId() !== $v) {
			$this->aCcsoldes = null;
		}

	} 
	
	public function setCccuadesId($v)
	{

    if ($this->cccuades_id !== $v) {
        $this->cccuades_id = $v;
        $this->modifiedColumns[] = CcsolliqPeer::CCCUADES_ID;
      }
  
		if ($this->aCccuades !== null && $this->aCccuades->getId() !== $v) {
			$this->aCccuades = null;
		}

	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcsolliqPeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numsolliq = $rs->getString($startcol + 1);

      $this->fecliq = $rs->getDate($startcol + 2, null);

      $this->estatu = $rs->getString($startcol + 3);

      $this->monto = $rs->getFloat($startcol + 4);

      $this->moncaptra = $rs->getFloat($startcol + 5);

      $this->monactfij = $rs->getFloat($startcol + 6);

      $this->montrauti = $rs->getFloat($startcol + 7);

      $this->monotr = $rs->getFloat($startcol + 8);

      $this->observ = $rs->getString($startcol + 9);

      $this->desdocane = $rs->getString($startcol + 10);

      $this->fecanu = $rs->getDate($startcol + 11, null);

      $this->desanu = $rs->getString($startcol + 12);

      $this->cccredit_id = $rs->getInt($startcol + 13);

      $this->ccsoldes_id = $rs->getInt($startcol + 14);

      $this->cccuades_id = $rs->getInt($startcol + 15);

      $this->ccusuint_id = $rs->getInt($startcol + 16);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 17; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsolliq object", $e);
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
			$con = Propel::getConnection(CcsolliqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsolliqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsolliqPeer::DATABASE_NAME);
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

			if ($this->aCcsoldes !== null) {
				if ($this->aCcsoldes->isModified()) {
					$affectedRows += $this->aCcsoldes->save($con);
				}
				$this->setCcsoldes($this->aCcsoldes);
			}

			if ($this->aCccuades !== null) {
				if ($this->aCccuades->isModified()) {
					$affectedRows += $this->aCccuades->save($con);
				}
				$this->setCccuades($this->aCccuades);
			}

			if ($this->aCcusuint !== null) {
				if ($this->aCcusuint->isModified()) {
					$affectedRows += $this->aCcusuint->save($con);
				}
				$this->setCcusuint($this->aCcusuint);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsolliqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsolliqPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcliquids !== null) {
				foreach($this->collCcliquids as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolliqdocanes !== null) {
				foreach($this->collCcsolliqdocanes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolliqtipliqs !== null) {
				foreach($this->collCcsolliqtipliqs as $referrerFK) {
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


												
			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcsoldes !== null) {
				if (!$this->aCcsoldes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsoldes->getValidationFailures());
				}
			}

			if ($this->aCccuades !== null) {
				if (!$this->aCccuades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccuades->getValidationFailures());
				}
			}

			if ($this->aCcusuint !== null) {
				if (!$this->aCcusuint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuint->getValidationFailures());
				}
			}


			if (($retval = CcsolliqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcliquids !== null) {
					foreach($this->collCcliquids as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolliqdocanes !== null) {
					foreach($this->collCcsolliqdocanes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolliqtipliqs !== null) {
					foreach($this->collCcsolliqtipliqs as $referrerFK) {
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
		$pos = CcsolliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumsolliq();
				break;
			case 2:
				return $this->getFecliq();
				break;
			case 3:
				return $this->getEstatu();
				break;
			case 4:
				return $this->getMonto();
				break;
			case 5:
				return $this->getMoncaptra();
				break;
			case 6:
				return $this->getMonactfij();
				break;
			case 7:
				return $this->getMontrauti();
				break;
			case 8:
				return $this->getMonotr();
				break;
			case 9:
				return $this->getObserv();
				break;
			case 10:
				return $this->getDesdocane();
				break;
			case 11:
				return $this->getFecanu();
				break;
			case 12:
				return $this->getDesanu();
				break;
			case 13:
				return $this->getCccreditId();
				break;
			case 14:
				return $this->getCcsoldesId();
				break;
			case 15:
				return $this->getCccuadesId();
				break;
			case 16:
				return $this->getCcusuintId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolliqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumsolliq(),
			$keys[2] => $this->getFecliq(),
			$keys[3] => $this->getEstatu(),
			$keys[4] => $this->getMonto(),
			$keys[5] => $this->getMoncaptra(),
			$keys[6] => $this->getMonactfij(),
			$keys[7] => $this->getMontrauti(),
			$keys[8] => $this->getMonotr(),
			$keys[9] => $this->getObserv(),
			$keys[10] => $this->getDesdocane(),
			$keys[11] => $this->getFecanu(),
			$keys[12] => $this->getDesanu(),
			$keys[13] => $this->getCccreditId(),
			$keys[14] => $this->getCcsoldesId(),
			$keys[15] => $this->getCccuadesId(),
			$keys[16] => $this->getCcusuintId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsolliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumsolliq($value);
				break;
			case 2:
				$this->setFecliq($value);
				break;
			case 3:
				$this->setEstatu($value);
				break;
			case 4:
				$this->setMonto($value);
				break;
			case 5:
				$this->setMoncaptra($value);
				break;
			case 6:
				$this->setMonactfij($value);
				break;
			case 7:
				$this->setMontrauti($value);
				break;
			case 8:
				$this->setMonotr($value);
				break;
			case 9:
				$this->setObserv($value);
				break;
			case 10:
				$this->setDesdocane($value);
				break;
			case 11:
				$this->setFecanu($value);
				break;
			case 12:
				$this->setDesanu($value);
				break;
			case 13:
				$this->setCccreditId($value);
				break;
			case 14:
				$this->setCcsoldesId($value);
				break;
			case 15:
				$this->setCccuadesId($value);
				break;
			case 16:
				$this->setCcusuintId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsolliqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsolliq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecliq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstatu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncaptra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonactfij($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMontrauti($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonotr($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObserv($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDesdocane($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDesanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCccreditId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCcsoldesId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCccuadesId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcusuintId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsolliqPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsolliqPeer::ID)) $criteria->add(CcsolliqPeer::ID, $this->id);
		if ($this->isColumnModified(CcsolliqPeer::NUMSOLLIQ)) $criteria->add(CcsolliqPeer::NUMSOLLIQ, $this->numsolliq);
		if ($this->isColumnModified(CcsolliqPeer::FECLIQ)) $criteria->add(CcsolliqPeer::FECLIQ, $this->fecliq);
		if ($this->isColumnModified(CcsolliqPeer::ESTATU)) $criteria->add(CcsolliqPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcsolliqPeer::MONTO)) $criteria->add(CcsolliqPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CcsolliqPeer::MONCAPTRA)) $criteria->add(CcsolliqPeer::MONCAPTRA, $this->moncaptra);
		if ($this->isColumnModified(CcsolliqPeer::MONACTFIJ)) $criteria->add(CcsolliqPeer::MONACTFIJ, $this->monactfij);
		if ($this->isColumnModified(CcsolliqPeer::MONTRAUTI)) $criteria->add(CcsolliqPeer::MONTRAUTI, $this->montrauti);
		if ($this->isColumnModified(CcsolliqPeer::MONOTR)) $criteria->add(CcsolliqPeer::MONOTR, $this->monotr);
		if ($this->isColumnModified(CcsolliqPeer::OBSERV)) $criteria->add(CcsolliqPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcsolliqPeer::DESDOCANE)) $criteria->add(CcsolliqPeer::DESDOCANE, $this->desdocane);
		if ($this->isColumnModified(CcsolliqPeer::FECANU)) $criteria->add(CcsolliqPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CcsolliqPeer::DESANU)) $criteria->add(CcsolliqPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CcsolliqPeer::CCCREDIT_ID)) $criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcsolliqPeer::CCSOLDES_ID)) $criteria->add(CcsolliqPeer::CCSOLDES_ID, $this->ccsoldes_id);
		if ($this->isColumnModified(CcsolliqPeer::CCCUADES_ID)) $criteria->add(CcsolliqPeer::CCCUADES_ID, $this->cccuades_id);
		if ($this->isColumnModified(CcsolliqPeer::CCUSUINT_ID)) $criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->ccusuint_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsolliqPeer::DATABASE_NAME);

		$criteria->add(CcsolliqPeer::ID, $this->id);

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

		$copyObj->setNumsolliq($this->numsolliq);

		$copyObj->setFecliq($this->fecliq);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setMonto($this->monto);

		$copyObj->setMoncaptra($this->moncaptra);

		$copyObj->setMonactfij($this->monactfij);

		$copyObj->setMontrauti($this->montrauti);

		$copyObj->setMonotr($this->monotr);

		$copyObj->setObserv($this->observ);

		$copyObj->setDesdocane($this->desdocane);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcsoldesId($this->ccsoldes_id);

		$copyObj->setCccuadesId($this->cccuades_id);

		$copyObj->setCcusuintId($this->ccusuint_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolliqdocanes() as $relObj) {
				$copyObj->addCcsolliqdocane($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolliqtipliqs() as $relObj) {
				$copyObj->addCcsolliqtipliq($relObj->copy($deepCopy));
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
			self::$peer = new CcsolliqPeer();
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

	
	public function setCcsoldes($v)
	{


		if ($v === null) {
			$this->setCcsoldesId(NULL);
		} else {
			$this->setCcsoldesId($v->getId());
		}


		$this->aCcsoldes = $v;
	}


	
	public function getCcsoldes($con = null)
	{
		if ($this->aCcsoldes === null && ($this->ccsoldes_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';

      $c = new Criteria();
      $c->add(CcsoldesPeer::ID,$this->ccsoldes_id);
      
			$this->aCcsoldes = CcsoldesPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsoldes;
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

	
	public function setCcusuint($v)
	{


		if ($v === null) {
			$this->setCcusuintId(NULL);
		} else {
			$this->setCcusuintId($v->getId());
		}


		$this->aCcusuint = $v;
	}


	
	public function getCcusuint($con = null)
	{
		if ($this->aCcusuint === null && ($this->ccusuint_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuintPeer.php';

      $c = new Criteria();
      $c->add(CcusuintPeer::ID,$this->ccusuint_id);
      
			$this->aCcusuint = CcusuintPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuint;
	}

	
	public function initCcliquids()
	{
		if ($this->collCcliquids === null) {
			$this->collCcliquids = array();
		}
	}

	
	public function getCcliquids($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
			   $this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
					$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcliquidCriteria = $criteria;
		return $this->collCcliquids;
	}

	
	public function countCcliquids($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCcsolliq($this);
	}


	
	public function getCcliquidsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

	
	public function initCcsolliqdocanes()
	{
		if ($this->collCcsolliqdocanes === null) {
			$this->collCcsolliqdocanes = array();
		}
	}

	
	public function getCcsolliqdocanes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqdocanePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqdocanes === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqdocanes = array();
			} else {

				$criteria->add(CcsolliqdocanePeer::CCSOLLIQ_ID, $this->getId());

				CcsolliqdocanePeer::addSelectColumns($criteria);
				$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqdocanePeer::CCSOLLIQ_ID, $this->getId());

				CcsolliqdocanePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqdocaneCriteria) || !$this->lastCcsolliqdocaneCriteria->equals($criteria)) {
					$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqdocaneCriteria = $criteria;
		return $this->collCcsolliqdocanes;
	}

	
	public function countCcsolliqdocanes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqdocanePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqdocanePeer::CCSOLLIQ_ID, $this->getId());

		return CcsolliqdocanePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliqdocane(Ccsolliqdocane $l)
	{
		$this->collCcsolliqdocanes[] = $l;
		$l->setCcsolliq($this);
	}


	
	public function getCcsolliqdocanesJoinCcdocane($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqdocanePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqdocanes === null) {
			if ($this->isNew()) {
				$this->collCcsolliqdocanes = array();
			} else {

				$criteria->add(CcsolliqdocanePeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelectJoinCcdocane($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqdocanePeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcsolliqdocaneCriteria) || !$this->lastCcsolliqdocaneCriteria->equals($criteria)) {
				$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelectJoinCcdocane($criteria, $con);
			}
		}
		$this->lastCcsolliqdocaneCriteria = $criteria;

		return $this->collCcsolliqdocanes;
	}

	
	public function initCcsolliqtipliqs()
	{
		if ($this->collCcsolliqtipliqs === null) {
			$this->collCcsolliqtipliqs = array();
		}
	}

	
	public function getCcsolliqtipliqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqtipliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqtipliqs === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqtipliqs = array();
			} else {

				$criteria->add(CcsolliqtipliqPeer::CCSOLLIQ_ID, $this->getId());

				CcsolliqtipliqPeer::addSelectColumns($criteria);
				$this->collCcsolliqtipliqs = CcsolliqtipliqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqtipliqPeer::CCSOLLIQ_ID, $this->getId());

				CcsolliqtipliqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqtipliqCriteria) || !$this->lastCcsolliqtipliqCriteria->equals($criteria)) {
					$this->collCcsolliqtipliqs = CcsolliqtipliqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqtipliqCriteria = $criteria;
		return $this->collCcsolliqtipliqs;
	}

	
	public function countCcsolliqtipliqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqtipliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqtipliqPeer::CCSOLLIQ_ID, $this->getId());

		return CcsolliqtipliqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliqtipliq(Ccsolliqtipliq $l)
	{
		$this->collCcsolliqtipliqs[] = $l;
		$l->setCcsolliq($this);
	}


	
	public function getCcsolliqtipliqsJoinCctipliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqtipliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqtipliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqtipliqs = array();
			} else {

				$criteria->add(CcsolliqtipliqPeer::CCSOLLIQ_ID, $this->getId());

				$this->collCcsolliqtipliqs = CcsolliqtipliqPeer::doSelectJoinCctipliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqtipliqPeer::CCSOLLIQ_ID, $this->getId());

			if (!isset($this->lastCcsolliqtipliqCriteria) || !$this->lastCcsolliqtipliqCriteria->equals($criteria)) {
				$this->collCcsolliqtipliqs = CcsolliqtipliqPeer::doSelectJoinCctipliq($criteria, $con);
			}
		}
		$this->lastCcsolliqtipliqCriteria = $criteria;

		return $this->collCcsolliqtipliqs;
	}

} 