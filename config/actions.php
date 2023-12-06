
<?php

$conn = mysqli_connect("localhost:3307", "root", "", "student_management");
if (isset($_POST["Insert"])) {
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $enroll = $_POST["enroll"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];
    $ssc_score = $_POST["ssc_score"];
    $tfws = $_POST["tfws"];
    $sem = $_POST["sem"];
    $batch = $_POST["batch"];
    $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
    $query = "insert into student (s_fname,s_mname,s_lname,s_enroll,s_address,s_mobile,s_ssc,s_tfws,s_sem,s_batch,s_img) values ('$fname','$mname','$lname','$enroll','$address','$mobile','$ssc_score','$tfws','$sem','$batch','$image');";
    mysqli_query($conn, $query);
    $insert = true;
}
if (isset($_POST["Update"])) {

    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $enroll = $_POST["enroll"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];
    $ssc_score = $_POST["ssc_score"];
    $tfws = $_POST["tfws"];
    $sem = $_POST["sem"];
    $batch = $_POST["batch"];
    $sno = $_POST["sno"];
    if (addslashes(file_get_contents($_FILES['filer']['tmp_name']))) {
        $img = addslashes(file_get_contents($_FILES['filer']['tmp_name']));
        $query = "update student set s_fname = '$fname',s_mname = '$mname',s_lname = '$lname',s_enroll ='$enroll',s_address = '$address',s_mobile = '$mobile',s_ssc =' $ssc_score',s_tfws='$tfws',s_sem='$sem',s_batch='$batch' s_img='$img' where s_id=$sno;";
        mysqli_query($conn, $query);
    } else {
        $query = "update student set s_fname = '$fname',s_mname = '$mname',s_lname = '$lname',s_enroll ='$enroll',s_address = '$address',s_mobile = '$mobile',s_ssc =' $ssc_score',s_tfws='$tfws',s_sem='$sem',s_batch='$batch' where s_id=$sno;";
        mysqli_query($conn, $query);
    }
}

header("Location:../student.php");
