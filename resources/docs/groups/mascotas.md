# Mascotas


## Listar mascotas




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/mascotas?per_page=8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mascotas"
);

let params = {
    "per_page": "8",
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
<div id="execution-results-GETapi-mascotas" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mascotas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mascotas"></code></pre>
</div>
<div id="execution-error-GETapi-mascotas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mascotas"></code></pre>
</div>
<form id="form-GETapi-mascotas" data-method="GET" data-path="api/mascotas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mascotas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-mascotas" onclick="tryItOut('GETapi-mascotas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-mascotas" onclick="cancelTryOut('GETapi-mascotas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-mascotas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mascotas</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-mascotas" data-component="query"  hidden>
<br>
Opcional. Cantidad de resultados por página.
</p>
</form>


## Crear una nueva mascota

Este endpoint permite registrar una nueva mascota asociada a una persona.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/mascotas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nombre":"quia","especie":"perspiciatis","raza":"voluptatem","edad":12,"fecha_nacimiento":"dolore","imagen":"https:\/\/www.runolfsdottir.com\/perspiciatis-perferendis-cum-minus-quisquam-molestias-qui-tempora","persona_id":2}'

```

```javascript
const url = new URL(
    "http://localhost/api/mascotas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "quia",
    "especie": "perspiciatis",
    "raza": "voluptatem",
    "edad": 12,
    "fecha_nacimiento": "dolore",
    "imagen": "https:\/\/www.runolfsdottir.com\/perspiciatis-perferendis-cum-minus-quisquam-molestias-qui-tempora",
    "persona_id": 2
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (201):

```json

{
  "id": 10,
  "nombre": "Rocky",
  "especie": "perro",
  "raza": "Labrador",
  "edad": 3,
  "fecha_nacimiento": "2022-06-15",
  "persona_id": 1,
}
```
<div id="execution-results-POSTapi-mascotas" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mascotas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mascotas"></code></pre>
</div>
<div id="execution-error-POSTapi-mascotas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mascotas"></code></pre>
</div>
<form id="form-POSTapi-mascotas" data-method="POST" data-path="api/mascotas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mascotas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mascotas" onclick="tryItOut('POSTapi-mascotas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mascotas" onclick="cancelTryOut('POSTapi-mascotas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mascotas" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mascotas</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nombre</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nombre" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
requerido El nombre de la mascota. Ejemplo: Rocky
</p>
<p>
<b><code>especie</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="especie" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
requerido Especie de la mascota. Puede ser 'perro' o 'gato'. Ejemplo: perro
</p>
<p>
<b><code>raza</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="raza" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
opcional Raza de la mascota. Ejemplo: Labrador
</p>
<p>
<b><code>edad</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="edad" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
opcional Edad aproximada de la mascota en años. Ejemplo: 3
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>date</small>     <i>optional</i> &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
opcional Fecha de nacimiento de la mascota en formato Y-m-d. Ejemplo: 2022-06-15
</p>
<p>
<b><code>imagen</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="imagen" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
The value must be a valid URL.
</p>
<p>
<b><code>persona_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="persona_id" data-endpoint="POSTapi-mascotas" data-component="body"  hidden>
<br>
requerido ID de la persona a la que pertenece la mascota. Ejemplo: 1
</p>

</form>


## Mostrar mascota




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/mascotas/occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mascotas/occaecati"
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
<div id="execution-results-GETapi-mascotas--mascota-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mascotas--mascota-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mascotas--mascota-"></code></pre>
</div>
<div id="execution-error-GETapi-mascotas--mascota-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mascotas--mascota-"></code></pre>
</div>
<form id="form-GETapi-mascotas--mascota-" data-method="GET" data-path="api/mascotas/{mascota}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mascotas--mascota-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-mascotas--mascota-" onclick="tryItOut('GETapi-mascotas--mascota-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-mascotas--mascota-" onclick="cancelTryOut('GETapi-mascotas--mascota-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-mascotas--mascota-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mascotas/{mascota}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>mascota</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mascota" data-endpoint="GETapi-mascotas--mascota-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-mascotas--mascota-" data-component="url"  hidden>
<br>
requerido. ID de la mascota.
</p>
</form>


## Actualizar mascota




> Example request:

```bash
curl -X PUT \
    "http://localhost/api/mascotas/voluptatum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nombre":"sit","especie":"totam","raza":"rerum","edad":7,"fecha_nacimiento":"2025-05-07T13:00:12+0000","imagen":"http:\/\/pacocha.net\/iste-ab-voluptas-eos-quaerat-veniam-sed.html","persona_id":5}'

```

```javascript
const url = new URL(
    "http://localhost/api/mascotas/voluptatum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "sit",
    "especie": "totam",
    "raza": "rerum",
    "edad": 7,
    "fecha_nacimiento": "2025-05-07T13:00:12+0000",
    "imagen": "http:\/\/pacocha.net\/iste-ab-voluptas-eos-quaerat-veniam-sed.html",
    "persona_id": 5
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-PUTapi-mascotas--mascota-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-mascotas--mascota-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mascotas--mascota-"></code></pre>
</div>
<div id="execution-error-PUTapi-mascotas--mascota-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mascotas--mascota-"></code></pre>
</div>
<form id="form-PUTapi-mascotas--mascota-" data-method="PUT" data-path="api/mascotas/{mascota}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-mascotas--mascota-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-mascotas--mascota-" onclick="tryItOut('PUTapi-mascotas--mascota-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-mascotas--mascota-" onclick="cancelTryOut('PUTapi-mascotas--mascota-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-mascotas--mascota-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/mascotas/{mascota}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/mascotas/{mascota}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>mascota</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mascota" data-endpoint="PUTapi-mascotas--mascota-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-mascotas--mascota-" data-component="url"  hidden>
<br>
requerido. ID de la mascota.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nombre</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nombre" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>especie</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="especie" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>raza</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="raza" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>edad</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="edad" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
requerido.
</p>
<p>
<b><code>fecha_nacimiento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fecha_nacimiento" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
The value must be a valid date.
</p>
<p>
<b><code>imagen</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="imagen" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
The value must be a valid URL.
</p>
<p>
<b><code>persona_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="persona_id" data-endpoint="PUTapi-mascotas--mascota-" data-component="body"  hidden>
<br>
requerido.
</p>

</form>


## Eliminar mascota




> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/mascotas/autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mascotas/autem"
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


<div id="execution-results-DELETEapi-mascotas--mascota-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-mascotas--mascota-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mascotas--mascota-"></code></pre>
</div>
<div id="execution-error-DELETEapi-mascotas--mascota-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mascotas--mascota-"></code></pre>
</div>
<form id="form-DELETEapi-mascotas--mascota-" data-method="DELETE" data-path="api/mascotas/{mascota}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mascotas--mascota-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-mascotas--mascota-" onclick="tryItOut('DELETEapi-mascotas--mascota-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-mascotas--mascota-" onclick="cancelTryOut('DELETEapi-mascotas--mascota-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-mascotas--mascota-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/mascotas/{mascota}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>mascota</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mascota" data-endpoint="DELETEapi-mascotas--mascota-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-mascotas--mascota-" data-component="url"  hidden>
<br>
requerido. ID de la mascota.
</p>
</form>



