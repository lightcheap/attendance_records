<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/SessionRouting.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/workReportInsert.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/user/WorkClassCreate.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/common/head.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/template/template_user_header.php');?>
<main>
    <div class="main_wrapper">
        <div class="container">
            <h2>作業報告</h2>
            <form action="userWorkReport.php" method="POST">
                <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" >
                <input class="work_date" type="date" id="work_date" name="work_date" required>
            <div class="reporttable">
                <table class="uwr_table">
                    <thead>
                        <tr>
                            <th>開始時間</th>
                            <th>終了時間</th>
                            <th>作業分類</th>
                            <th>作業内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime1" name="starttime1" value="00:00:00" min="08:00:00" max="20:00:00" step="1800" required>
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime1" name="finishtime1" value="00:00:00" min="08:00:00" max="20:00:00" step="1800" required>
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section1" list="work_section_data" size="3" required>
                                <datalist id="work_section_data">
                                    <?= $workclass ?>
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil1" name="workdeteil1" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime2" name="starttime2" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime2" name="finishtime2" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section2" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil2" name="workdeteil2" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime3" name="starttime3" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime3" name="finishtime3" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section3" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil3" name="workdeteil3" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime4" name="starttime4" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime4" name="finishtime4" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section4" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil4" name="workdeteil4" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime5" name="starttime5" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime5" name="finishtime5" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section5" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil5" name="workdeteil5" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime6" name="starttime6" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime6" name="finishtime6" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section6" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil6" name="workdeteil6" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime7" name="starttime7" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime7" name="finishtime7" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section7" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil7" name="workdeteil7" size="30" maxlength="35">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="uwr_sp">開始時間:</span>
                                <input class="starttime" type="time" id="starttime8" name="starttime8" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">終了時間:</span>
                                <input class="finishtime" type="time" id="finishtime8" name="finishtime8" max="20:00:00" step="1800" >
                            </td>
                            <td><span class="uwr_sp">作業分類:</span>
                            <input class="work_section" name="work_section8" list="work_section_data" size="3" >
                                <datalist id="work_section_data">
                                </datalist>
                            </td>
                            <td><span class="uwr_sp">作業内容:</span>
                                <input class="workdeteil" type="text" id="workdeteil8" name="workdeteil8" size="30" maxlength="35">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="report_impression">
                    <tr>
                        <td>
                        <textarea class="work_impression" name="work_impression" rows="7" cols="50" placeholder="今日の体調や、業務の感想など"></textarea> 
                        </td>
                    </tr>
                </table>
                    <input class="button submit inmid" type="submit" value="送信">
                    <input class="button inmid" type="reset" value="リセット">
                </form>
            </div>
        </div>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] .'/attendance_record/template/template_lower.html'); ?>