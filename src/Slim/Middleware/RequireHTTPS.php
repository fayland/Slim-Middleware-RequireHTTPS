<?php
/**
 * Slim middleware - require https
 *
 * @author      Fayland Lam <fayland@gmail.com>
 * @copyright   2013 Fayland Lam
 * @link        http://www.fayland.me/
 * @license     http://www.slimframework.com/license
 * @version     0.0.1
 * @package     Slim-Middleware-RequireHTTPS
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace Slim\Middleware;

 /**
  * RequireHTTPS
  *
  * always using https
  */
class RequireHTTPS extends \Slim\Middleware
{

    const VERSION = '0.0.1';

    public function call()
    {
        if ($this->app->environment['slim.url_scheme'] !== 'https' ) {
            $req = $this->app->request();
            $https_url = 'https://' . $req->getHost() . $req->getPath();
            $this->app->response()->redirect($https_url, 301);
        } else {
            $this->next->call();
        }
    }

}
