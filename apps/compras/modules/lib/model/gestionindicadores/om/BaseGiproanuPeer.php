<?php


abstract class BaseGiproanuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'giproanu';

	
	const CLASS_DEFAULT = 'lib.model.gestionindicadores.Giproanu';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMINDG = 'giproanu.NUMINDG';

	
	const ANOINDG = 'giproanu.ANOINDG';

	
	const REVANOINDG = 'giproanu.REVANOINDG';

	
	const NUMTRIM = 'giproanu.NUMTRIM';

	
	const PROGTRIM = 'giproanu.PROGTRIM';

	
	const EJECTRIM = 'giproanu.EJECTRIM';

	
	const ESTTRIM = 'giproanu.ESTTRIM';

	
	const ESTPROG = 'giproanu.ESTPROG';

	
	const FECCIERRE = 'giproanu.FECCIERRE';

	
	const FECCIETRI = 'giproanu.FECCIETRI';

	
	const ID = 'giproanu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numindg', 'Anoindg', 'Revanoindg', 'Numtrim', 'Progtrim', 'Ejectrim', 'Esttrim', 'Estprog', 'Feccierre', 'Feccietri', 'Id', ),
		BasePeer::TYPE_COLNAME => array (GiproanuPeer::NUMINDG, GiproanuPeer::ANOINDG, GiproanuPeer::REVANOINDG, GiproanuPeer::NUMTRIM, GiproanuPeer::PROGTRIM, GiproanuPeer::EJECTRIM, GiproanuPeer::ESTTRIM, GiproanuPeer::ESTPROG, GiproanuPeer::FECCIERRE, GiproanuPeer::FECCIETRI, GiproanuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numindg', 'anoindg', 'revanoindg', 'numtrim', 'progtrim', 'ejectrim', 'esttrim', 'estprog', 'feccierre', 'feccietri', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numindg' => 0, 'Anoindg' => 1, 'Revanoindg' => 2, 'Numtrim' => 3, 'Progtrim' => 4, 'Ejectrim' => 5, 'Esttrim' => 6, 'Estprog' => 7, 'Feccierre' => 8, 'Feccietri' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (GiproanuPeer::NUMINDG => 0, GiproanuPeer::ANOINDG => 1, GiproanuPeer::REVANOINDG => 2, GiproanuPeer::NUMTRIM => 3, GiproanuPeer::PROGTRIM => 4, GiproanuPeer::EJECTRIM => 5, GiproanuPeer::ESTTRIM => 6, GiproanuPeer::ESTPROG => 7, GiproanuPeer::FECCIERRE => 8, GiproanuPeer::FECCIETRI => 9, GiproanuPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numindg' => 0, 'anoindg' => 1, 'revanoindg' => 2, 'numtrim' => 3, 'progtrim' => 4, 'ejectrim' => 5, 'esttrim' => 6, 'estprog' => 7, 'feccierre' => 8, 'feccietri' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/gestionindicadores/map/GiproanuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.gestionindicadores.map.GiproanuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GiproanuPeer::getTableMap();
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
		return str_replace(GiproanuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GiproanuPeer::NUMINDG);

		$criteria->addSelectColumn(GiproanuPeer::ANOINDG);

		$criteria->addSelectColumn(GiproanuPeer::REVANOINDG);

		$criteria->addSelectColumn(GiproanuPeer::NUMTRIM);

		$criteria->addSelectColumn(GiproanuPeer::PROGTRIM);

		$criteria->addSelectColumn(GiproanuPeer::EJECTRIM);

		$criteria->addSelectColumn(GiproanuPeer::ESTTRIM);

		$criteria->addSelectColumn(GiproanuPeer::ESTPROG);

		$criteria->addSelectColumn(GiproanuPeer::FECCIERRE);

		$criteria->addSelectColumn(GiproanuPeer::FECCIETRI);

		$criteria->addSelectColumn(GiproanuPeer::ID);

	}

	const COUNT = 'COUNT(giproanu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT giproanu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GiproanuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GiproanuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GiproanuPeer::doSelectRS($criteria, $con);
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
		$objects = GiproanuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GiproanuPeer::populateObjects(GiproanuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GiproanuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GiproanuPeer::getOMClass();
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
		return GiproanuPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GiproanuPeer::ID); 

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
			$comparison = $criteria->getComparison(GiproanuPeer::ID);
			$selectCriteria->add(GiproanuPeer::ID, $criteria->remove(GiproanuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GiproanuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GiproanuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Giproanu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GiproanuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Giproanu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GiproanuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GiproanuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(GiproanuPeer::DATABASE_NAME, GiproanuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = GiproanuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(GiproanuPeer::DATABASE_NAME);

		$criteria->add(GiproanuPeer::ID, $pk);


		$v = GiproanuPeer::doSelect($criteria, $con);

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
			$criteria->add(GiproanuPeer::ID, $pks, Criteria::IN);
			$objs = GiproanuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGiproanuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/gestionindicadores/map/GiproanuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.gestionindicadores.map.GiproanuMapBuilder');
}
