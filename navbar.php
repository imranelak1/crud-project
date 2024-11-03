<?php
function renderNavbar($title) {
    echo <<<HTML
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-semibold text-center">{$title}</h1>
    </header>
HTML;
}
?>
