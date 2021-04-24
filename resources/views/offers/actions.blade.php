<td class="td-actions text-right">
	<a class="info-lnk" href="{{route('offer.view',base64_encode($offer['id']))}}">
		<i class="fa fa-eye"></i>
	</a>
    <a class="danger-lnk dlt_btn" data-url="{{route('offer.delete',base64_encode($offer['id']))}}" href="#">
    	<i class="fa fa-trash"></i>
    </a>
</td>