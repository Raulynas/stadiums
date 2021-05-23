// $(function() {
//     let city = $(".input-field option:selected").text();
//     $(".input-field").on("change", function(){
//         console.log(city);
//     })

const { toString, endsWith, values } = require("lodash");

// });



$(function() {
    let selections = [];
    let bookings = [];

    $(".input-field").on("change", function() {
        let city = $(".input-field select option:selected").val();
        $(".city-filter").attr("action", "/stadiums/" + city);
        $(".city-filter").trigger("submit");
    });

    $(".stadium-select").on("click", function() {
        $(this)
            .addClass("selected")
            .siblings()
            .removeClass("selected");
        $(".date-picker").removeClass("active");
        let selectedCity = $(".input-field").val();
        let selectedStadium = $(this).text();
        $(".day-times").hide();
        $(".date-picker").attr("stadium-id", selectedStadium);
        $(".booking").attr("data-stadium", selectedCity);
        $(".date-line").removeClass("hidden");
    });

    $(".date-picker").on("click", function() {
        function selectedClassValidation() {
            let timeLineSelections = $(".booking");
            if (timeLineSelections.length != 0) {
                $.each(timeLineSelections, function(index, item) {
                    $(this).removeClass("selected-booking");
                    $(this).text("Select");

                    let city = $.trim(item.dataset.city);
                    let stadium = $.trim(item.dataset.stadium);
                    let date = $.trim(item.dataset.date);
                    let time = $.trim(item.dataset.time);

                    $.each(bookings, function(index, item) {
                        if (
                            city == item[0] &&
                            stadium == item[1] &&
                            date == item[2] &&
                            time == item[3]
                        ) {
                            console.log(bookings);
                            console.log("asdf");
                            $(this).addClass("selected-booking");
                        }
                    });
                    // if (city == booking[0], stadium == booking[2],) {
                    //     console.log("equalts ");
                    // }
                });
            }
            // $.each(timeLineSelections, function(item) {
            //     if (item.dataset.city == "Vilnius") {
            //         console.log("the same");
            //     } else {
            //         console.log("not same");
            //     }
            // });
        }

        selectedClassValidation();

        $(this)
            .addClass("active")
            .siblings()
            .removeClass("active");
        let city = $(this).attr("city-id");
        let stadium = $(this).attr("stadium-id");
        let date = $(this).attr("date-id");
        $(".display-date").text(date);
        $(".booking").attr("data-date", date);
        $(".booking").attr("data-stadium", stadium);
        $(".display-summary").text(stadium);
        $(".day-times").hide();
        $(".day-times").slideDown(800);
    });

    $(".booking").on("click", function() {
        bookings = [];
        function updateSelection() {
            selections = $(".day-times .selected-booking");
            $.each(selections, function(index, item) {
                bookings.push([
                    $.trim(item.dataset.city),
                    $.trim(item.dataset.stadium),
                    $.trim(item.dataset.date),
                    $.trim(item.dataset.time)
                ]);
            });
            // console.log(selections);
            // console.log(bookings);
        }

        if ($(this).hasClass("selected-booking")) {
            $(this).removeClass("selected-booking");
            $(this).text("Select");
            updateSelection();
            $(".total-bookings").text(selections.length);
            return;
        }

        if (typeof selections == "undefined" || selections.length < 3) {
            $(this).addClass("selected-booking");
            $(this).text("Selected");
            updateSelection();
        } else {
            alert("you can select up to 3 time slots.");
        }
    });
});
