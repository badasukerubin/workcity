<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        demo.initChartist();
        if (typeof (Storage)!== 'undefined'){
            var rel = localStorage.getItem('reload');
            if (rel == null){
                var ran = Math.floor((Math.random()*1000000000000)+1)
                localStorage.setItem('reload', ran);
                $.notify({
                    message: "Welcome <b> {{ Auth::user()->fullname }} </b> - contact Toluwani if you encounter any problems."
                },{
                    type: 'success',
                    timer: 4000
                });
            }

            setTimeout(function(){localStorage.clear();}, 24*60*60);
//            alert(localStorage.getItem('reload'))
        }else {
            alert('Sorry, no web support for Local Storage!')
        }

    });
</script>