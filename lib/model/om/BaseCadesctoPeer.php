<?php


abstract class BaseCadesctoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadescto';

	
	const CLASS_DEFAULT = 'lib.model.Cadescto';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODDESC = 'cadescto.CODDESC';

	
	const DESDESC = 'cadescto.DESDESC';

	
	const TIPDESC = 'cadescto.TIPDESC';

	
	const MONDESC = 'cadescto.MONDESC';

	
	const DIASAPL = 'cadescto.DIASAPL';

	
	const CODCTA = 'cadescto.CODCTA';

	
	const TIPRET = 'cadescto.TIPRET';

	
	const ID = 'cadescto.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coddesc', 'Desdesc', 'Tipdesc', 'Mondesc', 'Diasapl', 'Codcta', 'Tipret', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadesctoPeer::CODDESC, CadesctoPeer::DESDESC, CadesctoPeer::TIPDESC, CadesctoPeer::MONDESC, CadesctoPeer::DIASAPL, CadesctoPeer::CODCTA, CadesctoPeer::TIPRET, CadesctoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coddesc', 'desdesc', 'tipdesc', 'mondesc', 'diasapl', 'codcta', 'tipret', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coddesc' => 0, 'Desdesc' => 1, 'Tipdesc' => 2, 'Mondesc' => 3, 'Diasapl' => 4, 'Codcta' => 5, 'Tipret' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CadesctoPeer::CODDESC => 0, CadesctoPeer::DESDESC => 1, CadesctoPeer::TIPDESC => 2, CadesctoPeer::MONDESC => 3, CadesctoPeer::DIASAPL => 4, CadesctoPeer::CODCTA => 5, CadesctoPeer::TIPRET => 6, CadesctoPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('coddesc' => 0, 'desdesc' => 1, 'tipdesc' => 2, 'mondesc' => 3, 'diasapl' => 4, 'codcta' => 5, 'tipret' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CadesctoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CadesctoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadesctoPeer::getTableMap();
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
		return str_replace(CadesctoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadesctoPeer::CODDESC);

		$criteria->addSelectColumn(CadesctoPeer::DESDESC);

		$criteria->addSelectColumn(CadesctoPeer::TIPDESC);

		$criteria->addSelectColumn(CadesctoPeer::MONDESC);

		$criteria->addSelectColumn(CadesctoPeer::DIASAPL);

		$criteria->addSelectColumn(CadesctoPeer::CODCTA);

		$criteria->addSelectColumn(CadesctoPeer::TIPRET);

		$criteria->addSelectColumn(CadesctoPeer::ID);

	}

	const COUNT = 'COUNT(cadescto.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadescto.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadesctoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadesctoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadesctoPeer::doSelectRS($criteria, $con);
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
		$objects = CadesctoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadesctoPeer::populateObjects(CadesctoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadesctoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadesctoPeer::getOMClass();
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
		return CadesctoPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CadesctoPeer::ID);
			$selectCriteria->add(CadesctoPeer::ID, $criteria->remove(CadesctoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadesctoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadesctoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadescto) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadesctoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadescto $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadesctoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadesctoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadesctoPeer::DATABASE_NAME, CadesctoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadesctoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadesctoPeer::DATABASE_NAME);

		$criteria->add(CadesctoPeer::ID, $pk);


		$v = CadesctoPeer::doSelect($criteria, $con);

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
			$criteria->add(CadesctoPeer::ID, $pks, Criteria::IN);
			$objs = CadesctoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadesctoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CadesctoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CadesctoMapBuilder');
}
