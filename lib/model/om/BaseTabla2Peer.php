<?php


abstract class BaseTabla2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla2';

	
	const CLASS_DEFAULT = 'lib.model.Tabla2';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRC = 'tabla2.REFPRC';

	
	const CODPRE = 'tabla2.CODPRE';

	
	const MONIMP = 'tabla2.MONIMP';

	
	const MONCOM = 'tabla2.MONCOM';

	
	const MONCAU = 'tabla2.MONCAU';

	
	const MONPAG = 'tabla2.MONPAG';

	
	const MONAJU = 'tabla2.MONAJU';

	
	const STAIMP = 'tabla2.STAIMP';

	
	const ID = 'tabla2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refprc', 'Codpre', 'Monimp', 'Moncom', 'Moncau', 'Monpag', 'Monaju', 'Staimp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla2Peer::REFPRC, Tabla2Peer::CODPRE, Tabla2Peer::MONIMP, Tabla2Peer::MONCOM, Tabla2Peer::MONCAU, Tabla2Peer::MONPAG, Tabla2Peer::MONAJU, Tabla2Peer::STAIMP, Tabla2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refprc', 'codpre', 'monimp', 'moncom', 'moncau', 'monpag', 'monaju', 'staimp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refprc' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Moncom' => 3, 'Moncau' => 4, 'Monpag' => 5, 'Monaju' => 6, 'Staimp' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla2Peer::REFPRC => 0, Tabla2Peer::CODPRE => 1, Tabla2Peer::MONIMP => 2, Tabla2Peer::MONCOM => 3, Tabla2Peer::MONCAU => 4, Tabla2Peer::MONPAG => 5, Tabla2Peer::MONAJU => 6, Tabla2Peer::STAIMP => 7, Tabla2Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refprc' => 0, 'codpre' => 1, 'monimp' => 2, 'moncom' => 3, 'moncau' => 4, 'monpag' => 5, 'monaju' => 6, 'staimp' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla2Peer::getTableMap();
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
		return str_replace(Tabla2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla2Peer::REFPRC);

		$criteria->addSelectColumn(Tabla2Peer::CODPRE);

		$criteria->addSelectColumn(Tabla2Peer::MONIMP);

		$criteria->addSelectColumn(Tabla2Peer::MONCOM);

		$criteria->addSelectColumn(Tabla2Peer::MONCAU);

		$criteria->addSelectColumn(Tabla2Peer::MONPAG);

		$criteria->addSelectColumn(Tabla2Peer::MONAJU);

		$criteria->addSelectColumn(Tabla2Peer::STAIMP);

		$criteria->addSelectColumn(Tabla2Peer::ID);

	}

	const COUNT = 'COUNT(tabla2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla2Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla2Peer::populateObjects(Tabla2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla2Peer::getOMClass();
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
		return Tabla2Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla2Peer::ID);
			$selectCriteria->add(Tabla2Peer::ID, $criteria->remove(Tabla2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla2Peer::DATABASE_NAME, Tabla2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla2Peer::DATABASE_NAME);

		$criteria->add(Tabla2Peer::ID, $pk);


		$v = Tabla2Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla2Peer::ID, $pks, Criteria::IN);
			$objs = Tabla2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla2MapBuilder');
}
