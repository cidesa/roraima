<?php


abstract class BaseFanotentPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fanotent';

	
	const CLASS_DEFAULT = 'lib.model.Fanotent';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NRONOT = 'fanotent.NRONOT';

	
	const FECNOT = 'fanotent.FECNOT';

	
	const CODCLI = 'fanotent.CODCLI';

	
	const TIPREF = 'fanotent.TIPREF';

	
	const CODREF = 'fanotent.CODREF';

	
	const DESNOT = 'fanotent.DESNOT';

	
	const MONNOT = 'fanotent.MONNOT';

	
	const OBSNOT = 'fanotent.OBSNOT';

	
	const TIPNOT = 'fanotent.TIPNOT';

	
	const REAPOR = 'fanotent.REAPOR';

	
	const STATUS = 'fanotent.STATUS';

	
	const RIFENT = 'fanotent.RIFENT';

	
	const NOMENT = 'fanotent.NOMENT';

	
	const FECANU = 'fanotent.FECANU';

	
	const AUTORI = 'fanotent.AUTORI';

	
	const FECAUT = 'fanotent.FECAUT';

	
	const AUTPOR = 'fanotent.AUTPOR';

	
	const ID = 'fanotent.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nronot', 'Fecnot', 'Codcli', 'Tipref', 'Codref', 'Desnot', 'Monnot', 'Obsnot', 'Tipnot', 'Reapor', 'Status', 'Rifent', 'Noment', 'Fecanu', 'Autori', 'Fecaut', 'Autpor', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FanotentPeer::NRONOT, FanotentPeer::FECNOT, FanotentPeer::CODCLI, FanotentPeer::TIPREF, FanotentPeer::CODREF, FanotentPeer::DESNOT, FanotentPeer::MONNOT, FanotentPeer::OBSNOT, FanotentPeer::TIPNOT, FanotentPeer::REAPOR, FanotentPeer::STATUS, FanotentPeer::RIFENT, FanotentPeer::NOMENT, FanotentPeer::FECANU, FanotentPeer::AUTORI, FanotentPeer::FECAUT, FanotentPeer::AUTPOR, FanotentPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nronot', 'fecnot', 'codcli', 'tipref', 'codref', 'desnot', 'monnot', 'obsnot', 'tipnot', 'reapor', 'status', 'rifent', 'noment', 'fecanu', 'autori', 'fecaut', 'autpor', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nronot' => 0, 'Fecnot' => 1, 'Codcli' => 2, 'Tipref' => 3, 'Codref' => 4, 'Desnot' => 5, 'Monnot' => 6, 'Obsnot' => 7, 'Tipnot' => 8, 'Reapor' => 9, 'Status' => 10, 'Rifent' => 11, 'Noment' => 12, 'Fecanu' => 13, 'Autori' => 14, 'Fecaut' => 15, 'Autpor' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (FanotentPeer::NRONOT => 0, FanotentPeer::FECNOT => 1, FanotentPeer::CODCLI => 2, FanotentPeer::TIPREF => 3, FanotentPeer::CODREF => 4, FanotentPeer::DESNOT => 5, FanotentPeer::MONNOT => 6, FanotentPeer::OBSNOT => 7, FanotentPeer::TIPNOT => 8, FanotentPeer::REAPOR => 9, FanotentPeer::STATUS => 10, FanotentPeer::RIFENT => 11, FanotentPeer::NOMENT => 12, FanotentPeer::FECANU => 13, FanotentPeer::AUTORI => 14, FanotentPeer::FECAUT => 15, FanotentPeer::AUTPOR => 16, FanotentPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('nronot' => 0, 'fecnot' => 1, 'codcli' => 2, 'tipref' => 3, 'codref' => 4, 'desnot' => 5, 'monnot' => 6, 'obsnot' => 7, 'tipnot' => 8, 'reapor' => 9, 'status' => 10, 'rifent' => 11, 'noment' => 12, 'fecanu' => 13, 'autori' => 14, 'fecaut' => 15, 'autpor' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FanotentMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FanotentMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FanotentPeer::getTableMap();
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
		return str_replace(FanotentPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FanotentPeer::NRONOT);

		$criteria->addSelectColumn(FanotentPeer::FECNOT);

		$criteria->addSelectColumn(FanotentPeer::CODCLI);

		$criteria->addSelectColumn(FanotentPeer::TIPREF);

		$criteria->addSelectColumn(FanotentPeer::CODREF);

		$criteria->addSelectColumn(FanotentPeer::DESNOT);

		$criteria->addSelectColumn(FanotentPeer::MONNOT);

		$criteria->addSelectColumn(FanotentPeer::OBSNOT);

		$criteria->addSelectColumn(FanotentPeer::TIPNOT);

		$criteria->addSelectColumn(FanotentPeer::REAPOR);

		$criteria->addSelectColumn(FanotentPeer::STATUS);

		$criteria->addSelectColumn(FanotentPeer::RIFENT);

		$criteria->addSelectColumn(FanotentPeer::NOMENT);

		$criteria->addSelectColumn(FanotentPeer::FECANU);

		$criteria->addSelectColumn(FanotentPeer::AUTORI);

		$criteria->addSelectColumn(FanotentPeer::FECAUT);

		$criteria->addSelectColumn(FanotentPeer::AUTPOR);

		$criteria->addSelectColumn(FanotentPeer::ID);

	}

	const COUNT = 'COUNT(fanotent.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fanotent.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FanotentPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FanotentPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FanotentPeer::doSelectRS($criteria, $con);
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
		$objects = FanotentPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FanotentPeer::populateObjects(FanotentPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FanotentPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FanotentPeer::getOMClass();
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
		return FanotentPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FanotentPeer::ID); 

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
			$comparison = $criteria->getComparison(FanotentPeer::ID);
			$selectCriteria->add(FanotentPeer::ID, $criteria->remove(FanotentPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FanotentPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FanotentPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fanotent) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FanotentPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fanotent $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FanotentPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FanotentPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FanotentPeer::DATABASE_NAME, FanotentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FanotentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FanotentPeer::DATABASE_NAME);

		$criteria->add(FanotentPeer::ID, $pk);


		$v = FanotentPeer::doSelect($criteria, $con);

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
			$criteria->add(FanotentPeer::ID, $pks, Criteria::IN);
			$objs = FanotentPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFanotentPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FanotentMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FanotentMapBuilder');
}
