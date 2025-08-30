<?php
// Test just authentication first
require_once 'test5.php';

$api = new UberFreightAPI('e8WrBgg4q_HtVux0N0NzwyHxrKoIrZ75', 'OQ9vVb5XA9yQqOZvZ268VTu89KhzBHSJW0Ez-4cb', true);

echo "Testing authentication with your credentials...\n";
if ($api->authenticate()) {
    echo "🎉 Ready to post loads!\n";
} else {
    echo "❌ Authentication failed - check credentials or account access\n";
}
?>