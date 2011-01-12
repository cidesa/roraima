<?php


abstract class BaseCacorrelPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cacorrel';

	
	const CLASS_DEFAULT = 'lib.model.Cacorrel';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CORCOM = 'cacorrel.CORCOM';

	
	const CORSER = 'cacorrel.CORSER';

	
	const CORSOL = 'cacorrel.CORSOL';

	
	const CORREQ = 'cacorrel.CORREQ';

	
	const CORREC = 'cacorrel.CORREC';

	
	const CORDES = 'cacorrel.CORDES';

	
	const CORCOT = 'cacorrel.CORCOT';

	
	const CORTRA = 'cacorrel.CORTRA';

	
	const CORENT = 'cacorrel.CORENT';

	
	const CORSAL = 'cacorrel.CORSAL';

	
	const CORPRO = 'cacorrel.CORPRO';

	
	const CORPAG = 'cacorrel.CORPAG';

	
	const CORCONT = 'cacorrel.CORCONT';

	
	const ID = 'cacorrel.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Corcom', 'Corser', 'Corsol', 'Correq', 'Correc', 'Cordes', 'Corcot', 'Cortra', 'Corent', 'Corsal', 'Corpro', 'Corpag', 'Corcont', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CacorrelPeer::CORCOM, CacorrelPeer::CORSER, CacorrelPeer::CORSOL, CacorrelPeer::CORREQ, CacorrelPeer::CORREC, CacorrelPeer::CORDES, CacorrelPeer::CORCOT, CacorrelPeer::CORTRA, CacorrelPeer::CORENT, CacorrelPeer::CORSAL, CacorrelPeer::CORPRO, CacorrelPeer::CORPAG, CacorrelPeer::CORCONT, CacorrelPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('corcom', 'corser', 'corsol', 'correq', 'correc', 'cordes', 'corcot', 'cortra', 'corent', 'corsal', 'corpro', 'corpag', 'corcont', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Corcom' => 0, 'Corser' => 1, 'Corsol' => 2, 'Correq' => 3, 'Correc' => 4, 'Cordes' => 5, 'Corcot' => 6, 'Cortra' => 7, 'Corent' => 8, 'Corsal' => 9, 'Corpro' => 10, 'Corpag' => 11, 'Corcont' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (CacorrelPeer::CORCOM => 0, CacorrelPeer::CORSER => 1, CacorrelPeer::CORSOL => 2, CacorrelPeer::CORREQ => 3, CacorrelPeer::CORREC => 4, CacorrelPeer::CORDES => 5, CacorrelPeer::CORCOT => 6, CacorrelPeer::CORTRA => 7, CacorrelPeer::CORENT => 8, CacorrelPeer::CORSAL => 9, CacorrelPeer::CORPRO => 10, CacorrelPeer::CORPAG => 11, CacorrelPeer::CORCONT => 12, CacorrelPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('corcom' => 0, 'corser' => 1, 'corsol' => 2, 'correq' => 3, 'correc' => 4, 'cordes' => 5, 'corcot' => 6, 'cortra' => 7, 'corent' => 8, 'corsal' => 9, 'corpro' => 10, 'corpag' => 11, 'corcont' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CacorrelMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CacorrelMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CacorrelPeer::getTableMap();
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
		return str_replace(CacorrelPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CacorrelPeer::CORCOM);

		$criteria->addSelectColumn(CacorrelPeer::CORSER);

		$criteria->addSelectColumn(CacorrelPeer::CORSOL);

		$criteria->addSelectColumn(CacorrelPeer::CORREQ);

		$criteria->addSelectColumn(CacorrelPeer::CORREC);

		$criteria->addSelectColumn(CacorrelPeer::CORDES);

		$criteria->addSelectColumn(CacorrelPeer::CORCOT);

		$criteria->addSelectColumn(CacorrelPeer::CORTRA);

		$criteria->addSelectColumn(CacorrelPeer::CORENT);

		$criteria->addSelectColumn(CacorrelPeer::CORSAL);

		$criteria->addSelectColumn(CacorrelPeer::CORPRO);

		$criteria->addSelectColumn(CacorrelPeer::CORPAG);

		$criteria->addSelectColumn(CacorrelPeer::CORCONT);

		$criteria->addSelectColumn(CacorrelPeer::ID);

	}

	const COUNT = 'COUNT(cacorrel.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cacorrel.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CacorrelPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CacorrelPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CacorrelPeer::doSelectRS($criteria, $con);
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
		$objects = CacorrelPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CacorrelPeer::populateObjects(CacorrelPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CacorrelPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CacorrelPeer::getOMClass();
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
		return CacorrelPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CacorrelPeer::ID); 

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
			$comparison = $criteria->getComparison(CacorrelPeer::ID);
			$selectCriteria->add(CacorrelPeer::ID, $criteria->remove(CacorrelPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CacorrelPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CacorrelPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cacorrel) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CacorrelPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cacorrel $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CacorrelPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CacorrelPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CacorrelPeer::DATABASE_NAME, CacorrelPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CacorrelPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CacorrelPeer::DATABASE_NAME);

		$criteria->add(CacorrelPeer::ID, $pk);


		$v = CacorrelPeer::doSelect($criteria, $con);

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
			$criteria->add(CacorrelPeer::ID, $pks, Criteria::IN);
			$objs = CacorrelPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCacorrelPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CacorrelMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CacorrelMapBuilder');
}
