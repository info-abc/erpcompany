<style>
	.assign td,
	.assign th {
		padding: 5px;
	}
	a.assignBtn {
		cursor: pointer;
	}
	a.removeAssignBtn {
		color: #e00;
		cursor: pointer;
	}
</style>
<script>
	(function($){
		
	})(jQuery);

	function assignProjectUser()
	{
		var projectUserKey = $('input[name^="projectUserKey"]').map(function () {
			return this.value;
		}).get();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/project/assignProjectUser") }}',
			data : {
				'projectUserKey' : projectUserKey,
			},
			beforeSend: function() {
	            $('.assignBtn').html('Đang load...');
	        },
			success: function(responseText)
			{
				$('.assignBtn').html('Thêm thành viên');
				// var object = document.getElementById("assignBox").childNodes[1];
				// object.innerHTML = responseText;
				$('#assignBox').append(responseText);
				// projectUserKey++;
				// $('input[name=projectUserKey]').val(projectUserKey);
			}
		});
	}

	function removeAssignProjectUser(projectUserKey)
	{
		$('#assignRow_'+projectUserKey).remove();
	}

</script>