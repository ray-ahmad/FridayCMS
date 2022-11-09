<script>
function close_all_alert(){$(".alert-success").stop(!0),$(".alert-danger").stop(!0),$(".alert-warning").stop(!0),$(".alert-success").slideUp("normal"),$(".alert-danger").slideUp("normal"),$(".alert-warning").slideUp("normal")}$(".close-alert").on("click",function(){var l=$(this).attr("data-alert");$("."+l).slideUp("normal")}),$(".btn-filemanager").on("click",function(){var l=$(this).attr("data-field-id"),a=$(this).attr("data-img"),o="<?php echo assets_plug_url("responsive_filemanager/") ?>filemanager/dialog.php?type=1&field_id="+l+"&img="+a;$("#iframe-filemanager").attr("src",o),$("#upload_img").modal("show")}),$(window).scroll(function(){$(this).scrollTop()>300?$(".scrollToTop").fadeIn("slow"):$(".scrollToTop").fadeOut("slow")}),$(".scrollToTop").on("click",function(){$("body,html").animate({scrollTop:0},2e3,"easeInOutExpo")});<?php
switch($page) :
	case "index" :
?>var areaChartData={labels: [<?php for($i = 1; $i <= 8; $i++){$date_label = '"' . $chart["date" . $i] . '"';if($i < 8){$date_label .= ", ";}echo $date_label;}?>],datasets: [{label: "Visitor",fillColor: "rgba(210, 214, 222, 1)",strokeColor: "rgba(210, 214, 222, 1)",pointColor: "rgba(210, 214, 222, 1)",pointStrokeColor: "#c1c7d1",pointHighlightFill: "#fff",pointHighlightStroke: "rgba(220,220,220,1)",data: [<?php for($i = 1; $i <= 8; $i++){$visitor_data = $chart["visit" . $i];if($i < 8){$visitor_data .= ", ";}echo $visitor_data;}?>]},{label: "Hits",fillColor: "rgba(60,141,188,0.9)",strokeColor: "rgba(60,141,188,0.8)",pointColor: "#3b8bba",pointStrokeColor: "rgba(60,141,188,1)",pointHighlightFill: "#fff",pointHighlightStroke: "rgba(60,141,188,1)",data: [<?php for($i = 1; $i <= 8; $i++){$hits_data = $chart["hits" . $i];if($i < 8){$hits_data .= ", ";}echo $hits_data;}?>]}]};var areaChartOptions={showScale:!0,scaleShowGridLines:!1,scaleGridLineColor:"rgba(0,0,0,.05)",scaleGridLineWidth:1,scaleShowHorizontalLines:!0,scaleShowVerticalLines:!0,bezierCurve:!0,bezierCurveTension:.3,pointDot:!0,pointDotRadius:4,pointDotStrokeWidth:1,pointHitDetectionRadius:20,datasetStroke:!0,datasetStrokeWidth:2,datasetFill:!0,legendTemplate:'<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',maintainAspectRatio:!0,responsive:!0},lineChartCanvas=$("#chart-traffic").get(0).getContext("2d"),lineChart=new Chart(lineChartCanvas),lineChartOptions=areaChartOptions;lineChartOptions.datasetFill=!1,lineChart.Line(areaChartData,lineChartOptions);<?php
	break;
	case "all_post" :
?>$(document).on("click",".btn-hapus",function(){var d=$(this).attr("id");$("#modal_del").modal("show"),$("#del_id").val(d)});$(document).on("click",".btn-activation",function(){close_all_alert();var a=$(this).attr("id"),e=$(".activation-"+a).html(),t="<?php echo $this->lang->line("activate") ?>",s="<?php echo $this->lang->line("active") ?>",l="<?php echo $this->lang->line("non_activate") ?>",o="<?php echo $this->lang->line("not_active") ?>";if(e==s)var c="Y";else var c="N";$(".loading").slideDown("fast"),$.ajax({url:"<?php echo admin_url("post/activation/") ?>"+a,success:function(e){switch($(".loading").slideUp("fast"),e){case"OK!":$(".alert-berhasil").slideToggle("normal").delay(3e3).slideToggle("normal"),"Y"==c?($(".activation-"+a).html(o),$(".fa-act-post-"+a).removeClass("fa-eye"),$(".fa-act-post-"+a).addClass("fa-eye-slash"),$(".btn-act-"+a).attr("title",t),$(".fa-act"+a).removeClass("fa-eye-slash"),$(".fa-act-"+a).addClass("fa-eye"),$(".btn-act-"+a).removeClass("bg-maroon"),$(".btn-act-"+a).addClass("bg-olive")):($(".activation-"+a).html(s),$(".fa-act-post-"+a).removeClass("fa-eye-slash"),$(".fa-act-post-"+a).addClass("fa-eye"),$(".btn-act-"+a).attr("title",l),$(".fa-act"+a).removeClass("fa-eye"),$(".fa-act-"+a).addClass("fa-eye-slash"),$(".btn-act-"+a).removeClass("bg-olive"),$(".btn-act-"+a).addClass("bg-maroon"));break;case"ERROR!":$(".alert-query-ggl").slideToggle("slow");break;case"Not Found!":$(".alert-row").slideToggle("slow");break;case"Forbidden!":break;case"Not Logged!":window.location.href="<?php echo admin_url("login/") ?>";}},error:function(){$(".loading").slideUp("fast"),$(".alert-network").slideToggle("slow")}})});

	$(document).on("click",".btn-hot-post",function() {

		close_all_alert();

		var id = $(this).attr("id");
		var hot = $(".hot-" +id).html();
		var add_hot_post = "<?php echo $this->lang->line("add_to_hot_post") ?>";
		var hot_lang = "<?php echo $this->lang->line("hot_post") ?>";
		var not_add_hot_post = "<?php echo $this->lang->line("delete_from_hot_post") ?>";
		var not_hot_post = "<?php echo $this->lang->line("not_hot_post") ?>";

		if (hot == hot_lang) 
			var hot_post = "Y";
		else
			var hot_post = "N";

		$(".loading").slideToggle("fast");

		$.ajax({
			url: "<?php echo admin_url("post/hot_post/") ?>" + id,
			success: function(html){
				$(".loading").slideUp("normal");
				switch(html) {
					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");

						if (hot_post == "Y") {
							// .hot- (+ id)
							$(".hot-" + id).html(not_hot_post);

							//.btn act- (+ id)
							$(".hot-post-" + id).removeClass("text-red");
							$(".hot-post-" + id).addClass("text-muted");

							//$(".btn-hot-" + id).attr("data-orignal-title", "");
							$(".tooltip-hot-" + id).attr("data-orignal-title", add_hot_post);
							$(".btn-hot-" + id).removeClass("bg-maroon");
							$(".btn-hot-" + id).addClass("bg-olive");
						}
						else {
							// .hot- (+ id)
							$(".hot-" + id).html(hot_lang);

							//.btn hot- (+ id)
							$(".hot-post-" + id).removeClass("text-muted");
							$(".hot-post-" + id).addClass("text-red");

							//$(".btn-hot-" + id).attr("data-orignal-title", "");
							$(".tooltip-hot-" + id).attr("data-orignal-title", not_add_hot_post);							$(".btn-hot-" + id).removeClass("bg-olive");
							$(".btn-hot-" + id).removeClass("bg-olive");
							$(".btn-hot-" + id).addClass("bg-maroon");
						}
					break;
					case "ERROR!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
					default :
					break;
				}
			},
			error: function() {
				$(".loading").fadeIn("fast");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;

		case "create_post" :
		case "edit_post" :
?>
	function cek_post_sef(id_target) {
		var sef = $(id_target).val();
		if (sef == "" || sef.length < 5)
			$(".msg-sef").fadeOut("fast");

		else {
			$(".msg-sef").html("<?php echo $this->lang->line("checking_sef") ?>");
			$(".msg-sef").fadeIn("fast");
			<?php echo ($page == "edit_post") ? 'var id = $("#post_id").val();' : "" ?>

			$.ajax({
				data: "sef=" + sef,
				type: "POST",
				url: "<?php echo ($page == "edit_post") ? admin_url('post/sef_check/') . '" + id,' : admin_url('post/sef_check') . '",' ?>
				success: function(html) {
					switch(html) {
						case "Available" :
							$(".btn-edit-sub").fadeIn("fast");
							$(".msg-sef").html('<div class="text-green"><?php echo $this->lang->line("sef_available") ?></div>');
						break;
						case "Not Available" :
							$(".btn-edit-sub").fadeOut("fast");
							$(".msg-sef").html('<div class="text-red"><?php echo $this->lang->line("sef_not_available") ?></div>');
						break;
						case "Forbidden" :
							$(".btn-edit-sub").fadeOut("fast");
							$(".msg-sef").html('<div class="text-red"><?php echo $this->lang->line("sef_forbidden") ?></div>');
						break;
					}
				},
				error: function() {
					$(".loading").fadeIn("fast");
					$(".alert-network").slideToggle("slow");
				}
			});
		}
	}

	$('#title').on('input', function() {
		var permalink = $.trim($(this).val());

		permalink = permalink.replace(/\s+/g,' ');
		$('#sefurl').val(permalink.toLowerCase());
		$('#sefurl').val($('#sefurl').val().replace(/\W/g, ' '));
		$('#sefurl').val($.trim($('#sefurl').val()));
		$('#sefurl').val($('#sefurl').val().replace(/\s+/g, '-'));
		var gappermalink = $('#sefurl').val();
		$('#sef_url').html(gappermalink);
		cek_post_sef("#sefurl");
	});

	$('#sefurl').on('input', function() {
		var permalink = $(this).val();

		permalink = permalink.replace(/\s+/g,' ');
		$('#sefurl').val(permalink.toLowerCase());
		$('#sefurl').val($('#sefurl').val().replace(/\W/g, ' '));
		$('#sefurl').val($('#sefurl').val().replace(/\s+/g, '-'));
		var gappermalink = $('#sefurl').val();
		$('#sef_url').html(gappermalink);
		cek_post_sef("#sefurl");
	});
<?php

		break;

		case "all_cat" :
?>
	$(document).on("click",".btn-hapus",function() {
		var id = $(this).attr("id");
		$("#modal_del").modal("show");
		$("#del_id").val(id);
	});
	$(document).on("click",".btn-activation",function() {

		close_all_alert();

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
		$(".loading").fadeIn("fast");

		$.ajax({
			url: "<?php echo admin_url("post_category/activation/") ?>" + id,
			success: function(html){
				$(".loading").slideUp("normal");
				switch(html) {
					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");

						if (active == "Y") {
							// .activation- (+ id)
							$(".activation-" + id).html(not_active);
							$(".fa-act-cat-" + id).removeClass("fa-eye");
							$(".fa-act-cat-" + id).addClass("fa-eye-slash");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", activate);
							$(".fa-act" + id).removeClass("fa-eye-slash");
							$(".fa-act-" + id).addClass("fa-eye");
							$(".btn-act-" + id).removeClass("bg-maroon");
							$(".btn-act-" + id).addClass("bg-olive");
						}
						else {
							// .activation- (+ id)
							$(".activation-" + id).html(active_lang);
							$(".fa-act-cat-" + id).removeClass("fa-eye-slash");
							$(".fa-act-cat-" + id).addClass("fa-eye");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", non_activate);
							$(".fa-act" + id).removeClass("fa-eye");
							$(".fa-act-" + id).addClass("fa-eye-slash");
							$(".btn-act-" + id).removeClass("bg-olive");
							$(".btn-act-" + id).addClass("bg-maroon");
						}
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
					default :
					break;
				}
			},
			error: function() {
				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;

		case "create_cat" :
		case "edit_cat" :
?>
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
<?php
		break;

		case "all_com" :
?>

	$(document).on("click",".view_com", function() {
		close_all_alert();
		var id = $(this).attr("id");
		$(".loading").slideToggle("normal");
		$.ajax({
			url: "<?php echo admin_url("post_comment/view_comment/") ?>" + id,
			success: function(html) {
				$(".loading").slideToggle("fast");
				$("#view_com .modal-body").html(html);
				$('#view_com').modal("show");
			},
			error: function() {
				$(".loading").fadeIn("fast");
				$(".alert-network").slideToggle("slow");
			}
		});
	});

	$(document).on("click", ".btn-hapus", function() {
		var id = $(this).attr("id");
		$("#modal_del").modal("show");
		$("#del_id").val(id);
	});
 
	$(document).on("click",".btn-activation",function() {

		close_all_alert();

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
		$(".loading").fadeIn("fast");

		$.ajax({
			url: "<?php echo admin_url("post_comment/activation/") ?>" + id,
			success: function(html){
				$(".loading").slideUp("normal");
				switch(html) {
					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");

						if (active == "Y") {
							// .activation- (+ id)
							$(".activation-" + id).html(not_active);
							$(".fa-act-com-" + id).removeClass("text-green");
							$(".fa-act-com-" + id).addClass("text-red");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", activate);
							$(".btn-act-" + id).removeClass("bg-maroon");
							$(".btn-act-" + id).addClass("bg-olive");
						}
						else {
							// .activation- (+ id)
							$(".activation-" + id).html(active_lang);
							$(".fa-act-com-" + id).removeClass("text-red");
							$(".fa-act-com-" + id).addClass("text-green");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", non_activate);
							$(".btn-act-" + id).removeClass("bg-olive");
							$(".btn-act-" + id).addClass("bg-maroon");
						}
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
					default :
					break;
				}
			},
			error: function() {
				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;
		case "all_tag" :
?>
	$(document).on("click",".btn-edit", function() {
		var id = $(this).attr("id");
		close_all_alert();
		$(".box-add").fadeOut("fast");
		$(".loading").fadeIn("fast");
		$.ajax({
			url: "<?php echo admin_url("post_tag/edit_form/") ?>" + id,
			success: function(html) {
				$(".loading").slideUp("normal");
				switch(html) {
					default :
						$(".form-edit-tag").html(html);
						$(".box-edit").slideDown("fast");
						$(".btn-add-tag").slideToggle("slow");
					break;
					case "GAGAL!" :
						$(".box-add").fadeIn("fast");
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {
				$(".loading").slideUp("normal");
				$(".box-add").fadeIn("fast");
				$(".alert-network").slideToggle("slow");
			}
		});
	});

	$('.btn-add-tag').on('click', function() {
		$(".box-edit").fadeOut("fast");
		$(this).fadeOut("fast");
		$(".box-add").slideToggle("slow");
	});

	$('#btn-submit-create').on('click', function() {
		close_all_alert();
		var title = $(".title").val();
		var sef = $(".sefurl").val();
		var desc = $(".description").val();
		
		if(title == "") {
			alert("Judul Tag WAJIB diisi!");
			die();
		}
		$(".loading").fadeIn("fast");

		$.ajax({

			url: "<?php echo admin_url("post_tag/create/") ?>",
			data: "title=" + title + "&sef_url=" + sef + "&description=" + desc,
			type: "POST",
			success: function(html) {

				$(".loading").slideUp("normal");

				switch(html) {

					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");
						window.location.reload();
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Forbidden!" :
						alert("Forbidden");
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
					default:
						alert(html);
						die();
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});

	$(document).on("click","#btn-submit-edit", function() {
		close_all_alert();
		var id = $("#id").val();
		var title = $("#title-edit").val();
		var sef = $("#sefurl-edit").val();
		var desc = $("#description-edit").val();
		
		if(title == "") {
			alert("Judul Tag WAJIB diisi!");
			die();
		}

		$(".loading").fadeIn("fast");

		$.ajax({

			url: "<?php echo admin_url("post_tag/edit/") ?>",
			data: "id=" + id + "&title=" + title + "&sef_url=" + sef + "&description=" + desc,
			type: "POST",
			success: function(html) {

				$(".loading").slideUp("normal");

				switch(html) {

					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");
						window.location.reload();
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
						alert("Forbidden");
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});

	$(document).on("input",".title", function() {
		// Trim empty space
		var permalink = $.trim($(this).val());
		// replace more then 1 space with only one
		permalink = permalink.replace(/\s+/g,' ');
		$('.sefurl').val(permalink.toLowerCase());
		$('.sefurl').val($('.sefurl').val().replace(/\W/g, ' '));
		$('.sefurl').val($.trim($('.sefurl').val()));
		$('.sefurl').val($('.sefurl').val().replace(/\s+/g, '-'));
		var gappermalink = $('.sefurl').val();
		$('.sef_url').html(gappermalink);
	});

	$(document).on("input",".sefurl", function() {
		// Trim empty space
		var permalink = $(this).val();
		// replace more then 1 space with only one
		permalink = permalink.replace(/\s+/g,' ');
		$('.sefurl').val(permalink.toLowerCase());
		$('.sefurl').val($('.sefurl').val().replace(/\W/g, ' '));
		$('.sefurl').val($('.sefurl').val().replace(/\s+/g, '-'));
		var gappermalink = $('.sefurl').val();
		$('.sef_url').html(gappermalink);
	});

	$(document).on("click", ".btn-hapus", function() {
		var id = $(this).attr("id");
		$("#modal_del").modal("show");
		$("#del_id").val(id);
	});
 
	$(document).on("click",".btn-activation",function() {

		close_all_alert();

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

		$(".loading").fadeIn("fast");

		$.ajax({
			url: "<?php echo admin_url("post_tag/activation/") ?>" + id,
			success: function(html){
				$(".loading").fadeIn("fast");
				switch(html) {
					case "OK!" :
						$(".alert-berhasil").slideUp("normal");

						if (active == "Y") {
							// .activation- (+ id)
							$(".activation-" + id).html(not_active);
							$(".fa-act-tag-" + id).removeClass("fa-eye");
							$(".fa-act-tag-" + id).addClass("fa-eye-slash");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", activate);
							$(".fa-act" + id).removeClass("fa-eye-slash");
							$(".fa-act-" + id).addClass("fa-eye");
							$(".btn-act-" + id).removeClass("bg-maroon");
							$(".btn-act-" + id).addClass("bg-olive");
						}
						else {
							// .activation- (+ id)
							$(".activation-" + id).html(active_lang);
							$(".fa-act-tag-" + id).removeClass("fa-eye-slash");
							$(".fa-act-tag-" + id).addClass("fa-eye");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", non_activate);
							$(".fa-act" + id).removeClass("fa-eye");
							$(".fa-act-" + id).addClass("fa-eye-slash");
							$(".btn-act-" + id).removeClass("bg-olive");
							$(".btn-act-" + id).addClass("bg-maroon");
						}
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo BASE_URL ?>admin/login/"
					break;
					default :
					break;
				}
			},
			error: function() {
				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;
		case "all_page" :
?>
	$(document).on("click",".btn-hapus",function() {
		var id = $(this).attr("id");
		$("#modal_del").modal("show");
		$("#del_id").val(id);
	});

	$(document).on("click",".btn-activation",function() {

		close_all_alert();

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

		$(".loading").fadeIn("fast");

		$.ajax({
			url: "<?php echo admin_url("page/activation/") ?>" + id,
			success: function(html){
				$(".loading").slideUp("normal");
				switch(html) {
					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");

						if (active == "Y") {
							// .activation- (+ id)
							$(".activation-" + id).html(not_active);
							$(".fa-act-post-" + id).removeClass("fa-eye");
							$(".fa-act-post-" + id).addClass("fa-eye-slash");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", activate);
							$(".fa-act" + id).removeClass("fa-eye-slash");
							$(".fa-act-" + id).addClass("fa-eye");
							$(".btn-act-" + id).removeClass("bg-maroon");
							$(".btn-act-" + id).addClass("bg-olive");
						}
						else {
							// .activation- (+ id)
							$(".activation-" + id).html(active_lang);
							$(".fa-act-page-" + id).removeClass("fa-eye-slash");
							$(".fa-act-page-" + id).addClass("fa-eye");

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", non_activate);
							$(".fa-act" + id).removeClass("fa-eye");
							$(".fa-act-" + id).addClass("fa-eye-slash");
							$(".btn-act-" + id).removeClass("bg-olive");
							$(".btn-act-" + id).addClass("bg-maroon");
						}
					break;
					case "ERROR!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
					default :
					break;
				}
			},
			error: function() {
				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
	
<?php
		break;
		case "create_page" :
		case "edit_page" :
?>
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
<?php
		break;
		case "all_user" :
?>
	$(document).on("click",".btn-sub-passwd", function() {
		var old_pass = $("#old_pass").val();
		var new_pass = $("#new_pass").val();
		var r_new_pass = $("#r_new_pass").val();
		var id = $("#id-user").val();

		if (new_pass == "" || r_new_pass == "") {
			alert("Kamu diwajibkan untuk melengkapi semua form!");
			exit;
		}
		else if (new_pass.length < 4 || r_new_pass.length < 4) {
			alert("Panjang karakter minimal 4 karakter pada setiap form!");
			exit;
		}
		else if (new_pass != r_new_pass) {
			alert("Samakan isi form password dan form ulangi password!");
			exit;
		}
		else {
			close_all_alert();
			$(".loading-pass").slideToggle("slow");
			$.ajax({
				type: "POST",
				data: "user_id=" + id + "&old_pass=" + old_pass + "&new_pass=" + new_pass + "&r_new_pass=" + r_new_pass,
				url: "<?php echo admin_url("users/edit_pass_sub/") ?>" + id,
				success: function(html) {
					$(".loading-pass").fadeOut("fast");
					switch(html) {
						default :
							$("#form-error-pass-msg").html(html);
							$(".alert-form-error").slideToggle("slow");
						break;
						case "OK!" :
							$("#edit_pass").modal("hide");
							$(".alert-berhasil").slideToggle("slow");
						break;
						case "GAGAL!" :
							$("#edit_pass").modal("hide");
							$(".alert-query-ggl").slideToggle("slow");
						break;
						case "Not Found!" :
							$("#edit_pass").modal("hide");
							$(".alert-row").slideToggle("slow");
						break;
						case "Forbidden!" :
						break;
						case "Not Logged!" :
							window.location.href = "<?php echo admin_url("login/") ?>"
						break;
					}
				},
				error: function() {
					$(".loading-pass").fadeOut("fast");
					$("#edit_pass").modal("hide");
					$(".alert-network").slideToggle("slow");
				}
			});
		}
	});

	$(document).on("click",".btn-passwd", function() {
		var id = $(this).attr("id");
		close_all_alert();
		$(".loading").fadeIn("fast");
		$.ajax({
			url: "<?php echo admin_url("users/edit_pass/") ?>" + id,
			success: function(html) {
				$(".loading").slideUp("normal");
				switch(html) {
					default :
						$(".body-pass").html(html);
						$("#edit_pass").modal("show");
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {
				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});

	$('.btn-add').on('click', function() {
		$(".box-edit").fadeOut("fast");
		$(this).slideToggle("slow");
		$(".box-add").slideToggle("slow");
	});

	$('#btn-submit-add').on('click', function() {
		close_all_alert();
		var fullname = $("#full_name").val();
		var email = $("#email").val();
		var password = $("#pass").val();
		var password_r = $("#pass_r").val();
		var username = $("#username").val();
		var birthdate = $(".birthdate").val();
		var telephone = $("#telephone").val();
		var level = $("#level_id").val();

		if (fullname == "" || email == "" || username == "" || password == "" || password_r == "" || birthdate == "" || telephone == "" || level == "") {
			alert("Kamu diwajibkan untuk melengkapi semua form!");
			exit;
		}
		else if (fullname.length < 4 || email.length < 4 || password.length < 4 || password_r.length < 4 || telephone.length < 4) {
			alert("Panjang karakter minimal 4 karakter pada setiap form (kecuali form level)");
			exit;
		}
		else if (password != password_r) {
			alert("Samakan isi form password dan form ulangi password!");
			exit;
		}
		else {
			$(".loading").fadeIn("fast");

			$.ajax({

				url: "<?php echo admin_url("users/add/") ?>",
				data: "full_name=" + fullname + "&email=" + email + "&password=" + password + "&password_r=" + password_r + "&birthdate=" + birthdate + "&telephone=" + telephone + "&level_id=" + level + "&username=" + username,
				type: "POST",
				success: function(html) {

					$(".loading").slideUp("normal");

					switch(html) {

						case "OK!" :
							$(".alert-berhasil").slideToggle("slow");
							window.location.reload();
						break;
						case "GAGAL!" :
							$(".alert-query-ggl").slideToggle("slow");
						break;
						case "Forbidden!" :
							alert("Forbidden");
						break;
						case "Not Logged!" :
							window.location.href = "<?php echo admin_url("login/") ?>"
						break;
						default:
							$("#form-error-msg").html(html);
							$(".alert-form-error").slideToggle("slow");
							exit;
						break;
					}
				},
				error: function() {

					$(".loading").fadeIn("fast");
					$(".alert-network").slideToggle("slow");
				}
			});
		}
	});

	$(document).on("click",".btn-edit", function() {
		close_all_alert();
		var id = $(this).attr("id");

		$(".loading").fadeIn("fast");

		$.ajax({

			url: "<?php echo admin_url("users/edit_form/") ?>" + id,
			success: function(html) {
				$(".loading").slideUp("normal");

				switch(html) {
					default:
						$(".box-add").fadeOut("fast");
						$(".form-edit-user").html(html);
						$(".box-edit").fadeIn("slow");
						$(".btn-add").slideToggle("slow");
					break;
					case "GAGAL!" :
						$(".box-add").fadeIn("fast");
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});

	$(document).on("click","#btn-submit-edit", function() {
		close_all_alert();
		var id = $("#id_edit").val();
		var fullname = $("#full_name_edit").val();
		var email = $("#email_edit").val();
		var birthdate = $(".birthdate_edit").val();
		var telephone = $("#telephone_edit").val();
		var level = $("#level_id_edit").val();

		if (fullname == "" || email == "" || birthdate == "" || telephone == "" || level == "") {
			alert("Kamu diwajibkan untuk melengkapi semua form!");
			exit;
		}
		else if (fullname.length < 4 || email.length < 4 || telephone.length < 4) {
			alert("Panjang karakter minimal 4 karakter pada setiap form (kecuali form level)");
			exit;
		}
		else {
			$(".loading").fadeIn("fast");

			$.ajax({

				url: "<?php echo admin_url("users/edit/") ?>",
				data: "user_id=" + id + "&full_name=" + fullname + "&email=" + email + "&birthdate=" + birthdate + "&telephone=" + telephone + "&level_id=" + level,
				type: "POST",
				success: function(html) {

					$(".loading").slideUp("normal");

					switch(html) {

						case "OK!" :
							$(".alert-berhasil").slideToggle("slow");
							window.location.reload();
						break;
						case "GAGAL!" :
							$(".alert-query-ggl").slideToggle("slow");
						break;
						case "Forbidden!" :
							alert("Forbidden");
						break;
						case "Not Logged!" :
							window.location.href = "<?php echo admin_url("login/") ?>"
						break;
						default:
							$("#form-error-msg").html(html);
							$(".alert-form-error").slideToggle("slow");
							exit;
						break;
					}
				},
				error: function() {

					$(".loading").fadeIn("fast");
					$(".alert-network").slideToggle("slow");
				}
			});
		}
	});

	$(document).on("click", ".btn-hapus", function() {
		var id = $(this).attr("id");
		$("#modal_del").modal("show");
		$("#del_id").val(id);
	});
 
	$(document).on("click",".btn-activation",function() {

		close_all_alert();

		var id = $(this).attr("id");
		var act = $(".activation-" +id).html();
		var activate = "Aktifkan";
		var active_lang = "Ya";
		var non_activate = "Nonaktifkan";
		var not_active = "Tidak";

		if (act == active_lang) 
			var active = "Y";
		else
			var active = "N";

		$(".loading").fadeIn("fast");

		$.ajax({
			url: "<?php echo admin_url("users/activation/") ?>" + id,
			success: function(html){
				$(".loading").slideUp("normal");
				switch(html) {
					case "OK!" :
						$(".alert-berhasil").slideToggle("slow");

						if (active == "Y") {
							// .activation- (+ id)
							$(".activation-" + id).html(not_active);

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", activate);
							$(".fa-act" + id).removeClass("fa-eye-slash");
							$(".fa-act-" + id).addClass("fa-eye");
							$(".btn-act-" + id).removeClass("bg-maroon");
							$(".btn-act-" + id).addClass("bg-olive");
						}
						else {
							// .activation- (+ id)
							$(".activation-" + id).html(active_lang);

							//.btn act- (+ id)
							$(".btn-act-" + id).attr("data-original-title", non_activate);
							$(".fa-act" + id).removeClass("fa-eye");
							$(".fa-act-" + id).addClass("fa-eye-slash");
							$(".btn-act-" + id).removeClass("bg-olive");
							$(".btn-act-" + id).addClass("bg-maroon");
						}
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Not Found!" :
						$(".alert-row").slideToggle("slow");
					break;
					case "Forbidden!" :
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo BASE_URL ?>admin/login/"
					break;
					default :
					break;
				}
			},
			error: function() {
				$(".loading").fadeIn("fast");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;
		case "all_theme" :
?>
	$(".btn-upload").on("click", function() {
		close_all_alert();

		var file = $("#theme-file")[0].files[0];
		if (file) {
			var folder_name = $("#folder-name").val();
			$(".loading").slideToggle("fast");
            var data = new FormData();
            data.append("theme_file", file);
            data.append("folder_name", folder_name);
			
			$.ajax({
				url: "<?php echo admin_url("theme/frontend_theme_upload/") ?>",
				data: data,
				type: "POST",
				processData: false,
				contentType: false,
				success: function(html) {

					$(".loading").slideToggle("normal");

					switch(html) {

						default :
							$(".error-msg").html(html);
							$(".alert-form").slideToggle("fast");
						break;
						case "1" :
							$(".error-msg").html("File yang di upload tidak dapat dibuka!");
							$(".alert-form").slideToggle("fast");
						break;
						case "2" :
							$(".error-msg").html("File yang di upload tidak dapat/gagal di ekstrak");
							$(".alert-form").slideToggle("fast");
						break;
						case "3" :
							$(".error-msg").html("File konfigurasi (config.json) tidak disertakan di dalam file .zip yang kamu upload!");
							$(".alert-form").slideToggle("fast");
						break;
						case "4" :
							$(".error-msg").html("Sepertinya tema ini pernah di install sebelumnya? Kamu dapat meng-uninstallnya terlebih dahulu!");
							$(".alert-form").slideToggle("fast");
						break;
						case "5" :
							$(".alert-berhasil").slideToggle("fast");
						break;
						case "6" :
							$(".error-msg").html("Tema yang Kamu upload berhasil di install, namun informasi tentang tema tersebut tidak dapat dimasukkan ke database!");
							$(".alert-form").slideToggle("fast");
						break;
						case "Forbidden!" :
						break;
						case "Not Logged!" :
							window.location.href = "<?php echo BASE_URL ?>admin/login/"
						break;
					}
				},
				error: function() {

					$(".loading").slideUp("normal");
					$(".alert-network").slideToggle("slow");
				}
			});
		}
		else {
			alert("Kamu harus memilih tema yang ingin di upload terlebih dahulu!");
			exit;
		}
	});
	$(document).on("click", ".btn-hapus", function() {
		var folder = $(this).attr("id");
		$("#modal_del").modal("show");
		$("#del_folder").val(folder);
	});
<?php
		break;
		case "edit_thm_file" :
?>
	var editor = CodeMirror.fromTextArea(document.getElementById("theme_file"), {
		lineNumbers: true,
		mode: "php",
		matchBrackets: true,
		styleActiveLine: true,
		autoCloseBrackets: true,
		autoCloseTags: true,
		theme: "monokai",
		extraKeys: {
			"Ctrl-D": "duplicateLine",
			"Ctrl-Space": "autocomplete"
		}
    });

	$(".btn-edit-file").on("click", function() {
		close_all_alert();
		var file_name = $("#file_name").val();
		var folder_name = $("#folder_name").val();
		var content = editor.getValue();

		$(".loading").slideToggle("fast");

		$.ajax({
			url: "<?php echo admin_url("theme/edit_file_sub/") ?>" + folder_name + "/" + file_name,
			data: "submit=Y&file_content=" + content,
			type: "POST",
			success: function(html) {

				$(".loading").slideToggle("normal");

				switch(html) {

					default :
						$(".alert-berhasil").slideToggle("normal").delay(3000).slideToggle("normal");
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Forbidden!" :
						alert("Forbidden");
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
	$(".btn-chg-file").on("click", function() {
		close_all_alert();
		var file_name = $(this).attr("id");
		var folder_name = $("#folder_name").val();
		$(".loading").slideToggle("fast");

		$.ajax({
			url: "<?php echo admin_url("theme/get_theme_file/") ?>",
			data: "folder=" + folder_name +"&file=" + file_name,
			type: "POST",
			success: function(html) {

				$(".loading").slideToggle("normal");

				switch(html) {

					default :
						$("#file_name").val(file_name);
						$(".file-name").html(file_name);
						$(".codemirror-editor").html(html);
					break;
					case "GAGAL!" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Forbidden!" :
						alert("Forbidden");
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;
		case "setting" :
?>
	var editor = CodeMirror.fromTextArea(document.getElementById("meta_tag"), {
		lineNumbers: true,
		mode: "html",
		matchBrackets: true,
		styleActiveLine: true,
		autoCloseBrackets: true,
		autoCloseTags: true,
		theme: "monokai",
		extraKeys: {
			"Ctrl-D": "duplicateLine",
			"Ctrl-Space": "autocomplete"
		}
    });

	$("input").on("focus", function() {
		$(".btn-edit2").fadeIn("normal");
	});
	$("input").on("click", function() {
		$(".btn-edit2").fadeIn("normal");
	});
	$(":not(:input)").on("focus", function() {
		$(".btn-edit2").fadeOut("normal");
	});

	function edit_s() {
		close_all_alert();
		var data = new FormData();
		data.append("site_name", $("#site_name").val());
		data.append("site_motto", $("#site_motto").val());
		data.append("site_email", $("#site_email").val());
		data.append("meta_key", $("#meta_keywords").val());
		data.append("meta_desc", $("#meta_description").val());
		data.append("favicon", $("#favicon").val());
		data.append("logo", $("#site_logo").val());
		data.append("cache", $("#cache").val());
		data.append("cache_ex", $("#cache-expiration").val());
		data.append("maintenance", $("#maintenance").val());
		data.append("user_reg", $("#user_reg").val());
		data.append("user_reg_conf", $("#user_reg_conf").val());
		data.append("com_mod", $("#com_mod").val());
		data.append("sitemap_priority", $("#sitemap_priority").val());
		data.append("sitemap_changefreq", $("#sitemap_changefreq").val());
		data.append("meta_file", $("#meta_file").val());
		data.append("meta_tag", editor.getValue());
		$(".loading").slideToggle("fast");
		$.ajax({
			url: "<?php echo admin_url("setting/edit/") ?>",
			data: data,
			type: "POST",
			processData: false,
			contentType: false,
			success: function(html) {
				$(".loading").slideToggle("normal");

				switch(html) {

					default :
						$("#form-error-msg").html(html);
						$(".alert-form-error").slideToggle("slow");
					break;
					case "1" :
						$(".alert-row").slideToggle("slow");
					break;
					case "2" :
						$(".alert-berhasil").slideToggle("slow");
						setTimeout(function() {
							window.location.reload()
						}, 2000);
					break;
					case "3" :
						$(".alert-query-ggl").slideToggle("slow");
					break;
					case "Forbidden!" :
						alert("Forbidden");
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	}

	$(".btn-edit").on("click", function() {
		edit_s();
	});
	$(".btn-edit2").on("click", function() {
		edit_s();
	});
	$(".btn-del-cache").on("click", function() {
		close_all_alert();
		$("#alertdelcache").modal("hide");
		$(".loading").slideToggle("normal");
		$.ajax({
			url: "<?php echo admin_url("setting/delete_cache/") ?>",
			success: function(html) {
				$(".loading").slideToggle("normal");

				switch(html) {

					default :
						$("#form-error-msg").html(html);
						$(".alert-form-error").slideToggle("slow");
					break;
					case "1" :
						$(".alert-berhasil").slideToggle("normal").delay(5000).slideToggle("normal");
					break;
					case "Forbidden!" :
						alert("Forbidden");
					break;
					case "Not Logged!" :
						window.location.href = "<?php echo admin_url("login/") ?>"
					break;
				}
			},
			error: function() {

				$(".loading").slideUp("normal");
				$(".alert-network").slideToggle("slow");
			}
		});
	});
<?php
		break;
	endswitch;
?>
</script>
<?php
	if (isset($js))
		echo $js;
?>