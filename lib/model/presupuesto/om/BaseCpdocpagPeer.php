<?php


abstract class BaseCpdocpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdocpag';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpdocpag';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPPAG = 'cpdocpag.TIPPAG';

	
	const NOMEXT = 'cpdocpag.NOMEXT';

	
	const NOMABR = 'cpdocpag.NOMABR';

	
	const REFIER = 'cpdocpag.REFIER';

	
	const AFEPRC = 'cpdocpag.AFEPRC';

	
	const AFECOM = 'cpdocpag.AFECOM';

	
	const AFECAU = 'cpdocpag.AFECAU';

	
	const AFEPAG = 'cpdocpag.AFEPAG';

	
	const AFEDIS = 'cpdocpag.AFEDIS';

	
	const ID = 'cpdocpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tippag', 'Nomext', 'Nomabr', 'Refier', 'Afeprc', 'Afecom', 'Afecau', 'Afepag', 'Afedis', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdocpagPeer::TIPPAG, CpdocpagPeer::NOMEXT, CpdocpagPeer::NOMABR, CpdocpagPeer::REFIER, CpdocpagPeer::AFEPRC, CpdocpagPeer::AFECOM, CpdocpagPeer::AFECAU, CpdocpagPeer::AFEPAG, CpdocpagPeer::AFEDIS, CpdocpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tippag', 'nomext', 'nomabr', 'refier', 'afeprc', 'afecom', 'afecau', 'afepag', 'afedis', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tippag' => 0, 'Nomext' => 1, 'Nomabr' => 2, 'Refier' => 3, 'Afeprc' => 4, 'Afecom' => 5, 'Afecau' => 6, 'Afepag' => 7, 'Afedis' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (CpdocpagPeer::TIPPAG => 0, CpdocpagPeer::NOMEXT => 1, CpdocpagPeer::NOMABR => 2, CpdocpagPeer::REFIER => 3, CpdocpagPeer::AFEPRC => 4, CpdocpagPeer::AFECOM => 5, CpdocpagPeer::AFECAU => 6, CpdocpagPeer::AFEPAG => 7, CpdocpagPeer::AFEDIS => 8, CpdocpagPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('tippag' => 0, 'nomext' => 1, 'nomabr' => 2, 'refier' => 3, 'afeprc' => 4, 'afecom' => 5, 'afecau' => 6, 'afepag' => 7, 'afedis' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpdocpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpdocpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdocpagPeer::getTableMap();
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
		return str_replace(CpdocpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdocpagPeer::TIPPAG);

		$criteria->addSelectColumn(CpdocpagPeer::NOMEXT);

		$criteria->addSelectColumn(CpdocpagPeer::NOMABR);

		$criteria->addSelectColumn(CpdocpagPeer::REFIER);

		$criteria->addSelectColumn(CpdocpagPeer::AFEPRC);

		$criteria->addSelectColumn(CpdocpagPeer::AFECOM);

		$criteria->addSelectColumn(CpdocpagPeer::AFECAU);

		$criteria->addSelectColumn(CpdocpagPeer::AFEPAG);

		$criteria->addSelectColumn(CpdocpagPeer::AFEDIS);

		$criteria->addSelectColumn(CpdocpagPeer::ID);

	}

	const COUNT = 'COUNT(cpdocpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdocpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdocpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdocpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdocpagPeer::doSelectRS($criteria, $con);
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
		$objects = CpdocpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdocpagPeer::populateObjects(CpdocpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdocpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdocpagPeer::getOMClass();
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
		return CpdocpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpdocpagPeer::ID); 

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
			$comparison = $criteria->getComparison(CpdocpagPeer::ID);
			$selectCriteria->add(CpdocpagPeer::ID, $criteria->remove(CpdocpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdocpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdocpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdocpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdocpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdocpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdocpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdocpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdocpagPeer::DATABASE_NAME, CpdocpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdocpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdocpagPeer::DATABASE_NAME);

		$criteria->add(CpdocpagPeer::ID, $pk);


		$v = CpdocpagPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdocpagPeer::ID, $pks, Criteria::IN);
			$objs = CpdocpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdocpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpdocpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpdocpagMapBuilder');
}
