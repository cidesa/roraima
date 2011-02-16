<?php


abstract class BaseLimemoranPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'limemoran';

	
	const CLASS_DEFAULT = 'lib.model.Limemoran';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMEXP = 'limemoran.NUMEXP';

	
	const NUMEMO = 'limemoran.NUMEMO';

	
	const NOMPRO = 'limemoran.NOMPRO';

	
	const FECHA = 'limemoran.FECHA';

	
	const CODFIN = 'limemoran.CODFIN';

	
	const CODCOM = 'limemoran.CODCOM';

	
	const CODUNISTE = 'limemoran.CODUNISTE';

	
	const CODCLACOMP = 'limemoran.CODCLACOMP';

	
	const TIPCOM = 'limemoran.TIPCOM';

	
	const DETMEMO = 'limemoran.DETMEMO';

	
	const ID = 'limemoran.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numexp', 'Numemo', 'Nompro', 'Fecha', 'Codfin', 'Codcom', 'Coduniste', 'Codclacomp', 'Tipcom', 'Detmemo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LimemoranPeer::NUMEXP, LimemoranPeer::NUMEMO, LimemoranPeer::NOMPRO, LimemoranPeer::FECHA, LimemoranPeer::CODFIN, LimemoranPeer::CODCOM, LimemoranPeer::CODUNISTE, LimemoranPeer::CODCLACOMP, LimemoranPeer::TIPCOM, LimemoranPeer::DETMEMO, LimemoranPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numexp', 'numemo', 'nompro', 'fecha', 'codfin', 'codcom', 'coduniste', 'codclacomp', 'tipcom', 'detmemo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numexp' => 0, 'Numemo' => 1, 'Nompro' => 2, 'Fecha' => 3, 'Codfin' => 4, 'Codcom' => 5, 'Coduniste' => 6, 'Codclacomp' => 7, 'Tipcom' => 8, 'Detmemo' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (LimemoranPeer::NUMEXP => 0, LimemoranPeer::NUMEMO => 1, LimemoranPeer::NOMPRO => 2, LimemoranPeer::FECHA => 3, LimemoranPeer::CODFIN => 4, LimemoranPeer::CODCOM => 5, LimemoranPeer::CODUNISTE => 6, LimemoranPeer::CODCLACOMP => 7, LimemoranPeer::TIPCOM => 8, LimemoranPeer::DETMEMO => 9, LimemoranPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('numexp' => 0, 'numemo' => 1, 'nompro' => 2, 'fecha' => 3, 'codfin' => 4, 'codcom' => 5, 'coduniste' => 6, 'codclacomp' => 7, 'tipcom' => 8, 'detmemo' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LimemoranMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LimemoranMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LimemoranPeer::getTableMap();
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
		return str_replace(LimemoranPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LimemoranPeer::NUMEXP);

		$criteria->addSelectColumn(LimemoranPeer::NUMEMO);

		$criteria->addSelectColumn(LimemoranPeer::NOMPRO);

		$criteria->addSelectColumn(LimemoranPeer::FECHA);

		$criteria->addSelectColumn(LimemoranPeer::CODFIN);

		$criteria->addSelectColumn(LimemoranPeer::CODCOM);

		$criteria->addSelectColumn(LimemoranPeer::CODUNISTE);

		$criteria->addSelectColumn(LimemoranPeer::CODCLACOMP);

		$criteria->addSelectColumn(LimemoranPeer::TIPCOM);

		$criteria->addSelectColumn(LimemoranPeer::DETMEMO);

		$criteria->addSelectColumn(LimemoranPeer::ID);

	}

	const COUNT = 'COUNT(limemoran.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT limemoran.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimemoranPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimemoranPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LimemoranPeer::doSelectRS($criteria, $con);
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
		$objects = LimemoranPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LimemoranPeer::populateObjects(LimemoranPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LimemoranPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LimemoranPeer::getOMClass();
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
		return LimemoranPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LimemoranPeer::ID); 

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
			$comparison = $criteria->getComparison(LimemoranPeer::ID);
			$selectCriteria->add(LimemoranPeer::ID, $criteria->remove(LimemoranPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LimemoranPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LimemoranPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Limemoran) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LimemoranPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Limemoran $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LimemoranPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LimemoranPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LimemoranPeer::DATABASE_NAME, LimemoranPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LimemoranPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LimemoranPeer::DATABASE_NAME);

		$criteria->add(LimemoranPeer::ID, $pk);


		$v = LimemoranPeer::doSelect($criteria, $con);

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
			$criteria->add(LimemoranPeer::ID, $pks, Criteria::IN);
			$objs = LimemoranPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLimemoranPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LimemoranMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LimemoranMapBuilder');
}
