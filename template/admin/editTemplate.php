<link rel="stylesheet" href="<?php echo base_url('assets/codemirror/codemirror.css'); ?>">

<h3 class='header'>Edit Template</h3>
<form method='POST' class='ui form'>
  <div class='field'>
    <textarea id='code' rows='25' name='isiFile' onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}"><?php echo str_replace('\r\n','<br>',htmlspecialchars($data,ENT_QUOTES)); ?></textarea>
  </div>
  <button type='submit' name='submit' class='ui primary button'>Simpan</button>
</form>
<script src="<?php echo base_url('assets/codemirror/codemirror.js'); ?>"></script>
<script src="<?php echo base_url('assets/codemirror/mode/htmlmixed/htmlmixed.js'); ?>"></script>
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    mode: "htmlmixed"
  });
</script>
