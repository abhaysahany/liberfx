<!--**********************************
            Footer start
        ***********************************-->
<div class="footer style-1">
    <div class="copyright">
        <p>Copyright ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            {{ config('detailsApp.name') }}, All Right Reserved
        </p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="{{ asset('uassets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('uassets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('uassets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('uassets/vendor/datatables/responsive/responsive.js') }}"></script>
<script src="{{ asset('uassets/js/plugins-init/datatables.init.js') }}"></script>


<!-- Apex Chart -->
<script src="{{ asset('uassets/vendor/apexchart/apexchart.js') }}"></script>
<script src="{{ asset('uassets/vendor/chart-js/chart.bundle.min.js') }}"></script>

<!-- counter -->
<script src="{{ asset('uassets/vendor/counter/counter.min.js') }}"></script>
<script src="{{ asset('uassets/vendor/counter/waypoint.min.js') }}"></script>


<!-- Chart piety plugin files -->
{{-- <script src="{{asset('uassets/vendor/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('uassets/vendor/swiper/js/swiper-bundle.min.js')}}"></script> --}}
<script src="{{ asset('uassets/vendor/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('uassets/js/dashboard/trading-market.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('uassets/js/dashboard/dashboard-1.js') }}"></script>
<script src="{{ asset('uassets/js/custom.min.js') }}"></script>
<script src="{{ asset('uassets/js/dlabnav-init.js') }}"></script>
<script src="{{ asset('uassets/js/demo.js') }}"></script>
<script src="{{ asset('uassets/js/main.js') }}"></script>
{{-- <script src="{{asset('uassets/js/styleSwitcher.js')}}"></script> --}}
<script>
    jQuery(document).ready(function() {
        setTimeout(function() {
            dlabSettingsOptions.version = 'dark';
            new dlabSettings(dlabSettingsOptions);
            setCookie('version', 'dark');
        }, 1500000)
    });
</script>
<script>
    $(function() {
        $('.myForm').on('submit', function() {
            $('.subBtn').attr('disabled', true);
            $('.subBtn').html('Wait! Processing');
        })

        $('#userid_b').on('input', function() {
            var memberid = $(this).val();
            var csrf = $('.csrf').val();
            if (memberid.length == 0) {
                $('#memMsg_b').html('');
                $('.transBtn').attr('disabled', false);
            }
            $.ajax({
                url: '/getMember',
                type: 'POST',
                data: {
                    'memberid': memberid,
                    _token: csrf,
                },
                success: function(response) {
                    $('#memMsg_b').html(response['data']);
                    $('#memName_b').html(response['name']);

                    if (response['code'] == 0) {
                        $('.transBtn').attr('disabled', true);
                    } else {
                        $('.transBtn').attr('disabled', false);
                    }
                }
            });
        });
        $('#userid_r').on('input', function() {
            var memberid = $(this).val();
            var csrf = $('.csrf').val();
            if (memberid.length == 0) {
                $('#memMsg_r').html('');
                $('.transBtn').attr('disabled', false);
            }
            $.ajax({
                url: '/getMember',
                type: 'POST',
                data: {
                    'memberid': memberid,
                    _token: csrf,
                },
                success: function(response) {
                    $('#memMsg_r').html(response['data']);
                    $('#memName_r').html(response['name']);

                    if (response['code'] == 0) {
                        $('.transBtn').attr('disabled', true);
                    } else {
                        $('.transBtn').attr('disabled', false);
                    }
                }
            });
        });
        $('#userid_t').on('input', function() {
            var memberid = $(this).val();
            var csrf = $('.csrf').val();
            if (memberid.length == 0) {
                $('#memMsg_t').html('');
                $('.transBtn').attr('disabled', false);
            }
            $.ajax({
                url: '/getMember',
                type: 'POST',
                data: {
                    'memberid': memberid,
                    _token: csrf,
                },
                success: function(response) {
                    $('#memMsg_t').html(response['data']);
                    $('#memName_t').html(response['name']);

                    if (response['code'] == 0) {
                        $('.transBtn').attr('disabled', true);
                    } else {
                        $('.transBtn').attr('disabled', false);
                    }
                }
            });
        });

        //Breal leanding with dynamic deduction
        $('#break_amount').on('input', function() {
            var amount = parseInt($(this).val());
            var invest = parseInt($('#amount').val());
            var rate = parseInt($('#rate').val());
            var totamount = amount - (amount / 100 * rate)
            if (amount > 0 && amount <= invest) {
                $('#brkText').html('Total available amount for lending break ( ' + rate +
                    '% deduction ) - $' + totamount).append('<br />');
            } else if (amount > 0 && amount > invest) {
                $('#brkText').html('Break amount can not be greater than invested amount').append(
                    '<br />');
            } else {
                $('#brkText').html('');
            }
            if (amount > 0 && amount % 50 != 0) {
                $('#brkText2').html('Break amount must be multiple of $50');
            } else {
                $('#brkText2').html('');
            }

        });

        //fund transfer memberid check
        $('#fundmemberid').on('input', function() {
            var memberid = $(this).val();
            var csrf = $('#csrf').val();
            if (memberid.length == 0) {
                $('#memMsg').html('');
                $('#transBtn').attr('disabled', false);
            }
            $.ajax({
                url: '/getMember',
                type: 'POST',
                data: {
                    'memberid': memberid,
                    _token: csrf,
                },
                success: function(response) {
                    $('#memMsg').html(response['data']);
                    if (response['code'] == 0) {
                        $('#transBtn').attr('disabled', true);
                    } else {
                        $('#transBtn').attr('disabled', false);
                    }
                }
            });
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#copyWalletAddressId').on('click', function() {
            var text = $('#codeRight').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgAddress').html('Text Copied')
        });

        $('#copyWallAddressId').on('click', function() {
            var text = $('#codeLeft').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgAddress2').html('Text Copied')
        });

        $('#copyWalletAddId').on('click', function() {
            var text = $('#codeMain').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgAddress3').html('Text Copied')
        });

        $('#copyWalletAddId4').on('click', function() {
            var text = $('#codeMain4').text()
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
            $('#msgAddress4').html('Text Copied')
        });
    })
</script>

</body>

</html>
