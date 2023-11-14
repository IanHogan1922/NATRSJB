<?php

    require '../../db.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include 'views/modules/header.html';
?>
<script src="scripts/newJobBoard.js"></script>
<div class="container-fluid">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div id="filterButton" onclick="toggleContent()">
            Keyword Filter &#62;
        </div>
        <div class="overlay" id="filterOverlay">
            <div class="content" id="hiddenContent" style="display: none;">
                <br>
                <form>
                    <label><strong>Employment Type:</strong></label>
                    <br>
                    <input type="checkbox" id="fullTime" name="fullTime" value="Full-Time" onchange="filterTable()">
                    <label for="fullTime">Full Time</label>
                    <br>
                    <input type="checkbox" id="partTime" name="partTime" value="Part-Time" onchange="filterTable()">
                    <label for="fullTime">Part Time</label>
                    <br>
                    <input type="checkbox" id="internship" name="internship" value="Internship" onchange="filterTable()">
                    <label for="internship">Internship</label>
                    <br>
                    <label for="userDateChoice"><strong>Date Posted:</strong></label>
                    <input type="month" name="userDateChoice" id="userDateChoice" oninput="filterTable()">
                    <br>
                    <label><strong>Location:</strong></label>
                    <br>
                    <input type="text" id="location" name="location" placeholder="Enter a Location" oninput="filterTable()">
                    <br>
                    <label><strong>Industry/Field:</strong></label>
                    <br>
                    <input type="text" id="industryField" name="Industry/Field" placeholder="Enter a Field/Industry" oninput="filterTable()">
                    <br>
                    <br>
                    <button type="submit"  id="backToPageButton" form="backToPageButton" value="backToPageButton"
                            onclick="toggleContent()">Show Filtered Content</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
        <select id="sortOptions" onchange="sortTable()">
            <option value="0">Sort by Title</option>
            <option value="1">Sort by Employment Status</option>
            <option value="2">Sort by Company</option>
            <option value="3">Sort by Category</option>
            <option value="4">Sort by Location</option>
            <option value="5">Sort by Date Posted</option>
            <option value="6">Sort by Expiry</option>
            <option value="7">Sort by Permanent Position</option>
            <option value="8">Sort by Internship</option>
            <option value="9">Sort by Paid Job</option>
        </select>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="jobs-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Employment Status</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Date Posted</th>
                            <th>Expires</th>
                            <th>Permanent Position</th>
                            <th>Internship</th>
                            <th>Paid</th>
                            <th>Apply Now</th>
                        </tr>
                    </thead>
                    <tbody>

<?php

    $sql = "SELECT * FROM jobboard WHERE job_title != ''";

    $result = @mysqli_query($cnxn, $sql);

    while($row = @mysqli_fetch_assoc($result)) {
        $title = $row['job_title'];
        $status = $row['status'];
        $company = $row['company_name'];
        $data = $row['category'];
        $category = explode(", ", $data);
        $category = $row['category'];
        $location = $row['location'];
        $dataBaseDate = $row['post_date'];
        $formattedDate = date("M d,Y", strtotime($dataBaseDate));
        $dataBaseExpire = $row['expiration'];
        $formattedExpiration = date("M d,Y", strtotime($dataBaseExpire));
        $permanent = $row['permanent'];
        $internship = $row['internship'];
        $paid = $row['paid'];

        // Convert 1 to "Yes" and 0 to "No" for boolean fields
        $permanentText = ($permanent == 1) ? "Yes" : "No";
        $internshipText = ($internship == 1) ? "Yes" : "No";
        $paidText = ($paid == 1) ? "Yes" : "No";

        echo "<tr>
             <td>$title</td>
             <td>$status</td>
             <td>$company</td>
             <td>$category</td>
             <td>$location</td>
             <td>$formattedDate</td>
             <td>$formattedExpiration</td>
             <td>$permanentText</td>
             <td>$internshipText</td>
             <td>$paidText</td>
             <td><a href='#'>Apply</a></td> <!-- TODO: include link to application flier -->
          </tr>";
    }
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'views/modules/footer.php'; ?> <!-- footer -->
