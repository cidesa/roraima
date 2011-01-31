<?php


abstract class BasePresupuesto5Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'presupuesto5';

	
	const CLASS_DEFAULT = 'lib.model.Presupuesto5';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'presupuesto5.CODPRE';

	
	const NOMPRE = 'presupuesto5.NOMPRE';

	
	const CODCTA = 'presupuesto5.CODCTA';

	
	const STACOD = 'presupuesto5.STACOD';

	
	const CODUNI = 'presupuesto5.CODUNI';

	
	const ESTATUS = 'presupuesto5.ESTATUS';

	
	const CODTIP = 'presupuesto5.CODTIP';

	
	const ASIG = 'presupuesto5.ASIG';

	
	const ID = 'presupuesto5.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Codcta', 'Stacod', 'Coduni', 'Estatus', 'Codtip', 'Asig', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Presupuesto5Peer::CODPRE, Presupuesto5Peer::NOMPRE, Presupuesto5Peer::CODCTA, Presupuesto5Peer::STACOD, Presupuesto5Peer::CODUNI, Presupuesto5Peer::ESTATUS, Presupuesto5Peer::CODTIP, Presupuesto5Peer::ASIG, Presupuesto5Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'codcta', 'stacod', 'coduni', 'estatus', 'codtip', 'asig', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Codcta' => 2, 'Stacod' => 3, 'Coduni' => 4, 'Estatus' => 5, 'Codtip' => 6, 'Asig' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Presupuesto5Peer::CODPRE => 0, Presupuesto5Peer::NOMPRE => 1, Presupuesto5Peer::CODCTA => 2, Presupuesto5Peer::STACOD => 3, Presupuesto5Peer::CODUNI => 4, Presupuesto5Peer::ESTATUS => 5, Presupuesto5Peer::CODTIP => 6, Presupuesto5Peer::ASIG => 7, Presupuesto5Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'codcta' => 2, 'stacod' => 3, 'coduni' => 4, 'estatus' => 5, 'codtip' => 6, 'asig' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Presupuesto5MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Presupuesto5MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Presupuesto5Peer::getTableMap();
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
		return str_replace(Presupuesto5Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Presupuesto5Peer::CODPRE);

		$criteria->addSelectColumn(Presupuesto5Peer::NOMPRE);

		$criteria->addSelectColumn(Presupuesto5Peer::CODCTA);

		$criteria->addSelectColumn(Presupuesto5Peer::STACOD);

		$criteria->addSelectColumn(Presupuesto5Peer::CODUNI);

		$criteria->addSelectColumn(Presupuesto5Peer::ESTATUS);

		$criteria->addSelectColumn(Presupuesto5Peer::CODTIP);

		$criteria->addSelectColumn(Presupuesto5Peer::ASIG);

		$criteria->addSelectColumn(Presupuesto5Peer::ID);

	}

	const COUNT = 'COUNT(presupuesto5.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT presupuesto5.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Presupuesto5Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Presupuesto5Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Presupuesto5Peer::doSelectRS($criteria, $con);
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
		$objects = Presupuesto5Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Presupuesto5Peer::populateObjects(Presupuesto5Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Presupuesto5Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Presupuesto5Peer::getOMClass();
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
		return Presupuesto5Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Presupuesto5Peer::ID);
			$selectCriteria->add(Presupuesto5Peer::ID, $criteria->remove(Presupuesto5Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Presupuesto5Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Presupuesto5Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Presupuesto5) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Presupuesto5Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Presupuesto5 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Presupuesto5Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Presupuesto5Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Presupuesto5Peer::DATABASE_NAME, Presupuesto5Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Presupuesto5Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Presupuesto5Peer::DATABASE_NAME);

		$criteria->add(Presupuesto5Peer::ID, $pk);


		$v = Presupuesto5Peer::doSelect($criteria, $con);

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
			$criteria->add(Presupuesto5Peer::ID, $pks, Criteria::IN);
			$objs = Presupuesto5Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePresupuesto5Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Presupuesto5MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Presupuesto5MapBuilder');
}
