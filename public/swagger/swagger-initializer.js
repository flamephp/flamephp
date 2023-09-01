window.onload = function() {
  //<editor-fold desc="Changeable Configuration Block">

  // the following lines will be replaced by docker/configurator, when it runs in a docker-container
  window.ui = SwaggerUIBundle({
    // url: "https://petstore.swagger.io/v2/swagger.json",
    urls: [
        {name: '认证模块', url: '/swagger/auth.json'},
        {name: '运营模块', url: '/swagger/manager.json'},
        {name: '门户模块', url: '/swagger/portal.json'},
        {name: '用户模块', url: '/swagger/user.json'},
    ],
    dom_id: '#swagger-ui',
    deepLinking: true,
    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],
    plugins: [
      SwaggerUIBundle.plugins.DownloadUrl
    ],
    layout: "StandaloneLayout"
  });

  //</editor-fold>
};
