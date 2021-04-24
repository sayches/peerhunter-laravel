<td class="td-actions text-right">
	<a class="info-lnk warning-btn" data-id="{{$report['id']}}" href="javascript:void(0)" style="background: #ff4c01;color: white;padding: 6px;border-radius: 2px;margin-right: 4px;">
		Send Warning
	</a>
	<a class="info-lnk view-btn" data-url="{{route('report.view',$report['id'])}}" href="javascript:void(0)">
		<i class="fa fa-eye"></i>
	</a>

    <a class="danger-lnk block_btn" data-url="{{route('report.block',$report['id'])}}" href="javascript:void(0)" style="background: #ff4c01;color: white;padding: 6px;border-radius: 2px;">
    	{{$report['is_blocked'] == 0 ? "Block User" : "Unblock User"}}
    </a>
</td>