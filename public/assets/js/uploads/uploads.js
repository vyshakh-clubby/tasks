$(document).ready(function() {

    var handleUpload    =   function(){

        $('.import').click(function(e){
            e.preventDefault();

            var formData    =   $('#uploadForm').serialize();

            console.log($('.file'))

            var fd = new FormData();
            fd.append('file', $('.file').files[0]);

            console.log(fd);





        })


    }

    handleUpload();



})
