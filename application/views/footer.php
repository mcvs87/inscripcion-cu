<!-- Footer -->
</div>
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">
        UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO<br>
        Facultad de Ingeniería<br>
    </div>
    <!-- /.container -->
  </footer>

 
  <?php foreach ($jsFooter as $js): ?>
   <script src="<?= base_url('librerias/js/'.$js.'');?>"></script>
  <?php endforeach ?>
  
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</body>

</html>
