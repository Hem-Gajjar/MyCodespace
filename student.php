<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="css_files/cssmyy.css" />



</head>

<body class="mybody">

    <nav class="navbar navbar-expand-lg mynav ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/stu.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <p class="fs-3  pt-3 fw-bolder ">STUDENT MANAGEMENT SYSTEM</p>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5 " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class=" fs-5 fw-bold" aria-current="page" href="home.php">Home</a>
                    </li> &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <li class="nav-item">
                        <a class="fs-5 fw-bold " aria-current="page" href="student.php">Student</a>
                    </li>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <li class="nav-item">
                        <a class="fs-5 fw-bold " aria-current="page" href="attendence.php">Attendence</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <?php

    // use LDAP\Result;

    $conn = mysqli_connect("localhost:3307", "root", "", "student_management");

    ?>
    <?php

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];

        $sql = "delete from student where s_id = $sno";
        $result = mysqli_query($conn, $sql);
        header("Location:/DBMS_PROJECT/student.php");
    }

    ?>

    <div class="entry">
        <h4 style="margin-left: 10px;">STUDENT DETAILS</h4>
        <form id="form1" action="config/actions.php" method="POST" enctype="multipart/form-data">
            <div class="box">

                <div class="left">

                    First Name:
                    <input type="text" style="margin-left: 60px;" name="fname" id="fname"><br>
                    Middle Name:
                    <input type="text" style="margin-left: 40px;" name="mname" id="mname"><br>
                    Last Name:
                    <input type="text" style="margin-left: 60px;" name="lname" id="lname"><br>

                </div>
                <div class="center">
                    Enrollment No:
                    <input type="text" style="margin-left: 32px;" name="enroll" id="enroll"><br>
                    <label>
                        Address:
                    </label>
                    <textarea style="margin-left: 142px;" name="address" id="address" cols="30" rows="3"></textarea><br>
                    Mobile No:
                    <input type="text" style="margin-left: 60px;" name="mobile" id="mobile"><br>
                </div>
                <div class="right">
                    SSC Percentage:
                    <input type="text" style="margin-left: 60px;" name="ssc_score" id="ssc_score"><br>
                    TFWS:
                    <select name="tfws" id="tfws" style="margin-left: 130px;">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    Semester:
                    <select name="sem" id="sem" style="margin-left: 105px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    Batch:
                    <select name="batch" id="batch" style="margin-left: 130px;">
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A3">A3</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="B3">B3</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                    </select>
                    Image:
                    <input type="file" name="f1" style="margin-left: 125px;">
                </div>


            </div>

            <div class="buttons">
                <input type="submit" value="Insert" id="Insert" name="Insert">

            </div>
        </form>
    </div>





    <div class="table_container">

        <table id="example" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Enrollment No</th>
                    <th>Address</th>
                    <th>Mobile No</th>
                    <th>SSC Score</th>
                    <th>TFWS</th>
                    <th>Semester</th>
                    <th>Batch</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $res = mysqli_query($conn, "select * from student;");

                while ($row = mysqli_fetch_array($res)) {
                    $temp = "No";
                    $tfws = $row['s_tfws'];
                    if ($tfws == 1) {
                        $temp = "Yes";
                    } else {
                        $temp = "No";
                    }
                    echo "<tr>";

                    echo "
                    
                    <td>" . $row['s_id'] . "</td>
                    <td>" . $row['s_fname'] . "</td>
                    <td>" . $row['s_mname'] . "</td>
                    <td>" . $row['s_lname'] . "</td>
                    <td>" . $row['s_enroll'] . "</td>
                    <td>" . $row['s_address'] . "</td>
                    <td>" . $row['s_mobile'] . "</td>
                    <td>" . $row['s_ssc'] . "</td>
                    <td>" . $temp  . "</td>
                    <td>" . $row['s_sem'] . "</td>
                    <td>" . $row['s_batch'] . "</td>";
                    echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['s_img']) . '" height="100" width="100"/></td>';
                    echo "<td> <button class='edit btn btn-sm btn-dark' id=" . $row['s_id'] . ">Edit</button> <button class='delete btn btn-sm btn-dark' id=d" . $row['s_id'] . ">Delete</button> ";
                    echo "</td>";
                    echo "</tr>";
                }


                ?>

            </tbody>

        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src=" https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#example").DataTable({
                dom: "Bfrtip",
                buttons: ["copy", "csv", "excel", "pdf", "print"],
            });
        });
    </script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {

                sno = e.target.id;


                window.location = `/DBMS_PROJECT/edit_page.php?edit=${sno}`;

            })
        })



        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {

                sno = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this record?")) {

                    window.location = `/DBMS_PROJECT/student.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                }
            })
        })
    </script>

</body>

</html>
<!-- 
*s_id
*s_fname
*s_mname
*s_lname
*s_enroll
*s_address
*s_mobile
s_ssc_score
s_tfws
s_sem
s_batch
s_image
-->