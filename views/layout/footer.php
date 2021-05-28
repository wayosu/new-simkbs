<footer class="main-footer">
  <strong>Copyright &copy;
    <script>
      document.write(new Date().getFullYear())
    </script>
    <a href="<?= $base_url; ?>dashboard">KBS</a>.
  </strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>

</div>
<!-- jQuery -->
<script src="<?= $base_url; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $base_url; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $base_url; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $base_url; ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= $base_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $base_url; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $base_url; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?= $base_url; ?>plugins/select2/js/select2.full.min.js"></script>
<script>
  $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
  });

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });


  $("input[name=kepem_tabungan]:radio").click(function() {
    if ($('input[name=kepem_tabungan]:checked').val() == "0") {
      $('.cekKepem').attr("Disabled", true);
    } else if ($('input[name=kepem_tabungan]:checked').val() == "1") {
      $('.cekKepem').attr("Disabled", false);
    }
  });

  function fetch_select(val) {
    $.ajax({
      type: 'post',
      url: '<?= $base_url; ?>app/post/post_forFetch.php',
      data: {
        get_option: val
      },
      success: function(response) {
        if (val == '') {
          alert('Mohon pilih data dengan benar !');
        } else {
          $("#infoDataKepkel").html(response);
        }
      }
    });
  }
</script>
</body>

</html>