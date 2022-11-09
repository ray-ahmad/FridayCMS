<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
		<div id="upload_img" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="modal-title">Pilih Foto/Gambar</h3>
					</div>
					<div class="modal-body">
						<iframe id="iframe-filemanager" src="" style="width: 100%; height: 410px;" frameborder="0"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> Tutup Modal!</button>
					</div>
				</div>
			</div>
		</div>
	</div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> <?php echo FRI_VERSION ?>
        </div>
        <strong>
		Copyright &copy;  <?php echo (FRI_RELEASE_YEAR < date("Y")) ? FRI_RELEASE_YEAR . " - " . date("Y") : FRI_RELEASE_YEAR ?> <a href="<?php echo FRI_WEBSITE ?>" target="_blank">FridayCMS</a>. Backend Template by : <a href="http://almsaeedstudio.com">Almsaeed Studio</a>. Page Rendered in {elapsed_time}
		</strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->
	<div class="scrollToTop" style="display: none;"><i class="fa fa-angle-up"></i></div>

    <!-- jQuery -->
    <script src="<?php echo ASSETS_URL ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo ASSETS_URL ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery.easing -->
    <script src="<?php echo ASSETS_URL ?>plugins/jquery.easing/jquery.easing.js"></script>
    <!-- jquery.easing -->
    <script src="<?php echo ASSETS_URL ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo ASSETS_URL ?>plugins/fastclick/fastclick.min.js"></script>
	<!-- AdminLTE App -->
    <script src="<?php echo ASSETS_URL ?>AdminLTE/dist/js/app.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo ASSETS_URL ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo ASSETS_URL ?>plugins/chartjs/Chart.min.js"></script>
	<?php 
		if (isset($datatables_id)) :
	?>
    <!-- DataTables -->
    <script src="<?php echo ASSETS_URL ?>plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS_URL ?>plugins/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<?php 
		elseif (isset($tinymce_id)) :
	?>
	<!-- Tiny MCE -->
	<script src="<?php echo ASSETS_URL ?>plugins/tinymce_4.3.11/js/tinymce/tinymce.min.js"></script>
	<script src="<?php echo ASSETS_URL ?>plugins/tinymce_4.3.11/js/tinymce/jquery.tinymce.min.js"></script>
	<?php
		elseif (isset($codemirror_id)) :
	?>
	<!-- Codemirror -->
	<script src="<?php echo assets_plug_url("codemirror/lib/codemirror.js") ?>"></script>

	<script src="<?php echo assets_plug_url("codemirror/addon/hint/show-hint.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/hint/html-hint.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/hint/css-hint.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/hint/javascript-hint.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/edit/closebrackets.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/edit/matchbrackets.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/search/search.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/search/searchcursor.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/selection/active-line.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/addon/selection/mark-selection.js") ?>"></script>

	<script src="<?php echo assets_plug_url("codemirror/keymap/sublime.js") ?>"></script>

	<script src="<?php echo assets_plug_url("codemirror/mode/xml/xml.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/mode/clike/clike.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/mode/htmlmixed/htmlmixed.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/mode/css/css.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/mode/javascript/javascript.js") ?>"></script>
	<script src="<?php echo assets_plug_url("codemirror/mode/php/php.js") ?>"></script>
	<?php
		endif;
	?>
    <!-- iCheck -->
    <script src="<?php echo ASSETS_URL ?>plugins/iCheck/icheck.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo assets_plug_url("input-mask/jquery.inputmask.js") ?>"></script>
    <script src="<?php echo assets_plug_url("input-mask/jquery.inputmask.date.extensions.js") ?>"></script>
    <script src="<?php echo assets_plug_url("input-mask/jquery.inputmask.extensions.js") ?>"></script>
	<!-- page script -->
	<script>
		$(".select2").select2();

		$(":checkbox").iCheck({
			checkboxClass: "icheckbox_square-blue",
			radioClass: "iradio_square-blue",
			increaseArea: "20%"
		});

	<?php 
		if (isset($datatables_id)) :
	?>
	
		$("#<?php echo $datatables_id ?>").DataTable({
			"autoWidth": false,
			"pagingType": "full_numbers",
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo $ajax_datatables ?>",
				"type": "POST"
			},
			"order": [[1, "asc"]],
			"columnDefs": [{
			  "targets" : "no-sort",
			  "orderable" : false
			}],
		});
	<?php
		endif;

		if (isset($tinymce_id)) :
	?>
		tinymce.init({
			mode: "textareas",
			editor_deselector : "mceNoEditor",
			height: "350",
			selector: "#<?php echo $tinymce_id ?>",
			skin: "lightgray",
			theme: "modern",
			plugins: [
				"codemirror codesample advlist autolink link image lists charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
				"table contextmenu directionality emoticons paste textcolor responsivefilemanager",
				"print autoresize youtube"
			],
			toolbar1: "code | codesample | preview | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | table",
			toolbar2: "emoticons | fontsizeselect | styleselect | link unlink anchor | responsivefilemanager image media youtube | forecolor backcolor",
			image_advtab: true,
			relative_urls: false,
			remove_script_host: false,
			fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
			external_filemanager_path: "<?php echo ASSETS_URL ?>plugins/responsive_filemanager/filemanager/",
			filemanager_title: "File Manager",
			filemanager_access_key: "",
			external_plugins: {
				"filemanager" : "<?php echo ASSETS_URL ?>plugins/responsive_filemanager/filemanager/plugin.min.js",
				"codemirror" : "plugins/codemirror/plugin.min.js"
			},
			codemirror: {
				indentOnInit: true,
				path: '<?php echo assets_plug_url("codemirror") ?>',
				config: {
					lineNumbers: true,
					matchBrackets: true,
					styleActiveLine: true,
					autoCloseBrackets: true,
					autoCloseTags: true,
					extraKeys: {
						"Ctrl-D": "duplicateLine",
					}
				},
				jsFiles: [
					"addon/edit/closebrackets.js",
					"addon/selection/mark-selection.js",
					"keymap/sublime.js",
				],
			},

		});
	<?php 
		endif;
	?>
		$("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
		$("#datemask2").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	</script>
	<?php 
		include ASSETS_FOLDER . "/js/js.php";
	?>
  </body>
</html>
