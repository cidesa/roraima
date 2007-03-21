<?php


abstract class BaseTsrelfonviaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsrelfonvia';

	
	const CLASS_DEFAULT = 'lib.model.Tsrelfonvia';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'tsrelfonvia.NUMSOL';

	
	const NUMCHE = 'tsrelfonvia.NUMCHE';

	
	const NUMCUE = 'tsrelfonvia.NUMCUE';

	
	const CEDRIF = 'tsrelfonvia.CEDRIF';

	
	const NOMBEN = 'tsrelfonvia.NOMBEN';

	
	const MONCHE = 'tsrelfonvia.MONCHE';

	
	const CODCAT = 'tsrelfonvia.CODCAT';

	
	const FECEMI = 'tsrelfonvia.FECEMI';

	
	const CODPRE = 'tsrelfonvia.CODPRE';

	
	const NUMDEP = 'tsrelfonvia.NUMDEP';

	
	const ID = 'tsrelfonvia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Numche', 'Numcue', 'Cedrif', 'Nomben', 'Monche', 'Codcat', 'Fecemi', 'Codpre', 'Numdep', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsrelfonviaPeer::NUMSOL, TsrelfonviaPeer::NUMCHE, TsrelfonviaPeer::NUMCUE, TsrelfonviaPeer::CEDRIF, TsrelfonviaPeer::NOMBEN, TsrelfonviaPeer::MONCHE, TsrelfonviaPeer::CODCAT, TsrelfonviaPeer::FECEMI, TsrelfonviaPeer::CODPRE, TsrelfonviaPeer::NUMDEP, TsrelfonviaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'numche', 'numcue', 'cedrif', 'nomben', 'monche', 'codcat', 'fecemi', 'codpre', 'numdep', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Numche' => 1, 'Numcue' => 2, 'Cedrif' => 3, 'Nomben' => 4, 'Monche' => 5, 'Codcat' => 6, 'Fecemi' => 7, 'Codpre' => 8, 'Numdep' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (TsrelfonviaPeer::NUMSOL => 0, TsrelfonviaPeer::NUMCHE => 1, TsrelfonviaPeer::NUMCUE => 2, TsrelfonviaPeer::CEDRIF => 3, TsrelfonviaPeer::NOMBEN => 4, TsrelfonviaPeer::MONCHE => 5, TsrelfonviaPeer::CODCAT => 6, TsrelfonviaPeer::FECEMI => 7, TsrelfonviaPeer::CODPRE => 8, TsrelfonviaPeer::NUMDEP => 9, TsrelfonviaPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'numche' => 1, 'numcue' => 2, 'cedrif' => 3, 'nomben' => 4, 'monche' => 5, 'codcat' => 6, 'fecemi' => 7, 'codpre' => 8, 'numdep' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsrelfonviaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsrelfonviaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsrelfonviaPeer::getTableMap();
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
		return str_replace(TsrelfonviaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsrelfonviaPeer::NUMSOL);

		$criteria->addSelectColumn(TsrelfonviaPeer::NUMCHE);

		$criteria->addSelectColumn(TsrelfonviaPeer::NUMCUE);

		$criteria->addSelectColumn(TsrelfonviaPeer::CEDRIF);

		$criteria->addSelectColumn(TsrelfonviaPeer::NOMBEN);

		$criteria->addSelectColumn(TsrelfonviaPeer::MONCHE);

		$criteria->addSelectColumn(TsrelfonviaPeer::CODCAT);

		$criteria->addSelectColumn(TsrelfonviaPeer::FECEMI);

		$criteria->addSelectColumn(TsrelfonviaPeer::CODPRE);

		$criteria->addSelectColumn(TsrelfonviaPeer::NUMDEP);

		$criteria->addSelectColumn(TsrelfonviaPeer::ID);

	}

	const COUNT = 'COUNT(tsrelfonvia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsrelfonvia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsrelfonviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsrelfonviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsrelfonviaPeer::doSelectRS($criteria, $con);
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
		$objects = TsrelfonviaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsrelfonviaPeer::populateObjects(TsrelfonviaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsrelfonviaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsrelfonviaPeer::getOMClass();
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
		return TsrelfonviaPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(TsrelfonviaPeer::ID);
			$selectCriteria->add(TsrelfonviaPeer::ID, $criteria->remove(TsrelfonviaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsrelfonviaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsrelfonviaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsrelfonvia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsrelfonviaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsrelfonvia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsrelfonviaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsrelfonviaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsrelfonviaPeer::DATABASE_NAME, TsrelfonviaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsrelfonviaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsrelfonviaPeer::DATABASE_NAME);

		$criteria->add(TsrelfonviaPeer::ID, $pk);


		$v = TsrelfonviaPeer::doSelect($criteria, $con);

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
			$criteria->add(TsrelfonviaPeer::ID, $pks, Criteria::IN);
			$objs = TsrelfonviaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsrelfonviaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsrelfonviaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsrelfonviaMapBuilder');
}
