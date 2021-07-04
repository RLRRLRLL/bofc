module.exports = {
  root: true,
  env: {
    browser: true,
    amd: true,
    node: true,
  },
  parserOptions: {
    parser: 'babel-eslint',
    ecmaVersion: 2020,
    sourceType: 'module',
    ecmaFeatures: {
      jsx: true,
      modules: true,
      experimentalObjectRestSpread: true,
    },
  },
  // extends: [
  //   'prettier',
  //   'airbnb-base',
  //   'plugin:vue/recommended',
  //   'plugin:prettier/recommended',
  // ],
  extends: ['eslint:recommended', 'plugin:vue/recommended', 'prettier'],
  plugins: ['prettier'],
  rules: {
    'comma-dangle': 'off',
    'no-plusplus': 'off',
    'class-methods-use-this': 'off',
    'import/no-unresolved': 'off',
    'import/extensions': 'off',
    'implicit-arrow-linebreak': 'off',
    'import/prefer-default-export': 'off',
    'vue/component-name-in-template-casing': [
      'error',
      'kebab-case',
      {
        ignores: [],
      },
    ],
    'prettier/prettier': [
      'error',
      {
        singleQuote: true,
        endOfLine: 'auto',
      },
    ],
  },
};
