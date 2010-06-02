<script language="Javascript">    

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
    var totfil = obtener_filas_grid('a', '1');
    for(i=0;i<totfil;i++)
    {
        if($('ax_'+i+'_1').value=='')
        {
           $('ax_'+i+'_4').value='';
        }
    }
</script>
