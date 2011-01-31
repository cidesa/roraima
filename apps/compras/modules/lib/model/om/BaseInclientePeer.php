<?php


abstract class BaseInclientePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'incliente';

	
	const CLASS_DEFAULT = 'lib.model.Incliente';

	
	const NUM_COLUMNS = 41;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCLI = 'incliente.CODCLI';

	
	const NOMCLI = 'incliente.NOMCLI';

	
	const RIFCLI = 'incliente.RIFCLI';

	
	const DIRCLI = 'incliente.DIRCLI';

	
	const TELCLI = 'incliente.TELCLI';

	
	const FAXCLI = 'incliente.FAXCLI';

	
	const EMAIL = 'incliente.EMAIL';

	
	const LIMCRE = 'incliente.LIMCRE';

	
	const CODCTACON = 'incliente.CODCTACON';

	
	const CODCTAORD = 'incliente.CODCTAORD';

	
	const CODCTAPER = 'incliente.CODCTAPER';

	
	const FECREG = 'incliente.FECREG';

	
	const CIRJUD = 'incliente.CIRJUD';

	
	const REGMER = 'incliente.REGMER';

	
	const TOMREG = 'incliente.TOMREG';

	
	const FOLREG = 'incliente.FOLREG';

	
	const CAPSUS = 'incliente.CAPSUS';

	
	const CAPPAG = 'incliente.CAPPAG';

	
	const RIFREPLEG = 'incliente.RIFREPLEG';

	
	const NOMREPLEG = 'incliente.NOMREPLEG';

	
	const DIRREPLEG = 'incliente.DIRREPLEG';

	
	const TELREPLEG = 'incliente.TELREPLEG';

	
	const EMAILREPLEG = 'incliente.EMAILREPLEG';

	
	const RIFPERCON = 'incliente.RIFPERCON';

	
	const NOMPERCON = 'incliente.NOMPERCON';

	
	const DIRPERCON = 'incliente.DIRPERCON';

	
	const TELPERCON = 'incliente.TELPERCON';

	
	const EMAILPERCON = 'incliente.EMAILPERCON';

	
	const FECVENREG = 'incliente.FECVENREG';

	
	const CODGRUPREC = 'incliente.CODGRUPREC';

	
	const CTACONASOC = 'incliente.CTACONASOC';

	
	const CTAORDASOC = 'incliente.CTAORDASOC';

	
	const CTAPERASOC = 'incliente.CTAPERASOC';

	
	const CTAORDART = 'incliente.CTAORDART';

	
	const CTAPERART = 'incliente.CTAPERART';

	
	const CTAORDCONT = 'incliente.CTAORDCONT';

	
	const CTAPERCONT = 'incliente.CTAPERCONT';

	
	const NACPRO = 'incliente.NACPRO';

	
	const ACTPROF = 'incliente.ACTPROF';

	
	const CODTIPEMP = 'incliente.CODTIPEMP';

	
	const ID = 'incliente.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcli', 'Nomcli', 'Rifcli', 'Dircli', 'Telcli', 'Faxcli', 'Email', 'Limcre', 'Codctacon', 'Codctaord', 'Codctaper', 'Fecreg', 'Cirjud', 'Regmer', 'Tomreg', 'Folreg', 'Capsus', 'Cappag', 'Rifrepleg', 'Nomrepleg', 'Dirrepleg', 'Telrepleg', 'Emailrepleg', 'Rifpercon', 'Nompercon', 'Dirpercon', 'Telpercon', 'Emailpercon', 'Fecvenreg', 'Codgruprec', 'Ctaconasoc', 'Ctaordasoc', 'Ctaperasoc', 'Ctaordart', 'Ctaperart', 'Ctaordcont', 'Ctapercont', 'Nacpro', 'Actprof', 'Codtipemp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (InclientePeer::CODCLI, InclientePeer::NOMCLI, InclientePeer::RIFCLI, InclientePeer::DIRCLI, InclientePeer::TELCLI, InclientePeer::FAXCLI, InclientePeer::EMAIL, InclientePeer::LIMCRE, InclientePeer::CODCTACON, InclientePeer::CODCTAORD, InclientePeer::CODCTAPER, InclientePeer::FECREG, InclientePeer::CIRJUD, InclientePeer::REGMER, InclientePeer::TOMREG, InclientePeer::FOLREG, InclientePeer::CAPSUS, InclientePeer::CAPPAG, InclientePeer::RIFREPLEG, InclientePeer::NOMREPLEG, InclientePeer::DIRREPLEG, InclientePeer::TELREPLEG, InclientePeer::EMAILREPLEG, InclientePeer::RIFPERCON, InclientePeer::NOMPERCON, InclientePeer::DIRPERCON, InclientePeer::TELPERCON, InclientePeer::EMAILPERCON, InclientePeer::FECVENREG, InclientePeer::CODGRUPREC, InclientePeer::CTACONASOC, InclientePeer::CTAORDASOC, InclientePeer::CTAPERASOC, InclientePeer::CTAORDART, InclientePeer::CTAPERART, InclientePeer::CTAORDCONT, InclientePeer::CTAPERCONT, InclientePeer::NACPRO, InclientePeer::ACTPROF, InclientePeer::CODTIPEMP, InclientePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcli', 'nomcli', 'rifcli', 'dircli', 'telcli', 'faxcli', 'email', 'limcre', 'codctacon', 'codctaord', 'codctaper', 'fecreg', 'cirjud', 'regmer', 'tomreg', 'folreg', 'capsus', 'cappag', 'rifrepleg', 'nomrepleg', 'dirrepleg', 'telrepleg', 'emailrepleg', 'rifpercon', 'nompercon', 'dirpercon', 'telpercon', 'emailpercon', 'fecvenreg', 'codgruprec', 'ctaconasoc', 'ctaordasoc', 'ctaperasoc', 'ctaordart', 'ctaperart', 'ctaordcont', 'ctapercont', 'nacpro', 'actprof', 'codtipemp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcli' => 0, 'Nomcli' => 1, 'Rifcli' => 2, 'Dircli' => 3, 'Telcli' => 4, 'Faxcli' => 5, 'Email' => 6, 'Limcre' => 7, 'Codctacon' => 8, 'Codctaord' => 9, 'Codctaper' => 10, 'Fecreg' => 11, 'Cirjud' => 12, 'Regmer' => 13, 'Tomreg' => 14, 'Folreg' => 15, 'Capsus' => 16, 'Cappag' => 17, 'Rifrepleg' => 18, 'Nomrepleg' => 19, 'Dirrepleg' => 20, 'Telrepleg' => 21, 'Emailrepleg' => 22, 'Rifpercon' => 23, 'Nompercon' => 24, 'Dirpercon' => 25, 'Telpercon' => 26, 'Emailpercon' => 27, 'Fecvenreg' => 28, 'Codgruprec' => 29, 'Ctaconasoc' => 30, 'Ctaordasoc' => 31, 'Ctaperasoc' => 32, 'Ctaordart' => 33, 'Ctaperart' => 34, 'Ctaordcont' => 35, 'Ctapercont' => 36, 'Nacpro' => 37, 'Actprof' => 38, 'Codtipemp' => 39, 'Id' => 40, ),
		BasePeer::TYPE_COLNAME => array (InclientePeer::CODCLI => 0, InclientePeer::NOMCLI => 1, InclientePeer::RIFCLI => 2, InclientePeer::DIRCLI => 3, InclientePeer::TELCLI => 4, InclientePeer::FAXCLI => 5, InclientePeer::EMAIL => 6, InclientePeer::LIMCRE => 7, InclientePeer::CODCTACON => 8, InclientePeer::CODCTAORD => 9, InclientePeer::CODCTAPER => 10, InclientePeer::FECREG => 11, InclientePeer::CIRJUD => 12, InclientePeer::REGMER => 13, InclientePeer::TOMREG => 14, InclientePeer::FOLREG => 15, InclientePeer::CAPSUS => 16, InclientePeer::CAPPAG => 17, InclientePeer::RIFREPLEG => 18, InclientePeer::NOMREPLEG => 19, InclientePeer::DIRREPLEG => 20, InclientePeer::TELREPLEG => 21, InclientePeer::EMAILREPLEG => 22, InclientePeer::RIFPERCON => 23, InclientePeer::NOMPERCON => 24, InclientePeer::DIRPERCON => 25, InclientePeer::TELPERCON => 26, InclientePeer::EMAILPERCON => 27, InclientePeer::FECVENREG => 28, InclientePeer::CODGRUPREC => 29, InclientePeer::CTACONASOC => 30, InclientePeer::CTAORDASOC => 31, InclientePeer::CTAPERASOC => 32, InclientePeer::CTAORDART => 33, InclientePeer::CTAPERART => 34, InclientePeer::CTAORDCONT => 35, InclientePeer::CTAPERCONT => 36, InclientePeer::NACPRO => 37, InclientePeer::ACTPROF => 38, InclientePeer::CODTIPEMP => 39, InclientePeer::ID => 40, ),
		BasePeer::TYPE_FIELDNAME => array ('codcli' => 0, 'nomcli' => 1, 'rifcli' => 2, 'dircli' => 3, 'telcli' => 4, 'faxcli' => 5, 'email' => 6, 'limcre' => 7, 'codctacon' => 8, 'codctaord' => 9, 'codctaper' => 10, 'fecreg' => 11, 'cirjud' => 12, 'regmer' => 13, 'tomreg' => 14, 'folreg' => 15, 'capsus' => 16, 'cappag' => 17, 'rifrepleg' => 18, 'nomrepleg' => 19, 'dirrepleg' => 20, 'telrepleg' => 21, 'emailrepleg' => 22, 'rifpercon' => 23, 'nompercon' => 24, 'dirpercon' => 25, 'telpercon' => 26, 'emailpercon' => 27, 'fecvenreg' => 28, 'codgruprec' => 29, 'ctaconasoc' => 30, 'ctaordasoc' => 31, 'ctaperasoc' => 32, 'ctaordart' => 33, 'ctaperart' => 34, 'ctaordcont' => 35, 'ctapercont' => 36, 'nacpro' => 37, 'actprof' => 38, 'codtipemp' => 39, 'id' => 40, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InclienteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InclienteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InclientePeer::getTableMap();
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
		return str_replace(InclientePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InclientePeer::CODCLI);

		$criteria->addSelectColumn(InclientePeer::NOMCLI);

		$criteria->addSelectColumn(InclientePeer::RIFCLI);

		$criteria->addSelectColumn(InclientePeer::DIRCLI);

		$criteria->addSelectColumn(InclientePeer::TELCLI);

		$criteria->addSelectColumn(InclientePeer::FAXCLI);

		$criteria->addSelectColumn(InclientePeer::EMAIL);

		$criteria->addSelectColumn(InclientePeer::LIMCRE);

		$criteria->addSelectColumn(InclientePeer::CODCTACON);

		$criteria->addSelectColumn(InclientePeer::CODCTAORD);

		$criteria->addSelectColumn(InclientePeer::CODCTAPER);

		$criteria->addSelectColumn(InclientePeer::FECREG);

		$criteria->addSelectColumn(InclientePeer::CIRJUD);

		$criteria->addSelectColumn(InclientePeer::REGMER);

		$criteria->addSelectColumn(InclientePeer::TOMREG);

		$criteria->addSelectColumn(InclientePeer::FOLREG);

		$criteria->addSelectColumn(InclientePeer::CAPSUS);

		$criteria->addSelectColumn(InclientePeer::CAPPAG);

		$criteria->addSelectColumn(InclientePeer::RIFREPLEG);

		$criteria->addSelectColumn(InclientePeer::NOMREPLEG);

		$criteria->addSelectColumn(InclientePeer::DIRREPLEG);

		$criteria->addSelectColumn(InclientePeer::TELREPLEG);

		$criteria->addSelectColumn(InclientePeer::EMAILREPLEG);

		$criteria->addSelectColumn(InclientePeer::RIFPERCON);

		$criteria->addSelectColumn(InclientePeer::NOMPERCON);

		$criteria->addSelectColumn(InclientePeer::DIRPERCON);

		$criteria->addSelectColumn(InclientePeer::TELPERCON);

		$criteria->addSelectColumn(InclientePeer::EMAILPERCON);

		$criteria->addSelectColumn(InclientePeer::FECVENREG);

		$criteria->addSelectColumn(InclientePeer::CODGRUPREC);

		$criteria->addSelectColumn(InclientePeer::CTACONASOC);

		$criteria->addSelectColumn(InclientePeer::CTAORDASOC);

		$criteria->addSelectColumn(InclientePeer::CTAPERASOC);

		$criteria->addSelectColumn(InclientePeer::CTAORDART);

		$criteria->addSelectColumn(InclientePeer::CTAPERART);

		$criteria->addSelectColumn(InclientePeer::CTAORDCONT);

		$criteria->addSelectColumn(InclientePeer::CTAPERCONT);

		$criteria->addSelectColumn(InclientePeer::NACPRO);

		$criteria->addSelectColumn(InclientePeer::ACTPROF);

		$criteria->addSelectColumn(InclientePeer::CODTIPEMP);

		$criteria->addSelectColumn(InclientePeer::ID);

	}

	const COUNT = 'COUNT(incliente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT incliente.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InclientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InclientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InclientePeer::doSelectRS($criteria, $con);
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
		$objects = InclientePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InclientePeer::populateObjects(InclientePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InclientePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InclientePeer::getOMClass();
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
		return InclientePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(InclientePeer::ID); 

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
			$comparison = $criteria->getComparison(InclientePeer::ID);
			$selectCriteria->add(InclientePeer::ID, $criteria->remove(InclientePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InclientePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InclientePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Incliente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InclientePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Incliente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InclientePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InclientePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InclientePeer::DATABASE_NAME, InclientePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InclientePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InclientePeer::DATABASE_NAME);

		$criteria->add(InclientePeer::ID, $pk);


		$v = InclientePeer::doSelect($criteria, $con);

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
			$criteria->add(InclientePeer::ID, $pks, Criteria::IN);
			$objs = InclientePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseInclientePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InclienteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InclienteMapBuilder');
}
