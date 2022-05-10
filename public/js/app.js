$(document).ready(function(){
    if (document.URL.includes("create")) {
        var timeField = document.getElementById("time");
        timeField.defaultValue = 5;
        $('#weight').on('change', function () {
            if (this.value == '0to5') {
                timeField.value = 5;
            } else if (this.value == '5to10') {
                timeField.value = 8;
            } else if (this.value == '10to15') {
                timeField.value = 12;
            } else {
                timeField.value = 18;
            }
        });
    }
});