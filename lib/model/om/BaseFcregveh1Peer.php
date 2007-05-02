<?php


abstract class BaseFcregveh1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcregveh1';

	
	const CLASS_DEFAULT = 'lib.model.Fcregveh1';

	
	const NUM_COLUMNS = 34;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PLAVEH = 'fcregveh1.PLAVEH';

	
	const RIFCON = 'fcregveh1.RIFCON';

	
	const ANOVEH = 'fcregveh1.ANOVEH';

	
	const FECREG = 'fcregveh1.FECREG';

	
	const SERMOT = 'fcregveh1.SERMOT';

	
	const SERCAR = 'fcregveh1.SERCAR';

	
	const MARVEH = 'fcregveh1.MARVEH';

	
	const COLVEH = 'fcregveh1.COLVEH';

	
	const CODUSO = 'fcregveh1.CODUSO';

	
	const IMPVEH = 'fcregveh1.IMPVEH';

	
	const SALACT = 'fcregveh1.SALACT';

	
	const SALANT = 'fcregveh1.SALANT';

	
	const VALORI = 'fcregveh1.VALORI';

	
	const ABOVEH = 'fcregveh1.ABOVEH';

	
	const MORVEH = 'fcregveh1.MORVEH';

	
	const DESVEH = 'fcregveh1.DESVEH';

	
	const ESTVEH = 'fcregveh1.ESTVEH';

	
	const FUNREC = 'fcregveh1.FUNREC';

	
	const OBSVEH = 'fcregveh1.OBSVEH';

	
	const RIFREP = 'fcregveh1.RIFREP';

	
	const MODVEH = 'fcregveh1.MODVEH';

	
	const FECREC = 'fcregveh1.FECREC';

	
	const DUEANT = 'fcregveh1.DUEANT';

	
	const DIRANT = 'fcregveh1.DIRANT';

	
	const PLAANT = 'fcregveh1.PLAANT';

	
	const ESTDEC = 'fcregveh1.ESTDEC';

	
	const NOMCON = 'fcregveh1.NOMCON';

	
	const DIRCON = 'fcregveh1.DIRCON';

	
	const CLACON = 'fcregveh1.CLACON';

	
	const CAPVEH = 'fcregveh1.CAPVEH';

	
	const PESVEH = 'fcregveh1.PESVEH';

	
	const TIPVEH = 'fcregveh1.TIPVEH';

	
	const FECACT = 'fcregveh1.FECACT';

	
	const ID = 'fcregveh1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Plaveh', 'Rifcon', 'Anoveh', 'Fecreg', 'Sermot', 'Sercar', 'Marveh', 'Colveh', 'Coduso', 'Impveh', 'Salact', 'Salant', 'Valori', 'Aboveh', 'Morveh', 'Desveh', 'Estveh', 'Funrec', 'Obsveh', 'Rifrep', 'Modveh', 'Fecrec', 'Dueant', 'Dirant', 'Plaant', 'Estdec', 'Nomcon', 'Dircon', 'Clacon', 'Capveh', 'Pesveh', 'Tipveh', 'Fecact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcregveh1Peer::PLAVEH, Fcregveh1Peer::RIFCON, Fcregveh1Peer::ANOVEH, Fcregveh1Peer::FECREG, Fcregveh1Peer::SERMOT, Fcregveh1Peer::SERCAR, Fcregveh1Peer::MARVEH, Fcregveh1Peer::COLVEH, Fcregveh1Peer::CODUSO, Fcregveh1Peer::IMPVEH, Fcregveh1Peer::SALACT, Fcregveh1Peer::SALANT, Fcregveh1Peer::VALORI, Fcregveh1Peer::ABOVEH, Fcregveh1Peer::MORVEH, Fcregveh1Peer::DESVEH, Fcregveh1Peer::ESTVEH, Fcregveh1Peer::FUNREC, Fcregveh1Peer::OBSVEH, Fcregveh1Peer::RIFREP, Fcregveh1Peer::MODVEH, Fcregveh1Peer::FECREC, Fcregveh1Peer::DUEANT, Fcregveh1Peer::DIRANT, Fcregveh1Peer::PLAANT, Fcregveh1Peer::ESTDEC, Fcregveh1Peer::NOMCON, Fcregveh1Peer::DIRCON, Fcregveh1Peer::CLACON, Fcregveh1Peer::CAPVEH, Fcregveh1Peer::PESVEH, Fcregveh1Peer::TIPVEH, Fcregveh1Peer::FECACT, Fcregveh1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('plaveh', 'rifcon', 'anoveh', 'fecreg', 'sermot', 'sercar', 'marveh', 'colveh', 'coduso', 'impveh', 'salact', 'salant', 'valori', 'aboveh', 'morveh', 'desveh', 'estveh', 'funrec', 'obsveh', 'rifrep', 'modveh', 'fecrec', 'dueant', 'dirant', 'plaant', 'estdec', 'nomcon', 'dircon', 'clacon', 'capveh', 'pesveh', 'tipveh', 'fecact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Plaveh' => 0, 'Rifcon' => 1, 'Anoveh' => 2, 'Fecreg' => 3, 'Sermot' => 4, 'Sercar' => 5, 'Marveh' => 6, 'Colveh' => 7, 'Coduso' => 8, 'Impveh' => 9, 'Salact' => 10, 'Salant' => 11, 'Valori' => 12, 'Aboveh' => 13, 'Morveh' => 14, 'Desveh' => 15, 'Estveh' => 16, 'Funrec' => 17, 'Obsveh' => 18, 'Rifrep' => 19, 'Modveh' => 20, 'Fecrec' => 21, 'Dueant' => 22, 'Dirant' => 23, 'Plaant' => 24, 'Estdec' => 25, 'Nomcon' => 26, 'Dircon' => 27, 'Clacon' => 28, 'Capveh' => 29, 'Pesveh' => 30, 'Tipveh' => 31, 'Fecact' => 32, 'Id' => 33, ),
		BasePeer::TYPE_COLNAME => array (Fcregveh1Peer::PLAVEH => 0, Fcregveh1Peer::RIFCON => 1, Fcregveh1Peer::ANOVEH => 2, Fcregveh1Peer::FECREG => 3, Fcregveh1Peer::SERMOT => 4, Fcregveh1Peer::SERCAR => 5, Fcregveh1Peer::MARVEH => 6, Fcregveh1Peer::COLVEH => 7, Fcregveh1Peer::CODUSO => 8, Fcregveh1Peer::IMPVEH => 9, Fcregveh1Peer::SALACT => 10, Fcregveh1Peer::SALANT => 11, Fcregveh1Peer::VALORI => 12, Fcregveh1Peer::ABOVEH => 13, Fcregveh1Peer::MORVEH => 14, Fcregveh1Peer::DESVEH => 15, Fcregveh1Peer::ESTVEH => 16, Fcregveh1Peer::FUNREC => 17, Fcregveh1Peer::OBSVEH => 18, Fcregveh1Peer::RIFREP => 19, Fcregveh1Peer::MODVEH => 20, Fcregveh1Peer::FECREC => 21, Fcregveh1Peer::DUEANT => 22, Fcregveh1Peer::DIRANT => 23, Fcregveh1Peer::PLAANT => 24, Fcregveh1Peer::ESTDEC => 25, Fcregveh1Peer::NOMCON => 26, Fcregveh1Peer::DIRCON => 27, Fcregveh1Peer::CLACON => 28, Fcregveh1Peer::CAPVEH => 29, Fcregveh1Peer::PESVEH => 30, Fcregveh1Peer::TIPVEH => 31, Fcregveh1Peer::FECACT => 32, Fcregveh1Peer::ID => 33, ),
		BasePeer::TYPE_FIELDNAME => array ('plaveh' => 0, 'rifcon' => 1, 'anoveh' => 2, 'fecreg' => 3, 'sermot' => 4, 'sercar' => 5, 'marveh' => 6, 'colveh' => 7, 'coduso' => 8, 'impveh' => 9, 'salact' => 10, 'salant' => 11, 'valori' => 12, 'aboveh' => 13, 'morveh' => 14, 'desveh' => 15, 'estveh' => 16, 'funrec' => 17, 'obsveh' => 18, 'rifrep' => 19, 'modveh' => 20, 'fecrec' => 21, 'dueant' => 22, 'dirant' => 23, 'plaant' => 24, 'estdec' => 25, 'nomcon' => 26, 'dircon' => 27, 'clacon' => 28, 'capveh' => 29, 'pesveh' => 30, 'tipveh' => 31, 'fecact' => 32, 'id' => 33, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcregveh1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcregveh1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcregveh1Peer::getTableMap();
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
		return str_replace(Fcregveh1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcregveh1Peer::PLAVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::RIFCON);

		$criteria->addSelectColumn(Fcregveh1Peer::ANOVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::FECREG);

		$criteria->addSelectColumn(Fcregveh1Peer::SERMOT);

		$criteria->addSelectColumn(Fcregveh1Peer::SERCAR);

		$criteria->addSelectColumn(Fcregveh1Peer::MARVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::COLVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::CODUSO);

		$criteria->addSelectColumn(Fcregveh1Peer::IMPVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::SALACT);

		$criteria->addSelectColumn(Fcregveh1Peer::SALANT);

		$criteria->addSelectColumn(Fcregveh1Peer::VALORI);

		$criteria->addSelectColumn(Fcregveh1Peer::ABOVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::MORVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::DESVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::ESTVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::FUNREC);

		$criteria->addSelectColumn(Fcregveh1Peer::OBSVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::RIFREP);

		$criteria->addSelectColumn(Fcregveh1Peer::MODVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::FECREC);

		$criteria->addSelectColumn(Fcregveh1Peer::DUEANT);

		$criteria->addSelectColumn(Fcregveh1Peer::DIRANT);

		$criteria->addSelectColumn(Fcregveh1Peer::PLAANT);

		$criteria->addSelectColumn(Fcregveh1Peer::ESTDEC);

		$criteria->addSelectColumn(Fcregveh1Peer::NOMCON);

		$criteria->addSelectColumn(Fcregveh1Peer::DIRCON);

		$criteria->addSelectColumn(Fcregveh1Peer::CLACON);

		$criteria->addSelectColumn(Fcregveh1Peer::CAPVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::PESVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::TIPVEH);

		$criteria->addSelectColumn(Fcregveh1Peer::FECACT);

		$criteria->addSelectColumn(Fcregveh1Peer::ID);

	}

	const COUNT = 'COUNT(fcregveh1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcregveh1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcregveh1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcregveh1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcregveh1Peer::doSelectRS($criteria, $con);
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
		$objects = Fcregveh1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcregveh1Peer::populateObjects(Fcregveh1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcregveh1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcregveh1Peer::getOMClass();
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
		return Fcregveh1Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Fcregveh1Peer::ID);
			$selectCriteria->add(Fcregveh1Peer::ID, $criteria->remove(Fcregveh1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcregveh1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcregveh1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcregveh1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcregveh1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcregveh1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcregveh1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcregveh1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcregveh1Peer::DATABASE_NAME, Fcregveh1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcregveh1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcregveh1Peer::DATABASE_NAME);

		$criteria->add(Fcregveh1Peer::ID, $pk);


		$v = Fcregveh1Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcregveh1Peer::ID, $pks, Criteria::IN);
			$objs = Fcregveh1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcregveh1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcregveh1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcregveh1MapBuilder');
}
