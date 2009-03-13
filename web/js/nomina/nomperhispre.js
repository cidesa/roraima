function ObtenerSalActual()
{

   if (document.forms[0].nphispre_signo[0].checked){

        var anterior=toFloat('nphispre_salant');
        var prestamo='-' + toFloat('nphispre_monpre');
        prestamo=parseInt(prestamo);


      var actual= anterior + prestamo;
      $('nphispre_saldo').value=format(actual.toFixed(2),'.',',','.');
}else
        {
            var anterior=toFloat('nphispre_salant');
        var prestamo=toFloat('nphispre_monpre');


      var actual= anterior + prestamo;
      $('nphispre_saldo').value=format(actual.toFixed(2),'.',',','.');

 }


}