<?php echo form_tag('generales/upload', 'multipart=true') ?>
  <?php echo input_file_tag('file') ?>
  <?php echo submit_tag('Cargar') ?>
</form>    