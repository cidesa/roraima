<?php


abstract class BaseNpdefespparprePeer {


	const DATABASE_NAME = 'propel';


	const TABLE_NAME = 'npdefespparpre';


	const CLASS_DEFAULT = 'lib.model.nomina.Npdefespparpre';


	const NUM_COLUMNS = 19;


	const NUM_LAZY_LOAD_COLUMNS = 0;



	const CODNOM = 'npdefespparpre.CODNOM';


	const NUMDIAMES = 'npdefespparpre.NUMDIAMES';


	const NUMDIAMAXANO = 'npdefespparpre.NUMDIAMAXANO';


	const TIPSALAJUNODEP = 'npdefespparpre.TIPSALAJUNODEP';


	const TIPSALBONFINANOFRA = 'npdefespparpre.TIPSALBONFINANOFRA';


	const FACTORBONFINANOFRA = 'npdefespparpre.FACTORBONFINANOFRA';


	const TIPSALBONVACFRA = 'npdefespparpre.TIPSALBONVACFRA';


	const FACTORBONVACFRA = 'npdefespparpre.FACTORBONVACFRA';


	const TIPSALVACVEN = 'npdefespparpre.TIPSALVACVEN';


	const FACTORVACVEN = 'npdefespparpre.FACTORVACVEN';


	const DESCRIPCLAU = 'npdefespparpre.DESCRIPCLAU';


	const CODRET = 'npdefespparpre.CODRET';


	const NUMDIAANT = 'npdefespparpre.NUMDIAANT';


	const PORANOANT = 'npdefespparpre.PORANOANT';


	const TIPSALDIAANT = 'npdefespparpre.TIPSALDIAANT';


	const CODPAR = 'npdefespparpre.CODPAR';


	const AGUICOM = 'npdefespparpre.AGUICOM';


	const APARTIRMES = 'npdefespparpre.APARTIRMES';


	const ID = 'npdefespparpre.ID';


	private static $phpNameMap = null;



	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Numdiames', 'Numdiamaxano', 'Tipsalajunodep', 'Tipsalbonfinanofra', 'Factorbonfinanofra', 'Tipsalbonvacfra', 'Factorbonvacfra', 'Tipsalvacven', 'Factorvacven', 'Descripclau', 'Codret', 'Numdiaant', 'Poranoant', 'Tipsaldiaant', 'Codpar', 'Aguicom', 'Apartirmes', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpdefespparprePeer::CODNOM, NpdefespparprePeer::NUMDIAMES, NpdefespparprePeer::NUMDIAMAXANO, NpdefespparprePeer::TIPSALAJUNODEP, NpdefespparprePeer::TIPSALBONFINANOFRA, NpdefespparprePeer::FACTORBONFINANOFRA, NpdefespparprePeer::TIPSALBONVACFRA, NpdefespparprePeer::FACTORBONVACFRA, NpdefespparprePeer::TIPSALVACVEN, NpdefespparprePeer::FACTORVACVEN, NpdefespparprePeer::DESCRIPCLAU, NpdefespparprePeer::CODRET, NpdefespparprePeer::NUMDIAANT, NpdefespparprePeer::PORANOANT, NpdefespparprePeer::TIPSALDIAANT, NpdefespparprePeer::CODPAR, NpdefespparprePeer::AGUICOM, NpdefespparprePeer::APARTIRMES, NpdefespparprePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'numdiames', 'numdiamaxano', 'tipsalajunodep', 'tipsalbonfinanofra', 'factorbonfinanofra', 'tipsalbonvacfra', 'factorbonvacfra', 'tipsalvacven', 'factorvacven', 'descripclau', 'codret', 'numdiaant', 'poranoant', 'tipsaldiaant', 'codpar', 'aguicom', 'apartirmes', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);


	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Numdiames' => 1, 'Numdiamaxano' => 2, 'Tipsalajunodep' => 3, 'Tipsalbonfinanofra' => 4, 'Factorbonfinanofra' => 5, 'Tipsalbonvacfra' => 6, 'Factorbonvacfra' => 7, 'Tipsalvacven' => 8, 'Factorvacven' => 9, 'Descripclau' => 10, 'Codret' => 11, 'Numdiaant' => 12, 'Poranoant' => 13, 'Tipsaldiaant' => 14, 'Codpar' => 15, 'Aguicom' => 16, 'Apartirmes' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (NpdefespparprePeer::CODNOM => 0, NpdefespparprePeer::NUMDIAMES => 1, NpdefespparprePeer::NUMDIAMAXANO => 2, NpdefespparprePeer::TIPSALAJUNODEP => 3, NpdefespparprePeer::TIPSALBONFINANOFRA => 4, NpdefespparprePeer::FACTORBONFINANOFRA => 5, NpdefespparprePeer::TIPSALBONVACFRA => 6, NpdefespparprePeer::FACTORBONVACFRA => 7, NpdefespparprePeer::TIPSALVACVEN => 8, NpdefespparprePeer::FACTORVACVEN => 9, NpdefespparprePeer::DESCRIPCLAU => 10, NpdefespparprePeer::CODRET => 11, NpdefespparprePeer::NUMDIAANT => 12, NpdefespparprePeer::PORANOANT => 13, NpdefespparprePeer::TIPSALDIAANT => 14, NpdefespparprePeer::CODPAR => 15, NpdefespparprePeer::AGUICOM => 16, NpdefespparprePeer::APARTIRMES => 17, NpdefespparprePeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'numdiames' => 1, 'numdiamaxano' => 2, 'tipsalajunodep' => 3, 'tipsalbonfinanofra' => 4, 'factorbonfinanofra' => 5, 'tipsalbonvacfra' => 6, 'factorbonvacfra' => 7, 'tipsalvacven' => 8, 'factorvacven' => 9, 'descripclau' => 10, 'codret' => 11, 'numdiaant' => 12, 'poranoant' => 13, 'tipsaldiaant' => 14, 'codpar' => 15, 'aguicom' => 16, 'apartirmes' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);


	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpdefespparpreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpdefespparpreMapBuilder');
	}

	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpdefespparprePeer::getTableMap();
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
		return str_replace(NpdefespparprePeer::TABLE_NAME.'.', $alias.'.', $column);
	}


	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpdefespparprePeer::CODNOM);

		$criteria->addSelectColumn(NpdefespparprePeer::NUMDIAMES);

		$criteria->addSelectColumn(NpdefespparprePeer::NUMDIAMAXANO);

		$criteria->addSelectColumn(NpdefespparprePeer::TIPSALAJUNODEP);

		$criteria->addSelectColumn(NpdefespparprePeer::TIPSALBONFINANOFRA);

		$criteria->addSelectColumn(NpdefespparprePeer::FACTORBONFINANOFRA);

		$criteria->addSelectColumn(NpdefespparprePeer::TIPSALBONVACFRA);

		$criteria->addSelectColumn(NpdefespparprePeer::FACTORBONVACFRA);

		$criteria->addSelectColumn(NpdefespparprePeer::TIPSALVACVEN);

		$criteria->addSelectColumn(NpdefespparprePeer::FACTORVACVEN);

		$criteria->addSelectColumn(NpdefespparprePeer::DESCRIPCLAU);

		$criteria->addSelectColumn(NpdefespparprePeer::CODRET);

		$criteria->addSelectColumn(NpdefespparprePeer::NUMDIAANT);

		$criteria->addSelectColumn(NpdefespparprePeer::PORANOANT);

		$criteria->addSelectColumn(NpdefespparprePeer::TIPSALDIAANT);

		$criteria->addSelectColumn(NpdefespparprePeer::CODPAR);

		$criteria->addSelectColumn(NpdefespparprePeer::AGUICOM);

		$criteria->addSelectColumn(NpdefespparprePeer::APARTIRMES);

		$criteria->addSelectColumn(NpdefespparprePeer::ID);

	}

	const COUNT = 'COUNT(npdefespparpre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npdefespparpre.ID)';


	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpdefespparprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpdefespparprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpdefespparprePeer::doSelectRS($criteria, $con);
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
		$objects = NpdefespparprePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}

	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpdefespparprePeer::populateObjects(NpdefespparprePeer::doSelectRS($criteria, $con));
	}

	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpdefespparprePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}

	public static function populateObjects(ResultSet $rs)
	{
		$results = array();

				$cls = NpdefespparprePeer::getOMClass();
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
		return NpdefespparprePeer::CLASS_DEFAULT;
	}


	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpdefespparprePeer::ID);

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
			$comparison = $criteria->getComparison(NpdefespparprePeer::ID);
			$selectCriteria->add(NpdefespparprePeer::ID, $criteria->remove(NpdefespparprePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpdefespparprePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpdefespparprePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npdefespparpre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpdefespparprePeer::ID, (array) $values, Criteria::IN);
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


	public static function doValidate(Npdefespparpre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpdefespparprePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpdefespparprePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpdefespparprePeer::DATABASE_NAME, NpdefespparprePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpdefespparprePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpdefespparprePeer::DATABASE_NAME);

		$criteria->add(NpdefespparprePeer::ID, $pk);


		$v = NpdefespparprePeer::doSelect($criteria, $con);

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
			$criteria->add(NpdefespparprePeer::ID, $pks, Criteria::IN);
			$objs = NpdefespparprePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

}
if (Propel::isInit()) {
			try {
		BaseNpdefespparprePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpdefespparpreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpdefespparpreMapBuilder');
}
