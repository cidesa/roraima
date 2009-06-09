<?php


abstract class BaseNpforcarempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npforcaremp';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npforcaremp';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCAT = 'npforcaremp.CODCAT';

	
	const CODCAR = 'npforcaremp.CODCAR';

	
	const SUEBAS = 'npforcaremp.SUEBAS';

	
	const SUPLEN = 'npforcaremp.SUPLEN';

	
	const PRIANT = 'npforcaremp.PRIANT';

	
	const HEDIUR = 'npforcaremp.HEDIUR';

	
	const PORDIU = 'npforcaremp.PORDIU';

	
	const HENOCT = 'npforcaremp.HENOCT';

	
	const PORNOC1 = 'npforcaremp.PORNOC1';

	
	const PORNOC2 = 'npforcaremp.PORNOC2';

	
	const BONVAC = 'npforcaremp.BONVAC';

	
	const CLAU74 = 'npforcaremp.CLAU74';

	
	const OTRCOM = 'npforcaremp.OTRCOM';

	
	const PRIEFI = 'npforcaremp.PRIEFI';

	
	const PRITRA = 'npforcaremp.PRITRA';

	
	const AGUINAL = 'npforcaremp.AGUINAL';

	
	const ID = 'npforcaremp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat', 'Codcar', 'Suebas', 'Suplen', 'Priant', 'Hediur', 'Pordiu', 'Henoct', 'Pornoc1', 'Pornoc2', 'Bonvac', 'Clau74', 'Otrcom', 'Priefi', 'Pritra', 'Aguinal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpforcarempPeer::CODCAT, NpforcarempPeer::CODCAR, NpforcarempPeer::SUEBAS, NpforcarempPeer::SUPLEN, NpforcarempPeer::PRIANT, NpforcarempPeer::HEDIUR, NpforcarempPeer::PORDIU, NpforcarempPeer::HENOCT, NpforcarempPeer::PORNOC1, NpforcarempPeer::PORNOC2, NpforcarempPeer::BONVAC, NpforcarempPeer::CLAU74, NpforcarempPeer::OTRCOM, NpforcarempPeer::PRIEFI, NpforcarempPeer::PRITRA, NpforcarempPeer::AGUINAL, NpforcarempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat', 'codcar', 'suebas', 'suplen', 'priant', 'hediur', 'pordiu', 'henoct', 'pornoc1', 'pornoc2', 'bonvac', 'clau74', 'otrcom', 'priefi', 'pritra', 'aguinal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcat' => 0, 'Codcar' => 1, 'Suebas' => 2, 'Suplen' => 3, 'Priant' => 4, 'Hediur' => 5, 'Pordiu' => 6, 'Henoct' => 7, 'Pornoc1' => 8, 'Pornoc2' => 9, 'Bonvac' => 10, 'Clau74' => 11, 'Otrcom' => 12, 'Priefi' => 13, 'Pritra' => 14, 'Aguinal' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (NpforcarempPeer::CODCAT => 0, NpforcarempPeer::CODCAR => 1, NpforcarempPeer::SUEBAS => 2, NpforcarempPeer::SUPLEN => 3, NpforcarempPeer::PRIANT => 4, NpforcarempPeer::HEDIUR => 5, NpforcarempPeer::PORDIU => 6, NpforcarempPeer::HENOCT => 7, NpforcarempPeer::PORNOC1 => 8, NpforcarempPeer::PORNOC2 => 9, NpforcarempPeer::BONVAC => 10, NpforcarempPeer::CLAU74 => 11, NpforcarempPeer::OTRCOM => 12, NpforcarempPeer::PRIEFI => 13, NpforcarempPeer::PRITRA => 14, NpforcarempPeer::AGUINAL => 15, NpforcarempPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('codcat' => 0, 'codcar' => 1, 'suebas' => 2, 'suplen' => 3, 'priant' => 4, 'hediur' => 5, 'pordiu' => 6, 'henoct' => 7, 'pornoc1' => 8, 'pornoc2' => 9, 'bonvac' => 10, 'clau74' => 11, 'otrcom' => 12, 'priefi' => 13, 'pritra' => 14, 'aguinal' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpforcarempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpforcarempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpforcarempPeer::getTableMap();
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
		return str_replace(NpforcarempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpforcarempPeer::CODCAT);

		$criteria->addSelectColumn(NpforcarempPeer::CODCAR);

		$criteria->addSelectColumn(NpforcarempPeer::SUEBAS);

		$criteria->addSelectColumn(NpforcarempPeer::SUPLEN);

		$criteria->addSelectColumn(NpforcarempPeer::PRIANT);

		$criteria->addSelectColumn(NpforcarempPeer::HEDIUR);

		$criteria->addSelectColumn(NpforcarempPeer::PORDIU);

		$criteria->addSelectColumn(NpforcarempPeer::HENOCT);

		$criteria->addSelectColumn(NpforcarempPeer::PORNOC1);

		$criteria->addSelectColumn(NpforcarempPeer::PORNOC2);

		$criteria->addSelectColumn(NpforcarempPeer::BONVAC);

		$criteria->addSelectColumn(NpforcarempPeer::CLAU74);

		$criteria->addSelectColumn(NpforcarempPeer::OTRCOM);

		$criteria->addSelectColumn(NpforcarempPeer::PRIEFI);

		$criteria->addSelectColumn(NpforcarempPeer::PRITRA);

		$criteria->addSelectColumn(NpforcarempPeer::AGUINAL);

		$criteria->addSelectColumn(NpforcarempPeer::ID);

	}

	const COUNT = 'COUNT(npforcaremp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npforcaremp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpforcarempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpforcarempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpforcarempPeer::doSelectRS($criteria, $con);
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
		$objects = NpforcarempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpforcarempPeer::populateObjects(NpforcarempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpforcarempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpforcarempPeer::getOMClass();
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
		return NpforcarempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpforcarempPeer::ID); 

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
			$comparison = $criteria->getComparison(NpforcarempPeer::ID);
			$selectCriteria->add(NpforcarempPeer::ID, $criteria->remove(NpforcarempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpforcarempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpforcarempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npforcaremp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpforcarempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npforcaremp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpforcarempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpforcarempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpforcarempPeer::DATABASE_NAME, NpforcarempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpforcarempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpforcarempPeer::DATABASE_NAME);

		$criteria->add(NpforcarempPeer::ID, $pk);


		$v = NpforcarempPeer::doSelect($criteria, $con);

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
			$criteria->add(NpforcarempPeer::ID, $pks, Criteria::IN);
			$objs = NpforcarempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpforcarempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpforcarempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpforcarempMapBuilder');
}
