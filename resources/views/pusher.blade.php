<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Cheat Web App</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #1e1e1e;
            color: white;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .log {
            text-align: left;
            background: black;
            color: #0f0;
            padding: 10px;
            height: 250px;
            overflow-y: auto;
            font-family: monospace;
            border-radius: 5px;
            border: 1px solid #444;
        }
        .event {
            margin-bottom: 5px;
        }
        .buttons {
            margin-top: 15px;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        button:hover {
            background: #218838;
        }
        .cheat-btn {
            background: #dc3545;
        }
        .cheat-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Pusher Cheat Web App 🚀</h1>
        <p>Listening on <code>private-first-channel</code> and <code>private-cheat-channel</code></p>
        <p>Trigger events to see live updates below.</p>
        <div class="buttons">
            <button onclick="sendFirstEvent()">Send Normal Event</button>
            <button class="cheat-btn" onclick="sendCheatEvent()">Activate Cheat</button>
        </div>
        <div class="log" id="log"></div>
    </div>

    <script>
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap2',
            encrypted: true
        });
    
        var logContainer = document.getElementById('log');
    
        function logMessage(channel, event, data) {
            let message = `<div class="event">[${channel}] ${event}: ${JSON.stringify(data)}</div>`;
            logContainer.innerHTML += message + "<br>";
            logContainer.scrollTop = logContainer.scrollHeight;
        }
    
        // Subscribe to channels and listen for events
        pusher.subscribe('pankaj').bind('pankaj-event', function(data) {
            logMessage('pankaj', 'Pushercall', data.message);
        });
    
        pusher.subscribe('dhakad').bind('dhakad_event', function(data) {
            logMessage('dhakad', 'SecondPushercall', data.cheatData);
        });
    
        // Function to send events via API
        function sendEvent(url, data, channel, event) {
            fetch(url, {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content 
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(() => logMessage(channel, event, data))
            .catch(error => console.error('Error:', error));
        }
    
        function sendFirstEvent() {
            sendEvent('/trigger-first-event', { message: 'Normal Event Triggered!' }, 'pankaj', 'Pushercall');
        }
    
        function sendCheatEvent() {
            sendEvent('/trigger-cheat-event', { cheatData: 'Cheat Activated! 🔥' }, 'dhakad', 'SecondPushercall');
        }
    </script>
    
</body>
</html>
