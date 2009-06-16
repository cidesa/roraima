<?php


abstract class BaseNpcargosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcargos';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npcargos';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAR = 'npcargos.CODCAR';

	
	const NOMCAR = 'npcargos.NOMCAR';

	
	const SUECAR = 'npcargos.SUECAR';

	
	const STACAR = 'npcargos.STACAR';

	
	const CODOCP = 'npcargos.CODOCP';

	
	const PUNMIN = 'npcargos.PUNMIN';

	
	const GRAOCP = 'npcargos.GRAOCP';

	
	const COMCAR = 'npcargos.COMCAR';

	
	const PASOCP = 'npcargos.PASOCP';

	
	const CODTIP = 'npcargos.CODTIP';

	
	const PRICAR = 'npcargos.PRICAR';

	
	const CANHOM = 'npcargos.CANHOM';

	
	const CANMUJ = 'npcargos.CANMUJ';

	
	const CARVAN = 'npcargos.CARVAN';

	
	const ID = 'npcargos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar', 'Nomcar', 'Suecar', 'Stacar', 'Codocp', 'Punmin', 'Graocp', 'Comcar', 'Pasocp', 'Codtip', 'Pricar', 'Canhom', 'Canmuj', 'Carvan', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcargosPeer::CODCAR, NpcargosPeer::NOMCAR, NpcargosPeer::SUECAR, NpcargosPeer::STACAR, NpcargosPeer::CODOCP, NpcargosPeer::PUNMIN, NpcargosPeer::GRAOCP, NpcargosPeer::COMCAR, NpcargosPeer::PASOCP, NpcargosPeer::CODTIP, NpcargosPeer::PRICAR, NpcargosPeer::CANHOM, NpcargosPeer::CANMUJ, NpcargosPeer::CARVAN, NpcargosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar', 'nomcar', 'suecar', 'stacar', 'codocp', 'punmin', 'graocp', 'comcar', 'pasocp', 'codtip', 'pricar', 'canhom', 'canmuj', 'carvan', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar' => 0, 'Nomcar' => 1, 'Suecar' => 2, 'Stacar' => 3, 'Codocp' => 4, 'Punmin' => 5, 'Graocp' => 6, 'Comcar' => 7, 'Pasocp' => 8, 'Codtip' => 9, 'Pricar' => 10, 'Canhom' => 11, 'Canmuj' => 12, 'Carvan' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (NpcargosPeer::CODCAR => 0, NpcargosPeer::NOMCAR => 1, NpcargosPeer::SUECAR => 2, NpcargosPeer::STACAR => 3, NpcargosPeer::CODOCP => 4, NpcargosPeer::PUNMIN => 5, NpcargosPeer::GRAOCP => 6, NpcargosPeer::COMCAR => 7, NpcargosPeer::PASOCP => 8, NpcargosPeer::CODTIP => 9, NpcargosPeer::PRICAR => 10, NpcargosPeer::CANHOM => 11, NpcargosPeer::CANMUJ => 12, NpcargosPeer::CARVAN => 13, NpcargosPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar' => 0, 'nomcar' => 1, 'suecar' => 2, 'stacar' => 3, 'codocp' => 4, 'punmin' => 5, 'graocp' => 6, 'comcar' => 7, 'pasocp' => 8, 'codtip' => 9, 'pricar' => 10, 'canhom' => 11, 'canmuj' => 12, 'carvan' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpcargosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpcargosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcargosPeer::getTableMap();
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
		return str_replace(NpcargosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcargosPeer::CODCAR);

		$criteria->addSelectColumn(NpcargosPeer::NOMCAR);

		$criteria->addSelectColumn(NpcargosPeer::SUECAR);

		$criteria->addSelectColumn(NpcargosPeer::STACAR);

		$criteria->addSelectColumn(NpcargosPeer::CODOCP);

		$criteria->addSelectColumn(NpcargosPeer::PUNMIN);

		$criteria->addSelectColumn(NpcargosPeer::GRAOCP);

		$criteria->addSelectColumn(NpcargosPeer::COMCAR);

		$criteria->addSelectColumn(NpcargosPeer::PASOCP);

		$criteria->addSelectColumn(NpcargosPeer::CODTIP);

		$criteria->addSelectColumn(NpcargosPeer::PRICAR);

		$criteria->addSelectColumn(NpcargosPeer::CANHOM);

		$criteria->addSelectColumn(NpcargosPeer::CANMUJ);

		$criteria->addSelectColumn(NpcargosPeer::CARVAN);

		$criteria->addSelectColumn(NpcargosPeer::ID);

	}

	const COUNT = 'COUNT(npcargos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcargos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcargosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcargosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcargosPeer::doSelectRS($criteria, $con);
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
		$objects = NpcargosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcargosPeer::populateObjects(NpcargosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcargosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcargosPeer::getOMClass();
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
		return NpcargosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpcargosPeer::ID); 

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
			$comparison = $criteria->getComparison(NpcargosPeer::ID);
			$selectCriteria->add(NpcargosPeer::ID, $criteria->remove(NpcargosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcargosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcargosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcargos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcargosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcargos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcargosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcargosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcargosPeer::DATABASE_NAME, NpcargosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcargosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcargosPeer::DATABASE_NAME);

		$criteria->add(NpcargosPeer::ID, $pk);


		$v = NpcargosPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcargosPeer::ID, $pks, Criteria::IN);
			$objs = NpcargosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcargosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpcargosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpcargosMapBuilder');
}
