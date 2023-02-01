$(document).ready(function () {
    // Fetch account data through Account  # 
    $("#btn_Account").click(function () {
        $(this).hide();
        var account_number = $('#account_number')[0].value;
        var formData = { 'account_number': account_number };
        // ajax call
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            type: "POST",
            url: '/account/viaAccount',
            data: formData,
            success: function (response) {
                console.log(response);
                // $("#email").attr("disabled", true);
                $('#info').removeClass("hide");
                $('#otpBtn').removeClass("hide");
                $('#title').html('Account Title: ' + response.data[0].Title);
                $('#accountNumber').html('Account  Number: ' + response.data[0].account_number);
            }
        });
    });
    // Fetch account data through Mobile # 
    $("#btn_phone").click(function () {
        $(this).hide();
        var mobile = $('#mobile')[0].value;
        var formData = { 'mobile': mobile };
        // ajax call
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            type: "POST",
            url: '/banking/account/viaMobile',
            data: formData,
            success: function (response) {
                console.log(response);
                // $("#email").attr("disabled", true);
                $('#info').removeClass("hide");
                $('#otpBtn').removeClass("hide");
                $('#title').html('Account Title: ' + response.data[0].Title);
                $('#accountNumber').html('Account  Number: ' + response.data[0].account_number);
            }
        });
    });
    // Fetch account data through email 
    $("#btn").click(function () {
        $(this).hide();
        var email = $('#email')[0].value;
        var formData = { 'email': email };
        // ajax call
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            type: "POST",
            url: '/account/viaEmail',
            data: formData,
            success: function (response) {
                console.log(response);
                // $("#email").attr("disabled", true);
                $('#info').removeClass("hide");
                $('#otpBtn').removeClass("hide");
                $('#title').html('Account Title: ' + response.data[0].Title);
                $('#accountNumber').html('Account  Number: ' + response.data[0].account_number);
            }
        });
    });

    // PIN generate ajax setup
    $("#btn2").click(function () {
        $(this).hide();
        // ajax call
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            type: "GET",
            url: '/generate/PIN',

            success: function (response) {
                // alert(response.success);
                $('#info2').removeClass("hide");
                $('#pinShow').html('Generated PIN: ' + response.otp);
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', "a.delete", function (e) {
        e.preventDefault();
        var $this = $(this);
        $(this).closest("tr").remove();
        jQuery.ajax({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            alert(data.success);
            console.log(data.success);
        });
    });

});