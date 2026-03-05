<?php

class ChatbotController extends Controller {
    public function ask() {
        $input = json_decode(file_get_contents('php://input'), true);
        $message = $input['message'] ?? '';

        if (empty($message)) {
            $this->json(['error' => 'Message is empty'], 400);
            return;
        }

        // Ideally, in production, we would call the Google Gemini API securely using cURL here
        // The API key would be stored in a .env file on the server.
        // For demonstration, we'll return a localized mock response depending on keywords.
        $messageLower = strtolower($message);
        
        $reply = "I'm the AI Brew Guide! I recommend checking out our Island IPA.";

        if (strpos($messageLower, 'stout') !== false || strpos($messageLower, 'dark') !== false) {
            $reply = "If you like dark beer, you must try the Carib Stout. It's rich with notes of chocolate and coffee!";
        } elseif (strpos($messageLower, 'light') !== false || strpos($messageLower, 'lager') !== false) {
            $reply = "The Trini Lager is perfect for a hot day liming on the beach. Very crisp and clean.";
        } elseif (strpos($messageLower, 'krewe') !== false || strpos($messageLower, 'points') !== false) {
            $reply = "The Krewe is our loyalty program. You earn points for every purchase, unlocking ranks from Freshman Liming to Carnival King!";
        } elseif (strpos($messageLower, 'hello') !== false || strpos($messageLower, 'hi') !== false) {
            $reply = "Wotless! Just kidding. Welcome to Jeff Brewery! How can I help you pick a brew today?";
        }

        // Award points for chatting (Gamification)
        if (isset($_SESSION['user'])) {
            $_SESSION['user']['points'] += 5; // Simulating earning points for engagement
        }

        // Simulate network delay
        sleep(1);

        $this->json([
            'reply' => $reply,
            'pointsAwarded' => 5
        ]);
    }
}
