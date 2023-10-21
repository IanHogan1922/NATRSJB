// Sample job data (you can replace this with your own data)
const jobData = [
    { title: 'Web Developer', company: 'ABC Inc.',category: 'Park Ranger', location: 'New York', datePosted: '10-19-2023', expires: '11-19-2023', applyNow: 'https://example.com/job1' },
    { title: 'UX Designer', company: 'XYZ Corp.',category: 'Wildlife Preserver', location: 'San Francisco', datePosted: '11-19-2023', expires: '12-19-2023',applyNow:'https://example.com/job2' },
    // Add more job listings here
];

// Function to populate the job table with data
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
