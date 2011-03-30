<?php


abstract class BaseLipliecrifianPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lipliecrifian';

	
	const CLASS_DEFAULT = 'lib.model.Lipliecrifian';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'lipliecrifian.NUMPLIE';

	
	const NUMEXP = 'lipliecrifian.NUMEXP';

	
	const CODCOMRES = 'lipliecrifian.CODCOMRES';

	
	const PUNTUA = 'lipliecrifian.PUNTUA';

	
	const PORCEN = 'lipliecrifian.PORCEN';

	
	const EMPRESA = 'lipliecrifian.EMPRESA';

	
	const FECEMI = 'lipliecrifian.FECEMI';

	
	const FECVEN = 'lipliecrifian.FECVEN';

	
	const LIMIT = 'lipliecrifian.LIMIT';

	
	const ID = 'lipliecrifian.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numexp', 'Codcomres', 'Puntua', 'Porcen', 'Empresa', 'Fecemi', 'Fecven', 'Limit', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LipliecrifianPeer::NUMPLIE, LipliecrifianPeer::NUMEXP, LipliecrifianPeer::CODCOMRES, LipliecrifianPeer::PUNTUA, LipliecrifianPeer::PORCEN, LipliecrifianPeer::EMPRESA, LipliecrifianPeer::FECEMI, LipliecrifianPeer::FECVEN, LipliecrifianPeer::LIMIT, LipliecrifianPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numexp', 'codcomres', 'puntua', 'porcen', 'empresa', 'fecemi', 'fecven', 'limit', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numexp' => 1, 'Codcomres' => 2, 'Puntua' => 3, 'Porcen' => 4, 'Empresa' => 5, 'Fecemi' => 6, 'Fecven' => 7, 'Limit' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (LipliecrifianPeer::NUMPLIE => 0, LipliecrifianPeer::NUMEXP => 1, LipliecrifianPeer::CODCOMRES => 2, LipliecrifianPeer::PUNTUA => 3, LipliecrifianPeer::PORCEN => 4, LipliecrifianPeer::EMPRESA => 5, LipliecrifianPeer::FECEMI => 6, LipliecrifianPeer::FECVEN => 7, LipliecrifianPeer::LIMIT => 8, LipliecrifianPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numexp' => 1, 'codcomres' => 2, 'puntua' => 3, 'porcen' => 4, 'empresa' => 5, 'fecemi' => 6, 'fecven' => 7, 'limit' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LipliecrifianMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LipliecrifianMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LipliecrifianPeer::getTableMap();
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
		return str_replace(LipliecrifianPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LipliecrifianPeer::NUMPLIE);

		$criteria->addSelectColumn(LipliecrifianPeer::NUMEXP);

		$criteria->addSelectColumn(LipliecrifianPeer::CODCOMRES);

		$criteria->addSelectColumn(LipliecrifianPeer::PUNTUA);

		$criteria->addSelectColumn(LipliecrifianPeer::PORCEN);

		$criteria->addSelectColumn(LipliecrifianPeer::EMPRESA);

		$criteria->addSelectColumn(LipliecrifianPeer::FECEMI);

		$criteria->addSelectColumn(LipliecrifianPeer::FECVEN);

		$criteria->addSelectColumn(LipliecrifianPeer::LIMIT);

		$criteria->addSelectColumn(LipliecrifianPeer::ID);

	}

	const COUNT = 'COUNT(lipliecrifian.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lipliecrifian.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LipliecrifianPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipliecrifianPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LipliecrifianPeer::doSelectRS($criteria, $con);
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
		$objects = LipliecrifianPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LipliecrifianPeer::populateObjects(LipliecrifianPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LipliecrifianPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LipliecrifianPeer::getOMClass();
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
		return LipliecrifianPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LipliecrifianPeer::ID); 

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
			$comparison = $criteria->getComparison(LipliecrifianPeer::ID);
			$selectCriteria->add(LipliecrifianPeer::ID, $criteria->remove(LipliecrifianPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LipliecrifianPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LipliecrifianPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lipliecrifian) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LipliecrifianPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lipliecrifian $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LipliecrifianPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LipliecrifianPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LipliecrifianPeer::DATABASE_NAME, LipliecrifianPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LipliecrifianPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LipliecrifianPeer::DATABASE_NAME);

		$criteria->add(LipliecrifianPeer::ID, $pk);


		$v = LipliecrifianPeer::doSelect($criteria, $con);

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
			$criteria->add(LipliecrifianPeer::ID, $pks, Criteria::IN);
			$objs = LipliecrifianPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLipliecrifianPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LipliecrifianMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LipliecrifianMapBuilder');
}
