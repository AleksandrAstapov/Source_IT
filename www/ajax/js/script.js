$(function(){
    $('#ajax').submit(function(e){
        e.preventDefault();

        var formData = $(this).serializeArray();
        var error = 0;

        $.each(formData, function(){
            var val = this.name.trim();
            if(this.value == ""){
                error++;
                $('#'+this.name).css('border', '1px solid red');
            }else{
                $('#'+this.name).css('border', '');
            }
        });

        if(error == 0){
            $.ajax({
                url:'adduser.php',
                type: 'post',
                dataType: 'html',
                data: formData,
                success: function(html){
                    if(html) {
                        $('.table tbody').prepend(html);
                    }
                }
            });
        }

    });
});