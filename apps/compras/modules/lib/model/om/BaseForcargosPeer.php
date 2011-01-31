<?php


abstract class BaseForcargosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'forcargos';

	
	const CLASS_DEFAULT = 'lib.model.Forcargos';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAR = 'forcargos.CODCAR';

	
	const NOMCAR = 'forcargos.NOMCAR';

	
	const SUECAR = 'forcargos.SUECAR';

	
	const STACAR = 'forcargos.STACAR';

	
	const CODOCP = 'forcargos.CODOCP';

	
	const PUNMIN = 'forcargos.PUNMIN';

	
	const GRAOCP = 'forcargos.GRAOCP';

	
	const COMCAR = 'forcargos.COMCAR';

	
	const PASOCP = 'forcargos.PASOCP';

	
	const CODTIP = 'forcargos.CODTIP';

	
	const PRICAR = 'forcargos.PRICAR';

	
	const CANHOM = 'forcargos.CANHOM';

	
	const CANMUJ = 'forcargos.CANMUJ';

	
	const ID = 'forcargos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar', 'Nomcar', 'Suecar', 'Stacar', 'Codocp', 'Punmin', 'Graocp', 'Comcar', 'Pasocp', 'Codtip', 'Pricar', 'Canhom', 'Canmuj', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ForcargosPeer::CODCAR, ForcargosPeer::NOMCAR, ForcargosPeer::SUECAR, ForcargosPeer::STACAR, ForcargosPeer::CODOCP, ForcargosPeer::PUNMIN, ForcargosPeer::GRAOCP, ForcargosPeer::COMCAR, ForcargosPeer::PASOCP, ForcargosPeer::CODTIP, ForcargosPeer::PRICAR, ForcargosPeer::CANHOM, ForcargosPeer::CANMUJ, ForcargosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar', 'nomcar', 'suecar', 'stacar', 'codocp', 'punmin', 'graocp', 'comcar', 'pasocp', 'codtip', 'pricar', 'canhom', 'canmuj', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar' => 0, 'Nomcar' => 1, 'Suecar' => 2, 'Stacar' => 3, 'Codocp' => 4, 'Punmin' => 5, 'Graocp' => 6, 'Comcar' => 7, 'Pasocp' => 8, 'Codtip' => 9, 'Pricar' => 10, 'Canhom' => 11, 'Canmuj' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (ForcargosPeer::CODCAR => 0, ForcargosPeer::NOMCAR => 1, ForcargosPeer::SUECAR => 2, ForcargosPeer::STACAR => 3, ForcargosPeer::CODOCP => 4, ForcargosPeer::PUNMIN => 5, ForcargosPeer::GRAOCP => 6, ForcargosPeer::COMCAR => 7, ForcargosPeer::PASOCP => 8, ForcargosPeer::CODTIP => 9, ForcargosPeer::PRICAR => 10, ForcargosPeer::CANHOM => 11, ForcargosPeer::CANMUJ => 12, ForcargosPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar' => 0, 'nomcar' => 1, 'suecar' => 2, 'stacar' => 3, 'codocp' => 4, 'punmin' => 5, 'graocp' => 6, 'comcar' => 7, 'pasocp' => 8, 'codtip' => 9, 'pricar' => 10, 'canhom' => 11, 'canmuj' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ForcargosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ForcargosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ForcargosPeer::getTableMap();
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
		return str_replace(ForcargosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ForcargosPeer::CODCAR);

		$criteria->addSelectColumn(ForcargosPeer::NOMCAR);

		$criteria->addSelectColumn(ForcargosPeer::SUECAR);

		$criteria->addSelectColumn(ForcargosPeer::STACAR);

		$criteria->addSelectColumn(ForcargosPeer::CODOCP);

		$criteria->addSelectColumn(ForcargosPeer::PUNMIN);

		$criteria->addSelectColumn(ForcargosPeer::GRAOCP);

		$criteria->addSelectColumn(ForcargosPeer::COMCAR);

		$criteria->addSelectColumn(ForcargosPeer::PASOCP);

		$criteria->addSelectColumn(ForcargosPeer::CODTIP);

		$criteria->addSelectColumn(ForcargosPeer::PRICAR);

		$criteria->addSelectColumn(ForcargosPeer::CANHOM);

		$criteria->addSelectColumn(ForcargosPeer::CANMUJ);

		$criteria->addSelectColumn(ForcargosPeer::ID);

	}

	const COUNT = 'COUNT(forcargos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT forcargos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ForcargosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ForcargosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ForcargosPeer::doSelectRS($criteria, $con);
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
		$objects = ForcargosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ForcargosPeer::populateObjects(ForcargosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ForcargosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ForcargosPeer::getOMClass();
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
		return ForcargosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ForcargosPeer::ID); 

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
			$comparison = $criteria->getComparison(ForcargosPeer::ID);
			$selectCriteria->add(ForcargosPeer::ID, $criteria->remove(ForcargosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ForcargosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ForcargosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Forcargos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ForcargosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Forcargos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ForcargosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ForcargosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ForcargosPeer::DATABASE_NAME, ForcargosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ForcargosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ForcargosPeer::DATABASE_NAME);

		$criteria->add(ForcargosPeer::ID, $pk);


		$v = ForcargosPeer::doSelect($criteria, $con);

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
			$criteria->add(ForcargosPeer::ID, $pks, Criteria::IN);
			$objs = ForcargosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseForcargosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ForcargosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ForcargosMapBuilder');
}
