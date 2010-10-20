<?php


abstract class BaseCamigtxtvenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'camigtxtven';

	
	const CLASS_DEFAULT = 'lib.model.Camigtxtven';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODALM = 'camigtxtven.CODALM';

	
	const FECVEN = 'camigtxtven.FECVEN';

	
	const CODART = 'camigtxtven.CODART';

	
	const DESART = 'camigtxtven.DESART';

	
	const CANTIDAD = 'camigtxtven.CANTIDAD';

	
	const SUBTOT = 'camigtxtven.SUBTOT';

	
	const IVA = 'camigtxtven.IVA';

	
	const PRECIO = 'camigtxtven.PRECIO';

	
	const FECMIG = 'camigtxtven.FECMIG';

	
	const USUMIG = 'camigtxtven.USUMIG';

	
	const ID = 'camigtxtven.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm', 'Fecven', 'Codart', 'Desart', 'Cantidad', 'Subtot', 'Iva', 'Precio', 'Fecmig', 'Usumig', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CamigtxtvenPeer::CODALM, CamigtxtvenPeer::FECVEN, CamigtxtvenPeer::CODART, CamigtxtvenPeer::DESART, CamigtxtvenPeer::CANTIDAD, CamigtxtvenPeer::SUBTOT, CamigtxtvenPeer::IVA, CamigtxtvenPeer::PRECIO, CamigtxtvenPeer::FECMIG, CamigtxtvenPeer::USUMIG, CamigtxtvenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm', 'fecven', 'codart', 'desart', 'cantidad', 'subtot', 'iva', 'precio', 'fecmig', 'usumig', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm' => 0, 'Fecven' => 1, 'Codart' => 2, 'Desart' => 3, 'Cantidad' => 4, 'Subtot' => 5, 'Iva' => 6, 'Precio' => 7, 'Fecmig' => 8, 'Usumig' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CamigtxtvenPeer::CODALM => 0, CamigtxtvenPeer::FECVEN => 1, CamigtxtvenPeer::CODART => 2, CamigtxtvenPeer::DESART => 3, CamigtxtvenPeer::CANTIDAD => 4, CamigtxtvenPeer::SUBTOT => 5, CamigtxtvenPeer::IVA => 6, CamigtxtvenPeer::PRECIO => 7, CamigtxtvenPeer::FECMIG => 8, CamigtxtvenPeer::USUMIG => 9, CamigtxtvenPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm' => 0, 'fecven' => 1, 'codart' => 2, 'desart' => 3, 'cantidad' => 4, 'subtot' => 5, 'iva' => 6, 'precio' => 7, 'fecmig' => 8, 'usumig' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CamigtxtvenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CamigtxtvenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CamigtxtvenPeer::getTableMap();
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
		return str_replace(CamigtxtvenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CamigtxtvenPeer::CODALM);

		$criteria->addSelectColumn(CamigtxtvenPeer::FECVEN);

		$criteria->addSelectColumn(CamigtxtvenPeer::CODART);

		$criteria->addSelectColumn(CamigtxtvenPeer::DESART);

		$criteria->addSelectColumn(CamigtxtvenPeer::CANTIDAD);

		$criteria->addSelectColumn(CamigtxtvenPeer::SUBTOT);

		$criteria->addSelectColumn(CamigtxtvenPeer::IVA);

		$criteria->addSelectColumn(CamigtxtvenPeer::PRECIO);

		$criteria->addSelectColumn(CamigtxtvenPeer::FECMIG);

		$criteria->addSelectColumn(CamigtxtvenPeer::USUMIG);

		$criteria->addSelectColumn(CamigtxtvenPeer::ID);

	}

	const COUNT = 'COUNT(camigtxtven.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT camigtxtven.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CamigtxtvenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CamigtxtvenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CamigtxtvenPeer::doSelectRS($criteria, $con);
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
		$objects = CamigtxtvenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CamigtxtvenPeer::populateObjects(CamigtxtvenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CamigtxtvenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CamigtxtvenPeer::getOMClass();
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
		return CamigtxtvenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CamigtxtvenPeer::ID); 

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
			$comparison = $criteria->getComparison(CamigtxtvenPeer::ID);
			$selectCriteria->add(CamigtxtvenPeer::ID, $criteria->remove(CamigtxtvenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CamigtxtvenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CamigtxtvenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Camigtxtven) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CamigtxtvenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Camigtxtven $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CamigtxtvenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CamigtxtvenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CamigtxtvenPeer::DATABASE_NAME, CamigtxtvenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CamigtxtvenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CamigtxtvenPeer::DATABASE_NAME);

		$criteria->add(CamigtxtvenPeer::ID, $pk);


		$v = CamigtxtvenPeer::doSelect($criteria, $con);

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
			$criteria->add(CamigtxtvenPeer::ID, $pks, Criteria::IN);
			$objs = CamigtxtvenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCamigtxtvenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CamigtxtvenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CamigtxtvenMapBuilder');
}
