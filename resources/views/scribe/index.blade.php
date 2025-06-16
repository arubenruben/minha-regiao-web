<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>minharegiao API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
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
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-cities">
                                <a href="#endpoints-GETapi-cities">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-cities">
                                <a href="#endpoints-POSTapi-cities">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-cities--id-">
                                <a href="#endpoints-GETapi-cities--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-cities--id-">
                                <a href="#endpoints-PUTapi-cities--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-cities--id-">
                                <a href="#endpoints-DELETEapi-cities--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-districts">
                                <a href="#endpoints-GETapi-districts">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-districts">
                                <a href="#endpoints-POSTapi-districts">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-districts--id-">
                                <a href="#endpoints-GETapi-districts--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-districts--id-">
                                <a href="#endpoints-PUTapi-districts--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-districts--id-">
                                <a href="#endpoints-DELETEapi-districts--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-parishes">
                                <a href="#endpoints-GETapi-parishes">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-parishes">
                                <a href="#endpoints-POSTapi-parishes">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-parishes--id-">
                                <a href="#endpoints-GETapi-parishes--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-parishes--id-">
                                <a href="#endpoints-PUTapi-parishes--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-parishes--id-">
                                <a href="#endpoints-DELETEapi-parishes--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 16, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-cities">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-cities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/cities" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/cities"
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

<span id="example-responses-GETapi-cities">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Ribeira de Pena&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-pena.pt&quot;,
            &quot;phone&quot;: &quot;259 490 500&quot;,
            &quot;website&quot;: &quot;www.cm-rpena.pt&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Alij&oacute;&quot;,
            &quot;address&quot;: &quot;R General Alves Pedrosa, 13&quot;,
            &quot;email&quot;: &quot;geral@cm-alijo.pt&quot;,
            &quot;phone&quot;: &quot;259 957 100&quot;,
            &quot;website&quot;: &quot;www.cm-alijo.pt&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sabrosa&quot;,
            &quot;address&quot;: &quot;R do Loureto&quot;,
            &quot;email&quot;: &quot;geral@cm-sabrosa.pt&quot;,
            &quot;phone&quot;: &quot;259 937 120&quot;,
            &quot;website&quot;: &quot;www.cm-sabrosa.pt&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Santa Marta de Penagui&atilde;o&quot;,
            &quot;address&quot;: &quot;R dos Combatentes&quot;,
            &quot;email&quot;: &quot;geral@cm-smpenaguiao.pt&quot;,
            &quot;phone&quot;: &quot;254 810 130&quot;,
            &quot;website&quot;: &quot;www.cm-smpenaguiao.pt&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Vila Real&quot;,
            &quot;address&quot;: &quot;Av Carvalho Ara&uacute;jo&quot;,
            &quot;email&quot;: &quot;geral@cm-vilareal.pt&quot;,
            &quot;phone&quot;: &quot;259 308 100&quot;,
            &quot;website&quot;: &quot;www.cm-vilareal.pt&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Vila Pouca de Aguiar&quot;,
            &quot;address&quot;: &quot;Rua Henrique Botelho&quot;,
            &quot;email&quot;: &quot;geral@cm-vpaguiar.pt&quot;,
            &quot;phone&quot;: &quot;259 419 100&quot;,
            &quot;website&quot;: &quot;www.cm-vpaguiar.pt&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Valpa&ccedil;os&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;municipio@valpacos.pt&quot;,
            &quot;phone&quot;: &quot;278 710 130&quot;,
            &quot;website&quot;: &quot;www.cm-valpacos.pt&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Carregal do Sal&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-carregal.pt&quot;,
            &quot;phone&quot;: &quot;232 960 400&quot;,
            &quot;website&quot;: &quot;www.carregal-digital.pt&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Lamego&quot;,
            &quot;address&quot;: &quot;Av. Padre Alfredo Pinto Teixeira&quot;,
            &quot;email&quot;: &quot;geral@cm-lamego.pt&quot;,
            &quot;phone&quot;: &quot;254 609 600&quot;,
            &quot;website&quot;: &quot;www.cm-lamego.pt&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Mangualde&quot;,
            &quot;address&quot;: &quot;Lg Dr Couto&quot;,
            &quot;email&quot;: &quot;geral@cmmangualde.pt&quot;,
            &quot;phone&quot;: &quot;232619880&quot;,
            &quot;website&quot;: &quot;www.cm-mangualde.pt&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Armamar&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-armamar.pt&quot;,
            &quot;phone&quot;: &quot;254 850 800&quot;,
            &quot;website&quot;: &quot;www.cm-armamar.pt&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Cinf&atilde;es&quot;,
            &quot;address&quot;: &quot;Lg dos Pa&ccedil;os do Concelho&quot;,
            &quot;email&quot;: &quot;cm-cinfaes@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;255560560&quot;,
            &quot;website&quot;: &quot;www.cm-cinfaes.pt&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Oliveira de Frades&quot;,
            &quot;address&quot;: &quot;Lg Dr Joaquim de Almeida&quot;,
            &quot;email&quot;: &quot;cmofrades@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;232 760 300&quot;,
            &quot;website&quot;: &quot;www.cm-ofrades.com&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Resende&quot;,
            &quot;address&quot;: &quot;Av Rebelo Moniz&quot;,
            &quot;email&quot;: &quot;geral@cm-resende.pt&quot;,
            &quot;phone&quot;: &quot;254 240 930 / 926 508 800&quot;,
            &quot;website&quot;: &quot;www.cm-resende.pt&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Santa Comba D&atilde;o&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio, 13&quot;,
            &quot;email&quot;: &quot;geral@cm-santacombadao.pt&quot;,
            &quot;phone&quot;: &quot;232 880 500&quot;,
            &quot;website&quot;: &quot;www.cm-santacombadao.pt&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;S&atilde;o Jo&atilde;o da Pesqueira&quot;,
            &quot;address&quot;: &quot;Av. Marqu&ecirc;s de Soveral&quot;,
            &quot;email&quot;: &quot;cmsjp@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;254 489 999&quot;,
            &quot;website&quot;: &quot;www.sjpesqueira.pt&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Nelas&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-nelas.pt&quot;,
            &quot;phone&quot;: &quot;232 941 300&quot;,
            &quot;website&quot;: &quot;www.cm-nelas.pt&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Penalva do Castelo&quot;,
            &quot;address&quot;: &quot;Avenida Castendo&quot;,
            &quot;email&quot;: &quot;geral@cm-penalvadocastelo.pt&quot;,
            &quot;phone&quot;: &quot;232 640 020&quot;,
            &quot;website&quot;: &quot;www.cm-penalvadocastelo.pt&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Penedono&quot;,
            &quot;address&quot;: &quot;Lg da Devesa&quot;,
            &quot;email&quot;: &quot;cm.penedono@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;254 509 030&quot;,
            &quot;website&quot;: &quot;www.cm-penedono.pt&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;S&atilde;o Pedro do Sul&quot;,
            &quot;address&quot;: &quot;Lg de Cam&otilde;es&quot;,
            &quot;email&quot;: &quot;geral@cm-spsul.pt&quot;,
            &quot;phone&quot;: &quot;232 720 140&quot;,
            &quot;website&quot;: &quot;www.cm-spsul.pt&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Tabua&ccedil;o&quot;,
            &quot;address&quot;: &quot;R ANT&Oacute;NIO JOS&Eacute; DE ALMEIDA, 36&quot;,
            &quot;email&quot;: &quot;cm-tabuaco@cm-tabuaco.pt&quot;,
            &quot;phone&quot;: &quot;254 780 000&quot;,
            &quot;website&quot;: &quot;www.cm-tabuaco.pt&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Tarouca&quot;,
            &quot;address&quot;: &quot;Av Dr Alexandre Taveira Cardoso\n3610-128 TAROUCA&quot;,
            &quot;email&quot;: &quot;camara@cm-tarouca.pt&quot;,
            &quot;phone&quot;: &quot;254 677 420&quot;,
            &quot;website&quot;: &quot;www.cm-tarouca.pt&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;name&quot;: &quot;Tondela&quot;,
            &quot;address&quot;: &quot;Lg da Rep&uacute;blica, 16&quot;,
            &quot;email&quot;: &quot;cmtondela@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;232 811 110&quot;,
            &quot;website&quot;: &quot;www.cm-tondela.pt&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;S&aacute;t&atilde;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; Paulo VI&quot;,
            &quot;email&quot;: &quot;geral@cm-satao.pt&quot;,
            &quot;phone&quot;: &quot;232 980 000&quot;,
            &quot;website&quot;: &quot;www.cm-satao.pt&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;Viseu&quot;,
            &quot;address&quot;: &quot;P&ccedil; Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cmviseu.pt&quot;,
            &quot;phone&quot;: &quot;232 427 427&quot;,
            &quot;website&quot;: &quot;www.cm-viseu.pt&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;name&quot;: &quot;Albergaria-a-Velha&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Comendador Ferreira Tavares&quot;,
            &quot;email&quot;: &quot;geral@cm-albergaria.pt; info@cm-albergaria.pt&quot;,
            &quot;phone&quot;: &quot;234 529 300&quot;,
            &quot;website&quot;: &quot;www.cm-albergaria.pt&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;name&quot;: &quot;Castelo de Paiva&quot;,
            &quot;address&quot;: &quot;Largo do Conde - Sobrado&quot;,
            &quot;email&quot;: &quot;geral@cm-castelo-paiva.pt&quot;,
            &quot;phone&quot;: &quot;255 689 500&quot;,
            &quot;website&quot;: &quot;www.cm-castelo-paiva.pt&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;name&quot;: &quot;Arouca&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-arouca.pt&quot;,
            &quot;phone&quot;: &quot;256 940 220&quot;,
            &quot;website&quot;: &quot;www.cm-arouca.pt&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;name&quot;: &quot;Aveiro&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-aveiro.pt&quot;,
            &quot;phone&quot;: &quot;234 406 300&quot;,
            &quot;website&quot;: &quot;www.cm-aveiro.pt&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;Sever do Vouga&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;cm.sever@cm-sever.pt&quot;,
            &quot;phone&quot;: &quot;234 555 566&quot;,
            &quot;website&quot;: &quot;www.cm-sever.pt&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;S&atilde;o Jo&atilde;o da Madeira&quot;,
            &quot;address&quot;: &quot;Av. da Liberdade&quot;,
            &quot;email&quot;: &quot;geral@cm-sjm.pt&quot;,
            &quot;phone&quot;: &quot;256 200 200&quot;,
            &quot;website&quot;: &quot;www.cm-sjm.pt&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;name&quot;: &quot;Ovar&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;gapresidencia@cm-ovar.pt&quot;,
            &quot;phone&quot;: &quot;256 581 300&quot;,
            &quot;website&quot;: &quot;www.cm-ovar.pt&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Castro Verde&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-castroverde.pt&quot;,
            &quot;phone&quot;: &quot;286 320 700&quot;,
            &quot;website&quot;: &quot;www.cm-castroverde.pt&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;name&quot;: &quot;Almod&ocirc;var&quot;,
            &quot;address&quot;: &quot;R Serpa Pinto&quot;,
            &quot;email&quot;: &quot;geral@cm-almodovar.pt&quot;,
            &quot;phone&quot;: &quot;286 660 600&quot;,
            &quot;website&quot;: &quot;www.cm-almodovar.pt&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;name&quot;: &quot;Serpa&quot;,
            &quot;address&quot;: &quot;P&ccedil;. da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-serpa.pt&quot;,
            &quot;phone&quot;: &quot;284 540 100&quot;,
            &quot;website&quot;: &quot;www.cm-serpa.pt&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;name&quot;: &quot;Amares&quot;,
            &quot;address&quot;: &quot;Lg do Municipio&quot;,
            &quot;email&quot;: &quot;cm.amares@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;253 991 330 / 253 993 450  / 253 991 206&quot;,
            &quot;website&quot;: &quot;www.cm-amares.pt&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Cabeceiras de Basto&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica, n.&ordm; 467&quot;,
            &quot;email&quot;: &quot;servicoatendimentounico@cabeceirasdebasto.pt&quot;,
            &quot;phone&quot;: &quot;253 669 100&quot;,
            &quot;website&quot;: &quot;www.cabeceirasdebasto.pt&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;name&quot;: &quot;Esposende&quot;,
            &quot;address&quot;: &quot;C&acirc;mara Municipal Pra&ccedil;a do munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;assembleia.municipal@cm-esposende.pt&quot;,
            &quot;phone&quot;: &quot;253 960 100&quot;,
            &quot;website&quot;: &quot;www.cm-esposende.pt&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;name&quot;: &quot;Celorico de Basto&quot;,
            &quot;address&quot;: &quot;P&ccedil; Cardeal D Ant&oacute;nio Ribeiro, 4890-220 CELORICO DE BASTO&quot;,
            &quot;email&quot;: &quot;geral@cm-celoricobasto.pt&quot;,
            &quot;phone&quot;: &quot;255 320 300&quot;,
            &quot;website&quot;: &quot;www.mun-celoricodebasto.pt&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;name&quot;: &quot;Guimar&atilde;es&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: &quot;geral@cm-guimares.pt&quot;,
            &quot;phone&quot;: &quot;253 421 200&quot;,
            &quot;website&quot;: &quot;www.cm-guimaraes.pt&quot;
        },
        {
            &quot;id&quot;: 41,
            &quot;name&quot;: &quot;Terras de Bouro&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-terrasdebouro.pt&quot;,
            &quot;phone&quot;: &quot;253 350 010&quot;,
            &quot;website&quot;: &quot;www.cm-terrasdebouro.pt&quot;
        },
        {
            &quot;id&quot;: 42,
            &quot;name&quot;: &quot;Vila Verde&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-vilaverde.pt&quot;,
            &quot;phone&quot;: &quot;253 310 500&quot;,
            &quot;website&quot;: &quot;www.cm-vilaverde.pt&quot;
        },
        {
            &quot;id&quot;: 43,
            &quot;name&quot;: &quot;Vila Nova de Famalic&atilde;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; &Aacute;lvaro Marques&quot;,
            &quot;email&quot;: &quot;camaramunicipal@vilanovadefamalicao.org&quot;,
            &quot;phone&quot;: &quot;252 320 900&quot;,
            &quot;website&quot;: &quot;www.cm-vnfamalicao.pt&quot;
        },
        {
            &quot;id&quot;: 44,
            &quot;name&quot;: &quot;P&oacute;voa de Lanhoso&quot;,
            &quot;address&quot;: &quot;Av da Rep&uacute;blica\n4830-513 POVOA DO LANHOSO&quot;,
            &quot;email&quot;: &quot;geral@mun-planhoso.pt&quot;,
            &quot;phone&quot;: &quot;253 639 700&quot;,
            &quot;website&quot;: &quot;www.cm-povoadelanhoso.pt&quot;
        },
        {
            &quot;id&quot;: 45,
            &quot;name&quot;: &quot;Vizela&quot;,
            &quot;address&quot;: &quot;R Dr Alfredo Pinto, 42&quot;,
            &quot;email&quot;: &quot;geral@cm-vizela.pt&quot;,
            &quot;phone&quot;: &quot;253 489 640&quot;,
            &quot;website&quot;: &quot;www.cm-vizela.pt&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;name&quot;: &quot;Carrazeda de Ansi&atilde;es&quot;,
            &quot;address&quot;: &quot;Rua Jer&oacute;nimo Barbosa&lt;br/&gt;5140-077 CARRAZEDA DE ANSIAES&quot;,
            &quot;email&quot;: &quot;geral@cmca.pt&quot;,
            &quot;phone&quot;: &quot;278 610 200&quot;,
            &quot;website&quot;: &quot;www.cm-carrazedadeansiaes.pt&quot;
        },
        {
            &quot;id&quot;: 47,
            &quot;name&quot;: &quot;Bragan&ccedil;a&quot;,
            &quot;address&quot;: &quot;Forte S Jo&atilde;o Deus&quot;,
            &quot;email&quot;: &quot;cmb@cm-braganca.pt&quot;,
            &quot;phone&quot;: &quot;273 304 200&quot;,
            &quot;website&quot;: &quot;www.cm-braganca.pt&quot;
        },
        {
            &quot;id&quot;: 48,
            &quot;name&quot;: &quot;Freixo de Espada &agrave; Cinta&quot;,
            &quot;address&quot;: &quot;Praceta do Municipio&quot;,
            &quot;email&quot;: &quot;geral@cm-fec.pt&quot;,
            &quot;phone&quot;: &quot;279 658 160&quot;,
            &quot;website&quot;: &quot;www.cm-freixoespadacinta.pt&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;name&quot;: &quot;Miranda do Douro&quot;,
            &quot;address&quot;: &quot;Largo D Jo&atilde;o III&quot;,
            &quot;email&quot;: &quot;geral@cm-mdouro.pt&quot;,
            &quot;phone&quot;: &quot;273 430 020&quot;,
            &quot;website&quot;: &quot;www.cm-mdouro.pt&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;name&quot;: &quot;Mirandela&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-mirandela.pt&quot;,
            &quot;phone&quot;: &quot;278 200 200&quot;,
            &quot;website&quot;: &quot;www.cm-mirandela.pt&quot;
        },
        {
            &quot;id&quot;: 51,
            &quot;name&quot;: &quot;Vila Fl&ocirc;r&quot;,
            &quot;address&quot;: &quot;Av Marechal Carmona&quot;,
            &quot;email&quot;: &quot;geral@cm-vilaflor.pt&quot;,
            &quot;phone&quot;: &quot;278 510 100&quot;,
            &quot;website&quot;: &quot;www.cm-vilaflor.pt&quot;
        },
        {
            &quot;id&quot;: 52,
            &quot;name&quot;: &quot;Torre de Moncorvo&quot;,
            &quot;address&quot;: &quot;Largo Dr. Campos Monteiro&quot;,
            &quot;email&quot;: &quot;geral@torredemoncorvo.pt&quot;,
            &quot;phone&quot;: &quot;279 200 220&quot;,
            &quot;website&quot;: &quot;www.cm-moncorvo.pt&quot;
        },
        {
            &quot;id&quot;: 53,
            &quot;name&quot;: &quot;Vinhais&quot;,
            &quot;address&quot;: &quot;Rua das Freiras&quot;,
            &quot;email&quot;: &quot;geral@cm-vinhais.pt&quot;,
            &quot;phone&quot;: &quot;273 770 300&quot;,
            &quot;website&quot;: &quot;www.cm-vinhais.pt&quot;
        },
        {
            &quot;id&quot;: 54,
            &quot;name&quot;: &quot;Belmonte&quot;,
            &quot;address&quot;: &quot;R Pedro &Aacute;lvares Cabral, 135&quot;,
            &quot;email&quot;: &quot;cmbelmonte@mail.telapac.pt&quot;,
            &quot;phone&quot;: &quot;275 910 010&quot;,
            &quot;website&quot;: &quot;www.cm-belmonte.pt&quot;
        },
        {
            &quot;id&quot;: 55,
            &quot;name&quot;: &quot;Vila de Rei&quot;,
            &quot;address&quot;: &quot;Alameda de S Roque&quot;,
            &quot;email&quot;: &quot;cmsrp@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;292648700&quot;,
            &quot;website&quot;: &quot;www.cmsrp.pt&quot;
        },
        {
            &quot;id&quot;: 56,
            &quot;name&quot;: &quot;Oleiros&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-oleiros.pt&quot;,
            &quot;phone&quot;: &quot;272 680 130&quot;,
            &quot;website&quot;: &quot;www.cm-oleiros.pt&quot;
        },
        {
            &quot;id&quot;: 57,
            &quot;name&quot;: &quot;Castelo Branco&quot;,
            &quot;address&quot;: &quot;Pa&ccedil;os Concelho&quot;,
            &quot;email&quot;: &quot;camara@cm-castelobranco.pt&quot;,
            &quot;phone&quot;: &quot;272 330 330&quot;,
            &quot;website&quot;: &quot;www.cm-castelobranco.pt&quot;
        },
        {
            &quot;id&quot;: 58,
            &quot;name&quot;: &quot;Covilh&atilde;&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;info@cm-covilha.pt&quot;,
            &quot;phone&quot;: &quot;275 330 600&quot;,
            &quot;website&quot;: &quot;www.cm-covilha.pt&quot;
        },
        {
            &quot;id&quot;: 59,
            &quot;name&quot;: &quot;Fund&atilde;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-fundao.pt&quot;,
            &quot;phone&quot;: &quot;275 779 060&quot;,
            &quot;website&quot;: &quot;www.cm-fundao.pt&quot;
        },
        {
            &quot;id&quot;: 60,
            &quot;name&quot;: &quot;Penamacor&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;secretaria.gap@cm-penamacor.pt&quot;,
            &quot;phone&quot;: &quot;277 394 106&quot;,
            &quot;website&quot;: &quot;www.cm-penamacor.pt&quot;
        },
        {
            &quot;id&quot;: 61,
            &quot;name&quot;: &quot;Condeixa-a-Nova&quot;,
            &quot;address&quot;: &quot;C&acirc;mara Municipal&quot;,
            &quot;email&quot;: &quot;geral@cm-condeixa.pt&quot;,
            &quot;phone&quot;: &quot;239 949 120&quot;,
            &quot;website&quot;: &quot;www.cm-condeixa.pt&quot;
        },
        {
            &quot;id&quot;: 62,
            &quot;name&quot;: &quot;Mira&quot;,
            &quot;address&quot;: &quot;C&acirc;mara Municipal&quot;,
            &quot;email&quot;: &quot;geral@cm-mira.pt&quot;,
            &quot;phone&quot;: &quot;231 480 550&quot;,
            &quot;website&quot;: &quot;www.cm-mira.pt&quot;
        },
        {
            &quot;id&quot;: 63,
            &quot;name&quot;: &quot;Figueira da Foz&quot;,
            &quot;address&quot;: &quot;Av Saraiva de Carvalho&quot;,
            &quot;email&quot;: &quot;municipe@cm-figfoz.pt&quot;,
            &quot;phone&quot;: &quot;233 403 300&quot;,
            &quot;website&quot;: &quot;www.cm-figfoz.pt&quot;
        },
        {
            &quot;id&quot;: 64,
            &quot;name&quot;: &quot;Lous&atilde;&quot;,
            &quot;address&quot;: &quot;R Dr Jo&atilde;o Santos&quot;,
            &quot;email&quot;: &quot;geral@cm-lousa.pt&quot;,
            &quot;phone&quot;: &quot;239 990 370&quot;,
            &quot;website&quot;: &quot;www.cm-lousa.pt&quot;
        },
        {
            &quot;id&quot;: 65,
            &quot;name&quot;: &quot;Penela&quot;,
            &quot;address&quot;: &quot;Lg Marquesa Fornos Algodres&quot;,
            &quot;email&quot;: &quot;cmpenela@cm-penela.pt&quot;,
            &quot;phone&quot;: &quot;239 560 120&quot;,
            &quot;website&quot;: &quot;www.cm-penela.pt&quot;
        },
        {
            &quot;id&quot;: 66,
            &quot;name&quot;: &quot;T&aacute;bua&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-tabua.pt&quot;,
            &quot;phone&quot;: &quot;235 410 340&quot;,
            &quot;website&quot;: &quot;www.cm-tabua.pt&quot;
        },
        {
            &quot;id&quot;: 67,
            &quot;name&quot;: &quot;Vila Nova de Poiares&quot;,
            &quot;address&quot;: &quot;Largo da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-vilanovadepoiares.pt&quot;,
            &quot;phone&quot;: &quot;239 420 850&quot;,
            &quot;website&quot;: &quot;www.cm-vilanovadepoiares.pt&quot;
        },
        {
            &quot;id&quot;: 68,
            &quot;name&quot;: &quot;Borba&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-borba.pt&quot;,
            &quot;phone&quot;: &quot;268 891 630&quot;,
            &quot;website&quot;: &quot;www.cm-borba.pt&quot;
        },
        {
            &quot;id&quot;: 69,
            &quot;name&quot;: &quot;Viana do Alentejo&quot;,
            &quot;address&quot;: &quot;Rua Brito Camacho 13&quot;,
            &quot;email&quot;: &quot;camara@cm-vianadoalentejo.pt&quot;,
            &quot;phone&quot;: &quot;266 930 010&quot;,
            &quot;website&quot;: &quot;www.cm-vianadoalentejo.pt&quot;
        },
        {
            &quot;id&quot;: 70,
            &quot;name&quot;: &quot;Mour&atilde;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica, 20&quot;,
            &quot;email&quot;: &quot;gap@cm-mourao.pt&quot;,
            &quot;phone&quot;: &quot;266 560 010&quot;,
            &quot;website&quot;: &quot;www.cm-mourao.pt&quot;
        },
        {
            &quot;id&quot;: 71,
            &quot;name&quot;: &quot;Albufeira&quot;,
            &quot;address&quot;: &quot;Rua do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-albufeira.pt&quot;,
            &quot;phone&quot;: &quot;289 599 500&quot;,
            &quot;website&quot;: &quot;www.cm-albufeira.pt&quot;
        },
        {
            &quot;id&quot;: 72,
            &quot;name&quot;: &quot;Castro Marim&quot;,
            &quot;address&quot;: &quot;Rua Dr. Jos&eacute; Alves Moreira,10&quot;,
            &quot;email&quot;: &quot;expediente@cm-castromarim.pt&quot;,
            &quot;phone&quot;: &quot;281510740&quot;,
            &quot;website&quot;: &quot;www.cm-castromarim.pt&quot;
        },
        {
            &quot;id&quot;: 73,
            &quot;name&quot;: &quot;Tavira&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;camara@cm-tavira.pt&quot;,
            &quot;phone&quot;: &quot;281 320 500&quot;,
            &quot;website&quot;: &quot;www.cm-tavira.pt&quot;
        },
        {
            &quot;id&quot;: 74,
            &quot;name&quot;: &quot;Almeida&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Liberdade&quot;,
            &quot;email&quot;: &quot;camara@cm-almeida.pt&quot;,
            &quot;phone&quot;: &quot;271 570 020&quot;,
            &quot;website&quot;: &quot;www.cm-almeida.pt&quot;
        },
        {
            &quot;id&quot;: 75,
            &quot;name&quot;: &quot;Celorico da Beira&quot;,
            &quot;address&quot;: &quot;R Sacadura Cabral&quot;,
            &quot;email&quot;: &quot;geral@cm-celoricodabeira.pt&quot;,
            &quot;phone&quot;: &quot;271 747 400&quot;,
            &quot;website&quot;: &quot;www.cm-celoricodabeira.pt&quot;
        },
        {
            &quot;id&quot;: 76,
            &quot;name&quot;: &quot;Gouveia&quot;,
            &quot;address&quot;: &quot;Av. 25 de Abril&quot;,
            &quot;email&quot;: &quot;geral@cm-gouveia.pt&quot;,
            &quot;phone&quot;: &quot;238 490 210&quot;,
            &quot;website&quot;: &quot;www.cm-gouveia.pt&quot;
        },
        {
            &quot;id&quot;: 77,
            &quot;name&quot;: &quot;Guarda&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@mun-guarda.pt&quot;,
            &quot;phone&quot;: &quot;271 220 220&quot;,
            &quot;website&quot;: &quot;www.mun-guarda.pt&quot;
        },
        {
            &quot;id&quot;: 78,
            &quot;name&quot;: &quot;Meda&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;cmeda@cm-meda.pt&quot;,
            &quot;phone&quot;: &quot;279 880 040&quot;,
            &quot;website&quot;: &quot;www.cm-meda.pt&quot;
        },
        {
            &quot;id&quot;: 79,
            &quot;name&quot;: &quot;Seia&quot;,
            &quot;address&quot;: &quot;Largo Dr. Borges Pires&quot;,
            &quot;email&quot;: &quot;cm-seia@cm-seia.pt&quot;,
            &quot;phone&quot;: &quot;238 310 230&quot;,
            &quot;website&quot;: &quot;www.cm-seia.pt&quot;
        },
        {
            &quot;id&quot;: 80,
            &quot;name&quot;: &quot;Pinhel&quot;,
            &quot;address&quot;: &quot;Largo Ministro Duarte Pacheco, 8&quot;,
            &quot;email&quot;: &quot;cm-pinhel@cm-pinhel.pt&quot;,
            &quot;phone&quot;: &quot;271 410 000&quot;,
            &quot;website&quot;: &quot;www.cm-pinhel.pt&quot;
        },
        {
            &quot;id&quot;: 81,
            &quot;name&quot;: &quot;Trancoso&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-trancoso.pt&quot;,
            &quot;phone&quot;: &quot;271 829 120&quot;,
            &quot;website&quot;: &quot;www.cm-trancoso.pt&quot;
        },
        {
            &quot;id&quot;: 82,
            &quot;name&quot;: &quot;Vila Nova de Foz C&ocirc;a&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;correio@cm-fozcoa.pt&quot;,
            &quot;phone&quot;: &quot;279 760 400&quot;,
            &quot;website&quot;: &quot;www.cm-fozcoa.pt&quot;
        },
        {
            &quot;id&quot;: 83,
            &quot;name&quot;: &quot;Ansi&atilde;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-ansiao.pt&quot;,
            &quot;phone&quot;: &quot;236 670 200&quot;,
            &quot;website&quot;: &quot;www.cm-ansiao.pt&quot;
        },
        {
            &quot;id&quot;: 84,
            &quot;name&quot;: &quot;Batalha&quot;,
            &quot;address&quot;: &quot;Rua Infante D. Fernando n&ordm; 432  Apartado 16&quot;,
            &quot;email&quot;: &quot;geral@cm-batalha.pt&quot;,
            &quot;phone&quot;: &quot;244 769 110&quot;,
            &quot;website&quot;: &quot;www.cm-batalha.pt/&quot;
        },
        {
            &quot;id&quot;: 85,
            &quot;name&quot;: &quot;Alvaiazere&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-alvaiazere.pt&quot;,
            &quot;phone&quot;: &quot;236 650 600&quot;,
            &quot;website&quot;: &quot;www.cm-alvaiazere.pt&quot;
        },
        {
            &quot;id&quot;: 86,
            &quot;name&quot;: &quot;Caldas da Rainha&quot;,
            &quot;address&quot;: &quot;P&ccedil; 25 de Abril&quot;,
            &quot;email&quot;: &quot;geral@cm-caldas-rainha.pt&quot;,
            &quot;phone&quot;: &quot;262 240 000&quot;,
            &quot;website&quot;: &quot;www.cm-caldas-rainha.pt&quot;
        },
        {
            &quot;id&quot;: 87,
            &quot;name&quot;: &quot;Castanheira de P&ecirc;ra&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Visconde de Castanheira de Pera&quot;,
            &quot;email&quot;: &quot;camara@cm-castanheiradepera.pt&quot;,
            &quot;phone&quot;: &quot;236 430 280&quot;,
            &quot;website&quot;: &quot;www.cm-castanheiradepera.pt&quot;
        },
        {
            &quot;id&quot;: 88,
            &quot;name&quot;: &quot;P&eacute;drog&atilde;o Grande&quot;,
            &quot;address&quot;: &quot;Pedr&oacute;g&atilde;o Grande&quot;,
            &quot;email&quot;: &quot;geral@cm-pedrogaogrande.pt&quot;,
            &quot;phone&quot;: &quot;236 480 150&quot;,
            &quot;website&quot;: &quot;www.cm-pedrogaogrande.pt&quot;
        },
        {
            &quot;id&quot;: 89,
            &quot;name&quot;: &quot;Amadora&quot;,
            &quot;address&quot;: &quot;Av. Movimento das For&ccedil;as Armadas - Mina&quot;,
            &quot;email&quot;: &quot;geral@cm-amadora.pt&quot;,
            &quot;phone&quot;: &quot;214 369 000&quot;,
            &quot;website&quot;: &quot;www.cm-amadora.pt&quot;
        },
        {
            &quot;id&quot;: 90,
            &quot;name&quot;: &quot;Oeiras&quot;,
            &quot;address&quot;: &quot;Lg Marqu&ecirc;s Pombal&quot;,
            &quot;email&quot;: &quot;municipio.oeiras@cm-oeiras.pt&quot;,
            &quot;phone&quot;: &quot;214 408 300&quot;,
            &quot;website&quot;: &quot;www.cm-oeiras.pt&quot;
        },
        {
            &quot;id&quot;: 91,
            &quot;name&quot;: &quot;Loures&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Liberdade&quot;,
            &quot;email&quot;: &quot;geral@cm-loures.pt&quot;,
            &quot;phone&quot;: &quot;211 150 100&quot;,
            &quot;website&quot;: &quot;www.cm-loures.pt&quot;
        },
        {
            &quot;id&quot;: 92,
            &quot;name&quot;: &quot;Cadaval&quot;,
            &quot;address&quot;: &quot;Av.Dr. Francisco S&aacute; Carneiro - Edf. da C&acirc;mara Municipal&quot;,
            &quot;email&quot;: &quot;geral@cm-cadaval.pt&quot;,
            &quot;phone&quot;: &quot;262 690 100&quot;,
            &quot;website&quot;: &quot;www.cm-cadaval.pt&quot;
        },
        {
            &quot;id&quot;: 93,
            &quot;name&quot;: &quot;Torres Vedras&quot;,
            &quot;address&quot;: &quot;Av. 5 de Outubro&lt;br&gt;2560-270 TORRES VEDRAS&quot;,
            &quot;email&quot;: &quot;geral@cm-tvedras.pt&quot;,
            &quot;phone&quot;: &quot;261 310 400&quot;,
            &quot;website&quot;: &quot;www.cm-tvedras.pt&quot;
        },
        {
            &quot;id&quot;: 94,
            &quot;name&quot;: &quot;Arronches&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica Apartado 8&quot;,
            &quot;email&quot;: &quot;geral@cm-arronches.pt&quot;,
            &quot;phone&quot;: &quot;245 580 080&quot;,
            &quot;website&quot;: &quot;www.cm-arronches.pt&quot;
        },
        {
            &quot;id&quot;: 95,
            &quot;name&quot;: &quot;Marv&atilde;o&quot;,
            &quot;address&quot;: &quot;Lg Sta Maria&quot;,
            &quot;email&quot;: &quot;geral@cm-marvao.pt&quot;,
            &quot;phone&quot;: &quot;245 909 130&quot;,
            &quot;website&quot;: &quot;www.cm-marvao.pt&quot;
        },
        {
            &quot;id&quot;: 96,
            &quot;name&quot;: &quot;Gavi&atilde;o&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-gaviao.pt&quot;,
            &quot;phone&quot;: &quot;241 639 070&quot;,
            &quot;website&quot;: &quot;www.cm-gaviao.pt&quot;
        },
        {
            &quot;id&quot;: 97,
            &quot;name&quot;: &quot;Fronteira&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;municipio@cm-fronteira.pt&quot;,
            &quot;phone&quot;: &quot;245 600 070&quot;,
            &quot;website&quot;: &quot;www.cm-fronteira.pt&quot;
        },
        {
            &quot;id&quot;: 98,
            &quot;name&quot;: &quot;Portalegre&quot;,
            &quot;address&quot;: &quot;Rua Guilherme Gomes Fernandes, n.28&quot;,
            &quot;email&quot;: &quot;municipio@cm-portalegre.pt&quot;,
            &quot;phone&quot;: &quot;245 307 400&quot;,
            &quot;website&quot;: &quot;www.cm-portalegre.pt&quot;
        },
        {
            &quot;id&quot;: 99,
            &quot;name&quot;: &quot;Marco de Canaveses&quot;,
            &quot;address&quot;: &quot;Lg Sacadura Cabral&quot;,
            &quot;email&quot;: &quot;info@cm-marco-canaveses.pt&quot;,
            &quot;phone&quot;: &quot;255 538 800&quot;,
            &quot;website&quot;: &quot;www.cm-marco-canaveses.pt&quot;
        },
        {
            &quot;id&quot;: 100,
            &quot;name&quot;: &quot;Gondomar&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Manuel Guedes&quot;,
            &quot;email&quot;: &quot;geral@cm-gondomar.pt&quot;,
            &quot;phone&quot;: &quot;224 660 500&quot;,
            &quot;website&quot;: &quot;www.cm-gondomar.pt&quot;
        },
        {
            &quot;id&quot;: 101,
            &quot;name&quot;: &quot;Lousada&quot;,
            &quot;address&quot;: &quot;P&ccedil; Dr Francisco S&aacute; Carneiro   Apartado, 45&quot;,
            &quot;email&quot;: &quot;valsousa@valsousa.pt&quot;,
            &quot;phone&quot;: &quot;255 810 700&quot;,
            &quot;website&quot;: &quot;www.valsousa.pt&quot;
        },
        {
            &quot;id&quot;: 102,
            &quot;name&quot;: &quot;Pa&ccedil;os de Ferreira&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-pacosdeferreira.pt&quot;,
            &quot;phone&quot;: &quot;255 860 700&quot;,
            &quot;website&quot;: &quot;www.cm-pacosdeferreira.pt&quot;
        },
        {
            &quot;id&quot;: 103,
            &quot;name&quot;: &quot;Maia&quot;,
            &quot;address&quot;: &quot;P&ccedil;. Doutor Jos&eacute; Vieira de Carvalho&quot;,
            &quot;email&quot;: &quot;geral@cm-maia.pt&quot;,
            &quot;phone&quot;: &quot;229408600&quot;,
            &quot;website&quot;: &quot;www.cm-maia.pt&quot;
        },
        {
            &quot;id&quot;: 104,
            &quot;name&quot;: &quot;P&oacute;voa de Varzim&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Almada&quot;,
            &quot;email&quot;: &quot;geral@cm-pvarzim.pt&quot;,
            &quot;phone&quot;: &quot;252 090 000&quot;,
            &quot;website&quot;: &quot;www.cm-pvarzim.pt&quot;
        },
        {
            &quot;id&quot;: 105,
            &quot;name&quot;: &quot;Vila Nova de Gaia&quot;,
            &quot;address&quot;: &quot;R Alvares Cabral&quot;,
            &quot;email&quot;: &quot;geral@cm-gaia.pt&quot;,
            &quot;phone&quot;: &quot;223 742 400&quot;,
            &quot;website&quot;: &quot;www.cm-gaia.pt&quot;
        },
        {
            &quot;id&quot;: 106,
            &quot;name&quot;: &quot;Benavente&quot;,
            &quot;address&quot;: &quot;P&ccedil; do munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;cmb@cm-benavente.pt&quot;,
            &quot;phone&quot;: &quot;263 519 600&quot;,
            &quot;website&quot;: &quot;www.cm-benavente.pt&quot;
        },
        {
            &quot;id&quot;: 107,
            &quot;name&quot;: &quot;Cartaxo&quot;,
            &quot;address&quot;: &quot;P&ccedil; 15 de Dezembro&quot;,
            &quot;email&quot;: &quot;correio@cm-cartaxo.pt&quot;,
            &quot;phone&quot;: &quot;243 700 250&quot;,
            &quot;website&quot;: &quot;www.cm-cartaxo.pt&quot;
        },
        {
            &quot;id&quot;: 108,
            &quot;name&quot;: &quot;Salvaterra de Magos&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica n&ordm;1&quot;,
            &quot;email&quot;: &quot;geral@cm-salvaterrademagos.pt&quot;,
            &quot;phone&quot;: &quot;263 509 500&quot;,
            &quot;website&quot;: &quot;www.cm-salvaterrademagos.pt&quot;
        },
        {
            &quot;id&quot;: 109,
            &quot;name&quot;: &quot;Torres Novas&quot;,
            &quot;address&quot;: &quot;R Gen A C Vasconcelos Correia&quot;,
            &quot;email&quot;: &quot;geral@cm-torresnovas.pt&quot;,
            &quot;phone&quot;: &quot;249 839 430&quot;,
            &quot;website&quot;: &quot;www.cm-torresnovas.pt&quot;
        },
        {
            &quot;id&quot;: 110,
            &quot;name&quot;: &quot;Almada&quot;,
            &quot;address&quot;: &quot;P&ccedil; Luis de Cam&otilde;es&quot;,
            &quot;email&quot;: &quot;almadainforma@cma.m-almada.pt&quot;,
            &quot;phone&quot;: &quot;212 724 000&quot;,
            &quot;website&quot;: &quot;www.m-almada.pt&quot;
        },
        {
            &quot;id&quot;: 111,
            &quot;name&quot;: &quot;Sines&quot;,
            &quot;address&quot;: &quot;Largo Ramos Costa&quot;,
            &quot;email&quot;: &quot;geral@mun-sines.pt&quot;,
            &quot;phone&quot;: &quot;269 630 600, 269 630 607&quot;,
            &quot;website&quot;: &quot;www.sines.pt&quot;
        },
        {
            &quot;id&quot;: 112,
            &quot;name&quot;: &quot;Santiago do Cac&eacute;m&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-santiagocacem.pt&quot;,
            &quot;phone&quot;: &quot;269 829 400&quot;,
            &quot;website&quot;: &quot;www.cm-santiagocacem.pt&quot;
        },
        {
            &quot;id&quot;: 113,
            &quot;name&quot;: &quot;Barreiro&quot;,
            &quot;address&quot;: &quot;R Miguel Bombarda&quot;,
            &quot;email&quot;: &quot;geral@cm-barreiro.pt&quot;,
            &quot;phone&quot;: &quot;212 068 000&quot;,
            &quot;website&quot;: &quot;www.cm-barreiro.pt&quot;
        },
        {
            &quot;id&quot;: 114,
            &quot;name&quot;: &quot;Ponte de Lima&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-pontedelima.pt&quot;,
            &quot;phone&quot;: &quot;258 900 400&quot;,
            &quot;website&quot;: &quot;www.cm-pontedelima.pt&quot;
        },
        {
            &quot;id&quot;: 115,
            &quot;name&quot;: &quot;Paredes de Coura&quot;,
            &quot;address&quot;: &quot;LARGO VISCONDE DE MOSELOS&quot;,
            &quot;email&quot;: &quot;geral@paredesdecoura.pt&quot;,
            &quot;phone&quot;: &quot;251 780 100&quot;,
            &quot;website&quot;: &quot;www.cm-paredes-coura.pt&quot;
        },
        {
            &quot;id&quot;: 116,
            &quot;name&quot;: &quot;Viana do Castelo&quot;,
            &quot;address&quot;: &quot;Passeio das Mordomas da Romaria&quot;,
            &quot;email&quot;: &quot;cmviana@cm-viana-castelo.pt&quot;,
            &quot;phone&quot;: &quot;258 809 300&quot;,
            &quot;website&quot;: &quot;www.cm-viana-castelo.pt&quot;
        },
        {
            &quot;id&quot;: 117,
            &quot;name&quot;: &quot;Caminha&quot;,
            &quot;address&quot;: &quot;Largo Calouste Gulbenkian&quot;,
            &quot;email&quot;: &quot;geral@cm-caminha.pt&quot;,
            &quot;phone&quot;: &quot;258 710 300&quot;,
            &quot;website&quot;: &quot;www.cm-caminha.pt&quot;
        },
        {
            &quot;id&quot;: 118,
            &quot;name&quot;: &quot;Ponte da Barca&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Dr. Ant&oacute;nio Lacerda, 4980-620 Ponte da Barca&quot;,
            &quot;email&quot;: &quot;geral@cmpb.pt&quot;,
            &quot;phone&quot;: &quot;258480180&quot;,
            &quot;website&quot;: &quot;www.cmpb.pt&quot;
        },
        {
            &quot;id&quot;: 119,
            &quot;name&quot;: &quot;Valen&ccedil;a&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;cm-valenca@cm-valenca.pt&quot;,
            &quot;phone&quot;: &quot;251 809 500&quot;,
            &quot;website&quot;: &quot;www.cm-valenca.pt&quot;
        },
        {
            &quot;id&quot;: 120,
            &quot;name&quot;: &quot;Boticas&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;municipio@cm-boticas.pt&quot;,
            &quot;phone&quot;: &quot;276 410 200&quot;,
            &quot;website&quot;: &quot;www.cm-boticas.pt&quot;
        },
        {
            &quot;id&quot;: 121,
            &quot;name&quot;: &quot;Mur&ccedil;a&quot;,
            &quot;address&quot;: &quot;P&ccedil; 5 de Outubro&quot;,
            &quot;email&quot;: &quot;geral@cm-murca.pt&quot;,
            &quot;phone&quot;: &quot;259 510 120&quot;,
            &quot;website&quot;: &quot;www.cm-murca.pt&quot;
        },
        {
            &quot;id&quot;: 122,
            &quot;name&quot;: &quot;Castro Daire&quot;,
            &quot;address&quot;: &quot;R Dr Pio de Figueiredo, 42&quot;,
            &quot;email&quot;: &quot;geral@cm-castrodaire.pt&quot;,
            &quot;phone&quot;: &quot;232382214&quot;,
            &quot;website&quot;: &quot;www.cm-castrodaire.pt&quot;
        },
        {
            &quot;id&quot;: 123,
            &quot;name&quot;: &quot;Moimenta da Beira&quot;,
            &quot;address&quot;: &quot;Lg do Tabolado&quot;,
            &quot;email&quot;: &quot;cmmbeira@cm-moimenta.pt&quot;,
            &quot;phone&quot;: &quot;254 520 070 | 935 520 090&quot;,
            &quot;website&quot;: &quot;www.cm-moimenta.pt&quot;
        },
        {
            &quot;id&quot;: 124,
            &quot;name&quot;: &quot;Mort&aacute;gua&quot;,
            &quot;address&quot;: &quot;R Jo&atilde;o Lopes de Morais&quot;,
            &quot;email&quot;: &quot;mortagua@cm-mortagua.pt&quot;,
            &quot;phone&quot;: &quot;231 927 460&quot;,
            &quot;website&quot;: &quot;www.cm-mortagua.pt&quot;
        },
        {
            &quot;id&quot;: 125,
            &quot;name&quot;: &quot;Sernancelhe&quot;,
            &quot;address&quot;: &quot;Pa&ccedil;os do Concelho&quot;,
            &quot;email&quot;: &quot;geral@cm-sernancelhe.pt&quot;,
            &quot;phone&quot;: &quot;254 598 300&quot;,
            &quot;website&quot;: &quot;www.cm-sernancelhe.pt&quot;
        },
        {
            &quot;id&quot;: 126,
            &quot;name&quot;: &quot;Vouzela&quot;,
            &quot;address&quot;: &quot;Alameda D Duarte de Almeida&quot;,
            &quot;email&quot;: &quot;geral@cm-vouzela.pt&quot;,
            &quot;phone&quot;: &quot;232 740 740&quot;,
            &quot;website&quot;: &quot;www.cm-vouzela.pt&quot;
        },
        {
            &quot;id&quot;: 127,
            &quot;name&quot;: &quot;Vila Nova de Paiva&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a D. Afonso Henriques, 1&quot;,
            &quot;email&quot;: &quot;geral@cm-vilanovadepaiva.pt&quot;,
            &quot;phone&quot;: &quot;232 609 900&quot;,
            &quot;website&quot;: &quot;www.cm-vilanovadepaiva.pt&quot;
        },
        {
            &quot;id&quot;: 128,
            &quot;name&quot;: &quot;Mogadouro&quot;,
            &quot;address&quot;: &quot;Rua de S&atilde;o Francisco&quot;,
            &quot;email&quot;: &quot;camaramogadouro@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;279 340 100&quot;,
            &quot;website&quot;: &quot;www.cm-mogadouro.pt&quot;
        },
        {
            &quot;id&quot;: 129,
            &quot;name&quot;: &quot;&Aacute;gueda&quot;,
            &quot;address&quot;: &quot;P&ccedil; Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-agueda.pt&quot;,
            &quot;phone&quot;: &quot;234 610 070&quot;,
            &quot;website&quot;: &quot;www.cm-agueda.pt&quot;
        },
        {
            &quot;id&quot;: 130,
            &quot;name&quot;: &quot;Vale de Cambra&quot;,
            &quot;address&quot;: &quot;Av Camilo de Matos n&ordm;19&quot;,
            &quot;email&quot;: &quot;geral@cm-valedecambra.pt&quot;,
            &quot;phone&quot;: &quot;256 420 510&quot;,
            &quot;website&quot;: &quot;www.cm-valedecambra.pt&quot;
        },
        {
            &quot;id&quot;: 131,
            &quot;name&quot;: &quot;&Iacute;lhavo&quot;,
            &quot;address&quot;: &quot;Av 25 de Abril&quot;,
            &quot;email&quot;: &quot;geralcmi@cm-ilhavo.pt&quot;,
            &quot;phone&quot;: &quot;234 329 600&quot;,
            &quot;website&quot;: &quot;www.cm-ilhavo.pt&quot;
        },
        {
            &quot;id&quot;: 132,
            &quot;name&quot;: &quot;Mealhada&quot;,
            &quot;address&quot;: &quot;Largo do Municipio&quot;,
            &quot;email&quot;: &quot;gabpresidencia@cm-mealhada.pt&quot;,
            &quot;phone&quot;: &quot;231 200 980&quot;,
            &quot;website&quot;: &quot;www.cm-mealhada.pt&quot;
        },
        {
            &quot;id&quot;: 133,
            &quot;name&quot;: &quot;Estarreja&quot;,
            &quot;address&quot;: &quot;P&ccedil; Francisco Barbosa&quot;,
            &quot;email&quot;: &quot;geral@cm-estarreja.pt&quot;,
            &quot;phone&quot;: &quot;234 840 600&quot;,
            &quot;website&quot;: &quot;www.cm-estarreja.pt&quot;
        },
        {
            &quot;id&quot;: 134,
            &quot;name&quot;: &quot;Vimioso&quot;,
            &quot;address&quot;: &quot;P&ccedil; Eduardo Coelho&quot;,
            &quot;email&quot;: &quot;gi.cmv@cm-vimioso.pt&quot;,
            &quot;phone&quot;: &quot;273 518 120&quot;,
            &quot;website&quot;: &quot;www.cm-vimioso.pt&quot;
        },
        {
            &quot;id&quot;: 135,
            &quot;name&quot;: &quot;Anadia&quot;,
            &quot;address&quot;: &quot;Apartado 19  P&ccedil; Municipio&quot;,
            &quot;email&quot;: &quot;geral@cm-anadia.pt&quot;,
            &quot;phone&quot;: &quot;231 510 730&quot;,
            &quot;website&quot;: &quot;www.cm-anadia.pt&quot;
        },
        {
            &quot;id&quot;: 136,
            &quot;name&quot;: &quot;Espinho&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Dr Jos&eacute; Salvador           Apartado 700&quot;,
            &quot;email&quot;: &quot;cme@cm-espinho.pt&quot;,
            &quot;phone&quot;: &quot;227 335 800&quot;,
            &quot;website&quot;: &quot;www.cm-espinho.pt&quot;
        },
        {
            &quot;id&quot;: 137,
            &quot;name&quot;: &quot;Oliveira do Bairro&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio , Ed. Pa&ccedil;os do Concelho&quot;,
            &quot;email&quot;: &quot;cmolb@cm-olb.pt&quot;,
            &quot;phone&quot;: &quot;234 732 100&quot;,
            &quot;website&quot;: &quot;www.cm-olb.pt&quot;
        },
        {
            &quot;id&quot;: 138,
            &quot;name&quot;: &quot;Murtosa&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio, 1&quot;,
            &quot;email&quot;: &quot;geral@cm-murtosa.pt&quot;,
            &quot;phone&quot;: &quot;234 830 100&quot;,
            &quot;website&quot;: &quot;www.cm-murtosa.pt&quot;
        },
        {
            &quot;id&quot;: 139,
            &quot;name&quot;: &quot;Santa Maria da Feira&quot;,
            &quot;address&quot;: &quot;P&ccedil;. da Rep&uacute;blica              Apartado 135&quot;,
            &quot;email&quot;: &quot;santamariadafeira@cm-feira.pt&quot;,
            &quot;phone&quot;: &quot;256 370 800&quot;,
            &quot;website&quot;: &quot;www.cm-feira.pt&quot;
        },
        {
            &quot;id&quot;: 140,
            &quot;name&quot;: &quot;Vagos&quot;,
            &quot;address&quot;: &quot;Rua da Saudade&quot;,
            &quot;email&quot;: &quot;geral@cm-vagos.pt&quot;,
            &quot;phone&quot;: &quot;234 799 600&quot;,
            &quot;website&quot;: &quot;www.cm-vagos.pt&quot;
        },
        {
            &quot;id&quot;: 141,
            &quot;name&quot;: &quot;Oliveira de Azem&eacute;is&quot;,
            &quot;address&quot;: &quot;Lg da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-oaz.pt&quot;,
            &quot;phone&quot;: &quot;800 256 600&quot;,
            &quot;website&quot;: &quot;www.cm-oaz.pt&quot;
        },
        {
            &quot;id&quot;: 142,
            &quot;name&quot;: &quot;Aljustrel&quot;,
            &quot;address&quot;: &quot;Av 1 Maio\n7600-010 ALJUSTREL&quot;,
            &quot;email&quot;: &quot;geral@mun-aljustrel.pt&quot;,
            &quot;phone&quot;: &quot;284600070&quot;,
            &quot;website&quot;: &quot;www.mun-aljustrel.pt&quot;
        },
        {
            &quot;id&quot;: 143,
            &quot;name&quot;: &quot;Barrancos&quot;,
            &quot;address&quot;: &quot;P. Munic&iacute;pio, 2&quot;,
            &quot;email&quot;: &quot;geral@cm-barrancos.pt&quot;,
            &quot;phone&quot;: &quot;285 950 630&quot;,
            &quot;website&quot;: &quot;www.cm-barrancos.pt&quot;
        },
        {
            &quot;id&quot;: 144,
            &quot;name&quot;: &quot;Beja&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica, 4&quot;,
            &quot;email&quot;: &quot;geral@cm-beja.pt&quot;,
            &quot;phone&quot;: &quot;284 311 800&quot;,
            &quot;website&quot;: &quot;www.cm-beja.pt&quot;
        },
        {
            &quot;id&quot;: 145,
            &quot;name&quot;: &quot;M&eacute;rtola&quot;,
            &quot;address&quot;: &quot;Largo Luis de Cam&otilde;es&quot;,
            &quot;email&quot;: &quot;geral@cm-mertola.pt&quot;,
            &quot;phone&quot;: &quot;286 610 100&quot;,
            &quot;website&quot;: &quot;www.cm-mertola.pt&quot;
        },
        {
            &quot;id&quot;: 146,
            &quot;name&quot;: &quot;Ferreira do Alentejo&quot;,
            &quot;address&quot;: &quot;P&ccedil; Comendador Infante Passanha, 5&quot;,
            &quot;email&quot;: &quot;geral@cm-ferreira-alentejo.pt&quot;,
            &quot;phone&quot;: &quot;284 738 700&quot;,
            &quot;website&quot;: &quot;www.cm-ferreira-alentejo.pt&quot;
        },
        {
            &quot;id&quot;: 147,
            &quot;name&quot;: &quot;Odemira&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-odemira.pt&quot;,
            &quot;phone&quot;: &quot;283 320 900&quot;,
            &quot;website&quot;: &quot;www.cm-odemira.pt&quot;
        },
        {
            &quot;id&quot;: 148,
            &quot;name&quot;: &quot;Alvito&quot;,
            &quot;address&quot;: &quot;Lg do Rel&oacute;gio, 1&quot;,
            &quot;email&quot;: &quot;geral@cm-alvito.pt&quot;,
            &quot;phone&quot;: &quot;284 480 800&quot;,
            &quot;website&quot;: &quot;www.cm-alvito.pt&quot;
        },
        {
            &quot;id&quot;: 149,
            &quot;name&quot;: &quot;Cuba&quot;,
            &quot;address&quot;: &quot;Rua Serpa Pinto, 84&quot;,
            &quot;email&quot;: &quot;geral@cm-cuba.pt&quot;,
            &quot;phone&quot;: &quot;284 419 900&quot;,
            &quot;website&quot;: &quot;www.cm-cuba.pt&quot;
        },
        {
            &quot;id&quot;: 150,
            &quot;name&quot;: &quot;Moura&quot;,
            &quot;address&quot;: &quot;P&ccedil; Sacadura Cabral&quot;,
            &quot;email&quot;: &quot;cmmoura@cm-moura.pt&quot;,
            &quot;phone&quot;: &quot;285 250 400&quot;,
            &quot;website&quot;: &quot;www.cm-moura.pt&quot;
        },
        {
            &quot;id&quot;: 151,
            &quot;name&quot;: &quot;Vidigueira&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica Edif&iacute;cio dos Pa&ccedil;os do Concelho\n7960-225 VIDIGUEIRA&quot;,
            &quot;email&quot;: &quot;geral@cm-vidigueira.pt&quot;,
            &quot;phone&quot;: &quot;284 437 400&quot;,
            &quot;website&quot;: &quot;www.cm-vidigueira.pt&quot;
        },
        {
            &quot;id&quot;: 152,
            &quot;name&quot;: &quot;Ourique&quot;,
            &quot;address&quot;: &quot;Av 25 Abril, N&ordm;26&quot;,
            &quot;email&quot;: &quot;geral@cmourique.pt&quot;,
            &quot;phone&quot;: &quot;286 510 400&quot;,
            &quot;website&quot;: &quot;www.cm-ourique.pt&quot;
        },
        {
            &quot;id&quot;: 153,
            &quot;name&quot;: &quot;Fafe&quot;,
            &quot;address&quot;: &quot;Av 5 de Outubro&quot;,
            &quot;email&quot;: &quot;geral@cm-fafe.pt&quot;,
            &quot;phone&quot;: &quot;253 700 400&quot;,
            &quot;website&quot;: &quot;www.cm-fafe.pt&quot;
        },
        {
            &quot;id&quot;: 154,
            &quot;name&quot;: &quot;Barcelos&quot;,
            &quot;address&quot;: &quot;Largo do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-barcelos.pt&quot;,
            &quot;phone&quot;: &quot;253 809 600&quot;,
            &quot;website&quot;: &quot;www.cm-barcelos.pt&quot;
        },
        {
            &quot;id&quot;: 155,
            &quot;name&quot;: &quot;Braga&quot;,
            &quot;address&quot;: &quot;P&ccedil; Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;municipe@cm-braga.pt&quot;,
            &quot;phone&quot;: &quot;253 203 150&quot;,
            &quot;website&quot;: &quot;www.cm-braga.pt&quot;
        },
        {
            &quot;id&quot;: 156,
            &quot;name&quot;: &quot;Vieira do Minho&quot;,
            &quot;address&quot;: &quot;P&ccedil; Guilherme de Abreu&quot;,
            &quot;email&quot;: &quot;geral@cm-vminho.pt&quot;,
            &quot;phone&quot;: &quot;253 649 270&quot;,
            &quot;website&quot;: &quot;www.cm-vminho.pt&quot;
        },
        {
            &quot;id&quot;: 157,
            &quot;name&quot;: &quot;Alf&acirc;ndega da F&eacute;&quot;,
            &quot;address&quot;: &quot;Largo de D. Dinis&quot;,
            &quot;email&quot;: &quot;gabinetepresidencia.cmaf@gmail.com&quot;,
            &quot;phone&quot;: &quot;279 468 120&quot;,
            &quot;website&quot;: &quot;www.cm-alfandegadafe.pt&quot;
        },
        {
            &quot;id&quot;: 158,
            &quot;name&quot;: &quot;Fornos de Algodres&quot;,
            &quot;address&quot;: &quot;Estrada Nacional 16, Apartado 15&quot;,
            &quot;email&quot;: &quot;geral@cm-fornosdealgodres.pt&quot;,
            &quot;phone&quot;: &quot;271 700 060&quot;,
            &quot;website&quot;: &quot;www.cm-fornosdealgodres.pt&quot;
        },
        {
            &quot;id&quot;: 159,
            &quot;name&quot;: &quot;Macedo de Cavaleiros&quot;,
            &quot;address&quot;: &quot;Jardim 1 de Maio&quot;,
            &quot;email&quot;: &quot;cmacedocavaleiros@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;278 420 420&quot;,
            &quot;website&quot;: &quot;www.cm-mcavaleiros.pt&quot;
        },
        {
            &quot;id&quot;: 160,
            &quot;name&quot;: &quot;Proen&ccedil;a-a-Nova&quot;,
            &quot;address&quot;: &quot;Avenida do Col&eacute;gio&quot;,
            &quot;email&quot;: &quot;geral@cm-proencanova.pt&quot;,
            &quot;phone&quot;: &quot;274 670 000&quot;,
            &quot;website&quot;: &quot;www.cm-proencanova.pt&quot;
        },
        {
            &quot;id&quot;: 161,
            &quot;name&quot;: &quot;Sert&atilde;&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;cmsgeral@cm-serta.pt&quot;,
            &quot;phone&quot;: &quot;274 600 300&quot;,
            &quot;website&quot;: &quot;http://www.cm-serta.pt/&quot;
        },
        {
            &quot;id&quot;: 162,
            &quot;name&quot;: &quot;Vila Velha de R&oacute;d&atilde;o&quot;,
            &quot;address&quot;: &quot;Rua de Santana&quot;,
            &quot;email&quot;: &quot;geral@cm-vvrodao.pt&quot;,
            &quot;phone&quot;: &quot;272 566 187&quot;,
            &quot;website&quot;: &quot;www.cm-vvrodao.pt&quot;
        },
        {
            &quot;id&quot;: 163,
            &quot;name&quot;: &quot;Idanha-a-Nova&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-idanhanova.pt&quot;,
            &quot;phone&quot;: &quot;277 200 570&quot;,
            &quot;website&quot;: &quot;www.cm-idanhanova.pt&quot;
        },
        {
            &quot;id&quot;: 164,
            &quot;name&quot;: &quot;Arganil&quot;,
            &quot;address&quot;: &quot;P&ccedil; Dr Sim&otilde;es Dias&quot;,
            &quot;email&quot;: &quot;geral@cm-arganil.pt&quot;,
            &quot;phone&quot;: &quot;235 200 150&quot;,
            &quot;website&quot;: &quot;www.cm-arganil.pt&quot;
        },
        {
            &quot;id&quot;: 165,
            &quot;name&quot;: &quot;Coimbra&quot;,
            &quot;address&quot;: &quot;P&ccedil; 8 de Maio Apartado 6067&quot;,
            &quot;email&quot;: &quot;geral@cm-coimbra.pt&quot;,
            &quot;phone&quot;: &quot;239 857 500&quot;,
            &quot;website&quot;: &quot;www.cm-coimbra.pt&quot;
        },
        {
            &quot;id&quot;: 166,
            &quot;name&quot;: &quot;Miranda do Corvo&quot;,
            &quot;address&quot;: &quot;P&ccedil; Jos&eacute; Falc&atilde;o&quot;,
            &quot;email&quot;: &quot;camara@cm-mirandadocorvo.pt&quot;,
            &quot;phone&quot;: &quot;239 530 320&quot;,
            &quot;website&quot;: &quot;www.cm-mirandadocorvo.pt&quot;
        },
        {
            &quot;id&quot;: 167,
            &quot;name&quot;: &quot;Cantanhede&quot;,
            &quot;address&quot;: &quot;Apartado 154&quot;,
            &quot;email&quot;: &quot;geral@cm-cantanhede.pt&quot;,
            &quot;phone&quot;: &quot;231410100&quot;,
            &quot;website&quot;: &quot;www.cantanhedeonline.pt&quot;
        },
        {
            &quot;id&quot;: 168,
            &quot;name&quot;: &quot;G&oacute;is&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;correio@cm-gois.pt&quot;,
            &quot;phone&quot;: &quot;235 770 110&quot;,
            &quot;website&quot;: &quot;www.cm-gois.pt&quot;
        },
        {
            &quot;id&quot;: 169,
            &quot;name&quot;: &quot;Montemor-o-Velho&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-montemorvelho.pt&quot;,
            &quot;phone&quot;: &quot;239 687 300&quot;,
            &quot;website&quot;: &quot;www.cm-montemorvelho.pt&quot;
        },
        {
            &quot;id&quot;: 170,
            &quot;name&quot;: &quot;Soure&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-soure.pt&quot;,
            &quot;phone&quot;: &quot;239 506 550&quot;,
            &quot;website&quot;: &quot;www.cm-soure.pt&quot;
        },
        {
            &quot;id&quot;: 171,
            &quot;name&quot;: &quot;Pampilhosa da Serra&quot;,
            &quot;address&quot;: &quot;R Rangel de Lima&quot;,
            &quot;email&quot;: &quot;municipio@cm-pampilhosadaserra.pt&quot;,
            &quot;phone&quot;: &quot;235 590 320&quot;,
            &quot;website&quot;: &quot;www.cm-pampilhosadaserra.pt&quot;
        },
        {
            &quot;id&quot;: 172,
            &quot;name&quot;: &quot;Penacova&quot;,
            &quot;address&quot;: &quot;Largo Alberto Leit&atilde;o, 5&quot;,
            &quot;email&quot;: &quot;geral@cm-penacova.pt&quot;,
            &quot;phone&quot;: &quot;239 470 300&quot;,
            &quot;website&quot;: &quot;www.cm-penacova.pt&quot;
        },
        {
            &quot;id&quot;: 173,
            &quot;name&quot;: &quot;Oliveira do Hospital&quot;,
            &quot;address&quot;: &quot;Largo Conselheiro Cabral Metello&quot;,
            &quot;email&quot;: &quot;geral@cm-oliveiradohospital.pt&quot;,
            &quot;phone&quot;: &quot;238 605 250&quot;,
            &quot;website&quot;: &quot;www.cm-oliveiradohospital.pt&quot;
        },
        {
            &quot;id&quot;: 174,
            &quot;name&quot;: &quot;Arraiolos&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio ,27&quot;,
            &quot;email&quot;: &quot;geral@cm-arraiolos.pt&quot;,
            &quot;phone&quot;: &quot;266 490 240&quot;,
            &quot;website&quot;: &quot;www.cm-arraiolos.pt&quot;
        },
        {
            &quot;id&quot;: 175,
            &quot;name&quot;: &quot;Alandroal&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-alandoral.pt&quot;,
            &quot;phone&quot;: &quot;268 440 040&quot;,
            &quot;website&quot;: &quot;www.cm-alandroal.pt&quot;
        },
        {
            &quot;id&quot;: 176,
            &quot;name&quot;: &quot;Estremoz&quot;,
            &quot;address&quot;: &quot;Apartado 86\n7100-513 ESTREMOZ CODEX&quot;,
            &quot;email&quot;: &quot;geral@cm-estremoz.pt&quot;,
            &quot;phone&quot;: &quot;268 339 200&quot;,
            &quot;website&quot;: &quot;www.cm-estremoz.pt&quot;
        },
        {
            &quot;id&quot;: 177,
            &quot;name&quot;: &quot;Redondo&quot;,
            &quot;address&quot;: &quot;P&ccedil; Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-redondo.pt&quot;,
            &quot;phone&quot;: &quot;266 989 210&quot;,
            &quot;website&quot;: &quot;www.cm-redondo.pt&quot;
        },
        {
            &quot;id&quot;: 178,
            &quot;name&quot;: &quot;&Eacute;vora&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Sert&oacute;rio&quot;,
            &quot;email&quot;: &quot;cmevora@mail.evora.net&quot;,
            &quot;phone&quot;: &quot;266 777 000&quot;,
            &quot;website&quot;: &quot;www.cm-evora.pt&quot;
        },
        {
            &quot;id&quot;: 179,
            &quot;name&quot;: &quot;Montemor-o-Novo&quot;,
            &quot;address&quot;: &quot;Lg dos Pa&ccedil;os do Concelho&quot;,
            &quot;email&quot;: &quot;cmmontemor@cm-montemornovo.pt&quot;,
            &quot;phone&quot;: &quot;266 898 100&quot;,
            &quot;website&quot;: &quot;www.cm-montemornovo.pt&quot;
        },
        {
            &quot;id&quot;: 180,
            &quot;name&quot;: &quot;Reguengos de Monsaraz&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Liberdade Apartado 6&quot;,
            &quot;email&quot;: &quot;geral@cm-reguengos-monsaraz.pt&quot;,
            &quot;phone&quot;: &quot;266 508 040&quot;,
            &quot;website&quot;: &quot;www.cm-reguengos-monsaraz.pt&quot;
        },
        {
            &quot;id&quot;: 181,
            &quot;name&quot;: &quot;Vendas Novas&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-vendasnovas.pt&quot;,
            &quot;phone&quot;: &quot;265 807 700&quot;,
            &quot;website&quot;: &quot;www.cm-vendasnovas.pt&quot;
        },
        {
            &quot;id&quot;: 182,
            &quot;name&quot;: &quot;Mora&quot;,
            &quot;address&quot;: &quot;R do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-mora.pt&quot;,
            &quot;phone&quot;: &quot;266 439 070&quot;,
            &quot;website&quot;: &quot;www.cm-mora.pt&quot;
        },
        {
            &quot;id&quot;: 183,
            &quot;name&quot;: &quot;Portel&quot;,
            &quot;address&quot;: &quot;P&ccedil; D Nuno Alvares Pereira, 4&quot;,
            &quot;email&quot;: &quot;geral@mail.cm-portel.pt&quot;,
            &quot;phone&quot;: &quot;266 619 030&quot;,
            &quot;website&quot;: &quot;www.cm-portel.pt&quot;
        },
        {
            &quot;id&quot;: 184,
            &quot;name&quot;: &quot;Vila Vi&ccedil;osa&quot;,
            &quot;address&quot;: &quot;P&ccedil; Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-vilavicosa.pt&quot;,
            &quot;phone&quot;: &quot;268 889 310&quot;,
            &quot;website&quot;: &quot;www.cm-vilavicosa.pt&quot;
        },
        {
            &quot;id&quot;: 185,
            &quot;name&quot;: &quot;Alcoutim&quot;,
            &quot;address&quot;: &quot;Rua do Munic&iacute;pio, 12&quot;,
            &quot;email&quot;: &quot;geral@cm-alcoutim.pt&quot;,
            &quot;phone&quot;: &quot;281 540 500&quot;,
            &quot;website&quot;: &quot;www.cm-alcoutim.pt&quot;
        },
        {
            &quot;id&quot;: 186,
            &quot;name&quot;: &quot;Aljezur&quot;,
            &quot;address&quot;: &quot;R Capit&atilde;o Salgueiro Maia&quot;,
            &quot;email&quot;: &quot;geral@cm-aljezur.pt&quot;,
            &quot;phone&quot;: &quot;282 990 010&quot;,
            &quot;website&quot;: &quot;www.cm-aljezur.pt&quot;
        },
        {
            &quot;id&quot;: 187,
            &quot;name&quot;: &quot;Lagos&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;expediente.geral@cm-lagos.pt, amlagos@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;282 780 900 / 282 771 700&quot;,
            &quot;website&quot;: &quot;www.cm-lagos.pt&quot;
        },
        {
            &quot;id&quot;: 188,
            &quot;name&quot;: &quot;Loul&eacute;&quot;,
            &quot;address&quot;: &quot;P&ccedil; Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;cmloule@cm-loule.pt&quot;,
            &quot;phone&quot;: &quot;289 400 600&quot;,
            &quot;website&quot;: &quot;www.cm-loule.pt&quot;
        },
        {
            &quot;id&quot;: 189,
            &quot;name&quot;: &quot;Monchique&quot;,
            &quot;address&quot;: &quot;Tv Portela, 2&quot;,
            &quot;email&quot;: &quot;geral@cm-monchique.pt&quot;,
            &quot;phone&quot;: &quot;282 910 200&quot;,
            &quot;website&quot;: &quot;www.cm-monchique.pt&quot;
        },
        {
            &quot;id&quot;: 190,
            &quot;name&quot;: &quot;Lagoa&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-lagoa.pt&quot;,
            &quot;phone&quot;: &quot;282 380 400&quot;,
            &quot;website&quot;: &quot;www.cm-lagoa.pt&quot;
        },
        {
            &quot;id&quot;: 191,
            &quot;name&quot;: &quot;Faro&quot;,
            &quot;address&quot;: &quot;C&acirc;mara Municipal de Faro - Largo da S&eacute;\n8000-001 FARO&quot;,
            &quot;email&quot;: &quot;geral@cm-faro.pt&quot;,
            &quot;phone&quot;: &quot;289 870 870&quot;,
            &quot;website&quot;: &quot;www.cm-faro.pt&quot;
        },
        {
            &quot;id&quot;: 192,
            &quot;name&quot;: &quot;Portim&atilde;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; 1 Maio&quot;,
            &quot;email&quot;: &quot;geral@cm-portimao.pt&quot;,
            &quot;phone&quot;: &quot;282470700&quot;,
            &quot;website&quot;: &quot;www.cm-portimao.pt&quot;
        },
        {
            &quot;id&quot;: 193,
            &quot;name&quot;: &quot;S&atilde;o Br&aacute;s de Alportel&quot;,
            &quot;address&quot;: &quot;R Gago Coutinho, 1&quot;,
            &quot;email&quot;: &quot;camara@cm-sbras.pt, gidi@cm-sbras.pt&quot;,
            &quot;phone&quot;: &quot;289 840 000&quot;,
            &quot;website&quot;: &quot;www.cm-sbras.pt&quot;
        },
        {
            &quot;id&quot;: 194,
            &quot;name&quot;: &quot;Silves&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;expediente@cm-silves.pt&quot;,
            &quot;phone&quot;: &quot;282 440 800&quot;,
            &quot;website&quot;: &quot;www.cm-silves.pt&quot;
        },
        {
            &quot;id&quot;: 195,
            &quot;name&quot;: &quot;Vila do Bispo&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Tanegashima&quot;,
            &quot;email&quot;: &quot;geral@cm-viladobispo.pt&quot;,
            &quot;phone&quot;: &quot;282 630 600&quot;,
            &quot;website&quot;: &quot;www.cm-viladobispo.pt&quot;
        },
        {
            &quot;id&quot;: 196,
            &quot;name&quot;: &quot;Vila Real de Santo Ant&oacute;nio&quot;,
            &quot;address&quot;: &quot;P&ccedil; Marques Pombal&quot;,
            &quot;email&quot;: &quot;geral@cm-vrsa.pt&quot;,
            &quot;phone&quot;: &quot;281 510 000&quot;,
            &quot;website&quot;: &quot;www.cm-vrsa.pt&quot;
        },
        {
            &quot;id&quot;: 197,
            &quot;name&quot;: &quot;Olh&atilde;o&quot;,
            &quot;address&quot;: &quot;Lg Sebasti&atilde;o Martins Mestre&quot;,
            &quot;email&quot;: &quot;geral@cm-olhao.pt&quot;,
            &quot;phone&quot;: &quot;289 700 100&quot;,
            &quot;website&quot;: &quot;www.cm-olhao.pt&quot;
        },
        {
            &quot;id&quot;: 198,
            &quot;name&quot;: &quot;Aguiar da Beira&quot;,
            &quot;address&quot;: &quot;Av da Liberdade&quot;,
            &quot;email&quot;: &quot;geral@cm-aguiardabeira.pt&quot;,
            &quot;phone&quot;: &quot;232 689 100&quot;,
            &quot;website&quot;: &quot;www.cm-aguiardabeira.pt&quot;
        },
        {
            &quot;id&quot;: 199,
            &quot;name&quot;: &quot;Figueira de Castelo Rodrigo&quot;,
            &quot;address&quot;: &quot;Largo Dr. Vilhena n&ordm;1&quot;,
            &quot;email&quot;: &quot;cm-fcr@cm-fcr.pt&quot;,
            &quot;phone&quot;: &quot;271 319 000&quot;,
            &quot;website&quot;: &quot;www.cm-fcr.pt&quot;
        },
        {
            &quot;id&quot;: 200,
            &quot;name&quot;: &quot;Manteigas&quot;,
            &quot;address&quot;: &quot;Rua 1&ordm; de Maio&quot;,
            &quot;email&quot;: &quot;geral@cm-manteigas.pt&quot;,
            &quot;phone&quot;: &quot;275 980 000&quot;,
            &quot;website&quot;: &quot;www.cm-manteigas.pt&quot;
        },
        {
            &quot;id&quot;: 201,
            &quot;name&quot;: &quot;Sabugal&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-sabugal.pt&quot;,
            &quot;phone&quot;: &quot;271 751 040&quot;,
            &quot;website&quot;: &quot;www.cm-sabugal.pt&quot;
        },
        {
            &quot;id&quot;: 202,
            &quot;name&quot;: &quot;Bombarral&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-bombarral.pt&quot;,
            &quot;phone&quot;: &quot;262 609 020&quot;,
            &quot;website&quot;: &quot;www.cm-bombarral.pt&quot;
        },
        {
            &quot;id&quot;: 203,
            &quot;name&quot;: &quot;Leiria&quot;,
            &quot;address&quot;: &quot;Largo da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;cmleiria@cm-leiria.pt&quot;,
            &quot;phone&quot;: &quot;244 839 500&quot;,
            &quot;website&quot;: &quot;www.cm-leiria.pt&quot;
        },
        {
            &quot;id&quot;: 204,
            &quot;name&quot;: &quot;Figueir&oacute; Dos Vinhos&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;secretaria@cm-figueirodosvinhos.pt&quot;,
            &quot;phone&quot;: &quot;236 559 550&quot;,
            &quot;website&quot;: &quot;www.cm-figueirodosvinhos.pt&quot;
        },
        {
            &quot;id&quot;: 205,
            &quot;name&quot;: &quot;Alcoba&ccedil;a&quot;,
            &quot;address&quot;: &quot;P&ccedil; Jo&atilde;o de Deus Ramos&quot;,
            &quot;email&quot;: &quot;cmalcobaca@cm-alcobaca.pt&quot;,
            &quot;phone&quot;: &quot;262 580 800&quot;,
            &quot;website&quot;: &quot;www.cm-alcobaca.pt&quot;
        },
        {
            &quot;id&quot;: 206,
            &quot;name&quot;: &quot;Nisa&quot;,
            &quot;address&quot;: &quot;Apartado 8&quot;,
            &quot;email&quot;: &quot;geral@nisa.pt&quot;,
            &quot;phone&quot;: &quot;245 410 000&quot;,
            &quot;website&quot;: &quot;www.cm-nisa.pt&quot;
        },
        {
            &quot;id&quot;: 207,
            &quot;name&quot;: &quot;Nazar&eacute;&quot;,
            &quot;address&quot;: &quot;Av Vieira Guimar&atilde;es, 54&quot;,
            &quot;email&quot;: &quot;geral@cm-nazare.pt&quot;,
            &quot;phone&quot;: &quot;262 550 010&quot;,
            &quot;website&quot;: &quot;www.cm-nazare.pt&quot;
        },
        {
            &quot;id&quot;: 208,
            &quot;name&quot;: &quot;Peniche&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;cmpeniche@cm-peniche.pt&quot;,
            &quot;phone&quot;: &quot;262 780 100&quot;,
            &quot;website&quot;: &quot;www.cm-peniche.pt&quot;
        },
        {
            &quot;id&quot;: 209,
            &quot;name&quot;: &quot;Pombal&quot;,
            &quot;address&quot;: &quot;Largo do Cardal&quot;,
            &quot;email&quot;: &quot;geral@cm-pombal.pt&quot;,
            &quot;phone&quot;: &quot;236 210 500&quot;,
            &quot;website&quot;: &quot;www.cm-pombal.pt&quot;
        },
        {
            &quot;id&quot;: 210,
            &quot;name&quot;: &quot;Porto de M&oacute;s&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@municipio-portodemos.pt&quot;,
            &quot;phone&quot;: &quot;244 499 600&quot;,
            &quot;website&quot;: &quot;www.municipio-portodemos.pt&quot;
        },
        {
            &quot;id&quot;: 211,
            &quot;name&quot;: &quot;Marinha Grande&quot;,
            &quot;address&quot;: &quot;P&ccedil; Guilherme Stephens&quot;,
            &quot;email&quot;: &quot;geral@cm-mgrande.pt&quot;,
            &quot;phone&quot;: &quot;244 573 300&quot;,
            &quot;website&quot;: &quot;www.cm-mgrande.pt&quot;
        },
        {
            &quot;id&quot;: 212,
            &quot;name&quot;: &quot;&Oacute;bidos&quot;,
            &quot;address&quot;: &quot;Lg S Pedro&quot;,
            &quot;email&quot;: &quot;geral@cm-obidos.pt&quot;,
            &quot;phone&quot;: &quot;262 955 500&quot;,
            &quot;website&quot;: &quot;www.cm-obidos.pt&quot;
        },
        {
            &quot;id&quot;: 213,
            &quot;name&quot;: &quot;Arruda Dos Vinhos&quot;,
            &quot;address&quot;: &quot;Largo Miguel Bombarda&quot;,
            &quot;email&quot;: &quot;cm-arruda@cm-arruda.pt&quot;,
            &quot;phone&quot;: &quot;263 977 000&quot;,
            &quot;website&quot;: &quot;www.cm-arruda.pt&quot;
        },
        {
            &quot;id&quot;: 214,
            &quot;name&quot;: &quot;Alenquer&quot;,
            &quot;address&quot;: &quot;P&ccedil; Luis de Cam&otilde;es&quot;,
            &quot;email&quot;: &quot;geral@cm-alenquer.pt&quot;,
            &quot;phone&quot;: &quot;263 730 900&quot;,
            &quot;website&quot;: &quot;www.cm-alenquer.pt&quot;
        },
        {
            &quot;id&quot;: 215,
            &quot;name&quot;: &quot;Cascais&quot;,
            &quot;address&quot;: &quot;Largo 5 de Outubro&quot;,
            &quot;email&quot;: &quot;disi@cm-cascais.pt&quot;,
            &quot;phone&quot;: &quot;214 825 000&quot;,
            &quot;website&quot;: &quot;www.cm-cascais.pt&quot;
        },
        {
            &quot;id&quot;: 216,
            &quot;name&quot;: &quot;Azambuja&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio, 19&quot;,
            &quot;email&quot;: &quot;geral@cm-azambuja.pt&quot;,
            &quot;phone&quot;: &quot;263 400 400&quot;,
            &quot;website&quot;: &quot;www.cm-azambuja.pt&quot;
        },
        {
            &quot;id&quot;: 217,
            &quot;name&quot;: &quot;Lisboa&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;municipe@cm-lisboa.pt&quot;,
            &quot;phone&quot;: &quot;213 236 200&quot;,
            &quot;website&quot;: &quot;www.cm-lisboa.pt&quot;
        },
        {
            &quot;id&quot;: 218,
            &quot;name&quot;: &quot;Mafra&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-mafra.pt&quot;,
            &quot;phone&quot;: &quot;261 810 100&quot;,
            &quot;website&quot;: &quot;www.cm-mafra.pt&quot;
        },
        {
            &quot;id&quot;: 219,
            &quot;name&quot;: &quot;Odivelas&quot;,
            &quot;address&quot;: &quot;Rua Guilherme Gomes Fernandes Quinta da Mem&oacute;ria&quot;,
            &quot;email&quot;: &quot;geral@cm-odivelas.pt&quot;,
            &quot;phone&quot;: &quot;219 320 000&quot;,
            &quot;website&quot;: &quot;www.cm-odivelas.pt&quot;
        },
        {
            &quot;id&quot;: 220,
            &quot;name&quot;: &quot;Sintra&quot;,
            &quot;address&quot;: &quot;Lg Dr Verg&iacute;lio Horta, 4&quot;,
            &quot;email&quot;: &quot;municipe@cm-sintra.pt&quot;,
            &quot;phone&quot;: &quot;219 238 500&quot;,
            &quot;website&quot;: &quot;www.cm-sintra.pt&quot;
        },
        {
            &quot;id&quot;: 221,
            &quot;name&quot;: &quot;Lourinh&atilde;&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Jos&eacute; M&aacute;ximo da Costa&quot;,
            &quot;email&quot;: &quot;geral@cm-lourinha.pt&quot;,
            &quot;phone&quot;: &quot;261 410 100&quot;,
            &quot;website&quot;: &quot;www.cm-lourinha.pt&quot;
        },
        {
            &quot;id&quot;: 222,
            &quot;name&quot;: &quot;Sobral de Monte Agra&ccedil;o&quot;,
            &quot;address&quot;: &quot;P&ccedil; Dr Eug&eacute;nio Dias, 4&quot;,
            &quot;email&quot;: &quot;geral@cm-sobral.pt&quot;,
            &quot;phone&quot;: &quot;261 940 300&quot;,
            &quot;website&quot;: &quot;www.cm-sobral-monte-agraco.pt&quot;
        },
        {
            &quot;id&quot;: 223,
            &quot;name&quot;: &quot;Vila Franca de Xira&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Afonso de Albuquerque, n.&ordm; 2&quot;,
            &quot;email&quot;: &quot;presidencia@cm-vfxira.pt&quot;,
            &quot;phone&quot;: &quot;263 285 600&quot;,
            &quot;website&quot;: &quot;www.cm-vfxira.pt&quot;
        },
        {
            &quot;id&quot;: 224,
            &quot;name&quot;: &quot;Alter do Ch&atilde;o&quot;,
            &quot;address&quot;: &quot;Lg. Munic&iacute;pio, 2&quot;,
            &quot;email&quot;: &quot;geral.cmalterdochao@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;245 610 000&quot;,
            &quot;website&quot;: &quot;www.cm-alter-chao.pt&quot;
        },
        {
            &quot;id&quot;: 225,
            &quot;name&quot;: &quot;Campo Maior&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica - Apartado, 55&quot;,
            &quot;email&quot;: &quot;cmcampomaior@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;268 680 300&quot;,
            &quot;website&quot;: &quot;www.cm-campo-maior.pt&quot;
        },
        {
            &quot;id&quot;: 226,
            &quot;name&quot;: &quot;Crato&quot;,
            &quot;address&quot;: &quot;P&ccedil; Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-crato.pt&quot;,
            &quot;phone&quot;: &quot;245 990 110 / 245 990 111&quot;,
            &quot;website&quot;: &quot;www.cm-crato.pt&quot;
        },
        {
            &quot;id&quot;: 227,
            &quot;name&quot;: &quot;Castelo de Vide&quot;,
            &quot;address&quot;: &quot;Rua Bartolomeu &Aacute;lvares da Santa&quot;,
            &quot;email&quot;: &quot;cm.castvide@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;245 908 220&quot;,
            &quot;website&quot;: &quot;www.cm-castelo-vide.pt&quot;
        },
        {
            &quot;id&quot;: 228,
            &quot;name&quot;: &quot;Avis&quot;,
            &quot;address&quot;: &quot;Apartado 25\n7481-909 Avis AVIS&quot;,
            &quot;email&quot;: &quot;geral@cm-avis.pt&quot;,
            &quot;phone&quot;: &quot;242 410 060&quot;,
            &quot;website&quot;: &quot;www.cm-avis.pt&quot;
        },
        {
            &quot;id&quot;: 229,
            &quot;name&quot;: &quot;Elvas&quot;,
            &quot;address&quot;: &quot;Rua Isabel Maria Pic&atilde;o, s/n&quot;,
            &quot;email&quot;: &quot;geral@cm-elvas.pt&quot;,
            &quot;phone&quot;: &quot;268 639 740&quot;,
            &quot;website&quot;: &quot;www.cm-elvas.pt&quot;
        },
        {
            &quot;id&quot;: 230,
            &quot;name&quot;: &quot;Monforte&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica-Apartado 4, 7450-115 MONFORTE&quot;,
            &quot;email&quot;: &quot;cmmonforte@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;245578060&quot;,
            &quot;website&quot;: &quot;www.cm-monforte.pt&quot;
        },
        {
            &quot;id&quot;: 231,
            &quot;name&quot;: &quot;Sousel&quot;,
            &quot;address&quot;: &quot;P&ccedil; Rep&uacute;blica,1&quot;,
            &quot;email&quot;: &quot;geral@cm-sowel.pt&quot;,
            &quot;phone&quot;: &quot;268 550 100&quot;,
            &quot;website&quot;: &quot;www.cm-sowel.pt&quot;
        },
        {
            &quot;id&quot;: 232,
            &quot;name&quot;: &quot;Ponte de Sor&quot;,
            &quot;address&quot;: &quot;Campo da Restaura&ccedil;&atilde;o&quot;,
            &quot;email&quot;: &quot;geral@cm-pontedesor.pt&quot;,
            &quot;phone&quot;: &quot;242 291 580&quot;,
            &quot;website&quot;: &quot;www.cm-pontedesor.pt&quot;
        },
        {
            &quot;id&quot;: 233,
            &quot;name&quot;: &quot;Amarante&quot;,
            &quot;address&quot;: &quot;Alameda Teixeira Pascoaes&quot;,
            &quot;email&quot;: &quot;geral@cm-amarante.pt&quot;,
            &quot;phone&quot;: &quot;255 420 200&quot;,
            &quot;website&quot;: &quot;www.cm-amarante.pt&quot;
        },
        {
            &quot;id&quot;: 234,
            &quot;name&quot;: &quot;Bai&atilde;o&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Her&oacute;is do Ultramar&quot;,
            &quot;email&quot;: &quot;cmbaiao@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;255 540 500&quot;,
            &quot;website&quot;: &quot;www.cm-baiao.pt&quot;
        },
        {
            &quot;id&quot;: 235,
            &quot;name&quot;: &quot;Felgueiras&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-felgueiras.pt&quot;,
            &quot;phone&quot;: &quot;255318000&quot;,
            &quot;website&quot;: &quot;www.cm-felgueiras.pt&quot;
        },
        {
            &quot;id&quot;: 236,
            &quot;name&quot;: &quot;Matosinhos&quot;,
            &quot;address&quot;: &quot;Av D Afonso Henriques&quot;,
            &quot;email&quot;: &quot;mail@cm-matosinhos.pt&quot;,
            &quot;phone&quot;: &quot;229 390 900&quot;,
            &quot;website&quot;: &quot;www.cm-matosinhos.pt&quot;
        },
        {
            &quot;id&quot;: 237,
            &quot;name&quot;: &quot;Penafiel&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;penafiel@cm-penafiel.pt&quot;,
            &quot;phone&quot;: &quot;255 710 700&quot;,
            &quot;website&quot;: &quot;www.cm-penafiel.pt&quot;
        },
        {
            &quot;id&quot;: 238,
            &quot;name&quot;: &quot;Paredes&quot;,
            &quot;address&quot;: &quot;Parque Jos&eacute; Guilherme&quot;,
            &quot;email&quot;: &quot;cmparedes@cm-paredes.pt&quot;,
            &quot;phone&quot;: &quot;255 788 800&quot;,
            &quot;website&quot;: &quot;www.cm-paredes.pt&quot;
        },
        {
            &quot;id&quot;: 239,
            &quot;name&quot;: &quot;Porto&quot;,
            &quot;address&quot;: &quot;P&ccedil; Gen Humberto Delgado&quot;,
            &quot;email&quot;: &quot;geral@cm-porto.pt&quot;,
            &quot;phone&quot;: &quot;222 097 000&quot;,
            &quot;website&quot;: &quot;www.cm-porto.pt&quot;
        },
        {
            &quot;id&quot;: 240,
            &quot;name&quot;: &quot;Santo Tirso&quot;,
            &quot;address&quot;: &quot;P&ccedil; 25 de Abril&quot;,
            &quot;email&quot;: &quot;santotirso@cm-stirso.pt&quot;,
            &quot;phone&quot;: &quot;252 830 400&quot;,
            &quot;website&quot;: &quot;www.cm-stirso.pt&quot;
        },
        {
            &quot;id&quot;: 241,
            &quot;name&quot;: &quot;Trofa&quot;,
            &quot;address&quot;: &quot;Rua das Ind&uacute;strias, 393 Ap 65&quot;,
            &quot;email&quot;: &quot;geral@mun-trofa.pt&quot;,
            &quot;phone&quot;: &quot;252 409 290&quot;,
            &quot;website&quot;: &quot;www.mun-trofa.pt&quot;
        },
        {
            &quot;id&quot;: 242,
            &quot;name&quot;: &quot;Vila do Conde&quot;,
            &quot;address&quot;: &quot;P&ccedil; Vasco da Gama&quot;,
            &quot;email&quot;: &quot;geral@cm-viladoconde.pt&quot;,
            &quot;phone&quot;: &quot;252 248 400&quot;,
            &quot;website&quot;: &quot;www.cm-viladoconde.pt&quot;
        },
        {
            &quot;id&quot;: 243,
            &quot;name&quot;: &quot;Valongo&quot;,
            &quot;address&quot;: &quot;Av. 5 de Outubro, 160&quot;,
            &quot;email&quot;: &quot;gabmunicipe@cm-valongo.pt&quot;,
            &quot;phone&quot;: &quot;224 227 900&quot;,
            &quot;website&quot;: &quot;www.cm-valongo.pt&quot;
        },
        {
            &quot;id&quot;: 244,
            &quot;name&quot;: &quot;Alpiar&ccedil;a&quot;,
            &quot;address&quot;: &quot;Rua Jos&eacute; Relvas, n.&ordm; 374  Apartado 25&quot;,
            &quot;email&quot;: &quot;assembleiamunicipal@cm-alpiarca.pt&quot;,
            &quot;phone&quot;: &quot;243 559 100&quot;,
            &quot;website&quot;: &quot;www.cm-alpiarca.pt&quot;
        },
        {
            &quot;id&quot;: 245,
            &quot;name&quot;: &quot;Abrantes&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: &quot;municipe@cm-abrantes.pt&quot;,
            &quot;phone&quot;: &quot;241 330 100&quot;,
            &quot;website&quot;: &quot;www.cm-abrantes.pt&quot;
        },
        {
            &quot;id&quot;: 246,
            &quot;name&quot;: &quot;Almeirim&quot;,
            &quot;address&quot;: &quot;Rua 5 Outubro&quot;,
            &quot;email&quot;: &quot;c.m.almeirim@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;243 594 100&quot;,
            &quot;website&quot;: &quot;www.cm-almeirim.pt&quot;
        },
        {
            &quot;id&quot;: 247,
            &quot;name&quot;: &quot;Alcanena&quot;,
            &quot;address&quot;: &quot;P&ccedil; 8 de Maio&quot;,
            &quot;email&quot;: &quot;geral@cm-alcanena.pt&quot;,
            &quot;phone&quot;: &quot;249 889 010&quot;,
            &quot;website&quot;: &quot;www.cm-alcanena.pt&quot;
        },
        {
            &quot;id&quot;: 248,
            &quot;name&quot;: &quot;Coruche&quot;,
            &quot;address&quot;: &quot;P&ccedil; Liberdade&quot;,
            &quot;email&quot;: &quot;geral@cm-coruche.pt&quot;,
            &quot;phone&quot;: &quot;243 610 200&quot;,
            &quot;website&quot;: &quot;www.cm-coruche.pt&quot;
        },
        {
            &quot;id&quot;: 249,
            &quot;name&quot;: &quot;Const&acirc;ncia&quot;,
            &quot;address&quot;: &quot;Estrada Nacional 3 apartado 46&quot;,
            &quot;email&quot;: &quot;geral@cm-constancia.pt&quot;,
            &quot;phone&quot;: &quot;249 730 050&quot;,
            &quot;website&quot;: &quot;www.cm-constancia.pt&quot;
        },
        {
            &quot;id&quot;: 250,
            &quot;name&quot;: &quot;Ferreira do Z&ecirc;zere&quot;,
            &quot;address&quot;: &quot;P&ccedil; Dias Ferreira , 38&quot;,
            &quot;email&quot;: &quot;geral@cm-ferreiradozezere.pt&quot;,
            &quot;phone&quot;: &quot;249 360 150&quot;,
            &quot;website&quot;: &quot;www.cm-ferreiradozezere.pt&quot;
        },
        {
            &quot;id&quot;: 251,
            &quot;name&quot;: &quot;Ma&ccedil;&atilde;o&quot;,
            &quot;address&quot;: &quot;Rua Padre Ant&oacute;nio Pereira de Figueiredo, 6120-750 MA&Ccedil;AO&quot;,
            &quot;email&quot;: &quot;geral@cm-macao.pt&quot;,
            &quot;phone&quot;: &quot;241 577 200&quot;,
            &quot;website&quot;: &quot;www.cm-macao.pt&quot;
        },
        {
            &quot;id&quot;: 252,
            &quot;name&quot;: &quot;Our&eacute;m&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a D&ordf; Maria II, 1&quot;,
            &quot;email&quot;: &quot;geral@cm-ourem.pt&quot;,
            &quot;phone&quot;: &quot;249 540 900&quot;,
            &quot;website&quot;: &quot;www.cm-ourem.pt&quot;
        },
        {
            &quot;id&quot;: 253,
            &quot;name&quot;: &quot;Chamusca&quot;,
            &quot;address&quot;: &quot;R Direita de S&atilde;o Pedro&quot;,
            &quot;email&quot;: &quot;cm.chamusca@mail.telepac.pt&quot;,
            &quot;phone&quot;: &quot;249 769 100&quot;,
            &quot;website&quot;: &quot;www.cm-chamusca.pt&quot;
        },
        {
            &quot;id&quot;: 254,
            &quot;name&quot;: &quot;Entroncamento&quot;,
            &quot;address&quot;: &quot;Lg Jos&eacute; Duarte Coelho Apartado, 52&quot;,
            &quot;email&quot;: &quot;geral@cm-entroncamento.pt&quot;,
            &quot;phone&quot;: &quot;249720400&quot;,
            &quot;website&quot;: &quot;www.cm-entroncamento.pt&quot;
        },
        {
            &quot;id&quot;: 255,
            &quot;name&quot;: &quot;Goleg&atilde;&quot;,
            &quot;address&quot;: &quot;Lg D Manuel I&quot;,
            &quot;email&quot;: &quot;geral@cm-golega.pt&quot;,
            &quot;phone&quot;: &quot;249 979 050&quot;,
            &quot;website&quot;: &quot;www.cm-golega.pt&quot;
        },
        {
            &quot;id&quot;: 256,
            &quot;name&quot;: &quot;Sardoal&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-sardoal.pt, informatica@cm-sardoal.pt&quot;,
            &quot;phone&quot;: &quot;241 850 000&quot;,
            &quot;website&quot;: &quot;www.cm-sardoal.pt&quot;
        },
        {
            &quot;id&quot;: 257,
            &quot;name&quot;: &quot;Tomar&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;presidencia@cm-tomar.pt&quot;,
            &quot;phone&quot;: &quot;249 329 800&quot;,
            &quot;website&quot;: &quot;www.cm-tomar.pt&quot;
        },
        {
            &quot;id&quot;: 258,
            &quot;name&quot;: &quot;Rio Maior&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-riomaior.pt&quot;,
            &quot;phone&quot;: &quot;243 999 300&quot;,
            &quot;website&quot;: &quot;www.cm-riomaior.pt&quot;
        },
        {
            &quot;id&quot;: 259,
            &quot;name&quot;: &quot;Santar&eacute;m&quot;,
            &quot;address&quot;: &quot;P&ccedil; Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-santarem.pt&quot;,
            &quot;phone&quot;: &quot;243 304 200&quot;,
            &quot;website&quot;: &quot;www.cm-santarem.pt&quot;
        },
        {
            &quot;id&quot;: 260,
            &quot;name&quot;: &quot;Vila Nova da Barquinha&quot;,
            &quot;address&quot;: &quot;P&ccedil; da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;geral@cm-vnbarquinha.pt&quot;,
            &quot;phone&quot;: &quot;249 720 350&quot;,
            &quot;website&quot;: &quot;www.cm-vnbarquinha.pt&quot;
        },
        {
            &quot;id&quot;: 261,
            &quot;name&quot;: &quot;Alcochete&quot;,
            &quot;address&quot;: &quot;Lg S Jo&atilde;o&quot;,
            &quot;email&quot;: &quot;geral@cm-alcochete.pt&quot;,
            &quot;phone&quot;: &quot;212 348 600&quot;,
            &quot;website&quot;: &quot;www.cm-alcochete.pt&quot;
        },
        {
            &quot;id&quot;: 262,
            &quot;name&quot;: &quot;Alc&aacute;cer do Sal&quot;,
            &quot;address&quot;: &quot;P&ccedil; Pedro Nunes&quot;,
            &quot;email&quot;: &quot;geral@m-alcacerdosal.pt&quot;,
            &quot;phone&quot;: &quot;265 610 040&quot;,
            &quot;website&quot;: &quot;www.cm-alcacerdosal.pt&quot;
        },
        {
            &quot;id&quot;: 263,
            &quot;name&quot;: &quot;Montijo&quot;,
            &quot;address&quot;: &quot;R Manuel Neves Nunes Almeida&quot;,
            &quot;email&quot;: &quot;geral@mun-montijo.pt&quot;,
            &quot;phone&quot;: &quot;212 327 600&quot;,
            &quot;website&quot;: &quot;www.mun-montijo.pt&quot;
        },
        {
            &quot;id&quot;: 264,
            &quot;name&quot;: &quot;Gr&acirc;ndola&quot;,
            &quot;address&quot;: &quot;R Dr Jose Pereira Barradas, 11&quot;,
            &quot;email&quot;: &quot;geral@cm-grandola.pt&quot;,
            &quot;phone&quot;: &quot;269 450 000&quot;,
            &quot;website&quot;: &quot;www.cm-grandola.pt&quot;
        },
        {
            &quot;id&quot;: 265,
            &quot;name&quot;: &quot;Moita&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;cmmoita@cm-moita.pt&quot;,
            &quot;phone&quot;: &quot;212 806 700&quot;,
            &quot;website&quot;: &quot;www.cm-moita.pt&quot;
        },
        {
            &quot;id&quot;: 266,
            &quot;name&quot;: &quot;Palmela&quot;,
            &quot;address&quot;: &quot;Lg Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-palmela.pt&quot;,
            &quot;phone&quot;: &quot;212 336 600&quot;,
            &quot;website&quot;: &quot;www.cm-palmela.pt&quot;
        },
        {
            &quot;id&quot;: 267,
            &quot;name&quot;: &quot;Sesimbra&quot;,
            &quot;address&quot;: &quot;R da Rep&uacute;blica&quot;,
            &quot;email&quot;: &quot;informacao@cm-sesimbra.pt&quot;,
            &quot;phone&quot;: &quot;212 288 500&quot;,
            &quot;website&quot;: &quot;www.cm-sesimbra.pt&quot;
        },
        {
            &quot;id&quot;: 268,
            &quot;name&quot;: &quot;Seixal&quot;,
            &quot;address&quot;: &quot;Alameda dos Bombeiros Volunt&aacute;rios, n.&ordm; 45&quot;,
            &quot;email&quot;: &quot;geral@cm-seixal.pt&quot;,
            &quot;phone&quot;: &quot;212 276 700&quot;,
            &quot;website&quot;: &quot;www.cm-seixal.pt&quot;
        },
        {
            &quot;id&quot;: 269,
            &quot;name&quot;: &quot;Set&uacute;bal&quot;,
            &quot;address&quot;: &quot;P&ccedil; Bocage  Apartado, 80&quot;,
            &quot;email&quot;: &quot;cmsetubal@mun-setubal.pt&quot;,
            &quot;phone&quot;: &quot;265 541 500&quot;,
            &quot;website&quot;: &quot;www.mun-setubal.pt&quot;
        },
        {
            &quot;id&quot;: 270,
            &quot;name&quot;: &quot;Melga&ccedil;o&quot;,
            &quot;address&quot;: &quot;Lg Hermenegildo Solheiro&quot;,
            &quot;email&quot;: &quot;geral@cm-melgaco.pt&quot;,
            &quot;phone&quot;: &quot;251 410 100&quot;,
            &quot;website&quot;: &quot;www.cm-melgaco.pt&quot;
        },
        {
            &quot;id&quot;: 271,
            &quot;name&quot;: &quot;Mon&ccedil;&atilde;o&quot;,
            &quot;address&quot;: &quot;Lg de Cam&otilde;es&quot;,
            &quot;email&quot;: &quot;geral@cm-moncao.pt&quot;,
            &quot;phone&quot;: &quot;251649000&quot;,
            &quot;website&quot;: &quot;www.cm-moncao.pt&quot;
        },
        {
            &quot;id&quot;: 272,
            &quot;name&quot;: &quot;Arcos de Valdevez&quot;,
            &quot;address&quot;: &quot;P&ccedil; Municipal&quot;,
            &quot;email&quot;: &quot;geral@cmav.pt&quot;,
            &quot;phone&quot;: &quot;258 520 500&quot;,
            &quot;website&quot;: &quot;www.cmav.pt&quot;
        },
        {
            &quot;id&quot;: 273,
            &quot;name&quot;: &quot;Vila Nova de Cerveira&quot;,
            &quot;address&quot;: &quot;Lg do Munic&iacute;pio&quot;,
            &quot;email&quot;: &quot;geral@cm-vncerveira.pt&quot;,
            &quot;phone&quot;: &quot;251 708 020&quot;,
            &quot;website&quot;: &quot;www.cm-vncerveira.pt&quot;
        },
        {
            &quot;id&quot;: 274,
            &quot;name&quot;: &quot;Mes&atilde;o Frio&quot;,
            &quot;address&quot;: &quot;Av Conselheiro Alpoim, 432&quot;,
            &quot;email&quot;: &quot;geral@cm-mesaofrio.pt&quot;,
            &quot;phone&quot;: &quot;254 890 100&quot;,
            &quot;website&quot;: &quot;www.cm-mesaofrio.pt/&quot;
        },
        {
            &quot;id&quot;: 275,
            &quot;name&quot;: &quot;Peso da Regua&quot;,
            &quot;address&quot;: &quot;R Serpa Pinto, 327&quot;,
            &quot;email&quot;: &quot;cmregua@cmpr.pt&quot;,
            &quot;phone&quot;: &quot;254 320 230&quot;,
            &quot;website&quot;: &quot;www.cm-pesoregua.pt&quot;
        },
        {
            &quot;id&quot;: 276,
            &quot;name&quot;: &quot;Chaves&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a de Cam&otilde;es&quot;,
            &quot;email&quot;: &quot;municipio@cm-chaves.pt&quot;,
            &quot;phone&quot;: &quot;276340500&quot;,
            &quot;website&quot;: &quot;www.cm-chaves.pt&quot;
        },
        {
            &quot;id&quot;: 277,
            &quot;name&quot;: &quot;Mondim de Basto&quot;,
            &quot;address&quot;: &quot;Lg Conde de Vila Real&quot;,
            &quot;email&quot;: &quot;geral@cm-mondimdebasto.pt&quot;,
            &quot;phone&quot;: &quot;255 389 300&quot;,
            &quot;website&quot;: &quot;municipio.mondimdebasto.pt&quot;
        },
        {
            &quot;id&quot;: 278,
            &quot;name&quot;: &quot;Montalegre&quot;,
            &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio - Apartado 32&quot;,
            &quot;email&quot;: &quot;municipio@cm-montalegre.pt&quot;,
            &quot;phone&quot;: &quot;276 510 200&quot;,
            &quot;website&quot;: &quot;www.cm-montalegre.pt&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cities" data-method="GET"
      data-path="api/cities"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cities"
                    onclick="tryItOut('GETapi-cities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cities"
                    onclick="cancelTryOut('GETapi-cities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-cities">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-cities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/cities" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"freguesias_pt_url\": \"http:\\/\\/bailey.com\\/\",
    \"freguesias_pt_id\": \"m\",
    \"address\": \"i\",
    \"email\": \"okon.justina@example.com\",
    \"phone\": \"n\",
    \"website\": \"i\",
    \"district_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/cities"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "freguesias_pt_url": "http:\/\/bailey.com\/",
    "freguesias_pt_id": "m",
    "address": "i",
    "email": "okon.justina@example.com",
    "phone": "n",
    "website": "i",
    "district_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cities">
</span>
<span id="execution-results-POSTapi-cities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cities" data-method="POST"
      data-path="api/cities"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cities"
                    onclick="tryItOut('POSTapi-cities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cities"
                    onclick="cancelTryOut('POSTapi-cities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-cities"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freguesias_pt_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="freguesias_pt_url"                data-endpoint="POSTapi-cities"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freguesias_pt_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="freguesias_pt_id"                data-endpoint="POSTapi-cities"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-cities"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-cities"
               value="okon.justina@example.com"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>okon.justina@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-cities"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTapi-cities"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>geo_polygon</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="geo_polygon"                data-endpoint="POSTapi-cities"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>polygon_centroid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="polygon_centroid"                data-endpoint="POSTapi-cities"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="district_id"                data-endpoint="POSTapi-cities"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the districts table. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-cities--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-cities--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/cities/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/cities/1"
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

<span id="example-responses-GETapi-cities--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Ribeira de Pena&quot;,
        &quot;address&quot;: &quot;P&ccedil; do Munic&iacute;pio&quot;,
        &quot;email&quot;: &quot;geral@cm-pena.pt&quot;,
        &quot;phone&quot;: &quot;259 490 500&quot;,
        &quot;website&quot;: &quot;www.cm-rpena.pt&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cities--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cities--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cities--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cities--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cities--id-" data-method="GET"
      data-path="api/cities/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cities--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cities--id-"
                    onclick="tryItOut('GETapi-cities--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cities--id-"
                    onclick="cancelTryOut('GETapi-cities--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cities--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cities/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-cities--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the city. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-cities--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-cities--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/cities/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/cities/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-cities--id-">
</span>
<span id="execution-results-PUTapi-cities--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-cities--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-cities--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-cities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-cities--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-cities--id-" data-method="PUT"
      data-path="api/cities/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-cities--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-cities--id-"
                    onclick="tryItOut('PUTapi-cities--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-cities--id-"
                    onclick="cancelTryOut('PUTapi-cities--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-cities--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/cities/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/cities/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-cities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-cities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-cities--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the city. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-cities--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-cities--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/cities/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/cities/1"
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

<span id="example-responses-DELETEapi-cities--id-">
</span>
<span id="execution-results-DELETEapi-cities--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-cities--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-cities--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-cities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-cities--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-cities--id-" data-method="DELETE"
      data-path="api/cities/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-cities--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-cities--id-"
                    onclick="tryItOut('DELETEapi-cities--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-cities--id-"
                    onclick="cancelTryOut('DELETEapi-cities--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-cities--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/cities/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-cities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-cities--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-cities--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the city. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-districts">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-districts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/districts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/districts"
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

<span id="example-responses-GETapi-districts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;VISEU&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;AVEIRO&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;BEJA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;BRAGA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;BRAGAN&Ccedil;A&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;CASTELO BRANCO&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;COIMBRA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;&Eacute;VORA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;FARO&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;GUARDA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;LISBOA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;PORTALEGRE&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;PORTO&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;SANTAREM&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;SET&Uacute;BAL&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;VIANA DO CASTELO&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;LEIRIA&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;VILA REAL&quot;,
            &quot;address&quot;: null,
            &quot;email&quot;: null,
            &quot;phone&quot;: null,
            &quot;website&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-districts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-districts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-districts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-districts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-districts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-districts" data-method="GET"
      data-path="api/districts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-districts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-districts"
                    onclick="tryItOut('GETapi-districts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-districts"
                    onclick="cancelTryOut('GETapi-districts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-districts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/districts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-districts">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-districts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/districts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"freguesias_pt_url\": \"http:\\/\\/bailey.com\\/\",
    \"freguesias_pt_id\": \"m\",
    \"address\": \"i\",
    \"email\": \"okon.justina@example.com\",
    \"phone\": \"n\",
    \"website\": \"i\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/districts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "freguesias_pt_url": "http:\/\/bailey.com\/",
    "freguesias_pt_id": "m",
    "address": "i",
    "email": "okon.justina@example.com",
    "phone": "n",
    "website": "i"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-districts">
</span>
<span id="execution-results-POSTapi-districts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-districts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-districts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-districts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-districts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-districts" data-method="POST"
      data-path="api/districts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-districts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-districts"
                    onclick="tryItOut('POSTapi-districts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-districts"
                    onclick="cancelTryOut('POSTapi-districts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-districts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/districts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-districts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-districts"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freguesias_pt_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="freguesias_pt_url"                data-endpoint="POSTapi-districts"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freguesias_pt_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="freguesias_pt_id"                data-endpoint="POSTapi-districts"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-districts"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-districts"
               value="okon.justina@example.com"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>okon.justina@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-districts"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTapi-districts"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>geo_polygon</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="geo_polygon"                data-endpoint="POSTapi-districts"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>polygon_centroid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="polygon_centroid"                data-endpoint="POSTapi-districts"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETapi-districts--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-districts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/districts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/districts/1"
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

<span id="example-responses-GETapi-districts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;VISEU&quot;,
        &quot;address&quot;: null,
        &quot;email&quot;: null,
        &quot;phone&quot;: null,
        &quot;website&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-districts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-districts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-districts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-districts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-districts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-districts--id-" data-method="GET"
      data-path="api/districts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-districts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-districts--id-"
                    onclick="tryItOut('GETapi-districts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-districts--id-"
                    onclick="cancelTryOut('GETapi-districts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-districts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/districts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-districts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the district. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-districts--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-districts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/districts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/districts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-districts--id-">
</span>
<span id="execution-results-PUTapi-districts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-districts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-districts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-districts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-districts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-districts--id-" data-method="PUT"
      data-path="api/districts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-districts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-districts--id-"
                    onclick="tryItOut('PUTapi-districts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-districts--id-"
                    onclick="cancelTryOut('PUTapi-districts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-districts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/districts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/districts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-districts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the district. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-districts--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-districts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/districts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/districts/1"
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

<span id="example-responses-DELETEapi-districts--id-">
</span>
<span id="execution-results-DELETEapi-districts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-districts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-districts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-districts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-districts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-districts--id-" data-method="DELETE"
      data-path="api/districts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-districts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-districts--id-"
                    onclick="tryItOut('DELETEapi-districts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-districts--id-"
                    onclick="cancelTryOut('DELETEapi-districts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-districts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/districts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-districts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-districts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the district. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-parishes">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-parishes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/parishes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/parishes"
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

<span id="example-responses-GETapi-parishes">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Vila Ch&atilde;&quot;,
            &quot;address&quot;: &quot;Rua da Lavandeira, 1337&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 645 358&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Vila Verde&quot;,
            &quot;address&quot;: &quot;Balsa-Vila Verde&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 929 797&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Vilar&quot;,
            &quot;address&quot;: &quot;Largo do Adro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 919 623&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Carl&atilde;o&quot;,
            &quot;address&quot;: &quot;Rua Fundo Povo&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 657 360&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Casal de Loivos&quot;,
            &quot;address&quot;: &quot;Sede da Junta de Freguesia&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731609&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;P&oacute;pulo&quot;,
            &quot;address&quot;: &quot;Rua Alegria&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 511 820&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Vale de Mendiz&quot;,
            &quot;address&quot;: &quot;Largo Restaura&ccedil;&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731 581&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Vilarinho de Cotas&quot;,
            &quot;address&quot;: &quot;Vilarinho de Cotas&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731 685&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Vilar e Viveiro&quot;,
            &quot;address&quot;: &quot;S&Atilde;O SALVADOR DE VIVEIRO&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276439210&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Pinho&quot;,
            &quot;address&quot;: &quot;Rua Principal de Pinho n&ordm; 143&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276 415 424&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Codessoso&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Fiolhoso&quot;,
            &quot;address&quot;: &quot;Rua Vidosa&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 512 153&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Jou&quot;,
            &quot;address&quot;: &quot;Lugar Cimo de Vila&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 539 155&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Alturas do Barroso&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Mur&ccedil;a&quot;,
            &quot;address&quot;: &quot;N&atilde;o especificado&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;+351 253 970 468&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Ard&atilde;os&quot;,
            &quot;address&quot;: &quot;Ardaos&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276 986 355&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Carva e Vilares&quot;,
            &quot;address&quot;: &quot;Largo da Igreja&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 456 268&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Noura e Palheiros&quot;,
            &quot;address&quot;: &quot;Rua das Escolas&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 511 214&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Boticas&quot;,
            &quot;address&quot;: &quot;R. Dr. Figueiredo Guerra, 4&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276 418 124&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;Valongo de Milhais&quot;,
            &quot;address&quot;: &quot;Largo da Fonte&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 511 207&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Cerdedo&quot;,
            &quot;address&quot;: &quot;Cerdedo&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276 442 023&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Covas do Douro&quot;,
            &quot;address&quot;: &quot;Rua Camilo C Branco&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731 625&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 23,
            &quot;name&quot;: &quot;Gouvinhas&quot;,
            &quot;address&quot;: &quot;Rua do Adro n&ordm; 13&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 339 000&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;Curros&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;Parada de Pinh&atilde;o&quot;,
            &quot;address&quot;: &quot;Pda. de Pinh&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259929274&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 26,
            &quot;name&quot;: &quot;Fi&atilde;es do T&acirc;mega&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 27,
            &quot;name&quot;: &quot;Sabrosa&quot;,
            &quot;address&quot;: &quot;Mercado Municipal&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 939 699&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 28,
            &quot;name&quot;: &quot;Granja&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 29,
            &quot;name&quot;: &quot;S&atilde;o Louren&ccedil;o de Ribapinh&atilde;o&quot;,
            &quot;address&quot;: &quot;S&atilde;o Louren&ccedil;o de Ribapinh&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 919 736&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;S&atilde;o Salvador de Viveiro&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;Souto Maior&quot;,
            &quot;address&quot;: &quot;Rua da Fonte de Cima&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 930 116&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 32,
            &quot;name&quot;: &quot;Vilar&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Torre do Pinh&atilde;o&quot;,
            &quot;address&quot;: &quot;Torre do Pinh&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 929 094&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 34,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Provesende, Gouv&atilde;es do Douro e S&atilde;o Crist&oacute;v&atilde;o do Douro&quot;,
            &quot;address&quot;: &quot;Largo Da Pra&ccedil;a&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731 031&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 35,
            &quot;name&quot;: &quot;Candedo&quot;,
            &quot;address&quot;: &quot;Largo de S. Bento&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 549 163&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 36,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de S&atilde;o Martinho de Antas e Paradela de Gui&atilde;es&quot;,
            &quot;address&quot;: &quot;Largo Do Eir&ocirc;&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259930222&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Vilarinho de S&atilde;o Rom&atilde;o&quot;,
            &quot;address&quot;: &quot;Rua Irm&atilde;os Teixeira&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 930 786&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 38,
            &quot;name&quot;: &quot;Provesende&quot;,
            &quot;address&quot;: &quot;Largo da Pra&ccedil;a&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731 031&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 39,
            &quot;name&quot;: &quot;Carva&quot;,
            &quot;address&quot;: &quot;Carva&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 456 287&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 40,
            &quot;name&quot;: &quot;Vilares&quot;,
            &quot;address&quot;: &quot;R. Dr. Ant&oacute;nio Mendes da Costa, 123&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 678 901&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 41,
            &quot;name&quot;: &quot;Celeir&oacute;s do Douro&quot;,
            &quot;address&quot;: &quot;R. Dr. Ant&oacute;nio Augusto de Aguiar, 123 - S&atilde;o Pedro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;+351 296 470 800&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 42,
            &quot;name&quot;: &quot;Pa&ccedil;os&quot;,
            &quot;address&quot;: &quot;Lugar da Fonte&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;227 443 709&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 43,
            &quot;name&quot;: &quot;Gouv&atilde;es do Douro&quot;,
            &quot;address&quot;: &quot;Rua Central&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 731 649&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 44,
            &quot;name&quot;: &quot;Paradela de Gui&atilde;es&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 45,
            &quot;name&quot;: &quot;S&atilde;o Crist&oacute;v&atilde;o do Douro&quot;,
            &quot;address&quot;: &quot;Largo do Cruzeiro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254731564&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 46,
            &quot;name&quot;: &quot;Nogueira&quot;,
            &quot;address&quot;: &quot;Nogueira&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 47,
            &quot;name&quot;: &quot;Alva&ccedil;&otilde;es do Corgo&quot;,
            &quot;address&quot;: &quot;Lugar do Outeiro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 323 360&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 48,
            &quot;name&quot;: &quot;Cumieira&quot;,
            &quot;address&quot;: &quot;Largo Assento&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 969 633&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 49,
            &quot;name&quot;: &quot;Medr&otilde;es&quot;,
            &quot;address&quot;: &quot;Medroes&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 812 473&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 50,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Lobrigos (S&atilde;o Miguel e S&atilde;o Jo&atilde;o Baptista) e Sanhoane&quot;,
            &quot;address&quot;: &quot;Bairro do Cruzeiro, N.&ordm; 11 r/ch&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254821052&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 51,
            &quot;name&quot;: &quot;Fontes&quot;,
            &quot;address&quot;: &quot;Lugar da Trapa&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 813 622&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 52,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Louredo e Fornelos&quot;,
            &quot;address&quot;: &quot;Fiolhais&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 811 489&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 53,
            &quot;name&quot;: &quot;Aba&ccedil;as&quot;,
            &quot;address&quot;: &quot;Rua Igreja, Aba&ccedil;as&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 929 362&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 54,
            &quot;name&quot;: &quot;Sever&quot;,
            &quot;address&quot;: &quot;Sever&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 486 195&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 55,
            &quot;name&quot;: &quot;Andr&atilde;es&quot;,
            &quot;address&quot;: &quot;Rua Cruzeiro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 332 023&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 56,
            &quot;name&quot;: &quot;Campe&atilde;&quot;,
            &quot;address&quot;: &quot;Campea&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 979 932&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 57,
            &quot;name&quot;: &quot;Folhadela&quot;,
            &quot;address&quot;: &quot;Rua Bairro Senhor Bonfim n.&ordm; 1&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 331 736&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 58,
            &quot;name&quot;: &quot;Fornelos&quot;,
            &quot;address&quot;: &quot;Rua Central 5&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 811 478&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 59,
            &quot;name&quot;: &quot;Gui&atilde;es&quot;,
            &quot;address&quot;: &quot;Rua Fonte Senhor, Gui&atilde;es&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 929 007&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 60,
            &quot;name&quot;: &quot;Lobrigos (S&atilde;o Jo&atilde;o Baptista)&quot;,
            &quot;address&quot;: &quot;Largo Massa&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 811 101&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 61,
            &quot;name&quot;: &quot;Parada de Cunhos&quot;,
            &quot;address&quot;: &quot;Parada de Cunhos&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 372 544&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 62,
            &quot;name&quot;: &quot;Lobrigos (S&atilde;o Miguel)&quot;,
            &quot;address&quot;: &quot;Bairro Cruzeiro 11-r/c&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 821 052&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 63,
            &quot;name&quot;: &quot;Torgueda&quot;,
            &quot;address&quot;: &quot;Rua Central, Torgueda&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 351 226&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 64,
            &quot;name&quot;: &quot;Louredo&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 65,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Adoufe e Vilarinho de Samard&atilde;&quot;,
            &quot;address&quot;: &quot;Gravelos (VILA REAL)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 351 480&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 66,
            &quot;name&quot;: &quot;Sanhoane&quot;,
            &quot;address&quot;: &quot;Sanhoane&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 811 529&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 67,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Borbela e Lamas de Olo&quot;,
            &quot;address&quot;: &quot;Estrada municipal 313, Edificio da Junta&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 68,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Constantim e Vale de Nogueiras&quot;,
            &quot;address&quot;: &quot;Vale de Nogueiras&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 336 947&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 69,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Nogueira e Ermida&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 332 387&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 70,
            &quot;name&quot;: &quot;Lamas de Olo&quot;,
            &quot;address&quot;: &quot;Lamas Olo&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 342 183&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 71,
            &quot;name&quot;: &quot;Arroios&quot;,
            &quot;address&quot;: &quot;Rua Lobato de Sousa&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259351480&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 72,
            &quot;name&quot;: &quot;Lordelo&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Francisco S&aacute; Carneiro, N.&ordm; 2&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 341 998&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 73,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Vila Real (Nossa Senhora da Concei&ccedil;&atilde;o, S&atilde;o Pedro e S&atilde;o Dinis)&quot;,
            &quot;address&quot;: &quot;Rua D. Ant&oacute;nio Valente da Fonseca, n&ordm; 5&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 375 515  -  963 964 000&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 74,
            &quot;name&quot;: &quot;Vila Marim&quot;,
            &quot;address&quot;: &quot;Vila Marim&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 342 186&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 75,
            &quot;name&quot;: &quot;Adoufe&quot;,
            &quot;address&quot;: &quot;S.Doming&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 347 625&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 76,
            &quot;name&quot;: &quot;Borbela&quot;,
            &quot;address&quot;: &quot;Rua Eido&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 347 623&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 77,
            &quot;name&quot;: &quot;Constantim&quot;,
            &quot;address&quot;: &quot;Rua Igreja&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 336 898&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 78,
            &quot;name&quot;: &quot;Ermida&quot;,
            &quot;address&quot;: &quot;Povoa&ccedil;&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 331 292&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 79,
            &quot;name&quot;: &quot;Justes&quot;,
            &quot;address&quot;: &quot;Rua N.Sr&ordf; Lurdes 5&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 929 898&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 80,
            &quot;name&quot;: &quot;Lamares&quot;,
            &quot;address&quot;: &quot;Av. Engenheiro El&oacute;i Ribeiro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 928 049&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 81,
            &quot;name&quot;: &quot;Nossa Senhora da Concei&ccedil;&atilde;o&quot;,
            &quot;address&quot;: &quot;Bairro S&atilde;o Vicente Paulo&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 323 580&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 82,
            &quot;name&quot;: &quot;Vale de Nogueiras&quot;,
            &quot;address&quot;: &quot;Vale Nogueiras&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 336 947&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 83,
            &quot;name&quot;: &quot;Pena&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 84,
            &quot;name&quot;: &quot;Alfarela de Jales&quot;,
            &quot;address&quot;: &quot;rua Central 8&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 458 140&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 85,
            &quot;name&quot;: &quot;Quint&atilde;&quot;,
            &quot;address&quot;: &quot;Quinta - Campe&atilde;&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 979 135&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 86,
            &quot;name&quot;: &quot;Alv&atilde;o&quot;,
            &quot;address&quot;: &quot;Alv&atilde;o&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 403 027/932 053 612&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 87,
            &quot;name&quot;: &quot;S&atilde;o Dinis&quot;,
            &quot;address&quot;: &quot;Largo Conde de Amarante&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 374 880&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 88,
            &quot;name&quot;: &quot;Bornes de Aguiar&quot;,
            &quot;address&quot;: &quot;Rua Henrique Maia, 52 - Pedras Salgadas&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 434 390&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 89,
            &quot;name&quot;: &quot;Bragado&quot;,
            &quot;address&quot;: &quot;Bragado&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 434 808 \\ 965 847 564&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 90,
            &quot;name&quot;: &quot;S&atilde;o Tom&eacute; do Castelo&quot;,
            &quot;address&quot;: &quot;S. Tom&eacute; do Castelo&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 91,
            &quot;name&quot;: &quot;Tresminas&quot;,
            &quot;address&quot;: &quot;Tr&ecirc;s minas&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 456 283&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 92,
            &quot;name&quot;: &quot;Uni&atilde;o das freguesias de Pensalvos e Parada de Monteiros&quot;,
            &quot;address&quot;: &quot;Pensalvos/Parada de Monteiros&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 434 400/936 496 946&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 93,
            &quot;name&quot;: &quot;Vila Cova&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;253868305&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 94,
            &quot;name&quot;: &quot;Vreia de Jales&quot;,
            &quot;address&quot;: &quot;Vreia de Jales&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 458 054&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 95,
            &quot;name&quot;: &quot;Vilarinho de Samard&atilde;&quot;,
            &quot;address&quot;: &quot;Estrada Municipal - Vilarinho de Samarda&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259347187&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 96,
            &quot;name&quot;: &quot;&Aacute;gua Rev&eacute;s e Crasto&quot;,
            &quot;address&quot;: &quot;Largo do Prado&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278717111&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 97,
            &quot;name&quot;: &quot;Algeriz&quot;,
            &quot;address&quot;: &quot;Avenida de S. Tiago, n&ordm;. 2&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;253 284 193&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 98,
            &quot;name&quot;: &quot;Bou&ccedil;o&atilde;es&quot;,
            &quot;address&quot;: &quot;Rua de Badana, N.&ordm; 3&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276 955 319 / 936 151 852&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 99,
            &quot;name&quot;: &quot;Canaveses&quot;,
            &quot;address&quot;: &quot;Largo Principal&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 769 196&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 100,
            &quot;name&quot;: &quot;Carrazedo de Montenegro e Curros&quot;,
            &quot;address&quot;: &quot;Carrazedo de Montenegro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 783 562&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 101,
            &quot;name&quot;: &quot;Erv&otilde;es&quot;,
            &quot;address&quot;: &quot;Largo da Barreira&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278749050&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 102,
            &quot;name&quot;: &quot;Fornos do Pinhal&quot;,
            &quot;address&quot;: &quot;Av.&ordf; Francisco Tavares&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 103,
            &quot;name&quot;: &quot;Lebu&ccedil;&atilde;o, Fi&atilde;es e Nozelos&quot;,
            &quot;address&quot;: &quot;Rua Eng&ordm; Francisco Batista Tavares&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;276 956 339&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 104,
            &quot;name&quot;: &quot;Rio Torto&quot;,
            &quot;address&quot;: &quot;Rio Torto&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 711 224&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 105,
            &quot;name&quot;: &quot;Tel&otilde;es&quot;,
            &quot;address&quot;: &quot;Ferreirinho - Tel&otilde;es&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 469 250&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 106,
            &quot;name&quot;: &quot;Afonsim&quot;,
            &quot;address&quot;: &quot;Rua Couto 1&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 417 179&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 107,
            &quot;name&quot;: &quot;Gouv&atilde;es da Serra&quot;,
            &quot;address&quot;: &quot;Gouvaes da Serra&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 469 019&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 108,
            &quot;name&quot;: &quot;Lixa do Alv&atilde;o&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 109,
            &quot;name&quot;: &quot;Parada de Monteiros&quot;,
            &quot;address&quot;: &quot;Vila Pouca de Aguiar&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 110,
            &quot;name&quot;: &quot;Pensalvos&quot;,
            &quot;address&quot;: &quot;Rua Calv&aacute;rio&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 434 476&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 111,
            &quot;name&quot;: &quot;Santa Marta da Montanha&quot;,
            &quot;address&quot;: &quot;Rua Central&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259495182 / 937858723&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 112,
            &quot;name&quot;: &quot;Santa Maria de Emeres&quot;,
            &quot;address&quot;: &quot;Rua Direita,3A&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278781506&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 113,
            &quot;name&quot;: &quot;Santa Valha&quot;,
            &quot;address&quot;: &quot;Rua St. Valha&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 759 570&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 114,
            &quot;name&quot;: &quot;S&atilde;o Pedro de Veiga de Lila&quot;,
            &quot;address&quot;: &quot;Largo Campo&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 769 430&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 115,
            &quot;name&quot;: &quot;Sonim e Barreiros&quot;,
            &quot;address&quot;: &quot;Av. Sr. do Bonfim&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 759 227&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 116,
            &quot;name&quot;: &quot;Vales&quot;,
            &quot;address&quot;: &quot;Rua de Santo Ant&oacute;nio, n&ordm;2&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 769 427&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 117,
            &quot;name&quot;: &quot;Serapicos&quot;,
            &quot;address&quot;: &quot;Largo da Igreja&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278781910&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 118,
            &quot;name&quot;: &quot;Valpa&ccedil;os e Sanfins&quot;,
            &quot;address&quot;: &quot;Av.&ordf; Dr. S&aacute; Carneiro&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 713 118&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 119,
            &quot;name&quot;: &quot;Vassal&quot;,
            &quot;address&quot;: &quot;Vassal&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 729 552&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 120,
            &quot;name&quot;: &quot;Veiga de Lila&quot;,
            &quot;address&quot;: &quot;Rua Eng francisco Tavares&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 769 322&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 121,
            &quot;name&quot;: &quot;Vilarandelo&quot;,
            &quot;address&quot;: &quot;Pra&ccedil;a Toural&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 749 525&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 122,
            &quot;name&quot;: &quot;Carrazedo de Montenegro&quot;,
            &quot;address&quot;: &quot;Rua de Santa Barbara, 77&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 781795&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 123,
            &quot;name&quot;: &quot;Sanfins&quot;,
            &quot;address&quot;: &quot;Rua da Resid&ecirc;ncia&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;278 729 797&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 124,
            &quot;name&quot;: &quot;Cabanas de Viriato&quot;,
            &quot;address&quot;: &quot;Avenida Cristo Rei 46&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;232 691 166&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 125,
            &quot;name&quot;: &quot;Carregal do Sal&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 126,
            &quot;name&quot;: &quot;Alvarelhos&quot;,
            &quot;address&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;(n&atilde;o dispon&iacute;vel)&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 127,
            &quot;name&quot;: &quot;Oliveira do Conde&quot;,
            &quot;address&quot;: &quot;Rua Igreja&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;232 968 344&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 128,
            &quot;name&quot;: &quot;Castro Daire&quot;,
            &quot;address&quot;: &quot;Rua Inoc&ecirc;ncio S Cruz&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;232 382 603&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 129,
            &quot;name&quot;: &quot;Gosende&quot;,
            &quot;address&quot;: &quot;Rua Emigrantes&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;254 689 485&quot;,
            &quot;website&quot;: null
        },
        {
            &quot;id&quot;: 130,
            &quot;name&quot;: &quot;Curros&quot;,
            &quot;address&quot;: &quot;Curros&quot;,
            &quot;email&quot;: null,
            &quot;phone&quot;: &quot;259 539 496&quot;,
            &quot;website&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-parishes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-parishes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-parishes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-parishes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-parishes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-parishes" data-method="GET"
      data-path="api/parishes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-parishes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-parishes"
                    onclick="tryItOut('GETapi-parishes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-parishes"
                    onclick="cancelTryOut('GETapi-parishes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-parishes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/parishes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-parishes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-parishes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-parishes">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-parishes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/parishes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"freguesias_pt_url\": \"http:\\/\\/bailey.com\\/\",
    \"freguesias_pt_id\": \"m\",
    \"address\": \"i\",
    \"email\": \"okon.justina@example.com\",
    \"phone\": \"n\",
    \"website\": \"i\",
    \"city_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/parishes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "freguesias_pt_url": "http:\/\/bailey.com\/",
    "freguesias_pt_id": "m",
    "address": "i",
    "email": "okon.justina@example.com",
    "phone": "n",
    "website": "i",
    "city_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-parishes">
</span>
<span id="execution-results-POSTapi-parishes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-parishes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-parishes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-parishes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-parishes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-parishes" data-method="POST"
      data-path="api/parishes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-parishes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-parishes"
                    onclick="tryItOut('POSTapi-parishes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-parishes"
                    onclick="cancelTryOut('POSTapi-parishes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-parishes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/parishes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-parishes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-parishes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-parishes"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freguesias_pt_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="freguesias_pt_url"                data-endpoint="POSTapi-parishes"
               value="http://bailey.com/"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>http://bailey.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freguesias_pt_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="freguesias_pt_id"                data-endpoint="POSTapi-parishes"
               value="m"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>m</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-parishes"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-parishes"
               value="okon.justina@example.com"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>okon.justina@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-parishes"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTapi-parishes"
               value="i"
               data-component="body">
    <br>
<p>Must not be greater than 512 characters. Example: <code>i</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>geo_polygon</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="geo_polygon"                data-endpoint="POSTapi-parishes"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>polygon_centroid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="polygon_centroid"                data-endpoint="POSTapi-parishes"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="city_id"                data-endpoint="POSTapi-parishes"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the cities table. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-parishes--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-parishes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/parishes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/parishes/1"
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

<span id="example-responses-GETapi-parishes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Vila Ch&atilde;&quot;,
        &quot;address&quot;: &quot;Rua da Lavandeira, 1337&quot;,
        &quot;email&quot;: null,
        &quot;phone&quot;: &quot;259 645 358&quot;,
        &quot;website&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-parishes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-parishes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-parishes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-parishes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-parishes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-parishes--id-" data-method="GET"
      data-path="api/parishes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-parishes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-parishes--id-"
                    onclick="tryItOut('GETapi-parishes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-parishes--id-"
                    onclick="cancelTryOut('GETapi-parishes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-parishes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/parishes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-parishes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-parishes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-parishes--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the parish. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-parishes--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-parishes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/parishes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/parishes/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-parishes--id-">
</span>
<span id="execution-results-PUTapi-parishes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-parishes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-parishes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-parishes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-parishes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-parishes--id-" data-method="PUT"
      data-path="api/parishes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-parishes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-parishes--id-"
                    onclick="tryItOut('PUTapi-parishes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-parishes--id-"
                    onclick="cancelTryOut('PUTapi-parishes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-parishes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/parishes/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/parishes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-parishes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-parishes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-parishes--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the parish. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-parishes--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-parishes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/parishes/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/parishes/1"
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

<span id="example-responses-DELETEapi-parishes--id-">
</span>
<span id="execution-results-DELETEapi-parishes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-parishes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-parishes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-parishes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-parishes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-parishes--id-" data-method="DELETE"
      data-path="api/parishes/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-parishes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-parishes--id-"
                    onclick="tryItOut('DELETEapi-parishes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-parishes--id-"
                    onclick="cancelTryOut('DELETEapi-parishes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-parishes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/parishes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-parishes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-parishes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-parishes--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the parish. Example: <code>1</code></p>
            </div>
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
