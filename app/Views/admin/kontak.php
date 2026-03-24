<?php $this->extend('admin/template'); ?>
<?php $this->section('content'); ?>

<div class="row">
  <div class="col-xl-12 col-xxl-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Kontak</h4>
          </div>
          <div class="card-body custom-ekeditor">
          <?php if (session()->has('success')) : ?>
              <div class="alert alert-success" role="alert">
                  <?= session('success') ?>
              </div>
          <?php endif; ?>
          <?php if (session()->has('error')) : ?>
              <div class="alert alert-danger" role="alert">
                  <?= session('error') ?>
              </div>
          <?php endif; ?>
            <form action="<?= base_url('admin/kontak/update') ?>" method="post" enctype="multipart/form-data">
              <div id="ckeditors"></div>
              <input type="hidden" name="informasi" id="informasi" value="<?= htmlspecialchars($kontak['informasi']); ?>">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form>
          </div>
      </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      var informasiInput = document.getElementById('informasi').value;
      ClassicEditor
          .create(document.querySelector('#ckeditors'), {
          })
          .then(editor => {
              editor.setData(informasiInput);
              editor.model.document.on('change:data', () => {
                  document.getElementById('informasi').value = editor.getData();
              });
          })
          .catch(error => {
              console.error(error);
          });
  });
</script>

<?php $this->endSection(); ?>