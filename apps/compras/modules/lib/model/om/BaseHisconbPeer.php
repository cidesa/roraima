<?php


abstract class BaseHisconbPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hisconb';

	
	const CLASS_DEFAULT = 'lib.model.Hisconb';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'hisconb.CODCTA';

	
	const DESCTA = 'hisconb.DESCTA';

	
	const SALANT = 'hisconb.SALANT';

	
	const DEBCRE = 'hisconb.DEBCRE';

	
	const CARGAB = 'hisconb.CARGAB';

	
	const FECINI = 'hisconb.FECINI';

	
	const FECCIE = 'hisconb.FECCIE';

	
	const SALPRGPER = 'hisconb.SALPRGPER';

	
	const SALACUPER = 'hisconb.SALACUPER';

	
	const ID = 'hisconb.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Descta', 'Salant', 'Debcre', 'Cargab', 'Fecini', 'Feccie', 'Salprgper', 'Salacuper', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HisconbPeer::CODCTA, HisconbPeer::DESCTA, HisconbPeer::SALANT, HisconbPeer::DEBCRE, HisconbPeer::CARGAB, HisconbPeer::FECINI, HisconbPeer::FECCIE, HisconbPeer::SALPRGPER, HisconbPeer::SALACUPER, HisconbPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'descta', 'salant', 'debcre', 'cargab', 'fecini', 'feccie', 'salprgper', 'salacuper', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Descta' => 1, 'Salant' => 2, 'Debcre' => 3, 'Cargab' => 4, 'Fecini' => 5, 'Feccie' => 6, 'Salprgper' => 7, 'Salacuper' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (HisconbPeer::CODCTA => 0, HisconbPeer::DESCTA => 1, HisconbPeer::SALANT => 2, HisconbPeer::DEBCRE => 3, HisconbPeer::CARGAB => 4, HisconbPeer::FECINI => 5, HisconbPeer::FECCIE => 6, HisconbPeer::SALPRGPER => 7, HisconbPeer::SALACUPER => 8, HisconbPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'descta' => 1, 'salant' => 2, 'debcre' => 3, 'cargab' => 4, 'fecini' => 5, 'feccie' => 6, 'salprgper' => 7, 'salacuper' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/HisconbMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.HisconbMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HisconbPeer::getTableMap();
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
		return str_replace(HisconbPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HisconbPeer::CODCTA);

		$criteria->addSelectColumn(HisconbPeer::DESCTA);

		$criteria->addSelectColumn(HisconbPeer::SALANT);

		$criteria->addSelectColumn(HisconbPeer::DEBCRE);

		$criteria->addSelectColumn(HisconbPeer::CARGAB);

		$criteria->addSelectColumn(HisconbPeer::FECINI);

		$criteria->addSelectColumn(HisconbPeer::FECCIE);

		$criteria->addSelectColumn(HisconbPeer::SALPRGPER);

		$criteria->addSelectColumn(HisconbPeer::SALACUPER);

		$criteria->addSelectColumn(HisconbPeer::ID);

	}

	const COUNT = 'COUNT(hisconb.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hisconb.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HisconbPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HisconbPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HisconbPeer::doSelectRS($criteria, $con);
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
		$objects = HisconbPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HisconbPeer::populateObjects(HisconbPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HisconbPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HisconbPeer::getOMClass();
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
		return HisconbPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HisconbPeer::ID); 

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
			$comparison = $criteria->getComparison(HisconbPeer::ID);
			$selectCriteria->add(HisconbPeer::ID, $criteria->remove(HisconbPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HisconbPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HisconbPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hisconb) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HisconbPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hisconb $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HisconbPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HisconbPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HisconbPeer::DATABASE_NAME, HisconbPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HisconbPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HisconbPeer::DATABASE_NAME);

		$criteria->add(HisconbPeer::ID, $pk);


		$v = HisconbPeer::doSelect($criteria, $con);

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
			$criteria->add(HisconbPeer::ID, $pks, Criteria::IN);
			$objs = HisconbPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHisconbPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/HisconbMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.HisconbMapBuilder');
}
