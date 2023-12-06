$(document).ready(function () {
  $("#example").DataTable({
    dom: "Bfrtip",
    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });
});

function exportToExcel() {
  const table = document.getElementById("example");
  const checkboxes = table.querySelectorAll(".checkbox");

  const data = [];
  checkboxes.forEach((checkbox, index) => {
    const isChecked = checkbox.checked ? "Yes" : "No";
    const row = [];
    const cells = checkbox.parentNode.parentNode.cells;
    for (let i = 0; i < cells.length - 1; i++) {
      row.push(cells[i].innerText);
    }
    row.push(isChecked);
    if (isChecked === "Yes") {
      data.push(row);
    } else {
      data.push(row);
    }
  });

  const header = [
    "First Name",
    "Middle Name",
    "Last Name",
    "Enrollment No",
    "Present",
  ];
  data.unshift(header);

  const csvContent = data.map((row) => row.join(",")).join("\n");
  const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
  const link = document.createElement("a");
  const url = URL.createObjectURL(blob);
  link.setAttribute("href", url);
  link.setAttribute("download", "selected_data.csv");
  link.style.visibility = "hidden";
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
