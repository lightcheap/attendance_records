<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/SessionRouting.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/YearMonthManage.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/attendanceDataSearch.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/attendanceCalenderDisplay.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_user_header.php'); ?>
<main>
    <div class="dl_button_wrapper" id="dl_button_wrapper">
        <div class="dl_button" id="dl_button">
            <form action="/attendance_record/process/phpspreadsheet/SheetCreateAndDownload.php" method="POST">
                <input type="hidden" name="dl_date[]" value="<?= $year ?>"/>
                <input type="hidden" name="dl_date[]" value="<?= $month ?>"/>
                <input class="button dl" type="submit" value="ダウンロード"/>
            </form>
        </div>
    </div>
    <div class="main_wrapper">
        <div class="container">
            <section class="displayform">
                <h1><?= $year ?>年<?= $month ?>月</h1>
                <form method="POST" action="attendanceCalender.php">
                    <input class="button movemonth" type="submit" id="prev_month" name="prev_month" value="←">
                    <input class="button movemonth" type="submit" id="next_month" name="next_month" value="→">
                </form>
                <table class="user_calender">
                    <tr>
                        <th class="week0">日</th>
                        <th class="week1">月</th>
                        <th class="week2">火</th>
                        <th class="week3">水</th>
                        <th class="week4">木</th>
                        <th class="week5">金</th>
                        <th class="week6">土</th>
                    </tr>
                    <tr>
                        <?php $cnt_m = 0; ?>
                        <?php $cnt_w = 0; ?>
                        <?php foreach($calender as $key => $value): ?>
                            <td class="week<?=$cnt_w?>">
                                <form method="POST" name="dayslinkforcalender" action="calenderInput.php">
                                    <input type="hidden" name="search_day[]" value="<?= $year ?>">
                                    <input type="hidden" name="search_day[]" value="<?= $month ?>">
                                    <input type="hidden" name="search_day[]" value="<?= $value['day']?>">
                                    <a href="javascript:dayslinkforcalender[<?php echo $cnt_m; ?>].submit()">
                                        <span class="calender_date"><?= $value['day'] ?></span><br>
                                        <span class="calender_moji"><?= $value['opening_hour'] ?></span><br>
                                        <span class="calender_moji"><?= $value['ending_hour'] ?></span><br>
                                        <span class="calender_moji"><?= $value['yasumi']?></span>
                                    </a>
                                </form>
                                <?php $cnt_m++; ?>
                                <?php $cnt_w++; ?>
                            </td>
                        <?php if ($cnt_w == 7): ?>
                    </tr>
                    <tr>
                        <?php $cnt_w = 0; ?>
                        <?php endif; ?>

                        <?php endforeach; ?>
                    </tr>
                </table>
            </section>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] .'/attendance_record/template/template_lower.html');?>