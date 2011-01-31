<?php


abstract class BaseNpimppresocPeer {


	const DATABASE_NAME = 'propel';


	const TABLE_NAME = 'npimppresoc';


	const CLASS_DEFAULT = 'lib.model.nomina.Npimppresoc';


	const NUM_COLUMNS = 25;


	const NUM_LAZY_LOAD_COLUMNS = 0;



	const CODEMP = 'npimppresoc.CODEMP';


	const FECCOR = 'npimppresoc.FECCOR';


	const FECINI = 'npimppresoc.FECINI';


	const FECFIN = 'npimppresoc.FECFIN';


	const SALEMP = 'npimppresoc.SALEMP';


	const SALEMPDIA = 'npimppresoc.SALEMPDIA';


	const ALIUTI = 'npimppresoc.ALIUTI';


	const ALIBONO = 'npimppresoc.ALIBONO';


	const ALIADI = 'npimppresoc.ALIADI';


	const SALTOT = 'npimppresoc.SALTOT';


	const DIAART108 = 'npimppresoc.DIAART108';


	const CAPEMP = 'npimppresoc.CAPEMP';


	const ANTACUM = 'npimppresoc.ANTACUM';


	const VALART108 = 'npimppresoc.VALART108';


	const TASINT = 'npimppresoc.TASINT';


	const DIADIF = 'npimppresoc.DIADIF';


	const INTDEV = 'npimppresoc.INTDEV';


	const INTACUM = 'npimppresoc.INTACUM';


	const ADEANT = 'npimppresoc.ADEANT';


	const ADEPRE = 'npimppresoc.ADEPRE';


	const REGPRE = 'npimppresoc.REGPRE';


	const SALADI = 'npimppresoc.SALADI';


	const ANOSER = 'npimppresoc.ANOSER';


	const TIPO = 'npimppresoc.TIPO';


	const ID = 'npimppresoc.ID';


	private static $phpNameMap = null;



	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Feccor', 'Fecini', 'Fecfin', 'Salemp', 'Salempdia', 'Aliuti', 'Alibono', 'Aliadi', 'Saltot', 'Diaart108', 'Capemp', 'Antacum', 'Valart108', 'Tasint', 'Diadif', 'Intdev', 'Intacum', 'Adeant', 'Adepre', 'Regpre', 'Saladi', 'Anoser', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpimppresocPeer::CODEMP, NpimppresocPeer::FECCOR, NpimppresocPeer::FECINI, NpimppresocPeer::FECFIN, NpimppresocPeer::SALEMP, NpimppresocPeer::SALEMPDIA, NpimppresocPeer::ALIUTI, NpimppresocPeer::ALIBONO, NpimppresocPeer::ALIADI, NpimppresocPeer::SALTOT, NpimppresocPeer::DIAART108, NpimppresocPeer::CAPEMP, NpimppresocPeer::ANTACUM, NpimppresocPeer::VALART108, NpimppresocPeer::TASINT, NpimppresocPeer::DIADIF, NpimppresocPeer::INTDEV, NpimppresocPeer::INTACUM, NpimppresocPeer::ADEANT, NpimppresocPeer::ADEPRE, NpimppresocPeer::REGPRE, NpimppresocPeer::SALADI, NpimppresocPeer::ANOSER, NpimppresocPeer::TIPO, NpimppresocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'feccor', 'fecini', 'fecfin', 'salemp', 'salempdia', 'aliuti', 'alibono', 'aliadi', 'saltot', 'diaart108', 'capemp', 'antacum', 'valart108', 'tasint', 'diadif', 'intdev', 'intacum', 'adeant', 'adepre', 'regpre', 'saladi', 'anoser', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);


	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Feccor' => 1, 'Fecini' => 2, 'Fecfin' => 3, 'Salemp' => 4, 'Salempdia' => 5, 'Aliuti' => 6, 'Alibono' => 7, 'Aliadi' => 8, 'Saltot' => 9, 'Diaart108' => 10, 'Capemp' => 11, 'Antacum' => 12, 'Valart108' => 13, 'Tasint' => 14, 'Diadif' => 15, 'Intdev' => 16, 'Intacum' => 17, 'Adeant' => 18, 'Adepre' => 19, 'Regpre' => 20, 'Saladi' => 21, 'Anoser' => 22, 'Tipo' => 23, 'Id' => 24, ),
		BasePeer::TYPE_COLNAME => array (NpimppresocPeer::CODEMP => 0, NpimppresocPeer::FECCOR => 1, NpimppresocPeer::FECINI => 2, NpimppresocPeer::FECFIN => 3, NpimppresocPeer::SALEMP => 4, NpimppresocPeer::SALEMPDIA => 5, NpimppresocPeer::ALIUTI => 6, NpimppresocPeer::ALIBONO => 7, NpimppresocPeer::ALIADI => 8, NpimppresocPeer::SALTOT => 9, NpimppresocPeer::DIAART108 => 10, NpimppresocPeer::CAPEMP => 11, NpimppresocPeer::ANTACUM => 12, NpimppresocPeer::VALART108 => 13, NpimppresocPeer::TASINT => 14, NpimppresocPeer::DIADIF => 15, NpimppresocPeer::INTDEV => 16, NpimppresocPeer::INTACUM => 17, NpimppresocPeer::ADEANT => 18, NpimppresocPeer::ADEPRE => 19, NpimppresocPeer::REGPRE => 20, NpimppresocPeer::SALADI => 21, NpimppresocPeer::ANOSER => 22, NpimppresocPeer::TIPO => 23, NpimppresocPeer::ID => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'feccor' => 1, 'fecini' => 2, 'fecfin' => 3, 'salemp' => 4, 'salempdia' => 5, 'aliuti' => 6, 'alibono' => 7, 'aliadi' => 8, 'saltot' => 9, 'diaart108' => 10, 'capemp' => 11, 'antacum' => 12, 'valart108' => 13, 'tasint' => 14, 'diadif' => 15, 'intdev' => 16, 'intacum' => 17, 'adeant' => 18, 'adepre' => 19, 'regpre' => 20, 'saladi' => 21, 'anoser' => 22, 'tipo' => 23, 'id' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);


	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpimppresocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpimppresocMapBuilder');
	}

	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpimppresocPeer::getTableMap();
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
		return str_replace(NpimppresocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}


	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpimppresocPeer::CODEMP);

		$criteria->addSelectColumn(NpimppresocPeer::FECCOR);

		$criteria->addSelectColumn(NpimppresocPeer::FECINI);

		$criteria->addSelectColumn(NpimppresocPeer::FECFIN);

		$criteria->addSelectColumn(NpimppresocPeer::SALEMP);

		$criteria->addSelectColumn(NpimppresocPeer::SALEMPDIA);

		$criteria->addSelectColumn(NpimppresocPeer::ALIUTI);

		$criteria->addSelectColumn(NpimppresocPeer::ALIBONO);

		$criteria->addSelectColumn(NpimppresocPeer::ALIADI);

		$criteria->addSelectColumn(NpimppresocPeer::SALTOT);

		$criteria->addSelectColumn(NpimppresocPeer::DIAART108);

		$criteria->addSelectColumn(NpimppresocPeer::CAPEMP);

		$criteria->addSelectColumn(NpimppresocPeer::ANTACUM);

		$criteria->addSelectColumn(NpimppresocPeer::VALART108);

		$criteria->addSelectColumn(NpimppresocPeer::TASINT);

		$criteria->addSelectColumn(NpimppresocPeer::DIADIF);

		$criteria->addSelectColumn(NpimppresocPeer::INTDEV);

		$criteria->addSelectColumn(NpimppresocPeer::INTACUM);

		$criteria->addSelectColumn(NpimppresocPeer::ADEANT);

		$criteria->addSelectColumn(NpimppresocPeer::ADEPRE);

		$criteria->addSelectColumn(NpimppresocPeer::REGPRE);

		$criteria->addSelectColumn(NpimppresocPeer::SALADI);

		$criteria->addSelectColumn(NpimppresocPeer::ANOSER);

		$criteria->addSelectColumn(NpimppresocPeer::TIPO);

		$criteria->addSelectColumn(NpimppresocPeer::ID);

	}

	const COUNT = 'COUNT(npimppresoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npimppresoc.ID)';


	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpimppresocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpimppresocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpimppresocPeer::doSelectRS($criteria, $con);
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
		$objects = NpimppresocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}

	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpimppresocPeer::populateObjects(NpimppresocPeer::doSelectRS($criteria, $con));
	}

	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpimppresocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}

	public static function populateObjects(ResultSet $rs)
	{
		$results = array();

				$cls = NpimppresocPeer::getOMClass();
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
		return NpimppresocPeer::CLASS_DEFAULT;
	}


	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpimppresocPeer::ID);

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
			$comparison = $criteria->getComparison(NpimppresocPeer::ID);
			$selectCriteria->add(NpimppresocPeer::ID, $criteria->remove(NpimppresocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpimppresocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpimppresocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npimppresoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpimppresocPeer::ID, (array) $values, Criteria::IN);
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


	public static function doValidate(Npimppresoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpimppresocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpimppresocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpimppresocPeer::DATABASE_NAME, NpimppresocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpimppresocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpimppresocPeer::DATABASE_NAME);

		$criteria->add(NpimppresocPeer::ID, $pk);


		$v = NpimppresocPeer::doSelect($criteria, $con);

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
			$criteria->add(NpimppresocPeer::ID, $pks, Criteria::IN);
			$objs = NpimppresocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

}
if (Propel::isInit()) {
			try {
		BaseNpimppresocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpimppresocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpimppresocMapBuilder');
}
