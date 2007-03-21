<?php


abstract class BaseOcproveePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocprovee';

	
	const CLASS_DEFAULT = 'lib.model.Ocprovee';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'ocprovee.CODPRO';

	
	const NOMPRO = 'ocprovee.NOMPRO';

	
	const RIFPRO = 'ocprovee.RIFPRO';

	
	const NITPRO = 'ocprovee.NITPRO';

	
	const DIRPRO = 'ocprovee.DIRPRO';

	
	const TELPRO = 'ocprovee.TELPRO';

	
	const FAXPRO = 'ocprovee.FAXPRO';

	
	const EMAIL = 'ocprovee.EMAIL';

	
	const LIMCRE = 'ocprovee.LIMCRE';

	
	const CODCTA = 'ocprovee.CODCTA';

	
	const REGMER = 'ocprovee.REGMER';

	
	const FECREG = 'ocprovee.FECREG';

	
	const TOMREG = 'ocprovee.TOMREG';

	
	const FOLREG = 'ocprovee.FOLREG';

	
	const CAPSUS = 'ocprovee.CAPSUS';

	
	const CAPPAG = 'ocprovee.CAPPAG';

	
	const RIFREPLEG = 'ocprovee.RIFREPLEG';

	
	const NOMREPLEG = 'ocprovee.NOMREPLEG';

	
	const DIRREPLEG = 'ocprovee.DIRREPLEG';

	
	const FECINSCIR = 'ocprovee.FECINSCIR';

	
	const NUMINSCIR = 'ocprovee.NUMINSCIR';

	
	const NACPRO = 'ocprovee.NACPRO';

	
	const CODORD = 'ocprovee.CODORD';

	
	const CODPERCON = 'ocprovee.CODPERCON';

	
	const CODTIPREC = 'ocprovee.CODTIPREC';

	
	const CODRAM = 'ocprovee.CODRAM';

	
	const NROCEI = 'ocprovee.NROCEI';

	
	const ID = 'ocprovee.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Nompro', 'Rifpro', 'Nitpro', 'Dirpro', 'Telpro', 'Faxpro', 'Email', 'Limcre', 'Codcta', 'Regmer', 'Fecreg', 'Tomreg', 'Folreg', 'Capsus', 'Cappag', 'Rifrepleg', 'Nomrepleg', 'Dirrepleg', 'Fecinscir', 'Numinscir', 'Nacpro', 'Codord', 'Codpercon', 'Codtiprec', 'Codram', 'Nrocei', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcproveePeer::CODPRO, OcproveePeer::NOMPRO, OcproveePeer::RIFPRO, OcproveePeer::NITPRO, OcproveePeer::DIRPRO, OcproveePeer::TELPRO, OcproveePeer::FAXPRO, OcproveePeer::EMAIL, OcproveePeer::LIMCRE, OcproveePeer::CODCTA, OcproveePeer::REGMER, OcproveePeer::FECREG, OcproveePeer::TOMREG, OcproveePeer::FOLREG, OcproveePeer::CAPSUS, OcproveePeer::CAPPAG, OcproveePeer::RIFREPLEG, OcproveePeer::NOMREPLEG, OcproveePeer::DIRREPLEG, OcproveePeer::FECINSCIR, OcproveePeer::NUMINSCIR, OcproveePeer::NACPRO, OcproveePeer::CODORD, OcproveePeer::CODPERCON, OcproveePeer::CODTIPREC, OcproveePeer::CODRAM, OcproveePeer::NROCEI, OcproveePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'nompro', 'rifpro', 'nitpro', 'dirpro', 'telpro', 'faxpro', 'email', 'limcre', 'codcta', 'regmer', 'fecreg', 'tomreg', 'folreg', 'capsus', 'cappag', 'rifrepleg', 'nomrepleg', 'dirrepleg', 'fecinscir', 'numinscir', 'nacpro', 'codord', 'codpercon', 'codtiprec', 'codram', 'nrocei', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Nompro' => 1, 'Rifpro' => 2, 'Nitpro' => 3, 'Dirpro' => 4, 'Telpro' => 5, 'Faxpro' => 6, 'Email' => 7, 'Limcre' => 8, 'Codcta' => 9, 'Regmer' => 10, 'Fecreg' => 11, 'Tomreg' => 12, 'Folreg' => 13, 'Capsus' => 14, 'Cappag' => 15, 'Rifrepleg' => 16, 'Nomrepleg' => 17, 'Dirrepleg' => 18, 'Fecinscir' => 19, 'Numinscir' => 20, 'Nacpro' => 21, 'Codord' => 22, 'Codpercon' => 23, 'Codtiprec' => 24, 'Codram' => 25, 'Nrocei' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (OcproveePeer::CODPRO => 0, OcproveePeer::NOMPRO => 1, OcproveePeer::RIFPRO => 2, OcproveePeer::NITPRO => 3, OcproveePeer::DIRPRO => 4, OcproveePeer::TELPRO => 5, OcproveePeer::FAXPRO => 6, OcproveePeer::EMAIL => 7, OcproveePeer::LIMCRE => 8, OcproveePeer::CODCTA => 9, OcproveePeer::REGMER => 10, OcproveePeer::FECREG => 11, OcproveePeer::TOMREG => 12, OcproveePeer::FOLREG => 13, OcproveePeer::CAPSUS => 14, OcproveePeer::CAPPAG => 15, OcproveePeer::RIFREPLEG => 16, OcproveePeer::NOMREPLEG => 17, OcproveePeer::DIRREPLEG => 18, OcproveePeer::FECINSCIR => 19, OcproveePeer::NUMINSCIR => 20, OcproveePeer::NACPRO => 21, OcproveePeer::CODORD => 22, OcproveePeer::CODPERCON => 23, OcproveePeer::CODTIPREC => 24, OcproveePeer::CODRAM => 25, OcproveePeer::NROCEI => 26, OcproveePeer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'nompro' => 1, 'rifpro' => 2, 'nitpro' => 3, 'dirpro' => 4, 'telpro' => 5, 'faxpro' => 6, 'email' => 7, 'limcre' => 8, 'codcta' => 9, 'regmer' => 10, 'fecreg' => 11, 'tomreg' => 12, 'folreg' => 13, 'capsus' => 14, 'cappag' => 15, 'rifrepleg' => 16, 'nomrepleg' => 17, 'dirrepleg' => 18, 'fecinscir' => 19, 'numinscir' => 20, 'nacpro' => 21, 'codord' => 22, 'codpercon' => 23, 'codtiprec' => 24, 'codram' => 25, 'nrocei' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcproveeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcproveeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcproveePeer::getTableMap();
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
		return str_replace(OcproveePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcproveePeer::CODPRO);

		$criteria->addSelectColumn(OcproveePeer::NOMPRO);

		$criteria->addSelectColumn(OcproveePeer::RIFPRO);

		$criteria->addSelectColumn(OcproveePeer::NITPRO);

		$criteria->addSelectColumn(OcproveePeer::DIRPRO);

		$criteria->addSelectColumn(OcproveePeer::TELPRO);

		$criteria->addSelectColumn(OcproveePeer::FAXPRO);

		$criteria->addSelectColumn(OcproveePeer::EMAIL);

		$criteria->addSelectColumn(OcproveePeer::LIMCRE);

		$criteria->addSelectColumn(OcproveePeer::CODCTA);

		$criteria->addSelectColumn(OcproveePeer::REGMER);

		$criteria->addSelectColumn(OcproveePeer::FECREG);

		$criteria->addSelectColumn(OcproveePeer::TOMREG);

		$criteria->addSelectColumn(OcproveePeer::FOLREG);

		$criteria->addSelectColumn(OcproveePeer::CAPSUS);

		$criteria->addSelectColumn(OcproveePeer::CAPPAG);

		$criteria->addSelectColumn(OcproveePeer::RIFREPLEG);

		$criteria->addSelectColumn(OcproveePeer::NOMREPLEG);

		$criteria->addSelectColumn(OcproveePeer::DIRREPLEG);

		$criteria->addSelectColumn(OcproveePeer::FECINSCIR);

		$criteria->addSelectColumn(OcproveePeer::NUMINSCIR);

		$criteria->addSelectColumn(OcproveePeer::NACPRO);

		$criteria->addSelectColumn(OcproveePeer::CODORD);

		$criteria->addSelectColumn(OcproveePeer::CODPERCON);

		$criteria->addSelectColumn(OcproveePeer::CODTIPREC);

		$criteria->addSelectColumn(OcproveePeer::CODRAM);

		$criteria->addSelectColumn(OcproveePeer::NROCEI);

		$criteria->addSelectColumn(OcproveePeer::ID);

	}

	const COUNT = 'COUNT(ocprovee.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocprovee.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcproveePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcproveePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcproveePeer::doSelectRS($criteria, $con);
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
		$objects = OcproveePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcproveePeer::populateObjects(OcproveePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcproveePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcproveePeer::getOMClass();
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
		return OcproveePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(OcproveePeer::ID);
			$selectCriteria->add(OcproveePeer::ID, $criteria->remove(OcproveePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcproveePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcproveePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocprovee) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcproveePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocprovee $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcproveePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcproveePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcproveePeer::DATABASE_NAME, OcproveePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcproveePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcproveePeer::DATABASE_NAME);

		$criteria->add(OcproveePeer::ID, $pk);


		$v = OcproveePeer::doSelect($criteria, $con);

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
			$criteria->add(OcproveePeer::ID, $pks, Criteria::IN);
			$objs = OcproveePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcproveePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcproveeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcproveeMapBuilder');
}
