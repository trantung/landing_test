<div style="padding:20px 5%;background-color:rgb(250,251,252);max-width:820px">
    <div style="max-width:560px;text-align:center;margin:auto;padding-bottom:20px;border-bottom:3px solid #F44336">
        <img src="{{ asset('custom/img/logoso1.png') }}" style="width:250px;margin:auto">
    </div>
    <div style="max-width:560px;background-color:rgb(255,255,255);margin:auto">
        <div style="background-color:rgb(255,255,255);padding:40px 40px">
            <p style="font-size:14px;line-height:20px"><b>Hi {{ ucwords(Common::getObject($lessonDetail->student, 'full_name')) }}!</b></p>
            <p style="font-size:14px;line-height:20px">Stayhomeenglish xin chào</p>
            <p style="font-size:14px;line-height:20px">Chúc mừng Bạn vừa hoàn thành 01 buổi học trên Stayhomeenglish  với nội dung như sau:</p>
            <p style="color:#F44336;font-size:14px;font-weight:bold;text-decoration:none;text-transform:uppercase;line-height:20px">Thông tin chi tiết:</p>
            <div style="background-color:#e8e8e8;padding:15px 20px;margin-bottom:30px">
                <table>
                    <tbody>
                        <tr>
                            <td>Learner's name (Tên học viên):</td>
                            <td width="200px">{{ ucwords(Common::getObject($lessonDetail->student, 'full_name')) }}</td>
                        </tr>
                        <tr>
                            <td>Teacher's name (Tên giáo viên):</td>
                            <td>{{ ucwords(Common::getObject($lessonDetail->teacher, 'full_name')) }}</td>
                        </tr>
                        <tr>
                            <td>Trình độ (Level):</td>
                            <td>{{ $lessonDetail->level }}</td>
                        </tr>
                        <tr>
                            <td>Nội dung buổi học (lesson content):</td>
                            <td>{{ (isset($comment)) ? $comment : '' }}</td>
                        </tr>
                        <tr>
                            <td>Duration (Thời lượng):</td>
                            <td>{{ $lessonDuration }} minute(s) (phút)</td>
                        </tr>
                        <tr>
                            <td>Date (Ngày, giờ):</td>
                            <td>{{ date('H:i d-m-Y', strtotime($lessonDetail->lesson_date.' '.$lessonDetail->lesson_hour)) }}</td>
                        </tr>
                        <tr>
                            <td>Remaining hours (Số giờ còn lại):</td>
                            <td>{{ Common::getRemainTimeStudent($lessonDetail) }}</td>
                        </tr>
                        <tr>
                            <td>
                                Course's remaining hours after confirm this session (Số giờ còn lại của khóa học sau khi xác nhận buổi học này):
                            </td>
                            <td>{{ Common::getRemainTimeStudentAfterConfirm($lessonDetail, $lessonDuration) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p style="font-size:14px;line-height:20px">Nếu nhận thấy thông tin buổi học chưa chính xác, bạn vui lòng thông báo với nhân viên Quản lý lớp học để được hỗ trợ tốt nhất.</p>

            <p style="font-size:14px;line-height:20px"><i>(Note: Đây là email tự động được gửi đến bạn, vui lòng không trả lời email này.)</i></p>
            <div>
                <p style="font-size:14px;line-height:20px">Để hỗ trợ các vấn đề về lớp học, xin vui lòng liên hệ:</p>

                <p style="font-size:14px;line-height:20px"><b>Quản lý lớp học</b></p>
                <p style="font-size:14px;line-height:20px"><b>Hotline StayHome English:</b> <a href="tel:0868961858">0868961858</a></p>

                <p style="font-size:14px;line-height:20px">StayHome English Xin chân thành cảm ơn sự đồng hành của Bạn!</p>
                <p style="font-size:14px;line-height:20px"><b>Best regards, StayHome English</b></p>
            </div>
        </div>
    </div>
    <div style="border-top:3px solid #F44336;text-align:center;padding:40px 0">
    </div>
</div>