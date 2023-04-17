<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/libs/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/libs/datatable/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vendor/libs/jquery/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('vendor/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('vendor/libs/jquery/validate/additional-methods.js') }}"></script>
<script src="{{ asset('vendor/libs/jquery/validate/localization/messages_id.js') }}"></script>
<script src="{{ asset('vendor/libs/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/libs/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond.jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script src="{{ asset('vendor/js/menu.js') }}"></script>
<!-- endbuild -->
<script>
    $(function() {
        console.log('%c Hayooo mau ngapain.. wkwkwk, mau ngutek-ngutek ya. Gaboleh loh',
            'color: white; background-color: red');
             const notifications = localStorage.getItem('notifications')
             if(!notifications){
                localStorage.setItem('notifications',0)
             }
          if (notifications != 0) {
              $('#notification-count').text(notifications);
          }
    })
     var notificationsWrapper = $('#notification-count');
      var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount = parseInt($('#notification-count').data('count'));
      console.log($('#notification-count').data('count'));
</script>

<!-- Vendors JS -->
{{-- <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script> --}}

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('3517bb3b91fb20ab176c', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind("App\\Events\\SuratBroadcast", function(data) {});
    channel.bind('pusher:subscription_succeeded', function(data) {});


    channel.bind('my-event', function(data) {
         $('#liveToast').toast('show');
        notifications = parseInt(localStorage.getItem('notifications'));
        notifications += 1;
        console.log(localStorage.getItem('notifications'))
        localStorage.setItem("notifications", notifications);
        notificationsWrapper.attr('data-count', notifications);
        notificationsWrapper.text(notifications);
    });
</script>

<!-- Page JS -->
<script src="{{ asset('js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
