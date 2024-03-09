<?php include 'header_dashboard.php'; ?>
<?php include 'session.php'; ?>
<?php $get_id = $_GET['id']; ?>
<body>
    <?php include 'navbar_parent.php'; ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include 'parent_class_sidebar.php'; ?>
            <div class="span4" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <?php
                    $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                        WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                    $class_row = mysqli_fetch_array($class_query);
                    if ($class_row) {
                        $class_name = isset($class_row['class_name']) ? $class_row['class_name'] : "";
                        $subject_code = isset($class_row['subject_code']) ? $class_row['subject_code'] : "";
                        $school_year = isset($class_row['school_year']) ? $class_row['school_year'] : "";
                    } else {
                        $class_name = "";
                        $subject_code = "";
                        $school_year = "";
                    }
                    ?>

                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo $class_name; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><?php echo $subject_code; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><b>Progress</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">
                                <h4> Homework Grade </h4>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                                    <thead>
                                    <tr>
                                        <th>Date Upload</th>
                                        <th>Homework</th>
                                        <th>Grade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT sa.assignment_fdatein, sa.fname, sa.grade
                                                FROM parent_class_student pcs
                                                INNER JOIN student_assignment sa ON sa.student_id = pcs.student_id
                                                INNER JOIN assignment a ON a.assignment_id = sa.assignment_id
                                                WHERE pcs.parent_id = '$session_id'
                                                AND pcs.parent_class_id = '$get_id'
                                                ORDER BY sa.assignment_fdatein DESC") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['assignment_fdatein']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td>
                                                <span class="badge badge-success"><?php echo $row['grade']; ?></span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>

            <div class="span5" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li><a href="#"><b>..</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->

                    <!-- block -->
                    <!-- /block -->
                </div>
            </div>

            <?php /* include('downloadable_sidebar.php') */ ?>
        </div>
    </div>
    <?php include 'script.php'; ?>
</body>
</html>