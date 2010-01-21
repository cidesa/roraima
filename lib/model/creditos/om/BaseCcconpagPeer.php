<?php


abstract class BaseCcconpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccconpag';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccconpag';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccconpag.ID';

	
	const FECDES = 'ccconpag.FECDES';

	
	const FECHAS = 'ccconpag.FECHAS';

	
	const DEBCOMCON = 'ccconpag.DEBCOMCON';

	
	const HABCOMCON = 'ccconpag.HABCOMCON';

	
	const NUMCON = 'ccconpag.NUMCON';

	
	const TIPO = 'ccconpag.TIPO';

	
	const ESSUM = 'ccconpag.ESSUM';

	
	const INTDEV = 'ccconpag.INTDEV';

	
	const FECCON = 'ccconpag.FECCON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Fecdes', 'Fechas', 'Debcomcon', 'Habcomcon', 'Numcon', 'Tipo', 'Essum', 'Intdev', 'Feccon', ),
		BasePeer::TYPE_COLNAME => array (CcconpagPeer::ID, CcconpagPeer::FECDES, CcconpagPeer::FECHAS, CcconpagPeer::DEBCOMCON, CcconpagPeer::HABCOMCON, CcconpagPeer::NUMCON, CcconpagPeer::TIPO, CcconpagPeer::ESSUM, CcconpagPeer::INTDEV, CcconpagPeer::FECCON, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fecdes', 'fechas', 'debcomcon', 'habcomcon', 'numcon', 'tipo', 'essum', 'intdev', 'feccon', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Fecdes' => 1, 'Fechas' => 2, 'Debcomcon' => 3, 'Habcomcon' => 4, 'Numcon' => 5, 'Tipo' => 6, 'Essum' => 7, 'Intdev' => 8, 'Feccon' => 9, ),
		BasePeer::TYPE_COLNAME => array (CcconpagPeer::ID => 0, CcconpagPeer::FECDES => 1, CcconpagPeer::FECHAS => 2, CcconpagPeer::DEBCOMCON => 3, CcconpagPeer::HABCOMCON => 4, CcconpagPeer::NUMCON => 5, CcconpagPeer::TIPO => 6, CcconpagPeer::ESSUM => 7, CcconpagPeer::INTDEV => 8, CcconpagPeer::FECCON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fecdes' => 1, 'fechas' => 2, 'debcomcon' => 3, 'habcomcon' => 4, 'numcon' => 5, 'tipo' => 6, 'essum' => 7, 'intdev' => 8, 'feccon' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcconpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcconpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcconpagPeer::getTableMap();
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
		return str_replace(CcconpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcconpagPeer::ID);

		$criteria->addSelectColumn(CcconpagPeer::FECDES);

		$criteria->addSelectColumn(CcconpagPeer::FECHAS);

		$criteria->addSelectColumn(CcconpagPeer::DEBCOMCON);

		$criteria->addSelectColumn(CcconpagPeer::HABCOMCON);

		$criteria->addSelectColumn(CcconpagPeer::NUMCON);

		$criteria->addSelectColumn(CcconpagPeer::TIPO);

		$criteria->addSelectColumn(CcconpagPeer::ESSUM);

		$criteria->addSelectColumn(CcconpagPeer::INTDEV);

		$criteria->addSelectColumn(CcconpagPeer::FECCON);

	}

	const COUNT = 'COUNT(ccconpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccconpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcconpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcconpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcconpagPeer::doSelectRS($criteria, $con);
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
		$objects = CcconpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcconpagPeer::populateObjects(CcconpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcconpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcconpagPeer::getOMClass();
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
		return CcconpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcconpagPeer::ID); 

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
			$comparison = $criteria->getComparison(CcconpagPeer::ID);
			$selectCriteria->add(CcconpagPeer::ID, $criteria->remove(CcconpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcconpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcconpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccconpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcconpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccconpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcconpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcconpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcconpagPeer::DATABASE_NAME, CcconpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcconpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcconpagPeer::DATABASE_NAME);

		$criteria->add(CcconpagPeer::ID, $pk);


		$v = CcconpagPeer::doSelect($criteria, $con);

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
			$criteria->add(CcconpagPeer::ID, $pks, Criteria::IN);
			$objs = CcconpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcconpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcconpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcconpagMapBuilder');
}
