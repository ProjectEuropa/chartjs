var items = [
    "user-count",
    "user-family-count",
    "staff-count",
    "staff-family-count",
    "positive-user-count",
    "positive-user-family-count",
    "positive-staff-count",
    "positive-staff-family-count",
    "target-user-count",
    "target-user-family-count",
    "target-staff-count",
    "target-staff-family-count",
    "ppe-visit",
    "ppe-used",
    "q1-1",
    "q1-2",
    "q1-3",
    "q1-4",
    "q1-5",
    "q2-1",
    "q2-2",
    "q2-3",
    "q2-4",
];

items.forEach(function (item) {
    $(function () {
        $("#" + item).on("change", function () {
            $("#badge-" + item).show();
        });
    });
});
