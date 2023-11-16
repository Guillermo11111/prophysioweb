var staticCacheName = "prophysio-static";// + new Date().getTime();
//var dynamicCacheName = "prophysio-dyna";
var inmutableCacheName = "prophysio-inmutable";

const APP_SHELL = [
    '/images/icons/icon-72.png',
    '/images/icons/icon-96.png',
    '/images/icons/icon-128.png',
    '/images/icons/icon-192.png',
    '/images/icons/icon-384.png',
    '/images/icons/icon-512.png',
   // '/css/app.css',
    //'/js/app.js',
];

const APP_SHELL_INMUTABLE = [
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://code.jquery.com/jquery-3.5.1.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js',
    '/',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    const cacheStatic = caches.open(staticCacheName)
        .then(cache => {
            return cache.addAll(APP_SHELL);
        })

    const cacheInmutable = caches.open(inmutableCacheName)
        .then(cache => {
            return cache.addAll(APP_SHELL_INMUTABLE);
        })

    event.waitUntil(Promise.all([cacheStatic,cacheInmutable]))
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("prophysio-")))
                    //.filter(cacheName => (cacheName !== staticCacheName))
                    .filter(cacheName => (cacheName !== inmutableCacheName && cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

self.addEventListener('fetch', event => {
    const cacheName = 'prophysio-dyna-' + event.request.url.pathname; // Nombre de caché basado en la ruta
  
    event.respondWith(
      fetch(event.request)
        .then(responseFromNetwork => {
          return caches.open(cacheName)
            .then(cache => {
              cache.put(event.request, responseFromNetwork.clone());
              return responseFromNetwork;
            })
            .catch(() => {
              return responseFromNetwork;
            });
        })
        .catch(() => {
          return caches.open(cacheName)
            .then(cache => {
              return cache.match(event.request)
                .then(responseFromCache => {
                  return responseFromCache || fetch(event.request)
                    .then(responseFromNetwork => {
                      cache.put(event.request, responseFromNetwork.clone());
                      return responseFromNetwork;
                    });
                });
            })
            .catch(() => {
                return caches.match('offline');
              // Si ni la red ni la caché dinámica están disponibles, puedes responder con una página "offline" o un recurso predeterminado
            });
        })
    );
  });
  
  
  
/*  laravel-pwa
// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});*/

/*
  
  //una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
  self.addEventListener('activate', e => {
    const cacheWhitelist = [CACHE_NAME]
  
    e.waitUntil(
      caches.keys()
        .then(cacheNames => {
          return Promise.all(
            cacheNames.map(cacheName => {
              //Eliminamos lo que ya no se necesita en cache
              if (cacheWhitelist.indexOf(cacheName) === -1) {
                return caches.delete(cacheName)
              }
            })
          )
        })
        // Le indica al SW activar el cache actual
        .then(() => self.clients.claim())
    )
  })
  

  */