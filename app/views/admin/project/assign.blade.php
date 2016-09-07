<tr id="assignRow_{{ $projectUserKey }}">
	<td>
		{{ Form::select('user_id['.$projectUserKey.']', CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('projectUserKey[]', $projectUserKey) }}
	</td>
	<td>
		{{ Form::select('temp_role_id['.$projectUserKey.']', CommonProject::getModelArray('TempRole', 'name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
	</td>
	<td>
		{{ Form::select('per_id['.$projectUserKey.']', CommonOption::getPermissionArray(), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
	</td>
	<td>
		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeAssignProjectUser({{ $projectUserKey }}):false;" class="removeAssignBtn">Xóa</a>
	</td>
</tr>