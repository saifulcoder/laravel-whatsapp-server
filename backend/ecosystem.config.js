module.exports = {
    apps : [
    {
      name      : "Start as Background Process with PM2",
      script    : "./dist/index.js",
      instances : "1",
      exec_mode : "fork",
      env: {
        NODE_ENV: "production",
        PORT: 3018    
      }
    }
    ]
  }