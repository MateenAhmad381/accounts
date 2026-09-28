<?php
require_once __DIR__ . '/../app/bootstrap.php';
require_auth();

$current = fetch_one("SELECT * FROM settings ORDER BY id DESC LIMIT 1");

if (is_post()) {
    verify_csrf();

    $business_name = trim($_POST['business_name'] ?? '');
    $currency = trim($_POST['currency'] ?? 'PKR');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if ($business_name === '' || $currency === '') {
        flash('error', 'Business name and currency are required.');
        redirect('settings.php');
    }

    if ($current) {
        execute(
            "UPDATE settings
             SET business_name = ?, currency = ?, phone = ?, address = ?
             WHERE id = ?",
            [$business_name, $currency, $phone, $address, $current['id']]
        );
    } else {
        execute(
            "INSERT INTO settings (business_name, currency, phone, address)
             VALUES (?, ?, ?, ?)",
            [$business_name, $currency, $phone, $address]
        );
    }

    flash('success', 'Settings updated successfully.');
    redirect('settings.php');
}

view('settings', [
    'page_title' => 'Settings',
    'settings' => $current,
]);
