<?php


abstract class BaseNpinffamPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinffam';

	
	const CLASS_DEFAULT = 'lib.model.Npinffam';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npinffam.CODEMP';

	
	const CEDFAM = 'npinffam.CEDFAM';

	
	const NOMFAM = 'npinffam.NOMFAM';

	
	const SEXFAM = 'npinffam.SEXFAM';

	
	const FECNAC = 'npinffam.FECNAC';

	
	const EDAFAM = 'npinffam.EDAFAM';

	
	const PARFAM = 'npinffam.PARFAM';

	
	const EDOCIV = 'npinffam.EDOCIV';

	
	const GRAINS = 'npinffam.GRAINS';

	
	const TRAOFI = 'npinffam.TRAOFI';

	
	const CODGUA = 'npinffam.CODGUA';

	
	const SEGHCM = 'npinffam.SEGHCM';

	
	const ID = 'npinffam.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Cedfam', 'Nomfam', 'Sexfam', 'Fecnac', 'Edafam', 'Parfam', 'Edociv', 'Grains', 'Traofi', 'Codgua', 'Seghcm', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinffamPeer::CODEMP, NpinffamPeer::CEDFAM, NpinffamPeer::NOMFAM, NpinffamPeer::SEXFAM, NpinffamPeer::FECNAC, NpinffamPeer::EDAFAM, NpinffamPeer::PARFAM, NpinffamPeer::EDOCIV, NpinffamPeer::GRAINS, NpinffamPeer::TRAOFI, NpinffamPeer::CODGUA, NpinffamPeer::SEGHCM, NpinffamPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'cedfam', 'nomfam', 'sexfam', 'fecnac', 'edafam', 'parfam', 'edociv', 'grains', 'traofi', 'codgua', 'seghcm', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Cedfam' => 1, 'Nomfam' => 2, 'Sexfam' => 3, 'Fecnac' => 4, 'Edafam' => 5, 'Parfam' => 6, 'Edociv' => 7, 'Grains' => 8, 'Traofi' => 9, 'Codgua' => 10, 'Seghcm' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (NpinffamPeer::CODEMP => 0, NpinffamPeer::CEDFAM => 1, NpinffamPeer::NOMFAM => 2, NpinffamPeer::SEXFAM => 3, NpinffamPeer::FECNAC => 4, NpinffamPeer::EDAFAM => 5, NpinffamPeer::PARFAM => 6, NpinffamPeer::EDOCIV => 7, NpinffamPeer::GRAINS => 8, NpinffamPeer::TRAOFI => 9, NpinffamPeer::CODGUA => 10, NpinffamPeer::SEGHCM => 11, NpinffamPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'cedfam' => 1, 'nomfam' => 2, 'sexfam' => 3, 'fecnac' => 4, 'edafam' => 5, 'parfam' => 6, 'edociv' => 7, 'grains' => 8, 'traofi' => 9, 'codgua' => 10, 'seghcm' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpinffamMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpinffamMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinffamPeer::getTableMap();
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
		return str_replace(NpinffamPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinffamPeer::CODEMP);

		$criteria->addSelectColumn(NpinffamPeer::CEDFAM);

		$criteria->addSelectColumn(NpinffamPeer::NOMFAM);

		$criteria->addSelectColumn(NpinffamPeer::SEXFAM);

		$criteria->addSelectColumn(NpinffamPeer::FECNAC);

		$criteria->addSelectColumn(NpinffamPeer::EDAFAM);

		$criteria->addSelectColumn(NpinffamPeer::PARFAM);

		$criteria->addSelectColumn(NpinffamPeer::EDOCIV);

		$criteria->addSelectColumn(NpinffamPeer::GRAINS);

		$criteria->addSelectColumn(NpinffamPeer::TRAOFI);

		$criteria->addSelectColumn(NpinffamPeer::CODGUA);

		$criteria->addSelectColumn(NpinffamPeer::SEGHCM);

		$criteria->addSelectColumn(NpinffamPeer::ID);

	}

	const COUNT = 'COUNT(npinffam.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinffam.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinffamPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinffamPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinffamPeer::doSelectRS($criteria, $con);
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
		$objects = NpinffamPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinffamPeer::populateObjects(NpinffamPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinffamPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinffamPeer::getOMClass();
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
		return NpinffamPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpinffamPeer::ID);
			$selectCriteria->add(NpinffamPeer::ID, $criteria->remove(NpinffamPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinffamPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinffam) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinffamPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npinffam $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinffamPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinffamPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinffamPeer::DATABASE_NAME, NpinffamPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinffamPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		$criteria->add(NpinffamPeer::ID, $pk);


		$v = NpinffamPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinffamPeer::ID, $pks, Criteria::IN);
			$objs = NpinffamPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinffamPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpinffamMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpinffamMapBuilder');
}
