$('#title').on('input', function() {
    var permalink;
    // Trim empty space
    permalink = $.trim($(this).val());
    // replace more then 1 space with only one
    permalink = permalink.replace(/\s+/g,' ');
    $('#sefurl').val(permalink.toLowerCase());
    $('#sefurl').val($('#sefurl').val().replace(/\W/g, ' '));
    $('#sefurl').val($.trim($('#sefurl').val()));
    $('#sefurl').val($('#sefurl').val().replace(/\s+/g, '-'));
    var gappermalink = $('#sefurl').val();
    $('#sef_url').html(gappermalink);
});

$('#sefurl').on('input', function() {
    var permalink;
    // Trim empty space
    permalink = $(this).val();
    // replace more then 1 space with only one
    permalink = permalink.replace(/\s+/g,' ');
    $('#sefurl').val(permalink.toLowerCase());
    $('#sefurl').val($('#sefurl').val().replace(/\W/g, ' '));
    $('#sefurl').val($('#sefurl').val().replace(/\s+/g, '-'));
    var gappermalink = $('#sefurl').val();
    $('#sef_url').html(gappermalink);
});

$(document).on("click",".btn-hapus",function() {
	var id = $(this).attr("id");
	$("#modal_del").modal("show");
	$("#del_id").val(id);
});
