$(document).ready(function () {


    // PIN generate ajax setup
    $("#btn_bill").click(function () {
        $(this).hide();
        var utility_id = $('#utility')[0].value;
        var consumer_number = $('#consumer_number')[0].value;


        var formData = { 'utility_id': utility_id, 'consumer_number': consumer_number };
        // ajax call
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            type: "POST",
            url: '/get/bill',
            data: formData,
            success: function (response) {
                console.log(response);
                // $("#email").attr("disabled", true);
                $('#info').removeClass("hide");
                $('#otpBtn').removeClass("hide");
                $('#amountSpan').html('Amount: ' + response.data.amount);
                $('#amount').val(response.data.amount);
                $('#consumer_name').html('Consumer Name: ' + response.data.consumer_name);
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