<div class="modal fade" id="commentTeacherModal-{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="commentTeacherModalLable-{{ $teacher->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open([ 'action' => ['TeacherController@commentTeacher', $teacher->id], 'method' => 'POST']) }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="commentTeacherModalLable-{{ $teacher->id }}">Đánh giá <b><i>{{ $teacher->username }}</i></b></h4>
                </div>
                <div class="modal-body">
                    {{ Form::hidden('target_id', $teacher->id) }}
                    <div class="form-group">
                        <label>Chấm điểm đánh giá111</label>
                        {{ Form::select('votes', ['-- Cho điểm --']+[1=>1,2=>2,3=>3,4=>4,5=>5], null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                    <div class="form-group">
                        <label>Bình luận</label>
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'required' => 'required', 'rows' => 3]) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
                <?php $comments = Common::getComments('Admin', $teacher->id, 3); ?>
                @if( count($comments) )
                    <div class="modal-body well well-sm clearfix">
                        @foreach($comments as $comment)
                            {{ Common::renderStarHtml($comment->votes) }}
                            <p><b>{{ Common::getObject($comment->author, 'username') }}</b>,
                                <i>{{ date('d/m/Y', strtotime($comment->created_at)) }}</i>
                            </p>
                            <p>{{ $comment->comment }}</p>
                            <hr>
                        @endforeach
                    </div>
                @endif
            {{ Form::close() }}
        </div>
    </div>
</div>