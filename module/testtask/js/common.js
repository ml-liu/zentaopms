$(document).ready(function()
{    
    $('#startForm, #closeForm, #activateForm').ajaxForm(
    {
        finish:function(response)
        {
            if(response.locate)
            {
                if(response.locate == 'parent')
                {
                    parent.$.cookie('selfClose', 1);
                    setTimeout(function(){parent.$.closeModal(null, 'this')}, 1200);
                }
                else
                {
                    setTimeout(function(){window.location.href = response.locate;}, 1200);
                }
            }
            return false;
        }
    });
})
