<footer class="main-footer">
  <strong>Copyright &copy;
    <script>
      document.write(new Date().getFullYear());
    </script>
    <a href="<?= $base_url; ?>dashboard">KBS</a>.
  </strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Versi</b> 1.0
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
  $("#example2").DataTable({
    "responsive": true,
    "autoWidth": false,
  });
  $("#example3").DataTable({
    "responsive": true,
    "autoWidth": false,
  });
  $("#example4").DataTable({
    "responsive": true,
    "autoWidth": false,
  });

  $(".example2").DataTable({
    "responsive": true,
    "autoWidth": false,
  });
  $(".example3").DataTable({
    "responsive": true,
    "autoWidth": false,
  });

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });

  if ($('input[name=kepem_tabungan]:checked').val() == "0") {
    $('.cekKepem').attr("Disabled", true);
  } else if ($('input[name=kepem_tabungan]:checked').val() == "1") {
    $('.cekKepem').attr("Disabled", false);
  }

  if ($('input[name=penerima_bantuan]:checked').val() == "0") {
    $('.ceks').attr("Disabled", true);
  } else if ($('input[name=penerima_bantuan]:checked').val() == "1") {
    $('.ceks').attr("Disabled", false);
  }

  $("input[name=kepem_tabungan]:radio").click(function() {
    if ($('input[name=kepem_tabungan]:checked').val() == "0") {
      $('.cekKepem').attr("Disabled", true);
    } else if ($('input[name=kepem_tabungan]:checked').val() == "1") {
      $('.cekKepem').attr("Disabled", false);
    }
  });
  $("input[name=penerima_bantuan]:radio").click(function() {
    if ($('input[name=penerima_bantuan]:checked').val() == "0") {
      $('.ceks').attr("Disabled", true);
    } else if ($('input[name=penerima_bantuan]:checked').val() == "1") {
      $('.ceks').attr("Disabled", false);
    }
  });

  $(".jkjk").change(function() {
    if ($(this).val() == "3") {
      const html = `
        <div class="form-group" id="jkjkjk">
            <label>Ibu Hamil ?</label>
            <div style="margin-bottom:-9.5px;">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ibu_hamil" value="1">
                <label class="form-check-label">Ya</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ibu_hamil" value="0">
                <label class="form-check-label">Tidak</label>
              </div>
            </div>
        </div>
      `;
      $(".formjkjk").append(html);
    } else {
      $("#jkjkjk").remove();
    }
  });

  $(".jkjk").change(function() {
    if ($(this).val() == "3") {
      $("#dataKonsumsi").hide();
      $("#dataTabunganBantuan").hide();
    } else if ($(this).val() == "9") {
      $("#dataKonsumsi").hide();
      $("#dataTabunganBantuan").hide();
    } else if ($(this).val() == "7") {
      $("#dataKonsumsi").hide();
      $("#dataTabunganBantuan").hide();
    } else if ($(this).val() == "6") {
      $("#dataKonsumsi").hide();
      $("#dataTabunganBantuan").hide();
    } else if ($(this).val() == "4") {
      $("#dataKonsumsi").hide();
      $("#dataTabunganBantuan").hide();
    } else {
      $("#dataKonsumsi").show();
      $("#dataTabunganBantuan").show();
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