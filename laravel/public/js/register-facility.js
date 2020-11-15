$(function () {
    $("#prefecture").on("change", function () {
        $("#city").hide();
        $("#city").empty();
        optval = $(this).val();
        $.get({
            url: "/ajax/prefecture/" + optval,
            dataType: "json",
        }).done(function (datas) {
            if (datas != "") {
                $("#city").show();
                $("#city").append("<option>--選択してください--</option>");
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
        $("#facility").empty();
        $("#facility").hide();
        optval = $(this).val();
        $.get({
            url: "/ajax/facility/city/" + optval,
            dataType: "json",
        }).done(function (datas) {
            if (datas != "") {
                $("#facility").show();
                $("#submit-button").show();
                $.each(datas, function (key, item) {
                    $("#facility").append(
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
