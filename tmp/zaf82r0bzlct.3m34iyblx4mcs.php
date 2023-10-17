
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>
<h1>Natural Resource Job Board</h1>
<table id="job-table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Company</th>
        <th>Category</th>
        <th>Location</th>
        <th>Date Posted</th>
        <th>Expires</th>
        <th>Apply Now</th>
    </tr>
    </thead>
    <tbody>
    <script>
        function populateJobTable() {
            const tableBody = document.querySelector('#job-table tbody');

            jobData.forEach((job) => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${job.title}</td>
            <td>${job.company}</td>
            <td>${job.category}</td>
            <td>${job.location}</td>
            <td>${job.datePosted}</td>
            <td>${job.expires}</td>
            <td><a href="${job.applyLink}" target="_blank"<!--Target Changed to the Link--><button>Apply</button></a></td>

        `;
                tableBody.appendChild(row);
            });
        }

        // Call the function to populate the table when the page loads
        document.addEventListener('DOMContentLoaded', populateJobTable);
    </script>

    </tbody>
</table>
<script src="script.js"></script>
</body>
</html>