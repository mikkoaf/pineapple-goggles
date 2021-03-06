'use strict'
const merge = require('webpack-merge')
const prodEnv = require('./prod.env')

module.exports = merge(prodEnv, {
  NODE_ENV: '"development"',
  ROOT_API: '"http://localhost/api"'
  GOOGLE_API_KEY: get your own
  GOOGLE_API_KEY: "REPLACE-THIS-WITH-YOUR-KEY-FROM-ABOVE",
})
