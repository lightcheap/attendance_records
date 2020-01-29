<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/staff/sessionStaff.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/staff/calenderSerectUser.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/staff/attendanceCalender.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/staff/attendanceDataSearch.php'); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/staff/attendanceCalenderDisplay.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/staff/TopHeaderMenu.php'); ?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="displayForm staff">
                <h1><?php echo $year; ?>年<?php echo $month; ?>月</h1>
                <form action="" method="POST">
                    <select name="select_user">
                        <?php foreach( $kari_data as $kari_data_key => $kari_data_val ): ?>
                        <?= $kari_data = "<option value='" . $kari_data_key . "'>". $kari_data_val . "</option>" ?>
                        <?php endforeach; ?>
                        <input type="submit" value="検索">
                        
                    </select>
                </form>
            </section>
        </div>
    </div>
</main>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/staff/Lower.php'); ?>