# Personas


## Listar personas




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/personas?per_page=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/personas"
);

let params = {
    "per_page": "2",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "status": "Token no proporcionado",
    "message": "No se encontró el token de autenticación"
}
```
<div id="execution-results-GETapi-personas" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-personas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-personas"></code></pre>
</div>
<div id="execution-error-GETapi-personas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-personas"></code></pre>
</div>
<form id="form-GETapi-personas" data-method="GET" data-path="api/personas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-personas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-personas" onclick="tryItOut('GETapi-personas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-personas" onclick="cancelTryOut('GETapi-personas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-personas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/personas</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-personas" data-component="query"  hidden>
<br>
Opcional. Cantidad de resultados por página.
</p>
</form>


## Crear una nueva persona




> Example request:

```bash
curl -X POST \
    "http://localhost/api/personas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nombre":"id","email":"xkling@example.net","fecha_nacimiento":"2025-05-07T13:00:12+0000","apellido":"ratione","edad":1,"direccion":"sunt"}'

```

```javascript
const url = new URL(
    "http://localhost/api/personas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "id",
    "email": "xkling@example.net",
    "fecha_nacimiento": "2025-05-07T13:00:12+0000",
    "apellido": "ratione",
    "edad": 1,
    "direccion": "sunt"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-personas" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-personas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-personas"></code></pre>
</div>
<div id="execution-error-POSTapi-personas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-personas"></code></pre>
</div>
<form id="form-POSTapi-personas" data-method="POST" data-path="api/personas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-personas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-personas" onclick="tryItOut('POSTapi-personas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-personas" onclick="cancelTryOut('POSTapi-personas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-personas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/personas</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nombre</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nombre" data-endpoint="POSTapi-personas" data-component="body"  hidden>
<br>
requerido. Nombre de la persona.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-personas" data-component="body" required  hidden>
<br>
The value must be a valid email address.
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="POSTapi-personas" data-component="body" required  hidden>
<br>
The value must be a valid date.
</p>
<p>
<b><code>apellido</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="apellido" data-endpoint="POSTapi-personas" data-component="body"  hidden>
<br>
requerido. Apellido de la persona.
</p>
<p>
<b><code>edad</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="edad" data-endpoint="POSTapi-personas" data-component="body"  hidden>
<br>
requerido. Edad.
</p>
<p>
<b><code>direccion</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="direccion" data-endpoint="POSTapi-personas" data-component="body"  hidden>
<br>
Opcional. Dirección.
}
</p>

</form>


## Mostrar una persona




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/personas/rem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/personas/rem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Persona] rem",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 385,
    "trace": [
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 332,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\app\\Exceptions\\Handler.php",
            "line": 63,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\nunomaduro\\collision\\src\\Adapters\\Laravel\\ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 172,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 723,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 698,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 662,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 651,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 167,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 39,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 142,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 111,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 653,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 298,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\symfony\\console\\Application.php",
            "line": 1040,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\symfony\\console\\Application.php",
            "line": 301,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\symfony\\console\\Application.php",
            "line": 171,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 94,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\wamp64\\www\\personas-mascotas-api\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETapi-personas--persona-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-personas--persona-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-personas--persona-"></code></pre>
</div>
<div id="execution-error-GETapi-personas--persona-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-personas--persona-"></code></pre>
</div>
<form id="form-GETapi-personas--persona-" data-method="GET" data-path="api/personas/{persona}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-personas--persona-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-personas--persona-" onclick="tryItOut('GETapi-personas--persona-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-personas--persona-" onclick="cancelTryOut('GETapi-personas--persona-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-personas--persona-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/personas/{persona}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>persona</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="persona" data-endpoint="GETapi-personas--persona-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-personas--persona-" data-component="url"  hidden>
<br>
requerido. ID de la persona.
}
</p>
</form>


## Actualizar una persona




> Example request:

```bash
curl -X PUT \
    "http://localhost/api/personas/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nombre":"consectetur","email":"larissa10@example.net","fecha_nacimiento":"2025-05-07T13:00:12+0000","apellido":"et","edad":4,"direccion":"modi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/personas/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "consectetur",
    "email": "larissa10@example.net",
    "fecha_nacimiento": "2025-05-07T13:00:12+0000",
    "apellido": "et",
    "edad": 4,
    "direccion": "modi"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-PUTapi-personas--persona-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-personas--persona-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-personas--persona-"></code></pre>
</div>
<div id="execution-error-PUTapi-personas--persona-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-personas--persona-"></code></pre>
</div>
<form id="form-PUTapi-personas--persona-" data-method="PUT" data-path="api/personas/{persona}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-personas--persona-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-personas--persona-" onclick="tryItOut('PUTapi-personas--persona-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-personas--persona-" onclick="cancelTryOut('PUTapi-personas--persona-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-personas--persona-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/personas/{persona}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/personas/{persona}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>persona</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="persona" data-endpoint="PUTapi-personas--persona-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-personas--persona-" data-component="url"  hidden>
<br>
requerido. ID de la persona.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nombre</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nombre" data-endpoint="PUTapi-personas--persona-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-personas--persona-" data-component="body" required  hidden>
<br>
The value must be a valid email address.
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="PUTapi-personas--persona-" data-component="body" required  hidden>
<br>
The value must be a valid date.
</p>
<p>
<b><code>apellido</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="apellido" data-endpoint="PUTapi-personas--persona-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>edad</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="edad" data-endpoint="PUTapi-personas--persona-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>direccion</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="direccion" data-endpoint="PUTapi-personas--persona-" data-component="body"  hidden>
<br>
Opcional.
}
</p>

</form>


## Eliminar una persona




> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/personas/maiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/personas/maiores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-personas--persona-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-personas--persona-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-personas--persona-"></code></pre>
</div>
<div id="execution-error-DELETEapi-personas--persona-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-personas--persona-"></code></pre>
</div>
<form id="form-DELETEapi-personas--persona-" data-method="DELETE" data-path="api/personas/{persona}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-personas--persona-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-personas--persona-" onclick="tryItOut('DELETEapi-personas--persona-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-personas--persona-" onclick="cancelTryOut('DELETEapi-personas--persona-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-personas--persona-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/personas/{persona}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>persona</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="persona" data-endpoint="DELETEapi-personas--persona-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-personas--persona-" data-component="url"  hidden>
<br>
requerido. ID de la persona.
</p>
</form>


## Obtener una persona con sus mascotas




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/personas/1/mascotas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/personas/1/mascotas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "status": "Token no proporcionado",
    "message": "No se encontró el token de autenticación"
}
```
<div id="execution-results-GETapi-personas--id--mascotas" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-personas--id--mascotas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-personas--id--mascotas"></code></pre>
</div>
<div id="execution-error-GETapi-personas--id--mascotas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-personas--id--mascotas"></code></pre>
</div>
<form id="form-GETapi-personas--id--mascotas" data-method="GET" data-path="api/personas/{id}/mascotas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-personas--id--mascotas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-personas--id--mascotas" onclick="tryItOut('GETapi-personas--id--mascotas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-personas--id--mascotas" onclick="cancelTryOut('GETapi-personas--id--mascotas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-personas--id--mascotas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/personas/{id}/mascotas</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-personas--id--mascotas" data-component="url"  hidden>
<br>
requerido. ID de la persona.
</p>
</form>



