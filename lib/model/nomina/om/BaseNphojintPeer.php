<?php


abstract class BaseNphojintPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphojint';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Nphojint';

	
	const NUM_COLUMNS = 102;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'nphojint.CODEMP';

	
	const RIFEMP = 'nphojint.RIFEMP';

	
	const NOMEMP = 'nphojint.NOMEMP';

	
	const CEDEMP = 'nphojint.CEDEMP';

	
	const NUMCON = 'nphojint.NUMCON';

	
	const EDOCIV = 'nphojint.EDOCIV';

	
	const NACEMP = 'nphojint.NACEMP';

	
	const SEXEMP = 'nphojint.SEXEMP';

	
	const FECNAC = 'nphojint.FECNAC';

	
	const EDAEMP = 'nphojint.EDAEMP';

	
	const LUGNAC = 'nphojint.LUGNAC';

	
	const DIRHAB = 'nphojint.DIRHAB';

	
	const CODCIU = 'nphojint.CODCIU';

	
	const TELHAB = 'nphojint.TELHAB';

	
	const CELEMP = 'nphojint.CELEMP';

	
	const EMAEMP = 'nphojint.EMAEMP';

	
	const CODPOS = 'nphojint.CODPOS';

	
	const TALPAN = 'nphojint.TALPAN';

	
	const TALCAM = 'nphojint.TALCAM';

	
	const TALCAL = 'nphojint.TALCAL';

	
	const DERZUR = 'nphojint.DERZUR';

	
	const FECING = 'nphojint.FECING';

	
	const FECRET = 'nphojint.FECRET';

	
	const FECREI = 'nphojint.FECREI';

	
	const FECADMPUB = 'nphojint.FECADMPUB';

	
	const STAEMP = 'nphojint.STAEMP';

	
	const FOTEMP = 'nphojint.FOTEMP';

	
	const NUMSSO = 'nphojint.NUMSSO';

	
	const NUMPOLSEG = 'nphojint.NUMPOLSEG';

	
	const FECCOTSSO = 'nphojint.FECCOTSSO';

	
	const ANOADMPUB = 'nphojint.ANOADMPUB';

	
	const CODTIPPAG = 'nphojint.CODTIPPAG';

	
	const CODBAN = 'nphojint.CODBAN';

	
	const TIPCUE = 'nphojint.TIPCUE';

	
	const NUMCUE = 'nphojint.NUMCUE';

	
	const OBSEMP = 'nphojint.OBSEMP';

	
	const TIEFID = 'nphojint.TIEFID';

	
	const GRULAB = 'nphojint.GRULAB';

	
	const GRUOTR = 'nphojint.GRUOTR';

	
	const TRASLADO = 'nphojint.TRASLADO';

	
	const TRAOTR = 'nphojint.TRAOTR';

	
	const TIPVIV = 'nphojint.TIPVIV';

	
	const VIVOTR = 'nphojint.VIVOTR';

	
	const FORTEN = 'nphojint.FORTEN';

	
	const TENOTR = 'nphojint.TENOTR';

	
	const SERCON = 'nphojint.SERCON';

	
	const DIROTR = 'nphojint.DIROTR';

	
	const TELOTR = 'nphojint.TELOTR';

	
	const CODPAI = 'nphojint.CODPAI';

	
	const CODPA2 = 'nphojint.CODPA2';

	
	const CODEST = 'nphojint.CODEST';

	
	const CODES2 = 'nphojint.CODES2';

	
	const CODCI2 = 'nphojint.CODCI2';

	
	const CODRAC = 'nphojint.CODRAC';

	
	const CODNIV = 'nphojint.CODNIV';

	
	const TELHA2 = 'nphojint.TELHA2';

	
	const TELOT2 = 'nphojint.TELOT2';

	
	const CODPROFES = 'nphojint.CODPROFES';

	
	const HCMEXO = 'nphojint.HCMEXO';

	
	const CODBANFID = 'nphojint.CODBANFID';

	
	const CODBANLPH = 'nphojint.CODBANLPH';

	
	const NUMCUEFID = 'nphojint.NUMCUEFID';

	
	const NUMCUELPH = 'nphojint.NUMCUELPH';

	
	const CODEMPANT = 'nphojint.CODEMPANT';

	
	const GRUSAN = 'nphojint.GRUSAN';

	
	const OBSGEN = 'nphojint.OBSGEN';

	
	const CODREGPAI = 'nphojint.CODREGPAI';

	
	const CODREGEST = 'nphojint.CODREGEST';

	
	const CODREGCIU = 'nphojint.CODREGCIU';

	
	const FECGRA = 'nphojint.FECGRA';

	
	const GRUSANGRE = 'nphojint.GRUSANGRE';

	
	const NUMGACETA = 'nphojint.NUMGACETA';

	
	const FECGACETA = 'nphojint.FECGACETA';

	
	const DIAGRA = 'nphojint.DIAGRA';

	
	const MESGRA = 'nphojint.MESGRA';

	
	const ANOGRA = 'nphojint.ANOGRA';

	
	const TEMPORAL = 'nphojint.TEMPORAL';

	
	const DETEXP = 'nphojint.DETEXP';

	
	const NUMEXP = 'nphojint.NUMEXP';

	
	const MODPAGCESTIC = 'nphojint.MODPAGCESTIC';

	
	const CODRET = 'nphojint.CODRET';

	
	const SITUAC = 'nphojint.SITUAC';

	
	const PROFES = 'nphojint.PROFES';

	
	const CODNIVEDU = 'nphojint.CODNIVEDU';

	
	const FECCORACU = 'nphojint.FECCORACU';

	
	const CAPACTACU = 'nphojint.CAPACTACU';

	
	const INTACU = 'nphojint.INTACU';

	
	const ANTACU = 'nphojint.ANTACU';

	
	const DIAACU = 'nphojint.DIAACU';

	
	const DIAADIACU = 'nphojint.DIAADIACU';

	
	const SEGHCM = 'nphojint.SEGHCM';

	
	const PORSEGHCM = 'nphojint.PORSEGHCM';

	
	const UBIFIS = 'nphojint.UBIFIS';

	
	const TIPCUEAHO = 'nphojint.TIPCUEAHO';

	
	const NUMCUEAHO = 'nphojint.NUMCUEAHO';

	
	const CODTIPEMP = 'nphojint.CODTIPEMP';

	
	const NUMPUNCUE = 'nphojint.NUMPUNCUE';

	
	const FECINICON = 'nphojint.FECINICON';

	
	const FECFINCON = 'nphojint.FECFINCON';

	
	const OBSEMBRET = 'nphojint.OBSEMBRET';

	
	const CODMOT = 'nphojint.CODMOT';

	
	const ID = 'nphojint.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Rifemp', 'Nomemp', 'Cedemp', 'Numcon', 'Edociv', 'Nacemp', 'Sexemp', 'Fecnac', 'Edaemp', 'Lugnac', 'Dirhab', 'Codciu', 'Telhab', 'Celemp', 'Emaemp', 'Codpos', 'Talpan', 'Talcam', 'Talcal', 'Derzur', 'Fecing', 'Fecret', 'Fecrei', 'Fecadmpub', 'Staemp', 'Fotemp', 'Numsso', 'Numpolseg', 'Feccotsso', 'Anoadmpub', 'Codtippag', 'Codban', 'Tipcue', 'Numcue', 'Obsemp', 'Tiefid', 'Grulab', 'Gruotr', 'Traslado', 'Traotr', 'Tipviv', 'Vivotr', 'Forten', 'Tenotr', 'Sercon', 'Dirotr', 'Telotr', 'Codpai', 'Codpa2', 'Codest', 'Codes2', 'Codci2', 'Codrac', 'Codniv', 'Telha2', 'Telot2', 'Codprofes', 'Hcmexo', 'Codbanfid', 'Codbanlph', 'Numcuefid', 'Numcuelph', 'Codempant', 'Grusan', 'Obsgen', 'Codregpai', 'Codregest', 'Codregciu', 'Fecgra', 'Grusangre', 'Numgaceta', 'Fecgaceta', 'Diagra', 'Mesgra', 'Anogra', 'Temporal', 'Detexp', 'Numexp', 'Modpagcestic', 'Codret', 'Situac', 'Profes', 'Codnivedu', 'Feccoracu', 'Capactacu', 'Intacu', 'Antacu', 'Diaacu', 'Diaadiacu', 'Seghcm', 'Porseghcm', 'Ubifis', 'Tipcueaho', 'Numcueaho', 'Codtipemp', 'Numpuncue', 'Fecinicon', 'Fecfincon', 'Obsembret', 'Codmot', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphojintPeer::CODEMP, NphojintPeer::RIFEMP, NphojintPeer::NOMEMP, NphojintPeer::CEDEMP, NphojintPeer::NUMCON, NphojintPeer::EDOCIV, NphojintPeer::NACEMP, NphojintPeer::SEXEMP, NphojintPeer::FECNAC, NphojintPeer::EDAEMP, NphojintPeer::LUGNAC, NphojintPeer::DIRHAB, NphojintPeer::CODCIU, NphojintPeer::TELHAB, NphojintPeer::CELEMP, NphojintPeer::EMAEMP, NphojintPeer::CODPOS, NphojintPeer::TALPAN, NphojintPeer::TALCAM, NphojintPeer::TALCAL, NphojintPeer::DERZUR, NphojintPeer::FECING, NphojintPeer::FECRET, NphojintPeer::FECREI, NphojintPeer::FECADMPUB, NphojintPeer::STAEMP, NphojintPeer::FOTEMP, NphojintPeer::NUMSSO, NphojintPeer::NUMPOLSEG, NphojintPeer::FECCOTSSO, NphojintPeer::ANOADMPUB, NphojintPeer::CODTIPPAG, NphojintPeer::CODBAN, NphojintPeer::TIPCUE, NphojintPeer::NUMCUE, NphojintPeer::OBSEMP, NphojintPeer::TIEFID, NphojintPeer::GRULAB, NphojintPeer::GRUOTR, NphojintPeer::TRASLADO, NphojintPeer::TRAOTR, NphojintPeer::TIPVIV, NphojintPeer::VIVOTR, NphojintPeer::FORTEN, NphojintPeer::TENOTR, NphojintPeer::SERCON, NphojintPeer::DIROTR, NphojintPeer::TELOTR, NphojintPeer::CODPAI, NphojintPeer::CODPA2, NphojintPeer::CODEST, NphojintPeer::CODES2, NphojintPeer::CODCI2, NphojintPeer::CODRAC, NphojintPeer::CODNIV, NphojintPeer::TELHA2, NphojintPeer::TELOT2, NphojintPeer::CODPROFES, NphojintPeer::HCMEXO, NphojintPeer::CODBANFID, NphojintPeer::CODBANLPH, NphojintPeer::NUMCUEFID, NphojintPeer::NUMCUELPH, NphojintPeer::CODEMPANT, NphojintPeer::GRUSAN, NphojintPeer::OBSGEN, NphojintPeer::CODREGPAI, NphojintPeer::CODREGEST, NphojintPeer::CODREGCIU, NphojintPeer::FECGRA, NphojintPeer::GRUSANGRE, NphojintPeer::NUMGACETA, NphojintPeer::FECGACETA, NphojintPeer::DIAGRA, NphojintPeer::MESGRA, NphojintPeer::ANOGRA, NphojintPeer::TEMPORAL, NphojintPeer::DETEXP, NphojintPeer::NUMEXP, NphojintPeer::MODPAGCESTIC, NphojintPeer::CODRET, NphojintPeer::SITUAC, NphojintPeer::PROFES, NphojintPeer::CODNIVEDU, NphojintPeer::FECCORACU, NphojintPeer::CAPACTACU, NphojintPeer::INTACU, NphojintPeer::ANTACU, NphojintPeer::DIAACU, NphojintPeer::DIAADIACU, NphojintPeer::SEGHCM, NphojintPeer::PORSEGHCM, NphojintPeer::UBIFIS, NphojintPeer::TIPCUEAHO, NphojintPeer::NUMCUEAHO, NphojintPeer::CODTIPEMP, NphojintPeer::NUMPUNCUE, NphojintPeer::FECINICON, NphojintPeer::FECFINCON, NphojintPeer::OBSEMBRET, NphojintPeer::CODMOT, NphojintPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'rifemp', 'nomemp', 'cedemp', 'numcon', 'edociv', 'nacemp', 'sexemp', 'fecnac', 'edaemp', 'lugnac', 'dirhab', 'codciu', 'telhab', 'celemp', 'emaemp', 'codpos', 'talpan', 'talcam', 'talcal', 'derzur', 'fecing', 'fecret', 'fecrei', 'fecadmpub', 'staemp', 'fotemp', 'numsso', 'numpolseg', 'feccotsso', 'anoadmpub', 'codtippag', 'codban', 'tipcue', 'numcue', 'obsemp', 'tiefid', 'grulab', 'gruotr', 'traslado', 'traotr', 'tipviv', 'vivotr', 'forten', 'tenotr', 'sercon', 'dirotr', 'telotr', 'codpai', 'codpa2', 'codest', 'codes2', 'codci2', 'codrac', 'codniv', 'telha2', 'telot2', 'codprofes', 'hcmexo', 'codbanfid', 'codbanlph', 'numcuefid', 'numcuelph', 'codempant', 'grusan', 'obsgen', 'codregpai', 'codregest', 'codregciu', 'fecgra', 'grusangre', 'numgaceta', 'fecgaceta', 'diagra', 'mesgra', 'anogra', 'temporal', 'detexp', 'numexp', 'modpagcestic', 'codret', 'situac', 'profes', 'codnivedu', 'feccoracu', 'capactacu', 'intacu', 'antacu', 'diaacu', 'diaadiacu', 'seghcm', 'porseghcm', 'ubifis', 'tipcueaho', 'numcueaho', 'codtipemp', 'numpuncue', 'fecinicon', 'fecfincon', 'obsembret', 'codmot', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Rifemp' => 1, 'Nomemp' => 2, 'Cedemp' => 3, 'Numcon' => 4, 'Edociv' => 5, 'Nacemp' => 6, 'Sexemp' => 7, 'Fecnac' => 8, 'Edaemp' => 9, 'Lugnac' => 10, 'Dirhab' => 11, 'Codciu' => 12, 'Telhab' => 13, 'Celemp' => 14, 'Emaemp' => 15, 'Codpos' => 16, 'Talpan' => 17, 'Talcam' => 18, 'Talcal' => 19, 'Derzur' => 20, 'Fecing' => 21, 'Fecret' => 22, 'Fecrei' => 23, 'Fecadmpub' => 24, 'Staemp' => 25, 'Fotemp' => 26, 'Numsso' => 27, 'Numpolseg' => 28, 'Feccotsso' => 29, 'Anoadmpub' => 30, 'Codtippag' => 31, 'Codban' => 32, 'Tipcue' => 33, 'Numcue' => 34, 'Obsemp' => 35, 'Tiefid' => 36, 'Grulab' => 37, 'Gruotr' => 38, 'Traslado' => 39, 'Traotr' => 40, 'Tipviv' => 41, 'Vivotr' => 42, 'Forten' => 43, 'Tenotr' => 44, 'Sercon' => 45, 'Dirotr' => 46, 'Telotr' => 47, 'Codpai' => 48, 'Codpa2' => 49, 'Codest' => 50, 'Codes2' => 51, 'Codci2' => 52, 'Codrac' => 53, 'Codniv' => 54, 'Telha2' => 55, 'Telot2' => 56, 'Codprofes' => 57, 'Hcmexo' => 58, 'Codbanfid' => 59, 'Codbanlph' => 60, 'Numcuefid' => 61, 'Numcuelph' => 62, 'Codempant' => 63, 'Grusan' => 64, 'Obsgen' => 65, 'Codregpai' => 66, 'Codregest' => 67, 'Codregciu' => 68, 'Fecgra' => 69, 'Grusangre' => 70, 'Numgaceta' => 71, 'Fecgaceta' => 72, 'Diagra' => 73, 'Mesgra' => 74, 'Anogra' => 75, 'Temporal' => 76, 'Detexp' => 77, 'Numexp' => 78, 'Modpagcestic' => 79, 'Codret' => 80, 'Situac' => 81, 'Profes' => 82, 'Codnivedu' => 83, 'Feccoracu' => 84, 'Capactacu' => 85, 'Intacu' => 86, 'Antacu' => 87, 'Diaacu' => 88, 'Diaadiacu' => 89, 'Seghcm' => 90, 'Porseghcm' => 91, 'Ubifis' => 92, 'Tipcueaho' => 93, 'Numcueaho' => 94, 'Codtipemp' => 95, 'Numpuncue' => 96, 'Fecinicon' => 97, 'Fecfincon' => 98, 'Obsembret' => 99, 'Codmot' => 100, 'Id' => 101, ),
		BasePeer::TYPE_COLNAME => array (NphojintPeer::CODEMP => 0, NphojintPeer::RIFEMP => 1, NphojintPeer::NOMEMP => 2, NphojintPeer::CEDEMP => 3, NphojintPeer::NUMCON => 4, NphojintPeer::EDOCIV => 5, NphojintPeer::NACEMP => 6, NphojintPeer::SEXEMP => 7, NphojintPeer::FECNAC => 8, NphojintPeer::EDAEMP => 9, NphojintPeer::LUGNAC => 10, NphojintPeer::DIRHAB => 11, NphojintPeer::CODCIU => 12, NphojintPeer::TELHAB => 13, NphojintPeer::CELEMP => 14, NphojintPeer::EMAEMP => 15, NphojintPeer::CODPOS => 16, NphojintPeer::TALPAN => 17, NphojintPeer::TALCAM => 18, NphojintPeer::TALCAL => 19, NphojintPeer::DERZUR => 20, NphojintPeer::FECING => 21, NphojintPeer::FECRET => 22, NphojintPeer::FECREI => 23, NphojintPeer::FECADMPUB => 24, NphojintPeer::STAEMP => 25, NphojintPeer::FOTEMP => 26, NphojintPeer::NUMSSO => 27, NphojintPeer::NUMPOLSEG => 28, NphojintPeer::FECCOTSSO => 29, NphojintPeer::ANOADMPUB => 30, NphojintPeer::CODTIPPAG => 31, NphojintPeer::CODBAN => 32, NphojintPeer::TIPCUE => 33, NphojintPeer::NUMCUE => 34, NphojintPeer::OBSEMP => 35, NphojintPeer::TIEFID => 36, NphojintPeer::GRULAB => 37, NphojintPeer::GRUOTR => 38, NphojintPeer::TRASLADO => 39, NphojintPeer::TRAOTR => 40, NphojintPeer::TIPVIV => 41, NphojintPeer::VIVOTR => 42, NphojintPeer::FORTEN => 43, NphojintPeer::TENOTR => 44, NphojintPeer::SERCON => 45, NphojintPeer::DIROTR => 46, NphojintPeer::TELOTR => 47, NphojintPeer::CODPAI => 48, NphojintPeer::CODPA2 => 49, NphojintPeer::CODEST => 50, NphojintPeer::CODES2 => 51, NphojintPeer::CODCI2 => 52, NphojintPeer::CODRAC => 53, NphojintPeer::CODNIV => 54, NphojintPeer::TELHA2 => 55, NphojintPeer::TELOT2 => 56, NphojintPeer::CODPROFES => 57, NphojintPeer::HCMEXO => 58, NphojintPeer::CODBANFID => 59, NphojintPeer::CODBANLPH => 60, NphojintPeer::NUMCUEFID => 61, NphojintPeer::NUMCUELPH => 62, NphojintPeer::CODEMPANT => 63, NphojintPeer::GRUSAN => 64, NphojintPeer::OBSGEN => 65, NphojintPeer::CODREGPAI => 66, NphojintPeer::CODREGEST => 67, NphojintPeer::CODREGCIU => 68, NphojintPeer::FECGRA => 69, NphojintPeer::GRUSANGRE => 70, NphojintPeer::NUMGACETA => 71, NphojintPeer::FECGACETA => 72, NphojintPeer::DIAGRA => 73, NphojintPeer::MESGRA => 74, NphojintPeer::ANOGRA => 75, NphojintPeer::TEMPORAL => 76, NphojintPeer::DETEXP => 77, NphojintPeer::NUMEXP => 78, NphojintPeer::MODPAGCESTIC => 79, NphojintPeer::CODRET => 80, NphojintPeer::SITUAC => 81, NphojintPeer::PROFES => 82, NphojintPeer::CODNIVEDU => 83, NphojintPeer::FECCORACU => 84, NphojintPeer::CAPACTACU => 85, NphojintPeer::INTACU => 86, NphojintPeer::ANTACU => 87, NphojintPeer::DIAACU => 88, NphojintPeer::DIAADIACU => 89, NphojintPeer::SEGHCM => 90, NphojintPeer::PORSEGHCM => 91, NphojintPeer::UBIFIS => 92, NphojintPeer::TIPCUEAHO => 93, NphojintPeer::NUMCUEAHO => 94, NphojintPeer::CODTIPEMP => 95, NphojintPeer::NUMPUNCUE => 96, NphojintPeer::FECINICON => 97, NphojintPeer::FECFINCON => 98, NphojintPeer::OBSEMBRET => 99, NphojintPeer::CODMOT => 100, NphojintPeer::ID => 101, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'rifemp' => 1, 'nomemp' => 2, 'cedemp' => 3, 'numcon' => 4, 'edociv' => 5, 'nacemp' => 6, 'sexemp' => 7, 'fecnac' => 8, 'edaemp' => 9, 'lugnac' => 10, 'dirhab' => 11, 'codciu' => 12, 'telhab' => 13, 'celemp' => 14, 'emaemp' => 15, 'codpos' => 16, 'talpan' => 17, 'talcam' => 18, 'talcal' => 19, 'derzur' => 20, 'fecing' => 21, 'fecret' => 22, 'fecrei' => 23, 'fecadmpub' => 24, 'staemp' => 25, 'fotemp' => 26, 'numsso' => 27, 'numpolseg' => 28, 'feccotsso' => 29, 'anoadmpub' => 30, 'codtippag' => 31, 'codban' => 32, 'tipcue' => 33, 'numcue' => 34, 'obsemp' => 35, 'tiefid' => 36, 'grulab' => 37, 'gruotr' => 38, 'traslado' => 39, 'traotr' => 40, 'tipviv' => 41, 'vivotr' => 42, 'forten' => 43, 'tenotr' => 44, 'sercon' => 45, 'dirotr' => 46, 'telotr' => 47, 'codpai' => 48, 'codpa2' => 49, 'codest' => 50, 'codes2' => 51, 'codci2' => 52, 'codrac' => 53, 'codniv' => 54, 'telha2' => 55, 'telot2' => 56, 'codprofes' => 57, 'hcmexo' => 58, 'codbanfid' => 59, 'codbanlph' => 60, 'numcuefid' => 61, 'numcuelph' => 62, 'codempant' => 63, 'grusan' => 64, 'obsgen' => 65, 'codregpai' => 66, 'codregest' => 67, 'codregciu' => 68, 'fecgra' => 69, 'grusangre' => 70, 'numgaceta' => 71, 'fecgaceta' => 72, 'diagra' => 73, 'mesgra' => 74, 'anogra' => 75, 'temporal' => 76, 'detexp' => 77, 'numexp' => 78, 'modpagcestic' => 79, 'codret' => 80, 'situac' => 81, 'profes' => 82, 'codnivedu' => 83, 'feccoracu' => 84, 'capactacu' => 85, 'intacu' => 86, 'antacu' => 87, 'diaacu' => 88, 'diaadiacu' => 89, 'seghcm' => 90, 'porseghcm' => 91, 'ubifis' => 92, 'tipcueaho' => 93, 'numcueaho' => 94, 'codtipemp' => 95, 'numpuncue' => 96, 'fecinicon' => 97, 'fecfincon' => 98, 'obsembret' => 99, 'codmot' => 100, 'id' => 101, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NphojintMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NphojintMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphojintPeer::getTableMap();
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
		return str_replace(NphojintPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphojintPeer::CODEMP);

		$criteria->addSelectColumn(NphojintPeer::RIFEMP);

		$criteria->addSelectColumn(NphojintPeer::NOMEMP);

		$criteria->addSelectColumn(NphojintPeer::CEDEMP);

		$criteria->addSelectColumn(NphojintPeer::NUMCON);

		$criteria->addSelectColumn(NphojintPeer::EDOCIV);

		$criteria->addSelectColumn(NphojintPeer::NACEMP);

		$criteria->addSelectColumn(NphojintPeer::SEXEMP);

		$criteria->addSelectColumn(NphojintPeer::FECNAC);

		$criteria->addSelectColumn(NphojintPeer::EDAEMP);

		$criteria->addSelectColumn(NphojintPeer::LUGNAC);

		$criteria->addSelectColumn(NphojintPeer::DIRHAB);

		$criteria->addSelectColumn(NphojintPeer::CODCIU);

		$criteria->addSelectColumn(NphojintPeer::TELHAB);

		$criteria->addSelectColumn(NphojintPeer::CELEMP);

		$criteria->addSelectColumn(NphojintPeer::EMAEMP);

		$criteria->addSelectColumn(NphojintPeer::CODPOS);

		$criteria->addSelectColumn(NphojintPeer::TALPAN);

		$criteria->addSelectColumn(NphojintPeer::TALCAM);

		$criteria->addSelectColumn(NphojintPeer::TALCAL);

		$criteria->addSelectColumn(NphojintPeer::DERZUR);

		$criteria->addSelectColumn(NphojintPeer::FECING);

		$criteria->addSelectColumn(NphojintPeer::FECRET);

		$criteria->addSelectColumn(NphojintPeer::FECREI);

		$criteria->addSelectColumn(NphojintPeer::FECADMPUB);

		$criteria->addSelectColumn(NphojintPeer::STAEMP);

		$criteria->addSelectColumn(NphojintPeer::FOTEMP);

		$criteria->addSelectColumn(NphojintPeer::NUMSSO);

		$criteria->addSelectColumn(NphojintPeer::NUMPOLSEG);

		$criteria->addSelectColumn(NphojintPeer::FECCOTSSO);

		$criteria->addSelectColumn(NphojintPeer::ANOADMPUB);

		$criteria->addSelectColumn(NphojintPeer::CODTIPPAG);

		$criteria->addSelectColumn(NphojintPeer::CODBAN);

		$criteria->addSelectColumn(NphojintPeer::TIPCUE);

		$criteria->addSelectColumn(NphojintPeer::NUMCUE);

		$criteria->addSelectColumn(NphojintPeer::OBSEMP);

		$criteria->addSelectColumn(NphojintPeer::TIEFID);

		$criteria->addSelectColumn(NphojintPeer::GRULAB);

		$criteria->addSelectColumn(NphojintPeer::GRUOTR);

		$criteria->addSelectColumn(NphojintPeer::TRASLADO);

		$criteria->addSelectColumn(NphojintPeer::TRAOTR);

		$criteria->addSelectColumn(NphojintPeer::TIPVIV);

		$criteria->addSelectColumn(NphojintPeer::VIVOTR);

		$criteria->addSelectColumn(NphojintPeer::FORTEN);

		$criteria->addSelectColumn(NphojintPeer::TENOTR);

		$criteria->addSelectColumn(NphojintPeer::SERCON);

		$criteria->addSelectColumn(NphojintPeer::DIROTR);

		$criteria->addSelectColumn(NphojintPeer::TELOTR);

		$criteria->addSelectColumn(NphojintPeer::CODPAI);

		$criteria->addSelectColumn(NphojintPeer::CODPA2);

		$criteria->addSelectColumn(NphojintPeer::CODEST);

		$criteria->addSelectColumn(NphojintPeer::CODES2);

		$criteria->addSelectColumn(NphojintPeer::CODCI2);

		$criteria->addSelectColumn(NphojintPeer::CODRAC);

		$criteria->addSelectColumn(NphojintPeer::CODNIV);

		$criteria->addSelectColumn(NphojintPeer::TELHA2);

		$criteria->addSelectColumn(NphojintPeer::TELOT2);

		$criteria->addSelectColumn(NphojintPeer::CODPROFES);

		$criteria->addSelectColumn(NphojintPeer::HCMEXO);

		$criteria->addSelectColumn(NphojintPeer::CODBANFID);

		$criteria->addSelectColumn(NphojintPeer::CODBANLPH);

		$criteria->addSelectColumn(NphojintPeer::NUMCUEFID);

		$criteria->addSelectColumn(NphojintPeer::NUMCUELPH);

		$criteria->addSelectColumn(NphojintPeer::CODEMPANT);

		$criteria->addSelectColumn(NphojintPeer::GRUSAN);

		$criteria->addSelectColumn(NphojintPeer::OBSGEN);

		$criteria->addSelectColumn(NphojintPeer::CODREGPAI);

		$criteria->addSelectColumn(NphojintPeer::CODREGEST);

		$criteria->addSelectColumn(NphojintPeer::CODREGCIU);

		$criteria->addSelectColumn(NphojintPeer::FECGRA);

		$criteria->addSelectColumn(NphojintPeer::GRUSANGRE);

		$criteria->addSelectColumn(NphojintPeer::NUMGACETA);

		$criteria->addSelectColumn(NphojintPeer::FECGACETA);

		$criteria->addSelectColumn(NphojintPeer::DIAGRA);

		$criteria->addSelectColumn(NphojintPeer::MESGRA);

		$criteria->addSelectColumn(NphojintPeer::ANOGRA);

		$criteria->addSelectColumn(NphojintPeer::TEMPORAL);

		$criteria->addSelectColumn(NphojintPeer::DETEXP);

		$criteria->addSelectColumn(NphojintPeer::NUMEXP);

		$criteria->addSelectColumn(NphojintPeer::MODPAGCESTIC);

		$criteria->addSelectColumn(NphojintPeer::CODRET);

		$criteria->addSelectColumn(NphojintPeer::SITUAC);

		$criteria->addSelectColumn(NphojintPeer::PROFES);

		$criteria->addSelectColumn(NphojintPeer::CODNIVEDU);

		$criteria->addSelectColumn(NphojintPeer::FECCORACU);

		$criteria->addSelectColumn(NphojintPeer::CAPACTACU);

		$criteria->addSelectColumn(NphojintPeer::INTACU);

		$criteria->addSelectColumn(NphojintPeer::ANTACU);

		$criteria->addSelectColumn(NphojintPeer::DIAACU);

		$criteria->addSelectColumn(NphojintPeer::DIAADIACU);

		$criteria->addSelectColumn(NphojintPeer::SEGHCM);

		$criteria->addSelectColumn(NphojintPeer::PORSEGHCM);

		$criteria->addSelectColumn(NphojintPeer::UBIFIS);

		$criteria->addSelectColumn(NphojintPeer::TIPCUEAHO);

		$criteria->addSelectColumn(NphojintPeer::NUMCUEAHO);

		$criteria->addSelectColumn(NphojintPeer::CODTIPEMP);

		$criteria->addSelectColumn(NphojintPeer::NUMPUNCUE);

		$criteria->addSelectColumn(NphojintPeer::FECINICON);

		$criteria->addSelectColumn(NphojintPeer::FECFINCON);

		$criteria->addSelectColumn(NphojintPeer::OBSEMBRET);

		$criteria->addSelectColumn(NphojintPeer::CODMOT);

		$criteria->addSelectColumn(NphojintPeer::ID);

	}

	const COUNT = 'COUNT(nphojint.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphojint.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphojintPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphojintPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphojintPeer::doSelectRS($criteria, $con);
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
		$objects = NphojintPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphojintPeer::populateObjects(NphojintPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphojintPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphojintPeer::getOMClass();
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
		return NphojintPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NphojintPeer::ID); 

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
			$comparison = $criteria->getComparison(NphojintPeer::ID);
			$selectCriteria->add(NphojintPeer::ID, $criteria->remove(NphojintPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphojintPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphojintPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nphojint) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphojintPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nphojint $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphojintPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphojintPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphojintPeer::DATABASE_NAME, NphojintPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphojintPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphojintPeer::DATABASE_NAME);

		$criteria->add(NphojintPeer::ID, $pk);


		$v = NphojintPeer::doSelect($criteria, $con);

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
			$criteria->add(NphojintPeer::ID, $pks, Criteria::IN);
			$objs = NphojintPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphojintPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NphojintMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NphojintMapBuilder');
}
