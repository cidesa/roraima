<?php


abstract class BaseBnipcactPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnipcact';

	
	const CLASS_DEFAULT = 'lib.model.Bnipcact';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ANOIPC = 'bnipcact.ANOIPC';

	
	const IPCENE = 'bnipcact.IPCENE';

	
	const IPCFEB = 'bnipcact.IPCFEB';

	
	const IPCMAR = 'bnipcact.IPCMAR';

	
	const IPCABR = 'bnipcact.IPCABR';

	
	const IPCMAY = 'bnipcact.IPCMAY';

	
	const IPCJUN = 'bnipcact.IPCJUN';

	
	const IPCJUL = 'bnipcact.IPCJUL';

	
	const IPCAGO = 'bnipcact.IPCAGO';

	
	const IPCSEP = 'bnipcact.IPCSEP';

	
	const IPCOCT = 'bnipcact.IPCOCT';

	
	const IPCNOV = 'bnipcact.IPCNOV';

	
	const IPCDIC = 'bnipcact.IPCDIC';

	
	const STAIPC = 'bnipcact.STAIPC';

	
	const ID = 'bnipcact.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Anoipc', 'Ipcene', 'Ipcfeb', 'Ipcmar', 'Ipcabr', 'Ipcmay', 'Ipcjun', 'Ipcjul', 'Ipcago', 'Ipcsep', 'Ipcoct', 'Ipcnov', 'Ipcdic', 'Staipc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnipcactPeer::ANOIPC, BnipcactPeer::IPCENE, BnipcactPeer::IPCFEB, BnipcactPeer::IPCMAR, BnipcactPeer::IPCABR, BnipcactPeer::IPCMAY, BnipcactPeer::IPCJUN, BnipcactPeer::IPCJUL, BnipcactPeer::IPCAGO, BnipcactPeer::IPCSEP, BnipcactPeer::IPCOCT, BnipcactPeer::IPCNOV, BnipcactPeer::IPCDIC, BnipcactPeer::STAIPC, BnipcactPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('anoipc', 'ipcene', 'ipcfeb', 'ipcmar', 'ipcabr', 'ipcmay', 'ipcjun', 'ipcjul', 'ipcago', 'ipcsep', 'ipcoct', 'ipcnov', 'ipcdic', 'staipc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Anoipc' => 0, 'Ipcene' => 1, 'Ipcfeb' => 2, 'Ipcmar' => 3, 'Ipcabr' => 4, 'Ipcmay' => 5, 'Ipcjun' => 6, 'Ipcjul' => 7, 'Ipcago' => 8, 'Ipcsep' => 9, 'Ipcoct' => 10, 'Ipcnov' => 11, 'Ipcdic' => 12, 'Staipc' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (BnipcactPeer::ANOIPC => 0, BnipcactPeer::IPCENE => 1, BnipcactPeer::IPCFEB => 2, BnipcactPeer::IPCMAR => 3, BnipcactPeer::IPCABR => 4, BnipcactPeer::IPCMAY => 5, BnipcactPeer::IPCJUN => 6, BnipcactPeer::IPCJUL => 7, BnipcactPeer::IPCAGO => 8, BnipcactPeer::IPCSEP => 9, BnipcactPeer::IPCOCT => 10, BnipcactPeer::IPCNOV => 11, BnipcactPeer::IPCDIC => 12, BnipcactPeer::STAIPC => 13, BnipcactPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('anoipc' => 0, 'ipcene' => 1, 'ipcfeb' => 2, 'ipcmar' => 3, 'ipcabr' => 4, 'ipcmay' => 5, 'ipcjun' => 6, 'ipcjul' => 7, 'ipcago' => 8, 'ipcsep' => 9, 'ipcoct' => 10, 'ipcnov' => 11, 'ipcdic' => 12, 'staipc' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnipcactMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnipcactMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnipcactPeer::getTableMap();
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
		return str_replace(BnipcactPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnipcactPeer::ANOIPC);

		$criteria->addSelectColumn(BnipcactPeer::IPCENE);

		$criteria->addSelectColumn(BnipcactPeer::IPCFEB);

		$criteria->addSelectColumn(BnipcactPeer::IPCMAR);

		$criteria->addSelectColumn(BnipcactPeer::IPCABR);

		$criteria->addSelectColumn(BnipcactPeer::IPCMAY);

		$criteria->addSelectColumn(BnipcactPeer::IPCJUN);

		$criteria->addSelectColumn(BnipcactPeer::IPCJUL);

		$criteria->addSelectColumn(BnipcactPeer::IPCAGO);

		$criteria->addSelectColumn(BnipcactPeer::IPCSEP);

		$criteria->addSelectColumn(BnipcactPeer::IPCOCT);

		$criteria->addSelectColumn(BnipcactPeer::IPCNOV);

		$criteria->addSelectColumn(BnipcactPeer::IPCDIC);

		$criteria->addSelectColumn(BnipcactPeer::STAIPC);

		$criteria->addSelectColumn(BnipcactPeer::ID);

	}

	const COUNT = 'COUNT(bnipcact.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnipcact.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnipcactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnipcactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnipcactPeer::doSelectRS($criteria, $con);
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
		$objects = BnipcactPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnipcactPeer::populateObjects(BnipcactPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnipcactPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnipcactPeer::getOMClass();
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
		return BnipcactPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnipcactPeer::ID); 

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
			$comparison = $criteria->getComparison(BnipcactPeer::ID);
			$selectCriteria->add(BnipcactPeer::ID, $criteria->remove(BnipcactPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnipcactPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnipcactPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnipcact) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnipcactPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnipcact $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnipcactPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnipcactPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnipcactPeer::DATABASE_NAME, BnipcactPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnipcactPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnipcactPeer::DATABASE_NAME);

		$criteria->add(BnipcactPeer::ID, $pk);


		$v = BnipcactPeer::doSelect($criteria, $con);

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
			$criteria->add(BnipcactPeer::ID, $pks, Criteria::IN);
			$objs = BnipcactPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnipcactPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnipcactMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnipcactMapBuilder');
}
