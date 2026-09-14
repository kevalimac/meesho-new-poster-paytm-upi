if (success_message) {
  toastFunction(success_message, "success");
} else if (error_message) {
  toastFunction(error_message, "danger");
}

remove_toast = null;
show_toast = null;

function toastFunction(messge = "", type = "") {
  if (
    $("#toast").hasClass("show") === true ||
    $("#toast").hasClass("remove") === true
  ) {
    $("#toast").removeClass("remove");

    if (remove_toast || show_toast) {
      clearTimeout(show_toast);
      clearTimeout(remove_toast);
    }
  }

  if (type == "success") {
    $("#toast .toast-icon i")
      .removeAttr("class")
      .attr("class", "fas fa-check-square");
  } else if (type == "danger") {
    $("#toast .toast-icon i")
      .removeAttr("class")
      .attr("class", "fas fa-times-circle");
  } else if (type == "warning") {
    $("#toast .toast-icon i")
      .removeAttr("class")
      .attr("class", "fas fa-exclamation-triangle");
  } else if (type == "info") {
    $("#toast .toast-icon i")
      .removeAttr("class")
      .attr("class", "fas fa-info-circle");
  } else {
    $("#toast .toast-icon i").removeAttr("class");
  }

  $("#toast span").html(messge);
  $("#toast").addClass("show");

  show_toast = setTimeout(function () {
    $("#toast").removeClass("show").addClass("remove");
  }, 3500);
  remove_toast = setTimeout(function () {
    $("#toast").removeClass("remove");
  }, 4000);
}
