<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

?>
<textarea id="theme_file" class="form-control file_contents" name="content" style="width: 100%; height: 450px;" required><?php echo htmlentities($file_content) ?></textarea>
<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("theme_file"), {
		lineNumbers: true,
		mode: "php",
		matchBrackets: true,
		styleActiveLine: true,
		autoCloseBrackets: true,
		autoCloseTags: true,
		theme: "monokai",
    });
</script>