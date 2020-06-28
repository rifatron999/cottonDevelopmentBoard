<script src="{{ asset('assets/administration/js/jquery.js') }}"></script>
<script src="{{ asset('assets/administration/js/jquery-1.8.3.min.js') }}"></script>
{{-- jquery ui for date --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{-- jquery ui for date end--}}
<script src="{{ asset('assets/administration/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('assets/administration/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('assets/administration/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets/administration/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/administration/js/jquery.sparkline.js') }}"></script>


<!--common script for all pages-->
<script src="{{ asset('assets/administration/js/common-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/administration/js/gritter/js/jquery.gritter.js') }}"></script> {{--gritter--}}
<script type="text/javascript" src="{{ asset('assets/administration/js/gritter-conf.js') }}"></script> {{--gritter--}}

<!--script for this page-->
<script src="{{ asset('assets/administration/js/sparkline-chart.js') }}"></script>
<script src="{{ asset('assets/administration/js/zabuto_calendar.js') }}"></script>
<script src="{{ asset('assets/administration/js/chart-master/Chart.js') }}"></script> {{--chart--}}
<script src="{{ asset('assets/administration/js/chartjs-conf.js') }}"></script> {{--chart--}}

{{--date range picker--}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
{{--date range picker--}}


{{-- datatables --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>{{--datatables--}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
{{-- datatables --}}



<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
