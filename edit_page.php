<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css_files/cssmyy.css" rel="stylesheet">
</head>

<body class="mybody">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg mynav ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/stu.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <p class="fs-3  pt-3 fw-bolder">STUDENT MANAGEMENT SYSTEM</p>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5 " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="fs-5 fw-bold " aria-current="page" href="home.php">Home</a>
                    </li>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <li class="nav-item">
                        <a class=" active fs-5 fw-bold " aria-current="page" href="student.php">Student</a>
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

    <div class="main-con mt-3">
        <h4 style="margin-left: 10px;">STUDENT DETAILS</h4>
        <form action="config/actions.php" method="POST" enctype="multipart/form-data">
            <div class="edit-panel">
                <div class="first">


                    First Name:
                    <input type="text" style="margin-left: 60px;" name="fname" id="fname"><br>
                    Middle Name:
                    <input type="text" style="margin-left: 40px;" name="mname" id="mname"><br>
                    Last Name:
                    <input type="text" style="margin-left: 60px;" name="lname" id="lname"><br>


                    Enrollment No:
                    <input type="text" style="margin-left: 32px;" name="enroll" id="enroll"><br>
                    <label>
                        Address:
                    </label><br>
                    <textarea name="address" style="margin-left: 140px;width:400px" id="address" cols="30" rows="3"></textarea><br>
                    Mobile No:
                    <input type="text" style="margin-left: 55px;" name="mobile" id="mobile"><br>

                    SSC Percentage:
                    <input type="text" style="margin-left: 20px;" name="ssc_score" id="ssc_score"><br>
                </div>
                <div class="second">

                    TFWS:
                    <select style="margin-left: 50px;" name="tfws" id="tfws">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select><br>
                    Semester:
                    <select style="margin-left: 25px;" name="sem" id="sem">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select><br>
                    Batch:
                    <select style="margin-left: 50px;" name="batch" id="batch">
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A3">A3</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="B3">B3</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                    </select><br>
                    Image:
                    <?php


                    $conn = mysqli_connect("localhost:3307", "root", "", "student_management");
                    $img;
                    if (isset($_GET['edit'])) {
                        $sno = $_GET['edit'];

                        $sql = "select * from student where s_id = $sno";
                        $result = mysqli_query($conn, $sql);
                        $r = mysqli_fetch_array($result);

                        $fname = $r['s_fname'];

                        $mname = $r['s_mname'];
                        $lname = $r['s_lname'];
                        $enroll = $r['s_enroll'];
                        $address = $r['s_address'];
                        $mobile = $r['s_mobile'];
                        $ssc = $r['s_ssc'];
                        $tfws = $r['s_tfws'];
                        $sem = $r['s_sem'];
                        $batch = $r['s_batch'];

                        echo '<img style="margin-left:45px;margin-top:20px;border: 2px solid rgb(130, 130, 130);" src="data:image/jpeg;base64,' . base64_encode($r['s_img']) . '" height="180" width="180"/>';
                    }

                    ?>
                    <br>

                    <input style="margin-left: 100px;" type="file" name="filer" id="filer">
                    <input type="hidden" name="sno" id="sno">
                </div>


            </div>

            <script>
                document.getElementById("fname").value = "<?php echo $fname ?>";
                document.getElementById("mname").value = "<?php echo $mname ?>";
                document.getElementById("lname").value = "<?php echo $lname ?>";
                document.getElementById("enroll").value = "<?php echo $enroll ?>";
                document.getElementById("address").value = "<?php echo $address ?>";
                document.getElementById("mobile").value = "<?php echo $mobile ?>";
                document.getElementById("ssc_score").value = "<?php echo $ssc ?>";
                document.getElementById("tfws").value = "<?php echo $tfws ?>";
                document.getElementById("sem").value = "<?php echo $sem ?>";


                document.getElementById("sno").value = "<?php echo $sno ?>";
            </script>
            <div class="buttons">
                <input style="margin-left: 20px;" type="submit" value="Update" id="Update" name="Update">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


</body>

</html>