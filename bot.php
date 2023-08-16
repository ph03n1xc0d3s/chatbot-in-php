<?php

/*
Bot logic File
Author: Vaibhav Maini
Made with love in Core PHP
 */

$botResponses = array(
    "hello" => "Hi! How can I help you?",
    "how are you?" => "I'm just a bot, but thanks for asking",
    "what is weather like" => "It's Sunny",
    "bye" => "Goodbye!, Have a great day",
    "default" => "I'm sorry, I did not understand that",
);

$userMessage = isset($_POST['userMessage_']) ? trim(strtolower($_POST['userMessage_'])) : '';

$botResponse = isset($botResponses[$userMessage]) ? $botResponses[$userMessage] : $botResponses['default'];

sleep(1);

echo $botResponse;