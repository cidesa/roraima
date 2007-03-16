<?php


abstract class BaseCaartalmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caartalm';

	
	const CLASS_DEFAULT = 'lib.model.Caartalm';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODALM = 'caartalm.CODALM';

	
	const CODART = 'caartalm.CODART';

	
	const CODUBI = 'caartalm.CODUBI';

	
	const EXIMIN = 'caartalm.EXIMIN';

	
	const EXIMAX = 'caartalm.EXIMAX';

	
	const EXIACT = 'caartalm.EXIACT';

	
	const PTOREO = 'caartalm.PTOREO';

	
	const PEDMIN = 'caartalm.PEDMIN';

	
	const PEDMAX = 'caartalm.PEDMAX';

	
	const ID = 'caartalm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm', 'Codart', 'Codubi', 'Eximin', 'Eximax', 'Exiact', 'Ptoreo', 'Pedmin', 'Pedmax', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaartalmPeer::CODALM, CaartalmPeer::CODART, CaartalmPeer::CODUBI, CaartalmPeer::EXIMIN, CaartalmPeer::EXIMAX, CaartalmPeer::EXIACT, CaartalmPeer::PTOREO, CaartalmPeer::PEDMIN, CaartalmPeer::PEDMAX, CaartalmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm', 'codart', 'codubi', 'eximin', 'eximax', 'exiact', 'ptoreo', 'pedmin', 'pedmax', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm' => 0, 'Codart' => 1, 'Codubi' => 2, 'Eximin' => 3, 'Eximax' => 4, 'Exiact' => 5, 'Ptoreo' => 6, 'Pedmin' => 7, 'Pedmax' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (CaartalmPeer::CODALM => 0, CaartalmPeer::CODART => 1, CaartalmPeer::CODUBI => 2, CaartalmPeer::EXIMIN => 3, CaartalmPeer::EXIMAX => 4, CaartalmPeer::EXIACT => 5, CaartalmPeer::PTOREO => 6, CaartalmPeer::PEDMIN => 7, CaartalmPeer::PEDMAX => 8, CaartalmPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm' => 0, 'codart' => 1, 'codubi' => 2, 'eximin' => 3, 'eximax' => 4, 'exiact' => 5, 'ptoreo' => 6, 'pedmin' => 7, 'pedmax' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaartalmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaartalmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaartalmPeer::getTableMap();
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
		return str_replace(CaartalmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaartalmPeer::CODALM);

		$criteria->addSelectColumn(CaartalmPeer::CODART);

		$criteria->addSelectColumn(CaartalmPeer::CODUBI);

		$criteria->addSelectColumn(CaartalmPeer::EXIMIN);

		$criteria->addSelectColumn(CaartalmPeer::EXIMAX);

		$criteria->addSelectColumn(CaartalmPeer::EXIACT);

		$criteria->addSelectColumn(CaartalmPeer::PTOREO);

		$criteria->addSelectColumn(CaartalmPeer::PEDMIN);

		$criteria->addSelectColumn(CaartalmPeer::PEDMAX);

		$criteria->addSelectColumn(CaartalmPeer::ID);

	}

	const COUNT = 'COUNT(caartalm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caartalm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaartalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaartalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaartalmPeer::doSelectRS($criteria, $con);
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
		$objects = CaartalmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaartalmPeer::populateObjects(CaartalmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaartalmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaartalmPeer::getOMClass();
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
		return CaartalmPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CaartalmPeer::ID);
			$selectCriteria->add(CaartalmPeer::ID, $criteria->remove(CaartalmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaartalmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaartalmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caartalm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaartalmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caartalm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaartalmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaartalmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaartalmPeer::DATABASE_NAME, CaartalmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaartalmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaartalmPeer::DATABASE_NAME);

		$criteria->add(CaartalmPeer::ID, $pk);


		$v = CaartalmPeer::doSelect($criteria, $con);

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
			$criteria->add(CaartalmPeer::ID, $pks, Criteria::IN);
			$objs = CaartalmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaartalmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaartalmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaartalmMapBuilder');
}
