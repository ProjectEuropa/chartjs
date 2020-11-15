$(function () {
    $("#prefecture").on("change", function () {
        $("#city").hide();
        $("#city").empty();
        $("#ward").hide();
        $("#ward").empty();
        $("#city").append('<option value="0" selected>全域</option>');
        optval = $(this).val();
        $.get({
            url: "/ajax/prefecture/" + optval,
            dataType: "json",
        }).done(function (datas) {
            if (datas != "") {
                $("#city").show();
                $.each(datas, function (key, item) {
                    $("#city").append(
                        '<option value="' +
                            item.id +
                            '">' +
                            item.name +
                            "</option>"
                    );
                });
            }
        });
    });

    $("#city").on("change", function () {
        $("#ward").empty();
        $("#ward").hide();
        $("#ward").append('<option value="0" selected>全域</option>');
        optval = $(this).val();
        $.get({
            url: "/ajax/city/" + optval,
            dataType: "json",
        }).done(function (datas) {
            if (datas != "") {
                $("#ward").show();
                $.each(datas, function (key, item) {
                    $("#ward").append(
                        '<option value="' +
                            item.id +
                            '">' +
                            item.name +
                            "</option>"
                    );
                });
            }
        });
    });
});
