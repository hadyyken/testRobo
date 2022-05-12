$(document).ready(function (){
    $(document).on
    ('click', '.pagination_link',
        function ()
    {
        let page_number = $(this).attr("id");
        load_data(page_number,radio);
    }
    );
    $(document).on('click', '.form-check-input',
        function ()
    {
        radio = $(this).attr("id");
        load_data(page_number,radio);
    }
    );

    load_data();
    let radio = 'all';
    let page_number = '1';
        function load_data(page_number,radio)
    {
        $.ajax
        ({
            url:"./includes/content.php",
            method:"POST",
            data:{page_number:page_number, radio:radio},
            success:function (data){
                $('#pagination_data').html(data);
            }
        })
    }



});
