function sortTable() {
    // Get the table and rows
    let table = document.getElementById("jobs-table");
    let rows = table.rows;

    // Get the selected column index from the dropdown
    let columnIndex = document.getElementById("sortOptions").value;

    // Determine the initial sorting direction
    let isAscending = columnIndex !== '5';

    let switching = true;
    while (switching) {
        switching = false;

        // Initialize shouldSwitch here
        let shouldSwitch = false;

        let i; // Declare i outside of the loop

        // Loop through all rows (except the header)
        for (i = 1; i < (rows.length - 1); i++) {

            // Get the two elements to compare
            let x = rows[i].getElementsByTagName("TD")[columnIndex];
            let y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

            // Check if sorting by date
            if (columnIndex === '5' || columnIndex === '6') {
                let date1 = new Date(x.innerHTML);
                let date2 = new Date(y.innerHTML);

                // Decide whether to switch rows based on the direction
                if ((isAscending && date1 > date2) || (!isAscending && date1 < date2)) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                // For other columns, sort as a string
                if ((isAscending && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) ||
                    (!isAscending && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        // If a switch is needed, perform it and mark switching as true
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        } else {
            // If no switching has happened, and it's ascending, change to descending
            if (isAscending) {
                isAscending = false;
                switching = true;
            }
        }
    }
}



function toggleContent() {
    let overlay = document.getElementById("filterOverlay");
    let hiddenContent = document.getElementById("hiddenContent");
    let filterButton = document.getElementById("filterButton");
    let backToPageButton = document.getElementById("backToPageButton");
    let displayStyle = overlay.style.display;

    if (displayStyle === "none" || displayStyle === "") {
        overlay.style.display = "block";
        hiddenContent.style.display = "block";
    } else {
        overlay.style.display = "none";
        hiddenContent.style.display = "none";
    }
}

document.getElementById("fullTime").addEventListener("change", filterTable);
document.getElementById("partTime").addEventListener("change", filterTable);
document.getElementById("internship").addEventListener("change", filterTable);
document.getElementById("userDateChoice").addEventListener("change", filterTable);
document.getElementById("location").addEventListener("input", filterTable);
document.getElementById("industryField").addEventListener("input", filterTable);

function filterTable() {
    let table, tr, td;

    let fullTimeChecked = document.getElementById("fullTime").checked;
    let partTimeChecked = document.getElementById("partTime").checked;
    let internshipChecked = document.getElementById("internship").checked;
    let datePosted = document.getElementById("userDateChoice").value;
    let location = document.getElementById("location").value.toUpperCase();
    let industryField = document.getElementById("industryField").value.toUpperCase();

    table = document.getElementById("jobs-table");
    tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        if (td.length > 0) {
            let employmentType = td[1].textContent || td[1].innerText;
            let jobDatePosted = td[5].textContent || td[5].innerText;
            let jobLocation = td[4].textContent || td[4].innerText;
            let jobIndustry = td[3].textContent || td[3].innerText;
            let isInternship = td[8].textContent || td[8].innerText;

            let shouldDisplay = true;

            if (fullTimeChecked && employmentType.trim() !== "Full-time") shouldDisplay = false;
            if (partTimeChecked && employmentType.trim() !== "Part-time") shouldDisplay = false;
            if (internshipChecked && isInternship.trim() !== "Yes") shouldDisplay = false;
            if (datePosted && (jobDatePosted.getFullYear() !== pickerDate.getFullYear() || jobDate.getMonth() !== pickerDate.getMonth())) shouldDisplay = false;
            if (location && !jobLocation.toUpperCase().includes(location)) shouldDisplay = false;
            if (industryField && !jobIndustry.toUpperCase().includes(industryField)) shouldDisplay = false;

            tr[i].style.display = shouldDisplay ? "" : "none";
        }
    }
}
