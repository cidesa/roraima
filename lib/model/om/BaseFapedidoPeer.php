<?php


abstract class BaseFapedidoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fapedido';

	
	const CLASS_DEFAULT = 'lib.model.Fapedido';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROPED = 'fapedido.NROPED';

	
	const FECPED = 'fapedido.FECPED';

	
	const REFPED = 'fapedido.REFPED';

	
	const TIPREF = 'fapedido.TIPREF';

	
	const CODCLI = 'fapedido.CODCLI';

	
	const DESPED = 'fapedido.DESPED';

	
	const MONPED = 'fapedido.MONPED';

	
	const OBSPED = 'fapedido.OBSPED';

	
	const REAPOR = 'fapedido.REAPOR';

	
	const STATUS = 'fapedido.STATUS';

	
	const FECANU = 'fapedido.FECANU';

	
	const ID = 'fapedido.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroped', 'Fecped', 'Refped', 'Tipref', 'Codcli', 'Desped', 'Monped', 'Obsped', 'Reapor', 'Status', 'Fecanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FapedidoPeer::NROPED, FapedidoPeer::FECPED, FapedidoPeer::REFPED, FapedidoPeer::TIPREF, FapedidoPeer::CODCLI, FapedidoPeer::DESPED, FapedidoPeer::MONPED, FapedidoPeer::OBSPED, FapedidoPeer::REAPOR, FapedidoPeer::STATUS, FapedidoPeer::FECANU, FapedidoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroped', 'fecped', 'refped', 'tipref', 'codcli', 'desped', 'monped', 'obsped', 'reapor', 'status', 'fecanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroped' => 0, 'Fecped' => 1, 'Refped' => 2, 'Tipref' => 3, 'Codcli' => 4, 'Desped' => 5, 'Monped' => 6, 'Obsped' => 7, 'Reapor' => 8, 'Status' => 9, 'Fecanu' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FapedidoPeer::NROPED => 0, FapedidoPeer::FECPED => 1, FapedidoPeer::REFPED => 2, FapedidoPeer::TIPREF => 3, FapedidoPeer::CODCLI => 4, FapedidoPeer::DESPED => 5, FapedidoPeer::MONPED => 6, FapedidoPeer::OBSPED => 7, FapedidoPeer::REAPOR => 8, FapedidoPeer::STATUS => 9, FapedidoPeer::FECANU => 10, FapedidoPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('nroped' => 0, 'fecped' => 1, 'refped' => 2, 'tipref' => 3, 'codcli' => 4, 'desped' => 5, 'monped' => 6, 'obsped' => 7, 'reapor' => 8, 'status' => 9, 'fecanu' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FapedidoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FapedidoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FapedidoPeer::getTableMap();
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
		return str_replace(FapedidoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FapedidoPeer::NROPED);

		$criteria->addSelectColumn(FapedidoPeer::FECPED);

		$criteria->addSelectColumn(FapedidoPeer::REFPED);

		$criteria->addSelectColumn(FapedidoPeer::TIPREF);

		$criteria->addSelectColumn(FapedidoPeer::CODCLI);

		$criteria->addSelectColumn(FapedidoPeer::DESPED);

		$criteria->addSelectColumn(FapedidoPeer::MONPED);

		$criteria->addSelectColumn(FapedidoPeer::OBSPED);

		$criteria->addSelectColumn(FapedidoPeer::REAPOR);

		$criteria->addSelectColumn(FapedidoPeer::STATUS);

		$criteria->addSelectColumn(FapedidoPeer::FECANU);

		$criteria->addSelectColumn(FapedidoPeer::ID);

	}

	const COUNT = 'COUNT(fapedido.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fapedido.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FapedidoPeer::doSelectRS($criteria, $con);
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
		$objects = FapedidoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FapedidoPeer::populateObjects(FapedidoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FapedidoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FapedidoPeer::getOMClass();
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
		return FapedidoPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FapedidoPeer::ID);
			$selectCriteria->add(FapedidoPeer::ID, $criteria->remove(FapedidoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FapedidoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FapedidoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fapedido) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FapedidoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fapedido $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FapedidoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FapedidoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FapedidoPeer::DATABASE_NAME, FapedidoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FapedidoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FapedidoPeer::DATABASE_NAME);

		$criteria->add(FapedidoPeer::ID, $pk);


		$v = FapedidoPeer::doSelect($criteria, $con);

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
			$criteria->add(FapedidoPeer::ID, $pks, Criteria::IN);
			$objs = FapedidoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFapedidoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FapedidoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FapedidoMapBuilder');
}
