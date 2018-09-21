<!-- Core JS Files -->
<script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

<!-- Charts Plugin -->
<script src="{{ asset('js/chartist.min.js') }}"></script>

<!-- Notifications Plugin -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<!-- Google Maps Plugin -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('js/paper-dashboard.js') }}"></script>

<script type="text/javascript">
  if(window.location.href.startsWith("http://hireme.laravel/offers/")) {
    $(document).ready(function(){
        $.notify({
            icon: 'ti-pulse',
            message: "This offers was applied for other users just a moment ago."
          },{
              type: 'warning',
              timer: 4000,
              placement: {
                  from: 'top',
                  align: 'center'
              }
          });
    });
  }
</script>
