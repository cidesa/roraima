<?php


abstract class BaseCierrePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cierre';

	
	const CLASS_DEFAULT = 'lib.model.Cierre';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'cierre.CODNOM';

	
	const CODCON = 'cierre.CODCON';

	
	const FECNOM = 'cierre.FECNOM';

	
	const CODPRE = 'cierre.CODPRE';

	
	const CODCTA = 'cierre.CODCTA';

	
	const MONTO = 'cierre.MONTO';

	
	const ASIDED = 'cierre.ASIDED';

	
	const CODTIPGAS = 'cierre.CODTIPGAS';

	
	const CANTIDAD = 'cierre.CANTIDAD';

	
	const CODBAN = 'cierre.CODBAN';

	
	const ID = 'cierre.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codcon', 'Fecnom', 'Codpre', 'Codcta', 'Monto', 'Asided', 'Codtipgas', 'Cantidad', 'Codban', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CierrePeer::CODNOM, CierrePeer::CODCON, CierrePeer::FECNOM, CierrePeer::CODPRE, CierrePeer::CODCTA, CierrePeer::MONTO, CierrePeer::ASIDED, CierrePeer::CODTIPGAS, CierrePeer::CANTIDAD, CierrePeer::CODBAN, CierrePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codcon', 'fecnom', 'codpre', 'codcta', 'monto', 'asided', 'codtipgas', 'cantidad', 'codban', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codcon' => 1, 'Fecnom' => 2, 'Codpre' => 3, 'Codcta' => 4, 'Monto' => 5, 'Asided' => 6, 'Codtipgas' => 7, 'Cantidad' => 8, 'Codban' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CierrePeer::CODNOM => 0, CierrePeer::CODCON => 1, CierrePeer::FECNOM => 2, CierrePeer::CODPRE => 3, CierrePeer::CODCTA => 4, CierrePeer::MONTO => 5, CierrePeer::ASIDED => 6, CierrePeer::CODTIPGAS => 7, CierrePeer::CANTIDAD => 8, CierrePeer::CODBAN => 9, CierrePeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codcon' => 1, 'fecnom' => 2, 'codpre' => 3, 'codcta' => 4, 'monto' => 5, 'asided' => 6, 'codtipgas' => 7, 'cantidad' => 8, 'codban' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CierreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CierreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CierrePeer::getTableMap();
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
		return str_replace(CierrePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CierrePeer::CODNOM);

		$criteria->addSelectColumn(CierrePeer::CODCON);

		$criteria->addSelectColumn(CierrePeer::FECNOM);

		$criteria->addSelectColumn(CierrePeer::CODPRE);

		$criteria->addSelectColumn(CierrePeer::CODCTA);

		$criteria->addSelectColumn(CierrePeer::MONTO);

		$criteria->addSelectColumn(CierrePeer::ASIDED);

		$criteria->addSelectColumn(CierrePeer::CODTIPGAS);

		$criteria->addSelectColumn(CierrePeer::CANTIDAD);

		$criteria->addSelectColumn(CierrePeer::CODBAN);

		$criteria->addSelectColumn(CierrePeer::ID);

	}

	const COUNT = 'COUNT(cierre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cierre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CierrePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CierrePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CierrePeer::doSelectRS($criteria, $con);
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
		$objects = CierrePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CierrePeer::populateObjects(CierrePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CierrePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CierrePeer::getOMClass();
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
		return CierrePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CierrePeer::ID);
			$selectCriteria->add(CierrePeer::ID, $criteria->remove(CierrePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CierrePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CierrePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cierre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CierrePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cierre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CierrePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CierrePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CierrePeer::DATABASE_NAME, CierrePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CierrePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CierrePeer::DATABASE_NAME);

		$criteria->add(CierrePeer::ID, $pk);


		$v = CierrePeer::doSelect($criteria, $con);

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
			$criteria->add(CierrePeer::ID, $pks, Criteria::IN);
			$objs = CierrePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCierrePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CierreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CierreMapBuilder');
}
