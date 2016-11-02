<html>
<head>
	<meta charset='UTF-8' />
	<style>
		input, textarea {border:1px solid #CCC;margin:0px;padding:0px}
 
		#body {max-width:800px;margin:auto}
		#log {width:100%;height:400px}
		#message {width:100%;line-height:20px}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="fancywebsocket.js"></script>
	<script>
		var Server;
 
		function log( text ) {
			$log = $('#log');
			//Add text to log
			$log.append(($log.val()?"\n":'')+text);
			//Autoscroll
			$log[0].scrollTop = $log[0].scrollHeight - $log[0].clientHeight;
		}
 
		function send( text ) {
			Server.send( 'message', text );
		}
 
		$(document).ready(function() {
			log('Connecting...');
			Server = new FancyWebSocket('ws://127.0.0.1:9300');
 
			$('#message').keypress(function(e) {
				if ( e.keyCode == 13 && this.value ) {
					log( 'You: ' + this.value );
					send( this.value );
					$(this).val('');
				}
			});
 
			//Let the user know we're connected
			Server.bind('open', function() {
				log( "Connected." );
			});
 
			//OH NOES! Disconnection occurred.
			Server.bind('close', function( data ) {
				log( "Disconnected." );
			});
 
			//Log any messages sent from server
			Server.bind('message', function( payload ) {
				log( payload );
			});
 
			Server.connect();
		});
	</script>
</head>
 
<body>
	<div id='body'>
		<textarea id='log' name='log' readonly='readonly'></textarea><br/>
		<input type='text' id='message' name='message' />
	</div>
</body>
 
</html>


<!--<form method='post' action='newThread.php'>
	<input type='text' name='sender'>
	<input type='text' name='reciever'>
	<input type='text' name='type'>
	<button>submit</button>
</form>

<div id='messenger'>
	<div id='threadContainer' style='float: left; overflow: scroll; background-color: white; width: 15%; height: 100%; position: fixed;'>
		
	</div>
	<div id='messages' style='width: 85%; height: 40em; position: fixed;'>
		<iframe src='viewThread.php' frameborder='none' width='40em' height='40em'>
	</div>
</div>-->