module.exports = {
  root: true,
  env: {
    browser: true,
    node: true
  },
  parserOptions: {
    parser: 'babel-eslint'
  },
  extends: [
    'eslint:recommended',
    '@nuxtjs',
    'plugin:nuxt/recommended',
    'plugin:pretter/recommended'
  ],
  plugins: [
    'vue'
  ],
  // add your custom rules here
  rules: {}
}
