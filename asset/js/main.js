$(document).ready(function() {
    var fileobj;

    $("#drop_zone").on("dragover", function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });

    // Drop file
    $("#drop_zone").on("drop", function(event) {
        event.preventDefault();
        event.stopPropagation();
        fileobj = event.originalEvent.dataTransfer.files[0];
        var fname = fileobj.name;
        var fsize = fileobj.size;
        if (fname.length > 0)
            $('#file_info').html("File name : " + fname + ' <br>File size : ' + bytesToSize(fsize));

        const fileInput    = document.querySelector('input[type="file"]');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(fileobj);
        fileInput.files    = dataTransfer.files;

        $('#btn_upload').css('display', 'inline');
    });

    // select file from folder
    $('#btn_file_pick').click(function() {
        $('#selectfile').click();
        $('#selectfile').on('change', function() {
            fileobj = document.getElementById('selectfile').files[0];
            var fname = fileobj.name;
            var fsize = fileobj.size;
            if (fname.length > 0)
                $('#file_info').html("File name : " + fname + ' <br>File size : ' + bytesToSize(fsize));

            $('#btn_upload').css('display', 'inline');
        });
    });

    $('#btn_upload').click(function() {
        if (fileobj == "" || fileobj == null) {
            alert("Silahkan Masukan File Terlebih Dahulu");
            return false;
        } else 
            return true;
    });
});

function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) 
        return '0 Byte';

    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));

    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}