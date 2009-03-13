<?php


abstract class BaseFordetpryaccespmetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordetpryaccespmet';

	
	const CLASS_DEFAULT = 'lib.model.Fordetpryaccespmet';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'fordetpryaccespmet.CODPRO';

	
	const CODACCESP = 'fordetpryaccespmet.CODACCESP';

	
	const CODMET = 'fordetpryaccespmet.CODMET';

	
	const CODUNIEJE = 'fordetpryaccespmet.CODUNIEJE';

	
	const CODPAR = 'fordetpryaccespmet.CODPAR';

	
	const CODPRE = 'fordetpryaccespmet.CODPRE';

	
	const DISPER = 'fordetpryaccespmet.DISPER';

	
	const MONPRE = 'fordetpryaccespmet.MONPRE';

	
	const CODFIN = 'fordetpryaccespmet.CODFIN';

	
	const FECINI = 'fordetpryaccespmet.FECINI';

	
	const FECCUL = 'fordetpryaccespmet.FECCUL';

	
	const UBIGEO = 'fordetpryaccespmet.UBIGEO';

	
	const POBAPX = 'fordetpryaccespmet.POBAPX';

	
	const OBSERV = 'fordetpryaccespmet.OBSERV';

	
	const CODACT = 'fordetpryaccespmet.CODACT';

	
	const JUSINS = 'fordetpryaccespmet.JUSINS';

	
	const CANINS = 'fordetpryaccespmet.CANINS';

	
	const CANINSREP = 'fordetpryaccespmet.CANINSREP';

	
	const MONPREREP = 'fordetpryaccespmet.MONPREREP';

	
	const CODTIP = 'fordetpryaccespmet.CODTIP';

	
	const ID = 'fordetpryaccespmet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Codaccesp', 'Codmet', 'Codunieje', 'Codpar', 'Codpre', 'Disper', 'Monpre', 'Codfin', 'Fecini', 'Feccul', 'Ubigeo', 'Pobapx', 'Observ', 'Codact', 'Jusins', 'Canins', 'Caninsrep', 'Monprerep', 'Codtip', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordetpryaccespmetPeer::CODPRO, FordetpryaccespmetPeer::CODACCESP, FordetpryaccespmetPeer::CODMET, FordetpryaccespmetPeer::CODUNIEJE, FordetpryaccespmetPeer::CODPAR, FordetpryaccespmetPeer::CODPRE, FordetpryaccespmetPeer::DISPER, FordetpryaccespmetPeer::MONPRE, FordetpryaccespmetPeer::CODFIN, FordetpryaccespmetPeer::FECINI, FordetpryaccespmetPeer::FECCUL, FordetpryaccespmetPeer::UBIGEO, FordetpryaccespmetPeer::POBAPX, FordetpryaccespmetPeer::OBSERV, FordetpryaccespmetPeer::CODACT, FordetpryaccespmetPeer::JUSINS, FordetpryaccespmetPeer::CANINS, FordetpryaccespmetPeer::CANINSREP, FordetpryaccespmetPeer::MONPREREP, FordetpryaccespmetPeer::CODTIP, FordetpryaccespmetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'codaccesp', 'codmet', 'codunieje', 'codpar', 'codpre', 'disper', 'monpre', 'codfin', 'fecini', 'feccul', 'ubigeo', 'pobapx', 'observ', 'codact', 'jusins', 'canins', 'caninsrep', 'monprerep', 'codtip', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Codaccesp' => 1, 'Codmet' => 2, 'Codunieje' => 3, 'Codpar' => 4, 'Codpre' => 5, 'Disper' => 6, 'Monpre' => 7, 'Codfin' => 8, 'Fecini' => 9, 'Feccul' => 10, 'Ubigeo' => 11, 'Pobapx' => 12, 'Observ' => 13, 'Codact' => 14, 'Jusins' => 15, 'Canins' => 16, 'Caninsrep' => 17, 'Monprerep' => 18, 'Codtip' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (FordetpryaccespmetPeer::CODPRO => 0, FordetpryaccespmetPeer::CODACCESP => 1, FordetpryaccespmetPeer::CODMET => 2, FordetpryaccespmetPeer::CODUNIEJE => 3, FordetpryaccespmetPeer::CODPAR => 4, FordetpryaccespmetPeer::CODPRE => 5, FordetpryaccespmetPeer::DISPER => 6, FordetpryaccespmetPeer::MONPRE => 7, FordetpryaccespmetPeer::CODFIN => 8, FordetpryaccespmetPeer::FECINI => 9, FordetpryaccespmetPeer::FECCUL => 10, FordetpryaccespmetPeer::UBIGEO => 11, FordetpryaccespmetPeer::POBAPX => 12, FordetpryaccespmetPeer::OBSERV => 13, FordetpryaccespmetPeer::CODACT => 14, FordetpryaccespmetPeer::JUSINS => 15, FordetpryaccespmetPeer::CANINS => 16, FordetpryaccespmetPeer::CANINSREP => 17, FordetpryaccespmetPeer::MONPREREP => 18, FordetpryaccespmetPeer::CODTIP => 19, FordetpryaccespmetPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'codaccesp' => 1, 'codmet' => 2, 'codunieje' => 3, 'codpar' => 4, 'codpre' => 5, 'disper' => 6, 'monpre' => 7, 'codfin' => 8, 'fecini' => 9, 'feccul' => 10, 'ubigeo' => 11, 'pobapx' => 12, 'observ' => 13, 'codact' => 14, 'jusins' => 15, 'canins' => 16, 'caninsrep' => 17, 'monprerep' => 18, 'codtip' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordetpryaccespmetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordetpryaccespmetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordetpryaccespmetPeer::getTableMap();
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
		return str_replace(FordetpryaccespmetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODPRO);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODACCESP);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODMET);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODUNIEJE);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODPAR);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODPRE);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::DISPER);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::MONPRE);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODFIN);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::FECINI);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::FECCUL);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::UBIGEO);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::POBAPX);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::OBSERV);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODACT);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::JUSINS);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CANINS);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CANINSREP);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::MONPREREP);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::CODTIP);

		$criteria->addSelectColumn(FordetpryaccespmetPeer::ID);

	}

	const COUNT = 'COUNT(fordetpryaccespmet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordetpryaccespmet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordetpryaccespmetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordetpryaccespmetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordetpryaccespmetPeer::doSelectRS($criteria, $con);
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
		$objects = FordetpryaccespmetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordetpryaccespmetPeer::populateObjects(FordetpryaccespmetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordetpryaccespmetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordetpryaccespmetPeer::getOMClass();
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
		return FordetpryaccespmetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FordetpryaccespmetPeer::ID); 

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
			$comparison = $criteria->getComparison(FordetpryaccespmetPeer::ID);
			$selectCriteria->add(FordetpryaccespmetPeer::ID, $criteria->remove(FordetpryaccespmetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordetpryaccespmetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordetpryaccespmetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordetpryaccespmet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordetpryaccespmetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordetpryaccespmet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordetpryaccespmetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordetpryaccespmetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordetpryaccespmetPeer::DATABASE_NAME, FordetpryaccespmetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordetpryaccespmetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordetpryaccespmetPeer::DATABASE_NAME);

		$criteria->add(FordetpryaccespmetPeer::ID, $pk);


		$v = FordetpryaccespmetPeer::doSelect($criteria, $con);

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
			$criteria->add(FordetpryaccespmetPeer::ID, $pks, Criteria::IN);
			$objs = FordetpryaccespmetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordetpryaccespmetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordetpryaccespmetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordetpryaccespmetMapBuilder');
}
