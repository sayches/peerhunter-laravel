<td class="td-actions text-right">
	<a class="success-lnk" href="{{route('user.edit',base64_encode($user['id']))}}">
		<i class="fa fa-edit"></i>
	</a>
	<!-- <a class="info-lnk" href="{{route('user.view',base64_encode($user['id']))}}">
		<i class="fa fa-eye"></i>
	</a> -->
    <a class="danger-lnk dlt_btn" data-url="{{route('user.delete',base64_encode($user['id']))}}" href="#">
    	<i class="fa fa-trash"></i>
    </a>
</td>