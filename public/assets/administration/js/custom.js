//datatable
$(document).ready(function () {
    $('#employee_table').DataTable();
});
//datatable #
//tinymce
tinymce.init({
    selector: "textarea#textareatiny",
    plugins: [
        "advlist autolink link autolink preview image imagetools searchreplace table emoticons lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | fontsizeselect bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | link unlink anchor autolink | image media imagetools preview  searchreplace table emoticons | forecolor backcolor  | print preview code ",
    image_advtab: true ,
    branding: false,
    fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
    external_filemanager_path:"filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "filemanager/plugin.min.js"}
});
tinymce.init({
    selector: 'textarea.basic-example',
    height: 250,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
        ' bold italic backcolor forecolor | alignleft aligncenter ' +
        ' alignright alignjustify | bullist numlist outdent indent |' +
        ' removeformat | help',
    branding: false,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
    ]
});
//tinymce #
//image preview
function previewImage(event) {
    var reader = new FileReader();
    var imageField = document.getElementById("image-preview")
    reader.onload = function()
    {
        if(reader.readyState == 2)
        {
            imageField.src = reader.result;
        }
    }
    reader.readAsDataURL(event.target.files[0]);

    document.getElementById("image-field").style.visibility = "visible";
}
//image preview #
//multiple preview
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input) {
        var $preview = $('#preview').empty();
        if (input.files) {
            var filesAmount = input.files.length;
            if (filesAmount <= 6)
            {
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    $(reader).on("load", function () {
                        $preview.append($("<img/>", {src: this.result, height: 100}));
                    });
                    reader.readAsDataURL(input.files[i]);
                }
            }
            else{alert('Maximum 6 Picture');}
        }
    };
    $('#image-preview').on('change', function() {
        imagesPreview(this);
    });
});
//multiple preview #
//gritter
function gritter_custom(gfor,title,text) {
    if(gfor == 'image upload')
    {
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: title,
        // (string | mandatory) the text inside the notification
        text: text,
        image: 'assets/administration/images/icon/bell.gif',
    });
    }
    return false;
}
//gritter #
//date range picker
/*$(function() {//date range picker
    var start = moment().subtract(0, 'years');
    var end = moment();
    function cb(start, end)
    {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        document.getElementById('daterange').value = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        timePicker24Hour:false,
        timePicker: false,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
});*/
//date range picker

