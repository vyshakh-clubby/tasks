{{--<script src="{{ URL::to('assets/plugins/jquery/dist/jquery.min.js') }}"></script>--}}
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

<script src="{{ URL::to('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::to('assets/plugins/tether/dist/js/tether.min.js') }}"></script>



<!-- Required Fremwork -->
<script src="{{ URL::to('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>



<!-- waves effects.js -->
<script src="{{ URL::to('assets/plugins/Waves/waves.min.js') }}"></script>


<!-- Scrollbar JS-->
<script src="{{ URL::to('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ URL::to('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>


<!--classic JS-->
<script src="{{ URL::to('assets/plugins/classie/classie.js') }}"></script>

<!-- notification -->
<script src="{{ URL::to('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>



<!-- Rickshaw Chart js -->
{{--<script src="{{ URL::to('assets/plugins/d3/d3.js') }}"></script>--}}
{{--<script src="{{ URL::to('assets/plugins/rickshaw/rickshaw.js') }}"></script>--}}



<!-- Sparkline charts -->
{{--<script src="{{ URL::to('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"') }}"></script>--}}


<!-- Counter js  -->
<script src="{{ URL::to('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ URL::to('assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

<!-- custom js -->
<script src="{{ URL::to('assets/js/main.min.js') }}"></script>
{{--<script src="{{ URL::to('assets/pages/dashboard.js') }}"></script>--}}
<script src="{{ URL::to('assets/pages/elements.js') }}"></script>
<script src="{{ URL::to('assets/js/menu.min.js') }}"></script>

<script>
    function removeloader(){
        alert("ds")
    }
</script>

@yield('scripts')
