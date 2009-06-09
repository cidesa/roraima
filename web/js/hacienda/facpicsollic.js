function Mostrar_Negacion()
{
  $('negacion').show();
  $('mostrar').hide();
  $('ocultar').show();
  $('fcsollic_licnegada').value='I';
}

function Ocultar_Negacion()
{
  $('negacion').hide();
  $('ocultar').hide();
  $('mostrar').show();
  $('fcsollic_licnegada').value='';
}

function Mostrar_orden_preimpresa()
{
      f=0;
      i=0;
      var primer_art=$("ax_0_2").value;
      while (f < $('numero_filas_orden').value)
      {
        var campo="ax_"+f+"_2";
        if(!$(campo))
        {
                i=f-1;
                var campo2="ax_"+i+"_2";
                var ultimo_art=$(campo2).value;
            break;
        }
            f++;
      }
      if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
      {
            var ordcomdes=$('caordcom_ordcom').value;
            var ordcomhas=$('caordcom_ordcom').value;
            var codprodes='<?php echo $caordcom->getCodpro()?>';
            var codprohas='<?php echo $caordcom->getCodpro()?>';
            var codartdes=primer_art;
            var codarthas=ultimo_art;
            var fecorddes=$('caordcom_fecord').value;
            var fecordhas=$('caordcom_fecord').value;
            var status='Activas';
            var tipcom=$('caordcom_doccom').value;
        //$this->despacho=str_replace('*',' ',$_GET["despacho"]);
        var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
          pagina=ruta+"/reportes/reportes/compras/r.php=?r=<?php echo $caordcom->getReptipcom(); ?>&ordcomdes="+ordcomdes+"&ordcomhas="+ordcomhas+"&codprodes="+codprodes+"&codprohas="+codprohas+"&codartdes="+codartdes+"&codarthas="+codarthas+"&fecorddes="+fecorddes+"&fecordhas="+fecordhas+"&tipcom="+tipcom+"&doccom="+tipcom;
          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
}

