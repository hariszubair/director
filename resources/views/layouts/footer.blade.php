
        <!-- footer content -->
        <footer style="">
          <div class="pull-right">
            Eustaceai</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('public/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{ asset('public/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('public/js/nprogress.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('public/js/custom.min.js')}}"></script>
      <script src="{{asset('public/js/datepicker.min.js')}}"></script>
       <script src="{{asset('public/js/jquery.inputmask.bundle.js')}}"></script>
      <script type="text/javascript">
  $(document).ready(function(){
     $('.number_only').on('input',function(event) {
 var patt=/^[\d]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^\d]/g, '')); 
              
    }
    });

  $('.decimal_only').on('input',function(event) {
    // x.replace(/[^.\d]/g, '').replace(/^(\d*\.?)|(\d*)\.?/g, "$1$2")
         var patt=/^[\d\.]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^.\d]/g, '')); 
    }
  });
   $('.minus_number_only').on('input',function(event) {
    // x.replace(/[^.\d]/g, '').replace(/^(\d*\.?)|(\d*)\.?/g, "$1$2")
         var patt=/^[\d\.]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^.-\d]/g, '')); 
    }
  });
    $('.right_col').height($(window).height()-10);
});
</script>
  </body>
</html>