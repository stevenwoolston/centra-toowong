
$(function() {
    $("[aria-required=true]").closest(".form-group").find(".control-label").addClass("required");
});