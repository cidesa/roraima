<?php


abstract class BaseNpdefrepconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npdefrepcon';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npdefrepcon';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'npdefrepcon.ID';

	
	const CODREP = 'npdefrepcon.CODREP';

	
	const DESREP = 'npdefrepcon.DESREP';

	
	const NUMCOL = 'npdefrepcon.NUMCOL';

	
	const DESCOL = 'npdefrepcon.DESCOL';

	
	const CODCON = 'npdefrepcon.CODCON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Codrep', 'Desrep', 'Numcol', 'Descol', 'Codcon', ),
		BasePeer::TYPE_COLNAME => array (NpdefrepconPeer::ID, NpdefrepconPeer::CODREP, NpdefrepconPeer::DESREP, NpdefrepconPeer::NUMCOL, NpdefrepconPeer::DESCOL, NpdefrepconPeer::CODCON, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'codrep', 'desrep', 'numcol', 'descol', 'codcon', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Codrep' => 1, 'Desrep' => 2, 'Numcol' => 3, 'Descol' => 4, 'Codcon' => 5, ),
		BasePeer::TYPE_COLNAME => array (NpdefrepconPeer::ID => 0, NpdefrepconPeer::CODREP => 1, NpdefrepconPeer::DESREP => 2, NpdefrepconPeer::NUMCOL => 3, NpdefrepconPeer::DESCOL => 4, NpdefrepconPeer::CODCON => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'codrep' => 1, 'desrep' => 2, 'numcol' => 3, 'descol' => 4, 'codcon' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpdefrepconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpdefrepconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpdefrepconPeer::getTableMap();
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
		return str_replace(NpdefrepconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpdefrepconPeer::ID);

		$criteria->addSelectColumn(NpdefrepconPeer::CODREP);

		$criteria->addSelectColumn(NpdefrepconPeer::DESREP);

		$criteria->addSelectColumn(NpdefrepconPeer::NUMCOL);

		$criteria->addSelectColumn(NpdefrepconPeer::DESCOL);

		$criteria->addSelectColumn(NpdefrepconPeer::CODCON);

	}

	const COUNT = 'COUNT(npdefrepcon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npdefrepcon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpdefrepconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpdefrepconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpdefrepconPeer::doSelectRS($criteria, $con);
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
		$objects = NpdefrepconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpdefrepconPeer::populateObjects(NpdefrepconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpdefrepconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpdefrepconPeer::getOMClass();
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
		return NpdefrepconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpdefrepconPeer::ID); 

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
			$comparison = $criteria->getComparison(NpdefrepconPeer::ID);
			$selectCriteria->add(NpdefrepconPeer::ID, $criteria->remove(NpdefrepconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpdefrepconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpdefrepconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npdefrepcon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpdefrepconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npdefrepcon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpdefrepconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpdefrepconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpdefrepconPeer::DATABASE_NAME, NpdefrepconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpdefrepconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpdefrepconPeer::DATABASE_NAME);

		$criteria->add(NpdefrepconPeer::ID, $pk);


		$v = NpdefrepconPeer::doSelect($criteria, $con);

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
			$criteria->add(NpdefrepconPeer::ID, $pks, Criteria::IN);
			$objs = NpdefrepconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpdefrepconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpdefrepconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpdefrepconMapBuilder');
}
