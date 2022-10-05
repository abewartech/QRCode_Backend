<link rel="stylesheet" type="text/css" href="{{ asset('packages/bootstrap-daterangepicker/daterangepicker.css') }}" />
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#downloaddModal">
    <span class="ladda-label"><i class="las la-download"></i> Export Detail</span>
</button>
@push('after_scripts')
<div class="modal fade" id="downloaddModal" tabindex="-1" aria-labelledby="downloaddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="downloaddModalLabel">Export Attendance </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="la la-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="import_file">Download</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('packages/moment/min/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('packages/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script>
    var start = moment().subtract(29, 'days');
    var end = moment();
    $(function () {

        $('input[name="daterange"]').daterangepicker({
            startDate: start,
            endDate: end,
            opens: 'left',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, function (starta, enda, label) {
            start = starta;
            end = enda;
        });

        $('#import_file').on('click', function (e) {
            window.location = `attendance/export/${start.format('YYYY-MM-DD')}/${end
                    .format('YYYY-MM-DD')}`;
        });
    });

</script>
@endpush
