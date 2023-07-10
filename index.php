<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='https://cdn.scaledrone.com/scaledrone.min.js' type='text/javascript'></script>
    </head>
    <body>
        <div id="message_div" style="max-width:500px;height:300px;max-height:80%;"></div>
        <input type="text" id="message_input">
        <button onclick="send_message();">Send</button>
        
    </body>
    <script>
        const drone = new Scaledrone('YOUR_CHANNEL_ID_HERE');////////////// Your Channel Id Here ///////////////////////////////////////////////////////////////////
        drone.on('error', error => console.error(error));
        const room = drone.subscribe('my-room');
        room.on('message', message => {
            document.getElementById('message_div').insertAdjacentHTML('beforeend',message['data']+'<br>');
            console.log(message);
        });
        
        ///this function is just written to get client id from scaledrone/////////
        drone.on('open', function (error) {
            console.log(drone.clientId);
        });
        ///////////////////////////////////////////////////////////////////////////
        
        function send_message(){
            message_text=document.getElementById('message_input').value;
            
            drone.publish({
            room: 'my-room',
            message: message_text
            });
            
            document.getElementById('message_input').value='';
        }
            
    </script>
</html>
