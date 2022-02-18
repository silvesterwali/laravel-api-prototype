<?php

test('welcome page should load', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});
