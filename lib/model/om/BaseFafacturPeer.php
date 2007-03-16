<?php


abstract class BaseFafacturPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fafactur';

	
	const CLASS_DEFAULT = 'lib.model.Fafactur';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFFAC = 'fafactur.REFFAC';

	
	const FECFAC = 'fafactur.FECFAC';

	
	const CODCLI = 'fafactur.CODCLI';

	
	const DESFAC = 'fafactur.DESFAC';

	
	const TIPREF = 'fafactur.TIPREF';

	
	const MONFAC = 'fafactur.MONFAC';

	
	const MONDESC = 'fafactur.MONDESC';

	
	const CONPAG = 'fafactur.CONPAG';

	
	const NUMCOM = 'fafactur.NUMCOM';

	
	const REAPOR = 'fafactur.REAPOR';

	
	const FECANU = 'fafactur.FECANU';

	
	const STATUS = 'fafactur.STATUS';

	
	const OBSERV = 'fafactur.OBSERV';

	
	const TIPMON = 'fafactur.TIPMON';

	
	const VALMON = 'fafactur.VALMON';

	
	const NUMCOMORD = 'fafactur.NUMCOMORD';

	
	const ID = 'fafactur.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac', 'Fecfac', 'Codcli', 'Desfac', 'Tipref', 'Monfac', 'Mondesc', 'Conpag', 'Numcom', 'Reapor', 'Fecanu', 'Status', 'Observ', 'Tipmon', 'Valmon', 'Numcomord', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FafacturPeer::REFFAC, FafacturPeer::FECFAC, FafacturPeer::CODCLI, FafacturPeer::DESFAC, FafacturPeer::TIPREF, FafacturPeer::MONFAC, FafacturPeer::MONDESC, FafacturPeer::CONPAG, FafacturPeer::NUMCOM, FafacturPeer::REAPOR, FafacturPeer::FECANU, FafacturPeer::STATUS, FafacturPeer::OBSERV, FafacturPeer::TIPMON, FafacturPeer::VALMON, FafacturPeer::NUMCOMORD, FafacturPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac', 'fecfac', 'codcli', 'desfac', 'tipref', 'monfac', 'mondesc', 'conpag', 'numcom', 'reapor', 'fecanu', 'status', 'observ', 'tipmon', 'valmon', 'numcomord', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reffac' => 0, 'Fecfac' => 1, 'Codcli' => 2, 'Desfac' => 3, 'Tipref' => 4, 'Monfac' => 5, 'Mondesc' => 6, 'Conpag' => 7, 'Numcom' => 8, 'Reapor' => 9, 'Fecanu' => 10, 'Status' => 11, 'Observ' => 12, 'Tipmon' => 13, 'Valmon' => 14, 'Numcomord' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (FafacturPeer::REFFAC => 0, FafacturPeer::FECFAC => 1, FafacturPeer::CODCLI => 2, FafacturPeer::DESFAC => 3, FafacturPeer::TIPREF => 4, FafacturPeer::MONFAC => 5, FafacturPeer::MONDESC => 6, FafacturPeer::CONPAG => 7, FafacturPeer::NUMCOM => 8, FafacturPeer::REAPOR => 9, FafacturPeer::FECANU => 10, FafacturPeer::STATUS => 11, FafacturPeer::OBSERV => 12, FafacturPeer::TIPMON => 13, FafacturPeer::VALMON => 14, FafacturPeer::NUMCOMORD => 15, FafacturPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('reffac' => 0, 'fecfac' => 1, 'codcli' => 2, 'desfac' => 3, 'tipref' => 4, 'monfac' => 5, 'mondesc' => 6, 'conpag' => 7, 'numcom' => 8, 'reapor' => 9, 'fecanu' => 10, 'status' => 11, 'observ' => 12, 'tipmon' => 13, 'valmon' => 14, 'numcomord' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FafacturMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FafacturMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FafacturPeer::getTableMap();
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
		return str_replace(FafacturPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FafacturPeer::REFFAC);

		$criteria->addSelectColumn(FafacturPeer::FECFAC);

		$criteria->addSelectColumn(FafacturPeer::CODCLI);

		$criteria->addSelectColumn(FafacturPeer::DESFAC);

		$criteria->addSelectColumn(FafacturPeer::TIPREF);

		$criteria->addSelectColumn(FafacturPeer::MONFAC);

		$criteria->addSelectColumn(FafacturPeer::MONDESC);

		$criteria->addSelectColumn(FafacturPeer::CONPAG);

		$criteria->addSelectColumn(FafacturPeer::NUMCOM);

		$criteria->addSelectColumn(FafacturPeer::REAPOR);

		$criteria->addSelectColumn(FafacturPeer::FECANU);

		$criteria->addSelectColumn(FafacturPeer::STATUS);

		$criteria->addSelectColumn(FafacturPeer::OBSERV);

		$criteria->addSelectColumn(FafacturPeer::TIPMON);

		$criteria->addSelectColumn(FafacturPeer::VALMON);

		$criteria->addSelectColumn(FafacturPeer::NUMCOMORD);

		$criteria->addSelectColumn(FafacturPeer::ID);

	}

	const COUNT = 'COUNT(fafactur.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fafactur.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FafacturPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FafacturPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FafacturPeer::doSelectRS($criteria, $con);
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
		$objects = FafacturPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FafacturPeer::populateObjects(FafacturPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FafacturPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FafacturPeer::getOMClass();
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
		return FafacturPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FafacturPeer::ID);
			$selectCriteria->add(FafacturPeer::ID, $criteria->remove(FafacturPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FafacturPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FafacturPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fafactur) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FafacturPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fafactur $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FafacturPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FafacturPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FafacturPeer::DATABASE_NAME, FafacturPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FafacturPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FafacturPeer::DATABASE_NAME);

		$criteria->add(FafacturPeer::ID, $pk);


		$v = FafacturPeer::doSelect($criteria, $con);

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
			$criteria->add(FafacturPeer::ID, $pks, Criteria::IN);
			$objs = FafacturPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFafacturPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FafacturMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FafacturMapBuilder');
}
