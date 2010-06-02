<script language="Javascript">
    
    $('viacalviatra_fecha').hide();
    Calculartotal();
    function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(10,'#',0)
        else
            $(id).value=$(id).value.pad(10,'0',0)
    }
    
    function bloquearcajacorr(id)
    {
        if($(id).value!='')
            $(id).readOnly=true;

    }
    function calculamontofinal(id,colu)
    {
        if($(id).readOnly==false)
        {
            var auxid=id.split('_');
            var col=auxid[2];
            var name=auxid[0];
            var fil= auxid[1];
            if(colu=='3')
            {
                var colval = parseInt(colu)+1;
                var colotr = parseInt(colu)+2;
            }
            else
            {
                var colval = parseInt(colu)+1;
                var colotr = parseInt(colu);
            }            
            var idval = name+'_'+fil+'_'+colval;
            var idotr = name+'_'+fil+'_'+colotr;
            var idmon = name+'_'+fil+'_6';
            var val = $(idval).value
            val = val.replace('.','');
            val = val.replace(',','.');

            var valor = $(idotr).value
            valor = valor.replace('.','');
            valor = valor.replace(',','.');

            $(idmon).value=number_format(parseFloat(valor)*parseFloat(val),2,',','.');
            Calculartotal();
        }
        

    }

    function Calculartotal()
    {
        var total=0;
        var totfil = obtener_filas_grid('a', '3');        
        for(i=0;i<totfil;i++)
        {
            
            if($('ax_'+i+'_8').value=='F')
            {
                $('ax_'+i+'_4').readOnly=false;
                $('ax_'+i+'_5').readOnly=false;
            }else
            {
                if($('ax_'+i+'_6').value=='0,00')
                   $('ax_'+i+'_1').disabled=true;
            }
            if($('ax_'+i+'_1').checked==true)
            {
                var val = $('ax_'+i+'_6').value
                val = val.replace('.','');
                val = val.replace(',','.');
                total = parseFloat(total)+parseFloat(val);
            }
            
        }
        $('viacalviatra_totvia').value=number_format(total,2,',','.');
        toAjax(2,getUrlModulo()+'ajax','1','','&monto='+total);
    }    

</script>
