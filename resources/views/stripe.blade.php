@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .hide{
            display: none
        }
        a.list-group-item, button.list-group-item {
    border: 0;
    padding-top: 30px;
}
    </style>
 <div class="right_col" role="main" style="min-height: 800px">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Payment</h3>
              </div>

            </div>

            <div class="clearfix"></div>

   <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title" style="display: inline-flex; width: 100%">
                   <h3 class="panel-title display-td" style="color: #4a4f50;width: 30%">Payment Details</h3>
                       <div class="icon-container" style="padding-top: 10px">
              <i class="fab fa-cc-visa" style="color:navy;font-size:32px;" ></i>
              <i class="fab fa-cc-mastercard" style="color:red;font-size:32px;"></i>
            </div>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
  
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
           
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{config('stripe.pk')}}"
                                                    id="payment-form" style="color: #4a4f50">
                        @csrf
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required' style="width: 100%">
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text' required>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group  required' style="width: 100%">
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' required>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <select  class='form-control card-expiry-month' required>
                                    <option value="">MM</option>
                                    @for($i=1;$i<13;$i++)
                                    <option>{{$i}}</option>
                                    @endfor
                                </select>

                              <!--    <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text -->
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <select class='form-control card-expiry-year' required>
                                    <option value="">YYYY</option>
                                    @for($i=0;$i<40;$i++)
                                    <option> {{date("Y")+$i}}</option>
                                    @endfor
                                </select>
                                 
                            </div>
                            
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group  required' style="width: 100%">
                                <label class='control-label'>Membership</label> 
                                <select readonly name='membership' required class="form-control">
                                  @switch($package)
                                        @case(99)
                                    <option value="99">One Time Subscription</option>
                                        @break
                                        @case(6)
                                    <option value="6">6 Months Subscription</option>
                                        @break
                                        @case(12)
                                    <option value="12">12 Months Subscription</option>
                                        @break
                                @endswitch
                                </select>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-xs-3">
                                <button class="btn btn-success btn-block" type="submit" >Pay Now</button>
                            </div>
                        </div>
                       
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      </div>
  </div>
</div>
  </div>
</div>
</div>

</body>
@endsection()
@section('footer')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]', 'select',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
</html>
@endsection()