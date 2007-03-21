<?php


abstract class BaseTabla28Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla28';

	
	const CLASS_DEFAULT = 'lib.model.Tabla28';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'tabla28.REFCAU';

	
	const CODPRE = 'tabla28.CODPRE';

	
	const MONIMP = 'tabla28.MONIMP';

	
	const MONPAG = 'tabla28.MONPAG';

	
	const MONAJU = 'tabla28.MONAJU';

	
	const STAIMP = 'tabla28.STAIMP';

	
	const REFERE = 'tabla28.REFERE';

	
	const REFPRC = 'tabla28.REFPRC';

	
	const ID = 'tabla28.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Codpre', 'Monimp', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla28Peer::REFCAU, Tabla28Peer::CODPRE, Tabla28Peer::MONIMP, Tabla28Peer::MONPAG, Tabla28Peer::MONAJU, Tabla28Peer::STAIMP, Tabla28Peer::REFERE, Tabla28Peer::REFPRC, Tabla28Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'codpre', 'monimp', 'monpag', 'monaju', 'staimp', 'refere', 'refprc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monpag' => 3, 'Monaju' => 4, 'Staimp' => 5, 'Refere' => 6, 'Refprc' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla28Peer::REFCAU => 0, Tabla28Peer::CODPRE => 1, Tabla28Peer::MONIMP => 2, Tabla28Peer::MONPAG => 3, Tabla28Peer::MONAJU => 4, Tabla28Peer::STAIMP => 5, Tabla28Peer::REFERE => 6, Tabla28Peer::REFPRC => 7, Tabla28Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'codpre' => 1, 'monimp' => 2, 'monpag' => 3, 'monaju' => 4, 'staimp' => 5, 'refere' => 6, 'refprc' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla28MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla28MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla28Peer::getTableMap();
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
		return str_replace(Tabla28Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla28Peer::REFCAU);

		$criteria->addSelectColumn(Tabla28Peer::CODPRE);

		$criteria->addSelectColumn(Tabla28Peer::MONIMP);

		$criteria->addSelectColumn(Tabla28Peer::MONPAG);

		$criteria->addSelectColumn(Tabla28Peer::MONAJU);

		$criteria->addSelectColumn(Tabla28Peer::STAIMP);

		$criteria->addSelectColumn(Tabla28Peer::REFERE);

		$criteria->addSelectColumn(Tabla28Peer::REFPRC);

		$criteria->addSelectColumn(Tabla28Peer::ID);

	}

	const COUNT = 'COUNT(tabla28.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla28.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla28Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla28Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla28Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla28Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla28Peer::populateObjects(Tabla28Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla28Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla28Peer::getOMClass();
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
		return Tabla28Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla28Peer::ID);
			$selectCriteria->add(Tabla28Peer::ID, $criteria->remove(Tabla28Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla28Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla28Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla28) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla28Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla28 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla28Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla28Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla28Peer::DATABASE_NAME, Tabla28Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla28Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla28Peer::DATABASE_NAME);

		$criteria->add(Tabla28Peer::ID, $pk);


		$v = Tabla28Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla28Peer::ID, $pks, Criteria::IN);
			$objs = Tabla28Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla28Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla28MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla28MapBuilder');
}
