<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Job Board API</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.24.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.24.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-me">
                        <a href="#authentication-GETapi-auth-me">Authenticated user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-register">
                        <a href="#authentication-POSTapi-auth-register">Register</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-login">
                        <a href="#authentication-POSTapi-auth-login">Login</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-forgot-password">
                        <a href="#authentication-POSTapi-auth-forgot-password">Forgot password</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-reset-password">
                        <a href="#authentication-POSTapi-auth-reset-password">Reset password</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-verify-email--id---hash-">
                        <a href="#authentication-GETapi-auth-verify-email--id---hash-">Verify Email address</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-email-verification-notification">
                        <a href="#authentication-POSTapi-auth-email-verification-notification">Resend email verification email address</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-logout">
                        <a href="#authentication-POSTapi-auth-logout">Logout</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="jobs">
                    <a href="#jobs">Jobs</a>
                </li>
                                    <ul id="tocify-subheader-jobs" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="jobs-GETapi-jobs">
                        <a href="#jobs-GETapi-jobs">List of jobs</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="jobs-POSTapi-jobs">
                        <a href="#jobs-POSTapi-jobs">Post job</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="jobs-GETapi-jobs--job_slug-">
                        <a href="#jobs-GETapi-jobs--job_slug-">Job Details</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="jobs-DELETEapi-jobs--job_id-">
                        <a href="#jobs-DELETEapi-jobs--job_id-">Delete job</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="jobs-PUTapi-jobs--job_id-">
                        <a href="#jobs-PUTapi-jobs--job_id-">Update job</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="tag">
                    <a href="#tag">Tag</a>
                </li>
                                    <ul id="tocify-subheader-tag" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="tag-GETapi-tags">
                        <a href="#tag-GETapi-tags">Tag List</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="tag-POSTapi-tags">
                        <a href="#tag-POSTapi-tags">Create tag</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="tag-GETapi-tags--tag_slug--jobs">
                        <a href="#tag-GETapi-tags--tag_slug--jobs">Jobs of a tag</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="upload">
                    <a href="#upload">Upload</a>
                </li>
                                    <ul id="tocify-subheader-upload" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="upload-POSTapi-uploads">
                        <a href="#upload-POSTapi-uploads">Upload file</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="upload-DELETEapi-uploads">
                        <a href="#upload-DELETEapi-uploads">Delete file</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: February 26 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="authentication">Authentication</h1>

    <p>Authentication apis</p>

            <h2 id="authentication-GETapi-auth-me">Authenticated user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/auth/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-me"></code></pre>
</span>
<span id="execution-error-GETapi-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-me"></code></pre>
</span>
<form id="form-GETapi-auth-me" data-method="GET"
      data-path="api/auth/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-me"
                    onclick="tryItOut('GETapi-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-me"
                    onclick="cancelTryOut('GETapi-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/me</code></b>
        </p>
                <p>
            <label id="auth-GETapi-auth-me" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-auth-me"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="authentication-POSTapi-auth-register">Register</h2>

<p>
</p>

<p>Handle an incoming registration request.</p>

<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"gvaxtzoqtiuvalswpxrfcaxmfyqaomrrhotwvlxmjxclxdqhwcdzktpfndqlosqfpxbazlialrlzyspfzkcmgplbxmuumjidnzwjywthiseogrzvzicf\",
    \"email\": \"yoxxjbyycqjkpasjneyfqfrcyv\",
    \"password\": \"ipsam\",
    \"password_confirmation\": \"ea\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "gvaxtzoqtiuvalswpxrfcaxmfyqaomrrhotwvlxmjxclxdqhwcdzktpfndqlosqfpxbazlialrlzyspfzkcmgplbxmuumjidnzwjywthiseogrzvzicf",
    "email": "yoxxjbyycqjkpasjneyfqfrcyv",
    "password": "ipsam",
    "password_confirmation": "ea"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
</span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register"></code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-auth-register"
               value="gvaxtzoqtiuvalswpxrfcaxmfyqaomrrhotwvlxmjxclxdqhwcdzktpfndqlosqfpxbazlialrlzyspfzkcmgplbxmuumjidnzwjywthiseogrzvzicf"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-register"
               value="yoxxjbyycqjkpasjneyfqfrcyv"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-register"
               value="ipsam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="POSTapi-auth-register"
               value="ea"
               data-component="body" hidden>
    <br>
<p>The value and <code>password</code> must match.</p>
        </p>
        </form>

            <h2 id="authentication-POSTapi-auth-login">Login</h2>

<p>
</p>

<p>Handle an incoming authentication request.</p>

<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"mariam.reynolds@example.org\",
    \"password\": \"omnis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "mariam.reynolds@example.org",
    "password": "omnis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-login"
               value="mariam.reynolds@example.org"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="omnis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="authentication-POSTapi-auth-forgot-password">Forgot password</h2>

<p>
</p>

<p>Handle an incoming password reset link request.</p>

<span id="example-requests-POSTapi-auth-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"veritatis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "veritatis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-forgot-password">
</span>
<span id="execution-results-POSTapi-auth-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-forgot-password"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-forgot-password"></code></pre>
</span>
<form id="form-POSTapi-auth-forgot-password" data-method="POST"
      data-path="api/auth/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-forgot-password"
                    onclick="tryItOut('POSTapi-auth-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-forgot-password"
                    onclick="cancelTryOut('POSTapi-auth-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-forgot-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/forgot-password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-forgot-password"
               value="veritatis"
               data-component="body" hidden>
    <br>
<ul>
<li>User email address</li>
</ul>
        </p>
        </form>

            <h2 id="authentication-POSTapi-auth-reset-password">Reset password</h2>

<p>
</p>

<p>Handle an incoming new password request.</p>

<span id="example-requests-POSTapi-auth-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"et\",
    \"email\": \"nihil\",
    \"password\": \"autem\",
    \"password_confirmation\": \"adipisci\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "et",
    "email": "nihil",
    "password": "autem",
    "password_confirmation": "adipisci"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-reset-password">
</span>
<span id="execution-results-POSTapi-auth-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-reset-password"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-reset-password"></code></pre>
</span>
<form id="form-POSTapi-auth-reset-password" data-method="POST"
      data-path="api/auth/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-reset-password"
                    onclick="tryItOut('POSTapi-auth-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-reset-password"
                    onclick="cancelTryOut('POSTapi-auth-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-reset-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/reset-password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-reset-password"
               value="et"
               data-component="body" hidden>
    <br>
<ul>
<li>Reset token</li>
</ul>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-reset-password"
               value="nihil"
               data-component="body" hidden>
    <br>
<ul>
<li>User email address</li>
</ul>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-reset-password"
               value="autem"
               data-component="body" hidden>
    <br>
<ul>
<li>New password</li>
</ul>
        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="POSTapi-auth-reset-password"
               value="adipisci"
               data-component="body" hidden>
    <br>
<ul>
<li>New password again</li>
</ul>
        </p>
        </form>

            <h2 id="authentication-GETapi-auth-verify-email--id---hash-">Verify Email address</h2>

<p>
</p>

<p>Mark the authenticated user's email address as verified.</p>

<span id="example-requests-GETapi-auth-verify-email--id---hash-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/auth/verify-email/quos/modi" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/verify-email/quos/modi"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-verify-email--id---hash-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-verify-email--id---hash-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-verify-email--id---hash-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-verify-email--id---hash-"></code></pre>
</span>
<span id="execution-error-GETapi-auth-verify-email--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-verify-email--id---hash-"></code></pre>
</span>
<form id="form-GETapi-auth-verify-email--id---hash-" data-method="GET"
      data-path="api/auth/verify-email/{id}/{hash}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-verify-email--id---hash-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-verify-email--id---hash-"
                    onclick="tryItOut('GETapi-auth-verify-email--id---hash-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-verify-email--id---hash-"
                    onclick="cancelTryOut('GETapi-auth-verify-email--id---hash-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-verify-email--id---hash-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/verify-email/{id}/{hash}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-auth-verify-email--id---hash-"
               value="quos"
               data-component="url" hidden>
    <br>
<p>The ID of the verify email.</p>
            </p>
                    <p>
                <b><code>hash</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="hash"
               data-endpoint="GETapi-auth-verify-email--id---hash-"
               value="modi"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="authentication-POSTapi-auth-email-verification-notification">Resend email verification email address</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Send a new email verification notification.</p>

<span id="example-requests-POSTapi-auth-email-verification-notification">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/email/verification-notification" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/email/verification-notification"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-email-verification-notification">
</span>
<span id="execution-results-POSTapi-auth-email-verification-notification" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-email-verification-notification"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-email-verification-notification"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-email-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-email-verification-notification"></code></pre>
</span>
<form id="form-POSTapi-auth-email-verification-notification" data-method="POST"
      data-path="api/auth/email/verification-notification"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-email-verification-notification', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-email-verification-notification"
                    onclick="tryItOut('POSTapi-auth-email-verification-notification');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-email-verification-notification"
                    onclick="cancelTryOut('POSTapi-auth-email-verification-notification');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-email-verification-notification" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/email/verification-notification</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-auth-email-verification-notification" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-auth-email-verification-notification"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="authentication-POSTapi-auth-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Destroy an authenticated session.</p>

<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout"></code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-auth-logout" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-auth-logout"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="jobs">Jobs</h1>

    <p>Apis for job listing</p>

            <h2 id="jobs-GETapi-jobs">List of jobs</h2>

<p>
</p>



<span id="example-requests-GETapi-jobs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/jobs?limit=18&amp;user_id=reiciendis&amp;tag_id=nostrum&amp;page=8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobs"
);

const params = {
    "limit": "18",
    "user_id": "reiciendis",
    "tag_id": "nostrum",
    "page": "8",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-jobs">
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The user id must be a valid UUID.&quot;,
    &quot;errors&quot;: {
        &quot;user_id&quot;: [
            &quot;The user id must be a valid UUID.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-jobs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-jobs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-jobs"></code></pre>
</span>
<span id="execution-error-GETapi-jobs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-jobs"></code></pre>
</span>
<form id="form-GETapi-jobs" data-method="GET"
      data-path="api/jobs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-jobs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-jobs"
                    onclick="tryItOut('GETapi-jobs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-jobs"
                    onclick="cancelTryOut('GETapi-jobs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-jobs" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/jobs</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="limit"
               data-endpoint="GETapi-jobs"
               value="18"
               data-component="query" hidden>
    <br>
<ul>
<li>How many resource to show per page. <code>Default: 10</code></li>
</ul>
            </p>
                    <p>
                <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="GETapi-jobs"
               value="reiciendis"
               data-component="query" hidden>
    <br>
<ul>
<li>Filtered jobs posted by a particular user.</li>
</ul>
            </p>
                    <p>
                <b><code>tag_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="tag_id"
               data-endpoint="GETapi-jobs"
               value="nostrum"
               data-component="query" hidden>
    <br>
<ul>
<li>Filtered jobs by tag id.</li>
</ul>
            </p>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-jobs"
               value="8"
               data-component="query" hidden>
    <br>
<ul>
<li>Page number</li>
</ul>
            </p>
                </form>

            <h2 id="jobs-POSTapi-jobs">Post job</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Store a newly created resource in storage.</p>

<span id="example-requests-POSTapi-jobs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/jobs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"praesentium\",
    \"location\": \"distinctio\",
    \"link\": \"http:\\/\\/ebert.com\\/\",
    \"company_name\": \"facilis\",
    \"description\": \"est\",
    \"company_logo\": \"http:\\/\\/www.lehner.biz\\/neque-aspernatur-autem-debitis-aut-accusantium\",
    \"type\": \"temporary\",
    \"tags\": [
        \"sed\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "praesentium",
    "location": "distinctio",
    "link": "http:\/\/ebert.com\/",
    "company_name": "facilis",
    "description": "est",
    "company_logo": "http:\/\/www.lehner.biz\/neque-aspernatur-autem-debitis-aut-accusantium",
    "type": "temporary",
    "tags": [
        "sed"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-jobs">
</span>
<span id="execution-results-POSTapi-jobs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-jobs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-jobs"></code></pre>
</span>
<span id="execution-error-POSTapi-jobs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-jobs"></code></pre>
</span>
<form id="form-POSTapi-jobs" data-method="POST"
      data-path="api/jobs"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-jobs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-jobs"
                    onclick="tryItOut('POSTapi-jobs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-jobs"
                    onclick="cancelTryOut('POSTapi-jobs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-jobs" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/jobs</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-jobs" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-jobs"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="title"
               data-endpoint="POSTapi-jobs"
               value="praesentium"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="location"
               data-endpoint="POSTapi-jobs"
               value="distinctio"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>link</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="link"
               data-endpoint="POSTapi-jobs"
               value="http://ebert.com/"
               data-component="body" hidden>
    <br>
<p>Must be a valid URL.</p>
        </p>
                <p>
            <b><code>company_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_name"
               data-endpoint="POSTapi-jobs"
               value="facilis"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-jobs"
               value="est"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_logo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_logo"
               data-endpoint="POSTapi-jobs"
               value="http://www.lehner.biz/neque-aspernatur-autem-debitis-aut-accusantium"
               data-component="body" hidden>
    <br>
<p>Must be a valid URL.</p>
        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="type"
               data-endpoint="POSTapi-jobs"
               value="temporary"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>full_time</code>, <code>part_time</code>, <code>contract</code>, <code>temporary</code>, <code>internship</code>, <code>volunteer</code>, or <code>remote</code>.</p>
        </p>
                <p>
            <b><code>tags</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="tags[0]"
               data-endpoint="POSTapi-jobs"
               data-component="body" hidden>
        <input type="text"
               name="tags[1]"
               data-endpoint="POSTapi-jobs"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="jobs-GETapi-jobs--job_slug-">Job Details</h2>

<p>
</p>

<p>Display the specified resource.</p>

<span id="example-requests-GETapi-jobs--job_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/jobs/at" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobs/at"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-jobs--job_slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Job] 1&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 355,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 331,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 172,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 726,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 701,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 665,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 654,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 117,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 75,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 48,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 136,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-jobs--job_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-jobs--job_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-jobs--job_slug-"></code></pre>
</span>
<span id="execution-error-GETapi-jobs--job_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-jobs--job_slug-"></code></pre>
</span>
<form id="form-GETapi-jobs--job_slug-" data-method="GET"
      data-path="api/jobs/{job_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-jobs--job_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-jobs--job_slug-"
                    onclick="tryItOut('GETapi-jobs--job_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-jobs--job_slug-"
                    onclick="cancelTryOut('GETapi-jobs--job_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-jobs--job_slug-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/jobs/{job_slug}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>job_slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="job_slug"
               data-endpoint="GETapi-jobs--job_slug-"
               value="at"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="jobs-DELETEapi-jobs--job_id-">Delete job</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Remove the specified resource from storage.</p>

<span id="example-requests-DELETEapi-jobs--job_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/jobs/aliquid" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobs/aliquid"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-jobs--job_id-">
</span>
<span id="execution-results-DELETEapi-jobs--job_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-jobs--job_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-jobs--job_id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-jobs--job_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-jobs--job_id-"></code></pre>
</span>
<form id="form-DELETEapi-jobs--job_id-" data-method="DELETE"
      data-path="api/jobs/{job_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-jobs--job_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-jobs--job_id-"
                    onclick="tryItOut('DELETEapi-jobs--job_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-jobs--job_id-"
                    onclick="cancelTryOut('DELETEapi-jobs--job_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-jobs--job_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/jobs/{job_id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-jobs--job_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-jobs--job_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="job_id"
               data-endpoint="DELETEapi-jobs--job_id-"
               value="aliquid"
               data-component="url" hidden>
    <br>
<p>The ID of the job.</p>
            </p>
                    </form>

            <h2 id="jobs-PUTapi-jobs--job_id-">Update job</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update the specified resource in storage.</p>

<span id="example-requests-PUTapi-jobs--job_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/jobs/totam" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"necessitatibus\",
    \"location\": \"eligendi\",
    \"link\": \"http:\\/\\/www.nienow.org\\/\",
    \"company_name\": \"vel\",
    \"description\": \"enim\",
    \"company_logo\": \"http:\\/\\/bayer.com\\/asperiores-eos-ipsa-et-sint-accusantium-qui.html\",
    \"type\": \"remote\",
    \"tags\": [
        \"nobis\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobs/totam"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "necessitatibus",
    "location": "eligendi",
    "link": "http:\/\/www.nienow.org\/",
    "company_name": "vel",
    "description": "enim",
    "company_logo": "http:\/\/bayer.com\/asperiores-eos-ipsa-et-sint-accusantium-qui.html",
    "type": "remote",
    "tags": [
        "nobis"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-jobs--job_id-">
</span>
<span id="execution-results-PUTapi-jobs--job_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-jobs--job_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-jobs--job_id-"></code></pre>
</span>
<span id="execution-error-PUTapi-jobs--job_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-jobs--job_id-"></code></pre>
</span>
<form id="form-PUTapi-jobs--job_id-" data-method="PUT"
      data-path="api/jobs/{job_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-jobs--job_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-jobs--job_id-"
                    onclick="tryItOut('PUTapi-jobs--job_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-jobs--job_id-"
                    onclick="cancelTryOut('PUTapi-jobs--job_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-jobs--job_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/jobs/{job_id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-jobs--job_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-jobs--job_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="job_id"
               data-endpoint="PUTapi-jobs--job_id-"
               value="totam"
               data-component="url" hidden>
    <br>
<p>The ID of the job.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="title"
               data-endpoint="PUTapi-jobs--job_id-"
               value="necessitatibus"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="location"
               data-endpoint="PUTapi-jobs--job_id-"
               value="eligendi"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>link</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="link"
               data-endpoint="PUTapi-jobs--job_id-"
               value="http://www.nienow.org/"
               data-component="body" hidden>
    <br>
<p>Must be a valid URL.</p>
        </p>
                <p>
            <b><code>company_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_name"
               data-endpoint="PUTapi-jobs--job_id-"
               value="vel"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="PUTapi-jobs--job_id-"
               value="enim"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_logo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_logo"
               data-endpoint="PUTapi-jobs--job_id-"
               value="http://bayer.com/asperiores-eos-ipsa-et-sint-accusantium-qui.html"
               data-component="body" hidden>
    <br>
<p>Must be a valid URL.</p>
        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="type"
               data-endpoint="PUTapi-jobs--job_id-"
               value="remote"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>full_time</code>, <code>part_time</code>, <code>contract</code>, <code>temporary</code>, <code>internship</code>, <code>volunteer</code>, or <code>remote</code>.</p>
        </p>
                <p>
            <b><code>tags</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="tags[0]"
               data-endpoint="PUTapi-jobs--job_id-"
               data-component="body" hidden>
        <input type="text"
               name="tags[1]"
               data-endpoint="PUTapi-jobs--job_id-"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="tag">Tag</h1>

    <p>Tag apis</p>

            <h2 id="tag-GETapi-tags">Tag List</h2>

<p>
</p>

<p>Display a listing of the resource.</p>

<span id="example-requests-GETapi-tags">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tags"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tags">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;a53f220b-f276-4a01-aaca-756cd2a3ef1a&quot;,
            &quot;name&quot;: &quot;ut&quot;,
            &quot;slug&quot;: &quot;ut&quot;
        },
        {
            &quot;id&quot;: &quot;92747dd5-289f-41c0-8ad6-05c1317b2c0a&quot;,
            &quot;name&quot;: &quot;deleniti&quot;,
            &quot;slug&quot;: &quot;deleniti&quot;
        },
        {
            &quot;id&quot;: &quot;ad1a1482-0b63-44bf-8639-1921b479324c&quot;,
            &quot;name&quot;: &quot;Hel&quot;,
            &quot;slug&quot;: &quot;hel&quot;
        },
        {
            &quot;id&quot;: &quot;79204257-a809-49bf-afe5-375c74154b52&quot;,
            &quot;name&quot;: &quot;Hell&quot;,
            &quot;slug&quot;: &quot;hell&quot;
        },
        {
            &quot;id&quot;: &quot;7149bdc9-ee41-4127-bf08-ead06695ecf9&quot;,
            &quot;name&quot;: &quot;Hello&quot;,
            &quot;slug&quot;: &quot;hello&quot;
        },
        {
            &quot;id&quot;: &quot;b9ef7a5f-6303-4ff9-8df7-52ad03d0cff0&quot;,
            &quot;name&quot;: &quot;hi t&quot;,
            &quot;slug&quot;: &quot;hi-t&quot;
        },
        {
            &quot;id&quot;: &quot;913f1b6f-77b5-4839-b7c6-e222fa09e78e&quot;,
            &quot;name&quot;: &quot;hi th&quot;,
            &quot;slug&quot;: &quot;hi-th&quot;
        },
        {
            &quot;id&quot;: &quot;6e7d5123-2942-4a06-be9a-5c581f85ec92&quot;,
            &quot;name&quot;: &quot;hi the&quot;,
            &quot;slug&quot;: &quot;hi-the&quot;
        },
        {
            &quot;id&quot;: &quot;b9b8fddb-ddb6-4ba7-b9b3-0c7e93dd3cff&quot;,
            &quot;name&quot;: &quot;hi ther&quot;,
            &quot;slug&quot;: &quot;hi-ther&quot;
        },
        {
            &quot;id&quot;: &quot;0234695e-695a-427b-888b-3c01b0b3fd8a&quot;,
            &quot;name&quot;: &quot;hi there&quot;,
            &quot;slug&quot;: &quot;hi-there&quot;
        },
        {
            &quot;id&quot;: &quot;e6b505de-b0ba-468c-b83e-3e824987ebec&quot;,
            &quot;name&quot;: &quot;hello everyone&quot;,
            &quot;slug&quot;: &quot;hello-everyone&quot;
        },
        {
            &quot;id&quot;: &quot;1ae56577-4d95-4443-a643-ac33016eefd5&quot;,
            &quot;name&quot;: &quot;php&quot;,
            &quot;slug&quot;: &quot;php&quot;
        },
        {
            &quot;id&quot;: &quot;18e9f939-ecdd-42b1-93b1-ba8df63387a4&quot;,
            &quot;name&quot;: &quot;adfdfsdfsdfs&quot;,
            &quot;slug&quot;: &quot;adfdfsdfsdfs&quot;
        },
        {
            &quot;id&quot;: &quot;14244edb-0a35-419b-a7b9-16359d3b7025&quot;,
            &quot;name&quot;: &quot;asdasdasdas&quot;,
            &quot;slug&quot;: &quot;asdasdasdas&quot;
        },
        {
            &quot;id&quot;: &quot;3ffe4d3c-52b7-41a7-9fba-0c0b466d962c&quot;,
            &quot;name&quot;: &quot;adasdasdasds&quot;,
            &quot;slug&quot;: &quot;adasdasdasds&quot;
        },
        {
            &quot;id&quot;: &quot;37cfc144-bcd8-4191-8825-1382c20da18c&quot;,
            &quot;name&quot;: &quot;Heyyyyyyyyy&quot;,
            &quot;slug&quot;: &quot;heyyyyyyyyy&quot;
        },
        {
            &quot;id&quot;: &quot;873f6481-fa07-4bfb-9673-7b7142629d68&quot;,
            &quot;name&quot;: &quot;ada&quot;,
            &quot;slug&quot;: &quot;ada&quot;
        },
        {
            &quot;id&quot;: &quot;87e31f93-7389-4127-95f2-582c4d2edbd9&quot;,
            &quot;name&quot;: &quot;adas&quot;,
            &quot;slug&quot;: &quot;adas&quot;
        },
        {
            &quot;id&quot;: &quot;a38d0603-652f-4465-95b9-1476c02a1555&quot;,
            &quot;name&quot;: &quot;adasa&quot;,
            &quot;slug&quot;: &quot;adasa&quot;
        },
        {
            &quot;id&quot;: &quot;2a33a24c-6237-49b8-a0b5-46c3f015cb96&quot;,
            &quot;name&quot;: &quot;adasas&quot;,
            &quot;slug&quot;: &quot;adasas&quot;
        },
        {
            &quot;id&quot;: &quot;1eb93364-0631-439f-910e-5aaf3fd5e9eb&quot;,
            &quot;name&quot;: &quot;adasasa&quot;,
            &quot;slug&quot;: &quot;adasasa&quot;
        },
        {
            &quot;id&quot;: &quot;f1127ca5-7185-485e-8250-d79abb7613ef&quot;,
            &quot;name&quot;: &quot;adasasas&quot;,
            &quot;slug&quot;: &quot;adasasas&quot;
        },
        {
            &quot;id&quot;: &quot;43c9834b-cda5-4e55-96a7-236dbf280458&quot;,
            &quot;name&quot;: &quot;adasasasd&quot;,
            &quot;slug&quot;: &quot;adasasasd&quot;
        },
        {
            &quot;id&quot;: &quot;4c43258f-8123-41a9-98f9-2c318312d85a&quot;,
            &quot;name&quot;: &quot;adasasasda&quot;,
            &quot;slug&quot;: &quot;adasasasda&quot;
        },
        {
            &quot;id&quot;: &quot;4a2f298b-ef6d-4740-8c45-48e9e1a0b735&quot;,
            &quot;name&quot;: &quot;adasasasdad&quot;,
            &quot;slug&quot;: &quot;adasasasdad&quot;
        },
        {
            &quot;id&quot;: &quot;30e8ed0c-f63f-43c5-8f39-d9018438bd1a&quot;,
            &quot;name&quot;: &quot;adasasasdada&quot;,
            &quot;slug&quot;: &quot;adasasasdada&quot;
        },
        {
            &quot;id&quot;: &quot;1b5ab92f-80f4-4fe7-979b-373b3b144eb9&quot;,
            &quot;name&quot;: &quot;adasasasdadas&quot;,
            &quot;slug&quot;: &quot;adasasasdadas&quot;
        },
        {
            &quot;id&quot;: &quot;cdae6001-2ee8-44a2-ab61-1231d395c226&quot;,
            &quot;name&quot;: &quot;adasasasdadasd&quot;,
            &quot;slug&quot;: &quot;adasasasdadasd&quot;
        },
        {
            &quot;id&quot;: &quot;40aa43d2-3f80-4a1b-9e8d-17eb2fba323b&quot;,
            &quot;name&quot;: &quot;adasasasdadasda&quot;,
            &quot;slug&quot;: &quot;adasasasdadasda&quot;
        },
        {
            &quot;id&quot;: &quot;909754a5-cbd6-4eca-b8c9-9d486030be6b&quot;,
            &quot;name&quot;: &quot;adasasasdadasdas&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdas&quot;
        },
        {
            &quot;id&quot;: &quot;f7a741c6-603b-4ef7-a71b-a831877f8349&quot;,
            &quot;name&quot;: &quot;adasasasdadasdasd&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdasd&quot;
        },
        {
            &quot;id&quot;: &quot;51aa893a-9b1f-4349-a330-22d7907da47f&quot;,
            &quot;name&quot;: &quot;adasasasdadasdasda&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdasda&quot;
        },
        {
            &quot;id&quot;: &quot;482ae725-dbbc-4017-9f7e-b0e812e072bf&quot;,
            &quot;name&quot;: &quot;adasasasdadasdasdaa&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdasdaa&quot;
        },
        {
            &quot;id&quot;: &quot;993f1c25-520a-48f4-ba34-a505f2fcbeb3&quot;,
            &quot;name&quot;: &quot;adasasasdadasdasdaas&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdasdaas&quot;
        },
        {
            &quot;id&quot;: &quot;a895d33e-41e7-45d1-b6ef-e5d4ca819c09&quot;,
            &quot;name&quot;: &quot;adasasasdadasdasdaasd&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdasdaasd&quot;
        },
        {
            &quot;id&quot;: &quot;d9fad740-445e-4ce4-ace1-1fcaf8ca9c90&quot;,
            &quot;name&quot;: &quot;adasasasdadasdasdaasda&quot;,
            &quot;slug&quot;: &quot;adasasasdadasdasdaasda&quot;
        },
        {
            &quot;id&quot;: &quot;8259fdaf-9a28-44b8-afd9-7a0eb883317f&quot;,
            &quot;name&quot;: &quot;hey&quot;,
            &quot;slug&quot;: &quot;hey&quot;
        },
        {
            &quot;id&quot;: &quot;b2b515c7-842c-4d7c-9b4d-97a82e708e41&quot;,
            &quot;name&quot;: &quot;heyy&quot;,
            &quot;slug&quot;: &quot;heyy&quot;
        },
        {
            &quot;id&quot;: &quot;364cd818-6413-455f-8503-0e40a1ef841a&quot;,
            &quot;name&quot;: &quot;dfdsfsdfdsfa&quot;,
            &quot;slug&quot;: &quot;dfdsfsdfdsfa&quot;
        },
        {
            &quot;id&quot;: &quot;abcbfa13-d076-4a26-bb68-392941c9b476&quot;,
            &quot;name&quot;: &quot;laravel&quot;,
            &quot;slug&quot;: &quot;laravel&quot;
        },
        {
            &quot;id&quot;: &quot;9673fa3a-b91e-40e1-bc36-db4b1b3d9b78&quot;,
            &quot;name&quot;: &quot;fuck me&quot;,
            &quot;slug&quot;: &quot;fuck-me&quot;
        },
        {
            &quot;id&quot;: &quot;648e6b92-840e-4656-93c8-68b53022e189&quot;,
            &quot;name&quot;: &quot;Netflix&quot;,
            &quot;slug&quot;: &quot;netflix&quot;
        },
        {
            &quot;id&quot;: &quot;eed9583d-6d4c-4db4-a7b6-03c91141f26e&quot;,
            &quot;name&quot;: &quot;Netd&quot;,
            &quot;slug&quot;: &quot;netd&quot;
        },
        {
            &quot;id&quot;: &quot;d2aab5f0-0789-41ff-ac8a-55ef0fd683ff&quot;,
            &quot;name&quot;: &quot;Robin&quot;,
            &quot;slug&quot;: &quot;robin&quot;
        },
        {
            &quot;id&quot;: &quot;d56157aa-8765-40ab-bb01-fffdb7b2b23f&quot;,
            &quot;name&quot;: &quot;dfdfd&quot;,
            &quot;slug&quot;: &quot;dfdfd&quot;
        },
        {
            &quot;id&quot;: &quot;d498e42e-d284-4fa0-8713-50daee2649e0&quot;,
            &quot;name&quot;: &quot;dsds&quot;,
            &quot;slug&quot;: &quot;dsds&quot;
        },
        {
            &quot;id&quot;: &quot;59233c7d-4884-42ff-b5a4-15269bcaaf01&quot;,
            &quot;name&quot;: &quot;sazid&quot;,
            &quot;slug&quot;: &quot;sazid&quot;
        },
        {
            &quot;id&quot;: &quot;0c51c960-95cb-442f-841c-91fb28100bea&quot;,
            &quot;name&quot;: &quot;looooo&quot;,
            &quot;slug&quot;: &quot;looooo&quot;
        },
        {
            &quot;id&quot;: &quot;342a1dd2-407d-4b27-9b1f-4f939d4c561e&quot;,
            &quot;name&quot;: &quot;ads&quot;,
            &quot;slug&quot;: &quot;ads&quot;
        },
        {
            &quot;id&quot;: &quot;dda56254-346a-4266-b8a5-df26997b1f4b&quot;,
            &quot;name&quot;: &quot;dasdsadas&quot;,
            &quot;slug&quot;: &quot;dasdsadas&quot;
        },
        {
            &quot;id&quot;: &quot;a6d10116-618b-4736-ac86-22a9a825dc8c&quot;,
            &quot;name&quot;: &quot;adsdasdasdasd&quot;,
            &quot;slug&quot;: &quot;adsdasdasdasd&quot;
        },
        {
            &quot;id&quot;: &quot;f77533ad-2d34-4afa-bf9b-166de5ac05ca&quot;,
            &quot;name&quot;: &quot;FucK&quot;,
            &quot;slug&quot;: &quot;fuck&quot;
        },
        {
            &quot;id&quot;: &quot;c37bb74a-9f51-40dc-a4f8-371c5fb9c6f3&quot;,
            &quot;name&quot;: &quot;inventore&quot;,
            &quot;slug&quot;: &quot;inventore&quot;
        },
        {
            &quot;id&quot;: &quot;f830e75e-6d35-4a74-b257-703fba8fbe92&quot;,
            &quot;name&quot;: &quot;temporibus&quot;,
            &quot;slug&quot;: &quot;temporibus&quot;
        },
        {
            &quot;id&quot;: &quot;8ce9bdea-c05f-4dfb-9f40-edf57a8beb34&quot;,
            &quot;name&quot;: &quot;dolore&quot;,
            &quot;slug&quot;: &quot;dolore&quot;
        },
        {
            &quot;id&quot;: &quot;28571832-a2b7-4876-9bb4-d3a5ded53a46&quot;,
            &quot;name&quot;: &quot;sequi&quot;,
            &quot;slug&quot;: &quot;sequi&quot;
        },
        {
            &quot;id&quot;: &quot;e2ec3b79-2d14-413b-99fc-2655fa4b5954&quot;,
            &quot;name&quot;: &quot;ullam&quot;,
            &quot;slug&quot;: &quot;ullam&quot;
        },
        {
            &quot;id&quot;: &quot;4d6bcc8f-22c4-45f8-a050-ce388df8a199&quot;,
            &quot;name&quot;: &quot;beatae&quot;,
            &quot;slug&quot;: &quot;beatae&quot;
        },
        {
            &quot;id&quot;: &quot;7046a3dd-2849-40ba-aa4c-574cf76399a5&quot;,
            &quot;name&quot;: &quot;nihil&quot;,
            &quot;slug&quot;: &quot;nihil&quot;
        },
        {
            &quot;id&quot;: &quot;b1b09849-8599-4e61-805f-7354ea2a3df4&quot;,
            &quot;name&quot;: &quot;consequatur&quot;,
            &quot;slug&quot;: &quot;consequatur&quot;
        },
        {
            &quot;id&quot;: &quot;cfd39d33-05aa-43bd-b461-ed77316b1241&quot;,
            &quot;name&quot;: &quot;mollitia&quot;,
            &quot;slug&quot;: &quot;mollitia&quot;
        },
        {
            &quot;id&quot;: &quot;8c16d154-45cf-4107-a656-cf37d9a91a44&quot;,
            &quot;name&quot;: &quot;quo&quot;,
            &quot;slug&quot;: &quot;quo&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tags" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tags"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tags"></code></pre>
</span>
<span id="execution-error-GETapi-tags" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tags"></code></pre>
</span>
<form id="form-GETapi-tags" data-method="GET"
      data-path="api/tags"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tags', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tags"
                    onclick="tryItOut('GETapi-tags');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tags"
                    onclick="cancelTryOut('GETapi-tags');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tags" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tags</code></b>
        </p>
                    </form>

            <h2 id="tag-POSTapi-tags">Create tag</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Store a newly created resource in storage.</p>

<span id="example-requests-POSTapi-tags">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/tags" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"asd\",
    \"slug\": \"asperiores\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tags"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "asd",
    "slug": "asperiores"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-tags">
</span>
<span id="execution-results-POSTapi-tags" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tags"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tags"></code></pre>
</span>
<span id="execution-error-POSTapi-tags" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tags"></code></pre>
</span>
<form id="form-POSTapi-tags" data-method="POST"
      data-path="api/tags"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tags', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tags"
                    onclick="tryItOut('POSTapi-tags');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tags"
                    onclick="cancelTryOut('POSTapi-tags');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tags" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tags</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-tags" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-tags"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-tags"
               value="asd"
               data-component="body" hidden>
    <br>
<p>Must be at least 3 characters.</p>
        </p>
                <p>
            <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="POSTapi-tags"
               value="asperiores"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="tag-GETapi-tags--tag_slug--jobs">Jobs of a tag</h2>

<p>
</p>



<span id="example-requests-GETapi-tags--tag_slug--jobs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/tags/consequatur/jobs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/tags/consequatur/jobs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tags--tag_slug--jobs">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Tag] 1&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 355,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 331,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 172,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 726,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 701,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 665,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 654,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 117,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 75,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 48,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 136,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/home/rayhan/code/vuejs-bootcamp/job-board-api/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tags--tag_slug--jobs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tags--tag_slug--jobs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tags--tag_slug--jobs"></code></pre>
</span>
<span id="execution-error-GETapi-tags--tag_slug--jobs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tags--tag_slug--jobs"></code></pre>
</span>
<form id="form-GETapi-tags--tag_slug--jobs" data-method="GET"
      data-path="api/tags/{tag_slug}/jobs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tags--tag_slug--jobs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tags--tag_slug--jobs"
                    onclick="tryItOut('GETapi-tags--tag_slug--jobs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tags--tag_slug--jobs"
                    onclick="cancelTryOut('GETapi-tags--tag_slug--jobs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tags--tag_slug--jobs" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tags/{tag_slug}/jobs</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>tag_slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="tag_slug"
               data-endpoint="GETapi-tags--tag_slug--jobs"
               value="consequatur"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

        <h1 id="upload">Upload</h1>

    <p>File uploader apis</p>

            <h2 id="upload-POSTapi-uploads">Upload file</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-uploads">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/uploads" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "file=@/tmp/phpn7Hsei" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/uploads"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-uploads">
</span>
<span id="execution-results-POSTapi-uploads" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-uploads"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-uploads"></code></pre>
</span>
<span id="execution-error-POSTapi-uploads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-uploads"></code></pre>
</span>
<form id="form-POSTapi-uploads" data-method="POST"
      data-path="api/uploads"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-uploads', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-uploads"
                    onclick="tryItOut('POSTapi-uploads');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-uploads"
                    onclick="cancelTryOut('POSTapi-uploads');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-uploads" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/uploads</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-uploads" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-uploads"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>file</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="file"
               data-endpoint="POSTapi-uploads"
               value=""
               data-component="body" hidden>
    <br>
<ul>
<li>File</li>
</ul>
        </p>
        </form>

            <h2 id="upload-DELETEapi-uploads">Delete file</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-uploads">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/uploads?url=repellendus" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/uploads"
);

const params = {
    "url": "repellendus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-uploads">
</span>
<span id="execution-results-DELETEapi-uploads" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-uploads"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-uploads"></code></pre>
</span>
<span id="execution-error-DELETEapi-uploads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-uploads"></code></pre>
</span>
<form id="form-DELETEapi-uploads" data-method="DELETE"
      data-path="api/uploads"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-uploads', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-uploads"
                    onclick="tryItOut('DELETEapi-uploads');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-uploads"
                    onclick="cancelTryOut('DELETEapi-uploads');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-uploads" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/uploads</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-uploads" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-uploads"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>url</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="url"
               data-endpoint="DELETEapi-uploads"
               value="repellendus"
               data-component="query" hidden>
    <br>
<ul>
<li>File url to delete</li>
</ul>
            </p>
                </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
