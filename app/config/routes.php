<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/
// -------------------------------------------------------
// REST API Routes (for React frontend)
// -------------------------------------------------------

// Root - API Info (shows when visiting the API URL in browser)
$router->get('/', 'ApiInfoController::index');

// Auth
$router->post('/api/login',   'ApiAuthController::login');
$router->post('/api/logout',  'ApiAuthController::logout');
$router->post('/api/refresh', 'ApiAuthController::refresh');
$router->get('/api/me',       'ApiAuthController::me');

// Products (protected by JWT inside controller)
$router->get('/api/products',        'ApiProductController::index');
$router->get('/api/products/{id}',   'ApiProductController::show');
$router->post('/api/products',       'ApiProductController::store');
$router->put('/api/products/{id}',   'ApiProductController::update');
$router->patch('/api/products/{id}', 'ApiProductController::update');
$router->delete('/api/products/{id}','ApiProductController::destroy');

// -------------------------------------------------------
// Migration Route (run once after deployment to set up DB)
// Visit: https://digno-jay.onrender.com/migrate
// -------------------------------------------------------
$router->get('/migrate', 'MigrationController::migrate');
$router->get('/seed',    'MigrationController::seed');


