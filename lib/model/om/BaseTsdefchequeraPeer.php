<?php


abstract class BaseTsdefchequeraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsdefchequera';

	
	const CLASS_DEFAULT = 'lib.model.Tsdefchequera';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCHQ = 'tsdefchequera.CODCHQ';

	
	const NUMCHE = 'tsdefchequera.NUMCHE';

	
	const NUMCUE = 'tsdefchequera.NUMCUE';

	
	const NUMCHEDES = 'tsdefchequera.NUMCHEDES';

	
	const NUMCHEHAS = 'tsdefchequera.NUMCHEHAS';

	
	const ACTIVA = 'tsdefchequera.ACTIVA';

	
	const ID = 'tsdefchequera.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codchq', 'Numche', 'Numcue', 'Numchedes', 'Numchehas', 'Activa', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsdefchequeraPeer::CODCHQ, TsdefchequeraPeer::NUMCHE, TsdefchequeraPeer::NUMCUE, TsdefchequeraPeer::NUMCHEDES, TsdefchequeraPeer::NUMCHEHAS, TsdefchequeraPeer::ACTIVA, TsdefchequeraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codchq', 'numche', 'numcue', 'numchedes', 'numchehas', 'activa', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codchq' => 0, 'Numche' => 1, 'Numcue' => 2, 'Numchedes' => 3, 'Numchehas' => 4, 'Activa' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (TsdefchequeraPeer::CODCHQ => 0, TsdefchequeraPeer::NUMCHE => 1, TsdefchequeraPeer::NUMCUE => 2, TsdefchequeraPeer::NUMCHEDES => 3, TsdefchequeraPeer::NUMCHEHAS => 4, TsdefchequeraPeer::ACTIVA => 5, TsdefchequeraPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codchq' => 0, 'numche' => 1, 'numcue' => 2, 'numchedes' => 3, 'numchehas' => 4, 'activa' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsdefchequeraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsdefchequeraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsdefchequeraPeer::getTableMap();
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
		return str_replace(TsdefchequeraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsdefchequeraPeer::CODCHQ);

		$criteria->addSelectColumn(TsdefchequeraPeer::NUMCHE);

		$criteria->addSelectColumn(TsdefchequeraPeer::NUMCUE);

		$criteria->addSelectColumn(TsdefchequeraPeer::NUMCHEDES);

		$criteria->addSelectColumn(TsdefchequeraPeer::NUMCHEHAS);

		$criteria->addSelectColumn(TsdefchequeraPeer::ACTIVA);

		$criteria->addSelectColumn(TsdefchequeraPeer::ID);

	}

	const COUNT = 'COUNT(tsdefchequera.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsdefchequera.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsdefchequeraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsdefchequeraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsdefchequeraPeer::doSelectRS($criteria, $con);
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
		$objects = TsdefchequeraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsdefchequeraPeer::populateObjects(TsdefchequeraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsdefchequeraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsdefchequeraPeer::getOMClass();
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
		return TsdefchequeraPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(TsdefchequeraPeer::ID);
			$selectCriteria->add(TsdefchequeraPeer::ID, $criteria->remove(TsdefchequeraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsdefchequeraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsdefchequeraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsdefchequera) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsdefchequeraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsdefchequera $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsdefchequeraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsdefchequeraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsdefchequeraPeer::DATABASE_NAME, TsdefchequeraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsdefchequeraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsdefchequeraPeer::DATABASE_NAME);

		$criteria->add(TsdefchequeraPeer::ID, $pk);


		$v = TsdefchequeraPeer::doSelect($criteria, $con);

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
			$criteria->add(TsdefchequeraPeer::ID, $pks, Criteria::IN);
			$objs = TsdefchequeraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsdefchequeraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsdefchequeraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsdefchequeraMapBuilder');
}
