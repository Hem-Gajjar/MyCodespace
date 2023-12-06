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
        <h4 style="margin-left: 10px;">CLASS DETAILS</h4>
        <form id="form1" action="attendence.php" method="POST" enctype="multipart/form-data">
            <div class="box">
                <div class="inner-box">
                    Semester:
                    <select name="sem" id="sem" style="margin-right: 70px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    Batch:
                    <select name="batch" id="batch">
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
                </div>
            </div>

            <div class="buttons">
                <input type="submit" value="Search" id="Search" name="Search">

            </div>
        </form>
    </div>





    <div class="table_container">

        <table id="example" class="table">
            <thead>
                <tr>

                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Enrollment No</th>
                    <th>Attendence</th>



                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($_POST['Search'])) {
                    $sem = $_POST['sem'];
                    $batch = $_POST['batch'];
                    $res = mysqli_query($conn, "select s_fname,s_mname,s_lname,s_enroll from student where s_sem=$sem AND s_batch='$batch' ;");
                    if ($res) {

                        while ($row = mysqli_fetch_array($res)) {



                            echo "<tr>";

                            echo "
                        <td>" . $row['s_fname'] . "</td>
                        <td>" . $row['s_mname'] . "</td>
                        <td>" . $row['s_lname'] . "</td>
                        <td>" . $row['s_enroll'] . "</td>
                        <td>" . " <input type='checkbox' class='checkbox'>" . "</td>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
                <div class="buttons">

                    <button onclick="exportToExcel()">Export to Excel</button>
                </div>
            </tbody>

        </table>
    </div>
    <script src="scripttt.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src=" https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>



</body>

</html>