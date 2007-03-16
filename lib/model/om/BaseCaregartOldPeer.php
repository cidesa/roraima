<?php


abstract class BaseCaregartOldPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caregart_old';

	
	const CLASS_DEFAULT = 'lib.model.CaregartOld';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODART = 'caregart_old.CODART';

	
	const DESART = 'caregart_old.DESART';

	
	const CODCTA = 'caregart_old.CODCTA';

	
	const CODPAR = 'caregart_old.CODPAR';

	
	const RAMART = 'caregart_old.RAMART';

	
	const COSULT = 'caregart_old.COSULT';

	
	const COSPRO = 'caregart_old.COSPRO';

	
	const EXITOT = 'caregart_old.EXITOT';

	
	const UNIMED = 'caregart_old.UNIMED';

	
	const UNIALT = 'caregart_old.UNIALT';

	
	const RELART = 'caregart_old.RELART';

	
	const FECULT = 'caregart_old.FECULT';

	
	const INVINI = 'caregart_old.INVINI';

	
	const CODMAR = 'caregart_old.CODMAR';

	
	const CODREF = 'caregart_old.CODREF';

	
	const COSTOT = 'caregart_old.COSTOT';

	
	const SIGECOF = 'caregart_old.SIGECOF';

	
	const CODCLAART = 'caregart_old.CODCLAART';

	
	const LOTUNI = 'caregart_old.LOTUNI';

	
	const CTAVTA = 'caregart_old.CTAVTA';

	
	const CTACOS = 'caregart_old.CTACOS';

	
	const CTAPRO = 'caregart_old.CTAPRO';

	
	const PREART = 'caregart_old.PREART';

	
	const DISTOT = 'caregart_old.DISTOT';

	
	const TIPO = 'caregart_old.TIPO';

	
	const TIP0 = 'caregart_old.TIP0';

	
	const CODING = 'caregart_old.CODING';

	
	const MERCON = 'caregart_old.MERCON';

	
	const ID = 'caregart_old.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codart', 'Desart', 'Codcta', 'Codpar', 'Ramart', 'Cosult', 'Cospro', 'Exitot', 'Unimed', 'Unialt', 'Relart', 'Fecult', 'Invini', 'Codmar', 'Codref', 'Costot', 'Sigecof', 'Codclaart', 'Lotuni', 'Ctavta', 'Ctacos', 'Ctapro', 'Preart', 'Distot', 'Tipo', 'Tip0', 'Coding', 'Mercon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaregartOldPeer::CODART, CaregartOldPeer::DESART, CaregartOldPeer::CODCTA, CaregartOldPeer::CODPAR, CaregartOldPeer::RAMART, CaregartOldPeer::COSULT, CaregartOldPeer::COSPRO, CaregartOldPeer::EXITOT, CaregartOldPeer::UNIMED, CaregartOldPeer::UNIALT, CaregartOldPeer::RELART, CaregartOldPeer::FECULT, CaregartOldPeer::INVINI, CaregartOldPeer::CODMAR, CaregartOldPeer::CODREF, CaregartOldPeer::COSTOT, CaregartOldPeer::SIGECOF, CaregartOldPeer::CODCLAART, CaregartOldPeer::LOTUNI, CaregartOldPeer::CTAVTA, CaregartOldPeer::CTACOS, CaregartOldPeer::CTAPRO, CaregartOldPeer::PREART, CaregartOldPeer::DISTOT, CaregartOldPeer::TIPO, CaregartOldPeer::TIP0, CaregartOldPeer::CODING, CaregartOldPeer::MERCON, CaregartOldPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codart', 'desart', 'codcta', 'codpar', 'ramart', 'cosult', 'cospro', 'exitot', 'unimed', 'unialt', 'relart', 'fecult', 'invini', 'codmar', 'codref', 'costot', 'sigecof', 'codclaart', 'lotuni', 'ctavta', 'ctacos', 'ctapro', 'preart', 'distot', 'tipo', 'tip0', 'coding', 'mercon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codart' => 0, 'Desart' => 1, 'Codcta' => 2, 'Codpar' => 3, 'Ramart' => 4, 'Cosult' => 5, 'Cospro' => 6, 'Exitot' => 7, 'Unimed' => 8, 'Unialt' => 9, 'Relart' => 10, 'Fecult' => 11, 'Invini' => 12, 'Codmar' => 13, 'Codref' => 14, 'Costot' => 15, 'Sigecof' => 16, 'Codclaart' => 17, 'Lotuni' => 18, 'Ctavta' => 19, 'Ctacos' => 20, 'Ctapro' => 21, 'Preart' => 22, 'Distot' => 23, 'Tipo' => 24, 'Tip0' => 25, 'Coding' => 26, 'Mercon' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (CaregartOldPeer::CODART => 0, CaregartOldPeer::DESART => 1, CaregartOldPeer::CODCTA => 2, CaregartOldPeer::CODPAR => 3, CaregartOldPeer::RAMART => 4, CaregartOldPeer::COSULT => 5, CaregartOldPeer::COSPRO => 6, CaregartOldPeer::EXITOT => 7, CaregartOldPeer::UNIMED => 8, CaregartOldPeer::UNIALT => 9, CaregartOldPeer::RELART => 10, CaregartOldPeer::FECULT => 11, CaregartOldPeer::INVINI => 12, CaregartOldPeer::CODMAR => 13, CaregartOldPeer::CODREF => 14, CaregartOldPeer::COSTOT => 15, CaregartOldPeer::SIGECOF => 16, CaregartOldPeer::CODCLAART => 17, CaregartOldPeer::LOTUNI => 18, CaregartOldPeer::CTAVTA => 19, CaregartOldPeer::CTACOS => 20, CaregartOldPeer::CTAPRO => 21, CaregartOldPeer::PREART => 22, CaregartOldPeer::DISTOT => 23, CaregartOldPeer::TIPO => 24, CaregartOldPeer::TIP0 => 25, CaregartOldPeer::CODING => 26, CaregartOldPeer::MERCON => 27, CaregartOldPeer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('codart' => 0, 'desart' => 1, 'codcta' => 2, 'codpar' => 3, 'ramart' => 4, 'cosult' => 5, 'cospro' => 6, 'exitot' => 7, 'unimed' => 8, 'unialt' => 9, 'relart' => 10, 'fecult' => 11, 'invini' => 12, 'codmar' => 13, 'codref' => 14, 'costot' => 15, 'sigecof' => 16, 'codclaart' => 17, 'lotuni' => 18, 'ctavta' => 19, 'ctacos' => 20, 'ctapro' => 21, 'preart' => 22, 'distot' => 23, 'tipo' => 24, 'tip0' => 25, 'coding' => 26, 'mercon' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaregartOldMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaregartOldMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaregartOldPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(CaregartOldPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaregartOldPeer::CODART);

		$criteria->addSelectColumn(CaregartOldPeer::DESART);

		$criteria->addSelectColumn(CaregartOldPeer::CODCTA);

		$criteria->addSelectColumn(CaregartOldPeer::CODPAR);

		$criteria->addSelectColumn(CaregartOldPeer::RAMART);

		$criteria->addSelectColumn(CaregartOldPeer::COSULT);

		$criteria->addSelectColumn(CaregartOldPeer::COSPRO);

		$criteria->addSelectColumn(CaregartOldPeer::EXITOT);

		$criteria->addSelectColumn(CaregartOldPeer::UNIMED);

		$criteria->addSelectColumn(CaregartOldPeer::UNIALT);

		$criteria->addSelectColumn(CaregartOldPeer::RELART);

		$criteria->addSelectColumn(CaregartOldPeer::FECULT);

		$criteria->addSelectColumn(CaregartOldPeer::INVINI);

		$criteria->addSelectColumn(CaregartOldPeer::CODMAR);

		$criteria->addSelectColumn(CaregartOldPeer::CODREF);

		$criteria->addSelectColumn(CaregartOldPeer::COSTOT);

		$criteria->addSelectColumn(CaregartOldPeer::SIGECOF);

		$criteria->addSelectColumn(CaregartOldPeer::CODCLAART);

		$criteria->addSelectColumn(CaregartOldPeer::LOTUNI);

		$criteria->addSelectColumn(CaregartOldPeer::CTAVTA);

		$criteria->addSelectColumn(CaregartOldPeer::CTACOS);

		$criteria->addSelectColumn(CaregartOldPeer::CTAPRO);

		$criteria->addSelectColumn(CaregartOldPeer::PREART);

		$criteria->addSelectColumn(CaregartOldPeer::DISTOT);

		$criteria->addSelectColumn(CaregartOldPeer::TIPO);

		$criteria->addSelectColumn(CaregartOldPeer::TIP0);

		$criteria->addSelectColumn(CaregartOldPeer::CODING);

		$criteria->addSelectColumn(CaregartOldPeer::MERCON);

		$criteria->addSelectColumn(CaregartOldPeer::ID);

	}

	const COUNT = 'COUNT(caregart_old.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caregart_old.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaregartOldPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaregartOldPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaregartOldPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CaregartOldPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaregartOldPeer::populateObjects(CaregartOldPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaregartOldPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaregartOldPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CaregartOldPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(CaregartOldPeer::ID);
			$selectCriteria->add(CaregartOldPeer::ID, $criteria->remove(CaregartOldPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(CaregartOldPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(CaregartOldPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CaregartOld) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaregartOldPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(CaregartOld $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaregartOldPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaregartOldPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(CaregartOldPeer::DATABASE_NAME, CaregartOldPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaregartOldPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(CaregartOldPeer::DATABASE_NAME);

		$criteria->add(CaregartOldPeer::ID, $pk);


		$v = CaregartOldPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(CaregartOldPeer::ID, $pks, Criteria::IN);
			$objs = CaregartOldPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaregartOldPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaregartOldMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaregartOldMapBuilder');
}
