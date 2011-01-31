
function tippagoticket()
{
	if ($F('npcestatickets_tippag')=='J')
	{
		$('npcestatickets_diahab').disabled=false;
		$('npcestatickets_sabado').disabled=true;
		$('npcestatickets_doming').disabled=true;
		$('npcestatickets_diafer').disabled=false;

	}else if ($F('npcestatickets_tippag')=='F')
	{
		$('npcestatickets_diahab').disabled=true;
		$('npcestatickets_sabado').disabled=true;
		$('npcestatickets_doming').disabled=true;
		$('npcestatickets_diafer').disabled=true;

	}else if ($F('npcestatickets_tippag')=='V')
	{
		$('npcestatickets_diahab').disabled=false;
		$('npcestatickets_sabado').disabled=false;
		$('npcestatickets_doming').disabled=false;
		$('npcestatickets_diafer').disabled=false;

	}
}