$(document).ready(function () {
    $('#lylamount').on('input', function () {
        var amount = parseInt($(this).val());

        if (amount < 100) {
            $('#lylmsg').html('Minimum amount must be $100');
            $('#lylbtn').prop('disabled', true);
        } else if (amount % 100 != 0) {
            $('#lylmsg').html('Investment amount must be in multiple of $100');
            $('#lylbtn').prop('disabled', true);
        } else {
            $('#lylmsg').html('');
            $('#lylbtn').prop('disabled', false);
        }
    })

    $('#ufdamount').on('input', function () {
        var amount = parseInt($(this).val());

        if (amount < 200) {
            $('#ufdmsg').html('Minimum amount must be $200');
            $('#ufdbtn').prop('disabled', true);
        } else if (amount % 200 != 0) {
            $('#ufdmsg').html('Investment amount must be in multiple of $200');
            $('#ufdbtn').prop('disabled', true);
        } else {
            $('#ufdmsg').html('');
            $('#ufdbtn').prop('disabled', false);
        }
    })

    $('#vstamount').on('input', function () {
        var amount = parseInt($(this).val());

        if (amount < 300) {
            $('#vstmsg').html('Minimum amount must be $300');
            $('#vstbtn').prop('disabled', true);
        } else if (amount % 300 != 0) {
            $('#vstmsg').html('Investment amount must be in multiple of $300');
            $('#vstbtn').prop('disabled', true);
        } else {
            $('#vstmsg').html('');
            $('#vstbtn').prop('disabled', false);
        }
    })

    $("#proBtn").on("click", function () {

        $(this).prop("disabled", true);
        var csrf = $("#csrf").val();
        var otp = $("#prootp").val();
        var cid = $("#cid").val();
        var url = $("#url").val();
        if (otp == "" || otp == null) {
            $(this).prop("disabled", false);
            return swal("Error", "Please Enter OTP", "error");

        }
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: csrf,
                cid: cid,
                otp: otp,
            },
            success: function (response) {
                if (response["code"] == 0) {
                    swal("Error", response["message"], "error").then(
                        function () {
                            window.location.reload();
                        }
                    );
                } else if (response["code"] == 1) {
                    swal("Bought", response["message"], "success").then(
                        function () {
                            window.location.reload();
                        }
                    );
                }
            },
        });
    });
});