$(document).ready(function() {
    var _token  =   $("input[name=_token]").val();

    var runTemplateLists  =   function(){

        //var table   =   $('#template_list').DataTable();
        $('#template_list').DataTable({
            //"bProcessing": false,
            //"serverSide": false,
            /*"ajax":{
                url :"getTemplateList", // json datasource
                type: "post",  // type of method  , by default would be get
                data : {'_token':$("input[name=_token]").val()},
                error: function(){  // error handling code
                    $("#employee_grid_processing").css("display","none");
                },

                "columns": [
                    { "data": "id" },
                    { "data" : "template_name" }
                ]
            },*/
            "drawCallback": function( settings ) {
                $('#template_list tr').click(function(){
                    var idTemplate  =   $(this).find('td').attr('data-id');
                    var template    =   $(this).find('td').attr('data-template');
                    var dataString  =   'id='+idTemplate+'&_token='+_token;
                    $('.templates').val(template);
                    $('.template_id').val(idTemplate);
                    console.log(template);



                    $.ajax({
                        type: "POST",
                        url: 'updateTemplateStatus',
                        data: dataString,
                        success: function(data)
                        {

                        }
                    });


                })

            }
        });
    }

    runTemplateLists();




})


