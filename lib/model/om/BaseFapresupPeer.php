<?php


abstract class BaseFapresupPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fapresup';

	
	const CLASS_DEFAULT = 'lib.model.Fapresup';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPRE = 'fapresup.REFPRE';

	
	const DESPRE = 'fapresup.DESPRE';

	
	const FECPRE = 'fapresup.FECPRE';

	
	const CODCLI = 'fapresup.CODCLI';

	
	const MONPRE = 'fapresup.MONPRE';

	
	const MONDESC = 'fapresup.MONDESC';

	
	const CONPAG = 'fapresup.CONPAG';

	
	const FORDESP = 'fapresup.FORDESP';

	
	const FORSOL = 'fapresup.FORSOL';

	
	const TIPMON = 'fapresup.TIPMON';

	
	const VALMON = 'fapresup.VALMON';

	
	const AUTPOR = 'fapresup.AUTPOR';

	
	const OBSERV = 'fapresup.OBSERV';

	
	const CODUBI = 'fapresup.CODUBI';

	
	const ID = 'fapresup.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre', 'Despre', 'Fecpre', 'Codcli', 'Monpre', 'Mondesc', 'Conpag', 'Fordesp', 'Forsol', 'Tipmon', 'Valmon', 'Autpor', 'Observ', 'Codubi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FapresupPeer::REFPRE, FapresupPeer::DESPRE, FapresupPeer::FECPRE, FapresupPeer::CODCLI, FapresupPeer::MONPRE, FapresupPeer::MONDESC, FapresupPeer::CONPAG, FapresupPeer::FORDESP, FapresupPeer::FORSOL, FapresupPeer::TIPMON, FapresupPeer::VALMON, FapresupPeer::AUTPOR, FapresupPeer::OBSERV, FapresupPeer::CODUBI, FapresupPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre', 'despre', 'fecpre', 'codcli', 'monpre', 'mondesc', 'conpag', 'fordesp', 'forsol', 'tipmon', 'valmon', 'autpor', 'observ', 'codubi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpre' => 0, 'Despre' => 1, 'Fecpre' => 2, 'Codcli' => 3, 'Monpre' => 4, 'Mondesc' => 5, 'Conpag' => 6, 'Fordesp' => 7, 'Forsol' => 8, 'Tipmon' => 9, 'Valmon' => 10, 'Autpor' => 11, 'Observ' => 12, 'Codubi' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FapresupPeer::REFPRE => 0, FapresupPeer::DESPRE => 1, FapresupPeer::FECPRE => 2, FapresupPeer::CODCLI => 3, FapresupPeer::MONPRE => 4, FapresupPeer::MONDESC => 5, FapresupPeer::CONPAG => 6, FapresupPeer::FORDESP => 7, FapresupPeer::FORSOL => 8, FapresupPeer::TIPMON => 9, FapresupPeer::VALMON => 10, FapresupPeer::AUTPOR => 11, FapresupPeer::OBSERV => 12, FapresupPeer::CODUBI => 13, FapresupPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('refpre' => 0, 'despre' => 1, 'fecpre' => 2, 'codcli' => 3, 'monpre' => 4, 'mondesc' => 5, 'conpag' => 6, 'fordesp' => 7, 'forsol' => 8, 'tipmon' => 9, 'valmon' => 10, 'autpor' => 11, 'observ' => 12, 'codubi' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FapresupMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FapresupMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FapresupPeer::getTableMap();
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
		return str_replace(FapresupPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FapresupPeer::REFPRE);

		$criteria->addSelectColumn(FapresupPeer::DESPRE);

		$criteria->addSelectColumn(FapresupPeer::FECPRE);

		$criteria->addSelectColumn(FapresupPeer::CODCLI);

		$criteria->addSelectColumn(FapresupPeer::MONPRE);

		$criteria->addSelectColumn(FapresupPeer::MONDESC);

		$criteria->addSelectColumn(FapresupPeer::CONPAG);

		$criteria->addSelectColumn(FapresupPeer::FORDESP);

		$criteria->addSelectColumn(FapresupPeer::FORSOL);

		$criteria->addSelectColumn(FapresupPeer::TIPMON);

		$criteria->addSelectColumn(FapresupPeer::VALMON);

		$criteria->addSelectColumn(FapresupPeer::AUTPOR);

		$criteria->addSelectColumn(FapresupPeer::OBSERV);

		$criteria->addSelectColumn(FapresupPeer::CODUBI);

		$criteria->addSelectColumn(FapresupPeer::ID);

	}

	const COUNT = 'COUNT(fapresup.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fapresup.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FapresupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FapresupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FapresupPeer::doSelectRS($criteria, $con);
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
		$objects = FapresupPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FapresupPeer::populateObjects(FapresupPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FapresupPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FapresupPeer::getOMClass();
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
		return FapresupPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FapresupPeer::ID);
			$selectCriteria->add(FapresupPeer::ID, $criteria->remove(FapresupPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FapresupPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FapresupPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fapresup) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FapresupPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fapresup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FapresupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FapresupPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FapresupPeer::DATABASE_NAME, FapresupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FapresupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FapresupPeer::DATABASE_NAME);

		$criteria->add(FapresupPeer::ID, $pk);


		$v = FapresupPeer::doSelect($criteria, $con);

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
			$criteria->add(FapresupPeer::ID, $pks, Criteria::IN);
			$objs = FapresupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFapresupPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FapresupMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FapresupMapBuilder');
}
