@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tài nguyên' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('ResourceManagementController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách tài nguyên</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên file</th>	
						<th>Tên link</th>
						<th>Người tạo</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->file_name }}</td>
						<td>{{ $value->link_file }}</td>
						<td>{{ $value->user_id }}</td>
						<td>
							<a href="{{ action('ResourceManagementController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('ResourceManagementController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
							<a href="{{ action('ResourceManagementController@edit', $value->id) }}" class="btn btn-primary">View</a>
							<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
			<!-- phan trang -->
			{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

