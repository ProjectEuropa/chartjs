$(function () {
    $("#prefecture").on("change", function () {
        $("#city").hide();
        $("#city").empty();
        $("#label-city").hide();
        $("#ward").hide();
        $("#ward").empty();
        $("#label-ward").hide();
        $("#name").hide();
        $("#label-name").hide();
        $("#type").hide();
        $("#label-type").hide();
        optval = $(this).val();
        $.get({
            url: "/ajax/prefecture/" + optval,
            dataType: "json",
        }).done(function (datas) {
            if (datas != "") {
                $("#city").show();
                $("#label-city").show();
                $("#city").append("<option>--選んでください--</option>");
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
        $("#label-ward").hide();
        $("#name").hide();
        $("#label-name").hide();
        $("#type").hide();
        $("#label-type").hide();
        optval = $(this).val();
        $.get({
            url: "/ajax/city/" + optval,
            dataType: "json",
        }).done(function (datas) {
            if (datas != "") {
                $("#ward").show();
                $("#label-ward").show();
                $("#ward").append(
                    "<option selected>--選んでください--</option>"
                );
                $.each(datas, function (key, item) {
                    $("#ward").append(
                        '<option value="' +
                            item.id +
                            '">' +
                            item.name +
                            "</option>"
                    );
                });
            } else {
                $("#name").show();
                $("#label-name").show();
                $("#submit-button").show();
                $("#type").show();
                $("#label-type").show();
            }
        });
    });

    $("#ward").on("change", function () {
        $("#name").show();
        $("#label-name").show();
        $("#submit-button").show();
        $("#label-type").show();
        $("#type").show();
    });
});

function editUser(id) {
    location.href = "/user/" + id + "/edit";
}
