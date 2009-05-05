<?php


abstract class BaseAtmedicoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atmedico';

	
	const CLASS_DEFAULT = 'lib.model.Atmedico';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDRIFMED = 'atmedico.CEDRIFMED';

	
	const NOMBREMED = 'atmedico.NOMBREMED';

	
	const APELLIMED = 'atmedico.APELLIMED';

	
	const DIRHABMED = 'atmedico.DIRHABMED';

	
	const DIRTRAMED = 'atmedico.DIRTRAMED';

	
	const TELUNOMED = 'atmedico.TELUNOMED';

	
	const TELDOSMED = 'atmedico.TELDOSMED';

	
	const NROCOLMED = 'atmedico.NROCOLMED';

	
	const ID = 'atmedico.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrifmed', 'Nombremed', 'Apellimed', 'Dirhabmed', 'Dirtramed', 'Telunomed', 'Teldosmed', 'Nrocolmed', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtmedicoPeer::CEDRIFMED, AtmedicoPeer::NOMBREMED, AtmedicoPeer::APELLIMED, AtmedicoPeer::DIRHABMED, AtmedicoPeer::DIRTRAMED, AtmedicoPeer::TELUNOMED, AtmedicoPeer::TELDOSMED, AtmedicoPeer::NROCOLMED, AtmedicoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrifmed', 'nombremed', 'apellimed', 'dirhabmed', 'dirtramed', 'telunomed', 'teldosmed', 'nrocolmed', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrifmed' => 0, 'Nombremed' => 1, 'Apellimed' => 2, 'Dirhabmed' => 3, 'Dirtramed' => 4, 'Telunomed' => 5, 'Teldosmed' => 6, 'Nrocolmed' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (AtmedicoPeer::CEDRIFMED => 0, AtmedicoPeer::NOMBREMED => 1, AtmedicoPeer::APELLIMED => 2, AtmedicoPeer::DIRHABMED => 3, AtmedicoPeer::DIRTRAMED => 4, AtmedicoPeer::TELUNOMED => 5, AtmedicoPeer::TELDOSMED => 6, AtmedicoPeer::NROCOLMED => 7, AtmedicoPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrifmed' => 0, 'nombremed' => 1, 'apellimed' => 2, 'dirhabmed' => 3, 'dirtramed' => 4, 'telunomed' => 5, 'teldosmed' => 6, 'nrocolmed' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AtmedicoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AtmedicoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtmedicoPeer::getTableMap();
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
		return str_replace(AtmedicoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtmedicoPeer::CEDRIFMED);

		$criteria->addSelectColumn(AtmedicoPeer::NOMBREMED);

		$criteria->addSelectColumn(AtmedicoPeer::APELLIMED);

		$criteria->addSelectColumn(AtmedicoPeer::DIRHABMED);

		$criteria->addSelectColumn(AtmedicoPeer::DIRTRAMED);

		$criteria->addSelectColumn(AtmedicoPeer::TELUNOMED);

		$criteria->addSelectColumn(AtmedicoPeer::TELDOSMED);

		$criteria->addSelectColumn(AtmedicoPeer::NROCOLMED);

		$criteria->addSelectColumn(AtmedicoPeer::ID);

	}

	const COUNT = 'COUNT(atmedico.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atmedico.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtmedicoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtmedicoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtmedicoPeer::doSelectRS($criteria, $con);
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
		$objects = AtmedicoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtmedicoPeer::populateObjects(AtmedicoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtmedicoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtmedicoPeer::getOMClass();
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
		return AtmedicoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtmedicoPeer::ID); 

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
			$comparison = $criteria->getComparison(AtmedicoPeer::ID);
			$selectCriteria->add(AtmedicoPeer::ID, $criteria->remove(AtmedicoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtmedicoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtmedicoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atmedico) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtmedicoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atmedico $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtmedicoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtmedicoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtmedicoPeer::DATABASE_NAME, AtmedicoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtmedicoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtmedicoPeer::DATABASE_NAME);

		$criteria->add(AtmedicoPeer::ID, $pk);


		$v = AtmedicoPeer::doSelect($criteria, $con);

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
			$criteria->add(AtmedicoPeer::ID, $pks, Criteria::IN);
			$objs = AtmedicoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtmedicoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AtmedicoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AtmedicoMapBuilder');
}
