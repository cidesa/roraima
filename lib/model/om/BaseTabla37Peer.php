<?php


abstract class BaseTabla37Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla37';

	
	const CLASS_DEFAULT = 'lib.model.Tabla37';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'tabla37.REFCAU';

	
	const TIPCAU = 'tabla37.TIPCAU';

	
	const FECCAU = 'tabla37.FECCAU';

	
	const ANOCAU = 'tabla37.ANOCAU';

	
	const REFCOM = 'tabla37.REFCOM';

	
	const TIPCOM = 'tabla37.TIPCOM';

	
	const DESCAU = 'tabla37.DESCAU';

	
	const DESANU = 'tabla37.DESANU';

	
	const MONCAU = 'tabla37.MONCAU';

	
	const SALPAG = 'tabla37.SALPAG';

	
	const SALAJU = 'tabla37.SALAJU';

	
	const STACAU = 'tabla37.STACAU';

	
	const FECANU = 'tabla37.FECANU';

	
	const CEDRIF = 'tabla37.CEDRIF';

	
	const ID = 'tabla37.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Tipcau', 'Feccau', 'Anocau', 'Refcom', 'Tipcom', 'Descau', 'Desanu', 'Moncau', 'Salpag', 'Salaju', 'Stacau', 'Fecanu', 'Cedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla37Peer::REFCAU, Tabla37Peer::TIPCAU, Tabla37Peer::FECCAU, Tabla37Peer::ANOCAU, Tabla37Peer::REFCOM, Tabla37Peer::TIPCOM, Tabla37Peer::DESCAU, Tabla37Peer::DESANU, Tabla37Peer::MONCAU, Tabla37Peer::SALPAG, Tabla37Peer::SALAJU, Tabla37Peer::STACAU, Tabla37Peer::FECANU, Tabla37Peer::CEDRIF, Tabla37Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'tipcau', 'feccau', 'anocau', 'refcom', 'tipcom', 'descau', 'desanu', 'moncau', 'salpag', 'salaju', 'stacau', 'fecanu', 'cedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Tipcau' => 1, 'Feccau' => 2, 'Anocau' => 3, 'Refcom' => 4, 'Tipcom' => 5, 'Descau' => 6, 'Desanu' => 7, 'Moncau' => 8, 'Salpag' => 9, 'Salaju' => 10, 'Stacau' => 11, 'Fecanu' => 12, 'Cedrif' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (Tabla37Peer::REFCAU => 0, Tabla37Peer::TIPCAU => 1, Tabla37Peer::FECCAU => 2, Tabla37Peer::ANOCAU => 3, Tabla37Peer::REFCOM => 4, Tabla37Peer::TIPCOM => 5, Tabla37Peer::DESCAU => 6, Tabla37Peer::DESANU => 7, Tabla37Peer::MONCAU => 8, Tabla37Peer::SALPAG => 9, Tabla37Peer::SALAJU => 10, Tabla37Peer::STACAU => 11, Tabla37Peer::FECANU => 12, Tabla37Peer::CEDRIF => 13, Tabla37Peer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'tipcau' => 1, 'feccau' => 2, 'anocau' => 3, 'refcom' => 4, 'tipcom' => 5, 'descau' => 6, 'desanu' => 7, 'moncau' => 8, 'salpag' => 9, 'salaju' => 10, 'stacau' => 11, 'fecanu' => 12, 'cedrif' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla37MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla37MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla37Peer::getTableMap();
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
		return str_replace(Tabla37Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla37Peer::REFCAU);

		$criteria->addSelectColumn(Tabla37Peer::TIPCAU);

		$criteria->addSelectColumn(Tabla37Peer::FECCAU);

		$criteria->addSelectColumn(Tabla37Peer::ANOCAU);

		$criteria->addSelectColumn(Tabla37Peer::REFCOM);

		$criteria->addSelectColumn(Tabla37Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla37Peer::DESCAU);

		$criteria->addSelectColumn(Tabla37Peer::DESANU);

		$criteria->addSelectColumn(Tabla37Peer::MONCAU);

		$criteria->addSelectColumn(Tabla37Peer::SALPAG);

		$criteria->addSelectColumn(Tabla37Peer::SALAJU);

		$criteria->addSelectColumn(Tabla37Peer::STACAU);

		$criteria->addSelectColumn(Tabla37Peer::FECANU);

		$criteria->addSelectColumn(Tabla37Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla37Peer::ID);

	}

	const COUNT = 'COUNT(tabla37.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla37.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla37Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla37Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla37Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla37Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla37Peer::populateObjects(Tabla37Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla37Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla37Peer::getOMClass();
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
		return Tabla37Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla37Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla37Peer::ID);
			$selectCriteria->add(Tabla37Peer::ID, $criteria->remove(Tabla37Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla37Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla37Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla37) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla37Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla37 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla37Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla37Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla37Peer::DATABASE_NAME, Tabla37Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla37Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla37Peer::DATABASE_NAME);

		$criteria->add(Tabla37Peer::ID, $pk);


		$v = Tabla37Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla37Peer::ID, $pks, Criteria::IN);
			$objs = Tabla37Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla37Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla37MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla37MapBuilder');
}
