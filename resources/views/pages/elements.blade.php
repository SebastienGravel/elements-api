@extends('layouts.site')
@section('content')
    <div class="container-fluid pt-3 header">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>
                <img src="/img/elements-white.svg" width="54px" alt="elements api" class="pe-1 m-0"> Éléments API
            </h1>
        
            <div class="scene ">
                <div class="element-container" id="element-container">
                    <div id="element-number">118</div>
                    <div id="element-symbol">Ff</div>
                    <div id="element-name">Mendélévium</div>
                    <div id="element-mass">132.9054519</div>
                </div>
                <div class="scene-over"></div>
                <a-scene embedded id="ascene" vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false">
                </a-scene> 
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light pt-5">
        <div class="container content ">
            <div class="row pt-5 pb-3">
                <div class="col pt-5">
                    <h2>À propos</h2>
                    <p class="pt-4 ps-5 pe-5">Bienvenue sur la page d'éléments api, cette api et un projet personnel qui, à l'origine, découle d'un projet de film auquel j'ai participé en 
                        collaboration avec l'office national du film. Durant ce projet, j'avais pour mandat de créer des visuels génératif 3D pour certaines des scènes du film KYMA, 
                        qui consistait en un voyage de l'infiniment grand à l'infiniment petit. 
                    </p>
                    <p class="ps-5 pe-5">
                        Cette api contient l'entièreté des données provenant du tableau périodique et a été utiliser pour la production de composant visuel à l'aide de script python et 
                        du logiciel Blender. J'ai rendu l'api publique afin que quiconque lui trouvant une utilité puisse l'utiliser.  
                    </p> 
                    
                    <p class="ps-5 pe-5">
                       Étant un projet personnel et partageant les ressources serveur avec d'autres projets, j'ai <span class="bold">limité le nombre d'appel à 30 par minute</span>.
                       Si vous avez besoin d'un plus grand nombre d'appels, je vous invite à <a href="/elements-api" target="_blank">télécharger le fichier de données json complet</a>.
                    </p>
                    
                    <p class="ps-5 pe-5">
                        Le projet est aussi disponible en Open Source sur le site <a href="https://github.com/SebastienGravel/elements-api" target="">GitHub</a>. 
                        Il s'agit d'un projet utilisant le Framework PHP Laravel ainsi que le Framework Javascript A-Frame pour l'animation 3D.
                    </p class="ps-5 pe-5 pb-5">
                </div>
            </div>

            <div class="pt-5 pb-3">
                <h3>Liste des points d'entrée</h3>
            </div>
            
            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête de tout les éléments
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="all"><span class="console">https://elements.sebdev.ca/api/v1 <button onclick="copyToClipboard('all')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name" >
                    Requête de tout les éléments, version courte
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="short"><span class="console">https://elements.sebdev.ca/api/v1/simple <button onclick="copyToClipboard('short')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                    Renvoi seulment:
                    <ul>
                        <li>Numero atomique</li> 
                        <li>Nom</li> 
                        <li>Symbole</li>
                        <li>Masse</li> 
                        <li>État</li>  
                    </ul>
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par nom d'élement
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="byName"><span class="console">https://elements.sebdev.ca/api/v1/nom/{<span class="params">string:nom</span>} <button onclick="copyToClipboard('byName')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par symbole chimique d'élement
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="bySymbol"><span class="console">https://elements.sebdev.ca/api/v1/symbole/{<span class="params">string:symbole</span>} <button onclick="copyToClipboard('bySymbol')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par numéro atomique d'élement
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="byNumber"><span class="console">https://elements.sebdev.ca/api/v1/numero/{<span class="params">int:numero</span>} <button onclick="copyToClipboard('byNumber')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                    Options: 1 à 118
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par période d'élements
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="byPeriod"><span class="console">https://elements.sebdev.ca/api/v1/periode/{<span class="params">int:periode</span>} <button onclick="copyToClipboard('byPeriod')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                    Options: 1 à 7
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par groupe d'élements
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="byGroup"><span class="console">https://elements.sebdev.ca/api/v1/groupe/{<span class="params">int:groupe</span>} <button onclick="copyToClipboard('byGroup')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                    Options: 1 à 18
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par état d'élements
                </div>
                <div class="method-url pt-1 pb-3">
                    <div class="pb-2" id="byState"><span class="console">https://elements.sebdev.ca/api/v1/etat/{<span class="params">string:etat</span>} <button onclick="copyToClipboard('byState')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                    Options:
                    <ul>
                        <li>gaz</li> 
                        <li>liquide</li> 
                        <li>solide</li> 
                    </ul>
                </div>
            </div>

            <div class="method-container pt-3 pb-3 ps-3">
                <div class="method-name">
                    Requête par famille d'élements
                </div>
                <div class="method-url pt-1 pb-3">             
                    <div class="pb-2" id="byFamily"><span class="console">https://elements.sebdev.ca/api/v1/famille/{<span class="params">string:famille</span>} <button onclick="copyToClipboard('byFamily')" class="clipboard"></button></span></div>
                    <div class="pt-1"><span class="method">METHODE </span> <span class="get">GET</span></div>
                </div>
                <div class="method-option">
                    Options: 
                    <ul>
                        <li>actinides</li> 
                        <li>alcalins</li> 
                        <li>alcalino-terreux</li> 
                        <li>gaz-nobles</li> 
                        <li>halogenes</li> 
                        <li>lanthanides</li>
                        <li>metalloides</li> 
                        <li>metaux-de-transition</li> 
                        <li>metaux-pauvres</li> 
                        <li>non-metaux</li>
                        <li>non-classes</li>
                    </ul> 
                </div>
            </div>
        </div>        
    </div>

    <div class="container-fluid">
        <div class="container p-5 text-center footer">
            <a href="https://github.com/SebastienGravel/elements-api" target="_blank">
                <img src="/img/github.png" alt="GitHub">
            </a>
        </div>
    </div>

    <script>

        const scene = document.getElementById('ascene')
        const entity = document.createElement('a-entity')
        const element_container = document.getElementById('element-container')
        const element_number = document.getElementById('element-number')
        const element_symbol = document.getElementById('element-symbol')
        const element_name = document.getElementById('element-name')
        const element_mass = document.getElementById('element-mass')
        
        let radius = 3
        let speed = 1000

        function copyToClipboard(name)
        {   
            const txt = document.getElementById(name).innerText
            navigator.clipboard.writeText(txt);
        }

        function createAtom()
        {
            addCore('{{ $elements->mass }}')
           
            //element_container.style.backgroundColor = "{{ $elements->elements_families->color }}"
            //element_container.style.boxShadow = "0px 3px 3px {{ $elements->elements_families->color }}"
            element_number.innerText = "{{ $elements->id }}"
            element_symbol.innerText = "{{ $elements->symbol }}"
            element_name.innerText = "{{ $elements->name }}"
            element_mass.innerText = "{{ $elements->mass }}"

            @php($dn = count($elements->distribution))
            @foreach($elements->distribution as $dc)
                ellipse(radius, {{$dc}}, speed)

                radius += 1.5
                speed += 1000
            @endforeach
            addCamera({{$dn}})
        }

        function addCamera(radius)
        {
            posz = radius + 16
            let c = document.createElement('a-camera')
            c.setAttribute('look-controls', 'enabled: false')
            c.setAttribute('wasd-controls', 'enabled:true')
            c.setAttribute('position', '0 -1 '+posz)
            c.setAttribute('fov', '60')
            scene.append(c)
        }

        function addRing(radius,speed,layerAngle)
        {
            let n = document.createElement('a-torus')
            n.setAttribute('position', '0 0 0')
            n.setAttribute('rotation', '0 '+layerAngle+' 0')
            n.setAttribute('arc', '360')
            n.setAttribute('radius', radius)
            n.setAttribute('radius-tubular', '0.02')
            n.setAttribute('segments-radial', '64')
            n.setAttribute('segments-tubular', '64')
            n.setAttribute('material', 'shader: flat; color: #444444')
            n.setAttribute('animation', 'property: rotation; to: 0 '+layerAngle+' 360; easing: linear; loop: true; dur: '+speed+'')
            return n
            //entity.append(n)
        }

        function addCore(mass)
        {
            mass = mass / 225 < 0.35 ? 0.35 : mass / 225
 
            let n = document.createElement('a-sphere')
            const m = mass+' '+mass+' '+mass
            n.setAttribute('position', '0 0 0')
            n.setAttribute('scale', m)
            n.setAttribute('material', 'shader: flat; color: white')
            entity.append(n)
        }

        function addName(name)
        {
            const t = document.createElement('a-text')
            t.setAttribute('width', '32')
            t.setAttribute('value', name)
            t.setAttribute('color', '#83BAFF')
            t.setAttribute('position', '0 6 1')
            t.setAttribute('align', 'center')
            scene.append(t)
        }

        function ellipse(radius, layer, speed)
        {
            let layerStep = 0
            let ring = addRing(radius, speed, layerStep)

            for(let i = 0; i < layer; i++)
            {
                let n = document.createElement('a-sphere')
                let pos = i/layer
                let x = Math.sin( pos * Math.PI * 2) * radius
                let y = Math.cos( pos * Math.PI * 2) * radius
                let pa = x+' '+y+' 0' 
                n.setAttribute('position', pa)
                n.setAttribute('scale', '0.15 0.15 0.15')
                //n.setAttribute('material', 'shader: flat; color: {{ $elements->elements_families->color }}')
                n.setAttribute('material', 'shader: flat; color: #83BAFF')
                ring.append(n)
                
            }
            entity.append(ring)
            entity.setAttribute('rotation', '-60 -45 0')
            //entity.setAttribute('animation', 'property: rotation; to: -60 -45 360; easing: linear; loop: true; dur: '+speed+'')
            scene.append(entity)
        }

        createAtom()
    </script>
@endsection