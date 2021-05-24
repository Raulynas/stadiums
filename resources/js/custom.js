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
    function updateSelection() {
        bookings = [];
        selections = $(".day-times .selected-booking");
        $.each(selections, function(index, item) {
            bookings.push([
                // $.trim(item.dataset.city),
                // $.trim(item.dataset.stadium),
                $.trim(item.dataset.date) + " " + $.trim(item.dataset.time)
            ]);
        });
        console.log(selections);
        console.log(bookings);

        if (bookings.length > 0) {
            $(".regBtn").removeClass("disabled");
        } else {
            $(".regBtn").addClass("disabled");
        }
    }

    $(".input-field").on("change", function() {
        let city = $(".input-field select option:selected").val();
        $(".city-filter").attr("action", "/stadiums/show/" + city);
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
        $(".booking")
            .removeClass("selected-booking")
            .text("Select");
        updateSelection();

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
        if ($(this).hasClass("selected-booking")) {
            $(this).removeClass("selected-booking");
            $(this).text("Select");
            updateSelection();
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

    $(".regBtn").on("click", function() {
        $("#regId").val(bookings);
        let selectedStadiumId = $(".stadium .selected").attr("stadium-id");
        $("#stadiumId").val(selectedStadiumId);
        console.log(selectedStadiumId);
        $("#regForm").trigger("submit");
    });

    // .attr("action", "/stadiums/" + city);
    // $(".city-filter").trigger("submit");
});
