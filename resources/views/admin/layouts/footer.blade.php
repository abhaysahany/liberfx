<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Liberfx
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
{{-- <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div> --}}

<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<script src="{{ asset('adm_assets/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('adm_assets/assets/js/app.min.js') }}"></script>

<!-- Datatables js -->
<script src="{{ asset('adm_assets/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adm_assets/assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('adm_assets/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adm_assets/assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable Init js -->
<script src="{{ asset('adm_assets/assets/js/pages/demo.datatable-init.js') }}"></script>

<!-- third party js -->
<script src="{{ asset('adm_assets/assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('adm_assets/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('adm_assets/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('adm_assets/assets/js/pages/demo.dashboard.js') }}"></script>
<!-- end demo js-->

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- DataTable Script CDN Link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script> --}}

{{-- <script>
    $(document).ready(() => {
        const myTable = $('.table').dataTable({
            stateSave: true
        });
        const allPagesCheckboxes = myTable.fnGetNodes();
        console.log(allPagesCheckboxes);
        $('.checkAll').click(function() {
            const thisText = $(this).text();
            if (thisText === "Unselect All") {
                $('input[type="checkbox"]', allPagesCheckboxes)
                    .attr('checked', false);
                $(this).text('Select All');
            } else {
                $('input[type="checkbox"]', allPagesCheckboxes)
                    .attr('checked', true);
                $(this).text('Unselect All');
            }

        });
    });
</script> --}}
<script>
    $(document).ready(function() {
        //fund transfer memberid check
        $('#memberid').on('input', function() {
            var memberid = $(this).val();
            var csrf = $('#csrf').val();

            $.ajax({
                url: '/getMember',
                type: 'POST',
                data: {
                    'memberid': memberid,
                    _token: csrf,
                },
                success: function(response) {
                    $('#memMsg').html(response['data']);

                }
            });
        });

        $('.checkAll').click(function() {
            if (this.checked) {
                $("input[type='checkbox']").prop("checked", true);
            } else {
                $("input[type='checkbox']").prop("checked", false);
            }
        });

    });
</script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.packView').click(function() {
            var id = $(this).prop('id');
            $('.mySec' + id).toggle();
        });

        //Breal leanding with dynamic deduction
        $('#break_amount').on('input', function() {
            var amount = parseInt($(this).val());
            var invest = parseInt($('#amount').val());
            var rate = parseInt($('#rate').val());
            var totamount = amount - (amount / 100 * rate)
            if (amount > 0 && amount <= invest) {
                $('#brkText').html('Total available amount for lending break ( ' + rate +
                    '% deduction ) - $' + totamount);
            } else if (amount > 0 && amount > invest) {
                $('#brkText').html('Break amount can not be greater than inested amount');
            } else {
                $('#brkText').html('');
            }

        });
    })
</script>
