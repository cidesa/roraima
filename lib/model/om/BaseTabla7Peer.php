<?php


abstract class BaseTabla7Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla7';

	
	const CLASS_DEFAULT = 'lib.model.Tabla7';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRC = 'tabla7.REFPRC';

	
	const CODPRE = 'tabla7.CODPRE';

	
	const MONIMP = 'tabla7.MONIMP';

	
	const MONCOM = 'tabla7.MONCOM';

	
	const MONCAU = 'tabla7.MONCAU';

	
	const MONPAG = 'tabla7.MONPAG';

	
	const MONAJU = 'tabla7.MONAJU';

	
	const STAIMP = 'tabla7.STAIMP';

	
	const ID = 'tabla7.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refprc', 'Codpre', 'Monimp', 'Moncom', 'Moncau', 'Monpag', 'Monaju', 'Staimp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla7Peer::REFPRC, Tabla7Peer::CODPRE, Tabla7Peer::MONIMP, Tabla7Peer::MONCOM, Tabla7Peer::MONCAU, Tabla7Peer::MONPAG, Tabla7Peer::MONAJU, Tabla7Peer::STAIMP, Tabla7Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refprc', 'codpre', 'monimp', 'moncom', 'moncau', 'monpag', 'monaju', 'staimp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refprc' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Moncom' => 3, 'Moncau' => 4, 'Monpag' => 5, 'Monaju' => 6, 'Staimp' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla7Peer::REFPRC => 0, Tabla7Peer::CODPRE => 1, Tabla7Peer::MONIMP => 2, Tabla7Peer::MONCOM => 3, Tabla7Peer::MONCAU => 4, Tabla7Peer::MONPAG => 5, Tabla7Peer::MONAJU => 6, Tabla7Peer::STAIMP => 7, Tabla7Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refprc' => 0, 'codpre' => 1, 'monimp' => 2, 'moncom' => 3, 'moncau' => 4, 'monpag' => 5, 'monaju' => 6, 'staimp' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla7MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla7MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla7Peer::getTableMap();
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
		return str_replace(Tabla7Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla7Peer::REFPRC);

		$criteria->addSelectColumn(Tabla7Peer::CODPRE);

		$criteria->addSelectColumn(Tabla7Peer::MONIMP);

		$criteria->addSelectColumn(Tabla7Peer::MONCOM);

		$criteria->addSelectColumn(Tabla7Peer::MONCAU);

		$criteria->addSelectColumn(Tabla7Peer::MONPAG);

		$criteria->addSelectColumn(Tabla7Peer::MONAJU);

		$criteria->addSelectColumn(Tabla7Peer::STAIMP);

		$criteria->addSelectColumn(Tabla7Peer::ID);

	}

	const COUNT = 'COUNT(tabla7.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla7.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla7Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla7Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla7Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla7Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla7Peer::populateObjects(Tabla7Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla7Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla7Peer::getOMClass();
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
		return Tabla7Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla7Peer::ID);
			$selectCriteria->add(Tabla7Peer::ID, $criteria->remove(Tabla7Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla7Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla7Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla7) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla7Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla7 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla7Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla7Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla7Peer::DATABASE_NAME, Tabla7Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla7Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla7Peer::DATABASE_NAME);

		$criteria->add(Tabla7Peer::ID, $pk);


		$v = Tabla7Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla7Peer::ID, $pks, Criteria::IN);
			$objs = Tabla7Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla7Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla7MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla7MapBuilder');
}
