/**
 *	---------------------------------------------------------------
 *  Inspired and Code by PopojiCMS! (http://popojicms.org)
 *	Edited by : PlayCMS. Thanks!
 *  ---------------------------------------------------------------
 */ 

$(".view_com").click(function() {
	var id = $(this).attr("id");
	$(".loading").removeClass("hidden");
	$(".loading").addClass("fadeIn");
	$.ajax({
		url: "view_comment/" + id,
		success: function(html){
			$(".loading").addClass("hidden");
			$(".loading").removeClass("fadeIn");
			$('#view_com').modal('show');
			$('#view_com .modal-body').html(html);
		}
	});
});

$(document).on("click",".btn-del",function() {
	var id = $(this).attr("id");
	$("#modal_del").modal("show");
	$("#del_id").val(id);
});
 
/**
 *	---------------------------------------------------------------
 *  Inspired and Code by PopojiCMS! (http://popojicms.org)
 *	Edited by : PlayCMS. Thanks!
 *  ---------------------------------------------------------------
 */ 
 
 $(".btn-activation").click(function() {

	var id = $(this).attr("id");
	var act = $(".activated-" + id).html();
	var activate = "<?php echo "Aktifkan";?>";
	var active_lang = "<?php echo "Aktif";?>";
	var non_activate = "<?php echo "Nonaktifkan";?>";
	var not_active = "<?php echo "Tidak Aktif";?>";

	if (act == active_lang)
		var active = "Y";
	else
		var active = "N";

	$(".loading").removeClass("hidden");
	$(".loading").addClass("fadeIn");
	$.ajax({
		url: "activation/" + id,
		success: function(html){
			$(".loading").addClass("hidden");
			$(".loading").removeClass("fadeIn");

			if (active == "Y") {
				$(".btn-active-" + id).attr("data-original-title", activate);
				$(".btn-active-" + id).removeClass("bg-maroon");
				$(".btn-active-" + id).addClass("bg-olive");
				$(".activated-" + id).html(not_active);
				$(".fav-" + id).removeClass("text-green");
				$(".fav-" + id).addClass("text-red");
			}

			else {
				$(".btn-active-" + id).attr("data-original-title", non_activate);
				$(".btn-active-" + id).removeClass("bg-olive");
				$(".btn-active-" + id).addClass("bg-maroon");
				$(".activated-" + id).html(active_lang);
				$(".fav-" + id).removeClass("text-red");
				$(".fav-" + id).addClass("text-green");
			}
		}
	});
});