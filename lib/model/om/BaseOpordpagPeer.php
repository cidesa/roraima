<?php


abstract class BaseOpordpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opordpag';

	
	const CLASS_DEFAULT = 'lib.model.Opordpag';

	
	const NUM_COLUMNS = 68;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'opordpag.NUMORD';

	
	const TIPCAU = 'opordpag.TIPCAU';

	
	const FECEMI = 'opordpag.FECEMI';

	
	const CEDRIF = 'opordpag.CEDRIF';

	
	const NOMBEN = 'opordpag.NOMBEN';

	
	const MONORD = 'opordpag.MONORD';

	
	const DESORD = 'opordpag.DESORD';

	
	const MONDES = 'opordpag.MONDES';

	
	const MONRET = 'opordpag.MONRET';

	
	const NUMCHE = 'opordpag.NUMCHE';

	
	const CTABAN = 'opordpag.CTABAN';

	
	const CTAPAG = 'opordpag.CTAPAG';

	
	const NUMCOM = 'opordpag.NUMCOM';

	
	const STATUS = 'opordpag.STATUS';

	
	const CODUNI = 'opordpag.CODUNI';

	
	const FECENVCON = 'opordpag.FECENVCON';

	
	const FECENVFIN = 'opordpag.FECENVFIN';

	
	const CTAPAGFIN = 'opordpag.CTAPAGFIN';

	
	const OBSORD = 'opordpag.OBSORD';

	
	const FECVEN = 'opordpag.FECVEN';

	
	const FECANU = 'opordpag.FECANU';

	
	const DESANU = 'opordpag.DESANU';

	
	const MONPAG = 'opordpag.MONPAG';

	
	const APROBA = 'opordpag.APROBA';

	
	const NOMBENSUS = 'opordpag.NOMBENSUS';

	
	const FECRECFIN = 'opordpag.FECRECFIN';

	
	const ANOPRE = 'opordpag.ANOPRE';

	
	const FECPAG = 'opordpag.FECPAG';

	
	const NUMTIQ = 'opordpag.NUMTIQ';

	
	const PERAUT = 'opordpag.PERAUT';

	
	const CEDAUT = 'opordpag.CEDAUT';

	
	const NOMPER2 = 'opordpag.NOMPER2';

	
	const NOMPER1 = 'opordpag.NOMPER1';

	
	const HORCON = 'opordpag.HORCON';

	
	const FECCON = 'opordpag.FECCON';

	
	const NOMCAT = 'opordpag.NOMCAT';

	
	const NUMFAC = 'opordpag.NUMFAC';

	
	const NUMCONFAC = 'opordpag.NUMCONFAC';

	
	const NUMCORFAC = 'opordpag.NUMCORFAC';

	
	const FECHAFAC = 'opordpag.FECHAFAC';

	
	const FECFAC = 'opordpag.FECFAC';

	
	const TIPFIN = 'opordpag.TIPFIN';

	
	const COMRET = 'opordpag.COMRET';

	
	const FECCOMRET = 'opordpag.FECCOMRET';

	
	const COMRETISLR = 'opordpag.COMRETISLR';

	
	const FECCOMRETISLR = 'opordpag.FECCOMRETISLR';

	
	const COMRETLTF = 'opordpag.COMRETLTF';

	
	const FECCOMRETLTF = 'opordpag.FECCOMRETLTF';

	
	const NUMSIGECOF = 'opordpag.NUMSIGECOF';

	
	const FECSIGECOF = 'opordpag.FECSIGECOF';

	
	const EXPSIGECOF = 'opordpag.EXPSIGECOF';

	
	const APROBADOORD = 'opordpag.APROBADOORD';

	
	const CODMOTANU = 'opordpag.CODMOTANU';

	
	const USUANU = 'opordpag.USUANU';

	
	const APROBADOTES = 'opordpag.APROBADOTES';

	
	const FECRET = 'opordpag.FECRET';

	
	const NUMCUE = 'opordpag.NUMCUE';

	
	const NUMCOMAPR = 'opordpag.NUMCOMAPR';

	
	const CODCONCEPTO = 'opordpag.CODCONCEPTO';

	
	const NUMFORPRE = 'opordpag.NUMFORPRE';

	
	const MOTRECORD = 'opordpag.MOTRECORD';

	
	const MOTRECTES = 'opordpag.MOTRECTES';

	
	const APRORDDIR = 'opordpag.APRORDDIR';

	
	const CODCAJCHI = 'opordpag.CODCAJCHI';

	
	const NUMCTA = 'opordpag.NUMCTA';


	const TIPDOC = 'opordpag.TIPDOC';


	const LOGUSE = 'opordpag.LOGUSE';

	
	const ID = 'opordpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Tipcau', 'Fecemi', 'Cedrif', 'Nomben', 'Monord', 'Desord', 'Mondes', 'Monret', 'Numche', 'Ctaban', 'Ctapag', 'Numcom', 'Status', 'Coduni', 'Fecenvcon', 'Fecenvfin', 'Ctapagfin', 'Obsord', 'Fecven', 'Fecanu', 'Desanu', 'Monpag', 'Aproba', 'Nombensus', 'Fecrecfin', 'Anopre', 'Fecpag', 'Numtiq', 'Peraut', 'Cedaut', 'Nomper2', 'Nomper1', 'Horcon', 'Feccon', 'Nomcat', 'Numfac', 'Numconfac', 'Numcorfac', 'Fechafac', 'Fecfac', 'Tipfin', 'Comret', 'Feccomret', 'Comretislr', 'Feccomretislr', 'Comretltf', 'Feccomretltf', 'Numsigecof', 'Fecsigecof', 'Expsigecof', 'Aprobadoord', 'Codmotanu', 'Usuanu', 'Aprobadotes', 'Fecret', 'Numcue', 'Numcomapr', 'Codconcepto', 'Numforpre', 'Motrecord', 'Motrectes', 'Aprorddir', 'Codcajchi', 'Numcta', 'Tipdoc', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpordpagPeer::NUMORD, OpordpagPeer::TIPCAU, OpordpagPeer::FECEMI, OpordpagPeer::CEDRIF, OpordpagPeer::NOMBEN, OpordpagPeer::MONORD, OpordpagPeer::DESORD, OpordpagPeer::MONDES, OpordpagPeer::MONRET, OpordpagPeer::NUMCHE, OpordpagPeer::CTABAN, OpordpagPeer::CTAPAG, OpordpagPeer::NUMCOM, OpordpagPeer::STATUS, OpordpagPeer::CODUNI, OpordpagPeer::FECENVCON, OpordpagPeer::FECENVFIN, OpordpagPeer::CTAPAGFIN, OpordpagPeer::OBSORD, OpordpagPeer::FECVEN, OpordpagPeer::FECANU, OpordpagPeer::DESANU, OpordpagPeer::MONPAG, OpordpagPeer::APROBA, OpordpagPeer::NOMBENSUS, OpordpagPeer::FECRECFIN, OpordpagPeer::ANOPRE, OpordpagPeer::FECPAG, OpordpagPeer::NUMTIQ, OpordpagPeer::PERAUT, OpordpagPeer::CEDAUT, OpordpagPeer::NOMPER2, OpordpagPeer::NOMPER1, OpordpagPeer::HORCON, OpordpagPeer::FECCON, OpordpagPeer::NOMCAT, OpordpagPeer::NUMFAC, OpordpagPeer::NUMCONFAC, OpordpagPeer::NUMCORFAC, OpordpagPeer::FECHAFAC, OpordpagPeer::FECFAC, OpordpagPeer::TIPFIN, OpordpagPeer::COMRET, OpordpagPeer::FECCOMRET, OpordpagPeer::COMRETISLR, OpordpagPeer::FECCOMRETISLR, OpordpagPeer::COMRETLTF, OpordpagPeer::FECCOMRETLTF, OpordpagPeer::NUMSIGECOF, OpordpagPeer::FECSIGECOF, OpordpagPeer::EXPSIGECOF, OpordpagPeer::APROBADOORD, OpordpagPeer::CODMOTANU, OpordpagPeer::USUANU, OpordpagPeer::APROBADOTES, OpordpagPeer::FECRET, OpordpagPeer::NUMCUE, OpordpagPeer::NUMCOMAPR, OpordpagPeer::CODCONCEPTO, OpordpagPeer::NUMFORPRE, OpordpagPeer::MOTRECORD, OpordpagPeer::MOTRECTES, OpordpagPeer::APRORDDIR, OpordpagPeer::CODCAJCHI, OpordpagPeer::NUMCTA, OpordpagPeer::TIPDOC, OpordpagPeer::LOGUSE, OpordpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'tipcau', 'fecemi', 'cedrif', 'nomben', 'monord', 'desord', 'mondes', 'monret', 'numche', 'ctaban', 'ctapag', 'numcom', 'status', 'coduni', 'fecenvcon', 'fecenvfin', 'ctapagfin', 'obsord', 'fecven', 'fecanu', 'desanu', 'monpag', 'aproba', 'nombensus', 'fecrecfin', 'anopre', 'fecpag', 'numtiq', 'peraut', 'cedaut', 'nomper2', 'nomper1', 'horcon', 'feccon', 'nomcat', 'numfac', 'numconfac', 'numcorfac', 'fechafac', 'fecfac', 'tipfin', 'comret', 'feccomret', 'comretislr', 'feccomretislr', 'comretltf', 'feccomretltf', 'numsigecof', 'fecsigecof', 'expsigecof', 'aprobadoord', 'codmotanu', 'usuanu', 'aprobadotes', 'fecret', 'numcue', 'numcomapr', 'codconcepto', 'numforpre', 'motrecord', 'motrectes', 'aprorddir', 'codcajchi', 'numcta', 'tipdoc', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Tipcau' => 1, 'Fecemi' => 2, 'Cedrif' => 3, 'Nomben' => 4, 'Monord' => 5, 'Desord' => 6, 'Mondes' => 7, 'Monret' => 8, 'Numche' => 9, 'Ctaban' => 10, 'Ctapag' => 11, 'Numcom' => 12, 'Status' => 13, 'Coduni' => 14, 'Fecenvcon' => 15, 'Fecenvfin' => 16, 'Ctapagfin' => 17, 'Obsord' => 18, 'Fecven' => 19, 'Fecanu' => 20, 'Desanu' => 21, 'Monpag' => 22, 'Aproba' => 23, 'Nombensus' => 24, 'Fecrecfin' => 25, 'Anopre' => 26, 'Fecpag' => 27, 'Numtiq' => 28, 'Peraut' => 29, 'Cedaut' => 30, 'Nomper2' => 31, 'Nomper1' => 32, 'Horcon' => 33, 'Feccon' => 34, 'Nomcat' => 35, 'Numfac' => 36, 'Numconfac' => 37, 'Numcorfac' => 38, 'Fechafac' => 39, 'Fecfac' => 40, 'Tipfin' => 41, 'Comret' => 42, 'Feccomret' => 43, 'Comretislr' => 44, 'Feccomretislr' => 45, 'Comretltf' => 46, 'Feccomretltf' => 47, 'Numsigecof' => 48, 'Fecsigecof' => 49, 'Expsigecof' => 50, 'Aprobadoord' => 51, 'Codmotanu' => 52, 'Usuanu' => 53, 'Aprobadotes' => 54, 'Fecret' => 55, 'Numcue' => 56, 'Numcomapr' => 57, 'Codconcepto' => 58, 'Numforpre' => 59, 'Motrecord' => 60, 'Motrectes' => 61, 'Aprorddir' => 62, 'Codcajchi' => 63, 'Numcta' => 64, 'Tipdoc' => 65, 'Loguse' => 66, 'Id' => 67, ),
		BasePeer::TYPE_COLNAME => array (OpordpagPeer::NUMORD => 0, OpordpagPeer::TIPCAU => 1, OpordpagPeer::FECEMI => 2, OpordpagPeer::CEDRIF => 3, OpordpagPeer::NOMBEN => 4, OpordpagPeer::MONORD => 5, OpordpagPeer::DESORD => 6, OpordpagPeer::MONDES => 7, OpordpagPeer::MONRET => 8, OpordpagPeer::NUMCHE => 9, OpordpagPeer::CTABAN => 10, OpordpagPeer::CTAPAG => 11, OpordpagPeer::NUMCOM => 12, OpordpagPeer::STATUS => 13, OpordpagPeer::CODUNI => 14, OpordpagPeer::FECENVCON => 15, OpordpagPeer::FECENVFIN => 16, OpordpagPeer::CTAPAGFIN => 17, OpordpagPeer::OBSORD => 18, OpordpagPeer::FECVEN => 19, OpordpagPeer::FECANU => 20, OpordpagPeer::DESANU => 21, OpordpagPeer::MONPAG => 22, OpordpagPeer::APROBA => 23, OpordpagPeer::NOMBENSUS => 24, OpordpagPeer::FECRECFIN => 25, OpordpagPeer::ANOPRE => 26, OpordpagPeer::FECPAG => 27, OpordpagPeer::NUMTIQ => 28, OpordpagPeer::PERAUT => 29, OpordpagPeer::CEDAUT => 30, OpordpagPeer::NOMPER2 => 31, OpordpagPeer::NOMPER1 => 32, OpordpagPeer::HORCON => 33, OpordpagPeer::FECCON => 34, OpordpagPeer::NOMCAT => 35, OpordpagPeer::NUMFAC => 36, OpordpagPeer::NUMCONFAC => 37, OpordpagPeer::NUMCORFAC => 38, OpordpagPeer::FECHAFAC => 39, OpordpagPeer::FECFAC => 40, OpordpagPeer::TIPFIN => 41, OpordpagPeer::COMRET => 42, OpordpagPeer::FECCOMRET => 43, OpordpagPeer::COMRETISLR => 44, OpordpagPeer::FECCOMRETISLR => 45, OpordpagPeer::COMRETLTF => 46, OpordpagPeer::FECCOMRETLTF => 47, OpordpagPeer::NUMSIGECOF => 48, OpordpagPeer::FECSIGECOF => 49, OpordpagPeer::EXPSIGECOF => 50, OpordpagPeer::APROBADOORD => 51, OpordpagPeer::CODMOTANU => 52, OpordpagPeer::USUANU => 53, OpordpagPeer::APROBADOTES => 54, OpordpagPeer::FECRET => 55, OpordpagPeer::NUMCUE => 56, OpordpagPeer::NUMCOMAPR => 57, OpordpagPeer::CODCONCEPTO => 58, OpordpagPeer::NUMFORPRE => 59, OpordpagPeer::MOTRECORD => 60, OpordpagPeer::MOTRECTES => 61, OpordpagPeer::APRORDDIR => 62, OpordpagPeer::CODCAJCHI => 63, OpordpagPeer::NUMCTA => 64, OpordpagPeer::TIPDOC => 65, OpordpagPeer::LOGUSE => 66, OpordpagPeer::ID => 67, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'tipcau' => 1, 'fecemi' => 2, 'cedrif' => 3, 'nomben' => 4, 'monord' => 5, 'desord' => 6, 'mondes' => 7, 'monret' => 8, 'numche' => 9, 'ctaban' => 10, 'ctapag' => 11, 'numcom' => 12, 'status' => 13, 'coduni' => 14, 'fecenvcon' => 15, 'fecenvfin' => 16, 'ctapagfin' => 17, 'obsord' => 18, 'fecven' => 19, 'fecanu' => 20, 'desanu' => 21, 'monpag' => 22, 'aproba' => 23, 'nombensus' => 24, 'fecrecfin' => 25, 'anopre' => 26, 'fecpag' => 27, 'numtiq' => 28, 'peraut' => 29, 'cedaut' => 30, 'nomper2' => 31, 'nomper1' => 32, 'horcon' => 33, 'feccon' => 34, 'nomcat' => 35, 'numfac' => 36, 'numconfac' => 37, 'numcorfac' => 38, 'fechafac' => 39, 'fecfac' => 40, 'tipfin' => 41, 'comret' => 42, 'feccomret' => 43, 'comretislr' => 44, 'feccomretislr' => 45, 'comretltf' => 46, 'feccomretltf' => 47, 'numsigecof' => 48, 'fecsigecof' => 49, 'expsigecof' => 50, 'aprobadoord' => 51, 'codmotanu' => 52, 'usuanu' => 53, 'aprobadotes' => 54, 'fecret' => 55, 'numcue' => 56, 'numcomapr' => 57, 'codconcepto' => 58, 'numforpre' => 59, 'motrecord' => 60, 'motrectes' => 61, 'aprorddir' => 62, 'codcajchi' => 63, 'numcta' => 64, 'tipdoc' => 65, 'loguse' => 66, 'id' => 67, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpordpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpordpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpordpagPeer::getTableMap();
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
		return str_replace(OpordpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpordpagPeer::NUMORD);

		$criteria->addSelectColumn(OpordpagPeer::TIPCAU);

		$criteria->addSelectColumn(OpordpagPeer::FECEMI);

		$criteria->addSelectColumn(OpordpagPeer::CEDRIF);

		$criteria->addSelectColumn(OpordpagPeer::NOMBEN);

		$criteria->addSelectColumn(OpordpagPeer::MONORD);

		$criteria->addSelectColumn(OpordpagPeer::DESORD);

		$criteria->addSelectColumn(OpordpagPeer::MONDES);

		$criteria->addSelectColumn(OpordpagPeer::MONRET);

		$criteria->addSelectColumn(OpordpagPeer::NUMCHE);

		$criteria->addSelectColumn(OpordpagPeer::CTABAN);

		$criteria->addSelectColumn(OpordpagPeer::CTAPAG);

		$criteria->addSelectColumn(OpordpagPeer::NUMCOM);

		$criteria->addSelectColumn(OpordpagPeer::STATUS);

		$criteria->addSelectColumn(OpordpagPeer::CODUNI);

		$criteria->addSelectColumn(OpordpagPeer::FECENVCON);

		$criteria->addSelectColumn(OpordpagPeer::FECENVFIN);

		$criteria->addSelectColumn(OpordpagPeer::CTAPAGFIN);

		$criteria->addSelectColumn(OpordpagPeer::OBSORD);

		$criteria->addSelectColumn(OpordpagPeer::FECVEN);

		$criteria->addSelectColumn(OpordpagPeer::FECANU);

		$criteria->addSelectColumn(OpordpagPeer::DESANU);

		$criteria->addSelectColumn(OpordpagPeer::MONPAG);

		$criteria->addSelectColumn(OpordpagPeer::APROBA);

		$criteria->addSelectColumn(OpordpagPeer::NOMBENSUS);

		$criteria->addSelectColumn(OpordpagPeer::FECRECFIN);

		$criteria->addSelectColumn(OpordpagPeer::ANOPRE);

		$criteria->addSelectColumn(OpordpagPeer::FECPAG);

		$criteria->addSelectColumn(OpordpagPeer::NUMTIQ);

		$criteria->addSelectColumn(OpordpagPeer::PERAUT);

		$criteria->addSelectColumn(OpordpagPeer::CEDAUT);

		$criteria->addSelectColumn(OpordpagPeer::NOMPER2);

		$criteria->addSelectColumn(OpordpagPeer::NOMPER1);

		$criteria->addSelectColumn(OpordpagPeer::HORCON);

		$criteria->addSelectColumn(OpordpagPeer::FECCON);

		$criteria->addSelectColumn(OpordpagPeer::NOMCAT);

		$criteria->addSelectColumn(OpordpagPeer::NUMFAC);

		$criteria->addSelectColumn(OpordpagPeer::NUMCONFAC);

		$criteria->addSelectColumn(OpordpagPeer::NUMCORFAC);

		$criteria->addSelectColumn(OpordpagPeer::FECHAFAC);

		$criteria->addSelectColumn(OpordpagPeer::FECFAC);

		$criteria->addSelectColumn(OpordpagPeer::TIPFIN);

		$criteria->addSelectColumn(OpordpagPeer::COMRET);

		$criteria->addSelectColumn(OpordpagPeer::FECCOMRET);

		$criteria->addSelectColumn(OpordpagPeer::COMRETISLR);

		$criteria->addSelectColumn(OpordpagPeer::FECCOMRETISLR);

		$criteria->addSelectColumn(OpordpagPeer::COMRETLTF);

		$criteria->addSelectColumn(OpordpagPeer::FECCOMRETLTF);

		$criteria->addSelectColumn(OpordpagPeer::NUMSIGECOF);

		$criteria->addSelectColumn(OpordpagPeer::FECSIGECOF);

		$criteria->addSelectColumn(OpordpagPeer::EXPSIGECOF);

		$criteria->addSelectColumn(OpordpagPeer::APROBADOORD);

		$criteria->addSelectColumn(OpordpagPeer::CODMOTANU);

		$criteria->addSelectColumn(OpordpagPeer::USUANU);

		$criteria->addSelectColumn(OpordpagPeer::APROBADOTES);

		$criteria->addSelectColumn(OpordpagPeer::FECRET);

		$criteria->addSelectColumn(OpordpagPeer::NUMCUE);

		$criteria->addSelectColumn(OpordpagPeer::NUMCOMAPR);

		$criteria->addSelectColumn(OpordpagPeer::CODCONCEPTO);

		$criteria->addSelectColumn(OpordpagPeer::NUMFORPRE);

		$criteria->addSelectColumn(OpordpagPeer::MOTRECORD);

		$criteria->addSelectColumn(OpordpagPeer::MOTRECTES);

		$criteria->addSelectColumn(OpordpagPeer::APRORDDIR);

		$criteria->addSelectColumn(OpordpagPeer::CODCAJCHI);

		$criteria->addSelectColumn(OpordpagPeer::NUMCTA);

		$criteria->addSelectColumn(OpordpagPeer::TIPDOC);

		$criteria->addSelectColumn(OpordpagPeer::LOGUSE);

		$criteria->addSelectColumn(OpordpagPeer::ID);

	}

	const COUNT = 'COUNT(opordpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opordpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpordpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpordpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpordpagPeer::doSelectRS($criteria, $con);
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
		$objects = OpordpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpordpagPeer::populateObjects(OpordpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpordpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpordpagPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinOpbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpordpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpordpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpordpagPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = OpordpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpordpagPeer::addSelectColumns($c);
		$startcol = (OpordpagPeer::NUM_COLUMNS - OpordpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpbenefiPeer::addSelectColumns($c);

		$c->addJoin(OpordpagPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpordpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OpbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOpbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addOpordpag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initOpordpags();
				$obj2->addOpordpag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpordpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpordpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpordpagPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = OpordpagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpordpagPeer::addSelectColumns($c);
		$startcol2 = (OpordpagPeer::NUM_COLUMNS - OpordpagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		OpbenefiPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + OpbenefiPeer::NUM_COLUMNS;

		$c->addJoin(OpordpagPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpordpagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = OpbenefiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getOpbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addOpordpag($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initOpordpags();
				$obj2->addOpordpag($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return OpordpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpordpagPeer::ID); 

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
			$comparison = $criteria->getComparison(OpordpagPeer::ID);
			$selectCriteria->add(OpordpagPeer::ID, $criteria->remove(OpordpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpordpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpordpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opordpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpordpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opordpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpordpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpordpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpordpagPeer::DATABASE_NAME, OpordpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpordpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpordpagPeer::DATABASE_NAME);

		$criteria->add(OpordpagPeer::ID, $pk);


		$v = OpordpagPeer::doSelect($criteria, $con);

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
			$criteria->add(OpordpagPeer::ID, $pks, Criteria::IN);
			$objs = OpordpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpordpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpordpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpordpagMapBuilder');
}
