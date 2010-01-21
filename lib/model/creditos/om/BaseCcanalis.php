<?php


abstract class BaseCcanalis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $cedana;


	
	protected $nomana;


	
	protected $sexana;


	
	protected $telana;


	
	protected $celana;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $dirana;


	
	protected $estatu;


	
	protected $ccperpre_id;


	
	protected $cctipana_id;


	
	protected $ccareger_id;


	
	protected $ccparroq_id;

	
	protected $aCcperpre;

	
	protected $aCctipana;

	
	protected $aCcareger;

	
	protected $aCcparroq;

	
	protected $collCcactanas;

	
	protected $lastCcactanaCriteria = null;

	
	protected $collCcanacres;

	
	protected $lastCcanacreCriteria = null;

	
	protected $collCcanaests;

	
	protected $lastCcanaestCriteria = null;

	
	protected $collCcasiganas;

	
	protected $lastCcasiganaCriteria = null;

	
	protected $collCcestanas;

	
	protected $lastCcestanaCriteria = null;

	
	protected $collCcgescobs;

	
	protected $lastCcgescobCriteria = null;

	
	protected $collCcinforms;

	
	protected $lastCcinformCriteria = null;

	
	protected $collCcrevisis;

	
	protected $lastCcrevisiCriteria = null;

	
	protected $collCcsolinfs;

	
	protected $lastCcsolinfCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCedana()
  {

    return trim($this->cedana);

  }
  
  public function getNomana()
  {

    return trim($this->nomana);

  }
  
  public function getSexana()
  {

    return trim($this->sexana);

  }
  
  public function getTelana()
  {

    return trim($this->telana);

  }
  
  public function getCelana()
  {

    return trim($this->celana);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getDirana()
  {

    return trim($this->dirana);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCctipanaId()
  {

    return $this->cctipana_id;

  }
  
  public function getCcaregerId()
  {

    return $this->ccareger_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcanalisPeer::ID;
      }
  
	} 
	
	public function setCedana($v)
	{

    if ($this->cedana !== $v) {
        $this->cedana = $v;
        $this->modifiedColumns[] = CcanalisPeer::CEDANA;
      }
  
	} 
	
	public function setNomana($v)
	{

    if ($this->nomana !== $v) {
        $this->nomana = $v;
        $this->modifiedColumns[] = CcanalisPeer::NOMANA;
      }
  
	} 
	
	public function setSexana($v)
	{

    if ($this->sexana !== $v) {
        $this->sexana = $v;
        $this->modifiedColumns[] = CcanalisPeer::SEXANA;
      }
  
	} 
	
	public function setTelana($v)
	{

    if ($this->telana !== $v) {
        $this->telana = $v;
        $this->modifiedColumns[] = CcanalisPeer::TELANA;
      }
  
	} 
	
	public function setCelana($v)
	{

    if ($this->celana !== $v) {
        $this->celana = $v;
        $this->modifiedColumns[] = CcanalisPeer::CELANA;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcanalisPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcanalisPeer::CODARECEL;
      }
  
	} 
	
	public function setDirana($v)
	{

    if ($this->dirana !== $v) {
        $this->dirana = $v;
        $this->modifiedColumns[] = CcanalisPeer::DIRANA;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcanalisPeer::ESTATU;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcanalisPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCctipanaId($v)
	{

    if ($this->cctipana_id !== $v) {
        $this->cctipana_id = $v;
        $this->modifiedColumns[] = CcanalisPeer::CCTIPANA_ID;
      }
  
		if ($this->aCctipana !== null && $this->aCctipana->getId() !== $v) {
			$this->aCctipana = null;
		}

	} 
	
	public function setCcaregerId($v)
	{

    if ($this->ccareger_id !== $v) {
        $this->ccareger_id = $v;
        $this->modifiedColumns[] = CcanalisPeer::CCAREGER_ID;
      }
  
		if ($this->aCcareger !== null && $this->aCcareger->getId() !== $v) {
			$this->aCcareger = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcanalisPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->cedana = $rs->getString($startcol + 1);

      $this->nomana = $rs->getString($startcol + 2);

      $this->sexana = $rs->getString($startcol + 3);

      $this->telana = $rs->getString($startcol + 4);

      $this->celana = $rs->getString($startcol + 5);

      $this->codaretel = $rs->getString($startcol + 6);

      $this->codarecel = $rs->getString($startcol + 7);

      $this->dirana = $rs->getString($startcol + 8);

      $this->estatu = $rs->getString($startcol + 9);

      $this->ccperpre_id = $rs->getInt($startcol + 10);

      $this->cctipana_id = $rs->getInt($startcol + 11);

      $this->ccareger_id = $rs->getInt($startcol + 12);

      $this->ccparroq_id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccanalis object", $e);
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
			$con = Propel::getConnection(CcanalisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcanalisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcanalisPeer::DATABASE_NAME);
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


												
			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCctipana !== null) {
				if ($this->aCctipana->isModified()) {
					$affectedRows += $this->aCctipana->save($con);
				}
				$this->setCctipana($this->aCctipana);
			}

			if ($this->aCcareger !== null) {
				if ($this->aCcareger->isModified()) {
					$affectedRows += $this->aCcareger->save($con);
				}
				$this->setCcareger($this->aCcareger);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcanalisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcanalisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcactanas !== null) {
				foreach($this->collCcactanas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcanacres !== null) {
				foreach($this->collCcanacres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcanaests !== null) {
				foreach($this->collCcanaests as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcasiganas !== null) {
				foreach($this->collCcasiganas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestanas !== null) {
				foreach($this->collCcestanas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgescobs !== null) {
				foreach($this->collCcgescobs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcinforms !== null) {
				foreach($this->collCcinforms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrevisis !== null) {
				foreach($this->collCcrevisis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolinfs !== null) {
				foreach($this->collCcsolinfs as $referrerFK) {
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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCctipana !== null) {
				if (!$this->aCctipana->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipana->getValidationFailures());
				}
			}

			if ($this->aCcareger !== null) {
				if (!$this->aCcareger->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcareger->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcanalisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcactanas !== null) {
					foreach($this->collCcactanas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcanacres !== null) {
					foreach($this->collCcanacres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcanaests !== null) {
					foreach($this->collCcanaests as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcasiganas !== null) {
					foreach($this->collCcasiganas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestanas !== null) {
					foreach($this->collCcestanas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgescobs !== null) {
					foreach($this->collCcgescobs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcinforms !== null) {
					foreach($this->collCcinforms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrevisis !== null) {
					foreach($this->collCcrevisis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolinfs !== null) {
					foreach($this->collCcsolinfs as $referrerFK) {
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
		$pos = CcanalisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCedana();
				break;
			case 2:
				return $this->getNomana();
				break;
			case 3:
				return $this->getSexana();
				break;
			case 4:
				return $this->getTelana();
				break;
			case 5:
				return $this->getCelana();
				break;
			case 6:
				return $this->getCodaretel();
				break;
			case 7:
				return $this->getCodarecel();
				break;
			case 8:
				return $this->getDirana();
				break;
			case 9:
				return $this->getEstatu();
				break;
			case 10:
				return $this->getCcperpreId();
				break;
			case 11:
				return $this->getCctipanaId();
				break;
			case 12:
				return $this->getCcaregerId();
				break;
			case 13:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcanalisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCedana(),
			$keys[2] => $this->getNomana(),
			$keys[3] => $this->getSexana(),
			$keys[4] => $this->getTelana(),
			$keys[5] => $this->getCelana(),
			$keys[6] => $this->getCodaretel(),
			$keys[7] => $this->getCodarecel(),
			$keys[8] => $this->getDirana(),
			$keys[9] => $this->getEstatu(),
			$keys[10] => $this->getCcperpreId(),
			$keys[11] => $this->getCctipanaId(),
			$keys[12] => $this->getCcaregerId(),
			$keys[13] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcanalisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCedana($value);
				break;
			case 2:
				$this->setNomana($value);
				break;
			case 3:
				$this->setSexana($value);
				break;
			case 4:
				$this->setTelana($value);
				break;
			case 5:
				$this->setCelana($value);
				break;
			case 6:
				$this->setCodaretel($value);
				break;
			case 7:
				$this->setCodarecel($value);
				break;
			case 8:
				$this->setDirana($value);
				break;
			case 9:
				$this->setEstatu($value);
				break;
			case 10:
				$this->setCcperpreId($value);
				break;
			case 11:
				$this->setCctipanaId($value);
				break;
			case 12:
				$this->setCcaregerId($value);
				break;
			case 13:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcanalisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedana($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomana($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSexana($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelana($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCelana($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaretel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodarecel($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDirana($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEstatu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcperpreId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCctipanaId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCcaregerId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCcparroqId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcanalisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcanalisPeer::ID)) $criteria->add(CcanalisPeer::ID, $this->id);
		if ($this->isColumnModified(CcanalisPeer::CEDANA)) $criteria->add(CcanalisPeer::CEDANA, $this->cedana);
		if ($this->isColumnModified(CcanalisPeer::NOMANA)) $criteria->add(CcanalisPeer::NOMANA, $this->nomana);
		if ($this->isColumnModified(CcanalisPeer::SEXANA)) $criteria->add(CcanalisPeer::SEXANA, $this->sexana);
		if ($this->isColumnModified(CcanalisPeer::TELANA)) $criteria->add(CcanalisPeer::TELANA, $this->telana);
		if ($this->isColumnModified(CcanalisPeer::CELANA)) $criteria->add(CcanalisPeer::CELANA, $this->celana);
		if ($this->isColumnModified(CcanalisPeer::CODARETEL)) $criteria->add(CcanalisPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcanalisPeer::CODARECEL)) $criteria->add(CcanalisPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcanalisPeer::DIRANA)) $criteria->add(CcanalisPeer::DIRANA, $this->dirana);
		if ($this->isColumnModified(CcanalisPeer::ESTATU)) $criteria->add(CcanalisPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcanalisPeer::CCPERPRE_ID)) $criteria->add(CcanalisPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcanalisPeer::CCTIPANA_ID)) $criteria->add(CcanalisPeer::CCTIPANA_ID, $this->cctipana_id);
		if ($this->isColumnModified(CcanalisPeer::CCAREGER_ID)) $criteria->add(CcanalisPeer::CCAREGER_ID, $this->ccareger_id);
		if ($this->isColumnModified(CcanalisPeer::CCPARROQ_ID)) $criteria->add(CcanalisPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcanalisPeer::DATABASE_NAME);

		$criteria->add(CcanalisPeer::ID, $this->id);

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

		$copyObj->setCedana($this->cedana);

		$copyObj->setNomana($this->nomana);

		$copyObj->setSexana($this->sexana);

		$copyObj->setTelana($this->telana);

		$copyObj->setCelana($this->celana);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setDirana($this->dirana);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCctipanaId($this->cctipana_id);

		$copyObj->setCcaregerId($this->ccareger_id);

		$copyObj->setCcparroqId($this->ccparroq_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcactanas() as $relObj) {
				$copyObj->addCcactana($relObj->copy($deepCopy));
			}

			foreach($this->getCcanacres() as $relObj) {
				$copyObj->addCcanacre($relObj->copy($deepCopy));
			}

			foreach($this->getCcanaests() as $relObj) {
				$copyObj->addCcanaest($relObj->copy($deepCopy));
			}

			foreach($this->getCcasiganas() as $relObj) {
				$copyObj->addCcasigana($relObj->copy($deepCopy));
			}

			foreach($this->getCcestanas() as $relObj) {
				$copyObj->addCcestana($relObj->copy($deepCopy));
			}

			foreach($this->getCcgescobs() as $relObj) {
				$copyObj->addCcgescob($relObj->copy($deepCopy));
			}

			foreach($this->getCcinforms() as $relObj) {
				$copyObj->addCcinform($relObj->copy($deepCopy));
			}

			foreach($this->getCcrevisis() as $relObj) {
				$copyObj->addCcrevisi($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolinfs() as $relObj) {
				$copyObj->addCcsolinf($relObj->copy($deepCopy));
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
			self::$peer = new CcanalisPeer();
		}
		return self::$peer;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
	}

	
	public function setCctipana($v)
	{


		if ($v === null) {
			$this->setCctipanaId(NULL);
		} else {
			$this->setCctipanaId($v->getId());
		}


		$this->aCctipana = $v;
	}


	
	public function getCctipana($con = null)
	{
		if ($this->aCctipana === null && ($this->cctipana_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipanaPeer.php';

      $c = new Criteria();
      $c->add(CctipanaPeer::ID,$this->cctipana_id);
      
			$this->aCctipana = CctipanaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipana;
	}

	
	public function setCcareger($v)
	{


		if ($v === null) {
			$this->setCcaregerId(NULL);
		} else {
			$this->setCcaregerId($v->getId());
		}


		$this->aCcareger = $v;
	}


	
	public function getCcareger($con = null)
	{
		if ($this->aCcareger === null && ($this->ccareger_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcaregerPeer.php';

      $c = new Criteria();
      $c->add(CcaregerPeer::ID,$this->ccareger_id);
      
			$this->aCcareger = CcaregerPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcareger;
	}

	
	public function setCcparroq($v)
	{


		if ($v === null) {
			$this->setCcparroqId(NULL);
		} else {
			$this->setCcparroqId($v->getId());
		}


		$this->aCcparroq = $v;
	}


	
	public function getCcparroq($con = null)
	{
		if ($this->aCcparroq === null && ($this->ccparroq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';

      $c = new Criteria();
      $c->add(CcparroqPeer::ID,$this->ccparroq_id);
      
			$this->aCcparroq = CcparroqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparroq;
	}

	
	public function initCcactanas()
	{
		if ($this->collCcactanas === null) {
			$this->collCcactanas = array();
		}
	}

	
	public function getCcactanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
			   $this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
					$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcactanaCriteria = $criteria;
		return $this->collCcactanas;
	}

	
	public function countCcactanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

		return CcactanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcactana(Ccactana $l)
	{
		$this->collCcactanas[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcactanasJoinCcactivi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcactivi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcactivi($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}

	
	public function initCcanacres()
	{
		if ($this->collCcanacres === null) {
			$this->collCcanacres = array();
		}
	}

	
	public function getCcanacres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanacrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanacres === null) {
			if ($this->isNew()) {
			   $this->collCcanacres = array();
			} else {

				$criteria->add(CcanacrePeer::CCANALIS_ID, $this->getId());

				CcanacrePeer::addSelectColumns($criteria);
				$this->collCcanacres = CcanacrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanacrePeer::CCANALIS_ID, $this->getId());

				CcanacrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanacreCriteria) || !$this->lastCcanacreCriteria->equals($criteria)) {
					$this->collCcanacres = CcanacrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanacreCriteria = $criteria;
		return $this->collCcanacres;
	}

	
	public function countCcanacres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanacrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanacrePeer::CCANALIS_ID, $this->getId());

		return CcanacrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanacre(Ccanacre $l)
	{
		$this->collCcanacres[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcanacresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanacrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanacres === null) {
			if ($this->isNew()) {
				$this->collCcanacres = array();
			} else {

				$criteria->add(CcanacrePeer::CCANALIS_ID, $this->getId());

				$this->collCcanacres = CcanacrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanacrePeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcanacreCriteria) || !$this->lastCcanacreCriteria->equals($criteria)) {
				$this->collCcanacres = CcanacrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcanacreCriteria = $criteria;

		return $this->collCcanacres;
	}

	
	public function initCcanaests()
	{
		if ($this->collCcanaests === null) {
			$this->collCcanaests = array();
		}
	}

	
	public function getCcanaests($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanaestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaests === null) {
			if ($this->isNew()) {
			   $this->collCcanaests = array();
			} else {

				$criteria->add(CcanaestPeer::CCANALIS_ID, $this->getId());

				CcanaestPeer::addSelectColumns($criteria);
				$this->collCcanaests = CcanaestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanaestPeer::CCANALIS_ID, $this->getId());

				CcanaestPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanaestCriteria) || !$this->lastCcanaestCriteria->equals($criteria)) {
					$this->collCcanaests = CcanaestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanaestCriteria = $criteria;
		return $this->collCcanaests;
	}

	
	public function countCcanaests($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanaestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanaestPeer::CCANALIS_ID, $this->getId());

		return CcanaestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanaest(Ccanaest $l)
	{
		$this->collCcanaests[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcanaestsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanaestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaests === null) {
			if ($this->isNew()) {
				$this->collCcanaests = array();
			} else {

				$criteria->add(CcanaestPeer::CCANALIS_ID, $this->getId());

				$this->collCcanaests = CcanaestPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanaestPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcanaestCriteria) || !$this->lastCcanaestCriteria->equals($criteria)) {
				$this->collCcanaests = CcanaestPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcanaestCriteria = $criteria;

		return $this->collCcanaests;
	}

	
	public function initCcasiganas()
	{
		if ($this->collCcasiganas === null) {
			$this->collCcasiganas = array();
		}
	}

	
	public function getCcasiganas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
			   $this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
					$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcasiganaCriteria = $criteria;
		return $this->collCcasiganas;
	}

	
	public function countCcasiganas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

		return CcasiganaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcasigana(Ccasigana $l)
	{
		$this->collCcasiganas[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcasiganasJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}

	
	public function initCcestanas()
	{
		if ($this->collCcestanas === null) {
			$this->collCcestanas = array();
		}
	}

	
	public function getCcestanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestanas === null) {
			if ($this->isNew()) {
			   $this->collCcestanas = array();
			} else {

				$criteria->add(CcestanaPeer::CCANALIS_ID, $this->getId());

				CcestanaPeer::addSelectColumns($criteria);
				$this->collCcestanas = CcestanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestanaPeer::CCANALIS_ID, $this->getId());

				CcestanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestanaCriteria) || !$this->lastCcestanaCriteria->equals($criteria)) {
					$this->collCcestanas = CcestanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestanaCriteria = $criteria;
		return $this->collCcestanas;
	}

	
	public function countCcestanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestanaPeer::CCANALIS_ID, $this->getId());

		return CcestanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestana(Ccestana $l)
	{
		$this->collCcestanas[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcestanasJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestanas === null) {
			if ($this->isNew()) {
				$this->collCcestanas = array();
			} else {

				$criteria->add(CcestanaPeer::CCANALIS_ID, $this->getId());

				$this->collCcestanas = CcestanaPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestanaPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcestanaCriteria) || !$this->lastCcestanaCriteria->equals($criteria)) {
				$this->collCcestanas = CcestanaPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcestanaCriteria = $criteria;

		return $this->collCcestanas;
	}

	
	public function initCcgescobs()
	{
		if ($this->collCcgescobs === null) {
			$this->collCcgescobs = array();
		}
	}

	
	public function getCcgescobs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
			   $this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
					$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgescobCriteria = $criteria;
		return $this->collCcgescobs;
	}

	
	public function countCcgescobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

		return CcgescobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgescob(Ccgescob $l)
	{
		$this->collCcgescobs[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcgescobsJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcactana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}

	
	public function initCcinforms()
	{
		if ($this->collCcinforms === null) {
			$this->collCcinforms = array();
		}
	}

	
	public function getCcinforms($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
			   $this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				$this->collCcinforms = CcinformPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
					$this->collCcinforms = CcinformPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcinformCriteria = $criteria;
		return $this->collCcinforms;
	}

	
	public function countCcinforms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

		return CcinformPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcinform(Ccinform $l)
	{
		$this->collCcinforms[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcinformsJoinCcgerencRelatedByCcgerencId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcgerencId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcgerencId($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcclainf($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcgerencRelatedByCcresbarId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcresbarId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcresbarId($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}

	
	public function initCcrevisis()
	{
		if ($this->collCcrevisis === null) {
			$this->collCcrevisis = array();
		}
	}

	
	public function getCcrevisis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrevisiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrevisis === null) {
			if ($this->isNew()) {
			   $this->collCcrevisis = array();
			} else {

				$criteria->add(CcrevisiPeer::CCANALIS_ID, $this->getId());

				CcrevisiPeer::addSelectColumns($criteria);
				$this->collCcrevisis = CcrevisiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrevisiPeer::CCANALIS_ID, $this->getId());

				CcrevisiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrevisiCriteria) || !$this->lastCcrevisiCriteria->equals($criteria)) {
					$this->collCcrevisis = CcrevisiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrevisiCriteria = $criteria;
		return $this->collCcrevisis;
	}

	
	public function countCcrevisis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrevisiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrevisiPeer::CCANALIS_ID, $this->getId());

		return CcrevisiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrevisi(Ccrevisi $l)
	{
		$this->collCcrevisis[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcrevisisJoinCcinform($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrevisiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrevisis === null) {
			if ($this->isNew()) {
				$this->collCcrevisis = array();
			} else {

				$criteria->add(CcrevisiPeer::CCANALIS_ID, $this->getId());

				$this->collCcrevisis = CcrevisiPeer::doSelectJoinCcinform($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrevisiPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcrevisiCriteria) || !$this->lastCcrevisiCriteria->equals($criteria)) {
				$this->collCcrevisis = CcrevisiPeer::doSelectJoinCcinform($criteria, $con);
			}
		}
		$this->lastCcrevisiCriteria = $criteria;

		return $this->collCcrevisis;
	}

	
	public function initCcsolinfs()
	{
		if ($this->collCcsolinfs === null) {
			$this->collCcsolinfs = array();
		}
	}

	
	public function getCcsolinfs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
			   $this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

				CcsolinfPeer::addSelectColumns($criteria);
				$this->collCcsolinfs = CcsolinfPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

				CcsolinfPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
					$this->collCcsolinfs = CcsolinfPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolinfCriteria = $criteria;
		return $this->collCcsolinfs;
	}

	
	public function countCcsolinfs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

		return CcsolinfPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolinf(Ccsolinf $l)
	{
		$this->collCcsolinfs[] = $l;
		$l->setCcanalis($this);
	}


	
	public function getCcsolinfsJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
				$this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcsolinfCriteria = $criteria;

		return $this->collCcsolinfs;
	}


	
	public function getCcsolinfsJoinCcclainf($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
				$this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcclainf($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolinfPeer::CCANALIS_ID, $this->getId());

			if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcclainf($criteria, $con);
			}
		}
		$this->lastCcsolinfCriteria = $criteria;

		return $this->collCcsolinfs;
	}

} 