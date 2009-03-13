<?php


abstract class BaseCobtipdesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cobtipdes';

	
	const CLASS_DEFAULT = 'lib.model.Cobtipdes';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODDES = 'cobtipdes.CODDES';

	
	const DESDES = 'cobtipdes.DESDES';

	
	const CODCON = 'cobtipdes.CODCON';

	
	const TIPDES = 'cobtipdes.TIPDES';

	
	const VALDES = 'cobtipdes.VALDES';

	
	const DIADES = 'cobtipdes.DIADES';

	
	const ESTRET = 'cobtipdes.ESTRET';

	
	const ID = 'cobtipdes.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coddes', 'Desdes', 'Codcon', 'Tipdes', 'Valdes', 'Diades', 'Estret', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CobtipdesPeer::CODDES, CobtipdesPeer::DESDES, CobtipdesPeer::CODCON, CobtipdesPeer::TIPDES, CobtipdesPeer::VALDES, CobtipdesPeer::DIADES, CobtipdesPeer::ESTRET, CobtipdesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coddes', 'desdes', 'codcon', 'tipdes', 'valdes', 'diades', 'estret', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coddes' => 0, 'Desdes' => 1, 'Codcon' => 2, 'Tipdes' => 3, 'Valdes' => 4, 'Diades' => 5, 'Estret' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CobtipdesPeer::CODDES => 0, CobtipdesPeer::DESDES => 1, CobtipdesPeer::CODCON => 2, CobtipdesPeer::TIPDES => 3, CobtipdesPeer::VALDES => 4, CobtipdesPeer::DIADES => 5, CobtipdesPeer::ESTRET => 6, CobtipdesPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('coddes' => 0, 'desdes' => 1, 'codcon' => 2, 'tipdes' => 3, 'valdes' => 4, 'diades' => 5, 'estret' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CobtipdesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CobtipdesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CobtipdesPeer::getTableMap();
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
		return str_replace(CobtipdesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CobtipdesPeer::CODDES);

		$criteria->addSelectColumn(CobtipdesPeer::DESDES);

		$criteria->addSelectColumn(CobtipdesPeer::CODCON);

		$criteria->addSelectColumn(CobtipdesPeer::TIPDES);

		$criteria->addSelectColumn(CobtipdesPeer::VALDES);

		$criteria->addSelectColumn(CobtipdesPeer::DIADES);

		$criteria->addSelectColumn(CobtipdesPeer::ESTRET);

		$criteria->addSelectColumn(CobtipdesPeer::ID);

	}

	const COUNT = 'COUNT(cobtipdes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cobtipdes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobtipdesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobtipdesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CobtipdesPeer::doSelectRS($criteria, $con);
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
		$objects = CobtipdesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CobtipdesPeer::populateObjects(CobtipdesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CobtipdesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CobtipdesPeer::getOMClass();
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
		return CobtipdesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CobtipdesPeer::ID); 

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
			$comparison = $criteria->getComparison(CobtipdesPeer::ID);
			$selectCriteria->add(CobtipdesPeer::ID, $criteria->remove(CobtipdesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CobtipdesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CobtipdesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cobtipdes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CobtipdesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cobtipdes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CobtipdesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CobtipdesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CobtipdesPeer::DATABASE_NAME, CobtipdesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CobtipdesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CobtipdesPeer::DATABASE_NAME);

		$criteria->add(CobtipdesPeer::ID, $pk);


		$v = CobtipdesPeer::doSelect($criteria, $con);

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
			$criteria->add(CobtipdesPeer::ID, $pks, Criteria::IN);
			$objs = CobtipdesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCobtipdesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CobtipdesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CobtipdesMapBuilder');
}
