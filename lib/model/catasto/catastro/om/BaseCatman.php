<?php


abstract class BaseCatman extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $catdivgeo_id;


	
	protected $nomman;


	
	protected $aliman;


	
	protected $tiplinnor;


	
	protected $cattramonor_id;


	
	protected $tiplinsur;


	
	protected $cattramosur_id;


	
	protected $tiplinest;


	
	protected $cattramoest_id;


	
	protected $tiplinoes;


	
	protected $cattramooes_id;

	
	protected $aCatdivgeo;

	
	protected $aCattramoRelatedByCattramonorId;

	
	protected $aCattramoRelatedByCattramosurId;

	
	protected $aCattramoRelatedByCattramoestId;

	
	protected $aCattramoRelatedByCattramooesId;

	
	protected $collCatreginms;

	
	protected $lastCatreginmCriteria = null;

	
	protected $collCatsubprcs;

	
	protected $lastCatsubprcCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCatdivgeoId()
  {

    return $this->catdivgeo_id;

  }
  
  public function getNomman()
  {

    return trim($this->nomman);

  }
  
  public function getAliman()
  {

    return trim($this->aliman);

  }
  
  public function getTiplinnor()
  {

    return trim($this->tiplinnor);

  }
  
  public function getCattramonorId()
  {

    return $this->cattramonor_id;

  }
  
  public function getTiplinsur()
  {

    return trim($this->tiplinsur);

  }
  
  public function getCattramosurId()
  {

    return $this->cattramosur_id;

  }
  
  public function getTiplinest()
  {

    return trim($this->tiplinest);

  }
  
  public function getCattramoestId()
  {

    return $this->cattramoest_id;

  }
  
  public function getTiplinoes()
  {

    return trim($this->tiplinoes);

  }
  
  public function getCattramooesId()
  {

    return $this->cattramooes_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatmanPeer::ID;
      }
  
	} 
	
	public function setCatdivgeoId($v)
	{

    if ($this->catdivgeo_id !== $v) {
        $this->catdivgeo_id = $v;
        $this->modifiedColumns[] = CatmanPeer::CATDIVGEO_ID;
      }
  
		if ($this->aCatdivgeo !== null && $this->aCatdivgeo->getId() !== $v) {
			$this->aCatdivgeo = null;
		}

	} 
	
	public function setNomman($v)
	{

    if ($this->nomman !== $v) {
        $this->nomman = $v;
        $this->modifiedColumns[] = CatmanPeer::NOMMAN;
      }
  
	} 
	
	public function setAliman($v)
	{

    if ($this->aliman !== $v) {
        $this->aliman = $v;
        $this->modifiedColumns[] = CatmanPeer::ALIMAN;
      }
  
	} 
	
	public function setTiplinnor($v)
	{

    if ($this->tiplinnor !== $v) {
        $this->tiplinnor = $v;
        $this->modifiedColumns[] = CatmanPeer::TIPLINNOR;
      }
  
	} 
	
	public function setCattramonorId($v)
	{

    if ($this->cattramonor_id !== $v) {
        $this->cattramonor_id = $v;
        $this->modifiedColumns[] = CatmanPeer::CATTRAMONOR_ID;
      }
  
		if ($this->aCattramoRelatedByCattramonorId !== null && $this->aCattramoRelatedByCattramonorId->getId() !== $v) {
			$this->aCattramoRelatedByCattramonorId = null;
		}

	} 
	
	public function setTiplinsur($v)
	{

    if ($this->tiplinsur !== $v) {
        $this->tiplinsur = $v;
        $this->modifiedColumns[] = CatmanPeer::TIPLINSUR;
      }
  
	} 
	
	public function setCattramosurId($v)
	{

    if ($this->cattramosur_id !== $v) {
        $this->cattramosur_id = $v;
        $this->modifiedColumns[] = CatmanPeer::CATTRAMOSUR_ID;
      }
  
		if ($this->aCattramoRelatedByCattramosurId !== null && $this->aCattramoRelatedByCattramosurId->getId() !== $v) {
			$this->aCattramoRelatedByCattramosurId = null;
		}

	} 
	
	public function setTiplinest($v)
	{

    if ($this->tiplinest !== $v) {
        $this->tiplinest = $v;
        $this->modifiedColumns[] = CatmanPeer::TIPLINEST;
      }
  
	} 
	
	public function setCattramoestId($v)
	{

    if ($this->cattramoest_id !== $v) {
        $this->cattramoest_id = $v;
        $this->modifiedColumns[] = CatmanPeer::CATTRAMOEST_ID;
      }
  
		if ($this->aCattramoRelatedByCattramoestId !== null && $this->aCattramoRelatedByCattramoestId->getId() !== $v) {
			$this->aCattramoRelatedByCattramoestId = null;
		}

	} 
	
	public function setTiplinoes($v)
	{

    if ($this->tiplinoes !== $v) {
        $this->tiplinoes = $v;
        $this->modifiedColumns[] = CatmanPeer::TIPLINOES;
      }
  
	} 
	
	public function setCattramooesId($v)
	{

    if ($this->cattramooes_id !== $v) {
        $this->cattramooes_id = $v;
        $this->modifiedColumns[] = CatmanPeer::CATTRAMOOES_ID;
      }
  
		if ($this->aCattramoRelatedByCattramooesId !== null && $this->aCattramoRelatedByCattramooesId->getId() !== $v) {
			$this->aCattramoRelatedByCattramooesId = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->catdivgeo_id = $rs->getInt($startcol + 1);

      $this->nomman = $rs->getString($startcol + 2);

      $this->aliman = $rs->getString($startcol + 3);

      $this->tiplinnor = $rs->getString($startcol + 4);

      $this->cattramonor_id = $rs->getInt($startcol + 5);

      $this->tiplinsur = $rs->getString($startcol + 6);

      $this->cattramosur_id = $rs->getInt($startcol + 7);

      $this->tiplinest = $rs->getString($startcol + 8);

      $this->cattramoest_id = $rs->getInt($startcol + 9);

      $this->tiplinoes = $rs->getString($startcol + 10);

      $this->cattramooes_id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catman object", $e);
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
			$con = Propel::getConnection(CatmanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatmanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatmanPeer::DATABASE_NAME);
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


												
			if ($this->aCatdivgeo !== null) {
				if ($this->aCatdivgeo->isModified()) {
					$affectedRows += $this->aCatdivgeo->save($con);
				}
				$this->setCatdivgeo($this->aCatdivgeo);
			}

			if ($this->aCattramoRelatedByCattramonorId !== null) {
				if ($this->aCattramoRelatedByCattramonorId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramonorId->save($con);
				}
				$this->setCattramoRelatedByCattramonorId($this->aCattramoRelatedByCattramonorId);
			}

			if ($this->aCattramoRelatedByCattramosurId !== null) {
				if ($this->aCattramoRelatedByCattramosurId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramosurId->save($con);
				}
				$this->setCattramoRelatedByCattramosurId($this->aCattramoRelatedByCattramosurId);
			}

			if ($this->aCattramoRelatedByCattramoestId !== null) {
				if ($this->aCattramoRelatedByCattramoestId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramoestId->save($con);
				}
				$this->setCattramoRelatedByCattramoestId($this->aCattramoRelatedByCattramoestId);
			}

			if ($this->aCattramoRelatedByCattramooesId !== null) {
				if ($this->aCattramoRelatedByCattramooesId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramooesId->save($con);
				}
				$this->setCattramoRelatedByCattramooesId($this->aCattramoRelatedByCattramooesId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatmanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatmanPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatreginms !== null) {
				foreach($this->collCatreginms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatsubprcs !== null) {
				foreach($this->collCatsubprcs as $referrerFK) {
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


												
			if ($this->aCatdivgeo !== null) {
				if (!$this->aCatdivgeo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatdivgeo->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramonorId !== null) {
				if (!$this->aCattramoRelatedByCattramonorId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramonorId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramosurId !== null) {
				if (!$this->aCattramoRelatedByCattramosurId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramosurId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramoestId !== null) {
				if (!$this->aCattramoRelatedByCattramoestId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramoestId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramooesId !== null) {
				if (!$this->aCattramoRelatedByCattramooesId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramooesId->getValidationFailures());
				}
			}


			if (($retval = CatmanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatreginms !== null) {
					foreach($this->collCatreginms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatsubprcs !== null) {
					foreach($this->collCatsubprcs as $referrerFK) {
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
		$pos = CatmanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCatdivgeoId();
				break;
			case 2:
				return $this->getNomman();
				break;
			case 3:
				return $this->getAliman();
				break;
			case 4:
				return $this->getTiplinnor();
				break;
			case 5:
				return $this->getCattramonorId();
				break;
			case 6:
				return $this->getTiplinsur();
				break;
			case 7:
				return $this->getCattramosurId();
				break;
			case 8:
				return $this->getTiplinest();
				break;
			case 9:
				return $this->getCattramoestId();
				break;
			case 10:
				return $this->getTiplinoes();
				break;
			case 11:
				return $this->getCattramooesId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatmanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCatdivgeoId(),
			$keys[2] => $this->getNomman(),
			$keys[3] => $this->getAliman(),
			$keys[4] => $this->getTiplinnor(),
			$keys[5] => $this->getCattramonorId(),
			$keys[6] => $this->getTiplinsur(),
			$keys[7] => $this->getCattramosurId(),
			$keys[8] => $this->getTiplinest(),
			$keys[9] => $this->getCattramoestId(),
			$keys[10] => $this->getTiplinoes(),
			$keys[11] => $this->getCattramooesId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatmanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCatdivgeoId($value);
				break;
			case 2:
				$this->setNomman($value);
				break;
			case 3:
				$this->setAliman($value);
				break;
			case 4:
				$this->setTiplinnor($value);
				break;
			case 5:
				$this->setCattramonorId($value);
				break;
			case 6:
				$this->setTiplinsur($value);
				break;
			case 7:
				$this->setCattramosurId($value);
				break;
			case 8:
				$this->setTiplinest($value);
				break;
			case 9:
				$this->setCattramoestId($value);
				break;
			case 10:
				$this->setTiplinoes($value);
				break;
			case 11:
				$this->setCattramooesId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatmanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatdivgeoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomman($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAliman($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTiplinnor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCattramonorId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTiplinsur($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCattramosurId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTiplinest($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCattramoestId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTiplinoes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCattramooesId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatmanPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatmanPeer::ID)) $criteria->add(CatmanPeer::ID, $this->id);
		if ($this->isColumnModified(CatmanPeer::CATDIVGEO_ID)) $criteria->add(CatmanPeer::CATDIVGEO_ID, $this->catdivgeo_id);
		if ($this->isColumnModified(CatmanPeer::NOMMAN)) $criteria->add(CatmanPeer::NOMMAN, $this->nomman);
		if ($this->isColumnModified(CatmanPeer::ALIMAN)) $criteria->add(CatmanPeer::ALIMAN, $this->aliman);
		if ($this->isColumnModified(CatmanPeer::TIPLINNOR)) $criteria->add(CatmanPeer::TIPLINNOR, $this->tiplinnor);
		if ($this->isColumnModified(CatmanPeer::CATTRAMONOR_ID)) $criteria->add(CatmanPeer::CATTRAMONOR_ID, $this->cattramonor_id);
		if ($this->isColumnModified(CatmanPeer::TIPLINSUR)) $criteria->add(CatmanPeer::TIPLINSUR, $this->tiplinsur);
		if ($this->isColumnModified(CatmanPeer::CATTRAMOSUR_ID)) $criteria->add(CatmanPeer::CATTRAMOSUR_ID, $this->cattramosur_id);
		if ($this->isColumnModified(CatmanPeer::TIPLINEST)) $criteria->add(CatmanPeer::TIPLINEST, $this->tiplinest);
		if ($this->isColumnModified(CatmanPeer::CATTRAMOEST_ID)) $criteria->add(CatmanPeer::CATTRAMOEST_ID, $this->cattramoest_id);
		if ($this->isColumnModified(CatmanPeer::TIPLINOES)) $criteria->add(CatmanPeer::TIPLINOES, $this->tiplinoes);
		if ($this->isColumnModified(CatmanPeer::CATTRAMOOES_ID)) $criteria->add(CatmanPeer::CATTRAMOOES_ID, $this->cattramooes_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatmanPeer::DATABASE_NAME);

		$criteria->add(CatmanPeer::ID, $this->id);

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

		$copyObj->setCatdivgeoId($this->catdivgeo_id);

		$copyObj->setNomman($this->nomman);

		$copyObj->setAliman($this->aliman);

		$copyObj->setTiplinnor($this->tiplinnor);

		$copyObj->setCattramonorId($this->cattramonor_id);

		$copyObj->setTiplinsur($this->tiplinsur);

		$copyObj->setCattramosurId($this->cattramosur_id);

		$copyObj->setTiplinest($this->tiplinest);

		$copyObj->setCattramoestId($this->cattramoest_id);

		$copyObj->setTiplinoes($this->tiplinoes);

		$copyObj->setCattramooesId($this->cattramooes_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatreginms() as $relObj) {
				$copyObj->addCatreginm($relObj->copy($deepCopy));
			}

			foreach($this->getCatsubprcs() as $relObj) {
				$copyObj->addCatsubprc($relObj->copy($deepCopy));
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
			self::$peer = new CatmanPeer();
		}
		return self::$peer;
	}

	
	public function setCatdivgeo($v)
	{


		if ($v === null) {
			$this->setCatdivgeoId(NULL);
		} else {
			$this->setCatdivgeoId($v->getId());
		}


		$this->aCatdivgeo = $v;
	}


	
	public function getCatdivgeo($con = null)
	{
		if ($this->aCatdivgeo === null && ($this->catdivgeo_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatdivgeoPeer.php';

			$this->aCatdivgeo = CatdivgeoPeer::retrieveByPK($this->catdivgeo_id, $con);

			
		}
		return $this->aCatdivgeo;
	}

	
	public function setCattramoRelatedByCattramonorId($v)
	{


		if ($v === null) {
			$this->setCattramonorId(NULL);
		} else {
			$this->setCattramonorId($v->getId());
		}


		$this->aCattramoRelatedByCattramonorId = $v;
	}


	
	public function getCattramoRelatedByCattramonorId($con = null)
	{
		if ($this->aCattramoRelatedByCattramonorId === null && ($this->cattramonor_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramonorId = CattramoPeer::retrieveByPK($this->cattramonor_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramonorId;
	}

	
	public function setCattramoRelatedByCattramosurId($v)
	{


		if ($v === null) {
			$this->setCattramosurId(NULL);
		} else {
			$this->setCattramosurId($v->getId());
		}


		$this->aCattramoRelatedByCattramosurId = $v;
	}


	
	public function getCattramoRelatedByCattramosurId($con = null)
	{
		if ($this->aCattramoRelatedByCattramosurId === null && ($this->cattramosur_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramosurId = CattramoPeer::retrieveByPK($this->cattramosur_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramosurId;
	}

	
	public function setCattramoRelatedByCattramoestId($v)
	{


		if ($v === null) {
			$this->setCattramoestId(NULL);
		} else {
			$this->setCattramoestId($v->getId());
		}


		$this->aCattramoRelatedByCattramoestId = $v;
	}


	
	public function getCattramoRelatedByCattramoestId($con = null)
	{
		if ($this->aCattramoRelatedByCattramoestId === null && ($this->cattramoest_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramoestId = CattramoPeer::retrieveByPK($this->cattramoest_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramoestId;
	}

	
	public function setCattramoRelatedByCattramooesId($v)
	{


		if ($v === null) {
			$this->setCattramooesId(NULL);
		} else {
			$this->setCattramooesId($v->getId());
		}


		$this->aCattramoRelatedByCattramooesId = $v;
	}


	
	public function getCattramoRelatedByCattramooesId($con = null)
	{
		if ($this->aCattramoRelatedByCattramooesId === null && ($this->cattramooes_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramooesId = CattramoPeer::retrieveByPK($this->cattramooes_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramooesId;
	}

	
	public function initCatreginms()
	{
		if ($this->collCatreginms === null) {
			$this->collCatreginms = array();
		}
	}

	
	public function getCatreginms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
			   $this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
					$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatreginmCriteria = $criteria;
		return $this->collCatreginms;
	}

	
	public function countCatreginms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginm(Catreginm $l)
	{
		$this->collCatreginms[] = $l;
		$l->setCatman($this);
	}


	
	public function getCatreginmsJoinCatsubprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramofroId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramolatId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramolat2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatconinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatusoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatconsoc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatrut($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatcarterinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatproter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}

	
	public function initCatsubprcs()
	{
		if ($this->collCatsubprcs === null) {
			$this->collCatsubprcs = array();
		}
	}

	
	public function getCatsubprcs($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
			   $this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				CatsubprcPeer::addSelectColumns($criteria);
				$this->collCatsubprcs = CatsubprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				CatsubprcPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
					$this->collCatsubprcs = CatsubprcPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatsubprcCriteria = $criteria;
		return $this->collCatsubprcs;
	}

	
	public function countCatsubprcs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

		return CatsubprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatsubprc(Catsubprc $l)
	{
		$this->collCatsubprcs[] = $l;
		$l->setCatman($this);
	}


	
	public function getCatsubprcsJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATMAN_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}

} 