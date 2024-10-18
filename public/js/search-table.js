function searchTable() {
    let input = document.getElementById("table-search").value.toLowerCase();
    let table = document.getElementById("news-table");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let row = rows[i];
        let title = row.getElementsByTagName("td")[0].textContent.toLowerCase();
        let slug = row.getElementsByTagName("td")[1].textContent.toLowerCase();
        let body = row.getElementsByTagName("td")[2].textContent.toLowerCase();
        let author = row.getElementsByTagName("td")[3].textContent.toLowerCase();
        let category = row.getElementsByTagName("td")[4].textContent.toLowerCase();

        if (title.includes(input) || slug.includes(input) || body.includes(input) || author.includes(input) || category.includes(input)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}
