/*
 * ------------------------------------------
 * Code by PopojiCMS (http://popojicms.org/)
 * Edited by PlayCMS
 * ------------------------------------------
 */

$('#title').on('input', function() {

	var permalink = $.trim($(this).val());

    permalink = permalink.replace(/\s+/g,' ');
    $('#sefurl').val(permalink.toLowerCase());
    $('#sefurl').val($('#sefurl').val().replace(/\W/g, ' '));
    $('#sefurl').val($.trim($('#sefurl').val()));
    $('#sefurl').val($('#sefurl').val().replace(/\s+/g, '-'));
    var gappermalink = $('#sefurl').val();
    $('#sef_url').html(gappermalink);
});

$('#sefurl').on('input', function() {
    var permalink = $(this).val();

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

$(document).on("click",".btn-activation",function() {
	var id = $(this).attr("id");
	var act = $(".activation-" +id).html();
	var activate = "Aktifkan";
	var active_lang = "Aktif";
	var non_activate = "Nonaktifkan";
	var not_active = "Tidak Aktif";

	if (act == active_lang) 
		var active = "Y";
	else
		var active = "N";
	$.ajax({
		url: "activation/" + id,
	});
	
}

$('#tiny-code').click(function (e) {
	e.stopPropagation();
	tinymce.EditorManager.execCommand('mceRemoveEditor',true, 'create');
	$(this).hide();
	$("#tiny-wysiwyg").show();
});

$('#tiny-wysiwyg').click(function (e) {
	e.stopPropagation();
	tinymce.EditorManager.execCommand('mceAddEditor',true, 'create');
	$(this).hide();
	$("#tiny-code").show();
});