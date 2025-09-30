export function init() {
    loadDatatables();
    loadQuillEditor();
    changeNewsVisibility();
    changeNewsFeatured();
    changeEventsFeatured();
    changeEventsVisibility();
    hideAlertSuccess();
    loadImageDropzone();
    loadAttachmentsDropzone();
    cropImage();
}

/**
 * nascondiamo il div con il messaggio di successo
 */
function hideAlertSuccess() {
    $(".alert-success").delay(3500).fadeOut();
}

function loadDatatables() {
    var table = $(".data-table").DataTable({
        rowReorder: true,
        "paging": false,
        "language":{
            "url": "/api/lang/pagination/datatable"
        },
        "responsive": true,
        "columnDefs":  [
            { targets: 0, orderable: true }
            ,{ targets: 1, visible: false }
            ,{ orderable: false, targets: '_all' }
        ],
        order: [[0, 'desc']]
    });
    table.on('row-reordered', function () {
        var url = $(".table").data('url-update-position');
        var dataArray = [];

        var i = 0;
        table.rows().every( function () {
            var data = this.data();
            dataArray.push({id: data[1], position: data[0]});
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log(dataArray);
        $.ajax({
            type: 'PUT',
            url: url,
            data:  { data: dataArray },
            success: function(result) {

            },
            error: function(jqXHR, exception){
                console.log(jqXHR, exception);
            }
        });
    });

}



function loadQuillEditor() {
    var description = $('.editor_description').get(0);
    if (description) {
        window.quillDescription = new Quill(description, {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    ['link'/*, { 'align': [] }*/],
                    // [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ 'size': ['small', false, 'large'] }, { 'header': [1, 2, 3, 4, false] }]
                ]
            },
            theme: 'snow',
        });
    }
    var short_description = $('.editor_short_description').get(0);
    if (short_description) {
        window.quillShortDescription = new Quill(short_description, {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    ['link'/*, { 'align': [] }*/],
                    // [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ 'size': ['small', false, 'large'] }, { 'header': [1, 2, 3, 4, false] }]
                ]
            },
            theme: 'snow',
        });
    }

    var link = $('.editor_link').get(0);
    if (link) {
        window.quillLink = new Quill(link, {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    ['link'/*, { 'align': [] }*/],
                    // [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ 'size': ['small', false, 'large'] }, { 'header': [1, 2, 3, 4, false] }]
                ]
            },
            theme: 'snow',
        });
    }
}

/**
 * cambiamo tramite ajax la visibilità della news
 */
function changeNewsVisibility() {
    $('.toggleNewsVisible').click(function () {
        var dataId = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: url,
            data:  { dataId: dataId},
            dataType: 'json',
            success: function(result) {
                if (result['visibility'] == 1) {
                    $("#news_"+dataId+" .toggleNewsVisible").removeClass('btn-news-not-visible').addClass('btn-news-visible').html(result['text']);
                } else {
                    $("#news_"+dataId+" .toggleNewsVisible").removeClass('btn-news-visible').addClass('btn-news-not-visible').html(result['text'])
                }
            }
        });
    });
}

/**
 * cambiamo tramite ajax la visibilità degli eventi
 */
function changeEventsVisibility() {
    $('.toggleEventsVisible').click(function () {
        var eventsId = $(this).attr('data-events-id');
        var url = $(this).attr('data-url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: url,
            data:  { eventsId: eventsId},
            dataType: 'json',
            success: function(result) {
                if (result['visibility'] == 1) {
                    $("#events_"+eventsId+" .toggleEventsVisible").removeClass('btn-events-not-visible').addClass('btn-events-visible').html(result['text']);
                } else {
                    $("#events_"+eventsId+" .toggleEventsVisible").removeClass('btn-events-visible').addClass('btn-events-not-visible').html(result['text'])
                }
            }
        });
    });
}


/**
 * cambiamo tramite ajax la priorità della news
 */
function changeNewsFeatured() {
    $('.toggleNewsFeatured').click(function () {
        var newsId = $(this).attr('data-featured-id');
        var url = $(this).attr('data-url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: url,
            data:  { newsId: newsId},
            dataType: 'json',
            success: function(result) {
                if (result['featured'] == 1) {
                    $("#news_"+newsId+" .toggleNewsFeatured").removeClass('btn-news-featured-not-visible').addClass('btn-news-featured-visible').html(result['text']);
                } else {
                    $("#news_"+newsId+" .toggleNewsFeatured").removeClass('btn-news-featured-visible').addClass('btn-news-featured-not-visible').html(result['text']);
                }
            }
        });
    });

}


/**
 * cambiamo tramite ajax la priorità degli eventi
 */
function changeEventsFeatured() {
    $('.toggleEventsFeatured').click(function () {
        var eventsId = $(this).attr('data-featured-id');
        var url = $(this).attr('data-url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: url,
            data:  { eventsId: eventsId},
            dataType: 'json',
            success: function(result) {
                if (result['featured'] == 1) {
                    $("#events_"+eventsId+" .toggleEventsFeatured").removeClass('btn-events-featured-not-visible').addClass('btn-events-featured-visible').html(result['text']);
                } else {
                    $("#events_"+eventsId+" .toggleEventsFeatured").removeClass('btn-events-featured-visible').addClass('btn-events-featured-not-visible').html(result['text']);
                }
            }
        });
    });

}


function loadImageDropzone() {
    $(".image-upload").each( function() {
        var dropzone = $(this);
        dropzone.dropzone({
            maxFilesize: 12,
            acceptedFiles: ".jpeg,.jpg,.png",
            // addRemoveLinks: true,
            init: function() {
                var thisDropzone = this;
                var path = dropzone.attr('data-path');
                var url = dropzone.attr('data-url');

                this.on('queuecomplete', function () {
                    // location.reload();
                });
            },
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                var filename = file.name.replace(/[`~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/]/gi, '').replace(' ', '_').toLowerCase();
                return time+'_'+filename;
            },
            maxFiles: dropzone.data('max-files'),
            maxfilesexceeded: function(file) {
                this.removeAllFiles();
                this.addFile(file);
            },
            removedfile: function(file)
            {
                var name = (file.upload === undefined) ? file.name : file.upload.filename;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: dropzone.attr('data-url-remove'),
                    data: {filename: name},
                    error: function(e) {
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            error: function (file, response) {
                console.log(file,response);
                return false;
            },
            success: function () {
                location.reload();
            }
        });
    });
}

function loadAttachmentsDropzone() {
    var dropzone = $("#attachments-upload");
    dropzone.dropzone({
        // addRemoveLinks: true,
        init: function() {
            var thisDropzone = this;

            this.on('queuecomplete', function () {
                location.reload();
            });
        },
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            var filename = file.name.replace(/[`~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/]/gi, '').replace(' ', '_').toLowerCase();
            return time+'_'+filename;
        },
        removedfile: function(file)
        {
            var name = (file.upload === undefined) ? file.name : file.upload.filename;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: dropzone.attr('data-url-remove'),
                data: {filename: name},
                error: function(e) {
                    console.log(e);
                }});
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        error: function (file, response) {
            return false;
        }
    });
}

function cropImage() {

    var cropPopup = $('#cropImagePop');

    $(".cropImage").click(function () {
        var width = $(this).data("width");
        var height = $(this).data("height");
        var imageID = $(this).data("image-id");
        var isHeader = $(this).data("is-header");
        var boundaryWidth;
        var boundaryHeight;

        var uploadCrop,
            tempFilename,
            rawImg,
            imageId;

        var prefixElID = (isHeader) ? "cover_image_" : "image_";

        rawImg = document.getElementById(prefixElID+imageID).src;

        if (width > 1000) {
            $("#cropImagePop").css('padding', '0');
            $(".modal-dialog").css('max-width', '100%').css('margin', '0');
            $(".upload-demo-container").css('height', height+200);
            boundaryWidth = width+100;
            boundaryHeight = height+100;
        } else {
            $(".modal-dialog").css('max-width', '550px').css('margin', 'auto');
            $(".upload-demo-container").css('height', height);
        }

        function createCroppie() {
            if (width > 1000) {
                uploadCrop = $('#upload-demo').croppie({
                    url: rawImg,
                    viewport: {
                        width: width,
                        height: height,
                    },
                    boundary: {
                        width: boundaryWidth,
                        height: boundaryHeight,
                    },
                    enforceBoundary: true
                });
            } else {
                uploadCrop = $('#upload-demo').croppie({
                    url: rawImg,
                    viewport: {
                        width: width,
                        height: height,
                    },
                    enforceBoundary: true
                });
            }
        }

        createCroppie();

        imageId = $(this).data('id');
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId);

        $('.upload-demo').addClass('ready');
        cropPopup.modal('show');

        cropPopup.on('shown.bs.modal', function(){
            uploadCrop.croppie('bind', {
                url: rawImg
            });
        });

        cropPopup.on('hidden.bs.modal', function(){
            $('#upload-demo').croppie('destroy');
            $('.upload-demo').removeClass('ready');
            width = null;
            height = null;
            imageID = null;
            isHeader = null;
            $uploadCrop.croppie('bind', {
                url : ''
            });
        });

        $('#cropImageBtn').on('click', function (ev) {
            uploadCrop.croppie('result', {
                type: 'base64',
                format: 'png',
                size: {width: width, height: height},
                backgroundColor:'green',
            }).then(function (resp) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: $('#upload-demo').data("url"),
                    type: "POST",
                    dataType: "json",
                    data: {"id": imageID, 'isHeader':isHeader, "image": resp},
                    success: function (data) {
                        if (data.status === 'ok') {
                            $('#item-img-output').attr('src', resp);
                            $('#cropImagePop').modal('hide');
                            location.reload();
                        } else if(data.status === 'ko'){
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    });
}
