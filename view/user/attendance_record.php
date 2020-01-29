<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/SessionRouting.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/syukkinboUpdate.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/phpspreadsheet/hoge.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_user_header.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/flashMessage.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <section class="recordForm">
            <h1>出勤簿に入力</h1>
            <form action="attendance_record.php" method="POST">
                <ul class="formwidth">
                    <li>
                        <input class="recordinput" type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" >
                    </li>
                    <li>
                        <label>日付<span>※必須</span>
                            <input class="recordinput" type="date" id="day" name="day" autocomplete="on" required>
                        </label>
                    </li>
                    <li>
                        <label>始業時間<span>※必須</span>
                            <input class="recordinput" type="time" id="opening_hour" name="opening_hour" value="00:00" min="08:00" max="20:00" step="900" required>
                        </label>
                    </li>
                    <li>
                        <label>終業時間<span>※必須</span>
                            <input class="recordinput" type="time" id="ending_hour" name="ending_hour" value="00:00:00" min="08:00:00" max="20:00:00" step="900" required>
                        </label>
                    </li>
                    <li>
                        <label>訓練時間
                            <input class="recordinput" type="time" id="training_time" name="training_time" value="00:00:00" min="00:00:00" max="8:00:00" step="900">
                        </label>
                    </li>
                    <li>
                        <label>相談時間
                            <input class="recordinput" type="time" id="consultation_time" name="consultation_time" value="00:00:00" min="00:00:00" max="8:00:00" step="900">
                        </label>
                    </li>
                    <li>
                        <label>休憩時間
                            <input class="recordinput" type="time" id="rest_time" name="rest_time" value="00:00:00" min="00:00:00" max="8:00:00" step="900">
                        </label>
                    </li>
                    <li>
                        <label>有給/無休/欠席/代休の選択
                        <input class="recordinput" name="yasumi" list="data1" size="4">
                        <datalist id="data1">
                            <option value="有">有給</option>
                            <option value="無">無給</option>
                            <option value="欠">欠勤</option>
                            <option value="代">代休</option>
                        </datalist>
                        </label>
                    </li>
                    <li>
                        <input class="button submit inmid" type="submit" value="送信">
                        <input class="button inmid" type="reset" value="リセット">
                    </li>
                </ul>
            </form>
            </section>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] .'/attendance_record/template/template_lower.html'); ?>