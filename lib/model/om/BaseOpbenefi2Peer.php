<?php


abstract class BaseOpbenefi2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opbenefi2';

	
	const CLASS_DEFAULT = 'lib.model.Opbenefi2';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDRIF = 'opbenefi2.CEDRIF';

	
	const NOMBEN = 'opbenefi2.NOMBEN';

	
	const DIRBEN = 'opbenefi2.DIRBEN';

	
	const TELBEN = 'opbenefi2.TELBEN';

	
	const CODCTA = 'opbenefi2.CODCTA';

	
	const NITBEN = 'opbenefi2.NITBEN';

	
	const CODTIPBEN = 'opbenefi2.CODTIPBEN';

	
	const TIPPER = 'opbenefi2.TIPPER';

	
	const NACIONALIDAD = 'opbenefi2.NACIONALIDAD';

	
	const RESIDENTE = 'opbenefi2.RESIDENTE';

	
	const CONSTITUIDA = 'opbenefi2.CONSTITUIDA';

	
	const CODORD = 'opbenefi2.CODORD';

	
	const CODPERCON = 'opbenefi2.CODPERCON';

	
	const CODORDADI = 'opbenefi2.CODORDADI';

	
	const CODPERCONADI = 'opbenefi2.CODPERCONADI';

	
	const CODORDCONTRA = 'opbenefi2.CODORDCONTRA';

	
	const CODPERCONTRA = 'opbenefi2.CODPERCONTRA';

	
	const TEMCEDRIF = 'opbenefi2.TEMCEDRIF';

	
	const ID = 'opbenefi2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrif', 'Nomben', 'Dirben', 'Telben', 'Codcta', 'Nitben', 'Codtipben', 'Tipper', 'Nacionalidad', 'Residente', 'Constituida', 'Codord', 'Codpercon', 'Codordadi', 'Codperconadi', 'Codordcontra', 'Codpercontra', 'Temcedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Opbenefi2Peer::CEDRIF, Opbenefi2Peer::NOMBEN, Opbenefi2Peer::DIRBEN, Opbenefi2Peer::TELBEN, Opbenefi2Peer::CODCTA, Opbenefi2Peer::NITBEN, Opbenefi2Peer::CODTIPBEN, Opbenefi2Peer::TIPPER, Opbenefi2Peer::NACIONALIDAD, Opbenefi2Peer::RESIDENTE, Opbenefi2Peer::CONSTITUIDA, Opbenefi2Peer::CODORD, Opbenefi2Peer::CODPERCON, Opbenefi2Peer::CODORDADI, Opbenefi2Peer::CODPERCONADI, Opbenefi2Peer::CODORDCONTRA, Opbenefi2Peer::CODPERCONTRA, Opbenefi2Peer::TEMCEDRIF, Opbenefi2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrif', 'nomben', 'dirben', 'telben', 'codcta', 'nitben', 'codtipben', 'tipper', 'nacionalidad', 'residente', 'constituida', 'codord', 'codpercon', 'codordadi', 'codperconadi', 'codordcontra', 'codpercontra', 'temcedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrif' => 0, 'Nomben' => 1, 'Dirben' => 2, 'Telben' => 3, 'Codcta' => 4, 'Nitben' => 5, 'Codtipben' => 6, 'Tipper' => 7, 'Nacionalidad' => 8, 'Residente' => 9, 'Constituida' => 10, 'Codord' => 11, 'Codpercon' => 12, 'Codordadi' => 13, 'Codperconadi' => 14, 'Codordcontra' => 15, 'Codpercontra' => 16, 'Temcedrif' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (Opbenefi2Peer::CEDRIF => 0, Opbenefi2Peer::NOMBEN => 1, Opbenefi2Peer::DIRBEN => 2, Opbenefi2Peer::TELBEN => 3, Opbenefi2Peer::CODCTA => 4, Opbenefi2Peer::NITBEN => 5, Opbenefi2Peer::CODTIPBEN => 6, Opbenefi2Peer::TIPPER => 7, Opbenefi2Peer::NACIONALIDAD => 8, Opbenefi2Peer::RESIDENTE => 9, Opbenefi2Peer::CONSTITUIDA => 10, Opbenefi2Peer::CODORD => 11, Opbenefi2Peer::CODPERCON => 12, Opbenefi2Peer::CODORDADI => 13, Opbenefi2Peer::CODPERCONADI => 14, Opbenefi2Peer::CODORDCONTRA => 15, Opbenefi2Peer::CODPERCONTRA => 16, Opbenefi2Peer::TEMCEDRIF => 17, Opbenefi2Peer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrif' => 0, 'nomben' => 1, 'dirben' => 2, 'telben' => 3, 'codcta' => 4, 'nitben' => 5, 'codtipben' => 6, 'tipper' => 7, 'nacionalidad' => 8, 'residente' => 9, 'constituida' => 10, 'codord' => 11, 'codpercon' => 12, 'codordadi' => 13, 'codperconadi' => 14, 'codordcontra' => 15, 'codpercontra' => 16, 'temcedrif' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Opbenefi2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Opbenefi2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Opbenefi2Peer::getTableMap();
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
		return str_replace(Opbenefi2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Opbenefi2Peer::CEDRIF);

		$criteria->addSelectColumn(Opbenefi2Peer::NOMBEN);

		$criteria->addSelectColumn(Opbenefi2Peer::DIRBEN);

		$criteria->addSelectColumn(Opbenefi2Peer::TELBEN);

		$criteria->addSelectColumn(Opbenefi2Peer::CODCTA);

		$criteria->addSelectColumn(Opbenefi2Peer::NITBEN);

		$criteria->addSelectColumn(Opbenefi2Peer::CODTIPBEN);

		$criteria->addSelectColumn(Opbenefi2Peer::TIPPER);

		$criteria->addSelectColumn(Opbenefi2Peer::NACIONALIDAD);

		$criteria->addSelectColumn(Opbenefi2Peer::RESIDENTE);

		$criteria->addSelectColumn(Opbenefi2Peer::CONSTITUIDA);

		$criteria->addSelectColumn(Opbenefi2Peer::CODORD);

		$criteria->addSelectColumn(Opbenefi2Peer::CODPERCON);

		$criteria->addSelectColumn(Opbenefi2Peer::CODORDADI);

		$criteria->addSelectColumn(Opbenefi2Peer::CODPERCONADI);

		$criteria->addSelectColumn(Opbenefi2Peer::CODORDCONTRA);

		$criteria->addSelectColumn(Opbenefi2Peer::CODPERCONTRA);

		$criteria->addSelectColumn(Opbenefi2Peer::TEMCEDRIF);

		$criteria->addSelectColumn(Opbenefi2Peer::ID);

	}

	const COUNT = 'COUNT(opbenefi2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opbenefi2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Opbenefi2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Opbenefi2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Opbenefi2Peer::doSelectRS($criteria, $con);
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
		$objects = Opbenefi2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Opbenefi2Peer::populateObjects(Opbenefi2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Opbenefi2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Opbenefi2Peer::getOMClass();
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
		return Opbenefi2Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Opbenefi2Peer::ID);
			$selectCriteria->add(Opbenefi2Peer::ID, $criteria->remove(Opbenefi2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Opbenefi2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Opbenefi2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opbenefi2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Opbenefi2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opbenefi2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Opbenefi2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Opbenefi2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Opbenefi2Peer::DATABASE_NAME, Opbenefi2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Opbenefi2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Opbenefi2Peer::DATABASE_NAME);

		$criteria->add(Opbenefi2Peer::ID, $pk);


		$v = Opbenefi2Peer::doSelect($criteria, $con);

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
			$criteria->add(Opbenefi2Peer::ID, $pks, Criteria::IN);
			$objs = Opbenefi2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpbenefi2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Opbenefi2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Opbenefi2MapBuilder');
}
