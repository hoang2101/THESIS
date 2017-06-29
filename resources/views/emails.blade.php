<b>{!! $bodymessage !!}</b>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a id="clich" href="{{ route('subManage',['subdomain' =>$bodymessage]) }}"></a>
</body>
<script type="text/javascript">
	document.getElementById('clich').click()
</script>
</html>