<div class="box alert">
    {{ Form::open(['action' => 'ManagerStudentController@index', 'method' => 'GET', 'class' => '']) }}
        <div class="input-group inline-block">
            <label>{{ trans('common.fullname') }}</label>
            {{ Form::text('full_name', Input::get('full_name'), ['class' => 'form-control', 'placeholder' => 'Họ tên']) }}
        </div>
        <div class="input-group inline-block">
            <label>Email</label>
            {{ Form::text('email', Input::get('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
        </div>
        <div class="input-group inline-block">
            <label>Phone</label>
            {{ Form::text('phone', Input::get('phone'), ['class' => 'form-control', 'placeholder' => 'Số điện thoại']) }}
        </div>
        <div class="input-group inline-block">
            <label>{{ trans('common.level') }}</label>
            {{ Form::select('level', Common::getLevelTeacherList(), Input::get('level'), ['class' => 'form-control']) }}
        </div>
        @if(hasRole('admin'))
        <div class="input-group inline-block">
            <label>GMO</label>
            {{ Form::select('admin_id', Common::getGmoList('gmo'), Input::get('admin_id'), ['class' => 'form-control']) }}
        </div>
        @endif
        <div class="input-group inline-block" style="vertical-align: bottom;">
            <button type="submit" class="btn btn-primary" title="Tìm kiếm"><i class="glyphicon glyphicon-search"></i></button>
            {{ renderUrl('ManagerStudentController@index', trans('common.reset'), [], ['class' => 'btn btn-primary']) }}
        </div>

    {{ Form::close() }}
</div>