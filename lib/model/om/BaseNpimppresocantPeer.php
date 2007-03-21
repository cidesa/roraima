<?php


abstract class BaseNpimppresocantPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npimppresocant';

	
	const CLASS_DEFAULT = 'lib.model.Npimppresocant';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npimppresocant.CODEMP';

	
	const FECCOR = 'npimppresocant.FECCOR';

	
	const FECINI = 'npimppresocant.FECINI';

	
	const FECFIN = 'npimppresocant.FECFIN';

	
	const SALEMP = 'npimppresocant.SALEMP';

	
	const TASINT = 'npimppresocant.TASINT';

	
	const CAPEMP = 'npimppresocant.CAPEMP';

	
	const INTDEV = 'npimppresocant.INTDEV';

	
	const ANTACUM = 'npimppresocant.ANTACUM';

	
	const ANOSER = 'npimppresocant.ANOSER';

	
	const ADEANT = 'npimppresocant.ADEANT';

	
	const INTACUM = 'npimppresocant.INTACUM';

	
	const DIADIF = 'npimppresocant.DIADIF';

	
	const REGPRE = 'npimppresocant.REGPRE';

	
	const DIAART108 = 'npimppresocant.DIAART108';

	
	const VALART108 = 'npimppresocant.VALART108';

	
	const ADEPRE = 'npimppresocant.ADEPRE';

	
	const ID = 'npimppresocant.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Feccor', 'Fecini', 'Fecfin', 'Salemp', 'Tasint', 'Capemp', 'Intdev', 'Antacum', 'Anoser', 'Adeant', 'Intacum', 'Diadif', 'Regpre', 'Diaart108', 'Valart108', 'Adepre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpimppresocantPeer::CODEMP, NpimppresocantPeer::FECCOR, NpimppresocantPeer::FECINI, NpimppresocantPeer::FECFIN, NpimppresocantPeer::SALEMP, NpimppresocantPeer::TASINT, NpimppresocantPeer::CAPEMP, NpimppresocantPeer::INTDEV, NpimppresocantPeer::ANTACUM, NpimppresocantPeer::ANOSER, NpimppresocantPeer::ADEANT, NpimppresocantPeer::INTACUM, NpimppresocantPeer::DIADIF, NpimppresocantPeer::REGPRE, NpimppresocantPeer::DIAART108, NpimppresocantPeer::VALART108, NpimppresocantPeer::ADEPRE, NpimppresocantPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'feccor', 'fecini', 'fecfin', 'salemp', 'tasint', 'capemp', 'intdev', 'antacum', 'anoser', 'adeant', 'intacum', 'diadif', 'regpre', 'diaart108', 'valart108', 'adepre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Feccor' => 1, 'Fecini' => 2, 'Fecfin' => 3, 'Salemp' => 4, 'Tasint' => 5, 'Capemp' => 6, 'Intdev' => 7, 'Antacum' => 8, 'Anoser' => 9, 'Adeant' => 10, 'Intacum' => 11, 'Diadif' => 12, 'Regpre' => 13, 'Diaart108' => 14, 'Valart108' => 15, 'Adepre' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (NpimppresocantPeer::CODEMP => 0, NpimppresocantPeer::FECCOR => 1, NpimppresocantPeer::FECINI => 2, NpimppresocantPeer::FECFIN => 3, NpimppresocantPeer::SALEMP => 4, NpimppresocantPeer::TASINT => 5, NpimppresocantPeer::CAPEMP => 6, NpimppresocantPeer::INTDEV => 7, NpimppresocantPeer::ANTACUM => 8, NpimppresocantPeer::ANOSER => 9, NpimppresocantPeer::ADEANT => 10, NpimppresocantPeer::INTACUM => 11, NpimppresocantPeer::DIADIF => 12, NpimppresocantPeer::REGPRE => 13, NpimppresocantPeer::DIAART108 => 14, NpimppresocantPeer::VALART108 => 15, NpimppresocantPeer::ADEPRE => 16, NpimppresocantPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'feccor' => 1, 'fecini' => 2, 'fecfin' => 3, 'salemp' => 4, 'tasint' => 5, 'capemp' => 6, 'intdev' => 7, 'antacum' => 8, 'anoser' => 9, 'adeant' => 10, 'intacum' => 11, 'diadif' => 12, 'regpre' => 13, 'diaart108' => 14, 'valart108' => 15, 'adepre' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpimppresocantMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpimppresocantMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpimppresocantPeer::getTableMap();
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
		return str_replace(NpimppresocantPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpimppresocantPeer::CODEMP);

		$criteria->addSelectColumn(NpimppresocantPeer::FECCOR);

		$criteria->addSelectColumn(NpimppresocantPeer::FECINI);

		$criteria->addSelectColumn(NpimppresocantPeer::FECFIN);

		$criteria->addSelectColumn(NpimppresocantPeer::SALEMP);

		$criteria->addSelectColumn(NpimppresocantPeer::TASINT);

		$criteria->addSelectColumn(NpimppresocantPeer::CAPEMP);

		$criteria->addSelectColumn(NpimppresocantPeer::INTDEV);

		$criteria->addSelectColumn(NpimppresocantPeer::ANTACUM);

		$criteria->addSelectColumn(NpimppresocantPeer::ANOSER);

		$criteria->addSelectColumn(NpimppresocantPeer::ADEANT);

		$criteria->addSelectColumn(NpimppresocantPeer::INTACUM);

		$criteria->addSelectColumn(NpimppresocantPeer::DIADIF);

		$criteria->addSelectColumn(NpimppresocantPeer::REGPRE);

		$criteria->addSelectColumn(NpimppresocantPeer::DIAART108);

		$criteria->addSelectColumn(NpimppresocantPeer::VALART108);

		$criteria->addSelectColumn(NpimppresocantPeer::ADEPRE);

		$criteria->addSelectColumn(NpimppresocantPeer::ID);

	}

	const COUNT = 'COUNT(npimppresocant.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npimppresocant.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpimppresocantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpimppresocantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpimppresocantPeer::doSelectRS($criteria, $con);
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
		$objects = NpimppresocantPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpimppresocantPeer::populateObjects(NpimppresocantPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpimppresocantPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpimppresocantPeer::getOMClass();
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
		return NpimppresocantPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpimppresocantPeer::ID);
			$selectCriteria->add(NpimppresocantPeer::ID, $criteria->remove(NpimppresocantPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpimppresocantPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpimppresocantPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npimppresocant) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpimppresocantPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npimppresocant $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpimppresocantPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpimppresocantPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpimppresocantPeer::DATABASE_NAME, NpimppresocantPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpimppresocantPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpimppresocantPeer::DATABASE_NAME);

		$criteria->add(NpimppresocantPeer::ID, $pk);


		$v = NpimppresocantPeer::doSelect($criteria, $con);

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
			$criteria->add(NpimppresocantPeer::ID, $pks, Criteria::IN);
			$objs = NpimppresocantPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpimppresocantPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpimppresocantMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpimppresocantMapBuilder');
}
