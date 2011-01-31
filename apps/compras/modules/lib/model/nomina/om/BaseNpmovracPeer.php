<?php


abstract class BaseNpmovracPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npmovrac';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npmovrac';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NRONOM = 'npmovrac.NRONOM';

	
	const PERRAC = 'npmovrac.PERRAC';

	
	const ANORAC = 'npmovrac.ANORAC';

	
	const TIPMOV = 'npmovrac.TIPMOV';

	
	const FECMOV = 'npmovrac.FECMOV';

	
	const STATUS = 'npmovrac.STATUS';

	
	const CODCARAPR = 'npmovrac.CODCARAPR';

	
	const NOMCARAPR = 'npmovrac.NOMCARAPR';

	
	const SUECARAPR = 'npmovrac.SUECARAPR';

	
	const COMCARAPR = 'npmovrac.COMCARAPR';

	
	const CODOCPAPR = 'npmovrac.CODOCPAPR';

	
	const PASOCPAPR = 'npmovrac.PASOCPAPR';

	
	const CODEMPAPR = 'npmovrac.CODEMPAPR';

	
	const NOMEMPAPR = 'npmovrac.NOMEMPAPR';

	
	const CODCATAPR = 'npmovrac.CODCATAPR';

	
	const ESTORGAPR = 'npmovrac.ESTORGAPR';

	
	const CODCARPRO = 'npmovrac.CODCARPRO';

	
	const NOMCARPRO = 'npmovrac.NOMCARPRO';

	
	const SUECARPRO = 'npmovrac.SUECARPRO';

	
	const COMCARPRO = 'npmovrac.COMCARPRO';

	
	const CODOCPPRO = 'npmovrac.CODOCPPRO';

	
	const PASOCPPRO = 'npmovrac.PASOCPPRO';

	
	const CODEMPPRO = 'npmovrac.CODEMPPRO';

	
	const NOMEMPPRO = 'npmovrac.NOMEMPPRO';

	
	const CODCATPRO = 'npmovrac.CODCATPRO';

	
	const ESTORGPRO = 'npmovrac.ESTORGPRO';

	
	const ID = 'npmovrac.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nronom', 'Perrac', 'Anorac', 'Tipmov', 'Fecmov', 'Status', 'Codcarapr', 'Nomcarapr', 'Suecarapr', 'Comcarapr', 'Codocpapr', 'Pasocpapr', 'Codempapr', 'Nomempapr', 'Codcatapr', 'Estorgapr', 'Codcarpro', 'Nomcarpro', 'Suecarpro', 'Comcarpro', 'Codocppro', 'Pasocppro', 'Codemppro', 'Nomemppro', 'Codcatpro', 'Estorgpro', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpmovracPeer::NRONOM, NpmovracPeer::PERRAC, NpmovracPeer::ANORAC, NpmovracPeer::TIPMOV, NpmovracPeer::FECMOV, NpmovracPeer::STATUS, NpmovracPeer::CODCARAPR, NpmovracPeer::NOMCARAPR, NpmovracPeer::SUECARAPR, NpmovracPeer::COMCARAPR, NpmovracPeer::CODOCPAPR, NpmovracPeer::PASOCPAPR, NpmovracPeer::CODEMPAPR, NpmovracPeer::NOMEMPAPR, NpmovracPeer::CODCATAPR, NpmovracPeer::ESTORGAPR, NpmovracPeer::CODCARPRO, NpmovracPeer::NOMCARPRO, NpmovracPeer::SUECARPRO, NpmovracPeer::COMCARPRO, NpmovracPeer::CODOCPPRO, NpmovracPeer::PASOCPPRO, NpmovracPeer::CODEMPPRO, NpmovracPeer::NOMEMPPRO, NpmovracPeer::CODCATPRO, NpmovracPeer::ESTORGPRO, NpmovracPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nronom', 'perrac', 'anorac', 'tipmov', 'fecmov', 'status', 'codcarapr', 'nomcarapr', 'suecarapr', 'comcarapr', 'codocpapr', 'pasocpapr', 'codempapr', 'nomempapr', 'codcatapr', 'estorgapr', 'codcarpro', 'nomcarpro', 'suecarpro', 'comcarpro', 'codocppro', 'pasocppro', 'codemppro', 'nomemppro', 'codcatpro', 'estorgpro', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nronom' => 0, 'Perrac' => 1, 'Anorac' => 2, 'Tipmov' => 3, 'Fecmov' => 4, 'Status' => 5, 'Codcarapr' => 6, 'Nomcarapr' => 7, 'Suecarapr' => 8, 'Comcarapr' => 9, 'Codocpapr' => 10, 'Pasocpapr' => 11, 'Codempapr' => 12, 'Nomempapr' => 13, 'Codcatapr' => 14, 'Estorgapr' => 15, 'Codcarpro' => 16, 'Nomcarpro' => 17, 'Suecarpro' => 18, 'Comcarpro' => 19, 'Codocppro' => 20, 'Pasocppro' => 21, 'Codemppro' => 22, 'Nomemppro' => 23, 'Codcatpro' => 24, 'Estorgpro' => 25, 'Id' => 26, ),
		BasePeer::TYPE_COLNAME => array (NpmovracPeer::NRONOM => 0, NpmovracPeer::PERRAC => 1, NpmovracPeer::ANORAC => 2, NpmovracPeer::TIPMOV => 3, NpmovracPeer::FECMOV => 4, NpmovracPeer::STATUS => 5, NpmovracPeer::CODCARAPR => 6, NpmovracPeer::NOMCARAPR => 7, NpmovracPeer::SUECARAPR => 8, NpmovracPeer::COMCARAPR => 9, NpmovracPeer::CODOCPAPR => 10, NpmovracPeer::PASOCPAPR => 11, NpmovracPeer::CODEMPAPR => 12, NpmovracPeer::NOMEMPAPR => 13, NpmovracPeer::CODCATAPR => 14, NpmovracPeer::ESTORGAPR => 15, NpmovracPeer::CODCARPRO => 16, NpmovracPeer::NOMCARPRO => 17, NpmovracPeer::SUECARPRO => 18, NpmovracPeer::COMCARPRO => 19, NpmovracPeer::CODOCPPRO => 20, NpmovracPeer::PASOCPPRO => 21, NpmovracPeer::CODEMPPRO => 22, NpmovracPeer::NOMEMPPRO => 23, NpmovracPeer::CODCATPRO => 24, NpmovracPeer::ESTORGPRO => 25, NpmovracPeer::ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('nronom' => 0, 'perrac' => 1, 'anorac' => 2, 'tipmov' => 3, 'fecmov' => 4, 'status' => 5, 'codcarapr' => 6, 'nomcarapr' => 7, 'suecarapr' => 8, 'comcarapr' => 9, 'codocpapr' => 10, 'pasocpapr' => 11, 'codempapr' => 12, 'nomempapr' => 13, 'codcatapr' => 14, 'estorgapr' => 15, 'codcarpro' => 16, 'nomcarpro' => 17, 'suecarpro' => 18, 'comcarpro' => 19, 'codocppro' => 20, 'pasocppro' => 21, 'codemppro' => 22, 'nomemppro' => 23, 'codcatpro' => 24, 'estorgpro' => 25, 'id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpmovracMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpmovracMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpmovracPeer::getTableMap();
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
		return str_replace(NpmovracPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpmovracPeer::NRONOM);

		$criteria->addSelectColumn(NpmovracPeer::PERRAC);

		$criteria->addSelectColumn(NpmovracPeer::ANORAC);

		$criteria->addSelectColumn(NpmovracPeer::TIPMOV);

		$criteria->addSelectColumn(NpmovracPeer::FECMOV);

		$criteria->addSelectColumn(NpmovracPeer::STATUS);

		$criteria->addSelectColumn(NpmovracPeer::CODCARAPR);

		$criteria->addSelectColumn(NpmovracPeer::NOMCARAPR);

		$criteria->addSelectColumn(NpmovracPeer::SUECARAPR);

		$criteria->addSelectColumn(NpmovracPeer::COMCARAPR);

		$criteria->addSelectColumn(NpmovracPeer::CODOCPAPR);

		$criteria->addSelectColumn(NpmovracPeer::PASOCPAPR);

		$criteria->addSelectColumn(NpmovracPeer::CODEMPAPR);

		$criteria->addSelectColumn(NpmovracPeer::NOMEMPAPR);

		$criteria->addSelectColumn(NpmovracPeer::CODCATAPR);

		$criteria->addSelectColumn(NpmovracPeer::ESTORGAPR);

		$criteria->addSelectColumn(NpmovracPeer::CODCARPRO);

		$criteria->addSelectColumn(NpmovracPeer::NOMCARPRO);

		$criteria->addSelectColumn(NpmovracPeer::SUECARPRO);

		$criteria->addSelectColumn(NpmovracPeer::COMCARPRO);

		$criteria->addSelectColumn(NpmovracPeer::CODOCPPRO);

		$criteria->addSelectColumn(NpmovracPeer::PASOCPPRO);

		$criteria->addSelectColumn(NpmovracPeer::CODEMPPRO);

		$criteria->addSelectColumn(NpmovracPeer::NOMEMPPRO);

		$criteria->addSelectColumn(NpmovracPeer::CODCATPRO);

		$criteria->addSelectColumn(NpmovracPeer::ESTORGPRO);

		$criteria->addSelectColumn(NpmovracPeer::ID);

	}

	const COUNT = 'COUNT(npmovrac.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npmovrac.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpmovracPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpmovracPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpmovracPeer::doSelectRS($criteria, $con);
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
		$objects = NpmovracPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpmovracPeer::populateObjects(NpmovracPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpmovracPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpmovracPeer::getOMClass();
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
		return NpmovracPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpmovracPeer::ID); 

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
			$comparison = $criteria->getComparison(NpmovracPeer::ID);
			$selectCriteria->add(NpmovracPeer::ID, $criteria->remove(NpmovracPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpmovracPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpmovracPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npmovrac) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpmovracPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npmovrac $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpmovracPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpmovracPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpmovracPeer::DATABASE_NAME, NpmovracPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpmovracPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpmovracPeer::DATABASE_NAME);

		$criteria->add(NpmovracPeer::ID, $pk);


		$v = NpmovracPeer::doSelect($criteria, $con);

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
			$criteria->add(NpmovracPeer::ID, $pks, Criteria::IN);
			$objs = NpmovracPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpmovracPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpmovracMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpmovracMapBuilder');
}
