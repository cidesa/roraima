<?php


abstract class BaseLiprebasdetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liprebasdet';

	
	const CLASS_DEFAULT = 'lib.model.Liprebasdet';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPRE = 'liprebasdet.NUMPRE';

	
	const CODART = 'liprebasdet.CODART';

	
	const CODCAT = 'liprebasdet.CODCAT';

	
	const CODPRE = 'liprebasdet.CODPRE';

	
	const UNIMED = 'liprebasdet.UNIMED';

	
	const CANSOL = 'liprebasdet.CANSOL';

	
	const CANAPR = 'liprebasdet.CANAPR';

	
	const COSTO = 'liprebasdet.COSTO';

	
	const SUBTOT = 'liprebasdet.SUBTOT';

	
	const MONREC = 'liprebasdet.MONREC';

	
	const MONTOT = 'liprebasdet.MONTOT';

	
	const STATUS = 'liprebasdet.STATUS';

	
	const CODMON = 'liprebasdet.CODMON';

	
	const VALCAM = 'liprebasdet.VALCAM';

	
	const CODFIN = 'liprebasdet.CODFIN';

	
	const ID = 'liprebasdet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpre', 'Codart', 'Codcat', 'Codpre', 'Unimed', 'Cansol', 'Canapr', 'Costo', 'Subtot', 'Monrec', 'Montot', 'Status', 'Codmon', 'Valcam', 'Codfin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiprebasdetPeer::NUMPRE, LiprebasdetPeer::CODART, LiprebasdetPeer::CODCAT, LiprebasdetPeer::CODPRE, LiprebasdetPeer::UNIMED, LiprebasdetPeer::CANSOL, LiprebasdetPeer::CANAPR, LiprebasdetPeer::COSTO, LiprebasdetPeer::SUBTOT, LiprebasdetPeer::MONREC, LiprebasdetPeer::MONTOT, LiprebasdetPeer::STATUS, LiprebasdetPeer::CODMON, LiprebasdetPeer::VALCAM, LiprebasdetPeer::CODFIN, LiprebasdetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpre', 'codart', 'codcat', 'codpre', 'unimed', 'cansol', 'canapr', 'costo', 'subtot', 'monrec', 'montot', 'status', 'codmon', 'valcam', 'codfin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpre' => 0, 'Codart' => 1, 'Codcat' => 2, 'Codpre' => 3, 'Unimed' => 4, 'Cansol' => 5, 'Canapr' => 6, 'Costo' => 7, 'Subtot' => 8, 'Monrec' => 9, 'Montot' => 10, 'Status' => 11, 'Codmon' => 12, 'Valcam' => 13, 'Codfin' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (LiprebasdetPeer::NUMPRE => 0, LiprebasdetPeer::CODART => 1, LiprebasdetPeer::CODCAT => 2, LiprebasdetPeer::CODPRE => 3, LiprebasdetPeer::UNIMED => 4, LiprebasdetPeer::CANSOL => 5, LiprebasdetPeer::CANAPR => 6, LiprebasdetPeer::COSTO => 7, LiprebasdetPeer::SUBTOT => 8, LiprebasdetPeer::MONREC => 9, LiprebasdetPeer::MONTOT => 10, LiprebasdetPeer::STATUS => 11, LiprebasdetPeer::CODMON => 12, LiprebasdetPeer::VALCAM => 13, LiprebasdetPeer::CODFIN => 14, LiprebasdetPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('numpre' => 0, 'codart' => 1, 'codcat' => 2, 'codpre' => 3, 'unimed' => 4, 'cansol' => 5, 'canapr' => 6, 'costo' => 7, 'subtot' => 8, 'monrec' => 9, 'montot' => 10, 'status' => 11, 'codmon' => 12, 'valcam' => 13, 'codfin' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiprebasdetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiprebasdetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiprebasdetPeer::getTableMap();
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
		return str_replace(LiprebasdetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiprebasdetPeer::NUMPRE);

		$criteria->addSelectColumn(LiprebasdetPeer::CODART);

		$criteria->addSelectColumn(LiprebasdetPeer::CODCAT);

		$criteria->addSelectColumn(LiprebasdetPeer::CODPRE);

		$criteria->addSelectColumn(LiprebasdetPeer::UNIMED);

		$criteria->addSelectColumn(LiprebasdetPeer::CANSOL);

		$criteria->addSelectColumn(LiprebasdetPeer::CANAPR);

		$criteria->addSelectColumn(LiprebasdetPeer::COSTO);

		$criteria->addSelectColumn(LiprebasdetPeer::SUBTOT);

		$criteria->addSelectColumn(LiprebasdetPeer::MONREC);

		$criteria->addSelectColumn(LiprebasdetPeer::MONTOT);

		$criteria->addSelectColumn(LiprebasdetPeer::STATUS);

		$criteria->addSelectColumn(LiprebasdetPeer::CODMON);

		$criteria->addSelectColumn(LiprebasdetPeer::VALCAM);

		$criteria->addSelectColumn(LiprebasdetPeer::CODFIN);

		$criteria->addSelectColumn(LiprebasdetPeer::ID);

	}

	const COUNT = 'COUNT(liprebasdet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liprebasdet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiprebasdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiprebasdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiprebasdetPeer::doSelectRS($criteria, $con);
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
		$objects = LiprebasdetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiprebasdetPeer::populateObjects(LiprebasdetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiprebasdetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiprebasdetPeer::getOMClass();
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
		return LiprebasdetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiprebasdetPeer::ID); 

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
			$comparison = $criteria->getComparison(LiprebasdetPeer::ID);
			$selectCriteria->add(LiprebasdetPeer::ID, $criteria->remove(LiprebasdetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiprebasdetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiprebasdetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liprebasdet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiprebasdetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liprebasdet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiprebasdetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiprebasdetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiprebasdetPeer::DATABASE_NAME, LiprebasdetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiprebasdetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiprebasdetPeer::DATABASE_NAME);

		$criteria->add(LiprebasdetPeer::ID, $pk);


		$v = LiprebasdetPeer::doSelect($criteria, $con);

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
			$criteria->add(LiprebasdetPeer::ID, $pks, Criteria::IN);
			$objs = LiprebasdetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiprebasdetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiprebasdetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiprebasdetMapBuilder');
}
