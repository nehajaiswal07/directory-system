function loadDirectory() {
  $.get("fetch.php", function (data) {
    $("#directoryList").html(data);
  });
}

$("#entryForm").submit(function (e) {
  e.preventDefault();
  const name = $("#name").val();
  const email = $("#email").val();
  const phone = $("#phone").val();

  $.post("insert.php", { name, email, phone }, function () {
    $("#entryForm")[0].reset();
    loadDirectory();
  });
});

function deleteEntry(id) {
  if (confirm("Delete this entry?")) {
    $.post("delete.php", { id }, function () {
      loadDirectory();
    });
  }
}

// 🆕 Open edit modal
function editEntry(id, name, email, phone) {
  $("#editId").val(id);
  $("#editName").val(name);
  $("#editEmail").val(email);
  $("#editPhone").val(phone);
  new bootstrap.Modal(document.getElementById('editModal')).show();
}

// 🆕 Submit edit form
$("#editForm").submit(function (e) {
  e.preventDefault();
  const id = $("#editId").val();
  const name = $("#editName").val();
  const email = $("#editEmail").val();
  const phone = $("#editPhone").val();

  $.post("update.php", { id, name, email, phone }, function () {
    $("#editForm")[0].reset();
    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    loadDirectory();
  });
});

// 🆕 Live Search
$("#searchInput").on("keyup", function () {
  const keyword = $(this).val().toLowerCase();
  $(".card").each(function () {
    const text = $(this).text().toLowerCase();
    $(this).closest(".col-md-4").toggle(text.includes(keyword));
  });
});

$(document).ready(loadDirectory);
