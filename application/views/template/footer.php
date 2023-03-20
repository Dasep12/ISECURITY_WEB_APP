       <!-- Main content -->

       <!-- /.content -->
       </div>
       <!-- /.content-wrapper -->

       <footer class="main-footer fixed ">
           <div class="float-right d-none d-sm-block">
               <b>Version</b> 1.0.0
           </div>
           <strong>Copyright &copy; 2022 <a href="#">Security Guard Tour</a></strong>
       </footer>

       </div>
       <!-- ./wrapper -->


       <!-- Bootstrap 4 -->
       <script src="<?= base_url('assets') ?>/dist/js/bootstrap.min.js"></script>
       <!--<script src="<?= base_url('assets') ?>/dist/js/bootstrap.bundle.min.js"></script>-->
       <!-- AdminLTE App -->
       <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js?<?= date('Y-m-d H:i:s') ?>"></script>
       <!-- AdminLTE for demo purposes -->
       <script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
       <!-- DataTables  & Plugins -->
       <script src="<?= base_url('assets') ?>/dist/js/vendor/jszip/jszip.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/jquery.dataTables.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/dataTables.bootstrap4.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/dataTables.responsive.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/responsive.bootstrap4.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/dataTables.buttons.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/buttons.bootstrap4.min.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/buttons.print.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/buttons.html5.js"></script>
       <!-- Select2 -->
       <script src="<?= base_url('assets') ?>/dist/select2/js/select2.full.min.js"></script>
       <!-- date-range-picker -->
       <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
       <script src="<?= base_url('assets') ?>/dist/js/sgt.js"></script>
       </body>

       <script>
           $.ajax({
               url: "<?= base_url('Laporan_Abnormal/total_temuan') ?>",
               type: 'GET',
               dataType: 'json', // added data type
               success: function(res) {
                   $('#badge_total_temuan').text(res['total_temuan'])
               }
           });
       </script>

       </html>