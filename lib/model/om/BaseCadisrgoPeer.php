<?php


abstract class BaseCadisrgoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadisrgo';

	
	const CLASS_DEFAULT = 'lib.model.Cadisrgo';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQART = 'cadisrgo.REQART';

	
	const CODCAT = 'cadisrgo.CODCAT';

	
	const CODART = 'cadisrgo.CODART';

	
	const CODRGO = 'cadisrgo.CODRGO';

	
	const MONRGO = 'cadisrgo.MONRGO';

	
	const TIPDOC = 'cadisrgo.TIPDOC';

	
	const CODPRE = 'cadisrgo.CODPRE';

	
	const TIPO = 'cadisrgo.TIPO';

	
	const ID = 'cadisrgo.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart', 'Codcat', 'Codart', 'Codrgo', 'Monrgo', 'Tipdoc', 'Codpre', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadisrgoPeer::REQART, CadisrgoPeer::CODCAT, CadisrgoPeer::CODART, CadisrgoPeer::CODRGO, CadisrgoPeer::MONRGO, CadisrgoPeer::TIPDOC, CadisrgoPeer::CODPRE, CadisrgoPeer::TIPO, CadisrgoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart', 'codcat', 'codart', 'codrgo', 'monrgo', 'tipdoc', 'codpre', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reqart' => 0, 'Codcat' => 1, 'Codart' => 2, 'Codrgo' => 3, 'Monrgo' => 4, 'Tipdoc' => 5, 'Codpre' => 6, 'Tipo' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CadisrgoPeer::REQART => 0, CadisrgoPeer::CODCAT => 1, CadisrgoPeer::CODART => 2, CadisrgoPeer::CODRGO => 3, CadisrgoPeer::MONRGO => 4, CadisrgoPeer::TIPDOC => 5, CadisrgoPeer::CODPRE => 6, CadisrgoPeer::TIPO => 7, CadisrgoPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('reqart' => 0, 'codcat' => 1, 'codart' => 2, 'codrgo' => 3, 'monrgo' => 4, 'tipdoc' => 5, 'codpre' => 6, 'tipo' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadisrgoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadisrgoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadisrgoPeer::getTableMap();
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
		return str_replace(CadisrgoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadisrgoPeer::REQART);

		$criteria->addSelectColumn(CadisrgoPeer::CODCAT);

		$criteria->addSelectColumn(CadisrgoPeer::CODART);

		$criteria->addSelectColumn(CadisrgoPeer::CODRGO);

		$criteria->addSelectColumn(CadisrgoPeer::MONRGO);

		$criteria->addSelectColumn(CadisrgoPeer::TIPDOC);

		$criteria->addSelectColumn(CadisrgoPeer::CODPRE);

		$criteria->addSelectColumn(CadisrgoPeer::TIPO);

		$criteria->addSelectColumn(CadisrgoPeer::ID);

	}

	const COUNT = 'COUNT(cadisrgo.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadisrgo.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadisrgoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadisrgoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadisrgoPeer::doSelectRS($criteria, $con);
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
		$objects = CadisrgoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadisrgoPeer::populateObjects(CadisrgoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadisrgoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadisrgoPeer::getOMClass();
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
		return CadisrgoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadisrgoPeer::ID); 

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
			$comparison = $criteria->getComparison(CadisrgoPeer::ID);
			$selectCriteria->add(CadisrgoPeer::ID, $criteria->remove(CadisrgoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadisrgoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadisrgoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadisrgo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadisrgoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadisrgo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadisrgoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadisrgoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadisrgoPeer::DATABASE_NAME, CadisrgoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadisrgoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadisrgoPeer::DATABASE_NAME);

		$criteria->add(CadisrgoPeer::ID, $pk);


		$v = CadisrgoPeer::doSelect($criteria, $con);

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
			$criteria->add(CadisrgoPeer::ID, $pks, Criteria::IN);
			$objs = CadisrgoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadisrgoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadisrgoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadisrgoMapBuilder');
}
