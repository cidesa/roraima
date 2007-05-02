<?php


abstract class BaseFcregvehPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcregveh';

	
	const CLASS_DEFAULT = 'lib.model.Fcregveh';

	
	const NUM_COLUMNS = 35;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PLAVEH = 'fcregveh.PLAVEH';

	
	const RIFCON = 'fcregveh.RIFCON';

	
	const ANOVEH = 'fcregveh.ANOVEH';

	
	const FECREG = 'fcregveh.FECREG';

	
	const SERMOT = 'fcregveh.SERMOT';

	
	const SERCAR = 'fcregveh.SERCAR';

	
	const MARVEH = 'fcregveh.MARVEH';

	
	const COLVEH = 'fcregveh.COLVEH';

	
	const CODUSO = 'fcregveh.CODUSO';

	
	const IMPVEH = 'fcregveh.IMPVEH';

	
	const SALACT = 'fcregveh.SALACT';

	
	const SALANT = 'fcregveh.SALANT';

	
	const VALORI = 'fcregveh.VALORI';

	
	const ABOVEH = 'fcregveh.ABOVEH';

	
	const MORVEH = 'fcregveh.MORVEH';

	
	const DESVEH = 'fcregveh.DESVEH';

	
	const ESTVEH = 'fcregveh.ESTVEH';

	
	const FUNREC = 'fcregveh.FUNREC';

	
	const OBSVEH = 'fcregveh.OBSVEH';

	
	const RIFREP = 'fcregveh.RIFREP';

	
	const MODVEH = 'fcregveh.MODVEH';

	
	const FECREC = 'fcregveh.FECREC';

	
	const DUEANT = 'fcregveh.DUEANT';

	
	const DIRANT = 'fcregveh.DIRANT';

	
	const PLAANT = 'fcregveh.PLAANT';

	
	const ESTDEC = 'fcregveh.ESTDEC';

	
	const NOMCON = 'fcregveh.NOMCON';

	
	const DIRCON = 'fcregveh.DIRCON';

	
	const CLACON = 'fcregveh.CLACON';

	
	const CAPVEH = 'fcregveh.CAPVEH';

	
	const PESVEH = 'fcregveh.PESVEH';

	
	const TIPVEH = 'fcregveh.TIPVEH';

	
	const FECACT = 'fcregveh.FECACT';

	
	const MARCOD = 'fcregveh.MARCOD';

	
	const ID = 'fcregveh.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Plaveh', 'Rifcon', 'Anoveh', 'Fecreg', 'Sermot', 'Sercar', 'Marveh', 'Colveh', 'Coduso', 'Impveh', 'Salact', 'Salant', 'Valori', 'Aboveh', 'Morveh', 'Desveh', 'Estveh', 'Funrec', 'Obsveh', 'Rifrep', 'Modveh', 'Fecrec', 'Dueant', 'Dirant', 'Plaant', 'Estdec', 'Nomcon', 'Dircon', 'Clacon', 'Capveh', 'Pesveh', 'Tipveh', 'Fecact', 'Marcod', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcregvehPeer::PLAVEH, FcregvehPeer::RIFCON, FcregvehPeer::ANOVEH, FcregvehPeer::FECREG, FcregvehPeer::SERMOT, FcregvehPeer::SERCAR, FcregvehPeer::MARVEH, FcregvehPeer::COLVEH, FcregvehPeer::CODUSO, FcregvehPeer::IMPVEH, FcregvehPeer::SALACT, FcregvehPeer::SALANT, FcregvehPeer::VALORI, FcregvehPeer::ABOVEH, FcregvehPeer::MORVEH, FcregvehPeer::DESVEH, FcregvehPeer::ESTVEH, FcregvehPeer::FUNREC, FcregvehPeer::OBSVEH, FcregvehPeer::RIFREP, FcregvehPeer::MODVEH, FcregvehPeer::FECREC, FcregvehPeer::DUEANT, FcregvehPeer::DIRANT, FcregvehPeer::PLAANT, FcregvehPeer::ESTDEC, FcregvehPeer::NOMCON, FcregvehPeer::DIRCON, FcregvehPeer::CLACON, FcregvehPeer::CAPVEH, FcregvehPeer::PESVEH, FcregvehPeer::TIPVEH, FcregvehPeer::FECACT, FcregvehPeer::MARCOD, FcregvehPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('plaveh', 'rifcon', 'anoveh', 'fecreg', 'sermot', 'sercar', 'marveh', 'colveh', 'coduso', 'impveh', 'salact', 'salant', 'valori', 'aboveh', 'morveh', 'desveh', 'estveh', 'funrec', 'obsveh', 'rifrep', 'modveh', 'fecrec', 'dueant', 'dirant', 'plaant', 'estdec', 'nomcon', 'dircon', 'clacon', 'capveh', 'pesveh', 'tipveh', 'fecact', 'marcod', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Plaveh' => 0, 'Rifcon' => 1, 'Anoveh' => 2, 'Fecreg' => 3, 'Sermot' => 4, 'Sercar' => 5, 'Marveh' => 6, 'Colveh' => 7, 'Coduso' => 8, 'Impveh' => 9, 'Salact' => 10, 'Salant' => 11, 'Valori' => 12, 'Aboveh' => 13, 'Morveh' => 14, 'Desveh' => 15, 'Estveh' => 16, 'Funrec' => 17, 'Obsveh' => 18, 'Rifrep' => 19, 'Modveh' => 20, 'Fecrec' => 21, 'Dueant' => 22, 'Dirant' => 23, 'Plaant' => 24, 'Estdec' => 25, 'Nomcon' => 26, 'Dircon' => 27, 'Clacon' => 28, 'Capveh' => 29, 'Pesveh' => 30, 'Tipveh' => 31, 'Fecact' => 32, 'Marcod' => 33, 'Id' => 34, ),
		BasePeer::TYPE_COLNAME => array (FcregvehPeer::PLAVEH => 0, FcregvehPeer::RIFCON => 1, FcregvehPeer::ANOVEH => 2, FcregvehPeer::FECREG => 3, FcregvehPeer::SERMOT => 4, FcregvehPeer::SERCAR => 5, FcregvehPeer::MARVEH => 6, FcregvehPeer::COLVEH => 7, FcregvehPeer::CODUSO => 8, FcregvehPeer::IMPVEH => 9, FcregvehPeer::SALACT => 10, FcregvehPeer::SALANT => 11, FcregvehPeer::VALORI => 12, FcregvehPeer::ABOVEH => 13, FcregvehPeer::MORVEH => 14, FcregvehPeer::DESVEH => 15, FcregvehPeer::ESTVEH => 16, FcregvehPeer::FUNREC => 17, FcregvehPeer::OBSVEH => 18, FcregvehPeer::RIFREP => 19, FcregvehPeer::MODVEH => 20, FcregvehPeer::FECREC => 21, FcregvehPeer::DUEANT => 22, FcregvehPeer::DIRANT => 23, FcregvehPeer::PLAANT => 24, FcregvehPeer::ESTDEC => 25, FcregvehPeer::NOMCON => 26, FcregvehPeer::DIRCON => 27, FcregvehPeer::CLACON => 28, FcregvehPeer::CAPVEH => 29, FcregvehPeer::PESVEH => 30, FcregvehPeer::TIPVEH => 31, FcregvehPeer::FECACT => 32, FcregvehPeer::MARCOD => 33, FcregvehPeer::ID => 34, ),
		BasePeer::TYPE_FIELDNAME => array ('plaveh' => 0, 'rifcon' => 1, 'anoveh' => 2, 'fecreg' => 3, 'sermot' => 4, 'sercar' => 5, 'marveh' => 6, 'colveh' => 7, 'coduso' => 8, 'impveh' => 9, 'salact' => 10, 'salant' => 11, 'valori' => 12, 'aboveh' => 13, 'morveh' => 14, 'desveh' => 15, 'estveh' => 16, 'funrec' => 17, 'obsveh' => 18, 'rifrep' => 19, 'modveh' => 20, 'fecrec' => 21, 'dueant' => 22, 'dirant' => 23, 'plaant' => 24, 'estdec' => 25, 'nomcon' => 26, 'dircon' => 27, 'clacon' => 28, 'capveh' => 29, 'pesveh' => 30, 'tipveh' => 31, 'fecact' => 32, 'marcod' => 33, 'id' => 34, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcregvehMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcregvehMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcregvehPeer::getTableMap();
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
		return str_replace(FcregvehPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcregvehPeer::PLAVEH);

		$criteria->addSelectColumn(FcregvehPeer::RIFCON);

		$criteria->addSelectColumn(FcregvehPeer::ANOVEH);

		$criteria->addSelectColumn(FcregvehPeer::FECREG);

		$criteria->addSelectColumn(FcregvehPeer::SERMOT);

		$criteria->addSelectColumn(FcregvehPeer::SERCAR);

		$criteria->addSelectColumn(FcregvehPeer::MARVEH);

		$criteria->addSelectColumn(FcregvehPeer::COLVEH);

		$criteria->addSelectColumn(FcregvehPeer::CODUSO);

		$criteria->addSelectColumn(FcregvehPeer::IMPVEH);

		$criteria->addSelectColumn(FcregvehPeer::SALACT);

		$criteria->addSelectColumn(FcregvehPeer::SALANT);

		$criteria->addSelectColumn(FcregvehPeer::VALORI);

		$criteria->addSelectColumn(FcregvehPeer::ABOVEH);

		$criteria->addSelectColumn(FcregvehPeer::MORVEH);

		$criteria->addSelectColumn(FcregvehPeer::DESVEH);

		$criteria->addSelectColumn(FcregvehPeer::ESTVEH);

		$criteria->addSelectColumn(FcregvehPeer::FUNREC);

		$criteria->addSelectColumn(FcregvehPeer::OBSVEH);

		$criteria->addSelectColumn(FcregvehPeer::RIFREP);

		$criteria->addSelectColumn(FcregvehPeer::MODVEH);

		$criteria->addSelectColumn(FcregvehPeer::FECREC);

		$criteria->addSelectColumn(FcregvehPeer::DUEANT);

		$criteria->addSelectColumn(FcregvehPeer::DIRANT);

		$criteria->addSelectColumn(FcregvehPeer::PLAANT);

		$criteria->addSelectColumn(FcregvehPeer::ESTDEC);

		$criteria->addSelectColumn(FcregvehPeer::NOMCON);

		$criteria->addSelectColumn(FcregvehPeer::DIRCON);

		$criteria->addSelectColumn(FcregvehPeer::CLACON);

		$criteria->addSelectColumn(FcregvehPeer::CAPVEH);

		$criteria->addSelectColumn(FcregvehPeer::PESVEH);

		$criteria->addSelectColumn(FcregvehPeer::TIPVEH);

		$criteria->addSelectColumn(FcregvehPeer::FECACT);

		$criteria->addSelectColumn(FcregvehPeer::MARCOD);

		$criteria->addSelectColumn(FcregvehPeer::ID);

	}

	const COUNT = 'COUNT(fcregveh.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcregveh.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcregvehPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcregvehPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcregvehPeer::doSelectRS($criteria, $con);
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
		$objects = FcregvehPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcregvehPeer::populateObjects(FcregvehPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcregvehPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcregvehPeer::getOMClass();
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
		return FcregvehPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcregvehPeer::ID);
			$selectCriteria->add(FcregvehPeer::ID, $criteria->remove(FcregvehPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcregvehPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcregvehPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcregveh) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcregvehPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcregveh $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcregvehPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcregvehPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcregvehPeer::DATABASE_NAME, FcregvehPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcregvehPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcregvehPeer::DATABASE_NAME);

		$criteria->add(FcregvehPeer::ID, $pk);


		$v = FcregvehPeer::doSelect($criteria, $con);

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
			$criteria->add(FcregvehPeer::ID, $pks, Criteria::IN);
			$objs = FcregvehPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcregvehPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcregvehMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcregvehMapBuilder');
}
