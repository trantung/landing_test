<div style="padding:60px 5%;background-color:#e74c3c;max-width:820px">
    <div style="max-width:560px;text-align:center;margin:auto;padding-bottom:20px;border-bottom:3px solid #16b53b">
        <img src="{{ asset('custom/img/logo.png') }}" style="width:250px;margin:auto">
    </div>
    <div style="max-width:560px;background-color:#fff;margin:auto">
        <div style="background-color:#fff;padding:40px 40px">
            <p style="font-size:14px;line-height:20px"><b>Hi {{ ucwords(Common::getObject($lessonDetail->student, 'full_name')) }}!</b></p>
            <p style="font-size:14px;line-height:20px">Stayhomeenglish xin chào</p>
            <p style="font-size:14px;line-height:20px">Chúc mừng Bạn vừa hoàn thành 01 buổi học trên Stayhomeenglish  với nội dung như sau:</p>
            <p style="color:#16b53b;font-size:14px;font-weight:bold;text-decoration:none;text-transform:uppercase;line-height:20px">Thông tin chi tiết:</p>
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
                            <td>Duration (Thời lượng):</td>
                            <td>{{ $lessonDetail->lesson_duration }} minute(s) (phút)</td>
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
                            <td>{{ Common::getRemainTimeStudentAfterConfirm($lessonDetail) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p style="font-size:14px;line-height:20px">Nếu thông tin cập nhật đã chính xác, bạn vui lòng click vào nút dưới đây:</p>
            <a href="{{ action('PublishController@confirmEmail', [$string, $lessonDetail->id]) }}" style="border-radius:25px;color:#fff;min-width:200px;font-size:14px;line-height:40px;text-align:center;font-weight:600;margin-right:10px;border:0;background-color:#16b53b;display:inline-block;height:40px;padding:0 20px;margin:15px 0 30px">Xác nhận thông tin chính xác</a>
            <a href="" >
                <img src="{{ asset('custom/img/banner.jpg') }}" style="max-width: 100%" alt="Banner Referral">
            </a>
            <p style="font-size:14px;line-height:20px">Mời bạn vui lòng xác nhận trong vòng 24 giờ, quá thời gian này chúng tôi sẽ ghi nhận thông tin buổi học là chính xác.</p>
            <p style="font-size:14px;line-height:20px">Nếu nhận thấy thông tin buổi học chưa chính xác, bạn vui lòng thông báo với nhân viên Quản lý lớp học để được hỗ trợ tốt nhất.</p>

            <p style="font-size:14px;line-height:20px"><i>(Note: Đây là email tự động được gửi đến bạn, vui lòng không trả lời email này.)</i></p>
            <div>
                <p style="font-size:14px;line-height:20px">Để hỗ trợ các vấn đề về lớp học, xin vui lòng liên hệ:</p>

                <p style="font-size:14px;line-height:20px"><b>Quản lý lớp học</b></p>
                <p style="font-size:14px;line-height:20px"><b>Hotline StayHome English:</b> <a href="tel:01664389999">0166.438.9999</a></p>

                <p style="font-size:14px;line-height:20px">StayHome English Xin chân thành cảm ơn sự đồng hành của Bạn!</p>
                <p style="font-size:14px;line-height:20px"><b>Best regards, StayHome English</b></p>
            </div>
        </div>
    </div>
    <div style="border-top:3px solid #16b53b;text-align:center;padding:40px 0">
    </div>
</div>