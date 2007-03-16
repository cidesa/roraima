<?php


abstract class BaseNpcarocpPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcarocp';

	
	const CLASS_DEFAULT = 'lib.model.Npcarocp';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAR = 'npcarocp.CODCAR';

	
	const DESCAR = 'npcarocp.DESCAR';

	
	const GRACAR = 'npcarocp.GRACAR';

	
	const SUECAR = 'npcarocp.SUECAR';

	
	const TIPCAR = 'npcarocp.TIPCAR';

	
	const FUNCAR = 'npcarocp.FUNCAR';

	
	const ATRCAR = 'npcarocp.ATRCAR';

	
	const ACTCAR = 'npcarocp.ACTCAR';

	
	const RESCAR = 'npcarocp.RESCAR';

	
	const ANOCAR = 'npcarocp.ANOCAR';

	
	const ID = 'npcarocp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar', 'Descar', 'Gracar', 'Suecar', 'Tipcar', 'Funcar', 'Atrcar', 'Actcar', 'Rescar', 'Anocar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcarocpPeer::CODCAR, NpcarocpPeer::DESCAR, NpcarocpPeer::GRACAR, NpcarocpPeer::SUECAR, NpcarocpPeer::TIPCAR, NpcarocpPeer::FUNCAR, NpcarocpPeer::ATRCAR, NpcarocpPeer::ACTCAR, NpcarocpPeer::RESCAR, NpcarocpPeer::ANOCAR, NpcarocpPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar', 'descar', 'gracar', 'suecar', 'tipcar', 'funcar', 'atrcar', 'actcar', 'rescar', 'anocar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar' => 0, 'Descar' => 1, 'Gracar' => 2, 'Suecar' => 3, 'Tipcar' => 4, 'Funcar' => 5, 'Atrcar' => 6, 'Actcar' => 7, 'Rescar' => 8, 'Anocar' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (NpcarocpPeer::CODCAR => 0, NpcarocpPeer::DESCAR => 1, NpcarocpPeer::GRACAR => 2, NpcarocpPeer::SUECAR => 3, NpcarocpPeer::TIPCAR => 4, NpcarocpPeer::FUNCAR => 5, NpcarocpPeer::ATRCAR => 6, NpcarocpPeer::ACTCAR => 7, NpcarocpPeer::RESCAR => 8, NpcarocpPeer::ANOCAR => 9, NpcarocpPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar' => 0, 'descar' => 1, 'gracar' => 2, 'suecar' => 3, 'tipcar' => 4, 'funcar' => 5, 'atrcar' => 6, 'actcar' => 7, 'rescar' => 8, 'anocar' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpcarocpMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpcarocpMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcarocpPeer::getTableMap();
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
		return str_replace(NpcarocpPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcarocpPeer::CODCAR);

		$criteria->addSelectColumn(NpcarocpPeer::DESCAR);

		$criteria->addSelectColumn(NpcarocpPeer::GRACAR);

		$criteria->addSelectColumn(NpcarocpPeer::SUECAR);

		$criteria->addSelectColumn(NpcarocpPeer::TIPCAR);

		$criteria->addSelectColumn(NpcarocpPeer::FUNCAR);

		$criteria->addSelectColumn(NpcarocpPeer::ATRCAR);

		$criteria->addSelectColumn(NpcarocpPeer::ACTCAR);

		$criteria->addSelectColumn(NpcarocpPeer::RESCAR);

		$criteria->addSelectColumn(NpcarocpPeer::ANOCAR);

		$criteria->addSelectColumn(NpcarocpPeer::ID);

	}

	const COUNT = 'COUNT(npcarocp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcarocp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcarocpPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcarocpPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcarocpPeer::doSelectRS($criteria, $con);
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
		$objects = NpcarocpPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcarocpPeer::populateObjects(NpcarocpPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcarocpPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcarocpPeer::getOMClass();
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
		return NpcarocpPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpcarocpPeer::ID);
			$selectCriteria->add(NpcarocpPeer::ID, $criteria->remove(NpcarocpPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcarocpPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcarocpPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcarocp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcarocpPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcarocp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcarocpPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcarocpPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcarocpPeer::DATABASE_NAME, NpcarocpPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcarocpPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcarocpPeer::DATABASE_NAME);

		$criteria->add(NpcarocpPeer::ID, $pk);


		$v = NpcarocpPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcarocpPeer::ID, $pks, Criteria::IN);
			$objs = NpcarocpPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcarocpPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpcarocpMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpcarocpMapBuilder');
}
