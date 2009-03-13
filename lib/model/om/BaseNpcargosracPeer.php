<?php


abstract class BaseNpcargosracPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcargosrac';

	
	const CLASS_DEFAULT = 'lib.model.Npcargosrac';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAR = 'npcargosrac.CODCAR';

	
	const NOMCAR = 'npcargosrac.NOMCAR';

	
	const SUECAR = 'npcargosrac.SUECAR';

	
	const STACAR = 'npcargosrac.STACAR';

	
	const CODCAT = 'npcargosrac.CODCAT';

	
	const CODOCP = 'npcargosrac.CODOCP';

	
	const PUNMIN = 'npcargosrac.PUNMIN';

	
	const GRAOCP = 'npcargosrac.GRAOCP';

	
	const COMCAR = 'npcargosrac.COMCAR';

	
	const PASOCP = 'npcargosrac.PASOCP';

	
	const CODTIP = 'npcargosrac.CODTIP';

	
	const TIPPER = 'npcargosrac.TIPPER';

	
	const FECCAR = 'npcargosrac.FECCAR';

	
	const CODEMP = 'npcargosrac.CODEMP';

	
	const NOMEMP = 'npcargosrac.NOMEMP';

	
	const NRONOM = 'npcargosrac.NRONOM';

	
	const ESTORG = 'npcargosrac.ESTORG';

	
	const ANORAC = 'npcargosrac.ANORAC';

	
	const ID = 'npcargosrac.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar', 'Nomcar', 'Suecar', 'Stacar', 'Codcat', 'Codocp', 'Punmin', 'Graocp', 'Comcar', 'Pasocp', 'Codtip', 'Tipper', 'Feccar', 'Codemp', 'Nomemp', 'Nronom', 'Estorg', 'Anorac', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcargosracPeer::CODCAR, NpcargosracPeer::NOMCAR, NpcargosracPeer::SUECAR, NpcargosracPeer::STACAR, NpcargosracPeer::CODCAT, NpcargosracPeer::CODOCP, NpcargosracPeer::PUNMIN, NpcargosracPeer::GRAOCP, NpcargosracPeer::COMCAR, NpcargosracPeer::PASOCP, NpcargosracPeer::CODTIP, NpcargosracPeer::TIPPER, NpcargosracPeer::FECCAR, NpcargosracPeer::CODEMP, NpcargosracPeer::NOMEMP, NpcargosracPeer::NRONOM, NpcargosracPeer::ESTORG, NpcargosracPeer::ANORAC, NpcargosracPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar', 'nomcar', 'suecar', 'stacar', 'codcat', 'codocp', 'punmin', 'graocp', 'comcar', 'pasocp', 'codtip', 'tipper', 'feccar', 'codemp', 'nomemp', 'nronom', 'estorg', 'anorac', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcar' => 0, 'Nomcar' => 1, 'Suecar' => 2, 'Stacar' => 3, 'Codcat' => 4, 'Codocp' => 5, 'Punmin' => 6, 'Graocp' => 7, 'Comcar' => 8, 'Pasocp' => 9, 'Codtip' => 10, 'Tipper' => 11, 'Feccar' => 12, 'Codemp' => 13, 'Nomemp' => 14, 'Nronom' => 15, 'Estorg' => 16, 'Anorac' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (NpcargosracPeer::CODCAR => 0, NpcargosracPeer::NOMCAR => 1, NpcargosracPeer::SUECAR => 2, NpcargosracPeer::STACAR => 3, NpcargosracPeer::CODCAT => 4, NpcargosracPeer::CODOCP => 5, NpcargosracPeer::PUNMIN => 6, NpcargosracPeer::GRAOCP => 7, NpcargosracPeer::COMCAR => 8, NpcargosracPeer::PASOCP => 9, NpcargosracPeer::CODTIP => 10, NpcargosracPeer::TIPPER => 11, NpcargosracPeer::FECCAR => 12, NpcargosracPeer::CODEMP => 13, NpcargosracPeer::NOMEMP => 14, NpcargosracPeer::NRONOM => 15, NpcargosracPeer::ESTORG => 16, NpcargosracPeer::ANORAC => 17, NpcargosracPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('codcar' => 0, 'nomcar' => 1, 'suecar' => 2, 'stacar' => 3, 'codcat' => 4, 'codocp' => 5, 'punmin' => 6, 'graocp' => 7, 'comcar' => 8, 'pasocp' => 9, 'codtip' => 10, 'tipper' => 11, 'feccar' => 12, 'codemp' => 13, 'nomemp' => 14, 'nronom' => 15, 'estorg' => 16, 'anorac' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpcargosracMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpcargosracMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcargosracPeer::getTableMap();
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
		return str_replace(NpcargosracPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcargosracPeer::CODCAR);

		$criteria->addSelectColumn(NpcargosracPeer::NOMCAR);

		$criteria->addSelectColumn(NpcargosracPeer::SUECAR);

		$criteria->addSelectColumn(NpcargosracPeer::STACAR);

		$criteria->addSelectColumn(NpcargosracPeer::CODCAT);

		$criteria->addSelectColumn(NpcargosracPeer::CODOCP);

		$criteria->addSelectColumn(NpcargosracPeer::PUNMIN);

		$criteria->addSelectColumn(NpcargosracPeer::GRAOCP);

		$criteria->addSelectColumn(NpcargosracPeer::COMCAR);

		$criteria->addSelectColumn(NpcargosracPeer::PASOCP);

		$criteria->addSelectColumn(NpcargosracPeer::CODTIP);

		$criteria->addSelectColumn(NpcargosracPeer::TIPPER);

		$criteria->addSelectColumn(NpcargosracPeer::FECCAR);

		$criteria->addSelectColumn(NpcargosracPeer::CODEMP);

		$criteria->addSelectColumn(NpcargosracPeer::NOMEMP);

		$criteria->addSelectColumn(NpcargosracPeer::NRONOM);

		$criteria->addSelectColumn(NpcargosracPeer::ESTORG);

		$criteria->addSelectColumn(NpcargosracPeer::ANORAC);

		$criteria->addSelectColumn(NpcargosracPeer::ID);

	}

	const COUNT = 'COUNT(npcargosrac.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcargosrac.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcargosracPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcargosracPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcargosracPeer::doSelectRS($criteria, $con);
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
		$objects = NpcargosracPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcargosracPeer::populateObjects(NpcargosracPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcargosracPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcargosracPeer::getOMClass();
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
		return NpcargosracPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpcargosracPeer::ID); 

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
			$comparison = $criteria->getComparison(NpcargosracPeer::ID);
			$selectCriteria->add(NpcargosracPeer::ID, $criteria->remove(NpcargosracPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcargosracPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcargosracPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcargosrac) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcargosracPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcargosrac $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcargosracPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcargosracPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcargosracPeer::DATABASE_NAME, NpcargosracPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcargosracPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcargosracPeer::DATABASE_NAME);

		$criteria->add(NpcargosracPeer::ID, $pk);


		$v = NpcargosracPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcargosracPeer::ID, $pks, Criteria::IN);
			$objs = NpcargosracPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcargosracPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpcargosracMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpcargosracMapBuilder');
}
