@if(  getSettings('status') == 1)
     
      <script>window.location = "/";</script>

@endif

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<title>Performing Maintenance</title>
<style type="text/css">
      body { text-align: center; padding: 150px; }
      h1 { font-size: 40px; }
      body { font: 20px Helvetica, sans-serif; color: #333; }
      #article { display: block; text-align: left; width: 650px; margin: 0 auto; }
      a { color: #dc8100; text-decoration: none; }
      a:hover { color: #333; text-decoration: none; }
    </style>
</head>
<body>
<div id="article">
<h1>{{getSettings('closeMsg')}}</h1>
<div>
<p>نعتذر عن الإزعاج ، لكننا نجري بعض الصيانة. لا يزال بإمكانك الاتصال بنا على<a href="{{getSettings('email')}}">{{getSettings('email')}}</a>.</p>

</div>
</div>
</body>
</html>