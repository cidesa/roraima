<?php


abstract class BaseTabla19Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla19';

	
	const CLASS_DEFAULT = 'lib.model.Tabla19';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'tabla19.REFCAU';

	
	const CODPRE = 'tabla19.CODPRE';

	
	const MONIMP = 'tabla19.MONIMP';

	
	const MONPAG = 'tabla19.MONPAG';

	
	const MONAJU = 'tabla19.MONAJU';

	
	const STAIMP = 'tabla19.STAIMP';

	
	const REFERE = 'tabla19.REFERE';

	
	const REFPRC = 'tabla19.REFPRC';

	
	const ID = 'tabla19.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Codpre', 'Monimp', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla19Peer::REFCAU, Tabla19Peer::CODPRE, Tabla19Peer::MONIMP, Tabla19Peer::MONPAG, Tabla19Peer::MONAJU, Tabla19Peer::STAIMP, Tabla19Peer::REFERE, Tabla19Peer::REFPRC, Tabla19Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'codpre', 'monimp', 'monpag', 'monaju', 'staimp', 'refere', 'refprc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monpag' => 3, 'Monaju' => 4, 'Staimp' => 5, 'Refere' => 6, 'Refprc' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla19Peer::REFCAU => 0, Tabla19Peer::CODPRE => 1, Tabla19Peer::MONIMP => 2, Tabla19Peer::MONPAG => 3, Tabla19Peer::MONAJU => 4, Tabla19Peer::STAIMP => 5, Tabla19Peer::REFERE => 6, Tabla19Peer::REFPRC => 7, Tabla19Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'codpre' => 1, 'monimp' => 2, 'monpag' => 3, 'monaju' => 4, 'staimp' => 5, 'refere' => 6, 'refprc' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla19MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla19MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla19Peer::getTableMap();
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
		return str_replace(Tabla19Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla19Peer::REFCAU);

		$criteria->addSelectColumn(Tabla19Peer::CODPRE);

		$criteria->addSelectColumn(Tabla19Peer::MONIMP);

		$criteria->addSelectColumn(Tabla19Peer::MONPAG);

		$criteria->addSelectColumn(Tabla19Peer::MONAJU);

		$criteria->addSelectColumn(Tabla19Peer::STAIMP);

		$criteria->addSelectColumn(Tabla19Peer::REFERE);

		$criteria->addSelectColumn(Tabla19Peer::REFPRC);

		$criteria->addSelectColumn(Tabla19Peer::ID);

	}

	const COUNT = 'COUNT(tabla19.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla19.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla19Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla19Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla19Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla19Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla19Peer::populateObjects(Tabla19Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla19Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla19Peer::getOMClass();
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
		return Tabla19Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla19Peer::ID);
			$selectCriteria->add(Tabla19Peer::ID, $criteria->remove(Tabla19Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla19Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla19Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla19) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla19Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla19 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla19Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla19Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla19Peer::DATABASE_NAME, Tabla19Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla19Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla19Peer::DATABASE_NAME);

		$criteria->add(Tabla19Peer::ID, $pk);


		$v = Tabla19Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla19Peer::ID, $pks, Criteria::IN);
			$objs = Tabla19Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla19Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla19MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla19MapBuilder');
}
