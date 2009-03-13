<?php


abstract class BaseFcmodvehPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcmodveh';

	
	const CLASS_DEFAULT = 'lib.model.Fcmodveh';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFMOD = 'fcmodveh.REFMOD';

	
	const PLAVEH = 'fcmodveh.PLAVEH';

	
	const FECMOD = 'fcmodveh.FECMOD';

	
	const CODUSO = 'fcmodveh.CODUSO';

	
	const ANOVEH = 'fcmodveh.ANOVEH';

	
	const SERMOT = 'fcmodveh.SERMOT';

	
	const SERCAR = 'fcmodveh.SERCAR';

	
	const MARVEH = 'fcmodveh.MARVEH';

	
	const COLVEH = 'fcmodveh.COLVEH';

	
	const VALORI = 'fcmodveh.VALORI';

	
	const MODVEH = 'fcmodveh.MODVEH';

	
	const DUEANT = 'fcmodveh.DUEANT';

	
	const DIRANT = 'fcmodveh.DIRANT';

	
	const PLAANT = 'fcmodveh.PLAANT';

	
	const CODUSOANT = 'fcmodveh.CODUSOANT';

	
	const ANOVEHANT = 'fcmodveh.ANOVEHANT';

	
	const SERMOTANT = 'fcmodveh.SERMOTANT';

	
	const SERCARANT = 'fcmodveh.SERCARANT';

	
	const MARVEHANT = 'fcmodveh.MARVEHANT';

	
	const COLVEHANT = 'fcmodveh.COLVEHANT';

	
	const VALORIANT = 'fcmodveh.VALORIANT';

	
	const MODVEHANT = 'fcmodveh.MODVEHANT';

	
	const DUEANTANT = 'fcmodveh.DUEANTANT';

	
	const DIRANTANT = 'fcmodveh.DIRANTANT';

	
	const PLAANTANT = 'fcmodveh.PLAANTANT';

	
	const FUNREC = 'fcmodveh.FUNREC';

	
	const ID = 'fcmodveh.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod', 'Plaveh', 'Fecmod', 'Coduso', 'Anoveh', 'Sermot', 'Sercar', 'Marveh', 'Colveh', 'Valori', 'Modveh', 'Dueant', 'Dirant', 'Plaant', 'Codusoant', 'Anovehant', 'Sermotant', 'Sercarant', 'Marvehant', 'Colvehant', 'Valoriant', 'Modvehant', 'Dueantant', 'Dirantant', 'Plaantant', 'Funrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcmodvehPeer::REFMOD, FcmodvehPeer::PLAVEH, FcmodvehPeer::FECMOD, FcmodvehPeer::CODUSO, FcmodvehPeer::ANOVEH, FcmodvehPeer::SERMOT, FcmodvehPeer::SERCAR, FcmodvehPeer::MARVEH, FcmodvehPeer::COLVEH, FcmodvehPeer::VALORI, FcmodvehPeer::MODVEH, FcmodvehPeer::DUEANT, FcmodvehPeer::DIRANT, FcmodvehPeer::PLAANT, FcmodvehPeer::CODUSOANT, FcmodvehPeer::ANOVEHANT, FcmodvehPeer::SERMOTANT, FcmodvehPeer::SERCARANT, FcmodvehPeer::MARVEHANT, FcmodvehPeer::COLVEHANT, FcmodvehPeer::VALORIANT, FcmodvehPeer::MODVEHANT, FcmodvehPeer::DUEANTANT, FcmodvehPeer::DIRANTANT, FcmodvehPeer::PLAANTANT, FcmodvehPeer::FUNREC, FcmodvehPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod', 'plaveh', 'fecmod', 'coduso', 'anoveh', 'sermot', 'sercar', 'marveh', 'colveh', 'valori', 'modveh', 'dueant', 'dirant', 'plaant', 'codusoant', 'anovehant', 'sermotant', 'sercarant', 'marvehant', 'colvehant', 'valoriant', 'modvehant', 'dueantant', 'dirantant', 'plaantant', 'funrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod' => 0, 'Plaveh' => 1, 'Fecmod' => 2, 'Coduso' => 3, 'Anoveh' => 4, 'Sermot' => 5, 'Sercar' => 6, 'Marveh' => 7, 'Colveh' => 8, 'Valori' => 9, 'Modveh' => 10, 'Dueant' => 11, 'Dirant' => 12, 'Plaant' => 13, 'Codusoant' => 14, 'Anovehant' => 15, 'Sermotant' => 16, 'Sercarant' => 17, 'Marvehant' => 18, 'Colvehant' => 19, 'Valoriant' => 20, 'Modvehant' => 21, 'Dueantant' => 22, 'Dirantant' => 23, 'Plaantant' => 24, 'Funrec' => 25, 'Id' => 26, ),
		BasePeer::TYPE_COLNAME => array (FcmodvehPeer::REFMOD => 0, FcmodvehPeer::PLAVEH => 1, FcmodvehPeer::FECMOD => 2, FcmodvehPeer::CODUSO => 3, FcmodvehPeer::ANOVEH => 4, FcmodvehPeer::SERMOT => 5, FcmodvehPeer::SERCAR => 6, FcmodvehPeer::MARVEH => 7, FcmodvehPeer::COLVEH => 8, FcmodvehPeer::VALORI => 9, FcmodvehPeer::MODVEH => 10, FcmodvehPeer::DUEANT => 11, FcmodvehPeer::DIRANT => 12, FcmodvehPeer::PLAANT => 13, FcmodvehPeer::CODUSOANT => 14, FcmodvehPeer::ANOVEHANT => 15, FcmodvehPeer::SERMOTANT => 16, FcmodvehPeer::SERCARANT => 17, FcmodvehPeer::MARVEHANT => 18, FcmodvehPeer::COLVEHANT => 19, FcmodvehPeer::VALORIANT => 20, FcmodvehPeer::MODVEHANT => 21, FcmodvehPeer::DUEANTANT => 22, FcmodvehPeer::DIRANTANT => 23, FcmodvehPeer::PLAANTANT => 24, FcmodvehPeer::FUNREC => 25, FcmodvehPeer::ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod' => 0, 'plaveh' => 1, 'fecmod' => 2, 'coduso' => 3, 'anoveh' => 4, 'sermot' => 5, 'sercar' => 6, 'marveh' => 7, 'colveh' => 8, 'valori' => 9, 'modveh' => 10, 'dueant' => 11, 'dirant' => 12, 'plaant' => 13, 'codusoant' => 14, 'anovehant' => 15, 'sermotant' => 16, 'sercarant' => 17, 'marvehant' => 18, 'colvehant' => 19, 'valoriant' => 20, 'modvehant' => 21, 'dueantant' => 22, 'dirantant' => 23, 'plaantant' => 24, 'funrec' => 25, 'id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcmodvehMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcmodvehMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcmodvehPeer::getTableMap();
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
		return str_replace(FcmodvehPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcmodvehPeer::REFMOD);

		$criteria->addSelectColumn(FcmodvehPeer::PLAVEH);

		$criteria->addSelectColumn(FcmodvehPeer::FECMOD);

		$criteria->addSelectColumn(FcmodvehPeer::CODUSO);

		$criteria->addSelectColumn(FcmodvehPeer::ANOVEH);

		$criteria->addSelectColumn(FcmodvehPeer::SERMOT);

		$criteria->addSelectColumn(FcmodvehPeer::SERCAR);

		$criteria->addSelectColumn(FcmodvehPeer::MARVEH);

		$criteria->addSelectColumn(FcmodvehPeer::COLVEH);

		$criteria->addSelectColumn(FcmodvehPeer::VALORI);

		$criteria->addSelectColumn(FcmodvehPeer::MODVEH);

		$criteria->addSelectColumn(FcmodvehPeer::DUEANT);

		$criteria->addSelectColumn(FcmodvehPeer::DIRANT);

		$criteria->addSelectColumn(FcmodvehPeer::PLAANT);

		$criteria->addSelectColumn(FcmodvehPeer::CODUSOANT);

		$criteria->addSelectColumn(FcmodvehPeer::ANOVEHANT);

		$criteria->addSelectColumn(FcmodvehPeer::SERMOTANT);

		$criteria->addSelectColumn(FcmodvehPeer::SERCARANT);

		$criteria->addSelectColumn(FcmodvehPeer::MARVEHANT);

		$criteria->addSelectColumn(FcmodvehPeer::COLVEHANT);

		$criteria->addSelectColumn(FcmodvehPeer::VALORIANT);

		$criteria->addSelectColumn(FcmodvehPeer::MODVEHANT);

		$criteria->addSelectColumn(FcmodvehPeer::DUEANTANT);

		$criteria->addSelectColumn(FcmodvehPeer::DIRANTANT);

		$criteria->addSelectColumn(FcmodvehPeer::PLAANTANT);

		$criteria->addSelectColumn(FcmodvehPeer::FUNREC);

		$criteria->addSelectColumn(FcmodvehPeer::ID);

	}

	const COUNT = 'COUNT(fcmodveh.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcmodveh.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodvehPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodvehPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcmodvehPeer::doSelectRS($criteria, $con);
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
		$objects = FcmodvehPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcmodvehPeer::populateObjects(FcmodvehPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcmodvehPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcmodvehPeer::getOMClass();
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
		return FcmodvehPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcmodvehPeer::ID); 

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
			$comparison = $criteria->getComparison(FcmodvehPeer::ID);
			$selectCriteria->add(FcmodvehPeer::ID, $criteria->remove(FcmodvehPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcmodvehPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcmodvehPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcmodveh) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcmodvehPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcmodveh $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcmodvehPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcmodvehPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcmodvehPeer::DATABASE_NAME, FcmodvehPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcmodvehPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcmodvehPeer::DATABASE_NAME);

		$criteria->add(FcmodvehPeer::ID, $pk);


		$v = FcmodvehPeer::doSelect($criteria, $con);

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
			$criteria->add(FcmodvehPeer::ID, $pks, Criteria::IN);
			$objs = FcmodvehPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcmodvehPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcmodvehMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcmodvehMapBuilder');
}
