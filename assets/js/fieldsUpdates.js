$('select[name=command]').on('change',updateView);
function updateView()
{
    var option = $(this).val();
    if(option == 'network')
    {
        $('input[name=ip]').show();
        $('input[name=mask]').show();
    }
    else
    {
        $('input[name=ip]').show();
        $('input[name=mask]').hide();
    }
}