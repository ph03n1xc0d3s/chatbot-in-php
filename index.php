<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot in PHP</title>
  <link rel="stylesheet" href="assets/index.css">
</head>

<body>
  <div class="mainContainer">
    <div class="chatSection">
      <h1>Simple Chatbot in PHP</h1>
      <div id="chatbox" class="chatContainer">
      </div>
      <input type="text" id="userInput" class="userInput" placeholder="Type your message...">
      <button id="sendButton" class="sendBtn">Send</button>
      <ul>
        <li>You can only ask questions stored in botresponse array and get answers to that questions </li>
        <li>For eg: Say 'Hello', ask 'how are you?' etc.</li>
      </ul>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const chatbox = document.getElementById('chatbox')
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendButton');

    sendButton.addEventListener('click', function() {
      const userMessage = userInput.value;
      if (userMessage !== '') {
        chatbox.innerHTML += '<p> You : ' + userMessage + '</p>'
        userInput.value = ''
        sendMessage(userMessage);
      }
    });

    function appendBotMessage(message) {
      chatbox.innerHTML = '<p>Mr.Robot : ' + message + '</p>';
      chatbox.scrollTop = chatbox.scrollHeight;
    }

    function sendMessage(message) {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'bot.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status == 200) {
            appendBotMessage(xhr.responseText)
          }
        }
      };
      xhr.send('userMessage = ' + encodeURIComponent(message));
    }
  })
  </script>

</body>

</html>