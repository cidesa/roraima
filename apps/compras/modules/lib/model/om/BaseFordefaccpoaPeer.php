<?php


abstract class BaseFordefaccpoaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefaccpoa';

	
	const CLASS_DEFAULT = 'lib.model.Fordefaccpoa';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODSUBACC = 'fordefaccpoa.CODSUBACC';

	
	const DESSUBACC = 'fordefaccpoa.DESSUBACC';

	
	const METSUBACC = 'fordefaccpoa.METSUBACC';

	
	const LOCSUBACC = 'fordefaccpoa.LOCSUBACC';

	
	const INDGESSUBACC = 'fordefaccpoa.INDGESSUBACC';

	
	const CODUNIMED = 'fordefaccpoa.CODUNIMED';

	
	const MEDVERSUBACC = 'fordefaccpoa.MEDVERSUBACC';

	
	const SUPSUBACC = 'fordefaccpoa.SUPSUBACC';

	
	const METPRITRI = 'fordefaccpoa.METPRITRI';

	
	const METSEGTRI = 'fordefaccpoa.METSEGTRI';

	
	const METTERTRI = 'fordefaccpoa.METTERTRI';

	
	const METCUATRI = 'fordefaccpoa.METCUATRI';

	
	const METTOT = 'fordefaccpoa.METTOT';

	
	const ID = 'fordefaccpoa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codsubacc', 'Dessubacc', 'Metsubacc', 'Locsubacc', 'Indgessubacc', 'Codunimed', 'Medversubacc', 'Supsubacc', 'Metpritri', 'Metsegtri', 'Mettertri', 'Metcuatri', 'Mettot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefaccpoaPeer::CODSUBACC, FordefaccpoaPeer::DESSUBACC, FordefaccpoaPeer::METSUBACC, FordefaccpoaPeer::LOCSUBACC, FordefaccpoaPeer::INDGESSUBACC, FordefaccpoaPeer::CODUNIMED, FordefaccpoaPeer::MEDVERSUBACC, FordefaccpoaPeer::SUPSUBACC, FordefaccpoaPeer::METPRITRI, FordefaccpoaPeer::METSEGTRI, FordefaccpoaPeer::METTERTRI, FordefaccpoaPeer::METCUATRI, FordefaccpoaPeer::METTOT, FordefaccpoaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codsubacc', 'dessubacc', 'metsubacc', 'locsubacc', 'indgessubacc', 'codunimed', 'medversubacc', 'supsubacc', 'metpritri', 'metsegtri', 'mettertri', 'metcuatri', 'mettot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codsubacc' => 0, 'Dessubacc' => 1, 'Metsubacc' => 2, 'Locsubacc' => 3, 'Indgessubacc' => 4, 'Codunimed' => 5, 'Medversubacc' => 6, 'Supsubacc' => 7, 'Metpritri' => 8, 'Metsegtri' => 9, 'Mettertri' => 10, 'Metcuatri' => 11, 'Mettot' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (FordefaccpoaPeer::CODSUBACC => 0, FordefaccpoaPeer::DESSUBACC => 1, FordefaccpoaPeer::METSUBACC => 2, FordefaccpoaPeer::LOCSUBACC => 3, FordefaccpoaPeer::INDGESSUBACC => 4, FordefaccpoaPeer::CODUNIMED => 5, FordefaccpoaPeer::MEDVERSUBACC => 6, FordefaccpoaPeer::SUPSUBACC => 7, FordefaccpoaPeer::METPRITRI => 8, FordefaccpoaPeer::METSEGTRI => 9, FordefaccpoaPeer::METTERTRI => 10, FordefaccpoaPeer::METCUATRI => 11, FordefaccpoaPeer::METTOT => 12, FordefaccpoaPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codsubacc' => 0, 'dessubacc' => 1, 'metsubacc' => 2, 'locsubacc' => 3, 'indgessubacc' => 4, 'codunimed' => 5, 'medversubacc' => 6, 'supsubacc' => 7, 'metpritri' => 8, 'metsegtri' => 9, 'mettertri' => 10, 'metcuatri' => 11, 'mettot' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefaccpoaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefaccpoaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefaccpoaPeer::getTableMap();
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
		return str_replace(FordefaccpoaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefaccpoaPeer::CODSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::DESSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::METSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::LOCSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::INDGESSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::CODUNIMED);

		$criteria->addSelectColumn(FordefaccpoaPeer::MEDVERSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::SUPSUBACC);

		$criteria->addSelectColumn(FordefaccpoaPeer::METPRITRI);

		$criteria->addSelectColumn(FordefaccpoaPeer::METSEGTRI);

		$criteria->addSelectColumn(FordefaccpoaPeer::METTERTRI);

		$criteria->addSelectColumn(FordefaccpoaPeer::METCUATRI);

		$criteria->addSelectColumn(FordefaccpoaPeer::METTOT);

		$criteria->addSelectColumn(FordefaccpoaPeer::ID);

	}

	const COUNT = 'COUNT(fordefaccpoa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefaccpoa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefaccpoaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefaccpoaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefaccpoaPeer::doSelectRS($criteria, $con);
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
		$objects = FordefaccpoaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefaccpoaPeer::populateObjects(FordefaccpoaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefaccpoaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefaccpoaPeer::getOMClass();
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
		return FordefaccpoaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FordefaccpoaPeer::ID); 

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
			$comparison = $criteria->getComparison(FordefaccpoaPeer::ID);
			$selectCriteria->add(FordefaccpoaPeer::ID, $criteria->remove(FordefaccpoaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefaccpoaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefaccpoaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefaccpoa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefaccpoaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefaccpoa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefaccpoaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefaccpoaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefaccpoaPeer::DATABASE_NAME, FordefaccpoaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefaccpoaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefaccpoaPeer::DATABASE_NAME);

		$criteria->add(FordefaccpoaPeer::ID, $pk);


		$v = FordefaccpoaPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefaccpoaPeer::ID, $pks, Criteria::IN);
			$objs = FordefaccpoaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefaccpoaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefaccpoaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefaccpoaMapBuilder');
}
