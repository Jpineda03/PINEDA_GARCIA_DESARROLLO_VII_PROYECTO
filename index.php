<?php

  session_start();

  if (isset($_SESSION['nombre'], $_SESSION['email'])) {
    
    $user_information['nombre'] = $_SESSION['nombre'];
    $user_information['email'] = $_SESSION['email'];
    

  }

?>

<!DOCTYPE html>

<head>
  <title> Curso general de PHP</title>
  <link rel="stylesheet" href="./assets/index.css">

</head>

<body>

  <header class="header_principal">

    <div class='header-contenedor-izq'>
      <svg onclick="redirigir('/PROYECTO')" class="clickeable" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" height"50" width='50' viewBox="0 0 212.926 212.926"
        style="enable-background:new 0 0 212.926 212.926;" xml:space="preserve">
        <g>
          <g>
            <path
              d="M155.734,0c-9.774,0-18.719,4.467-24.636,12.133C125.182,4.467,116.238,0,106.463,0c-9.772,0-18.717,4.467-24.636,12.133 C75.909,4.467,66.964,0,57.192,0C39.9,0,25.832,14.068,25.832,31.359c0,16.387,12.633,29.873,28.672,31.237v85.673 c0,1.486,1.205,2.688,2.688,2.688h98.542c1.48,0,2.688-1.202,2.688-2.688V62.591c16.041-1.365,28.672-14.851,28.672-31.237 C187.094,14.068,173.025,0,155.734,0z"
              fill="#000000" style="fill: rgb(255, 255, 255);"></path>
            <path
              d="M171.188,199.115c-10.792,0-20.398-15.838-23.873-22.305c-0.73-1.974-1.556-3.644-2.531-5.093 c-4.348-6.398-11.56-10.219-19.28-10.219c-7.702,0-14.74,3.752-19.035,9.884c-4.294-6.132-11.331-9.884-19.034-9.884 c-7.73,0-14.938,3.82-19.286,10.229c-0.99,1.459-1.812,3.129-2.371,4.746c-3.629,6.812-13.241,22.646-24.034,22.646 c-1.231,0-2.299,0.836-2.601,2.026c-0.307,1.197,0.236,2.436,1.318,3.03c0.653,0.351,16.27,8.749,33.816,8.749 c11.901,0,21.791-3.852,29.392-11.453c0.066-0.064,0.118-0.127,0.174-0.189c0.965-0.966,1.848-2.01,2.627-3.134 c0.784,1.124,1.661,2.168,2.63,3.129c0.052,0.067,0.113,0.13,0.175,0.194c7.604,7.602,17.483,11.453,29.394,11.453 c0,0,0,0,0.005,0c17.539,0,33.15-8.398,33.812-8.749c1.075-0.59,1.622-1.844,1.316-3.03 C173.487,199.949,172.417,199.115,171.188,199.115z"
              fill="#000000" style="fill: rgb(255, 255, 255);"></path>
          </g>
        </g>
      </svg>
      <div>Recetas</div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" onclick='toggle_element("login")' width="42" height="42" fill="currentColor"
      class=" clickeable bi bi-person-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
      <path fill-rule="evenodd"
        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
    </svg>

  </header>

  <div id="contenido_dinamico" class="contenedor-principal">

    <div id='elemente_1' class="contenedor-izquierdo open"
      style="background-image: url('./assets/images/receta_presentacion.png'); background-repeat: no-repeat; background-size: cover;">
    </div>

    <div class="contenedor-derecho">

      <div class='main_container'>

        <div onclick='abrir_detalles()' class='receta' style='background-image: url("assets/images/image-animal.jpg");'>
          <div class='receta-contenido'>
            <svg viewBox="0 0 24 24" fill="none" height="50%" width="50%" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M16.7744 5.6944C16.7363 5.60548 16.6966 5.55984 16.5688 5.4321C16.2759 5.13921 15.8011 5.13921 15.5082 5.4321C15.2153 5.72499 15.2153 6.19987 15.5082 6.49276L16.0385 7.02309L14.3937 8.66785C14.6008 8.80477 14.7964 8.96297 14.9778 9.14441C15.1593 9.32586 15.3175 9.52145 15.4544 9.72851L17.0992 8.08375L17.6295 8.61408C17.9224 8.90698 18.3973 8.90698 18.6901 8.61408C18.983 8.32119 18.983 7.84632 18.6901 7.55342C18.5624 7.42569 18.5168 7.38595 18.4278 7.34785C18.3239 7.30328 18.1044 7.24276 17.6295 7.24276H16.8795V6.49276C16.8795 6.01789 16.819 5.79839 16.7744 5.6944ZM16.0704 11.2338C16.2803 12.2047 16.2235 13.2635 16.0238 14.2423C15.6574 16.0382 14.7598 17.8477 13.6761 18.9314C11.4331 21.1744 7.74093 20.9994 5.43189 18.6904C3.12284 16.3813 2.94784 12.6891 5.19083 10.4461C6.2745 9.36246 8.084 8.46482 9.87993 8.09842C10.8588 7.89872 11.9175 7.84191 12.8885 8.0518L14.0077 6.93256C13.6082 6.09622 13.7548 5.06417 14.4475 4.37144C15.3262 3.49276 16.7508 3.49276 17.6295 4.37144C17.633 4.37498 17.6366 4.37857 17.6403 4.38222C17.7785 4.52028 17.9965 4.73805 18.1531 5.10352C18.2384 5.30253 18.2986 5.52701 18.3353 5.78692C18.5952 5.82368 18.8197 5.88384 19.0187 5.96913C19.3842 6.12576 19.602 6.34377 19.74 6.48198C19.7437 6.48563 19.7473 6.48922 19.7508 6.49276C20.6295 7.37144 20.6295 8.79606 19.7508 9.67474C19.0581 10.3675 18.026 10.5141 17.1897 10.1145L16.0704 11.2338ZM10.1798 9.56815C8.60741 9.88893 7.08494 10.6733 6.25149 11.5068C4.66024 13.098 4.70109 15.8382 6.49255 17.6297C8.28401 19.4212 11.0242 19.462 12.6155 17.8708C13.4489 17.0373 14.2333 15.5148 14.5541 13.9425C14.8806 12.3422 14.6783 10.9662 13.9172 10.2051C13.156 9.4439 11.7801 9.24167 10.1798 9.56815Z"
                  fill="#ffffff"></path>
              </g>
            </svg>
          </div>
        </div>

        <div class='receta' style='background-image: url("assets/images/image.png");'>
          <div class='receta-contenido'>
            <svg height="50%" width="50%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <style type="text/css">
                  .st0 {
                    fill: #ffffff;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M511.904,253.069c-1.554-48.548-44.377-84.942-104.409-88.656c-120.865-7.486-109.51-67.345-209.664-73.722 c-5.642-0.361-11.206-0.536-16.662-0.536c-102.294,0-171.103,61.839-180.098,137.418c-0.548,4.591-0.839,9.124-0.968,13.612H0 v52.824h0.31c3.218,66.926,53.423,119.234,135.051,121.51c48.123,1.342,182.039,5.082,224.552,6.268 c69.628,1.94,136.722-44.738,149.856-104.255c0.87-3.94,1.419-7.815,1.767-11.639H512v-52.824H511.904z M483.976,270.015 c-10.169,46.098-63.947,83.595-119.866,83.595c-1.154,0-2.308-0.02-3.462-0.046l-56.247-1.574l-168.305-4.694 c-36.877-1.032-66.784-13.638-86.496-36.458c-18.042-20.898-25.967-49.361-22.304-80.144 c7.996-67.196,71.272-114.127,153.874-114.127c4.913,0,9.956,0.162,14.985,0.484c40.514,2.579,58.118,14.489,80.41,29.578 c27.553,18.642,58.788,39.779,129.299,44.144c29.797,1.844,54.784,13.387,68.557,31.655 C484.569,235.897,487.877,252.353,483.976,270.015z">
                  </path>
                  <path class="st0"
                    d="M338.827,236.587l-101.03-7.222c-10.969-0.786-20.957-6.596-27.05-15.746l-27.257-40.882 c-3.037-4.553-9.182-5.784-13.734-2.747c-4.553,3.037-5.784,9.182-2.747,13.734l12.522,18.784 c5.474,8.215,7.287,18.338,5.004,27.946c-2.283,9.608-8.454,17.829-17.043,22.704l-38.947,22.104 c-4.759,2.702-6.43,8.744-3.728,13.502c2.702,4.759,8.744,6.43,13.502,3.728l69.48-39.431c6.1-3.469,13.09-5.043,20.086-4.546 l109.535,7.828c5.455,0.387,10.188-3.72,10.582-9.176C348.39,241.714,344.289,236.974,338.827,236.587z">
                  </path>
                </g>
              </g>
            </svg>
          </div>
        </div>

        <div class='receta' style='background-image: url("assets/images/image.png");'>
          <div class='receta-contenido'>
            <svg height="50%" width="50%" fill="#ffffff" viewBox="0 0 14 14" role="img" focusable="false"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="m 6.5232086,12.983925 c -2.402919,-0.158 -4.531541,-1.8703 -5.229897,-4.2071 -0.34855497,-1.1663 -0.36992997,-2.0644 -0.07666,-3.2205 0.568674,-2.2418 2.339724,-3.9468 4.578899,-4.4082 1.037499,-0.2137 1.617793,-0.2001 2.726022,0.064 2.0387694,0.486 3.7598434,2.2094 4.3337064,4.3396 0.186507,0.6923 0.172678,2.3026 -0.02602,3.0298 -0.652295,2.3874 -2.745872,4.1714 -5.1597044,4.3969 -0.279066,0.026 -0.794924,0.028 -1.146352,0.01 z m 1.870005,-1.3055 c 2.6262414,-0.7559 4.1102714,-3.5955 3.2415114,-6.2024 -0.185144,-0.5556 -0.632726,-1.3636 -0.755317,-1.3636 -0.04337,0 -0.260049,0.1828 -0.4815,0.4062 l -0.4026374,0.4063 -0.490059,0.038 c -0.269533,0.021 -0.626638,0.08 -0.793566,0.1306 l -0.303506,0.092 0,-0.2231 c 0,-0.1993 0.08346,-0.3083 0.781756,-1.0205 l 0.781755,-0.7973 -0.158769,-0.1225 c -0.258941,-0.1997 -1.149904,-0.6117 -1.59643,-0.7383 -0.559027,-0.1584 -1.780823,-0.1622 -2.36415,-0.01 -0.57961,0.1539 -1.501678,0.6218 -1.903167,0.9658 -0.784206,0.672 -1.405346,1.6445 -1.657139,2.5947 -0.151103,0.5702 -0.148372,1.7325 0.0055,2.3322 0.122827,0.4787 0.624422,1.568 0.782474,1.6992 0.08002,0.066 0.163853,0.012 0.513055,-0.3307 l 0.41741,-0.4101 0.105711,0.1598 c 0.05814,0.088 0.244017,0.3078 0.41306,0.4888 l 0.307351,0.3292 -0.354713,0.3691 c -0.195093,0.2031 -0.354714,0.3898 -0.354714,0.415 0,0.1328 1.054359,0.678 1.603793,0.8294 0.815667,0.2246 1.791557,0.2096 2.66231,-0.041 z m -2.609889,-1.8373 c -0.479798,-0.1974 -0.777824,-0.4356 -1.02311,-0.8178 -0.178315,-0.2779 -0.373502,-0.8657 -0.376522,-1.1338 -0.0017,-0.1494 0.767787,-0.052 1.178392,0.1484 0.63217,0.3093 1.18476,1.117 1.18476,1.7317 l 0,0.2212 -0.303506,0 c -0.167053,0 -0.463787,-0.068 -0.660014,-0.1482 z m 1.538584,-0.086 c 0,-0.4121 0.180926,-0.8288 0.521775,-1.2018 0.390043,-0.4267 0.864676,-0.6702 1.401442,-0.7189 l 0.396934,-0.036 -0.03637,0.3524 c -0.09721,0.9419 -0.926957,1.7343 -1.909129,1.8234 l -0.374648,0.034 0,-0.2531 z m -1.23099,-1.9428 c -0.874006,-0.2059 -1.55623,-0.9692 -1.673652,-1.8725 l -0.04064,-0.3126 0.354608,0.042 c 1.069923,0.1257 1.897788,0.8981 1.997431,1.8636 l 0.03606,0.3494 -0.216601,-0.01 c -0.119131,0 -0.324873,-0.032 -0.457204,-0.063 z m 1.246063,-0.2924 c 0.07748,-0.8545 0.737264,-1.5758 1.63447,-1.7869 0.600694,-0.1414 0.650712,-0.1287 0.650712,0.1657 0,0.7121 -0.590621,1.5169 -1.311154,1.7865 -0.209386,0.078 -0.521995,0.1591 -0.694688,0.1796 l -0.313986,0.037 0.03465,-0.3821 z m -0.521453,-1.3995 c -0.36342,-0.4139 -0.482759,-0.7524 -0.482759,-1.3694 0,-0.6143 0.119412,-0.9557 0.476551,-1.3624 0.23767,-0.2707 0.273925,-0.2595 0.57519,0.1784 0.208298,0.3027 0.38467,0.8478 0.38467,1.1888 0,0.4099 -0.234888,1.0416 -0.497203,1.3372 l -0.241529,0.2722 -0.21492,-0.2448 z">
                </path>
              </g>
            </svg>
          </div>
        </div>


      </div>

      <div class='main_container_v1'>

        <div class='receta-v1'
          style='background-image:url("assets/images/receta.png"); background-size:concovertain; background-position: center; background-repeat:no-repeat;'>


          <div class='receta-contenido-v1' style='background-color:red;'>
            <svg height="50%" width="50%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <style type="text/css">
                  .st0 {
                    fill: #ffffff;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M511.889,193.281l-0.525-7.706c-0.716-10.506-5.519-19.93-12.677-26.571 c-6.466-6.036-15.079-9.774-24.391-10.442l24.789-47.574c7.746-14.856,1.988-33.164-12.868-40.909l-12.089-6.299 c-14.856-7.738-33.148-1.972-40.893,12.868l-42.58,81.684H42.032l-1.488-0.048c-10.434,0-20.104,4.064-27.246,10.72 c-7.158,6.64-11.952,16.065-12.661,26.571L0,194.831l0.175,1.543C5.392,243.615,23.422,287.037,50.676,323 c24.59,32.472,56.72,58.884,93.796,76.738l-1.67,12.804c-0.366,2.442-0.764,4.939-1.098,7.563c-0.334,2.673-0.612,5.48-0.62,8.589 c0.016,3.793,0.414,8.2,2.283,12.971c1.392,3.547,3.73,7.166,6.776,10.028c2.267,2.148,4.844,3.873,7.484,5.178 c3.992,1.972,8.096,3.086,12.391,3.801c4.31,0.7,8.867,0.986,13.95,0.986H322.92c6.028-0.008,11.325-0.398,16.327-1.432 c3.746-0.78,7.389-1.941,10.896-3.81c2.625-1.392,5.162-3.221,7.357-5.464c3.316-3.34,5.622-7.571,6.815-11.492 c1.209-3.953,1.495-7.555,1.495-10.768c0-3.109-0.286-5.916-0.62-8.589c-0.318-2.624-0.716-5.122-1.082-7.563l-1.368-10.497 c38.254-17.457,71.481-43.964,96.914-76.825c28.185-36.401,46.843-80.643,52.172-128.845l0.174-1.543L511.889,193.281z M322.92,426.985H183.967c-3.563,0-6.251-0.223-8.08-0.502c0.055-0.612,0.127-1.28,0.222-2.043 c0.238-1.909,0.604-4.239,1.002-6.887l0.024-0.167l2.784-21.307h147.057l2.784,21.307l0.024,0.167 c0.398,2.648,0.764,4.978,1.002,6.887c0.103,0.763,0.167,1.439,0.222,2.052C329.17,426.77,326.467,426.985,322.92,426.985z M432.232,303.993c-24.399,31.534-57.085,56.339-94.743,71.147l-11.825,4.652H182.042l0.183-1.416l-12.208-5.114 c-36.504-15.293-68.109-40.051-91.706-71.202c-7.332-9.686-13.79-20.041-19.476-30.865h16.384c0.898,0,1.63-0.732,1.63-1.63 v-37.021h30.412v26.404h-8.43v-15.445c0-0.899-0.732-1.63-1.638-1.63H86.568c-0.906,0-1.639,0.732-1.639,1.63v26.062 c0,0.898,0.732,1.63,1.639,1.63h32.965c0.898,0,1.63-0.732,1.63-1.63v-47.638c0-0.899-0.732-1.63-1.63-1.63H64.594 c-0.899,0-1.63,0.731-1.63,1.63v37.021H52.871c-1.384-3.078-2.752-6.171-4-9.321h4.374c0.899,0,1.63-0.732,1.63-1.63v-26.069 c0-0.899-0.731-1.63-1.63-1.63H39.606c-2.076-8.597-3.738-17.362-4.788-26.324l0.414-6.029c0.112-1.471,0.7-2.608,1.686-3.546 c1.003-0.923,2.228-1.432,3.626-1.44l0.358,0.016l0.549,0.032H470.55l0.541-0.032l0.366-0.016c1.4,0.008,2.608,0.517,3.611,1.44 c1.002,0.938,1.59,2.083,1.702,3.546l0.413,6.013c-1.05,8.971-2.727,17.734-4.803,26.34h-35.613c-0.891,0-1.623,0.731-1.623,1.63 v37.021h-30.427v-26.404h8.446v15.452c0,0.899,0.732,1.63,1.639,1.63h10.625c0.891,0,1.622-0.732,1.622-1.63v-26.069 c0-0.899-0.731-1.63-1.622-1.63h-32.957c-0.906,0-1.638,0.731-1.638,1.63v47.638c0,0.898,0.732,1.63,1.638,1.63h54.922 c0.907,0,1.638-0.732,1.638-1.63v-37.021h19.986c-0.946,3.134-1.932,6.251-3.014,9.328h-7.252c-0.891,0-1.622,0.732-1.622,1.63 v19.866C450.246,277.82,441.935,291.451,432.232,303.993z">
                  </path>
                  <path class="st0"
                    d="M243.59,220.297h-54.938c-0.899,0-1.631,0.731-1.631,1.63v37.021h-30.42v-26.404h8.438v15.452 c0,0.899,0.732,1.63,1.63,1.63h10.642c0.891,0,1.622-0.732,1.622-1.63v-26.069c0-0.899-0.731-1.63-1.622-1.63h-32.972 c-0.891,0-1.623,0.731-1.623,1.63v47.638c0,0.898,0.732,1.63,1.623,1.63h54.946c0.899,0,1.63-0.732,1.63-1.63v-37.021h30.412 v26.404h-8.43v-15.445c0-0.899-0.732-1.63-1.638-1.63h-10.641c-0.89,0-1.622,0.732-1.622,1.63v26.062 c0,0.898,0.732,1.63,1.622,1.63h32.973c0.906,0,1.638-0.732,1.638-1.63v-47.638C245.228,221.028,244.496,220.297,243.59,220.297z">
                  </path>
                  <path class="st0"
                    d="M367.639,220.297h-54.93c-0.899,0-1.63,0.731-1.63,1.63v37.021h-30.412v-26.404h8.43v15.452 c0,0.899,0.732,1.63,1.638,1.63h10.625c0.906,0,1.639-0.732,1.639-1.63v-26.069c0-0.899-0.732-1.63-1.639-1.63h-32.964 c-0.899,0-1.63,0.731-1.63,1.63v47.638c0,0.898,0.731,1.63,1.63,1.63h54.946c0.899,0,1.63-0.732,1.63-1.63v-37.021h30.42v26.404 h-8.446v-15.445c0-0.899-0.732-1.63-1.63-1.63h-10.633c-0.898,0-1.63,0.732-1.63,1.63v26.062c0,0.898,0.732,1.63,1.63,1.63h32.957 c0.906,0,1.638-0.732,1.638-1.63v-47.638C369.277,221.028,368.546,220.297,367.639,220.297z">
                  </path>
                </g>
              </g>
            </svg>
          </div>


        </div>

        <div class='receta-v1'
          style='background-image:url("assets/images/receta-2.png"); background-size:concovertain; background-position: center; background-repeat:no-repeat;'>
          <div class='receta-contenido-v1'>
            <svg height="50%" width="50%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <style type="text/css">
                  .st0 {
                    fill: #ffffff;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M511.904,253.069c-1.554-48.548-44.377-84.942-104.409-88.656c-120.865-7.486-109.51-67.345-209.664-73.722 c-5.642-0.361-11.206-0.536-16.662-0.536c-102.294,0-171.103,61.839-180.098,137.418c-0.548,4.591-0.839,9.124-0.968,13.612H0 v52.824h0.31c3.218,66.926,53.423,119.234,135.051,121.51c48.123,1.342,182.039,5.082,224.552,6.268 c69.628,1.94,136.722-44.738,149.856-104.255c0.87-3.94,1.419-7.815,1.767-11.639H512v-52.824H511.904z M483.976,270.015 c-10.169,46.098-63.947,83.595-119.866,83.595c-1.154,0-2.308-0.02-3.462-0.046l-56.247-1.574l-168.305-4.694 c-36.877-1.032-66.784-13.638-86.496-36.458c-18.042-20.898-25.967-49.361-22.304-80.144 c7.996-67.196,71.272-114.127,153.874-114.127c4.913,0,9.956,0.162,14.985,0.484c40.514,2.579,58.118,14.489,80.41,29.578 c27.553,18.642,58.788,39.779,129.299,44.144c29.797,1.844,54.784,13.387,68.557,31.655 C484.569,235.897,487.877,252.353,483.976,270.015z">
                  </path>
                  <path class="st0"
                    d="M338.827,236.587l-101.03-7.222c-10.969-0.786-20.957-6.596-27.05-15.746l-27.257-40.882 c-3.037-4.553-9.182-5.784-13.734-2.747c-4.553,3.037-5.784,9.182-2.747,13.734l12.522,18.784 c5.474,8.215,7.287,18.338,5.004,27.946c-2.283,9.608-8.454,17.829-17.043,22.704l-38.947,22.104 c-4.759,2.702-6.43,8.744-3.728,13.502c2.702,4.759,8.744,6.43,13.502,3.728l69.48-39.431c6.1-3.469,13.09-5.043,20.086-4.546 l109.535,7.828c5.455,0.387,10.188-3.72,10.582-9.176C348.39,241.714,344.289,236.974,338.827,236.587z">
                  </path>
                </g>
              </g>
            </svg>
          </div>
        </div>

        <div class='receta-v1'
          style='background-image:url("assets/images/receta.png"); background-size:concovertain; background-position: center; background-repeat:no-repeat;'>
          <div class='receta-contenido-v1'>
            <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="40%" fill="white" class="bi bi-clock-fill"
              viewBox="0 0 16 16">
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
            </svg>
          </div>
        </div>

        <div class='receta-v1'
          style='background-image:url("assets/images/receta-2.png"); background-size:concovertain; background-position: center; background-repeat:no-repeat;'>
          <div class='receta-contenido-v1'>
            <svg height="50%" width="50%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <style type="text/css">
                  .st0 {
                    fill: #ffffff;
                  }
                </style>
                <g>
                  <path class="st0"
                    d="M511.904,253.069c-1.554-48.548-44.377-84.942-104.409-88.656c-120.865-7.486-109.51-67.345-209.664-73.722 c-5.642-0.361-11.206-0.536-16.662-0.536c-102.294,0-171.103,61.839-180.098,137.418c-0.548,4.591-0.839,9.124-0.968,13.612H0 v52.824h0.31c3.218,66.926,53.423,119.234,135.051,121.51c48.123,1.342,182.039,5.082,224.552,6.268 c69.628,1.94,136.722-44.738,149.856-104.255c0.87-3.94,1.419-7.815,1.767-11.639H512v-52.824H511.904z M483.976,270.015 c-10.169,46.098-63.947,83.595-119.866,83.595c-1.154,0-2.308-0.02-3.462-0.046l-56.247-1.574l-168.305-4.694 c-36.877-1.032-66.784-13.638-86.496-36.458c-18.042-20.898-25.967-49.361-22.304-80.144 c7.996-67.196,71.272-114.127,153.874-114.127c4.913,0,9.956,0.162,14.985,0.484c40.514,2.579,58.118,14.489,80.41,29.578 c27.553,18.642,58.788,39.779,129.299,44.144c29.797,1.844,54.784,13.387,68.557,31.655 C484.569,235.897,487.877,252.353,483.976,270.015z">
                  </path>
                  <path class="st0"
                    d="M338.827,236.587l-101.03-7.222c-10.969-0.786-20.957-6.596-27.05-15.746l-27.257-40.882 c-3.037-4.553-9.182-5.784-13.734-2.747c-4.553,3.037-5.784,9.182-2.747,13.734l12.522,18.784 c5.474,8.215,7.287,18.338,5.004,27.946c-2.283,9.608-8.454,17.829-17.043,22.704l-38.947,22.104 c-4.759,2.702-6.43,8.744-3.728,13.502c2.702,4.759,8.744,6.43,13.502,3.728l69.48-39.431c6.1-3.469,13.09-5.043,20.086-4.546 l109.535,7.828c5.455,0.387,10.188-3.72,10.582-9.176C348.39,241.714,344.289,236.974,338.827,236.587z">
                  </path>
                </g>
              </g>
            </svg>
          </div>
        </div>

      </div>

    </div>

  </div>




      <?php if (isset($_GET['opcion'])): ?><?php if ($_GET['opcion'] == 'registrar'): ?> <div id="login" class="barra_formulario_login col open"><?php endif; ?>
        <?php else: ?> <div id="login" class="barra_formulario_login col close"> <?php endif; ?>

        <div class="login_opciones_close row">

          <svg onclick='toggle_element("login")' class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25"
            height="25" fill="currentColor" viewBox="0 0 16 16">
            <path
              d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
          </svg>

        </div>

        <div class="login_contenedor_inferior col">

          <?php if (!isset($_SESSION['nombre'], $_SESSION['email'])): ?> <div class="col formulario_login_card"> 
            <?php else: ?><div id="formulario_login_card" class="col formulario_login_card" style=' display:none;'><?php endif; ?>

            <label class="font_tittles"> Login de usuarios</label>

            <?php if (isset($_GET['opcion'])): ?><?php if ($_GET['opcion'] == 'registrar'): ?>
                <form id='formulario_login' class="col formulario_login_main" method="post"
                  action="./assets/php/guardar_usuario.php">

                  <div class="col">
                    <label class="font_form_tittles">Nombre: </label>
                    <input type="text" name="nombre" style="height: 30px;">
                  </div>

                  <div class="col">
                    <label class="font_form_tittles">Correo:</label>
                    <input type="text" name="email" style="height: 30px;">
                  </div>

                  <div class="col">
                    <label class="font_form_tittles">Contraseña: </label>
                    <input type="password" name="contraseña" style="height: 30px;">
                  </div>

                  <button id="btn_login_formulario" class="login_button">Registrar usuario</button>

                </form>
            <?php endif; ?>
            <?php else: ?>

              <form id='formulario_login' class="col formulario_login_main" method="post" action="./assets/php/validar_usuario_existente.php">

                <div class="col">
                  <label class="font_form_tittles">Correo:</label>
                  <input type="text" name="email" style="height: 30px;" required>
                </div>

                <div class="col">
                  <label class="font_form_tittles">Contraseña: </label>
                  <input type="password" name="contraseña" style="height: 30px;" required>
                </div>

                <button id="btn_login_formulario" class="login_button">Iniciar Sesion</button>

                <div> Eres nuevo? <a href="?opcion=registrar"> Create un usuario</a> </div>

              </form>

            <?php endif; ?>

          </div>

          <?php if (isset($_SESSION['nombre'], $_SESSION['email'])): ?>

            <div class='login_contenedor_central col'>

              <div class='card shadow row space_around'>

                <svg xmlns="http://www.w3.org/2000/svg" style='margin-right:50px;' onclick='toggle_element("login")'
                  width="60" height="60" fill="currentColor" class="clickeable bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                  <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>

                <div class="login_usuario_mail col">

                  <div class='login_nombre_usuario col'>
                    <?php echo $user_information['nombre']; ?>
                  </div>

                  <div class='login_nombre_email col'>
                    <?php echo $user_information['email']; ?>
                  </div>

                </div>

              </div>

              <div class='card shadow clickeable' onclick='mostrat_lista_favoritos()'>
                <b>MOSTRAR LISTA DE FAVORITOS</b>
              </div>

              <div class='card shadow clickeable' onclick='agregar_nueva_receta()'>
                <b>AGREGAR RECETA</b>
              </div>

            </div>

            <button id="logout" class='login_button login_button_logout clickeable'
              onclick="redirigir('http://localhost/PROYECTO/assets/php/logout.php')">
              CERRAR SESSION
            </button>

          <?php endif; ?>

        </div>
      </div>

  
      <div id="detalle" class="close detalle row"></div>

</body>

<script type="module" src="./assets/main.js"></script>
<link rel="stylesheet" href="./assets/modules/Recetas/index.css">
<link rel="stylesheet" href="./assets/modules/contenedorRecetas/index.css">
<link rel="stylesheet" href="./assets/modules/detallesGenerales/index.css">
<link rel="stylesheet" href="./assets/modules/detallesGeneralesEditar/index.css">




</html>