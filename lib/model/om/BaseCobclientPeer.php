<?php


abstract class BaseCobclientPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cobclient';

	
	const CLASS_DEFAULT = 'lib.model.Cobclient';

	
	const NUM_COLUMNS = 34;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCLI = 'cobclient.CODCLI';

	
	const NOMCLI = 'cobclient.NOMCLI';

	
	const RIFCLI = 'cobclient.RIFCLI';

	
	const NITCLI = 'cobclient.NITCLI';

	
	const DIRCLI = 'cobclient.DIRCLI';

	
	const TELCLI = 'cobclient.TELCLI';

	
	const FAXCLI = 'cobclient.FAXCLI';

	
	const EMAIL = 'cobclient.EMAIL';

	
	const TIPPER = 'cobclient.TIPPER';

	
	const NACCLI = 'cobclient.NACCLI';

	
	const LIMCRE = 'cobclient.LIMCRE';

	
	const CODCTA = 'cobclient.CODCTA';

	
	const REGMER = 'cobclient.REGMER';

	
	const FECREG = 'cobclient.FECREG';

	
	const TOMREG = 'cobclient.TOMREG';

	
	const FOLREG = 'cobclient.FOLREG';

	
	const CAPSUS = 'cobclient.CAPSUS';

	
	const CAPPAG = 'cobclient.CAPPAG';

	
	const CIREPLEG = 'cobclient.CIREPLEG';

	
	const NOMREPLEG = 'cobclient.NOMREPLEG';

	
	const DIRREPLEG = 'cobclient.DIRREPLEG';

	
	const RIFFIA = 'cobclient.RIFFIA';

	
	const NOMFIA = 'cobclient.NOMFIA';

	
	const DIRFIA = 'cobclient.DIRFIA';

	
	const TELFIA = 'cobclient.TELFIA';

	
	const CODCIU = 'cobclient.CODCIU';

	
	const CODEDO = 'cobclient.CODEDO';

	
	const CODPAI = 'cobclient.CODPAI';

	
	const FECNAC = 'cobclient.FECNAC';

	
	const TIPCLI = 'cobclient.TIPCLI';

	
	const CODTIPREC = 'cobclient.CODTIPREC';

	
	const CODORDMERCON = 'cobclient.CODORDMERCON';

	
	const CODPERMERCON = 'cobclient.CODPERMERCON';

	
	const ID = 'cobclient.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcli', 'Nomcli', 'Rifcli', 'Nitcli', 'Dircli', 'Telcli', 'Faxcli', 'Email', 'Tipper', 'Naccli', 'Limcre', 'Codcta', 'Regmer', 'Fecreg', 'Tomreg', 'Folreg', 'Capsus', 'Cappag', 'Cirepleg', 'Nomrepleg', 'Dirrepleg', 'Riffia', 'Nomfia', 'Dirfia', 'Telfia', 'Codciu', 'Codedo', 'Codpai', 'Fecnac', 'Tipcli', 'Codtiprec', 'Codordmercon', 'Codpermercon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CobclientPeer::CODCLI, CobclientPeer::NOMCLI, CobclientPeer::RIFCLI, CobclientPeer::NITCLI, CobclientPeer::DIRCLI, CobclientPeer::TELCLI, CobclientPeer::FAXCLI, CobclientPeer::EMAIL, CobclientPeer::TIPPER, CobclientPeer::NACCLI, CobclientPeer::LIMCRE, CobclientPeer::CODCTA, CobclientPeer::REGMER, CobclientPeer::FECREG, CobclientPeer::TOMREG, CobclientPeer::FOLREG, CobclientPeer::CAPSUS, CobclientPeer::CAPPAG, CobclientPeer::CIREPLEG, CobclientPeer::NOMREPLEG, CobclientPeer::DIRREPLEG, CobclientPeer::RIFFIA, CobclientPeer::NOMFIA, CobclientPeer::DIRFIA, CobclientPeer::TELFIA, CobclientPeer::CODCIU, CobclientPeer::CODEDO, CobclientPeer::CODPAI, CobclientPeer::FECNAC, CobclientPeer::TIPCLI, CobclientPeer::CODTIPREC, CobclientPeer::CODORDMERCON, CobclientPeer::CODPERMERCON, CobclientPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcli', 'nomcli', 'rifcli', 'nitcli', 'dircli', 'telcli', 'faxcli', 'email', 'tipper', 'naccli', 'limcre', 'codcta', 'regmer', 'fecreg', 'tomreg', 'folreg', 'capsus', 'cappag', 'cirepleg', 'nomrepleg', 'dirrepleg', 'riffia', 'nomfia', 'dirfia', 'telfia', 'codciu', 'codedo', 'codpai', 'fecnac', 'tipcli', 'codtiprec', 'codordmercon', 'codpermercon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcli' => 0, 'Nomcli' => 1, 'Rifcli' => 2, 'Nitcli' => 3, 'Dircli' => 4, 'Telcli' => 5, 'Faxcli' => 6, 'Email' => 7, 'Tipper' => 8, 'Naccli' => 9, 'Limcre' => 10, 'Codcta' => 11, 'Regmer' => 12, 'Fecreg' => 13, 'Tomreg' => 14, 'Folreg' => 15, 'Capsus' => 16, 'Cappag' => 17, 'Cirepleg' => 18, 'Nomrepleg' => 19, 'Dirrepleg' => 20, 'Riffia' => 21, 'Nomfia' => 22, 'Dirfia' => 23, 'Telfia' => 24, 'Codciu' => 25, 'Codedo' => 26, 'Codpai' => 27, 'Fecnac' => 28, 'Tipcli' => 29, 'Codtiprec' => 30, 'Codordmercon' => 31, 'Codpermercon' => 32, 'Id' => 33, ),
		BasePeer::TYPE_COLNAME => array (CobclientPeer::CODCLI => 0, CobclientPeer::NOMCLI => 1, CobclientPeer::RIFCLI => 2, CobclientPeer::NITCLI => 3, CobclientPeer::DIRCLI => 4, CobclientPeer::TELCLI => 5, CobclientPeer::FAXCLI => 6, CobclientPeer::EMAIL => 7, CobclientPeer::TIPPER => 8, CobclientPeer::NACCLI => 9, CobclientPeer::LIMCRE => 10, CobclientPeer::CODCTA => 11, CobclientPeer::REGMER => 12, CobclientPeer::FECREG => 13, CobclientPeer::TOMREG => 14, CobclientPeer::FOLREG => 15, CobclientPeer::CAPSUS => 16, CobclientPeer::CAPPAG => 17, CobclientPeer::CIREPLEG => 18, CobclientPeer::NOMREPLEG => 19, CobclientPeer::DIRREPLEG => 20, CobclientPeer::RIFFIA => 21, CobclientPeer::NOMFIA => 22, CobclientPeer::DIRFIA => 23, CobclientPeer::TELFIA => 24, CobclientPeer::CODCIU => 25, CobclientPeer::CODEDO => 26, CobclientPeer::CODPAI => 27, CobclientPeer::FECNAC => 28, CobclientPeer::TIPCLI => 29, CobclientPeer::CODTIPREC => 30, CobclientPeer::CODORDMERCON => 31, CobclientPeer::CODPERMERCON => 32, CobclientPeer::ID => 33, ),
		BasePeer::TYPE_FIELDNAME => array ('codcli' => 0, 'nomcli' => 1, 'rifcli' => 2, 'nitcli' => 3, 'dircli' => 4, 'telcli' => 5, 'faxcli' => 6, 'email' => 7, 'tipper' => 8, 'naccli' => 9, 'limcre' => 10, 'codcta' => 11, 'regmer' => 12, 'fecreg' => 13, 'tomreg' => 14, 'folreg' => 15, 'capsus' => 16, 'cappag' => 17, 'cirepleg' => 18, 'nomrepleg' => 19, 'dirrepleg' => 20, 'riffia' => 21, 'nomfia' => 22, 'dirfia' => 23, 'telfia' => 24, 'codciu' => 25, 'codedo' => 26, 'codpai' => 27, 'fecnac' => 28, 'tipcli' => 29, 'codtiprec' => 30, 'codordmercon' => 31, 'codpermercon' => 32, 'id' => 33, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CobclientMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CobclientMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CobclientPeer::getTableMap();
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
		return str_replace(CobclientPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CobclientPeer::CODCLI);

		$criteria->addSelectColumn(CobclientPeer::NOMCLI);

		$criteria->addSelectColumn(CobclientPeer::RIFCLI);

		$criteria->addSelectColumn(CobclientPeer::NITCLI);

		$criteria->addSelectColumn(CobclientPeer::DIRCLI);

		$criteria->addSelectColumn(CobclientPeer::TELCLI);

		$criteria->addSelectColumn(CobclientPeer::FAXCLI);

		$criteria->addSelectColumn(CobclientPeer::EMAIL);

		$criteria->addSelectColumn(CobclientPeer::TIPPER);

		$criteria->addSelectColumn(CobclientPeer::NACCLI);

		$criteria->addSelectColumn(CobclientPeer::LIMCRE);

		$criteria->addSelectColumn(CobclientPeer::CODCTA);

		$criteria->addSelectColumn(CobclientPeer::REGMER);

		$criteria->addSelectColumn(CobclientPeer::FECREG);

		$criteria->addSelectColumn(CobclientPeer::TOMREG);

		$criteria->addSelectColumn(CobclientPeer::FOLREG);

		$criteria->addSelectColumn(CobclientPeer::CAPSUS);

		$criteria->addSelectColumn(CobclientPeer::CAPPAG);

		$criteria->addSelectColumn(CobclientPeer::CIREPLEG);

		$criteria->addSelectColumn(CobclientPeer::NOMREPLEG);

		$criteria->addSelectColumn(CobclientPeer::DIRREPLEG);

		$criteria->addSelectColumn(CobclientPeer::RIFFIA);

		$criteria->addSelectColumn(CobclientPeer::NOMFIA);

		$criteria->addSelectColumn(CobclientPeer::DIRFIA);

		$criteria->addSelectColumn(CobclientPeer::TELFIA);

		$criteria->addSelectColumn(CobclientPeer::CODCIU);

		$criteria->addSelectColumn(CobclientPeer::CODEDO);

		$criteria->addSelectColumn(CobclientPeer::CODPAI);

		$criteria->addSelectColumn(CobclientPeer::FECNAC);

		$criteria->addSelectColumn(CobclientPeer::TIPCLI);

		$criteria->addSelectColumn(CobclientPeer::CODTIPREC);

		$criteria->addSelectColumn(CobclientPeer::CODORDMERCON);

		$criteria->addSelectColumn(CobclientPeer::CODPERMERCON);

		$criteria->addSelectColumn(CobclientPeer::ID);

	}

	const COUNT = 'COUNT(cobclient.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cobclient.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobclientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobclientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CobclientPeer::doSelectRS($criteria, $con);
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
		$objects = CobclientPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CobclientPeer::populateObjects(CobclientPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CobclientPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CobclientPeer::getOMClass();
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
		return CobclientPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CobclientPeer::ID); 

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
			$comparison = $criteria->getComparison(CobclientPeer::ID);
			$selectCriteria->add(CobclientPeer::ID, $criteria->remove(CobclientPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CobclientPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CobclientPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cobclient) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CobclientPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cobclient $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CobclientPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CobclientPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CobclientPeer::DATABASE_NAME, CobclientPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CobclientPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CobclientPeer::DATABASE_NAME);

		$criteria->add(CobclientPeer::ID, $pk);


		$v = CobclientPeer::doSelect($criteria, $con);

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
			$criteria->add(CobclientPeer::ID, $pks, Criteria::IN);
			$objs = CobclientPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCobclientPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CobclientMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CobclientMapBuilder');
}
